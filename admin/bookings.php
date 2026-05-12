<?php
session_start();
require('inc/db_config.php');
if (!isset($_SESSION['adminLogin'])) { header('Location: index.php'); exit(); }

if (isset($_POST['update_status'])) {
    $id     = (int)$_POST['booking_id'];
    $status = filteration(['status' => $_POST['status']])['status'];
    update("UPDATE `bookings` SET `status`=? WHERE `id`=?", [$status, $id], "si");
    if ($status === 'cancelled') {
        $b = mysqli_fetch_assoc(select("SELECT room_id FROM `bookings` WHERE `id`=?", [$id], "i"));
        if ($b) update("UPDATE `rooms` SET `status`='available' WHERE `id`=?", [$b['room_id']], "i");
    }
}

$bookings_res = select(
    "SELECT b.*, u.name AS user_name, u.email, r.name AS room_name
     FROM `bookings` b
     JOIN `users` u ON b.user_id = u.id
     JOIN `rooms`  r ON b.room_id  = r.id
     ORDER BY b.created_at DESC",
    [], ""
);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings - TJ Hotel Admin</title>
    <?php require('inc/link.php'); ?>
    <style>
        .badge-pending   { background:#fff3cd; color:#856404; }
        .badge-confirmed { background:#d1e7dd; color:#0f5132; }
        .badge-cancelled { background:#f8d7da; color:#842029; }
        table { font-size:.875rem; }
    </style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="col-lg-10 ms-auto p-4" id="main-content">
    <h4 class="fw-bold mb-1">Quản lý đặt phòng</h4>
    <p class="text-muted small mb-4">Danh sách tất cả đặt phòng</p>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th><th>Khách hàng</th><th>Phòng</th>
                            <th>Check-in</th><th>Check-out</th><th>Tổng</th>
                            <th>Trạng thái</th><th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($bookings_res && mysqli_num_rows($bookings_res) > 0):
                        while ($row = mysqli_fetch_assoc($bookings_res)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <div class="fw-semibold"><?= htmlspecialchars($row['user_name']) ?></div>
                                <div class="text-muted" style="font-size:.78rem;"><?= htmlspecialchars($row['email']) ?></div>
                            </td>
                            <td><?= htmlspecialchars($row['room_name']) ?></td>
                            <td><?= $row['checkin'] ?></td>
                            <td><?= $row['checkout'] ?></td>
                            <td>$<?= number_format($row['total'], 0) ?></td>
                            <td>
                                <?php
                                $badge = match($row['status']) {
                                    'confirmed' => 'badge-confirmed',
                                    'cancelled' => 'badge-cancelled',
                                    default     => 'badge-pending'
                                };
                                $label = match($row['status']) {
                                    'confirmed' => 'Xác nhận',
                                    'cancelled' => 'Đã hủy',
                                    default     => 'Chờ xử lý'
                                };
                                ?>
                                <span class="badge <?= $badge ?> rounded-pill px-2"><?= $label ?></span>
                            </td>
                            <td>
                                <form method="POST" class="d-flex gap-1">
                                    <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                                    <select name="status" class="form-select form-select-sm shadow-none" style="width:130px;">
                                        <option value="pending"   <?= $row['status']==='pending'  ?'selected':'' ?>>Chờ xử lý</option>
                                        <option value="confirmed" <?= $row['status']==='confirmed'?'selected':'' ?>>Xác nhận</option>
                                        <option value="cancelled" <?= $row['status']==='cancelled'?'selected':'' ?>>Hủy</option>
                                    </select>
                                    <button type="submit" name="update_status" class="btn btn-sm btn-dark shadow-none">Lưu</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                        <tr><td colspan="8" class="text-center text-muted py-4">Chưa có đặt phòng nào</td></tr>
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
