-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Nov 2021 um 22:16
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kingmaker_api`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kingdoms`
--

CREATE TABLE `kingdoms` (
  `l_id` bigint(20) NOT NULL,
  `vc_name` varchar(255) NOT NULL,
  `i_bp` int(11) NOT NULL,
  `i_unrest` int(11) NOT NULL,
  `i_districts` int(11) NOT NULL,
  `i_hexfields` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kingdoms`
--

INSERT INTO `kingdoms` (`l_id`, `vc_name`, `i_bp`, `i_unrest`, `i_districts`, `i_hexfields`) VALUES
(1, 'Mwangisien', 29, 2, 5, 0),
(5, 'Rußschuppen', 29, 10, 1, 0),
(8, 'Testkönigreich', 5, 2, 5, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kingdom_round_log`
--

CREATE TABLE `kingdom_round_log` (
  `l_id` bigint(20) NOT NULL,
  `l_kingdom_id` bigint(20) NOT NULL,
  `i_year` int(11) NOT NULL,
  `i_month` int(11) NOT NULL,
  `i_phase` int(11) NOT NULL,
  `i_step` int(11) NOT NULL,
  `i_bp_changes` int(11) NOT NULL DEFAULT 0,
  `i_unrest_changes` int(11) NOT NULL DEFAULT 0,
  `i_district_changes` int(11) NOT NULL DEFAULT 0,
  `i_hexfield_changes` int(11) NOT NULL DEFAULT 0,
  `t_infos` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kingdoms`
--
ALTER TABLE `kingdoms`
  ADD PRIMARY KEY (`l_id`);

--
-- Indizes für die Tabelle `kingdom_round_log`
--
ALTER TABLE `kingdom_round_log`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `fk_kingdom_id_kingdom_round_log_kingdoms` (`l_kingdom_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kingdoms`
--
ALTER TABLE `kingdoms`
  MODIFY `l_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `kingdom_round_log`
--
ALTER TABLE `kingdom_round_log`
  MODIFY `l_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `kingdom_round_log`
--
ALTER TABLE `kingdom_round_log`
  ADD CONSTRAINT `fk_kingdom_id_kingdom_round_log_kingdoms` FOREIGN KEY (`l_kingdom_id`) REFERENCES `kingdoms` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
