<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .order-page {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
    }

    .order-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 30px;
    }

    .order-card h1 {
        margin-bottom: 10px;
    }

    .order-card p {
        color: #bdbdcc;
        margin-bottom: 25px;
    }

    .product-summary {
        background: #101017;
        border: 1px solid #2a2a3a;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #33334a;
        background: #0f0f15;
        color: #fff;
    }

    textarea.form-control {
        min-height: 120px;
    }

    .btn-submit {
        padding: 12px 20px;
        border-radius: 10px;
        border: none;
        background: #fff;
        color: #111;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<div class="order-page">
    <div class="order-card">
        <h1>Request Order</h1>
        <p>Submit your order request and we will contact you soon.</p>

        <div class="product-summary">
            <strong>Product:</strong> <?php echo htmlspecialchars($product->name); ?><br>
            <strong>Price:</strong> LKR <?php echo number_format($product->price, 2); ?><br>
            <strong>Stock:</strong> <?php echo (int)$product->stock; ?>
        </div>

        <form action="<?php echo URLROOT; ?>/orderrequests/store" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product->name); ?>">

            <div class="form-group">
                <label>Your Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" min="1" max="<?php echo (int)$product->stock; ?>" value="1" required>
            </div>

            <button type="submit" class="btn-submit">Submit Order Request</button>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>