-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 07:11 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krplweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` varchar(15) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kd_pegawai` varchar(50) NOT NULL,
  `status_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`, `password`, `kd_pegawai`, `status_petugas`) VALUES
('2020', 'admin', '202cb962ac59075b964b07152d234b70', '16', 'admin'),
('PET009', 'user', '202cb962ac59075b964b07152d234b70', '202', 'user'),
('PET010', 'Amy', '7815696ecbf1c96e6894b779456d330e', '13', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `kd_produk` varchar(11) NOT NULL,
  `nama_prdk` varchar(50) NOT NULL,
  `jenis_prdk` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`kd_produk`, `nama_prdk`, `jenis_prdk`, `harga`, `gambar`) VALUES
('P0001', 'Jus Wortel', 'Minuman', '10000', ''),
('P0002', 'Jus Tomat', 'Minuman', '10000', ''),
('P0003', 'Keripik Bayam', 'Makanan', '5000', ''),
('P0004', 'Keripik Singkong', 'Makanan', '5000', ''),
('P0005', 'Nuget Tahu', 'Makanan', '20000', ''),
('P0006', 'Pisang', 'Makanan', '7500', ''),
('P0008', 'e', 'Makanan', 'e', 'krpl.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `kd_jenis` varchar(15) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`kd_jenis`, `nama_jenis`) VALUES
('J1', 'Makanan'),
('J2', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `no` int(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jam_msk` varchar(20) NOT NULL,
  `jam_klr` varchar(20) NOT NULL,
  `tgl_msk` date NOT NULL,
  `tgl_klr` varchar(20) NOT NULL,
  `status_log` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`no`, `username`, `jam_msk`, `jam_klr`, `tgl_msk`, `tgl_klr`, `status_log`) VALUES
(102, 'admin', '17:13:51', '19:18:58', '2018-03-19', '2018-03-19', 'offline'),
(103, 'user', '18:54:57', '19:18:58', '2018-03-19', '2018-03-19', 'offline'),
(104, 'admin', '19:35:59', '19:48:57', '2018-03-20', '2018-03-20', 'offline'),
(105, 'user', '19:49:29', '19:50:41', '2018-03-20', '2018-03-20', 'offline'),
(106, 'admin', '19:52:15', '19:56:10', '2018-03-20', '2018-03-20', 'offline'),
(107, 'admin', '19:56:16', '23:40:17', '2018-03-20', '2018-03-20', 'offline'),
(108, 'user', '23:42:00', '16:49:34', '2018-03-20', '2018-03-22', 'offline'),
(109, 'admin', '14:13:29', '16:49:34', '2018-03-22', '2018-03-22', 'offline'),
(110, 'admin', '17:02:01', '18:31:42', '2018-03-22', '2018-03-22', 'offline'),
(111, 'user', '18:31:52', '23:06:33', '2018-03-22', '2018-03-22', 'offline'),
(112, 'admin', '23:06:40', '02:51:16', '2018-03-22', '2018-04-07', 'offline'),
(113, 'admin', '17:51:19', '02:51:16', '2018-03-23', '2018-04-07', 'offline'),
(114, 'admin', '17:53:02', '02:51:16', '2018-03-26', '2018-04-07', 'offline'),
(115, 'admin', '19:16:28', '02:51:16', '2018-03-26', '2018-04-07', 'offline'),
(116, 'admin', '16:00:15', '02:51:16', '2018-03-27', '2018-04-07', 'offline'),
(117, 'user', '16:17:08', '02:51:16', '2018-03-27', '2018-04-07', 'offline'),
(118, 'admin', '19:03:05', '02:51:16', '2018-03-27', '2018-04-07', 'offline'),
(119, 'admin', '21:01:10', '02:51:16', '2018-03-27', '2018-04-07', 'offline'),
(120, 'admin', '22:48:38', '02:51:16', '2018-03-27', '2018-04-07', 'offline'),
(121, 'admin', '00:06:15', '02:51:16', '2018-03-28', '2018-04-07', 'offline'),
(122, 'admin', '03:27:18', '02:51:16', '2018-03-28', '2018-04-07', 'offline'),
(123, 'admin', '02:35:53', '02:51:16', '2018-04-07', '2018-04-07', 'offline'),
(124, 'admin', '13:03:30', '20:22:14', '2018-04-10', '2018-04-24', 'offline'),
(125, 'user', '13:05:18', '20:22:14', '2018-04-10', '2018-04-24', 'offline'),
(126, 'admin', '18:01:30', '20:22:14', '2018-04-19', '2018-04-24', 'offline'),
(127, 'user', '18:02:55', '20:22:14', '2018-04-19', '2018-04-24', 'offline'),
(128, 'admin', '20:17:05', '20:22:14', '2018-04-24', '2018-04-24', 'offline'),
(129, 'user', '20:17:53', '20:22:14', '2018-04-24', '2018-04-24', 'offline'),
(130, 'user', '20:22:33', '20:58:49', '2018-04-24', '2018-04-24', 'offline'),
(131, 'admin', '20:59:15', 'logged', '2018-04-24', '---', 'online'),
(132, 'user', '21:05:22', 'logged', '2018-04-24', '---', 'online'),
(133, 'admin', '08:28:24', 'logged', '2018-04-30', '---', 'online'),
(134, 'admin', '09:52:09', 'logged', '2018-04-30', '---', 'online'),
(135, 'admin', '11:58:47', 'logged', '2018-05-17', '---', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_produk`
--

CREATE TABLE `permintaan_produk` (
  `kd_perm` int(11) NOT NULL,
  `kd_produk` varchar(7) NOT NULL,
  `jumlah_perm` int(10) NOT NULL,
  `tgl_perm` date NOT NULL,
  `waktu` time NOT NULL,
  `keperluan_perm` varchar(100) NOT NULL,
  `status_perm` varchar(15) NOT NULL,
  `id_petugas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_produk`
--

INSERT INTO `permintaan_produk` (`kd_perm`, `kd_produk`, `jumlah_perm`, `tgl_perm`, `waktu`, `keperluan_perm`, `status_perm`, `id_petugas`) VALUES
(54, 'P0002', 3, '2018-03-15', '05:17:59', 'kirim', 'Ditolak', 'user'),
(55, 'P0004 ', 30, '2018-03-18', '08:38:19', 'Dari amang', 'Diterima', 'admin = admin'),
(56, 'P0004 ', 12, '2018-03-20', '11:14:33', 'Acara Amal', 'Diterima', 'admin = admin'),
(63, 'P0002', 4, '2018-04-10', '08:09:59', 'ad', 'Diterima', 'user'),
(65, 'P0004 ', 43, '2018-04-26', '08:05:49', 'ggggg', 'Diterima', 'user = <?php ec');

-- --------------------------------------------------------

--
-- Table structure for table `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `kd_keluar` int(11) NOT NULL,
  `kd_produk` varchar(7) NOT NULL,
  `jumlah_prdk` int(10) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_petugas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_keluar`
--

INSERT INTO `produk_keluar` (`kd_keluar`, `kd_produk`, `jumlah_prdk`, `keperluan`, `tanggal_keluar`, `status`, `id_petugas`) VALUES
(26, 'P0004 ', 12, 'Acara Amal', '2018-03-20', 'DITERIMA', 'admin = admin'),
(27, 'P0004 ', 30, 'Dari amang', '2018-03-20', 'DITERIMA', 'admin = admin'),
(28, 'P0003 ', 9, '', '2018-03-27', 'DITERIMA', 'admin = admin'),
(31, 'P0002', 4, 'ad', '2018-04-26', 'DITERIMA', 'user'),
(32, 'P0004 ', 43, 'ggggg', '2018-04-26', 'DITERIMA', 'user = <?php ec');

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `no` int(11) NOT NULL,
  `kd_produk` varchar(7) NOT NULL,
  `jumlah_msk` int(15) NOT NULL,
  `harga_msk` int(10) NOT NULL,
  `tanggal_msk` date NOT NULL,
  `total_harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`no`, `kd_produk`, `jumlah_msk`, `harga_msk`, `tanggal_msk`, `total_harga`) VALUES
(38, 'P0004', 20, 5000, '2018-03-20', 100000),
(39, 'P0002', 10, 10000, '2018-03-20', 100000),
(40, 'P0001', 40, 10000, '2018-03-20', 400000),
(41, 'P0003', 30, 6000, '2018-03-20', 180000);

-- --------------------------------------------------------

--
-- Table structure for table `status_petugas`
--

CREATE TABLE `status_petugas` (
  `no_status` varchar(15) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_petugas`
--

INSERT INTO `status_petugas` (`no_status`, `nama_status`) VALUES
('S01', 'admin'),
('S03', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `jenis_brg` (`jenis_prdk`),
  ADD KEY `jenis_brg_2` (`jenis_prdk`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`no`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `permintaan_produk`
--
ALTER TABLE `permintaan_produk`
  ADD PRIMARY KEY (`kd_perm`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `kd_barang` (`kd_produk`);

--
-- Indexes for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`kd_keluar`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_barang` (`kd_produk`);

--
-- Indexes for table `status_petugas`
--
ALTER TABLE `status_petugas`
  ADD PRIMARY KEY (`no_status`),
  ADD UNIQUE KEY `nama_status` (`nama_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `no` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `permintaan_produk`
--
ALTER TABLE `permintaan_produk`
  MODIFY `kd_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
