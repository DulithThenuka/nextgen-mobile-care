<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<div class="admin-page">
    <div class="page-card" style="padding:30px;max-width:900px;margin:0 auto;">
        <div style="display:flex;justify-content:space-between;gap:14px;flex-wrap:wrap;align-items:center;margin-bottom:24px;">
            <div>
                <h1 class="page-section-title" style="margin-bottom:6px;">Order Details</h1>
                <p class="page-section-text" style="margin-bottom:0;">Review customer order request information.</p>
            </div>
            <a href="<?php echo URLROOT; ?>/admin/orders" class="btn-secondary">Back to Orders</a>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;">
            <div class="stats-card"><h3>Customer</h3><p><?php echo htmlspecialchars($order->customer_name); ?></p></div>
            <div class="stats-card"><h3>Phone</h3><p><?php echo htmlspecialchars($order->phone); ?></p></div>
            <div class="stats-card"><h3>Product</h3><p><?php echo htmlspecialchars($order->product_name); ?></p></div>
            <div class="stats-card"><h3>Quantity</h3><p><?php echo (int)$order->quantity; ?></p></div>
            <div class="stats-card"><h3>Status</h3><p><?php echo htmlspecialchars($order->status); ?></p></div>
            <div class="stats-card"><h3>Created</h3><p><?php echo htmlspecialchars($order->created_at); ?></p></div>
        </div>

        <div class="stats-card" style="margin-top:16px;">
            <h3>Address</h3>
            <p style="white-space:pre-line;"><?php echo htmlspecialchars($order->address); ?></p>
        </div>

        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:22px;">
            <a href="<?php echo URLROOT; ?>/admin/approve_order/<?php echo $order->id; ?>" class="btn-primary">Approve Order</a>
            <a href="<?php echo URLROOT; ?>/admin/reject_order/<?php echo $order->id; ?>" class="btn-secondary">Reject Order</a>
            <a href="<?php echo URLROOT; ?>/admin/delete_order/<?php echo $order->id; ?>" class="btn-secondary" onclick="return confirm('Are you sure you want to delete this order?');">Delete Order</a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>
