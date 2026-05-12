<?php
session_start();
require('inc/db_config.php');
if (!isset($_SESSION['adminLogin'])) { header('Location: index.php'); exit(); }

$alert_msg = '';

if (isset($_POST['add_room'])) {
    $f = filteration($_POST);
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $ext   = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fname = 'room_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/rooms/' . $fname);
        $image = 'images/rooms/' . $fname;
    }
    $q = "INSERT INTO `rooms`(`name`,`type`,`price`,`capacity`,`description`,`image`) VALUES(?,?,?,?,?,?)";
    $res = insert($q, [$f['name'], $f['type'], (float)$_POST['price'], (int)$_POST['capacity'], $f['description'], $image], "ssdiss");
    $alert_msg = $res ? '<div class="alert alert-success alert-dismissible fade show">Thêm phòng thành công! <button class="btn-close" data-bs-dismiss="alert"></button></div>'
                      : '<div class="alert alert-danger alert-dismissible fade show">Thêm phòng thất bại! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
}

if (isset($_POST['delete_room'])) {
    $id = (int)$_POST['room_id'];
    update("DELETE FROM `rooms` WHERE `id`=?", [$id], "i");
    $alert_msg = '<div class="alert alert-success alert-dismissible fade show">Đã xóa phòng! <button class="btn-close" data-bs-dismiss="alert"></button></div>';
}

if (isset($_POST['toggle_status'])) {
    $id  = (int)$_POST['room_id'];
    $cur = filteration(['status' => $_POST['current_status']])['status'];
    $new = ($cur === 'available') ? 'maintenance' : 'available';
    update("UPDATE `rooms` SET `status`=? WHERE `id`=?", [$new, $id], "si");
}

$rooms_res = select("SELECT * FROM `rooms` ORDER BY `id` DESC", [], "");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms - TJ Hotel Admin</title>
    <?php require('inc/link.php'); ?>
    <style>
        table { font-size:.875rem; }
        .room-img { width:70px; height:50px; object-fit:cover; border-radius:8px; }
        .badge-available   { background:#d1e7dd; color:#0f5132; }
        .badge-booked      { background:#cfe2ff; color:#084298; }
        .badge-maintenance { background:#fff3cd; color:#856404; }
    </style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="col-lg-10 ms-auto p-4" id="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Quản lý phòng</h4>
            <p class="text-muted small mb-0">Thêm, sửa, xóa phòng khách sạn</p>
        </div>
        <button class="btn btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#addRoomModal">+ Thêm phòng</button>
    </div>

    <?= $alert_msg ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th><th>Ảnh</th><th>Tên phòng</th><th>Loại</th>
                            <th>Giá/đêm</th><th>Sức chứa</th><th>Trạng thái</th><th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($rooms_res && mysqli_num_rows($rooms_res) > 0):
                        while ($r = mysqli_fetch_assoc($rooms_res)): ?>
                        <tr>
                            <td><?= $r['id'] ?></td>
                            <td>
                                <?php if ($r['image']): ?>
                                    <img src="../<?= htmlspecialchars($r['image']) ?>" class="room-img" alt="">
                                <?php else: ?>
                                    <div class="room-img bg-secondary d-flex align-items-center justify-content-center text-white" style="font-size:.7rem;">No img</div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-semibold"><?= htmlspecialchars($r['name']) ?></td>
                            <td><?= ucfirst($r['type']) ?></td>
                            <td>$<?= number_format($r['price'], 0) ?></td>
                            <td><?= $r['capacity'] ?> khách</td>
                            <td>
                                <?php
                                $badge = match($r['status']) {
                                    'booked'      => 'badge-booked',
                                    'maintenance' => 'badge-maintenance',
                                    default       => 'badge-available'
                                };
                                $label = match($r['status']) {
                                    'booked'      => 'Đã đặt',
                                    'maintenance' => 'Bảo trì',
                                    default       => 'Trống'
                                };
                                ?>
                                <span class="badge <?= $badge ?> rounded-pill px-2"><?= $label ?></span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <form method="POST">
                                        <input type="hidden" name="room_id" value="<?= $r['id'] ?>">
                                        <input type="hidden" name="current_status" value="<?= $r['status'] ?>">
                                        <button name="toggle_status" class="btn btn-sm btn-outline-secondary shadow-none">
                                            <?= $r['status'] === 'available' ? 'Bảo trì' : 'Mở lại' ?>
                                        </button>
                                    </form>
                                    <form method="POST" onsubmit="return confirm('Xóa phòng này?')">
                                        <input type="hidden" name="room_id" value="<?= $r['id'] ?>">
                                        <button name="delete_room" class="btn btn-sm btn-outline-danger shadow-none">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                        <tr><td colspan="8" class="text-center text-muted py-4">Chưa có phòng nào</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL THÊM PHÒNG -->
<div class="modal fade" id="addRoomModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Thêm phòng mới</h5>
                <button class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Tên phòng</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Loại phòng</label>
                            <select name="type" class="form-select shadow-none">
                                <option value="standard">Standard</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="suite">Suite</option>
                                <option value="family">Family</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Giá/đêm ($)</label>
                            <input type="number" name="price" class="form-control shadow-none" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Sức chứa (khách)</label>
                            <input type="number" name="capacity" class="form-control shadow-none" min="1" value="2" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Ảnh phòng</label>
                            <input type="file" name="image" class="form-control shadow-none" accept="image/*">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" style="font-size:.875rem;">Mô tả</label>
                            <textarea name="description" class="form-control shadow-none" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary shadow-none" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" name="add_room" class="btn btn-dark shadow-none">Thêm phòng</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<?php require('inc/scripts.php'); ?>
</body>
</html>
