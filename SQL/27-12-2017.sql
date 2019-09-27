ALTER TABLE `ttl_objetivos` CHANGE `tipo` `tipo` CHAR(1) NULL DEFAULT NULL;

ALTER
 ALGORITHM = UNDEFINED
 DEFINER = root@localhost
 SQL SECURITY DEFINER
 VIEW `v_objetivos`
     AS select `t1`.`id_empresa` AS `id_empresa`,`t1`.`id_janela` AS `id_janela`,`t1`.`id_objetivo` AS `id_objetivo`,`t1`.`nome` AS `nome`,`t1`.`descricao` AS `descricao`,`t1`.`parent_id` AS `parent_id`,`t1`.`percentual` AS `percentual`,`t1`.`qtd_atividades` AS `qtd_atividades`,`t1`.`qtd_rchaves` AS `qtd_rchaves`,`t1`.`peso` AS `peso`,`t1`.`situacao` AS `situacao`,`t1`.`cor` AS `cor`,`t1`.`responsavel` AS `responsavel`,`t1`.`id_time` AS `id_time`,`t1`.`ativo` AS `ativo`,`t2`.`id_usuario` AS `id_usuario`,`t1`.`tipo` as `type` from (`ttl_objetivos` `t1` join `ttl_usuario` `t2` on((1 = 1))) where ((`t1`.`parent_id` is not null) and (`t1`.`ativo` = 1) and (((`t2`.`id_empresa` = `t1`.`id_empresa`) and ((`t2`.`admin` + `t2`.`gestor`) > 0)) or (`t2`.`id_usuario` = `t1`.`responsavel`) or `t2`.`id_usuario` in (select `t3`.`id_usuario` from `ttl_obj_responsaveis` `t3` where (`t3`.`id_objetivo` = `t1`.`id_objetivo`))));