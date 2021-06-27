-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Gru 2020, 10:04
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `epiz_28991790_wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `klient_id` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(50) DEFAULT NULL,
  `PESEL` int(11) DEFAULT NULL,
  `ulica` varchar(60) DEFAULT NULL,
  `numer_domu` varchar(6) DEFAULT NULL,
  `numer_mieszkania` varchar(6) DEFAULT NULL,
  `kod_pocztowy` varchar(5) DEFAULT NULL,
  `miejscowosc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`klient_id`, `imie`, `nazwisko`, `PESEL`, `ulica`, `numer_domu`, `numer_mieszkania`, `kod_pocztowy`, `miejscowosc`) VALUES
(103, 'Radosław', 'Kozłowski', 2147483647, 'Bawarka', '12a', '', '99-41', 'Warszawa'),
(104, 'Maciej', 'Janiak', 2147483644, 'Polna', '45', '', '99-73', 'Poznań');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marka`
--

CREATE TABLE `marka` (
  `marka_id` int(11) NOT NULL,
  `nazwa_marki` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `marka`
--

INSERT INTO `marka` (`marka_id`, `nazwa_marki`) VALUES
(1, 'Aston Martin'),
(2, 'Cadillac'),
(3, 'Bentley'),
(4, 'Bugatti'),
(5, 'Dodge'),
(6, 'Ferrari'),
(7, 'Hummer'),
(8, 'Lamborghini'),
(9, 'Maybach'),
(10, 'McLaren'),
(11, 'Rolls-Royce');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `nazwa_modelu` varchar(50) DEFAULT NULL,
  `marka_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `model`
--

INSERT INTO `model` (`model_id`, `nazwa_modelu`, `marka_id`) VALUES
(1, 'DB11', 1),
(3, 'DB9', 1),
(4, 'DBS', 1),
(5, 'Rapide', 1),
(6, 'ATS', 2),
(7, 'Escalade', 2),
(8, 'XT5', 2),
(9, 'Mulsanne', 3),
(10, 'Continental GT', 3),
(11, 'Bentayga', 3),
(12, 'Chiron', 4),
(13, 'Challenger', 5),
(14, 'Charger', 5),
(15, '488', 6),
(16, '812 Superfast', 6),
(17, '458 Italia', 6),
(18, 'H3', 7),
(19, 'Aventador', 8),
(20, 'Urus', 8),
(21, 'Huracan', 8),
(22, '62', 9),
(23, '720S Spider', 10),
(24, 'Altul', 10),
(25, '600LT Spider', 10),
(26, 'Cullinan', 11),
(27, 'Wraith', 11),
(28, 'Ghost', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pojazd`
--

CREATE TABLE `pojazd` (
  `pojazd_id` int(11) NOT NULL,
  `model` int(11) DEFAULT NULL,
  `numer_rejestracyjny` varchar(7) DEFAULT NULL,
  `rok_produkcji` int(11) DEFAULT NULL,
  `moc_silnika` varchar(6) DEFAULT NULL,
  `rodzaj_paliwa` varchar(30) DEFAULT NULL,
  `rodzaj_napedu` varchar(30) DEFAULT NULL,
  `rodzaj_skrzyni_biegow` varchar(20) DEFAULT NULL,
  `wartosc_katalogowa` int(11) DEFAULT NULL,
  `wypozyczony` int(11) DEFAULT NULL,
  `zdjecie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pojazd`
--

INSERT INTO `pojazd` (`pojazd_id`, `model`, `numer_rejestracyjny`, `rok_produkcji`, `moc_silnika`, `rodzaj_paliwa`, `rodzaj_napedu`, `rodzaj_skrzyni_biegow`, `wartosc_katalogowa`, `wypozyczony`, `zdjecie`) VALUES
(1, 1, 'ERA10TE', 2018, '500', 'Benzyna', 'Tylne koła', 'Automatyczna', 1267949, 0, '1.jpg'),
(2, 4, 'ERA29RS', 2009, '517', 'Diesel', 'Tylne koła', 'Automatyczna', 599900, 0, '2.jpg'),
(3, 9, 'ERA38FZ', 2020, '537', 'Elektryczny', 'Przednie koła', 'Manualna', 1900000, 0, '3.jpg'),
(4, 10, 'ERA47AX', 2020, '551', 'Benzyna', 'Przednie koła', 'Manualna', 1625000, 0, '4.jpg'),
(5, 12, 'ERA56CV', 2019, '1500', 'Benzyna', '4x4', 'Automatyczna', 17700000, 0, '5.jpg'),
(6, 15, 'ERA65NA', 2018, '721', 'Diesel', 'Tylne koła', 'Manualna', 2150000, 0, '6.jpg'),
(7, 16, 'ERA74BR', 2020, '800', 'Elektryczny', 'Tylne koła', 'Automatyczna', 1900000, 0, '7.jpg'),
(8, 19, 'ERA83ZU', 2018, '756', 'Diesel', '4x4', 'Automatyczna', 2500000, 0, '8.jpg'),
(9, 20, 'ERA92QB', 2020, '650', 'Benzyna', '4x4', 'Automatyczna', 1673551, 0, '9.jpg'),
(10, 22, 'ERA11OC', 2006, '550', 'Elektryczny', 'Tylne koła', 'Manualna', 1414500, 0, '10.jpg'),
(11, 23, 'ERA43JG', 2019, '720', 'Benzyna', 'Przednie koła', 'Automatyczna', 1862200, 0, '11.jpg'),
(12, 24, 'ERA22OS', 2019, '712', 'Diesel', 'Tylne koła', 'Manualna', 1843000, 0, '12.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenie`
--

CREATE TABLE `wypozyczenie` (
  `wypozyczenie_id` int(11) NOT NULL,
  `klient_id` int(11) DEFAULT NULL,
  `pojazd_id` int(11) DEFAULT NULL,
  `data_od` date DEFAULT NULL,
  `data_do` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wypozyczenie`
--

INSERT INTO `wypozyczenie` (`wypozyczenie_id`, `klient_id`, `pojazd_id`, `data_od`, `data_do`) VALUES
(47, 103, 2, '2020-12-07', '2020-12-07'),
(48, 103, 2, '2020-12-07', '2020-12-07'),
(49, 103, 6, '2020-12-07', '2020-12-07'),
(50, 103, 1, '2020-12-07', '2020-12-07'),
(51, 103, 9, '2020-12-02', '2020-12-07'),
(52, 103, 8, '2020-12-08', '2020-12-08');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`klient_id`);

--
-- Indeksy dla tabeli `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`marka_id`);

--
-- Indeksy dla tabeli `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `marka_id` (`marka_id`);

--
-- Indeksy dla tabeli `pojazd`
--
ALTER TABLE `pojazd`
  ADD PRIMARY KEY (`pojazd_id`),
  ADD KEY `model` (`model`);

--
-- Indeksy dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD PRIMARY KEY (`wypozyczenie_id`),
  ADD KEY `klient_id` (`klient_id`),
  ADD KEY `pojazd_id` (`pojazd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `klient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT dla tabeli `marka`
--
ALTER TABLE `marka`
  MODIFY `marka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `pojazd`
--
ALTER TABLE `pojazd`
  MODIFY `pojazd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  MODIFY `wypozyczenie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`marka_id`);

--
-- Ograniczenia dla tabeli `pojazd`
--
ALTER TABLE `pojazd`
  ADD CONSTRAINT `pojazd_ibfk_1` FOREIGN KEY (`model`) REFERENCES `model` (`model_id`);

--
-- Ograniczenia dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD CONSTRAINT `wypozyczenie_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`klient_id`),
  ADD CONSTRAINT `wypozyczenie_ibfk_2` FOREIGN KEY (`pojazd_id`) REFERENCES `pojazd` (`pojazd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
