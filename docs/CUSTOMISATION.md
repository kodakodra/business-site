# Customising the site

This project is designed so normal business changes happen in `config/business.php`, not inside the templates.

## 1. Business identity

Change `name`, `short_name`, `tagline`, `description`, `email`, `phone`, `location` and `service_areas`.

Set `site_url` to the real public HTTPS URL before deployment. It controls canonical links, sitemap URLs and structured data.

## 2. Branding

The `theme` section controls the main brand colour, dark brand colour, accent colour, surface colours, text and muted text. Use colours that maintain readable contrast.

The example favicon is in `public/favicon.svg`. Replace it with the business's own favicon if required.

## 3. Services

Each service has a unique `slug`, title, summary, description, deliverables and price text. The same entries are used by the services page and the contact form.

Use `price` for a fixed price, starting price or wording such as `Quote required`.

## 4. Other content

Edit `hero`, `intro`, `process`, `benefits`, `testimonial`, `about` and `faq` in the same configuration file. Opening hours and social links are also configured there.

## 5. Contact form

The form validates input server-side, uses a CSRF token, a honeypot field and a short session-based submission delay. Messages are sent using PHP's `mail()` function.

Set these environment values in `.env` on the server:

```text
SITE_URL=https://www.example.com
CONTACT_EMAIL=hello@example.com
MAIL_FROM=website@example.com
APP_DEBUG=0
APP_TIMEZONE=Europe/London
```

The hosting provider must provide a working mail transport. If `mail()` is disabled or unavailable, the site displays a direct-email fallback instead of pretending the enquiry was sent.

## 6. Legal pages

`/privacy` and `/terms` are generic templates. Replace them with wording appropriate to the actual business, jurisdiction and data practices before the site goes public.

## What not to edit

Do not put passwords, API keys or SMTP credentials into Git. Keep secrets in `.env` or the hosting provider's environment settings.

Avoid editing templates merely to change normal business wording. Change the configuration first.
