/* Для увеличения быстродействия можно добавить индекс на `comments`.`user_id` */
ALTER TABLE `comments` ADD INDEX (`user_id`);

/* Решение 1 задания */
SELECT
  MAX(`comments`.`id`) `comment_id`, `users`.`name`, MAX(`text`) `text`, `user_id`
FROM `comments`
  LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id`
GROUP BY `user_id`;
