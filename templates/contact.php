<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Contact</p>
        <h1>Tell us what you need and we can work out the next step.</h1>
        <p class="lede">This first contact page is deliberately simple. A production project can replace the email link with a validated enquiry form, CRM integration or booking flow.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <div class="contact-card">
            <p class="eyebrow">Direct contact</p>
            <h2>Start with an enquiry.</h2>
            <p>Use the details below to contact the business. These values are controlled from <code>config/business.php</code>.</p>
            <dl class="contact-list">
                <div><dt>Email</dt><dd><a href="mailto:<?= e($business['email']) ?>"><?= e($business['email']) ?></a></dd></div>
                <div><dt>Phone</dt><dd><a href="tel:<?= e($business['phone']) ?>"><?= e($business['phone']) ?></a></dd></div>
                <div><dt>Location</dt><dd><?= e($business['location']) ?></dd></div>
                <div><dt>Service area</dt><dd><?= e($business['service_area']) ?></dd></div>
            </dl>
        </div>
        <aside class="contact-card contact-card-muted">
            <p class="eyebrow">What to include</p>
            <h2>Give us enough context.</h2>
            <ul class="check-list">
                <li>What you need help with</li>
                <li>What you are trying to achieve</li>
                <li>Any useful deadlines or constraints</li>
                <li>The best way to contact you</li>
            </ul>
            <a class="button" href="mailto:<?= e($business['email']) ?>?subject=Business%20enquiry">Email your enquiry</a>
        </aside>
    </div>
</section>
