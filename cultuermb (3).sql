-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 mai 2023 à 21:24
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
-- Base de données : `cultuermb`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonn`
--

CREATE TABLE `abonn` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mdp5_pass` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `status` enum('Bibliothaque','Atelier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonn`
--

INSERT INTO `abonn` (`id`, `username`, `email`, `password`, `mdp5_pass`, `birthday`, `status`) VALUES
(1, 'bouzid rayan', '0', '0000-00-00', '', '0000-00-00', 'Bibliothaque'),
(2, 'hjg fuffg', 'ugyfukgu@gmail.com', 'cccccghfg', '', '0000-00-00', 'Bibliothaque'),
(3, 'ftrttruy', 'nbcjqsdgazudte@gmail.com', 'cccccfffff', '', '0000-00-00', 'Bibliothaque'),
(5, 'rym', 'rymrer@gmail.com', 'guytufy', '', '0000-00-00', 'Atelier'),
(6, 'kztr', 'kjzdhzakd@gmail.com', 'sgdqjdgaziu', '', '0000-00-00', 'Atelier');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `name`, `email`, `password`) VALUES
(12, 'saaid', 'saaid12@gmail.com', 'saaid12'),
(13, 'mohamed', 'mohamed12@gmail.com', 'mohamed12');

-- --------------------------------------------------------

--
-- Structure de la table `artiset`
--

CREATE TABLE `artiset` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `email` varchar(66) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `outile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiset`
--

INSERT INTO `artiset` (`id`, `name`, `email`, `birthday`, `phone`, `photo`, `outile`) VALUES
(1, 'Hassan Kechache', 'hassankh@gmail.com', 'un acteur et médecin algérien', '66667676', 'hassan.jpg', 'Il est connu pour son rôle de Mostefa Ben Boulaïd dans le film Mostefa Ben Boulaïd, ainsi que dans la série télévisée El Khawa (الخاوة). En 2019, il joue le rôle de Taher (الطاهر) dans la série tuniso-algérienne Machā`ir (مشاعر).'),
(2, 'Hassan El Annabi', 'hassab@gmail.com', '', '06666666', 'anabi.jpg', '  En 1958 son premier disque a paru et a marqué le vrai début de sa popularité et sa célébrité avec les chansons Fatima, RouhYa Bani Louerchan et Jesmi Fanae jksduibcuisdcbiu dcnnnnnnnnnnjsdnuisdchuich.');

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE `atelier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ensenginant` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `emploi_de_temps` varchar(255) NOT NULL,
  `Duree` varchar(255) NOT NULL,
  `salle` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `atelier`
--

INSERT INTO `atelier` (`id`, `name`, `ensenginant`, `age`, `emploi_de_temps`, `Duree`, `salle`, `prix`) VALUES
(5, 'Informatique', 'Chaib rasou Zakria', 18, 'samdi 9:00   / samdi 12:30', '3h', 'Salle de informatque', 3000),
(6, 'Photographie', 'Hamel ahmed', 0, 'Samedi,Mardi,Jeudi a 14.00', '2h', 'salle de photographie', 3000),
(7, 'La scène', 'Bachir slatnia ', 0, 'Samedi a 9.00', '3h', 'salle2', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no_of_copy` int(5) NOT NULL,
  `categoryid` varchar(255) NOT NULL,
  `auteur` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `update_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`bookid`, `name`, `picture`, `isbn`, `no_of_copy`, `categoryid`, `auteur`, `added_on`, `update_on`) VALUES
(23, 'Encyclopédie informatique Rouler et performer', 'received_945109120150356.jpeg', '0986543', 4, 'Ordinateur et informations', 'D.madhar tayal', '2023-05-26 17:29:01', '2023-05-26 17:29:01'),
(24, 'SunSO', '20230526_164224.jpg', '09876543', 3, 'Ordinateur et informations', 'D.Angell', '2023-05-26 17:29:46', '2023-05-26 17:29:46'),
(25, 'Le concept de liberté entre religion, philosophie et science', 'received_236657665668160.jpeg', '0987654', 3, 'Philosophie et psychologie', 'D.abdu rahman al-wafi ', '2023-05-26 17:34:46', '2023-05-26 17:34:46'),
(26, 'Résumé des principes de psychologie', 'received_1259855794904595.jpeg', '456789', 1, 'Philosophie et psychologie', 'D.Abdul Majeed Omrani', '2023-05-26 17:35:49', '2023-05-26 17:35:49');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Enable','Disable') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`categoryid`, `name`, `status`) VALUES
(4, 'Ordinateur et informations', 'Disable'),
(5, 'Philosophie et psychologie', 'Disable'),
(6, 'religions', 'Disable'),
(7, 'science sociale', 'Disable');

-- --------------------------------------------------------

--
-- Structure de la table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(566) NOT NULL,
  `Entry_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact_form`
--

INSERT INTO `contact_form` (`id`, `Name`, `Email`, `Message`, `Entry_Date`) VALUES
(1, 'rayan', 'gfefif@gmail.com', 'ghftut', '0000-00-00'),
(2, 'vghfrtrt', 'gfefif@gmail.com', 'jghhghgghj', '0000-00-00'),
(3, 'bouzid rayan', 'gfefif@gmail.com', 'hghgiggkj,b', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `demprunt`
--

CREATE TABLE `demprunt` (
  `ide` int(11) NOT NULL,
  `date_trover` date NOT NULL,
  `Date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demprunt`
--

INSERT INTO `demprunt` (`ide`, `date_trover`, `Date_retour`) VALUES
(1, '2023-05-17', '2023-05-31'),
(2, '2023-05-01', '2023-06-07'),
(3, '2023-05-15', '2023-06-09'),
(4, '2023-06-02', '2023-04-29'),
(5, '2023-04-30', '2023-06-08'),
(6, '2023-04-29', '2023-06-09');

-- --------------------------------------------------------

--
-- Structure de la table `empurnt`
--

CREATE TABLE `empurnt` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `empurnt`
--

INSERT INTO `empurnt` (`id`, `username`, `email`, `name`, `category`) VALUES
(1, '', '', 'book1', 'action'),
(2, '', 'kjzdhzakd@gmail.com', 'book1', 'actin'),
(3, 'rymrer@gmail.com', 'rym ch', 'liver', 'hestory');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_tlphon` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `number_billets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `nb_tlphon`, `age`, `event`, `number_billets`) VALUES
(4, 'rayan', 2147483647, 23, 'event', 4);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `name`, `nb_place`) VALUES
(1, 'القاعة الكبري', '500'),
(2, 'القاعة الصغرى', '200'),
(3, 'قاعة المعارض', '0');

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

CREATE TABLE `spectacle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Salle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `spectacle`
--

INSERT INTO `spectacle` (`id`, `name`, `Salle`, `image`, `date`) VALUES
(14, 'يوم الطالب19ماي', '1', '1685098361070.jpg', '2023-05-19'),
(15, 'يوم الشهيد18 فيفري', '1', '1685098432530.jpg', '2023-02-14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonn`
--
ALTER TABLE `abonn`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artiset`
--
ALTER TABLE `artiset`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Index pour la table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demprunt`
--
ALTER TABLE `demprunt`
  ADD PRIMARY KEY (`ide`);

--
-- Index pour la table `empurnt`
--
ALTER TABLE `empurnt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `spectacle`
--
ALTER TABLE `spectacle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonn`
--
ALTER TABLE `abonn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `artiset`
--
ALTER TABLE `artiset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `atelier`
--
ALTER TABLE `atelier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `demprunt`
--
ALTER TABLE `demprunt`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `empurnt`
--
ALTER TABLE `empurnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `spectacle`
--
ALTER TABLE `spectacle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
