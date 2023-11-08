-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2023 at 02:25 PM
-- Server version: 10.5.22-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostdeprojetos_aquarelaimports`
--
CREATE DATABASE IF NOT EXISTS `hostdeprojetos_aquarelaimports` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `hostdeprojetos_aquarelaimports`;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `cod` varchar(30) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `measurement` varchar(10) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `videoUrl` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `cod`, `name`, `description`, `price`, `category_id`, `measurement`, `size`, `videoUrl`) VALUES
(24, 'BIKE280', 'bicicleta', 'bike3', 800.60, 2, '40', 60, 'video.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `description` varchar(128) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `description`, `parent_id`) VALUES
(2, 'descricao', 3),
(3, 'descricao', 4);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `base64_data` longtext NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `advertisement_id`, `base64_data`, `upload_date`, `description`) VALUES
(1, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(2, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(3, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(4, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(5, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(6, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(7, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(8, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(9, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(10, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(11, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(12, 0, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(13, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(14, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(15, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(16, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(17, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(18, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(19, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(20, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(21, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(22, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(23, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', ''),
(24, 4, 'ZWcgMmBjIHF3c2FkQVYg', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `idNivelUsuario` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL CHECK (`active` in (0,1)),
  `active_code` varchar(256) DEFAULT NULL,
  `recovery_phrase` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `idNivelUsuario`, `name`, `email`, `password`, `active`, `active_code`, `recovery_phrase`) VALUES
(1, 1, 'Teste Usuario', 'teste@teste.com', '123123', 0, '0', 'teste'),
(5, 1, 'Teste Usuario 3', 'teste@teste2.com', '123123', 0, '0', 'teste');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `description`) VALUES
(1, 'Administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idNivelUsuario` (`idNivelUsuario`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idNivelUsuario`) REFERENCES `user_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
