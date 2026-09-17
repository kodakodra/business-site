<section class="page-hero"><div class="container narrow"><p class="eyebrow">Contact</p><h1>Tell us what you need.</h1><p class="lede">A useful first enquiry includes what you are trying to achieve, any important deadline and the kind of help you think you need.</p></div></section>
<section class="section"><div class="container contact-layout">
    <div class="form-panel" id="form">
        <h2>Send an enquiry</h2>
        <?php if (!empty($formErrors['form'])): ?><div class="form-alert error" role="alert"><?= e($formErrors['form']) ?></div><?php endif; ?>
        <?php if (!empty($formErrors) && empty($formErrors['form'])): ?><div class="form-alert error" role="alert">Please correct the highlighted fields and try again.</div><?php endif; ?>
        <form method="post" action="/contact" novalidate>
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div class="honeypot" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
            <div class="field-grid">
                <div class="field"><label for="name">Name <span aria-hidden="true">*</span></label><input id="name" name="name" value="<?= e($formData['name'] ?? '') ?>" maxlength="100" required autocomplete="name"><?php if (!empty($formErrors['name'])): ?><span class="field-error"><?= e($formErrors['name']) ?></span><?php endif; ?></div>
                <div class="field"><label for="email">Email <span aria-hidden="true">*</span></label><input id="email" type="email" name="email" value="<?= e($formData['email'] ?? '') ?>" maxlength="254" required autocomplete="email"><?php if (!empty($formErrors['email'])): ?><span class="field-error"><?= e($formErrors['email']) ?></span><?php endif; ?></div>
            </div>
            <div class="field-grid">
                <div class="field"><label for="phone">Phone</label><input id="phone" type="tel" name="phone" value="<?= e($formData['phone'] ?? '') ?>" maxlength="40" autocomplete="tel"><?php if (!empty($formErrors['phone'])): ?><span class="field-error"><?= e($formErrors['phone']) ?></span><?php endif; ?></div>
                <div class="field"><label for="service">Service</label><select id="service" name="service"><option value="">Not sure yet</option><?php foreach ($business['services'] as $service): ?><option value="<?= e($service['slug']) ?>" <?= (($formData['service'] ?? '') === $service['slug']) ? 'selected' : '' ?>><?= e($service['title']) ?></option><?php endforeach; ?></select><?php if (!empty($formErrors['service'])): ?><span class="field-error"><?= e($formErrors['service']) ?></span><?php endif; ?></div>
            </div>
            <div class="field"><label for="message">What do you need? <span aria-hidden="true">*</span></label><textarea id="message" name="message" rows="8" maxlength="3000" required><?= e($formData['message'] ?? '') ?></textarea><small>20-3000 characters.</small><?php if (!empty($formErrors['message'])): ?><span class="field-error"><?= e($formErrors['message']) ?></span><?php endif; ?></div>
            <button class="button" type="submit" <?= isset($rateLimited) && $rateLimited ? 'disabled' : '' ?>><?= isset($rateLimited) && $rateLimited ? 'Please try again shortly' : 'Send enquiry' ?></button>
            <p class="form-note">By sending this enquiry you agree that we can use the information to respond to your request. See our <a href="/privacy">privacy notice</a>.</p>
        </form>
    </div>
    <aside class="contact-sidebar"><div class="info-card"><h2>Direct contact</h2><p><a href="mailto:<?= e($business['email']) ?>"><?= e($business['email']) ?></a><br><a href="tel:<?= e($business['phone']) ?>"><?= e($business['phone']) ?></a></p></div><div class="info-card"><h2>Service areas</h2><ul class="plain-list"><?php foreach ($business['service_areas'] as $area): ?><li><?= e($area) ?></li><?php endforeach; ?></ul></div><div class="info-card"><h2>Opening hours</h2><?php foreach ($business['hours'] as $row): ?><p class="hours"><span><?= e($row['day']) ?></span><span><?= e($row['hours']) ?></span></p><?php endforeach; ?></div></aside>
</div></section>
