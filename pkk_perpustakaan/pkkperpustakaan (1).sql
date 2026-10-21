-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2026 at 09:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkkperpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbuku`
--

CREATE TABLE `tbuku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Tersedia',
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbuku`
--

INSERT INTO `tbuku` (`id_buku`, `judul`, `penulis`, `status`, `stok`, `gambar`) VALUES
(1, 'Matematika', 'lutpi', 'tersedia', 14, 'imgmtk.jpg'),
(6, 'Bahasa Inggris', 'Fauzan', 'tersedia', 13, 'img4.jpg'),
(7, 'IPA', 'Hasan', 'tersedia', 9, 'imgipa.jpg'),
(8, 'IPS', 'Zayn', 'Tersedia', 19, 'imgips.jpg'),
(9, 'Seni Budaya', 'Rendi', 'Tersedia', 20, 'imgsenibdy.jpg'),
(10, 'PJOK', 'Arya', 'tidak tersedia', 0, 'imgpjok.jpg'),
(11, 'TIK', 'Yattar', 'Tersedia', 20, 'imgtik.jpg'),
(12, 'PPKN', 'Anggar', 'Tersedia', 19, 'imgppkn.jpg'),
(13, 'Novel', 'Salinger', 'Tersedia', 19, 'img1.jpg'),
(25, 'Bahasa Indonesia', 'yayat', 'tersedia', 20, 'img3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tdetail_pinjam`
--

CREATE TABLE `tdetail_pinjam` (
  `id_detail` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tdetail_pinjam`
--

INSERT INTO `tdetail_pinjam` (`id_detail`, `id_pinjam`, `id_buku`, `tanggal_kembali`, `denda`) VALUES
(1, 5, 6, '2026-05-22', 0),
(2, 6, 1, '2026-05-22', 0),
(3, 7, 7, '2026-05-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tkeranjang`
--

CREATE TABLE `tkeranjang` (
  `IDKJ` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tpeminjaman`
--

CREATE TABLE `tpeminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `Alamat` text NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tpeminjaman`
--

INSERT INTO `tpeminjaman` (`id_pinjam`, `nama`, `Alamat`, `Telp`, `tanggal_pinjam`) VALUES
(1, 'wildN GEMOYH', 'Margaasih', '0888376553', '2026-05-20'),
(2, 'wildN GEMOYH', 'Margaasih', '0888376553', '2026-05-20'),
(3, 'wildN GEMOYH', 'Margaasih', '0888376553', '2026-05-20'),
(4, 'wildN GEMOYH', 'Margaasih', '0888376553', '2026-05-20'),
(7, 'fahri', 'Margaasih', '088865545', '2026-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '1', 'admin'),
(2, 'wildan', 'wildan', '1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbuku`
--
ALTER TABLE `tbuku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tdetail_pinjam`
--
ALTER TABLE `tdetail_pinjam`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  ADD PRIMARY KEY (`IDKJ`);

--
-- Indexes for table `tpeminjaman`
--
ALTER TABLE `tpeminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbuku`
--
ALTER TABLE `tbuku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tdetail_pinjam`
--
ALTER TABLE `tdetail_pinjam`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  MODIFY `IDKJ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tpeminjaman`
--
ALTER TABLE `tpeminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
