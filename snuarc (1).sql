-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 11:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snuarc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(30) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'vipul', 'charugundlavipul@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `booked_on` datetime NOT NULL DEFAULT current_timestamp(),
  `booking_date` varchar(30) NOT NULL,
  `from_time` int(2) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `room_id`, `booked_on`, `booking_date`, `from_time`, `price`) VALUES
(1, 6, 'A231', '2022-04-25 15:47:00', '04/28/2022', 6, 200),
(2, 6, 'B315', '2022-04-25 16:11:57', '04/25/2022', 7, 100),
(3, 6, 'C013', '2022-04-25 16:42:27', '', 9, 100),
(4, 6, 'C013', '2022-05-01 01:07:27', '05/03/2022', 7, 100);

-- --------------------------------------------------------

--
-- Table structure for table `clubrooms`
--

CREATE TABLE `clubrooms` (
  `s_no` int(10) NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `block` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'available',
  `capacity` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubrooms`
--

INSERT INTO `clubrooms` (`s_no`, `room_id`, `block`, `type`, `capacity`, `price`, `image`, `size`) VALUES
(10, 'A231', 'A', 'available', 230, 200, './assets/img/products/verylargeclass.jpg', 'VeryLarge'),
(6, 'B016', 'B', 'available', 120, 0, 'assets/img/products/largeclass.jpg', 'Large'),
(1, 'B315', 'B', 'available', 350, 100, 'assets/img/products/verylargeclass.jpg', 'VeryLarge'),
(7, 'C013', 'C', 'available', 100, 100, 'assets/img/products/largeclass.jpg', 'Large'),
(8, 'C016', 'C', 'unavailable', 30, 0, 'assets/img/products/smallclass.png', 'Small'),
(11, 'C309', 'C', 'available', 120, 100, './assets/img/products/mediumclass.jpg', 'Large'),
(9, 'D117', 'D', 'available', 170, 120, 'assets/img/products/largeclass.jpg', 'Large'),
(2, 'D313', 'D', 'available', 50, 200, 'assets/img/products/largeclass.jpg', 'Large'),
(3, 'D317', 'D', 'available', 30, 150, 'assets/img/products/mediumclass.jpg', 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `s_no` int(30) NOT NULL,
  `pass_code` varchar(30) NOT NULL,
  `u_id` int(30) NOT NULL,
  `security_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ph_number` varchar(10) NOT NULL,
  `purpose` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `approval_status` varchar(30) NOT NULL DEFAULT 'unapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gatepass`
--

INSERT INTO `gatepass` (`s_no`, `pass_code`, `u_id`, `security_id`, `name`, `ph_number`, `purpose`, `date`, `approval_status`) VALUES
(40, '3VWW4W9S', 6, 1, 'Amogh', '9014697742', 'Delivery', '2022-04-20 23:38:35', 'approved'),
(43, '3M35I1XN', 6, 1, 'Swiggy', '', 'Food Delivery', '2022-04-21 00:22:36', 'approved'),
(44, 'TKFW75NP', 6, 1, 'zomato', '9192939495', 'food delivery', '2022-04-21 01:20:55', 'approved'),
(63, '2JE8B5TW', 6, 0, 'Amogh', '9014697742', 'delivery', '2022-04-25 16:02:43', 'unapproved'),
(64, 'FW0LME9Y', 6, 0, 'Swiggy', '9898989898', 'delivery', '2022-04-25 16:37:41', 'unapproved'),
(65, 'HUDAWPL9', 6, 1, 'Swiggy', '1234567890', 'delivery', '2022-05-01 01:05:26', 'approved'),
(66, 'HMYI4D04', 6, 0, 'zomato', '1234567890', 'delivery', '2022-05-01 01:09:32', 'unapproved');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `s_no` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` varchar(30) NOT NULL,
  `amount` int(30) NOT NULL DEFAULT 0,
  `reason` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`s_no`, `user_id`, `seller_id`, `amount`, `reason`, `date`) VALUES
(2, 6, 'naveen', 30, 'coffee', '2022-04-23 14:41:33'),
(3, 6, 'naveen', 40, 'bournvita', '2022-04-23 14:52:07'),
(4, 6, 'naveen', 234, 'chai', '2022-04-23 14:52:52'),
(6, 6, 'naveen', 30, 'coffee', '2022-04-25 15:12:56'),
(7, 6, 'naveen', 100, 'coffee', '2022-04-25 15:22:50'),
(8, 6, 'admin', 30, 'coffee', '2022-04-25 15:25:52'),
(9, 6, 'naveen', 40, 'coffee', '2022-04-25 15:26:19'),
(10, 6, 'admin', 40, 'coffee', '2022-04-25 15:29:39'),
(11, 6, 'naveen', 40, 'coffee', '2022-04-25 15:30:44'),
(12, 6, 'naveen', 40, 'coffee', '2022-04-25 15:31:57'),
(13, 6, 'naveen', 40, 'coffee', '2022-04-25 16:05:40'),
(17, 6, 'naveen', 50, 'chai', '2022-04-25 16:09:27'),
(19, 6, 'naveen', 40, 'coffee', '2022-04-25 16:10:46'),
(20, 6, 'naveen', 50, 'coffee', '2022-04-25 16:43:01'),
(21, 6, 'naveen', 30, 'bournvita', '2022-05-01 01:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `sec_id` int(11) NOT NULL,
  `security_name` varchar(100) NOT NULL,
  `security_email` varchar(225) CHARACTER SET macce COLLATE macce_general_nopad_ci NOT NULL,
  `security_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`sec_id`, `security_name`, `security_email`, `security_password`) VALUES
(1, 'Amogh Security', 'amoghsec@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(30) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `wallet` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `password`, `wallet`) VALUES
(4, 'admin', 'admin', 780),
(1, 'naveen', '12345', 0),
(2, 'nescafe', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(30) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `shop_password` varchar(100) NOT NULL,
  `shop_email` varchar(30) NOT NULL,
  `shop_wallet` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shop_name`, `shop_password`, `shop_email`, `shop_wallet`) VALUES
(3, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 1630),
(5, 'annas', '827ccb0eea8a706c4c34a16891f84e7b', 'anna@gmail.com', 1040),
(2, 'naveen', '827ccb0eea8a706c4c34a16891f84e7b', 'naveen@gmail.com', 200);

-- --------------------------------------------------------

--
-- Table structure for table `sportsvenue`
--

CREATE TABLE `sportsvenue` (
  `s_no` int(10) NOT NULL,
  `venue_id` varchar(20) NOT NULL,
  `sport` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  `price` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sportsvenue`
--

INSERT INTO `sportsvenue` (`s_no`, `venue_id`, `sport`, `status`, `price`, `image`, `type`) VALUES
(22, 'badminton_1', 'Badminton', 'available', 0, 'assets/img/products/badminton.jpg', 'unpaid'),
(23, 'badminton_2', 'Badminton', 'unavailable', 0, 'assets/img/products/badminton.jpg', 'unpaid'),
(24, 'badminton_3', 'Badminton', 'available', 0, 'assets/img/products/badminton.jpg', 'unpaid'),
(25, 'badminton_4', 'Badminton', 'available', 100, 'assets/img/products/badminton.jpg', 'paid'),
(6, 'basketball_1', 'Basketball', 'available', 0, 'assets/img/products/basketball.jpg', 'unpaid'),
(8, 'basketball_2', 'Basketball', 'available', 0, 'assets/img/products/basketball.jpg', 'unpaid'),
(9, 'basketball_3', 'Basketball', 'available', 30, 'assets/img/products/basketball.jpg', 'paid'),
(7, 'basketball_4', 'Basketball', 'available', 0, 'assets/img/products/basketball.jpg', 'unpaid'),
(1, 'cricket_1', 'Cricket', 'unavailable', 0, 'assets/img/products/cricket.png', 'unpaid'),
(2, 'cricket_2', 'Cricket', 'available', 0, 'assets/img/products/cricket.png', 'unpaid'),
(3, 'cricket_3', 'Cricket', 'available', 0, 'assets/img/products/cricket.png', 'unpaid'),
(4, 'cricket_4', 'Cricket', 'available', 0, 'assets/img/products/cricket.png', 'unpaid'),
(5, 'cricket_5', 'Cricket', 'available', 100, 'assets/img/products/cricket.png', 'paid'),
(10, 'football_1', 'Football', 'available', 0, 'assets/img/products/football.jpg', 'unpaid'),
(11, 'football_2', 'Football', 'unavailable', 0, 'assets/img/products/football.jpg', 'unpaid'),
(17, 'tabletennis_1', 'TableTennis', 'available', 0, 'assets/img/products/tt.png', 'unpaid'),
(18, 'tabletennis_2', 'TableTennis', 'unavailable', 0, 'assets/img/products/tt.png', 'unpaid'),
(19, 'tabletennis_3', 'TableTennis', 'available', 0, 'assets/img/products/tt.png', 'unpaid'),
(20, 'tabletennis_4', 'TableTennis', 'unavailable', 0, 'assets/img/products/tt.png', 'unpaid'),
(21, 'tabletennis_5', 'TableTennis', 'available', 20, 'assets/img/products/tt.png', 'paid'),
(12, 'tennis_1', 'Tennis', 'available', 0, 'assets/img/products/tennis.png', 'unpaid'),
(13, 'tennis_2', 'Tennis', 'available', 0, 'assets/img/products/tennis.png', 'unpaid'),
(14, 'tennis_3', 'Tennis', 'unavailable', 0, 'assets/img/products/tennis.png', 'unpaid'),
(15, 'tennis_4', 'Tennis', 'available', 0, 'assets/img/products/tennis.png', 'unpaid'),
(16, 'tennis_5', 'Tennis', 'available', 30, 'assets/img/products/tennis.png', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `user_due` int(10) NOT NULL DEFAULT 0,
  `user_limit` int(10) NOT NULL DEFAULT 5000,
  `email` varchar(40) NOT NULL,
  `user_status` varchar(30) NOT NULL DEFAULT 'unblocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phonenumber`, `user_due`, `user_limit`, `email`, `user_status`) VALUES
(6, 'Amogh', '827ccb0eea8a706c4c34a16891f84e7b', '7780526503', 200, 4800, 'amogh@gmail.com', 'unblocked'),
(7, 'vipul', '827ccb0eea8a706c4c34a16891f84e7b', '7780526503', 0, 5000, 'charugundlavipul@gmail.com', 'unblocked');

-- --------------------------------------------------------

--
-- Table structure for table `venue_bookings`
--

CREATE TABLE `venue_bookings` (
  `booking_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `venue_id` varchar(20) NOT NULL,
  `booked_on` datetime NOT NULL DEFAULT current_timestamp(),
  `booking_date` varchar(30) NOT NULL,
  `from_time` int(2) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue_bookings`
--

INSERT INTO `venue_bookings` (`booking_id`, `user_id`, `venue_id`, `booked_on`, `booking_date`, `from_time`, `price`) VALUES
(1, 6, 'badminton_4', '2022-04-25 15:46:29', '04/27/2022', 7, 100),
(2, 6, 'badminton_4', '2022-04-25 16:11:30', '04/25/2022', 7, 100),
(3, 6, 'badminton_4', '2022-04-25 16:39:59', '04/25/2022', 8, 100),
(4, 6, 'badminton_4', '2022-04-25 16:51:33', '04/27/2022', 8, 100),
(5, 6, 'badminton_4', '2022-05-01 01:06:45', '05/02/2022', 8, 100),
(6, 6, 'badminton_4', '2022-05-17 14:14:55', '05/19/2022', 6, 100),
(7, 6, 'badminton_4', '2022-05-17 14:15:14', '05/17/2022', 7, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `us_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `clubrooms`
--
ALTER TABLE `clubrooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `s_no` (`s_no`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `user_id` (`u_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `u_id` (`user_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_name`),
  ADD UNIQUE KEY `s_no` (`shop_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_name`),
  ADD UNIQUE KEY `shop_id` (`shop_id`);

--
-- Indexes for table `sportsvenue`
--
ALTER TABLE `sportsvenue`
  ADD PRIMARY KEY (`venue_id`),
  ADD UNIQUE KEY `s_no` (`s_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `venue_bookings`
--
ALTER TABLE `venue_bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `use_id` (`user_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clubrooms`
--
ALTER TABLE `clubrooms`
  MODIFY `s_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gatepass`
--
ALTER TABLE `gatepass`
  MODIFY `s_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `s_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sportsvenue`
--
ALTER TABLE `sportsvenue`
  MODIFY `s_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `venue_bookings`
--
ALTER TABLE `venue_bookings`
  MODIFY `booking_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `clubrooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `seller_id` FOREIGN KEY (`seller_id`) REFERENCES `shop` (`shop_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue_bookings`
--
ALTER TABLE `venue_bookings`
  ADD CONSTRAINT `use_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venue_id` FOREIGN KEY (`venue_id`) REFERENCES `sportsvenue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
