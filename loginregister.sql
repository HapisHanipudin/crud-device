-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2023 at 09:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_device`
--

CREATE TABLE `crud_device` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keeper_id` varchar(32) NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `loker` varchar(20) DEFAULT NULL,
  `category` enum('Handphone','Laptop') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('Ada','Dipinjam') DEFAULT 'Ada',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `crud_device`
--

INSERT INTO `crud_device` (`id`, `keeper_id`, `owner`, `loker`, `category`, `status`, `created_at`, `updated_at`) VALUES
('HP6517e458749e2', '651780c858c71', 'taqi', 'M-3', 'Handphone', 'Ada', '2023-09-30 09:03:20', '2023-09-30 09:05:34'),
('HP6517e980c552f', '6517e516b393d', 'udin', 'dimanapun', 'Handphone', 'Ada', '2023-09-30 09:25:20', '2023-09-30 09:26:49'),
('HP6517eca06309f', '6517e516b393d', 'udin', 'k4', 'Handphone', 'Ada', '2023-09-30 09:38:40', '2023-09-30 09:38:40'),
('HP6517ece7f2105', '6517e516b393d', 'ada', 'adaw', 'Handphone', 'Ada', '2023-09-30 09:39:51', '2023-09-30 09:39:51'),
('LP6517e9870f54a', '6517e516b393d', 'udin', 'dimanapun', 'Laptop', 'Ada', '2023-09-30 09:25:27', '2023-09-30 09:26:52'),
('LP6517e9ebcc955', '6517e516b393d', 'siapapun', 'gatau dmn', 'Laptop', 'Ada', '2023-09-30 09:27:07', '2023-09-30 09:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(32) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
('651780c858c71', 'gtau', 'gataubg@gmail.com', '11b9ff08a285f82d5cc744a4a7abc6cd', '2023-09-30 01:58:32.364154'),
('6517e516b393d', 'udin', 'udin@gmail.com', '2fec392304a5c23ac138da22847f9b7c', '2023-09-30 09:06:30.736201'),
('6517ef1455e1a', 'Arema', 'arema@gmail.com', '3a53eae55a04ecc18560c443a5d7feef', '2023-09-30 09:49:08.352224');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_device`
--
ALTER TABLE `crud_device`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_keeper_id` (`keeper_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crud_device`
--
ALTER TABLE `crud_device`
  ADD CONSTRAINT `fk_keeper_id` FOREIGN KEY (`keeper_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
