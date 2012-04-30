ALTER TABLE  `users` DROP  `global_id` ,
DROP  `fb_id` ,
DROP  `vk_id` ;

ALTER TABLE  `users` ADD  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ,
ADD  `email` TEXT NOT NULL AFTER  `id`