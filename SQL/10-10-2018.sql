ALTER TABLE `ttl_resultados_chave` ADD `periodicidade` CHAR(1) NULL DEFAULT NULL AFTER `frequencia_int`, ADD `manutencao` INT(11) NULL DEFAULT NULL AFTER `periodicidade`;
