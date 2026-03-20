<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo isset($data['product']) ? 'Edit Product' : 'Add Product'; ?> - NextGen Mobile Care
    </title>
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
            <a href="/nextgen-mobile-care/public/admin/products" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">
                Back to Products
            </a>
            <a href="/nextgen-mobile-care/public/admin/logout" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </a>
        </div>
    </nav>

    <!-- Form -->
    <div class="max-w-2xl mx-auto p-8">
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6">
                <?php echo isset($data['product']) ? 'Edit Product' : 'Add Product'; ?>
            </h2>

            <form method="POST" enctype="multipart/form-data" class="space-y-5">
                <div>
                    <label class="block mb-2 text-sm text-gray-300">Product Name</label>
                    <input
                        type="text"
                        name="name"
                        value="<?php echo $data['product']->name ?? ''; ?>"
                        class="w-full px-4 py-2 rounded bg-gray-700 text-white"
                        required
                    >
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-300">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        class="w-full px-4 py-2 rounded bg-gray-700 text-white"
                    ><?php echo $data['product']->description ?? ''; ?></textarea>
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-300">Price</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        value="<?php echo $data['product']->price ?? ''; ?>"
                        class="w-full px-4 py-2 rounded bg-gray-700 text-white"
                        required
                    >
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-300">Product Image</label>
                    <input
                        type="file"
                        name="image"
                        class="w-full text-white"
                    >
                </div>

                <?php if(isset($data['product'])): ?>
                    <input type="hidden" name="old_image" value="<?php echo $data['product']->image; ?>">

                    <div>
                        <p class="mb-2 text-sm text-gray-300">Current Image</p>
                        <img
                            src="/nextgen-mobile-care/public/assets/images/<?php echo $data['product']->image; ?>"
                            alt="<?php echo $data['product']->name; ?>"
                            class="w-24 h-24 object-cover rounded"
                        >
                    </div>
                <?php endif; ?>

                <button
                    type="submit"
                    class="bg-green-600 px-6 py-2 rounded hover:bg-green-700 transition"
                >
                    <?php echo isset($data['product']) ? 'Update Product' : 'Add Product'; ?>
                </button>
            </form>
        </div>
    </div>

</body>
</html>