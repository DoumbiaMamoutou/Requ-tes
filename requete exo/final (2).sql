-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 27 avr. 2019 à 14:06
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `final`
--

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `superficie` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`id`, `nom`, `superficie`, `id_ville`) VALUES
(1, 'Yopougon', 153, 1),
(2, 'Cocody', 132, 1),
(3, 'Presidencce', 95, 2),
(4, 'Habitat', 70, 2),
(5, 'Koumassi', 9, 1),
(6, 'Abobo', 90, 1),
(7, 'Anyama', 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `continents`
--

CREATE TABLE `continents` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `superficie` int(11) NOT NULL,
  `id_planete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `continents`
--

INSERT INTO `continents` (`id`, `nom`, `superficie`, `id_planete`) VALUES
(1, 'Afrique', 30415873, 1),
(2, 'Europe', 10180000, 1),
(7, 'Asie', 43810582, 1),
(8, 'Americain', 42189120, 1),
(9, 'Oceanie', 8525989, 1),
(10, 'Antartique', 14000000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `habitants`
--

CREATE TABLE `habitants` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `id_quartier` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `habitants`
--

INSERT INTO `habitants` (`id`, `nom`, `prenom`, `id_quartier`, `solde`, `numero`) VALUES
(1, 'Ouelle', 'Leticia', 8, 200, 12345678),
(2, 'Tiadem', 'Sipouless', 8, 450, 1235578),
(3, 'All', 'commune', 8, 300, 12334455),
(7, 'Begou', 'Hans-Vernier', 3, 10000, 77986300),
(8, 'Kouagni', 'Cedric', 3, 2700, 42404341),
(9, 'Ghane', 'Mams', 9, 1200, 12345678),
(10, 'Yves', 'solstisse', 9, 1150, 42404341),
(11, 'Bodoin', 'Serveur', 10, 300, 13334455),
(12, 'Bodoin', 'doumbi', 10, 1200, 13456782),
(13, 'Deplhine', 'Topac', 6, 5000, 77986388),
(14, 'Bodoin', 'Yves', 10, 1400, 20738494);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `superficie` int(11) NOT NULL,
  `id_continent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `superficie`, `id_continent`) VALUES
(1, 'Cote d\'Ivoire', 322463, 1),
(2, 'Ghana', 238535, 1),
(3, 'France', 643801, 2),
(4, 'Italie', 301263, 2);

-- --------------------------------------------------------

--
-- Structure de la table `planetes`
--

CREATE TABLE `planetes` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `superficie` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `planetes`
--

INSERT INTO `planetes` (`id`, `nom`, `superficie`) VALUES
(1, 'Terre', 30415873);

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

CREATE TABLE `quartiers` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `id_commune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quartiers`
--

INSERT INTO `quartiers` (`id`, `nom`, `id_commune`) VALUES
(1, 'Bel Air', 1),
(2, 'Sicogi', 1),
(3, 'Maroc', 1),
(4, 'Camp Militaire', 1),
(5, 'PK18', 6),
(6, 'akeikoua', 6),
(7, 'Residentielle', 7),
(8, 'Belle vie', 7),
(9, '05', 5),
(10, '32', 5),
(11, 'II plateaux', 2),
(12, 'Angre', 2);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `superficie` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `superficie`, `id_pays`) VALUES
(1, 'Abidjan', 2119, 1),
(2, 'Yamoussoukro', 3496, 1),
(3, 'Boauke', 71, 1),
(4, 'Paris', 105, 3),
(5, 'Lyon', 47, 3),
(6, 'Marseille', 240, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Index pour la table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_planete` (`id_planete`);

--
-- Index pour la table `habitants`
--
ALTER TABLE `habitants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quartier` (`id_quartier`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_continent` (`id_continent`);

--
-- Index pour la table `planetes`
--
ALTER TABLE `planetes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quartiers`
--
ALTER TABLE `quartiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commune` (`id_commune`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pays` (`id_pays`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `continents`
--
ALTER TABLE `continents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `habitants`
--
ALTER TABLE `habitants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `planetes`
--
ALTER TABLE `planetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `quartiers`
--
ALTER TABLE `quartiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `communes_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id`);

--
-- Contraintes pour la table `continents`
--
ALTER TABLE `continents`
  ADD CONSTRAINT `continents_ibfk_1` FOREIGN KEY (`id_planete`) REFERENCES `planetes` (`id`);

--
-- Contraintes pour la table `habitants`
--
ALTER TABLE `habitants`
  ADD CONSTRAINT `habitants_ibfk_1` FOREIGN KEY (`id_quartier`) REFERENCES `quartiers` (`id`);

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`id_continent`) REFERENCES `continents` (`id`);

--
-- Contraintes pour la table `quartiers`
--
ALTER TABLE `quartiers`
  ADD CONSTRAINT `quartiers_ibfk_1` FOREIGN KEY (`id_commune`) REFERENCES `communes` (`id`);

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
