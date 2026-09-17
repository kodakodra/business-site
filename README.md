# Business Site

A configurable brochure-style website starter for small businesses and service providers.

The project is deliberately reusable. The same application can be adapted for an agency, consultant, freelancer, trade, local service, studio, professional service, booking-led business, or another company whose main goal is to explain what it does and generate enquiries.

Portfolio and e-commerce sites are intentionally out of scope here; separate projects can handle those requirements.

## Current version

The current version uses plain PHP and CSS. There is no framework and no database yet. The foundation is intentionally small, easy to understand, inexpensive to host, and straightforward to customise.

The demo business is fictional. Its details live in `config/business.php`, while reusable page structure lives in `templates/`.

## Requirements

You need:

- PHP 8.2 or newer
- Git

Composer is not currently required by the application.

## Get the project

Clone the repository:

```bash
git clone https://github.com/kodakodra/business-site.git
cd business-site
```

Switch to the development branch when working on this project:

```bash
git checkout feature/business-startup
git pull origin feature/business-startup
```

## Run it locally

From the project directory:

```bash
php -S localhost:8000 -t public public/router.php
```

Then open `http://localhost:8000` in a browser.

The extra `public/router.php` argument is intentional. It lets PHP's built-in development server serve real assets such as CSS directly while sending application URLs such as `/services` and `/contact` through the site's front controller.

For production, configure the web server's document root as `public/`. The included `public/.htaccess` provides the equivalent routing rules for Apache.

To stop the development server, press `Ctrl+C` in the terminal running it.

## Pages

The current site provides:

| URL | Purpose |
| --- | --- |
| `/` | Home page and primary sales message |
| `/services` | Full service catalogue |
| `/about` | Business story, process and trust content |
| `/faq` | Frequently asked questions |
| `/contact` | Contact details and enquiry guidance |
| Any unknown URL | Custom 404 page |

## Change the business

Open:

`config/business.php`

This is the main business-content file. It controls the business name, tagline, description, contact information, service area, navigation, calls to action, services, highlights, process steps, testimonial and FAQs.

For a new business, change the values in this file first. Avoid editing the templates just to replace ordinary business content.

### Things you can change

- Business name and tagline
- Contact email and phone number
- Location and service area
- Navigation labels and links
- Primary call-to-action wording
- Services and their deliverables
- Selling points / highlights
- How the business works
- Customer testimonial
- Frequently asked questions

The structure is intentionally generic. A real business can replace the demo wording with its own without rebuilding the application.

## Project structure

```text
business-site/
├── config/
│   └── business.php       # Business-specific content
├── public/
│   ├── .htaccess          # Apache routing rules
│   ├── css/app.css        # Browser-facing styles
│   ├── index.php          # Web entry point and router
│   └── router.php         # PHP development-server router
├── src/
│   └── helpers.php        # Small reusable PHP helpers
├── templates/
│   ├── 404.php            # Not-found page
│   ├── about.php          # About page
│   ├── contact.php        # Contact page
│   ├── faq.php            # FAQ page
│   ├── home.php           # Home page
│   ├── layout.php         # Shared document/header/footer
│   └── services.php       # Services page
├── .env.example           # Example environment variables
├── .gitignore
├── composer.json
└── README.md
```

### What happens when a visitor opens the site?

1. The web server points at `public/`.
2. The request reaches the front controller.
3. `public/index.php` loads the business configuration and shared helpers.
4. The requested URL is matched against the site's routes.
5. The matching template is rendered.
6. `templates/layout.php` wraps the page with the shared HTML document, navigation and footer.

This keeps public web assets separate from business configuration and application code.

## Environment configuration

`.env.example` documents environment values that future features may use. The current application does not need a real `.env` file.

Never commit passwords, API keys, SMTP credentials, private tokens, or other secrets to Git.

## Development workflow

Work on `feature/*` branches and merge completed work into `main`.

Keep commits focused and descriptive. Update the README whenever setup, configuration, deployment or behaviour changes.

Before considering a feature complete, test it on a narrow mobile viewport and a desktop viewport, check keyboard navigation, and confirm that invalid URLs produce the intended 404 page.

## Roadmap

The reusable business-site system is intended to grow without becoming tied to one industry. Planned capabilities include:

- Optional content sections controlled by configuration
- Branding and theme configuration
- Opening hours, social links and service areas
- Testimonials and case studies for service businesses
- Proper enquiry forms with validation and spam protection
- Configurable email delivery
- Optional booking integrations
- Structured metadata and SEO controls
- Accessibility and responsive testing
- Production error handling and logging
- Security hardening
- Automated tests
- Deployment guides for common PHP hosting environments

## Status

This repository is under active development on `feature/business-startup`. The `main` branch is intended for completed, reviewable work.

## License

License details will be decided when the intended distribution model is established.
