-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 nov. 2023 à 07:33
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `assiettes`
--

DROP TABLE IF EXISTS `assiettes`;
CREATE TABLE IF NOT EXISTS `assiettes` (
  `id_assiette` int NOT NULL AUTO_INCREMENT,
  `nom_assiette` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `liste_ingredients_assiette` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `prix_assiette` decimal(6,2) DEFAULT NULL,
  `afficher_assiette` tinyint(1) NOT NULL,
  `id_cat` int NOT NULL,
  PRIMARY KEY (`id_assiette`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `assiettes`
--

INSERT INTO `assiettes` (`id_assiette`, `nom_assiette`, `liste_ingredients_assiette`, `prix_assiette`, `afficher_assiette`, `id_cat`) VALUES
(1, 'Salade vosgienne', '(Pomme de terre, Saucisses fumées, Vinaigrette à l\'échalotte, Cornichons)', '6.50', 1, 1),
(2, 'Soupe à la bierre', '(Bière, Baguette, Crème, Bouillon de bœuf, Cerfeuil)', '5.50', 1, 1),
(3, 'Quiche Lorraine', '(Pâte brisé, œufs, crème, lard, ciboulette, crème)', '5.00', 1, 1),
(4, 'Flamiche au maroille', '(Pâte brisé, maroilles, œufs, crème, fromage blanc, quatre épices)', '5.00', 1, 1),
(5, '3 terrines (cochon, joue de bœuf et lapin à la mirabelle)', '(Viande de porc, bœuf et lapin, poireaux, oignons, bouquet garni, ail, quatre épices, persil, échalotes, \r\nvin blanc, gélatine, mirabelles, eau de vie)', '7.50', 1, 1),
(6, 'Quenelle de brochet', 'Chair de brochet, œufs, farine, beurre, bisque de homard, crème, cognac, crevettes', '15.50', 1, 2),
(7, 'Waterzoï de saumon et lotte', 'Silet de saumon et de lotte, moules, poireau, caottes, oignon, céleri, navets, crème, persil, citron', '13.00', 1, 2),
(8, 'Truite au Riesling', 'Truite, échalotes, Riesling, fumet de poisson, beure, citron, crème, ciboulette', '12.50', 1, 2),
(9, 'Fromage de tête au vin blanc de Moselle et salade verte', 'Viande de porc et de veau, vin blanc, carottes, oignons, échalotes, bouquet garni, céleri, salade verte de saison, vinaigrette à l\'échalote', '12.50', 1, 2),
(10, 'Roti de porc aux mirabelles', 'Rôti de porc, oignons, carottes, tomates, vin blanc, eau de vie, mirabelle, lard', '13.50', 1, 2),
(11, 'Carbonade flammande', 'Boeuf, oignons, baie de genièvre, estragon, thym, laurier, pain d\'épices (seigle, miel, cannelle, gingembre, anis étoilé, muscade), cassonade, moutarde, bière brune, ail, fond de veau, maïzena', '15.50', 1, 2),
(12, 'Choucroute garnie', 'Palette et jambeauneau de porc, saucisses fumées, saucisses de Strasbourg, lard, choucroute, pommes de terres, oignons, carottes, baies de genièvre, laurier, vin blanc', '15.50', 1, 2),
(13, 'Choux braisé aux pommes, râpé de pomme de terre et lentilles aux carottes', 'Choux rouge, carottes, pommes de terre, pommes, lentilles blondes, thym, oignon, vinaigre Melfor, poireau, maïzena', '9.50', 1, 2),
(14, 'Betterave ay cumin et choucroute de navet', 'Betterave, échalotte, cumin, moutarde, vinaigre, huile, persil, pommes, navets, baie de genièvre, vin blanc, laurier, thym, bouillon de légume', '8.50', 1, 2),
(15, 'Potée végétarienne aux haricots blanc', 'Haricots blanc, choux vert, carottes, oignons, navets, poireau, céleri branche et rave, bouquet garni, pommes de terre, thym, laurier, raifort, moutarde', '13.50', 1, 2),
(16, 'Café gourmand (spéculos, macaron de Nancy et Bredele)', 'Café ou café crème, farine, oeuf, beure, cannelle, amande, sucre, fruits confits, noisette, vanille', '5.00', 1, 3),
(17, 'Tarte aux mirabelles et aux amandes', 'pâte feuilleté (farine, beurre, sel, eau), mirabelles, amandes moulues, oeufs, beure, crème, sucre', '6.00', 1, 3),
(18, 'Chti\'ramisu', 'spéculos, cannelle, oeuf, sucre, mascarpone, café, alcool de genièvre', '6.00', 1, 3),
(19, 'Tarte de linz aux quetsches et sa boule de glace à la vanille', 'pâte brisé (farine, beure, sucre, sel, jaune d\'oeuf),  quetsches, sucre, lait, oeuf, vanille bourbon, crème', '7.50', 1, 3),
(20, 'tarte au fromage blanc', 'pâte sablé (farine, sel, beure, oeuf) fromage blanc, sucre, oeuf, maïzena, vanille', '5.50', 1, 3),
(21, 'crème de potiron aux épices d\'automne', 'test', '0.00', 1, 1),
(22, 'coq au vin rouge et pommes de terres rissolées', 'test', '0.00', 0, 2),
(23, 'tarte aux pommes', 'test', '0.00', 0, 3),
(24, 'test entre', 'test', '0.00', 0, 1),
(25, 'test plat', 'test ', '0.00', 0, 2),
(26, 'test dessert', 'test ', '0.00', 0, 3),
(27, 'crème de potiron aux épices d\'automne', 'test2', '0.00', 0, 1),
(28, 'coq au vin rouge et pommes de terres rissolées', 'test2', '0.00', 0, 2),
(29, 'tarte aux pommes', 'test2', '0.00', 0, 3),
(30, 'test3', 'fe', '0.00', 0, 1),
(31, 'test3', 'efz', '0.00', 0, 2),
(32, 'test3', 'fzez', '0.00', 0, 3),
(33, 'eau plate ', 'à la carafe', '1.50', 1, 4),
(34, 'test plat', 'frzefzezf', '0.00', 0, 2),
(35, 'Eau gazeuse', 'à la carafe ', '5.50', 1, 4),
(37, 'Eau minérale', 'Evian, Volvic', '5.50', 1, 4),
(38, 'Coca Cola, Coca zéro', '33cl', '6.50', 1, 4),
(39, 'Ice tea, Orangina, Schweppes', '33cl', '6.00', 1, 4),
(40, 'Jus de fruits ', 'Orange, pomme, abricot -- 33cl', '6.00', 1, 4),
(41, 'Bière ', 'Jupiler, Duvel, Chimay, Heineken -- 25cl', '6.50', 1, 5),
(42, 'Vin rouge ', 'bordeau, côtes du Rhône, Pinot noir -- au verre', '6.50', 1, 5),
(43, 'Vin blanc ', 'Riesling, Pinot Gris, Muscat d\'Alsace, Sylvaner - au verre', '6.50', 1, 5),
(44, 'Gewurztraminer cuvé vendange tardive', 'au verre ', '6.50', 1, 5),
(45, 'Crémant d\'Alsace', 'blanc ou rosé -- au verre ', '6.50', 1, 5),
(46, 'Rosé Pays d\'Oc', 'au verre', '6.50', 1, 5),
(47, 'Café ', 'court ou allongé', '4.50', 1, 6),
(48, 'Café crème', 'lait ou lait de soja', '5.50', 1, 6),
(49, 'Décaféiné', 'court ou allongé', '4.50', 1, 6),
(50, 'Thé, Infusion  ', '(Earl grey, Assam, Darjeeling, Sencha, Menthe, Verveine, tilleul, Camomille)', '5.50', 1, 6),
(51, 'Martini', 'clasic ou virgin', '7.50', 1, 7),
(52, 'Porto ', 'rouge ou blanc', '7.50', 1, 7),
(53, 'Kir Royal', 'Cerise, pêche ou framboise', '7.50', 1, 7),
(54, 'Wisky', 'Demander la sélection du moment au serveur', '7.50', 1, 7),
(55, 'Picon bierre', 'simple ou double', '7.50', 1, 7),
(56, 'Terrine de Maroilles et Salade de Chicorée', '(Pomme de terre, Saucisses fumées, Vinaigrette à l\'échalotte, Cornichons)', '0.00', 0, 1),
(57, 'Tarte au Sucre de Cassonade', 'test', '0.00', 0, 3),
(58, 'Quiche Lorraine Traditionnelle', 'efzfz', '0.00', 0, 1),
(59, 'Coq au Riesling', 'efzef', '0.00', 0, 2),
(60, 'Gâteau aux Noix des Vosges', 'fezf', '0.00', 0, 3),
(61, 'Œufs en Matelote au vin blanc', 'efzef', '0.00', 0, 1),
(62, 'Filet de Truite de la Marne aux Amandes et au Champagne', 'ezfff', '0.00', 0, 2),
(63, 'Galette ardennaise à la crème', 'fezf', '0.00', 0, 3),
(64, 'Tarte Flambée Alsacienne', 'fezfz', '0.00', 0, 1),
(65, 'Choucroute Garnie avec Saucisse de Strasbourg et Lard', 'fefz', '0.00', 0, 2),
(66, 'Tarte aux Quetsches', 'fezf', '0.00', 0, 3),
(67, 'Salade de Chèvre Chaud au Miel et aux Noix', 'fezfzf', '0.00', 0, 1),
(68, 'Quiche Lorraine aux Épinards et aux Champignons', 'ezfef', '0.00', 0, 2),
(69, 'Crème Brûlée à la Vanille', 'fezff', '0.00', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories_assiettes`
--

DROP TABLE IF EXISTS `categories_assiettes`;
CREATE TABLE IF NOT EXISTS `categories_assiettes` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories_assiettes`
--

INSERT INTO `categories_assiettes` (`id_cat`, `nom_categorie`) VALUES
(1, 'Entrée'),
(2, 'Plat'),
(3, 'Dessert'),
(4, 'Soft'),
(5, 'Alcool'),
(6, 'Boissons Chaudes'),
(7, 'Apéritif'),
(8, 'menu');

-- --------------------------------------------------------

--
-- Structure de la table `categories_utilisateurs`
--

DROP TABLE IF EXISTS `categories_utilisateurs`;
CREATE TABLE IF NOT EXISTS `categories_utilisateurs` (
  `id_cat_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom_cat_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_cat_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories_utilisateurs`
--

INSERT INTO `categories_utilisateurs` (`id_cat_utilisateur`, `nom_cat_utilisateur`) VALUES
(1, 'admin'),
(2, 'client'),
(3, 'super_admin');

-- --------------------------------------------------------

--
-- Structure de la table `composition_menu`
--

DROP TABLE IF EXISTS `composition_menu`;
CREATE TABLE IF NOT EXISTS `composition_menu` (
  `id_assiette` int NOT NULL,
  `id_menu` int NOT NULL,
  `id_cat` int NOT NULL,
  PRIMARY KEY (`id_assiette`,`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `composition_menu`
--

INSERT INTO `composition_menu` (`id_assiette`, `id_menu`, `id_cat`) VALUES
(1, 1, 1),
(1, 6, 1),
(2, 3, 1),
(3, 2, 1),
(5, 8, 1),
(6, 1, 2),
(8, 6, 2),
(11, 9, 2),
(12, 8, 2),
(15, 2, 2),
(16, 1, 3),
(17, 3, 3),
(18, 6, 3),
(19, 2, 3),
(19, 8, 3),
(21, 7, 1),
(22, 3, 2),
(27, 5, 1),
(28, 5, 2),
(29, 5, 3),
(32, 7, 3),
(34, 7, 2),
(56, 9, 1),
(57, 9, 3),
(58, 10, 1),
(59, 10, 2),
(60, 10, 3),
(61, 11, 1),
(62, 11, 2),
(63, 11, 3),
(64, 12, 1),
(65, 12, 2),
(66, 12, 3),
(67, 13, 1),
(68, 13, 2),
(69, 13, 3);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `id_devis` int NOT NULL AUTO_INCREMENT,
  `type_evenement_devis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_repas_devis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nbr_personnes_devis` int DEFAULT NULL,
  `date_evenement_devis` int DEFAULT NULL,
  `message_devis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_creation_devis` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_etat` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_devis`),
  KEY `id_etat` (`id_etat`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id_devis`, `type_evenement_devis`, `type_repas_devis`, `nbr_personnes_devis`, `date_evenement_devis`, `message_devis`, `date_creation_devis`, `id_etat`, `id_utilisateur`) VALUES
(1, 'entreprise', 'assiette', 50, 1234567891, 'sz', '1698494669', 3, 1),
(2, 'entreprise', 'assiette', 60, 1711974660, 'sz', '1699783352', 1, 1),
(8, 'entreprise', 'assiette', 55, 1702080000, 'sz', '1699781317', 1, 1),
(4, 'anniversaire', 'chaud', 10, 1798456234, 'dd', '1698496585', 2, 1),
(5, 'inauguration', 'cocktail', 100, 1698753245, 'sszded', '1698496772', 1, 4),
(6, 'anniversaire', 'chaud', 15, 1700956800, 'gtrr', '1699265089', 2, 4),
(10, 'anniversaire', 'froid', 15, 1699920000, 'aaa', '1699876935', 2, 2),
(11, 'anniversaire', 'froid', 15, 1699920000, 'ss', '1699876985', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `etat_devis`
--

DROP TABLE IF EXISTS `etat_devis`;
CREATE TABLE IF NOT EXISTS `etat_devis` (
  `id_etat` int NOT NULL AUTO_INCREMENT,
  `nom_etat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_etat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etat_devis`
--

INSERT INTO `etat_devis` (`id_etat`, `nom_etat`) VALUES
(1, 'En attente de traitement'),
(2, 'Devis validé'),
(3, 'Prestation en préparation'),
(4, 'Prestation réalisée, en attente de payement'),
(5, 'Prestation facturée'),
(6, 'Devis refusé'),
(7, 'Evénement annulé');

-- --------------------------------------------------------

--
-- Structure de la table `illustration_menu`
--

DROP TABLE IF EXISTS `illustration_menu`;
CREATE TABLE IF NOT EXISTS `illustration_menu` (
  `id_image` int NOT NULL,
  `id_menu` int NOT NULL,
  `position_image` int DEFAULT NULL,
  PRIMARY KEY (`id_image`,`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `illustration_menu`
--

INSERT INTO `illustration_menu` (`id_image`, `id_menu`, `position_image`) VALUES
(4, 7, 0),
(5, 7, 1),
(6, 8, 0),
(14, 9, 0),
(15, 9, 1),
(16, 8, 1),
(17, 10, 0),
(18, 10, 1),
(19, 11, 0),
(20, 12, 1),
(21, 3, 0),
(22, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int NOT NULL AUTO_INCREMENT,
  `nom_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `afficher_image` tinyint(1) NOT NULL,
  `ordre_affichage_image` int DEFAULT NULL,
  `id_cat` int DEFAULT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_image`, `nom_image`, `afficher_image`, `ordre_affichage_image`, `id_cat`) VALUES
(1, 'test1699281655.jpg', 0, 1, 2),
(2, 'test11697885625.jpg', 1, 2, 2),
(3, 'test1699281675.jpg', 0, 1, 3),
(4, 'test1699281978.jpg', 1, 3, 8),
(5, 'test1699281756.jpg', 1, 2, 3),
(6, 'test1699281444.jpg', 1, 0, 8),
(7, 'test1699281588.jpg', 1, 1, 1),
(8, 'test1699281619.jpg', 1, 3, 1),
(9, 'test1699281636.jpg', 1, 2, 1),
(10, 'test1697984566.jpg', 1, 4, 1),
(11, 'test1697984579.jpg', 1, 3, 2),
(12, 'test1697984595.jpg', 1, 4, 2),
(13, 'test1699281690.jpg', 1, 4, 3),
(14, 'test1699281404.jpg', 1, 2, 8),
(15, 'test1699281454.jpg', 1, 1, 8),
(16, 'test1699281383.jpg', 1, 0, 8),
(17, 'test1699281475.jpg', 1, 0, 8),
(18, 'test1699281492.jpg', 1, 0, 8),
(19, 'test1699281505.jpg', 1, 0, 8),
(20, 'test1699281529.jpg', 1, 0, 8),
(21, 'test1699881091.jpg', 1, 0, 8),
(22, 'test1699881107.jpg', 1, 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nom_menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prix_menu` decimal(6,2) DEFAULT NULL,
  `afficher_menu` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id_menu`, `nom_menu`, `prix_menu`, `afficher_menu`) VALUES
(1, 'Menu du jour', '22.00', 0),
(2, 'Menu du jour', '22.00', 0),
(3, 'Menu du jour', '22.00', 1),
(5, 'Menu du jour', '22.00', 0),
(6, 'Menu du jour', '22.00', 0),
(7, 'Menu du jour', '24.00', 1),
(8, 'Menu Entreprise', '35.00', 1),
(9, 'Saveurs du Nord-Pas-de-Calais', '15.50', 1),
(10, 'Voyage en Lorraine', '16.50', 1),
(11, 'Escapade Gourmande en Champagne-Ardenne', '14.50', 1),
(12, 'Balade Gourmande en Alsace', '18.50', 1),
(13, 'Délices Végétariens du Grand Est', '15.50', 1),
(14, 'Menu du jour', '5.20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `nom_message` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_message` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_message` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sujet_message` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `corps_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_message` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lu_message` int DEFAULT NULL,
  `repondu_message` int DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `nom_message`, `prenom_message`, `mail_message`, `sujet_message`, `corps_message`, `date_message`, `lu_message`, `repondu_message`) VALUES
(1, 'testnom', 'testprenom', 'toto@toto.com', 'test', 'blabla', '1698049120', 1, 1),
(2, 'testnom2', 'test2', 'toto@toto.com', 'test', 'gregre', '1698059835', 1, 1),
(3, 'test', 'test', 'test@test.com', 'test', 'test', '1698588526', 1, 0),
(4, 'test', 'test', 'test@test.com', 'test', 'test', '1698588532', 0, 0),
(5, 'test', 'test', 'test@test.com', 'test', 'test', '1698588535', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `identifiant_utilisateur` int DEFAULT NULL,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_utilisateur` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel_utilisateur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mdp_utilisateur` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expiration_date` int DEFAULT NULL,
  `id_cat_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `identifiant_utilisateur` (`identifiant_utilisateur`),
  KEY `id_cat_utilisateur` (`id_cat_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`, `token`, `expiration_date`, `id_cat_utilisateur`) VALUES
(1, 1698478580, 'mest', 'client modifier', 'test@test.com', '0312345678', '$2y$10$x0llDpJTb.lQVaY/08/c4u2FJLxCN48HBYbticGwiuq1ArwvfD5aK', NULL, NULL, 2),
(2, 1698478813, 'test', 'client', 'test2@test.com', '0312345678', '$2y$10$TYh7eMvDspo7M9DL70AnRueQ0UyTCPSIuNUj6g9otxxLG6xlCHHEa', NULL, NULL, 2),
(3, 1698478991, 'rest', 'client', 'test3@test.com', '0312345678', '$2y$10$r5h7zihukhXbJJ0eThdynej8nyDZcP6ON5ZuIa0uS4pRdEiSYlC5y', NULL, NULL, 2),
(4, 1698496722, 'test2', 'client2', 'test4@test.com', '0312345678', '$2y$10$MWbTuXDbBCfg.wDeSXG6pOY2DIu700KEqk4U548tljvt3/cB7YH66', NULL, NULL, 2),
(5, 1, 'admin', 'test', 'admin@admin.com', '0212234556', '$2y$10$WHZpB.faXCmT6/Oi/DzuIuXm6mEkZdhjqYaLcbr8HmvdrkLcFVmOq', NULL, NULL, 1),
(6, 1699790343, 'test', 'client', 'laureline.hormain@gmail.com', '0312345678', '$2y$10$KuJeqKCZ6J2/qm8/OtT95u2HFK81KarA3QTZ789BKzrIzDVsxAg2u', NULL, NULL, 2),
(7, 0, 'superadmin', 'superadmin', 'superadmin@mail.com', NULL, '$2y$10$RhUjimCoq6qrxRCfGQJqy.J9uyVQ1..GuGsUUUG3oCu81aNOlawke', NULL, NULL, 3),
(8, 1699865886, 'admin', 'test', 'admin1@mail.com', '0212234556', '$2y$10$CvWlRLvgfm5KI5LJX2wR/ONThBwJfiF/7lTNPC3C89ZHUiRxi25ky', NULL, NULL, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assiettes`
--
ALTER TABLE `assiettes`
  ADD CONSTRAINT `assiettes_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories_assiettes` (`id_cat`);

--
-- Contraintes pour la table `composition_menu`
--
ALTER TABLE `composition_menu`
  ADD CONSTRAINT `composition_menu_ibfk_1` FOREIGN KEY (`id_assiette`) REFERENCES `assiettes` (`id_assiette`),
  ADD CONSTRAINT `composition_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`);

--
-- Contraintes pour la table `illustration_menu`
--
ALTER TABLE `illustration_menu`
  ADD CONSTRAINT `illustration_menu_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `images` (`id_image`),
  ADD CONSTRAINT `illustration_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories_assiettes` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
