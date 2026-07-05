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
