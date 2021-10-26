-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-nagrom.alwaysdata.net
-- Generation Time: Oct 26, 2021 at 11:57 PM
-- Server version: 10.5.11-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nagrom_boulangerie`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `num` varchar(50) NOT NULL,
  `description_commande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `nom`, `prenom`, `adresse`, `num`, `description_commande`) VALUES
(1, 'Adrien', 'Bizon', '130 derrière moi', '0763546351', 'Une fraise '),
(2, 'Aria', 'Stark', 'Dans la foret', '0845364535', 'Un loup givré'),
(3, 'Snow', 'John', 'Dans la foret aussi', '0753643524', 'Une famille '),
(4, 'Skywalker', 'Anakine', 'Dans l\'espace ', '0953425345', 'Un visage s\'il vous plaît'),
(5, 'Disney', 'Bambi', 'Dans la foret aussi', '0637489108', 'Une mère'),
(6, 'Lodbrok', 'Ragnar', 'Kattegat', '0845363747', 'Une fille');

-- --------------------------------------------------------

--
-- Table structure for table `boulangerie_user`
--

CREATE TABLE `boulangerie_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boulangerie_user`
--

INSERT INTO `boulangerie_user` (`id`, `email`, `mdp`, `id_role`) VALUES
(1, 'morgan@live.fr', '$2y$10$y4sZXpclbY6MaZiSHxi.QOXVimgyWhzUkBuZhg./qHWAz/oeaouhG', 10);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `num` varchar(50) DEFAULT NULL,
  `description_commande` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse`, `num`, `description_commande`) VALUES
(17, 'Aria', 'Stark', 'Dans la foret', '0845364535', 'Un loup givré'),
(18, 'Snow', 'John', 'Dans la foret aussi', '0753643524', 'Une famille '),
(19, 'Skywalker', 'Anakine', 'Dans l\'espace ', '0953425345', 'Un visage s\'il vous plaît'),
(21, 'Lodbrok', 'Ragnar', 'Kattegat', '0845363747', 'Une fille');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `nom_gateau` varchar(50) NOT NULL,
  `qts_total` smallint(6) NOT NULL,
  `qts_restant` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `nom_gateau`, `qts_total`, `qts_restant`) VALUES
(1, '[foret noir]', 231, 100),
(2, '[fraisier]', 381, 87);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boulangerie_user`
--
ALTER TABLE `boulangerie_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `boulangerie_user`
--
ALTER TABLE `boulangerie_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
