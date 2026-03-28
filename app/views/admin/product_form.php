<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<style>
    .admin-form-page {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
    }

    .admin-form-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 30px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #33334a;
        background: #0f0f15;
        color: #fff;
    }

    textarea.form-control {
        min-height: 120px;
    }

    .current-image img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #2f2f40;
    }

    .btn-submit {
        margin-top: 15px;
        padding: 12px 20px;
        border-radius: 10px;
        border: none;
        background: #fff;
        color: #111;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<div class="admin-form-page">
    <div class="admin-form-card">
        <h1>Edit Product</h1>

        <form action="<?php echo URLROOT; ?>/admin/editProduct/<?php echo $product->id; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($product->image); ?>">

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name); ?>" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required><?php echo htmlspecialchars($product->description); ?></textarea>
            </div>

            <div class="form-group">
                <label>Price (LKR)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($product->price); ?>" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control" required>
                    <option value="Phones" <?php echo $product->category == 'Phones' ? 'selected' : ''; ?>>Phones</option>
                    <option value="Accessories" <?php echo $product->category == 'Accessories' ? 'selected' : ''; ?>>Accessories</option>
                    <option value="Tablets" <?php echo $product->category == 'Tablets' ? 'selected' : ''; ?>>Tablets</option>
                    <option value="Smart Watches" <?php echo $product->category == 'Smart Watches' ? 'selected' : ''; ?>>Smart Watches</option>
                </select>
            </div>

            <div class="form-group">
                <label>Stock Quantity</label>
                <input type="number" name="stock" class="form-control" min="0" value="<?php echo htmlspecialchars($product->stock); ?>" required>
            </div>

            <div class="form-group">
                <label>Change Product Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <?php if (!empty($product->image)) : ?>
                <div class="current-image">
                    <p style="margin-bottom:8px;">Current Image:</p>
                    <img src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($product->image); ?>" alt="Current Product Image">
                </div>
            <?php endif; ?>

            <button type="submit" class="btn-submit">Update Product</button>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>