<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
.admin-dashboard {
    padding: 40px 0;
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.12), transparent 25%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.10), transparent 25%),
        #0b0f19;
    min-height: 100vh;
}

/* TITLE */
.dashboard-header {
    margin-bottom: 30px;
}

.dashboard-header h1 {
    font-size: 2rem;
    margin-bottom: 8px;
}

.dashboard-header p {
    color: #9fb0c7;
}

/* GRID */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

/* CARD */
.stat-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 18px;
    padding: 25px;
    transition: 0.3s ease;
    position: relative;
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: rgba(77,163,255,0.3);
    box-shadow: 0 15px 30px rgba(0,0,0,0.35);
}

/* ICON */
.stat-icon {
    font-size: 28px;
    margin-bottom: 12px;
}

/* TITLE */
.stat-card h3 {
    font-size: 15px;
    color: #9fb0c7;
    margin-bottom: 10px;
}

/* VALUE */
.stat-value {
    font-size: 26px;
    font-weight: 800;
}

/* COLORS */
.blue { color: #3b82f6; }
.green { color: #10b981; }
.orange { color: #f59e0b; }
.red { color: #ef4444; }

/* ACTIONS */
.quick-actions {
    margin-top: 40px;
}

.quick-actions h2 {
    margin-bottom: 15px;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.action-btn {
    display: block;
    padding: 16px;
    text-align: center;
    border-radius: 12px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.action-btn:hover {
    background: rgba(59,130,246,0.15);
    border-color: #3b82f6;
    transform: translateY(-3px);
}

/* RESPONSIVE */
@media(max-width: 900px){
    .stats-grid,
    .actions-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 500px){
    .stats-grid,
    .actions-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="admin-dashboard">
    <div class="container">

        <!-- HEADER -->
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <p>Manage your system, monitor activity, and control your platform.</p>
        </div>

        <!-- STATS -->
        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon blue">📅</div>
                <h3>Total Bookings</h3>
                <div class="stat-value"><?php echo $data['bookings_count'] ?? 0; ?></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">🛒</div>
                <h3>Order Requests</h3>
                <div class="stat-value"><?php echo $data['orders_count'] ?? 0; ?></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon orange">📦</div>
                <h3>Total Products</h3>
                <div class="stat-value"><?php echo $data['products_count'] ?? 0; ?></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon red">✉️</div>
                <h3>Messages</h3>
                <div class="stat-value"><?php echo $data['messages_count'] ?? 0; ?></div>
            </div>

        </div>

        <!-- QUICK ACTIONS -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>

            <div class="actions-grid">
                <a href="<?php echo URLROOT; ?>/admin/products" class="action-btn">Manage Products</a>
                <a href="<?php echo URLROOT; ?>/admin/bookings" class="action-btn">View Bookings</a>
                <a href="<?php echo URLROOT; ?>/admin/orders" class="action-btn">Order Requests</a>
                <a href="<?php echo URLROOT; ?>/admin/message" class="action-btn">Contact Messages</a>
            </div>
        </div>

    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>