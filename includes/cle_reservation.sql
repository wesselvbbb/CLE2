-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 11:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `total_guests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `phone_number`, `mail`, `date`, `comment`, `total_guests`) VALUES
(1, 'Jan', 'de Jonge', 618817933, 'jandejonge@hotmail.com', '2021-12-10', '', 0),
(2, 'Kees', 'Smit', 617718234, 'keessmit@gmail.com', '2021-12-15', '', 0),
(3, 'Mike', 'van de Berg', 617723458, 'mikevdb@hotmail.com', '2021-12-09', '', 0),
(4, 'John', 'Deere', 687345821, 'johndeere@gmail.com', '2021-12-05', '', 0),
(5, 'Johan', 'de Wit', 628729133, 'johandewit@hotmail.com', '2021-12-17', '', 0),
(6, 'Wessel', 'van Beek', 618817922, '', '0000-00-00', '', 0),
(7, 'Wessel', 'van Beek', 618817922, '', '0000-00-00', '', 0),
(39, 'Isis', 'Ton', 613718393, 'isis@ton.nl', '0000-00-00', 'wet', 3),
(41, 'Wessel', 'van Beek', 618817922, 'wer@wer.nl', '2021-12-20', 'wrsdhfgjtsdfg', 23),
(42, 'Wessel', 'van Beek', 618817922, 'wer@wer.nl', '2021-12-21', 'test', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
