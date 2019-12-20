-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 déc. 2019 à 16:37
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(1, 'Article 1 ', 'Beau graphique', 'Five hours? Aw, man! Couldn\'t you just get me the death penalty?\r\nBite my shiny metal ass. Oh, I don\'t have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain. Hi, I\'m a naughty nurse, and I really need someone to talk to. $9.95 a minute.\r\n\r\nWhen the lights go out, it\'s nobody\'s business what goes on between two consenting adults.\r\nAh, yes! John Quincy Adding Machine. He struck a chord with the voters when he pledged not to go on a killing spree.\r\nThey\'re like sex, except I\'m having them!', '1.png', '2019-11-21 06:03:21', 1, 1),
(2, 'Article 2', 'Beau graphique', 'Five hours? Aw, man! Couldn\'t you just get me the death penalty?\r\nBite my shiny metal ass. Oh, I don\'t have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain. Hi, I\'m a naughty nurse, and I really need someone to talk to. $9.95 a minute.\r\n\r\nWhen the lights go out, it\'s nobody\'s business what goes on between two consenting adults.\r\nAh, yes! John Quincy Adding Machine. He struck a chord with the voters when he pledged not to go on a killing spree.\r\nThey\'re like sex, except I\'m having them!', '2.png', '2019-11-21 06:03:21', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `graph`
--

DROP TABLE IF EXISTS `graph`;
CREATE TABLE IF NOT EXISTS `graph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'graph.png',
  `posted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `graph`
--

INSERT INTO `graph` (`id`, `title`, `description`, `image`, `posted`) VALUES
(1, 'Prudent', '<p>jkdsqhcisqdhcjdshbcpsdhcpjkdshc^dsh</p>\r\n<p>dsvdsv</p>\r\n<p>dsvdsvdsvsdv</p>\r\nco^dshc^dsojhc^dsjco^dsjcssdcdscdscds', 'Prudent.png', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
