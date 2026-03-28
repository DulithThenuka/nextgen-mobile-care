<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<style>
.dashboard-hero{display:flex;justify-content:space-between;align-items:flex-start;gap:18px;flex-wrap:wrap;margin-bottom:28px;}
.dashboard-hero-text h2{font-size:32px;margin-bottom:10px;}
.dashboard-hero-text p{max-width:720px;color:#94a3b8;line-height:1.7;}
.quick-links{display:flex;gap:12px;flex-wrap:wrap;}
.stats-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:18px;}
.stat-card{padding:22px;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);box-shadow:0 14px 34px rgba(0,0,0,.18);}
.stat-label{color:#94a3b8;font-size:14px;margin-bottom:10px;}
.stat-value{font-size:34px;font-weight:800;color:#fff;line-height:1;}
.stat-sub{margin-top:10px;color:#94a3b8;font-size:13px;}

.alert-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-bottom:28px;}
.alert-card{padding:20px;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);box-shadow:0 14px 34px rgba(0,0,0,.18);}
.alert-card h4{font-size:14px;color:#94a3b8;margin-bottom:10px;}
.alert-card .alert-value{font-size:28px;font-weight:800;color:#fff;line-height:1;}
.alert-card .alert-note{margin-top:10px;color:#94a3b8;font-size:13px;}

.panels-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:18px;margin-bottom:28px;}
.panel{padding:22px;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);box-shadow:0 14px 34px rgba(0,0,0,.18);}
.panel h3{margin-bottom:16px;font-size:20px;color:#fff;}
.panel-head{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:16px;flex-wrap:wrap;}
.panel-head a{font-size:14px;text-decoration:none;}

.activity-list{display:grid;gap:12px;}
.activity-item{padding:14px 16px;border-radius:16px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);}
.activity-item strong{display:block;color:#fff;margin-bottom:4px;}
.activity-item span{color:#94a3b8;font-size:14px;line-height:1.5;}

.stock-list{display:grid;gap:12px;}
.stock-item{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;padding:14px 16px;border-radius:16px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);}
.stock-item strong{color:#fff;}
.stock-item small{color:#94a3b8;display:block;margin-top:4px;line-height:1.5;}
.stock-badge{min-width:56px;text-align:center;padding:8px 10px;border-radius:12px;background:rgba(255,255,255,.08);font-weight:700;color:#fff;}

.mini-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;}
.mini-panel{padding:22px;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);box-shadow:0 14px 34px rgba(0,0,0,.18);}
.mini-panel h3{margin-bottom:16px;font-size:18px;color:#fff;}

.chart-wrap{position:relative;height:320px;}
.empty-state{color:#94a3b8;padding:16px 0;line-height:1.6;}

.status-list{display:grid;gap:12px;}
.status-row{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:12px 14px;border-radius:14px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);}
.status-row span{color:#cbd5e1;}
.status-row strong{color:#fff;}

@media (max-width: 1200px){
    .stats-grid{grid-template-columns:repeat(2,minmax(0,1fr));}
    .alert-grid{grid-template-columns:repeat(3,minmax(0,1fr));}
    .mini-grid{grid-template-columns:1fr;}
    .panels-grid{grid-template-columns:1fr;}
}
@media (max-width: 820px){
    .alert-grid{grid-template-columns:1fr;}
}
@media (max-width: 640px){
    .stats-grid{grid-template-columns:1fr;}
    .dashboard-hero-text h2{font-size:26px;}
    .chart-wrap{height:260px;}
}
</style>

<div class="dashboard-hero">
    <div class="dashboard-hero-text">
        <h2>Welcome to your admin dashboard</h2>
        <p>Manage products, track bookings, review orders, and monitor customer activity from one clean place. This layout keeps the panel professional, balanced, and easy to read.</p>
    </div>
    <div class="quick-links">
        <a href="<?php echo URLROOT; ?>/admin/add_product" class="btn-primary">Add Product</a>
        <a href="<?php echo URLROOT; ?>/admin/bookings" class="btn-secondary">View Bookings</a>
        <a href="<?php echo URLROOT; ?>/admin/orders" class="btn-secondary">View Orders</a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Products</div>
        <div class="stat-value"><?php echo (int)($data['productCount'] ?? 0); ?></div>
        <div class="stat-sub">Products currently listed in store</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Repair Bookings</div>
        <div class="stat-value"><?php echo (int)($data['bookingCount'] ?? 0); ?></div>
        <div class="stat-sub">All customer repair requests</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Order Requests</div>
        <div class="stat-value"><?php echo (int)($data['orderCount'] ?? 0); ?></div>
        <div class="stat-sub">Orders placed through the website</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Customer Messages</div>
        <div class="stat-value"><?php echo (int)($data['messageCount'] ?? 0); ?></div>
        <div class="stat-sub">Messages received from contact form</div>
    </div>
</div>

<div class="alert-grid">
    <div class="alert-card">
        <h4>Low Stock Products</h4>
        <div class="alert-value"><?php echo (int)($data['lowStockCount'] ?? 0); ?></div>
        <div class="alert-note">Items with stock between 1 and 5</div>
    </div>
    <div class="alert-card">
        <h4>Out of Stock</h4>
        <div class="alert-value"><?php echo (int)($data['outOfStockCount'] ?? 0); ?></div>
        <div class="alert-note">Products that need restocking soon</div>
    </div>
    <div class="alert-card">
        <h4>Total Stock Alerts</h4>
        <div class="alert-value"><?php echo (int)($data['totalStockAlerts'] ?? 0); ?></div>
        <div class="alert-note">Combined low and out of stock alerts</div>
    </div>
</div>

<div class="panels-grid">
    <div class="panel">
        <div class="panel-head">
            <h3>Recent bookings</h3>
            <a href="<?php echo URLROOT; ?>/admin/bookings" class="btn-secondary">See all</a>
        </div>

        <?php if(!empty($data['recentBookings'])): ?>
            <div class="activity-list">
                <?php foreach($data['recentBookings'] as $booking): ?>
                    <div class="activity-item">
                        <strong><?php echo htmlspecialchars($booking->customer_name ?? 'Customer'); ?></strong>
                        <span>
                            <?php echo htmlspecialchars($booking->device_model ?? 'Device'); ?>
                            •
                            <?php echo htmlspecialchars($booking->service_type ?? 'Service'); ?>
                            •
                            <?php echo htmlspecialchars($booking->status ?? 'Pending'); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No recent bookings found.</div>
        <?php endif; ?>
    </div>

    <div class="panel">
        <div class="panel-head">
            <h3>Stock alerts</h3>
            <a href="<?php echo URLROOT; ?>/admin/products" class="btn-secondary">Manage products</a>
        </div>

        <?php if(!empty($data['lowStockProducts'])): ?>
            <div class="stock-list">
                <?php foreach($data['lowStockProducts'] as $product): ?>
                    <div class="stock-item">
                        <div>
                            <strong><?php echo htmlspecialchars($product->name ?? 'Product'); ?></strong>
                            <small><?php echo htmlspecialchars($product->category ?? 'Category'); ?></small>
                        </div>
                        <div class="stock-badge"><?php echo (int)($product->stock ?? 0); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No low stock products right now.</div>
        <?php endif; ?>
    </div>
</div>

<div class="panels-grid">
    <div class="panel">
        <div class="panel-head">
            <h3>Recent orders</h3>
            <a href="<?php echo URLROOT; ?>/admin/orders" class="btn-secondary">See all</a>
        </div>

        <?php if(!empty($data['recentOrders'])): ?>
            <div class="activity-list">
                <?php foreach($data['recentOrders'] as $order): ?>
                    <div class="activity-item">
                        <strong><?php echo htmlspecialchars($order->customer_name ?? 'Customer'); ?></strong>
                        <span>
                            <?php echo htmlspecialchars($order->product_name ?? 'Product'); ?>
                            • Qty: <?php echo (int)($order->quantity ?? 0); ?>
                            • <?php echo htmlspecialchars($order->status ?? 'Pending'); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No recent orders found.</div>
        <?php endif; ?>
    </div>

    <div class="panel">
        <div class="panel-head">
            <h3>Recent messages</h3>
            <a href="<?php echo URLROOT; ?>/admin/messages" class="btn-secondary">See all</a>
        </div>

        <?php if(!empty($data['recentMessages'])): ?>
            <div class="activity-list">
                <?php foreach($data['recentMessages'] as $message): ?>
                    <div class="activity-item">
                        <strong><?php echo htmlspecialchars($message->name ?? 'Customer'); ?></strong>
                        <span>
                            <?php echo htmlspecialchars($message->subject ?? 'No subject'); ?>
                            •
                            <?php echo htmlspecialchars($message->email ?? 'No email'); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No recent messages found.</div>
        <?php endif; ?>
    </div>
</div>

<div class="mini-grid">
    <div class="mini-panel">
        <h3>Booking status summary</h3>
        <?php if(!empty($data['bookingLabels'])): ?>
            <div class="status-list">
                <?php foreach($data['bookingLabels'] as $index => $label): ?>
                    <div class="status-row">
                        <span><?php echo htmlspecialchars($label); ?></span>
                        <strong><?php echo (int)($data['bookingCounts'][$index] ?? 0); ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No booking status data available.</div>
        <?php endif; ?>
    </div>

    <div class="mini-panel">
        <h3>Order status summary</h3>
        <?php if(!empty($data['orderLabels'])): ?>
            <div class="status-list">
                <?php foreach($data['orderLabels'] as $index => $label): ?>
                    <div class="status-row">
                        <span><?php echo htmlspecialchars($label); ?></span>
                        <strong><?php echo (int)($data['orderCounts'][$index] ?? 0); ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No order status data available.</div>
        <?php endif; ?>
    </div>

    <div class="mini-panel">
        <h3>Product categories</h3>
        <?php if(!empty($data['categoryLabels'])): ?>
            <div class="status-list">
                <?php foreach($data['categoryLabels'] as $index => $label): ?>
                    <div class="status-row">
                        <span><?php echo htmlspecialchars($label); ?></span>
                        <strong><?php echo (int)($data['categoryCounts'][$index] ?? 0); ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">No category data available.</div>
        <?php endif; ?>
    </div>
</div>

<div class="panel" style="margin-top:28px;">
    <div class="panel-head">
        <h3>Monthly activity overview</h3>
    </div>

    <?php if(!empty($data['months'])): ?>
        <div class="chart-wrap">
            <canvas id="monthlyActivityChart"></canvas>
        </div>
    <?php else: ?>
        <div class="empty-state">No monthly activity data available.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const monthLabels = <?php echo json_encode($data['months'] ?? []); ?>;
const monthlyBookingCounts = <?php echo json_encode($data['monthlyBookingCounts'] ?? []); ?>;
const monthlyOrderCounts = <?php echo json_encode($data['monthlyOrderCounts'] ?? []); ?>;
const monthlyMessageCounts = <?php echo json_encode($data['monthlyMessageCounts'] ?? []); ?>;

if (document.getElementById('monthlyActivityChart') && monthLabels.length > 0) {
    const ctx = document.getElementById('monthlyActivityChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthLabels,
            datasets: [
                {
                    label: 'Bookings',
                    data: monthlyBookingCounts,
                    borderColor: '#38bdf8',
                    backgroundColor: 'rgba(56, 189, 248, 0.15)',
                    tension: 0.35,
                    fill: true
                },
                {
                    label: 'Orders',
                    data: monthlyOrderCounts,
                    borderColor: '#a78bfa',
                    backgroundColor: 'rgba(167, 139, 250, 0.12)',
                    tension: 0.35,
                    fill: true
                },
                {
                    label: 'Messages',
                    data: monthlyMessageCounts,
                    borderColor: '#34d399',
                    backgroundColor: 'rgba(52, 211, 153, 0.12)',
                    tension: 0.35,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#cbd5e1'
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#94a3b8'
                    },
                    grid: {
                        color: 'rgba(148, 163, 184, 0.08)'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#94a3b8',
                        precision: 0
                    },
                    grid: {
                        color: 'rgba(148, 163, 184, 0.08)'
                    }
                }
            }
        }
    });
}
</script>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>