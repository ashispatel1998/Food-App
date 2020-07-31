-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 06:55 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `item_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `r_name` varchar(200) NOT NULL,
  `r_manager_id` varchar(200) NOT NULL,
  `r_manager_mob` varchar(20) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_type` varchar(25) NOT NULL,
  `item_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`item_id`, `r_id`, `r_name`, `r_manager_id`, `r_manager_mob`, `item_name`, `item_type`, `item_price`) VALUES
(4, 1, 'Ashis Food Court', 'ashispatel1998@gmail.com', '7749003888', 'Panner tikka', 'Veg', 80),
(5, 2, 'Sangeeta Food Court', 'sangeetapatel154@gmail.com', '732714761', 'Puri', 'Veg', 5),
(6, 2, 'Sangeeta Food Court', 'sangeetapatel154@gmail.com', '732714761', 'Chicken Pakoda', 'Non veg', 60),
(9, 3, 'ABCD', 'abegpatel@gmail.com', '7327014761', 'samosa', 'Veg', 15),
(10, 1, 'Ashis Food Court', 'ashispatel1998@gmail.com', '7749003888', 'Chicken chilly', 'Non veg', 150),
(11, 4, 'Patel Resturant', 'patelashis25@gmail.com', '7750091250', 'Chicken Chawmin', 'Non veg', 50),
(12, 4, 'Patel Resturant', 'patelashis25@gmail.com', '7750091250', 'Soup', 'Veg', 25),
(13, 1, 'Ashis Food Court', 'ashispatel1998@gmail.com', '7749003888', 'Paobhaji', 'Veg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_type` varchar(20) NOT NULL,
  `item_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_price` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `r_name` varchar(200) NOT NULL,
  `r_mobile` varchar(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_mobile` varchar(200) NOT NULL,
  `order_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `item_name`, `item_type`, `item_price`, `quantity`, `address`, `total_price`, `r_id`, `r_name`, `r_mobile`, `user_name`, `user_email`, `user_mobile`, `order_status`) VALUES
(1, 4, 'Panner tikka', 'Veg', 80, 2, 'At-Bagdihi,Po-Bhatlaida,Pin-768213', 160, 1, 'Ashis Food Court', '7749003888', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 1),
(2, 4, 'Panner tikka', 'Veg', 80, 2, 'At-Bagdihi,Po-Bhatlaida,Pin-768213', 160, 1, 'Ashis Food Court', '7749003888', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 0),
(3, 9, 'samosa', 'Veg', 15, 2, 'abcd', 30, 3, 'ABCD', '7327014761', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 0),
(4, 12, 'Soup', 'Veg', 25, 1, 'xyz', 25, 4, 'Patel Resturant', '7750091250', 'Sangeeta patel', 'sangeetapatel154@gmail.com', '7327014761', 0),
(5, 13, 'Paobhaji', 'Veg', 50, 3, 'abcd', 150, 1, 'Ashis Food Court', '7749003888', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 0),
(6, 11, 'Chicken Chawmin', 'Non veg', 50, 2, 'At-Bagdihi\r\npo-Bhatlaida\r\npin-768213', 100, 4, 'Patel Resturant', '7750091250', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 0),
(7, 13, 'Paobhaji', 'Veg', 50, 1, 'abcd', 50, 1, 'Ashis Food Court', '7749003888', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 1),
(8, 6, 'Chicken Pakoda', 'Non veg', 60, 3, 'xyz', 180, 2, 'Sangeeta Food Court', '732714761', 'Sangeeta patel', 'sangeetapatel154@gmail.com', '7327014761', 1),
(9, 12, 'Soup', 'Veg', 25, 1, 'At-Bagdihi\r\nPo-Bhatlaida\r\nPin-768213', 25, 4, 'Patel Resturant', '7750091250', 'Sangeeta patel', 'sangeetapatel154@gmail.com', '7327014761', 0),
(10, 5, 'Puri', 'Veg', 5, 3, 'abcd', 15, 2, 'Sangeeta Food Court', '732714761', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 1),
(11, 11, 'Chicken Chawmin', 'Non veg', 50, 10, 'nmb', 500, 4, 'Patel Resturant', '7750091250', 'Ashis Patel', 'ashispatel1998@gmail.com', '7749003888', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantregistration`
--

CREATE TABLE `restaurantregistration` (
  `r_id` int(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `owner_name` varchar(500) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `r_name` varchar(500) NOT NULL,
  `r_type` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurantregistration`
--

INSERT INTO `restaurantregistration` (`r_id`, `email`, `owner_name`, `mobile`, `r_name`, `r_type`, `password`) VALUES
(1, 'ashispatel1998@gmail.com', 'Ashis kumar patel', '7749003888', 'Ashis Food Court', 'Veg', 'Ashis3888'),
(2, 'sangeetapatel154@gmail.com', 'Sangeeta patel', '732714761', 'Sangeeta Food Court', 'Veg', 'Ashis3888'),
(3, 'abegpatel@gmail.com', 'Abeg patel', '7327014761', 'ABCD', 'Non veg', 'Ashis3888'),
(4, 'patelashis25@gmail.com', 'Patel Ashis', '7750091250', 'Patel Resturant', 'Veg & Non veg', 'Ashis3888');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `type` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `mobile`, `type`, `password`) VALUES
('ashispatel1998@gmail.com', 'Ashis Patel', '7749003888', 'Veg', 'Ashis3888'),
('sangeetapatel154@gmail.com', 'Sangeeta patel', '7327014761', 'Veg', 'Ashis3888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurantregistration`
--
ALTER TABLE `restaurantregistration`
  ADD PRIMARY KEY (`r_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `restaurantregistration`
--
ALTER TABLE `restaurantregistration`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
