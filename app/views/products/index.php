<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .products-page {
        padding: 60px 20px;
        max-width: 1200px;
        margin: auto;
    }

    .products-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .products-title h1 {
        font-size: 2.2rem;
        margin-bottom: 10px;
    }

    .products-title p {
        color: #bbb;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .product-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 16px;
        padding: 20px;
        transition: 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .product-card h3 {
        margin-bottom: 10px;
    }

    .product-card p {
        color: #ccc;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .price {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .btn-buy {
        display: inline-block;
        background: #fff;
        color: #111;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-buy:hover {
        background: #ddd;
    }
</style>

<div class="products-page">

    <div class="products-title">
        <h1>Our Products</h1>
        <p>Explore our available mobile devices and accessories</p>
    </div>

    <div class="products-grid">

        <?php if (!empty($data['products'])) : ?>
            <?php foreach ($data['products'] as $product) : ?>
                <div class="product-card">
                    <img src="<?php echo URLROOT; ?>/uploads/<?php echo $product->image; ?>" alt="Product">

                    <h3><?php echo htmlspecialchars($product->name); ?></h3>

                    <p><?php echo htmlspecialchars($product->description); ?></p>

                    <div class="price">LKR <?php echo number_format($product->price, 2); ?></div>

                    <a href="<?php echo URLROOT; ?>/products/show/<?php echo $product->id; ?>" class="btn-buy">View</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No products available.</p>
        <?php endif; ?>

    </div>

</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>