CREATE TABLE `ttl_elogio_hashtags` (
  `id_elogio_hashtags` int(11) NOT NULL AUTO_INCREMENT,
  `hashtag` text NOT NULL,
  `id_elogio` int(11) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_elogio_hashtags`),
  KEY `FK_ttl_elogio_hashtags_usuario_idx` (`id_elogio`),
  KEY `FK_ttl_elogio_hashtags_usuario_idx1` (`id_usuario`),
  CONSTRAINT `FK_ttl_elogio_hashtags_usuario` FOREIGN KEY (`id_elogio`) REFERENCES `ttl_elogio` (`id_elogio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
