<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<div class="admin-page">
    <div class="page-card" style="padding:30px;max-width:760px;margin:0 auto;">
        <h1 class="page-section-title" style="margin-bottom:6px;">Edit Booking</h1>
        <p class="page-section-text">Update the repair booking status below.</p>

        <div class="stats-card" style="margin-bottom:18px;">
            <h3><?php echo htmlspecialchars($booking->customer_name); ?></h3>
            <p><?php echo htmlspecialchars($booking->device_model); ?> | <?php echo htmlspecialchars($booking->service_type); ?> | <?php echo htmlspecialchars($booking->booking_date); ?></p>
        </div>

        <form action="<?php echo URLROOT; ?>/admin/edit_booking/<?php echo $booking->id; ?>" method="POST">
            <div class="form-group">
                <label for="status">Booking Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Pending" <?php echo $booking->status == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Confirmed" <?php echo $booking->status == 'Confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                    <option value="In Progress" <?php echo $booking->status == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                    <option value="Completed" <?php echo $booking->status == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="Cancelled" <?php echo $booking->status == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>

            <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:18px;">
                <button type="submit" class="btn-primary">Update Booking</button>
                <a href="<?php echo URLROOT; ?>/admin/bookings" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>
