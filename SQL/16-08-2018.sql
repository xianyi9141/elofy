ALTER TABLE `elofy3`.`ttl_empresa` 
DROP COLUMN `gradient_color_end`,
DROP COLUMN `gradient_color_start`,
DROP COLUMN `absolute_color`,
ADD COLUMN `template_css` VARCHAR(150) NULL AFTER `performance_pessoal`;
