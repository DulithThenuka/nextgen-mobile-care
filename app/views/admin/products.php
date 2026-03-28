<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<style>
.admin-products-page {
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.12), transparent 25%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.10), transparent 25%),
        #0b0f19;
}

/* Topbar */
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
}

/* Add button */
.add-btn {
    display: inline-block;
    padding: 13px 20px;
    border-radius: 12px;
    font-weight: 700;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    color: #fff;
    box-shadow: 0 10px 25px rgba(59,130,246,0.25);
    transition: 0.3s ease;
}

.add-btn:hover {
    transform: translateY(-2px);
}

/* Card */
.products-card {
    background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 16px 36px rgba(0,0,0,0.22);
}

/* Table */
.table-wrap { overflow-x: auto; }

.products-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 980px;
}

.products-table th,
.products-table td {
    padding: 18px 16px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
}

.products-table th {
    color: #dbe7f5;
    font-size: 14px;
    font-weight: 700;
}

.products-table td {
    color: #c7d2e3;
}

.products-table tbody tr:hover {
    background: rgba(255,255,255,0.03);
}

/* Product cell */
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
}

.product-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-name { font-weight: 700; color: #fff; }
.product-desc { color: #9fb0c7; font-size: 13px; }

/* Badges */
.badge {
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.badge-category {
    background: rgba(59,130,246,0.12);
    color: #93c5fd;
}

.badge-stock-in { color:#86efac; }
.badge-stock-low { color:#fcd34d; }
.badge-stock-out { color:#fca5a5; }

/* Actions */
.action-group {
    display: flex;
    gap: 10px;
}

.action-btn {
    padding: 8px 12px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 700;
}

.edit-btn { color:#93c5fd; }
.delete-btn { color:#fca5a5; }

/* Empty */
.empty-state {
    padding: 40px;
    text-align: center;
    color: #9fb0c7;
}
</style>

<div class="admin-products-page">
<div class="container">

<div class="admin-topbar">
    <div>
        <h1>Manage Products</h1>
        <p>View, add, edit, and manage all products.</p>
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
$stock = (int)($product->stock ?? 0);

if ($stock <= 0) {
    $stockClass = 'badge-stock-out';
    $stockLabel = 'Out of stock';
} elseif ($stock <= 5) {
    $stockClass = 'badge-stock-low';
    $stockLabel = 'Low (' . $stock . ')';
} else {
    $stockClass = 'badge-stock-in';
    $stockLabel = $stock;
}

$imagePath = !empty($product->image)
    ? URLROOT . '/uploads/' . htmlspecialchars($product->image)
    : URLROOT . '/uploads/default.png';
?>

<tr>

<td>
<div class="product-cell">

<div class="product-thumb">
<img src="<?php echo $imagePath; ?>">
</div>

<div>
<div class="product-name"><?php echo htmlspecialchars($product->name); ?></div>
<div class="product-desc"><?php echo substr(htmlspecialchars($product->description),0,80); ?></div>
</div>

</div>
</td>

<td>
<span class="badge badge-category">
<?php echo htmlspecialchars($product->category ?? 'General'); ?>
</span>
</td>

<td>
<span class="price-text">
LKR <?php echo number_format($product->price, 2); ?>
</span>
</td>

<td>
<span class="badge <?php echo $stockClass; ?>">
<?php echo $stockLabel; ?>
</span>
</td>

<td>
<div class="action-group">
<a href="<?php echo URLROOT; ?>/admin/edit_product/<?php echo $product->id; ?>" class="action-btn edit-btn">Edit</a>
<a href="<?php echo URLROOT; ?>/admin/delete_product/<?php echo $product->id; ?>" class="action-btn delete-btn"
onclick="return confirm('Delete this product?')">Delete</a>
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
<p>Add your first product to start.</p>
</div>

<?php endif; ?>

</div>

</div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>