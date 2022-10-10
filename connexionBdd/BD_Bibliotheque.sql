-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 06 Mai 2019 à 09:22
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `gesbibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE IF NOT EXISTS `annees` (
  `CodeAnneeAc` varchar(5) NOT NULL,
  `LibAnneeAc` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`CodeAnneeAc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annees`
--


-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE IF NOT EXISTS `auteurs` (
  `CodeAuteur` varchar(10) NOT NULL,
  `NomAuteur` varchar(30) NOT NULL,
  `PrenomAuteur` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodeAuteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `auteurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CodeCatOuv` varchar(10) NOT NULL,
  `LibCatOuv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodeCatOuv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--


-- --------------------------------------------------------

--
-- Structure de la table `compartiments`
--

CREATE TABLE IF NOT EXISTS `compartiments` (
  `NumCompartiment` varchar(10) NOT NULL,
  `LibCompartiment` varchar(50) DEFAULT NULL,
  `CodeRayon` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`NumCompartiment`),
  KEY `compartiment_1` (`CodeRayon`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compartiments`
--


-- --------------------------------------------------------

--
-- Structure de la table `concerner2`
--

CREATE TABLE IF NOT EXISTS `concerner2` (
  `CodeOp_NumExp` varchar(20) NOT NULL,
  `CodeOp` varchar(10) DEFAULT NULL,
  `NumExp` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CodeOp_NumExp`),
  KEY `concerner_1` (`CodeOp`),
  KEY `concerner_2` (`NumExp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `concerner2`
--


-- --------------------------------------------------------

--
-- Structure de la table `concerner3`
--

CREATE TABLE IF NOT EXISTS `concerner3` (
  `CodeOp_CodeDoc` varchar(20) NOT NULL,
  `CodeOp` varchar(10) DEFAULT NULL,
  `CodeDoc` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CodeOp_CodeDoc`),
  KEY `concerner3_1` (`CodeOp`),
  KEY `concerner3_2` (`CodeDoc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `concerner3`
--


-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `CodeDoc` varchar(10) NOT NULL,
  `ThemeDoc` varchar(50) NOT NULL,
  `AuteurDoc` varchar(30) NOT NULL,
  `OptionDoc` varchar(30) NOT NULL,
  `NiveauDoc` varchar(30) NOT NULL,
  `CodeAuteur` varchar(10) DEFAULT NULL,
  `CodeDM` varchar(10) DEFAULT NULL,
  `CodeTypeDoc` varchar(10) DEFAULT NULL,
  `NumCompartiment` datetime DEFAULT NULL,
  PRIMARY KEY (`CodeDoc`),
  KEY `document_1` (`CodeAuteur`),
  KEY `document_2` (`CodeDM`),
  KEY `document_3` (`CodeTypeDoc`),
  KEY `document_4` (`NumCompartiment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `documents`
--


-- --------------------------------------------------------

--
-- Structure de la table `d_memoire`
--

CREATE TABLE IF NOT EXISTS `d_memoire` (
  `CodeDM` varchar(10) NOT NULL,
  `NomDM` varchar(30) NOT NULL,
  `PrenomDM` varchar(30) DEFAULT NULL,
  `SexeDM` varchar(10) DEFAULT NULL,
  `GradeDM` varchar(30) NOT NULL,
  `FonctDM` varchar(30) NOT NULL,
  PRIMARY KEY (`CodeDM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `d_memoire`
--


-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

CREATE TABLE IF NOT EXISTS `ecrire` (
  `CodeAuteur_CodeOuv` varchar(20) NOT NULL,
  `CodeAuteur` varchar(10) DEFAULT NULL,
  `CodeOuv` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CodeAuteur_CodeOuv`),
  KEY `ecrire_1` (`CodeAuteur`),
  KEY `ecrire_2` (`CodeOuv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecrire`
--


-- --------------------------------------------------------

--
-- Structure de la table `editer`
--

CREATE TABLE IF NOT EXISTS `editer` (
  `CodeEditeur_CodeOuv` varchar(20) NOT NULL,
  `CodeEdidteur` varchar(10) DEFAULT NULL,
  `CodeOuv` varchar(10) DEFAULT NULL,
  `AnneeEdition` int(4) DEFAULT NULL,
  PRIMARY KEY (`CodeEditeur_CodeOuv`),
  KEY `editer_1` (`CodeEdidteur`),
  KEY `editer_2` (`CodeOuv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `editer`
--


-- --------------------------------------------------------

--
-- Structure de la table `editeurs`
--

CREATE TABLE IF NOT EXISTS `editeurs` (
  `CodeEditeur` varchar(10) NOT NULL,
  `NomEditeur` varchar(30) NOT NULL,
  `PaysEditeur` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodeEditeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `editeurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

CREATE TABLE IF NOT EXISTS `enregistrer` (
  `NumLect_CodeAnneeAc` varchar(20) NOT NULL,
  `NumLect` varchar(10) DEFAULT NULL,
  `CodeAnneeAc` varchar(10) DEFAULT NULL,
  `LibStatut` varchar(50) NOT NULL,
  PRIMARY KEY (`NumLect_CodeAnneeAc`),
  KEY `enregistrer_1` (`NumLect`),
  KEY `enregistrer_2` (`CodeAnneeAc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enregistrer`
--


-- --------------------------------------------------------

--
-- Structure de la table `exemplaires`
--

CREATE TABLE IF NOT EXISTS `exemplaires` (
  `NumExp` varchar(10) NOT NULL,
  `EtatExp` varchar(30) DEFAULT NULL,
  `DateAchat` date DEFAULT NULL,
  `AnneePub` int(4) DEFAULT NULL,
  `PrixAchat` double(30,0) DEFAULT NULL,
  `CodeOuv` varchar(10) DEFAULT NULL,
  `CodeFourn` varchar(10) DEFAULT NULL,
  `NumCompartiment` datetime DEFAULT NULL,
  PRIMARY KEY (`NumExp`),
  KEY `exemplaire_1` (`CodeOuv`),
  KEY `exemplaire_2` (`CodeFourn`),
  KEY `exemplaire_3` (`NumCompartiment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `exemplaires`
--


-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `CodeFourn` varchar(10) NOT NULL,
  `NomFourn` varchar(30) NOT NULL,
  `AdresseFourn` varchar(50) DEFAULT NULL,
  `TelFourn` varchar(10) DEFAULT NULL,
  `BPFourn` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CodeFourn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fournisseurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `lecteurs`
--

CREATE TABLE IF NOT EXISTS `lecteurs` (
  `NumLect` varchar(10) NOT NULL,
  `NomLect` varchar(30) NOT NULL,
  `PrenomLect` varchar(30) DEFAULT NULL,
  `SexeLect` varchar(10) DEFAULT NULL,
  `AdresseLect` varchar(30) NOT NULL,
  `TelLect` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`NumLect`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lecteurs`
--


-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE IF NOT EXISTS `operations` (
  `CodeOp` varchar(10) NOT NULL,
  `DateDebutOp` date NOT NULL,
  `DateFinOp` date NOT NULL,
  `HeureDebutOp` time DEFAULT NULL,
  `HeureFinOp` time DEFAULT NULL,
  `ObservationOp` varchar(15) DEFAULT NULL,
  `TypeOp` varchar(20) NOT NULL,
  `NumLect` varchar(10) NOT NULL,
  `CodeAnneeAc` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CodeOp`),
  KEY `operation_1` (`NumLect`),
  KEY `operation_2` (`CodeAnneeAc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `operations`
--


-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE IF NOT EXISTS `ouvrages` (
  `CodeOuv` varchar(10) NOT NULL,
  `TitreOuv` varchar(50) NOT NULL,
  `ResumeOuv` varchar(500) DEFAULT NULL,
  `NbrePageOuv` int(5) DEFAULT NULL,
  `CodeCatOuv` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CodeOuv`),
  KEY `ouvrage_1` (`CodeCatOuv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ouvrages`
--


-- --------------------------------------------------------

--
-- Structure de la table `rayons`
--

CREATE TABLE IF NOT EXISTS `rayons` (
  `CodeRayon` varchar(10) NOT NULL,
  `LibRayon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodeRayon`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rayons`
--


-- --------------------------------------------------------

--
-- Structure de la table `type_doc`
--

CREATE TABLE IF NOT EXISTS `type_doc` (
  `CodeTypeDoc` varchar(10) NOT NULL,
  `LibTypeDoc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodeTypeDoc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_doc`
--

