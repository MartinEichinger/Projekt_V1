-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Nov 2021 um 11:01
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
-- Daten für Tabelle `mitglieder`
--

INSERT INTO `mitglieder` (`id_mitglied`, `name`, `vorname`, `email`, `fragen`, `antworten`, `zusatzinfos`, `rolle`, `userid`, `pw`, `beitritt`, `letzterlogin`) VALUES
(8, 'Eichinger', 'Monika', 'moeichinger@mail.net', 0, 0, '', 'Mitglied', 'Meichinger03', 'b236b2a0ad820c64bcb6b9f077b479d0', '2021-11-20 10:01:10', '0000-00-00 00:00:00');

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `id_mitglied` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
