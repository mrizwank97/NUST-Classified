-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2018 at 07:37 PM
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
  `price` varchar(30) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addata`
--

INSERT INTO `addata` (`id`, `name`, `email`, `phone`, `target`, `category`, `title`, `price`, `content`, `picture`) VALUES
(2, 'Abdul Wahab', 'awahab.bscs16seecs@seecs.edu.pk', '0343-0005696', 'seecs', 'education', 'Notes Sharing', '0', 'AOA, My name is Abdul Wahab and I am from BSCS-6A (sophomore). I have created notes of all the subjects I have studied so far and want to share them with other fellow students. If you need any notes please contact me. If you have some notes that you want to share with others you can also contact me so we can work together in compiling complete notes for subjects. Thank you!', 'uploads/photos_105b02aeb2d3161_1526902450_250x250.jpg'),
(3, 'Abdullah Memon', 'amemon.bscs16seecs@seecs.edu.pk', '0334-5646321', 'seecs', 'events', 'SEECS Travel Diaries', '0', 'AOA, I am Abdullah Memon, perhaps you already know me so lets get straight to the point. Me and a group of seriously hardworking students are planning a series of trips for people of SEECS (students from other schools can join too) to make our time here at SEECS the most memorable. In order to get details about these trips contact me on phone or email and stay tuned for more updates!', 'uploads/photos_115b02b0aade3a4_1526902954_250x250.jpg'),
(4, 'Muhammad Ihtisham Alam Khan', 'miakhan.bscs16seecs@seecs.edu.pk', '0332-9995580', 'seecs', 'events', 'Cultural Night', '0', 'AOA, I am Ihtisham a member of SGA and I invite you all to the cultural night at 30th feburary 2018. Bring all your friends and enjoy the awesome atmosphere!', 'uploads/photos_145b02b0f247362_1526903026_250x250.jpg'),
(5, 'Abdullah Memon', 'amemon.bscs16seecs@seecs.edu.pk', '0334-5646321', 'sada', 'events', 'LIGHTS OUT', '0', 'As you all may know about LIGHTS OUTS and even if you dont, now is a good time to know about it as the event is HEREEEEEEEE!!! So grab your tickets from C1, C2 and SADA! Feel free to contact me on my phone and email to know more about the details of the event!', 'uploads/photos_105b02b5ee18160_1526904302_250x250.jpg'),
(15, 'Muhammad Ihtisham Alam Khan', 'miakhan.bscs16seecs@seecs.edu.pk', '0332-9995580', 'sada', 'events', 'ARTS Competition', '0', 'AOA, My name is Muhammad Ihtisham and I invite students from all over NUST to participate in open for all arts competition being conducted by SADA the school of ARTS. Anyone can join the competition by registering at the spot. Winners will get prizes and appreciation certificate from SADA\'s dean. Registration fee is 500Rs.', 'uploads/photos_105b02ef9280a72_1526919058_250x250.jpg'),
(17, 'Abdul Razaq Jawad', 'arazaq.bscs16seecs@seecs.edu.pk', '0336-3318794', 'seecs', 'projects', 'Smart Parking System', '0', 'Hello, My name is Jawad and I am a Computer Science Sophomore. I am making a smart parking management system for SEECS under the supervision of Sir Nasir Mehmood. For this purpose I need a team of very dedicated students who can help me in this project. I will encourage the freshman to apply as this would be a very interesting opportunity for them to learn. Kindly send me your CVs in mail. Thanks', 'uploads/photos_115b02f32e4b4b0_1526919982_250x250.jpg'),
(25, 'Essam Asif', 'easif.bscs16seecs@seecs.edu.pk', '0334-1113826', 'sada', 'help', 'Need Help in Semester Project', '0', 'Hello, My name is essam and i need some help for my semester project. It is about demonstrating light and space using 3-d models. I joined a little late so my basis are not very clear. I\'ll really appreciate the help. Thanks', 'uploads/photos_135b02fd29e31fc_1526922537_250x250.jpg'),
(26, 'Abdul Wahab', 'awahab.bscs16seecs@seecs.edu.pk', '0343-0005696', 'sada', 'education', 'Introduction To Computers', '0', 'AOA, I am Abdul Wahab from SEECS. I am organizing a few lectures and seminars in SEECS for students from other schools to give them basic knowledge of computers. As we are moving towards the automation era knowledge about computers is very crucial regardless of your field, so keeping that in mind and the will to learn more please apply for these lecture sessions. ', 'uploads/photos_135b032ba29616c_1526934434_250x250.jpg'),
(27, 'Muhammad Rizwan Khalid', 'mkhalid.bscs16seecs@seecs.edu.pk', '0335-6081155', 'sada', 'buyandsell', 'Need a Painter', '0', 'AOA, I am Muhammad Rizwan Khalid from SEECS and I have a great interest in arts and paintings. I am a hostelite and the empty walls of the hostel room drive me crazy! I wanted to buy a painting but it occurred to me that I can buy it from my fellow nustians from SADA. If anyone is a painter and has paintings for sale or is willing to paint for a good price please contact me. Thank You!', 'uploads/photos_145b032d3d408f4_1526934845_250x250.jpg'),
(29, 'Sheamus', 'sheamus@wwe.com', '03-******', 'sada', 'buyandsell', 'Want to sell my drawing board', '0', 'I have bought a new drawing board but my old one is in real good condition so if anyone is interested, please contact me via email.', 'uploads/photos_135b043988786a8_1527003528_250x250.jpg'),
(30, 'Muhammad Shrjeel', 'msharjeel.bscs16seecs@seecs.edu.pk', '03-00000000', 'seecs', 'post', 'Cricket Tournament', '0', 'As Ramadan is here and Ramadan and cricket have a very old history, me and my class fellows are trying to bring this culture here in NUST. So please join us and enjoy!', 'uploads/photos_155b043bd9e56e6_1527004121_250x250.jpg'),
(31, 'Hamza', 'hamza.barch16sada@sada.com', '03-11111111', 'sada', 'projects', 'Final Year Project', '0', 'Hello, I am hamza a final year student here at SADA. For our Final year project we have chosen an industry level project which is also funded but we need a team from different schools. Please send in your CVs. This will be a very good learning opportunity for all the participants.', 'uploads/photos_115b043dfce0e33_1527004668_250x250.jpg'),
(35, 'Darab Bin Saeed', 'darab@gmail.com', '03-222222', 'nbs', 'events', 'ISB United comes to NUST', 'none', 'The winners of the first and third PSL are coming to NUST to share the trophy with NUSTians. Come along with your friends to meet the champions and give them a warm welcome.', 'uploads/photos_125b0454ed2d68e_1527010541_250x250.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
