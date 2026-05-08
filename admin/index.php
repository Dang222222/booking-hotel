<?php
// Khởi tạo session để lưu trạng thái đăng nhập
session_start();
require('inc/db_config.php');

// Hàm tạo thông báo (chỉ dùng cho thông báo lỗi)
function alert($type, $msg){
    return <<<alert
    <div class="alert alert-$type alert-dismissible fade show custom-alert m-3" role="alert">
        <strong>$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
alert;
}

$alert_msg = ""; // Khởi tạo biến rỗng

// Xử lý khi người dùng bấm ĐĂNG NHẬP
if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
    
    $res = select($query, $values, "ss");

    if ($res->num_rows == 1) {
        // Đăng nhập thành công: Lưu phiên làm việc và chuyển trang
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $frm_data['admin_name']; 
        
        // Chuyển hướng thẳng vào trang quản trị
        header("Location: Dashboard.php");
        exit; 
    } else {
        // Đăng nhập thất bại: Gán câu thông báo lỗi
        $alert_msg = alert('danger', 'Đăng nhập không thành công. Sai tài khoản hoặc mật khẩu!');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('../inc/link.php'); ?>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .bg-light {
            height: 100%;
        }
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="bg-light">
        <div class="login-form text-center rounded bg-white shadow">
            
            <?php if ($alert_msg != "") echo $alert_msg; ?>
            
            <form method="POST" action="">
                <h4 class="bg-dark text-white p-3 rounded-top">Admin Login</h4>
                <div class="p-4">
                    <input name="admin_name" required type="text" class="form-control shadow-none" placeholder="Tên đăng nhập">
                </div>
                <div class="p-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none" placeholder="Mật khẩu">
                </div>
                <div class="pb-4">
                    <button name="login" type="submit" class="btn text-white custom-bg shadow-none">ĐĂNG NHẬP</button>
                </div>
            </form>
        </div>
    </div>

<?php require('../inc/scripts.php'); ?>
</body>
</html>
