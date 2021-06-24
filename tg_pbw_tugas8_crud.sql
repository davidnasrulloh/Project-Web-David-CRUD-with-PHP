-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 02:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tg_pbw_tugas8_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(5, 'david', '$2y$10$2r23DOQvWfvB8LGXNyTMdOaUPyGUVWtVVEGTI1AeEgenGoBM1J0Ve'),
(6, 'admin', '$2y$10$aYhH.C2l0cEMdDJjhCM43euS.XFaiUsIJtBZGR8WCS8x4w3e/gPLG');

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `nama`, `email`, `nohp`, `jk`, `pesan`) VALUES
(1, 'David Nasrulloh', 'davidkrb52@gmail.com', '081554465073', 'laki-laki', 'Alhamduillah'),
(2, 'Sekar Annisa', 'davirkb77@gmail.com', '081554465073', 'perempuan', 'Yayayaya'),
(3, 'Yafi Anwary', 'davidkrb52@gmail.com', '081665504923', 'laki-laki', 'Alhamdulillah'),
(4, 'Anas Al Ayubi', 'anas@gmail.com', '081554466339', 'laki-laki', 'Sekarang bisa'),
(5, 'Dika helmy', 'dika@gmail.com', '085544231761', 'laki-laki', 'Bisa dong');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `nim` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jurusan`) VALUES
(1, '190441100060', 'David Nasrulloh', 'Sistem Informasi'),
(2, '190441100044', 'Anas Al Ayubi', 'Sistem Informasi'),
(3, '190441100052', 'M yafie Anwar', 'Teknik Industri'),
(9, '190441100046', 'Anisa Sekar Kumalasari', 'Teknik Industri'),
(11, '190441100002', 'Wilangga Okta', 'Teknik Industri'),
(12, '190441100008', 'Ajeng Kusnandar', 'Hukum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
