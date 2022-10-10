-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 juil. 2019 à 10:15
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bibliotheque_ead`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `mp_admin` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `mp_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `annees_ac`
--

CREATE TABLE `annees_ac` (
  `id_an_ac` int(11) NOT NULL,
  `lib_an_ac` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id_auteur` int(11) NOT NULL,
  `nom_auteur` varchar(255) NOT NULL,
  `prenom_auteur` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id_auteur`, `nom_auteur`, `prenom_auteur`) VALUES
(1, 'Dupont', 'Dupond'),
(2, 'CASTLE', 'Erick'),
(3, 'MILONGO', 'Percy'),
(4, 'ccc', 'ccc');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat_ouv` int(11) NOT NULL,
  `lib_cat_ouv` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat_ouv`, `lib_cat_ouv`) VALUES
(1, 'Roman'),
(2, 'livre d\'histoire'),
(3, 'droit'),
(4, 'g&eacute;ographie'),
(5, 'sant&eacute;'),
(6, 'conte'),
(7, 'xxxx'),
(8, 'informatique'),
(9, 'Maths');

-- --------------------------------------------------------

--
-- Structure de la table `compartiments`
--

CREATE TABLE `compartiments` (
  `id_comp` int(11) NOT NULL,
  `lib_comp` varchar(100) NOT NULL,
  `id_rayon` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compartiments`
--

INSERT INTO `compartiments` (`id_comp`, `lib_comp`, `id_rayon`) VALUES
(1, 'Compartiment 1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_doc` int(11) NOT NULL,
  `theme_doc` varchar(255) NOT NULL,
  `option_doc` varchar(100) NOT NULL,
  `niveau_doc` varchar(50) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_dm` int(11) DEFAULT NULL,
  `id_type_doc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id_doc`, `theme_doc`, `option_doc`, `niveau_doc`, `id_auteur`, `id_dm`, `id_type_doc`) VALUES
(1, 'Automatisation de la gestion d\'une biblioth&egrave;que', 'IG', 'BTS', 1, 1, 1),
(5, 'tzee', 'IG', 'Licence', 3, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `d_memoire`
--

CREATE TABLE `d_memoire` (
  `id_dm` int(11) NOT NULL,
  `nom_dm` varchar(255) NOT NULL,
  `prenom_dm` varchar(255) NOT NULL,
  `sexe_dm` varchar(1) NOT NULL,
  `grade_dm` varchar(250) NOT NULL,
  `fonction_dm` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `d_memoire`
--

INSERT INTO `d_memoire` (`id_dm`, `nom_dm`, `prenom_dm`, `sexe_dm`, `grade_dm`, `fonction_dm`) VALUES
(1, 'KOUB', 'Christ', 'M', '', ''),
(2, 'KOUB', '', 'M', 'Grand', 'Superieur'),
(3, 'KOUB', 'as', 'M', 'xxx', 'yyyyyyy');

-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

CREATE TABLE `ecrire` (
  `id_ecrire` int(11) NOT NULL,
  `id_ouvrage` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom_etudiant` varchar(255) NOT NULL,
  `prenom_etudiant` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `adresse_lecteur` varchar(255) NOT NULL,
  `tel_lecteur` varchar(255) NOT NULL,
  `option_etud` varchar(50) NOT NULL,
  `annee` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `matricule`, `nom_etudiant`, `prenom_etudiant`, `sexe`, `adresse_lecteur`, `tel_lecteur`, `option_etud`, `annee`) VALUES
(1, 'ead001', 'lecteur', 'lecteur', 'M', '80 rue des Martyrs Poto-Poto', '085555555', '', ''),
(2, 'ead002', 'lecteur1', 'lecteur1', 'M', '', '055483008', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaires`
--

CREATE TABLE `exemplaires` (
  `id_exp` int(11) NOT NULL,
  `etat_exp` varchar(100) DEFAULT NULL,
  `date_achat` varchar(100) DEFAULT NULL,
  `annee_pub` varchar(20) DEFAULT NULL,
  `prix_achat` int(11) NOT NULL,
  `id_ouvrage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exemplaires`
--

INSERT INTO `exemplaires` (`id_exp`, `etat_exp`, `date_achat`, `annee_pub`, `prix_achat`, `id_ouvrage`) VALUES
(1, '', '', '2019', 133, 14),
(10, '', '', '2019', 133, 14);

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id_op` int(11) NOT NULL,
  `lib_op` varchar(50) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL,
  `operation` varchar(1) NOT NULL,
  `date_demande_op` varchar(50) DEFAULT NULL,
  `heure_demande_op` varchar(50) DEFAULT NULL,
  `date_debut_op` varchar(100) DEFAULT NULL,
  `heure_debut_op` varchar(50) DEFAULT NULL,
  `date_fin_op` varchar(50) DEFAULT NULL,
  `heure_fin_op` varchar(50) DEFAULT NULL,
  `jour_op` varchar(10) NOT NULL,
  `mois_op` varchar(20) NOT NULL,
  `annee_op` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id_op`, `lib_op`, `id_etudiant`, `id_exp`, `operation`, `date_demande_op`, `heure_demande_op`, `date_debut_op`, `heure_debut_op`, `date_fin_op`, `heure_fin_op`, `jour_op`, `mois_op`, `annee_op`) VALUES
(6, 'demande de reservation', 1, 1, '1', '12 juillet 2019', '12h 04m 59s', '', '', '', '', '12', 'juillet', '2019'),
(5, 'demande d\'emprunt', 1, 7, '1', '12 juillet 2019', '12h 04m 12s', '', '', '', '', '12', 'juillet', '2019');

-- --------------------------------------------------------

--
-- Structure de la table `operations_annulees`
--

CREATE TABLE `operations_annulees` (
  `id_op_annul` int(11) NOT NULL,
  `id_op` int(11) NOT NULL,
  `lib_op` varchar(50) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_ouvrage` int(11) NOT NULL,
  `operation` varchar(1) NOT NULL,
  `date_demande_op` varchar(50) NOT NULL,
  `heure_demande_op` varchar(50) NOT NULL,
  `date_debut_op` varchar(50) NOT NULL,
  `heure_debut_op` varchar(50) NOT NULL,
  `date_fin_op` varchar(50) NOT NULL,
  `heure_fin_op` varchar(50) NOT NULL,
  `jour_op` varchar(50) NOT NULL,
  `mois_op` varchar(30) NOT NULL,
  `annee_op` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `operations_docs`
--

CREATE TABLE `operations_docs` (
  `id_op_doc` int(11) NOT NULL,
  `lib_op_doc` varchar(50) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `date_demande_op` varchar(50) DEFAULT NULL,
  `heure_demande_op` varchar(20) DEFAULT NULL,
  `date_debut_op` varchar(50) DEFAULT NULL,
  `heure_debut_op` varchar(20) DEFAULT NULL,
  `date_fin_op` varchar(50) DEFAULT NULL,
  `heure_fin_op` varchar(20) DEFAULT NULL,
  `jour_op` varchar(20) DEFAULT NULL,
  `mois_op` varchar(20) DEFAULT NULL,
  `annee_op` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id_ouvrage` int(11) NOT NULL,
  `titre_ouvrage` varchar(255) NOT NULL,
  `resume_ouvrage` text NOT NULL,
  `nbre_page_ouv` int(11) NOT NULL,
  `id_cat_ouv` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id_ouvrage`, `titre_ouvrage`, `resume_ouvrage`, `nbre_page_ouv`, `id_cat_ouv`, `id_auteur`, `id_comp`) VALUES
(7, 'Les extra-terrestres', 'r.a.s', 45, 2, 3, 1),
(12, 'Peur bleues', '...', 665, 6, 3, 1),
(14, 'apcc', '...', 1454, 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE `rayon` (
  `id_rayon` int(11) NOT NULL,
  `lib_rayon` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rayon`
--

INSERT INTO `rayon` (`id_rayon`, `lib_rayon`) VALUES
(1, 'Rayon 1'),
(2, 'Rayon 2');

-- --------------------------------------------------------

--
-- Structure de la table `type_doc`
--

CREATE TABLE `type_doc` (
  `id_type_doc` int(11) NOT NULL,
  `lib_type_doc` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_doc`
--

INSERT INTO `type_doc` (`id_type_doc`, `lib_type_doc`) VALUES
(1, 'Mémoire'),
(2, 'Rapport de stage'),
(3, 'M&eacute;moire'),
(4, 'M&amp;eacute;moire'),
(5, 'ssss');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `annees_ac`
--
ALTER TABLE `annees_ac`
  ADD PRIMARY KEY (`id_an_ac`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat_ouv`);

--
-- Index pour la table `compartiments`
--
ALTER TABLE `compartiments`
  ADD PRIMARY KEY (`id_comp`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_doc`);

--
-- Index pour la table `d_memoire`
--
ALTER TABLE `d_memoire`
  ADD PRIMARY KEY (`id_dm`);

--
-- Index pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD PRIMARY KEY (`id_ecrire`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `exemplaires`
--
ALTER TABLE `exemplaires`
  ADD PRIMARY KEY (`id_exp`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id_op`);

--
-- Index pour la table `operations_annulees`
--
ALTER TABLE `operations_annulees`
  ADD PRIMARY KEY (`id_op_annul`);

--
-- Index pour la table `operations_docs`
--
ALTER TABLE `operations_docs`
  ADD PRIMARY KEY (`id_op_doc`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id_ouvrage`);

--
-- Index pour la table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Index pour la table `type_doc`
--
ALTER TABLE `type_doc`
  ADD PRIMARY KEY (`id_type_doc`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `annees_ac`
--
ALTER TABLE `annees_ac`
  MODIFY `id_an_ac` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat_ouv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `compartiments`
--
ALTER TABLE `compartiments`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `d_memoire`
--
ALTER TABLE `d_memoire`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `ecrire`
--
ALTER TABLE `ecrire`
  MODIFY `id_ecrire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `exemplaires`
--
ALTER TABLE `exemplaires`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id_op` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `operations_annulees`
--
ALTER TABLE `operations_annulees`
  MODIFY `id_op_annul` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `operations_docs`
--
ALTER TABLE `operations_docs`
  MODIFY `id_op_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_doc`
--
ALTER TABLE `type_doc`
  MODIFY `id_type_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
