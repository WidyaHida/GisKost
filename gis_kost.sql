-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2014 at 11:22 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gis_kost`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_fas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fas`, `nama_fas`) VALUES
(1, 'lemari'),
(2, 'kamar mandi luar'),
(3, 'wifi'),
(4, 'AC'),
(5, 'kamar mandi dalam'),
(6, 'Meja'),
(7, 'Kursi'),
(8, 'Ranjang Tempat Tidur'),
(9, 'Kasur');

-- --------------------------------------------------------

--
-- Table structure for table `jangka_waktu`
--

CREATE TABLE IF NOT EXISTS `jangka_waktu` (
  `id_jangka` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jangka` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jangka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jangka_waktu`
--

INSERT INTO `jangka_waktu` (`id_jangka`, `nama_jangka`) VALUES
(1, '/bulan'),
(2, '/tahun');

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE IF NOT EXISTS `kost` (
  `id_kost` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `lon` double NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `harga` int(11) NOT NULL,
  `jarak` varchar(4) NOT NULL,
  PRIMARY KEY (`id_kost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `nama`, `latitude`, `lon`, `nohp`, `alamat`, `harga`, `jarak`) VALUES
(1, 'Kos Putri Soka Merah', -7.561053, 110.858027, '(0271)989797', 'Jalan K.H Maskur Gang Tejo 2 No 13', 2800000, '200'),
(2, 'Kos Gendingan', -7.562831, 110.858751, '(0271)01918391', 'Jalan  K.H Dewantara Gang Tejo 2 No 15', 225000, '200'),
(3, 'Mess Annur', -7.560693, 110.85991, '081703271280', 'Jalan  K.H Dewantara Gang Tejo 2 No 16', 3500000, '350'),
(4, 'Green House', -7.560257, 110.860189, '0814055634', 'Jalan  K.H Dewantara Gang Tejo 2 No 20', 3100000, '350'),
(5, 'Kos INA', -7.559917, 110.859813, '081230656291', 'Jalan  K.H Dewantara Gang Tejo 3 No 5', 270000, '250'),
(6, 'Kos Danan', -7.558189, 110.853174, '089615736657', 'Jl. Ir. Sutami Gang Mendung 1 No 2', 2500000, '50'),
(7, 'Kos Widya', -7.559287, 110.85395, '085868244190', 'Jl. Ir. Sutami Gang Mendung 1 No 10', 4300000, '50'),
(8, 'Kos Hidayah', -7.556883, 110.852855, '081911555167', 'Jl. Ir. Sutami Gang Mendung 2 No 15', 400000, '100'),
(9, 'Kos An Nisa 2', -7.554333, 110.860865, '082131177782', 'Jl. Kartika No 10', 3150000, '200'),
(10, 'Kos Guntur', -7.554024, 110.861229, '0896177445582', 'Jl. Kartika No 35 ', 2700000, '50'),
(11, 'griya kami', -7.56112087994974, 110.853656010559, '08121232328', 'jln. halilintar no 3 , jebres , Surakarta', 3000000, '500');

-- --------------------------------------------------------

--
-- Table structure for table `kost_fas`
--

CREATE TABLE IF NOT EXISTS `kost_fas` (
  `id_kost_fas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kost` int(11) NOT NULL,
  `id_fas` int(11) NOT NULL,
  PRIMARY KEY (`id_kost_fas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `kost_fas`
--

INSERT INTO `kost_fas` (`id_kost_fas`, `id_kost`, `id_fas`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 1, 6),
(6, 1, 7),
(7, 1, 9),
(8, 2, 6),
(9, 2, 7),
(10, 2, 9),
(11, 3, 1),
(12, 3, 3),
(13, 3, 2),
(14, 3, 6),
(15, 3, 7),
(16, 3, 8),
(17, 3, 9),
(18, 4, 3),
(19, 4, 5),
(20, 4, 6),
(21, 4, 7),
(22, 4, 9),
(23, 5, 1),
(24, 5, 2),
(25, 5, 6),
(26, 5, 7),
(27, 5, 8),
(28, 5, 9),
(29, 6, 1),
(30, 6, 2),
(31, 6, 6),
(32, 6, 7),
(33, 6, 9),
(37, 7, 1),
(38, 7, 2),
(39, 7, 3),
(40, 7, 6),
(41, 7, 7),
(42, 7, 9),
(43, 8, 1),
(44, 8, 2),
(45, 8, 3),
(46, 8, 6),
(47, 8, 7),
(48, 8, 9),
(49, 9, 1),
(50, 9, 3),
(51, 9, 5),
(52, 9, 6),
(53, 6, 8),
(54, 9, 9),
(55, 10, 1),
(56, 10, 2),
(57, 10, 6),
(58, 10, 2),
(59, 10, 7),
(60, 10, 9),
(61, 8, 4),
(62, 11, 1),
(63, 11, 2),
(64, 11, 6),
(65, 11, 7),
(66, 11, 8),
(67, 11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `kost_jar`
--

CREATE TABLE IF NOT EXISTS `kost_jar` (
  `id_kost_jar` int(11) NOT NULL AUTO_INCREMENT,
  `id_kost` int(11) NOT NULL,
  `id_satuanjar` int(11) NOT NULL,
  PRIMARY KEY (`id_kost_jar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kost_jar`
--

INSERT INTO `kost_jar` (`id_kost_jar`, `id_kost`, `id_satuanjar`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ko_jang`
--

CREATE TABLE IF NOT EXISTS `ko_jang` (
  `id_ko_jang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kost` int(11) NOT NULL,
  `id_jangka` int(11) NOT NULL,
  PRIMARY KEY (`id_ko_jang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ko_jang`
--

INSERT INTO `ko_jang` (`id_ko_jang`, `id_kost`, `id_jangka`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 1),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `satuanjar`
--

CREATE TABLE IF NOT EXISTS `satuanjar` (
  `id_satuanjar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(2) NOT NULL,
  PRIMARY KEY (`id_satuanjar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `satuanjar`
--

INSERT INTO `satuanjar` (`id_satuanjar`, `nama`) VALUES
(1, 'm'),
(2, 'km');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
