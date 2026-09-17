<?php

declare(strict_types=1);

return [
    'name' => 'Northstar Business',
    'tagline' => 'Practical services for businesses that want to move forward.',
    'description' => 'A fictional demonstration business showing how the site can be adapted for agencies, consultants, trades, studios and other service providers.',
    'email' => 'hello@example.com',
    'phone' => '+44 20 0000 0000',
    'location' => 'United Kingdom',
    'service_area' => 'Serving clients locally and remotely across the UK',
    'primary_action' => [
        'label' => 'Request a quote',
        'href' => '/contact',
    ],
    'navigation' => [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Services', 'href' => '/services'],
        ['label' => 'About', 'href' => '/about'],
        ['label' => 'FAQ', 'href' => '/faq'],
        ['label' => 'Contact', 'href' => '/contact'],
    ],
    'highlights' => [
        'Clear scope and straightforward communication',
        'Flexible services for small and growing businesses',
        'A single point of contact from enquiry to delivery',
    ],
    'services' => [
        [
            'title' => 'Consultation & Planning',
            'summary' => 'Turn a requirement, problem or idea into a practical plan.',
            'description' => 'A focused discovery session followed by clear recommendations, priorities and next steps. Suitable for businesses that need direction before committing to a larger piece of work.',
            'deliverables' => ['Discovery session', 'Written recommendations', 'Prioritised action plan'],
        ],
        [
            'title' => 'Project Services',
            'summary' => 'Defined work delivered against an agreed scope and outcome.',
            'description' => 'Use this model for bespoke projects, fixed packages, installations, improvements, launches or other clearly scoped work.',
            'deliverables' => ['Agreed scope', 'Milestones and communication', 'Completed project handover'],
        ],
        [
            'title' => 'Ongoing Support',
            'summary' => 'Reliable help after the initial project is complete.',
            'description' => 'A flexible support arrangement for businesses that need regular maintenance, advice, updates or access to specialist help.',
            'deliverables' => ['Recurring support', 'Priority assistance', 'Regular review of needs'],
        ],
        [
            'title' => 'Business Improvement',
            'summary' => 'Find practical ways to improve an existing service or process.',
            'description' => 'Review how something currently works, identify friction and implement focused improvements without unnecessary disruption.',
            'deliverables' => ['Current-state review', 'Improvement recommendations', 'Implementation support'],
        ],
    ],
    'process' => [
        ['number' => '01', 'title' => 'Understand', 'description' => 'We start with the problem, the customer and the outcome you actually need.'],
        ['number' => '02', 'title' => 'Plan', 'description' => 'You receive a clear scope, approach and expectations before work begins.'],
        ['number' => '03', 'title' => 'Deliver', 'description' => 'The agreed work is completed with straightforward communication throughout.'],
        ['number' => '04', 'title' => 'Support', 'description' => 'We can hand over cleanly or continue providing help after delivery.'],
    ],
    'testimonial' => [
        'quote' => 'The process was clear from the start and the work stayed focused on what the business actually needed.',
        'name' => 'Demo Customer',
        'role' => 'Owner, Example Business',
    ],
    'faqs' => [
        ['question' => 'Do you offer fixed-price work?', 'answer' => 'Yes. Suitable projects can be quoted as a fixed scope and price. More open-ended work can use an agreed day rate, hourly rate or recurring support arrangement.'],
        ['question' => 'Can you work with an existing business or website?', 'answer' => 'Yes. The service model is designed to cover new work as well as improvements, maintenance and support for an existing setup.'],
        ['question' => 'Do you serve customers outside your local area?', 'answer' => 'Yes. The template supports local, regional, national and remote businesses. Replace the service-area wording in the configuration to match the real business.'],
        ['question' => 'How does a project usually start?', 'answer' => 'A customer makes an enquiry, the requirements are discussed, and an appropriate scope or next step is agreed before work begins.'],
        ['question' => 'Can the site be adapted to a different industry?', 'answer' => 'Yes. Business information, services, messaging, calls to action and contact details are deliberately separated from the page structure.'],
        ['question' => 'Can online booking or payments be added?', 'answer' => 'Yes. Those are capabilities that can be added later without changing the core brochure-site structure.'],
    ],
];
