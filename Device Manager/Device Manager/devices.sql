-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Sun 14.Jún 2026, 15:23
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `device_manager`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `inventory_number` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `devices`
--

INSERT INTO `devices` (`id`, `inventory_number`, `type`, `brand`, `model`, `status_id`) VALUES
(1, 'PC-01', 'Počítač', 'Lenovo', 'ThinkCentre', 1),
(2, 'PC-02', 'Počítač', 'Lenovo', 'ThinkCentre', 1),
(3, 'NB-01', 'Notebook', 'Asus', 'Zenbook', 1),
(4, 'NB-02', 'Notebook', 'HP', 'ProBook', 2),
(5, 'MON-01', 'Monitor', 'Dell', '24-palcový', 1),
(6, 'MON-02', 'Monitor', 'Dell', '24-palcový', 2),
(7, 'KEY-01', 'Klávesnica', 'Logitech', 'K120', 1),
(8, 'MOU-01', 'Myš', 'Logitech', 'M185', 1),
(9, 'PRN-01', 'Tlačiareň', 'HP', 'LaserJet', 2);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
