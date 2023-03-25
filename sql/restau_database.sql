-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mars 2023 à 17:11
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restau_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `desserts`
--

CREATE TABLE `desserts` (
  `id_dessert` int(11) NOT NULL,
  `plats` varchar(250) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `prix` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `desserts`
--

INSERT INTO `desserts` (`id_dessert`, `plats`, `ingredients`, `prix`) VALUES
(1, 'Tartes, crèmes, gauffres, coupes glaccées avec ou sans alcool ', 'Plus de choix sur la carte desserts', 'Selon le desserts');

-- --------------------------------------------------------

--
-- Structure de la table `entre`
--

CREATE TABLE `entre` (
  `id_entre` int(11) NOT NULL,
  `plats` varchar(250) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `prix` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entre`
--

INSERT INTO `entre` (`id_entre`, `plats`, `ingredients`, `prix`) VALUES
(2, 'Salade verte', 'Salade verte, noix', '6'),
(3, 'Jambon cru de Savoie', 'Beurre nature ou salé et cornichons', '11'),
(4, 'Salade Soyarde', 'Salade, tomates, jambon cru de Savoie <br>Fromage et noix.', '13'),
(5, 'Salade de chèvre chaud', 'Salade, tomates,toast de chèvre.', '13'),
(6, 'Croûte Savoyarde', ' Salade, tomates,toast de fromage au<br>   jambon de grison.', '13'),
(7, 'Salade de Saint-Marcellin', 'Salade, tomates, pommes de terres,<br>   Saint-Marcellin fondu,<br>jambon de Savoie  ou jambon blanc ou de Grison, noix.', '13');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `entre` varchar(250) NOT NULL,
  `plats` varchar(250) NOT NULL,
  `desserts` varchar(250) NOT NULL,
  `prixPetit` decimal(2,0) NOT NULL,
  `prixGrand` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `entre`, `plats`, `desserts`, `prixPetit`, `prixGrand`) VALUES
(1, 'Salades du Chalet ou<br> tarte au Reblochon', 'Tartiflette spécial au Savoyard ou<br>tartare de boeuf Charolais', 'Tarte aux Myrtilles Fraîches ou <br>Glace Alpage au Génépi', '24', '32');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id_plats` int(11) NOT NULL,
  `plats` varchar(250) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `prix` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id_plats`, `plats`, `ingredients`, `prix`) VALUES
(1, 'salade', 'Pommes de terre,crème, oignons<br> Reblochon ou Bleu', '17'),
(2, ' Gratiné au Brezain', 'Crèpe de Sarrasin, pommes de terre,<br>crème, oignons, viande de Grison,<br>raclette fumée.', '20'),
(3, 'Escalope Savoyarde*', 'Filets de poulet, jambon ou Grison, oignons,<br>crème ou Reblochon.<br>*Accompagnement au choix :<br>Frites, Salade verte, Gratin de pomme de terre ou pâtes. ', '20'),
(4, 'Pavé de coeur de rumsteck* ou<br>Pavé de saumon gratiné au Reblochon*', '*Accompagnement au choix :<br>Frites, Salade verte, Gratin de pomme de terre ou pâtes.', '20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id_dessert`);

--
-- Index pour la table `entre`
--
ALTER TABLE `entre`
  ADD PRIMARY KEY (`id_entre`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id_plats`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id_dessert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entre`
--
ALTER TABLE `entre`
  MODIFY `id_entre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id_plats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
