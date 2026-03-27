<?php require APPROOT . '/views/partials/header.php'; ?>

<?php
$products = isset($data['products']) ? $data['products'] : [];

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';

$categories = [];
foreach ($products as $product) {
    if (!empty($product->category) && !in_array($product->category, $categories)) {
        $categories[] = $product->category;
    }
}
sort($categories);

$filteredProducts = $products;

if ($search !== '') {
    $filteredProducts = array_filter($filteredProducts, function($product) use ($search) {
        return stripos($product->name, $search) !== false;
    });
}

if ($category !== '') {
    $filteredProducts = array_filter($filteredProducts, function($product) use ($category) {
        return isset($product->category) && $product->category === $category;
    });
}

if ($sort === 'price_asc') {
    usort($filteredProducts, function($a, $b) {
        return $a->price <=> $b->price;
    });
} elseif ($sort === 'price_desc') {
    usort($filteredProducts, function($a, $b) {
        return $b->price <=> $a->price;
    });
} elseif ($sort === 'name_asc') {
    usort($filteredProducts, function($a, $b) {
        return strcmp($a->name, $b->name);
    });
}
?>

<style>
    .products-page {
        padding: 70px 0 80px;
        background:
            radial-gradient(circle at top left, rgba(59,130,246,0.16), transparent 25%),
            radial-gradient(circle at bottom right, rgba(6,182,212,0.12), transparent 25%),
            linear-gradient(180deg, #0b0f19 0%, #101827 100%);
        min-height: 100vh;
    }

    .products-hero {
        margin-bottom: 35px;
    }

    .products-badge {
        display: inline-block;
        padding: 8px 14px;
        background: rgba(77, 163, 255, 0.12);
        border: 1px solid rgba(77, 163, 255, 0.30);
        color: #8ec5ff;
        border-radius: 999px;
        font-size: 13px;
        margin-bottom: 16px;
    }

    .products-hero h1 {
        font-size: 42px;
        margin-bottom: 12px;
        color: #fff;
    }

    .products-hero p {
        color: #b8c4d8;
        font-size: 17px;
        max-width: 760px;
    }

    .products-toolbar {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 22px;
        margin-bottom: 30px;
        box-shadow: 0 16px 40px rgba(0,0,0,0.22);
    }

    .toolbar-form {
        display: grid;
        grid-template-columns: 1.4fr 1fr 1fr auto;
        gap: 14px;
        align-items: end;
    }

    .toolbar-group label {
        display: block;
        margin-bottom: 8px;
        color: #dbe7f5;
        font-size: 14px;
        font-weight: 600;
    }

    .toolbar-group input,
    .toolbar-group select {
        width: 100%;
        padding: 13px 14px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.10);
        background: #0f172a;
        color: #fff;
        outline: none;
    }

    .toolbar-group input::placeholder {
        color: #90a0b8;
    }

    .toolbar-group input:focus,
    .toolbar-group select:focus {
        border-color: #4da3ff;
        box-shadow: 0 0 0 3px rgba(77,163,255,0.12);
    }

    .toolbar-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .filter-btn,
    .clear-btn,
    .details-btn {
        display: inline-block;
        text-decoration: none;
        border-radius: 12px;
        padding: 13px 18px;
        font-weight: 700;
        transition: 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .filter-btn {
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: #fff;
    }

    .filter-btn:hover,
    .details-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px rgba(59,130,246,0.22);
    }

    .clear-btn {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.12);
        color: #fff;
    }

    .clear-btn:hover {
        border-color: #4da3ff;
        color: #4da3ff;
    }

    .products-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .products-summary h3 {
        font-size: 20px;
        color: #fff;
        margin: 0;
    }

    .products-summary p {
        margin: 0;
        color: #9fb0c7;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .product-card {
        position: relative;
        background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(0,0,0,0.22);
        transition: 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        border-color: rgba(77,163,255,0.28);
        box-shadow: 0 24px 50px rgba(0,0,0,0.30);
    }

    .product-image-wrap {
        height: 240px;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 18px;
        position: relative;
    }

    .product-image-wrap img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .stock-badge,
    .category-badge {
        position: absolute;
        top: 16px;
        padding: 7px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .category-badge {
        left: 16px;
        background: rgba(15, 23, 42, 0.85);
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

    .product-content {
        padding: 22px;
    }

    .product-name {
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
    }

    .product-desc {
        color: #b8c4d8;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 18px;
        min-height: 72px;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        align-items: center;
        margin-bottom: 18px;
        flex-wrap: wrap;
    }

    .product-price {
        font-size: 24px;
        font-weight: 800;
        color: #7dd3fc;
    }

    .product-stock-text {
        color: #dbe7f5;
        font-size: 14px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        padding: 8px 12px;
        border-radius: 10px;
    }

    .product-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .details-btn {
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: #fff;
        text-align: center;
        flex: 1;
    }

    .out-stock-btn {
        display: inline-block;
        flex: 1;
        text-align: center;
        border-radius: 12px;
        padding: 13px 18px;
        font-weight: 700;
        background: rgba(239,68,68,0.12);
        color: #fca5a5;
        border: 1px solid rgba(239,68,68,0.18);
    }

    .empty-products {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 40px 25px;
        text-align: center;
        color: #b8c4d8;
    }

    @media (max-width: 992px) {
        .toolbar-form,
        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .products-hero h1 {
            font-size: 34px;
        }
    }

    @media (max-width: 768px) {
        .toolbar-form,
        .products-grid {
            grid-template-columns: 1fr;
        }

        .products-page {
            padding: 50px 0 65px;
        }

        .products-hero h1 {
            font-size: 28px;
        }

        .product-image-wrap {
            height: 220px;
        }
    }
</style>

<section class="products-page">
    <div class="container">
        <div class="products-hero">
            <span class="products-badge">Premium Accessories & Device Solutions</span>
            <h1>Explore Our Products</h1>
            <p>
                Browse premium mobile accessories, compare categories, and find the right products
                for your device with a cleaner and more modern shopping experience.
            </p>
        </div>

        <div class="products-toolbar">
            <form action="" method="GET" class="toolbar-form">
                <div class="toolbar-group">
                    <label for="search">Search</label>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Search by product name"
                        value="<?php echo htmlspecialchars($search); ?>"
                    >
                </div>

                <div class="toolbar-group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo ($category === $cat) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="toolbar-group">
                    <label for="sort">Sort</label>
                    <select name="sort" id="sort">
                        <option value="">Default</option>
                        <option value="price_asc" <?php echo ($sort === 'price_asc') ? 'selected' : ''; ?>>Price: Low to High</option>
                        <option value="price_desc" <?php echo ($sort === 'price_desc') ? 'selected' : ''; ?>>Price: High to Low</option>
                        <option value="name_asc" <?php echo ($sort === 'name_asc') ? 'selected' : ''; ?>>Name: A to Z</option>
                    </select>
                </div>

                <div class="toolbar-buttons">
                    <button type="submit" class="filter-btn">Apply</button>
                    <a href="<?php echo URLROOT; ?>/products" class="clear-btn">Reset</a>
                </div>
            </form>
        </div>

        <div class="products-summary">
            <div>
                <h3>Available Products</h3>
                <p><?php echo count($filteredProducts); ?> product(s) found</p>
            </div>
        </div>

        <?php if (!empty($filteredProducts)) : ?>
            <div class="products-grid">
                <?php foreach ($filteredProducts as $product) : ?>
                    <?php
                        $stockClass = 'stock-in';
                        $stockLabel = 'In Stock';

                        if ((int)$product->stock <= 0) {
                            $stockClass = 'stock-out';
                            $stockLabel = 'Out of Stock';
                        } elseif ((int)$product->stock <= 5) {
                            $stockClass = 'stock-low';
                            $stockLabel = 'Low Stock';
                        }

                        $description = !empty($product->description) ? $product->description : 'Premium product available at NextGen Mobile Care.';
                        if (strlen($description) > 110) {
                            $description = substr($description, 0, 110) . '...';
                        }
                    ?>

                    <div class="product-card">
                        <div class="product-image-wrap">
                            <span class="category-badge">
                                <?php echo !empty($product->category) ? htmlspecialchars($product->category) : 'General'; ?>
                            </span>

                            <span class="stock-badge <?php echo $stockClass; ?>">
                                <?php echo $stockLabel; ?>
                            </span>

                            <img
                                src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($product->image); ?>"
                                alt="<?php echo htmlspecialchars($product->name); ?>"
                            >
                        </div>

                        <div class="product-content">
                            <h3 class="product-name"><?php echo htmlspecialchars($product->name); ?></h3>

                            <p class="product-desc"><?php echo htmlspecialchars($description); ?></p>

                            <div class="product-meta">
                                <div class="product-price">Rs. <?php echo number_format($product->price, 2); ?></div>
                                <div class="product-stock-text">Stock: <?php echo (int)$product->stock; ?></div>
                            </div>

                            <div class="product-actions">
                                <?php if ((int)$product->stock > 0) : ?>
                                    <a href="<?php echo URLROOT; ?>/products/show/<?php echo $product->id; ?>" class="details-btn">View Details</a>
                                <?php else : ?>
                                    <span class="out-stock-btn">Currently Unavailable</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="empty-products">
                <h3 style="margin-bottom: 10px; color: #fff;">No products found</h3>
                <p>Try changing the search text, category, or sort option.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require APPROOT . '/views/partials/footer.php'; ?>