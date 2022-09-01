-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 10:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bill_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `January` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `February` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `March` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `April` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `May` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `June` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `July` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `August` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `September` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `October` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `November` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `December` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer_id`, `year`, `January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `created_at`, `updated_at`) VALUES
(1, '000005', '2022', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-08-11 04:46:26', '2022-08-11 04:46:26'),
(2, '000001', '2022', '0', '0', '0', '0', '0', '0', '500', '0', '0', '0', '0', '0', '2022-08-11 06:16:37', '2022-08-11 06:16:37'),
(3, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-08-11 06:16:48', '2022-08-11 06:16:48'),
(4, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-08-11 06:17:21', '2022-08-11 06:17:21'),
(5, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-08-11 06:18:02', '2022-08-11 06:18:02'),
(6, '000003', '2022', '0', '0', '0', '0', '0', '0', '1500', '0', '0', '0', '0', '0', '2022-08-11 06:18:48', '2022-08-11 06:18:48'),
(7, '000001', '2022', '500', '500', '500', '500', '500', '500', '0', '0', '0', '0', '0', '0', '2022-08-11 06:19:35', '2022-08-11 06:19:35'),
(8, '000003', '2022', '1500', '1500', '1500', '1500', '1500', '1500', '0', '0', '0', '0', '0', '0', '2022-08-11 06:22:04', '2022-08-11 06:22:04'),
(9, '000001', '2022', '0', '0', '0', '0', '0', '0', '0', '500', '500', '500', '500', '500', '2022-08-13 06:44:02', '2022-08-13 06:44:02'),
(10, '000004', '2022', '0', '0', '0', '0', '0', '0', '0', '1300', '1300', '0', '0', '0', '2022-08-14 02:46:49', '2022-08-14 02:46:49'),
(11, '000005', '2022', '0', '0', '0', '0', '0', '0', '0', '0', '800', '0', '0', '0', '2022-08-14 02:47:02', '2022-08-14 02:47:02'),
(12, '000005', '2022', '0', '0', '0', '0', '0', '0', '0', '800', '0', '0', '0', '0', '2022-08-14 02:55:31', '2022-08-14 02:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` int(11) NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Feb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Apr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `May` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Jun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Jul` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Aug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Oct` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nov` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dec` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `package_id`, `discount_price`, `address`, `home_owner_name`, `mobile`, `status`, `connection_date`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sept`, `Oct`, `Nov`, `Dec`, `created_at`, `updated_at`) VALUES
(1, '000001', 'coderfaruk', 1, NULL, NULL, 'ariful islams', '01711223344', 'active', '2022-08-07', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2022-08-11 02:51:01', '2022-08-13 06:44:02'),
(4, '000003', 'coderfaruk', 3, NULL, NULL, NULL, '01711223344', 'active', '2022-08-08', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '2022-08-11 02:53:00', '2022-08-11 06:22:04'),
(6, '000004', 'Md Omor Faruk', 3, '200', 'narinda', 'ariful islams', '01711223344', 'active', '2022-08-03', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', '1', '1', '0', '0', '0', '2022-08-11 04:42:40', '2022-08-14 02:46:49'),
(7, '000005', 'Admin', 2, '200', 'doyagonj', 'ariful islams', '01711223344', 'active', '2022-08-02', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', '1', '1', '0', '0', '0', '2022-08-11 04:44:04', '2022-08-14 02:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '2022_07_21_144605_create_clients_table', 1),
(46, '2014_10_12_000000_create_users_table', 2),
(47, '2014_10_12_100000_create_password_resets_table', 2),
(48, '2019_08_19_000000_create_failed_jobs_table', 2),
(49, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(50, '2022_07_21_103256_create_packages_table', 2),
(51, '2022_07_23_042408_create_customers_table', 2),
(52, '2022_07_24_075329_create_bills_table', 2),
(53, '2022_07_26_043552_create_reports_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `speed`, `price`, `created_at`, `updated_at`) VALUES
(1, 'a', '5', 500, '2022-07-26 23:51:03', '2022-07-26 23:51:03'),
(2, 'b', '10', 1000, '2022-07-26 23:51:14', '2022-07-26 23:51:14'),
(3, 'c', '15', 1500, '2022-07-26 23:51:24', '2022-07-26 23:51:24');

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
('admin@gmail.com', '$2y$10$ne/8CpJOg2oK5giDV1xDheeNxVwgyB8uI2W5R9q4zDdcfSbGiWWuG', '2022-08-14 01:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `previousbills`
--

CREATE TABLE `previousbills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `January` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `February` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `March` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `April` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `May` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `June` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `July` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `August` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `September` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `October` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `November` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `December` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `previousbills`
--

INSERT INTO `previousbills` (`id`, `customer_id`, `year`, `January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `created_at`, `updated_at`) VALUES
(1, '000001', '2021', '500', '500', '500', '500', '500', '500', '500', '500', '500', '500', '500', '500', '2022-08-11 03:58:26', '2022-08-11 03:58:26'),
(2, '000003', '2021', '0', '0', '0', '0', '0', '0', '0', '1500', '1500', '1500', '1500', '0', '2022-08-11 03:59:33', '2022-08-11 03:59:33'),
(3, '000002', '2021', '1000', '1000', '1000', '1000', '1000', '1000', '1000', '1000', '0', '0', '0', '0', '2022-08-11 03:59:45', '2022-08-11 03:59:45'),
(4, '000003', '2021', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1500', '2022-08-13 07:05:00', '2022-08-13 07:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `previouscustomers`
--

CREATE TABLE `previouscustomers` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `package_id` int(11) NOT NULL,
  `discount_price` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `home_owner_name` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  `connection_date` varchar(191) NOT NULL,
  `Jan` varchar(191) DEFAULT NULL,
  `Feb` varchar(191) DEFAULT NULL,
  `Mar` varchar(191) DEFAULT NULL,
  `Apr` varchar(191) DEFAULT NULL,
  `May` varchar(191) DEFAULT NULL,
  `Jun` varchar(191) DEFAULT NULL,
  `Jul` varchar(191) DEFAULT NULL,
  `Aug` varchar(191) DEFAULT NULL,
  `Sept` varchar(191) DEFAULT NULL,
  `Oct` varchar(191) DEFAULT NULL,
  `Nov` varchar(191) DEFAULT NULL,
  `Dec` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `previouscustomers`
--

INSERT INTO `previouscustomers` (`id`, `user_id`, `name`, `package_id`, `discount_price`, `address`, `home_owner_name`, `mobile`, `status`, `connection_date`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sept`, `Oct`, `Nov`, `Dec`, `created_at`, `updated_at`) VALUES
(1, '000001', 'coderfaruk', 1, NULL, NULL, 'ariful islams', '01711223344', 'active', '2022-08-07', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2022-08-11 02:53:41', '2022-08-11 03:58:26'),
(2, '000002', 'coderfaruk', 2, NULL, NULL, NULL, '01711223344', 'inActive', '2022-08-02', '1', '1', '1', '1', '1', '1', '1', '1', 'inActive', 'inActive', 'inActive', 'inActive', '2022-08-11 02:53:41', '2022-08-11 03:59:45'),
(3, '000003', 'coderfaruk', 3, NULL, NULL, NULL, '01711223344', 'active', '2022-08-08', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', '1', '1', '1', '1', '1', '2022-08-11 02:53:41', '2022-08-13 07:05:00'),
(4, '000004', 'Md Omor Faruk', 2, NULL, NULL, NULL, '01614253614', 'inActive', '2022-08-16', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', 'inActive', '0', 'inActive', 'inActive', 'inActive', 'inActive', '2022-08-11 02:53:42', '2022-08-11 02:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
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

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$9wxuG670pwUogUevw5Iy8OfnkBIdYuJVlo8fYEYAHD5mFleP1Heia', 'WIriJvyrrr8HpA9BWn1sTILjruLIXxd51keGc71vOltuEEde1yLF3j90gioS', '2022-07-26 23:50:48', '2022-08-09 22:34:28'),
(2, 'user', 'user', 'user@gmail.com', NULL, '$2y$10$ef3s73Pde6KFmUlj.AgKwu7QOQfaN/PZ8Vr7Z9TbkeLLaB/yjWnxW', NULL, '2022-08-08 02:14:17', '2022-08-08 02:14:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_user_id_unique` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_package_name_unique` (`package_name`),
  ADD UNIQUE KEY `packages_speed_unique` (`speed`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `previousbills`
--
ALTER TABLE `previousbills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previouscustomers`
--
ALTER TABLE `previouscustomers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previousbills`
--
ALTER TABLE `previousbills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `previouscustomers`
--
ALTER TABLE `previouscustomers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
