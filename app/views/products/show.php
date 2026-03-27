<?php require APPROOT . '/views/partials/header.php'; ?>

<?php
$product = isset($data['product']) ? $data['product'] : null;

if (!$product) {
    echo '<div class="container" style="padding: 60px 0; color: white;">Product not found.</div>';
    require APPROOT . '/views/partials/footer.php';
    exit;
}

$isOutOfStock = ((int)$product->stock <= 0);
$isLowStock = ((int)$product->stock > 0 && (int)$product->stock <= 5);

$whatsappNumber = '94770000000'; // change this to your business WhatsApp number
$whatsappMessage = 'Hello NextGen Mobile Care, I want to ask about this product: ' . $product->name;
$whatsappLink = 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode($whatsappMessage);
?>

<style>
    .product-details-page {
        padding: 70px 0 80px;
        background:
            radial-gradient(circle at top left, rgba(59,130,246,0.16), transparent 25%),
            radial-gradient(circle at bottom right, rgba(6,182,212,0.12), transparent 25%),
            linear-gradient(180deg, #0b0f19 0%, #101827 100%);
        min-height: 100vh;
    }

    .product-breadcrumb {
        margin-bottom: 25px;
        font-size: 14px;
        color: #9fb0c7;
    }

    .product-breadcrumb a {
        color: #9fb0c7;
        text-decoration: none;
    }

    .product-breadcrumb a:hover {
        color: #4da3ff;
    }

    .details-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        align-items: stretch;
    }

    .details-image-card,
    .details-info-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(0,0,0,0.24);
    }

    .details-image-card {
        padding: 28px;
    }

    .product-main-image {
        height: 500px;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        position: relative;
    }

    .product-main-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .floating-badge {
        position: absolute;
        top: 18px;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .category-badge {
        left: 18px;
        background: rgba(15, 23, 42, 0.88);
        color: #dbe7f5;
        border: 1px solid rgba(255,255,255,0.10);
    }

    .stock-badge {
        right: 18px;
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

    .details-info-card {
        padding: 34px 30px;
    }

    .details-top-badge {
        display: inline-block;
        padding: 8px 14px;
        background: rgba(77,163,255,0.12);
        border: 1px solid rgba(77,163,255,0.28);
        color: #8ec5ff;
        border-radius: 999px;
        font-size: 13px;
        margin-bottom: 16px;
    }

    .product-title {
        font-size: 40px;
        line-height: 1.15;
        color: #fff;
        margin-bottom: 14px;
    }

    .product-price {
        font-size: 32px;
        font-weight: 800;
        color: #7dd3fc;
        margin-bottom: 20px;
    }

    .product-description {
        color: #c7d2e3;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 26px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-bottom: 26px;
    }

    .info-box {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 18px;
    }

    .info-box h4 {
        color: #9fb0c7;
        font-size: 13px;
        margin-bottom: 8px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-box p {
        color: #fff;
        font-size: 16px;
        margin: 0;
        font-weight: 700;
    }

    .stock-note {
        margin-bottom: 26px;
        padding: 16px 18px;
        border-radius: 14px;
        font-size: 15px;
        font-weight: 600;
    }

    .note-in {
        background: rgba(16,185,129,0.10);
        border: 1px solid rgba(16,185,129,0.18);
        color: #a7f3d0;
    }

    .note-low {
        background: rgba(245,158,11,0.10);
        border: 1px solid rgba(245,158,11,0.18);
        color: #fde68a;
    }

    .note-out {
        background: rgba(239,68,68,0.10);
        border: 1px solid rgba(239,68,68,0.18);
        color: #fca5a5;
    }

    .details-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .details-btn,
    .secondary-btn,
    .disabled-btn {
        display: inline-block;
        padding: 14px 22px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s ease;
        text-align: center;
    }

    .details-btn {
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: #fff;
        border: none;
    }

    .details-btn:hover {
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

    .extra-section {
        margin-top: 30px;
        background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02));
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        padding: 28px;
        box-shadow: 0 18px 40px rgba(0,0,0,0.18);
    }

    .extra-section h3 {
        font-size: 24px;
        color: #fff;
        margin-bottom: 12px;
    }

    .extra-section p,
    .extra-section li {
        color: #c7d2e3;
        line-height: 1.8;
    }

    .extra-section ul {
        padding-left: 20px;
        margin-top: 12px;
    }

    @media (max-width: 992px) {
        .details-wrapper {
            grid-template-columns: 1fr;
        }

        .product-title {
            font-size: 32px;
        }

        .product-main-image {
            height: 420px;
        }
    }

    @media (max-width: 768px) {
        .product-details-page {
            padding: 50px 0 65px;
        }

        .product-title {
            font-size: 28px;
        }

        .product-price {
            font-size: 26px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .product-main-image {
            height: 320px;
        }

        .details-info-card,
        .details-image-card,
        .extra-section {
            padding: 20px;
        }
    }
</style>

<section class="product-details-page">
    <div class="container">

        <div class="product-breadcrumb">
            <a href="<?php echo URLROOT; ?>">Home</a> /
            <a href="<?php echo URLROOT; ?>/products">Products</a> /
            <span><?php echo htmlspecialchars($product->name); ?></span>
        </div>

        <div class="details-wrapper">
            <div class="details-image-card">
                <div class="product-main-image">
                    <span class="floating-badge category-badge">
                        <?php echo !empty($product->category) ? htmlspecialchars($product->category) : 'General'; ?>
                    </span>

                    <?php if ($isOutOfStock) : ?>
                        <span class="floating-badge stock-badge stock-out">Out of Stock</span>
                    <?php elseif ($isLowStock) : ?>
                        <span class="floating-badge stock-badge stock-low">Low Stock</span>
                    <?php else : ?>
                        <span class="floating-badge stock-badge stock-in">In Stock</span>
                    <?php endif; ?>

                    <img
                        src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($product->image); ?>"
                        alt="<?php echo htmlspecialchars($product->name); ?>"
                    >
                </div>
            </div>

            <div class="details-info-card">
                <span class="details-top-badge">Premium Product Details</span>

                <h1 class="product-title"><?php echo htmlspecialchars($product->name); ?></h1>

                <div class="product-price">Rs. <?php echo number_format($product->price, 2); ?></div>

                <p class="product-description">
                    <?php echo nl2br(htmlspecialchars($product->description)); ?>
                </p>

                <div class="info-grid">
                    <div class="info-box">
                        <h4>Category</h4>
                        <p><?php echo !empty($product->category) ? htmlspecialchars($product->category) : 'General'; ?></p>
                    </div>

                    <div class="info-box">
                        <h4>Available Stock</h4>
                        <p><?php echo (int)$product->stock; ?> item(s)</p>
                    </div>
                </div>

                <?php if ($isOutOfStock) : ?>
                    <div class="stock-note note-out">
                        This product is currently out of stock. WhatsApp contact is disabled until stock is available.
                    </div>
                <?php elseif ($isLowStock) : ?>
                    <div class="stock-note note-low">
                        Only a few items are left in stock. Contact quickly if you want to reserve this product.
                    </div>
                <?php else : ?>
                    <div class="stock-note note-in">
                        This product is available now. You can contact NextGen Mobile Care for more details or ordering support.
                    </div>
                <?php endif; ?>

                <div class="details-actions">
                    <a href="<?php echo URLROOT; ?>/products" class="secondary-btn">Back to Products</a>

                    <?php if (!$isOutOfStock) : ?>
                        <a href="<?php echo $whatsappLink; ?>" target="_blank" class="details-btn">WhatsApp Now</a>
                        <a href="<?php echo URLROOT; ?>/orderrequests/create/<?php echo $product->id; ?>" class="secondary-btn">Request Order</a>
                    <?php else : ?>
                        <span class="disabled-btn">WhatsApp Disabled</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="extra-section">
            <h3>Why buy from NextGen Mobile Care?</h3>
            <p>
                We focus on premium device care, quality products, and a cleaner customer experience.
                Our platform is built for repairs, product browsing, stock-aware ordering, and direct customer communication.
            </p>

            <ul>
                <li>Modern product browsing experience</li>
                <li>Clear stock visibility before ordering</li>
                <li>Direct support through contact and WhatsApp</li>
                <li>Trusted mobile care focused service</li>
            </ul>
        </div>

    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>