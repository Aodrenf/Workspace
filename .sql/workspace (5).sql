-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 jan. 2023 à 13:56
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
('user', 106, 91, '', '', 'user.user@gmail.com', '4f6515744fbe37e961bbba67050065e8180f959d63f2a9c59431fe3f5246241a', '0000-00-00', '', '', '', '', 0),
('form', 110, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '2022-12-20', 'test20', '20', 'oui', 'non', 0),
('form', 111, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '2022-12-21', 'sasas', 'asas', 'sasasa', 'sasas', 0),
('form', 112, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '2022-12-21', 'sasas', 'asas', 'sasasa', 'sasas', 0),
('form', 113, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '2022-12-21', 'szszsz', 'szszs', 'zszszs', 'szszs', 0),
('form', 114, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '2022-12-21', 'qa', 'qa', '', '', 0),
('form', 115, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '2022-12-21', 'ttttttttttt', 'ttttt', 'ttttttttttttttttttttttt', 'ttttttttttttttttttttt', 0),
('user', 127, 106, '', '', 'zaodren.f@contactmedia.fr', 'b02fe459667cbdf343c9cb107d9f6adf67b0027dcc9c9e1fa41d2e48bd8cc661', '0000-00-00', '', '', '', '', 0),
('user', 135, 114, '', '', 'aodren.f@contactmedssssssssssssssia.fr', 'f3da00dc4080014ed296d8cfa6e8251636b243085750de0a39c02eac3f00374b', '0000-00-00', '', '', '', '', 0),
('user', 136, 115, '', '', 'admin.test@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '0000-00-00', '', '', '', '', 0),
('form', 137, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '2023-01-02', 'zd', 'zd', 'zd', 'zd', 0),
('form', 138, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '2023-01-02', 'zd', 'zd', 'zd', 'zd', 0),
('form', 139, 86, 'Admin', 'admin.admin@gmail.com', 'admin.admin@gmail.com', '', '2023-01-02', 'Abeille', '02/01/2023', 'oui', 'test', 0);

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
(80, 86, 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', 0, '', 0),
(85, 91, 'user.user@gmail.com', '4f6515744fbe37e961bbba67050065e8180f959d63f2a9c59431fe3f5246241a', 0, '', 0),
(100, 106, 'zaodren.f@contactmedia.fr', 'b02fe459667cbdf343c9cb107d9f6adf67b0027dcc9c9e1fa41d2e48bd8cc661', 0, '', 0),
(110, 114, 'aodren.f@contactmedssssssssssssssia.fr', 'f3da00dc4080014ed296d8cfa6e8251636b243085750de0a39c02eac3f00374b', 0, '', 0),
(111, 115, 'admin.test@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `log`
--

INSERT INTO `log` (`id`, `log`) VALUES
(75, 'Type: user_connected\nId: 86\nNom: Admin\nPrenom:Admin\nDate: Monday 26th of December 2022 09:26:01 AM'),
(76, 'Type: user_connected\nId: 86\nNom: Admin\nPrenom:Admin\nDate: Monday 26th of December 2022 09:26:07 AM'),
(77, 'Type: user_connected\nId: 86\nNom: Admin\nPrenom:Admin\nDate: Monday 26th of December 2022 09:26:28 AM'),
(78, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 10:08:11 AM'),
(79, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 10:25:45 AM'),
(80, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 10:29:35 AM'),
(81, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 10:46:05 AM'),
(82, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 10:48:58 AM'),
(83, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 11:12:26 AM'),
(84, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 11:12:30 AM'),
(85, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 11:13:04 AM'),
(86, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 11:59:59 AM'),
(87, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 26th of December 2022 12:00:17 PM'),
(88, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 12:00:25 PM'),
(89, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 26th of December 2022 12:00:50 PM'),
(90, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 12:01:06 PM'),
(91, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 01:38:25 PM'),
(92, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 02:23:15 PM'),
(93, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 03:55:28 PM'),
(94, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 04:31:52 PM'),
(95, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 26th of December 2022 04:46:19 PM'),
(96, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 27th of December 2022 09:11:16 AM'),
(97, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 27th of December 2022 04:04:23 PM'),
(98, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 27th of December 2022 04:04:35 PM'),
(99, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 27th of December 2022 04:16:08 PM'),
(100, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 09:02:46 AM'),
(101, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 09:23:15 AM'),
(102, 'Type: user_connected\r\nId: 115\r\nNom: Chat\r\nPrenom:Test\r\nDate: Wednesday 28th of December 2022 09:58:45 AM'),
(103, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 10:00:14 AM'),
(104, 'Type: user_connected\r\nId: 115\r\nNom: Chat\r\nPrenom:Test\r\nDate: Wednesday 28th of December 2022 10:06:30 AM'),
(105, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 10:23:04 AM'),
(106, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 10:37:25 AM'),
(107, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 11:43:36 AM'),
(108, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 11:45:01 AM'),
(109, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Wednesday 28th of December 2022 11:45:32 AM'),
(110, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 11:45:39 AM'),
(111, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 11:53:23 AM'),
(112, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 01:10:30 PM'),
(113, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 01:29:47 PM'),
(114, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 02:22:04 PM'),
(115, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 02:27:55 PM'),
(116, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 02:46:31 PM'),
(117, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 02:47:09 PM'),
(118, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 03:08:04 PM'),
(119, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 03:18:19 PM'),
(120, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 03:30:44 PM'),
(121, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 03:56:06 PM'),
(122, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:09:37 PM'),
(123, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:16:22 PM'),
(124, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:31:24 PM'),
(125, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:34:17 PM'),
(126, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:34:22 PM'),
(127, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Wednesday 28th of December 2022 04:35:18 PM'),
(128, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:36:12 PM'),
(129, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Wednesday 28th of December 2022 04:57:15 PM'),
(130, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 08:53:45 AM'),
(131, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 11:20:49 AM'),
(132, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Thursday 29th of December 2022 11:24:36 AM'),
(133, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Thursday 29th of December 2022 11:29:30 AM'),
(134, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 11:29:36 AM'),
(135, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 11:45:55 AM'),
(136, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 01:04:02 PM'),
(137, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 01:23:48 PM'),
(138, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Thursday 29th of December 2022 01:24:35 PM'),
(139, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Thursday 29th of December 2022 01:24:56 PM'),
(140, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 01:26:43 PM'),
(141, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 04:34:49 PM'),
(142, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Thursday 29th of December 2022 04:50:47 PM'),
(143, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 08:30:50 AM'),
(144, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 08:46:19 AM'),
(145, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 09:11:08 AM'),
(146, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 2nd of January 2023 09:22:12 AM'),
(147, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 2nd of January 2023 09:49:16 AM'),
(148, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 09:56:05 AM'),
(149, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 10:25:08 AM'),
(150, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 2nd of January 2023 10:38:22 AM'),
(151, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 10:42:19 AM'),
(152, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 10:49:35 AM'),
(153, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 11:03:42 AM'),
(154, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 11:15:30 AM'),
(155, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 11:43:40 AM'),
(156, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 12:13:25 PM'),
(157, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 12:29:12 PM'),
(158, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 01:32:41 PM'),
(159, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 02:30:56 PM'),
(160, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 03:14:39 PM'),
(161, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 2nd of January 2023 03:15:48 PM'),
(162, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 2nd of January 2023 03:23:56 PM'),
(163, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 03:24:01 PM'),
(164, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Monday 2nd of January 2023 03:24:25 PM'),
(165, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 03:26:46 PM'),
(166, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Monday 2nd of January 2023 04:37:55 PM'),
(167, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 3rd of January 2023 09:03:54 AM'),
(168, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Tuesday 3rd of January 2023 09:39:43 AM'),
(169, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 3rd of January 2023 09:40:13 AM'),
(170, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 3rd of January 2023 09:57:02 AM'),
(171, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 3rd of January 2023 10:01:00 AM'),
(172, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Tuesday 3rd of January 2023 10:27:11 AM'),
(173, 'Type: user_connected\r\nId: 91\r\nNom: user\r\nPrenom:user\r\nDate: Tuesday 3rd of January 2023 10:29:22 AM'),
(174, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 3rd of January 2023 10:29:27 AM'),
(175, 'Type: user_connected\r\nId: 86\r\nNom: Admin\r\nPrenom:Admin\r\nDate: Tuesday 3rd of January 2023 10:58:15 AM');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `email_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `ticket_id`, `content`, `date`, `email_id`) VALUES
(1, 0, '97', '2022-12-27', 86),
(2, 97, 'ssss', '2022-12-27', 86),
(3, 97, 'szqsq', '2022-12-27', 86),
(4, 97, 'sqsq', '2022-12-27', 86),
(5, 97, 'sq', '2022-12-27', 86),
(6, 97, 'cdcdc', '2022-12-27', 86),
(7, 97, 'je suis l\'admin test', '2022-12-28', 115),
(8, 97, 'je test des message pour l\'admin', '2022-12-28', 115),
(9, 97, '1', '2022-12-28', 86),
(10, 100, 'a', '2022-12-28', 86),
(11, 102, 'd\'accord je vais leur dire de se bouger', '2022-12-28', 86),
(12, 97, 'ss', '2022-12-28', 86),
(13, 97, 'sss', '2022-12-28', 86),
(14, 97, 'ss', '2022-12-28', 86),
(15, 97, 's', '2022-12-28', 86),
(16, 97, 's', '2022-12-28', 86),
(17, 97, 'zz', '2022-12-28', 86),
(18, 97, 'zz', '2022-12-28', 86),
(19, 97, 'z', '2022-12-28', 86),
(20, 102, 'merci beaucoup', '2022-12-28', 91),
(21, 105, 'coucou\r\n', '2022-12-29', 86),
(22, 105, '', '2022-12-29', 86),
(23, 105, 'salut', '2023-01-02', 86),
(24, 105, 'test', '2023-01-02', 86),
(25, 105, 'test', '2023-01-02', 86),
(26, 105, 'sdzs', '2023-01-02', 86),
(27, 105, 'aaa', '2023-01-02', 86),
(28, 105, 'z', '2023-01-02', 86),
(29, 105, 'a', '2023-01-02', 86),
(30, 105, 'test', '2023-01-02', 91),
(31, 105, 'szs', '2023-01-02', 91),
(32, 105, 'sas', '2023-01-02', 91),
(33, 105, 'oui', '2023-01-02', 91),
(34, 105, 'sz', 'Monday 2nd of January 2023 09:33:32 AM', 91),
(35, 105, 'non', 'Monday 2nd of January 2023 09:36:20 AM', 91),
(36, 109, 'zzz', 'Monday 2nd of January 2023 09:50:31 AM', 91),
(37, 110, 'Z', 'Monday 2nd of January 2023 09:55:44 AM', 91),
(38, 110, 'd\'accord', 'Monday 2nd of January 2023 09:56:35 AM', 86),
(39, 109, 'zszsz', 'Monday 2nd of January 2023 10:25:48 AM', 86),
(40, 110, 'oui', 'Monday 2nd of January 2023 10:39:16 AM', 91),
(41, 105, '', 'Monday 2nd of January 2023 10:40:49 AM', 91),
(42, 105, '', 'Monday 2nd of January 2023 10:40:51 AM', 91),
(43, 105, '', 'Monday 2nd of January 2023 10:40:52 AM', 91),
(44, 111, 'xsx', 'Monday 2nd of January 2023 10:45:31 AM', 86),
(45, 111, 'zszs', 'Monday 2nd of January 2023 10:45:55 AM', 86),
(46, 102, 'merci\r\n', 'Monday 2nd of January 2023 10:46:59 AM', 86),
(47, 111, 'ssss', 'Monday 2nd of January 2023 11:43:46 AM', 86),
(48, 111, 'sss', 'Monday 2nd of January 2023 11:43:52 AM', 86),
(49, 111, 'sss', 'Monday 2nd of January 2023 11:44:16 AM', 86),
(50, 111, 'qqq', 'Monday 2nd of January 2023 11:44:52 AM', 86),
(51, 111, 'qqqqqq', 'Monday 2nd of January 2023 11:44:58 AM', 86),
(52, 111, 'a', 'Monday 2nd of January 2023 11:46:27 AM', 86),
(53, 111, 'a', 'Monday 2nd of January 2023 11:46:32 AM', 86),
(54, 111, 'z', 'Monday 2nd of January 2023 11:47:08 AM', 86),
(55, 111, 'a', 'Monday 2nd of January 2023 11:47:11 AM', 86),
(56, 111, 'a', 'Monday 2nd of January 2023 11:48:55 AM', 86),
(57, 111, 'aaaaaaaaaaaaaaa', 'Monday 2nd of January 2023 11:49:05 AM', 86),
(58, 111, 'aaaaaa', 'Monday 2nd of January 2023 11:50:27 AM', 86),
(59, 111, 'aaaaaaaa', 'Monday 2nd of January 2023 11:50:33 AM', 86),
(60, 111, 'aaaa', 'Monday 2nd of January 2023 11:51:11 AM', 86),
(61, 111, 'qqqqqqqqq', 'Monday 2nd of January 2023 11:51:17 AM', 86),
(62, 110, 'xxxx', 'Monday 2nd of January 2023 11:52:46 AM', 86),
(63, 110, 'xxx', 'Monday 2nd of January 2023 11:52:53 AM', 86),
(64, 110, 'ssssssss', 'Monday 2nd of January 2023 11:55:00 AM', 86),
(65, 110, 'ssssssssss', 'Monday 2nd of January 2023 11:55:04 AM', 86),
(66, 111, 'z', 'Monday 2nd of January 2023 03:14:51 PM', 86),
(67, 110, 'zzzzzzzzzzzzzzzzzzzzz', 'Monday 2nd of January 2023 03:15:01 PM', 86),
(68, 110, 'kkkkkkkkk', 'Monday 2nd of January 2023 03:15:55 PM', 91),
(69, 109, 'kkkkkkkkkkkk', 'Monday 2nd of January 2023 03:16:01 PM', 91),
(70, 113, 'oui je vois', 'Monday 2nd of January 2023 03:26:57 PM', 86),
(71, 112, 'a', 'Tuesday 3rd of January 2023 09:08:33 AM', 86),
(72, 112, 'a', 'Tuesday 3rd of January 2023 09:08:57 AM', 86),
(73, 109, 'z', 'Tuesday 3rd of January 2023 09:14:15 AM', 86),
(74, 105, 'z', 'Tuesday 3rd of January 2023 09:14:26 AM', 86),
(75, 104, 'z', 'Tuesday 3rd of January 2023 09:14:32 AM', 86),
(76, 102, 'z', 'Tuesday 3rd of January 2023 09:14:36 AM', 86),
(77, 112, 'z', 'Tuesday 3rd of January 2023 09:15:27 AM', 86),
(78, 115, 's', 'Tuesday 3rd of January 2023 09:20:33 AM', 86),
(79, 111, 'a', 'Tuesday 3rd of January 2023 09:28:48 AM', 86),
(80, 112, 'a', 'Tuesday 3rd of January 2023 09:28:52 AM', 86),
(81, 113, 'cscscs', 'Tuesday 3rd of January 2023 10:27:47 AM', 91),
(82, 121, 'sss', 'Tuesday 3rd of January 2023 10:29:01 AM', 91),
(83, 122, 'd\'acc', 'Tuesday 3rd of January 2023 10:29:47 AM', 86),
(84, 125, 'gcf', 'Tuesday 3rd of January 2023 11:26:41 AM', 86);

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
  `ticketing_role` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `email_id`, `badgeuse_role`, `workspace_role`, `form_role`, `inventory_role`, `ticketing_role`) VALUES
(86, 86, 1000, 1000, 1000, 1000, 1000),
(91, 91, 1, 1, 1, 0, 1),
(106, 106, 1, 1, 1, 0, NULL),
(114, 114, 1, 1, 1, 0, 1),
(115, 115, 1000, 1000, 1000, 1000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ticketing`
--

CREATE TABLE `ticketing` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `applicant` varchar(255) NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `last_modif` varchar(255) NOT NULL,
  `ticket_creation` date NOT NULL,
  `attribution` varchar(255) NOT NULL,
  `modif_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ticketing`
--

INSERT INTO `ticketing` (`id`, `type`, `email_id`, `email`, `password`, `category`, `priority`, `title`, `content`, `status`, `applicant`, `ticket_type`, `last_modif`, `ticket_creation`, `attribution`, `modif_by`) VALUES
(5, '', 86, 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0', '0'),
(96, 'ticket', 86, '', '', 'idk', 'low', '55555555555', '55555555555555555555', 'closed', 'Admin', 'idk', '0000-00-00', '2022-12-27', '0', '0'),
(97, 'ticket', 86, '', '', 'idk', 'low', 'zzzzzzzzzzz', 'zzzzzzzzzzz', 'closed', 'Admin', 'idk', '0000-00-00', '2022-12-27', '0', '0'),
(98, 'ticket', 86, '', '', 'idk', 'hight', 'ss', 'ss', 'closed', 'Admin', 'idk', '0000-00-00', '2022-12-27', '0', '0'),
(99, 'ticket', 86, '', '', 'idk', 'low', 'eaea', 'j\'ai un probleme', 'closed', 'Admin', 'idk', '0000-00-00', '2022-12-27', '0', '0'),
(100, 'ticket', 86, '', '', 'idk', 'low', 'ouiiiiiiiiiiii', 'ouiiiiiiiiiiiiiii', 'closed', 'Admin', 'idk', '0000-00-00', '2022-12-27', '0', '0'),
(101, 'user', 115, 'admin.test@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0', '0'),
(102, 'ticket', 115, '', '', 'idk', 'medium', 'Les travaux', 'Les travailleur ne vont pas assez vite', 'resolved', 'Chat', 'idk', 'Tuesday 3rd of January 2023 09:14:37 AM', '2022-12-28', '86', '86'),
(104, 'ticket', 86, '', '', 'idk', 'low', 'oui', 'non', 'in_progress', 'Admin', 'idk', 'Tuesday 3rd of January 2023 09:14:32 AM', '2022-12-28', '86', '86'),
(105, 'ticket', 91, '', '', 'other', 'low', 'Ticket', 'je fais un ticket pour test', 'in_progress', 'user', 'incident', 'Tuesday 3rd of January 2023 09:14:26 AM', '2022-12-29', '86', '86'),
(109, 'ticket', 91, '', '', 'incident', 'medium', 'oui', 'j\'ai un deuxieme prb', 'in_progress', 'user', 'incident', 'Tuesday 3rd of January 2023 09:14:15 AM', '2023-01-02', '86', '86'),
(110, 'ticket', 91, '', '', 'idk', 'low', 'zzz', 'zzzzzzz', 'in_progress', 'user', 'idk', 'Monday 2nd of January 2023 03:15:55 PM', '2023-01-02', '86', '91'),
(111, 'ticket', 86, '', '', 'incident', 'medium', '561651', 'oui', 'in_progress', 'Admin', 'incident', 'Tuesday 3rd of January 2023 09:28:48 AM', '2023-01-02', '86', '86'),
(112, 'ticket', 91, '', '', 'incident', 'emergency', 'test', 'test', 'in_progress', 'user', 'problem', 'Tuesday 3rd of January 2023 09:28:53 AM', '2023-01-02', '86', '86'),
(113, 'ticket', 91, '', '', 'incident', 'emergency', 'test2', 'test2', 'in_progress', 'user', 'problem', 'Tuesday 3rd of January 2023 10:27:47 AM', '2023-01-02', '86', '91'),
(114, 'ticket', 86, '', '', 'incident', 'low', 'eeeeee', 'eeeeeeeeeee', 'closed', 'Admin', 'problem', 'Tuesday 3rd of January 2023 09:16:20 AM', '2023-01-03', '0', '0'),
(115, 'ticket', 86, '', '', 'incident', 'low', 'zzzzz', 'zzzzzzzzzzzzzzz', 'in_progress', 'Admin', 'problem', 'Tuesday 3rd of January 2023 09:20:33 AM', '2023-01-03', '86', '86'),
(116, 'ticket', 86, '', '', 'incident', 'emergency', 'sssssssss', 'ssssssssssssssssss', 'closed', 'Admin', 'problem', 'Tuesday 3rd of January 2023 09:57:20 AM', '2023-01-03', '/', '/'),
(117, 'ticket', 86, '', '', 'incident', 'low', 'aaaaaaa', 'aaaaaaa', 'closed', 'Admin', 'other', 'Tuesday 3rd of January 2023 10:04:31 AM', '2023-01-03', '/', '/'),
(118, 'ticket', 86, '', '', 'incident', 'low', 'qqqqqqqqq', 'qqq', 'closed', 'Admin', 'other', 'Tuesday 3rd of January 2023 10:09:32 AM', '2023-01-03', '/', '/'),
(119, 'ticket', 86, '', '', 'idk', 'low', 'aa', 'aa', 'closed', 'Admin', 'access', 'Tuesday 3rd of January 2023 10:12:47 AM', '2023-01-03', '/', '/'),
(120, 'ticket', 86, '', '', 'other', 'low', 'sssssssssssss', 'sssssss', 'closed', 'Admin', 'other', 'Tuesday 3rd of January 2023 10:19:42 AM', '2023-01-03', '/', '/'),
(121, 'ticket', 91, '', '', 'other', 'hight', 'oui', 'oui', 'in_progress', 'user', 'access', 'Tuesday 3rd of January 2023 10:29:01 AM', '2023-01-03', '/', '91'),
(122, 'ticket', 91, '', '', 'other', 'medium', 'ko', 'ok', 'closed', 'user', 'problem', 'Tuesday 3rd of January 2023 10:29:47 AM', '2023-01-03', '86', '86'),
(123, 'ticket', 86, '', '', 'other', 'low', 'xsxsxs', 'xsxsxs', 'in_progress', 'Admin', 'technical_issues', ' Mardi  3 janvier 202311:15:01', '2023-01-03', '/', '/'),
(124, 'ticket', 86, '', '', 'other', 'emergency', 'datetest', 'test', 'in_progress', 'Admin', 'access', ' Mardi  3 janvier  202311:15:56', '2023-01-03', '/', '/'),
(125, 'ticket', 86, '', '', 'other', 'low', 'dt', 'date', 'in_progress', 'Admin', 'other', 'Tuesday 3rd of January 2023 11:26:42 AM', '2023-01-03', '86', '86');

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
  `workspace_connected` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `workspace_connected`) VALUES
(86, 'Admin', 'Admin', 'admin.admin@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', 0),
(91, 'user', 'user', 'user.user@gmail.com', '4f6515744fbe37e961bbba67050065e8180f959d63f2a9c59431fe3f5246241a', 0),
(106, 'za', 'z', 'zaodren.f@contactmedia.fr', 'b02fe459667cbdf343c9cb107d9f6adf67b0027dcc9c9e1fa41d2e48bd8cc661', 0),
(114, 'ssss', 's', 'aodren.f@contactmedssssssssssssssia.fr', 'f3da00dc4080014ed296d8cfa6e8251636b243085750de0a39c02eac3f00374b', 0),
(115, 'Chat', 'Test', 'admin.test@gmail.com', '69f50a0a5238d532a799312b9cd1d194c62f82d2ad92c030a4adbe692b612f45', 0);

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
-- Index pour la table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_id` (`email_id`);

--
-- Index pour la table `ticketing`
--
ALTER TABLE `ticketing`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT pour la table `headphones`
--
ALTER TABLE `headphones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `equipments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT pour la table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `ticketing`
--
ALTER TABLE `ticketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
