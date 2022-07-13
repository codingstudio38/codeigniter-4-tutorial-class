-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 04:15 AM
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
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(9) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `options` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`id`, `username`, `email`, `phone`, `password`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '@38vidyut', 'vidyut.star006@gmail.com', '7735501335', '$2y$10$npNYYBHSo3uN1SQYk5lRy./M9ZrGJOt.aATx0DBrKJWdbJRpvtcM.', NULL, '2021-12-08 13:26:36', '2021-12-08 01:56:36', NULL),
(2, '@38BIKASH', 'admin@gmail.com', '2342342342', '$2y$10$Bym12.OLqXCUNiJ9aRquUeNFM7xIw04Mj6tu5bNoSCnL.aQvveng.', NULL, '2021-12-11 05:35:32', '2021-12-11 05:35:32', NULL),
(3, 'admin@v67', 'admin@g567mail.com', '2356756756', '$2y$10$87A.Y2Ormh1CCiFdBvgQvOgNGPP6EPZ56HL1bmebpVhedbmRppfDa', NULL, '2021-12-21 20:35:29', '2021-12-21 20:35:29', NULL),
(4, 'admin@', 'admin1@gmail.com', '7735501336', '$2y$10$NDIVNRky2NGtfMZueYq2Ieev72glpcMr8FPZB42D2Vrpsxaw54B9O', NULL, '2022-01-20 00:52:16', '2022-01-20 00:52:16', NULL),
(5, '@39vidyut', 'vidyut.star007@gmail.com', '7735501334', '$2y$10$j.dUkDfIMdVUR3SrzKWtdO9btEaUgosqQjZkr6elNAVXVHilpVzI2', NULL, '2022-06-14 23:51:31', '2022-06-14 23:51:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `for_test`
--

CREATE TABLE `for_test` (
  `id` int(9) UNSIGNED NOT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `for_test`
--

INSERT INTO `for_test` (`id`, `c1`, `c2`, `c3`, `created_at`, `deleted_at`) VALUES
(1, '1', '1', '1', '2021-12-15 05:57:48', NULL),
(2, '2', '2', '2', '2021-12-15 05:57:48', NULL),
(3, '3', '3', '3', '2021-12-15 05:57:48', NULL),
(4, '4', '4', '4', '2021-12-15 05:57:48', NULL),
(5, '1', '1', '1', '2021-12-15 06:07:21', NULL),
(6, '2', '2', '2', '2021-12-15 06:07:21', NULL),
(7, '3', '3', '3', '2021-12-15 06:07:21', NULL),
(8, '4', '4', '4', '2021-12-15 06:07:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(59, '2021-11-15-115939', 'App\\Database\\Migrations\\Users', 'default', 'App', 1638968566, 1),
(60, '2021-11-15-120222', 'App\\Database\\Migrations\\Posts', 'default', 'App', 1638968566, 1),
(61, '2021-11-15-120234', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1638968566, 1),
(62, '2021-11-15-120248', 'App\\Database\\Migrations\\Profiles', 'default', 'App', 1638968566, 1),
(63, '2021-11-21-083115', 'App\\Database\\Migrations\\ForTest', 'default', 'App', 1638968566, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category_id` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `thumbnail`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'title8', 'content8', '2$1462205189$9351329.jpg', 8, '2021-12-15 03:13:39', '2021-12-14 15:43:39', NULL),
(20, 'title9', 'content9', '1$539326438$2057979.jpg', 9, '2021-12-15 03:13:39', '2021-12-14 15:43:39', NULL),
(53, 'vidyut1', 'kumar1', '0$386238661$1133693.jpg', 1, '2021-12-15 03:13:39', '2021-12-14 15:43:39', NULL),
(54, 'bidyut2', 'kumar2', '2$804097193$2057979.jpg', 2, '2021-12-14 04:48:17', '2021-12-13 17:18:17', NULL),
(55, 'titlte 1', 'content1', '1$1212162247$1230664.jpg', 1, '2021-12-14 04:48:17', '2021-12-13 17:18:17', NULL),
(56, '3', '3', '0$311523889$48626.jpeg', 2, '2021-12-14 04:48:17', '2021-12-13 17:18:17', NULL),
(57, 'title11', 'content11', '1$1159040307$1102505.jpg', 1, '2021-12-14 04:18:24', '2021-12-13 16:48:24', NULL),
(58, 'title22', 'content22', '0$1705282117$8886.png', 2, '2021-12-14 04:18:24', '2021-12-13 16:48:24', NULL),
(59, '1', '1', '0$57757578$6105330.jpg', 1, '2021-12-14 15:41:51', '2021-12-14 15:41:51', NULL),
(60, '2', '2', '1$1846068476$1102505.jpg', 2, '2021-12-14 15:41:51', '2021-12-14 15:41:51', NULL),
(66, '54646b45 4g4', '456 5 dfgdgdf gd', '1825065729$1102505.jpg', 0, '2021-12-14 18:56:59', '2021-12-14 18:56:59', NULL),
(67, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 18:58:48', '2021-12-14 18:58:48', NULL),
(68, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 18:58:48', '2021-12-14 18:58:48', NULL),
(69, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 18:58:48', '2021-12-14 18:58:48', NULL),
(70, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 18:58:48', '2021-12-14 18:58:48', NULL),
(71, 'for xl test title', 'for xl test content', '0$1846695401$2190975.jpg', 1, '2022-01-24 04:53:22', '2022-01-23 17:23:22', NULL),
(72, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 18:59:04', '2021-12-14 18:59:04', NULL),
(73, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 18:59:04', '2021-12-14 18:59:04', NULL),
(74, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 18:59:04', '2021-12-14 18:59:04', NULL),
(75, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 19:20:05', '2021-12-14 19:20:05', NULL),
(76, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 19:20:05', '2021-12-14 19:20:05', NULL),
(77, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 19:20:05', '2021-12-14 19:20:05', NULL),
(78, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 19:20:05', '2021-12-14 19:20:05', NULL),
(79, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 19:20:14', '2021-12-14 19:20:14', NULL),
(80, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 19:20:14', '2021-12-14 19:20:14', NULL),
(81, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 19:20:14', '2021-12-14 19:20:14', NULL),
(82, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 19:20:14', '2021-12-14 19:20:14', NULL),
(83, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 19:26:45', '2021-12-14 19:26:45', NULL),
(84, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 19:26:45', '2021-12-14 19:26:45', NULL),
(85, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 19:26:45', '2021-12-14 19:26:45', NULL),
(87, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 1, '2021-12-14 21:45:45', '2021-12-14 21:45:45', NULL),
(88, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 21:45:45', '2021-12-14 21:45:45', NULL),
(89, 'for xl test title', 'for xl test content', '1$1846068476$1102505.jpg', 2, '2021-12-14 21:45:45', '2021-12-14 21:45:45', NULL),
(99, '1', '19', 'title8', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(100, '2', '20', 'title9', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(101, '3', '53', 'vidyut1', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(102, '4', '54', 'bidyut2', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(103, '5', '55', 'titlte 1', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(104, '6', '56', '3', 3, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(105, '7', '57', 'title11', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(106, '8', '58', 'title22', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(107, '9', '59', '1', 1, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(108, '10', '60', '2', 2, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(109, '11', '66', '54646b45 4g4', 456, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(110, '12', '67', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(111, '13', '68', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(112, '14', '69', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(113, '15', '70', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(114, '16', '71', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(115, '17', '72', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(116, '18', '73', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(117, '19', '74', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(118, '20', '75', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(119, '21', '76', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(120, '22', '77', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(121, '23', '78', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(122, '24', '79', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(123, '25', '80', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(124, '26', '81', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(125, '27', '82', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(126, '28', '83', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(127, '29', '84', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(128, '30', '85', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(129, '31', '86', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(130, '32', '87', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(131, '33', '88', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(132, '34', '89', 'for xl test title', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(133, '35', '91', 'post man title2', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(134, '36', '92', 'post man update title 35', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(135, '37', '93', 'post man update thumbnail 92', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(136, '38', '94', 'post man update thumbnail 92', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(137, '39', '97', 'ederw', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL),
(138, '40', '98', 'post man update thumbnail 93', 0, '2022-06-15 00:21:57', '2022-06-15 00:21:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(9) UNSIGNED NOT NULL,
  `user_id` int(9) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `thumbnail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Vidyut Mandal', 'Jaydev Vihar', 'Bhubaneswar', 'Odisha', 'India', 'test-2.jpg', '2021-12-15 04:17:33', '2021-12-14 16:47:33', NULL),
(2, 2, 'Bikash Kumar', NULL, NULL, NULL, NULL, NULL, '2021-12-11 05:35:32', '2021-12-11 05:35:32', NULL),
(11, 3, 'Vidyut Mandal', NULL, NULL, NULL, NULL, NULL, '2021-12-21 20:35:29', '2021-12-21 20:35:29', NULL),
(12, 4, 'Vidyut Mandal', NULL, NULL, NULL, NULL, 'test-y-1.jpg', '2022-01-20 12:22:39', '2022-01-20 00:52:39', NULL),
(13, 5, 'Vidyut Mandal', NULL, NULL, NULL, NULL, NULL, '2022-06-14 23:51:31', '2022-06-14 23:51:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bidyut kumar', 'mondalbidyut38@gmail.com', '1234567890', '', '2022-07-07 01:16:59', '2022-07-06 14:46:59', NULL),
(2, 'Vidyut kumar', 'mondalVidyut38@gmail.com', '4423456789', '', '2021-11-15 12:40:02', NULL, NULL),
(3, 'Vidyut Mandal', 'admin@gmail.com', '7735501335', 'N/A', '2021-12-06 01:26:46', '2021-12-06 01:26:46', NULL),
(4, 'Vidyut Mandal', 'admin@gmail.com', '7735501335', 'N/A', '2021-12-06 02:09:23', '2021-12-06 02:09:23', NULL),
(28, 'bn', 'vidyut.star006@gmail.com', '2424242432', '', '2022-07-07 01:37:40', '2022-07-06 15:07:40', NULL),
(29, 'bk', 'vidyut.star006@gmail.com', '3242424', '', '2022-07-07 01:19:41', '2022-07-06 14:49:41', NULL),
(31, 'vidyut kumar mandal', 'vidyut.star006@gmail.com', '234234243', '', '2022-07-07 01:18:28', '2022-07-06 14:48:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `for_test`
--
ALTER TABLE `for_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `for_test`
--
ALTER TABLE `for_test`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
