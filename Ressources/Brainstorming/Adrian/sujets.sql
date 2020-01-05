-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 05 jan. 2020 à 17:09
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetcoding`
--

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(64) NOT NULL,
  `section` varchar(64) NOT NULL,
  `dateLastMessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id`, `titre`, `section`, `dateLastMessage`) VALUES
(1, 'zet\'r545eq 45e4q ', 'Jeu1', '2020-01-09 08:00:24'),
(2, 'qrezt87\'zet 46ezr4 2er4 y5e6rq', 'Jeu1', '2020-01-13 10:31:37'),
(3, 'eqr145herqhgerq  rqzet85z74hg87zr4 ', 'Jeu2', '2020-01-15 15:21:19'),
(4, 'tr6h6e1h54er', 'Jeu2', '2020-01-14 12:43:21'),
(5, 'Z54T54QZRE4G1Ze', 'Jeu2', '2020-01-15 15:37:40'),
(6, 'er54h65e4h5', 'Jeu3', '2020-01-05 06:31:29'),
(7, 'er54yg54', 'Jeu3', '2020-01-16 04:11:23'),
(8, 'ery54e4hy56qer1h5', 'Jeu3', '2020-01-14 14:00:34'),
(9, 'eqrgh651e4h4ehr5', 'Site1', '2020-01-17 08:21:42'),
(10, 'trj94et5s6h6es2', 'Site1', '2020-01-23 12:21:00'),
(11, 'teh5166e51hy65etr', 'Site1', '2020-01-14 13:37:00'),
(12, 'ed16ht165eth1', 'Site2', '2020-01-22 13:00:32'),
(13, 'hvgccgfhdgfh', 'Site2', '2020-01-15 05:00:25'),
(14, 'rfjsks', 'Site2', '2020-01-03 13:00:15'),
(15, 'sfkgloksgj', 'Site3', '2020-01-10 00:00:23'),
(16, 'sfgh', 'Site3', '2020-01-16 14:41:37'),
(17, 'gfjfghykl', 'Site3', '2020-01-15 14:29:14'),
(18, 'ZSGHJSFJQS', 'Autre1', '2020-01-15 00:30:31'),
(19, 'SFGHGFSJ', 'Autre1', '2020-01-16 20:52:50'),
(20, 'QSDQSgfgfdh', 'Autre1', '2020-01-08 15:00:30'),
(21, 'QSGFQHGHJ', 'Autre2', '2020-01-12 22:57:29'),
(22, 'sfgjgfsqgS', 'Autre2', '2020-01-07 16:35:41'),
(23, 'qsdfgsqfgfdhs', 'Autre2', '2020-01-08 17:00:38'),
(24, ',hgd,g,gsh', 'Autre3', '2020-01-03 20:33:39'),
(25, 'gnfgnfgnfhgnfghfgnfg', 'Autre3', '2020-01-16 21:47:00'),
(26, 'gddfbfsdbdfb', 'Autre3', '2020-01-22 13:35:35'),
(58, ' b\"e475eqz45erg', 'Jeu1', '2020-01-15 15:00:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
