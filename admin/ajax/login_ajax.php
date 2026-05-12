<?php
session_start();
require('../inc/db_config.php');
header('Content-Type: application/json');

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['pass'] ?? '';

if (!$email || !$pass) {
    echo json_encode(['success' => false, 'msg' => 'Vui lòng nhập đầy đủ thông tin!']);
    exit();
}

$res = select("SELECT * FROM `users` WHERE `email`=? LIMIT 1", [$email], "s");

if ($res && mysqli_num_rows($res) === 1) {
    $user = mysqli_fetch_assoc($res);
    if (password_verify($pass, $user['password'])) {
        $_SESSION['adminLogin'] = true;
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_name']  = $user['name'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'msg' => 'Mật khẩu không đúng!']);
    }
} else {
    echo json_encode(['success' => false, 'msg' => 'Email không tồn tại!']);
}