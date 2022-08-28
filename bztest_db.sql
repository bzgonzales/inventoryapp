-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 09:25 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bztest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `user_id`) VALUES
(1, 'client number 1', 1),
(2, 'client number 2', 1),
(3, 'Ronald Mcdonalds', 2),
(4, 'Ruth Estrada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_description` text NOT NULL,
  `item_s_qty` int(11) NOT NULL,
  `item_r_qty` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_code`, `item_description`, `item_s_qty`, `item_r_qty`, `client_id`) VALUES
(1, 'v13123', 'item description 1', 3, 1, 1),
(2, 'v23', 'item description 2', 5, 1, 2),
(3, 'g23', 'Iphone 6s', 7, 3, 2),
(4, 'n23', 'Nokia ', 5, 1, 2),
(6, '51', 'Samsung Galaxy', 12, 2, 4),
(7, 'n232', 'Samsung j12', 123, 44, 1),
(8, '512', 'RNR watch', 44, 2, 4),
(9, '23gg', 'Iphone 10', 123, 2, 2),
(10, 'jj10', 'Nike shoes', 444, 12, 3),
(11, '12bb', 'Ruby Rails', 32, 12, 2),
(12, 's99', 'Wrist Watch 101', 42, 4, 3),
(13, '4123b', 'TechShoe', 42, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `zip_code` int(11) NOT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0 = deleted, 1 = active, 2= cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `delivery_date`, `customer_name`, `customer_address`, `zip_code`, `status`) VALUES
(1, 1, '2019-02-28 00:00:00', 'Mae Canceran', 'Fresco', 4117, 1),
(2, 4, '2019-02-27 00:00:00', 'customer number 2', 'customer number 2', 4115, 1),
(3, 4, '2019-02-20 00:00:00', 'ryan agon', 'gma cavite', 2321, 1),
(4, 3, '2019-02-26 00:00:00', 'Roland Panya', 'Sorsogon', 5543, 1),
(5, 3, '2019-02-28 00:00:00', 'Roland Panya', 'Sorsogon', 5543, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email_address`, `first_name`, `last_name`, `user_type`, `status`) VALUES
(1, 'admin', 'password', 'bz.gonzales@yahoo.com', 'bhelly zaldy', 'gonzales', 'admin', 1),
(2, 'customer_service', 'password', 'bz.gonzales@yahoo.com', 'Dianne', 'Lepasana', 'customerservice', 1),
(3, 'customer', 'password', 'bz.gonzales@yahoo.com', 'Aldreine', 'Manansala', 'customer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
