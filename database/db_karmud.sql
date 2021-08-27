-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 04:49 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karmud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `thumbnail` varchar(40) NOT NULL,
  `isi_berita` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `publish_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `thumbnail`, `isi_berita`, `id_user`, `publish_at`) VALUES
(3, 'Berita Karang Taruna', 'c214baf0ae802d831d5da7f5330948f8.png', '<p>Ini adalah Isi dari berita seputar karang taruna karyamuda. Berikut adalah web karang taruna Karya muda</p><p>Klik link ini <a href=\"http://karyamuda.id\">Karang Taruna Karya Muda</a></p><p>Ini Berubah menjadi <a href=\"http://karyamuda.com\">Karya Muda Link</a></p><p>Ini Dari <a href=\"http://fahru.id\">Fahru</a></p><p>ini dari <a href=\"http://ilyas.id\">ilyas</a></p><p>ini <a href=\"http://hanza.id\">hanza</a></p><p>ini <a href=\"http://fadil.id\">fadil</a></p>', 12, '2021-08-27 19:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Superadmin'),
(2, 'Ketua'),
(3, 'Wakil Ketua'),
(4, 'Sekretaris'),
(5, 'Bendahara'),
(6, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_kas` varchar(1) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keuangan`
--

INSERT INTO `tb_keuangan` (`id_keuangan`, `jumlah`, `jenis_kas`, `keterangan`, `tanggal`, `id_user`) VALUES
(11, 100000, 'M', 'Uang Masuk', '2021-08-27 14:10:48', 1),
(13, 10000, 'K', 'Keluar', '2021-08-27 19:28:08', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings`
--

CREATE TABLE `tb_settings` (
  `settings_id` int(11) NOT NULL,
  `nama_kartun` varchar(25) NOT NULL,
  `logo_kartun` varchar(25) NOT NULL,
  `logo_sidebar` varchar(25) NOT NULL,
  `background_login` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_settings`
--

INSERT INTO `tb_settings` (`settings_id`, `nama_kartun`, `logo_kartun`, `logo_sidebar`, `background_login`) VALUES
(1, 'Karya Muda', 'logo.png', 'logo-dashboard.png', 'login.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `keterangan_surat` varchar(128) NOT NULL,
  `tanggal_surat` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `no_surat`, `keterangan_surat`, `tanggal_surat`, `id_user`) VALUES
(3, '001/KTKM/VIII/2021', 'Undangan Pengajian Aja', '2021-08-27 19:16:33', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_template_surat`
--

CREATE TABLE `tb_template_surat` (
  `id_template_surat` int(11) NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `nama_template` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_template_surat`
--

INSERT INTO `tb_template_surat` (`id_template_surat`, `nama_surat`, `nama_template`) VALUES
(5, 'Contoh Template Aja', 'Contoh_Template.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `foto`, `status`, `created_at`, `updated_at`, `id_jabatan`) VALUES
(1, 'mfh_27', '$2y$10$Mpeqa/3ZFxkWjVk2yKtSr.8B7y7v3yeXXttf3yho/Y7hVNFbqiDmu', 'Muhammad Ilham Fhadilah', 'Kp. Setu Rt. 02 Rw. 01 No. 113, Kel. Buaran', 'L', 'f62a5ade2f5f5e9d7b71fe142d4e7a83.jpg', 1, '2021-08-22 16:43:01', '2021-08-24 20:33:05', 1),
(8, 'fahru', '$2y$10$Nu6jUFbIbAma3/xQk6.aJ.r/PMpbaemQNHlCWclRHXoh./hCB1bJa', 'Muhammad Fahru Roji', 'viktor 21', 'L', '149601831a8d6d90082f65bf15626998.png', 1, '2021-08-27 14:45:00', '2021-08-27 18:38:59', 2),
(9, 'ilyas', '$2y$10$fTXYqYa8FVjTQu.FX.mbp.hM8/9OiiXxp3J2U6hEiEiKrtLML74de', 'Ilyas Mubasir', 'Viktor', 'L', 'fbd52c3b6b947108e55c2f67910bca73.jpg', 1, '2021-08-27 14:45:17', '2021-08-27 19:05:57', 4),
(10, 'sefri', '$2y$10$0SW2XDxg8ccLECKIvSzFCOQiuvN3WgEDefddPB/RPnrav369rapJu', 'Sefri Syamsudin', NULL, 'L', 'default.jpg', 1, '2021-08-27 18:48:02', '2021-08-27 18:48:02', 3),
(11, 'hanza', '$2y$10$ld026mzxwQklNxzdsUSbZOXLy6ZjJ6IADCSYfwjV3/9zcQwzQg9FC', 'Hanza Amanda', 'Viktor', 'P', 'default.jpg', 1, '2021-08-27 19:17:40', '2021-08-27 19:21:44', 5),
(12, 'fadil', '$2y$10$oehS3yciZI64g9AlqHObJ.qRVssV5rM5H5u8LfVl1G18cUWmXgKTa', 'Muhammad Rifki Fadilah', 'viktor', 'L', 'default.jpg', 1, '2021-08-27 19:36:53', '2021-08-27 19:39:14', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_settings`
--
ALTER TABLE `tb_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_template_surat`
--
ALTER TABLE `tb_template_surat`
  ADD PRIMARY KEY (`id_template_surat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_settings`
--
ALTER TABLE `tb_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_template_surat`
--
ALTER TABLE `tb_template_surat`
  MODIFY `id_template_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD CONSTRAINT `tb_keuangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `tb_surat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
