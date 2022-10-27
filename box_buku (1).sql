-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2016 at 04:55 PM
-- Server version: 10.0.27-MariaDB-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `box_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE IF NOT EXISTS `aplikasi` (
  `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `api_key` varchar(50) NOT NULL,
  `log` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_aplikasi`),
  UNIQUE KEY `api_key` (`api_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id_aplikasi`, `nama_aplikasi`, `deskripsi`, `api_key`, `log`, `Id_user`) VALUES
(1, 'Testing', 'Untuk Coba', 'dnfknd-23u2ukabsdkj', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `Id_buku` int(10) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(50) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Penerbit` int(10) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Tahun_terbit` date NOT NULL,
  `Harga` float NOT NULL,
  `Kategori` int(10) NOT NULL,
  `Deskripsi_Singkat` varchar(500) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_buku`),
  UNIQUE KEY `isbn` (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`Id_buku`, `ISBN`, `Judul`, `Penerbit`, `Pengarang`, `Tahun_terbit`, `Harga`, `Kategori`, `Deskripsi_Singkat`, `gambar`) VALUES
(1, '87907868', 'Percy Jackson The Olympians', 1, 'Rick Yordan', '2009-10-27', 89250, 1, 'Meski berhasil mengembalikan petir asali Dewa Zeus dan mencegah perang besar antara para dewa Olympus, Percy Jackson masih belum bisa hidup tenang. Hampir setiap malam, pesan Iewat mimpi datang, menyiratkan\nsahabatnya, Grover, sedang dalam bahaya', '/images/1.jpg'),
(2, '97804395', 'Merry Christmas, Geronimo!', 2, 'Geronimo Stilton', '2009-01-01', 84150, 1, 'I was so excited about Christmas. I could hardly squeak! My nephew Benjamin and I were going to trim the tree and eat lots of delicious Christmas Cheesy Chews. But before you could say cat alert.', '/images/2.jpg'),
(3, '97804396', 'Phantom Of the Subway', 2, 'Geronimo Stilton', '2007-01-01', 84150, 1, 'Smokin Swiss cheese! There was a ghost haunting New Mouse Citys subway tunnels. My whiskers were trembling with terror at the thought of it! But I knew I had to get the scoop for The Rodent`s Gazette.', '/images/3.jpg'),
(4, '97804703', 'Introducing Autocad Civil 3D 2009', 3, 'James Weding, P.E.', '2008-01-01', 407405, 14, '', '/images/4.jpg'),
(5, '97860276', '7 Jbi Excel 2013 Untuk Profesional', 4, 'Dwi Ninggar', '2014-10-08', 48025, 14, '', '/images/5.png'),
(6, '20210085', 'Bermain dengan formula excel 2007 & 2010', 5, 'Jubile Enterprise', '2013-03-02', 29580, 14, '', '/images/6.jpg'),
(7, '97897979', 'Simple Yoga', 6, 'Swami Vidyanand', '2008-11-17', 24650, 7, '', '/images/7.jpg'),
(8, '2006956', '100 Kesalahan Wanita dalam merawat tubuh', 7, 'Aiman All Husaini', '2008-01-01', 52000, 7, '', '/images/8.jpg'),
(9, '20251190', 'Tetap Kencang Usai Melahirkan', 8, 'Eren Cesaria', '2013-06-25', 25500, 7, '', '/images/9.jpg'),
(10, '97860278', 'Psy Gangnam Style', 9, 'Lee Na Rae', '2012-11-13', 34000, 3, '', '/images/10.jpg'),
(11, '97860294', 'My Life As Film Director', 10, 'Haqi Achmad', '2012-09-10', 41650, 3, '', '/images/11.jpg'),
(12, '20203529', 'My Life As Actor', 10, 'Haqi Achmad', '2013-01-14', 45900, 3, '', '/images/12.jpg'),
(13, '97860203', 'Jus Sehat Golongan Darah A', 11, 'Wied Harry Apriadji', '2014-10-06', 45050, 8, '', '/images/13.jpg'),
(14, '97897923', '56 Resep Kue Tradisional', 12, 'Majalah Sedap', '2014-09-02', 68000, 8, '', '/images/14.jpg'),
(15, '20304609', 'Smoothies Super Sehat', 13, 'Tim Dapur Winner', '2013-12-06', 45050, 8, '', '/images/15.jpg'),
(16, '97879798', 'Seri Cinta Nabi', 6, 'Balkis', '2009-09-01', 21250, 6, '', '/images/16.jpg'),
(17, '20244817', 'Berlanjut ke Penggudahan', 13, 'Dalai Lama', '2013-07-28', 44200, 6, '', '/images/17.jpg'),
(18, '20215452', 'The Breath Of Love', 14, 'Bhante Vimalaramsi', '2013-03-13', 30600, 6, 'Apa yang harus dilakukan untuk para murid ketika welas asih seorang guru yang mengusahakan kesejahteraan dan berwelas asih kepada mereka, yang telah kulakukan, untukmu, Ananda?', '/images/18.jpg'),
(19, '20201179', 'The Great Learning', 15, 'Asiapac Books Pte.ltd.', '2012-12-21', 49130, 4, 'Tentang Ketulusan Niat dan Integritas serta Pengembangan Moral dan Keunggulan Pribadi Lengkapi Kolek', '/images/19.jpg'),
(20, '20286979', 'Keberuntungan Di Tahun Kuda', 16, 'Master Chang', '2013-10-24', 27200, 4, '', '/images/20.jpg'),
(21, '9786024250041', 'Pengantar Pendidikan : Telaah Pendidikan Secara', 17, 'Saidah', '2016-09-09', 66300, 2, 'Buku ini mendiskusikan kajian tentang pendidikan secara deduktif. Dimulai dengan\r\nbahasa pendidikan ', '/images/21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE IF NOT EXISTS `detil_transaksi` (
  `id_detil_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` double NOT NULL,
  PRIMARY KEY (`id_detil_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_detil_transaksi`, `id_transaksi`, `id_buku`, `judul_buku`, `jumlah`, `harga_total`) VALUES
(1, 3, 0, 'Merry Christmas, Geronimo!', 1, 84150),
(2, 4, 0, 'The Breath Of Love', 1, 30600),
(3, 4, 0, 'Percy Jackson The Olympians', 1, 89250),
(4, 5, 0, 'The Great Learning', 1, 49130),
(5, 5, 0, 'Percy Jackson The Olympians', 1, 89250),
(6, 6, 0, 'Introducing Autocad Civil 3D 2009', 1, 407405);

-- --------------------------------------------------------

--
-- Table structure for table `detil_wishlist`
--

CREATE TABLE IF NOT EXISTS `detil_wishlist` (
  `id_detil_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_wishlist` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `rating` double NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_detil_wishlist`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `detil_wishlist`
--

INSERT INTO `detil_wishlist` (`id_detil_wishlist`, `id_wishlist`, `id_buku`, `judul_buku`, `pengarang`, `harga`, `rating`, `gambar`, `jumlah`) VALUES
(7, 2, 14, '56 Resep Kue Tradisional', 'Majalah Sedap', 68000, 0, 'http://plbtw-buku.box.lapakserver.com/images/14.jpg', 1),
(6, 2, 2, 'Merry Christmas, Geronimo!', 'Geronimo Stilton', 84150, 0, 'http://plbtw-buku.box.lapakserver.com/images/2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(1, 'Buku Anak', '/images/BukuAnak.jpg'),
(2, 'Pendidikan', '/images/Pendidikan.jpg'),
(3, 'Entertaiment', '/images/Entertaiment.jpg'),
(4, 'Filosofi', '/images/Filosofi.jpg'),
(5, 'Keluarga', '/images/Keluarga.jpg'),
(6, 'Agama', '/images/Agama.jpg'),
(7, 'Kesehatan', '/images/Kesehatan.jpg'),
(8, 'Masak', '/images/Masak.jpg'),
(9, 'Pertanian', '/images/Pertanian.jpg'),
(10, 'Hukum', '/images/Hukum.jpg'),
(11, 'Art, Arsitektur & Fotografi', '/images/Art.jpg'),
(12, 'Psikologi', '/images/Psikologi.jpg'),
(13, 'Fiksi & Literatur', '/images/Fiksi.jpg'),
(14, 'Komputer', '/images/Komputer.jpg'),
(15, 'Non Fiksi', '/images/NonFiksi.jpg'),
(16, 'Referensi & Kamus', '/images/Referensi.jpg'),
(17, 'Bisnis & Ekonomi', '/images/Bisnis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `Id_Penerbit` int(10) NOT NULL AUTO_INCREMENT,
  `Nama_penerbit` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Penerbit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`Id_Penerbit`, `Nama_penerbit`) VALUES
(1, 'Mizan'),
(2, 'SCHOLASTIC'),
(3, 'SYBEX'),
(4, 'MAXIKOM'),
(5, 'Elex Media Komputindo'),
(6, 'Bhuanan Ilmu Populer'),
(7, 'ALMAHIRA'),
(8, 'NUSA CREATIVA'),
(9, 'BENTANG PUSTAKA'),
(10, 'Gramedia Pustaka Utama'),
(11, 'MEDIA BOGA UTAMA'),
(12, 'PENEBAR PLUS'),
(13, 'Gramedia Widiasarana Indonesia'),
(14, 'JOKY'),
(15, 'Asiapac Books Pte.ltd.'),
(16, 'PEOPLES PUBLISING'),
(17, 'Rajagrafindo');

-- --------------------------------------------------------

--
-- Table structure for table `peran`
--

CREATE TABLE IF NOT EXISTS `peran` (
  `Id_peran` int(10) NOT NULL AUTO_INCREMENT,
  `nama_peran` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_peran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_review` varchar(200) NOT NULL,
  `rating_review` double NOT NULL,
  `tanggal_review` varchar(25) NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_buku`, `id_user`, `isi_review`, `rating_review`, `tanggal_review`) VALUES
(1, 1, 8, 'bagus bukunya', 4, '29 11 2016'),
(2, 1, 8, 'rfdf', 3.5, '29 11 2016'),
(3, 1, 9, 'test', 5, '29 11 2016'),
(4, 4, 10, 'nz', 4.5, '29 11 2016');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_transaksi` varchar(25) NOT NULL,
  `destinasi_kota` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kodePos` varchar(10) NOT NULL,
  `total_harga` double NOT NULL,
  `harga_delivery` double NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `kode_pembayaran` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `tanggal_transaksi`, `destinasi_kota`, `alamat`, `provinsi`, `kodePos`, `total_harga`, `harga_delivery`, `status_pembayaran`, `kode_pembayaran`, `flag`) VALUES
(3, 8, '28-11-2016 11:52:21pm', 'Badung', 'sssss', 'Bali', '15226', 106650, 22500, 'belum bayar', 'djsjsusudjejeje', 1),
(4, 8, '29-11-2016 09:57:04am', 'Jakarta Barat', 'Jalan Diponegoro 104 ', 'DKI Jakarta', '22864', 138850, 19000, 'belum bayar', 'djsisusud', 1),
(5, 9, '29-11-2016 03:00:13pm', 'Yogyakarta', 'jalan coba', 'DI Yogyakarta', '31613', 145380, 7000, 'belum bayar', 'hhhhuuggy', 1),
(6, 10, '29-11-2016 04:24:36pm', 'Badung', 'yadara', 'Bali', '549754', 429905, 22500, 'belum bayar', 'yeush', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id_user` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Peran` int(10) NOT NULL,
  PRIMARY KEY (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_aplikasi`
--

CREATE TABLE IF NOT EXISTS `user_aplikasi` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_aplikasi`
--

INSERT INTO `user_aplikasi` (`id_user`, `email`, `nama_user`, `tanggal_lahir`, `password`) VALUES
(4, 'aldian@gmail.com', 'aldi', '02-02-1996', 'qwerty'),
(3, 'aldian@gmail.com', 'aldi', '02-02-1996', 'qwerty'),
(5, 'dicoba@gmail.com', 'Aldian Pratama', '27021996', 'aldi'),
(6, 'dicoba2@gmail.com', 'aldian pratama', '27021996', 'aldi'),
(7, 'dicoba6@gmail.com', 'aldian', '1996-02-27', 'aldi'),
(8, 'dicoba7@gmail.com', 'aldian', '1996-02-27', 'aldi'),
(9, 'satriaananta@gmail.com', 'satria ananta', '1963-02-27', 'test'),
(10, 'nara@gmail.com', 'nara pratama', '1996-11-11', 'nara'),
(11, 'nana@gmail.com', 'hh', '1996-02-17', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `total_harga` float NOT NULL,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `total_harga`) VALUES
(1, 8, 0),
(2, 9, 0),
(3, 10, 0),
(4, 11, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
