-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 déc. 2022 à 18:02
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
  `type` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `operations` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `positive_feedback` text NOT NULL,
  `negative_feedback` text NOT NULL,
  `connected_form` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`type`, `id`, `email_id`, `lastname`, `firstname`, `email`, `password`, `date`, `operations`, `timestamp`, `positive_feedback`, `negative_feedback`, `connected_form`) VALUES
('', 63, 68, '', '', 'aodren.floride@gmail.com', '24e143d708a9bd6e13b432e5ca2b16a4493848f3fdacd6bdc9602f8c56e4056e', '0000-00-00', '', '', '', '', 0),
('', 76, 81, '', '', 'user.test@gmail.com', '4f6515744fbe37e961bbba67050065e8180f959d63f2a9c59431fe3f5246241a', '0000-00-00', '', '', '', '', 0),
('user', 86, 86, '', '', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '0000-00-00', '', '', '', '', 0),
('form', 89, 68, 'floride', 'aodren.floride@gmail.com', 'aodren', '', '0000-00-00', '', 't', 't', 't', 0),
('form', 90, 68, 'floride', 'aodren.floride@gmail.com', 'aodren', '', '0000-00-00', '', 'z', 'z', 'z', 0),
('form', 91, 68, 'floride', 'aodren.floride@gmail.com', 'aodren', '', '0000-00-00', '', 'r', 'r', 'r', 0),
('form', 92, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '0000-00-00', 'z', 'z', 'z', 'z', 0),
('form', 93, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '0000-00-00', 'z', 'z', 'z', 'z', 0),
('form', 94, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '0000-00-00', 'z', 'z', 'z', 'z', 0),
('form', 95, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '0000-00-00', 'a', 'a', 'a', 'a', 0),
('form', 96, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '0000-00-00', 'aaaa', 'aaaa', 'aaaa', 'aaaa', 0);

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
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `equipments_category` varchar(20) NOT NULL,
  `connected_inventory` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inventory`
--

INSERT INTO `inventory` (`equipments_id`, `email_id`, `email`, `password`, `category_id`, `equipments_category`, `connected_inventory`) VALUES
(62, 68, 'aodren.floride@gmail.com', '24e143d708a9bd6e13b432e5ca2b16a4493848f3fdacd6bdc9602f8c56e4056e', 0, '', 0),
(75, 81, 'user.test@gmail.com', '4f6515744fbe37e961bbba67050065e8180f959d63f2a9c59431fe3f5246241a', 0, '', 0),
(80, 86, 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `badgeuse_role` int(4) DEFAULT NULL,
  `workspace_role` int(4) DEFAULT NULL,
  `form_role` int(4) DEFAULT NULL,
  `inventory_role` int(4) DEFAULT NULL,
  `coming_soon_role` int(4) DEFAULT NULL,
  `log_modif_role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `email_id`, `badgeuse_role`, `workspace_role`, `form_role`, `inventory_role`, `coming_soon_role`, `log_modif_role`) VALUES
(68, 68, 3, 1, 1000, 1, NULL, ''),
(81, 81, 1, 1, 1, 1, NULL, ''),
(86, 86, 1000, 1000, 1000, 1000, NULL, '');

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
(68, 'floride', 'aodren', 'aodren.floride@gmail.com', '24e143d708a9bd6e13b432e5ca2b16a4493848f3fdacd6bdc9602f8c56e4056e', 0, ''),
(81, 'User', 'Test', 'user.test@gmail.com', '4f6515744fbe37e961bbba67050065e8180f959d63f2a9c59431fe3f5246241a', 0, ''),
(86, 'Admin', 'Admin', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', 0, '');

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
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `headphones`
--
ALTER TABLE `headphones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `equipments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
