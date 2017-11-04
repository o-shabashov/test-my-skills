CREATE TABLE `author` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8;

CREATE TABLE `book` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8;

CREATE TABLE `author_book` (
  `author_id` INT(11) UNSIGNED NOT NULL,
  `book_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`author_id`, `book_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `author_book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `author_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `author` (`id`, `name`)
VALUES
  (1, 'Author'),
  (2, 'Author 2'),
  (3, 'Author 3'),
  (4, 'Author 4');

INSERT INTO `book` (`id`, `title`)
VALUES
  (1, 'Book'),
  (2, 'Book 2');

INSERT INTO `author_book` (`author_id`, `book_id`)
VALUES
  (1, 1),
  (2, 1),
  (3, 1),
  (4, 1),
  (4, 2);

# Решение
SELECT book.title, count(author.name) AS сollaborators
FROM book
  INNER JOIN author_book ON author_book.book_id = book.id
  INNER JOIN author ON author_book.author_id = author.id
GROUP BY book.title
HAVING сollaborators > 3;