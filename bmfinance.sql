-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 jan. 2020 à 14:09
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
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL,
  `lastArticle` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(39, 'Titre Article', 'test legende', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Ah, ce fameux Lorem Ipsum que vous voyons partout, nous les graphistes, et que nous utilisons dans nos maquettes en attendant les textes de nos clients. A force de l\'utiliser, nous connaissons par coeur les premi&egrave;res lignes de ce<strong style=\"box-sizing: border-box;\">&nbsp;texte de remplacement</strong>&nbsp;en latin. Mais savez-vous pourquoi nous utilisons ce fameux texte ? Et pourquoi le latin d\'ailleurs ? Ce&nbsp;<strong style=\"box-sizing: border-box;\">Lorem Ipsum</strong>&nbsp;ne pourrait-il pas avoir un rempla&ccedil;ant ?</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Le texte ne veux absolument rien dire, et m&ecirc;me si nous recherchons la traduction il n\'y en a pas. Une amie &agrave; moi, qui n\'y connaissait rien, passa un rapide coup d\'oeil par dessus mon &eacute;paule pour s\'exclafer : Ah, tu fait un site en latin, c\'est original... J\'vous jure, les blondes ! Ayant fait un peu de latin au coll&egrave;ge, elle commen&ccedil;a &agrave; traduire... Mais rapidement elle comprit que la traduction n\'&eacute;tait pas possible !</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Si nous utilisons du latin, c\'est simplement pour mettre un&nbsp;<strong style=\"box-sizing: border-box;\">texte de remplacement (sur nos maquettes photoshop, illustrator et InDesign notamment)</strong>&nbsp;qui ressemble le plus de loin &agrave; la structure europ&eacute;enne dans la longueur des mots, la structure des phrases, ... Nous, Fran&ccedil;ais, utilisons principalement des mots courts, &agrave; comparaison &agrave; l\'Allemand o&ugrave; les mots sont sensiblement plus long. Voil&agrave; l\'explication rationnelle, et cela nous &eacute;vite d\'avoir &agrave; &eacute;crire du \"bla bla\" &agrave; la place de longs textes pour nos clients.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Il existe plusieurs sites permettant de trouver du texte latin en attendant, mais personnellement j\'utilise&nbsp;<a style=\"box-sizing: border-box; color: #1670a7; transition: all 0.2s ease 0s;\" href=\"http://fr.lipsum.com/\">http://fr.lipsum.com/</a>&nbsp;qui permet rapidement de me produire plusieurs paragraphes, mots, caract&egrave;res ou encore des listes. C\'est simple et rapide.&nbsp;<strong style=\"box-sizing: border-box;\">Il fait parti de mes favoris</strong>&nbsp;et est ouvert plusieurs fois dans ma journ&eacute;e...</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0.75em; margin-bottom: 0px; line-height: 1.7; color: #333333; font-family: \'Open Sans\', sans-serif; font-size: 15.96px; text-align: justify; background-color: #ffffff;\">Avoir du faux texte c\'est bien, surtout en attendant que le client r&eacute;dige ses propres textes, mais&nbsp;<strong style=\"box-sizing: border-box;\">on manque aussi d\'images</strong>... On peut chercher rapidement sur&nbsp;<strong style=\"box-sizing: border-box;\">Google Image</strong>&nbsp;des paysages, ce que je fais assez souvent, en attendant le cd du client, ou sinon il y a&nbsp;<a style=\"box-sizing: border-box; color: #1670a7; transition: all 0.2s ease 0s;\" href=\"http://fakeimg.pl/\">http://fakeimg.pl/</a>&nbsp;:&nbsp;<strong style=\"box-sizing: border-box;\">Fake images please</strong>&nbsp;permet de mettre des images vides en attendant les photos du client ou de l\'agence de communication lors de nos d&eacute;coupages html et css. L\'utilisation est simple comme bonjour, on insert la balise image avec en source l\'adresse du site suivi des dimensions... Fastoche ! ;)</p>', 'default.png', '2019-01-11 00:00:00', 1, 0),
(80, 'Je suis le dernier article', 'Test de ma legende', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;&lt;em&gt;J&lt;/em&gt;&lt;/strong&gt;&lt;strong style=&quot;font-style: italic;&quot;&gt;e suis un text &amp;agrave; encode correctement ! :)&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div style=&quot;color: #d4d4d4; background-color: #1e1e1e; font-family: Consolas, \'Courier New\', monospace; font-size: 14px; line-height: 19px; white-space: pre;&quot;&gt;&lt;span style=&quot;color: #ce9178;&quot;&gt;{{&lt;/span&gt;&lt;span style=&quot;color: #9cdcfe;&quot;&gt;data&lt;/span&gt;&lt;span style=&quot;color: #ce9178;&quot;&gt;.&lt;/span&gt;&lt;span style=&quot;color: #9cdcfe;&quot;&gt;dataForm&lt;/span&gt;&lt;span style=&quot;color: #ce9178;&quot;&gt;.&lt;/span&gt;&lt;span style=&quot;color: #9cdcfe;&quot;&gt;date&lt;/span&gt;&lt;span style=&quot;color: #ce9178;&quot;&gt;}}&lt;/span&gt;&lt;/div&gt;', '78.png', '2020-01-25 00:00:00', 1, 1),
(81, 'Test Article', 'Legende Article', '&lt;h2 class=&quot;page-list__title f5 cl-orange mb16&quot; style=&quot;-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin: 0px 0px 1em; display: inline-block; border-bottom: 3px solid #ff6a67; color: #ff6a67; font-size: 0.875em; font-family: \'Gotham SSm A\', \'Gotham SSm B\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; line-height: 1.28571; letter-spacing: 0.075em; text-transform: uppercase; background-color: #556271; text-align: center; padding-left: 400px;&quot;&gt;&lt;em&gt;&lt;strong&gt;&lt;a style=&quot;-webkit-tap-highlight-color: transparent; box-sizing: border-box; background-color: transparent; text-decoration-line: none;&quot; title=&quot;Lorem Ipsum&quot; href=&quot;https://loremipsum.io/fr/&quot;&gt;LOREM&lt;/a&gt;&lt;/strong&gt;&lt;/em&gt;&lt;strong&gt;&lt;a style=&quot;-webkit-tap-highlight-color: transparent; box-sizing: border-box; background-color: transparent; text-decoration-line: none;&quot; title=&quot;Lorem Ipsum&quot; href=&quot;https://loremipsum.io/fr/&quot;&gt; IPSUM&lt;/a&gt;&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;p class=&quot;page-list__description mt0&quot; style=&quot;-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.5em; color: #ffffff; font-size: 1.1875em; font-family: \'Mercury SSm A\', \'Mercury SSm B\', Georgia, Times, \'Times New Roman\', \'Microsoft YaHei New\', \'Microsoft Yahei\', 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; line-height: 1.5; background-color: #556271;&quot;&gt;Le passage latin classique qui ne vieillit jamais, appr&amp;eacute;cie autant (ou aussi peu) le lorem ipsum que vous pouvez manipuler avec notre g&amp;eacute;n&amp;eacute;rateur de texte de remplissage facile &amp;agrave; utiliser.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;blockquote class=&quot;page-list__blockquote&quot; style=&quot;-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-left: -1rem; margin-right: 0px; padding-left: 1.375em; border-left-width: 0.375em; border-left-color: #7b8898; color: #d3dbe4; font-size: 1.1875em; font-style: italic; font-family: \'Mercury SSm A\', \'Mercury SSm B\', Georgia, Times, \'Times New Roman\', \'Microsoft YaHei New\', \'Microsoft Yahei\', 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; line-height: 1.5; background-color: #556271;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/blockquote&gt;', '81.png', '2020-01-23 00:00:00', 1, 0);

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
(1, 'Prudent', 'Je suis la l&eacute;gende de l\'image prudent', '1.png'),
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
(1, 'Nos Valeurs', 'Je suis le titre de la page', '&lt;p&gt;Je suis la description de la page nos valeurs bla bla bla&lt;/p&gt;', '1.png'),
(2, 'Adresse', 'Je suis le titre de la page', 'Je suis la descrtiption de la page adresse bla bla bla', 'default.png'),
(3, 'Conseil patrimonial', 'Je suis le titre de la page', 'Je suis la descrtiption de la page conseil patrimonial  bla bla bla', 'default.png'),
(4, 'Conseil en investissement financier', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Conseil en investissement financier  bla bla bla', 'default.png'),
(5, 'Conseil en investissement immobilier', 'Je suis le titre de la page', '&lt;p&gt;Je suis la descrtiption de la page Conseil en investissement immobilier bla bla bla&lt;/p&gt;', '5.jpg'),
(6, 'Autres solutions d\'investissement', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Autres solutions d’investissement  bla bla bla', 'default.png'),
(7, 'Contact', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Contact  bla bla bla', 'default.png'),
(8, 'RGPD', 'Règle des données personnelles', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium dolorum ratione necessitatibus quasi sed ipsum, quibusdam provident minima eligendi iure incidunt eius delectus aspernatur quam quas dolore, nesciunt obcaecati similique?', 'default.png'),
(9, 'Conditions Générale', 'Titre condition', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png'),
(10, 'FAQ', 'titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png'),
(11, 'Mentions Légales', 'Titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `legende`, `image`, `link`) VALUES
(1, 'Quantalys', '1.jpg', 'https://www.quantalys.com/'),
(2, 'Waldata', '2.png', 'https://www.waldata.fr/');

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
(2, 'Bertrand', 'Millet', 'bertrand.millet69@orange.fr', '$2y$10$xhEMoJLH4m2VQnsX9LoB.Orrow7a3bL6KX77S338HxoNLn76IxTOm', '776735263a35c2a4e568067c32122383babc44f5271912e7d2624af7bf4aec65', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
