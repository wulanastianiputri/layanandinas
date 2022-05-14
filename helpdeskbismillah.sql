-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 06:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdeskbismillah`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AllBerita` ()  NO SQL
SELECT * FROM berita$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(3) UNSIGNED NOT NULL,
  `namabidang` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `namabidang`, `created_at`, `updated_at`) VALUES
(1, 'Bidang E-Government', '2021-04-26 00:45:41', '2021-07-06 15:56:16'),
(2, 'Bidang Teknologi Informasi', '2019-04-22 11:25:17', '2019-04-22 11:28:55'),
(3, 'Bidang Statistik Sektoral', '2021-02-23 03:55:42', '2021-02-23 04:00:03'),
(4, 'Bidang Komunikasi dan Informasi Publik', '2021-04-26 00:41:55', '2021-04-26 00:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(2, 'Mengapa Permintaan Layanan belum kami jawab?', 'Permintaan Layanan akan kami jawab pada saat hari kerja.', '2021-07-06 04:05:16', '2021-07-06 04:05:54'),
(3, 'Status awal layanan?', 'Status awal layanan adalah belum diverifikasi.', '2021-07-06 04:05:16', '2021-07-06 04:05:54'),
(4, 'Bagaimana jika salah menulis permintaan layanan?', 'Anda bisa melakukan edit layanan.', '2021-07-06 04:05:16', '2021-07-06 04:05:54'),
(6, 'Bagaimana jika Anda lupa password?', 'Anda bisa menghubungi diskominfo melalui nomor Telp. 0251- 8321075.', '2021-07-06 04:05:16', '2021-07-06 04:05:54'),
(7, 'Bagaimana jika Anda lupa password?', 'Anda bisa menghubungi diskominfomelalui nomor Telp. 0251- 8321075.', '2021-07-06 04:05:16', '2021-07-06 04:05:54'),
(9, 'Bagaimana jika salah menulis permintaan layanan?', 'Anda bisa melakukan edit layanan.', '2021-07-08 02:09:07', '2021-07-08 02:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `permintaanlayanan_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `permintaanlayanan_id`, `user_id`, `jawaban`, `created_at`, `updated_at`) VALUES
(118, 33, 1, 'tolong secepatnya diatasi', '2021-04-18 07:29:02', '2021-04-18 07:29:02'),
(120, 50, 2, 'Tolong diatasi', '2021-04-18 23:00:30', '2021-04-18 23:00:30'),
(122, 34, 2, 'Baik pak, Ditunggu ya', '2021-04-18 23:02:24', '2021-04-18 23:02:24'),
(124, 39, 5, 'Tolong ya pak', '2021-04-18 23:07:11', '2021-04-18 23:07:11'),
(128, 41, 4, 'secepatnya ya pak', '2021-05-03 07:14:32', '2021-05-03 07:14:32'),
(129, 45, 3, 'tolong pak', '2021-05-03 07:14:54', '2021-05-03 07:14:54'),
(136, 40, 114, 'Baik pak, akan Kami coba perbaiki.', '2021-05-04 01:12:32', '2021-05-04 01:12:32'),
(137, 39, 114, 'baik pak, akan kami perbaiki', '2021-05-04 01:15:04', '2021-05-04 01:15:04'),
(139, 46, 114, 'Harap isi kolom pengajuan dengan benar', '2021-07-06 02:52:50', '2021-07-06 02:52:50'),
(140, 47, 114, 'Baik pak akan saya tindaklanjuti ke bidang', '2021-07-07 05:38:46', '2021-07-07 05:38:46'),
(143, 81, 1, 'Tolong pak secepatnya', '2021-07-07 17:23:05', '2021-07-07 17:23:05'),
(144, 87, 3, 'Apakah sudah ada tindak lanjut?', '2021-09-01 00:26:56', '2021-09-01 00:26:56'),
(149, 49, 3, 'Mohon secepatnya pak', '2021-09-03 07:39:58', '2021-09-03 07:39:58'),
(150, 39, 115, 'Kesalahan domain sedang dalam perbaikan', '2021-11-27 04:57:40', '2021-11-27 04:57:40'),
(151, 51, 116, 'Baik akan kami tindaklanjuti', '2021-11-27 19:57:34', '2021-11-27 19:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) UNSIGNED NOT NULL,
  `namakategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` int(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `namakategori`, `bidang_id`, `created_at`, `updated_at`) VALUES
(1, 'Aplikasi', 1, '2021-03-04 23:57:34', '2021-03-04 23:57:34'),
(2, 'Sub Domain', 1, '2021-03-04 23:57:47', '2021-03-04 23:57:47'),
(3, 'Email Kota Bogor', 1, '2021-03-04 23:58:09', '2021-03-04 23:58:09'),
(4, 'Jaringan', 2, '2021-03-04 23:56:47', '2021-03-04 23:56:47'),
(5, 'WiFi Public', 2, '2021-03-04 23:57:12', '2021-03-04 23:57:22'),
(6, 'Hosting', 2, '2021-03-04 23:58:25', '2021-03-04 23:58:25'),
(7, 'Collocation Server', 2, '2021-03-04 23:58:42', '2021-05-02 01:09:04'),
(8, 'Permohonan Data Statistik Tingkat Kota Bogor', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Konsultasi Pengelolaan Aplikasi Sibadra', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Streaming Radio dan Iklan Layanan Masyarakat', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Publikasi Media Sosial (IG, Twitter, FB, YT)\r\n', 4, '2021-04-25 09:33:58', '2021-04-25 09:34:10'),
(12, 'Kemitraan Media', 4, '2021-04-25 09:34:18', '2021-04-25 09:34:24'),
(13, 'Lain-lain', 1, '2021-04-25 09:38:47', '2021-04-25 09:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `pd_id` int(5) NOT NULL,
  `kategori_id` int(5) NOT NULL,
  `status_id` int(3) NOT NULL,
  `proses_id` int(5) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `pd_id`, `kategori_id`, `status_id`, `proses_id`, `user_id`, `judul`, `isi`, `foto`, `tanggal`, `created_at`, `updated_at`) VALUES
(39, 5, 2, 8, 115, 5, 'Domain Salah', '<p>TOlong diperbaiki</p>', NULL, '2021-04-15', '2021-04-14 18:23:25', '2021-11-27 20:05:08'),
(40, 4, 4, 5, 4, 4, 'Jaringan Tidak Ada', '<p>Mohon Bantuannya</p>', NULL, '2021-04-15', '2021-04-14 18:35:37', '2021-04-14 18:35:37'),
(41, 4, 4, 5, 4, 4, 'Jaringan Tidak Ada', '<p>Mohon diperbaiki</p>', NULL, '2021-04-15', '2021-04-14 18:37:19', '2021-04-14 18:37:19'),
(43, 3, 11, 1, 4, 3, 'Publikasi seminar pengelolaan aset', '<p>Tolong di publikasikan pada Instagram Diskominfo</p>', '80051-2021-09-01-15-43-32.PNG', '2021-04-16', '2021-04-15 20:36:34', '2021-09-01 08:50:21'),
(45, 3, 8, 8, 117, 3, 'Data Statistik Covid', '<p>Permohonan Data Covid</p>', NULL, '2021-04-19', '2021-04-18 22:25:23', '2021-11-26 03:58:18'),
(46, 3, 13, 6, 2, 3, 'jkj', '<p>nbnb</p>', NULL, '2021-04-19', '2021-04-18 22:30:53', '2021-04-18 22:30:53'),
(47, 2, 12, 8, 118, 2, 'Siaran Webinar', '<p>Mohon Dibantu</p>', NULL, '2021-04-19', '2021-04-18 22:32:46', '2021-11-27 20:12:23'),
(48, 2, 1, 1, 0, 2, 'Aplikasi Detektif Covid Tidak Bisa Diakses', '<p>Tolong diperbaiki</p>', NULL, '2021-04-19', '2021-04-18 22:33:23', '2021-07-07 15:03:15'),
(49, 3, 11, 1, 0, 3, 'Publikasi Acara ke IG', '<p>Mohon bantuannya</p>', NULL, '2021-04-19', '2021-04-18 22:34:14', '2021-04-18 22:34:14'),
(50, 2, 13, 1, 0, 2, 'bdsnbsbn', '<p>ndbnb</p>', NULL, '2021-04-19', '2021-04-18 22:34:39', '2021-04-18 22:34:39'),
(51, 3, 7, 7, 116, 3, 'Server Down', '<p>segera perbaiki</p>', NULL, '2021-04-19', '2021-04-19 01:54:52', '2021-11-27 19:57:14'),
(52, 2, 6, 1, 0, 2, 'Cara Hosting web', '<p>Mohon bantuannya</p>', NULL, '2021-04-22', '2021-04-21 16:06:10', '2021-04-21 16:06:10'),
(53, 2, 5, 1, 0, 2, 'Wifi rusak', '<p>Tolong</p>', NULL, '2021-04-25', '2021-04-24 19:08:26', '2021-04-24 19:08:26'),
(54, 3, 6, 1, 0, 3, 'Hosting Aplikasi Pemkot', '<p>Mohon bantuannya</p>', NULL, '2021-04-30', '2021-04-29 20:14:25', '2021-09-01 01:06:13'),
(55, 2, 1, 4, 115, 2, 'Pembuatan Aplikasi', '<p>Pembuatan Aplikasi</p>', NULL, '2021-05-03', '2021-05-03 17:33:08', '2021-11-27 20:05:58'),
(56, 2, 1, 1, 2, 2, 'aannan', '<p>sadasdsafdfs</p>', NULL, '2021-05-03', '2021-05-04 00:09:21', '2021-05-04 00:09:21'),
(57, 2, 7, 5, 2, 2, 'Server Tidak bisa diakses', '<p>Mohon bantuannya</p>', NULL, '2021-05-04', '2021-05-04 16:54:33', '2021-05-04 16:59:36'),
(59, 3, 1, 4, 115, 3, 'Internet mati', '<p>Internet mati</p>', NULL, '2021-06-09', '2021-06-09 20:56:41', '2021-11-27 20:07:15'),
(60, 3, 1, 1, 1, 3, 'Aplikasi tidak bisa dibuka', '<p>111</p>', NULL, '2021-06-23', '2021-06-23 15:18:15', '2021-06-23 15:18:15'),
(61, 2, 1, 1, 1, 2, 'ta', '<p>iii</p>', NULL, '2021-06-23', '2021-06-23 15:21:18', '2021-06-23 15:21:18'),
(62, 2, 1, 1, 1, 2, 'ammsn', '<p>sa</p>', NULL, '2021-06-23', '2021-06-23 16:49:15', '2021-06-23 16:49:15'),
(63, 3, 1, 1, 1, 3, 'Aplikasi TND', '<p>Mohon bantuannya</p>', NULL, '2021-06-24', '2021-06-24 16:59:23', '2021-08-19 20:01:11'),
(64, 3, 1, 3, 114, 3, 'Aplikasi tidak bisa dibuka', '<p>aplikasi</p>', NULL, '2021-06-24', '2021-06-24 17:13:56', '2021-11-27 03:19:50'),
(65, 2, 1, 1, 108, 2, 'Jaringan', '<p>Jaringan mati, mohon ditangani</p>', NULL, '2021-06-24', '2021-06-25 10:53:45', '2021-06-25 10:53:45'),
(66, 2, 1, 1, 2, 2, 'Jaringan', '<p>Jaringan mati mohon ditangani</p>', NULL, '2021-06-24', '2021-06-25 12:45:57', '2021-06-25 12:45:57'),
(68, 1, 1, 1, 1, 1, 'Internet mati', '<p>Tolong, akses kami mati</p>', NULL, '2021-06-24', '2021-06-25 13:01:16', '2021-06-25 13:01:16'),
(69, 1, 1, 1, 1, 1, 'Apliksasi Sibadra lemot', '<p>Mohon bantuannya</p>', NULL, '2021-06-24', '2021-06-25 13:03:36', '2021-06-25 13:03:36'),
(77, 1, 1, 2, 3, 1, 'Aplikasi Tidak bisa diakses', '<p>Mohon Bantuannya</p>', NULL, '2021-07-07', '2021-07-07 05:34:28', '2021-07-07 05:37:12'),
(78, 1, 6, 1, 2, 1, 'Hosting tidak bisa diakses', '<p>Mohon maff hostingan aplikasi TND tidak bisa diakses</p>', '21703-2021-07-07-14-17-40.png', '2021-07-07', '2021-07-07 07:17:40', '2021-07-07 07:17:40'),
(79, 1, 8, 1, 2, 1, 'Permohonan Data Covid', '<p>Mohon Bantuannya</p>', NULL, '2021-07-07', '2021-07-07 16:12:53', '2021-07-07 16:12:53'),
(81, 1, 4, 1, 2, 1, 'Jaringan Tidak bisa diakses', '<p>Tolong pak</p>', '98638-2021-07-08-00-21-23.PNG', '2021-07-08', '2021-07-07 17:20:02', '2021-07-07 17:21:23'),
(82, 3, 6, 2, 4, 3, 'Cara Hosting web', '<p>Tolong dibantu untuk hosting web BKAD</p>', NULL, '2021-08-19', '2021-08-04 03:04:25', '2021-11-26 07:41:53'),
(89, 3, 1, 8, 115, 3, 'Aplikasi error', '<ul>\r\n	<li><strong>Mohon bantuannya</strong></li>\r\n	<li><strong>Tolong yaa</strong></li>\r\n</ul>', NULL, '2021-09-01', '2021-09-01 01:11:54', '2021-09-02 07:58:36'),
(90, 3, 8, 4, 117, 3, 'Data bantuan kuota Perangkat Daerah', '<p>Mohon bantuannya</p>', NULL, '2021-09-01', '2021-09-01 01:21:48', '2021-09-02 05:50:47'),
(92, 3, 5, 1, 2, 3, 'Wifi rusak', '<p>Mohon bantuannya di perbaiki</p>', NULL, '2021-09-02', '2021-09-03 02:10:12', '2021-09-03 02:10:37'),
(93, 3, 1, 1, 2, 3, 'Hosting domain salah', '<p>Mohon bantuannya</p>', NULL, '2021-09-03', '2021-09-03 02:18:23', '2021-09-03 02:18:23'),
(94, 3, 13, 1, 2, 3, 'Apa itu server?', '<p>Saya tidak paham</p>', NULL, '2021-09-03', '2021-09-03 02:30:42', '2021-09-03 02:31:06'),
(95, 3, 5, 1, 2, 3, 'Wifi error', '<p>Mohon diperbaiki</p>', '54589-2021-09-03-09-52-35.PNG', '2021-09-03', '2021-09-03 02:52:35', '2021-09-03 02:53:08'),
(96, 3, 1, 1, 2, 3, 'Aplikasi Tidak bisa diakses', '<p>Mohon bantuannya</p>', NULL, '2021-09-03', '2021-09-03 03:24:55', '2021-09-03 03:24:55'),
(97, 3, 1, 1, 2, 3, 'Data surat TND tidak masuk', '<p>Mohon bantuanya</p>', NULL, '2021-09-03', '2021-09-03 03:44:26', '2021-09-03 04:22:46'),
(98, 3, 1, 1, 2, 3, 'Dokumen tidak bisa di unduh', '<p>Mohon bantuannya</p>', NULL, '2021-09-03', '2021-09-03 03:45:37', '2021-09-03 04:20:01'),
(99, 3, 8, 1, 2, 3, 'data keuangan paket internet', '<p>DSaya mohon disiapkan data paket internet untuk dimasukan dalama anggaran tahunan.</p>', NULL, '2021-09-03', '2021-09-03 03:51:53', '2021-09-03 04:21:02'),
(100, 3, 1, 1, 2, 3, 'Publikasi seminar', '<p>Mohon bantuannya</p>', '50237-2021-09-03-11-18-39.PNG', '2021-09-03', '2021-09-03 04:18:39', '2021-09-03 04:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(3) NOT NULL,
  `namalevel` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `namalevel`, `created_at`, `updated_at`) VALUES
(0, 'Super admin', '2019-04-22 10:27:06', '2019-04-22 10:27:06'),
(1, 'Perangkat Daerah', '2019-04-22 11:25:17', '2019-04-22 11:28:55'),
(2, 'Verifikator', '2021-02-23 03:55:42', '2021-02-23 04:00:03'),
(3, 'Bidang Layanan E-Government', '2021-03-01 21:12:26', '2021-03-01 21:12:26'),
(4, 'Bidang Teknologi Informasi', NULL, NULL),
(5, 'Bidang Statistik Sektoral', NULL, NULL),
(6, 'Bidang Komunikasi dan Informasi Publik', NULL, '2021-07-06 12:32:24'),
(7, 'Eksekutif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pd`
--

CREATE TABLE `pd` (
  `id` int(5) UNSIGNED NOT NULL,
  `namapd` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomenklatur` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pd`
--

INSERT INTO `pd` (`id`, `namapd`, `nomenklatur`, `alamat`, `email`, `telp`, `website`, `kontak`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'bkpsdm', 'Jl. Julang 1 No.7A, RT.02/RW.4, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161', '-', '(0251)8382027', 'https://bkpsdm.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(2, 'Badan Kesatuan Bangsa dan Politik', 'kesbangpol', 'Jl. KSR Dadi Kusmayadi No.41, Tengah, Cibinong, Bogor, Jawa Barat 16914', '-', '(0251)8758836', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(3, 'Badan Keuangan dan Aset Daerah', 'bkad', 'Jl. Ir. H. Juanda No.10, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'bkad0@gmail.com', '(0251)8323099', 'http://', '-', '-', '2019-04-22 10:27:06', '2021-08-19 20:25:09'),
(4, 'Badan Penanggulangan Bencana Daerah Kota Bogor', 'bpbd', 'Jl. Pool Bina Marga No.2, RT.02/RW.01, Kayu Manis, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16169', '-', '0251)8576126', 'https://bpbd.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(5, 'Badan Pendapatan Daerah Kota Bogor', 'bapenda', 'Jl. Pemuda No.31, RT.01/RW.06, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16162', '-', '(0251)8322871', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(6, 'Badan Perencanaan Pembangunan Daerah Kota Bogor', 'bappeda', 'DPRD, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', '-', '081284485997', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(7, 'Dinas Arsip dan Perpustakaan Kota Bogor', 'diskarpus', 'JL Medika 1A, No. 2, Perum Menteng Asri, RT.02/RW.20, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16111', 'diskarpus@kotabogor.go.id', '(0251)8380247', 'https://diskarpus.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(9, 'Dinas Kesehatan Kota Bogor', 'diskes', 'Jl. Kesehatan No.04, RT.02/RW.02, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161', '-', '(0251)8331753', 'https://dinkes.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(10, 'Dinas Ketahanan Pangan dan Pertanian Kota Bogor', 'dkpp', 'Jalan Raya Cipaku Blok Kampung Suka Warna No.13, Cipaku, Bogor Selatan, RT.03/RW.03, Cipaku, Kec. Bogor Sel., Kota Bogor', '-', '-', 'dkpp.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(11, 'Dinas Komunikasi dan Informatika Kota Bogor', 'diskominfo', 'Jl. Ir. H. Juanda No.10, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'kominfo@kotabogor.go.id', '(0518)8321075', 'https://kominfo.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(12, 'Dinas Koperasi, Usaha Kecil dan Menengah Kota Bogor', 'kumkm', 'Jl. Dadali No.2 No.3, Tanah Sareal, Tanah Sereal, Kota Bogor, Jawa Barat 16161', '-', '(0251)8336661', 'https://kumkm.kotabogor.go.id/profile/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(13, 'Dinas Lingkungan Hidup Kota Bogor', 'dlh', 'Jl. Paledang No.43, RT.01/RW.02, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122', 'dlh@kotabogor.go.id', '-', 'https://www.dinaslingkunganhidup.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(14, 'Dinas Pariwisata dan Kebudayaan Kota Bogor', 'disparbud', 'Jalan Pandu Raya No. 45, Tegal Gundil, Bogor Tengah, RT.01/RW.16, Tegal Gundil, Kec. Bogor Utara, Kota Bogor, Jawa Barat', 'http://disbudpar.kotabogor.go.id/', '(0251)8328827', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(15, 'Dinas Pekerjaan Umum dan Penataan Ruang Kota Bogor', 'pupr', 'Bogor, RT.02/RW.01, Kayu Manis, Tanah Sereal, Bogor City, West Java 16169', '-', '(0251)8380180', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(16, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak Kota Bogor', 'dpmppa', 'Jl. Ciwaringin No.99, RT.01/RW.09, Ciwaringin, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16124', '-', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(17, 'Dinas Pemuda dan Olahraga Kota Bogor', 'dispora', 'Jl. Pemuda No.4, RT.04/RW.01, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16162', '-', '(0251) 8332882', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(18, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Bogor', 'dpmptsp', 'Jl. Kapten Muslihat No.21, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122', 'dpmptsp.bgr@kgmail.com', '(0251)8356167', 'https://perizinan.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(19, 'Dinas Pendidikan Kota Bogor', 'disdik', 'Jl. Raya Pajajaran No.125, RT.01/RW.05, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'disdik@kotabogor.go.id', '(0251)8341101', 'https://disdik.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(20, 'Dinas Pengendalian Penduduk dan Keluarga Berencana Kota Bogor', 'dppkb', 'Jl. Senam No.1, RT.04/RW.02, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161', '-', '(0251)8340057', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(21, 'Dinas Perdagangan dan Perindustrian Kota Bogor', 'disperindag', 'Jl. Dadali No.4, RT.03/RW.06, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161', 'ikm@email.co.id', '(0251)8338788', 'disperindag.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(22, 'Dinas Perhubungan Kota Bogor', 'dishub', 'Jalan Raya Tajur No. 54 Tajur Bogor selatan, RT.01/RW.04, Tajur, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16134', '-', '-', 'http://dishub.kotabogor.co.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(23, 'Dinas Perumahan dan Pemukiman Kota Bogor', 'disperumkim', 'Jl. Pengadilan No.8a, RT.03/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'Yanlik@menpan.go.id', '(0251)8313922', 'https://sipp.menpan.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(24, 'Dinas Sosial Kota Bogor', 'dinsos', 'Jl. Merdeka No.142, RT.03/RW.05, Ciwaringin, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16125', '-', '(0251)8332315', 'http://dinsos.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(25, 'Dinas Tenaga Kerja Kota Bogor', 'disnaker', 'Jl. DR. Sumeru No.64-66, RT.01/RW.02, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16125', 'dinakertrans@kotabogor.go.id', '(0251)7568630', 'https://bogorkerja.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(26, 'Inspektorat Daerah Kota Bogor', 'inspektorat', 'Jl. Raya Pajajaran No.05, RT.02/RW.04, Baranangsiang, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16143', '-', '(0251)8313274', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(27, 'Kecamatan Bogor Barat Kota Bogor', 'bobar', 'Jl. KH.TB.M.Falak No.319', 'bogorbaratkecamatan@gmail.com', '0251 7537855', 'https://kecbogorbarat.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(28, 'Kecamatan Bogor Selatan Kota Bogor', 'bosel', 'Jl.Layungsari III No. 41. Bogor, Jawa Barat.', 'kec.bogorselatan@kotabogor.go.id', '(0251) 8322812', 'https://kecbogorselatan.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(29, 'Kecamatan Bogor Tengah Kota Bogor', 'bogortengah', 'Jl. Kantin No. 2', 'kec.boteng@kotabogor.go.id', '0251 - 8323351', 'https://kecbogortengah.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(30, 'Kecamatan Bogor Timur Kota Bogor', 'kecbogortimur', 'Jl. Raya Pajajaran No. 16', 'kec.botim@kotabogor.go.id', '(0251) 8326773', 'https://kecbogortimur.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(31, 'Kecamatan Bogor Utara Kota Bogor', 'kecbogorutara', 'Jl. Gagalur II No. 2', 'kec.bout@kotabogor.go.id', '(0251) 8323444', 'https://kecbogorutara.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(32, 'Kecamatan Tanah Sareal Kota Bogor', 'kectanahsereal', 'Jl.Kebon Pedes No.20', 'kec_tansar@kotabogor.go.id', '0251 - 8637761', 'https://kectanahsareal.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(33, 'Kelurahan Babakan Kecamatan Bogor Tengah', 'kelbabakan', 'Jl. Malabar Ujung No.7 RT 02 RW 07', 'kel.babakan@kotabogor.go.id', '-', 'https://kelbabakan.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(34, 'Kelurahan Babakan Pasar Kecamatan Bogor Tengah', 'kelbabakanpasar', 'Jl. Roda I No 2', 'kel.babakanpasar@kotabogor.go.id', '0251 - 8374653', 'https://kelbabakanpasar.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(35, 'Kelurahan Balumbang Jaya Kecamatan Bogor Barat', 'kelbalumbangjaya', 'jl.Raya Balumbang Jaya', 'kel.balumbangjaya@kotabogor.go.id', '0251 - 622444', 'https://kelbalumbangjaya.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(36, 'Kelurahan Bantarjati Kecamatan Bogor Utara', 'kelbantarjati', 'Jl. Ceremai Ujung No. 2 Kel. Bantarjati Kec. Bogor Utara', 'kel.bantarjati@kotabogor.go.id', '0251-8320233', 'https://kelbantarjati.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(37, 'Kelurahan Baranangsiang Kecamatan Bogor Timur', 'kelbaranangsiang', 'Jl. Riau No.13, Bogor Tim., Kota Bogor, Jawa Barat 16143', '-', '(0251) 353750', 'https://kelbaranangsiang.kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(38, 'Kelurahan Batutulis Bogor Selatan', 'kelbatutulis', 'Jl. Jaya Tunggal No.17a', 'kel.batutulis@kotabogor.go.id', '-', 'https://kelbatutulis.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(39, 'Kelurahan Bojongkerta Kecamatan Bogor Selatan', 'kelbojongkerta', 'Jl. Bojong Pesantren Rt 03/ 02', 'kel.bojongkerta@kotabogor.go.id', '(0251) 8248736', 'https://kelbojongkerta.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(40, 'Kelurahan Bondongan Kecamatan Bogor Selatan', 'kelbondongan', '-', 'kel.bondongan@kotabogor.go.id', '-', 'https://kelbondongan.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(41, 'Kelurahan Bubulak Kecamatan Bogor Selatan', 'kelbubulak', 'Jl. Griya Warna Karya No. 1', 'Kel.bubulak@kotabogor.go.id', '(0251) 8627947', 'https://kelbubulak.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(42, 'Kelurahan Cibadak Kecamatan Tanah Sareal', 'kelcibadak', 'Jl. Taman Sari Persada No.1', 'kel.cibadak@kotabogor.go.id', '0251 - 7546212', 'https://kelcibadak.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(43, 'Kelurahan Cibogor Kecamatan Bogor Tengah', 'kelcibogor', 'Jl. RE.Martadinata No.5 Bogor 16124', 'kel.cibogor@kotabogor.go.id', '0251 - 8353948', 'https://kelcibogor.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(44, 'Kelurahan Cibuluh Kecamatan Bogor Utara', 'kelcibuluh', 'Jl. Pangeran Sogiri RT 01 / 04, Bogor Utara,Bogor', 'kel.cibuluh@kotabogor.go.id', '0251 - 8653235', 'https://kelcibuluh.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(45, 'Kelurahan Cikaret Kecamatan Bogor Selatan', 'kelcikaret', 'Jl. R. kosasih No.32 Bogor', 'kel.cikaret@kotabogor.go.id', '(0251) 8487219', 'https://kelcikaret.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(46, 'Kelurahan Cilendek Barat Kecamatan Bogor Barat', 'kelcilendekbarat', 'Jl. Brigjen H. Saptadji Hadiprawira No.70 - Kota Bogor', 'kel.cilendekbarat@kotabogor.go.id', '(0251) 8321542', 'https://kelcilendekbarat.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(47, 'Kelurahan Cilendek Timur Kecamatan Bogor Barat', 'kelcilendektimur', 'Jl.Cilendek Gg. Mesjid No. 56', 'cilendektimur313@gmail.com', '0251 - 8342269', 'https://kelcilendektimur.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(48, 'Kelurahan Ciluar Jaya Kecamatan Bogor Utara', 'kelciluarjaya', 'Jalan Sukaraja No. 300. Bogor Utara', 'kel.ciluar@kotabogor.go.id', '(0251)8651196', 'https://kelciluar.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(49, 'Kelurahan Cimahpar Kecamatan Bogor Utara', 'kelcimahpar', 'Jl. Tumenggung Wiradireja No. 106 Bogor Utara', 'kel.cimahpar@kotabogor.go.id', '(0251)8651781', 'https://kelcimahpar.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(50, 'Kelurahan Cipaku Kecamatan Bogor Selatan', 'kelcipaku', 'l. Raya Cipaku No.03 Bogor', 'kel.cipaku@kotabogor.go.id', '0251 - 8637761', 'https://kelcipaku.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(51, 'Kelurahan Ciparigi Kecamatan Bogor Utara', 'kelciparigi', 'Boulevard No. 1 Villa Bogor Indah Blok CC Bogor', 'kel.ciparigi@kotabogor.go.id', '(0251)8651596', 'https://kelciparigi.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(52, 'Kelurahan Ciwaringin Kecamatan Bogor Tengah', 'kelciwaringin', 'Jl. R.E Martadinata No.40', 'kel.ciwaringin@kotabogor.go.id', '-', 'https://kelciwaringin.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(53, 'Kelurahan Curug Kecamatan Bogor Barat', 'kelcurug', 'Jl.Desa Curug No.7', 'kel.curug@kotabogor.go.id', '0251 - 7531302', 'https://kelcurug.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(54, 'Kelurahan Curug Mekar Kecamatan Bogor Barat', 'kelcurugmekar', 'Jl. KH.R. Abdullah Bin Nuh No.3', 'kel.curugmekar@kotabogor.go.id', '(0251) 7542696', 'https://kelcurugmekar.kotabogor.go.id', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(55, 'Kelurahan Empang Kecamatan Bogor selatan', 'kelempang', 'Jl. Pahlawan No. 144 BOGOR 16132', 'kelurahanempang@yahoo.com', '(0251) 8487219', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(56, 'Kelurahan Genteng Kecamatan Bogor selatan', 'kelgenteng', 'Jl. Sukamanah RT 1/1 No. 28 Bogor', 'kel.genteng@kotabogor.go.id', '(0251) 8376350', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(57, 'Kelurahan Gudang Kecamatan Bogor tengah', 'kelgudang', 'Jalan Padasuka No.05', 'kel.gudang@kotabogor.go.id', '0878 700 700 74', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(58, 'Kelurahan Gunung Batu Kecamatan Bogor barat', 'kelgunungbatu', 'Jl. Mayjen Ishak Djuarsa No. 253', 'kgunungbatu@gmail.com', '(0251) 8383083', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(59, 'Kelurahan Harjasari Kecamatan Bogor selatan', 'kelharjasari', 'Jl. Rulita No 85', 'kel.harjasari@kotabogor.go.id', '(0251) 8637761', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(60, 'Kelurahan Katulampa Kecamatan Bogor Timur', 'kelkatulampa', 'Jl. Raya Pajajaran No. 16', 'kec.botim@kotabogor.go.id', '(0251) 8326773', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(61, 'Kelurahan Kayu manis Kecamatan Tanah Sareal', 'kelkayumanis', 'Jl. Pool Bina Marga No. 3', 'kel.kayumanis@kotabogor.go.id', '(0251) 7539477', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(62, 'Kelurahan Kebon Kalapa Kecamatan Bogor tengah', 'kelkebonkalapa', 'Jl. Semboja no 2', 'kel.kebonkalapa@kotabogor.go.id', '0251-8371667', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(63, 'Kelurahan Kebon Pedes Kacamatan Tanah Sareal', 'kelkebonpedes', 'Jl. Pondok Rumput No. 40', 'kel.kebonpedes@kotabogor.go.id', '0251 - 8330964', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(64, 'Kelurahan Kedung Badak Kecamatan Tanah Sareal', 'kelkedungbadak', 'Jl. Cimanggu No : 4', 'kel.kedungbadak@kotabogor.go.id', '0251 - 8278032', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(65, 'Kelurahan Kedung Halang Kecamatan Bogor Utara', 'kelkedunghalang', 'Jl. Raya Kedung Halang No.03, Bogor Utara', 'kel.kedunghalang@kotabogor.go.id', '0251 - 8660272', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(66, 'Kelurahan Kedung Jaya Kecamatan Tanah Sareal', 'kelkedungjaya', 'Jl. Singasari No. 1 Perumahan Cimanggu Permai - 16164', 'kel.kedungjaya@kotabogor.go.id', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(67, 'Kelurahan Kedung Waringin Kecamatan Tanah Sareal', 'kelkedungwaringin', 'Jl. Taman Cimanggu Utara No. 2 Rt. 03 / 08 Bogor 16163', 'kel.kedungwaringin@kotabogor.go.id', '(0251) 8317010', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(68, 'Kelurahan Kencana Kecamatan Tanah Sareal', 'kelkencana', 'Jl. Lantana Raya No.1', 'kel_kencana@kotabogor.go.id', '0251 - 7540265', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(69, 'Kelurahan Kertamaya Kecamatan Bogor Selatan', 'kertamaya', 'Jalan Margabhakti No.25 Bogor', 'kel.kertamaya@kotabogor.go.id', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(70, 'Kelurahan Lawanggintung Kecamatan Bogor Selatan', 'kellawanggintung', 'Jl.Lawanggintung Rt 03/05', 'kel.lawanggintung@kotabogor.go.id', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(71, 'Kelurahan Loji Kecamatan Bogor Barat', 'kelloji', 'Jl. Siaga No. 49 Komplek Pertanian Kec. Bogor Barat', 'kel.loji@kotabogor.go.id', '(0251)8242695', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(72, 'Kelurahan Margajaya Kecamatan Bogor Barat', 'kelmargajaya', 'Jln. Raya dramaga Km 7', 'kel.margajaya@kotabogor.go.id', '0251 - 86627735', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(73, 'Kelurahan Mekarwangi Kecamatan Tanah Sareal', 'kelmekarwangi', 'Jl. K.H. Ahmad Sya\'yani No. 18', 'kel.mekarwangi@kotabogor.go.id', '0251 - 7543656', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(74, 'Kelurahan Menteng Kecamatan Bogor Barat', 'kelmenteng', 'Jl. Medika Raya No.1 Bogor 16111', 'kel.menteng@kotabogor.go.id', '0251 8330117', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(75, 'Kelurahan Muarasari Kecamatan Bogor Selatan', 'kelmuarasari', 'Kp. Hegar Sari RT. 03 / 01', 'kel.muarasari@kotabogor.go.id', '0251 - 8371154', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(76, 'Kelurahan Mulyaharja Kecamatan Bogor Selatan', 'kelmulyaharja', 'Jalan Raya Cibeureum No. 13', 'kel.mulyaharja@kotabogor.go.id', '(0251) 8388 135', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(77, 'Kelurahan Pabaton Kecamatan Bogor tengah', 'kelpabaton', 'Jln. Telepon No.2 Bogor Tengah', 'kel.pabaton@kotabogor.go.id', '0251 - 8361733', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(78, 'Kelurahan Pakuan Kecamatan Bogor Selatan', 'kelpakuan', 'Jl. Dahlia VI No.4 Kel.Pakuan', 'kel.pakuan@kotabogor.go.id', '0251-8319427', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(79, 'Kelurahan Paledang Kecamatan Bogor Tengah', 'kelpaledang', 'Jalan Selot No.18', 'kel.paledang@kotabogor.go.id', '0251 ? 8327383', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(80, 'Kelurahan Pamoyanan Kecamatan Bogor Selatan', 'kelpamoyanan', 'Jl. RE Soemantadiredja No. 3.', 'kel.pamoyanan@kotabogor.go.id', '0251 - 8211437', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(81, 'Kelurahan Panaragan Kecamatan Bogor Tengah', 'kelpanaragan', 'Jl.Panaragan Kidul No.3', 'kel.panaragan@kotabogor.go.id', '0251 - 8320812', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(82, 'Kelurahan Pasir Jaya Kecamatan Bogor Barat', 'kelpasirjaya', 'Jl. TAMAN CIBALAGUNG NO 1', 'kel.pasirjaya@kotabogor.go.id', '0251 - 8631606', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(83, 'Kelurahan Pasir Kuda Kecamatan Bogor Barat', 'kelpasirkuda', 'Jl. R. Aria Surialaga No. 29', 'kel.pasirkuda@kotabogor.go.id', '0251 - 8637761', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(84, 'Kelurahan Pasir Mulya Kecamatan Bogor Barat', 'kelpasirmulya', 'Jl. RE. Abdullah No. 16', 'kel.pasirmulya@kotabogor.go.id', '0251 - 8633370', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(85, 'Kelurahan Rancamaya Kecamatan Bogor Selatan', 'kelrancamaya', 'Jalan Rancamaya No.24 Bogor', 'kel.rancamaya@kotabogor.go.id', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(86, 'Kelurahan Ranggamekar Kecamatan Bogor Selatan', 'kelranggamekar', '-', 'kel.ranggamekar@kotabogor.go.id', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(87, 'Kelurahan Semplak Kecamatan Bogor Barat', 'kelsemplak', 'Jl. HT. SOBARI NO.19 SEMPLAK', 'kel.semplak@kotabogor.go.id', '0251 - 7539794', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(88, 'Kelurahan Sempur Kecamatan Bogor Tengah', 'kelsempur', 'Jl. Sempur No 33 Rt 03/01', 'kel.sempur@kotabogor.go.id', '0251 - 8363519', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(89, 'Kelurahan Sindang Barang Kecamatan Bogor Barat', 'kelsindangbarang', 'Jl. H. M. Syarifuddin No. 25', 'kel.sindangbarang@kotabogor.go.id', '0251 - 8628033', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(90, 'Kelurahan Sindangrasa Kecamatan Bogor Timur', 'kelsindangrasa', 'Jl. Muara Tegal RT.002/001, Kelurahan Sindangrasa Kecamatan Bogor Timur Kota Bogor', 'kel.sindangrasa@kotabogor.go.id', '0251 - 8637761 ', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(91, 'Kelurahan Sindangsari Kecamatan Bogor Timur', 'kelsindangsari', 'Jl. Raya Wangun No. 332', 'kel.sindangsari@kotabogor.go.id', '0251 - 8242695', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(92, 'Kelurahan Situ Gede Kecamatan Bogor Barat', 'kelsitugede', 'Jl.Tambakan RT 01/05', 'kel.situgede@kotabogor.go.id', '0251 - 8421093', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(93, 'Kelurahan Sukadamai Kecamatan Tanah Sareal', 'kelsukadamai', 'Jl.Ramin No.11 Perum Budi Agung', 'kel.sukadamai@kotabogor.go.id', '0251 - 8356012', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(94, 'Kelurahan Sukaresmi Kecamatan Tanah Sareal', 'kelsukaresmi', 'Jl. Roda I No 2', 'kel.sukaresmi@kotabogor.go.id', '0251 - 8374653', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(95, 'Kelurahan Sukasari Kecamatan Bogor Timur', 'kelsukasari', 'Jl. Sukasari 1 no 7 Kel. Sukasari Kec. Bogor Timur Kota Bogor', 'Sukasari_Sks@yahoo.go.id', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(96, 'Kelurahan Tajur Kecamatan Bogor Timur', 'keltajur', 'Jl. Raya Tajur Gg.Balai Desa Kelurahan Tajur Kecamatan Bogor Timur Kota Bogor', 'kel.tajur@kotabogor.go.id', '[0251] 8381 351', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(97, 'Kelurahan Tanah Baru Kecamatan Bogor Utara', 'keltanahbaru', 'Jl.Pangeran Sogiri No.374 RT.004 RW.002 Kel.Tanah Baru Kec.bogor Utara Kota Bogor', 'kel.tanahbaru@kotabogor.go.id', '(0251) 8242695', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(98, 'Kelurahan Tanah Sareal Kecamatan Tanah sareal', 'keltanahsereal', 'Jl. Kesehatan No.06 Bogor 16161', 'kel.tanahsareal@kotabogor.go.id', '(0251) 8329434', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(99, 'Kelurahan Tegal Gundil Kecamatan Bogor Utara', 'keltegalgundil', 'Jl. Arztimar II No.3', 'kel.tegalgundil@kotabogor.go.id', '0251-8376340', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(100, 'Kelurahan Tegallega Kecamatan Bogor Tengah', 'keltegallega', 'Jl KPP Baranangsiang III No. 2, Bogor Tengah', 'kel.tegallega@kotabogor.go.id', '0251 - 8326632', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(101, 'Pemerintah Kota bogor', 'pemkotbogor', 'Jl. Ir. H. Juanda No.10, RT.01/RW.01, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122', '-', '(0251) 8321075', 'https://kotabogor.go.id/', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(102, 'RSUD Kota Bogor', 'rsudkotabogor', 'Jl. Dr. Sumeru 120 Bogor, Kota Bogor, Indonesia.', 'rsudkotabogor@yahoo.co.id', '0251-8312292', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(103, 'Satuan Polisi Pamong Praja Kota Bogor', 'satpolpp', 'Jl. Raya Pajajaran Gg. Mushola No.121, RT.04/RW.03, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', '-', '(0251) 8318191', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(104, 'Sekretariat Daerah Kota Bogor', 'setda', 'Jl. Ir. H. Juanda No.10, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', '-', '(0251) 8321075', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(105, 'Sekretariat DPRD Kota Bogor', 'setwan', 'Jl. Kapt. Muslihat No. 21 Bogor', '-', '(0251) 823472 ?', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(106, 'Sekretariat KPU Kota bogor', 'setkpu', 'Jl. Loader No.7, RT.04/RW.11, Baranangsiang, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16000', '-', '(0251) 8362669', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57'),
(107, 'Walikota', 'walkot', 'Jl. Ir. H. Juanda No.10, RT.01/RW.01, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', '-', '-', '-', '-', '-', '2019-04-22 10:27:06', '2021-04-24 14:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `pdasli`
--

CREATE TABLE `pdasli` (
  `id` int(5) UNSIGNED NOT NULL,
  `namapd` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomenklatur` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdasli`
--

INSERT INTO `pdasli` (`id`, `namapd`, `nomenklatur`, `alamat`, `email`, `telp`, `website`, `kontak`, `hp`, `created_at`, `updated_at`) VALUES
(3, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'bkpsdm', 'Jl. Julang 1 No.7A, RT.02/RW.4, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161', 'bkpsdm@kotabogor.go.id', '(0251)8382027', 'https://bkpsdm.kotabogor.go.id/', '', '', '2019-04-22 10:27:06', '2019-04-22 10:27:06'),
(19, 'Badan Kesatuan Bangsa dan Politik', 'kesbangpol', 'Jl. KSR Dadi Kusmayadi No.41, Tengah, Cibinong, Bogor, Jawa Barat 16914', 'kesbangpol@gmail.com', '(0251)8758836', 'kesbangpol.kotabogor.go.id', 'nama kontak', 'no hp kontak', '2021-04-10 23:02:59', '2021-04-13 14:57:57'),
(20, 'Badan Keuangan dan Aset Daerah', 'bkad', 'Jl. Ir. H. Juanda No.10, RT.01/RW.01, Pabaton, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'bkad@gmail.com', '0251)8576126', 'bkad.kotabogor.go.id', 'Nama kontak', 'No HP kontak', '2021-04-13 15:00:17', '2021-04-13 15:00:17'),
(21, 'Badan Pendapatan Daerah Kota Bogor', 'bapenda', 'Jl. Pemuda No.31, RT.01/RW.06, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16162', 'bapenda@kotabogor.go.id', '(0251)8322871', 'bapenda.kotabogor.go.id', 'Nama Kontak', 'No HP kontak', '2021-04-13 15:02:36', '2021-04-13 15:02:36'),
(22, 'Badan Penanggulangan Bencana Daerah Kota Bogor', 'bpbd', 'Jl. Pool Bina Marga No.2, RT.02/RW.01, Kayu Manis, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16169', 'bpbd@kotabogor.go.id', '0251)8576126', 'bpbd.kotabogor.go.id', 'Nama Kontak', 'No Hp Kontak', '2021-04-13 15:06:27', '2021-04-13 15:06:27'),
(24, 'Dinas Komunikasi dan Informatika Kota Bogor', 'Diskominfo', 'alamat', 'diskominfo@kotabogor.go.id', '(0251)00000', 'diskominfo@kotabogor.go.id', 'nama kontak', 'no hp', '2021-04-16 01:19:51', '2021-04-16 01:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(3) UNSIGNED NOT NULL,
  `namastatus` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `namastatus`, `created_at`, `updated_at`) VALUES
(1, 'Belum Di Verifikasi', '2021-04-13 00:38:41', '2021-04-15 00:38:41'),
(2, 'Disposisi Kebidang', '2019-04-22 11:25:17', '2021-04-25 17:39:49'),
(3, 'Sudah Dijawab-umum', '2021-02-23 03:55:42', '2021-02-23 04:00:03'),
(4, 'Peninjauan Lapangan', '2021-03-01 21:12:26', '2021-03-01 21:12:26'),
(5, 'Selesai-umum', '2021-03-07 06:26:19', '2021-03-07 06:26:19'),
(6, 'Ditolak', '2021-03-31 17:29:02', '2021-03-31 17:29:02'),
(7, 'Sudah Dijawab-bidang', '2021-05-02 12:34:14', '2021-05-02 12:34:14'),
(8, 'Selesai-bidang', '2021-05-02 12:34:14', '2021-05-02 12:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_id` int(5) NOT NULL,
  `level_id` int(3) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Super Admin','Admin Perangkat Daerah','Admin Verifikator','Admin Bidang','Admin Eksekutif') CHARACTER SET utf8mb4 NOT NULL,
  `foto_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pd_id`, `level_id`, `username`, `email`, `email_verified_at`, `password`, `level`, `foto_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'KESBANGPOL', 2, 1, 'kesbangpol', 'kesbangpol0@gmail.com', '2021-09-02 00:35:22', '$2y$10$nXW9Z2cX8Hr4yqG38YTuVevJ3nkuy2zXjEIIvIhOTVUnNtOmypH0C', 'Admin Perangkat Daerah', '38445-2021-09-01-15-58-21.gif', '', '0000-00-00 00:00:00', '2021-09-02 00:35:22'),
(3, 'BKAD', 3, 1, 'bkad', 'bkad0@gmail.com', '2021-09-02 00:35:46', '$2y$10$.NuUAyGEtYiIhbo8SH7hf.rGfVMFOpYEro2C4YXP8y1Ptj4ZJuZ.u', 'Admin Perangkat Daerah', '79026-2021-08-05-04-59-56.png', '', '0000-00-00 00:00:00', '2021-09-02 00:35:46'),
(4, 'ADMIN BPBD', 4, 1, 'bpbd', 'bpbd0@gmail.com', '2021-09-01 05:33:41', '$2y$10$iRzqL9xOLvsrXoQ40ArTfOqR7Yw2wlkgn48ybEqRNGAxc2toLG/dm', 'Admin Perangkat Daerah', '99554-2021-09-01-12-33-40.gif', '', '0000-00-00 00:00:00', '2021-09-01 05:33:41'),
(5, 'ADMIN BAPENDA', 5, 1, 'bapenda', 'bapenda0@gmail.com', '2021-09-01 05:34:08', '$2y$10$Ypu4fXL.cuiOvxbcPAFGWexB9ZDdbESKG09kDFiXlP5yCnlRRUxwG', 'Admin Perangkat Daerah', '63609-2021-09-01-12-34-08.gif', '', '0000-00-00 00:00:00', '2021-09-01 05:34:08'),
(6, 'BAPPEDA', 6, 1, 'bappeda', 'bappeda0@gmail.com', '2021-09-01 05:34:44', '$2y$10$ZjAIhtPWxpidv1.hf19wl.EcasbeM3p7OJengiJxjJ7IuKrXIlAdC', 'Admin Perangkat Daerah', '71199-2021-09-01-12-34-43.gif', '', '0000-00-00 00:00:00', '2021-09-01 05:34:44'),
(7, 'ADMIN DISKARPUS', 7, 1, 'diskarpus', 'diskarpus@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ADMIN DISDUKCAPIL', 8, 1, 'disdukcapil', 'disdukcapilkotabogor@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'ADMIN DINKES', 9, 1, 'dinkes', 'dinkes0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'ADMIN DKPP', 10, 1, 'dkpp', 'dkpp@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'ADMIN DISKOMINFO', 11, 1, 'diskominfo', 'kominfo@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'ADMIN DKUMKM', 12, 1, 'dkumkm', 'dkumkm0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ADMIN DLH', 13, 1, 'dlh', 'dlh@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'ADMIN DISPARBUD', 14, 1, 'disparbud', 'disparbud0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'ADMIN DPUPR', 15, 1, 'dpupr', 'dpupr0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'ADMIN DPPPA', 16, 1, 'dpppa', 'dppa0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'ADMIN DISPORA', 17, 1, 'dispora', 'dispora0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'ADMIN DPMPTSP', 18, 1, 'dpmptsp', 'dpmptsp.bgr@kgmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'ADMIN DISDIK', 19, 1, 'disdik', 'disdik@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'ADMIN DPPKB', 20, 1, 'dppkb', 'dppkb0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'ADMIN DISPERINDAG', 21, 1, 'disperindag', 'ikm@email.co.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'ADMIN DISHUB', 22, 1, 'dishub', 'dishub0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'ADMIN DISPERUMKIM', 23, 1, 'disperumkim', 'Yanlik@menpan.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'ADMIN DINSOS', 24, 1, 'dinsos', 'dinsos0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'ADMIN DISNAKER', 25, 1, 'disnaker', 'dinakertrans@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'ADMIN INSPEKTORAT', 26, 1, 'inspektorat', 'inspektorat0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'ADMIN KECBOBAR', 27, 1, 'kecbobar', 'bogorbaratkecamatan@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'ADMIN KECBOSEL', 28, 1, 'kecbosel', 'kec.bogorselatan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'ADMIN KECBOTENG', 29, 1, 'kecboteng', 'kec.boteng@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'ADMIN KECBOTIM', 30, 1, 'kecbotim', 'kec.botim@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'ADMIN KECBOUT', 31, 1, 'kecbout', 'kec.bout@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'ADMIN KECTANSAR', 32, 1, 'kectansar', 'kec_tansar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'kelbabakan', 33, 1, 'kelbabakan', 'kel.babakan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'kelbabakanpasar', 34, 1, 'kelbabakanpasar', 'kel.babakanpasar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'kelbalumbangjaya', 35, 1, 'kelbalumbangjaya', 'kel.balumbangjaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'kelbantarjati', 36, 1, 'kelbantarjati', 'kel.bantarjati@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'kelbaranangsiang', 37, 1, 'kelbaranangsiang', 'kelbaranangsiang0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'kelbatutulis', 38, 1, 'kelbatutulis', 'kel.batutulis@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'kelbojongkerta', 39, 1, 'kelbojongkerta', 'kel.bojongkerta@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'kelbondongan', 40, 1, 'kelbondongan', 'kel.bondongan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'kelbubulak', 41, 1, 'kelbubulak', 'Kel.bubulak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'kelcibadak', 42, 1, 'kelcibadak', 'kel.cibadak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'kelcibogor', 43, 1, 'kelcibogor', 'kel.cibogor@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'kelcibuluh', 44, 1, 'kelcibuluh', 'kel.cibuluh@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'kelcikaret', 45, 1, 'kelcikaret', 'kel.cikaret@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'kelcilendekbarat', 46, 1, 'kelcilendekbarat', 'kel.cilendekbarat@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'kelcilendektimur', 47, 1, 'kelcilendektimur', 'cilendektimur313@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'kelciluarjaya', 48, 1, 'kelciluarjaya', 'kel.ciluar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'kelcimahpar', 49, 1, 'kelcimahpar', 'kel.cimahpar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'kelcipaku', 50, 1, 'kelcipaku', 'kel.cipaku@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'kelciparigi', 51, 1, 'kelciparigi', 'kel.ciparigi@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'kelciwaringin', 52, 1, 'kelciwaringin', 'kel.ciwaringin@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'kelcurug', 53, 1, 'kelcurug', 'kel.curug@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'kelcurugmekar', 54, 1, 'kelcurugmekar', 'kel.curugmekar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'kelempang', 55, 1, 'kelempang', 'kelurahanempang@yahoo.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'kelgenteng', 56, 1, 'kelgenteng', 'kel.genteng@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'kelgudang', 57, 1, 'kelgudang', 'kel.gudang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'kelgunungbatu', 58, 1, 'kelgunungbatu', 'kgunungbatu@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'kelharjasari', 59, 1, 'kelharjasari', 'kel.harjasari@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'kelkatulampa', 60, 1, 'kelkatulampa', 'kec.katulampa@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'kelkayumanis', 61, 1, 'kelkayumanis', 'kel.kayumanis@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'kelkebonkalapa', 62, 1, 'kelkebonkalapa', 'kel.kebonkalapa@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'kelkebonpedes', 63, 1, 'kelkebonpedes', 'kel.kebonpedes@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'kelkedungbadak', 64, 1, 'kelkedungbadak', 'kel.kedungbadak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'kelkedunghalang', 65, 1, 'kelkedunghalang', 'kel.kedunghalang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'kelkedungjaya', 66, 1, 'kelkedungjaya', 'kel.kedungjaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'kelkedungwaringin', 67, 1, 'kelkedungwaringin', 'kel.kedungwaringin@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'kelkencana', 68, 1, 'kelkencana', 'kel_kencana@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'kertamaya', 69, 1, 'kertamaya', 'kel.kertamaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'kellawanggintung', 70, 1, 'kellawanggintung', 'kel.lawanggintung@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'kelloji', 71, 1, 'kelloji', 'kel.loji@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'kelmargajaya', 72, 1, 'kelmargajaya', 'kel.margajaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'kelmekarwangi', 73, 1, 'kelmekarwangi', 'kel.mekarwangi@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'kelmenteng', 74, 1, 'kelmenteng', 'kel.menteng@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'kelmuarasari', 75, 1, 'kelmuarasari', 'kel.muarasari@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'kelmulyaharja', 76, 1, 'kelmulyaharja', 'kel.mulyaharja@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'kelpabaton', 77, 1, 'kelpabaton', 'kel.pabaton@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'kelpakuan', 78, 1, 'kelpakuan', 'kel.pakuan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'kelpaledang', 79, 1, 'kelpaledang', 'kel.paledang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'kelpamoyanan', 80, 1, 'kelpamoyanan', 'kel.pamoyanan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'kelpanaragan', 81, 1, 'kelpanaragan', 'kel.panaragan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'kelpasirjaya', 82, 1, 'kelpasirjaya', 'kel.pasirjaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'kelpasirkuda', 83, 1, 'kelpasirkuda', 'kel.pasirkuda@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'kelpasirmulya', 84, 1, 'kelpasirmulya', 'kel.pasirmulya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'kelrancamaya', 85, 1, 'kelrancamaya', 'kel.rancamaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'kelranggamekar', 86, 1, 'kelranggamekar', 'kel.ranggamekar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'kelsemplak', 87, 1, 'kelsemplak', 'kel.semplak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'kelsempur', 88, 1, 'kelsempur', 'kel.sempur@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'kelsindangbarang', 89, 1, 'kelsindangbarang', 'kel.sindangbarang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'kelsindangrasa', 90, 1, 'kelsindangrasa', 'kel.sindangrasa@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'kelsindangsari', 91, 1, 'kelsindangsari', 'kel.sindangsari@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'kelsitugede', 92, 1, 'kelsitugede', 'kel.situgede@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'kelsukadamai', 93, 1, 'kelsukadamai', 'kel.sukadamai@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'kelsukaresmi', 94, 1, 'kelsukaresmi', 'kel.sukaresmi@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'kelsukasari', 95, 1, 'kelsukasari', 'Sukasari_Sks@yahoo.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'keltajur', 96, 1, 'keltajur', 'kel.tajur@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'keltanahbaru', 97, 1, 'keltanahbaru', 'kel.tanahbaru@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'keltanahsereal', 98, 1, 'keltanahsereal', 'kel.tanahsareal@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'keltegalgundil', 99, 1, 'keltegalgundil', 'kel.tegalgundil@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'keltegallega', 100, 1, 'keltegallega', 'kel.tegallega@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'pemkotbogor', 101, 1, 'pemkotbogor', 'pemkot0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'ADMIN RSUD', 102, 1, 'rsud', 'rsudkotabogor@yahoo.co.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'ADMIN SATPOLPP', 103, 1, 'satpolpp', 'satpolpp@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'ADMIN SETDA', 104, 1, 'setda', 'setda0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'ADMIN SETWAN', 105, 1, 'setwan', 'setwan0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'ADMIN SETKPU', 106, 1, 'setkpu', 'setkpu0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'ADMIN WALKOT', 107, 1, 'walkot', 'walkot0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'ADMIN DIKOMINFO ', 11, 2, 'diskominfo2', 'nurfazriati10@gmail.com', '2021-05-02 20:51:46', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Verifikator', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'ADMIN DIKOMINFO ', 11, 3, 'diskominfo3', 'wulan_astiani@apps.ipb.ac.id', '2021-05-02 20:51:59', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'ADMIN DIKOMINFO ', 11, 4, 'diskominfo4', 'wulanastiani@gmail.com', '2021-05-02 20:52:11', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'ADMIN DIKOMINFO ', 11, 5, 'diskominfo5', 'wulan2@gmail.com', '2021-05-02 20:52:19', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'ADMIN DIKOMINFO ', 11, 6, 'diskominfo6', 'wulan3@gmail.com', '2021-05-02 20:52:27', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'super admin', 11, 0, 'superadmin', 'superadmin@gmail.com', '2021-09-01 08:56:56', '$2y$10$jrY2tIGBS8xRQVssCPrc7.JEExyYL9YhLjMLs4t1jOoqHPr7Krq/W', 'Super Admin', '13195-2021-09-01-15-56-56.gif', '', '0000-00-00 00:00:00', '2021-09-01 08:56:56'),
(114, 'Verifikator', 11, 2, 'verifikator', 'shamdi.rh@gmail.com', '2021-09-01 08:58:21', '$2y$10$qomhnmzVW7a6v3XUZXuxBeJKKHsWa9R.wEy7ckNzRyRTDR9N1Agxa', 'Admin Verifikator', '38445-2021-09-01-15-58-21.gif', '', '0000-00-00 00:00:00', '2021-09-01 08:58:21'),
(115, 'e-government', 11, 3, 'e-government', 'e-government@gmail.com', '2021-09-01 08:57:36', '$2y$10$3Zr/iyw5oPtU1QluGLqAX.BsX.oMrz2djFSAW2jwd/IWKmL3ysbXy', 'Admin Bidang', '85839-2021-09-01-15-57-36.gif', '', '0000-00-00 00:00:00', '2021-09-01 08:57:36'),
(116, 'TI', 11, 4, 'ti', 'ti@gmail.com', '2021-09-01 08:54:00', '$2y$10$m9KiC8wTWnjNg0ofZ5LfXui4qvkl/ar8EVzQW87CHiAlqRfgHWxqW', 'Admin Bidang', '52997-2021-09-01-15-54-00.gif', '', '0000-00-00 00:00:00', '2021-09-01 08:54:00'),
(117, 'Statistik', 11, 5, 'statistik', 'statistik@gmail.com', '2021-09-01 08:55:01', '$2y$10$.ImH6tpjxUUcYUYiIEesXuFZJf4ea6OVDYQk49oFElap8emPRCbTS', 'Admin Bidang', '97627-2021-09-01-15-55-01.gif', '', '0000-00-00 00:00:00', '2021-09-01 08:55:01'),
(118, 'KIP', 11, 6, 'kip', 'kip@gmail.com', '2021-09-01 08:56:10', '$2y$10$TmQCB2hIVg.p8bCRzWsVeuFUjDnGAWknFnsH77xvvV/NvjnoMRcwC', 'Admin Bidang', '16705-2021-09-01-15-56-10.gif', '', '0000-00-00 00:00:00', '2021-09-01 08:56:10'),
(121, 'Achmad Sandy', 11, 7, 'achmadsandy', 'achmadsandy@gmail.com', '2021-06-29 09:24:33', '$2y$10$ifGIBDZjzRWsaAMYLYVOy.QSlESngIuarqI0dwnjH8jmkG/dMecWW', 'Super Admin', '90173-2021-05-02-10-36-55.jpg', NULL, '2021-04-28 21:18:30', '2021-06-29 02:24:33'),
(124, 'Taufik Hidayat', 11, 7, 'taufik', 'taufik@gmail.com', '2021-05-02 20:55:33', '$2y$10$UPQjpifRrRRJYAIVqu58w.hahGsq1xPjOlqTkXsQ0pM8BpF77q6gy', 'Super Admin', '83443-2021-05-02-20-55-32.jpg', NULL, '2021-05-02 13:55:33', '2021-05-02 13:55:33'),
(125, 'Rizky Maulana', 11, 0, 'Super Admin', 'maulana@kotabogor.go.id', '2021-07-06 15:30:23', '$2y$10$Q3Z6LhAGUWsKUbqsSwQuzOGfX/e10Ug1p2a6AX8NypK4GbNxxK9g.', 'Super Admin', '53703-2021-07-06-15-28-20.png', NULL, '2021-07-06 08:26:19', '2021-07-06 08:30:23'),
(126, 'Fathny Syafa Rasyidah', 107, 1, 'walikota', 'fathnysyafar123@gmail.com', '2021-09-01 11:09:17', '$2y$10$SiJyRwY3kKsasqOyMCpAQ.nywMacc1Sjzsx6xk8oF/5vLA/W5IqVy', 'Super Admin', '88305-2021-09-01-18-09-17.gif', NULL, '2021-09-01 11:09:17', '2021-09-01 11:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_id` int(5) NOT NULL,
  `level_id` int(3) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Super Admin','Admin Perangkat Daerah','Admin Verifikator','Admin Bidang','Admin Eksekutif') CHARACTER SET utf8mb4 NOT NULL,
  `foto_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `name`, `pd_id`, `level_id`, `username`, `email`, `email_verified_at`, `password`, `level`, `foto_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN BKPSDA', 1, 1, 'bkpsda', 'bkpsda0@gmail.com', '2021-05-03 04:00:57', '$2y$10$Olt3STcXXYoxqlTNpPoz0uT0LJDWIUFUsNIskEtcFAv8chYoB90hi', 'Admin Perangkat Daerah', '65203-2021-05-02-20-33-56.jpg', '', '0000-00-00 00:00:00', '2021-05-02 21:00:57'),
(2, 'ADMIN KESBANGPOL', 2, 1, 'kesbangpol', 'kesbangpol0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ADMIN BKAD', 3, 1, 'bkad', 'bkad0@gmail.com', '2021-05-03 03:59:23', '$2y$10$guo/oGd/S3RxXp6ulx5wVOc171F3xznHSzU8Ym7ZHGeAMbWGZs5WG', 'Admin Perangkat Daerah', '48926-2021-05-02-20-30-58.jpg', '', '0000-00-00 00:00:00', '2021-05-02 20:59:23'),
(4, 'ADMIN BPBD', 4, 1, 'bpbd', 'bpbd0@gmail.com', '2021-05-03 04:01:53', '$2y$10$/n02mwc/.69lEHQxzQBB3erDjaCi3kHfy/eReEQ6vWE8ANShiegnK', 'Admin Perangkat Daerah', '59634-2021-05-02-20-46-06.jpg', '', '0000-00-00 00:00:00', '2021-05-02 21:01:53'),
(5, 'ADMIN BAPENDA', 5, 1, 'bapenda', 'bapenda0@gmail.com', '2021-05-03 03:53:47', '$2y$10$JaSSH4nZrRRNECtuXSjq.eSDxVhN7PRTNn2lvOnITHRD6Gqy9b9U6', 'Admin Perangkat Daerah', '84043-2021-05-02-20-36-38.jpg', '', '0000-00-00 00:00:00', '2021-05-02 20:53:47'),
(6, 'ADMIN BAPPEDA', 6, 1, 'bappeda', 'bappeda0@gmail.com', '2021-05-03 03:54:35', '$2y$10$sZaI5XPPm4belGb.JQKlj.xLN6hhtl.kh.QYsnV49GfTdKVpFCg06', 'Admin Perangkat Daerah', '52000-2021-05-02-20-38-43.jpg', '', '0000-00-00 00:00:00', '2021-05-02 20:54:35'),
(7, 'ADMIN DISKARPUS', 7, 1, 'diskarpus', 'diskarpus@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ADMIN DISDUKCAPIL', 8, 1, 'disdukcapil', 'disdukcapilkotabogor@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'ADMIN DINKES', 9, 1, 'dinkes', 'dinkes0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'ADMIN DKPP', 10, 1, 'dkpp', 'dkpp@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'ADMIN DISKOMINFO', 11, 1, 'diskominfo', 'kominfo@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'ADMIN DKUMKM', 12, 1, 'dkumkm', 'dkumkm0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ADMIN DLH', 13, 1, 'dlh', 'dlh@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'ADMIN DISPARBUD', 14, 1, 'disparbud', 'disparbud0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'ADMIN DPUPR', 15, 1, 'dpupr', 'dpupr0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'ADMIN DPPPA', 16, 1, 'dpppa', 'dppa0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'ADMIN DISPORA', 17, 1, 'dispora', 'dispora0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'ADMIN DPMPTSP', 18, 1, 'dpmptsp', 'dpmptsp.bgr@kgmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'ADMIN DISDIK', 19, 1, 'disdik', 'disdik@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'ADMIN DPPKB', 20, 1, 'dppkb', 'dppkb0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'ADMIN DISPERINDAG', 21, 1, 'disperindag', 'ikm@email.co.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'ADMIN DISHUB', 22, 1, 'dishub', 'dishub0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'ADMIN DISPERUMKIM', 23, 1, 'disperumkim', 'Yanlik@menpan.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'ADMIN DINSOS', 24, 1, 'dinsos', 'dinsos0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'ADMIN DISNAKER', 25, 1, 'disnaker', 'dinakertrans@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'ADMIN INSPEKTORAT', 26, 1, 'inspektorat', 'inspektorat0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'ADMIN KECBOBAR', 27, 1, 'kecbobar', 'bogorbaratkecamatan@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'ADMIN KECBOSEL', 28, 1, 'kecbosel', 'kec.bogorselatan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'ADMIN KECBOTENG', 29, 1, 'kecboteng', 'kec.boteng@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'ADMIN KECBOTIM', 30, 1, 'kecbotim', 'kec.botim@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'ADMIN KECBOUT', 31, 1, 'kecbout', 'kec.bout@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'ADMIN KECTANSAR', 32, 1, 'kectansar', 'kec_tansar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'kelbabakan', 33, 1, 'kelbabakan', 'kel.babakan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'kelbabakanpasar', 34, 1, 'kelbabakanpasar', 'kel.babakanpasar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'kelbalumbangjaya', 35, 1, 'kelbalumbangjaya', 'kel.balumbangjaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'kelbantarjati', 36, 1, 'kelbantarjati', 'kel.bantarjati@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'kelbaranangsiang', 37, 1, 'kelbaranangsiang', 'kelbaranangsiang0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'kelbatutulis', 38, 1, 'kelbatutulis', 'kel.batutulis@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'kelbojongkerta', 39, 1, 'kelbojongkerta', 'kel.bojongkerta@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'kelbondongan', 40, 1, 'kelbondongan', 'kel.bondongan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'kelbubulak', 41, 1, 'kelbubulak', 'Kel.bubulak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'kelcibadak', 42, 1, 'kelcibadak', 'kel.cibadak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'kelcibogor', 43, 1, 'kelcibogor', 'kel.cibogor@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'kelcibuluh', 44, 1, 'kelcibuluh', 'kel.cibuluh@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'kelcikaret', 45, 1, 'kelcikaret', 'kel.cikaret@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'kelcilendekbarat', 46, 1, 'kelcilendekbarat', 'kel.cilendekbarat@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'kelcilendektimur', 47, 1, 'kelcilendektimur', 'cilendektimur313@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'kelciluarjaya', 48, 1, 'kelciluarjaya', 'kel.ciluar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'kelcimahpar', 49, 1, 'kelcimahpar', 'kel.cimahpar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'kelcipaku', 50, 1, 'kelcipaku', 'kel.cipaku@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'kelciparigi', 51, 1, 'kelciparigi', 'kel.ciparigi@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'kelciwaringin', 52, 1, 'kelciwaringin', 'kel.ciwaringin@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'kelcurug', 53, 1, 'kelcurug', 'kel.curug@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'kelcurugmekar', 54, 1, 'kelcurugmekar', 'kel.curugmekar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'kelempang', 55, 1, 'kelempang', 'kelurahanempang@yahoo.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'kelgenteng', 56, 1, 'kelgenteng', 'kel.genteng@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'kelgudang', 57, 1, 'kelgudang', 'kel.gudang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'kelgunungbatu', 58, 1, 'kelgunungbatu', 'kgunungbatu@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'kelharjasari', 59, 1, 'kelharjasari', 'kel.harjasari@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'kelkatulampa', 60, 1, 'kelkatulampa', 'kec.katulampa@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'kelkayumanis', 61, 1, 'kelkayumanis', 'kel.kayumanis@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'kelkebonkalapa', 62, 1, 'kelkebonkalapa', 'kel.kebonkalapa@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'kelkebonpedes', 63, 1, 'kelkebonpedes', 'kel.kebonpedes@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'kelkedungbadak', 64, 1, 'kelkedungbadak', 'kel.kedungbadak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'kelkedunghalang', 65, 1, 'kelkedunghalang', 'kel.kedunghalang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'kelkedungjaya', 66, 1, 'kelkedungjaya', 'kel.kedungjaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'kelkedungwaringin', 67, 1, 'kelkedungwaringin', 'kel.kedungwaringin@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'kelkencana', 68, 1, 'kelkencana', 'kel_kencana@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'kertamaya', 69, 1, 'kertamaya', 'kel.kertamaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'kellawanggintung', 70, 1, 'kellawanggintung', 'kel.lawanggintung@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'kelloji', 71, 1, 'kelloji', 'kel.loji@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'kelmargajaya', 72, 1, 'kelmargajaya', 'kel.margajaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'kelmekarwangi', 73, 1, 'kelmekarwangi', 'kel.mekarwangi@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'kelmenteng', 74, 1, 'kelmenteng', 'kel.menteng@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'kelmuarasari', 75, 1, 'kelmuarasari', 'kel.muarasari@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'kelmulyaharja', 76, 1, 'kelmulyaharja', 'kel.mulyaharja@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'kelpabaton', 77, 1, 'kelpabaton', 'kel.pabaton@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'kelpakuan', 78, 1, 'kelpakuan', 'kel.pakuan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'kelpaledang', 79, 1, 'kelpaledang', 'kel.paledang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'kelpamoyanan', 80, 1, 'kelpamoyanan', 'kel.pamoyanan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'kelpanaragan', 81, 1, 'kelpanaragan', 'kel.panaragan@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'kelpasirjaya', 82, 1, 'kelpasirjaya', 'kel.pasirjaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'kelpasirkuda', 83, 1, 'kelpasirkuda', 'kel.pasirkuda@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'kelpasirmulya', 84, 1, 'kelpasirmulya', 'kel.pasirmulya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'kelrancamaya', 85, 1, 'kelrancamaya', 'kel.rancamaya@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'kelranggamekar', 86, 1, 'kelranggamekar', 'kel.ranggamekar@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'kelsemplak', 87, 1, 'kelsemplak', 'kel.semplak@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'kelsempur', 88, 1, 'kelsempur', 'kel.sempur@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'kelsindangbarang', 89, 1, 'kelsindangbarang', 'kel.sindangbarang@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'kelsindangrasa', 90, 1, 'kelsindangrasa', 'kel.sindangrasa@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'kelsindangsari', 91, 1, 'kelsindangsari', 'kel.sindangsari@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'kelsitugede', 92, 1, 'kelsitugede', 'kel.situgede@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'kelsukadamai', 93, 1, 'kelsukadamai', 'kel.sukadamai@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'kelsukaresmi', 94, 1, 'kelsukaresmi', 'kel.sukaresmi@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'kelsukasari', 95, 1, 'kelsukasari', 'Sukasari_Sks@yahoo.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'keltajur', 96, 1, 'keltajur', 'kel.tajur@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'keltanahbaru', 97, 1, 'keltanahbaru', 'kel.tanahbaru@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'keltanahsereal', 98, 1, 'keltanahsereal', 'kel.tanahsareal@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'keltegalgundil', 99, 1, 'keltegalgundil', 'kel.tegalgundil@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'keltegallega', 100, 1, 'keltegallega', 'kel.tegallega@kotabogor.go.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'pemkotbogor', 101, 1, 'pemkotbogor', 'pemkot0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'ADMIN RSUD', 102, 1, 'rsud', 'rsudkotabogor@yahoo.co.id', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'ADMIN SATPOLPP', 103, 1, 'satpolpp', 'satpolpp@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'ADMIN SETDA', 104, 1, 'setda', 'setda0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'ADMIN SETWAN', 105, 1, 'setwan', 'setwan0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'ADMIN SETKPU', 106, 1, 'setkpu', 'setkpu0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'ADMIN WALKOT', 107, 1, 'walkot', 'walkot0@gmail.com', '0000-00-00 00:00:00', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Perangkat Daerah', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'ADMIN DIKOMINFO ', 11, 2, 'diskominfo2', 'nurfazriati10@gmail.com', '2021-05-02 20:51:46', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Verifikator', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'ADMIN DIKOMINFO ', 11, 3, 'diskominfo3', 'wulan_astiani@apps.ipb.ac.id', '2021-05-02 20:51:59', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'ADMIN DIKOMINFO ', 11, 4, 'diskominfo4', 'wulanastiani@gmail.com', '2021-05-02 20:52:11', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'ADMIN DIKOMINFO ', 11, 5, 'diskominfo5', 'wulan2@gmail.com', '2021-05-02 20:52:19', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'ADMIN DIKOMINFO ', 11, 6, 'diskominfo6', 'wulan3@gmail.com', '2021-05-02 20:52:27', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'super admin', 11, 0, 'superadmin', 'superadmin@gmail.com', '2021-05-02 20:49:42', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Super Admin', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Verifikator', 11, 2, 'verifikator', 'shamdi.rh@gmail.com', '2021-05-02 20:49:01', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Verifikator', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'e-government', 11, 3, 'e-government', 'e-government@gmail.com', '2021-04-30 05:37:59', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'TI', 11, 4, 'ti', 'ti@gmail.com', '2021-04-30 05:37:25', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Statistik', 11, 5, 'statistik', 'statistik@gmail.com', '2021-04-30 05:36:56', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'KIP', 11, 6, 'kip', 'kip@gmail.com', '2021-04-30 05:36:15', '$2y$10$ojCzarX1xaQHBP8mURsmc.bA5dPvKn1CIO1bKS/9z81odM9PS68Oy', 'Admin Bidang', 'default.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Achmad Sandy', 11, 7, 'achmadsandy', 'achmadsandy@gmail.com', '2021-05-02 10:36:55', 'H3lpDe5kL71$', 'Super Admin', '90173-2021-05-02-10-36-55.jpg', NULL, '2021-04-28 21:18:30', '2021-05-02 03:36:55'),
(124, 'Taufik Hidayat', 11, 7, 'taufik', 'taufik@gmail.com', '2021-05-02 20:55:33', '$2y$10$UPQjpifRrRRJYAIVqu58w.hahGsq1xPjOlqTkXsQ0pM8BpF77q6gy', 'Super Admin', '83443-2021-05-02-20-55-32.jpg', NULL, '2021-05-02 13:55:33', '2021-05-02 13:55:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pd_id` (`pd_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pd`
--
ALTER TABLE `pd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`),
  ADD UNIQUE KEY `users_username_unique` (`email`),
  ADD KEY `pd_id` (`pd_id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `pd`
--
ALTER TABLE `pd`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
