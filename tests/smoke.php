<?php

declare(strict_types=1);

$root = dirname(__DIR__);
require $root . '/src/helpers.php';
$business = require $root . '/config/business.php';
require $root . '/src/contact.php';

$passed = 0;
$failed = 0;

function check(bool $condition, string $message): void
{
    global $passed, $failed;
    if ($condition) {
        $passed++;
        echo "PASS: {$message}\n";
        return;
    }
    $failed++;
    echo "FAIL: {$message}\n";
}

check($business['name'] !== '', 'business name is configured');
check(count($business['services']) >= 3, 'at least three services exist');
check(count(array_unique(array_column($business['services'], 'slug'))) === count($business['services']), 'service slugs are unique');
check(e('<script>') === '&lt;script&gt;', 'HTML escaping works');
check(url('services') === '/services', 'URL helper normalises paths');
check(str_contains(json_ld($business), 'schema.org'), 'structured data is generated');

[$validData, $validErrors] = validate_contact([
    'name' => 'Jane Example',
    'email' => 'jane@example.com',
    'phone' => '+44 20 1234 5678',
    'service' => $business['services'][0]['slug'],
    'message' => 'I would like to discuss a new project and understand the next steps.',
    'website' => '',
], $business);
check($validErrors === [], 'valid contact data passes validation');
check($validData['email'] === 'jane@example.com', 'contact data is retained');

[, $invalidErrors] = validate_contact([
    'name' => 'A',
    'email' => 'not-an-email',
    'phone' => 'letters',
    'service' => 'not-real',
    'message' => 'Too short',
    'website' => '',
], $business);
check(isset($invalidErrors['name'], $invalidErrors['email'], $invalidErrors['phone'], $invalidErrors['service'], $invalidErrors['message']), 'invalid contact data is rejected');

[, $spamErrors] = validate_contact([
    'name' => 'Bot',
    'email' => 'bot@example.com',
    'message' => 'This is a spam submission caught by the honeypot.',
    'website' => 'https://spam.example',
], $business);
check(isset($spamErrors['form']), 'honeypot submissions are rejected');

printf("\n%d test(s) passed, %d failed.\n", $passed, $failed);
exit($failed === 0 ? 0 : 1);
