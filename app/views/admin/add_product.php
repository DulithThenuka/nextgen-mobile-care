<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
.admin-form-page {
    padding: 40px 0 60px;
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.12), transparent 25%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.10), transparent 25%),
        #0b0f19;
    min-height: 100vh;
}

.admin-form-wrap {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.9fr 1.1fr;
    gap: 28px;
}

.info-card,
.form-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 24px;
    box-shadow: 0 16px 36px rgba(0,0,0,0.22);
}

.info-card {
    padding: 30px;
}

.form-card {
    padding: 32px;
}

.page-badge {
    display: inline-block;
    padding: 8px 14px;
    background: rgba(59,130,246,0.12);
    border: 1px solid rgba(59,130,246,0.22);
    color: #93c5fd;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 16px;
}

.info-card h2,
.form-card h1 {
    font-size: 2rem;
    margin-bottom: 12px;
    color: #fff;
}

.info-card p,
.form-subtext {
    color: #9fb0c7;
    line-height: 1.75;
}

.form-subtext {
    margin-bottom: 24px;
}

.info-list {
    display: grid;
    gap: 14px;
    margin-top: 24px;
}

.info-item {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    padding: 16px 18px;
}

.info-item h3 {
    font-size: 16px;
    margin-bottom: 6px;
    color: #fff;
}

.info-item p {
    margin: 0;
    color: #b8c4d8;
    font-size: 14px;
    line-height: 1.65;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.form-group {
    margin-bottom: 18px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #dbe7f5;
    font-size: 14px;
    font-weight: 700;
}

.form-control {
    width: 100%;
    padding: 14px 15px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.10);
    background: #0f172a;
    color: #fff;
    outline: none;
    font-size: 15px;
    transition: 0.25s ease;
}

.form-control::placeholder {
    color: #8fa1bb;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.16);
}

textarea.form-control {
    min-height: 140px;
    resize: vertical;
}

input[type="file"].form-control {
    padding: 12px;
}

.text-error {
    color: #fca5a5;
    font-size: 13px;
    margin-top: 7px;
}

.form-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 6px;
}

.submit-btn,
.back-btn {
    display: inline-block;
    padding: 14px 22px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    transition: 0.25s ease;
    border: none;
    cursor: pointer;
}

.submit-btn {
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    color: #fff;
    box-shadow: 0 10px 25px rgba(59,130,246,0.25);
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 32px rgba(59,130,246,0.35);
}

.back-btn {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.10);
    color: #fff;
}

.back-btn:hover {
    border-color: #3b82f6;
    color: #93c5fd;
}

.helper-note {
    margin-top: 16px;
    color: #8fa1bb;
    font-size: 13px;
    line-height: 1.7;
}

@media (max-width: 900px) {
    .admin-form-wrap {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .admin-form-page {
        padding: 30px 0 50px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .info-card h2,
    .form-card h1 {
        font-size: 1.7rem;
    }
}
</style>

<div class="admin-form-page">
    <div class="container">
        <div class="admin-form-wrap">

            <div class="info-card">
                <span class="page-badge">Admin Product Management</span>
                <h2>Add New Product</h2>
                <p>
                    Create a new product for your store with name, category, price, stock, description,
                    and product image. This keeps your product catalog professional and easy to manage.
                </p>

                <div class="info-list">
                    <div class="info-item">
                        <h3>Clear Product Details</h3>
                        <p>Add product names, categories, and descriptions so customers can understand items easily.</p>
                    </div>

                    <div class="info-item">
                        <h3>Stock Control</h3>
                        <p>Set stock correctly so the product and ordering system work properly across the site.</p>
                    </div>

                    <div class="info-item">
                        <h3>Professional Presentation</h3>
                        <p>Use a good image and a strong description to make products look better in the customer store.</p>
                    </div>
                </div>
            </div>

            <div class="form-card">
                <span class="page-badge">Create Product</span>
                <h1>Add Product</h1>
                <p class="form-subtext">Fill in the product details below and save it to your catalog.</p>

                <form action="<?php echo URLROOT; ?>/admin/add_product" method="POST" enctype="multipart/form-data">
                    <div class="form-grid">

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Enter product name"
                                value="<?php echo $data['name'] ?? ''; ?>"
                            >
                            <div class="text-error"><?php echo $data['name_err'] ?? ''; ?></div>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input
                                type="text"
                                name="category"
                                id="category"
                                class="form-control"
                                placeholder="Enter category"
                                value="<?php echo $data['category'] ?? ''; ?>"
                            >
                            <div class="text-error"><?php echo $data['category_err'] ?? ''; ?></div>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                id="price"
                                class="form-control"
                                placeholder="Enter price"
                                value="<?php echo $data['price'] ?? ''; ?>"
                            >
                            <div class="text-error"><?php echo $data['price_err'] ?? ''; ?></div>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input
                                type="number"
                                name="stock"
                                id="stock"
                                class="form-control"
                                placeholder="Enter stock quantity"
                                value="<?php echo $data['stock'] ?? ''; ?>"
                            >
                            <div class="text-error"><?php echo $data['stock_err'] ?? ''; ?></div>
                        </div>

                        <div class="form-group full">
                            <label for="description">Description</label>
                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                placeholder="Enter product description"
                            ><?php echo $data['description'] ?? ''; ?></textarea>
                            <div class="text-error"><?php echo $data['description_err'] ?? ''; ?></div>
                        </div>

                        <div class="form-group full">
                            <label for="image">Product Image</label>
                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-control"
                            >
                            <div class="text-error"><?php echo $data['image_err'] ?? ''; ?></div>
                        </div>

                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Save Product</button>
                        <a href="<?php echo URLROOT; ?>/admin/products" class="back-btn">Back to Products</a>
                    </div>

                    <p class="helper-note">
                        Keep the field names aligned with your existing admin controller logic:
                        <strong>name</strong>, <strong>category</strong>, <strong>price</strong>,
                        <strong>stock</strong>, <strong>description</strong>, and <strong>image</strong>.
                    </p>
                </form>
            </div>

        </div>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>