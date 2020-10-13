-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 06:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend_dilo`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE ` GET_GAME006_LEADERBOARD` ()  NO SQL
SELECT * FROM game006_leaderboard$$

CREATE DEFINER=`root`@`localhost` PROCEDURE ` GET_GAME007_LEADERBOARD` ()  NO SQL
SELECT * FROM game007_leaderboard$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_GAME001_LEADERBOARD` ()  NO SQL
SELECT * FROM game001_leaderboard$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_GAME_DATA_BY_STATUS` (IN `pStatus` BOOLEAN)  NO SQL
SELECT * FROM game_tbl where status = pStatus$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `game001_leaderboard`
-- (See below for the actual view)
--
CREATE TABLE `game001_leaderboard` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `game006_leaderboard`
-- (See below for the actual view)
--
CREATE TABLE `game006_leaderboard` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `game007_leaderboard`
-- (See below for the actual view)
--
CREATE TABLE `game007_leaderboard` (
);

-- --------------------------------------------------------

--
-- Table structure for table `game_level_tbl`
--

CREATE TABLE `game_level_tbl` (
  `level_id` int(11) NOT NULL,
  `game_id` int(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_level_tbl`
--

INSERT INTO `game_level_tbl` (`level_id`, `game_id`, `level`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 6, 2),
(5, 6, 3),
(6, 7, 2),
(7, 7, 3),
(8, 7, 4),
(9, 7, 5),
(11, 10, 1),
(22, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_tbl`
--

CREATE TABLE `game_tbl` (
  `game_id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe_leaderboard` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_tbl`
--

INSERT INTO `game_tbl` (`game_id`, `nama`, `tipe_leaderboard`, `status`) VALUES
(1, 'Game-001', 1, 1),
(6, 'Game-006', 1, 1),
(7, 'Game-007', 1, 1),
(10, 'tes1', 1, 1),
(17, 'tes213', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota_tbl`
--

CREATE TABLE `kota_tbl` (
  `kota_id` int(255) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `provinsi_id` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota_tbl`
--

INSERT INTO `kota_tbl` (`kota_id`, `nama_kota`, `provinsi_id`, `status`) VALUES
(1, 'Bandung', 1, 1),
(2, 'Sumedang', 1, 1),
(3, 'Garut', 1, 1),
(4, 'Semarang', 2, 1),
(5, 'Surakarta', 2, 1),
(6, 'Tegal', 2, 1),
(7, 'Surabaya', 3, 1),
(8, 'Malang', 3, 1),
(9, 'Batu', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi_tbl`
--

CREATE TABLE `provinsi_tbl` (
  `provinsi_id` int(255) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi_tbl`
--

INSERT INTO `provinsi_tbl` (`provinsi_id`, `nama_provinsi`, `status`) VALUES
(1, 'Jawa Barat', 1),
(2, 'Jawa Tengah', 1),
(3, 'Jawa Timur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_game_data_tbl`
--

CREATE TABLE `user_game_data_tbl` (
  `user_game_data_id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `level_id` int(255) NOT NULL,
  `score` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_game_data_tbl`
--

INSERT INTO `user_game_data_tbl` (`user_game_data_id`, `nik`, `level_id`, `score`, `status`) VALUES
(1, '1000000000000001', 1, 67, 1),
(2, '1000000000000001', 1, 60, 1),
(3, '1000000000000002', 1, 87, 1),
(4, '1000000000000003', 1, 61, 1),
(5, '1000000000000001', 6, 80, 1),
(6, '1000000000000001', 6, 67, 1),
(7, '1000000000000001', 6, 97, 1),
(8, '1000000000000001', 7, 60, 1),
(9, '1000000000000002', 7, 70, 1),
(10, '1000000000000002', 7, 99, 1),
(11, '1000000000000002', 7, 70, 1),
(12, '1000000000000003', 7, 50, 1),
(13, 'admin', 1, 88, 1),
(14, 'admin', 1, 78, 1),
(15, 'admin', 1, 90, 1),
(16, 'admin', 1, 38, 1),
(17, 'admin', 1, 68, 1),
(18, 'admin', 1, 99, 1),
(19, 'admin', 6, 80, 1),
(20, 'admin', 6, 70, 1),
(21, 'admin', 6, 90, 1),
(22, 'admin', 6, 58, 1),
(23, 'admin', 6, 48, 1),
(24, 'admin', 6, 100, 1),
(25, 'admin', 7, 40, 1),
(26, 'admin', 7, 60, 1),
(27, 'admin', 7, 70, 1),
(28, 'admin', 7, 98, 1),
(29, 'admin', 7, 68, 1),
(30, 'admin', 7, 50, 1),
(31, 'admin', 2, 80, 1),
(32, 'admin', 2, 50, 1),
(33, 'admin', 2, 90, 1),
(34, 'admin', 3, 30, 1),
(35, 'admin', 3, 50, 1),
(36, 'admin', 3, 40, 1),
(37, 'admin', 4, 80, 1),
(38, 'admin', 4, 90, 1),
(39, 'admin', 4, 10, 1),
(40, 'admin', 5, 50, 1),
(41, 'admin', 5, 90, 1),
(42, 'admin', 5, 10, 1),
(43, 'admin', 1, 12, 1),
(45, 'admin1', 5, 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `nik` varchar(16) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `nomor_handphone` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota_id` int(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`nik`, `nama_depan`, `nama_belakang`, `nomor_handphone`, `tanggal_lahir`, `tempat_lahir`, `email`, `password`, `token`, `alamat`, `kota_id`, `kode_pos`, `status`) VALUES
('1000000000000001', 'Ani', 'Marni', '081012349002', '1990-01-01', 'Bandung', 'animarni@gmail.com', 'f43433f2d32d', '4f33gf43h45656', 'Gedebage, Bandung', 1, 0, 1),
('1000000000000002', 'Budi', 'Yanto', '081012345678', '1991-02-02', 'Bandung', 'budiyanto@gmail.com', 'f43433f24545', '4f3fdfd3h45656', 'Gedebage, Bandung', 1, 0, 1),
('1000000000000003', 'Charlie', 'Darwin', '081012349999', '1992-03-03', 'Bandung', 'charliedarwin@gmail.com', 'f43433f2bv5g', '56565f43h45656', 'Gedebage, Bandung', 1, 0, 1),
('admin', 'admin', 'admin', '12', '2001-07-04', 'mks', 'alfian@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'e6f7d769435d68df6a40af4f4f6aeb1b', 'serigala', 1, 12345, 1),
('admin1', 'alfian', 'hamdani', '1234', '2001-07-04', 'Mks', 'alfian@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', '4ad8128d11e9c9b3f9c6644f4a373f59', 'di mana saja', 1, 12234, 1);

-- --------------------------------------------------------

--
-- Structure for view `game001_leaderboard`
--
DROP TABLE IF EXISTS `game001_leaderboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `game001_leaderboard`  AS  select `user_tbl`.`email` AS `email`,`user_tbl`.`nama_depan` AS `nama_depan`,`user_tbl`.`nama_belakang` AS `nama_belakang`,`kota_tbl`.`nama_kota` AS `kota`,`provinsi_tbl`.`nama_provinsi` AS `provinsi`,`user_game_data_tbl`.`score` AS `score` from (((`user_game_data_tbl` join `user_tbl`) join `kota_tbl`) join `provinsi_tbl`) where `user_game_data_tbl`.`game_id` = 1 and `user_game_data_tbl`.`nik` = `user_tbl`.`nik` and `user_tbl`.`kota_id` = `kota_tbl`.`kota_id` and `kota_tbl`.`provinsi_id` = `provinsi_tbl`.`provinsi_id` and `user_tbl`.`status` = 1 and `user_game_data_tbl`.`status` = 1 group by `user_tbl`.`nik` order by `user_game_data_tbl`.`score` desc ;

-- --------------------------------------------------------

--
-- Structure for view `game006_leaderboard`
--
DROP TABLE IF EXISTS `game006_leaderboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `game006_leaderboard`  AS  select `user_tbl`.`email` AS `email`,`user_tbl`.`nama_depan` AS `nama_depan`,`user_tbl`.`nama_belakang` AS `nama_belakang`,`kota_tbl`.`nama_kota` AS `kota`,`provinsi_tbl`.`nama_provinsi` AS `provinsi`,`user_game_data_tbl`.`score` AS `score` from (((`user_game_data_tbl` join `user_tbl`) join `kota_tbl`) join `provinsi_tbl`) where `user_game_data_tbl`.`game_id` = 6 and `user_game_data_tbl`.`nik` = `user_tbl`.`nik` and `user_tbl`.`kota_id` = `kota_tbl`.`kota_id` and `kota_tbl`.`provinsi_id` = `provinsi_tbl`.`provinsi_id` and `user_tbl`.`status` = 1 and `user_game_data_tbl`.`status` = 1 group by `user_tbl`.`nik` order by `user_game_data_tbl`.`score` desc ;

-- --------------------------------------------------------

--
-- Structure for view `game007_leaderboard`
--
DROP TABLE IF EXISTS `game007_leaderboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `game007_leaderboard`  AS  select `user_tbl`.`email` AS `email`,`user_tbl`.`nama_depan` AS `nama_depan`,`user_tbl`.`nama_belakang` AS `nama_belakang`,`kota_tbl`.`nama_kota` AS `kota`,`provinsi_tbl`.`nama_provinsi` AS `provinsi`,`user_game_data_tbl`.`score` AS `score` from (((`user_game_data_tbl` join `user_tbl`) join `kota_tbl`) join `provinsi_tbl`) where `user_game_data_tbl`.`game_id` = 7 and `user_game_data_tbl`.`nik` = `user_tbl`.`nik` and `user_tbl`.`kota_id` = `kota_tbl`.`kota_id` and `kota_tbl`.`provinsi_id` = `provinsi_tbl`.`provinsi_id` and `user_tbl`.`status` = 1 and `user_game_data_tbl`.`status` = 1 group by `user_tbl`.`nik` order by `user_game_data_tbl`.`score` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_level_tbl`
--
ALTER TABLE `game_level_tbl`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `FK_GAME_TBL_GAME_ID1` (`game_id`);

--
-- Indexes for table `game_tbl`
--
ALTER TABLE `game_tbl`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `kota_tbl`
--
ALTER TABLE `kota_tbl`
  ADD PRIMARY KEY (`kota_id`),
  ADD KEY `FK_PROVINSI_TBL_PROVINSI_ID` (`provinsi_id`);

--
-- Indexes for table `provinsi_tbl`
--
ALTER TABLE `provinsi_tbl`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `user_game_data_tbl`
--
ALTER TABLE `user_game_data_tbl`
  ADD PRIMARY KEY (`user_game_data_id`),
  ADD KEY `FK_USER_TBL_NIK` (`nik`),
  ADD KEY `FK_GAME_LEVEL_TBL_LEVEL_ID` (`level_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `FK_KOTA_TBL_KOTA_ID` (`kota_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_level_tbl`
--
ALTER TABLE `game_level_tbl`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `game_tbl`
--
ALTER TABLE `game_tbl`
  MODIFY `game_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kota_tbl`
--
ALTER TABLE `kota_tbl`
  MODIFY `kota_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `provinsi_tbl`
--
ALTER TABLE `provinsi_tbl`
  MODIFY `provinsi_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_game_data_tbl`
--
ALTER TABLE `user_game_data_tbl`
  MODIFY `user_game_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_level_tbl`
--
ALTER TABLE `game_level_tbl`
  ADD CONSTRAINT `FK_GAME_TBL_GAME_ID1` FOREIGN KEY (`game_id`) REFERENCES `game_tbl` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kota_tbl`
--
ALTER TABLE `kota_tbl`
  ADD CONSTRAINT `FK_PROVINSI_TBL_PROVINSI_ID` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi_tbl` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_game_data_tbl`
--
ALTER TABLE `user_game_data_tbl`
  ADD CONSTRAINT `FK_GAME_LEVEL_TBL_LEVEL_ID` FOREIGN KEY (`level_id`) REFERENCES `game_level_tbl` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_TBL_NIK` FOREIGN KEY (`nik`) REFERENCES `user_tbl` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `FK_KOTA_TBL_KOTA_ID` FOREIGN KEY (`kota_id`) REFERENCES `kota_tbl` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
