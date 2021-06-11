-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2021 at 06:59 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` bigint(20) DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sosmed` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` bigint(20) NOT NULL,
  `subyek` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelapor` bigint(20) DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pict_1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pict_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pict_3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_urgent` tinyint(1) DEFAULT NULL,
  `is_valid` tinyint(1) DEFAULT NULL,
  `alasan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `kode_lanjutan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `kode`, `name`, `gender`, `alamat`, `desa`, `kecamatan`, `kota`, `telepon`, `pekerjaan`, `email`, `sosmed`, `media`, `subyek`, `uraian`, `pelapor`, `status`, `pict_1`, `pict_2`, `pict_3`, `lng`, `lat`, `is_urgent`, `is_valid`, `alasan`, `is_public`, `kode_lanjutan`, `created_at`, `updated_at`) VALUES
(1, '2021-0611-103856', 'User', 'Pria', 'Jalan', 'Desa', 'kecamatan', 'Kota', '2345678', 5, 'user@email.com', 'edrfghjk', 5, 'subjek', 'uraian', 3, '3', '2021-0611-103856_1.png', NULL, NULL, '112.73345947265626', '-7.450592342292256', 1, 1, NULL, NULL, NULL, '2021-06-11 03:38:57', '2021-06-11 03:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_progresses`
--

CREATE TABLE `complaint_progresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) NOT NULL,
  `aksi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_progresses`
--

INSERT INTO `complaint_progresses` (`id`, `complaint_id`, `aksi`, `lokasi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Simpan', 'Sekretariat', '3', '2021-06-11 03:38:57', '2021-06-11 03:38:57'),
(2, 1, 'Validasi', 'Manajemen', '1', '2021-06-11 03:39:38', '2021-06-11 03:39:38'),
(3, 1, 'Klasifikasi', 'Manajemen', '1', '2021-06-11 03:39:51', '2021-06-11 03:39:51'),
(4, 1, 'Respon', 'BADAN KEPEGAWAIAN DAERAH', '2', '2021-06-11 03:51:45', '2021-06-11 03:51:45'),
(5, 1, 'Respon', 'BADAN KESATUAN BANGSA DAN POLITIK', '4', '2021-06-11 04:00:36', '2021-06-11 04:00:36'),
(6, 1, 'Tindak Lanjut', 'BADAN KEPEGAWAIAN DAERAH', '2', '2021-06-11 06:46:20', '2021-06-11 06:46:20'),
(7, 1, 'Respon', 'BADAN KESATUAN BANGSA DAN POLITIK', '4', '2021-06-11 06:57:54', '2021-06-11 06:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `sumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_sumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dasar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dokumen` date NOT NULL,
  `no_dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekanan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `complaint_id`, `user_id`, `tgl_mulai`, `tgl_selesai`, `kegiatan`, `biaya`, `sumber`, `detail_sumber`, `dasar`, `tgl_dokumen`, `no_dokumen`, `rekanan`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2021-06-11', '2021-06-30', 'followup', 2000000, '1', 'apbd', 'vdvvs', '2021-06-11', 'fvbfb gfngfng', 'nama', '2021-06-11 06:46:20', '2021-06-11 06:46:20'),
(2, '1', '4', '2021-06-11', '2021-06-25', 'dfghnjm,.', 31456789, '1', 'fvgbnm,./', 'cfsxvd', '2021-06-11', '123456yuio', NULL, '2021-06-11 06:57:54', '2021-06-11 06:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pekerjaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `pekerjaan`) VALUES
(1, 'Pegawai Negeri Sipil'),
(2, 'TNI'),
(3, 'POLRI'),
(4, 'Pensiunan'),
(5, 'Karyawan Swasta'),
(6, 'Wiraswasta'),
(7, 'Petani/Nelayan'),
(8, 'Jasa'),
(9, 'Pelajar/Mahasiswa'),
(10, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, 'Administrator'),
(2, 'Manajer Sekretariat P3M'),
(3, 'Manager Organisasi'),
(4, 'Operator Data P3M'),
(5, 'Bakohumas'),
(6, 'Eksekutif/Legislatif'),
(7, 'Operator Laporan'),
(8, 'Tamu');

-- --------------------------------------------------------

--
-- Table structure for table `mappings`
--

CREATE TABLE `mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `scope_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mappings`
--

INSERT INTO `mappings` (`id`, `complaint_id`, `unit_id`, `scope_id`, `created_at`, `updated_at`) VALUES
(1, 1, 43, 17, '2021-06-11 03:39:50', '2021-06-11 03:39:50'),
(2, 1, 43, 1, '2021-06-11 03:39:50', '2021-06-11 03:39:50'),
(3, 1, 11, 17, '2021-06-11 03:39:50', '2021-06-11 03:39:50'),
(4, 1, 11, 1, '2021-06-11 03:39:51', '2021-06-11 03:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media`) VALUES
(1, 'FORMULIR PENGADUAN'),
(2, 'SURAT'),
(3, 'TELEPON'),
(4, 'FAXIMILI'),
(5, 'MAJALAH/SURAT KABAR'),
(6, 'RADIO/TELEVISI'),
(7, 'KUNJUNGAN PIMPINAN'),
(8, 'EMAIL'),
(9, 'APLIKASI P3M ONLINE'),
(10, 'BUKU TAMU SITUS'),
(11, 'LAIN-LAIN'),
(12, 'FACEBOOK'),
(13, 'INSTAGRAM'),
(14, 'TWITTER');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2021_03_24_081721_update_users_table', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2019_08_19_000000_create_failed_jobs_table', 2),
(8, '2021_04_12_113003_create_jobs_table', 2),
(9, '2021_04_12_113119_create_media_table', 2),
(10, '2021_04_12_113320_create_units_table', 2),
(11, '2021_04_12_113605_create_scopes_table', 2),
(13, '2021_04_14_105618_create_mappings_table', 2),
(15, '2021_04_15_121737_create_levels_table', 2),
(16, '2021_04_16_101955_add_field_is_deleted_scope_table', 2),
(17, '2021_04_21_102032_add_field_kodeunit_unit_table', 2),
(18, '2021_04_21_105044_drop_field_scope_id_unit_table', 2),
(19, '2021_04_21_105640_create_unit_mappings_table', 2),
(20, '2021_04_22_103207_alter_units_table_nullable_field', 2),
(22, '2021_04_14_110324_create_responses_table', 3),
(23, '2021_04_14_104217_create_complaints_table', 4),
(24, '2021_05_04_130818_create_complaint_progresses_table', 5),
(25, '2021_06_11_124554_create_followups_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) NOT NULL,
  `uraian` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `responden` bigint(20) NOT NULL,
  `read_at` datetime DEFAULT NULL,
  `pict_1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pict_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pict_3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `complaint_id`, `uraian`, `jenis`, `responden`, `read_at`, `pict_1`, `pict_2`, `pict_3`, `long`, `lat`, `created_at`, `updated_at`) VALUES
(1, 1, 'cek respon', 'Respon', 2, NULL, '2021-0611-105145_1.jpg', NULL, NULL, '112.72556304931642', '-7.448750497366478', '2021-06-11 03:51:45', '2021-06-11 03:51:45'),
(2, 1, 'respon cek 2', 'Respon', 4, NULL, '2021-0611-110036_1.png', NULL, NULL, '112.73656010627748', '-7.4829846235109', '2021-06-11 04:00:36', '2021-06-11 04:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `scopes`
--

CREATE TABLE `scopes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scopes`
--

INSERT INTO `scopes` (`id`, `bidang`, `is_deleted`) VALUES
(1, 'Industri dan Perdagangan', 0),
(2, 'Pertanian, Peternakan dan Perkebunan', 0),
(3, 'Perikanan dan Kelautan', 0),
(4, 'Pekerjaan Umum', 0),
(5, 'Tenaga Kerja', 0),
(6, 'Perhubungan', 0),
(7, 'Sumber Daya Alam, Pertambangan dan LH', 0),
(8, 'Pendidikan, Agama dan Kebudayaan', 0),
(9, 'Pariwisata', 0),
(10, 'Kesehatan', 0),
(11, 'Pertanahan', 0),
(12, 'Keamanan dan Ketertiban', 0),
(13, 'Kelembagaan, Aparatur, Keuangan dan Pendapatan Daerah', 0),
(14, 'Perijinan dan Penanaman Modal', 0),
(15, 'Koperasi, Pengusaha Kecil dan Menengah', 0),
(16, 'Pemberdayaan Masyarakat', 0),
(17, 'Bidang Pelayanan Kecamatan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `nama`, `alamat`, `telepon`, `email`, `tingkat`, `is_active`, `kode`) VALUES
(1, 'DINAS PERIKANAN', NULL, NULL, NULL, NULL, 1, '404.5.18'),
(5, 'SEKRETARIAT DPRD', NULL, NULL, NULL, NULL, 1, '404.3'),
(6, 'KECAMATAN BALONGBENDO', NULL, NULL, NULL, NULL, 1, '404.8.11'),
(7, 'KECAMATAN TANGGULANGIN', NULL, NULL, NULL, NULL, 1, '404.8.16'),
(8, 'KECAMATAN TULANGAN', NULL, NULL, NULL, NULL, 1, '404.8.13'),
(9, 'DINAS PERHUBUNGAN', NULL, NULL, NULL, NULL, 1, '404.5.12'),
(10, 'BAGIAN UMUM', NULL, NULL, NULL, NULL, 1, '404.1.3.2'),
(11, 'BADAN KESATUAN BANGSA DAN POLITIK', '', NULL, NULL, 'Induk', 1, '404.6.5'),
(12, 'SATUAN POLISI PAMONG PRAJA', NULL, NULL, NULL, NULL, 1, '404.5.5'),
(13, 'KECAMATAN TAMAN', NULL, NULL, NULL, NULL, 1, '404.8.7'),
(14, 'DINAS PERINDUSTRIAN DAN PERDAGANGAN', NULL, NULL, NULL, NULL, 1, '404.5.19'),
(15, 'DINAS KOMUNIKASI DAN INFORMATIKA', NULL, NULL, NULL, NULL, 1, '404.5.13'),
(16, 'BAGIAN KESEJAHTERAAN RAKYAT', NULL, NULL, NULL, NULL, 1, '404.1.1.2'),
(17, 'BAGIAN PENGADAAN BARANG / JASA', NULL, NULL, NULL, NULL, 1, '404.1.2.3'),
(18, 'KECAMATAN WARU', NULL, NULL, NULL, NULL, 1, '404.8.6'),
(19, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', NULL, NULL, NULL, NULL, 1, '404.5.3'),
(20, 'DINAS PANGAN DAN PERTANIAN', NULL, NULL, NULL, NULL, 1, '404.5.9'),
(21, 'BAGIAN PEMBANGUNAN', NULL, NULL, NULL, NULL, 1, '404.1.2.2'),
(22, 'KECAMATAN CANDI', NULL, NULL, NULL, NULL, 1, '404.8.2'),
(23, 'KECAMATAN PRAMBON', NULL, NULL, NULL, NULL, 1, '404.8.14'),
(24, 'KECAMATAN SUKODONO', NULL, NULL, NULL, NULL, 1, '404.8.10'),
(25, 'DINAS PENDIDIKAN DAN KEBUDAYAAN', NULL, NULL, NULL, NULL, 1, '404.5.1'),
(26, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', NULL, NULL, NULL, NULL, 1, '404.5.11'),
(27, 'KECAMATAN BUDURAN', NULL, NULL, NULL, NULL, 1, '404.8.3'),
(29, 'BAGIAN PEMERINTAHAN', NULL, NULL, NULL, NULL, 1, '404.1.1.1'),
(31, 'BAGIAN ORGANISASI', NULL, NULL, NULL, NULL, 1, '404.1.3.1'),
(32, 'DINAS KEPEMUDAAN, OLAHRAGA,  DAN PARIWISATA', NULL, NULL, NULL, NULL, 1, '438.5.17'),
(33, 'KECAMATAN KREMBUNG', NULL, NULL, NULL, NULL, 1, '404.8.15'),
(35, 'KECAMATAN WONOAYU', NULL, NULL, NULL, NULL, 1, '404.8.9'),
(36, 'KECAMATAN SEDATI', NULL, NULL, NULL, NULL, 1, '404.8.5'),
(37, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK,  KB', NULL, NULL, NULL, NULL, 1, '404.5.8'),
(38, 'KECAMATAN KRIAN', NULL, NULL, NULL, NULL, 1, '404.8.8'),
(39, 'BAGIAN PROTOKOL DAN RUMAH TANGGA', NULL, NULL, NULL, NULL, 1, '404.1.3.3'),
(40, 'DINAS LINGKUNGAN HIDUP DAN KEBERSIHAN', NULL, NULL, NULL, NULL, 1, '404.5.10'),
(41, 'DINAS KESEHATAN', NULL, NULL, NULL, NULL, 1, '404.5.2'),
(42, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', NULL, NULL, NULL, NULL, 1, '404.5.15'),
(43, 'BADAN KEPEGAWAIAN DAERAH', '', NULL, NULL, 'Induk', 1, '438.6.4'),
(44, 'BAGIAN HUKUM', NULL, NULL, NULL, NULL, 1, '404.1.1.3'),
(45, 'RUMAH SAKIT UMUM DAERAH (RSUD)', NULL, NULL, NULL, NULL, 1, '404.6.7'),
(46, 'KECAMATAN GEDANGAN', NULL, NULL, NULL, NULL, 1, '404.8.4'),
(47, 'KECAMATAN SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.8.1'),
(48, 'KECAMATAN TARIK', NULL, NULL, NULL, NULL, 1, '404.8.12'),
(49, 'DINAS KOPERASI DAN USAHA MIKRO', NULL, NULL, NULL, NULL, 1, '404.5.14'),
(50, 'DINAS PERPUSTAKAAN DAN KEARSIPAN', NULL, NULL, NULL, NULL, 1, '404.5.17'),
(51, 'KECAMATAN JABON', NULL, NULL, NULL, NULL, 1, '404.8.17'),
(53, 'BAGIAN PEREKONOMIAN DAN SUMBER DAYA ALAM (SDA)', NULL, NULL, NULL, NULL, 1, '404.1.2.1'),
(54, 'INSPEKTORAT', NULL, NULL, NULL, NULL, 1, '404.4'),
(57, 'SEKRETARIAT DAERAH', NULL, NULL, NULL, NULL, 1, '404.1'),
(59, 'KELURAHAN MINDI', NULL, NULL, NULL, NULL, 1, '404.8.18.2'),
(60, 'KELURAHAN PUCANG', NULL, NULL, NULL, NULL, 1, '404.8.1.1'),
(61, 'KELURAHAN SIDOKLUMPUK', NULL, NULL, NULL, NULL, 1, '404.8.1.2'),
(62, 'KELURAHAN SIDOKUMPUL', NULL, NULL, NULL, NULL, 1, '404.8.1.3'),
(63, 'KELURAHAN PUCANGANOM', NULL, NULL, NULL, NULL, 1, '404.8.1.4'),
(64, 'KELURAHAN BULUSIDOKARE', NULL, NULL, NULL, NULL, 1, '404.8.1.5'),
(65, 'KELURAHAN SEKARDANGAN', NULL, NULL, NULL, NULL, 1, '404.8.1.6'),
(66, 'KELURAHAN CELEP', NULL, NULL, NULL, NULL, 1, '404.8.1.7'),
(68, 'KELURAHAN PEKAUMAN', NULL, NULL, NULL, NULL, 1, '404.8.1.9'),
(69, 'KELURAHAN LEMAHPUTRO', NULL, NULL, NULL, NULL, 1, '404.8.1.10'),
(70, 'KELURAHAN GEBANG', NULL, NULL, NULL, NULL, 1, '404.8.1.11'),
(71, 'KELURAHAN URANG AGUNG', NULL, NULL, NULL, NULL, 1, '404.8.1.12'),
(72, 'KELURAHAN CEMENGKALANG', NULL, NULL, NULL, NULL, 1, '404.8.1.13'),
(73, 'KELURAHAN JATIREJO', NULL, NULL, NULL, NULL, 1, '404.8.18.6'),
(74, 'KELURAHAN SIRING', NULL, NULL, NULL, NULL, 1, '404.8.18.5'),
(75, 'KELURAHAN GEDANG', NULL, NULL, NULL, NULL, 1, '404.8.18.4'),
(76, 'KELURAHAN JUWETKENONGO', NULL, NULL, NULL, NULL, 1, '404.8.18.3'),
(78, 'KELURAHAN PORONG', NULL, NULL, NULL, NULL, 1, '404.8.18.1'),
(79, 'KELURAHAN KEMASAN', NULL, NULL, NULL, NULL, 1, '404.8.8.3'),
(80, 'KELURAHAN TAMBAK KEMERAKAN', NULL, NULL, NULL, NULL, 1, '404.8.8.2'),
(81, 'KELURAHAN KRIAN', NULL, NULL, NULL, NULL, 1, '404.8.8.1'),
(82, 'KELURAHAN SEPANJANG', NULL, NULL, NULL, NULL, 1, '404.8.7.3'),
(83, 'KELURAHAN KETEGAN', NULL, NULL, NULL, NULL, 1, '404.8.7.2'),
(84, 'KELURAHAN KALIJATEN', NULL, NULL, NULL, NULL, 1, '404.8.7.7'),
(85, 'KELURAHAN GELURAN', NULL, NULL, NULL, NULL, 1, '404.8.7.8'),
(87, 'KELURAHAN NGELOM', NULL, NULL, NULL, NULL, 1, '404.8.7.6'),
(88, 'KELURAHAN WONOCOLO', NULL, NULL, NULL, NULL, 1, '404.8.7.4'),
(89, 'KELURAHAN BEBEKAN', NULL, NULL, NULL, NULL, 1, '404.8.7.5'),
(94, 'BADAN PENANGGULANGAN BENCANA DAERAH', NULL, NULL, NULL, NULL, 1, '404.6.6'),
(97, 'UPT PUSKESMAS BALONGBENDO', NULL, NULL, NULL, NULL, 1, '404.5.2.1.16'),
(98, 'UPT PUSKESMAS BARENGKRAJAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.25'),
(99, 'UPT PUSKESMAS BUDURAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.4'),
(100, 'UPT PUSKESMAS CANDI', NULL, NULL, NULL, NULL, 1, '404.5.2.1.5'),
(101, 'UPT PUSKESMAS GEDANGAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.23'),
(102, 'UPT PUSKESMAS JABON', NULL, NULL, NULL, NULL, 1, '404.5.2.1.11'),
(103, 'UPT PUSKESMAS KEDUNGSOLO', NULL, NULL, NULL, NULL, 1, '404.5.2.1.7'),
(104, 'UPT PUSKESMAS KEPADANGAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.10'),
(105, 'UPT PUSKESMAS KREMBUNG', NULL, NULL, NULL, NULL, 1, '404.5.2.1.12'),
(106, 'UPT SMPN 1 SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.1'),
(107, 'UPT SMPN 2 SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.2'),
(108, 'UPT SMPN 3 SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.3'),
(111, 'UPT SMPN 2 SEDATI ', NULL, NULL, NULL, NULL, 1, '404.5.1.2.19'),
(112, 'UPT SMPN 1 WARU', NULL, NULL, NULL, NULL, 1, '404.5.1.2.23'),
(113, 'UPT SMPN 2 WARU', NULL, NULL, NULL, NULL, 1, '404.5.1.2.24'),
(114, 'UPT SMPN 3 WARU', NULL, NULL, NULL, NULL, 1, '404.5.1.2.25'),
(115, 'UPT SMPN 4 WARU ', NULL, NULL, NULL, NULL, 1, '404.5.1.2.26'),
(117, 'UPT PUSKESMAS KRIAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.13'),
(118, 'UPT SMPN 1 WONOAYU', NULL, NULL, NULL, NULL, 1, '404.5.1.2.29'),
(119, 'UPT PUSKESMAS MEDAENG', NULL, NULL, NULL, NULL, 1, '404.5.2.1.22'),
(120, 'UPT SMPN 2 WONOAYU', NULL, NULL, NULL, NULL, 1, '404.5.1.2.30'),
(121, 'UPT SMPN 1 KREMBUNG', NULL, NULL, NULL, NULL, 1, '404.5.1.2.31'),
(122, 'UPT PUSKESMAS PORONG', NULL, NULL, NULL, NULL, 1, '404.5.2.1.6'),
(123, 'UPT SMPN 4 SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.4'),
(124, 'UPT SMPN 2 KREMBUNG', NULL, NULL, NULL, NULL, 1, '404.5.1.2.32'),
(125, 'UPT PUSKESMAS PRAMBON', NULL, NULL, NULL, NULL, 1, '404.5.2.1.14'),
(126, 'UPT SMPN 1 BUDURAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.33'),
(127, 'UPT PUSKESMAS SEDATI', NULL, NULL, NULL, NULL, 1, '404.5.2.1.17'),
(128, 'UPT SMPN 2 BUDURAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.34'),
(129, 'UPT SMPN 5 SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.5'),
(130, 'UPT SMPN 1 BALONGBENDO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.35'),
(131, 'UPT PUSKESMAS SEKARDANGAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.2'),
(132, 'UPT SMPN 1 GEDANGAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.39'),
(133, 'UPT PUSKESMAS SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.2.1.1'),
(134, 'UPT SMPN 2 GEDANGAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.40'),
(135, 'UPT SMPN 6 SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.6'),
(136, 'UPT PUSKESMAS SUKODONO', NULL, NULL, NULL, NULL, 1, '404.5.2.1.24'),
(137, 'UPT SMPN 1 SUKODONO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.41'),
(138, 'UPT SMPN 2 SUKODONO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.42'),
(139, 'UPT PUSKESMAS TAMAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.19'),
(140, 'UPT SMPN 1 KRIAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.7'),
(141, 'UPT SMPN 1 JABON', NULL, NULL, NULL, NULL, 1, '404.5.1.2.43'),
(143, 'UPT PUSKESMAS TANGGULANGIN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.8'),
(144, 'UPT SMPN 2 KRIAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.8'),
(146, 'UPT PUSKESMAS TARIK', NULL, NULL, NULL, NULL, 1, '404.5.2.1.15'),
(149, 'UPT SMPN 3 KRIAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.9'),
(151, 'UPT PUSKESMAS TROSOBO', NULL, NULL, NULL, NULL, 1, '404.5.2.1.20'),
(153, 'UPT SMPN 1 TAMAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.10'),
(154, 'UPT PUSKESMAS TULANGAN', NULL, NULL, NULL, NULL, 1, '404.5.2.1.9'),
(157, 'UPT SMPN 2 TAMAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.11'),
(158, 'UPT PUSKESMAS URANG AGUNG', NULL, NULL, NULL, NULL, 1, '404.5.2.1.3'),
(161, 'UPT PUSKESMAS WARU', NULL, NULL, NULL, NULL, 1, '404.5.2.1.21'),
(162, 'UPT SMPN 3 TAMAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.12'),
(164, 'UPT PUSKESMAS WONOAYU', NULL, NULL, NULL, NULL, 1, '404.5.2.1.18'),
(165, 'UPT PUSKESMAS GANTING', NULL, NULL, NULL, NULL, 1, '404.5.2.1.26'),
(166, 'UPT SMPN 1 PORONG ', NULL, NULL, NULL, NULL, 1, '404.5.1.2.13'),
(167, 'UPT INSTALASI FARMASI', NULL, NULL, NULL, NULL, 1, '404.5.2.2'),
(168, 'UPT SMPN 2 PORONG ', NULL, NULL, NULL, NULL, 1, '404.5.1.2.14'),
(169, 'UPT SMPN 3 PORONG ', NULL, NULL, NULL, NULL, 1, '404.5.1.2.15'),
(170, 'UPT SMPN 1 TARIK', NULL, NULL, NULL, NULL, 1, '404.5.1.2.16'),
(171, 'UPT SMPN 2 TARIK ', NULL, NULL, NULL, NULL, 1, '404.5.1.2.17'),
(172, 'UPT SMPN 1 SEDATI', NULL, NULL, NULL, NULL, 1, '404.5.1.2.18'),
(174, 'UPT SMPN 2 JABON', NULL, NULL, NULL, NULL, 1, '404.5.1.2.44'),
(179, 'UPT SMPN 1 CANDI', NULL, NULL, NULL, NULL, 1, '404.5.1.2.20'),
(180, 'UPT SMPN 2 BALONGBENDO', NULL, NULL, NULL, NULL, 1, '404.5.1.2.36'),
(181, 'UPT SMPN 3 CANDI', NULL, NULL, NULL, NULL, 1, '404.5.1.2.22'),
(182, 'UPT SMPN 2 TANGGULANGIN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.38'),
(183, 'UPT SMPN 2 CANDI', NULL, NULL, NULL, NULL, 1, '404.5.1.2.21'),
(184, 'UPT SMPN 1 TANGGULANGIN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.37'),
(187, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.1.1.1'),
(188, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN CANDI', NULL, NULL, NULL, NULL, 1, '404.5.1.1.3'),
(189, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN BUDURAN', NULL, NULL, NULL, NULL, 1, '404.5.1.1.2'),
(190, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN PORONG', NULL, NULL, NULL, NULL, 1, '404.5.1.1.5'),
(191, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN TULANGAN', NULL, NULL, NULL, NULL, 1, '404.5.1.1.8'),
(192, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN TANGGULANGIN', NULL, NULL, NULL, NULL, 1, '404.5.1.1.7'),
(193, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN KREMBUNG', NULL, NULL, NULL, NULL, 1, '404.5.1.1.6'),
(194, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN JABON', NULL, NULL, NULL, NULL, 1, '404.5.1.1.4'),
(195, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN KRIAN', NULL, NULL, NULL, NULL, 1, '404.5.1.1.9'),
(196, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN BALONGBENDO', NULL, NULL, NULL, NULL, 1, '404.5.1.1.10'),
(197, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN TARIK', NULL, NULL, NULL, NULL, 1, '404.5.1.1.11'),
(198, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN PRAMBON', NULL, NULL, NULL, NULL, 1, '404.5.1.1.12'),
(199, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN WONOAYU', NULL, NULL, NULL, NULL, 1, '404.5.1.1.13'),
(200, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN TAMAN', NULL, NULL, NULL, NULL, 1, '404.5.1.1.14'),
(201, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN SUKODONO', NULL, NULL, NULL, NULL, 1, '404.5.1.1.15'),
(202, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN WARU', NULL, NULL, NULL, NULL, 1, '404.5.1.1.16'),
(203, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN GEDANGAN', NULL, NULL, NULL, NULL, 1, '404.5.1.1.18'),
(204, 'UPT PENDIDIKAN DAN KEBUDAYAAN KECAMATAN SEDATI', NULL, NULL, NULL, NULL, 1, '404.5.1.1.17'),
(205, 'PEMERINTAH KABUPATEN SIDOARJO', NULL, NULL, NULL, NULL, 1, 'pemkabsda'),
(207, 'BADAN PELAYANAN PAJAK DAERAH', NULL, NULL, NULL, NULL, 1, '404.6.3'),
(208, 'BADAN PELAYANAN PAJAK DAERAH..', NULL, NULL, NULL, NULL, 1, '438.6.3.1'),
(209, 'UPT PELAYANAN PAJAK DAERAH TAMAN', NULL, NULL, NULL, NULL, 1, '404.6.3.2'),
(210, 'UPT PELAYANAN PAJAK DAERAH KRIAN', NULL, NULL, NULL, NULL, 1, '404.6.3.3'),
(211, 'UPT PELAYANAN PAJAK DAERAH TULANGAN', NULL, NULL, NULL, NULL, 1, '404.6.3.4'),
(213, 'UPT PELAYANAN PAJAK DAERAH SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.6.3.1'),
(214, 'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH', NULL, NULL, NULL, NULL, 1, '404.6.2'),
(215, 'DINAS PERUMAHAN DAN PERMUKIMAN', NULL, NULL, NULL, NULL, 1, '404.5.4'),
(216, 'DINAS SOSIAL', NULL, NULL, NULL, NULL, 1, '404.5.6'),
(217, 'DINAS TENAGA KERJA', NULL, NULL, NULL, NULL, 1, '404.5.7'),
(218, 'UPT SEKRETARIAT DEWAN PENGURUS KORPRI', NULL, NULL, NULL, NULL, 1, '404.6.4.1'),
(219, 'UPT GELORA DELTA SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.16.1'),
(220, 'UPT PUSAT PELAYANAN PENGADUAN MASYARAKAT', NULL, NULL, NULL, NULL, 1, '404.5.13.1'),
(221, 'UPT  TEMPAT PEMROSESAN AKHIR (TPA)', NULL, NULL, NULL, NULL, 1, '404.5.10.1'),
(222, 'UPTD LABORATORIUM LINGKUNGAN', NULL, NULL, NULL, NULL, 1, '404.5.10.2'),
(223, 'UPT RUMAH POTONG HEWAN (RPH) KRIAN', NULL, NULL, NULL, NULL, 1, '404.5.9.1'),
(224, 'UPT RUMAH POTONG HEWAN (RPH) PORONG', NULL, NULL, NULL, NULL, 1, '404.5.9.2'),
(225, 'UPTD AIR DAN JALAN WILAYAH TROSOBO', NULL, NULL, NULL, NULL, 1, '404.5.3.1'),
(226, 'UPTD AIR DAN JALAN WILAYAH SUMPUT', NULL, NULL, NULL, NULL, 1, '404.5.3.2'),
(227, 'UPTD AIR DAN JALAN WILAYAH PRAMBON', NULL, NULL, NULL, NULL, 1, '404.5.3.3'),
(228, 'UPTD AIR DAN JALAN WILAYAH PORONG', NULL, NULL, NULL, NULL, 1, '404.5.3.4'),
(229, 'UPTD AIR DAN JALAN WILAYAH GEDANGAN', NULL, NULL, NULL, NULL, 1, '404.5.3.5'),
(230, 'UPT BUZEM DAN RUMAH POMPA', NULL, NULL, NULL, NULL, 1, '404.5.3.6'),
(231, 'UPT PERLINDUNGAN PEREMPUAN DAN ANAK', NULL, NULL, NULL, NULL, 1, '404.5.8.1'),
(232, 'UPT UJI KENDARAAN BERMOTOR', NULL, NULL, NULL, NULL, 1, '404.5.12.1'),
(233, 'UPT TERMINAL', NULL, NULL, NULL, NULL, 1, '404.5.12.2'),
(234, 'UPT PARKIR', NULL, NULL, NULL, NULL, 1, '404.5.12.3'),
(235, 'UPT PASAR IKAN DAN PASAR IKAN HIAS', NULL, NULL, NULL, NULL, 1, '404.5.18.1'),
(236, 'UPT PASAR SIDOARJO', NULL, NULL, NULL, NULL, 1, '404.5.19.1.1'),
(237, 'UPT PASAR TAMAN', NULL, NULL, NULL, NULL, 1, '404.5.19.1.2'),
(238, 'UPTD PASAR DAERAH', NULL, NULL, NULL, NULL, 1, '404.5.19.1.3'),
(239, 'UPT PASAR PORONG', NULL, NULL, NULL, NULL, 1, '404.5.19.1.4'),
(240, 'UPT PASAR WADUNGASRI', NULL, NULL, NULL, NULL, 1, '404.5.19.1.5'),
(241, 'UPT RUMAH SUSUN SEDERHANA SEWA (RUSUNAWA)', NULL, NULL, NULL, NULL, 1, '404.5.4.1'),
(242, 'UPT PEMAKAMAN', NULL, NULL, NULL, NULL, 1, '404.5.4.2'),
(243, 'UPT LINGKUNGAN PONDOK SOSIAL (LIPONSOS)', NULL, NULL, NULL, NULL, 1, '404.5.6.1'),
(245, 'STAF AHLI BUPATI', NULL, NULL, NULL, NULL, 1, '404.2'),
(246, 'UPT ANAK BERKEBUTUHAN KHUSUS', NULL, NULL, NULL, NULL, 1, '404.5.1.3'),
(696, 'KELURAHAN MAGERSARI', NULL, NULL, NULL, NULL, 1, '404.8.1.14'),
(697, 'UPT SMPN 1 PRAMBON', NULL, NULL, NULL, NULL, 1, '404.5.1.2.45'),
(698, 'UPT SMPN SATU ATAP BUDURAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.46'),
(699, 'UPT SMPN 1 TULANGAN', NULL, NULL, NULL, NULL, 1, '404.5.1.2.47'),
(700, 'KECAMATAN PORONG', NULL, NULL, NULL, NULL, 1, '404.8.18'),
(701, 'UPT SMPN SATU ATAP JABON', NULL, NULL, NULL, NULL, 1, '404.5.1.2.48'),
(702, 'KELURAHAN SIDOKARE', NULL, NULL, NULL, NULL, 1, '11111'),
(703, 'KELURAHAN TAMAN', NULL, NULL, NULL, NULL, 1, '00001'),
(704, 'SEKRETARIAT KPU', NULL, NULL, NULL, NULL, 1, '329.888'),
(705, 'UPTD PENGELOLAAN AIR LIMBAH DOMESTIK', NULL, NULL, NULL, NULL, 1, '404.5.4.3'),
(706, 'UPT METROLOGI LEGAL', NULL, NULL, NULL, NULL, 1, '404.5.19.U'),
(707, 'UPT PENILAIAN KOMPETENSI ASN', NULL, NULL, NULL, NULL, 1, '404.6.4.2'),
(708, 'UPTD RPH DAN PASAR HEWAN', NULL, NULL, NULL, NULL, 1, '404.5.9.4'),
(709, 'UPTD LABORATORIUM KESWAN DAN KESMAVET', NULL, NULL, NULL, NULL, 1, '404.5.9.5'),
(710, 'UPT SANGGAR KEGIATAN BELAJAR', NULL, NULL, NULL, NULL, 1, '404.5.1.1.19'),
(711, 'DINAS PEKERJAAN UMUM BINA MARGA DAN SDA', NULL, NULL, NULL, NULL, 1, '2019.1'),
(712, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', NULL, NULL, NULL, NULL, 1, '2019.2'),
(713, 'DINAS PPPA DAN KB', NULL, NULL, NULL, NULL, 1, '2019.3'),
(714, 'DINAS PERUMAHAN, PERMUKIMAN, CIPTA KARYA DAN TATA RUANG', NULL, NULL, NULL, NULL, 1, '2019.4'),
(715, 'UPTD LABORATORIUM KESEHATAN MASYARAKAT', NULL, NULL, NULL, NULL, 1, '2019.5'),
(716, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH', NULL, NULL, NULL, NULL, 1, '404.6.1'),
(717, 'UPT PUSKESMAS SIDODADI', NULL, NULL, NULL, NULL, 1, '404.5.2.1.27');

-- --------------------------------------------------------

--
-- Table structure for table `unit_mappings`
--

CREATE TABLE `unit_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `scope_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_mappings`
--

INSERT INTO `unit_mappings` (`id`, `unit_id`, `scope_id`) VALUES
(1, 43, 17),
(2, 43, 1),
(3, 43, 12),
(4, 11, 17),
(5, 11, 1),
(6, 11, 12),
(7, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` bigint(20) DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode`, `name`, `gender`, `alamat`, `desa`, `kecamatan`, `kota`, `telepon`, `pekerjaan`, `email`, `email_verified_at`, `password`, `level_id`, `unit_id`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0000', 'Aku', 'Pria', 'Aku', 'Aku', 'Aku', 'Aku', '0516545', NULL, 'aku@email.com', NULL, '$2y$10$fSu2vu3nTD23W3dBxHMKBOE.4s5LsNYE5KQz1p2PpE2X8cL1lA65K', 1, 43, 1, NULL, '2021-05-31 02:46:41', '2021-05-31 06:57:30'),
(2, '12', 'Cek', 'Pria', 'Cek', 'Cek', 'Cek', 'Cek', '0516545', 10, 'cek@email.com', NULL, '$2y$10$xsHySsDo.e3JZwvVr6yJe.W7Z7/9kLG0OBR06CZz.iQ1y0PHFyCIG', 5, 43, 1, NULL, '2021-06-02 07:15:03', '2021-06-02 07:15:50'),
(3, '36478649207', 'User', 'Pria', 'User', 'User', 'User', 'User', '2746386972', NULL, 'user@email.com', NULL, '$2y$10$HV4RjlgbLHqeiAmOE.JnYuQFpQlohwydyM7V2gktAT2nLsRxPJ.5.', 8, NULL, 1, NULL, '2021-06-10 07:46:27', '2021-06-10 07:46:27'),
(4, '678909876', 'Cek2', 'Pria', 'Cek2', 'Cek2', 'Cek2', 'Cek2', '12435456789', 10, 'cek2@email.com', NULL, '$2y$10$AtjbJMdoRjM3Yx846dKRvOoxu/bL.ACyZGelTGtUnIVlbStjLlDBK', 5, 11, 1, NULL, '2021-06-11 03:32:25', '2021-06-11 03:35:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_progresses`
--
ALTER TABLE `complaint_progresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mappings`
--
ALTER TABLE `mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scopes`
--
ALTER TABLE `scopes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_mappings`
--
ALTER TABLE `unit_mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_progresses`
--
ALTER TABLE `complaint_progresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mappings`
--
ALTER TABLE `mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scopes`
--
ALTER TABLE `scopes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- AUTO_INCREMENT for table `unit_mappings`
--
ALTER TABLE `unit_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
