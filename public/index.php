<?php

declare(strict_types=1);

require dirname(__DIR__) . '/src/bootstrap.php';
require $basePath . '/src/contact.php';

$currentPath = current_path();
$formData = [];
$formErrors = [];
$rateLimited = false;

if ($currentPath === '/robots.txt') {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "User-agent: *\nAllow: /\nDisallow: /.env\n\nSitemap: " . absolute_url('/sitemap.xml', $business) . "\n";
    exit;
}

if ($currentPath === '/sitemap.xml') {
    header('Content-Type: application/xml; charset=UTF-8');
    $pages = ['/', '/services', '/about', '/faq', '/contact', '/privacy', '/terms'];
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($pages as $page) {
        echo '<url><loc>' . e(absolute_url($page, $business)) . '</loc></url>';
    }
    echo '</urlset>';
    exit;
}

if ($currentPath === '/contact' && is_post()) {
    start_session();

    if (!csrf_valid($_POST['csrf_token'] ?? null)) {
        $formErrors['form'] = 'Your session has expired. Please reload the page and try again.';
    } elseif (!can_submit_contact()) {
        $rateLimited = true;
        $formErrors['form'] = 'Please wait a few seconds before sending another enquiry.';
    } else {
        [$formData, $formErrors] = validate_contact($_POST, $business);
        if ($formErrors === []) {
            if (send_contact_message($formData, $business)) {
                $_SESSION['last_contact_submit'] = time();
                flash_set('success', 'Thanks. Your enquiry has been sent. We will get back to you using the contact details you provided.');
                redirect('/contact#form');
            }
            $formErrors['form'] = 'We could not send your enquiry right now. Please email us directly instead.';
        }
    }
} elseif ($currentPath === '/contact' && isset($_GET['service'])) {
    $service = (string) $_GET['service'];
    if (in_array($service, array_column($business['services'], 'slug'), true)) {
        $formData['service'] = $service;
    }
}

switch ($currentPath) {
    case '/':
        $pageTitle = $business['name'] . ' | ' . $business['tagline'];
        $pageDescription = $business['description'];
        $template = '/templates/home.php';
        break;
    case '/services':
        $pageTitle = 'Services | ' . $business['name'];
        $pageDescription = 'Services provided by ' . $business['name'] . '.';
        $template = '/templates/services.php';
        break;
    case '/about':
        $pageTitle = 'About | ' . $business['name'];
        $pageDescription = 'Learn more about ' . $business['name'] . ' and how it works.';
        $template = '/templates/about.php';
        break;
    case '/faq':
        $pageTitle = 'FAQ | ' . $business['name'];
        $pageDescription = 'Frequently asked questions about ' . $business['name'] . '.';
        $template = '/templates/faq.php';
        break;
    case '/contact':
        $pageTitle = 'Contact | ' . $business['name'];
        $pageDescription = 'Contact ' . $business['name'] . ' to discuss your requirements.';
        $template = '/templates/contact.php';
        break;
    case '/privacy':
        $pageTitle = 'Privacy notice | ' . $business['name'];
        $pageDescription = 'Privacy information for ' . $business['name'] . '.';
        $template = '/templates/privacy.php';
        break;
    case '/terms':
        $pageTitle = 'Terms of service | ' . $business['name'];
        $pageDescription = 'Terms of service for ' . $business['name'] . '.';
        $template = '/templates/terms.php';
        break;
    default:
        http_response_code(404);
        $pageTitle = 'Page not found | ' . $business['name'];
        $pageDescription = 'The requested page could not be found.';
        $template = '/templates/404.php';
        break;
}

$flash = flash_get();
ob_start();
require $basePath . $template;
$content = ob_get_clean();
require $basePath . '/templates/layout.php';
