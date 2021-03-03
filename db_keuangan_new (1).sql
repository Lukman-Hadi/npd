-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 10:07 AM
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
-- Database: `db_keuangan_new`
--
CREATE DATABASE IF NOT EXISTS `db_keuangan_new` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_keuangan_new`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alur`
--

DROP TABLE IF EXISTS `tbl_alur`;
CREATE TABLE `tbl_alur` (
  `_id` int(11) NOT NULL,
  `id_progress` int(11) NOT NULL,
  `ordinal` int(2) NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alur`
--

INSERT INTO `tbl_alur` (`_id`, `id_progress`, `ordinal`, `status`) VALUES
(1, 1, 1, NULL),
(2, 7, 2, NULL),
(3, 2, 3, NULL),
(4, 3, 4, NULL),
(5, 4, 5, NULL),
(6, 5, 6, 1),
(7, 6, 7, NULL),
(8, 13, 8, NULL),
(9, 14, 0, 0);

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
(6, 'Dinas', '1', '2021-02-01 03:51:43');

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
(3, 'PPTK', '1', '2021-02-01 04:09:34'),
(4, 'Super Admin', '1', '2021-02-01 05:12:41'),
(5, 'Admin', '1', '2021-02-01 05:12:46'),
(6, 'Pembantu Bendahara', '1', '2021-02-01 05:13:05'),
(7, 'Auditor', '1', '2021-02-08 15:15:16');

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
(22, 'TESTTEST', 130, 'test', '1', '2021-03-01 03:33:32'),
(24, 'PELAYANAN PERIZINAN DAN NON PERIZINAN SECARA TERPADU SATU PINTU DI BIDANG PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN / KOTA', 133, '2.18.04.2.01', '1', '2021-03-03 07:42:23'),
(25, 'ADIMINISTRASI KEUANGAN PERANGKAT DAERAH', 135, '2.18.01.2.02', '1', '2021-03-03 08:02:28'),
(27, 'PENYELENGGARAAN PROMOSI PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN/KOTA', 137, '2.18.03.2.01', '1', '2021-03-03 08:07:36'),
(28, 'PERENCANAAN, PENGANGGARAN DAN EVALUASI KINERJA PERANGKAT DAERAH', 135, '2.18.01.2.01', '1', '2021-03-03 08:21:15'),
(29, 'PENETAPAN PEMBERIAN FASILITAS/INSENTIF DIBIDANG PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN/KOTA', 136, '2.18.02.2.01.01', '1', '2021-03-03 08:38:48'),
(30, 'ADMINISTRASI UMUM PERANGKAT DAERAH', 135, '2.18.01.2.06.01', '1', '2021-03-03 08:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_levels`
--

DROP TABLE IF EXISTS `tbl_levels`;
CREATE TABLE `tbl_levels` (
  `_id` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_levels`
--

INSERT INTO `tbl_levels` (`_id`, `id_jabatan`, `id_menu`) VALUES
(2, 4, 7),
(4, 4, 8),
(5, 4, 9),
(6, 4, 10),
(7, 4, 11),
(8, 4, 12),
(9, 4, 13),
(10, 4, 14),
(11, 4, 15),
(12, 4, 16),
(13, 4, 17),
(14, 4, 18),
(15, 4, 19),
(16, 4, 1),
(17, 4, 2),
(18, 4, 3),
(19, 4, 4),
(20, 4, 5),
(21, 4, 6),
(22, 3, 1),
(23, 3, 2),
(24, 3, 3),
(25, 3, 4),
(26, 3, 5),
(27, 3, 6),
(28, 3, 7),
(29, 3, 8),
(30, 3, 9),
(31, 3, 10),
(32, 3, 11),
(33, 3, 12),
(34, 3, 13),
(35, 3, 14),
(36, 3, 15),
(37, 3, 16),
(38, 3, 17),
(39, 3, 18),
(40, 3, 19),
(41, 5, 1),
(42, 5, 2),
(43, 5, 3),
(44, 5, 4),
(45, 5, 5),
(46, 5, 6),
(47, 5, 7),
(49, 5, 9),
(50, 5, 10),
(51, 5, 11),
(52, 5, 12),
(53, 5, 13),
(54, 5, 14),
(55, 5, 15),
(56, 5, 16),
(57, 5, 17),
(58, 5, 18),
(59, 5, 19),
(60, 6, 2),
(61, 6, 6),
(62, 6, 18),
(63, 6, 19),
(64, 6, 4),
(65, 6, 11),
(66, 6, 12),
(67, 6, 13),
(68, 6, 14),
(69, 1, 2),
(70, 1, 4),
(71, 1, 5),
(72, 1, 6),
(73, 1, 8),
(74, 1, 11),
(75, 1, 12),
(76, 1, 13),
(77, 1, 14),
(78, 1, 17),
(79, 1, 19),
(80, 1, 3),
(81, 4, 20),
(82, 7, 20),
(83, 7, 19),
(85, 7, 14),
(86, 7, 13),
(87, 7, 12),
(88, 7, 11),
(89, 7, 8),
(90, 7, 6),
(91, 7, 4),
(92, 7, 3),
(93, 7, 2),
(94, 3, 20),
(95, 1, 20),
(96, 2, 20),
(97, 6, 20),
(98, 4, 21),
(99, 2, 2),
(100, 2, 3),
(101, 2, 4),
(102, 2, 5),
(103, 2, 6),
(104, 2, 7),
(105, 2, 8),
(107, 2, 11),
(108, 2, 12),
(109, 2, 13),
(110, 2, 14),
(111, 2, 17),
(112, 2, 19),
(113, 2, 21),
(114, 1, 15),
(115, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

DROP TABLE IF EXISTS `tbl_menus`;
CREATE TABLE `tbl_menus` (
  `_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `id_main` int(5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `ordinal` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`_id`, `judul`, `link`, `icon`, `id_main`, `status`, `ordinal`) VALUES
(1, 'MAIN', '#', '#', 1, '0', 1),
(2, 'Dashboards', '/', 'ni ni-tablet-button text-primary', 1, '1', 1),
(3, 'Data Proses', 'masterproses', 'fa fa-sitemap text-red', 1, '1', 2),
(4, 'Data', 'masterdata', 'ni ni-single-copy-04 text-orange', 1, '1', 2),
(5, 'Pengguna', 'masterpengguna', 'fa fa-users text-info', 1, '1', 3),
(6, 'Transaksi', 'transaksi', 'ni ni-single-copy-04 text-pink', 1, '1', 5),
(7, 'Data Progress', 'proses', 'fa fa-project-diagram text-red', 3, '1', 1),
(8, 'Alur Proses', 'proses/alur', 'ni ni-settings-gear-65 text-red', 3, '1', 2),
(9, 'Hak Akses User', 'proses/hakakses', 'fa fa-user-shield text-red', 3, '1', 3),
(10, 'Menu', 'proses/menu', 'ni ni-ui-04 text-red', 3, '1', 4),
(11, 'Program', 'program', 'ni ni-single-copy-04 text-orange', 4, '1', 1),
(12, 'Kegiatan', 'kegiatan', 'ni ni-single-copy-04 text-orange', 4, '1', 2),
(13, 'Sub Kegiatan', 'subkegiatan', 'ni ni-single-copy-04 text-orange', 4, '1', 3),
(14, 'Rekening Belanja', 'rekening', 'ni ni-single-copy-04 text-orange', 4, '1', 4),
(15, 'Bidang', 'bidang', 'fa fa-user text-info', 5, '1', 1),
(16, 'Jabatan', 'jabatan', 'fa fa-user text-info', 5, '1', 2),
(17, 'Pegawai', 'user', 'fa fa-user text-info', 5, '1', 3),
(18, 'Entry Pengajuan Baru', 'transaksi', 'ni ni-single-copy-04 text-pink', 6, '1', 1),
(19, 'Daftar Pengajuan', 'transaksi/listpengajuan', 'ni ni-single-copy-04 text-pink', 6, '1', 2),
(20, 'Proses Pengajuan', 'approve', 'fa fa-check-double text-primary', 1, '1', 6),
(21, 'Daftar Pencairan', 'transaksi/pencairan', 'ni ni-single-copy-04 text-pink', 6, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pencairan`
--

DROP TABLE IF EXISTS `tbl_pencairan`;
CREATE TABLE `tbl_pencairan` (
  `_id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `kode_pencairan` varchar(255) NOT NULL,
  `kode_pengajuan` varchar(255) NOT NULL,
  `total` bigint(20) NOT NULL,
  `id_auditor` int(11) NOT NULL,
  `tgl_pencairan` date NOT NULL,
  `prefix` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pencairan`
--

INSERT INTO `tbl_pencairan` (`_id`, `id_pengajuan`, `kode_pencairan`, `kode_pengajuan`, `total`, `id_auditor`, `tgl_pencairan`, `prefix`, `created_at`) VALUES
(1, 1, '900/1-test/03/2021', 'P-603f45718085d', 2000000, 14, '2021-03-03', 'test', '2021-03-03 08:18:31'),
(2, 2, '900/2-test/03/2021', 'P-603f49006681e', 7000000, 1, '2021-03-03', 'test', '2021-03-03 08:32:22');

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
  `id_pptk` int(11) NOT NULL,
  `status` char(11) NOT NULL DEFAULT '0',
  `catatan` text DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`_id`, `kode_pengajuan`, `total`, `id_bidang`, `id_user`, `id_pptk`, `status`, `catatan`, `last_update`, `created_at`) VALUES
(1, 'P-603f45718085d', 2000000, 3, 1, 29, '8', NULL, '2021-03-03 08:26:27', '2021-03-03 08:14:41'),
(2, 'P-603f49006681e', 7000000, 3, 1, 16, '8', NULL, '2021-03-03 08:33:15', '2021-03-03 08:29:52');

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
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_detail`
--

INSERT INTO `tbl_pengajuan_detail` (`_id`, `kode_pengajuan`, `id_program`, `id_kegiatan`, `id_sub`, `id_rekening`, `jumlah`, `created_at`) VALUES
(1, 'P-603f45718085d', 130, 22, 9, 10, 2000000, '2021-03-03 08:14:41'),
(2, 'P-603f49006681e', 130, 22, 9, 10, 7000000, '2021-03-03 08:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_rincian`
--

DROP TABLE IF EXISTS `tbl_pengajuan_rincian`;
CREATE TABLE `tbl_pengajuan_rincian` (
  `_id` int(11) NOT NULL,
  `id_pengajuan_detail` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan` varchar(55) NOT NULL,
  `harga` int(11) NOT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `total` int(20) NOT NULL COMMENT 'kuantiti',
  `subtotal` bigint(20) DEFAULT NULL,
  `pph21` int(11) DEFAULT NULL,
  `pph22` int(11) DEFAULT NULL,
  `pph23` int(11) DEFAULT NULL,
  `pphd` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `bukti` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan_rincian`
--

INSERT INTO `tbl_pengajuan_rincian` (`_id`, `id_pengajuan_detail`, `keterangan`, `satuan`, `harga`, `penerima`, `total`, `subtotal`, `pph21`, `pph22`, `pph23`, `pphd`, `ppn`, `jumlah`, `bukti`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'dus', 100000, 'lay', 10, 950000, 10000, 10000, 10000, 10000, 10000, 1000000, '76bd935660a851d2320268f0f411ce9d.pdf', '2021-03-03 08:14:41', '2021-03-03 08:19:43'),
(2, 1, 'test 2 ', 'dus', 50000, 'lay2', 20, 900000, 20000, 20000, 20000, 20000, 20000, 1000000, '8ca41c69a849e20fadb974a75ac6be83.pdf', '2021-03-03 08:14:41', '2021-03-03 08:20:27'),
(3, 2, 'tetst', 'dus', 70000, 'tes', 100, 7000000, 0, 0, 0, 0, 0, 7000000, '72b52f723cfa661bc9cfce3a16503d09.pdf', '2021-03-03 08:29:52', '2021-03-03 08:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

DROP TABLE IF EXISTS `tbl_privilege`;
CREATE TABLE `tbl_privilege` (
  `_id` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_privilege`
--

INSERT INTO `tbl_privilege` (`_id`, `id_jabatan`, `id_progress`) VALUES
(2, 4, 2),
(3, 4, 3),
(4, 4, 4),
(5, 4, 5),
(6, 4, 6),
(7, 4, 7),
(8, 4, 8),
(9, 4, 9),
(10, 4, 10),
(11, 4, 11),
(12, 1, 4),
(13, 2, 2),
(14, 6, 1),
(16, 6, 6),
(22, 3, 7),
(23, 7, 3),
(25, 4, 1),
(26, 7, 5),
(27, 7, 12),
(28, 1, 12),
(29, 4, 12),
(30, 4, 13),
(31, 7, 13),
(34, 6, 14),
(35, 4, 14),
(36, 6, 8),
(37, 6, 10),
(38, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

DROP TABLE IF EXISTS `tbl_program`;
CREATE TABLE `tbl_program` (
  `_id` int(11) NOT NULL,
  `nama_program` text NOT NULL,
  `kode_program` varchar(15) NOT NULL,
  `status` char(5) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`_id`, `nama_program`, `kode_program`, `status`, `id_bidang`, `created_at`) VALUES
(130, 'TEST PROGRAM BIDANG PM', 'TEST PROGRAM BI', '1', 3, '2021-03-01 02:55:24'),
(132, 'test program pelayanan', 'test', '1', 4, '2021-03-03 07:38:13'),
(133, 'PROGRAM PELAYANAN PENANAMAN MODAL', '2.18.04', '1', 4, '2021-03-03 07:40:04'),
(135, 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', '2.18.01', '1', 5, '2021-03-03 07:53:41'),
(137, 'PROGRAM PROMOSI PENANAMAN MODAL', '2.18.03', '1', 3, '2021-03-03 08:03:22'),
(138, 'PROGRAM PENGEMBANGAN IKLIM PENANAMAN MODAL', '1.18.12', '1', 2, '2021-03-03 08:12:29');

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
(1, 'Entry Pengajuan'),
(2, 'Verifikasi Bidang'),
(3, 'Verifikasi Keuangan'),
(4, 'Verifikasi Dinas'),
(5, 'Pencairan'),
(6, 'Verifikasi SPJ'),
(7, 'Verifikasi PPTK'),
(8, 'Edit Data'),
(9, 'Hapus Data'),
(10, 'Entry Data Baru'),
(11, 'Aktivasi'),
(12, 'All'),
(13, 'Pengajuan Selesai'),
(14, 'Pengajuan Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progress_pengajuan`
--

DROP TABLE IF EXISTS `tbl_progress_pengajuan`;
CREATE TABLE `tbl_progress_pengajuan` (
  `_id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `ordinal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_progress_pengajuan`
--

INSERT INTO `tbl_progress_pengajuan` (`_id`, `id_pengajuan`, `ordinal`, `id_user`, `catatan`, `created_at`) VALUES
(1, 1, 1, 1, NULL, '2021-03-03 08:14:41'),
(2, 1, 2, 29, '', '2021-03-03 08:15:34'),
(3, 1, 3, 31, '', '2021-03-03 08:17:35'),
(4, 1, 4, 14, '', '2021-03-03 08:17:55'),
(5, 1, 5, 9, '', '2021-03-03 08:18:12'),
(6, 1, 6, 14, '', '2021-03-03 08:18:31'),
(7, 1, 7, 1, NULL, '2021-03-03 08:20:32'),
(8, 1, 8, 14, '', '2021-03-03 08:26:27'),
(9, 2, 1, 1, NULL, '2021-03-03 08:29:52'),
(10, 2, 2, 16, '', '2021-03-03 08:30:53'),
(11, 2, 3, 31, '', '2021-03-03 08:31:15'),
(12, 2, 0, 1, '', '2021-03-03 08:31:46'),
(13, 2, 2, 1, NULL, '2021-03-03 08:32:10'),
(14, 2, 3, 1, '', '2021-03-03 08:32:15'),
(15, 2, 4, 1, '', '2021-03-03 08:32:18'),
(16, 2, 5, 1, '', '2021-03-03 08:32:20'),
(17, 2, 6, 1, '', '2021-03-03 08:32:23'),
(18, 2, 7, 1, NULL, '2021-03-03 08:32:40'),
(19, 2, 6, 1, '', '2021-03-03 08:32:48'),
(20, 2, 7, 1, NULL, '2021-03-03 08:33:08'),
(21, 2, 8, 1, '', '2021-03-03 08:33:15');

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
(10, '5.1.2.01.01', 'TEST', 9, 130, 22, '1', 50000000, '2021-03-01 03:35:34'),
(12, '5', 'BELANJA DAERAH', 11, 133, 24, '1', 30000000, '2021-03-03 07:45:08'),
(17, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 13, 137, 27, '1', 130000, '2021-03-03 08:25:44'),
(18, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 14, 135, 28, '1', 1350000, '2021-03-03 08:25:53'),
(19, '5.1.02.01.0', 'Belanja Makanan dan Minuman Rapat', 14, 135, 28, '1', 3300000, '2021-03-03 08:26:20'),
(20, '5.1.02.02.0', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara, dan Panitia', 14, 135, 28, '1', 3500000, '2021-03-03 08:26:45'),
(21, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 14, 135, 28, '1', 10850000, '2021-03-03 08:27:18'),
(22, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 16, 135, 28, '1', 445000, '2021-03-03 08:30:26'),
(23, '5.1.02.01.0', 'Belanja Makanan dan Minuman Rapat', 16, 135, 28, '1', 1705000, '2021-03-03 08:30:53'),
(24, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 16, 135, 28, '1', 1550000, '2021-03-03 08:31:27'),
(25, '5.1.02.02.0', 'Belanja Jasa Tenaga Operator Komputer', 16, 135, 28, '1', 300000, '2021-03-03 08:32:26'),
(26, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 17, 135, 28, '1', 500000, '2021-03-03 08:34:45'),
(27, '5.1.02.01.0', 'Belanja Makanan dan Minuman Rapat', 17, 135, 28, '1', 1650000, '2021-03-03 08:35:09'),
(28, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 17, 135, 28, '1', 1550000, '2021-03-03 08:35:39'),
(29, '5.1.02.02.0', 'Belanja Jasa Tenaga Operator Komputer', 17, 135, 28, '1', 300000, '2021-03-03 08:36:00'),
(30, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 18, 135, 28, '1', 450000, '2021-03-03 08:38:44'),
(31, '5.1.02.01.0', 'Belanja Makanan dan Minuman Rapat', 18, 135, 28, '1', 1100000, '2021-03-03 08:40:11'),
(32, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 18, 135, 28, '1', 1550000, '2021-03-03 08:40:46'),
(34, '5.1.02.02.0', 'Belanja Jasa Tenaga Operator Komputer', 18, 135, 28, '1', 300000, '2021-03-03 08:41:50'),
(36, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 23, 135, 28, '1', 450000, '2021-03-03 08:59:42'),
(37, '5.1.02.01.0', 'Belanja Makanan dan Minuman Rapat', 23, 135, 28, '1', 1100000, '2021-03-03 09:00:10'),
(38, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 23, 135, 28, '1', 1550000, '2021-03-03 09:00:45'),
(39, '5.1.02.02.0', 'Belanja Jasa Tenaga Operator Komputer', 23, 135, 28, '1', 300000, '2021-03-03 09:01:15'),
(40, '5.1.02.01.0', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 24, 135, 28, '1', 500000, '2021-03-03 09:03:14'),
(41, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 24, 135, 28, '1', 24700000, '2021-03-03 09:03:52');

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
(9, 'TEST', 130, 22, 'TEST', '1', '2021-03-01 03:34:22'),
(11, 'Penyediaan Pelayanan Terpadu Perizian dan Non Perizinan Berbasis Sistem Pelayanan Perizinan Berusaha Terintegrasi Secara Elektronik', 133, 24, '2.18.04.2.01.01', '1', '2021-03-03 07:44:12'),
(13, 'PENYUSUNAN STRATEGI PROMOSI PENANAMAN MODAL', 137, 27, '2.18.03.2.01.01', '1', '2021-03-03 08:09:30'),
(14, 'PENYUSUNAN DOKUMEN PERENCANAAN PERANGKAT DAERAH', 135, 28, '2.18.01.2.01.01', '1', '2021-03-03 08:23:10'),
(16, 'KOORDINASI DAN PENYUSUNAN DOKUMEN RKA-SKPD', 135, 28, '2.18.01.2.01.02', '1', '2021-03-03 08:29:29'),
(17, 'KOORDINASI  DAN PENYUSUNAN DOKUMEN PERUBAHAN RKA-SKPD', 135, 28, '2.18.01.2.01.03', '1', '2021-03-03 08:33:35'),
(18, 'KOORDINASI DAN PENYUSUNAN DPA-SKPD', 135, 28, '2.18.01.2.01.04', '1', '2021-03-03 08:36:44'),
(19, 'PELAKSANAAN PENATAUSAHAAN DAN PENGUJIAN /VERIFIKASI KEUANGANSKPD', 135, 25, '2.18.2.02.03', '1', '2021-03-03 08:38:47'),
(21, 'KOORDINASI DAN PENYUSUNAN LAPORAN KEUANGAN AKHIR TAHUN SKPD', 135, 25, '2.18.01.2.02.05', '1', '2021-03-03 08:43:15'),
(22, 'PENETAPAN KEBIJAKAN DAERAH MENGENAI PEMBERIAN FASILITAS /INSENTIF DAN KEMUDAHAN PENANAMAN MODAL', 136, 29, '2.18.02.2.01.01', '1', '2021-03-03 08:47:05'),
(23, 'KOORDINASI DAN PENYUSUNAN PERUBAHAN DPA-SKPD', 135, 28, '2.18.01.2.01.05', '1', '2021-03-03 08:58:50'),
(24, 'KOORDINASI DAN PENYUSUNAN LAPORAN CAPAIAN KINERJA DAN IKHTISAR REALISASI KINERJA SKPD', 135, 28, '2.18.01.2.01.06', '1', '2021-03-03 09:02:10');

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
(1, 'Lukman Hadi', 'test', '$2y$04$.rPbkHO7Tey4yNF5BGzUy.dLVit8j18zwn4p860UEzyavCshks0W.', 4, 'cc3374b1ddf9ff2377965218e535e293.png', '2', 'test@example.com', 'test', 6, '1', '2021-02-01 07:56:14'),
(8, 'Test Pelaksana', 'pelaksana', '$2y$04$G2os7Xbk6kmJGPf560fwf.U0p8EC9Fh3p3DT6BCv91YZ2U30yi82G', 6, '', '12312312', 'ex@emial.com', 'tesrtt', 4, '1', '2021-02-06 08:58:48'),
(9, 'Test Kepala Dinas', 'dinas', '$2y$04$tcNz7AVyOe7eFCJuKjjl5.E3rB6QaUFiHY7staVG3/7oJc5dqnq7O', 1, '', '55454', 'test@example.com', 'test', 6, '1', '2021-02-07 15:39:43'),
(12, 'test kepala seksi', 'kasi', '$2y$04$DlJkiRpBsOvcTlOWjAHubu/PERb09TJA/lZ98EnFUbAwnGYhd/sZm', 3, '', '123123', 'kardus@mail.com', 'test', 4, '1', '2021-02-09 02:18:19'),
(13, 'test kepala bidang', 'kabid', '$2y$04$kuFD8nQSgjWttIz4fXm.T.JuArXD52D4fZfWEQvQU.ehiXY2tOHt2', 2, '', '12123123', 'ex@emial.com', 'test', 4, '1', '2021-02-09 02:18:51'),
(14, 'test audito', 'audit', '$2y$04$6kvKBlk95Wrg6OYvioYrs.gK.h1qkKXMG1MlLKhQ/fDHReOYSCSTO', 7, '', '12312', 'ex@emial.com', 'test', 5, '1', '2021-02-09 02:19:38'),
(15, 'Lukman', 'admin', '$2y$04$ichJFVDnyT8AKW8x6yVN3uNmLHsiv.ivgZXsyl.xscdskxEHKfh9K', 5, '', '123123', 'admin@admin.com', 'jauh gan', 6, '1', '2021-02-24 04:47:18'),
(16, 'PPTK SEKTERAITAN', 'psekre', '$2y$04$HhWi7veLKoD.yhx2XVzn8.AgBUMfxOz0Wp.ZXYqS1E7./uComHE7C', 3, '', '08817552539', 'psekre@psekre.com', 'psekrepsekrepsekrepsekrepsekre', 5, '1', '2021-03-01 03:08:07'),
(17, 'PPTK PELAYANAN', 'ppelayanan', '$2y$04$10/nKMbewl/ExMxefMR8IeYFYzhYp6LF9zIwwd1QqII8tgvdCeIha', 3, '', '08817552539', 'ppelayanan@ppelayanan.com', 'ppelayananppelayananppelayananppelayanan', 4, '1', '2021-03-01 03:08:54'),
(18, 'PPTK PM', 'ppm', '$2y$04$SuyYQ4TheHbsIUu49MDuaO7FhB5/qkRtNOoqtZQw9p731Ep44zvKO', 3, '', '08817552539', 'ppm@ppm.com', 'ppmppmppmppm', 3, '1', '2021-03-01 03:09:46'),
(19, 'PPTK PENGENDEALIAN', 'ppengendalian', '$2y$04$Km5On55bYxBm2OqTo5E5N.4DaLEX6573/ZY1.uvVf35QZMbVpBDKa', 3, '', '08817552539', 'ppengendalian@ppengendalian.com', 'ppengendalianppengendalianppengendalianppengendalianppengendalian', 2, '1', '2021-03-01 03:10:25'),
(20, 'pengendalian', 'pengendalian', '$2y$04$LReYAfWtWFDWVBpJRZPz3.L3WrEyPK8tuHAW5vUaB65uxhTgXRtq.', 2, '', '08817552539', 'pengendalian@pengendalian.com', 'pengendalianpengendalianpengendalianpengendalianpengendalian', 2, '1', '2021-03-01 07:25:12'),
(21, 'sekretariat', 'sekretariatv', '$2y$04$E72AfRcRTwdZfdI3TzbMeO21k8syPku1POWBkWn9Npe5lGW/zxcAm', 2, '', '08817552539', 'sekretariat@sekretariat.com', 'sekretariatsekretariatsekretariatsekretariatsekretariat', 5, '1', '2021-03-01 07:45:31'),
(22, 'AKMAL FIKRI,Sip', '197802052009011004', '$2y$04$bnsISDBHhUGGYPH3KuIPZeL0c5iMjO2QnIAvy1IRiQ5zNSBm6UugG', 6, '', '088998989', 'AkmalFikri@mail.com', 'DPMPTSP', 4, '1', '2021-03-03 07:15:16'),
(23, 'WAHYU ANWAR S. Sos', '198106052008011026', '$2y$04$jBmZdpbTzAEO6M2or7neGu98w1pFulz6AWoAECPIQLYiIp8K/4ucC', 6, '', '089898989', 'WahyuAnwar@mail.com', 'DPMPTSP', 2, '1', '2021-03-03 07:16:27'),
(24, 'DIAN MARDIANTI,SE', '197703232010012007', '$2y$04$RMul.f.17KluriV5DGghJuYOgV/nUBstrp8.HmG8mf7BFPv3pEX7i', 6, '', '912839123013', 'DianMardiati@mail.com', 'DPMPTSP', 3, '1', '2021-03-03 07:17:30'),
(25, 'HJ. MURTININGSIH, SE', '196402271991032003', '$2y$04$VdZHHKREQMjDtrGymYaAeuw9vQ/rbyw1j93j24ZMiupA/iLUKlgDe', 3, '', '088989', 'test@example.com', 'DPMPTSP', 3, '1', '2021-03-03 07:22:08'),
(26, 'EIN CHAIRINI, S. SOS, M. Si', '197208042010012002', '$2y$04$fELyDtw6xNjHFyFiEwOQaOdXpXXuZCbAy1grT0QVMiucIFCYD9bTW', 3, '', '08989382123', 'test@example.com', 'DPMPTSP', 5, '1', '2021-03-03 07:22:54'),
(27, 'BAGUS MULYANA, S.Sos', '197005152007011018', '$2y$04$P385uqEiEry6IGn9x62v2e3.TTTH29mFMTUPum73x1AS9tf8i5.a2', 3, '', '0128301923123', 'test@example.com', 'DPMPSTSP', 5, '1', '2021-03-03 07:23:47'),
(28, 'DHANIA AFHIANTI, ST', '197712102005012011', '$2y$04$6hWsq5XfoCT2PjTaCREUMexxXuhd6arG8d.T0X7Be.cgv/3uAkKxi', 3, '', '088888', 'test@mail.com', 'DPMPTSP', 2, '1', '2021-03-03 07:34:09'),
(29, 'TEDI FAUZI RAHMAT, SE', '198006112002121004', '$2y$04$0gZvrfc25WRw4LNLx.k8V.l3k724VkTaPi/g/DXesKvKDX26oUlFe', 3, '', '08120830830', 'testmail@mail.com', 'DPMPTSP', 3, '1', '2021-03-03 07:36:38'),
(30, 'WIDYA SUNDARI, SE', '198410082009022001', '$2y$04$ByULDritOLSEDkfjypbjXeXYL40Zc.gcW2dRojiv3A4MCM1a31h3.', 3, '', '0808080', 'test@mail.com', 'dpmptsp', 4, '1', '2021-03-03 07:46:32'),
(31, 'test kabid pm', 'kpm', '$2y$04$A7PvhCLHJSwQH0R1EGes0.4FjfM/d3bkoiL2bTDuxMPS92n4Re5He', 2, '', '1231', 'kpm@kpm.com', 'kpm', 3, '1', '2021-03-03 08:17:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alur`
--
ALTER TABLE `tbl_alur`
  ADD PRIMARY KEY (`_id`);

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
-- Indexes for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_pencairan`
--
ALTER TABLE `tbl_pencairan`
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
  ADD PRIMARY KEY (`_id`),
  ADD KEY `kode_pengajuan` (`kode_pengajuan`);

--
-- Indexes for table `tbl_pengajuan_rincian`
--
ALTER TABLE `tbl_pengajuan_rincian`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `id_pengajuan_detail` (`id_pengajuan_detail`);

--
-- Indexes for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
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
  ADD PRIMARY KEY (`_id`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

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
-- AUTO_INCREMENT for table `tbl_alur`
--
ALTER TABLE `tbl_alur`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pencairan`
--
ALTER TABLE `tbl_pencairan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_rincian`
--
ALTER TABLE `tbl_pengajuan_rincian`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_progress_pengajuan`
--
ALTER TABLE `tbl_progress_pengajuan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_rekening_kegiatan`
--
ALTER TABLE `tbl_rekening_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_sub_kegiatan`
--
ALTER TABLE `tbl_sub_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pengajuan_rincian`
--
ALTER TABLE `tbl_pengajuan_rincian`
  ADD CONSTRAINT `tbl_pengajuan_rincian_ibfk_1` FOREIGN KEY (`id_pengajuan_detail`) REFERENCES `tbl_pengajuan_detail` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_progress_pengajuan`
--
ALTER TABLE `tbl_progress_pengajuan`
  ADD CONSTRAINT `tbl_progress_pengajuan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `tbl_pengajuan` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
