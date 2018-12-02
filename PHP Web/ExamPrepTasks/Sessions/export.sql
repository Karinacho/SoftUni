CREATE DATABASE `exam_prep` /*!40100 COLLATE 'utf8_general_ci' */;
use `exam_prep`;
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username`)
)
  ENGINE=InnoDB
;
CREATE TABLE `categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE=InnoDB
;
CREATE TABLE `tasks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` VARCHAR(10000) NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `author_id` INT(11) NOT NULL,
  `category_id` INT(11) NOT NULL,
  `started_on` DATETIME NULL DEFAULT NULL,
  `due_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_tasks_users` (`author_id`),
  INDEX `FK_tasks_categories` (`category_id`),
  CONSTRAINT `FK_tasks_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_tasks_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
)
  ENGINE=InnoDB
;
INSERT INTO `exam_prep`.`categories` (`name`) VALUES ('Anniversary');
SELECT LAST_INSERT_ID();
SELECT `id`, `name` FROM `exam_prep`.`categories` WHERE  `id`=1;
INSERT INTO `exam_prep`.`categories` (`name`) VALUES ('Birthday');
SELECT LAST_INSERT_ID();
SELECT `id`, `name` FROM `exam_prep`.`categories` WHERE  `id`=2;
INSERT INTO `exam_prep`.`categories` (`name`) VALUES ('Business');
SELECT LAST_INSERT_ID();
SELECT `id`, `name` FROM `exam_prep`.`categories` WHERE  `id`=3;