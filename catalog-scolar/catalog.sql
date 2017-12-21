-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2017 at 10:45 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `abs`
--

CREATE TABLE `abs` (
  `id_abs` int(11) NOT NULL,
  `disciplina` char(32) CHARACTER SET utf8 NOT NULL,
  `data` date NOT NULL,
  `user_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `abs` char(2) CHARACTER SET utf8 NOT NULL,
  `motivat` char(9) CHARACTER SET utf8 NOT NULL,
  `user_class` char(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abs`
--

INSERT INTO `abs` (`id_abs`, `disciplina`, `data`, `user_name`, `abs`, `motivat`, `user_class`) VALUES
(1, 'ed. sănătate', '2017-02-28', 'elev', 'da', 'motivat', '10 A'),
(2, 'matematică', '2017-03-30', 'Crăciunița Victoria', 'da', 'nemotivat', '10 B'),
(3, 'matematică', '2017-03-31', 'elev', 'da', 'motivat', '10 A'),
(4, 'matematică', '2017-03-31', 'Botnari Cătălina', 'da', 'motivat', '10 B'),
(5, 'ed. sănătate', '2017-03-31', 'Botnari Cătălina', 'da', 'motivat', '10 B'),
(9, 'ed. sănătate', '2017-03-31', 'Crăciunița Victoria', 'da', 'motivat', '10 B'),
(10, 'ed. sănătate', '2017-02-21', 'Patrașcu Crina', 'da', 'nemotivat', '10 C'),
(11, 'ed. sănătate', '2017-02-23', 'Novatchii Vasile', 'da', 'motivat', '10 B'),
(12, 'ed. sănătate', '2017-04-04', 'Bors Irina', 'da', 'motivat', '10 A'),
(13, 'ed. sănătate', '2017-04-05', 'Cazacu Tudor', 'da', 'nemotivat', '10 A'),
(14, 'ed. sănătate', '2017-03-15', 'Cioranica Ion', 'da', 'motivat', '10 A'),
(15, 'ed. sănătate', '2017-06-14', 'Mîndru Mihaiela', 'da', 'nemotivat', '10 C');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` char(48) CHARACTER SET utf8 NOT NULL,
  `color` char(10) CHARACTER SET utf8 NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `profname` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `color`, `start`, `end`, `profname`) VALUES
(1, 'Prinzul 2', '#0071c5', '2017-03-29 12:40:00', '2017-03-29 13:00:00', 'profesor'),
(2, 'test 2', '#FFD700', '2017-03-30 09:10:00', '2017-03-30 09:45:00', 'Colceac Ion'),
(3, 'asd', '#0071c5', '2017-03-31 00:00:00', '2017-04-01 00:00:00', 'Colceac Ion'),
(11, 'Evaluare', '#FF0000', '2017-03-30 08:00:00', '2017-03-30 08:45:00', 'profesor'),
(13, 'Prezentare raport', '#FF0000', '2017-04-10 09:00:00', '2017-04-10 11:00:00', 'profesor'),
(14, 'apocalipsa in Chisinau', '#FF0000', '2017-04-20 00:00:00', '2017-04-21 17:00:00', 'profesor'),
(16, 'Testare', '#FF8C00', '2017-04-25 12:00:00', '2017-04-25 12:45:00', 'profesor'),
(19, 'Testare Admin', '#FFD700', '2017-04-25 09:00:00', '2017-04-25 11:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clase`
--

CREATE TABLE `clase` (
  `id_class` tinyint(3) UNSIGNED NOT NULL,
  `class` char(4) CHARACTER SET utf8 NOT NULL,
  `nr_learners` tinyint(3) UNSIGNED NOT NULL,
  `class_master` char(64) CHARACTER SET utf8 NOT NULL,
  `classroom` char(16) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clase`
--

INSERT INTO `clase` (`id_class`, `class`, `nr_learners`, `class_master`, `classroom`) VALUES
(1, '10 A', 30, 'Colceac Ion', 'et. 1, sala 106'),
(2, '10 B', 26, 'Brusture Marin', 'et. 1, sala 109'),
(3, '10 C', 31, 'Pînzaru Magda', 'Et. 1, sala 111'),
(4, '11 A', 25, 'Ungureanu Aloina', 'et. 1, sala 110'),
(5, '11 B', 26, 'Mazăre Mihaiela', 'et. 2, sala 215'),
(6, '11 C', 29, 'Reșetnic Silvia', 'et. 2, sala 220'),
(7, '12 A', 21, 'Surucean Viorel', 'et. 3, sala 314'),
(8, '12 B', 24, 'Ojovan Ludmila', 'et. 4, sala 408'),
(9, '12 C', 26, 'Chirinciuc Eugenia', 'et. 3, sala 319');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` int(11) NOT NULL,
  `denumire` varchar(255) CHARACTER SET utf8 NOT NULL,
  `city` varchar(48) CHARACTER SET utf8 NOT NULL,
  `posta` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobil` text NOT NULL,
  `manager` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `denumire`, `city`, `posta`, `mobil`, `manager`) VALUES
(1, 'Liceul Teoretic "Bogdan Petriceicu-Hasdeu"', 'or. Drochia', 'institutie.pub@mail.loc', '(0252) 2-22-03', 'Petruță Alexandru'),
(2, 'Liceul Teoretic "M.Eminescu"', 'or. Glodeni', 'ltm.eminescu.pub@mail.loc', '(0249) 4-12-53', 'Maria Cojocari');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `disciplina` char(32) CHARACTER SET utf8 NOT NULL,
  `data` date NOT NULL,
  `user_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nota` tinyint(2) NOT NULL,
  `user_class` char(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_note`, `disciplina`, `data`, `user_name`, `nota`, `user_class`) VALUES
(1, 'matematică', '2017-03-29', 'Bors Irina', 9, '10 A'),
(2, 'matematică', '2017-03-30', 'Bors Irina', 10, '10 A'),
(3, 'fizică', '2017-03-29', 'Bors Irina', 8, '10 A'),
(4, 'ed. sănătate', '2017-03-30', 'Crăciunița Victoria', 9, '10 B'),
(5, 'ed. sănătate', '2017-03-30', 'Cioranica Ion', 9, '10 A'),
(6, 'ed. sănătate', '2017-03-30', 'Zubco Vitalie', 9, '10 A'),
(7, 'ed. sănătate', '2017-03-30', 'Patrașcu Crina', 9, '10 C'),
(8, 'ed. sănătate', '2017-03-30', 'Zubco Vitalie', 9, '10 C'),
(9, 'matematică', '2017-03-28', 'Lașcu Ion', 8, '10 C'),
(10, 'matematică', '2017-03-21', 'Cioranica Ion', 8, '10 A'),
(11, 'matematică', '2017-03-22', 'Lașcu Ion', 10, '10 C'),
(12, 'matematică', '2017-03-22', 'Mîndru Mihaiela', 9, '10 C'),
(13, 'ed. sănătate', '2017-04-04', 'elev', 8, '10 A'),
(14, 'ed. sănătate', '2017-04-03', 'Botnari Cătălina', 10, '10 B'),
(15, 'ed. sănătate', '2017-04-03', 'Mîndru Mihaiela', 9, '10 C'),
(16, 'ed. sănătate', '2017-04-04', 'Novatchii Vasile', 9, '10 B'),
(17, 'ed. sănătate', '2017-03-27', 'Novatchii Vasile', 9, '10 B'),
(18, 'ed. sănătate', '2017-03-20', 'Novatchii Vasile', 10, '10 B'),
(19, 'ed. sănătate', '2017-03-06', 'Patrașcu Crina', 9, '10 C'),
(20, 'ed. sănătate', '2017-04-03', 'Bors Irina', 10, '10 A'),
(21, 'ed. sănătate', '2017-06-14', 'Cazacu Tudor', 8, '10 A');

-- --------------------------------------------------------

--
-- Table structure for table `noteTeza`
--

CREATE TABLE `noteTeza` (
  `note_id` int(11) NOT NULL,
  `disciplinaTeza` char(32) CHARACTER SET utf8 NOT NULL,
  `dataTeza` date NOT NULL,
  `elev` varchar(32) CHARACTER SET utf8 NOT NULL,
  `notaTeza` tinyint(2) NOT NULL,
  `clasaElev` char(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noteTeza`
--

INSERT INTO `noteTeza` (`note_id`, `disciplinaTeza`, `dataTeza`, `elev`, `notaTeza`, `clasaElev`) VALUES
(1, 'ed. sănătate', '2017-04-26', 'Bors Irina', 10, '10 A'),
(2, 'ed. sănătate', '2017-06-01', 'Crăciunița Victoria', 7, '10 B');

-- --------------------------------------------------------

--
-- Table structure for table `orarClase`
--

CREATE TABLE `orarClase` (
  `orar_id` int(11) NOT NULL,
  `zi` varchar(12) CHARACTER SET utf8 NOT NULL,
  `10a` varchar(16) CHARACTER SET utf8 NOT NULL,
  `10b` varchar(16) CHARACTER SET utf8 NOT NULL,
  `10c` varchar(16) CHARACTER SET utf8 NOT NULL,
  `11a` varchar(16) CHARACTER SET utf8 NOT NULL,
  `11b` varchar(16) CHARACTER SET utf8 NOT NULL,
  `11c` varchar(16) CHARACTER SET utf8 NOT NULL,
  `12a` varchar(16) CHARACTER SET utf8 NOT NULL,
  `12b` varchar(16) CHARACTER SET utf8 NOT NULL,
  `12c` varchar(16) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orarClase`
--

INSERT INTO `orarClase` (`orar_id`, `zi`, `10a`, `10b`, `10c`, `11a`, `11b`, `11c`, `12a`, `12b`, `12c`) VALUES
(1, 'luni (1)', 'Ed.fizică', 'Istorie', 'L.franceză', 'Informatică', 'Geografie', 'L.franceză', 'Chimia', 'L.engleză', 'Matematică'),
(2, 'luni (2)', 'L.engleză', 'L.franceză', 'Matematica', 'Informatică', 'Chimie', 'Fizică', 'Biologie', 'L.lit.română', 'L.universală'),
(3, 'luni (3)', 'Biologie', 'Matematica', 'Istorie', 'Fizica', 'Informatica', 'Chimie', 'L.lit.română', 'Biologie', 'L.lit.română'),
(4, 'luni (4)', 'Biologie', 'Matematica', 'Istorie', 'Geografie', 'L.franceză', 'Informatică', 'L.engleză', 'Chimie', 'Matematică'),
(5, 'luni (5)', 'Matematica', 'Ed.sănătate', 'L.lit.română', 'Geografie', 'Informatica', 'Ed.sănătate', 'Istorie', 'Matematică', 'Ed.fizică'),
(6, 'luni (6)', 'Matematica', 'L.lit.română', 'Ed.sănătate', 'L.lit.română', 'Ed.fizică', 'Dirigenție', 'Istorie', 'Matematică', 'Dirigenția'),
(7, 'luni (7)', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(8, 'marți (1)', 'Informatică', 'Fizică', 'L.lit.română', 'Chimie', 'L.engleză', 'Biologie', 'Matematică', 'L.universală', 'Ed.civică'),
(9, 'marți (2)', 'Chimie', 'Fizică', 'L.lit.română', 'Chimie', 'Ed.sănătate', 'L.universală', 'Matematică', 'Istorie', 'Geografie'),
(10, 'marți (3)', 'Geografie', 'Matematică', 'Ed.civică', 'L.lit.română', 'L.franceză', 'L.engleză', 'Informatică', 'Istorie', 'Fizică'),
(11, 'marți (4)', 'Fizică', 'Ed. fizică', 'Chimie', 'L.lit.română', 'Matematica', 'Istorie', 'Informatică', 'Geografie', 'Ed.civică'),
(12, 'marți (5)', 'Istorie', 'L.lit.română', 'Ed.civică', 'Matematică', 'Informatică', 'Dirigenție', 'Chimie', 'Fizică', 'Dirigenție'),
(13, 'marți (6)', 'Istorie', 'L.lit.română', '-', 'Matematică', 'Informatică', 'Chimie', 'Geografie', 'Fizică', '-'),
(14, 'marți (7)', 'Dirigenție', 'Dirigenție', '-', 'Dirigenție', '-', '-', 'Dirigenție', '-', '-'),
(15, 'miercuri (1)', 'L.lit.română', 'Matematică', 'Ed.fizică', 'Matematică', 'Fizică', 'L.lit.română', 'L.franceză', 'L.engleză', 'L.franceză'),
(16, 'miercuri (2)', 'L.lit.română', 'Matematică', 'Istorie', 'Fizică', 'Ed.fizică', 'L.lit.română', 'L.engleză', 'L.franceză', 'L.franceză'),
(17, 'miercuri (3)', 'Matematică', 'Istorie', 'Geografie', 'Informatică', 'L.franceză', 'L.engleză', 'L.lit.română', 'Fizică', 'L.lit.română'),
(18, 'miercuri (4)', 'Matematică', 'Istorie', 'Geografie', 'L.engleză', 'L.franceză', 'L.engleză', 'L.lit.română', 'Fizică', 'L.lit.română'),
(19, 'miercuri (5)', 'L.franceză', 'L.engleză', 'L.lit.română', 'Geografie', 'Istorie', 'Matematică', 'Fizică', 'Matematică', 'Ed.civică'),
(20, 'miercuri (6)', 'L.franceză', 'L.engleză', 'L.lit.română', 'Geografie', 'Istorie', 'Matematică', 'Fizică', 'Matematică', '-'),
(21, 'miercuri (7)', 'Chimie', 'Tehnica traducer', 'Tehnica traducer', '-', '-', '-', 'Protecția mediul', 'Protecția mediul', '-'),
(22, 'joi (1)', 'Chimie', 'Informatică', 'L.franceză', 'Matematică', 'Geografie', 'L.lit.română', 'Ed.civică', 'Biologie', 'Lit.universală'),
(23, 'joi (2)', 'Chimie', 'L.lit.română', 'L.engleză', 'Matematică', 'Geografie', 'Informatică', 'Ed.fizică', 'Biologie', 'Lit.universală'),
(24, 'joi (3)', 'Fizică', 'L.lit.română', 'Matematică', 'Chimie', 'Dirigenție', 'Geografie', 'Biologie', 'L.lit.română', 'Ed.fizică'),
(25, 'joi (4)', 'Ed.fizică', 'Ed.civică', 'Matematică', 'Chimie', 'Matematică', 'Geografie', 'Biologie', 'L.lit.română', 'L.lit.română'),
(26, 'joi (5)', 'Geografie', 'Ed.sănătate', 'L.lit.română', 'L.lit.română', 'Biologie', 'L.engleză', 'Matematică', 'Chimie', 'Fizică'),
(27, 'joi (6)', 'Geografie', '-', 'L.lit.română', 'L.lit.română', 'Biologie', 'L.engleză', 'Matematică', 'Chimie', 'Fizică'),
(28, 'joi (7)', '-', '-', 'Dirigenția', 'Tehnica traducer', 'Tehnica traducer', '-', '-', 'Ed.fizică', '-'),
(29, 'vineri (1)', 'Biologie', 'L.lit.română', 'L.franceză', 'Ed.fizică', 'L.lit.română', 'Istorie', 'L.lit.română', 'Chimie', 'Matematică'),
(30, 'vineri (2)', 'Biologie', 'L.lit.română', 'L.engleză', 'Fizică', 'L.lit.română', 'Ed.fizică', 'L.lit.română', 'Chimie', 'Istorie'),
(31, 'vineri (3)', 'Ed.civică', 'Biologie', 'Informatică', 'Fizică', 'Ed.fizică', 'L.lit.română', 'Chimie', 'Istorie', 'L.engleză'),
(32, 'vineri (4)', 'Fizică', 'Ed.fizică', 'Biologie', 'L.franceză', 'Ed.civică', 'L.lit.română', 'Chimie', 'Istorie', 'L.engleză'),
(33, 'vineri (5)', 'L.engleză', 'L.franceză', 'Ed.sănătate', 'Biologie', 'Fizică', 'L.lit.română', 'Istorie', 'Informatică', 'Chimie'),
(34, 'vineri (6)', 'L.engleză', 'L.franceză', '-', '-', 'Fizică', '-', 'Istorie', 'Informatică', '-'),
(35, 'vineri (7)', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `orarTeze`
--

CREATE TABLE `orarTeze` (
  `orar_id` int(11) NOT NULL,
  `discipline` varchar(32) CHARACTER SET utf8 NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `locul` varchar(18) CHARACTER SET utf8 NOT NULL,
  `prof` varchar(48) CHARACTER SET utf8 NOT NULL,
  `user_clasa` varchar(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orarTeze`
--

INSERT INTO `orarTeze` (`orar_id`, `discipline`, `data`, `ora`, `locul`, `prof`, `user_clasa`) VALUES
(1, 'Matematică', '2017-05-07', '09:00:00', 'Et.2, sala 203', 'Colceac Ion', '10 A'),
(2, 'L.lit.română', '2017-05-08', '10:00:00', 'Et.1, sala 102', 'Pînzaru Magda', '10 A'),
(3, 'Istorie', '2017-05-09', '11:45:00', 'Et.4, sala 401', 'Surucean Viorel', '10 A'),
(5, 'Geografie', '2017-05-10', '13:00:00', 'Et.2, sala 210', 'Brusture Marin', '10 A'),
(6, 'Matematică', '2017-05-07', '08:15:00', 'Et.2, sala 204', 'Colceac Ion', '10 B');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `nume` char(64) NOT NULL,
  `grad_didactic` char(10) NOT NULL,
  `telefon` int(10) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `practivitate` varchar(1024) NOT NULL,
  `act_didactic` varchar(1024) NOT NULL,
  `eval_rez` varchar(512) NOT NULL,
  `promo` varchar(256) NOT NULL,
  `np_elev` char(64) NOT NULL,
  `clasa` char(4) NOT NULL,
  `activitate` char(64) NOT NULL,
  `locdesf` char(64) NOT NULL,
  `data` date NOT NULL,
  `premiu` char(48) NOT NULL,
  `perioada` varchar(48) NOT NULL,
  `curs` char(48) NOT NULL,
  `furnizor` char(32) NOT NULL,
  `loc_desf` char(64) NOT NULL,
  `perioada2` varchar(48) NOT NULL,
  `activ2` char(64) NOT NULL,
  `loc2` char(32) NOT NULL,
  `tema2` varchar(128) NOT NULL,
  `propuneri` varchar(256) NOT NULL,
  `data_intocmirii` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `nume`, `grad_didactic`, `telefon`, `mail`, `practivitate`, `act_didactic`, `eval_rez`, `promo`, `np_elev`, `clasa`, `activitate`, `locdesf`, `data`, `premiu`, `perioada`, `curs`, `furnizor`, `loc_desf`, `perioada2`, `activ2`, `loc2`, `tema2`, `propuneri`, `data_intocmirii`) VALUES
(1, 'profesor', 'doi', 78560190, 'prof.test@mail.loc', 'In semper aliquet eros, sit amet elementum nisi. Fusce id volutpat dui. Suspendisse varius fermentum sem id pellentesque. Nulla eget enim eget eros sodales accumsan a et nisi.', 'Maecenas dui ex, sagittis ut fermentum a, luctus a risus. Proin pellentesque ante nec venenatis maximus. Ut eget elit bibendum, scelerisque ligula sed, luctus eros. Vestibulum commodo enim in consectetur tristique. Etiam hendrerit mattis enim ut facilisis. Curabitur gravida interdum ornare. Donec id nisi eu nibh viverra maximus ut ac orci. Quisque vitae condimentum tellus.', 'Maecenas dui ex, sagittis ut fermentum a, luctus a risus. Proin pellentesque ante nec venenatis maximus. Ut eget elit bibendum, scelerisque ligula sed, luctus eros. Vestibulum commodo enim in consectetur tristique. Etiam hendrerit mattis enim ut facilisis. Curabitur gravida interdum ornare. Donec id nisi eu nibh viverra maximus ut ac orci. Quisque vitae condimentum tellus.', 'In semper aliquet eros, sit amet elementum nisi. Fusce id volutpat dui. Suspendisse varius fermentum sem id pellentesque. Nulla eget enim eget eros sodales accumsan a et nisi. Maecenas dui ex, sagittis ut fermentum a, luctus a risus. Proin pellentesque ant', 'Cioranica Ion', '10 A', 'Acordarea primului ajutor medical', 'L.T. &quot;B.P.-Hasdeu&quot;', '2017-05-05', 'Locul întîi', '24 octombrie-28 octombrie', 'Efectele jocurilor video', 'Ministerul Educației și Tineretu', 'or. Chișinău', '6 martie-8 martie', 'Fusce venenatis scelerisque tincidunt. Morbi nec enim in metus c', 'L.T.„B.P.-Hasdeu”', 'Vivamus maximus fermentum nibh, nec scelerisque', 'Fusce venenatis scelerisque tincidunt. Morbi nec enim in metus convallis porttitor. Vivamus maximus fermentum nibh, nec scelerisque neque consequat at.', '2017-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_category` varchar(10) NOT NULL,
  `user_parent` varchar(255) NOT NULL,
  `user_child` varchar(255) NOT NULL,
  `user_class` varchar(5) NOT NULL,
  `user_btd` date NOT NULL,
  `user_mail` char(255) NOT NULL,
  `user_mob` int(24) NOT NULL,
  `grad_prof` char(24) NOT NULL,
  `disciplina` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_category`, `user_parent`, `user_child`, `user_class`, `user_btd`, `user_mail`, `user_mob`, `grad_prof`, `disciplina`) VALUES
(1, 'admin', '5aee9dbd2a188839105073571bee1b1f', 'editor', '', '', '', '1990-02-26', 'suport.tehnic@catalog-scolar.xyz', 68342345, '0', ''),
(2, 'elev', '41087aa1be106903ecee5af3892f7e88', 'elev', 'parinte', '', '10 A', '1994-11-27', 'elev@mail.loc', 69784424, '0', ''),
(3, 'parinte', 'e9c01ed6fd8bcc6b18c20a3c5ddcff95', 'parinte', '', 'elev', '', '1976-03-24', 'parent@mail.loc', 79962336, '0', ''),
(4, 'profesor', '793741d54b00253006453742ad4ed534', 'profesor', '', '', 'nu', '1970-04-19', 'prof.test@mail.loc', 78560190, 'gradul doi', 'ed. sănătate'),
(5, 'director', '3d4e992d8d8a7d848724aa26ed7f4176', 'director', '', '', '', '1970-05-02', 'manager.school@mail.loc', 69916727, '0', ''),
(6, 'Novatchii Vasile', 'f3ed0718ffa042d73f7164cf2849ebcf', 'elev', '', '', '10 B', '1994-11-24', 'vnovatchi@gmail.com', 68342344, '0', ''),
(11, 'Cioranica Ion', '039160a039b9aa91d0c26e397919ab94', 'elev', 'Cioranica Valeria', '', '10 A', '1993-06-15', 'cioranica.ion@mail.loc', 69898501, '0', ''),
(12, 'Cazacu Tudor', '60ab642e16ef644d9a163f776957b82f', 'elev', 'Cazacu Maria', '', '10 A', '1994-01-10', 'cazacu.tudor@mail.loc', 79812366, '0', ''),
(13, 'Bors Irina', '9aef805e9884c49706ccd01e4b259df8', 'elev', '', '', '10 A', '1994-12-09', 'bors.irina@mail.loc', 78903210, '0', ''),
(14, 'Botnari Cătălina', '7a98c4e7dda38826928495a77f9f78e8', 'elev', '', '', '10 B', '1994-02-17', 'botnari.catalina@mail.loc', 79876757, '0', ''),
(15, 'Crăciunița Victoria', '9d804a969e77b6bba0c4d15fe7b7ef6c', 'elev', '', '', '10 B', '1995-09-05', 'craciunita.victoria@mail.loc', 68001278, '0', ''),
(16, 'Zubco Vitalie', '98e4d629048fc3765fdebb4045152cfb', 'elev', '', '', '10 A', '1994-03-30', 'zubco.vitalie@mail.loc', 69454671, '0', ''),
(17, 'Mîndru Mihaiela', 'f42b65eb695d16810b780bd81dd6e795', 'elev', '', '', '10 C', '1994-08-20', 'mindru.mihaiela@mail.loc', 67015582, '0', ''),
(18, 'Patrașcu Crina', 'ae5dbb96eae70d6748b7fcd969b48754', 'elev', '', '', '10 C', '1994-11-17', 'patrascu.crina@mail.loc', 78567281, '0', ''),
(19, 'Lașcu Ion', 'e6fee8609696a722544a70e471662cf5', 'elev', '', '', '10 C', '1994-12-04', 'lascu.ion@mail.loc', 69182113, '0', ''),
(25, 'Colceac Ion', 'd27a2394e11ea5ca0e59ae56cf826492', 'profesor', '', '', '10 A', '1970-02-24', 'colceac.ion@mail.loc', 69100559, 'gradul superior', 'matematică'),
(27, 'Cioranică Valeria', 'e92c95df5163e8ad9c25c2c658bd0591', 'parinte', '', 'Cioranica Ion', '', '1981-06-12', 'cioranica.valeria@par.loc', 69212223, '', ''),
(32, 'Brusture Marin', 'efa9fa0201a82593d827e4984ec7378d', 'profesor', '', '', '10 B', '1983-02-15', 'brusture.marin@mail.loc', 78101231, 'gradul doi', 'ed.fizică'),
(33, 'Pînzaru Magda', 'd8a99d75068db7d86d18601871f7673f', 'profesor', '', '', '10 C', '1985-07-12', 'pinzaru.magda@mail.loc', 69014569, 'gradul întîi', 'ed.civică'),
(34, 'Ungureanu Aloina', 'f3925a775fb946ca4e567fe3a79fde5b', 'profesor', '', '', '11 A', '1974-11-19', 'ungureanu.aloina@mail.loc', 68929496, 'gradul superior', 'l.lit.română'),
(35, 'Mazăre Mihaiela', 'ac545f2c44834169ecdc4d9b3c3cb043', 'profesor', '', '', '11 B', '1963-05-01', 'mazare.mihaiela@mail.loc', 78058513, 'gradul superior', 'biologie'),
(36, 'Reșetnic Silvia', 'f87063025450cdbef1f8b77a61304d85', 'profesor', '', '', '11 C', '1972-06-11', 'resetnic.silvia@mail.loc', 67453488, 'gradul superior', 'l.lit.română'),
(37, 'Surucean Viorel', '8bf5cd6db1e3ac2f91879d7826a9651f', 'profesor', '', '', '12 A', '1960-12-25', 'surucean.viorel@mail.loc', 69153654, 'gradul întîi', 'istorie'),
(38, 'Ojovan Ludmila', '47eea4ab3fdcfdf4cdf4b2136db24938', 'profesor', '', '', '12 B', '1973-07-23', 'ojovan.ludmila@mail.loc', 69456532, 'gradul superior', 'l.engleză'),
(39, 'Chirinciuc Eugenia', '7441f44599acacf7729013e266afeac5', 'profesor', '', '', '12 C', '1964-11-03', 'chirinciuc.eugenia@mail.loc', 69030589, 'gradul întîi', 'matematică'),
(40, 'Buga Igor', 'eee4e839c85dc215851ba941ea63c6d7', 'profesor', '', '', 'nu', '1962-08-05', 'buga.igor@mail.loc', 78556713, 'gradul superior', 'fizică'),
(41, 'Malai Dionis', '252589756ef52f2d957a63760fbd0129', 'profesor', '', '', 'nu', '1970-06-28', 'malai.dionis@mail.loc', 79110305, 'gradul întîi', 'fizică'),
(42, 'Melnic Grigore', 'bb9cea42a7cecf65f0f387598f40baf5', 'profesor', '', '', 'nu', '1974-03-29', 'melnic.grigore@mail.loc', 69445488, 'gradul întîi', 'geografie'),
(43, 'Concescu Valentina', 'aeec4bdfa9cf10421cf9e96d0c0f7b89', 'profesor', '', '', 'nu', '1974-04-12', 'concescu.valentina@mail.loc', 68909034, 'gradul întîi', 'informatică'),
(44, 'Sava Elena', 'cabecbb8066bc648ee137248693899fd', 'profesor', '', '', 'nu', '1977-01-29', 'sava.elena@mail.loc', 69567781, 'gradul întîi', 'l.franceză'),
(45, 'Moscaliu Marina', '26f53526bf6c62fed58d000cf2c91e52', 'profesor', '', '', 'nu', '1971-10-24', 'moscaliu.marina@mail.loc', 68789432, 'gradul întîi', 'l.franceză'),
(46, 'Luchianciuc Tudor', 'd6f13e1701d95e0adb4c88f862ca1871', 'profesor', '', '', 'nu', '1980-01-01', 'luchianciuc.tudor@mail.loc', 67912943, 'gradul doi', 'l.engleză'),
(47, 'Gîscă Tatiana', 'c90206ef1ee4053a67e41452fbd70423', 'profesor', '', '', 'nu', '1975-02-15', 'gisca.tatiana@mail.loc', 78568183, 'gradul superior', 'chimie'),
(53, 'Cazacu Maria', 'ac3a04861c8a2880b35396cc6f35ca2b', 'parinte', '', 'Cazacu Tudor', '', '1972-01-22', 'cazacu.maria@mail.loc', 69453398, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abs`
--
ALTER TABLE `abs`
  ADD PRIMARY KEY (`id_abs`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`);

--
-- Indexes for table `noteTeza`
--
ALTER TABLE `noteTeza`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `orarClase`
--
ALTER TABLE `orarClase`
  ADD PRIMARY KEY (`orar_id`);

--
-- Indexes for table `orarTeze`
--
ALTER TABLE `orarTeze`
  ADD PRIMARY KEY (`orar_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abs`
--
ALTER TABLE `abs`
  MODIFY `id_abs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `clase`
--
ALTER TABLE `clase`
  MODIFY `id_class` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `noteTeza`
--
ALTER TABLE `noteTeza`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orarClase`
--
ALTER TABLE `orarClase`
  MODIFY `orar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `orarTeze`
--
ALTER TABLE `orarTeze`
  MODIFY `orar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
