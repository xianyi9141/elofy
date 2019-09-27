ALTER TABLE `ttl_categoria_competencias` CHANGE `id_categoria_competencias` `id_categoria_competencias` INT(11) NOT NULL AUTO_INCREMENT;

ALTER ALGORITHM = UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_competencias` AS select `c`.`id_empresa` AS `id_empresa`,`cc`.`id_categoria_competencias` AS `id_categoria_competencias`,`cc`.`nome_categoria` AS `nome_categoria`,`cc`.`descricao_categoria` AS `descricao_categoria`,`c`.`id_competencia` AS `id_competencia`,`c`.`nome_competencia` AS `nome_competencia`,`c`.`descricao` AS `descricao_competencia`,`c`.`tipo_competencia` AS `tipo_competencia` from (`elofy`.`ttl_competencias` `c` left join `elofy`.`ttl_categoria_competencias` `cc` on((`cc`.`id_categoria_competencias` = `c`.`id_categoria_competencia`))) where (`c`.`ativo` = 1);

