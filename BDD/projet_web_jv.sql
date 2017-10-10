-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Octobre 2017 à 15:02
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web_jv`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CAT_id` int(11) NOT NULL,
  `CAT_Nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `COM_id` int(11) NOT NULL DEFAULT '0',
  `COM_Description` varchar(2000) NOT NULL,
  `COM_Utilisateur_id` int(11) NOT NULL,
  `COM_JeuxVideo_id` int(11) NOT NULL,
  `COM_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeuxvideo`
--

CREATE TABLE `jeuxvideo` (
  `JV_id` int(11) NOT NULL,
  `JV_Nom` varchar(60) NOT NULL,
  `JV_Categorie_id` int(11) NOT NULL,
  `JV_Type_jeux_id` int(11) NOT NULL,
  `JV_Date_insert` date NOT NULL,
  `JV_Date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jv_tjv`
--

CREATE TABLE `jv_tjv` (
  `JV_TJV_id` int(11) NOT NULL,
  `JV_TJV_JeuxV_id` int(11) NOT NULL,
  `JV_TJV_TypeJ_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `typejeux`
--

CREATE TABLE `typejeux` (
  `TJV_id` int(11) NOT NULL DEFAULT '0',
  `TJV_Nom` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `UTI_id` int(11) NOT NULL,
  `UTI_Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Login` int(15) NOT NULL,
  `UTI_Password` varchar(255) COLLATE utf8_bin NOT NULL,
  `UTI_Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Grade` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CAT_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`COM_id`),
  ADD KEY `COM_Utilisateur_id` (`COM_Utilisateur_id`,`COM_JeuxVideo_id`),
  ADD KEY `COM_JeuxVideo_id` (`COM_JeuxVideo_id`);

--
-- Index pour la table `jeuxvideo`
--
ALTER TABLE `jeuxvideo`
  ADD PRIMARY KEY (`JV_id`),
  ADD KEY `JV_Categorie_id` (`JV_Categorie_id`),
  ADD KEY `JV_Type_jeux_id` (`JV_Type_jeux_id`);

--
-- Index pour la table `jv_tjv`
--
ALTER TABLE `jv_tjv`
  ADD PRIMARY KEY (`JV_TJV_id`),
  ADD KEY `JV_TJV_JeuxV_id` (`JV_TJV_JeuxV_id`,`JV_TJV_TypeJ_id`),
  ADD KEY `JV_TJV_TypeJ_id` (`JV_TJV_TypeJ_id`);

--
-- Index pour la table `typejeux`
--
ALTER TABLE `typejeux`
  ADD PRIMARY KEY (`TJV_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UTI_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CAT_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jeuxvideo`
--
ALTER TABLE `jeuxvideo`
  MODIFY `JV_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jv_tjv`
--
ALTER TABLE `jv_tjv`
  MODIFY `JV_TJV_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UTI_id` int(11) NOT NULL AUTO_INCREMENT;
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
