-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para catolica
DROP DATABASE IF EXISTS `catolica`;
CREATE DATABASE IF NOT EXISTS `catolica` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `catolica`;

-- Copiando estrutura para tabela catolica.people
DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `genre` varchar(1) DEFAULT NULL,
  `creditcard` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela catolica.people: ~2 rows (aproximadamente)
INSERT IGNORE INTO `people` (`id`, `name`, `mail`, `birthday`, `state`, `address`, `genre`, `creditcard`) VALUES
	(7, 'GIAN', 'adsdas@live.com', '2001-02-13', 'SC', 'ASDDASDSA', 'F', 'Elo'),
	(11, 'DSADSADAS', 'dasdasads@live.com', '2001-02-13', 'SC', 'DSADSADASSDA', 'M', 'Elo');

-- Copiando estrutura para tabela catolica.state
DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `initials` varchar(2) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `initials` (`initials`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela catolica.state: ~3 rows (aproximadamente)
INSERT IGNORE INTO `state` (`id`, `initials`, `name`) VALUES
	(1, 'SC', 'Santa Catarina'),
	(2, 'PR', 'Paraná'),
	(3, 'RS', 'Rio Grande do Sul');

-- Copiando estrutura para tabela catolica.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rule` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela catolica.users: ~1 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `username`, `password`, `rule`) VALUES
	(1, 'admin', '$2y$10$U1t5EtdgfTAVCN8L6gcQwegqPqG1k.HwXV5A/2iWnrTLCy4ZmzXnK', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
