<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair Bookings - NextGen Mobile Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">

    <nav class="bg-gray-800 px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-500">NextGen Mobile Care - Admin</h1>

        <div class="space-x-3">
            <a href="/nextgen-mobile-care/public/admin/dashboard" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">Dashboard</a>
            <a href="/nextgen-mobile-care/public/admin/products" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">Products</a>
            <a href="/nextgen-mobile-care/public/admin/logout" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">Logout</a>
        </div>
    </nav>

    <div class="p-8">
        <h2 class="text-3xl font-bold mb-6">Repair Bookings</h2>

        <?php if(!empty($data['bookings'])): ?>
            <div class="overflow-x-auto">
                <table class="w-full bg-gray-800 rounded-lg overflow-hidden">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Customer</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                            <th class="px-4 py-3 text-left">Device</th>
                            <th class="px-4 py-3 text-left">Issue</th>
                            <th class="px-4 py-3 text-left">Booking Date</th>
                            <th class="px-4 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['bookings'] as $booking): ?>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-3"><?php echo $booking->id; ?></td>
                                <td class="px-4 py-3"><?php echo $booking->customer_name; ?></td>
                                <td class="px-4 py-3"><?php echo $booking->phone; ?></td>
                                <td class="px-4 py-3"><?php echo $booking->device_type; ?></td>
                                <td class="px-4 py-3"><?php echo $booking->issue; ?></td>
                                <td class="px-4 py-3"><?php echo $booking->booking_date; ?></td>
                                <td class="px-4 py-3"><?php echo $booking->status; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="bg-gray-800 p-6 rounded-lg">
                <p class="text-gray-300">No repair bookings found.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>