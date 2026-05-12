<?php
session_start();
require('inc/db_config.php');
if (!isset($_SESSION['adminLogin'])) { header('Location: index.php'); exit(); }

$total_users    = mysqli_fetch_assoc(select("SELECT COUNT(*) AS c FROM `users`"))['c']    ?? 0;
$total_bookings = mysqli_fetch_assoc(select("SELECT COUNT(*) AS c FROM `bookings`"))['c'] ?? 0;
$total_rooms    = mysqli_fetch_assoc(select("SELECT COUNT(*) AS c FROM `rooms`"))['c']    ?? 0;
$pending        = mysqli_fetch_assoc(select("SELECT COUNT(*) AS c FROM `bookings` WHERE `status`='pending'"))['c'] ?? 0;

$recent_res = select(
    "SELECT b.id, u.name, u.email, r.name AS room, b.checkin, b.checkout, b.status
     FROM `bookings` b
     JOIN `users` u ON b.user_id = u.id
     JOIN `rooms`  r ON b.room_id = r.id
     ORDER BY b.created_at DESC LIMIT 5"
);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TJ Hotel Admin</title>
    <?php require('inc/link.php'); ?>
    <style>
        .stat-card { border:none; border-radius:14px; }
        .stat-card .icon { font-size:1.8rem; width:50px; height:50px; display:flex; align-items:center; justify-content:center; border-radius:12px; }
        .badge-pending   { background:#fff3cd; color:#856404; }
        .badge-confirmed { background:#d1e7dd; color:#0f5132; }
        .badge-cancelled { background:#f8d7da; color:#842029; }
    </style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="col-lg-10 p-4 ms-auto" id="main-content">
    <h4 class="fw-bold mb-1">Dashboard</h4>
    <p class="text-muted small mb-4">Tổng quan hệ thống TJ Hotel</p>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon bg-primary bg-opacity-10 text-primary">👤</div>
                    <div><div class="text-muted small">Người dùng</div><div class="fw-bold fs-4"><?= $total_users ?></div></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon bg-success bg-opacity-10 text-success">📋</div>
                    <div><div class="text-muted small">Đặt phòng</div><div class="fw-bold fs-4"><?= $total_bookings ?></div></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon bg-info bg-opacity-10 text-info">🛏</div>
                    <div><div class="text-muted small">Phòng</div><div class="fw-bold fs-4"><?= $total_rooms ?></div></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon bg-warning bg-opacity-10 text-warning">⏳</div>
                    <div><div class="text-muted small">Chờ xác nhận</div><div class="fw-bold fs-4"><?= $pending ?></div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 pt-3 pb-2 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0">Đặt phòng gần đây</h6>
            <a href="bookings.php" class="btn btn-sm btn-outline-dark shadow-none">Xem tất cả</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" style="font-size:.875rem;">
                    <thead class="table-light">
                        <tr><th>#</th><th>Khách hàng</th><th>Phòng</th><th>Check-in</th><th>Check-out</th><th>Trạng thái</th></tr>
                    </thead>
                    <tbody>
                    <?php if ($recent_res && mysqli_num_rows($recent_res) > 0):
                        while ($row = mysqli_fetch_assoc($recent_res)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <div class="fw-semibold"><?= htmlspecialchars($row['name']) ?></div>
                                <div class="text-muted" style="font-size:.78rem;"><?= htmlspecialchars($row['email']) ?></div>
                            </td>
                            <td><?= htmlspecialchars($row['room']) ?></td>
                            <td><?= $row['checkin'] ?></td>
                            <td><?= $row['checkout'] ?></td>
                            <td>
                                <?php
                                $badge = match($row['status']) { 'confirmed'=>'badge-confirmed','cancelled'=>'badge-cancelled',default=>'badge-pending' };
                                $label = match($row['status']) { 'confirmed'=>'Xác nhận','cancelled'=>'Đã hủy',default=>'Chờ xử lý' };
                                ?>
                                <span class="badge <?= $badge ?> rounded-pill px-2"><?= $label ?></span>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">Chưa có đặt phòng nào</td></tr>
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