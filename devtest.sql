-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 06:15 AM
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
-- Database: `devtest`
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
(1, 'Kopi Luwak Jember', 'Makanan / Minuman', 'Kopi Luwak yang diproses secara alami', 937, 200000),
(2, 'Sapu Ijuk Ala-ala', 'Kerajinan', 'Sapu ijuk berhias corak batik makassar', 736, 40000),
(4, 'Piringan Hitam Corak Batik', 'Kerajinan', 'Piringan hitam berhias corak batik dan manik-manik', 81, 100000),
(5, 'Keranjang Sampah', 'Kerajinan', 'Keranjang Sampah era modern', 290, 300000);

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `idbarang`, `iduser`, `jumlahbarang`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, '2018-10-01 03:17:53', '0000-00-00 00:00:00'),
(2, 1, 2, 20, '2018-10-01 03:17:53', '0000-00-00 00:00:00'),
(3, 2, 2, 40, '2018-10-01 03:17:53', '0000-00-00 00:00:00'),
(4, 4, 1, 30, '2018-10-01 03:17:53', '0000-00-00 00:00:00'),
(5, 1, 1, 20, '2018-09-30 20:19:53', '2018-09-30 20:19:53'),
(6, 2, 1, 100, '2018-09-30 20:19:56', '2018-09-30 20:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
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
(1, 2, 'refardo', 'refardo@gmail.com', '$2y$10$vvIaNHQGGCos12itINZ7YOyuuPSLTOQG5hMVfmghPpZsdYn.LGtKe', 'RVVpGSPpRG8pdXxlHkbxcefEpQiuA3smUrA0K5mn8mtadtx4DRIhxCyAiER7', '2018-09-27 05:30:08', '2018-09-27 05:36:50'),
(2, 1, 'theadmin', 'admin@mail.com', '$2y$10$nm.NbTjvplxCKUtx82NOxOLld46g5mOeo00c1oo/1bxh9HLG0iivm', 'mC7KBMZTyHgXB8YFOSXSZBofAMCazqFQoAzTe3YDIiH0EKKNl0c8XFCYYYUk', '2018-09-27 05:38:34', '2018-09-27 05:38:34');

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `iduser` (`iduser`);

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `barangid` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
