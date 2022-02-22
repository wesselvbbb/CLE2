-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 feb 2022 om 17:03
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cle_reservation`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `date` date NOT NULL,
  `reservation_time` text NOT NULL,
  `comment` text NOT NULL,
  `total_guests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `phone_number`, `mail`, `date`, `reservation_time`, `comment`, `total_guests`) VALUES
(60, 'Aarti ', 'Verwijmeren', 623775656, 'AartiVerwijmeren@dayrep.com', '2022-01-18', '22:30', 'Lorem ipsum dolor sit amet, ', 12),
(61, 'Foeke ', 'van Hooijdonk', 663762109, 'FoekevanHooijdonk@jourrapide.com', '2022-01-19', '12:30', 'ik ben allergisch', 2),
(67, 'test', 'test', 611111111, 'test@test.nl', '2022-01-19', '22:30', 'dsfadfg', 12),
(68, 'test2', 'test2', 612345678, 'test2@test.test', '2022-01-26', '18:00', 'dsgfdsdsaf', 10),
(73, 'testwsdfa', 'test', 618816243, 'test@test.nl', '2022-01-21', '18:00', 'ewr', 2),
(74, 'test3', 'test3', 612345678, 'test3@test3.test3', '2022-01-20', '22:30', 'test3', 12),
(76, 'tergertw', 'ter', 612345678, 'test@test.nl', '2022-01-20', '18:00', 'w', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 't@t.t', '$2y$10$4nP0Q.I9J7HD2aLNi9daKuDySSBsYCeF19k8XmDwg99LHV8XpyAtm'),
(2, 'admin@admin.admin', '$2y$10$VZX.xWhz4r9THXdDlWCoTuQD9YoHsWOzbDn3Y95LGe7drx2FldIFK'),
(3, 'test@test.test', '$2y$10$SbEyi4i7m1aCKDaqfefFleXkMSdVEe7oNRRF5ct7tyrKjOXXXn0Iy'),
(4, 'test1@test.test', '$2y$10$l6F90/jRLqiqDDlvY.WOTeEm4zE6XPjEup5keugFucA5TrHb.1h0O');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
