-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 28 avr. 2022 à 08:20
-- Version du serveur : 10.3.31-MariaDB-0+deb10u1
-- Version de PHP : 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abcde1255905`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocnote`
--

CREATE TABLE `blocnote` (
  `bn_id` int(11) NOT NULL,
  `bn_nom` mediumtext NOT NULL,
  `bn_txt` mediumtext NOT NULL,
  `bn_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blocnote`
--

INSERT INTO `blocnote` (`bn_id`, `bn_nom`, `bn_txt`, `bn_date`) VALUES
(1, 'Matthias', '', '2022-02-12'),
(2, 'Sandrine', '', '2021-06-18'),
(3, 'Nicolas', '----------------------------------------------\r\n17&quot; / 1T voir +/ bonne carte graphique/dall mat/16Go\r\n4USB/pave numerique /bon pross/\r\n06 08 49 34 65 Michel\r\n\r\n\r\n\r\n', '0000-00-00'),
(4, 'Commun', 'commander\r\n1 pro 10400\r\n2 asus 17&#039;\r\n2 souris filaire M100\r\n3 cles usb 64go', '2022-03-19'),
(5, 'Ã€ facturer', '', '2021-07-14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blocnote`
--
ALTER TABLE `blocnote`
  ADD PRIMARY KEY (`bn_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blocnote`
--
ALTER TABLE `blocnote`
  MODIFY `bn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
