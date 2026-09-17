<?php

declare(strict_types=1);

$requestedPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$file = __DIR__ . $requestedPath;

if ($requestedPath !== '/' && is_file($file)) {
    return false;
}

require __DIR__ . '/index.php';
