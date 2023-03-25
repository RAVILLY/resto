-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mars 2023 à 18:02
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
-- Base de données : `resto_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `admistration`
--

CREATE TABLE `admistration` (
  `id` int(8) NOT NULL,
  `echelon` varchar(28) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prenom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admistration`
--

INSERT INTO `admistration` (`id`, `echelon`, `mot_de_passe`, `email`, `prenom`) VALUES
(28, 'joel', '$2y$10$5j4050ApWwbAafB13E8eCeWnFSevruoLfNsd97sG1YOpEnsNAqCz6', 'moipanpan@hotmail.fr', 'joel');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `mot_de_passe`, `email`, `telephone`) VALUES
(19, 'ravilly', 'joel', '123', 'moipanpan@hotmail.fr', '0621834863'),
(20, 'joel', 'joel', '123', 'jojo@caca.fr', '11 11 11 11 11');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` tinytext NOT NULL,
  `nombres` decimal(50,0) NOT NULL,
  `dates` tinytext DEFAULT NULL,
  `heures` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `prenom`, `telephone`, `nombres`, `dates`, `heures`) VALUES
(19, 'popo', 'cucu', '00/00/00/00/00', '2', '1965-08-28', '22:30'),
(20, 'ravilly', 'joel', '00/00/00/00/01', '10', '2023-02-26', '20:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admistration`
--
ALTER TABLE `admistration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admistration`
--
ALTER TABLE `admistration`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
