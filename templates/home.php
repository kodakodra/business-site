<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow"><?= e($business['hero']['eyebrow']) ?></p>
            <h1><?= e($business['hero']['title']) ?></h1>
            <p class="lede"><?= e($business['hero']['body']) ?></p>
            <div class="actions">
                <a class="button" href="<?= e($business['primary_action']['href']) ?>"><?= e($business['primary_action']['label']) ?></a>
                <a class="button button-secondary" href="<?= e($business['secondary_action']['href']) ?>"><?= e($business['secondary_action']['label']) ?></a>
            </div>
        </div>
        <aside class="hero-card" aria-label="Business highlights">
            <span class="hero-card-label">Why customers choose us</span>
            <ul>
                <?php foreach ($business['hero']['points'] as $point): ?>
                    <li><?= e($point) ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section class="section intro-section">
    <div class="container intro-grid">
        <div>
            <p class="eyebrow"><?= e($business['intro']['eyebrow']) ?></p>
            <h2><?= e($business['intro']['title']) ?></h2>
        </div>
        <p class="large-copy"><?= e($business['intro']['body']) ?></p>
    </div>
</section>

<section class="section" id="services">
    <div class="container">
        <div class="section-heading split-heading">
            <div><p class="eyebrow">Services</p><h2>Choose the level of help that fits.</h2></div>
            <a class="text-link" href="/services">View all services</a>
        </div>
        <div class="cards service-cards">
            <?php foreach (array_slice($business['services'], 0, 3) as $service): ?>
                <article class="card service-card">
                    <div class="card-topline"><span class="pill"><?= e($service['price']) ?></span></div>
                    <h3><?= e($service['title']) ?></h3>
                    <p><?= e($service['summary']) ?></p>
                    <a class="text-link" href="/services#<?= e($service['slug']) ?>">See service details</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-muted" id="process">
    <div class="container">
        <div class="section-heading"><p class="eyebrow">How it works</p><h2>A simple path from enquiry to delivery.</h2></div>
        <div class="process-grid">
            <?php foreach ($business['process'] as $step): ?>
                <article class="process-step"><span><?= e($step['number']) ?></span><h3><?= e($step['title']) ?></h3><p><?= e($step['body']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading"><p class="eyebrow">Why work with us</p><h2>Professional where it matters. Flexible where it helps.</h2></div>
        <div class="cards benefit-cards">
            <?php foreach ($business['benefits'] as $benefit): ?>
                <article class="card"><h3><?= e($benefit['title']) ?></h3><p><?= e($benefit['body']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section testimonial-section">
    <div class="container narrow testimonial">
        <p class="eyebrow">Client feedback</p>
        <blockquote>“<?= e($business['testimonial']['quote']) ?>”</blockquote>
        <p><strong><?= e($business['testimonial']['name']) ?></strong><br><?= e($business['testimonial']['role']) ?></p>
    </div>
</section>

<section class="section cta-section">
    <div class="container cta-panel">
        <div><p class="eyebrow">Ready to start?</p><h2>Tell us what you are trying to achieve.</h2><p>Give us the basics and we will work out the sensible next step.</p></div>
        <a class="button" href="/contact">Start an enquiry</a>
    </div>
</section>
