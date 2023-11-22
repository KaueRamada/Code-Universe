-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Out-2023 às 12:37
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `my-blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin_users`
--

DROP TABLE IF EXISTS `tb_admin_users`;
CREATE TABLE IF NOT EXISTS `tb_admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_admin_users` (`id`, `user`, `email`, `password`, `name`, `profile_photo`, `role`, `joined_in`) VALUES
(1, 'Ramada', 'kaueramada@gmail.com', '$2y$10$0u7Yo9ox.3BXbTUAG/s1qe265BGoQdmMvSbeS2g5VD7208/XiwpS6', 'Kaue Ramada', 'assets/images/gatin.jpg', 0, '2023-11-15 19:53:37'),
(3, 'Isa', 'isabelle@gmail.com', '$2y$10$mkNPlb0UncXs5HZGwrfmuO4UoG.705iDbQoBou0GJcKTjhpdIeB2m', 'Isabelle', 'assets/images/no-profile-photo.svg', 0, '2023-11-21 21:40:31'),
(2, 'Artut', 'arthur@gmail.com', '$2y$10$REHziL36vEWL0t46ByEf2.shW7igHDYwjcc8o59CaS4bvAdrD9uZ2', 'Arthur Ventura', 'assets/images/arthur.png', 0, '2023-11-21 21:34:59');
COMMIT;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
CREATE TABLE IF NOT EXISTS `tb_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_categories`
--

INSERT INTO `tb_categories` (`id`, `name`, `image`, `creation_date`) VALUES
(1, 'HTML', 'assets/img/logos-linguagens/html.png', '0000-00-00 00:00:00'),
(2, 'CSS', 'assets/img/logos-linguagens/css.png', '0000-00-00 00:00:00'),
(3, 'JAVASCRIPT', 'assets/img/logos-linguagens/javascript.png', '0000-00-00 00:00:00'),
(4, 'PHP', 'assets/img/logos-linguagens/php.png', '0000-00-00 00:00:00'),
(5, 'JAVA', 'assets/img/logos-linguagens/java.png', '0000-00-00 00:00:00'),
(6, 'PYTHON', 'assets/img/logos-linguagens/python.png', '0000-00-00 00:00:00'),
(7, 'SQL', 'assets/img/logos-linguagens/sql.png', '0000-00-00 00:00:00'),
(8, 'MODELAGEM DE DADOS', 'assets/img/logos-linguagens/modelagem_de_dados.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------


--
-- Estrutura da tabela `tb_posts`
--

DROP TABLE IF EXISTS `tb_posts`;
CREATE TABLE IF NOT EXISTS `tb_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `post` longtext NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `read_time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
