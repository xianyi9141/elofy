SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `ttl_protocolo_avaliacao_valores`
--

CREATE TABLE IF NOT EXISTS `ttl_protocolo_avaliacao_valores` (
  `id_avaliacao_valores` int(11) unsigned NOT NULL,
  `id_protocolo_avaliacao` int(11) NOT NULL,
  `id_valore` int(11) NOT NULL,
  `avaliacao` double DEFAULT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabela que vincula competências que serão avaliadas no feedback do usuário';

--
-- Indexes for table `ttl_protocolo_avaliacao_valores`
--
ALTER TABLE `ttl_protocolo_avaliacao_valores`
  ADD PRIMARY KEY (`id_avaliacao_valores`),
  ADD KEY `FK_ttl_protocolo_avaliacao_competencias_ttl_protocolo_avaliacao` (`id_protocolo_avaliacao`),
  ADD KEY `FK_ttl_protocolo_avaliacao_competencias_ttl_competencias` (`id_valore`),
  ADD KEY `FK_ttl_protocolo_avaliacao_competencias_ttl_usuario` (`usuario_atualizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttl_protocolo_avaliacao_valores`
--
ALTER TABLE `ttl_protocolo_avaliacao_valores`
  MODIFY `id_avaliacao_valores` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `ttl_empresa` ADD `label_performance` VARCHAR(50) NULL DEFAULT NULL AFTER `label_pdi`;

ALTER TABLE `ttl_empresa` ADD `performance` INT(11) NOT NULL DEFAULT '1' AFTER `pdi`;


