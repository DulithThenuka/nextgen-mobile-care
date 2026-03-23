<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .success-page {
        max-width: 700px;
        margin: 80px auto;
        padding: 20px;
        text-align: center;
    }

    .success-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 40px 30px;
    }

    .success-card h1 {
        margin-bottom: 15px;
    }

    .success-card p {
        color: #c8c8d3;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .btn-home {
        display: inline-block;
        padding: 12px 22px;
        background: #fff;
        color: #111;
        border-radius: 10px;
        font-weight: 700;
    }
</style>

<div class="success-page">
    <div class="success-card">
        <h1>Booking Submitted Successfully</h1>
        <p>Your repair request has been received. Our team will review it and contact you soon.</p>
        <a href="<?php echo URLROOT; ?>/home" class="btn-home">Back to Home</a>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>