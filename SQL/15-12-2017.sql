ALTER TABLE `ttl_protocolo_questionario_respostas` ADD `publico` CHAR(1) NOT NULL DEFAULT '1' AFTER `rating_score`;

ALTER TABLE `ttl_protocolo_questionario` ADD `publico` CHAR(1) NOT NULL DEFAULT '1' AFTER `situacao`;
