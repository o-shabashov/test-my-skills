CREATE TABLE `users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `balance` DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `comments` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `text` TEXT NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

/* Для увеличения быстродействия можно добавить индекс на `comments`.`user_id` */
ALTER TABLE `comments` ADD INDEX (`user_id`);

/* Для повышения консистентности можно добавить внешний ключ на `comments`.`user_id` */
ALTER TABLE `comments` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/* Вариант 1, с подзапросом */
SELECT `name`, `text`
FROM `users` `u`
  INNER JOIN `comments` `c` ON `u`.`id` = `c`.`user_id`
    AND `c`.`id` > (SELECT `id` FROM `comments` WHERE `user_id` = `u`.`id` ORDER BY `id` DESC LIMIT 1,1);

/* Вариант 2, без подзапроса */
SELECT
  MAX(`comments`.`id`) `comment_id`, `users`.`name`, MAX(`text`) `text`, `user_id`
FROM `users`
  INNER JOIN `comments` ON `users`.`id` = `comments`.`user_id`
GROUP BY `comments`.`user_id`;
