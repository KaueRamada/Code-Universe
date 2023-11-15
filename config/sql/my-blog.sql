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

--
-- Extraindo dados da tabela `tb_admin_users`
--

INSERT INTO `tb_admin_users` (`id`, `user`, `email`, `password`, `name`, `profile_photo`) VALUES
(5, 'admin', 'contato@gustavo-souza.com', '1234', 'Gustavo E. E. Souza', 'assets/uploads/luto elvis.png'),
(4, 'kaueramada', 'kaue@ramada.com', 'kaue1234', 'Kauê Ramada', 'assets/uploads/profile-photo.png'),
(6, 'erick', 'erick@planissimo.com', 'plano111', 'Erick Araújo', 'assets/uploads/erick.jpg');

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

INSERT INTO `tb_categories` (`id`, `name`, `image`) VALUES
(1, 'html', 'assets/uploads/luto elvis.png'),
(2, 'css', 'assets/uploads/luto elvis.png'),
(3, 'html', 'assets/uploads/logo html.png'),
(4, 'javascript', 'assets/uploads/js logo.png'),
(5, 'php', 'assets/uploads/PHP-logo.png');

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
