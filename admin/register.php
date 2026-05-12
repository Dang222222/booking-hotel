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

if (isset($_POST['register'])) {
    $frm_data = filteration($_POST);

    if ($frm_data['pass'] !== $frm_data['cpass']) {
        $alert_msg = alert('danger', 'Mật khẩu xác nhận không khớp!');
    } elseif (strlen($_POST['pass']) < 6) {
        $alert_msg = alert('warning', 'Mật khẩu phải có ít nhất 6 ký tự!');
    } else {
        $u_exist = select("SELECT id FROM `users` WHERE `email`=? LIMIT 1", [$frm_data['email']], "s");

        if (mysqli_num_rows($u_exist) !== 0) {
            $alert_msg = alert('warning', 'Email này đã được đăng ký! Vui lòng dùng email khác.');
        } else {
            $hashed_pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $query  = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'], $frm_data['email'], $frm_data['phone'], $hashed_pass];
            $res    = insert($query, $values, "ssss");

            if ($res) {
                $alert_msg  = alert('success', 'Đăng ký thành công! Đang chuyển đến trang đăng nhập...');
                $alert_msg .= "<script>setTimeout(function(){ window.location.href='login.php'; }, 2000);</script>";
            } else {
                $alert_msg = alert('danger', 'Đăng ký thất bại. Vui lòng thử lại!');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản - TJ Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        .register-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            overflow: hidden;
        }
        .register-header {
            background: linear-gradient(135deg, #2ec1ac, #279e8c);
            padding: 1.75rem 2rem;
            text-align: center;
            color: white;
        }
        .register-header h4 { font-weight: 700; margin: 0; letter-spacing: 0.5px; }
        .register-header p  { font-size: 0.85rem; opacity: 0.85; margin: 0.3rem 0 0; }
        .register-body { padding: 2rem 2.5rem; background: #fff; }
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
        .btn-register {
            background: linear-gradient(135deg, #2ec1ac, #279e8c);
            border: none;
            border-radius: 10px;
            padding: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: white;
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn-register:hover { opacity: 0.92; transform: translateY(-1px); color: white; }
        .form-label { font-size: 0.875rem; font-weight: 600; }
        .back-link { font-size: 0.85rem; color: #6c757d; text-align: center; }
        .back-link a { color: #2ec1ac; font-weight: 600; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }
        .password-hint { font-size: 0.78rem; color: #aaa; margin-top: 0.25rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <?php if ($alert_msg) echo $alert_msg; ?>

            <div class="register-card card">
                <div class="register-header">
                    <h4>TJ Hotel</h4>
                    <p>Tạo tài khoản mới</p>
                </div>
                <div class="register-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" placeholder="Nguyễn Văn A" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" name="phone" class="form-control" placeholder="0912345678" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control" placeholder="••••••••" required>
                            <div class="password-hint">Tối thiểu 6 ký tự</div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="cpass" class="form-control" placeholder="••••••••" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-register w-100 mb-3">Đăng ký</button>
                    </form>

                    <div class="back-link mt-2">
                        Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>
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
