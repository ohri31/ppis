-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 03:19 PM
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
-- Table structure for table `expected_results`
--

CREATE TABLE `expected_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_result` double NOT NULL,
  `max_result` double NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testrequest_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expected_results`
--

INSERT INTO `expected_results` (`id`, `min_result`, `max_result`, `unit`, `testrequest_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'A', 2, 'sfdkaslčfl', '2018-05-28 17:51:46', '2018-05-28 17:51:46'),
(2, 1, 15, 'A', 3, 'parametar 1', '2018-05-31 10:18:06', '2018-05-31 10:18:06');

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
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_25_222358_add_fields_for_registraiton', 1),
(4, '2018_04_25_224805_create_company_name', 1),
(5, '2018_04_25_224949_add_role_fields', 1),
(6, '2018_05_02_185501_create_permission_tables', 1),
(7, '2018_05_09_203211_create_equipment_types_table', 1),
(8, '2018_05_09_204552_create_equipment_table', 1),
(9, '2018_05_10_113607_create_history_table', 1),
(10, '2018_05_12_100062_test_requests_statuses_table', 1),
(11, '2018_05_12_100933_test_requests_table', 1),
(12, '2018_05_21_231445_creaate_test_report_table', 1),
(13, '2018_05_24_103800_add_end_date_request', 1),
(14, '2018_05_24_105920_create_expected_results', 1),
(15, '2018_05_26_102647_create_test_case', 1),
(16, '2018_05_26_102902_create_test_case_type', 1);

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
(15, 'CanAccessToAllTestResults', 'web', '2018-05-02 18:23:24', '2018-05-02 18:23:24'),
(16, 'CanSeeFinalTestReport', 'web', '2018-05-31 08:10:55', '2018-05-31 08:10:55'),
(17, 'CanSeeApprovedDeclinedRequests', 'web', '2018-05-31 08:14:34', '2018-05-31 08:14:34'),
(18, 'CanApproveReports', 'web', '2018-05-31 08:53:49', '2018-05-31 08:53:49'),
(19, 'CanManageTestCases', 'web', '2018-05-31 09:17:11', '2018-05-31 09:17:11');

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
(5, 1),
(7, 1),
(8, 3),
(9, 2),
(11, 2),
(11, 3),
(11, 5),
(12, 2),
(12, 3),
(12, 4),
(13, 3),
(15, 2),
(15, 5),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(17, 2),
(17, 4),
(18, 5),
(19, 2),
(19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test_case`
--

CREATE TABLE `test_case` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steps` text COLLATE utf8mb4_unicode_ci,
  `test_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_results` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `test_request_id` int(11) NOT NULL,
  `test_case_type_id` int(11) NOT NULL,
  `expected_result_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_case`
--

INSERT INTO `test_case` (`id`, `name`, `steps`, `test_data`, `actual_results`, `notes`, `status`, `test_request_id`, `test_case_type_id`, `expected_result_id`, `created_at`, `updated_at`) VALUES
(1, 'CaseName1', 'Steps', 'TestData', '2', NULL, 1, 1, 1, 1, '2018-05-28 18:46:22', '2018-05-28 18:46:22'),
(2, 'CaseName2', 'Steps', 'TestData', '9', NULL, 0, 1, 1, 1, '2018-05-28 18:48:14', '2018-05-28 18:48:14'),
(3, 'CaseName3', 'Steps', 'TestData', '10', NULL, 0, 1, 1, 1, '2018-05-28 18:48:59', '2018-05-28 18:48:59'),
(4, 'TestCaseName', 'Stešs', 'data data', '2', NULL, 1, 1, 1, 1, '2018-05-28 18:51:33', '2018-05-28 18:51:33'),
(5, 'Name1', 'Steps\r\n1.\r\n2', 'Data', '11', NULL, 0, 2, 2, 1, '2018-05-28 19:27:23', '2018-05-28 19:27:23'),
(6, 'Name1', 'Steps\r\n1.\r\n2', 'Data', '11', NULL, 0, 2, 2, 1, '2018-05-28 19:46:21', '2018-05-28 19:46:21'),
(7, 'CASEEE', 'dfdsfs', 'data', '0', 'asds', 0, 2, 1, 1, '2018-05-28 19:52:38', '2018-05-28 19:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `test_case_type`
--

CREATE TABLE `test_case_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_case_type`
--

INSERT INTO `test_case_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Type 1', '2018-05-27 22:00:00', '2018-05-27 22:00:00'),
(2, 'Type 2', '2018-05-27 22:00:00', '2018-05-27 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_report`
--

CREATE TABLE `test_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `tester_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `approved_by_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_report`
--

INSERT INTO `test_report` (`id`, `title`, `description`, `date`, `tester_id`, `request_id`, `approved`, `approved_by_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test report 1', 'Opis', '2018-05-31 00:00:00', 9, 1, 1, 4, 1, '2018-05-07 22:00:00', '2018-05-08 22:00:00'),
(2, 'Test report 1', 'Opis', '2018-05-31 00:00:00', 9, 1, 0, NULL, 1, '2018-05-07 22:00:00', '2018-05-08 22:00:00');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_requests`
--

INSERT INTO `test_requests` (`id`, `name`, `description`, `equipment_id`, `user_id`, `status_id`, `approved`, `approvedby_id`, `created_at`, `updated_at`, `end_date`) VALUES
(1, 'dsfsdfds', 'sfdsas', 3, 2, 3, 1, 10, '2018-05-27 22:00:00', '2018-05-31 09:42:34', '2018-05-28 00:00:00'),
(2, 'Zahtjev', 'Opis zahtjeva', 3, 2, 3, 1, 10, '2018-05-28 17:51:33', '2018-05-28 18:44:45', '2018-05-28 19:51:33'),
(3, 'Novi', 'Novi test request', 3, 2, 1, 0, NULL, '2018-05-31 10:17:52', '2018-05-31 10:17:52', '2018-06-05 00:00:00');

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
(1, 'Admin', 'admin@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'hnNZymkhtUCX2diVdWdE6dOzanlGBktntniEimIMB9wakzw2ybf5q0zhj6pt', '2018-05-20 17:29:12', '2018-05-20 17:58:56', 'Admin', 1, NULL, 1),
(2, 'Kompanija 2', 'k2@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'Jm7MOWAW3HTCc0pyialJMuLGfFUK2TWumkwJeYJlTtapJkfa4chVr9gnyOOy', '2018-05-20 17:33:02', '2018-05-20 18:02:20', 'Kompanija 2', 1, 'Kompanija 2', 1),
(3, 'Kompanija 3', 'k3@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'nYYeBKiw76FC0u8agMGGG4awzSwdssz87Ud9jhxYfKMVd8Fd8ofbCGiFkAZS', '2018-05-20 17:35:06', '2018-05-20 18:02:23', 'Kompanija 3', 1, 'Kompanija 3', 1),
(9, 'Tester', 'tetst@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'dK7rzfKokmeqEXeaMlqNO8MxumPRuPdlVjfqnhRzuTex72c9fMxPvcNXUIvh', '2018-05-20 18:22:44', '2018-05-20 18:22:44', 'test', 1, NULL, 1),
(10, 'Menadzment', 'mngmnt@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'qCHzKiHHYnMehLMkUrYariPqed0bOQHYjpCxvjseYGRc5SoYwMpf8pRo3l1x', '2018-05-20 18:29:13', '2018-05-20 18:29:13', 'M', 1, NULL, 1),
(11, 'TestMngr', 'testmngr@gmail.com', '$2y$10$4f9gZjI0DKnnG4Zm4W5sXO8hRpiAR.4vvxJVhPO81VbBbW7IjiFwy', 'aP1CLGJZ3OUxVwhWh6F2jaM1xoyYVg52GpwN1dfrEopPtPg2dnSLXvRdqQiB', '2018-05-20 18:29:48', '2018-05-20 18:29:48', 'TM', 1, NULL, 1);

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
-- Indexes for table `expected_results`
--
ALTER TABLE `expected_results`
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
-- Indexes for table `test_case`
--
ALTER TABLE `test_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_case_type`
--
ALTER TABLE `test_case_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_report`
--
ALTER TABLE `test_report`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `equipment_types`
--
ALTER TABLE `equipment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expected_results`
--
ALTER TABLE `expected_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_case`
--
ALTER TABLE `test_case`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test_case_type`
--
ALTER TABLE `test_case_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_report`
--
ALTER TABLE `test_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `test_requests`
--
ALTER TABLE `test_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `equipment_equipment_type_id_foreign` FOREIGN KEY (`equipment_type_id`) REFERENCES `equipment_types` (`id`) ON DELETE CASCADE;

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
