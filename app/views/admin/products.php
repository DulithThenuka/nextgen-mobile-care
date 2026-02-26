<?php require_once 'partials/header.php'; ?>
<div class="p-10 bg-gray-900 min-h-screen">
    <h1 class="text-3xl font-bold text-blue-500 mb-6">Manage Products</h1>

    <a href="/nextgen-mobile-care/public/admin/addProduct" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700 transition mb-6 inline-block">Add New Product</a>

    <table class="w-full text-left bg-gray-800 rounded-lg overflow-hidden">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['products'] as $product): ?>
                <tr class="border-b border-gray-700">
                    <td class="px-4 py-2"><?php echo $product->id; ?></td>
                    <td class="px-4 py-2"><?php echo $product->name; ?></td>
                    <td class="px-4 py-2">₹<?php echo $product->price; ?></td>
                    <td class="px-4 py-2">
                        <img src="/nextgen-mobile-care/public/assets/images/<?php echo $product->image; ?>" alt="" class="w-20 h-20 object-cover rounded">
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="/nextgen-mobile-care/public/admin/editProduct/<?php echo $product->id; ?>" class="bg-blue-600 px-2 py-1 rounded hover:bg-blue-700">Edit</a>
                        <a href="/nextgen-mobile-care/public/admin/deleteProduct/<?php echo $product->id; ?>" class="bg-red-600 px-2 py-1 rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once 'partials/footer.php'; ?>