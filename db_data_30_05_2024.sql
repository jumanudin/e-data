-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2024 at 08:50 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `status_id` int NOT NULL,
  `status_code` int DEFAULT NULL,
  `status_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`status_id`, `status_code`, `status_name`) VALUES
(1, 1, 'Online'),
(2, 2, 'Suspend'),
(3, 3, 'Banned'),
(4, 4, 'Deleted'),
(5, 0, 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int NOT NULL,
  `agama` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budh'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Kantor Wilayah Kementerian Agama Provinsi Sumatera Barat', '2022-03-25 02:17:27', '2022-03-25 02:17:27'),
(2, 'Kepala Bidang Pendidikan Agama dan Keagamaan Islam', '2022-03-25 02:17:40', '2022-03-25 02:17:40'),
(3, 'Kepala Bidang Pendidikan Madrasah ', '2022-03-25 02:17:50', '2022-03-25 02:17:50'),
(4, 'Kepala Bidang Penerangan Agama Islam dan Pemberdayaan Zakat dan Wakaf', '2023-02-21 10:23:39', '2023-02-21 10:23:39'),
(5, 'Kepala Bidang Penyelenggaraan Haji dan Umrah', '2023-02-21 10:24:04', '2023-02-21 10:24:04'),
(6, 'Kepala Bagian Tata Usaha', NULL, NULL),
(7, 'Kepala Bidang Urusan Agama Islam', '2023-02-21 10:28:32', '2023-02-21 10:28:32'),
(8, 'Pembimbing Masyarakat Buddha ', '2023-02-21 10:29:13', '2023-02-21 10:29:13'),
(9, 'Pembimbing Masyarakat Hindu', '2023-02-21 10:29:37', '2023-02-21 10:29:37'),
(10, 'Pembimbing Masyarakat Katolik', '2023-02-21 10:30:04', '2023-02-21 10:30:04'),
(11, 'Pembimbing Masyarakat Kristen', '2023-02-21 10:30:33', '2023-02-21 10:30:33'),
(12, 'JFT-Pranata Komputer', '2023-02-21 10:32:10', '2023-02-21 10:32:10'),
(13, 'JFT-Perencana', '2023-02-21 10:32:29', '2023-02-21 10:32:29'),
(14, 'JFT-Penyuluh Agama Islam', '2023-02-21 10:33:09', '2023-02-21 10:33:09'),
(15, 'JFT-Pranata Humas', NULL, NULL),
(16, 'JFT-Analis Kebijakan', NULL, NULL),
(17, 'JFT-Arsiparis', NULL, NULL),
(18, 'JFT-Analis Kepegawaian/Analis SDM Aparatur', NULL, NULL),
(19, 'JFT-APBN', NULL, NULL),
(20, 'JFT-Pamong Budaya', NULL, NULL),
(21, 'JFT-Penggrak Swadaya Masyarakat', NULL, NULL),
(22, 'JFT-Analis Hukum', NULL, NULL),
(23, 'JFT-Pengembangan Teknologi Pembelajaran', NULL, NULL),
(24, 'Pelaksana', NULL, NULL),
(25, 'JFT-Lainnya', NULL, NULL),
(26, 'JFT_Penyuluh Agama Katolik', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int NOT NULL,
  `kode` varchar(4) DEFAULT NULL,
  `jenis_kelamin` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `kode`, `jenis_kelamin`) VALUES
(1, 'L', 'Laki - Laki'),
(2, 'P', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `id` int UNSIGNED NOT NULL,
  `kode` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibukota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`id`, `kode`, `nama`, `ibukota`, `created_at`, `updated_at`) VALUES
(1, 'KD01', 'Kota Pangkalpinang', 'Pangkalpinang', '2021-07-06 02:46:19', '2024-02-22 00:41:02'),
(2, 'KD02', 'Kabupaten Bangka', 'Sungailiat', '2021-07-06 23:07:30', '2021-07-06 23:07:30'),
(3, 'KD03', 'Kabupaten Bangka Tengah', 'Koba', '2021-07-06 23:12:08', '2021-07-06 23:12:08'),
(4, 'KD04', 'Kabupaten Bangka Barat', 'Muntok', '2021-12-29 19:07:59', '2024-02-24 02:05:00'),
(5, 'KD05', 'Kabupaten Bangka Selatan', 'Toboali', '2021-12-29 19:08:32', '2024-03-01 03:58:56'),
(6, 'KD06', 'Kabupaten Belitung', 'Tanjung Pandan', '2021-12-29 19:08:56', '2021-12-29 19:08:56'),
(7, 'KD07', 'Kabupaten Belitung Timur', 'Manggar', '2021-12-29 19:09:32', '2021-12-29 19:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int NOT NULL,
  `kab_kota` varchar(4) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kab_kota`, `kecamatan`) VALUES
(1, 'KD06', 'Ampek Nagari (IV Nagari )'),
(2, 'KD06', 'Banuhampu'),
(3, 'KD06', 'Baso'),
(4, 'KD06', 'Candung'),
(5, 'KD06', 'IV Angkat Candung (Ampek Angkek)'),
(6, 'KD06', 'IV Koto (Ampek Koto)'),
(7, 'KD06', 'Kamang Magek'),
(8, 'KD06', 'Lubuk Basung'),
(9, 'KD06', 'Malakak'),
(10, 'KD06', 'Matur'),
(11, 'KD06', 'Palembayan'),
(12, 'KD06', 'Palupuh'),
(13, 'KD06', 'Sungai Pua (Puar)'),
(14, 'KD06', 'Tanjung Mutiara'),
(15, 'KD06', 'Tanjung Raya'),
(16, 'KD06', 'Tilatang Kamang'),
(17, 'KD17', 'Aur Birugo Tigo Baleh'),
(18, 'KD17', 'Guguk Panjang (Guguak Panjang)'),
(19, 'KD17', 'Mandiangin Koto Selayan'),
(20, 'KD11', 'Asam Jujuhan'),
(21, 'KD11', 'Koto Besar'),
(22, 'KD11', 'Koto Salak'),
(23, 'KD11', 'Padang Laweh'),
(24, 'KD11', 'Pulau Punjung'),
(25, 'KD11', 'Sembilan Koto'),
(26, 'KD11', 'Sitiung'),
(27, 'KD11', 'Sungai Rumbai'),
(28, 'KD11', 'Timpeh'),
(29, 'KD11', 'Tiumang'),
(30, 'KD10', 'Pagai Selatan'),
(31, 'KD10', 'Pagai Utara'),
(32, 'KD10', 'Siberut Barat'),
(33, 'KD10', 'Siberut Barat Daya'),
(34, 'KD10', 'Siberut Selatan'),
(35, 'KD10', 'Siberut Tengah'),
(36, 'KD10', 'Siberut Utara'),
(37, 'KD10', 'Sikakap'),
(38, 'KD10', 'Sipora Selatan'),
(39, 'KD10', 'Sipora Utara'),
(40, 'KD07', 'Akabiluru'),
(41, 'KD07', 'Bukik Barisan'),
(42, 'KD07', 'Guguak (Gugu)'),
(43, 'KD07', 'Gunuang Omeh (Gunung Mas)'),
(44, 'KD07', 'Harau'),
(45, 'KD07', 'Kapur IX/Sembilan'),
(46, 'KD07', 'Lareh Sago Halaban'),
(47, 'KD07', 'Luak (Luhak)'),
(48, 'KD07', 'Mungka'),
(49, 'KD07', 'Pangkalan Koto Baru'),
(50, 'KD07', 'Payakumbuh'),
(51, 'KD07', 'Situjuah Limo/Lima Nagari'),
(52, 'KD07', 'Suliki'),
(53, 'KD09', 'Bungus Teluk Kabung'),
(54, 'KD09', 'Koto Tangah'),
(55, 'KD09', 'Kuranji'),
(56, 'KD09', 'Lubuk Begalung'),
(57, 'KD09', 'Lubuk Kilangan'),
(58, 'KD09', 'Nanggalo'),
(59, 'KD09', 'Padang Barat'),
(60, 'KD09', 'Padang Selatan'),
(61, 'KD09', 'Padang Timur'),
(62, 'KD09', 'Padang Utara'),
(63, 'KD09', 'Pauh'),
(64, 'KD16', 'Padang Panjang Barat'),
(65, 'KD16', 'Padang Panjang Timur'),
(66, 'KD05', '2 X 11 Enam Lingkung'),
(67, 'KD05', '2 X 11 Kayu Tanam'),
(68, 'KD05', 'Batang Anai'),
(69, 'KD05', 'Batang Gasan'),
(70, 'KD05', 'Enam Lingkung'),
(71, 'KD05', 'IV Koto Aur Malintang'),
(72, 'KD05', 'Lubuk Alung'),
(73, 'KD05', 'Nan Sabaris'),
(74, 'KD05', 'Padang Sago'),
(75, 'KD05', 'Patamuan'),
(76, 'KD05', 'Sintuk/Sintuak Toboh Gadang'),
(77, 'KD05', 'Sungai Geringging/Garingging'),
(78, 'KD05', 'Sungai Limau'),
(79, 'KD05', 'Ulakan Tapakih/Tapakis'),
(80, 'KD05', 'V Koto Kampung Dalam'),
(81, 'KD05', 'V Koto Timur'),
(82, 'KD05', 'VII Koto Sungai Sarik'),
(83, 'KD19', 'Pariaman Selatan'),
(84, 'KD19', 'Pariaman Tengah'),
(85, 'KD19', 'Pariaman Timur'),
(86, 'KD19', 'Pariaman Utara'),
(87, 'KD08', 'Bonjol'),
(88, 'KD08', 'Duo Koto (II Koto)'),
(89, 'KD08', 'Lubuk Sikaping'),
(90, 'KD08', 'Mapat Tunggul'),
(91, 'KD08', 'Mapat Tunggul Selatan'),
(92, 'KD08', 'Padang Gelugur'),
(93, 'KD08', 'Panti'),
(94, 'KD08', 'Rao'),
(95, 'KD08', 'Rao Selatan'),
(96, 'KD08', 'Rao Utara'),
(97, 'KD08', 'Simpang Alahan Mati'),
(98, 'KD08', 'Tigo Nagari (III Nagari)'),
(99, 'KD13', 'Gunung Tuleh'),
(100, 'KD13', 'Kinali'),
(101, 'KD13', 'Koto Balingka'),
(102, 'KD13', 'Lembah Melintang'),
(103, 'KD13', 'Luhak Nan Duo'),
(104, 'KD13', 'Pasaman'),
(105, 'KD13', 'Ranah Batahan'),
(106, 'KD13', 'Sasak Ranah Pasisir/Pesisie'),
(107, 'KD13', 'Sei Beremas'),
(108, 'KD13', 'Sungai Aur'),
(109, 'KD13', 'Talamau'),
(110, 'KD18', 'Lamposi Tigo Nagari'),
(111, 'KD18', 'Payakumbuh Barat'),
(112, 'KD18', 'Payakumbuh Selatan'),
(113, 'KD18', 'Payakumbuh Timur'),
(114, 'KD18', 'Payakumbuh Utara'),
(115, 'KD01', 'Airpura'),
(116, 'KD01', 'Basa Ampek Balai Tapan'),
(117, 'KD01', 'Batang Kapas'),
(118, 'KD01', 'Bayang'),
(119, 'KD01', 'IV Jurai'),
(120, 'KD01', 'IV Nagari Bayang Utara'),
(121, 'KD01', 'Koto XI Tarusan'),
(122, 'KD01', 'Lengayang'),
(123, 'KD01', 'Linggo Sari Baganti'),
(124, 'KD01', 'Lunang'),
(125, 'KD01', 'Pancung Soal'),
(126, 'KD01', 'Ranah Ampek Hulu Tapan'),
(127, 'KD01', 'Ranah Pesisir'),
(128, 'KD01', 'Silaut'),
(129, 'KD01', 'Sutera'),
(130, 'KD15', 'Barangin'),
(131, 'KD15', 'Lembah Segar'),
(132, 'KD15', 'Silungkang'),
(133, 'KD15', 'Talawi'),
(134, 'KD03', 'IV Nagari'),
(135, 'KD03', 'Kamang Baru'),
(136, 'KD03', 'Koto VII'),
(137, 'KD03', 'Kupitan'),
(138, 'KD03', 'Lubuak Tarok'),
(139, 'KD03', 'Sijunjung'),
(140, 'KD03', 'Sumpur Kudus'),
(141, 'KD03', 'Tanjung Gadang'),
(142, 'KD02', 'Lubuk Sikarah'),
(143, 'KD02', 'Tanjung Harapan'),
(144, 'KD14', 'Bukit Sundi'),
(145, 'KD14', 'Danau Kembar'),
(146, 'KD14', 'Gunung Talang'),
(147, 'KD14', 'Hiliran Gumanti'),
(148, 'KD14', 'IX Koto Sungai Lasi'),
(149, 'KD14', 'Junjung Sirih'),
(150, 'KD14', 'Kubung'),
(151, 'KD14', 'Lembah Gumanti'),
(152, 'KD14', 'Lembang Jaya'),
(153, 'KD14', 'Pantai Cermin'),
(154, 'KD14', 'Payung Sekaki'),
(155, 'KD14', 'Tigo Lurah'),
(156, 'KD14', 'X Koto Diatas'),
(157, 'KD14', 'X Koto Singkarak'),
(158, 'KD12', 'Koto Parik Gadang Diateh'),
(159, 'KD12', 'Pauh Duo'),
(160, 'KD12', 'Sangir'),
(161, 'KD12', 'Sangir Balai Janggo'),
(162, 'KD12', 'Sangir Jujuan'),
(163, 'KD12', 'Sungai Pagu'),
(164, 'KD04', 'Batipuh'),
(165, 'KD04', 'Batipuh Selatan'),
(166, 'KD04', 'Lima Kaum'),
(167, 'KD04', 'Lintau Buo'),
(168, 'KD04', 'Lintau Buo Utara'),
(169, 'KD04', 'Padang Ganting'),
(170, 'KD04', 'Pariangan'),
(171, 'KD04', 'Rambatan'),
(172, 'KD04', 'Salimpaung'),
(173, 'KD04', 'Sepuluh Koto (X Koto)'),
(174, 'KD04', 'Sungai Tarab'),
(175, 'KD04', 'Sungayang'),
(176, 'KD04', 'Tanjung Baru');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `modul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trn_id` bigint NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `modul`, `event`, `trn_id`, `user_id`, `user_name`, `email`, `created_at`, `updated_at`) VALUES
(895, 'Modul Users', 'Delete Data', 2, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:43:23', '2024-02-07 00:43:23'),
(896, 'Modul Users', 'Delete Data', 26, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:43:33', '2024-02-07 00:43:33'),
(897, 'Modul Users', 'Delete Data', 36, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:43:39', '2024-02-07 00:43:39'),
(898, 'Modul Users', 'Delete Data', 35, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:43:46', '2024-02-07 00:43:46'),
(899, 'Modul Users', 'Delete Data', 34, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:43:52', '2024-02-07 00:43:52'),
(900, 'Modul Users', 'Delete Data', 29, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:44:01', '2024-02-07 00:44:01'),
(901, 'Modul Users', 'Delete Data', 33, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:44:07', '2024-02-07 00:44:07'),
(902, 'Modul Users', 'Delete Data', 32, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:44:13', '2024-02-07 00:44:13'),
(903, 'Modul Users', 'Delete Data', 31, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:44:19', '2024-02-07 00:44:19'),
(904, 'Modul Users', 'Delete Data', 30, 1, 'Administrator', 'admin@argon.com', '2024-02-07 00:44:25', '2024-02-07 00:44:25'),
(905, 'Modul  - Modul System', 'Create Data', 12, 1, 'Administrator', 'admin@argon.com', '2024-02-19 06:49:46', '2024-02-19 06:49:46'),
(906, 'Modul - Modul System', 'Hapus Data', 12, 1, 'Administrator', 'admin@argon.com', '2024-02-19 06:50:38', '2024-02-19 06:50:38'),
(907, 'Modul  - Modul System', 'Create Data', 14, 1, 'Administrator', 'admin@argon.com', '2024-02-20 18:55:36', '2024-02-20 18:55:36'),
(908, 'Modul - Modul System', 'Update Data', 14, 1, 'Administrator', 'admin@argon.com', '2024-02-20 18:55:57', '2024-02-20 18:55:57'),
(909, 'Modul Users', 'Update Data', 1, 1, 'Administrator', 'admin@argon.com', '2024-02-20 18:57:24', '2024-02-20 18:57:24'),
(910, 'Modul  - Modul System', 'Create Data', 15, 1, 'Administrator', 'admin@argon.com', '2024-02-21 00:53:05', '2024-02-21 00:53:05'),
(911, 'Modul - Modul System', 'Update Data', 15, 1, 'Administrator', 'admin@argon.com', '2024-02-21 00:53:19', '2024-02-21 00:53:19'),
(912, 'Modul  - Modul System', 'Create Data', 16, 1, 'Administrator', 'admin@argon.com', '2024-02-21 00:53:46', '2024-02-21 00:53:46'),
(913, 'Modul  - Modul System', 'Create Data', 17, 1, 'Administrator', 'admin@argon.com', '2024-02-21 00:54:33', '2024-02-21 00:54:33'),
(914, 'Modul  - Modul System', 'Create Data', 18, 1, 'Administrator', 'admin@argon.com', '2024-02-21 00:55:24', '2024-02-21 00:55:24'),
(915, 'Modul  - Modul System', 'Create Data', 19, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:03:53', '2024-02-21 02:03:53'),
(916, 'Modul  - Modul System', 'Create Data', 20, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:04:19', '2024-02-21 02:04:19'),
(917, 'Modul  - Modul System', 'Create Data', 21, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:04:41', '2024-02-21 02:04:41'),
(918, 'Modul  - Modul System', 'Create Data', 22, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:05:19', '2024-02-21 02:05:19'),
(919, 'Modul  - Modul System', 'Create Data', 23, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:05:44', '2024-02-21 02:05:44'),
(920, 'Modul  - Modul System', 'Create Data', 24, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:06:09', '2024-02-21 02:06:09'),
(921, 'Modul  - Modul System', 'Create Data', 25, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:06:55', '2024-02-21 02:06:55'),
(922, 'Modul  - Modul System', 'Create Data', 26, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:10:15', '2024-02-21 02:10:15'),
(923, 'Modul  - Modul System', 'Create Data', 27, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:10:48', '2024-02-21 02:10:48'),
(924, 'Modul  - Modul System', 'Create Data', 28, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:11:40', '2024-02-21 02:11:40'),
(925, 'Modul  - Modul System', 'Create Data', 29, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:12:11', '2024-02-21 02:12:11'),
(926, 'Modul - Modul System', 'Update Data', 16, 1, 'Administrator', 'admin@argon.com', '2024-02-21 02:12:27', '2024-02-21 02:12:27'),
(927, 'Modul  - Modul System', 'Create Data', 30, 1, 'Administrator', 'admin@argon.com', '2024-03-05 22:53:30', '2024-03-05 22:53:30'),
(928, 'Modul - Modul System', 'Update Data', 30, 1, 'Administrator', 'admin@argon.com', '2024-03-05 22:53:46', '2024-03-05 22:53:46'),
(929, 'Modul  - Modul System', 'Create Data', 31, 1, 'Administrator', 'admin@argon.com', '2024-03-06 07:47:41', '2024-03-06 07:47:41'),
(930, 'Modul - Modul System', 'Update Data', 31, 1, 'Administrator', 'admin@argon.com', '2024-03-06 07:47:56', '2024-03-06 07:47:56'),
(931, 'Modul  - Modul System', 'Create Data', 32, 1, 'Administrator', 'admin@argon.com', '2024-03-14 19:53:51', '2024-03-14 19:53:51'),
(932, 'Modul  - Modul System', 'Create Data', 33, 1, 'Administrator', 'admin@argon.com', '2024-03-17 20:13:58', '2024-03-17 20:13:58'),
(933, 'Modul - Modul System', 'Hapus Data', 33, 1, 'Administrator', 'admin@argon.com', '2024-03-17 20:14:51', '2024-03-17 20:14:51'),
(934, 'Modul  - Modul System', 'Create Data', 34, 1, 'Administrator', 'admin@argon.com', '2024-03-17 20:15:20', '2024-03-17 20:15:20'),
(935, 'Modul - Modul System', 'Hapus Data', 34, 1, 'Administrator', 'admin@argon.com', '2024-03-17 20:20:19', '2024-03-17 20:20:19'),
(936, 'Modul  - Modul System', 'Create Data', 35, 1, 'Administrator', 'admin@argon.com', '2024-03-17 20:21:03', '2024-03-17 20:21:03'),
(937, 'Modul - Modul System', 'Hapus Data', 35, 1, 'Administrator', 'admin@argon.com', '2024-03-18 00:26:22', '2024-03-18 00:26:22'),
(938, 'Modul  - Modul System', 'Create Data', 36, 1, 'Administrator', 'admin@argon.com', '2024-03-18 00:29:56', '2024-03-18 00:29:56'),
(939, 'Modul  - Modul System', 'Create Data', 37, 1, 'Administrator', 'admin@argon.com', '2024-04-03 21:19:54', '2024-04-03 21:19:54'),
(940, 'Modul  - Modul System', 'Create Data', 38, 1, 'Administrator', 'admin@argon.com', '2024-04-03 23:20:57', '2024-04-03 23:20:57'),
(941, 'Modul  - Modul System', 'Create Data', 39, 1, 'Administrator', 'admin@argon.com', '2024-04-04 00:25:43', '2024-04-04 00:25:43'),
(942, 'Modul  - Modul System', 'Create Data', 40, 1, 'Administrator', 'admin@argon.com', '2024-04-05 00:25:38', '2024-04-05 00:25:38'),
(943, 'Modul  - Modul System', 'Create Data', 41, 1, 'Administrator', 'admin@argon.com', '2024-04-08 01:42:25', '2024-04-08 01:42:25'),
(944, 'Modul  - Modul System', 'Create Data', 42, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:39:24', '2024-04-12 16:39:24'),
(945, 'Modul  - Modul System', 'Create Data', 43, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:40:15', '2024-04-12 16:40:15'),
(946, 'Modul  - Modul System', 'Create Data', 44, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:40:45', '2024-04-12 16:40:45'),
(947, 'Modul  - Modul System', 'Create Data', 45, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:41:20', '2024-04-12 16:41:20'),
(948, 'Modul  - Modul System', 'Create Data', 46, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:46:20', '2024-04-12 16:46:20'),
(949, 'Modul  - Modul System', 'Create Data', 47, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:46:52', '2024-04-12 16:46:52'),
(950, 'Modul  - Modul System', 'Create Data', 48, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:47:33', '2024-04-12 16:47:33'),
(951, 'Modul  - Modul System', 'Create Data', 49, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:48:53', '2024-04-12 16:48:53'),
(952, 'Modul  - Modul System', 'Create Data', 50, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:52:19', '2024-04-12 16:52:19'),
(953, 'Modul  - Modul System', 'Create Data', 51, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:53:16', '2024-04-12 16:53:16'),
(954, 'Modul - Modul System', 'Update Data', 50, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:56:32', '2024-04-12 16:56:32'),
(955, 'Modul - Modul System', 'Update Data', 46, 1, 'Administrator', 'admin@argon.com', '2024-04-12 16:56:49', '2024-04-12 16:56:49'),
(956, 'Modul  - Modul System', 'Create Data', 52, 1, 'Administrator', 'admin@argon.com', '2024-04-17 21:30:43', '2024-04-17 21:30:43'),
(957, 'Modul  - Modul System', 'Create Data', 53, 1, 'Administrator', 'admin@argon.com', '2024-04-18 01:52:08', '2024-04-18 01:52:08'),
(958, 'Modul  - Modul System', 'Create Data', 54, 1, 'Administrator', 'admin@argon.com', '2024-04-23 01:13:52', '2024-04-23 01:13:52'),
(959, 'Modul  - Modul System', 'Create Data', 55, 1, 'Administrator', 'admin@argon.com', '2024-04-23 02:21:45', '2024-04-23 02:21:45'),
(960, 'Modul  - Modul System', 'Create Data', 56, 1, 'Administrator', 'admin@argon.com', '2024-04-24 01:09:17', '2024-04-24 01:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int NOT NULL,
  `menu_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id`, `menu_name`, `created_at`, `updated_at`) VALUES
(1, 'Menu Admin', NULL, NULL),
(2, 'Menu Umum', NULL, NULL),
(3, 'Menu Arsip', NULL, NULL),
(4, 'Menu Agenda', NULL, NULL),
(5, 'Menu Cuti', NULL, NULL),
(6, 'Menu Perjadin', '2023-12-05 02:22:53', '2023-12-05 02:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(7, '2024_01_20_181726_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int UNSIGNED NOT NULL,
  `nama_modul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modul_type_id` int DEFAULT NULL,
  `menu_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `nama_modul`, `nama_menu`, `modul_type_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 'role_user', 'Level User', 1, 1, '2023-11-30 20:47:30', '2023-11-30 20:47:30'),
(2, 'data_user', 'Data User', 1, 1, '2023-11-30 20:47:36', '2023-11-30 20:47:36'),
(3, 'role_permission', 'Role Permission', 1, 1, '2023-11-30 20:47:40', '2023-11-30 20:47:40'),
(4, 'modul_name', 'Modul Aplikasi', 1, 1, '2023-11-23 00:51:30', '2023-11-23 00:51:30'),
(5, 'city', 'Kabupaten / Kota', 2, 1, '2024-02-07 00:00:33', '2024-02-07 00:00:33'),
(6, 'laymad_ra', 'Layanan Madrasah RA', 3, 1, '2024-02-20 19:34:33', '2024-02-20 19:34:33'),
(7, 'laymad_akra', 'Layanan Akreditasi RA', 3, 1, '2024-02-25 20:28:18', '2024-02-25 20:28:18'),
(8, 'laymad_gra', 'Layanan Data Guru RA', 3, 1, '2024-03-03 19:17:15', '2024-03-03 12:17:15'),
(9, 'logs', 'Logs System', 1, 2, '2023-12-04 19:27:27', '2023-12-04 19:27:27'),
(10, 'pegawai', 'Guru dan Tendik', 2, 1, '2023-12-05 01:53:16', '2023-12-05 01:53:16'),
(11, 'utility', 'Setting System', 1, 1, '2023-12-03 20:56:30', '2023-12-03 20:56:30'),
(12, 'laymad_akmi', 'Layanan Data MI', 3, 1, '2024-03-04 16:50:58', '2024-03-04 16:50:58'),
(13, 'laymad_gmi', 'Layanan Data Guru MI', 3, 1, '2024-03-04 16:51:42', '2024-03-04 16:51:42'),
(14, 'laymad_gsertifikat', 'Layanan Data Sertifikasi Guru', 3, 1, '2024-03-05 11:29:11', '2024-03-05 11:29:11'),
(30, 'layagama_JmlPenduduk', 'Penduduk Menurut Agama', 5, 1, '2024-03-05 22:53:30', '2024-03-05 22:53:30'),
(31, 'layagama_RmhIbadah', 'Rumah Ibadah', 5, 1, '2024-03-06 06:47:56', '2024-03-06 07:47:55'),
(32, 'layagama_TipoMasjid', 'Tipologi Masjid', 5, 1, '2024-03-14 19:53:50', '2024-03-14 19:53:50'),
(36, 'layagama_PenyuluhAgamaPNS', 'Penyuluh Agama PNS', 5, 1, '2024-03-18 00:29:56', '2024-03-18 00:29:56'),
(37, 'layagama_PenyuluhAgamaNonPNS', 'Penyuluh Agama Non PNS', 5, 1, '2024-04-03 21:19:54', '2024-04-03 21:19:54'),
(38, 'layagama_Tunjangan', 'Penyuluh Penerima Tunjangan', 5, 1, '2024-04-03 23:20:57', '2024-04-03 23:20:57'),
(39, 'layagama_Kua', 'KUA', 5, 1, '2024-04-04 00:25:43', '2024-04-04 00:25:43'),
(40, 'layagama_Wakaf', 'Wakaf', 5, 1, '2024-04-05 00:25:38', '2024-04-05 00:25:38'),
(41, 'layagama_qori_hafiz', 'Qori dan Hafiz', 5, 1, '2024-04-08 01:42:25', '2024-04-08 01:42:25'),
(42, 'layphu_kuota', 'Kuota Haji', 6, 1, '2024-04-12 16:39:23', '2024-04-12 16:39:23'),
(43, 'layphu_pendaftaran', 'Pendaftaran Haji', 6, 1, '2024-04-12 16:40:14', '2024-04-12 16:40:14'),
(44, 'layphu_jemaah', 'Jemaah Haji', 6, 1, '2024-04-12 16:40:45', '2024-04-12 16:40:45'),
(45, 'layphu_kbihu', 'KBIHU', 6, 1, '2024-04-12 16:41:20', '2024-04-12 16:41:20'),
(46, 'laytatakelola_wiladm', 'Wilayah Administrasi & FKUB', 7, 1, '2024-04-12 23:56:49', '2024-04-12 16:56:49'),
(47, 'laytatakelola_pns', 'PNS', 7, 1, '2024-04-12 16:46:52', '2024-04-12 16:46:52'),
(48, 'laytatakelola_pensiun', 'Pensiunan', 7, 1, '2024-04-12 16:47:33', '2024-04-12 16:47:33'),
(49, 'laytatakelola_honorer', 'Honorer', 7, 1, '2024-04-12 16:48:51', '2024-04-12 16:48:51'),
(50, 'laytatakelola_ptsp', 'Layanan PTSP & FKUB', 7, 1, '2024-04-12 23:56:31', '2024-04-12 16:56:31'),
(51, 'laytatakelola_bmn', 'Perencanaan & BMN', 7, 1, '2024-04-12 16:53:16', '2024-04-12 16:53:16'),
(52, 'layphu_daftarbaru', 'Daftar Baru', 6, 1, '2024-04-17 21:30:42', '2024-04-17 21:30:42'),
(53, 'layphu_petugas', 'Petugas Haji', 6, 1, '2024-04-18 01:52:08', '2024-04-18 01:52:08'),
(54, 'laytatakelola_pns_pangkat', 'PNS Naik Pangkat', 7, 1, '2024-04-23 01:13:52', '2024-04-23 01:13:52'),
(55, 'laytatakelola_pns_ijinbelajar', 'PNS Ijin Belajar', 7, 1, '2024-04-23 02:21:45', '2024-04-23 02:21:45'),
(56, 'layagama_ormas', 'Data Ormas', 5, 1, '2024-04-24 01:09:16', '2024-04-24 01:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `modul_type`
--

CREATE TABLE `modul_type` (
  `id` int NOT NULL,
  `modul_type` char(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul_type`
--

INSERT INTO `modul_type` (`id`, `modul_type`, `created_at`, `updated_at`) VALUES
(1, 'System', '2021-07-22 08:24:28', '2021-07-22 08:24:28'),
(2, 'Master Data', '2021-07-22 08:24:39', '2021-07-22 08:24:39'),
(3, 'Transaksi Data', '2021-07-22 08:24:44', '2021-07-22 08:24:44'),
(4, 'Report', '2021-11-17 10:58:25', '2021-11-17 10:58:25'),
(5, 'Layanan Keagamaan', '2024-02-21 01:47:47', '2024-02-21 01:47:47'),
(6, 'Layanan Haji & Umrah', '2024-02-21 01:54:20', '2024-02-21 01:54:20'),
(7, 'Layanan Manajemen dan Tata Kelola', '2024-04-12 23:37:27', '2024-04-12 23:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `panggol`
--

CREATE TABLE `panggol` (
  `id` int UNSIGNED NOT NULL,
  `pangkat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gol` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panggol`
--

INSERT INTO `panggol` (`id`, `pangkat`, `gol`, `created_at`, `updated_at`) VALUES
(1, 'Pengatur Muda', 'II/a', '2021-08-20 04:16:09', '2022-01-12 06:54:39'),
(2, 'Pengatur Muda Tk. I', 'II/b', '2021-08-20 02:51:35', '2021-08-20 04:19:35'),
(3, 'Pengatur', 'IIc', '2021-08-20 02:52:09', '2021-08-20 02:52:09'),
(4, 'Pengatur Tingkat I', 'II/d', '2021-08-20 02:52:23', '2021-08-20 04:21:11'),
(5, 'Penata Muda', 'III/a', '2021-08-20 02:52:38', '2021-08-20 02:52:38'),
(6, 'Penata Muda Tk I', 'III/b', '2021-08-20 02:52:51', '2021-08-20 04:21:31'),
(7, 'Penata', 'III/c', '2021-08-20 02:53:11', '2021-08-20 02:53:11'),
(8, 'Penata Tingkat I', 'III/d', '2021-08-20 02:53:25', '2021-08-20 02:53:25'),
(9, 'Pembina', 'IV/a', '2021-08-20 02:53:43', '2021-08-20 02:53:43'),
(10, 'Pembina Tingkat I', 'IV/b', NULL, '2021-09-30 13:19:03'),
(11, 'Pembina Utama Muda', 'IV/c', NULL, NULL),
(12, 'Pembina Utama Madya', 'IV/d', '2021-08-20 04:23:38', '2021-08-20 04:23:38'),
(13, 'Pembina Utama', 'IV/e', NULL, '2021-08-24 00:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('obelstones@gmail.com', '$2y$10$pijyVQUSvWn1usCI690sVuTZfOZMGbzCRu3kbA8Ll/cS1GJqtsZgG', '2022-04-02 23:52:31'),
('satria@gmail.com', '$2y$10$0qMk7sDgi6aDrKzNcR.qK.AIXc..kgolmjnPH49Xij1XxgGbHY06.', '2022-04-03 00:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('rakha.dj@gmail.com', '$2y$10$SwGg9RtJiUNgKawoZfpPzuJT3u86m29.BFFWVo0Nv5PMQ47m9jvZK', '2024-02-04 00:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_golongan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jabatan` int NOT NULL,
  `jabatan_tambahan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kepeg` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `kode_golongan`, `kode_jabatan`, `jabatan_tambahan`, `status_kepeg`, `unit_id`, `no_hp`, `jenis_kelamin`, `email`, `alamat`, `image`, `created_at`, `updated_at`) VALUES
(7, '197003011995031001', 'Dr. H. HELMI, M.Ag', 'IV/c', 1, '', 'PNS', '1', '0', 'L', 'admin@argon.com', '-', 'profile-photos/4wJKpktseTuPaEMNkfaPYW0SIekL3iyCKwCxg8mk.jpg', '2023-04-08 06:14:38', '2023-04-08 06:14:38'),
(8, '196608021994031002', 'Drs. H. MISWAN M.Pd', 'IV/b', 6, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(9, '197610102002122001', 'DINA FITRIA RAMA, SH.MM', 'IV/a', 22, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(10, '197510281998031003', 'SYAHIRUL ALIM, S,Sos.', 'III/d', 13, NULL, 'PNS', '2', '08', 'L', 'rakha.dj@gmail.com', 'GG JAGUNG', 'profile-photos/k1zCPGAWjA2ZL6bNSTVWhXmmajI8lDlMh5UkwZvC.png', '2023-12-22 08:57:24', '2023-12-22 01:57:24'),
(11, '198007022005012012', 'RISNA YANTI S.Sos.I', 'III/c', 15, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(12, '198405312009011007', 'ZAIFUL RAHMAT, S.Kom', 'III/c', 12, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(13, '198408312005011001', 'Dr. SUKMURDIANTO, MA', 'III/c', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(14, '198605242011011011', 'GOPY BERMANA, M.Kom', 'III/c', 12, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(16, '198405092011012015', 'YESFI MIRA ANDRIA, M.Kom', 'III/c', 12, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(17, '197203061993032003', 'MENDRAWATI, S.AP', 'III/b', 17, NULL, 'PNS', '4', '-', 'P', '-', '-', 'profile-photos/user.png', '2023-07-10 09:16:05', '2023-07-10 02:16:05'),
(18, '198008262006041001', 'DINI MAHDUMILLAH, S.IP', 'III/b', 18, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(19, '196805042014111003', 'HASAN BASRI, S.AP', 'III/a', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(20, '198909192019032016', 'SILKY PUTRI MAIZA S.I.P', 'III/a', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(21, '198203172006042003', 'SUSY PRIMAYENI, SE,M.AB', 'IV/a', 19, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(22, '197905292008012013', 'ENDANG MESFITRA S,T', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(23, '198108122005012004', 'VARIA GUSMA PRATIWI S.E', 'III/d', 19, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(24, '197503112009122001', 'SISKA ANGGRAINI SE, M.M', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(25, '197904102009122002', 'Hj. LUCY AFRIANI HAKIM, S.E, Akt', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(26, '197808062009011013', 'MUHAMMAD RIDHA, SE, M.Si', 'III/c', 19, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(27, '198404092011011011', 'H. DENNY AFRICO TASLIM, S.E', 'III/c', 19, 'ppk', 'PNS', '2', '0', 'L', 'x', 'x', 'profile-photos/user.png', '2023-07-10 09:14:28', '2023-07-10 02:14:28'),
(28, '198810132011012011', 'ACE ASNAWELIS SE., M.Si', 'III/c', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(29, '197511272002121009', 'H. AZMI S.E, MM', 'III/c', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(30, '199210182015052002', 'RAHMI OCTAVIA S.E.', 'III/b', 24, 'ppk', 'PNS', '2', '0', 'P', 'admin@argon.com', '-', 'profile-photos/user.png', '2023-04-14 05:06:29', '2023-04-14 05:06:29'),
(31, '198303042006041005', 'RISWAN, SE', 'III/b', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(32, '197601012006042015', 'SRI HASTUTI, SH', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(33, '198407162005011001', 'FAUQA NURI ICHSAN, S.Pd., M.Pd', 'III/d', 16, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(34, '198302112008011007', 'RAHMAT TASNIM S.E, M.Si', 'III/d', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(35, '197904152008011016', 'ARIESTA NURMAN SASONO SHI', 'III/c', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(36, '199009062020121016', 'AHMAD DENI S.AP', 'III/a', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(37, '198801092022031001', 'ARIF YANDU S.Th.I', 'III/a', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(38, '196702151988032004', 'HELMIYETTI, S.Sos', 'IV/b', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(39, '196902171993032002', 'Hj. GUSNIDAR, S.H., M.M', 'IV/a', 6, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(40, '197002071993032001', 'Hj. YENTI DESFITA, S.Kom., M.M', 'IV/a', 18, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(41, '197301122000032003', 'Hj. ERMAYENTI, S.Kom., M.M', 'IV/a', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(42, '197301122000032003', 'H. M. FADLI ISLAMY S.H', 'III/d', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(43, '196806161993032003', 'YUHELMI, SH.', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(44, '197504142009012002', 'AISYAH, S.E, Akt, M.M', 'III/d', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(45, '197805222003122003', 'YELSUSI CITRA, S.Kom, MM', 'III/c', 18, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(46, '197709172007011026', 'IRWANTO FIRSADA S.Ag., M, Sos', 'III/c', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(47, '198108092009011006', 'SYAIFUL, SHI', 'III/b', 18, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(48, '199211132020121011', 'BUDI MULIONO S.Sos', 'III/a', 18, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(49, '199502212020122029', 'NURHIDAYATI S.H', 'III/a', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(50, '199703282020122024', 'MARTA YOLA ROZA S.Psi', 'III/a', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(51, '197906032009012005', 'DERLINA, S.AP', 'IIc', 18, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(52, '196703031987031002', 'MULYONO, SE', 'IV/c', 13, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(53, '196803021989032008', 'YUMARI, SH.', 'IV/c', 13, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(54, '196711261989111001', 'AMRIZAL, S.E.', 'IV/a', 13, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(55, '197508171998031003', 'TAN GUSLI S.Fil.I., MAP., MA.', 'IV/a', 13, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(56, '196605191987031002', 'H. YOSHERMAN, SE.Akt', 'IV/a', 13, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(57, '198207012006042003', 'WISE HARUMI, SP., SHI.', 'III/d', 13, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(58, '197503312008012005', 'LOLY VOLIA, ST', 'III/d', 13, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(59, '196811292005011002', 'KHAIRULMEN, S.E', 'III/d', 13, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(60, '198004242008012020', 'WIDYA ASRIKA, S.Kom.', 'III/d', 13, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(61, '198205202009011014', 'MALVI ASRA VAN SURI, SE', 'III/d', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(62, '199702202020122014', 'ELSA FEBRIANI S.Si', 'III/a', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(63, '198503072006042010', 'WIRA MARDHIYAH, S.T., MM', 'III/d', 24, NULL, 'PNS', '5', '123', 'P', 'wira@gmail.com', 'padang', 'profile-photos/user.png', '2023-07-23 12:13:24', '2023-07-23 05:13:24'),
(64, '198110082007012016', 'VETHRIA RAHMI, S.Sos.I', 'III/c', 15, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(65, '198203092009011007', 'H RIZKI RONALDI, S.Kom', 'III/c', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(66, '198003082011012005', 'LENI UMAR, S.E', 'III/c', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(67, '197807302007011009', 'ERI GUSNEDI, S.Pd.', 'III/c', 15, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(68, '196601122014111004', 'JAMAAN, S.Ag', 'III/b', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(69, '198512082005012001', 'FITRA DEWI, A.Md.', 'III/a', 24, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(70, '199301272020122012', 'MONA FILARDI S.Pd', 'III/a', 17, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(71, '199108222020122013', 'FAUZIAH S.AP', 'III/a', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(72, '198808282020121011', 'M RIZKI AFDHAL S.Sos', 'III/a', 17, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(73, '199001292020122024', 'VIVI ARDI S.I.P', 'III/a', 17, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(74, '197107072009011008', 'ZULHENDRI', 'IIc', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(75, '198006122014111002', 'TAUFIK HISMAR', 'II/b', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(76, '197007301992031001', 'H. HENDRI PANI DIAS, S.Ag, M.A', 'IV/a', 3, NULL, 'PNS', '5', '0', 'L', 'x', 'x', 'profile-photos/jJSyMZrMMyr5tUnLCkM2N8TJ8YfTNeoBH6NliFa4.png', '2023-07-12 05:01:34', '2023-07-11 22:01:34'),
(77, '197404042002121006', 'MOFRI ANTONI, SE, MM', 'III/d', 18, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(78, '198506152009012016', 'ADE SILVIA, M.Kom', 'III/c', 12, '', 'PNS', '6', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(79, '197704011997031002', 'H. AFRIZAL S.Pd.I, M.Si', 'IV/a', 23, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(80, '198006192005011006', 'ABDULLAH ALAMUDI, S.HI, M.Pd', 'IV/a', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(81, '198510222008012002', 'RINI HARTATI S.E, Akt, M.M', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(82, '197101021996031001', 'Dr. H. JHON OF RIEZAL ONE, S.Ag, M.A', 'IV/b', 18, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(83, '197008111990032001', 'MARIA ELIS SANDRAWITA, S.Ag., M.M', 'IV/a', 24, '', 'PNS', '5', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(84, '198208102009011011', 'H. BENNY MALWA, S.Sos.I., M.Sos..', 'III/d', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(85, '198211082011011009', 'NOVELIA MUSDA, SS', 'III/c', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(86, '197005011993031002', 'ADRI KAMAL, ST.Arc', 'III/d', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(87, '197709102007101001', 'FIRDAUS, S.HI', 'III/d', 24, NULL, 'PNS', '5', '00', 'L', '197709102007101001@kemenag.go.id', 'xxx', 'profile-photos/user.png', '2023-07-17 01:09:18', '2023-07-16 18:09:18'),
(88, '198401202009011006', 'AHMAD NEGARA DALIMUNTHE, S.IP', 'III/c', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(89, '198505212005011001', 'PUTRA INTAN RIKI FIRDAUS', 'II/d', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(90, '197007061999031005', 'H. AMRIZAL, M.Ag', 'IV/a', 18, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(91, '197611252006041012', 'NOVE HENDRI, SE, MA, Akt, M.Pd.E', 'IV/a', 24, NULL, 'PNS', '5', 'c', 'L', 'c', 'c', 'profile-photos/2QULmMslkpskRZwIkCSN7dguXQVrIU7M46BA7JXW.png', '2023-07-12 03:23:30', '2023-07-11 20:23:30'),
(92, '197910262008012011', 'HENDRA WENI S.KOM, MM', 'III/d', 24, '', 'PNS', '5', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(93, '197508082009121001', 'JUMANUDIN, S.Kom', 'III/c', 12, NULL, 'PNS', '5', '-', 'L', 'rakha.dj@gmail.com', 'bnu', 'profile-photos/aOg8MgfgtMqphhDOigs2Z9GF5q45gwrF3zOYVupC.jpg', '2024-01-04 03:39:14', '2024-01-03 20:39:14'),
(94, '197805282002122003', 'METRA SURYATI, S.Ag.', 'III/d', 24, '', 'PNS', '5', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(95, '197912252009011011', 'TASLIM PERDANA, S.Pd., M.Kom', 'III/d', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(96, '198105312005011002', 'WELEN ASRO HENDRAWAN', 'II/d', 24, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(97, '198106122005012007', 'Dr. MUSLIMAH, S.Th.I., M.Ag.', 'IV/a', 16, '', 'PNS', '4', '00', 'P', 'hj', 'xxx', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(98, '196512311994031009', 'Drs. NAHARUDIN', 'IV/a', 2, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(99, '196911021994031002', 'Drs. YOHANIS', 'III/d', 24, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(100, '198301282009011009', 'EFRIAN, M.Kom', 'III/d', 12, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(101, '198109232011011003', 'H. INDRA GUNAWAN S.H.I', 'III/c', 24, NULL, 'PNS', '4', '082389400192', 'L', '198109232011011003@kemenag.go.id', 'PADANG', 'profile-photos/user.png', '2023-07-23 11:57:25', '2023-07-23 04:57:25'),
(102, '196803281990012001', 'Hj. AVERMELIA ARBAIN, S.AP', 'III/c', 24, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(103, '198112012003122002', 'RISMAWATI S.AP', 'III/a', 24, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(104, '197107041996031003', 'H. SAHRIZAL, S.Ag, M.M', 'IV/a', 23, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(105, '197211081993031004', 'H. NOVI ENDRA HELMI, SE', 'III/d', 2, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(106, '196605092007012030', 'Hj. SUKMAWATI, S.Ag', 'III/d', 2, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(107, '198105092009011007', 'AFRIZAL, S.HI', 'III/c', 24, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(108, '198712142011012010', 'FAUZIYAH, S.Th.I', 'III/c', 24, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(109, '197710092007101002', 'ALMUDASSIR, A.Ma.', 'IIc', 24, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(110, '198103042005012004', 'Hj FATMAWATI S.Sos., M.Si', 'III/c', 24, '', 'PNS', '4', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(111, '198207152009011010', 'SOLMUS S.Th.I', 'III/c', 24, '', 'PNS', '4', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(112, '196612161993031002', 'Drs. H. RAMZA HUSMEN, M. Pd', 'IV/b', 5, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(113, '198204282008011007', 'H. YUDI HIDAYAT, S.T, M.M', 'III/c', 12, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(114, '197907132009101005', 'JULFRIADI, A.Md', 'III/a', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(115, '197404212003121005', 'H. USWATMAN S.Ag, M.M', 'IV/a', 17, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(116, '197807292009011005', 'H. INDRANEDI SH', 'III/c', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(117, '197106271998032001', 'ERNAWATI', 'III/b', 24, '', 'PNS', '6', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(118, '198012222005011001', 'H. ULIL AMRI, S.H.I, M.A', 'IV/a', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(119, '197306172003121003', 'DELFISMAN, S.Kom', 'III/d', 5, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(120, '198111182006041018', 'H. HAMI MULYAWAN, S.HI, MM', 'IV/a', 30, '', 'PNS', '5', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(121, '197003042003121002', 'ZULFARISWAN S.Sos', 'III/c', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(122, '197602102007101001', 'H. HIDAYAT DS, S.Ag, M.H', 'III/d', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(123, '197101092010011003', 'BESRIZAL, S.E', 'III/d', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(124, '198303092014112003', 'VONI KURNIAWATI, S.S.', 'III/a', 5, '', 'PNS', '6', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(125, '197611122009011003', 'HENDRI NOFRIZAL', 'II/d', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(126, '196702151994031001', 'Drs. H. ZILWADI', 'III/d', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(127, '196503031993031001', 'H. DAFRIL S.Ag', 'III/d', 24, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(128, '197010142006042001', 'Hj. RINA ELFIZA, SH', 'III/d', 24, '', 'PNS', '6', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(129, '197603051997031003', 'H. EDISON, M.Ag', 'IV/b', 7, NULL, 'PNS', '7', '-', 'L', 'x', 'x', 'profile-photos/user.png', '2023-07-18 03:41:50', '2023-07-17 20:41:50'),
(130, '197605012007102003', 'MAICENDRAWATI, S.Ag., M.Hum', 'IV/a', 24, '', 'PNS', '7', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(131, '198001052005011004', 'JANUAR SH', 'III/c', 22, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(132, '198512102009102001', 'Hj. ELVIRA HAYU S.Kom, M.M', 'III/c', 12, '', 'PNS', '7', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(133, '197407271994031002', 'YUSDAH RIFAN, SH', 'III/a', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(134, '197503032005011007', 'H. SYAFALMART, S,Ag', 'III/d', 21, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(135, '197604012011011005', 'AHMAD MUZAMI S.Ag, M.H', 'III/d', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(136, '198006192009011002', 'JONIFER ARA, S.HI', 'III/d', 24, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(137, '197112251998031004', 'YOSEF CHAIRUL, S.AG', 'III/d', 24, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(138, '198205182005012004', 'ELFIDA TRISNA S.Farm', 'III/c', 24, '', 'PNS', '7', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(139, '197007122014111005', 'JASRIAL', 'III/a', 24, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(140, '197710102003121002', 'Dr. IKRAR ABDI, S.Ag, M.A', 'IV/a', 24, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(141, '198008182008011008', 'IHSANUL FIKRI SHI', 'III/d', 24, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(142, '198703192011012018', 'PERTIWI IMMAWATI, SE', 'III/c', 24, '', 'PNS', '7', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(143, '197205071998031002', 'Dr. H. YASRIL, S.Ag, M.A', 'IV/b', 16, '', 'PNS', '7', '00', 'L', 'hji', 'JL.', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(144, '198210032006041003', 'BUDI RIVA, S.Sos.I., M.Sos', 'IV/a', 24, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(145, '198404302011012013', 'AFRIDA SUSANTY, S.E', 'III/c', 17, '', 'PNS', '7', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(146, '196902272014111002', 'ZUL AZMI', 'II/b', 24, '', 'PNS', '2', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(147, '197206262000031004', 'H. YUFRIZAL, S.Ag. M.H.I', 'IV/b', 4, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(148, '198502042011012006', 'VINA JAMILA KINTA, S.Kom., M.CIO', 'III/c', 12, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(149, '197210272006042020', 'ASMI YARNI AGUS S.AP', 'III/a', 24, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(150, '197902282003121002', 'H. THOMAS FEBRIA, S.Ag, M.A', 'IV/a', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(151, '198009232005011002', 'H. ALFAJRI, SHI, MA', 'IV/a', 24, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(152, '198410302009012010', 'EZA FAUZANA, S.Kom', 'III/d', 24, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(153, '196505112014111002', 'PARLAUNGAN, S.Ag, M.A', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(154, '197505072014111003', 'ABADI, S.Sos.I., M.A', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(155, '197607052014112002', 'YULIASNI, S.Ag. M.Sos', 'III/c', 14, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(156, '197112232014112002', 'RENI HASRIN RH, S.Ag, M.A', 'III/c', 14, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(157, '197804032014111002', 'SYAIFUDDIN ZUHRI DAULAY, S.Ag, M.A', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(158, '196805102014111004', 'BAKRI, S.I.Q,S.Th.I.M.Pd.I', 'III/c', 4, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(159, '196902252014112001', 'ELLIZA, S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(160, '197706102014111001', 'IRWANDI, M.Pd', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(161, '196909162014112001', 'SYAFRIDA, S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(162, '196910042014112001', 'NURLIANI, S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(163, '196812312014111042', 'RAFLIS S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(164, '197007052014111002', 'DASRIAL, S.Ag', 'III/c', 24, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(165, '197106102014112003', 'ANITA SOFIA, S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(166, '196509032014111001', 'LUKMAN, S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(167, '196902242014111003', 'HALIMUL HAKIM, S.Ag', 'III/c', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(168, '198206032014111001', 'HENDRA S.Pd.I., M.A', 'III/b', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(169, '198402022014111004', 'MAIRONI SHI', 'III/b', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(170, '197401212014111002', 'IDRIL ISHAK RAMBE S.Pd.I', 'III/b', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(171, '197005062014111002', 'MUHAMMAD ZULKHAIR S.Ag', 'III/a', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(172, '197208152014111001', 'HERIADI S.Pd.I', 'IIc', 4, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(173, '196609152014111003', 'DASRIL', 'IIc', 14, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(174, '197010111996031001', 'H. EFI YOSKAR, S.Ag., M.M', 'IV/a', 21, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(175, '196508151989031004', 'H. NASRUL', 'III/b', 24, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(176, '196503041986031005', 'H. SUTARNO', 'III/b', 24, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(177, '197011251998031002', 'H. YUSRAN LUBIS S.Ag, M.Pd', 'IV/a', 20, '', 'PNS', '7', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(178, '197608062011012002', 'NETTI, S.Ag. M.H', 'III/d', 24, '', 'PNS', '2', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(179, '197406151998031003', 'H. M. RIFKI, M.Ag', 'IV/a', 16, '', 'PNS', '6', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(180, '198606222011011008', 'ARIF FAJRI, SE., MA.', 'III/c', 24, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(181, '198301042014111002', 'RIFKI RUSYDI, S.H.', 'III/a', 24, '', 'PNS', '3', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(182, '197602072000031001', 'YESRI ELFIS HASUGIAN, S. Th', 'IV/a', 11, '', 'PNS', '11', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(183, '196507082000032001', 'HENNY SIMARMATA, S.PAK', 'III/d', 24, '', 'PNS', '11', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(184, '196807132000032002', 'ROSLINA SITUMORANG', 'III/b', 24, '', 'PNS', '11', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(185, '196709032003022001', 'LIRMANI RAJAGUKGUK', 'III/a', 24, '', 'PNS', '11', '', 'P', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(186, '197103112003121003', 'HERU ASMORO, S.Ag', 'IV/c', 2, NULL, 'PNS', '10', 'xxxx', 'L', '197103112003121003@kemenag.go.id', 'xxx', 'profile-photos/user.png', '2023-07-17 06:02:21', '2023-07-16 23:02:21'),
(187, '197207012001121004', 'HENRIKUS JOMI, S.Ag, MM', 'IV/a', 10, '', 'PNS', '10', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(188, '197002281999031001', 'FAJAR CAHYONO SS', 'III/d', 24, '', 'PNS', '10', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(189, '197802242003121001', 'JUMADI, S.Ag., M.Psi', 'IV/a', 28, '', 'PNS', '9', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(191, '197006042003121003', 'SUMARDI', 'III/a', 24, '', 'PNS', '8', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(192, '197106041999031003', 'MURYADI EKO PRIYANTO. SE.,M.M', 'IV/b', 29, '', 'PNS', '8', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06'),
(193, '198907022022031001', 'DAMANG SUMEDI S.Pd.B', 'III/a', 14, '', 'PNS', '8', '', 'L', '', '', 'profile-photos/user.png', '2023-04-08 05:59:06', '2023-04-08 05:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id_role` int UNSIGNED NOT NULL,
  `id_modul` int UNSIGNED NOT NULL,
  `l` tinyint(1) NOT NULL DEFAULT '0',
  `d` tinyint(1) NOT NULL DEFAULT '0',
  `t` tinyint(1) NOT NULL DEFAULT '0',
  `u` tinyint(1) NOT NULL DEFAULT '0',
  `h` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id_role`, `id_modul`, `l`, `d`, `t`, `u`, `h`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 2, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 3, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 4, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 5, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 9, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 10, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(2, 11, 0, 0, 0, 0, 0, '2024-02-06 17:33:04', '2024-02-06 17:33:04'),
(1, 1, 1, 1, 1, 1, 1, '2024-04-24 01:10:06', '2024-04-24 01:10:06'),
(1, 2, 1, 1, 1, 1, 1, '2024-04-24 01:10:06', '2024-04-24 01:10:06'),
(1, 3, 1, 1, 1, 1, 1, '2024-04-24 01:10:06', '2024-04-24 01:10:06'),
(1, 4, 1, 1, 1, 1, 1, '2024-04-24 01:10:06', '2024-04-24 01:10:06'),
(1, 5, 1, 1, 1, 1, 1, '2024-04-24 01:10:07', '2024-04-24 01:10:07'),
(1, 6, 1, 1, 1, 1, 1, '2024-04-24 01:10:08', '2024-04-24 01:10:08'),
(1, 7, 1, 1, 1, 1, 1, '2024-04-24 01:10:08', '2024-04-24 01:10:08'),
(1, 8, 1, 1, 1, 1, 1, '2024-04-24 01:10:08', '2024-04-24 01:10:08'),
(1, 9, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 10, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 11, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 12, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 13, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 14, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 30, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 31, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 32, 1, 1, 1, 1, 1, '2024-04-24 01:10:09', '2024-04-24 01:10:09'),
(1, 36, 1, 1, 1, 1, 1, '2024-04-24 01:10:10', '2024-04-24 01:10:10'),
(1, 37, 1, 1, 1, 1, 1, '2024-04-24 01:10:10', '2024-04-24 01:10:10'),
(1, 38, 1, 1, 1, 1, 1, '2024-04-24 01:10:10', '2024-04-24 01:10:10'),
(1, 39, 1, 1, 1, 1, 1, '2024-04-24 01:10:10', '2024-04-24 01:10:10'),
(1, 40, 1, 1, 1, 1, 1, '2024-04-24 01:10:10', '2024-04-24 01:10:10'),
(1, 41, 1, 1, 1, 1, 1, '2024-04-24 01:10:11', '2024-04-24 01:10:11'),
(1, 42, 1, 1, 1, 1, 1, '2024-04-24 01:10:11', '2024-04-24 01:10:11'),
(1, 43, 1, 1, 1, 1, 1, '2024-04-24 01:10:11', '2024-04-24 01:10:11'),
(1, 44, 1, 1, 1, 1, 1, '2024-04-24 01:10:11', '2024-04-24 01:10:11'),
(1, 45, 1, 1, 1, 1, 1, '2024-04-24 01:10:11', '2024-04-24 01:10:11'),
(1, 46, 1, 1, 1, 1, 1, '2024-04-24 01:10:11', '2024-04-24 01:10:11'),
(1, 47, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 48, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 49, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 50, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 51, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 52, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 53, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 54, 1, 1, 1, 1, 1, '2024-04-24 01:10:12', '2024-04-24 01:10:12'),
(1, 55, 1, 1, 1, 1, 1, '2024-04-24 01:10:13', '2024-04-24 01:10:13'),
(1, 56, 1, 1, 1, 1, 1, '2024-04-24 01:10:13', '2024-04-24 01:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int UNSIGNED NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-04-05 07:27:18', '2024-04-24 01:10:06'),
(2, 'Manager', '2024-02-04 09:29:34', '2024-02-04 02:29:34'),
(3, 'Verifikator', '2023-09-13 01:36:46', '2023-09-12 18:36:46'),
(4, 'User', '2024-01-04 07:55:24', '2024-01-04 00:55:24'),
(5, 'Operator', '2023-04-09 13:39:35', '2023-04-09 13:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3toQwper7uho0YOsgQAki5AJJt4giQl345Eih6zz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFJISE1Gckh6UFFhbDRodVJJWlFPU212dXVUcEFESHNVSTVQeURIaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705780653),
('8TTxfD7a2xAPutumt0VhbTmRgp78QpqJwhymhamB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiODZzWjhKR0oxcjc2a0xONWI4ZnZaU0NoRmttb2RtSjJpN3piZUllTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcwNTc3NzM3MTt9czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVEZKNDh3b3ZORHJIbjBSUFBuYWlzZUpmdzh0SmphbEhFS3RWRW5JNzZYcHBHdVQ1QnNOUDYiO30=', 1705780177),
('ItG0n73FZnadY2Fm7FZJb0IbEcuNSsHqmVEwxDyB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicnZ6WnJsN1B6TmdXNkpvRU93R3MzVEY5U2s2WFB2dWhhRXI4RFdNMSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MDU3ODAzNTE7fX0=', 1705780642);

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id` int NOT NULL,
  `nama_pimpinan` text NOT NULL,
  `lokasi_kantor` text NOT NULL,
  `ttd` text,
  `t_1` text NOT NULL,
  `t_2` text NOT NULL,
  `t_3` text NOT NULL,
  `t_4` text NOT NULL,
  `t_5` text NOT NULL,
  `verifikator` varchar(20) NOT NULL,
  `tahun_priode` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id`, `nama_pimpinan`, `lokasi_kantor`, `ttd`, `t_1`, `t_2`, `t_3`, `t_4`, `t_5`, `verifikator`, `tahun_priode`, `updated_at`) VALUES
(1, 'H. Firmantasi, S.Ag', 'Pangkalpinang', '', 'KEMENTERIAN AGAMA REPUBLIK INDONESIA', 'KANTOR WILAYAH KEMENTERIAN AGAMA', 'PROVINSI KEPULAUAN BANGKA BELITUNG', 'Jl. Kuni No. 79 B (0751) 21686 – 28220 Fax. (0751) 22583', 'Website http://sumbar.kemenag.go.id | email : kanwilsumbar@kemenag.go.id', '196608021994031002', 2022, '2024-05-28 01:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akma`
--

CREATE TABLE `tb_akma` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `akman_a` int NOT NULL,
  `akman_b` int NOT NULL,
  `akman_c` int NOT NULL,
  `akman_belum` int NOT NULL,
  `akmas_a` int NOT NULL,
  `akmas_b` int NOT NULL,
  `akmas_c` int NOT NULL,
  `akmas_belum` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akmi`
--

CREATE TABLE `tb_akmi` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `akmin_a` int NOT NULL,
  `akmin_b` int NOT NULL,
  `akmin_c` int NOT NULL,
  `akmin_belum` int NOT NULL,
  `akmis_a` int NOT NULL,
  `akmis_b` int NOT NULL,
  `akmis_c` int NOT NULL,
  `akmis_belum` int NOT NULL,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akmts`
--

CREATE TABLE `tb_akmts` (
  `id_akmts` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `akmtsn_a` int NOT NULL,
  `akmtsn_b` int NOT NULL,
  `akmtsn_c` int NOT NULL,
  `akmtsn_belum` int NOT NULL,
  `akmtss_a` int NOT NULL,
  `akmtss_b` int NOT NULL,
  `akmtss_c` int NOT NULL,
  `akmtss_belum` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akra`
--

CREATE TABLE `tb_akra` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `a` int NOT NULL,
  `b` int NOT NULL,
  `c` int NOT NULL,
  `belum` int NOT NULL,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `id` int NOT NULL,
  `id_unitprogram` int NOT NULL,
  `anggaran` bigint NOT NULL DEFAULT '0',
  `realisasi` bigint NOT NULL DEFAULT '0',
  `pagu_awal` bigint NOT NULL DEFAULT '0',
  `pagu_akhir` bigint NOT NULL DEFAULT '0',
  `persentase` decimal(10,0) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id`, `id_unitprogram`, `anggaran`, `realisasi`, `pagu_awal`, `pagu_akhir`, `persentase`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 29607086000, 29378000000, 100000, 120000, '0', '2024-04-24 00:04:56', '2024-05-07 01:18:09', '197508082009121001', 2023),
(2, 2, 169666219000, 167861000000, 0, 0, '0', '2024-04-24 00:04:56', '2024-04-24 00:38:19', '197508082009121001', 2023),
(3, 3, 0, 0, 0, 0, '0', '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(4, 4, 0, 0, 0, 0, '0', '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(5, 5, 0, 0, 0, 0, '0', '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(6, 6, 0, 0, 0, 0, '0', '2024-04-24 00:04:57', '2024-04-24 00:04:57', '197508082009121001', 2023),
(7, 7, 0, 0, 0, 0, '0', '2024-04-24 00:04:57', '2024-04-24 00:04:57', '197508082009121001', 2023),
(8, 8, 0, 0, 0, 0, '0', '2024-04-24 00:04:58', '2024-04-24 00:04:58', '197508082009121001', 2023),
(9, 1, 29607086000, 29378223627, 28924595000, 29607086000, '0', '2024-05-07 02:30:27', '2024-05-07 02:45:25', '197508082009121001', 2022),
(10, 2, 0, 167861492362, 155656343000, 169666219000, '0', '2024-05-07 02:30:27', '2024-05-07 02:46:46', '197508082009121001', 2022),
(11, 3, 0, 43025482468, 40654780000, 43286489000, '0', '2024-05-07 02:30:28', '2024-05-07 02:48:43', '197508082009121001', 2022),
(12, 4, 0, 2123752560, 2228970000, 2152789000, '0', '2024-05-07 02:30:28', '2024-05-07 02:48:59', '197508082009121001', 2022),
(13, 5, 0, 2444562867, 2493674000, 2486116000, '0', '2024-05-07 02:30:28', '2024-05-07 02:49:16', '197508082009121001', 2022),
(14, 6, 0, 1475529715, 1548708000, 1485143000, '0', '2024-05-07 02:30:28', '2024-05-07 02:49:32', '197508082009121001', 2022),
(15, 7, 0, 5751703199, 6129525000, 5797272000, '0', '2024-05-07 02:30:28', '2024-05-07 02:49:50', '197508082009121001', 2022),
(16, 8, 0, 22773316007, 14364393000, 23071999000, '0', '2024-05-07 02:30:28', '2024-05-07 02:50:09', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_general_ci,
  `username` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ts` int NOT NULL DEFAULT '0',
  `tampil` tinyint NOT NULL DEFAULT '0',
  `setuju` tinyint NOT NULL DEFAULT '0',
  `utama` tinyint NOT NULL DEFAULT '0',
  `buku` tinyint NOT NULL,
  `gambar` varchar(240) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caption` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `counter` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bimbingan`
--

CREATE TABLE `tb_bimbingan` (
  `id_bimbingan` int NOT NULL,
  `jns_keluarga` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jml_bimbingan` int NOT NULL,
  `ket` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bmn`
--

CREATE TABLE `tb_bmn` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `lok_baik` int NOT NULL DEFAULT '0',
  `lok_rusak_ringan` int NOT NULL DEFAULT '0',
  `lok_rusak_berat` int NOT NULL DEFAULT '0',
  `ged_baik` int NOT NULL DEFAULT '0',
  `ged_rusak_ringan` int NOT NULL DEFAULT '0',
  `ged_rusak_berat` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bmn`
--

INSERT INTO `tb_bmn` (`id`, `id_wilayah`, `lok_baik`, `lok_rusak_ringan`, `lok_rusak_berat`, `ged_baik`, `ged_rusak_ringan`, `ged_rusak_berat`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 77448, 0, 0, 72, 0, 0, '2024-04-24 00:04:54', '2024-04-24 00:41:58', '197508082009121001', 2023),
(2, 2, 0, 1, 0, 0, 0, 0, '2024-04-24 00:04:55', '2024-04-28 19:22:55', '197508082009121001', 2023),
(3, 3, 0, 0, 455, 0, 0, 0, '2024-04-24 00:04:55', '2024-04-28 19:23:03', '197508082009121001', 2023),
(4, 4, 0, 0, 0, 0, 0, 0, '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(5, 5, 0, 0, 0, 0, 0, 0, '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(6, 6, 0, 0, 0, 0, 0, 0, '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(7, 7, 0, 0, 0, 0, 0, 0, '2024-04-24 00:04:56', '2024-04-24 00:04:56', '197508082009121001', 2023),
(8, 1, 77448, 0, 0, 72, 0, 0, '2024-05-07 02:30:26', '2024-05-07 02:59:03', '197508082009121001', 2022),
(9, 2, 37365, 0, 0, 90, 1, 1, '2024-05-07 02:30:26', '2024-05-07 02:59:15', '197508082009121001', 2022),
(10, 3, 19756, 0, 0, 51, 0, 0, '2024-05-07 02:30:27', '2024-05-07 02:59:24', '197508082009121001', 2022),
(11, 4, 60257, 0, 0, 81, 0, 0, '2024-05-07 02:30:27', '2024-05-07 02:59:29', '197508082009121001', 2022),
(12, 5, 21891, 0, 0, 36, 1, 1, '2024-05-07 02:30:27', '2024-05-07 03:00:06', '197508082009121001', 2022),
(13, 6, 61202, 0, 0, 45, 0, 0, '2024-05-07 02:30:27', '2024-05-07 02:59:51', '197508082009121001', 2022),
(14, 7, 31273, 0, 0, 43, 0, 0, '2024-05-07 02:30:27', '2024-05-07 02:59:54', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftarbaru`
--

CREATE TABLE `tb_daftarbaru` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_18` int NOT NULL DEFAULT '0',
  `rentang_18_50` int NOT NULL DEFAULT '0',
  `rentang_51_65` int NOT NULL DEFAULT '0',
  `rentang_66_75` int NOT NULL DEFAULT '0',
  `lebih_75` int NOT NULL DEFAULT '0',
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `pns` int NOT NULL DEFAULT '0',
  `tni_polri` int NOT NULL DEFAULT '0',
  `niaga` int NOT NULL DEFAULT '0',
  `tani` int NOT NULL DEFAULT '0',
  `swasta` int NOT NULL DEFAULT '0',
  `irt` int NOT NULL DEFAULT '0',
  `pelajar` int NOT NULL DEFAULT '0',
  `bumn_bumd` int NOT NULL DEFAULT '0',
  `pensiun` int NOT NULL DEFAULT '0',
  `lain_lain` int NOT NULL DEFAULT '0',
  `sd` int NOT NULL DEFAULT '0',
  `sltp` int NOT NULL DEFAULT '0',
  `slta` int NOT NULL DEFAULT '0',
  `d1_d3` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `lainnya` int NOT NULL DEFAULT '0',
  `belum` int NOT NULL DEFAULT '0',
  `sudah` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL DEFAULT '0',
  `batal_pria` int NOT NULL DEFAULT '0',
  `batal_wanita` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftarbaru`
--

INSERT INTO `tb_daftarbaru` (`id`, `id_wilayah`, `kurang_18`, `rentang_18_50`, `rentang_51_65`, `rentang_66_75`, `lebih_75`, `pria`, `wanita`, `pns`, `tni_polri`, `niaga`, `tani`, `swasta`, `irt`, `pelajar`, `bumn_bumd`, `pensiun`, `lain_lain`, `sd`, `sltp`, `slta`, `d1_d3`, `s1`, `s2`, `s3`, `lainnya`, `belum`, `sudah`, `tahun`, `batal_pria`, `batal_wanita`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 1, 0, '2024-04-17 21:06:14', '2024-04-17 22:38:25', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 1, '2024-04-17 21:06:14', '2024-04-17 22:35:59', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 22:38:29', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 22:36:07', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 22:36:12', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 22:36:18', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:15', '2024-04-17 22:38:19', '197508082009121001'),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:39', '2024-05-13 06:05:39', '197508082009121001'),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:39', '2024-05-13 06:05:39', '197508082009121001'),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:39', '2024-05-13 06:05:39', '197508082009121001'),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:39', '2024-05-13 06:05:39', '197508082009121001'),
(12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:39', '2024-05-13 06:05:39', '197508082009121001'),
(13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:39', '2024-05-13 06:05:39', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-13 06:05:40', '2024-05-13 06:05:40', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftartunggu`
--

CREATE TABLE `tb_daftartunggu` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_18` int NOT NULL DEFAULT '0',
  `rentang_18_50` int NOT NULL DEFAULT '0',
  `rentang_51_65` int NOT NULL DEFAULT '0',
  `rentang_66_75` int NOT NULL DEFAULT '0',
  `lebih_75` int NOT NULL DEFAULT '0',
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `pns` int NOT NULL DEFAULT '0',
  `tni_polri` int NOT NULL DEFAULT '0',
  `niaga` int NOT NULL DEFAULT '0',
  `tani` int NOT NULL DEFAULT '0',
  `swasta` int NOT NULL DEFAULT '0',
  `irt` int NOT NULL DEFAULT '0',
  `pelajar` int NOT NULL DEFAULT '0',
  `bumn_bumd` int NOT NULL DEFAULT '0',
  `pensiun` int NOT NULL DEFAULT '0',
  `lain_lain` int NOT NULL DEFAULT '0',
  `sd` int NOT NULL DEFAULT '0',
  `sltp` int NOT NULL DEFAULT '0',
  `slta` int NOT NULL DEFAULT '0',
  `d1_d3` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `lainnya` int NOT NULL DEFAULT '0',
  `belum` int NOT NULL DEFAULT '0',
  `sudah` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftartunggu`
--

INSERT INTO `tb_daftartunggu` (`id`, `id_wilayah`, `kurang_18`, `rentang_18_50`, `rentang_51_65`, `rentang_66_75`, `lebih_75`, `pria`, `wanita`, `pns`, `tni_polri`, `niaga`, `tani`, `swasta`, `irt`, `pelajar`, `bumn_bumd`, `pensiun`, `lain_lain`, `sd`, `sltp`, `slta`, `d1_d3`, `s1`, `s2`, `s3`, `lainnya`, `belum`, `sudah`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 2023, '2024-04-16 19:06:36', '2024-04-18 02:33:08', '197508082009121001'),
(2, 2, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-16 19:06:36', '2024-04-18 02:33:12', '197508082009121001'),
(3, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-16 19:06:36', '2024-04-18 02:32:54', '197508082009121001'),
(4, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 2023, '2024-04-16 19:06:36', '2024-04-18 02:32:29', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 2023, '2024-04-16 19:06:37', '2024-04-18 02:32:25', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2023, '2024-04-16 19:06:37', '2024-04-18 02:32:35', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-16 19:06:37', '2024-04-18 02:32:41', '197508082009121001'),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001'),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001'),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001'),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001'),
(12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001'),
(13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-13 06:05:15', '2024-05-13 06:05:15', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dialog`
--

CREATE TABLE `tb_dialog` (
  `id_dialog` int NOT NULL,
  `agama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kegiatan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `jml_keg` int NOT NULL,
  `peserta` int NOT NULL,
  `ket` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fkub`
--

CREATE TABLE `tb_fkub` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `fkub` int NOT NULL DEFAULT '0',
  `sekber` int NOT NULL DEFAULT '0',
  `sadar_kerukunan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_fkub`
--

INSERT INTO `tb_fkub` (`id`, `id_satker`, `fkub`, `sekber`, `sadar_kerukunan`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 1, 0, 0, '2024-04-23 19:14:14', '2024-04-23 19:16:36', '197508082009121001', 2023),
(2, 2, 0, 1, 0, '2024-04-23 19:14:14', '2024-04-23 19:16:40', '197508082009121001', 2023),
(3, 3, 0, 0, 1, '2024-04-23 19:14:14', '2024-04-23 19:16:44', '197508082009121001', 2023),
(4, 4, 0, 0, 0, '2024-04-23 19:14:14', '2024-04-23 19:14:14', '197508082009121001', 2023),
(5, 5, 0, 0, 0, '2024-04-23 19:14:14', '2024-04-23 19:14:14', '197508082009121001', 2023),
(6, 6, 0, 0, 0, '2024-04-23 19:14:15', '2024-04-23 19:14:15', '197508082009121001', 2023),
(7, 7, 0, 0, 0, '2024-04-23 19:14:15', '2024-04-23 19:14:15', '197508082009121001', 2023),
(8, 8, 0, 0, 0, '2024-04-23 19:14:15', '2024-04-23 19:14:15', '197508082009121001', 2023),
(9, 1, 1, 1, 0, '2024-05-07 02:36:00', '2024-05-07 07:15:38', '197508082009121001', 2022),
(10, 2, 1, 1, 0, '2024-05-07 02:36:00', '2024-05-07 07:16:03', '197508082009121001', 2022),
(11, 3, 1, 1, 0, '2024-05-07 02:36:00', '2024-05-07 07:16:07', '197508082009121001', 2022),
(12, 4, 1, 1, 0, '2024-05-07 02:36:01', '2024-05-07 07:16:10', '197508082009121001', 2022),
(13, 5, 1, 1, 0, '2024-05-07 02:36:01', '2024-05-07 07:16:17', '197508082009121001', 2022),
(14, 6, 1, 1, 0, '2024-05-07 02:36:01', '2024-05-07 07:16:20', '197508082009121001', 2022),
(15, 7, 1, 1, 1, '2024-05-07 02:36:02', '2024-05-07 07:16:37', '197508082009121001', 2022),
(16, 8, 1, 1, 0, '2024-05-07 02:36:03', '2024-05-07 07:16:25', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gkatolik`
--

CREATE TABLE `tb_gkatolik` (
  `id_gkatolik` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `seminari` int NOT NULL,
  `smak` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gmadrasah`
--

CREATE TABLE `tb_gmadrasah` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ra` int NOT NULL,
  `ra_belums1` int NOT NULL,
  `ra_s1` int NOT NULL,
  `ra_s2` int NOT NULL,
  `ra_s3` int NOT NULL,
  `ra_pria` int NOT NULL,
  `ra_wanita` int NOT NULL,
  `ra_pns` int NOT NULL,
  `ra_nonpns` int NOT NULL,
  `min` int NOT NULL,
  `mis` int NOT NULL,
  `mi_kurangs1` int NOT NULL,
  `mi_s1` int NOT NULL,
  `mi_s2` int NOT NULL,
  `mi_s3` int NOT NULL,
  `mi_pria` int NOT NULL,
  `mi_wanita` int NOT NULL,
  `mi_pns` int NOT NULL,
  `mi_nonpns` int NOT NULL,
  `mtsn` int NOT NULL,
  `mtss` int NOT NULL,
  `mts_kurangs1` int NOT NULL,
  `mts_s1` int NOT NULL,
  `mts_s2` int NOT NULL,
  `mts_s3` int NOT NULL,
  `mts_pria` int NOT NULL,
  `mts_wanita` int NOT NULL,
  `mts_pns` int NOT NULL,
  `mts_nonpns` int NOT NULL,
  `man` int NOT NULL,
  `mas` int NOT NULL,
  `ma_kurangs1` int NOT NULL,
  `ma_s1` int NOT NULL,
  `ma_s2` int NOT NULL,
  `ma_s3` int NOT NULL,
  `ma_pria` int NOT NULL,
  `ma_wanita` int NOT NULL,
  `ma_pns` int NOT NULL,
  `ma_nonpns` int NOT NULL,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gpai`
--

CREATE TABLE `tb_gpai` (
  `id_gpai` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `pns_lk` int NOT NULL,
  `pns_pr` int NOT NULL,
  `non_lk` int NOT NULL,
  `non_pr` int NOT NULL,
  `pns_kecils1` int NOT NULL,
  `pns_s1` int NOT NULL,
  `pns_s2` int NOT NULL,
  `pns_s3` int NOT NULL,
  `non_kecils1` int NOT NULL,
  `non_s1` int NOT NULL,
  `non_s2` int NOT NULL,
  `non_s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gpend_buddha`
--

CREATE TABLE `tb_gpend_buddha` (
  `id_gpend_buddha` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `lk` int NOT NULL,
  `pr` int NOT NULL,
  `pns` int NOT NULL,
  `nonpns` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gpend_hindu`
--

CREATE TABLE `tb_gpend_hindu` (
  `id_gpend_hindu` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `lk` int NOT NULL,
  `pr` int NOT NULL,
  `pns` int NOT NULL,
  `nonpns` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gpend_katolik`
--

CREATE TABLE `tb_gpend_katolik` (
  `id_gpend_katolik` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `lk` int NOT NULL,
  `pr` int NOT NULL,
  `pns` int NOT NULL,
  `nonpns` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gpend_khonghucu`
--

CREATE TABLE `tb_gpend_khonghucu` (
  `id_gpend_khonghucu` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `lk` int NOT NULL,
  `pr` int NOT NULL,
  `pns` int NOT NULL,
  `nonpns` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gpend_kristen`
--

CREATE TABLE `tb_gpend_kristen` (
  `id_gpend_kristen` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `lk` int NOT NULL,
  `pr` int NOT NULL,
  `pns` int NOT NULL,
  `nonpns` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gsertifikasi`
--

CREATE TABLE `tb_gsertifikasi` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ra_ss` int NOT NULL,
  `ra_bs` int NOT NULL,
  `mi_ss` int NOT NULL,
  `mi_bs` int NOT NULL,
  `mts_ss` int NOT NULL,
  `mts_bs` int NOT NULL,
  `ma_ss` int NOT NULL,
  `ma_bs` int NOT NULL,
  `ts_ss` int NOT NULL,
  `ts_bs` int NOT NULL,
  `smak_ss` int NOT NULL,
  `smak_bs` int NOT NULL,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_haji`
--

CREATE TABLE `tb_haji` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_18` int NOT NULL DEFAULT '0',
  `rentang_18_50` int NOT NULL DEFAULT '0',
  `rentang_51_65` int NOT NULL DEFAULT '0',
  `rentang_66_75` int NOT NULL DEFAULT '0',
  `lebih_75` int NOT NULL DEFAULT '0',
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `pns` int NOT NULL DEFAULT '0',
  `tni_polri` int NOT NULL DEFAULT '0',
  `niaga` int NOT NULL DEFAULT '0',
  `tani` int NOT NULL DEFAULT '0',
  `swasta` int NOT NULL DEFAULT '0',
  `irt` int NOT NULL DEFAULT '0',
  `pelajar` int NOT NULL DEFAULT '0',
  `bumn_bumd` int NOT NULL DEFAULT '0',
  `pensiun` int NOT NULL DEFAULT '0',
  `lain_lain` int NOT NULL DEFAULT '0',
  `sd` int NOT NULL DEFAULT '0',
  `sltp` int NOT NULL DEFAULT '0',
  `slta` int NOT NULL DEFAULT '0',
  `d1_d3` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `lainnya` int NOT NULL DEFAULT '0',
  `belum` int NOT NULL DEFAULT '0',
  `sudah` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL DEFAULT '0',
  `batal_pria` int NOT NULL DEFAULT '0',
  `batal_wanita` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_haji`
--

INSERT INTO `tb_haji` (`id`, `id_wilayah`, `kurang_18`, `rentang_18_50`, `rentang_51_65`, `rentang_66_75`, `lebih_75`, `pria`, `wanita`, `pns`, `tni_polri`, `niaga`, `tani`, `swasta`, `irt`, `pelajar`, `bumn_bumd`, `pensiun`, `lain_lain`, `sd`, `sltp`, `slta`, `d1_d3`, `s1`, `s2`, `s3`, `lainnya`, `belum`, `sudah`, `tahun`, `batal_pria`, `batal_wanita`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 21:13:08', '197508082009121001'),
(2, 2, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 21:13:14', '197508082009121001'),
(3, 3, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 21:12:10', '197508082009121001'),
(4, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 21:12:40', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 21:12:35', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:14', '2024-04-17 21:12:23', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:15', '2024-04-17 21:12:28', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_honorer`
--

CREATE TABLE `tb_honorer` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `min_s1` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_honorer`
--

INSERT INTO `tb_honorer` (`id`, `id_satker`, `min_s1`, `s1`, `s2`, `s3`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 1, 0, 0, 0, '2024-04-23 05:48:06', '2024-04-23 05:49:48', '197508082009121001', 2023),
(2, 2, 0, 1, 0, 0, '2024-04-23 05:48:06', '2024-04-23 05:49:56', '197508082009121001', 2023),
(3, 3, 0, 0, 1, 0, '2024-04-23 05:48:06', '2024-04-23 05:50:00', '197508082009121001', 2023),
(4, 4, 0, 0, 0, 1, '2024-04-23 05:48:06', '2024-04-23 05:50:11', '197508082009121001', 2023),
(5, 5, 0, 0, 0, 0, '2024-04-23 05:48:07', '2024-04-23 05:48:07', '197508082009121001', 2023),
(6, 6, 0, 0, 0, 0, '2024-04-23 05:48:07', '2024-04-23 05:48:07', '197508082009121001', 2023),
(7, 7, 0, 0, 0, 0, '2024-04-23 05:48:07', '2024-04-23 05:48:07', '197508082009121001', 2023),
(8, 8, 0, 0, 0, 0, '2024-04-23 05:48:07', '2024-04-23 05:48:07', '197508082009121001', 2023),
(9, 1, 35, 25, 2, 0, '2024-05-07 02:35:52', '2024-05-07 06:32:30', '197508082009121001', 2022),
(10, 2, 104, 207, 12, 0, '2024-05-07 02:35:52', '2024-05-07 06:32:48', '197508082009121001', 2022),
(11, 3, 177, 490, 18, 0, '2024-05-07 02:35:53', '2024-05-07 06:33:06', '197508082009121001', 2022),
(12, 4, 63, 75, 5, 0, '2024-05-07 02:35:53', '2024-05-07 06:33:19', '197508082009121001', 2022),
(13, 5, 37, 99, 0, 0, '2024-05-07 02:35:53', '2024-05-07 06:33:45', '197508082009121001', 2022),
(14, 6, 60, 44, 0, 0, '2024-05-07 02:35:53', '2024-05-07 06:34:20', '197508082009121001', 2022),
(15, 7, 49, 65, 0, 0, '2024-05-07 02:35:53', '2024-05-07 06:34:32', '197508082009121001', 2022),
(16, 8, 23, 35, 0, 0, '2024-05-07 02:35:53', '2024-05-07 06:34:40', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_belanja`
--

CREATE TABLE `tb_jenis_belanja` (
  `id` int NOT NULL,
  `jenis_belanja` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_belanja`
--

INSERT INTO `tb_jenis_belanja` (`id`, `jenis_belanja`, `created_at`, `updated_at`) VALUES
(1, 'Belanja Barang', '2024-05-07 01:41:43', '2024-05-07 01:41:43'),
(2, 'Belanja Modal', '2024-05-07 01:41:43', '2024-05-07 01:41:43'),
(3, 'Belanja Pegawai', '2024-05-07 01:43:00', '2024-05-07 01:43:00'),
(4, 'Belanja Bantuan Sosial', '2024-05-07 01:43:00', '2024-05-07 01:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kbihu`
--

CREATE TABLE `tb_kbihu` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `pihk` int NOT NULL DEFAULT '0',
  `ppiu` int NOT NULL DEFAULT '0',
  `kbihu` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kbihu`
--

INSERT INTO `tb_kbihu` (`id`, `id_wilayah`, `pihk`, `ppiu`, `kbihu`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 2023, '2024-04-18 00:11:20', '2024-04-18 02:29:09', '197508082009121001'),
(2, 2, 0, 0, 0, 2023, '2024-04-18 00:11:20', '2024-04-18 02:29:15', '197508082009121001'),
(3, 3, 0, 0, 0, 2023, '2024-04-18 00:11:21', '2024-04-19 00:07:21', '197508082009121001'),
(4, 4, 0, 0, 0, 2023, '2024-04-18 00:11:21', '2024-04-18 00:11:21', '197508082009121001'),
(5, 5, 0, 0, 0, 2023, '2024-04-18 00:11:21', '2024-04-18 00:11:21', '197508082009121001'),
(6, 6, 0, 0, 0, 2023, '2024-04-18 00:11:21', '2024-04-18 00:11:21', '197508082009121001'),
(7, 7, 0, 0, 0, 2023, '2024-04-18 00:11:21', '2024-04-18 00:11:21', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kua`
--

CREATE TABLE `tb_kua` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `type_a` int NOT NULL,
  `type_b` int NOT NULL,
  `type_c` int NOT NULL,
  `type_d` int NOT NULL,
  `type_d2` int NOT NULL,
  `jml_serti` int NOT NULL,
  `luas_serti` float NOT NULL,
  `jml_belum` int NOT NULL,
  `luas_belum` float NOT NULL,
  `baik` int NOT NULL,
  `rsk_ringan` int NOT NULL,
  `rsk_sedang` int NOT NULL,
  `rehab_ringan` int NOT NULL,
  `rehab_berat` int NOT NULL,
  `balai_nikah` int NOT NULL,
  `peng_pertama` int NOT NULL,
  `peng_muda` int NOT NULL,
  `peng_madya` int NOT NULL,
  `pembinaan_pertama` int NOT NULL,
  `pembinaan_muda` int NOT NULL,
  `pembinaan_madya` int NOT NULL,
  `pembinaan_utama` int NOT NULL,
  `peng_utama` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kua`
--

INSERT INTO `tb_kua` (`id`, `id_wilayah`, `type_a`, `type_b`, `type_c`, `type_d`, `type_d2`, `jml_serti`, `luas_serti`, `jml_belum`, `luas_belum`, `baik`, `rsk_ringan`, `rsk_sedang`, `rehab_ringan`, `rehab_berat`, `balai_nikah`, `peng_pertama`, `peng_muda`, `peng_madya`, `pembinaan_pertama`, `pembinaan_muda`, `pembinaan_madya`, `pembinaan_utama`, `peng_utama`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 2023, '2024-04-04 00:56:01', '2024-04-04 20:16:03', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 0, 12, 0, 0, 1, 0, 0, 0, 2023, '2024-04-04 00:56:01', '2024-04-04 20:16:08', '197508082009121001'),
(3, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 1, 0, 0, 2023, '2024-04-04 00:56:01', '2024-04-04 20:16:12', '197508082009121001'),
(4, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 2023, '2024-04-04 00:56:01', '2024-04-04 20:16:15', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 2023, '2024-04-04 00:56:01', '2024-04-04 20:16:18', '197508082009121001'),
(6, 6, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:56:01', '2024-04-04 01:06:29', '197508082009121001'),
(7, 7, 3, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 2023, '2024-04-04 00:56:01', '2024-04-04 20:16:24', '197508082009121001'),
(8, 1, 0, 0, 7, 0, 0, 2, 0, 5, 0, 6, 1, 0, 3, 0, 7, 0, 7, 2, 0, 7, 2, 0, 0, 2022, '2024-04-15 23:03:59', '2024-05-08 01:20:22', '197508082009121001'),
(9, 2, 0, 0, 8, 0, 0, 5, 0, 3, 0, 6, 2, 0, 4, 0, 8, 1, 4, 1, 1, 4, 1, 0, 0, 2022, '2024-04-15 23:03:59', '2024-05-08 01:39:22', '197508082009121001'),
(10, 3, 0, 0, 6, 0, 0, 6, 0, 0, 0, 6, 0, 0, 3, 0, 6, 0, 5, 5, 0, 5, 5, 0, 0, 2022, '2024-04-15 23:04:01', '2024-05-08 01:39:34', '197508082009121001'),
(11, 4, 0, 0, 6, 0, 0, 5, 0, 1, 0, 2, 3, 1, 3, 1, 6, 1, 5, 0, 1, 5, 0, 0, 0, 2022, '2024-04-15 23:04:01', '2024-05-08 01:40:44', '197508082009121001'),
(12, 5, 0, 0, 6, 0, 2, 8, 0, 0, 0, 7, 0, 1, 2, 1, 8, 0, 6, 0, 0, 6, 0, 0, 0, 2022, '2024-04-15 23:04:01', '2024-05-08 01:40:52', '197508082009121001'),
(13, 6, 0, 1, 3, 0, 1, 5, 0, 0, 0, 5, 0, 0, 1, 0, 5, 4, 5, 0, 4, 5, 0, 0, 0, 2022, '2024-04-15 23:04:01', '2024-05-08 01:41:06', '197508082009121001'),
(14, 7, 0, 0, 7, 0, 0, 7, 0, 0, 0, 7, 0, 0, 1, 0, 7, 2, 5, 0, 2, 5, 0, 0, 0, 2022, '2024-04-15 23:04:01', '2024-05-08 01:41:09', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuota`
--

CREATE TABLE `tb_kuota` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `passpor` int NOT NULL,
  `2030` int NOT NULL DEFAULT '0',
  `2029` int NOT NULL DEFAULT '0',
  `2028` int NOT NULL DEFAULT '0',
  `2027` int NOT NULL DEFAULT '0',
  `2026` int NOT NULL DEFAULT '0',
  `2025` int NOT NULL DEFAULT '0',
  `2024` int NOT NULL DEFAULT '0',
  `2023` int NOT NULL DEFAULT '0',
  `2022` int NOT NULL DEFAULT '0',
  `2021` int NOT NULL DEFAULT '0',
  `2020` int DEFAULT '0',
  `2019` int NOT NULL DEFAULT '0',
  `2018` int NOT NULL DEFAULT '0',
  `2017` int NOT NULL DEFAULT '0',
  `2016` int NOT NULL,
  `2015` int NOT NULL,
  `2014` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuota`
--

INSERT INTO `tb_kuota` (`id`, `id_wilayah`, `passpor`, `2030`, `2029`, `2028`, `2027`, `2026`, `2025`, `2024`, `2023`, `2022`, `2021`, `2020`, `2019`, `2018`, `2017`, `2016`, `2015`, `2014`, `created_at`, `updated_at`, `username`) VALUES
(36, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 112, 0, 0, 276, 217, 0, 0, 0, 0, '2024-04-15 06:58:52', '2024-04-16 00:19:49', '197508082009121001'),
(37, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 115, 0, 0, 307, 431, 0, 0, 0, 0, '2024-04-15 06:58:52', '2024-04-16 00:19:54', '197508082009121001'),
(38, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 36, 0, 0, 179, 62, 0, 0, 0, 0, '2024-04-15 06:58:52', '2024-04-16 00:20:00', '197508082009121001'),
(39, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 190, 176, 0, 0, 0, 0, '2024-04-15 06:58:52', '2024-04-16 00:20:05', '197508082009121001'),
(40, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 65, 0, 0, 148, 41, 0, 0, 0, 0, '2024-04-15 06:58:52', '2024-04-16 00:20:10', '197508082009121001'),
(41, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 107, 0, 0, 119, 102, 0, 0, 0, 0, '2024-04-15 06:58:53', '2024-04-16 00:20:15', '197508082009121001'),
(42, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 30, 35, 0, 0, 0, 0, '2024-04-15 06:58:53', '2024-04-16 00:20:20', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lay_ptsp`
--

CREATE TABLE `tb_lay_ptsp` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `elektronik` int NOT NULL DEFAULT '0',
  `manual` int NOT NULL DEFAULT '0',
  `ada` int NOT NULL DEFAULT '0',
  `tidak` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lay_ptsp`
--

INSERT INTO `tb_lay_ptsp` (`id`, `id_satker`, `elektronik`, `manual`, `ada`, `tidak`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(43, 1, 1, 0, 1, 0, '2024-04-23 19:14:11', '2024-04-23 19:16:24', '197508082009121001', 2023),
(44, 2, 0, 1, 0, 1, '2024-04-23 19:14:11', '2024-04-23 19:16:27', '197508082009121001', 2023),
(45, 3, 0, 0, 0, 0, '2024-04-23 19:14:11', '2024-04-23 19:14:11', '197508082009121001', 2023),
(46, 4, 0, 0, 0, 0, '2024-04-23 19:14:11', '2024-04-23 19:14:11', '197508082009121001', 2023),
(47, 5, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(48, 6, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(49, 7, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(50, 8, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(51, 9, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(52, 10, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(53, 11, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(54, 12, 0, 0, 0, 0, '2024-04-23 19:14:12', '2024-04-23 19:14:12', '197508082009121001', 2023),
(55, 13, 0, 0, 0, 0, '2024-04-23 19:14:13', '2024-04-23 19:14:13', '197508082009121001', 2023),
(56, 14, 0, 0, 0, 0, '2024-04-23 19:14:13', '2024-04-23 19:14:13', '197508082009121001', 2023),
(57, 15, 0, 0, 0, 0, '2024-04-23 19:14:13', '2024-04-23 19:14:13', '197508082009121001', 2023),
(58, 16, 0, 0, 0, 0, '2024-04-23 19:14:13', '2024-04-23 19:14:13', '197508082009121001', 2023),
(59, 17, 0, 0, 0, 0, '2024-04-23 19:14:13', '2024-04-23 19:14:13', '197508082009121001', 2023),
(60, 18, 0, 0, 0, 0, '2024-04-23 19:14:14', '2024-04-23 19:14:14', '197508082009121001', 2023),
(61, 1, 20, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 06:47:41', '197508082009121001', 2022),
(62, 2, 45, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 06:47:47', '197508082009121001', 2022),
(63, 3, 46, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 06:51:35', '197508082009121001', 2022),
(64, 4, 37, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 06:56:13', '197508082009121001', 2022),
(65, 5, 32, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 07:14:58', '197508082009121001', 2022),
(66, 6, 18, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 07:15:06', '197508082009121001', 2022),
(67, 7, 42, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 07:15:12', '197508082009121001', 2022),
(68, 8, 51, 0, 1, 0, '2024-05-07 02:35:57', '2024-05-07 07:15:17', '197508082009121001', 2022),
(69, 9, 0, 0, 3, 3, '2024-05-07 02:35:58', '2024-05-07 06:42:18', '197508082009121001', 2022),
(70, 10, 0, 0, 0, 8, '2024-05-07 02:35:58', '2024-05-07 06:42:12', '197508082009121001', 2022),
(71, 11, 0, 0, 0, 6, '2024-05-07 02:35:58', '2024-05-07 06:41:58', '197508082009121001', 2022),
(72, 12, 0, 0, 4, 6, '2024-05-07 02:35:58', '2024-05-07 06:41:51', '197508082009121001', 2022),
(73, 13, 0, 0, 0, 4, '2024-05-07 02:35:58', '2024-05-07 06:41:43', '197508082009121001', 2022),
(74, 14, 0, 0, 0, 5, '2024-05-07 02:35:59', '2024-05-07 06:41:38', '197508082009121001', 2022),
(75, 15, 0, 0, 0, 7, '2024-05-07 02:36:00', '2024-05-07 06:41:32', '197508082009121001', 2022),
(76, 16, 0, 0, 2, 2, '2024-05-07 02:36:00', '2024-05-07 06:41:26', '197508082009121001', 2022),
(77, 17, 0, 0, 2, 9, '2024-05-07 02:36:00', '2024-05-07 06:41:19', '197508082009121001', 2022),
(78, 18, 0, 0, 1, 11, '2024-05-07 02:36:00', '2024-05-07 06:41:14', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembaga_pontren`
--

CREATE TABLE `tb_lembaga_pontren` (
  `id_pontren` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `salaf` int NOT NULL,
  `khalaf` int NOT NULL,
  `ust_lk` int NOT NULL,
  `ust_pr` int NOT NULL,
  `santri_lk` int NOT NULL,
  `santri_pr` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lpk_katolik`
--

CREATE TABLE `tb_lpk_katolik` (
  `id_lpk_katolik` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `seminari` int NOT NULL,
  `smak` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_madrasah`
--

CREATE TABLE `tb_madrasah` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ra` int NOT NULL,
  `min` int NOT NULL,
  `mis` int NOT NULL,
  `mtsn` int NOT NULL,
  `mtss` int NOT NULL,
  `man` int NOT NULL,
  `mas` int NOT NULL,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_majur`
--

CREATE TABLE `tb_majur` (
  `id_majur` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `man_ipa` int NOT NULL,
  `man_ips` int NOT NULL,
  `man_bahasa` int NOT NULL,
  `man_agama` int NOT NULL,
  `mas_ipa` int NOT NULL,
  `mas_ips` int NOT NULL,
  `mas_bahasa` int NOT NULL,
  `mas_agama` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mdt`
--

CREATE TABLE `tb_mdt` (
  `id_mdt` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `j_awal` int NOT NULL,
  `j_wustha` int NOT NULL,
  `j_ulya` int NOT NULL,
  `awal_lk` int NOT NULL,
  `awal_pr` int NOT NULL,
  `gawal_lebihs1` int NOT NULL,
  `gawal_s1` int NOT NULL,
  `gawal_s2` int NOT NULL,
  `gawal_s3` int NOT NULL,
  `wustha_lk` int NOT NULL,
  `wustha_pr` int NOT NULL,
  `gwustha_kurangs1` int NOT NULL,
  `gwustha_s1` int NOT NULL,
  `gwustha_s2` int NOT NULL,
  `gwustha_s3` int NOT NULL,
  `ulya_lk` int NOT NULL,
  `ulya_pr` int NOT NULL,
  `gulya_kurans1` int NOT NULL,
  `gulya_s1` int NOT NULL,
  `gulya_s2` int NOT NULL,
  `gulya_s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nikah`
--

CREATE TABLE `tb_nikah` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `jan` int NOT NULL DEFAULT '0',
  `feb` int NOT NULL DEFAULT '0',
  `mar` int NOT NULL DEFAULT '0',
  `apr` int NOT NULL DEFAULT '0',
  `mei` int NOT NULL DEFAULT '0',
  `jun` int NOT NULL DEFAULT '0',
  `jul` int NOT NULL DEFAULT '0',
  `ags` int NOT NULL DEFAULT '0',
  `sep` int NOT NULL DEFAULT '0',
  `okt` int NOT NULL DEFAULT '0',
  `nov` int NOT NULL DEFAULT '0',
  `des` int NOT NULL DEFAULT '0',
  `kua` int NOT NULL DEFAULT '0',
  `luar_kua` int NOT NULL DEFAULT '0',
  `buku_nikah` int NOT NULL DEFAULT '0',
  `kartu_nikah` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_nikah`
--

INSERT INTO `tb_nikah` (`id`, `id_wilayah`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `ags`, `sep`, `okt`, `nov`, `des`, `kua`, `luar_kua`, `buku_nikah`, `kartu_nikah`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 2023, '2024-04-04 20:53:51', '2024-04-05 00:05:19', '197508082009121001'),
(2, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2023, '2024-04-04 20:53:51', '2024-04-05 00:23:13', '197508082009121001'),
(3, 3, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 2023, '2024-04-04 20:53:51', '2024-04-04 21:30:30', '197508082009121001'),
(4, 4, 0, 0, 0, 3, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 2023, '2024-04-04 20:53:51', '2024-04-04 21:33:32', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 20:53:51', '2024-04-04 21:32:07', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 20:53:51', '2024-04-04 21:32:26', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 20:53:51', '2024-04-04 21:31:48', '197508082009121001'),
(8, 1, 92, 134, 121, 21, 122, 53, 127, 102, 93, 102, 93, 116, 559, 577, 4000, 0, 2022, '2024-05-08 00:06:53', '2024-05-11 06:38:45', '197508082009121001'),
(9, 2, 162, 189, 209, 25, 207, 123, 211, 147, 162, 143, 142, 138, 809, 1049, 4000, 0, 2022, '2024-05-08 00:06:53', '2024-05-11 06:38:50', '197508082009121001'),
(10, 3, 112, 114, 124, 24, 149, 59, 185, 118, 94, 106, 83, 109, 505, 772, 2000, 0, 2022, '2024-05-08 00:06:53', '2024-05-11 06:38:57', '197508082009121001'),
(11, 4, 109, 130, 146, 38, 164, 77, 186, 124, 125, 130, 108, 127, 488, 976, 2000, 0, 2022, '2024-05-08 00:06:53', '2024-05-11 06:39:05', '197508082009121001'),
(12, 5, 115, 123, 49, 11, 160, 30, 171, 95, 97, 93, 93, 103, 235, 905, 2000, 0, 2022, '2024-05-08 00:06:53', '2024-05-11 06:39:12', '197508082009121001'),
(13, 6, 95, 156, 155, 20, 136, 53, 167, 125, 118, 115, 97, 96, 689, 644, 4000, 0, 2022, '2024-05-08 00:06:53', '2024-05-11 06:39:17', '197508082009121001'),
(14, 7, 51, 101, 111, 37, 89, 33, 123, 71, 91, 91, 77, 81, 527, 429, 2000, 0, 2022, '2024-05-08 00:06:54', '2024-05-11 06:39:24', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_non_pns`
--

CREATE TABLE `tb_non_pns` (
  `id` int NOT NULL,
  `penempatan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `min_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ormas`
--

CREATE TABLE `tb_ormas` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL DEFAULT '0',
  `islam` int NOT NULL DEFAULT '0',
  `kristen` int NOT NULL DEFAULT '0',
  `katolik` int NOT NULL DEFAULT '0',
  `hindu` int NOT NULL DEFAULT '0',
  `buddha` int NOT NULL DEFAULT '0',
  `khonghucu` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ormas`
--

INSERT INTO `tb_ormas` (`id`, `id_wilayah`, `islam`, `kristen`, `katolik`, `hindu`, `buddha`, `khonghucu`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, '2024-04-24 18:24:23', '2024-04-24 18:26:26', '197508082009121001', 2023),
(2, 2, 0, 2, 0, 0, 0, 0, '2024-04-24 18:24:24', '2024-04-24 18:26:31', '197508082009121001', 2023),
(3, 3, 0, 0, 3, 0, 0, 0, '2024-04-24 18:24:25', '2024-04-24 18:26:35', '197508082009121001', 2023),
(4, 4, 0, 0, 0, 4, 0, 0, '2024-04-24 18:24:25', '2024-04-24 18:26:40', '197508082009121001', 2023),
(5, 5, 0, 0, 0, 0, 5, 0, '2024-04-24 18:24:25', '2024-04-24 18:26:44', '197508082009121001', 2023),
(6, 6, 0, 0, 0, 0, 0, 6, '2024-04-24 18:24:25', '2024-04-24 18:26:49', '197508082009121001', 2023),
(7, 7, 0, 0, 0, 0, 0, 0, '2024-04-24 18:24:25', '2024-04-24 18:24:25', '197508082009121001', 2023),
(8, 1, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:04', '2024-05-30 06:44:04', '197508082009121001', 2022),
(9, 2, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:05', '2024-05-30 06:44:05', '197508082009121001', 2022),
(10, 3, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:05', '2024-05-30 06:44:05', '197508082009121001', 2022),
(11, 4, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:05', '2024-05-30 06:44:05', '197508082009121001', 2022),
(12, 5, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:05', '2024-05-30 06:44:05', '197508082009121001', 2022),
(13, 6, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:05', '2024-05-30 06:44:05', '197508082009121001', 2022),
(14, 7, 0, 0, 0, 0, 0, 0, '2024-05-30 06:44:05', '2024-05-30 06:44:05', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `islam` int NOT NULL,
  `kristen` int NOT NULL,
  `katolik` int NOT NULL,
  `hindu` int NOT NULL,
  `buddha` int NOT NULL,
  `khonghucu` int NOT NULL,
  `lainnya` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id`, `id_wilayah`, `islam`, `kristen`, `katolik`, `hindu`, `buddha`, `khonghucu`, `lainnya`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 192177, 10444, 8522, 100, 12020, 7809, 14, 2022, '2024-02-21 09:51:28', '2024-05-07 07:17:21', '197508082009121001'),
(2, 2, 280249, 4428, 2702, 15, 24144, 7834, 1233, 2022, '2024-02-21 09:51:28', '2024-02-21 09:51:28', '197508082009121001'),
(3, 3, 176817, 3380, 3734, 50, 6155, 7178, 3, 2022, '2024-02-21 09:56:47', '2024-05-07 07:19:05', '197508082009121001'),
(4, 4, 191148, 1606, 845, 20, 8143, 3706, 4, 2022, '2024-02-21 09:56:47', '2024-03-03 21:08:27', '197508082009121001'),
(5, 5, 195628, 1214, 1023, 400, 1495, 2432, 0, 2022, '2024-02-21 09:56:47', '2024-02-23 02:17:07', '197508082009121001'),
(6, 6, 168654, 3340, 1789, 1400, 9340, 165, 7, 2022, '2024-02-21 09:56:47', '2024-02-21 09:56:47', '197508082009121001'),
(7, 7, 122576, 1733, 497, 10, 3094, 170, 1, 2022, '2024-02-21 09:56:47', '2024-05-07 07:18:42', '197508082009121001'),
(8, 1, 188137, 9784, 8476, 17, 42617, 7408, 0, 2021, '2024-03-05 09:27:41', '2024-03-05 16:41:13', ''),
(9, 2, 282846, 6998, 2637, 0, 10, 0, 0, 2021, '2024-03-05 09:27:41', '2024-03-06 04:07:15', ''),
(10, 3, 171581, 3762, 3710, 0, 0, 1, 0, 2021, '2024-03-05 09:27:41', '2024-03-05 16:41:27', ''),
(11, 4, 182721, 2134, 818, 0, 0, 0, 0, 2021, '2024-03-05 09:27:41', '2024-03-05 16:41:35', ''),
(12, 5, 163257, 1395, 1007, 0, 0, 0, 0, 2021, '2024-03-05 09:27:41', '2024-03-05 16:41:44', ''),
(13, 6, 163257, 4009, 1744, 0, 0, 0, 0, 2021, '2024-03-05 09:27:41', '2024-03-05 16:41:51', ''),
(14, 7, 129554, 1953, 448, 0, 0, 0, 0, 2021, '2024-03-05 09:27:41', '2024-03-05 16:41:56', ''),
(15, 1, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:12', '2024-03-15 00:21:09', '197508082009121001'),
(16, 2, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:12', '2024-03-08 04:53:11', '197508082009121001'),
(17, 3, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:13', '2024-03-08 07:28:52', '197508082009121001'),
(18, 4, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:13', '2024-03-06 10:20:13', '197508082009121001'),
(19, 5, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:13', '2024-03-08 04:52:39', '197508082009121001'),
(20, 6, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:13', '2024-03-06 10:20:13', '197508082009121001'),
(21, 7, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-06 10:20:13', '2024-03-08 04:52:45', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengawas`
--

CREATE TABLE `tb_pengawas` (
  `id_pengawas` int DEFAULT NULL,
  `id_wilayah` int NOT NULL,
  `lk` int NOT NULL,
  `pr` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyelenggara`
--

CREATE TABLE `tb_penyelenggara` (
  `id_penyelenggara` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `pihk` int NOT NULL,
  `ppiu` int NOT NULL,
  `kbihu` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_buddha`
--

CREATE TABLE `tb_penyuluh_buddha` (
  `id` int NOT NULL,
  `id_wilayah` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kurang_s1` int NOT NULL,
  `kurang_s1_non` int NOT NULL,
  `s1` int NOT NULL,
  `s1_non` int NOT NULL,
  `lebih_s1` int NOT NULL,
  `lebih_s1_non` int NOT NULL,
  `pns_pria` int NOT NULL,
  `pns_wanita` int NOT NULL,
  `nonpns_pria` int NOT NULL,
  `nonpns_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_buddha`
--

INSERT INTO `tb_penyuluh_buddha` (`id`, `id_wilayah`, `kurang_s1`, `kurang_s1_non`, `s1`, `s1_non`, `lebih_s1`, `lebih_s1_non`, `pns_pria`, `pns_wanita`, `nonpns_pria`, `nonpns_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, '1', 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 22:34:09', '197508082009121001'),
(2, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(3, '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(4, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(5, '5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(6, '6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(7, '7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(8, '1', 0, 7, 0, 1, 0, 2, 0, 0, 6, 4, 2022, '2024-05-07 07:50:48', '2024-05-07 23:34:52', '197508082009121001'),
(9, '2', 0, 8, 0, 8, 0, 0, 0, 0, 9, 7, 2022, '2024-05-07 07:50:48', '2024-05-07 23:33:54', '197508082009121001'),
(10, '3', 0, 2, 0, 2, 0, 0, 0, 0, 4, 0, 2022, '2024-05-07 07:50:49', '2024-05-07 23:34:15', '197508082009121001'),
(11, '4', 0, 3, 0, 1, 0, 0, 0, 0, 2, 2, 2022, '2024-05-07 07:50:49', '2024-05-07 23:34:21', '197508082009121001'),
(12, '5', 0, 2, 0, 0, 0, 0, 0, 0, 2, 0, 2022, '2024-05-07 07:50:50', '2024-05-07 23:33:40', '197508082009121001'),
(13, '6', 0, 1, 0, 3, 0, 0, 0, 0, 1, 3, 2022, '2024-05-07 07:50:50', '2024-05-07 23:34:25', '197508082009121001'),
(14, '7', 0, 0, 0, 2, 0, 0, 0, 0, 2, 0, 2022, '2024-05-07 07:50:51', '2024-05-07 23:34:31', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_hindu`
--

CREATE TABLE `tb_penyuluh_hindu` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `kurang_s1_non` int NOT NULL,
  `s1` int NOT NULL,
  `s1_non` int NOT NULL,
  `lebih_s1` int NOT NULL,
  `lebih_s1_non` int NOT NULL,
  `pns_pria` int NOT NULL,
  `pns_wanita` int NOT NULL,
  `nonpns_pria` int NOT NULL,
  `nonpns_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_hindu`
--

INSERT INTO `tb_penyuluh_hindu` (`id`, `id_wilayah`, `kurang_s1`, `kurang_s1_non`, `s1`, `s1_non`, `lebih_s1`, `lebih_s1_non`, `pns_pria`, `pns_wanita`, `nonpns_pria`, `nonpns_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 2023, '2024-04-03 01:16:02', '2024-04-03 20:45:53', '197508082009121001'),
(2, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:02', '2024-04-03 22:32:25', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:02', '2024-04-03 01:16:02', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:03', '2024-04-03 01:16:03', '197508082009121001'),
(8, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 2022, '2024-05-07 07:50:47', '2024-05-07 23:25:43', '197508082009121001'),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-07 07:50:47', '2024-05-07 07:50:47', '197508082009121001'),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-07 07:50:47', '2024-05-07 07:50:47', '197508082009121001'),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-07 07:50:47', '2024-05-07 07:50:47', '197508082009121001'),
(12, 5, 0, 5, 0, 1, 0, 0, 0, 0, 3, 3, 2022, '2024-05-07 07:50:47', '2024-05-07 23:26:15', '197508082009121001'),
(13, 6, 0, 5, 0, 7, 0, 0, 0, 0, 6, 6, 2022, '2024-05-07 07:50:47', '2024-05-07 23:31:15', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-07 07:50:48', '2024-05-07 07:50:48', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_islam`
--

CREATE TABLE `tb_penyuluh_islam` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `kurang_s1_non` int NOT NULL,
  `s1` int NOT NULL,
  `s1_non` int NOT NULL,
  `lebih_s1` int NOT NULL,
  `lebih_s1_non` int NOT NULL,
  `pns_pria` int NOT NULL,
  `pns_wanita` int NOT NULL,
  `nonpns_pria` int NOT NULL,
  `nonpns_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_islam`
--

INSERT INTO `tb_penyuluh_islam` (`id`, `id_wilayah`, `kurang_s1`, `kurang_s1_non`, `s1`, `s1_non`, `lebih_s1`, `lebih_s1_non`, `pns_pria`, `pns_wanita`, `nonpns_pria`, `nonpns_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 2023, '2024-03-18 01:37:03', '2024-04-03 22:32:00', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-18 01:37:04', '2024-03-18 01:37:04', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-18 01:37:04', '2024-03-18 01:37:04', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-18 01:37:04', '2024-03-18 01:37:04', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-18 01:37:04', '2024-03-18 01:37:04', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-18 01:37:04', '2024-03-18 01:37:04', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-03-18 01:37:04', '2024-03-18 01:37:04', '197508082009121001'),
(8, 1, 1, 17, 12, 26, 1, 7, 3, 11, 33, 17, 2022, '2024-05-07 07:50:43', '2024-05-07 20:35:01', '197508082009121001'),
(9, 2, 0, 54, 7, 32, 0, 2, 6, 1, 57, 31, 2022, '2024-05-07 07:50:43', '2024-05-07 20:35:28', '197508082009121001'),
(10, 3, 0, 34, 3, 13, 0, 1, 1, 2, 36, 12, 2022, '2024-05-07 07:50:43', '2024-05-07 20:35:45', '197508082009121001'),
(11, 4, 0, 23, 2, 24, 0, 1, 1, 1, 22, 26, 2022, '2024-05-07 07:50:44', '2024-05-07 20:35:59', '197508082009121001'),
(12, 5, 0, 40, 1, 10, 0, 1, 1, 0, 46, 5, 2022, '2024-05-07 07:50:44', '2024-05-07 20:36:15', '197508082009121001'),
(13, 6, 0, 22, 11, 24, 0, 1, 4, 7, 20, 27, 2022, '2024-05-07 07:50:44', '2024-05-07 20:36:32', '197508082009121001'),
(14, 7, 0, 12, 4, 12, 0, 0, 3, 1, 9, 8, 2022, '2024-05-07 07:50:44', '2024-05-07 20:37:03', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_katolik`
--

CREATE TABLE `tb_penyuluh_katolik` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `kurang_s1_non` int NOT NULL,
  `s1` int NOT NULL,
  `s1_non` int NOT NULL,
  `lebih_s1` int NOT NULL,
  `lebih_s1_non` int NOT NULL,
  `pns_pria` int NOT NULL,
  `pns_wanita` int NOT NULL,
  `nonpns_pria` int NOT NULL,
  `nonpns_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_katolik`
--

INSERT INTO `tb_penyuluh_katolik` (`id`, `id_wilayah`, `kurang_s1`, `kurang_s1_non`, `s1`, `s1_non`, `lebih_s1`, `lebih_s1_non`, `pns_pria`, `pns_wanita`, `nonpns_pria`, `nonpns_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 20:42:56', '197508082009121001'),
(2, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 22:32:15', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 00:49:24', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 00:49:24', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 00:49:24', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 00:49:24', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:49:24', '2024-04-03 00:49:24', '197508082009121001'),
(8, 1, 0, 2, 1, 9, 1, 1, 2, 0, 6, 6, 2022, '2024-05-07 07:50:46', '2024-05-07 23:28:17', '197508082009121001'),
(9, 2, 0, 3, 0, 7, 0, 0, 0, 4, 6, 4, 2022, '2024-05-07 07:50:46', '2024-05-07 23:28:24', '197508082009121001'),
(10, 3, 0, 0, 0, 2, 0, 1, 0, 2, 1, 2, 2022, '2024-05-07 07:50:46', '2024-05-07 23:28:28', '197508082009121001'),
(11, 4, 0, 0, 0, 5, 0, 0, 0, 2, 3, 2, 2022, '2024-05-07 07:50:47', '2024-05-07 23:28:32', '197508082009121001'),
(12, 5, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 2022, '2024-05-07 07:50:47', '2024-05-07 23:28:36', '197508082009121001'),
(13, 6, 0, 1, 0, 2, 0, 0, 0, 0, 1, 2, 2022, '2024-05-07 07:50:47', '2024-05-07 23:28:49', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 2022, '2024-05-07 07:50:47', '2024-05-07 20:56:51', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_khonghucu`
--

CREATE TABLE `tb_penyuluh_khonghucu` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `kurang_s1_non` int NOT NULL,
  `s1` int NOT NULL,
  `s1_non` int NOT NULL,
  `lebih_s1` int NOT NULL,
  `lebih_s1_non` int NOT NULL,
  `pns_pria` int NOT NULL,
  `pns_wanita` int NOT NULL,
  `nonpns_pria` int NOT NULL,
  `nonpns_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_khonghucu`
--

INSERT INTO `tb_penyuluh_khonghucu` (`id`, `id_wilayah`, `kurang_s1`, `kurang_s1_non`, `s1`, `s1_non`, `lebih_s1`, `lebih_s1_non`, `pns_pria`, `pns_wanita`, `nonpns_pria`, `nonpns_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 22:34:30', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 01:16:49', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 01:16:49', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 01:16:49', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 01:16:49', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 01:16:49', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 01:16:49', '2024-04-03 01:16:49', '197508082009121001'),
(8, 1, 0, 6, 1, 2, 0, 0, 0, 1, 3, 5, 2022, '2024-05-07 07:50:52', '2024-05-07 23:37:51', '197508082009121001'),
(9, 2, 0, 7, 0, 0, 0, 0, 0, 0, 6, 1, 2022, '2024-05-07 07:50:52', '2024-05-07 23:38:08', '197508082009121001'),
(10, 3, 0, 6, 0, 0, 0, 0, 0, 0, 6, 0, 2022, '2024-05-07 07:50:52', '2024-05-07 23:38:22', '197508082009121001'),
(11, 4, 0, 2, 0, 0, 0, 0, 0, 0, 2, 0, 2022, '2024-05-07 07:50:52', '2024-05-07 23:38:40', '197508082009121001'),
(12, 5, 0, 2, 0, 0, 0, 0, 0, 0, 2, 0, 2022, '2024-05-07 07:50:52', '2024-05-07 23:38:52', '197508082009121001'),
(13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-07 07:50:52', '2024-05-07 07:50:52', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-07 07:50:52', '2024-05-07 07:50:52', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_kristen`
--

CREATE TABLE `tb_penyuluh_kristen` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `kurang_s1` int NOT NULL,
  `kurang_s1_non` int NOT NULL,
  `s1` int NOT NULL,
  `s1_non` int NOT NULL,
  `lebih_s1` int NOT NULL,
  `lebih_s1_non` int NOT NULL,
  `pns_pria` int NOT NULL,
  `pns_wanita` int NOT NULL,
  `nonpns_pria` int NOT NULL,
  `nonpns_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_kristen`
--

INSERT INTO `tb_penyuluh_kristen` (`id`, `id_wilayah`, `kurang_s1`, `kurang_s1_non`, `s1`, `s1_non`, `lebih_s1`, `lebih_s1_non`, `pns_pria`, `pns_wanita`, `nonpns_pria`, `nonpns_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 2023, '2024-04-03 00:18:31', '2024-04-03 22:32:07', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 2023, '2024-04-03 00:18:32', '2024-04-03 19:39:34', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:18:32', '2024-04-03 00:18:32', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:18:32', '2024-04-03 00:18:32', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:18:32', '2024-04-03 00:18:32', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:18:32', '2024-04-03 00:18:32', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-03 00:18:32', '2024-04-03 00:18:32', '197508082009121001'),
(8, 1, 0, 0, 0, 7, 0, 1, 0, 0, 4, 4, 2022, '2024-05-07 07:50:44', '2024-05-07 20:45:00', '197508082009121001'),
(9, 2, 0, 0, 0, 8, 0, 0, 0, 0, 3, 5, 2022, '2024-05-07 07:50:44', '2024-05-07 20:44:27', '197508082009121001'),
(10, 3, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 2022, '2024-05-07 07:50:44', '2024-05-07 20:44:31', '197508082009121001'),
(11, 4, 0, 0, 0, 4, 0, 0, 0, 0, 1, 3, 2022, '2024-05-07 07:50:44', '2024-05-07 20:44:34', '197508082009121001'),
(12, 5, 0, 0, 0, 4, 0, 0, 0, 0, 1, 3, 2022, '2024-05-07 07:50:45', '2024-05-07 20:44:39', '197508082009121001'),
(13, 6, 0, 0, 0, 4, 0, 0, 0, 0, 1, 3, 2022, '2024-05-07 07:50:45', '2024-05-07 20:44:44', '197508082009121001'),
(14, 7, 0, 0, 0, 1, 0, 1, 0, 0, 0, 2, 2022, '2024-05-07 07:50:45', '2024-05-07 20:44:57', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyuluh_tunjangan`
--

CREATE TABLE `tb_penyuluh_tunjangan` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `islam` int NOT NULL,
  `kristen` int NOT NULL,
  `katolik` int NOT NULL,
  `hindu` int NOT NULL,
  `buddha` int NOT NULL,
  `khonghucu` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penyuluh_tunjangan`
--

INSERT INTO `tb_penyuluh_tunjangan` (`id`, `id_wilayah`, `islam`, `kristen`, `katolik`, `hindu`, `buddha`, `khonghucu`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 2, 2, 2, 2, 2, 2023, '2024-04-04 00:21:07', '2024-04-04 00:23:59', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:21:07', '2024-04-04 00:21:07', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:21:07', '2024-04-04 00:21:07', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:21:07', '2024-04-04 00:21:07', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:21:08', '2024-04-04 00:21:08', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:21:08', '2024-04-04 00:21:08', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 2023, '2024-04-04 00:21:09', '2024-04-04 00:21:09', '197508082009121001'),
(8, 1, 88, 8, 12, 2, 10, 8, 2022, '2024-05-07 23:39:05', '2024-05-07 23:43:29', '197508082009121001'),
(9, 2, 50, 8, 10, 0, 16, 7, 2022, '2024-05-07 23:39:05', '2024-05-07 23:43:42', '197508082009121001'),
(10, 3, 47, 5, 3, 0, 4, 6, 2022, '2024-05-07 23:39:05', '2024-05-07 23:44:24', '197508082009121001'),
(11, 4, 48, 4, 5, 0, 4, 2, 2022, '2024-05-07 23:39:06', '2024-05-07 23:44:28', '197508082009121001'),
(12, 5, 48, 4, 2, 6, 2, 2, 2022, '2024-05-07 23:39:06', '2024-05-07 23:44:32', '197508082009121001'),
(13, 6, 52, 4, 3, 12, 4, 0, 2022, '2024-05-07 23:39:06', '2024-05-07 23:44:10', '197508082009121001'),
(14, 7, 17, 2, 0, 0, 2, 0, 2022, '2024-05-07 23:39:07', '2024-05-07 23:44:15', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `kurang_s1` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `passpor` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `id_wilayah`, `pria`, `wanita`, `kurang_s1`, `s1`, `s2`, `s3`, `passpor`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 1, 2023, '2024-04-18 02:18:17', '2024-04-19 00:09:01', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-18 02:18:18', '2024-04-19 00:08:55', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-18 02:18:18', '2024-04-19 00:08:51', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 1, 0, 2023, '2024-04-18 02:18:18', '2024-04-18 02:26:08', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-18 02:18:19', '2024-04-18 02:18:19', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-18 02:18:19', '2024-04-18 02:18:19', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-18 02:18:19', '2024-04-18 02:18:19', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pns`
--

CREATE TABLE `tb_pns` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `gol_1` int NOT NULL DEFAULT '0',
  `gol_2` int NOT NULL DEFAULT '0',
  `gol_3` int NOT NULL DEFAULT '0',
  `gol_4` int NOT NULL DEFAULT '0',
  `min_30` int NOT NULL DEFAULT '0',
  `range_30_39` int NOT NULL DEFAULT '0',
  `range_40_49` int NOT NULL DEFAULT '0',
  `range_50_57` int NOT NULL DEFAULT '0',
  `lebih_57` int NOT NULL DEFAULT '0',
  `islam` int NOT NULL DEFAULT '0',
  `kristen` int NOT NULL DEFAULT '0',
  `katolik` int NOT NULL DEFAULT '0',
  `hindu` int NOT NULL DEFAULT '0',
  `buddha` int NOT NULL DEFAULT '0',
  `khonghucu` int NOT NULL DEFAULT '0',
  `min_s1` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pns`
--

INSERT INTO `tb_pns` (`id`, `id_satker`, `pria`, `wanita`, `gol_1`, `gol_2`, `gol_3`, `gol_4`, `min_30`, `range_30_39`, `range_40_49`, `range_50_57`, `lebih_57`, `islam`, `kristen`, `katolik`, `hindu`, `buddha`, `khonghucu`, `min_s1`, `s1`, `s2`, `s3`, `created_at`, `updated_at`, `tahun`, `username`) VALUES
(9, 1, 59, 48, 0, 0, 0, 0, 2, 20, 58, 25, 3, 97, 2, 3, 2, 2, 1, 2, 0, 0, 0, '2024-04-22 19:41:52', '2024-04-28 19:13:18', 2023, '197508082009121001'),
(10, 2, 94, 165, 0, 0, 0, 0, 0, 2, 0, 0, 0, 248, 2, 4, 0, 5, 0, 0, 2, 0, 0, '2024-04-22 19:41:52', '2024-04-27 19:05:44', 2023, '197508082009121001'),
(11, 3, 116, 135, 1, 0, 0, 0, 0, 0, 3, 0, 0, 244, 0, 0, 0, 6, 1, 0, 0, 1, 0, '2024-04-22 19:41:53', '2024-04-27 19:06:12', 2023, '197508082009121001'),
(12, 4, 44, 40, 0, 2, 0, 0, 0, 0, 0, 4, 0, 79, 1, 1, 1, 3, 0, 0, 0, 0, 1, '2024-04-22 19:41:53', '2024-04-27 19:05:53', 2023, '197508082009121001'),
(13, 5, 43, 54, 0, 0, 3, 0, 0, 0, 0, 0, 5, 96, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-22 19:41:53', '2024-04-27 19:05:58', 2023, '197508082009121001'),
(14, 6, 31, 27, 0, 0, 0, 4, 0, 0, 0, 0, 0, 58, 0, 0, 0, 0, 1, 0, 0, 0, 0, '2024-04-22 19:41:53', '2024-04-27 19:04:21', 2023, '197508082009121001'),
(15, 7, 63, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 170, 0, 0, 0, 3, 0, 0, 0, 0, 0, '2024-04-22 19:41:53', '2024-04-27 19:06:04', 2023, '197508082009121001'),
(16, 8, 31, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 68, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-22 19:41:53', '2024-04-27 19:04:34', 2023, '197508082009121001'),
(17, 1, 59, 48, 0, 8, 74, 25, 2, 20, 58, 25, 3, 97, 2, 3, 2, 2, 1, 13, 66, 28, 0, '2024-04-29 20:08:29', '2024-05-07 05:49:10', 2022, '197508082009121001'),
(18, 2, 94, 165, 0, 15, 163, 81, 5, 23, 103, 117, 10, 242, 2, 4, 0, 5, 0, 27, 211, 20, 1, '2024-04-29 20:08:29', '2024-05-07 05:49:26', 2022, '197508082009121001'),
(19, 3, 116, 135, 0, 13, 176, 62, 11, 25, 100, 96, 9, 244, 0, 0, 0, 6, 1, 26, 213, 12, 0, '2024-04-29 20:08:29', '2024-05-07 05:49:30', 2022, '197508082009121001'),
(20, 4, 44, 40, 0, 8, 64, 12, 0, 13, 43, 28, 0, 79, 1, 1, 0, 3, 0, 16, 60, 8, 0, '2024-04-29 20:08:29', '2024-05-07 05:49:34', 2022, '197508082009121001'),
(21, 5, 43, 54, 0, 4, 83, 10, 9, 16, 31, 38, 2, 96, 1, 0, 0, 0, 0, 10, 83, 4, 0, '2024-04-29 20:08:30', '2024-05-07 05:48:32', 2022, '197508082009121001'),
(22, 6, 31, 27, 0, 1, 47, 10, 6, 15, 23, 10, 0, 58, 0, 0, 0, 0, 0, 1, 51, 6, 0, '2024-04-29 20:08:30', '2024-05-07 05:47:50', 2022, '197508082009121001'),
(23, 7, 63, 110, 0, 32, 127, 14, 7, 16, 60, 79, 8, 170, 0, 0, 0, 3, 0, 55, 115, 3, 0, '2024-04-29 20:08:30', '2024-05-07 05:49:38', 2022, '197508082009121001'),
(24, 8, 31, 37, 0, 9, 55, 4, 3, 8, 25, 28, 2, 68, 0, 0, 0, 0, 0, 18, 49, 1, 0, '2024-04-29 20:08:30', '2024-05-07 05:48:01', 2022, '197508082009121001'),
(25, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:14', '2024-05-02 20:09:14', 2021, '197508082009121001'),
(26, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:14', '2024-05-02 20:09:14', 2021, '197508082009121001'),
(27, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:14', '2024-05-02 20:09:14', 2021, '197508082009121001'),
(28, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:14', '2024-05-02 20:09:14', 2021, '197508082009121001'),
(29, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:14', '2024-05-02 20:09:14', 2021, '197508082009121001'),
(30, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:15', '2024-05-02 20:09:15', 2021, '197508082009121001'),
(31, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:15', '2024-05-02 20:09:15', 2021, '197508082009121001'),
(32, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-02 20:09:15', '2024-05-02 20:09:15', 2021, '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pns_ijinbljr`
--

CREATE TABLE `tb_pns_ijinbljr` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `min_s1` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pns_ijinbljr`
--

INSERT INTO `tb_pns_ijinbljr` (`id`, `id_satker`, `min_s1`, `s1`, `s2`, `s3`, `created_at`, `updated_at`, `tahun`, `username`) VALUES
(9, 1, 1, 0, 0, 0, '2024-04-23 03:27:59', '2024-04-23 05:12:30', 2023, '197508082009121001'),
(10, 2, 0, 1, 0, 0, '2024-04-23 03:27:59', '2024-04-23 05:12:33', 2023, '197508082009121001'),
(11, 3, 0, 0, 1, 0, '2024-04-23 03:27:59', '2024-04-23 05:12:37', 2023, '197508082009121001'),
(12, 4, 0, 0, 0, 1, '2024-04-23 03:27:59', '2024-04-23 05:12:41', 2023, '197508082009121001'),
(13, 5, 0, 0, 0, 0, '2024-04-23 03:27:59', '2024-04-23 03:27:59', 2023, '197508082009121001'),
(14, 6, 0, 0, 0, 0, '2024-04-23 03:27:59', '2024-04-23 03:27:59', 2023, '197508082009121001'),
(15, 7, 0, 0, 0, 0, '2024-04-23 03:28:00', '2024-04-23 03:28:00', 2023, '197508082009121001'),
(16, 8, 0, 0, 0, 0, '2024-04-23 03:28:00', '2024-04-23 03:28:00', 2023, '197508082009121001'),
(17, 1, 0, 0, 0, 0, '2024-05-07 02:35:22', '2024-05-07 02:35:22', 2022, '197508082009121001'),
(18, 2, 0, 0, 0, 0, '2024-05-07 02:35:22', '2024-05-07 02:35:22', 2022, '197508082009121001'),
(19, 3, 0, 0, 0, 0, '2024-05-07 02:35:22', '2024-05-07 02:35:22', 2022, '197508082009121001'),
(20, 4, 0, 0, 0, 0, '2024-05-07 02:35:22', '2024-05-07 02:35:22', 2022, '197508082009121001'),
(21, 5, 0, 0, 0, 0, '2024-05-07 02:35:22', '2024-05-07 02:35:22', 2022, '197508082009121001'),
(22, 6, 0, 0, 0, 0, '2024-05-07 02:35:23', '2024-05-07 02:35:23', 2022, '197508082009121001'),
(23, 7, 0, 1, 0, 0, '2024-05-07 02:35:23', '2024-05-07 06:31:54', 2022, '197508082009121001'),
(24, 8, 0, 0, 0, 0, '2024-05-07 02:35:23', '2024-05-07 02:35:23', 2022, '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pns_naikpkt`
--

CREATE TABLE `tb_pns_naikpkt` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `gol_1` int NOT NULL DEFAULT '0',
  `gol_2` int NOT NULL DEFAULT '0',
  `gol_3` int NOT NULL DEFAULT '0',
  `gol_4` int NOT NULL DEFAULT '0',
  `min_s1` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `islam` int NOT NULL DEFAULT '0',
  `kristen` int NOT NULL DEFAULT '0',
  `katolik` int NOT NULL DEFAULT '0',
  `hindu` int NOT NULL DEFAULT '0',
  `buddha` int NOT NULL DEFAULT '0',
  `khonghucu` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pns_naikpkt`
--

INSERT INTO `tb_pns_naikpkt` (`id`, `id_satker`, `pria`, `wanita`, `gol_1`, `gol_2`, `gol_3`, `gol_4`, `min_s1`, `s1`, `s2`, `s3`, `islam`, `kristen`, `katolik`, `hindu`, `buddha`, `khonghucu`, `created_at`, `updated_at`, `tahun`, `username`) VALUES
(9, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-04-23 02:03:22', '2024-04-23 02:17:30', 2023, '197508082009121001'),
(10, 2, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 1, 0, 0, 0, 0, '2024-04-23 02:03:22', '2024-04-23 02:17:36', 2023, '197508082009121001'),
(11, 3, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2024-04-23 02:03:22', '2024-04-23 02:17:49', 2023, '197508082009121001'),
(12, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, '2024-04-23 02:03:23', '2024-04-23 02:18:02', 2023, '197508082009121001'),
(13, 5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2024-04-23 02:03:23', '2024-04-23 02:18:12', 2023, '197508082009121001'),
(14, 6, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-04-23 02:03:24', '2024-04-23 02:18:21', 2023, '197508082009121001'),
(15, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-23 02:03:24', '2024-04-23 02:03:24', 2023, '197508082009121001'),
(16, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-23 02:03:25', '2024-04-23 02:03:25', 2023, '197508082009121001'),
(17, 1, 6, 6, 0, 0, 6, 6, 0, 6, 6, 0, 11, 1, 0, 0, 0, 0, '2024-05-07 02:35:16', '2024-05-07 06:04:05', 2022, '197508082009121001'),
(18, 2, 12, 16, 0, 1, 19, 8, 4, 20, 4, 0, 28, 0, 0, 0, 0, 0, '2024-05-07 02:35:16', '2024-05-07 06:04:11', 2022, '197508082009121001'),
(19, 3, 7, 7, 0, 0, 13, 1, 3, 10, 1, 0, 14, 0, 0, 0, 0, 0, '2024-05-07 02:35:16', '2024-05-07 06:04:15', 2022, '197508082009121001'),
(20, 4, 8, 3, 0, 0, 8, 3, 0, 8, 3, 0, 11, 0, 0, 0, 0, 0, '2024-05-07 02:35:16', '2024-05-07 06:04:18', 2022, '197508082009121001'),
(21, 5, 8, 0, 0, 0, 8, 0, 1, 7, 0, 0, 8, 0, 0, 0, 0, 0, '2024-05-07 02:35:16', '2024-05-07 06:04:21', 2022, '197508082009121001'),
(22, 6, 2, 1, 0, 0, 2, 1, 1, 1, 1, 0, 3, 0, 0, 0, 0, 0, '2024-05-07 02:35:16', '2024-05-07 06:04:26', 2022, '197508082009121001'),
(23, 7, 3, 9, 0, 1, 10, 1, 6, 6, 0, 0, 12, 0, 0, 0, 0, 0, '2024-05-07 02:35:17', '2024-05-07 06:04:31', 2022, '197508082009121001'),
(24, 8, 5, 6, 0, 1, 9, 1, 4, 6, 1, 0, 11, 0, 0, 0, 0, 0, '2024-05-07 02:35:17', '2024-05-07 06:04:34', 2022, '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pns_pensiun`
--

CREATE TABLE `tb_pns_pensiun` (
  `id` int NOT NULL,
  `id_satker` int NOT NULL,
  `pria` int NOT NULL DEFAULT '0',
  `wanita` int NOT NULL DEFAULT '0',
  `gol_1` int NOT NULL DEFAULT '0',
  `gol_2` int NOT NULL DEFAULT '0',
  `gol_3` int NOT NULL DEFAULT '0',
  `gol_4` int NOT NULL DEFAULT '0',
  `min_s1` int NOT NULL DEFAULT '0',
  `s1` int NOT NULL DEFAULT '0',
  `s2` int NOT NULL DEFAULT '0',
  `s3` int NOT NULL DEFAULT '0',
  `islam` int NOT NULL DEFAULT '0',
  `kristen` int NOT NULL DEFAULT '0',
  `katolik` int NOT NULL DEFAULT '0',
  `hindu` int NOT NULL DEFAULT '0',
  `buddha` int NOT NULL DEFAULT '0',
  `khonghucu` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pns_pensiun`
--

INSERT INTO `tb_pns_pensiun` (`id`, `id_satker`, `pria`, `wanita`, `gol_1`, `gol_2`, `gol_3`, `gol_4`, `min_s1`, `s1`, `s2`, `s3`, `islam`, `kristen`, `katolik`, `hindu`, `buddha`, `khonghucu`, `created_at`, `updated_at`, `tahun`, `username`) VALUES
(9, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-04-23 00:58:51', '2024-04-23 05:11:36', 2023, '197508082009121001'),
(10, 2, 0, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, '2024-04-23 00:58:51', '2024-04-23 01:06:14', 2023, '197508082009121001'),
(11, 3, 0, 0, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2024-04-23 00:58:51', '2024-04-23 01:07:34', 2023, '197508082009121001'),
(12, 4, 0, 0, 0, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 2, 0, 0, '2024-04-23 00:58:51', '2024-04-23 01:07:38', 2023, '197508082009121001'),
(13, 5, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2024-04-23 00:58:51', '2024-04-23 01:10:15', 2023, '197508082009121001'),
(14, 6, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024-04-23 00:58:51', '2024-04-23 01:10:20', 2023, '197508082009121001'),
(15, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-23 00:58:51', '2024-04-23 00:58:51', 2023, '197508082009121001'),
(16, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-23 00:58:52', '2024-04-23 00:58:52', 2023, '197508082009121001'),
(17, 1, 1, 2, 0, 0, 2, 1, 1, 1, 1, 0, 3, 0, 0, 0, 0, 0, '2024-05-07 02:35:28', '2024-05-07 05:58:22', 2022, '197508082009121001'),
(18, 2, 1, 2, 0, 0, 1, 2, 0, 2, 1, 0, 3, 0, 0, 0, 0, 0, '2024-05-07 02:35:28', '2024-05-07 05:58:25', 2022, '197508082009121001'),
(19, 3, 2, 2, 0, 1, 3, 0, 2, 2, 0, 0, 4, 0, 0, 0, 0, 0, '2024-05-07 02:35:28', '2024-05-07 05:58:28', 2022, '197508082009121001'),
(20, 4, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 2, 0, 0, 0, 0, 0, '2024-05-07 02:35:28', '2024-05-07 05:58:32', 2022, '197508082009121001'),
(21, 5, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-05-07 02:35:29', '2024-05-07 05:58:36', 2022, '197508082009121001'),
(22, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-07 02:35:29', '2024-05-07 02:35:29', 2022, '197508082009121001'),
(23, 7, 2, 3, 0, 1, 3, 1, 2, 3, 0, 0, 5, 0, 0, 0, 0, 0, '2024-05-07 02:35:29', '2024-05-07 05:58:44', 2022, '197508082009121001'),
(24, 8, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, '2024-05-07 02:35:29', '2024-05-07 05:58:47', 2022, '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pns_tugasbljr`
--

CREATE TABLE `tb_pns_tugasbljr` (
  `id` int NOT NULL,
  `lokasi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pns_tugasbljr`
--

INSERT INTO `tb_pns_tugasbljr` (`id`, `lokasi`, `s1`, `s2`, `s3`, `created_at`, `updated_at`, `tahun`, `username`) VALUES
(1, 'Tugas Belajar Dalam Negeri', 0, 4, 0, '2024-02-20 09:23:11', '2024-02-20 09:23:11', 2022, ''),
(2, 'Tugas Belajar Luar Negeri', 0, 0, 0, '2024-02-20 09:23:11', '2024-02-20 09:23:11', 2022, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id` int NOT NULL,
  `program` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id`, `program`, `created_at`, `updated_at`) VALUES
(1, 'Dukungan Manajemen', '2024-05-07 01:41:43', '2024-05-07 01:41:43'),
(2, 'Kualitas Pengajaran & Pembelajaran', '2024-05-07 01:41:43', '2024-05-07 01:41:43'),
(3, 'Kerukunan Umat & Layanan Kehidupan Beragama', '2024-05-07 01:43:00', '2024-05-07 01:43:00'),
(4, 'PUAD & Wajib Belajar 12 Tahun', '2024-05-07 01:43:00', '2024-05-07 01:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_qori`
--

CREATE TABLE `tb_qori` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `qori_pria` int NOT NULL,
  `qori_wanita` int NOT NULL,
  `hafiz_pria` int NOT NULL,
  `hafiz_wanita` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_qori`
--

INSERT INTO `tb_qori` (`id`, `id_wilayah`, `qori_pria`, `qori_wanita`, `hafiz_pria`, `hafiz_wanita`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 0, 0, 0, 2023, '2024-04-11 17:42:35', '2024-04-11 17:53:48', '197508082009121001'),
(2, 2, 0, 2, 0, 0, 2023, '2024-04-11 17:42:35', '2024-04-11 17:53:52', '197508082009121001'),
(3, 3, 0, 0, 1, 0, 2023, '2024-04-11 17:42:35', '2024-04-11 17:53:57', '197508082009121001'),
(4, 4, 0, 0, 0, 1, 2023, '2024-04-11 17:42:35', '2024-04-11 17:54:01', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 2023, '2024-04-11 17:42:35', '2024-04-11 17:42:35', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 2023, '2024-04-11 17:42:35', '2024-04-11 17:42:35', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 2023, '2024-04-11 17:42:36', '2024-04-11 17:42:36', '197508082009121001'),
(8, 1, 4, 5, 4, 5, 2022, '2024-05-13 05:49:41', '2024-05-13 05:51:45', '197508082009121001'),
(9, 2, 29, 27, 8, 6, 2022, '2024-05-13 05:49:41', '2024-05-13 05:51:54', '197508082009121001'),
(10, 3, 35, 35, 13, 12, 2022, '2024-05-13 05:49:41', '2024-05-13 05:52:03', '197508082009121001'),
(11, 4, 7, 7, 5, 5, 2022, '2024-05-13 05:49:42', '2024-05-13 05:52:13', '197508082009121001'),
(12, 5, 7, 7, 4, 4, 2022, '2024-05-13 05:49:42', '2024-05-13 05:52:25', '197508082009121001'),
(13, 6, 6, 7, 2, 2, 2022, '2024-05-13 05:49:42', '2024-05-13 05:52:34', '197508082009121001'),
(14, 7, 20, 20, 4, 2, 2022, '2024-05-13 05:49:42', '2024-05-13 05:52:43', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_realisasi_belanja`
--

CREATE TABLE `tb_realisasi_belanja` (
  `id` int NOT NULL,
  `id_belanja` int NOT NULL,
  `pagu` bigint NOT NULL DEFAULT '0',
  `realisasi` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_realisasi_belanja`
--

INSERT INTO `tb_realisasi_belanja` (`id`, `id_belanja`, `pagu`, `realisasi`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 111000, 0, '2024-05-07 00:17:18', '2024-05-07 01:25:58', '197508082009121001', 2023),
(2, 2, 0, 111111, '2024-05-07 00:17:18', '2024-05-07 01:26:03', '197508082009121001', 2023),
(3, 3, 0, 0, '2024-05-07 00:17:19', '2024-05-07 00:17:19', '197508082009121001', 2023),
(4, 4, 0, 0, '2024-05-07 00:17:19', '2024-05-07 00:17:19', '197508082009121001', 2023),
(5, 1, 58749814000, 57321800000, '2024-05-07 02:30:29', '2024-05-07 02:53:21', '197508082009121001', 2022),
(6, 2, 39628765000, 39569300000, '2024-05-07 02:30:29', '2024-05-07 02:53:35', '197508082009121001', 2022),
(7, 3, 179174534000, 177942900000, '2024-05-07 02:30:29', '2024-05-07 02:53:48', '197508082009121001', 2022),
(8, 4, 0, 0, '2024-05-07 02:30:29', '2024-05-07 02:30:29', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_realisasi_dana`
--

CREATE TABLE `tb_realisasi_dana` (
  `id` int NOT NULL,
  `id_dana` int NOT NULL,
  `pagu` bigint NOT NULL DEFAULT '0',
  `realisasi` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_realisasi_dana`
--

INSERT INTO `tb_realisasi_dana` (`id`, `id_dana`, `pagu`, `realisasi`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 10000, 0, '2024-05-07 00:17:19', '2024-05-07 01:51:04', '197508082009121001', 2023),
(2, 2, 0, 1111, '2024-05-07 00:17:19', '2024-05-07 01:51:08', '197508082009121001', 2023),
(3, 3, 0, 0, '2024-05-07 00:17:19', '2024-05-07 00:17:19', '197508082009121001', 2023),
(4, 4, 0, 0, '2024-05-07 00:17:19', '2024-05-07 00:17:19', '197508082009121001', 2023),
(5, 5, 0, 0, '2024-05-07 00:17:19', '2024-05-07 00:17:19', '197508082009121001', 2023),
(6, 1, 240906923000, 238550686000, '2024-05-07 02:30:29', '2024-05-07 02:55:49', '197508082009121001', 2022),
(7, 2, 349482000, 275057000, '2024-05-07 02:30:29', '2024-05-07 02:56:02', '197508082009121001', 2022),
(8, 3, 5516468000, 5245456000, '2024-05-07 02:30:30', '2024-05-07 02:56:14', '197508082009121001', 2022),
(9, 4, 4375000000, 4375000000, '2024-05-07 02:30:30', '2024-05-07 02:56:26', '197508082009121001', 2022),
(10, 5, 26405240000, 26387801000, '2024-05-07 02:30:31', '2024-05-07 02:56:39', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_realisasi_program`
--

CREATE TABLE `tb_realisasi_program` (
  `id` int NOT NULL,
  `id_program` int NOT NULL,
  `pagu` bigint NOT NULL DEFAULT '0',
  `realisasi` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_realisasi_program`
--

INSERT INTO `tb_realisasi_program` (`id`, `id_program`, `pagu`, `realisasi`, `created_at`, `updated_at`, `username`, `tahun`) VALUES
(1, 1, 10000, 0, '2024-05-07 00:17:15', '2024-05-07 01:25:47', '197508082009121001', 2023),
(2, 2, 0, 11000, '2024-05-07 00:17:15', '2024-05-07 01:25:52', '197508082009121001', 2023),
(3, 3, 0, 0, '2024-05-07 00:17:16', '2024-05-07 00:17:16', '197508082009121001', 2023),
(4, 4, 0, 0, '2024-05-07 00:17:16', '2024-05-07 00:17:16', '197508082009121001', 2023),
(5, 1, 213630192000, 211819000000, '2024-05-07 02:30:28', '2024-05-07 02:50:53', '197508082009121001', 2022),
(6, 2, 5564269000, 5444000000, '2024-05-07 02:30:28', '2024-05-07 02:51:21', '197508082009121001', 2022),
(7, 3, 35027715000, 34790000000, '2024-05-07 02:30:28', '2024-05-14 01:49:00', '197508082009121001', 2022),
(8, 4, 23330937000, 22790000000, '2024-05-07 02:30:29', '2024-05-07 02:52:16', '197508082009121001', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rmh_ibadah`
--

CREATE TABLE `tb_rmh_ibadah` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ngr` int NOT NULL DEFAULT '0',
  `raya` int NOT NULL DEFAULT '0',
  `agung` int NOT NULL DEFAULT '0',
  `besar` int NOT NULL DEFAULT '0',
  `jamik` int NOT NULL DEFAULT '0',
  `bsjrh` int NOT NULL DEFAULT '0',
  `umum` int NOT NULL DEFAULT '0',
  `nas` int NOT NULL DEFAULT '0',
  `masjid` int NOT NULL DEFAULT '0',
  `musholla` int NOT NULL DEFAULT '0',
  `gereja_kristen` int NOT NULL DEFAULT '0',
  `gereja_katolik` int NOT NULL DEFAULT '0',
  `pura` int NOT NULL DEFAULT '0',
  `vihara` int NOT NULL DEFAULT '0',
  `kelenteng` int NOT NULL DEFAULT '0',
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rmh_ibadah`
--

INSERT INTO `tb_rmh_ibadah` (`id`, `id_wilayah`, `ngr`, `raya`, `agung`, `besar`, `jamik`, `bsjrh`, `umum`, `nas`, `masjid`, `musholla`, `gereja_kristen`, `gereja_katolik`, `pura`, `vihara`, `kelenteng`, `tahun`, `username`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:51', '2024-04-25 02:01:51'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:52', '2024-04-25 02:01:52'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:52', '2024-04-25 02:01:52'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:52', '2024-04-25 02:01:52'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:52', '2024-04-25 02:01:52'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:53', '2024-04-25 02:01:53'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-25 02:01:53', '2024-04-25 02:01:53'),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 98, 58, 35, 3, 2, 58, 33, 2022, '197508082009121001', '2024-05-07 14:19:33', '2024-05-07 14:19:33'),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 178, 262, 67, 6, 0, 68, 52, 2022, '197508082009121001', '2024-05-07 14:19:34', '2024-05-07 14:19:34'),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 120, 180, 20, 11, 0, 35, 26, 2022, '197508082009121001', '2024-05-07 14:19:35', '2024-05-07 14:19:35'),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 193, 137, 28, 2, 0, 26, 10, 2022, '197508082009121001', '2024-05-07 14:19:35', '2024-05-07 14:19:35'),
(12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 163, 257, 16, 5, 7, 12, 12, 2022, '197508082009121001', '2024-05-07 14:19:35', '2024-05-07 14:19:35'),
(13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 144, 52, 12, 1, 4, 23, 1, 2022, '197508082009121001', '2024-05-07 14:19:35', '2024-05-07 14:19:35'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 119, 41, 12, 3, 0, 13, 2, 2022, '197508082009121001', '2024-05-07 14:19:35', '2024-05-07 14:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `id_rombel` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ra_a` int NOT NULL,
  `ra_b` int NOT NULL,
  `mi_1` int NOT NULL,
  `mi_2` int NOT NULL,
  `mi_3` int NOT NULL,
  `mi_4` int NOT NULL,
  `mi_5` int NOT NULL,
  `mi_6` int NOT NULL,
  `mts_7` int NOT NULL,
  `mts_8` int NOT NULL,
  `mts_9` int NOT NULL,
  `ma_10` int NOT NULL,
  `ma_11` int NOT NULL,
  `ma_12` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id-ruang` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ra_baik` int NOT NULL,
  `ra_rr` int NOT NULL,
  `ra_rb` int NOT NULL,
  `mi_baik` int NOT NULL,
  `mi_rr` int NOT NULL,
  `mi_rb` int NOT NULL,
  `mts_baik` int NOT NULL,
  `mts_rr` int NOT NULL,
  `mts_rb` int NOT NULL,
  `ma_baik` int NOT NULL,
  `ma_rr` int NOT NULL,
  `ma_rb` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sumberdana`
--

CREATE TABLE `tb_sumberdana` (
  `id` int NOT NULL,
  `sumber_dana` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sumberdana`
--

INSERT INTO `tb_sumberdana` (`id`, `sumber_dana`, `created_at`, `updated_at`) VALUES
(1, 'RM', '2024-05-07 01:36:49', '2024-05-07 01:36:49'),
(2, 'PHLN', '2024-05-07 01:36:49', '2024-05-07 01:36:49'),
(3, 'PNBP', '2024-05-07 01:39:13', '2024-05-07 01:39:13'),
(4, 'HIBAH', '2024-05-07 01:39:13', '2024-05-07 01:39:13'),
(5, 'SBSN', '2024-05-07 01:39:13', '2024-05-07 01:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipo_masjid`
--

CREATE TABLE `tb_tipo_masjid` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `ngr` int NOT NULL,
  `raya` int NOT NULL,
  `agung` int NOT NULL,
  `besar` int NOT NULL,
  `jamik` int NOT NULL,
  `sejarah` int NOT NULL,
  `umum` int NOT NULL,
  `nasional` int NOT NULL,
  `masjid` int NOT NULL,
  `musholla` int NOT NULL,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tipo_masjid`
--

INSERT INTO `tb_tipo_masjid` (`id`, `id_wilayah`, `ngr`, `raya`, `agung`, `besar`, `jamik`, `sejarah`, `umum`, `nasional`, `masjid`, `musholla`, `tahun`, `username`, `updated_at`, `created_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-04-02 14:32:26', '2024-03-14 14:37:14'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-17 12:36:26', '2024-03-14 14:37:14'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-14 14:37:14', '2024-03-14 14:37:14'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-14 14:37:14', '2024-03-14 14:37:14'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-14 14:37:14', '2024-03-14 14:37:14'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-14 14:37:14', '2024-03-14 14:37:14'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-14 14:37:14', '2024-03-14 14:37:14'),
(8, 1, 0, 1, 0, 4, 95, 0, 2, 0, 98, 58, 2022, '197508082009121001', '2024-05-07 07:45:09', '2024-05-07 07:40:45'),
(9, 2, 0, 0, 1, 5, 135, 0, 38, 0, 178, 262, 2022, '197508082009121001', '2024-05-07 07:47:02', '2024-05-07 07:40:45'),
(10, 3, 0, 0, 1, 8, 153, 0, 1, 0, 193, 257, 2022, '197508082009121001', '2024-05-07 08:08:55', '2024-05-07 07:40:45'),
(11, 4, 0, 0, 1, 7, 46, 2, 143, 0, 163, 137, 2022, '197508082009121001', '2024-05-07 08:08:52', '2024-05-07 07:40:45'),
(12, 5, 0, 0, 1, 1, 107, 0, 5, 0, 120, 180, 2022, '197508082009121001', '2024-05-07 07:47:23', '2024-05-07 07:40:46'),
(13, 6, 0, 0, 1, 0, 124, 1, 13, 0, 144, 52, 2022, '197508082009121001', '2024-05-07 07:47:28', '2024-05-07 07:40:46'),
(14, 7, 0, 0, 1, 0, 88, 0, 30, 0, 119, 41, 2022, '197508082009121001', '2024-05-07 07:47:33', '2024-05-07 07:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unitkerja`
--

CREATE TABLE `tb_unitkerja` (
  `id` int NOT NULL,
  `kd_satker` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_satker` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_unitkerja`
--

INSERT INTO `tb_unitkerja` (`id`, `kd_satker`, `nama_satker`, `ket`) VALUES
(1, 'kanwil', 'Kanwil Kementerian Agama Provinsi Kep. Bangka Belitung', '-'),
(2, 'pkp', 'Kantor Kementerian Agama Kota Pangkalpinang', '-'),
(3, 'bangka', 'Kantor Kementerian Agama Kabupaten Bangka', '-'),
(4, 'bateng', 'Kantor Kementerian Agama Kabupaten Bangka Tengah', '-'),
(5, 'babar', 'Kantor Kementerian Agama Kabupaten Bangka Barat', '-'),
(6, 'basel', 'Kantor Kementerian Agama Kabupaten Bangka Selatan', '-'),
(7, 'belitung', 'Kantor Kementerian Agama Kabupaten Belitung', '-'),
(8, 'beltim', 'Kantor Kementerian Agama Kabupaten Belitung Timur', '-'),
(9, 'kua_pkp', 'KUA Kota Pangkalpinang', '-'),
(10, 'kua_bangka', 'KUA Kabupaten Bangka', '-'),
(11, 'kua_bateng', 'KUA Kabupaten Bangka Tengah', '-'),
(12, 'kua_babar', 'KUA Kabupaten Bangka Barat', '-'),
(13, 'kua_basel', 'KUA Kabupaten Bangka Selatan', '-'),
(14, 'kua_belitung', 'KUA Kabupaten Belitung', '-'),
(15, 'kua_beltim', 'KUA Kabupaten Belitung Timur', '-'),
(16, 'man', 'Madrasah Aliah Negeri', '-'),
(17, 'mtsn', 'Madrasah Tsanawiah Negeri', '-'),
(18, 'min', 'Madrasah Ibtidayah Negeri', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unitprogram`
--

CREATE TABLE `tb_unitprogram` (
  `id` int NOT NULL,
  `nama_program` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_unitprogram`
--

INSERT INTO `tb_unitprogram` (`id`, `nama_program`, `created_at`, `updated_at`) VALUES
(1, 'Setjen', '2024-04-24 02:34:31', '2024-04-24 02:34:31'),
(2, 'Pendidikan Islam', '2024-04-24 02:34:31', '2024-04-24 02:34:31'),
(3, 'Bimas Islam', '2024-04-24 02:36:22', '2024-04-24 02:36:22'),
(4, 'Bimas Kristen', '2024-04-24 02:36:22', '2024-04-24 02:36:22'),
(5, 'Bimas Katolik', '2024-04-24 02:36:22', '2024-04-24 02:36:22'),
(6, 'Bimas Hindu', '2024-04-24 02:36:22', '2024-04-24 02:36:22'),
(7, 'Bimas Buddha', '2024-04-24 02:36:22', '2024-04-24 02:36:22'),
(8, 'Penyelenggaraan Haji & Umrah', '2024-04-24 02:36:22', '2024-04-24 02:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wakaf`
--

CREATE TABLE `tb_wakaf` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL,
  `jml_serti` int NOT NULL,
  `luas_serti` float NOT NULL,
  `jml_belum` int NOT NULL,
  `luas_belum` float NOT NULL,
  `masjid` int NOT NULL,
  `mushalla` int NOT NULL,
  `sekolah` int NOT NULL,
  `pesantren` int NOT NULL,
  `makam` int NOT NULL,
  `sosial_lain` int NOT NULL,
  `perkebunan` int NOT NULL,
  `koperasi` int NOT NULL,
  `rumah_sakit` int NOT NULL,
  `rumah_sewa` int NOT NULL,
  `perikanan` int NOT NULL,
  `toko_sewa` int NOT NULL,
  `pertanian` int NOT NULL,
  `spbu` int NOT NULL,
  `perkantoran_sewa` int NOT NULL,
  `klinik` int NOT NULL,
  `peternakan` int NOT NULL,
  `lainnya` int NOT NULL,
  `tahun` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_wakaf`
--

INSERT INTO `tb_wakaf` (`id`, `id_wilayah`, `jml_serti`, `luas_serti`, `jml_belum`, `luas_belum`, `masjid`, `mushalla`, `sekolah`, `pesantren`, `makam`, `sosial_lain`, `perkebunan`, `koperasi`, `rumah_sakit`, `rumah_sewa`, `perikanan`, `toko_sewa`, `pertanian`, `spbu`, `perkantoran_sewa`, `klinik`, `peternakan`, `lainnya`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 2023, '2024-04-08 00:21:52', '2024-04-08 00:56:56', '197508082009121001'),
(2, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-08 00:21:53', '2024-04-08 01:00:11', '197508082009121001'),
(3, 3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-08 00:21:53', '2024-04-08 01:00:16', '197508082009121001'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 2023, '2024-04-08 00:21:53', '2024-04-08 01:01:18', '197508082009121001'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 2023, '2024-04-08 00:21:53', '2024-04-08 01:01:03', '197508082009121001'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 2023, '2024-04-08 00:21:53', '2024-04-08 01:01:08', '197508082009121001'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 2023, '2024-04-08 00:21:53', '2024-04-08 01:01:13', '197508082009121001'),
(8, 1, 119, 10.91, 35, 2.96, 93, 21, 14, 7, 7, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:13', '2024-05-13 05:48:03', '197508082009121001'),
(9, 2, 205, 72.56, 56, 15.92, 97, 68, 35, 3, 53, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:13', '2024-05-13 05:48:07', '197508082009121001'),
(10, 3, 85, 22.48, 60, 23.77, 66, 14, 16, 3, 34, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:13', '2024-05-13 05:48:14', '197508082009121001'),
(11, 4, 129, 11.18, 50, 13.05, 124, 15, 2, 0, 36, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:14', '2024-05-13 05:48:19', '197508082009121001'),
(12, 5, 163, 74.83, 68, 81.35, 111, 36, 19, 10, 38, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:14', '2024-05-13 05:48:25', '197508082009121001'),
(13, 6, 96, 9.61, 122, 27.13, 111, 52, 15, 8, 8, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:14', '2024-05-13 05:48:31', '197508082009121001'),
(14, 7, 71, 6.43, 54, 6.82, 95, 12, 10, 2, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-04-15 23:04:15', '2024-05-13 05:48:37', '197508082009121001');

-- --------------------------------------------------------

--
-- Table structure for table `td_detail_berita`
--

CREATE TABLE `td_detail_berita` (
  `id` int NOT NULL,
  `id_berita` int NOT NULL DEFAULT '0',
  `foto` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caption` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ts` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `id_role` int UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `profile_photo_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', '197508082009121001', 'admin@argon.com', '2022-03-03 17:48:26', '$2y$10$TFJ48wovNDrHn0RPPnaiseJfw8tJjalHEKtVEnI76XppGuT5BsNP6', NULL, NULL, NULL, 'uoqorjLHpMrbOcaIIGi1fuSrm8WIYu4u5rCnTDkwvvSVdkoJd4C6Of0WSLi8', '20240128144132.png', '2022-03-03 17:48:26', '2024-02-20 11:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `wil_administrasi`
--

CREATE TABLE `wil_administrasi` (
  `id` int NOT NULL,
  `id_wilayah` int NOT NULL DEFAULT '0',
  `kecamatan` int NOT NULL DEFAULT '0',
  `kelurahan` int NOT NULL DEFAULT '0',
  `desa` int NOT NULL DEFAULT '0',
  `luas` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wil_administrasi`
--

INSERT INTO `wil_administrasi` (`id`, `id_wilayah`, `kecamatan`, `kelurahan`, `desa`, `luas`, `created_at`, `updated_at`, `tahun`, `username`) VALUES
(1, 1, 1, 0, 0, '0.00', '2024-04-19 02:55:03', '2024-04-22 00:25:53', 2023, '197508082009121001'),
(2, 2, 0, 1, 0, '0.00', '2024-04-19 02:55:03', '2024-04-22 02:00:59', 2023, '197508082009121001'),
(3, 3, 0, 0, 1, '0.00', '2024-04-19 02:55:04', '2024-04-22 02:01:05', 2023, '197508082009121001'),
(4, 4, 0, 0, 0, '1.00', '2024-04-19 02:55:04', '2024-04-22 02:01:10', 2023, '197508082009121001'),
(5, 5, 0, 0, 0, '0.00', '2024-04-19 02:55:04', '2024-04-19 02:55:04', 2023, '197508082009121001'),
(6, 6, 0, 0, 0, '0.00', '2024-04-19 02:55:04', '2024-04-19 02:55:04', 2023, '197508082009121001'),
(7, 7, 0, 0, 0, '0.00', '2024-04-19 02:55:06', '2024-04-19 02:55:06', 2023, '197508082009121001'),
(8, 1, 7, 42, 0, '0.00', '2024-05-07 02:35:05', '2024-05-07 03:00:56', 2022, '197508082009121001'),
(9, 2, 8, 19, 62, '0.00', '2024-05-07 02:35:05', '2024-05-07 03:02:21', 2022, '197508082009121001'),
(10, 3, 6, 7, 56, '0.00', '2024-05-07 02:35:06', '2024-05-07 03:02:25', 2022, '197508082009121001'),
(11, 4, 6, 4, 60, '0.00', '2024-05-07 02:35:06', '2024-05-07 03:02:31', 2022, '197508082009121001'),
(12, 5, 8, 3, 50, '0.00', '2024-05-07 02:35:06', '2024-05-07 03:02:36', 2022, '197508082009121001'),
(13, 6, 5, 7, 42, '0.00', '2024-05-07 02:35:06', '2024-05-07 03:02:41', 2022, '197508082009121001'),
(14, 7, 7, 0, 39, '0.00', '2024-05-07 02:35:06', '2024-05-07 03:02:46', 2022, '197508082009121001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD KEY `id` (`id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_unique` (`kode`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_modul` (`nama_modul`(191)),
  ADD KEY `modul_type_id` (`modul_type_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `modul_type`
--
ALTER TABLE `modul_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panggol`
--
ALTER TABLE `panggol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD KEY `role_user_id_role_foreign` (`id_role`) USING BTREE,
  ADD KEY `modul_id_modul_foreign` (`id_modul`) USING BTREE;

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bmn`
--
ALTER TABLE `tb_bmn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daftarbaru`
--
ALTER TABLE `tb_daftarbaru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daftartunggu`
--
ALTER TABLE `tb_daftartunggu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fkub`
--
ALTER TABLE `tb_fkub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_haji`
--
ALTER TABLE `tb_haji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_honorer`
--
ALTER TABLE `tb_honorer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_belanja`
--
ALTER TABLE `tb_jenis_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kbihu`
--
ALTER TABLE `tb_kbihu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kua`
--
ALTER TABLE `tb_kua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lay_ptsp`
--
ALTER TABLE `tb_lay_ptsp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_madrasah`
--
ALTER TABLE `tb_madrasah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_non_pns`
--
ALTER TABLE `tb_non_pns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ormas`
--
ALTER TABLE `tb_ormas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_buddha`
--
ALTER TABLE `tb_penyuluh_buddha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_hindu`
--
ALTER TABLE `tb_penyuluh_hindu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_islam`
--
ALTER TABLE `tb_penyuluh_islam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_katolik`
--
ALTER TABLE `tb_penyuluh_katolik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_khonghucu`
--
ALTER TABLE `tb_penyuluh_khonghucu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_kristen`
--
ALTER TABLE `tb_penyuluh_kristen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyuluh_tunjangan`
--
ALTER TABLE `tb_penyuluh_tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pns`
--
ALTER TABLE `tb_pns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pns_ijinbljr`
--
ALTER TABLE `tb_pns_ijinbljr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pns_naikpkt`
--
ALTER TABLE `tb_pns_naikpkt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pns_pensiun`
--
ALTER TABLE `tb_pns_pensiun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pns_tugasbljr`
--
ALTER TABLE `tb_pns_tugasbljr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_qori`
--
ALTER TABLE `tb_qori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_realisasi_belanja`
--
ALTER TABLE `tb_realisasi_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_realisasi_dana`
--
ALTER TABLE `tb_realisasi_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_realisasi_program`
--
ALTER TABLE `tb_realisasi_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rmh_ibadah`
--
ALTER TABLE `tb_rmh_ibadah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sumberdana`
--
ALTER TABLE `tb_sumberdana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tipo_masjid`
--
ALTER TABLE `tb_tipo_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unitprogram`
--
ALTER TABLE `tb_unitprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wakaf`
--
ALTER TABLE `tb_wakaf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_detail_berita`
--
ALTER TABLE `td_detail_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `user_name` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `wil_administrasi`
--
ALTER TABLE `wil_administrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kabkota`
--
ALTER TABLE `kabkota`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `modul_type`
--
ALTER TABLE `modul_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bmn`
--
ALTER TABLE `tb_bmn`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_daftarbaru`
--
ALTER TABLE `tb_daftarbaru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_daftartunggu`
--
ALTER TABLE `tb_daftartunggu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_fkub`
--
ALTER TABLE `tb_fkub`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_haji`
--
ALTER TABLE `tb_haji`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_honorer`
--
ALTER TABLE `tb_honorer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_jenis_belanja`
--
ALTER TABLE `tb_jenis_belanja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kbihu`
--
ALTER TABLE `tb_kbihu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kua`
--
ALTER TABLE `tb_kua`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_lay_ptsp`
--
ALTER TABLE `tb_lay_ptsp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_ormas`
--
ALTER TABLE `tb_ormas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_buddha`
--
ALTER TABLE `tb_penyuluh_buddha`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_hindu`
--
ALTER TABLE `tb_penyuluh_hindu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_islam`
--
ALTER TABLE `tb_penyuluh_islam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_katolik`
--
ALTER TABLE `tb_penyuluh_katolik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_khonghucu`
--
ALTER TABLE `tb_penyuluh_khonghucu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_kristen`
--
ALTER TABLE `tb_penyuluh_kristen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penyuluh_tunjangan`
--
ALTER TABLE `tb_penyuluh_tunjangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pns`
--
ALTER TABLE `tb_pns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_pns_ijinbljr`
--
ALTER TABLE `tb_pns_ijinbljr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pns_naikpkt`
--
ALTER TABLE `tb_pns_naikpkt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pns_pensiun`
--
ALTER TABLE `tb_pns_pensiun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pns_tugasbljr`
--
ALTER TABLE `tb_pns_tugasbljr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_qori`
--
ALTER TABLE `tb_qori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_realisasi_belanja`
--
ALTER TABLE `tb_realisasi_belanja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_realisasi_dana`
--
ALTER TABLE `tb_realisasi_dana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_realisasi_program`
--
ALTER TABLE `tb_realisasi_program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_rmh_ibadah`
--
ALTER TABLE `tb_rmh_ibadah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_sumberdana`
--
ALTER TABLE `tb_sumberdana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tipo_masjid`
--
ALTER TABLE `tb_tipo_masjid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_unitprogram`
--
ALTER TABLE `tb_unitprogram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_wakaf`
--
ALTER TABLE `tb_wakaf`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `td_detail_berita`
--
ALTER TABLE `td_detail_berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wil_administrasi`
--
ALTER TABLE `wil_administrasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
