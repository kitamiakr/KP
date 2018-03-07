-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2013 at 05:25 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grafik`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kode_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI IPA'),
(3, 'XI IPS'),
(6, 'XII Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(45) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `kota_siswa` varchar(11) NOT NULL,
  `email_siswa` varchar(45) NOT NULL DEFAULT '-',
  `telepon_siswa` varchar(45) NOT NULL DEFAULT '-',
  `kode_kelas` int(11) NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `fk_siswa_kelas1` (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nama_siswa`, `foto`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_siswa`, `kota_siswa`, `email_siswa`, `telepon_siswa`, `kode_kelas`) VALUES
('20227473', '827ccb0eea8a706c4c34a16891f84e7b', 'Aas Astria', 'media/siswa/20227473.jpg', 'Garut', '1996-10-07', 'Perempuan', 'Islam', 'Garut', 'Garut', 'ari_wibowo1105@yahoo.com', '081220428004', 1),
('20227474', '827ccb0eea8a706c4c34a16891f84e7b', 'Abdul Latif', '', 'Garut', '1997-01-23', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227475', '827ccb0eea8a706c4c34a16891f84e7b', 'Abdul Latif Anggara', 'media/siswa/20227475.jpg', 'Garut', '1997-08-04', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo4@yahoo.com', '081220428004', 1),
('20227476', '827ccb0eea8a706c4c34a16891f84e7b', 'Abdul Rohmat Firdaus', '', 'Garut', '1994-11-10', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227477', '827ccb0eea8a706c4c34a16891f84e7b', 'Adam Hadikusuma', '', 'Garut', '1997-07-06', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227478', '827ccb0eea8a706c4c34a16891f84e7b', 'Ade Lisna', '', 'Garut', '1997-05-05', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227479', '827ccb0eea8a706c4c34a16891f84e7b', 'Ade Rinrin', '', 'Garut', '1997-05-12', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227480', '827ccb0eea8a706c4c34a16891f84e7b', 'Ade Sri Kustina', '', 'Garut', '1997-09-08', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227481', '827ccb0eea8a706c4c34a16891f84e7b', 'Aditya Yoga Pratama', '', 'Garut', '1998-01-16', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227482', '827ccb0eea8a706c4c34a16891f84e7b', 'Agam Yongki Lesmana', '', 'Garut', '1997-04-15', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227483', '827ccb0eea8a706c4c34a16891f84e7b', 'Agung Isya Mahendra', '', 'Garut', '1996-02-11', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227484', '827ccb0eea8a706c4c34a16891f84e7b', 'Agus Kamal', '', 'Garut', '1996-08-18', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 2),
('20227485', '827ccb0eea8a706c4c34a16891f84e7b', 'Agus Mulyana', '', 'Garut', '1996-08-08', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227486', '827ccb0eea8a706c4c34a16891f84e7b', 'Agus Tinda', '', 'Garut', '1995-02-03', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227487', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Andriani', '', 'Garut', '1997-10-22', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227488', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Gina Nurzaini', '', 'Garut', '1996-05-16', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227489', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Nani Safitri', '', 'Garut', '1997-06-16', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227490', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Rini Lestari', '', 'Garut', '1996-04-16', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227491', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Siti Nurpalah', '', 'Garut', '1997-10-06', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227492', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Tita Nurjanah', '', 'Garut', '1997-08-15', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227493', '827ccb0eea8a706c4c34a16891f84e7b', 'Ai Yulia', '', 'Garut', '1996-07-11', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227494', '827ccb0eea8a706c4c34a16891f84e7b', 'Ainun Siti Fatonah', '', 'Garut', '1997-05-12', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227495', '827ccb0eea8a706c4c34a16891f84e7b', 'Aldi Yusup', '', 'Garut', '1996-12-04', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227496', '827ccb0eea8a706c4c34a16891f84e7b', 'Alwi Musadad', '', 'Garut', '1996-12-16', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 1),
('20227497', '827ccb0eea8a706c4c34a16891f84e7b', 'Andri Dharajat', '', 'Garut', '1998-06-29', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 3),
('20227498', '827ccb0eea8a706c4c34a16891f84e7b', 'Andri Setiawan', '', 'Garut', '1997-04-19', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 3),
('20227499', '827ccb0eea8a706c4c34a16891f84e7b', 'Anggi Bahtiar', '', 'Garut', '1997-03-01', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 3),
('20227500', '827ccb0eea8a706c4c34a16891f84e7b', 'Anggi Ramdani', '', 'Garut', '1997-01-21', 'Laki-Laki', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 3),
('20227501', '827ccb0eea8a706c4c34a16891f84e7b', 'Anita', '', 'Garut', '1997-09-19', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 3),
('20227502', '827ccb0eea8a706c4c34a16891f84e7b', 'Anita Herliani', '', 'Garut', '1997-02-04', 'Perempuan', 'Islam', 'Garut', 'Garut', 'auliazahrawibowo@yahoo.com', '081220428004', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
