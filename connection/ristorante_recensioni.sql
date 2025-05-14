Use ristorante_recensioni;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 10, 2025 alle 09:13
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.10

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

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id_recensione` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_utente` int(11) NOT NULL,
  `id_ristorante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id_recensione`, `voto`, `data`, `id_utente`, `id_ristorante`) VALUES
(1, 5, '2025-04-08 22:39:21', 2, 1),
(2, 5, '2025-04-08 09:39:21', 3, 1),
(3, 4, '2025-04-08 05:39:22', 4, 1),
(4, 3, '2025-04-08 07:39:21', 3, 2),
(5, 3, '2025-04-08 07:39:21', 2, 3),
(6, 5, '2025-04-08 10:39:21', 3, 4),
(7, 5, '2025-04-08 09:44:25', 4, 4),
(8, 5, '2025-04-08 17:44:25', 5, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `ristorante`
--

CREATE TABLE `ristorante` (
  `id_ristorante` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ristorante`
--

INSERT INTO `ristorante` (`id_ristorante`, `nome`, `indirizzo`, `citta`) VALUES
(1, 'Da Bertone', 'Via XXIV Maggio 60', 'Lastra a Signa'),
(2, 'L\'amorino', 'Piazza Luciano Manara 5/7', 'Scandicci'),
(3, 'La valle dei re', 'Piazza Piave 2', 'Scandicci'),
(4, 'La musica', 'Via Vecchia Pisana 108', 'Malmantile');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_registrazione` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `username`, `password`, `nome`, `cognome`, `email`, `data_registrazione`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin', 'admin', 'admin@admin.com', '2025-04-03 08:24:08'),
(2, 'tommipari', 'a95240c37239a94198a0b86dfb8a38fac46463919aa9bf41e10d16d1a957d197', 'tommaso', 'parigi', 'tommaso.parigi06@gmail.com', '2025-04-03 08:29:20'),
(3, 'noklosupestar', '92f681fbbca7cf50385b3d0606215519a376f4a4046ac7d93db6f91e0a70b36c', 'niccolò', 'mancini', 'niccolomancini3@gmail.com', '2025-04-08 07:34:13'),
(4, 'tozzo_dipane', 'ab56acf8e15771b3a5d84ce3bb9f6be315fb6de9a9e28385521727bfbde60c58', 'leonardo', 'tozzi', 'tozzileonardo18@gmail.com', '2025-04-08 07:36:08'),
(5, 'AtleticoSalsicciao', 'ff38e1b33166fcd0dd6904c9143f05b112f4e462ded3e7fb2f2ee67d12e50b62', 'mattia', 'cugusi', 'm.cugusi287@gmail.com', '2025-04-08 07:42:53');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id_recensione`),
  ADD KEY `id_utente_idx` (`id_utente`),
  ADD KEY `id_ristorante_idx` (`id_ristorante`);

--
-- Indici per le tabelle `ristorante`
--
ALTER TABLE `ristorante`
  ADD PRIMARY KEY (`id_ristorante`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id_recensione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `ristorante`
--
ALTER TABLE `ristorante`
  MODIFY `id_ristorante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `id_ristorante` FOREIGN KEY (`id_ristorante`) REFERENCES `ristorante` (`id_ristorante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
