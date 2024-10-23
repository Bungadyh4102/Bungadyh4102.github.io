-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 01:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$8gFCXCBdvvfSHrTZzRpUh.7bTC9j4ki5L42WiBcEBSQGvDdTXm1vS'),
(2, '123', '$2y$10$oBAu.2yKN0WmrC2H2MMLI.KZ517mlswTGpxcHge1xVyVXCandRdRy'),
(3, '234', '$2y$10$gT0EpgtGlK6jvExCXtERFO0VZ71t7Q1cOtEvWnW1tCjf1YTW5mw8m'),
(4, '123', '$2y$10$SU6rvocRZzlHobq78utWi.r/2Ks5h5LEPwGmqwgGF27X6YeFdZ9Xa'),
(5, '123', '$2y$10$lyh4qkbO5W/1iIBkle7u3ufDD2niT2IDeDExrIBkkHba2sACxe9Ka'),
(6, '123', '$2y$10$Gvq2jH6lbEHCiBUqHniwl.qZPuatK8m/nGVdy0xfY1S/roNl8cnUy'),
(7, '2309', '$2y$10$1UkDGrVmAHYEjZznROBEe.vEng1xBg/Z1N6bE0gKFb5RPvJMm9QYi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
