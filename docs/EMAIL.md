# Email delivery

The contact form uses PHP's built-in `mail()` function. The application validates and protects the form before attempting delivery, but PHP itself still needs a mail transport supplied by the operating system or hosting provider.

## Local development

A normal developer machine may not have a mail transport configured.

When that happens, submitting the contact form can show:

> We could not send your enquiry right now. Please email us directly instead.

That is expected. The application is reporting that PHP could not hand the message to a configured mail transport. The smoke tests deliberately do not send real email.

You do not need to configure email just to work on the site's layout or run its tests.

## Production setup

Create a server-side `.env` file from `.env.example` and set real values:

```text
SITE_URL=https://www.example.com
CONTACT_EMAIL=hello@example.com
MAIL_FROM=website@example.com
APP_DEBUG=0
APP_TIMEZONE=Europe/London
```

### CONTACT_EMAIL

This is the address that receives website enquiries.

Use a real mailbox that the business monitors.

### MAIL_FROM

This is the sender address used by PHP when submitting the message to the host's mail transport.

Use an address that the hosting provider permits. A domain-based sender that matches the website's domain is generally preferable to an unrelated address.

## Hosting provider requirements

Before launch, confirm that the hosting provider:

1. Allows PHP `mail()`.
2. Has a working outgoing mail transport.
3. Allows the chosen `MAIL_FROM` address/domain.
4. Does not require a provider-specific SMTP library instead.

The exact control-panel settings vary between hosts, so use the host's own PHP/email documentation for transport-specific configuration.

## Testing a deployed site

After deployment:

1. Open `/contact`.
2. Submit a genuine test enquiry using a monitored test address.
3. Confirm the form reports success.
4. Confirm the message arrives at `CONTACT_EMAIL`.
5. Reply to the received message and confirm the visitor's address is available as the reply target.
6. Check spam/junk folders if the message does not appear in the inbox.

A successful PHP `mail()` call means the message was accepted by the configured transport. It does not prove final inbox delivery.

## When mail does not arrive

Check the following in order:

- `CONTACT_EMAIL` is correct.
- `MAIL_FROM` is a valid, permitted sender.
- The hosting provider supports PHP `mail()`.
- The site's server time and PHP configuration are sensible.
- The message is not in spam or quarantine.
- The domain's email authentication is configured as recommended by the mail provider.
- The host's mail logs or support documentation show successful delivery attempts.

Do not put SMTP passwords or other private mail credentials into Git. Keep secrets in `.env` or the hosting provider's environment/secret settings.

## Using SMTP instead

This starter intentionally does not include an SMTP library or a third-party mail service. That keeps the baseline dependency-free.

If a future project requires authenticated SMTP, transactional email, attachments, delivery tracking or high-volume email, replace the `mail()` implementation in `src/contact.php` with a suitable mail provider/library and document that provider's setup separately.
