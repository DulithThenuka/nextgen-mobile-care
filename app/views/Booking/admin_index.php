<?php require APPROOT . '/views/partials/header.php'; ?>

<?php
$customer_name = isset($data['customer_name']) ? $data['customer_name'] : '';
$email = isset($data['email']) ? $data['email'] : '';
$phone = isset($data['phone']) ? $data['phone'] : '';
$device_model = isset($data['device_model']) ? $data['device_model'] : '';
$issue_description = isset($data['issue_description']) ? $data['issue_description'] : '';
$service_type = isset($data['service_type']) ? $data['service_type'] : '';
$booking_date = isset($data['booking_date']) ? $data['booking_date'] : '';

$customer_name_err = isset($data['customer_name_err']) ? $data['customer_name_err'] : '';
$email_err = isset($data['email_err']) ? $data['email_err'] : '';
$phone_err = isset($data['phone_err']) ? $data['phone_err'] : '';
$device_model_err = isset($data['device_model_err']) ? $data['device_model_err'] : '';
$issue_description_err = isset($data['issue_description_err']) ? $data['issue_description_err'] : '';
$service_type_err = isset($data['service_type_err']) ? $data['service_type_err'] : '';
$booking_date_err = isset($data['booking_date_err']) ? $data['booking_date_err'] : '';
?>

<style>
    .booking-page {
        padding: 70px 0 80px;
        background:
            radial-gradient(circle at top left, rgba(59,130,246,0.16), transparent 25%),
            radial-gradient(circle at bottom right, rgba(6,182,212,0.12), transparent 25%),
            linear-gradient(180deg, #0b0f19 0%, #101827 100%);
        min-height: 100vh;
    }

    .booking-hero {
        text-align: center;
        margin-bottom: 35px;
    }

    .booking-badge {
        display: inline-block;
        padding: 8px 14px;
        background: rgba(77, 163, 255, 0.12);
        border: 1px solid rgba(77, 163, 255, 0.30);
        color: #8ec5ff;
        border-radius: 999px;
        font-size: 13px;
        margin-bottom: 16px;
    }

    .booking-hero h1 {
        font-size: 42px;
        margin-bottom: 12px;
        color: #fff;
    }

    .booking-hero p {
        color: #b8c4d8;
        font-size: 17px;
        max-width: 760px;
        margin: 0 auto;
    }

    .booking-layout {
        display: grid;
        grid-template-columns: 0.95fr 1.05fr;
        gap: 28px;
        align-items: start;
    }

    .booking-info-card,
    .booking-form-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        box-shadow: 0 18px 45px rgba(0,0,0,0.24);
    }

    .booking-info-card {
        padding: 30px;
    }

    .booking-form-card {
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

    .booking-note {
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

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
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
        min-height: 140px;
        resize: vertical;
    }

    .error-text {
        color: #fca5a5;
        font-size: 13px;
        margin-top: 7px;
    }

    .booking-actions {
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
        .booking-layout {
            grid-template-columns: 1fr;
        }

        .booking-hero h1 {
            font-size: 34px;
        }
    }

    @media (max-width: 768px) {
        .booking-page {
            padding: 50px 0 65px;
        }

        .booking-hero h1,
        .info-title,
        .form-title {
            font-size: 28px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="booking-page">
    <div class="container">
        <div class="booking-hero">
            <span class="booking-badge">Fast Booking. Trusted Mobile Care.</span>
            <h1>Book Your Device Repair</h1>
            <p>
                Submit your repair request in a clean and professional way. Share your device details,
                issue, and preferred booking date, and NextGen Mobile Care will handle the rest.
            </p>
        </div>

        <div class="booking-layout">
            <div class="booking-info-card">
                <h2 class="info-title">Why book with us?</h2>
                <p class="info-text">
                    Our booking system is designed to make device repair requests simple, fast, and professional.
                    You can send your repair details online and let the team review your request quickly.
                </p>

                <div class="info-points">
                    <div class="info-point">
                        <h4>Fast Request Process</h4>
                        <p>Send your repair request online without needing to visit first.</p>
                    </div>

                    <div class="info-point">
                        <h4>Clear Service Selection</h4>
                        <p>Choose the service type that best matches your device problem.</p>
                    </div>

                    <div class="info-point">
                        <h4>Easy Communication</h4>
                        <p>Provide your details clearly so follow-up becomes simple and professional.</p>
                    </div>
                </div>

                <div class="booking-note">
                    Please enter correct contact details and choose a suitable booking date.
                    This form stores the booking in your system, where admins can review it from the dashboard.
                </div>
            </div>

            <div class="booking-form-card">
                <h2 class="form-title">Repair Booking Form</h2>
                <p class="form-subtitle">Fill in the details below to submit your booking request.</p>

                <form action="<?php echo URLROOT; ?>/booking" method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="customer_name">Full Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo htmlspecialchars($customer_name); ?>" placeholder="Enter your full name">
                            <?php if (!empty($customer_name_err)) : ?>
                                <div class="error-text"><?php echo $customer_name_err; ?></div>
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
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Enter your phone number">
                            <?php if (!empty($phone_err)) : ?>
                                <div class="error-text"><?php echo $phone_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="device_model">Device Model</label>
                            <input type="text" name="device_model" id="device_model" class="form-control" value="<?php echo htmlspecialchars($device_model); ?>" placeholder="Example: iPhone 13, Samsung A54">
                            <?php if (!empty($device_model_err)) : ?>
                                <div class="error-text"><?php echo $device_model_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <select name="service_type" id="service_type" class="form-control">
                                <option value="">Select service type</option>
                                <option value="Screen Repair" <?php echo ($service_type == 'Screen Repair') ? 'selected' : ''; ?>>Screen Repair</option>
                                <option value="Battery Replacement" <?php echo ($service_type == 'Battery Replacement') ? 'selected' : ''; ?>>Battery Replacement</option>
                                <option value="Charging Port Repair" <?php echo ($service_type == 'Charging Port Repair') ? 'selected' : ''; ?>>Charging Port Repair</option>
                                <option value="Water Damage Repair" <?php echo ($service_type == 'Water Damage Repair') ? 'selected' : ''; ?>>Water Damage Repair</option>
                                <option value="Software Issue" <?php echo ($service_type == 'Software Issue') ? 'selected' : ''; ?>>Software Issue</option>
                                <option value="General Checkup" <?php echo ($service_type == 'General Checkup') ? 'selected' : ''; ?>>General Checkup</option>
                            </select>
                            <?php if (!empty($service_type_err)) : ?>
                                <div class="error-text"><?php echo $service_type_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="booking_date">Preferred Booking Date</label>
                            <input type="date" name="booking_date" id="booking_date" class="form-control" value="<?php echo htmlspecialchars($booking_date); ?>">
                            <?php if (!empty($booking_date_err)) : ?>
                                <div class="error-text"><?php echo $booking_date_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group full-width">
                            <label for="issue_description">Issue Description</label>
                            <textarea name="issue_description" id="issue_description" class="form-control" placeholder="Describe the device issue clearly"><?php echo htmlspecialchars($issue_description); ?></textarea>
                            <?php if (!empty($issue_description_err)) : ?>
                                <div class="error-text"><?php echo $issue_description_err; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="booking-actions">
                        <button type="submit" class="submit-btn">Submit Booking</button>
                        <a href="<?php echo URLROOT; ?>" class="secondary-btn">Back to Home</a>
                    </div>

                    <p class="small-help">
                        Make sure your form field names stay exactly the same as your current controller logic:
                        `customer_name`, `email`, `phone`, `device_model`, `issue_description`, `service_type`, `booking_date`.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>