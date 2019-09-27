/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : elofy_0904

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-09-14 01:11:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ttl_contrato_atualizacoes_anexo`
-- ----------------------------
DROP TABLE IF EXISTS `ttl_contrato_atualizacoes_anexo`;
CREATE TABLE `ttl_contrato_atualizacoes_anexo` (
  `id_anexo` int(11) NOT NULL AUTO_INCREMENT,
  `id_resultados_chave` int(11) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `anexo` varchar(500) NOT NULL,
  `category_num` int(11) DEFAULT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_anexo`),
  KEY `FK__ttl_usuario_atv_rchave` (`usuario_atualizador`),
  KEY `FK__ttl_atividades_atv_rchave` (`id_resultados_chave`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COMMENT='Vinculação de anexos aos resultados chave.';

-- ----------------------------
-- Records of ttl_contrato_atualizacoes_anexo
-- ----------------------------
