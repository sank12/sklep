-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Gru 2015, 03:45
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projektsklep1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa`, `opis`) VALUES
(1, 'Jedzenie', 'Znajdziesz tutaj coś do jedzenia'),
(2, 'Picie', 'Tutaj są róznego rodzaju napoje'),
(3, 'Zabawki', 'Zeczy do zabawy'),
(4, 'Codzienne', 'Zeczy do codziennego uzytku.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE IF NOT EXISTS `magazyn` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` double NOT NULL,
  `obrazek` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `kategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`id_produktu`, `nazwa`, `cena`, `obrazek`, `ilosc`, `opis`, `kategoria`) VALUES
(1, 'Chleb', 1, '', 20, 'Dobry chlebek!', 1),
(2, 'Szyneczka', 5, '', 35, 'Najlepsza szyneczka', 1),
(3, 'Masło', 2, '', 32, 'Najlepsze masło!', 1),
(4, 'Jogurt', 3, '', 23, 'Najlepszy jogurt', 1),
(5, 'Piwo', 3, '', 54, 'Najlepsze piwo w okolicy', 2),
(6, 'Coca-cola', 3, '', 52, 'Coca-cola - kupuj!', 2),
(7, 'Mleko', 2, '', 20, 'Mleko od krówki!', 2),
(8, 'Woda', 1, '', 25, 'Woda źródlana, tylko dla najbiedniejszych', 2),
(9, 'Piłka', 20, '', 15, 'Piłka do gry w piłkę nożną', 3),
(10, 'Puzle', 22, '', 10, 'Puzle do układania!', 3),
(11, 'Klocki lego', 15, '', 24, 'Klocki lego! Śwoetne do zabawy.', 3),
(12, 'Lalki', 12, '', 30, 'Lalki dla małych dziewczynek.', 3),
(13, 'Samochody', 32, '', 25, 'Samochody zabawkowe dla małych chłopców.', 3),
(14, 'Płyty CD/DVD', 1, '', 60, 'Płyty które każdy używa!', 4),
(15, 'Nożyczki', 5, '', 20, 'Nożyczki którymi przetniesz wszystko!', 4),
(16, 'Latarka', 18, '', 30, 'Latarka która oświetli drogę!', 4),
(17, 'Boczek', 4, '', 15, 'Boczek! Wspaniałe mięsiwo.', 1),
(18, 'Wódka', 15, '', 32, 'Najlepsza wódka w okolicy', 2),
(19, 'Baton', 2, '', 14, 'Baton. Najlepszy!', 1),
(20, 'Telefon', 36, '', 15, 'Uniwersalny telefon zabawka!', 3),
(21, 'Gumy', 1, '', 20, 'Gumy do żucia!', 1),
(22, 'Sok', 6, '', 26, 'Soczek naaajlepszy!', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `typ` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `typ`, `email`) VALUES
(1, 'test', 'test', 'testowy', 'naztestowy', 'p', 'test@wp.pl'),
(2, 'test2', 'test2', 'testowy2', 'naztestowy2', 'u', 'test@wp.pl'),
(3, 'test3', 'test3', 'testowy3', 'naztestowy3', 'u', 'test3@wp.pl'),
(4, 'test4', 'test4', 'testowy4', 'naztestowy4', 'p', 'test4@wp.pl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
