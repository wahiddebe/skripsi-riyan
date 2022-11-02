-- -------------------------------------------------------------
-- TablePlus 5.1.0(468)
--
-- https://tableplus.com/
--
-- Database: manajemen_TA
-- Generation Time: 2022-11-02 16:11:29.0410
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `berkaskp`;
CREATE TABLE `berkaskp` (
  `IdBerkas` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL,
  PRIMARY KEY (`IdBerkas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `berkasmagang`;
CREATE TABLE `berkasmagang` (
  `IdBerkas` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL,
  PRIMARY KEY (`IdBerkas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `berkasta`;
CREATE TABLE `berkasta` (
  `IdBerkas` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL,
  PRIMARY KEY (`IdBerkas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `KodeDosen` varchar(5) NOT NULL,
  `NIP` bigint DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Beban` int NOT NULL DEFAULT '0',
  `Beban2` int NOT NULL DEFAULT '0',
  `TotalBeban` int NOT NULL DEFAULT '0',
  `BebanKP` int NOT NULL DEFAULT '0',
  `BebanMagang` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`KodeDosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `instruksikerja`;
CREATE TABLE `instruksikerja` (
  `IdInstruksi` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL,
  PRIMARY KEY (`IdInstruksi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `kp`;
CREATE TABLE `kp` (
  `IdKP` int NOT NULL AUTO_INCREMENT,
  `NIM` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Kajian_KP` varchar(150) NOT NULL,
  `Judul` varchar(150) DEFAULT NULL,
  `Nama_Perusahaan` varchar(150) NOT NULL,
  `Tanggal_KP` varchar(150) NOT NULL,
  `UsulDosen1` varchar(10) NOT NULL,
  `UsulDosen2` varchar(10) NOT NULL,
  `DosenPembimbing` varchar(10) NOT NULL,
  `Transkip` varchar(150) NOT NULL,
  `SuratPenerimaanPerusahaan` varchar(150) NOT NULL,
  `Status` varchar(6) NOT NULL,
  PRIMARY KEY (`IdKP`),
  UNIQUE KEY `NIM` (`NIM`),
  UNIQUE KEY `NIM_2` (`NIM`),
  UNIQUE KEY `NIM_3` (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `magang`;
CREATE TABLE `magang` (
  `IdMagang` int NOT NULL AUTO_INCREMENT,
  `NIM` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Program_Magang` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nama_Perusahaan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Tanggal_Magang` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UsulDosen` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DosenPembimbing` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Transkip` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SuratPenerimaanPerusahaan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SuratRekomendasiFakultas` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SPTJM` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Status` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`IdMagang`),
  UNIQUE KEY `NIM` (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `No` int NOT NULL AUTO_INCREMENT,
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
  `StatusMagang` varchar(25) NOT NULL,
  PRIMARY KEY (`No`,`NIM`),
  UNIQUE KEY `NIM` (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian` (
  `IdPenilaian` int NOT NULL AUTO_INCREMENT,
  `IdSidang` int NOT NULL,
  `Penguji` varchar(15) NOT NULL,
  `Nilai` varchar(3) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `TTD` varchar(150) NOT NULL,
  PRIMARY KEY (`IdPenilaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `seminar`;
CREATE TABLE `seminar` (
  `IdSeminar` int NOT NULL AUTO_INCREMENT,
  `IdTA` int NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `TanggalDaftar` varchar(12) NOT NULL,
  `TanggalSeminar` varchar(15) NOT NULL,
  `DosenPenguji1` varchar(5) NOT NULL,
  `DosenPenguji2` varchar(5) NOT NULL,
  `KRS` varchar(100) NOT NULL,
  `LembarDaftar` varchar(100) NOT NULL,
  `LembarDraft` varchar(100) DEFAULT NULL,
  `LembarBimbingan` varchar(100) NOT NULL,
  `Jam` varchar(12) NOT NULL,
  `Lokasi` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`IdSeminar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `seminarKP`;
CREATE TABLE `seminarKP` (
  `IdSeminarKP` int NOT NULL AUTO_INCREMENT,
  `IdKP` int NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `TanggalDaftar` varchar(12) NOT NULL,
  `TanggalSeminarKP` varchar(15) NOT NULL,
  `DosenPenguji1` varchar(5) NOT NULL,
  `DosenPenguji2` varchar(5) NOT NULL,
  `KRS` varchar(100) NOT NULL,
  `LembarDaftar` varchar(100) NOT NULL,
  `LembarDraft` varchar(100) DEFAULT NULL,
  `LembarBimbingan` varchar(100) NOT NULL,
  `Jam` varchar(12) NOT NULL,
  `Lokasi` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`IdSeminarKP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sidang`;
CREATE TABLE `sidang` (
  `IdSidang` int NOT NULL AUTO_INCREMENT,
  `IdTA` int NOT NULL,
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
  `Draft` varchar(100) DEFAULT NULL,
  `Jam` varchar(12) NOT NULL,
  `Lokasi` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`IdSidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sop`;
CREATE TABLE `sop` (
  `IdSOP` int NOT NULL AUTO_INCREMENT,
  `TanggalPembuatan` varchar(12) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `File` text NOT NULL,
  PRIMARY KEY (`IdSOP`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sopkp`;
CREATE TABLE `sopkp` (
  `IdSOP` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL,
  PRIMARY KEY (`IdSOP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sopmagang`;
CREATE TABLE `sopmagang` (
  `IdSOP` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(150) NOT NULL,
  `TanggalPembuatan` varchar(150) NOT NULL,
  `File` varchar(150) NOT NULL,
  PRIMARY KEY (`IdSOP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `suratkp`;
CREATE TABLE `suratkp` (
  `IdKP` int NOT NULL AUTO_INCREMENT,
  `NIM` varchar(100) NOT NULL,
  `SuratKP1` varchar(150) NOT NULL,
  `Perusahaan_1` varchar(150) NOT NULL,
  `Bidang_Perusahaan1` varchar(150) NOT NULL,
  `SuratKP2` varchar(150) NOT NULL,
  `Perusahaan_2` varchar(150) NOT NULL,
  `Bidang_Perusahaan2` varchar(150) NOT NULL,
  `SuratKP3` varchar(150) NOT NULL,
  `Perusahaan_3` int NOT NULL,
  `Bidang_Perusahaan3` int NOT NULL,
  `SuratKP4` varchar(150) NOT NULL,
  `Perusahaan_4` int NOT NULL,
  `Bidang_Perusahaan4` int NOT NULL,
  `SuratKP5` varchar(150) NOT NULL,
  `Perusahaan_5` int NOT NULL,
  `Bidang_Perusahaan5` int NOT NULL,
  PRIMARY KEY (`IdKP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `suratmagang`;
CREATE TABLE `suratmagang` (
  `IdMagang` int NOT NULL AUTO_INCREMENT,
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
  `SuratPersetujuan5` varchar(150) NOT NULL,
  PRIMARY KEY (`IdMagang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tugasakhir`;
CREATE TABLE `tugasakhir` (
  `IdTA` int NOT NULL AUTO_INCREMENT,
  `Nama` varchar(150) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `Tema` varchar(100) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `TanggalDaftar` varchar(12) NOT NULL,
  `DosenUsul1` varchar(5) NOT NULL,
  `DosenUsul2` varchar(5) NOT NULL,
  `Pembimbing1` varchar(5) NOT NULL,
  `Pembimbing2` varchar(5) NOT NULL,
  `Periode` int NOT NULL,
  `Status` varchar(100) NOT NULL,
  PRIMARY KEY (`IdTA`),
  UNIQUE KEY `NIM` (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `IdUser` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(20) NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

INSERT INTO `berkaskp` (`IdBerkas`, `Judul`, `TanggalPembuatan`, `File`) VALUES
(1, 'Panduan KP 2018', '19/10/2022', './images/BerkasKP/Panduan_KP_2018.pdf');

INSERT INTO `berkasmagang` (`IdBerkas`, `Judul`, `TanggalPembuatan`, `File`) VALUES
(3, 'Buku Panduan Indikator Kinerja Utama PTN', '19/10/2022', './images/BerkasMagang/19-10-20221666160685Buku_Panduan_Indikator_Kinerja_Utama_PTN.pdf'),
(4, 'Buku Petunjuk Magang Departemen Teknik Industri', '19/10/2022', './images/BerkasMagang/19-10-20221666160726Buku_Petunjuk_Magang_Departemen_Teknik_Industri.pdf'),
(5, 'Panduan untuk Mahasiswa Magang dan Studi Independen Bersertifikat-MSIB', '19/10/2022', './images/BerkasMagang/19-10-20221666160815Panduan_untuk_Mahasiswa_Magang_dan_Studi_Independen_Bersertifikat-MSIB.pdf'),
(6, 'Peraturan Rektor dan Pedoman Teknis MBKM 2022', '19/10/2022', './images/BerkasMagang/19-10-20221666160835Peraturan_Rektor_dan_Pedoman_Teknis_MBKM_2022.pdf');

INSERT INTO `berkasta` (`IdBerkas`, `Judul`, `TanggalPembuatan`, `File`) VALUES
(1, 'PERAK 2017', '21/03/2019', './images/BerkasTA/PERAK_2017.pdf'),
(2, 'PERATURAN REKTOR UNIVERSITAS DIPONEGORO 2017', '20/10/2022', './images/BerkasTA/PERATURAN_REKTOR_UNIVERSITAS_DIPONEGORO_2017.pdf'),
(3, 'Briefing Tugas Akhir', '20/10/2022', './images/BerkasTA/Briefing_Tugas_Akhir.pdf'),
(4, 'Panduan TA Online', '20/10/2022', './images/BerkasTA/Panduan_TA_Online.pdf');

INSERT INTO `dosen` (`KodeDosen`, `NIP`, `Nama`, `Beban`, `Beban2`, `TotalBeban`, `BebanKP`, `BebanMagang`) VALUES
('-', NULL, '-', 0, 0, 0, 0, 0),
('AA', 198109132003121002, 'Ary Arvianto, ST.,MT.', 0, 0, 0, 0, 0),
('AB', 197503062000121001, 'Dr. rer. Oec. Arfan Bakhtiar, ST.MT', 0, 0, 0, 0, 0),
('AS', 197103271999032002, 'Prof. Dr. Aries Susanty, ST.MT', 0, 0, 0, 0, 0),
('DIP', 197902192003122001, 'Diana Puspitasari, ST.MT', 0, 0, 0, 0, 0),
('DIR', 198403262006042001, 'Dyah Ika Rinawati, ST.,MT.', 0, 0, 0, 0, 0),
('DN', 197312211999031002, 'Dr. Denny Nurkertamanda, ST.,MT.', 0, 0, 0, 0, 0),
('DP', 197305072002122002, 'Darminto Pujotomo, ST.,MT.', 0, 0, 0, 0, 0),
('HES', 196904292002121001, 'Dr. Hery Suliantoro, ST.MT', 0, 0, 0, 0, 0),
('HP', 196003151987031001, 'Dr. Ir. Heru Prastawa, DEA', 0, 0, 0, 0, 0),
('MM', 198305032010122332, 'Dr. Manik Mahachandra, S.T., M.T.', 0, 0, 0, 0, 0),
('MMU', 198912959115911946, 'Muhammad Mujiya Ulkhaq S.T., M.Sc.', 0, 0, 0, 0, 0),
('NB', 198402172006042002, 'Nia Budi Puspitasari, ST.MT', 0, 0, 0, 0, 0),
('NS', 198211072005012001, 'Dr. Ing. Novie Susanto, ST.M.Eng', 0, 0, 0, 0, 0),
('NU', 197305072002122002, 'Dr. Naniek Utami. H, S.si.MT', 0, 0, 0, 0, 0),
('PAW', 19771003200021001, 'Dr. Purnawan Adi. W, ST.MT', 0, 0, 0, 0, 0),
('RP', 197212311998022001, 'Dr. Ratna Purwaningsih, ST.MT', 0, 0, 0, 0, 0),
('RR', 197311061998022001, 'Rani Rumita, ST.,MT.', 0, 0, 0, 0, 0),
('SH', 197006252002122001, 'Dr. Sri Hartini, ST.,MT.', 0, 0, 0, 0, 0),
('SN', 196903111997021061, 'Susatyo Nugroho. W. P, ST.MM', 0, 0, 0, 0, 0),
('SRI', 19740912200012002, 'Sriyanto, ST.,MT.', 0, 0, 0, 0, 0),
('SS', 197403162001121001, 'Dr. Singgih Saptadi, ST.,MT.', 0, 0, 0, 0, 0),
('WB', 198603192012121002, 'Wiwik Budiawan, ST.,MT.', 0, 0, 0, 0, 0),
('YW', 198010272015041001, 'Yusuf Widharto, ST., M.Eng.', 0, 0, 0, 0, 0),
('ZF', 195711241985031002, 'Zainal Fanani, ST., MT.', 0, 0, 0, 0, 0);

INSERT INTO `instruksikerja` (`IdInstruksi`, `Judul`, `TanggalPembuatan`, `File`) VALUES
(1, 'Instruksi Kerja Pendaftaran Online Kerja Praktek', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Kerja_Praktek.pdf'),
(2, 'Instruksi Kerja Pengajuan Surat Kerja Praktek', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pengajuan_Surat_Kerja_Praktek.pdf'),
(3, 'Instruksi Kerja Pendaftaran Online Tugas Akhir', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Tugas_Akhir.pdf'),
(4, 'Instruksi Kerja Pendaftaran Online Seminar Tugas Akhir', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Seminar_Tugas_Akhir.pdf'),
(5, 'Instruksi Kerja Pendaftaran Online Sidang Tugas Akhir', '21/03/2019', './images/InstruksiKerja/Instruksi_Kerja_Pendaftaran_Online_Sidang_Tugas_Akhir.pdf');

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
(16, '21/03/2019', 'SOP Persetujuan Akhir Kerja Praktek', './images/SOP/SOP_Persetujuan_Akhir_Kerja_Praktek.pdf'),
(17, '19/10/2022', 'SOP Kegiatan Bimbingan Kerja Magang', './images/SOP/19-10-20221666160898SOP_Kegiatan_Bimbingan_Kerja_Magang.pdf'),
(18, '19/10/2022', 'SOP Konversi Mata Kuliah Magang', './images/SOP/19-10-20221666160920SOP_Konversi_Mata_Kuliah_Magang.pdf'),
(19, '19/10/2022', 'SOP Pelaksanaan Kerja Magang', './images/SOP/19-10-20221666160934SOP_Pelaksanaan_Kerja_Magang.pdf'),
(20, '19/10/2022', 'SOP Pendaftaran Kerja Magang', './images/SOP/19-10-20221666160948SOP_Pendaftaran_Kerja_Magang.pdf'),
(21, '19/10/2022', 'SOP Pendataan Awal Magang', './images/SOP/19-10-20221666160971SOP_Pendataan_Awal_Magang.pdf'),
(22, '19/10/2022', 'SOP Pengajuan Kerja Magang', './images/SOP/19-10-20221666160983SOP_Pengajuan_Kerja_Magang.pdf'),
(23, '19/10/2022', 'SOP Penilaian Program Kerja Magang', './images/SOP/19-10-20221666160993SOP_Penilaian_Program_Kerja_Magang.pdf');

INSERT INTO `user` (`IdUser`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', 'admin', 'admin'),
(4, 'TU', 'TU123', 'TU'),
(33, 'adminKP', 'adminKP', 'adminKP'),
(71, '-', '-', 'dosen'),
(86, 'adminMagang', 'adminMagang', 'adminMagang'),
(193, 'AA', 'AA', 'dosen'),
(194, 'AB', 'AB', 'dosen'),
(195, 'AS', 'AS', 'dosen'),
(196, 'DIP', 'DIP', 'dosen'),
(197, 'DIR', 'DIR', 'dosen'),
(198, 'DN', 'DN', 'dosen'),
(199, 'DP', 'DP', 'dosen'),
(200, 'HES', 'HES', 'dosen'),
(201, 'HP', 'HP', 'dosen'),
(202, 'MM', 'MM', 'dosen'),
(203, 'NB', 'NB', 'dosen'),
(204, 'NS', 'NS', 'dosen'),
(205, 'NU', 'NU', 'dosen'),
(206, 'PAW', 'PAW', 'dosen'),
(207, 'RP', 'RP', 'dosen'),
(208, 'RR', 'RR', 'dosen'),
(209, 'SH', 'SH', 'dosen'),
(210, 'SN', 'SN', 'dosen'),
(211, 'SRI', 'SRI', 'dosen'),
(212, 'SS', 'SS', 'dosen'),
(213, 'WB', 'WB', 'dosen'),
(214, 'YW', 'YW', 'dosen'),
(215, 'ZF', 'ZF', 'dosen'),
(216, 'MMU', 'MMU', 'dosen');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;