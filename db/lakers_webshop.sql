-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 10:49 PM
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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Elias Sidelil', 'eliashgiorgis@gmail.com', '123456', 'elias.jpg', 'Germany', 'Hmmm...There is nothing to say about the admin!', '+490000001', 'Web developer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(2, 'test customer 2', 'test2@gmail.com', '789456', 'Germany', 'kiel', '0000000002', 'abcdefgh str 2', 'test2.png', '::1'),
(3, 'test customer 1', 'test1@gmail.com', '123456', 'Germany', 'kiel', '0000000001', 'abcdef, Projensdorfer str. 20', 'test1.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `customer_id`, `product_name`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(1, 2, 'Hoodie Lakers', 70, 1620488625, 1, '2019-05-25', 'pending'),
(2, 3, 'James Jersey', 70, 1363469595, 1, '2019-05-25', 'pending'),
(3, 3, 'Hoodie Lakers', 70, 1501684179, 1, '2019-05-25', 'Complete'),
(4, 3, 'James Jersey', 70, 163151135, 1, '2019-05-25', 'pending'),
(5, 3, 'James Jersey', 70, 2016812568, 1, '2019-05-25', 'pending'),
(6, 3, 'James Jersey', 70, 1061926060, 1, '2019-05-25', 'pending'),
(7, 3, 'Hoodie Lakers', 70, 231217560, 1, '2019-05-25', 'pending'),
(8, 2, 'LA Cap', 70, 814930494, 2, '2019-05-26', 'pending'),
(9, 2, 'Short lakers', 65, 677317229, 1, '2019-05-26', 'pending'),
(10, 2, 'Lakers Fans T-Shirt', 99, 365185719, 3, '2019-05-26', 'pending'),
(11, 2, 'LA Cap', 35, 1613663179, 1, '2019-05-26', 'pending'),
(12, 2, 'Lakers Backpack ', 87, 1627653139, 3, '2019-05-26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(1, 603214888, 70, 'Direct Debits', 123, '23/05/2019'),
(2, 1361575390, 130, 'Post Office Services', 456123, '23/05/2019'),
(3, 1111, 1111, 'Direct Debits', 1111, '23/05/2019'),
(4, 146914503, 35, 'Direct Debits', 41717, '25/05/2019'),
(5, 1501684179, 70, 'Post Office Services', 147, '26/05/2019');

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
(1, 'Lakers Fans T-Shirt', 't-shirt-1.jpg', 't-shirt-2.jpg', 't-shirt-3.jpg', 37, 23, 'Original lakers fan T-Shirt.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestasa.                              \r\n                                                        \r\n                                                        \r\n                                                        \r\n                          '),
(2, 'LeBron Socks', 'sock-1.jpg', 'sock-2.jpg', 'sock-3.jpg', 27, 10, 'Stance Basketball Legends socks by LeBron James at the Los Angeles Lakers in the Big Head Desgin.'),
(3, 'Lakers Basketball', 'basketball-1.jpg', 'basketball-2.jpg', '', 30, 50, 'Spalding Los Angeles Lakers Team Logo Basketball in size 7.'),
(4, 'Lakers Backpack ', 'bag-1.jpg', '', '', 29, 15, 'Completely black Forever Collectibles basketball backpack with the LA Lakers logo .'),
(5, 'LA Cap', 'cap-1.jpg', 'cap-2.jpg', 'cap-3.jpg', 35, 20, 'New Era NBA Authentics 9FIFTY Snapback Cap from your Los Angeles Lakers from the 2019 Back Half Series Collection.'),
(6, 'Short lakers', 'short-1.jpg', 'short-2.jpg', 'short-3.jpg', 65, 40, 'Nike NBA Youth Basketball Swingman Shorts from your Los Angeles Lakers for older kids and teenagers . Icon Edition.'),
(7, 'Hoodie Lakers', 'hoodie-1.jpg', 'hoodie-2.jpg', 'hoodie-3.jpg', 70, 15, 'Nike NBA Men\'s Basketball Hoodie from your Los Angeles Lakers in the brand new Crest Logo Style. Your NBA Go-To Fleece!'),
(9, 'James Jersey', 'jersey-1.jpg', 'jersey-2.jpg', 'jersey-3.jpg', 45, 50, 'Represent the favorite team the best way with the Nike LeBron James Icon Edition Swingman Jersey from the Los Angeles Lakers!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
