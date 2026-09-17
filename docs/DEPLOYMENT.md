# Deployment

## Before going live

1. Copy the project to a PHP 8.2+ web host.
2. Ensure Composer is available during deployment and run `composer install --no-dev --optimize-autoloader` from the project root.
3. Point the domain's document root at the `public/` directory. Do not expose the project root as the document root.
4. Copy `.env.example` to `.env` on the server and replace the example values.
5. Set `APP_DEBUG=0`.
6. Set `SITE_URL` to the site's real HTTPS URL.
7. Set `CONTACT_EMAIL` to the address that should receive enquiries.
8. Configure the PHPMailer SMTP settings (`MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION` and `MAIL_AUTH`).
9. Set `MAIL_FROM` to a real mailbox/domain address accepted by the SMTP provider and set `MAIL_FROM_NAME` to the business display name.
10. Enable HTTPS at the host.
11. Replace the example legal content and demo business data before launch.

## Environment file

Create `.env` from `.env.example` and set real production values, for example:

```text
APP_DEBUG=0
APP_TIMEZONE=Europe/London
SITE_URL=https://www.example.com
CONTACT_EMAIL=hello@example.com
MAIL_FROM=website@example.com
MAIL_FROM_NAME=Example Business
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=website@example.com
MAIL_PASSWORD=replace-with-real-password
MAIL_ENCRYPTION=tls
MAIL_AUTH=1
MAIL_TIMEOUT=15
```

Use the exact SMTP hostname, port, encryption mode and credentials supplied by the mail provider.

Never commit `.env` or place passwords/API keys/private tokens in the repository.

## Apache

The included `public/.htaccess` sends non-file requests to the PHP front controller. Enable Apache's rewrite module if necessary.

## Nginx

Configure the site so PHP requests are passed to PHP-FPM and unknown paths are sent to `public/index.php`. The exact PHP-FPM socket/path depends on the hosting provider.

## Other PHP hosts

Many shared hosts let you select a PHP version and choose a document root. Use `public/` as the document root where possible. If the host does not support this layout, do not move files casually; adjust the server configuration instead.

## Email delivery

The contact form uses PHPMailer with SMTP. It does not depend on PHP's built-in `mail()` function or a local sendmail installation.

The SMTP provider must allow the configured sender address and provide the hostname, port, authentication and TLS requirements used in `.env`. The application supports STARTTLS, implicit TLS and explicitly configured unencrypted SMTP for suitable development environments.

The visitor's address is placed in `Reply-To`, while `MAIL_FROM` remains the authenticated/configured sender address.

See `docs/EMAIL.md` for the full setup and troubleshooting guide.

A successful SMTP submission means the SMTP server accepted the message; it does not guarantee final inbox delivery.

For important business mail, configure the domain's email authentication recommended by the mail provider.

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
- replying to the received enquiry and confirming the visitor is the reply target

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
