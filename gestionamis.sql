-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 18 oct. 2023 à 10:45
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionamis`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int NOT NULL,
  `status` int DEFAULT NULL,
  `id_demandeur` int DEFAULT NULL,
  `id_demander` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `status`, `id_demandeur`, `id_demander`) VALUES
(1, 0, 1, 3),
(2, 1, 3, 1),
(3, 1, 5, 1),
(4, 1, 4, 1),
(5, 1, 4, 3),
(6, 1, 4, 5),
(7, 1, 5, 3),
(8, 1, 6, 1),
(9, 1, 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`) VALUES
(1, 'florian', '$2y$10$OxuBGQSlScntrQdippatJu9S1dePaQcRKUNsuf2P3U9dI2TXJ/n5G'),
(3, 'romeo', '$2y$10$drBtL4Qu/Vxc2uQsqkkzzeNNh6Sh879mQ7Gh5VannW4LO8pIgq6ty'),
(4, 'paul', '$2y$10$YLoyhPbjck6qmeHyU9gUheRpHM7V.hik7HAQMdUQxMXUd6dxHx5Nu'),
(5, 'eva', '$2y$10$.9apbVNUXrDsnO6xquRI0utSjYUmDggg2jF/w7iJ7N0z9.Sk8BEP6'),
(6, 'jean', '$2y$10$kY/yCP9Y4pqnCYHOIiJ0l..A0qeXivzZK3Ca0L7XcPbpO5.S5RKCu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_demandeur` (`id_demandeur`),
  ADD KEY `id_demander` (`id_demander`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_demandeur`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`id_demander`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
