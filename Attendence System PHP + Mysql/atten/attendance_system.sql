-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 05:31 PM
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
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `is_present` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `attendance_date`, `is_present`) VALUES
(1, 1, '2023-11-27', 1),
(2, 1, '2023-11-27', 1),
(3, 2, '2023-11-27', 1),
(4, 3, '2023-11-27', 1),
(5, 5, '2023-11-27', 1),
(6, 1, '2023-11-27', 1),
(7, 2, '2023-11-27', 1),
(8, 3, '2023-11-27', 1),
(9, 5, '2023-11-27', 1),
(10, 1, '2023-11-27', 1),
(11, 2, '2023-11-27', 1),
(12, 3, '2023-11-27', 1),
(13, 5, '2023-11-27', 1),
(14, 1, '2023-11-27', 1),
(15, 2, '2023-11-27', 1),
(16, 3, '2023-11-27', 1),
(17, 5, '2023-11-27', 1),
(18, 1, '2023-11-27', 1),
(19, 2, '2023-11-27', 1),
(20, 3, '2023-11-27', 1),
(21, 5, '2023-11-27', 1),
(22, 6, '2023-11-27', 1),
(23, 1, '2023-11-27', 1),
(24, 2, '2023-11-27', 1),
(25, 3, '2023-11-27', 1),
(26, 5, '2023-11-27', 1),
(27, 6, '2023-11-27', 1),
(28, 1, '1970-01-01', 1),
(29, 2, '1970-01-01', 1),
(30, 3, '1970-01-01', 1),
(31, 5, '1970-01-01', 1),
(32, 6, '1970-01-01', 1),
(33, 1, '2023-11-17', 1),
(34, 2, '2023-11-27', 1),
(35, 3, '2023-11-27', 1),
(36, 5, '2023-11-27', 1),
(37, 6, '2023-11-27', 1),
(38, 2, '2023-11-27', 1),
(39, 3, '2023-11-27', 1),
(40, 5, '2023-11-27', 1),
(41, 6, '2023-11-27', 1),
(42, 2, '2023-11-27', 1),
(43, 3, '2023-11-27', 1),
(44, 5, '2023-11-27', 1),
(45, 6, '2023-11-27', 1),
(46, 2, '2023-11-27', 1),
(47, 2, '2023-11-16', 1),
(48, 1, '2023-11-09', 1),
(49, 2, '2023-11-09', 1),
(50, 3, '2023-11-09', 1),
(51, 2, '2023-11-27', 1),
(52, 3, '2023-11-27', 1),
(53, 2, '2023-11-27', 1),
(54, 3, '2023-11-27', 1),
(55, 2, '2023-11-27', 1),
(56, 3, '2023-11-27', 1),
(57, 2, '1970-01-01', 1),
(58, 3, '1970-01-01', 1),
(59, 5, '1970-01-01', 1),
(60, 2, '1970-01-01', 1),
(61, 3, '1970-01-01', 1),
(62, 5, '1970-01-01', 1),
(63, 2, '1970-01-01', 1),
(64, 3, '1970-01-01', 1),
(65, 5, '1970-01-01', 1),
(66, 5, '1970-01-01', 1),
(67, 8, '1970-01-01', 1),
(68, 9, '1970-01-01', 1),
(69, 12, '1970-01-01', 1),
(70, 12, '1970-01-01', 1),
(71, 12, '1970-01-01', 1),
(72, 8, '1970-01-01', 1),
(73, 9, '1970-01-01', 1),
(74, 13, '2023-11-28', 1),
(75, 13, '2023-11-28', 1),
(76, 14, '2023-11-28', 1),
(77, 15, '2023-11-28', 1),
(78, 1, '2023-11-28', 1),
(79, 2, '2023-11-28', 1),
(80, 3, '2023-11-28', 1),
(81, 5, '2023-11-28', 1),
(82, 6, '2023-11-28', 1),
(83, 8, '2023-11-28', 1),
(84, 9, '2023-11-28', 1),
(85, 12, '2023-11-28', 1),
(86, 16, '2023-11-28', 1),
(87, 17, '2023-11-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll_number`) VALUES
(1, 'Akshay', '50'),
(2, 'Askhaychame', '22'),
(3, 'Akshay CHameeee', '12'),
(5, 'va', '19'),
(6, 'omakar', '71'),
(8, 'Jiyan ', '34'),
(9, 'sahil', '89'),
(12, 'maximum value subarray', '90'),
(13, 'new', '100'),
(14, 'rohit', '112'),
(15, 'mayur', '555'),
(16, 'vit', '999'),
(17, 'TV', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_number` (`roll_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
