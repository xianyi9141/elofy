ALTER TABLE `ttl_revisao_ciclo` ADD PRIMARY KEY(`id_revisao_ciclo`);
ALTER TABLE `ttl_revisao_ciclo` ADD `send_message` INT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER `amostra`;
ALTER TABLE `ttl_revisao_ciclo_fases` DROP INDEX `FK_ttl_revisao_ciclo_fases_ttl_questionarios`;
