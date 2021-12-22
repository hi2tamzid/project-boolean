-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3413
-- Generation Time: Dec 22, 2021 at 05:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_boolean`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '123456', '2021-12-16 07:25:32', '2021-12-16 07:25:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_09_131325_create_supervisors_table', 1),
(6, '2021_12_09_131437_create_students_table', 1),
(7, '2021_12_09_131455_create_projects_table', 1),
(8, '2021_12_09_131507_create_teams_table', 1),
(9, '2021_12_09_131518_create_sessions_table', 1),
(10, '2021_12_09_131545_create_project__supervisors_table', 1),
(11, '2021_12_09_131554_create_team__members_table', 1),
(12, '2021_12_09_131603_create_student__marks_table', 1),
(13, '2021_12_09_131611_create_team__projects_table', 1),
(14, '2021_12_09_131622_create_project__sessions_table', 1),
(17, '2021_12_13_173435_add_image_to_supervisors_table', 2),
(18, '2021_12_13_173456_add_image_to_students_table', 2),
(20, '2021_12_16_130609_create_admins_table', 3),
(21, '2021_12_19_132026_add_member_number_to_teams_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` tinyint(4) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `is_completed` tinyint(1) NOT NULL,
  `remark` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `type`, `description`, `progress`, `start_time`, `end_time`, `is_completed`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Boolean', 'Advanced Database design', 'test data', 0, '2021-12-21', '2021-12-24', 0, NULL, '2021-12-21 00:11:53', '2021-12-21 00:11:53', NULL),
(2, 'Health Check up', 'Machine Learning', 'This is a machine learning app', 0, '2021-12-21', '2021-12-23', 0, NULL, '2021-12-21 03:48:09', '2021-12-21 03:48:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project__sessions`
--

CREATE TABLE `project__sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project__sessions`
--

INSERT INTO `project__sessions` (`id`, `project_id`, `session_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2021-12-21 00:11:53', '2021-12-21 00:11:53', NULL),
(2, 2, 2, '2021-12-21 03:48:09', '2021-12-21 03:48:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project__supervisors`
--

CREATE TABLE `project__supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project__supervisors`
--

INSERT INTO `project__supervisors` (`id`, `project_id`, `supervisor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, '2021-12-21 00:11:53', '2021-12-21 00:11:53', NULL),
(2, 2, 4, '2021-12-21 03:48:09', '2021-12-21 03:48:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Spring 2021', '2021-12-18 23:45:09', '2021-12-18 23:47:56', '2021-12-18 23:47:56'),
(2, 'Sprint 2021', '2021-12-18 23:50:43', '2021-12-18 23:50:43', NULL),
(3, 'January 2020', '2021-12-18 23:50:55', '2021-12-18 23:50:55', NULL),
(4, 'October 2020', '2021-12-18 23:51:05', '2021-12-18 23:51:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_admission` date NOT NULL,
  `current_semester` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  `is_graduated` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `password`, `name`, `email`, `gender`, `mobile`, `year_of_admission`, `current_semester`, `batch`, `is_graduated`, `created_at`, `updated_at`, `deleted_at`, `image`) VALUES
(1, 1703310201389, '123456t', 'Tamzid', 'tamzidmahmud2@gmail.com', 'male', '123123123123213', '2021-12-18', '6th', 33, 1, '2021-12-18 08:39:26', '2021-12-18 22:35:02', '2021-12-18 22:35:02', '1639838366.jpg'),
(2, 17033102, '123456a', 'Tamzid', 'salam@gmail.com', 'male', '01864444444', '2021-12-19', '6th', 33, 1, '2021-12-18 22:56:36', '2021-12-18 22:56:36', NULL, '1639889794.jpg'),
(3, 123123123, '123456a', 'Tamzid 2', 'abc@test.com', 'male', '123123123123213', '2021-12-19', '6th', 33, 1, '2021-12-19 00:05:26', '2021-12-19 00:05:26', NULL, NULL),
(4, 1703310201377, '123456a', 'Nazia Moomtahina Proma', 'naziaproma15@gmail.com', 'female', '01747000000', '2021-12-19', '6th', 33, 1, '2021-12-19 00:06:20', '2021-12-19 00:06:20', NULL, '1639893980.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student__marks`
--

CREATE TABLE `student__marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `class_attendence` tinyint(4) DEFAULT NULL,
  `class_performance` tinyint(4) DEFAULT NULL,
  `report` tinyint(4) DEFAULT NULL,
  `viva` tinyint(4) DEFAULT NULL,
  `final_exam` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student__marks`
--

INSERT INTO `student__marks` (`id`, `student_id`, `session_id`, `project_id`, `team_id`, `class_attendence`, `class_performance`, `report`, `viva`, `final_exam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 1, 29, 10, 10, 10, 10, 50, '2021-12-21 14:41:08', '2021-12-21 14:41:08', NULL),
(2, 3, 2, 1, 29, 10, 10, 10, 10, 45, '2021-12-21 14:41:08', '2021-12-21 14:41:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_id` bigint(20) NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_acc_open` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `login_id`, `password`, `name`, `email`, `gender`, `mobile`, `is_acc_open`, `created_at`, `updated_at`, `deleted_at`, `image`) VALUES
(1, 123123123123, '123456', 'Tamzid', 'test@test.com', 'male', '123123123123213', 1, '2021-12-17 14:17:27', '2021-12-18 00:41:34', '2021-12-18 00:41:34', '1639772245.png'),
(2, 123123123123, '123456', 'Tamzid', 'test@test.com', 'male', '123123123123213', 1, '2021-12-18 04:13:52', '2021-12-18 04:13:52', NULL, '1639822431.jpg'),
(3, 123125454, '123456', 'Tamzid Mahmud', 'tamzidmahmud2@gmail.com', 'male', '123123123', 1, '2021-12-18 04:18:08', '2021-12-18 04:18:08', NULL, '1639822688.jpg'),
(4, 1703310201389, '123456a', 'Ashfaq', 'ashfaq@gmail.com', 'male', '01864444444', 1, '2021-12-18 04:59:33', '2021-12-18 04:59:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `member_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `member_number`) VALUES
(28, 'null', '2021-12-20 07:49:30', '2021-12-20 15:45:53', '2021-12-20 15:45:53', 1),
(29, 'Boolean', '2021-12-20 07:49:41', '2021-12-20 07:49:41', NULL, 2),
(30, 'Project Boolean', '2021-12-20 07:50:39', '2021-12-20 07:50:39', NULL, 3),
(31, 'Team Zero', '2021-12-21 10:53:46', '2021-12-21 10:53:46', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team__members`
--

CREATE TABLE `team__members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team__members`
--

INSERT INTO `team__members` (`id`, `team_id`, `student_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 28, 2, '2021-12-20 07:49:34', '2021-12-20 07:49:34', NULL),
(4, 29, 2, '2021-12-20 07:49:45', '2021-12-20 07:49:45', NULL),
(5, 29, 3, '2021-12-20 07:49:45', '2021-12-20 07:49:45', NULL),
(6, 30, 2, '2021-12-20 07:50:45', '2021-12-20 07:50:45', NULL),
(7, 30, 3, '2021-12-20 07:50:45', '2021-12-20 07:50:45', NULL),
(8, 30, 4, '2021-12-20 07:50:45', '2021-12-20 07:50:45', NULL),
(9, 31, 2, '2021-12-21 10:56:42', '2021-12-21 10:56:42', NULL),
(10, 31, 3, '2021-12-21 10:56:43', '2021-12-21 10:56:43', NULL),
(11, 31, 4, '2021-12-21 10:56:43', '2021-12-21 10:56:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team__projects`
--

CREATE TABLE `team__projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team__projects`
--

INSERT INTO `team__projects` (`id`, `project_id`, `team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 29, '2021-12-21 00:11:53', '2021-12-21 00:11:53', NULL),
(2, 2, 30, '2021-12-21 03:48:09', '2021-12-21 03:48:09', NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project__sessions`
--
ALTER TABLE `project__sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project__sessions_project_id_index` (`project_id`),
  ADD KEY `project__sessions_session_id_index` (`session_id`);

--
-- Indexes for table `project__supervisors`
--
ALTER TABLE `project__supervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project__supervisors_project_id_index` (`project_id`),
  ADD KEY `project__supervisors_supervisor_id_index` (`supervisor_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student__marks`
--
ALTER TABLE `student__marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student__marks_student_id_index` (`student_id`),
  ADD KEY `student__marks_session_id_index` (`session_id`),
  ADD KEY `student__marks_project_id_index` (`project_id`),
  ADD KEY `student__marks_team_id_index` (`team_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team__members`
--
ALTER TABLE `team__members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team__members_team_id_index` (`team_id`),
  ADD KEY `team__members_student_id_index` (`student_id`);

--
-- Indexes for table `team__projects`
--
ALTER TABLE `team__projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team__projects_project_id_index` (`project_id`),
  ADD KEY `team__projects_team_id_index` (`team_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project__sessions`
--
ALTER TABLE `project__sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project__supervisors`
--
ALTER TABLE `project__supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student__marks`
--
ALTER TABLE `student__marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `team__members`
--
ALTER TABLE `team__members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team__projects`
--
ALTER TABLE `team__projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project__sessions`
--
ALTER TABLE `project__sessions`
  ADD CONSTRAINT `project__sessions_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project__sessions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project__supervisors`
--
ALTER TABLE `project__supervisors`
  ADD CONSTRAINT `project__supervisors_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project__supervisors_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student__marks`
--
ALTER TABLE `student__marks`
  ADD CONSTRAINT `student__marks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student__marks_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student__marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student__marks_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team__members`
--
ALTER TABLE `team__members`
  ADD CONSTRAINT `team__members_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team__members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team__projects`
--
ALTER TABLE `team__projects`
  ADD CONSTRAINT `team__projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team__projects_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
