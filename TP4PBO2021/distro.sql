-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 06:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fach`
--

-- --------------------------------------------------------

--
-- Table structure for table `distro`
--

CREATE TABLE `distro` (
  `kode_produk` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `ukuran` varchar(3) NOT NULL,
  `alamat_toko` varchar(455) NOT NULL,
  `status_layak_jual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distro`
--

INSERT INTO `distro` (`kode_produk`, `jenis`, `warna`, `ukuran`, `alamat_toko`, `status_layak_jual`) VALUES
(8, 'Kaos', 'Kuning', 'XL', 'Jl. Geger arum baru no.115', 'Belum Layak'),
(70, 'Jas Hujan', 'Hijau', 'L', 'geger arum hujan terus', 'Sudah Layak'),
(90, 'Sweater', 'Hitam', 'L', 'Jl. aceh kab. bandung', 'Belum Layak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distro`
--
ALTER TABLE `distro`
  ADD PRIMARY KEY (`kode_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
