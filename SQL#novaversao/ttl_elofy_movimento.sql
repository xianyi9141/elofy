/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : elofy_0904

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-09-23 18:18:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ttl_elofy_movimento`
-- ----------------------------
DROP TABLE IF EXISTS `ttl_elofy_movimento`;
CREATE TABLE `ttl_elofy_movimento` (
  `id_elofy_movimento` int(11) NOT NULL AUTO_INCREMENT,
  `hashintegraelofy` varchar(50) DEFAULT NULL,
  `codigoMovimento` int(11) DEFAULT '1',
  `codigoEmpresa` varchar(10) DEFAULT NULL,
  `codigoGrupoEconomico` varchar(10) DEFAULT NULL,
  `codigoUsuario` varchar(50) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `tipoUsuario` int(11) DEFAULT '1',
  `nomeCompleto` varchar(300) DEFAULT NULL,
  `dataAdmissao` date DEFAULT NULL,
  `dataDesligamento` date DEFAULT NULL,
  `codigoUnidadeFuncional` varchar(50) DEFAULT NULL,
  `nomeUnidadeFuncional` varchar(100) DEFAULT NULL,
  `codigoUnidadePai` varchar(50) DEFAULT NULL,
  `codigoPrimeiroGestorUnidadeFuncional` varchar(50) DEFAULT NULL,
  `codigoSegundoGestorUnidadeFuncional` varchar(50) DEFAULT NULL,
  `codigoCargo` varchar(50) DEFAULT NULL,
  `nomeCargo` varchar(100) DEFAULT NULL,
  `dataMovimento` date DEFAULT NULL,
  PRIMARY KEY (`id_elofy_movimento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ttl_elofy_movimento
-- ----------------------------
