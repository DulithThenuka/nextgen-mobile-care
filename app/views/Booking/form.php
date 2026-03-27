<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
.booking-page {
    padding: 70px 0;
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.16), transparent 25%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.12), transparent 25%),
        #0b0b0f;
    min-height: 100vh;
}

.booking-layout {
    max-width: 1100px;
    margin: auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.booking-info,
.booking-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    padding: 30px;
}

/* LEFT SIDE */
.booking-info h2 {
    margin-bottom: 15px;
}

.booking-info p {
    color: #c7c7d4;
    margin-bottom: 20px;
}

.info-box {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 12px;
}

/* FORM */
.booking-card h1 {
    margin-bottom: 10px;
    text-align: center;
}

.booking-card p {
    text-align: center;
    color: #bdbdcc;
    margin-bottom: 25px;
}

.form-control {
    width: 100%;
    padding: 13px 14px;
    border-radius: 10px;
    border: 1px solid #33334a;
    background: #0f0f15;
    color: #fff;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
}

.btn-submit {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    color: #fff;
    font-weight: 700;
}

.btn-submit:hover {
    transform: translateY(-2px);
}

@media(max-width:768px){
    .booking-layout{
        grid-template-columns:1fr;
    }
}
</style>

<div class="booking-page">
    <div class="booking-layout">

        <!-- LEFT INFO -->
        <div class="booking-info">
            <h2>Why Book With Us?</h2>
            <p>We provide fast, trusted, and premium mobile repair services.</p>

            <div class="info-box">✔ Fast repair process</div>
            <div class="info-box">✔ Trusted technicians</div>
            <div class="info-box">✔ Easy online booking</div>
        </div>

        <!-- FORM -->
        <div class="booking-card">
            <h1>Book a Repair</h1>
            <p>Schedule your service in seconds</p>

            <form action="<?php echo URLROOT; ?>/booking/create" method="POST">

                <input type="text" name="customer_name" class="form-control" placeholder="Full Name" value="<?php echo $data['customer_name'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['customer_name_err'] ?? ''; ?></div>

                <br>

                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data['email'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['email_err'] ?? ''; ?></div>

                <br>

                <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $data['phone'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['phone_err'] ?? ''; ?></div>

                <br>

                <input type="text" name="device_model" class="form-control" placeholder="Device Model" value="<?php echo $data['device_model'] ?? ''; ?>">
                <div class="text-error"><?php echo $data['device_model_err'] ?? ''; ?></div>

                <br>

                <select name="service_type" class="form-control">
                    <option value="">Select Service</option>
                    <option value="Screen Replacement">Screen Replacement</option>
                    <option value="Battery Replacement">Battery Replacement</option>
                    <option value="Software Issue">Software Issue</option>
                    <option value="Charging Problem">Charging Problem</option>
                </select>

                <br>

                <input type="date" name="booking_date" class="form-control" value="<?php echo $data['booking_date'] ?? ''; ?>">

                <br>

                <textarea name="issue_description" class="form-control" placeholder="Describe issue"><?php echo $data['issue_description'] ?? ''; ?></textarea>

                <br>

                <button type="submit" class="btn-submit">Submit Booking</button>
            </form>
        </div>

    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>