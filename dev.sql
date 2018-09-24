-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 05:41 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'tes', 'tes@mail.com', '$2y$10$3ZoyCGsGbNYTLdpLlqX4eetdzoMLAx1y3MPQBQuc7zp4GX7ULnAwy', 'QWwn8IOjEr75WuNrOvXzUelBNKs7S3W71THZaMvYiBlmWgDJWuldg1AwnYHR', '2018-09-19 21:12:43', '2018-09-19 21:12:43'),
(2, 2, 'coba', 'coba@mail.com', '$2y$10$wpp9FXoayqF0D9erNUawuezkS24EeFYAKZ2EWExFEm.jVAEuSERkS', 'PzA7gYbVVN3Hz9CAmPi95bQ2QzrmEF139I9yjdahyGBp6AxVZfu4vYNm0qAg', '2018-09-19 22:01:28', '2018-09-19 22:01:28'),
(3, 2, 'masteng', 'cobz@mail.com', '$2y$10$zFz7zA.z5HvYXXXJ3m6kW.UrlpIyoneSHIdXqGbqBPr9FscoaVF4a', 'NbfLt26yDaMTPzuAOXvR6HBJDaobZ0zw8EaSbX2oZ9CQcE1v8nqviqYdkdYT', '2018-09-19 22:02:15', '2018-09-19 22:02:15'),
(4, 1, 'admin', 'cobahehe@hehe.com', '$2y$10$3ZoyCGsGbNYTLdpLlqX4eetdzoMLAx1y3MPQBQuc7zp4GX7ULnAwy', 'n8tiNKrUwJCI6t36anjaXDdHyTHUz5bwb2LzU78kVxVLYIuZ7OQhcnbpLSAx', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
