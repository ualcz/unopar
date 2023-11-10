-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
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


-- Copiando estrutura do banco de dados para lib
CREATE DATABASE IF NOT EXISTS `lib` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lib`;

-- Copiando estrutura para tabela lib.autor
CREATE TABLE IF NOT EXISTS `autor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `nacionalidade` varchar(50) NOT NULL DEFAULT '0',
  `sexo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela lib.autor: ~5 rows (aproximadamente)
INSERT INTO `autor` (`id`, `nome`, `nacionalidade`, `sexo`) VALUES
	(1, 'clau', 'Br', 'M'),
	(2, 'rana', 'De', 'F'),
	(3, 'rafa', 'Br', 'F'),
	(4, 'keven', 'Br', 'M'),
	(7, 'Paulo coelho', 'br', 'F');

-- Copiando estrutura para tabela lib.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `livro_id` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__livros` (`livro_id`),
  KEY `FK_comentarios_user` (`user_id`),
  CONSTRAINT `FK__livros` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`),
  CONSTRAINT `FK_comentarios_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela lib.comentarios: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela lib.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `autor` int DEFAULT NULL,
  `Inbs` int DEFAULT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `sinopse` text,
  PRIMARY KEY (`id`),
  KEY `autor` (`autor`),
  CONSTRAINT `autor` FOREIGN KEY (`autor`) REFERENCES `autor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela lib.livros: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela lib.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` int DEFAULT NULL,
  `senha` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela lib.user: ~3 rows (aproximadamente)
INSERT INTO `user` (`id`, `user`, `email`, `admin`, `senha`, `data`) VALUES
	(2, 'pesoa', 'pessoa@gmail.com', 1, '827ccb0eea8a706c4c34a16891f84e7b', '2023-11-02'),
	(3, 'rana', 'rana@gmail.com', 2, '827ccb0eea8a706c4c34a16891f84e7b', '2023-11-09'),
	(4, 'claudin', 'claudin@gmail.com', 2, '827ccb0eea8a706c4c34a16891f84e7b', '2023-11-09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
