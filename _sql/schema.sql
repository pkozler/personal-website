-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 02. zář 2018, 18:00
-- Verze serveru: 10.1.31-MariaDB
-- Verze PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `portfolio`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `ips`
--

CREATE TABLE `ips` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipv6` varbinary(16) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_total_count` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `access_peak_frequency` float(6,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `has_ban` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `is_censored` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `text` text COLLATE utf8_czech_ci NOT NULL,
  `last_edit_in` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `submit_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_id` int(10) UNSIGNED DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8_czech_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password_hash` binary(60) NOT NULL,
  `nickname` int(11) DEFAULT NULL,
  `recovery_code_hash` char(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `activation_code_hash` char(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_logged_in` timestamp NULL DEFAULT NULL,
  `recovery_expires_on` datetime DEFAULT NULL,
  `registered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipv6` (`ipv6`);

--
-- Klíče pro tabulku `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `ips`
--
ALTER TABLE `ips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
