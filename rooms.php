<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TJ Hotel - Phòng</title>
  <?php 
    session_start();
    require('inc/link.php'); 
  ?>
  <style>
    .h-line { width: 120px; height: 3px; background: #2ec1ac; margin: auto; }
    .card { border: none; border-radius: 15px; overflow: hidden; transition: 0.3s; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    .btn-custom { background: #2ec1ac; border: none; border-radius: 8px; padding: 8px 16px; color: #fff; }
    .btn-custom:hover { background: #279e8c; color: #fff; }
    .filter-box { position: sticky; top: 80px; }
    .price { font-size: 18px; font-weight: 600; color: #2ec1ac; }
    .badge-available { background: #2ec1ac; }
    @media (max-width: 991px) { .filter-box { position: static; } }
  </style>
</head>
<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4 text-center">
    <h2 class="mt-5 mb-3 fw-bold h-font">Danh sách phòng</h2>
    <div class="h-line"></div>
  </div>

  <div class="container mb-5">
    <div class="row">

      <!-- FILTER -->
      <div class="col-lg-3 mb-4">
        <div class="bg-white p-3 rounded shadow filter-box">
          <h5 class="mb-3">Bộ lọc</h5>

          <div class="mb-4">
            <label class="form-label fw-semibold">Check-in</label>
            <input type="date" name="checkin" class="form-control mb-2 shadow-none">
            <label class="form-label fw-semibold">Check-out</label>
            <input type="date" name="checkout" class="form-control shadow-none">
          </div>

          <div class="mb-4">
            <h6 class="fw-semibold">Tiện ích</h6>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facility[]" value="wifi" id="fWifi">
              <label class="form-check-label" for="fWifi">Wifi</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facility[]" value="pool" id="fPool">
              <label class="form-check-label" for="fPool">Hồ bơi</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facility[]" value="gym" id="fGym">
              <label class="form-check-label" for="fGym">Phòng gym</label>
            </div>
          </div>

          <div>
            <h6 class="fw-semibold">Số khách</h6>
            <div class="d-flex gap-2">
              <input type="number" name="adults" class="form-control shadow-none" placeholder="Người lớn" min="1">
              <input type="number" name="children" class="form-control shadow-none" placeholder="Trẻ em" min="0">
            </div>
          </div>

          <button class="btn btn-custom w-100 mt-3">Lọc</button>
        </div>
      </div>

      <!-- ROOM LIST -->
      <div class="col-lg-9">

        <div class="card mb-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/rooms/1.jpg" class="img-fluid w-100 h-100" style="object-fit:cover; border-radius:15px 0 0 15px;" alt="Deluxe Room">
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="mb-0">Deluxe Room</h5>
                  <span class="badge badge-available text-white">Còn phòng</span>
                </div>
                <p class="text-muted small">Phòng rộng rãi với view thành phố, wifi miễn phí, điều hòa nhiệt độ.</p>
                <div class="mb-3">
                  <span class="me-2 small"><i class="bi bi-people me-1"></i>2 Người lớn, 1 Trẻ em</span>
                  <span class="small"><i class="bi bi-door-open me-1"></i>1 Phòng ngủ</span>
                </div>
                <div class="mb-3">
                  <i class="bi bi-wifi me-2 text-muted"></i>
                  <i class="bi bi-tv me-2 text-muted"></i>
                  <i class="bi bi-snow me-2 text-muted"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$150/đêm</span>
                  <button class="btn btn-custom book-btn" data-room-id="1">Đặt ngay</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/rooms/2.jpg" class="img-fluid w-100 h-100" style="object-fit:cover; border-radius:15px 0 0 15px;" alt="Suite Room">
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="mb-0">Suite Room</h5>
                  <span class="badge badge-available text-white">Còn phòng</span>
                </div>
                <p class="text-muted small">Phòng suite sang trọng với phòng khách riêng và dịch vụ cao cấp.</p>
                <div class="mb-3">
                  <span class="me-2 small"><i class="bi bi-people me-1"></i>2 Người lớn, 1 Trẻ em</span>
                  <span class="small"><i class="bi bi-door-open me-1"></i>2 Phòng ngủ</span>
                </div>
                <div class="mb-3">
                  <i class="bi bi-wifi me-2 text-muted"></i>
                  <i class="bi bi-tv me-2 text-muted"></i>
                  <i class="bi bi-cup-hot me-2 text-muted"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$250/đêm</span>
                  <button class="btn btn-custom book-btn" data-room-id="2">Đặt ngay</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/rooms/3.jpg" class="img-fluid w-100 h-100" style="object-fit:cover; border-radius:15px 0 0 15px;" alt="Family Room">
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="mb-0">Family Room</h5>
                  <span class="badge badge-available text-white">Còn phòng</span>
                </div>
                <p class="text-muted small">Phòng gia đình rộng lớn, phù hợp cho cả gia đình có trẻ nhỏ.</p>
                <div class="mb-3">
                  <span class="me-2 small"><i class="bi bi-people me-1"></i>5 Người lớn, 4 Trẻ em</span>
                  <span class="small"><i class="bi bi-door-open me-1"></i>3 Phòng ngủ</span>
                </div>
                <div class="mb-3">
                  <i class="bi bi-wifi me-2 text-muted"></i>
                  <i class="bi bi-tv me-2 text-muted"></i>
                  <i class="bi bi-snow me-2 text-muted"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$350/đêm</span>
                  <button class="btn btn-custom book-btn" data-room-id="3">Đặt ngay</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/rooms/4.jpg" class="img-fluid w-100 h-100" style="object-fit:cover; border-radius:15px 0 0 15px;" alt="Standard Room">
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="mb-0">Standard Room</h5>
                  <span class="badge badge-available text-white">Còn phòng</span>
                </div>
                <p class="text-muted small">Phòng tiêu chuẩn thoải mái, phù hợp cho lưu trú ngắn ngày.</p>
                <div class="mb-3">
                  <span class="me-2 small"><i class="bi bi-people me-1"></i>2 Người lớn</span>
                  <span class="small"><i class="bi bi-door-open me-1"></i>1 Phòng ngủ</span>
                </div>
                <div class="mb-3">
                  <i class="bi bi-wifi me-2 text-muted"></i>
                  <i class="bi bi-tv me-2 text-muted"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$80/đêm</span>
                  <button class="btn btn-custom book-btn" data-room-id="4">Đặt ngay</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>

  <script>
    document.querySelectorAll('.book-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const roomId = this.getAttribute('data-room-id');
        const checkin = document.querySelector('input[name="checkin"]').value || '';
        const checkout = document.querySelector('input[name="checkout"]').value || '';
        const adults = document.querySelector('input[name="adults"]').value || 1;
        const children = document.querySelector('input[name="children"]').value || 0;

        const params = new URLSearchParams({
          room_id: roomId,
          checkin: checkin,
          checkout: checkout,
          adults: adults,
          children: children
        }).toString();

        // Kiểm tra nếu đã login
        <?php if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) { ?>
          // Đã login - trực tiếp đến checkout
          window.location.href = 'admin/checkout.php?' + params;
        <?php } else { ?>
          // Chưa login - chuyển đến login với redirect
          window.location.href = 'admin/login.php?redirect=checkout&' + params;
        <?php } ?>
      });
    });
  </script>

</body>
</html>
