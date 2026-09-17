<section class="page-hero">
    <div class="container narrow">
        <p class="eyebrow">Services</p>
        <h1>Practical services that can be used individually or combined into a project.</h1>
        <p class="lede">Publish fixed packages, starting prices or quote-only work from the same configuration.</p>
    </div>
</section>
<section class="section">
    <div class="container service-list">
        <?php foreach ($business['services'] as $service): ?>
            <article class="service-detail" id="<?= e($service['slug']) ?>">
                <div><span class="pill"><?= e($service['price']) ?></span><h2><?= e($service['title']) ?></h2><p class="large-copy"><?= e($service['description']) ?></p></div>
                <div><h3>Typical deliverables</h3><ul class="check-list"><?php foreach ($service['deliverables'] as $item): ?><li><?= e($item) ?></li><?php endforeach; ?></ul><a class="button" href="/contact?service=<?= e($service['slug']) ?>">Ask about this service</a></div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<section class="section section-muted"><div class="container cta-panel"><div><p class="eyebrow">Not sure what fits?</p><h2>Start with the problem, not the package.</h2><p>Explain what you are trying to achieve and we can recommend the appropriate service or combination.</p></div><a class="button" href="/contact">Talk to us</a></div></section>
