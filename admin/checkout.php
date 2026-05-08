<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Đặt phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4">Thông tin thanh toán & Đặt phòng</h3>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form id="checkoutForm">
                            <h5 class="mb-3">1. Thông tin liên hệ</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>

                            <h5 class="mb-3">2. Phương thức thanh toán</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment" id="payDirect" checked>
                                <label class="form-check-label" for="payDirect">Thanh toán trực tiếp tại quầy</label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="payment" id="payOnline">
                                <label class="form-check-label" for="payOnline">Chuyển khoản ngân hàng / VNPay</label>
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-2">Hoàn tất Đặt phòng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Đặt phòng thành công! TJ Hotel sẽ liên hệ với bạn trong thời gian sớm nhất.');
            window.location.href = 'index.php'; // Chuyển về trang chủ sau khi đặt xong
        });
    </script>
</body>
</html>