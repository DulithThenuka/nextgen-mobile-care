<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .booking-page {
        max-width: 800px;
        margin: 60px auto;
        padding: 30px 20px;
    }

    .booking-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    }

    .booking-card h1 {
        margin-bottom: 10px;
        text-align: center;
    }

    .booking-card p {
        text-align: center;
        color: #bdbdcc;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 13px 14px;
        border-radius: 10px;
        border: 1px solid #33334a;
        background: #0f0f15;
        color: #fff;
        outline: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .text-error {
        color: #ff7b7b;
        font-size: 0.9rem;
        margin-top: 6px;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 10px;
        background: #fff;
        color: #111;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: #ddd;
    }
</style>

<div class="booking-page">
    <div class="booking-card">
        <h1>Book a Repair</h1>
        <p>Schedule your mobile repair service with NextGen Mobile Care.</p>

        <form action="<?php echo URLROOT; ?>/booking/create" method="POST">

            <div class="form-group">
                <label for="customer_name">Full Name</label>
                <input type="text" name="customer_name" class="form-control" value="<?php echo $data['customer_name'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['customer_name_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['email_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['phone_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="device_model">Device Model</label>
                <input type="text" name="device_model" class="form-control" value="<?php echo $data['device_model'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['device_model_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="service_type">Service Type</label>
                <select name="service_type" class="form-control">
                    <option value="">Select a service</option>
                    <option value="Screen Replacement" <?php echo (($data['service_type'] ?? '') == 'Screen Replacement') ? 'selected' : ''; ?>>Screen Replacement</option>
                    <option value="Battery Replacement" <?php echo (($data['service_type'] ?? '') == 'Battery Replacement') ? 'selected' : ''; ?>>Battery Replacement</option>
                    <option value="Software Issue" <?php echo (($data['service_type'] ?? '') == 'Software Issue') ? 'selected' : ''; ?>>Software Issue</option>
                    <option value="Charging Problem" <?php echo (($data['service_type'] ?? '') == 'Charging Problem') ? 'selected' : ''; ?>>Charging Problem</option>
                    <option value="General Checkup" <?php echo (($data['service_type'] ?? '') == 'General Checkup') ? 'selected' : ''; ?>>General Checkup</option>
                </select>
                <div class="text-error"><?php echo $data['service_type_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="booking_date">Preferred Booking Date</label>
                <input type="date" name="booking_date" class="form-control" value="<?php echo $data['booking_date'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['booking_date_err'] ?? ''; ?></div>
            </div>

            <div class="form-group">
                <label for="issue_description">Issue Description</label>
                <textarea name="issue_description" class="form-control"><?php echo $data['issue_description'] ?? ''; ?></textarea>
                <div class="text-error"><?php echo $data['issue_description_err'] ?? ''; ?></div>
            </div>

            <button type="submit" class="btn-submit">Submit Booking</button>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>