-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 09:18 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ethiobus`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`) VALUES
('sdfgh', 'abdu'),
('abdu', 'abdu'),
('vghjk', 'abdu'),
('vghjk', 'abdu'),
('vghjk', 'abdu');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(34) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`u_id`, `fname`, `lname`, `sex`, `username`, `password`, `phone`, `email`) VALUES
(1, '', '', '', 'admin', 'admin', '', '0'),
(9, 'samuel', 'ad2', 'Female', 'add   ', 'pass', '0967123456', 'bdes@yahoo.com   ');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `bus_id` int(10) NOT NULL AUTO_INCREMENT,
  `sideno` int(10) NOT NULL,
  `nofseat` int(10) NOT NULL,
  `route_id` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`bus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `sideno`, `nofseat`, `route_id`, `date`) VALUES
(26, 3434, 60, 30, '2018-06-05'),
(27, 323, 98, 30, '2018-06-08'),
(28, 34343, 5, 31, '2018-06-08'),
(29, 5613, 12, 31, '2020-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `clerkacc`
--

CREATE TABLE IF NOT EXISTS `clerkacc` (
  `clerk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`clerk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `clerkacc`
--

INSERT INTO `clerkacc` (`clerk_id`, `fname`, `lname`, `sex`, `username`, `password`, `phone`, `email`) VALUES
(7, '', '', '', '0', 'sisay', '123', 'sisa@gmail.com'),
(24, 'fasil', 'kasahun', 'male', '998989999', 'fasil', '123', 'f@gmail.com'),
(25, 'jjjjj', 'aaa', '', 'hana', 'hana34', '864123450', 'vdfer@gmAIL.COM ');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `content`, `date`) VALUES
(37, 'qwerty', 'abduayehu935@gmail.com', 'asdfg', '2017-03-29'),
(38, 'qwerty', 'abduayehu935@gmail.com', 'asdfg', '2017-03-29'),
(39, 'abdu', 'abduayehu935@gmail.com', 'abdu', '2017-05-31'),
(40, 'abdu', 'abduayehu935@gmail.com', 'come', '2017-05-31'),
(41, 'kebede', 'kebde@gmail.com', 'nice', '2017-05-31'),
(42, 'abeba', 'abeba@gmail.com', 'good', '2017-06-04'),
(43, 'advngvb', 'yohannesseyoum42@yahoo.com', 'xncbv nm', '2017-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `clerk_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `officename` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`clerk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employe`
--


-- --------------------------------------------------------

--
-- Table structure for table `manageracc`
--

CREATE TABLE IF NOT EXISTS `manageracc` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`manager_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `manageracc`
--

INSERT INTO `manageracc` (`manager_id`, `fname`, `lname`, `sex`, `username`, `password`, `phone`, `email`) VALUES
(33, 'deva', 'daccccccccc', 'male', '967458458', 'davee', '123', 'dave@gmail.com'),
(47, 'abebe', 'solomon', 'male', '980555353', 'abebe', '123', 'abe@gmail.com'),
(51, 'bewuket', 'abera', 'Male', '909090923 ', 'solomon  ', '123', 'sol@gmail.com  '),
(58, 'wudassie', 'hhhh', 'Male', 'ty  ', 'ty123  ', '0912345678', 'fgrt10@yahoo.com  ');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phoneno` int(15) NOT NULL,
  `age` int(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `firstname`, `lastname`, `phoneno`, `age`, `city`, `username`, `password`, `date`) VALUES
(1, 'fullman', 'melaku', 953223332, 23, 'adama', 'fullman', 'fullman', '2017-06-20'),
(2, 'mengstu', 'wubet', 924366255, 34, 'gonder', 'passenger', 'passenger', '2017-06-20'),
(5, 'abeba', 'asefa', 932655550, 22, 'jimma', 'abeba', 'abeba2', '2017-06-20'),
(6, 'abinet', 'mokenen', 943216787, 67, 'hirna', 'abinet', '121212', '2018-06-05'),
(31, 'abinet', 'mokenen', 943216787, 67, 'hirna', 'abinet', '12121212', '2018-06-05'),
(32, 'abinet', 'mokenen', 943216787, 67, 'hirna', 'abinet', '12121212', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `age` int(10) NOT NULL,
  `depcity` varchar(255) NOT NULL,
  `descity` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `fare` float NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `busid` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `fname`, `lname`, `telephone`, `age`, `depcity`, `descity`, `date`, `fare`, `transaction_no`, `busid`, `status`, `total`) VALUES
(86, 'sisay', 'gizaw', 924148815, 98, 'Addis-Ababa', 'Bahir-Dar', '2018-06-05', 100, 'tup4ekna', 0, 'Arrived', 200),
(87, 'melat', 'abebe', 923451234, 67, 'Addis-Ababa', 'Bahir-Dar', '2020-03-31', 100, 'wf05muqt', 0, '', 200),
(88, 'melat', 'abebe', 923451234, 67, 'Addis-Ababa', 'Bahir-Dar', '2020-04-02', 100, 'wf0rw28i', 0, '', 200),
(89, 'hana', 'daniel', 987564012, 23, 'Addis-Ababa', 'Bahir-Dar', '2020-04-02', 100, '4cn0tqur', 0, '', 200),
(90, 'hana', 'daniel', 987564012, 32, 'Addis-Ababa', 'Bahir-Dar', '2020-04-04', 100, '2bkfyf65', 0, '', 200),
(91, 'hana', 'daniel', 987564012, 18, 'Bahir-Dar', 'Diredawa', '2020-06-15', 34534, '0vk7kd0b', 2445, '', 69068);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `route_id` int(10) NOT NULL AUTO_INCREMENT,
  `depcity` varchar(255) NOT NULL,
  `descity` varchar(255) NOT NULL,
  `busid` int(10) NOT NULL,
  `fare` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `depcity`, `descity`, `busid`, `fare`, `date`) VALUES
(30, 'Addis-Ababa', 'Bahir-Dar', 0, 100, '2018-06-05'),
(31, 'Addis-Ababa', 'Dessie', 2222, 111, '2018-06-08'),
(32, 'Addis-Ababa', 'Bahir-Dar', 3434, 2434, '2018-06-08'),
(33, 'Bahir-Dar', 'Diredawa', 2445, 34534, '2018-06-08'),
(34, 'Bahir-Dar', 'Diredawa', 56, 400, '2020-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int(10) NOT NULL AUTO_INCREMENT,
  `depcity` varchar(255) NOT NULL,
  `descity` varchar(255) NOT NULL,
  `deptime` time NOT NULL,
  `arrivaltime` time NOT NULL,
  `wprogram` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `depcity`, `descity`, `deptime`, `arrivaltime`, `wprogram`, `date`) VALUES
(4, 'Addis-Ababa', 'Bahir-Dar', '12:00:00', '11:00:00', 'monday-sunday', '2018-06-05'),
(5, 'Diredawa', 'Gondor', '04:45:00', '05:30:00', 'Tuesday ', '2020-06-14'),
(6, 'Harar', 'Mekelle', '12:10:00', '07:30:00', 'Friday and Thursday', '2020-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `seat1`
--

CREATE TABLE IF NOT EXISTS `seat1` (
  `transaction_no` varchar(255) NOT NULL,
  `number` int(10) NOT NULL,
  `PNR` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `depcity` varchar(255) NOT NULL,
  `descity` varchar(255) NOT NULL,
  `fare` float NOT NULL,
  `busid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat1`
--

INSERT INTO `seat1` (`transaction_no`, `number`, `PNR`, `date`, `depcity`, `descity`, `fare`, `busid`) VALUES
('wf05muqt', 1, '2020-03-31-1', '2020-03-31', 'Addis-Ababa', 'Bahir-Dar', 100, 0),
('wf0rw28i', 5, '2020-04-02-5', '2020-04-02', 'Addis-Ababa', 'Bahir-Dar', 100, 0),
('4cn0tqur', 30, '2020-04-02-30', '2020-04-02', 'Addis-Ababa', 'Bahir-Dar', 100, 0),
('4cn0tqur', 32, '2020-04-02-32', '2020-04-02', 'Addis-Ababa', 'Bahir-Dar', 100, 0),
('2bkfyf65', 2, '2020-04-04-2', '2020-04-04', 'Addis-Ababa', 'Bahir-Dar', 100, 0),
('2bkfyf65', 3, '2020-04-04-3', '2020-04-04', 'Addis-Ababa', 'Bahir-Dar', 100, 0),
('0vk7kd0b', 1, '2020-06-15-1', '2020-06-15', 'Bahir-Dar', 'Diredawa', 34534, 2445);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Status` int(2) NOT NULL DEFAULT '1',
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `FNAME`, `LNAME`, `type`, `Status`, `email`) VALUES
(21, 'clerk', '123456', 'temesgen', 'chanie', 'clerk', 1, 'temu@gmail.com'),
(22, 'manager', '123456', 'temesgen', 'chanie', 'manager', 1, 'temu.manager@gmail.com'),
(35, 'administrator', '123456', 'temesgen', 'chanie', 'admin', 1, 'adm@gmail.com');
