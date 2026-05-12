<?php
session_start();
require('inc/db_config.php');

if (!isset($_SESSION['adminLogin'])) {
    $params = http_build_query([
        'room_id'  => $_GET['room_id']  ?? '',
        'checkin'  => $_GET['checkin']  ?? '',
        'checkout' => $_GET['checkout'] ?? '',
        'adults'   => $_GET['adults']   ?? 1,
        'children' => $_GET['children'] ?? 0,
    ]);
    header('Location: login.php?redirect=checkout&' . $params);
    exit();
}

$alert_msg = '';

error_log("DEBUG: POST isset? " . (isset($_POST['book']) ? 'YES' : 'NO'));
error_log("DEBUG: SESSION user_id? " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'NOT SET'));

if (isset($_POST['book'])) {
    $uid      = (int)$_SESSION['user_id'];
    $rid      = (int)$_POST['room_id'];
    $checkin  = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adults   = (int)$_POST['adults'];
    $children = (int)$_POST['children'];

    error_log("DEBUG Book: UID=$uid RID=$rid checkin=$checkin checkout=$checkout");

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`='available' LIMIT 1", [$rid], "i");

    if (!$room_res || mysqli_num_rows($room_res) === 0) {
        $alert_msg = '<div class="alert alert-danger alert-dismissible fade show">Phòng không tồn tại hoặc đã được đặt! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
    } else {
        $room  = mysqli_fetch_assoc($room_res);
        $days  = max(1, (int)((strtotime($checkout) - strtotime($checkin)) / 86400));
        $total = (float)($days * $room['price']);

        error_log("DEBUG Insert: days=$days total=$total");

        $res = insert(
            "INSERT INTO `bookings`(`user_id`,`room_id`,`checkin`,`checkout`,`adults`,`children`,`total`,`status`) VALUES (?,?,?,?,?,?,?,?)",
            [$uid, $rid, $checkin, $checkout, $adults, $children, $total, 'pending'],
            "iissiids"
        );

        error_log("DEBUG Insert result: $res");

        if ($res) {
            update("UPDATE `rooms` SET `status`='booked' WHERE `id`=?", [$rid], "i");
            $alert_msg = '<div class="alert alert-success alert-dismissible fade show">
                <strong>Đặt phòng thành công!</strong> Chúng tôi sẽ liên hệ xác nhận sớm nhất.
                <a href="../rooms.php" class="btn btn-sm btn-outline-success ms-2">Xem phòng khác</a>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>';
        } else {
            $alert_msg = '<div class="alert alert-danger alert-dismissible fade show">Đặt phòng thất bại. Vui lòng thử lại! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
    }
}

$room_id  = isset($_GET['room_id'])  ? (int)$_GET['room_id']  : 0;
$checkin  = $_GET['checkin']  ?? '';
$checkout = $_GET['checkout'] ?? '';
$adults   = (int)($_GET['adults']   ?? 1);
$children = (int)($_GET['children'] ?? 0);

$room = null;
$days = $total = 0;

if ($room_id) {
    $res  = select("SELECT * FROM `rooms` WHERE `id`=? LIMIT 1", [$room_id], "i");
    $room = $res ? mysqli_fetch_assoc($res) : null;
    if ($room && $checkin && $checkout) {
        $days  = max(1, (int)((strtotime($checkout) - strtotime($checkin)) / 86400));
        $total = $days * $room['price'];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng - TJ Hotel</title>
    <?php
    // dùng link.php frontend (không phải admin)
    require('../inc/link.php');
    ?>
    <style>
        .summary-box { background:#f8f9fa; border-radius:12px; }
        .form-control, .form-select { border-radius:10px; border:1.5px solid #e0e0e0; }
        .form-control:focus, .form-select:focus { border-color:#2ec1ac; box-shadow:0 0 0 3px rgba(46,193,172,.15); }
        .btn-book { background:linear-gradient(135deg,#2ec1ac,#279e8c); border:none; border-radius:10px; color:#fff; font-weight:600; }
        .btn-book:hover { opacity:.9; color:#fff; }
        .user-bar { background:#2ec1ac; color:#fff; padding:.5rem 1.5rem; font-size:.875rem; }
    </style>
</head>
<body class="bg-light">

<?php require('../inc/header.php'); ?>

<div class="user-bar d-flex justify-content-between align-items-center">
    <span>Xin chào, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></span>
    <a href="logout.php" class="text-white text-decoration-none small">Đăng xuất</a>
</div>

<div class="container py-5">
    <h4 class="fw-bold mb-1">Xác nhận đặt phòng</h4>
    <p class="text-muted small mb-4">Kiểm tra thông tin và hoàn tất đặt phòng</p>

    <?= $alert_msg ?>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4">
                <h6 class="fw-bold mb-3">Thông tin đặt phòng</h6>
                <form method="POST" action="">
                    <input type="hidden" name="room_id"  value="<?= $room_id ?>">
                    <input type="hidden" name="checkin"  value="<?= htmlspecialchars($checkin) ?>">
                    <input type="hidden" name="checkout" value="<?= htmlspecialchars($checkout) ?>">
                    <input type="hidden" name="adults"   value="<?= $adults ?>">
                    <input type="hidden" name="children" value="<?= $children ?>">

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Check-in</label>
                            <input type="date" class="form-control shadow-none" value="<?= htmlspecialchars($checkin) ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Check-out</label>
                            <input type="date" class="form-control shadow-none" value="<?= htmlspecialchars($checkout) ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Người lớn</label>
                            <input type="number" class="form-control shadow-none" value="<?= $adults ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Trẻ em</label>
                            <input type="number" class="form-control shadow-none" value="<?= $children ?>" readonly>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3">Phương thức thanh toán</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment" id="payDirect" value="direct" checked>
                        <label class="form-check-label" for="payDirect">Thanh toán trực tiếp tại quầy</label>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="radio" name="payment" id="payOnline" value="online">
                        <label class="form-check-label" for="payOnline">Chuyển khoản ngân hàng / VNPay</label>
                    </div>

                    <button type="submit" name="book" class="btn btn-book w-100 py-2">Hoàn tất đặt phòng</button>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="summary-box p-4">
                <h6 class="fw-bold mb-3">Tóm tắt đơn đặt</h6>
                <?php if ($room): ?>
                    <img src="../<?= htmlspecialchars($room['image']) ?>" class="w-100 rounded mb-3" style="height:160px;object-fit:cover;" alt="<?= htmlspecialchars($room['name']) ?>">
                    <div class="fw-semibold mb-1"><?= htmlspecialchars($room['name']) ?></div>
                    <div class="text-muted small mb-3"><?= htmlspecialchars($room['description']) ?></div>
                    <hr>
                    <div class="d-flex justify-content-between small mb-1">
                        <span>Giá/đêm</span><span>$<?= number_format($room['price'], 2) ?></span>
                    </div>
                    <div class="d-flex justify-content-between small mb-1">
                        <span>Số đêm</span><span><?= $days ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Tổng cộng</span><span class="text-success">$<?= number_format($total, 2) ?></span>
                    </div>
                <?php else: ?>
                    <p class="text-muted small">Không tìm thấy thông tin phòng.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require('../inc/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>