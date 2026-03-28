<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<div class="admin-page">
    <div class="page-card" style="padding:30px;max-width:900px;margin:0 auto;">
        <div style="display:flex;justify-content:space-between;gap:14px;flex-wrap:wrap;align-items:center;margin-bottom:24px;">
            <div>
                <h1 class="page-section-title" style="margin-bottom:6px;">Booking Details</h1>
                <p class="page-section-text" style="margin-bottom:0;">Review customer repair booking information.</p>
            </div>
            <a href="<?php echo URLROOT; ?>/admin/bookings" class="btn-secondary">Back to Bookings</a>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;">
            <div class="stats-card"><h3>Customer</h3><p><?php echo htmlspecialchars($booking->customer_name); ?></p></div>
            <div class="stats-card"><h3>Email</h3><p><?php echo htmlspecialchars($booking->email); ?></p></div>
            <div class="stats-card"><h3>Phone</h3><p><?php echo htmlspecialchars($booking->phone); ?></p></div>
            <div class="stats-card"><h3>Device</h3><p><?php echo htmlspecialchars($booking->device_model); ?></p></div>
            <div class="stats-card"><h3>Service</h3><p><?php echo htmlspecialchars($booking->service_type); ?></p></div>
            <div class="stats-card"><h3>Booking Date</h3><p><?php echo htmlspecialchars($booking->booking_date); ?></p></div>
            <div class="stats-card"><h3>Status</h3><p><?php echo htmlspecialchars($booking->status); ?></p></div>
            <div class="stats-card"><h3>Created</h3><p><?php echo htmlspecialchars($booking->created_at); ?></p></div>
        </div>

        <div class="stats-card" style="margin-top:16px;">
            <h3>Issue Description</h3>
            <p style="white-space:pre-line;"><?php echo htmlspecialchars($booking->issue_description); ?></p>
        </div>

        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:22px;">
            <a href="<?php echo URLROOT; ?>/admin/edit_booking/<?php echo $booking->id; ?>" class="btn-primary">Edit Booking Status</a>
            <a href="<?php echo URLROOT; ?>/admin/delete_booking/<?php echo $booking->id; ?>" class="btn-secondary" onclick="return confirm('Are you sure you want to delete this booking?');">Delete Booking</a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>
