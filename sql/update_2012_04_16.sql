ALTER TABLE `speeddial`.`sites` ADD COLUMN `keywords` TEXT NULL  AFTER `category` , ADD COLUMN `description` VARCHAR(45) NULL  AFTER `keywords` ;
 
ALTER TABLE `speeddial`.`screenshorts` ADD COLUMN `grab_date` DATETIME NULL  AFTER `ext` ;
