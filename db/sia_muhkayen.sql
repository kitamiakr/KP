-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 04:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_muhkayen`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` char(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `status_aktif` enum('aktif','tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `nama_guru`, `kelamin`, `alamat`, `no_telepon`, `status_aktif`) VALUES
('G0002', '5737761664300002', 'Indiyani', 'Perempuan', 'Kayen,Condongcatur,Depok,Sleman', '08562897577', 'aktif'),
('G0003', '6348740642300013', 'Dasiyem', 'Perempuan', 'Kayen RT. 03 RW. 43 Condongcatur Depok Sleman', 'tidak ada', 'aktif'),
('G0001', '4533759660300032', 'Fenty Ihsanty', 'Perempuan', 'Klewonan RT 01/RW 022 Bimomartani Ngemplak Sleman', 'tidak ada', 'aktif'),
('G0004', '8462761661300012', 'Dwi Purwanti Fajariyah', 'Perempuan', 'Medelan RT 002/RW 030 Umbulmartani Ngemplak Sleman', 'tidak ada', 'aktif'),
('G0005', '3758763665210042', 'Maria Ulfah', 'Perempuan', 'Jatimulyo Kricak Tegalrejo JatimulyoTR I/668 RT. 23 RW. 05 Kota Yogyakarta', 'tidak ada', 'aktif'),
('G0006', 'Belum memiliki', 'Ima Heni Rochayati', 'Perempuan', 'Cagunan DK. VII, Trimurti, Srandakan, Bantul, Yogyakarta', 'tidak ada', 'aktif'),
('G0007', 'Belum memiliki', 'Eka Oktafiana Wahyuningrum', 'Perempuan', 'Pomahan Krodan RT 09 RW 06 NO 262 Maguwoharjo Depok Sleman', 'tidak ada', 'aktif'),
('G0008', '4538-7556-5720-0043', 'Muhammad Mohtadin', 'Laki-laki', 'Jln. Banteng Baru Gang VI No: 14 RT. 04 RW. 29 Sinduharjo Ngaglik Sleman Yogyakarta', 'tidak', 'aktif'),
('G0009', 'Belum memiliki', 'Bayu Prasto Kuncoro', 'Laki-laki', 'Petet RT. 004 Potorono Banguntapan Bantul', 'tidak ada', 'aktif'),
('G0010', 'Belum memiliki', 'Yuniarsih', 'Perempuan', 'Glagah Kidul RT. 002 Tamanan Banguntapan Bantul', 'tidak ada', 'aktif'),
('G0011', '12345', 'abc', 'Laki-laki', 'sapen', '087765749937', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` char(4) NOT NULL,
  `tahun_ajar` varchar(12) NOT NULL,
  `kelas` char(3) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `kode_guru` char(5) NOT NULL,
  `status_aktif` enum('aktif','tidak aktif') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `tahun_ajar`, `kelas`, `nama_kelas`, `kode_guru`, `status_aktif`) VALUES
('K001', '2017', 'I', 'A', 'G0003', 'aktif'),
('K003', '2017', 'II', 'A', 'G0006', 'aktif'),
('K004', '2017', 'IV', 'A', 'G0005', 'aktif'),
('K005', '2017', 'V', 'A', 'G0004', 'aktif'),
('K007', '2017', 'I', 'B', 'G0002', 'aktif'),
('K008', '2015', 'III', 'A', 'G0001', 'aktif'),
('K006', '2017', 'VI', 'A', 'G0007', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(5) NOT NULL,
  `kode_kelas` char(12) NOT NULL,
  `kode_siswa` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kode_kelas`, `kode_siswa`) VALUES
(450, 'K006', 'S0185'),
(451, 'K006', 'S0186'),
(452, 'K006', 'S0187'),
(453, 'K006', 'S0188'),
(454, 'K006', 'S0189'),
(455, 'K006', 'S0190'),
(456, 'K006', 'S0191'),
(457, 'K006', 'S0192'),
(458, 'K006', 'S0193'),
(459, 'K006', 'S0194'),
(460, 'K006', 'S0195'),
(461, 'K006', 'S0196'),
(462, 'K006', 'S0197'),
(463, 'K006', 'S0198'),
(464, 'K006', 'S0199'),
(465, 'K006', 'S0200'),
(418, 'K008', 'S0088'),
(419, 'K008', 'S0089'),
(420, 'K008', 'S0090'),
(421, 'K008', 'S0091'),
(422, 'K008', 'S0092'),
(423, 'K008', 'S0093'),
(424, 'K008', 'S0094'),
(425, 'K008', 'S0095'),
(426, 'K008', 'S0096'),
(427, 'K008', 'S0097'),
(428, 'K008', 'S0098'),
(429, 'K008', 'S0099'),
(430, 'K008', 'S0100'),
(431, 'K008', 'S0101'),
(432, 'K008', 'S0102'),
(433, 'K008', 'S0103'),
(434, 'K008', 'S0104'),
(435, 'K008', 'S0105'),
(436, 'K008', 'S0106'),
(437, 'K008', 'S0107'),
(438, 'K008', 'S0108'),
(439, 'K008', 'S0109'),
(440, 'K008', 'S0110'),
(441, 'K008', 'S0111'),
(442, 'K008', 'S0112'),
(443, 'K008', 'S0113'),
(444, 'K008', 'S0114'),
(445, 'K008', 'S0115'),
(446, 'K008', 'S0116'),
(447, 'K008', 'S0117'),
(304, 'K006', 'S0201'),
(305, 'K006', 'S0202'),
(306, 'K006', 'S0203'),
(307, 'K006', 'S0204'),
(308, 'K006', 'S0205'),
(309, 'K006', 'S0206'),
(310, 'K006', 'S0207'),
(311, 'K006', 'S0208'),
(312, 'K006', 'S0209'),
(313, 'K006', 'S0210'),
(314, 'K006', 'S0211'),
(315, 'K006', 'S0212'),
(316, 'K006', 'S0213'),
(317, 'K006', 'S0214'),
(318, 'K006', 'S0215'),
(319, 'K006', 'S0216'),
(320, 'K006', 'S0217'),
(269, 'K005', 'S0184'),
(268, 'K005', 'S0183'),
(267, 'K005', 'S0182'),
(266, 'K005', 'S0181'),
(265, 'K005', 'S0180'),
(264, 'K005', 'S0179'),
(263, 'K005', 'S0178'),
(262, 'K005', 'S0177'),
(261, 'K005', 'S0176'),
(260, 'K005', 'S0175'),
(259, 'K005', 'S0174'),
(258, 'K005', 'S0173'),
(257, 'K005', 'S0172'),
(256, 'K005', 'S0171'),
(255, 'K005', 'S0170'),
(254, 'K005', 'S0169'),
(253, 'K005', 'S0168'),
(252, 'K005', 'S0167'),
(251, 'K005', 'S0166'),
(250, 'K005', 'S0165'),
(249, 'K005', 'S0164'),
(248, 'K005', 'S0163'),
(247, 'K005', 'S0162'),
(246, 'K005', 'S0161'),
(245, 'K005', 'S0160'),
(234, 'K004', 'S0149'),
(233, 'K004', 'S0148'),
(232, 'K004', 'S0147'),
(231, 'K004', 'S0146'),
(230, 'K004', 'S0145'),
(229, 'K004', 'S0144'),
(228, 'K004', 'S0143'),
(227, 'K004', 'S0142'),
(226, 'K004', 'S0141'),
(225, 'K004', 'S0140'),
(224, 'K004', 'S0139'),
(223, 'K004', 'S0138'),
(222, 'K004', 'S0137'),
(221, 'K004', 'S0136'),
(220, 'K004', 'S0135'),
(219, 'K004', 'S0134'),
(235, 'K005', 'S0150'),
(236, 'K005', 'S0151'),
(237, 'K005', 'S0152'),
(238, 'K005', 'S0153'),
(239, 'K005', 'S0154'),
(240, 'K005', 'S0155'),
(241, 'K005', 'S0156'),
(242, 'K005', 'S0157'),
(243, 'K005', 'S0158'),
(206, 'K004', 'S0121'),
(207, 'K004', 'S0122'),
(208, 'K004', 'S0123'),
(209, 'K004', 'S0124'),
(210, 'K004', 'S0125'),
(211, 'K004', 'S0126'),
(212, 'K004', 'S0127'),
(213, 'K004', 'S0128'),
(214, 'K004', 'S0129'),
(215, 'K004', 'S0130'),
(216, 'K004', 'S0131'),
(217, 'K004', 'S0132'),
(172, 'K003', 'S0087'),
(171, 'K003', 'S0086'),
(170, 'K003', 'S0085'),
(169, 'K003', 'S0084'),
(168, 'K003', 'S0083'),
(167, 'K003', 'S0082'),
(166, 'K003', 'S0081'),
(165, 'K003', 'S0080'),
(164, 'K003', 'S0079'),
(163, 'K003', 'S0078'),
(162, 'K003', 'S0077'),
(161, 'K003', 'S0076'),
(160, 'K003', 'S0075'),
(159, 'K003', 'S0074'),
(158, 'K003', 'S0073'),
(157, 'K003', 'S0072'),
(156, 'K003', 'S0071'),
(155, 'K003', 'S0070'),
(154, 'K003', 'S0069'),
(153, 'K003', 'S0068'),
(152, 'K003', 'S0067'),
(151, 'K003', 'S0066'),
(150, 'K003', 'S0065'),
(149, 'K003', 'S0064'),
(148, 'K003', 'S0063'),
(147, 'K003', 'S0062'),
(146, 'K003', 'S0061'),
(145, 'K003', 'S0060'),
(144, 'K003', 'S0059'),
(143, 'K003', 'S0058'),
(142, 'K003', 'S0057'),
(141, 'K003', 'S0056'),
(140, 'K003', 'S0055'),
(139, 'K003', 'S0054'),
(117, 'K007', 'S0053'),
(116, 'K007', 'S0052'),
(115, 'K007', 'S0051'),
(118, 'K007', 'S0030'),
(119, 'K007', 'S0031'),
(120, 'K007', 'S0032'),
(121, 'K007', 'S0033'),
(122, 'K007', 'S0034'),
(123, 'K007', 'S0035'),
(124, 'K007', 'S0036'),
(125, 'K007', 'S0037'),
(126, 'K007', 'S0038'),
(127, 'K007', 'S0039'),
(128, 'K007', 'S0040'),
(103, 'K001', 'S0029'),
(102, 'K001', 'S0028'),
(101, 'K001', 'S0027'),
(100, 'K001', 'S0026'),
(99, 'K001', 'S0025'),
(98, 'K001', 'S0024'),
(97, 'K001', 'S0023'),
(96, 'K001', 'S0022'),
(95, 'K001', 'S0021'),
(94, 'K001', 'S0020'),
(93, 'K001', 'S0019'),
(92, 'K001', 'S0018'),
(91, 'K001', 'S0017'),
(90, 'K001', 'S0016'),
(89, 'K001', 'S0015'),
(88, 'K001', 'S0014'),
(87, 'K001', 'S0013'),
(86, 'K001', 'S0012'),
(129, 'K007', 'S0041'),
(130, 'K007', 'S0042'),
(131, 'K007', 'S0043'),
(132, 'K007', 'S0044'),
(133, 'K007', 'S0045'),
(134, 'K007', 'S0046'),
(135, 'K007', 'S0047'),
(136, 'K007', 'S0048'),
(137, 'K007', 'S0049'),
(76, 'K001', 'S0002'),
(77, 'K001', 'S0003'),
(78, 'K001', 'S0004'),
(79, 'K001', 'S0005'),
(80, 'K001', 'S0006'),
(81, 'K001', 'S0007'),
(82, 'K001', 'S0008'),
(138, 'K007', 'S0050'),
(83, 'K001', 'S0009'),
(84, 'K001', 'S0010'),
(85, 'K001', 'S0011'),
(448, 'K008', 'S0119'),
(449, 'K008', 'S0120'),
(244, 'K005', 'S0159'),
(321, 'K006', 'S0218'),
(218, 'K004', 'S0133'),
(28, 'K001', 'S0001');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(5) NOT NULL,
  `semester` int(2) NOT NULL,
  `kode_pelajaran` char(4) NOT NULL,
  `kode_guru` char(5) NOT NULL,
  `kode_kelas` char(4) NOT NULL,
  `kode_siswa` char(5) NOT NULL,
  `nilai_tugas1` int(3) NOT NULL,
  `nilai_tugas2` int(3) NOT NULL,
  `kepribadian` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `semester`, `kode_pelajaran`, `kode_guru`, `kode_kelas`, `kode_siswa`, `nilai_tugas1`, `nilai_tugas2`, `kepribadian`, `nilai_uts`, `nilai_uas`, `keterangan`) VALUES
(13, 1, 'P005', 'G0001', 'K007', 'S0033', 78, 90, 78, 67, 89, 'tingkatkan'),
(12, 1, 'P002', 'G0001', 'K007', 'S0033', 100, 90, 98, 87, 98, 'tingkatkan'),
(11, 1, 'P001', 'G0001', 'K007', 'S0030', 89, 98, 70, 76, 98, 'tingkatkan'),
(10, 1, 'P001', 'G0001', 'K007', 'S0033', 90, 80, 70, 67, 89, 'tingkatkan'),
(14, 2, 'P015', 'G0001', 'K003', 'S0054', 90, 89, 89, 97, 78, 'tingkatkan'),
(15, 2, 'P007', 'G0001', 'K007', 'S0033', 89, 89, 98, 90, 96, 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_pelajaran` char(4) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`kode_pelajaran`, `nama_pelajaran`, `keterangan`) VALUES
('P001', 'Al-Quran Hadits', 'Agama'),
('P002', 'Akidah', 'Agama'),
('P003', 'Akhlak', 'Agama'),
('P005', 'Tarikh', 'Agama'),
('P006', 'Kemuhammadiyahan', 'Umum'),
('P004', 'Ibadah Muamalah', 'Agama'),
('P007', 'Bahasa Arab', 'Umum'),
('P008', 'Pendidikan Kewarnegaraan', 'Umum'),
('P009', 'Bahasa Indonesia', 'Umum'),
('P010', 'Matematika', 'Umum'),
('P011', 'Ilmu Pengetahuan Alam', 'Umum'),
('P012', 'Ilmu Pengetahuan Sosial', 'Umum'),
('P013', 'Seni Budaya dan Ketrampilan', 'Umum'),
('P014', 'Pendidikan Jasmani, Olah Raga dan Kesehatan', 'Umum'),
('P015', 'Bahasa Jawa', 'Mulok'),
('P016', 'Bahasa Inggris', 'Mulok');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_peng` int(11) NOT NULL,
  `judul_peng` varchar(100) NOT NULL,
  `isi_peng` text NOT NULL,
  `tanggal_peng` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_peng`, `judul_peng`, `isi_peng`, `tanggal_peng`, `gambar`) VALUES
(32, 'Pelatihan Dokter Kecil', ' Diberitahukan kepada seluruh siswa kelas 4, 5, dan kelas 6 SD Muhammdiyah Kayen, bahwa SD Muhammdiyah Kayen akan mengadakan pelatihan Dokter Kecil. Setiap kelas wajib mengirimkan lima orang wakil untuk mengikuti pelatihan dokter kecil. Pelatihan akan dilaksanakan pada tanggal 9 â€“ 12 Maret 2017 di gedung serbaguna SD Muhammdiyah Kayen. Peserta akan mendapatkan seragam dan sertifikat.\r\nBagi siswa yang akan mengikuti pelatihan dokter kecil harap mendaftarkan diri di kantor guru. Pendaftaran paling lambat tanggal 5 Maret 2017', '2017-03-09', 'dokcil1.jpg'),
(33, 'Kerja Bakti', 'Dalam rangka memperingati hari pahlawan yang akan diselenggarakan pada tanggal 10 N0vember 2017 mendatang, maka diwajibkan kepada seluruh siswa SD Muhammdiyah Kayen  untuk mengenakan seragam putih merah, dasi, topi, dan ikat kepala merah putih. Sehubungan dengan akan diselenggarakannya peringatan hari pahlawan pada waktu tersebut, sekolah akan mengadakan upacara bendera setengah tiang yang akan dilaksanakan pada hari Selasa, 10 November 2017 pukul 07.15 WIB. Upacara bendera akan diselenggarakan di lapangan SD Muhammdiyah Kayen .', '2017-06-06', 'piket.jpeg'),
(34, 'Peringatan Hari Pendidikan Nasional', 'Diumumkan kepada seluruh siswa SD Muhammdiyah Kayen, dalam rangka memperinagti hari Pendidikan Nasional tanggal 2 Mei 2017, sekolah akan melaksanakan upacara. Sehubungan dengan hal itu, semua siswa diharapkan hadir di halaman sekolah tepat pukul 07.oo WIB mengenakan pakaian seragam merah-putih.', '2017-04-28', 'Hari-pendidikan-nasional-749x483.png'),
(35, 'Lomba OSN', 'Dalam rangka melaksanakan program kegiatan Dinas Pendidikan Kabupaten Jombang Tahun Anggaran 2017, Dinas Pendidikan akan melaksanakan lomba MIPA untuk ditindaklanjuti di tingkat Kecamatan.', '2017-06-06', 'OSN.jpg'),
(36, 'Libur Idulfitri', 'Dalam rangka menyambut datangnya hari raya Idul Fitri 1 Syawal  1438 H, Sekolah akan meliburkan kegiatan belajar mengajar yang dimulai pada Senin19 Juni 2017 sampai dengan Sabtu 1 Juli 2017', '2017-06-07', '1731581_37b951c7-ceac-47d7-aaf2-4696acdc99a4.jpg'),
(37, 'Perayaan Hari Kartini', 'Diumumkan kepada seluruh siswa SD Muhammdiyah Kayen , dalam rangka memperinagti hari Kartini tanggal 21 April 2017, sekolah akan melaksanakan upacara. Sehubungan dengan hal itu, semua siswa diharapkan hadir di halaman sekolah tepat pukul 07.oo WIB mengenakan pakaian Tradisional Indonesia. Mohon Untuk Orang tua / wali murid dapat membimbing putra-putrinya untuk mengenakan pakaian tradisional / budaya adat Indonesia.', '2017-04-18', 'Gambar-DP-BBM-RA-Kartini-Terbaru-2017-630x330.jpg'),
(38, 'Lomba Baca Puisi', 'Dalam memperingati hari CINTA LINGKUNGAN, SD Muhammadiyah Kayen akan mengadakan LOMBA membaca puisi yang bertema LINGKUNGAN HIDUP. Lomba membaca puisi diikuti oleh seluruh siswa SD Muhammadiyah Kayen yang berminat untuk mengikuti. Lomba membaca puisi diadakan pada :\r\n\r\nhari, tanggal        : Selasa, 7 Agustus 2017\r\n\r\ntempat                 : SD Muhammadiyah Kayen\r\n\r\nPendaftaran dimulai tanggal 1 juli â€“ 30 juli, apabila ingin mendaftar, harap segera mendaftarkan diri pada wali kelas masing-masing. Pendaftaran tidak dipungut biaya alias GRATIS.\r\n\r\nDemikian pengumuman ini kami buat. Atas perhatiannya para siswa, kami ucapkan terima kasih.\r\n\r\nIklan', '2017-06-12', 'Lomba Baca Puisi-min.jpg'),
(40, 'jfkljd', 'fhkdslfi', '2017-06-13', 'bg_mulai.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `judul_pres` varchar(100) NOT NULL,
  `tanggal_pres` date NOT NULL,
  `isi_pres` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `judul_pres`, `tanggal_pres`, `isi_pres`, `gambar`) VALUES
(2, 'Juara Olimpiade Sains 2017', '2017-04-19', 'Pada ajang lomba olimpiade sains 2017 tingkat SD tingkat se-kecamatan Depok Sleman yakni pada bidang matematika SD Muhammdiyah Kayen meraih juara II', 'Piala 2-min.JPG'),
(4, 'Juara Tapak Suci Sleman Championship open 2016', '2016-06-20', 'Pada ajang Tapak Suci Sleman Championship Open 2016 se- DIY- JATENG SD Muhammdiyah Kayen meraih juara I untuk kategori putra.', 'Piala 3-min.JPG'),
(8, 'juara cerdas cermat', '2017-06-15', 'Pada ajang lomba cerdas cermat agama Islam yang diadakan di SMP Muhmmadiyah 3 Depok tingkat SD MI se-kabupaten Sleman SD Muhammdiyah Kayen meraih juara III', 'Piala 1-min-min.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` char(5) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tahun_angkatan` char(4) NOT NULL,
  `status` enum('Aktif','Lulus','Keluar') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kode_siswa`, `nis`, `nama_siswa`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `foto`, `tahun_angkatan`, `status`) VALUES
('S0182', '1120034', 'M Dzaky R', 'Laki-laki', 'Islam', 'Kayen', '2005-12-17', 'Kayen Condongcatur Depok Sleman', '082382037013', '', '2013', 'Aktif'),
('S0181', '1120033', 'Rafi Hidayat', 'Laki-laki', 'Islam', 'Plemburan', '2005-05-13', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '084761738219', '', '2013', 'Aktif'),
('S0180', '1120032', 'Damarbumi Romadhon', 'Laki-laki', 'Islam', 'Nglinggan', '2005-01-25', 'Nglinggan Wedomartani Ngemplak', '084353286381', '', '2013', 'Aktif'),
('S0179', '1120031', 'Athaya Sekar Khairina', 'Perempuan', 'Islam', 'Kayen', '2005-12-07', 'Kayen Condongcatur Depok Sleman', '085837320211', '', '2013', 'Aktif'),
('S0177', '1120029', 'Syifa Marisa Putri', 'Perempuan', 'Islam', 'Tegalmojo', '2005-08-17', 'Tegalmojo Sariharjo Ngaglik Sleman', '085018306363', '', '2013', 'Aktif'),
('S0178', '1120030', 'Atha Bagas Khairan', 'Laki-laki', 'Islam', 'Kayen', '2005-09-26', 'Kayen Condongcatur Depok Sleman', '081720838129', '', '2013', 'Aktif'),
('S0176', '1120028', 'Raden Roro Putri Salsabila ', 'Perempuan', 'Islam', 'Sumberan', '2005-10-31', 'Sumberan Sariharjo Ngaglik', '086542838201', '', '2013', 'Aktif'),
('S0175', '1120027', 'Pramita Bella Pertiwi', 'Perempuan', 'Islam', 'Gejayan', '2005-03-24', 'Gejayan Condongcatur Depok Sleman', '083709281831', '', '2013', 'Aktif'),
('S0174', '1120026 ', 'Nanda Darapuspita', 'Perempuan', 'Islam', 'Sono', '2005-09-27', 'Sono Sinduadi Mlati Sleman', '085638071037', '', '2013', 'Aktif'),
('S0173', '1120025', 'Nabila Qurrotul Aini', 'Perempuan', 'Islam', 'Lempongsari', '2005-07-21', 'Lempongsari lor No.28', '081078837046', '', '2013', 'Aktif'),
('S0172', '1120024', 'Muhammad Ridwan', 'Laki-laki', 'Islam', 'Kayen', '2005-11-26', 'Kayen Condongcatur Depok Sleman', '084738170278', '', '2013', 'Aktif'),
('S0171', '1120023', 'Indra Harin Pratama', 'Laki-laki', 'Islam', 'Kayen', '2005-10-19', 'Kayen Condongcatur Depok Sleman', '081082038173', '', '2013', 'Aktif'),
('S0170', '1120022', 'Humaimah Anindya Dzakirah', 'Perempuan', 'Islam', 'Sono', '2005-05-28', 'Sono Sinduadi Mlati Sleman', '08973101721', '', '2013', 'Aktif'),
('S0169', '1120021', 'Hanifah Arbi Pria Ardanu', 'Laki-laki', 'Islam', 'Sono', '2005-10-06', 'Sono Sinduadi Mlati Sleman', '085689038171', '', '2013', 'Aktif'),
('S0168', '1120020', 'Garda Praba P', 'Laki-laki', 'Islam', 'Kayen', '2005-03-08', 'Kayen Condongcatur Depok Sleman', '082631083013', '', '2013', 'Aktif'),
('S0167', '1120019', 'Fauziyah Ema Larasati', 'Perempuan', 'Islam', 'Banteng', '2005-05-18', 'Banteng  Sinduharjo Ngaglik Sleman', '083784108472', '', '2013', 'Aktif'),
('S0166', '1120018', 'Farrel Raditya Setyawan', 'Laki-laki', 'Islam', 'Kayen', '2005-09-29', 'Kayen Condongcatur Depok Sleman', '08900162873', '', '2013', 'Aktif'),
('S0165', '1120017', 'Eel Dewanti Rahmadani', 'Perempuan', 'Islam', 'Ngentak', '2005-11-14', 'Ngentak Sinduharjo Ngaglik Sleman', '085873290281', '', '2013', 'Aktif'),
('S0164', '1120016', 'Dina Khoirina Miftahurrizki', 'Perempuan', 'Islam', 'Nglempongsari', '2005-04-28', 'Nglompongsari Sariharjo Ngaglik Sleman', '085970237404', '', '2013', 'Aktif'),
('S0163', '1120015', 'Dewinta Aula Putri', 'Perempuan', 'Islam', 'Kayen', '2005-09-13', 'Kayen Condongcatur Depok Sleman', '083217020023', '', '2013', 'Aktif'),
('S0162', '1120014', 'Dagna Bayanaka Atmaja', 'Perempuan', 'Islam', 'Kayen', '2005-07-31', 'Kayen Condongcatur Depok Sleman', '085674820489', '', '2013', 'Aktif'),
('S0161', '1120013', 'Azalea Tirta Dwita Putri', 'Perempuan', 'Islam', 'Kadirejo', '2005-04-23', 'Kadirejo Sinduharjo Ngaglik Sleman', '083738948012', '', '2013', 'Aktif'),
('S0160', '1120012', 'Allea Carolina', 'Perempuan', 'Islam', 'Barangsari', '2005-08-25', 'Barangsari Sardonoharjo Ngaglik Sleman', '083640732105', '', '2013', 'Aktif'),
('S0159', '1120011', 'Aldino Bayu Ragil', 'Laki-laki', 'Islam', 'Jaban', '2005-07-28', 'Jaban sinduharjo Ngaglik Sleman', '081307620275', '', '2013', 'Aktif'),
('S0158', '1120010', 'Aldhimas Fernando Satya F.', 'Laki-laki', 'Islam', 'Kayen', '2005-12-01', 'Kayen Condongcatur Depok Sleman', '082683017108', '', '2013', 'Aktif'),
('S0157', '1120009', 'Ahmad Maghfur Ramadhan', 'Laki-laki', 'Islam', 'Sono', '2005-06-18', 'Sono Sinduadi Mlati Sleman', '084763910834', '', '2013', 'Aktif'),
('S0156', '1120008', 'Adetya Putri Harliandi', 'Perempuan', 'Islam', 'Kayen', '2005-11-12', 'Kayen Condongcatur Depok Sleman', '083874651730', '', '2013', 'Aktif'),
('S0155', '1120007', 'Yovi Andhika Saputra', 'Laki-laki', 'Islam', 'Sono', '2005-08-30', 'Sono Sinduadi Mlati Sleman', '085711023547', '', '2013', 'Aktif'),
('S0154', '1120006', 'Haji Ferbian', 'Laki-laki', 'Islam', 'Kayen', '2005-03-10', 'Kayen Condongcatur Depok Sleman', '084931637032', '', '2013', 'Aktif'),
('S0153', '1120005', 'Muhammad Taqiyyudin', 'Laki-laki', 'Islam', 'Sono', '2005-04-19', 'Sono Sinduadi Mlati Sleman', '083868419310', '', '2013', 'Aktif'),
('S0152', '1120003', 'Agung Adi Prasetio', 'Laki-laki', 'Islam', 'Sono', '2005-03-16', 'Sono Sinduadi Mlati Sleman', '085683202163', '', '2013', 'Aktif'),
('S0151', '1120002', 'Ab Yan Apriansah', 'Laki-laki', 'Islam', 'Kayen', '2005-05-27', 'Kayen Condongcatur Depok Sleman', '081638398203', '', '2013', 'Aktif'),
('S0150', '1120001', 'Zahra Mavita Lestari', 'Perempuan', 'Islam', 'Kayen', '2005-04-06', 'Kayen Condongcatur Depok Sleman', '08907328156', '', '2013', 'Aktif'),
('S0149', '1121029', 'Lintang Rawfa F', 'Perempuan', 'Islam', 'Plemburan', '2006-01-24', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '083648164211', '', '2014', 'Aktif'),
('S0148', '1121028', 'Ahmad Azka Alfezli', 'Laki-laki', 'Islam', 'Klabanan', '2006-11-09', 'Klabanan Sardonoharjo Ngaglik Sleman', '08957340364', '', '2014', 'Aktif'),
('S0147', '1121027', 'Kila Rahmadhani P H', 'Perempuan', 'Islam', 'Sedogan', '2006-08-14', 'Sedogan Sinduharjo Ngaglik Sleman', '087563420364', '', '2014', 'Aktif'),
('S0146', '1121026', 'Aqilah Rahmah', 'Perempuan', 'Islam', 'Kayen', '2006-03-25', 'Kayen Condongcatur Depok Sleman', '085620063712', '', '2014', 'Aktif'),
('S0145', '1121025', 'Muh Akhbar Sugiharto', 'Laki-laki', 'Islam', 'Sono', '2006-02-17', 'Sono Sinduadi Mlati Sleman', '081280363405', '', '2014', 'Aktif'),
('S0144', '1121024', 'Nizma', 'Perempuan', 'Islam', 'Banteng', '2006-03-11', 'Banteng  Sinduharjo Ngaglik Sleman', '08964303670', '', '2014', 'Aktif'),
('S0143', '1121023', 'Widha Bertha Rifatin', 'Perempuan', 'Islam', 'Kayen', '2006-12-31', 'Kayen Condongcatur Depok Sleman', '081078837046', '', '2014', 'Aktif'),
('S0142', '1121022', 'Tegar Eka Nugroho', 'Laki-laki', 'Islam', 'Kayen', '2006-03-15', 'Kayen Condongcatur Depok Sleman', '084322748320', '', '2014', 'Aktif'),
('S0141', '1121021', 'Rojalu Syayid Assidiqqi Akhiru', 'Laki-laki', 'Islam', 'Kayen', '2006-01-28', 'Kayen Condongcatur Depok Sleman', '087676870654', '', '2014', 'Aktif'),
('S0140', '1121020', 'Revaldy Setiawan', 'Laki-laki', 'Islam', 'Kayen', '2006-12-02', 'Kayen Condongcatur Depok Sleman', '081568075545', '', '2014', 'Aktif'),
('S0139', '1121019', 'Raka Irawan', 'Laki-laki', 'Islam', 'Jaban', '2006-04-16', 'Jaban sinduharjo Ngaglik Sleman', '083556874550', '', '2014', 'Aktif'),
('S0138', '1121018', 'Rahmatdani Fajar saputra', 'Laki-laki', 'Islam', 'Kayen', '2006-06-22', 'Kayen Condongcatur Depok Sleman', '085678831134', '', '2014', 'Aktif'),
('S0137', '1121017', 'Panji Nagari Akhmad Samudra', 'Laki-laki', 'Islam', 'Kayen', '2006-09-21', 'Kayen Condongcatur Depok Sleman', '082356768745', '', '2014', 'Aktif'),
('S0136', '1121016', 'Nur Afifah Ramadhani', 'Perempuan', 'Islam', 'Kayen', '2006-12-30', 'Kayen Condongcatur Depok Sleman', '082456743322', '', '2014', 'Aktif'),
('S0135', '1121015', 'Norvriana Noor Filira', 'Perempuan', 'Islam', 'Kayen', '2006-11-27', 'Kayen Condongcatur Depok Sleman', '08976421135', '', '2014', 'Aktif'),
('S0134', '1121014', 'Nasyilla Zahra Maharani', 'Perempuan', 'Islam', 'Sono', '2006-02-13', 'Sono RT 08/RW 61 SDA Mlati', '082467974321', '', '2014', 'Aktif'),
('S0133', '1121013', 'Naufal Fallah Abdullah Al Amri', 'Laki-laki', 'Islam', 'Manggung', '2006-08-03', 'Manggung Condongcatur Depok Sleman', '085356767463', '', '2014', 'Aktif'),
('S0132', '1121012', 'Naufal Ardya Dhaifullah', 'Laki-laki', 'Islam', 'Kayen', '2006-10-30', 'Kayen Condongcatur Depok Sleman', '08754654433', '', '2014', 'Aktif'),
('S0131', '1121011', 'Muhammad Farhan Mustanir', 'Laki-laki', 'Islam', 'Kayen', '2006-01-14', 'Kayen Condongcatur Depok Sleman', '082345667324', '', '2014', 'Aktif'),
('S0130', '1121010', 'Hanifah Zahra Fitriani ', 'Perempuan', 'Islam', 'Sedan', '2006-05-18', 'Sedan RT 01 RW 33 Sardonoharjo Ngaglik Sleman', '084566754342', '', '2014', 'Aktif'),
('S0129', '1121009', 'Fakhri Noor Eka Nugraha', 'Laki-laki', 'Islam', 'Kayen', '2006-09-24', 'Kayen Condongcatur Depok Sleman', '082734873245', '', '2014', 'Aktif'),
('S0128', '1121008', 'Fairuz Fakhirah Hasna ', 'Perempuan', 'Islam', 'Plemburan', '2006-03-21', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '086632887543', '', '2014', 'Aktif'),
('S0127', '1121007', 'Fahriza Ananda Putra Ripwansyah', 'Laki-laki', 'Islam', 'Kayen', '2006-07-27', 'Kayen Condongcatur Depok Sleman', '085634287289', '', '2014', 'Aktif'),
('S0126', '1121006', 'Arya Andi Prastia ', 'Laki-laki', 'Islam', 'Banteng', '2006-01-11', 'Banteng  Sinduharjo Ngaglik Sleman', '086837473274', '', '2014', 'Aktif'),
('S0125', '1121005', 'Aprilia Dwi Nuraini', 'Perempuan', 'Islam', 'Purwosari', '2006-02-28', 'Purwosari Sinduadi Mlati', '081734837346', '', '2014', 'Aktif'),
('S0124', '1121004', 'Andika Syafullah Yusuf', 'Laki-laki', 'Islam', 'Kayen', '2006-07-25', 'Kayen Condongcatur Depok Sleman', '085637237487', '', '2014', 'Aktif'),
('S0123', '1121003', 'Andi Muhammad Navies Syawal', 'Laki-laki', 'Islam', 'Purwosari', '2006-05-02', 'Purwosari Sinduadi Mlati', '082734264237', '', '2014', 'Aktif'),
('S0122', '1121002', 'Alishafa Azzahra Mahyuda', 'Perempuan', 'Islam', 'Kayen', '2006-09-25', 'Kayen Condongcatur Depok Sleman', '081525262746', '', '2014', 'Aktif'),
('S0121', '1121001', 'Adinda Chika Nuraini', 'Perempuan', 'Islam', 'Gejayan', '2006-03-18', 'Gejayan Condongcatur Depok Sleman', '08936473274', '', '2014', 'Aktif'),
('S0120', '1122033', 'Yoganta Aurelian Ramadhani', 'Laki-laki', 'Islam', 'Kayen', '2007-09-11', 'Kayen Condongcatur Depok Sleman', '08999473567', '', '2015', 'Aktif'),
('S0119', '1122032', 'Vanesha Ayu Risdiana Mentari', 'Perempuan', 'Islam', 'Kayen', '0000-00-00', 'Kayen Condongcatur Depok Sleman', '083352468734', '', '2015', 'Aktif'),
('S0118', '1122031', 'Siti Najwati Al Azizah', 'Perempuan', 'Islam', 'Sono', '2007-09-28', 'Sono RT 05/RW 60 SDA Mlati', '082647657437', '', '2014', 'Aktif'),
('S0117', '1122030', 'Rangga Satria Wibowo', 'Laki-laki', 'Islam', 'Karangjati', '2007-03-19', 'Karangjati RT 27/2 Minomartani Ngaglik', '083523472634', '', '2015', 'Aktif'),
('S0116', '1122029', 'Rangga Ahmad Fahrexi', 'Laki-laki', 'Islam', 'Kayen', '2007-06-19', 'Kayen Condongcatur Depok Sleman', '083654838574', '', '2015', 'Aktif'),
('S0115', '1122028', 'Pandu Al Hakim', 'Laki-laki', 'Islam', 'Kadirejo', '2007-03-14', 'Kadirejo RT 04/RW 25 Sinduharjo Ngaglik Sleman', '085364237423', '', '2015', 'Aktif'),
('S0114', '1122027', 'Octaviano Rizqi Ramadhani', 'Laki-laki', 'Islam', 'Kayen', '2007-09-02', 'Kayen Condongcatur Depok Sleman', '081536453262', '', '2015', 'Aktif'),
('S0113', '1122026', 'Nur Aisyah', 'Perempuan', 'Islam', 'Plemburan', '2007-02-13', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '08968876555', '', '2015', 'Aktif'),
('S0112', '1122025', 'Nafisah Nailal Husna', 'Perempuan', 'Islam', 'Kayen', '2007-05-30', 'Kayen Condongcatur Depok Sleman', '083666787767', '', '2015', 'Aktif'),
('S0111', '1122024', 'Muhammad Rizki', 'Laki-laki', 'Islam', 'Kayen', '2007-07-29', 'Kayen Condongcatur Depok Sleman', '081434657676', '', '2015', 'Aktif'),
('S0110', '1122023', 'Muhammad Rasyada Al Hafidh', 'Laki-laki', 'Islam', 'Gandok', '2007-12-01', 'Gandok RT 03/RW 20 Sinduharjo', '085546756544', '', '2015', 'Aktif'),
('S0109', '1122022', 'Melan Tasya Putry', 'Perempuan', 'Islam', 'Sono', '2007-03-11', 'Sono RT 07/RW 61 SIA Mlati', '085455675435', '', '2015', 'Aktif'),
('S0108', '1122021', 'Mahendra Dimas Prasetya', 'Laki-laki', 'Islam', 'Banteng', '2007-06-17', 'Banteng  Sinduharjo Ngaglik Sleman', '081344656566', '', '2015', 'Aktif'),
('S0107', '1122020', 'Keisya Widya Nur Khairunisa', 'Perempuan', 'Islam', 'Kayen', '2007-03-15', 'Kayen Condongcatur Depok Sleman', '085657678545', '', '2015', 'Aktif'),
('S0106', '1122019', 'Hisnu Ahdana Risang', 'Laki-laki', 'Islam', 'PP. Budi Mulia Banteng', '2007-11-06', 'PP.Budi Mulia Banteng 3 Tiyasan', '085457667455', '', '2015', 'Aktif'),
('S0105', '1122018', 'Hasna Faizatul Aqla', 'Perempuan', 'Islam', 'Sumberan', '2007-10-03', 'Sumberan Sariharjo Ngaglik', '082455667673', '', '2015', 'Aktif'),
('S0104', '1122017', 'Ferdian Putra Pratama', 'Laki-laki', 'Islam', 'Kayen', '2007-04-17', 'Kayen Condongcatur Depok Sleman', '086554532324', '', '2015', 'Aktif'),
('S0103', '1122016', 'Fariz Hidayat', 'Laki-laki', 'Islam', 'Plemburan', '2007-05-29', 'Plemburan RT 5/25 Tegal Sariharjo Ngaglik Sleman', '08974465433', '', '2015', 'Aktif'),
('S0102', '1122015', 'Dini Aulia Akhmad Samudra', 'Perempuan', 'Islam', 'Kayen', '2007-09-26', 'Kayen Condongcatur Depok Sleman', '088767655456', '', '2015', 'Aktif'),
('S0101', '1122014', 'Diana Sartika Putri', 'Perempuan', 'Islam', 'Kayen', '2007-06-13', 'Kayen Condongcatur Depok Sleman', '085546576744', '', '2015', 'Aktif'),
('S0100', '1122013', 'Darrel Raissa Putra Perdana', 'Laki-laki', 'Islam', 'Kadipuro', '2007-01-08', 'Kadipuro RT 04/RW 24 Sinduharjo Ngaglik Sleman', '082555455466', '', '2015', 'Aktif'),
('S0099', '1122012', 'Cika Juliana', 'Perempuan', 'Islam', 'Kayen', '2007-10-09', 'Kayen RT 5/RW 44 Condongcatur Depok Sleman', '0896675e434', '', '2015', 'Aktif'),
('S0098', '1122011', 'Az Zahra Mulia Kana Hurun', 'Perempuan', 'Islam', 'Purwosari', '2007-04-17', 'Gg. Bali C12 RT. 3/ RW 59 Purwosari SDA Mlati Sleman YK', '085454763456', '', '2015', 'Aktif'),
('S0097', '1122010', 'Aulia Puan Pramudhita', 'Perempuan', 'Islam', 'Nglinggan', '2007-09-18', 'Nglinggan Wedomartani Ngemplak', '083657676743', '', '2015', 'Aktif'),
('S0096', '1122009', 'Aprisya Intan Rengganis', 'Perempuan', 'Islam', 'Kayen', '2007-01-06', 'Kayen Condongcatur Depok Sleman RT 01/RW 43', '082444556456', '', '2015', 'Aktif'),
('S0095', '1122008', 'Amanda Aprilia', 'Perempuan', 'Islam', 'Purwosari', '2007-08-24', 'Purwosari RT 03/59 Sinduadi Mlati', '083645764332', '', '2015', 'Aktif'),
('S0094', '1122007', 'Aida Fitria Utami', 'Perempuan', 'Islam', 'Kayen', '2007-06-05', 'Kayen Condongcatur Depok Sleman', '081362642363', '', '2015', 'Aktif'),
('S0093', '1122006', 'Agia Najdwa Nayla', 'Perempuan', 'Islam', 'Banteng', '2007-09-12', 'Banteng Baru V17', '08983746734', '', '2015', 'Aktif'),
('S0092', '1122005', 'Adrian Supra Admajaya', 'Laki-laki', 'Islam', 'Lempongsari', '2007-11-22', 'Lempongsari lor No.28', '085364534652', '', '2015', 'Aktif'),
('S0091', '1122004', 'Absah Ayu Ekabri', 'Perempuan', 'Islam', 'Kayen', '2007-12-14', 'Kayen Condongcatur Depok Sleman RT 04/RW 44', '081673643266', '', '2015', 'Aktif'),
('S0090', '1122003', 'Abdurrosyid', 'Laki-laki', 'Islam', 'Sumberan', '2007-07-24', 'Sumberan Sariharjo Ngaglik', '08956426347', '', '2015', 'Aktif'),
('S0089', '1122002', 'Muhammad Nabiel Rifqi Akbar', 'Laki-laki', 'Islam', 'Plemburan', '2007-05-08', 'Plemburan RT. 04 RW. 25 Sariharjo Ngaglik Sleman', '085783267843', '', '2015', 'Aktif'),
('S0088', '1122001', 'Dwi Ardi Saputra', 'Laki-laki', 'Islam', 'Kayen', '2007-03-20', 'Kayen Condongcatur Depok Sleman', '085437634461', '', '2015', 'Aktif'),
('S0087', '1123034', 'Zaky Alfaruuq', 'Laki-laki', 'Islam', 'Banteng', '2008-10-21', 'Jl.Banteng Perkasa Sindoharjo Ngaglik Sleman', '08972352451', '', '2016', 'Aktif'),
('S0086', '1123033', 'Zahra Arsyila', 'Perempuan', 'Islam', 'Perum Dayu Permai', '2008-06-25', 'Perum Dayu Permai', '082675426454', '', '2016', 'Aktif'),
('S0085', '1123032', 'Yahya Aufa Zarif', 'Laki-laki', 'Islam', 'Kaliurang', '2008-06-18', 'Jl. Kaliurang Km.7  Gg.Pandega Sakti', '085743626423', '', '2016', 'Aktif'),
('S0084', '1123031', 'Wiky Arkadianto', 'Laki-laki', 'Islam', 'Jaban', '2008-12-19', 'Jaban sinduharjo Ngaglik Sleman', '085364764742', '', '2016', 'Aktif'),
('S0083', '1123030', 'Tazkiyatul Hayah', 'Perempuan', 'Islam', 'Perum Banteng Baru', '2008-03-08', 'Perum Banteng Baru Sinduharjo Ngaglik Sleman', '08974653247', '', '2016', 'Aktif'),
('S0082', '1123029', 'Talitha Zahra Widyadhana', 'Perempuan', 'Islam', 'Nglompongsari ', '2008-10-12', 'Nglompongsari Sariharjo Ngaglik Sleman', '085457735723', '', '2016', 'Aktif'),
('S0081', '1123028', 'Satria Marsha Aufa', 'Laki-laki', 'Islam', 'Plemburan', '2008-09-16', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '08983464764', '', '2016', 'Aktif'),
('S0080', '1123027', 'Satria Adi Pratama', 'Laki-laki', 'Islam', 'Kayen', '2008-04-29', 'Kayen Condongcatur Depok Sleman', '081666435366', '', '2016', 'Aktif'),
('S0079', '1123026', 'Rinto Hano Syaputra', 'Laki-laki', 'Islam', 'Kentungan', '2008-08-28', 'Kentungan Condongcatur Depok Sleman', '082847337361', '', '2016', 'Aktif'),
('S0078', '1123025', 'Rena Rahmadhani', 'Perempuan', 'Islam', 'Sengkan', '2008-06-01', 'Sengkan Codongcatur Depok Sleman ', '085763478543', '', '2016', 'Aktif'),
('S0077', '1123024', 'Raditya Ramadhani', 'Laki-laki', 'Islam', 'Kayen', '2008-02-24', 'Kayen Condongcatur Depok Sleman', '089946t32744', '', '2016', 'Aktif'),
('S0076', '1123023', 'Noehan Ardhana Pamungkas', 'Laki-laki', 'Islam', 'Plagrak', '2008-09-13', 'Plagrak Wukirsari Cangkringan Sleman', '081377474768', '', '2016', 'Aktif'),
('S0075', '1123022', 'Muh Fadil Abdurrahman', 'Laki-laki', 'Islam', 'Wonorejo', '2008-01-08', 'Wonorejo Sariharjo Ngaglik Sleman', '08946363565', '', '2016', 'Aktif'),
('S0074', '1123021', 'Muh Alif Laksmono Putro', 'Laki-laki', 'Islam', 'Banteng', '2008-07-23', 'Banteng  Sinduharjo Ngaglik Sleman', '085434635778', '', '2016', 'Aktif'),
('S0073', '1123020', 'Moh Fauzan Abdillah', 'Laki-laki', 'Islam', 'Kayen', '2008-06-15', 'Kayen Condongcatur Depok Sleman', '085327483245', '', '2016', 'Aktif'),
('S0072', '1123019', 'Maritza Fitriyaningrum', 'Perempuan', 'Islam', 'Sembung', '2008-09-10', 'Sembung Purwobinangun Pakem Sleman', '08936564534', '', '2016', 'Aktif'),
('S0071', '1123018', 'Mahfud Sidiq', 'Laki-laki', 'Islam', 'Jongkang', '2008-01-22', 'Jongkang Sariharjo Ngaglik Sleman', '085374723365', '', '2016', 'Aktif'),
('S0070', '1123017', 'M Ubaidillah Raksa Permana', 'Laki-laki', 'Islam', 'Plemburan', '2008-04-02', 'Plemburan Sariharjo Ngaglik Sleman', '08946632463', '', '2016', 'Aktif'),
('S0069', '1123016', 'Juno Jalaluddin Wiratama', 'Laki-laki', 'Islam', 'Lempongsari ', '2008-03-18', 'Lempongsari Sariharjo Ngaglik Sleman', '083456664434', '', '2016', 'Aktif'),
('S0068', '1123015', 'Hasna Humaira', 'Perempuan', 'Islam', 'Tegalmojo', '2008-10-05', 'Tegalmojo Sariharjo Ngaglik Sleman', '085365433234', '', '2016', 'Aktif'),
('S0067', '1123014', 'Ezalina Dwi Lestari', 'Perempuan', 'Islam', 'Kayen', '2008-04-01', 'Kayen Condongcatur Depok Sleman', '08967443332', '', '2016', 'Aktif'),
('S0066', '1123013', 'Dinda Alifah Risqi', 'Perempuan', 'Islam', 'Kayen', '2008-02-11', 'Kayen Condongcatur Depok Sleman', '083765765446', '', '2016', 'Aktif'),
('S0065', '1123012', 'Dinavisa Kartika Melya', 'Perempuan', 'Islam', 'Kayen', '2008-06-28', 'Kayen Condongcatur Depok Sleman', '085546844322', '', '2016', 'Aktif'),
('S0064', '1123011', 'Bunga Carlita Hartono', 'Perempuan', 'Islam', 'Perum Banteng Baru', '2009-08-09', 'Perum Banteng Baru', '08967576543', '', '2016', 'Aktif'),
('S0063', '1123010', 'Arifa Dwi Ananda', 'Laki-laki', 'Islam', 'Kayen', '2008-01-16', 'Kayen Condongcatur Depok Sleman', '08143466443', '', '2016', 'Aktif'),
('S0062', '1123009', 'Anindi Zahra Nisa Irianty', 'Perempuan', 'Islam', 'K', '2008-11-18', 'Kayen Condongcatur Depok Sleman', '085456566452', '', '2016', 'Aktif'),
('S0061', '1123008', 'Angger Vio Atmaja', 'Laki-laki', 'Islam', 'Kayen', '2008-04-27', 'Kayen Condongcatur Depok Sleman', '08963526461', '', '2016', 'Aktif'),
('S0060', '1123007', 'Andhika Wahyu Purnama', 'Laki-laki', 'Islam', 'Krikilan', '2008-02-19', 'Krikilan Sariharjo Ngaglik Sleman', '081764387548', '', '2016', 'Aktif'),
('S0059', '1123006', 'Amru Muhammad Hilmi Khalid', 'Laki-laki', 'Islam', 'Banteng', '2008-06-05', 'Jl.Banteng Raya Sindoharjo Ngaglik Sleman', '08264763478', '', '2016', 'Aktif'),
('S0058', '1123005', 'Aliveano Pradipta Erghianata', 'Laki-laki', 'Islam', 'Mrican', '2008-12-26', 'Mrican Condongcatur Depok Sleman', '98563643455', '', '2016', 'Aktif'),
('S0057', '1123004', 'Akbar Syaqif Assajid Tanjung', 'Laki-laki', 'Islam', 'Nglaban', '2008-05-09', 'Nglaban Sinduharjo Ngaglik Sleman', '08264647374', '', '2016', 'Aktif'),
('S0056', '1123003', 'Aisyah Nur Shazwin', 'Perempuan', 'Islam', 'Kayen', '2008-08-13', 'Kayen Condongcatur Depok Sleman', '081376374763', '', '2016', 'Aktif'),
('S0055', '1123002', 'Aisyah Afaf Fitri Fadillah', 'Perempuan', 'Islam', 'Kadipuro', '2008-10-07', 'Kadipuro Sinduharjo Ngaglik Sleman', '08976535324', '', '2016', 'Aktif'),
('S0054', '1123001', 'Abyan Fatih Fauzan', 'Laki-laki', 'Islam', 'Nglempongsari', '2008-11-21', 'Nglempongsari', '08523735317', '', '2016', 'Aktif'),
('S0053', '1124053', 'Zahra Ayudya Lestari', 'Perempuan', 'Islam', 'Pugeran', '2009-02-11', 'Pugeran Maguwoharjo Depok Sleman', '08267458745', '', '2017', 'Aktif'),
('S0052', '1124052', 'Wahyu Andriani Putri', 'Perempuan', 'Islam', 'Ngabean', '2009-11-21', 'Ngabean Kulon Sinduharjo Ngaglik', '08523432785', '', '2017', 'Aktif'),
('S0051', '1124051', 'Wahyu Andriana Putri', 'Perempuan', 'Islam', 'Ngabean', '2009-11-21', 'Ngabean Kulon Sinduharjo Ngaglik', '08538943873', '', '2017', 'Aktif'),
('S0050', '1124050', 'Sheva Alvino Putra Artanto', 'Laki-laki', 'Islam', 'Kayen', '2009-06-29', 'Kayen Condongcatur Depok Sleman', '0896732463', '', '2017', 'Aktif'),
('S0049', '1124049', 'Rizky Ramadhan', 'Laki-laki', 'Islam', 'Plemburan', '2009-08-04', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '08232643286', '', '2017', 'Aktif'),
('S0048', '1124048', 'Rangga Etka Saputra', 'Laki-laki', 'Islam', 'Kayen', '2009-02-27', 'Kayen Condongcatur Depok Sleman', '08174654376', '', '2017', 'Aktif'),
('S0047', '1124047', 'Nur Fatihah Zalaiha', 'Perempuan', 'Islam', 'Sono', '2009-10-15', 'Sono Sinduadi Mlati Sleman', '08384573498', '', '2017', 'Aktif'),
('S0046', '1124046', 'Nita Nur Hasanah', 'Perempuan', 'Islam', 'Banteng', '2009-05-07', 'Banteng Sinduharjo Ngaglik Sleman', '08573877321', '', '2017', 'Aktif'),
('S0045', '1124045', 'Nisa Azzalia', 'Perempuan', 'Islam', 'Plemburan', '2009-04-26', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '08247858349', '', '2017', 'Aktif'),
('S0044', '1124044', 'Nasywa Anaya Zaskia ', 'Perempuan', 'Islam', 'Kadirejo', '2009-08-28', 'Kadirejo Sinduharjo Ngaglik Sleman', '08936475322', '', '2017', 'Aktif'),
('S0043', '1124043', 'Nareswari Andriana Cahyaningrum', 'Perempuan', 'Islam', 'Krikilan', '2009-12-01', 'Krikilan', '08537628772', '', '2017', 'Aktif'),
('S0042', '1124042', 'Muhammad Daim Nurrasyid', 'Laki-laki', 'Islam', 'Sono', '2009-09-15', 'Sono Sinduadi Mlati Sleman', '082745645878', '', '2017', 'Aktif'),
('S0041', '1124041', 'Mahmud Ali Hasan', 'Laki-laki', 'Islam', 'Jongkang', '2009-05-24', 'Jongkong Sariharjo Ngaglik', '082478545777', '', '2017', 'Aktif'),
('S0040', '1124040', 'Karina Ramadhani', 'Perempuan', 'Islam', 'Wonorejo', '2009-08-19', 'Wonorejo Sariharjo Ngaglik Sleman', '085347484887', '', '2017', 'Aktif'),
('S0039', '1124039', 'Ekhsan Muhammad Saputra', 'Laki-laki', 'Islam', 'Kayen', '2017-06-03', 'Kayen Condongcatur Depok Sleman', '08284545759', '', '2017', 'Aktif'),
('S0038', '1124038', 'Danang Triatma Roy', 'Laki-laki', 'Islam', 'Kentungan', '2009-11-01', 'Kentungan Condongcatur Depok Sleman', '081894355894', '', '2017', 'Aktif'),
('S0037', '1124037', 'Daffa Arka Mutawakkil', 'Laki-laki', 'Islam', 'Sono', '2009-06-10', 'Sono Sinduadi Mlati Sleman', '08532747837', '', '2017', 'Aktif'),
('S0036', '1124036', 'Chickal Gading Novanto P', 'Laki-laki', 'Islam', 'Ngentak', '2009-10-22', 'Ngentak Sinduharjo Ngaglik Sleman', '08932643756', '', '2017', 'Aktif'),
('S0035', '1124035', 'Cantika Eilen Febriyanti', 'Perempuan', 'Islam', 'Klabanan', '2009-11-23', 'Klabanan Sariharjo Ngaglik Sleman', '081763272567', '', '2017', 'Aktif'),
('S0034', '1124034', 'Bintang Jafin Nurrasydan', 'Laki-laki', 'Islam', 'Plemburan', '2009-02-14', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '083647543889', '', '2017', 'Aktif'),
('S0033', '11124033', 'Arvilla Nur Dharma Putra Agung ', 'Laki-laki', 'Islam', 'Kayen', '2009-02-08', 'Kayen Condongcatur Depok Sleman', '0893767453', '', '2017', 'Aktif'),
('S0032', '1124032', 'Alya Rahma Fadhilah', 'Perempuan', 'Islam', 'Banteng', '2009-07-10', 'Banteng Sinduharjo Ngaglik Sleman', '0893263426', '', '2017', 'Aktif'),
('S0031', '1124031', 'Akbar Gilang Pamungkas', 'Laki-laki', 'Islam', 'Klewonan', '2009-12-21', 'Klewonan Bimomartani Ngemplak Sleman', '081226374678', '', '2017', 'Aktif'),
('S0030', '1124030', 'Affan Yasin', 'Laki-laki', 'Islam', 'Kaliurang', '2009-04-17', 'Kaliurang KM. 9.6 Ngebel Cilik', '08966567546', '', '2017', 'Aktif'),
('S0029', '1124029', 'Zharif Bhadra Sahwahita', 'Laki-laki', 'Islam', 'Ngabean', '2009-05-23', 'Ngabean Kulon Sinduharjo Ngaglik', '08963462356', '', '2017', 'Aktif'),
('S0028', '1124028', 'Vania Aulia Niswara', 'Perempuan', 'Islam', 'Kancilan', '2009-12-06', 'Kancilan Sinduharjo Ngaglik Sleman', '08543236267', '', '2017', 'Aktif'),
('S0027', '1124027', 'Sinatria Alfarezel Hartono', 'Laki-laki', 'Islam', 'Perum Banteng', '2009-11-28', 'Perum Banteng Sinduharjo Ngaglik Sleman', '081737467565', '', '2017', 'Aktif'),
('S0026', '1124026', 'Satria Addakhil Akhmad Samudra', 'Laki-laki', 'Islam', 'Kayen', '2009-08-03', 'Kayen Condongcatur Depok Sleman', '085637462363', '', '2017', 'Aktif'),
('S0025', '1124025', 'Ruqoyyah', 'Perempuan', 'Islam', 'Plemburan', '2009-05-25', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '082674357846', '', '2017', 'Aktif'),
('S0024', '1124024', 'Renandra Reihan Eka Prasetya', 'Laki-laki', 'Islam', 'Kentungan', '2009-10-19', 'Kentungan Condongcatur Depok Sleman', '08996436345', '', '2017', 'Aktif'),
('S0023', '1124023', 'Rahma Yuliana', 'Perempuan', 'Islam', 'Kayen', '2009-03-28', 'Kayen Raya Condongcatur Depok Sleman', '08167363782', '', '2017', 'Aktif'),
('S0022', '1124022', 'Rahma Muflihatus Tsaniyyah', 'Perempuan', 'Islam', 'Sono', '2009-05-26', 'Sono Sinduadi Mlati Sleman', '08533783253', '', '2017', 'Aktif'),
('S0021', '1124021', 'Queena Abhinayu Norito', 'Perempuan', 'Islam', 'Jombor', '2009-08-17', 'Jombor Lor', '08363256557', '', '2017', 'Aktif'),
('S0020', '1124020', 'Nurrafa Daffito Fahrizal', 'Laki-laki', 'Islam', 'Bendosari', '2009-10-11', 'Bendosari Sariharjo Ngaglik  Sleman', '082548756456', '', '2017', 'Aktif'),
('S0019', '1124019', 'Najwa Khairunisa', 'Perempuan', 'Islam', 'Ngabean', '2009-09-02', 'Ngabean Kulon Sinduharjo Ngaglik', '08523432785', '', '2017', 'Aktif'),
('S0018', '1124018', 'Muh. Dzulfadhli Fayyadh', 'Laki-laki', 'Islam', 'Gejayan', '2009-01-08', 'Gejayan Condongcatur Depok Sleman', '08935463556', '', '2017', 'Aktif'),
('S0017', '1124017', 'Muh Farij Ardiansyah', 'Laki-laki', 'Islam', 'Sono', '2009-08-15', 'Sono Sinduadi Mlati Sleman', '085327834347', '', '2017', 'Aktif'),
('S0016', '1124016', 'Muh Nuh Al Ghazy Ramadhan H', 'Laki-laki', 'Islam', 'Kayen', '2009-07-21', 'Kayen Condongcatur Depok Sleman', '08753654541', '', '2017', 'Aktif'),
('S0015', '1124015', 'Mehrunisa Asfa Qiza Rizki', 'Perempuan', 'Islam', 'Kentungan', '2009-03-09', 'Kentungan Condongcatur Depok Sleman', '0896465365', '', '2017', 'Aktif'),
('S0014', '1124014', 'Keisha Mei Arbi Ahzahra', 'Perempuan', 'Islam', 'Drono', '2009-05-27', 'Drono Sardonoharjo Ngaglik Sleman', '08234635657', '', '2017', 'Aktif'),
('S0013', '1124013', 'Isthafa Rafif Putra Dwi Erlangga', 'Laki-laki', 'Islam', 'Kadiporo', '2009-11-04', 'Kadiporo Sinduharjo Ngaglik Sleman', '084243461237', '', '2017', 'Aktif'),
('S0012', '1124012', 'Ina Nur Setyaningsih', 'Perempuan', 'Islam', 'Purwosari', '2009-01-07', 'Purwosari Sinduharjo Ngaglik Sleman', '0816534676475', 'S0012.', '2017', 'Aktif'),
('S0011', '1124011', 'Ginta Dayana Batrisiya', 'Perempuan', 'Islam', 'Prujakan', '2009-09-13', 'Prujakan Sinduharjo Ngaglik Sleman', '08963263265', '', '2017', 'Aktif'),
('S0010', '1124010', 'Fadila Husna Karimah', 'Perempuan', 'Islam', 'Plemburan', '0000-00-00', 'Plemburan Tegal Sariharjo Ngaglik Sleman', '08432342156', '', '2017', 'Aktif'),
('S0009', '1124009', 'Fachri Dwi Arifin', 'Laki-laki', 'Islam', 'Ledokwareng', '2009-02-08', 'Ledokwareng Sardonoharjo Nganlik Sleman', '08646367236', '', '2017', 'Aktif'),
('S0008', '1124008', 'Casey Aufa Rabbani', 'Perempuan', 'Islam', 'Kayen', '2017-06-03', 'Kayen Condongcatur Depok Sleman', '085235436223', 'S0008.', '2017', 'Aktif'),
('S0007', '1124007', 'Bagas Satria Wahyudi', 'Laki-laki', 'Islam', 'Kayen', '2009-08-16', 'Kayen Condongcatur Depok Sleman', '086473539473', 'S0007.', '2017', 'Aktif'),
('S0006', '1124006', 'Awfa Aqyeda Alfarezy', 'Perempuan', 'Islam', 'Klabanan', '2010-10-13', 'Klabanan Sardonoharjo Ngaglik Sleman', '08199789055', 'S0006.', '2017', 'Aktif'),
('S0005', '1124005', 'Aulian Bayu Septo Adi', 'Laki-laki', 'Islam', 'Palagan', '2009-07-17', 'Palagan Sariharjo Ngalik Sleman', '081997890589', '', '2017', 'Aktif'),
('S0004', '1124004', 'Auran Isra Nurbuwana Putri', 'Perempuan', 'Islam', 'Kayen', '2009-06-26', 'Kayen CondongCatur Depok Sleman', '081997890575', '', '2017', 'Aktif'),
('S0003', '1124003', 'Athiyyah Laili Hasya', 'Perempuan', 'Islam', 'Kolombo Baru', '2009-12-08', 'Kolombo Baru Condong Catur Depok Sleman', '081997890574', '', '2017', 'Aktif'),
('S0002', '1124002', 'Agrasya Delani Atmadera', 'Laki-laki', 'Islam', 'Ganjuran', '2009-07-08', 'Ganjuran Manukan Condongcatur Depok Sleman', '081997890575', '', '2017', 'Aktif'),
('S0001', '1124001', 'Abuld Qodir', 'Laki-laki', 'Islam', 'Pelmburan', '2009-02-09', 'Pelmburan Sariharjo Ngalik Sleman', '081997890576', 'S0001.tareq.jpg', '2017', 'Aktif'),
('S0183', '1120035', 'Aisyah Fadillatun Karomah', 'Perempuan', 'Islam', 'Kaliurang', '2005-10-14', 'Jl. Kaliurang Km.6,5  Gg. Sindoro C. 12', '083616320807', '', '2013', 'Aktif'),
('S0184', '1120036', 'Azahra Kynaya', 'Perempuan', 'Islam', 'Banteng', '2005-06-16', 'Banteng  Sinduharjo Ngaglik Sleman', '08997342037', '', '2013', 'Aktif'),
('S0185', '1119001', 'Aisyah Putri Wardani', 'Perempuan', 'Islam', 'Sono', '2004-02-09', 'Sono Sinduadi Mlati Sleman', '086538231037', '', '2012', 'Aktif'),
('S0186', '1119002', 'Anggi Fiyanto', 'Laki-laki', 'Islam', 'Sono', '2005-09-20', 'Sono Sinduadi Mlati Sleman', '081278390347', '', '2012', 'Aktif'),
('S0187', '1119003', 'Bagas Prasetyo', 'Laki-laki', 'Islam', 'Kayen', '2004-08-24', 'Kayen Condongcatur Depok Sleman', '08973863790', '', '2012', 'Aktif'),
('S0188', '1119004', 'Farhan Al Fikri Ramadani', 'Laki-laki', 'Islam', 'Sono', '2005-04-01', 'Sono Sinduadi Mlati Sleman', '082740480283', '', '2012', 'Aktif'),
('S0189', '1119005', 'Neny Nurmaya', 'Perempuan', 'Islam', 'Kayen', '2004-10-25', 'Kayen Condongcatur Depok Sleman', '085094865402', '', '2012', 'Aktif'),
('S0190', '1119006', 'Afrina Yudha Setyaningsih', 'Perempuan', 'Islam', 'Kayen', '2004-02-13', 'Kayen Condongcatur Depok Sleman', '08964233682', '', '2012', 'Aktif'),
('S0191', '1119007', 'Alifia Nilam Amalia ', 'Perempuan', 'Islam', 'Banteng', '2004-08-15', 'Banteng  Sinduharjo Ngaglik Sleman', '081039474721', '', '2012', 'Aktif'),
('S0192', '1119008', 'Adya Qadira', 'Perempuan', 'Islam', 'Kayen', '2004-04-28', 'Kayen Condongcatur Depok Sleman', '085364983242', '', '2012', 'Aktif'),
('S0193', '1119009', 'Annisa Sabrina Rhomadhona', 'Perempuan', 'Islam', 'Kaliurang', '2004-11-17', 'Jl. Kaliurang Km.6,5  Gg. Timor-timor', '08916538031', '', '2012', 'Aktif'),
('S0194', '1119010', 'Aprilia Puspita Sari', 'Perempuan', 'Islam', 'Kayen', '2004-07-29', 'Kayen Condongcatur Depok Sleman', '083520283077', '', '2012', 'Aktif'),
('S0195', '1119011', 'Ardhia Indriani Davina', 'Perempuan', 'Islam', 'Bandung', '2004-03-11', 'Komplek Perum Unisba Mandala Mekar Sakinah Bandung', '085576429010', '', '2012', 'Aktif'),
('S0196', '1119012', 'Bagus Kurnianto Nugroho', 'Laki-laki', 'Islam', 'Kayen', '2004-12-23', 'Kayen Condongcatur Depok Sleman', '081241630372', '', '2012', 'Aktif'),
('S0197', '1119013', 'Destin Zahra Arindhita', 'Perempuan', 'Islam', 'Wonorejo', '2004-01-16', 'Wonorejo Sariharjo Ngaglik Sleman', '086734830214', '', '2012', 'Aktif'),
('S0198', '1119014', 'Edi Ristanto', 'Laki-laki', 'Islam', 'Kayen', '2004-07-18', 'Kayen Condongcatur Depok Sleman', '082098308317', '', '2012', 'Aktif'),
('S0199', '1119015', 'Faisal Tamimi', 'Laki-laki', 'Islam', 'Rejodani', '2004-10-08', 'Rejodani Sariharjo Ngaglik Sleman', '084353683829', '', '2012', 'Aktif'),
('S0200', '1119016', 'Fakhriza Cahya Pratama', 'Laki-laki', 'Islam', 'Kayen', '2004-02-19', 'Kayen Condongcatur Depok Sleman', '0897203617', '', '2012', 'Aktif'),
('S0201', '1119017', 'Faya Attala Putri Arfiani', 'Perempuan', 'Islam', 'Sono', '2004-12-27', 'Sono Sinduadi Mlati Sleman', '083630103648', '', '2012', 'Aktif'),
('S0202', '1119018', 'Haikal Hira Rahmanta', 'Laki-laki', 'Islam', 'Kayen', '2004-04-24', 'Kayen Condongcatur Depok Sleman', '085001328901', '', '2012', 'Aktif'),
('S0203', '1119019', 'Helsa Illona Putri ardani', 'Perempuan', 'Islam', 'Kayen', '2004-11-16', 'Kayen Condongcatur Depok Sleman', '084636837102', '', '2012', 'Aktif'),
('S0204', '1119020', 'Kaila Ayu Khairunisa', 'Perempuan', 'Islam', 'Sarimulyo', '2004-01-07', 'Sarimulyo Caturtunggal Depok Sleman', '082334807233', '', '2012', 'Aktif'),
('S0205', '1119021', 'Maulidia Alya Azzahra', 'Laki-laki', 'Islam', 'Kabunan', '2004-09-05', 'Kabunan Widodomartini Ngemplek Sleman', '082532834078', '', '2012', 'Aktif'),
('S0206', '1119022', 'Muhammad Agfa Fadhlan', 'Laki-laki', 'Islam', 'Sinduharjo', '2004-06-18', 'Pusung Utama Sinduharjo Ngaglik Sleman', '083920913734', '', '2012', 'Aktif'),
('S0207', '1119023', 'Muhammad Alfarizi Prabowo', 'Laki-laki', 'Islam', 'Kayen', '2004-01-05', 'Kayen Condongcatur Depok Sleman', '081267303483', '', '2012', 'Aktif'),
('S0208', '1119024', 'Muhammad Nurul Falah', 'Laki-laki', 'Islam', 'Sono', '2004-10-13', 'Sono Sinduadi Mlati Sleman', '085600034782', '', '2012', 'Aktif'),
('S0209', '1119025', 'Nailla Hayya Latifah', 'Perempuan', 'Islam', 'Ngabean', '2004-05-29', 'Ngabean Kulon Sinduharjo Ngaglik Sleman', '083263683402', '', '2012', 'Aktif'),
('S0210', '1119026', 'Novi Fitri Astuti', 'Perempuan', 'Islam', 'Ngabean', '2004-12-31', 'Ngabean Kulon Sinduharjo Ngaglik Sleman', '081007338219', '', '2012', 'Aktif'),
('S0211', '1119027', 'Purwaningsih', 'Perempuan', 'Islam', 'Sinduharjo', '2004-06-19', 'Prujaan Sinduharjo Ngaglik Sleman', '085343841074', '', '2012', 'Aktif'),
('S0212', '1119028', 'Raynal Riskunawan', 'Laki-laki', 'Islam', 'Kentungan', '2004-04-02', 'Kentungan Condongcatur Depok Sleman', '083074701074', '', '2012', 'Aktif'),
('S0213', '1119029', 'Reza Sasmita', 'Laki-laki', 'Islam', 'Ngemplak', '2004-09-28', 'Karangsari Wedomartani Ngemplak Sleman', '085108348733', '', '2012', 'Aktif'),
('S0214', '1119030', 'Selly Nurmala Dewi', 'Perempuan', 'Islam', 'Kayen', '2004-11-07', 'Kayen Condongcatur Depok Sleman', '08901823847', '', '2012', 'Aktif'),
('S0215', '1119031', 'Rizqi ', 'Laki-laki', 'Islam', 'Banteng', '2004-09-25', 'Banteng  Sinduharjo Ngaglik Sleman', '083634502891', '', '2012', 'Aktif'),
('S0216', '1119032', 'Alyssa Kailla Anindianto', 'Perempuan', 'Islam', 'Karangjati', '2004-07-26', 'Kadirejo Sinduharjo Ngaglik Sleman', '081243460284', '', '2012', 'Aktif'),
('S0217', '1119033', 'Nasywa Aliyah Syafira', 'Perempuan', 'Islam', 'Kayen', '2004-05-13', 'Kayen Condongcatur Depok Sleman', '085473202146', '', '2012', 'Aktif'),
('S0218', '1119034', 'Muh Naufal', 'Laki-laki', 'Islam', 'Sono', '2004-11-30', 'Sono Sinduadi Mlati Sleman', '087635437810', '', '2012', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` char(4) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama_user`, `username`, `password`, `level`) VALUES
('U001', 'Tri Setyo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('U002', 'Raka Adi Nugroho', 'rakaadi', '51991425fb5e29571bc3a27d5c450225', 2),
('U003', 'ulfih', 'ulfih', '2ef0b8ae2b8ea45b959294aa625b9678', 2),
('U004', 'mikiya', 'mikiya', '5248fa3ed36ff95c3d172c4253930f49', 2),
('U005', 'TRi', 'tri', 'd2cfe69af2d64330670e08efb2c86df7', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_pelajaran`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_peng`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_peng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
