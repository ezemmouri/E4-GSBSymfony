-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 mai 2020 à 15:39
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `nbre_heures` int(11) DEFAULT NULL,
  `departement` int(11) DEFAULT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFF347EFB` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `produit_id`, `date_debut`, `nbre_heures`, `departement`, `ville`) VALUES
(1, 1, '2019-11-05 00:00:00', 13, 13, 'Paris'),
(4, 1, '2014-01-01 00:00:00', 1, 1, '1'),
(5, 1, '2014-01-01 00:00:00', 23, 4, '3'),
(6, 1, '2014-03-01 00:00:00', 1, 1, '1'),
(7, 1, '2014-01-01 00:00:00', 4, 75, 'Paris'),
(8, 1, '2014-01-01 00:00:00', 1, 1, 'A'),
(9, 1, '2019-11-28 08:04:00', 5, 75, 'Paris'),
(10, 1, '2019-11-28 09:09:00', 5, 575, 'dssdd'),
(11, 1, '2019-11-28 09:54:00', 7, 75, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E90F6D65200282E` (`formation_id`),
  KEY `IDX_5E90F6D6A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `user_id`, `formation_id`, `status`) VALUES
(4, 9, 1, 'declined'),
(5, 9, 4, 'accepted'),
(6, 9, 5, 'declined'),
(7, 9, 6, 'accepted'),
(8, 9, 7, 'accepted'),
(9, 12, 1, 'accepted'),
(10, 12, 4, 'declined'),
(11, 12, 5, 'accepted'),
(12, 12, 6, 'declined'),
(13, 12, 7, 'accepted'),
(14, 12, 8, 'declined'),
(15, 12, 10, 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191003132640', '2019-10-03 13:27:01'),
('20191003140103', '2019-10-03 14:01:26'),
('20191003140900', '2019-10-03 14:09:09'),
('20191003141316', '2019-10-03 14:13:24');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`) VALUES
(1, 'Medoc');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649AA08CB10` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `roles`, `password`, `nom`, `prenom`, `status`) VALUES
(1, 'aaa', '[]', '$argon2id$v=19$m=65536,t=4,p=1$SXNqT1ltSEFwb1RhSTE1UA$vX1ywiQ7fObjMlh7pShTVxLLKBFrZijne+TQsOCuKhc', 'A', 'A', 0),
(2, 'aaaA', '[]', '$argon2id$v=19$m=65536,t=4,p=1$VkdSWjlELjhPenNsaTlBMw$9+jXGd0guNS12Wy09X2cBiYJ9ibeKfDFFUOwMvxadJw', 'A', 'A', 1),
(3, 'aaaAa', '[]', '$argon2id$v=19$m=65536,t=4,p=1$SWJmRVBuQ0Q4SEVDSlB4aw$V61HP3/X3qIID9qqVGyV1ySEpA63FlXr9vLrdoEnpdw', 'A', 'A', 1),
(4, 'aaaAaa', '[]', '$argon2id$v=19$m=65536,t=4,p=1$anFnWm4zVjk1UzFOTmhUeA$Ib9UavU1fls+rWwiNicksvwIViuBeXb7VX5BrRzkufg', 'A', 'A', 1),
(5, 'a', '[]', 'a', 'a', 'a', 1),
(6, 'test1', '[]', 'aaaaaaaaaaaa', 'a', 'a', 0),
(7, 'test1a', '[]', '$2y$13$nAwbSvcpN64nhL6mhzpqKeFJbbTqgDtgB0m9CqtbOvwSWBY3hfUb2', 'a', 'a', 0),
(8, 'test2', '[]', '$2y$13$jftmuaD.G/z2OchnBBQp8.auCUvcEOll7iKoTq5QgJKYWqHXqsU22', 'a', 'a', 0),
(9, 'test3', '[]', '$2y$13$s4eqBQhayIM.fmPfBt7pOeTEu/dBuFx7MT6.jzNbZIoPJTbuxmpeu', 'a', 'A', 1),
(10, 'test5', '[]', '$2y$13$ZUtrPAECKyReiwBh0tL8DebX1b3spks7F31XwtcM2NT3nQsAkL93q', '1', '1', 1),
(11, 'admin', '[]', '$2y$13$NcgfI/7bwcV2U8Pk0RBo4.qP0NdOAHsoR297y6zAf7T9Bp0pK6zMa', 'oui', 'oui', 0),
(12, 'Evan', '[]', '$2y$13$dJ.mE85QSg1wrZRjmmukWOGhcSGluOkhDNphKF7FoQYCEi/Zh7zWe', 'zemmouri', 'evan', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BFF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D65200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_5E90F6D6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
