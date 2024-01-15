-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 17 déc. 2023 à 14:55
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` enum('luxe','moyen','abordable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('occupé','disponible') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreToilette` int NOT NULL,
  `nombreBalcon` int NOT NULL DEFAULT '0',
  `dimension` int NOT NULL,
  `nombreChambre` int NOT NULL,
  `espaceVert` enum('oui','non') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `categorie`, `description`, `image`, `localisation`, `statut`, `nombreToilette`, `nombreBalcon`, `dimension`, `nombreChambre`, `espaceVert`, `is_deleted`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'magidba', 'moyen', 'mqsfmlqs,lqsdv', '202311260220istockphoto-1436217023-1024x1024.jpg', 'uihdfshiu', 'disponible', 12, 12, 19, 2, 'oui', 0, 7, '2023-11-26 02:20:12', '2023-11-26 02:26:24'),
(7, 'magid', 'moyen', 'kknjnjbjb', '202311260514istockphoto-1425142611-1024x1024.jpg', 'uihdfshiu', 'occupé', 2, 4, 22, 1, 'oui', 0, 6, '2023-11-26 05:14:05', '2023-11-26 05:14:05'),
(8, 'Villa de luxe', 'luxe', 'mamhfshqsfhzehfudvb:jkdbid<g:hdbv::jkbv   fidjgmerhgj\r\ni ezpt_yehu_ghsduivldj', '202311261431istockphoto-1436217023-1024x1024.jpg', 'Dakar', 'disponible', 1, 2, 233, 1, 'oui', 0, 3, '2023-11-26 14:29:14', '2023-11-26 14:31:53'),
(9, 'magidba', 'moyen', 'qiofhsdvnwxkvhsduiv', '202311261443istockphoto-1436217023-1024x1024.jpg', 'Dakar', 'disponible', 2, 11, 211, 2, 'non', 0, 3, '2023-11-26 14:43:13', '2023-11-26 14:43:13');

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

DROP TABLE IF EXISTS `chambres`;
CREATE TABLE IF NOT EXISTS `chambres` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `dimension` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeChambre` enum('simple','avecSalleDeBain') COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chambres_article_id_foreign` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`id`, `dimension`, `image`, `typeChambre`, `article_id`, `created_at`, `updated_at`) VALUES
(12, 111, '202311260226istockphoto-1431220312-1024x1024.jpg', 'simple', 6, '2023-11-26 02:26:48', '2023-11-26 04:17:34'),
(13, 10, '202311260226istockphoto-1436217023-1024x1024.jpg', 'avecSalleDeBain', 6, '2023-11-26 02:26:48', '2023-11-26 04:25:44'),
(14, 12, '202311260514istockphoto-1431220312-1024x1024.jpg', 'avecSalleDeBain', 7, '2023-11-26 05:14:18', '2023-11-26 05:14:18'),
(15, 33, '202311261441istockphoto-1425142611-1024x1024.jpg', 'avecSalleDeBain', 8, '2023-11-26 14:41:41', '2023-11-26 14:41:41'),
(16, 21, '202311261443istockphoto-1436217023-1024x1024.jpg', 'simple', 9, '2023-11-26 14:43:42', '2023-11-26 14:43:42');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `article_id` bigint UNSIGNED NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaires_user_id_foreign` (`user_id`),
  KEY `commentaires_article_id_foreign` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `user_id`, `article_id`, `contenu`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 10, 8, 'commentaire pour le test', 0, '2023-11-27 09:58:17', '2023-11-27 09:58:17'),
(3, 11, 6, 'zemohfzvk,vq', 0, '2023-11-27 19:45:40', '2023-11-27 19:45:40');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_11_23_151431_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_17_124009_create_articles_table', 1),
(7, '2023_11_17_124015_create_commentaires_table', 1),
(8, '2023_11_23_151737_create_notifications_table', 1),
(9, '2023_11_23_155310_create_chambres_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'user', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(2, 'admin', '2023-11-25 23:06:53', '2023-11-25 23:06:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Howell Kshlerin PhD', 'steve.carter@example.org', '2023-11-25 23:06:53', '$2y$10$6y701fdHLC0eR2oupYfEY.PUc7FvKovn9M1SCcgnYvXMhOugGOq62', 2, 'CuK8l72Q4A', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(2, 'Leopoldo Schuppe', 'mzboncak@example.com', '2023-11-25 23:06:53', '$2y$10$cdmXqVuvxi5MGYpshmWyvO3ct53uaapkmaeMkOXBOjPJGpurh/4EO', 1, 'BOXQUxKNfe', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(3, 'Queen Jerde Jr.', 'aron.cronin@example.com', '2023-11-25 23:06:53', '$2y$10$z42hRgSLcgQzAA/JFYWOVOEBjLifnOLAd97lFfwoWqrDt7smlEr/O', 2, 'nc7fi2L384', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(4, 'Jaqueline White', 'gleichner.marcus@example.com', '2023-11-25 23:06:53', '$2y$10$hSLqXoyIaAs0qG.cMwnibOKErLkUxPLfrC2sPX.NHycSP/cpO3fb2', 1, 'c6WiHmUa4u', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(5, 'Dr. Tanner Orn MD', 'hill.giovani@example.net', '2023-11-25 23:06:53', '$2y$10$M/xqiQeIECkMelhgIP13V.BcqugU.AktIp1GpDzFx7595An4xSX0u', 1, 'nWYSE3LUbY', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(6, 'Rosemarie Bauch', 'vallie00@example.net', '2023-11-25 23:06:53', '$2y$10$xhdBSK2P0KyxA9MmSTaxKey9UFsq8kcJXr58wwY5Qahs/L6swX41m', 2, 'g5qsH8PcuQ', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(7, 'Emery Nolan', 'ebert.cristian@example.com', '2023-11-25 23:06:53', '$2y$10$b3g5OePk2WqIcikaQraMVug/XSx1Z7huIPz21L0MfGq4DAHrV0jiW', 2, '25r4Mc9Wn22o1V4lRuY6y51LCDEbbLTW07lk5qpzvoiWPNiXtMlkq8073bbB', '2023-11-25 23:06:53', '2023-11-25 23:06:53'),
(9, 'Magid', 'imaletbenji58@gmail.com', NULL, '$2y$10$4KH0YhlEFyP9WTGxurL6WOIC4U7jaUWcdMB5GOh.nNWYN0D8u5FCS', 1, NULL, '2023-11-27 09:42:03', '2023-11-27 09:42:03'),
(10, 'lady rokhaya', 'ladyrokhaya@gmail.com', NULL, '$2y$10$Iz.v4Ntt3Ik8U1I4Yz/TtOlU9vxkXlP6FYw8zrGrXqSPZ4PsdXcrS', 1, NULL, '2023-11-27 09:49:40', '2023-11-27 09:49:40'),
(11, 'souleymane barry', 'bsouleymane607@gmail.com', NULL, '$2y$10$rl8BAQSuIf1IebewzFSEieHWZ/rjsOSImsT6JCUI1CMQF4PdYH/vC', 1, NULL, '2023-11-27 19:43:50', '2023-11-27 19:43:50');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
