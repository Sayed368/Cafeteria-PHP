-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2021 at 07:28 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(3, 'Hot Drink'),
(4, 'Soft Drink'),
(5, 'Water'),
(6, 'dessert');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

DROP TABLE IF EXISTS `order_info`;
CREATE TABLE IF NOT EXISTS `order_info` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL DEFAULT 'process',
  `user_fk` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_fk` (`user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `status`, `user_fk`, `date`, `room`, `note`, `amount`) VALUES
(52, 'done', 38, '2021-01-05 21:28:46', '8', 'hello', 60),
(53, 'delivery', 38, '2021-01-05 21:29:16', '8', 'aaaaa', 25),
(54, 'delivery', 34, '2021-01-05 21:31:12', '1', 'www', 20),
(55, 'process', 37, '2021-01-05 22:12:33', '3', 'hello my first order', 60),
(56, 'process', 35, '2021-01-06 00:23:00', '5', 'hello admin', 110),
(57, 'delivery', 36, '2021-01-06 01:02:25', '3', 'aaaaaa', 255),
(59, 'delivery', 36, '2021-01-06 14:28:34', '3', 'jjjjjjjjjj', 80),
(62, 'done', 39, '2021-01-06 15:25:47', '1', '', 110),
(64, 'process', 35, '2021-01-06 20:42:27', '5', 'hello', 120);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_fk` int NOT NULL,
  `product_fk` int NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`order_fk`,`product_fk`),
  KEY `product_fk` (`product_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_fk`, `product_fk`, `count`) VALUES
(52, 9, 2),
(53, 7, 1),
(53, 8, 1),
(54, 7, 1),
(54, 10, 1),
(55, 7, 1),
(55, 8, 1),
(55, 9, 1),
(55, 10, 1),
(56, 12, 1),
(56, 15, 1),
(57, 9, 2),
(57, 10, 1),
(57, 16, 1),
(57, 17, 1),
(57, 18, 1),
(57, 19, 1),
(57, 20, 1),
(59, 17, 1),
(59, 19, 1),
(62, 12, 1),
(62, 13, 1),
(64, 16, 2),
(64, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `cat_fk` int DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_fk` (`cat_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `img_name`, `img_dir`, `cat_fk`) VALUES
(7, 'coffee', 15, 'coffee.jpg', 'images/coffee.jpg', NULL),
(8, 'Tea', 10, 'tea.jpeg', 'images/tea.jpeg', NULL),
(9, 'mango', 30, 'download.jpg', 'images/download.jpg', NULL),
(10, 'water', 5, '1.jpg', 'images/1.jpg', NULL),
(12, 'milkShake', 50, 'milk.jpg', '../addProduct/images/milk.jpg', NULL),
(13, 'moltenCake', 60, 'moltencack.jpg', '../addProduct/images/moltencack.jpg', NULL),
(14, 'cheeseCake', 70, 'cheese.jpg', '../addProduct/images/cheese.jpg', NULL),
(15, 'iceCream', 60, 'ice.jpg', '../addProduct/images/ice.jpg', NULL),
(16, 'frappuccino', 40, 'flab.jpg', 'images/flab.jpg', NULL),
(17, 'cola', 30, 'cola.png', 'images/cola.png', NULL),
(18, 'orange', 40, 'orange.jpg', 'images/orange.jpg', NULL),
(19, 'kunafa', 50, 'kunafa.jpg', 'images/kunafa.jpg', NULL),
(20, 'zalabia', 30, 'zalapia.png', 'images/zalapia.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ext` int NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `room_num` int NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `email`, `password`, `ext`, `img_name`, `img_dir`, `room_num`, `type`) VALUES
(34, 'sayed', 'sayed@gmail.com', '123456789', 2, 'review_1.jpg', '../users_images/review_1.jpg', 1, 'admin'),
(35, 'omima', 'omima@gmail.com', '123456789', 2, 'review_2.jpg', '../users_images/review_2.jpg', 2, 'user'),
(36, 'Ahmed', 'ahmed@gmail.com', '123456789', 3, 'team_6.jpg', '../users_images/team_6.jpg', 3, 'user'),
(37, 'ahmed', 'ahmed1@gmail.com', '123456789', 5, 'team_5.jpg', '../users_images/team_5.jpg', 5, 'user'),
(38, 'bassant', 'bassant@gmail.com', '123456789', 8, 'review_4.jpg', '../users_images/review_4.jpg', 8, 'user'),
(39, 'Henry J Smith', 'aa@gmail.com', '111111111', 22, 'team_2.jpg', '../users_images/team_2.jpg', 22, 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_fk`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`order_fk`) REFERENCES `order_info` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_fk`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
