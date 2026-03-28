<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<style>
.admin-bookings-page {
    padding: 40px 0 60px;
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.12), transparent 25%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.10), transparent 25%),
        #0b0f19;
    min-height: 100vh;
}

.admin-bookings-topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 28px;
}

.admin-bookings-topbar h1 {
    font-size: 2rem;
    margin-bottom: 6px;
    color: #fff;
}

.admin-bookings-topbar p {
    color: #9fb0c7;
    margin: 0;
}

.summary-badges {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.summary-badge {
    display: inline-block;
    padding: 10px 14px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    border: 1px solid rgba(255,255,255,0.08);
    background: rgba(255,255,255,0.04);
    color: #dbe7f5;
}

.bookings-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 16px 36px rgba(0,0,0,0.22);
}

.table-wrap {
    overflow-x: auto;
}

.bookings-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1180px;
}

.bookings-table thead {
    background: rgba(255,255,255,0.04);
}

.bookings-table th,
.bookings-table td {
    padding: 18px 16px;
    text-align: left;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    vertical-align: top;
}

.bookings-table th {
    color: #dbe7f5;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.bookings-table td {
    color: #c7d2e3;
    font-size: 14px;
}

.bookings-table tbody tr {
    transition: 0.25s ease;
}

.bookings-table tbody tr:hover {
    background: rgba(255,255,255,0.03);
}

.customer-name {
    color: #ffffff;
    font-weight: 700;
    margin-bottom: 4px;
}

.sub-text {
    color: #9fb0c7;
    font-size: 13px;
    line-height: 1.6;
}

.device-box {
    max-width: 220px;
}

.issue-box {
    max-width: 260px;
    line-height: 1.7;
}

.badge {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.badge-service {
    background: rgba(59,130,246,0.12);
    color: #93c5fd;
    border: 1px solid rgba(59,130,246,0.20);
}

.badge-date {
    background: rgba(255,255,255,0.05);
    color: #dbe7f5;
    border: 1px solid rgba(255,255,255,0.08);
}

.badge-pending {
    background: rgba(245,158,11,0.12);
    color: #fcd34d;
    border: 1px solid rgba(245,158,11,0.20);
}

.badge-confirmed,
.badge-approved {
    background: rgba(16,185,129,0.12);
    color: #86efac;
    border: 1px solid rgba(16,185,129,0.20);
}

.badge-completed {
    background: rgba(6,182,212,0.12);
    color: #67e8f9;
    border: 1px solid rgba(6,182,212,0.20);
}

.badge-cancelled,
.badge-rejected {
    background: rgba(239,68,68,0.12);
    color: #fca5a5;
    border: 1px solid rgba(239,68,68,0.20);
}

.action-group {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.action-btn {
    display: inline-block;
    padding: 9px 14px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: 0.25s ease;
}

.view-btn {
    background: rgba(59,130,246,0.12);
    color: #93c5fd;
    border: 1px solid rgba(59,130,246,0.20);
}

.view-btn:hover {
    background: rgba(59,130,246,0.20);
}

.edit-btn {
    background: rgba(16,185,129,0.12);
    color: #86efac;
    border: 1px solid rgba(16,185,129,0.20);
}

.edit-btn:hover {
    background: rgba(16,185,129,0.18);
}

.delete-btn {
    background: rgba(239,68,68,0.12);
    color: #fca5a5;
    border: 1px solid rgba(239,68,68,0.20);
}

.delete-btn:hover {
    background: rgba(239,68,68,0.18);
}

.empty-state {
    padding: 40px 24px;
    text-align: center;
    color: #9fb0c7;
}

.empty-state h3 {
    color: #fff;
    margin-bottom: 8px;
}

@media (max-width: 768px) {
    .admin-bookings-page {
        padding: 30px 0 50px;
    }

    .admin-bookings-topbar h1 {
        font-size: 1.7rem;
    }
}
</style>

<?php
$bookings = $data['bookings'] ?? [];

$totalBookings = count($bookings);
$pendingCount = 0;
$completedCount = 0;

foreach ($bookings as $booking) {
    $statusValue = strtolower(trim($booking->status ?? 'pending'));

    if ($statusValue === 'pending') {
        $pendingCount++;
    }

    if ($statusValue === 'completed') {
        $completedCount++;
    }
}
?>

<div class="admin-bookings-page">
    <div class="container">

        <div class="admin-bookings-topbar">
            <div>
                <h1>Manage Bookings</h1>
                <p>Review customer repair bookings, service details, and booking status.</p>
            </div>

            <div class="summary-badges">
                <span class="summary-badge">Total: <?php echo $totalBookings; ?></span>
                <span class="summary-badge">Pending: <?php echo $pendingCount; ?></span>
                <span class="summary-badge">Completed: <?php echo $completedCount; ?></span>
            </div>
        </div>

        <div class="bookings-card">
            <?php if (!empty($bookings)) : ?>
                <div class="table-wrap">
                    <table class="bookings-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Device</th>
                                <th>Service</th>
                                <th>Booking Date</th>
                                <th>Issue</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $booking) : ?>
                                <?php
                                    $status = strtolower(trim($booking->status ?? 'pending'));
                                    $statusClass = 'badge-pending';

                                    if (in_array($status, ['confirmed', 'approved'])) {
                                        $statusClass = 'badge-confirmed';
                                    } elseif ($status === 'completed') {
                                        $statusClass = 'badge-completed';
                                    } elseif (in_array($status, ['cancelled', 'rejected'])) {
                                        $statusClass = 'badge-cancelled';
                                    }

                                    $issue = !empty($booking->issue_description) ? $booking->issue_description : 'No issue description provided.';
                                    if (strlen($issue) > 110) {
                                        $issue = substr($issue, 0, 110) . '...';
                                    }
                                ?>
                                <tr>
                                    <td>
                                        <div class="customer-name"><?php echo htmlspecialchars($booking->customer_name ?? 'Unknown Customer'); ?></div>
                                        <div class="sub-text"><?php echo htmlspecialchars($booking->email ?? 'No email'); ?></div>
                                        <div class="sub-text"><?php echo htmlspecialchars($booking->phone ?? 'No phone'); ?></div>
                                    </td>

                                    <td>
                                        <div class="device-box">
                                            <div class="customer-name" style="font-size: 14px;">
                                                <?php echo htmlspecialchars($booking->device_model ?? 'Unknown Device'); ?>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge badge-service">
                                            <?php echo htmlspecialchars($booking->service_type ?? 'General Service'); ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-date">
                                            <?php echo htmlspecialchars($booking->booking_date ?? 'No Date'); ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="issue-box"><?php echo htmlspecialchars($issue); ?></div>
                                    </td>

                                    <td>
                                        <span class="badge <?php echo $statusClass; ?>">
                                            <?php echo htmlspecialchars(ucfirst($booking->status ?? 'Pending')); ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action-group">
                                            <a href="<?php echo URLROOT; ?>/admin/view_booking/<?php echo $booking->id; ?>" class="action-btn view-btn">View</a>
                                            <a href="<?php echo URLROOT; ?>/admin/edit_booking/<?php echo $booking->id; ?>" class="action-btn edit-btn">Edit</a>
                                            <a href="<?php echo URLROOT; ?>/admin/delete_booking/<?php echo $booking->id; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <div class="empty-state">
                    <h3>No bookings found</h3>
                    <p>Customer repair bookings will appear here once they are submitted.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>