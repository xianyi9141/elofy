-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 08:23 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elofy24`
--

-- --------------------------------------------------------

--
-- Table structure for table `ttl_controle_ip`
--

CREATE TABLE `ttl_controle_ip` (
  `id_ttl_controle_ip` int(11) UNSIGNED NOT NULL,
  `id_empresa` int(11) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttl_controle_ip`
--

INSERT INTO `ttl_controle_ip` (`id_ttl_controle_ip`, `id_empresa`, `ip`, `data_atualizacao`) VALUES
(1, 62, '::1', '2018-07-26 18:22:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttl_controle_ip`
--
ALTER TABLE `ttl_controle_ip`
  ADD PRIMARY KEY (`id_ttl_controle_ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttl_controle_ip`
--
ALTER TABLE `ttl_controle_ip`
  MODIFY `id_ttl_controle_ip` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
