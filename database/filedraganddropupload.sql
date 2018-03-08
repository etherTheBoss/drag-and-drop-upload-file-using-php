-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 06:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `filedraganddropupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_name`, `file_title`, `file_type`, `file_status`) VALUES
(1, 'apple.jpg', '', '', 0),
(2, 'apple.jpg', '', '', 0),
(3, 'apple.jpg', '', '', 0),
(4, 'boss.jpg', '', 'image/jpeg', 0),
(5, 'apple.jpg', '', 'image/jpeg', 0),
(6, 'haden.png', '', 'image/png', 0),
(7, '2L7A9858.jpg', '', 'image/jpeg', 0),
(8, '6.jpg', '', 'image/jpeg', 0),
(9, 'dontDoItMeho.jpg', '', 'image/jpeg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
