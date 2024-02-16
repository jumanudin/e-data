-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `db_data` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_data`;

DROP TABLE IF EXISTS `account_status`;
CREATE TABLE `account_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` int(1) DEFAULT NULL,
  `status_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `account_status` (`status_id`, `status_code`, `status_name`) VALUES
(1,	1,	'Online'),
(2,	2,	'Suspend'),
(3,	3,	'Banned'),
(4,	4,	'Deleted'),
(5,	0,	'Offline');

DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `agama` (`id`, `agama`) VALUES
(1,	'Islam'),
(2,	'Kristen'),
(3,	'Katolik'),
(4,	'Hindu'),
(5,	'Budh'),
(6,	'Konghucu');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1,	'Kepala Kantor Wilayah Kementerian Agama Provinsi Sumatera Barat',	'2022-03-25 02:17:27',	'2022-03-25 02:17:27'),
(2,	'Kepala Bidang Pendidikan Agama dan Keagamaan Islam',	'2022-03-25 02:17:40',	'2022-03-25 02:17:40'),
(3,	'Kepala Bidang Pendidikan Madrasah ',	'2022-03-25 02:17:50',	'2022-03-25 02:17:50'),
(4,	'Kepala Bidang Penerangan Agama Islam dan Pemberdayaan Zakat dan Wakaf',	'2023-02-21 10:23:39',	'2023-02-21 10:23:39'),
(5,	'Kepala Bidang Penyelenggaraan Haji dan Umrah',	'2023-02-21 10:24:04',	'2023-02-21 10:24:04'),
(6,	'Kepala Bagian Tata Usaha',	NULL,	NULL),
(7,	'Kepala Bidang Urusan Agama Islam',	'2023-02-21 10:28:32',	'2023-02-21 10:28:32'),
(8,	'Pembimbing Masyarakat Buddha ',	'2023-02-21 10:29:13',	'2023-02-21 10:29:13'),
(9,	'Pembimbing Masyarakat Hindu',	'2023-02-21 10:29:37',	'2023-02-21 10:29:37'),
(10,	'Pembimbing Masyarakat Katolik',	'2023-02-21 10:30:04',	'2023-02-21 10:30:04'),
(11,	'Pembimbing Masyarakat Kristen',	'2023-02-21 10:30:33',	'2023-02-21 10:30:33'),
(12,	'JFT-Pranata Komputer',	'2023-02-21 10:32:10',	'2023-02-21 10:32:10'),
(13,	'JFT-Perencana',	'2023-02-21 10:32:29',	'2023-02-21 10:32:29'),
(14,	'JFT-Penyuluh Agama Islam',	'2023-02-21 10:33:09',	'2023-02-21 10:33:09'),
(15,	'JFT-Pranata Humas',	NULL,	NULL),
(16,	'JFT-Analis Kebijakan',	NULL,	NULL),
(17,	'JFT-Arsiparis',	NULL,	NULL),
(18,	'JFT-Analis Kepegawaian/Analis SDM Aparatur',	NULL,	NULL),
(19,	'JFT-APBN',	NULL,	NULL),
(20,	'JFT-Pamong Budaya',	NULL,	NULL),
(21,	'JFT-Penggrak Swadaya Masyarakat',	NULL,	NULL),
(22,	'JFT-Analis Hukum',	NULL,	NULL),
(23,	'JFT-Pengembangan Teknologi Pembelajaran',	NULL,	NULL),
(24,	'Pelaksana',	NULL,	NULL),
(25,	'JFT-Lainnya',	NULL,	NULL),
(26,	'JFT_Penyuluh Agama Katolik',	NULL,	NULL);

DROP TABLE IF EXISTS `jenis_kelamin`;
CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) DEFAULT NULL,
  `jenis_kelamin` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `jenis_kelamin` (`id`, `kode`, `jenis_kelamin`) VALUES
(1,	'L',	'Laki - Laki'),
(2,	'P',	'Perempuan');

DROP TABLE IF EXISTS `kabkota`;
CREATE TABLE `kabkota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ibukota` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_unique` (`kode`),
  KEY `kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kabkota` (`id`, `kode`, `nama`, `ibukota`, `created_at`, `updated_at`) VALUES
(1,	'KD01',	'Kabupaten Pesisir Selatan',	'Painan',	'2021-07-06 09:46:19',	'2021-07-07 06:01:52'),
(2,	'KD02',	'Kota Solok',	'Solok',	'2021-07-07 06:07:30',	'2021-07-07 06:07:30'),
(3,	'KD03',	'Kabupaten Sijunjung',	'-',	'2021-07-07 06:12:08',	'2021-07-07 06:12:08'),
(4,	'KD04',	'Kabupaten Tanah Datar',	'Batusangkar',	'2021-12-30 02:07:59',	'2021-12-30 02:07:59'),
(5,	'KD05',	'Kabupaten Padang Pariaman',	'Pariaman',	'2021-12-30 02:08:32',	'2021-12-30 02:08:32'),
(6,	'KD06',	'Kabupaten Agam',	'Lubuk Basung',	'2021-12-30 02:08:56',	'2021-12-30 02:08:56'),
(7,	'KD07',	'Kabupaten Lima Puluh Kota',	' -',	'2021-12-30 02:09:32',	'2021-12-30 02:09:32'),
(8,	'KD08',	'Kabupaten Pasaman',	'Lubuk Sikaping',	'2021-12-30 02:10:07',	'2021-12-30 02:10:07'),
(9,	'KD09',	'Kota Padang',	'Padang',	NULL,	'2021-07-17 11:49:40'),
(10,	'KD10',	'Kabupaten Kep. Mentawai',	'-',	NULL,	NULL),
(11,	'KD11',	'Kabupaten Dharmasraya',	'Pulau Punjung',	'2021-12-30 02:10:35',	'2021-12-30 02:10:35'),
(12,	'KD12',	'Kabupaten Solok Selatan',	'Sangir',	'2021-07-17 11:47:14',	'2021-07-17 11:47:14'),
(13,	'KD13',	'Kabupaten Pasaman Barat',	'Simpang Empat',	'2021-12-30 02:11:41',	'2021-12-30 02:11:41'),
(14,	'KD14',	'Kabupaten Solok',	'-',	'2021-12-30 02:12:10',	'2021-12-30 02:12:10'),
(15,	'KD15',	'Kota Sawahlunto',	'-',	'2021-12-30 02:14:44',	'2021-12-30 02:14:44'),
(16,	'KD16',	'Kota Padang Panjang',	'Padang Panjang',	'2021-12-30 02:15:16',	'2021-12-30 02:15:16'),
(17,	'KD17',	'Kota Bukittinggi',	'Bukittinggi',	'2021-12-30 02:15:51',	'2021-12-30 02:15:51'),
(18,	'KD18',	'Kota Payakumbuh',	'Payakumbuh',	'2021-12-30 02:16:18',	'2021-12-30 02:16:18'),
(19,	'KD19',	'Kota Pariaman',	'Pariaman',	'2021-12-30 02:16:52',	'2021-12-30 02:16:52'),
(20,	'KD20',	'Kanwil Prov. Sumatera Barat',	'Padang',	'2021-12-30 05:37:27',	'2021-12-30 05:37:27');

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kab_kota` varchar(4) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `kecamatan` (`id`, `kab_kota`, `kecamatan`) VALUES
(1,	'KD06',	'Ampek Nagari (IV Nagari )'),
(2,	'KD06',	'Banuhampu'),
(3,	'KD06',	'Baso'),
(4,	'KD06',	'Candung'),
(5,	'KD06',	'IV Angkat Candung (Ampek Angkek)'),
(6,	'KD06',	'IV Koto (Ampek Koto)'),
(7,	'KD06',	'Kamang Magek'),
(8,	'KD06',	'Lubuk Basung'),
(9,	'KD06',	'Malakak'),
(10,	'KD06',	'Matur'),
(11,	'KD06',	'Palembayan'),
(12,	'KD06',	'Palupuh'),
(13,	'KD06',	'Sungai Pua (Puar)'),
(14,	'KD06',	'Tanjung Mutiara'),
(15,	'KD06',	'Tanjung Raya'),
(16,	'KD06',	'Tilatang Kamang'),
(17,	'KD17',	'Aur Birugo Tigo Baleh'),
(18,	'KD17',	'Guguk Panjang (Guguak Panjang)'),
(19,	'KD17',	'Mandiangin Koto Selayan'),
(20,	'KD11',	'Asam Jujuhan'),
(21,	'KD11',	'Koto Besar'),
(22,	'KD11',	'Koto Salak'),
(23,	'KD11',	'Padang Laweh'),
(24,	'KD11',	'Pulau Punjung'),
(25,	'KD11',	'Sembilan Koto'),
(26,	'KD11',	'Sitiung'),
(27,	'KD11',	'Sungai Rumbai'),
(28,	'KD11',	'Timpeh'),
(29,	'KD11',	'Tiumang'),
(30,	'KD10',	'Pagai Selatan'),
(31,	'KD10',	'Pagai Utara'),
(32,	'KD10',	'Siberut Barat'),
(33,	'KD10',	'Siberut Barat Daya'),
(34,	'KD10',	'Siberut Selatan'),
(35,	'KD10',	'Siberut Tengah'),
(36,	'KD10',	'Siberut Utara'),
(37,	'KD10',	'Sikakap'),
(38,	'KD10',	'Sipora Selatan'),
(39,	'KD10',	'Sipora Utara'),
(40,	'KD07',	'Akabiluru'),
(41,	'KD07',	'Bukik Barisan'),
(42,	'KD07',	'Guguak (Gugu)'),
(43,	'KD07',	'Gunuang Omeh (Gunung Mas)'),
(44,	'KD07',	'Harau'),
(45,	'KD07',	'Kapur IX/Sembilan'),
(46,	'KD07',	'Lareh Sago Halaban'),
(47,	'KD07',	'Luak (Luhak)'),
(48,	'KD07',	'Mungka'),
(49,	'KD07',	'Pangkalan Koto Baru'),
(50,	'KD07',	'Payakumbuh'),
(51,	'KD07',	'Situjuah Limo/Lima Nagari'),
(52,	'KD07',	'Suliki'),
(53,	'KD09',	'Bungus Teluk Kabung'),
(54,	'KD09',	'Koto Tangah'),
(55,	'KD09',	'Kuranji'),
(56,	'KD09',	'Lubuk Begalung'),
(57,	'KD09',	'Lubuk Kilangan'),
(58,	'KD09',	'Nanggalo'),
(59,	'KD09',	'Padang Barat'),
(60,	'KD09',	'Padang Selatan'),
(61,	'KD09',	'Padang Timur'),
(62,	'KD09',	'Padang Utara'),
(63,	'KD09',	'Pauh'),
(64,	'KD16',	'Padang Panjang Barat'),
(65,	'KD16',	'Padang Panjang Timur'),
(66,	'KD05',	'2 X 11 Enam Lingkung'),
(67,	'KD05',	'2 X 11 Kayu Tanam'),
(68,	'KD05',	'Batang Anai'),
(69,	'KD05',	'Batang Gasan'),
(70,	'KD05',	'Enam Lingkung'),
(71,	'KD05',	'IV Koto Aur Malintang'),
(72,	'KD05',	'Lubuk Alung'),
(73,	'KD05',	'Nan Sabaris'),
(74,	'KD05',	'Padang Sago'),
(75,	'KD05',	'Patamuan'),
(76,	'KD05',	'Sintuk/Sintuak Toboh Gadang'),
(77,	'KD05',	'Sungai Geringging/Garingging'),
(78,	'KD05',	'Sungai Limau'),
(79,	'KD05',	'Ulakan Tapakih/Tapakis'),
(80,	'KD05',	'V Koto Kampung Dalam'),
(81,	'KD05',	'V Koto Timur'),
(82,	'KD05',	'VII Koto Sungai Sarik'),
(83,	'KD19',	'Pariaman Selatan'),
(84,	'KD19',	'Pariaman Tengah'),
(85,	'KD19',	'Pariaman Timur'),
(86,	'KD19',	'Pariaman Utara'),
(87,	'KD08',	'Bonjol'),
(88,	'KD08',	'Duo Koto (II Koto)'),
(89,	'KD08',	'Lubuk Sikaping'),
(90,	'KD08',	'Mapat Tunggul'),
(91,	'KD08',	'Mapat Tunggul Selatan'),
(92,	'KD08',	'Padang Gelugur'),
(93,	'KD08',	'Panti'),
(94,	'KD08',	'Rao'),
(95,	'KD08',	'Rao Selatan'),
(96,	'KD08',	'Rao Utara'),
(97,	'KD08',	'Simpang Alahan Mati'),
(98,	'KD08',	'Tigo Nagari (III Nagari)'),
(99,	'KD13',	'Gunung Tuleh'),
(100,	'KD13',	'Kinali'),
(101,	'KD13',	'Koto Balingka'),
(102,	'KD13',	'Lembah Melintang'),
(103,	'KD13',	'Luhak Nan Duo'),
(104,	'KD13',	'Pasaman'),
(105,	'KD13',	'Ranah Batahan'),
(106,	'KD13',	'Sasak Ranah Pasisir/Pesisie'),
(107,	'KD13',	'Sei Beremas'),
(108,	'KD13',	'Sungai Aur'),
(109,	'KD13',	'Talamau'),
(110,	'KD18',	'Lamposi Tigo Nagari'),
(111,	'KD18',	'Payakumbuh Barat'),
(112,	'KD18',	'Payakumbuh Selatan'),
(113,	'KD18',	'Payakumbuh Timur'),
(114,	'KD18',	'Payakumbuh Utara'),
(115,	'KD01',	'Airpura'),
(116,	'KD01',	'Basa Ampek Balai Tapan'),
(117,	'KD01',	'Batang Kapas'),
(118,	'KD01',	'Bayang'),
(119,	'KD01',	'IV Jurai'),
(120,	'KD01',	'IV Nagari Bayang Utara'),
(121,	'KD01',	'Koto XI Tarusan'),
(122,	'KD01',	'Lengayang'),
(123,	'KD01',	'Linggo Sari Baganti'),
(124,	'KD01',	'Lunang'),
(125,	'KD01',	'Pancung Soal'),
(126,	'KD01',	'Ranah Ampek Hulu Tapan'),
(127,	'KD01',	'Ranah Pesisir'),
(128,	'KD01',	'Silaut'),
(129,	'KD01',	'Sutera'),
(130,	'KD15',	'Barangin'),
(131,	'KD15',	'Lembah Segar'),
(132,	'KD15',	'Silungkang'),
(133,	'KD15',	'Talawi'),
(134,	'KD03',	'IV Nagari'),
(135,	'KD03',	'Kamang Baru'),
(136,	'KD03',	'Koto VII'),
(137,	'KD03',	'Kupitan'),
(138,	'KD03',	'Lubuak Tarok'),
(139,	'KD03',	'Sijunjung'),
(140,	'KD03',	'Sumpur Kudus'),
(141,	'KD03',	'Tanjung Gadang'),
(142,	'KD02',	'Lubuk Sikarah'),
(143,	'KD02',	'Tanjung Harapan'),
(144,	'KD14',	'Bukit Sundi'),
(145,	'KD14',	'Danau Kembar'),
(146,	'KD14',	'Gunung Talang'),
(147,	'KD14',	'Hiliran Gumanti'),
(148,	'KD14',	'IX Koto Sungai Lasi'),
(149,	'KD14',	'Junjung Sirih'),
(150,	'KD14',	'Kubung'),
(151,	'KD14',	'Lembah Gumanti'),
(152,	'KD14',	'Lembang Jaya'),
(153,	'KD14',	'Pantai Cermin'),
(154,	'KD14',	'Payung Sekaki'),
(155,	'KD14',	'Tigo Lurah'),
(156,	'KD14',	'X Koto Diatas'),
(157,	'KD14',	'X Koto Singkarak'),
(158,	'KD12',	'Koto Parik Gadang Diateh'),
(159,	'KD12',	'Pauh Duo'),
(160,	'KD12',	'Sangir'),
(161,	'KD12',	'Sangir Balai Janggo'),
(162,	'KD12',	'Sangir Jujuan'),
(163,	'KD12',	'Sungai Pagu'),
(164,	'KD04',	'Batipuh'),
(165,	'KD04',	'Batipuh Selatan'),
(166,	'KD04',	'Lima Kaum'),
(167,	'KD04',	'Lintau Buo'),
(168,	'KD04',	'Lintau Buo Utara'),
(169,	'KD04',	'Padang Ganting'),
(170,	'KD04',	'Pariangan'),
(171,	'KD04',	'Rambatan'),
(172,	'KD04',	'Salimpaung'),
(173,	'KD04',	'Sepuluh Koto (X Koto)'),
(174,	'KD04',	'Sungai Tarab'),
(175,	'KD04',	'Sungayang'),
(176,	'KD04',	'Tanjung Baru');

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modul` text NOT NULL,
  `event` varchar(100) NOT NULL,
  `trn_id` bigint(20) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `logs_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `logs` (`id`, `modul`, `event`, `trn_id`, `user_id`, `user_name`, `email`, `created_at`, `updated_at`) VALUES
(895,	'Modul Users',	'Delete Data',	2,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:43:23',	'2024-02-07 00:43:23'),
(896,	'Modul Users',	'Delete Data',	26,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:43:33',	'2024-02-07 00:43:33'),
(897,	'Modul Users',	'Delete Data',	36,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:43:39',	'2024-02-07 00:43:39'),
(898,	'Modul Users',	'Delete Data',	35,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:43:46',	'2024-02-07 00:43:46'),
(899,	'Modul Users',	'Delete Data',	34,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:43:52',	'2024-02-07 00:43:52'),
(900,	'Modul Users',	'Delete Data',	29,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:44:01',	'2024-02-07 00:44:01'),
(901,	'Modul Users',	'Delete Data',	33,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:44:07',	'2024-02-07 00:44:07'),
(902,	'Modul Users',	'Delete Data',	32,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:44:13',	'2024-02-07 00:44:13'),
(903,	'Modul Users',	'Delete Data',	31,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:44:19',	'2024-02-07 00:44:19'),
(904,	'Modul Users',	'Delete Data',	30,	1,	'Administrator',	'admin@argon.com',	'2024-02-07 00:44:25',	'2024-02-07 00:44:25');

DROP TABLE IF EXISTS `menu_type`;
CREATE TABLE `menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `menu_type` (`id`, `menu_name`, `created_at`, `updated_at`) VALUES
(1,	'Menu Admin',	NULL,	NULL),
(2,	'Menu Umum',	NULL,	NULL),
(3,	'Menu Arsip',	NULL,	NULL),
(4,	'Menu Agenda',	NULL,	NULL),
(5,	'Menu Cuti',	NULL,	NULL),
(6,	'Menu Perjadin',	'2023-12-05 02:22:53',	'2023-12-05 02:22:53');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2014_10_12_100000_create_password_reset_tokens_table',	2),
(6,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	2),
(7,	'2024_01_20_181726_create_sessions_table',	2);

DROP TABLE IF EXISTS `modul`;
CREATE TABLE `modul` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(255) NOT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `modul_type_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_modul` (`nama_modul`(191)),
  KEY `modul_type_id` (`modul_type_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `modul_ibfk_1` FOREIGN KEY (`modul_type_id`) REFERENCES `modul_type` (`id`),
  CONSTRAINT `modul_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `modul` (`id`, `nama_modul`, `nama_menu`, `modul_type_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1,	'role_user',	'Level User',	1,	1,	'2023-12-01 03:47:30',	'2023-12-01 03:47:30'),
(2,	'data_user',	'Data User',	1,	1,	'2023-12-01 03:47:36',	'2023-12-01 03:47:36'),
(3,	'role_permission',	'Role Permission',	1,	1,	'2023-12-01 03:47:40',	'2023-12-01 03:47:40'),
(4,	'modul_name',	'Modul Aplikasi',	1,	1,	'2023-11-23 07:51:30',	'2023-11-23 07:51:30'),
(5,	'city',	'Kabupaten / Kota',	2,	1,	'2024-02-07 07:00:33',	'2024-02-07 07:00:33'),
(6,	'pejabat',	'Data Pejabat',	2,	1,	'2023-12-05 02:03:57',	'2023-12-05 02:03:57'),
(9,	'logs',	'Logs System',	1,	2,	'2023-12-05 02:27:27',	'2023-12-05 02:27:27'),
(10,	'pegawai',	'Guru dan Tendik',	2,	1,	'2023-12-05 08:53:16',	'2023-12-05 08:53:16'),
(11,	'utility',	'Setting System',	1,	1,	'2023-12-04 03:56:30',	'2023-12-04 03:56:30');

DROP TABLE IF EXISTS `modul_type`;
CREATE TABLE `modul_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modul_type` char(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `modul_type` (`id`, `modul_type`, `created_at`, `updated_at`) VALUES
(1,	'System',	'2021-07-22 15:24:28',	'2021-07-22 15:24:28'),
(2,	'Master Data',	'2021-07-22 15:24:39',	'2021-07-22 15:24:39'),
(3,	'Transaksi Data',	'2021-07-22 15:24:44',	'2021-07-22 15:24:44'),
(4,	'Report',	'2021-11-17 17:58:25',	'2021-11-17 17:58:25');

DROP TABLE IF EXISTS `panggol`;
CREATE TABLE `panggol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pangkat` varchar(25) NOT NULL,
  `gol` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `panggol` (`id`, `pangkat`, `gol`, `created_at`, `updated_at`) VALUES
(1,	'Pengatur Muda',	'II/a',	'2021-08-20 04:16:09',	'2022-01-12 06:54:39'),
(2,	'Pengatur Muda Tk. I',	'II/b',	'2021-08-20 02:51:35',	'2021-08-20 04:19:35'),
(3,	'Pengatur',	'IIc',	'2021-08-20 02:52:09',	'2021-08-20 02:52:09'),
(4,	'Pengatur Tingkat I',	'II/d',	'2021-08-20 02:52:23',	'2021-08-20 04:21:11'),
(5,	'Penata Muda',	'III/a',	'2021-08-20 02:52:38',	'2021-08-20 02:52:38'),
(6,	'Penata Muda Tk I',	'III/b',	'2021-08-20 02:52:51',	'2021-08-20 04:21:31'),
(7,	'Penata',	'III/c',	'2021-08-20 02:53:11',	'2021-08-20 02:53:11'),
(8,	'Penata Tingkat I',	'III/d',	'2021-08-20 02:53:25',	'2021-08-20 02:53:25'),
(9,	'Pembina',	'IV/a',	'2021-08-20 02:53:43',	'2021-08-20 02:53:43'),
(10,	'Pembina Tingkat I',	'IV/b',	NULL,	'2021-09-30 13:19:03'),
(11,	'Pembina Utama Muda',	'IV/c',	NULL,	NULL),
(12,	'Pembina Utama Madya',	'IV/d',	'2021-08-20 04:23:38',	'2021-08-20 04:23:38'),
(13,	'Pembina Utama',	'IV/e',	NULL,	'2021-08-24 00:53:10');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('obelstones@gmail.com',	'$2y$10$pijyVQUSvWn1usCI690sVuTZfOZMGbzCRu3kbA8Ll/cS1GJqtsZgG',	'2022-04-02 23:52:31'),
('satria@gmail.com',	'$2y$10$0qMk7sDgi6aDrKzNcR.qK.AIXc..kgolmjnPH49Xij1XxgGbHY06.',	'2022-04-03 00:34:18');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('rakha.dj@gmail.com',	'$2y$10$SwGg9RtJiUNgKawoZfpPzuJT3u86m29.BFFWVo0Nv5PMQ47m9jvZK',	'2024-02-04 00:17:35');

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) NOT NULL,
  `nama` text NOT NULL,
  `kode_golongan` varchar(10) NOT NULL,
  `kode_jabatan` int(11) NOT NULL,
  `jabatan_tambahan` varchar(5) DEFAULT NULL,
  `status_kepeg` varchar(7) NOT NULL,
  `unit_id` varchar(6) DEFAULT NULL,
  `no_hp` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `kode_golongan`, `kode_jabatan`, `jabatan_tambahan`, `status_kepeg`, `unit_id`, `no_hp`, `jenis_kelamin`, `email`, `alamat`, `image`, `created_at`, `updated_at`) VALUES
(7,	'197003011995031001',	'Dr. H. HELMI, M.Ag',	'IV/c',	1,	'',	'PNS',	'1',	'0',	'L',	'admin@argon.com',	'-',	'profile-photos/4wJKpktseTuPaEMNkfaPYW0SIekL3iyCKwCxg8mk.jpg',	'2023-04-08 06:14:38',	'2023-04-08 06:14:38'),
(8,	'196608021994031002',	'Drs. H. MISWAN M.Pd',	'IV/b',	6,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(9,	'197610102002122001',	'DINA FITRIA RAMA, SH.MM',	'IV/a',	22,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(10,	'197510281998031003',	'SYAHIRUL ALIM, S,Sos.',	'III/d',	13,	NULL,	'PNS',	'2',	'08',	'L',	'rakha.dj@gmail.com',	'GG JAGUNG',	'profile-photos/k1zCPGAWjA2ZL6bNSTVWhXmmajI8lDlMh5UkwZvC.png',	'2023-12-22 08:57:24',	'2023-12-22 01:57:24'),
(11,	'198007022005012012',	'RISNA YANTI S.Sos.I',	'III/c',	15,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(12,	'198405312009011007',	'ZAIFUL RAHMAT, S.Kom',	'III/c',	12,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(13,	'198408312005011001',	'Dr. SUKMURDIANTO, MA',	'III/c',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(14,	'198605242011011011',	'GOPY BERMANA, M.Kom',	'III/c',	12,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(16,	'198405092011012015',	'YESFI MIRA ANDRIA, M.Kom',	'III/c',	12,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(17,	'197203061993032003',	'MENDRAWATI, S.AP',	'III/b',	17,	NULL,	'PNS',	'4',	'-',	'P',	'-',	'-',	'profile-photos/user.png',	'2023-07-10 09:16:05',	'2023-07-10 02:16:05'),
(18,	'198008262006041001',	'DINI MAHDUMILLAH, S.IP',	'III/b',	18,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(19,	'196805042014111003',	'HASAN BASRI, S.AP',	'III/a',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(20,	'198909192019032016',	'SILKY PUTRI MAIZA S.I.P',	'III/a',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(21,	'198203172006042003',	'SUSY PRIMAYENI, SE,M.AB',	'IV/a',	19,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(22,	'197905292008012013',	'ENDANG MESFITRA S,T',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(23,	'198108122005012004',	'VARIA GUSMA PRATIWI S.E',	'III/d',	19,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(24,	'197503112009122001',	'SISKA ANGGRAINI SE, M.M',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(25,	'197904102009122002',	'Hj. LUCY AFRIANI HAKIM, S.E, Akt',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(26,	'197808062009011013',	'MUHAMMAD RIDHA, SE, M.Si',	'III/c',	19,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(27,	'198404092011011011',	'H. DENNY AFRICO TASLIM, S.E',	'III/c',	19,	'ppk',	'PNS',	'2',	'0',	'L',	'x',	'x',	'profile-photos/user.png',	'2023-07-10 09:14:28',	'2023-07-10 02:14:28'),
(28,	'198810132011012011',	'ACE ASNAWELIS SE., M.Si',	'III/c',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(29,	'197511272002121009',	'H. AZMI S.E, MM',	'III/c',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(30,	'199210182015052002',	'RAHMI OCTAVIA S.E.',	'III/b',	24,	'ppk',	'PNS',	'2',	'0',	'P',	'admin@argon.com',	'-',	'profile-photos/user.png',	'2023-04-14 05:06:29',	'2023-04-14 05:06:29'),
(31,	'198303042006041005',	'RISWAN, SE',	'III/b',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(32,	'197601012006042015',	'SRI HASTUTI, SH',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(33,	'198407162005011001',	'FAUQA NURI ICHSAN, S.Pd., M.Pd',	'III/d',	16,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(34,	'198302112008011007',	'RAHMAT TASNIM S.E, M.Si',	'III/d',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(35,	'197904152008011016',	'ARIESTA NURMAN SASONO SHI',	'III/c',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(36,	'199009062020121016',	'AHMAD DENI S.AP',	'III/a',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(37,	'198801092022031001',	'ARIF YANDU S.Th.I',	'III/a',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(38,	'196702151988032004',	'HELMIYETTI, S.Sos',	'IV/b',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(39,	'196902171993032002',	'Hj. GUSNIDAR, S.H., M.M',	'IV/a',	6,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(40,	'197002071993032001',	'Hj. YENTI DESFITA, S.Kom., M.M',	'IV/a',	18,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(41,	'197301122000032003',	'Hj. ERMAYENTI, S.Kom., M.M',	'IV/a',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(42,	'197301122000032003',	'H. M. FADLI ISLAMY S.H',	'III/d',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(43,	'196806161993032003',	'YUHELMI, SH.',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(44,	'197504142009012002',	'AISYAH, S.E, Akt, M.M',	'III/d',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(45,	'197805222003122003',	'YELSUSI CITRA, S.Kom, MM',	'III/c',	18,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(46,	'197709172007011026',	'IRWANTO FIRSADA S.Ag., M, Sos',	'III/c',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(47,	'198108092009011006',	'SYAIFUL, SHI',	'III/b',	18,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(48,	'199211132020121011',	'BUDI MULIONO S.Sos',	'III/a',	18,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(49,	'199502212020122029',	'NURHIDAYATI S.H',	'III/a',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(50,	'199703282020122024',	'MARTA YOLA ROZA S.Psi',	'III/a',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(51,	'197906032009012005',	'DERLINA, S.AP',	'IIc',	18,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(52,	'196703031987031002',	'MULYONO, SE',	'IV/c',	13,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(53,	'196803021989032008',	'YUMARI, SH.',	'IV/c',	13,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(54,	'196711261989111001',	'AMRIZAL, S.E.',	'IV/a',	13,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(55,	'197508171998031003',	'TAN GUSLI S.Fil.I., MAP., MA.',	'IV/a',	13,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(56,	'196605191987031002',	'H. YOSHERMAN, SE.Akt',	'IV/a',	13,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(57,	'198207012006042003',	'WISE HARUMI, SP., SHI.',	'III/d',	13,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(58,	'197503312008012005',	'LOLY VOLIA, ST',	'III/d',	13,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(59,	'196811292005011002',	'KHAIRULMEN, S.E',	'III/d',	13,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(60,	'198004242008012020',	'WIDYA ASRIKA, S.Kom.',	'III/d',	13,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(61,	'198205202009011014',	'MALVI ASRA VAN SURI, SE',	'III/d',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(62,	'199702202020122014',	'ELSA FEBRIANI S.Si',	'III/a',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(63,	'198503072006042010',	'WIRA MARDHIYAH, S.T., MM',	'III/d',	24,	NULL,	'PNS',	'5',	'123',	'P',	'wira@gmail.com',	'padang',	'profile-photos/user.png',	'2023-07-23 12:13:24',	'2023-07-23 05:13:24'),
(64,	'198110082007012016',	'VETHRIA RAHMI, S.Sos.I',	'III/c',	15,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(65,	'198203092009011007',	'H RIZKI RONALDI, S.Kom',	'III/c',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(66,	'198003082011012005',	'LENI UMAR, S.E',	'III/c',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(67,	'197807302007011009',	'ERI GUSNEDI, S.Pd.',	'III/c',	15,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(68,	'196601122014111004',	'JAMAAN, S.Ag',	'III/b',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(69,	'198512082005012001',	'FITRA DEWI, A.Md.',	'III/a',	24,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(70,	'199301272020122012',	'MONA FILARDI S.Pd',	'III/a',	17,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(71,	'199108222020122013',	'FAUZIAH S.AP',	'III/a',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(72,	'198808282020121011',	'M RIZKI AFDHAL S.Sos',	'III/a',	17,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(73,	'199001292020122024',	'VIVI ARDI S.I.P',	'III/a',	17,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(74,	'197107072009011008',	'ZULHENDRI',	'IIc',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(75,	'198006122014111002',	'TAUFIK HISMAR',	'II/b',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(76,	'197007301992031001',	'H. HENDRI PANI DIAS, S.Ag, M.A',	'IV/a',	3,	NULL,	'PNS',	'5',	'0',	'L',	'x',	'x',	'profile-photos/jJSyMZrMMyr5tUnLCkM2N8TJ8YfTNeoBH6NliFa4.png',	'2023-07-12 05:01:34',	'2023-07-11 22:01:34'),
(77,	'197404042002121006',	'MOFRI ANTONI, SE, MM',	'III/d',	18,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(78,	'198506152009012016',	'ADE SILVIA, M.Kom',	'III/c',	12,	'',	'PNS',	'6',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(79,	'197704011997031002',	'H. AFRIZAL S.Pd.I, M.Si',	'IV/a',	23,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(80,	'198006192005011006',	'ABDULLAH ALAMUDI, S.HI, M.Pd',	'IV/a',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(81,	'198510222008012002',	'RINI HARTATI S.E, Akt, M.M',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(82,	'197101021996031001',	'Dr. H. JHON OF RIEZAL ONE, S.Ag, M.A',	'IV/b',	18,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(83,	'197008111990032001',	'MARIA ELIS SANDRAWITA, S.Ag., M.M',	'IV/a',	24,	'',	'PNS',	'5',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(84,	'198208102009011011',	'H. BENNY MALWA, S.Sos.I., M.Sos..',	'III/d',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(85,	'198211082011011009',	'NOVELIA MUSDA, SS',	'III/c',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(86,	'197005011993031002',	'ADRI KAMAL, ST.Arc',	'III/d',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(87,	'197709102007101001',	'FIRDAUS, S.HI',	'III/d',	24,	NULL,	'PNS',	'5',	'00',	'L',	'197709102007101001@kemenag.go.id',	'xxx',	'profile-photos/user.png',	'2023-07-17 01:09:18',	'2023-07-16 18:09:18'),
(88,	'198401202009011006',	'AHMAD NEGARA DALIMUNTHE, S.IP',	'III/c',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(89,	'198505212005011001',	'PUTRA INTAN RIKI FIRDAUS',	'II/d',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(90,	'197007061999031005',	'H. AMRIZAL, M.Ag',	'IV/a',	18,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(91,	'197611252006041012',	'NOVE HENDRI, SE, MA, Akt, M.Pd.E',	'IV/a',	24,	NULL,	'PNS',	'5',	'c',	'L',	'c',	'c',	'profile-photos/2QULmMslkpskRZwIkCSN7dguXQVrIU7M46BA7JXW.png',	'2023-07-12 03:23:30',	'2023-07-11 20:23:30'),
(92,	'197910262008012011',	'HENDRA WENI S.KOM, MM',	'III/d',	24,	'',	'PNS',	'5',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(93,	'197508082009121001',	'JUMANUDIN, S.Kom',	'III/c',	12,	NULL,	'PNS',	'5',	'-',	'L',	'rakha.dj@gmail.com',	'bnu',	'profile-photos/aOg8MgfgtMqphhDOigs2Z9GF5q45gwrF3zOYVupC.jpg',	'2024-01-04 03:39:14',	'2024-01-03 20:39:14'),
(94,	'197805282002122003',	'METRA SURYATI, S.Ag.',	'III/d',	24,	'',	'PNS',	'5',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(95,	'197912252009011011',	'TASLIM PERDANA, S.Pd., M.Kom',	'III/d',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(96,	'198105312005011002',	'WELEN ASRO HENDRAWAN',	'II/d',	24,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(97,	'198106122005012007',	'Dr. MUSLIMAH, S.Th.I., M.Ag.',	'IV/a',	16,	'',	'PNS',	'4',	'00',	'P',	'hj',	'xxx',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(98,	'196512311994031009',	'Drs. NAHARUDIN',	'IV/a',	2,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(99,	'196911021994031002',	'Drs. YOHANIS',	'III/d',	24,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(100,	'198301282009011009',	'EFRIAN, M.Kom',	'III/d',	12,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(101,	'198109232011011003',	'H. INDRA GUNAWAN S.H.I',	'III/c',	24,	NULL,	'PNS',	'4',	'082389400192',	'L',	'198109232011011003@kemenag.go.id',	'PADANG',	'profile-photos/user.png',	'2023-07-23 11:57:25',	'2023-07-23 04:57:25'),
(102,	'196803281990012001',	'Hj. AVERMELIA ARBAIN, S.AP',	'III/c',	24,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(103,	'198112012003122002',	'RISMAWATI S.AP',	'III/a',	24,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(104,	'197107041996031003',	'H. SAHRIZAL, S.Ag, M.M',	'IV/a',	23,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(105,	'197211081993031004',	'H. NOVI ENDRA HELMI, SE',	'III/d',	2,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(106,	'196605092007012030',	'Hj. SUKMAWATI, S.Ag',	'III/d',	2,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(107,	'198105092009011007',	'AFRIZAL, S.HI',	'III/c',	24,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(108,	'198712142011012010',	'FAUZIYAH, S.Th.I',	'III/c',	24,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(109,	'197710092007101002',	'ALMUDASSIR, A.Ma.',	'IIc',	24,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(110,	'198103042005012004',	'Hj FATMAWATI S.Sos., M.Si',	'III/c',	24,	'',	'PNS',	'4',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(111,	'198207152009011010',	'SOLMUS S.Th.I',	'III/c',	24,	'',	'PNS',	'4',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(112,	'196612161993031002',	'Drs. H. RAMZA HUSMEN, M. Pd',	'IV/b',	5,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(113,	'198204282008011007',	'H. YUDI HIDAYAT, S.T, M.M',	'III/c',	12,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(114,	'197907132009101005',	'JULFRIADI, A.Md',	'III/a',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(115,	'197404212003121005',	'H. USWATMAN S.Ag, M.M',	'IV/a',	17,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(116,	'197807292009011005',	'H. INDRANEDI SH',	'III/c',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(117,	'197106271998032001',	'ERNAWATI',	'III/b',	24,	'',	'PNS',	'6',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(118,	'198012222005011001',	'H. ULIL AMRI, S.H.I, M.A',	'IV/a',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(119,	'197306172003121003',	'DELFISMAN, S.Kom',	'III/d',	5,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(120,	'198111182006041018',	'H. HAMI MULYAWAN, S.HI, MM',	'IV/a',	30,	'',	'PNS',	'5',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(121,	'197003042003121002',	'ZULFARISWAN S.Sos',	'III/c',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(122,	'197602102007101001',	'H. HIDAYAT DS, S.Ag, M.H',	'III/d',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(123,	'197101092010011003',	'BESRIZAL, S.E',	'III/d',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(124,	'198303092014112003',	'VONI KURNIAWATI, S.S.',	'III/a',	5,	'',	'PNS',	'6',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(125,	'197611122009011003',	'HENDRI NOFRIZAL',	'II/d',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(126,	'196702151994031001',	'Drs. H. ZILWADI',	'III/d',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(127,	'196503031993031001',	'H. DAFRIL S.Ag',	'III/d',	24,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(128,	'197010142006042001',	'Hj. RINA ELFIZA, SH',	'III/d',	24,	'',	'PNS',	'6',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(129,	'197603051997031003',	'H. EDISON, M.Ag',	'IV/b',	7,	NULL,	'PNS',	'7',	'-',	'L',	'x',	'x',	'profile-photos/user.png',	'2023-07-18 03:41:50',	'2023-07-17 20:41:50'),
(130,	'197605012007102003',	'MAICENDRAWATI, S.Ag., M.Hum',	'IV/a',	24,	'',	'PNS',	'7',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(131,	'198001052005011004',	'JANUAR SH',	'III/c',	22,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(132,	'198512102009102001',	'Hj. ELVIRA HAYU S.Kom, M.M',	'III/c',	12,	'',	'PNS',	'7',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(133,	'197407271994031002',	'YUSDAH RIFAN, SH',	'III/a',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(134,	'197503032005011007',	'H. SYAFALMART, S,Ag',	'III/d',	21,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(135,	'197604012011011005',	'AHMAD MUZAMI S.Ag, M.H',	'III/d',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(136,	'198006192009011002',	'JONIFER ARA, S.HI',	'III/d',	24,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(137,	'197112251998031004',	'YOSEF CHAIRUL, S.AG',	'III/d',	24,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(138,	'198205182005012004',	'ELFIDA TRISNA S.Farm',	'III/c',	24,	'',	'PNS',	'7',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(139,	'197007122014111005',	'JASRIAL',	'III/a',	24,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(140,	'197710102003121002',	'Dr. IKRAR ABDI, S.Ag, M.A',	'IV/a',	24,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(141,	'198008182008011008',	'IHSANUL FIKRI SHI',	'III/d',	24,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(142,	'198703192011012018',	'PERTIWI IMMAWATI, SE',	'III/c',	24,	'',	'PNS',	'7',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(143,	'197205071998031002',	'Dr. H. YASRIL, S.Ag, M.A',	'IV/b',	16,	'',	'PNS',	'7',	'00',	'L',	'hji',	'JL.',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(144,	'198210032006041003',	'BUDI RIVA, S.Sos.I., M.Sos',	'IV/a',	24,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(145,	'198404302011012013',	'AFRIDA SUSANTY, S.E',	'III/c',	17,	'',	'PNS',	'7',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(146,	'196902272014111002',	'ZUL AZMI',	'II/b',	24,	'',	'PNS',	'2',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(147,	'197206262000031004',	'H. YUFRIZAL, S.Ag. M.H.I',	'IV/b',	4,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(148,	'198502042011012006',	'VINA JAMILA KINTA, S.Kom., M.CIO',	'III/c',	12,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(149,	'197210272006042020',	'ASMI YARNI AGUS S.AP',	'III/a',	24,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(150,	'197902282003121002',	'H. THOMAS FEBRIA, S.Ag, M.A',	'IV/a',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(151,	'198009232005011002',	'H. ALFAJRI, SHI, MA',	'IV/a',	24,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(152,	'198410302009012010',	'EZA FAUZANA, S.Kom',	'III/d',	24,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(153,	'196505112014111002',	'PARLAUNGAN, S.Ag, M.A',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(154,	'197505072014111003',	'ABADI, S.Sos.I., M.A',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(155,	'197607052014112002',	'YULIASNI, S.Ag. M.Sos',	'III/c',	14,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(156,	'197112232014112002',	'RENI HASRIN RH, S.Ag, M.A',	'III/c',	14,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(157,	'197804032014111002',	'SYAIFUDDIN ZUHRI DAULAY, S.Ag, M.A',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(158,	'196805102014111004',	'BAKRI, S.I.Q,S.Th.I.M.Pd.I',	'III/c',	4,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(159,	'196902252014112001',	'ELLIZA, S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(160,	'197706102014111001',	'IRWANDI, M.Pd',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(161,	'196909162014112001',	'SYAFRIDA, S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(162,	'196910042014112001',	'NURLIANI, S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(163,	'196812312014111042',	'RAFLIS S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(164,	'197007052014111002',	'DASRIAL, S.Ag',	'III/c',	24,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(165,	'197106102014112003',	'ANITA SOFIA, S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(166,	'196509032014111001',	'LUKMAN, S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(167,	'196902242014111003',	'HALIMUL HAKIM, S.Ag',	'III/c',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(168,	'198206032014111001',	'HENDRA S.Pd.I., M.A',	'III/b',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(169,	'198402022014111004',	'MAIRONI SHI',	'III/b',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(170,	'197401212014111002',	'IDRIL ISHAK RAMBE S.Pd.I',	'III/b',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(171,	'197005062014111002',	'MUHAMMAD ZULKHAIR S.Ag',	'III/a',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(172,	'197208152014111001',	'HERIADI S.Pd.I',	'IIc',	4,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(173,	'196609152014111003',	'DASRIL',	'IIc',	14,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(174,	'197010111996031001',	'H. EFI YOSKAR, S.Ag., M.M',	'IV/a',	21,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(175,	'196508151989031004',	'H. NASRUL',	'III/b',	24,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(176,	'196503041986031005',	'H. SUTARNO',	'III/b',	24,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(177,	'197011251998031002',	'H. YUSRAN LUBIS S.Ag, M.Pd',	'IV/a',	20,	'',	'PNS',	'7',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(178,	'197608062011012002',	'NETTI, S.Ag. M.H',	'III/d',	24,	'',	'PNS',	'2',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(179,	'197406151998031003',	'H. M. RIFKI, M.Ag',	'IV/a',	16,	'',	'PNS',	'6',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(180,	'198606222011011008',	'ARIF FAJRI, SE., MA.',	'III/c',	24,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(181,	'198301042014111002',	'RIFKI RUSYDI, S.H.',	'III/a',	24,	'',	'PNS',	'3',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(182,	'197602072000031001',	'YESRI ELFIS HASUGIAN, S. Th',	'IV/a',	11,	'',	'PNS',	'11',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(183,	'196507082000032001',	'HENNY SIMARMATA, S.PAK',	'III/d',	24,	'',	'PNS',	'11',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(184,	'196807132000032002',	'ROSLINA SITUMORANG',	'III/b',	24,	'',	'PNS',	'11',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(185,	'196709032003022001',	'LIRMANI RAJAGUKGUK',	'III/a',	24,	'',	'PNS',	'11',	'',	'P',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(186,	'197103112003121003',	'HERU ASMORO, S.Ag',	'IV/c',	2,	NULL,	'PNS',	'10',	'xxxx',	'L',	'197103112003121003@kemenag.go.id',	'xxx',	'profile-photos/user.png',	'2023-07-17 06:02:21',	'2023-07-16 23:02:21'),
(187,	'197207012001121004',	'HENRIKUS JOMI, S.Ag, MM',	'IV/a',	10,	'',	'PNS',	'10',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(188,	'197002281999031001',	'FAJAR CAHYONO SS',	'III/d',	24,	'',	'PNS',	'10',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(189,	'197802242003121001',	'JUMADI, S.Ag., M.Psi',	'IV/a',	28,	'',	'PNS',	'9',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(191,	'197006042003121003',	'SUMARDI',	'III/a',	24,	'',	'PNS',	'8',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(192,	'197106041999031003',	'MURYADI EKO PRIYANTO. SE.,M.M',	'IV/b',	29,	'',	'PNS',	'8',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06'),
(193,	'198907022022031001',	'DAMANG SUMEDI S.Pd.B',	'III/a',	14,	'',	'PNS',	'8',	'',	'L',	'',	'',	'profile-photos/user.png',	'2023-04-08 05:59:06',	'2023-04-08 05:59:06');

DROP TABLE IF EXISTS `pejabat`;
CREATE TABLE `pejabat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `id_role` int(10) unsigned NOT NULL,
  `id_modul` int(10) unsigned NOT NULL,
  `l` tinyint(1) NOT NULL DEFAULT 0,
  `d` tinyint(1) NOT NULL DEFAULT 0,
  `t` tinyint(1) NOT NULL DEFAULT 0,
  `u` tinyint(1) NOT NULL DEFAULT 0,
  `h` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  KEY `role_user_id_role_foreign` (`id_role`) USING BTREE,
  KEY `modul_id_modul_foreign` (`id_modul`) USING BTREE,
  CONSTRAINT `level_akses_id_level_foreign` FOREIGN KEY (`id_role`) REFERENCES `role_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `level_akses_id_modul_foreign` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_permission` (`id_role`, `id_modul`, `l`, `d`, `t`, `u`, `h`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	1,	1,	1,	'2024-02-04 02:39:30',	'2024-02-04 02:39:30'),
(1,	2,	1,	1,	1,	1,	1,	'2024-02-04 02:39:30',	'2024-02-04 02:39:30'),
(1,	3,	1,	1,	1,	1,	1,	'2024-02-04 02:39:30',	'2024-02-04 02:39:30'),
(1,	4,	1,	1,	1,	1,	1,	'2024-02-04 02:39:30',	'2024-02-04 02:39:30'),
(1,	5,	1,	1,	1,	1,	1,	'2024-02-04 02:39:30',	'2024-02-04 02:39:30'),
(1,	6,	1,	1,	1,	1,	1,	'2024-02-04 02:39:31',	'2024-02-04 02:39:31'),
(1,	9,	1,	1,	1,	1,	1,	'2024-02-04 02:39:31',	'2024-02-04 02:39:31'),
(1,	10,	1,	1,	1,	1,	1,	'2024-02-04 02:39:31',	'2024-02-04 02:39:31'),
(1,	11,	1,	1,	1,	1,	1,	'2024-02-04 02:39:31',	'2024-02-04 02:39:31'),
(2,	1,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	2,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	3,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	4,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	5,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	6,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	9,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	10,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04'),
(2,	11,	0,	0,	0,	0,	0,	'2024-02-07 00:33:04',	'2024-02-07 00:33:04');

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_user` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'2024-02-04 09:39:30',	'2024-02-04 02:39:30'),
(2,	'Manager',	'2024-02-04 09:29:34',	'2024-02-04 02:29:34'),
(3,	'Verifikator',	'2023-09-13 01:36:46',	'2023-09-12 18:36:46'),
(4,	'User',	'2024-01-04 07:55:24',	'2024-01-04 00:55:24'),
(5,	'Operator',	'2023-04-09 13:39:35',	'2023-04-09 13:39:35');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3toQwper7uho0YOsgQAki5AJJt4giQl345Eih6zz',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFJISE1Gckh6UFFhbDRodVJJWlFPU212dXVUcEFESHNVSTVQeURIaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1705780653),
('8TTxfD7a2xAPutumt0VhbTmRgp78QpqJwhymhamB',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiODZzWjhKR0oxcjc2a0xONWI4ZnZaU0NoRmttb2RtSjJpN3piZUllTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcwNTc3NzM3MTt9czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVEZKNDh3b3ZORHJIbjBSUFBuYWlzZUpmdzh0SmphbEhFS3RWRW5JNzZYcHBHdVQ1QnNOUDYiO30=',	1705780177),
('ItG0n73FZnadY2Fm7FZJb0IbEcuNSsHqmVEwxDyB',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicnZ6WnJsN1B6TmdXNkpvRU93R3MzVEY5U2s2WFB2dWhhRXI4RFdNMSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MDU3ODAzNTE7fX0=',	1705780642);

DROP TABLE IF EXISTS `struktur`;
CREATE TABLE `struktur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pimpinan` text NOT NULL,
  `lokasi_kantor` text NOT NULL,
  `ttd` text DEFAULT NULL,
  `t_1` text NOT NULL,
  `t_2` text NOT NULL,
  `t_3` text NOT NULL,
  `t_4` text NOT NULL,
  `t_5` text NOT NULL,
  `verifikator` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `struktur` (`id`, `nama_pimpinan`, `lokasi_kantor`, `ttd`, `t_1`, `t_2`, `t_3`, `t_4`, `t_5`, `verifikator`, `updated_at`) VALUES
(1,	'Helmi',	'Padang',	'',	'KEMENTERIAN AGAMA REPUBLIK INDONESIA',	'KANTOR WILAYAH KEMENTERIAN AGAMA',	'PROVINSI SUMATERA BARAT',	'Jl. Kuni No. 79 B (0751) 21686 – 28220 Fax. (0751) 22583',	'Website http://sumbar.kemenag.go.id | email : kanwilsumbar@kemenag.go.id',	'196608021994031002',	'2023-07-31 00:43:41');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_role` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_photo_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `user_name` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `id_role`, `name`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `profile_photo_url`, `created_at`, `updated_at`) VALUES
(1,	1,	'Administrator',	'197508082009121001',	'admin@argon.com',	'2022-03-04 00:48:26',	'$2y$10$TFJ48wovNDrHn0RPPnaiseJfw8tJjalHEKtVEnI76XppGuT5BsNP6',	NULL,	NULL,	NULL,	'Fxu054fc37TLDs8hGBYmEds5rn3EbNQ5o0A5XZWOeVYTLtLMtyraSe3Ff7dT',	'20240128144132.png',	'2022-03-04 00:48:26',	'2024-01-28 07:41:32');

-- 2024-02-16 08:00:06
