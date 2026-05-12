<?php
session_start();
require('inc/db_config.php');

if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) {
    header('Location: dashboard.php');
    exit();
}

function alert($type, $msg) {
    return <<<HTML
    <div class="alert alert-$type alert-dismissible fade show mb-4" role="alert">
        <strong>$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
HTML;
}

$alert_msg = "";

if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);
    $email    = $frm_data['email'];
    $pass     = $_POST['pass'];

    $res = select("SELECT * FROM `users` WHERE `email`=? LIMIT 1", [$email], "s");

    if ($res && mysqli_num_rows($res) === 1) {
        $user = mysqli_fetch_assoc($res);
        if (password_verify($pass, $user['password'])) {
            $_SESSION['adminLogin'] = true;
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['name'];
            header('Location: dashboard.php');
            exit();
        } else {
            $alert_msg = alert('danger', 'Mật khẩu không đúng!');
        }
    } else {
        $alert_msg = alert('danger', 'Email không tồn tại trong hệ thống!');
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
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, #2ec1ac, #279e8c);
            padding: 2rem;
            text-align: center;
            color: white;
        }
        .login-header h4 { font-weight: 700; margin: 0; letter-spacing: 0.5px; }
        .login-header p  { font-size: 0.85rem; opacity: 0.85; margin: 0.3rem 0 0; }
        .login-body { padding: 2rem 2.5rem; background: #fff; }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #e0e0e0;
            padding: 0.65rem 1rem;
            font-size: 0.9rem;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            border-color: #2ec1ac;
            box-shadow: 0 0 0 3px rgba(46,193,172,0.15);
        }
        .btn-login {
            background: linear-gradient(135deg, #2ec1ac, #279e8c);
            border: none;
            border-radius: 10px;
            padding: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: white;
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn-login:hover { opacity: 0.92; transform: translateY(-1px); color: white; }
        .divider { color: #aaa; font-size: 0.8rem; }
        .back-link { font-size: 0.85rem; color: #6c757d; text-align: center; }
        .back-link a { color: #2ec1ac; font-weight: 600; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">

            <?php if ($alert_msg) echo $alert_msg; ?>

            <div class="login-card card">
                <div class="login-header">
                    <h4>TJ Hotel</h4>
                    <p>Đăng nhập vào tài khoản của bạn</p>
                </div>
                <div class="login-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:0.875rem;">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold" style="font-size:0.875rem;">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control" placeholder="••••••••" required>
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
