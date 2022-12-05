-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 déc. 2022 à 10:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `workspace`
--

-- --------------------------------------------------------

--
-- Structure de la table `computers`
--

CREATE TABLE `computers` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `windows_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `form_roles` int(4) DEFAULT NULL,
  `date` date NOT NULL,
  `operations` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `positive_feedback` text NOT NULL,
  `negative_feedback` text NOT NULL,
  `connected_form` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `headphones`
--

CREATE TABLE `headphones` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `brands` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `S/N` int(11) NOT NULL,
  `date_of_purchase` int(11) NOT NULL,
  `warranty` int(3) NOT NULL,
  `end_warranty` date NOT NULL,
  `date_assignment` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `functional` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inventory`
--

CREATE TABLE `inventory` (
  `equipments_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `equipments_category` varchar(20) NOT NULL,
  `connected_inventory` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `badgeuse_role` int(4) DEFAULT NULL,
  `workspace_role` int(4) DEFAULT NULL,
  `form_roles` int(4) DEFAULT NULL,
  `inventory_role` int(4) DEFAULT NULL,
  `coming_soon_role` int(4) DEFAULT NULL,
  `log_modif_role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `workspace_connected` tinyint(1) NOT NULL,
  `log_connections` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `workspace_connected`, `log_connections`) VALUES
(1, 'Sindatry', 'Julien', 'j.sindatry@contactmedia.fr', '613fffe486ba273335b9b42d3deace80f555d0e3214a643bf369696637e869db', 0, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computers_email_id_IDX` (`email_id`,`windows_key`) USING BTREE;

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `x` (`email_id`);

--
-- Index pour la table `headphones`
--
ALTER TABLE `headphones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`email_id`);

--
-- Index pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`equipments_id`),
  ADD KEY `f` (`category_id`),
  ADD KEY `inventory_email_id_IDX` (`email_id`) USING BTREE;

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_id` (`email_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `computers`
--
ALTER TABLE `computers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `headphones`
--
ALTER TABLE `headphones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `computers`
--
ALTER TABLE `computers`
  ADD CONSTRAINT `user` FOREIGN KEY (`email_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `x` FOREIGN KEY (`email_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `headphones`
--
ALTER TABLE `headphones`
  ADD CONSTRAINT `users` FOREIGN KEY (`email_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `b` FOREIGN KEY (`email_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `e` FOREIGN KEY (`category_id`) REFERENCES `headphones` (`id`),
  ADD CONSTRAINT `f` FOREIGN KEY (`category_id`) REFERENCES `computers` (`id`);

--
-- Contraintes pour la table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `a` FOREIGN KEY (`email_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
