-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 06:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `complaint` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `name`, `phone`, `email`, `complaint`) VALUES
(1, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'Ragging'),
(2, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'asq'),
(3, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'aqw'),
(4, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'Firing\r\n'),
(5, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'Firing\r\n'),
(6, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'aw'),
(7, 'Mayur Satish Khadde', '7507738781', 'mayurkhadde49@gmail.com', 'awq'),
(8, 'Mayur Satish Khadde', '7507738781', 'mayur.khadde22@vit.edu', 'qwwq'),
(9, 'Mayur Satish Khaddeas', '7507738781', 'mayur.khadde22@vit.edu', 'qwqw'),
(10, 'Mayur Satish Khaddeas', '7507738781', 'mayur.khadde22@vit.edu', 'asdaw'),
(11, 'Mayur Satish Khaddeas', '7507738781', 'mayur.khadde22@vit.edu', 'asw'),
(12, 'Mayur Satish Khadde', '7507738781', 'mayur.khadde22@vit.edu', 'Aanad magar is idiot'),
(13, 'Mayur Satish Khadde', '7507738781', 'mayur.khadde22@vit.edu', 'Anad');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', 'user', 'user'),
(2, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
