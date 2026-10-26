-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 02, 2025 at 11:40 PM
-- Server version: 9.4.0
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `id` int NOT NULL,
  `body` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `body`, `type`, `user`) VALUES
(131, '10 minuti e arrivo', 'tml', 'peppo'),
(132, 'Io se fossi Dio\r\nnon avrei proprio più pazienza\r\ninventerei di nuovo una morale\r\ne farei suonare le trombe per il Giudizio universale.', 'tml', 'signorG'),
(133, 'Dai diamanti non nasce niente, dal letame nascono i fior', 'tml', 'faber'),
(134, 'E allora andiamo... Dove ci vuoi portar? E allora andiamo', 'tml', 'jannacci'),
(137, 'Io vado a dormire...', 'tml', 'IlPresidente'),
(138, 'The Matrix is a system, Neo. That system is our enemy.\r\n', 'tml', 'Morpheus');

-- --------------------------------------------------------

--
-- Table structure for table `MessageType`
--

CREATE TABLE `MessageType` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `MessageType`
--

INSERT INTO `MessageType` (`name`) VALUES
('pfa'),
('tml');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`name`, `surname`, `username`, `email`, `password`) VALUES
('Fabrizio', 'De André', 'faber', 'f@da', 'faber'),
('Sara', 'Marini', 'IlPresidente', 's@m', 'IlPresidente'),
('Enzo', 'Jannacci', 'jannacci', 'e@j', 'jannacci'),
('Francesco', 'Puliti', 'Morpheus', 'f@p', 'Morpheus'),
('Giuseppe', 'Nardini', 'peppo', 'g@n', 'peppo'),
('Giorgio', 'Gaberscik', 'signorG', 'g@g', 'signorG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`type`),
  ADD KEY `fk_user` (`user`);

--
-- Indexes for table `MessageType`
--
ALTER TABLE `MessageType`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `MessageType` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `User` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
