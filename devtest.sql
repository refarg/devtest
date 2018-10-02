-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 07:07 PM
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
  `hargabarang` int(11) NOT NULL,
  `gambarbarang` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `jenisbarang`, `deskripsi`, `stok`, `hargabarang`, `gambarbarang`) VALUES
(4, 'Piringan Hitam Corak Batik', 'Kerajinan', 'Piringan hitam berhias corak batik dan manik-manik', 20, 100000, 'download.jpg'),
(5, 'Keranjang Sampah', 'Kerajinan', 'Keranjang Sampah era modern', 290, 300000, 'maxresdefault.jpg'),
(6, 'Gambar Waterfall', 'Kerajinan', 'Gambar Coretan Grup Band Oasis', 0, 50000, 'waterfall-thac-dray-nur-buon-me-thuot-daklak-68147.jpeg'),
(7, 'Mencoba', 'Kerajinan', 'Tes', 20, 90000, 'pexels-photo-206673.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `detailuser`
--

CREATE TABLE `detailuser` (
  `iddetail` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(255) COLLATE utf8_bin NOT NULL,
  `nomorponsel` varchar(255) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `detailuser`
--

INSERT INTO `detailuser` (`iddetail`, `iduser`, `namalengkap`, `alamat`, `nomorponsel`, `avatar`) VALUES
(1, 1, 'Refardo', 'Jl. Kenongo', '085465123546', NULL),
(2, 2, 'Mimin ilapyu', 'Jl. Tes', '083851016003', 'blank-profile-picture-973460_960_720.png'),
(3, 6, 'Masedo', 'nganu', '085465412326', 'blank-profile-picture-973460_960_720.png'),
(4, 7, 'Josep', 'Jl. Masteng', '089832192857', NULL);

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
(4, 4, 1, 30, '2018-10-01 03:17:53', '0000-00-00 00:00:00');

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
(1, 2, 'refardo', 'refardo@gmail.com', '$2y$10$vvIaNHQGGCos12itINZ7YOyuuPSLTOQG5hMVfmghPpZsdYn.LGtKe', 'tsTJhv5STsrdiJbS8Cb3ypGgYGjQFopUn92yyth3Ke4eAFECdyX0oOvcljYM', '2018-09-27 05:30:08', '2018-09-27 05:36:50'),
(2, 1, 'theadmin', 'admin@mail.com', '$2y$10$nm.NbTjvplxCKUtx82NOxOLld46g5mOeo00c1oo/1bxh9HLG0iivm', '7IVtU8sz0BMK7ifAidaBCpdAFxeLjEzdStF51inf0Uu0l7mQHol4pIA4azlw', '2018-09-27 05:38:34', '2018-09-27 05:38:34'),
(6, 2, 'Masedo', 'refardo@google.com', '$2y$10$u3U9yNivasZJ86qe7DU6bufNtv226ln3rmxsIC6wWK3fGtdPBjA5a', '4B8sOLw5pfNjIulKhwvbB2uijfDxvbSwHZd8MTuHnbsfXTnBbace5l2Xl11h', '2018-10-02 02:28:10', '2018-10-02 02:28:10'),
(7, 2, 'Josep', 'tesbro@mail.com', '$2y$10$p.fUKjslUKF6uGItVJN1guboEEJBm6jUmi2JHMuzOpeqCDNOMoEcW', 'CyVos9el9LixJA2f8jST0oKhLiocrzBkWTw2xdfA7wdkcdQRNL8OgoHj55x8', '2018-10-02 02:28:59', '2018-10-02 02:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `userdata` (`iduser`);

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detailuser`
--
ALTER TABLE `detailuser`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD CONSTRAINT `userdata` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
