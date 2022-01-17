-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 jan 2022 om 12:50
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
(2, 'Kees', 'Smit', 617718234, 'keessmit@gmail.com', '2021-12-15', '', '', 0),
(3, 'Mike', 'van de Berg', 617723458, 'mikevdb@hotmail.com', '2021-12-09', '', '', 0),
(4, 'John', 'Deere', 687345821, 'johndeere@gmail.com', '2021-12-05', '', '', 0),
(5, 'Johan', 'de Wit', 628729133, 'johandewit@hotmail.com', '2021-12-17', '', '', 0),
(41, 'Wessel', 'van Beek', 618817922, 'wer@wer.nl', '2021-12-20', '18:00', 'wrsdhfgjtsdfg', 12),
(53, 'Wessel', 'van Beek', 618817922, 'wessel.vanbeek@hotmail.com', '2022-01-14', '22:30', 'rewtasdfggdsfgsdf', 20),
(55, 'testtest', 'van Beek', 618817922, 'wessel.vanbeek@hotmail.com', '2022-01-14', '22:30', 'rewtasdfggdsfgsdfihtugsfujdklllljfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 12);

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
(2, 'admin@admin.admin', '$2y$10$VZX.xWhz4r9THXdDlWCoTuQD9YoHsWOzbDn3Y95LGe7drx2FldIFK');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
