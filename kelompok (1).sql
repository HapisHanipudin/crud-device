-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2023 at 02:56 PM
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
-- Database: `kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `post_id` varchar(20) NOT NULL,
  `owner_id` varchar(32) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_txt` varchar(4000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`post_id`, `owner_id`, `post_img`, `post_title`, `post_txt`, `date`) VALUES
('6522b4bac0a89', '652125b98f02d', '6522b4bac0a917.77465217_photo_6104750726967308979_y.jpg', 'koko ganteng', 'aaaaaaaaaaaaaa', '2023-10-08 13:55:06'),
('6522b52fa41a8', '652125b98f02d', '6522b52fa41b35.60994888_Banner(1).jpg', 'awwwwwwwwwwwwwd', 'awwwwwwwwwww', '2023-10-08 13:57:03'),
('6522b721d6d6c', '6522b6b8408d2', '6522b721d6d724.53846000_WhatsApp Image 2022-03-31 at 22.46.36.jpeg', 'model terkenal dari depok bernama hanipudin menyarankan beli pakaian bagus hanya di \"Izalin.\"', '.', '2023-10-08 14:05:21'),
('65239e4c129c6', '652125b98f02d', '65239e4c12c2e5.25045450_assimmm.jpeg', 'baim gntng banget', 'waaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-10-09 06:31:40'),
('652410c685a81', '6522b6b8408d2', '../uploads/652410c685a899.07626328_Screenshot 2022-12-01 074640.png', 'Harya: Hanya beli pakaian di Izalin saya bisa tampil keren seperti ini!', 'Harya Suryatama (Bos Sawit Depok)', '2023-10-09 14:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `product_id` varchar(40) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(1, '652125b98f02d', 'SHRT-WMN6523f70cc45d3', 1),
(2, '65210ca34e18d', 'SHRT-WMN65240413389c0', 1),
(3, '65241303e9a4f', 'SHRT-MN6523ff3ab1c5c', 1),
(4, '65241303e9a4f', 'SHRT-MN6524007b05b7e', 1),
(5, '65241303e9a4f', 'SHS-MN6524054f1f542', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(40) NOT NULL,
  `product_name1` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_name2` varchar(25) NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_category` enum('shirts-men','pants-men','shoes-men','hijab-women','shirts-women','skirts-women') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_desc` varchar(325) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name1`, `product_name2`, `product_image`, `product_category`, `product_desc`, `product_price`) VALUES
('PNT-MN652401d700c7c', 'Celana Sirwal', 'Jogger', '652401d700c7f3.60857298_sg-11134201-22100-l1jx45mrmkiv82-removebg-preview.png', 'pants-men', 'Celana Sirwal Jogger Flag By Nauhtec Original Bawahan Muslim Pria', '154900.00'),
('PNT-MN652402aeedacb', 'Celana ', 'Sarung', '652402aeedad43.70638446_bd1fd4792035b01df557431fef7dbfd5-removebg-preview.png', 'pants-men', 'Itang Yunasz Celana Sarung', '299000.00'),
('PNT-MN6524044e5ac87', 'Trousers', 'Pria', '6524044e5ac8d3.82597898_3497c516-9b62-4ede-bddb-f3727750fc83-removebg-preview.png', 'pants-men', 'Trousers Fly Ritsleting Warna Polos Pria Dengan Saku', '333000.00'),
('SHRT-MN6523ff3ab1c5c', 'Koko Kurta', 'Lengan Panjang', '6523ff3ab1c615.47636407_86167a74e6475a2bc31298d60543d586-removebg-preview.png', 'shirts-men', 'Baju Koko Pria Kurtha Lengan Panjang', '130000.00'),
('SHRT-MN6524007b05b7e', 'Koko Pria', 'Lengan Panjang', '6524007b05b811.43439323_id-11134201-23030-c0yxxhxt9hov50-removebg-preview.png', 'shirts-men', 'Baju Koko Pria Dewasa Lengan Panjang Motif nusantara', '93000.00'),
('SHRT-MN6524012d296c8', 'Kemeja Koko', 'Coklat Muda', '6524012d296cb0.46465785_id-11134207-23020-rgz2zm5qi2nv95-removebg-preview.png', 'shirts-men', 'Bastoh Kemeja Koko Bordir Pria Mikazuki Coklat Muda', '239000.00'),
('SHRT-WMN6523f70cc45d3', 'Royal', 'Shirt', '6523f70cc45d99.35430904_royal_silk_stripe-removebg-preview.png', 'shirts-women', 'Our Royal Stripe Shirt epitomizes', '125000.00'),
('SHRT-WMN65240413389c0', 'Hijab ', 'Instant', '65240413389c65.81932217_Petunia Pink.jpg', 'hijab-women', 'the hijab that is very easy to wear because it is simple', '90.00'),
('SHRT-WMN652404bfdc4ba', 'pashmina', 'hijab', '652404bfdc4bf1.32042597_Peach Bloom.jpg', 'hijab-women', 'with a unique hijab style can make you confident to look beautiful', '75.00'),
('SHRT-WMN6524050593840', 'white', 'dress', '65240505938457.76988955_download (20).jpg', 'shirts-women', ' The white dress symbolizes elegance in simplicity.', '350.00'),
('SHRT-WMN652405cd6f6da', 'royal', 'dress', '652405cd6f6e01.28941158_download__23_-removebg-preview.png', 'shirts-women', '  Our Royal dress epitomizes sophistication', '275.00'),
('SHS-MN6524054f1f542', 'Sepatu ', 'Nike', '6524054f1f5492.80307326_id-11134207-7qukw-lf4r3pv41um569-removebg-preview.png', 'shoes-men', 'Sepatu Nike Sb Nyjah Navy White Gold', '485000.00'),
('SHS-MN6524060d844d6', 'Sneakers', 'Adidas', '6524060d844db8.49798331_836bfc8931dedab715b4107caff8249c-removebg-preview.png', 'shoes-men', 'Sepatu Sneakers Casual Original Ads_GRAND_COURT WHITE BLACK', '200000.00'),
('SHS-MN65240683a7a8f', 'Sepatu ', 'Nike', '65240683a7a932.86429941_id-11134207-7qukw-lf4r3pv41um569-removebg-preview.png', 'shoes-men', 'Sepatu Nike Sb Nyjah Navy White Gold', '485000.00'),
('SHS-MN652406d99429c', 'Sepatu Running', 'Puma', '652406d9942a01.53839947_id-11134207-7qul9-lgpfa28o5ufncd-removebg-preview.png', 'shoes-men', 'PUMA ACCENT MENS RUNNING SHOES BLACK', '649000.00'),
('SKRT-WMN65240621b70c8', 'summer ', 'skirt', '65240621b70ce4.13037062_vintage summer skirt _ hijab.jpg', 'skirts-women', 'The summer skirt symbolizes elegance in simplicity.', '120.00'),
('SKRT-WMN652406539e232', 'plain ', 'skirt', '652406539e23d0.47655356_download (32).jpg', 'skirts-women', ' A plain skirt is the perfect choice for a simple yet elegant style', '115.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(32) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
('65210ca34e18d', 'gtau', 'gtau@gmail.com', '$2y$10$3tF8NeI.fgQZ9x4ki/6OAONtyT1szbwShMqSIjwoM2RPZb81WtT4a', '2023-10-07 07:45:39.368370'),
('652125b98f02d', 'udin', 'udin@gmail.com', '$2y$10$Mq5eorfBJScLohFNxFkhtuvAMpyrtdki22Yn6AMQM9M3YQmxVM4s2', '2023-10-07 09:32:41.635832'),
('6522712f25590', 'qiandra', 'qiandra.taqi@outlook.com', '$2y$10$vJJXncVT/gp2vONEhD0cgOu/B2lonAm3uy8FVpBDP2seoa1Z0ufvy', '2023-10-08 09:06:55.216280'),
('6522b6b8408d2', 'pais', 'pais@gmail.com', '$2y$10$mhGG5SOdOZRqBFT8o8N.I.MxXBrf.Yt0jWzzXm8KTNPlk.miqYiQS', '2023-10-08 14:03:36.321126'),
('65241303e9a4f', 'au', 'au@gmail.com', '$2y$10$ScNfCHXk2VjatILQxhj0s.TehpB7pEJVZEq1qwIzMGFbkrFAIbPeC', '2023-10-09 14:49:40.004635');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_user_id` (`user_id`),
  ADD KEY `FK_product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
