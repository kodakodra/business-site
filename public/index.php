<?php

declare(strict_types=1);

$basePath = dirname(__DIR__);
$business = require $basePath . '/config/business.php';
require $basePath . '/src/helpers.php';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

switch ($path) {
    case '/':
    case '/index.php':
        $pageTitle = $business['name'] . ' | ' . $business['tagline'];
        $pageDescription = $business['description'];
        ob_start();
        require $basePath . '/templates/home.php';
        $content = ob_get_clean();
        break;
    default:
        http_response_code(404);
        $pageTitle = 'Page not found | ' . $business['name'];
        $pageDescription = 'The requested page could not be found.';
        $content = '<section class="section"><div class="container narrow"><p class="eyebrow">404</p><h1>Page not found</h1><p>The page you requested does not exist.</p><a class="button" href="/">Return home</a></div></section>';
        break;
}

require $basePath . '/templates/layout.php';
