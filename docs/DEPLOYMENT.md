# Deployment

## Before going live

1. Copy the project to a PHP 8.2+ web host.
2. Point the domain's document root at the `public/` directory. Do not expose the project root as the document root.
3. Copy `.env.example` to `.env` on the server and replace the example values.
4. Set `APP_DEBUG=0`.
5. Set `SITE_URL` to the site's real HTTPS URL.
6. Set `CONTACT_EMAIL` to the address that should receive enquiries.
7. Set `MAIL_FROM` to a real mailbox/domain address accepted by the hosting provider.
8. Confirm the host provides PHP's `mail()` function and a working mail transport.
9. Enable HTTPS at the host.
10. Replace the example legal content and demo business data before launch.

## Environment file

Create `.env` from `.env.example` and set real production values, for example:

```text
APP_DEBUG=0
APP_TIMEZONE=Europe/London
SITE_URL=https://www.example.com
CONTACT_EMAIL=hello@example.com
MAIL_FROM=website@example.com
```

Never commit `.env` or place passwords/API keys/private tokens in the repository.

## Apache

The included `public/.htaccess` sends non-file requests to the PHP front controller. Enable Apache's rewrite module if necessary.

## Nginx

Configure the site so PHP requests are passed to PHP-FPM and unknown paths are sent to `public/index.php`. The exact PHP-FPM socket/path depends on the hosting provider.

## Other PHP hosts

Many shared hosts let you select a PHP version and choose a document root. Use `public/` as the document root where possible. If the host does not support this layout, do not move files casually; adjust the server configuration instead.

## Email delivery

The contact form uses PHP's built-in `mail()` function. A local development machine often has no mail transport, so the direct-email fallback can appear locally even though the form itself is working correctly.

For production, the hosting environment must provide a working mail transport and permit the configured `MAIL_FROM` address/domain. See `docs/EMAIL.md` for the full setup and troubleshooting guide.

A successful PHP `mail()` call means the message was handed to the host's mail transport; it does not guarantee inbox delivery.

For important business mail, configure the domain's email authentication and use the mail provider recommended by the hosting provider.

## Testing after deployment

Check:

- `/`
- `/services`
- `/about`
- `/faq`
- `/contact`
- `/privacy`
- `/terms`
- `/robots.txt`
- `/sitemap.xml`
- an intentionally invalid URL for the 404 page
- contact form validation with invalid and valid values
- a real contact submission from an external browser/device
- receipt of the message at `CONTACT_EMAIL`

Also run the repository smoke tests before deployment:

```bash
composer test
```

or:

```bash
php tests/smoke.php
```

## Backups

Back up the repository and any business-specific configuration before making production changes. This application has no database in the finished starter, so there is no application database to back up.
