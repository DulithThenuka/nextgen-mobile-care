<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - NextGen Mobile Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

<!-- Navbar -->
<nav class="bg-gray-800 px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-500">
        NextGen Mobile Care - Admin
    </h1>

    <div>
        <span class="mr-4 text-gray-300">
            Welcome, <?php echo $_SESSION['admin_username']; ?>
        </span>
        <a href="/nextgen-mobile-care/public/admin/logout" 
           class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">
           Logout
        </a>
    </div>
</nav>

<!-- Main Content -->
<div class="p-10">

    <h2 class="text-3xl font-bold mb-8">Dashboard</h2>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Products Card -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Products</h3>
            <p class="text-gray-400 mb-6">Manage all products in your store.</p>
            <a href="/nextgen-mobile-care/public/admin/products" 
               class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">
               Manage Products
            </a>
        </div>

        <!-- Orders Card (future) -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Orders</h3>
            <p class="text-gray-400 mb-6">View and manage customer orders.</p>
            <button class="bg-gray-600 px-4 py-2 rounded cursor-not-allowed">
                Coming Soon
            </button>
        </div>

        <!-- Repair Bookings Card -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Repair Bookings</h3>
            <p class="text-gray-400 mb-6">Manage repair service requests.</p>
            <button class="bg-gray-600 px-4 py-2 rounded cursor-not-allowed">
                <a href="/nextgen-mobile-care/public/admin/bookings" 
                    class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">
                        View Bookings
                </a>
            </button>
        </div>

    </div>

</div>

</body>
</html>