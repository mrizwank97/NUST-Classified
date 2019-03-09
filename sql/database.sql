-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2018 at 11:46 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `addata`
--

DROP TABLE IF EXISTS `addata`;
CREATE TABLE IF NOT EXISTS `addata` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addata`
--

INSERT INTO `addata` (`id`, `name`, `email`, `phone`, `target`, `category`, `title`, `content`, `picture`) VALUES
(2, 'Abdul Wahab', 'awahab.bscs16seecs@seecs.edu.pk', '0343-0005696', 'seecs', 'education', 'Notes Sharing', 'AOA, My name is Abdul Wahab and I am from BSCS-6A (sophomore). I have created notes of all the subjects I have studied so far and want to share them with other fellow students. If you need any notes please contact me. If you have some notes that you want to share with others you can also contact me so we can work together in compiling complete notes for subjects. Thank you!', 'uploads/photos_105b02aeb2d3161_1526902450_250x250.jpg'),
(3, 'Abdullah Memon', 'amemon.bscs16seecs@seecs.edu.pk', '0334-5646321', 'seecs', 'events', 'SEECS Travel Diaries', 'AOA, I am Abdullah Memon, perhaps you already know me so lets get straight to the point. Me and a group of seriously hardworking students are planning a series of trips for people of SEECS (students from other schools can join too) to make our time here at SEECS the most memorable. In order to get details about these trips contact me on phone or email and stay tuned for more updates!', 'uploads/photos_115b02b0aade3a4_1526902954_250x250.jpg'),
(4, 'Muhammad Ihtisham Alam Khan', 'miakhan.bscs16seecs@seecs.edu.pk', '0332-9995580', 'seecs', 'events', 'Cultural Night', 'AOA, I am Ihtisham a member of SGA and I invite you all to the cultural night at 30th feburary 2018. Bring all your friends and enjoy the awesome atmosphere!', 'uploads/photos_145b02b0f247362_1526903026_250x250.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
