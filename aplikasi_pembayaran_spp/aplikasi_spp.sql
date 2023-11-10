-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 04:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'X AKL 1', 'Akuntansi dan Keuangan Lembaga'),
(2, 'X AKL 2', 'Akuntansi dan Keuangan Lembaga'),
(3, 'X AKL 3', 'Akuntansi dan Keuangan Lembaga'),
(4, 'X OTKP 1', 'Otomatisasi Tata Kelola Perkantoran'),
(5, 'X OTKP 2', 'Otomatisasi Tata Kelola Perkantoran'),
(6, 'X OTKP 3', 'Otomatisasi Tata Kelola Perkantoran'),
(7, 'X BDP 1', 'Bisnis Daring dan Pemasaran'),
(8, 'X BDP 2', 'Bisnis Daring dan Pemasaran'),
(9, 'X BDP 3', 'Bisnis Daring dan Pemasaran'),
(10, 'X MM', 'Multimedia'),
(11, 'X TKJ', 'Teknik Komputer dan Jaringan'),
(12, 'X RPL', 'Rekayasa Perangkat Lunak'),
(13, 'XI AKL 1', 'Akuntansi dan Keuangan Lembaga'),
(14, 'XI AKL 2', 'Akuntansi dan Keuangan Lembaga'),
(15, 'XI AKL 3', 'Akuntansi dan Keuangan Lembaga'),
(16, 'XI OTKP 1', 'Otomatisasi Tata Kelola Perkantoran'),
(17, 'XI OTKP 2', 'Otomatisasi Tata Kelola Perkantoran'),
(18, 'XI OTKP 3', 'Otomatisasi Tata Kelola Perkantoran'),
(19, 'XI BDP 1', 'Bisnis Daring dan Pemasaran'),
(20, 'XI BDP 2', 'Bisnis Daring dan Pemasaran'),
(21, 'XI BDP 3', 'Bisnis Daring dan Pemasaran'),
(22, 'XI MM', 'Multimedia'),
(23, 'XI TKJ', 'Teknik Komputer dan Jaringan'),
(24, 'XI RPL', 'Rekayasa Perangkat Lunak'),
(25, 'XII AKL 1', 'Akuntansi dan Keuangan Lembaga'),
(26, 'XII AKL 2', 'Akuntansi dan Keuangan Lembaga'),
(27, 'XII AKL 3', 'Akuntansi dan Keuangan Lembaga'),
(28, 'XII OTKP 1', 'Otomatisasi Tata Kelola Perkantoran'),
(29, 'XII OTKP 2', 'Otomatisasi Tata Kelola Perkantoran'),
(30, 'XII OTKP 3', 'Otomatisasi Tata Kelola Perkantoran'),
(31, 'XII BDP 1', 'Bisnis Daring dan Pemasaran'),
(32, 'XII BDP 2', 'Bisnis Daring dan Pemasaran'),
(33, 'XII BDP 3', 'Bisnis Daring dan Pemasaran'),
(34, 'XII MM', 'Multimedia'),
(35, 'XII TKJ', 'Teknik Komputer dan Jaringan'),
(36, 'XII RPL', 'Rekayasa Perangkat Lunak'),
(999, 'X', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(11) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(12, 1, 47096050, '2023-03-09', 'Juli', '2020', 91, 3600000),
(13, 2, 54029218, '2023-03-09', 'Januari', '2021', 92, 2400000);

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `t_delete` AFTER DELETE ON `pembayaran` FOR EACH ROW BEGIN
UPDATE siswa SET total_bayar = total_bayar - (OLD.jumlah_bayar)
WHERE
nisn = OLD.nisn;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_insert` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
UPDATE siswa SET total_bayar = total_bayar + (NEW.jumlah_bayar)
WHERE
nisn = NEW.nisn;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_update` BEFORE UPDATE ON `pembayaran` FOR EACH ROW BEGIN
UPDATE siswa SET total_bayar = total_bayar - (NEW.jumlah_bayar - OLD.jumlah_bayar)
WHERE
nisn = NEW.nisn;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', 'admin123', 'Admin', 'admin'),
(2, 'petugas1', 'petugas123', 'Petugas 1', 'petugas'),
(3, 'petugas2', 'petugas123', 'Petugas 2', 'petugas'),
(4, 'petugas3', 'petugas123', 'Petugas 3', 'petugas'),
(5, 'siswa1', 'siswa123', 'Siswa 1', 'siswa'),
(6, 'siswa2', 'siswa123', 'Siswa 2', 'siswa'),
(7, 'siswa3', 'siswa123', 'Siswa 3', 'siswa'),
(8, 'siswa4', 'siswa123', 'Siswa 4', 'siswa'),
(9, 'siswa5', 'siswa123', 'Siswa 5', 'siswa'),
(10, 'siswa6', 'siswa123', 'Siswa 6', 'siswa'),
(11, 'siswa7', 'siswa123', 'Siswa 7', 'siswa'),
(12, 'siswa8', 'siswa123', 'Siswa 8', 'siswa'),
(13, 'siswa9', 'siswa123', 'Siswa 9', 'siswa'),
(14, 'siswa10', 'siswa123', 'Siswa 10', 'siswa'),
(15, 'siswa11', 'siswa123', 'Siswa 11', 'siswa'),
(16, 'siswa12', 'siswa123', 'Siswa 12', 'siswa'),
(17, 'siswa13', 'siswa123', 'Siswa 13', 'siswa'),
(18, 'siswa14', 'siswa123', 'Siswa 14', 'siswa'),
(19, 'siswa15', 'siswa123', 'Siswa 15', 'siswa'),
(20, 'siswa16', 'siswa123', 'Siswa 16', 'siswa'),
(21, 'siswa17', 'siswa123', 'Siswa 17', 'siswa'),
(22, 'siswa18', 'siswa123', 'Siswa 18', 'siswa'),
(23, 'siswa19', 'siswa123', 'Siswa 19', 'siswa'),
(24, 'siswa20', 'siswa123', 'Siswa 20', 'siswa'),
(25, 'siswa21', 'siswa123', 'Siswa 21', 'siswa'),
(26, 'siswa22', 'siswa123', 'Siswa 22', 'siswa'),
(27, 'siswa23', 'siswa123', 'Siswa 23', 'siswa'),
(28, 'siswa24', 'siswa123', 'Siswa 24', 'siswa'),
(29, 'siswa25', 'siswa123', 'Siswa 25', 'siswa'),
(30, 'siswa26', 'siswa123', 'Siswa 26', 'siswa'),
(31, 'siswa27', 'siswa123', 'Siswa 27', 'siswa'),
(32, 'siswa28', 'siswa123', 'Siswa 28', 'siswa'),
(33, 'siswa29', 'siswa123', 'Siswa 29', 'siswa'),
(34, 'siswa30', 'siswa123', 'Siswa 30', 'siswa'),
(35, 'siswa31', 'siswa123', 'Siswa 31', 'siswa'),
(36, 'siswa32', 'siswa123', 'Siswa 32', 'siswa'),
(37, 'siswa33', 'siswa123', 'Siswa 33', 'siswa'),
(38, 'siswa34', 'siswa123', 'Siswa 34', 'siswa'),
(39, 'siswa35', 'siswa123', 'Siswa 35', 'siswa'),
(40, 'siswa36', 'siswa123', 'Siswa 36', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` int(25) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `total_bayar`) VALUES
(47096050, 1104020001, 'I Nyoman Ari Suardana', 36, 'Gianyar', 2147483647, 91, -1600000),
(54029218, 2147483647, 'Ardan Machieous', 25, 'USA', 1233535345, 92, 3200000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` varchar(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, '2020', 600000),
(2, '2021', 600000),
(3, '2022', 600000),
(4, '2023', 600000),
(5, '2024', 600000),
(6, '2025', 600000),
(7, '2026', 600000),
(8, '2027', 600000),
(9, '2028', 600000),
(10, '2029', 600000),
(11, '2030', 600000),
(12, '2031', 600000),
(13, '2032', 600000),
(14, '2033', 600000),
(15, '2034', 600000),
(16, '2035', 600000),
(17, '2036', 600000),
(18, '2037', 600000),
(19, '2038', 600000),
(20, '2039', 600000),
(21, '2040', 600000),
(22, '2041', 600000),
(23, '2042', 600000),
(24, '2043', 600000),
(25, '2044', 600000),
(26, '2045', 600000),
(27, '2046', 600000),
(28, '2047', 600000),
(29, '2048', 600000),
(30, '2049', 600000),
(31, '2050', 600000),
(32, '2020/2021', 1200000),
(33, '2021/2022', 1200000),
(34, '2022/2023', 1200000),
(35, '2023/2024', 1200000),
(36, '2024/2025', 1200000),
(37, '2025/2026', 1200000),
(38, '2026/2027', 1200000),
(39, '2027/2028', 1200000),
(40, '2028/2029', 1200000),
(41, '2029/2030', 1200000),
(42, '2030/2031', 1200000),
(43, '2031/2032', 1200000),
(44, '2032/2033', 1200000),
(45, '2033/2034', 1200000),
(46, '2034/2035', 1200000),
(47, '2035/2036', 1200000),
(48, '2036/2037', 1200000),
(49, '2037/2038', 1200000),
(50, '2038/2039', 1200000),
(51, '2039/2040', 1200000),
(52, '2040/2041', 1200000),
(53, '2041/2042', 1200000),
(54, '2042/2043', 1200000),
(55, '2043/2044', 1200000),
(56, '2044/2045', 1200000),
(57, '2045/2046', 1200000),
(58, '2046/2047', 1200000),
(59, '2047/2048', 1200000),
(60, '2048/2049', 1200000),
(61, '2049/2050', 1200000),
(62, '2020/2022', 2400000),
(63, '2021/2023', 2400000),
(64, '2022/2024', 2400000),
(65, '2023/2025', 2400000),
(66, '2024/2026', 2400000),
(67, '2025/2027', 2400000),
(68, '2026/2028', 2400000),
(69, '2027/2029', 2400000),
(70, '2028/2030', 2400000),
(71, '2029/2031', 2400000),
(72, '2030/2032', 2400000),
(73, '2031/2033', 2400000),
(74, '2032/2034', 2400000),
(75, '2033/2035', 2400000),
(76, '2034/2036', 2400000),
(77, '2035/2037', 2400000),
(78, '2036/2038', 2400000),
(79, '2037/2039', 2400000),
(80, '2038/2040', 2400000),
(81, '2039/2041', 2400000),
(82, '2040/2042', 2400000),
(83, '2041/2043', 2400000),
(84, '2042/2044', 2400000),
(85, '2043/2045', 2400000),
(86, '2044/2046', 2400000),
(87, '2045/2047', 2400000),
(88, '2046/2048', 2400000),
(89, '2047/2049', 2400000),
(90, '2048/2050', 2400000),
(91, '2020/2023', 3600000),
(92, '2021/2024', 3600000),
(93, '2022/2025', 3600000),
(94, '2023/2026', 3600000),
(95, '2024/2027', 3600000),
(96, '2025/2028', 3600000),
(97, '2026/2029', 3600000),
(98, '2027/2030', 3600000),
(99, '2028/2031', 3600000),
(100, '2029/2032', 3600000),
(101, '2030/2033', 3600000),
(102, '2031/2034', 3600000),
(103, '2032/2035', 3600000),
(104, '2033/2036', 3600000),
(105, '2034/2037', 3600000),
(106, '2035/2038', 3600000),
(107, '2036/2039', 3600000),
(108, '2037/2040', 3600000),
(109, '2038/2041', 3600000),
(110, '2039/2042', 3600000),
(111, '2040/2043', 3600000),
(112, '2041/2044', 3600000),
(113, '2042/2045', 3600000),
(114, '2043/2046', 3600000),
(115, '2044/2047', 3600000),
(116, '2045/2048', 3600000),
(117, '2046/2049', 3600000),
(118, '2047/2050', 3600000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_nisn` (`nisn`),
  ADD KEY `pembayaran_id_spp` (`id_spp`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `siswa_id_kelas` (`id_kelas`),
  ADD KEY `siswa_id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
