<?php

declare(strict_types=1);

function validate_contact(array $input, array $business): array
{
    $data = [
        'name' => trim((string) ($input['name'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'phone' => trim((string) ($input['phone'] ?? '')),
        'service' => trim((string) ($input['service'] ?? '')),
        'message' => trim((string) ($input['message'] ?? '')),
        'website' => trim((string) ($input['website'] ?? '')),
    ];

    $errors = [];
    if ($data['website'] !== '') {
        return [$data, ['form' => 'Your message could not be submitted.']];
    }
    if ($data['name'] === '' || strlen($data['name']) < 2 || strlen($data['name']) > 100 || preg_match('/[\r\n]/', $data['name'])) {
        $errors['name'] = 'Please enter your name.';
    }
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['email']) > 254) {
        $errors['email'] = 'Please enter a valid email address.';
    }
    if ($data['phone'] !== '' && (strlen($data['phone']) > 40 || !preg_match('/^[0-9+().\s-]+$/', $data['phone']))) {
        $errors['phone'] = 'Please enter a valid phone number or leave this blank.';
    }
    $serviceSlugs = array_column($business['services'], 'slug');
    if ($data['service'] !== '' && !in_array($data['service'], $serviceSlugs, true)) {
        $errors['service'] = 'Please choose a valid service.';
    }
    if ($data['message'] === '' || strlen($data['message']) < 20 || strlen($data['message']) > 3000) {
        $errors['message'] = 'Please tell us a little more about what you need (20-3000 characters).';
    }
    return [$data, $errors];
}

function can_submit_contact(): bool
{
    start_session();
    $last = (int) ($_SESSION['last_contact_submit'] ?? 0);
    return time() - $last >= 15;
}

function send_contact_message(array $data, array $business): bool
{
    $to = (string) env('CONTACT_EMAIL', $business['email']);
    $from = (string) env('MAIL_FROM', $business['email']);
    $safeName = preg_replace('/[\r\n]+/', ' ', $data['name']) ?: 'Website visitor';
    $subject = 'Website enquiry from ' . $safeName;
    $service = $data['service'] !== '' ? $data['service'] : 'Not specified';
    $body = implode(PHP_EOL, [
        'New website enquiry', '====================', '',
        'Name: ' . $data['name'], 'Email: ' . $data['email'],
        'Phone: ' . ($data['phone'] !== '' ? $data['phone'] : 'Not provided'),
        'Service: ' . $service, '', 'Message:', $data['message'], '',
        'Sent from ' . site_origin($business),
    ]);
    $headers = [
        'From: ' . $from,
        'Reply-To: ' . $data['email'],
        'X-Mailer: PHP/' . PHP_VERSION,
        'Content-Type: text/plain; charset=UTF-8',
    ];
    return function_exists('mail') && filter_var($to, FILTER_VALIDATE_EMAIL) && filter_var($from, FILTER_VALIDATE_EMAIL)
        && mail($to, $subject, $body, implode("\r\n", $headers));
}
