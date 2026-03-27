<?php require APPROOT . '/views/partials/header.php'; ?>

<?php
$product = isset($data['product']) ? $data['product'] : null;

$name = isset($data['name']) ? $data['name'] : '';
$phone = isset($data['phone']) ? $data['phone'] : '';
$address = isset($data['address']) ? $data['address'] : '';
$quantity = isset($data['quantity']) ? $data['quantity'] : 1;

$name_err = isset($data['name_err']) ? $data['name_err'] : '';
$phone_err = isset($data['phone_err']) ? $data['phone_err'] : '';
$address_err = isset($data['address_err']) ? $data['address_err'] : '';
$quantity_err = isset($data['quantity_err']) ? $data['quantity_err'] : '';

$currentStock = ($product && isset($product->stock)) ? (int)$product->stock : 0;
$productName = ($product && isset($product->name)) ? $product->name : 'Selected Product';
$productPrice = ($product && isset($product->price)) ? $product->price : 0;
$productImage = ($product && isset($product->image)) ? $product->image : '';
$productCategory = ($product && isset($product->category)) ? $product->category : 'General';
?>

<style>
    .order-page {
        padding: 70px 0 80px;
        background:
            radial-gradient(circle at top left, rgba(59,130,246,0.16), transparent 25%),
            radial-gradient(circle at bottom right, rgba(6,182,212,0.12), transparent 25%),
            linear-gradient(180deg, #0b0f19 0%, #101827 100%);
        min-height: 100vh;
    }

    .order-hero {
        text-align: center;
        margin-bottom: 35px;
    }

    .order-badge {
        display: inline-block;
        padding: 8px 14px;
        background: rgba(77, 163, 255, 0.12);
        border: 1px solid rgba(77, 163, 255, 0.30);
        color: #8ec5ff;
        border-radius: 999px;
        font-size: 13px;
        margin-bottom: 16px;
    }

    .order-hero h1 {
        font-size: 42px;
        margin-bottom: 12px;
        color: #fff;
    }

    .order-hero p {
        color: #b8c4d8;
        font-size: 17px;
        max-width: 760px;
        margin: 0 auto;
    }

    .order-layout {
        display: grid;
        grid-template-columns: 0.92fr 1.08fr;
        gap: 28px;
        align-items: start;
    }

    .product-card,
    .order-form-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        box-shadow: 0 18px 45px rgba(0,0,0,0.24);
    }

    .product-card {
        padding: 24px;
    }

    .order-form-card {
        padding: 30px;
    }

    .product-image-wrap {
        height: 300px;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        margin-bottom: 22px;
        position: relative;
    }

    .product-image-wrap img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .floating-badge {
        position: absolute;
        top: 16px;
        padding: 8px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .category-badge {
        left: 16px;
        background: rgba(15, 23, 42, 0.88);
        color: #dbe7f5;
        border: 1px solid rgba(255,255,255,0.10);
    }

    .stock-badge {
        right: 16px;
        color: #fff;
    }

    .stock-in {
        background: linear-gradient(135deg, #059669, #10b981);
    }

    .stock-low {
        background: linear-gradient(135deg, #d97706, #f59e0b);
    }

    .stock-out {
        background: linear-gradient(135deg, #dc2626, #ef4444);
    }

    .product-title {
        font-size: 28px;
        color: #fff;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 26px;
        font-weight: 800;
        color: #7dd3fc;
        margin-bottom: 18px;
    }

    .product-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
        margin-bottom: 18px;
    }

    .meta-box {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 16px;
    }

    .meta-box h4 {
        color: #9fb0c7;
        font-size: 13px;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .meta-box p {
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    .product-note {
        background: rgba(77,163,255,0.10);
        border: 1px solid rgba(77,163,255,0.18);
        color: #bfdbfe;
        border-radius: 16px;
        padding: 16px 18px;
        font-size: 14px;
        line-height: 1.7;
    }

    .form-title {
        font-size: 28px;
        color: #fff;
        margin-bottom: 8px;
    }

    .form-subtitle {
        color: #9fb0c7;
        margin-bottom: 24px;
        font-size: 15px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #dbe7f5;
        font-size: 14px;
        font-weight: 600;
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
    }

    .form-control::placeholder {
        color: #90a0b8;
    }

    .form-control:focus {
        border-color: #4da3ff;
        box-shadow: 0 0 0 3px rgba(77,163,255,0.12);
    }

    textarea.form-control {
        min-height: 130px;
        resize: vertical;
    }

    .error-text {
        color: #fca5a5;
        font-size: 13px;
        margin-top: 7px;
    }

    .order-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 8px;
    }

    .submit-btn,
    .secondary-btn,
    .disabled-btn {
        display: inline-block;
        padding: 14px 22px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s ease;
        text-align: center;
        border: none;
        cursor: pointer;
    }

    .submit-btn {
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: #fff;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px rgba(59,130,246,0.22);
    }

    .secondary-btn {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.12);
        color: #fff;
    }

    .secondary-btn:hover {
        border-color: #4da3ff;
        color: #4da3ff;
    }

    .disabled-btn {
        background: rgba(239,68,68,0.12);
        border: 1px solid rgba(239,68,68,0.18);
        color: #fca5a5;
        cursor: not-allowed;
    }

    .small-help {
        color: #8fa1bb;
        font-size: 13px;
        margin-top: 14px;
        line-height: 1.6;
    }

    @media (max-width: 992px) {
        .order-layout {
            grid-template-columns: 1fr;
        }

        .order-hero h1 {
            font-size: 34px;
        }
    }

    @media (max-width: 768px) {
        .order-page {
            padding: 50px 0 65px;
        }

        .order-hero h1,
        .product-title,
        .form-title {
            font-size: 28px;
        }

        .form-grid,
        .product-meta-grid {
            grid-template-columns: 1fr;
        }

        .product-image-wrap {
            height: 240px;
        }
    }
</style>

<section class="order-page">
    <div class="container">
        <div class="order-hero">
            <span class="order-badge">Simple Ordering. Premium Product Care.</span>
            <h1>Request Product Order</h1>
            <p>
                Submit your request for this product using a clean and professional order form.
                Stock rules and quantity validation already protect the ordering flow in your system.
            </p>
        </div>

        <div class="order-layout">
            <div class="product-card">
                <div class="product-image-wrap">
                    <span class="floating-badge category-badge"><?php echo htmlspecialchars($productCategory); ?></span>

                    <?php if ($currentStock <= 0) : ?>
                        <span class="floating-badge stock-badge stock-out">Out of Stock</span>
                    <?php elseif ($currentStock <= 5) : ?>
                        <span class="floating-badge stock-badge stock-low">Low Stock</span>
                    <?php else : ?>
                        <span class="floating-badge stock-badge stock-in">In Stock</span>
                    <?php endif; ?>

                    <?php if (!empty($productImage)) : ?>
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($productImage); ?>" alt="<?php echo htmlspecialchars($productName); ?>">
                    <?php else : ?>
                        <div style="color:#9fb0c7;">No image available</div>
                    <?php endif; ?>
                </div>

                <h2 class="product-title"><?php echo htmlspecialchars($productName); ?></h2>
                <div class="product-price">Rs. <?php echo number_format($productPrice, 2); ?></div>

                <div class="product-meta-grid">
                    <div class="meta-box">
                        <h4>Category</h4>
                        <p><?php echo htmlspecialchars($productCategory); ?></p>
                    </div>

                    <div class="meta-box">
                        <h4>Available Stock</h4>
                        <p><?php echo $currentStock; ?> item(s)</p>
                    </div>
                </div>

                <div class="product-note">
                    Your project already prevents ordering more than available stock and prevents ordering when stock is 0.
                    This page keeps that same system and only upgrades the UI. :contentReference[oaicite:3]{index=3}
                </div>
            </div>

            <div class="order-form-card">
                <h2 class="form-title">Customer Order Request</h2>
                <p class="form-subtitle">Fill in your details below to request this product.</p>

                <form action="" method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your full name">
                            <?php if (!empty($name_err)) : ?>
                                <div class="error-text"><?php echo $name_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Enter your phone number">
                            <?php if (!empty($phone_err)) : ?>
                                <div class="error-text"><?php echo $phone_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group full-width">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter your full delivery or contact address"><?php echo htmlspecialchars($address); ?></textarea>
                            <?php if (!empty($address_err)) : ?>
                                <div class="error-text"><?php echo $address_err; ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                class="form-control"
                                min="1"
                                <?php echo ($currentStock > 0) ? 'max="' . $currentStock . '"' : ''; ?>
                                value="<?php echo htmlspecialchars($quantity); ?>"
                            >
                            <?php if (!empty($quantity_err)) : ?>
                                <div class="error-text"><?php echo $quantity_err; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="order-actions">
                        <?php if ($currentStock > 0) : ?>
                            <button type="submit" class="submit-btn">Submit Order Request</button>
                        <?php else : ?>
                            <span class="disabled-btn">Ordering Disabled</span>
                        <?php endif; ?>

                        <a href="<?php echo URLROOT; ?>/products" class="secondary-btn">Back to Products</a>

                        <?php if ($product && isset($product->id)) : ?>
                            <a href="<?php echo URLROOT; ?>/products/show/<?php echo $product->id; ?>" class="secondary-btn">View Product</a>
                        <?php endif; ?>
                    </div>

                    <p class="small-help">
                        Keep these field names exactly the same as your current order request system:
                        <strong>name</strong>, <strong>phone</strong>, <strong>address</strong>, <strong>quantity</strong>. :contentReference[oaicite:4]{index=4}
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>