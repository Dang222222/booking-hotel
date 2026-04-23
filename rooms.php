<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TJ Hotel - Rooms</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .h-font {
      font-family: 'Merienda', cursive;
    }

    .h-line {
      width: 120px;
      height: 3px;
      background: #0d6efd;
      margin: auto;
    }

    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .btn-custom {
      background:#0d6efd;
      border:none;
      border-radius:8px;
      padding:8px 16px;
      color:#fff;
    }

    .btn-custom:hover {
      background:#0b5ed7;
    }

    .filter-box {
      position: sticky;
      top: 20px;
    }

    .price {
      font-size: 18px;
      font-weight: 600;
      color: #0d6efd;
    }

    .badge-custom {
      background: #198754;
    }

    @media (max-width: 991px) {
      .filter-box {
        position: static;
      }
    }
  </style>
</head>
<body>

<!-- TITLE -->
<div class="my-5 px-4 text-center">
  <h2 class="mt-5 mb-3 fw-bold h-font">Our Rooms</h2>
  <div class="h-line"></div>
</div>

<!-- CONTENT -->
<div class="container">
  <div class="row">

    <!-- FILTER -->
    <div class="col-lg-3 mb-4">
      <div class="bg-white p-3 rounded shadow filter-box">

        <h5 class="mb-3">Filters</h5>

        <!-- DATE -->
        <div class="mb-4">
          <label>Check-in</label>
          <input type="date" class="form-control mb-2">
          <label>Check-out</label>
          <input type="date" class="form-control">
        </div>

        <!-- FACILITY -->
        <div class="mb-4">
          <h6>Facilities</h6>

          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Wifi</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Pool</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Gym</label>
          </div>
        </div>

        <!-- GUEST -->
        <div>
          <h6>Guests</h6>
          <div class="d-flex gap-2">
            <input type="number" class="form-control" placeholder="Adults" min="1">
            <input type="number" class="form-control" placeholder="Children" min="0">
          </div>
        </div>

      </div>
    </div>

    <!-- ROOM LIST -->
    <div class="col-lg-9">

      <!-- ROOM 1 -->
      <div class="card mb-4">
        <div class="row g-0">

          <div class="col-md-4">
            <img src="https://via.placeholder.com/400x250" class="img-fluid w-100 h-100" style="object-fit: cover;">
          </div>

          <div class="col-md-8">
            <div class="card-body">

              <div class="d-flex justify-content-between">
                <h5>Deluxe Room</h5>
                <span class="badge badge-custom">Popular</span>
              </div>

              <p class="text-muted">
                Spacious room with city view, free wifi, air conditioning.
              </p>

              <!-- ICON -->
              <div class="mb-2">
                <i class="bi bi-wifi me-2"></i>
                <i class="bi bi-tv me-2"></i>
                <i class="bi bi-snow me-2"></i>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <span class="price">$120/night</span>
                <button class="btn btn-custom">Book Now</button>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- ROOM 2 -->
      <div class="card mb-4">
        <div class="row g-0">

          <div class="col-md-4">
            <img src="https://via.placeholder.com/400x250" class="img-fluid w-100 h-100" style="object-fit: cover;">
          </div>

          <div class="col-md-8">
            <div class="card-body">

              <h5>Standard Room</h5>

              <p class="text-muted">
                Comfortable and affordable room for short stays.
              </p>

              <div class="mb-2">
                <i class="bi bi-wifi me-2"></i>
                <i class="bi bi-tv me-2"></i>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <span class="price">$80/night</span>
                <button class="btn btn-custom">Book Now</button>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- ROOM 3 -->
      <div class="card mb-4">
        <div class="row g-0">

          <div class="col-md-4">
            <img src="https://via.placeholder.com/400x250" class="img-fluid w-100 h-100" style="object-fit: cover;">
          </div>

          <div class="col-md-8">
            <div class="card-body">

              <h5>Suite Room</h5>

              <p class="text-muted">
                Luxury suite with living room, premium service.
              </p>

              <div class="mb-2">
                <i class="bi bi-wifi me-2"></i>
                <i class="bi bi-tv me-2"></i>
                <i class="bi bi-cup-straw me-2"></i>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <span class="price">$200/night</span>
                <button class="btn btn-custom">Book Now</button>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</div>

<!-- FOOTER -->
<footer class="text-center mt-5 p-4 bg-dark text-white">
  <p class="mb-0">© 2026 TJ Hotel. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>