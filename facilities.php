<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel - Tiện ích</title>
    <?php require('inc/link.php'); ?>
    <style>
        .pop {
            transition: all 0.3s ease;
        }
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
        }
    </style>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="text-center fw-bold h-font mb-2 mt-4">TIỆN ÍCH KHÁCH SẠN</h2>
        <div style="width:80px; height:3px; background:#2ec1ac; margin:0 auto 2.5rem;"></div>

        <div class="container">
            <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-wifi" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Wifi miễn phí</h5>
                        <p class="text-muted small mb-0">Internet tốc độ cao toàn khu vực</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-cup-hot" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Nhà hàng</h5>
                        <p class="text-muted small mb-0">Ẩm thực đỉnh cao phục vụ 24/7</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-droplet-half" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Hồ bơi</h5>
                        <p class="text-muted small mb-0">Hồ bơi ngoài trời mở cả ngày</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-p-circle" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Bãi đỗ xe miễn phí</h5>
                        <p class="text-muted small mb-0">Bãi đỗ xe an toàn cho tất cả khách</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-heart-pulse" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Phòng tập gym</h5>
                        <p class="text-muted small mb-0">Trang thiết bị hiện đại đầy đủ</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-flower1" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Spa & Chăm sóc sức khỏe</h5>
                        <p class="text-muted small mb-0">Thư giãn và phục hồi cơ thể</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-car-front" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Đưa đón sân bay</h5>
                        <p class="text-muted small mb-0">Dịch vụ đặt trước theo yêu cầu</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="bg-white rounded-3 shadow-sm p-4 border-top border-4 border-dark text-center h-100 pop">
                        <i class="bi bi-shield-check" style="font-size:2.5rem; color:#2c2c2c;"></i>
                        <h5 class="mt-3 fw-semibold">Bảo vệ 24/7</h5>
                        <p class="text-muted small mb-0">An toàn là ưu tiên hàng đầu</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

</body>
</html>
