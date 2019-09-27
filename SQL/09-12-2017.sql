ALTER TABLE `ttl_empresa` CHANGE `eixox_nine` `eixox_nine` CHAR(1) NULL DEFAULT NULL, CHANGE `eixoy_nine` `eixoy_nine` CHAR(1) NULL DEFAULT NULL;

ALTER TABLE `ttl_empresa` CHANGE `numero_colaboradores` `numero_colaboradores` INT(11) NULL DEFAULT '0', CHANGE `numero_licencas` `numero_licencas` INT(11) NULL DEFAULT '0';

ALTER TABLE `ttl_empresa` DROP `pdi_peso`;