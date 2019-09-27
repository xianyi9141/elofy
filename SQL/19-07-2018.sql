ALTER TABLE `ttl_revisao_ciclo` ADD `days` INT(11) NOT NULL DEFAULT '0' AFTER `data_fim`;
USE `elofy_bd2`;
CREATE 
     OR REPLACE ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `v_pesquisa_geral` AS
    SELECT DISTINCT
        `t1`.`id_pesquisa` AS `id_pesquisa`,
        `t1`.`id_empresa` AS `id_empresa`,
        `t1`.`nome_pesquisa` AS `nome_pesquisa`,
        (CASE `t1`.`amostra`
            WHEN 0 THEN `t1`.`id_usuario_avaliado`
            WHEN 1 THEN `t3`.`id_usuario_avaliado`
        END) AS `usuario_avaliado`,
        `t8`.`nome_usuario` AS `nome_usuario_avaliado`,
        `t1`.`id_tipo_pesquisa` AS `id_tipo_pesquisa`,
        `t1`.`nome_tipo` AS `nome_tipo`,
        `t1`.`numero_dias` AS `numero_dias`,
        (CASE
            WHEN (`t3`.`id_tipo_questionario` = 0) THEN `t1`.`id_questionario`
            WHEN (`t3`.`id_tipo_questionario` = 1) THEN `t1`.`id_questionario_avaliado`
            WHEN (`t3`.`id_tipo_questionario` = 2) THEN `t1`.`id_questionario_gestor`
            WHEN (`t3`.`id_tipo_questionario` = 3) THEN `t1`.`id_questionario_pares`
            WHEN (`t1`.`amostra` = 0) THEN `t1`.`id_questionario`
        END) AS `id_questionario`,
        `t1`.`amostra` AS `amostra`,
        `t1`.`anonima` AS `anonima`,
        `t1`.`permite_pares` AS `permite_pares`,
        (CASE
            WHEN ISNULL(`t3`.`id_tipo_questionario`) THEN 0
            WHEN (`t3`.`id_tipo_questionario` = 2) THEN 1
            ELSE 0
        END) AS `gestor`,
        `t1`.`periodica` AS `periodica`,
        `t1`.`frequencia` AS `frequencia`,
        `t1`.`progresso` AS `progresso`,
        `t1`.`data_ini` AS `data_ini`,
        `t1`.`data_fim` AS `data_fim`,
        `t1`.`email` AS `email`,
        `t1`.`titulo_email` AS `titulo_email`,
        `t1`.`corpo_email` AS `corpo_email`,
        `t1`.`situacao` AS `situacao`,
        (CASE
            WHEN
                ((`t1`.`amostra` <> 0)
                    AND (`t4`.`id_protocolo_questionario` IS NOT NULL))
            THEN
                1
            WHEN
                ((`t1`.`amostra` = 0)
                    AND (`t44`.`id_protocolo_questionario` IS NOT NULL))
            THEN
                1
            ELSE 0
        END) AS `respondida`,
        `t1`.`fechado` AS `fechado`,
        `t1`.`ativo` AS `ativo`,
        `t1`.`id_usuario_atualizador` AS `id_usuario_atualizador`,
        `t1`.`data_atualizacao` AS `data_atualizacao`,
        `t2`.`id_usuario` AS `id_usuario`,
        `t2`.`nome_usuario` AS `nome_usuario`,
        `t7`.`id_time` AS `id_time_avaliado`,
        `t7`.`nome_unidade` AS `time_avaliado`,
        `t9`.`id_usuario` AS `id_gestor_avaliado`,
        `t9`.`nome_usuario` AS `gestor_avaliado`,
        `t10`.`id_usuario` AS `id_gestor_time_avaliado`,
        `t10`.`nome_usuario` AS `gestor_time_avaliado`,
        `t8`.`id_cargo` AS `id_cargo_usuario_avaliado`,
        `t11`.`nome_cargo` AS `cargo_usuario_avaliado`,
        `t8`.`data_aniversario` AS `admissao_avaliado`,
        (CASE
            WHEN
                ((`t1`.`amostra` <> 0)
                    AND (`t4`.`id_protocolo_questionario` IS NOT NULL))
            THEN
                `t4`.`data_atualizacao`
            WHEN
                ((`t1`.`amostra` = 0)
                    AND (`t44`.`id_protocolo_questionario` IS NOT NULL))
            THEN
                `t44`.`data_atualizacao`
            ELSE NULL
        END) AS `data_envio_respostas`,
        (CASE
            WHEN
                ((IFNULL(`t4`.`id_protocolo_questionario`,
                        `t44`.`id_protocolo_questionario`) IS NOT NULL)
                    AND (`t3`.`id_publico_pesquisa` IS NOT NULL))
            THEN
                `t3`.`id_tipo_questionario`
            ELSE 0
        END) AS `tipo_avaliador`,
        `t12`.`media` AS `media_gestor`,
        `t13`.`media` AS `media_avaliador`,
        `t14`.`media` AS `media_pares`,
        ((IFNULL(`t12`.`media`, 0) + IFNULL(`t14`.`media`, 0)) / (CASE
            WHEN
                ((`t12`.`media` IS NOT NULL)
                    AND (`t14`.`media` IS NOT NULL))
            THEN
                2
            ELSE 1
        END)) AS `nota_final`
    FROM
        ((((((((((((((`ttl_pesquisa` `t1`
        JOIN `ttl_usuario` `t2` ON ((`t1`.`id_empresa` = `t2`.`id_empresa`)))
        LEFT JOIN `ttl_publico_pesquisa` `t3` ON (((`t1`.`id_pesquisa` = `t3`.`id_pesquisa`)
            AND (`t2`.`id_usuario` = `t3`.`id_usuario`))))
        LEFT JOIN `ttl_protocolo_questionario` `t4` ON (((`t1`.`id_pesquisa` = `t4`.`id_pesquisa`)
            AND (`t3`.`id_publico_pesquisa` = `t4`.`id_publico_pesquisa`)
            AND (`t1`.`amostra` <> 0))))
        LEFT JOIN `ttl_protocolo_questionario` `t44` ON (((`t1`.`id_pesquisa` = `t44`.`id_pesquisa`)
            AND (`t2`.`id_usuario` = `t44`.`id_usuario`)
            AND (`t1`.`amostra` = 0))))
        LEFT JOIN `ttl_pesquisa_usuario` `t5` ON (((`t1`.`id_pesquisa` = `t5`.`id_pesquisa`)
            AND (`t2`.`id_usuario` = `t5`.`id_usuario`))))
        LEFT JOIN `ttl_time_usuario` `t6` ON ((((`t1`.`amostra` = 0)
            AND (`t1`.`id_usuario_avaliado` = `t6`.`id_usuario`))
            OR ((`t1`.`amostra` = 1)
            AND (`t3`.`id_usuario_avaliado` = `t6`.`id_usuario`)))))
        LEFT JOIN `ttl_empresa_times` `t7` ON ((`t6`.`id_empresa_time` = `t7`.`id_time`)))
        LEFT JOIN `ttl_usuario` `t8` ON ((((`t1`.`amostra` = 0)
            AND (`t1`.`id_usuario_avaliado` = `t8`.`id_usuario`))
            OR ((`t1`.`amostra` = 1)
            AND (`t3`.`id_usuario_avaliado` = `t8`.`id_usuario`)))))
        LEFT JOIN `ttl_usuario` `t9` ON ((`t8`.`id_gestor` = `t9`.`id_usuario`)))
        LEFT JOIN `ttl_usuario` `t10` ON ((`t7`.`id_usuario_responsavel` = `t10`.`id_usuario`)))
        LEFT JOIN `ttl_cargos` `t11` ON ((`t8`.`id_cargo` = `t11`.`id_cargo`)))
        LEFT JOIN `v_media_pesquisa` `t12` ON (((`t1`.`id_pesquisa` = `t12`.`id_pesquisa`)
            AND (`t8`.`id_usuario` = `t12`.`id_usuario_avaliado`)
            AND (`t12`.`id_tipo_questionario` = 2))))
        LEFT JOIN `v_media_pesquisa` `t13` ON (((`t1`.`id_pesquisa` = `t13`.`id_pesquisa`)
            AND (`t8`.`id_usuario` = `t13`.`id_usuario_avaliado`)
            AND (`t13`.`id_tipo_questionario` = 1))))
        LEFT JOIN `v_media_pesquisa_pares` `t14` ON (((`t1`.`id_pesquisa` = `t14`.`id_pesquisa`)
            AND (`t8`.`id_usuario` = `t14`.`id_usuario_avaliado`))))
    WHERE
        ((`t1`.`ativo` = 1)
            AND ((`t1`.`amostra` = 0)
            OR ((`t2`.`id_usuario` = `t3`.`id_usuario`)
            AND (`t1`.`amostra` = 1)))
            AND (`t2`.`ativo` = 1));
