-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Octobre 2017 à 15:33
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
  `CAT_Nom` text NOT NULL,
  PRIMARY KEY (`CAT_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`COM_id`)
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
  `JV_Date_update` date NOT NULL,
  PRIMARY KEY (`JV_id`),
  KEY `JV_Categorie_id` (`JV_Categorie_id`),
  KEY `JV_Type_jeux_id` (`JV_Type_jeux_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `jv_tjv`
--

CREATE TABLE IF NOT EXISTS `jv_tjv` (
  `JVTJV_id` int(11) NOT NULL AUTO_INCREMENT,
  `JVTJV_id_jv` int(11) NOT NULL,
  `JVTJV_id_tjv` int(11) NOT NULL,
  PRIMARY KEY (`JVTJV_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `typejeux`
--

CREATE TABLE IF NOT EXISTS `typejeux` (
  `TJV_id` int(11) NOT NULL DEFAULT '0',
  `TJV_Nom` varchar(70) NOT NULL,
  PRIMARY KEY (`TJV_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisaeur`
--

CREATE TABLE IF NOT EXISTS `utilisaeur` (
  `UTI_id` int(11) NOT NULL DEFAULT '0',
  `UTI_Nom` varchar(70) NOT NULL,
  `UTI_Prenom` varchar(70) NOT NULL,
  `UTI_Login` varchar(30) NOT NULL,
  `UTI_Password` varchar(30) NOT NULL,
  `UTI_Email` varchar(50) NOT NULL,
  `UTI_Grade` varchar(10) NOT NULL,
  PRIMARY KEY (`UTI_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
