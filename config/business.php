<?php

declare(strict_types=1);

return [
    'name' => 'Northstar Business',
    'tagline' => 'Practical services for businesses that want to move forward.',
    'description' => 'A fictional demo business used to demonstrate how this reusable site can be adapted for different service businesses.',
    'email' => 'hello@example.com',
    'phone' => '+44 20 0000 0000',
    'location' => 'United Kingdom',
    'primary_action' => [
        'label' => 'Request a quote',
        'href' => '#contact',
    ],
    'navigation' => [
        ['label' => 'Services', 'href' => '#services'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'Contact', 'href' => '#contact'],
    ],
    'services' => [
        [
            'title' => 'Consultation',
            'description' => 'A focused conversation to understand what you need and identify practical next steps.',
        ],
        [
            'title' => 'Project Delivery',
            'description' => 'A defined service or project delivered with clear scope, communication and agreed outcomes.',
        ],
        [
            'title' => 'Ongoing Support',
            'description' => 'Reliable support for businesses that need continued help after the initial project is complete.',
        ],
    ],
    'highlights' => [
        'Clear scope and straightforward communication',
        'Flexible services for small and growing businesses',
        'A single point of contact from enquiry to delivery',
    ],
];
