-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.10-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para mypizzeriaphp
CREATE DATABASE IF NOT EXISTS `mypizzeriaphp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mypizzeriaphp`;

-- Volcando estructura para tabla mypizzeriaphp.cash
CREATE TABLE IF NOT EXISTS `cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid_user` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mypizzeriaphp.cash: 0 rows
/*!40000 ALTER TABLE `cash` DISABLE KEYS */;
/*!40000 ALTER TABLE `cash` ENABLE KEYS */;

-- Volcando estructura para tabla mypizzeriaphp.c_orders
CREATE TABLE IF NOT EXISTS `c_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid_user` int(11) DEFAULT NULL,
  `refid_menu` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `table_number` int(11) DEFAULT NULL,
  `edits` tinytext CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mypizzeriaphp.c_orders: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `c_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_orders` ENABLE KEYS */;

-- Volcando estructura para tabla mypizzeriaphp.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT 0,
  `photo_url` tinytext CHARACTER SET utf8 DEFAULT NULL,
  `description` tinytext CHARACTER SET utf8 DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK__m_tipo` (`tipo`),
  CONSTRAINT `FK__m_tipo` FOREIGN KEY (`tipo`) REFERENCES `m_tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla mypizzeriaphp.menu: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `price`, `photo_url`, `description`, `tipo`) VALUES
	(1, 'Margarita', 800, 'margherita-50kalo.jpg', 'Pizza margarita, la original.', 3),
	(2, 'Napolitan', 850, 'pizza-napoli-5.jpg', 'Napolitano de origen y de hecho.', 3),
	(3, 'Capricciosa', 950, 'Evidenza-Pizza-Capricciosa-1060x600.jpg', 'La clásica pizza capricciosa.', 3),
	(4, 'Hongos', 850, 'hongos.jpg', 'Pizza con champiñones', 3),
	(5, 'Basilico', 850, 'basilico.jpg', 'Pizza de origen local.', 3),
	(6, 'A los 4 quesos', 1000, '4q.jpg', 'Con 4 tipos diferentes de queso.', 3),
	(7, 'Vegetariana', 1100, 'vegie.jpg', 'Pizza para intolerantes.', 3),
	(8, 'Diavola', 900, 'diavola.jpg', 'Pizza picante pero no demasiado.', 3),
	(9, 'Vino', 300, 'vino-rosso.jpg', 'A tu elección.', 1),
	(10, 'Agua (500ml)', 100, 'agua.jpg', 'Natural o frizzante.', 1),
	(11, 'Gaseosa (latita)', 150, 'bibita-lattina.png', 'Coca Cola, Fanta, Sprite, Pepsi.', 1),
	(12, 'Cerveza', 250, 'birra-artigianale.jpg', 'A tu elección.', 1),
	(13, 'Carne a cuchillo', 100, 'empanadas_de_carne_cortada_a_cuchillo.jpg', 'Fritas o al horno.', 2),
	(14, 'Pollo', 100, 'empanadas-de-pollo.jpg', 'Fritas o al horno.', 2),
	(15, 'Jamón y Queso', 100, 'empanadillas-jamon-queso.jpg', 'Fritas o al horno.', 2),
	(16, 'Docena', 1000, 'empanadas-docena.jpg', 'A tu elección, fritas o al horno.', 2);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla mypizzeriaphp.m_tipo
CREATE TABLE IF NOT EXISTS `m_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mypizzeriaphp.m_tipo: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `m_tipo` DISABLE KEYS */;
INSERT INTO `m_tipo` (`id`, `tipo`) VALUES
	(1, 'Bebidas'),
	(2, 'Empanadas'),
	(3, 'Pizza');
/*!40000 ALTER TABLE `m_tipo` ENABLE KEYS */;

-- Volcando estructura para tabla mypizzeriaphp.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid_user` int(11) DEFAULT NULL,
  `refid_menu` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `table_number` int(11) DEFAULT NULL,
  `edits` tinytext CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mypizzeriaphp.orders: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Volcando estructura para tabla mypizzeriaphp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext CHARACTER SET latin1 NOT NULL,
  `surname` tinytext CHARACTER SET latin1 NOT NULL,
  `username` tinytext CHARACTER SET latin1 DEFAULT NULL,
  `psw` tinytext CHARACTER SET latin1 DEFAULT NULL,
  `photo_url` tinytext CHARACTER SET latin1 NOT NULL DEFAULT 'default-user-image.png',
  `level` tinyint(4) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mypizzeriaphp.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `surname`, `username`, `psw`, `photo_url`, `level`, `registered`) VALUES
	(1, 'Admin', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default-user-image.png', 0, '2021-04-05 05:14:31'),
	(2, 'Sr', 'Gerente', 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'default-user-image.png', 1, '2021-04-05 05:14:31'),
	(3, 'Moza', 'Cocina', 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 'default-user-image.png', 2, '2021-04-05 05:14:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
