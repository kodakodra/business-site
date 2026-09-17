# Business Site

A reusable, production-minded PHP brochure website for small businesses and service providers.

This project is intentionally focused on businesses whose website's primary job is to explain the business, present services, build trust and generate enquiries. Portfolio and e-commerce functionality belongs in separate projects.

## What it supports

The same codebase can be adapted for agencies, consultants, freelancers, trades, local services, professional firms, studios, advisers, maintenance companies and other service-led businesses.

Business-specific content lives primarily in `config/business.php`. The templates and application code provide the reusable site behaviour.

## Included

- Responsive home, services, about, FAQ and contact pages
- Privacy notice and terms starter pages
- Configurable branding, business details, services, pricing, hours and social links
- Server-side contact validation
- CSRF protection, honeypot spam trap and short submission throttle
- PHP `mail()` contact delivery with direct-email fallback on failure
- Canonical URLs, Open Graph metadata and Schema.org JSON-LD
- Dynamic `robots.txt` and `sitemap.xml`
- Custom 404 and production-friendly 500 response
- Accessible navigation, labels, focus states, semantic HTML and reduced-motion support
- Apache rewrite configuration plus PHP built-in development router
- Smoke tests with no testing framework dependency
- Beginner-focused customisation and deployment documentation

## Requirements

- PHP 8.2 or newer
- Git

Composer is optional. The project currently has no third-party runtime dependencies.

## Quick start

Clone the repository:

```bash
git clone https://github.com/kodakodra/business-site.git
cd business-site
```

Install the current dependencies (there are none yet, but this keeps the workflow standard):

```bash
composer install
```

For local development:

```bash
composer run serve
```

Or without Composer:

```bash
php -S localhost:8000 -t public public/router.php
```

Open `http://localhost:8000`.

Stop the server with `Ctrl+C`.

## Run tests

```bash
composer test
```

Or:

```bash
php tests/smoke.php
```

The smoke test checks the business configuration, helper functions, structured data generation and contact validation without sending email.

## Configure a business

The main configuration file is:

`config/business.php`

Update the business identity, site URL, contact details, service areas, theme, hero copy, services, process, benefits, testimonial, FAQ, opening hours and social links there.

For example:

```php
'name' => 'Example Plumbing',
'phone' => '+44 20 1234 5678',
'service_areas' => ['Kent', 'East Sussex'],
```

Normal business wording should be changed in configuration rather than copied into templates.

For a detailed guide see `docs/CUSTOMISATION.md`.

## Environment settings

Copy `.env.example` to `.env` for local or server configuration:

```text
APP_DEBUG=0
APP_TIMEZONE=Europe/London
SITE_URL=https://www.example.com
CONTACT_EMAIL=hello@example.com
MAIL_FROM=website@example.com
```

`.env` is ignored by Git. Never commit passwords, API keys, private tokens or mail credentials.

The contact form uses PHP's built-in `mail()` transport. The host must provide a working mail transport. A successful call only means the message was accepted by that transport; it does not guarantee inbox delivery.

## Project structure

```text
business-site/
├── config/
│   └── business.php          # Business-specific content and theme
├── public/
│   ├── css/app.css           # Browser-facing styles
│   ├── favicon.svg           # Example favicon
│   ├── index.php             # Application front controller
│   ├── router.php            # Local PHP server router
│   └── .htaccess              # Apache routing rules
├── src/
│   ├── bootstrap.php         # Environment, headers and application setup
│   ├── contact.php           # Contact validation and email delivery
│   └── helpers.php            # Shared PHP helpers
├── templates/
│   ├── 404.php
│   ├── about.php
│   ├── contact.php
│   ├── faq.php
│   ├── home.php
│   ├── layout.php
│   ├── privacy.php
│   ├── services.php
│   └── terms.php
├── tests/
│   └── smoke.php
├── docs/
│   ├── CUSTOMISATION.md
│   └── DEPLOYMENT.md
├── .env.example
├── .gitignore
├── composer.json
└── README.md
```

The web server should expose only `public/` as the document root.

## Routes

| Route | Purpose |
|---|---|
| `/` | Home page |
| `/services` | Service catalogue |
| `/about` | Business information and process |
| `/faq` | Frequently asked questions |
| `/contact` | Enquiry form and contact details |
| `/privacy` | Privacy notice starter |
| `/terms` | Terms of service starter |
| `/robots.txt` | Search crawler instructions |
| `/sitemap.xml` | XML sitemap |

## Production checklist

Before launch:

1. Replace the fictional business content.
2. Set a real HTTPS `SITE_URL`.
3. Set `CONTACT_EMAIL` and `MAIL_FROM`.
4. Confirm the host's PHP `mail()` transport works.
5. Point the domain document root at `public/`.
6. Set `APP_DEBUG=0`.
7. Replace the example legal content with wording appropriate to the actual business and jurisdiction.
8. Replace the example favicon and social links.
9. Run the smoke tests and manually check every route.

See `docs/DEPLOYMENT.md` for hosting guidance.

## Design decisions

This project does not include a database, admin dashboard, CMS, authentication system or third-party frontend framework. Those additions would increase operational complexity and are not necessary for the brochure-site use case.

The intended model is: **configure the business, deploy the site, generate enquiries, maintain the content**.

## Status

`feature/business-startup` is the development branch. This branch will be considered feature-complete after the current release-candidate pass. The finished starter is intended to be usable as a foundation for future business websites without further core feature work.

## License

No distribution licence has been selected yet. Add the appropriate licence before publishing this repository as a reusable package.
