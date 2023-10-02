-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 08 sep 2023 om 14:55
-- Serverversie: 5.7.24
-- PHP-versie: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studenten`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `studentenlijst`
--

CREATE TABLE `studentenlijst` (
  `idStudent` int(11) NOT NULL,
  `Naam` varchar(60) NOT NULL,
  `tussenvoegsel` varchar(60) NOT NULL,
  `achternaam` varchar(60) NOT NULL,
  `email` varchar(254) NOT NULL,
  `nummer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `studentenlijst`
--

INSERT INTO `studentenlijst` (`idStudent`, `Naam`, `tussenvoegsel`, `achternaam`, `email`, `nummer`) VALUES
(3, 'Jens', '', 'Bul', 'jensbul@gmail.com', '0638173926'),
(4, 'Mika', '', 'Deijkers', 'mikadeijkers@gmail.com', '0628491538'),
(5, 'Farhan', '', 'Farhan', 'farhanfarhan@gmail.com', '0628451738'),
(6, 'Mohamad', '', 'Hamoud', 'mohamadhamoud@gmail.com', '0619462941'),
(7, 'Kris', 'den', 'Hertog', 'krisdhertog@gmail.com', '0618321421'),
(8, 'Finn', '', 'Jager', 'finnjager@gmail.com', '0697869786'),
(9, 'Mateo', '', 'Kristić', 'mateokristić@gmail.com', '0614264925'),
(10, 'Maciej', '', 'Kwiatkowski', 'maciejkwiatkowski@gmail.com', '0613241526'),
(11, 'Nishaar', '', 'Liakathoesein', 'nishaarliekathoesein@gmail.com', '0645364735'),
(12, 'Noah', 'van', 'Loon', 'noahvloon@gmail.com', '0634253623'),
(13, 'Yordi', 'van den', 'Meijdenberg', 'yordivdmeijdenberg', '0684625395'),
(14, 'Sven', '', 'Mutsaers', 'svenmutsaers@gmail.com', '0638291545'),
(15, 'Karsten', '', 'Schoenmakers', 'karstenschoenmakers@gmail.com', '0676857685'),
(16, 'Parsa', '', 'Siddighi', 'parsasiddighi@gmail.com', '0613253647'),
(17, 'Dylan', 'van der', 'Ven', 'dylanvanderven@gmail.com', '0614389725'),
(18, 'Stefan', '', 'Versteeg', 'stefanversteeg@gmail.com', '0624352614'),
(19, 'Frank', 'van', 'Vroenhoven', 'frankvanvroenhoven@gmail.com', '0634526341'),
(20, 'Oliwer', '', 'Woźniak', 'oliwerwoźniak@gmail.com', '0648395647'),
(21, 'Roney', '', 'Zakko', 'roneyzakko@gmail.com', '0638274589'),
(22, 'Arda', '', 'Özkan', 'ardakayahan@gmail.com', '0685265653');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `studentenlijst`
--
ALTER TABLE `studentenlijst`
  ADD PRIMARY KEY (`idStudent`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `studentenlijst`
--
ALTER TABLE `studentenlijst`
  MODIFY `idStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
