<section class="page-hero">
    <div class="container narrow">
        <p class="eyebrow"><?= e($business['about']['eyebrow']) ?></p>
        <h1><?= e($business['about']['title']) ?></h1>
        <p class="lede"><?= e($business['about']['body']) ?></p>
    </div>
</section>
<section class="section">
    <div class="container intro-grid">
        <div><p class="eyebrow">Our approach</p><h2>Work should be clear, useful and proportionate.</h2></div>
        <div class="stack-copy"><p>Good service starts with understanding the actual requirement. We avoid unnecessary complexity, explain decisions and keep the scope visible.</p><p>The reusable site uses the same principle: business-specific information stays in configuration while the presentation and behaviour stay consistent.</p></div>
    </div>
</section>
<section class="section section-muted">
    <div class="container"><div class="section-heading"><p class="eyebrow">The process</p><h2>What working together looks like.</h2></div><div class="process-grid"><?php foreach ($business['process'] as $step): ?><article class="process-step"><span><?= e($step['number']) ?></span><h3><?= e($step['title']) ?></h3><p><?= e($step['body']) ?></p></article><?php endforeach; ?></div></div>
</section>
<section class="section"><div class="container narrow testimonial"><p class="eyebrow">Client feedback</p><blockquote>“<?= e($business['testimonial']['quote']) ?>”</blockquote><p><strong><?= e($business['testimonial']['name']) ?></strong><br><?= e($business['testimonial']['role']) ?></p></div></section>
<section class="section"><div class="container cta-panel"><div><p class="eyebrow">Let's talk</p><h2>Tell us what would make your business work better.</h2></div><a class="button" href="/contact">Make an enquiry</a></div></section>
