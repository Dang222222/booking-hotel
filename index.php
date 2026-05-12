<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel - Home</title>
    <?php require('inc/link.php'); ?>
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }
        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <!-- Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/carousel/1.jpg" class="d-block w-100" alt="Slide 1"></div>
                <div class="swiper-slide"><img src="images/carousel/2.jpg" class="d-block w-100" alt="Slide 2"></div>
                <div class="swiper-slide"><img src="images/carousel/3.jpg" class="d-block w-100" alt="Slide 3"></div>
                <div class="swiper-slide"><img src="images/carousel/4.jpg" class="d-block w-100" alt="Slide 4"></div>
                <div class="swiper-slide"><img src="images/carousel/5.jpg" class="d-block w-100" alt="Slide 5"></div>
                <div class="swiper-slide"><img src="images/carousel/6.jpg" class="d-block w-100" alt="Slide 6"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Check Availability Form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Kiểm tra lịch đặt phòng</h5>
                <form action="rooms.php" method="GET">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label fw-500">Check-in</label>
                            <input type="date" name="checkin" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label fw-500">Check-out</label>
                            <input type="date" name="checkout" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label fw-500">Người lớn</label>
                            <select name="adults" class="form-select shadow-none">
                                <option value="">Chọn</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label fw-500">Trẻ em</label>
                            <select name="children" class="form-select shadow-none">
                                <option value="">Chọn</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn text-white shadow-none custom-bg w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Our Rooms -->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">OUR ROOMS</h2>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6 mb-4 my-3">
                <div class="card border-0 shadow room-card">
                    <img src="images/rooms/1.jpg" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <h6 class="mb-3">Giá: $150/đêm</h6>
                        <div class="features-title">Tiện nghi phòng</div>
                        <div class="features-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-door-open"></i> 1 Phòng ngủ</span>
                            <span class="badge-pill-custom"><i class="bi bi-droplet"></i> 1 Phòng tắm</span>
                            <span class="badge-pill-custom"><i class="bi bi-house-door"></i> Ban công</span>
                            <span class="badge-pill-custom"><i class="bi bi-couch"></i> Sofa</span>
                        </div>
                        <div class="facilities-title">Dịch vụ</div>
                        <div class="facilities-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge-pill-custom"><i class="bi bi-tv"></i> TV</span>
                            <span class="badge-pill-custom"><i class="bi bi-snow"></i> Điều hòa</span>
                            <span class="badge-pill-custom"><i class="bi bi-fire"></i> Máy sưởi</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Khách</h6>
                            <span class="badge-pill-custom"><i class="bi bi-people"></i> 2 Người lớn</span>
                            <span class="badge-pill-custom"><i class="bi bi-person"></i> 1 Trẻ em</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Đánh giá</h6>
                            <span class="badge rounded-pill bg-light text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="rooms.php" class="btn btn-sm text-white shadow-none custom-bg">Đặt ngay</a>
                            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 my-3">
                <div class="card border-0 shadow room-card">
                    <img src="images/rooms/2.jpg" class="card-img-top" alt="Suite Room">
                    <div class="card-body">
                        <h5 class="card-title">Suite Room</h5>
                        <h6 class="mb-3">Giá: $250/đêm</h6>
                        <div class="features-title">Tiện nghi phòng</div>
                        <div class="features-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-door-open"></i> 2 Phòng ngủ</span>
                            <span class="badge-pill-custom"><i class="bi bi-droplet"></i> 2 Phòng tắm</span>
                            <span class="badge-pill-custom"><i class="bi bi-house-door"></i> Ban công</span>
                            <span class="badge-pill-custom"><i class="bi bi-couch"></i> 2 Sofas</span>
                        </div>
                        <div class="facilities-title">Dịch vụ</div>
                        <div class="facilities-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge-pill-custom"><i class="bi bi-tv"></i> TV</span>
                            <span class="badge-pill-custom"><i class="bi bi-snow"></i> Điều hòa</span>
                            <span class="badge-pill-custom"><i class="bi bi-cup-hot"></i> Minibar</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Khách</h6>
                            <span class="badge-pill-custom"><i class="bi bi-people"></i> 2 Người lớn</span>
                            <span class="badge-pill-custom"><i class="bi bi-person"></i> 1 Trẻ em</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Đánh giá</h6>
                            <span class="badge rounded-pill bg-light text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="rooms.php" class="btn btn-sm text-white shadow-none custom-bg">Đặt ngay</a>
                            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 my-3">
                <div class="card border-0 shadow room-card">
                    <img src="images/rooms/3.jpg" class="card-img-top" alt="Family Room">
                    <div class="card-body">
                        <h5 class="card-title">Family Room</h5>
                        <h6 class="mb-3">Giá: $350/đêm</h6>
                        <div class="features-title">Tiện nghi phòng</div>
                        <div class="features-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-door-open"></i> 3 Phòng ngủ</span>
                            <span class="badge-pill-custom"><i class="bi bi-droplet"></i> 2 Phòng tắm</span>
                            <span class="badge-pill-custom"><i class="bi bi-house-door"></i> 2 Ban công</span>
                            <span class="badge-pill-custom"><i class="bi bi-couch"></i> 3 Sofas</span>
                        </div>
                        <div class="facilities-title">Dịch vụ</div>
                        <div class="facilities-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge-pill-custom"><i class="bi bi-tv"></i> TV</span>
                            <span class="badge-pill-custom"><i class="bi bi-snow"></i> Điều hòa</span>
                            <span class="badge-pill-custom"><i class="bi bi-fire"></i> Máy sưởi</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Khách</h6>
                            <span class="badge-pill-custom"><i class="bi bi-people"></i> 5 Người lớn</span>
                            <span class="badge-pill-custom"><i class="bi bi-person"></i> 4 Trẻ em</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Đánh giá</h6>
                            <span class="badge rounded-pill bg-light text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="rooms.php" class="btn btn-sm text-white shadow-none custom-bg">Đặt ngay</a>
                            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="text-center mb-5 pb-5">
        <a href="rooms.php" class="btn btn-outline-dark btn-lg more-btn">Xem thêm phòng</a>
    </div>

    <!-- Our Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Tiện ích khách sạn</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-wifi fs-1 text-dark"></i>
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-water fs-1 text-dark"></i>
                <h5 class="mt-3">Hồ bơi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-cup-hot fs-1 text-dark"></i>
                <h5 class="mt-3">Nhà hàng</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-car-front fs-1 text-dark"></i>
                <h5 class="mt-3">Bãi đỗ xe</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-heart-pulse fs-1 text-dark"></i>
                <h5 class="mt-3">Phòng gym</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-outline-dark btn-lg more-btn">Xem tất cả tiện ích</a>
            </div>
        </div>
    </div>

    <br>

    <!-- Testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">ĐÁNH GIÁ KHÁCH HÀNG</h2>
    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Nguyễn Văn A</h6>
                    </div>
                    <p>Khách sạn tuyệt vời! Phòng sạch sẽ, nhân viên thân thiện và vị trí rất thuận tiện. Tôi sẽ quay lại lần sau.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Trần Thị B</h6>
                    </div>
                    <p>Dịch vụ rất chuyên nghiệp, phòng rộng rãi và thoải mái. Bữa sáng buffet rất ngon và đa dạng. Highly recommended!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Lê Minh C</h6>
                    </div>
                    <p>Trải nghiệm lưu trú tuyệt vời. View từ phòng rất đẹp, hồ bơi sạch và nhân viên hỗ trợ rất nhiệt tình.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Phạm Đức D</h6>
                    </div>
                    <p>Phòng Suite rất sang trọng và tiện nghi. Giá cả hợp lý so với chất lượng. Sẽ giới thiệu cho bạn bè và gia đình.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Reach Us -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">LIÊN HỆ</h2>
    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white p-3 rounded shadow-sm h-100">
                    <iframe
                        class="w-100 rounded"
                        height="450"
                        style="border:0;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7509.397933131189!2d105.91248509357905!3d19.767940500000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313650fa108cbf63%3A0xee00d9a93f1f8371!2sFLC%20Luxury%20S%E1%BA%A7m%20S%C6%A1n%20Resort!5e0!3m2!1svi!2s!4v1776775851977!5m2!1svi!2s"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column gap-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h5 class="mb-3">Gọi cho chúng tôi</h5>
                    <a href="tel:+84915565322" class="d-flex align-items-center gap-2 text-decoration-none text-dark mb-2">
                        <i class="bi bi-telephone-fill text-success"></i> +84 915 565 322
                    </a>
                </div>
                <div class="bg-white p-4 rounded shadow-sm">
                    <h5 class="mb-3">Theo dõi chúng tôi</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-decoration-none">
                            <span class="badge fs-6 p-2 w-100 text-start" style="background:#1877f2;">
                                <i class="bi bi-facebook me-2"></i> Facebook
                            </span>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <span class="badge fs-6 p-2 w-100 text-start" style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                                <i class="bi bi-instagram me-2"></i> Instagram
                            </span>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <span class="badge fs-6 p-2 w-100 text-start" style="background:#1da1f2;">
                                <i class="bi bi-twitter me-2"></i> Twitter
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script>
        const swiperCarousel = new Swiper('.swiper-container', {
            loop: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            spaceBetween: 30,
            effect: "fade",
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            pagination: { el: '.swiper-pagination', clickable: true },
        });

        const swiperTestimonial = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: { rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: true },
            pagination: { el: ".swiper-testimonials .swiper-pagination", clickable: true },
        });
    </script>
</body>
</html>
