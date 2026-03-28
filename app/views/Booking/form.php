<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
.booking-page {
    padding: 72px 0 84px;
    min-height: calc(100vh - 80px);
}

.booking-shell {
    display: grid;
    grid-template-columns: 0.95fr 1.05fr;
    gap: 28px;
    align-items: stretch;
}

.booking-info,
.booking-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 26px;
    box-shadow: 0 18px 42px rgba(0,0,0,0.24);
}

.booking-info {
    padding: 34px;
}

.info-badge {
    display: inline-block;
    padding: 8px 14px;
    border-radius: 999px;
    background: rgba(59,130,246,0.10);
    border: 1px solid rgba(59,130,246,0.20);
    color: #a7d0ff;
    font-size: 13px;
    margin-bottom: 16px;
}

.booking-info h2 {
    font-size: 2.2rem;
    line-height: 1.15;
    margin-bottom: 14px;
}

.booking-info p {
    color: #bfd0e7;
    line-height: 1.8;
    margin-bottom: 24px;
}

.info-grid {
    display: grid;
    gap: 14px;
    margin-bottom: 22px;
}

.info-item {
    padding: 18px;
    border-radius: 18px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.07);
}

.info-item strong {
    display: block;
    margin-bottom: 6px;
    color: #fff;
}

.info-item span {
    color: #aebed4;
    font-size: 14px;
}

.booking-card {
    padding: 34px;
}

.booking-card h1 {
    font-size: 2rem;
    margin-bottom: 8px;
}

.booking-card > p {
    color: #9fb0c7;
    margin-bottom: 24px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.form-group {
    margin-bottom: 18px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #dbe7f5;
    font-size: 14px;
    font-weight: 700;
}

.form-control {
    width: 100%;
    padding: 14px 15px;
    border-radius: 14px;
    border: 1px solid rgba(255,255,255,0.10);
    background: #0f172a;
    color: #fff;
    outline: none;
}

.form-control:focus {
    border-color: #4da3ff;
    box-shadow: 0 0 0 3px rgba(77,163,255,0.12);
}

textarea.form-control {
    min-height: 140px;
    resize: vertical;
}

.text-error {
    color: #fca5a5;
    font-size: 13px;
    margin-top: 7px;
}

.booking-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 6px;
}

.btn-submit,
.btn-alt {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 14px 22px;
    border-radius: 14px;
    font-weight: 700;
    transition: 0.25s ease;
}

.btn-submit {
    border: none;
    color: #fff;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    box-shadow: 0 12px 28px rgba(59,130,246,0.24);
    cursor: pointer;
}

.btn-submit:hover {
    transform: translateY(-2px);
}

.btn-alt {
    color: #fff;
    border: 1px solid rgba(255,255,255,0.10);
    background: rgba(255,255,255,0.04);
}

.btn-alt:hover {
    border-color: rgba(59,130,246,0.24);
}

@media (max-width: 980px) {
    .booking-shell { grid-template-columns: 1fr; }
}

@media (max-width: 680px) {
    .booking-page { padding: 52px 0 64px; }
    .booking-info,
    .booking-card { padding: 24px; }
    .form-grid { grid-template-columns: 1fr; }
    .booking-info h2,
    .booking-card h1 { font-size: 1.7rem; }
}
</style>

<section class="booking-page">
    <div class="container booking-shell">
        <div class="booking-info">
            <span class="info-badge">Fast bookings. Trusted repair team.</span>
            <h2>Book your repair with a cleaner, more professional experience.</h2>
            <p>
                Tell us about your device, the issue, and your preferred booking date.
                NextGen Mobile Care keeps the process quick, clear, and easy for customers.
            </p>

            <div class="info-grid">
                <div class="info-item">
                    <strong>Quick Service Flow</strong>
                    <span>Simple online form with clear details for faster confirmations.</span>
                </div>
                <div class="info-item">
                    <strong>Trusted Device Handling</strong>
                    <span>Suitable for screen, battery, charging, and software issues.</span>
                </div>
                <div class="info-item">
                    <strong>Professional Customer Support</strong>
                    <span>Your request is saved and can be managed neatly from the admin panel.</span>
                </div>
            </div>
        </div>

        <div class="booking-card">
            <h1>Book a Repair</h1>
            <p>Fill in the details below and submit your repair request.</p>

            <form action="<?php echo URLROOT; ?>/booking/create" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="customer_name">Full Name</label>
                        <input id="customer_name" type="text" name="customer_name" class="form-control" value="<?php echo htmlspecialchars($data['customer_name'] ?? ''); ?>" placeholder="Enter your full name">
                        <div class="text-error"><?php echo $data['customer_name_err'] ?? ''; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" placeholder="Enter your email">
                        <div class="text-error"><?php echo $data['email_err'] ?? ''; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input id="phone" type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($data['phone'] ?? ''); ?>" placeholder="Enter your phone number">
                        <div class="text-error"><?php echo $data['phone_err'] ?? ''; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="device_model">Device Model</label>
                        <input id="device_model" type="text" name="device_model" class="form-control" value="<?php echo htmlspecialchars($data['device_model'] ?? ''); ?>" placeholder="Example: iPhone 14 Pro">
                        <div class="text-error"><?php echo $data['device_model_err'] ?? ''; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="service_type">Service Type</label>
                        <select id="service_type" name="service_type" class="form-control">
                            <option value="">Select a service</option>
                            <?php $selectedService = $data['service_type'] ?? ''; ?>
                            <option value="Screen Replacement" <?php echo $selectedService === 'Screen Replacement' ? 'selected' : ''; ?>>Screen Replacement</option>
                            <option value="Battery Replacement" <?php echo $selectedService === 'Battery Replacement' ? 'selected' : ''; ?>>Battery Replacement</option>
                            <option value="Software Issue" <?php echo $selectedService === 'Software Issue' ? 'selected' : ''; ?>>Software Issue</option>
                            <option value="Charging Problem" <?php echo $selectedService === 'Charging Problem' ? 'selected' : ''; ?>>Charging Problem</option>
                        </select>
                        <div class="text-error"><?php echo $data['service_type_err'] ?? ''; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="booking_date">Preferred Booking Date</label>
                        <input id="booking_date" type="date" name="booking_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo htmlspecialchars($data['booking_date'] ?? ''); ?>">
                        <div class="text-error"><?php echo $data['booking_date_err'] ?? ''; ?></div>
                    </div>

                    <div class="form-group full">
                        <label for="issue_description">Issue Description</label>
                        <textarea id="issue_description" name="issue_description" class="form-control" placeholder="Describe the issue with your device"><?php echo htmlspecialchars($data['issue_description'] ?? ''); ?></textarea>
                        <div class="text-error"><?php echo $data['issue_description_err'] ?? ''; ?></div>
                    </div>
                </div>

                <div class="booking-actions">
                    <button type="submit" class="btn-submit">Submit Booking</button>
                    <a href="<?php echo URLROOT; ?>/products" class="btn-alt">Browse Products</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>
