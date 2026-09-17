<?php

declare(strict_types=1);

$title = $pageTitle ?? $business['name'];
$description = $pageDescription ?? $business['description'];
$path = $currentPath ?? current_path();
$flash = $flash ?? null;
$theme = $business['theme'];
?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($description) ?>">
    <meta name="theme-color" content="<?= e($theme['brand']) ?>">
    <link rel="canonical" href="<?= e(absolute_url($path, $business)) ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($title) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <meta property="og:url" content="<?= e(absolute_url($path, $business)) ?>">
    <title><?= e($title) ?></title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/css/app.css">
    <script type="application/ld+json"><?= json_ld($business) ?></script>
</head>
<body style="--brand:<?= e($theme['brand']) ?>;--brand-dark:<?= e($theme['brand_dark']) ?>;--accent:<?= e($theme['accent']) ?>;--surface:<?= e($theme['surface']) ?>;--surface-alt:<?= e($theme['surface_alt']) ?>;--text:<?= e($theme['text']) ?>;--muted:<?= e($theme['muted']) ?>;">
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="/" aria-label="<?= e($business['name']) ?> home">
            <span class="brand-mark" aria-hidden="true"><?= e(strtoupper(substr($business['short_name'], 0, 1))) ?></span>
            <span><?= e($business['name']) ?></span>
        </a>
        <nav aria-label="Primary navigation">
            <ul class="nav-list">
                <?php foreach ($business['navigation'] as $item): ?>
                    <li><a class="<?= $path === $item['href'] ? 'active' : '' ?>" href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <a class="header-cta" href="<?= e($business['primary_action']['href']) ?>"><?= e($business['primary_action']['label']) ?></a>
    </div>
</header>
<?php if ($flash): ?>
    <div class="flash <?= e((string) ($flash['type'] ?? 'info')) ?>" role="status">
        <div class="container"><?= e((string) ($flash['message'] ?? '')) ?></div>
    </div>
<?php endif; ?>
<main id="main">
    <?= $content ?>
</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <a class="brand footer-brand" href="/"><span class="brand-mark" aria-hidden="true"><?= e(strtoupper(substr($business['short_name'], 0, 1))) ?></span><span><?= e($business['name']) ?></span></a>
            <p><?= e($business['tagline']) ?></p>
            <p class="muted">Serving <?= e(implode(' · ', $business['service_areas'])) ?></p>
        </div>
        <div>
            <h2 class="footer-heading">Contact</h2>
            <p><a href="mailto:<?= e($business['email']) ?>"><?= e($business['email']) ?></a><br><a href="tel:<?= e($business['phone']) ?>"><?= e($business['phone']) ?></a></p>
        </div>
        <div>
            <h2 class="footer-heading">Opening hours</h2>
            <?php foreach ($business['hours'] as $row): ?>
                <p class="hours"><span><?= e($row['day']) ?></span><span><?= e($row['hours']) ?></span></p>
            <?php endforeach; ?>
        </div>
        <div>
            <h2 class="footer-heading">Information</h2>
            <p><a href="/privacy">Privacy notice</a><br><a href="/terms">Terms of service</a></p>
            <p class="social-links">
                <?php foreach ($business['social'] as $social): ?>
                    <a href="<?= e($social['href']) ?>" target="_blank" rel="noopener noreferrer"><?= e($social['label']) ?></a>
                <?php endforeach; ?>
            </p>
        </div>
    </div>
    <div class="container footer-bottom">
        <p>&copy; <?= date('Y') ?> <?= e($business['name']) ?>. All rights reserved.</p>
        <p><?= e($business['legal']['business_registration']) ?></p>
    </div>
</footer>
</body>
</html>
