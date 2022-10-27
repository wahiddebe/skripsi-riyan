-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 09, 2022 at 04:09 PM
-- Server version: 5.7.34
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `manajemen_TA`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkaskp`
--

CREATE TABLE `berkaskp` (
  `IdBerkas` int(11) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berkasmagang`
--

CREATE TABLE `berkasmagang` (
  `IdBerkas` int(11) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berkasta`
--

CREATE TABLE `berkasta` (
  `IdBerkas` int(11) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkasta`
--

INSERT INTO `berkasta` (`IdBerkas`, `Judul`, `TanggalPembuatan`, `File`) VALUES
(1, 'PERAK 2017', '21/03/2019', './images/BerkasTA/PERAK_2017.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `KodeDosen` varchar(5) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Beban` int(11) NOT NULL,
  `Beban2` int(11) NOT NULL,
  `TotalBeban` int(11) NOT NULL,
  `BebanKP` int(11) NOT NULL,
  `BebanMagang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`KodeDosen`, `Nama`, `Beban`, `Beban2`, `TotalBeban`, `BebanKP`, `BebanMagang`) VALUES
('-', '-', 0, 0, 0, 0, 0),
('AA', 'Ary Arvianto, ST.,MT', 0, 0, 0, 0, 1),
('AB', 'Dr. rer. Oec. Arfan Bakhtiar, ST.MT', 1, 0, 1, 0, 0),
('AS', 'Dr. Aries Susanty, ST.MT', 1, 0, 1, 0, 0),
('BP', 'Dr. Ir. B. Purwanggono, M.Eng', 1, 0, 1, 0, 0),
('DI', 'Dyah Ika Rinawati, ST.,MT.', 0, 0, 0, 0, 0),
('DIP', 'Diana Puspitasari, ST.MT', 0, 1, 1, 0, 0),
('DN', 'Dr. Denny Nurkertamanda, ST.,MT.', 0, 1, 1, 0, 0),
('DP', 'Darminto Pujotomo, ST.,MT.', 0, 1, 1, 0, 0),
('HES', 'Dr. Hery Suliantoro, ST.MT', 0, 0, 0, 0, 0),
('HP', 'Ir. Heru Prastawa, DEA', 0, 0, 0, 0, 0),
('HS', 'Dr. Ir. KRMT. Haryo Santoso, MM', 0, 0, 0, 1, 0),
('MM', 'Dr. A.A.S.Manik M.J.M, ST.M.Sc', 3, 0, 3, 0, 0),
('NB', 'Nia Budi Puspitasari, ST.MT', 0, 1, 1, 0, 0),
('NS', 'Dr. Ing. Novie Susanto, ST.M.Eng', 1, 0, 1, 0, 0),
('NU', 'Dr. Naniek Utami. H, S.si.MT', 0, 0, 0, 0, 0),
('PA', 'Dr. Purnawan Adi. W, ST.MT', 0, 3, 3, 4, 0),
('RP', 'Dr. Ratna Purwaningsih, ST.MT', 0, 2, 2, 0, 0),
('RR', 'Rani Rumita, ST.,MT.', 0, 0, 0, 1, 0),
('SH', 'Sri Hartini, ST.,MT.', 1, 0, 1, 0, 0),
('SN', 'Susatyo Nugroho. W. P, ST.MM', 0, 0, 0, 0, 0),
('SRI', 'Sriyanto, ST.,MT.', 0, 0, 0, 0, 0),
('SS', 'Dr. Singgih Saptadi, ST.,MT.', 2, 0, 2, 0, 0),
('WB', 'Wiwik Budiawan, ST.,MT.', 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `instruksikerja`
--

CREATE TABLE `instruksikerja` (
  `IdInstruksi` int(11) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruksikerja`
--

INSERT INTO `instruksikerja` (`IdInstruksi`, `Judul`, `TanggalPembuatan`, `File`) VALUES
(1, 'Instruksi Kerja Pendaftaran Online Kerja Praktek', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Kerja_Praktek.pdf'),
(2, 'Instruksi Kerja Pengajuan Surat Kerja Praktek', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pengajuan_Surat_Kerja_Praktek.pdf'),
(3, 'Instruksi Kerja Pendaftaran Online Tugas Akhir', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Tugas_Akhir.pdf'),
(4, 'Instruksi Kerja Pendaftaran Online Seminar Tugas Akhir', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Seminar_Tugas_Akhir.pdf'),
(5, 'Instruksi Kerja Pendaftaran Online Sidang Tugas Akhir', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Sidang_Tugas_Akhir.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kp`
--

CREATE TABLE `kp` (
  `IdKP` int(11) NOT NULL,
  `NIM` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Kajian_KP` varchar(150) NOT NULL,
  `Nama_Perusahaan` varchar(150) NOT NULL,
  `Tanggal_KP` varchar(150) NOT NULL,
  `UsulDosen1` varchar(10) NOT NULL,
  `UsulDosen2` varchar(10) NOT NULL,
  `DosenPembimbing` varchar(10) NOT NULL,
  `Transkip` varchar(150) NOT NULL,
  `SuratPenerimaanPerusahaan` varchar(150) NOT NULL,
  `Status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kp`
--

INSERT INTO `kp` (`IdKP`, `NIM`, `Email`, `Kajian_KP`, `Nama_Perusahaan`, `Tanggal_KP`, `UsulDosen1`, `UsulDosen2`, `DosenPembimbing`, `Transkip`, `SuratPenerimaanPerusahaan`, `Status`) VALUES
(28, '21070115130085', 'cmariasaraswati@gmail.com', 'asdasdas', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'NS', 'SRI', 'PA', './images/KP/21070115130085_Transkip.pdf', './images/KP/21070115130085_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(29, 'mahasiswa_lulusTA', 'aldianpratama119@gmail.com', 'Valsat', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'NS', 'AB', 'NS', './images/KP/mahasiswa_lulusTA_Transkip.pdf', './images/KP/mahasiswa_lulusTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(30, 'setujui_sidangTA', 'ignatiusaldian@gmail.com', 'Valsat', 'PT EBako', '18 Maret 2019 -20 Mei 2019', 'PA', 'NB', 'PA', './images/KP/setujui_sidangTA_Transkip.pdf', './images/KP/setujui_sidangTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(31, 'daftar_sidangTA', 'ignatiusaldian@gmail.com', 'asdasdas', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'RP', 'NS', 'RP', './images/KP/daftar_sidangTA_Transkip.pdf', './images/KP/daftar_sidangTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(32, 'lulus_seminarTA', 'ignatiusaldian@gmail.com', 'Valsat', 'PT EBako', '18 Maret 2019 -20 Mei 2019', 'DP', 'DIP', 'DP', './images/KP/lulus_seminarTA_Transkip.pdf', './images/KP/lulus_seminarTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(33, 'setujui_seminarTA', 'aldianpratama119@gmail.com', 'New Logistic', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'AA', 'NS', 'AA', './images/KP/setujui_seminarTA_Transkip.pdf', './images/KP/setujui_seminarTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(34, 'daftar_seminarTA', '38bacak@gmail.com', 'Valsat Baru', 'PT EBako', '18 Maret 2019 -20 Mei 2019', 'AB', 'SS', 'AB', './images/KP/daftar_seminarTA_Transkip.pdf', './images/KP/daftar_seminarTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(35, 'mahasiswa_KPlulus ', 'kacmuajy@gmail.com', 'Valsat Baru', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'AS', 'BP', 'AS', './images/KP/mahasiswa_KPlulus _Transkip.pdf', './images/KP/mahasiswa_KPlulus _SuratPenerimaanPerusahaan.pdf', 'setuju'),
(36, 'mahasiswa_KPdisetujui', 'ignatius@xtremax.com', 'asdasda', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'HS', 'DN', 'HS', './images/KP/mahasiswa_KPdisetujui_Transkip.pdf', './images/KP/mahasiswa_KPdisetujui_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(37, 'mahasiswa_daftarKP', 'kacmuajy@gmail.com', 'Valsat', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'NB', 'HP', '', './images/KP/mahasiswa_daftarKP_Transkip.pdf', './images/KP/mahasiswa_daftarKP_SuratPenerimaanPerusahaan.pdf', ''),
(38, 'mahasiswa_daftarTA', 'riyankun12@gmail.com', 'QC', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'HES', 'MM', 'HES', './images/KP/mahasiswa_daftarTA_Transkip.pdf', './images/KP/mahasiswa_daftarTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(39, 'mahasiswa_setujuTA', 'kacmuajy@gmail.com', 'Ergonomi', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'NU', 'SH', 'NU', './images/KP/mahasiswa_setujuTA_Transkip.pdf', './images/KP/mahasiswa_setujuTA_SuratPenerimaanPerusahaan.pdf', 'setuju'),
(41, 'cobaKP', 'ignatiusaldian@gmail.com', 'Valsat', 'CV Mega Briquette', '18 Maret 2019 -20 Mei 2019', 'RR', 'RP', 'RR', './images/KP/cobaKP_Transkip.pdf', './images/KP/cobaKP_SuratPenerimaanPerusahaan.pdf', 'setuju');

-- --------------------------------------------------------

--
-- Table structure for table `magang`
--

CREATE TABLE `magang` (
  `IdMagang` int(11) NOT NULL,
  `NIM` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Program_Magang` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Nama_Perusahaan` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Tanggal_Magang` varchar(150) CHARACTER SET latin1 NOT NULL,
  `UsulDosen` varchar(10) CHARACTER SET latin1 NOT NULL,
  `DosenPembimbing` varchar(10) CHARACTER SET latin1 NOT NULL,
  `Transkip` varchar(150) CHARACTER SET latin1 NOT NULL,
  `SuratPenerimaanPerusahaan` varchar(150) CHARACTER SET latin1 NOT NULL,
  `SuratRekomendasiFakultas` varchar(150) CHARACTER SET latin1 NOT NULL,
  `SPTJM` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(6) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `magang`
--

INSERT INTO `magang` (`IdMagang`, `NIM`, `Email`, `Program_Magang`, `Nama_Perusahaan`, `Tanggal_Magang`, `UsulDosen`, `DosenPembimbing`, `Transkip`, `SuratPenerimaanPerusahaan`, `SuratRekomendasiFakultas`, `SPTJM`, `Status`) VALUES
(1, '21070115130085', 'wahid.110887@gmail.com', 'magang', 'kantor', '03-05-2015 SAMPAI 10-07-2015', 'AA', 'AA', './images/Magang/21070115130085_Transkip.pdf', './images/Magang/21070115130085_SuratPenerimaanPerusahaan.pdf', './images/Magang/21070115130085_SuratRekomendasiFakultas.pdf', './images/Magang/21070115130085_SPTJM.pdf', 'setuju');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `No` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `TanggalLahir` varchar(12) NOT NULL,
  `NoTelepon` varchar(15) NOT NULL,
  `NoTeleponOrtu` varchar(15) NOT NULL,
  `AlamatOrtu` varchar(100) NOT NULL,
  `Foto` varchar(150) NOT NULL,
  `KRS` varchar(150) NOT NULL,
  `Transkrip` varchar(150) NOT NULL,
  `PraBimbingan` varchar(150) NOT NULL,
  `Status` varchar(6) NOT NULL,
  `StatusKP` varchar(25) NOT NULL,
  `StatusMagang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`No`, `NIM`, `Nama`, `Email`, `TanggalLahir`, `NoTelepon`, `NoTeleponOrtu`, `AlamatOrtu`, `Foto`, `KRS`, `Transkrip`, `PraBimbingan`, `Status`, `StatusKP`, `StatusMagang`) VALUES
(268, '21070115130085', 'Riyan', 'aldianpratama222@gmail.com', '21/03/2019', '0246706005', '087832298171', 'asdasdas', './images/TA/21070115130085_Foto.jpg', './images/TA/21070115130085_KRS.pdf', './images/TA/21070115130085_Transkrip.pdf', './images/TA/21070115130085_Prabimbingan.pdf', '', '', 'Aktif'),
(269, 'mahasiswa_lulusTA', 'mahasiswa_lulusTA', 'aldianpratama222@gmail.com', '01/04/2019', '0856856', '087832298171', 'asdasdas', './images/TA/mahasiswa_lulusTA_Foto.jpg', './images/TA/mahasiswa_lulusTA_KRS.pdf', './images/TA/mahasiswa_lulusTA_Transkrip.pdf', './images/TA/mahasiswa_lulusTA_Prabimbingan.pdf', 'Lulus', 'Lulus', ''),
(270, 'daftar_sidangTA', 'daftar_sidangTA', 'christi_maria_smile@yahoo.co.id', '01/04/2019', '0856856', '081241241241', 'semarang', './images/TA/daftar_sidangTA_Foto.jpg', './images/TA/daftar_sidangTA_KRS.pdf', './images/TA/daftar_sidangTA_Transkrip.pdf', './images/TA/daftar_sidangTA_Prabimbingan.pdf', '', 'Lulus', ''),
(271, 'setujui_sidangTA', 'setujui_sidangTA', 'jackpearl48@yahoo.com', '01/04/2019', '0856856', '081241241241', 'asdasdas', './images/TA/setujui_sidangTA_Foto.jpg', './images/TA/setujui_sidangTA_KRS.pdf', './images/TA/setujui_sidangTA_Transkrip.pdf', './images/TA/setujui_sidangTA_Prabimbingan.pdf', 'Aktif', '', ''),
(272, 'lulus_seminarTA', 'lulus_seminarTA', 'cmariasaraswati@gmail.com', '01/04/2019', '0856856', '087832298171', 'asdasdas', './images/TA/lulus_seminarTA_Foto.jpg', './images/TA/lulus_seminarTA_KRS.pdf', './images/TA/lulus_seminarTA_Transkrip.pdf', './images/TA/lulus_seminarTA_Prabimbingan.pdf', 'Aktif', 'Lulus', ''),
(273, 'setujui_seminarTA', 'setujui_seminarTA', 'jackpearl48@yahoo.com', '01/04/2019', '0856856', '087832298171', 'asdasdas', './images/TA/setujui_seminarTA_Foto.jpg', './images/TA/setujui_seminarTA_KRS.pdf', './images/TA/setujui_seminarTA_Transkrip.pdf', './images/TA/setujui_seminarTA_Prabimbingan.pdf', 'Aktif', 'Lulus', ''),
(274, 'daftar_seminarTA', 'daftar_seminarTA', 'aldianpratama222@gmail.com', '01/04/2019', '0856856', '087832298171', 'Perum. Gardenia Blok C3/3', './images/TA/daftar_seminarTA_Foto.jpg', './images/TA/daftar_seminarTA_KRS.pdf', './images/TA/daftar_seminarTA_Transkrip.pdf', './images/TA/daftar_seminarTA_Prabimbingan.pdf', 'Aktif', 'Lulus', ''),
(275, 'mahasiswa_daftarTA', 'mahasiswa_daftarTA', 'ignatiusaldian@gmail.com', '01/04/2019', '0246706005', '087832298171', 'asdasdas', './images/TA/mahasiswa_daftarTA_Foto.jpg', './images/TA/mahasiswa_daftarTA_KRS.pdf', './images/TA/mahasiswa_daftarTA_Transkrip.pdf', './images/TA/mahasiswa_daftarTA_Prabimbingan.pdf', 'Aktif', 'Lulus', ''),
(276, 'mahasiswa_setujuTA', 'mahasiswa_setujuTA', 'riyankun12@gmail.com', '01/04/2019', '0856856', '087832298171', 'Perum. Gardenia Blok C3/3 Smg', './images/TA/mahasiswa_setujuTA_Foto.jpg', './images/TA/mahasiswa_setujuTA_KRS.pdf', './images/TA/mahasiswa_setujuTA_Transkrip.pdf', './images/TA/mahasiswa_setujuTA_Prabimbingan.pdf', 'Aktif', 'Lulus', ''),
(277, 'mahasiswa_KPlulus ', 'mahasiswa_KPlulus ', '', '01/04/2019', '', '', '', '', '', '', '', '', 'Lulus', ''),
(278, 'mahasiswa_KPdisetujui', 'mahasiswa_KPdisetujui', '', '01/04/2019', '', '', '', '', '', '', '', '', '', ''),
(279, 'mahasiswa_daftarKP', 'mahasiswa_daftarKP', '', '01/04/2019', '', '', '', '', '', '', '', '', '', ''),
(280, 'mahasiswa_awal', 'mahasiswa_awal', '', '01/04/2019', '', '', '', '', '', '', '', '', '', ''),
(281, 'mahasiswa_suratKP', 'mahasiswa_suratKP', '', '01/04/2019', '', '', '', '', '', '', '', '', '', ''),
(282, 'cobaKP', 'cobaKP', '', '10/04/2019', '', '', '', '', '', '', '', '', 'Aktif', ''),
(283, 'tes', 'tse', '', '01/10/2022', '', '', '', '', '', '', '', 'Aktif', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `IdSeminar` int(11) NOT NULL,
  `IdTA` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `TanggalDaftar` varchar(12) NOT NULL,
  `TanggalSeminar` varchar(15) NOT NULL,
  `DosenPenguji1` varchar(5) NOT NULL,
  `DosenPenguji2` varchar(5) NOT NULL,
  `KRS` varchar(100) NOT NULL,
  `LembarDaftar` varchar(100) NOT NULL,
  `LembarBimbingan` varchar(100) NOT NULL,
  `Jam` varchar(12) NOT NULL,
  `Lokasi` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`IdSeminar`, `IdTA`, `NIM`, `TanggalDaftar`, `TanggalSeminar`, `DosenPenguji1`, `DosenPenguji2`, `KRS`, `LembarDaftar`, `LembarBimbingan`, `Jam`, `Lokasi`, `Status`) VALUES
(1, 4, 'daftar_seminarTA', '01/04/2019', '', '', '', '', './images/Seminar/daftar_seminarTA_LembarDaftar.pdf', './images/Seminar/daftar_seminarTA_Bimbingan.pdf', '', '', ''),
(2, 5, 'setujui_seminarTA', '01/04/2019', '02/04/2019', 'SRI', 'DIP', '', './images/Seminar/setujui_seminarTA_LembarDaftar.pdf', './images/Seminar/setujui_seminarTA_Bimbingan.pdf', '10.00 WIB', 'Ruang seminar lantai 2', ''),
(3, 6, 'lulus_seminarTA', '01/04/2019', '02/04/2019', 'SN', 'WB', '', './images/Seminar/lulus_seminarTA_LembarDaftar.pdf', './images/Seminar/lulus_seminarTA_Bimbingan.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus'),
(4, 7, 'daftar_sidangTA', '01/04/2019', '02/04/2019', 'PA', 'HES', '', './images/Seminar/daftar_sidangTA_LembarDaftar.pdf', './images/Seminar/daftar_sidangTA_Bimbingan.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus'),
(5, 8, 'setujui_sidangTA', '01/04/2019', '02/04/2019', 'DP', 'AB', '', './images/Seminar/setujui_sidangTA_LembarDaftar.pdf', './images/Seminar/setujui_sidangTA_Bimbingan.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus'),
(6, 3, 'mahasiswa_lulusTA', '01/04/2019', '02/04/2019', 'MM', 'AS', '', './images/Seminar/mahasiswa_lulusTA_LembarDaftar.pdf', './images/Seminar/mahasiswa_lulusTA_Bimbingan.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus'),
(7, 9, '21070115130085', '01/04/2019', '10/04/2019', 'RP', 'DN', '', './images/Seminar/21070115130085_LembarDaftar.pdf', './images/Seminar/21070115130085_Bimbingan.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `IdSidang` int(11) NOT NULL,
  `IdTA` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `TanggalDaftar` varchar(12) NOT NULL,
  `TanggalSidang` varchar(15) NOT NULL,
  `DosenPenguji1` varchar(5) NOT NULL,
  `DosenPenguji2` varchar(5) NOT NULL,
  `Transkrip` text NOT NULL,
  `BebasPustaka` text NOT NULL,
  `LembarBimbingan` text NOT NULL,
  `DaftarSidang` text NOT NULL,
  `KehadiranSeminar` text NOT NULL,
  `Toefl` text NOT NULL,
  `Jam` varchar(12) NOT NULL,
  `Lokasi` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`IdSidang`, `IdTA`, `NIM`, `TanggalDaftar`, `TanggalSidang`, `DosenPenguji1`, `DosenPenguji2`, `Transkrip`, `BebasPustaka`, `LembarBimbingan`, `DaftarSidang`, `KehadiranSeminar`, `Toefl`, `Jam`, `Lokasi`, `Status`) VALUES
(1, 7, 'daftar_sidangTA', '01/04/2019', '', '', '', './images/Sidang/daftar_sidangTA_Transkrip.pdf', './images/Sidang/daftar_sidangTA_BebasPustaka.pdf', './images/Sidang/daftar_sidangTA_Bimbingan.pdf', './images/Sidang/daftar_sidangTA_LembarDaftar.pdf', './images/Sidang/daftar_sidangTA_Kehadiran.pdf', './images/Sidang/daftar_sidangTA_Toefl.pdf', '', '', ''),
(2, 8, 'setujui_sidangTA', '01/04/2019', '08/04/2019', 'DP', 'AB', './images/Sidang/setujui_sidangTA_Transkrip.pdf', './images/Sidang/setujui_sidangTA_BebasPustaka.pdf', './images/Sidang/setujui_sidangTA_Bimbingan.pdf', './images/Sidang/setujui_sidangTA_LembarDaftar.pdf', './images/Sidang/setujui_sidangTA_Kehadiran.pdf', './images/Sidang/setujui_sidangTA_Toefl.pdf', '10.00 WIB', 'Ruang seminar lantai 2', ''),
(3, 3, 'mahasiswa_lulusTA', '01/04/2019', '10/04/2019', 'MM', 'AS', './images/Sidang/mahasiswa_lulusTA_Transkrip.pdf', './images/Sidang/mahasiswa_lulusTA_BebasPustaka.pdf', './images/Sidang/mahasiswa_lulusTA_Bimbingan.pdf', './images/Sidang/mahasiswa_lulusTA_LembarDaftar.pdf', './images/Sidang/mahasiswa_lulusTA_Kehadiran.pdf', './images/Sidang/mahasiswa_lulusTA_Toefl.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus'),
(6, 9, '21070115130085', '01/04/2019', '02/04/2019', 'RP', 'DN', './images/Sidang/21070115130085_Transkrip.pdf', './images/Sidang/21070115130085_BebasPustaka.pdf', './images/Sidang/21070115130085_Bimbingan.pdf', './images/Sidang/21070115130085_LembarDaftar.pdf', './images/Sidang/21070115130085_Kehadiran.pdf', './images/Sidang/21070115130085_Toefl.pdf', '10.00 WIB', 'Ruang seminar lantai 2', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `sop`
--

CREATE TABLE `sop` (
  `IdSOP` int(11) NOT NULL,
  `TanggalPembuatan` varchar(12) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `File` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sop`
--

INSERT INTO `sop` (`IdSOP`, `TanggalPembuatan`, `Judul`, `File`) VALUES
(1, '21/03/2019', 'SOP Pendaftaran Tugas Akhir', './images/SOP/SOP_Pendaftaran_Tugas_Akhir.pdf'),
(2, '21/03/2019', 'SOP Penggantian Dosen Pembimbing Tugas Akhir', './images/SOP/SOP_Penggantian_Dosen_Pembimbing_Tugas_Akhir.pdf'),
(3, '21/03/2019', 'SOP Proses Bimbingan Proposal Tugas Akhir', './images/SOP/SOP_Proses_Bimbingan_Proposal_Tugas_Akhir.pdf'),
(4, '21/03/2019', 'SOP Pendaftaran Seminar Tugas Akhir', './images/SOP/SOP_Pendaftaran_Seminar_Tugas_Akhir.pdf'),
(5, '21/03/2019', 'SOP Seminar Tugas Akhir', './images/SOP/SOP_Seminar_Tugas_Akhir.pdf'),
(6, '21/03/2019', 'SOP Proses Bimbingan Laporan Tugas Akhir', './images/SOP/SOP_Proses_Bimbingan_Laporan_Tugas_Akhir.pdf'),
(7, '21/03/2019', 'SOP Pendaftaran Sidang Tugas Akhir', './images/SOP/SOP_Pendaftaran_Sidang_Tugas_Akhir.pdf'),
(8, '21/03/2019', 'SOP Sidang Tugas Akhir', './images/SOP/SOP_Sidang_Tugas_Akhir.pdf'),
(9, '21/03/2019', 'SOP Persetujuan Akhir Tugas Akhir', './images/SOP/SOP_Persetujuan_Akhir_Tugas_Akhir.pdf'),
(10, '21/03/2019', 'SOP Pendataan Awal Kerja Praktek', './images/SOP/SOP_Pendataan_Awal_Kerja_Praktek.pdf'),
(11, '21/03/2019', 'SOP Perizinan Perusahaan Kerja Praktek', './images/SOP/SOP_Perizinan_Perusahaan_Kerja_Praktek.pdf'),
(12, '21/03/2019', 'SOP Pendaftaran Kerja Praktek', './images/SOP/SOP_Pendaftaran_Kerja_Praktek.pdf'),
(13, '21/03/2019', 'SOP Pelaksanaan Kerja Praktek di Perusahaan', './images/SOP/SOP_Pelaksanaan_Kerja_Praktek_di_Perusahaan.pdf'),
(14, '21/03/2019', 'SOP Proses Bimbingan Kerja Praktek', './images/SOP/SOP_Proses_Bimbingan_Kerja_Praktek.pdf'),
(15, '21/03/2019', 'SOP Seminar Kerja Praktek', './images/SOP/SOP_Seminar_Kerja_Praktek.pdf'),
(16, '21/03/2019', 'SOP Persetujuan Akhir Kerja Praktek', './images/SOP/SOP_Persetujuan_Akhir_Kerja_Praktek.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sopkp`
--

CREATE TABLE `sopkp` (
  `IdSOP` int(11) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sopmagang`
--

CREATE TABLE `sopmagang` (
  `IdSOP` int(11) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suratkp`
--

CREATE TABLE `suratkp` (
  `IdKP` int(11) NOT NULL,
  `NIM` varchar(100) NOT NULL,
  `SuratKP1` varchar(150) NOT NULL,
  `Perusahaan_1` varchar(150) NOT NULL,
  `Bidang_Perusahaan1` varchar(150) NOT NULL,
  `SuratKP2` varchar(150) NOT NULL,
  `Perusahaan_2` varchar(150) NOT NULL,
  `Bidang_Perusahaan2` varchar(150) NOT NULL,
  `SuratKP3` varchar(150) NOT NULL,
  `Perusahaan_3` int(11) NOT NULL,
  `Bidang_Perusahaan3` int(11) NOT NULL,
  `SuratKP4` varchar(150) NOT NULL,
  `Perusahaan_4` int(11) NOT NULL,
  `Bidang_Perusahaan4` int(11) NOT NULL,
  `SuratKP5` varchar(150) NOT NULL,
  `Perusahaan_5` int(11) NOT NULL,
  `Bidang_Perusahaan5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratkp`
--

INSERT INTO `suratkp` (`IdKP`, `NIM`, `SuratKP1`, `Perusahaan_1`, `Bidang_Perusahaan1`, `SuratKP2`, `Perusahaan_2`, `Bidang_Perusahaan2`, `SuratKP3`, `Perusahaan_3`, `Bidang_Perusahaan3`, `SuratKP4`, `Perusahaan_4`, `Bidang_Perusahaan4`, `SuratKP5`, `Perusahaan_5`, `Bidang_Perusahaan5`) VALUES
(1, 'mahasiswa_suratKP', './images/SuratKP/mahasiswa_suratKP_SuratKP1.pdf', 'CV Mega Briquette', 'manufaktur', '', '', '', '', 0, 0, '', 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suratmagang`
--

CREATE TABLE `suratmagang` (
  `IdMagang` int(11) NOT NULL,
  `NIM` varchar(100) NOT NULL,
  `SuratMagang1` varchar(150) NOT NULL,
  `Perusahaan_1` varchar(150) NOT NULL,
  `Bidang_Perusahaan1` varchar(150) NOT NULL,
  `SuratMagang2` varchar(150) NOT NULL,
  `Perusahaan_2` varchar(150) NOT NULL,
  `Bidang_Perusahaan2` varchar(150) NOT NULL,
  `SuratMagang3` varchar(150) NOT NULL,
  `Perusahaan_3` varchar(150) NOT NULL,
  `Bidang_Perusahaan3` varchar(150) NOT NULL,
  `SuratMagang4` varchar(150) NOT NULL,
  `Perusahaan_4` varchar(150) NOT NULL,
  `Bidang_Perusahaan4` varchar(150) NOT NULL,
  `SuratMagang5` varchar(150) NOT NULL,
  `Perusahaan_5` varchar(150) NOT NULL,
  `Bidang_Perusahaan5` varchar(150) NOT NULL,
  `SuratPersetujuan1` varchar(150) NOT NULL,
  `SuratPersetujuan2` varchar(150) NOT NULL,
  `SuratPersetujuan3` varchar(150) NOT NULL,
  `SuratPersetujuan4` varchar(150) NOT NULL,
  `SuratPersetujuan5` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugasakhir`
--

CREATE TABLE `tugasakhir` (
  `IdTA` int(11) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Tema` varchar(100) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `TanggalDaftar` varchar(12) NOT NULL,
  `DosenUsul1` varchar(5) NOT NULL,
  `DosenUsul2` varchar(5) NOT NULL,
  `Pembimbing1` varchar(5) NOT NULL,
  `Pembimbing2` varchar(5) NOT NULL,
  `Periode` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugasakhir`
--

INSERT INTO `tugasakhir` (`IdTA`, `Nama`, `NIM`, `Tema`, `Judul`, `TanggalDaftar`, `DosenUsul1`, `DosenUsul2`, `Pembimbing1`, `Pembimbing2`, `Periode`, `Status`) VALUES
(1, '', 'mahasiswa_daftarTA', 'SOP di TI', '', '2019-04-01', 'SN', 'DI', '', '', 0, ''),
(2, '', 'mahasiswa_setujuTA', 'RSKE', 'Ergo Checklist', '2019-06-01', 'BP', 'DN', 'BP', 'DN', 0, 'setuju'),
(3, '', 'mahasiswa_lulusTA', 'Logistik Bencana', 'Logistik Bencana Gunung Merapi', '2019-04-01', 'AA', 'RR', 'AA', 'RR', 0, 'setuju'),
(4, '', 'daftar_seminarTA', 'Logistik Bencana', 'Logistik', '2019-04-01', 'MM', 'WB', 'MM', 'WB', 0, 'setuju'),
(5, '', 'setujui_seminarTA', 'SOP di TI', 'SOP Tugas Akhir', '2019-04-01', 'SH', 'DIP', 'SH', 'DIP', 0, 'setuju'),
(6, '', 'lulus_seminarTA', 'SOP di TI', 'Perancangan SOP Pengadaan Barang', '2019-04-01', 'AS', 'DP', 'AS', 'DP', 0, 'setuju'),
(7, '', 'daftar_sidangTA', 'RSKE lab', 'Ergonomi', '2019-04-01', 'MM', 'RP', 'MM', 'RP', 0, 'setuju'),
(8, '', 'setujui_sidangTA', 'sistem informasi', 'SIPRITA', '2019-04-01', 'SS', 'PA', 'SS', 'PA', 0, 'setuju'),
(9, '', '21070115130085', 'SOP di TI', 'Pembuatan SOP di UNDIP', '2019-04-01', 'NS', 'PA', 'NS', 'PA', 0, 'setuju');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', 'admin', 'admin'),
(4, 'TU', 'TU123', 'TU'),
(10, 'AA', 'AA', 'dosen'),
(11, 'AB', 'AB', 'dosen'),
(12, 'AS', 'AS', 'dosen'),
(13, 'BP', 'BP', 'dosen'),
(14, 'DI', 'DI', 'dosen'),
(15, 'DIP', 'DIP', 'dosen'),
(16, 'DN', 'DN', 'dosen'),
(17, 'DP', 'DP', 'dosen'),
(18, 'HES', 'HES', 'dosen'),
(19, 'HP', 'HP', 'dosen'),
(20, 'HS', 'HS', 'dosen'),
(21, 'MM', 'MM', 'dosen'),
(22, 'NB', 'NB', 'dosen'),
(23, 'NS', 'NS', 'dosen'),
(24, 'NU', 'NU', 'dosen'),
(25, 'PA', 'PA', 'dosen'),
(26, 'RP', 'RP', 'dosen'),
(27, 'RR', 'RR', 'dosen'),
(28, 'SH', 'SH', 'dosen'),
(29, 'SN', 'SN', 'dosen'),
(30, 'SRI', 'SRI', 'dosen'),
(31, 'SS', 'SS', 'dosen'),
(32, 'WB', 'WB', 'dosen'),
(33, 'adminKP', 'adminKP', 'adminKP'),
(69, '21070115130085', 'konan123', 'mahasiswa'),
(71, '-', '-', 'dosen'),
(72, 'mahasiswa_lulusTA', '01/04/2019', 'mahasiswa'),
(73, 'daftar_sidangTA', '01/04/2019', 'mahasiswa'),
(74, 'setujui_sidangTA', '01/04/2019', 'mahasiswa'),
(75, 'lulus_seminarTA', '01/04/2019', 'mahasiswa'),
(76, 'setujui_seminarTA', '01/04/2019', 'mahasiswa'),
(77, 'daftar_seminarTA', '01/04/2019', 'mahasiswa'),
(78, 'mahasiswa_daftarTA', '01/04/2019', 'mahasiswa'),
(79, 'mahasiswa_setujuTA', '01/04/2019', 'mahasiswa'),
(80, 'mahasiswa_KPlulus ', '01/04/2019', 'mahasiswa'),
(81, 'mahasiswa_KPdisetujui', '01/04/2019', 'mahasiswa'),
(82, 'mahasiswa_daftarKP', '01/04/2019', 'mahasiswa'),
(83, 'mahasiswa_awal', '01/04/2019', 'mahasiswa'),
(84, 'mahasiswa_suratKP', '01/04/2019', 'mahasiswa'),
(85, 'cobaKP', '10/04/2019', 'mahasiswa'),
(86, 'adminMagang', 'adminMagang', 'adminMagang'),
(87, 'tes', '06/10/2022', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkaskp`
--
ALTER TABLE `berkaskp`
  ADD PRIMARY KEY (`IdBerkas`);

--
-- Indexes for table `berkasmagang`
--
ALTER TABLE `berkasmagang`
  ADD PRIMARY KEY (`IdBerkas`);

--
-- Indexes for table `berkasta`
--
ALTER TABLE `berkasta`
  ADD PRIMARY KEY (`IdBerkas`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`KodeDosen`);

--
-- Indexes for table `instruksikerja`
--
ALTER TABLE `instruksikerja`
  ADD PRIMARY KEY (`IdInstruksi`);

--
-- Indexes for table `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`IdKP`),
  ADD UNIQUE KEY `NIM` (`NIM`),
  ADD UNIQUE KEY `NIM_2` (`NIM`),
  ADD UNIQUE KEY `NIM_3` (`NIM`);

--
-- Indexes for table `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`IdMagang`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`No`,`NIM`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`IdSeminar`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`IdSidang`);

--
-- Indexes for table `sop`
--
ALTER TABLE `sop`
  ADD PRIMARY KEY (`IdSOP`);

--
-- Indexes for table `sopkp`
--
ALTER TABLE `sopkp`
  ADD PRIMARY KEY (`IdSOP`);

--
-- Indexes for table `sopmagang`
--
ALTER TABLE `sopmagang`
  ADD PRIMARY KEY (`IdSOP`);

--
-- Indexes for table `suratkp`
--
ALTER TABLE `suratkp`
  ADD PRIMARY KEY (`IdKP`);

--
-- Indexes for table `suratmagang`
--
ALTER TABLE `suratmagang`
  ADD PRIMARY KEY (`IdMagang`);

--
-- Indexes for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  ADD PRIMARY KEY (`IdTA`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkaskp`
--
ALTER TABLE `berkaskp`
  MODIFY `IdBerkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkasmagang`
--
ALTER TABLE `berkasmagang`
  MODIFY `IdBerkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkasta`
--
ALTER TABLE `berkasta`
  MODIFY `IdBerkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instruksikerja`
--
ALTER TABLE `instruksikerja`
  MODIFY `IdInstruksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `IdKP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `magang`
--
ALTER TABLE `magang`
  MODIFY `IdMagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `IdSeminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `IdSidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sop`
--
ALTER TABLE `sop`
  MODIFY `IdSOP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sopkp`
--
ALTER TABLE `sopkp`
  MODIFY `IdSOP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sopmagang`
--
ALTER TABLE `sopmagang`
  MODIFY `IdSOP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suratkp`
--
ALTER TABLE `suratkp`
  MODIFY `IdKP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suratmagang`
--
ALTER TABLE `suratmagang`
  MODIFY `IdMagang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  MODIFY `IdTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
