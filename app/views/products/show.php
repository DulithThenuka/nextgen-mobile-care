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
        margin-bottom: 20px;
    }

    .btn-book {
        display: inline-block;
        background: #fff;
        color: #111;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .product-card {
            grid-template-columns: 1fr;
        }
    }
</style>

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

            <p><?php echo htmlspecialchars($data['product']->description); ?></p>

            <a href="<?php echo URLROOT; ?>/booking" class="btn-book">Book Repair</a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>