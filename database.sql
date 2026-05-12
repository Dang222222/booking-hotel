-- TJ Hotel Database Schema
-- Import vào phpMyAdmin hoặc chạy: mysql -u root -p < database.sql

CREATE DATABASE IF NOT EXISTS `HBWEBSITE` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `HBWEBSITE`;

CREATE TABLE IF NOT EXISTS `users` (
    `id`         INT(11)      NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(100) NOT NULL,
    `email`      VARCHAR(150) NOT NULL UNIQUE,
    `phone`      VARCHAR(20)  NOT NULL,
    `password`   VARCHAR(255) NOT NULL,
    `role`       ENUM('user','admin') NOT NULL DEFAULT 'user',
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `rooms` (
    `id`          INT(11)        NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(100)   NOT NULL,
    `type`        VARCHAR(50)    NOT NULL,
    `price`       DECIMAL(10,2)  NOT NULL,
    `capacity`    INT(11)        NOT NULL DEFAULT 2,
    `description` TEXT,
    `image`       VARCHAR(255),
    `status`      ENUM('available','booked','maintenance') NOT NULL DEFAULT 'available',
    `created_at`  TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bookings` (
    `id`         INT(11)   NOT NULL AUTO_INCREMENT,
    `user_id`    INT(11)   NOT NULL,
    `room_id`    INT(11)   NOT NULL,
    `checkin`    DATE      NOT NULL,
    `checkout`   DATE      NOT NULL,
    `adults`     INT(11)   NOT NULL DEFAULT 1,
    `children`   INT(11)   NOT NULL DEFAULT 0,
    `total`      DECIMAL(10,2) NOT NULL DEFAULT 0,
    `status`     ENUM('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `settings` (
    `id`    INT(11)      NOT NULL AUTO_INCREMENT,
    `name`  VARCHAR(100) NOT NULL,
    `value` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dữ liệu mẫu: rooms
INSERT INTO `rooms` (`name`, `type`, `price`, `capacity`, `description`, `image`, `status`) VALUES
('Deluxe Room',  'deluxe',   150.00, 3, 'Phòng rộng rãi với view thành phố, wifi miễn phí, điều hòa.', 'images/rooms/1.jpg', 'available'),
('Suite Room',   'suite',    250.00, 3, 'Phòng suite sang trọng với phòng khách riêng.', 'images/rooms/2.jpg', 'available'),
('Family Room',  'family',   350.00, 9, 'Phòng gia đình rộng lớn, phù hợp cho cả nhà.', 'images/rooms/3.jpg', 'available'),
('Standard Room','standard',  80.00, 2, 'Phòng tiêu chuẩn thoải mái cho lưu trú ngắn ngày.', 'images/rooms/4.jpg', 'available');

-- Dữ liệu mẫu: settings
INSERT INTO `settings` (`name`, `value`) VALUES
('hotel_name',  'TJ Hotel'),
('hotel_phone', '+84 915 565 322'),
('hotel_email', 'contact@tjhotel.vn'),
('hotel_address','FLC Sầm Sơn Resort, Thanh Hóa'),
('site_title', 'TJ Hotel'),
('site_about', 'Khách sạn TJ Hotel mang đến trải nghiệm lưu trú sang trọng tại Việt Nam.');
