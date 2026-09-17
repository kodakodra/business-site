<?php

declare(strict_types=1);

$title = $pageTitle ?? $business['name'];
$description = $pageDescription ?? $business['description'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($description) ?>">
    <title><?= e($title) ?></title>
    <link rel="stylesheet" href="<?= e(url('css/app.css')) ?>">
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="/" aria-label="<?= e($business['name']) ?> home">
            <?= e($business['name']) ?>
        </a>
        <nav aria-label="Primary navigation">
            <ul class="nav-list">
                <?php foreach ($business['navigation'] as $item): ?>
                    <li><a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<main id="main">
    <?= $content ?>
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <div>
            <strong><?= e($business['name']) ?></strong>
            <p><?= e($business['tagline']) ?></p>
        </div>
        <div>
            <p><a href="mailto:<?= e($business['email']) ?>"><?= e($business['email']) ?></a></p>
            <p><?= e($business['location']) ?></p>
        </div>
    </div>
</footer>
</body>
</html>
