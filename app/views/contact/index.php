<?php require APPROOT . '/views/partials/header.php'; ?>

<?php
$name = isset($data['name']) ? $data['name'] : '';
$email = isset($data['email']) ? $data['email'] : '';
$subject = isset($data['subject']) ? $data['subject'] : '';
$message = isset($data['message']) ? $data['message'] : '';

$name_err = isset($data['name_err']) ? $data['name_err'] : '';
$email_err = isset($data['email_err']) ? $data['email_err'] : '';
$subject_err = isset($data['subject_err']) ? $data['subject_err'] : '';
$message_err = isset($data['message_err']) ? $data['message_err'] : '';
?>

<style>
    .contact-page {
        padding: 70px 0 80px;
        background:
            radial-gradient(circle at top left, rgba(59,130,246,0.16), transparent 25%),
            radial-gradient(circle at bottom right, rgba(6,182,212,0.12), transparent 25%),
            linear-gradient(180deg, #0b0f19 0%, #101827 100%);
        min-height: 100vh;
    }

    .contact-hero {
        text-align: center;
        margin-bottom: 35px;
    }

    .contact-badge {
        display: inline-block;
        padding: 8px 14px;
        background: rgba(77, 163, 255, 0.12);
        border: 1px solid rgba(77, 163, 255, 0.30);
        color: #8ec5ff;
        border-radius: 999px;
        font-size: 13px;
        margin-bottom: 16px;
    }

    .contact-hero h1 {
        font-size: 42px;
        margin-bottom: 12px;
        color: #fff;
    }

    .contact-hero p {
        color: #b8c4d8;
        font-size: 17px;
        max-width: 760px;
        margin: 0 auto;
    }

    .contact-layout {
        display: grid;
        grid-template-columns: 0.95fr 1.05fr;
        gap: 28px;
        align-items: start;
    }

    .contact-info-card,
    .contact-form-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        box-shadow: 0 18px 45px rgba(0,0,0,0.24);
    }

    .contact-info-card {
        padding: 30px;
    }

    .contact-form-card {
        padding: 30px;
    }

    .info-title {
        font-size: 28px;
        color: #fff;
        margin-bottom: 14px;
    }

    .info-text {
        color: #c7d2e3;
        line-height: 1.8;
        margin-bottom: 22px;
    }

    .info-points {
        display: grid;
        gap: 14px;
        margin-bottom: 25px;
    }

    .info-point {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 16px 18px;
    }

    .info-point h4 {
        color: #fff;
        margin-bottom: 6px;
        font-size: 17px;
    }

    .info-point p {
        color: #b8c4d8;
        margin: 0;
        font-size: 14px;
        line-height: 1.6;
    }

    .contact-note {
        background: rgba(77,163,255,0.10);
        border: 1px solid rgba(77,163,255,0.18);
        color: #bfdbfe;
        border-radius: 16px;
        padding: 16px 18px;
        font-size: 14px;
        line-height: 1.7;
    }

    .form-title {
        font-size: 28px;
        color: #fff;
        margin-bottom: 8px;
    }

    .form-subtitle {
        color: #9fb0c7;
        margin-bottom: 24px;
        font-size: 15px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #dbe7f5;
        font-size: 14px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 14px 15px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.10);
        background: #0f172a;
        color: #fff;
        outline: none;
        font-size: 15px;
    }

    .form-control::placeholder {
        color: #90a0b8;
    }

    .form-control:focus {
        border-color: #4da3ff;
        box-shadow: 0 0 0 3px rgba(77,163,255,0.12);
    }

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .error-text {
        color: #fca5a5;
        font-size: 13px;
        margin-top: 7px;
    }

    .contact-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 8px;
    }

    .submit-btn,
    .secondary-btn {
        display: inline-block;
        padding: 14px 22px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s ease;
        text-align: center;
        border: none;
        cursor: pointer;
    }

    .submit-btn {
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: #fff;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px rgba(59,130,246,0.22);
    }

    .secondary-btn {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.12);
        color: #fff;
    }

    .secondary-btn:hover {
        border-color: #4da3ff;
        color: #4da3ff;
    }

    .small-help {
        color: #8fa1bb;
        font-size: 13px;
        margin-top: 14px;
        line-height: 1.6;
    }

    @media (max-width: 992px) {
        .contact-layout {
            grid-template-columns: 1fr;
        }

        .contact-hero h1 {
            font-size: 34px;
        }
    }

    @media (max-width: 768px) {
        .contact-page {
            padding: 50px 0 65px;
        }

        .contact-hero h1,
        .info-title,
        .form-title {
            font-size: 28px;
        }
    }
</style>

<section class="contact-page">
    <div class="container">
        <div class="contact-hero">
            <span class="contact-badge">Fast Support. Premium Device Care.</span>
            <h1>Contact NextGen Mobile Care</h1>
            <p>
                Send your questions, service inquiries, or product-related messages through a
                clean and professional contact form.
            </p>
        </div>

        <div class="contact-layout">
            <div class="contact-info-card">
                <h2 class="info-title">Let’s talk</h2>
                <p class="info-text">
                    Use this page to contact NextGen Mobile Care about repairs, products, order requests,
                    or general support. Your message will be saved in the system so admins can review it.
                </p>

                <div class="info-points">
                    <div class="info-point">
                        <h4>Repair Questions</h4>
                        <p>Ask about device issues, repair services, and what booking option is best for you.</p>
                    </div>

                    <div class="info-point">
                        <h4>Product Help</h4>
                        <p>Contact us about accessories, stock availability, and product recommendations.</p>
                    </div>

                    <div class="info-point">
                        <h4>Quick Communication</h4>
                        <p>Your message is stored in the admin system, making customer follow-up easier.</p>
                    </div>
                </div>

                <div class="contact-note">
                    This contact form should save messages to the <strong>contact_messages</strong> table
                    using the fields <strong>name</strong>, <strong>email</strong>, <strong>subject</strong>, and <strong>message</strong>.
                </div>
            </div>

            <div class="contact-form-card">
                <h2 class="form-title">Send a Message</h2>
                <p class="form-subtitle">Fill in the details below and submit your message.</p>

                <form action="<?php echo URLROOT; ?>/contact" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your full name">
                        <?php if (!empty($name_err)) : ?>
                            <div class="error-text"><?php echo $name_err; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email address">
                        <?php if (!empty($email_err)) : ?>
                            <div class="error-text"><?php echo $email_err; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" value="<?php echo htmlspecialchars($subject); ?>" placeholder="Enter message subject">
                        <?php if (!empty($subject_err)) : ?>
                            <div class="error-text"><?php echo $subject_err; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Write your message here"><?php echo htmlspecialchars($message); ?></textarea>
                        <?php if (!empty($message_err)) : ?>
                            <div class="error-text"><?php echo $message_err; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="contact-actions">
                        <button type="submit" class="submit-btn">Send Message</button>
                        <a href="<?php echo URLROOT; ?>" class="secondary-btn">Back to Home</a>
                        <a href="<?php echo URLROOT; ?>/booking" class="secondary-btn">Book Repair</a>
                    </div>

                    <p class="small-help">
                        Keep these field names exactly the same as your current system:
                        <strong>name</strong>, <strong>email</strong>, <strong>subject</strong>, <strong>message</strong>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>