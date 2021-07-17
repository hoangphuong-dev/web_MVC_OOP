-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 03:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_user` varchar(200) DEFAULT NULL,
  `admin_pass` varchar(100) DEFAULT NULL,
  `admin_level` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_user`, `admin_pass`, `admin_level`) VALUES
(1, 'Hoàng Phương', 'hoangphuong@gmail.com', 'hoangphuong', '202cb962ac59075b964b07152d234b70', b'0'),
(4, 'Ngọc', 'ngoc@gmail.com', 'ngoc', '202cb962ac59075b964b07152d234b70', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(16, 'Dell'),
(18, 'Asus'),
(19, 'Apple'),
(20, 'Samsung'),
(21, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(70, 'Máy tính'),
(71, 'Điện thoại'),
(72, 'Máy lạnh');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_image` varchar(255) NOT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `customer_city` varchar(200) DEFAULT NULL,
  `customer_phone` char(15) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_image`, `customer_address`, `customer_city`, `customer_phone`, `customer_email`, `customer_password`) VALUES
(3, 'Hoàng Ngọc', 'a08d72c7e1.jpg', '36 - Ninh Hiệp', 'Hà Nội', '+84869227057', 'ngoc@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'Hoàng Trọng Phương', '7a511d7578.jpg', '36 - Ninh Hiệp', 'Hà Nội', '+84869227057', 'phuong@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Mai Anh', 'e57896ccad.jpg', 'Lê Lợi , Chí Linh', 'Hải Dương', '012345678', 'maianh02@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Kim Anh', '3795e83547.jpg', '36 - Thị trấn Hà Trung', 'Thanh Hoá', '0123456789', 'kimanh@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `receiver_name` varchar(50) DEFAULT NULL,
  `receiver_address` varchar(100) DEFAULT NULL,
  `receiver_phone` char(15) DEFAULT NULL,
  `order_status` smallint(6) DEFAULT NULL,
  `order_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `admin_id`, `receiver_name`, `receiver_address`, `receiver_phone`, `order_status`, `order_time`) VALUES
(14, 3, 4, 'Hoàng Ngọc', '36 - Ninh Hiệp', '+84869227057', 2, '2021-07-07 16:06:57'),
(15, 6, 4, 'Mai Anh', 'Lê Lợi , Chí Linh - Hải Dương', '012345678', 2, '2021-07-07 21:35:44'),
(16, 4, 4, 'Hoàng Đông', 'Hà Lĩnh - Hà Trung - Thanh Hoá', '+84869227057', 2, '2021-07-07 21:37:34'),
(17, 6, 4, 'Mai Anh', 'Lê Lợi , Chí Linh - Hải Dương', '012345678', 0, '2021-07-08 10:06:13'),
(18, 6, 1, 'Mai Duyên', 'Nguyễn Văn Cừ - Ninh Bình', '012345678', 2, '2021-07-08 10:18:47'),
(19, 4, NULL, 'Văn Đức', '36 - Ninh Hiệp - Hà Nội', '+84869227057', 1, '2021-07-08 21:39:12'),
(20, 7, 1, 'Kim Anh', '36 - Lê Thanh Nghị - Hai Bà Trưng - Hà Nội', '0123456789', 2, '2021-07-13 17:05:24');

-- --------------------------------------------------------

--
-- Stand-in structure for view `orders_customer_admin`
-- (See below for the actual view)
--
CREATE TABLE `orders_customer_admin` (
`order_id` int(11)
,`customer_id` int(11)
,`admin_id` int(11)
,`receiver_name` varchar(50)
,`receiver_address` varchar(100)
,`receiver_phone` char(15)
,`order_status` smallint(6)
,`order_time` datetime
,`admin_name` varchar(100)
,`customer_name` varchar(100)
,`customer_address` varchar(100)
,`customer_city` varchar(200)
,`customer_phone` char(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quatity` int(11) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quatity`, `product_price`) VALUES
(14, 17, 3, '69000'),
(14, 19, 1, '69000'),
(14, 34, 3, '80988800'),
(15, 19, 3, '69000'),
(15, 35, 1, '9000000'),
(16, 23, 4, '69000'),
(16, 34, 2, '9000000'),
(17, 19, 5, '69000'),
(17, 34, 1, '9000000'),
(18, 26, 1, '80988800'),
(19, 36, 1, '62000000'),
(19, 38, 1, '25000000'),
(19, 39, 1, '7500000'),
(19, 41, 1, '5000000'),
(20, 36, 3, '62000000'),
(20, 40, 3, '15000000');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_details_product`
-- (See below for the actual view)
--
CREATE TABLE `order_details_product` (
`order_id` int(11)
,`product_id` int(11)
,`quatity` int(11)
,`product_price` varchar(100)
,`product_name` varchar(100)
,`product_image` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_type`, `product_price`, `product_image`) VALUES
(17, 70, 16, 'Dell 7520', 'đây là chiếc máy trạm', 4, '69000', '38f950817a.jpg'),
(19, 71, 19, 'Iphone 5', 'Đây là điện thoại apple iphone 5', 6, '69000', 'e142634e30.jpg'),
(20, 71, 20, 'Samsung J2', 'Đây là chiếc điện thoại', 4, '69000', '420bc4f179.jpg'),
(23, 72, 20, 'Điều hoà 2 chiều', 'đây là điều hoà nha', 6, '69000', 'b1fdf11729.jpg'),
(24, 71, 20, 'Samsung j7', 'đây là điện thoại samsung nha', 4, '69000', '6237e6a2df.jpg'),
(26, 71, 19, 'iphone 7', 'Đây là con iphone 7 nha', 6, '80988800', '0579a81218.jpg'),
(33, 70, 21, 'Laptop HP 240 G7 258M6PA', 'Đây là laptop HP', 5, '69000', '822dfd7bdf.jpg'),
(34, 70, 21, 'Laptop HP Probook 455 G8', 'Đây là laptop HP thứ 2', 4, '9000000', '8d2f91546c.jpg'),
(35, 70, 16, 'Inspiron 15 5000', 'Đây là chiếc máy tính của dell', 5, '9000000', '614c555269.jpg'),
(36, 70, 16, 'DELL PRECISION 7550 New', 'Đây là chiếc máy tính dell xịn xò', 4, '62000000', 'c026efe184.jpg'),
(37, 70, 21, 'HP SPECTRE 13T', 'Đây là chiếc HP xịn xò hơn', 4, '27000000', '02c8d778ee.jpg'),
(38, 71, 19, 'iPhone 12 Pro 128GB', 'Đây là con iphone 12 xịn xò', 5, '25000000', 'a3826ef8f8.jpg'),
(39, 71, 20, 'Samsung A52 (8GB | 128GB)', 'Đây là chiếc điện thoại samsung xịn xò', 4, '7500000', 'a0ef747787.jpg'),
(40, 70, 21, 'HP Pavilion 15 cs2034TU i5', 'Đây là chiếc máy tính hot', 4, '15000000', 'a7ccfd91c5.jpg'),
(41, 70, 16, 'LAPTOP DELL VOSTRO 3405', 'Đây là chiếc máy tính dell', 4, '5000000', '78820eab95.jpg'),
(42, 71, 19, 'Điện Thoại iPhone 11', 'Đây là iphone 11', 5, '17000000', 'f066231e51.webp'),
(44, 71, 19, 'Iphone 4', 'Đây là chiếc iphone 4', 5, '499000', 'c34f14617a.jpg'),
(45, 71, 19, 'Iphone 4S', 'Đây là điện thoại iphone 4s', 4, '799000', 'f72ff221c8.jpg'),
(46, 71, 19, 'Iphone XS', 'Đây là con iphone XS', 4, '12000000', 'a8098f35c5.jpg'),
(47, 71, 19, 'iphone 12 promax', 'Đây là iphone 12 promax', 5, '39000000', '74fa5ed3e4.jpg'),
(48, 71, 20, 'Galaxy Y S5360', 'Đây là điện thoại sam sung', 4, '499000', 'd3120c03f7.jpg'),
(49, 71, 20, 'Galaxy Z Flip', 'Đây là dt sam sung xịn xò', 5, '39000000', 'd6f92fd840.jpg'),
(50, 71, 20, 'Galaxy A51', 'Đây là điện thoại sam sung xịn', 5, '33000000', '7844d6ea40.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_brand_category_type`
-- (See below for the actual view)
--
CREATE TABLE `product_brand_category_type` (
`product_id` int(11)
,`category_id` int(11)
,`brand_id` int(11)
,`product_name` varchar(100)
,`product_desc` text
,`product_type` int(11)
,`product_price` varchar(100)
,`product_image` varchar(255)
,`category_name` varchar(100)
,`brand_name` varchar(100)
,`type_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(100) DEFAULT NULL,
  `slider_image` varchar(100) DEFAULT NULL,
  `slider_status` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_image`, `slider_status`) VALUES
(17, 'slider 01', '6b6945c97c.jpg', 1),
(18, 'slider 02  ', 'af224c8e61.jpg', 1),
(19, 'slider 03', '63c60540ef.jpg', 1),
(20, 'slider 04', '965e08fd3b.jpg', 1),
(21, 'slider 05', '24711cae81.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(4, 'xịn '),
(5, 'siêu xịn '),
(6, 'siêu siêu xịn');

-- --------------------------------------------------------

--
-- Structure for view `orders_customer_admin`
--
DROP TABLE IF EXISTS `orders_customer_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders_customer_admin`  AS SELECT `orders`.`order_id` AS `order_id`, `orders`.`customer_id` AS `customer_id`, `orders`.`admin_id` AS `admin_id`, `orders`.`receiver_name` AS `receiver_name`, `orders`.`receiver_address` AS `receiver_address`, `orders`.`receiver_phone` AS `receiver_phone`, `orders`.`order_status` AS `order_status`, `orders`.`order_time` AS `order_time`, `admin`.`admin_name` AS `admin_name`, `customer`.`customer_name` AS `customer_name`, `customer`.`customer_address` AS `customer_address`, `customer`.`customer_city` AS `customer_city`, `customer`.`customer_phone` AS `customer_phone` FROM ((`orders` join `customer` on(`customer`.`customer_id` = `orders`.`customer_id`)) left join `admin` on(`orders`.`admin_id` = `admin`.`admin_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `order_details_product`
--
DROP TABLE IF EXISTS `order_details_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_product`  AS SELECT `order_details`.`order_id` AS `order_id`, `order_details`.`product_id` AS `product_id`, `order_details`.`quatity` AS `quatity`, `order_details`.`product_price` AS `product_price`, `product`.`product_name` AS `product_name`, `product`.`product_image` AS `product_image` FROM (`order_details` join `product` on(`product`.`product_id` = `order_details`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `product_brand_category_type`
--
DROP TABLE IF EXISTS `product_brand_category_type`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_brand_category_type`  AS SELECT `product`.`product_id` AS `product_id`, `product`.`category_id` AS `category_id`, `product`.`brand_id` AS `brand_id`, `product`.`product_name` AS `product_name`, `product`.`product_desc` AS `product_desc`, `product`.`product_type` AS `product_type`, `product`.`product_price` AS `product_price`, `product`.`product_image` AS `product_image`, `category`.`category_name` AS `category_name`, `brand`.`brand_name` AS `brand_name`, `type`.`type_name` AS `type_name` FROM (((`product` join `category` on(`category`.`category_id` = `product`.`category_id`)) join `brand` on(`brand`.`brand_id` = `product`.`brand_id`)) join `type` on(`type`.`type_id` = `product`.`product_type`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_type` (`product_type`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`product_type`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
