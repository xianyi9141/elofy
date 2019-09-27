ALTER TABLE `ttl_empresa` 
ADD COLUMN `absolute_color` VARCHAR(45) NULL DEFAULT NULL AFTER `performance_pessoal`,
ADD COLUMN `gradient_color_start` VARCHAR(45) NULL DEFAULT NULL AFTER `absolute_color`,
ADD COLUMN `gradient_color_end` VARCHAR(45) NULL DEFAULT NULL AFTER `gradient_color_start`;
