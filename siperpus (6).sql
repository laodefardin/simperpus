-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2023 at 04:06 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kelas`) VALUES
(123, '123', '123', '2023-03-02', 'Laki-laki', 'TKJA'),
(123123, 'Fari', 'oiiouio', '2023-03-02', 'Laki-laki', '23001'),
(1231243, 'jhjk', 'hjh', '2023-03-02', 'Laki-laki', 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `jumlah_buku` int NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_input` date NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tanggal_input`, `gambar`) VALUES
(14, ' 41 Script PHP Siap Pakai', 'Yosef Murya', 'Jasakom', '1994', '97860208232492', 7, 'Rak 1', '2019-10-01', '17812751_90f089cb-ce91-4c07-86c2-e9080fb1f636_581_1032.jpg'),
(15, 'Hackintosh: Jalankan Mac Os X', 'Macbook Pro', 'Jasakom', '1992', '9789791090933', 14, 'Rak 1', '2019-10-01', 'Hackintosh_Jalankan_Mac_OS_X_Dengan_PC_Anda___Eri_Bowo.jpg'),
(16, 'Windows 7 Security Hacker', 'Yusmadi', 'Jasakom', '1994', '9789791090421', 3, 'Rak 1', '2019-10-01', 'S85b99b4ededa4fb9aece87f69c93bbe09.jpg_720x720q80.jpg'),
(17, 'Membangun IT Savvy', 'Jogiyanto ', 'Andi', '1992', '9789792960297', 20, 'Rak 1', '2019-10-01', '840124d66e8114d9e7ba582b2dcbd71a.jpg'),
(18, 'CISCO Kung Fu', 'Aristo', 'Jasakom', '1992', '9786020823270', 21, 'Rak 1', '2019-10-01', 'e3c7e7f488e474dbf632d2e378a6969f.jpg'),
(19, 'BackTrack 5 R3 : 100% Attack', 'Stephen', 'Jasakom', '1992', '9789791090797', 3, 'Rak 1', '2019-10-01', '66986_f.jpg'),
(20, 'Blogging : Have Fun', 'Carolina', 'Stiletto', '1992', '9786027572447', 15, 'Rak 1', '2019-10-01', 'b61ab49c7e02b112ddbfc29f623323ca.jpg'),
(22, 'Buku Sakti Pemrograman Web Seri PHP', 'Mundzir MF', 'Jasakom', '1992', '9789792960297', 10, 'Rak 1', '2019-12-09', '109665_f.jpg'),
(23, 'Matematika Terapan', 'Yusmadi', 'StartUp', '1992', '9789791090872', 20, 'Rak 1', '2019-12-09', 'Matematika-Terapan_Moh.-Hartono_Netprom-Nurhadi-depan-scaled.jpg'),
(26, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2005', '979-3064-25-3', 20, 'Rak 1', '2023-03-01', '0120230950stLaskar_pelangi_sampul.jpg'),
(28, 'Secrets of Divine Love Edisi Bahasa Indonesia ', 'A.Helwa', 'QUANTA ', '1998', '9786230029653', 1, 'Rak 2', '2023-03-02', '0220231001ndIMG_4503.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id` int NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id`, `denda`) VALUES
(1, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasibuku`
--

CREATE TABLE `tb_lokasibuku` (
  `id` int NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasibuku`
--

INSERT INTO `tb_lokasibuku` (`id`, `lokasi`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2'),
(3, 'Rak 3'),
(4, 'Rak 4'),
(5, 'Rak 5'),
(7, 'Rak 6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int NOT NULL,
  `nis` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nis`, `username`, `nama`, `password`, `level`, `foto`) VALUES
(1, '', 'admin', 'Indah Sampurna', '66b65567cedbc743bda3417fb813b9ba', 'Admin', '0220231423ndLOGO-TUT-WURI-HANDAYANI.webp'),
(36, '123', 'fardin', '123', '96de4eceb9a0c2b9b52c0b618819821b', 'Siswa', ''),
(37, '123123', 'admin', 'Fari', '96de4eceb9a0c2b9b52c0b618819821b', 'Siswa', ''),
(38, '', 'ahmad', 'Ahmad111', '96de4eceb9a0c2b9b52c0b618819821b', 'Petugas', '0220232301nd04092021150150user-icon_126283-435.jpg'),
(41, '1231243', 'erwer', 'jhjk', 'ba7b736e1bf465c7dea5c5ba4729df15', 'Siswa', ''),
(44, '', '123', 'fardin', '96de4eceb9a0c2b9b52c0b618819821b', 'Petugas', ''),
(45, '', '123', '123', '96de4eceb9a0c2b9b52c0b618819821b', 'Petugas', ''),
(46, '', '123', '12312', 'f41f2e4a64b57445b0bf555b06c29a6a', 'Petugas', ''),
(47, '', '2342', '234', '10dd8b5b8fa3f276d0aea47d5c3b4821', 'Petugas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nohp` varchar(40) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id`, `nama`, `nohp`, `kelas`, `tanggal`) VALUES
(31, '3324', '234', '234', '2023-03-04 08:15:10'),
(32, 'Ahmad', '0823123123321', 'TKJ A', '2023-02-09 09:30:35'),
(33, '3324', '234', '234', '2022-03-04 08:15:10'),
(34, 'Ahmad', '0823123123321', 'TKJ A', '2022-02-09 09:30:35'),
(35, 'Ahmad', '0823123123321', 'TKJ A', '2023-02-22 09:30:35'),
(36, 'Ahmadasdasd', '0823123123321', 'TKJ A', '2023-02-22 09:30:35'),
(37, '3324', '234', '234', '2023-01-04 08:15:10'),
(38, '3324', '234', '234', '2023-01-04 08:15:10'),
(39, '3324', '234', '234', '2023-03-04 08:15:10'),
(40, '3324', '234', '234', '2023-01-04 08:15:10'),
(41, '3324', '234', '234', '2023-05-04 08:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `lambat` varchar(100) DEFAULT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `status` enum('Pinjam','Kembali','Hilang','Lunas','Belum diambil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `judul`, `nis`, `nama`, `tanggal_pinjam`, `tanggal_kembali`, `lambat`, `denda`, `status`) VALUES
(220, 'BackTrack 5 R3 : 100% Attack', '190702', 'Annisavira', '2019-12-03', '2019-12-10', '627 ', '940500', 'Kembali'),
(221, 'Windows 7 Security', '190701', 'Dadi Setiadi', '2019-12-03', '2019-12-10', '15 ', '7500', 'Lunas'),
(222, 'Buku Sakti Pemrograman Web Seri PHP', '190704', 'Tyas Sekar', '2019-12-25', '2020-01-01', '0 ', '0', 'Lunas'),
(224, 'Buku Sakti Pemrograman Web Seri PHP', '190704', 'Tyas Sekar', '2019-12-26', '2020-01-02', NULL, NULL, 'Pinjam'),
(225, 'Blogging : Have Fun', '190702', 'Annisavira', '2021-08-28', '2021-09-04', '0 ', '0', 'Kembali'),
(226, ' 41 Script PHP Siap Pakai', '190701', 'Dadi Setiadi1', '2021-08-29', '2021-09-05', '0 ', '0', 'Kembali'),
(227, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-05', '0 ', '0', 'Kembali'),
(228, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-12', '0', '', 'Hilang'),
(229, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-05', '0', '', 'Hilang'),
(230, 'Hackintosh: Jalankan Mac Os X', '190701', 'Dadi Setiadi1', '2021-08-29', '2021-09-12', '0', '', 'Hilang'),
(231, 'Hackintosh: Jalankan Mac Os X', '180810', 'Yoga Widianto', '2021-08-29', '2021-09-05', '0 ', '0', 'Hilang'),
(232, 'Hackintosh: Jalankan Mac Os X', '180810', 'Yoga Widianto', '2021-08-30', '2021-09-06', '0 ', '0', 'Kembali'),
(233, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-08-30', '2021-09-20', '0 ', '0', 'Lunas'),
(234, 'Hackintosh: Jalankan Mac Os X', '190701', 'Dadi Setiadi1', '2021-08-31', '2021-09-07', '0 ', '0', 'Hilang'),
(235, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2021-09-04', '2021-09-11', NULL, NULL, 'Pinjam'),
(257, ' 41 Script PHP Siap Pakai', '2016210001', 'LAODE MUH ZULFARDINSYAH', '2023-03-01', '2023-03-08', NULL, NULL, 'Pinjam'),
(258, ' 41 Script PHP Siap Pakai', '180810', 'Yoga Widianto', '2023-03-02', '2023-03-09', NULL, NULL, 'Pinjam'),
(260, ' 41 Script PHP Siap Pakai', '123', '123', '2023-03-02', '2023-03-09', NULL, NULL, 'Pinjam'),
(261, 'Windows 7 Security Hacker', '123', '123', '2023-03-02', '2023-03-09', NULL, NULL, 'Pinjam'),
(262, ' 41 Script PHP Siap Pakai', '123', '123', '2023-03-03', '2023-03-10', NULL, NULL, 'Belum diambil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_website`
--

CREATE TABLE `tb_website` (
  `id` int NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `logo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_website`
--

INSERT INTO `tb_website` (`id`, `school_name`, `logo`) VALUES
(1, 'SMP NEGERI 1 BAREBBO', '0220231359ndLOGO-TUT-WURI-HANDAYANI.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lokasibuku`
--
ALTER TABLE `tb_lokasibuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_website`
--
ALTER TABLE `tb_website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lokasibuku`
--
ALTER TABLE `tb_lokasibuku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `tb_website`
--
ALTER TABLE `tb_website`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
