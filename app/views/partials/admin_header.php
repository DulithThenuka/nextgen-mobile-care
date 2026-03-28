<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['title']) ? htmlspecialchars($data['title']) . ' - ' : ''; ?>NextGen Mobile Care Admin</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
        body{background:#0b1120;color:#e5eefc;line-height:1.6;}
        a{text-decoration:none;color:inherit;}
        .admin-shell{display:flex;min-height:100vh;}
        .admin-sidebar{width:260px;background:linear-gradient(180deg,#0f172a 0%,#111827 100%);border-right:1px solid rgba(255,255,255,.08);padding:24px 18px;position:sticky;top:0;height:100vh;}
        .admin-brand{display:block;padding:14px 16px;border-radius:18px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);margin-bottom:22px;}
        .admin-brand small{display:block;color:#93c5fd;letter-spacing:.08em;text-transform:uppercase;font-size:11px;margin-bottom:6px;}
        .admin-brand strong{font-size:20px;line-height:1.3;display:block;}
        .admin-nav{display:grid;gap:10px;}
        .admin-nav a{padding:13px 14px;border-radius:14px;color:#cbd5e1;border:1px solid transparent;transition:.2s;background:transparent;}
        .admin-nav a:hover,.admin-nav a.active{background:rgba(59,130,246,.12);border-color:rgba(59,130,246,.22);color:#fff;}
        .admin-sidebar-bottom{margin-top:22px;padding-top:18px;border-top:1px solid rgba(255,255,255,.07);display:grid;gap:10px;}
        .admin-content{flex:1;min-width:0;background:radial-gradient(circle at top left, rgba(59,130,246,.12), transparent 22%),radial-gradient(circle at bottom right, rgba(6,182,212,.10), transparent 24%),#0b1120;}
        .admin-topbar{display:flex;justify-content:space-between;align-items:center;gap:16px;padding:22px 28px;border-bottom:1px solid rgba(255,255,255,.07);background:rgba(11,17,32,.72);backdrop-filter:blur(10px);position:sticky;top:0;z-index:50;}
        .admin-topbar-left h1{font-size:24px;margin-bottom:4px;}
        .admin-topbar-left p{color:#94a3b8;font-size:14px;}
        .admin-user-badge{padding:11px 14px;border-radius:14px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);font-size:14px;color:#cbd5e1;}
        .admin-page{padding:28px;}
        .page-card{background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);border-radius:24px;box-shadow:0 16px 36px rgba(0,0,0,.22);}
        .page-section-title{font-size:30px;margin-bottom:8px;color:#fff;}
        .page-section-text{color:#94a3b8;margin-bottom:24px;}
        .btn-primary,.btn-secondary{display:inline-flex;align-items:center;justify-content:center;padding:12px 18px;border-radius:12px;font-weight:700;transition:.2s;border:1px solid transparent;}
        .btn-primary{background:linear-gradient(135deg,#3b82f6,#06b6d4);color:#fff;box-shadow:0 10px 25px rgba(59,130,246,.25);}
        .btn-primary:hover{transform:translateY(-2px);}
        .btn-secondary{background:rgba(255,255,255,.05);border-color:rgba(255,255,255,.08);color:#fff;}
        .btn-secondary:hover{background:rgba(255,255,255,.08);}
        table{width:100%;border-collapse:collapse;}
        @media (max-width: 980px){
            .admin-shell{display:block;}
            .admin-sidebar{width:100%;height:auto;position:relative;border-right:none;border-bottom:1px solid rgba(255,255,255,.08);}
            .admin-nav{grid-template-columns:repeat(2,minmax(0,1fr));}
        }
        @media (max-width: 640px){
            .admin-topbar{padding:18px;align-items:flex-start;flex-direction:column;}
            .admin-page{padding:18px;}
            .admin-nav{grid-template-columns:1fr;}
        }
    </style>
</head>
<body>
<?php $currentPath = $_SERVER['REQUEST_URI'] ?? ''; ?>
<div class="admin-shell">
    <aside class="admin-sidebar">
        <a class="admin-brand" href="<?php echo URLROOT; ?>/admin/dashboard">
            <small>admin panel</small>
            <strong>NextGen Mobile Care</strong>
        </a>

        <nav class="admin-nav">
            <a href="<?php echo URLROOT; ?>/admin/dashboard" class="<?php echo strpos($currentPath, '/admin/dashboard') !== false ? 'active' : ''; ?>">Dashboard</a>
            <a href="<?php echo URLROOT; ?>/admin/products" class="<?php echo strpos($currentPath, '/admin/products') !== false || strpos($currentPath, '/admin/addProduct') !== false || strpos($currentPath, '/admin/editProduct') !== false ? 'active' : ''; ?>">Products</a>
            <a href="<?php echo URLROOT; ?>/admin/bookings" class="<?php echo strpos($currentPath, '/admin/bookings') !== false ? 'active' : ''; ?>">Bookings</a>
            <a href="<?php echo URLROOT; ?>/admin/orders" class="<?php echo strpos($currentPath, '/admin/orders') !== false ? 'active' : ''; ?>">Orders</a>
            <a href="<?php echo URLROOT; ?>/admin/messages" class="<?php echo strpos($currentPath, '/admin/messages') !== false ? 'active' : ''; ?>">Messages</a>
        </nav>

        <div class="admin-sidebar-bottom">
            <a class="btn-secondary" href="<?php echo URLROOT; ?>">View Website</a>
            <a class="btn-secondary" href="<?php echo URLROOT; ?>/admin/logout">Logout</a>
        </div>
    </aside>

    <main class="admin-content">
        <div class="admin-topbar">
            <div class="admin-topbar-left">
                <h1><?php echo isset($data['title']) ? htmlspecialchars($data['title']) : 'Admin Panel'; ?></h1>
                <p>Simple, clean control panel for your repair and product management.</p>
            </div>
            <div class="admin-user-badge">
                Logged in as <strong><?php echo isset($_SESSION['admin_username']) ? htmlspecialchars($_SESSION['admin_username']) : 'Admin'; ?></strong>
            </div>
        </div>
        <div class="admin-page">
