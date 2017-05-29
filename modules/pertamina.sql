-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2016 at 05:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamina`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio_penghuni`
--

CREATE TABLE `bio_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_kamar` int(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `kelola` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_penghuni`
--

INSERT INTO `bio_penghuni` (`id_penghuni`, `nama`, `email`, `no_telp`, `id_kamar`, `status`, `kelola`) VALUES
(1, 'Fadzilah', 'fadzilah@gmail.com', '1234567', 32, 'Supervisor', 'Kelola'),
(3, 'dadang', 'dadang@gmail.com', '123456', 7, 'Gudang', 'Aktif'),
(4, 'Raza', 'Raza@gmail.com', '089123121', 7, 'Kasir', 'Aktif'),
(6, 'Dataku', 'fadzilah397@gmail.com', '081212', 34, 'Kasir', 'Aktif'),
(12, 'anjar', 'anjar@gmail.com', '12345678', 35, 'Direktur', 'Aktif'),
(13, 'caridi', 'caridi@yahoo.com', '081321450', 23, 'Personalia', 'Aktif'),
(15, 'civil', 'civil@gmail.com', '089604049029', 34, 'Sekretatis', 'Aktif'),
(16, 'xavi', 'xavi@yahoo.com', '3241421', 34, 'pegawai', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `master_autodebet`
--

CREATE TABLE `master_autodebet` (
  `id_autodebet` int(11) NOT NULL,
  `nilai_autodebet` int(30) NOT NULL,
  `tgl_create` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_autodebet`
--

INSERT INTO `master_autodebet` (`id_autodebet`, `nilai_autodebet`, `tgl_create`, `status`) VALUES
(1, 150000, '20/12/2016', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `master_deposit`
--

CREATE TABLE `master_deposit` (
  `id_deposit` int(11) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `jml_deposit` varchar(30) NOT NULL,
  `tgl_create` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_kamar`
--

CREATE TABLE `master_kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` int(10) NOT NULL,
  `lantai` varchar(10) NOT NULL,
  `tipe_kamar` enum('VIP','FAMILY','Classic','Music') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kamar`
--

INSERT INTO `master_kamar` (`id_kamar`, `no_kamar`, `lantai`, `tipe_kamar`, `status`) VALUES
(7, 223, '2', 'VIP', 'Aktif'),
(23, 214, '2', 'VIP', 'Aktif'),
(33, 389, '3', 'VIP', 'Aktif'),
(34, 999, '9', 'Classic', 'Aktif'),
(35, 781, '7', 'FAMILY', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `master_meter`
--

CREATE TABLE `master_meter` (
  `mid` varchar(20) NOT NULL,
  `idpel` int(15) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `phase` enum('1 Phase','3 Phase') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_meter`
--

INSERT INTO `master_meter` (`mid`, `idpel`, `ip`, `phase`, `status`) VALUES
('123', 121, '172.192.168.10.1', '3 Phase', 'Aktif'),
('4252', 325253, '172.16.15.1', '1 Phase', 'Aktif'),
('563112', 792491, '172.16.15.130', '1 Phase', 'Aktif'),
('665', 452523, '196.165.1.2', '3 Phase', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `master_subsidi`
--

CREATE TABLE `master_subsidi` (
  `id_subsidi` int(11) NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `jml_subsidi` varchar(30) NOT NULL,
  `tgl_create` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `id_autodebet` int(11) NOT NULL,
  `mid` varchar(20) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `nilai_deposit` varchar(30) NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_kamar`, `id_penghuni`, `id_autodebet`, `mid`, `tgl_masuk`, `tgl_keluar`, `nilai_deposit`, `status`) VALUES
(1, 1, 1, 1, '123', '10/11/2016', '12/11/12016', '30.000', 'Kelola'),
(5, 0, 0, 0, '', '2016-10-22', '2016-10-24', '65000', NULL),
(6, 0, 0, 0, '', '2016-10-23', '2016-10-26', '150000', NULL),
(7, 0, 0, 0, '', '2016-10-23', '2016-10-27', '720000', NULL),
(8, 0, 0, 0, '', '2016-10-23', '2016-10-28', '85000', NULL),
(9, 0, 0, 0, '', '2016-10-24', '2016-10-26', '320000', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio_penghuni`
--
ALTER TABLE `bio_penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `id_penghuni` (`id_penghuni`);

--
-- Indexes for table `master_autodebet`
--
ALTER TABLE `master_autodebet`
  ADD PRIMARY KEY (`id_autodebet`);

--
-- Indexes for table `master_deposit`
--
ALTER TABLE `master_deposit`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `master_kamar`
--
ALTER TABLE `master_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `master_meter`
--
ALTER TABLE `master_meter`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `master_subsidi`
--
ALTER TABLE `master_subsidi`
  ADD PRIMARY KEY (`id_subsidi`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kamar` (`id_kamar`,`id_penghuni`,`id_autodebet`,`mid`),
  ADD KEY `id_kamar_2` (`id_kamar`,`id_penghuni`,`id_autodebet`,`mid`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `id_autodebet` (`id_autodebet`),
  ADD KEY `mid` (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bio_penghuni`
--
ALTER TABLE `bio_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `master_autodebet`
--
ALTER TABLE `master_autodebet`
  MODIFY `id_autodebet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_deposit`
--
ALTER TABLE `master_deposit`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_kamar`
--
ALTER TABLE `master_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `master_subsidi`
--
ALTER TABLE `master_subsidi`
  MODIFY `id_subsidi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
