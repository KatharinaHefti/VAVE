-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 25. Sep 2020 um 12:36
-- Server-Version: 5.7.26
-- PHP-Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `VAVE_Sports`
--
CREATE DATABASE IF NOT EXISTS `VAVE_Sports` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `VAVE_Sports`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `about`
--

CREATE TABLE `about` (
  `id` int(11) UNSIGNED NOT NULL,
  `chapter` varchar(20) DEFAULT NULL,
  `titel` varchar(60) DEFAULT NULL,
  `text` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `about`
--

INSERT INTO `about` (`id`, `chapter`, `titel`, `text`) VALUES
(1, 'About', 'Loerum ipsum dolor sit amen ipsum dolor sit.', 'Try to finde one sentence or two to describe the concept of your page. Sports and camps describe a mood to make people feel whatever bla bla.'),
(2, 'Gallery', 'Something about your Gallery\nLoerum ipsum dolor sit.', 'Try to finde one sentence or two to describe the concept of your page. Sports and camps describe a mood to make people feel whatever bla bla.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`id`, `name`, `street`, `city`, `email`, `phone`) VALUES
(1, 'Valeria Verzar', 'Badenerstrasse 68', 'CH-8004 Zürich', 'valeria@vavesports.ch', '+41 79 208 78 08');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventParticipant`
--

CREATE TABLE `eventParticipant` (
  `id` int(11) UNSIGNED NOT NULL,
  `event` varchar(255) DEFAULT NULL,
  `participantName` varchar(255) DEFAULT NULL,
  `participantFamilyname` varchar(255) DEFAULT NULL,
  `participantAge` int(11) DEFAULT NULL,
  `participantEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `eventParticipant`
--

INSERT INTO `eventParticipant` (`id`, `event`, `participantName`, `participantFamilyname`, `participantAge`, `participantEmail`) VALUES
(1, NULL, 'yoyo', 'lu', 18, 'yoyo@lu.ch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(50) UNSIGNED NOT NULL,
  `eventName` varchar(50) DEFAULT NULL,
  `eventLead` varchar(255) DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `eventTime` time DEFAULT NULL,
  `eventDuration` int(11) DEFAULT NULL,
  `eventPlace` varchar(50) DEFAULT NULL,
  `eventParticipants` int(255) DEFAULT NULL,
  `eventPrice` int(255) DEFAULT NULL,
  `eventDescription` varchar(255) DEFAULT NULL,
  `eventTicketsLeft` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `eventName`, `eventLead`, `eventDate`, `eventTime`, `eventDuration`, `eventPlace`, `eventParticipants`, `eventPrice`, `eventDescription`, `eventTicketsLeft`) VALUES
(1, 'Next Event Promo headline loerum ipsum donor', 'Lead text for your event. Loerum Epsom dollar sit amen. Lead text for your event. Loerum Epsom dollar sit amen. Lead text for your event. Loerum Epsom dollar sit amen. Lead text for your event. Loerum Epsom dollar sit amen.', '2028-10-20', '13:00:00', 1, '8003 Zürich, Street 33', 10, 30, 'Get your tickets before it’s too late. Loerum ipsum dolor sit amen.  Loerum ipsum dolor sit amen.  Loerum ipsum dolor sit ame ipsum dolor sit amen. ', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `security`
--

CREATE TABLE `security` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `security`
--

INSERT INTO `security` (`id`, `userID`, `identifier`, `token`, `created_at`) VALUES
(1, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(2, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(3, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(4, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(5, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(6, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(7, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(8, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(9, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(10, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(11, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(12, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(13, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(14, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(15, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(16, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(17, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(18, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(19, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(20, 74, NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `familyname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `familyname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Valeria', 'Verzar', 'valeria@vavesports.ch', '$2y$10$teIXcpN3JoZV0SHiSzF8deTh4.VO2l6bDkUPJbqiy5onxCes6TY5m', NULL, NULL),
(72, 'lu', 'la', 'lu@la.ch', '$2y$10$K7arFPne4ov.V3Tidhja1.gFcWNrNWBJc/xHy34pbVn8bsDXZcwU.', '2020-09-19 13:25:14', NULL),
(74, 'Katharina', 'Hefti', 'k_hefti@icloud.com', '$2y$10$rshFzadt/jvTdDSGE/0JN..xDOvBaSAyjX1tDwXCOubaBQlZ/oTK.', '2020-09-19 18:46:08', NULL),
(75, 'lola', 'loo', 'lola@loo.ch', '$2y$10$uiTCLertm7MpCU6z0ranSOJ1iH.sNIMdvx1PmvPE83LNbidg.DbE6', '2020-09-19 18:50:54', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `eventParticipant`
--
ALTER TABLE `eventParticipant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventName` (`eventName`);

--
-- Indizes für die Tabelle `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `eventParticipant`
--
ALTER TABLE `eventParticipant`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `security`
--
ALTER TABLE `security`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `eventParticipant`
--
ALTER TABLE `eventParticipant`
  ADD CONSTRAINT `eventparticipant_ibfk_1` FOREIGN KEY (`event`) REFERENCES `events` (`eventName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
