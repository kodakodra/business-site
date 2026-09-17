# Business Site

A configurable, production-minded website starter for small businesses and service providers.

The goal is simple: one reusable codebase that can be adapted to many types of businesses without rebuilding the site from scratch.

## What this project is

This project is being developed as a reusable business website foundation rather than a website for one fictional company.

It is intended to support businesses such as:

- Web and software services
- Consultants and freelancers
- Creative studios and agencies
- Trades and home services
- Local professional services
- Booking-based businesses
- Small companies selling services or packages

Business-specific content should live in configuration/data wherever practical. The site structure, components, accessibility, responsive behaviour, and general functionality should remain reusable.

## Project principles

- **Configuration over duplication** — change business data before changing application code.
- **Documentation first** — assume the person setting this up may not be a developer.
- **Accessible by default** — semantic HTML, keyboard support, readable contrast, labels, and useful focus states.
- **Responsive by default** — the site must work on phones, tablets, and desktop screens.
- **Production-minded** — sensible environment configuration, validation, error handling, security basics, and deployment documentation.
- **Simple dependencies** — avoid adding packages unless they solve a real problem.
- **Maintainable structure** — separate presentation, business content, configuration, and infrastructure concerns.

## Current status

The repository is at the initial project stage. The application architecture, technology stack, and first reusable page system will be added on the `feature/business-startup` branch.

## Getting started

Setup instructions will be added as the application is established. They will cover prerequisites, installation, configuration, local development, testing, production builds, deployment, and common troubleshooting steps.

## Configuration concept

A business should eventually be able to define things such as:

- Business name and tagline
- Logo and visual identity
- Contact details
- Service categories
- Services and pricing
- Opening hours
- Service areas
- Calls to action
- Testimonials
- Frequently asked questions
- Social links
- Booking or enquiry behaviour

The exact schema will be documented when implemented.

## Development workflow

Work is developed on feature branches and merged into `main` when complete.

Keep commits focused and descriptive. Update documentation whenever setup, configuration, behaviour, or deployment requirements change.

## License

License details will be added once the intended distribution model is decided.
