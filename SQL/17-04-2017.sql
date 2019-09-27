-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 02:57 PM
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
-- Database: `elofy11`
--

-- --------------------------------------------------------

--
-- Structure for view `v_pesquisas_respostas`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pesquisas_respostas`  AS  select distinct `t1`.`id_pesquisa` AS `id_pesquisa`,`t2`.`id_protocolo_questionario` AS `id_protocolo_questionario`,`t5`.`id_pergunta` AS `id_pergunta`,`t5`.`id_categoria_pergunta` AS `id_categoria`,`t7`.`nome_categoria` AS `nome_categoria`,`t3`.`id_usuario` AS `id_usuario`,`t8`.`nome_usuario` AS `nome_usuario`,`t333`.`id_usuario` AS `id_gestor`,`t333`.`nome_usuario` AS `nome_gestor`,`t3`.`resposta_qualitativa` AS `resposta_qualitativa`,`t3`.`rating_score` AS `rating_score`,`t4`.`resposta` AS `resposta`,`t5`.`pergunta` AS `pergunta`,`t5`.`tipo` AS `tipo`,`t5`.`escala` AS `escala`,`t6`.`id_usuario_avaliado` AS `usuario_avaliado`,`t8`.`nome_unidade` AS `nome_unidade`,`t8`.`id_time` AS `id_unidade`,`t8`.`id_cargo` AS `id_cargo`,`t8`.`nome_cargo` AS `nome_cargo`,`t1`.`anonima` AS `anonima` from (((((((((`ttl_pesquisa` `t1` join `ttl_protocolo_questionario` `t2` on((`t1`.`id_pesquisa` = `t2`.`id_pesquisa`))) join `ttl_protocolo_questionario_respostas` `t3` on((`t2`.`id_protocolo_questionario` = `t3`.`id_protocolo`))) join `ttl_usuario` `t33` on((`t3`.`id_usuario` = `t33`.`id_usuario`))) left join `ttl_usuario` `t333` on((`t33`.`id_gestor` = `t333`.`id_usuario`))) left join `ttl_pergunta_resposta` `t4` on((`t3`.`id_pergunta_resposta` = `t4`.`id_pergunta_resposta`))) left join `ttl_perguntas` `t5` on((`t3`.`id_pergunta` = `t5`.`id_pergunta`))) left join `ttl_publico_pesquisa` `t6` on((`t1`.`id_pesquisa` = `t6`.`id_pesquisa`))) left join `ttl_categoria_pergunta` `t7` on((`t5`.`id_categoria_pergunta` = `t7`.`id_categoria_pergunta`))) left join `v_usuariostime` `t8` on((`t3`.`id_usuario` = `t8`.`id_usuario`))) ;

--
-- VIEW  `v_pesquisas_respostas`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
