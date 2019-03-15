-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: মার 15, 2019 at 07:58 ???????
-- সার্ভার সংস্করন: 10.1.13-MariaDB
-- পিএইছপির সংস্করন: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `oss_db`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Television '),
(2, 'Mobile Phone'),
(3, 'Watch');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `product_info`
--

CREATE TABLE `product_info` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_category` varchar(225) NOT NULL,
  `product_sub_category` varchar(225) NOT NULL,
  `product_details` text NOT NULL,
  `quantity` int(225) NOT NULL,
  `product_price` int(225) NOT NULL,
  `product_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `product_info`
--

INSERT INTO `product_info` (`p_id`, `product_name`, `product_category`, `product_sub_category`, `product_details`, `quantity`, `product_price`, `product_image`) VALUES
(1, 'Samsung 32" LED TV', 'Television', 'LED TV', 'This is 32 inch Samsung LED Television, brand new 5 year warranty.', 2, 14000, '91hQL+d6bML._SX425_.jpg');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` varchar(225) NOT NULL,
  `sub_category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`) VALUES
(1, '1', 'LED TV'),
(2, '1', 'Smart TV'),
(3, '2', 'Features Phone');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `user_id`, `password`, `email`, `contact_num`, `address`, `status`) VALUES
(1, 'Asha Moni', 'asha123', '123456', 'asha123@gmail.com', '0151245887451', 'Mohakhali, Dhaka', 'admin'),
(2, 'Md. Moniruzzaman', 'moon199715', '123456', 'moon199715@yahoo.com', '01761189963', 'Uttara, Dhaka', 'user');

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- টেবিলের ইনডেক্সসমুহ `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`p_id`);

--
-- টেবিলের ইনডেক্সসমুহ `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- টেবিলের ইনডেক্সসমুহ `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
