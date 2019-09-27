-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: elofyprod.chrl69p7e0bd.us-east-2.rds.amazonaws.com    Database: elofy_bd2
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.24-MariaDB

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('04ab0ada6c2b9406e9ca3640970256a7','60.191.40.194','0',1506555754,''),('057e56471562f5f02c660828a67a796a','189.6.233.118','Test Certificate Info',1507288552,''),('078825998bafb9409c957d9c2167316d','66.249.83.87','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507288637,''),('07b05fc460b6b49a08acf853be27f1ab','71.239.201.107','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1507420454,''),('09ac56256b65b2a36cb5b0072b68af25','184.105.247.194','0',1507544569,''),('0bfaa2a591311c363b41989cab64881b','189.6.233.118','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507373295,''),('0cc523dd436e05d24547e3d5684aaafd','163.172.64.133','python-requests/2.18.4',1506775031,''),('0e0b2b9e087f6990a56d250658d25989','89.38.98.44','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36 OPR/42.0.2',1507342111,''),('10a676014f80260388c673180ee27cc7','66.249.83.212','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507554801,''),('129c5d66eb78ed6fa92908f530375c22','139.162.78.135','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36',1506925877,''),('13de9e3c1a3b55cc7383f7ed3a8b292f','66.249.83.89','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507255839,''),('1496c5a8a4a8f8d902007b0c28198f5d','177.152.129.133','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507385497,''),('156decdeb52d4abd03ea378bb2156bc7','108.190.42.138','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.0.30729)',1507298410,''),('1bf0e1c38223f8e9884a4d2071a68380','138.246.253.19','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507224110,''),('1c5ad7ef3414794e1170379a119fc164','66.249.83.89','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507288637,''),('1d0aaa5102f435d554d419f0097b1d6d','189.6.233.118','Test Certificate Info',1507373387,''),('2018b7f39ff05046a1ebcdfecb00fe19','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122105,''),('207c0a27fd46a415efd81a530416eabe','189.6.233.118','Test Certificate Info',1506979865,''),('2162a7aaf8bcbe217362ea64efbf4e42','201.7.133.106','Test Certificate Info',1507314567,''),('21fd815917bc9914b90d6bfb8ac30f65','189.6.233.118','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507373318,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('2215265a594a897ac445b75914004242','216.218.206.69','0',1506593413,''),('2260bdbb620137406dfa6d8df34e8bf3','189.6.233.118','Test Certificate Info',1507373389,''),('233ca95ddc58f42efbbcfac2a2fefad2','177.58.166.24','Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_1 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15',1507374113,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('2787c490cd62d0c7e42e35c76619c19c','164.52.7.131','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0',1507385344,''),('28a07026a134e8ee27fd9db06925e84e','184.105.139.67','0',1507195007,''),('2d5bb3172cd16a50da97234c153ffce3','85.17.24.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507374282,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('33d37a66f943f794f8a657d06c42616b','189.6.233.118','Test Certificate Info',1507518374,''),('390d86136100eb7258f5e9ba418daae7','45.55.30.21','Mozilla/5.0 zgrab/0.x',1506515917,''),('3a3ad135347f7a043594aff318444ca3','71.6.202.198','Mozilla/5.0 zgrab/0.x',1507591784,''),('3a67bec0e902189b89b80ae109e037d7','66.249.83.8','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507592227,''),('3a80d5774f71d8ea33135a934f204531','66.249.88.30','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507669267,''),('3b50dadae031e4e12df9db79e403c8da','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122107,''),('3cb1009846fdfdc51a94f4713e4e5a42','104.236.5.92','Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)',1507676612,''),('3ed387b73b838524219ec916ace83d4e','184.105.139.69','0',1507638549,''),('431707230750278bd13b623712271bd0','45.55.7.197','Mozilla/5.0 zgrab/0.x',1506741180,''),('4928248f79a0f81fe7c8dec976ddea2a','138.246.253.19','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1506630712,''),('4c6cce5fe8fa72505495975eaa011a4f','66.249.83.88','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507226424,''),('4c87ad1b80dbc146f626900322cc482f','66.249.83.12','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507721975,''),('4caa259ac891fe3090ac9b0ed0f269d4','189.6.233.118','Test Certificate Info',1507373506,''),('4ff993ae97d6bc1907aae51444afd5d6','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122107,''),('552c6551af67231fcfdbcaadf340bcb5','108.190.42.138','Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko',1507558029,''),('555e15bee4b97a27ba917876f5023a06','71.6.202.198','Mozilla/5.0 zgrab/0.x',1507108382,''),('59c2e9c260d21c7f88572b9151209bac','66.249.83.214','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507554801,''),('5b0a9dd72f4d826896e1aefb716ab664','139.162.116.133','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1507144343,''),('5f26cdd2e8099ddd10db14874f0a8c60','66.249.88.30','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507669267,''),('608ce652e22f10ba6492e0a51926580f','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122106,''),('60b020274bcc1dfd71ac9f0dd1f627fc','71.6.202.198','Mozilla/5.0 zgrab/0.x',1506594653,''),('63040b0f2c8b896b5513f1db440638da','189.6.233.118','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507373659,''),('6332808617ccf56462eaa075d8ffec25','46.17.46.213','curl/7.29.0',1507688485,''),('64ec934b210e7fddce01afb9b22bd83a','189.6.233.118','Test Certificate Info',1506458590,''),('6a689a90a8f8bddbb48b2b122965a4a8','164.52.7.131','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0',1506920961,''),('6dd379708ee8023bb257912ef7bba58d','85.17.24.66','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507374233,''),('6f59cd4a2fff109a5141a4d143185080','201.7.133.106','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507230683,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('70987a491f23186ab8733592a64d3291','201.7.133.106','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507739628,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"92\";s:5:\"login\";s:17:\"team@elofy.com.br\";s:13:\"email_usuario\";s:17:\"team@elofy.com.br\";s:4:\"nome\";s:15:\"Eduardo Kafruni\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";s:0:\"\";s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('75ba4c4844eb2558860ea35a97f677e4','66.249.83.88','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507226424,''),('77a1ae0821a9619af027f1ad1d61bd97','143.54.235.168','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507259771,''),('7bacecbd5223268e92c5cb0cd067d133','179.241.197.57','Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_1 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15',1507682391,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('7c0d21e6a1d073c27646de921e2578a5','66.249.83.214','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507554801,''),('7d90a82b4abcdfec3b3fb1782278d08b','71.6.202.198','Mozilla/5.0 zgrab/0.x',1507645635,''),('7ff6b52f805f698c15a7c8b91f982a97','67.229.34.210','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36',1507410484,''),('82592755ff5801252058b3a5d392b3c4','71.6.202.198','Mozilla/5.0 zgrab/0.x',1506943427,''),('83e364cec0903f315c747a26637b6bfa','189.6.233.118','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36',1506458590,''),('86c035fccb1eaf1c62aef2d54b61ccc6','66.249.83.215','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507357779,''),('86d0dc233f0c4f172a21de1f2839e03c','184.105.247.196','0',1506850244,''),('87b7b2ddaac38de0ba67fc6b505127b2','46.17.46.213','curl/7.29.0',1507688485,''),('883e1da5dd889ba2fd61ded363bf4d23','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122107,''),('890eeb3966c9fddd8f3f9c602e9f642c','159.203.244.224','Mozilla/5.0 zgrab/0.x',1507544399,''),('8bd8d2eb13ffecfde71c74b72f1cd5f7','71.6.202.198','Mozilla/5.0 zgrab/0.x',1506759894,''),('8dd367714adc89ea2fbd70a882757cfe','189.6.233.118','Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_1 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15',1507372912,''),('8e4ec787c236ef17e90adeb42cbf179d','46.17.46.213','libwww-perl/6.05',1507404276,''),('8fd2a3c2ee7bb634130666377a8e686e','177.58.166.24','Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_1 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15',1507374163,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('939f0de360f6096c4e1d7d76fdf78aec','71.239.201.107','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR',1507398441,''),('94fbd3981278130c59ce16e38f2761f3','66.249.83.89','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507226424,''),('96aebb41c68859b1de9ee6be17cba579','164.132.91.13','(KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',1506681984,''),('96e17af2104353800a2e957ef37413f4','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506895250,''),('97c008f2389ce21863fbd65327f4192f','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122107,''),('9d5a71c7d579e41b56702b599cfc585c','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506880273,''),('9e19aa7e3dfe336c2120b28c077ca702','201.7.133.106','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507373411,'a:14:{s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('9fa6f598489e5b103cc5c2325da4baf2','216.218.206.69','0',1507116823,''),('9fc3550228c3ff2bf1da4196f4dab842','66.249.88.28','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507669267,''),('a5c81105eab5318ab16ae42a1b942c9a','106.75.85.103','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1',1507692136,''),('a67ca04ae0cf7c9379b4a7e8285a7510','164.132.91.13','Iceweasel/15.0',1507287279,''),('aa3e9264539678283d9121e8049287ff','67.229.34.210','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36',1507037414,''),('ab0119a8fe5811e70a2706d831a7c0a3','184.105.139.69','0',1507457956,''),('abf6de2a98c006c154b44ef019c4b640','159.203.240.72','Mozilla/5.0 zgrab/0.x',1506767426,''),('b0db67135f0d7bca875b5c6ae5274684','200.155.189.114','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507312175,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"94\";s:5:\"login\";s:30:\"vinicius.scagliuse@linx.com.br\";s:13:\"email_usuario\";s:30:\"vinicius.scagliuse@linx.com.br\";s:4:\"nome\";s:19:\"Vinícius Scagliuse\";s:10:\"id_empresa\";s:2:\"62\";s:12:\"nome_empresa\";s:4:\"Linx\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('b12d2020ba33cd4ec0b3af716d50061a','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506891600,''),('b373b903583bb99f7327811e4a3564c8','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506890854,''),('b44d5b409e455b2a028e61f769755c32','184.105.139.70','0',1507369002,''),('b7787ab8dfbd3a5143c0558223136a8f','139.162.106.181','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1507264165,''),('b79846e6b7e97cc27bc3bc74df91dbf5','71.6.202.198','Mozilla/5.0 zgrab/0.x',1507296517,''),('b7a8be2836d8f60ccaac0d56ca0e1123','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506887919,''),('b8579a3845cf9a53dab691e9d8d904f6','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122106,''),('b89c68f94f8f32fb5e506e237f570bb3','125.64.94.200','0',1507193450,''),('bbb6c311d9af29a7b198748d72fb749e','67.21.36.2','Mozilla/5.0 zgrab/0.x',1507045163,''),('bf1fe1d934963d283ec15c327bb00b82','46.17.46.213','curl/7.29.0',1507688485,''),('bfe499802ec237a732a1d6df2502cf2e','66.249.83.12','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507721975,''),('c1446b4367aa0499abb8ea64e8f9ff64','66.249.83.10','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507638201,''),('c2b427d01de10c77e23c93d0de0c7d8e','66.249.83.87','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507288637,''),('c47a54b2d21f3ffe7c5038ece1590c02','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122107,''),('c5ee9971e09bb705185e3c348596bc00','201.7.133.106','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507302800,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('c7c326b8f2d8252d1e050fdfb2de5c15','139.162.116.133','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1506515225,''),('c81d703e2dc714e19a914bf722a4008d','189.6.233.118','Mozilla/5.0 (iPhone; CPU iPhone OS 11_0_1 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15',1507373853,''),('c89397787343447229c31dc5f8bddbb6','54.186.228.208','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.3',1507603019,''),('ca03e949e9a5ff1b5a57d76614cf1a5d','74.82.47.3','0',1506763906,''),('ca4c3cf65dd3b8cd6e3cfcafd268a2fa','184.105.247.195','0',1506940679,''),('ceba5ef69ae824f2f7320d22f75ca3c7','216.218.206.69','0',1506679691,''),('cf5e8bf9bbe11b605a100bb27ec8626a','139.162.106.181','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1507422639,''),('d1702bf46846022a1ccc1c010bea6b36','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506884172,''),('d218d3be840a098a4f70a2df9f45a3b5','150.129.60.111','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507373549,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('d567ecc2c78dcc509d6d79bcc5a25ea3','189.6.233.118','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1506979864,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('d664c64bb98a6c40806dde68789dd510','139.162.106.181','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1507626161,''),('d7b908407afd52c66a3b0ebe3dbdc91f','173.255.224.234','0',1507735106,''),('da0cc06a195b920503559b2b71646956','139.162.116.133','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1506933735,''),('ddf81650ccf1606f262167a30871efb3','184.105.139.70','0',1507290097,''),('de0445fee09ef61240e9488983d417e9','177.152.129.133','Test Certificate Info',1507385449,''),('df317492b2a7f13e8929896f67a93607','139.162.78.135','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36',1506669318,''),('e017b7e0fd8e7a7765182f115af180c3','67.229.34.210','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36',1507624510,''),('e13302b9c9f2e6cee1b7dec5388ea9da','71.6.202.198','Mozilla/5.0 zgrab/0.x',1507210720,''),('e20cc4d5a69eb6352f2556d61ac653ac','201.7.133.106','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507727061,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"91\";s:5:\"login\";s:19:\"daniel@elofy.com.br\";s:13:\"email_usuario\";s:19:\"daniel@elofy.com.br\";s:4:\"nome\";s:26:\"Daniel Kafruni de Oliveira\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";N;s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('e3380fb828db54f5e4d9f388f0eeb129','60.191.38.77','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0',1506574172,''),('e6ac4e3769eb5a765af18bd55bd13805','106.75.106.221','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1',1507692178,''),('e7cdb682acaccaf9b4835ebf150b3724','123.59.78.122','0',1507692133,''),('e9b2407c56ca5a6cd4bc2d24041e57c1','66.249.83.12','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507721975,''),('eccc91b8f9557b9c44a7aae82c1302a9','72.177.135.60','Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',1506892942,''),('ee9352658507cafe82a47d63e1fdb593','74.82.47.4','0',1506508047,''),('f07f4c7796fdb92bf7593784687505a2','201.7.133.106','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',1507293620,'a:15:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:2:\"92\";s:5:\"login\";s:17:\"team@elofy.com.br\";s:13:\"email_usuario\";s:17:\"team@elofy.com.br\";s:4:\"nome\";s:15:\"Eduardo Kafruni\";s:10:\"id_empresa\";s:2:\"61\";s:12:\"nome_empresa\";s:5:\"Elofy\";s:12:\"logo_empresa\";N;s:7:\"id_time\";N;s:5:\"admin\";s:1:\"1\";s:9:\"avaliador\";s:1:\"1\";s:5:\"ativo\";s:1:\"1\";s:5:\"image\";s:0:\"\";s:16:\"data_aniversario\";N;s:9:\"logged_in\";b:1;}'),('f77b4d4f3fd0cb2cf412468bb317f7ac','138.246.253.15','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36',1507122106,''),('f786b5024d35fecb313b67ac22ba6bc6','184.105.139.69','0',1507722355,''),('f7bdf1ee670795ecc338aa1b50e6561b','139.162.78.135','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36',1507304524,''),('fd10203ba6491f4dd3954759d77588b0','61.160.236.101','Mozilla/4.0 (compatible; MSIE 9.0; Windows NT 6.1)',1507355452,''),('fd120323ad6ec5c755bbea84e11ead01','139.162.106.181','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',1506743326,''),('fe40c8deee509caac2d7a54a0d71ed4e','66.249.83.8','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon',1507726310,''),('ff7fdb0230644a1478fdda32cba0dac7','164.52.7.131','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0',1506460015,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_alertas_agendados`
--

DROP TABLE IF EXISTS `ttl_alertas_agendados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_alertas_agendados` (
  `id_alertas_agendados` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL DEFAULT '0' COMMENT '0 usuários sem objetivos, 1 empresa',
  `alerta` varchar(150) NOT NULL DEFAULT '0',
  `qtd_dias` int(11) NOT NULL DEFAULT '0',
  `posicao` int(11) NOT NULL DEFAULT '0' COMMENT '0 antes do início proximo ciclo, 1 após início ciclo atual,2 antes do fim ciclo atual ',
  `ativo` int(11) NOT NULL DEFAULT '0' COMMENT '0 nao 1 sim',
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alertas_agendados`),
  KEY `Index 1` (`id_alertas_agendados`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de Controle de Alertas Agendados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_alertas_agendados`
--

LOCK TABLES `ttl_alertas_agendados` WRITE;
/*!40000 ALTER TABLE `ttl_alertas_agendados` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_alertas_agendados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_alertas_usuario`
--

DROP TABLE IF EXISTS `ttl_alertas_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_alertas_usuario` (
  `id_alerta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `tipo_entidade` int(1) DEFAULT NULL COMMENT '-0-objetivo -1 Resultado Chave - 2 - Tarefa',
  `id_entidade` int(11) DEFAULT NULL,
  `nome_entidade` varchar(250) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `progresso` double DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL COMMENT '0 nao 1 sim',
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_alerta`),
  KEY `FK_ttl_alertas_usuario_ttl_empresa` (`id_empresa`),
  KEY `FK_ttl_alertas_usuario_ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_alertas_usuario_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_alertas_usuario_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabela de Controle de Alertas de Usuário';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_alertas_usuario`
--

LOCK TABLES `ttl_alertas_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_alertas_usuario` DISABLE KEYS */;
INSERT INTO `ttl_alertas_usuario` VALUES (1,92,61,NULL,NULL,NULL,'Eduardo você foi adicionado a um novo grupo',NULL,NULL,'2017-10-09 18:24:32');
/*!40000 ALTER TABLE `ttl_alertas_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_atividades`
--

DROP TABLE IF EXISTS `ttl_atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_atividades` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL DEFAULT '0',
  `id_resultado_chave` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Coluna que favorece subtarefas.',
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(400) DEFAULT NULL,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  `hora` int(11) DEFAULT NULL,
  `id_tipo_atividade` int(11) DEFAULT NULL,
  `data_fim_real` date DEFAULT NULL,
  `situacao` varchar(1) NOT NULL DEFAULT '0',
  `progresso` double DEFAULT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_atividade`,`id_empresa`),
  KEY `FK__ttl_resultados_chave` (`id_resultado_chave`),
  KEY `FK_ttl_atividades_ttl_usuario` (`responsavel`),
  KEY `FK_ttl_atividades_ttl_usuario_2` (`usuario_atualizador`),
  KEY `FK_ttl_atividades_ttl_empresa` (`id_empresa`),
  KEY `ttl_atividades_ttl_tipo_atividades` (`id_tipo_atividade`),
  CONSTRAINT `FK__ttl_resultados_chave` FOREIGN KEY (`id_resultado_chave`) REFERENCES `ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `FK_ttl_atividades_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_atividades_ttl_usuario` FOREIGN KEY (`responsavel`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_atividades_ttl_usuario_2` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COMMENT='Tabela base para o controle do cadastro de atividades. Atividades podem ter filhas por isso a coluna parent_id.  No caso de filhas a atividade pai herda o menor inicio previsto e o maior fim previsto. Quando todas as filhas atingirem 100 % de progresso a pai também atinge, por outro lado se a pai evoluir para 100% de progresso as fihas automaticamente também evoluem. A tabela possui também a informação de situação cujo domínio está comentado na coluna e a informação do valor é somente para usuários gestores ou administradores.\r\n\r\nSistema permite o cadastramento de atividades não vinculadas a resultados chave.  Ou seja é permitido o campo resultado chave = null,  as atividades sem vínculo devem ser agrupadas como dia a dia e , nesse caso, a informação de início e fim previsto é obrigatória.\r\n\r\n\r\n\r\n\r\nA data de início de uma atividade é normalmente sugerida como sendo o início do quarter.\r\n\r\nA coluna ativo é controle de exclusão lógica.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_atividades`
--

LOCK TABLES `ttl_atividades` WRITE;
/*!40000 ALTER TABLE `ttl_atividades` DISABLE KEYS */;
INSERT INTO `ttl_atividades` VALUES (70,61,47,196,'Avaliar modelo de manuais de softwares concorrentes','Avaliar modelo de  manuais de softwares concorrentes','2017-10-05','2017-10-13',8,NULL,NULL,'0',30,92,'2017-10-09 12:28:23',92,1),(71,61,47,196,'Definir o padrão de manual','Definir o modelo padrão de manual','2017-10-09','2017-10-13',32,NULL,NULL,'0',40,92,'2017-10-06 18:32:32',92,1),(72,61,47,196,'Produzir Manuais','Desenvolver manuais para todas as funcionalidades','2017-10-13','2017-10-30',60,NULL,NULL,'0',15,92,'2017-10-09 12:28:43',92,1),(73,61,56,199,'Criar documento sobre procedures, funções, triggers e eventos','Identificar porque existem, qual a aplicação.','2017-10-05','2017-10-31',20,NULL,NULL,'0',0,93,'2017-10-05 19:15:26',91,1),(74,61,45,194,'task 1','task 2','2017-10-06','2017-10-09',8,NULL,NULL,'0',0,93,'2017-10-06 13:17:19',91,1);
/*!40000 ALTER TABLE `ttl_atividades` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tai_ttl_atividades AFTER INSERT ON ttl_atividades
 FOR EACH ROW BEGIN

    DECLARE vTimestamp            DATETIME;
    DECLARE vTipo_calculo         INTEGER;
    DECLARE vProgresso            DOUBLE;
    DECLARE vQtd_ativ             INTEGER;
	    
    SET vTimestamp = SYSDATE();

    SET vQtd_ativ = 1;

    IF NEW.ativo = 1 THEN

       select sum(ifnull(progresso,0)), count(*) INTO vProgresso, vQtd_ativ
          FROM ttl_atividades
            WHERE id_resultado_chave = NEW.id_resultado_chave
             AND ativo = 1;

       UPDATE ttl_resultados_chave SET progresso = round(vProgresso/vQtd_ativ),
                                       tipo_calculo = 1
            WHERE id_resultado_chave = NEW.id_resultado_chave;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tau_ttl_atividades AFTER UPDATE ON ttl_atividades
   FOR EACH ROW BEGIN

    DECLARE vTimestamp            DATETIME;
    DECLARE vTipo_calculo         INTEGER;
    DECLARE vProgresso            DOUBLE;
    DECLARE vQtd_ativ             INTEGER;
	    
    SET vTimestamp = SYSDATE();

    SET vQtd_ativ = 1;

    IF ( NEW.ativo     != OLD.ativo OR 
         IFNULL(NEW.progresso,0.00) != IFNULL(OLD.progresso,0.00) 
       ) THEN

       select sum(ifnull(progresso,0)), count(*) INTO vProgresso, vQtd_ativ
          FROM ttl_atividades
            WHERE id_resultado_chave = NEW.id_resultado_chave
             AND ativo = 1;

       UPDATE ttl_resultados_chave SET progresso = round(vProgresso/vQtd_ativ)
            WHERE id_resultado_chave = NEW.id_resultado_chave;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_atividades_anexos`
--

DROP TABLE IF EXISTS `ttl_atividades_anexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_atividades_anexos` (
  `id_anexo` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividade` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `anexo` varchar(500) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `ativo` int(1) NOT NULL,
  PRIMARY KEY (`id_anexo`),
  KEY `FK_ttl_atividades_anexos_ttl_atividades` (`id_atividade`),
  KEY `FK_ttl_atividades_anexos_ttl_usuario` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_atividades_anexos_ttl_atividades` FOREIGN KEY (`id_atividade`) REFERENCES `ttl_atividades` (`id_atividade`),
  CONSTRAINT `FK_ttl_atividades_anexos_ttl_usuario` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela criada para controlar ponteiro de anexos vinculados a cada atividade. ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_atividades_anexos`
--

LOCK TABLES `ttl_atividades_anexos` WRITE;
/*!40000 ALTER TABLE `ttl_atividades_anexos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_atividades_anexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_atv_reponsaveis`
--

DROP TABLE IF EXISTS `ttl_atv_reponsaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_atv_reponsaveis` (
  `id_responsavel` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividade` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_time` int(11) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_responsavel`),
  KEY `FK__ttl_atividades_atv` (`id_atividade`),
  KEY `FK__ttl_usuario_atv` (`id_usuario`),
  KEY `FK_ttl_atv_reponsaveis_ttl_times` (`id_time`),
  CONSTRAINT `FK__ttl_atividades_atv` FOREIGN KEY (`id_atividade`) REFERENCES `ttl_atividades` (`id_atividade`),
  CONSTRAINT `FK__ttl_usuario_atv` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_atv_reponsaveis_ttl_times` FOREIGN KEY (`id_time`) REFERENCES `ttl_empresa_times` (`id_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Embora as informações de time e de responsável esteja na tabela de atividade.  Esta tabela tem o proposito de salvar coresponsaveis ou  "co times"';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_atv_reponsaveis`
--

LOCK TABLES `ttl_atv_reponsaveis` WRITE;
/*!40000 ALTER TABLE `ttl_atv_reponsaveis` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_atv_reponsaveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_avaliacao_usuario`
--

DROP TABLE IF EXISTS `ttl_avaliacao_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_avaliacao_usuario` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciclo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_time` int(11) DEFAULT NULL,
  `id_janela` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `nome_time` varchar(255) DEFAULT NULL,
  `nome_ciclo` varchar(255) NOT NULL,
  `ano_ciclo` int(4) NOT NULL,
  `numero_objetivos` int(11) DEFAULT NULL,
  `numero_rchave` int(11) DEFAULT NULL,
  `perc_atingido_objetivos` double DEFAULT NULL,
  `perc_atingido_rchave` double DEFAULT NULL,
  `comentario` varchar(4000) DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL COMMENT '1 -Atingiu/2 -Parcialmente/ 0 Nao Atingiu',
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) DEFAULT NULL,
  `ativo` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `FK_ttl_avaliacao_ttl_ciclos` (`id_ciclo`),
  KEY `FK_ttl_avaliacao_ttl_usuario` (`id_usuario`),
  KEY `FK_ttl_avaliacao_ttl_usuario_2` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_avaliacao_ttl_ciclos` FOREIGN KEY (`id_ciclo`) REFERENCES `ttl_ciclos` (`id_ciclo`),
  CONSTRAINT `FK_ttl_avaliacao_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_avaliacao_ttl_usuario_2` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=572 DEFAULT CHARSET=utf8 COMMENT='O sistema preve um processo de avaliação das atividades ao término de cada ciclo por isso há a tabela de avaliação.  Alem disso a interface irá apresentar resultados sumarizados a partir das informaões de  situação, informados em conjunto  com processo de avaliação';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_avaliacao_usuario`
--

LOCK TABLES `ttl_avaliacao_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_avaliacao_usuario` DISABLE KEYS */;
INSERT INTO `ttl_avaliacao_usuario` VALUES (569,285,91,NULL,76,'Daniel Kafruni de Oliveira',NULL,'4º trimestre',2017,14,13,0,0,NULL,NULL,'2017-10-06 00:10:00',NULL,1),(570,285,92,NULL,76,'Eduardo Kafruni',NULL,'4º trimestre',2017,7,4,0,0,NULL,NULL,'2017-10-06 00:10:00',NULL,1),(571,285,93,NULL,76,'Eduardo Stein',NULL,'4º trimestre',2017,1,0,0,0,NULL,NULL,'2017-10-06 00:10:00',NULL,1);
/*!40000 ALTER TABLE `ttl_avaliacao_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_canais`
--

DROP TABLE IF EXISTS `ttl_canais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_canais` (
  `id_canal` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  `responsavel` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT '1' COMMENT '0 - global 1- independente',
  `imagem` varchar(500) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `ativo` int(1) NOT NULL COMMENT '1 ou 0',
  PRIMARY KEY (`id_canal`),
  KEY `FK_ttl_canais_ttl_empresa` (`id_empresa`),
  KEY `FK_ttl_canais_ttl_objetivos` (`id_objetivo`),
  CONSTRAINT `FK_ttl_canais_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_canais`
--

LOCK TABLES `ttl_canais` WRITE;
/*!40000 ALTER TABLE `ttl_canais` DISABLE KEYS */;
INSERT INTO `ttl_canais` VALUES (41,61,187,91,'Ter aplicativos para IOS e ANDROID','0',NULL,'Desenvolver ações para que tenhamos concluídas e disponíveis funcionalidades para smartphones.','#f8ba31','2017-10-05 17:08:39',91,1),(42,61,188,91,'Ter documentação técnica do produto','0',NULL,'Corresponde a necessidade de desenvolvermos ate o final do ano documentação do elofy, abrangendo vendas, manuais, blogs e outras iniciativas.','#5ec097','2017-10-05 17:10:35',91,1),(43,61,189,91,'Posicionar o produto em mídias sociais','0',NULL,'Elaborar atividades e objetivos que convergem para o posicionamento do produtos em plataformas sociais','','2017-10-05 17:12:20',91,1),(44,61,190,91,'Estruturar e gerenciar base de clientes','0',NULL,'Planejar ações para estruturar e gerenciar a base de clientes','#3fb9ea','2017-10-05 17:13:59',91,1),(45,61,191,91,'Organizar roadmap de novas funcionalidades','0',NULL,'Estruturar plano de ações que nos leve a conseguir organizar o roadmap do produto.','#f8ba31','2017-10-05 17:16:34',91,1),(46,61,192,91,'Produzir Artefatos de Marketing','0',NULL,'Porduzir artefatos de marketing para divulgação Elofy','#5ec097','2017-10-05 17:17:53',91,1),(47,61,193,91,'Estruturar equipe interna de desenvolvimento','0',NULL,'Elaborar conjunto de ações para se trabalhar autonomia com relação aos desenvolvedores externos.','#e98824','2017-10-05 17:19:54',91,1);
/*!40000 ALTER TABLE `ttl_canais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_canal_mensagem`
--

DROP TABLE IF EXISTS `ttl_canal_mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_canal_mensagem` (
  `id_canal_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_canal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `file` varchar(1000) NOT NULL,
  `mime` varchar(100) NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_canal_mensagem`),
  KEY `FK_ttl_canal_mensagem_ttl_canais` (`id_canal`),
  KEY `FK_ttl_canal_mensagem_ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_canal_mensagem_ttl_canais` FOREIGN KEY (`id_canal`) REFERENCES `ttl_canais` (`id_canal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ttl_canal_mensagem_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_canal_mensagem`
--

LOCK TABLES `ttl_canal_mensagem` WRITE;
/*!40000 ALTER TABLE `ttl_canal_mensagem` DISABLE KEYS */;
INSERT INTO `ttl_canal_mensagem` VALUES (1,45,91,'Ve se te puxa no desenho dessas telas.','','0','2017-10-09 17:36:50','2017-10-09 17:36:50'),(2,45,92,'Pode deixar vo dexar elas no capricho\n','','0','2017-10-09 17:38:11','2017-10-09 17:38:11');
/*!40000 ALTER TABLE `ttl_canal_mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_canal_mensagem_citacao`
--

DROP TABLE IF EXISTS `ttl_canal_mensagem_citacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_canal_mensagem_citacao` (
  `id_canal_mensagem_citacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_canal_mensagem` int(11) NOT NULL,
  `id_canal` int(11) NOT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `id_usuario_referencia` int(11) NOT NULL,
  `vizualizado` int(1) NOT NULL COMMENT '1 ou 0',
  `data_citacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_canal_mensagem_citacao`),
  KEY `FK_ttl_canal_mensagem_citacao_ttl_canal_mensagem` (`id_canal_mensagem`),
  KEY `FK_ttl_canal_mensagem_citacao_ttl_canais` (`id_canal`),
  CONSTRAINT `FK_ttl_canal_mensagem_citacao_ttl_canais` FOREIGN KEY (`id_canal`) REFERENCES `ttl_canais` (`id_canal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ttl_canal_mensagem_citacao_ttl_canal_mensagem` FOREIGN KEY (`id_canal_mensagem`) REFERENCES `ttl_canal_mensagem` (`id_canal_mensagem`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_canal_mensagem_citacao`
--

LOCK TABLES `ttl_canal_mensagem_citacao` WRITE;
/*!40000 ALTER TABLE `ttl_canal_mensagem_citacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_canal_mensagem_citacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_canal_usuario`
--

DROP TABLE IF EXISTS `ttl_canal_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_canal_usuario` (
  `id_canal_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_canal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_ultima_mensagem` datetime DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `ativo` int(1) NOT NULL COMMENT '1 ou 0',
  PRIMARY KEY (`id_canal_usuario`),
  KEY `FK_ttl_canal_usuario_ttl_canais` (`id_canal`),
  KEY `FK_ttl_canal_usuario_ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_canal_usuario_ttl_canais` FOREIGN KEY (`id_canal`) REFERENCES `ttl_canais` (`id_canal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ttl_canal_usuario_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_canal_usuario`
--

LOCK TABLES `ttl_canal_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_canal_usuario` DISABLE KEYS */;
INSERT INTO `ttl_canal_usuario` VALUES (56,41,91,NULL,'2017-10-05 17:08:39',91,1),(57,42,91,NULL,'2017-10-05 17:10:35',91,1),(58,43,91,NULL,'2017-10-05 17:12:20',91,1),(59,44,91,NULL,'2017-10-05 17:13:59',91,1),(60,45,91,NULL,'2017-10-05 17:16:34',91,1),(61,46,91,NULL,'2017-10-05 17:17:53',91,1),(62,47,91,NULL,'2017-10-05 17:19:54',91,1),(63,45,92,NULL,'2017-10-09 17:37:22',91,1);
/*!40000 ALTER TABLE `ttl_canal_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_cargo_competencias`
--

DROP TABLE IF EXISTS `ttl_cargo_competencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_cargo_competencias` (
  `id_usuario_competencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_competencia` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_competencia`),
  KEY `FK_ttl_cargo_competencias_ttl_usuario` (`id_usuario`),
  KEY `FK_ttl_cargo_competencias_ttl_empresa_competencias` (`id_competencia`),
  CONSTRAINT `FK_ttl_cargo_competencias_ttl_empresa_competencias` FOREIGN KEY (`id_competencia`) REFERENCES `ttl_empresa_competencias` (`id_competencia`),
  CONSTRAINT `FK_ttl_cargo_competencias_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de vinculação entre cargos em competências';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_cargo_competencias`
--

LOCK TABLES `ttl_cargo_competencias` WRITE;
/*!40000 ALTER TABLE `ttl_cargo_competencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_cargo_competencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_ciclos`
--

DROP TABLE IF EXISTS `ttl_ciclos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_ciclos` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `id_janela` int(11) NOT NULL,
  `nome_ciclo` varchar(50) NOT NULL,
  `inicio_vigencia` date DEFAULT NULL,
  `fim_vigencia` date DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`id_ciclo`),
  KEY `Index 2` (`id_janela`),
  CONSTRAINT `FK_ttl_ciclos_ttl_janela` FOREIGN KEY (`id_janela`) REFERENCES `ttl_janela` (`id_janela`)
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8 COMMENT='A janela é  o período de tempo para o qual serão considerados os ciclos de planejamento a princípio as janelas serão todas de 1 ano mas no longo prazo deve ser possível definir o periódo da janela e dos ciclos. Ao desenvolvedor cabe avaliar se é possível já em uma primeira versão trazer o setup dessas informações já para uma primeira versão.\r\n\r\n\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_ciclos`
--

LOCK TABLES `ttl_ciclos` WRITE;
/*!40000 ALTER TABLE `ttl_ciclos` DISABLE KEYS */;
INSERT INTO `ttl_ciclos` VALUES (282,76,'1º trimestre','2017-01-01','2017-03-31','2017-10-02 21:56:39',1),(283,76,'2º trimestre','2017-04-01','2017-06-30','2017-10-02 21:56:39',1),(284,76,'3º trimestre','2017-07-01','2017-09-30','2017-10-02 21:56:39',1),(285,76,'4º trimestre','2017-10-01','2017-12-31','2017-10-02 21:56:39',1),(286,77,'1º trimestre','2018-01-01','2018-03-31','2017-10-02 21:56:39',1),(287,77,'2º trimestre','2018-04-01','2018-06-30','2017-10-02 21:56:39',1),(288,77,'3º trimestre','2018-07-01','2018-09-30','2017-10-02 21:56:39',1),(289,77,'4º trimestre','2018-10-01','2018-12-31','2017-10-02 21:56:39',1),(290,78,'1º trimestre','2019-01-01','2019-03-31','2017-10-02 21:56:39',1),(291,78,'2º trimestre','2019-04-01','2019-06-30','2017-10-02 21:56:39',1),(292,78,'3º trimestre','2019-07-01','2019-09-30','2017-10-02 21:56:39',1),(293,78,'4º trimestre','2019-10-01','2019-12-31','2017-10-02 21:56:39',1),(294,79,'1º trimestre','2017-01-01','2017-03-31','2017-10-06 17:50:27',1),(295,79,'2º trimestre','2017-04-01','2017-06-30','2017-10-06 17:50:27',1),(296,79,'3º trimestre','2017-07-01','2017-09-30','2017-10-06 17:50:27',1),(297,79,'4º trimestre','2017-10-01','2017-12-31','2017-10-06 17:50:27',1),(298,80,'1º trimestre','2018-01-01','2018-03-31','2017-10-06 17:50:27',1),(299,80,'2º trimestre','2018-04-01','2018-06-30','2017-10-06 17:50:27',1),(300,80,'3º trimestre','2018-07-01','2018-09-30','2017-10-06 17:50:27',1),(301,80,'4º trimestre','2018-10-01','2018-12-31','2017-10-06 17:50:27',1),(302,81,'1º trimestre','2019-01-01','2019-03-31','2017-10-06 17:50:27',1),(303,81,'2º trimestre','2019-04-01','2019-06-30','2017-10-06 17:50:27',1),(304,81,'3º trimestre','2019-07-01','2019-09-30','2017-10-06 17:50:27',1),(305,81,'4º trimestre','2019-10-01','2019-12-31','2017-10-06 17:50:27',1);
/*!40000 ALTER TABLE `ttl_ciclos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_empresa`
--

DROP TABLE IF EXISTS `ttl_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(250) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `email_usuario` varchar(250) NOT NULL,
  `logo_empresa` varchar(255) DEFAULT NULL,
  `planejamento` char(1) NOT NULL DEFAULT 'T' COMMENT 'M,T,B,S',
  `prazo_dias_okr` int(11) DEFAULT '15',
  `missao` varbinary(750) DEFAULT NULL,
  `visao` varchar(750) DEFAULT NULL,
  `proposito` varchar(750) DEFAULT NULL,
  `numero_colaboradores` int(11) DEFAULT NULL,
  `numero_licencas` int(11) DEFAULT NULL,
  `idioma` int(11) NOT NULL DEFAULT '1' COMMENT '1- português / 2-inglês / 3 - espanhol',
  `data_vencimento` date DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `vigente` varchar(1) DEFAULT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` varchar(50) NOT NULL DEFAULT '''1''',
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='Cadastro de Empresas. Como sistema multiempresa tudo começa com o cadastro da empresa criado no momento do cadastro do usuário no sistema, é totalmente possível que hajm duas empresas com o mesmo nome.  Deve ser possível completar o cadastro com as informações de logotipo, missão e visão que serão úteis no momento de realizar o planejamento. \r\nSempre que um empresa estiver como vigente igual a n, nenhum usuário desta empresa pode estar logada. \r\nA informação de ativo é  para controle de exclusão lógica.\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_empresa`
--

LOCK TABLES `ttl_empresa` WRITE;
/*!40000 ALTER TABLE `ttl_empresa` DISABLE KEYS */;
INSERT INTO `ttl_empresa` VALUES (61,'Elofy','Daniel Kafruni de Oliveira','daniel@elofy.com.br',NULL,'T',15,NULL,NULL,NULL,NULL,NULL,1,NULL,'2017-10-02',NULL,'2017-10-02 21:56:38','1'),(62,'Linx','Vinícius Scagliuse','vinicius.scagliuse@linx.com.br',NULL,'T',15,NULL,NULL,NULL,NULL,NULL,1,NULL,'2017-10-06',NULL,'2017-10-06 17:50:27','1');
/*!40000 ALTER TABLE `ttl_empresa` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER `tai_ttl_empresa` AFTER INSERT ON `ttl_empresa` FOR EACH ROW BEGIN

      CALL sp_gera_estrutura_empresa( NEW.id_empresa, NEW.nome_empresa, NEW.planejamento, NEW.nome_usuario, NEW.email_usuario );

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_empresa_cargos`
--

DROP TABLE IF EXISTS `ttl_empresa_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_empresa_cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nome_cargo` varchar(150) NOT NULL,
  `descricao_cargo` varchar(450) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  KEY `FK__ttl_empresacargo2` (`id_empresa`),
  KEY `FK__ttl_usuariocargo2` (`usuario_atualizador`),
  CONSTRAINT `FK__ttl_empresacargo2` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK__ttl_usuariocargo2` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela com o cadastro de todos os cargos.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_empresa_cargos`
--

LOCK TABLES `ttl_empresa_cargos` WRITE;
/*!40000 ALTER TABLE `ttl_empresa_cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_empresa_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_empresa_competencias`
--

DROP TABLE IF EXISTS `ttl_empresa_competencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_empresa_competencias` (
  `id_competencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nome_competencia` varchar(150) NOT NULL,
  `descricao` varchar(450) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  PRIMARY KEY (`id_competencia`),
  KEY `FK_ttl_empresa_competencias_ttl_empresa` (`id_empresa`),
  KEY `FK_ttl_empresa_competencias_ttl_usuario` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_empresa_competencias_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_empresa_competencias_ttl_usuario` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabela com o cadastro de todos os cargos.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_empresa_competencias`
--

LOCK TABLES `ttl_empresa_competencias` WRITE;
/*!40000 ALTER TABLE `ttl_empresa_competencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_empresa_competencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_empresa_times`
--

DROP TABLE IF EXISTS `ttl_empresa_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_empresa_times` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `nome_unidade` varchar(250) NOT NULL,
  `id_usuario_responsavel` int(11) DEFAULT NULL,
  `id_usuario_coresponsavel` int(11) DEFAULT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) DEFAULT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_time`),
  KEY `Index 2` (`id_empresa`,`parent_id`),
  KEY `FK_ttl_empresa_times_ttl_usuario` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_empresa_times_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ttl_empresa_times_ttl_usuario` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='Tabela que faz a vinculação entre empresa e times é importante destacar que o cadastro de times é uma estrutura em árvore e, portanto, com múltiplos níveis.  \r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_empresa_times`
--

LOCK TABLES `ttl_empresa_times` WRITE;
/*!40000 ALTER TABLE `ttl_empresa_times` DISABLE KEYS */;
INSERT INTO `ttl_empresa_times` VALUES (37,61,NULL,'elofy',91,NULL,'2017-10-05 17:22:49',91,'1'),(38,62,NULL,'PMO',94,NULL,'2017-10-06 17:54:00',94,'1');
/*!40000 ALTER TABLE `ttl_empresa_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_etiqueta_atv`
--

DROP TABLE IF EXISTS `ttl_etiqueta_atv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_etiqueta_atv` (
  `id_etiqueta_atv` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividade` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL,
  `usuario_atualizador` int(11) NOT NULL DEFAULT '0',
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_etiqueta_atv`,`id_etiqueta`,`id_atividade`),
  KEY `FK__ttl_atividades_etiqueta_atv` (`id_atividade`),
  KEY `FK__ttl_etiquetas_etiqueta_atv` (`id_etiqueta`),
  KEY `FK_ttl_etiqueta_atv_ttl_usuario` (`usuario_atualizador`),
  CONSTRAINT `FK__ttl_atividades_etiqueta_atv` FOREIGN KEY (`id_atividade`) REFERENCES `ttl_atividades` (`id_atividade`),
  CONSTRAINT `FK__ttl_etiquetas_etiqueta_atv` FOREIGN KEY (`id_etiqueta`) REFERENCES `ttl_etiquetas` (`id_etiqueta`),
  CONSTRAINT `FK_ttl_etiqueta_atv_ttl_usuario` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Vinculação entre etiquetas e atividades.  ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_etiqueta_atv`
--

LOCK TABLES `ttl_etiqueta_atv` WRITE;
/*!40000 ALTER TABLE `ttl_etiqueta_atv` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_etiqueta_atv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_etiqueta_obj`
--

DROP TABLE IF EXISTS `ttl_etiqueta_obj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_etiqueta_obj` (
  `id_etiqueta_obj` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_etiqueta_obj`,`id_etiqueta`,`id_objetivo`),
  UNIQUE KEY `id_objetivo_id_etiqueta` (`id_objetivo`,`id_etiqueta`),
  KEY `FK__ttl_objetivos` (`id_objetivo`),
  KEY `FK__ttl_etiquetas` (`id_etiqueta`),
  KEY `FK__ttl_usuario` (`usuario_atualizador`),
  CONSTRAINT `FK__ttl_etiquetas` FOREIGN KEY (`id_etiqueta`) REFERENCES `ttl_etiquetas` (`id_etiqueta`),
  CONSTRAINT `FK__ttl_objetivos` FOREIGN KEY (`id_objetivo`) REFERENCES `ttl_objetivos` (`id_objetivo`),
  CONSTRAINT `FK__ttl_usuario` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8 COMMENT='Vinculação entre etiquetas e objetivos.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_etiqueta_obj`
--

LOCK TABLES `ttl_etiqueta_obj` WRITE;
/*!40000 ALTER TABLE `ttl_etiqueta_obj` DISABLE KEYS */;
INSERT INTO `ttl_etiqueta_obj` VALUES (273,187,61,91,'2017-10-05 17:08:39'),(274,188,62,91,'2017-10-05 17:10:35'),(275,189,63,91,'2017-10-05 17:12:20'),(276,190,64,91,'2017-10-05 17:13:59'),(277,191,61,91,'2017-10-05 17:16:34'),(278,192,62,91,'2017-10-05 17:17:53'),(279,193,65,91,'2017-10-05 17:20:08'),(280,207,65,92,'2017-10-05 18:44:10'),(281,194,61,91,'2017-10-05 19:05:00'),(282,195,61,91,'2017-10-05 19:05:00'),(283,196,62,91,'2017-10-05 19:05:00'),(284,197,62,91,'2017-10-05 19:05:00'),(285,198,62,91,'2017-10-05 19:05:00'),(286,199,62,91,'2017-10-05 19:05:00'),(287,200,63,91,'2017-10-05 19:05:00'),(288,201,63,91,'2017-10-05 19:05:00'),(289,202,64,91,'2017-10-05 19:05:00'),(290,203,61,91,'2017-10-05 19:05:00'),(291,204,61,91,'2017-10-05 19:05:00'),(292,205,61,91,'2017-10-05 19:05:00'),(293,206,62,91,'2017-10-05 19:05:00'),(294,208,62,91,'2017-10-05 19:05:00');
/*!40000 ALTER TABLE `ttl_etiqueta_obj` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tai_ttl_etiqueta_obj
   AFTER  INSERT ON ttl_etiqueta_obj
      FOR EACH ROW
BEGIN

   DECLARE vTimestamp      DATETIME;
   DECLARE vId_obj_pai     INTEGER;
   

   SELECT SYSDATE() INTO vTimestamp;

   SET vId_obj_pai = -1;

   SELECT t1.parent_id INTO vId_obj_pai FROM ttl_objetivos t1
      WHERE t1.id_objetivo = NEW.id_objetivo;

   
   IF (vId_obj_pai IS NULL) THEN
      INSERT INTO ttl_pendencias_etiq ( id_etiqueta, id_objetivo, data_pendencia, tipo_pendencia, usuario_atualizador, processado )
                     VALUES           ( NEW.id_etiqueta, NEW.id_objetivo, vTimestamp, 1, NEW.usuario_atualizador, 0 );
   END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tad_ttl_etiqueta_obj
   AFTER  DELETE ON ttl_etiqueta_obj
      FOR EACH ROW
BEGIN

   DECLARE vTimestamp      DATETIME;
   DECLARE vId_obj_pai     INTEGER;
   

   SELECT SYSDATE() INTO vTimestamp;

   SET vId_obj_pai = -1;

   SELECT t1.parent_id INTO vId_obj_pai FROM ttl_objetivos t1
      WHERE t1.id_objetivo = OLD.id_objetivo;

   
   IF (vId_obj_pai IS NULL) THEN
      INSERT INTO ttl_pendencias_etiq ( id_etiqueta, id_objetivo, data_pendencia, tipo_pendencia, usuario_atualizador, processado )
                     VALUES           ( OLD.id_etiqueta, OLD.id_objetivo, vTimestamp, 2, OLD.usuario_atualizador, 0 );
   END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_etiqueta_rchave`
--

DROP TABLE IF EXISTS `ttl_etiqueta_rchave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_etiqueta_rchave` (
  `id_etiqueta_rchave` int(11) NOT NULL AUTO_INCREMENT,
  `id_rchave` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_etiqueta_rchave`,`id_rchave`,`id_etiqueta`),
  KEY `FK__ttl_resultados_chave_rchave` (`id_rchave`),
  KEY `FK__ttl_etiquetas_rchave` (`id_etiqueta`),
  KEY `FK__ttl_usuario_rchave` (`usuario_atualizador`),
  CONSTRAINT `FK__ttl_etiquetas_rchave` FOREIGN KEY (`id_etiqueta`) REFERENCES `ttl_etiquetas` (`id_etiqueta`),
  CONSTRAINT `FK__ttl_resultados_chave_rchave` FOREIGN KEY (`id_rchave`) REFERENCES `ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `FK__ttl_usuario_rchave` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de vinculação entre etiquetas e resultados chave.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_etiqueta_rchave`
--

LOCK TABLES `ttl_etiqueta_rchave` WRITE;
/*!40000 ALTER TABLE `ttl_etiqueta_rchave` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_etiqueta_rchave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_etiquetas`
--

DROP TABLE IF EXISTS `ttl_etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_etiquetas` (
  `id_etiqueta` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL DEFAULT '0',
  `nome_etiqueta` varchar(100) NOT NULL,
  `cor_etiqueta` varchar(10) DEFAULT NULL,
  `icone` blob,
  `ativo` varchar(1) NOT NULL DEFAULT '1' COMMENT 'S ou N',
  PRIMARY KEY (`id_etiqueta`,`id_empresa`),
  KEY `FK_ttl_etiquetas_ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_etiquetas_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='O sistema em suas estruturas de atividades, objetivos e atividades permite a vinculação de etiquetas essas etiquetas são recursos que permitem o agrupamento, classificação e filtro.  Cada etiqueta possui cor e nome. ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_etiquetas`
--

LOCK TABLES `ttl_etiquetas` WRITE;
/*!40000 ALTER TABLE `ttl_etiquetas` DISABLE KEYS */;
INSERT INTO `ttl_etiquetas` VALUES (61,61,'roadmap',NULL,NULL,'1'),(62,61,'documentação',NULL,NULL,'1'),(63,61,'marca',NULL,NULL,'1'),(64,61,'relacionamento',NULL,NULL,'1'),(65,61,'tecnologia',NULL,NULL,'1');
/*!40000 ALTER TABLE `ttl_etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_eventos_usuario`
--

DROP TABLE IF EXISTS `ttl_eventos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_eventos_usuario` (
  `id_evento_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_evento` int(1) NOT NULL COMMENT '0, 1, 2',
  `evento` varchar(500) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `lido` varchar(1) NOT NULL DEFAULT '0' COMMENT '0 ou 1',
  `data_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_evento_usuario`) USING BTREE,
  KEY `FK_ttl_eventos_usuario_ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_eventos_usuario_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Tabela de Controle de Alertas de Usuário';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_eventos_usuario`
--

LOCK TABLES `ttl_eventos_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_eventos_usuario` DISABLE KEYS */;
INSERT INTO `ttl_eventos_usuario` VALUES (372,92,2,'Foi atualizado o progresso do Objetivo Mapear funcionalidades que devem estar contempladas no aplicativo. O progresso atual é de 20%',NULL,'1','2017-10-06 18:30:32'),(373,91,2,'Foi atualizado o progresso do Objetivo Mapear funcionalidades que devem estar contempladas no aplicativo. O progresso atual é de 20%',NULL,'1','2017-10-06 19:59:28'),(374,91,2,'Foi atualizado o progresso do Objetivo Ter aplicativos para IOS e ANDROID. O progresso atual é de 10%',NULL,'1','2017-10-06 19:59:28'),(375,91,2,'Foi atualizado o progresso do Objetivo Realizar benchmarking frequente dos concorrentes. O progresso atual é de 17%',NULL,'1','2017-10-06 19:59:28'),(376,91,2,'Foi atualizado o progresso do Objetivo Organizar roadmap de novas funcionalidades. O progresso atual é de 6%',NULL,'1','2017-10-06 19:59:28'),(377,91,2,'Foi atualizado o progresso do Objetivo Identificar falhas de navegação, design e usabilidade do elofy. O progresso atual é de 8%',NULL,'1','2017-10-06 19:59:28'),(378,91,2,'Foi atualizado o progresso do Objetivo Organizar roadmap de novas funcionalidades. O progresso atual é de 8%',NULL,'1','2017-10-06 19:59:28'),(379,92,2,'Foi atualizado o progresso do Objetivo Manter blog atualizado. O progresso atual é de 7%',NULL,'1','2017-10-06 18:30:32'),(380,91,2,'Foi atualizado o progresso do Objetivo Manter blog atualizado. O progresso atual é de 7%',NULL,'1','2017-10-06 19:59:28'),(381,91,2,'Foi atualizado o progresso do Objetivo Ter documentação técnica do produto. O progresso atual é de 2%',NULL,'1','2017-10-06 19:59:28'),(382,91,2,'Foi atualizado o progresso do Objetivo Manter redes sociais com posts recentes . O progresso atual é de 7%',NULL,'1','2017-10-06 19:59:28');
/*!40000 ALTER TABLE `ttl_eventos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_feedback`
--

DROP TABLE IF EXISTS `ttl_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_solicitante` int(11) DEFAULT NULL COMMENT 'Sempre que houver solicitante tem que ser detalhados os usuarios.',
  `id_usuario_destino` int(11) DEFAULT NULL COMMENT 'Destino é quando o feedback é próativo',
  `descricao` varchar(450) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_feedback`),
  KEY `Index 2` (`id_empresa`),
  KEY `FK_ttl_feedback_ttl_usuario` (`id_usuario_solicitante`),
  KEY `FK_ttl_feedback_ttl_usuario_2` (`id_usuario_destino`),
  CONSTRAINT `FK_ttl_feedback_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_feedback_ttl_usuario` FOREIGN KEY (`id_usuario_solicitante`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_feedback_ttl_usuario_2` FOREIGN KEY (`id_usuario_destino`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de controle de feedbacks, solicitações .';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_feedback`
--

LOCK TABLES `ttl_feedback` WRITE;
/*!40000 ALTER TABLE `ttl_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_feedback_competencias`
--

DROP TABLE IF EXISTS `ttl_feedback_competencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_feedback_competencias` (
  `id_feedback_competencias` int(11) NOT NULL AUTO_INCREMENT,
  `id_feedback` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_competencia` int(11) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `data_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_feedback_competencias`,`id_feedback`,`id_usuario`,`id_competencia`),
  KEY `FK__ttl_feedback` (`id_feedback`),
  KEY `FK__ttl_empresa_competencias` (`id_competencia`),
  KEY `FK_ttl_feedback_competencias_ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK__ttl_empresa_competencias` FOREIGN KEY (`id_competencia`) REFERENCES `ttl_empresa_competencias` (`id_competencia`),
  CONSTRAINT `FK__ttl_feedback` FOREIGN KEY (`id_feedback`) REFERENCES `ttl_feedback` (`id_feedback`),
  CONSTRAINT `FK_ttl_feedback_competencias_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que vincula competências que serão avaliadas no feedback do usuário';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_feedback_competencias`
--

LOCK TABLES `ttl_feedback_competencias` WRITE;
/*!40000 ALTER TABLE `ttl_feedback_competencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_feedback_competencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_feedback_destinatarios`
--

DROP TABLE IF EXISTS `ttl_feedback_destinatarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_feedback_destinatarios` (
  `id_feedback_destinatarios` int(11) NOT NULL AUTO_INCREMENT,
  `id_feedback` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `comentario` varchar(450) DEFAULT '0',
  `curtir` int(11) NOT NULL DEFAULT '0',
  `cafe` int(11) NOT NULL DEFAULT '0',
  `ignorar` int(11) NOT NULL DEFAULT '0',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_feedback_destinatarios`),
  KEY `FK__ttl_feedbackdest` (`id_feedback`),
  KEY `FK__ttl_usuariodest` (`id_usuario`),
  CONSTRAINT `FK__ttl_feedbackdest` FOREIGN KEY (`id_feedback`) REFERENCES `ttl_feedback` (`id_feedback`),
  CONSTRAINT `FK__ttl_usuariodest` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Sempre que um feedback é solicitado ele pode ter um ou vários destinatários. ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_feedback_destinatarios`
--

LOCK TABLES `ttl_feedback_destinatarios` WRITE;
/*!40000 ALTER TABLE `ttl_feedback_destinatarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_feedback_destinatarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_historico_cargo_usuario`
--

DROP TABLE IF EXISTS `ttl_historico_cargo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_historico_cargo_usuario` (
  `id_historico_cargo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `Id_cargo` int(11) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  PRIMARY KEY (`id_historico_cargo_usuario`),
  KEY `FK__ttl_usuariocargo` (`id_usuario`),
  KEY `FK__ttl_empresa_cargos` (`Id_cargo`),
  CONSTRAINT `FK__ttl_empresa_cargos` FOREIGN KEY (`Id_cargo`) REFERENCES `ttl_empresa_cargos` (`id_cargo`),
  CONSTRAINT `FK__ttl_usuariocargo` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela com o controle de histórico de cargo de usuários.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_historico_cargo_usuario`
--

LOCK TABLES `ttl_historico_cargo_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_historico_cargo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_historico_cargo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_janela`
--

DROP TABLE IF EXISTS `ttl_janela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_janela` (
  `id_janela` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` varchar(15) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` int(1) NOT NULL COMMENT 'S ou N',
  PRIMARY KEY (`id_janela`,`id_empresa`),
  KEY `Index 2` (`id_empresa`),
  CONSTRAINT `FK_ttl_janela_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COMMENT='A janela é  o período de tempo para o qual serão considerados os ciclos de planejamento a princípio as janelas serão todas de 1 ano mas no longo prazo deve ser possível definir o periódo da janela e dos ciclos. Ao desenvolvedor cabe avaliar se é possível já em uma primeira versão trazer o setup dessas informações já para uma primeira versão.\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_janela`
--

LOCK TABLES `ttl_janela` WRITE;
/*!40000 ALTER TABLE `ttl_janela` DISABLE KEYS */;
INSERT INTO `ttl_janela` VALUES (76,61,'2017-01-01','2017-12-31','2017','2017-10-02 21:56:39',1),(77,61,'2018-01-01','2018-12-31','2018','2017-10-02 21:56:39',1),(78,61,'2019-01-01','2019-12-31','2019','2017-10-02 21:56:39',1),(79,62,'2017-01-01','2017-12-31','2017','2017-10-06 17:50:27',1),(80,62,'2018-01-01','2018-12-31','2018','2017-10-06 17:50:27',1),(81,62,'2019-01-01','2019-12-31','2019','2017-10-06 17:50:27',1);
/*!40000 ALTER TABLE `ttl_janela` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER `tai_ttl_janela` AFTER INSERT ON `ttl_janela` FOR EACH ROW BEGIN

   DECLARE vTimestamp   DATETIME;
   DECLARE vPlan        CHAR(1);
   DECLARE vIncremento  INTEGER;
   DECLARE vCont        INTEGER;
   DECLARE vDataInicial DATETIME;
   DECLARE vDataFinal   DATETIME; 
   DECLARE vDescricao   VARCHAR(20);   


   select planejamento into vPlan from ttl_empresa where id_empresa = NEW.id_empresa;

   SELECT SYSDATE() INTO vTimestamp;

   select CASE vPlan
          WHEN 'S' THEN 6
          WHEN 'T' THEN 3
          WHEN 'B' THEN 2
          ELSE -1
       END INTO vIncremento;

   select CASE vPlan
          WHEN 'S' THEN 'º semestre'
          WHEN 'T' THEN 'º trimestre'
          WHEN 'B' THEN 'º bimestre'
          ELSE ''
       END INTO vDescricao;

   -- vIncremento - número de meses de cada ciclo
   -- 12/vIncremento - númmero de ciclos de cada Janela

   SET vCont = 1;
   SET vDataInicial = NEW.data_inicial;
   SET vDataFinal   = DATE_ADD(vDataInicial, INTERVAL vIncremento MONTH);
   SET vDataFinal   = DATE_ADD(vDataFinal, INTERVAL -1 DAY);
   ciclos: WHILE vCont <= ( 12/vIncremento ) DO
 
       INSERT INTO ttl_ciclos ( id_janela, nome_ciclo, inicio_vigencia, fim_vigencia, data_atualizacao, ativo )
                 values       ( NEW.id_janela, CONCAT(CAST(vCont as CHAR), vDescricao), vDataInicial, vDataFinal, vTimestamp, 1); 

       SET vDataInicial   = DATE_ADD(vDataInicial, INTERVAL vIncremento MONTH); 
       SET vDataFinal   = DATE_ADD(vDataInicial, INTERVAL vIncremento MONTH);
       SET vDataFinal   = DATE_ADD(vDataFinal, INTERVAL -1 DAY);
       SET vCont = vCont + 1;
    END WHILE ciclos;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_log_atividades`
--

DROP TABLE IF EXISTS `ttl_log_atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_log_atividades` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividade` int(11) NOT NULL,
  `progresso` double DEFAULT '0',
  `data_avaliacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  PRIMARY KEY (`id_historico`),
  KEY `FK_ttl_h_atividades_ttl_atividades_hist` (`id_atividade`),
  KEY `FK_ttl_h_atividades_ttl_usuario_hist` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_h_atividades_ttl_atividades_hist` FOREIGN KEY (`id_atividade`) REFERENCES `ttl_atividades` (`id_atividade`),
  CONSTRAINT `FK_ttl_h_atividades_ttl_usuario_hist` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Entende-se por log também a informação de histórico de execução e recurso para ser utilizado em comunicação com demais integrantes da empresa e time.  O sistema deve oferecer timeline com últimas atividades (como se fosse um feed)  e permitir que outros usuários ou times inteiros sejam mencionados através de recurso como @NOMEUSUARIO OU @NOMEDOTIME sendo sinalizados por meio do ícone de sino na home do sistema.\r\n\r\nAs notificações de menção e atividades são recursos que serão implementados através de aplicativo em uma segunda versão.\r\n\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_log_atividades`
--

LOCK TABLES `ttl_log_atividades` WRITE;
/*!40000 ALTER TABLE `ttl_log_atividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_log_atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_log_objetivos`
--

DROP TABLE IF EXISTS `ttl_log_objetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_log_objetivos` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivos` int(11) NOT NULL,
  `progresso` double NOT NULL DEFAULT '0',
  `data_avaliacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `comentario` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id_historico`),
  KEY `FK_ttl_h_objetivos_ttl_objetivos` (`id_objetivos`),
  KEY `FK_ttl_h_objetivos_ttl_usuario` (`usuario_atualizador`),
  CONSTRAINT `FK_ttl_h_objetivos_ttl_objetivos` FOREIGN KEY (`id_objetivos`) REFERENCES `ttl_objetivos` (`id_objetivo`),
  CONSTRAINT `FK_ttl_h_objetivos_ttl_usuario` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8 COMMENT='Entende-se por log também a informação de histórico de execução e recurso para ser utilizado em comunicação com demais integrantes da empresa e time.  O sistema deve oferecer timeline com últimas atividades (como se fosse um feed)  e permitir que outros usuários ou times inteiros sejam mencionados através de recurso como @NOMEUSUARIO OU @NOMEDOTIME sendo sinalizados por meio do ícone de sino na home do sistema.\r\n\r\nAs notificações de menção e atividades são recursos que serão implementados através de aplicativo em uma segunda versão.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_log_objetivos`
--

LOCK TABLES `ttl_log_objetivos` WRITE;
/*!40000 ALTER TABLE `ttl_log_objetivos` DISABLE KEYS */;
INSERT INTO `ttl_log_objetivos` VALUES (189,194,20,'2017-10-06 13:14:52',91,'Foi atualizado o progresso do Objetivo Mapear funcionalidades que devem estar contempladas no aplicativo. O progresso atual é de 20%'),(190,187,10,'2017-10-06 13:14:56',91,'Foi atualizado o progresso do Objetivo Ter aplicativos para IOS e ANDROID. O progresso atual é de 10%'),(191,203,17,'2017-10-06 14:01:25',91,'Foi atualizado o progresso do Objetivo Realizar benchmarking frequente dos concorrentes. O progresso atual é de 17%'),(192,191,6,'2017-10-06 14:01:26',91,'Foi atualizado o progresso do Objetivo Organizar roadmap de novas funcionalidades. O progresso atual é de 6%'),(193,204,8,'2017-10-06 14:06:07',92,'Foi atualizado o progresso do Objetivo Identificar falhas de navegação, design e usabilidade do elofy. O progresso atual é de 8%'),(194,191,8,'2017-10-06 14:06:11',91,'Foi atualizado o progresso do Objetivo Organizar roadmap de novas funcionalidades. O progresso atual é de 8%'),(195,197,7,'2017-10-06 15:14:22',91,'Foi atualizado o progresso do Objetivo Manter blog atualizado. O progresso atual é de 7%'),(196,188,2,'2017-10-06 15:14:26',91,'Foi atualizado o progresso do Objetivo Ter documentação técnica do produto. O progresso atual é de 2%'),(197,200,7,'2017-10-06 15:15:05',92,'Foi atualizado o progresso do Objetivo Manter redes sociais com posts recentes . O progresso atual é de 7%');
/*!40000 ALTER TABLE `ttl_log_objetivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_log_rchave`
--

DROP TABLE IF EXISTS `ttl_log_rchave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_log_rchave` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `id_rchave` int(11) NOT NULL,
  `progresso` double DEFAULT NULL,
  `comentario` varchar(4000) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  PRIMARY KEY (`id_historico`),
  KEY `FK__ttl_resultados_chave_log_rchsve` (`id_rchave`),
  KEY `FK__ttl_usuario_log_rchave` (`usuario_atualizador`),
  CONSTRAINT `FK__ttl_resultados_chave_log_rchsve` FOREIGN KEY (`id_rchave`) REFERENCES `ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `FK__ttl_usuario_log_rchave` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COMMENT='Entende-se por log também a informação de histórico de execução e recurso para ser utilizado em comunicação com demais integrantes da empresa e time.  O sistema deve oferecer timeline com últimas atividades (como se fosse um feed)  e permitir que outros usuários ou times inteiros sejam mencionados através de recurso como @NOMEUSUARIO OU @NOMEDOTIME sendo sinalizados por meio do ícone de sino na home do sistema.\r\n\r\nAs notificações de menção e atividades são recursos que serão implementados através de aplicativo em uma segunda versão.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_log_rchave`
--

LOCK TABLES `ttl_log_rchave` WRITE;
/*!40000 ALTER TABLE `ttl_log_rchave` DISABLE KEYS */;
INSERT INTO `ttl_log_rchave` VALUES (97,45,20,'Foi atualizado o valor do Resultado Chave Ter 100% das funcionalidades necessárias para aplicativo mapeadas. O progresso atual é de 20%','2017-10-06 13:14:52',91),(98,53,17,'Foi atualizado o valor do Resultado Chave Analisar ao menos um concorrente por quinzena ate o final de 2017. O progresso atual é de 17%','2017-10-06 14:01:25',91),(99,54,8,'Foi atualizado o valor do Resultado Chave Relatar falhas encontradas semanalmente ate o final de 2017. O progresso atual é de 8%','2017-10-06 14:06:07',92),(100,49,7,'Foi atualizado o valor do Resultado Chave Manter ao menos uma publicação semanal até o final de 2017. O progresso atual é de 7%','2017-10-06 15:14:22',91),(101,50,7,'Foi atualizado o valor do Resultado Chave Produzir ao menos um post por semana. O progresso atual é de 7%','2017-10-06 15:15:05',92);
/*!40000 ALTER TABLE `ttl_log_rchave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_obj_a_atualizar`
--

DROP TABLE IF EXISTS `ttl_obj_a_atualizar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_obj_a_atualizar` (
  `id_obj_a_atualizar` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) NOT NULL,
  `id_objetivo_pai` int(11) DEFAULT NULL,
  `data_atualizacao` datetime NOT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `exclusao` int(11) NOT NULL,
  `processado` int(11) NOT NULL,
  PRIMARY KEY (`id_obj_a_atualizar`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_obj_a_atualizar`
--

LOCK TABLES `ttl_obj_a_atualizar` WRITE;
/*!40000 ALTER TABLE `ttl_obj_a_atualizar` DISABLE KEYS */;
INSERT INTO `ttl_obj_a_atualizar` VALUES (197,194,187,'2017-10-05 17:24:31',91,0,1),(198,195,187,'2017-10-05 17:27:05',91,0,1),(199,196,188,'2017-10-05 17:31:22',91,0,1),(200,197,188,'2017-10-05 17:32:20',91,0,1),(201,198,188,'2017-10-05 17:33:30',91,0,1),(202,199,188,'2017-10-05 17:36:38',91,0,1),(203,200,189,'2017-10-05 17:54:27',92,0,1),(204,201,189,'2017-10-05 17:55:21',92,0,1),(205,202,190,'2017-10-05 18:06:24',91,0,1),(206,203,191,'2017-10-05 18:09:21',91,0,1),(207,204,191,'2017-10-05 18:10:09',91,0,1),(208,205,191,'2017-10-05 18:10:49',91,0,1),(209,206,192,'2017-10-05 18:43:11',91,0,1),(210,207,193,'2017-10-05 18:44:10',92,0,1),(211,208,192,'2017-10-05 18:44:42',91,0,1),(212,194,187,'2017-10-06 13:14:52',91,0,1),(214,203,191,'2017-10-06 14:01:25',91,0,1),(216,204,191,'2017-10-06 14:06:07',92,0,1),(218,197,188,'2017-10-06 15:14:22',91,0,1),(220,200,189,'2017-10-06 15:15:05',92,0,1);
/*!40000 ALTER TABLE `ttl_obj_a_atualizar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_obj_peso_time`
--

DROP TABLE IF EXISTS `ttl_obj_peso_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_obj_peso_time` (
  `id_obj_peso_time` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_obj_peso_time`,`id_objetivo`,`id_time`),
  KEY `FK__ttl_usuario_obj_peso_time` (`usuario`),
  CONSTRAINT `FK__ttl_usuario_obj_peso_time` FOREIGN KEY (`usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8 COMMENT='Tabela que vincula o peso de cada time na execução de um objetivo estratégico.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_obj_peso_time`
--

LOCK TABLES `ttl_obj_peso_time` WRITE;
/*!40000 ALTER TABLE `ttl_obj_peso_time` DISABLE KEYS */;
INSERT INTO `ttl_obj_peso_time` VALUES (164,187,37,10,'2017-10-05 17:23:10',91),(165,194,37,1,'2017-10-05 17:24:31',91),(166,195,37,1,'2017-10-05 17:27:05',91),(167,196,37,1,'2017-10-05 17:31:22',91),(168,197,37,1,'2017-10-05 17:32:20',91),(169,198,37,1,'2017-10-05 17:33:30',91),(170,199,37,1,'2017-10-05 17:36:38',91),(171,188,37,10,'2017-10-05 17:49:48',91),(172,200,37,1,'2017-10-05 17:54:27',92),(173,201,37,1,'2017-10-05 17:55:21',92),(174,190,37,10,'2017-10-05 18:05:51',91),(175,202,37,1,'2017-10-05 18:06:24',91),(176,191,37,10,'2017-10-05 18:08:08',91),(177,203,37,1,'2017-10-05 18:09:21',91),(178,204,37,1,'2017-10-05 18:10:09',91),(179,205,37,1,'2017-10-05 18:10:49',91),(180,206,37,1,'2017-10-05 18:43:11',91),(181,192,37,10,'2017-10-05 18:43:18',91),(182,207,37,1,'2017-10-05 18:44:10',92),(183,208,37,1,'2017-10-05 18:44:42',91);
/*!40000 ALTER TABLE `ttl_obj_peso_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_obj_responsaveis`
--

DROP TABLE IF EXISTS `ttl_obj_responsaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_obj_responsaveis` (
  `id_responsavel` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_time` int(11) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_responsavel`),
  UNIQUE KEY `id_objetivo_id_usuario` (`id_objetivo`,`id_usuario`),
  KEY `FK__ttl_objetivos_obj` (`id_objetivo`),
  KEY `FK__ttl_usuario_obj` (`id_usuario`),
  KEY `FK__ttl_empresa_unidades_obj` (`id_time`),
  CONSTRAINT `FK__ttl_empresa_unidades_obj` FOREIGN KEY (`id_time`) REFERENCES `ttl_empresa_times` (`id_time`),
  CONSTRAINT `FK__ttl_objetivos_obj` FOREIGN KEY (`id_objetivo`) REFERENCES `ttl_objetivos` (`id_objetivo`),
  CONSTRAINT `FK__ttl_usuario_obj` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COMMENT='Embora haja na tabela de objetivo a informação de times e responsável o sistema deve permitir a vinculação de múltiplos responsáveis e, até, de divisão entre times, por isso as tabelas de vinculação de responsáveis e outras entidades como objetivos, rechave e atividade.\r\n\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_obj_responsaveis`
--

LOCK TABLES `ttl_obj_responsaveis` WRITE;
/*!40000 ALTER TABLE `ttl_obj_responsaveis` DISABLE KEYS */;
INSERT INTO `ttl_obj_responsaveis` VALUES (185,194,92,NULL,'2017-10-05 17:24:31'),(186,195,92,NULL,'2017-10-05 17:27:05'),(188,197,92,NULL,'2017-10-05 17:32:20'),(189,198,92,NULL,'2017-10-05 17:33:30'),(190,199,92,NULL,'2017-10-05 17:36:38'),(191,202,91,NULL,'2017-10-05 18:06:24'),(192,208,91,NULL,'2017-10-05 18:44:42'),(193,191,92,NULL,'2017-10-09 17:37:22');
/*!40000 ALTER TABLE `ttl_obj_responsaveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_objetivo_ciclo`
--

DROP TABLE IF EXISTS `ttl_objetivo_ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_objetivo_ciclo` (
  `id_objetivo_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_objetivo_ciclo`,`id_objetivo`,`id_ciclo`),
  KEY `FK_ttl_objetivo_ciclo_ttl_ciclos1` (`id_ciclo`),
  KEY `FK_ttl_objetivo_ciclo_ttl_objetivos1` (`id_objetivo`),
  CONSTRAINT `FK_ttl_objetivo_ciclo_ttl_ciclos1` FOREIGN KEY (`id_ciclo`) REFERENCES `ttl_ciclos` (`id_ciclo`),
  CONSTRAINT `FK_ttl_objetivo_ciclo_ttl_objetivos1` FOREIGN KEY (`id_objetivo`) REFERENCES `ttl_objetivos` (`id_objetivo`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8 COMMENT='Um objetivo pode estar vigente por mais de um ciclo por isso para cada ciclo que esteja visível deve ser apresentada uma linha na tabel.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_objetivo_ciclo`
--

LOCK TABLES `ttl_objetivo_ciclo` WRITE;
/*!40000 ALTER TABLE `ttl_objetivo_ciclo` DISABLE KEYS */;
INSERT INTO `ttl_objetivo_ciclo` VALUES (183,194,285,'2017-10-05 17:24:31'),(184,195,285,'2017-10-05 17:27:05'),(185,196,285,'2017-10-05 17:31:22'),(186,197,285,'2017-10-05 17:32:20'),(187,198,285,'2017-10-05 17:33:30'),(188,199,285,'2017-10-05 17:36:38'),(189,200,285,'2017-10-05 17:54:27'),(190,201,285,'2017-10-05 17:55:21'),(191,202,285,'2017-10-05 18:06:24'),(192,203,285,'2017-10-05 18:09:21'),(193,204,285,'2017-10-05 18:10:09'),(194,205,285,'2017-10-05 18:10:49'),(195,206,285,'2017-10-05 18:43:11'),(196,207,285,'2017-10-05 18:44:10'),(197,208,285,'2017-10-05 18:44:42');
/*!40000 ALTER TABLE `ttl_objetivo_ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_objetivos`
--

DROP TABLE IF EXISTS `ttl_objetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_objetivos` (
  `id_objetivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_janela` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `percentual` double NOT NULL DEFAULT '0',
  `percentual_avaliacao` double DEFAULT '0',
  `peso` int(11) DEFAULT NULL,
  `id_time` int(11) DEFAULT NULL,
  `id_tipo_atualizacao` int(11) NOT NULL DEFAULT '0',
  `responsavel` int(11) NOT NULL,
  `qtd_objetivos` int(11) DEFAULT NULL,
  `qtd_atividades` int(11) DEFAULT NULL,
  `qtd_rchaves` int(11) DEFAULT NULL,
  `publico` char(1) DEFAULT 'N' COMMENT 'S ou  N',
  `situacao` int(11) NOT NULL DEFAULT '0' COMMENT '0Pendente,1Finalizado, 2Cancelado, 3Em Andamento',
  `avaliacao` int(11) NOT NULL DEFAULT '0',
  `destaque` char(1) DEFAULT 'N' COMMENT 'S ou N',
  `cor` varchar(50) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `ativo` int(1) NOT NULL COMMENT 'S ou N',
  PRIMARY KEY (`id_objetivo`,`id_empresa`,`id_janela`),
  KEY `FK_ttl_objetivos_ttl_empresa` (`id_empresa`),
  KEY `Index 2` (`id_empresa`,`parent_id`),
  KEY `FK_ttl_objetivos_ttl_usuario_2` (`usuario_atualizador`),
  KEY `FK_ttl_objetivos_ttl_usuario` (`responsavel`),
  CONSTRAINT `FK_ttl_objetivos_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`),
  CONSTRAINT `FK_ttl_objetivos_ttl_usuario` FOREIGN KEY (`responsavel`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_objetivos_ttl_usuario_2` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COMMENT='O primeiro nível de objetivos deve ser chamado de Objetivos Estratégicos(OE), são os definidos em nível corporativo, eles não são obrigatórios, mas quando existirem estão no topo da tela de planejamento. É a partir deles que o desdobramento é feito.\r\nO segundo nível de objetivos deve ser chamado de Objetivos Táticos(OT). Eles podem ser desdobrados a partir de OE nesse caso o “parent” deve ser referenciado na tabela ou podem existir sem vínculo nesse caso pode-se convencionar “parent=0” e, quando não houver vínculo com algum OE não é necessário informar peso.\r\nO desdobramento de OE em OT é realizado na proporção 1 para n.  Entende-se que os objetivos táticos são definidos por equipe, ou seja, cada equipe pode desdobrar n vezes um mesmo OE em OT.\r\nExemplificando:\r\nOE -  1\r\n-Time de Desenvolvimento \r\n	OT 1.1   peso = 5\r\n	OT 1.2   peso = 5\r\n- Time de TI \r\n	OT 2.1   peso = 7\r\n	OT 2.2   peso = 3\r\n	OT 2.3   peso = 0\r\n\r\nDentro de um mesmo time a soma dos pesos de OT que contribuem para um mesmo OE não podem ser maior que 10 (100%) sendo que podem existir OT com peso 0. (ttl_objetivo_peso_time).\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_objetivos`
--

LOCK TABLES `ttl_objetivos` WRITE;
/*!40000 ALTER TABLE `ttl_objetivos` DISABLE KEYS */;
INSERT INTO `ttl_objetivos` VALUES (187,61,76,NULL,'Ter aplicativos para IOS e ANDROID','Desenvolver ações para que tenhamos concluídas e disponíveis funcionalidades para smartphones.',10,0,NULL,NULL,0,91,2,0,0,'N',3,0,'N','#f8ba31','2017-10-06 13:14:56',91,1),(188,61,76,NULL,'Ter documentação técnica do produto ','Corresponde a necessidade de desenvolvermos ate o final do ano documentação do elofy, abrangendo vendas, manuais, blogs e outras iniciativas.',2,0,NULL,NULL,0,91,4,0,0,'N',3,0,'N','#5ec097','2017-10-10 16:22:25',91,1),(189,61,76,NULL,'Posicionar o produto em mídias sociais','Elaborar atividades e objetivos que convergem para o posicionamento do produtos em plataformas sociais',0,0,NULL,NULL,0,91,2,0,0,'N',0,0,'N','','2017-10-06 15:15:06',91,1),(190,61,76,NULL,'Estruturar e gerenciar base de clientes','Planejar ações para estruturar e gerenciar a base de clientes',0,0,NULL,NULL,0,91,1,0,0,'N',0,0,'N','#849ba1','2017-10-05 18:40:44',91,1),(191,61,76,NULL,'Organizar roadmap de novas funcionalidades','Estruturar plano de ações que nos leve a conseguir organizar o roadmap do produto.',8,0,NULL,NULL,0,91,3,0,0,'N',3,0,'N','#f8ba31','2017-10-06 14:06:11',91,1),(192,61,76,NULL,'Produzir Artefatos de Marketing','Porduzir artefatos de marketing para divulgação Elofy',0,0,NULL,NULL,0,91,2,0,0,'N',0,0,'N','#5ec097','2017-10-05 18:44:46',91,1),(193,61,76,NULL,'Estruturar equipe interna de desenvolvimento','Elaborar conjunto de ações para se trabalhar autonomia com relação aos desenvolvedores externos.',0,0,NULL,NULL,0,91,1,0,0,'N',0,0,'N','#e98824','2017-10-05 18:44:14',91,1),(194,61,76,187,'Mapear funcionalidades que devem estar contempladas no aplicativo','Mapear funcionalidades que deve estar contempladas no aplicativo',20,0,1,37,0,91,0,1,1,'N',3,0,'N','0','2017-10-06 13:17:24',91,1),(195,61,76,187,'Desenvolver aplicativos IOS e Android','Definir empresa responsável, cronograma e desenvolver aplicativo.',0,0,1,37,0,91,0,0,1,'N',0,0,'N','0','2017-10-05 18:40:44',91,1),(196,61,76,188,'Criar manuais do Elofy','Criar manuais do Elofy',0,0,1,37,0,92,0,3,2,'N',0,0,'N','0','2017-10-06 20:15:10',91,1),(197,61,76,188,'Manter blog atualizado','Manter o blog atualizado',7,0,1,37,0,91,0,0,1,'N',3,0,'N','0','2017-10-06 15:14:22',91,1),(198,61,76,188,'Criar planos templates de comunicação com clientes','Estrutura um plano de respostas padrão para o relacionamento com clientes.',0,0,1,37,0,91,0,0,1,'N',0,0,'N','0','2017-10-05 18:40:44',91,1),(199,61,76,188,'Ter documentação de objetos do modelos de banco de dados','Ter documentação de objetos do modelos de banco de dados',0,0,1,37,0,93,0,1,1,'N',0,0,'N','0','2017-10-05 19:15:36',91,1),(200,61,76,189,'Manter redes sociais com posts recentes ','Produzir e atualizar posts semanalmente',7,0,1,37,0,91,0,0,1,'N',3,0,'N','0','2017-10-06 15:15:05',92,1),(201,61,76,189,'Manter e acompanhar as mídias patrocinadas no google','Manter e acompanhar as mídias patrocinadas no google',0,0,1,37,0,91,0,0,1,'N',0,0,'N','0','2017-10-05 18:40:44',92,1),(202,61,76,190,'Implantar software de CRM','Impantar software de crm ',0,0,1,37,0,91,0,0,1,'N',0,0,'N','0','2017-10-05 18:40:44',91,1),(203,61,76,191,'Realizar benchmarking frequente dos concorrentes','Realizar acompanhamento periódico dos principais fornecedores.',17,0,1,37,0,92,0,0,1,'N',3,0,'N','0','2017-10-06 20:16:26',91,1),(204,61,76,191,'Identificar falhas de navegação, design e usabilidade do elofy','Identificar falhas de navegação, design e usabilidade do elofy',8,0,1,37,0,91,0,0,1,'N',3,0,'N','0','2017-10-06 14:06:07',92,1),(205,61,76,191,'Definir entre as sugestões de melhoria quais devem ser implementadas e ordem','Definir entre as sugestões de melhoria quais devem ser implementadas e ordem',0,0,1,37,0,91,0,0,1,'N',0,0,'N','0','2017-10-05 18:40:44',91,1),(206,61,76,192,'Implantar e estruturar plano de mail marketing','Definir software e estruturar plano de mail marketing',0,0,1,37,0,91,0,0,2,'N',0,0,'N','0','2017-10-05 18:48:44',91,1),(207,61,76,193,'Ter uma equipe autônoma ','Ter uma equipe autônoma ',0,0,1,37,0,92,0,0,2,'N',0,0,'N','0','2017-10-06 20:16:59',92,1),(208,61,76,192,'Desenvolver vídeo de divulgação do Elofy','Produzir vídeo animado de divulgação do elofy',0,0,1,37,0,92,0,0,1,'N',0,0,'N','0','2017-10-05 19:39:48',91,1);
/*!40000 ALTER TABLE `ttl_objetivos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tai_ttl_objetivos
   AFTER INSERT on ttl_objetivos
     FOR EACH ROW
BEGIN


   DECLARE vTimestamp      DATETIME;
   DECLARE vId_obj_pai     INTEGER;
   DECLARE vId_etiqueta    INTEGER;

   DECLARE vFim_cursor     BOOL DEFAULT FALSE;

   DECLARE cur_etiq CURSOR FOR 
       SELECT id_etiqueta
          from ttl_etiqueta_obj
       WHERE id_objetivo = vId_obj_pai
        ORDER BY id_objetivo;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;
   
   SELECT SYSDATE() INTO vTimestamp;

   SET vId_obj_pai = -1;
 
   IF (NEW.ativo = 1 AND NEW.parent_id IS NOT NULL) THEN

      SET vId_obj_pai = NEW.parent_id;

      INSERT INTO ttl_obj_a_atualizar ( id_objetivo, id_objetivo_pai, data_atualizacao, usuario_atualizador, exclusao, processado )
               values                  ( NEW.id_objetivo, NEW.parent_id, NEW.data_atualizacao, NEW.usuario_atualizador, 0, 0 );
       
      OPEN cur_etiq;

      loop_etiq: LOOP
         FETCH cur_etiq INTO vId_etiqueta;

         IF vFim_cursor THEN
            LEAVE loop_etiq;
         END IF;

         INSERT INTO ttl_pendencias_etiq ( id_etiqueta, id_objetivo, data_pendencia, tipo_pendencia, usuario_atualizador, processado )
                     VALUES           ( vId_etiqueta, NEW.id_objetivo, vTimestamp, 3, NEW.usuario_atualizador, 0 );

      END LOOP;

      CLOSE cur_etiq;      

   END IF; 

 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER `tbu_ttl_objetivos` BEFORE UPDATE ON `ttl_objetivos` FOR EACH ROW BEGIN

IF (OLD.percentual != NEW.percentual AND NEW.ativo = 1 AND NEW.situacao != 2) THEN

  IF (NEW.percentual >= 100) THEN -- Concluiu
     SET NEW.situacao = 1;
  END IF;

  IF (NEW.percentual = 0) THEN -- Nenhum progresso
     SET NEW.situacao = 0;
  END IF;

  IF (NEW.percentual != 0 AND NEW.percentual < 100) THEN -- Algum progresso
     SET NEW.situacao = 3;
  END IF;

END IF;

IF (OLD.ativo != NEW.ativo) THEN
   IF (NEW.ativo = 0) THEN  
      SET NEW.situacao = 2;  -- Se excluiu, marca como cancelado
   ELSE 
      IF (NEW.percentual >= 100) THEN -- Concluiu
         SET NEW.situacao = 1;
      END IF;

      IF (NEW.percentual = 0) THEN -- Nenhum progresso
         SET NEW.situacao = 0;
      END IF;

      IF (NEW.percentual != 0 AND NEW.percentual < 100) THEN -- Algum progresso
         SET NEW.situacao = 3;
      END IF;
   END IF;
END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tau_ttl_objetivos 
    AFTER UPDATE ON ttl_objetivos 
	     FOR EACH ROW BEGIN

    DECLARE vComentario VARCHAR(4000);
    DECLARE vId_evento  INTEGER;
    DECLARE vEvento     VARCHAR(250);
    DECLARE vAtualizar  INTEGER;
    DECLARE vAProcessar INTEGER;   
    DECLARE vExclusao   INTEGER;
    DECLARE vProcessado INTEGER;

    SET vId_evento = -1;
    SET vAtualizar = 0;
    SET vExclusao  = 0;
 

    IF (NEW.ativo = 1) THEN

       IF (NEW.percentual != OLD.percentual) THEN

          select CASE 
                 WHEN NEW.percentual < 100 THEN 
                     CONCAT( 'Foi atualizado o progresso do Objetivo ',
                             NEW.nome, 
                             '. O progresso atual é de ',
                             CAST(NEW.percentual as CHAR),
                             '%'
                           )
                 WHEN NEW.percentual >= 100 THEN
                     CONCAT( 'Foi finalizado o Objetivo ',
                             NEW.nome
                           ) 
              END INTO vComentario;

       
          INSERT INTO ttl_log_objetivos ( id_objetivos, progresso, comentario, data_avaliacao, usuario_atualizador )
                  values                ( OLD.id_objetivo, NEW.percentual, vComentario, NEW.data_atualizacao, NEW.usuario_atualizador );
          SET vAtualizar = 1;

          SELECT CASE
                 WHEN NEW.percentual >= 100 THEN 1
                 WHEN NEW.percentual < 100  THEN 2
              END  INTO vId_evento; 

          SET vEvento = CONCAT('Okr ', NEW.nome);

       ELSEIF OLD.ativo = 0 THEN -- foi reativado

          select CONCAT( 'Foi reativado o Objetivo ', NEW.nome, '. O progresso atual é de ', CAST(NEW.percentual as CHAR), '%')
                 INTO vComentario;
       
          INSERT INTO ttl_log_objetivos ( id_objetivos, progresso, comentario, data_avaliacao, usuario_atualizador )
                  values                ( OLD.id_objetivo, NEW.percentual, vComentario, NEW.data_atualizacao, NEW.usuario_atualizador );
          SET vAtualizar = 1;

       ELSEIF OLD.peso != NEW.peso THEN
       
          SET vAtualizar = 1; -- deve gerar pendência
          
       ELSEIF OLD.id_tipo_atualizacao = 1 AND ifnull(NEW.id_tipo_atualizacao,0) = 0 THEN

          SET vAtualizar = 1; -- deve gerar pendência

       END IF;

    ELSEIF (OLD.ativo = 1) THEN -- foi excluido

       SET vId_evento = 0;

       SET vEvento = CONCAT('Okr Cancelado', NEW.nome);

       select CONCAT( 'Foi excluído o Objetivo ', NEW.nome, '.') INTO vComentario;
       
       INSERT INTO ttl_log_objetivos ( id_objetivos, progresso, comentario, data_avaliacao, usuario_atualizador )
               values                ( OLD.id_objetivo, NEW.percentual, vComentario, NEW.data_atualizacao, NEW.usuario_atualizador );

       SET vAtualizar = 1;

       SET vExclusao  = 1;

    END IF; 

    IF vId_evento != -1 THEN


       INSERT INTO ttl_eventos_usuario ( id_usuario, id_evento, evento, lido, data_status)
      --  Atualização Daniel Kafruni 11/08
		--         select id_usuario, vId_evento, vEvento, 0, NEW.data_atualizacao
                 select id_usuario, vId_evento, vComentario, 0, NEW.data_atualizacao
		            from ttl_obj_responsaveis
                     where id_objetivo = NEW.id_objetivo;

       INSERT INTO ttl_eventos_usuario ( id_usuario, id_evento, evento, lido, data_status)
      	--  Atualização Daniel Kafruni 11/08	
         --        values (NEW.responsavel, vId_evento, vEvento, 0, NEW.data_atualizacao);
								values (NEW.responsavel, vId_evento, vComentario, 0, NEW.data_atualizacao);	

    END IF;

    IF (vAtualizar != 0) THEN

       SET vAProcessar = 0;

       SELECT count(*) INTO vAProcessar from ttl_obj_a_atualizar WHERE id_objetivo_pai = OLD.id_objetivo and processado in (0,-1);

       IF (vAProcessar = 0) THEN
          SET vProcessado = 0;
       ELSE
          SET vProcessado = -1;
       END IF;

       IF (vProcessado = 0 AND vExclusao  = 1) THEN
          SELECT count(*) INTO vAProcessar from ttl_obj_a_atualizar 
               WHERE id_objetivo = NEW.parent_id 
                 and exclusao = 1 
                 and processado in (0,-1);
          IF (vAProcessar > 0) THEN
             SET vProcessado = -1;
          END IF;
       END IF;

       INSERT INTO ttl_obj_a_atualizar ( id_objetivo, id_objetivo_pai, data_atualizacao, usuario_atualizador, exclusao, processado )
               values                  ( OLD.id_objetivo, OLD.parent_id, NEW.data_atualizacao, NEW.usuario_atualizador, vExclusao, vProcessado );

    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_pendencias_etiq`
--

DROP TABLE IF EXISTS `ttl_pendencias_etiq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_pendencias_etiq` (
  `id_pendencias_etiq` int(11) NOT NULL AUTO_INCREMENT,
  `id_etiqueta` int(11) NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `data_pendencia` datetime NOT NULL,
  `tipo_pendencia` int(11) NOT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `processado` int(11) NOT NULL,
  PRIMARY KEY (`id_pendencias_etiq`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_pendencias_etiq`
--

LOCK TABLES `ttl_pendencias_etiq` WRITE;
/*!40000 ALTER TABLE `ttl_pendencias_etiq` DISABLE KEYS */;
INSERT INTO `ttl_pendencias_etiq` VALUES (30,61,187,'2017-10-05 17:08:39',1,91,1),(31,62,188,'2017-10-05 17:10:35',1,91,1),(32,63,189,'2017-10-05 17:12:20',1,91,1),(33,64,190,'2017-10-05 17:13:59',1,91,1),(34,61,191,'2017-10-05 17:16:34',1,91,1),(35,62,192,'2017-10-05 17:17:53',1,91,1),(36,65,193,'2017-10-05 17:20:08',1,91,1),(37,61,194,'2017-10-05 17:24:31',3,91,1),(38,61,195,'2017-10-05 17:27:05',3,91,1),(39,62,196,'2017-10-05 17:31:22',3,91,1),(40,62,197,'2017-10-05 17:32:20',3,91,1),(41,62,198,'2017-10-05 17:33:30',3,91,1),(42,62,199,'2017-10-05 17:36:38',3,91,1),(43,63,200,'2017-10-05 17:54:27',3,92,1),(44,63,201,'2017-10-05 17:55:21',3,92,1),(45,64,202,'2017-10-05 18:06:24',3,91,1),(46,61,203,'2017-10-05 18:09:21',3,91,1),(47,61,204,'2017-10-05 18:10:09',3,91,1),(48,61,205,'2017-10-05 18:10:49',3,91,1),(49,62,206,'2017-10-05 18:43:11',3,91,1),(50,65,207,'2017-10-05 18:44:10',3,92,1),(51,62,208,'2017-10-05 18:44:42',3,91,1);
/*!40000 ALTER TABLE `ttl_pendencias_etiq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_rchave_anexos`
--

DROP TABLE IF EXISTS `ttl_rchave_anexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rchave_anexos` (
  `id_anexo` int(11) NOT NULL AUTO_INCREMENT,
  `id_rchave_medicao` int(11) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `anexo` varchar(500) NOT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_anexo`),
  KEY `FK__ttl_usuario_atv_rchave` (`usuario_atualizador`),
  KEY `FK__ttl_atividades_atv_rchave` (`id_rchave_medicao`),
  CONSTRAINT `FK__ttl_atividades_atv_rchave` FOREIGN KEY (`id_rchave_medicao`) REFERENCES `ttl_rchave_medicoes` (`id_medicao`),
  CONSTRAINT `FK__ttl_usuario_atv_rchave` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Vinculação de anexos aos resultados chave.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rchave_anexos`
--

LOCK TABLES `ttl_rchave_anexos` WRITE;
/*!40000 ALTER TABLE `ttl_rchave_anexos` DISABLE KEYS */;
INSERT INTO `ttl_rchave_anexos` VALUES (5,126,'https://app.elofy.com.br/assets/empresa/61/keys/53/medicao/9tqnonkPoUa5CgAvZStrPvyp0xHTaDp5zhuno0uR.zip','9tqnonkPoUa5CgAvZStrPvyp0xHTaDp5zhuno0uR.zip',92,'2017-10-06 14:01:25');
/*!40000 ALTER TABLE `ttl_rchave_anexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_rchave_medicoes`
--

DROP TABLE IF EXISTS `ttl_rchave_medicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rchave_medicoes` (
  `id_medicao` int(11) NOT NULL AUTO_INCREMENT,
  `id_resultado_chave` int(11) NOT NULL,
  `data_medicao` date NOT NULL,
  `medicao` double DEFAULT NULL,
  `comentario` varchar(4000) DEFAULT NULL,
  `usuario_atualizador` int(11) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_medicao`),
  KEY `FK__ttl_usuario2` (`usuario_atualizador`),
  KEY `FK_ttl_rchave_medicoes_ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `FK__ttl_usuario2` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_rchave_medicoes_ttl_resultados_chave` FOREIGN KEY (`id_resultado_chave`) REFERENCES `ttl_resultados_chave` (`id_resultado_chave`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='Tabela de controle de medições, ao definir um rsultado chave é definida a frequencia de apuração para cada apuração é aberta uma linha para informação de meta (previsão) e medição (real).';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rchave_medicoes`
--

LOCK TABLES `ttl_rchave_medicoes` WRITE;
/*!40000 ALTER TABLE `ttl_rchave_medicoes` DISABLE KEYS */;
INSERT INTO `ttl_rchave_medicoes` VALUES (125,45,'2017-10-06',20,'Features in process of documentation',91,'2017-10-06 13:14:52'),(126,53,'2017-10-06',1,'Avaliei a Appus - HR Analytics em anexo dossiê com telas importantes.',92,'2017-10-06 14:01:25'),(127,54,'2017-10-06',1,'Identificada necessidade de reduzir cliques, apresentar objetivos, resultados chave e atividade na mesma tela, menções em canais,  atualização de consulta na lista de okr, exibição de filtros e atualização de consulta na lista de okr. ',91,'2017-10-06 14:06:07'),(128,49,'2017-10-06',1,'Blog atualizado e publicado no face e linkedin',91,'2017-10-06 15:14:22'),(129,50,'2017-10-06',1,'Publica post apontando para o blog',91,'2017-10-06 15:15:05');
/*!40000 ALTER TABLE `ttl_rchave_medicoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER `tai_ttl_rchave_medicoes` AFTER INSERT ON `ttl_rchave_medicoes` FOR EACH ROW BEGIN

    DECLARE negativo CONDITION FOR SQLSTATE '45000';
    DECLARE vData_medicao DATETIME;

    IF NEW.medicao IS NOT NULL THEN

       SELECT MAX(data_medicao) INTO vData_medicao from ttl_rchave_medicoes
          where id_resultado_chave = NEW.id_resultado_chave
           and  medicao IS NOT NULL;

       IF ( vData_medicao <= NEW.data_medicao ) THEN
     
          UPDATE ttl_resultados_chave set medicao = NEW.medicao
             where id_resultado_chave = NEW.id_resultado_chave;

       END IF;

   END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_rchave_medicoes_gab`
--

DROP TABLE IF EXISTS `ttl_rchave_medicoes_gab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rchave_medicoes_gab` (
  `id_medicao` int(11) NOT NULL AUTO_INCREMENT,
  `id_resultado_chave` int(11) NOT NULL,
  `data_medicao` datetime NOT NULL,
  `medicao` double DEFAULT NULL,
  PRIMARY KEY (`id_medicao`),
  KEY `FK_ttl_rchave_medicoes_ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `ttl_rchave_medicoes_gab_ibfk_2` FOREIGN KEY (`id_resultado_chave`) REFERENCES `ttl_resultados_chave` (`id_resultado_chave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Tabela de controle de medições, ao definir um rsultado chave é definida a frequencia de apuração para cada apuração é aberta uma linha para informação de meta (previsão) e medição (real).';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rchave_medicoes_gab`
--

LOCK TABLES `ttl_rchave_medicoes_gab` WRITE;
/*!40000 ALTER TABLE `ttl_rchave_medicoes_gab` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_rchave_medicoes_gab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_rchave_responsaveis`
--

DROP TABLE IF EXISTS `ttl_rchave_responsaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rchave_responsaveis` (
  `id_responsavel` int(11) NOT NULL AUTO_INCREMENT,
  `id_resultado_chave` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_time` int(11) DEFAULT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_responsavel`,`id_resultado_chave`),
  KEY `FK_ttl_rchave_responsaveis_ttl_usuario` (`id_usuario`),
  KEY `FK_ttl_rchave_responsaveis_ttl_empresa_unidades` (`id_time`),
  KEY `FK_ttl_rchave_responsaveis_ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `FK_ttl_rchave_responsaveis_ttl_empresa_unidades` FOREIGN KEY (`id_time`) REFERENCES `ttl_empresa_times` (`id_time`),
  CONSTRAINT `FK_ttl_rchave_responsaveis_ttl_resultados_chave` FOREIGN KEY (`id_resultado_chave`) REFERENCES `ttl_resultados_chave` (`id_resultado_chave`),
  CONSTRAINT `FK_ttl_rchave_responsaveis_ttl_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='Responsáveis pelos resultados chave.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rchave_responsaveis`
--

LOCK TABLES `ttl_rchave_responsaveis` WRITE;
/*!40000 ALTER TABLE `ttl_rchave_responsaveis` DISABLE KEYS */;
INSERT INTO `ttl_rchave_responsaveis` VALUES (56,59,92,37,'2017-10-05 18:48:27');
/*!40000 ALTER TABLE `ttl_rchave_responsaveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_rel_obj`
--

DROP TABLE IF EXISTS `ttl_rel_obj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rel_obj` (
  `id_rel_obj` int(11) NOT NULL AUTO_INCREMENT,
  `data_execucao` date NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(250) NOT NULL,
  `id_time` int(11) NOT NULL,
  `nome_time` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `id_janela` int(11) NOT NULL,
  `descricao_janela` varchar(15) NOT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `nome_ciclo` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `objetivo_pai` varchar(200) DEFAULT NULL,
  `id_objetivo` int(11) NOT NULL,
  `nome_objetivo` varchar(200) NOT NULL,
  `data_ini_objetivo` datetime NOT NULL,
  `data_fim_objetivo` datetime NOT NULL,
  `progresso_objetivo` double NOT NULL,
  `descricao_objetivo` varchar(1000) DEFAULT NULL,
  `percentual_avaliacao` double DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `id_tipo_avaliacao` int(11) DEFAULT NULL,
  `qtd_objetivos` int(11) DEFAULT NULL,
  `qtd_atividades` int(11) DEFAULT NULL,
  `qtd_rchaves` int(11) DEFAULT NULL,
  `publico` char(1) DEFAULT NULL,
  `situacao` int(11) NOT NULL,
  `descr_situacao` varchar(30) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `descr_avaliacao` varchar(30) NOT NULL,
  `destaque` char(1) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `data_atualiz_obj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualiz_obj` int(11) NOT NULL,
  `ativo` int(1) NOT NULL,
  `hierarquia_times` varchar(4000) DEFAULT NULL,
  `corresponsaveis` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id_rel_obj`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rel_obj`
--

LOCK TABLES `ttl_rel_obj` WRITE;
/*!40000 ALTER TABLE `ttl_rel_obj` DISABLE KEYS */;
INSERT INTO `ttl_rel_obj` VALUES (1,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',187,'Ter aplicativos para IOS e ANDROID',194,'Mapear funcionalidades que devem estar contempladas no aplicativo','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Mapear funcionalidades que deve estar contempladas no aplicativo',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;'),(2,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',187,'Ter aplicativos para IOS e ANDROID',195,'Desenvolver aplicativos IOS e Android','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir empresa responsável, cronograma e desenvolver aplicativo.',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;'),(3,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',188,'Ter documentação técnica do produto',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,1,0,0,3,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;'),(4,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',188,'Ter documentação técnica do produto',197,'Manter blog atualizado','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Manter o blog atualizado',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;'),(5,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',188,'Ter documentação técnica do produto',198,'Criar planos templates de comunicação com clientes','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Estrutura um plano de respostas padrão para o relacionamento com clientes.',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;'),(6,'2017-10-05',61,'Elofy',37,'elofy',93,'Eduardo Stein',76,'2017',285,'4º trimestre',188,'Ter documentação técnica do produto',199,'Ter documentação de objetos do modelos de banco de dados','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter documentação de objetos do modelos de banco de dados',0,1,0,0,1,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 19:15:36',91,1,'','92:Eduardo Kafruni;'),(7,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',189,'Posicionar o produto em mídias sociais',200,'Manter redes sociais com posts recentes ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Produzir e atualizar posts semanalmente',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',92,1,'',''),(8,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',189,'Posicionar o produto em mídias sociais',201,'Manter e acompanhar as mídias patrocinadas no google','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Manter e acompanhar as mídias patrocinadas no google',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',92,1,'',''),(9,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',190,'Estruturar e gerenciar base de clientes',202,'Implantar software de CRM','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Impantar software de crm ',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','91:Daniel Kafruni de Oliveira;'),(10,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',191,'Organizar roadmap de novas funcionalidades',203,'Realizar benchmarking frequente dos concorrentes','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Realizar acompanhamento periódico dos principais fornecedores.',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'',''),(11,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',191,'Organizar roadmap de novas funcionalidades',204,'Identificar falhas de navegação, design e usabilidade do elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Identificar falhas de navegação, design e usabilidade do elofy',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'',''),(12,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',191,'Organizar roadmap de novas funcionalidades',205,'Definir entre as sugestões de melhoria quais devem ser implementadas e ordem','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir entre as sugestões de melhoria quais devem ser implementadas e ordem',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'',''),(13,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',192,'Produzir Artefatos de Marketing',206,'Implantar e estruturar plano de mail marketing','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir software e estruturar plano de mail marketing',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:48:44',91,1,'',''),(14,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',193,'Estruturar equipe interna de desenvolvimento',207,'Ter uma equipe autônoma ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter uma equipe autônoma ',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:48:29',92,1,'',''),(15,'2017-10-05',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',76,'2017',285,'4º trimestre',192,'Produzir Artefatos de Marketing',208,'Desenvolver vídeo de divulgação do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Produzir vídeo animado de divulgação do elofy',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 19:39:48',91,1,'','91:Daniel Kafruni de Oliveira;'),(16,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',187,'Ter aplicativos para IOS e ANDROID',194,'Mapear funcionalidades que devem estar contempladas no aplicativo','2017-10-01 00:00:00','2017-12-31 00:00:00',20,'Mapear funcionalidades que deve estar contempladas no aplicativo',0,1,0,0,1,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 13:17:24',91,1,'','92:Eduardo Kafruni;'),(17,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',76,'2017',285,'4º trimestre',188,'Ter documentação técnica do produto',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,1,0,0,3,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:15:10',91,1,'',''),(18,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',188,'Ter documentação técnica do produto',197,'Manter blog atualizado','2017-10-01 00:00:00','2017-12-31 00:00:00',7,'Manter o blog atualizado',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 15:14:22',91,1,'','92:Eduardo Kafruni;'),(19,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',189,'Posicionar o produto em mídias sociais',200,'Manter redes sociais com posts recentes ','2017-10-01 00:00:00','2017-12-31 00:00:00',7,'Produzir e atualizar posts semanalmente',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 15:15:05',92,1,'',''),(20,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',76,'2017',285,'4º trimestre',191,'Organizar roadmap de novas funcionalidades',203,'Realizar benchmarking frequente dos concorrentes','2017-10-01 00:00:00','2017-12-31 00:00:00',17,'Realizar acompanhamento periódico dos principais fornecedores.',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 20:16:26',91,1,'',''),(21,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',76,'2017',285,'4º trimestre',191,'Organizar roadmap de novas funcionalidades',204,'Identificar falhas de navegação, design e usabilidade do elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',8,'Identificar falhas de navegação, design e usabilidade do elofy',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 14:06:07',92,1,'',''),(22,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',76,'2017',285,'4º trimestre',193,'Estruturar equipe interna de desenvolvimento',207,'Ter uma equipe autônoma ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter uma equipe autônoma ',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:16:59',92,1,'','');
/*!40000 ALTER TABLE `ttl_rel_obj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_rel_obj_atividade`
--

DROP TABLE IF EXISTS `ttl_rel_obj_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rel_obj_atividade` (
  `id_rel_obj_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `data_execucao` date NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(250) NOT NULL,
  `id_time` int(11) NOT NULL,
  `nome_time` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `nome_objetivo` varchar(200) NOT NULL,
  `data_ini_objetivo` datetime NOT NULL,
  `data_fim_objetivo` datetime NOT NULL,
  `progresso_objetivo` double NOT NULL,
  `descricao_objetivo` varchar(1000) DEFAULT NULL,
  `percentual_avaliacao` double DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `objetivo_pai` varchar(200) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `id_tipo_avaliacao` int(11) DEFAULT NULL,
  `qtd_objetivos` int(11) DEFAULT NULL,
  `qtd_atividades` int(11) DEFAULT NULL,
  `qtd_rchaves` int(11) DEFAULT NULL,
  `publico` char(1) DEFAULT NULL,
  `situacao` int(11) NOT NULL,
  `descr_situacao` varchar(30) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `descr_avaliacao` varchar(30) NOT NULL,
  `destaque` char(1) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `data_atualiz_obj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualiz_obj` int(11) NOT NULL,
  `ativo` int(1) NOT NULL,
  `hierarquia_times` varchar(4000) DEFAULT NULL,
  `corresponsaveis` varchar(4000) DEFAULT NULL,
  `id_resultado_chave` int(11) DEFAULT NULL,
  `nome_RChave` varchar(150) DEFAULT NULL,
  `descr_RChave` varchar(4000) DEFAULT NULL,
  `frequencia_RChave` varchar(1) DEFAULT NULL,
  `unidade_meta_RChave` varchar(50) DEFAULT NULL,
  `meta_final_prev_RChave` double DEFAULT NULL,
  `medicao_RChave` double DEFAULT NULL,
  `peso_RChave` int(11) DEFAULT NULL,
  `progresso_RChave` double DEFAULT NULL,
  `responsavel_RChave` int(11) DEFAULT NULL,
  `nome_resp_RChave` varchar(250) DEFAULT NULL,
  `corresponsaveis_RChave` varchar(4000) DEFAULT NULL,
  `publico_RChave` varchar(1) DEFAULT NULL,
  `situacao_RChave` int(11) DEFAULT NULL,
  `descr_situacao_RChave` varchar(30) DEFAULT NULL,
  `data_atualiz_RChave` datetime DEFAULT NULL,
  `usuario_atualiz_RChave` int(11) DEFAULT NULL,
  `ativo_RChave` varchar(50) DEFAULT NULL,
  `id_atividade` int(11) NOT NULL,
  `nome_atividade` varchar(150) NOT NULL,
  `descr_atividade` varchar(400) DEFAULT NULL,
  `data_ini_ativ` datetime DEFAULT NULL,
  `data_fim_ativ` datetime DEFAULT NULL,
  `hora_ativ` int(11) DEFAULT NULL,
  `id_tipo_ativ` int(11) DEFAULT NULL,
  `nome_tipo_ativ` varchar(100) DEFAULT NULL,
  `data_fim_real_ativ` date DEFAULT NULL,
  `situacao_ativ` char(1) DEFAULT NULL,
  `descr_situacao_ativ` varchar(30) DEFAULT NULL,
  `progresso_ativ` double DEFAULT NULL,
  `id_responsavel_ativ` int(11) DEFAULT NULL,
  `responsavel_ativ` varchar(250) DEFAULT NULL,
  `corresponsaveis_ativ` varchar(4000) DEFAULT NULL,
  `data_atualiz_ativ` datetime DEFAULT NULL,
  `usuario_atualiz_ativ` int(11) DEFAULT NULL,
  `ativo_ativ` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_rel_obj_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rel_obj_atividade`
--

LOCK TABLES `ttl_rel_obj_atividade` WRITE;
/*!40000 ALTER TABLE `ttl_rel_obj_atividade` DISABLE KEYS */;
INSERT INTO `ttl_rel_obj_atividade` VALUES (1,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,188,'Ter documentação técnica do produto',1,0,0,3,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',70,'Avaliar modelo de softwares concorrentes','Avaliar modelo de softwares concorrentes','2017-10-05 00:00:00','2017-10-13 00:00:00',8,NULL,NULL,NULL,'0','Pendente',0,92,'Eduardo Kafruni','','2017-10-05 17:42:30',91,1),(2,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,188,'Ter documentação técnica do produto',1,0,0,3,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',71,'Definir o padrão de manual','Definir o modelo padrão de manual','2017-10-09 00:00:00','2017-10-13 00:00:00',32,NULL,NULL,NULL,'0','Pendente',0,92,'Eduardo Kafruni','','2017-10-05 17:43:44',91,1),(3,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,188,'Ter documentação técnica do produto',1,0,0,3,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',72,'Produzir Manuais','Desenvolver manuais para todas as funcionalidades','2017-10-13 00:00:00','2017-10-30 00:00:00',60,NULL,NULL,NULL,'0','Pendente',0,92,'Eduardo Kafruni','','2017-10-05 17:44:31',91,1),(4,'2017-10-05',61,'Elofy',37,'elofy',93,'Eduardo Stein',199,'Ter documentação de objetos do modelos de banco de dados','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter documentação de objetos do modelos de banco de dados',0,188,'Ter documentação técnica do produto',1,0,0,1,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 19:15:36',91,1,'','92:Eduardo Kafruni;',56,'Ter 100% documentados todas as funções, procederes, triggers e eventos','Ter 100% documentados todas as funções, procederes, triggers e eventos','4','%',100,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:24:09',91,'1',73,'Criar documento sobre procedures, funções, triggers e eventos','Identificar porque existem, qual a aplicação.','2017-10-05 00:00:00','2017-10-31 00:00:00',20,NULL,NULL,NULL,'0','Pendente',0,93,'Eduardo Stein','','2017-10-05 19:15:26',91,1),(8,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,188,'Ter documentação técnica do produto',1,0,0,3,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:15:10',91,1,'','',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',70,'Avaliar modelo de manuais de softwares concorrentes','Avaliar modelo de  manuais de softwares concorrentes','2017-10-05 00:00:00','2017-10-13 00:00:00',8,NULL,NULL,NULL,'0','Pendente',0,92,'Eduardo Kafruni','','2017-10-06 18:41:27',92,1),(9,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,188,'Ter documentação técnica do produto',1,0,0,3,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:15:10',91,1,'','',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',71,'Definir o padrão de manual','Definir o modelo padrão de manual','2017-10-09 00:00:00','2017-10-13 00:00:00',32,NULL,NULL,NULL,'0','Pendente',40,92,'Eduardo Kafruni','','2017-10-06 18:32:32',92,1),(10,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,188,'Ter documentação técnica do produto',1,0,0,3,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:15:10',91,1,'','',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',72,'Produzir Manuais','Desenvolver manuais para todas as funcionalidades','2017-10-13 00:00:00','2017-10-30 00:00:00',60,NULL,NULL,NULL,'0','Pendente',0,92,'Eduardo Kafruni','','2017-10-05 17:44:31',91,1),(11,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',194,'Mapear funcionalidades que devem estar contempladas no aplicativo','2017-10-01 00:00:00','2017-12-31 00:00:00',20,'Mapear funcionalidades que deve estar contempladas no aplicativo',0,187,'Ter aplicativos para IOS e ANDROID',1,0,0,1,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 13:17:24',91,1,'','92:Eduardo Kafruni;',45,'Ter 100% das funcionalidades necessárias para aplicativo mapeadas','A partir do que se tem hoje e, do que se tem disponível em concorrentes documentar lista de funcionalidades necessárias para app.','4','%',100,20,1,20,91,'Daniel Kafruni de Oliveira','','N',4,'Em Andamento','2017-10-06 13:14:52',91,'1',74,'task 1','task 2','2017-10-06 00:00:00','2017-10-09 00:00:00',8,NULL,NULL,NULL,'0','Pendente',0,93,'Eduardo Stein','','2017-10-06 13:17:19',91,1);
/*!40000 ALTER TABLE `ttl_rel_obj_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_rel_obj_rchave`
--

DROP TABLE IF EXISTS `ttl_rel_obj_rchave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_rel_obj_rchave` (
  `id_rel_obj_rchave` int(11) NOT NULL AUTO_INCREMENT,
  `data_execucao` date NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(250) NOT NULL,
  `id_time` int(11) NOT NULL,
  `nome_time` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `objetivo_pai` varchar(200) DEFAULT NULL,
  `id_objetivo` int(11) NOT NULL,
  `nome_objetivo` varchar(200) NOT NULL,
  `data_ini_objetivo` datetime NOT NULL,
  `data_fim_objetivo` datetime NOT NULL,
  `progresso_objetivo` double NOT NULL,
  `descricao_objetivo` varchar(1000) DEFAULT NULL,
  `percentual_avaliacao` double DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `id_tipo_avaliacao` int(11) DEFAULT NULL,
  `qtd_objetivos` int(11) DEFAULT NULL,
  `qtd_atividades` int(11) DEFAULT NULL,
  `qtd_rchaves` int(11) DEFAULT NULL,
  `publico` char(1) DEFAULT NULL,
  `situacao` int(11) NOT NULL,
  `descr_situacao` varchar(30) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `descr_avaliacao` varchar(30) NOT NULL,
  `destaque` char(1) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `data_atualiz_obj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualiz_obj` int(11) NOT NULL,
  `ativo` int(1) NOT NULL,
  `hierarquia_times` varchar(4000) DEFAULT NULL,
  `corresponsaveis` varchar(4000) DEFAULT NULL,
  `id_resultado_chave` int(11) DEFAULT NULL,
  `nome_RChave` varchar(150) DEFAULT NULL,
  `descr_RChave` varchar(4000) DEFAULT NULL,
  `frequencia_RChave` varchar(1) DEFAULT NULL,
  `unidade_meta_RChave` varchar(50) DEFAULT NULL,
  `meta_final_prev_RChave` double DEFAULT NULL,
  `medicao_RChave` double DEFAULT NULL,
  `peso_RChave` int(11) DEFAULT NULL,
  `progresso_RChave` double DEFAULT NULL,
  `responsavel_RChave` int(11) DEFAULT NULL,
  `nome_resp_RChave` varchar(250) DEFAULT NULL,
  `corresponsaveis_RChave` varchar(4000) DEFAULT NULL,
  `publico_RChave` varchar(1) DEFAULT NULL,
  `situacao_RChave` int(11) DEFAULT NULL,
  `descr_situacao_RChave` varchar(30) DEFAULT NULL,
  `data_atualiz_RChave` datetime DEFAULT NULL,
  `usuario_atualiz_RChave` int(11) DEFAULT NULL,
  `ativo_RChave` varchar(50) DEFAULT NULL,
  `id_medicao` int(11) DEFAULT NULL,
  `data_medicao` date DEFAULT NULL,
  `medicao` double DEFAULT NULL,
  `comentario` varchar(4000) DEFAULT NULL,
  `usuario_atualiz_medicao` int(11) DEFAULT NULL,
  `data_atualiz_medicao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rel_obj_rchave`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_rel_obj_rchave`
--

LOCK TABLES `ttl_rel_obj_rchave` WRITE;
/*!40000 ALTER TABLE `ttl_rel_obj_rchave` DISABLE KEYS */;
INSERT INTO `ttl_rel_obj_rchave` VALUES (4,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',187,'Ter aplicativos para IOS e ANDROID',194,'Mapear funcionalidades que devem estar contempladas no aplicativo','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Mapear funcionalidades que deve estar contempladas no aplicativo',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',45,'Ter 100% das funcionalidades necessárias para aplicativo mapeadas','A partir do que se tem hoje e, do que se tem disponível em concorrentes documentar lista de funcionalidades necessárias para app.','4','%',100,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 17:29:07',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(5,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',187,'Ter aplicativos para IOS e ANDROID',195,'Desenvolver aplicativos IOS e Android','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir empresa responsável, cronograma e desenvolver aplicativo.',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',46,'Entregar aplicativos para IOS e Android 100% finalizado','Entregar aplicativos para IOS e Android 100% finalizado','4','%',100,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 17:30:33',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(6,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',188,'Ter documentação técnica do produto',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,1,0,0,3,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(7,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',188,'Ter documentação técnica do produto',197,'Manter blog atualizado','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Manter o blog atualizado',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',49,'Manter ao menos uma publicação semanal até o final de 2017','Manter ao menos uma publicação semanal até o final de 2017','2','qtd',15,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 17:49:31',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(8,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',188,'Ter documentação técnica do produto',198,'Criar planos templates de comunicação com clientes','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Estrutura um plano de respostas padrão para o relacionamento com clientes.',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','92:Eduardo Kafruni;',48,'Ter modelos de resposta diferentes para primeiro contato, solicitação de proposta e teste do produto','Ter modelos de resposta diferentes para primeiro contato, solicitação de proposta e teste do produto','4','qtd',3,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 17:48:25',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(9,'2017-10-05',61,'Elofy',37,'elofy',93,'Eduardo Stein',188,'Ter documentação técnica do produto',199,'Ter documentação de objetos do modelos de banco de dados','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter documentação de objetos do modelos de banco de dados',0,1,0,0,1,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 19:15:36',91,1,'','92:Eduardo Kafruni;',56,'Ter 100% documentados todas as funções, procederes, triggers e eventos','Ter 100% documentados todas as funções, procederes, triggers e eventos','4','%',100,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:24:09',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(10,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',189,'Posicionar o produto em mídias sociais',200,'Manter redes sociais com posts recentes ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Produzir e atualizar posts semanalmente',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',92,1,'','',50,'Produzir ao menos um post por semana','Produzir ao menos um post por semana','2','qtd',15,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 17:56:32',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(11,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',189,'Posicionar o produto em mídias sociais',201,'Manter e acompanhar as mídias patrocinadas no google','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Manter e acompanhar as mídias patrocinadas no google',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',92,1,'','',51,'Manter uma media de um minimo de 10 novos usuarios por semana','Manter uma media de um minimo de 10 novos usuarios por semana','2','qtd',10,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:03:17',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(12,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',190,'Estruturar e gerenciar base de clientes',202,'Implantar software de CRM','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Impantar software de crm ',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','91:Daniel Kafruni de Oliveira;',52,'Ter 100% do ciclo de vida dos clientes em uma ferramenta de CRM','Ter 100% do ciclo de vida dos clientes em uma ferramenta de CRM','4','%',100,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:07:38',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(13,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',191,'Organizar roadmap de novas funcionalidades',203,'Realizar benchmarking frequente dos concorrentes','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Realizar acompanhamento periódico dos principais fornecedores.',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','',53,'Analisar ao menos um concorrente por quinzena ate o final de 2017','Fazer trials de produtos, analisar funcionalidades, e as diferenças para o elofy.','2','qtd',6,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:26:43',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(14,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',191,'Organizar roadmap de novas funcionalidades',204,'Identificar falhas de navegação, design e usabilidade do elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Identificar falhas de navegação, design e usabilidade do elofy',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','',54,'Relatar falhas encontradas semanalmente ate o final de 2017','Relatar falhas encontradas semanalmente','2','qtd',13,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:23:04',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(15,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',191,'Organizar roadmap de novas funcionalidades',205,'Definir entre as sugestões de melhoria quais devem ser implementadas e ordem','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir entre as sugestões de melhoria quais devem ser implementadas e ordem',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:40:44',91,1,'','',55,'Atualizar o mapa de melhorias semanalmente até o final de 2017','Organizar e produzir sugestões de melhorias com o intuito de tornar a implementação das mesmas mais relevantes ao produto.','2','qtd',13,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:21:17',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(16,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',192,'Produzir Artefatos de Marketing',206,'Implantar e estruturar plano de mail marketing','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir software e estruturar plano de mail marketing',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:48:44',91,1,'','',57,'Ter 1 banco de dados com informações de contato dos clientes ','Ter banco de dados com informações de contato dos cliente','4','qtd',1,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:46:38',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(17,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',192,'Produzir Artefatos de Marketing',206,'Implantar e estruturar plano de mail marketing','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Definir software e estruturar plano de mail marketing',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:48:44',91,1,'','',60,'Estruturar plano de mail marketing a cada quinzena até o final de 2017','Estruturar plano de mail marketing a cada quinzena até o final de 2017','2','qtd',6,NULL,1,0,91,'Daniel Kafruni de Oliveira','','N',1,'Pendente','2017-10-05 18:49:06',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(18,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',193,'Estruturar equipe interna de desenvolvimento',207,'Ter uma equipe autônoma ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter uma equipe autônoma ',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:48:29',92,1,'','',58,'Terminar capacitação em php ate o final de 2017','Terminar capacitação em php ate o final de 2017','2','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 18:46:54',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(19,'2017-10-05',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',193,'Estruturar equipe interna de desenvolvimento',207,'Ter uma equipe autônoma ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter uma equipe autônoma ',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 18:48:29',92,1,'','',59,'Realizar ao menos uma customização no elofy ate o final de 2017','Realizar ao menos uma customização no elofy ate o final de 2017','4','qtd',1,NULL,1,0,92,'Eduardo Kafruni','92:Eduardo Kafruni;','N',1,'Pendente','2017-10-05 18:48:27',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(20,'2017-10-05',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',192,'Produzir Artefatos de Marketing',208,'Desenvolver vídeo de divulgação do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Produzir vídeo animado de divulgação do elofy',0,1,0,0,0,1,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-05 19:39:48',91,1,'','91:Daniel Kafruni de Oliveira;',61,'Produzir um vídeo de divulgação elofy até o o final de 2017','Produzir um vídeo de divulgação elofy até o o final de 2017','4','qtd',1,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 18:50:33',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(35,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',187,'Ter aplicativos para IOS e ANDROID',194,'Mapear funcionalidades que devem estar contempladas no aplicativo','2017-10-01 00:00:00','2017-12-31 00:00:00',20,'Mapear funcionalidades que deve estar contempladas no aplicativo',0,1,0,0,1,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 13:17:24',91,1,'','92:Eduardo Kafruni;',45,'Ter 100% das funcionalidades necessárias para aplicativo mapeadas','A partir do que se tem hoje e, do que se tem disponível em concorrentes documentar lista de funcionalidades necessárias para app.','4','%',100,20,1,20,91,'Daniel Kafruni de Oliveira','','N',4,'Em Andamento','2017-10-06 13:14:52',91,'1',125,'2017-10-06',20,'Features in process of documentation',91,'2017-10-06 13:14:52'),(36,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',191,'Organizar roadmap de novas funcionalidades',203,'Realizar benchmarking frequente dos concorrentes','2017-10-01 00:00:00','2017-12-31 00:00:00',17,'Realizar acompanhamento periódico dos principais fornecedores.',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 20:16:26',91,1,'','',53,'Analisar ao menos um concorrente por quinzena ate o final de 2017','Fazer trials de produtos, analisar funcionalidades, e as diferenças para o elofy.','2','qtd',6,1,1,17,92,'Eduardo Kafruni','','N',4,'Em Andamento','2017-10-06 14:01:25',91,'1',126,'2017-10-06',1,'Avaliei a Appus - HR Analytics em anexo dossiê com telas importantes.',92,'2017-10-06 14:01:25'),(37,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',191,'Organizar roadmap de novas funcionalidades',204,'Identificar falhas de navegação, design e usabilidade do elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',8,'Identificar falhas de navegação, design e usabilidade do elofy',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 14:06:07',92,1,'','',54,'Relatar falhas encontradas semanalmente ate o final de 2017','Relatar falhas encontradas semanalmente','2','qtd',13,1,1,8,91,'Daniel Kafruni de Oliveira','','N',4,'Em Andamento','2017-10-06 14:06:07',92,'1',127,'2017-10-06',1,'Identificada necessidade de reduzir cliques, apresentar objetivos, resultados chave e atividade na mesma tela, menções em canais,  atualização de consulta na lista de okr, exibição de filtros e atualização de consulta na lista de okr. ',91,'2017-10-06 14:06:07'),(38,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',188,'Ter documentação técnica do produto',197,'Manter blog atualizado','2017-10-01 00:00:00','2017-12-31 00:00:00',7,'Manter o blog atualizado',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 15:14:22',91,1,'','92:Eduardo Kafruni;',49,'Manter ao menos uma publicação semanal até o final de 2017','Manter ao menos uma publicação semanal até o final de 2017','2','qtd',15,1,1,7,91,'Daniel Kafruni de Oliveira','','N',4,'Em Andamento','2017-10-06 15:14:22',91,'1',128,'2017-10-06',1,'Blog atualizado e publicado no face e linkedin',91,'2017-10-06 15:14:22'),(39,'2017-10-06',61,'Elofy',37,'elofy',91,'Daniel Kafruni de Oliveira',189,'Posicionar o produto em mídias sociais',200,'Manter redes sociais com posts recentes ','2017-10-01 00:00:00','2017-12-31 00:00:00',7,'Produzir e atualizar posts semanalmente',0,1,0,0,0,1,'N',3,'Em Andamento',0,'Não Atingido','N','0','2017-10-06 15:15:05',92,1,'','',50,'Produzir ao menos um post por semana','Produzir ao menos um post por semana','2','qtd',15,1,1,7,91,'Daniel Kafruni de Oliveira','','N',4,'Em Andamento','2017-10-06 15:15:05',92,'1',129,'2017-10-06',1,'Publica post apontando para o blog',91,'2017-10-06 15:15:05'),(40,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',188,'Ter documentação técnica do produto',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,1,0,0,3,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:15:10',91,1,'','',47,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 17:41:46',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(41,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',188,'Ter documentação técnica do produto',196,'Criar manuais do Elofy','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Criar manuais do Elofy',0,1,0,0,3,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:15:10',91,1,'','',62,'Ter 1 video de capacitação do produto ','Validar ferramenta que salve a interface  e facilite a criação de um vídeo de treinamento','2','qtd',1,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-06 20:13:55',91,'1',NULL,NULL,NULL,NULL,NULL,NULL),(42,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',193,'Estruturar equipe interna de desenvolvimento',207,'Ter uma equipe autônoma ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter uma equipe autônoma ',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:16:59',92,1,'','',58,'Terminar capacitação em php ate o final de 2017','Terminar capacitação em php ate o final de 2017','2','%',100,NULL,1,0,92,'Eduardo Kafruni','','N',1,'Pendente','2017-10-05 18:46:54',92,'1',NULL,NULL,NULL,NULL,NULL,NULL),(43,'2017-10-06',61,'Elofy',37,'elofy',92,'Eduardo Kafruni',193,'Estruturar equipe interna de desenvolvimento',207,'Ter uma equipe autônoma ','2017-10-01 00:00:00','2017-12-31 00:00:00',0,'Ter uma equipe autônoma ',0,1,0,0,0,2,'N',0,'Pendente',0,'Não Atingido','N','0','2017-10-06 20:16:59',92,1,'','',59,'Realizar ao menos uma customização no elofy ate o final de 2017','Realizar ao menos uma customização no elofy ate o final de 2017','4','qtd',1,NULL,1,0,92,'Eduardo Kafruni','92:Eduardo Kafruni;','N',1,'Pendente','2017-10-05 18:48:27',92,'1',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ttl_rel_obj_rchave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_resultados_chave`
--

DROP TABLE IF EXISTS `ttl_resultados_chave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_resultados_chave` (
  `id_resultado_chave` int(11) NOT NULL AUTO_INCREMENT,
  `id_objetivo` int(11) NOT NULL,
  `nomeRChave` varchar(150) NOT NULL,
  `descricao` varchar(4000) DEFAULT NULL,
  `frequencia` varchar(1) NOT NULL COMMENT 'D1/S2/M3/B4/T5/A6',
  `unidade_meta` varchar(50) NOT NULL,
  `meta_final_prevista` double NOT NULL,
  `medicao` double DEFAULT NULL,
  `peso` int(11) NOT NULL,
  `progresso` double NOT NULL DEFAULT '0' COMMENT 'Medição/Meta',
  `progresso_ajustado` double DEFAULT NULL,
  `responsavel` int(11) NOT NULL,
  `publico` varchar(1) NOT NULL DEFAULT 'N' COMMENT 'S ou N',
  `situacao` enum('Pendente','Atingido','Não Atingido','Em Andamento') NOT NULL DEFAULT 'Pendente' COMMENT '0Pendente,1Finalizado, 2Cancelado, 3Em Andamento',
  `tipo_calculo` int(11) NOT NULL DEFAULT '0',
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL,
  `ativo` varchar(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_resultado_chave`,`id_objetivo`),
  KEY `FK_ttl_resultados_chave_ttl_objetivos_rchave` (`id_objetivo`),
  KEY `FK_ttl_resultados_chave_ttl_usuario_rchave` (`usuario_atualizador`),
  KEY `FK_ttl_resultados_chave_ttl_usuario` (`responsavel`),
  CONSTRAINT `FK_ttl_resultados_chave_ttl_objetivos_rchave` FOREIGN KEY (`id_objetivo`) REFERENCES `ttl_objetivos` (`id_objetivo`),
  CONSTRAINT `FK_ttl_resultados_chave_ttl_usuario` FOREIGN KEY (`responsavel`) REFERENCES `ttl_usuario` (`id_usuario`),
  CONSTRAINT `FK_ttl_resultados_chave_ttl_usuario_rchave` FOREIGN KEY (`usuario_atualizador`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='Cadastro de resultados chave o resultaod chave é o que mede o atingimento de um objetivo. Cada resultado chave tem uma frequencia, uma vez definida a interface deve oferecer um cadastro de meta parcial para cada linha. Importante que são válidos apenas dias úteis (exclui-se finais de semana). Como limite é a data alvo.  Para apurar um progresso no de resultado chave é sempre dividida a meta total final informada na tabela de resultado chave pela última apuração , é possível que passe de 100%,\r\n\r\n\r\n\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_resultados_chave`
--

LOCK TABLES `ttl_resultados_chave` WRITE;
/*!40000 ALTER TABLE `ttl_resultados_chave` DISABLE KEYS */;
INSERT INTO `ttl_resultados_chave` VALUES (45,194,'Ter 100% das funcionalidades necessárias para aplicativo mapeadas','A partir do que se tem hoje e, do que se tem disponível em concorrentes documentar lista de funcionalidades necessárias para app.','4','%',100,20,1,20,NULL,91,'N','Em Andamento',0,'2017-10-06 13:14:52',91,'1'),(46,195,'Entregar aplicativos para IOS e Android 100% finalizado','Entregar aplicativos para IOS e Android 100% finalizado','4','%',100,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 17:30:33',91,'1'),(47,196,'Ter 100% das funcionalidades documentadas em manuais','Ter 100% das funcionalidades documentadas em manuais','3','%',100,NULL,1,0,NULL,92,'N','Pendente',0,'2017-10-05 17:41:46',91,'1'),(48,198,'Ter modelos de resposta diferentes para primeiro contato, solicitação de proposta e teste do produto','Ter modelos de resposta diferentes para primeiro contato, solicitação de proposta e teste do produto','4','qtd',3,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 17:48:25',91,'1'),(49,197,'Manter ao menos uma publicação semanal até o final de 2017','Manter ao menos uma publicação semanal até o final de 2017','2','qtd',15,1,1,7,NULL,91,'N','Em Andamento',0,'2017-10-06 15:14:22',91,'1'),(50,200,'Produzir ao menos um post por semana','Produzir ao menos um post por semana','2','qtd',15,1,1,7,NULL,91,'N','Em Andamento',0,'2017-10-06 15:15:05',92,'1'),(51,201,'Manter uma media de um minimo de 10 novos usuarios por semana','Manter uma media de um minimo de 10 novos usuarios por semana','2','qtd',10,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 18:03:17',92,'1'),(52,202,'Ter 100% do ciclo de vida dos clientes em uma ferramenta de CRM','Ter 100% do ciclo de vida dos clientes em uma ferramenta de CRM','4','%',100,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 18:07:38',91,'1'),(53,203,'Analisar ao menos um concorrente por quinzena ate o final de 2017','Fazer trials de produtos, analisar funcionalidades, e as diferenças para o elofy.','2','qtd',6,1,1,17,NULL,92,'N','Em Andamento',0,'2017-10-06 14:01:25',91,'1'),(54,204,'Relatar falhas encontradas semanalmente ate o final de 2017','Relatar falhas encontradas semanalmente','2','qtd',13,1,1,8,NULL,91,'N','Em Andamento',0,'2017-10-06 14:06:07',92,'1'),(55,205,'Atualizar o mapa de melhorias semanalmente até o final de 2017','Organizar e produzir sugestões de melhorias com o intuito de tornar a implementação das mesmas mais relevantes ao produto.','2','qtd',13,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 18:21:17',92,'1'),(56,199,'Ter 100% documentados todas as funções, procederes, triggers e eventos','Ter 100% documentados todas as funções, procederes, triggers e eventos','4','%',100,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 18:24:09',91,'1'),(57,206,'Ter 1 banco de dados com informações de contato dos clientes ','Ter banco de dados com informações de contato dos cliente','4','qtd',1,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 18:46:38',91,'1'),(58,207,'Terminar capacitação em php ate o final de 2017','Terminar capacitação em php ate o final de 2017','2','%',100,NULL,1,0,NULL,92,'N','Pendente',0,'2017-10-05 18:46:54',92,'1'),(59,207,'Realizar ao menos uma customização no elofy ate o final de 2017','Realizar ao menos uma customização no elofy ate o final de 2017','4','qtd',1,NULL,1,0,NULL,92,'N','Pendente',0,'2017-10-05 18:48:27',92,'1'),(60,206,'Estruturar plano de mail marketing a cada quinzena até o final de 2017','Estruturar plano de mail marketing a cada quinzena até o final de 2017','2','qtd',6,NULL,1,0,NULL,91,'N','Pendente',0,'2017-10-05 18:49:06',91,'1'),(61,208,'Produzir um vídeo de divulgação elofy até o o final de 2017','Produzir um vídeo de divulgação elofy até o o final de 2017','4','qtd',1,NULL,1,0,NULL,92,'N','Pendente',0,'2017-10-05 18:50:33',91,'1'),(62,196,'Ter 1 video de capacitação do produto ','Validar ferramenta que salve a interface  e facilite a criação de um vídeo de treinamento','2','qtd',1,NULL,1,0,NULL,92,'N','Pendente',0,'2017-10-06 20:13:55',91,'1');
/*!40000 ALTER TABLE `ttl_resultados_chave` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tbu_ttl_resultados_chave BEFORE UPDATE ON ttl_resultados_chave FOR EACH ROW BEGIN
    
    DECLARE vSituacao   INTEGER;  
    DECLARE vProgresso  DOUBLE;
    DECLARE vQtd_ativ   INTEGER;
   

    IF ( ( (ifnull(NEW.medicao,-1)  != ifnull(OLD.medicao,-1))  OR
	        (ifnull(NEW.progresso,0) != ifnull(OLD.progresso,0)) 
	      ) AND 
			 NEW.ativo = 1 
		 ) THEN

       IF NEW.tipo_calculo = 0 THEN
          SET NEW.progresso = round((NEW.medicao/NEW.meta_final_prevista)* 100);   -- se desativou, zera o progresso
       END IF;
-- 'Pendente','Atingido','Não Atingido','Em Andamento'
       SELECT CASE 
                 WHEN NEW.progresso = 0    THEN 1   
                 WHEN NEW.progresso >= 100 THEN 2
                 ELSE 4
              END INTO vSituacao;
              
      SET NEW.situacao = vSituacao;
                     
    END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`elofy`@`%`*/ /*!50003 TRIGGER tau_ttl_resultados_chave
    AFTER UPDATE ON ttl_resultados_chave 
	    FOR EACH ROW BEGIN

    DECLARE vTimestamp            DATETIME;
    DECLARE vComentario           VARCHAR(4000);
    DECLARE vDividendo            DOUBLE;
    DECLARE vDivisor              INTEGER;
    DECLARE vAtivo                INTEGER;
    DECLARE vId_tipo_atualizacao  INTEGER;
    DECLARE vData_medicao         DATETIME;
    DECLARE vId_rchave            INTEGER;
    DECLARE vMedicao              DOUBLE;
    DECLARE vCur_id_medicao       INTEGER;
    DECLARE vCur_medicao          DOUBLE;
    DECLARE vCur_data_medicao     DATETIME;
    DECLARE vFim_cursor           BOOL DEFAULT FALSE;
	    
    DECLARE cur_rchave CURSOR FOR 
       SELECT id_medicao, medicao, data_medicao
          from ttl_rchave_medicoes
       WHERE id_resultado_chave = vId_rchave
           and data_medicao < vData_medicao
       ORDER BY data_medicao;


    DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;


	  
    SET vTimestamp = SYSDATE();

    SET vComentario = NULL;

    IF NEW.progresso != OLD.progresso  THEN
    
       select CASE 
                 WHEN NEW.progresso < 100 THEN 
                     CONCAT( 'Foi atualizado o valor do Resultado Chave ',
                             NEW.nomeRChave, 
                             '. O progresso atual é de ',
                             CAST(NEW.progresso as CHAR),
                             '%'
                           )
                 WHEN NEW.progresso = 100 THEN
                     CONCAT( 'Foi finalizado o Resultado Chave ',
                             NEW.nomeRChave
                           ) 
                 WHEN NEW.progresso > 100 THEN
                     CONCAT( 'Foi superado o Resultado Chave ',
                             NEW.nomeRChave, 
                             '. Seu progresso é de ',
                             CAST(NEW.progresso as CHAR),
                             '%'
                           )
              END INTO vComentario;
      
    END IF;

    IF ( NEW.ativo = 0 and OLD.ativo = 1 ) THEN
       SET vComentario = 'Resultado Chave foi excluído';
    END IF;

    IF ( vComentario IS NOT NULL ) THEN
       insert into ttl_log_rchave ( id_rchave, progresso, data_atualizacao, usuario_atualizador, comentario )
           values ( NEW.id_resultado_chave, NEW.progresso, NEW.data_atualizacao, NEW.usuario_atualizador, vComentario);
    END IF;

    IF ( NEW.progresso != OLD.progresso ) OR ( NEW.ativo != OLD.ativo ) THEN

       SET vAtivo = 0;
       SET vId_tipo_atualizacao = 1;

       select ativo, id_tipo_atualizacao into vAtivo, vId_tipo_atualizacao from ttl_objetivos t1
            where t1.id_objetivo = NEW.id_objetivo;   

       
       IF (vAtivo = 1 AND vId_tipo_atualizacao = 0) THEN
          
          select SUM((t1.progresso/100.00) * t1.peso), sum(t1.peso) INTO vDividendo, vDivisor
                from ttl_resultados_chave t1
              where t1.id_objetivo = NEW.id_objetivo
               and  t1.ativo = 1;

          IF (vDivisor = 0) THEN
             SET vDivisor = 1;
          END IF;
            
          UPDATE ttl_objetivos set percentual = round( (vDividendo/vDivisor) * 100.00),
                               usuario_atualizador = NEW.usuario_atualizador,
                               data_atualizacao    = NEW.data_atualizacao
              where id_objetivo = NEW.id_objetivo
               and  ativo = 1; 
       END IF; 
       
    END IF;

    IF ( NEW.progresso != OLD.progresso ) THEN

       SET vData_medicao = NULL;

       SELECT MAX(data_medicao) INTO vData_medicao from ttl_rchave_medicoes
          where id_resultado_chave = NEW.id_resultado_chave
           and  medicao IS NOT NULL; 

       IF ( vData_medicao IS NOT NULL ) THEN
       
          SET vId_rchave = NEW.id_resultado_chave; 
          SET vMedicao = NULL;

          OPEN cur_rchave;

          loop_rchave: LOOP
             FETCH cur_rchave INTO vCur_id_medicao, vCur_medicao, vCur_data_medicao;

             IF vFim_cursor THEN
                LEAVE loop_rchave;
             END IF;

             IF ( vMedicao IS NOT NULL AND vCur_medicao IS NULL) THEN
                UPDATE  ttl_rchave_medicoes SET medicao = vMedicao
                   where id_resultado_chave = vCur_id_medicao;
             END IF;

             IF (vCur_medicao IS NOT NULL) THEN
                SET vMedicao = vCur_medicao;
             END IF;
 
          END LOOP;
          CLOSE cur_rchave;
       END IF;
    END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ttl_time_usuario`
--

DROP TABLE IF EXISTS `ttl_time_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_time_usuario` (
  `id_unidade_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa_time` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `gestor` varchar(1) DEFAULT 'N' COMMENT 'S ou N',
  `avaliador` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id_unidade_usuario`),
  KEY `FK__ttl_usuario3` (`id_usuario`),
  KEY `FK__ttl_empresa_times` (`id_empresa_time`),
  CONSTRAINT `FK__ttl_empresa_times` FOREIGN KEY (`id_empresa_time`) REFERENCES `ttl_empresa_times` (`id_time`),
  CONSTRAINT `FK__ttl_usuario3` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='Vinculação de Usuários e times';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_time_usuario`
--

LOCK TABLES `ttl_time_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_time_usuario` DISABLE KEYS */;
INSERT INTO `ttl_time_usuario` VALUES (23,37,91,'N','N'),(24,37,92,'N','N'),(25,38,94,'N','N');
/*!40000 ALTER TABLE `ttl_time_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_usuario`
--

DROP TABLE IF EXISTS `ttl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_time` int(11) DEFAULT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_usuario` varchar(250) NOT NULL,
  `data_aniversario` date DEFAULT NULL,
  `login` varchar(250) NOT NULL,
  `senha` varchar(500) DEFAULT NULL,
  `admin` varchar(1) NOT NULL COMMENT '0 ou 1',
  `avaliador` varchar(1) NOT NULL COMMENT '0 ou 1',
  `gestor` varchar(1) NOT NULL COMMENT '0 ou 1',
  `ativo` int(1) NOT NULL DEFAULT '1',
  `url_image` varchar(4000) DEFAULT NULL,
  `favorites` varchar(4000) DEFAULT NULL,
  `hash_cadastro` varchar(4000) DEFAULT NULL,
  `email_checked` int(11) DEFAULT '0' COMMENT '0 ou 1',
  PRIMARY KEY (`id_usuario`),
  KEY `Index 2` (`id_empresa`,`id_time`),
  KEY `FK_ttl_usuario_ttl_empresa_unidades` (`id_time`),
  CONSTRAINT `FK_ttl_usuario_ttl_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `ttl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ttl_usuario_ttl_empresa_times` FOREIGN KEY (`id_time`) REFERENCES `ttl_empresa_times` (`id_time`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COMMENT='Usuário	id_usuario	id_empresa	id_unidade	nome_colaborador	email_colaborador	ativo	data_atualizacao	id_usuario_atualizador\r\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_usuario`
--

LOCK TABLES `ttl_usuario` WRITE;
/*!40000 ALTER TABLE `ttl_usuario` DISABLE KEYS */;
INSERT INTO `ttl_usuario` VALUES (91,61,NULL,'Daniel Kafruni de Oliveira','2017-10-02 21:57:03','daniel@elofy.com.br',NULL,'daniel@elofy.com.br','7c4a8d09ca3762af61e59520943dc26494f8941b','1','1','',1,NULL,NULL,'',1),(92,61,NULL,'Eduardo Kafruni','2017-10-05 13:30:19','team@elofy.com.br',NULL,'team@elofy.com.br','2e68c4930e163aef66cdca85706856a6f953237d','1','1','',1,'',NULL,'',1),(93,61,NULL,'Eduardo Stein','2017-10-05 18:36:43','edu.stein@gmail.com',NULL,'edu.stein@gmail.com','90e2321d0ae17d2f1d6ec3a7693b84f3ddedb93d','0','0','',1,'',NULL,'',1),(94,62,NULL,'Vinícius Scagliuse','2017-10-06 17:50:47','vinicius.scagliuse@linx.com.br',NULL,'vinicius.scagliuse@linx.com.br','d4a4cb06de191bf32214e2685a856b17c93f7406','1','1','',1,NULL,NULL,'',1);
/*!40000 ALTER TABLE `ttl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_usuario_competencias`
--

DROP TABLE IF EXISTS `ttl_usuario_competencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_usuario_competencias` (
  `id_cargo_competencia` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_competencia` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_atualizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Tabela de vinculação entre cargos em competências';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_usuario_competencias`
--

LOCK TABLES `ttl_usuario_competencias` WRITE;
/*!40000 ALTER TABLE `ttl_usuario_competencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_usuario_competencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttl_usuario_favoritos`
--

DROP TABLE IF EXISTS `ttl_usuario_favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttl_usuario_favoritos` (
  `id_favorito` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_objeto` int(1) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `classe` enum('objetivos','atividades','times') NOT NULL DEFAULT 'objetivos',
  `data_status` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_favorito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Tabela de Conexão de favoritos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttl_usuario_favoritos`
--

LOCK TABLES `ttl_usuario_favoritos` WRITE;
/*!40000 ALTER TABLE `ttl_usuario_favoritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttl_usuario_favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'elofy_bd2'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `atualiza_etiquetas` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = '' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'UTC' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`elofy`@`%`*/ /*!50106 EVENT `atualiza_etiquetas` ON SCHEDULE EVERY 1 HOUR STARTS '2017-08-31 00:05:00' ON COMPLETION NOT PRESERVE ENABLE DO call sp_atualiza_etiquetas() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `atualiza_objetivos` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = '' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'UTC' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`elofy`@`%`*/ /*!50106 EVENT `atualiza_objetivos` ON SCHEDULE EVERY 5 SECOND STARTS '2017-08-10 23:22:01' ON COMPLETION NOT PRESERVE ENABLE DO call sp_atualiza_objetivos() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `atualiza_objetivos2` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`elofy`@`%`*/ /*!50106 EVENT `atualiza_objetivos2` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-08-21 17:18:51' ON COMPLETION NOT PRESERVE ENABLE DO call sp_atualiza_objetivos() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `atualiza_totais_nos_objetivos` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = '' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'UTC' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`elofy`@`%`*/ /*!50106 EVENT `atualiza_totais_nos_objetivos` ON SCHEDULE EVERY 5 SECOND STARTS '2017-08-25 23:59:59' ON COMPLETION NOT PRESERVE ENABLE DO call sp_processa_obj() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `gera_reL_obj` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`elofy`@`%`*/ /*!50106 EVENT `gera_reL_obj` ON SCHEDULE EVERY 1 DAY STARTS '2017-09-26 00:15:00' ON COMPLETION NOT PRESERVE ENABLE DO call sp_gera_rel_obj() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `gera_resumo_avaliacoes` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`elofy`@`%`*/ /*!50106 EVENT `gera_resumo_avaliacoes` ON SCHEDULE EVERY 1 DAY STARTS '2017-08-31 00:10:00' ON COMPLETION NOT PRESERVE ENABLE DO call sp_gera_resumo_avaliacoes() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'elofy_bd2'
--
/*!50003 DROP FUNCTION IF EXISTS `f_gera_json` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_gera_json`(
	`p_id_objetivo` INTEGER 
) RETURNS text CHARSET latin1 COLLATE latin1_general_ci
BEGIN 

     DECLARE vString       TEXT;
		    
     set max_sp_recursion_depth = 255;

     SET vString = '<?php ';
     SET vString = concat(vString, '$data = array( ');
     SET vString = concat(vString, '''0'' => array( ');
     SET vString = concat(vString, '''id'' => ''0'', ');
     SET vString = concat(vString, '''childeNode'' => array( ');

     CALL sp_le_objetivos ( p_id_objetivo, 0, vString );	

     SET vString = concat(vString, '), ');
     SET vString = concat(vString, '), ');
     SET vString = concat(vString, '), ');
     SET vString = concat(vString, '); ');
     SET vString = concat(vString, 'echo json_encode($data); ');
     SET vString = concat(vString, ' ?>');

 
     set max_sp_recursion_depth = 10;
     
     return vString;
     
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_obj_avaliacao` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_obj_avaliacao`(
	`p_avaliacao` INTEGER,
	`p_id_time` INTEGER,
	`p_id_ciclo` INTEGER,
	`p_id_janela` INTEGER,
	`p_id_empresa` INTEGER

) RETURNS double
BEGIN
   
   DECLARE vQtd_sit INTEGER;
   DECLARE vQtd_tot INTEGER;
   DECLARE vPerc    DOUBLE;
   
   
   IF p_id_time IS NOT NULL THEN
   
      IF p_id_ciclo IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE t1.avaliacao WHEN  p_avaliacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			   FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			      ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			      ON t2.id_ciclo = t3.id_ciclo
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
				 AND  t1.id_time  = p_id_time
				 AND  t3.id_ciclo = p_id_ciclo  
				 AND  t3.ativo = 1;       
      
      ELSEIF p_id_janela IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE v1.avaliacao WHEN  p_avaliacao THEN 1 ELSE 0 END)
			       INTO vQtd_tot, vQtd_sit
			       FROM
          (   SELECT distinct t1.id_objetivo, t1.avaliacao 
			     FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			        ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			        ON t2.id_ciclo = t3.id_ciclo
              WHERE t1.parent_id IS NOT NULL
               AND  t1.ativo = 1
               AND  t1.id_time  = p_id_time
				   AND  t3.ativo = 1
				   AND  t3.id_janela = p_id_janela
		   ) v1;      
      
      ELSE -- p_id_ciclo IS NULL AND p_id_janela IS NULL
      
         SELECT COUNT(*),
			       SUM(CASE t1.avaliacao WHEN  p_avaliacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			FROM ttl_objetivos t1
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
         			 AND  t1.id_time = p_id_time;
   
      END IF;
   ELSE -- p_id_time is null
   
      IF p_id_ciclo IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE t1.avaliacao WHEN  p_avaliacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			   FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			      ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			      ON t2.id_ciclo = t3.id_ciclo
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
         			 AND  t3.id_ciclo = p_id_ciclo  
				 AND  t3.ativo = 1;       
      
      ELSEIF p_id_janela IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE v1.avaliacao WHEN  p_avaliacao THEN 1 ELSE 0 END)
			    INTO vQtd_tot, vQtd_sit
			       FROM
          (   SELECT distinct t1.id_objetivo, t1.avaliacao 
			     FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			        ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			        ON t2.id_ciclo = t3.id_ciclo
              WHERE t1.parent_id IS NOT NULL
               AND  t1.ativo = 1
   		   AND  t3.ativo = 1
		AND  t3.id_janela = p_id_janela
		   ) v1;      
      
      ELSE -- p_id_ciclo IS NULL AND p_id_janela IS NULL
      
         SELECT COUNT(*),
			       SUM(CASE t1.avaliacao WHEN  p_avaliacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			FROM ttl_objetivos t1
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
             AND  t1.id_empresa = p_id_empresa;
   
      END IF;   
   END IF;
   SET vPerc = ifnull(vQtd_sit/vQtd_tot,0);
   RETURN vPerc;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_obj_situacao` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_obj_situacao`(
	`p_situacao` INTEGER,
	`p_id_time` INTEGER,
	`p_id_ciclo` INTEGER,
	`p_id_janela` INTEGER,
	`p_id_empresa` INTEGER


) RETURNS double
BEGIN

   DECLARE vQtd_sit INTEGER;
   DECLARE vQtd_tot INTEGER;
   DECLARE vPerc    DOUBLE;
   
   
   IF p_id_time IS NOT NULL THEN
   
      IF p_id_ciclo IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE t1.situacao WHEN  p_situacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			   FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			      ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			      ON t2.id_ciclo = t3.id_ciclo
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
				 AND  t1.id_time  = p_id_time
				 AND  t3.id_ciclo = p_id_ciclo  
				 AND  t3.ativo = 1;       
      
      ELSEIF p_id_janela IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE v1.situacao WHEN  p_situacao THEN 1 ELSE 0 END)
			       INTO vQtd_tot, vQtd_sit
			       FROM
          (   SELECT distinct t1.id_objetivo, t1.situacao 
			     FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			        ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			        ON t2.id_ciclo = t3.id_ciclo
              WHERE t1.parent_id IS NOT NULL
               AND  t1.ativo = 1
               AND  t1.id_time  = p_id_time
				   AND  t3.ativo = 1
				   AND  t3.id_janela = p_id_janela
		   ) v1;      
      
      ELSE -- p_id_ciclo IS NULL AND p_id_janela IS NULL
      
         SELECT COUNT(*),
			       SUM(CASE t1.situacao WHEN  p_situacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			FROM ttl_objetivos t1
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
         	 AND  t1.id_time = p_id_time
				 AND  t1.id_empresa = p_id_empresa;
   
      END IF;
   ELSE -- p_id_time is null
   
      IF p_id_ciclo IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE t1.situacao WHEN  p_situacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			   FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			      ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			      ON t2.id_ciclo = t3.id_ciclo
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
         			 AND  t3.id_ciclo = p_id_ciclo  
				 AND  t3.ativo = 1;       
      
      ELSEIF p_id_janela IS NOT NULL THEN
         SELECT COUNT(*),
			       SUM(CASE v1.situacao WHEN  p_situacao THEN 1 ELSE 0 END)
			    INTO vQtd_tot, vQtd_sit
			       FROM
          (   SELECT distinct t1.id_objetivo, t1.situacao 
			     FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			        ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			        ON t2.id_ciclo = t3.id_ciclo
              WHERE t1.parent_id IS NOT NULL
               AND  t1.ativo = 1
   		   AND  t3.ativo = 1
		AND  t3.id_janela = p_id_janela
		   ) v1;      
      
      ELSE -- p_id_ciclo IS NULL AND p_id_janela IS NULL
      
         SELECT COUNT(*),
			       SUM(CASE t1.situacao WHEN  p_situacao THEN 1 ELSE 0 END)
			        INTO vQtd_tot, vQtd_sit
			FROM ttl_objetivos t1
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
             AND  t1.id_empresa = p_id_empresa;
   
      END IF;   
   END IF;
   SET vPerc = ifnull(vQtd_sit / vQtd_tot,0);
   RETURN vPerc;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_qtd_obj` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_qtd_obj`(
	`p_id_time` INTEGER,
	`p_id_ciclo` INTEGER,
	`p_id_janela` INTEGER,
	`p_id_empresa` INT

) RETURNS int(11)
BEGIN
   
   DECLARE vQtd INTEGER;
   
      IF p_id_ciclo IS NOT NULL THEN
         SELECT COUNT(*) INTO vQtd 
			   FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			      ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			      ON t2.id_ciclo = t3.id_ciclo
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
           	 AND  t1.id_time  = p_id_time
				 AND  t3.id_ciclo = p_id_ciclo  
				 AND  t3.ativo = 1;       
      
      ELSEIF p_id_janela IS NOT NULL THEN
         SELECT COUNT(distinct t1.id_objetivo) INTO vQtd 
			   FROM ttl_objetivos t1 INNER JOIN ttl_objetivo_ciclo t2
			      ON t1.id_objetivo = t2.id_objetivo
			                         INNER JOIN ttl_ciclos t3
			      ON t2.id_ciclo = t3.id_ciclo
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
           	 AND  t1.id_time  = p_id_time
				 AND  t3.ativo = 1
				 AND  t3.id_janela = p_id_janela;       
      
      -- p_id_ciclo IS NULL AND p_id_janela IS NULL
      
      ELSEIF p_id_time IS NOT NULL THEN 
		
		    SELECT COUNT(*) INTO vQtd FROM ttl_objetivos t1
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
           	 AND  t1.id_time = p_id_time;
 
 		ELSE
 		
 			    SELECT COUNT(*) INTO vQtd FROM ttl_objetivos t1
            WHERE t1.parent_id IS NOT NULL
             AND  t1.ativo = 1
           	 AND  t1.id_empresa = p_id_empresa;

   
      END IF;

      SET vQtd = ifnull(vQtd,0);
   RETURN vQtd;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_string_corresp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_string_corresp`(
	p_id_objetivo INTEGER
) RETURNS varchar(2000) CHARSET latin1
BEGIN

   DECLARE vString                VARCHAR(2000);
   DECLARE curUsuario             VARCHAR(280);
   DECLARE vFim_cursor            BOOL DEFAULT FALSE;

   DECLARE cur_corresp CURSOR FOR 
      SELECT concat(t1.id_usuario, ':', t2.nome_usuario) 
          FROM ttl_obj_responsaveis t1 INNER JOIN ttl_usuario t2
         ON t1.id_usuario = t2.id_usuario
    WHERE t1.id_objetivo = p_id_objetivo;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

   SET vString = '';
   
   OPEN cur_corresp;

   loop_corresp: LOOP
      FETCH cur_corresp INTO curUsuario;

      IF vFim_cursor THEN
         LEAVE loop_corresp;
      END IF;

      SET vString = concat(vString, curUsuario, ';'); 

      SET vFim_cursor = FALSE;
       
   END LOOP;

   CLOSE cur_corresp;

   RETURN vString;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_string_corresp_ativ` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_string_corresp_ativ`(
	p_id_atividade INTEGER

) RETURNS varchar(2000) CHARSET latin1
BEGIN

   DECLARE vString                VARCHAR(2000);
   DECLARE curUsuario             VARCHAR(280);
   DECLARE vFim_cursor            BOOL DEFAULT FALSE;

   DECLARE cur_corresp CURSOR FOR 
      SELECT concat(t1.id_usuario, ':', t2.nome_usuario) 
          FROM ttl_atv_reponsaveis t1 INNER JOIN ttl_usuario t2
         ON t1.id_usuario = t2.id_usuario
    WHERE t1.id_atividade = p_id_atividade;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

   SET vString = '';
   
   OPEN cur_corresp;

   loop_corresp: LOOP
      FETCH cur_corresp INTO curUsuario;

      IF vFim_cursor THEN
         LEAVE loop_corresp;
      END IF;

      SET vString = concat(vString, curUsuario, ';'); 

      SET vFim_cursor = FALSE;
       
   END LOOP;

   CLOSE cur_corresp;

   RETURN vString;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_string_corresp_RChave` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_string_corresp_RChave`(
	p_id_resultado_chave INTEGER
) RETURNS varchar(2000) CHARSET latin1
BEGIN

   DECLARE vString                VARCHAR(2000);
   DECLARE curUsuario             VARCHAR(280);
   DECLARE vFim_cursor            BOOL DEFAULT FALSE;

   DECLARE cur_corresp CURSOR FOR 
      SELECT concat(t1.id_usuario, ':', t2.nome_usuario) 
          FROM ttl_rchave_responsaveis t1 INNER JOIN ttl_usuario t2
         ON t1.id_usuario = t2.id_usuario
    WHERE t1.id_resultado_chave = p_id_resultado_chave;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

   SET vString = '';
   
   OPEN cur_corresp;

   loop_corresp: LOOP
      FETCH cur_corresp INTO curUsuario;

      IF vFim_cursor THEN
         LEAVE loop_corresp;
      END IF;

      SET vString = concat(vString, curUsuario, ';'); 

      SET vFim_cursor = FALSE;
       
   END LOOP;

   CLOSE cur_corresp;

   RETURN vString;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_string_hierarq_locais` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` FUNCTION `f_string_hierarq_locais`(
	p_id_time INTEGER
) RETURNS varchar(2000) CHARSET latin1
BEGIN

   DECLARE vString                VARCHAR(2000);

   call sp_hierarq_locais( p_id_time, vString);

   RETURN vString;
   
   END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `atualiza_qtd_objetivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `atualiza_qtd_objetivos`()
    MODIFIES SQL DATA
BEGIN  





END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_atualiza_etiquetas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_atualiza_etiquetas`( )
    MODIFIES SQL DATA
BEGIN  

    DECLARE curId_pendencias_etiq  INTEGER;
    DECLARE curId_etiqueta         INTEGER;
    DECLARE curId_objetivo         INTEGER;
    DECLARE curUsuario_atualizador INTEGER;
    DECLARE curTipo_pendencia      INTEGER;
    DECLARE vFim_cursor            BOOL DEFAULT FALSE;


    DECLARE cur_pend_etiq CURSOR FOR 
       SELECT id_pendencias_etiq, id_etiqueta, id_objetivo, usuario_atualizador, tipo_pendencia
          from ttl_pendencias_etiq
       WHERE processado = 0
       ORDER BY data_pendencia;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
       BEGIN
          ROLLBACK;
          GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, @errno = MYSQL_ERRNO, 
                                      @text = MESSAGE_TEXT; 
          SET @erro = CONCAT("ERRO ", @errno, " (", @sqlstate, "): ", @text); 
          SELECT @erro;  
       END;

    SET  max_sp_recursion_depth = 20;

    START TRANSACTION;

    OPEN cur_pend_etiq;

    loop_pend_etiq: LOOP
       FETCH cur_pend_etiq INTO curId_pendencias_etiq, curId_etiqueta, curId_objetivo, curUsuario_atualizador, curTipo_pendencia;

       IF vFim_cursor THEN
          LEAVE loop_pend_etiq;
       END IF;

       call sp_etiq_obj( curId_objetivo, curId_etiqueta, curUsuario_atualizador, curTipo_pendencia );

       UPDATE ttl_pendencias_etiq SET processado = 1
           where id_pendencias_etiq = curId_pendencias_etiq;

       SET vFim_cursor = FALSE;
       
    END LOOP;

    CLOSE cur_pend_etiq;

    COMMIT;

    SET  max_sp_recursion_depth = 10;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_atualiza_objetivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_atualiza_objetivos`()
    MODIFIES SQL DATA
BEGIN  

    DECLARE vId_objetivo          INTEGER;
    DECLARE vId_objetivo_pai      INTEGER;
    DECLARE curId_obj_a_atualizar INTEGER;
    DECLARE curId_objetivo        INTEGER;
    DECLARE curId_objetivo_pai    INTEGER;
    DECLARE curExclusao           INTEGER;
    DECLARE vDividendo            DOUBLE;
    DECLARE vDivisor              INTEGER;
    DECLARE vFim_cursor           BOOL DEFAULT FALSE;


    DECLARE cur_obj CURSOR FOR 
       SELECT id_obj_a_atualizar, id_objetivo, id_objetivo_pai, exclusao
          from ttl_obj_a_atualizar
       WHERE processado = 0
       ORDER BY data_atualizacao;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
       BEGIN
          ROLLBACK;
          GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, @errno = MYSQL_ERRNO, 
                                      @text = MESSAGE_TEXT; 
          SET @erro = CONCAT("ERRO ", @errno, " (", @sqlstate, "): ", @text); 
          SELECT @erro;  
       END;
         
    START TRANSACTION;
    
    OPEN cur_obj;
      
    loop_obj: LOOP
       FETCH cur_obj INTO curId_obj_a_atualizar, curId_objetivo, curId_objetivo_pai, curExclusao;
        
       IF vFim_cursor THEN
          LEAVE loop_obj;
       END IF;
        
       SET vId_objetivo =  curId_objetivo_pai;
       
       objetivos: WHILE ifnull(vId_Objetivo,0) != 0 DO
       
          select t1.parent_id, sum(t2.peso)
              INTO vId_Objetivo_Pai, vDivisor
            from ttl_objetivos t1 INNER JOIN ttl_obj_peso_time t2
                  on t1.id_objetivo = t2.id_objetivo 
             where t1.id_objetivo = vId_Objetivo
             group by t1.parent_id;

          select sum(v1.soma/CASE v1.peso WHEN 0 THEN 1 ELSE v1.peso END) INTO vDividendo
             from   
             ( select t2.id_time, sum(t2.peso * (ifnull(t3.percentual,0)/100.00) * ifnull(t3.peso,0)) soma, sum(t3.peso) peso
                    from ttl_objetivos t1 INNER JOIN ttl_obj_peso_time t2
                      on t1.id_objetivo = t2.id_objetivo 
                                     LEFT OUTER JOIN ttl_objetivos t3
                      on t1.id_objetivo = t3.parent_id
                     and t2.id_time     = t3.id_time
                     and t3.ativo = 1
                  where t1.id_objetivo = vId_Objetivo
                 group by t2.id_time
             ) v1;  
       
          IF vDividendo IS NULL THEN
             SET vDividendo = 0;
          END IF;
          
          IF vDivisor = 0 OR vDivisor IS NULL THEN
             set vDivisor = 1;
          END IF;
           
          UPDATE ttl_objetivos set percentual = round( (vDividendo/vDivisor) * 100.00),
                                  data_atualizacao    = SYSDATE()
             where id_objetivo = vId_objetivo;
          
          SET vId_objetivo =  vId_objetivo_pai;     
           
       END WHILE objetivos;
        
       IF curExclusao = 1 THEN
          call sp_exclusao_obj(curId_objetivo);
       END IF;

       UPDATE ttl_obj_a_atualizar SET processado = 1
           where id_obj_a_atualizar = curId_obj_a_atualizar;
           
       SET vFim_cursor = FALSE;
       
    END LOOP;

    CLOSE cur_obj;

    DELETE FROM ttl_obj_a_atualizar WHERE processado = -1;

    COMMIT;

  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_etiq_obj` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_etiq_obj`(
	IN `p_id_objetivo` INTEGER,
	IN `p_id_etiqueta` INTEGER,
	IN `p_id_usuario` INTEGER,
	IN `p_tipo_pendencia` INTEGER
                            

)
    MODIFIES SQL DATA
BEGIN  

    DECLARE curId_objetivo         INTEGER;
    DECLARE vQtd                   INTEGER;
    DECLARE vTimestamp             DATETIME;
    DECLARE vFim_cursor            BOOL DEFAULT FALSE;


    DECLARE cur_obj CURSOR FOR 
       SELECT id_objetivo
          from ttl_objetivos
       WHERE parent_id = p_id_objetivo;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
       BEGIN
          ROLLBACK;
          GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, @errno = MYSQL_ERRNO, 
                                      @text = MESSAGE_TEXT; 
          SET @erro = CONCAT("ERRO ", @errno, " (", @sqlstate, "): ", @text); 
          SELECT @erro;  
       END;

    SELECT SYSDATE() INTO vTimestamp;

    IF (p_tipo_pendencia = 3) THEN 

       SET vQtd = 0;

       select count(*) INTO vQtd from ttl_etiqueta_obj
         where id_etiqueta = p_id_etiqueta
          and  id_objetivo = p_id_objetivo;
   
       IF (vQtd = 0) THEN
          INSERT INTO ttl_etiqueta_obj ( id_etiqueta,   id_objetivo, usuario_atualizador, data_atualizacao )
                      VALUES           ( p_id_etiqueta, p_id_objetivo, p_id_usuario, vTimestamp );
       END IF;

    ELSE

       OPEN cur_obj;

       loop_obj: LOOP
          FETCH cur_obj INTO curId_objetivo;

          IF vFim_cursor THEN
             LEAVE loop_obj;
          END IF;

          call sp_etiq_obj( curId_objetivo, p_id_etiqueta, p_id_usuario, p_tipo_pendencia );

          SET vQtd = 0;

          IF (p_tipo_pendencia = 1) THEN  -- inclusão
   
             select count(*) INTO vQtd from ttl_etiqueta_obj
                 where id_etiqueta = p_id_etiqueta
                  and  id_objetivo = curId_objetivo;
   
             IF (vQtd = 0) THEN
                INSERT INTO ttl_etiqueta_obj ( id_etiqueta,   id_objetivo, usuario_atualizador, data_atualizacao )
                            VALUES           ( p_id_etiqueta, curId_objetivo, p_id_usuario, vTimestamp );
             END IF;

          END IF;

          IF (p_tipo_pendencia = 2) THEN  -- exclusão
             DELETE FROM ttl_etiqueta_obj
                where id_etiqueta = p_id_etiqueta
                 and  id_objetivo = curId_objetivo;
          END IF;

          SET vFim_cursor = FALSE;
       
       END LOOP;

       CLOSE cur_obj;
    
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_exclusao_obj` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_exclusao_obj`(
	IN `p_id_objetivo` INTEGER 
)
    MODIFIES SQL DATA
BEGIN

    DECLARE vAtivo             INTEGER;
    DECLARE vId_objetivo_filho INTEGER;

    DECLARE vFim_cursor   BOOL DEFAULT FALSE;

    DECLARE cur_filhos CURSOR FOR 
       SELECT id_objetivo
          from ttl_objetivos
       WHERE parent_id = p_id_objetivo
        ORDER BY id_objetivo;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;    

    SELECT ativo INTO vAtivo FROM ttl_objetivos WHERE id_objetivo = p_id_objetivo;

    IF vAtivo = 1 THEN
       UPDATE ttl_objetivos SET ativo = 0
          WHERE id_objetivo = p_id_objetivo;
    END IF; 

    OPEN cur_filhos;

    loop_filhos: LOOP
        FETCH cur_filhos INTO vId_objetivo_filho;

        IF vFim_cursor THEN
           LEAVE loop_filhos;
        END IF;

        CALL  sp_exclusao_obj( vId_objetivo_filho );  

    END LOOP;

    CLOSE cur_filhos;


  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_gera_alertas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_gera_alertas`()
    MODIFIES SQL DATA
BEGIN  

-- 1. Atividades Atrasadas

-- 1.1 para cada linha retornada da query abaixo, gerar um registro  ( analitico por usuario )

insert into ttl_alertas_usuario ( id_usuario, id_empresa, id_entidade, tipo_entidade )
select distinct t1.id_usuario, t2.id_empresa,  t2.id_atividade, 2 
   from ttl_atv_reponsaveis t1 INNER JOIN ttl_atividades t2
       on t1.id_atividade = t2.id_atividade
   where t2.data_fim < SYSDATE()
    and  t2.data_fim_real IS NULL
    and  t2.ativo = 1;
    
-- 1.2 repetição da query anterior, sintético por empresa
    
insert into ttl_alertas_usuario ( id_empresa, id_entidade, tipo_entidade )
select distinct t2.id_empresa,  t2.id_atividade, 2
   from ttl_atv_reponsaveis t1 INNER JOIN ttl_atividades t2
       on t1.id_atividade = t2.id_atividade
   where t2.data_fim < SYSDATE()
    and  t2.data_fim_real IS NULL
    and  t2.ativo = 1;
    

-- 2. Medições Pendentes

-- 2.1 para cada linha retornada da query abaixo, gerar um registro  ( analitico por usuario )

insert into ttl_alertas_usuario ( id_usuario, id_empresa, id_entidade, tipo_entidade  )
   select distinct t3.responsavel, t3.id_empresa, t1.id_medicao, 1 
   from ttl_rchave_medicoes t1 inner join ttl_resultados_chave t2
       on t1.id_resultado_chave = t2.id_resultado_chave
                        inner join ttl_objetivos t3
       on t2.id_objetivo = t3.id_objetivo
   where t1.data_medicao < SYSDATE()
    and  t1.medicao IS NULL
    and  t2.ativo = 1;

-- 2.2 repetição da query anterior, sintético por empresa
    
insert into ttl_alertas_usuario (  id_empresa, id_entidade, tipo_entidade  )
   select distinct t3.id_empresa, t1.id_medicao, 1 
   from ttl_rchave_medicoes t1 inner join ttl_resultados_chave t2
       on t1.id_resultado_chave = t2.id_resultado_chave
                        inner join ttl_objetivos t3
       on t2.id_objetivo = t3.id_objetivo
   where t1.data_medicao < SYSDATE()
    and  t1.medicao IS NULL
    and  t2.ativo = 1;
        
-- 3. Objetivos Vencidos

-- 3.1 para cada linha retornada da query abaixo, gerar um registro  ( analitico por usuario )

insert into ttl_alertas_usuario ( id_usuario, id_empresa, id_entidade, tipo_entidade )
select v1.responsavel, v1.id_empresa, v1.id_objetivo, 0
   from 
  ( select t1.responsavel, t1.id_empresa, t1.id_objetivo, max(t3.fim_vigencia) fim_vigencia
   from  ttl_objetivos t1 inner join ttl_objetivo_ciclo t2
       on t1.id_objetivo = t2.id_objetivo
                          inner join ttl_ciclos t3
       on t2.id_ciclo = t3.id_ciclo  
	  where t1.percentual < 100 
           and  t1.ativo = 1                     
      group by  t1.responsavel, t1.id_empresa, t1.id_objetivo
  ) v1
  where v1.fim_vigencia < SYSDATE();
  
-- 3.2 repetição da query anterior, sintético por empresa
 
insert into ttl_alertas_usuario ( id_empresa, id_entidade, tipo_entidade )
select distinct v1.id_empresa, v1.id_objetivo, 0
   from 
  ( select t1.id_empresa, t1.id_objetivo, max(t3.fim_vigencia) fim_vigencia
   from  ttl_objetivos t1 inner join ttl_objetivo_ciclo t2
       on t1.id_objetivo = t2.id_objetivo
                          inner join ttl_ciclos t3
       on t2.id_ciclo = t3.id_ciclo  
	  where t1.percentual < 100 
           and  t1.ativo = 1               
      group by t1.id_empresa, t1.id_objetivo
  ) v1
  where v1.fim_vigencia < SYSDATE();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_gera_estrutura_empresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_gera_estrutura_empresa`(
	IN `p_id_empresa` INT,
	IN `p_nome_empresa` VARCHAR(250),
	IN `p_planejamento` CHAR(1),
	IN `p_nome_usuario` VARCHAR(250),
	IN `p_email_usuario` VARCHAR(250)

)
    MODIFIES SQL DATA
BEGIN  

      DECLARE vUser        varchar(50);
      DECLARE vTimestamp   DATETIME;
      DECLARE vData        DATETIME;
      DECLARE vAno         INTEGER;
      DECLARE vQtd         INTEGER;
      DECLARE vCont        INTEGER;
      DECLARE vDataInicial DATETIME;
      DECLARE vDataFinal   DATETIME;
      DECLARE vId_time     INTEGER;  
      DECLARE vId_usuario  INTEGER;    

      SELECT USER() INTO vUser;
      SELECT SYSDATE() INTO vTimestamp;

      select count(*) INTO vQtd FROM ttl_empresa_times where id_empresa = p_id_empresa;

      SET vData = NULL;

      SELECT MAX(data_final) INTO vData FROM ttl_janela WHERE id_empresa = p_id_empresa;

      IF vData IS NULL  THEN
         SET vAno = DATE_FORMAT(SYSDATE(), '%Y');
         SET vCont = 1;
         
         REPEAT 
            SET vDataInicial = STR_TO_DATE(CONCAT(CAST(vAno AS CHAR), '01', '01'), '%Y%m%d');
            SET vDataFinal   = STR_TO_DATE(CONCAT(CAST(vAno AS CHAR), '12', '31'), '%Y%m%d');

            INSERT INTO ttl_janela ( id_empresa, data_inicial, data_final, descricao, data_atualizacao, ativo )
                      values       ( p_id_empresa, vDataInicial, vDataFinal, CAST(vAno AS CHAR), vTimestamp, '1' );

            SET vAno  = vAno + 1;
            SET vCont = vCont + 1;
         UNTIL (vCont > 3) END REPEAT; 
         
      ELSE
         SET vDataInicial = DATE_ADD(vData, INTERVAL 1 DAY);
         SET vAno         = DATE_FORMAT(vDataInicial, '%Y');
         SET vDataFinal   = DATE_ADD(vData, INTERVAL 1 YEAR);

         INSERT INTO ttl_janela ( id_empresa, data_inicial, data_final, descricao, data_atualizacao, ativo )
                   values       ( p_id_empresa, vDataInicial, vDataFinal, CAST(vAno AS CHAR), vTimestamp, '1' );

      END IF;


 
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_gera_rel_obj` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_gera_rel_obj`()
    MODIFIES SQL DATA
BEGIN  

    DECLARE vData_Execucao         DATE;
    DECLARE vData_hora_ini         TIMESTAMP;
    DECLARE vData_hora_fim         TIMESTAMP;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
       BEGIN
          ROLLBACK;
          GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, @errno = MYSQL_ERRNO, 
                                      @text = MESSAGE_TEXT; 
          SET @erro = CONCAT("ERRO ", @errno, " (", @sqlstate, "): ", @text); 
          SELECT @erro;  
       END;

    SELECT ADDDATE(DATE(NOW()), INTERVAL -1 DAY) INTO vData_Execucao;

    SELECT DATE_FORMAT(CONCAT(vData_Execucao,' 00:00:00'),'%Y-%m-%d %T'),  
           DATE_FORMAT(CONCAT(vData_Execucao,' 23:59:59'),'%Y-%m-%d %T')
      INTO vData_hora_ini, vData_hora_fim;
           
     

    START TRANSACTION;

-- 1. ttl_rel_obj

   DELETE FROM ttl_rel_obj WHERE data_execucao = vData_Execucao;
   
   INSERT INTO ttl_rel_obj ( data_execucao, id_empresa, nome_empresa, id_time, nome_time,
                                id_janela, descricao_janela, id_usuario, nome_usuario, id_ciclo, nome_ciclo,
                                id_objetivo, data_ini_objetivo, data_fim_objetivo, nome_objetivo, progresso_objetivo,
                                          parent_id, objetivo_pai, descricao_objetivo, peso, percentual_avaliacao,
                                id_tipo_avaliacao, qtd_objetivos, qtd_atividades, qtd_rchaves,
                                 publico, situacao, descr_situacao, avaliacao, descr_avaliacao, destaque,
                                            cor, data_atualiz_obj, usuario_atualiz_obj, ativo, hierarquia_times,
                                            corresponsaveis
)
SELECT vData_Execucao, t1.id_empresa, t1.nome_empresa, t5.id_time, t5.nome_unidade nome_time,
       t3.id_janela,  t3.descricao janela, t4.id_usuario, t4.nome_usuario,
         t7.id_ciclo,   t7.nome_ciclo,
         t2.id_objetivo, v9.data_ini_objetivo, v9.data_fim_objetivo, t2.nome nome_objetivo, t2.percentual,
            t2.parent_id, t8.nome objetivo_pai,
            t2.descricao descr_objetivo,
         t2.peso, t2.percentual_avaliacao, t2.id_tipo_atualizacao, t2.qtd_objetivos, t2.qtd_atividades,
         t2.qtd_rchaves, t2.publico,
            t2.situacao,
            CASE t2.situacao
               WHEN 0 THEN 'Pendente'
               WHEN 1 THEN 'Concluído'
               WHEN 2 THEN 'Cancelado'
               WHEN 3 THEN 'Em Andamento'
            END descr_situacao,
            t2.avaliacao,
            CASE t2.avaliacao
               WHEN 0 THEN 'Não Atingido'
               WHEN 1 THEN 'Atingido'
               WHEN 2 THEN 'Cancelado'
               WHEN 3 THEN 'Em Andamento'
            END descr_avaliacao,
            t2.destaque, t2.cor, t2.data_atualizacao,
         t2.usuario_atualizador, t2.ativo,
         f_string_hierarq_locais(t5.id_time),
         f_string_corresp(t2.id_objetivo)
   FROM ttl_empresa t1 INNER JOIN ttl_objetivos t2
     ON t1.id_empresa = t2.id_empresa
                       INNER JOIN ttl_janela t3
     ON t2.id_janela = t3.id_janela
                       INNER JOIN ttl_usuario t4
     ON t2.responsavel = t4.id_usuario
                       INNER JOIN ttl_empresa_times t5
     ON t2.id_time = t5.id_time
                       INNER JOIN ttl_objetivo_ciclo t6
     ON t2.id_objetivo = t6.id_objetivo
                       INNER JOIN ttl_ciclos t7
     ON t6.id_ciclo = t7.id_ciclo
                       LEFT OUTER JOIN ttl_objetivos t8
     ON t2.parent_id = t8.id_objetivo
                       LEFT OUTER JOIN
( select t11.id_objetivo, min(t12.inicio_vigencia) data_ini_objetivo,
                        max(t12.fim_vigencia) data_fim_objetivo
   from ttl_objetivo_ciclo t11 INNER JOIN ttl_ciclos t12
     on t11.id_ciclo = t12.id_ciclo
   where t12.ativo = 1
  group by t11.id_objetivo
) v9
     ON t2.id_objetivo = v9.id_objetivo
  WHERE ( t1.ativo = 1 AND t2.ativo = 1 AND t3.ativo = 1 AND t4.ativo = 1 AND t5.ativo = 1 AND t7.ativo = 1 AND t8.ativo = 1 ) 
   AND  ( t1.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t2.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t3.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t4.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t5.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t6.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t7.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim
        );

-- 2. ttl_rel_obj_rchave

   DELETE FROM ttl_rel_obj_rchave WHERE data_execucao = vData_Execucao;

INSERT INTO ttl_rel_obj_rchave ( data_execucao, id_empresa, nome_empresa, id_time, nome_time, id_usuario, nome_usuario,
                                id_objetivo, data_ini_objetivo, data_fim_objetivo, nome_objetivo, progresso_objetivo, parent_id, objetivo_pai,
                                descricao_objetivo, peso, percentual_avaliacao,
                                id_tipo_avaliacao, qtd_objetivos, qtd_atividades, qtd_rchaves,
                                publico, situacao, descr_situacao, avaliacao, descr_avaliacao, destaque,
                                cor, data_atualiz_obj, usuario_atualiz_obj, ativo, hierarquia_times,
                                corresponsaveis, id_resultado_chave, nome_RChave, descr_RChave, frequencia_RChave,
                                unidade_meta_RChave, meta_final_prev_RChave, medicao_RChave,
                                peso_RChave, progresso_RChave, responsavel_RChave, nome_resp_RChave,
                                corresponsaveis_RChave, publico_RChave, situacao_RChave, descr_situacao_RChave,
                                data_atualiz_RChave, usuario_atualiz_RChave, ativo_RChave,
                                id_medicao, data_medicao, medicao, comentario,
                                          usuario_atualiz_medicao, data_atualiz_medicao
                              )
SELECT vData_Execucao, t1.id_empresa, t1.nome_empresa, t3.id_time,
       t3.nome_unidade nome_time, t4.id_usuario, t4.nome_usuario,
       t2.id_objetivo, v9.data_ini_objetivo, v9.data_fim_objetivo, t2.nome nome_objetivo, t2.percentual,
         t2.parent_id, t8.nome objetivo_pai, t2.descricao descr_objetivo,
       t2.peso, t2.percentual_avaliacao, t2.id_tipo_atualizacao, t2.qtd_objetivos, t2.qtd_atividades,
       t2.qtd_rchaves, t2.publico,
       t2.situacao,
            CASE t2.situacao
               WHEN 0 THEN 'Pendente'
               WHEN 1 THEN 'Concluído'
               WHEN 2 THEN 'Cancelado'
               WHEN 3 THEN 'Em Andamento'
            END descr_situacao,
            t2.avaliacao,
            CASE t2.avaliacao
               WHEN 0 THEN 'Não Atingido'
               WHEN 1 THEN 'Atingido'
               WHEN 2 THEN 'Cancelado'
               WHEN 3 THEN 'Em Andamento'
            END descr_avaliacao,
            t2.destaque, t2.cor, t2.data_atualizacao,
         t2.usuario_atualizador, t2.ativo,
         f_string_hierarq_locais(t3.id_time),
         f_string_corresp(t2.id_objetivo),
         t5.id_resultado_chave,
         t5.nomeRChave,
         t5.descricao,
         t5.frequencia,
         t5.unidade_meta,
         t5.meta_final_prevista,
         t5.medicao,
         t5.peso,
         t5.progresso,
         t5.responsavel,
         t6.nome_usuario nome_resp_RChave,
         f_string_corresp_RChave(t5.id_resultado_chave) corresponsaveis_RChave,
         t5.publico,
         t5.situacao,
         CASE t5.situacao
            WHEN 1 THEN 'Pendente'
            WHEN 2 THEN 'Atingido'
            WHEN 3 THEN 'Não Atingido'
            WHEN 4 THEN 'Em Andamento'
         END descr_situacao_RChave,
         t5.data_atualizacao,
         t5.usuario_atualizador,
         t5.ativo,
         t7.id_medicao,
         t7.data_medicao,
         t7.medicao,
         t7.comentario,
         t7.usuario_atualizador,
         t7.data_atualizacao
   FROM ttl_empresa t1 INNER JOIN ttl_objetivos t2
     ON t1.id_empresa = t2.id_empresa
                       INNER JOIN ttl_empresa_times t3
     ON t2.id_time = t3.id_time
                     INNER JOIN ttl_usuario t4
     ON t2.responsavel = t4.id_usuario
                     INNER JOIN ttl_resultados_chave t5
     ON t2.id_objetivo = t5.id_objetivo
                     INNER JOIN ttl_usuario t6
     ON t5.responsavel = t6.id_usuario
                     LEFT OUTER JOIN ttl_rchave_medicoes t7
     ON t5.id_resultado_chave = t7.id_resultado_chave
                     LEFT OUTER JOIN ttl_objetivos t8
     ON t2.parent_id = t8.id_objetivo
                       LEFT OUTER JOIN
( select t11.id_objetivo, min(t12.inicio_vigencia) data_ini_objetivo,
                        max(t12.fim_vigencia) data_fim_objetivo
   from ttl_objetivo_ciclo t11 INNER JOIN ttl_ciclos t12
     on t11.id_ciclo = t12.id_ciclo
   where t12.ativo = 1
  group by t11.id_objetivo
) v9
     ON t2.id_objetivo = v9.id_objetivo
  WHERE ( t1.ativo = 1 AND t2.ativo = 1 AND t3.ativo = 1 AND t4.ativo = 1 AND t5.ativo = 1 AND t6.ativo = 1 ) 
   AND  ( t1.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t2.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t3.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t4.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t5.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t6.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t7.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim
        );

     
-- 3. ttl_rel_obj_atividade

   DELETE FROM ttl_rel_obj_atividade WHERE data_execucao = vData_Execucao;

INSERT INTO ttl_rel_obj_atividade ( data_execucao, id_empresa, nome_empresa, id_time, nome_time, id_usuario,
                                nome_usuario, id_objetivo, data_ini_objetivo, data_fim_objetivo,
                                          nome_objetivo, progresso_objetivo, parent_id, objetivo_pai,
                                descricao_objetivo, peso, percentual_avaliacao,
                                id_tipo_avaliacao, qtd_objetivos, qtd_atividades, qtd_rchaves,
                                publico, situacao, descr_situacao, avaliacao, descr_avaliacao, destaque,
                                cor, data_atualiz_obj, usuario_atualiz_obj, ativo, hierarquia_times,
                                corresponsaveis, id_resultado_chave, nome_RChave, descr_RChave, frequencia_RChave,
                                unidade_meta_RChave, meta_final_prev_RChave, medicao_RChave,
                                peso_RChave, progresso_RChave, responsavel_RChave, nome_resp_RChave,
                                corresponsaveis_RChave, publico_RChave, situacao_RChave, descr_situacao_RChave,
                                data_atualiz_RChave, usuario_atualiz_RChave, ativo_RChave,
                                id_atividade, nome_atividade, descr_atividade, data_ini_ativ, data_fim_ativ,
                                hora_ativ, id_tipo_ativ, nome_tipo_ativ, data_fim_real_ativ, situacao_ativ,
                                descr_situacao_ativ, progresso_ativ, id_responsavel_ativ, responsavel_ativ,
                                corresponsaveis_ativ, data_atualiz_ativ, usuario_atualiz_ativ, ativo_ativ
                              )
SELECT vData_Execucao, t1.id_empresa, t1.nome_empresa, t3.id_time,
       t3.nome_unidade nome_time, t4.id_usuario, t4.nome_usuario,
       t2.id_objetivo, v9.data_ini_objetivo, v9.data_fim_objetivo, t2.nome nome_objetivo, t2.percentual,
       t2.parent_id, t8.nome objetivo_pai, t2.descricao descr_objetivo,
       t2.peso, t2.percentual_avaliacao, t2.id_tipo_atualizacao, t2.qtd_objetivos, t2.qtd_atividades,
       t2.qtd_rchaves, t2.publico,
       t2.situacao,
            CASE t2.situacao
               WHEN 0 THEN 'Pendente'
               WHEN 1 THEN 'Concluído'
               WHEN 2 THEN 'Cancelado'
               WHEN 3 THEN 'Em Andamento'
            END descr_situacao,
            t2.avaliacao,
            CASE t2.avaliacao
               WHEN 0 THEN 'Não Atingido'
               WHEN 1 THEN 'Atingido'
               WHEN 2 THEN 'Cancelado'
               WHEN 3 THEN 'Em Andamento'
            END descr_avaliacao,
            t2.destaque, t2.cor, t2.data_atualizacao,
         t2.usuario_atualizador, t2.ativo,
         f_string_hierarq_locais(t3.id_time),
         f_string_corresp(t2.id_objetivo),
         t5.id_resultado_chave,
         t5.nomeRChave,
         t5.descricao,
         t5.frequencia,
         t5.unidade_meta,
         t5.meta_final_prevista,
         t5.medicao,
         t5.peso,
         t5.progresso,
         t5.responsavel,
         t6.nome_usuario nome_resp_RChave,
         f_string_corresp_RChave(t5.id_resultado_chave) corresponsaveis_RChave,
         t5.publico,
         t5.situacao,
         CASE t5.situacao
            WHEN 1 THEN 'Pendente'
            WHEN 2 THEN 'Atingido'
            WHEN 3 THEN 'Não Atingido'
            WHEN 4 THEN 'Em Andamento'
         END descr_situacao_RChave,
         t5.data_atualizacao,
         t5.usuario_atualizador,
         t5.ativo,
         t7.id_atividade,
         t7.nome,
         t7.descricao,
         t7.data_ini,
         t7.data_fim,
         t7.hora,
         t7.id_tipo_atividade,
         t77.nome_atividade,
         t7.data_fim_real,
         t7.situacao,
         CASE t7.situacao
            WHEN 0 THEN 'Pendente'
            WHEN 1 THEN 'Concluído'
            WHEN 2 THEN 'Cancelado'
            WHEN 3 THEN 'Em Andamento'
         END descr_sit_ativ,
         t7.progresso,
         t7.responsavel,
         t777.nome_usuario,
         f_string_corresp_ativ(t7.id_atividade) corresponsaveis_ativ,
         t7.data_atualizacao,
         t7.usuario_atualizador,
         t7.ativo
   FROM ttl_empresa t1 INNER JOIN ttl_objetivos t2
     ON t1.id_empresa = t2.id_empresa
                       INNER JOIN ttl_empresa_times t3
     ON t2.id_time = t3.id_time
                     INNER JOIN ttl_usuario t4
     ON t2.responsavel = t4.id_usuario
                     INNER JOIN ttl_resultados_chave t5
     ON t2.id_objetivo = t5.id_objetivo
                     INNER JOIN ttl_usuario t6
     ON t5.responsavel = t6.id_usuario
                     INNER JOIN ttl_atividades t7
     ON t5.id_resultado_chave = t7.id_resultado_chave
                     LEFT OUTER JOIN ttl_tipo_atividades t77
     ON t7.id_tipo_atividade = t77.id_tipo_atividade
                     LEFT OUTER JOIN ttl_usuario t777
     ON t7.responsavel = t777.id_usuario
                     LEFT OUTER JOIN ttl_objetivos t8
     ON t2.parent_id = t8.id_objetivo
                       LEFT OUTER JOIN
( select t11.id_objetivo, min(t12.inicio_vigencia) data_ini_objetivo,
                        max(t12.fim_vigencia) data_fim_objetivo
   from ttl_objetivo_ciclo t11 INNER JOIN ttl_ciclos t12
     on t11.id_ciclo = t12.id_ciclo
   where t12.ativo = 1
  group by t11.id_objetivo
) v9
     ON t2.id_objetivo = v9.id_objetivo
  WHERE ( t1.ativo = 1 AND t2.ativo = 1 AND t3.ativo = 1 AND t4.ativo = 1 AND t5.ativo = 1 AND t6.ativo = 1 AND t7.ativo = 1 ) 
   AND  ( t1.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t2.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t3.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t4.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t5.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t6.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim OR
          t7.data_atualizacao BETWEEN vData_hora_ini AND vData_hora_fim
        );



   COMMIT;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_gera_resumo_avaliacoes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_gera_resumo_avaliacoes`()
BEGIN  

DECLARE EXIT HANDLER FOR SQLEXCEPTION
   BEGIN
      ROLLBACK;
      GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, @errno = MYSQL_ERRNO, 
                                  @text = MESSAGE_TEXT; 
      SET @erro = CONCAT("ERRO ", @errno, " (", @sqlstate, "): ", @text); 
      SELECT @erro;  
   END;

     create temporary table if not exists tmp_trabalho_1
        ( id_ciclo     INTEGER, 
          nome_ciclo   VARCHAR(50),
          ano_ciclo    INTEGER,
          id_usuario   INTEGER,
          nome_usuario VARCHAR(250),
          id_janela    INTEGER,
          id_time      INTEGER,
          nome_time    VARCHAR(250),
          tot_obj      INTEGER,
          tot_obj_atg  INTEGER,
          perc_obj_atg DOUBLE
        );
        
     create temporary table if not exists tmp_trabalho_2
        ( id_ciclo     INTEGER, 
          nome_ciclo   VARCHAR(50),
          ano_ciclo    INTEGER,
          id_usuario   INTEGER,
          nome_usuario VARCHAR(250),
          id_janela    INTEGER,
          id_time      INTEGER,
          nome_time    VARCHAR(250),
          tot_rch      INTEGER,
          tot_rch_atg  INTEGER,
          perc_rch_atg DOUBLE
        );
        
     create temporary table if not exists tmp_avaliacao_usuario_1
        ( id_ciclo     INTEGER, 
          nome_ciclo   VARCHAR(50),
          ano_ciclo    INTEGER,
          id_usuario   INTEGER,
          nome_usuario VARCHAR(250),
          id_janela    INTEGER,
          id_time      INTEGER,
          nome_time    VARCHAR(250),
          tot_obj      INTEGER,
          tot_obj_atg  INTEGER,
          perc_obj_atg DOUBLE,
          tot_rch      INTEGER,
          tot_rch_atg  INTEGER,
          perc_rch_atg DOUBLE
        );
        
     create temporary table if not exists tmp_avaliacao_usuario_2
        ( id_ciclo     INTEGER, 
          nome_ciclo   VARCHAR(50),
          ano_ciclo    INTEGER,
          id_usuario   INTEGER,
          nome_usuario VARCHAR(250),
          id_janela    INTEGER,
          id_time      INTEGER,
          nome_time    VARCHAR(250),
          tot_obj      INTEGER,
          tot_obj_atg  INTEGER,
          perc_obj_atg DOUBLE,
          tot_rch      INTEGER,
          tot_rch_atg  INTEGER,
          perc_rch_atg DOUBLE
        );
        
     create temporary table if not exists tmp_ciclos
       ( id_ciclo      INTEGER );

  START TRANSACTION;

delete from tmp_trabalho_1 where 1 = 1;
delete from tmp_trabalho_2 where 1 = 1;
delete from tmp_avaliacao_usuario_1 where 1 = 1;
delete from tmp_avaliacao_usuario_2 where 1 = 1;
delete from tmp_ciclos where 1 = 1;


-- 0. Seleciona ciclos a tratar


insert into tmp_ciclos ( id_ciclo )
select t5.id_ciclo from ttl_ciclos t5
 INNER JOIN
( select v1.id_ciclo_1, v2.id_ciclo_2
   from 
( select t1.id_ciclo id_ciclo_1, 
       date_add(t1.inicio_vigencia, interval -1 day) fim_vig_ant,
       t2.id_empresa
   from ttl_ciclos t1 inner join ttl_janela t2
     on t1.id_janela = t2.id_janela
    where t1.ativo = 1
     and  current_date() BETWEEN t1.inicio_vigencia and t1.fim_vigencia
) v1
     left outer join 
( select t3.id_ciclo id_ciclo_2, t3.fim_vigencia, t4.id_empresa
    from ttl_ciclos t3 inner join ttl_janela t4
     on t3.id_janela = t4.id_janela
    where t3.ativo = 1
) v2
   on v1.id_empresa = v2.id_empresa
  and v1.fim_vig_ant = v2.fim_vigencia
) v3
   on t5.id_ciclo in (v3.id_ciclo_1, v3.id_ciclo_2);

-- 1. insere dados em tmp_trabalho_1 ( objetivos )

insert into tmp_trabalho_1 ( id_ciclo, nome_ciclo, ano_ciclo, id_usuario, nome_usuario, id_janela, id_time, nome_time, 
                           tot_obj, tot_obj_atg, perc_obj_atg
                         )
select v4.id_ciclo, v4.nome_ciclo, v4.ano_ciclo, v4.id_usuario, v4.nome_usuario, v4.id_janela, v4.id_time, t7.nome_unidade,
       v4.tot_obj, v4.tot_atg, round((v4.tot_atg / v4.tot_obj) * 100.00)  from
( select v3.id_ciclo, v3.nome_ciclo, v3.ano_ciclo, v3.id_usuario, v3.nome_usuario, v3.id_janela, v3.id_time,
       count(*) tot_obj, sum(CASE WHEN v3.situacao = 1 THEN 1 ELSE 0 END) tot_atg
  from
( select distinct v2.id_ciclo, v2.nome_ciclo, v2.ano_ciclo, v2.id_usuario, v2.id_janela, v2.id_objetivo, 
                  v2.situacao, t6.nome_usuario, t6.id_time
  from 
   ( select t5.id_ciclo, t5.nome_ciclo, year(t5.inicio_vigencia) ano_ciclo, v1.id_usuario, t5.id_janela, 
	         v1.id_objetivo, v1.situacao
     from 
     ( select t1.responsavel id_usuario, t1.id_objetivo, t1.situacao 
         from ttl_objetivos t1 
         where t1.ativo = 1
          and  t1.parent_id IS NOT NULL
         UNION 
       select t2.id_usuario, t2.id_objetivo, t3.situacao
         from ttl_obj_responsaveis t2 inner join ttl_objetivos t3
          on t2.id_objetivo = t3.id_objetivo
         where t3.ativo = 1
          and  t3.parent_id IS NOT NULL  
     ) v1  
      INNER JOIN ttl_objetivo_ciclo t4
         ON v1.id_objetivo = t4.id_objetivo
      INNER JOIN ttl_ciclos t5
         ON t4.id_ciclo = t5.id_ciclo
     WHERE t5.ativo = 1
      AND  t5.id_ciclo in ( select id_ciclo from tmp_ciclos )
   ) v2 
    INNER JOIN ttl_usuario t6
     ON v2.id_usuario = t6.id_usuario
)  v3   
 group by  v3.id_ciclo, v3.nome_ciclo, v3.ano_ciclo, v3.id_usuario, v3.nome_usuario, v3.id_janela, v3.id_time
) v4 
      LEFT OUTER JOIN ttl_empresa_times t7
   ON v4.id_time = t7.id_time;
   
-- 2. insere dados em tmp_trabalho_2 ( resultados_chave )

insert into tmp_trabalho_2 ( id_ciclo, nome_ciclo, ano_ciclo, id_usuario, nome_usuario, id_janela, id_time, nome_time, 
                           tot_rch, tot_rch_atg, perc_rch_atg
                         )
select v4.id_ciclo, v4.nome_ciclo, v4.ano_ciclo, v4.id_usuario, v4.nome_usuario, v4.id_janela, v4.id_time, 
   t7.nome_unidade, v4.tot_rch, v4.tot_atg, round((v4.tot_atg / v4.tot_rch) * 100.00)  
		  from
( select v3.id_ciclo, v3.nome_ciclo, v3.ano_ciclo, v3.id_usuario, v3.nome_usuario, v3.id_janela, v3.id_time,
       count(*) tot_rch, sum(CASE WHEN v3.situacao = 'Atingido' THEN 1 ELSE 0 END) tot_atg
   from
( select distinct v2.id_ciclo, v2.nome_ciclo, v2.ano_ciclo, v2.id_usuario, v2.id_janela, v2.id_resultado_chave, 
                  v2.situacao, t6.nome_usuario, t6.id_time
  from 
   ( select t5.id_ciclo, t5.nome_ciclo, year(t5.inicio_vigencia) ano_ciclo, v1.id_usuario, t5.id_janela, 
	         v1.id_resultado_chave, v1.situacao
     from 
	  ( select t1.responsavel id_usuario, t1.id_resultado_chave, t1.id_objetivo, t1.situacao
        from ttl_resultados_chave t1
           where t1.ativo = 1
           UNION
       select t2.id_usuario, t2.id_resultado_chave, t3.id_objetivo,  t3.situacao
        from ttl_rchave_responsaveis t2 inner join ttl_resultados_chave t3
          on t2.id_resultado_chave = t3.id_resultado_chave
           where t3.ativo = 1
     ) v1
      INNER JOIN ttl_objetivo_ciclo t4
         ON v1.id_objetivo = t4.id_objetivo
      INNER JOIN ttl_ciclos t5
         ON t4.id_ciclo = t5.id_ciclo
     WHERE t5.ativo = 1
      AND  t5.id_ciclo in ( select id_ciclo from tmp_ciclos )
   ) v2 
    INNER JOIN ttl_usuario t6
     ON v2.id_usuario = t6.id_usuario
)  v3  
   group by  v3.id_ciclo, v3.nome_ciclo, v3.ano_ciclo, v3.id_usuario, v3.nome_usuario, v3.id_janela, v3.id_time 
) v4 
    LEFT OUTER JOIN ttl_empresa_times t7
   ON v4.id_time = t7.id_time;
   
-- 3. condensa as duas tabelas temporárias

insert into tmp_avaliacao_usuario_1 ( id_ciclo, nome_ciclo, ano_ciclo, id_usuario, nome_usuario,
          id_janela, id_time, nome_time, tot_obj, tot_obj_atg, perc_obj_atg, tot_rch, tot_rch_atg,
          perc_rch_atg ) 
   select v5.id_ciclo, v5.nome_ciclo, v5.ano_ciclo, v5.id_usuario, v5.nome_usuario, v5.id_janela, v5.id_time, 
          v5.nome_time, max(v5.tot_obj), max(v5.tot_obj_atg), max(v5.perc_obj_atg),
          max(v5.tot_rch), max(v5.tot_rch_atg), max(v5.perc_rch_atg)
   from 
( select t1.id_ciclo, t1.nome_ciclo, t1.ano_ciclo, t1.id_usuario, t1.nome_usuario, t1.id_janela, t1.id_time,
       t1.nome_time, t1.tot_obj, t1.tot_obj_atg, t1.perc_obj_atg, 0 tot_rch, 0 tot_rch_atg, 0.00 perc_rch_atg
     from tmp_trabalho_1 t1
        UNION
  select t2.id_ciclo, t2.nome_ciclo, t2.ano_ciclo, t2.id_usuario, t2.nome_usuario, t2.id_janela, t2.id_time,
       t2.nome_time, 0, 0, 0.00, t2.tot_rch, t2.tot_rch_atg, t2.perc_rch_atg
     from tmp_trabalho_2 t2
) v5
   group by v5.id_ciclo, v5.nome_ciclo, v5.ano_ciclo, v5.id_usuario, v5.nome_usuario, v5.id_janela, v5.id_time, 
          v5.nome_time;

-- 4. gera registros de usuarios ativos sem objetivos e sem resultados-chave

insert into tmp_avaliacao_usuario_2 ( id_ciclo, nome_ciclo, ano_ciclo, id_usuario, nome_usuario,
          id_janela, id_time, nome_time, tot_obj, tot_obj_atg, perc_obj_atg, tot_rch, tot_rch_atg,
          perc_rch_atg ) 
   select t3.id_ciclo, t3.nome_ciclo, year(t3.inicio_vigencia), t1.id_usuario, t1.nome_usuario, 
	       t3.id_janela, t1.id_time, t2.nome_unidade, 0, 0, 0.00, 0, 0, 0.00
	     from ttl_usuario t1 INNER JOIN ttl_janela t11
	        on t1.id_empresa = t11.id_empresa
	                         INNER JOIN ttl_ciclos t3
	        on t11.id_janela = t3.id_janela
	                         INNER JOIN ttl_empresa_times t2
	        on t1.id_time = t2.id_time
		  where t1.ativo = 1
		   and  t3.id_ciclo in ( select id_ciclo from tmp_ciclos )
		   and  not exists ( select 1 from tmp_avaliacao_usuario_1 t4
		                       where t4.id_usuario = t1.id_usuario
		                        and  t4.id_ciclo = t3.id_ciclo
			                );

-- 5. Elimina registros zerados

    delete from ttl_avaliacao_usuario
       where numero_objetivos = 0 and numero_rchave = 0
        and  id_ciclo in ( select id_ciclo from tmp_ciclos );
			                
-- 6. Geração em ttl_avaliacao_usuario

   
    insert into ttl_avaliacao_usuario ( id_ciclo, nome_ciclo, ano_ciclo, id_usuario, nome_usuario, 
              id_janela, id_time, nome_time, numero_objetivos, numero_rchave, perc_atingido_objetivos,
				  perc_atingido_rchave, ativo )
		select t1.id_ciclo, t1.nome_ciclo, t1.ano_ciclo, t1.id_usuario, t1.nome_usuario, t1.id_janela,
		       t1.id_time, t1.nome_time, t1.tot_obj, t1.tot_rch, t1.perc_obj_atg, t1.perc_rch_atg, 1
		   from tmp_avaliacao_usuario_1 t1
		      where NOT EXISTS ( select 1 from ttl_avaliacao_usuario t2
		                             where t1.id_ciclo   = t2.id_ciclo
		                              and  t1.id_usuario = t2.id_usuario
		                              and  (t2.numero_objetivos > 0 or t2.numero_rchave > 0 )
		                       );
		   

    insert into ttl_avaliacao_usuario ( id_ciclo, nome_ciclo, ano_ciclo, id_usuario, nome_usuario, 
              id_janela, id_time, nome_time, numero_objetivos, numero_rchave, perc_atingido_objetivos,
				  perc_atingido_rchave, ativo )
		select t1.id_ciclo, t1.nome_ciclo, t1.ano_ciclo, t1.id_usuario, t1.nome_usuario, t1.id_janela,
		       t1.id_time, t1.nome_time, t1.tot_obj, t1.tot_rch, t1.perc_obj_atg, t1.perc_rch_atg, 1
		   from tmp_avaliacao_usuario_2 t1;
		   


     
                          
  COMMIT;
  
  drop table if exists tmp_trabalho_1;
  drop table if exists tmp_trabalho_2; 
  drop table if exists tmp_avaliacao_usuario_1;
  drop table if exists tmp_avaliacao_usuario_2;
  drop table if exists tmp_ciclos;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_hierarq_locais` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_hierarq_locais`(
	IN p_id_time INTEGER,
	INOUT p_string VARCHAR(2000)
)
BEGIN  

   DECLARE vString                VARCHAR(2000);
   DECLARE curId_time             INTEGER;
   DECLARE curTime                VARCHAR(280);
   DECLARE vQtd_filhos            INTEGER;
   DECLARE vFim_cursor            BOOL DEFAULT FALSE;

   DECLARE cur_time CURSOR FOR 
      SELECT id_time, concat(t1.id_time, ':', t1.nome_unidade) 
          FROM ttl_empresa_times t1 
      WHERE t1.parent_id = p_id_time;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

   SET vString = p_string;

   IF vString IS NULL THEN
      SET vString =  '';
   END IF;
   
   OPEN cur_time;

   loop_time: LOOP
      FETCH cur_time INTO curId_time, curTime;

      IF vFim_cursor THEN
         LEAVE loop_time;
      END IF;

      SET vString = concat(vString, curTime, ';'); 

      SET vQtd_filhos = 0;

      SELECT count(*) INTO vQtd_filhos FROM ttl_empresa_times WHERE parent_id = curId_time;

      IF vQtd_filhos > 0 THEN
         call sp_hierarq_locais ( curId_time, vString );
      END IF;

      SET vFim_cursor = FALSE;
       
   END LOOP;

   CLOSE cur_time;

   SET p_string = vString;
   
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_le_objetivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_le_objetivos`(
	IN `p_id_objetivo` INTEGER,
	IN `p_id_nodo` INTEGER
,
	INOUT `p_string` TEXT

)
    MODIFIES SQL DATA
BEGIN 
  
     DECLARE     vId_objetivo       INTEGER; 
     DECLARE     vId_objetivo_CHAR  VARCHAR(20);
     DECLARE     vTitle1            VARCHAR(200);
     DECLARE     vIndex1            VARCHAR(250);
     DECLARE     vPercentage        DOUBLE;
     DECLARE     vPercentage_CHAR   VARCHAR(20);
     DECLARE     vPoptitle          VARCHAR(200);
     DECLARE     vProfilimage       VARCHAR(500);
     DECLARE     vProfileName       VARCHAR(250);
     DECLARE     vProfileskill      VARCHAR(250);
     DECLARE     vProfileDesc       VARCHAR(1000);
     DECLARE     vIcondetailsfirst  VARCHAR(100);
     DECLARE     vIcondetailssecond VARCHAR(100);
     DECLARE     vIcondetailsthird  VARCHAR(100);
     DECLARE     vIcondetailsForth  CHAR(5);
     DECLARE     vParent_id         INTEGER;
     DECLARE     vParent_id_CHAR    VARCHAR(20);
     DECLARE     vQtdFilhos         INTEGER;
     DECLARE     vId_objetivo_filho INTEGER;
     DECLARE     vLinha             INTEGER;
     DECLARE     vTabs              VARCHAR(400);
     DECLARE     vCont              INTEGER;
     DECLARE vFim_cursor   BOOL DEFAULT FALSE;

     DECLARE cur_filhos CURSOR FOR 
       SELECT id_objetivo
          from ttl_objetivos
       WHERE parent_id = p_id_objetivo
        ORDER BY id_objetivo;

     DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;


	 
     SELECT max(indice) INTO vLinha from tmp_output;

     SET vLinha = vLinha + 1;
 
     INSERT INTO tmp_output ( indice, linha ) values ( vLinha, '[{');


     select v2.id_objetivo, v2.title1, v2.index1, v2.percentage, v2.poptitle, v2.profilimage, v2.profilename, v2.profileskill, 
            v2.profileDesc,
               CASE
                  WHEN ifnull(v2.parent_id,0) = 0 AND v2.qtdFilhos > 0 THEN 'GLOBAL'
                  WHEN ifnull(v2.parent_id,0) = 0 AND v2.qtdFilhos = 0 THEN 'INDIVIDUAL'
                  ELSE concat('"Contribui com ', cast(v2.peso as CHAR), '% para ',v2.nomePai,'"')
               END icondetailsfirst,
               CASE
                  WHEN DATE_FORMAT(SYSDATE(), '%Y') = DATE_FORMAT(v2.deadline, '%Y') THEN
                     concat('"Planejado para o ', v2.descr_deadline, '"')
                  WHEN DATE_FORMAT(SYSDATE(), '%Y') < DATE_FORMAT(v2.deadline, '%Y') THEN
                     concat('"Planejado para o ', v2.descr_deadline, ' de ', CAST(DATE_FORMAT(v2.deadline, '%Y') as CHAR), '"')
 
               END icondetailssecond,
               CASE 
                  WHEN DATEDIFF(SYSDATE(), v2.icondetailsthird) < 7 THEN
                       concat('Última atualização há ', CAST(DATEDIFF(SYSDATE(), v2.icondetailsthird) as CHAR), ' dia(s)')
                  WHEN DATEDIFF(SYSDATE(), v2.icondetailsthird) < 30 THEN
                       concat('Última atualização há ', CAST(FLOOR(DATEDIFF(SYSDATE(), v2.icondetailsthird)/7) as CHAR), ' semana(s)')
                  ELSE concat('Última atualização há ', CAST(FLOOR(DATEDIFF(SYSDATE(), v2.icondetailsthird)/30) as CHAR), ' mes(es)')
               END icondetailsthird,
               'Close' icondetailsForth,
               ifnull(v2.parent_id,0),
               v2.qtdFilhos 
          INTO
                vId_objetivo, vTitle1, vIndex1, vPercentage, vPoptitle, vProfilimage, vProfileName, vProfileskill, vProfileDesc,
                vIcondetailsfirst, vIcondetailssecond, vIcondetailsthird, vIcondetailsForth, vParent_id, vQtdFilhos
 from 
( select v1.id_objetivo, v1.title1, v1.index1, v1.percentage, v1.poptitle, v1.profilimage, v1.profilename, v1.profileskill, 
         v1.profileDesc, v1.icondetailsthird, v1.peso, v1.parent_id, v1.nomePai, v1.fim_janela, v1.janela, v1.fim_ciclo, t9.nome_ciclo, 
         ifnull(v1.fim_ciclo,v1.fim_janela) deadline, 
			ifnull(t9.nome_ciclo, concat('final de ',v1.janela)) descr_deadline,
    sum(CASE WHEN t10.id_objetivo IS NULL THEN 0 ELSE 1 END) qtdFilhos
  FROM
       (   SELECT t1.id_objetivo, t1.nome title1, t2.nome_unidade index1, t1.percentual percentage, t1.nome poptitle, 
                  t3.url_image profilimage, t3.nome_usuario profilename, 
                  t4.nome_unidade profileskill, t1.descricao profileDesc, t1.data_atualizacao icondetailsthird, t1.peso, t1.parent_id, 
                  t7.nome nomePai, t11.data_final fim_janela, t11.descricao janela,
                  max(CASE WHEN t99.ativo = 1 THEN t99.fim_vigencia ELSE NULL END) fim_ciclo
                from ttl_objetivos t1 INNER JOIN ttl_janela t11
                   on t1.id_janela   = t11.id_janela
					                       INNER JOIN ttl_usuario t3
                   on t1.responsavel = t3.id_usuario
                                      LEFT OUTER JOIN ttl_empresa_times t4
                   on t3.id_time     = t4.id_time
                                      LEFT OUTER JOIN ttl_empresa_times t2
                   on t1.id_time     = t2.id_time
                                      LEFT OUTER JOIN ttl_objetivos t7
                   on t1.parent_id   = t7.id_objetivo
                                      LEFT OUTER JOIN ttl_objetivo_ciclo t88
                   on t1.id_objetivo = t88.id_objetivo
                                      LEFT OUTER JOIN ttl_ciclos t99
                   on t88.id_ciclo = t99.id_ciclo
                where t1.id_objetivo = p_id_objetivo
              group by t1.id_objetivo, t1.nome, t2.nome_unidade, t1.percentual, t1.nome, 
                  t3.url_image, t3.nome_usuario, t4.nome_unidade, t1.descricao, t1.data_atualizacao, 
						t1.peso, t1.parent_id, t7.nome, t11.data_final, t11.descricao
	   ) v1  
               LEFT OUTER JOIN ttl_objetivo_ciclo t8
                   ON v1.id_objetivo = t8.id_objetivo
               LEFT OUTER JOIN ttl_ciclos t9
                   ON t8.id_ciclo    = t9.id_ciclo
                  AND t9.fim_vigencia = v1.fim_ciclo
               LEFT OUTER JOIN ttl_objetivos t10
                   ON t10.parent_id   = v1.id_objetivo
          group by v1.title1, v1.index1, v1.percentage, v1.poptitle, v1.profilimage, v1.profilename, v1.profileskill, 
         v1.profileDesc, v1.icondetailsthird, v1.peso, v1.parent_id, v1.nomePai, v1.fim_janela, v1.janela, v1.fim_ciclo, t9.nome_ciclo,
         ifnull(v1.fim_ciclo,v1.fim_janela), ifnull(t9.nome_ciclo, concat('janela ',v1.janela))
  ) v2;

  SET vId_objetivo_CHAR  = CAST(vId_objetivo as CHAR); 
  SET vTitle1            = ifnull(vTitle1,' ');
  SET vIndex1            = ifnull(vIndex1,' ');
  SET vPercentage_CHAR   = ifnull(CAST(vPercentage as CHAR),' ');
  SET vPoptitle          = ifnull(vPoptitle,' ');
  SET vProfilimage       = ifnull(vProfilimage,' ');
  SET vProfileName       = ifnull(vProfileName,' ');
  SET vProfileskill      = ifnull(vProfileskill,' ');
  SET vProfileDesc       = ifnull(vProfileDesc,' ');
  SET vIcondetailsfirst  = ifnull(vIcondetailsfirst,' ');
  SET vIcondetailssecond = ifnull(vIcondetailssecond, ' ');
  SET vIcondetailsthird  = ifnull(vIcondetailsthird,' ');
  SET vIcondetailsForth  = ifnull(vIcondetailsForth,' ');
  SET vParent_id_CHAR    =  CAST(vParent_id as CHAR);


  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"id" : "', vId_objetivo_CHAR, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"title1" : "', vTitle1, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"index1" : "', vIndex1, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"percentage" : "', vPercentage_CHAR, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"poptitle" : "', vPoptitle, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"profilimage" : "', vProfilimage, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"profilename" : "', vProfileName, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"profileskill" : "', vProfileskill, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"profileDesc" : "', vProfileDesc, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"icondetailsfirst" : "', vIcondetailsfirst, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"icondetailssecond" : "', vIcondetailssecond, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"icondetailsthird" : "', vIcondetailsthird, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"icondetailsForth" : "', vIcondetailsForth, '",'));
  SET vLinha = vLinha + 1;
  INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  concat('"parent_id" : "', vParent_id_CHAR, '",'));
  SET vLinha = vLinha + 1;
  
  IF vQtdFilhos = 0 THEN

     INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  '"childeNode" : [],');

  ELSE

     INSERT INTO tmp_output ( indice, linha ) values ( vLinha,  '"childeNode" : [{');

     SET vCont = 0;

     OPEN cur_filhos;

     loop_filhos: LOOP
        FETCH cur_filhos INTO vId_objetivo_filho;

        IF vFim_cursor THEN
           LEAVE loop_filhos;
        END IF;

        CALL  sp_le_objetivos( vId_objetivo_filho, vCont );  

        SET vCont = vCont + 1;
        SELECT max(indice) INTO vLinha from tmp_output;
        SET vLinha = vLinha + 1;
        INSERT INTO tmp_output ( indice, linha ) values ( vLinha, '','},');
        
        SET vFim_cursor = FALSE;

     END LOOP; 

     CLOSE cur_filhos;

     SET vLinha = vLinha + 1;
     INSERT INTO tmp_output ( indice, linha ) values ( vLinha, '}],');
     
  END IF;

	 
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_output_file` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_output_file`(
	IN `p_id_objetivo` INTEGER(11) ,
	OUT `p_string` TEXT



)
    MODIFIES SQL DATA
BEGIN 

     DECLARE vString       TEXT;
		    
     set max_sp_recursion_depth = 255;
	  
     SET vString = '{';
     SET vString = concat(vString, ' ', '"id" : "0",');
     SET vString = concat(vString, '"childeNode" : [');

     CALL sp_le_objetivos ( p_id_objetivo, 0, vString );	

 
     SET vString = concat(vString, '}');
     SET vString = concat(vString, ']}');

     set max_sp_recursion_depth = 10;
     
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_processa_obj` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_processa_obj`()
BEGIN  

   DECLARE curId_objetivo         INTEGER;
   DECLARE vFim_cursor            BOOL DEFAULT FALSE;

   DECLARE cur_obj CURSOR FOR 
       SELECT id_objetivo
          from ttl_objetivos
       WHERE ativo = 1;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;

   DECLARE EXIT HANDLER FOR SQLEXCEPTION
       BEGIN
          ROLLBACK;
          GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, @errno = MYSQL_ERRNO, 
                                      @text = MESSAGE_TEXT; 
          SET @erro = CONCAT("ERRO ", @errno, " (", @sqlstate, "): ", @text); 
          SELECT @erro;  
       END;

     SET  max_sp_recursion_depth = 20;
     
      OPEN cur_obj;

      loop_obj: LOOP
         FETCH cur_obj INTO curId_objetivo;

         IF vFim_cursor THEN
            LEAVE loop_obj;
         END IF;

         START TRANSACTION;
            call sp_totais_obj ( curId_objetivo );
         COMMIT;

         SET vFim_cursor = FALSE;

      END LOOP;

      CLOSE cur_obj;      

      SET  max_sp_recursion_depth = 10;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_retorna_totais` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_retorna_totais`( IN    p_id_objetivo   INTEGER,
                                    INOUT p_qtd_rchave    INTEGER,
                                    INOUT p_qtd_ativ      INTEGER,
                                    INOUT p_qtd_obj       INTEGER
                                  )
BEGIN  

   DECLARE vQtd_rchave      INTEGER;
   DECLARE vQtd_ativ        INTEGER;
   DECLARE vQtd_obj         INTEGER;
   DECLARE curId_objetivo   INTEGER;
   
   DECLARE vFim_cursor   BOOL DEFAULT FALSE;

   DECLARE cur_filhos CURSOR FOR 
       SELECT id_objetivo
          from ttl_objetivos
       WHERE parent_id = p_id_objetivo
        ORDER BY id_objetivo;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET vFim_cursor = TRUE;


   select count(*), sum(v1.qtd_ativ)
      INTO vQtd_rchave, vQtd_ativ
       FROM ttl_resultados_chave t1 LEFT OUTER JOIN 
       ( select t0.id_resultado_chave, count(*) qtd_ativ
           from ttl_atividades t0
           where t0.ativo = 1
         group by t0.id_resultado_chave
       ) v1
          ON t1.id_resultado_chave = v1.id_resultado_chave
         where t1.ativo = 1
          and  t1.id_objetivo = p_id_objetivo
         group by t1.id_objetivo;

   select count(*) INTO vQtd_obj
      from ttl_objetivos
      where ativo = 1
       and  parent_id = p_id_objetivo;
     

   IF vQtd_obj > 0 THEN    
      OPEN cur_filhos;

      loop_filhos: LOOP
         FETCH cur_filhos INTO  curId_objetivo;     

         IF vFim_cursor THEN
            LEAVE loop_filhos;
         END IF;
          
         call sp_retorna_totais( curId_objetivo, p_qtd_rchave, p_qtd_ativ, p_qtd_obj );

         SET vFim_cursor = FALSE;
       
      END LOOP;

      CLOSE cur_filhos;

   END IF;

   SET p_qtd_rchave = ifnull(p_qtd_rchave,0) + ifnull(vQtd_rchave,0);
   SET p_qtd_ativ   = ifnull(p_qtd_ativ,0)   + ifnull(vQtd_ativ,0);
   SET p_qtd_obj    = ifnull(p_qtd_obj,0)    + ifnull(vQtd_obj,0);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_totais_obj` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`elofy`@`%` PROCEDURE `sp_totais_obj`( IN    p_id_objetivo   INTEGER
                                  )
BEGIN  

   DECLARE vQtd_rchave      INTEGER;
   DECLARE vQtd_ativ        INTEGER;
   DECLARE vQtd_obj         INTEGER;
   DECLARE vQtd_rchave_new  INTEGER;
   DECLARE vQtd_ativ_new    INTEGER;
   DECLARE vQtd_obj_new     INTEGER;

   SELECT qtd_rchaves, qtd_atividades, qtd_objetivos INTO vQtd_rchave, vQtd_ativ, vQtd_obj
       FROM ttl_objetivos
    WHERE id_objetivo = p_id_objetivo;
    
   call sp_retorna_totais( p_id_objetivo, vQtd_rchave_new, vQtd_ativ_new, vQtd_obj_new );

   IF ( ifnull(vQtd_rchave,0) !=  vQtd_rchave_new OR
	     ifnull(vQtd_ativ,0)   !=  vQtd_ativ_new   OR
		  ifnull(vQtd_obj,0)    !=  vQtd_obj_new 
	   ) THEN
	   
		UPDATE ttl_objetivos SET qtd_rchaves    = vQtd_rchave_new,
		                         qtd_atividades = vQtd_ativ_new, 
										 qtd_objetivos  = vQtd_obj_new
        WHERE id_objetivo = p_id_objetivo;
			
   END IF;   

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-11 13:47:54
