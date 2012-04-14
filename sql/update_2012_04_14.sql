ALTER TABLE `speeddial`.`sites` DROP COLUMN `snap` ;

CREATE TABLE IF NOT EXISTS `screenshorts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text,
  `url_id` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ext` varchar(45) DEFAULT 'png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;