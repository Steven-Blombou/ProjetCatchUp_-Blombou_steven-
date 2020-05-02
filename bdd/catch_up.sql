-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 01 mai 2020 à 14:30
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `catch_up`
--

-- --------------------------------------------------------

--
-- Structure de la table `R_avoir`
--

CREATE TABLE `R_avoir` (
  `id_category` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Archivage`
--

CREATE TABLE `T_Archivage` (
  `id_archivage` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_ArchivageCom`
--

CREATE TABLE `T_ArchivageCom` (
  `id_archivage_com` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_Commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Articles`
--

CREATE TABLE `T_Articles` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `activer` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Articles`
--

INSERT INTO `T_Articles` (`id_article`, `titre`, `auteur`, `contenu`, `date`, `activer`, `id_user`) VALUES
(1, 'article1', 'auteur1', 'Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem', '2020-04-30', 1, 5),
(2, 'article2', 'auteur2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum hendrerit erat. Proin ', '2020-04-30', 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `T_Category`
--

CREATE TABLE `T_Category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_Commentaires`
--

CREATE TABLE `T_Commentaires` (
  `id_Commentaire` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `activer` tinyint(1) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_images`
--

CREATE TABLE `T_images` (
  `id_article` int(11) NOT NULL,
  `lien_image` varchar(255) NOT NULL,
  `id_article_T_Articles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `T_TypeUser`
--

CREATE TABLE `T_TypeUser` (
  `id_typeUser` int(11) NOT NULL,
  `nomDuType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_TypeUser`
--

INSERT INTO `T_TypeUser` (`id_typeUser`, `nomDuType`) VALUES
(1, 'admin'),
(2, 'moderateur'),
(3, 'userLog');

-- --------------------------------------------------------

--
-- Structure de la table `T_User_catch_up`
--

CREATE TABLE `T_User_catch_up` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(100) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `password_user` char(128) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `id_typeUser` int(11) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `valid` int(11) NOT NULL,
  `confirmed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_User_catch_up`
--

INSERT INTO `T_User_catch_up` (`id_user`, `pseudo_user`, `nom_user`, `prenom_user`, `password_user`, `mail_username`, `id_typeUser`, `confirmation_token`, `valid`, `confirmed_at`) VALUES
(1, 'test1', 'test1', 'test1', 'password_user', 'test5@live.fr', 3, '', 0, '0000-00-00 00:00:00'),
(5, 'test5', 'test5', 'test5', '$2y$10$ZUakkzvBT8Kz72VYejHeo.4j1oiUiesy2xFnXQklAGyNFllG2tbIG', 'truc@live.fr', 3, '0GqxoGUTNwK78TfhunVc0cjnZlFIZhTOQvp7THBGQ65bRGjYC9C9nnGsD5FX', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `R_avoir`
--
ALTER TABLE `R_avoir`
  ADD PRIMARY KEY (`id_category`,`id_article`),
  ADD KEY `R_avoir_T_Articles0_FK` (`id_article`);

--
-- Index pour la table `T_Archivage`
--
ALTER TABLE `T_Archivage`
  ADD PRIMARY KEY (`id_archivage`),
  ADD KEY `T_Archivage_T_User_catch_up_FK` (`id_user`),
  ADD KEY `T_Archivage_T_Articles0_FK` (`id_article`);

--
-- Index pour la table `T_ArchivageCom`
--
ALTER TABLE `T_ArchivageCom`
  ADD PRIMARY KEY (`id_archivage_com`),
  ADD KEY `T_ArchivageCom_T_Commentaires_FK` (`id_Commentaire`);

--
-- Index pour la table `T_Articles`
--
ALTER TABLE `T_Articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `T_Articles_T_User_catch_up_FK` (`id_user`);

--
-- Index pour la table `T_Category`
--
ALTER TABLE `T_Category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `T_Commentaires`
--
ALTER TABLE `T_Commentaires`
  ADD PRIMARY KEY (`id_Commentaire`),
  ADD KEY `T_Commentaires_T_Articles_FK` (`id_article`),
  ADD KEY `T_Commentaires_T_User_catch_up0_FK` (`id_user`);

--
-- Index pour la table `T_images`
--
ALTER TABLE `T_images`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `T_images_T_Articles_FK` (`id_article_T_Articles`);

--
-- Index pour la table `T_TypeUser`
--
ALTER TABLE `T_TypeUser`
  ADD PRIMARY KEY (`id_typeUser`);

--
-- Index pour la table `T_User_catch_up`
--
ALTER TABLE `T_User_catch_up`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `T_User_catch_up_T_TypeUser_FK` (`id_typeUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_Archivage`
--
ALTER TABLE `T_Archivage`
  MODIFY `id_archivage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_ArchivageCom`
--
ALTER TABLE `T_ArchivageCom`
  MODIFY `id_archivage_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Articles`
--
ALTER TABLE `T_Articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `T_Category`
--
ALTER TABLE `T_Category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_Commentaires`
--
ALTER TABLE `T_Commentaires`
  MODIFY `id_Commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_images`
--
ALTER TABLE `T_images`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `T_TypeUser`
--
ALTER TABLE `T_TypeUser`
  MODIFY `id_typeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `T_User_catch_up`
--
ALTER TABLE `T_User_catch_up`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `R_avoir`
--
ALTER TABLE `R_avoir`
  ADD CONSTRAINT `R_avoir_T_Articles0_FK` FOREIGN KEY (`id_article`) REFERENCES `T_Articles` (`id_article`),
  ADD CONSTRAINT `R_avoir_T_Category_FK` FOREIGN KEY (`id_category`) REFERENCES `T_Category` (`id_category`);

--
-- Contraintes pour la table `T_Archivage`
--
ALTER TABLE `T_Archivage`
  ADD CONSTRAINT `T_Archivage_T_Articles0_FK` FOREIGN KEY (`id_article`) REFERENCES `T_Articles` (`id_article`),
  ADD CONSTRAINT `T_Archivage_T_User_catch_up_FK` FOREIGN KEY (`id_user`) REFERENCES `T_User_catch_up` (`id_user`);

--
-- Contraintes pour la table `T_ArchivageCom`
--
ALTER TABLE `T_ArchivageCom`
  ADD CONSTRAINT `T_ArchivageCom_T_Commentaires_FK` FOREIGN KEY (`id_Commentaire`) REFERENCES `T_Commentaires` (`id_Commentaire`);

--
-- Contraintes pour la table `T_Articles`
--
ALTER TABLE `T_Articles`
  ADD CONSTRAINT `T_Articles_T_User_catch_up_FK` FOREIGN KEY (`id_user`) REFERENCES `T_User_catch_up` (`id_user`);

--
-- Contraintes pour la table `T_Commentaires`
--
ALTER TABLE `T_Commentaires`
  ADD CONSTRAINT `T_Commentaires_T_Articles_FK` FOREIGN KEY (`id_article`) REFERENCES `T_Articles` (`id_article`),
  ADD CONSTRAINT `T_Commentaires_T_User_catch_up0_FK` FOREIGN KEY (`id_user`) REFERENCES `T_User_catch_up` (`id_user`);

--
-- Contraintes pour la table `T_images`
--
ALTER TABLE `T_images`
  ADD CONSTRAINT `T_images_T_Articles_FK` FOREIGN KEY (`id_article_T_Articles`) REFERENCES `T_Articles` (`id_article`);

--
-- Contraintes pour la table `T_User_catch_up`
--
ALTER TABLE `T_User_catch_up`
  ADD CONSTRAINT `T_User_catch_up_T_TypeUser_FK` FOREIGN KEY (`id_typeUser`) REFERENCES `T_TypeUser` (`id_typeUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
