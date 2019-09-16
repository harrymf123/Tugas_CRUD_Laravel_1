-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 02:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `gurumigration`
--

CREATE TABLE `gurumigration` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `nama_guru` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8_unicode_ci NOT NULL,
  `image_guru` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gurumigration`
--

INSERT INTO `gurumigration` (`id`, `nip`, `nama_guru`, `tanggal_lahir`, `jenis_kelamin`, `image_guru`, `created_at`, `updated_at`) VALUES
(1, '10001', 'Harry', '1333-12-12', 'L', '1_21. Harry Merlien Fadhlurrohman.jpg', '2019-08-28 17:07:17', '2019-09-05 23:02:53'),
(2, '10002', 'Adham', '2122-03-12', 'L', '', '2019-08-28 17:11:20', '2019-08-28 17:40:03'),
(3, '10003', 'Whyna', '2000-03-12', 'P', '', '2019-08-28 17:14:21', '2019-08-28 17:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `kelasmigration`
--

CREATE TABLE `kelasmigration` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_kelas` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelasmigration`
--

INSERT INTO `kelasmigration` (`id`, `nama_kelas`, `image_kelas`, `created_at`, `updated_at`) VALUES
(1, 'XI RPL 1', '1_DSC_2388-1024x682.jpg', '2019-08-29 17:00:00', '2019-09-05 06:49:03'),
(2, 'XI RPL 2', '', '2019-08-29 17:00:00', '2019-09-02 17:43:15'),
(3, 'XI RPL 3', NULL, '2019-09-04 17:57:22', '2019-09-04 17:57:22'),
(4, 'XI RPL 4', NULL, '2019-09-04 18:21:45', '2019-09-04 18:21:45'),
(5, 'XI RPL 5', NULL, '2019-09-05 16:07:05', '2019-09-05 16:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_23_003206_create_table_gurumigration', 3),
(5, '2019_08_30_004439_create_table_kelasmigration', 5),
(9, '2019_08_06_014838_create_table_siswamigration', 6),
(10, '2019_09_06_023524_create_table_walikelasmigration', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswamigration`
--

CREATE TABLE `siswamigration` (
  `id` int(10) UNSIGNED NOT NULL,
  `nisn` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nama_siswa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_kelas` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8_unicode_ci NOT NULL,
  `image_siswa` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `siswamigration`
--

INSERT INTO `siswamigration` (`id`, `nisn`, `nama_siswa`, `id_kelas`, `tanggal_lahir`, `jenis_kelamin`, `image_siswa`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Ismail', 1, '1111-02-11', 'L', '1_background-kayu-coklat-hd.jpg', '2019-09-04 21:29:59', '2019-09-04 21:52:09'),
(2, '1002', 'Galih', 2, '1111-12-12', 'L', '2_background-1279718_960_720.jpg', '2019-09-04 21:59:28', '2019-09-04 22:31:06'),
(3, '1003', 'Harry', 3, '1222-12-12', 'L', '3_21. Harry Merlien Fadhlurrohman.jpg', '2019-09-04 22:09:11', '2019-09-05 18:36:07'),
(4, '1004', 'Gabrielle', 4, '1322-03-12', 'P', '4_I LOVE.jpg', '2019-09-04 22:30:09', '2019-09-05 06:25:02'),
(5, '1005', 'Rico', 5, '2111-12-21', 'P', NULL, '2019-09-05 00:58:45', '2019-09-11 17:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harry', 'L', 'merlienharry@gmail.com', NULL, '$2y$10$4bMN58QvM2JRWz.JZMMwHegRrNuwWVZH0kNPabC1GdOk.gm8mopxO', NULL, '2019-08-19 19:14:28', '2019-08-19 19:14:28'),
(2, 'Rico', 'L', 'h.merlien@yahoo.com', NULL, '$2y$10$p9Hp3v/00JDCULwhwQ3s2.9d6KPid.FoGS8kyrJi5LzEjVmRWvu2G', NULL, '2019-08-19 20:09:25', '2019-08-19 20:09:25'),
(3, 'Adam', 'L', 'harrylava43@gmail.com', NULL, '$2y$10$PR44n1zEtdTjpBsSZmuxZuFtn6KwsY7W4x.bujtZEFxUqIi.7eEsK', NULL, '2019-08-19 22:40:15', '2019-08-19 22:40:15'),
(4, 'a', 'P', 'a@gmail.com', NULL, '$2y$10$zd0AN1k/9AuS.02mxfjo/.5u3iSnbPmmLoezZAbDcpzWTXeApqG.K', NULL, '2019-08-21 22:42:40', '2019-08-21 22:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `walikelasmigration`
--

CREATE TABLE `walikelasmigration` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_guru` int(10) UNSIGNED DEFAULT NULL,
  `id_kelas` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `walikelasmigration`
--

INSERT INTO `walikelasmigration` (`id`, `id_guru`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-09-11 19:23:02', '2019-09-11 19:23:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gurumigration`
--
ALTER TABLE `gurumigration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurumigration_nip_unique` (`nip`);

--
-- Indexes for table `kelasmigration`
--
ALTER TABLE `kelasmigration`
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
-- Indexes for table `siswamigration`
--
ALTER TABLE `siswamigration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `walikelasmigration`
--
ALTER TABLE `walikelasmigration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gurumigration`
--
ALTER TABLE `gurumigration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelasmigration`
--
ALTER TABLE `kelasmigration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswamigration`
--
ALTER TABLE `siswamigration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `walikelasmigration`
--
ALTER TABLE `walikelasmigration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswamigration`
--
ALTER TABLE `siswamigration`
  ADD CONSTRAINT `siswamigration_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelasmigration` (`id`);

--
-- Constraints for table `walikelasmigration`
--
ALTER TABLE `walikelasmigration`
  ADD CONSTRAINT `walikelasmigration_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `gurumigration` (`id`),
  ADD CONSTRAINT `walikelasmigration_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelasmigration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
