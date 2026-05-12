<?php
session_start();
require('inc/db_config.php');
if (!isset($_SESSION['adminLogin'])) { header('Location: index.php'); exit(); }

$alert_msg = '';

if (isset($_POST['delete_user'])) {
    $id  = (int)$_POST['user_id'];
    $res = delete("DELETE FROM `users` WHERE `id`=?", [$id], "i");
    $alert_msg = $res
        ? '<div class="alert alert-success alert-dismissible fade show">Đã xóa người dùng! <button class="btn-close" data-bs-dismiss="alert"></button></div>'
        : '<div class="alert alert-danger alert-dismissible fade show">Xóa thất bại! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
}

$users_res = select("SELECT * FROM `users` ORDER BY `created_at` DESC");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - TJ Hotel Admin</title>
    <?php require('inc/link.php'); ?>
    <style>table { font-size:.875rem; }</style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="col-lg-10 ms-auto p-4" id="main-content">
    <h4 class="fw-bold mb-1">Quản lý người dùng</h4>
    <p class="text-muted small mb-4">Danh sách tài khoản đã đăng ký</p>

    <?= $alert_msg ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr><th>#</th><th>Họ tên</th><th>Email</th><th>Số điện thoại</th><th>Ngày tạo</th><th>Hành động</th></tr>
                    </thead>
                    <tbody>
                    <?php if ($users_res && mysqli_num_rows($users_res) > 0):
                        while ($u = mysqli_fetch_assoc($users_res)): ?>
                        <tr>
                            <td><?= $u['id'] ?></td>
                            <td class="fw-semibold"><?= htmlspecialchars($u['name']) ?></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                            <td><?= htmlspecialchars($u['phone']) ?></td>
                            <td><?= date('d/m/Y', strtotime($u['created_at'])) ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Xóa người dùng này?')">
                                    <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                    <button name="delete_user" class="btn btn-sm btn-outline-danger shadow-none">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">Chưa có người dùng nào</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
<?php require('inc/scripts.php'); ?>
</body>
</html>