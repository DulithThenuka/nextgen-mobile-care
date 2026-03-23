<?php require APPROOT . '/app/views/inc/header.php'; ?>

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
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
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
        padding: 13px 14px;
        border-radius: 10px;
        border: 1px solid #33334a;
        background: #0f0f15;
        color: #fff;
        outline: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    input[type="file"].form-control {
        padding: 10px;
    }

    .text-error {
        color: #ff7b7b;
        font-size: 0.9rem;
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .btn-submit,
    .btn-back {
        display: inline-block;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-submit {
        background: #fff;
        color: #111;
    }

    .btn-submit:hover {
        background: #ddd;
    }

    .btn-back {
        background: transparent;
        color: #fff;
        border: 1px solid #3a3a50;
    }

    .btn-back:hover {
        background: #1b1b24;
    }

    .file-note {
        color: #9ea0b3;
        font-size: 0.88rem;
        margin-top: 6px;
    }
</style>

<div class="admin-form-page">
    <div class="admin-form-card">
        <h1>Add Product</h1>
        <p>Create a new product for NextGen Mobile Care.</p>

        <form action="<?php echo URLROOT; ?>/admin/addProduct" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Product Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="<?php echo isset($data['name']) ? htmlspecialchars($data['name']) : ''; ?>"
                >
                <div class="text-error">
                    <?php echo isset($data['name_err']) ? $data['name_err'] : ''; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input
                    type="number"
                    step="0.01"
                    name="price"
                    id="price"
                    class="form-control"
                    value="<?php echo isset($data['price']) ? htmlspecialchars($data['price']) : ''; ?>"
                >
                <div class="text-error">
                    <?php echo isset($data['price_err']) ? $data['price_err'] : ''; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                ><?php echo isset($data['description']) ? htmlspecialchars($data['description']) : ''; ?></textarea>
                <div class="text-error">
                    <?php echo isset($data['description_err']) ? $data['description_err'] : ''; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control"
                    accept="image/*"
                >
                <div class="file-note">Upload JPG, PNG, or WEBP image.</div>
                <div class="text-error">
                    <?php echo isset($data['image_err']) ? $data['image_err'] : ''; ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Add Product</button>
                <a href="<?php echo URLROOT; ?>/admin/dashboard" class="btn-back">Back to Dashboard</a>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/app/views/inc/footer.php'; ?>