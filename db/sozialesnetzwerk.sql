-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Nov 2021 um 16:31
-- Server-Version: 10.1.34-MariaDB
-- PHP-Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `sozialesnetzwerk`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antworten`
--

CREATE TABLE `antworten` (
  `id_antwort` int(11) NOT NULL,
  `id_fragesteller` int(11) NOT NULL,
  `id_antwortgeber` int(11) NOT NULL,
  `id_frage` int(11) NOT NULL,
  `antwort` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE `fragen` (
  `id_frage` int(11) NOT NULL,
  `bild` varchar(50) NOT NULL,
  `zusatzinfos` longtext NOT NULL,
  `id_mitglied` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitglieder`
--

CREATE TABLE `mitglieder` (
  `id_mitglied` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fragen` int(11) NOT NULL,
  `antworten` int(11) NOT NULL,
  `zusatzinfos` longtext NOT NULL,
  `rolle` enum('Admin','Mitglied') NOT NULL,
  `userid` varchar(20) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `beitritt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `letzterlogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `antworten`
--
ALTER TABLE `antworten`
  ADD PRIMARY KEY (`id_antwort`);

--
-- Indizes für die Tabelle `fragen`
--
ALTER TABLE `fragen`
  ADD PRIMARY KEY (`id_frage`);

--
-- Indizes für die Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD PRIMARY KEY (`id_mitglied`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `antworten`
--
ALTER TABLE `antworten`
  MODIFY `id_antwort` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `fragen`
--
ALTER TABLE `fragen`
  MODIFY `id_frage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `id_mitglied` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
