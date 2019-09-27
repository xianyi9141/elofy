ALTER TABLE `ttl_empresa` ADD `individual` INT(1) NOT NULL DEFAULT '0' AFTER `performance`, ADD `team` INT(1) NOT NULL DEFAULT '0' AFTER `individual`, ADD `shared` INT(1) NOT NULL DEFAULT '0' AFTER `team`, ADD `label_individual` INT(200) NULL DEFAULT NULL AFTER `shared`, ADD `label_team` INT(200) NULL DEFAULT NULL AFTER `label_individual`, ADD `label_shared` INT(200) NULL DEFAULT NULL AFTER `label_team`;


ALTER TABLE `ttl_empresa` CHANGE `label_individual` `label_individual` VARCHAR(200) NULL DEFAULT NULL, CHANGE `label_team` `label_team` VARCHAR(200) NULL DEFAULT NULL, CHANGE `label_shared` `label_shared` VARCHAR(200) NULL DEFAULT NULL;
