-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Okt 2018 pada 08.59
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `idjenis`, `deskripsi`, `stok`, `hargabarang`, `gambarbarang`) VALUES
(4, 'Piringan Hitam Corak Batik', 1, 'Piringan hitam berhias corak batik dan manik-manik', 16, 100000, 'download.jpg'),
(5, 'Keranjang Sampah', 2, 'Keranjang Sampah era modern', 291, 300000, 'maxresdefault.jpg'),
(6, 'Gambar Waterfall', 2, 'Gambar Coretan Grup Band Oasis', 0, 50000, 'waterfall-thac-dray-nur-buon-me-thuot-daklak-68147.jpeg'),
(7, 'Mencoba', 2, 'Tes', 1, 90000, 'pexels-photo-206673.jpeg'),
(9, 'a', 1, 'a', 1, 1, ''),
(10, 'b', 1, '2', 2, 2, ''),
(11, 'c', 1, 'c', 3, 3, ''),
(12, 'd', 1, 'd', 4, 4, ''),
(13, 'e', 1, 'e', 5, 5, ''),
(14, 'awda', 1, '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890', 1, 10, '_20151020_20560124102018133534.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailuser`
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
-- Dumping data untuk tabel `detailuser`
--

INSERT INTO `detailuser` (`iddetail`, `iduser`, `namalengkap`, `alamat`, `nomorponsel`, `avatar`) VALUES
(1, 1, 'Refardo', 'Jl. Kenongo raya', '08546512354', NULL),
(2, 2, 'Admin', 'Jl.Tes 1', '083851016002', 'blank-profile-picture-973460_960_720.png'),
(3, 6, 'Masedo', 'nganu', '085465412326', 'blank-profile-picture-973460_960_720.png'),
(4, 7, 'Josep', 'Jl. Coba tes', '089832192877', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `idjenis` int(11) NOT NULL,
  `jenisbarang` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`idjenis`, `jenisbarang`) VALUES
(1, 'Batik'),
(2, 'Dekorasi Ruangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarbarang`
--

CREATE TABLE `komentarbarang` (
  `idkomentar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `komentar` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `komentarbarang`
--

INSERT INTO `komentarbarang` (`idkomentar`, `idbarang`, `iduser`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'blablabla', '2018-10-05 13:02:56', '0000-00-00 00:00:00'),
(2, 5, 2, 'tessss', '2018-10-05 13:02:56', '0000-00-00 00:00:00'),
(4, 7, 7, 'ngetes', '2018-10-05 13:02:56', '0000-00-00 00:00:00'),
(5, 4, 2, 'nganu', '2018-10-05 13:15:12', '2018-10-05 06:15:12'),
(7, 6, 6, 'bang buruan di-update dong stoknya', '2018-10-06 10:29:56', '2018-10-06 10:29:56'),
(8, 5, 7, 'nganuu', '2018-10-23 13:36:46', '2018-10-23 13:36:46'),
(9, 9, 7, 'jvhvjh', '2018-10-23 13:29:59', '2018-10-23 13:29:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `idresets` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`idresets`, `email`, `token`, `created_at`) VALUES
(2, 'refardo@gmail.com', '$2y$10$lriUqOC3U3aUy6Sq9apBxOCuoe0umngfhyjKlHLfi8QezKr3JJn2q', '2018-10-06 10:16:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `statusverif` tinyint(1) NOT NULL,
  `buktibayar` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `idbarang`, `iduser`, `jumlahbarang`, `statusverif`, `buktibayar`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 30, 1, 'vcredist19102018220614.bmp', '2018-10-19 15:43:39', '2018-10-19 15:43:39'),
(9, 4, 7, 2, 1, 'Pemandangan-Alam-Terindah-di-Indonesia21102018234038.jpg', '2018-10-21 16:44:49', '2018-10-21 16:44:49'),
(14, 7, 1, 5, 1, '750x500-wisatawan-mancanegara-asik-ngopi-di-festival-kopi-sepuluh-ewu-161106924102018135514.jpg', '2018-10-24 06:55:59', '2018-10-24 06:55:59'),
(16, 4, 1, 2, 1, '692851-1000xauto-bec24102018135534.jpg', '2018-10-24 06:56:01', '2018-10-24 06:56:01'),
(18, 5, 7, 9, 1, 'idtbi-2015_fe383c823102018205809.jpg', '2018-10-23 13:59:02', '2018-10-23 13:59:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `replykomentarbarang`
--

CREATE TABLE `replykomentarbarang` (
  `idreply` int(11) NOT NULL,
  `idkomentar` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `replykomentar` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `replykomentarbarang`
--

INSERT INTO `replykomentarbarang` (`idreply`, `idkomentar`, `iduser`, `replykomentar`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'bener bro', '2018-10-06 12:53:31', '2018-10-06 05:53:31'),
(3, 5, 2, 'gini coy', '2018-10-06 07:37:35', '2018-10-06 07:37:35'),
(4, 1, 2, 'oyi', '2018-10-06 08:02:28', '2018-10-06 08:02:28'),
(6, 5, 1, 'okay siap akmj', '2018-10-06 09:36:33', '2018-10-06 09:36:33'),
(8, 7, 6, 'saya mau beli soalnya', '2018-10-06 10:30:14', '2018-10-06 10:30:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'refardo', 'refardo@gmail.com', '$2y$10$vvIaNHQGGCos12itINZ7YOyuuPSLTOQG5hMVfmghPpZsdYn.LGtKe', 'UNKdQoXgS7uX8rfyCNfyAgMcoZSVlnvNgcPQNjcYM0o3hQLVyO9FIvJVx1HV', '2018-09-27 05:30:08', '2018-09-27 05:36:50'),
(2, 1, 'theadmin', 'admin@mail.com', '$2y$10$nm.NbTjvplxCKUtx82NOxOLld46g5mOeo00c1oo/1bxh9HLG0iivm', 'KyVPlCyp9K0E7jVbedR1s5Vp4JeIayh6a8H4TI2tlIxH8xYBMnEiQD5qCJYe', '2018-09-27 05:38:34', '2018-09-27 05:38:34'),
(6, 2, 'Masedo', 'refardo@google.com', '$2y$10$u3U9yNivasZJ86qe7DU6bufNtv226ln3rmxsIC6wWK3fGtdPBjA5a', '4B8sOLw5pfNjIulKhwvbB2uijfDxvbSwHZd8MTuHnbsfXTnBbace5l2Xl11h', '2018-10-02 02:28:10', '2018-10-02 02:28:10'),
(7, 2, 'Joseph', 'tesbro@mail.com', '$2y$10$p.fUKjslUKF6uGItVJN1guboEEJBm6jUmi2JHMuzOpeqCDNOMoEcW', 'ggoSHqO4qeHy4VQewrwy0hyU060rEHwSzGnTfYU4HsMdN1S2wKZfgxImXwyz', '2018-10-02 02:28:59', '2018-10-02 02:28:59');

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idjenis`) REFERENCES `jenisbarang` (`idjenis`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailuser`
--
ALTER TABLE `detailuser`
  ADD CONSTRAINT `userdata` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarbarang`
--
ALTER TABLE `komentarbarang`
  ADD CONSTRAINT `komentarbarang_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarbarang_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `barangid` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `replykomentarbarang`
--
ALTER TABLE `replykomentarbarang`
  ADD CONSTRAINT `komenid` FOREIGN KEY (`idkomentar`) REFERENCES `komentarbarang` (`idkomentar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replyuserid` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
