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
