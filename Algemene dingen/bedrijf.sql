-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 aug 2015 om 15:27
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
  `mediaId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `elements`
--

INSERT INTO `elements` (`id`, `parent`, `content`, `place`, `type`, `mediaId`) VALUES
(1, 1, 'SeeIfICare\n', 0, 1, 0),
(2, 1, 'Phasellus condimentum nunc risus, et mollis est tincidunt ut. Quisque accumsan lacus sed diam vestibulum semper. Praesent sagittis non ex a volutpat. Vivamus tincidunt dapibus gravida. Cras ut neque vel nisi rhoncus finibus. Quisque lobortis massa ex, vitae volutpat lorem faucibus quis.', 10, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `main`
--

INSERT INTO `main` (`id`, `title`) VALUES
(1, 'Over Ons');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `url` int(11) NOT NULL,
  `settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
