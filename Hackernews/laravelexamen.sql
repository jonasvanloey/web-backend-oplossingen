-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jan 2017 om 11:53
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelexamen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `user_ID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `url`, `votes`, `user_ID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'soft deleting', 'https://laravel.com/docs/5.3/eloquent#soft-deleting', 0, 1, '2017-01-23 16:35:22', '2017-01-23 16:45:21', '2017-01-23 16:45:21'),
(2, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 16:47:01', '2017-01-23 16:53:36', '2017-01-23 16:53:36'),
(3, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 16:54:22', '2017-01-23 16:54:30', '2017-01-23 16:54:30'),
(4, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 16:54:59', '2017-01-23 16:55:07', '2017-01-23 16:55:07'),
(5, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 16:55:48', '2017-01-23 16:55:55', '2017-01-23 16:55:55'),
(6, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 16:56:46', '2017-01-23 16:56:53', '2017-01-23 16:56:53'),
(7, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 16:58:57', '2017-01-23 16:59:04', '2017-01-23 16:59:04'),
(8, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 17:46:18', '2017-01-23 18:26:14', '2017-01-23 18:26:14'),
(9, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 18:28:48', '2017-01-23 18:28:56', '2017-01-23 18:28:56'),
(10, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-23 18:29:52', '2017-01-23 18:29:59', '2017-01-23 18:29:59'),
(11, 'bootstrap', 'http://getbootstrap.com/components/', 2, 1, '2017-01-23 18:31:03', '2017-01-23 21:46:23', '2017-01-23 21:46:23'),
(12, 'bootstrap2', 'http://getbootstrap.com/components/', -1, 1, '2017-01-23 18:37:04', '2017-01-24 10:13:09', '2017-01-24 10:13:09'),
(13, 'laracast', 'https://laracasts.com/series/laravel-5-fundamentals/episodes/14', 0, 1, '2017-01-23 18:48:53', '2017-01-23 21:46:18', '2017-01-23 21:46:18'),
(14, 'laracast', 'https://laracasts.com/series/laravel-5-fundamentals/episodes/14', 0, 1, '2017-01-23 21:47:00', '2017-01-23 21:47:05', '2017-01-23 21:47:05'),
(15, 'bootstrap', 'http://getbootstrap.com/components/', 0, 1, '2017-01-24 10:13:51', '2017-01-24 10:20:01', '2017-01-24 10:20:01'),
(16, 'ghkjhknbnb', 'http://getbootstrap.com/components/', 3, 1, '2017-01-24 10:20:11', '2017-01-24 11:14:07', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `text`, `article_ID`, `user_ID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'interesting', 1, 1, '2017-01-23 16:35:34', '2017-01-23 16:35:34', NULL),
(5, 'rgt(r(§y§', 8, 1, '2017-01-23 17:46:26', '2017-01-23 17:46:26', NULL),
(17, 'test', 11, 1, '2017-01-23 21:13:22', '2017-01-23 21:13:22', NULL),
(20, 'place\r\n', 11, 1, '2017-01-23 21:19:21', '2017-01-23 21:19:21', NULL),
(22, 'jhyuyjuy', 16, 1, '2017-01-24 10:21:07', '2017-01-24 10:21:07', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2017_01_21_145504_create_articles_table', 1),
(28, '2017_01_21_185457_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jones', 'jvanloey@gmail.com', '$2y$10$tbcJiwiywFtjOZW/yXmtyOr9N1kS3xmeLbJ2Nohr5iKCJHusjG4E.', NULL, '2017-01-23 16:34:50', '2017-01-23 16:34:50');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_ID`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_ID`),
  ADD KEY `comments_article_id_foreign` (`article_ID`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_ID`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
