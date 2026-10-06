-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 okt 2026 om 23:08
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collabhub`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `availability`
--

CREATE TABLE `availability` (
  `user_id` int(11) NOT NULL,
  `monday_availability` varchar(25) NOT NULL,
  `tuesday_availability` varchar(25) NOT NULL,
  `wednesday_availability` varchar(25) NOT NULL,
  `thursday_availability` varchar(25) NOT NULL,
  `friday_availability` varchar(25) NOT NULL,
  `saturday_availability` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `availability`
--

INSERT INTO `availability` (`user_id`, `monday_availability`, `tuesday_availability`, `wednesday_availability`, `thursday_availability`, `friday_availability`, `saturday_availability`) VALUES
(4, '10:30 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `manager_id` int(10) NOT NULL,
  `creators_ids` varchar(50) NOT NULL,
  `budget_max` int(30) NOT NULL,
  `budget_min` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `description`, `manager_id`, `creators_ids`, `budget_max`, `budget_min`, `start_date`, `end_date`, `status`) VALUES
(1, 'Campaign One', 'Description!\r\n', 4, '', 300, 150, '2006-12-19', '2008-05-29', 'Created'),
(4, 'Spaans', 'Spanish', 4, '', 300000, 150000, '2255-12-18', '2002-12-18', 'Created'),
(10, 'My second campaign!', 'Desc', 4, '', 75000, 25000, '0000-00-00', '0000-00-00', 'Created'),
(12, 'Campaignee', 'Descriptaones', 4, '', 12345, 1234, '0000-00-00', '0000-00-00', 'Created');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `campaign_connections`
--

CREATE TABLE `campaign_connections` (
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `campaign_connections`
--

INSERT INTO `campaign_connections` (`campaign_id`, `user_id`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `content`, `title`, `status`) VALUES
(1, 4, 'You have successfully made a new campaign: lalalal', 'New Campaign', 'Read'),
(2, 4, 'You have successfully made a new campaign: My second campaign!', 'New Campaign', 'Read'),
(3, 4, 'You have successfully made a new campaign: Bram Neij', 'New Campaign', 'unread'),
(4, 4, 'You have successfully made a new campaign: Campaignee', 'New Campaign', 'unread'),
(7, 5, 'You have been invited by Bram Neji to participate in their campaign: Campaign One <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=5&campaign_id=1>Accept?</a>', 'Campaign Invite: Campaign One', 'Read');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `specialties`
--

INSERT INTO `specialties` (`id`, `name`) VALUES
(106, 'YouTuber'),
(107, 'Influencer'),
(108, 'Content Creator'),
(109, 'Streamer'),
(110, 'Twitch Streamer'),
(111, 'TikTok Creator'),
(112, 'Instagram Creator'),
(113, 'Social Media Creator'),
(114, 'Blogger'),
(115, 'Vlogger'),
(116, 'Podcaster'),
(117, 'Podcast Host'),
(118, 'Live Streamer'),
(119, 'Video Creator'),
(120, 'Short-Form Video Creator'),
(121, 'Long-Form Video Creator'),
(122, 'Photographer'),
(123, 'Videographer'),
(124, 'Cinematographer'),
(125, 'Film Director'),
(126, 'Film Producer'),
(127, 'Video Editor'),
(128, 'Film Editor'),
(129, 'Photo Editor'),
(130, 'Content Editor'),
(131, 'Drone Photographer'),
(132, 'Drone Videographer'),
(133, 'Event Photographer'),
(134, 'Portrait Photographer'),
(135, 'Wedding Photographer'),
(136, 'Product Photographer'),
(137, 'Fashion Photographer'),
(138, 'Sports Photographer'),
(139, 'Travel Photographer'),
(140, 'Nature Photographer'),
(141, 'Wildlife Photographer'),
(142, 'Street Photographer'),
(143, 'Food Photographer'),
(144, 'Commercial Photographer'),
(145, 'Lifestyle Photographer'),
(146, 'Fashion Model'),
(147, 'Commercial Model'),
(148, 'Fitness Model'),
(149, 'Photomodel'),
(150, 'Actor'),
(151, 'Actress'),
(152, 'Voice Actor'),
(153, 'Voice Over Artist'),
(154, 'Comedian'),
(155, 'Stand-Up Comedian'),
(156, 'Entertainer'),
(157, 'Host'),
(158, 'Presenter'),
(159, 'TV Presenter'),
(160, 'Radio Host'),
(161, 'Musician'),
(162, 'Singer'),
(163, 'Rapper'),
(164, 'Songwriter'),
(165, 'Music Producer'),
(166, 'DJ'),
(167, 'Composer'),
(168, 'Beat Producer'),
(169, 'Instrumentalist'),
(170, 'Guitarist'),
(171, 'Pianist'),
(172, 'Drummer'),
(173, 'Dancer'),
(174, 'Choreographer'),
(175, 'Artist'),
(176, 'Digital Artist'),
(177, 'Illustrator'),
(178, 'Painter'),
(179, 'Sketch Artist'),
(180, 'Character Artist'),
(181, 'Concept Artist'),
(182, 'Comic Artist'),
(183, 'Pixel Artist'),
(184, 'Animator'),
(185, '2D Animator'),
(186, '3D Artist'),
(187, '3D Animator'),
(188, 'Motion Graphics Artist'),
(189, 'VFX Artist'),
(190, 'Makeup Artist'),
(191, 'Hair Stylist'),
(192, 'Fashion Designer'),
(193, 'Stylist'),
(194, 'Costume Designer'),
(195, 'Craft Creator'),
(196, 'DIY Creator'),
(197, 'Cooking Creator'),
(198, 'Food Creator'),
(199, 'Fitness Creator'),
(200, 'Travel Creator'),
(201, 'Beauty Creator'),
(202, 'Fashion Creator'),
(203, 'Gaming Creator'),
(204, 'Educational Creator'),
(205, 'Review Creator'),
(206, 'Lifestyle Creator');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `specialty_id` int(10) NOT NULL,
  `bio` varchar(400) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `role`, `specialty_id`, `bio`, `profile_picture`, `password`) VALUES
(2, 'Bram Neij', 'bramn.s@hotmail.com', '06 10370920', 'admin', 189, '', '', '$2y$10$q71pXglO685NlXTOpkGz/OsVVJPRbXbkFaKiCEyC06YTa5w4THPR2'),
(3, 'Bram Neij', 'bramn@hotmail.com', '06 10370921', 'creator', 190, '', '', '$2y$10$5OZU7rQEhDFArDVJ3CG71.ng6JGNmL5nRTjZ2EUmkmxRsnUAsLMVm'),
(4, 'Bram Neji', 'bramn.sas@hotmail.com', '+31 610370926', 'manager', 185, 'this my desc', '', '$2y$10$7xvwFy1eTYKyiqdO2SpSduU.krfMqpDQcKYfuTljFtHpuKDEgE2ua'),
(5, 'Bram Neij', 'bramn.aas@hotmail.com', '+31 61037032', 'creator', 167, '', '', '$2y$10$P9NrfVVPgSwPeqT4n1oZCO6bSJVLhr6LaxDunV2TYoIPEk.Z67LOe');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
