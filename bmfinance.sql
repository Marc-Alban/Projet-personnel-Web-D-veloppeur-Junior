-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 fév. 2020 à 21:55
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
  `title` varchar(255) NOT NULL,
  `legende` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `date` date DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `lastArticle` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(85, 'Dernier artticle', 'sc,slkcnsqd cdsq cds s', '<p>s fvsdvds vds vsd vds v</p>', 'default.png', '2020-02-13', 1, 0),
(86, 'Dernier artticle', 'sc,slkcnsqd cdsq cds s', '<p style=\"text-align: center;\">s fvsdvds vds vsd vds v h,h,hg,gh,gh,hg,gh,</p>\r\n<p style=\"text-align: center;\">dvdsvvsdv</p>', 'default.png', '2020-02-13', 1, 0),
(88, 'Test article', 'Ceci est la légende', '<p style=\"text-align: center;\"><strong>testttttttttttttttttttttttttttttté à _ - </strong></p>\r\n<p>testttttttttttttttttttttttttttttt</p>\r\n<p>testttttttttttttttttttttttttttttt</p>', 'default.png', '2020-02-20', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `graph`
--

DROP TABLE IF EXISTS `graph`;
CREATE TABLE IF NOT EXISTS `graph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'graph.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `graph`
--

INSERT INTO `graph` (`id`, `title`, `description`, `image`) VALUES
(1, 'Prudent', 'légende de l\'image prudent', 'Prudent.png'),
(2, 'Equilibré', 'Légende de l\'image', 'Equilibre.png'),
(3, 'Dynamique', 'Légende de l\'image', 'Dynamique.png'),
(4, 'Autre', 'Légende de l\'image', 'Performance.png');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlePage` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `titlePage`, `title`, `description`, `image`) VALUES
(1, 'Nos Valeurs', 'Je suis le titre de la page', '<p>Je suis la description de la page nos valeurs bla bla bla</p>', 'default.png'),
(2, 'L\'équipe', 'Je suis le titre de la page de l’équipe', '<p>Je suis la descrtiption de la page &eacute;quipe bla bla bla</p>', 'default.png'),
(3, 'Conseil patrimonial', 'Je suis le titre de la page ééé  àà ou - \'\" ça', '<p>Je suis la descrtiption de la page conseil patrimonial bla bla bla</p>', 'default.png'),
(4, 'Conseil en investissement financier', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Conseil en investissement financier  bla bla bla', 'default.png'),
(5, 'Conseil en investissement immobilier', 'Je suis le titre de la page', '&lt;p&gt;Je suis la descrtiption de la page Conseil en investissement immobilier bla bla bla&lt;/p&gt;', 'default.png'),
(6, 'Autres solutions d\'investissement', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Autres solutions d’investissement  bla bla bla', 'default.png'),
(7, 'RGPD', 'Règle des données personnelles', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium dolorum ratione necessitatibus quasi sed ipsum, quibusdam provident minima eligendi iure incidunt eius delectus aspernatur quam quas dolore, nesciunt obcaecati similique?', 'default.png'),
(8, 'Conditions Générales', 'Titre condition', '<div style=\"text-align: center;\"><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit.</strong></div>\r\n<br>Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta', 'default.png'),
(9, 'FAQ', 'titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png'),
(10, 'Mentions Légales', 'Titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legende` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `legende`, `image`, `link`) VALUES
(1, 'Quantalys', '1.jpg', 'quantalys.com'),
(2, 'Waldata', '2.png', 'waldata.fr');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`, `token`, `active`) VALUES
(2, 'Millet', 'Marc-Alban', 'millet.marcalban@gmail.com', '$2y$10$Uq03t76u2OlkTm8EBD02vuStdCaaePtaRHAfEwJ1k0gEMWYFqW5JS', '$2y$10$UVxdg0JiY82fcACpv1.xO.aKtEIMEJKdHVmDJpVjAuCOETWbnAFwm', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
