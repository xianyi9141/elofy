-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 01:41 PM
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
-- Table structure for table `ttl_email_templates`
--

CREATE TABLE IF NOT EXISTS `ttl_email_templates` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `constants` varchar(255) DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 COMMENT='Table for email templates';

--
-- Dumping data for table `ttl_email_templates`
--

INSERT INTO `ttl_email_templates` (`id`, `name`, `subject`, `action`, `constants`, `body`, `created_at`, `updated_at`) VALUES
(3, 'Activity add', 'New activity ({ACTIVITY_NAME}) added', 'activity_added', '{USER_NAME},{LINK},{ACTIVITY_NAME}', '<p style="font-size:16px; font-weight:bold; font-family:arial; color:#000; text-align: center;">Hi, {USER_NAME}</p>\n                                <p style="font-size:34px; font-weight:bold; font-family:arial; color:#000; text-align:center; margin:0 auto 30px;">Nova atividade adicionada</p>\n    <p style="font-size:12px; font-family:arial; color:#333; text-align:center; margin:0 auto 25px;padding: 0 30px; line-height: 20px;">Você foi designado como responsável por uma atividade. Clique no botão para acessá-la ou consulte periodicamente seu perfil</p>\n\n                                <a href="{LINK}" style="background: #03a9f4; border: 15px solid #03a9f4; font-family: sans-serif; font-size: 16px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 5px; font-weight: bold; width:200px; margin: 0 auto;" class="button-a"><span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;Click to go activity&nbsp;&nbsp;&nbsp;&nbsp;</span></a>\n                                <br>', '2014-09-02 00:00:00', '2015-12-24 16:25:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttl_email_templates`
--
ALTER TABLE `ttl_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttl_email_templates`
--
ALTER TABLE `ttl_email_templates`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;