-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 02:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
  `idjenis` int(11) NOT NULL,
  `deskripsi` varchar(99) COLLATE utf8_bin NOT NULL,
  `stok` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL,
  `gambarbarang` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `idjenis`, `deskripsi`, `stok`, `hargabarang`, `gambarbarang`) VALUES
(4, 'Piringan Hitam Corak Batik', 1, 'Piringan hitam berhias corak batik dan manik-manik', 2, 100000, 'download.jpg'),
(5, 'Keranjang Sampah', 2, 'Keranjang Sampah era modern', 253, 300000, 'maxresdefault.jpg'),
(6, 'Gambar Waterfall', 2, 'Gambar Coretan Grup Band Oasis', 0, 50000, 'waterfall-thac-dray-nur-buon-me-thuot-daklak-68147.jpeg'),
(7, 'Mencoba', 2, 'Tes', 0, 90000, 'pexels-photo-206673.jpeg'),
(14, 'awda', 1, '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890', 0, 10, '_20151020_20560124102018133534.JPG'),
(15, 'Piringan Biru', 2, 'Ini Deskripsi Barang', 12, 901293021, '30x3028102018002105.png'),
(16, 'Piringan Coklat', 2, 'Itu Deskripsi', 230, 910291, '30x3028102018002129.png'),
(17, 'Tes', 2, 'Coba saja', 10, 90000, 'bliss-club-wip-large15112018115212.png'),
(18, 'Coba Tes', 2, 'Coba Barang', 3, 90000, 'EKTP22112018163030.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buktitransfer`
--

CREATE TABLE `buktitransfer` (
  `idbtransfer` int(11) NOT NULL,
  `idcheckout` int(11) NOT NULL,
  `buktitransfer` varchar(255) NOT NULL,
  `jasapengiriman` enum('JNE','J&T','Pos Indonesia','TIKI') NOT NULL,
  `statusverif` int(1) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buktitransfer`
--

INSERT INTO `buktitransfer` (`idbtransfer`, `idcheckout`, `buktitransfer`, `jasapengiriman`, `statusverif`, `resi`, `created_at`, `updated_at`) VALUES
(8, 1, 'lightbulb12112019155306.png', 'JNE', 1, 'ANBJW12378', '2019-11-12 08:57:02', '2019-11-12 08:57:02'),
(10, 3, '0', 'Pos Indonesia', 0, '', '2019-11-12 09:07:37', '2019-11-12 09:07:37'),
(12, 5, '0', 'JNE', 0, '', '2019-11-12 13:15:43', '2019-11-12 13:15:43'),
(13, 6, '0', 'Pos Indonesia', 0, '', '2019-11-12 13:16:36', '2019-11-12 13:16:36'),
(14, 7, '0', 'J&T', 0, '', '2019-11-12 13:16:48', '2019-11-12 13:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `idcheckout` int(11) NOT NULL,
  `idpembelian` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`idcheckout`, `idpembelian`, `idbarang`, `iduser`, `jumlahbarang`, `created_at`, `updated_at`) VALUES
(25, 1, 4, 7, 1, '2019-11-12 07:48:12', '2019-11-12 07:48:12'),
(26, 1, 5, 7, 1, '2019-11-12 07:54:12', '2019-11-12 07:54:12'),
(28, 3, 5, 7, 2, '2019-11-12 09:07:13', '2019-11-12 09:07:13'),
(29, 3, 7, 7, 1, '2019-11-12 09:07:28', '2019-11-12 09:07:28'),
(32, 4, 7, 7, 1, '2019-11-12 11:09:37', '2019-11-12 11:09:37'),
(34, 5, 15, 7, 2, '2019-11-12 11:50:16', '2019-11-12 11:50:16'),
(35, 6, 5, 7, 1, '2019-11-12 13:16:07', '2019-11-12 13:16:07'),
(36, 6, 4, 7, 1, '2019-11-12 13:16:19', '2019-11-12 13:16:19'),
(37, 7, 7, 7, 1, '2019-11-12 13:16:28', '2019-11-12 13:16:28');

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
(1, 1, 'Refardo', 'Jl. Kenongo raya', '08546512354', NULL),
(2, 2, 'Admin', 'Jl.Tes 1', '083851016002', 'blank-profile-picture-973460_960_720.png'),
(3, 6, 'Masedo', 'nganu', '085465412326', 'blank-profile-picture-973460_960_720.png'),
(4, 7, 'Josep', 'Jl. Coba tes', '089832192877', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `idjenis` int(11) NOT NULL,
  `jenisbarang` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `jenisbarang`
--

INSERT INTO `jenisbarang` (`idjenis`, `jenisbarang`) VALUES
(1, 'Batik'),
(2, 'Dekorasi Ruangan');

-- --------------------------------------------------------

--
-- Table structure for table `komentarbarang`
--

CREATE TABLE `komentarbarang` (
  `idkomentar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `komentar` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `komentarbarang`
--

INSERT INTO `komentarbarang` (`idkomentar`, `idbarang`, `iduser`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'blablabla', '2018-10-05 13:02:56', '0000-00-00 00:00:00'),
(2, 5, 2, 'tessss', '2018-10-05 13:02:56', '0000-00-00 00:00:00'),
(4, 7, 7, 'ngetes', '2018-10-05 13:02:56', '0000-00-00 00:00:00'),
(5, 4, 2, 'nganu', '2018-10-05 13:15:12', '2018-10-05 06:15:12'),
(7, 6, 6, 'bang buruan di-update dong stoknya', '2018-10-06 10:29:56', '2018-10-06 10:29:56'),
(8, 5, 7, 'gini', '2019-11-12 12:46:35', '2019-11-12 12:46:35'),
(9, 4, 6, 'tes', '2018-12-05 18:43:54', '2018-12-05 18:43:54');

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
  `idresets` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`idresets`, `email`, `token`, `created_at`) VALUES
(2, 'refardo@gmail.com', '$2y$10$lriUqOC3U3aUy6Sq9apBxOCuoe0umngfhyjKlHLfi8QezKr3JJn2q', '2018-10-06 10:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `replykomentarbarang`
--

CREATE TABLE `replykomentarbarang` (
  `idreply` int(11) NOT NULL,
  `idkomentar` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `replykomentar` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `replykomentarbarang`
--

INSERT INTO `replykomentarbarang` (`idreply`, `idkomentar`, `iduser`, `replykomentar`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'bener bro', '2018-10-06 12:53:31', '2018-10-06 05:53:31'),
(3, 5, 2, 'gini coy', '2018-10-06 07:37:35', '2018-10-06 07:37:35'),
(4, 1, 2, 'oyi', '2018-10-06 08:02:28', '2018-10-06 08:02:28'),
(6, 5, 1, 'okay siap akmj', '2018-10-06 09:36:33', '2018-10-06 09:36:33'),
(8, 7, 6, 'saya mau beli soalnya', '2018-10-06 10:30:14', '2018-10-06 10:30:14');

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
(1, 2, 'refardo', 'refardo@gmail.com', '$2y$10$vvIaNHQGGCos12itINZ7YOyuuPSLTOQG5hMVfmghPpZsdYn.LGtKe', 'TATgRdE1sdS1e9a5xH8XdsFbWbIKk0j4KR8grpaFwD4L0zP78QwR0K33suLz', '2018-09-27 05:30:08', '2018-09-27 05:36:50'),
(2, 1, 'theadmin', 'admin@mail.com', '$2y$10$nm.NbTjvplxCKUtx82NOxOLld46g5mOeo00c1oo/1bxh9HLG0iivm', 'CJvvin2yJBvwNxctUtakMIqFO5fmVQWJbagZEZ56DKas6UTBKxoxkrb119q0', '2018-09-27 05:38:34', '2018-09-27 05:38:34'),
(6, 2, 'Masedo', 'refardo@google.com', '$2y$10$u3U9yNivasZJ86qe7DU6bufNtv226ln3rmxsIC6wWK3fGtdPBjA5a', 'zriNZcfAURsDPPfH9DUo6ngIgCWmWVGVLbAPuJg0Qy9aTWKs0irvVzJHR4ew', '2018-10-02 02:28:10', '2018-10-02 02:28:10'),
(7, 2, 'Joseph', 'tesbro@mail.com', '$2y$10$p.fUKjslUKF6uGItVJN1guboEEJBm6jUmi2JHMuzOpeqCDNOMoEcW', 'Q5XPQCn3YPKM8RcYWzBzIIsJYURxzMgXUOOu6VSs6BJCsX1WvPDqOsA03nkD', '2018-10-02 02:28:59', '2018-10-02 02:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `barang_ibfk_1` (`idjenis`);

--
-- Indexes for table `buktitransfer`
--
ALTER TABLE `buktitransfer`
  ADD PRIMARY KEY (`idbtransfer`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`idcheckout`);

--
-- Indexes for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `userdata` (`iduser`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `komentarbarang`
--
ALTER TABLE `komentarbarang`
  ADD PRIMARY KEY (`idkomentar`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`idresets`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `replykomentarbarang`
--
ALTER TABLE `replykomentarbarang`
  ADD PRIMARY KEY (`idreply`),
  ADD KEY `komenid` (`idkomentar`),
  ADD KEY `replyuserid` (`iduser`);

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `buktitransfer`
--
ALTER TABLE `buktitransfer`
  MODIFY `idbtransfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `idcheckout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `detailuser`
--
ALTER TABLE `detailuser`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentarbarang`
--
ALTER TABLE `komentarbarang`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `idresets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `replykomentarbarang`
--
ALTER TABLE `replykomentarbarang`
  MODIFY `idreply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idjenis`) REFERENCES `jenisbarang` (`idjenis`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD CONSTRAINT `userdata` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarbarang`
--
ALTER TABLE `komentarbarang`
  ADD CONSTRAINT `komentarbarang_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarbarang_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `barangid` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replykomentarbarang`
--
ALTER TABLE `replykomentarbarang`
  ADD CONSTRAINT `komenid` FOREIGN KEY (`idkomentar`) REFERENCES `komentarbarang` (`idkomentar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replyuserid` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
