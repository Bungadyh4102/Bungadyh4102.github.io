-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 12:46 PM
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
  `deskripsi` text NOT NULL,
  `file_tari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tari`
--

INSERT INTO `tari` (`id_tari`, `nama_tari`, `asal`, `deskripsi`, `file_tari`) VALUES
(5, 'Tari Piring', 'Minangkabau', 'Tari tradisional dari Minangkabau yang melambangkan rasa syukur kepada Tuhan.', '2024-10-16 08.40.12.jpg'),
(6, 'Tari Kecak', 'Bali', 'Tari tradisional dari Bali yang menggambarkan kisah Ramayana dengan suara khas &quot;cak&quot;.', '2024-10-16 08.39.36.png'),
(7, 'Tari Saman', 'Aceh', 'Tari asal Aceh yang terkenal dengan gerakan tangan cepat dan serempak.', '2024-10-16 08.38.57.jpg'),
(8, 'Tari Topeng', 'Cirebon', 'Tari dari Cirebon yang menggunakan topeng dengan berbagai karakter.', '2024-10-16 08.38.37.jpg'),
(9, 'Tari Reog', 'Jawa Timur', 'Tari dari Ponorogo dengan ciri khas topeng besar dan atraksi kekuatan.', '2024-10-16 08.38.19.jpg'),
(10, 'Tari Legong', 'Bali', 'Tari klasik Bali yang menggambarkan keanggunan dan keindahan gerakan tari.', '2024-10-16 08.36.51.jpg'),
(11, 'Tari Pendet', 'Bali', 'Tari persembahan dari Bali yang biasanya dilakukan di pura.', '2024-10-16 08.36.24.jpg'),
(12, 'Tari Serimpi', 'Yogyakarta', 'Tari klasik dari Yogyakarta yang terkenal dengan gerakan lemah lembut dan anggun.', '2024-10-16 08.36.08.jpg'),
(13, 'Tari Pajengan', 'Bali', 'Tari Pajegan adalah tarian Bali yang mengisahkan tentang kehidupan masyarakat Bali.', '2024-10-16 08.31.19.jpg'),
(14, 'Tari Jaipong', 'Jawa Barat', 'Tari Jaipong adalah tari tradisional yang menggabungkan unsur-unsur tari tradisional Sunda dan beberapa elemen modern.', '2024-10-16 08.29.18.jpg'),
(15, 'Tari Cendrawasih', 'Bali', 'Tari Cendrawasih adalah tari yang menggambarkan burung cendrawasih, simbol keindahan dan keanggunan.', '2024-10-16 08.28.09.jpg'),
(16, 'Tari Merak', 'Jawa Barat', 'Tari Merak adalah tari yang menggambarkan keindahan burung merak.', '2024-10-16 08.26.22.jpg'),
(17, 'Tari Bedaya', 'Jawa Tengah', 'Tari klasik dari Jawa Tengah yang biasanya dibawakan oleh sembilan penari wanita.', '2024-10-16 08.25.01.jpg'),
(18, 'Tari Gantar', 'Kalimantan Timur', 'Tari Gantar adalah tarian tradisional suku Dayak di Kalimantan Timur yang menggambarkan aktivitas menanam padi.', '2024-10-16 08.24.07.jpg'),
(19, 'Tari Hudog', 'Kalimantan Timur', 'Tari Hudoq adalah tari tradisional suku Dayak Modang dan Bahau di Kalimantan Timur. Tarian ini biasanya dilakukan untuk memohon keberuntungan dan perlindungan dari roh leluhur agar panen melimpah.', '2024-10-16 08.21.27.jpg'),
(20, 'Tari Maengket', 'Sulawesi Utara', 'Tari Maengket adalah tari tradisional suku Minahasa di Sulawesi Utara yang menggambarkan kegiatan menanam dan panen padi.', '2024-10-16 08.19.26.jpg'),
(23, 'Tari Cakalele', 'Sulawesi Utara', 'Tari Cakalele adalah tari perang yang berasal dari Sulawesi Utara, menggambarkan keberanian dan kekuatan para prajurit.', '2024-10-16 08.22.44.jpg'),
(25, 'Tari Lumense', 'Sulawesi Tengah', 'Tari Lumense berasal dari suku Tolaki di Sulawesi Tengah, biasanya dipentaskan dalam upacara adat untuk menyambut tamu kehormatan.', '2024-10-16 12.42.07.jpg');

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
  MODIFY `id_tari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
