<?php require APPROOT . '/views/partials/header.php'; ?>

<div style="max-width:1200px; margin:50px auto; padding:20px;">
    <h1 style="margin-bottom:25px;">Order Requests</h1>

    <div style="overflow-x:auto; background:#15151d; border:1px solid #242433; border-radius:16px; padding:20px;">
        <table style="width:100%; border-collapse:collapse; color:#fff;">
            <thead>
                <tr>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">ID</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Product</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Customer</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Phone</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Address</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Qty</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Status</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)) : ?>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo $order->id; ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($order->product_name); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($order->customer_name); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($order->phone); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($order->address); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo (int)$order->quantity; ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($order->status); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($order->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" style="padding:12px;">No order requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>