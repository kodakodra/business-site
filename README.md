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
- PHPMailer SMTP contact delivery with configurable authentication and TLS
- Canonical URLs, Open Graph metadata and Schema.org JSON-LD
- Dynamic `robots.txt` and `sitemap.xml`
- Custom 404 and production-friendly 500 response
- Accessible navigation, labels, focus states, semantic HTML and reduced-motion support
- Apache rewrite configuration plus PHP built-in development router
- Smoke tests with dependency checks
- Beginner-focused customisation and deployment documentation

## Requirements

- PHP 8.2 or newer
- Composer
- Git

PHPMailer is installed through Composer. The production application therefore requires the Composer dependencies to be installed before the contact form can send email.

## Quick start

Clone the repository:

```bash
git clone https://github.com/kodakodra/business-site.git
cd business-site
```

Install dependencies:

```bash
composer install
```

Create a local environment file when you want to run the contact form with SMTP:

```bash
cp .env.example .env
```

Set the SMTP values in `.env` using your mail provider's settings. See `docs/EMAIL.md` for the exact fields.

For local development:

```bash
composer run serve
```

Or:

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

The smoke test checks the business configuration, helper functions, structured data generation, PHPMailer availability and contact validation without sending email.

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

## Contact form and email

The contact form is wired to PHPMailer and sends through SMTP. It does not rely on PHP's `mail()` function or a local sendmail installation.

Configure these values in the server-side `.env` file:

```text
CONTACT_EMAIL=hello@example.com
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=hello@example.com
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
MAIL_AUTH=1
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Example Business"
MAIL_TIMEOUT=15
```

The application supports STARTTLS on port `587`, implicit TLS on port `465`, or no encryption when explicitly configured for a suitable development SMTP server. The visitor's validated email address is used as `Reply-To`, not as the sender address.

When SMTP settings are missing or invalid, the form deliberately shows:

> We could not send your enquiry right now. Please email us directly instead.

That indicates an email transport/configuration problem rather than silently pretending the message was sent.

See `docs/EMAIL.md` and `docs/DEPLOYMENT.md` for setup and troubleshooting.

`.env` is ignored by Git. Never commit passwords, API keys, private tokens or SMTP credentials.

## Environment settings

The included `.env.example` contains safe placeholder values for all supported settings. Copy it to `.env` for local/server configuration and replace the example SMTP values before using the contact form.

## Project structure

```text
business-site/
├── config/
│   └── business.php          # Business-specific content and theme
├── public/
│   ├── css/app.css           # Browser-facing styles
│   ├── favicon.svg           # Example favicon
│   ├── index.php             # Application front controller
│   ├── router.php             # Local PHP server router
│   └── .htaccess              # Apache routing rules
├── src/
│   ├── bootstrap.php         # Environment, headers and application setup
│   ├── contact.php           # Contact validation and PHPMailer delivery
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
│   ├── DEPLOYMENT.md
│   └── EMAIL.md
├── .env.example
├── .gitignore
├── composer.json
├── LICENSE
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
3. Set `CONTACT_EMAIL` and `MAIL_FROM_ADDRESS`.
4. Install Composer dependencies with `composer install`.
5. Configure and test the PHPMailer SMTP connection.
6. Send and receive a real test enquiry from the deployed site.
7. Point the domain document root at `public/`.
8. Set `APP_DEBUG=0`.
9. Replace the example legal content with wording appropriate to the actual business and jurisdiction.
10. Replace the example favicon and social links.
11. Run the smoke tests and manually check every route.

See `docs/CUSTOMISATION.md`, `docs/EMAIL.md` and `docs/DEPLOYMENT.md` for the detailed setup procedure.

## Design decisions

This project does not include a database, admin dashboard, CMS, authentication system or third-party frontend framework. PHPMailer is the deliberate exception because reliable SMTP email delivery is a core requirement of the contact workflow.

The intended model is: **configure the business, configure SMTP, deploy the site, generate enquiries, maintain the content**.

## Status

The reusable brochure/service-business starter is feature-complete. Future work should be treated as a new project or an explicitly reopened feature rather than an expected part of this baseline.

## Support

If you find this project useful or use it in your own work, donations are appreciated. They are completely optional and are not required to use, modify or distribute the project under the MIT License. Any support helps fund future development and other open-source work.

## License

This project is licensed under the MIT License. See `LICENSE` for the full licence text.
