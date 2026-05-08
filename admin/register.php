<?php
session_start();
// Đường dẫn đã được sửa chuẩn theo thư mục hiện tại của bạn
require('inc/db_config.php'); 

function alert($type, $msg){
    return <<<alert
    <div class="alert alert-$type alert-dismissible fade show custom-alert mb-4" role="alert">
        <strong>$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
alert;
}

$alert_msg = "";

if (isset($_POST['register'])) {
    $frm_data = filteration($_POST);

    if ($frm_data['pass'] != $frm_data['cpass']) {
        $alert_msg = alert('danger', 'Mật khẩu xác nhận không khớp!');
    } else {
        $u_exist = select("SELECT * FROM `users` WHERE `email`=? LIMIT 1", [$frm_data['email']], "s");

        if (mysqli_num_rows($u_exist) != 0) {
            $alert_msg = alert('warning', 'Email này đã được đăng ký! Vui lòng dùng email khác.');
        } else {
            $hashed_pass = password_hash($frm_data['pass'], PASSWORD_BCRYPT);

            $query = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'], $frm_data['email'], $frm_data['phone'], $hashed_pass];

            $res = insert($query, $values, "ssss");

            if ($res) {
                // Hiển thị thông báo và tự động chuyển về login.php sau 2000ms
                $alert_msg = alert('success', 'Đăng ký thành công! Hệ thống sẽ tự động chuyển sang trang Đăng nhập sau 2 giây...');
                $alert_msg .= "<script> setTimeout(function(){ window.location.href = 'login.php'; }, 2000); </script>";
            } else {
                $alert_msg = alert('danger', 'Đăng ký thất bại. Vui lòng thử lại sau!');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">TJ Hotel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="rooms.php">Phòng</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Đăng Ký Tài Khoản</h3>
                        
                        <?php if($alert_msg != "") echo $alert_msg; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input name="phone" type="tel" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>
                            
                            <button name="register" type="submit" class="btn btn-dark w-100 mb-3">ĐĂNG KÝ</button>
                            
                            <div class="text-center">
                                Đã có tài khoản? <a href="login.php" class="text-decoration-none fw-bold text-primary">Đăng nhập ngay</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>