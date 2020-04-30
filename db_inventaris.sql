-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 07:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_atk`
--

CREATE TABLE `master_jenis_atk` (
  `id_jenis_atk` int(11) NOT NULL,
  `nama_jenis_atk` varchar(100) NOT NULL,
  `kode_jenis_atk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jenis_atk`
--

INSERT INTO `master_jenis_atk` (`id_jenis_atk`, `nama_jenis_atk`, `kode_jenis_atk`) VALUES
(1, 'Kertas A4 80 gram', 'KRTSA480');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_hardware`
--

CREATE TABLE `master_jenis_hardware` (
  `id_jenis_hardware` int(11) NOT NULL,
  `nama_jenis_hardware` varchar(100) NOT NULL,
  `kode_jenis_hardware` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jenis_hardware`
--

INSERT INTO `master_jenis_hardware` (`id_jenis_hardware`, `nama_jenis_hardware`, `kode_jenis_hardware`) VALUES
(3, 'Keyboard', 'KYBRD');

-- --------------------------------------------------------

--
-- Table structure for table `master_komputer`
--

CREATE TABLE `master_komputer` (
  `id_komputer` int(11) NOT NULL,
  `nama_pc` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `graphic_card` varchar(100) NOT NULL,
  `penyimpanan` varchar(100) NOT NULL,
  `foto_komputer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_komputer`
--

INSERT INTO `master_komputer` (`id_komputer`, `nama_pc`, `processor`, `ram`, `graphic_card`, `penyimpanan`, `foto_komputer`) VALUES
(1, 'PC-01', 'Intel Core I5-10110U', '8 GB', 'Intel UHD Graphic', '1 TB', 'Komputer_kantor_siap_kerja.jpg'),
(3, 'PC-03', 'Intel Atom', '2 GB', 'Intel Graphic', 'Harddisk 500 GB', 'komputer.png'),
(4, 'PC-02', 'Intel Atom', '8 GB', 'Intel UHD Graphic 620', 'Harddisk 1 TB', 'komputer.png');

-- --------------------------------------------------------

--
-- Table structure for table `master_stok_atk`
--

CREATE TABLE `master_stok_atk` (
  `id_stok` int(11) NOT NULL,
  `kode_atk` varchar(100) NOT NULL,
  `nama_atk` varchar(100) NOT NULL,
  `merk_atk` varchar(100) NOT NULL,
  `jenis_atk` varchar(100) NOT NULL,
  `stok_atk` int(11) NOT NULL,
  `foto_atk` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_stok_atk`
--

INSERT INTO `master_stok_atk` (`id_stok`, `kode_atk`, `nama_atk`, `merk_atk`, `jenis_atk`, `stok_atk`, `foto_atk`, `date_created`, `date_updated`) VALUES
(2, '31/23/2323', 'Kertas A4 Sidu', 'Sidu 80 Gram', 'Kertas A4 80 gram', 0, 'kertas.jpg', '2020-04-27 20:39:35', '2020-04-27 20:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `master_stok_hardware`
--

CREATE TABLE `master_stok_hardware` (
  `id_stok` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merk_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `kondisi_barang` enum('Baik','Rusak') NOT NULL,
  `foto_barang` varchar(150) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_stok_hardware`
--

INSERT INTO `master_stok_hardware` (`id_stok`, `kode_barang`, `nama_barang`, `merk_barang`, `jenis_barang`, `kondisi_barang`, `foto_barang`, `date_created`, `date_updated`) VALUES
(5, '31/00001/KYBRD/001', 'Keyboard Logitech', 'Rezer', 'Keyboard', 'Baik', 'rezer.jpg', '2020-04-26 19:05:40', '2020-04-26 19:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `username`, `password`, `date_created`) VALUES
(1, 'Asisten Laboratorium Komputer Lanjut', 'admin', '$2y$10$KCwxlkLbD1aS1FdujbFkgONVl9SowB1bv.koNDDxKybo8k05RpgiW', '2020-04-24 00:08:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_jenis_atk`
--
ALTER TABLE `master_jenis_atk`
  ADD PRIMARY KEY (`id_jenis_atk`);

--
-- Indexes for table `master_jenis_hardware`
--
ALTER TABLE `master_jenis_hardware`
  ADD PRIMARY KEY (`id_jenis_hardware`);

--
-- Indexes for table `master_komputer`
--
ALTER TABLE `master_komputer`
  ADD PRIMARY KEY (`id_komputer`);

--
-- Indexes for table `master_stok_atk`
--
ALTER TABLE `master_stok_atk`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `master_stok_hardware`
--
ALTER TABLE `master_stok_hardware`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_jenis_atk`
--
ALTER TABLE `master_jenis_atk`
  MODIFY `id_jenis_atk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_jenis_hardware`
--
ALTER TABLE `master_jenis_hardware`
  MODIFY `id_jenis_hardware` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_komputer`
--
ALTER TABLE `master_komputer`
  MODIFY `id_komputer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_stok_atk`
--
ALTER TABLE `master_stok_atk`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_stok_hardware`
--
ALTER TABLE `master_stok_hardware`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
