<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - NextGen Mobile Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-500">NextGen Mobile Care - Admin</h1>

        <div class="space-x-3">
            <a href="/nextgen-mobile-care/public/admin/dashboard" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">
                Dashboard
            </a>
            <a href="/nextgen-mobile-care/public/admin/addProduct" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700 transition">
                Add Product
            </a>
            <a href="/nextgen-mobile-care/public/admin/logout" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="p-8">
        <h2 class="text-3xl font-bold mb-6">Manage Products</h2>

        <?php if(!empty($data['products'])): ?>
            <div class="overflow-x-auto">
                <table class="w-full bg-gray-800 rounded-lg overflow-hidden">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Image</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Description</th>
                            <th class="px-4 py-3 text-left">Price</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['products'] as $product): ?>
                            <tr class="border-b border-gray-700">
                                <td class="px-4 py-3"><?php echo $product->id; ?></td>
                                <td class="px-4 py-3">
                                    <img 
                                        src="/nextgen-mobile-care/public/assets/images/<?php echo $product->image; ?>" 
                                        alt="<?php echo $product->name; ?>"
                                        class="w-16 h-16 object-cover rounded"
                                    >
                                </td>
                                <td class="px-4 py-3"><?php echo $product->name; ?></td>
                                <td class="px-4 py-3"><?php echo $product->description; ?></td>
                                <td class="px-4 py-3">Rs. <?php echo $product->price; ?></td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="/nextgen-mobile-care/public/admin/editProduct/<?php echo $product->id; ?>" class="bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 transition">
                                        Edit
                                    </a>
                                    <a href="/nextgen-mobile-care/public/admin/deleteProduct/<?php echo $product->id; ?>" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 transition" onclick="return confirm('Are you sure you want to delete this product?');">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="bg-gray-800 p-6 rounded-lg">
                <p class="text-gray-300">No products found.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>