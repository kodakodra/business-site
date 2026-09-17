<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Service business</p>
            <h1><?= e($business['tagline']) ?></h1>
            <p class="lede"><?= e($business['description']) ?></p>
            <div class="actions">
                <a class="button" href="<?= e($business['primary_action']['href']) ?>"><?= e($business['primary_action']['label']) ?></a>
                <a class="button button-secondary" href="/services">Explore services</a>
            </div>
        </div>
        <aside class="hero-card" aria-label="Business highlights">
            <span class="hero-card-label">Why customers choose us</span>
            <ul>
                <?php foreach ($business['highlights'] as $highlight): ?>
                    <li><?= e($highlight) ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section id="services" class="section">
    <div class="container">
        <div class="section-heading split-heading">
            <div>
                <p class="eyebrow">Services</p>
                <h2>Help where you need it.</h2>
            </div>
            <p>Use these service blocks for fixed packages, bespoke work, recurring support or a mixture of all three.</p>
        </div>
        <div class="cards">
            <?php foreach (array_slice($business['services'], 0, 3) as $service): ?>
                <article class="card">
                    <h3><?= e($service['title']) ?></h3>
                    <p class="card-lead"><?= e($service['summary']) ?></p>
                    <p><?= e($service['description']) ?></p>
                    <a class="text-link" href="/services">See service details <span aria-hidden="true">→</span></a>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="section-link"><a href="/services">View all services →</a></div>
    </div>
</section>

<section class="section section-muted">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Why work with us</p>
            <h2>Built around the customer's actual requirement.</h2>
        </div>
        <div class="feature-grid">
            <?php foreach ($business['highlights'] as $index => $highlight): ?>
                <article class="feature">
                    <span class="feature-number"><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                    <p><?= e($highlight) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split-panel">
        <div>
            <p class="eyebrow">How it works</p>
            <h2>A straightforward process from first conversation to delivery.</h2>
        </div>
        <div class="mini-process">
            <?php foreach ($business['process'] as $step): ?>
                <div class="mini-process-item">
                    <span><?= e($step['number']) ?></span>
                    <div><strong><?= e($step['title']) ?></strong><p><?= e($step['description']) ?></p></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section testimonial-section">
    <div class="container narrow testimonial">
        <p class="eyebrow">Customer feedback</p>
        <blockquote>“<?= e($business['testimonial']['quote']) ?>”</blockquote>
        <p><strong><?= e($business['testimonial']['name']) ?></strong><br><?= e($business['testimonial']['role']) ?></p>
    </div>
</section>

<section class="section section-cta">
    <div class="container contact-panel">
        <div>
            <p class="eyebrow">Ready to talk?</p>
            <h2>Tell us what you are trying to achieve.</h2>
            <p>We can work out the appropriate service or next step from the requirement rather than forcing you into a package that does not fit.</p>
        </div>
        <div class="contact-details">
            <a class="button" href="/contact">Make an enquiry</a>
            <a href="tel:<?= e($business['phone']) ?>"><?= e($business['phone']) ?></a>
        </div>
    </div>
</section>
