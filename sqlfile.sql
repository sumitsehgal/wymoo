ALTER TABLE `cases` CHANGE `due_date` `due_date` INT(11) NULL;
ALTER TABLE `cases` CHANGE `close_date` `close_date` INT(11) NULL;
ALTER TABLE `cases` CHANGE `is_notifications` `is_notifications` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `cases` CHANGE `created` `created` INT(11) NULL;
ALTER TABLE `cases` CHANGE `modified` `modified` INT(11) NULL;
ALTER TABLE `case_notes` CHANGE `created` `created` INT(11) NULL;
ALTER TABLE `case_notes` CHANGE `modified` `modified` INT(11) NULL;

