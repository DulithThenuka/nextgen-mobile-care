<?php require APPROOT . '/views/partials/header.php'; ?>

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

    .admin-form-card h1 {
        margin-bottom: 10px;
    }

    .admin-form-card p {
        color: #bdbdcc;
        margin-bottom: 25px;
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
        <h1>Add Product</h1>
        <p>Create a new product for your store.</p>

        <form action="<?php echo URLROOT; ?>/admin/addProduct" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>Price (LKR)</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control" required>
                    <option value="Phones">Phones</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Tablets">Tablets</option>
                    <option value="Smart Watches">Smart Watches</option>
                </select>
            </div>

            <div class="form-group">
                <label>Stock Quantity</label>
                <input type="number" name="stock" class="form-control" min="0" required>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn-submit">Add Product</button>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>