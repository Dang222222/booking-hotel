<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel_Home</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
                <div class="swiper-slide">
                    <img src="images/carousel/1.jpg" class="d-block w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/2.jpg" class="d-block w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/3.jpg" class="d-block w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/4.jpg" class="d-block w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/5.jpg" class="d-block w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/6.jpg" class="d-block w-100" />
                </div>
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
                <h5 class="mb-4">Check booking Availability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Người lớn</label>
                            <select class="form-select">
                                <option selected>Chọn số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Trẻ em</label>
                            <select class="form-select">
                                <option selected>Chọn số lượng</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn text-white shadow-none custom-bg w-100">Search</button>
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
                        <h6 class="mb-3">Price: $150/night</h6>
                        <div class="features-title">Features</div>
                        <div class="features-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-door-open"></i> 1 Room</span>
                            <span class="badge-pill-custom"><i class="bi bi-droplet"></i> 1 Bathroom</span>
                            <span class="badge-pill-custom"><i class="bi bi-house-door"></i> 1 Balcony</span>
                            <span class="badge-pill-custom"><i class="bi bi-couch"></i> 1 Sofa</span>
                        </div>
                        <div class="facilities-title">Facilities</div>
                        <div class="facilities-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge-pill-custom"><i class="bi bi-tv"></i> TV</span>
                            <span class="badge-pill-custom"><i class="bi bi-snow"></i> AC</span>
                            <span class="badge-pill-custom"><i class="bi bi-fire"></i> Heater</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white shadow-none custom-bg">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 my-3">
                <div class="card border-0 shadow room-card">
                    <img src="images/rooms/2.jpg" class="card-img-top" alt="Suite Room">
                    <div class="card-body">
                        <h5 class="card-title">Suite Room</h5>
                        <h6 class="mb-3">Price: $250/night</h6>
                        <div class="features-title">Features</div>
                        <div class="features-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-door-open"></i> 2 Rooms</span>
                            <span class="badge-pill-custom"><i class="bi bi-droplet"></i> 2 Bathrooms</span>
                            <span class="badge-pill-custom"><i class="bi bi-house-door"></i> 1 Balcony</span>
                            <span class="badge-pill-custom"><i class="bi bi-couch"></i> 2 Sofas</span>
                        </div>
                        <div class="facilities-title">Facilities</div>
                        <div class="facilities-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge-pill-custom"><i class="bi bi-tv"></i> TV</span>
                            <span class="badge-pill-custom"><i class="bi bi-snow"></i> AC</span>
                            <span class="badge-pill-custom"><i class="bi bi-cup-hot"></i> Minibar</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white shadow-none custom-bg">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 my-3">
                <div class="card border-0 shadow room-card">
                    <img src="images/rooms/3.jpg" class="card-img-top" alt="Family Room">
                    <div class="card-body">
                        <h5 class="card-title">Family Room</h5>
                        <h6 class="mb-3">Price: $350/night</h6>
                        <div class="features-title">Features</div>
                        <div class="features-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-door-open"></i> 3 Rooms</span>
                            <span class="badge-pill-custom"><i class="bi bi-droplet"></i> 2 Bathrooms</span>
                            <span class="badge-pill-custom"><i class="bi bi-house-door"></i> 2 Balconies</span>
                            <span class="badge-pill-custom"><i class="bi bi-couch"></i> 3 Sofas</span>
                        </div>
                        <div class="facilities-title">Facilities</div>
                        <div class="facilities-list mb-3">
                            <span class="badge-pill-custom"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge-pill-custom"><i class="bi bi-tv"></i> TV</span>
                            <span class="badge-pill-custom"><i class="bi bi-snow"></i> AC</span>
                            <span class="badge-pill-custom"><i class="bi bi-fire"></i> Heater</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white shadow-none custom-bg">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="text-center mb-5 pb-5">
        <a href="#" class="btn btn-outline-dark btn-lg more-btn">More Rooms</a>
    </div>

    <!-- Our Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-wifi fs-1 text-dark"></i>
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-water fs-1 text-dark"></i>
                <h5 class="mt-3">Swimming Pool</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-cup-hot fs-1 text-dark"></i>
                <h5 class="mt-3">Restaurant</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-car-front fs-1 text-dark"></i>
                <h5 class="mt-3">Parking</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <i class="bi bi-heart-pulse fs-1 text-dark"></i>
                <h5 class="mt-3">Gym</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-outline-dark btn-lg more-btn">More Facilities</a>
            </div>
        </div>
    </div>

    <br>

    <!-- Testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Nguyen Van A</h6>
                    </div>
                    <p>Khách sạn tuyệt vời! Phòng sạch sẽ, nhân viên thân thiện và vị trí rất thuận tiện. Tôi sẽ quay lại lần sau.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Tran Thi B</h6>
                    </div>
                    <p>Dịch vụ rất chuyên nghiệp, phòng rộng rãi và thoải mái. Bữa sáng buffet rất ngon và đa dạng. Highly recommended!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Le Minh C</h6>
                    </div>
                    <p>Trải nghiệm lưu trú tuyệt vời. View từ phòng rất đẹp, hồ bơi sạch và nhân viên hỗ trợ rất nhiệt tình.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="profile">
                        <i class="bi bi-person-circle text-dark" style="font-size: 30px;"></i>
                        <h6>Pham Duc D</h6>
                    </div>
                    <p>Phòng Suite rất sang trọng và tiện nghi. Giá cả hợp lý so với chất lượng. Sẽ giới thiệu cho bạn bè và gia đình.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- reach us -->
   <!-- reach us -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
<div class="container">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="bg-white p-3 rounded shadow-sm h-100">
                <iframe class="w-100 rounded" height="450" style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.0146951116967!2d105.77135407550617!3d21.072075286289003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552defbed8e9%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1776603652100!5m2!1svi!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-lg-4 d-flex flex-column gap-4">
            <div class="bg-white p-4 rounded shadow-sm">
                <h5 class="mb-3">Call us</h5>
                <a href="tel:+0915565322" class="d-flex align-items-center gap-2 text-decoration-none text-dark mb-2">
                    <i class="bi bi-telephone-fill text-success"></i> +0915565322
                </a>
                <a href="tel:+0915565322" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill text-success"></i> +0915565322
                </a>
            </div>
            <div class="bg-white p-4 rounded shadow-sm">
                <h5 class="mb-3">Follow us</h5>
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


    </div>
    <?php require('inc/footer.php'); ?>

    <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script>
        const swiperCarousel = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            spaceBetween: 30,
            effect: "fade",
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        const swiperTestimonial = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-testimonials .swiper-pagination",
                clickable: true,
            },
        });
    </script>
</body>
</html>