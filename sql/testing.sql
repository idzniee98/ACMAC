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
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `n_id` int(20) NOT NULL,
  `notifications_name` text NOT NULL,
  `message` text NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`n_id`, `notifications_name`, `message`, `active`) VALUES
(8, 'READING TEMPERATURE IS ABNORMAL', 'Please take note on 2022-07-10. unnormal temperature , take action', 0),
(9, 'READING HUMIDITY IS ABNORMAL', 'please aware unnormal Humidity on 60.8%', 0),
(15, 'READING TEMPERATURE IS ABNORMAL', 'Abnormal temperature on 2022-06-11 at 31.3C, Please take action', 0),
(16, 'READING TEMPERATURE IS ABNORMAL', 'asd', 0),
(17, 'READING TEMPERATURE IS ABNORMAL', 'Please take note on 2022-06-20, abnormal temperature, take action', 0),
(18, 'READING TEMPERATURE IS ABNORMAL', 'Abnormal temperature on 2022-06-20, please take action', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`n_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `n_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
