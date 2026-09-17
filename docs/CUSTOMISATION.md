# Customising the site

This project is designed so normal business changes happen in `config/business.php`, not inside the templates.

## 1. Business identity

Change `name`, `short_name`, `tagline`, `description`, `email`, `phone`, `location` and `service_areas`.

Set `site_url` to the real public HTTPS URL before deployment. It controls canonical links, sitemap URLs and structured data.

## 2. Branding

The `theme` section controls the main brand colour, dark brand colour, accent colour, surface colours, text and muted text. Use colours that maintain readable contrast.

The example favicon is in `public/favicon.svg`. Replace it with the business's own favicon when required.

The site does not require a logo image. The configured business name is used as the default text brand; a real logo can be added later by editing the shared layout/template if the business needs one.

## 3. Services

Each service has a unique `slug`, title, summary, description, deliverables and price text. The same entries are used by the services page and the contact form.

Use `price` for a fixed price, starting price or wording such as `Quote required`.

When adding a service, keep its `slug` unique and use lowercase letters, numbers and hyphens. The slug is used internally; the visitor sees the configured title.

## 4. Other content

Edit `hero`, `intro`, `process`, `benefits`, `testimonial`, `about` and `faq` in the same configuration file. Opening hours and social links are also configured there.

You can add or remove array entries to change the number of services, process steps, benefits and FAQs. Keep the existing field names so the reusable templates continue to work.

## 5. Navigation and pages

The main navigation is controlled by `navigation` in `config/business.php`.

The standard pages are:

- `/`
- `/services`
- `/about`
- `/faq`
- `/contact`
- `/privacy`
- `/terms`

Do not remove a navigation item without also considering whether visitors can still reach the page another way.

## 6. Contact form and email

The contact form validates input server-side and uses a CSRF token, honeypot field and short session-based submission delay.

Messages are sent through PHPMailer over SMTP. Composer dependencies must be installed before email can be sent.

Set these values in the server's `.env` file:

```text
SITE_URL=https://www.example.com
CONTACT_EMAIL=hello@example.com
MAIL_FROM=website@example.com
MAIL_FROM_NAME=Example Business
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=website@example.com
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
MAIL_AUTH=1
MAIL_TIMEOUT=15
APP_DEBUG=0
APP_TIMEZONE=Europe/London
```

`CONTACT_EMAIL` receives enquiries. `MAIL_FROM` is the authenticated/configured sender and should be permitted by the SMTP provider. The visitor's validated email is placed in `Reply-To`.

The supported encryption values are `tls`, `ssl`, `none` or blank. Authentication can be disabled with `MAIL_AUTH=0` for a suitable local development SMTP sink.

When SMTP settings are missing, incomplete or rejected, the form shows:

> We could not send your enquiry right now. Please email us directly instead.

That indicates an email transport/configuration problem, not a contact validation failure. See `docs/EMAIL.md` for complete SMTP setup and troubleshooting.

## 7. Legal pages

`/privacy` and `/terms` are starter templates. Replace them with wording appropriate to the actual business, jurisdiction, cookies/analytics usage and data practices before the site goes public.

The configuration also contains placeholder business-registration wording. Replace it where applicable.

## What not to edit

Do not put passwords, API keys, SMTP credentials or other secrets into Git. Keep secrets in `.env` or the hosting provider's environment/secret settings.

Avoid editing templates merely to change normal business wording. Change the configuration first.

Edit templates and application code only when changing reusable site behaviour or adding a genuinely new capability.
