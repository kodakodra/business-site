# Business Site

A configurable brochure-style website starter for small businesses and service providers.

The project is deliberately reusable. The same application can be adapted for an agency, consultant, freelancer, trade, local service, studio, professional service, or another business whose main goal is to explain what it does and generate enquiries.

Portfolio and e-commerce sites are intentionally out of scope here; this project focuses on service/brochure-style businesses.

## Current version

The first working version uses plain PHP and a small amount of CSS. There is no framework and no database yet. The goal is to keep the foundation easy to understand, cheap to host, and straightforward to customise.

The demo business is fictional. Its details live in `config/business.php` so they can be replaced without changing the page templates.

## Requirements

You need:

- PHP 8.2 or newer
- Git

Composer is not currently required. It is included later only if the project gains a dependency that justifies it.

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
php -S localhost:8000 -t public
```

Then open:

http://localhost:8000

To stop the development server, press `Ctrl+C` in the terminal running it.

## Change the business details

Open:

`config/business.php`

This is the main business-content file. It currently controls the business name, tagline, description, contact details, navigation, services, highlights, and primary call to action.

For a new business, change the values there first. Do not edit the HTML templates just to change normal business content.

## Project structure

```text
business-site/
├── config/
│   └── business.php       # Business-specific content and settings
├── public/
│   ├── index.php          # Web entry point
│   └── css/app.css        # Site styles
├── src/
│   └── helpers.php        # Small reusable PHP helpers
├── templates/
│   ├── home.php           # Home page content
│   └── layout.php         # Shared HTML document/header/footer
├── .env.example           # Example environment settings
├── .gitignore
├── composer.json
└── README.md
```

### What happens when a visitor opens the site?

1. The web server points at `public/`.
2. `public/index.php` loads the business configuration and shared helpers.
3. The requested path is checked.
4. The appropriate template is rendered.
5. `templates/layout.php` supplies the shared document, navigation and footer.

This keeps public web files separate from configuration and application code.

## Environment configuration

`.env.example` documents the environment values we expect the project to use. The current first version does not require an environment loader, so do not create a real `.env` file unless a later feature requires one.

Never commit passwords, API keys, SMTP credentials, private tokens, or other secrets to Git.

## Development rules

Keep business content in configuration whenever practical. Keep reusable markup in templates. Keep browser-facing assets under `public/`.

Make small, descriptive commits. Update the README whenever setup or behaviour changes.

## Roadmap

The project will grow toward a complete reusable business-site system. Planned areas include:

- Reusable content sections and page types
- Better configuration for branding and business categories
- Proper contact/enquiry forms with validation and spam protection
- Email delivery configuration
- Optional testimonials, FAQs, service areas, opening hours and social links
- Structured metadata and SEO controls
- Accessibility and responsive testing
- Error pages and production error handling
- Security hardening
- Automated tests
- Deployment guides for common hosting setups

## Status

This repository is under active development on `feature/business-startup`. The `main` branch is intended to contain completed, reviewable work.

## License

License details will be decided when the intended distribution model is established.
