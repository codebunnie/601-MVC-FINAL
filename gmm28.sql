-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2017 at 11:23 PM
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
  `acct_password` varchar(255) DEFAULT NULL,
  `acct_type_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`acct_id`),
  KEY `acct_type_id` (`acct_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `accounts`
--

TRUNCATE TABLE `accounts`;
--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acct_id`, `acct_email`, `acct_fname`, `acct_lname`, `acct_phone`, `acct_birthday`, `acct_gender`, `acct_password`, `acct_type_id`) VALUES
(1, 'admin@gmail.com', 'Admin', 'Admin_User', '978-859-8798', '2017-12-12', 'FEMALE', 'password', 2),
(2, 'user@gmail.com', 'USER', 'User_User', '549-785-8745', '2017-08-12', 'MALE', 'password1', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`acct_type_id`) REFERENCES `account_type` (`acct_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
