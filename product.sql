-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 05:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayurvedic`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_disc` char(5) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_price`, `product_disc`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 'Diabex: Ayurvedic medicine for diabetes', 'Diabex', '399.00', '5%', 'image-1.jpg', 10, '1'),
(2, 'Ayur Slim Natural Weight Loss Supplements.', 'Himalaya', '599.00', '10%', 'image-2.jpg', 10, '1'),
(3, 'Ayurvedic and Safe Stone Crush Tonic ', 'Keva-Industries Herbal', '1990.00', '10%', 'image-3.jpg', 10, '1'),
(4, 'Herbal Cure For Cancer, Ayurvedic,herbal Products & Medicine ', 'Keva-Industries Herbal', '11499.00', '5%', 'image-4.jpg', 10, '1'),
(5, 'Glohills Capsules | Skin Care Capsules | Ayurvedic Medicine', 'Himalaya', '799.00', '10%', 'image-5.jpg', 10, '1'),
(6, 'Ayurvedic Back Pain Oil, Grade Standard: Medicine Grade,', 'Keva-Industries Herbal', '1899.00', '10%', 'image-6.jpg', 10, '1'),
(7, 'Ayurvedic Medicine For Joint Pain', 'Himalaya', '799.00', '5%', 'image-7.jpg', 10, '1'),
(8, 'Aayucure Thaiambro Ayurvedic Medicine for Thyroid', 'Aayucure', '5999.00', '55%', 'image-8.jpg', 10, '1'),
(9, 'PENTACID', 'Aayucure', '240.00', '5%', 'image-9.jpg', 10, '1'),
(10, 'Aayucure 100% Natural Migroplex Tablets', 'Aayucure', '8999.00', '65%', 'image-10.jpg', 10, '1'),
(11, 'Aayucure Bepeambro Tablets (Ayurvedic Medicine For High Blood Pressure)', 'Aayucures', '999.00', '40%', 'image-12.jpg', 10, '1'),
(12, 'Ayurvedic Liver Tablets, Liver Medicines', 'Himalaya', '5999.00', '10%', 'image-12.jpg', 10, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
