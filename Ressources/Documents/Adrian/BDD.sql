-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 13 jan. 2020 à 15:19
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

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
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Jeu'),
(2, 'Site'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE `choix` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `consequence_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `choix`
--

INSERT INTO `choix` (`id`, `nom`, `consequence_id`) VALUES
(1, 'épée', 1),
(2, 'bouclier', 1),
(3, 'Aller à sa rencontre', 2),
(4, 'Passer votre chemin', 3),
(5, 'Combattre', 4),
(6, 'Fuir', 5),
(7, 'Ouvrir', 6),
(8, 'Ne pas ouvrir', 7);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(10) UNSIGNED NOT NULL,
  `texte` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sujets_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `consequence`
--

CREATE TABLE `consequence` (
  `id` int(10) UNSIGNED NOT NULL,
  `narration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consequence`
--

INSERT INTO `consequence` (`id`, `narration`) VALUES
(1, 'Tu as donc choisi'),
(2, '\"Encore une nouvelle recrue ? J\'espère que tu ne finiras pas comme tous les autres... Seul un élève a réussi à sortir d\'ici. Voici pour toi, tu m\'as l\'air sympathique.\"\r\n\r\nVous obtenez une paire de gant.\r\nAtq +1'),
(3, 'Vous passez votre chemin, la silhouette à l\'air de vous suivre du regard.'),
(4, 'Vous engagez le combat contre l\'élève fou.'),
(5, 'Vous vous débattez tant bien que mal. L\'élève vous griffe au niveau du bras, vous perdez 2pv.'),
(6, 'Vous ouvrez le coffre malgré les nombreux cris qui en sortent, plus fort et plus aigüe. Vous y trouvez une dague ornée de symbole qui vous semble familier. Vous la prenez, mais la dague vous fait comprendre qu\'elle vous aidera ... à un certain prix.\r\n\r\nAtq +2\r\nVie -3'),
(7, 'Vous passez à coté du coffre, un cri encore plus effroyable en sort. Vous prenez peur et commencez à courir');

-- --------------------------------------------------------

--
-- Structure de la table `ennemi`
--

CREATE TABLE `ennemi` (
  `id` int(10) UNSIGNED NOT NULL,
  `niveau` int(5) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `vie` int(10) UNSIGNED NOT NULL,
  `atq` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ennemi`
--

INSERT INTO `ennemi` (`id`, `niveau`, `nom`, `vie`, `atq`) VALUES
(1, 1, 'Eleve fou', 10, 2),
(2, 2, 'Ombre mystérieuse', 5, 4),
(3, 3, 'Demon', 10, 6);

-- --------------------------------------------------------

--
-- Structure de la table `evennement`
--

CREATE TABLE `evennement` (
  `id` int(10) UNSIGNED NOT NULL,
  `niveau` int(10) UNSIGNED NOT NULL,
  `texte` text NOT NULL,
  `type_event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evennement`
--

INSERT INTO `evennement` (`id`, `niveau`, `texte`, `type_event_id`) VALUES
(1, 1, 'vous appercevez une silhouette d\'apparence humaine.', 1),
(2, 1, 'une forme étrange vous attaque par surprise, vous comprenez très vite que c\'est un ancien élève ayant cédé à la folie.', 2),
(3, 1, 'vous appercevez au loin ce qui s\'apparente à un coffre. Vous vous approchez de celui-ci quand un cri strident en sorti. Prenant votre courage à deux mains, vous arrivez à sa hauteur et lisez \"High risk, high rewards\".', 3);

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

CREATE TABLE `perso` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `atq` int(10) UNSIGNED NOT NULL,
  `vie` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id`, `nom`, `atq`, `vie`) VALUES
(1, 'Jacky le nain', 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id`, `nom`, `categorie_id`) VALUES
(1, 'Entraide', 1),
(2, 'Suggestions', 2),
(3, 'Bugs', 2),
(4, 'Détente', 3),
(5, 'Créations', 3),
(6, 'Mini-jeux', 3);

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(128) NOT NULL,
  `date_creation` datetime NOT NULL,
  `message` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sous_categorie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_event`
--

CREATE TABLE `type_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_event`
--

INSERT INTO `type_event` (`id`, `action`) VALUES
(1, 'Interraction PNJ'),
(2, 'Combat'),
(3, 'Interraction objet');

-- --------------------------------------------------------

--
-- Structure de la table `type_event_has_choix`
--

CREATE TABLE `type_event_has_choix` (
  `type_event_id` int(10) UNSIGNED NOT NULL,
  `choix_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_event_has_choix`
--

INSERT INTO `type_event_has_choix` (`type_event_id`, `choix_id`) VALUES
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `statut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `statut`) VALUES
(1, 'Dramaticale', '$2y$10$r9OGK63ZgKi5fze5JO.vYO7qq19Xxuq1kcq0IK1L8V2cq9A5akWh.', '', ''),
(2, 'Frias64', '$2y$10$pc8Nn1duWVJDzporI.sGWuKVNjlhMWvJjF.sobvs3C24TLK9uvQ9i', '', ''),
(3, 'Admin0', '$2y$10$7J3fePqIhYa40DP4MeK0jetM51rmVgq9gcwSnZlVsaFdSeKiG1YwO', 'membre', 'libre'),
(4, 'Modo0', '$2y$10$D0oMtG7Q.hoYRQfaQ8kpSOS992sL1FIXglIu9FYGDY1QRLqOhLQZi', 'membre', 'libre'),
(5, 'Membre0', '$2y$10$Yn2LO0XpmuPSyHXO5BtgR.Nz99N5IOOAmXYevFgn39A434eI/lPC.', 'membre', 'libre'),
(6, 'Membre0B', '$2y$10$d.sNMm/uQaLVwtcYXGyUB.WXCJQ5NlfRemGsyZz81bTbtPfD4zhFu', 'membre', 'libre');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_perso`
--

CREATE TABLE `user_has_perso` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `perso_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_has_perso`
--

INSERT INTO `user_has_perso` (`user_id`, `perso_id`) VALUES
(1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`id`,`consequence_id`),
  ADD KEY `fk_choix_consequence1_idx` (`consequence_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`,`user_id`,`sujets_id`),
  ADD KEY `fk_commentaires_user_idx` (`user_id`),
  ADD KEY `fk_commentaires_sujets1_idx` (`sujets_id`);

--
-- Index pour la table `consequence`
--
ALTER TABLE `consequence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ennemi`
--
ALTER TABLE `ennemi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evennement`
--
ALTER TABLE `evennement`
  ADD PRIMARY KEY (`id`,`type_event_id`),
  ADD KEY `fk_evennement_type1_idx` (`type_event_id`);

--
-- Index pour la table `perso`
--
ALTER TABLE `perso`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`id`,`categorie_id`),
  ADD KEY `fk_sous_categorie_categorie1_idx` (`categorie_id`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id`,`user_id`,`sous_categorie_id`),
  ADD KEY `fk_sujets_user1_idx` (`user_id`),
  ADD KEY `fk_sujets_sous_categorie1_idx` (`sous_categorie_id`);

--
-- Index pour la table `type_event`
--
ALTER TABLE `type_event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_event_has_choix`
--
ALTER TABLE `type_event_has_choix`
  ADD PRIMARY KEY (`type_event_id`,`choix_id`),
  ADD KEY `fk_type_has_choix_choix1_idx` (`choix_id`),
  ADD KEY `fk_type_has_choix_type1_idx` (`type_event_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_has_perso`
--
ALTER TABLE `user_has_perso`
  ADD PRIMARY KEY (`user_id`,`perso_id`),
  ADD KEY `fk_user_has_perso_perso1_idx` (`perso_id`),
  ADD KEY `fk_user_has_perso_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `choix`
--
ALTER TABLE `choix`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `consequence`
--
ALTER TABLE `consequence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ennemi`
--
ALTER TABLE `ennemi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `evennement`
--
ALTER TABLE `evennement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `perso`
--
ALTER TABLE `perso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_event`
--
ALTER TABLE `type_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `fk_choix_consequence1` FOREIGN KEY (`consequence_id`) REFERENCES `consequence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaires_sujets1` FOREIGN KEY (`sujets_id`) REFERENCES `sujets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evennement`
--
ALTER TABLE `evennement`
  ADD CONSTRAINT `fk_evennement_type1` FOREIGN KEY (`type_event_id`) REFERENCES `type_event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `fk_sous_categorie_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD CONSTRAINT `fk_sujets_sous_categorie1` FOREIGN KEY (`sous_categorie_id`) REFERENCES `sous_categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sujets_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `type_event_has_choix`
--
ALTER TABLE `type_event_has_choix`
  ADD CONSTRAINT `fk_type_has_choix_choix1` FOREIGN KEY (`choix_id`) REFERENCES `choix` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_has_choix_type1` FOREIGN KEY (`type_event_id`) REFERENCES `type_event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_perso`
--
ALTER TABLE `user_has_perso`
  ADD CONSTRAINT `fk_user_has_perso_perso1` FOREIGN KEY (`perso_id`) REFERENCES `perso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_perso_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
