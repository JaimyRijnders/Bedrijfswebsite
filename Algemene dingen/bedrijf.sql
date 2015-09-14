-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 sep 2015 om 19:25
-- Serverversie: 5.6.24
-- PHP-versie: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bedrijf`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `elements`
--

CREATE TABLE IF NOT EXISTS `elements` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `content` text NOT NULL,
  `place` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `mediaId` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `elements`
--

INSERT INTO `elements` (`id`, `parent`, `content`, `place`, `type`, `mediaId`) VALUES
(29, 1, '', 0, 1, '[1, 2]'),
(37, 1, 'HAaaj<br />\n<br />\nDit werkt :D<br />\n', 20, 0, '0'),
(43, 2, '    Test', 10, 0, ''),
(50, 2, '', 20, 2, '[3, 4, 5]');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `main`
--

INSERT INTO `main` (`id`, `title`) VALUES
(1, 'Over Ons'),
(2, 'Portfolio');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `url` text NOT NULL,
  `settings` text NOT NULL,
  `content` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `media`
--

INSERT INTO `media` (`id`, `type`, `url`, `settings`, `content`) VALUES
(1, 1, 'pinguin404.jpg', '{"hover":{"background-image:":"url(../../../img/hover1.png)"}}', ''),
(2, 1, 'jaimy.jpg', '', ''),
(3, 2, '', '{"default": {"background-image:":"url(''http://www.bluewebtemplates.com/screenshots/cyanspark-med.jpg'');"},\n"hover:": {"height:": "300px;",\n    "width:": "350px"}}', 'Dit is CyanSpark en zoals de naam al een beetje zegt is deze site cyan van kleur.'),
(4, 2, '', '{"default": {"background-image:":"url(''http://www.bluewebtemplates.com/screenshots/greenworld-med.jpg'')"},\n"hover:": {"height:": "300px",\n    "width:": "350px"}}', 'Deze site is groen, te herkennen aan de zeer herkenbare naam ''GreenWorld''.'),
(5, 2, '', '{"default": {"background-image:":"url(''http://blog.tmimgcdn.com/wp-content/uploads/2011/04/Free-Website-Template3.jpg?bd3bd7'')"},\n"hover:": {"height:": "300px",\n    "width:": "350px"}}', 'Dit is Business.co, een website met de beste oplossingen voor jou! Whieee!!');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT voor een tabel `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
