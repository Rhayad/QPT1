-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 05. Juli 2010 um 07:20
-- Server Version: 5.1.44
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `lexcorii`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `aid` int(10) NOT NULL,
  `gid` int(5) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `beschreibung` text NOT NULL,
  `preis` double NOT NULL,
  `farbe` varchar(20) NOT NULL,
  `bild1` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`aid`, `gid`, `name`, `beschreibung`, `preis`, `farbe`, `bild1`) VALUES
(100001, 1, 'Farbe', 'Fiebing`s Oil Dye,\r\n\r\nInhalt 118 ml', 6.5, 'schwarz', 'leer'),
(100002, 1, 'Farbe', 'Fiebing`s Oil Dye, \r\n\r\nInhalt 118 ml', 6.5, 'grün', 'leer'),
(100003, 1, 'Farbe', 'Fiebing`s Oil Dye, \r\n\r\nInhalt 118 ml', 6.5, 'blau', 'leer'),
(100004, 1, 'Farbe', 'Fiebing`s Oil Dye, \r\n\r\nInhalt 118 ml', 6.5, 'rot', 'leer'),
(100005, 1, 'Farbe', 'Fiebing`s Oil Dye, \r\n\r\nInhalt 118 ml, \r\n\r\nAchtung: kein Acryl Resolene nötig', 6.5, 'lila', 'leer'),
(100006, 1, 'Farbe', 'Acryl Resolene, \r\n\r\nInhalt 118 ml\r\n\r\nLederfinish zum versiegeln der Oberfläche', 6.5, 'farblos', 'leer'),
(100050, 2, 'Armschiene 5teilig', 'Die Armschiene kann individuell auf die Unterarmlänge angepasst werden.', 39, '', 'arm5teilig'),
(100051, 2, 'Armschiene 5teilig, doppelt', '2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich !', 79, '', 'leer'),
(100052, 2, 'Armschiene 2farbig', 'Die Armschiene kann individuell auf die Unterarmlänge angepasst werden.', 39, '', 'arm2farbig'),
(100070, 4, 'Mieder 7teilig', '7teiliges Mieder, welches durch die seitlichen Schnürungen individuell angepasst werden kann', 69, '', 'mieder'),
(100071, 4, 'Mieder 7teilig, doppelt', '7teiliges Mieder, welches durch die seitlichen Schnürungen individuell angepasst werden kann. \r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich !', 119, '', 'leer'),
(100072, 4, 'Mieder 7teilig, 2farbig', '7teiliges Mieder, welches durch die seitlichen Schnürungen individuell angepasst werden kann', 69, '', 'mieder2farbig'),
(100090, 5, 'Schulterplatte, normal', 'normale Schulterplatten mit einfachen Riemen unter den Armen', 55, '', 'schulterplatte'),
(100091, 5, 'Schulterplatte, normal, doppelt', 'doppelte Schulterplatten mit einfachen Riemen unter den Armen.\r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich !', 119, '', 'leer'),
(100092, 5, 'Schulterplatte, 2farbig', '2farbige, durch Schnürung verbundene Schulterplatte mit einfachen Riemen unter den Armen', 69, '', 'schulterplatte2farbig'),
(100110, 6, 'Torsorüstung 5teilig', 'leichte Torsorüstung mit individueller Schnürung an der Seite', 119, '', 'torso'),
(100130, 7, 'Halsband, einfach', 'einfaches Halsband, durch Schürung hinten individuell einstellbar', 14, '', 'halsband'),
(100131, 7, 'Halsband, doppelt', 'doppeltes Halsband, durch Schnürung hinten individuell einstellbar.\r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich !', 22, '', 'leer'),
(100150, 8, 'Hüftgürtel, einfach', 'individuell einstellbarer Hüftgürtel, durch seitliche Riemen können Gürteltasche, Trinkhorn- oder Schwerthalter befestigt werden', 69, '', 'guertel'),
(100151, 8, 'Hüftgürtel, 2farbig', 'individuell einstellbarer Hüftgürtel, durch seitliche Riemen können Gürteltasche, Trinkhorn- oder Schwerthalter befestigt werden', 59, '', 'guertel2farbig'),
(100170, 9, 'Schwerthalter, einfach', 'Schwerthalter kann individuell für Rechts- oder Linkshänder angefertigt werden ', 18, '', 'schwerthalter'),
(100171, 9, 'Schwerthalter, doppelt', 'Schwerthalter kann individuell für Rechts- oder Linkshänder angefertigt werden.\r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich ! \r\n\r\n2 Lederschichten, Lederstärke 8mm\r\n\r\nAchtung: Keine Verzierung und keine Ziernieten möglich !', 27, '', 'leer'),
(100173, 9, 'Schwerthalter, 2farbig', 'Schwerthalter kann individuell für Rechts- oder Linkshänder angefertigt werden ', 22, '', 'schwerthalter2farbig'),
(100174, 9, 'Wurfdolchhalter, 3er', 'Wurfdolchhalter für 3 Wurfdolche, Gürtelbreite max 4cm', 22, '', 'leer'),
(100175, 9, 'Köcher', 'Pfeilköcher zum Umschnallen', 0, '', 'leer'),
(100190, 3, 'Trinkhornhalter, normal', 'für normale Trinkhörner bis max 0,4 Liter', 12, '', 'trinkhornhalter'),
(100191, 3, 'Trinkhornhalter, doppelt', 'für normale Trinkhörner bis max 0,4 Liter.\r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich !\r\n\r\n2 Lederschichten, Lederstärke 8mm\r\n\r\nAchtung: Keine Verzierung und keine Ziernieten möglich !', 16, '', 'leer'),
(100192, 3, 'Trinkhornhalter, 2farbig', 'für normale Trinkhörner bis max 0,4 Liter', 14, '', 'leer'),
(100193, 3, 'Haarspange, normal', 'Haarspange mit Holzstab zum durchschieben\r\n\r\n', 11, '', 'haarspange'),
(100194, 3, 'Haarspange, doppelt', 'Haarspange mit Holzstab zum durchschieben.\r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich !', 11, '', 'leer'),
(100195, 3, 'Haarspange, 2farbig', 'Haarspange mit Holzstab zum durchschieben', 11, '', 'haarspange2farbig'),
(100196, 3, 'Gürteltasche, einfach', 'einfache Gürteltasche für Gürtel bis 4cm Breite', 37, '', 'guerteltasche'),
(100197, 3, 'Buch, A5', 'Ledergebundenes Buch mit echtem Büttenpapier', 0, '', 'bucha5'),
(100198, 3, 'Buchhalter A5', 'passender Gürtelhalter für das A5 Buch für Gürtel bis 4cm Breite', 0, '', 'buchhaltera5'),
(100250, 10, 'Schulterplatte, normal, 5teilig', 'bestehend aus:\r\n\r\nSchulterplatten\r\nArmschienen 5teilig\r\nMieder 7teilig\r\nSchwerthalter\r\nTrinkhornhalter', 179, '', 'leer'),
(100251, 10, 'Schulterplatte, doppelt, 5teilig', 'bestehend aus:\r\n\r\nSchulterplatten,\r\nArmschienen 5teilig,\r\nMieder 7teilig,\r\nSchwerthalter und\r\nTrinkhornhalter!\r\n\r\n 2 Lederschichten, Lederstärke 8mm.\r\n\r\n ACHTUNG: Keine Verzierung und keine Ziernieten möglich! ', 339, '', 'leer'),
(100252, 10, 'Torsorüstung 5teilig, 5teilig', 'bestehend aus:\r\n\r\nTorsorüstung 5teilig\r\nArmschienen 5teilig\r\nHüftgürtel, einfach\r\nSchwerthalter\r\nTrinkhornhalter', 239, '', 'leer'),
(100300, 11, 'keltischer Knoten', '35mm', 2.1, 'altsilber', 'nietenknotensilber'),
(100301, 11, 'Blume', '35mm', 2.1, 'altsilber', 'nietenblumesilber'),
(100302, 11, 'Löwe', 'ca 36mm', 1.8, 'altsilber', 'nietenloewesilber'),
(100303, 11, 'Geflecht', '38mm', 2.1, 'altsilber', 'nietengeflechtsilber'),
(100304, 11, 'Rosette', '22mm', 0.4, 'altsilber', 'nietenrosettesilber'),
(100305, 11, 'Ornament', '79 x 70 mm', 3.6, 'altsilber', 'leer'),
(100306, 11, 'Wikinger', '67mm', 4.1, 'altsilber', 'leer'),
(100307, 11, 'keltischer Knoten', '35mm', 2.1, 'altmessing', 'nietenknotenmessing'),
(100308, 11, 'Blume', '35mm', 2.1, 'altmessing', 'nietenblumemessing'),
(100309, 11, 'Löwe', '36mm', 1.8, 'altmessing', 'nietenloewemessing'),
(100310, 11, 'Geflecht', '38mm', 2.1, 'altmessing', 'leer'),
(100311, 11, 'Rosette', '22mm', 0.4, 'altmessing', 'leer'),
(100312, 11, 'Ornament', '79 x 69 mm', 3.6, 'altmessing', 'leer'),
(100313, 11, 'Wikinger', '67mm', 4.1, 'altmessing', 'leer'),
(100350, 12, 'Armschiene altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n2 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n8 Rosetten\r\n', 7, 'altsilber', 'leer'),
(100351, 12, 'Nietenset Armschiene altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n2 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n8 Rosetten', 7, 'altmessing', 'leer'),
(100352, 12, 'Mieder altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n5 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n10 Rosetten', 13, 'altsilber', 'leer'),
(100353, 12, 'Mieder altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n5 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n10 Rosetten', 13, 'altmessing', 'leer'),
(100354, 12, 'Nietenset Schulterplatte altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n2 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n10 Rosetten', 7.5, 'altsilber', 'leer'),
(100355, 12, 'Schulterplatte altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n2 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n10 Rosetten', 7.5, 'altmessing', 'leer'),
(100356, 12, 'Torsorüstung altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n2 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n18 Rosetten', 11, 'altsilber', 'leer'),
(100357, 12, 'Torsorüstung altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n2 Nieten (keltischer Knoten, Löwe, Blume, Schild),\r\n18 Rosetten', 11, 'altmessing', 'leer'),
(100358, 12, 'Trinkhornhalter altsilber', '2 Rosetten-Nieten', 0.8, 'altsilber', 'leer'),
(100359, 12, 'Trinkhornhalter altmessing', '2 Rosetten-Nieten', 0.8, 'altmessing', 'leer'),
(100360, 12, 'Schwerthalter altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n1 Niete (keltischer Knoten, Löwe, Blume, Schild),\r\n2 Rosetten\r\n', 2.7, 'altsilber', 'leer'),
(100361, 12, 'Schwerthalter altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n1 Niete (keltischer Knoten, Löwe, Blume, Schild),\r\n2 Rosetten', 2.7, 'altmessing', 'leer'),
(100362, 12, 'Wurfdolchhalter altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n3 Nieten (keltischer Knoten, Löwe, Blume, Schild)\r\n', 6, 'altsilber', 'leer'),
(100363, 12, 'Wurfdolchhalter altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n3 Nieten (keltischer Knoten, Löwe, Blume, Schild)\r\n', 6, 'altmessing', 'leer'),
(100364, 12, 'Hüftgürtel altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n4 Nieten (keltischer Knoten, Löwe, Blume, Schild)\r\n', 8, 'altsilber', 'leer'),
(100365, 12, 'Hüftgürtel altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n4 Nieten (keltischer Knoten, Löwe, Blume, Schild)\r\n', 8, 'altmessing', 'leer'),
(100366, 12, 'Halsband altsilber', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n1 Niete (keltischer Knoten, Löwe, Blume, Schild)', 2, 'altsilber', 'leer'),
(100367, 12, 'Halsband altmessing', 'Nietenset individuell zusammenstellbar,\r\n\r\nim Set sind enthalten:\r\n\r\n1 Niete (keltischer Knoten, Löwe, Blume, Schild)', 2, 'altmessing', 'leer'),
(100400, 13, 'Blankleder', 'Handgefärbtes Leder aus Norddeutschland', 0, 'schwarz', 'artikelschwarz'),
(100401, 13, 'Blankleder', 'Handgefärbtes Leder aus Norddeutschland', 0, 'rot', 'artikelrot'),
(100402, 13, 'Blankleder', 'Handgefärbtes Leder aus Norddeutschland', 0, 'braun', 'artikelbraun'),
(100403, 13, 'Blankleder', 'Handgefärbtes Leder aus Norddeutschland', 0, 'natur', 'artikelnatur'),
(100404, 13, 'Blankleder', 'Handgefärbtes Leder aus Norddeutschland\r\n\r\nDer dunkle Naturton kommt duch mehrfaches Fetten des Leders. Die Färbung ist recht unterschiedlich, aber durch Biegen des Leders wird der Farbton heller. Toller Effekt !!', 0, 'naturbraun', 'artikelnaturbraun'),
(100405, 13, 'Blankleder', 'Naturleder aus Norddeutschland\r\n\r\nDas Leder wird nachträglich gefärbt, wodurch leichte Unregelmäßigkeiten in der Färbung entstehen können.', 0, 'selbstgefärbt lila', 'artikelselbstlila'),
(100406, 13, 'Blankleder', 'Naturleder aus Norddeutschland\r\n\r\nDas Leder wird nachträglich gefärbt, wodurch leichte Unregelmäßigkeiten in der Färbung entstehen können.', 0, 'selbstgefärbt blau', 'artikelselbstblau'),
(100407, 13, 'Blankleder', 'Naturleder aus Norddeutschland\r\n\r\nDas Leder wird nachträglich gefärbt, wodurch leichte Unregelmäßigkeiten in der Färbung entstehen können.', 0, 'selbstgefärbt grün', 'artikelselbstgruen'),
(100408, 13, 'Blankleder', 'Naturleder aus Norddeutschland\r\n\r\nDas Leder wird nachträglich gefärbt, wodurch leichte Unregelmäßigkeiten in der Färbung entstehen können.', 0, 'selbstgefärbt rot', 'artikelselbstrot'),
(100450, 14, 'Haarspange einfache Rille', 'einfache Rille', 0, '', 'rilleeinfach'),
(100451, 14, 'Haarspange doppelte Rille', 'doppelte Rille', 0, '', 'rilledoppelt'),
(100452, 14, 'Trinkhornhalter einfache Rille', 'einfache Rille', 0, '', 'rilleeinfach'),
(100453, 14, 'Trinkhornhalter doppelte Rille', 'doppelte Rille', 0, '', 'rilledoppelt'),
(100454, 14, 'Schwerthalter einfache Rille', 'einfache Rille', 0.5, '', 'rilleeinfach'),
(100455, 14, 'Schwerthalter doppelte Rille', 'doppelte Rille', 0.7, '', 'rilledoppelt'),
(100456, 14, 'Wurfdolchhalter einfache Rille', 'einfache Rille', 1, '', 'rilleeinfach'),
(100457, 14, 'Wurfdolchhalter doppelte Rille', 'doppelte Rille', 1.5, '', 'rilledoppelt'),
(100458, 14, 'Mieder einfache Rille', 'einfache Rille', 5, '', 'rilleeinfach'),
(100459, 14, 'Mieder doppelte Rille', 'doppelte Rille', 7.5, '', 'rilledoppelt'),
(100460, 14, 'Armschiene einfache Rille', 'einfache Rille', 5, '', 'rilleeinfach'),
(100461, 14, 'Armschiene doppelte Rille', 'doppelte Rille', 7.5, '', 'rilledoppelt'),
(100462, 14, 'Schulterplatte einfache Rille', 'einfache Rille', 7.5, '', 'rilleeinfach'),
(100463, 14, 'Schulterplatte doppelte Rille', 'doppelte Rille', 11, '', 'rilledoppelt'),
(100464, 14, 'Torsorüstung einfache Rille', 'einfache Rille', 10, '', 'rilleeinfach'),
(100465, 14, 'Torsorüstung doppelte Rille', 'doppelte Rille', 15, '', 'rilledoppelt'),
(100466, 14, 'Hüftgürtel einfache Rille', 'einfache Rille', 7, '', 'rilleeinfach'),
(100467, 14, 'Hüftgürtel doppelte Rille', 'doppelte Rille', 11, '', 'rilledoppelt'),
(100468, 14, 'Halsband einfache Rille', 'einfache Rille', 0, '', 'rilleeinfach'),
(100469, 14, 'Halsband doppelte Rille', 'doppelte Rille', 0, '', 'rilledoppelt');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikelgruppen`
--

CREATE TABLE IF NOT EXISTS `artikelgruppen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gruppenname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Daten für Tabelle `artikelgruppen`
--

INSERT INTO `artikelgruppen` (`id`, `gruppenname`) VALUES
(1, 'Farbe'),
(2, 'Armschiene'),
(3, 'Zubehör'),
(4, 'Mieder'),
(5, 'Schulterplatte'),
(6, 'Torso'),
(7, 'Halsband'),
(8, 'Gürtel'),
(9, 'Waffenhalter'),
(10, 'Rüstungsset'),
(11, 'Nieten'),
(12, 'Nietenset'),
(13, 'Leder'),
(14, 'Verzierung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE IF NOT EXISTS `bestellungen` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `lid` int(11) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `lid` (`lid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`bid`, `username`, `lid`) VALUES
(21, 'Hansmeier', 11),
(22, 'Hansmeier', 14),
(23, 'Rhayad', 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE IF NOT EXISTS `kunden` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `isfemale` tinyint(1) DEFAULT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `plz` int(11) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gebdatum` date DEFAULT NULL,
  `telefon` varchar(30) DEFAULT NULL,
  `land` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `kid` (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100006 ;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`kid`, `username`, `pass`, `isfemale`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `email`, `gebdatum`, `telefon`, `land`) VALUES
(100005, 'Hansmeier', 'superdepp', 0, 'Hans', 'Wurst', 'Tollstr. 10', 5023, 'Darmstadt', 'traenen@rhayad.de', '0000-00-00', '', 'Österreich'),
(100000, 'Rhayad', 'Death1!1', 0, 'Marcus', 'Kauth', 'Sperlingweg 23', 5023, 'Salzburg', 'traenen@rhayad.de', '1978-02-06', '00436507284666', 'Österreich'),
(100001, 'Sylenja', 'Death1!1', 0, 'Ines', 'Tschanek', 'Sperlingweg 23', 5023, 'Salzburg', 'ines@kpunktwerk.com', '1980-10-03', '00436506356779', 'Austria');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferadressen`
--

CREATE TABLE IF NOT EXISTS `lieferadressen` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(100) NOT NULL,
  `nachname` varchar(100) NOT NULL,
  `strasse` varchar(100) NOT NULL,
  `plz` int(11) NOT NULL,
  `ort` varchar(100) NOT NULL,
  `land` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `lieferadressen`
--

INSERT INTO `lieferadressen` (`lid`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `land`, `username`) VALUES
(11, 'Hans', 'Wurst', 'Tollstr. 10', 5023, 'Salzburg', 'Österreich', 'Hansmeier'),
(14, 'Hans', 'Wurst', 'Tollstr. 10', 5023, 'Darmstadt', 'Österreich', 'Hansmeier'),
(15, 'Marcus', 'Kauth', 'Sperlingweg 23', 5023, 'Salzburg', 'Österreich', 'Rhayad');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `merklisten`
--

CREATE TABLE IF NOT EXISTS `merklisten` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `artikel` varchar(100) NOT NULL,
  `zusatz1` varchar(100) NOT NULL,
  `zusatz2` varchar(100) NOT NULL,
  `zusatz3` varchar(100) DEFAULT NULL,
  `zusatz4` varchar(100) DEFAULT NULL,
  `zusatz5` varchar(100) DEFAULT NULL,
  `preis` double NOT NULL,
  `bild` varchar(100) DEFAULT NULL,
  `datum` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Daten für Tabelle `merklisten`
--

INSERT INTO `merklisten` (`mid`, `username`, `artikel`, `zusatz1`, `zusatz2`, `zusatz3`, `zusatz4`, `zusatz5`, `preis`, `bild`, `datum`) VALUES
(70, 'Rhayad', 'Schulterplatte, 2farbig', 'schwarz', 'schwarz', 'keine Nieten', 'keine Nieten', 'keine Verzierung', 69, 'schulterplatte2farbig', '9.6.2010'),
(66, 'Rhayad', 'Armschiene 5teilig', 'schwarz', 'keine 2. Farbe', 'altmessing', 'keltischer Knoten', 'Verzierung Armschiene doppelte Rille', 53.5, 'arm5teilig', '9.6.2010'),
(71, 'Rhayad', 'Mieder 7teilig', 'braun', 'keine 2. Farbe', 'keine Nieten', 'keine Nieten', 'Verzierung Mieder einfache Rille', 74, 'mieder', '9.6.2010');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorb`
--

CREATE TABLE IF NOT EXISTS `warenkorb` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `artikel` varchar(100) NOT NULL,
  `zusatz1` varchar(100) NOT NULL,
  `zusatz2` varchar(100) NOT NULL,
  `zusatz3` varchar(100) NOT NULL,
  `zusatz4` varchar(100) NOT NULL,
  `zusatz5` varchar(100) NOT NULL,
  `preis` double NOT NULL,
  `bild` varchar(50) NOT NULL,
  `bestelldatum` varchar(50) NOT NULL,
  `bezahlart` varchar(50) NOT NULL,
  `bezahlt` tinyint(1) NOT NULL DEFAULT '0',
  `versendet` tinyint(1) NOT NULL DEFAULT '0',
  `versanddatum` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`wid`),
  KEY `username` (`username`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `warenkorb`
--

INSERT INTO `warenkorb` (`wid`, `bid`, `username`, `artikel`, `zusatz1`, `zusatz2`, `zusatz3`, `zusatz4`, `zusatz5`, `preis`, `bild`, `bestelldatum`, `bezahlart`, `bezahlt`, `versendet`, `versanddatum`) VALUES
(1, 21, 'Hansmeier', 'Halsband, einfach', 'schwarz', 'keine 2. Farbe', 'keine Nieten', 'keine Nieten', 'keine Verzierung', 14, 'halsband', '4.7.2010', 'vorauskasse', 0, 0, NULL),
(2, 22, 'Hansmeier', 'Halsband, einfach', 'schwarz', 'keine 2. Farbe', 'keine Nieten', 'keine Nieten', 'keine Verzierung', 14, 'halsband', '4.7.2010', 'vorauskasse', 0, 0, NULL),
(3, 23, 'Rhayad', 'Schulterplatte, normal, doppelt', 'schwarz', 'schwarz', 'kein Nietenset m&ouml;glich', 'keine Nietenart m&ouml;glich', 'keine Standardverzierung m&ouml;glich', 119, 'leer', '4.7.2010', 'vorauskasse', 0, 0, NULL),
(4, 23, 'Rhayad', 'Hüftgürtel, 2farbig', 'schwarz', 'schwarz', 'Hüftgürtel altsilber', 'keltischer Knoten', 'keine Verzierung', 67, 'guertel2farbig', '4.7.2010', 'vorauskasse', 0, 0, NULL),
(5, 23, 'Rhayad', 'Halsband, einfach', 'selbstgefärbt lila', 'keine 2. Farbe', 'keine Nieten', 'keine Nieten', 'Halsband doppelte Rille', 14, 'halsband', '4.7.2010', 'vorauskasse', 0, 0, NULL);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `artikelgruppen` (`id`) ON DELETE SET NULL;

--
-- Constraints der Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `bestellungen_ibfk_1` FOREIGN KEY (`username`) REFERENCES `kunden` (`username`),
  ADD CONSTRAINT `bestellungen_ibfk_2` FOREIGN KEY (`lid`) REFERENCES `lieferadressen` (`lid`);

--
-- Constraints der Tabelle `lieferadressen`
--
ALTER TABLE `lieferadressen`
  ADD CONSTRAINT `lieferadressen_ibfk_1` FOREIGN KEY (`username`) REFERENCES `kunden` (`username`);

--
-- Constraints der Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD CONSTRAINT `warenkorb_ibfk_1` FOREIGN KEY (`username`) REFERENCES `kunden` (`username`),
  ADD CONSTRAINT `warenkorb_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `bestellungen` (`bid`);
