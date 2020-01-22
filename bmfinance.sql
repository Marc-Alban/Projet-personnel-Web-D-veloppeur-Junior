-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 jan. 2020 à 10:29
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
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `legende` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'default.png',
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL,
  `lastArticle` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(39, 'Titre Article', 'test legende', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Ah, ce fameux Lorem Ipsum que vous voyons partout, nous les graphistes, et que nous utilisons dans nos maquettes en attendant les textes de nos clients. A force de l\'utiliser, nous connaissons par coeur les premi&egrave;res lignes de ce<strong style=\"box-sizing: border-box;\">&nbsp;texte de remplacement</strong>&nbsp;en latin. Mais savez-vous pourquoi nous utilisons ce fameux texte ? Et pourquoi le latin d\'ailleurs ? Ce&nbsp;<strong style=\"box-sizing: border-box;\">Lorem Ipsum</strong>&nbsp;ne pourrait-il pas avoir un rempla&ccedil;ant ?</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Le texte ne veux absolument rien dire, et m&ecirc;me si nous recherchons la traduction il n\'y en a pas. Une amie &agrave; moi, qui n\'y connaissait rien, passa un rapide coup d\'oeil par dessus mon &eacute;paule pour s\'exclafer : Ah, tu fait un site en latin, c\'est original... J\'vous jure, les blondes ! Ayant fait un peu de latin au coll&egrave;ge, elle commen&ccedil;a &agrave; traduire... Mais rapidement elle comprit que la traduction n\'&eacute;tait pas possible !</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Si nous utilisons du latin, c\'est simplement pour mettre un&nbsp;<strong style=\"box-sizing: border-box;\">texte de remplacement (sur nos maquettes photoshop, illustrator et InDesign notamment)</strong>&nbsp;qui ressemble le plus de loin &agrave; la structure europ&eacute;enne dans la longueur des mots, la structure des phrases, ... Nous, Fran&ccedil;ais, utilisons principalement des mots courts, &agrave; comparaison &agrave; l\'Allemand o&ugrave; les mots sont sensiblement plus long. Voil&agrave; l\'explication rationnelle, et cela nous &eacute;vite d\'avoir &agrave; &eacute;crire du \"bla bla\" &agrave; la place de longs textes pour nos clients.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Il existe plusieurs sites permettant de trouver du texte latin en attendant, mais personnellement j\'utilise&nbsp;<a style=\"box-sizing: border-box; color: #1670a7; transition: all 0.2s ease 0s;\" href=\"http://fr.lipsum.com/\">http://fr.lipsum.com/</a>&nbsp;qui permet rapidement de me produire plusieurs paragraphes, mots, caract&egrave;res ou encore des listes. C\'est simple et rapide.&nbsp;<strong style=\"box-sizing: border-box;\">Il fait parti de mes favoris</strong>&nbsp;et est ouvert plusieurs fois dans ma journ&eacute;e...</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Avoir du faux texte c\'est bien, surtout en attendant que le client r&eacute;dige ses propres textes, mais&nbsp;<strong style=\"box-sizing: border-box;\">on manque aussi d\'images</strong>... On peut chercher rapidement sur&nbsp;<strong style=\"box-sizing: border-box;\">Google Image</strong>&nbsp;des paysages, ce que je fais assez souvent, en attendant le cd du client, ou sinon il y a&nbsp;<a style=\"box-sizing: border-box; color: #1670a7; transition: all 0.2s ease 0s;\" href=\"http://fakeimg.pl/\">http://fakeimg.pl/</a>&nbsp;:&nbsp;<strong style=\"box-sizing: border-box;\">Fake images please</strong>&nbsp;permet de mettre des images vides en attendant les photos du client ou de l\'agence de communication lors de nos d&eacute;coupages html et css. L\'utilisation est simple comme bonjour, on insert la balise image avec en source l\'adresse du site suivi des dimensions... Fastoche ! ;)</p>', '67.jpg', '2019-01-11 00:00:00', 1, 1),
(67, 'Je suis un article test', 'Test legende', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore modi doloribus maxime eveniet quam debitis eum quasi quos natus dolorem necessitatibus corporis optio accusamus iure tempora, provident nihil praesentium!', '67.jpg', '2020-06-17 00:00:00', 1, 0),
(68, 'Je suis un article test', 'Test legende', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore modi doloribus maxime eveniet quam debitis eum quasi quos natus dolorem necessitatibus corporis optio accusamus iure tempora, provident nihil praesentium!', '67.jpg', '2020-06-17 00:00:00', 1, 0),
(69, 'Je suis un article test', 'Test legende', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore modi doloribus maxime eveniet quam debitis eum quasi quos natus dolorem necessitatibus corporis optio accusamus iure tempora, provident nihil praesentium!', '67.jpg', '2020-06-17 00:00:00', 1, 0),
(72, 'Je suis un article test', 'Test legende', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore modi doloribus maxime eveniet quam debitis eum quasi quos natus dolorem necessitatibus corporis optio accusamus iure tempora, provident nihil praesentium!', '67.jpg', '2020-06-17 00:00:00', 1, 0);

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
(1, 'Prudent', 'Légende de l\'image', 'Prudent.png'),
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `titlePage`, `title`, `description`, `image`) VALUES
(1, 'Nos Valeurs', 'Je suis le titre de la page', '&lt;p&gt;&amp;lt;p&amp;gt;Je suis la descrtiption de la page nos valeurs bla bla bla&amp;lt;/p&amp;gt;&lt;/p&gt;', '1.jpg'),
(2, 'Adresse', 'Je suis le titre de la page', 'Je suis la descrtiption de la page adresse bla bla bla', 'default.png'),
(3, 'Conseil patrimonial', 'Je suis le titre de la page', 'Je suis la descrtiption de la page conseil patrimonial  bla bla bla', 'default.png'),
(4, 'Conseil en investissement financier', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Conseil en investissement financier  bla bla bla', 'default.png'),
(5, 'Conseil en investissement immobilier', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Conseil en investissement immobilier  bla bla bla', 'default.png'),
(6, 'Autres solutions d\'investissement', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Autres solutions d’investissement  bla bla bla', 'default.png'),
(7, 'Contact', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Contact  bla bla bla', 'default.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `legende`, `image`, `link`) VALUES
(1, 'Legende', 'logoQuantalys.jpg', 'https://www.quantalys.com/'),
(2, 'Legende', 'logoWaldata.png', 'https://www.waldata.fr/');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(2, 'Millet', 'Marc-Alban', 'test@live.fr', '$2y$10$DCGO9Y66GUjkXPblYsky6O0mW2DdYOAvGtNy0UK9T5PnXIbCg3PZK', '$2y$10$Yz.2xg1UhOa8WvnrUMrxBuuF0u1odJrmE8kiegvIn339gqRYrPJxS', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
