## Symfony Profiler Appears Broken or Returns 404

Date discovered: 2026-06-20
Environment: Local Development
Status: Resolved

### Symptom

The Symfony Web Debug Toolbar displays:

```text
Loading...
Loading the web debug toolbar...
Attempt #1
```

or profiler URLs appear to return a 404 page.

### Investigation

The following components were verified and working correctly:

* Symfony application
* WebProfilerBundle
* Nginx
* Docker networking
* Traefik routing

The profiler routes were correctly registered:

```bash
php bin/console debug:router | grep profiler
```

### Root Cause

The local environment was configured to force HTTPS through Traefik.

Requests performed using HTTP (for example with `curl`) did not follow the redirection automatically, which led to misleading 404 responses and suggested that the profiler was not working.

Example:

```bash
curl http://bookingapp.local
```

returned an unexpected response, while the application was actually available through HTTPS.

### Fix

Configure Traefik to redirect all HTTP traffic to HTTPS:

```yaml
entryPoints:
  web:
    address: ":80"
    http:
      redirections:
        entryPoint:
          to: websecure
          scheme: https
```

When testing endpoints manually, follow redirects:

```bash
curl -L https://bookingapp.local
```

### Lessons Learned

When debugging a Symfony application behind Traefik:

1. Verify whether HTTP → HTTPS redirection is enabled.
2. Use `curl -L` when testing URLs.
3. Check the Traefik dashboard before investigating Symfony.
4. Confirm whether the issue occurs on HTTP, HTTPS, or both.

### References

Traefik EntryPoints Documentation:

https://doc.traefik.io/traefik/reference/install-configuration/entrypoints/

---

## Web Debug Toolbar Stuck on "Loading..."

Date discovered: 2026-07-04
Environment: Local Development
Status: Resolved

### Symptom

The Symfony Web Debug Toolbar displays:

```text
Loading...
Loading the web debug toolbar...
Attempt #1
```

and never resolves, even though HTTP → HTTPS redirection was already in place
(see previous entry).

### Investigation

The response headers on `https://bookingapp.local` showed:

```text
x-debug-token-link: http://bookingapp.local/_profiler/492598
```

Note the link uses `http://` even though the page was loaded over `https://`.
The toolbar's JS fetches this URL via AJAX; since the page is HTTPS, the
browser blocks the `http://` request as mixed content, so the request never
completes and the toolbar spinner never resolves.

### Root Cause

Traefik terminates TLS and forwards plain HTTP to nginx/php over the Docker
network. Symfony had no `trusted_proxies` / `trusted_headers` configured, so
it ignored Traefik's `X-Forwarded-Proto: https` header and assumed the
request was plain HTTP, generating `http://` URLs everywhere (profiler
links, `_wdt` links, etc).

### Fix

Trust the Docker network and the `X-Forwarded-*` headers in
`symfony/config/packages/framework.yaml`:

```yaml
framework:
    trusted_proxies: '10.0.0.0/8,172.16.0.0/12,192.168.0.0/16'
    trusted_headers: ['x-forwarded-for', 'x-forwarded-host', 'x-forwarded-proto', 'x-forwarded-port', 'x-forwarded-prefix']
```

Clear the cache afterwards:

```bash
make bash
php symfony/bin/console cache:clear
```

Verify the generated link now uses `https://`:

```bash
curl -sk -D - -o /dev/null https://bookingapp.local/ | grep x-debug-token-link
```

### Lessons Learned

1. When a service sits behind a TLS-terminating reverse proxy (Traefik) that
   forwards plain HTTP internally, it must be told to trust the proxy's
   `X-Forwarded-*` headers, or it will misdetect its own scheme.
2. The same class of bug hit phpMyAdmin (`PMA_ABSOLUTE_URI`) — check any
   backend behind Traefik for this pattern, not just Symfony.
3. Inspect response headers (`x-debug-token-link`, `Set-Cookie` flags, etc.)
   for scheme mismatches before assuming the profiler itself is broken.

### References

Symfony Trusting Proxies Documentation:

https://symfony.com/doc/current/deployment/proxies.html

---

## Registration Confirmation Email Never Arrives

Date discovered: 2026-07-05
Environment: Local Development
Status: Resolved

### Symptom

`bin/console mailer:test` delivers mail to Mailpit instantly, but the
"Please Confirm your Email" message sent from
`RegistrationController::register()` (via `EmailVerifier::sendEmailConfirmation()`)
never shows up in Mailpit, with no error surfaced to the user.

### Investigation

`MAILER_DSN` was correctly set to `smtp://mailpit:1025` (the container
network hostname, not `127.0.0.1`). Checking `config/packages/messenger.yaml`
revealed:

```yaml
routing:
    Symfony\Component\Mailer\Messenger\SendEmailMessage: async
```

This routes every `SendEmailMessage` (i.e. every call to
`MailerInterface::send()`) through the Messenger `async` transport instead
of sending it directly. The `async` transport DSN was:

```
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
```

a Doctrine-backed queue table (`messenger_messages`). No process in
`docker-compose.yml` (and no background process inside the `php` container)
runs `messenger:consume async`, so nothing ever drains that queue. Querying
the table confirmed emails piling up undelivered:

```sql
SELECT id, queue_name, created_at, delivered_at FROM messenger_messages;
```

```
id | queue_name | created_at          | delivered_at
1  | default    | 2026-07-05 15:49:55 | NULL
2  | default    | 2026-07-05 16:17:18 | NULL
```

### Root Cause

Emails were not lost or misconfigured — they were queued into
`messenger_messages` by the `SendEmailMessage: async` routing rule and sat
there forever because no Messenger worker consumes the `async` transport in
this environment.

### Fix

Removed the `SendEmailMessage: async` routing rule from
`config/packages/messenger.yaml`, so mail sends happen synchronously again
(same behavior as `mailer:test`):

```yaml
routing:
    Symfony\Component\Notifier\Message\ChatMessage: async
    Symfony\Component\Notifier\Message\SmsMessage: async
```

Verified by re-running `mailer:test` and confirming the `messenger_messages`
row count stayed the same (no new row queued) while the mail appeared in
Mailpit immediately.

If async email sending is wanted later (e.g. to avoid blocking the HTTP
request on SMTP), re-add the routing rule *and* run a worker, either as a
`docker-compose.yml` service or manually:

```bash
docker compose exec php php symfony/bin/console messenger:consume async
```

### Lessons Learned

1. Routing a message class to an `async` transport is silent at runtime —
   nothing fails, the message just queues. Always confirm a consumer is
   actually running before relying on `messenger.yaml` routing.
2. `debug:messenger` shows *what handles* a message class but not whether a
   worker is consuming its transport — check `docker compose ps` / running
   processes, or query the transport's storage directly (e.g.
   `messenger_messages` for the Doctrine transport).
3. When "the test command works but the app doesn't," suspect a difference
   in how each path invokes the shared service (here: both call
   `MailerInterface::send()`, so the divergence had to be in routing/config,
   not the mailer transport itself).

### References

Symfony Messenger Documentation:

https://symfony.com/doc/current/messenger.html

---

## Form Field Errors Don't Appear to Display

Date discovered: 2026-07-06
Environment: Local Development
Status: Resolved

### Symptom

On `password/lost-password.html.twig`, submitting an email address that
doesn't match any user should show "No user found for this email" next to
the field (added via `$form->get('email')->addError(...)` in
`PasswordController::lost()`). Visually, nothing appeared to happen after
clicking submit — the page looked identical to before submission.

### Investigation

A functional test (`Symfony\Bundle\FrameworkBundle\Test\WebTestCase`)
submitting the form with a non-existent email confirmed the server-side
behavior was actually correct: HTTP 200, and the response body did contain
the error:

```html
<ul><li id="lost_password_email_error1">No user found for this email</li></ul>
```

The `<ul>`/`<li>` carry no CSS classes at all — this is Symfony's default
form theme (`form_div_layout.html.twig`), not a Bootstrap-aware one.

### Root Cause

`config/packages/twig.yaml` had no `form_themes` configured, so
`form_errors()` rendered with zero styling. Next to the app's custom
`form-control-custom` inputs, the plain unstyled bullet list was
effectively invisible, giving the impression that the error never
displayed.

### Fix

Enable the Bootstrap 5 form theme so `form_errors()` / `form_widget()`
render with `invalid-feedback` / `is-invalid` classes automatically,
without changing any existing template markup:

```yaml
# config/packages/twig.yaml
twig:
    file_name_pattern: '*.twig'
    form_themes: ['bootstrap_5_layout.html.twig']

when@test:
    twig:
        strict_variables: true
```

Verified by re-submitting the lost-password form with an unknown email and
confirming the error now renders inside a styled `invalid-feedback` block.

### Lessons Learned

1. A 200 response with the right content in the HTML doesn't mean the user
   can *see* it — always check the actual rendered styling, not just
   presence in the DOM.
2. Any Symfony project styling forms with Bootstrap should set
   `twig.form_themes` explicitly; without it, `form_errors`/`form_widget`
   silently fall back to the unstyled default theme.
3. To reproduce a "nothing happens on submit" report without a browser,
   drive the controller directly with `WebTestCase` (`browser-kit` +
   `dom-crawler`, already in `vendor/`) — it separates "the request isn't
   being processed" from "the response looks wrong."

### References

Symfony Form Theming Documentation:

https://symfony.com/doc/current/form/form_themes.html

---

## Form Error Still Doesn't Display After Fixing the Form Theme (Turbo Blocks the Response)

Date discovered: 2026-07-06
Environment: Local Development
Status: Resolved

### Symptom

Even after enabling `form_themes: ['bootstrap_5_layout.html.twig']` (see
previous entry), submitting `password/lost-password.html.twig` with an
email that fails validation in `PasswordController::lost()` (unknown
email, or an unverified account) still showed no error at all — the page
looked frozen, exactly as before the CSS fix.

### Investigation

Testing with a real browser (Playwright driving the existing Chrome
install, since the earlier `WebTestCase` functional test only proves the
HTML is correct, not that the browser renders it) surfaced a console
error on submit:

```
Error: Form responses must redirect to another location
    at .../@hotwired/turbo/turbo.index-*.js
```

The network request succeeded (200, with the correct `invalid-feedback`
markup in the body) but Turbo Drive (`symfony/ux-turbo`) discarded the
response entirely instead of rendering it.

### Root Cause

Turbo Drive requires that a response to a non-GET form submission is
either a redirect, or a 4xx/5xx status (the Rails/Turbo convention for
"re-render the form with validation errors"). `PasswordController::lost()`
returned a plain `200` when re-rendering the form with an error attached
via `$form->get('email')->addError(...)`. Turbo's client-side guard
rejects any 2xx response to a form submission that isn't a redirect, so
it silently aborted the render — no console-visible failure beyond the
one thrown error, no visual change on the page.

### Fix

Return `422 Unprocessable Entity` instead of `200` whenever the form is
re-rendered because of a validation/business-rule error (not a redirect):

```php
return $this->render('password/lost-password.html.twig', [
    'form' => $form->createView(),
], new Response(status: 422));
```

Applied both to the "no user found for this email" fallthrough at the end
of the action and to the early-return "email not verified" branch. Every
`return $this->render(...)` for the *same request* that produced the form
submission needs this status — not just the last one in the method.

Verified with Playwright: submitting an unknown email now shows
`is-invalid` on the input and the red `invalid-feedback` message, and the
Symfony debug toolbar confirms the request completed as `422`.

### Lessons Learned

1. When `symfony/ux-turbo` (or any Turbo Drive setup) is installed, every
   controller action that re-renders a form with errors on the same
   request must return a non-2xx status (422 is the convention) — a plain
   `200` gets silently discarded by Turbo, not by the CSS or the template.
2. A `WebTestCase` functional test proves the server produced the right
   HTML; it does **not** prove the browser will display it. Turbo/Stimulus
   behavior only shows up when actually driving a browser — use
   `playwright-core` against the existing `google-chrome` binary
   (`chromium.launch({ executablePath: '/usr/bin/google-chrome' })`) when
   no project browser-automation tool is set up yet.
3. Always check `console --errors` / the page console after a form submit
   before concluding the fix worked — this failure mode produces no HTTP
   error and no PHP exception, only a client-side console error.
4. If a controller has more than one `return $this->render(...)` for the
   same "form submitted with errors" situation, fixing the status on one
   and forgetting the others reproduces this exact bug — grep the action
   for every early-return render when applying this fix.

### References

Turbo Drive - Handling Form Submissions:

https://turbo.hotwired.dev/handbook/drive#form-submissions
