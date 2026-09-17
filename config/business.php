<?php

declare(strict_types=1);

return [
    'name' => 'Northstar Business',
    'short_name' => 'Northstar',
    'tagline' => 'Practical services for businesses that want to move forward.',
    'description' => 'Northstar helps small and growing businesses with practical services, clear advice and dependable ongoing support.',
    'type' => 'ProfessionalService',
    'site_url' => env('SITE_URL', 'http://localhost:8000'),
    'locale' => 'en_GB',
    'email' => env('CONTACT_EMAIL', 'hello@example.com'),
    'phone' => '+44 20 0000 0000',
    'location' => 'United Kingdom',
    'service_areas' => ['United Kingdom', 'Remote / online'],
    'primary_action' => [
        'label' => 'Request a quote',
        'href' => '/contact',
    ],
    'secondary_action' => [
        'label' => 'Explore services',
        'href' => '/services',
    ],
    'navigation' => [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Services', 'href' => '/services'],
        ['label' => 'About', 'href' => '/about'],
        ['label' => 'FAQ', 'href' => '/faq'],
        ['label' => 'Contact', 'href' => '/contact'],
    ],
    'theme' => [
        'brand' => '#17324d',
        'brand_dark' => '#0e2235',
        'accent' => '#e4a84a',
        'surface' => '#f5f7fa',
        'surface_alt' => '#eaf0f5',
        'text' => '#18202a',
        'muted' => '#526170',
    ],
    'hero' => [
        'eyebrow' => 'Independent business services',
        'title' => 'Good businesses deserve clear, dependable support.',
        'body' => 'From a defined project to ongoing assistance, we help turn business needs into practical work with clear scope, straightforward communication and useful outcomes.',
        'points' => [
            'Clear scope and straightforward communication',
            'Flexible services for small and growing businesses',
            'One point of contact from enquiry to delivery',
        ],
    ],
    'intro' => [
        'eyebrow' => 'What we do',
        'title' => 'Useful help without unnecessary complexity.',
        'body' => 'Use this section to explain the core promise of the business. For a different business, replace the wording in this configuration rather than rewriting the template.',
    ],
    'services' => [
        [
            'slug' => 'consultation',
            'title' => 'Consultation',
            'summary' => 'A focused conversation to understand the problem and identify practical next steps.',
            'description' => 'Ideal for businesses that need an experienced second opinion, clearer requirements or a sensible plan before committing to a larger piece of work.',
            'deliverables' => ['Discovery call', 'Written recommendations', 'Clear next-step plan'],
            'price' => 'From £150',
        ],
        [
            'slug' => 'project-delivery',
            'title' => 'Project Delivery',
            'summary' => 'A defined service or project delivered against an agreed scope and outcome.',
            'description' => 'Suitable for one-off work where the business knows what it needs or wants help turning a broad requirement into a deliverable project.',
            'deliverables' => ['Defined scope', 'Milestones and updates', 'Final handover'],
            'price' => 'From £750',
        ],
        [
            'slug' => 'ongoing-support',
            'title' => 'Ongoing Support',
            'summary' => 'Continued help for businesses that need a reliable external partner after the initial project.',
            'description' => 'A flexible option for maintenance, advice, improvements or recurring work without the overhead of employing a specialist full-time.',
            'deliverables' => ['Monthly support allocation', 'Priority communication', 'Regular review'],
            'price' => 'From £300 / month',
        ],
        [
            'slug' => 'process-improvement',
            'title' => 'Process Improvement',
            'summary' => 'Find practical ways to reduce friction, improve consistency and make work easier to manage.',
            'description' => 'We map the current process, identify avoidable effort and agree changes that are proportionate to the size and needs of the business.',
            'deliverables' => ['Process review', 'Improvement recommendations', 'Implementation guidance'],
            'price' => 'From £500',
        ],
    ],
    'process' => [
        ['number' => '01', 'title' => 'Understand', 'body' => 'We establish what you need, why you need it and what a useful result looks like.'],
        ['number' => '02', 'title' => 'Plan', 'body' => 'You receive a clear scope, sensible priorities and an agreed approach before work begins.'],
        ['number' => '03', 'title' => 'Deliver', 'body' => 'The work is completed with practical communication, agreed checkpoints and a clear handover.'],
        ['number' => '04', 'title' => 'Support', 'body' => 'Where useful, we stay involved after delivery for maintenance, improvements or follow-up advice.'],
    ],
    'benefits' => [
        ['title' => 'Straightforward communication', 'body' => 'Plain language, clear expectations and no unnecessary jargon.'],
        ['title' => 'Services that fit', 'body' => 'Use individual services, combine them into a project or arrange ongoing support.'],
        ['title' => 'Built around outcomes', 'body' => 'The aim is useful work and measurable progress rather than activity for its own sake.'],
    ],
    'testimonial' => [
        'quote' => 'The process was clear from the first conversation. We knew what was happening, what it would cost and what we would receive.',
        'name' => 'Demo Client',
        'role' => 'Owner, Example Business',
    ],
    'about' => [
        'eyebrow' => 'About the business',
        'title' => 'Small enough to stay responsive. Structured enough to deliver properly.',
        'body' => 'This is demonstration content for the reusable starter. Replace it with the real business story, experience, qualifications, differentiators and values when adapting the site.',
    ],
    'faq' => [
        ['question' => 'What happens after I make an enquiry?', 'answer' => 'We review the requirement, contact you to clarify anything important and then recommend the most appropriate next step.'],
        ['question' => 'Do you work remotely?', 'answer' => 'Yes. The demo business is configured for UK-wide and remote work. Change the service areas in the business configuration for a local business.'],
        ['question' => 'Can services be combined?', 'answer' => 'Yes. The services are examples of reusable building blocks and can be packaged into a bespoke project or ongoing arrangement.'],
        ['question' => 'Do you provide fixed prices?', 'answer' => 'Use the example prices as a starting point. A business can publish fixed packages, starting prices, or quote-only services depending on how it sells.'],
        ['question' => 'What should I include in an enquiry?', 'answer' => 'Give enough detail to understand what you are trying to achieve, the relevant deadline and any constraints or budget information you can share.'],
        ['question' => 'Can this site be adapted to another industry?', 'answer' => 'Yes. The business content, branding, services, pages and calls to action are configuration-driven so the same foundation can support many brochure-style service businesses.'],
    ],
    'hours' => [
        ['day' => 'Monday - Friday', 'hours' => '09:00 - 17:30'],
        ['day' => 'Saturday', 'hours' => 'By appointment'],
        ['day' => 'Sunday', 'hours' => 'Closed'],
    ],
    'social' => [
        ['label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/'],
        ['label' => 'Facebook', 'href' => 'https://www.facebook.com/'],
    ],
    'legal' => [
        'privacy_contact' => env('CONTACT_EMAIL', 'hello@example.com'),
        'business_registration' => 'Replace with registration details where applicable.',
    ],
];
