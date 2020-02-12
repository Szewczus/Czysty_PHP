-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Sty 2020, 10:32
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biuro_podrozy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rejestracja`
--

CREATE TABLE `rejestracja` (
  `id` int(255) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `hasło` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rejestracja`
--

INSERT INTO `rejestracja` (`id`, `imie`, `nazwisko`, `email`, `hasło`) VALUES
(1, 'Ewa', 'Szewczak', 'ewa@gmail.com', '642789e05ffe5f1d47030586af6663a4af420c7a2b799f4e22245ca50065b546'),
(2, 'Ania', 'Szewczak', 'a@gmail.com', '15ca7c08d604be43364be5a39513195d4862cd16852c5d0361e8bad4126b858d'),
(3, 'Ola', 'Szewczak', 'ola@gmail.com', '55a9f4f8994b1bbf2058ea38c8efb6c459000814d5f39c087002571639e6230e'),
(4, 'Adam', 'Nowak', 'adam@gmail.com', 'f7f376a1fcd0d0e11a10ed1b6577c99784d3a6bbe669b1d13fae43eb64634f6e'),
(5, 'Zenek', 'Martyniuk', 'zenek@gmail.com', '5a05e1594418a159976bb16efe8d7c4a9c3622e049f739234a22386f093092f4'),
(6, 'Iza', 'Nieznaj', 'iza@gmail.com', 'bff6dfb654e7585184273eaa5b4b9d67277ce6b1c436b6365a2435096d765f99'),
(7, 'Anakin', 'Skywalker', 'ani@holo.net', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(8, 'Bartłomiej', 'Wieleba', 'wileba@wp.pl', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(9, 'Kuba', 'Kowalik', 'kowalik@gmail.com', '12b4555c3814009593a075a7cc91d7c0616951f8e81320d2c4ed45862353c6eb'),
(10, 'Tomasz', 'Kot', 'tomek@k.pl', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(11, 'Anna', 'Szewczak', 'ania@gmail.com', '15ca7c08d604be43364be5a39513195d4862cd16852c5d0361e8bad4126b858d');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id` int(255) NOT NULL,
  `userId` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nazwa_wycieczki` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `data_rozpoczecia` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`id`, `userId`, `nazwa_wycieczki`, `data_rozpoczecia`) VALUES
(25, '1', 'Słoneczna przygoda', '15-07-2020 do 28-07-2020'),
(26, '3', 'Malownicze wybrzeże', '12-08-2020 do 16-08-2020'),
(32, '1', 'Słoneczna przygoda', '01-07-2020 do 14-07-2020'),
(33, '8', 'Malownicze wybrzeże', '29-07-2020 do 11-08-2020');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wolne_terminy`
--

CREATE TABLE `wolne_terminy` (
  `wolne_terminy` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wolne_terminy`
--

INSERT INTO `wolne_terminy` (`wolne_terminy`) VALUES
('Słoneczna przygoda 12-08-2020 do 16-08-2020'),
('Malownicze wybrzeże 01-07-2020 do 14-07-2020'),
('Malownicze wybrzeże 15-07-2020 do 28-07-2020'),
('Niezwykła przygoda 01-07-2020 do 14-07-2020'),
('Niezwykła przygoda 15-07-2020 do 28-07-2020'),
('Niezwykła przygoda 29-07-2020 do 11-08-2020'),
('Niezwykła przygoda 12-08-2020 do 16-08-2020');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indeksy dla tabeli `rejestracja`
--
ALTER TABLE `rejestracja`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `rejestracja`
--
ALTER TABLE `rejestracja`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
