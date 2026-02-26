<?php require_once 'partials/header.php'; ?>
<div class="p-10 bg-gray-900 min-h-screen">
    <h1 class="text-3xl font-bold text-blue-500 mb-6">
        <?php echo isset($data['product']) ? 'Edit Product' : 'Add Product'; ?>
    </h1>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4 w-1/2">
        <input type="text" name="name" placeholder="Product Name" value="<?php echo $data['product']->name ?? ''; ?>" class="w-full px-4 py-2 rounded bg-gray-800 text-white" required>
        <textarea name="description" placeholder="Description" class="w-full px-4 py-2 rounded bg-gray-800 text-white"><?php echo $data['product']->description ?? ''; ?></textarea>
        <input type="number" name="price" placeholder="Price" value="<?php echo $data['product']->price ?? ''; ?>" class="w-full px-4 py-2 rounded bg-gray-800 text-white" required>

        <input type="file" name="image" class="text-white">
        <?php if(isset($data['product'])): ?>
            <input type="hidden" name="old_image" value="<?php echo $data['product']->image; ?>">
        <?php endif; ?>

        <button type="submit" class="bg-green-600 px-6 py-2 rounded hover:bg-green-700 transition">
            <?php echo isset($data['product']) ? 'Update' : 'Add'; ?> Product
        </button>
    </form>
</div>
<?php require_once 'partials/footer.php'; ?>