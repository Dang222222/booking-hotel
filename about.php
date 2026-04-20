<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel - About Us</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
    <?php require('inc/link.php'); ?>

    <style>
        .about-hero {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;
        }
        .about-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(212, 175, 55, 0.08);
            pointer-events: none;
        }
        .about-hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(212, 175, 55, 0.05);
            pointer-events: none;
        }

        .gold { color: #d4af37; }
        .section-label {
            font-size: 0.75rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #d4af37;
            font-weight: 600;
        }

        /* Stats cards */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 2rem 1.5rem;
            text-align: center;
            border-top: 4px solid #2c2c2c;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            height: 100%;
        }
        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
            border-top-color: #d4af37;
        }
        .stat-card:hover i {
            color: #d4af37 !important;
        }
        .stat-card i {
            transition: color 0.3s ease;
        }
        .stat-number {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-top: 0.75rem;
            margin-bottom: 0.25rem;
        }
        .stat-label {
            font-size: 0.8rem;
            color: #888;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* About image */
        .about-img-wrap {
            position: relative;
        }
        .about-img-wrap img {
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            width: 100%;
            object-fit: cover;
        }
        .about-img-wrap::before {
            content: '';
            position: absolute;
            top: -12px;
            left: -12px;
            right: 12px;
            bottom: 12px;
            border: 2px solid #d4af37;
            border-radius: 16px;
            z-index: 0;
        }
        .about-img-wrap img {
            position: relative;
            z-index: 1;
        }

        /* Team swiper */
        .team-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .team-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.14);
        }
        .team-card-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: linear-gradient(135deg, #e8e8e8, #d0d0d0);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .team-card-body {
            padding: 1.25rem 1.5rem 1.5rem;
            border-top: 3px solid #d4af37;
        }
        .team-name {
            font-weight: 700;
            font-size: 1rem;
            color: #1a1a1a;
            margin-bottom: 0.2rem;
        }
        .team-role {
            font-size: 0.8rem;
            color: #d4af37;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
        }
        .team-bio {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.6rem;
            margin-bottom: 0;
            line-height: 1.6;
        }

        .mySwiper {
            padding-bottom: 48px !important;
        }
        .mySwiper .swiper-pagination-bullet-active {
            background: #d4af37;
        }

        /* Divider */
        .gold-divider {
            width: 60px;
            height: 3px;
            background: #d4af37;
            margin: 0 auto 1.5rem;
            border-radius: 2px;
        }
    </style>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <!-- Hero -->
    <div class="about-hero">
        <div class="container text-center position-relative" style="z-index:1;">
            <span class="section-label">Who We Are</span>
            <h1 class="fw-bold h-font mt-2 mb-3" style="font-size:2.8rem;">About TJ Hotel</h1>
            <p class="text-white-50 mb-0" style="max-width:520px; margin:0 auto; font-size:1rem;">
                A place where luxury meets warmth — crafted for those who seek more than just a stay.
            </p>
        </div>
    </div>

    <!-- About Section -->
    <div class="container my-5 py-3">
        <div class="row justify-content-between align-items-center g-5">
            <div class="col-lg-6 order-lg-1 order-2">
                <span class="section-label">Our Story</span>
                <h2 class="fw-bold h-font mt-2 mb-3">A Legacy of Hospitality</h2>
                <div class="gold-divider" style="margin:0 0 1.5rem;"></div>
                <p class="text-muted lh-lg">
                    Ngô Văn Cường là chủ tịch của TJ Hotel, đóng vai trò lãnh đạo và định hướng phát triển 
                    toàn bộ hoạt động kinh doanh. Với phong cách quản lý năng động và tầm nhìn chiến lược, 
                    ông tập trung nâng cao chất lượng dịch vụ, xây dựng hình ảnh chuyên nghiệp và tạo trải nghiệm 
                    tốt nhất cho khách hàng, góp phần đưa khách sạn phát triển bền vững.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill gold"></i>
                        <span class="small fw-semibold">World-class service</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill gold"></i>
                        <span class="small fw-semibold">Premium facilities</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="about-img-wrap">
                    <img src="images/about/about2.jpg" alt="About TJ Hotel">
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <i class="bi bi-door-open" style="font-size:2.2rem; color:#2c2c2c;"></i>
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Rooms</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <i class="bi bi-people" style="font-size:2.2rem; color:#2c2c2c;"></i>
                    <div class="stat-number">50,000+</div>
                    <div class="stat-label">Happy Guests</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <i class="bi bi-trophy" style="font-size:2.2rem; color:#2c2c2c;"></i>
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Awards Won</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <i class="bi bi-calendar-check" style="font-size:2.2rem; color:#2c2c2c;"></i>
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Years of Excellence</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Team -->
    <div class="container mb-5 pb-3">
        <div class="text-center mb-5">
            <span class="section-label">The People Behind The Magic</span>
            <h2 class="fw-bold h-font mt-2">Management Team</h2>
            <div class="gold-divider mt-3"></div>
        </div>

        <div class="swiper mySwiper px-2">
            <div class="swiper-wrapper pb-2">

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card-img">
                            <i class="bi bi-person-circle" style="font-size:80px; color:#ccc;"></i>
                        </div>
                        <div class="team-card-body">
                            <div class="team-name">Ngô Văn Cường</div>
                            <div class="team-role">Chairman & CEO</div>
                            <p class="team-bio">Định hướng chiến lược và phát triển bền vững của TJ Hotel trong hơn 15 năm.</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card-img">
                            <i class="bi bi-person-circle" style="font-size:80px; color:#ccc;"></i>
                        </div>
                        <div class="team-card-body">
                            <div class="team-name">Trần Thị Mai</div>
                            <div class="team-role">General Manager</div>
                            <p class="team-bio">Quản lý toàn bộ hoạt động vận hành và đảm bảo chất lượng dịch vụ.</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card-img">
                            <i class="bi bi-person-circle" style="font-size:80px; color:#ccc;"></i>
                        </div>
                        <div class="team-card-body">
                            <div class="team-name">Lê Hoàng Nam</div>
                            <div class="team-role">Head of F&B</div>
                            <p class="team-bio">Chịu trách nhiệm về ẩm thực và trải nghiệm dining đẳng cấp tại khách sạn.</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card-img">
                            <i class="bi bi-person-circle" style="font-size:80px; color:#ccc;"></i>
                        </div>
                        <div class="team-card-body">
                            <div class="team-name">Phạm Thị Lan</div>
                            <div class="team-role">Marketing Director</div>
                            <p class="team-bio">Xây dựng thương hiệu TJ Hotel và chiến lược truyền thông hiệu quả.</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card-img">
                            <i class="bi bi-person-circle" style="font-size:80px; color:#ccc;"></i>
                        </div>
                        <div class="team-card-body">
                            <div class="team-name">Nguyễn Minh Tú</div>
                            <div class="team-role">Head of Hospitality</div>
                            <p class="team-bio">Đảm bảo mọi khách hàng đều có trải nghiệm lưu trú tuyệt vời nhất.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 24,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                992: { slidesPerView: 3 },
            }
        });
    </script>

</body>
</html>