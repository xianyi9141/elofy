-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2018 at 02:06 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bharat_elofy3`
--

-- --------------------------------------------------------

--
-- Table structure for table `ttl_objetivo_curtir`
--

CREATE TABLE IF NOT EXISTS `ttl_objetivo_curtir` (
  `id_objetivo_curtida` int(11) NOT NULL,
  `id_objetivo_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Tabela de curtidas por elogio';

--
-- Dumping data for table `ttl_objetivo_curtir`
--

INSERT INTO `ttl_objetivo_curtir` (`id_objetivo_curtida`, `id_objetivo_comentario`, `id_usuario`, `data_atualizacao`) VALUES
(1, 97, 131, '2018-09-27 12:55:14'),
(2, 99, 131, '2018-09-27 13:28:12'),
(3, 96, 131, '2018-09-27 13:28:16'),
(4, 98, 131, '2018-09-27 13:34:28'),
(5, 95, 131, '2018-09-27 13:41:10'),
(6, 94, 131, '2018-09-27 13:41:17'),
(7, 93, 131, '2018-09-27 13:58:08'),
(8, 92, 131, '2018-09-27 14:02:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttl_objetivo_curtir`
--
ALTER TABLE `ttl_objetivo_curtir`
  ADD PRIMARY KEY (`id_objetivo_curtida`),
  ADD KEY `FK__ttl_elogio_curtida` (`id_objetivo_comentario`),
  ADD KEY `FK__ttl_usuario_curtida` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttl_objetivo_curtir`
--
ALTER TABLE `ttl_objetivo_curtir`
  MODIFY `id_objetivo_curtida` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
