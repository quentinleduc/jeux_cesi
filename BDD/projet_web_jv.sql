-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Octobre 2017 à 13:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_web_jv`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `CAT_id` int(11) NOT NULL AUTO_INCREMENT,
  `CAT_Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`CAT_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CAT_id`, `CAT_Nom`) VALUES
(1, 'Action'),
(2, 'RPG'),
(5, 'Simulation'),
(6, 'Course'),
(7, 'Aventure'),
(8, 'Stratégie'),
(9, 'Hack ''n'' slash');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `COM_id` int(11) NOT NULL DEFAULT '0',
  `COM_Description` varchar(2000) NOT NULL,
  `COM_Utilisateur_id` int(11) NOT NULL,
  `COM_JeuxVideo_id` int(11) NOT NULL,
  `COM_Date` date NOT NULL,
  PRIMARY KEY (`COM_id`),
  KEY `COM_Utilisateur_id` (`COM_Utilisateur_id`,`COM_JeuxVideo_id`),
  KEY `COM_JeuxVideo_id` (`COM_JeuxVideo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeuxvideo`
--

CREATE TABLE IF NOT EXISTS `jeuxvideo` (
  `JV_id` int(11) NOT NULL AUTO_INCREMENT,
  `JV_Nom` varchar(60) NOT NULL,
  `JV_Categorie_id` int(11) NOT NULL,
  `JV_Type_jeux_id` int(11) NOT NULL,
  `JV_Date_insert` date NOT NULL,
  `JV_Date_update` date DEFAULT NULL,
  PRIMARY KEY (`JV_id`),
  KEY `JV_Categorie_id` (`JV_Categorie_id`),
  KEY `JV_Type_jeux_id` (`JV_Type_jeux_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `jeuxvideo`
--

INSERT INTO `jeuxvideo` (`JV_id`, `JV_Nom`, `JV_Categorie_id`, `JV_Type_jeux_id`, `JV_Date_insert`, `JV_Date_update`) VALUES
(1, 'Halo', 1, 7, '2017-10-11', '0000-00-00'),
(2, 'Civilization', 8, 7, '2017-10-10', '0000-00-00'),
(3, 'GTA 5', 5, 2, '2017-10-10', NULL),
(4, 'Mario Kart', 6, 6, '2017-10-11', NULL),
(5, 'FIFA18', 5, 2, '2017-10-11', NULL),
(6, 'Hitman', 1, 3, '2017-10-12', NULL),
(7, 'PUBG', 1, 7, '2017-10-10', NULL),
(8, 'For Honor', 1, 3, '2017-10-11', NULL),
(9, 'Bioshock', 7, 7, '2017-10-09', NULL),
(10, 'Skyrim', 2, 7, '2017-10-08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jv_tjv`
--

CREATE TABLE IF NOT EXISTS `jv_tjv` (
  `JV_TJV_id` int(11) NOT NULL AUTO_INCREMENT,
  `JV_TJV_JeuxV_id` int(11) NOT NULL,
  `JV_TJV_TypeJ_id` int(11) NOT NULL,
  PRIMARY KEY (`JV_TJV_id`),
  KEY `JV_TJV_JeuxV_id` (`JV_TJV_JeuxV_id`,`JV_TJV_TypeJ_id`),
  KEY `JV_TJV_TypeJ_id` (`JV_TJV_TypeJ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Contenu de la table `jv_tjv`
--

INSERT INTO `jv_tjv` (`JV_TJV_id`, `JV_TJV_JeuxV_id`, `JV_TJV_TypeJ_id`) VALUES
(1, 1, 7),
(2, 2, 7),
(3, 3, 2),
(4, 4, 6),
(5, 5, 2),
(6, 6, 3),
(7, 7, 7),
(8, 8, 3),
(9, 9, 7),
(10, 10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `typejeux`
--

CREATE TABLE IF NOT EXISTS `typejeux` (
  `TJV_id` int(11) NOT NULL DEFAULT '0',
  `TJV_Nom` varchar(70) NOT NULL,
  PRIMARY KEY (`TJV_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typejeux`
--

INSERT INTO `typejeux` (`TJV_id`, `TJV_Nom`) VALUES
(1, 'PS3'),
(2, 'PS4'),
(3, 'XBOX 360'),
(4, 'XBOX ONE'),
(5, 'WII U'),
(6, 'SWITCH'),
(7, 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UTI_id` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Login` varchar(30) COLLATE utf8_bin NOT NULL,
  `UTI_Password` varchar(255) COLLATE utf8_bin NOT NULL,
  `UTI_Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Grade` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`UTI_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UTI_id`, `UTI_Nom`, `UTI_Prenom`, `UTI_Login`, `UTI_Password`, `UTI_Email`, `UTI_Grade`) VALUES
(1, 'Bonisseur de La Bath', 'Hubert', 'admin', 'azerty', 'Hubert@oss117.fr', 'admin'),
(2, 'Austin', 'Powers', 'user', 'azerty', 'Austin@agent.fr', 'user');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`COM_Utilisateur_id`) REFERENCES `utilisateur` (`UTI_id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`COM_JeuxVideo_id`) REFERENCES `jeuxvideo` (`JV_id`);

--
-- Contraintes pour la table `jeuxvideo`
--
ALTER TABLE `jeuxvideo`
  ADD CONSTRAINT `jeuxvideo_ibfk_1` FOREIGN KEY (`JV_Categorie_id`) REFERENCES `categorie` (`CAT_id`),
  ADD CONSTRAINT `jeuxvideo_ibfk_2` FOREIGN KEY (`JV_Type_jeux_id`) REFERENCES `typejeux` (`TJV_id`);

--
-- Contraintes pour la table `jv_tjv`
--
ALTER TABLE `jv_tjv`
  ADD CONSTRAINT `jv_tjv_ibfk_1` FOREIGN KEY (`JV_TJV_JeuxV_id`) REFERENCES `jeuxvideo` (`JV_id`),
  ADD CONSTRAINT `jv_tjv_ibfk_2` FOREIGN KEY (`JV_TJV_TypeJ_id`) REFERENCES `typejeux` (`TJV_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
