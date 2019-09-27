ALTER TABLE `ttl_usuario_favoritos` CHANGE `titulo` `titulo` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `ttl_resultados_chave` 
ADD COLUMN `atraso` INT NULL DEFAULT 0 AFTER `data_atualizacao`;