-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2024 at 04:12 PM
-- Server version: 10.5.23-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epres`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id` int(20) NOT NULL,
  `nama_ekstra` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id`, `nama_ekstra`) VALUES
(1, 'Hiking Club'),
(2, 'SBAQ'),
(4, 'SNB'),
(5, 'SDF'),
(6, 'KIR'),
(7, 'JURNALISTIK');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `nama_hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari_id` int(11) DEFAULT NULL,
  `ekstra_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari_id`, `ekstra_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 4),
(4, 3, 4),
(5, 3, 5),
(6, 3, 7),
(7, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `ekstra` varchar(30) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `user`, `ekstra`, `keterangan`, `waktu`, `nis`) VALUES
(27, 'Akbar', 'SNB', 'Hadir', '2024-05-21 18:45:32', '20426'),
(28, 'Akbar', 'SNB', 'Hadir', '2024-05-21 18:52:09', '20426'),
(29, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:00:57', '20412'),
(30, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:01:03', '20412'),
(31, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:01:06', '20412'),
(32, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:01:14', '20412'),
(33, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:02:56', '20412'),
(34, 'demo cuy', 'KIR', 'Hadir', '2024-05-21 19:05:40', '12345'),
(35, 'demo cuy', 'KIR', 'Hadir', '2024-05-21 19:08:23', '12345'),
(36, 'Akbar', 'SNB', 'Hadir', '2024-05-21 19:09:21', '20426'),
(37, 'Akbar', 'SNB', 'Hadir', '2024-05-21 19:09:25', '20426'),
(38, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:09:34', '20412'),
(39, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:09:42', '20412'),
(40, 'Akbar', 'SNB', 'Hadir', '2024-05-21 19:10:03', '20426'),
(41, 'Akbar', 'SNB', 'Hadir', '2024-05-21 19:10:05', '20426'),
(42, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:14:23', '20412'),
(43, 'Vincentius Reynara Ezratama', 'SNB', 'Hadir', '2024-05-21 19:17:01', '20412');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_settings`
--

CREATE TABLE `presensi_settings` (
  `id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi_settings`
--

INSERT INTO `presensi_settings` (`id`, `start_time`, `end_time`) VALUES
(2, '18:00:00', '22:00:00'),
(3, '19:09:00', '19:12:00'),
(4, '19:10:00', '19:11:00'),
(5, '19:14:00', '19:16:00'),
(6, '19:14:00', '19:15:00'),
(7, '19:14:00', '19:15:00'),
(8, '19:18:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `ekstraa` varchar(30) NOT NULL,
  `user_tipe` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `fullname`, `kelas`, `gender`, `nis`, `ekstraa`, `user_tipe`) VALUES
(14, 'demo', 'redo@gmail.com', 'demo123', 'demo', '11 SIJA B', 'Male', '20400', 'SNB', ''),
(16, 'nara', 'reynara@gmail.com', '123', 'Vincentius Reynara Ezratama', 'SIJA B', 'Male', '20412', 'SNB', 'siswa'),
(17, 'barr', 'redo@gmail.com', 'bar123', 'dedi', '11 SIJA B', 'Male', '20426', 'SDF', 'admin'),
(18, 'gibran', 'redo@gmail.com', '123', 'demo cuy', 'SIJA B', 'Male', '12345', 'KIR', 'siswa'),
(19, 'siswa8', 'sutan@gmail.com', '123', 'demo cuy', 'SIJA B', 'Male', '12344', 'KIR', 'siswa'),
(20, 'siswa8', 'sutan@gmail.com', '123', 'oi oi', 'SIJA A', 'Male', '12', '...', 'siswa'),
(21, 'siswa8', 'sutan@gmail.com', '123', 'GG', 'SIJA A', 'Female', '123', 'SDF', 'siswa'),
(22, 'sasa', 'sasas@gmail.com', '123', 'sasa', 'SIJA A', 'Male', '12345', 'KIR', 'siswa'),
(23, 'hamm', 'ilham10dzaky@gmail.com', '123', 'Shafwan Ilham Dzaky', 'SIJA B', 'Male', '20453', 'KIR', 'siswa'),
(24, 'prabowo', 'test@gmail.com', '123', 'Prabowooooo', 'SIJA B', 'Male', '02', 'SDF', 'siswa'),
(25, 'apalah', 'test@gmail.com', '123', 'testttttt', 'SIJA A', 'Male', '12', 'KIR', 'siswa'),
(26, 'gibran', 'redo@gmail.com', '123', 'Prabowooooo', '11 SIJA B', 'Male', '12', 'SNB', 'siswa'),
(27, 'gibran', 'redo@gmail.com', '123', 'Prabowooooo', '11 SIJA B', 'Female', '12345', 'KIR', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hari_id` (`hari_id`),
  ADD KEY `ekstra_id` (`ekstra_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_settings`
--
ALTER TABLE `presensi_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `presensi_settings`
--
ALTER TABLE `presensi_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`ekstra_id`) REFERENCES `ekstra` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
