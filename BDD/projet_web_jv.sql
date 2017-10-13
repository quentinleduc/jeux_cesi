-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Octobre 2017 à 07:24
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
  `CAT_Nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'Hack \'n\' slash');

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
  `JV_Date_insert` date NOT NULL,
  `JV_Date_update` date DEFAULT NULL,
  `JV_Image` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeuxvideo`
--

INSERT INTO `jeuxvideo` (`JV_id`, `JV_Nom`, `JV_Categorie_id`, `JV_Date_insert`, `JV_Date_update`, `JV_Image`) VALUES
(1, 'Halo', 1, '2017-10-11', '0000-00-00', 'halo5.jpg'),
(2, 'Civilization', 8, '2017-10-10', '0000-00-00', 'civilization.jpg'),
(3, 'GTA 5', 5, '2017-10-10', NULL, 'gta5.jpg'),
(4, 'Mario Kart', 6, '2017-10-11', NULL, 'mariokart8.jpg'),
(5, 'FIFA18', 5, '2017-10-11', NULL, 'fifa18.jpg'),
(6, 'Hitman', 1, '2017-10-12', NULL, 'hitman.jpg'),
(7, 'PUBG', 1, '2017-10-10', NULL, 'pubg.jpg'),
(8, 'For Honor', 1, '2017-10-11', NULL, 'forhonor.jpg'),
(9, 'Bioshock', 7, '2017-10-09', NULL, 'bioshock.jpg'),
(10, 'Skyrim', 2, '2017-10-08', NULL, 'skyrim.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `jv_tjv`
--

CREATE TABLE `jv_tjv` (
  `JV_TJV_id` int(11) NOT NULL,
  `JV_TJV_JeuxV_id` int(11) NOT NULL,
  `JV_TJV_TypeJ_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `typejeux` (
  `TJV_id` int(11) NOT NULL DEFAULT '0',
  `TJV_Nom` varchar(70) NOT NULL
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

CREATE TABLE `utilisateur` (
  `UTI_id` int(11) NOT NULL,
  `UTI_Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Login` varchar(30) COLLATE utf8_bin NOT NULL,
  `UTI_Password` varchar(255) COLLATE utf8_bin NOT NULL,
  `UTI_Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `UTI_Grade` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UTI_id`, `UTI_Nom`, `UTI_Prenom`, `UTI_Login`, `UTI_Password`, `UTI_Email`, `UTI_Grade`) VALUES
(1, 'Bonisseur de La Bath', 'Hubert', 'admin', 'azerty', 'Hubert@oss117.fr', 'admin'),
(2, 'Austin', 'Powers', 'user', 'azerty', 'Austin@agent.fr', 'user'),
(3, 'test', 'test2', 'test2', 'yass', 'zegzg', 'user'),
(4, 'test', 'test2', 'yass', 'yass', 'yass', 'user');

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
  ADD KEY `JV_Categorie_id` (`JV_Categorie_id`);

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
  MODIFY `CAT_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `jeuxvideo`
--
ALTER TABLE `jeuxvideo`
  MODIFY `JV_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `jv_tjv`
--
ALTER TABLE `jv_tjv`
  MODIFY `JV_TJV_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UTI_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `jeuxvideo_ibfk_1` FOREIGN KEY (`JV_Categorie_id`) REFERENCES `categorie` (`CAT_id`);

--
-- Contraintes pour la table `jv_tjv`
--
ALTER TABLE `jv_tjv`
  ADD CONSTRAINT `jv_tjv_ibfk_1` FOREIGN KEY (`JV_TJV_JeuxV_id`) REFERENCES `jeuxvideo` (`JV_id`),
  ADD CONSTRAINT `jv_tjv_ibfk_2` FOREIGN KEY (`JV_TJV_TypeJ_id`) REFERENCES `typejeux` (`TJV_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
