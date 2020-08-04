-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 08:50 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nim`, `status`, `created_at`, `updated_at`) VALUES
(9, 16090022, 'hadir', '2020-06-26 21:27:19', '2020-06-26 21:27:19'),
(12, 16090069, 'hadir', '2020-06-26 21:42:36', '2020-06-26 21:42:36'),
(13, 16090022, 'hadir', '2020-07-14 11:07:59', '2020-07-14 11:07:59'),
(14, 16090064, 'hadir', '2020-07-14 11:27:43', '2020-07-14 11:27:43'),
(15, 16090103, 'hadir', '2020-07-14 12:47:29', '2020-07-14 12:47:29'),
(16, 16090142, 'hadir', '2020-07-14 12:49:27', '2020-07-14 12:49:27'),
(17, 16090022, 'hadir', '2020-07-15 04:59:03', '2020-07-15 04:59:03'),
(18, 16090022, 'hadir', '2020-07-16 09:48:05', '2020-07-16 09:48:05'),
(34, 16090022, 'hadir', '2020-07-21 07:55:48', '2020-07-21 07:55:48'),
(35, 16090082, 'hadir', '2020-07-21 10:14:57', '2020-07-21 10:14:57'),
(36, 16090069, 'hadir', '2020-07-21 10:16:21', '2020-07-21 10:16:21'),
(37, 16090069, 'hadir', '2020-07-23 14:06:23', '2020-07-23 14:06:23'),
(40, 16090022, 'hadir', '2020-07-26 04:17:47', '2020-07-26 04:17:47'),
(41, 16090039, 'hadir', '2020-07-30 07:14:31', '2020-07-30 07:14:31'),
(42, 16090015, 'hadir', '2020-07-30 07:16:54', '2020-07-30 07:16:54'),
(43, 16090022, 'hadir', '2020-07-30 07:17:13', '2020-07-30 07:17:13'),
(44, 16090048, 'hadir', '2020-07-30 07:37:50', '2020-07-30 07:37:50'),
(45, 16090069, 'hadir', '2020-07-30 07:39:38', '2020-07-30 07:39:38'),
(46, 16090064, 'hadir', '2020-07-30 07:39:47', '2020-07-30 07:39:47'),
(47, 16090103, 'hadir', '2020-07-30 07:41:03', '2020-07-30 07:41:03'),
(48, 16090082, 'hadir', '2020-07-30 07:41:14', '2020-07-30 07:41:14'),
(49, 16090051, 'hadir', '2020-07-30 07:48:05', '2020-07-30 07:48:05'),
(50, 16090007, 'hadir', '2020-07-30 07:54:19', '2020-07-30 07:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `email`, `foto`, `created_at`, `updated_at`) VALUES
(1, 16090069, 'ilyas abdurahman yusuf', 'andrenuryana@gmail.com', 'ucup.png', '2020-06-24 19:40:09', '2020-06-24 12:40:09'),
(3, 16090022, 'Pungky Apri Wibowo', 'pungkiapriw@gmail.com', '16090022.jpg', '2020-07-14 04:05:15', '2020-07-14 04:05:15'),
(5, 16090064, 'M Dimas Alief', 'bumiharja56@gmail.com', '16090064.jpg', '2020-07-14 04:26:41', '2020-07-14 04:26:41'),
(9, 16090103, 'Dwiki S', 'supmarhernanda@gmail.com', '16090103.png', '2020-07-14 12:47:07', '0000-00-00 00:00:00'),
(10, 16090142, 'afi makarim', 'afi.makarim12@gmail.com', '16090142.png', '2020-07-14 12:49:07', '0000-00-00 00:00:00'),
(12, 16090082, 'dwi aji apriyadi', 'd.aji.apriyadi@gmail.com', '16090082.png', '2020-07-20 09:54:33', '0000-00-00 00:00:00'),
(13, 16090039, 'Putri Alvina', 'putrilutfiani29@gmail.com', '16090039.png', '2020-07-30 07:13:51', '0000-00-00 00:00:00'),
(14, 16090015, 'indah dwi jayanti', 'indahdj4@gmail.com', '16090015.png', '2020-07-30 07:16:24', '0000-00-00 00:00:00'),
(15, 16090048, 'chandra', 'akanggebot12@gmail.com', '16090048.png', '2020-07-30 07:29:25', '0000-00-00 00:00:00'),
(16, 16090051, 'lulu', 'lulualawiyah13@gmail.com', '16090051.png', '2020-07-30 07:47:30', '0000-00-00 00:00:00'),
(17, 16090007, 'wahyuningsih', 'wahyuningsihamalia14@gmail.com', '16090007.png', '2020-07-30 07:53:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
('pungkiapriw@gmail.com', '$2y$10$qnUWZfkwy1GQM2.s3FQmmuQ6shrLbou.vgRuqMZGsqph0vRUyYq.O', '2020-07-20 05:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pungki apri wibowo', 'pungkiapriw@gmail.com', NULL, '$2y$10$OUHobRwoYieIvRhiN./SoOVOngo6pGAu0tvEpKNtJQK88mvBUMOeS', NULL, '2020-06-23 20:48:18', '2020-06-23 20:48:18'),
(2, 'kiki', 'kikiaw@gmail.com', NULL, '$2y$10$4yDsaMmdhTuj5qSOU6FxT./Vuxn9eoxW1mN15HiCPO1wvovgiHhze', NULL, '2020-07-20 05:34:32', '2020-07-20 05:34:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
