<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .home-page {
        background:
            radial-gradient(circle at top left, rgba(59, 130, 246, 0.12), transparent 22%),
            radial-gradient(circle at bottom right, rgba(6, 182, 212, 0.10), transparent 22%),
            linear-gradient(180deg, #08090d 0%, #0c1017 100%);
        color: #ffffff;
        min-height: 100vh;
    }

    .home-container {
        width: min(1200px, 92%);
        margin: 0 auto;
    }

    .section {
        padding: 85px 0;
        position: relative;
    }

    .section.alt {
        background: rgba(255,255,255,0.015);
        border-top: 1px solid rgba(255,255,255,0.04);
        border-bottom: 1px solid rgba(255,255,255,0.04);
    }

    .section-title {
        text-align: center;
        margin-bottom: 48px;
    }

    .section-title h2 {
        font-size: 2.2rem;
        margin-bottom: 12px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .section-title p {
        color: #b8c1ce;
        max-width: 760px;
        margin: 0 auto;
        line-height: 1.75;
        font-size: 1rem;
    }

    .hero {
        padding: 95px 0 80px;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: 28px;
        align-items: center;
    }

    .hero-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 999px;
        border: 1px solid rgba(91, 160, 255, 0.30);
        background: rgba(59, 130, 246, 0.10);
        color: #9bc4ff;
        font-size: 0.84rem;
        margin-bottom: 18px;
    }

    .hero h1 {
        font-size: 3.5rem;
        line-height: 1.08;
        margin-bottom: 18px;
        font-weight: 800;
        letter-spacing: -1.3px;
        max-width: 720px;
    }

    .hero p {
        max-width: 650px;
        margin-bottom: 28px;
        color: #cfd5df;
        font-size: 1.05rem;
        line-height: 1.8;
    }

    .hero-buttons {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .btn-premium,
    .btn-outline-light {
        padding: 14px 28px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s ease;
        display: inline-block;
    }

    .btn-premium {
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        color: #fff;
        box-shadow: 0 14px 35px rgba(59, 130, 246, 0.22);
    }

    .btn-premium:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 42px rgba(59, 130, 246, 0.30);
    }

    .btn-outline-light {
        border: 1px solid rgba(255,255,255,0.14);
        color: #fff;
        background: rgba(255,255,255,0.03);
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #111;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        max-width: 720px;
    }

    .stat-box,
    .card-box,
    .contact-strip,
    .hero-panel,
    .cta-box {
        background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
        border: 1px solid rgba(255,255,255,0.08);
        box-shadow: 0 16px 36px rgba(0,0,0,0.22);
    }

    .stat-box {
        border-radius: 20px;
        padding: 20px;
    }

    .stat-box h3 {
        font-size: 1.45rem;
        margin-bottom: 6px;
    }

    .stat-box p {
        margin: 0;
        color: #b8c1ce;
        font-size: 0.94rem;
        line-height: 1.5;
    }

    .hero-panel {
        border-radius: 28px;
        padding: 24px;
    }

    .hero-panel-inner {
        border-radius: 22px;
        padding: 26px;
        min-height: 420px;
        background:
            linear-gradient(160deg, rgba(59,130,246,0.12), rgba(6,182,212,0.06)),
            linear-gradient(180deg, #121723, #0d1017);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .hero-panel-inner::after {
        content: "";
        position: absolute;
        right: -70px;
        top: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(59,130,246,0.10);
        filter: blur(8px);
    }

    .hero-panel-top,
    .hero-panel-bottom {
        position: relative;
        z-index: 1;
    }

    .hero-panel-top h3 {
        font-size: 1.65rem;
        margin-bottom: 10px;
    }

    .hero-panel-top p {
        color: #cfd5df;
        line-height: 1.75;
        margin: 0;
    }

    .mini-cards {
        display: grid;
        gap: 14px;
    }

    .mini-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        padding: 16px 18px;
        border-radius: 16px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.07);
    }

    .mini-card strong {
        display: block;
        font-size: 0.98rem;
        margin-bottom: 4px;
    }

    .mini-card span {
        color: #9db2cc;
        font-size: 0.9rem;
    }

    .services-grid,
    .features-grid,
    .products-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .card-box {
        border-radius: 22px;
        padding: 26px;
        transition: 0.3s ease;
        height: 100%;
    }

    .card-box:hover {
        transform: translateY(-7px);
        border-color: rgba(77,163,255,0.30);
        box-shadow: 0 22px 42px rgba(0,0,0,0.32);
    }

    .card-icon {
        width: 54px;
        height: 54px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        background: linear-gradient(135deg, rgba(59,130,246,0.18), rgba(6,182,212,0.14));
        border: 1px solid rgba(255,255,255,0.06);
        font-size: 1.2rem;
    }

    .card-box h3 {
        margin-bottom: 12px;
        font-size: 1.16rem;
    }

    .card-box p {
        color: #c7c7d4;
        line-height: 1.75;
        margin: 0;
    }

    .product-card {
        padding: 16px;
    }

    .product-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 18px;
        margin-bottom: 16px;
        border: 1px solid rgba(255,255,255,0.06);
    }

    .product-card h4 {
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .product-card p {
        color: #c7c7d4;
        margin-bottom: 12px;
        line-height: 1.65;
        min-height: 74px;
    }

    .product-price {
        font-weight: 800;
        font-size: 1.03rem;
        color: #ffffff;
    }

    .cta-box {
        max-width: 1100px;
        margin: auto;
        padding: 56px 34px;
        text-align: center;
        border-radius: 30px;
    }

    .cta-box h2 {
        font-size: 2.2rem;
        margin-bottom: 15px;
    }

    .cta-box p {
        color: #d0d0da;
        margin: 0 auto 28px;
        max-width: 760px;
        line-height: 1.8;
    }

    .contact-strip {
        max-width: 1000px;
        margin: 0 auto;
        border-radius: 26px;
        padding: 34px 28px;
        text-align: center;
    }

    .contact-strip h3 {
        font-size: 1.8rem;
        margin-bottom: 12px;
    }

    .contact-strip p {
        color: #c7c7d4;
        line-height: 1.75;
        margin-bottom: 12px;
    }

    .contact-details {
        margin: 20px 0 24px;
        color: #d7dce5;
    }

    .contact-details div {
        margin-bottom: 8px;
    }

    @media (max-width: 1100px) {
        .services-grid,
        .features-grid,
        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .hero h1 {
            font-size: 3rem;
        }
    }

    @media (max-width: 900px) {
        .hero-grid {
            grid-template-columns: 1fr;
        }

        .hero-panel-inner {
            min-height: auto;
        }

        .hero-stats {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .section {
            padding: 60px 0;
        }

        .hero {
            padding: 78px 0 60px;
        }

        .hero h1 {
            font-size: 2.35rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .section-title h2,
        .cta-box h2,
        .contact-strip h3 {
            font-size: 1.8rem;
        }

        .services-grid,
        .features-grid,
        .products-grid {
            grid-template-columns: 1fr;
        }

        .cta-box,
        .contact-strip {
            padding: 32px 20px;
        }
    }
</style>

<div class="home-page">

    <section class="hero">
        <div class="home-container">
            <div class="hero-grid">
                <div class="hero-left">
                    <span class="hero-badge">Premium Mobile Repair & Device Care</span>

                    <h1>Trusted Repairs, Quality Products, and a Better Customer Experience</h1>

                    <p>
                        NextGen Mobile Care offers reliable phone repairs, device support, and quality mobile products
                        through one modern platform built for speed, trust, and premium service.
                    </p>

                    <div class="hero-buttons">
                        <a href="<?php echo URLROOT; ?>/booking/create" class="btn-premium">Book a Repair</a>
                        <a href="<?php echo URLROOT; ?>/products" class="btn-outline-light">Browse Products</a>
                    </div>

                    <div class="hero-stats">
                        <div class="stat-box">
                            <h3>Fast</h3>
                            <p>Quick repair handling and smooth support from start to finish.</p>
                        </div>
                        <div class="stat-box">
                            <h3>Trusted</h3>
                            <p>Careful service with attention to quality, detail, and customer care.</p>
                        </div>
                        <div class="stat-box">
                            <h3>Premium</h3>
                            <p>Modern booking, clean product browsing, and a better overall experience.</p>
                        </div>
                    </div>
                </div>

                <div class="hero-right">
                    <div class="hero-panel">
                        <div class="hero-panel-inner">
                            <div class="hero-panel-top">
                                <h3>Why customers choose us</h3>
                                <p>
                                    We combine repair bookings, trusted mobile support, and quality accessories
                                    in one place so customers get a smoother and more professional experience.
                                </p>
                            </div>

                            <div class="hero-panel-bottom">
                                <div class="mini-cards">
                                    <div class="mini-card">
                                        <div>
                                            <strong>Repair Booking</strong>
                                            <span>Easy online scheduling</span>
                                        </div>
                                        <div>→</div>
                                    </div>

                                    <div class="mini-card">
                                        <div>
                                            <strong>Product Browsing</strong>
                                            <span>Clean and modern catalog view</span>
                                        </div>
                                        <div>→</div>
                                    </div>

                                    <div class="mini-card">
                                        <div>
                                            <strong>Customer Support</strong>
                                            <span>Simple contact and follow-up</span>
                                        </div>
                                        <div>→</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="home-container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>We provide professional mobile care services with trusted support and a consistent repair experience.</p>
            </div>

            <div class="services-grid">
                <div class="card-box">
                    <div class="card-icon">📱</div>
                    <h3>Screen Replacement</h3>
                    <p>Fast and careful screen replacement service for broken, damaged, or cracked displays.</p>
                </div>

                <div class="card-box">
                    <div class="card-icon">🔋</div>
                    <h3>Battery Replacement</h3>
                    <p>Replace weak or damaged batteries to improve performance and extend everyday usage.</p>
                </div>

                <div class="card-box">
                    <div class="card-icon">⚙️</div>
                    <h3>Software Troubleshooting</h3>
                    <p>Fix software issues, app errors, lagging performance, and operating system problems.</p>
                </div>

                <div class="card-box">
                    <div class="card-icon">🛠️</div>
                    <h3>General Device Check</h3>
                    <p>Complete inspection and support for charging, camera, speaker, and other mobile issues.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="home-container">
            <div class="section-title">
                <h2>Featured Products</h2>
                <p>Explore selected devices and accessories from our store in the same premium experience.</p>
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
                        <div class="card-icon">🛍️</div>
                        <h3>Products Coming Soon</h3>
                        <p>Your featured products will appear here once they are added from the admin panel.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section alt">
        <div class="home-container">
            <div class="section-title">
                <h2>Why Choose NextGen Mobile Care</h2>
                <p>We focus on quality service, strong reliability, and a better customer journey from start to finish.</p>
            </div>

            <div class="features-grid">
                <div class="card-box">
                    <div class="card-icon">✅</div>
                    <h3>Trusted Service</h3>
                    <p>We handle customer devices with care, responsibility, and attention to detail.</p>
                </div>

                <div class="card-box">
                    <div class="card-icon">⚡</div>
                    <h3>Fast Turnaround</h3>
                    <p>We aim to process repair requests quickly while maintaining good service quality.</p>
                </div>

                <div class="card-box">
                    <div class="card-icon">💎</div>
                    <h3>Quality Products</h3>
                    <p>We provide accessories and devices with a focus on reliability and customer value.</p>
                </div>

                <div class="card-box">
                    <div class="card-icon">🧾</div>
                    <h3>Easy Booking</h3>
                    <p>Our online booking flow makes it simple for customers to request service anytime.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="home-container">
            <div class="cta-box">
                <h2>Need a Repair or Want to Upgrade Your Device?</h2>
                <p>
                    Book your service today or explore our latest products. We are here to help keep your devices
                    performing at their best with a cleaner and more professional experience.
                </p>
                <a href="<?php echo URLROOT; ?>/booking/create" class="btn-premium">Get Started</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="home-container">
            <div class="contact-strip">
                <h3>Contact NextGen Mobile Care</h3>
                <p>Have questions about repairs, devices, or products? Reach out and our team will assist you.</p>

                <div class="contact-details">
                    <div>Email: support@nextgenmobilecare.com</div>
                    <div>Phone: +94 77 123 4567</div>
                </div>

                <a href="<?php echo URLROOT; ?>/contact" class="btn-outline-light">Go to Contact Page</a>
            </div>
        </div>
    </section>

</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>