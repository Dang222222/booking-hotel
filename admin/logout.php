<?php
// Bắt đầu session để nhận diện phiên làm việc hiện tại
session_start();

// Xóa tất cả các biến trong session (ví dụ: thông tin user, admin đã đăng nhập)
session_unset();

// Phá hủy hoàn toàn session
session_destroy();

// Chuyển hướng người dùng về lại trang chủ (hoặc trang đăng nhập)
header("Location: index.php");
exit();
?>