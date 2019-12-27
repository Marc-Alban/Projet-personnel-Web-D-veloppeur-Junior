-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 déc. 2019 à 15:34
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
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `legende` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL,
  `lastArticle` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(5, 'Titre Premier', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-08 00:18:00', 1, 0),
(6, 'Titre deuxieme', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-09 00:18:00', 1, 1),
(7, 'Titre troisieme', 'klshfckjdsqh', 'vdsfvdsvdsvdsvdsvdsv\r\ndsv\r\nds\r\nvdsvs', 'default.png', '2019-12-09 15:18:00', 0, 0),
(8, 'Quatrieme titre', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2019-12-12 08:13:20', 0, 0),
(9, 'Cinquième titre', 'klshfckjdsqh', 'sdvsdsdvsdvdsvs', 'default.png', '2019-12-12 13:27:20', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `graph`
--

DROP TABLE IF EXISTS `graph`;
CREATE TABLE IF NOT EXISTS `graph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'graph.png',
  `posted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `graph`
--

INSERT INTO `graph` (`id`, `title`, `description`, `image`, `posted`) VALUES
(1, 'Prudent', 'Légende de l\'image', 'Prudent.png', 1),
(2, 'Equilibré', 'Légende de l\'image', 'Equilibre.png', 1),
(3, 'Dynamique', 'Légende de l\'image', 'Dynamique.png', 1),
(4, 'Autre', 'Légende de l\'image', 'Performance.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `posted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `title`, `description`, `image`, `posted`) VALUES
(1, 'Nos Valeurs', 'Je suis la descrtiption de la page nos valeurs bla bla bla', 'default.png', 1),
(2, 'Adresse', 'Je suis la descrtiption de la page adresse bla bla bla', 'default.png', 1),
(3, 'Conseil patrimonial', 'Je suis la descrtiption de la page conseil patrimonial  bla bla bla', 'default.png', 1),
(4, 'Conseil en investissement financier', 'Je suis la descrtiption de la page Conseil en investissement financier  bla bla bla', 'default.png', 1),
(5, 'Conseil en investissement immobilier', 'Je suis la descrtiption de la page Conseil en investissement immobilier  bla bla bla', 'default.png', 1),
(6, 'Autres solutions d\'investissement', 'Je suis la descrtiption de la page Autres solutions d’investissement  bla bla bla', 'default.png', 1),
(7, 'Contact', 'Je suis la descrtiption de la page Contact  bla bla bla', 'default.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legende` varchar(255) COLLATE utf8_bin NOT NULL,
  `lien` varchar(255) COLLATE utf8_bin NOT NULL,
  `posted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idTypeRole` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `typerole`
--

DROP TABLE IF EXISTS `typerole`;
CREATE TABLE IF NOT EXISTS `typerole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL,
  `partenaire` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `graph` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`) VALUES
(1, 'Bertrand', 'Millet', 'bertrand.millet69@orange.fr', 'ade2bec3ea5fc482c9ece1ec73ef93c8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
