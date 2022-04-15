-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 15, 2022 alle 13:51
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `copie`
--

CREATE TABLE `copie` (
  `id_copia` int(11) NOT NULL,
  `codice_biblioteca` int(11) DEFAULT NULL,
  `codice_libri` int(11) NOT NULL,
  `status` smallint(4) NOT NULL COMMENT '0=present; 1=on loan; -1=lost'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `copie`
--

INSERT INTO `copie` (`id_copia`, `codice_biblioteca`, `codice_libri`, `status`) VALUES
(1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `lettori`
--

CREATE TABLE `lettori` (
  `CODICE_LETTORE` int(11) NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `cognome` varchar(32) DEFAULT NULL,
  `sesso` varchar(7) DEFAULT NULL,
  `data_di_nascita` date DEFAULT NULL,
  `titolo_di_studio` varchar(64) DEFAULT NULL,
  `codice_fiscale` varchar(16) DEFAULT NULL,
  `paese` varchar(32) DEFAULT NULL,
  `citta` varchar(32) DEFAULT NULL,
  `via` varchar(32) DEFAULT NULL,
  `numero_civico` smallint(6) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `numero_telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `lettori`
--

INSERT INTO `lettori` (`CODICE_LETTORE`, `nome`, `cognome`, `sesso`, `data_di_nascita`, `titolo_di_studio`, `codice_fiscale`, `paese`, `citta`, `via`, `numero_civico`, `email`, `password`, `numero_telefono`) VALUES
(1, 'Mario', 'Rossi', 'Maschio', '2001-02-12', 'Diploma Perito Agrario', 'VDZHHV30E68D281I', 'Italia', 'Milano', 'Via Redenzione', 22, 'mariorossi@gmail.com', 'aaaa', '3986456743'),
(2, 'Elisa', 'Rossi', 'Femmina', '2002-11-21', 'Licenza media', 'BSFFSB58A43L517U', 'Italia', 'Milano', 'Via Garibaldi', 2, 'email@gmail.com', 'aaaa', '3885436598'),
(3, 'Paola', 'Bianchi', 'Femmina', '1999-04-24', 'Ingegnere elettronico', 'RTXPCN40A48B591L', 'Italia', 'Milano', 'Via Vittorio Emanuele II', 35, 'paolone@gmail.com', 'aaaa', '3894857290'),
(4, 'Luca', 'Zhao', 'Maschio', '2003-12-15', 'diploma', 'ZHALCU03T15B819L', 'Italy', 'Legnano', 'Diaz', 3, 'zy1044107876@gmail.com', 'aaaa', '000393457331982'),
(5, 'luca', 'zhao', 'Maschio', '2003-12-12', 'Laurea', 'ZHALCU03T15B819L', 'China', 'SVO', 'street1', 1, 'a@a.com', 'aaaa', '12345678'),
(8, 'aaaa', 'aaaa', 'Maschio', '2022-04-06', 'aaaa', 'aaaaaaaaaaaaaaaa', 'aaaa', 'aaa', 'aa', 1, 'a@a', 'aaaa', '12345678'),
(9, 'aaaa', 'aaaa', 'Maschio', '2022-04-06', 'aaaa', 'aaaaaaaaaaaaaaaa', 'aaaa', 'aaa', 'aa', 1, 'a@a', 'aaaa', '12345678');

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `CODICE_LIBRO` int(11) NOT NULL,
  `CODICE_ISBN` varchar(16) DEFAULT NULL,
  `titolo` varchar(64) DEFAULT NULL,
  `genere` varchar(16) DEFAULT NULL,
  `autore` varchar(64) DEFAULT NULL,
  `editore` varchar(32) DEFAULT NULL,
  `lingua` varchar(16) DEFAULT NULL,
  `edizione` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`CODICE_LIBRO`, `CODICE_ISBN`, `titolo`, `genere`, `autore`, `editore`, `lingua`, `edizione`) VALUES
(1, '979-8668095254', 'Solo Cinque', 'Horror', 'Gaia Valeria Palermo', 'Indipendente', 'Italiano', 1),
(2, '978-8804744139', 'Il regno dei Malvagi', 'Horror', 'Kerri Maniscalco', 'Mondadori', 'Italiano', 1),
(3, '978-8854511675', 'Niente di nuovo sul fronte occidentale', 'Storico', 'Erich Maria Remarque', 'Neri Pozza', 'Italiano', 1),
(4, '978-8893782517', 'Quell`estate del `48. 1948: il dopoguerra del commissario Novare', 'Storico', 'Matteo Tamburelli', 'Panda Edizioni', 'Italiano', 1),
(5, '978-8817148665', 'Il cielo stellato fa le fusa', 'Satira', 'Chiara Francini', 'Rizzoli', 'Italiano', 1),
(6, '978-8822749765', 'La fattoria degli animali', 'Politica', 'George Orwell', 'Newton Compton Editori', 'Italiano', 2),
(7, '111-1111111111', 'prova', 'natura', 'Zhao Luca', 'Libre', 'Italiano', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `prestiti`
--

CREATE TABLE `prestiti` (
  `ID` int(11) NOT NULL,
  `data_inizio` date DEFAULT NULL,
  `data_fine` date DEFAULT NULL,
  `data_restituzione` date DEFAULT NULL COMMENT 'data effettiva di restutizione',
  `ID_LIBRO` int(11) DEFAULT NULL,
  `ID_LETTORE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prestiti`
--

INSERT INTO `prestiti` (`ID`, `data_inizio`, `data_fine`, `data_restituzione`, `ID_LIBRO`, `ID_LETTORE`) VALUES
(1, '2019-11-23', '2019-11-27', NULL, 1, 1),
(2, '2020-01-11', '2020-02-01', NULL, 3, 3),
(3, '2020-03-14', '2020-03-28', NULL, 2, 1),
(16, '2022-04-15', '2022-04-16', NULL, 4, 1),
(17, '2022-04-15', '2022-04-16', '2022-04-15', 5, 8),
(18, '2022-04-15', '2022-04-20', NULL, 5, 8);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `copie`
--
ALTER TABLE `copie`
  ADD PRIMARY KEY (`id_copia`);

--
-- Indici per le tabelle `lettori`
--
ALTER TABLE `lettori`
  ADD PRIMARY KEY (`CODICE_LETTORE`);

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`CODICE_LIBRO`);

--
-- Indici per le tabelle `prestiti`
--
ALTER TABLE `prestiti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LIBRO` (`ID_LIBRO`),
  ADD KEY `ID_LETTORE` (`ID_LETTORE`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `copie`
--
ALTER TABLE `copie`
  MODIFY `id_copia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `lettori`
--
ALTER TABLE `lettori`
  MODIFY `CODICE_LETTORE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `CODICE_LIBRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `prestiti`
--
ALTER TABLE `prestiti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prestiti`
--
ALTER TABLE `prestiti`
  ADD CONSTRAINT `prestiti_ibfk_1` FOREIGN KEY (`ID_LIBRO`) REFERENCES `libri` (`CODICE_LIBRO`),
  ADD CONSTRAINT `prestiti_ibfk_2` FOREIGN KEY (`ID_LETTORE`) REFERENCES `lettori` (`CODICE_LETTORE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
