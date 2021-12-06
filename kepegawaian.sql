-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 02:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `Kode_Dept` varchar(3) NOT NULL,
  `Nama_Dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`Kode_Dept`, `Nama_Dept`) VALUES
('DA', 'Departement Accounting'),
('DE', 'Departement Environment'),
('DEN', 'Departement Engineering'),
('DP', 'Departement Produksi'),
('DS', 'Departement Safety'),
('GA', 'General Affairs'),
('HRD', 'Human Resources Departement'),
('IT', 'Information Technology'),
('QA', 'Quality Assurance'),
('WT', 'Work Technical');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `Kode_Kota` varchar(3) NOT NULL,
  `Nama_Kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`Kode_Kota`, `Nama_Kota`) VALUES
('BER', 'Berau'),
('BPP', 'Balikpapan'),
('BTG', 'Bontang'),
('PKR', 'Palangkaraya'),
('PON', 'Pontianak'),
('PPU', 'Penajam Paser Utara'),
('SGT', 'Sangatta'),
('SMD', 'Samarinda'),
('TGR', 'Tenggarong'),
('TRK', 'Tarakan');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `Nip` varchar(18) NOT NULL,
  `Nama` varchar(35) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Kode_Dept` varchar(3) NOT NULL,
  `Kode_Status` varchar(3) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Kode_Kota` varchar(3) NOT NULL,
  `Agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`Nip`, `Nama`, `Tgl_Lahir`, `Kode_Dept`, `Kode_Status`, `Alamat`, `Kode_Kota`, `Agama`) VALUES
('198005022010011004', 'Rudy', '1980-05-02', 'HRD', '3', 'JL.Rukun', 'BTG', '1'),
('198405092010081014', 'Halim', '1984-05-09', 'DS', '3', 'JL.Hasan Basri', 'SGT', '1'),
('198602022011041009', 'Abdi', '1986-02-02', 'DP', '1', 'JL.Agus Salim', 'SMD', '1'),
('198705102009082007', 'Resti', '1987-05-10', 'DA', '2', 'JL.Pahlawan', 'SMD', '1'),
('198801082016071005', 'Wardana', '1988-01-08', 'DS', '2', 'JL.AM Sangaji', 'TGR', '1'),
('198902022014031002', 'Malik', '1989-02-02', 'QA', '2', 'JL.Tantina', 'PPU', '1'),
('198903092010011009', 'Rio', '1989-03-09', 'GA', '2', 'JL.Lumba-Lumba', 'BTG', '1'),
('199007282015022003', 'Mirna', '1990-07-28', 'DA', '2', 'JL.Juanda', 'TRK', '2'),
('199008082014012006', 'Vina', '1990-08-08', 'QA', '1', 'JL.Juanda', 'PKR', '4'),
('199999999999991111', 'Niko', '1998-01-09', 'QA', '1', 'JL.Suryanata', 'PPU', '3');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Kode_Status` varchar(3) NOT NULL,
  `Nama_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Kode_Status`, `Nama_Status`) VALUES
('1', 'Bujang'),
('2', 'Menikah'),
('3', 'Duda/Janda'),
('4', 'cerai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `nama`) VALUES
('admin', '123', 'Administartor - DiCa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`Kode_Dept`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`Kode_Kota`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`Nip`),
  ADD KEY `Kode_Dept` (`Kode_Dept`),
  ADD KEY `Kode_Status` (`Kode_Status`),
  ADD KEY `Kode_Kota` (`Kode_Kota`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Kode_Status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`Kode_Dept`) REFERENCES `departemen` (`Kode_Dept`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`Kode_Status`) REFERENCES `status` (`Kode_Status`),
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`Kode_Kota`) REFERENCES `kota` (`Kode_Kota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
