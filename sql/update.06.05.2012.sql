ALTER TABLE  `sites` ADD  `user_id` INT NOT NULL;

 INSERT INTO  `speeddial`.`access_rules` (
 `id` ,
 `role_id` ,
 `directory` ,
 `controller` ,
 `action`
 )
 VALUES ( NULL ,  '1',  'panel',  'sites',  'new'),
 ( NULL ,  '1',  'panel',  'sites',  'delete'),
 ( NULL ,  '1',  'panel',  'panel',  'index' ),
 ( NULL ,  '1',  'panel',  'sites',  'update');