-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mrz 2018 um 17:29
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr14_cornelia_steinkelner_bigevents`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`address_id`, `location`, `street`, `postal_code`, `city`) VALUES
(1, 'Albertina', 'Albertinaplatz 1', 1010, 'Wien'),
(2, 'Musikverein', 'Musikvereinsplatz 1 ', 1010, 'Wien'),
(3, 'Burgtheater', 'Universitätsring 2 ', 1010, 'Wien'),
(4, 'Vienna Stadthalle', 'Roland-Rainer-Platz 1 ', 1150, 'Wien'),
(5, 'Rathausplatz', 'Rathausplatz', 1010, 'Wien'),
(6, 'Pannonia Fields', 'Grenzlandhof', 2425, 'Nickeldorf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `fk_date_id` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(300) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_phonenumber` int(15) DEFAULT NULL,
  `fk_address_id` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `fk_event_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `fk_date_id`, `description`, `image`, `capacity`, `contact_email`, `contact_phonenumber`, `fk_address_id`, `url`, `fk_event_type_id`) VALUES
(1, 'The Art of Viennese Watercolour', 1, 'Transparent lightness, brilliant colours, and a generally atmospheric impression are the special qualities of 19th-century Viennese watercolour painting. Virtuosic city views and landscapes, detail-rich portraits, genre paintings, and floral works comprise the rich motivic repertoire featured in this glorious blossoming of Austrian art.', 'https://www.albertina.at/site/assets/files/4825/wr_aquarell_cover.720x0.jpg', NULL, 'info@albertina.at', 431534830, 1, 'https://www.albertina.at/ausstellungen/wiener_aquarell/', 1),
(2, 'All Japan Youth Orchestra', 2, 'Dirigent: Yoshinori Kawachi\r\n\r\nChristoph Zimper, Klarinette\r\n\r\nWolfgang Amadeus Mozart: Ouvertüre zur Oper „Die Zauberflöte“, KV 620,\r\n  Konzert für Klarinette und Orchester A-Dur, KV 622\r\nJohann Strauß Sohn: Kaiser-Walzer, op. 437 \r\nJohannes Brahms: Ungarischer Tanz Nr. 1 g-Moll, Ungarischer Tanz Nr. 5 fis-Moll', 'musikverein.jpg', 600, 'tickets@musikverein.at', 431505819, 2, 'www.musikverein.at', 2),
(3, 'Der Diener zweier Herren', 3, 'Zwei Liebespaare, die das Schicksal auseinandergerissen hat, müssen sich wiederfinden. Beatrice, eine junge Frau aus Turin, streift dafür Hosen über und mischt bewaffnet die Männerwelt Venedigs auf. Truffaldino, ein hungerleidender Gelegenheitsdiener, sucht sich angesichts seiner prekären Lage einen zweiten Herrn. Und im Hintergrund machen die ehrbaren Kaufmänner Geschäfte, undurchsichtiger als das Wasser in der Lagune.', 'diener.jpg', 400, NULL, 1514444140, 3, 'www.burgtheater.at', 5),
(4, 'Disney in Concert: Wonderful Worlds', 4, 'Eine riesige Leinwand zeigt erneut die entsprechenden Filmausschnitte, die mit der Musik des Hollywood-Sound-Orchesters besonders untermalt werden. Die „Disney in Concert“-Reihe ist ein einzigartiges Live-Erlebnis, bei dem die schönsten Disney Filme, stimmgewaltige Topsolisten und ein herausragendes Symphonieorchester zusammenkommen und für ein ganz besonderes Konzerterlebnis sorgen.', 'https://www.semmel.de/_wpframe_custom/gallery/files/disney-in-concert_0712170328/t_01_Disney-In-Concert_Wonderful-Worlds_Grafik-152928-07122017.jpg', 10500, 'service@stadthalle.com', 17999979, 4, 'www.stadthalle.com', 2),
(5, 'movie festival vienna', 5, 'All visitors are invited to choose a festival. Dance, Pop and Jazz in a star cast. Adapted to the high requirements, the technical implementation with a 300 square meter laser and a brilliant sound system a sound and picture experience at the highest level.', 'festival.jpg', 20000, 'filmfestival@wien-event.at', 431319820, 5, 'http://filmfestival-rathausplatz.at/', 4),
(6, 'Nova Rock', 6, 'its a rock festival. that\'s it', 'nova.jpeg', 55000, ' office@barracudamusic.at', 262665601, 6, 'http://www.novarock.at/', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event_date`
--

CREATE TABLE `event_date` (
  `date_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `event_date`
--

INSERT INTO `event_date` (`date_id`, `start_date`, `end_date`) VALUES
(1, '2018-02-16 09:00:00', '2018-03-13 20:00:00'),
(2, '2018-03-29 05:30:00', '0000-00-00 00:00:00'),
(3, '2018-03-29 18:00:00', '2018-04-27 18:00:00'),
(4, '2018-12-22 18:30:00', '0000-00-00 00:00:00'),
(5, '2018-06-30 15:00:00', '2018-09-01 22:00:00'),
(6, '2018-06-04 22:00:00', '2018-06-16 22:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event_type`
--

CREATE TABLE `event_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `event_type`
--

INSERT INTO `event_type` (`type_id`, `type`) VALUES
(1, 'art'),
(2, 'music'),
(3, 'sport'),
(4, 'movie'),
(5, 'theater');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_date_id` (`fk_date_id`),
  ADD KEY `fk_address_id` (`fk_address_id`),
  ADD KEY `fk_event_type_id` (`fk_event_type_id`);

--
-- Indizes für die Tabelle `event_date`
--
ALTER TABLE `event_date`
  ADD PRIMARY KEY (`date_id`);

--
-- Indizes für die Tabelle `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`fk_date_id`) REFERENCES `event_date` (`date_id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`fk_address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`fk_event_type_id`) REFERENCES `event_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
