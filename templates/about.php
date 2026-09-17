<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">About</p>
        <h1>A business site should explain what you do and make the next step obvious.</h1>
        <p class="lede"><?= e($business['description']) ?></p>
    </div>
</section>

<section class="section">
    <div class="container split-panel">
        <div>
            <p class="eyebrow">How we work</p>
            <h2>Clear communication. Useful outcomes.</h2>
        </div>
        <div>
            <p>Replace this section with the real company's story, experience, approach or credentials. The template intentionally avoids requiring a specific type of business.</p>
            <p><?= e($business['service_area']) ?>.</p>
        </div>
    </div>
</section>

<section class="section section-muted">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Our process</p>
            <h2>A predictable journey from enquiry to delivery.</h2>
        </div>
        <div class="process-grid">
            <?php foreach ($business['process'] as $step): ?>
                <article class="process-step">
                    <span class="process-number"><?= e($step['number']) ?></span>
                    <h3><?= e($step['title']) ?></h3>
                    <p><?= e($step['description']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container narrow testimonial">
        <p class="eyebrow">Customer feedback</p>
        <blockquote>“<?= e($business['testimonial']['quote']) ?>”</blockquote>
        <p><strong><?= e($business['testimonial']['name']) ?></strong><br><?= e($business['testimonial']['role']) ?></p>
    </div>
</section>
