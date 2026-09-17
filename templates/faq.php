<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">FAQ</p>
        <h1>Common questions, answered clearly.</h1>
        <p class="lede">FAQs are useful for reducing friction before a customer makes an enquiry. Replace these examples with questions that real customers repeatedly ask.</p>
    </div>
</section>

<section class="section">
    <div class="container narrow faq-list">
        <?php foreach ($business['faqs'] as $faq): ?>
            <details class="faq-item">
                <summary><?= e($faq['question']) ?></summary>
                <p><?= e($faq['answer']) ?></p>
            </details>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section-muted">
    <div class="container narrow center-copy">
        <p class="eyebrow">Still have a question?</p>
        <h2>Ask before you commit.</h2>
        <p>A good brochure site should make contacting the business easy when the answer is not already on the page.</p>
        <a class="button" href="/contact">Contact <?= e($business['name']) ?></a>
    </div>
</section>
