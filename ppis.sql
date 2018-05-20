-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 10:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppis`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `description`, `equipment_type_id`, `created_at`, `updated_at`) VALUES
(2, '43545', 'bla bla', 1, '2018-05-09 20:35:23', '2018-05-12 06:35:59'),
(3, 'Proizvod 2', 'hdfgkhdsgbfs', 1, '2018-05-12 06:34:19', '2018-05-12 06:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tip 1', '2018-05-08 22:00:00', '2018-05-08 22:00:00'),
(2, 'Tip 2', '2018-05-07 22:00:00', '2018-05-07 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_types`
--

CREATE TABLE `equipment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_types`
--

INSERT INTO `equipment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tip 1', '2018-05-08 22:00:00', '2018-05-08 22:00:00'),
(2, 'Tip 2', '2018-05-07 22:00:00', '2018-05-07 22:00:00'),
(6, '75465', '2018-05-12 06:28:54', '2018-05-12 06:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, '2018-05-12 06:26:20', '2018-05-12 06:26:20');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_25_222357_add_fields_for_registraiton', 1),
(4, '2018_04_25_224804_create_company_name', 1),
(5, '2018_04_25_224948_add_role_fields', 1),
(6, '2018_05_02_185501_create_permission_tables', 1),
(7, '2018_05_09_195656_create_equipment_table', 2),
(8, '2018_05_09_195657_create_equipment_table', 3),
(9, '2018_05_09_203210_create_equipment_type_table', 4),
(10, '2018_05_09_203211_create_equipment_type_table', 5),
(11, '2018_05_09_204552_create_equipment_table', 6),
(12, '2018_05_09_203211_create_equipment_types_table', 7),
(13, '2018_05_10_113606_create_history_table', 8),
(14, '2018_05_10_113607_create_history_table', 9),
(15, '2018_05_12_084053_test_requests_table', 10),
(16, '2018_05_12_084055_test_requests_table', 11),
(17, '2018_05_12_093410_test_requests_status_table', 12),
(18, '2018_05_12_093411_test_requests_status_table', 13),
(19, '2018_05_12_094650_test_requests_table', 14),
(20, '2018_05_12_093412_test_requests_status_table', 15),
(21, '2018_05_12_094653_test_requests_table', 15),
(22, '2018_05_12_100051_test_requests_statuses_table', 16),
(23, '2018_05_12_100052_test_requests_statuses_table', 17),
(24, '2018_05_12_100062_test_requests_statuses_table', 18),
(25, '2018_05_12_100933_test_requests_table', 18),
(26, '2014_10_12_000001_create_users_table', 19),
(27, '2018_04_25_222358_add_fields_for_registraiton', 19),
(28, '2018_04_25_224805_create_company_name', 19),
(29, '2018_04_25_224949_add_role_fields', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(3, 'App\\User', 6),
(4, 'App\\User', 10),
(5, 'App\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'CanAddEquipment', 'web', '2018-05-02 18:15:55', '2018-05-02 18:15:55'),
(7, 'CanManageUsers', 'web', '2018-05-02 18:16:49', '2018-05-02 18:16:49'),
(8, 'CanSendRequestsForTesting', 'web', '2018-05-02 18:17:25', '2018-05-02 18:17:25'),
(9, 'CanCreateTestReports', 'web', '2018-05-02 18:17:50', '2018-05-02 18:17:50'),
(10, 'CanManageUserRegistrationRequests', 'web', '2018-05-02 18:20:00', '2018-05-02 18:20:00'),
(11, 'CanManageTestReports', 'web', '2018-05-02 18:20:39', '2018-05-02 18:20:39'),
(12, 'CanManageRequestsForEquipmentAndTesting', 'web', '2018-05-02 18:21:48', '2018-05-02 18:21:48'),
(13, 'CanSendRequestsForTesting', 'web', '2018-05-02 18:22:25', '2018-05-02 18:22:25'),
(14, 'CanCreateTimesheetsForTesting', 'web', '2018-05-02 18:22:55', '2018-05-02 18:22:55'),
(15, 'CanAccessToAllTestResults', 'web', '2018-05-02 18:23:24', '2018-05-02 18:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2018-05-02 18:05:12', '2018-05-02 18:05:12'),
(2, 'Tester', 'web', '2018-05-02 18:25:17', '2018-05-02 18:25:17'),
(3, 'Company', 'web', '2018-05-02 18:25:54', '2018-05-02 18:25:54'),
(4, 'Management', 'web', '2018-05-02 18:26:41', '2018-05-02 18:26:41'),
(5, 'TestMngr', 'web', '2018-05-02 18:28:56', '2018-05-02 18:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 3),
(7, 1),
(8, 3),
(9, 2),
(11, 2),
(11, 5),
(12, 4),
(13, 3),
(14, 5),
(15, 2),
(15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test_requests`
--

CREATE TABLE `test_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `approved` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `approvedby_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_requests_statuses`
--

CREATE TABLE `test_requests_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_requests_statuses`
--

INSERT INTO `test_requests_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New', NULL, NULL),
(2, 'In progress', NULL, NULL),
(3, 'Done', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` int(10) UNSIGNED DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `surname`, `approved`, `company_name`, `role_id`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'YPXCxibmn6M8eWpMWMtzPDqh9OlpHdlsLhE4AB46GbrZPJqi61uMLvwe62Xi', '2018-05-20 17:29:12', '2018-05-20 17:58:56', 'Admin', 1, NULL, 1),
(2, 'Kompanija 2', 'k2@gmail.com', '$2y$10$P9dD34xfpAdIlseIAjpZqe3lwYujDzBRtX6ZadWVkJMtDmrsRQ6SO', 'kYwZrDKJJAYwatdZKn0OWqMtiqgmv1uB2rDzgl9xq2lURpxZjc6tJEzmbiQP', '2018-05-20 17:33:02', '2018-05-20 18:02:20', 'Kompanija 2', 1, 'Kompanija 2', 1),
(3, 'Kompanija 3', 'k3@gmail.com', '$2y$10$Vlic0ycu1ibkM56gncynFOmudCktJX/1UVqotjWVs6IREgtYASKmi', 'nYYeBKiw76FC0u8agMGGG4awzSwdssz87Ud9jhxYfKMVd8Fd8ofbCGiFkAZS', '2018-05-20 17:35:06', '2018-05-20 18:02:23', 'Kompanija 3', 1, 'Kompanija 3', 1),
(9, 'Tester', 'tetst@gmail.com', '$2y$10$kmfcBJrrnAaGDFvsyTnPWeh2He6ntgQlXoaDGFnob5k6PathbNyhC', NULL, '2018-05-20 18:22:44', '2018-05-20 18:22:44', 'test', 1, NULL, 1),
(10, 'Menadzment', 'mngmnt@gmail.com', '$2y$10$lqIZU/6yc9osMpR2JU8iLOm3NVJLxa.kYkBFvO4J70wX.V.K42DmG', NULL, '2018-05-20 18:29:13', '2018-05-20 18:29:13', 'M', 1, NULL, 1),
(11, 'TestMngr', 'testmngr@gmail.com', '$2y$10$kz4K.XeiMsw98TdeDXqUeuAfDWtbAnr7UcqMtQtVnK6ac0V9PAa9S', NULL, '2018-05-20 18:29:48', '2018-05-20 18:29:48', 'TM', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_equipment_type_id_foreign` (`equipment_type_id`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_types`
--
ALTER TABLE `equipment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
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
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
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
-- Indexes for table `test_requests`
--
ALTER TABLE `test_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_requests_equipment_id_foreign` (`equipment_id`),
  ADD KEY `test_requests_user_id_foreign` (`user_id`),
  ADD KEY `test_requests_approvedby_id_foreign` (`approvedby_id`),
  ADD KEY `test_requests_status_id_foreign` (`status_id`);

--
-- Indexes for table `test_requests_statuses`
--
ALTER TABLE `test_requests_statuses`
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
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment_types`
--
ALTER TABLE `equipment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_requests`
--
ALTER TABLE `test_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test_requests_statuses`
--
ALTER TABLE `test_requests_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_equipment_type_id_foreign` FOREIGN KEY (`equipment_type_id`) REFERENCES `equipment_type` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_requests`
--
ALTER TABLE `test_requests`
  ADD CONSTRAINT `test_requests_approvedby_id_foreign` FOREIGN KEY (`approvedby_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_requests_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_requests_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `test_requests_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
