-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Nov 2021 um 05:42
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

﻿--
-- Datenbank: `kingmaker_api`
--
﻿CREATE DATABASE IF NOT EXISTS `kingmaker_api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
﻿USE `kingmaker_api`;
﻿
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `base_values`
--

CREATE TABLE `base_values` (
  `l_id` bigint(20) NOT NULL,
  `vc_kingdom_name` varchar(255) NOT NULL,
  `i_bp` int(11) NOT NULL,
  `i_unrest` int(11) NOT NULL,
  `i_districts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
﻿
--
-- Daten für Tabelle `base_values`
--

﻿INSERT INTO `base_values` (`l_id`, `vc_kingdom_name`, `i_bp`, `i_unrest`, `i_districts`) VALUES
(1, 'Mwangisien', 29, 2, 5)﻿,
(5, 'Rußschuppen', 29, 10, 1)﻿,
(8, 'Testkönigreich', 5, 2, 5)﻿;
﻿
--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `base_values`
--
ALTER TABLE `base_values`
  ADD PRIMARY KEY (`l_id`);
﻿
--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `base_values`
--
ALTER TABLE `base_values`
  MODIFY `l_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
﻿COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
