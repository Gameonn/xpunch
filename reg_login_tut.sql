-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2014 at 10:20 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reg_login_tut`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('28172edc6d61675b9fc5cb2f56b3b938', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.101 Safari/537.36', 1413888513, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"26";s:8:"username";s:5:"admin";s:12:"is_logged_in";b:1;}'),
('4be1653690d661be4ed6b72b8d44a06b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.101 Safari/537.36', 1414401161, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"26";s:8:"username";s:5:"admin";s:12:"is_logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `email`, `message`, `userid`) VALUES
(11, 'malpani', 'malpani@poplify.com', 'Approve Registration', 30),
(12, 'malpani', 'malpani@poplify.com', 'Approve Registration', 30),
(13, 'malpani', 'malpani@poplify.com', 'Approve Registration', 30),
(14, 'malpani', 'malpani@poplify.com', 'Approve Registration', 30),
(15, 'malpani', 'malpani@poplify.com', 'Approve Registration', 30),
(16, 'amitej', 'amitej.kalra@intuzion.com', 'Reset Punch out', 22),
(17, 'rahul07', 'rahul@gmail.com', 'Reset Punch out', 33);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `time` timestamp NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `time`, `type`) VALUES
(10, 'malik is registered', '2014-10-13 13:13:09', 'Registered'),
(11, 'sunanda has punched out', '2014-10-13 13:33:20', 'punch out'),
(12, 'pranav has punched in', '2014-10-13 13:34:26', 'punch in'),
(13, 'amitej has punched in', '2014-10-14 05:16:19', 'punch in'),
(14, 'richa has punched in', '2014-10-14 05:18:30', 'punch in'),
(15, 'sunanda has punched in', '2014-10-14 13:40:26', 'punch in'),
(16, 'amitej has punched in', '2014-10-15 05:27:21', 'punch in'),
(17, 'amitej has punched out', '2014-10-15 10:27:19', 'punch out'),
(18, 'amitej has punched out', '2014-10-15 10:28:06', 'punch out'),
(19, 'bond007 is registered', '2014-10-15 11:36:47', 'Registered'),
(20, 'amitej has punched in', '2014-10-17 09:02:43', 'punch in'),
(21, 'richa has punched in', '2014-10-17 09:02:55', 'punch in'),
(22, 'mac123 is registered', '2014-10-17 09:19:09', 'Registered'),
(23, 'malpani has punched in', '2014-10-17 09:20:00', 'punch in'),
(28, 'sunanda has punched in', '2014-10-17 11:04:36', 'punch in'),
(30, 'daljeet is registered', '2014-10-17 11:12:46', 'Registered'),
(31, 'daljeet has punched in', '2014-10-17 11:16:59', 'punch in'),
(32, 'pranav has punched out', '2014-10-13 15:30:00', 'punch out'),
(33, 'pranav has punched in', '2014-10-17 13:28:17', 'punch in'),
(34, 'pranav has punched in', '2014-10-17 13:30:11', 'punch in'),
(35, 'richa has punched out', '2014-10-17 15:30:00', 'punch out'),
(36, 'richa has punched in', '2014-10-18 05:15:17', 'punch in'),
(37, 'amitej has punched out', '2014-10-17 15:30:00', 'punch out'),
(38, 'amitej has punched in', '2014-10-18 05:15:30', 'punch in'),
(39, 'mayank has punched out', '2014-10-13 15:30:00', 'punch out'),
(40, 'mayank has punched in', '2014-10-18 05:21:32', 'punch in'),
(41, 'malpani has punched out', '2014-10-17 15:30:00', 'punch out'),
(42, 'malpani has punched out', '2014-10-17 15:30:00', 'punch out'),
(43, 'malpani has punched out', '2014-10-17 15:30:00', 'punch out'),
(44, 'amitej has punched out', '2014-10-18 07:55:12', 'punch out'),
(45, 'rahul07 is registered', '2014-10-18 09:25:45', 'Registered'),
(46, 'rahul07 has punched in', '2014-10-18 09:28:02', 'punch in'),
(47, 'rahul07 has punched out', '2014-10-18 09:28:03', 'punch out'),
(48, 'amitej has punched out', '2014-10-18 15:30:00', 'punch out'),
(49, 'amitej has punched in', '2014-10-20 05:08:40', 'punch in'),
(50, 'richa has punched out', '2014-10-18 15:30:00', 'punch out'),
(51, 'richa has punched in', '2014-10-20 05:45:32', 'punch in'),
(52, 'mayank has punched out', '2014-10-18 15:30:00', 'punch out'),
(53, 'mayank has punched in', '2014-10-20 07:03:20', 'punch in'),
(54, 'mayank has punched out', '2014-10-20 15:30:00', 'punch out'),
(55, 'mayank has punched in', '2014-10-21 05:17:25', 'punch in'),
(56, 'amitej has punched out', '2014-10-20 15:30:00', 'punch out'),
(57, 'amitej has punched in', '2014-10-21 07:24:43', 'punch in'),
(58, 'malpani has punched out', '2014-10-17 15:30:00', 'punch out'),
(59, 'malpani has punched in', '2014-10-21 07:35:18', 'punch in'),
(60, 'aditya098 is registered', '2014-10-21 07:47:02', 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `status`) VALUES
(20, 'mayank', 'e10adc3949ba59abbe56e057f20f883e', 'Mayank', 'Saxena', 'mayank@gmail.com', 'Active'),
(22, 'amitej', 'e10adc3949ba59abbe56e057f20f883e', 'Amitej', 'Kalra', 'amitej.kalra@intuzion.com', 'Active'),
(26, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Ankit', 'Jindal', 'ankitjindal@poplify.com', 'Active'),
(27, 'pranav', 'e10adc3949ba59abbe56e057f20f883e', 'Pranav', 'Malik', 'pranavmalik@gmail.com', 'Active'),
(28, 'richa', 'e10adc3949ba59abbe56e057f20f883e', 'Richa', 'Goyal', 'rics.goyal@gmail.com', 'Active'),
(29, 'sunanda', 'e10adc3949ba59abbe56e057f20f883e', 'Sunanda', 'Bansal', 'sunanda@poplify.com', 'Active'),
(30, 'malpani', 'e10adc3949ba59abbe56e057f20f883e', 'Abhishek', 'Malpani', 'malpani@poplify.com', 'Active'),
(32, 'daljeet', 'e10adc3949ba59abbe56e057f20f883e', 'Daljeet', 'Singh', 'dj1443@gmail.com', 'Active'),
(33, 'rahul07', 'e10adc3949ba59abbe56e057f20f883e', 'Rahul', 'Mehta', 'rahul@gmail.com', 'Active'),
(34, 'aditya098', 'e10adc3949ba59abbe56e057f20f883e', 'Aditya', 'Mahajan', 'aditya098@gmail.com', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `xpunch`
--

CREATE TABLE IF NOT EXISTS `xpunch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `punch_time` timestamp NOT NULL,
  `punch_type` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=356 ;

--
-- Dumping data for table `xpunch`
--

INSERT INTO `xpunch` (`id`, `username`, `punch_time`, `punch_type`, `userid`) VALUES
(274, 'amitej', '2014-10-09 05:40:12', 'punch in', 22),
(275, 'AnkitSeth', '2014-10-09 05:40:33', 'punch in', 25),
(278, 'AnkitSeth', '2014-10-09 10:15:15', 'punch out', 25),
(280, 'amitej', '2014-10-09 13:49:49', 'punch out', 22),
(286, 'pranav', '2014-10-10 05:07:35', 'punch in', 27),
(287, 'pranav', '2014-10-10 05:07:36', 'punch out', 27),
(288, 'amitej', '2014-10-10 06:11:02', 'punch in', 22),
(289, 'amitej', '2014-10-11 06:34:09', 'punch in', 22),
(291, 'richa', '2014-10-11 12:29:42', 'punch in', 28),
(295, 'mayank', '2014-10-11 12:30:07', 'punch in', 20),
(296, 'mayank', '2014-10-11 12:30:09', 'punch out', 20),
(298, 'amitej', '2014-10-13 08:43:45', 'punch in', 22),
(299, 'mayank', '2014-10-13 10:09:34', 'punch in', 20),
(304, 'richa', '2014-10-13 12:23:02', 'punch in', 28),
(307, 'malpani', '2014-10-13 12:35:17', 'punch in', 30),
(308, 'malpani', '2014-10-13 12:35:32', 'punch out', 30),
(309, 'sunanda', '2014-10-13 12:59:12', 'punch in', 29),
(311, 'sunanda', '2014-10-13 13:33:20', 'punch out', 29),
(312, 'pranav', '2014-10-13 13:34:26', 'punch in', 27),
(313, 'amitej', '2014-10-14 05:16:19', 'punch in', 22),
(314, 'richa', '2014-10-14 05:16:30', 'punch in', 28),
(315, 'sunanda', '2014-10-14 05:16:30', 'punch in', 29),
(316, 'amitej', '2014-10-15 05:27:21', 'punch in', 22),
(318, 'amitej', '2014-10-15 10:28:06', 'punch out', 22),
(319, 'amitej', '2014-10-17 09:02:43', 'punch in', 22),
(320, 'richa', '2014-10-17 09:02:55', 'punch in', 28),
(321, 'malpani', '2014-10-17 09:20:00', 'punch in', 30),
(322, 'mayank', '2014-10-13 15:30:00', 'punch out', 20),
(326, 'sunanda', '2014-10-14 15:30:00', 'punch out', 29),
(327, 'sunanda', '2014-10-17 11:04:36', 'punch in', 29),
(328, 'AnkitSeth', '2014-10-09 15:30:00', 'punch out', 25),
(329, 'daljeet', '2014-10-17 11:16:59', 'punch in', 32),
(330, 'pranav', '2014-10-13 15:30:00', 'punch out', 27),
(331, 'pranav', '2014-10-17 13:28:17', 'punch in', 27),
(332, 'pranav', '2014-10-17 13:30:11', 'punch in', 27),
(333, 'richa', '2014-10-17 15:30:00', 'punch out', 28),
(334, 'richa', '2014-10-18 05:15:17', 'punch in', 28),
(335, 'amitej', '2014-10-17 15:30:00', 'punch out', 22),
(336, 'amitej', '2014-10-18 05:15:30', 'punch in', 22),
(337, 'mayank', '2014-10-13 15:30:00', 'punch out', 20),
(338, 'mayank', '2014-10-18 05:21:32', 'punch in', 20),
(339, 'malpani', '2014-10-17 15:30:00', 'punch out', 30),
(340, 'malpani', '2014-10-17 15:30:00', 'punch out', 30),
(341, 'malpani', '2014-10-17 15:30:00', 'punch out', 30),
(343, 'rahul07', '2014-10-18 09:28:02', 'punch in', 33),
(344, 'amitej', '2014-10-18 15:30:00', 'punch out', 22),
(345, 'amitej', '2014-10-20 05:08:40', 'punch in', 22),
(346, 'richa', '2014-10-18 15:30:00', 'punch out', 28),
(347, 'richa', '2014-10-20 05:45:32', 'punch in', 28),
(348, 'mayank', '2014-10-18 15:30:00', 'punch out', 20),
(349, 'mayank', '2014-10-20 07:03:20', 'punch in', 20),
(350, 'mayank', '2014-10-20 15:30:00', 'punch out', 20),
(351, 'mayank', '2014-10-21 05:17:25', 'punch in', 20),
(352, 'amitej', '2014-10-20 15:30:00', 'punch out', 22),
(353, 'amitej', '2014-10-21 07:24:43', 'punch in', 22),
(354, 'malpani', '2014-10-17 15:30:00', 'punch out', 30),
(355, 'malpani', '2014-10-21 07:35:18', 'punch in', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
