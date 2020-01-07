-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2020 at 01:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bicycledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billinginfo`
--

DROP TABLE IF EXISTS `billinginfo`;
CREATE TABLE IF NOT EXISTS `billinginfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billinginfo`
--

INSERT INTO `billinginfo` (`id`, `first_name`, `last_name`, `address`, `city`, `state`, `pin_code`, `created_at`) VALUES
(1, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-16 16:57:37'),
(2, 'James', 'Foster', '116 Rennell street, Apt 31', 'Bridgeport', 'CT', 6604, '2019-12-16 16:57:37'),
(3, 'John', 'Lehman', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(4, 'James', 'Foster', '116 Rennell street, Apt 31', 'Bridgeport', 'CT', 6604, '2019-12-16 16:57:37'),
(5, 'John', 'Borrisman', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2019-12-16 16:57:37'),
(6, 'Jason', 'Mamoa', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2019-12-16 16:57:37'),
(7, 'Gavin', 'Andrews', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(8, 'John', 'Lehman', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(9, 'Justin', 'Trudeau', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(10, 'Adam', 'Foster', '116 Rennell street, Apt 31', 'Bridgeport', 'CT', 6604, '2019-12-16 16:57:37'),
(11, 'Adam', 'Foster', '116 Rennell street, Apt 31', 'Bridgeport', 'CT', 6604, '2019-12-16 16:57:37'),
(12, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-16 16:57:37'),
(13, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-16 16:57:37'),
(14, 'Adam', 'Foster', '116 Rennell street, Apt 31', 'Bridgeport', 'CT', 6604, '2019-12-16 16:57:37'),
(15, 'John', 'Borrisman', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2019-12-16 16:57:37'),
(16, 'John', 'Borrisman', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2019-12-16 16:57:37'),
(17, 'John', 'Lehman', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(18, 'John', 'Lehman', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(19, 'John', 'Lehman', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-16 16:57:37'),
(25, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-16 16:57:37'),
(26, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-17 14:06:04'),
(27, 'Adam', 'Foster', '116 Rennell street, Apt 31', 'Bridgeport', 'CT', 6604, '2019-12-17 14:07:07'),
(28, 'Louis', 'Andrews', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-17 15:02:04'),
(29, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-18 13:04:07'),
(30, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-18 13:12:52'),
(31, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-27 11:53:19'),
(32, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, ', 'Warminster', 'PA', 19874, '2019-12-27 12:17:11'),
(33, 'Eddy', 'Brosnan', '2020 Juniper Court', 'Glendale Heights', 'IL', 60139, '2019-12-27 12:24:40'),
(34, 'Alex', 'Decosta', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-27 15:06:16'),
(35, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-27 16:16:47'),
(36, 'Moulik', 'Mehta', '365 Newtown Road, Apt E10, Warminster(PA)-18974', 'Warminster', 'PA', 19874, '2019-12-27 16:16:56'),
(37, 'Louis', 'Andrews', '160 Vroom Street, Apt 16', 'Jersey City', 'NJ', 7306, '2019-12-30 08:51:38'),
(38, 'Jason', 'Holder', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2020-01-02 09:46:21'),
(39, 'Jason', 'Holder', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2020-01-02 10:02:53'),
(40, 'Jason', 'Holder', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2020-01-02 10:40:50'),
(41, 'Jason', 'Holder', '8627 Glenloch Street', 'Philadelphia', 'PA', 19136, '2020-01-03 09:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Hero'),
(2, 'Atlas'),
(3, 'Hercules');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_type`) VALUES
(1, 'Blue'),
(2, 'Red'),
(3, 'Green'),
(4, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `currentoption`
--

DROP TABLE IF EXISTS `currentoption`;
CREATE TABLE IF NOT EXISTS `currentoption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentoption`
--

INSERT INTO `currentoption` (`id`, `brand`, `gender`, `color`, `price`) VALUES
(1, 'Hero', 'Ladies', 'Red', 3350);

-- --------------------------------------------------------

--
-- Table structure for table `currentselection`
--

DROP TABLE IF EXISTS `currentselection`;
CREATE TABLE IF NOT EXISTS `currentselection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentselection`
--

INSERT INTO `currentselection` (`id`, `brand`, `gender`, `color`, `price`) VALUES
(1, 'Hercules', 'Ladies', 'Red', 3320);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`Id`, `Type`) VALUES
(1, 'Gents'),
(2, 'Ladies');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `Id` int(50) NOT NULL AUTO_INCREMENT,
  `billing_id` int(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Id`, `billing_id`, `brand`, `gender`, `color`, `price`) VALUES
(1, 25, 'Hero', 'Gents', 'Blue', '2350'),
(2, 26, 'Hero', 'Ladies', 'Red', '3350'),
(3, 27, 'Hero', 'Gents', 'Blue', '2350'),
(4, 0, 'Hercules', 'Ladies', 'Black', '2140'),
(5, 0, 'Hercules', 'Ladies', 'Black', '2140'),
(6, 28, 'Hercules', 'Ladies', 'Black', '2140'),
(7, 0, 'Hero', 'Ladies', 'Red', '3350'),
(8, 29, 'Hero', 'Ladies', 'Red', '3350'),
(9, 0, 'Hero', 'Ladies', 'Red', '3350'),
(10, 0, 'Hero', 'Gents', 'Blue', '2350'),
(11, 0, 'Hero', 'Gents', 'Blue', '2350'),
(12, 30, 'Hero', 'Gents', 'Blue', '2350'),
(13, 0, 'Atlas', 'Gents', 'Green', '3490'),
(14, 0, 'Atlas', 'Gents', 'Green', '3490'),
(15, 31, 'Atlas', 'Gents', 'Green', '3490'),
(16, 32, 'Hercules', 'Ladies', 'Red', '3320'),
(17, 32, 'Hercules', 'Ladies', 'Red', '3320'),
(18, 33, 'Atlas', 'Gents', 'Green', '3490'),
(19, 34, 'Hercules', 'Ladies', 'Red', '3320'),
(20, 35, 'Hero', 'Gents', 'Blue', '2350'),
(21, 36, 'Hero', 'Gents', 'Blue', '2350'),
(22, 37, 'Hero', 'Gents', 'Red', '3200'),
(23, 38, 'Hercules', 'Ladies', 'Red', '3320'),
(24, 38, 'Hercules', 'Ladies', 'Red', '3320'),
(25, 39, 'Hero', 'Ladies', 'Red', '3350'),
(26, 40, 'Hero', 'Ladies', 'Red', '3350'),
(27, 41, 'Hero', 'Ladies', 'Red', '3350');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `brand_id`, `gender_id`, `color_id`, `price`) VALUES
(1, 1, 1, 1, 2350),
(2, 1, 1, 4, 2160),
(3, 1, 1, 3, 3490),
(4, 1, 2, 2, 3350),
(5, 2, 1, 1, 2390),
(6, 2, 1, 4, 2180),
(7, 2, 1, 3, 3490),
(8, 2, 2, 2, 3340),
(9, 2, 2, 4, 2145),
(10, 3, 1, 1, 2350),
(11, 3, 1, 4, 2100),
(12, 3, 2, 2, 3320),
(13, 3, 2, 4, 2140),
(14, 1, 2, 4, 2160),
(15, 1, 1, 2, 3200),
(16, 1, 1, 1, 3200),
(17, 3, 2, 2, 3150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Role` varchar(255) DEFAULT 'User',
  `email` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `Role`, `email`, `contact_no`) VALUES
(1, 'Moulik', 'moulik123', '2019-12-16 17:32:08', 'Admin', '', 0),
(21, 'Adam', 'adam123', '2019-12-17 14:06:25', 'User', '', 0),
(22, 'Louis', 'louis123', '2019-12-17 14:55:04', 'User', '', 0),
(20, 'Jason', 'jason123', '2019-12-17 09:43:42', 'User', '', 0),
(23, 'Vivian', 'viv123', '2019-12-18 09:25:49', 'User', '', 0),
(24, 'David', 'david123', '2019-12-18 16:29:05', 'User', 'david@gmail.com', 1234567890),
(25, 'Jacob', 'jacob123', '2019-12-18 16:58:00', 'User', 'jacob@gmail.com', 1234567890),
(26, 'George', 'george', '2019-12-18 17:03:30', 'User', '', 987654321),
(27, 'Eddy', 'eddy123', '2019-12-27 12:23:10', 'User', '', 987654321),
(28, 'Alex', 'alex123', '2019-12-27 14:36:12', 'User', 'alexdecosta@gmail.com', 1234567890),
(29, 'Martin', 'martin123', '2019-12-30 08:50:48', 'User', 'martin@gmail.com', 1023456789),
(30, 'Amanda', 'amanda123', '2020-01-06 13:28:13', 'User', 'amandacerny@gmail.com', 1234567890);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
