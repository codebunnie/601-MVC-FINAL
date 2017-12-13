-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2017 at 09:18 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmm28`
--
CREATE DATABASE IF NOT EXISTS `gmm28` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gmm28`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `acct_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `acct_email` varchar(30) DEFAULT NULL,
  `acct_fname` varchar(30) DEFAULT NULL,
  `acct_lname` varchar(30) DEFAULT NULL,
  `acct_phone` varchar(20) DEFAULT NULL,
  `acct_birthday` date DEFAULT NULL,
  `acct_gender` varchar(20) DEFAULT NULL,
  `acct_password` varchar(60) DEFAULT NULL,
  `acct_type_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`acct_id`),
  KEY `acct_type_id` (`acct_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acct_id`, `acct_email`, `acct_fname`, `acct_lname`, `acct_phone`, `acct_birthday`, `acct_gender`, `acct_password`, `acct_type_id`) VALUES
(1, 'admin@gmail.com', 'Admin', 'Admin_User', '978-859-8798', '2017-12-12', 'FEMALE', 'password', 2),
(2, 'user@gmail.com', 'USER', 'User_User', '549-785-8745', '2017-08-12', 'MALE', 'password1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
CREATE TABLE IF NOT EXISTS `account_type` (
  `acct_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `acct_type_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`acct_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`acct_type_id`, `acct_type_desc`) VALUES
(1, 'USER'),
(2, 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
CREATE TABLE IF NOT EXISTS `todos` (
  `todo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `acct_id` int(11) UNSIGNED DEFAULT NULL,
  `todo_create_date` datetime DEFAULT NULL,
  `todo_end_date` datetime DEFAULT NULL,
  `todo_due_date` datetime DEFAULT NULL,
  `todo_desc` varchar(60) DEFAULT NULL,
  `todo_status_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`todo_id`),
  KEY `acct_id` (`acct_id`),
  KEY `todo_status_id` (`todo_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`todo_id`, `acct_id`, `todo_create_date`, `todo_end_date`, `todo_due_date`, `todo_desc`, `todo_status_id`) VALUES
(1, 1, '2017-01-01 00:00:00', '2017-01-31 00:00:00', '2017-02-01 00:00:00', 'this is a desc for admn', 3),
(2, 2, '2017-12-01 00:00:00', '2017-12-31 00:00:00', '2018-01-11 00:00:00', 'This is another todo', 2),
(3, 1, '2018-01-01 00:00:00', '2018-01-31 00:00:00', '2018-02-01 00:00:00', 'this is a desc for admn', 1),
(4, 2, '2018-12-01 00:00:00', '2018-12-31 00:00:00', '2018-01-11 00:00:00', 'This is another todo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `todo_status`
--

DROP TABLE IF EXISTS `todo_status`;
CREATE TABLE IF NOT EXISTS `todo_status` (
  `todo_status_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `todo_status_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`todo_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_status`
--

INSERT INTO `todo_status` (`todo_status_id`, `todo_status_desc`) VALUES
(1, 'COMPLETED'),
(2, 'PENDING'),
(3, 'IN PROCESS'),
(4, 'REASSIGNED');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`acct_type_id`) REFERENCES `account_type` (`acct_type_id`);

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`acct_id`) REFERENCES `accounts` (`acct_id`),
  ADD CONSTRAINT `todos_ibfk_2` FOREIGN KEY (`todo_status_id`) REFERENCES `todo_status` (`todo_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
