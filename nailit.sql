-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2020 at 08:07 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nailit`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Cust_id` int(11) NOT NULL,
  `Cust_name` varchar(255) NOT NULL,
  `Cust_add` varchar(255) DEFAULT NULL,
  `Cust_add_2` varchar(255) NOT NULL DEFAULT 'Pune, Maharashtra',
  `Cust_mobile` varchar(255) DEFAULT NULL,
  `Cust_email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `Created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Cust_id`, `Cust_name`, `Cust_add`, `Cust_add_2`, `Cust_mobile`, `Cust_email`, `status`, `Created_at`, `Updated_at`, `Deleted_at`) VALUES
(17, '', '', '', '', 'email', 'Active', '2020-02-21 12:28:27', '2020-02-21 12:28:27', '0000-00-00 00:00:00'),
(18, 'first c', 'line1', 'line 2 pune', '8888888888', 'email', 'Active', '2020-02-21 12:29:09', '2020-02-21 12:29:09', '0000-00-00 00:00:00'),
(19, 'first c', 'line1', 'line 2 pune', '8888888888', 'email', 'Active', '2020-02-21 12:29:36', '2020-02-21 12:29:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(22) NOT NULL,
  `product_name` varchar(22) NOT NULL,
  `product_price` int(22) NOT NULL,
  `product_cat` varchar(22) NOT NULL,
  `product_details` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_stats`
--

CREATE TABLE `sales_stats` (
  `id` int(22) NOT NULL,
  `sales` int(22) NOT NULL,
  `month` varchar(25) NOT NULL,
  `pending_orders` int(55) NOT NULL,
  `revenue` int(55) NOT NULL,
  `Vistors` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '1',
  `unit_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`order_id`, `order_name`, `order_description`, `quantity`, `unit_price`, `selling_price`, `created_at`, `updated_at`, `deleted_at`, `cust_id`) VALUES
(1, '', '', '', '', '', '2020-02-21 12:28:27', '2020-02-21 12:28:27', '2020-02-21 12:28:27', 17),
(2, 'p1', '', '15', '4', '', '2020-02-21 12:29:09', '2020-02-21 12:29:09', '2020-02-21 12:29:09', 18),
(3, 'p1', '', '15', '4', '', '2020-02-21 12:29:09', '2020-02-21 12:29:09', '2020-02-21 12:29:09', 18),
(4, 'p1', '', '15', '4', '', '2020-02-21 12:29:09', '2020-02-21 12:29:09', '2020-02-21 12:29:09', 18),
(5, 'p1', '', '15', '4', '', '2020-02-21 12:29:36', '2020-02-21 12:29:36', '2020-02-21 12:29:36', 19),
(6, 'p1', '', '15', '4', '', '2020-02-21 12:29:36', '2020-02-21 12:29:36', '2020-02-21 12:29:36', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Geoadmin', 'vghadge35@gmail.com', '9067715c5a34f4a92e7f76258a72fe0d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`Cust_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
