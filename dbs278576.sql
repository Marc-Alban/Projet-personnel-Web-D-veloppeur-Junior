-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000285322.hosting-data.io
-- Généré le : jeu. 13 fév. 2020 à 13:14
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
(86, 'En 2020, l’or devrait continuer de briller', 'Après une très belle année 2019, à + 19 %, le métal jaune reste porté par le contexte de taux d’intérêt très faibles et les tensions géopolitiques.', '<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">Tous les indicateurs sont au vert pour le métal jaune. Après une hausse de 19 % en 2019, l’or devrait continuer à profiter de l’environnement macroéconomique et géopolitique. L’once s’est ainsi bien installée au-dessus de 1 500 dollars (1362 euros), contre 1 270 dollars il y a un an. <em style=\"box-sizing: inherit;\">« Les conditions sont réunies pour que l’or gagne encore 10 % à 15 % dans les prochains mois »,</em> indique Christophe Moulin, responsable des gestions multi assets de BNP Paribas Asset Management.</p>\r\n<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">Mais l’or reste encore loin de son record historique de septembre 2011, à 1 921 dollars l’once. <em style=\"box-sizing: inherit;\">« Il est possible que l’on retrouve ponctuellement ce niveau dans les prochains mois en cas de fortes tensions géopolitiques. L’once a ainsi frôlé 1 600 dollars début janvier à l’annonce de la mort du général iranien Soleimani »,</em> ajoute Vincent Boy, analyste marché chez IG.</p>\r\n<div id=\"inread-2\" class=\"dfp-slot dfp__slot dfp__inread dfp-unloaded\" style=\"box-sizing: inherit; background-color: #eef1f5; clear: both; text-align: center; color: #383f4e; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; font-size: 16px; margin: 0px !important; padding: 0px !important; visibility: hidden !important; height: 0px !important; border: 0px !important;\" data-format=\"inread\" aria-hidden=\"true\"> </div>\r\n<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">L’or joue ainsi parfaitement son rôle de valeur refuge en cas de crise. <em style=\"box-sizing: inherit;\">« Il sert de bouclier contre les incertitudes géopolitiques mais aussi économiques »,</em> résume Jean-François Faure, le président de la plate-forme d’achat et de vente d’or en ligne AuCOFFRE.com. Il est vrai que de l’Iran au Brexit en passant par la guerre commerciale entre les Etats-Unis et la Chine, les sources de tensions sont nombreuses.<em style=\"box-sizing: inherit;\"> «</em> <em style=\"box-sizing: inherit;\">Au gré des événements, on peut observer des pics et des baisses ponctuelles sur le cours de l’or. Mais, la tendance haussière demeure pour les prochains mois car elle est portée par la persistance d’un environnement de taux bas »,</em> ajoute François de Lassus, consultant pour CPoR Devises, établissement qui sous-traite l’achat, la vente et la conservation d’or pour les banques et leur clientèle.</p>\r\n<h2 class=\"article__sub-title\" style=\"box-sizing: inherit; margin: 2.4rem 0px 0px; padding: 0px; font-size: 2.2rem; color: #2a303b; line-height: 1.2; font-family: \'Marr Sans\', Helvetica, Arial, Roboto, sans-serif; background-color: #ffffff;\">Encore plus favorable en euros</h2>\r\n<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">Principal soutien des cours du métal jaune, les taux d’intérêt devraient en effet rester très faibles en 2020. Car, contrairement aux obligations, l’or ne délivre pas de rendement. Cet inconvénient n’a plus vraiment d’importance dans un marché où les taux d’intérêt obligataires sont presque nuls, voire négatifs. <em style=\"box-sizing: inherit;\">« Les banques centrales vont rester accommodantes. Cet environnement de taux d’intérêt très faibles constitue un facteur de soutien durable des cours de l’or »,</em> juge Christophe Moulin. Sans compter que les achats d’or physique par les banques centrales se poursuivent, notamment dans les pays cherchant à s’affranchir de la domination du dollar, comme l’Inde, la Chine et la Russie.</p>', '86.png', '2020-02-13', 1, 0),
(88, 'Dans le CAC 40, le patriarcat se fissure', 'Dans un univers encore très masculin, les instances de direction des grandes entreprises françaises se féminisent peu à peu.', '<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">Sonnez marteaux-piqueurs, jouez fraiseuses ! Depuis mercredi 15 janvier, et pour la première fois de son histoire, Vinci compte une femme à son comité exécutif (le « comex »). Selon nos informations, le groupe de construction et de concessions employant 211 000 collaborateurs a recruté chez L’Oréal sa nouvelle directrice des ressources humaines (DRH), Jocelyne Vassoille, ancienne pilote de ligne.</p>\r\n<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">Vinci était l’un des cinq irréductibles du CAC 40 (avec ArcelorMittal, Bouygues, STMicroelectronics et Vivendi), à n’accueillir que des costumes cravates dans son premier cercle de pouvoir. Mais elle n’est pas la seule multinationale française à féminiser ses instances de direction.</p>\r\n<p class=\"article__paragraph \" style=\"box-sizing: inherit; margin: 2rem 0px 0px; padding: 0px; color: #383f4e; font-size: 1.8rem; line-height: 1.55; font-family: \'The Antiqua B\', Georgia, Droid-serif, serif; background-color: #ffffff;\">En 2019, Total, Hermès, Airbus ou Axa ont multiplié par deux le nombre de représentantes du « sexe faible » dans leur saint des saints : autrement formulé, il est passé de 1 à 2.</p>', '88.png', '2020-02-11', 1, 1);

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

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `legende` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
(2, 'Millet', 'Marc-Alban', 'millet.marcalban@gmail.com', '$2y$10$Uq03t76u2OlkTm8EBD02vuStdCaaePtaRHAfEwJ1k0gEMWYFqW5JS', '$2y$10$UVxdg0JiY82fcACpv1.xO.aKtEIMEJKdHVmDJpVjAuCOETWbnAFwm', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
