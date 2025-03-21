-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 mars 2025 à 15:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `animals`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `categorie` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `rent` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `fullname`, `mobile`, `email`, `country`, `state`, `city`, `type`, `categorie`, `description`, `image`, `user_id`, `rent`) VALUES
(31, 'gagaga', '1414141', 'fafafa@aa.aa', 'tunis', 'tt', 'tt', 'bb', 'Dog', 'tqtq', '..\\assets\\img\\dog1.jpeg', 20, '14141'),
(32, 'zzz', '12345678', 'am@gmail.com', 'mourouj6', 'ohohoho', 'benarous2', 'rrr', 'Dog', 'rrrrrrr', '..\\assets\\img\\dog2.jpeg', 21, '1547'),
(33, 'ddd', '22554804', 'admin@gmail.com', 'amamamama', 'zzz', 'cc', 'rrr', 'Cat', 'rrrrrrr', '..\\assets\\img\\cat2.jpeg', 21, '1547'),
(34, 'amal', '50278188', 'amal@gmail.com', 'mourouj1', 'benarous', 'haytadhamen', 'katous torki', 'Cat', 'blablabla', '..\\assets\\img\\cat1.jpeg', 23, '258'),
(35, 'mmm', '50278188', 'am@gmail.com', 'mourouj6444', 'bbcc', 'benarous2444', 'rrr', 'Dog', 'rrrrrrr', '..\\assets\\img\\dog.jpeg', 35, '1547'),
(36, 'zouzou', '22554804', 'amalbenrabah40@gmail.com', 'mourouj6', 'ben arous', 'tunis', 'katous torki', 'Cat', 'kaotus akel w weld nes w motrobi w saat ykhabech ', '..\\assets\\img\\cat.jpeg', 36, '1245'),
(46, 'ella', '26252112', 'amalbenrabah04@gmail.com', 'Tunisie', 'Gouvernorat De Ben Arous', 'mourouj 1', 'tt', 'Cat', 'rrrrrrr', 'pdppp.png', 38, '258');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(12) NOT NULL,
  `serviceid` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paymentmethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `donation`
--

INSERT INTO `donation` (`id`, `user_id`, `amount`, `donation_date`, `paymentmethod`) VALUES
(0, 20, 5885860, '2024-05-14 16:51:13', 'paypal'),
(0, 21, 787852, '2024-05-14 21:39:23', 'bank_transfer'),
(0, 21, 1, '2024-05-15 08:50:10', 'paypal'),
(0, 35, 12, '2024-05-21 16:28:21', 'bank_transfer'),
(0, 36, 125, '2024-05-22 08:32:57', 'bank_transfer'),
(0, 37, 4545, '2024-05-22 10:16:04', 'paypal');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `datefeedback` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback`, `datefeedback`) VALUES
(0, 35, 'kjdkzjhljl', '2024-05-21 17:28:56'),
(0, 37, 'thank you', '2024-05-22 11:17:10'),
(0, 37, 'tttt', '2024-05-22 11:17:17');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(12) NOT NULL,
  `name` varchar(188) NOT NULL,
  `description` varchar(188) NOT NULL,
  `categorie` varchar(188) NOT NULL,
  `target_species` varchar(188) NOT NULL,
  `price` int(188) NOT NULL,
  `availability` varchar(188) NOT NULL,
  `remarks` varchar(188) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `categorie`, `target_species`, `price`, `availability`, `remarks`, `image`) VALUES
(1, 'toy', 'hh', 'Equipement', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogproduct\\z1.png'),
(3, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z2.png'),
(4, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z3.png'),
(5, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z4.png'),
(6, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b1.png'),
(7, 'toy', 'hh', 'Equipement', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogproduct\\z5.png'),
(8, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z6.png'),
(9, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z7.png'),
(10, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z8.png'),
(11, 'toy', 'hh', 'Equipement', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogproduct\\z9.png'),
(12, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z10.png'),
(13, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z11.png'),
(14, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z12.png'),
(15, 'toy', 'hh', 'Equipement', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogproduct\\z13.png'),
(16, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z14.png'),
(17, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z15.png'),
(18, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z16.png'),
(19, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z17.png'),
(20, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z18.png'),
(21, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z19.png'),
(22, 'toy', 'hh', 'Equipement', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogproduct\\z20.png'),
(23, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z21.png'),
(24, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z22.png'),
(25, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z23.png'),
(26, 'toy', 'hh', 'Equipement', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogproduct\\z24.png'),
(27, 'aa', 'aa', 'Equipement', 'Dog', 1314141, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z25.png'),
(28, 'aa', 'aa', 'Equipement', 'Dog', 1414, 'tt', 'tt', '..\\assets\\img\\dogproduct\\z26.png'),
(29, 'ttata', 'tata', 'Equipement', 'Dog', 25252, 'aa', 'aa', '..\\assets\\img\\dogproduct\\z27.png'),
(30, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a1.png'),
(31, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a2.png'),
(32, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a3.png'),
(33, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a4.png'),
(34, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a5.png'),
(35, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a6.png'),
(36, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a7.png'),
(37, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a8.png'),
(38, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a9.png'),
(39, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a10.png'),
(40, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a11.png'),
(41, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a12.png'),
(42, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a13.png'),
(43, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a14.png'),
(44, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a15.png'),
(45, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a16.png'),
(46, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a17.png'),
(47, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a18.png'),
(48, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a19.png'),
(49, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a20.png'),
(50, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a21.png'),
(51, 'mekla', 'hh', 'Food', 'Dog', 1313, 'yes', 'tt', '..\\assets\\img\\dogfood\\a22.png'),
(52, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f1.png'),
(53, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f2.png'),
(54, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f3.png'),
(55, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f4.png'),
(56, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f5.png'),
(57, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f6.png'),
(58, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f7.png'),
(59, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f8.png'),
(60, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f9.png'),
(61, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f10.png'),
(62, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f11.png'),
(63, 'mekla', 'hh', 'Food', 'Cat', 1313, 'yes', 'tt', '..\\assets\\img\\catfoo\\f12.png'),
(64, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b2.png'),
(65, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b3.png'),
(66, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b4.png'),
(67, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b5.png'),
(68, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b6.png'),
(69, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b7.png'),
(70, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b8.png'),
(71, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b9.png'),
(72, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b10.png'),
(73, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b11.png'),
(74, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b12.png'),
(75, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b13.png'),
(76, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b14.png'),
(77, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b15.png'),
(78, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b16.png'),
(79, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b17.png'),
(80, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b18.png'),
(81, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b19.png'),
(82, 'cat lol', 'cat', 'Equipement', 'Cat', 525252, 'yes', 'trash', '..\\assets\\img\\catequi\\b20.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(100) DEFAULT 'user',
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `mobile`, `username`, `email`, `password`, `created_at`, `updated_at`, `role`, `status`) VALUES
(38, 'admin', '26252112', 'admin', 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', '2025-03-02 14:15:37', '2025-03-02 14:15:37', 'user', 1),
(24, 'amen', '88888888', 'amen', 'am@gmail.com', '4124bc0a9335c27f086f24ba207a4912', '2024-05-15 09:30:12', '2024-05-15 09:30:12', 'user', 1),
(35, 'ayhemmm', '98798546', 'ayhem', 'ay@g.c', 'c20ad4d76fe97759aa27a0c99bff6710', '2024-05-21 16:26:17', '2024-05-21 16:26:17', 'user', 1),
(36, 'amal', '22554804', 'amal', 'amalbenrabah44@gmail.com', 'd62d41cf17704ddd6cb22c9688130f73', '2024-05-22 08:08:34', '2024-05-22 08:08:34', 'user', 1),
(37, 'amennn', '23232356', 'amennn', 'amennn@gmail.com', '73cb617a2493e5e1352ebb0d9d78c3eb', '2024-05-22 10:11:53', '2024-05-22 10:11:53', 'user', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vaccin`
--

CREATE TABLE `vaccin` (
  `id` int(188) NOT NULL,
  `nom` varchar(188) NOT NULL,
  `animalCategorie` varchar(188) NOT NULL,
  `date` date NOT NULL,
  `dosage` int(188) NOT NULL,
  `Location` varchar(188) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vaccin`
--

INSERT INTO `vaccin` (`id`, `nom`, `animalCategorie`, `date`, `dosage`, `Location`) VALUES
(3, 'phizer', 'Cat', '2024-05-15', 452, 'tunis'),
(4, 'phizer', 'Cat', '2024-05-31', 34, 'tunis');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Index pour la table `vaccin`
--
ALTER TABLE `vaccin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `vaccin`
--
ALTER TABLE `vaccin`
  MODIFY `id` int(188) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
