-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 01:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lakers_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`p_id`, `ip_add`, `qty`) VALUES
(7, '::1', 1),
(8, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `stock`, `product_desc`) VALUES
(1, 'Lakers Fans T-Shirt', 't-shirt-1.jpg', 't-shirt-2.jpg', 't-shirt-3.jpg', 33, 15, 'Original lakers fan T-Shirt.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'),
(2, 'LeBron Socks', 'sock-1.jpg', 'sock-2.jpg', 'sock-3.jpg', 27, 10, 'Stance Basketball Legends socks by LeBron James at the Los Angeles Lakers in the Big Head Desgin.'),
(3, 'Lakers Basketball', 'basketball-1.jpg', 'basketball-2.jpg', '', 30, 50, 'Spalding Los Angeles Lakers Team Logo Basketball in size 7.'),
(4, 'Lakers Backpack ', 'bag-1.jpg', '', '', 29, 15, 'Completely black Forever Collectibles basketball backpack with the LA Lakers logo .'),
(5, 'LA Cap', 'cap-1.jpg', 'cap-2.jpg', 'cap-3.jpg', 35, 20, 'New Era NBA Authentics 9FIFTY Snapback Cap from your Los Angeles Lakers from the 2019 Back Half Series Collection.'),
(6, 'Short lakers', 'short-1.jpg', 'short-2.jpg', 'short-3.jpg', 65, 40, 'Nike NBA Youth Basketball Swingman Shorts from your Los Angeles Lakers for older kids and teenagers . Icon Edition.'),
(7, 'Hoodie Lakers', 'hoodie-1.jpg', 'hoodie-2.jpg', 'hoodie-3.jpg', 70, 15, 'Nike NBA Men\'s Basketball Hoodie from your Los Angeles Lakers in the brand new Crest Logo Style. Your NBA Go-To Fleece!'),
(8, 'James Jersey', 'jersey-1.jpg', 'jersey-2.jpg', 'jersey-3.jpg', 70, 80, 'Nike NBA Youth Basketball Swingman jersey by LeBron James , forward of the Los Angeles Lakers for older kids and teens . Icon Edition.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
