-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 07:46 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kimia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(20) NOT NULL,
  `nama` char(100) NOT NULL,
  `sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `sandi`) VALUES
(1, 'tukimia', 'kimia2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bimbing`
--

CREATE TABLE `tb_bimbing` (
  `id_bimbing` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bimbing`
--

INSERT INTO `tb_bimbing` (`id_bimbing`, `id_dosen`, `id_mhs`) VALUES
(13, 1, 1508605004),
(15, 1, 1508605004),
(17, 1, 1508605004),
(18, 2, 1508605004);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(20) NOT NULL,
  `nama` char(100) NOT NULL,
  `nidn` char(30) NOT NULL,
  `nik` char(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` char(20) NOT NULL,
  `id_golongan` int(20) NOT NULL,
  `max_bimbing` int(11) NOT NULL,
  `max_uji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama`, `nidn`, `nik`, `alamat`, `kontak`, `id_golongan`, `max_bimbing`, `max_uji`) VALUES
(1, 'Dr. I Dewa Gede Budiastawa, S.Kom., M.Kom.', '1508605002', '1508605002', 'Samplangan, Gianyar ', '089635922035', 1, 3, 3),
(2, 'rani', '8676', '686', 'gianyar', '687576576', 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(20) NOT NULL,
  `golongan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `golongan`) VALUES
(1, 'IV/e Pembina Utama'),
(2, 'IV/d Pembina Utama Madya'),
(3, 'IV/c Pembina Utama Madya'),
(4, 'IV/b Pembina Tingkat I'),
(5, 'IV/a Pembina'),
(6, 'III/d Penata Tingkat I'),
(7, 'III/c Penata'),
(8, 'III/b Penata Muda Tingkat I'),
(9, 'III/a Penata Muda'),
(10, 'II/d Pengatur Tingkat I'),
(11, 'II/c Pengatur'),
(12, 'II/b Pengatur Muda Tingkat I'),
(13, 'II/a Pengatur Muda'),
(14, 'I/d Juru Tingkat I'),
(15, 'I/c Juru'),
(16, 'I/b Juru Muda Tingkat I'),
(17, 'I/a Juru Muda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(20) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `riset` int(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `nim`, `namalengkap`, `judul`, `riset`, `password`) VALUES
(1508605004, '1508605002', 'Budi', '   Pemanfaatan Daun Kemangi Sebagai Obat Memperkuat    ', 0, 'hklh'),
(1508605007, '15', 'riset', '', 0, '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riset`
--

CREATE TABLE `tb_riset` (
  `id_riset` int(20) NOT NULL,
  `riset` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riset`
--

INSERT INTO `tb_riset` (`id_riset`, `riset`) VALUES
(0, ''),
(1, 'Kimia Organik'),
(2, 'Bahan Alam'),
(3, 'Kimia Lingkungan'),
(4, 'Kimia Analitik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riset_dosen`
--

CREATE TABLE `tb_riset_dosen` (
  `id_riset_dosen` int(20) NOT NULL,
  `id_dosen` int(20) NOT NULL,
  `id_riset` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riset_dosen`
--

INSERT INTO `tb_riset_dosen` (`id_riset_dosen`, `id_dosen`, `id_riset`) VALUES
(32, 0, 2),
(33, 0, 3),
(42, 1, 2),
(43, 1, 3),
(44, 2, 1),
(45, 2, 3),
(46, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_uji`
--

CREATE TABLE `tb_uji` (
  `id_uji` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uji`
--

INSERT INTO `tb_uji` (`id_uji`, `id_dosen`, `id_mhs`) VALUES
(4, 1, 1508605005),
(5, 1, 1508605004),
(6, 1, 1508605004),
(7, 2, 1508605007);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bimbing`
--
ALTER TABLE `tb_bimbing`
  ADD PRIMARY KEY (`id_bimbing`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tb_riset`
--
ALTER TABLE `tb_riset`
  ADD PRIMARY KEY (`id_riset`);

--
-- Indexes for table `tb_riset_dosen`
--
ALTER TABLE `tb_riset_dosen`
  ADD PRIMARY KEY (`id_riset_dosen`);

--
-- Indexes for table `tb_uji`
--
ALTER TABLE `tb_uji`
  ADD PRIMARY KEY (`id_uji`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bimbing`
--
ALTER TABLE `tb_bimbing`
  MODIFY `id_bimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mhs` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508605008;

--
-- AUTO_INCREMENT for table `tb_riset`
--
ALTER TABLE `tb_riset`
  MODIFY `id_riset` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_riset_dosen`
--
ALTER TABLE `tb_riset_dosen`
  MODIFY `id_riset_dosen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_uji`
--
ALTER TABLE `tb_uji`
  MODIFY `id_uji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
