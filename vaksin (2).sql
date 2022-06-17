-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2022 at 11:58 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$slOxyJEHhQbLsI2KURZn8ujOJl6WSaSbgY8KSHC0cHn.iRSVrO1LO', 'alif', 'ramadhan', '2021-12-10 07:41:36', '2021-12-10 07:41:36'),
(3, 'effendi_ghazali', '$2y$10$PLMNjrIrXbv7LZC50ZvdpOavq9jb4Kmitum2aSle7dN0pWnVXBcHa', 'effendi', 'ghazali', '2021-12-29 04:59:51', '2021-12-29 04:59:51'),
(4, 'richard04', '$2y$10$TcjmxvwjPv4xYqZCUJLf.em396qzI3WkQR6Q7uPJoIljLM2qUzBU2', 'Richard', 'Simanjuntak', '2021-12-29 04:59:51', '2021-12-29 04:59:51'),
(5, 'santiwil', '$2y$10$mL4nuNxp3S9jhtXW7r3geutac36LMRxVtOmfdG1SG.bD9u.ejY2tW', 'Santi', 'Wilhelmina', '2021-12-29 04:59:51', '2021-12-29 04:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_center`
--

CREATE TABLE `admin_center` (
  `id_user_center` bigint(20) NOT NULL,
  `center_id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `status_admin` enum('aktif','nonaktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_center`
--

INSERT INTO `admin_center` (`id_user_center`, `center_id`, `username`, `password`, `first_name`, `last_name`, `status_admin`, `created_at`, `updated_at`) VALUES
(3, 1, 'admincenter', '$2y$10$43SQWXssSB3hdIBeQy5Q6OILOSyksXrrOUm8yLDDRU7Cw0YhdOBcK', 'admin', 'center', '', '2021-12-16 03:19:58', '2021-12-16 03:19:58'),
(4, 2, 'adminc', '$2y$10$UmJmAU2Yw16ke9lypQeWlO5ZV/3ht9Yr3Z/bRhn/kAGTfvmEUjmEG', 'adadadada', 'awawawa', 'aktif', '2021-12-24 02:22:00', '2021-12-31 00:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `deskripsi`, `gambar`, `date`, `created_at`, `updated_at`) VALUES
(1, 'asdfasdf', 'asdfadf', 'CnO7OqR6Lg.png', '2021-12-16', '2021-12-16 03:11:20', '2021-12-15 20:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_vaksin`
--

CREATE TABLE `jadwal_vaksin` (
  `id_jadwal` bigint(20) NOT NULL,
  `center_id` bigint(20) NOT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_vaksin`
--

INSERT INTO `jadwal_vaksin` (`id_jadwal`, `center_id`, `tempat`, `tanggal`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alun alun bondowoso123', '2021-12-31', '14:14:00', '2021-12-31 07:25:37', '2021-12-31 00:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` bigint(20) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `center_id` bigint(20) DEFAULT NULL,
  `vac_status_id` int(2) NOT NULL DEFAULT '4',
  `password` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` bigint(13) NOT NULL,
  `umur` int(3) NOT NULL,
  `foto_peserta` varchar(50) DEFAULT 'default.png',
  `status_peserta` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nik`, `center_id`, `vac_status_id`, `password`, `first_name`, `last_name`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `kontak`, `umur`, `foto_peserta`, `status_peserta`, `created_at`, `updated_at`) VALUES
(1, 1234567887654321, 1, 2, '$2y$10$s4vBSIrNeaohTNWJ9.HNMuBghDMixtewjU6DFtGe0Q/n7bEuTs.kS', 'rayaaaaaa', 'jaya', '2003-11-14', 'bondowoso', 'jln ayani gang nol', 83111547153, 18, 'hbUNqk4PNipG00GhrZylJsQZw7G6YPZ8Vr7iNZNk.png', 'aktif', '2021-12-14 04:22:04', '2022-01-04 00:39:03'),
(3, 1234123412341234, 1, 2, '$2y$10$Hdg3NURPYMupb9q4MmG6suUYHe3100cCSTv1Ll8K9CNniETcWOZOq', 'alifr', 'ramadhan', '2003-11-14', 'bondowoso', 'adsfasdfasdfadsf\"', 83111547154, 18, 'default.png', 'aktif', '2021-12-27 07:40:31', '2022-01-02 03:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `report_vaksin`
--

CREATE TABLE `report_vaksin` (
  `id_reportv` bigint(20) NOT NULL,
  `jadwal_id` bigint(20) NOT NULL,
  `peserta_id` bigint(20) NOT NULL,
  `vaksin_id` int(11) NOT NULL,
  `vac_status_id` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_vaksin`
--

INSERT INTO `report_vaksin` (`id_reportv`, `jadwal_id`, `peserta_id`, `vaksin_id`, `vac_status_id`, `created_at`, `update_at`) VALUES
(2, 1, 1, 2, 2, '2022-01-02 05:58:52', '2022-01-02 05:58:52'),
(3, 1, 3, 2, 2, '2022-01-02 10:16:43', '2022-01-02 10:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `stok_center`
--

CREATE TABLE `stok_center` (
  `id_stok_center` bigint(20) NOT NULL,
  `center_id` bigint(20) NOT NULL,
  `vaksin_id` int(11) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_center`
--

INSERT INTO `stok_center` (`id_stok_center`, `center_id`, `vaksin_id`, `stok`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 7, '2021-12-16 07:54:55', '2022-01-02 03:16:43'),
(2, 2, 3, 40, '2021-12-27 03:58:56', '2021-12-26 23:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `id_management` int(11) NOT NULL,
  `role` enum('admin','peserta') NOT NULL DEFAULT 'peserta',
  `akses_index` int(11) NOT NULL,
  `akses_tambah` int(11) NOT NULL,
  `akses_edit` int(11) NOT NULL,
  `akses_hapus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`id_management`, `role`, `akses_index`, `akses_tambah`, `akses_edit`, `akses_hapus`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 1, 1, 1, '2021-12-21 02:02:53', '2021-12-21 02:02:53'),
(2, 'peserta', 1, 0, 1, 0, '2021-12-21 02:02:53', '2021-12-21 02:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `vac_status`
--

CREATE TABLE `vac_status` (
  `id_vac_status` int(2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vac_status`
--

INSERT INTO `vac_status` (`id_vac_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'belum vaksin', '2021-12-14 04:13:57', '2021-12-14 04:13:57'),
(2, 'dosis pertama', '2021-12-14 04:13:57', '2021-12-14 04:13:57'),
(3, 'dosis kedua', '2021-12-21 05:28:03', '2021-12-21 05:28:03'),
(4, 'tidak_diketahui', '2021-12-31 07:13:55', '2021-12-31 07:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `status_vaksin` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id_vaksin`, `brand`, `detail`, `status_vaksin`, `created_at`, `updated_at`) VALUES
(1, 'Sinovac13', 'lorem ipsum123', 'aktif', '2021-12-15 02:24:49', '2021-12-26 23:09:06'),
(2, 'astrea zeneca', 'lorem ipsum', 'aktif', '2021-12-15 02:32:19', '2021-12-15 02:32:19'),
(3, 'agus', 'asdfasdfadsf', 'aktif', '2021-12-27 06:07:46', '2021-12-27 06:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin_center`
--

CREATE TABLE `vaksin_center` (
  `id_center` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat_center` varchar(100) NOT NULL,
  `kontak_center` bigint(13) NOT NULL,
  `status_center` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaksin_center`
--

INSERT INTO `vaksin_center` (`id_center`, `nama`, `alamat_center`, `kontak_center`, `status_center`, `created_at`, `updated_at`) VALUES
(1, 'Rs bhayangkara', 'bondowoso', 1231231231235, 'aktif', '2021-12-13 04:30:25', '2021-12-14 17:56:19'),
(2, 'Rs Koesnadi', 'bondowoso', 83111547153, 'aktif', '2021-12-13 07:37:47', '2021-12-13 16:28:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_center`
--
ALTER TABLE `admin_center`
  ADD PRIMARY KEY (`id_user_center`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `jadwal_vaksin`
--
ALTER TABLE `jadwal_vaksin`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `kontak` (`kontak`),
  ADD KEY `center_id` (`center_id`),
  ADD KEY `vac_status_id` (`vac_status_id`);

--
-- Indexes for table `report_vaksin`
--
ALTER TABLE `report_vaksin`
  ADD PRIMARY KEY (`id_reportv`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `peserta_id` (`peserta_id`),
  ADD KEY `vaksin_id` (`vaksin_id`),
  ADD KEY `vac_status_id` (`vac_status_id`);

--
-- Indexes for table `stok_center`
--
ALTER TABLE `stok_center`
  ADD PRIMARY KEY (`id_stok_center`),
  ADD KEY `center_id` (`center_id`),
  ADD KEY `vaksin_id` (`vaksin_id`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`id_management`);

--
-- Indexes for table `vac_status`
--
ALTER TABLE `vac_status`
  ADD PRIMARY KEY (`id_vac_status`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- Indexes for table `vaksin_center`
--
ALTER TABLE `vaksin_center`
  ADD PRIMARY KEY (`id_center`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_center`
--
ALTER TABLE `admin_center`
  MODIFY `id_user_center` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_vaksin`
--
ALTER TABLE `jadwal_vaksin`
  MODIFY `id_jadwal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_vaksin`
--
ALTER TABLE `report_vaksin`
  MODIFY `id_reportv` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok_center`
--
ALTER TABLE `stok_center`
  MODIFY `id_stok_center` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `id_management` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vac_status`
--
ALTER TABLE `vac_status`
  MODIFY `id_vac_status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaksin_center`
--
ALTER TABLE `vaksin_center`
  MODIFY `id_center` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_center`
--
ALTER TABLE `admin_center`
  ADD CONSTRAINT `admin_center_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `vaksin_center` (`id_center`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_vaksin`
--
ALTER TABLE `jadwal_vaksin`
  ADD CONSTRAINT `jadwal_vaksin_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `vaksin_center` (`id_center`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `vaksin_center` (`id_center`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`vac_status_id`) REFERENCES `vac_status` (`id_vac_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_vaksin`
--
ALTER TABLE `report_vaksin`
  ADD CONSTRAINT `report_vaksin_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal_vaksin` (`id_jadwal`),
  ADD CONSTRAINT `report_vaksin_ibfk_2` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id_peserta`),
  ADD CONSTRAINT `report_vaksin_ibfk_3` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksin` (`id_vaksin`),
  ADD CONSTRAINT `report_vaksin_ibfk_4` FOREIGN KEY (`vac_status_id`) REFERENCES `vac_status` (`id_vac_status`);

--
-- Constraints for table `stok_center`
--
ALTER TABLE `stok_center`
  ADD CONSTRAINT `stok_center_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `vaksin_center` (`id_center`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_center_ibfk_2` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksin` (`id_vaksin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
