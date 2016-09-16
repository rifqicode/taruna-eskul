-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2016 at 11:56 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taruna_eskul`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nis` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user','guru') NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nis`, `username`, `password`, `level`, `gambar`) VALUES
(1, 12313, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Hyp.600.1496034.jpg'),
(8, 1992, 'rifqi', '21232f297a57a5a743894a0e4a801fc3', 'admin', ''),
(9, 1921, 'asd', '7815696ecbf1c96e6894b779456d330e', 'user', ''),
(10, 1929292, 'guru', '77e69c137812518e359196bb2f5e9bb9', 'guru', ''),
(11, 123, 'riqi', 'ba029d48bf6be9d2ecd8b4c19185da5c', 'guru', ''),
(12, 1991, 'asd', '7815696ecbf1c96e6894b779456d330e', 'guru', ''),
(13, 1991, 'asd', '7815696ecbf1c96e6894b779456d330e', 'guru', ''),
(14, 1991, 'asd', '7815696ecbf1c96e6894b779456d330e', 'guru', ''),
(15, 182, 'adam', '1d7c2923c1684726dc23d2901c4d8157', 'guru', ''),
(16, 1882, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Inspirational-Code-HD-Wallpapers.jpg'),
(17, 1999222, 'ferdi', '8bf4bb0e2efad01abe522bf314504a49', 'user', ''),
(18, 18888, 'test', '098f6bcd4621d373cade4e832627b4f6', 'user', 'Hyp.600.1496034.jpg'),
(19, 19900, 'irfan', '24b90bc48a67ac676228385a7c71a119', 'user', 'web_developer_wallpaper__code__by_plusjack-d7bmt54.jpg'),
(20, 1222, '', 'd41d8cd98f00b204e9800998ecf8427e', 'user', ''),
(21, 1222, '', 'd41d8cd98f00b204e9800998ecf8427e', 'user', ''),
(22, 1010, 'Admin 01', '1e48c4420b7073bc11916c6c1de226bb', 'admin', ''),
(23, 10001, 'irfan', '24b90bc48a67ac676228385a7c71a119', 'user', ''),
(24, 10019, 'ferdi', '8bf4bb0e2efad01abe522bf314504a49', 'user', ''),
(25, 10011, 'irfan', '7815696ecbf1c96e6894b779456d330e', 'user', ''),
(26, 999, 'irfan', 'c9cc2586e67eae79df4b89d08be52bfe', 'user', ''),
(27, 10009, 'koko', '37f525e2b6fc3cb4abd882f708ab80eb', 'user', ''),
(28, 0, 'okokok', 'adf4661fe6715ed47954193e68b63036', 'user', ''),
(29, 9991, 'ngetes', '82eab75ae02ec3d32fdfbb77a406d3d9', 'user', ''),
(30, 1992, 'irfan', '24b90bc48a67ac676228385a7c71a119', 'user', ''),
(31, 0, 'keke', '4a5ea11b030ec1cfbc8b9947fdf2c872', '', ''),
(32, 90911, 'test3', '8ad8757baa8564dc136c1e07507f4a98', '', ''),
(33, 1002, 'testupdate', '098f6bcd4621d373cade4e832627b4f6', 'user', ''),
(34, 10022, 'testing1', 'ae2b1fca515949e5d54fb22b8ed95575', 'user', ''),
(35, 100011, 'iniguru', '2abead0bba38300b9737fa8b375640de', 'guru', ''),
(36, 882, 'testt', '147538da338b770b61e592afc92b1ee6', 'user', ''),
(37, 9922, 'asd', '7815696ecbf1c96e6894b779456d330e', 'user', ''),
(38, 992211, 'AHAHA', '0e0d3b55d9348830fbf722f45a8cb8d2', 'user', ''),
(39, 101010, 'databaru', '1dfe4174a77e7b231bc2203e589fd36f', 'user', 'testing.jpg'),
(40, 18882, 'ooaoo', 'c6fc265fc8dcb4fb6fc140bcb89d3eb9', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `id_ekskul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_murid`, `id_ekskul`) VALUES
(1, 1992, 2),
(2, 1992, 3),
(3, 1992, 2),
(4, 1992, 2),
(5, 1992, 2),
(6, 1999222, 2),
(7, 0, 2),
(8, 0, 2),
(9, 18888, 2),
(10, 19900, 2),
(11, 19900, 2),
(12, 19900, 3),
(13, 19900, 4),
(14, 1882, 2),
(15, 1882, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dataguru`
--

CREATE TABLE `dataguru` (
  `id_guru` int(11) NOT NULL,
  `nis_guru` int(11) NOT NULL,
  `nama_guru` varchar(150) NOT NULL,
  `email_guru` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataguru`
--

INSERT INTO `dataguru` (`id_guru`, `nis_guru`, `nama_guru`, `email_guru`) VALUES
(1, 0, 'guru@gmail.com', ''),
(2, 0, 'muhammad@gmail.com', ''),
(3, 1991, 'RIfqi', 'Riqfi@GMAIL.COM'),
(4, 1991, 'RIfqi', 'Riqfi@GMAIL.COM'),
(5, 1991, 'RIfqi', 'Riqfi@GMAIL.COM'),
(6, 182, 'Adam', 'Adam@gmail.com'),
(7, 100011, 'iniguru', 'iniguru@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `nama_ekskul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nama_ekskul`, `deskripsi`) VALUES
(2, 'Basket', 'Berikut ini adalah contoh Ekskul basket'),
(3, 'Bulu Tangkis', 'Contoh Ekskul Bulu Tangkis\r\n'),
(4, 'asjdhaskdh', 'asjkdhajkshdakjshdkjashdjkahsjkdsa\r\n'),
(5, 'Pencak Silat', 'Ini adalah contoh Pencak Silat aasdasdasdasdasdasdasdasdasdasd'),
(6, 'Koding', 'Ini adalah ekskul Koding');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Multimedia'),
(3, 'Teknik Komputer Jaringan'),
(4, 'Broadcast');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis_siswa`, `nama`, `kelas`, `jurusan`, `email`) VALUES
(11, 1992, 'Muhammad Rifqi Imam Saputra', '1 ', '1', 'muhammadrifqi.tb@gmail.com'),
(12, 1992, 'Muhammad Adam', '2  ', '2', 'muhammadrifqi.tb@gmail.com'),
(13, 1882, 'user', '2  ', '4', 'user@gmail.com'),
(14, 1999222, 'ferdian', '2  ', '2', 'askjdask@gmail.com'),
(15, 18888, 'test', '1  ', '2', 'test'),
(16, 19900, 'ini editan', '1', '2', 'inieditan@gmail.com'),
(17, 0, '1', '1', 'sudahterupdate@gmail.com', ''),
(18, 0, '1', '1', 'sudahterupdate@gmail.com', ''),
(19, 1010, 'Muhammad Rifqi Imam Saputra', '2  ', '1', 'muhammadrifqi.tb@gmail.com'),
(20, 10001, 'For Test', '2  ', '1', 'kjlkj@gmail.com'),
(21, 10019, 'Kiki', '2  ', '3', 'sadasjlk@gmail.com'),
(22, 10011, 'asdasd', '2  ', '1', 'asdadasd@gmail.com'),
(23, 999, 'asda', '2  ', '1', 'askdak@gmail.com'),
(24, 0, '1', '1', 'sudahterupdate@gmail.com', ''),
(25, 9991, 'ini nge tes', '1  ', '1', 'ngetes@gmail.com'),
(26, 1992, 'test2', '2  ', '2', 'test2@gmail.com'),
(27, 9009, 'sadklkasd', '3  ', '1', 'lksjfkslm,xc@gmail.com'),
(28, 90911, 'update', '3', '3', 'update@gmail.com'),
(29, 1002, 'edit', '1', '2', 'edit'),
(30, 10022, 'Testing', '2  ', '1', 'email@gmail.com'),
(31, 882, 'testing', '2  ', '2', 'panjitest@gmail.com'),
(32, 9922, 'asdasd', '1  ', '1', 'sadasd@gmail.com'),
(33, 992211, 'AHAHAHA', '1  ', '1', 'AHAHA@Gmail.com'),
(34, 101010, 'databaru', '1  ', '1', 'databaru'),
(35, 18882, 'lkskel', '2  ', '1', 'asdajsdlkjl@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `dataguru`
--
ALTER TABLE `dataguru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `dataguru`
--
ALTER TABLE `dataguru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
