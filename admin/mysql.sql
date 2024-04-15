SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";

CREATE TABLE `users` (
  `user_id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `phone_number` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL, -- bcrypt hash
  `token` VARCHAR(255),
  `expired_token` DATETIME,
  `is_verified` BOOLEAN NOT NULL DEFAULT FALSE,
  `status` BOOLEAN NOT NULL DEFAULT TRUE,
  `registration_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `email` VARCHAR(150) NOT NULL,
  `profile_pic` VARCHAR(100),
  `address` VARCHAR(255),
  `role` ENUM('admin', 'staff', 'customer') NOT NULL DEFAULT 'customer',
  `removed` BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `rooms` (
  `room_id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `area` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `room_total` INT NOT NULL,
  `adult_capacity` INT NOT NULL,
  `children_capacity` INT NOT NULL,
  `description` TEXT,
  `removed` BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `room_status` (
  `status_id` INT AUTO_INCREMENT PRIMARY KEY,
  `room_id` INT NOT NULL,
  `status` ENUM('Có sẵn', 'Đang sửa chữa', 'Đã đặt') NOT NULL,
  `quantity` INT NOT NULL,
  FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `room_images` (
  `image_id` INT AUTO_INCREMENT PRIMARY KEY,
  `room_id` INT NOT NULL,
  `image_url` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `facilities` (
  `facility_id` INT AUTO_INCREMENT PRIMARY KEY,
  `icon` VARCHAR(50),
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `room_facilities` (
  `room_id` INT NOT NULL,
  `facility_id` INT NOT NULL,
  PRIMARY KEY (`room_id`, `facility_id`),
  FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE,
  FOREIGN KEY (`facility_id`) REFERENCES `facilities`(`facility_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `booking_order` (
  `booking_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `room_id` INT NOT NULL,
  `check_in_date` DATE NOT NULL,
  `check_out_date` DATE NOT NULL,
  `arrival_time` TIME,
  `departure_time` TIME,
  `refund` DECIMAL(10, 2),
  `booking_status` VARCHAR(100) DEFAULT 'pending',
  `order_id` VARCHAR(150) NOT NULL,
  `transaction_id` VARCHAR(200),
  `transaction_amount` DECIMAL(10, 2) NOT NULL,
  `transaction_status` VARCHAR(100) DEFAULT 'pending',
  `transaction_response_message` TEXT,
  `booking_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`),
  FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_queries` (
  `query_id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `message` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

INSERT INTO `users` (`name`, `phone_number`, `password`, `is_verified`, `email`, `is_admin`) VALUES 
('hoangdieu', '0387367162', '$2y$10$9ZndG0YCMkJCAbTfJi5HXuGuVvVbS9XdGzELT25qadJlSwySYY3Eu', TRUE, 'hoangdieu2202002@gmail.com', TRUE), 
('lananh', '0387367163', '$2y$10$FUv8g9xtPj9DSPA/jgOBM.m1Vsx0zLUEybXMjeOa3nW53cu3RczbC', TRUE, 'sunhim2k3@gmail.com', TRUE);

INSERT INTO `facilities` (`icon`, `name`, `description`) VALUES
('wifi_icon.png', 'WiFi miễn phí', 'Cung cấp kết nối internet không dây cho khách.'),
('ac_icon.png', 'Máy lạnh', 'Có sẵn trong mỗi phòng.'),
('kitchen_icon.png', 'Bếp', 'Bếp riêng trong phòng hoặc khu vực bếp chung.'),
('tv_icon.png', 'Tivi', 'Có sẵn trong phòng.'),
('pool_icon.png', 'Bể bơi', 'Bể bơi ngoại trời hoặc trong nhà.'),
('parking_icon.png', 'Chỗ đậu xe', 'Dành cho khách lưu trú có xe cộ.'),
('desk_icon.png', 'Bàn làm việc', 'Dành cho khách cần làm việc trong phòng.'),
('wardrobe_icon.png', 'Tủ quần áo', 'Đủ lớn để chứa đồ đạc của khách.'),
('hair_dryer_icon.png', 'Máy sấy tóc', 'Cung cấp trong phòng tắm.'),
('safe_icon.png', 'Két an toàn', 'Để khách có thể lưu trữ tài sản giá trị.'),
('room_service_icon.png', 'Dịch vụ phòng', 'Cung cấp ăn uống và các yêu cầu khác ngay tại phòng.'),
('cleaning_icon.png', 'Dọn dẹp hàng ngày', 'Dịch vụ vệ sinh phòng hàng ngày.'),
('laundry_icon.png', 'Giặt ủi', 'Dịch vụ giặt là cho quần áo của khách.'),
('crib_icon.png', 'Giường cũi cho bé', 'Dành cho gia đình có trẻ nhỏ.'),
('playground_icon.png', 'Khu vui chơi cho trẻ em', 'Trong khuôn viên hoặc gần homestay.'),
('security_cam_icon.png', 'Camera an ninh', 'Ở khu vực chung và xung quanh homestay.'),
('guard_icon.png', 'Bảo vệ 24/7', 'Đảm bảo an ninh cho khách và tài sản.'),
('gym_icon.png', 'Gym', 'Phòng tập thể dục trong khuôn viên.'),
('spa_icon.png', 'Spa và wellness center', 'Dịch vụ massage và chăm sóc sức khỏe.');
