ALTER TABLE `ttl_integracoes` ADD `soap_address` VARCHAR(250) NULL DEFAULT NULL AFTER `password`, ADD `name_space` VARCHAR(250) NULL DEFAULT NULL AFTER`soap_address`;