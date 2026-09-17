<?php

declare(strict_types=1);

$basePath = dirname(__DIR__);
$business = require $basePath . '/config/business.php';
require $basePath . '/src/helpers.php';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = rtrim($path, '/') ?: '/';

$routes = [
    '/' => ['template' => 'home.php', 'title' => $business['name'] . ' | ' . $business['tagline'], 'description' => $business['description']],
    '/services' => ['template' => 'services.php', 'title' => 'Services | ' . $business['name'], 'description' => 'Explore the services offered by ' . $business['name'] . '.'],
    '/about' => ['template' => 'about.php', 'title' => 'About | ' . $business['name'], 'description' => 'Learn how ' . $business['name'] . ' works and what customers can expect.'],
    '/faq' => ['template' => 'faq.php', 'title' => 'FAQ | ' . $business['name'], 'description' => 'Frequently asked questions about ' . $business['name'] . '.'],
    '/contact' => ['template' => 'contact.php', 'title' => 'Contact | ' . $business['name'], 'description' => 'Contact ' . $business['name'] . ' about your requirements.'],
];

if (isset($routes[$path])) {
    $route = $routes[$path];
    $pageTitle = $route['title'];
    $pageDescription = $route['description'];

    ob_start();
    require $basePath . '/templates/' . $route['template'];
    $content = ob_get_clean();
} else {
    http_response_code(404);
    $pageTitle = 'Page not found | ' . $business['name'];
    $pageDescription = 'The requested page could not be found.';
    ob_start();
    require $basePath . '/templates/404.php';
    $content = ob_get_clean();
}

require $basePath . '/templates/layout.php';
