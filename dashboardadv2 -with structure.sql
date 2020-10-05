-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2020 at 03:57 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboardadv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachable_id` int(10) UNSIGNED NOT NULL,
  `attachable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `title`, `url`, `attachable_id`, `attachable_type`, `created_at`, `updated_at`) VALUES
(1, 'UAT Lesen Komposit', '1600359610_UAT Lesen Komposit.pdf', 7, 'App\\Laporan', '2020-09-17 08:20:10', '2020-09-17 08:20:10'),
(7, 'Gambar 0', '/uploads/16003783350.png', 11, 'App\\Penemuan', '2020-09-17 13:32:15', '2020-09-17 13:32:15'),
(41, 'Mak Dara (8)', '1600400285_Mak Dara (8).jpg', 8, 'App\\Laporan', '2020-09-17 19:38:05', '2020-09-17 19:38:05'),
(42, 'Gambar 0', '/uploads/16004004470.png', 12, 'App\\Penemuan', '2020-09-17 19:40:47', '2020-09-17 19:40:47'),
(43, 'Gambar 1', '/uploads/16004004471.png', 12, 'App\\Penemuan', '2020-09-17 19:40:47', '2020-09-17 19:40:47'),
(46, 'Gambar 0', '/uploads/16004005570.png', 13, 'App\\Penemuan', '2020-09-17 19:49:34', '2020-09-17 19:49:34'),
(47, 'Gambar 0', '/uploads/16004158290.png', 14, 'App\\Penemuan', '2020-09-17 23:57:09', '2020-09-17 23:57:09'),
(48, 'Panduan Solat Tarawih Jakim', '1600876826_Panduan Solat Tarawih Jakim.pdf', 9, 'App\\Laporan', '2020-09-23 08:00:26', '2020-09-23 08:00:26'),
(49, 'Gambar 0', '/uploads/16003819630.png', 9, 'App\\Penemuan', '2020-10-04 19:33:37', '2020-10-04 19:33:37'),
(50, 'Gambar 1', '/uploads/16003819631.png', 9, 'App\\Penemuan', '2020-10-04 19:33:37', '2020-10-04 19:33:37'),
(51, 'Gambar 2', '/uploads/16003821572.png', 9, 'App\\Penemuan', '2020-10-04 19:33:37', '2020-10-04 19:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `auditipenemuan`
--

CREATE TABLE `auditipenemuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auditi` bigint(20) UNSIGNED NOT NULL,
  `laporan_id` bigint(20) UNSIGNED NOT NULL,
  `penemuan_id` bigint(20) UNSIGNED NOT NULL,
  `organisasi_id` bigint(20) UNSIGNED NOT NULL,
  `progress_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auditipenemuan`
--

INSERT INTO `auditipenemuan` (`id`, `auditi`, `laporan_id`, `penemuan_id`, `organisasi_id`, `progress_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(35, 38, 8, 13, 19, 1, '2020-09-17 19:49:35', '2020-09-17 19:49:35', NULL),
(36, 5, 8, 14, 5, 1, '2020-09-17 23:57:09', '2020-09-17 23:57:09', NULL),
(37, 38, 7, 15, 19, 1, '2020-09-23 10:17:44', '2020-09-23 10:17:44', NULL),
(38, 46, 7, 15, 39, 1, '2020-09-23 10:17:44', '2020-09-23 10:17:44', NULL),
(39, 38, 8, 16, 19, 1, '2020-09-23 10:19:34', '2020-09-23 10:19:34', NULL),
(40, 46, 8, 16, 39, 1, '2020-09-23 10:19:34', '2020-09-23 10:19:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawatan`
--

CREATE TABLE `jawatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawatan`
--

INSERT INTO `jawatan` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ketua Pengarah', NULL, NULL),
(2, 'Timbalan Ketua Pengarah', NULL, NULL),
(3, 'Pengarah', NULL, NULL),
(4, 'Timbalan Pengarah', NULL, NULL),
(5, 'Ketua Cawangan', NULL, NULL),
(6, 'Eksekutif Kanan', NULL, NULL),
(7, 'Eksekutif', NULL, NULL),
(8, 'Pengurus Besar', NULL, NULL),
(9, 'Pengurus Bahagian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawatankuasa`
--

CREATE TABLE `jawatankuasa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawatankuasa`
--

INSERT INTO `jawatankuasa` (`id`, `laporan_id`, `user_id`, `posisi`, `created_at`, `updated_at`) VALUES
(13, 7, 95, 'auditor', '2020-09-17 08:20:09', '2020-09-17 08:20:09'),
(14, 7, 12, 'kcad', '2020-09-17 08:20:09', '2020-09-17 08:20:09'),
(15, 7, 1, 'auditor', '2020-09-17 08:20:09', '2020-09-17 08:20:09'),
(16, 8, 95, 'auditor', '2020-09-17 19:38:05', '2020-09-17 19:38:05'),
(17, 8, 1, 'auditor', '2020-09-17 19:38:05', '2020-09-17 19:38:05'),
(18, 8, 12, 'kcad', '2020-09-17 19:38:05', '2020-09-17 19:38:05'),
(19, 9, 12, 'auditor', '2020-09-23 08:00:25', '2020-09-23 08:00:25'),
(20, 9, 10, 'auditor', '2020-09-23 08:00:26', '2020-09-23 08:00:26'),
(21, 9, 12, 'auditor', '2020-09-23 08:00:26', '2020-09-23 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaudit`
--

CREATE TABLE `kategoriaudit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subkategori` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoriaudit`
--

INSERT INTO `kategoriaudit` (`id`, `name`, `subkategori`, `created_at`, `updated_at`) VALUES
(1, 'Audit Kewangan', NULL, NULL, NULL),
(2, 'Audit Pengurusan', 1, NULL, NULL),
(3, 'Audit Hasil dan Belanja', 1, NULL, NULL),
(4, 'Audit Perolehan', 1, NULL, NULL),
(5, 'Audit Prestasi', NULL, NULL, NULL),
(6, 'Audit Prestasi', 5, NULL, NULL),
(7, 'Audit Prestasi Aktiviti', 5, NULL, NULL),
(8, 'Audit Teknologi Maklumat', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tajuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh` datetime NOT NULL,
  `tahun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor` bigint(20) UNSIGNED NOT NULL,
  `kcad` bigint(20) UNSIGNED NOT NULL,
  `organisasi_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `tajuk`, `tarikh`, `tahun`, `auditor`, `kcad`, `organisasi_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(7, 'Non sit perferendis', '1987-05-11 00:00:00', '2020', 95, 12, 180, 7, '2020-09-17 08:20:09', '2020-09-17 08:20:09'),
(8, 'Laporan Audit Prestasi Projek Tanaman Sawit', '2020-03-04 00:00:00', '2019', 95, 12, 19, 7, '2020-09-17 19:38:05', '2020-09-17 19:38:05'),
(9, 'Ut cum deserunt cons', '1971-08-28 00:00:00', 'Dolorem mollit ex qu', 95, 11, 160, 6, '2020-09-23 08:00:25', '2020-09-23 08:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `maklumbalas`
--

CREATE TABLE `maklumbalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jawatankuasa_id` bigint(20) UNSIGNED NOT NULL,
  `auditipenemuan_id` bigint(20) UNSIGNED NOT NULL,
  `auditi` bigint(20) UNSIGNED NOT NULL,
  `progress_id` bigint(20) UNSIGNED NOT NULL,
  `maklumbalas` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ulasan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_09_01_075340_create_jawatans_table', 1),
(2, '2020_09_01_080058_create_negeris_table', 1),
(3, '2020_09_01_080059_create_org_types_table', 1),
(4, '2020_09_01_080756_create_organisasis_table', 1),
(5, '2020_09_01_080759_create_users_table', 1),
(6, '2020_09_01_080760_create_password_resets_table', 1),
(7, '2020_09_01_080800_create_failed_jobs_table', 1),
(9, '2020_09_03_031948_add_address2_to_organisasi', 2),
(10, '2020_09_07_014343_create_permission_tables', 2),
(30, '2020_09_07_172106_create_kategoriaudits_table', 3),
(31, '2020_09_07_172819_create_attachments_table', 3),
(32, '2020_09_07_173327_create_laporans_table', 3),
(33, '2020_09_07_173444_create_progress_table', 3),
(34, '2020_09_07_173555_create_penemuans_table', 3),
(35, '2020_09_07_173556_create_ulasanpenemuans_table', 3),
(36, '2020_09_07_173557_create_auditipenemuans_table', 3),
(37, '2020_09_07_173630_create_jawatankuasas_table', 3),
(38, '2020_09_07_184314_create_maklumbalas_table', 3),
(39, '2020_09_17_155226_add_title_to_attachments', 4),
(40, '2020_09_17_184833_change_penemuan_column_type', 5),
(41, '2020_09_17_220552_add_delete_to_auditipenemuan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(3, 'App\\User', 5),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(5, 'App\\User', 9),
(2, 'App\\User', 10),
(1, 'App\\User', 11),
(2, 'App\\User', 11),
(4, 'App\\User', 11),
(2, 'App\\User', 12),
(4, 'App\\User', 12),
(3, 'App\\User', 13),
(3, 'App\\User', 14),
(3, 'App\\User', 15),
(3, 'App\\User', 16),
(3, 'App\\User', 17),
(3, 'App\\User', 19),
(1, 'App\\User', 36),
(3, 'App\\User', 36),
(3, 'App\\User', 38),
(3, 'App\\User', 46),
(3, 'App\\User', 76),
(3, 'App\\User', 82),
(3, 'App\\User', 84),
(1, 'App\\User', 95),
(2, 'App\\User', 95);

-- --------------------------------------------------------

--
-- Table structure for table `negeri`
--

CREATE TABLE `negeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `negeri`
--

INSERT INTO `negeri` (`id`, `name`, `nickname`, `created_at`, `updated_at`) VALUES
(1, 'Johor', 'Jhr', NULL, NULL),
(2, 'Kedah', 'Kdh', NULL, NULL),
(3, 'Kelantan', 'Kltn', NULL, NULL),
(4, 'Melaka', 'Mlk', NULL, NULL),
(5, 'Negeri Sembilan', 'NS', NULL, NULL),
(6, 'Pahang', 'Phg', NULL, NULL),
(7, 'Pulau Pinang', 'PP', NULL, NULL),
(8, 'Perak', 'Prk', NULL, NULL),
(9, 'Perlis', 'Prs', NULL, NULL),
(10, 'Selangor', 'Sel', NULL, NULL),
(11, 'Terengganu', 'Trg', NULL, NULL),
(12, 'Sabah', 'Sbh', NULL, NULL),
(13, 'Sarawak', 'Srw', NULL, NULL),
(14, 'Wilayah Persekutuan Kuala Lumpur', 'KL', NULL, NULL),
(15, 'Wilayah Persekutuan Labuan', 'Lbn', NULL, NULL),
(16, 'Wilayah Persekutuan Putrajaya', 'Ptr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_type_id` bigint(20) UNSIGNED NOT NULL,
  `address1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negeri_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faxNumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_ppk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `name`, `nickname`, `org_type_id`, `address1`, `address2`, `postcode`, `city`, `negeri_id`, `email`, `phoneNumber`, `faxNumber`, `code_ppk`, `created_at`, `updated_at`) VALUES
(1, 'Lembaga Pertubuhan Peladang Kuala Lumpur', 'LPP Kuala Lumpur', 1, 'Menara LPP, No 20,', 'Jalan Sultan Salahudin,', '50480', 'Kuala Lumpur', 14, 'info@lpp.gov.my', '12345678', '12345678', 'LPP00000', NULL, NULL),
(2, 'Lembaga Pertubuhan Peladang Negeri Johor', 'LPP Negeri Johor', 2, 'Km 11.6, Jalan Pandan,', 'Karung Berkunci 745', '80990', 'Johor Bahru', 1, 'lpp_johor@lpp.gov.my', '12345678', '12345678', 'LPP00001', NULL, NULL),
(3, 'Lembaga Pertubuhan Peladang Negeri Kedah', 'LPP Negeri Kedah', 2, 'Aras 7, Bangunan KWSP-PELADANG', 'Jalan Sultan Badlishah, Peti Surat 137', '5710', 'Alor Setar', 2, 'lpp_kedah@lpp.gov.my', '12345678', '12345678', 'LPP00002', NULL, NULL),
(4, 'Lembaga Pertubuhan Peladang Negeri Kelantan', 'LPP Negeri Kelantan', 2, 'Km 5, Jalan Sultan Yahya Petra,', 'Lundang', '15990', 'Kota Bharu', 3, 'lpp_kelantan@lpp.gov.my', '12345678', '12345678', 'LPP00003', NULL, NULL),
(5, 'Lembaga Pertubuhan Peladang Negeri Melaka', 'LPP Negeri Melaka', 2, 'Tingkat 5, Graha Peladang,', 'No. 132, Jalan Hang Tuah, Peti Surat 182', '75740', 'Melaka', 4, 'lpp_melaka@lpp.gov.my', '12345678', '12345678', 'LPP00004', NULL, NULL),
(6, 'Lembaga Pertubuhan Peladang Negeri Negeri Sembilan', 'LPP Negeri Negeri Sembilan', 2, 'Jalan Paroi/Senawang,', 'Peti Surat 234', '70720', 'Seremban', 5, 'lpp_n9@lpp.gov.my', '12345678', '12345678', 'LPP00005', NULL, NULL),
(7, 'Lembaga Pertubuhan Peladang Negeri Pahang', 'LPP Negeri Pahang', 2, 'Tingkat 2, Wisma Puriwirawan,', 'Jalan Gambut,Peti Surat 176', '25720', 'Kuantan', 6, 'lpp_pahang@lpp.gov.my', '12345678', '12345678', 'LPP00006', NULL, NULL),
(8, 'Lembaga Pertubuhan Peladang Negeri Pulau Pinang', 'LPP Negeri Pulau Pinang', 2, 'Tingkat 3 & 4, Bangunan Wisma Peladang,', 'Jalan Kampung Gajah, Peti Surat 127,', '12710', 'Butterworth', 7, 'lpp_penang@lpp.gov.my', '12345678', '12345678', 'LPP00007', NULL, NULL),
(9, 'Lembaga Pertubuhan Peladang Negeri Perak', 'LPP Negeri Perak', 2, 'No. 1, Jalan Tawas Baru Utara,', 'Off Jalan Kuala Kangsar, Beg Berkunci 50', '30990', 'Ipoh', 8, 'lpp_perak@lpp.moa.my', '12345678', '12345678', 'LPP00008', NULL, NULL),
(10, 'Lembaga Pertubuhan Peladang Negeri Perlis', 'LPP Negeri Perlis', 2, 'No. 55 & 57, Tingkat 1 & 2,', 'Peti Surat 39, Medan Syed Alwi,', '1700', 'Kangar', 9, 'lpp_perlis@lpp.gov.my', '12345678', '12345678', 'LPP00009', NULL, NULL),
(11, 'Lembaga Pertubuhan Peladang Negeri Selangor', 'LPP Negeri Selangor', 2, 'Tingkat 5, 6 & 7, Menara PPNS, Pusat Dagangan UMNO Shah Alam', 'Lot 8, Persiaran Damai, Seksyen 11, Peti Surat 7106', '40702', 'Shah Alam', 10, 'lpp_selangor@lpp.gov.my', '12345678', '12345678', 'LPP00010', NULL, NULL),
(12, 'Lembaga Pertubuhan Peladang Negeri Terengganu', 'LPP Negeri Terengganu', 2, 'Tingkat 2, Wisma Peladang Terengganu,', 'Lot 994, Jalan Sultan Mohamad', '21100', 'Kuala Terengganu', 11, 'lpp_terengganu@lpp.gov.my', '12345678', '12345678', 'LPP00011', NULL, NULL),
(13, 'Lembaga Pertubuhan Peladang Negeri Sabah', 'LPP Negeri Sabah', 2, 'Tingkat 7 & 8, Blok D, Bangunan KWSP,', 'Jalan Karamunsing, Beg Berkunci 157,', '88995', 'Kota Kinabalu', 12, 'Ippsabah@streamyx.com', '12345678', '12345678', 'LPP00012', NULL, NULL),
(14, 'Lembaga Pertubuhan Peladang Wilayah Persekutuan', 'LPP Wilayah Persekutuan', 2, 'Km. 5, Jalan Pohon Batu, Kampung Pantai,', 'Peti Surat 81095,', '87020', 'Wilayah Persekutuan Labuan', 15, 'labuan@lpp.gov.my', '12345678', '12345678', 'LPP00014', NULL, NULL),
(15, 'Pertubuhan Peladang Kawasan Titi Tinggi', 'PPK Titi Tinggi', 2, 'Km 28', 'Jalan Padang Besar Utara', '2100', 'Padang Besar', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00104', NULL, NULL),
(16, 'Pertubuhan Peladang Kawasan Beseri', 'PPK Beseri', 2, 'Km 11', 'Jalan Kaki Bukit  ', '2400', 'Kangar', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00031', NULL, NULL),
(17, 'Pertubuhan Peladang Kawasan Mata Ayer', 'PPK Mata Ayer', 2, 'Simpang Gial', 'Simpang Gial 2', '25000', 'Mata Ayer', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00033', NULL, '2020-09-06 23:56:30'),
(18, 'Pertubuhan Peladang Kawasan Bintong', 'PPK Bintong', 2, 'Km 2', 'Jalan Raja Syed Saffi', '1000', 'Kangar', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00034', NULL, NULL),
(19, 'Pertubuhan Peladang Kawasan Paya', 'PPK Paya', 2, 'Km 4', 'Jalan Kaki Bukit', '1000', ' Kangar', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00032', NULL, NULL),
(20, 'Pertubuhan Peladang Kawasan Padang Siding', 'PPK Padang Siding', 2, 'Pekan Pauh', NULL, '2600', 'Arau', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00073', NULL, NULL),
(21, 'Pertubuhan Peladang Negeri PERLIS', 'PPN PERLIS', 2, 'KM 2, JALAN KAKI BUKIT ', NULL, '1000', 'KANGAR', 9, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00003', NULL, NULL),
(22, 'Pertubuhan Peladang Kawasan Changlun', 'PPK Changlun', 2, 'PEKAN LAMA', 'CHANGLUN', '6010', 'CHANGLUN', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00146', NULL, NULL),
(23, 'Pertubuhan Peladang Kawasan Asun', 'PPK Asun', 2, 'KILOMETER 27, JALAN CHANGLOON', NULL, '6000', 'JITRA', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00076', NULL, NULL),
(24, 'Pertubuhan Peladang Kawasan Kuala Nerang', 'PPK Kuala Nerang', 2, 'NO 40,41, 42 JLN SEMELIANG ', NULL, '6300', 'KUALA NERANG', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00047', NULL, NULL),
(25, 'Pertubuhan Peladang Kawasan Lubuk Batu', 'PPK Lubuk Batu', 2, 'Mukim Pelubang', NULL, '6000', 'Jitra', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00176', NULL, NULL),
(26, 'Pertubuhan Peladang Kawasan Pokok Sena', 'PPK Pokok Sena', 2, 'PERTUBUHAN PELADANG KAWASAN POKOK SENA,', 'POKOK SENA,', '6400', 'POKOK SENA,', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00131', NULL, NULL),
(27, 'Pertubuhan Peladang Kawasan Naka', 'PPK Naka', 2, 'PERTUBUHAN PELADANG KAWASAN NAKA', 'PEKAN NAKA', '6350', 'ALOR SETAR', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00128', NULL, NULL),
(28, 'Pertubuhan Peladang Kawasan Kubur Panjang', 'PPK Kubur Panjang', 2, 'PERTUBUHAN PELADANG KAWASAN KUBUR PANJANG', 'KUBUR PANJANG', '6760', 'ALOR SETAR', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00014', NULL, NULL),
(29, 'Pertubuhan Peladang Kawasan Pendang Selatan', 'PPK Pendang Selatan', 2, 'LOT 962, MUKIM PADANG PUSING , KG SAWA KECIL', NULL, '6700', 'PENDANG', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00164', NULL, NULL),
(30, 'Pertubuhan Peladang Kawasan Sik', 'PPK Sik', 2, 'BATU 5 DAERAH SIK', NULL, '8200', 'SIK', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00119', NULL, NULL),
(31, 'Pertubuhan Peladang Kawasan Gurun/Teloi Kiri', 'PPK Gurun/Teloi Kiri', 2, 'JENIANG', NULL, '8700', 'GURUN', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00132', NULL, NULL),
(32, 'Pertubuhan Peladang Kawasan Baling', 'PPK Baling', 2, 'Pertubuhan Peladang Kawasan Baling', 'No 26 Kompleks IADP Baling', '9100', 'Baling', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00179', NULL, NULL),
(33, 'Pertubuhan Peladang Kawasan Merbok', 'PPK Merbok', 2, 'PUSAT KEMAJUAN PELADANG ', NULL, '8400', 'MERBOK', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00133', NULL, NULL),
(34, 'Pertubuhan Peladang Kawasan Langkawi', 'PPK Langkawi', 2, 'PADANG MAT SIRAT', NULL, '7100', 'LANGKAWI', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00100', NULL, NULL),
(35, 'Pertubuhan Peladang Kawasan Kuala Ketil', 'PPK Kuala Ketil', 2, 'LOT 864, JALAN BALING,', '', '9300', 'KUALA KETIL, KEDAH', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00149', NULL, NULL),
(36, 'Pertubuhan Peladang Kawasan Kuala Muda Selatan', 'PPK Kuala Muda Selatan', 2, 'JALAN BATU LINTANG, TIKAM BATU', NULL, '8600', 'SUNGAI PETANI', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00163', NULL, NULL),
(37, 'Pertubuhan Peladang Kawasan Sungai Petani', 'PPK Sungai Petani', 2, 'LOT 1401, ', 'JALAN BAKAR ARANG,', '8000', 'SUNGAI PETANI, KEDAH', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00175', NULL, NULL),
(38, 'Pertubuhan Peladang Kawasan Padang Serai', 'PPK Padang Serai', 2, 'JALAN GUAR LOBAK ', NULL, '9400', 'PADANG SERAI', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00159', NULL, NULL),
(39, 'Pertubuhan Peladang Kawasan Karangan', 'PPK Karangan', 2, 'LOT 1865 SIMPANG TIGA JANGKANG', 'KARANGAN', '9700', 'KULIM', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00167', NULL, NULL),
(40, 'Pertubuhan Peladang Kawasan Selama', 'PPK Selama', 2, 'LOT  923 , JALAN MAHANG,', NULL, '9810', 'SERDANG', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00177', NULL, NULL),
(41, 'Pertubuhan Peladang Kawasan Bandar Baharu', 'PPK Bandar Baharu', 2, 'Jalan Permatang PAsir', '', '34950', 'Bandar Baharu', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00111', NULL, NULL),
(42, 'Pertubuhan Peladang Negeri Kedah', 'PPN Kedah', 2, 'ARAS 1 BANGUNAN KWSP-PELADANG,', 'NO.33 JALAN SULTAN BADLISHAH, PETI SURAT 137,', '5000', 'ALOR STAR', 2, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00002', NULL, NULL),
(43, 'Pertubuhan Peladang Kawasan Penaga', 'PPK Penaga', 2, 'No 1211, Mukim 4', NULL, '13100', 'Penaga', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00112', NULL, NULL),
(44, 'Pertubuhan Peladang Kawasan Lahar Bubu', 'PPK Lahar Bubu', 2, '1572, Jalan Pongsu Seribu', NULL, '13200', 'Kepala Batas', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00108', NULL, NULL),
(45, 'Pertubuhan Peladang Kawasan Sungai Acheh', 'PPK Sungai Acheh', 2, 'LOT 882,MUKIM 9,TANJUNG BEREMBANG', NULL, '14310', 'NIBONG TEBAL', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00060', NULL, NULL),
(46, 'Pertubuhan Peladang Kawasan Tasek', 'PPK Tasek', 2, 'NO 161, LORONG 1, SS1 ', 'BANDAR TASEK MUTIARA', '14120', 'SIMPANG AMPAT', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00168', NULL, NULL),
(47, 'Pertubuhan Peladang Kawasan Pokok Sena', 'PPK Pokok Sena', 2, 'PPK Pokok Sena', NULL, '13200', 'KEPALA BATAS', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00035', NULL, NULL),
(48, 'Pertubuhan Peladang Kawasan Seri Pulau', 'PPK Seri Pulau', 2, 'PERTUBUHAN PELADANG KAWASAN SERI PULAU', 'JALAN BALIK PULAU', '11000', 'BALIK PULAU', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00039', NULL, NULL),
(49, 'Pertubuhan Peladang Kawasan Kampung Pelet', 'PPK Kampung Pelet', 2, 'KUBANG SEMANG,SEBERANG PERAI TENGAH', NULL, '14400', 'BUKIT MERTAJAM', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00054', NULL, NULL),
(50, 'Pertubuhan Peladang Kawasan Bukit Mertajam', 'PPK Bukit Mertajam', 2, '1784, JALAN ROZHAN, CHEROK TOK KUN', NULL, '14000', 'BUKIT MERTAJAM', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00038', NULL, NULL),
(51, 'Pertubuhan Peladang Kawasan Sungai Chenaam', 'PPK Sungai Chenaam', 2, 'Lot 301 Pembangunan Tanah Sungai Chenaam', 'Seberang Perai Selatan', '14320', 'Nibong Tebal', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00196', NULL, NULL),
(52, 'Pertubuhan Peladang Negeri Pulau Pinang', 'PPN Pulau Pinang', 2, 'LOT 2486 MK.8, JLN DATO HAJI AHMAD BADAWI,', '13200 Kepala Batas, Seberang Prai Utara.', '13200', 'SEBERANG PRAI UTARA', 7, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00004', NULL, NULL),
(53, 'Pertubuhan Peladang Kawasan Pengkalan Hulu', 'PPK Pengkalan Hulu', 2, 'LOT 5 & 7 JLN ISKANDAR PENGKALAN HULU ', 'PERAK', '33100', 'PENGKALAN HULU', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00113', NULL, NULL),
(54, 'Pertubuhan Peladang Kawasan Grik', 'PPK Grik', 2, 'LOT 547 JALAN INTAN', NULL, '33320', 'GRIK', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00093', NULL, NULL),
(55, 'Pertubuhan Peladang Kawasan Selama', 'PPK Selama', 2, 'LOT 3202, JALAN WAN RAZALLY', 'SELAMA PERAK', '34100', 'SELAMA', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00098', NULL, NULL),
(56, 'Pertubuhan Peladang Kawasan Lenggong', 'PPK Lenggong', 2, 'NO. 14 JALAN GRIK', '', '33400', 'LENGGONG', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00055', NULL, NULL),
(57, 'Pertubuhan Peladang Kawasan Batu Kurau', 'PPK Batu Kurau', 2, 'Lot 14, Jalan Besar', NULL, '34500', 'Batu Kurau', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00050', NULL, NULL),
(58, 'Pertubuhan Peladang Kawasan Bagan Serai/Beriah', 'PPK Bagan Serai/Beriah', 2, 'KM.16 Jalan Taiping', NULL, '34300', 'Bagan Serai', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00024', NULL, NULL),
(59, 'Pertubuhan Peladang Kawasan Bagan Tiang Dan Parit Buntar', 'PPK Bagan Tiang Dan Parit Buntar', 2, 'SIMPANG TIGA', NULL, '34200', 'PARIT BUNTAR', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00018', NULL, NULL),
(60, 'Pertubuhan Peladang Kawasan Tanjong Piandang', 'PPK Tanjong Piandang', 2, 'JALAN PANTAI', NULL, '34250', 'TANJONG PIANDANG', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00007', NULL, NULL),
(61, 'Pertubuhan Peladang Kawasan Kuala Kurau', 'PPK Kuala Kurau', 2, 'SIMPANG TIGA', '', '34350', 'KUALA KURAU, PERAK', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00027', NULL, NULL),
(62, 'Pertubuhan Peladang Kawasan Gunong Semanggol/ Selinsing', 'PPK Gunong Semanggol/ Selinsing', 2, 'GUNONG SEMANGGOL/SELISING', 'SIMPANG EMPAT', '34400', 'Semanggol', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00051', NULL, NULL),
(63, 'Pertubuhan Peladang Kawasan Bukit Gantang', 'PPK Bukit Gantang', 2, 'Jalan Kuala Kangsar ', 'Changkat Jering', '34850', 'Taiping', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00048', NULL, NULL),
(64, 'Pertubuhan Peladang Kawasan Sungai Siput(u)', 'PPK Sungai Siput(u)', 2, 'LOT 8698', 'SUNGAI SEJUK', '31100', 'SUNGAI SIPUT (U)', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00161', NULL, NULL),
(65, 'Pertubuhan Peladang Kawasan Padang Rengas', 'PPK Padang Rengas', 2, 'JALAN BESAR TAIPING', '', '33700', 'PADANG RENGAS', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00008', NULL, NULL),
(66, 'Pertubuhan Peladang Kawasan Kuala Kangsar', 'PPK Kuala Kangsar', 2, 'No. 59A, ', 'Jalan Kangsar', '33000', 'Kuala Kangsar ', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00079', NULL, NULL),
(67, 'Pertubuhan Peladang Kawasan Sungai Tinggi', 'PPK Sungai Tinggi', 2, 'PPK SUNGAI TINGGI ', 'TRONG', '34800', 'TAIPING', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00049', NULL, NULL),
(68, 'Pertubuhan Peladang Kawasan Senggang/Manong', 'PPK Senggang/Manong', 2, 'PERTUBUHAN PELADANG KAWASAN SENGGANG/ MANONG', '', '33800', 'KUALA KANGSAR', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00030', NULL, NULL),
(69, 'Pertubuhan Peladang Kawasan Tambun Bandaraya Ipoh', 'PPK Tambun Bandaraya Ipoh', 2, 'NO. 14A & 16A, JALAN TAWAS BARU 1', 'TAMAN TASEK DAMAI', '30010', 'IPOH, PERAK DARUL RIDZUAN', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00121', NULL, NULL),
(70, 'Pertubuhan Peladang Kawasan Kinta Selatan', 'PPK Kinta Selatan', 2, 'No 39, Jalan Bandar Baharu Satu,', 'Off Jalan Gopeng, Bandar Baharu Batu Gajah,', '31000', 'Batu Gajah', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00170', NULL, NULL),
(71, 'Pertubuhan Peladang Kawasan Parit', 'PPK Parit', 2, 'JALAN PEJABAT POS ', 'PERAK', '32800', 'PARIT', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00006', NULL, NULL),
(72, 'Pertubuhan Peladang Kawasan Bruas/Pengkalan Bharu', 'PPK Bruas/Pengkalan Bharu', 2, 'BERUAS', NULL, '32700', 'BERUAS', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00021', NULL, NULL),
(73, 'Pertubuhan Peladang Kawasan Bota/Lambor', 'PPK Bota/Lambor', 2, 'BATU 30 , JALAN AYER TAWAR', NULL, '32600', 'TITI GANTUNG', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00017', NULL, NULL),
(74, 'Pertubuhan Peladang Kawasan Seberang Perak', 'PPK Seberang Perak', 2, '', '', '36000', 'TELUK INTAN', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00114', NULL, NULL),
(75, 'Pertubuhan Peladang Kawasan Kampung Gajah', 'PPK Kampung Gajah', 2, 'JALAN STADIUM', NULL, '36800', 'KAMPONG GAJAH', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00005', NULL, NULL),
(76, 'Pertubuhan Peladang Kawasan Sungai Manik/Labu Kubong', 'PPK Sungai Manik/Labu Kubong', 2, 'KM 7.5 JALAN SUNGAI MANIK', '', '36000', 'TELUK INTAN', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00052', NULL, NULL),
(77, 'Pertubuhan Peladang Kawasan Tapah', 'PPK Tapah', 2, 'JALAN DAMAI', '', '35000', 'TAPAH', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00081', NULL, NULL),
(78, 'Pertubuhan Peladang Kawasan Slim River/Tanjong Malim', 'PPK Slim River/Tanjong Malim', 2, 'LOT 634&635(ATAS),JALAN IBRAHIM MOHD DOM', '35800 SLIM RIVER,PERAK', '35800', 'SLIM RIVER', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00096', NULL, NULL),
(79, 'Pertubuhan Peladang Kawasan Langkap', 'PPK Langkap', 2, 'Lot 23006 Jalan Kg Goh Hong', 'Langkap', '36700', 'Langkap', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00042', NULL, NULL),
(80, 'Pertubuhan Peladang Kawasan Manjung Selatan', 'PPK Manjung Selatan', 2, 'Jalan Dato Seri Kamaruddin', NULL, '32040', 'Seri Manjung', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00064', NULL, NULL),
(81, 'Pertubuhan Peladang Kawasan Bagan Datuk', 'PPK Bagan Datuk', 2, 'Simpang Tiga', NULL, '36100', 'Bagan Datuk', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00036', NULL, NULL),
(82, 'Pertubuhan Peladang Kawasan Hutan Melintang', 'PPK Hutan Melintang', 2, 'BATU 12, JALAN BAGAN DATOH, SIMPANG 4,', 'HUTAN MELINTANG', '36400', 'HUTAN MELINTANG', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00066', NULL, NULL),
(83, 'Pertubuhan Peladang Negeri PERAK', 'PPN PERAK', 2, '16 & 18 MEDAN GOPENG 2,', 'JALAN SULTAN NAZRIN SHAH', '31350', 'IPOH', 8, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00005', NULL, NULL),
(84, 'Pertubuhan Peladang Kawasan Bernam Jaya', 'PPK Bernam Jaya', 2, 'Lot 524, 554 & 555, Taman Sentosa', 'Jalan Haji Mohamad', '45200', 'Sabak Bernam', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00240', NULL, NULL),
(85, 'Pertubuhan Peladang Kawasan Sungai Besar', 'PPK Sungai Besar', 2, 'Wisma PPK Sungai Besar', 'Jalan Bunga Matahari', '45300', 'Sungai Besar', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00001', NULL, NULL),
(86, 'Pertubuhan Peladang Kawasan Pasir Panjang', 'PPK Pasir Panjang', 2, 'LOT 1935 BANGUNAN PELADANG ', 'PEKAN PASIR PANJANG ', '45400', 'SEKINCHAN ', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00234', NULL, NULL),
(87, 'Pertubuhan Peladang Kawasan Tanjong Karang', 'PPK Tanjong Karang', 2, 'BANGUNAN PELADANG,', 'JALAN BESAR', '45500', 'TANJONG KARANG', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00002', NULL, NULL),
(88, 'Pertubuhan Peladang Kawasan Hulu Selangor', 'PPK Hulu Selangor', 2, 'Jalan Dato Muda Jaafar', 'Kuala Kubu Bharu', '44000', 'Hulu Selangor', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00063', NULL, NULL),
(89, 'Pertubuhan Peladang Kawasan Kuala Selangor', 'PPK Kuala Selangor', 2, 'Wisma Peladang Kuala Selangor, Lot 5108, Pekan Sungai Buloh (Sasaran),', 'Jeram, Selangor.', '45800', 'Jeram', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00118', NULL, NULL),
(90, 'Pertubuhan Peladang Kawasan Gombak dan Petaling', 'PPK Gombak dan Petaling', 2, 'LOT 14645 KM 27 JALAN KUALA SELANGOR', 'SG PLONG', '47000', 'SUNGAI BULUH SELANGOR', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00162', NULL, NULL),
(91, 'Pertubuhan Peladang Kawasan Hulu Langat ', 'PPK Hulu Langat ', 2, 'Batu 14, Pekan Hulu Langat', '', '43100', 'Hulu Langat', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00106', NULL, NULL),
(92, 'Pertubuhan Peladang Kawasan Beranang', 'PPK Beranang', 2, 'LOT 2271 (PT145) PEKAN BATU 26', '', '43700', 'BERANANG', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00110', NULL, NULL),
(93, 'Pertubuhan Peladang Kawasan Dengkil', 'PPK Dengkil', 2, 'Jalan Besar', 'Dengkil', '43800', 'Dengkil, Selangor Darul Ehsan', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00102', NULL, NULL),
(94, 'Pertubuhan Peladang Kawasan Klang', 'PPK Klang', 2, 'Lot 6238 Batu 2 1/2 Jalan Kapar, ', NULL, '41400', 'KLANG', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00120', NULL, NULL),
(95, 'Pertubuhan Peladang Kawasan Kuala Langat', 'PPK Kuala Langat', 2, 'Lot 308 Jalan Sultan Abdul Samad', '', '42700', 'BANTING', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00135', NULL, NULL),
(96, 'Pertubuhan Peladang Kawasan Batu Laut', 'PPK Batu Laut', 2, 'KM. 57, BATU LAUT', '', '42800', 'TANJUNG SEPAT, SELANGOR', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00232', NULL, NULL),
(97, 'Pertubuhan Peladang Kawasan Sepang', 'PPK Sepang', 2, 'Pertubuhan Peladang Kawasan Sepang,', '', '43950', 'Sg Pelek,Sepang,', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00125', NULL, NULL),
(98, 'Pertubuhan Peladang Kawasan Pertubuhan Peladang Negeri Selangor', 'PPK PPN Selangor', 2, 'Tingkat 9, Menara PPNS, Pusat Dagangan UMNO Shah Alam, ', 'Lot 8, Persiaran Damai, Seksyen 11. Shah Alam', '40000', 'Shah Alam', 10, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00010', NULL, NULL),
(99, 'Pertubuhan Peladang Kawasan Sri Klana,Lenggeng', 'PPK Sri Klana,Lenggeng', 2, 'JALAN BESAR LENGGENG', NULL, '71750', 'LENGGENG', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00130', NULL, NULL),
(100, 'Pertubuhan Peladang Kawasan Jelebu', 'PPK Jelebu', 2, 'JALAN DATO\' MENTERI,', 'KUALA KLAWANG', '71600', 'KUALA KLAWANG', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00016', NULL, NULL),
(101, 'Pertubuhan Peladang Kawasan Jempol', 'PPK Jempol', 2, 'Pertubuhan Peladang Kawasan Jempol,', '72200 Batu Kikir, Negeri Sembilan', '72200', 'Batu Kikir', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00067', NULL, NULL),
(102, 'Pertubuhan Peladang Kawasan Tanjung Ipoh', 'PPK Tanjung Ipoh', 2, 'JALAN SEREMBAN/ KUALA PILAH ', NULL, '71500', 'KUALA PILAH', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00013', NULL, NULL),
(103, 'Pertubuhan Peladang Kawasan Seremban', 'PPK Seremban', 2, 'Batu 10, Jalan Labu', NULL, '71900', 'Labu', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00012', NULL, NULL),
(104, 'Pertubuhan Peladang Kawasan Port Dickson', 'PPK Port Dickson', 2, 'NO.701, JALAN DATO\'K. PATHMANABAN', NULL, '71000', 'PORT DICKSON', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00009', NULL, NULL),
(105, 'Pertubuhan Peladang Kawasan Rembau', 'PPK Rembau', 2, 'PERTUBUHAN PELADANG KAWASAN REMBAU,', 'KAMPONG BATU,', '71300', 'REMBAU', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00011', NULL, NULL),
(106, 'Pertubuhan Peladang Kawasan Johol', 'PPK Johol', 2, 'PERTUBUHAN PELADANG KAWASAN JOHOL', 'JALAN BESAR JOHOL', '73100', 'KUALA PILAH', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00028', NULL, NULL),
(107, 'Pertubuhan Peladang Kawasan Pilah', 'PPK Pilah', 2, 'Jalan Sawah Lebar', NULL, '72000', 'Kuala Pilah', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00061', NULL, NULL),
(108, 'Pertubuhan Peladang Kawasan Rompin / Jelai', 'PPK Rompin / Jelai', 2, 'KAMPUNG BARU ROMPIN,', 'NEGERI SEMBILAN.', '73500', 'ROMPIN', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00231', NULL, NULL),
(109, 'Pertubuhan Peladang Kawasan Tampin (Tanggamas)', 'PPK Tampin (Tanggamas)', 2, 'PERTUBUHAN PELADANG KAWASAN TAMPIN (TANGGAMAS) ', 'NEGERI SEMBILAN', '73200', 'GEMENCHEH', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00043', NULL, NULL),
(110, 'Pertubuhan Peladang Negeri Negeri Sembilan', 'PPN Negeri Sembilan', 2, 'Pertubuhan Peladang Negeri, Negeri Sembilan', 'Jalan Paroi/Senawang', '70450', 'Seremban', 5, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00001', NULL, NULL),
(111, 'Pertubuhan Peladang Kawasan Jasin', 'PPK Jasin', 2, 'Jalan Kelubi, ', NULL, '77000', 'Jasin', 4, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00003', NULL, NULL),
(112, 'Pertubuhan Peladang Kawasan Alor Gajah', 'PPK Alor Gajah', 2, 'JALAN PASAR', 'PEKAN ALOR GAJAH', '78000', 'Alor Gajah', 4, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00053', NULL, NULL),
(113, 'Pertubuhan Peladang Kawasan Masjid Tanah', 'PPK Masjid Tanah', 2, '78300 Masjid Tanah', 'Melaka', '78300', 'Alor Gajah', 4, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00075', NULL, NULL),
(114, 'Pertubuhan Peladang Kawasan Melaka Tengah', 'PPK Melaka Tengah', 2, 'KM 7, JALAN BERTAM MALIM', NULL, '75250', 'MELAKA', 4, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00141', NULL, NULL),
(115, 'Pertubuhan Peladang Kawasan Merlimau', 'PPK Merlimau', 2, 'KM.24, Jalan Jasin', NULL, '77300', 'Merlimau', 4, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00004', NULL, NULL),
(116, 'Pertubuhan Peladang Negeri Melaka', 'PPN Melaka', 2, 'LOT 89, JALAN USAHA 5, KAWASAN PERINDUSTRIAN AYER KEROH', NULL, '75450', 'Melaka', 4, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00008', NULL, NULL),
(117, 'Pertubuhan Peladang Kawasan Batu Anam', 'PPK Batu Anam', 2, 'No. 10 & 11, Jalan Mohamad ', 'Batu Anam', '85100', 'Segamat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00181', NULL, NULL),
(118, 'Pertubuhan Peladang Kawasan Segamat', 'PPK Segamat', 2, 'K.m 5, Jalan Genuang,', '', '85000', 'Segamat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00156', NULL, NULL),
(119, 'Pertubuhan Peladang Kawasan Bukit Gambir', 'PPK Bukit Gambir', 2, 'PERTUBUHAN PELADANG KAWASAN BUKIT GAMBIR', 'BATU 15.5 JALAN SENGKANG,84800 BUKIT GAMBIR,MUAR', '84800', 'BUKIT GAMBIR', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00142', NULL, NULL),
(120, 'Pertubuhan Peladang Kawasan Ledang Tangkak', 'PPK Ledang Tangkak', 2, 'Jalan Payamas', '', '84900', 'Ledang', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00134', NULL, NULL),
(121, 'Pertubuhan Peladang Kawasan Pagoh', 'PPK Pagoh', 2, 'Jalan Permatang Pasir', NULL, '84300', 'Bukit Pasir', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00174', NULL, NULL),
(122, 'Pertubuhan Peladang Kawasan Muar Selatan', 'PPK Muar Selatan', 2, 'No. 7, Jalan Indah 1', 'Taman Parit Yusof 2', '83610', 'Semerah', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00129', NULL, NULL),
(123, 'Pertubuhan Peladang Kawasan Parit Sulong', 'PPK Parit Sulong', 2, 'Pusat Perkhidmatan Pertanian Bersepadu', 'Parit Lapis Laman', '83500', 'Parit Sulong', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00173', NULL, NULL),
(124, 'Pertubuhan Peladang Kawasan Senggarang', 'PPK Senggarang', 2, 'Pusat Perkhidmatan Pertanian Bersepadu', 'Simpang Lima, Peserai', '83020', 'Batu Pahat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00185', NULL, NULL),
(125, 'Pertubuhan Peladang Kawasan Simpang Lima Batu Pahat', 'PPK Simpang Lima Batu Pahat', 2, 'Pusat Perkhidmatan Pertanian Bersepadu', 'Simpang Lima, Peserai', '83020', 'Batu Pahat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00097', NULL, NULL),
(126, 'Pertubuhan Peladang Kawasan Labis', 'PPK Labis', 2, 'KM 1, JALAN MUAR, ', '85300 LABIS, JOHOR', '85300', 'SEGAMAT', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00228', NULL, NULL),
(127, 'Pertubuhan Peladang Kawasan Endau', 'PPK Endau', 2, 'Jalan Dato` Mohd Ali', '', '86900', 'Endau', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00115', NULL, NULL),
(128, 'Pertubuhan Peladang Kawasan Kluang', 'PPK Kluang', 2, 'K.m 3, Jalan Batu Pahat', '', '86000', 'Kluang', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00227', NULL, NULL),
(129, 'Pertubuhan Peladang Kawasan Parit Raja', 'PPK Parit Raja', 2, 'LOT 9128, JALAN BESAR,', 'PARIT RAJA', '86400', 'BATU PAHAT, JOHOR', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00172', NULL, NULL),
(130, 'Pertubuhan Peladang Kawasan Batu Pahat Tengah', 'PPK Batu Pahat Tengah', 2, 'No. 1, 1A & 1B, Jalan Semarak, Taman Linau', 'Tongkang Pecah', '83010', 'Batu Pahat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00171', NULL, NULL),
(131, 'Pertubuhan Peladang Kawasan Rengit', 'PPK Rengit', 2, 'No. 12, Jalan Besar Rengit,', '', '83100', 'Rengit, Batu Pahat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00123', NULL, NULL),
(132, 'Pertubuhan Peladang Kawasan Simpang Renggam', 'PPK Simpang Renggam', 2, 'No. 14, Jalan Sinar', 'Taman Sinar', '86200', 'Simpang Renggam', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00095', NULL, NULL),
(133, 'Pertubuhan Peladang Kawasan Sri Medan', 'PPK Sri Medan', 2, 'Jalan Parit Haji Ariff ', 'Sri Medan', '83400', 'Batu Pahat', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00224', NULL, NULL),
(134, 'Pertubuhan Peladang Kawasan Benut', 'PPK Benut', 2, 'PERTUBUHAN PELADANG KAWASAN BENUT, ', 'PUSAT PERTANIAN BERSEPADU, BENUT', '82200', 'PONTIAN', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00138', NULL, NULL),
(135, 'Pertubuhan Peladang Kawasan Ayer Baloi', 'PPK Ayer Baloi', 2, 'Pusat Perkhidmatan Pertanian Bersepadu', 'Ayer Baloi', '82100', 'Pontian', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00140', NULL, NULL),
(136, 'Pertubuhan Peladang Kawasan Kulai', 'PPK Kulai', 2, 'Batu 19', 'Jalan Besar', '81000', 'Kulai', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00144', NULL, NULL),
(137, 'Pertubuhan Peladang Kawasan Kota Tinggi', 'PPK Kota Tinggi', 2, 'No. 6 (Lot 632)', 'Jalan Abdullah', '81900', 'Kota Tinggi', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00147', NULL, NULL),
(138, 'Pertubuhan Peladang Kawasan Mersing ', 'PPK Mersing ', 2, 'KM 1.5 JALAN ENDAU', '', '86800', 'MERSING', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00136', NULL, NULL),
(139, 'Pertubuhan Peladang Kawasan Kota Tinggi Timur', 'PPK Kota Tinggi Timur', 2, 'Pusat Kemajuan Peladang', 'Peti Surat 18, Kampung Mawai Baru', '81907', 'Kota Tinggi', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00101', NULL, NULL),
(140, 'Pertubuhan Peladang Kawasan Pengerang', 'PPK Pengerang', 2, 'NO.31, JALAN KEMPAS 3,', 'TAMAN DESARU UTAMA', '81930', 'Bandar Penawar', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00229', NULL, NULL),
(141, 'Pertubuhan Peladang Kawasan Johor Bahru Timur', 'PPK Johor Bahru Timur', 2, 'K.M 11.6 ', 'JALAN PANDAN', '81100', 'JOHOR BAHRU', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00186', NULL, NULL),
(142, 'Pertubuhan Peladang Kawasan Johor Bharu Selatan', 'PPK Johor Bharu Selatan', 2, 'No. 18 & 20, Jalan Sri Perkasa 1/5', 'Taman Tampoi Utama', '81200', 'Johor Bahru', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00107', NULL, NULL),
(143, 'Pertubuhan Peladang Kawasan Pekan Nanas', 'PPK Pekan Nanas', 2, 'PUSAT PERKHIDMATAN PERTANIAN BERSEPADU', 'BATU 29, PENGKALAN RAJA, PEKAN NANAS, PONTIAN, JOHOR', '81500', 'PONTIAN', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00139', NULL, NULL),
(144, 'Pertubuhan Peladang Kawasan Pontian Selatan', 'PPK Pontian Selatan', 2, 'PUSAT PERKHIDMATAN PERTANIAN BERSEPADU', 'JALAN PARIT MESJID', '82000', 'PONTIAN', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00143', NULL, NULL),
(145, 'Pertubuhan Peladang Kawasan Bakri', 'PPK Bakri', 2, 'No. 21, Jalan Sutera 1/6,', 'Taman Sungai Abong Sutera, Sungai Abong', '84000', 'Muar', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00249', NULL, NULL),
(146, 'Pertubuhan Peladang Negeri Johor', 'PPN Johor', 2, 'WISMA PPNJ', 'NO 9-9E JALAN SELAT TEBRAU , PETI SURAT 120', '80000', 'JOHOR BAHRU', 1, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00006', NULL, NULL),
(147, 'Pertubuhan Peladang Kawasan Rompin', 'PPK Rompin', 2, 'LOT1269 PERTUBUHAN PELADANG KAWASAN ROMPIN', NULL, '26800', 'KUALA ROMPIN', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00044', NULL, NULL),
(148, 'Pertubuhan Peladang Kawasan Pekan', 'PPK Pekan', 2, 'KM. 10, TANAH PUTIH', NULL, '26600', 'PEKAN', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00037', NULL, NULL),
(149, 'Pertubuhan Peladang Kawasan Maran', 'PPK Maran', 2, 'Lot 5329,', 'Jalan Berkat,', '26500', 'Maran', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00082', NULL, NULL),
(150, 'Pertubuhan Peladang Kawasan Bera', 'PPK Bera', 2, 'Lot 1357 Jalan Besar Durian Tawar', NULL, '28200', 'Bera', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00122', NULL, NULL),
(151, 'Pertubuhan Peladang Kawasan Pelangai', 'PPK Pelangai', 2, 'Pertubuhan Peladang Kawasan Pelangai', 'Kompleks Geraktani, Simpang Pelangai', '28740', 'BENTONG', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00077', NULL, NULL),
(152, 'Pertubuhan Peladang Kawasan Bentong', 'PPK Bentong', 2, 'LOT 740', 'JALAN TRAS', '28700', 'BENTONG', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00091', NULL, NULL),
(153, 'Pertubuhan Peladang Kawasan Lanchang', 'PPK Lanchang', 2, 'LOT 1315, JALAN KARAK', NULL, '28500', 'LANCHANG', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00026', NULL, NULL),
(154, 'Pertubuhan Peladang Kawasan Sri Kerdau', 'PPK Sri Kerdau', 2, 'LOT 2570 SRI KETUMBIT, KERDAU', NULL, '28010', 'TEMERLOH', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00058', NULL, NULL),
(155, 'Pertubuhan Peladang Kawasan Temerloh ', 'PPK Temerloh ', 2, 'LOT 1263,', 'JALAN TENGKU ISMAIL,BANDAR BARU', '28000', 'TEMERLOH', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00169', NULL, NULL),
(156, 'Pertubuhan Peladang Kawasan Kuantan', 'PPK Kuantan', 2, 'KM 9, Jalan Gambang', NULL, '25150', 'Kuantan', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00109', NULL, NULL),
(157, 'Pertubuhan Peladang Kawasan Kuantan Utara', 'PPK Kuantan Utara', 2, 'B92 Sri Dagangan Business Centre, Jalan Tun Ismail', NULL, '25200', 'Kuantan', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00236', NULL, NULL),
(158, 'Pertubuhan Peladang Kawasan Pulau Tawar', 'PPK Pulau Tawar', 2, 'Lot 6194 Simpang Pulau Tawar', NULL, '27050', 'Jerantut', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00040', NULL, NULL),
(159, 'Pertubuhan Peladang Kawasan Jerantut', 'PPK Jerantut', 2, 'KM 1 Jalan Kuantan', NULL, '27000', 'Jerantut', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00057', NULL, NULL),
(160, 'Pertubuhan Peladang Kawasan Raub', 'PPK Raub', 2, 'KOMPLEKS IADP, KM 5, JALAN LIPIS,', NULL, '27600', 'RAUB', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00046', NULL, NULL),
(161, 'Pertubuhan Peladang Kawasan Benta', 'PPK Benta', 2, 'LOT 1026 KM 1,JALAN JERANTUT, 27300 BENTA,PAHANG DARUL MAKMUR.', NULL, '27300', 'LIPIS', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00085', NULL, NULL),
(162, 'Pertubuhan Peladang Kawasan Kuala Lipis', 'PPK Kuala Lipis', 2, 'LOT 356, BANGUNAN LPP,JALAN PEKELILING', NULL, '27200', 'KUALA LIPIS', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00025', NULL, NULL),
(163, 'Pertubuhan Peladang Kawasan Cameron Highlands', 'PPK Cameron Highlands', 2, 'JALAN BESAR,', 'BRINCHANG', '39100', 'CAMERON HIGHLANDS', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00124', NULL, NULL),
(164, 'Pertubuhan Peladang Kawasan Merapoh', 'PPK Merapoh', 2, 'WAKIL POS KAMPUNG MERAPOH', 'kuala lipis', '27210', 'kuala lipis', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00145', NULL, NULL),
(165, 'Pertubuhan Peladang Kawasan Tembeling', 'PPK Tembeling', 2, 'JLN KUALA KUALA TAHAN, KG. PADANG, KUALA TAHAN', NULL, '27000', 'Jerantut', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00056', NULL, NULL),
(166, 'Pertubuhan Peladang Kawasan Tioman', 'PPK Tioman', 2, 'KG TEKEK PULAU TIOMAN', NULL, '26800', 'ROMPIN', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00192', NULL, NULL),
(167, 'Pertubuhan Peladang Kawasan Chenor', 'PPK Chenor', 2, 'No.PT 4456 Simpang Bukit Lada', 'Jalan Maran Temerloh,Mukim Bukit Segumpal', '28100', 'Chenor', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00248', NULL, NULL),
(168, 'Pertubuhan Peladang Kawasan Jelai', 'PPK Jelai', 2, 'NO.4&5,BANGUNAN JKKK,KG KUALA MEDANG,MUKIM ULU JELAI', NULL, '27650', 'RAUB', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00251', NULL, NULL),
(169, 'Pertubuhan Peladang Negeri Pahang', 'PPN Pahang', 2, 'B138-142, LORONG IM8/33, JALAN SUNGAI LEMBING, BANDAR INDERA MAHKOTA', NULL, '25200', 'KUANTAN', 6, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00009', NULL, NULL),
(170, 'Pertubuhan Peladang Kawasan Kemaman', 'PPK Kemaman', 2, 'KM 2, Jalan Air Puteh', NULL, '24000', 'Kemaman', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00010', NULL, NULL),
(171, 'Pertubuhan Peladang Kawasan Kijal', 'PPK Kijal', 2, 'Pertubuhan Peladang Kawasan Kijal,', 'Kijal', '24100', 'KEMAMAN', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00088', NULL, NULL),
(172, 'Pertubuhan Peladang Kawasan Dungun', 'PPK Dungun', 2, 'Lot3598, Jalan Baru Pak Sabah', '', '23000', 'Dungun', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00023', NULL, NULL),
(173, 'Pertubuhan Peladang Kawasan Jerangau', 'PPK Jerangau', 2, 'Lot 564, Jalan Jerangau/Jabor', '', '23200', 'Dungun', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00089', NULL, NULL),
(174, 'Pertubuhan Peladang Kawasan Marang', 'PPK Marang', 2, 'Pengkalan Berangan', '', '21600', 'Marang', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00083', NULL, NULL),
(175, 'Pertubuhan Peladang Kawasan Bukit Diman/Ajil', 'PPK Bukit Diman/Ajil', 2, 'Lot 4241, KM36, Jalan Jerangau', '', '21800', 'Ajil, Hulu Terengganu', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00094', NULL, NULL),
(176, 'Pertubuhan Peladang Kawasan Kuala Berang', 'PPK Kuala Berang', 2, 'Jalan Besar', '', '21700', 'Kuala Berang', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00092', NULL, NULL),
(177, 'Pertubuhan Peladang Kawasan Bukit Payung', 'PPK Bukit Payung', 2, 'KM.13, Jalan Kuala Berang', NULL, '21400', 'Marang', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00084', NULL, NULL),
(178, 'Pertubuhan Peladang Kawasan Kuala Terengganu', 'PPK Kuala Terengganu', 2, 'Lot113, Bukit Bayas ', NULL, '21100', 'Kuala Terengganu', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00065', NULL, NULL),
(179, 'Pertubuhan Peladang Kawasan Manir/Belara', 'PPK Manir/Belara', 2, 'KM.10, Jalan Kelantan', 'Manir', '21200', 'Kuala Terengganu', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00071', NULL, NULL),
(180, 'Pertubuhan Peladang Kawasan Gerai', 'PPK Gerai', 2, 'Gerai', '', '22000', 'Jerteh, Besut', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00062', NULL, NULL),
(181, 'Pertubuhan Peladang Kawasan Kerandang', 'PPK Kerandang', 2, 'Kg Tanah Merah, ', 'Kerandang', '22000', 'Jerteh, Besut', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00041', NULL, NULL),
(182, 'Pertubuhan Peladang Kawasan Setiu', 'PPK Setiu', 2, 'Wisma Peladang, Lot. P.T 1257', 'Bandar Permaisuri', '22100', 'Setiu', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00045', NULL, NULL),
(183, 'Pertubuhan Peladang Kawasan Pelagat', 'PPK Pelagat', 2, 'Padang Luas', NULL, '22000', 'Jerteh, Besut', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00099', NULL, NULL),
(184, 'Pertubuhan Peladang Kawasan Maras/Batu Rakit', 'PPK Maras/Batu Rakit', 2, 'KM 25, ', 'Jalan Maras', '21020', 'Kuala Terengganu', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00059', NULL, NULL),
(185, 'Pertubuhan Peladang Kawasan Pertubuhan Peladang Negeri TERENGGANU', 'PPK PPN TERENGGANU', 2, 'TINGKAT 3, WISMA PELADANG TERENGGANU', 'LOT 994 JALAN SULTAN MUHAMAD', '21100', 'Kuala Terengganu', 11, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00011', NULL, NULL),
(186, ' Pertubuhan Peladang Kawasan Bachok ', ' PPK Bachok ', 2, 'Beris Kubur Besar', NULL, '16050', 'Bachok', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00087', NULL, NULL),
(187, 'Pertubuhan Peladang Kawasan Kandis', 'PPK Kandis', 2, 'TELONG ', NULL, '16300', 'BACHOK', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK000226', NULL, NULL),
(188, 'Pertubuhan Peladang Kawasan Bukit Awang', 'PPK Bukit Awang', 2, 'Kampung Pulau Lima Jalan Semerak', NULL, '16800', 'Pasir Puteh', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00086', NULL, NULL),
(189, 'Pertubuhan Peladang Kawasan Tanah Merah', 'PPK Tanah Merah', 2, 'KM 3, JLN ISMAIL PETRA ', NULL, '17500', 'TANAH MERAH', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00078', NULL, NULL),
(190, 'Pertubuhan Peladang Kawasan Gual Ipoh', 'PPK Gual Ipoh', 2, 'KG GUAL IPOH', NULL, '17500', 'TANAH MERAH', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00116', NULL, NULL),
(191, 'Pertubuhan Peladang Kawasan Pengkalan Chepa', 'PPK Pengkalan Chepa', 2, 'CHABANG TIGA , PANJI', NULL, '16100', 'KOTA BHARU', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00080', NULL, NULL),
(192, 'Pertubuhan Peladang Kawasan Jeli', 'PPK Jeli', 2, 'LOT 2008 & 2009 BANDAR JELI', NULL, '17600', 'JELI', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00127', NULL, NULL),
(193, 'Pertubuhan Peladang Kawasan Lanas Jedok', 'PPK Lanas Jedok', 2, 'LOT PT 2722 BATU GAJAH', NULL, '17500', 'TANAH MERAH', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00126', NULL, NULL),
(194, 'Pertubuhan Peladang Kawasan Lembah Pergau', 'PPK Lembah Pergau', 2, 'DAERAH KUALA BALAH', NULL, '17600', 'JELI', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00072', NULL, NULL),
(195, 'Pertubuhan Peladang Kawasan Repek Telong', 'PPK Repek Telong', 2, 'BATU 16, KAMPONG BADAK', NULL, '16300', 'BACHOK', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00103', NULL, NULL),
(196, 'Pertubuhan Peladang Kawasan Semerak', 'PPK Semerak', 2, 'Cherang Ruku, Semerak,Pasir Puteh ,Kelantan', NULL, '16700', 'Pasir Puteh', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00117', NULL, NULL),
(197, 'Pertubuhan Peladang Kawasan Tiga Daerah', 'PPK Tiga Daerah', 2, 'Lot PT263,Kg Kelubi,Jalan Machang', NULL, '16800', 'Pasir Puteh', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00029', NULL, NULL),
(198, 'Pertubuhan Peladang Kawasan Chetok', 'PPK Chetok', 2, 'KM16, JALAN TANAH MERAH', NULL, '17060', 'PASIR MAS', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00090', NULL, NULL),
(199, 'Pertubuhan Peladang Kawasan Gua Musang', 'PPK Gua Musang', 2, 'LOT 2863, JALAN PEJABAT KESEDAR', '18300 BANDAR BARU GUA MUSANG, KELANTAN', '18300', 'GUA MUSANG', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00148', NULL, NULL),
(200, 'Pertubuhan Peladang Kawasan Kuala Krai', 'PPK Kuala Krai', 2, 'Km 1/2, Jalan Pahi Lebuhraya Gua Musang, 18000 Kuala Kerai', NULL, '18000', 'Kuala Krai', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00137', NULL, NULL),
(201, 'Pertubuhan Peladang Kawasan Kangkong', 'PPK Kangkong', 2, 'Km9, Jalan Pasir Mas', 'Tanah Merah, Kangkong', '17040', 'Pasir Mas', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00020', NULL, NULL),
(202, 'Pertubuhan Peladang Kawasan Machang', 'PPK Machang', 2, 'LOT 706 , JALAN BESAR MACHANG', NULL, '18500', 'MACHANG', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00015', NULL, NULL),
(203, 'Pertubuhan Peladang Kawasan Pulai Chondong', 'PPK Pulai Chondong', 2, 'KG. PANGKAL GONG, PULAI CHONDONG', NULL, '16600', 'MACHANG', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00022', NULL, NULL),
(204, 'Pertubuhan Peladang Kawasan Rantau Panjang', 'PPK Rantau Panjang', 2, 'Lot 306/19 Jalan Lencongan Rantau Panjang /Pasir Mas ', NULL, '17200', 'Pasir Mas', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00019', NULL, NULL),
(205, 'Pertubuhan Peladang Kawasan Stong', 'PPK Stong', 2, '121 DEPAN STESEN KERETAPI', 'DABONG', '18200', 'DABONG', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00189', NULL, NULL),
(206, 'Pertubuhan Peladang Kawasan Tumpat ', 'PPK Tumpat ', 2, 'LOT 850, KELABORAN', 'TUMPAT', '16200', 'TUMPAT', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00074', NULL, NULL),
(207, 'Pertubuhan Peladang Negeri Kelantan', 'PPN Kelantan', 2, 'CABANG TIGA PANJI', NULL, '16100', 'KOTA BHARU', 3, 'info@lpp.gov.my', '12345678', '12345678', 'PPN00007', NULL, NULL),
(208, 'Pertubuhan Peladang Kawasan Beaufort', 'PPK Beaufort', 2, 'Beuafort Commercial Centre, Lot 37, Block E, FASA 1,', 'W.D.T 12,', '89807', 'Beaufort', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK 0151', NULL, NULL),
(209, 'Pertubuhan Peladang Kawasan Beluran', 'PPK Beluran', 2, 'Jalan Baru Pekan Beluran,', 'Peti Surat 333,', '90107', 'Beluran', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00244', NULL, NULL),
(210, 'Pertubuhan Peladang Kawasan Inanam', 'PPK Inanam', 2, 'Lot 13, Taman Fuliwa Fasa 1, Batu 11, Jalan Tuaran, Kota Kinabalu, SABAH.', 'Peti Surat No.A-274, Inanam', '88857', 'KOTA KINABALU', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK(S)03', NULL, NULL),
(211, 'Pertubuhan Peladang Kawasan Kalabakan', 'PPK Kalabakan', 2, 'KM 23, JALAN MEROTAI-KALABAKAN', 'PETI SURAT 62101', '91000', 'TAWAU', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00250', NULL, NULL),
(212, 'Pertubuhan Peladang Kawasan Keningau', 'PPK Keningau', 2, 'Pertubuhan Peladang Kawasan Keningau.', 'Lot 33 & 34, Taman Bariawa, Jalan Bank Bumiputra', '89008', 'Keningau,', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00219', NULL, NULL),
(213, 'Pertubuhan Peladang Kawasan Kinabalu', 'PPK Kinabalu', 2, 'Peti Surat 400', NULL, '89308', 'RANAU', 12, 'info@lpp.gov.my', '12345678', '12345678', '13/SAB/1', NULL, NULL),
(214, 'Pertubuhan Peladang Kawasan Kota Belud', 'PPK Kota Belud', 2, 'LOT 45-47, KOMPLEKS CENTENARY, W.D.T 89', NULL, '89159', 'KOTA BELUD', 12, 'info@lpp.gov.my', '12345678', '12345678', '13/SAB/2', NULL, NULL),
(215, 'Pertubuhan Peladang Kawasan Kota Kinabantangan', 'PPK Kota Kinabantangan', 2, 'Lot A5 & A6 , WDT 15,', 'Pusat Bandar', '90200', 'Kota kinabatangan', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK(S)02', NULL, NULL),
(216, 'Pertubuhan Peladang Kawasan Kota Marudu', 'PPK Kota Marudu', 2, 'SIMPANG EMPAT JALAN GOSHEN, ', 'PETI SURAT NO.44', '89107', 'KOTA MARUDU', 12, 'info@lpp.gov.my', '12345678', '12345678', '13/SAB/4', NULL, NULL),
(217, 'Pertubuhan Peladang Kawasan Kuala Penyu', 'PPK Kuala Penyu', 2, 'Kampung Kayul, KM30 Jalan Menumbuk', 'Peti Surat 293', '89747', 'Kuala Penyu', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00245', NULL, NULL),
(218, 'Pertubuhan Peladang Kawasan Kudat', 'PPK Kudat', 2, 'PERTUBUHAN PELADANG BANGUNAN KEDAI SUDC,BLOK H,LOT 5 & 6,PEKAN TOMBORUNGUS', 'W.D.T 67', '89059', 'KUDAT', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00193', NULL, NULL),
(219, 'Pertubuhan Peladang Kawasan Kunak', 'PPK Kunak', 2, 'LOT 3&4, MDLD 2601, BANGUNAN KEDAI SAPANG, W.D.T 34, ', NULL, '91209', 'KUNAK', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK(S)04', NULL, NULL),
(220, 'Pertubuhan Peladang Kawasan Lahad Datu', 'PPK Lahad Datu', 2, 'MDLD 3342, LOT 8, TECK GUAN INDUSTRIAL, BATU 2, JALAN SEGAMA,', 'PETI SURAT 60484', '91114', 'LAHAD DATU', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK(S)01', NULL, NULL),
(221, 'Pertubuhan Peladang Kawasan Nabawan', 'PPK Nabawan', 2, 'Jalan Kampung Indah, Peti surat 77', NULL, '89957', 'nabawan', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00246', NULL, NULL),
(222, 'Pertubuhan Peladang Kawasan Papar', 'PPK Papar', 2, 'LOT 5, TAMAN OKK HJ MAHALI', 'PETI SURAT 451', '89608', 'papar', 12, 'info@lpp.gov.my', '12345678', '12345678', '13/SAB/3', NULL, NULL),
(223, 'Pertubuhan Peladang Kawasan Penampang', 'PPK Penampang', 2, 'PETI SURAT 217, DONGGONGON NEW TOWNSHIP, JALAN TAPIKONG,', NULL, '89507', 'PENAMPANG', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00150', NULL, NULL),
(224, 'Pertubuhan Peladang Kawasan Pitas', 'PPK Pitas', 2, 'LOT 9 & 10,BANGUNAN SEDCO PEKAN BARU PITAS,CAWANGAN POS MINI,PETI SURAT 203', '89100 PITAS SABAH ', '89100', 'PITAS', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00239', NULL, NULL),
(225, 'Pertubuhan Peladang Negeri Sabah', 'PPN Sabah', 2, 'LOT 49-50, ESTET PERINDUSTRIAN KIAN YAP,', 'LORONG DURIAN 3, KOLOMBONG', '88857', 'INANAM', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPN(S)01', NULL, NULL),
(226, 'Pertubuhan Peladang Kawasan Putatan', 'PPK Putatan', 2, 'Lot 270,Taman Pasir Putih,Fasa 2 Putatan', 'Km11.2, Jln Putatan', '88200', 'Putatan', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00252', NULL, NULL),
(227, 'Pertubuhan Peladang Kawasan Sandakan', 'PPK Sandakan', 2, 'Blok B3,Lot 1 & 2, Bandar Labuk Jaya , Batu 7, W.D.T. No.46', 'Sandakan', '90009', 'Sandakan', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00243', NULL, NULL),
(228, 'Pertubuhan Peladang Kawasan Semporna', 'PPK Semporna', 2, 'KM 0.5 Jalan Bubul', 'Peti Surat 179', '91308', 'Semporna', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00188', NULL, NULL),
(229, 'Pertubuhan Peladang Kawasan Sipitang', 'PPK Sipitang', 2, 'BANGUNAN CABARAN LEGA, LOT 23 & 24, pUSAT MEMBELI BELAH, ', 'JLN HJ AG TENGAH, PETI SURAT 103, ', '89857', 'SIPITANG', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00191', NULL, NULL),
(230, 'Pertubuhan Peladang Kawasan Tambunan', 'PPK Tambunan', 2, 'peti surat 255', NULL, '89657', 'Tambunan', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PKK00233', NULL, NULL),
(231, 'Pertubuhan Peladang Kawasan Tawau', 'PPK Tawau', 2, 'TB 12182-12183,LOT (A9-A10) TAMAN MEGAH JAYA 10', 'PETI SURAT 1720', '91000', 'TAWAU', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK(S)06', NULL, NULL),
(233, 'Pertubuhan Peladang Kawasan Tenom', 'PPK Tenom', 2, 'alamat', 'alamat', '89000', 'Tenom', 12, 'info@lpp.gov.my', '12345678', '12345678', '13/SAB/5', NULL, NULL),
(234, 'Pertubuhan Peladang Kawasan Tongod', 'PPK Tongod', 2, 'Pertubuhan Peladang Kawasan Tongod No211 Ps 27 89300 Telupid Sabah', NULL, '89300', 'Telupid', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00247', NULL, NULL),
(235, 'Pertubuhan Peladang Kawasan Tuaran', 'PPK Tuaran', 2, 'N0.5, JALAN BERUNGIS, PETI SURAT 104,', NULL, '89257', 'TAMPARULI', 12, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00152', NULL, NULL),
(236, 'Pertubuhan Peladang Kawasan Labuan Selatan', 'PPK Labuan Selatan', 2, 'KM 5, Jalan Pohon Batu, Kampung Pantai', 'Peti Surat 81095', '87020', 'Wilayah Persekutuan Labuan', 15, 'info@lpp.gov.my', '12345678', '12345678', 'PP00241', NULL, NULL),
(237, 'Pertubuhan Peladang Kawasan Labuan Utara', 'PPK Labuan Utara', 2, 'Tingkat 1, Bangunan Lembaga Pertubuhan Peladang', 'Km. 5, Jalan Pohon Batu, Kampung Pantai, Peti Surat 81095,', '87020', 'Wilayah Persekutuan Labuan', 15, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00242', NULL, NULL),
(238, 'Pertubuhan Peladang Negeri Labuan', 'PPN Labuan', 2, 'KM. 5, Jalan Pohon Batu, Kampung Pantai,', 'Peti Surat 81095,', '87020', 'Wilayah Persekutuan Labuan', 15, 'info@lpp.gov.my', '12345678', '12345678', 'PP00012', NULL, NULL),
(239, 'Pertubuhan Peladang Kawasan Putrajaya', 'PPK Putrajaya', 2, 'Aras 3, No.56B', 'Jalan Perak P15, Presint Diplomatik', '62050', 'Putrajaya', 16, 'info@lpp.gov.my', '12345678', '12345678', 'PPK00253', NULL, NULL);
INSERT INTO `organisasi` (`id`, `name`, `nickname`, `org_type_id`, `address1`, `address2`, `postcode`, `city`, `negeri_id`, `email`, `phoneNumber`, `faxNumber`, `code_ppk`, `created_at`, `updated_at`) VALUES
(240, 'Pertubuhan Peladang Kebangsaan', 'NAFAS', 3, 'Lot 1, Jalan Teknologi 3/5,', 'Taman Sains Selangor 1, Kota Damansara,', '47810', 'Petaling Jaya', 10, 'info@nafas.com.my', '12345678', '12345678', 'KEB15/1', NULL, NULL),
(241, 'Meghan', 'Winter Foreman', 2, '263 South Rocky Nobel Road', 'Exercitation ullamco', '45000', 'Eum duis ipsa nesci', 12, 'nakacy@mailinator.com', '+1 (775) 227-8385', '+1 (157) 859-2883', '12302', '2020-09-06 22:39:18', '2020-09-07 00:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `org_types`
--

CREATE TABLE `org_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org_types`
--

INSERT INTO `org_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ibu Pejabat', NULL, NULL),
(2, 'Negeri ', NULL, NULL),
(3, 'NAFAS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penemuan`
--

CREATE TABLE `penemuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perenggan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penemuan` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organisasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `laporan_id` bigint(20) UNSIGNED NOT NULL,
  `progress_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penemuan`
--

INSERT INTO `penemuan` (`id`, `perenggan`, `penemuan`, `user_id`, `organisasi_id`, `laporan_id`, `progress_id`, `created_at`, `updated_at`) VALUES
(9, '6.39', '<p>Test rekod penemuan rekod penemuan lagi<p><img data-filename=\"Mak Dara (7).jpg\" style=\"width: 143px;\" src=\"/uploads/16003819630.png\"><img data-filename=\"Mak Dara (8).jpg\" style=\"width: 143px;\" src=\"/uploads/16003819631.png\"><img data-filename=\"Maroon.jpg\" style=\"width: 196px;\" src=\"/uploads/16003821572.png\"><br></p><p>Test 1234567890</p><p>test test test</p><p><br></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p></p>\n', NULL, NULL, 7, 1, '2020-09-17 12:21:24', '2020-10-04 19:33:38'),
(13, '6.123', '<p>Ut id dolor velit, v.&nbsp; Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v. Ut id dolor velit, v.&nbsp;<p><img data-filename=\"apricot.jpg\" style=\"width: 196px;\" src=\"/uploads/16004005570.png\"></p><p><br></p><p>Test 123</p><p></p></p>\n', NULL, NULL, 8, 1, '2020-09-17 19:42:37', '2020-09-17 19:48:55'),
(14, '6.335', '<p class=\"MsoNormal\"><img data-filename=\"Mak Dara (6).jpg\" style=\"width: 25%; float: left;\" class=\"note-float-left\" src=\"/uploads/16004158290.png\"><p class=\"MsoNormal\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p><p class=\"MsoNormal\">Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.</p><p class=\"MsoNormal\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.</p><p class=\"MsoNormal\">Aenean nec lorem. In porttitor. Donec laoreet nonummy augue.</p><p class=\"MsoNormal\">Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</p><div><br></div></p>\n', NULL, NULL, 8, 1, '2020-09-17 23:57:09', '2020-09-17 23:57:09'),
(15, '6.325', '<p>test</p>\n', NULL, NULL, 7, 1, '2020-09-23 10:17:44', '2020-09-23 10:17:44'),
(16, '6.22', '<p>Test test</p>\n', NULL, NULL, 8, 1, '2020-09-23 10:19:34', '2020-09-23 10:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create user', 'web', NULL, NULL),
(2, 'edit user', 'web', NULL, NULL),
(3, 'show user', 'web', NULL, NULL),
(4, 'delete user', 'web', NULL, NULL),
(5, 'create organisasi', 'web', NULL, NULL),
(6, 'edit organisasi', 'web', NULL, NULL),
(7, 'show organisasi', 'web', NULL, NULL),
(8, 'delete organisasi', 'web', NULL, NULL),
(9, 'create jawatan', 'web', NULL, NULL),
(10, 'edit jawatan', 'web', NULL, NULL),
(11, 'show jawatan', 'web', NULL, NULL),
(12, 'delete jawatan', 'web', NULL, NULL),
(13, 'create laporan', 'web', NULL, NULL),
(14, 'edit laporan', 'web', NULL, NULL),
(15, 'show laporan', 'web', NULL, NULL),
(16, 'delete laporan', 'web', NULL, NULL),
(17, 'create penemuan', 'web', NULL, NULL),
(18, 'edit penemuan', 'web', NULL, NULL),
(19, 'show penemuan', 'web', NULL, NULL),
(20, 'delete penemuan', 'web', NULL, NULL),
(21, 'create maklumbalas', 'web', NULL, NULL),
(22, 'edit maklumbalas', 'web', NULL, NULL),
(23, 'show maklumbalas', 'web', NULL, NULL),
(24, 'delete maklumbalas', 'web', NULL, NULL),
(25, 'create jawatankuasa', 'web', NULL, NULL),
(26, 'edit jawatankuasa', 'web', NULL, NULL),
(27, 'show jawatankuasa', 'web', NULL, NULL),
(28, 'delete jawatankuasa', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Draft', NULL, NULL),
(2, 'Baru', NULL, NULL),
(3, 'Lulus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-09-07 18:24:53', '2020-09-07 18:24:53'),
(2, 'auditor', 'web', '2020-09-07 18:25:08', '2020-09-07 18:25:08'),
(3, 'auditee', 'web', '2020-09-07 18:25:19', '2020-09-07 18:25:19'),
(4, 'kcad', 'web', '2020-09-07 18:25:29', '2020-09-07 18:25:29'),
(5, 'Admin IT', 'web', '2020-09-07 20:57:09', '2020-09-07 20:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(13, 2),
(14, 2),
(15, 2),
(17, 2),
(18, 2),
(19, 2),
(23, 2),
(25, 2),
(26, 2),
(27, 2),
(21, 3),
(22, 3),
(23, 3),
(13, 4),
(14, 4),
(15, 4),
(17, 4),
(18, 4),
(19, 4),
(23, 4),
(25, 4),
(26, 4),
(27, 4),
(5, 5),
(6, 5),
(7, 5),
(10, 5),
(11, 5),
(25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ulasanpenemuan`
--

CREATE TABLE `ulasanpenemuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ulasan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor` bigint(20) UNSIGNED NOT NULL,
  `kcad` bigint(20) UNSIGNED NOT NULL,
  `penemuan_id` bigint(20) UNSIGNED NOT NULL,
  `progress_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNum` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organisasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `ic`, `phoneNum`, `jawatan_id`, `organisasi_id`, `created_by`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Rashad Vinson', 'hyqyqu@mailinator.com', NULL, '$2y$10$01YXEaeAXL4Gb2oVi.jtuee169yc5RkKdw.yDw4YLm6xjQ9WE077W', '20202020', '+1 (584) 973-4863', 7, 240, NULL, NULL, NULL, '2020-09-03 17:50:15', '2020-09-03 17:50:15'),
(2, 'Elliott Downs', 'cytubu@mailinator', NULL, '$2y$10$KgP1P.LfYAHewG7mLt3djeDu9KwR8sBBckOHsX7i7HTIi14DiaLqy', '333333333', '+1 (461) 202-8965', 7, 1, NULL, NULL, NULL, '2020-09-03 18:04:46', '2020-09-03 18:04:46'),
(3, 'Sigourney Phelps', 'kaci@mailinator.com', NULL, '$2y$10$YLBxe95iK.nHxwWqayDAaueJO2JCa5UNOMpG1DpBmfI4hfwpk1.1q', '12313123', '+1 (417) 298-2195', 1, 1, NULL, NULL, NULL, '2020-09-03 19:04:06', '2020-09-03 19:04:06'),
(4, 'Sigourney Phelps', 'kac22i@mailinator.com', NULL, '$2y$10$Rv4inre1aFlVJp.51iQiFuwxcDrV2rR3LyaCEMCrWoKt6yHomuR/m', '12313123333', '+1 (417) 298-2195', 1, 1, NULL, NULL, NULL, '2020-09-03 19:04:49', '2020-09-03 19:04:49'),
(5, 'Felix Goodman', 'jahaxan@mailinator.com', NULL, '$2y$10$3YCEXGxfs3TtSHV4k4hraety1eG3TTfhlPG2YyVdjQ82h1EQu9T0C', '44444444', '+1 (396) 375-6269', 5, 5, NULL, NULL, NULL, '2020-09-03 19:06:36', '2020-09-03 19:06:36'),
(6, 'Emmalee Shanahan', 'cdickinson@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '879116235528', '0108635331', 5, 233, 3, 'ydhxuZjY84', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(7, 'Pierce Kuvalis', 'lesly.kling@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '831507597683', '0134281832', 3, 2, 5, 'pYjPw7dim3', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(8, 'Lorenzo Schiller', 'carlo.dietrich@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '854602708935', '0101112415', 6, 32, 4, 'oANFt3RhOm', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(9, 'Toy Swaniawski III', 'ddubuque@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '829441363766', '0186352873', 7, 12, 1, '94PLIuLE5M', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(10, 'Jody Schinner', 'balistreri.theron@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '890745182079', '0186626490', 1, 130, 5, 'CH3hUBmaIC', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(11, 'Elmer Okuneva', 'osborne06@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '898514521227', '0111270572', 6, 67, 5, 'N7cUTSMiPP', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(12, 'Arturo Konopelski', 'rath.carissa@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '842650666921', '0143221088', 7, 150, 4, '6fW0nRsRhBpnZBq1ivuXQ6PlDF4MkXdilA2PybXpdlIQ8bSU7ceypX9CG5QX', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(13, 'Shanie Ondricka PhD', 'brandi.cremin@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '887850298030', '0145574260', 2, 162, 1, 'lJk52pluUq', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(14, 'Dr. Gladys Schimmel IV', 'maddison.wisoky@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '842532286967', '0150835155', 4, 6, 5, '4RV3WepuJQ', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(15, 'Dr. Dan Sporer I', 'elijah20@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '818566118819', '0129270889', 6, 112, 5, 'qDpTnPZ9oj', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(16, 'Kirstin Jones Sr.', 'robb.abshire@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '877573822612', '0130385795', 9, 4, 3, 'OBDgvrnoQ3', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(17, 'Gladys O\'Kon', 'carter.rath@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '853246425638', '0185665144', 1, 22, 5, 'LjQGTMTL7z', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(18, 'Milford Waters', 'ebogisich@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '890585136526', '0139317724', 5, 216, 4, 'B0egJerEKo', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(19, 'Elwyn Walter', 'eyost@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '852764812752', '0104840249', 3, 149, 3, 'PtyQlaLcN3', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(20, 'Norwood Herman', 'zcasper@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '840256896591', '0131282901', 2, 236, 4, 'LatjbZgSnA', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(21, 'Dr. Josefa Breitenberg I', 'huels.sonia@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '862624249271', '0141788688', 3, 106, 4, 'D7Ri7qB8Ux', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(22, 'Demario Abshire', 'anya48@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '819766794153', '0159511855', 5, 29, 3, 'lUeSGdNJX2', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(23, 'Zena Toy MD', 'kenya59@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '866141339206', '0116530616', 6, 120, 3, 'FKkT0zLMMX', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(24, 'Shaina Nicolas Jr.', 'schuppe.malvina@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '860624165433', '0106080344', 6, 12, 3, 'ahqhavW7mE', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(25, 'Glenna Roberts', 'cschoen@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '899107153581', '0124206066', 3, 90, 5, 'CcJ7sLuQmv', NULL, '2020-09-03 23:52:17', '2020-09-03 23:52:17'),
(26, 'Mekhi Swaniawski', 'mcdermott.salvatore@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '809604980408', '0151837209', 4, 88, 5, 'W38CuMdt5Z', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(27, 'Raheem Jerde', 'uweimann@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '809942988258', '0110704534', 2, 229, 4, '5NrHMOB4aj', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(28, 'Abbie Konopelski', 'nakia.wuckert@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '831224794877', '0153374500', 9, 147, 5, 'WdB11GETAk', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(29, 'Mr. Zane Grady', 'cornelius.reichel@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '853386273807', '0112807370', 6, 36, 3, '2mBJ8T7dKN', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(30, 'Ivory Pagac', 'wintheiser.josh@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '809542778535', '0106112336', 4, 43, 3, 'lErBKgR9VF', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(31, 'Mr. Wade Langworth', 'louie.lebsack@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '885127425449', '0140758318', 4, 68, 2, 'lBkiXvJAgH', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(32, 'Hipolito Bashirian', 'noemy.maggio@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '825749969145', '0177470617', 3, 95, 2, 'zuPk8xELuP', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(33, 'Dr. Sigrid Gulgowski', 'emmet46@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '879997913553', '0151964195', 4, 112, 3, 'UD3lLr1rvL', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(34, 'Prof. Cielo Feest IV', 'rledner@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '897038447618', '0145542308', 8, 187, 3, 'JRolwcbfaZ', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(35, 'Nicole Sipes', 'amalia94@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '868685250358', '0162533774', 5, 213, 1, 'sKObTyG7te', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(36, 'Reuben Bartell', 'lucie.haley@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '812195130388', '0108234784', 7, 140, 2, '5S7ex38fkO', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(37, 'Mr. Thaddeus Stamm', 'sincere.hickle@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '802417213875', '0136188993', 5, 88, 4, 'LLh1lQR991', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(38, 'Novella Crooks', 'nelle97@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '891367020560', '0117903457', 7, 19, 3, 'rIwz0d2SP7', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(39, 'Harmony Monahan', 'frances.swift@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '897768554553', '0178217557', 6, 211, 3, 't9C1JMVapl', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(40, 'Mckenzie Wintheiser', 'stehr.adell@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '875928645070', '0173886194', 5, 81, 5, 'EZSEpNQQLN', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(41, 'Brandi Towne', 'haag.danielle@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '848871205316', '0150730781', 1, 159, 2, 'S6MQn7m8c8', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(42, 'Breanna Satterfield', 'heaven98@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '861153942014', '0130154386', 6, 126, 3, 'pOpiF78I8C', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(43, 'Prof. Abagail Batz V', 'maia15@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '809233277635', '0103857195', 9, 165, 1, 'EMC4mCrxPu', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(44, 'Antonetta Bruen', 'bella.thompson@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '801891887891', '0156814386', 8, 94, 4, 'yyzIpA8ScT', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(45, 'Dr. Robbie Schaden', 'konopelski.furman@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '865582991912', '0132011320', 9, 96, 3, '3dUICUnj8N', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(46, 'Wilburn Howe', 'myrtie.mosciski@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '838454992430', '0189231693', 7, 39, 4, 'PcjI7zgfHK', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(47, 'Ms. Elizabeth Crist III', 'usporer@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '805204219374', '0133721492', 5, 217, 1, 'gii1O2HsH4', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(48, 'Dr. Lizzie Hodkiewicz II', 'soberbrunner@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '856849682250', '0175007374', 2, 2, 3, 'QuLFZsTjBr', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(49, 'Hermann Casper Jr.', 'jaunita44@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '843234597848', '0131058701', 6, 147, 4, 'uedbqoFTCC', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(50, 'Gussie Conn', 'gwintheiser@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '822309741793', '0106029298', 8, 229, 4, 'z5QPAN3kjr', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(51, 'Laury Hauck', 'halvorson.ana@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '876861028463', '0104357017', 5, 166, 1, '0kMJg3qCY3', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(52, 'Boyd Hills', 'ondricka.ashtyn@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '806054436349', '0173559408', 1, 26, 3, 'LbZJPb7Fhs', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(53, 'Mr. Bernardo Raynor IV', 'rosalee24@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '823820914048', '0161805913', 3, 153, 3, 'e1nPLKAkdD', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(54, 'Dr. Santino Flatley', 'tavares02@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '858088636676', '0130812561', 3, 34, 1, 'PnIfo8OUTU', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(55, 'Francis Schmidt', 'liam36@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '854455537278', '0187642266', 6, 14, 4, 'wLtdyU0UMw', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(56, 'Chaya Runolfsson', 'keegan.watsica@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '838834530456', '0100810495', 8, 123, 2, 'CRX3YyBX4t', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(57, 'Nova Rau', 'bmitchell@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '816548927885', '0163805485', 9, 51, 2, '7N7dmrtTfz', NULL, '2020-09-03 23:52:18', '2020-09-03 23:52:18'),
(58, 'Hulda Ondricka', 'waldo.lemke@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '847192993183', '0108911809', 3, 50, 1, 'sgNpnyj31W', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(59, 'Mandy Blick', 'vpredovic@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '809528513219', '0106182588', 3, 120, 4, 'YUC9gWtWob', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(60, 'Duncan Weimann', 'vandervort.jackeline@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '844083917499', '0111823375', 5, 174, 2, 'NUFYU37fWQ', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(61, 'Tanner Keebler', 'istiedemann@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '864899281863', '0148156207', 5, 128, 5, 'gBQXqSiD1i', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(62, 'May Gerhold', 'veum.ardith@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '869913076063', '0115879925', 3, 178, 1, 'dkiNlIViqm', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(63, 'Rolando Hammes', 'fabernathy@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '810824188933', '0157755451', 5, 104, 2, '0Et0ST6r2M', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(64, 'Favian Kohler', 'beatty.devante@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '878569510167', '0104656079', 9, 203, 4, '3zFE6L8G4x', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(65, 'Rosina Ruecker', 'francisco97@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '848438010789', '0167960050', 2, 133, 4, 'vHVIBNVYr2', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(66, 'Jena Jacobson', 'rkassulke@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '872252795030', '0103281264', 9, 146, 5, 'IFWiR66f9F', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(67, 'Deion Reynolds', 'beer.melba@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '842323207929', '0173126118', 5, 80, 3, '4XJrsqiN3Y', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(68, 'Dr. Kamren Gutkowski Sr.', 'fkutch@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '858224399601', '0154058066', 9, 213, 2, '1N9Ck2LVRT', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(69, 'Abdul Christiansen', 'effie.murray@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '819621613358', '0130047146', 5, 58, 2, 'B9yL5J8eRP', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(70, 'Deontae Schmeler I', 'bartoletti.lisa@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '838283104379', '0172038394', 6, 112, 1, 'PTKZsLUd3T', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(71, 'Prof. Alayna Vandervort', 'vruecker@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '804687047129', '0156804251', 5, 188, 5, 'te6CAvlTJl', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(72, 'Precious Smitham', 'alessandra.keeling@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '855460188307', '0163508893', 4, 101, 5, 'wsiuMYrikF', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(73, 'Emmanuel Flatley', 'lockman.jairo@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '812415146678', '0179199540', 4, 134, 3, 'SKRsJMoppc', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(74, 'Karelle Adams III', 'orrin67@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '878749055633', '0168151888', 1, 167, 4, '9iO6DZCZCP', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(75, 'Deanna Nienow', 'alivia.kulas@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '862922296592', '0155005188', 3, 21, 4, 'MAboozC4Bb', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(76, 'Leonel Schmeler', 'eloisa.hackett@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '868650534102', '0181387655', 7, 2, 2, 'Idkv6RLP4g', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(77, 'Enrico Dooley Jr.', 'fabian.flatley@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '848991111792', '0135573606', 1, 39, 2, 'KJK7V5d5Kk', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(78, 'Karelle Stracke', 'smith.rickie@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '846164495610', '0187349871', 8, 38, 1, 'eFY2siiRe7', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(79, 'Providenci Legros', 'xnicolas@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '823258294147', '0118956083', 6, 113, 1, '0Jxo4QiNOu', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(80, 'Dr. Terrell Haley Jr.', 'mcdermott.samara@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '884624927185', '0149190681', 9, 95, 1, 'PlKuMfmqP0', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(81, 'Rosalia Walter', 'broberts@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '871645735167', '0145402395', 9, 50, 3, '2A1mDqIPD9', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(82, 'Melba Treutel', 'grady.jarrod@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '832017681081', '0136711888', 7, 115, 3, 'hLo0Unooju', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(83, 'Asa Towne', 'prosacco.dillan@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '871249804814', '0112639185', 4, 133, 2, 'MvN6zAE6zb', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(84, 'Hollie Jerde', 'qgibson@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '884698796982', '0161280064', 7, 160, 1, '0hlknOIbwp', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(85, 'Isac Johns', 'derrick.schroeder@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '810243275156', '0128919178', 1, 185, 1, 'KotBWNpP6X', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(86, 'Miss Odie Davis', 'abshire.hilda@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '835336375984', '0143681867', 9, 30, 3, 'TAxE7AV8PR', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(87, 'Dr. Fabian Leffler', 'jazmin73@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '800050534996', '0171702666', 3, 174, 1, '1FQhZe3RHd', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(88, 'Ephraim Gusikowski', 'jazmyn70@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '858043901536', '0102614148', 6, 182, 2, 'nBn3q9tXQE', NULL, '2020-09-03 23:52:19', '2020-09-03 23:52:19'),
(89, 'Maymie Windler', 'kohler.lazaro@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '809218686372', '0108706183', 8, 59, 1, 'NJomqxLtx2', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(90, 'Mr. Cesar Hauck II', 'crona.ila@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '806324773156', '0110599339', 5, 53, 2, '4DP4Q3L6VK', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(91, 'Ms. Jessica Grady', 'jaycee.barton@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '896077706786', '0117962616', 3, 115, 3, 'g46QbNsPBV', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(92, 'Dandre Stracke', 'dgerhold@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '828280071759', '0130191147', 8, 192, 4, 'nBZceOwqYV', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(93, 'Sonny Lynch', 'bennie.buckridge@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '872989137339', '0114650158', 4, 69, 5, 'gb1Ret5KKs', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(94, 'Prof. Sammie Hyatt', 'destiny26@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '852809924826', '0164082074', 2, 240, 3, 'fOUYwEHBWS', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(95, 'Margarita Hansen', 'ggaylord@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '883853327334', '0151875802', 7, 16, 5, 'Dv3U96Dtyl2EM2o6RvCHSqEu1BpJpMcWE85eq4gSb9xcxJYazkFRX6qdaqW6', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(96, 'Xander Rice Jr.', 'abraham.smitham@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '824054536322', '0102536976', 9, 108, 4, '0byI9pmIHC', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(97, 'Gordon Abshire', 'tbayer@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '888504906099', '0128772503', 5, 39, 1, 'wTjtRYTeMo', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(98, 'Dr. Summer Mohr Jr.', 'cummings.loy@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '806646319521', '0133850374', 3, 221, 3, '2Cb0TxWdf2', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(99, 'Orland Goldner', 'kparker@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '869734427791', '0172196151', 8, 235, 2, 'ctHzgXZzNx', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(100, 'Dr. Deven Murazik', 'howard79@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '887451353246', '0122545183', 8, 130, 3, 'iz2kvFl32S', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(101, 'Terrence McCullough', 'giovanni63@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '887916720713', '0135307651', 4, 215, 5, '3H8xwVsthu', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(102, 'Elmer Murphy I', 'jschultz@example.net', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '883724642716', '0157063288', 4, 12, 1, 'GHNT7pLD1o', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(103, 'Dr. Lexie Kohler IV', 'keenan18@example.org', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '868601635992', '0173372685', 8, 155, 1, 'BOXsLZoi8G', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(104, 'Jeanie Gibson', 'ischaefer@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '849889590423', '0120338344', 6, 161, 4, 'S41bkfJbMb', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20'),
(105, 'Marcus Weber', 'upton.connor@example.com', '2020-09-03 23:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '823708715289', '0120368712', 1, 61, 5, 'G8jyvEwclm', NULL, '2020-09-03 23:52:20', '2020-09-03 23:52:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditipenemuan`
--
ALTER TABLE `auditipenemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditipenemuan_auditi_foreign` (`auditi`),
  ADD KEY `auditipenemuan_laporan_id_foreign` (`laporan_id`),
  ADD KEY `auditipenemuan_penemuan_id_foreign` (`penemuan_id`),
  ADD KEY `auditipenemuan_organisasi_id_foreign` (`organisasi_id`),
  ADD KEY `auditipenemuan_progress_id_foreign` (`progress_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawatan`
--
ALTER TABLE `jawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawatankuasa`
--
ALTER TABLE `jawatankuasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawatankuasa_user_id_foreign` (`user_id`),
  ADD KEY `jawatankuasa_laporan_id_foreign` (`laporan_id`);

--
-- Indexes for table `kategoriaudit`
--
ALTER TABLE `kategoriaudit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoriaudit_subkategori_foreign` (`subkategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_auditor_foreign` (`auditor`),
  ADD KEY `laporan_kcad_foreign` (`kcad`),
  ADD KEY `laporan_organisasi_id_foreign` (`organisasi_id`),
  ADD KEY `laporan_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `maklumbalas`
--
ALTER TABLE `maklumbalas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maklumbalas_auditipenemuan_id_foreign` (`auditipenemuan_id`),
  ADD KEY `maklumbalas_auditi_foreign` (`auditi`),
  ADD KEY `maklumbalas_jawatankuasa_id_foreign` (`jawatankuasa_id`),
  ADD KEY `maklumbalas_progress_id_foreign` (`progress_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `negeri`
--
ALTER TABLE `negeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisasi_org_type_id_foreign` (`org_type_id`),
  ADD KEY `organisasi_negeri_id_foreign` (`negeri_id`);

--
-- Indexes for table `org_types`
--
ALTER TABLE `org_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penemuan`
--
ALTER TABLE `penemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penemuan_user_id_foreign` (`user_id`),
  ADD KEY `penemuan_organisasi_id_foreign` (`organisasi_id`),
  ADD KEY `penemuan_laporan_id_foreign` (`laporan_id`),
  ADD KEY `penemuan_progress_id_foreign` (`progress_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `ulasanpenemuan`
--
ALTER TABLE `ulasanpenemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasanpenemuan_auditor_foreign` (`auditor`),
  ADD KEY `ulasanpenemuan_kcad_foreign` (`kcad`),
  ADD KEY `ulasanpenemuan_penemuan_id_foreign` (`penemuan_id`),
  ADD KEY `ulasanpenemuan_progress_id_foreign` (`progress_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_jawatan_id_foreign` (`jawatan_id`),
  ADD KEY `users_organisasi_id_foreign` (`organisasi_id`),
  ADD KEY `users_created_by_foreign` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `auditipenemuan`
--
ALTER TABLE `auditipenemuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawatan`
--
ALTER TABLE `jawatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jawatankuasa`
--
ALTER TABLE `jawatankuasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategoriaudit`
--
ALTER TABLE `kategoriaudit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maklumbalas`
--
ALTER TABLE `maklumbalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `negeri`
--
ALTER TABLE `negeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `org_types`
--
ALTER TABLE `org_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penemuan`
--
ALTER TABLE `penemuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ulasanpenemuan`
--
ALTER TABLE `ulasanpenemuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auditipenemuan`
--
ALTER TABLE `auditipenemuan`
  ADD CONSTRAINT `auditipenemuan_auditi_foreign` FOREIGN KEY (`auditi`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auditipenemuan_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auditipenemuan_organisasi_id_foreign` FOREIGN KEY (`organisasi_id`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auditipenemuan_penemuan_id_foreign` FOREIGN KEY (`penemuan_id`) REFERENCES `penemuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auditipenemuan_progress_id_foreign` FOREIGN KEY (`progress_id`) REFERENCES `progress` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jawatankuasa`
--
ALTER TABLE `jawatankuasa`
  ADD CONSTRAINT `jawatankuasa_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawatankuasa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kategoriaudit`
--
ALTER TABLE `kategoriaudit`
  ADD CONSTRAINT `kategoriaudit_subkategori_foreign` FOREIGN KEY (`subkategori`) REFERENCES `kategoriaudit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_auditor_foreign` FOREIGN KEY (`auditor`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriaudit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_kcad_foreign` FOREIGN KEY (`kcad`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_organisasi_id_foreign` FOREIGN KEY (`organisasi_id`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maklumbalas`
--
ALTER TABLE `maklumbalas`
  ADD CONSTRAINT `maklumbalas_auditi_foreign` FOREIGN KEY (`auditi`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maklumbalas_auditipenemuan_id_foreign` FOREIGN KEY (`auditipenemuan_id`) REFERENCES `auditipenemuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maklumbalas_jawatankuasa_id_foreign` FOREIGN KEY (`jawatankuasa_id`) REFERENCES `jawatankuasa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maklumbalas_progress_id_foreign` FOREIGN KEY (`progress_id`) REFERENCES `progress` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD CONSTRAINT `organisasi_negeri_id_foreign` FOREIGN KEY (`negeri_id`) REFERENCES `negeri` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organisasi_org_type_id_foreign` FOREIGN KEY (`org_type_id`) REFERENCES `org_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penemuan`
--
ALTER TABLE `penemuan`
  ADD CONSTRAINT `penemuan_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penemuan_organisasi_id_foreign` FOREIGN KEY (`organisasi_id`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penemuan_progress_id_foreign` FOREIGN KEY (`progress_id`) REFERENCES `progress` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penemuan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ulasanpenemuan`
--
ALTER TABLE `ulasanpenemuan`
  ADD CONSTRAINT `ulasanpenemuan_auditor_foreign` FOREIGN KEY (`auditor`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasanpenemuan_kcad_foreign` FOREIGN KEY (`kcad`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasanpenemuan_penemuan_id_foreign` FOREIGN KEY (`penemuan_id`) REFERENCES `penemuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasanpenemuan_progress_id_foreign` FOREIGN KEY (`progress_id`) REFERENCES `progress` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_jawatan_id_foreign` FOREIGN KEY (`jawatan_id`) REFERENCES `jawatan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_organisasi_id_foreign` FOREIGN KEY (`organisasi_id`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
