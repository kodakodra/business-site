# Email delivery

The contact form uses [PHPMailer](https://github.com/PHPMailer/PHPMailer) with SMTP. This avoids relying on PHP's `mail()` function or a local sendmail installation and supports authenticated remote mail servers.

PHPMailer is installed through Composer. Run `composer install` after cloning the project.

## Local development

A developer machine does not need a local mail server, but the application does need access to an SMTP server. For local testing, use a real SMTP account or a local development SMTP service and set the values in `.env`.

Create `.env` from the example:

```bash
cp .env.example .env
```

The environment naming follows the same convention used by the other project setup:

```text
CONTACT_EMAIL=hello@example.com
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=hello@example.com
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
MAIL_AUTH=1
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="Example Business"
MAIL_TIMEOUT=15
```

The exact host, username, password, port and encryption settings come from the mailbox or SMTP provider. Port `587` with STARTTLS and port `465` with implicit TLS are both supported by the application.

When the SMTP configuration is missing or invalid, the form deliberately does not claim that an email was sent. It shows:

> We could not send your enquiry right now. Please email us directly instead.

That is an email configuration/transport problem rather than a contact-form validation failure.

## Environment settings

### CONTACT_EMAIL

The mailbox that receives website enquiries.

### MAIL_MAILER

Must be `smtp`. PHPMailer handles SMTP directly; this setting makes the selected transport explicit.

### MAIL_HOST

SMTP server hostname supplied by the mail provider.

### MAIL_PORT

SMTP port. Common secure choices are `587` for STARTTLS or `465` for implicit TLS.

### MAIL_USERNAME / MAIL_PASSWORD

SMTP credentials when the provider requires authentication. Keep the password out of Git and store it only in `.env` or the host's secret/environment settings.

### MAIL_ENCRYPTION

Supported values are:

- `tls` — STARTTLS
- `ssl` — implicit TLS
- `none` or blank — no encryption

Use the encryption mode required by the SMTP provider.

### MAIL_AUTH

Set to `1` when SMTP authentication is required, or `0` for an SMTP server that accepts unauthenticated connections such as a local development sink.

### MAIL_FROM_ADDRESS

The sender address used for outbound messages. Use an address permitted by the SMTP provider, preferably on the site's domain.

### MAIL_FROM_NAME

The display name shown alongside `MAIL_FROM_ADDRESS`. Defaults to the configured business name when omitted.

### MAIL_TIMEOUT

SMTP connection timeout in seconds. The application defaults to 15 seconds and enforces a minimum of 5 seconds.

## How the contact message is addressed

The application sets the configured business address as the recipient and sender, and puts the visitor's validated email address in `Reply-To`. The visitor's address is never used as the sender address. This keeps the outbound message aligned with the SMTP account/domain while making normal replies go to the person who submitted the enquiry.

## Testing a deployed site

After deployment:

1. Open `/contact`.
2. Submit a genuine test enquiry using a monitored visitor address.
3. Confirm the form reports success.
4. Confirm the message arrives at `CONTACT_EMAIL`.
5. Reply to the received message and confirm the reply goes to the visitor's address.
6. Check spam/junk folders if necessary.

A successful SMTP submission means the SMTP server accepted the message. It does not guarantee final inbox delivery.

## When mail does not arrive

Check the following in order:

- `CONTACT_EMAIL` is correct.
- `MAIL_FROM_ADDRESS` is valid and permitted by the SMTP provider.
- `MAIL_HOST` and `MAIL_PORT` match the provider's documentation.
- `MAIL_ENCRYPTION` matches the provider's required TLS mode.
- `MAIL_AUTH` matches whether authentication is required.
- `MAIL_USERNAME` and `MAIL_PASSWORD` are correct when authentication is enabled.
- The message is not in spam or quarantine.
- The domain's email authentication is configured as recommended by the mail provider.
- Server/PHP logs contain no SMTP connection or authentication errors.

Do not commit `.env`, SMTP passwords or other private credentials.

## Dependency note

PHPMailer is the application's email transport dependency. Composer is therefore required for a complete installation; the project is not dependency-free.
