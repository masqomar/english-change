-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 12:07 PM
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
(1, 'A6', 'Permisalan', 'Aktiva', NULL, 'Y', 'Y', 0, NULL, '2024-01-27 10:44:43', '2024-01-27 10:44:43'),
(2, 'A7', 'Biaya Dibayar Dimuka', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 10:46:34', '2024-01-27 10:46:34'),
(3, 'A9', 'Perlengkapan Usaha', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 10:47:37', '2024-01-27 10:47:37'),
(4, 'A10', 'Piutang Usaha', 'Aktiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:48:05', '2024-01-27 10:48:05'),
(5, 'A11', 'Piutang Karyawan', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 10:49:36', '2024-01-27 10:49:36'),
(6, 'C', 'Aktiva Tetap Berwujud', 'Aktiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 10:50:00', '2024-01-27 10:50:00'),
(7, 'C1', 'Peralatan Kantor', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 10:50:23', '2024-01-27 10:50:23'),
(8, 'C2', 'Inventaris Kendaraan', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 10:51:13', '2024-01-27 10:51:13'),
(9, 'C3', 'Inventaris Elektronik', 'Aktiva', NULL, 'N', 'Y', 1, NULL, '2024-01-27 10:52:03', '2024-01-27 10:52:03'),
(10, 'C4', 'Aktiva Tetap Lainnya', 'Aktiva', NULL, 'Y', 'N', 1, NULL, '2024-01-27 10:52:25', '2024-01-27 10:52:25'),
(11, 'E', 'Modal Pribadi', 'Aktiva', NULL, NULL, NULL, 0, NULL, '2024-01-27 10:52:50', '2024-01-27 10:52:50'),
(12, 'E1', 'Prive', 'Aktiva', NULL, 'Y', 'Y', 0, NULL, '2024-01-27 10:53:21', '2024-01-27 10:53:21'),
(13, 'F', 'Utang', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 10:53:38', '2024-01-27 10:53:38'),
(14, 'F1', 'Utang Usaha', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:53:58', '2024-01-27 10:53:58'),
(15, 'F2', 'Utang Pajak', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:54:56', '2024-01-27 10:54:56'),
(16, 'F3', 'Utang Jangka Pendek Lainnya', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:55:20', '2024-01-27 10:55:20'),
(17, 'H', 'Utang Jangka Panjang', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 10:55:43', '2024-01-27 10:55:43'),
(18, 'H1', 'Utang Bank', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:56:06', '2024-01-27 10:56:06'),
(19, 'H2', 'Obligasi', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:56:24', '2024-01-27 10:56:24'),
(20, 'I', 'Modal', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 10:56:46', '2024-01-27 10:56:46'),
(21, 'I1', 'Modal Awal', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:57:21', '2024-01-27 10:57:21'),
(22, 'I2', 'Modal Penyertaan', 'Pasiva', NULL, 'Y', 'Y', 0, NULL, '2024-01-27 10:57:44', '2024-01-27 10:57:44'),
(23, 'I3', 'Modal Sumbangan', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:58:12', '2024-01-27 10:58:12'),
(24, 'I4', 'Modal Cadangan', 'Pasiva', NULL, 'Y', 'Y', 1, NULL, '2024-01-27 10:58:31', '2024-01-27 10:58:31'),
(25, 'J', 'Pendapatan', 'Pasiva', 'Pendapatan', NULL, NULL, 1, NULL, '2024-01-27 10:59:47', '2024-01-27 10:59:47'),
(26, 'J1', 'Pembayaran Angsuran', 'Pasiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 11:00:05', '2024-01-27 11:00:05'),
(27, 'J2', 'Pendapatan Pendaftaran Member', 'Pasiva', 'Pendapatan', 'Y', 'N', 1, NULL, '2024-01-27 11:00:52', '2024-01-27 11:00:52'),
(28, 'J3', 'Pendapatan Bunga Bank', 'Pasiva', 'Pendapatan', 'Y', 'N', 1, NULL, '2024-01-27 11:01:19', '2024-01-27 11:01:19'),
(29, 'J4', 'Pendapatan Lainnya', 'Pasiva', 'Pendapatan', 'Y', 'N', 1, NULL, '2024-01-27 11:01:45', '2024-01-27 11:01:45'),
(30, 'K', 'Beban', 'Aktiva', NULL, NULL, NULL, 1, NULL, '2024-01-27 11:02:01', '2024-01-27 11:02:01'),
(31, 'K1', 'Beban Gaji Karyawan', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 11:02:40', '2024-01-27 11:02:40'),
(32, 'K2', 'Biaya Lainnya', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 11:03:14', '2024-01-27 11:03:14'),
(33, 'K3', 'Biaya Listrik dan Air', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 11:03:50', '2024-01-27 11:03:50'),
(34, 'K4', 'Biaya Transportasi', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 11:04:12', '2024-01-27 11:04:12'),
(35, 'K5', 'Biaya Administrasi Bank', 'Aktiva', 'Biaya', 'N', 'Y', 1, NULL, '2024-01-27 11:04:49', '2024-01-27 11:04:49'),
(36, 'TRF', 'Transfer Antar Kas', NULL, NULL, NULL, NULL, 0, NULL, '2024-01-27 11:05:05', '2024-01-27 11:05:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_akun_kode_akun_unique` (`kode_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_akun`
--
ALTER TABLE `jenis_akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
