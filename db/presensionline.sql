-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 07:34 AM
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
  `pertemuan` varchar(50) NOT NULL,
  `materi` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('gr001', 'guru', 'andry', 'Pemalang', 'paul@gmail.com', 'guru'),
('gr002', 'guru', 'Riani', 'Salatiga', 'riani@gmail.com', 'guru'),
('gr003', 'guru', 'Budi', 'Jakarta', 'budi@gmail.com', 'guru');

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
-- Table structure for table `presensisiswa`
--

CREATE TABLE `presensisiswa` (
  `id_presensi` int(5) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_gpresensi` int(5) NOT NULL,
  `kehadiran` int(1) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_gpresensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelasambil`
--
ALTER TABLE `kelasambil`
  MODIFY `id_kelasambil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `presensisiswa`
--
ALTER TABLE `presensisiswa`
  MODIFY `id_presensi` int(5) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `presensisiswa`
--
ALTER TABLE `presensisiswa`
  ADD CONSTRAINT `presensisiswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `presensisiswa_ibfk_2` FOREIGN KEY (`id_gpresensi`) REFERENCES `generatepresensi` (`id_gpresensi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
