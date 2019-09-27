ALTER TABLE `ttl_empresa` CHANGE `eixox_nine` `eixox_nine` CHAR(1) NULL DEFAULT NULL, CHANGE `eixoy_nine` `eixoy_nine` CHAR(1) NULL DEFAULT NULL;

ALTER TABLE `ttl_empresa` ADD `pdi_peso` INT(11) NULL DEFAULT NULL AFTER `competencias_peso`;