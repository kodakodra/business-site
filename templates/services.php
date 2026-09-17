<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Services</p>
        <h1>Practical help, from one-off projects to ongoing support.</h1>
        <p class="lede">The service catalogue is configuration-driven, so a real business can replace these examples with its own offers without changing the template.</p>
    </div>
</section>

<section class="section">
    <div class="container service-list">
        <?php foreach ($business['services'] as $index => $service): ?>
            <article class="service-detail">
                <div class="service-number"><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></div>
                <div>
                    <h2><?= e($service['title']) ?></h2>
                    <p class="service-summary"><?= e($service['summary']) ?></p>
                    <p><?= e($service['description']) ?></p>
                    <h3>Typical deliverables</h3>
                    <ul class="check-list">
                        <?php foreach ($service['deliverables'] as $deliverable): ?>
                            <li><?= e($deliverable) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section-muted">
    <div class="container narrow center-copy">
        <p class="eyebrow">Not sure what you need?</p>
        <h2>Start with a conversation.</h2>
        <p>Customers do not need to know which service to select. The enquiry process can be used to understand the requirement and recommend an appropriate route.</p>
        <a class="button" href="/contact">Make an enquiry</a>
    </div>
</section>
