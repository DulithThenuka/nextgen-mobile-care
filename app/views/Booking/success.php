<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
.success-page {
    padding: 80px 0 100px;
}
.success-card {
    max-width: 760px;
    margin: 0 auto;
    text-align: center;
    padding: 42px 34px;
    border-radius: 28px;
    background: linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 22px 48px rgba(0,0,0,0.28);
}
.success-badge {
    display: inline-block;
    margin-bottom: 16px;
    padding: 8px 14px;
    border-radius: 999px;
    background: rgba(16,185,129,0.10);
    border: 1px solid rgba(16,185,129,0.20);
    color: #9ae6b4;
    font-size: 13px;
}
.success-card h1 {
    font-size: 2.2rem;
    margin-bottom: 12px;
}
.success-card p {
    color: #b8c7da;
    line-height: 1.8;
    max-width: 560px;
    margin: 0 auto 24px;
}
.success-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}
.success-btn,
.success-btn-alt {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 14px 22px;
    border-radius: 14px;
    font-weight: 700;
}
.success-btn {
    color: #fff;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
}
.success-btn-alt {
    color: #fff;
    border: 1px solid rgba(255,255,255,0.10);
    background: rgba(255,255,255,0.04);
}
</style>

<section class="success-page">
    <div class="container">
        <div class="success-card">
            <span class="success-badge">Booking saved successfully</span>
            <h1>Your repair request has been submitted.</h1>
            <p>
                Our team can now review your request in the admin panel and get back to you with the next steps.
            </p>
            <div class="success-actions">
                <a href="<?php echo URLROOT; ?>" class="success-btn">Back to Home</a>
                <a href="<?php echo URLROOT; ?>/products" class="success-btn-alt">View Products</a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>
