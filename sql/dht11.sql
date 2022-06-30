-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 05:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temphum`
--

-- --------------------------------------------------------

--
-- Table structure for table `dht11`
--

CREATE TABLE `dht11` (
  `id` int(20) NOT NULL,
  `humidity` float DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `heatindex` float DEFAULT NULL,
  `time_day` time NOT NULL DEFAULT current_timestamp(),
  `date_day` date NOT NULL DEFAULT current_timestamp(),
  `year` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dht11`
--

INSERT INTO `dht11` (`id`, `humidity`, `temperature`, `heatindex`, `time_day`, `date_day`, `year`) VALUES
(1, 50, 16, 38, '15:35:25', '2022-03-10', 2022),
(2, 50.2, 16.2, 38.5, '15:35:35', '2022-03-10', 2022),
(3, 50.9, 16.3, 44.24, '15:35:45', '2022-03-10', 2022),
(4, 40.9, 15.9, 37.5, '15:35:55', '2022-03-10', 2022),
(5, 60.7, 34.6, 44.2, '15:36:05', '2022-04-09', 2022),
(6, 60.7, 34.6, 44.2, '15:36:15', '2022-04-09', 2022),
(7, 60.7, 34.6, 44.2, '15:36:25', '2022-04-09', 2022),
(17, 50.5, 28.2, 28.72, '15:54:50', '2022-05-19', 2022),
(18, 50.7, 28.2, 28.74, '15:55:10', '2022-05-19', 2022),
(19, 50.3, 28.1, 28.59, '15:55:30', '2022-05-19', 2022),
(20, 49.9, 28.1, 28.55, '15:55:50', '2022-05-19', 2022),
(21, 50.5, 28.1, 28.61, '15:56:10', '2022-05-19', 2022),
(22, 49.8, 28.2, 28.66, '15:56:30', '2022-05-19', 2022),
(23, 50.2, 28.3, 28.81, '15:56:50', '2022-05-19', 2022),
(24, 50.3, 28.2, 28.71, '15:57:11', '2022-05-19', 2022),
(25, 50.4, 28.2, 28.71, '15:57:31', '2022-05-19', 2022),
(26, 50.5, 28.2, 28.72, '15:57:51', '2022-05-19', 2022),
(27, 49.9, 28.1, 28.55, '15:58:26', '2022-05-19', 2022),
(28, 56.3, 30.4, 32.83, '14:10:13', '2022-05-20', 2022),
(29, 53.7, 29.8, 31.34, '14:15:14', '2022-05-20', 2022),
(30, 51.4, 29.2, 30.11, '14:20:14', '2022-05-20', 2022),
(31, 51.7, 28.6, 29.34, '14:25:14', '2022-05-20', 2022),
(32, 49.6, 28.3, 28.75, '14:30:14', '2022-05-20', 2022),
(33, 50.9, 28.1, 28.65, '14:35:15', '2022-05-20', 2022),
(34, 50.4, 28, 28.48, '14:40:15', '2022-05-20', 2022),
(35, 50.5, 28, 28.49, '14:40:43', '2022-05-20', 2022),
(36, 50.3, 27.5, 27.93, '14:42:12', '2022-05-20', 2022),
(37, 50.8, 27.6, 28.08, '14:42:51', '2022-05-20', 2022),
(42, 50.9, 26.3, 32.19, '17:40:51', '2022-05-25', 2022),
(43, 50.9, 26.3, 32.19, '17:45:51', '2022-05-25', 2022),
(44, 51.3, 26.4, 29.19, '17:50:51', '2022-05-25', 2022),
(45, 51.3, 26.35, 29.19, '17:55:51', '2022-05-25', 2022),
(46, 51.4, 26.5, 29.18, '18:00:51', '2022-05-25', 2022),
(47, 55.4, 26.7, 27.44, '18:05:51', '2022-05-25', 2022),
(48, 55.5, 29.8, 31.64, '18:10:51', '2022-05-25', 2022),
(49, 54, 30.8, 33.08, '18:16:59', '2022-05-25', 2022),
(50, 53.6, 31.3, 33.91, '18:21:59', '2022-05-25', 2022),
(51, 53.6, 31.5, 34.29, '18:26:59', '2022-05-25', 2022),
(52, 62.7, 33.7, 42.47, '11:07:19', '2022-06-05', 2022),
(53, 62.1, 33.8, 42.5, '11:12:19', '2022-06-05', 2022),
(54, 61.5, 34.1, 43.1, '11:17:19', '2022-06-05', 2022),
(55, 60.2, 34, 42.26, '11:22:21', '2022-06-05', 2022),
(56, 60, 34, 42.18, '11:27:19', '2022-06-05', 2022),
(57, 60.4, 33.9, 42.07, '11:32:19', '2022-06-05', 2022),
(58, 56.5, 27.8, 28.81, '21:07:11', '2022-06-06', 2022),
(59, 54.5, 25.5, 25.53, '21:12:12', '2022-06-06', 2022),
(60, 54.2, 24.5, 24.42, '21:17:12', '2022-06-06', 2022),
(61, 53.8, 24.3, 24.19, '21:22:12', '2022-06-06', 2022),
(62, 55.3, 25.4, 25.44, '21:27:12', '2022-06-06', 2022),
(63, 56.1, 25.7, 25.79, '21:32:12', '2022-06-06', 2022),
(64, 55.1, 24.3, 24.22, '21:37:12', '2022-06-06', 2022),
(65, 52.2, 23.8, 23.6, '21:42:12', '2022-06-06', 2022),
(66, 55.6, 26.1, 26.86, '21:47:12', '2022-06-06', 2022),
(67, 55.7, 24.5, 24.46, '21:52:12', '2022-06-06', 2022),
(68, 58.4, 25.6, 25.74, '21:57:12', '2022-06-06', 2022),
(69, 59.7, 26.2, 27.13, '22:02:12', '2022-06-06', 2022),
(70, 57.2, 24.4, 24.39, '22:07:12', '2022-06-06', 2022),
(71, 62.4, 27.1, 28.39, '22:12:12', '2022-06-06', 2022),
(72, 58.5, 24.6, 24.64, '22:17:12', '2022-06-06', 2022),
(73, 61.1, 26.7, 27.78, '22:22:12', '2022-06-06', 2022),
(74, 60.5, 24.9, 25.03, '22:27:12', '2022-06-06', 2022),
(75, 61, 26.5, 27.53, '22:32:12', '2022-06-06', 2022),
(76, 62.6, 25.5, 25.74, '22:37:12', '2022-06-06', 2022),
(81, 57.5, 34.1, 41.42, '17:13:10', '2022-06-20', 2022),
(82, 57.8, 34.2, 41.8, '17:18:10', '2022-06-20', 2022),
(83, 58.1, 34.2, 41.93, '17:23:11', '2022-06-20', 2022),
(84, 57.1, 33.8, 40.48, '17:28:11', '2022-06-20', 2022),
(85, 54.8, 31.6, 34.78, '17:33:11', '2022-06-20', 2022),
(86, 51, 30.5, 31.99, '17:38:11', '2022-06-20', 2022),
(87, 56.4, 27.3, 28.18, '17:43:11', '2022-06-20', 2022),
(88, 60.2, 24.4, 24.47, '17:48:11', '2022-06-20', 2022),
(89, 55.6, 25.4, 25.45, '17:53:11', '2022-06-20', 2022),
(93, 70.2, 21.7, 21.76, '10:30:01', '2022-06-22', 2022),
(94, 62.5, 21.6, 21.45, '10:35:01', '2022-06-22', 2022),
(95, 55.4, 27.3, 28.1, '10:40:02', '2022-06-22', 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dht11`
--
ALTER TABLE `dht11`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dht11`
--
ALTER TABLE `dht11`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
