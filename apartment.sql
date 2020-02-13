-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 05:10 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `role`) VALUES
(2, 'Dwiki', 'dwiki@admin.com', '$2y$10$5W0UbZQ.UMgJdaScme3JoeBKW05U5igH1Ks..FaQBi/Lj/hTtvlRq', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail_sewa`
--

CREATE TABLE IF NOT EXISTS `detail_sewa` (
`id_detail_sewa` int(11) NOT NULL,
  `id_sewa` varchar(50) NOT NULL,
  `id_apartment` int(11) NOT NULL,
  `nama_apartment` varchar(50) NOT NULL,
  `alamat_apartment` varchar(100) NOT NULL,
  `harga_apartment` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `dp` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_detail_sewa`, `id_sewa`, `id_apartment`, `nama_apartment`, `alamat_apartment`, `harga_apartment`, `lama_sewa`, `tgl_mulai`, `tgl_selesai`, `dp`, `total_harga`) VALUES
(1, '5e15cbb141bae', 6, 'Taman Melati Apartement', 'Jl. Cikuda, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', 3000000, 4, '2020-01-09', '2020-05-09', 0, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
`id_konfirmasi` int(11) NOT NULL,
  `id_sewa` varchar(50) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(50) NOT NULL,
  `nominal_bayar` bigint(11) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `status_konfirmasi` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_sewa`, `id_admin`, `no_rekening`, `nama_account`, `nominal_bayar`, `tgl_transfer`, `status_konfirmasi`, `foto`) VALUES
(17, '5e0f3944b34da', 1, '123213', 'afaf', 2500000, '2020-01-16', 'Lunas', 'struk1.jpg'),
(19, '5e116b3d2b6c0', 1, '123213', 'asjdofajs', 375000, '2020-12-31', 'Lunas', 'struk23.jpg'),
(20, '5e1319a71052d', 2, '123421', 'Rinaldy', 56875000, '2020-01-06', 'Lunas', 'struk13.jpg'),
(21, '5e1333a9cc695', 2, '1111111111', 'Jeong', 60000000, '2020-01-06', 'Lunas', 'struk25.jpg'),
(22, '5e133795e4c4d', 2, '123213', 'Jeong', 50000000, '2020-01-06', 'Lunas', 'struk26.jpg'),
(23, '5e133e1245f1f', 2, '123421', 'Rinaldy', 27000000, '2020-01-06', 'Lunas', 'struk14.jpg'),
(24, '5e1367c85efe2', 2, '123213', 'Akang', 15000000, '2020-01-07', 'Lunas', 'struk28.jpg'),
(25, '5e1378933a805', 0, '123213', 'Jeong', 3600000, '2020-01-08', 'Menunggu Pembayaran Lunas', 'struk29.jpg'),
(26, '5e137a95c6ab7', 2, '123421', 'Akang', 30000000, '2020-01-07', 'Lunas', 'struk210.jpg'),
(27, '5e13821357ba6', 0, '123213', 'Akang', 5000000, '2020-01-07', 'Menunggu Pembayaran Lunas', 'struk15.jpg'),
(28, '5e138e8512c71', 0, '1111111111', 'Akang', 300000, '2020-01-07', 'Menunggu Pembayaran Lunas', 'struk211.jpg'),
(29, '5e13f61a8606c', 2, '1123123', 'Akang', 2700000, '2019-11-30', 'Lunas', 'struk213.jpg'),
(30, '5e142ca6edaf0', 2, '23457766', 'rinal', 2700000, '2020-01-08', 'Lunas', 'struk16.jpg'),
(31, '5e147acb58896', 0, '1111111111', 'asoka', 350000, '2020-01-07', 'Menunggu Pembayaran Lunas', 'struk215.jpg'),
(32, '5e1485bb60a6e', 2, '1111111111', 'Asep', 2700000, '2020-01-08', 'Lunas', 'struk217.jpg'),
(33, '5e15cbb141bae', 2, '123213', 'Asep', 12000000, '2020-01-08', 'Lunas', 'manageuser.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE IF NOT EXISTS `penyewa` (
  `id_penyewa` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(25) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama`, `alamat`, `no_hp`, `email`, `password`, `role`, `foto_profil`) VALUES
('2', 'Mocha', 'Bekasi Barat', '080900000000000', 'mocha@gmail.com', '$2y$10$aFlH2Cc8ZIKNkajksDFnzOYCBvWno/leKq58CbhqTjMBV3khKOIZ2', 'Penyewa', 'default.jpg'),
('3', 'Treno Feb', 'Bekasi Utara', '123456789012345', 'user@user.com', '$2y$10$g/YkCoeh/hkWfhISQtYoh.PpbIhmQeRqSt8XxcV93tIeH0K59tdOa', 'Penyewa', 'default.jpg'),
('6', 'Malin Kumbang', 'Bekasi', '123456789012345', 'malin@user.com', '$2y$10$ptPCPM1N0zEKb0tLmc93GuBnKp12Njq0vbhwqK9JZEp5/ITB2o6A2', 'Penyewa', 'default.jpg'),
('7', 'dwi', 'sektor 12', '089503123578790', 'dwi@gmail.com', '$2y$10$tQmer5sQVhCAhpaBPShZIOR8xYX2mznWh8BDAHtuZyn715HoZRaYC', 'Penyewa', 'default.jpg'),
('IDP0001', 'rinaldyzz', 'Bekasi', '128309128309128', 'rinaldyz@user.com', '$2y$10$hyvF6vdR4bagpP5x/EZYkuL8mg8UJ1illiHxXQZd67AbYoSzjjbc6', 'Penyewa', 'default.jpg'),
('IDP0009', 'Rinalrinal', 'Bandung Jl. Merdeka Kita', '0882139791800', 'rinaldy@gmail.com', '$2y$10$p/oGQR6xZXyUDzVtz6QLoevSa9Ybjt3tglgZhwzg3C3b2BUWs.c1S', 'Penyewa', 'default.jpg'),
('IDP0010', 'Asok', 'Bekasi Timur', '128309218309812', 'asoka@user.com', '$2y$10$wqA2gGBOv.7upmfh3sjLNe0KCh9ka9ruEARFqIGqy.EWgg03l71Le', 'Penyewa', 'default.jpg'),
('IDP0011', 'Asep', 'Jalan Dayeuhandap RT 03 RW 04 Kel. Kota Kulon Kec. Garut Kota', '089503630073123', 'Asepjaya@gmail.com', '$2y$10$Ga7OWpI6PieTj4LMDZv4Cu7v9J5Av42c/R4MmvFQjyuQOuY03XlV2', 'Penyewa', 'tenno.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE IF NOT EXISTS `sewa` (
  `id_sewa` varchar(100) NOT NULL,
  `id_penyewa` varchar(10) NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `status_sewa` enum('Menunggu Pembayaran','Menunggu Pembayaran Lunas','Lunas','Menunggu Verifikasi Admin') NOT NULL,
  `payment` enum('Bayar Penuh','Bayar DP') NOT NULL,
  `tgl_jatuhtempo` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_penyewa`, `nama_penyewa`, `alamat`, `no_hp`, `tgl_sewa`, `status_sewa`, `payment`, `tgl_jatuhtempo`, `total_bayar`, `jumlah_total`) VALUES
('5e15cbb141bae', 'IDP0011', 'Asep', 'Jalan Dayeuhandap RT 03 RW 04 Kel. Kota Kulon Kec. Garut Kota', '089503630073123', '2020-01-08', 'Lunas', 'Bayar Penuh', '2020-01-11', 12000000, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_apartment`
--

CREATE TABLE IF NOT EXISTS `tb_apartment` (
`id_apartment` int(11) NOT NULL,
  `nama_apartment` varchar(100) NOT NULL,
  `alamat_apartment` text NOT NULL,
  `harga_apartment` int(11) NOT NULL,
  `deskripsi_apartment` text NOT NULL,
  `foto1` varchar(250) NOT NULL,
  `foto2` varchar(250) NOT NULL,
  `foto3` varchar(250) NOT NULL,
  `foto4` varchar(250) NOT NULL,
  `status_apartment` enum('Tersedia','Tersewa','Proses') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_apartment`
--

INSERT INTO `tb_apartment` (`id_apartment`, `nama_apartment`, `alamat_apartment`, `harga_apartment`, `deskripsi_apartment`, `foto1`, `foto2`, `foto3`, `foto4`, `status_apartment`) VALUES
(5, 'Taman Melati Apartement', 'Jl. Cikuda, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', 3500000, 'Lantai 5, No. 27, AC, Full Furniture, 1 Kamar Mandi, 1 Kamar Tidur.', '1.jpg', '2.jpg', '3.jpg', '44.jpg', 'Tersedia'),
(6, 'Taman Melati Apartement', 'Jl. Cikuda, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', 3000000, 'Lantai 7, No. 18, Full Furniture. 1 Kamar Tidur, 1 Kamar Mandi.', '111.jpg', '222.jpg', '333.jpg', '444.jpg', 'Tersewa'),
(7, 'Taman Melati Apartement - Begonia', 'Jl. Cikuda, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363', 5000000, 'Lantai 666, Nomor 13 , AC, FULL FURNITURE, CITIY VIEW, KOLAM RENANG, WI-FI, BAR, KAMAR TIDUR 3, KASUR KING SIZE', 'halaman_dasboard_penyewa.jpg', 'dashboardadmin.jpg', 'halaman_detail_apartment.jpg', 'halaman_laporan.jpg', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_apartment`
--

CREATE TABLE IF NOT EXISTS `tb_detail_apartment` (
`id_detail_apartment` int(11) NOT NULL,
  `tipe_apartment` varchar(50) NOT NULL,
  `luas_apartment` varchar(50) NOT NULL,
  `listrik_apartment` varchar(50) NOT NULL,
  `sertifikat_apartment` varchar(50) NOT NULL,
  `tahundibuat_apartment` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_detail_apartment`
--

INSERT INTO `tb_detail_apartment` (`id_detail_apartment`, `tipe_apartment`, `luas_apartment`, `listrik_apartment`, `sertifikat_apartment`, `tahundibuat_apartment`) VALUES
(1, 'Sewa', '30 m2', '1300watt', 'Strata', '2019-02-27'),
(2, 'Sewa', '30 m2', '1300watt', 'Strata', '2019-02-27'),
(3, 'Sewa', '30 m2', '1300watt', 'Strata', '2019-02-27'),
(4, 'Sewa', '30 m2', '1300watt', 'Strata', '2019-02-27'),
(5, 'Sewa', '30 m2', '1300watt', 'Strata', '2019-02-27'),
(6, 'Sewa', '20 m2', '500 watt', 'Strata', '2019-05-01'),
(7, 'Sewa', '32 m2', '500 watt', 'Strata', '2017-03-15'),
(8, 'Sewa', '32 m2', '500 watt', 'Strata', '2017-12-15'),
(9, 'Sewa', '32 m2', '700watt', 'Strata', '2020-01-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
 ADD PRIMARY KEY (`id_detail_sewa`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
 ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
 ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
 ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tb_apartment`
--
ALTER TABLE `tb_apartment`
 ADD PRIMARY KEY (`id_apartment`);

--
-- Indexes for table `tb_detail_apartment`
--
ALTER TABLE `tb_detail_apartment`
 ADD PRIMARY KEY (`id_detail_apartment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
MODIFY `id_detail_sewa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_apartment`
--
ALTER TABLE `tb_apartment`
MODIFY `id_apartment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_detail_apartment`
--
ALTER TABLE `tb_detail_apartment`
MODIFY `id_detail_apartment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
