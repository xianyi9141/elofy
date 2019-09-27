CREATE TABLE `ttl_elogio_comentario_mencao` (
  `id_elogio_comentario_mencao` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_elogio_comentar` int(11) NOT NULL,
  `lido` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_elogio_comentario_mencao`),
  KEY `FK__ttl_usuario_comentario_mencao` (`id_usuario`),
  KEY `FK__ttl_elogio_comentar` (`id_elogio_comentar`),
  CONSTRAINT `FK__ttl_elogio_comentario` FOREIGN KEY (`id_elogio_comentar`) REFERENCES `ttl_elogio_comentar` (`id_elogio_comentar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__ttl_usuario_comentario_mencao` FOREIGN KEY (`id_usuario`) REFERENCES `ttl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COMMENT='Tabela de controle de usuarios mencionados nos comentários de elos.';
