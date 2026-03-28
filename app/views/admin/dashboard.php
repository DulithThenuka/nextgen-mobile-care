<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<style>
.dashboard-hero{display:flex;justify-content:space-between;align-items:flex-start;gap:18px;flex-wrap:wrap;margin-bottom:28px;}
.dashboard-hero-text h2{font-size:32px;margin-bottom:10px;}
.dashboard-hero-text p{max-width:720px;color:#94a3b8;}
.quick-links{display:flex;gap:12px;flex-wrap:wrap;}
.stats-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:28px;}
.stat-card{padding:22px;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);}
.stat-label{color:#94a3b8;font-size:14px;margin-bottom:10px;}
.stat-value{font-size:34px;font-weight:800;color:#fff;}
.panels-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:18px;}
.panel{padding:22px;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);}
.panel h3{margin-bottom:16px;font-size:20px;}
.activity-list{display:grid;gap:12px;}
.activity-item{padding:14px 16px;border-radius:16px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);}
.activity-item strong{display:block;color:#fff;margin-bottom:4px;}
.activity-item span{color:#94a3b8;font-size:14px;}
.stock-list{display:grid;gap:12px;}
.stock-item{display:flex;justify-content:space-between;gap:12px;padding:14px 16px;border-radius:16px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);}
.stock-item small{color:#94a3b8;display:block;}
.empty-state{color:#94a3b8;padding:16px 0;}
@media (max-width: 1100px){.stats-grid{grid-template-columns:repeat(2,minmax(0,1fr));}.panels-grid{grid-template-columns:1fr;}}
@media (max-width: 640px){.stats-grid{grid-template-columns:1fr;}}
</style>

<div class="dashboard-hero">
    <div class="dashboard-hero-text">
        <h2>Welcome to your admin dashboard</h2>
        <p>Manage products, track bookings, review orders, and check customer messages from one place without making the panel feel heavy or confusing.</p>
    </div>
    <div class="quick-links">
        <a href="<?php echo URLROOT; ?>/admin/addProduct" class="btn-primary">Add Product</a>
        <a href="<?php echo URLROOT; ?>/admin/orders" class="btn-secondary">View Orders</a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Products</div>
        <div class="stat-value"><?php echo $data['productCount'] ?? 0; ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Repair Bookings</div>
        <div class="stat-value"><?php echo $data['bookingCount'] ?? 0; ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Order Requests</div>
        <div class="stat-value"><?php echo $data['orderCount'] ?? 0; ?></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Customer Messages</div>
        <div class="stat-value"><?php echo $data['messageCount'] ?? 0; ?></div>
    </div>
</div>

<div class="panels-grid">
    <div class="panel">
        <h3>Recent bookings</h3>
        <?php if(!empty($data['recentBookings'])): ?>
            <div class="activity-list">
                <?php foreach($data['recentBookings'] as $booking): ?>
                    <div class="activity-item">
                        <strong><?php echo htmlspecialchars($booking->customer_name ?? 'Customer'); ?></strong>
                        <span><?php echo htmlspecialchars($booking->device_model ?? 'Device'); ?> • <?php echo htmlspecialchars($booking->status ?? 'Pending'); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No recent bookings found.</div>
        <?php endif; ?>
    </div>

    <div class="panel">
        <h3>Stock alerts</h3>
        <?php if(!empty($data['lowStockProducts'])): ?>
            <div class="stock-list">
                <?php foreach($data['lowStockProducts'] as $product): ?>
                    <div class="stock-item">
                        <div>
                            <strong><?php echo htmlspecialchars($product->name ?? 'Product'); ?></strong>
                            <small><?php echo htmlspecialchars($product->category ?? 'Category'); ?></small>
                        </div>
                        <strong><?php echo (int)($product->stock ?? 0); ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No low stock products right now.</div>
        <?php endif; ?>
    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>