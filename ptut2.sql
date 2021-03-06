-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 jan. 2020 à 16:38
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `groupe_id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 1, 'samba', 'samba', 'samba@gmail.com', 'Douldoul1'),
(4, NULL, 'diop', 'ravane', 'ravane@gmail.com', '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS'),
(5, 2, 'ok', 'saas', 'NICKY@gmail.com', 'Douldoul1'),
(6, 2, 'restore', 'lala', 'lala-ok@gmail.com', 'Sambadf2'),
(9, 1, 'papa', 'papa', 'papa@gmail.com', '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW'),
(11, 1, 'Diouf', 'Samba-diarra', 'sambadiarra200@gmail.com', '$2y$13$ujcgBIMaOeMC21Z8BrrMWO/OZtQqeTlsow1FzmBlv0sI.i/UEWgda'),
(12, 1, 'thamri', 'faycal', 'faycal@gmail.com', '$2y$13$GY35sowsOnMvXAP7tmSZn.0YRkb444w4VruVACo1IXmOq6QHtpoZy'),
(13, NULL, 'baby', 'money', 'samba@gmail.com', 'Douldoul1'),
(15, NULL, 'Rodri', 'Montero', 'rodri@gmail.com', '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS'),
(16, 1, 'assane', 'ndiaye', 'assane@gmail.com', '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS');

--
-- Déclencheurs `etudiant`
--
DROP TRIGGER IF EXISTS `ajout_etudiant_fosuer`;
DELIMITER $$
CREATE TRIGGER `ajout_etudiant_fosuer` AFTER INSERT ON `etudiant` FOR EACH ROW INSERT into `fos_user` (`username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `type`) values (new.prenom,new.prenom,new.email,new.email,1,NULL,new.password,NOW(),NULL,NULL,'a:1:{i:0;s:9:"ROLE_USER";}',new.nom,new.prenom, "ETUDIANT")
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `suprim_groupe_update`;
DELIMITER $$
CREATE TRIGGER `suprim_groupe_update` AFTER UPDATE ON `etudiant` FOR EACH ROW begin
        DECLARE is_done INTEGER DEFAULT 0;
        DECLARE _groupe_id DECIMAL(18,2);
        DECLARE nb_etu DECIMAL(18,2);      
        declare monCurseur cursor for select id FROM  `groupe` where id not in (   SELECT g.id FROM `etudiant` e, `groupe` g WHERE e.groupe_id=g.id );   
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET is_done = 1; OPEN monCurseur;tarif_loop: LOOP FETCH monCurseur INTO _groupe_id;  IF is_done = 1 THEN
          LEAVE tarif_loop; END IF;delete from `groupe` where id=_groupe_id; END LOOP; CLOSE monCurseur;   
        end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `suprime_groupe_delete`;
DELIMITER $$
CREATE TRIGGER `suprime_groupe_delete` AFTER DELETE ON `etudiant` FOR EACH ROW begin
        DECLARE is_done INTEGER DEFAULT 0;
        DECLARE _groupe_id DECIMAL(18,2);
        DECLARE nb_etu DECIMAL(18,2);      
        declare monCurseur cursor for select id FROM  `groupe` where id not in (   SELECT g.id FROM `etudiant` e, `groupe` g WHERE e.groupe_id=g.id );   
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET is_done = 1; OPEN monCurseur;tarif_loop: LOOP FETCH monCurseur INTO _groupe_id;  IF is_done = 1 THEN
          LEAVE tarif_loop; END IF;delete from `groupe` where id=_groupe_id; END LOOP; CLOSE monCurseur;   
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
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `type`) VALUES
(1, 'samba', 'samba', 'sambadiarra2000@gmail.com', 'sambadiarra2000@gmail.com', 1, NULL, '$2y$13$ZkA1DSMcCC3IJeZLuGLEm.b9TxWCTfT/y.OvM186Yoz5FSjG.oX4K', '2020-01-07 18:44:34', NULL, NULL, 'a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";}', 'samba', 'Samba diarra', ''),
(4, 'ravane', 'ravane', 'ravane@gmail.com', 'ravane@gmail.com', 1, NULL, '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', '2020-01-07 18:19:30', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'ravane', 'ravane', 'ETUDIANT'),
(5, 'saa', 'saa', 'saa@gmail.com', 'saa@gmail.com', 1, NULL, '$2y$13$qqMI7ZqRh8eYbaMPailiXusPcU7WdUpCAswO.Hyth7OP3bg.1RJ4S', '2019-10-20 10:25:33', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'saa', 'saas', 'ETUDIANT'),
(6, 'lala', 'lala', 'lala@gmail.com', 'lala@gmail.com', 1, NULL, '$2y$13$sAZl4JLCQLxKGkQfTEwRFeshA0U5OVUfyf41f99rbQzU2WUIACHba', '2019-10-20 10:28:29', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'bambi', 'lala', 'ETUDIANT'),
(7, 'alpha', 'alpha', 'alpha@gmail.com', 'alpha@gmail.com', 1, NULL, '$2y$13$h4mxnW4z7by23xDyB6jqHevdlrA6AlRJEPQQSR.voWVGBRpBi8Dcm', '2019-10-22 10:46:29', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'alpha', 'radja', 'ETUDIANT'),
(8, 'faa', 'faa', 'faa@gmail.com', 'faa@gmail.com', 1, NULL, '$2y$13$O/iY9cNaWQId4oeK2ujKVes9xh2u.KGYXYywjQDXi6DrvBm7IyXsO', '2019-10-22 11:35:57', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'faafa', 'faa', 'ETUDIANT'),
(9, 'papa', 'papa', 'papa@gmail.com', 'papa@gmail.com', 1, NULL, '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', '2020-01-08 14:43:17', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'papa', 'papa', 'ETUDIANT'),
(11, 'bamba', 'bamba', 'sambadiarra200@gmail.com', 'sambadiarra200@gmail.com', 1, NULL, '$2y$13$ujcgBIMaOeMC21Z8BrrMWO/OZtQqeTlsow1FzmBlv0sI.i/UEWgda', '2019-11-12 20:53:37', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'Diouf', 'Samba diarra', 'ETUDIANT'),
(12, 'faycal', 'faycal', 'faycal@gmail.com', 'faycal@gmail.com', 1, NULL, '$2y$13$GY35sowsOnMvXAP7tmSZn.0YRkb444w4VruVACo1IXmOq6QHtpoZy', '2019-12-17 12:37:03', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'thamri', 'faycal', 'ETUDIANT'),
(13, 'money', 'money', 'samba@gmail.com', 'samba@gmail.com', 1, NULL, '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', '2019-11-27 11:10:41', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'baby', 'money', 'ETUDIANT'),
(14, 'hello', 'hello', 'hello@gmail.com', 'hello@gmail.com', 1, NULL, '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', '2019-12-06 11:30:48', NULL, NULL, 'a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";}', 'ramsey', 'hello', ''),
(15, 'Montero', 'Montero', 'rodri@gmail.com', 'rodri@gmail.com', 1, NULL, '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', '2019-12-10 12:12:05', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'Rodri', 'Montero', 'ETUDIANT'),
(16, 'jalix', 'jalix', 'jalix@gmail.com', 'jalix@gmail.com', 1, NULL, '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', '2020-01-06 13:59:25', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'gentil', 'jalix', 'TUTEUR'),
(17, 'Aude', 'aude', 'Joubert@gmail.com', 'joubert@gmail.com', 1, NULL, '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', '2020-01-08 14:53:19', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'Jouber', 'Aude', 'TUTEUR'),
(20, 'ndiaye', 'ndiaye', 'assane@gmail.com', 'assane@gmail.com', 1, NULL, '$2y$13$G6Z2VB06vEJdvRhYAH2gbuO59VPlejZljKKxOytkXsryTVpFyFgzS', '2020-01-07 18:35:38', NULL, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'assane', 'ndiaye', 'ETUDIANT');

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

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `professeur_id`, `nom`, `sujet`, `statut`) VALUES
(1, 16, 'yodd', 'klnkn', 'non valide'),
(2, 16, 'le plus beau', 'papi', 'non valide');

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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `source_etudiant_id`, `dest_etudiant_id`, `source_groupe_id`, `dest_groupe_id`, `nom_etudiant`, `nom_professeur`, `nom_groupe`, `type`, `statut`, `created_at`, `source_professeur_id`, `dest_professeur_id`) VALUES
(111, NULL, NULL, 1, NULL, NULL, 'hel ', 'yodd', 'Demande_Groupe', NULL, '2019-12-05 09:52:50', NULL, NULL),
(113, NULL, 13, 1, NULL, 'money baby', NULL, 'yodd', 'Demande_Groupe', NULL, '2019-12-05 11:03:10', NULL, NULL),
(116, NULL, 15, 1, NULL, 'Montero Rodri', NULL, 'yodd', 'Demande_Groupe', NULL, '2019-12-17 12:42:10', NULL, NULL),
(121, NULL, 4, 1, NULL, 'ravane diop', NULL, 'yodd', 'Accepter', NULL, '2020-01-04 17:43:02', NULL, NULL),
(127, NULL, NULL, NULL, 1, NULL, 'Aude Jouber', 'yodd', 'Accepter_Tuteur', NULL, '2020-01-06 13:57:35', 16, NULL),
(129, NULL, 16, 1, NULL, 'ndiaye assane', NULL, 'yodd', 'Accepter', NULL, '2020-01-07 18:35:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`nom`, `prenom`) VALUES
('5', 'koo'),
('6', 'kjbjk'),
('HAMZA', 'OK'),
('nk Bvklernvekmln', 'kjftyftyf');

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
(1, 'ravane', 'ravane@gmail.com', 'Douldoul1', 'diop'),
(2, 'khaa', 'kka@diouf.com', 'ok', 'Lou'),
(3, 'hel', 'vjblkjdfbvjkbf', 'f', 'Lechevre'),
(4, 'blabla', 'vjblkjbvjkbf', 'f', 'car'),
(5, 'time', 'vjblkjbvjkbf', 'f', 'money'),
(6, 'bye', 'vjblkfbvjkbf', 'f', 'amor'),
(14, 'hello', 'hello@gmail.com', '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', 'ramsey'),
(15, 'jalix', 'jalix@gmail.com', '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', 'gentil'),
(16, 'Aude', 'Joubert@gmail.com', '$2y$13$Zq3ReLsPvPI06kecMaNtAuCDIQI5FezwPRZH//9YIxZ9w1jLXPCMW', 'Jouber');

--
-- Déclencheurs `professeur`
--
DROP TRIGGER IF EXISTS `ajout_professeur_fosuer`;
DELIMITER $$
CREATE TRIGGER `ajout_professeur_fosuer` AFTER INSERT ON `professeur` FOR EACH ROW INSERT into `fos_user` (`username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `type`) values (new.prenom,new.prenom,new.email,new.email,1,NULL,new.password,NOW(),NULL,NULL,'a:1:{i:0;s:9:"ROLE_USER";}',new.nom,new.prenom, "TUTEUR")
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
  `afaire` longtext COLLATE utf8mb4_unicode_ci,
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
  `desc_tache` longtext COLLATE utf8mb4_unicode_ci,
  `tache_realisee` tinyint(1) NOT NULL,
  `nombre_sous_taches` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creates_at` datetime NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3BF2CD987A45358C` (`groupe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `description`, `creates_at`, `statut`, `groupe_id`) VALUES
(1, 'faire les taches', '2020-01-06 23:34:01', 'Fait', 1),
(2, 'faire un site érgo', '2020-01-07 12:38:19', 'Fait', 1),
(3, 'faire les reunion', '2020-01-07 14:54:24', 'Fait', 1),
(4, 'appele', '2020-01-07 18:42:39', 'Fait', 1),
(5, 'allumer la play', '2020-01-07 18:43:05', 'afaire', 1);

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

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `FK_3BF2CD987A45358C` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
