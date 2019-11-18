-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2019 at 01:16 
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robot`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(5) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `product` varchar(100) NOT NULL,
  `client` varchar(100) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `sum` varchar(6) NOT NULL,
  `place` varchar(50) NOT NULL,
  `manager` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `status`, `product`, `client`, `tel`, `paid`, `sum`, `place`, `manager`, `comment`) VALUES
(14, '18.11.2019 15:54', 'Ожидает поставки', 'Roomba 676', 'Иванов Иван Иванович', '89181234567', 'Не оплачен', '', 'КП', 'Максим', ''),
(15, '18.11.2019 15:55', 'В пункте выдачи', 'Roomba E5', 'Петров Петр Петрович', '89054563287', 'Оплачен', '29500', 'Доставка', 'Максим', 'ул. Красная, дом 5'),
(16, '18.11.2019 15:56', 'Выдан', 'Roomba 960', 'Конкина Екатерина Сергеевна', '89284569821', 'Оплачен', '38700', 'Магазин', 'Максим', ''),
(17, '18.11.2019 15:56', 'Отменён', 'Hobot 268', 'Овсеенко Андрей Анатольевич', '89002546317', 'Не оплачен', '', 'Магазин', 'Максим', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
