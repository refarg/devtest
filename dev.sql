-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 10:35 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(99) COLLATE utf8_bin NOT NULL,
  `jenisbarang` varchar(99) COLLATE utf8_bin NOT NULL,
  `deskripsi` varchar(99) COLLATE utf8_bin NOT NULL,
  `stok` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `jenisbarang`, `deskripsi`, `stok`, `hargabarang`) VALUES
(1, 'tes', 'coba', 'tes', 124324, 43252314),
(2, 'coba', 'coba', 'frefqw', 12345, 12938);

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
(1, 1, 'tes', 'refardo@gmail.com', '$2y$10$3ZoyCGsGbNYTLdpLlqX4eetdzoMLAx1y3MPQBQuc7zp4GX7ULnAwy', 'wq2E3ZzTtsHQiFnJTZSiTvPZfkZn4Q5LfeZL3OLkwuW4MyJ63eJcGukBbY3z', '2018-09-19 21:12:43', '2018-09-19 21:12:43'),
(2, 2, 'coba', 'coba@mail.com', '$2y$10$wpp9FXoayqF0D9erNUawuezkS24EeFYAKZ2EWExFEm.jVAEuSERkS', 'pbUFrP8qFn9lOZCcnQir2iTuxzIVL5mBEiWyTclo2ZJzm5zLYMzkrwXlLplj', '2018-09-19 22:01:28', '2018-09-19 22:01:28'),
(3, 2, 'masteng', 'cobz@mail.com', '$2y$10$zFz7zA.z5HvYXXXJ3m6kW.UrlpIyoneSHIdXqGbqBPr9FscoaVF4a', 'NbfLt26yDaMTPzuAOXvR6HBJDaobZ0zw8EaSbX2oZ9CQcE1v8nqviqYdkdYT', '2018-09-19 22:02:15', '2018-09-19 22:02:15'),
(4, 1, 'admin', 'cobahehe@hehe.com', '$2y$10$3ZoyCGsGbNYTLdpLlqX4eetdzoMLAx1y3MPQBQuc7zp4GX7ULnAwy', 'n8tiNKrUwJCI6t36anjaXDdHyTHUz5bwb2LzU78kVxVLYIuZ7OQhcnbpLSAx', NULL, NULL),
(5, 2, 'masbro', 'masbro@mail.com', '$2y$10$tWEead1WqNf2soIdJN81Ee2PyA.7JyKguid37kLU9IBE6rWFXeqcC', 'T5FamUCY6RC2CfyddKtIsHTDp1pyrbvZwWq0F01CntzCorBqw7A4203QVRq1', '2018-09-23 21:01:20', '2018-09-23 21:01:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
