ALTER TABLE `ttl_usuario` CHANGE `user_typo` `normal_user` INT(1) NULL DEFAULT NULL;

ALTER TABLE `ttl_usuario` ADD `goal_register` INT(11) NULL DEFAULT NULL AFTER `normal_user`, ADD `maintenance_user` INT(11) NULL DEFAULT NULL AFTER `goal_register`,ADD `user_reviewer` INT(11) NULL DEFAULT NULL AFTER `maintenance_user`;
