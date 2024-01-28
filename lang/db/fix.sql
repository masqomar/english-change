-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 06:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujiantoefl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `klasifikasi` enum('Toko','Perorangan','MT','PS. Basah','Grosir','Toko','Retail') NOT NULL,
  `no_telp` int(11) NOT NULL,
  `adress` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_akun`
--

CREATE TABLE `jenis_akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` varchar(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `laba_rugi` varchar(255) DEFAULT NULL,
  `pemasukan` varchar(255) DEFAULT NULL,
  `pengeluaran` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_akun`
--

INSERT INTO `jenis_akun` (`id`, `kode_akun`, `nama_akun`, `type`, `laba_rugi`, `pemasukan`, `pengeluaran`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A6', 'Permisalan', 'Aktiva', NULL, 'Y', 'Y', 0, NULL, '2024-01-27 03:44:43', '2024-01-27 03:44:43'),
(2, 'A7', 'Biaya Dibayar Dimuka', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 03:46:34', '2024-01-27 03:46:34'),
(3, 'A9', 'Perlengkapan Usaha', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 03:47:37', '2024-01-27 03:47:37'),
(4, 'A10', 'Piutang Usaha', 'Aktiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:48:05', '2024-01-27 03:48:05'),
(5, 'A11', 'Piutang Karyawan', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 03:49:36', '2024-01-27 03:49:36'),
(6, 'C', 'Aktiva Tetap Berwujud', 'Aktiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 03:50:00', '2024-01-27 03:50:00'),
(7, 'C1', 'Peralatan Kantor', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 03:50:23', '2024-01-27 03:50:23'),
(8, 'C2', 'Inventaris Kendaraan', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 03:51:13', '2024-01-27 03:51:13'),
(9, 'C3', 'Inventaris Elektronik', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 03:52:03', '2024-01-27 03:52:03'),
(10, 'C4', 'Aktiva Tetap Lainnya', 'Aktiva', NULL, 'Y', 'N', 1, NULL, '2024-01-27 03:52:25', '2024-01-27 03:52:25'),
(11, 'E', 'Modal Pribadi', 'Aktiva', NULL, NULL, NULL, 0, NULL, '2024-01-27 03:52:50', '2024-01-27 03:52:50'),
(12, 'E1', 'Prive', 'Aktiva', NULL, 'Y', 'Y', 0, NULL, '2024-01-27 03:53:21', '2024-01-27 03:53:21'),
(13, 'F', 'Utang', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 03:53:38', '2024-01-27 03:53:38'),
(14, 'F1', 'Utang Usaha', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:53:58', '2024-01-27 03:53:58'),
(15, 'F2', 'Utang Pajak', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:54:56', '2024-01-27 03:54:56'),
(16, 'F3', 'Utang Jangka Pendek Lainnya', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:55:20', '2024-01-27 03:55:20'),
(17, 'H', 'Utang Jangka Panjang', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 03:55:43', '2024-01-27 03:55:43'),
(18, 'H1', 'Utang Bank', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:56:06', '2024-01-27 03:56:06'),
(19, 'H2', 'Obligasi', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:56:24', '2024-01-27 03:56:24'),
(20, 'I', 'Modal', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 03:56:46', '2024-01-27 03:56:46'),
(21, 'I1', 'Modal Awal', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:57:21', '2024-01-27 03:57:21'),
(22, 'I2', 'Modal Penyertaan', 'Pasiva', NULL, 'Y', 'Y', 0, NULL, '2024-01-27 03:57:44', '2024-01-27 03:57:44'),
(23, 'I3', 'Modal Sumbangan', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:58:12', '2024-01-27 03:58:12'),
(24, 'I4', 'Modal Cadangan', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 03:58:31', '2024-01-27 03:58:31'),
(25, 'J', 'Pendapatan', 'Pasiva', 'Pendapatan', NULL, NULL, 1, NULL, '2024-01-27 03:59:47', '2024-01-27 03:59:47'),
(26, 'J1', 'Pembayaran Angsuran', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 04:00:05', '2024-01-27 04:00:05'),
(27, 'J2', 'Pendapatan Pendaftaran Member', 'Pasiva', 'Pendapatan', 'Y', 'N', 1, NULL, '2024-01-27 04:00:52', '2024-01-27 04:00:52'),
(28, 'J3', 'Pendapatan Bunga Bank', 'Pasiva', 'Pendapatan', 'Y', 'N', 1, NULL, '2024-01-27 04:01:19', '2024-01-27 04:01:19'),
(29, 'J4', 'Pendapatan Lainnya', 'Pasiva', 'Pendapatan', 'Y', 'N', 1, NULL, '2024-01-27 04:01:45', '2024-01-27 04:01:45'),
(30, 'K', 'Beban', 'Aktiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 04:02:01', '2024-01-27 04:02:01'),
(31, 'K1', 'Beban Gaji Karyawan', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 04:02:40', '2024-01-27 04:02:40'),
(32, 'K2', 'Biaya Lainnya', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 04:03:14', '2024-01-27 04:03:14'),
(33, 'K3', 'Biaya Iklan', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 04:03:50', '2024-01-27 15:27:40'),
(34, 'K4', 'Biaya Transportasi', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 04:04:12', '2024-01-27 04:04:12'),
(35, 'K5', 'Biaya Administrasi Bank', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 04:04:49', '2024-01-27 04:04:49'),
(36, 'TRF', 'Transfer Antar Kas', NULL, NULL, NULL, NULL, 0, NULL, '2024-01-27 04:05:05', '2024-01-27 04:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kas`
--

CREATE TABLE `jenis_kas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `pemasukan` varchar(255) DEFAULT NULL,
  `pengeluaran` varchar(255) DEFAULT NULL,
  `transfer` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kas`
--

INSERT INTO `jenis_kas` (`id`, `nama`, `status`, `pemasukan`, `pengeluaran`, `transfer`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bank Mandiri', 1, 'Y', 'Y', 'Y', NULL, '2024-01-27 15:09:54', '2024-01-27 15:09:54'),
(2, 'Bank BRI', 1, 'Y', 'Y', 'Y', NULL, '2024-01-27 15:10:02', '2024-01-27 15:10:02'),
(3, 'Bank BCA', 1, 'Y', 'Y', 'Y', NULL, '2024-01-27 15:10:10', '2024-01-27 15:10:10'),
(4, 'Kas Besar', 1, 'Y', 'Y', 'Y', NULL, '2024-01-27 15:10:41', '2024-01-27 15:10:41'),
(5, 'Kas Tunai', 1, 'Y', 'Y', 'Y', NULL, '2024-01-27 15:10:49', '2024-01-27 15:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_03_083529_create_permission_tables', 1),
(7, '2023_10_03_083725_create_customers_table', 1),
(8, '2023_10_03_083926_create_categories_table', 1),
(9, '2023_10_03_084150_create_vendors_table', 1),
(10, '2023_10_03_084337_create_units_table', 1),
(11, '2023_10_03_084502_create_products_table', 1),
(12, '2023_10_03_094044_create_carts_table', 1),
(13, '2024_01_27_155008_create_jenis_akun_table', 1),
(14, '2024_01_27_155012_create_jenis_kas_table', 1),
(15, '2024_01_27_155019_create_transaksi_kas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(2, 'dashboard.sales_chart', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(3, 'dashboard.sales_today', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(4, 'dashboard.profits_today', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(5, 'dashboard.best_selling_product', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(6, 'dashboard.product_stock', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(7, 'users.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(8, 'users.create', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(9, 'users.edit', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(10, 'users.delete', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(11, 'roles.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(12, 'roles.create', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(13, 'roles.edit', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(14, 'roles.delete', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(15, 'permissions.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(16, 'categories.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(17, 'categories.create', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(18, 'categories.edit', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(19, 'categories.delete', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(20, 'products.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(21, 'products.create', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(22, 'products.edit', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(23, 'products.delete', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(24, 'customers.index', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(25, 'customers.create', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(26, 'customers.edit', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(27, 'customers.delete', 'web', '2024-01-27 15:03:42', '2024-01-27 15:03:42'),
(28, 'permissions.create', 'web', '2024-01-28 04:36:32', '2024-01-28 04:36:32'),
(29, 'permissions.edit', 'web', '2024-01-28 04:36:43', '2024-01-28 04:36:43'),
(30, 'permissions.delete', 'web', '2024-01-28 04:36:50', '2024-01-28 04:36:50'),
(31, 'jenis-akun.index', 'web', '2024-01-28 04:37:34', '2024-01-28 04:37:34'),
(32, 'jenis-akun.create', 'web', '2024-01-28 04:37:44', '2024-01-28 04:37:44'),
(33, 'jenis-akun.edit', 'web', '2024-01-28 04:37:52', '2024-01-28 04:37:52'),
(34, 'jenis-akun.delete', 'web', '2024-01-28 04:37:57', '2024-01-28 04:37:57'),
(35, 'jenis-kas.index', 'web', '2024-01-28 04:38:11', '2024-01-28 04:38:11'),
(36, 'jenis-kas.create', 'web', '2024-01-28 04:38:16', '2024-01-28 04:38:16'),
(37, 'jenis-kas.edit', 'web', '2024-01-28 04:38:22', '2024-01-28 04:38:22'),
(38, 'jenis-kas.delete', 'web', '2024-01-28 04:38:27', '2024-01-28 04:38:27'),
(39, 'kas-masuk.index', 'web', '2024-01-28 04:38:41', '2024-01-28 04:38:41'),
(40, 'kas-masuk.create', 'web', '2024-01-28 04:38:47', '2024-01-28 04:38:47'),
(41, 'kas-masuk.edit', 'web', '2024-01-28 04:38:52', '2024-01-28 04:38:52'),
(42, 'kas-masuk.delete', 'web', '2024-01-28 04:38:57', '2024-01-28 04:38:57'),
(43, 'kas-keluar.index', 'web', '2024-01-28 04:39:10', '2024-01-28 04:39:10'),
(44, 'kas-keluar.create', 'web', '2024-01-28 04:39:16', '2024-01-28 04:39:16'),
(45, 'kas-keluar.edit', 'web', '2024-01-28 04:39:21', '2024-01-28 04:39:21'),
(46, 'kas-keluar.delete', 'web', '2024-01-28 04:39:26', '2024-01-28 04:39:26'),
(47, 'kas-transfer.index', 'web', '2024-01-28 04:39:38', '2024-01-28 04:39:38'),
(48, 'kas-transfer.create', 'web', '2024-01-28 04:39:43', '2024-01-28 04:39:43'),
(49, 'kas-transfer.edit', 'web', '2024-01-28 04:39:48', '2024-01-28 04:39:48'),
(50, 'kas-transfer.delete', 'web', '2024-01-28 04:39:55', '2024-01-28 04:39:55'),
(51, 'laporan-transaksi-kas.index', 'web', '2024-01-28 04:40:21', '2024-01-28 04:40:21'),
(52, 'laporan-transaksi-kas.create', 'web', '2024-01-28 04:40:27', '2024-01-28 04:40:27'),
(53, 'laporan-transaksi-kas.edit', 'web', '2024-01-28 04:40:33', '2024-01-28 04:40:33'),
(54, 'laporan-transaksi-kas.delete', 'web', '2024-01-28 04:40:39', '2024-01-28 04:40:39'),
(55, 'laporan-neraca-saldo.index', 'web', '2024-01-28 04:40:55', '2024-01-28 04:40:55'),
(56, 'laporan-neraca-saldo.create', 'web', '2024-01-28 04:41:00', '2024-01-28 04:41:00'),
(57, 'laporan-neraca-saldo.edit', 'web', '2024-01-28 04:41:05', '2024-01-28 04:41:05'),
(58, 'laporan-neraca-saldo.delete', 'web', '2024-01-28 04:41:10', '2024-01-28 04:41:10'),
(59, 'laporan-laba.index', 'web', '2024-01-28 04:41:27', '2024-01-28 04:41:27'),
(60, 'laporan-laba.create', 'web', '2024-01-28 04:41:31', '2024-01-28 04:41:31'),
(61, 'laporan-laba.edit', 'web', '2024-01-28 04:41:36', '2024-01-28 04:41:36'),
(62, 'laporan-laba.delete', 'web', '2024-01-28 04:41:41', '2024-01-28 04:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `buy_price` bigint(20) NOT NULL,
  `sell_price` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `tax_type` enum('PPN','NON-PPN') NOT NULL DEFAULT 'PPN',
  `periode` enum('Regular','Seasonal') NOT NULL DEFAULT 'Regular',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2024-01-27 15:03:41', '2024-01-28 05:05:11'),
(2, 'admin', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41'),
(3, 'seller', 'web', '2024-01-27 15:03:41', '2024-01-27 15:03:41');

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
(1, 2),
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
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(35, 2),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(39, 2),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(43, 2),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(47, 2),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(51, 2),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(55, 2),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(59, 2),
(60, 1),
(61, 1),
(62, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kas`
--

CREATE TABLE `transaksi_kas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_catat` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `dari_jenis_kas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `untuk_jenis_kas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_akun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dk` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_kas`
--

INSERT INTO `transaksi_kas` (`id`, `kode_transaksi`, `tanggal_catat`, `jumlah`, `keterangan`, `jenis_transaksi`, `dari_jenis_kas_id`, `untuk_jenis_kas_id`, `jenis_akun_id`, `dk`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TKD0001012024', '2023-04-10', 300000, 'Pak Arif', 'Pemasukan', NULL, 1, 21, 'D', NULL, '2024-01-27 15:15:19', '2024-01-27 15:15:19'),
(2, 'TKD0002012024', '2023-11-01', 500000, 'Pak Arif', 'Pemasukan', NULL, 1, 21, 'D', NULL, '2024-01-27 15:16:34', '2024-01-27 15:16:34'),
(3, 'TKD0003012024', '2023-11-14', 2000000, 'Pak Arif', 'Pemasukan', NULL, 1, 21, 'D', NULL, '2024-01-27 15:17:16', '2024-01-27 15:17:16'),
(4, 'TKD0004012024', '2023-11-30', 800000, 'Pak Arif', 'Pemasukan', NULL, 1, 21, 'D', NULL, '2024-01-27 15:17:44', '2024-01-27 15:17:44'),
(5, 'TKD0005012024', '2023-12-21', 3000000, 'Pak Arif', 'Pemasukan', NULL, 1, 21, 'D', NULL, '2024-01-27 15:18:14', '2024-01-27 15:18:14'),
(6, 'TKD0006012024', '2024-01-02', 85000, 'Mudini Muhlis', 'Pemasukan', NULL, 2, 27, 'D', NULL, '2024-01-27 15:19:18', '2024-01-27 15:19:18'),
(7, 'TKD0007012024', '2024-01-04', 79000, 'Setiarini', 'Pemasukan', NULL, 3, 27, 'D', NULL, '2024-01-27 15:20:02', '2024-01-27 15:20:02'),
(8, 'TKD0008012024', '2024-01-11', 249000, 'Hadi Maruf', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 15:20:41', '2024-01-27 15:20:41'),
(9, 'TKD0009012024', '2024-01-11', 78991, 'Wenenantie Indah Iz', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 15:21:23', '2024-01-27 15:21:23'),
(10, 'TKD0010012024', '2024-01-12', 149000, 'Sri Wahyuni (Nursari Suneth)', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 15:22:00', '2024-01-27 15:22:00'),
(11, 'TKD0011012024', '2024-01-12', 1349000, 'Mudini Muhlis', 'Pemasukan', NULL, 2, 27, 'D', NULL, '2024-01-27 15:22:46', '2024-01-27 15:22:46'),
(12, 'TKD0012012024', '2024-01-15', 149000, 'Fikri Wahidinsyah', 'Pemasukan', NULL, 2, 27, 'D', NULL, '2024-01-27 15:23:25', '2024-01-27 15:23:25'),
(13, 'TKD0013012024', '2024-01-15', 149000, 'Lidya Risna', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 15:23:58', '2024-01-27 15:23:58'),
(14, 'TKK0001012024', '2023-10-04', 279057, 'Domain englishchange.com (Domainesia)', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:32:45', '2024-01-27 15:32:45'),
(15, 'TKK0002012024', '2023-11-02', 151000, 'Akun MetaAds', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:34:31', '2024-01-27 15:34:31'),
(16, 'TKK0003012024', '2023-11-08', 52000, 'Akun Canva 1 Th', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:35:16', '2024-01-27 15:35:16'),
(17, 'TKK0004012024', '2023-11-09', 72000, 'Akun Invideo 1 Th', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:35:47', '2024-01-27 15:35:47'),
(18, 'TKK0005012024', '2023-11-11', 47752, 'Test Trial Tool', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:36:29', '2024-01-27 15:36:29'),
(19, 'TKK0006012024', '2023-11-15', 1461118, 'Hosting (Jagoanhosting)', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:37:07', '2024-01-27 15:37:07'),
(20, 'TKK0007012024', '2023-11-16', 15450, 'Plugin Elementor', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:37:41', '2024-01-27 15:37:41'),
(21, 'TKK0008012024', '2023-11-16', 40061, 'Theme', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:38:08', '2024-01-27 15:38:08'),
(22, 'TKK0009012024', '2023-11-17', 50000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:39:12', '2024-01-27 15:39:12'),
(23, 'TKK0010012024', '2023-11-17', 104001, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:39:38', '2024-01-27 15:39:38'),
(24, 'TKK0011012024', '2023-11-21', 125450, 'Plugin Sejoli', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:40:06', '2024-01-27 15:40:06'),
(25, 'TKK0012012024', '2023-11-29', 300000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:40:31', '2024-01-27 15:40:31'),
(26, 'TKK0013012024', '2023-11-30', 15000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:41:21', '2024-01-27 15:41:21'),
(27, 'TKK0014012024', '2023-11-30', 385000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:42:00', '2024-01-27 15:42:00'),
(28, 'TKK0015012024', '2023-12-09', 300000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:42:23', '2024-01-27 15:42:23'),
(29, 'TKK0016012024', '2023-12-13', 200000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:42:42', '2024-01-27 15:42:42'),
(30, 'TKK0017012024', '2023-12-19', 400000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:43:07', '2024-01-27 15:43:07'),
(31, 'TKK0018012024', '2023-12-20', 53000, 'Copywriting', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:43:37', '2024-01-27 15:43:37'),
(32, 'TKK0019012024', '2023-12-21', 400000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:43:59', '2024-01-27 15:43:59'),
(33, 'TKK0020012024', '2023-12-23', 100000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:44:24', '2024-01-27 15:44:24'),
(34, 'TKK0021012024', '2023-12-25', 100000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:44:42', '2024-01-27 15:44:42'),
(35, 'TKK0022012024', '2023-12-27', 200000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:45:05', '2024-01-27 15:45:05'),
(36, 'TKK0023012024', '2023-12-27', 50000, 'Sosmed Booster', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:45:53', '2024-01-27 15:45:53'),
(37, 'TKK0024012024', '2023-12-27', 200000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:46:14', '2024-01-27 15:46:14'),
(38, 'TKK0025012024', '2023-12-28', 57000, 'Rating Gmap', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:46:40', '2024-01-27 15:46:40'),
(39, 'TKK0026012024', '2023-12-29', 19500, 'Backlink', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:47:06', '2024-01-27 15:47:06'),
(40, 'TKK0027012024', '2023-12-29', 27643, 'Backlink', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:47:52', '2024-01-27 15:47:52'),
(41, 'TKK0028012024', '2023-12-30', 100000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:48:12', '2024-01-27 15:48:12'),
(42, 'TKK0029012024', '2023-12-31', 100000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:48:30', '2024-01-27 15:48:30'),
(43, 'TKK0030012024', '2024-01-02', 300000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:48:49', '2024-01-27 15:48:49'),
(44, 'TKK0031012024', '2024-01-04', 22000, 'Tool SEO', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:50:34', '2024-01-27 15:50:34'),
(45, 'TKK0032012024', '2024-01-06', 200000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:50:53', '2024-01-27 15:50:53'),
(46, 'TKK0033012024', '2024-01-08', 150000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:51:13', '2024-01-27 15:51:13'),
(47, 'TKK0034012024', '2024-01-09', 155977, 'WA Blast 1 Th', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:51:43', '2024-01-27 15:51:43'),
(48, 'TKK0035012024', '2024-01-09', 155000, 'PBN', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:52:03', '2024-01-27 15:52:03'),
(49, 'TKK0036012024', '2024-01-11', 56500, 'Artikel SEO', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:52:37', '2024-01-27 15:52:37'),
(50, 'TKK0037012024', '2024-01-12', 300000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:53:09', '2024-01-27 15:53:09'),
(51, 'TKK0038012024', '2024-01-13', 22000, 'Artikel SEO', 'Pengeluaran', 1, NULL, 3, 'K', NULL, '2024-01-27 15:53:31', '2024-01-27 15:53:31'),
(52, 'TKK0039012024', '2024-01-14', 350000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:53:53', '2024-01-27 15:53:53'),
(53, 'TKK0040012024', '2024-01-16', 150000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 15:54:15', '2024-01-27 15:54:15'),
(54, 'TKD0014012024', '2024-01-17', 249000, 'Vivin Yulindar', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 16:35:05', '2024-01-27 16:35:05'),
(55, 'TKD0015012024', '2024-01-20', 249000, 'Meylan Marthina Uniw', 'Pemasukan', NULL, 2, 27, 'D', NULL, '2024-01-27 16:36:15', '2024-01-27 16:36:15'),
(56, 'TKD0016012024', '2024-01-21', 249000, 'Trawina', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 16:36:50', '2024-01-27 16:36:50'),
(57, 'TKD0017012024', '2024-01-21', 80000, NULL, 'Pemasukan', NULL, 2, 27, 'D', NULL, '2024-01-27 16:37:19', '2024-01-27 16:37:19'),
(58, 'TKD0018012024', '2024-01-23', 299999, 'Florianus Nai Nara', 'Pemasukan', NULL, 2, 27, 'D', NULL, '2024-01-27 16:37:50', '2024-01-27 16:37:50'),
(59, 'TKD0019012024', '2024-01-25', 149000, 'Olivia Salsabila', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 16:38:18', '2024-01-27 16:38:18'),
(60, 'TKD0020012024', '2024-01-27', 349000, 'Yanolanda Suzantry H', 'Pemasukan', NULL, 1, 27, 'D', NULL, '2024-01-27 16:38:47', '2024-01-27 16:38:47'),
(61, 'TKK0041012024', '2024-01-18', 500000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 16:40:39', '2024-01-27 16:40:39'),
(62, 'TKK0042012024', '2024-01-19', 30000, NULL, 'Pengeluaran', 1, NULL, 31, 'K', NULL, '2024-01-27 16:41:29', '2024-01-27 16:41:59'),
(63, 'TKK0043012024', '2024-01-20', 300000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 16:42:51', '2024-01-27 16:42:51'),
(64, 'TKK0044012024', '2024-01-21', 200000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 16:43:15', '2024-01-27 16:43:15'),
(65, 'TKK0045012024', '2024-01-22', 300000, NULL, 'Pengeluaran', 2, NULL, 31, 'K', NULL, '2024-01-27 16:43:56', '2024-01-27 16:43:56'),
(66, 'TKK0046012024', '2024-01-23', 200000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 16:44:24', '2024-01-27 16:44:24'),
(67, 'TKK0047012024', '2024-01-23', 27000, NULL, 'Pengeluaran', 2, NULL, 32, 'K', NULL, '2024-01-27 16:45:23', '2024-01-27 16:45:23'),
(68, 'TKK0048012024', '2024-01-24', 300000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 16:45:47', '2024-01-27 16:45:47'),
(69, 'TKK0049012024', '2024-01-26', 450000, 'Meta Ads', 'Pengeluaran', 1, NULL, 33, 'K', NULL, '2024-01-27 16:46:27', '2024-01-27 16:46:27'),
(70, 'TKK0050012024', '2024-01-26', 112022, 'Jasa Logo', 'Pengeluaran', 2, NULL, 3, 'K', NULL, '2024-01-27 16:47:02', '2024-01-27 16:47:02'),
(71, 'TRF0001012024', '2024-01-16', 1500000, NULL, 'Transfer', 2, 1, NULL, NULL, NULL, '2024-01-27 19:57:41', '2024-01-27 19:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@englishchange.com', NULL, '$2y$10$eKjEQvncyViAUUSz5FcHKe2MTWrfjAMuXjcWG0DU0MBAXLNpDd986', NULL, NULL, NULL, NULL, '2024-01-27 15:03:42', '2024-01-27 15:03:42'),
(2, 'Sadam', 'sadam', 'sadam@englishchange.com', NULL, '$2y$10$KLQQvm6i4Q6/Yh8i0AHI2ePaQwX.lg.Ov6jSy0HWrgIdxwx.ijLEu', NULL, NULL, NULL, NULL, '2024-01-28 05:07:40', '2024-01-28 05:07:40'),
(3, 'Arif', 'arif', 'arif@englishchange.com', NULL, '$2y$10$SJiidQA/7VHoKRupDMA4C.UeOV7nkOOFmT0LYcErIAvXZcJoVU7Pa', NULL, NULL, NULL, NULL, '2024-01-28 05:49:54', '2024-01-28 05:49:54'),
(4, 'Titis', 'titis', 'titis@englishchange.com', NULL, '$2y$10$95o5CbuGAb.hCs8Rx/amHegOcyenipx6ktypXRUkjEiY2VK9KaMwC', NULL, NULL, NULL, NULL, '2024-01-28 05:50:20', '2024-01-28 05:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_seller_id_foreign` (`seller_id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_akun_kode_akun_unique` (`kode_akun`);

--
-- Indexes for table `jenis_kas`
--
ALTER TABLE `jenis_kas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `transaksi_kas`
--
ALTER TABLE `transaksi_kas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksi_kas_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transaksi_kas_dari_jenis_kas_id_foreign` (`dari_jenis_kas_id`),
  ADD KEY `transaksi_kas_untuk_jenis_kas_id_foreign` (`untuk_jenis_kas_id`),
  ADD KEY `transaksi_kas_jenis_akun_id_foreign` (`jenis_akun_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jenis_kas`
--
ALTER TABLE `jenis_kas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_kas`
--
ALTER TABLE `transaksi_kas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_kas`
--
ALTER TABLE `transaksi_kas`
  ADD CONSTRAINT `transaksi_kas_dari_jenis_kas_id_foreign` FOREIGN KEY (`dari_jenis_kas_id`) REFERENCES `jenis_kas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_kas_jenis_akun_id_foreign` FOREIGN KEY (`jenis_akun_id`) REFERENCES `jenis_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_kas_untuk_jenis_kas_id_foreign` FOREIGN KEY (`untuk_jenis_kas_id`) REFERENCES `jenis_kas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
