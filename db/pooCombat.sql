-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 jan. 2026 à 14:27
-- Version du serveur : 9.1.0
-- Version de PHP : 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `combat_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

DROP TABLE IF EXISTS `boss`;
CREATE TABLE IF NOT EXISTS `boss` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `className` varchar(190) NOT NULL,
  `donjon_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `boss_donjon_id_foreign` (`donjon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `boss`
--

INSERT INTO `boss` (`id`, `className`, `donjon_id`) VALUES
(1, 'GoblinBoss', 1),
(2, 'SqueletteBoss', 2),
(3, 'ZombieBoss', 3),
(4, 'DragonBoss', 4);

-- --------------------------------------------------------

--
-- Structure de la table `donjon`
--

DROP TABLE IF EXISTS `donjon`;
CREATE TABLE IF NOT EXISTS `donjon` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `className` varchar(190) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `donjon`
--

INSERT INTO `donjon` (`id`, `className`) VALUES
(1, 'DonjonGoblin'),
(2, 'DonjonSquelette'),
(3, 'DonjonZombie'),
(4, 'DonjonDragon');

-- --------------------------------------------------------

--
-- Structure de la table `donjon_monstre`
--

DROP TABLE IF EXISTS `donjon_monstre`;
CREATE TABLE IF NOT EXISTS `donjon_monstre` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `donjon_id` bigint NOT NULL,
  `monstre_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `donjon_monstre_donjon_id_foreign` (`donjon_id`),
  KEY `donjon_monstre_monstre_id_foreign` (`monstre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `donjon_monstre`
--

INSERT INTO `donjon_monstre` (`id`, `donjon_id`, `monstre_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12);

-- --------------------------------------------------------

--
-- Structure de la table `hero`
--

DROP TABLE IF EXISTS `hero`;
CREATE TABLE IF NOT EXISTS `hero` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(190) NOT NULL,
  `hp` int NOT NULL,
  `attaque` int NOT NULL,
  `img` varchar(190) NOT NULL,
  `max_hp` bigint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hero_nom_unique` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `hero`
--

INSERT INTO `hero` (`id`, `nom`, `hp`, `attaque`, `img`, `max_hp`) VALUES
(12, 'dscsdvsdv', 180, 200, 'assets/imgs/perso2.gif', 180),
(11, 'meikaa', 0, 210, 'assets/imgs/perso2.gif', 170);

-- --------------------------------------------------------

--
-- Structure de la table `hero_donjon`
--

DROP TABLE IF EXISTS `hero_donjon`;
CREATE TABLE IF NOT EXISTS `hero_donjon` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hero_id` bigint NOT NULL,
  `donjon_id` bigint NOT NULL,
  `finished_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hero_donjon_donjon_id_foreign` (`donjon_id`),
  KEY `hero_donjon_hero_id_foreign` (`hero_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `className` varchar(190) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `monstre`
--

INSERT INTO `monstre` (`id`, `className`) VALUES
(1, 'GoblinCombattant'),
(2, 'GoblinArcher'),
(3, 'GoblinMage'),
(4, 'SqueletteWarrior'),
(5, 'SqueletteArcher'),
(6, 'SqueletteNecromancer'),
(7, 'ZombieWalker'),
(8, 'ZombieBrute'),
(9, 'ZombieShaman'),
(10, 'DragonWhelp'),
(11, 'DragonDrake'),
(12, 'DragonElder');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
