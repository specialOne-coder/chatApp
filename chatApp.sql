-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 09 mars 2021 à 13:00
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatApp`
--
CREATE DATABASE IF NOT EXISTS `chatApp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `chatApp`;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `msg_entrant_id` int(255) NOT NULL,
  `msg_sortant_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `test1` int(11) NOT NULL DEFAULT 1,
  `test2` int(11) NOT NULL DEFAULT 2,
  `test3` int(11) NOT NULL DEFAULT 3,
  `test4` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_entrant_id`, `msg_sortant_id`, `msg`, `test1`, `test2`, `test3`, `test4`) VALUES
(1, 125595462, 926800929, 'Anh brozi Ébi', 1, 2, 3, 4),
(2, 926800929, 125595462, 'plan', 1, 2, 3, 4),
(3, 125595462, 926800929, 'Tu fais quoi ?', 1, 2, 3, 4),
(4, 926800929, 125595462, 'rien et toi ?', 1, 2, 3, 4),
(5, 125595462, 926800929, 'Idem ', 1, 2, 3, 4),
(6, 125595462, 926800929, 'Tu reviens?', 1, 2, 3, 4),
(7, 125595462, 926800929, 'Oui ?', 1, 2, 3, 4),
(8, 926800929, 125595462, 'pas encore bro', 1, 2, 3, 4),
(9, 125595462, 926800929, 'Mais ça nous plairait beaucoup ', 1, 2, 3, 4),
(10, 926800929, 125595462, 'oui loo', 1, 2, 3, 4),
(11, 125595462, 926800929, 'Ok', 1, 2, 3, 4),
(12, 125595462, 926800929, 'Oooh', 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(400) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `nom`, `prenom`, `email`, `password`, `image`, `status`) VALUES
(1, 926800929, 'At', 'ferdinand', 'frd@gmail.com', '8918', '1615096541ia.png', 'Offline'),
(2, 125595462, 'Avoyi', 'parfait', 'paf@gmail.com', '8918', '1615096640uyav3xutzkdkngj2idiz.png', 'Offline'),
(3, 1161651285, 'Kpoblam', 'fabrice', 'pourmespeches@gmail.com', '8918', '1615098791blogo.png', 'En ligne'),
(4, 765767696, 'Bossa', 'Ko', 'boss@gmail.com', 'bossa', '16151432369C66AA4B-DE45-41E1-B951-D071CB7BC9EA.png', 'Offline'),
(5, 754467234, 'test', 'tes', 'sodji@gmail.com', '8918', '1615173884seknow.jpg', 'Offline'),
(6, 749841226, 'ok', 'mipos', 'ok@gmail.com', '8918', '1615176892grut.jpg', 'Offline');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
