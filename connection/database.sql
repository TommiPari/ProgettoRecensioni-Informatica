-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 10:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ristorante_recensioni`
--
CREATE DATABASE IF NOT EXISTS `ristorante_recensioni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ristorante_recensioni`;

-- --------------------------------------------------------

--
-- Table structure for table `recensione`
--

CREATE TABLE `recensione` (
  `id_recensione` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_utente` int(11) NOT NULL,
  `id_ristorante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recensione`
--

INSERT INTO `recensione` (`id_recensione`, `voto`, `data`, `id_utente`, `id_ristorante`) VALUES
(2, 5, '2025-04-08 07:39:21', 3, 1),
(3, 4, '2025-04-08 07:39:22', 4, 1),
(4, 3, '2025-04-08 07:39:21', 3, 2),
(6, 5, '2025-04-08 07:39:21', 3, 4),
(8, 5, '2025-04-08 07:44:25', 5, 1),
(9, 5, '2025-04-15 06:41:48', 6, 1),
(10, 4, '2025-04-15 06:43:30', 7, 1),
(11, 4, '2025-04-08 07:40:44', 4, 2),
(12, 4, '2025-04-08 07:44:25', 5, 3),
(13, 5, '2025-04-15 06:41:48', 6, 4),
(14, 3, '2025-04-08 07:44:25', 5, 4),
(17, 5, '2025-05-27 06:31:47', 2, 1),
(18, 3, '2025-05-27 06:31:57', 2, 4),
(20, 5, '2025-05-29 07:21:32', 2, 5),
(21, 4, '2025-05-29 07:21:35', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ristorante`
--

CREATE TABLE `ristorante` (
  `id_ristorante` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `posizione` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ristorante`
--

INSERT INTO `ristorante` (`id_ristorante`, `nome`, `indirizzo`, `citta`, `posizione`) VALUES
(1, 'Da Bertone', 'Via XXIV Maggio 60', 'Lastra a Signa', 0x000000000101000000d0d55fc1c3372640a2f077a5b9e24540),
(2, 'L\'amorino', 'Piazza Luciano Manara 5/7', 'Scandicci', 0x00000000010100000064042fd730602640d7cd4fced9e04540),
(3, 'La valle dei re', 'Piazza Piave 2', 'Scandicci', 0x000000000101000000643244918d6026401b11b01280e04540),
(4, 'La musica', 'Via Vecchia Pisana 108', 'Malmantile', 0x000000000101000000fa8626071e2326403ae007f974df4540),
(5, 'Aragosta', 'Via Gaetano Donizzetti 38', 'Scandicci', 0x0000000001010000000327797d705a26402df76eed71e14540),
(6, 'Panda', 'Via Aleardo Aleardi, 19', 'Scandicci', 0x000000000101000000fbddf00a84602640aa90f7f69de04540);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_registrazione` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`id_utente`, `username`, `password`, `nome`, `cognome`, `email`, `data_registrazione`, `admin`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin', 'admin', 'admin@admin.com', '2025-05-15 07:20:48', 1),
(2, 'tommipari', '5e3bfdce0e6a480920747cecd8b6db3279af57f690f06d13b18b288286ba5a01', 'tommaso', 'parigi', 'tommaso.parigi06@gmail.com', '2025-05-29 08:24:21', 0),
(3, 'noklosupestar', '92f681fbbca7cf50385b3d0606215519a376f4a4046ac7d93db6f91e0a70b36c', 'niccolò', 'mancini', 'niccolomancini3@gmail.com', '2025-04-08 07:34:13', 0),
(4, 'tozzo_dipane', 'ab56acf8e15771b3a5d84ce3bb9f6be315fb6de9a9e28385521727bfbde60c58', 'leonardo', 'tozzi', 'tozzileonardo18@gmail.com', '2025-04-08 07:36:08', 0),
(5, 'AtleticoSalsicciao', 'ff38e1b33166fcd0dd6904c9143f05b112f4e462ded3e7fb2f2ee67d12e50b62', 'mattia', 'cugusi', 'm.cugusi287@gmail.com', '2025-04-08 07:42:53', 0),
(6, 'mariorossi97', '6a8f5c764ed7c4e106e1b7e41a14088ea06790120ba86f6ff0a5be8adc26d153', 'mario', 'rossi', 'mariorossi97@hotmail.com', '2025-04-15 06:12:45', 0),
(7, 'vindiesel_official', '7078297cf8f756bb67128da8aa37212752cff4bf2343cfb56048d5e8270671cd', 'vin', 'metano', 'therealvindiesel@yahoo.us', '2025-04-15 06:43:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id_recensione`),
  ADD KEY `id_utente_idx` (`id_utente`),
  ADD KEY `id_ristorante_idx` (`id_ristorante`);

--
-- Indexes for table `ristorante`
--
ALTER TABLE `ristorante`
  ADD PRIMARY KEY (`id_ristorante`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id_recensione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ristorante`
--
ALTER TABLE `ristorante`
  MODIFY `id_ristorante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `id_ristorante` FOREIGN KEY (`id_ristorante`) REFERENCES `ristorante` (`id_ristorante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
