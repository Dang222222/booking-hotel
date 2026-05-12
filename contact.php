<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TJ Hotel - Liên hệ</title>
  <?php require('inc/link.php'); ?>
  <style>
    .contact-card { border-radius: 16px; }
    .form-control, .form-select { border-radius: 10px; }
    .btn-custom { background: #2ec1ac; border: none; border-radius: 10px; padding: 10px; color: #fff; }
    .btn-custom:hover { background: #279e8c; color: #fff; }
  </style>
</head>
<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <div class="container py-5">
    <h2 class="text-center fw-bold h-font mb-2 mt-4">LIÊN HỆ</h2>
    <div class="h-line mb-5" style="width:80px; height:3px; background:#2ec1ac; margin:0 auto 2rem;"></div>

    <!-- MAP + IMAGE -->
    <div class="row g-4 mb-5">
      <div class="col-lg-6">
        <iframe
          class="w-100 rounded shadow-sm"
          height="420"
          style="border:0;"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7509.397933131189!2d105.91248509357905!3d19.767940500000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313650fa108cbf63%3A0xee00d9a93f1f8371!2sFLC%20Luxury%20S%E1%BA%A7m%20S%C6%A1n%20Resort!5e0!3m2!1svi!2s!4v1776775851977!5m2!1svi!2s"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
      <div class="col-lg-6">
        <img src="images/about/hotel.jpg" alt="TJ Hotel" class="w-100 rounded shadow-sm" style="height:420px; object-fit:cover;">
      </div>
    </div>

    <!-- INFO + FORM -->
    <div class="row g-4">

      <!-- CONTACT INFO -->
      <div class="col-lg-5">
        <div class="bg-white p-4 shadow-sm contact-card h-100">
          <h5 class="mb-3 fw-bold">Địa chỉ</h5>
          <p class="text-muted small"><i class="bi bi-geo-alt-fill me-2 text-success"></i>FLC Sầm Sơn Resort, Thanh Hóa, Việt Nam</p>
          <a href="https://maps.app.goo.gl/X1Bne4PH1KT6KXT46" target="_blank" class="btn btn-sm btn-outline-dark mb-4">
            <i class="bi bi-map me-1"></i> Xem trên bản đồ
          </a>

          <h5 class="mb-3 fw-bold">Điện thoại</h5>
          <p class="text-muted small"><i class="bi bi-telephone-fill me-2 text-success"></i>+84 915 565 322</p>

          <h5 class="mb-3 fw-bold">Email</h5>
          <p class="text-muted small"><i class="bi bi-envelope-fill me-2 text-success"></i>contact@tjhotel.vn</p>

          <h5 class="mb-3 fw-bold">Mạng xã hội</h5>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-sm text-white" style="background:#1877f2;"><i class="bi bi-facebook"></i></a>
            <a href="#" class="btn btn-sm text-white" style="background:linear-gradient(45deg,#f09433,#dc2743,#bc1888);"><i class="bi bi-instagram"></i></a>
            <a href="#" class="btn btn-sm text-white" style="background:#1da1f2;"><i class="bi bi-twitter"></i></a>
          </div>
        </div>
      </div>

      <!-- CONTACT FORM -->
      <div class="col-lg-7">
        <div class="bg-white p-4 shadow-sm contact-card">
          <h5 class="mb-4 fw-bold">Gửi tin nhắn</h5>
          <form action="#" method="POST">
            <div class="mb-3">
              <label class="form-label">Họ và tên</label>
              <input type="text" name="name" class="form-control shadow-none" placeholder="Họ và tên của bạn" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control shadow-none" placeholder="email@example.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tiêu đề</label>
              <input type="text" name="subject" class="form-control shadow-none" placeholder="Tiêu đề">
            </div>
            <div class="mb-4">
              <label class="form-label">Nội dung</label>
              <textarea name="message" class="form-control shadow-none" rows="5" placeholder="Nội dung tin nhắn..." required></textarea>
            </div>
            <button type="submit" class="btn btn-custom w-100">
              <i class="bi bi-send me-2"></i>Gửi tin nhắn
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>

  <?php require('inc/footer.php'); ?>

</body>
</html>
