-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2023 at 02:35 PM
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
('SHRT-WMN6523a7586c086', 'Royal', 'Shirt', '6523a7586c08b7.69518893_royal_silk_stripe-removebg-preview.png', 'shirts-women', 'Our Royal Stripe Shirt epitomizes', '125000.00'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
