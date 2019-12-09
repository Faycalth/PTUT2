-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 déc. 2019 à 21:46
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ptut2`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupe_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_717E22E37A45358C` (`groupe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `groupe_id`, `nom`, `prenom`, `email`, `password`) VALUES
(4, NULL, 'diop', 'ravane', 'ravane@gmail.com', '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS'),
(118, NULL, 'test', 'test', 'test.test@etu.univ-lyon1.fr', '$2y$10$Aqi0zHRyFhWnH.wo3.Eq5ejaU4zfedwmCRJD.R7RjmmwcNXRoHBZm');

--
-- Déclencheurs `etudiant`
--
DROP TRIGGER IF EXISTS `ajout_etudiant_fosuer`;
DELIMITER $$
CREATE TRIGGER `ajout_etudiant_fosuer` AFTER INSERT ON `etudiant` FOR EACH ROW INSERT into `fos_user` values (new.id,new.prenom,new.prenom,new.email,new.email,1,NULL,new.password,NOW(),NULL,NULL,'a:1:{i:0;s:9:"ROLE_USER";}',new.nom,new.prenom)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `suprim_groupe_update`;
DELIMITER $$
CREATE TRIGGER `suprim_groupe_update` AFTER UPDATE ON `etudiant` FOR EACH ROW begin
        DECLARE is_done INTEGER DEFAULT 0;
        DECLARE  DECIMAL(18,2);
        DECLARE nb_etu DECIMAL(18,2);      
        declare monCurseur cursor for select id FROM  `groupe` where id not in (   SELECT g.id FROM `etudiant` e, `groupe` g WHERE e.groupe_id=g.id );   
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET is_done = 1; OPEN monCurseur;tarif_loop: LOOP FETCH monCurseur INTO ;  IF is_done = 1 THEN
          LEAVE tarif_loop; END IF;delete from `groupe` where id=; END LOOP; CLOSE monCurseur;   
        end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `suprime_groupe_delete`;
DELIMITER $$
CREATE TRIGGER `suprime_groupe_delete` AFTER DELETE ON `etudiant` FOR EACH ROW begin
        DECLARE is_done INTEGER DEFAULT 0;
        DECLARE  DECIMAL(18,2);
        DECLARE nb_etu DECIMAL(18,2);      
        declare monCurseur cursor for select id FROM  `groupe` where id not in (   SELECT g.id FROM `etudiant` e, `groupe` g WHERE e.groupe_id=g.id );   
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET is_done = 1; OPEN monCurseur;tarif_loop: LOOP FETCH monCurseur INTO ;  IF is_done = 1 THEN
          LEAVE tarif_loop; END IF;delete from `groupe` where id=; END LOOP; CLOSE monCurseur;   
        end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`) VALUES
(1, 'samba', 'samba', 'sambadiarra2000@gmail.com', 'sambadiarra2000@gmail.com', 1, NULL, '$2y$13$ZkA1DSMcCC3IJeZLuGLEm.b9TxWCTfT/y.OvM186Yoz5FSjG.oX4K', '2019-12-09 17:47:48', NULL, NULL, 'a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";}', 'samba', 'Samba diarra'),
(4, 'ravane', 'ravane', 'ravane@gmail.com', 'ravane@gmail.com', 1, NULL, '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', '2019-12-09 21:44:30', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'ravane', 'ravane'),
(15, 'prof2', 'prof2', 'prof2@gmail.com', 'prof2@gmail.com', 1, NULL, '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', '2019-12-09 18:53:30', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'prof2', 'prof2'),
(118, 'test', 'test', 'test.test@etu.univ-lyon1.fr', 'test.test@etu.univ-lyon1.fr', 1, NULL, '$2y$10$Aqi0zHRyFhWnH.wo3.Eq5ejaU4zfedwmCRJD.R7RjmmwcNXRoHBZm', '2019-12-09 15:28:50', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professeur_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B98C21BAB22EE9` (`professeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('20191001185622', '2019-10-21 09:42:34'),
('20191013140307', '2019-10-29 18:22:39'),
('20191029182008', '2019-10-29 18:22:40'),
('20191102144700', '2019-11-02 14:51:43'),
('20191104133706', '2019-11-04 13:37:27'),
('20191104210727', '2019-11-04 21:09:11'),
('20191105184053', '2019-11-05 18:41:11'),
('20191105192207', '2019-11-05 19:22:20');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_etudiant_id` int(11) DEFAULT NULL,
  `dest_etudiant_id` int(11) DEFAULT NULL,
  `source_groupe_id` int(11) DEFAULT NULL,
  `dest_groupe_id` int(11) DEFAULT NULL,
  `nom_etudiant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_professeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_groupe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `source_professeur_id` int(11) DEFAULT NULL,
  `dest_professeur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BF5476CAE195E103` (`source_etudiant_id`),
  KEY `IDX_BF5476CA64B33483` (`dest_etudiant_id`),
  KEY `IDX_BF5476CA12DBA642` (`source_groupe_id`),
  KEY `IDX_BF5476CA9E6A9E2A` (`dest_groupe_id`),
  KEY `IDX_BF5476CA7FDEFF8B` (`source_professeur_id`),
  KEY `IDX_BF5476CAB2E4C4BD` (`dest_professeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `prenom`, `email`, `password`, `nom`) VALUES
(15, 'prof2', 'prof2@gmail.com', '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', 'prof2'),
(16, 'prof1', 'prof1@prof1.com', '$2y$13$ZkA1DSMcCC3IJeZLuGLEm.b9TxWCTfT/y.OvM186Yoz5FSjG.oX4K', 'prof1');

--
-- Déclencheurs `professeur`
--
DROP TRIGGER IF EXISTS `ajout_professeur_fosuer`;
DELIMITER $$
CREATE TRIGGER `ajout_professeur_fosuer` AFTER INSERT ON `professeur` FOR EACH ROW INSERT into `fos_user` values (new.id,new.prenom,new.prenom,new.email,new.email,1,NULL,new.password,NOW(),NULL,NULL,'a:1:{i:0;s:9:"ROLE_USER";}',new.nom,new.prenom)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

DROP TABLE IF EXISTS `reunion`;
CREATE TABLE IF NOT EXISTS `reunion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `afaire` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5B00A4823256915B` (`relation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_groupe` int(11) DEFAULT NULL,
  `nom_tache` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_tache` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tache_realisee` tinyint(1) NOT NULL,
  `nombre_sous_taches` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E37A45358C` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_4B98C21BAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_BF5476CA12DBA642` FOREIGN KEY (`source_groupe_id`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `FK_BF5476CA64B33483` FOREIGN KEY (`dest_etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_BF5476CA7FDEFF8B` FOREIGN KEY (`source_professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_BF5476CA9E6A9E2A` FOREIGN KEY (`dest_groupe_id`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `FK_BF5476CAB2E4C4BD` FOREIGN KEY (`dest_professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_BF5476CAE195E103` FOREIGN KEY (`source_etudiant_id`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `reunion`
--
ALTER TABLE `reunion`
  ADD CONSTRAINT `FK_5B00A4823256915B` FOREIGN KEY (`relation_id`) REFERENCES `groupe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
