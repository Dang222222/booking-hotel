<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TJ Hotel - Phòng</title>
  <?php require('inc/link.php'); ?>
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
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$150/đêm</span>
                  <button class="btn btn-custom btn-sm"
                    data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-room="Deluxe Room" data-price="150" data-room-id="1">
                    Đặt ngay
                  </button>
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
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$250/đêm</span>
                  <button class="btn btn-custom btn-sm"
                    data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-room="Suite Room" data-price="250" data-room-id="2">
                    Đặt ngay
                  </button>
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
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$350/đêm</span>
                  <button class="btn btn-custom btn-sm"
                    data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-room="Family Room" data-price="350" data-room-id="3">
                    Đặt ngay
                  </button>
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
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price">$80/đêm</span>
                  <button class="btn btn-custom btn-sm"
                    data-bs-toggle="modal" data-bs-target="#bookModal"
                    data-room="Standard Room" data-price="80" data-room-id="4">
                    Đặt ngay
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- MODAL ĐẶT PHÒNG / ĐĂNG NHẬP -->
  <div class="modal fade" id="bookModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 rounded-4 overflow-hidden">

        <!-- Tab chọn: Đặt phòng hoặc Đăng nhập -->
        <div class="modal-header border-0 pb-0" style="background:#f8f9fa;">
          <ul class="nav nav-tabs border-0 w-100" id="bookTabs">
            <li class="nav-item">
              <button class="nav-link active fw-semibold" data-bs-toggle="tab" data-bs-target="#tabBook">Đặt phòng</button>
            </li>
            <li class="nav-item">
              <button class="nav-link fw-semibold" data-bs-toggle="tab" data-bs-target="#tabLogin">Đăng nhập</button>
            </li>
          </ul>
          <button class="btn-close ms-2 mb-1 shadow-none" data-bs-dismiss="modal"></button>
        </div>

        <div class="tab-content p-4">

          <!-- TAB ĐẶT PHÒNG -->
          <div class="tab-pane fade show active" id="tabBook">
            <h6 class="fw-bold mb-1" id="modalRoomName"></h6>
            <p class="text-success fw-semibold mb-3" id="modalRoomPrice"></p>
// rooms.php - chỉ sửa dòng này trong tab Đặt phòng
            <form method="GET" action="admin/checkout.php" id="bookForm">              <input type="hidden" name="room_id" id="modalRoomId">
              <div class="row g-3">
                <div class="col-6">
                  <label class="form-label fw-semibold" style="font-size:.875rem;">Check-in</label>
                  <input type="date" name="checkin" class="form-control shadow-none" required>
                </div>
                <div class="col-6">
                  <label class="form-label fw-semibold" style="font-size:.875rem;">Check-out</label>
                  <input type="date" name="checkout" class="form-control shadow-none" required>
                </div>
                <div class="col-6">
                  <label class="form-label fw-semibold" style="font-size:.875rem;">Người lớn</label>
                  <select name="adults" class="form-select shadow-none">
                    <option value="1">1</option>
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="col-6">
                  <label class="form-label fw-semibold" style="font-size:.875rem;">Trẻ em</label>
                  <select name="children" class="form-select shadow-none">
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-custom w-100 mt-4">Tiếp tục đặt phòng</button>
            </form>
          </div>

          <!-- TAB ĐĂNG NHẬP -->
          <div class="tab-pane fade" id="tabLogin">
            <h6 class="fw-bold mb-3">Đăng nhập để đặt phòng</h6>
            <div id="loginAlert"></div>
            <div class="mb-3">
              <label class="form-label fw-semibold" style="font-size:.875rem;">Email</label>
              <input type="email" id="loginEmail" class="form-control shadow-none" placeholder="email@example.com">
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold" style="font-size:.875rem;">Mật khẩu</label>
              <input type="password" id="loginPass" class="form-control shadow-none" placeholder="••••••••">
            </div>
            <button class="btn btn-custom w-100" id="loginBtn">Đăng nhập</button>
            <div class="text-center mt-3" style="font-size:.85rem;">
              Chưa có tài khoản? <a href="admin/register.php" class="text-decoration-none fw-semibold" style="color:#2ec1ac;">Đăng ký ngay</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php require('inc/footer.php'); ?>

 <script>
  const bookModal = document.getElementById('bookModal');

  bookModal.addEventListener('show.bs.modal', function(e) {
    const btn = e.relatedTarget;
    document.getElementById('modalRoomName').textContent = btn.dataset.room;
    document.getElementById('modalRoomPrice').textContent = '$' + btn.dataset.price + '/đêm';
    document.getElementById('modalRoomId').value = btn.dataset.roomId;
  });

  document.getElementById('loginBtn').addEventListener('click', function() {
    const email    = document.getElementById('loginEmail').value.trim();
    const pass     = document.getElementById('loginPass').value;
    const alertBox = document.getElementById('loginAlert');

    if (!email || !pass) {
      alertBox.innerHTML = '<div class="alert alert-warning py-2">Vui lòng nhập đầy đủ thông tin!</div>';
      return;
    }

    this.disabled = true;
    this.textContent = 'Đang xử lý...';

    fetch('admin/ajax/login_ajax.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'email=' + encodeURIComponent(email) + '&pass=' + encodeURIComponent(pass)
    })
    .then(r => r.json())
    .then(data => {
      this.disabled = false;
      this.textContent = 'Đăng nhập';

      if (data.success) {
        alertBox.innerHTML = '<div class="alert alert-success py-2">Đăng nhập thành công! Đang chuyển...</div>';
        setTimeout(() => {
          bootstrap.Modal.getInstance(bookModal).hide();
          document.getElementById('bookForm').submit();
        }, 800);
      } else {
        alertBox.innerHTML = '<div class="alert alert-danger py-2">' + data.msg + '</div>';
      }
    })
    .catch(() => {
      this.disabled = false;
      this.textContent = 'Đăng nhập';
      alertBox.innerHTML = '<div class="alert alert-danger py-2">Lỗi kết nối. Thử lại!</div>';
    });
  });
</script>
</body>
</html>