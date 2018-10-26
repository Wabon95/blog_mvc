-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Ven 26 Octobre 2018 à 14:52
-- Version du serveur :  10.0.34-MariaDB
-- Version de PHP :  5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Wabon', 'Contenu de mon commentaire', '2018-09-29 15:15:00'),
(2, 1, 'Wabon', 'Contenu d\'un autre commentaire écrit depuis le site lui-même ! ET MODIFIÉ PAR LA SUITE !', '2018-10-11 14:10:10'),
(10, 2, 'Wabon', 'Un commentaire modifié depuis le site lui-même', '2018-10-11 14:10:45'),
(11, 2, 'Wabon', 'Un nouveau commentaire modifié lui-aussi depuis le site encore une fois', '2018-10-11 14:57:58'),
(12, 2, 'Julien', 'Julien il écrit des conneries pour tester.\r\nEt il les modifie ensuite DE NOUVEAU', '2018-10-11 15:01:05'),
(13, 21, 'Seyras', 'Un contenu divers', '2018-10-17 16:50:23'),
(14, 21, 'Seyras', 'Un autre contenu histoire de tester la redirection et la modification', '2018-10-17 16:50:43'),
(15, 2, 'David', 'J\'aime écrire des conneries ', '2018-10-17 17:33:52');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `creation_date`) VALUES
(1, 'Wabon', 'Titre d\'un post', 'Contenu à la con d\'un post modifié', '2018-09-29 15:00:00'),
(2, 'Wabon', 'Comment on structure un projet PHP en MVC ?', 'Le fait de structurer un projet en suivant le design pattern MVC est un plus non négligeable pour produire un code propre et surtout, évolutif...', '2018-09-29 22:14:00'),
(21, 'Wabon', 'Comment se raser ?', 'Avec un rasoir pardi !', '2018-10-13 20:17:57');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
