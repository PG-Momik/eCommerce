-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2021 at 04:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `d_id` int(10) NOT NULL,
  `o_id` int(10) NOT NULL,
  `d_destination` varchar(255) NOT NULL,
  `d_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`d_id`, `o_id`, `d_destination`, `d_status`) VALUES
(1, 1, 'Kirtipur-5, Kathmandu', 'Delivered'),
(2, 2, 'Nagaun-2, Kathmandu', 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `o_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `pl_id` int(10) NOT NULL,
  `pr_id` int(10) NOT NULL,
  `o_date` date NOT NULL,
  `o_bill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`o_id`, `u_id`, `pl_id`, `pr_id`, `o_date`, `o_bill`) VALUES
(1, 1, 1, 1, '2021-12-15', '#00101'),
(2, 2, 2, 2, '2021-12-20', '#00202');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price_plan`
--

CREATE TABLE `tbl_price_plan` (
  `pl_id` int(10) NOT NULL,
  `pl_name` varchar(255) NOT NULL,
  `pl_discount` int(2) NOT NULL,
  `pl_delivery` int(2) NOT NULL,
  `pl_qty` int(10) NOT NULL,
  `pl_feature1` text NOT NULL,
  `pl_feature2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_price_plan`
--

INSERT INTO `tbl_price_plan` (`pl_id`, `pl_name`, `pl_discount`, `pl_delivery`, `pl_qty`, `pl_feature1`, `pl_feature2`) VALUES
(1, 'Regular', 0, 50, 1, '+0 free T-Shirt', 'Trackable Delivery: No'),
(2, 'Premium', 50, 50, 12, '+1 free T-shirt', 'Trackable delivery: Yes'),
(3, 'Deulex', 100, 0, 50, '+2 free T-shirt', 'Trackable Delivery: Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `pr_price` int(5) NOT NULL,
  `pr_add_date` datetime NOT NULL,
  `pr_description` tinytext NOT NULL,
  `pr_picture` longtext NOT NULL,
  `pr_stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`pr_id`, `pr_name`, `pr_price`, `pr_add_date`, `pr_description`, `pr_picture`, `pr_stock`) VALUES
(1, 'Black T-shirt', 300, '2021-12-22 14:25:09', 'Plain black T-shirt, great for casual wear. Fits well with everything else on your closet.', 'product_1a.jpg', 500),
(2, 'White T-shirt', 300, '2021-12-14 18:42:23', 'Plain black T-shirt, great for formal wear and the summer. Recommended pick by our recurring customers.', 'product_2a.jpg', 500),
(3, '50/50', 300, '2021-12-22 15:52:41', 'You can buy half the bundle of each color of clothes.', 'product_1a.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `t_id` int(10) NOT NULL,
  `t_image` varchar(255) NOT NULL,
  `t_description` text NOT NULL,
  `u_id` int(10) NOT NULL,
  `t_date` date NOT NULL,
  `t_filter` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`t_id`, `t_image`, `t_description`, `u_id`, `t_date`, `t_filter`) VALUES
(2, '1Momik.jpg', 'asdfgfhgh', 2, '2021-12-20', 1),
(3, '../../images/testimonial/uploads/1Momik Shrestha.jpg', 'Very Cool.', 1, '2021-12-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_name`, `u_address`, `u_email`, `u_password`, `u_type`) VALUES
(1, 'Momik Shrestha', 'Kirtipur-52', 'momik12339@gmail.com', '$2y$10$4iYmj.LI/tSLZBbxYhs/F.vTsMGKwLdHOLv8/K0ABKfKiAi86MM4G', 1),
(2, 'Momik', 'Bruh town', 'momik11@gmail.com', '$2y$10$4iYmj.LI/tSLZBbxYhs/F.vTsMGKwLdHOLv8/K0ABKfKiAi86MM4G', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `pl_id` (`pl_id`),
  ADD KEY `pr_id` (`pr_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_price_plan`
--
ALTER TABLE `tbl_price_plan`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_price_plan`
--
ALTER TABLE `tbl_price_plan`
  MODIFY `pl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD CONSTRAINT `tbl_delivery_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `tbl_order` (`o_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`pl_id`) REFERENCES `tbl_price_plan` (`pl_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`pr_id`) REFERENCES `tbl_products` (`pr_id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`);

--
-- Constraints for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD CONSTRAINT `tbl_testimonial_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
