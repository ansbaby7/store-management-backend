-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 03:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `S_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`_id`, `username`, `email`, `hashed_password`, `fname`, `lname`, `mobile`, `city`, `state`, `pincode`) VALUES
(7, 'ans7', 'ans@admin.com', '$2a$10$HRZjwJM48CXiU8EujJOfeuqF/svFkC3GB2WeZkLfDNrjkGhHf0dyu', 'Ans', 'Baby', '88886666', 'Kottayam', 'Kerala', '686576'),
(8, 'nihale', 'nihal@nihal.com', '$2a$10$Er.UvTY38dAWfN87vYW.Yu.fZ5WwpX5YFNN3sOm6RI9UO18xOT1RC', 'Nihal', 'E', '77777777', 'somecity', 'somestate', '484848');

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`_id`, `username`, `email`, `hashed_password`, `fname`, `lname`, `mobile`, `city`, `state`, `pincode`) VALUES
(7, 'ans7', 'ans@admin.com', '$2a$10$HRZjwJM48CXiU8EujJOfeuqF/svFkC3GB2WeZkLfDNrjkGhHf0dyu', 'Ans', 'Baby', '88886666', 'Kottayam', 'Kerala', '686576'),
(2, 'ansbaby7', 'ans@ans.com', '$2a$10$3eJSlnEficfNfn9qRT9oJOfjXsZj0kvqZlyVSrNp5p8Pgod2Sb6BW', 'Ans', 'Baby', '88888888', 'Kottayam', 'Kerala', '686576'),
(8, 'nihale', 'nihal@nihal.com', '$2a$10$Er.UvTY38dAWfN87vYW.Yu.fZ5WwpX5YFNN3sOm6RI9UO18xOT1RC', 'Nihal', 'E', '77777777', 'somecity', 'somestate', '484848'),
(4, 'yadunandan', 'yadu@yadu.com', '$2a$10$Er.UvTY38dAWfN87vYW.Yu.fZ5WwpX5YFNN3sOm6RI9UO18xOT1RC', 'Yadunandan', '.', '66666666', 'Palakkad', 'Kerala', '666666');

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`_id`, `customer_id`, `total`, `date`, `time`) VALUES
(12, 2, '24704.300', '2022-11-14', '01:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_ITEM`
--

CREATE TABLE `ORDER_ITEM` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ORDER_ITEM`
--

INSERT INTO `ORDER_ITEM` (`order_id`, `product_id`, `product_quantity`) VALUES
(12, 10, 1),
(12, 14, 1),
(12, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`product_id`, `product_name`, `price`, `stock`, `brand`, `category`, `image`, `description`) VALUES
(8, 'Mask - Sea Blue', '223.00', 30, 'Xator Combat', 'Face Mask', '/images/mask_sea_blue.jpeg', 'Xator Combat face protection mask. Sea blue colour. Universal fit.'),
(9, 'Mask - Red Black', '223.00', 32, 'Xator Combat', 'Face Mask', '/images/mask_red_black.jpg', 'Xator Combat face protection mask. Red-black claw design. Universal fit.'),
(10, 'Mask - X8', '223.00', 30, 'Xator Combat', 'Face Mask', '/images/mask_x8.jpg', 'Xator Combat face protection mask. X8 model. Universal fit.'),
(11, 'Rain Cover - Rudra', '320.00', 24, 'Gods Rudra', 'Bag Cover', '/images/rain_cover_rudra.jpg', 'High quality waterproof bag covers made for Gods Rudra and 20L backpacks.'),
(12, 'Covid Cape - Rain co', '400.00', 23, 'Gods Rudra', 'Bag Cover', '/images/covid_cape.jpg', 'Rain cover with virus shield - the new Covid cape.'),
(13, 'Aguante Men\'s T-shir', '594.00', 20, 'Aguante', 'T-shirt', '/images/mens_tshirt_black.jpg', 'Modern fit round neck t-shirt for men from Aguante.'),
(14, 'Headset - Luxe Air', '699.00', 18, 'Luxe Air', 'Audio', '/images/headset_red.jpg', 'Red coloured standard headset from Luxe Air'),
(15, 'JBL Infinity Clubz', '4419.00', 15, 'JBL', 'Audio', '/images/speaker.jpg', 'High quality speaker from JBL with Dual EQ.'),
(16, 'Laptop backpack', '2922.00', 30, 'Ghost Vincent', 'Backpack', '/images/backpack.jpg', 'Ghost Vincent designed anti-theft laptop backpack.'),
(17, 'Vivo Y75 5G (8+128)', '20560.00', 10, 'Vivo', 'Mobile', '/images/phone.jpg', 'Vivo Y75 (8GB RAM + 128GB ROM)'),
(18, 'GoPro Hero10 Black', '38554.00', 8, 'GoPro', 'Camera', '/images/camera.jpg', 'GoPro Hero10 Black edition with GP2 processor.'),
(19, 'Yanaha YH-E700A Head', '19656.00', 34, 'Yamaha', 'Audio', '/images/headset.jpg', 'Yamaha noise-cancelling wireless headphones. Model no YH-E700A'),
(20, 'Fire-Boltt Ring', '2303.00', 18, 'Fire Boltt', 'Watch', '/images/watch.png', 'Fire Boltt smart watch with bluetooth functionalities and 24x7 heart rate sensor.'),
(21, 'Trusense Smart TV', '10999.00', 19, 'Trusense', 'Television', '/images/tv.jpg', 'FHD Trusense 32inch smart android televison with 2 years warranty.'),
(22, 'Red Bull 250ml x6', '599.00', 40, 'Red Bull', 'Food', '/images/drink.jpg', 'Red Bull energy drink of 250ml (pack of 6).'),
(23, 'Weber Charcoal Grill', '6746.00', 12, 'Smokey Joe Premium', 'Home', '/images/grill.jpg', 'Smokey Joe premium weber grill, perfect for travelling.'),
(24, 'TagZ chips x8', '429.00', 22, 'TagZ', 'Food', '/images/snacks.jpg', 'TagZ popped potato chips with combo of 8'),
(25, 'Lasko Air Purifier', '9999.00', 12, 'Lasko', 'Home', '/images/conditioner.jpg', 'Lasko electrostatic air purifier A554IN (medium-large room). Zero maintenance.');

-- --------------------------------------------------------

--
-- Table structure for table `SHIPPING_DETAIL`
--

CREATE TABLE `SHIPPING_DETAIL` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SHIPPING_DETAIL`
--

INSERT INTO `SHIPPING_DETAIL` (`shipping_id`, `order_id`, `full_name`, `street`, `city`, `state`, `pincode`) VALUES
(7, 12, 'Ans Baby', 'Shalom', 'Hyderabad', 'Telengana', 'pincode');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `_id` (`_id`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`_id`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `ORDER_ITEM`
--
ALTER TABLE `ORDER_ITEM`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `SHIPPING_DETAIL`
--
ALTER TABLE `SHIPPING_DETAIL`
  ADD PRIMARY KEY (`shipping_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `SHIPPING_DETAIL`
--
ALTER TABLE `SHIPPING_DETAIL`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ORDER_ITEM`
--
ALTER TABLE `ORDER_ITEM`
  ADD CONSTRAINT `ORDER_ITEM_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDERS` (`_id`);

--
-- Constraints for table `SHIPPING_DETAIL`
--
ALTER TABLE `SHIPPING_DETAIL`
  ADD CONSTRAINT `SHIPPING_DETAIL_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ORDERS` (`_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
