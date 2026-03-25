<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .product-page {
        max-width: 1000px;
        margin: 60px auto;
        padding: 20px;
    }

    .product-card {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 20px;
        padding: 30px;
    }

    .product-card img {
        width: 100%;
        border-radius: 16px;
    }

    .product-info h1 {
        margin-bottom: 15px;
    }

    .product-info p {
        color: #c7c7d4;
        margin-bottom: 15px;
    }

    .price {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .meta {
        color: #bdbdcc;
        margin-bottom: 20px;
        line-height: 1.7;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-book,
    .btn-whatsapp {
        display: inline-block;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: bold;
        text-decoration: none;
    }

    .btn-book {
        background: #fff;
        color: #111;
    }

    .btn-whatsapp {
        background: #25D366;
        color: #111;
    }

    .disabled-btn {
    background: #555 !important;
    color: #ddd !important;
    cursor: not-allowed;
}

.out-of-stock-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 999px;
    background: #7a1f1f;
    color: #fff;
    font-size: 0.8rem;
    font-weight: 700;
}

    @media (max-width: 768px) {
        .product-card {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php
$whatsappNumber = '94771234567';
$whatsappMessage = urlencode(
    "Hello, I'm interested in this product:\n\n" .
    "Product: " . $data['product']->name . "\n" .
    "Price: LKR " . number_format($data['product']->price, 2) . "\n" .
    "Category: " . $data['product']->category . "\n"
);
?>

<div class="product-page">
    <div class="product-card">
        <div>
            <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['product']->image; ?>" alt="Product">
        </div>

        <div class="product-info">
            <h1><?php echo htmlspecialchars($data['product']->name); ?></h1>

            <div class="price">
                LKR <?php echo number_format($data['product']->price, 2); ?>
            </div>

            <div class="meta">
    Category: <?php echo htmlspecialchars($data['product']->category); ?><br>
    Stock Available:
    <?php if ((int)$data['product']->stock > 0) : ?>
        <?php echo (int)$data['product']->stock; ?>
    <?php else : ?>
        <span class="out-of-stock-badge">Out of Stock</span>
    <?php endif; ?>
</div>

            <p><?php echo htmlspecialchars($data['product']->description); ?></p>

            <div class="action-buttons">
    <a href="<?php echo URLROOT; ?>/booking" class="btn-book">Book Repair</a>

    <?php if ((int)$data['product']->stock > 0) : ?>
        <a href="<?php echo URLROOT; ?>/orderrequests/create/<?php echo $data['product']->id; ?>" class="btn-book">Request Order</a>
        <a href="https://wa.me/<?php echo $whatsappNumber; ?>?text=<?php echo $whatsappMessage; ?>" target="_blank" class="btn-whatsapp">Chat on WhatsApp</a>
    <?php else : ?>
        <span class="btn-whatsapp disabled-btn">Out of Stock</span>
    <?php endif; ?>
</div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>