<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .admin-bookings-page {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
    }

    .admin-bookings-page h1 {
        margin-bottom: 25px;
    }

    .table-wrap {
        overflow-x: auto;
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 16px;
        padding: 20px;
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
        vertical-align: top;
    }

    select, button {
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #33334a;
    }

    button {
        background: #fff;
        color: #111;
        font-weight: 600;
        cursor: pointer;
    }
</style>

<div class="admin-bookings-page">
    <h1>Manage Bookings</h1>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Device</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Issue</th>
                    <th>Status</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['bookings'])) : ?>
                    <?php foreach ($data['bookings'] as $booking) : ?>
                        <tr>
                            <td><?php echo $booking->id; ?></td>
                            <td><?php echo htmlspecialchars($booking->customer_name); ?></td>
                            <td>
                                <?php echo htmlspecialchars($booking->email); ?><br>
                                <?php echo htmlspecialchars($booking->phone); ?>
                            </td>
                            <td><?php echo htmlspecialchars($booking->device_model); ?></td>
                            <td><?php echo htmlspecialchars($booking->service_type); ?></td>
                            <td><?php echo htmlspecialchars($booking->booking_date); ?></td>
                            <td><?php echo htmlspecialchars($booking->issue_description); ?></td>
                            <td><?php echo htmlspecialchars($booking->status); ?></td>
                            <td>
                                <form action="<?php echo URLROOT; ?>/booking/updateStatus/<?php echo $booking->id; ?>" method="POST">
                                    <select name="status">
                                        <option value="Pending" <?php echo $booking->status == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Confirmed" <?php echo $booking->status == 'Confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                        <option value="Completed" <?php echo $booking->status == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                        <option value="Cancelled" <?php echo $booking->status == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                    </select>
                                    <button type="submit">Save</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9">No bookings found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>