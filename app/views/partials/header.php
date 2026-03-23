
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0b0b0f;
            color: #fff;
        }

        a {
            text-decoration: none;
        }

        .site-navbar {
            width: 100%;
            background: rgba(11, 11, 15, 0.95);
            border-bottom: 1px solid #222230;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .nav-container {
            max-width: 1200px;
            margin: auto;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand a {
            font-size: 1.3rem;
            font-weight: bold;
            color: #fff;
            letter-spacing: 0.5px;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #d5d5df;
            font-size: 0.95rem;
            transition: 0.3s ease;
        }

        .nav-links a:hover {
            color: #fff;
        }

        .nav-btn {
            background: #fff;
            color: #111 !important;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
        }

        .nav-btn:hover {
            background: #dcdcdc;
        }

        .page-container {
            min-height: calc(100vh - 140px);
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 12px;
            }

            .nav-links {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<nav class="site-navbar">
    <div class="nav-container">
        <div class="brand">
            <a href="<?php echo URLROOT; ?>/home">NextGen Mobile Care</a>
        </div>

        <div class="nav-links">
            <a href="<?php echo URLROOT; ?>/home">Home</a>
            <a href="<?php echo URLROOT; ?>/products">Products</a>
            <a href="<?php echo URLROOT; ?>/booking">Bookings</a>
            <a href="<?php echo URLROOT; ?>/contact">Contact</a>
            <a href="<?php echo URLROOT; ?>/booking" class="nav-btn">Book Now</a>
        </div>
    </div>
</nav>

<div class="page-container">