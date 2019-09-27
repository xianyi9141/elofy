/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : elofy_0904

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-09-23 18:19:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ttl_hash_integracao`
-- ----------------------------
DROP TABLE IF EXISTS `ttl_hash_integracao`;
CREATE TABLE `ttl_hash_integracao` (
  `id_hash_integracao` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `hash` varchar(50) DEFAULT NULL,
  `data_expiracao` date DEFAULT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_hash_integracao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ttl_hash_integracao
-- ----------------------------
