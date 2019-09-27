CREATE TABLE `ttl_alertas_feedback` (
  `id_alerta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL COMMENT '0 nao 1 sim',
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL DEFAULT 'recebido' COMMENT '''recebido'' ou ''solicitado''',
  `desenvolvimento` int(1) DEFAULT '0',
  `id_questionario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alerta`),
  KEY `FK_ttl_alertas_feedback_ttl_empresa` (`id_empresa`),
  KEY `FK_ttl_alertas_feedback_ttl_usuario` (`id_usuario`),
  KEY `FK_ttl_alertas_feedback_ttl_usuario_atualizador_idx` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_alertas_feedback_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_alertas_feedback_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_alertas_feedback_ttl_usuario_atualizador` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='Tabela de Controle de Alertas de Feedback';


-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: elofy_bd2
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `ttl_email_templates`
--

LOCK TABLES `ttl_email_templates` WRITE;
/*!40000 ALTER TABLE `ttl_email_templates` DISABLE KEYS */;
INSERT INTO `ttl_email_templates` VALUES (3,'Activity add','Nova Atividade ({ACTIVITY_NAME}) adicionada','activity_added','{USER_NAME},{LINK},{ACTIVITY_NAME}','<p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;\">Olá, {USER_NAME}</p>\n                                <p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align:center; margin:0 auto 30px;\">Nova atividade adicionada</p>\n    <p style=\"font-size:12px; font-family:arial; color:#333; text-align:center; margin:0 auto 25px;padding: 0 30px; line-height: 20px;\">Você foi designado como responsável por uma atividade. Clique no botão para acessá-la ou consulte periodicamente seu perfil</p>\n\n                                <a href=\"{LINK}\" style=\"background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;\" class=\"button-a\"><span style=\"color:#ffffff;\" class=\"button-link\">&nbsp;&nbsp;&nbsp;&nbsp;Clique para acessar&nbsp;&nbsp;&nbsp;&nbsp;</span></a>\n                                <br>','2014-09-02 00:00:00','2015-12-24 16:25:46'),(65,'Checkin add','Novo checkin de ({USER_NAME}) publicado','checkin_added','{USER_NAME},{QUESTIONS},{GOALS}','<p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;\">{USER_NAME} publicou novo checkin</p>{QUESTIONS}{GOALS}','2014-09-02 00:00:00','2015-12-24 16:25:46'),(66,'Feedback recebido','Novo Feedback de ({USER_NAME}) recebido','feedback_recebido','{USER_NAME},{LINK}','<p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;\">Olá, {USER_NAME}</p><p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align:center; margin:0 auto 30px;\">Novo feedback recebido</p><p style=\"font-size:12px; font-family:arial; color:#333; text-align:center; margin:0 auto 25px;padding: 0 30px; line-height: 20px;\">Você recebeu um feedback. Clique no botão para acessá-lo ou consulte periodicamente seu perfil</p><a href=\"{LINK}\" style=\"background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;\" class=\"button-a\"><span style=\"color:#ffffff;\" class=\"button-link\">&nbsp;&nbsp;&nbsp;&nbsp;Clique para acessar&nbsp;&nbsp;&nbsp;&nbsp;</span></a><br>','0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,'Feedback solicitado','Novo pedido de Feedback de ({USER_NAME})','feedback_solicitado','{USER_NAME},{LINK}','<p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;\">Olá, {USER_NAME}</p><p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align:center; margin:0 auto 30px;\">Novo feedback solicitado</p><p style=\"font-size:12px; font-family:arial; color:#333; text-align:center; margin:0 auto 25px;padding: 0 30px; line-height: 20px;\">Você recebeu uma solicitação de feedback. Clique no botão para acessá-lo ou consulte periodicamente seu perfil</p><a href=\"{LINK}\" style=\"background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;\" class=\"button-a\"><span style=\"color:#ffffff;\" class=\"button-link\">&nbsp;&nbsp;&nbsp;&nbsp;Clique para acessar&nbsp;&nbsp;&nbsp;&nbsp;</span></a><br>','2014-09-02 00:00:00','2014-09-02 00:00:00'),(68,'Crossfeed recebido','Novo Crossfeed de ({USER_NAME}) recebido','crossfeed_recebido','{USER_NAME},{QUESTIONS},{LINK}','<p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;\">{USER_NAME} respondeu seu Crossfeed</p>{QUESTIONS}<br><a href=\"{LINK}\" style=\"background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;\" class=\"button-a\"><span style=\"color:#ffffff;\" class=\"button-link\">&nbsp;&nbsp;&nbsp;&nbsp;Clique para acessar&nbsp;&nbsp;&nbsp;&nbsp;</span></a><br>','2014-09-02 00:00:00','2014-09-02 00:00:00'),(69,'Crossfeed solicitado','Novo pedido de Crossfeed de ({USER_NAME})','crossfeed_solicitado','{USER_NAME},{QUESTIONS},{LINK}','<p style=\"font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;\">{USER_NAME} solicitou um novo Crossfeed</p>{QUESTIONS}<br><a href=\"{LINK}\" style=\"background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;\" class=\"button-a\"><span style=\"color:#ffffff;\" class=\"button-link\">&nbsp;&nbsp;&nbsp;&nbsp;Clique para acessar&nbsp;&nbsp;&nbsp;&nbsp;</span></a><br>','2014-09-02 00:00:00','2014-09-02 00:00:00');
/*!40000 ALTER TABLE `ttl_email_templates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-17  4:24:41
