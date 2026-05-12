<?php
session_start();
require('inc/db_config.php');

if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) {
    $redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? '';
    if ($redirect === 'checkout') {
        $params = $_GET;
        unset($params['redirect']);
        header('Location: checkout.php?' . http_build_query($params));
    } else if ($redirect !== '' && $redirect !== 'dashboard') {
        // Frontend pages (rooms.php, facilities.php, etc)
        header('Location: ../' . $redirect);
    } else {
        header('Location: dashboard.php');
    }
    exit();
}

$alert_msg = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pass  = $_POST['pass'];

    $res = select("SELECT * FROM `users` WHERE `email`=? LIMIT 1", [$email], "s");

    if ($res && mysqli_num_rows($res) === 1) {
        $user = mysqli_fetch_assoc($res);
        if (password_verify($pass, $user['password'])) {
            $_SESSION['adminLogin'] = true;
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['name'];

            $redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? '';
            if ($redirect === 'checkout') {
                $params = $_GET;
                unset($params['redirect']);
                header('Location: checkout.php?' . http_build_query($params));
            } else if ($redirect !== '' && $redirect !== 'dashboard') {
                // Frontend pages (rooms.php, facilities.php, etc)
                header('Location: ../' . $redirect);
            } else {
                header('Location: dashboard.php');
            }
            exit();
        } else {
            $alert_msg = '<div class="alert alert-danger alert-dismissible fade show mb-4">Mật khẩu không đúng! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
    } else {
        $alert_msg = '<div class="alert alert-danger alert-dismissible fade show mb-4">Email không tồn tại! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - TJ Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460); min-height:100vh; display:flex; align-items:center; }
        .login-card { border:none; border-radius:20px; box-shadow:0 25px 60px rgba(0,0,0,0.4); overflow:hidden; }
        .login-header { background:linear-gradient(135deg,#2ec1ac,#279e8c); padding:2rem; text-align:center; color:white; }
        .login-header h4 { font-weight:700; margin:0; }
        .login-header p  { font-size:.85rem; opacity:.85; margin:.3rem 0 0; }
        .login-body { padding:2rem 2.5rem; background:#fff; }
        .form-control { border-radius:10px; border:1.5px solid #e0e0e0; padding:.65rem 1rem; font-size:.9rem; }
        .form-control:focus { border-color:#2ec1ac; box-shadow:0 0 0 3px rgba(46,193,172,.15); }
        .btn-login { background:linear-gradient(135deg,#2ec1ac,#279e8c); border:none; border-radius:10px; padding:.7rem; font-weight:600; color:white; }
        .btn-login:hover { opacity:.92; color:white; }
        .back-link { font-size:.85rem; color:#6c757d; text-align:center; }
        .back-link a { color:#2ec1ac; font-weight:600; text-decoration:none; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">

            <?= $alert_msg ?>

            <div class="login-card card">
                <div class="login-header">
                    <h4>TJ Hotel</h4>
                    <p><?= isset($_GET['redirect']) ? 'Đăng nhập để hoàn tất đặt phòng' : 'Đăng nhập vào tài khoản của bạn' ?></p>
                </div>
                <div class="login-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Email</label>
                            <input type="email" name="email" class="form-control shadow-none" placeholder="email@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control shadow-none" placeholder="••••••••" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-login w-100 mb-3">Đăng nhập</button>
                    </form>
                    <div class="back-link mt-2">
                        Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>
                    </div>
                    <div class="back-link mt-2">
                        <a href="../index.php">← Quay về trang chủ</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>