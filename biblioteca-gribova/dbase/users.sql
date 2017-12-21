-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2016 at 03:38 
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aned` int(11) NOT NULL,
  `pret` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `password`, `aned`, `pret`) VALUES
(1, 'Doamna Curie', 'Eva Curie', 'Lumina', 0, ''),
(2, 'Calugarenii', 'C. Sandu Aldea', 'Librariei P. Suru', 1990, '10'),
(3, 'Sarut sub clar de luna', 'Guy Chantepleure', 'National', 0, ''),
(4, 'Iarmarocul metehnelor, 1932', 'Dragos Protopopescu', 'Editua CR', 0, ''),
(5, 'Vitele umane (interbelic)', 'Victor Margueritte', 'Eminescu', 1992, '12'),
(6, 'Cărarea pierdută', 'Alain Fournier', 'Gorjan', 0, '14'),
(7, 'Apele primăverii', 'Ivan Turgheniev', 'Bucur Ciobanu', 0, ''),
(8, 'Romanul de cinci parale', 'Bertolt Brecht', 'De Stat', 1948, '16'),
(9, 'Delta salbatica (interbelic)', 'Louis Bromfield', 'Socec & Co.', 0, ''),
(10, 'Singura cale, 1946', 'D. Corbea', 'De Stat', 0, ''),
(11, 'Scandal, 1945', 'Tudor Teodorescu Braniste', 'Forum', 0, ''),
(12, 'Doamna de Pompadour si epoca ei', 'Alfred Leroy', 'Civitas', 0, '26'),
(13, 'Lotus amar', 'Louis Bromfield', 'Vatra', 0, ''),
(14, 'Porti ferecate', 'Louis Golding', 'Forum', 0, ''),
(15, 'Fericirea de a trai', 'John Lubbock', 'Cugetarea George Delafras', 0, ''),
(16, 'Ann Vickers', 'Sinclair Lewis', 'Europolis', 0, ''),
(17, 'Rascoala (2 vol.)', 'Liviu Rebreanu', 'Socec & Co', 0, ''),
(18, 'Honore de Balzac - Vieata de vis si sbucium', 'Rene Benjamin', 'Forum', 0, ''),
(19, 'Moara cu noroc', 'Ioan Slavici', 'Cartier', 0, ''),
(20, 'În seară', 'Haruki Murakami', 'Cartier', 0, ''),
(21, 'În vreme de război, 1898', 'Ion Luca Caragiale', 'Prometeu', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
