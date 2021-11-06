-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 09:19 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phonenum` varchar(11) NOT NULL,
  `accountnumber` varchar(20) NOT NULL,
  `amountbirr` int(11) NOT NULL,
  `security` varchar(30) NOT NULL,
  PRIMARY KEY (`accountnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`fname`, `lname`, `phonenum`, `accountnumber`, `amountbirr`, `security`) VALUES
('sisay', 'gizaw', '0924148815', '10000675690', 1780, '12345'),
('samuel', 'hailu', '0901010101', '1000092394167', 400, '000'),
('melat', 'abebe', '0923451234', '8912345675', 100, '6732'),
('hana', 'daniel', '0987564012', '8943672389', 10932, '1234');
