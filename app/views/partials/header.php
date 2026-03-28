<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Mobile Care</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #0b0f19;
            color: #ffffff;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* HEADER UPGRADE */

.site-header {
    background: rgba(10, 14, 24, 0.85);
    border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    position: sticky;
    top: 0;
    z-index: 1000;
    backdrop-filter: blur(14px);
}

.navbar {
    min-height: 78px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

/* LOGO */
.logo {
    font-size: 24px;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.logo span {
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* NAV LINKS */
.nav-links {
    display: flex;
    align-items: center;
    gap: 22px;
    flex-wrap: wrap;
}

.nav-links a {
    position: relative;
    color: #cfd8e6;
    font-size: 15px;
    font-weight: 500;
    padding: 6px 4px;
    transition: 0.3s ease;
}

/* underline animation */
.nav-links a::after {
    content: "";
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0%;
    height: 2px;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    transition: 0.3s ease;
}

.nav-links a:hover {
    color: #ffffff;
}

.nav-links a:hover::after {
    width: 100%;
}

/* CTA BUTTON */
.nav-btn {
    padding: 11px 20px;
    border-radius: 12px;
    font-weight: 700;
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    color: #fff !important;
    box-shadow: 0 10px 25px rgba(59,130,246,0.25);
    transition: 0.3s ease;
}

.nav-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(59,130,246,0.35);
}
        .hero {
            padding: 90px 0 70px;
            background:
                radial-gradient(circle at top left, rgba(59,130,246,0.25), transparent 30%),
                radial-gradient(circle at bottom right, rgba(6,182,212,0.20), transparent 30%),
                linear-gradient(180deg, #0b0f19 0%, #111827 100%);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 40px;
            align-items: center;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 14px;
            background: rgba(77, 163, 255, 0.12);
            border: 1px solid rgba(77, 163, 255, 0.35);
            color: #8ec5ff;
            border-radius: 999px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 18px;
        }

        .hero p {
            color: #c7d2e3;
            font-size: 18px;
            max-width: 600px;
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 14px 24px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            color: #fff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(59, 130, 246, 0.25);
        }

        .btn-secondary {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
        }

        .btn-secondary:hover {
            border-color: #4da3ff;
            color: #4da3ff;
        }

        .hero-stats {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-stat {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 14px;
            padding: 16px 18px;
            min-width: 130px;
        }

        .hero-stat h3 {
            font-size: 24px;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .hero-stat p {
            font-size: 13px;
            color: #b8c4d8;
            margin: 0;
        }

        .hero-card {
            background: linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.03));
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
        }

        .device-box {
            background: linear-gradient(135deg, #111827, #1f2937);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 22px;
            padding: 30px 25px;
            text-align: center;
        }

        .device-box h3 {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .device-box p {
            color: #c7d2e3;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .mini-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .mini-feature {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 14px;
            padding: 14px;
            color: #d8e1f0;
            font-size: 14px;
            text-align: left;
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .section-title p {
            color: #b8c4d8;
            max-width: 700px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .feature-card {
            background: #111827;
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 18px;
            padding: 28px 22px;
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            border-color: rgba(77,163,255,0.35);
            box-shadow: 0 15px 30px rgba(0,0,0,0.25);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            background: linear-gradient(135deg, rgba(59,130,246,0.18), rgba(6,182,212,0.18));
            font-size: 22px;
        }

        .feature-card h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .feature-card p {
            color: #b8c4d8;
            font-size: 15px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .service-card {
            background: #0f172a;
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 18px;
            padding: 26px;
        }

        .service-card h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .service-card p {
            color: #b8c4d8;
            margin-bottom: 18px;
        }

        .service-card ul {
            padding-left: 18px;
            color: #d8e1f0;
        }

        .service-card ul li {
            margin-bottom: 8px;
        }

        .cta-section {
            padding: 80px 0;
        }

        .cta-box {
            background: linear-gradient(135deg, #111827, #0f172a, #0b1320);
            border: 1px solid rgba(77,163,255,0.18);
            border-radius: 24px;
            padding: 45px 35px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.30);
        }

        .cta-box h2 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .cta-box p {
            max-width: 680px;
            margin: 0 auto 24px;
            color: #c7d2e3;
        }

        .site-footer {
            background: #070b13;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 26px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .footer-content p,
        .footer-content a {
            color: #9fb0c7;
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        @media (max-width: 992px) {
            .hero-grid,
            .features-grid,
            .services-grid {
                grid-template-columns: 1fr 1fr;
            }

            .hero h1 {
                font-size: 42px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                justify-content: center;
                padding: 15px 0;
            }

            .nav-links {
                justify-content: center;
            }

            .hero-grid,
            .features-grid,
            .services-grid,
            .mini-features {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 70px 0 50px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .section-title h2,
            .cta-box h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<header class="site-header">
    <div class="container navbar">
        <a href="<?php echo URLROOT; ?>" class="logo">NextGen <span>Mobile Care</span></a>

        <nav class="nav-links">
            <a href="<?php echo URLROOT; ?>">Home</a>
            <a href="<?php echo URLROOT; ?>/products">Products</a>
            <a href="<?php echo URLROOT; ?>/bookings/create">Book Repair</a>
            <a href="<?php echo URLROOT; ?>/contact">Contact</a>
            <a href="<?php echo URLROOT; ?>/products" class="nav-btn">Shop Now</a>
        </nav>
    </div>
</header>