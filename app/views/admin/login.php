<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - NextGen Mobile Care</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
        body{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;background:radial-gradient(circle at top left, rgba(59,130,246,.18), transparent 24%),radial-gradient(circle at bottom right, rgba(6,182,212,.14), transparent 24%),#0b1120;color:#fff;}
        .login-wrap{width:100%;max-width:980px;display:grid;grid-template-columns:1fr 430px;gap:24px;align-items:stretch;}
        .login-side,.login-card{background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);border-radius:28px;box-shadow:0 18px 40px rgba(0,0,0,.28);}
        .login-side{padding:40px;display:flex;flex-direction:column;justify-content:center;}
        .login-side .badge{display:inline-block;width:max-content;padding:8px 14px;border-radius:999px;background:rgba(59,130,246,.12);border:1px solid rgba(59,130,246,.22);color:#93c5fd;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:18px;}
        .login-side h1{font-size:40px;line-height:1.15;margin-bottom:12px;}
        .login-side p{color:#a5b4cc;max-width:520px;}
        .feature-list{display:grid;gap:12px;margin-top:24px;}
        .feature-item{padding:14px 16px;border-radius:16px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);color:#dce7f7;}
        .login-card{padding:34px;}
        .login-card h2{font-size:30px;margin-bottom:8px;}
        .login-card p{color:#94a3b8;margin-bottom:24px;}
        .form-group{margin-bottom:16px;}
        .form-group label{display:block;margin-bottom:8px;color:#dbe7f5;font-weight:700;}
        .form-control{width:100%;padding:14px 15px;border-radius:14px;border:1px solid rgba(255,255,255,.09);background:#0f172a;color:#fff;outline:none;}
        .form-control:focus{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.15);}
        .error-box{padding:12px 14px;border-radius:14px;background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.18);color:#fecaca;margin-bottom:18px;}
        .login-btn{width:100%;padding:14px 18px;border:none;border-radius:14px;font-weight:800;cursor:pointer;background:linear-gradient(135deg,#3b82f6,#06b6d4);color:#fff;box-shadow:0 12px 28px rgba(59,130,246,.25);}
        .back-link{display:inline-block;margin-top:16px;color:#93c5fd;font-size:14px;}
        @media (max-width: 900px){.login-wrap{grid-template-columns:1fr;}.login-side{display:none;}}
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-side">
            <span class="badge">Admin area</span>
            <h1>Simple admin panel with a clean matching design.</h1>
            <p>This login page matches the dashboard styling, so your project feels complete and consistent without becoming too complicated.</p>
            <div class="feature-list">
                <div class="feature-item">Manage products and stock</div>
                <div class="feature-item">Track bookings and customer orders</div>
                <div class="feature-item">Check contact messages quickly</div>
            </div>
        </div>

        <div class="login-card">
            <h2>Admin Login</h2>
            <p>Sign in to continue to the NextGen Mobile Care admin panel.</p>

            <?php if(isset($data['error'])): ?>
                <div class="error-box"><?php echo $data['error']; ?></div>
            <?php endif; ?>

            <form method="POST" action="<?php echo URLROOT; ?>/admin/login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Enter admin username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>

                <button type="submit" class="login-btn">Login to Admin Panel</button>
            </form>

            <a class="back-link" href="<?php echo URLROOT; ?>">← Back to website</a>
        </div>
    </div>
</body>
</html>