-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 09:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan`
--
CREATE DATABASE IF NOT EXISTS `db_keuangan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_keuangan`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidang`
--

DROP TABLE IF EXISTS `tbl_bidang`;
CREATE TABLE `tbl_bidang` (
  `_id` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`_id`, `nama_bidang`, `status`, `created_at`) VALUES
(2, 'Pengendalian', '1', '2021-02-01 03:46:18'),
(3, 'Penanaman Modal', '1', '2021-02-01 03:46:28'),
(4, 'Pelayananan', '1', '2021-02-01 03:46:55'),
(5, 'Sekertariat', '1', '2021-02-01 03:51:03'),
(6, 'Dinas', '1', '2021-02-01 03:51:43'),
(8, 'Keuangan', '0', '2021-02-02 06:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

DROP TABLE IF EXISTS `tbl_jabatan`;
CREATE TABLE `tbl_jabatan` (
  `_id` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`_id`, `nama_jabatan`, `status`, `created_at`) VALUES
(1, 'Kepala Dinas', '1', '2021-02-01 04:09:08'),
(2, 'Kepala Bidang', '1', '2021-02-01 04:09:24'),
(3, 'Kepala Seksi', '1', '2021-02-01 04:09:34'),
(4, 'Super Admin', '1', '2021-02-01 05:12:41'),
(5, 'Admin', '1', '2021-02-01 05:12:46'),
(6, 'Pelaksana', '1', '2021-02-01 05:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

DROP TABLE IF EXISTS `tbl_kegiatan`;
CREATE TABLE `tbl_kegiatan` (
  `_id` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `id_program` int(11) NOT NULL,
  `kode_kegiatan` varchar(15) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`_id`, `nama_kegiatan`, `id_program`, `kode_kegiatan`, `status`, `created_at`) VALUES
(19, 'ADMINISTRASI UMUM PERANGKAT DAERAH', 127, '2.06.', '1', '2021-02-02 01:16:12'),
(20, 'test', 128, 'test', '1', '2021-02-02 06:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

DROP TABLE IF EXISTS `tbl_pengajuan`;
CREATE TABLE `tbl_pengajuan` (
  `_id` int(11) NOT NULL,
  `kode_pengajuan` varchar(15) NOT NULL,
  `total` bigint(20) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` char(11) NOT NULL DEFAULT '0',
  `catatan` text DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`_id`, `kode_pengajuan`, `total`, `id_bidang`, `id_user`, `status`, `catatan`, `last_update`, `created_at`) VALUES
(1, 'pengajuan601b6b', 25000000, 6, 1, '0', NULL, NULL, '2021-02-04 03:35:57'),
(2, 'pengajuan601b6d', 25000000, 6, 1, '0', NULL, NULL, '2021-02-04 03:42:29'),
(3, 'pengajuan601b92', 9000000, 6, 1, '0', NULL, NULL, '2021-02-04 06:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_detail`
--

DROP TABLE IF EXISTS `tbl_pengajuan_detail`;
CREATE TABLE `tbl_pengajuan_detail` (
  `_id` int(11) NOT NULL,
  `kode_pengajuan` varchar(15) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_detail`
--

INSERT INTO `tbl_pengajuan_detail` (`_id`, `kode_pengajuan`, `id_program`, `id_kegiatan`, `id_sub`, `id_rekening`, `jumlah`, `created_at`) VALUES
(1, 'pengajuan601b6b', 127, 19, 5, 4, 15000000, '2021-02-04 03:33:37'),
(2, 'pengajuan601b6b', 128, 20, 6, 5, 10000000, '2021-02-04 03:33:37'),
(3, 'pengajuan601b6b', 127, 19, 5, 4, 15000000, '2021-02-04 03:34:03'),
(4, 'pengajuan601b6b', 128, 20, 6, 5, 10000000, '2021-02-04 03:34:03'),
(5, 'pengajuan601b6b', 127, 19, 5, 4, 15000000, '2021-02-04 03:34:04'),
(6, 'pengajuan601b6b', 128, 20, 6, 5, 10000000, '2021-02-04 03:34:04'),
(7, 'pengajuan601b6b', 127, 19, 5, 4, 15000000, '2021-02-04 03:35:57'),
(8, 'pengajuan601b6b', 128, 20, 6, 5, 10000000, '2021-02-04 03:35:57'),
(9, 'pengajuan601b6d', 127, 19, 5, 4, 15000000, '2021-02-04 03:42:29'),
(10, 'pengajuan601b6d', 128, 20, 6, 5, 10000000, '2021-02-04 03:42:29'),
(11, 'pengajuan601b92', 127, 19, 5, 4, 4000000, '2021-02-04 06:21:07'),
(12, 'pengajuan601b92', 127, 19, 5, 7, 5000000, '2021-02-04 06:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

DROP TABLE IF EXISTS `tbl_program`;
CREATE TABLE `tbl_program` (
  `_id` int(11) NOT NULL,
  `nama_program` text NOT NULL,
  `kode_program` varchar(15) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`_id`, `nama_program`, `kode_program`, `status`, `created_at`) VALUES
(127, 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN / KOTA ', '5.2.18.01.', '1', '2021-02-02 01:14:37'),
(128, 'PENGELOLAAN DATA DAN SISTEM INFORMASI PENANAMAN MODAL', '5.2.18.06.', '1', '2021-02-02 01:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progress`
--

DROP TABLE IF EXISTS `tbl_progress`;
CREATE TABLE `tbl_progress` (
  `_id` int(11) NOT NULL,
  `nama_progress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_progress`
--

INSERT INTO `tbl_progress` (`_id`, `nama_progress`) VALUES
(1, 'Entry Data'),
(2, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progress_pengajuan`
--

DROP TABLE IF EXISTS `tbl_progress_pengajuan`;
CREATE TABLE `tbl_progress_pengajuan` (
  `_id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_progress` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_progress_pengajuan`
--

INSERT INTO `tbl_progress_pengajuan` (`_id`, `id_pengajuan`, `id_progress`, `id_user`, `catatan`, `created_at`) VALUES
(1, 1, 1, 1, NULL, '2021-02-03 17:00:00'),
(2, 1, 2, 1, NULL, '2021-02-03 17:00:00'),
(3, 2, 1, 1, NULL, '2021-02-03 17:00:00'),
(4, 3, 1, 1, 'test', '2021-02-03 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening_kegiatan`
--

DROP TABLE IF EXISTS `tbl_rekening_kegiatan`;
CREATE TABLE `tbl_rekening_kegiatan` (
  `_id` int(11) NOT NULL,
  `kode_rekening` char(11) NOT NULL,
  `nama_rekening` text NOT NULL,
  `id_sub` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening_kegiatan`
--

INSERT INTO `tbl_rekening_kegiatan` (`_id`, `kode_rekening`, `nama_rekening`, `id_sub`, `id_program`, `id_kegiatan`, `status`, `pagu`, `created_at`) VALUES
(4, '5.1.2.01.01', 'Belanja Alat / Bahan untuk Kegiatan Kantor - Bahan Cetak', 5, 127, 19, '1', 70000000, '2021-02-02 05:16:29'),
(5, 'test', 'test', 6, 128, 20, '1', 500000000, '2021-02-02 06:22:52'),
(6, 'test', 'test', 7, 127, 19, '1', 50000000, '2021-02-02 06:23:42'),
(7, '5.1.2.01.01', 'TEST REKENING BELANJA BARU', 5, 127, 19, '1', 100000000, '2021-02-04 06:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kegiatan`
--

DROP TABLE IF EXISTS `tbl_sub_kegiatan`;
CREATE TABLE `tbl_sub_kegiatan` (
  `_id` int(11) NOT NULL,
  `nama_sub` text NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `kode_sub` varchar(15) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_kegiatan`
--

INSERT INTO `tbl_sub_kegiatan` (`_id`, `nama_sub`, `id_program`, `id_kegiatan`, `kode_sub`, `status`, `created_at`) VALUES
(5, 'PENYEDIAAN KOMPONEN INSTALASI LISTRIK / PENERANGAN BANGUNAN KANTOR', 127, 19, '01', '1', '2021-02-02 01:18:26'),
(6, 'test', 128, 20, 'test', '1', '2021-02-02 06:22:29'),
(7, 'test', 127, 19, 'test', '1', '2021-02-02 06:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `_id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `pswd` text NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `foto` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`_id`, `nama_user`, `uname`, `pswd`, `id_jabatan`, `foto`, `no_hp`, `email`, `alamat`, `id_bidang`, `status`, `created_at`) VALUES
(1, 'Lukman Ganteng', 'test', '$2y$04$lmPVLrK30wxeMYjQep3EYuiMMY67ZezaoRNVZyVrJw.SPcasCO1Sy', 5, '', '2', 'test@example.com', 'test', 6, '1', '2021-02-01 07:56:14'),
(2, 'Lukman Ganteng', 'test', '$2y$04$n9NzKeughLJ8KiSnotpASuTmdxT3sP1rDri4dPzCY54p5iOZ.bZPa', 5, '', '464654', 'test@example.com', 'testet', 6, '0', '2021-02-01 07:58:29'),
(3, 'Lukman Ganteng', 'test', '$2y$04$p8O1DEqVYeWFg0GwNei7kunrjnYg39.iQIRFK5N9AKvKut4bIrSFe', 5, '', '54545', 'test@example.com', 'test', 6, '0', '2021-02-01 08:00:23'),
(4, 'test', 'test', '$2y$04$bGGHENEaQHgE20WO2fLBnuaV5CWtb8X8jaGSe.UeLUG4ORnLV7X6a', 5, '', '123123123', 'test@example.com', 'testte', 6, '0', '2021-02-01 08:09:07'),
(5, 'test', 'test', '$2y$04$gsA/MlZj0jrIAkL5JyH2Fepmh1PjwE9jGpxBSqaIYdiPVaM/1wAxC', 5, '', '123123', 'test@example.com', 'test', 6, '0', '2021-02-01 08:31:56'),
(6, 'test', 'test', '$2y$04$xfatnl8GXbRqpw.KM7mdNe/W2iGuQXEDDlKgnHjnwYmMP/58cvoI6', 5, '', '123123', 'test@example.com', 'test', 6, '0', '2021-02-01 08:36:00'),
(7, 'test', 'test', '$2y$04$Xxw3O57ynicSDTlAcxPve.SeVapeN9s1tY78NTnajV5xILRU49ama', 5, '', '123123', 'test@example.com', 'test', 6, '0', '2021-02-01 08:41:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `kode_pengajuan` (`kode_pengajuan`);

--
-- Indexes for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_progress_pengajuan`
--
ALTER TABLE `tbl_progress_pengajuan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_rekening_kegiatan`
--
ALTER TABLE `tbl_rekening_kegiatan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_sub_kegiatan`
--
ALTER TABLE `tbl_sub_kegiatan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_progress_pengajuan`
--
ALTER TABLE `tbl_progress_pengajuan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rekening_kegiatan`
--
ALTER TABLE `tbl_rekening_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sub_kegiatan`
--
ALTER TABLE `tbl_sub_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
