-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 12:09 PM
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
-- Database: `acmac`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(250) NOT NULL,
  `note1` varchar(500) NOT NULL,
  `note2` varchar(500) NOT NULL,
  `note3` varchar(500) NOT NULL,
  `note4` varchar(500) NOT NULL,
  `date_day` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `note1`, `note2`, `note3`, `note4`, `date_day`) VALUES
(13, 'Diingatkan semula kepada semua staff untuk mengawasi suhu bilik agar tidak ada ', 'sebarang masalah yang akan timbul. ', '', '', '2022-05-19'),
(16, 'Minute Meeting', 'Date:5/6/2022', 'Link: example@webex.com', '', '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `staffid` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffinfo`
--

INSERT INTO `staffinfo` (`staffid`, `name`, `phoneno`, `email`, `address`, `password`, `role`, `date`, `time`) VALUES
('A01', 'Amirul Mukhlis', '01215142265', 'amirulmukhlis@gmail.com', 'Meru Klang Selangor', 'A01amirul', 'Manager', '2022-04-12', '23:15:38'),
('A02', 'Syukri Wagiman', '0120214553', 'syukri@gmail.com', 'Batu Pahat Johor', 'A02syukri', 'Manager', '2022-03-10', '23:15:38'),
('A03', 'Muhammad Fitri Bin Mohd Ahmari', '0176964190', 'fitri@gmail.com', 'Bangi Selangor', 'A03fitri', 'Manager', '2022-05-30', '14:54:15'),
('S01', 'Idzni Rashid', '01121716152', 'idzni@gmail.com', 'Ayer Keroh Melaka', 'S01idzni', 'Staff', '2022-05-29', '21:00:21'),
('S02', 'Syafei Saupi', '0123456789', 'syafei@gmail.com', 'Kuala Krai Kelantan', 'S02syafei', 'Staff', '2022-05-08', '22:16:58'),
('S03', 'Aiman Amin', '0123456789', 'aiman@gmail.com', 'Kajang Selangor', 'S03aiman', 'Staff', '2022-05-25', '14:38:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
