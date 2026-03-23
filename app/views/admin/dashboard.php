<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .admin-dashboard {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
    }

    .admin-dashboard h1 {
        margin-bottom: 25px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .stat-card h3 {
        color: #bdbdcc;
        margin-bottom: 10px;
        font-size: 1rem;
    }

    .stat-card .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #fff;
    }

    .recent-box {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 25px;
    }

    .recent-box h2 {
        margin-bottom: 20px;
    }

    .table-wrap {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: #fff;
    }

    table th, table td {
        padding: 12px;
        border-bottom: 1px solid #2a2a3a;
        text-align: left;
    }

    .admin-actions {
        margin-top: 30px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .admin-btn {
        display: inline-block;
        padding: 12px 18px;
        border-radius: 10px;
        background: #fff;
        color: #111;
        font-weight: 600;
    }

    .admin-btn.secondary {
        background: transparent;
        color: #fff;
        border: 1px solid #3a3a50;
    }
</style>

<div class="admin-dashboard">
    <h1>Admin Dashboard</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Products</h3>
            <div class="stat-number"><?php echo $data['product_count']; ?></div>
        </div>

        <div class="stat-card">
            <h3>Total Bookings</h3>
            <div class="stat-number"><?php echo $data['booking_count']; ?></div>
        </div>
    </div>

    <div class="recent-box">
        <h2>Recent Bookings</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Device</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['recent_bookings'])) : ?>
                        <?php foreach ($data['recent_bookings'] as $booking) : ?>
                            <tr>
                                <td><?php echo $booking->id; ?></td>
                                <td><?php echo htmlspecialchars($booking->customer_name); ?></td>
                                <td><?php echo htmlspecialchars($booking->device_model); ?></td>
                                <td><?php echo htmlspecialchars($booking->service_type); ?></td>
                                <td><?php echo htmlspecialchars($booking->booking_date); ?></td>
                                <td><?php echo htmlspecialchars($booking->status); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">No recent bookings found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="admin-actions">
            <a href="<?php echo URLROOT; ?>/booking/admin" class="admin-btn">Manage Bookings</a>
            <a href="<?php echo URLROOT; ?>/products" class="admin-btn secondary">View Products</a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>