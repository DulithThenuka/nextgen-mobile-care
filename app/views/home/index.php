<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .home-page {
        background: #0b0b0f;
        color: #ffffff;
        min-height: 100vh;
    }

    .hero {
        padding: 100px 20px 80px;
        text-align: center;
        background: linear-gradient(135deg, #0b0b0f, #16161d, #1f1f2b);
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .hero p {
        max-width: 700px;
        margin: 0 auto 30px;
        color: #cfcfd6;
        font-size: 1.1rem;
        line-height: 1.7;
    }

    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-premium,
    .btn-outline-light {
        padding: 14px 28px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s ease;
        display: inline-block;
    }

    .btn-premium {
        background: #ffffff;
        color: #111;
    }

    .btn-premium:hover {
        background: #dcdcdc;
        transform: translateY(-2px);
    }

    .btn-outline-light {
        border: 1px solid #666;
        color: #fff;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #111;
    }

    .section {
        padding: 70px 20px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .section-title p {
        color: #bbbbc7;
        max-width: 700px;
        margin: auto;
    }

    .services-grid,
    .features-grid,
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: auto;
    }

    .card-box {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        transition: 0.3s ease;
    }

    .card-box:hover {
        transform: translateY(-5px);
        border-color: #3c3c52;
    }

    .card-box h3 {
        margin-bottom: 15px;
        font-size: 1.25rem;
    }

    .card-box p {
        color: #c7c7d4;
        line-height: 1.6;
    }

    .product-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 14px;
        margin-bottom: 15px;
    }

    .product-card h4 {
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .product-card p {
        color: #c7c7d4;
        margin-bottom: 10px;
    }

    .product-price {
        font-weight: bold;
        font-size: 1.1rem;
        color: #ffffff;
    }

    .cta-box {
        max-width: 1000px;
        margin: auto;
        background: linear-gradient(135deg, #1b1b25, #2a2a3c);
        padding: 50px 30px;
        text-align: center;
        border-radius: 24px;
        border: 1px solid #33334a;
    }

    .cta-box h2 {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .cta-box p {
        color: #d0d0da;
        margin-bottom: 25px;
        line-height: 1.7;
    }

    .mini-contact {
        text-align: center;
        color: #c7c7d4;
    }

    .mini-contact p {
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.2rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .section {
            padding: 55px 15px;
        }
    }
</style>

<div class="home-page">

    <section class="hero">
        <div class="container">
            <h1>Premium Mobile Repair & Care</h1>
            <p>
                NextGen Mobile Care offers trusted phone repairs, device support, and quality mobile products
                with a modern service experience built for speed, care, and reliability.
            </p>

            <div class="hero-buttons">
                <a href="<?php echo URLROOT; ?>/booking/create" class="btn-premium">Book a Repair</a>
                <a href="<?php echo URLROOT; ?>/products" class="btn-outline-light">Browse Products</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-title">
            <h2>Our Services</h2>
            <p>We provide professional mobile care services with quality parts and trusted support.</p>
        </div>

        <div class="services-grid">
            <div class="card-box">
                <h3>Screen Replacement</h3>
                <p>Fast and careful screen replacement service for damaged or cracked displays.</p>
            </div>

            <div class="card-box">
                <h3>Battery Replacement</h3>
                <p>Replace weak or damaged batteries to restore performance and longer device usage.</p>
            </div>

            <div class="card-box">
                <h3>Software Troubleshooting</h3>
                <p>Fix software issues, performance problems, app errors, and operating system glitches.</p>
            </div>

            <div class="card-box">
                <h3>General Device Check</h3>
                <p>Complete inspection and support for charging, speaker, camera, and other mobile issues.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-title">
            <h2>Featured Products</h2>
            <p>Explore selected products and accessories from our store.</p>
        </div>

        <div class="products-grid">
            <?php if (!empty($data['products'])) : ?>
                <?php foreach (array_slice($data['products'], 0, 4) as $product) : ?>
                    <div class="card-box product-card">
                        <img src="<?php echo !empty($product->image) ? URLROOT . '/uploads/' . $product->image : 'https://via.placeholder.com/400x300?text=Product'; ?>" alt="Product Image">
                        <h4><?php echo htmlspecialchars($product->name); ?></h4>
                        <p><?php echo htmlspecialchars($product->description); ?></p>
                        <div class="product-price">LKR <?php echo number_format($product->price, 2); ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="card-box">
                    <h3>Products Coming Soon</h3>
                    <p>Your featured products will appear here once they are added from the admin panel.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section">
        <div class="section-title">
            <h2>Why Choose NextGen Mobile Care</h2>
            <p>We focus on quality service, trust, and a premium customer experience.</p>
        </div>

        <div class="features-grid">
            <div class="card-box">
                <h3>Trusted Service</h3>
                <p>We handle customer devices with care and attention to detail.</p>
            </div>

            <div class="card-box">
                <h3>Fast Turnaround</h3>
                <p>We aim to complete repair requests quickly and efficiently.</p>
            </div>

            <div class="card-box">
                <h3>Quality Products</h3>
                <p>We provide mobile devices and accessories with a focus on reliability.</p>
            </div>

            <div class="card-box">
                <h3>Easy Booking</h3>
                <p>Our booking system makes it simple for customers to request service online.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="cta-box">
            <h2>Need a Repair or Want to Upgrade Your Device?</h2>
            <p>
                Book your service today or explore our latest products. We are here to help keep your devices performing at their best.
            </p>
            <a href="<?php echo URLROOT; ?>/booking/create" class="btn-premium">Get Started</a>
        </div>
    </section>

    <section class="section">
        <div class="section-title">
            <h2>Contact Us</h2>
            <p>Have questions? Reach out and our team will assist you.</p>
        </div>

        <div class="mini-contact">
            <p>Email: support@nextgenmobilecare.com</p>
            <p>Phone: +94 77 123 4567</p>
            <p><a href="<?php echo URLROOT; ?>/contact" class="btn-outline-light">Go to Contact Page</a></p>
        </div>
    </section>

</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>