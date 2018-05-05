-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 06:46 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rna_mobile_shop`
--
CREATE DATABASE IF NOT EXISTS `rna_mobile_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rna_mobile_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_brand` text NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` bigint(20) NOT NULL,
  `product_sold` bigint(20) NOT NULL,
  `product_dateadded` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_price`, `product_brand`, `product_description`, `product_quantity`, `product_sold`, `product_dateadded`) VALUES
(23, 'IOS-9876', 'APPLE 7s', 15000, 'APPLE', 'One of the best branded phone ever.', 10, 1, 'Mar 31, 2017 16:40 PM'),
(24, 'NKA-09878', 'LUMIA', 9000, 'NOKIA', 'One of the best windows phone ever.', 25, 2, 'Apr 02, 2017 12:22 PM');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `ID` int(11) NOT NULL,
  `product_code` text NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` bigint(20) NOT NULL,
  `date_added` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `userid` varchar(535) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `account_type` varchar(30) NOT NULL,
  `account_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userid`, `username`, `password`, `account_type`, `account_status`) VALUES
(1, '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'USER', 'CONFIRMED'),
(2, 'abb092448b49c5b7bc2b85fde264ffc1', 'fnsknf', 'aA', 'USER', 'CONFIRMED'),
(3, 'e0d03ccdf693ee6b34cb1dc577c1eb99', 'RRR', 'r', 'USER', 'CONFIRMED'),
(4, '7e0f6f3ec324dbd9517df9a5c01ee253', 'sjbsbfjsbfj', 'a', 'USER', '7e0f6f3ec324dbd9517df9a5c01ee253-5501de2a7d3227e0c625e6b4322267a7'),
(5, 'c881635afe2238127bf0a610abe75b45', 'aRRR', 'sss', 'USER', 'c881635afe2238127bf0a610abe75b45-8c4a9ab898af1f211813b059e4c2b9c4'),
(6, '37f31694ce2528a64cfacc73c612ef06', 'aas', 'a', 'USER', '37f31694ce2528a64cfacc73c612ef06-65c01c45db0505ccc8241ecd98bafe71'),
(7, '08f8e0260c64418510cefb2b06eee5cd', 'bbb', 'a', 'USER', '08f8e0260c64418510cefb2b06eee5cd-65c01c45db0505ccc8241ecd98bafe71'),
(8, '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaaa', 'USER', '47bce5c74f589f4867dbd57e9ca9f808-65c01c45db0505ccc8241ecd98bafe71'),
(9, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'ADMIN', 'CONFIRMED'),
(10, '4b43b0aee35624cd95b910189b3dc231', 'r', 'r', 'USER', '4b43b0aee35624cd95b910189b3dc231-918ef6a92d684364866b92803ac87c0e'),
(11, 'bc4026a99a5f42accb780e45f0ecff60', 'Percy11', 'Percy190', 'USER', 'bc4026a99a5f42accb780e45f0ecff60-eb0d6ea2f2521eb48a3aaf16a796b20c');

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `log_date` text NOT NULL,
  `log_time` varchar(8) NOT NULL,
  `log_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `username`, `log_date`, `log_time`, `log_status`) VALUES
(1, 'admin', 'Mar 30, 2017', '10:47 AM', 'Login'),
(2, 'admin', 'Mar 30, 2017', '10:50 AM', 'Logout'),
(3, 'admin', 'Mar 30, 2017', '10:51 AM', 'Login'),
(4, 'admin', 'Mar 30, 2017', '16:57 PM', 'Login'),
(5, 'admin', 'Mar 30, 2017', '19:36 PM', 'Login'),
(6, 'admin', 'Mar 30, 2017', '20:26 PM', 'Login'),
(7, 'admin', 'Mar 30, 2017', '20:38 PM', 'Login'),
(8, 'admin', 'Mar 30, 2017', '20:39 PM', 'Login'),
(9, 'admin', 'Mar 30, 2017', '22:02 PM', 'Logout'),
(10, 'admin', 'Mar 30, 2017', '22:07 PM', 'Login'),
(11, 'admin', 'Mar 31, 2017', '09:54 AM', 'Login'),
(12, 'admin', 'Mar 31, 2017', '10:00 AM', 'Logout'),
(13, 'admin', 'Mar 31, 2017', '10:27 AM', 'Login'),
(14, 'admin', 'Mar 31, 2017', '13:03 PM', 'Login'),
(15, 'admin', 'Mar 31, 2017', '13:10 PM', 'Login'),
(16, 'admin', 'Mar 31, 2017', '13:28 PM', 'Login'),
(17, 'admin', 'Mar 31, 2017', '14:05 PM', 'Logout'),
(18, 'admin', 'Mar 31, 2017', '15:14 PM', 'Login'),
(19, 'admin', 'Mar 31, 2017', '15:50 PM', 'Logout'),
(20, 'admin', 'Mar 31, 2017', '15:52 PM', 'Login'),
(21, 'admin', 'Mar 31, 2017', '16:34 PM', 'Logout'),
(22, 'admin', 'Mar 31, 2017', '16:37 PM', 'Login'),
(23, 'admin', 'Mar 31, 2017', '16:41 PM', 'Logout'),
(24, 'admin', 'Mar 31, 2017', '20:50 PM', 'Login'),
(25, 'admin', 'Mar 31, 2017', '20:54 PM', 'Login'),
(40, 'a', 'Apr 01, 2017', '17:07 PM', 'Login'),
(41, 'a', 'Apr 01, 2017', '17:07 PM', 'Logout'),
(42, 'admin', 'Apr 01, 2017', '17:07 PM', 'Admin - Login'),
(43, 'admin', 'Apr 01, 2017', '17:10 PM', 'Logout'),
(44, 'admin', 'Apr 01, 2017', '05:11 PM', 'Admin - Login'),
(45, 'admin', 'Apr 01, 2017', '05:12 PM', 'Logout'),
(46, 'a', 'Apr 01, 2017', '05:12 PM', 'Login'),
(47, 'a', 'Apr 01, 2017', '05:13 PM', 'Logout'),
(48, 'admin', 'Apr 01, 2017', '05:13 PM', 'Admin - Login'),
(49, 'admin', 'Apr 01, 2017', '05:34 PM', 'Admin - Login'),
(50, 'admin', 'Apr 01, 2017', '05:56 PM', 'Admin - Login'),
(51, 'admin', 'Apr 01, 2017', '08:40 PM', 'Admin - Login'),
(52, 'admin', 'Apr 02, 2017', '04:14 PM', 'Logout'),
(53, 'admin', 'Apr 02, 2017', '04:19 PM', 'Admin - Login'),
(54, 'admin', 'Apr 02, 2017', '04:45 PM', 'Logout'),
(55, 'admin', 'Apr 02, 2017', '04:50 PM', 'Admin - Login'),
(56, 'admin', 'Apr 02, 2017', '04:58 PM', 'Logout'),
(57, 'admin', 'Apr 02, 2017', '05:55 PM', 'Admin - Login'),
(58, 'admin', 'Apr 02, 2017', '06:07 PM', 'Logout'),
(59, 'admin', 'Apr 02, 2017', '06:08 PM', 'Admin - Login'),
(60, 'admin', 'Apr 02, 2017', '07:50 PM', 'Logout'),
(61, 'a', 'Apr 02, 2017', '09:20 PM', 'Login'),
(62, 'admin', 'Apr 02, 2017', '11:14 PM', 'Admin - Login'),
(63, 'admin', 'Apr 02, 2017', '11:15 PM', 'Admin - Login'),
(64, 'admin', 'Apr 02, 2017', '11:16 PM', 'Admin - Login'),
(65, 'admin', 'Apr 02, 2017', '11:26 PM', 'Admin - Login'),
(66, 'admin', 'Apr 02, 2017', '11:31 PM', 'Logout'),
(67, 'admin', 'Apr 02, 2017', '11:31 PM', 'Admin - Login'),
(68, 'admin', 'Apr 02, 2017', '11:31 PM', 'Logout'),
(69, 'a', 'Apr 02, 2017', '11:31 PM', 'Login'),
(70, 'admin', 'Apr 03, 2017', '01:57 AM', 'Admin - Login'),
(71, 'admin', 'Apr 03, 2017', '01:58 AM', 'Logout'),
(72, 'admin', 'Apr 03, 2017', '02:55 AM', 'Admin - Login'),
(73, 'admin', 'Apr 03, 2017', '02:56 AM', 'Logout'),
(74, 'admin', 'Apr 03, 2017', '04:47 AM', 'Admin - Login'),
(75, 'admin', 'Apr 03, 2017', '04:48 AM', 'Logout'),
(76, 'a', 'Apr 03, 2017', '04:48 AM', 'Login'),
(77, 'a', 'Apr 03, 2017', '04:51 AM', 'Logout'),
(78, 'admin', 'Apr 03, 2017', '04:52 AM', 'Admin - Login'),
(79, 'admin', 'Apr 03, 2017', '04:52 AM', 'Logout'),
(80, 'a', 'Apr 03, 2017', '04:53 AM', 'Login'),
(81, 'a', 'Apr 03, 2017', '07:42 AM', 'Login'),
(82, 'a', 'Apr 03, 2017', '11:40 AM', 'Logout'),
(83, 'admin', 'Apr 03, 2017', '11:40 AM', 'Admin - Login'),
(84, 'admin', 'Apr 03, 2017', '12:42 PM', 'Logout'),
(85, 'admin', 'Apr 03, 2017', '12:43 PM', 'Admin - Login'),
(86, 'admin', 'Apr 03, 2017', '12:43 PM', 'Logout'),
(87, 'RRR', 'Apr 03, 2017', '12:43 PM', 'Login'),
(88, 'RRR', 'Apr 03, 2017', '12:43 PM', 'Logout'),
(89, 'admin', 'Apr 03, 2017', '12:44 PM', 'Admin - Login'),
(90, 'admin', 'Apr 03, 2017', '12:45 PM', 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `users_order`
--

CREATE TABLE `users_order` (
  `ID` int(11) NOT NULL,
  `userid` text NOT NULL,
  `country` text NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` text NOT NULL,
  `address` text NOT NULL,
  `town` text NOT NULL,
  `province` text NOT NULL,
  `postcode` text NOT NULL,
  `email` text NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `ordered_products` text NOT NULL,
  `order_total` text NOT NULL,
  `date_ordered` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_order`
--

INSERT INTO `users_order` (`ID`, `userid`, `country`, `firstname`, `lastname`, `company`, `address`, `town`, `province`, `postcode`, `email`, `mobilenumber`, `ordered_products`, `order_total`, `date_ordered`, `order_status`) VALUES
(2, '0cc175b9c0f1b6a831c399e269772661', 'Philippines', 'Raymond', 'nsknsknd', 'RNA-House', 'Sta. Cruz', 'Labo', 'Camarines Norte', '46004', 'ksnmfksnkfn@rnr.com', '0987654323456', 'APPLE 7s x 2;LUMIA x 1;', '39000', 'Apr 03, 2017 11:11 AM', 'ON PROCESS'),
(3, '0cc175b9c0f1b6a831c399e269772661', 'Philippines', 'Raymond', 'nsknsknd', 'RNA-House', 'Sta. Cruz', 'Labo', 'Camarines Norte', '46004', 'ksnmfksnkfn@rnr.com', '0987654323456', 'APPLE 7s x 2;', '30000', 'Apr 03, 2017 11:18 AM', 'ON PROCESS'),
(4, '0cc175b9c0f1b6a831c399e269772661', 'Philippines', 'Raymond', 'nsknsknd', 'RNA-House', 'Sta. Cruz', 'Labo', 'Camarines Norte', '46004', 'ksnmfksnkfn@rnr.com', '0987654323456', 'APPLE 7s x 1;LUMIA x 2;', '33000', 'Apr 03, 2017 11:37 AM', 'ON PROCESS'),
(5, 'e0d03ccdf693ee6b34cb1dc577c1eb99', 'Philippines', 'Raymond', 'Agusa', 'RNA-House', 'Sta. Cruz', 'Labo', 'Camarines Norte', '46004', 'raymondagusa1@gmail.com', '98765432345678', 'APPLE 7s x 1;', '15000', 'Apr 03, 2017 12:43 PM', 'ON PROCESS');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `ID` int(11) NOT NULL,
  `userid` varchar(535) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `date_registered` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `userid`, `firstname`, `middlename`, `lastname`, `email`, `mobilenumber`, `address`, `date_registered`) VALUES
(1, '0cc175b9c0f1b6a831c399e269772661', 'Raymond', 'ksnfksnfk', 'nsknsknd', 'ksnmfksnkfn@rnr.com', '0987654323456', 'sfknskfn', 'Apr 02, 2017 01:11 PM'),
(2, 'abb092448b49c5b7bc2b85fde264ffc1', 'sjnfjksnfkN', 'snfsfnksn', 'dknfksnf', 'raymond.agusa.73@gmail.com', '345678987654', 'shhkjkdsnf', 'Apr 02, 2017 03:15 PM'),
(3, 'e0d03ccdf693ee6b34cb1dc577c1eb99', 'Raymond', 'Nanali', 'Agusa', 'raymondagusa1@gmail.com', '98765432345678', 'Sta. Cruz, Labo, CN', 'Apr 02, 2017 02:15 PM'),
(4, '7e0f6f3ec324dbd9517df9a5c01ee253', 'sjsd', 'a', 'hsbdhs', 'sfjsbfsfj@a.com', '98765432456789', '98kjufcgvhb', 'Apr 01, 2017 01:15 PM'),
(5, 'c881635afe2238127bf0a610abe75b45', 'sjfbjsb', 'ygbj', 'fgghj', 'sss@sss.cccc', '998765467890', 'kmn nhhvbnkml', 'Apr 01, 2017 04:15 PM'),
(6, '37f31694ce2528a64cfacc73c612ef06', 'a', 'a', 'a', 'a@a.a', '09876545678', 'sdfghjkm,', 'Apr 02, 2017 06:15 PM'),
(7, '08f8e0260c64418510cefb2b06eee5cd', 'a', 's', 'a', 'ax2@hj.c', '0987654323456', 'a', 'Apr 02, 2017 07:15 AM'),
(8, '47bce5c74f589f4867dbd57e9ca9f808', 'sndkndk', 'dajabdkabd', 'andkandk', 'aaaa@aaa.com', '09876545678', 'akldkjahdvhn mnm uijlmd, msndusnidk jd jbdakdand', 'Apr 02, 2017 01:00 PM'),
(9, '21232f297a57a5a743894a0e4a801fc3', 'Raymond', 'Nanali', 'Agusa', 'raymondagusa30@gmail.com', '09397351590', 'P-3 Brgy. Sta. Cruz, Labo, Camarines Norte', 'Mar 31, 2017 04:15 PM'),
(10, '4b43b0aee35624cd95b910189b3dc231', 'r', 'r', 'r', 'raymondagusa5@gmail.com', '098765456789', 'lkjhujnk', 'Apr 02, 2017 04:00 PM'),
(11, 'bc4026a99a5f42accb780e45f0ecff60', 'Perseus', 'Pajares', 'Manrique', 'percy11@gmail.com', '09876543878', 'Dalas, Labo, Camarines Norte', 'Apr 02, 2017 04:15 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `users_order`
--
ALTER TABLE `users_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
