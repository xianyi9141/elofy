ALTER TABLE `elofy_bd2`.`ttl_resultados_chave` 
CHANGE COLUMN `ponto_partida` `ponto_partida` DOUBLE(20,3) NULL DEFAULT '0.00' ,
CHANGE COLUMN `medicao` `medicao` DOUBLE(20,3) NULL DEFAULT '0.000' ,
CHANGE COLUMN `medicao_projetada` `medicao_projetada` DOUBLE(20,3) NULL DEFAULT '0.000';