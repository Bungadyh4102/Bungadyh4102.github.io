-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 03:49 AM
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
-- Database: `tari_tradisional`
--

-- --------------------------------------------------------

--
-- Table structure for table `tari`
--

CREATE TABLE `tari` (
  `id_tari` int(11) NOT NULL,
  `nama_tari` varchar(70) NOT NULL,
  `asal` varchar(70) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tari`
--

INSERT INTO `tari` (`id_tari`, `nama_tari`, `asal`, `deskripsi`) VALUES
(2, 'Tari Kecak', 'Bali', 'Tari Kecak adalah tarian ritual khas Bali yang menggambarkan kisah Ramayana, dimana para penari pria duduk melingkar dan melantunkan kata &quot;cak&quot; secara bersamaan sambil menggerakkan tangan. Tarian ini biasanya dibawakan tanpa iringan alat musik.'),
(4, 'Tari Saman', 'Aceh', 'Tari Saman merupakan tarian tradisional yang biasanya dibawakan oleh sekelompok penari pria. Tarian ini terkenal dengan gerakan cepat, ritmis, dan sinkronisasi yang sangat presisi, serta diiringi dengan syair yang berisi nasihat atau pujian.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tari`
--
ALTER TABLE `tari`
  ADD PRIMARY KEY (`id_tari`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tari`
--
ALTER TABLE `tari`
  MODIFY `id_tari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
