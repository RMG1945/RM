-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 07:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it48`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `depart_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `created_at`) VALUES
(1, 'apple.png', 'Apple', 'Fresh red apple', 50.00, '2025-07-16 13:35:36'),
(4, 'banana.png', 'Banana', 'สีเหลือง Yellow', 20.00, '2025-07-16 14:16:25'),
(5, 'grapes.png', 'Grape', 'ไม่มีเมล็ด', 100.00, '2025-07-16 14:22:07'),
(6, 'mango.png', 'Mango', 'มะม่วง มองมากเดี๋ยวก็ล่วง', 30.00, '2025-07-16 14:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `created_at`, `role`, `profile_image`) VALUES
(1, 'B1', 'Banana1', 'Patyae', '09822929298', 'chanon223@nc.ac.th', '$2y$10$1Yv/t/q6FBFfVi6JeYPG/uW6td4SEsMb1w4BNAwjAv2wIdaI8xsR6', '2025-06-17 07:59:00', 'customer', 'mark.jpg'),
(2, 'ชานนท์', 'ปฏิพิมพาคม', 'fffffffffff', '09999999', 'chanon.white.20@gmail.com', '$2y$10$V.zJlxWzGJt0MfmhWd1FfOUfW.taUXunZXKKarfRD1ZUbiDXD3cRu', '2025-06-17 09:00:59', 'customer', NULL),
(3, 'ชานนท์', 'ปฏิพิมพาคม', 'นครปฐม', '09999999', 'channon@nc.ac.th', '$2y$10$NSKu/jnC3avXlyq7JEa6sOej181Go4oKO4T9rCGd9vrQxn68qiJo.', '2025-06-18 06:31:24', 'customer', NULL),
(4, 'ชานนท์', 'ปฏิพิมพาคม', '', '09999999', 'cha111@nc.ac.th', '$2y$10$PcspuN3yeV7Ot4Ul7t3Cg..MzeShIoHrgSty9WPtfAKabAb9KptVy', '2025-06-23 08:18:27', 'admin', NULL),
(5, 'Mark', 'Chanon', 'F', '09999999', 'chanon111@nc.ac.th', '$2y$10$QGRVnC67bn/m5WfIingz/uZPmR1rUTXBHkgpCuarQ785id/i0TrMy', '2025-06-30 06:55:21', 'customer', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
