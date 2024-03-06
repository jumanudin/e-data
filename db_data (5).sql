-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Membuang data untuk tabel db_data.account_status: 5 rows
/*!40000 ALTER TABLE `account_status` DISABLE KEYS */;
INSERT INTO `account_status` (`status_id`, `status_code`, `status_name`) VALUES
	(1, 1, 'Online'),
	(2, 2, 'Suspend'),
	(3, 3, 'Banned'),
	(4, 4, 'Deleted'),
	(5, 0, 'Offline');
/*!40000 ALTER TABLE `account_status` ENABLE KEYS */;

-- Membuang data untuk tabel db_data.agama: ~6 rows (lebih kurang)
INSERT INTO `agama` (`id`, `agama`) VALUES
	(1, 'Islam'),
	(2, 'Kristen'),
	(3, 'Katolik'),
	(4, 'Hindu'),
	(5, 'Budh'),
	(6, 'Konghucu');

-- Membuang data untuk tabel db_data.failed_jobs: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.kabkota: ~7 rows (lebih kurang)
INSERT INTO `kabkota` (`id`, `kode`, `nama`, `ibukota`, `created_at`, `updated_at`) VALUES
	(1, 'KD01', 'Kota Pangkalpinang', 'Pangkalpinang', '2021-07-06 09:46:19', '2024-02-22 07:41:02'),
	(2, 'KD02', 'Kabupaten Bangka', 'Sungailiat', '2021-07-07 06:07:30', '2021-07-07 06:07:30'),
	(3, 'KD03', 'Kabupaten Bangka Barat', 'Muntok', '2021-07-07 06:12:08', '2021-07-07 06:12:08'),
	(4, 'KD04', 'Kabupaten Bangka Tengah', 'Koba', '2021-12-30 02:07:59', '2024-02-24 09:05:00'),
	(5, 'KD05', 'Kabupaten Bangka Selatan', 'Toboali', '2021-12-30 02:08:32', '2024-03-01 10:58:56'),
	(6, 'KD06', 'Kabupaten Belitung', 'Tanjung Pandan', '2021-12-30 02:08:56', '2021-12-30 02:08:56'),
	(7, 'KD07', 'Kabupaten Belitung Timur', 'Manggar', '2021-12-30 02:09:32', '2021-12-30 02:09:32');

-- Membuang data untuk tabel db_data.kecamatan: ~176 rows (lebih kurang)
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

-- Membuang data untuk tabel db_data.logs: ~232 rows (lebih kurang)
INSERT INTO `logs` (`id`, `modul`, `event`, `trn_id`, `user_id`, `user_name`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:02:17', '2024-03-01 11:02:17'),
	(2, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 6, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:02:34', '2024-03-01 11:02:34'),
	(3, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 5, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:03:49', '2024-03-01 11:03:49'),
	(4, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:06:30', '2024-03-01 11:06:30'),
	(5, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:06:43', '2024-03-01 11:06:43'),
	(6, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:06:56', '2024-03-01 11:06:56'),
	(7, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:07:07', '2024-03-01 11:07:07'),
	(8, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:07:16', '2024-03-01 11:07:16'),
	(9, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:07:28', '2024-03-01 11:07:28'),
	(10, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:07:38', '2024-03-01 11:07:38'),
	(11, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 11:07:44', '2024-03-01 11:07:44'),
	(12, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 21:49:19', '2024-03-01 21:49:19'),
	(13, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 21:49:36', '2024-03-01 21:49:36'),
	(14, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 21:54:55', '2024-03-01 21:54:55'),
	(15, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 21:55:09', '2024-03-01 21:55:09'),
	(16, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 21:55:19', '2024-03-01 21:55:19'),
	(17, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:11:05', '2024-03-01 22:11:05'),
	(18, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:11:17', '2024-03-01 22:11:17'),
	(19, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:42:00', '2024-03-01 22:42:00'),
	(20, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:42:17', '2024-03-01 22:42:17'),
	(21, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:44:18', '2024-03-01 22:44:18'),
	(22, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:47:14', '2024-03-01 22:47:14'),
	(23, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:47:23', '2024-03-01 22:47:23'),
	(24, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:48:04', '2024-03-01 22:48:04'),
	(25, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:49:59', '2024-03-01 22:49:59'),
	(26, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:50:34', '2024-03-01 22:50:34'),
	(27, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:50:46', '2024-03-01 22:50:46'),
	(28, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:50:57', '2024-03-01 22:50:57'),
	(29, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:51:41', '2024-03-01 22:51:41'),
	(30, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:51:57', '2024-03-01 22:51:57'),
	(31, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:06', '2024-03-01 22:52:06'),
	(32, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:17', '2024-03-01 22:52:17'),
	(33, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:25', '2024-03-01 22:52:25'),
	(34, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:36', '2024-03-01 22:52:36'),
	(35, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:44', '2024-03-01 22:52:44'),
	(36, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:50', '2024-03-01 22:52:50'),
	(37, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:52:57', '2024-03-01 22:52:57'),
	(38, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:53:09', '2024-03-01 22:53:09'),
	(39, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 22:55:39', '2024-03-01 22:55:39'),
	(40, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:00:08', '2024-03-01 23:00:08'),
	(41, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:00:19', '2024-03-01 23:00:19'),
	(42, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:00:30', '2024-03-01 23:00:30'),
	(43, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:00:38', '2024-03-01 23:00:38'),
	(44, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:01:26', '2024-03-01 23:01:26'),
	(45, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:01:33', '2024-03-01 23:01:33'),
	(46, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:01:48', '2024-03-01 23:01:48'),
	(47, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 5, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:01:55', '2024-03-01 23:01:55'),
	(48, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:02:39', '2024-03-01 23:02:39'),
	(49, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:02:48', '2024-03-01 23:02:48'),
	(50, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:06:00', '2024-03-01 23:06:00'),
	(51, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:06:07', '2024-03-01 23:06:07'),
	(52, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:06:18', '2024-03-01 23:06:18'),
	(53, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:06:55', '2024-03-01 23:06:55'),
	(54, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:07:52', '2024-03-01 23:07:52'),
	(55, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:32:18', '2024-03-01 23:32:18'),
	(56, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:32:25', '2024-03-01 23:32:25'),
	(57, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:32:34', '2024-03-01 23:32:34'),
	(58, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:32:43', '2024-03-01 23:32:43'),
	(59, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:32:52', '2024-03-01 23:32:52'),
	(60, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-01 23:33:03', '2024-03-01 23:33:03'),
	(61, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 00:19:39', '2024-03-02 00:19:39'),
	(62, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 00:19:52', '2024-03-02 00:19:52'),
	(63, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:09:48', '2024-03-02 01:09:48'),
	(64, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:09:57', '2024-03-02 01:09:57'),
	(65, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:42:00', '2024-03-02 01:42:00'),
	(66, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:42:18', '2024-03-02 01:42:18'),
	(67, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:42:57', '2024-03-02 01:42:57'),
	(68, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:49:44', '2024-03-02 01:49:44'),
	(69, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:52:16', '2024-03-02 01:52:16'),
	(70, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:52:25', '2024-03-02 01:52:25'),
	(71, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:52:43', '2024-03-02 01:52:43'),
	(72, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:52:49', '2024-03-02 01:52:49'),
	(73, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:53:38', '2024-03-02 01:53:38'),
	(74, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:54:27', '2024-03-02 01:54:27'),
	(75, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 01:54:40', '2024-03-02 01:54:40'),
	(76, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 02:09:34', '2024-03-02 02:09:34'),
	(77, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-02 02:12:32', '2024-03-02 02:12:32'),
	(78, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:18:14', '2024-03-02 07:18:14'),
	(79, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:19:52', '2024-03-02 07:19:52'),
	(80, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:20:00', '2024-03-02 07:20:00'),
	(81, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:20:23', '2024-03-02 07:20:23'),
	(82, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:30:15', '2024-03-02 07:30:15'),
	(83, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:30:21', '2024-03-02 07:30:21'),
	(84, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:49:35', '2024-03-02 07:49:35'),
	(85, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:49:41', '2024-03-02 07:49:41'),
	(86, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:55:43', '2024-03-02 07:55:43'),
	(87, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:57:26', '2024-03-02 07:57:26'),
	(88, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:58:56', '2024-03-02 07:58:56'),
	(89, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:59:02', '2024-03-02 07:59:02'),
	(90, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:59:11', '2024-03-02 07:59:11'),
	(91, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 07:59:20', '2024-03-02 07:59:20'),
	(92, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:03:09', '2024-03-02 08:03:09'),
	(93, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 5, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:03:15', '2024-03-02 08:03:15'),
	(94, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:03:50', '2024-03-02 08:03:50'),
	(95, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:04:57', '2024-03-02 08:04:57'),
	(96, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:05:07', '2024-03-02 08:05:07'),
	(97, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:08:31', '2024-03-02 08:08:31'),
	(98, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:13:47', '2024-03-02 08:13:47'),
	(99, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:13:54', '2024-03-02 08:13:54'),
	(100, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 5, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:14:02', '2024-03-02 08:14:02'),
	(101, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:15:17', '2024-03-02 08:15:17'),
	(102, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:07', '2024-03-02 08:25:07'),
	(103, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:12', '2024-03-02 08:25:12'),
	(104, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:18', '2024-03-02 08:25:18'),
	(105, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:24', '2024-03-02 08:25:24'),
	(106, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:31', '2024-03-02 08:25:31'),
	(107, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:43', '2024-03-02 08:25:43'),
	(108, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 6, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:25:52', '2024-03-02 08:25:52'),
	(109, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 5, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:29:03', '2024-03-02 08:29:03'),
	(110, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:30:46', '2024-03-02 08:30:46'),
	(111, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:31:24', '2024-03-02 08:31:24'),
	(112, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:32:13', '2024-03-02 08:32:13'),
	(113, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:32:36', '2024-03-02 08:32:36'),
	(114, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:34:58', '2024-03-02 08:34:58'),
	(115, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:35:04', '2024-03-02 08:35:04'),
	(116, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:36:36', '2024-03-02 08:36:36'),
	(117, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:36:46', '2024-03-02 08:36:46'),
	(118, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 08:39:34', '2024-03-02 08:39:34'),
	(119, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:02:24', '2024-03-02 09:02:24'),
	(120, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:02:29', '2024-03-02 09:02:29'),
	(121, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:03:03', '2024-03-02 09:03:03'),
	(122, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:05:58', '2024-03-02 09:05:58'),
	(123, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:06:05', '2024-03-02 09:06:05'),
	(124, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:06:50', '2024-03-02 09:06:50'),
	(125, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:08:21', '2024-03-02 09:08:21'),
	(126, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:08:25', '2024-03-02 09:08:25'),
	(127, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:53:07', '2024-03-02 09:53:07'),
	(128, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:53:12', '2024-03-02 09:53:12'),
	(129, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 09:59:25', '2024-03-02 09:59:25'),
	(130, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:11:40', '2024-03-02 10:11:40'),
	(131, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:11:47', '2024-03-02 10:11:47'),
	(132, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:12:13', '2024-03-02 10:12:13'),
	(133, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:04', '2024-03-02 10:33:04'),
	(134, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:12', '2024-03-02 10:33:12'),
	(135, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:18', '2024-03-02 10:33:18'),
	(136, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:25', '2024-03-02 10:33:25'),
	(137, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:33', '2024-03-02 10:33:33'),
	(138, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:41', '2024-03-02 10:33:41'),
	(139, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:47', '2024-03-02 10:33:47'),
	(140, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:33:51', '2024-03-02 10:33:51'),
	(141, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:34:00', '2024-03-02 10:34:00'),
	(142, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:34:07', '2024-03-02 10:34:07'),
	(143, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:34:12', '2024-03-02 10:34:12'),
	(144, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:34:23', '2024-03-02 10:34:23'),
	(145, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:34:34', '2024-03-02 10:34:34'),
	(146, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:39:35', '2024-03-02 10:39:35'),
	(147, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:39:42', '2024-03-02 10:39:42'),
	(148, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:39:46', '2024-03-02 10:39:46'),
	(149, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:39:49', '2024-03-02 10:39:49'),
	(150, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:39:58', '2024-03-02 10:39:58'),
	(151, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:40:07', '2024-03-02 10:40:07'),
	(152, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:40:16', '2024-03-02 10:40:16'),
	(153, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:40:26', '2024-03-02 10:40:26'),
	(154, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:40:36', '2024-03-02 10:40:36'),
	(155, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:47:57', '2024-03-02 10:47:57'),
	(156, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:48:55', '2024-03-02 10:48:55'),
	(157, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:49:01', '2024-03-02 10:49:01'),
	(158, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:49:40', '2024-03-02 10:49:40'),
	(159, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:49:52', '2024-03-02 10:49:52'),
	(160, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:49:59', '2024-03-02 10:49:59'),
	(161, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:50:09', '2024-03-02 10:50:09'),
	(162, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:50:28', '2024-03-02 10:50:28'),
	(163, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:54:26', '2024-03-02 10:54:26'),
	(164, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:54:33', '2024-03-02 10:54:33'),
	(165, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:54:40', '2024-03-02 10:54:40'),
	(166, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:54:47', '2024-03-02 10:54:47'),
	(167, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 10:56:23', '2024-03-02 10:56:23'),
	(168, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-02 11:02:03', '2024-03-02 11:02:03'),
	(169, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 11:24:03', '2024-03-02 11:24:03'),
	(170, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 11:24:13', '2024-03-02 11:24:13'),
	(171, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-02 11:27:22', '2024-03-02 11:27:22'),
	(172, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-02 11:27:27', '2024-03-02 11:27:27'),
	(173, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:03:04', '2024-03-03 03:03:04'),
	(174, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:03:12', '2024-03-03 03:03:12'),
	(175, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:03:20', '2024-03-03 03:03:20'),
	(176, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:03:28', '2024-03-03 03:03:28'),
	(177, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:03:35', '2024-03-03 03:03:35'),
	(178, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:03:40', '2024-03-03 03:03:40'),
	(179, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:06:21', '2024-03-03 03:06:21'),
	(180, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:06:51', '2024-03-03 03:06:51'),
	(181, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:07:00', '2024-03-03 03:07:00'),
	(182, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:07:06', '2024-03-03 03:07:06'),
	(183, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:09:07', '2024-03-03 03:09:07'),
	(184, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:09:14', '2024-03-03 03:09:14'),
	(185, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:09:22', '2024-03-03 03:09:22'),
	(186, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:09:32', '2024-03-03 03:09:32'),
	(187, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:19:17', '2024-03-03 03:19:17'),
	(188, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:20:42', '2024-03-03 03:20:42'),
	(189, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 03:21:27', '2024-03-03 03:21:27'),
	(190, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 07:24:31', '2024-03-03 07:24:31'),
	(191, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 07:24:40', '2024-03-03 07:24:40'),
	(193, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 07:29:34', '2024-03-03 07:29:34'),
	(194, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 07:29:44', '2024-03-03 07:29:44'),
	(195, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 07:33:48', '2024-03-03 07:33:48'),
	(196, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 07:33:56', '2024-03-03 07:33:56'),
	(197, 'Modul  - Modul System', 'Create Data', 12, 1, 'Administrator', 'admin@argon.com', '2024-03-03 19:09:09', '2024-03-03 19:09:09'),
	(198, 'Modul - Modul System', 'Update Data', 8, 1, 'Administrator', 'admin@argon.com', '2024-03-03 19:17:15', '2024-03-03 19:17:15'),
	(199, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-03 21:59:42', '2024-03-03 21:59:42'),
	(200, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 00:10:23', '2024-03-04 00:10:23'),
	(201, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-04 17:44:36', '2024-03-04 17:44:36'),
	(202, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 17:48:24', '2024-03-04 17:48:24'),
	(203, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:01:17', '2024-03-04 18:01:17'),
	(204, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:01:24', '2024-03-04 18:01:24'),
	(205, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:01:34', '2024-03-04 18:01:34'),
	(206, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:35:03', '2024-03-04 18:35:03'),
	(207, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:38:50', '2024-03-04 18:38:50'),
	(208, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:39:34', '2024-03-04 18:39:34'),
	(209, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:40:46', '2024-03-04 18:40:46'),
	(210, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:41:03', '2024-03-04 18:41:03'),
	(211, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:47:49', '2024-03-04 18:47:49'),
	(212, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:52:44', '2024-03-04 18:52:44'),
	(213, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:53:44', '2024-03-04 18:53:44'),
	(214, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:53:55', '2024-03-04 18:53:55'),
	(215, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:56:17', '2024-03-04 18:56:17'),
	(216, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-04 18:56:30', '2024-03-04 18:56:30'),
	(217, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:00:14', '2024-03-04 19:00:14'),
	(218, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:00:20', '2024-03-04 19:00:20'),
	(219, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:01:12', '2024-03-04 19:01:12'),
	(220, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:01:32', '2024-03-04 19:01:32'),
	(221, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 4, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:01:41', '2024-03-04 19:01:41'),
	(222, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 8, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:02:01', '2024-03-04 19:02:01'),
	(223, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:02:14', '2024-03-04 19:02:14'),
	(224, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:11:03', '2024-03-04 19:11:03'),
	(225, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:11:10', '2024-03-04 19:11:10'),
	(226, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:11:16', '2024-03-04 19:11:16'),
	(227, 'Modul Layanan Madrasah RA', 'Update Data Jumlah RA', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:11:22', '2024-03-04 19:11:22'),
	(228, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:16:55', '2024-03-04 19:16:55'),
	(229, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:20:19', '2024-03-04 19:20:19'),
	(230, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:32:33', '2024-03-04 19:32:33'),
	(231, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 8, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:33:47', '2024-03-04 19:33:47'),
	(232, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi RA', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:35:55', '2024-03-04 19:35:55'),
	(233, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-04 19:37:24', '2024-03-04 19:37:24'),
	(234, 'Modul  - Modul System', 'Create Data', 12, 1, 'Administrator', 'admin@argon.com', '2024-03-04 23:50:58', '2024-03-04 23:50:58'),
	(235, 'Modul  - Modul System', 'Create Data', 13, 1, 'Administrator', 'admin@argon.com', '2024-03-04 23:51:42', '2024-03-04 23:51:42'),
	(236, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-05 01:25:23', '2024-03-05 01:25:23'),
	(237, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 01:26:03', '2024-03-05 01:26:03'),
	(238, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-05 01:26:18', '2024-03-05 01:26:18'),
	(239, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:07:47', '2024-03-05 02:07:47'),
	(240, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:08:04', '2024-03-05 02:08:04'),
	(241, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:09:03', '2024-03-05 02:09:03'),
	(242, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 8, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:09:12', '2024-03-05 02:09:12'),
	(243, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:09:43', '2024-03-05 02:09:43'),
	(244, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:09:49', '2024-03-05 02:09:49'),
	(245, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:10:20', '2024-03-05 02:10:20'),
	(246, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 8, 1, 'Administrator', 'admin@argon.com', '2024-03-05 02:10:28', '2024-03-05 02:10:28'),
	(247, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 1, 1, 'Administrator', 'admin@argon.com', '2024-03-05 05:40:45', '2024-03-05 05:40:45'),
	(248, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 7, 1, 'Administrator', 'admin@argon.com', '2024-03-05 05:40:57', '2024-03-05 05:40:57'),
	(249, 'Modul Layanan Madrasah RA', 'Update Data Akreditasi MI', 6, 1, 'Administrator', 'admin@argon.com', '2024-03-05 05:41:08', '2024-03-05 05:41:08'),
	(250, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 09:33:32', '2024-03-05 09:33:32'),
	(251, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 09:34:05', '2024-03-05 09:34:05'),
	(252, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-05 09:34:27', '2024-03-05 09:34:27'),
	(253, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 09:36:04', '2024-03-05 09:36:04'),
	(254, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 3, 1, 'Administrator', 'admin@argon.com', '2024-03-05 09:36:09', '2024-03-05 09:36:09'),
	(255, 'Modul Layanan Madrasah MI', 'Update Data Status Guru MI', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 09:36:31', '2024-03-05 09:36:31'),
	(256, 'Modul  - Modul System', 'Create Data', 14, 1, 'Administrator', 'admin@argon.com', '2024-03-05 18:29:12', '2024-03-05 18:29:12'),
	(257, 'Modul Layanan Madrasah RA', 'Update Data Status Guru RA', 2, 1, 'Administrator', 'admin@argon.com', '2024-03-05 19:33:30', '2024-03-05 19:33:30');

-- Membuang data untuk tabel db_data.menu_type: ~6 rows (lebih kurang)
INSERT INTO `menu_type` (`id`, `menu_name`, `created_at`, `updated_at`) VALUES
	(1, 'Menu Admin', NULL, NULL),
	(2, 'Menu Umum', NULL, NULL),
	(3, 'Menu Arsip', NULL, NULL),
	(4, 'Menu Agenda', NULL, NULL),
	(5, 'Menu Cuti', NULL, NULL),
	(6, 'Menu Perjadin', '2023-12-05 02:22:53', '2023-12-05 02:22:53');

-- Membuang data untuk tabel db_data.migrations: ~7 rows (lebih kurang)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2014_10_12_100000_create_password_reset_tokens_table', 2),
	(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(7, '2024_01_20_181726_create_sessions_table', 2);

-- Membuang data untuk tabel db_data.modul: ~11 rows (lebih kurang)
INSERT INTO `modul` (`id`, `nama_modul`, `nama_menu`, `modul_type_id`, `menu_id`, `created_at`, `updated_at`) VALUES
	(1, 'role_user', 'Level User', 1, 1, '2023-12-01 03:47:30', '2023-12-01 03:47:30'),
	(2, 'data_user', 'Data User', 1, 1, '2023-12-01 03:47:36', '2023-12-01 03:47:36'),
	(3, 'role_permission', 'Role Permission', 1, 1, '2023-12-01 03:47:40', '2023-12-01 03:47:40'),
	(4, 'modul_name', 'Modul Aplikasi', 1, 1, '2023-11-23 07:51:30', '2023-11-23 07:51:30'),
	(5, 'city', 'Kabupaten / Kota', 2, 1, '2024-02-07 07:00:33', '2024-02-07 07:00:33'),
	(6, 'laymad_ra', 'Layanan Madrasah RA', 3, 1, '2024-02-21 02:34:33', '2024-02-21 02:34:33'),
	(7, 'laymad_akra', 'Layanan Akreditasi RA', 3, 1, '2024-02-26 03:28:18', '2024-02-26 03:28:18'),
	(8, 'laymad_gra', 'Layanan Data Guru RA', 3, 1, '2024-03-04 02:17:15', '2024-03-03 19:17:15'),
	(9, 'logs', 'Logs System', 1, 2, '2023-12-05 02:27:27', '2023-12-05 02:27:27'),
	(10, 'pegawai', 'Guru dan Tendik', 2, 1, '2023-12-05 08:53:16', '2023-12-05 08:53:16'),
	(11, 'utility', 'Setting System', 1, 1, '2023-12-04 03:56:30', '2023-12-04 03:56:30'),
	(12, 'laymad_akmi', 'Layanan Data MI', 3, 1, '2024-03-04 23:50:58', '2024-03-04 23:50:58'),
	(13, 'laymad_gmi', 'Layanan Data Guru MI', 3, 1, '2024-03-04 23:51:42', '2024-03-04 23:51:42'),
	(14, 'laymad_gsertifikat', 'Layanan Data Sertifikasi Guru', 3, 1, '2024-03-05 18:29:11', '2024-03-05 18:29:11');

-- Membuang data untuk tabel db_data.modul_type: ~4 rows (lebih kurang)
INSERT INTO `modul_type` (`id`, `modul_type`, `created_at`, `updated_at`) VALUES
	(1, 'System', '2021-07-22 15:24:28', '2021-07-22 15:24:28'),
	(2, 'Master Data', '2021-07-22 15:24:39', '2021-07-22 15:24:39'),
	(3, 'Transaksi Data', '2021-07-22 15:24:44', '2021-07-22 15:24:44'),
	(4, 'Report', '2021-11-17 17:58:25', '2021-11-17 17:58:25');

-- Membuang data untuk tabel db_data.password_resets: ~2 rows (lebih kurang)
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('obelstones@gmail.com', '$2y$10$pijyVQUSvWn1usCI690sVuTZfOZMGbzCRu3kbA8Ll/cS1GJqtsZgG', '2022-04-02 23:52:31'),
	('satria@gmail.com', '$2y$10$0qMk7sDgi6aDrKzNcR.qK.AIXc..kgolmjnPH49Xij1XxgGbHY06.', '2022-04-03 00:34:18');

-- Membuang data untuk tabel db_data.password_reset_tokens: ~1 rows (lebih kurang)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('rakha.dj@gmail.com', '$2y$10$SwGg9RtJiUNgKawoZfpPzuJT3u86m29.BFFWVo0Nv5PMQ47m9jvZK', '2024-02-04 00:17:35');

-- Membuang data untuk tabel db_data.personal_access_tokens: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.role_permission: ~19 rows (lebih kurang)
INSERT INTO `role_permission` (`id_role`, `id_modul`, `l`, `d`, `t`, `u`, `h`, `created_at`, `updated_at`) VALUES
	(2, 1, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 2, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 3, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 4, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 5, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 9, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 10, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(2, 11, 0, 0, 0, 0, 0, '2024-02-07 00:33:04', '2024-02-07 00:33:04'),
	(1, 1, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 2, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 3, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 4, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 5, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 6, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 7, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 8, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 9, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 10, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 11, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 12, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 13, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42'),
	(1, 14, 1, 1, 1, 1, 1, '2024-03-05 18:29:42', '2024-03-05 18:29:42');

-- Membuang data untuk tabel db_data.role_user: ~5 rows (lebih kurang)
INSERT INTO `role_user` (`id`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2024-03-06 01:29:41', '2024-03-05 18:29:41'),
	(2, 'Manager', '2024-02-04 09:29:34', '2024-02-04 02:29:34'),
	(3, 'Verifikator', '2023-09-13 01:36:46', '2023-09-12 18:36:46'),
	(4, 'User', '2024-01-04 07:55:24', '2024-01-04 00:55:24'),
	(5, 'Operator', '2023-04-09 13:39:35', '2023-04-09 13:39:35');

-- Membuang data untuk tabel db_data.sessions: ~3 rows (lebih kurang)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('3toQwper7uho0YOsgQAki5AJJt4giQl345Eih6zz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFJISE1Gckh6UFFhbDRodVJJWlFPU212dXVUcEFESHNVSTVQeURIaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705780653),
	('8TTxfD7a2xAPutumt0VhbTmRgp78QpqJwhymhamB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiODZzWjhKR0oxcjc2a0xONWI4ZnZaU0NoRmttb2RtSjJpN3piZUllTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcwNTc3NzM3MTt9czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVEZKNDh3b3ZORHJIbjBSUFBuYWlzZUpmdzh0SmphbEhFS3RWRW5JNzZYcHBHdVQ1QnNOUDYiO30=', 1705780177),
	('ItG0n73FZnadY2Fm7FZJb0IbEcuNSsHqmVEwxDyB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicnZ6WnJsN1B6TmdXNkpvRU93R3MzVEY5U2s2WFB2dWhhRXI4RFdNMSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MDU3ODAzNTE7fX0=', 1705780642);

-- Membuang data untuk tabel db_data.struktur: ~1 rows (lebih kurang)
INSERT INTO `struktur` (`id`, `nama_pimpinan`, `lokasi_kantor`, `ttd`, `t_1`, `t_2`, `t_3`, `t_4`, `t_5`, `verifikator`, `tahun_periode`, `updated_at`) VALUES
	(1, 'Helmi', 'Padang', '', 'KEMENTERIAN AGAMA REPUBLIK INDONESIA', 'KANTOR WILAYAH KEMENTERIAN AGAMA', 'PROVINSI SUMATERA BARAT', 'Jl. Kuni No. 79 B (0751) 21686 â€“ 28220 Fax. (0751) 22583', 'Website http://sumbar.kemenag.go.id | email : kanwilsumbar@kemenag.go.id', '196608021994031002', 2025, '2024-03-06 02:53:32');

-- Membuang data untuk tabel db_data.tb_akma: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_akmi: ~0 rows (lebih kurang)
INSERT INTO `tb_akmi` (`id`, `id_wilayah`, `akmin_a`, `akmin_b`, `akmin_c`, `akmin_belum`, `akmis_a`, `akmis_b`, `akmis_c`, `akmis_belum`, `tahun`, `username`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2023, '197508082009121001', '2024-03-05 00:16:21', '2024-03-05 01:25:23'),
	(2, 2, 1, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-05 00:16:21', '2024-03-05 01:26:03'),
	(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-05 00:16:21', '2024-03-05 00:16:21'),
	(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-05 00:16:22', '2024-03-05 00:16:22'),
	(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-05 00:16:22', '2024-03-05 00:16:22'),
	(6, 6, 1, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-05 00:16:22', '2024-03-05 05:41:08'),
	(7, 7, 1, 0, 0, 0, 1, 1, 0, 0, 2023, '197508082009121001', '2024-03-05 00:16:22', '2024-03-05 05:40:57'),
	(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33'),
	(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33'),
	(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33'),
	(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33'),
	(12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33'),
	(13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33'),
	(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 2025, '197508082009121001', '2024-03-05 19:55:33', '2024-03-05 19:55:33');

-- Membuang data untuk tabel db_data.tb_akmts: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_akra: ~21 rows (lebih kurang)
INSERT INTO `tb_akra` (`id`, `id_wilayah`, `a`, `b`, `c`, `belum`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
	(1, 1, 11, 2, 2, 2, 2023, '2024-03-05 01:01:34', '2024-03-04 18:01:34', '197508082009121001'),
	(2, 2, 2, 1, 1, 1, 2023, '2024-03-02 05:52:36', '2024-03-01 22:52:36', '197508082009121001'),
	(3, 3, 2, 0, 1, 1, 2023, '2024-03-03 10:03:20', '2024-03-03 03:03:20', '197508082009121001'),
	(4, 4, 1, 1, 1, 1, 2023, '2024-03-01 18:06:56', '2024-03-01 11:06:56', '197508082009121001'),
	(5, 5, 1, 1, 1, 1, 2023, '2024-03-01 18:03:49', '2024-03-01 11:03:49', '197508082009121001'),
	(6, 6, 1, 1, 1, 1, 2023, '2024-03-01 18:02:34', '2024-03-01 11:02:34', '197508082009121001'),
	(7, 7, 2, 11, 1, 1, 2023, '2024-03-03 14:24:55', '2024-03-03 07:24:55', '197508082009121001'),
	(8, 1, 0, 0, 0, 0, 2024, '2024-03-01 09:54:41', '2024-03-01 09:54:41', '197508082009121001'),
	(9, 2, 0, 0, 0, 0, 2024, '2024-03-01 09:54:41', '2024-03-01 09:54:41', '197508082009121001'),
	(10, 3, 0, 0, 0, 0, 2024, '2024-03-01 09:54:41', '2024-03-01 09:54:41', '197508082009121001'),
	(11, 4, 0, 0, 0, 0, 2024, '2024-03-01 09:54:41', '2024-03-01 09:54:41', '197508082009121001'),
	(12, 5, 0, 0, 0, 0, 2024, '2024-03-01 09:54:41', '2024-03-01 09:54:41', '197508082009121001'),
	(13, 6, 0, 0, 0, 0, 2024, '2024-03-01 09:54:42', '2024-03-01 09:54:42', '197508082009121001'),
	(14, 7, 0, 0, 0, 0, 2024, '2024-03-01 09:54:42', '2024-03-01 09:54:42', '197508082009121001'),
	(15, 1, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001'),
	(16, 2, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001'),
	(17, 3, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001'),
	(18, 4, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001'),
	(19, 5, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001'),
	(20, 6, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001'),
	(21, 7, 0, 0, 0, 0, 2025, '2024-03-05 19:54:03', '2024-03-05 19:54:03', '197508082009121001');

-- Membuang data untuk tabel db_data.tb_anggaran: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_bimbingan: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_dialog: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_fkub: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gkatolik: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gmadrasah: ~7 rows (lebih kurang)
INSERT INTO `tb_gmadrasah` (`id`, `id_wilayah`, `ra_pria`, `ra_wanita`, `ra_pns`, `ra_nonpns`, `ra_belums1`, `ra_s1`, `ra_s2`, `ra_s3`, `ra`, `min`, `mis`, `mi_belums1`, `mi_s1`, `mi_s2`, `mi_s3`, `mi_pria`, `mi_wanita`, `mi_pns`, `mi_nonpns`, `mtsn`, `mtss`, `mts_belums1`, `mts_s1`, `mts_s2`, `mts_s3`, `mts_pria`, `mts_wanita`, `mts_pns`, `mts_nonpns`, `man`, `mas`, `ma_belums1`, `ma_s1`, `ma_s2`, `ma_s3`, `ma_pria`, `ma_wanita`, `ma_pns`, `ma_nonpns`, `tahun`, `username`, `created_at`, `updated_at`) VALUES
	(2, 1, 4, 1, 0, 0, 0, 0, 0, 0, 5, 2, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-05 09:36:31'),
	(3, 2, 1, 1, 0, 0, 0, 0, 0, 0, 2, 2, 0, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-05 09:36:09'),
	(4, 3, 10, 15, 20, 5, 10, 5, 5, 5, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-04 19:01:10'),
	(5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-04 00:44:50'),
	(6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-04 00:44:50'),
	(7, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-04 00:44:50'),
	(8, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2023, '197508082009121001', '2024-03-04 00:44:50', '2024-03-04 00:44:50');

-- Membuang data untuk tabel db_data.tb_gpai: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gpend_buddha: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gpend_hindu: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gpend_katolik: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gpend_khonghucu: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gpend_kristen: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_gsertifikasi: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_haji: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_honorer: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_kua: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_lay_ptsp: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_lembaga_pontren: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_lpk_katolik: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_madrasah: ~14 rows (lebih kurang)
INSERT INTO `tb_madrasah` (`id`, `id_wilayah`, `ra`, `min`, `mis`, `mtsn`, `mtss`, `man`, `mas`, `tahun`, `created_at`, `updated_at`, `username`) VALUES
	(1, 1, 15, 1, 1, 1, 1, 0, 1, 2023, '2024-03-01 18:07:44', '2024-03-01 11:07:44', '197508082009121001'),
	(2, 2, 2, 1, 1, 1, 1, 1, 1, 2023, '2024-03-01 17:38:56', '2024-03-01 10:38:56', '197508082009121001'),
	(3, 3, 2, 0, 0, 0, 0, 0, 0, 2023, '2024-02-25 17:10:09', '2024-02-25 10:10:09', '197508082009121001'),
	(4, 4, 1, 1, 1, 1, 1, 1, 1, 2023, '2024-03-01 18:06:43', '2024-03-01 11:06:43', '197508082009121001'),
	(5, 5, 1, 2, 2, 1, 1, 1, 1, 2023, '2024-03-01 17:58:15', '2024-03-01 10:58:15', '197508082009121001'),
	(6, 6, 1, 1, 1, 1, 1, 1, 1, 2023, '2024-03-01 17:55:12', '2024-03-01 10:55:12', '197508082009121001'),
	(7, 7, 1, 1, 1, 1, 1, 0, 1, 2023, '2024-03-02 04:49:19', '2024-03-01 21:49:19', '197508082009121001'),
	(8, 1, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(9, 2, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(10, 3, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(11, 4, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(12, 5, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(13, 6, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(14, 7, 0, 0, 0, 0, 0, 0, 0, 2024, '2024-03-01 09:07:53', '2024-03-01 09:07:53', '197508082009121001'),
	(15, 1, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001'),
	(16, 2, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001'),
	(17, 3, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001'),
	(18, 4, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001'),
	(19, 5, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001'),
	(20, 6, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001'),
	(21, 7, 0, 0, 0, 0, 0, 0, 0, 2025, '2024-03-05 19:54:02', '2024-03-05 19:54:02', '197508082009121001');

-- Membuang data untuk tabel db_data.tb_majur: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_mdt: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_nikah: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_ormas: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penduduk: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_pengawas: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyelenggara: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyuluh_buddha: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyuluh_hindu: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyuluh_islam: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyuluh_katolik: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyuluh_khonghucu: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_penyuluh_kristen: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_pns: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_ptsp: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_qori: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_rmh_ibadah: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_rombel: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_ruang: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_satker: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_serti_halal: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_siswa: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_siswa_mdt: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_smi: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_smts: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_sra: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_tipo_masjid: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_wakaf: ~0 rows (lebih kurang)

-- Membuang data untuk tabel db_data.tb_wilayah: ~2 rows (lebih kurang)
INSERT INTO `tb_wilayah` (`id_wilayah`, `kd_provinsi`, `kab_kota`, `kec`, `kel`, `desa`, `luas_wilayah`) VALUES
	(1, 19, 'Kota Pangkalpinang', 7, 42, 0, 89.4),
	(2, 19, 'Kabupaten Bangka', 8, 19, 62, 2950.68);

-- Membuang data untuk tabel db_data.users: ~0 rows (lebih kurang)
INSERT INTO `users` (`id`, `id_role`, `name`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `profile_photo_url`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Administrator', '197508082009121001', 'admin@argon.com', '2022-03-04 00:48:26', '$2y$10$ZT9cElQTtbIrJ7UjqXiaM.InuxmyUlCxJxXoBkUJmogaSmb9b/qEW', NULL, NULL, NULL, 'Fxu054fc37TLDs8hGBYmEds5rn3EbNQ5o0A5XZWOeVYTLtLMtyraSe3Ff7dT', '20240128144132.png', '2022-03-04 00:48:26', '2024-02-16 02:02:44');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
