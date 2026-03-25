<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .admin-products-page {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
    }

    .admin-products-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .admin-products-top h1 {
        margin: 0;
    }

    .btn-add {
        display: inline-block;
        padding: 12px 18px;
        border-radius: 10px;
        background: #fff;
        color: #111;
        font-weight: 700;
        text-decoration: none;
    }

    .table-wrap {
        overflow-x: auto;
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 16px;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: #fff;
    }

    table th, table td {
        padding: 12px;
        border-bottom: 1px solid #2a2a3a;
        text-align: left;
        vertical-align: middle;
    }

    .product-thumb {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #2f2f40;
    }

    .action-links {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-edit {
        background: #fff;
        color: #111;
    }

    .btn-delete {
        background: #7a1f1f;
        color: #fff;
    }
</style>

<div class="admin-products-page">
    <div class="admin-products-top">
        <h1>Manage Products</h1>
        <a href="<?php echo URLROOT; ?>/admin/addProduct" class="btn-add">Add Product</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['products'])) : ?>
                    <?php foreach ($data['products'] as $product) : ?>
                        <tr>
                            <td><?php echo $product->id; ?></td>
                            <td>
                                <?php if (!empty($product->image)) : ?>
                                    <img src="<?php echo URLROOT; ?>/uploads/<?php echo $product->image; ?>" alt="Product" class="product-thumb">
                                <?php else : ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($product->name); ?></td>
                            <td>LKR <?php echo number_format($product->price, 2); ?></td>
                            <td><?php echo htmlspecialchars($product->description); ?></td>
                            <td>
                                <div class="action-links">
                                    <a href="<?php echo URLROOT; ?>/admin/editProduct/<?php echo $product->id; ?>" class="btn-action btn-edit">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/admin/deleteProduct/<?php echo $product->id; ?>" class="btn-action btn-delete" onclick="return confirm('Delete this product?');">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>