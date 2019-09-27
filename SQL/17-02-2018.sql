ALTER TABLE `ttl_empresa` ADD `atualizacao` INT(11) NULL DEFAULT NULL AFTER `elo`;
ALTER TABLE `ttl_empresa_times` ADD `atualizacao` INT(11) NULL DEFAULT NULL AFTER `usuario_atualizador`;