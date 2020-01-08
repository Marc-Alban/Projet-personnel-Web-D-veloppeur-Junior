-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 jan. 2020 à 14:50
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bmfinance`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titleArticle` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `legende` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL,
  `lastArticle` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titleArticle`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(5, '', 'Titre Premier', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-08 00:18:00', 1, 0),
(6, '', 'Titre deuxieme', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-09 00:18:00', 1, 0),
(7, '', 'Titre troisieme', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-09 15:18:00', 1, 0),
(8, '', 'Quatrieme titre', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2019-12-12 08:13:20', 1, 0),
(9, '', 'Cinquième titre', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2019-12-12 13:27:20', 1, 0),
(10, '', 'sixieme titre', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-08 00:18:00', 1, 0),
(11, '', 'septieme titre', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-09 00:18:00', 1, 0),
(12, '', 'huightieme', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-09 15:18:00', 1, 0),
(13, '', 'neufieme', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2019-12-12 08:13:20', 1, 0),
(14, '', 'dixieme', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2019-12-12 13:27:20', 1, 0),
(15, '', 'onziem', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2020-01-01 13:27:20', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
