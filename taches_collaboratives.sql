-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 fév. 2025 à 16:54
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `taches_collaboratives`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('À faire','En cours','Terminé') DEFAULT 'À faire',
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `user_id`, `created_at`) VALUES
(2, 'Je test', 'Test d\'une tâche complexe', 'Terminé', 4, '2025-02-18 16:24:40'),
(4, 'Taches a faire', 'Taches a faireTaches a faireTaches a faireTaches a faireTaches a faire', 'À faire', 4, '2025-02-18 16:51:19'),
(5, 'Taches en cours', 'Taches en coursTaches en coursTaches en coursTaches en coursTaches en coursTaches en cours', 'En cours', 4, '2025-02-18 16:51:29'),
(6, 'Taches en coursTaches en coursTaches en coursTaches en coursTaches en cours', 'Taches en coursTaches en coursTaches en coursTaches en cours', 'En cours', 4, '2025-02-18 16:51:37'),
(7, 'Taches faites', 'Taches faitesTaches faitesTaches faitesTaches faitesTaches faites', 'Terminé', 4, '2025-02-18 16:51:48'),
(8, 'Tâches a faire', 'Tâches a faireTâches a faireTâches a faireTâches a faireTâches a faireTâches a faire', 'À faire', 4, '2025-02-18 16:52:26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(4, 'Ryckelynck', 'nicolas3469@yahoo.fr', '$2y$10$XM5dLl//vqS5VkyeAejCduJMmROt9efgulQkqAa/rx6pivPfh9.AK', '2025-02-18 15:51:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
