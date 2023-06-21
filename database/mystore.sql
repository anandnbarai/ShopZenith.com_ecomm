-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 05:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'hp'),
(2, 'Dell'),
(3, 'Apple'),
(4, 'Nikon'),
(8, 'Samsung'),
(9, 'OnePlus'),
(10, 'MSI'),
(11, 'MI'),
(12, 'Asus'),
(13, 'boAt'),
(15, 'dji');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(15, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Mobile Phone'),
(2, 'Laptop'),
(3, 'Camera'),
(4, 'Headphones'),
(8, 'Camera Accessories'),
(9, 'Earphones'),
(10, 'Laptop Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(6, 'Apple 14 Pro 256GB', 'Some quick example text to build on the card title and make up the bulk of the cards content.\r\n\r\n', 'Apple, iPhone', 1, 3, 'MQ023HN_A.webp', 'MQ023HN_A.webp', 'OnePlus-11-Pro-600x600.jpg', '109990', '2023-06-19 06:47:06', '1'),
(7, 'Nikon D5600', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Nikon', 3, 4, '1.png', 'png-transparent-nikon-d5600-nikon-d5500-digital-slr-nikon-dx-format-camera-nikon-lens-camera-lens-photography-thumbnail.png', 'png-transparent-nikon-d5600-nikon-d5500-digital-slr-nikon-dx-format-camera-nikon-lens-camera-lens-photography-thumbnail.png', '54990', '2023-06-19 06:47:23', '1'),
(8, 'OnePlus 11 Pro', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'OnePlus', 1, 9, 'OnePlus-11-Pro-600x600.jpg', 'OnePlus-11-Pro-600x600.jpg', 'OnePlus-11-Pro-600x600.jpg', '54999', '2023-06-16 04:52:01', '1'),
(9, 'HP ', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'hp', 2, 1, 'product01.png', 'product01.png', 'product01.png', '61999', '2023-06-19 06:47:36', '1'),
(10, 'MSI', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Asus, MSI', 2, 10, 'product06.png', 'product06.png', 'product06.png', '84999', '2023-06-19 08:17:47', '1'),
(11, 'Samsung Galaxy S23', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Samsung', 1, 8, 'Samsung-Galaxy-S23-Ultra_Yoast-image-packshot-review.jpg', 'Samsung-Galaxy-S23-Ultra_Yoast-image-packshot-review.jpg', 'Samsung-Galaxy-S23-Ultra_Yoast-image-packshot-review.jpg', '119999', '2023-06-19 06:47:56', '1'),
(12, 'boAt Rockerz 510', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Headphone, boAt', 4, 13, '5d5377dc-d3dd-48ba-8ec9-2a1630146d8d_600x.webp', '5d5377dc-d3dd-48ba-8ec9-2a1630146d8d_600x.webp', '5d5377dc-d3dd-48ba-8ec9-2a1630146d8d_600x.webp', '1599', '2023-06-19 06:48:38', '1'),
(13, 'boAt Rockerz 255 Pro+', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Earphone, boAt', 9, 13, '93b827fc-0108-4e8b-9ea9-e66fb1e7a362_600x.webp', '93b827fc-0108-4e8b-9ea9-e66fb1e7a362_600x.webp', '93b827fc-0108-4e8b-9ea9-e66fb1e7a362_600x.webp', '1099', '2023-06-19 06:48:20', '1'),
(15, 'dji Ronin-SC 3 Axis Gimbal', 'Some quick example text to build on the card title and make up the bulk of the cards content.', 'Camera Accessories, dji', 8, 15, '-original-imagnyyzadfmj3qf.webp', '-original-imagnyyzadfmj3qf.webp', '-original-imagnyyzadfmj3qf.webp', '24999', '2023-06-19 06:48:48', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
