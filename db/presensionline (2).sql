-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 06:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensionline`
--

-- --------------------------------------------------------

--
-- Table structure for table `generatepresensi`
--

CREATE TABLE `generatepresensi` (
  `id_gpresensi` int(10) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `pertemuan` varchar(20) NOT NULL,
  `materi` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `visibility` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generatepresensi`
--

INSERT INTO `generatepresensi` (`id_gpresensi`, `id_kelas`, `pertemuan`, `materi`, `status`, `visibility`) VALUES
(1, 'IN101B', 'Pertemuan Ke-1', '', 1, 0),
(2, 'IN101B', 'Pertemuan Ke-2', '', 1, 0),
(3, 'IN101B', 'Pertemuan Ke-3', '', 1, 0),
(4, 'IN101B', 'Pertemuan Ke-4', '', 1, 0),
(5, 'IN101B', 'Pertemuan Ke-5', '', 1, 0),
(6, 'IN101B', 'Pertemuan Ke-6', '', 1, 0),
(7, 'IN101B', 'Pertemuan Ke-7', '', 1, 0),
(8, 'IN101B', 'Pertemuan Ke-8', '', 1, 0),
(9, 'IN101B', 'Pertemuan Ke-9', '', 1, 0),
(10, 'IN101B', 'Pertemuan Ke-10', '', 1, 0),
(11, 'IN101B', 'Pertemuan Ke-11', '', 1, 0),
(12, 'IN101B', 'Pertemuan Ke-12', '', 1, 0),
(13, 'IN101B', 'Pertemuan Ke-13', '', 1, 0),
(14, 'IN101B', 'Pertemuan Ke-14', '', 1, 0),
(15, 'IN101B', 'Pertemuan Ke-15', '', 1, 0),
(16, 'IN101B', 'Pertemuan Ke-16', '', 1, 0),
(17, 'IN101B', 'Pertemuan Ke-17', '', 1, 0),
(18, 'IN101B', 'Pertemuan Ke-18', '', 1, 0),
(19, 'IN101B', 'Pertemuan Ke-19', '', 1, 0),
(20, 'IN101B', 'Pertemuan Ke-20', '', 1, 0),
(21, 'IN101B', 'Pertemuan Ke-21', '', 1, 0),
(22, 'IN101B', 'Pertemuan Ke-22', '', 1, 0),
(23, 'IN101B', 'Pertemuan Ke-23', '', 1, 0),
(24, 'IN101B', 'Pertemuan Ke-24', '', 1, 0),
(25, 'IN101B', 'Pertemuan Ke-25', '', 1, 0),
(26, 'IN101B', 'Pertemuan Ke-26', '', 1, 0),
(27, 'IN101A', 'Pertemuan Ke-1', 'Pengenalan Dasar', 1, 1),
(28, 'IN101A', 'Pertemuan Ke-2', 'Pengenalan Matriks Dasar', 1, 1),
(29, 'IN101A', 'Pertemuan Ke-3', 'Matriks dan Diagram', 1, 1),
(30, 'IN101A', 'Pertemuan Ke-4', 'Aljabar 1', 1, 0),
(31, 'IN101A', 'Pertemuan Ke-5', 'Aljabar 2', 1, 0),
(32, 'IN101A', 'Pertemuan Ke-6', '', 1, 0),
(33, 'IN101A', 'Pertemuan Ke-7', '', 1, 0),
(34, 'IN101A', 'Pertemuan Ke-8', '', 1, 0),
(35, 'IN101A', 'Pertemuan Ke-9', '', 1, 0),
(36, 'IN101A', 'Pertemuan Ke-10', '', 0, 0),
(37, 'IN101A', 'Pertemuan Ke-11', '', 1, 0),
(38, 'IN101A', 'Pertemuan Ke-12', '', 1, 0),
(39, 'IN101A', 'Pertemuan Ke-13', '', 1, 0),
(40, 'IN101A', 'Pertemuan Ke-14', '', 1, 0),
(41, 'IN101A', 'Pertemuan Ke-15', '', 1, 0),
(42, 'IN101A', 'Pertemuan Ke-16', '', 1, 0),
(43, 'IN101A', 'Pertemuan Ke-17', '', 1, 0),
(44, 'IN101A', 'Pertemuan Ke-18', '', 1, 0),
(45, 'IN101A', 'Pertemuan Ke-19', '', 1, 0),
(46, 'IN101A', 'Pertemuan Ke-20', '', 1, 0),
(47, 'IN101A', 'Pertemuan Ke-21', '', 1, 0),
(48, 'IN101A', 'Pertemuan Ke-22', '', 1, 0),
(49, 'IN101A', 'Pertemuan Ke-23', '', 1, 0),
(50, 'IN101A', 'Pertemuan Ke-24', '', 1, 0),
(51, 'IN101A', 'Pertemuan Ke-25', '', 1, 0),
(52, 'IN101A', 'Pertemuan Ke-26', '', 1, 0),
(57, 'IN102B', 'Pertemuan Ke-1', 'Ilmu Alam Semesta', 1, 0),
(58, 'IN102B', 'Pertemuan Ke-2', 'Manusia dan Pergerakan Bintang-bintang', 1, 0),
(59, 'IN102B', 'Pertemuan Ke-3', '', 1, 0),
(60, 'IN102B', 'Pertemuan Ke-4', '', 1, 0),
(61, 'IN102B', 'Pertemuan Ke-5', '', 1, 0),
(62, 'IN102B', 'Pertemuan Ke-6', '', 1, 0),
(63, 'IN102B', 'Pertemuan Ke-7', '', 1, 0),
(64, 'IN102B', 'Pertemuan Ke-8', '', 1, 0),
(65, 'IN102B', 'Pertemuan Ke-9', '', 1, 0),
(66, 'IN102B', 'Pertemuan Ke-10', '', 1, 0),
(67, 'IN102B', 'Pertemuan Ke-11', '', 1, 0),
(68, 'IN102B', 'Pertemuan Ke-12', '', 1, 0),
(69, 'IN102B', 'Pertemuan Ke-13', '', 1, 0),
(70, 'IN102B', 'Pertemuan Ke-14', '', 1, 0),
(71, 'IN102B', 'Pertemuan Ke-15', '', 1, 0),
(72, 'IN102B', 'Pertemuan Ke-16', '', 1, 0),
(73, 'IN102B', 'Pertemuan Ke-17', '', 1, 0),
(74, 'IN102B', 'Pertemuan Ke-18', '', 1, 0),
(75, 'IN102B', 'Pertemuan Ke-19', '', 1, 0),
(76, 'IN102B', 'Pertemuan Ke-20', '', 1, 0),
(77, 'IN102B', 'Pertemuan Ke-21', '', 1, 0),
(78, 'IN102B', 'Pertemuan Ke-22', '', 1, 0),
(79, 'IN102B', 'Pertemuan Ke-23', '', 1, 0),
(80, 'IN102B', 'Pertemuan Ke-24', '', 1, 0),
(81, 'IN102B', 'Pertemuan Ke-25', '', 1, 0),
(82, 'IN102B', 'Pertemuan Ke-26', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `privilege` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `password`, `nama`, `alamat`, `email`, `privilege`) VALUES
('gr001', 'guru', 'andry', 'Pemalang', '672018178@student.uksw.edu', 'guru'),
('gr002', 'guru', 'Riani', 'Salatiga', 'paul.andry01@gmail.com', 'guru'),
('gr003', 'guru', 'Budi', 'Jakarta', 'cadiskroezt5@gmail.com', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `id_guru` varchar(20) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `id_periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_mapel`, `id_guru`, `ruang`, `jadwal`, `id_periode`) VALUES
('IN101A', 'IN101', 'gr001', 'R450', 'Senin, 07-09', 'genap2021'),
('IN101B', 'IN101', 'gr002', 'R454', 'Jumat, 13-15', 'genap2021'),
('IN102A', 'IN102', 'gr003', 'R344', 'Rabu, 09-11', 'genap2021'),
('IN102B', 'IN102', 'gr001', 'R345', 'Selasa, 07-09', 'genap2021'),
('IN103A', 'IN103', 'gr002', 'R400', 'Senin, 10-1', 'genap2021');

-- --------------------------------------------------------

--
-- Table structure for table `kelasambil`
--

CREATE TABLE `kelasambil` (
  `id_kelasambil` int(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelasambil`
--

INSERT INTO `kelasambil` (`id_kelasambil`, `id_siswa`, `id_kelas`) VALUES
(1, 'sw001', 'IN101A'),
(3, 'sw001', 'IN102B'),
(4, 'sw001', 'IN102A'),
(8, 'sw001', 'IN103A'),
(9, 'sw002', 'IN102B'),
(10, 'sw002', 'IN102A'),
(11, 'sw002', 'IN103A');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`) VALUES
('IN101', 'Matematika'),
('IN102', 'IPA'),
('IN103', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` varchar(20) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `pertemuan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`, `pertemuan`) VALUES
('gasal2021', 'GASAL 2021', 26),
('genap2021', 'GENAP 2021', 26);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(7) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `id_gpresensi` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presensisiswa`
--

CREATE TABLE `presensisiswa` (
  `id_presensi` int(5) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_gpresensi` int(5) NOT NULL,
  `kehadiran` int(1) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensisiswa`
--

INSERT INTO `presensisiswa` (`id_presensi`, `id_siswa`, `id_gpresensi`, `kehadiran`, `waktu`) VALUES
(1, 'sw001', 27, 1, '2021-07-03 09:26:10'),
(2, 'sw001', 28, 1, '2021-07-04 08:07:46'),
(3, 'sw001', 29, 1, '2021-07-03 10:49:03'),
(4, 'sw001', 30, 1, '2021-07-04 10:28:29'),
(5, 'sw001', 57, 1, '2021-07-06 17:13:18'),
(6, 'sw002', 57, 1, '2021-07-06 17:13:20'),
(7, 'sw001', 58, 1, '2021-07-06 17:13:42'),
(8, 'sw002', 58, 0, '0000-00-00 00:00:00'),
(9, 'sw001', 59, 0, '0000-00-00 00:00:00'),
(10, 'sw002', 59, 1, '2021-07-06 17:14:03'),
(11, 'sw001', 60, 0, '0000-00-00 00:00:00'),
(12, 'sw002', 60, 0, '0000-00-00 00:00:00'),
(13, 'sw001', 31, 0, '0000-00-00 00:00:00'),
(14, 'sw001', 32, 0, '0000-00-00 00:00:00'),
(15, 'sw001', 33, 0, '0000-00-00 00:00:00'),
(16, 'sw001', 34, 0, '0000-00-00 00:00:00'),
(17, 'sw001', 35, 0, '0000-00-00 00:00:00'),
(18, 'sw001', 61, 0, '0000-00-00 00:00:00'),
(19, 'sw002', 61, 0, '0000-00-00 00:00:00'),
(20, 'sw001', 62, 0, '0000-00-00 00:00:00'),
(21, 'sw002', 62, 0, '0000-00-00 00:00:00'),
(22, 'sw001', 63, 0, '0000-00-00 00:00:00'),
(23, 'sw002', 63, 0, '0000-00-00 00:00:00'),
(24, 'sw001', 64, 0, '0000-00-00 00:00:00'),
(25, 'sw002', 64, 0, '0000-00-00 00:00:00'),
(26, 'sw001', 67, 0, '0000-00-00 00:00:00'),
(27, 'sw002', 67, 0, '0000-00-00 00:00:00'),
(28, 'sw001', 37, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `privilege` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `password`, `nama`, `alamat`, `email`, `privilege`) VALUES
('sw001', 'siswa', 'Leksono', 'Pemalang', 'leksono@gmail.com', 'siswa'),
('sw002', 'siswa', 'Kiono', 'Tangerang', 'kiono@gmail.com', 'siswa'),
('sw003', 'siswa', 'Nando', 'Semarang', 'nando@gmail.com', 'siswa'),
('sw004', 'siswa', 'Nina', 'Pekanbaru', 'nina@gmail.com', 'siswa'),
('sw005', 'siswa', 'Suki', 'Nipon', 'suki.desu@gmail.com', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generatepresensi`
--
ALTER TABLE `generatepresensi`
  ADD PRIMARY KEY (`id_gpresensi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_matakuliah` (`id_mapel`,`id_guru`),
  ADD KEY `id_dosen` (`id_guru`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `kelasambil`
--
ALTER TABLE `kelasambil`
  ADD PRIMARY KEY (`id_kelasambil`),
  ADD KEY `id_mahasiswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_gpresensi` (`id_gpresensi`);

--
-- Indexes for table `presensisiswa`
--
ALTER TABLE `presensisiswa`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_gpresensi` (`id_gpresensi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generatepresensi`
--
ALTER TABLE `generatepresensi`
  MODIFY `id_gpresensi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `kelasambil`
--
ALTER TABLE `kelasambil`
  MODIFY `id_kelasambil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `presensisiswa`
--
ALTER TABLE `presensisiswa`
  MODIFY `id_presensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `generatepresensi`
--
ALTER TABLE `generatepresensi`
  ADD CONSTRAINT `generatepresensi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`);

--
-- Constraints for table `kelasambil`
--
ALTER TABLE `kelasambil`
  ADD CONSTRAINT `kelasambil_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `kelasambil_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_gpresensi`) REFERENCES `generatepresensi` (`id_gpresensi`);

--
-- Constraints for table `presensisiswa`
--
ALTER TABLE `presensisiswa`
  ADD CONSTRAINT `presensisiswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `presensisiswa_ibfk_2` FOREIGN KEY (`id_gpresensi`) REFERENCES `generatepresensi` (`id_gpresensi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
