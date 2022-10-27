-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2018 at 09:11 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_angga`
--
CREATE DATABASE IF NOT EXISTS `kp_angga` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kp_angga`;

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `tanggal_agenda` varchar(12) NOT NULL,
  `judul_agenda` varchar(100) NOT NULL,
  `deskripsi_agenda` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tanggal_agenda`, `judul_agenda`, `deskripsi_agenda`) VALUES
(1, '22-06-2018', 'Testing Agenda', 'Testing test agenda');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` text NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `deskripsi_berita` varchar(1000) NOT NULL,
  `tanggal_berita` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `gambar_berita`, `deskripsi_berita`, `tanggal_berita`) VALUES
(1, 'Testing Berita', 'html/images/event_1.jpg', '<div class="news_post_text">\n								<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque. </p>\n</div>', '24-06-2018'),
(2, 'Testing Berita 2', 'html/images/event_2.jpg', '<div class="news_post_text">\n								<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque. </p>\n</div>', '23-06-2018');

-- --------------------------------------------------------

--
-- Table structure for table `form1`
--

DROP TABLE IF EXISTS `form1`;
CREATE TABLE `form1` (
  `id_form1` int(11) NOT NULL,
  `pengisi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_form` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form1`
--

INSERT INTO `form1` (`id_form1`, `pengisi`, `deskripsi`, `tanggal_form`) VALUES
(1, 'aldi', 'asdasdas', '07-28-2018 13:00:00'),
(2, 'christi', 'asdasdasdasd', '07-23-2018 14:00:00'),
(3, 'ryo', 'sdasdasd', '07-29-2018 18:33:00'),
(4, 'riyan', 'asdasdasd', '07-30-2018 07:30:00'),
(5, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae dignissim velit, eget auctor augue. Sed quis venenatis arcu. Maecenas risus ipsum, porta a congue faucibus, ultricies eu arcu. Donec mollis luctus augue at vehicula. Nam tincidunt mattis dolor, nec tincidunt nulla fringilla ac. Nulla sodales ipsum eu luctus ultricies. Aliquam non massa pharetra, accumsan leo non, ultricies erat. Ut ligula ipsum, auctor ac tellus eu, interdum pulvinar sem. Sed tempor viverra viverra. Quisque in suscipit tortor. Quisque consectetur neque a libero eleifend, et pellentesque lectus consequat. Nunc vitae velit dapibus, tincidunt lorem sit amet, cursus leo.', '08-01-2018 12:12:12'),
(6, 'rista', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum magna tellus, eu auctor lectus mattis ut. Sed aliquet semper ex, in interdum elit congue id. Duis vitae nisl massa. Maecenas sit amet tortor ac odio semper lobortis hendrerit vitae mi. Sed vulputate ex in convallis eleifend. Vestibulum ut leo ut nibh suscipit dignissim nec sit amet dui. Etiam pretium faucibus ligula eu imperdiet.', '08-10-2018 06:49:21'),
(7, 'reno', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum magna tellus, eu auctor lectus mattis ut. Sed aliquet semper ex, in interdum elit congue id. Duis vitae nisl massa. Maecenas sit amet tortor ac odio semper lobortis hendrerit vitae mi. Sed vulputate ex in convallis eleifend. Vestibulum ut leo ut nibh suscipit dignissim nec sit amet dui. Etiam pretium faucibus ligula eu imperdiet.', '08-10-2018 06:51:21'),
(8, 'rinjani', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum magna tellus, eu auctor lectus mattis ut. Sed aliquet semper ex, in interdum elit congue id. Duis vitae nisl massa. Maecenas sit amet tortor ac odio semper lobortis hendrerit vitae mi. Sed vulputate ex in convallis eleifend. Vestibulum ut leo ut nibh suscipit dignissim nec sit amet dui. Etiam pretium faucibus ligula eu imperdiet.', '08-10-2018 06:57:21'),
(9, 'angga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum magna tellus, eu auctor lectus mattis ut. Sed aliquet semper ex, in interdum elit congue id. Duis vitae nisl massa. Maecenas sit amet tortor ac odio semper lobortis hendrerit vitae mi. Sed vulputate ex in convallis eleifend. Vestibulum ut leo ut nibh suscipit dignissim nec sit amet dui. Etiam pretium faucibus ligula eu imperdiet.', '08-10-2018 19:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `form_peminjaman_alat`
--

DROP TABLE IF EXISTS `form_peminjaman_alat`;
CREATE TABLE `form_peminjaman_alat` (
  `id_form` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `NPM` varchar(15) NOT NULL,
  `deskripsi_peminjaman` text NOT NULL,
  `tanggal_form` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `form1`
--
ALTER TABLE `form1`
  ADD PRIMARY KEY (`id_form1`);

--
-- Indexes for table `form_peminjaman_alat`
--
ALTER TABLE `form_peminjaman_alat`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `form1`
--
ALTER TABLE `form1`
  MODIFY `id_form1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `form_peminjaman_alat`
--
ALTER TABLE `form_peminjaman_alat`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
