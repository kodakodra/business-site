<?php

declare(strict_types=1);

$title = $pageTitle ?? $business['name'];
$description = $pageDescription ?? $business['description'];
$currentPath = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/') ?: '/';
$branding = $business['branding'] ?? [];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($description) ?>">
    <meta name="theme-color" content="<?= e($branding['ink'] ?? '#172033') ?>">
    <title><?= e($title) ?></title>
    <link rel="stylesheet" href="<?= e(url('css/app.css')) ?>">
    <style>
        :root {
            --ink: <?= e($branding['ink'] ?? '#172033') ?>;
            --accent: <?= e($branding['accent'] ?? '#4f46e5') ?>;
            --accent-dark: <?= e($branding['accent_dark'] ?? '#3730a3') ?>;
            --page-background: <?= e($branding['background'] ?? '#f7f8fb') ?>;
            --soft-background: <?= e($branding['soft_background'] ?? '#edf1f6') ?>;
            --soft: <?= e($branding['soft_background'] ?? '#edf1f6') ?>;
        }
    </style>
</head>
<body style="background: var(--page-background);">
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="/" aria-label="<?= e($business['name']) ?> home">
            <span class="brand-mark" aria-hidden="true"></span>
            <?= e($business['name']) ?>
        </a>
        <nav aria-label="Primary navigation">
            <ul class="nav-list">
                <?php foreach ($business['navigation'] as $item): ?>
                    <?php $itemPath = rtrim(parse_url($item['href'], PHP_URL_PATH) ?: '/', '/') ?: '/'; ?>
                    <li><a class="<?= $currentPath === $itemPath ? 'is-active' : '' ?>" href="<?= e($item['href']) ?>" <?= $currentPath === $itemPath ? 'aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <a class="header-cta" href="<?= e($business['primary_action']['href']) ?>"><?= e($business['primary_action']['label']) ?></a>
    </div>
</header>

<main id="main">
    <?= $content ?>
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <a class="brand footer-brand" href="/"><span class="brand-mark" aria-hidden="true"></span><?= e($business['name']) ?></a>
            <p><?= e($business['tagline']) ?></p>
            <p class="footer-muted"><?= e($business['service_area']) ?></p>
        </div>
        <div>
            <p class="footer-label">Contact</p>
            <p><a href="mailto:<?= e($business['email']) ?>"><?= e($business['email']) ?></a></p>
            <p><a href="tel:<?= e($business['phone']) ?>"><?= e($business['phone']) ?></a></p>
        </div>
        <div>
            <p class="footer-label">Opening hours</p>
            <?php foreach ($business['opening_hours'] as $hours): ?>
                <p><strong><?= e($hours['days']) ?>:</strong> <?= e($hours['hours']) ?></p>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container footer-bottom footer-bottom-row">
        <p>© <?= date('Y') ?> <?= e($business['name']) ?>. All rights reserved.</p>
        <?php if (!empty($business['social_links'])): ?>
            <div class="social-links" aria-label="Social links">
                <?php foreach ($business['social_links'] as $social): ?>
                    <a href="<?= e($social['href']) ?>" target="_blank" rel="noopener noreferrer"><?= e($social['label']) ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</footer>
</body>
</html>
