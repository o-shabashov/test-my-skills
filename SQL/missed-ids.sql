CREATE TABLE `test` (
  `id` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
INSERT INTO test (id) VALUES (1), (2), (3), (6), (8), (9), (12);

# Решение
SELECT a.id + 1 AS 'FROM', MIN(b.id) - 1 AS 'TO'
FROM test AS a, test AS b
WHERE a.id < b.id
GROUP BY a.id
HAVING 'FROM' < MIN(b.id)