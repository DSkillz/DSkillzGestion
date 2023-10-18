-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 28 avr. 2022 à 08:21
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
-- Structure de la table `occasions`
--

CREATE TABLE `occasions` (
  `occas_id` int(11) NOT NULL,
  `occas_type` mediumtext NOT NULL,
  `occas_txt` mediumtext NOT NULL,
  `occas_prix` mediumtext NOT NULL,
  `occas_status` mediumtext NOT NULL,
  `occas_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `occasions`
--

INSERT INTO `occasions` (`occas_id`, `occas_type`, `occas_txt`, `occas_prix`, `occas_status`, `occas_date`) VALUES
(1, 'fixe', 'CPU:AMD A4-4400\r\nSSD 240Go +HHD 500Go\r\nDDR3 4Go\r\nWindows 10 Pro ', '260', 'Au magasin', '2021-06-22'),
(2, 'fixe', 'CPU : AMD X2 250\r\nMEMOIRE / 2 Go\r\nSSD 240Go +HHD 500Go\r\nWindows 10 Famille', '180', 'Au magasin', '0000-00-00'),
(3, 'fixe', 'Processeur : ATHLON X3 450\r\nM&eacute;moire : 4Go ddr\r\nDisque dur : 1T \r\nos : Linux Mint', '100', 'Au magasin', '0000-00-00'),
(4, 'autre', 'ECRAN 19&quot; HP', '30', 'Au magasin', '0000-00-00'),
(5, 'fixe', 'Processeur: Intel Core2Quad 3GHZ\r\nM&eacute;moire :4Go\r\nSSD 240Go\r\nCarte Graphique : Quadro FX 1800\r\nWindows 10 Pro ', '250', 'Au magasin', '0000-00-00'),
(6, 'portable', 'CPU: INTEL DUAL CORE T4400 2.2GHZ\r\nSSD 240Go \r\nDDR3 4Go\r\nEcran 17&quot;\r\nWindows 10 Pro ', '250', 'Au magasin', '0000-00-00'),
(7, 'portable', 'CPU: Intel Celeron 2.2\r\nSSD 240Go\r\nDDR 3Go\r\nEcran : 15&quot;\r\nWindows 10 Famille ', '180', 'Au magasin', '0000-00-00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`occas_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `occas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
