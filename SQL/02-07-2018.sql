CREATE TABLE IF NOT EXISTS `ttl_competencias_times` (
`id_competencias_times` int(11) NOT NULL,
`id_competencia` int(11) NOT NULL,
`id_time` int(11) NOT NULL,
`usuario_atualizador` int(22) NOT NULL,
`data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `ttl_competencias_times`
ADD PRIMARY KEY (`id_competencias_times`);