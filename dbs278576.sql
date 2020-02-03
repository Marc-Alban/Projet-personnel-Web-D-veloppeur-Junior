-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000285322.hosting-data.io
-- Généré le : lun. 03 fév. 2020 à 16:45
-- Version du serveur :  5.7.28-log
-- Version de PHP : 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs278576`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `legende` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `date` date DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `lastArticle` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `legende`, `description`, `image`, `date`, `posted`, `lastArticle`) VALUES
(85, 'Dernier artticle', 'sc,slkcnsqd cdsq cds s', '<p>s fvsdvds vds vsd vds v</p>', '81.png', '2020-02-13', 1, 1),
(86, 'Dernier artticle', 'sc,slkcnsqd cdsq cds s', '<p>s fvsdvds vds vsd vds v</p>', '81.png', '2020-02-13', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `graph`
--

CREATE TABLE `graph` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'graph.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `titlePage` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `titlePage`, `title`, `description`, `image`) VALUES
(1, 'Nos Valeurs', 'Je suis le titre de la page', '&lt;p&gt;Je suis la description de la page nos valeurs bla bla bla&lt;/p&gt;', '1.png'),
(2, 'L\'équipe', 'Je suis le titre de la page de l’équipe', '<p>Je suis la descrtiption de la page &eacute;quipe bla bla bla</p>', '2.png'),
(3, 'Conseil patrimonial', 'Je suis le titre de la page', 'Je suis la descrtiption de la page conseil patrimonial  bla bla bla', 'default.png'),
(4, 'Conseil en investissement financier', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Conseil en investissement financier  bla bla bla', 'default.png'),
(5, 'Conseil en investissement immobilier', 'Je suis le titre de la page', '&lt;p&gt;Je suis la descrtiption de la page Conseil en investissement immobilier bla bla bla&lt;/p&gt;', '5.jpg'),
(6, 'Autres solutions d\'investissement', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Autres solutions d’investissement  bla bla bla', 'default.png'),
(7, 'Contact', 'Je suis le titre de la page', 'Je suis la descrtiption de la page Contact  bla bla bla', 'default.png'),
(8, 'RGPD', 'Règle des données personnelles', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium dolorum ratione necessitatibus quasi sed ipsum, quibusdam provident minima eligendi iure incidunt eius delectus aspernatur quam quas dolore, nesciunt obcaecati similique?', 'default.png'),
(9, 'Conditions Générales', 'Titre condition', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?&lt;/p&gt;', '9.jpg'),
(10, 'FAQ', 'titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png'),
(11, 'Mentions Légales', 'Titre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ullam laudantium, alias deleniti harum id dignissimos distinctio maxime, aspernatur exercitationem tenetur magni voluptates vel. Culpa cupiditate maiores animi hic dicta?', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `legende` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `legende`, `image`, `link`) VALUES
(1, 'Quantalys', '1.jpg', 'quantalys.com'),
(2, 'Waldata', '2.png', 'waldata.fr');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTypeRole` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typerole`
--

CREATE TABLE `typerole` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `partenaire` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `graph` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`, `token`, `active`) VALUES
(2, 'Bertrand', 'Millet', 'bertrand.millet69@orange.fr', '$2y$10$xhEMoJLH4m2VQnsX9LoB.Orrow7a3bL6KX77S338HxoNLn76IxTOm', '776735263a35c2a4e568067c32122383babc44f5271912e7d2624af7bf4aec65', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `graph`
--
ALTER TABLE `graph`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typerole`
--
ALTER TABLE `typerole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `graph`
--
ALTER TABLE `graph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typerole`
--
ALTER TABLE `typerole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
