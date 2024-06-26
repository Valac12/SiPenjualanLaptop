-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 03:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simlaptop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `prosesor` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `penyimpanan` varchar(255) NOT NULL,
  `layar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `nama`, `merek`, `prosesor`, `ram`, `penyimpanan`, `layar`, `harga`, `created_at`, `updated_at`) VALUES
(4, 'ZenBook13 Asus', 'Asus', 'Intel Core 17-1165G7', '8GB', '256GB SSD', '13,3 inch', '13000000', '2024-06-25 23:49:50', '2024-06-24 23:49:50'),
(5, 'MacBook Pro', 'Apple', '10 core GPU', '16GB', '1T SSD', '13,3 inch', '28000000', '2024-06-17 23:49:50', '2024-06-23 23:49:50');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_22_062459_create_laptops_table', 1),
(5, '2024_06_22_062711_create_stoks_table', 1),
(6, '2024_06_23_183306_create_pelanggans_table', 2),
(7, '2024_06_23_223245_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `laptop_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `Qty` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pelanggan_id`, `laptop_id`, `date`, `Qty`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(29, 1, 4, '2024-06-24', '5', '13000000', '65000000.00', '2024-06-24 14:13:07', '2024-06-24 14:13:07'),
(30, 6, 5, '2024-06-24', '4', '28000000', '112000000.00', '2024-06-24 14:42:26', '2024-06-24 14:42:26'),
(31, 6, 4, '2024-06-24', '6', '28000000', '168000000.00', '2024-06-24 14:42:52', '2024-06-24 14:42:52'),
(32, 6, 5, '2024-06-24', '10', '28000000', '280000000.00', '2024-06-24 14:43:38', '2024-06-24 14:43:38');

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
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `kontak`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Rafaely Walangitan', '082197576074', 'Pasir 2', 'nomorsaya2@gmail.com', '2024-06-23 18:37:59', '2024-06-23 10:07:38'),
(3, 'testdata2', '081344746157', 'Pasir 2', 'lora@gmail.com', '2024-06-23 09:55:49', '2024-06-23 09:55:49'),
(4, 'Putri Halimah', '0357 0428 133', 'Psr. Pacuan Kuda No. 24, Lhokseumawe 98966, Kaltara', 'namaga.kayla@example.org', '2024-06-24 11:42:59', '2024-06-24 11:42:59'),
(5, 'Edward Maulana', '(+62) 755 0884 7113', 'Psr. Bakit  No. 303, Gorontalo 23775, Sumbar', 'utami.suci@example.com', '2024-06-24 11:42:59', '2024-06-24 11:42:59'),
(6, 'Lidya Astuti S.T.', '(+62) 851 0798 3177', 'Psr. Babadak No. 521, Bau-Bau 71842, Maluku', 'maryati.iriana@example.com', '2024-06-24 11:42:59', '2024-06-24 11:42:59'),
(7, 'Agnes Puspita M.Ak', '(+62) 330 6353 5749', 'Kpg. Pahlawan No. 643, Tasikmalaya 67106, Kalteng', 'crahimah@example.net', '2024-06-24 11:42:59', '2024-06-24 11:42:59'),
(8, 'Dadi Prasetyo', '028 7068 819', 'Kpg. Bakti No. 137, Banjar 35930, NTB', 'padmasari.nadine@example.org', '2024-06-24 11:42:59', '2024-06-24 11:42:59'),
(9, 'Dina Lidya Maryati M.TI.', '(+62) 270 6149 7482', 'Kpg. Bank Dagang Negara No. 296, Padangsidempuan 80685, NTB', 'vivi.prakasa@example.org', '2024-06-24 11:43:00', '2024-06-24 11:43:00'),
(10, 'Icha Safitri', '0243 7854 2491', 'Ki. Achmad No. 634, Gorontalo 60812, Pabar', 'hasna02@example.net', '2024-06-24 11:43:00', '2024-06-24 11:43:00'),
(11, 'Asmuni Hutapea M.TI.', '(+62) 294 4643 4844', 'Gg. Radio No. 96, Pasuruan 92123, Aceh', 'firmansyah.puspa@example.org', '2024-06-24 11:43:00', '2024-06-24 11:43:00'),
(12, 'Jelita Wulandari', '0832 8875 6644', 'Jr. Rajawali No. 228, Serang 24298, Aceh', 'radit.rajata@example.net', '2024-06-24 11:43:00', '2024-06-24 11:43:00'),
(13, 'Adiarja Prasetyo Budiman S.IP', '(+62) 216 0085 820', 'Jr. Lumban Tobing No. 395, Manado 95620, Kalteng', 'dabukke.johan@example.net', '2024-06-24 11:43:00', '2024-06-24 11:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dPzfy9BIT3uxvi9V4PAXOltYfQOm7mHhAnN6Fd2o', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVmhMZDZpRFdDaHJqelZMWHFUTVBwS2h4S3JpdmhCUmZVV0dLTTJzRiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1719320645);

-- --------------------------------------------------------

--
-- Table structure for table `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlahStok` varchar(255) NOT NULL,
  `laptop_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stoks`
--

INSERT INTO `stoks` (`id`, `jumlahStok`, `laptop_id`, `created_at`, `updated_at`) VALUES
(7, '24', 4, '2024-06-23 23:52:05', '2024-06-24 14:42:52'),
(8, '11', 5, '2024-06-23 23:52:05', '2024-06-24 14:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `alamat`, `tgl_lahir`, `jk`, `kontak`, `level_name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Febrian Rey', 'febrian', '$2y$12$EqGOBeOa0fhZJ282bK9UX.ufyj6LGfDSL9GLz0sxMTRKcEdbxYJ4W', 'Jl. Kali Acai', '2024-06-24', 'L', '0821323223', 'Administrator', 1, '2024-06-23 16:13:02', '2024-06-23 07:19:04'),
(22, 'kasir', 'kasir', '$2y$12$asJbmeMFIuvcG3OqBAm8ueMbwbCHGMn47jMEhi/rvl5uW7VCrRJwC', 'Dok 9', '2024-12-31', 'P', '0932843232', 'Kasir', 2, '2024-06-24 13:06:20', '2024-06-24 13:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `orders_laptop_id_foreign` (`laptop_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelanggans_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stoks_laptop_id_foreign` (`laptop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_laptop_id_foreign` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`id`),
  ADD CONSTRAINT `orders_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`);

--
-- Constraints for table `stoks`
--
ALTER TABLE `stoks`
  ADD CONSTRAINT `stoks_laptop_id_foreign` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
