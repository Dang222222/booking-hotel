<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - TJ Hotel</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body { background:#f8f9fa; }
    .contact-card { border-radius:20px; }
    .section-title { font-weight:700; letter-spacing:1px; }
    .map iframe { border-radius:15px; }
    .form-control { border-radius:10px; }
    .btn-custom {
      background:#0d6efd;
      border:none;
      border-radius:10px;
      padding:10px;
    }
    .btn-custom:hover { background:#0b5ed7; }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="text-center section-title mb-5">CONTACT US</h2>

  <!-- MAP SECTION -->
  <div class="row g-4 mb-5">
    <div class="col-lg-6">
      <div class="map">
<iframe 
  class="w-100 rounded mb-4" 
  height="450" 
  style="border:0;" 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7509.397933131189!2d105.91248509357905!3d19.767940500000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313650fa108cbf63%3A0xee00d9a93f1f8371!2sFLC%20Luxury%20S%E1%BA%A7m%20S%C6%A1n%20Resort!5e0!3m2!1svi!2s!4v1776775851977!5m2!1svi!2s"
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe> 
     </div>
    </div>

    <!-- IMAGE SECTION -->
    <div class="col-lg-6">
      <img src="images/about/hotel.jpg" alt="Hotel" class="w-100 rounded" style="height: 450px; object-fit: cover;">
    </div>
    
  </div>

  <!-- INFO + FORM -->
  <div class="row g-4">

    <!-- CONTACT INFO -->
    <div class="col-lg-5">
      <div class="bg-white p-4 shadow-sm contact-card">
        <h5 class="mb-3">Our Location</h5>
        <a href="https://maps.app.goo.gl/X1Bne4PH1KT6KXT46" target="_blank" class="btn btn-primary btn-sm"><i class="bi bi-geo-alt"></i> View on Map</a>
      

        <h5 class="mt-4">Call Us</h5>
        <p><i class="bi bi-telephone"></i> +0915565322</p>

        <h5 class="mt-4">Email</h5>
        <p><i class="bi bi-envelope"></i> laihaidangaz@gmail.com</p>

        <h5 class="mt-4">Follow Us</h5>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-facebook"></i></a>
          <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-instagram"></i></a>
          <a href="#" class="btn btn-info btn-sm"><i class="bi bi-twitter"></i></a>
        </div>
      </div>
    </div>

    <!-- CONTACT FORM -->
    <div class="col-lg-7">
      <div class="bg-white p-4 shadow-sm contact-card">
        <h5 class="mb-3">Send Message</h5>

        <form action="send_mail.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Your Email</label>    
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>

          <div class="mb-3">
                <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Subject">
          </div>

          <div class="mb-3">
            <label class="form-label">Your Message</label>
            <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
          </div>

          <button type="submit" class="btn btn-custom w-100">Send Message</button>
        </form>
      </div>
    </div>

  </div>
</div>
<?php require 'inc/footer.php'; ?>

</body>
</html>
