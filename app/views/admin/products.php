<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
.admin-products-page {
    padding: 40px 0 60px;
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.12), transparent 25%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.10), transparent 25%),
        #0b0f19;
    min-height: 100vh;
}

.admin-topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 28px;
}

.admin-topbar h1 {
    font-size: 2rem;
    margin-bottom: 6px;
}

.admin-topbar p {
    color: #9fb0c7;
    margin: 0;
}

.add-btn {
    display: inline-block;
    padding: 13px 20px;
    border-radius: 12px;
    font-weight: 700;
    text-decoration: none;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    color: #fff;
    box-shadow: 0 10px 25px rgba(59,130,246,0.25);
    transition: 0.3s ease;
}

.add-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 32px rgba(59,130,246,0.35);
}

.products-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 16px 36px rgba(0,0,0,0.22);
}

.table-wrap {
    overflow-x: auto;
}

.products-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 980px;
}

.products-table thead {
    background: rgba(255,255,255,0.04);
}

.products-table th,
.products-table td {
    padding: 18px 16px;
    text-align: left;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    vertical-align: middle;
}

.products-table th {
    color: #dbe7f5;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.products-table td {
    color: #c7d2e3;
    font-size: 14px;
}

.products-table tbody tr {
    transition: 0.25s ease;
}

.products-table tbody tr:hover {
    background: rgba(255,255,255,0.03);
}

.product-cell {
    display: flex;
    align-items: center;
    gap: 14px;
}

.product-thumb {
    width: 64px;
    height: 64px;
    border-radius: 14px;
    overflow: hidden;
    background: #111827;
    border: 1px solid rgba(255,255,255,0.06);
    flex-shrink: 0;
}

.product-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-thumb.placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9fb0c7;
    font-size: 12px;
}

.product-name {
    color: #ffffff;
    font-weight: 700;
    margin-bottom: 4px;
}

.product-desc {
    color: #9fb0c7;
    font-size: 13px;
    line-height: 1.5;
    max-width: 280px;
}

.price-text {
    color: #7dd3fc;
    font-weight: 700;
}

.badge {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.badge-category {
    background: rgba(59,130,246,0.12);
    color: #93c5fd;
    border: 1px solid rgba(59,130,246,0.22);
}

.badge-stock-in {
    background: rgba(16,185,129,0.12);
    color: #86efac;
    border: 1px solid rgba(16,185,129,0.20);
}

.badge-stock-low {
    background: rgba(245,158,11,0.12);
    color: #fcd34d;
    border: 1px solid rgba(245,158,11,0.20);
}

.badge-stock-out {
    background: rgba(239,68,68,0.12);
    color: #fca5a5;
    border: 1px solid rgba(239,68,68,0.20);
}

.action-group {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.action-btn {
    display: inline-block;
    padding: 9px 14px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: 0.25s ease;
}

.edit-btn {
    background: rgba(59,130,246,0.12);
    color: #93c5fd;
    border: 1px solid rgba(59,130,246,0.20);
}

.edit-btn:hover {
    background: rgba(59,130,246,0.20);
}

.delete-btn {
    background: rgba(239,68,68,0.12);
    color: #fca5a5;
    border: 1px solid rgba(239,68,68,0.20);
}

.delete-btn:hover {
    background: rgba(239,68,68,0.18);
}

.empty-state {
    padding: 40px 24px;
    text-align: center;
    color: #9fb0c7;
}

.empty-state h3 {
    color: #fff;
    margin-bottom: 8px;
}

@media (max-width: 768px) {
    .admin-products-page {
        padding: 30px 0 50px;
    }

    .admin-topbar h1 {
        font-size: 1.7rem;
    }
}
</style>

<div class="admin-products-page">
    <div class="container">

        <div class="admin-topbar">
            <div>
                <h1>Manage Products</h1>
                <p>View, add, edit, and manage all products from one place.</p>
            </div>

            <a href="<?php echo URLROOT; ?>/admin/add_product" class="add-btn">+ Add Product</a>
        </div>

        <div class="products-card">
            <?php if (!empty($data['products'])) : ?>
                <div class="table-wrap">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['products'] as $product) : ?>
                                <?php
                                    $stock = isset($product->stock) ? (int)$product->stock : 0;
                                    $stockClass = 'badge-stock-in';
                                    $stockLabel = $stock . ' in stock';

                                    if ($stock <= 0) {
                                        $stockClass = 'badge-stock-out';
                                        $stockLabel = 'Out of stock';
                                    } elseif ($stock <= 5) {
                                        $stockClass = 'badge-stock-low';
                                        $stockLabel = 'Low stock (' . $stock . ')';
                                    }

                                    $description = !empty($product->description) ? $product->description : 'No description available.';
                                    if (strlen($description) > 90) {
                                        $description = substr($description, 0, 90) . '...';
                                    }
                                ?>
                                <tr>
                                    <td>
                                        <div class="product-cell">
                                            <?php if (!empty($product->image)) : ?>
                                                <div class="product-thumb">
                                                    <img src="<?php echo URLROOT; ?>/uploads/<?php echo htmlspecialchars($product->image); ?>" alt="<?php echo htmlspecialchars($product->name); ?>">
                                                </div>
                                            <?php else : ?>
                                                <div class="product-thumb placeholder">No Image</div>
                                            <?php endif; ?>

                                            <div>
                                                <div class="product-name"><?php echo htmlspecialchars($product->name); ?></div>
                                                <div class="product-desc"><?php echo htmlspecialchars($description); ?></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge badge-category">
                                            <?php echo !empty($product->category) ? htmlspecialchars($product->category) : 'General'; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="price-text">LKR <?php echo number_format($product->price, 2); ?></span>
                                    </td>

                                    <td>
                                        <span class="badge <?php echo $stockClass; ?>">
                                            <?php echo $stockLabel; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action-group">
                                            <a href="<?php echo URLROOT; ?>/admin/edit_product/<?php echo $product->id; ?>" class="action-btn edit-btn">Edit</a>
                                            <a href="<?php echo URLROOT; ?>/admin/delete_product/<?php echo $product->id; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <div class="empty-state">
                    <h3>No products found</h3>
                    <p>Add your first product to start managing inventory.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>