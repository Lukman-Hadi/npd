-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 04:10 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alur`
--

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
(3, 'Penanaman Modal', '1', '2021-02-01 03:46:28'),
(4, 'Pelayananan', '1', '2021-02-01 03:46:55'),
(5, 'Sekertariat', '1', '2021-02-01 03:51:03'),
(6, 'Dinas', '1', '2021-02-01 03:51:43'),
(12, 'HALO', '1', '2021-03-15 02:11:44'),
(13, 'Pengendalian', '1', '2021-03-15 02:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `_id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

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

CREATE TABLE `tbl_kegiatan` (
  `_id` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `id_program` int(11) NOT NULL,
  `kode_kegiatan` varchar(200) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`_id`, `nama_kegiatan`, `id_program`, `kode_kegiatan`, `status`, `created_at`) VALUES
(24, 'PELAYANAN PERIZINAN DAN NON PERIZINAN SECARA TERPADU SATU PINTU DI BIDANG PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN / KOTA', 133, '2.18.04.2.01', '1', '2021-03-03 07:42:23'),
(25, 'ADIMINISTRASI KEUANGAN PERANGKAT DAERAH', 135, '2.18.01.2.02', '1', '2021-03-03 08:02:28'),
(27, 'PENYELENGGARAAN PROMOSI PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN/KOTA', 137, '2.18.03.2.01', '1', '2021-03-03 08:07:36'),
(28, 'PERENCANAAN, PENGANGGARAN DAN EVALUASI KINERJA PERANGKAT DAERAH', 135, '2.18.01.2.01', '1', '2021-03-03 08:21:15'),
(30, 'ADMINISTRASI UMUM PERANGKAT DAERAH', 135, '2.18.01.2.06.01', '1', '2021-03-03 08:41:14'),
(35, 'PENGELOLAAN DATA DAN INFORMASI PERIZINAN DAN NON PERIZINAN YANG TERINTEGRASI PADA TINGKAT DAERAH KABUPATEN/KOTA', 139, '2.18.06.2.01', '1', '2021-03-04 06:39:54'),
(36, 'ADMINISTRASI BARANG MILIK DAERAH', 135, '2.18.01.2.03', '1', '2021-03-04 07:07:35'),
(37, 'PEMELIHARAANBARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAHAN DAERAH', 135, '2.18.01.2.09', '1', '2021-03-04 07:31:08'),
(38, 'PENGADAAN BARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAHAN DAERAH', 135, '2.18.01.2.07', '1', '2021-03-04 07:38:28'),
(39, 'ADMINISTRASI KEPEGAWAIAN PERANGKAT DAERAH', 135, '2.18.01.2.05', '1', '2021-03-04 07:41:34'),
(40, 'PEMELIHARAAN BARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAHAN DAERAH ', 135, '2.18.01.2.09', '1', '2021-03-04 07:57:00'),
(41, 'ADMINISTRASI UMUM PERANGKAT DAERAH', 135, '2.18.01.2.06', '1', '2021-03-04 08:03:52'),
(42, 'PENYEDIAAN JASA PENUNJANG URUSAN PEMERINTAH DAERAH ', 135, '2.18.01.2.08', '1', '2021-03-04 08:14:39'),
(43, 'ADMINISTRASI PENDAPATAN DAERAH', 135, '2.18.01.2.04', '1', '2021-03-04 08:18:40'),
(44, 'PENYEDIAAN JASA PENUNJANG URUSAN PEMERINTAHAN DAERAH', 135, '2.18.01.2.08', '1', '2021-03-04 08:24:10'),
(46, 'PENETAPAN PEMBERIAN FASILITAS/INSENTIF DIBIDANG PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN/KOTA', 133, '2.18.02.2.01', '1', '2021-03-05 02:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_levels`
--

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
(1, 1, '900/1-2.18.01.2.01/03/2021', 'P-6040ea851f395', 1500000, 14, '2021-03-04', '2.18.01.2.01', '2021-03-04 14:15:21'),
(2, 2, '900/2-2.18.01.2.01/03/2021', 'P-6045a72c92ff4', 6400000, 38, '2021-03-08', '2.18.01.2.01', '2021-03-08 04:28:36'),
(3, 3, '900/1-2.18.04.2.01/03/2021', 'P-6045c0997a685', 2100000, 38, '2021-03-08', '2.18.04.2.01', '2021-03-08 06:17:41'),
(4, 5, '900/1-2.18.01.2.06.01/03/2021', 'P-60471aab475ee', 6154000, 38, '2021-03-09', '2.18.01.2.06.01', '2021-03-09 06:55:31'),
(5, 4, '900/2-2.18.04.2.01/03/2021', 'P-6045d18e4c890', 2000000, 1, '2021-03-15', '2.18.04.2.01', '2021-03-15 02:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

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
(1, 'P-6040ea851f395', 1500000, 5, 1, 30, '8', NULL, '2021-03-04 14:16:18', '2021-03-04 14:11:17'),
(2, 'P-6045a72c92ff4', 6400000, 5, 1, 29, '8', NULL, '2021-03-08 04:31:08', '2021-03-08 04:25:16'),
(3, 'P-6045c0997a685', 2100000, 4, 1, 41, '8', NULL, '2021-03-08 07:09:11', '2021-03-08 06:13:45'),
(4, 'P-6045d18e4c890', 2000000, 4, 1, 26, '8', NULL, '2021-03-15 03:10:33', '2021-03-08 07:26:06'),
(5, 'P-60471aab475ee', 6154000, 5, 1, 26, '8', NULL, '2021-03-09 06:59:52', '2021-03-09 06:50:19'),
(6, 'P-604ed571bfa10', 4000000, 4, 1, 42, '1', NULL, NULL, '2021-03-15 03:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_detail`
--

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
(1, 'P-6040ea851f395', 135, 28, 14, 18, 1000000, '2021-03-04 14:11:17'),
(2, 'P-6040ea851f395', 135, 28, 14, 20, 500000, '2021-03-04 14:11:17'),
(3, 'P-6045a72c92ff4', 135, 28, 14, 21, 4400000, '2021-03-08 04:25:16'),
(4, 'P-6045a72c92ff4', 135, 28, 14, 19, 2000000, '2021-03-08 04:25:16'),
(5, 'P-6045c0997a685', 133, 24, 29, 73, 300000, '2021-03-08 06:13:45'),
(6, 'P-6045c0997a685', 133, 24, 29, 74, 1800000, '2021-03-08 06:13:45'),
(7, 'P-6045d18e4c890', 133, 24, 29, 74, 2000000, '2021-03-08 07:26:06'),
(8, 'P-60471aab475ee', 135, 30, 37, 90, 6154000, '2021-03-09 06:50:19'),
(9, 'P-604ed571bfa10', 133, 24, 29, 73, 2000000, '2021-03-15 03:33:05'),
(10, 'P-604ed571bfa10', 133, 24, 29, 74, 2000000, '2021-03-15 03:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_rincian`
--

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
(1, 1, 'Tambal ban', 'lembar', 10000, 'elay', 100, 900000, 20000, 20000, 20000, 20000, 20000, 1000000, '395419207cd6c1bf96a59effcafb7dc4.pdf', '2021-03-04 14:11:17', '2021-03-04 14:15:52'),
(2, 2, 'Tambal ban', 'lembar', 50000, 'Toko Fajar', 10, 400000, 20000, 20000, 20000, 20000, 20000, 500000, '4adbccda54eeee1c899d9f324e66ec72.pdf', '2021-03-04 14:11:17', '2021-03-04 14:16:07'),
(3, 3, 'Fotocopy', 'RIM', 800000, 'Mang Ateng', 3, 2350000, 10000, 10000, 10000, 10000, 10000, 2400000, '991ddc5b174dba51f264cf81663997b3.pdf', '2021-03-08 04:25:16', '2021-03-08 04:29:11'),
(4, 3, 'dua', 'Gelas', 500000, 'Lorem Ipsum Dolor Sit Amet amet dolor sit sit sit sit amet met', 4, 1950000, 10000, 10000, 10000, 10000, 10000, 2000000, 'e3d25f8e46ed579996a5b540a487eb40.pdf', '2021-03-08 04:25:16', '2021-03-08 04:44:27'),
(5, 4, 'Fotocopy', 'Gelas', 1000000, 'CAFE TELL', 2, 1950000, 10000, 10000, 10000, 10000, 10000, 2000000, 'b91ccf1f904ab9a2c96be8114b48e68f.pdf', '2021-03-08 04:25:16', '2021-03-08 04:30:26'),
(6, 5, 'test', 'dus rim', 150000, 'kopi foto', 2, 299950, 10, 10, 10, 10, 10, 300000, '186066637535f351db82e0deb173bdc0.pdf', '2021-03-08 06:13:45', '2021-03-08 06:38:55'),
(7, 6, 'Makanan Ringan Makanan berat', 'paket', 20000, 'cafe telll', 45, 850000, 10000, 10000, 10000, 10000, 10000, 900000, 'c35413b38aed55452681e3a857205d8c.pdf', '2021-03-08 06:13:45', '2021-03-08 06:38:04'),
(8, 6, 'minuman minuman', 'gelas', 20000, 'cafe tell', 45, 900000, 0, 0, 0, 0, 0, 900000, 'b89cc1ffd15996779fd470933e18f108.pdf', '2021-03-08 06:13:45', '2021-03-08 06:38:37'),
(9, 7, 'test', 'Gelas', 1000000, 'Mang Ateng tesn  eeee', 2, 2000000, 0, 0, 0, 0, 0, 2000000, 'f73a82ca0a332e31716e5fab2ef7d7a8.pdf', '2021-03-08 07:26:06', '2021-03-15 03:06:20'),
(10, 8, 'DINABOL', 'buah', 26000, 'LISTRIK', 1, 26000, 0, 0, 0, 0, 0, 26000, 'f3a5a8581cc37f2339dbd24cf1e60133.pdf', '2021-03-09 06:50:19', '2021-03-09 06:56:32'),
(11, 8, 'DONLIGHT', 'buah', 85000, 'LISTRIK', 1, 85000, 0, 0, 0, 0, 0, 85000, '480dc0c98eb9555b0f5ff015e1d9a32f.pdf', '2021-03-09 06:50:19', '2021-03-09 06:57:11'),
(12, 8, 'Double Tape', 'buah', 65000, 'LISTRIK', 1, 65000, 0, 0, 0, 0, 0, 65000, 'e55b22a09b69a7b6439e478b7ea0840a.pdf', '2021-03-09 06:50:19', '2021-03-09 06:57:27'),
(13, 8, 'DOUBLE TAPE NICAO', 'buah', 864000, 'LISTRIK', 1, 864000, 0, 0, 0, 0, 0, 864000, 'e3f2f4b4eeaa3f83ab0a7a20f03b36dc.pdf', '2021-03-09 06:50:19', '2021-03-09 06:58:08'),
(14, 8, 'TERMINAL 6', 'buah', 5100000, 'LISTRIK', 1, 5100000, 0, 0, 0, 0, 0, 5100000, 'a5f37946442c94beef2271ce5e6124ff.pdf', '2021-03-09 06:50:19', '2021-03-09 06:56:53'),
(15, 8, 'SELANG FLEK', 'buah', 14000, 'LISTRIK', 1, 14000, 0, 0, 0, 0, 0, 14000, '11e78361acc966246447964d48e480bf.pdf', '2021-03-09 06:50:19', '2021-03-09 06:58:38'),
(16, 9, 'test', 'Gelas', 1000000, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 2000000, NULL, '2021-03-15 03:33:05', '2021-03-15 03:33:05'),
(17, 10, 'dua', 'Gelas', 1000000, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 2000000, NULL, '2021-03-15 03:33:05', '2021-03-15 03:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

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
(38, 6, 11),
(39, 5, 1),
(40, 5, 2),
(41, 5, 3),
(42, 5, 4),
(43, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `_id` int(11) NOT NULL,
  `nama_program` text NOT NULL,
  `kode_program` varchar(200) NOT NULL,
  `status` char(4) NOT NULL DEFAULT '1',
  `id_bidang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`_id`, `nama_program`, `kode_program`, `status`, `id_bidang`, `created_at`) VALUES
(133, 'PROGRAM PELAYANAN PENANAMAN MODAL', '2.18.04', '1', 4, '2021-03-03 07:40:04'),
(135, 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', '2.18.01', '1', 5, '2021-03-03 07:53:41'),
(137, 'PROGRAM PROMOSI PENANAMAN MODAL', '2.18.03', '1', 3, '2021-03-03 08:03:22'),
(138, 'PROGRAM PENGEMBANGAN IKLIM PENANAMAN MODAL', '2.18.02', '1', 3, '2021-03-03 08:12:29'),
(139, 'PROGRAM PENGELOLAAN DATA DAN SISTEM INFORMASI PENANAMAN MODAL', '2.18.06', '1', 4, '2021-03-04 06:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progress`
--

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
(1, 1, 1, 1, NULL, '2021-03-04 14:11:17'),
(2, 1, 2, 30, '', '2021-03-04 14:13:26'),
(3, 1, 3, 21, '', '2021-03-04 14:14:18'),
(4, 1, 4, 14, '', '2021-03-04 14:14:30'),
(5, 1, 5, 9, '', '2021-03-04 14:15:07'),
(6, 1, 6, 14, '', '2021-03-04 14:15:21'),
(7, 1, 7, 1, NULL, '2021-03-04 14:16:10'),
(8, 1, 8, 1, '', '2021-03-04 14:16:18'),
(9, 2, 1, 1, NULL, '2021-03-08 04:25:16'),
(10, 2, 2, 29, 'Hai', '2021-03-08 04:26:37'),
(11, 2, 3, 34, 'SUBREK ', '2021-03-08 04:27:30'),
(12, 2, 4, 38, 'GUYS', '2021-03-08 04:27:53'),
(13, 2, 5, 37, 'HALLOOO', '2021-03-08 04:28:16'),
(14, 2, 6, 38, '', '2021-03-08 04:28:36'),
(15, 2, 7, 1, NULL, '2021-03-08 04:30:58'),
(16, 2, 8, 1, 'KUUUUK', '2021-03-08 04:31:08'),
(17, 3, 1, 1, NULL, '2021-03-08 06:13:45'),
(18, 3, 2, 41, 'TESTINGGGGG', '2021-03-08 06:14:36'),
(19, 3, 3, 32, 'test', '2021-03-08 06:16:14'),
(20, 3, 4, 38, '', '2021-03-08 06:16:39'),
(21, 3, 5, 37, '', '2021-03-08 06:17:11'),
(22, 3, 6, 38, '', '2021-03-08 06:17:41'),
(23, 3, 7, 1, NULL, '2021-03-08 06:39:08'),
(24, 3, 6, 1, '', '2021-03-08 06:39:37'),
(25, 3, 7, 1, NULL, '2021-03-08 06:39:50'),
(26, 3, 8, 38, '', '2021-03-08 07:09:11'),
(27, 4, 1, 1, NULL, '2021-03-08 07:26:06'),
(28, 5, 1, 1, NULL, '2021-03-09 06:50:19'),
(29, 5, 2, 26, 'OKEH', '2021-03-09 06:53:23'),
(30, 5, 3, 34, 'OKE MANATP', '2021-03-09 06:53:51'),
(31, 5, 4, 38, '', '2021-03-09 06:54:11'),
(32, 5, 5, 37, 'oke', '2021-03-09 06:54:51'),
(33, 5, 6, 38, 'CAIR', '2021-03-09 06:55:31'),
(34, 5, 7, 1, NULL, '2021-03-09 06:59:26'),
(35, 5, 8, 38, '', '2021-03-09 06:59:52'),
(36, 4, 2, 1, '', '2021-03-15 02:38:20'),
(37, 4, 3, 1, '', '2021-03-15 02:38:32'),
(38, 4, 4, 1, '', '2021-03-15 02:38:43'),
(39, 4, 5, 1, '', '2021-03-15 02:46:58'),
(40, 4, 6, 1, '', '2021-03-15 02:56:14'),
(41, 4, 7, 1, NULL, '2021-03-15 03:06:33'),
(42, 4, 8, 1, '', '2021-03-15 03:10:33'),
(43, 6, 1, 1, NULL, '2021-03-15 03:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening_kegiatan`
--

CREATE TABLE `tbl_rekening_kegiatan` (
  `_id` int(11) NOT NULL,
  `kode_rekening` varchar(200) NOT NULL,
  `nama_rekening` text NOT NULL,
  `id_sub` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `status` char(2) NOT NULL DEFAULT '1',
  `pagu` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening_kegiatan`
--

INSERT INTO `tbl_rekening_kegiatan` (`_id`, `kode_rekening`, `nama_rekening`, `id_sub`, `id_program`, `id_kegiatan`, `status`, `pagu`, `created_at`) VALUES
(17, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 13, 137, 27, '1', 130000, '2021-03-03 08:25:44'),
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
(41, '5.1.02.02.0', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 24, 135, 28, '1', 24700000, '2021-03-03 09:03:52'),
(42, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 26, 139, 35, '1', 1600000, '2021-03-04 07:08:21'),
(43, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 26, 139, 35, '1', 12100000, '2021-03-04 07:09:12'),
(44, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 26, 139, 35, '1', 33300000, '2021-03-04 07:10:09'),
(45, '5.1.02.02.01.0029', 'Belanja Jasa Tenaga Ahli', 26, 139, 35, '1', 3000000, '2021-03-04 07:10:50'),
(46, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 13, 137, 27, '1', 6270000, '2021-03-04 07:12:51'),
(47, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 13, 137, 27, '1', 13600000, '2021-03-04 07:13:48'),
(48, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 25, 137, 27, '1', 575000, '2021-03-04 07:14:53'),
(49, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 25, 137, 27, '1', 2475000, '2021-03-04 07:15:33'),
(50, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 25, 137, 27, '1', 1950000, '2021-03-04 07:16:28'),
(51, '5.1.02.02.01.0029', 'Belanja Jasa Tenaga Ahli', 25, 137, 27, '1', 5000000, '2021-03-04 07:16:57'),
(52, '5.1.02.01.01.0043', 'Belanja Natura dan Pakan-Natura', 31, 135, 30, '1', 37200000, '2021-03-04 07:29:06'),
(53, '5.1.02.01.01.0053', 'Belanja Makanan dan Minuman Jamuan Tamu', 31, 135, 30, '1', 52800000, '2021-03-04 07:30:23'),
(54, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 32, 135, 30, '1', 400000, '2021-03-04 07:33:51'),
(56, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 32, 135, 30, '1', 11900000, '2021-03-04 07:36:12'),
(57, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 32, 135, 30, '1', 7700000, '2021-03-04 07:40:01'),
(58, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 30, 135, 39, '1', 500000, '2021-03-04 07:43:58'),
(59, '5.1.02.01.01.0070', 'Belanja Pakaian Pelatihan Kerja', 34, 135, 39, '1', 13200000, '2021-03-04 07:44:52'),
(60, '5.1.02.02.01.0003', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara dan Panitia', 34, 135, 39, '1', 3800000, '2021-03-04 07:45:56'),
(61, '5.1.02.02.01.0029', 'Belanja Jasa Tenaga Ahli', 34, 135, 39, '1', 8000000, '2021-03-04 07:47:49'),
(62, '5.1.02.02.04.0036', 'Belanja Sewa Kendaraan Bermotor Penumpang', 34, 135, 39, '1', 10000000, '2021-03-04 07:48:20'),
(63, '5.1.02.02.05.0009', 'Belanja Sewa Bangunan Gedung Tempat Pertemuan', 34, 135, 39, '1', 72925000, '2021-03-04 07:48:54'),
(65, '5.1.02.01.01.0026', 'Belanja Alat/Bahan Untuk Kegiatan Kantor - Bahan Cetak', 48, 133, 24, '1', 450000, '2021-03-05 02:35:37'),
(66, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 48, 133, 24, '1', 2750000, '2021-03-05 02:36:59'),
(67, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan ', 48, 133, 24, '1', 6800000, '2021-03-05 02:39:16'),
(68, '5.1.02.02.01.0004', 'Honorarium Panitia Pelaksana Kegiatan', 49, 133, 46, '1', 9600000, '2021-03-05 03:04:27'),
(69, '5.1.02.02.01.0029', 'Honorarium Tenaga Ahli', 49, 133, 46, '1', 2000000, '2021-03-05 03:06:45'),
(70, '5.2.18.02.2.01.0026', 'Belanja Alat/Bahan Untuk Kegiatan Kantor-Bahan Cetak', 49, 133, 46, '1', 650000, '2021-03-05 03:08:33'),
(71, '5.1.02.01.01.0052', 'Belanja Makan dan Minum Rapat', 49, 133, 46, '1', 2750000, '2021-03-05 03:10:50'),
(72, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 34, 135, 39, '1', 500000, '2021-03-05 03:41:23'),
(73, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 29, 133, 24, '1', 450000, '2021-03-05 03:55:56'),
(74, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 29, 133, 24, '1', 8250000, '2021-03-05 03:56:55'),
(75, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 29, 133, 24, '1', 21300000, '2021-03-05 03:58:01'),
(76, '5.1.02.01.01.0026', 'Belanja Alat/Bahan Untuk Kegiatan Kantor - Bahan Cetak', 19, 135, 25, '1', 600000, '2021-03-05 04:24:31'),
(77, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 19, 135, 25, '1', 14400000, '2021-03-05 04:37:21'),
(78, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 27, 135, 25, '1', 400000, '2021-03-05 04:42:19'),
(79, '5.1.02.02.01.004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 27, 135, 25, '1', 19600000, '2021-03-05 04:43:40'),
(80, '5.1.02.01.01.026', 'Belanja Alat /Bahan untuk Kegiatan Kantor-Bahan Cetak', 21, 135, 25, '1', 650000, '2021-03-05 04:46:02'),
(81, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 21, 135, 25, '1', 4350000, '2021-03-05 05:10:31'),
(82, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor - Bahan Cetak', 39, 135, 36, '1', 200000, '2021-03-05 08:19:48'),
(83, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 39, 135, 36, '1', 15600000, '2021-03-05 08:23:52'),
(84, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 50, 135, 36, '1', 300000, '2021-03-05 08:29:48'),
(85, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat  Tim Pelaksana Kegiatan', 50, 135, 36, '1', 3700000, '2021-03-05 08:31:19'),
(86, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 44, 135, 43, '1', 330000, '2021-03-05 08:35:23'),
(87, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 44, 135, 43, '1', 18600000, '2021-03-05 08:37:03'),
(88, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak', 51, 135, 43, '1', 270000, '2021-03-05 08:41:06'),
(89, '5.1.02.02.01.0004', 'Honorarium Tim Pelaksana Kegiatan dan Sekretariat Tim Pelaksana Kegiatan', 51, 135, 43, '1', 6200000, '2021-03-05 08:42:36'),
(90, '5.1.02.01.01.0031', 'Belanja Alat / Bahan untuk Kegiatan Kantor - Alat Listrik', 37, 135, 30, '1', 43250000, '2021-03-09 06:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kegiatan`
--

CREATE TABLE `tbl_sub_kegiatan` (
  `_id` int(11) NOT NULL,
  `nama_sub` text NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `kode_sub` varchar(200) NOT NULL,
  `status` char(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_kegiatan`
--

INSERT INTO `tbl_sub_kegiatan` (`_id`, `nama_sub`, `id_program`, `id_kegiatan`, `kode_sub`, `status`, `created_at`) VALUES
(11, 'Penyediaan Pelayanan Terpadu Perizian dan Non Perizinan Berbasis Sistem Pelayanan Perizinan Berusaha Terintegrasi Secara Elektronik', 133, 24, '2.18.04.2.01.01', '0', '2021-03-03 07:44:12'),
(13, 'PENYUSUNAN STRATEGI PROMOSI PENANAMAN MODAL', 137, 27, '2.18.03.2.01.01', '1', '2021-03-03 08:09:30'),
(14, 'PENYUSUNAN DOKUMEN PERENCANAAN PERANGKAT DAERAH', 135, 28, '2.18.01.2.01.01', '1', '2021-03-03 08:23:10'),
(16, 'KOORDINASI DAN PENYUSUNAN DOKUMEN RKA-SKPD', 135, 28, '2.18.01.2.01.02', '1', '2021-03-03 08:29:29'),
(17, 'KOORDINASI  DAN PENYUSUNAN DOKUMEN PERUBAHAN RKA-SKPD', 135, 28, '2.18.01.2.01.03', '1', '2021-03-03 08:33:35'),
(18, 'KOORDINASI DAN PENYUSUNAN DPA-SKPD', 135, 28, '2.18.01.2.01.04', '1', '2021-03-03 08:36:44'),
(19, 'PELAKSANAAN PENATAUSAHAAN DAN PENGUJIAN /VERIFIKASI KEUANGANSKPD', 135, 25, '2.18.2.02.03', '1', '2021-03-03 08:38:47'),
(21, 'KOORDINASI DAN PENYUSUNAN LAPORAN KEUANGAN AKHIR TAHUN SKPD', 135, 25, '2.18.01.2.02.05', '1', '2021-03-03 08:43:15'),
(23, 'KOORDINASI DAN PENYUSUNAN PERUBAHAN DPA-SKPD', 135, 28, '2.18.01.2.01.05', '1', '2021-03-03 08:58:50'),
(24, 'KOORDINASI DAN PENYUSUNAN LAPORAN CAPAIAN KINERJA DAN IKHTISAR REALISASI KINERJA SKPD', 135, 28, '2.18.01.2.01.06', '1', '2021-03-03 09:02:10'),
(25, 'PELAKSANAAN KEGIATAN PROMOSI PENANAMAN MODAL DAERAH KABUPATEN/KOTA', 137, 27, '2.18.03.2.01.02', '1', '2021-03-04 06:36:14'),
(26, 'PENGOLAHAN, PENYAJIAN DAN PEMANFAATAN DATA DAN INFORMASI PERIZINAN DAN NON PERIZINAN BERBASIS SISTEM PELAYANAN PERIZINAN BERUSAHA TERINTEGRASI SECARA ELEKTRONIK', 139, 35, '2.18.06.2.01.01', '1', '2021-03-04 06:41:17'),
(27, 'KOORDINASI DAN PENYUSUNAN LAPORAN KEUANGAN BULANAN/TRIWULANAN/SEMESTERAN SKPD', 135, 25, '2.18.01.2.02.07', '1', '2021-03-04 07:04:44'),
(28, 'PENYUSUNAN PERENCANAAN KEBUTUHAN BARANG MILIK DAERAH', 135, 36, '2.18.01.2.03.01', '1', '2021-03-04 07:09:27'),
(29, 'PENYEDIAAN PELAYANAN TERPADU PERIZINAN DAN NON PERIZINAN BERBASIS SISTEM PELAYANAN PERIZINAN BERUSAHA TERINTEGRASI SECARA ELEKTRONIK', 133, 24, '2.18.04.2.01.01', '1', '2021-03-04 07:20:21'),
(30, 'PENYELENGGARAAN RAPAT KOORDINASI DAN KONSULTASI SKPD', 135, 30, '2.18.01.2.06.09', '1', '2021-03-04 07:21:54'),
(31, 'FASILITASI KUNJUNGAN TAMU', 135, 30, '2.18.01.2.06.08', '1', '2021-03-04 07:27:24'),
(32, 'DUKUNGAN PELAKSANAAN SISTEM PEMERINTAHAN BERBASIS ELEKTRONIK PADA SKPD', 135, 30, '2.18.01.2.06.11', '1', '2021-03-04 07:32:31'),
(33, 'PEMELIHARAAN/REHABILITASISARANA DAN PRASANA GEDUNG KANTOR ATAU BANGUNAN LAINNYA', 135, 37, '2.18.01.2.06.09', '1', '2021-03-04 07:33:50'),
(34, 'PENDIDIKAN DAN PELATIHAN PEGAWAI BERDASARKAN TUGAS DAN FUNGSI', 135, 39, '2.18.01.2.05.09', '1', '2021-03-04 07:42:45'),
(35, 'PENGADAAN PERALATAN DAN MESIN LAINNYA', 135, 38, '2.18.01.2.07.06', '1', '2021-03-04 07:47:41'),
(36, 'PENYEDIAAN JASA PEMELIHARAAN , BIAYA PEMELIHARAAN DAN PAJAK KENDARAAN PERORANGAN DINAS ATAU KENDARAAN DINAS JABATAN', 135, 37, '2.18.01.2.09.01', '1', '2021-03-04 08:01:39'),
(37, 'PENYEDIAAN KOMPONEN INSTALASI LISTRIK/PENERANGAN BANGUNAN KANTOR', 135, 30, '2.18.01.2.06.01', '1', '2021-03-04 08:06:46'),
(38, 'PEMBINAAN,PENGAWASAN DAN PENGENDALIAN BMD', 135, 36, '2.18.01.2.03.04', '1', '2021-03-04 08:14:56'),
(39, 'REKONSILIASI DAN PENYUSUNAN DAN LAPORAN BMD', 135, 36, '2.18.01.2.03.05', '1', '2021-03-04 08:16:18'),
(40, 'PENATAUSAHAAN BARANG MILIK DAERAH', 135, 25, '2.18.01.2.03.06', '1', '2021-03-04 08:17:31'),
(41, 'PENYEDIAAN JASA KOMUNIKASI, SUMBER DAYA AIR DAN LISTRIK', 135, 42, '2.18.01.2.08.02', '1', '2021-03-04 08:17:58'),
(42, 'PERENCANAAN PENGELOLAAN RETRIBUSI DAERAH', 135, 43, '2.18.01.2.04.01', '1', '2021-03-04 08:20:20'),
(43, 'PENGOLAHAN DATA RETRIBUSI DAERAH', 135, 25, '2.18.01.2.04.05', '1', '2021-03-04 08:21:26'),
(44, 'PELAPORAN PENGELOLAAN RETRIBUSI DAERAH', 135, 43, '2.18.01.2.04.05', '1', '2021-03-04 08:23:55'),
(45, 'PENYEDIAAN JASA PELAYANAN UMUM KANTOR', 135, 42, '2.18.01.2.08.04', '1', '2021-03-04 08:27:23'),
(48, 'PENYEDIAAN LAYANAN KONSULTASI DAN PENGELOLAAN PENGADUAN MASYARAKAT TERHADAP PELAYANAN TERPADU PERIZINAN DAN NON PERIZINAN', 133, 24, '2.18.04.2.01.03', '1', '2021-03-05 02:33:18'),
(49, 'PENETAPAN KEBIJAKAN DAERAH MENGENAI PEMBERIAN FASILITAS/INSENTIF DAN KEMUDAHAN PENANAMAN MODAL ', 133, 46, '2.18.02.2.01.01', '1', '2021-03-05 02:58:36'),
(50, 'PENATAUSAHAAN BARANG MILIK DAERAH PADA SKPD', 135, 36, '2.18.01.2.03.06', '1', '2021-03-05 08:27:10'),
(51, 'PENGOLAHAN DATA RETRIBUSI DAERAH', 135, 43, '2.18.01.2.04.05', '1', '2021-03-05 08:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

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
(1, 'Lukman Hadi', 'Admin', '$2y$04$.fHTL..uhGCtfTWT0Lo04uQiRm9W4ScJhFOyr/cmiiYRidYXifyS.', 4, 'cc3374b1ddf9ff2377965218e535e293.png', '2', 'test@example.com', 'test', 6, '1', '2021-02-01 07:56:14'),
(22, 'AKMAL FIKRI,Sip', '197802052009011004', '$2y$04$bnsISDBHhUGGYPH3KuIPZeL0c5iMjO2QnIAvy1IRiQ5zNSBm6UugG', 6, '', '088998989', 'AkmalFikri@mail.com', 'DPMPTSP', 4, '1', '2021-03-03 07:15:16'),
(23, 'WAHYU ANWAR S. Sos', '198106052008011026', '$2y$04$jBmZdpbTzAEO6M2or7neGu98w1pFulz6AWoAECPIQLYiIp8K/4ucC', 6, '', '089898989', 'WahyuAnwar@mail.com', 'DPMPTSP', 2, '1', '2021-03-03 07:16:27'),
(24, 'DIAN MARDIANTI,SE', '197703232010012007', '$2y$04$RMul.f.17KluriV5DGghJuYOgV/nUBstrp8.HmG8mf7BFPv3pEX7i', 6, '', '912839123013', 'DianMardiati@mail.com', 'DPMPTSP', 3, '1', '2021-03-03 07:17:30'),
(25, 'HJ. MURTININGSIH, SE', '196402271991032003', '$2y$04$VdZHHKREQMjDtrGymYaAeuw9vQ/rbyw1j93j24ZMiupA/iLUKlgDe', 3, '', '088989', 'test@example.com', 'DPMPTSP', 3, '1', '2021-03-03 07:22:08'),
(26, 'EIN CHAIRINI, S. SOS, M. Si', '197208042010012002', '$2y$04$fELyDtw6xNjHFyFiEwOQaOdXpXXuZCbAy1grT0QVMiucIFCYD9bTW', 3, '', '08989382123', 'test@example.com', 'DPMPTSP', 5, '1', '2021-03-03 07:22:54'),
(27, 'BAGUS MULYANA, S.Sos', '197005152007011018', '$2y$04$P385uqEiEry6IGn9x62v2e3.TTTH29mFMTUPum73x1AS9tf8i5.a2', 3, '', '0128301923123', 'test@example.com', 'DPMPSTSP', 5, '1', '2021-03-03 07:23:47'),
(28, 'DHANIA AFHIANTI, ST', '197712102005012011', '$2y$04$6hWsq5XfoCT2PjTaCREUMexxXuhd6arG8d.T0X7Be.cgv/3uAkKxi', 3, '', '088888', 'test@mail.com', 'DPMPTSP', 2, '1', '2021-03-03 07:34:09'),
(29, 'TEDI FAUZI RAHMAT, SE', '198006112002121004', '$2y$04$0gZvrfc25WRw4LNLx.k8V.l3k724VkTaPi/g/DXesKvKDX26oUlFe', 3, '', '08120830830', 'testmail@mail.com', 'DPMPTSP', 3, '1', '2021-03-03 07:36:38'),
(30, 'WIDYA SUNDARI, SE', '198410082009022001', '$2y$04$ByULDritOLSEDkfjypbjXeXYL40Zc.gcW2dRojiv3A4MCM1a31h3.', 3, '', '0808080', 'test@mail.com', 'dpmptsp', 4, '1', '2021-03-03 07:46:32'),
(32, 'ERIC WIDASWARA, ST, MM', '198109082006041009', '$2y$04$pBnVdnnBWbMGXnmm4K6qc.nVU6BOf5pMegsnVai9.2n1UHblVyosO', 2, '', '12345123', 'test@example.com', 'DPMPTSP', 4, '1', '2021-03-05 02:25:02'),
(34, 'JOYCE IRMAWANTI, SP, MSE, MA', '197404281999032004', '$2y$04$KZGzP6Iamrj0OSpas07Que8f828E5x9QxWIp9M7USycQoyqUWfzRe', 2, '', '123123', 'test@example.com', 'DPMPTSP', 5, '1', '2021-03-05 02:25:58'),
(35, 'H. HASAN ANSORY, SH', '196303071984031005', '$2y$04$uxLOaYtNf.Uj/vTOFsSDZeVv3Dl3s3qZkA7njNpbW0jfxqbghMflG', 2, '', '123123', 'test@example.com', 'DPMPTSP', 2, '1', '2021-03-05 02:26:36'),
(36, 'Dra. Hj. INNA NURIMANIWATI, M.Si', '196709031989032003', '$2y$04$l8.Z5TPer.UZ7rA8OwdrqeRuwP2jq6hdfCi79MUmeOwEqf46qJx3u', 2, '', '12312', 'test@example.com', 'DPMPTSP', 3, '1', '2021-03-05 02:27:32'),
(37, 'Hj. IDA NOVAIDA, SH', '196211011990102001', '$2y$04$yvKSjeaWkKUe09yh0Nsi1OLgO2bQI/QTYbaIAKgu0mSLEgPvcvY4a', 1, '', '123123', 'test@example.com', 'DPMPTSP', 6, '1', '2021-03-05 02:28:06'),
(38, 'Hj. ILA NURLAELA, Sip', '196903121998032003', '$2y$04$VlUWigsNI5qT8ChdN7Ssdec.zMCcvhvZamfEhsA4ghLMCDmPAcA5y', 7, '', '123123', 'test@example.com', 'DPMPTSP', 5, '1', '2021-03-05 02:28:44'),
(40, 'ADI WAHYUDI, ST', '197802102010011014', '$2y$04$Ssy5qI8G5oqmFYT/.e1m1OrAGJ8xRQs2shE9Fqdij1iSRzPdl3/26', 3, '', '123123', 'test@example.com', 'DPMPTSP', 4, '1', '2021-03-05 02:31:19'),
(41, 'CHERU TRISNAWATI,S.Sos', '198107282008012007', '$2y$04$HhPavDXgpE3KNmXb9bAkbOrlLzEKChskxWzW/2.kKzTJ9wUbFUdAO', 3, '', '123123', 'test@example.com', 'DPMPTSP', 4, '1', '2021-03-05 02:31:56'),
(42, 'HENI ROHAENI, SE', '197812292011012003', '$2y$04$KFF8tJmfT0ub5N1EOz83i.DZHkTzEceSDqXRDt3q8FTSUGsN6pnlq', 3, '', '123123', 'test@example.com', 'DPMPTSP', 3, '1', '2021-03-05 02:32:46'),
(43, 'MUTTHOLI\'AH, SH', '198308142002122001', '$2y$04$UNLFH17wcYf09tNDu0DfouG0lB3ZyL1m.pbEe3ATNZD3MI9WjZ/Je', 3, '', '123123', 'test@example.com', ' DPMPTSP', 2, '1', '2021-03-05 02:33:24'),
(44, 'DANA WIRYA, S.Sos', '196411121994031006', '$2y$04$83TD7KL/vbcpQ.sT0q0T8uxWDGfhrSxAMgWC4LypCqMYJ3ZlzVpI2', 3, '', '123123', 'test@example.com', 'DPMPTSP', 13, '1', '2021-03-05 02:34:11');

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
-- Indexes for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
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
  ADD PRIMARY KEY (`_id`),
  ADD KEY `tbl_kegiatan_ibfk_1` (`id_program`);

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
  ADD PRIMARY KEY (`_id`),
  ADD KEY `id_sub` (`id_sub`);

--
-- Indexes for table `tbl_sub_kegiatan`
--
ALTER TABLE `tbl_sub_kegiatan`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

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
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_rincian`
--
ALTER TABLE `tbl_pengajuan_rincian`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_progress_pengajuan`
--
ALTER TABLE `tbl_progress_pengajuan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_rekening_kegiatan`
--
ALTER TABLE `tbl_rekening_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_sub_kegiatan`
--
ALTER TABLE `tbl_sub_kegiatan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD CONSTRAINT `tbl_kegiatan_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `tbl_rekening_kegiatan`
--
ALTER TABLE `tbl_rekening_kegiatan`
  ADD CONSTRAINT `tbl_rekening_kegiatan_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `tbl_sub_kegiatan` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_kegiatan`
--
ALTER TABLE `tbl_sub_kegiatan`
  ADD CONSTRAINT `tbl_sub_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
