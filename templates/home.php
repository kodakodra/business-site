<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Service business starter</p>
            <h1><?= e($business['tagline']) ?></h1>
            <p class="lede"><?= e($business['description']) ?></p>
            <div class="actions">
                <a class="button" href="<?= e($business['primary_action']['href']) ?>"><?= e($business['primary_action']['label']) ?></a>
                <a class="button button-secondary" href="#services">View services</a>
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
        <div class="section-heading">
            <p class="eyebrow">Services</p>
            <h2>Help where you need it.</h2>
            <p>Use these service blocks for fixed packages, bespoke work or recurring support.</p>
        </div>
        <div class="cards">
            <?php foreach ($business['services'] as $service): ?>
                <article class="card">
                    <h3><?= e($service['title']) ?></h3>
                    <p><?= e($service['description']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="about" class="section section-muted">
    <div class="container narrow">
        <p class="eyebrow">About</p>
        <h2>A reusable structure, ready for a real business.</h2>
        <p>This demo content is intentionally generic. Replace the business configuration with your own name, services, contact details and messaging without changing the page structure.</p>
    </div>
</section>

<section id="contact" class="section">
    <div class="container contact-panel">
        <div>
            <p class="eyebrow">Start a conversation</p>
            <h2>Tell us what you need.</h2>
            <p>For the first version, contact details are configuration-driven. A proper enquiry form, validation and email delivery will be added as a later project step.</p>
        </div>
        <div class="contact-details">
            <a class="button" href="mailto:<?= e($business['email']) ?>">Email us</a>
            <a href="tel:<?= e($business['phone']) ?>"><?= e($business['phone']) ?></a>
        </div>
    </div>
</section>
