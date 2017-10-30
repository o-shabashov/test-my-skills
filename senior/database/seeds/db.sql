# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19)
# Database: senior
# Generation Time: 2017-10-30 06:23:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table aquarium
# ------------------------------------------------------------

LOCK TABLES `aquarium` WRITE;
/*!40000 ALTER TABLE `aquarium` DISABLE KEYS */;

INSERT INTO `aquarium` (`id`, `name`, `peanuts`)
VALUES
	(1,'20 орешков',20),
	(2,'Каждой рыбы по одной',4),
	(3,'Битва карпов',1),
	(4,'Контрольный',2);

/*!40000 ALTER TABLE `aquarium` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aquarium_fish
# ------------------------------------------------------------

LOCK TABLES `aquarium_fish` WRITE;
/*!40000 ALTER TABLE `aquarium_fish` DISABLE KEYS */;

INSERT INTO `aquarium_fish` (`aquarium_id`, `fish_id`)
VALUES
	(1,2),
	(1,3),
	(2,1),
	(2,2),
	(2,3),
	(3,1),
	(3,1),
	(4,2),
	(4,3);

/*!40000 ALTER TABLE `aquarium_fish` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fish
# ------------------------------------------------------------

LOCK TABLES `fish` WRITE;
/*!40000 ALTER TABLE `fish` DISABLE KEYS */;

INSERT INTO `fish` (`id`, `name`, `speed`, `satiety`, `type`)
VALUES
	(1,'Займо-карп',7,8,'carp'),
	(2,'Банко-осётр',6,3,'easy'),
	(3,'Кредито-щука',5,4,'pike');

/*!40000 ALTER TABLE `fish` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
