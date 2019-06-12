-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 02:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `laravel_test_migrations`
--

CREATE TABLE `laravel_test_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `laravel_test_migrations`
--

INSERT INTO `laravel_test_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_05_120733_create_projects_table', 1),
(4, '2019_06_07_142335_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_test_password_resets`
--

CREATE TABLE `laravel_test_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_test_projects`
--

CREATE TABLE `laravel_test_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `laravel_test_projects`
--

INSERT INTO `laravel_test_projects` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'My First Project', 'Lorem ipsum dolor sit amet...', '2019-06-05 17:25:53', '2019-06-05 17:25:53'),
(2, 'My Second Project', 'Lorem ipsum dolor sit amet 2...', '2019-06-05 17:29:38', '2019-06-05 17:29:38'),
(3, 'My Third Project (create)', 'The first created project...', '2019-06-05 20:07:41', '2019-06-05 20:07:41'),
(4, 'The Fourth Project', 'The 4th project\'s description', '2019-06-12 09:39:37', '2019-06-12 09:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_test_tasks`
--

CREATE TABLE `laravel_test_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `laravel_test_tasks`
--

INSERT INTO `laravel_test_tasks` (`id`, `project_id`, `description`, `completed`, `created_at`, `updated_at`) VALUES
(1, 3, 'draw something', 0, NULL, NULL),
(2, 3, 'paint something', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_test_users`
--

CREATE TABLE `laravel_test_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laravel_test_migrations`
--
ALTER TABLE `laravel_test_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_test_password_resets`
--
ALTER TABLE `laravel_test_password_resets`
  ADD KEY `laravel_test_password_resets_email_index` (`email`);

--
-- Indexes for table `laravel_test_projects`
--
ALTER TABLE `laravel_test_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_test_tasks`
--
ALTER TABLE `laravel_test_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_test_users`
--
ALTER TABLE `laravel_test_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laravel_test_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laravel_test_migrations`
--
ALTER TABLE `laravel_test_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laravel_test_projects`
--
ALTER TABLE `laravel_test_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laravel_test_tasks`
--
ALTER TABLE `laravel_test_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_test_users`
--
ALTER TABLE `laravel_test_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
