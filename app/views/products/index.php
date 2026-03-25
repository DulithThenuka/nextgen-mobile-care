<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .products-page {
        padding: 60px 20px;
        max-width: 1200px;
        margin: auto;
    }

    .products-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .products-title h1 {
        font-size: 2.2rem;
        margin-bottom: 10px;
    }

    .products-title p {
        color: #bbb;
    }

    .filter-bar {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .filter-form {
        display: grid;
        grid-template-columns: 1fr 220px 220px 140px;
        gap: 15px;
    }

    .filter-input,
    .filter-select {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #33334a;
        background: #0f0f15;
        color: #fff;
        outline: none;
    }

    .filter-btn {
        border: none;
        border-radius: 10px;
        background: #fff;
        color: #111;
        font-weight: 700;
        cursor: pointer;
        padding: 12px 16px;
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
        margin-bottom: 8px;
    }

    .meta {
        font-size: 0.9rem;
        color: #bdbdcc;
        margin-bottom: 12px;
    }

    .btn-buy {
        display: inline-block;
        background: #fff;
        color: #111;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 600;
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
        .filter-form {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="products-page">
    <div class="products-title">
        <h1>Our Products</h1>
        <p>Explore our available mobile devices and accessories</p>
    </div>

    <div class="filter-bar">
        <form action="<?php echo URLROOT; ?>/products" method="GET" class="filter-form">
            <input
                type="text"
                name="search"
                class="filter-input"
                placeholder="Search by product name..."
                value="<?php echo htmlspecialchars($data['search'] ?? ''); ?>"
            >

            <select name="category" class="filter-select">
                <option value="">All Categories</option>
                <option value="Phones" <?php echo (($data['category'] ?? '') === 'Phones') ? 'selected' : ''; ?>>Phones</option>
                <option value="Accessories" <?php echo (($data['category'] ?? '') === 'Accessories') ? 'selected' : ''; ?>>Accessories</option>
                <option value="Tablets" <?php echo (($data['category'] ?? '') === 'Tablets') ? 'selected' : ''; ?>>Tablets</option>
                <option value="Smart Watches" <?php echo (($data['category'] ?? '') === 'Smart Watches') ? 'selected' : ''; ?>>Smart Watches</option>
            </select>

            <select name="sort" class="filter-select">
                <option value="">Sort By</option>
                <option value="price_asc" <?php echo (($data['sort'] ?? '') === 'price_asc') ? 'selected' : ''; ?>>Price: Low to High</option>
                <option value="price_desc" <?php echo (($data['sort'] ?? '') === 'price_desc') ? 'selected' : ''; ?>>Price: High to Low</option>
            </select>

            <button type="submit" class="filter-btn">Apply</button>
        </form>
    </div>

    <div class="products-grid">
        <?php if (!empty($data['products'])) : ?>
            <?php foreach ($data['products'] as $product) : ?>
    <div class="product-card">
        <img src="<?php echo !empty($product->image) ? URLROOT . '/uploads/' . $product->image : 'https://via.placeholder.com/300'; ?>" alt="Product">

        <h3><?php echo htmlspecialchars($product->name); ?></h3>
        <p><?php echo htmlspecialchars($product->description); ?></p>

        <div class="price">LKR <?php echo number_format($product->price, 2); ?></div>

        <div class="meta">
            Category: <?php echo htmlspecialchars($product->category); ?><br>
            Stock:
            <?php if ((int)$product->stock > 0) : ?>
                <?php echo (int)$product->stock; ?>
            <?php else : ?>
                <span class="out-of-stock-badge">Out of Stock</span>
            <?php endif; ?>
        </div>

        <a href="<?php echo URLROOT; ?>/products/show/<?php echo $product->id; ?>" class="btn-buy">View</a>
    </div>
<?php endforeach; ?>
        <?php else : ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>