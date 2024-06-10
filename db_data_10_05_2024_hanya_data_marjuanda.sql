-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 08:52 PM
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
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 2023, 0, 0, '2024-04-17 21:06:15', '2024-04-17 21:12:28', '197508082009121001'),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:25', '2024-05-30 06:56:25', '197508082009121001'),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:25', '2024-05-30 06:56:25', '197508082009121001'),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:25', '2024-05-30 06:56:25', '197508082009121001'),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:25', '2024-05-30 06:56:25', '197508082009121001'),
(12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:25', '2024-05-30 06:56:25', '197508082009121001'),
(13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:26', '2024-05-30 06:56:26', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2022, 0, 0, '2024-05-30 06:56:26', '2024-05-30 06:56:26', '197508082009121001');

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
(7, 7, 0, 0, 0, 2023, '2024-04-18 00:11:21', '2024-04-18 00:11:21', '197508082009121001'),
(8, 1, 0, 0, 0, 2022, '2024-05-30 06:57:20', '2024-05-30 06:57:20', '197508082009121001'),
(9, 2, 0, 0, 0, 2022, '2024-05-30 06:57:20', '2024-05-30 06:57:20', '197508082009121001'),
(10, 3, 0, 0, 0, 2022, '2024-05-30 06:57:20', '2024-05-30 06:57:20', '197508082009121001'),
(11, 4, 0, 0, 0, 2022, '2024-05-30 06:57:20', '2024-05-30 06:57:20', '197508082009121001'),
(12, 5, 0, 0, 0, 2022, '2024-05-30 06:57:20', '2024-05-30 06:57:20', '197508082009121001'),
(13, 6, 0, 0, 0, 2022, '2024-05-30 06:57:20', '2024-05-30 06:57:20', '197508082009121001'),
(14, 7, 0, 0, 0, 2022, '2024-05-30 06:57:21', '2024-05-30 06:57:21', '197508082009121001');

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
(7, 7, 0, 0, 0, 0, 0, 0, 0, 2023, '2024-04-18 02:18:19', '2024-04-18 02:18:19', '197508082009121001'),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:01', '2024-05-30 06:57:01', '197508082009121001'),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:01', '2024-05-30 06:57:01', '197508082009121001'),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:02', '2024-05-30 06:57:02', '197508082009121001'),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:02', '2024-05-30 06:57:02', '197508082009121001'),
(12, 5, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:02', '2024-05-30 06:57:02', '197508082009121001'),
(13, 6, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:02', '2024-05-30 06:57:02', '197508082009121001'),
(14, 7, 0, 0, 0, 0, 0, 0, 0, 2022, '2024-05-30 06:57:02', '2024-05-30 06:57:02', '197508082009121001');

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
-- Indexes for table `wil_administrasi`
--
ALTER TABLE `wil_administrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
