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
-- Table structure for table `ttl_objetivo_comentario_reactions`
--

CREATE TABLE IF NOT EXISTS `ttl_objetivo_comentario_reactions` (
  `id_objetivo_comentario_reaction` int(11) NOT NULL,
  `id_objetivo` int(11) NOT NULL DEFAULT '0',
  `id_objetivo_comentario` int(11) DEFAULT NULL,
  `tipo` enum('1','2','3','4') NOT NULL COMMENT '1=>grinning, 2=>pouting, 3=>, 4=>flushed',
  `id_usuario` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Tabela de controle de comentários';

--
-- Dumping data for table `ttl_objetivo_comentario_reactions`
--

INSERT INTO `ttl_objetivo_comentario_reactions` (`id_objetivo_comentario_reaction`, `id_objetivo`, `id_objetivo_comentario`, `tipo`, `id_usuario`, `data_atualizacao`) VALUES
(6, 298, 99, '3', 131, '2018-09-27 16:09:22'),
(7, 298, 95, '2', 131, '2018-09-27 16:10:16'),
(8, 298, 94, '3', 131, '2018-09-27 16:07:50'),
(9, 298, 96, '3', 131, '2018-09-27 19:32:41'),
(10, 298, 93, '1', 131, '2018-09-27 16:09:29'),
(11, 298, 68, '1', 131, '2018-09-27 16:17:23'),
(12, 298, 99, '2', 132, '2018-09-27 17:41:03'),
(13, 298, 37, '3', 132, '2018-09-27 17:35:34'),
(14, 298, 95, '4', 132, '2018-09-27 17:34:36'),
(15, 298, 96, '4', 132, '2018-09-27 16:27:52'),
(16, 298, 94, '1', 132, '2018-09-27 17:35:16'),
(17, 298, 37, '1', 131, '2018-09-27 17:36:57'),
(18, 298, 65, '4', 132, '2018-09-27 17:34:41'),
(19, 298, 92, '1', 132, '2018-09-27 17:35:14'),
(20, 700, 98, '2', 131, '2018-09-27 17:42:05'),
(21, 700, 98, '1', 132, '2018-09-27 17:39:45'),
(22, 670, 14, '2', 91, '2018-09-27 17:41:54'),
(23, 670, 13, '3', 91, '2018-09-27 17:41:57'),
(24, 700, 97, '1', 131, '2018-09-27 17:42:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttl_objetivo_comentario_reactions`
--
ALTER TABLE `ttl_objetivo_comentario_reactions`
  ADD PRIMARY KEY (`id_objetivo_comentario_reaction`),
  ADD KEY `FK__ttl_objetivos_com` (`id_objetivo`),
  ADD KEY `FK__ttl_usuario_com` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttl_objetivo_comentario_reactions`
--
ALTER TABLE `ttl_objetivo_comentario_reactions`
  MODIFY `id_objetivo_comentario_reaction` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
