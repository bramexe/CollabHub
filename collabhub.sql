-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 okt 2026 om 20:01
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
(4, '10:30 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', ''),
(7, '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '09:00 - 17:00', '');

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
(20, 'Campaign 1', 'My first campaign as a campaign manager!\r\n', 7, '', 30000, 25000, '0000-00-00', '0000-00-00', 'Created');

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
(20, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `content`, `title`, `status`, `creation_datetime`) VALUES
(7, 5, 'You have been invited by Bram Neji to participate in their campaign: Campaign One <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=5&campaign_id=1>Accept?</a>', 'Campaign Invite: Campaign One', 'Read', '2026-10-07 00:00:00'),
(8, 5, 'You have been invited by Bram Neji to participate in their campaign: Campaign One <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=5&campaign_id=1>Accept?</a>', 'Campaign Invite: Campaign One', 'Read', '2026-10-07 00:00:00'),
(9, 3, 'You have been invited by Bram Neji to participate in their campaign: Campaign One <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=3&campaign_id=1>Accept?</a>', 'Campaign Invite: Campaign One', 'Read', '2026-10-07 08:36:06'),
(10, 3, 'You have been invited by Bram Neji to participate in their campaign: Campaign One <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=3&campaign_id=1>Accept?</a>', 'Campaign Invite: Campaign One', 'Read', '2026-10-07 08:37:02'),
(20, 5, 'You have been invited by Bram Neji to participate in their campaign: MyCampaign <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=5&campaign_id=18>Accept?</a>', 'Campaign Invite: MyCampaign', 'Read', '2026-10-07 14:58:25'),
(21, 4, 'You have successfully made a new campaign: LevelUP', 'New Campaign', 'Read', '2026-10-07 18:40:37'),
(29, 5, 'You have been invited by <a href=../pages/foreign_profile.php?foreign_id=4&backpage=inbox>Bram Neji</a> to participate in their campaign: LevelUP <a href=../includes/accept_invite.inc.php?manager_id=4&user_id=5&campaign_id=19>Accept?</a> <a href=../includes/decline_invite.inc.php?manager_id=4&campaign_id=19&user_id=5>Decline</a>', 'Campaign Invite: LevelUP', 'Read', '2026-10-07 19:10:20'),
(30, 4, 'Your invite for campaign: LevelUP has been declined by Bram Neij.', 'Invite Declined', 'Read', '2026-10-07 19:14:29'),
(31, 4, 'You successfully updated campaign: LevelU.', 'Updated Campaign', 'Read', '2026-10-07 19:37:16'),
(32, 2, 'The campaign:  LevelU was updated.', 'Updated Campaign', 'Read', '2026-10-07 19:37:16'),
(33, 7, 'You have successfully made a new campaign: Campaign 1', 'New Campaign', 'Read', '2026-10-07 19:46:29'),
(34, 6, 'You have been invited by <a href=../pages/foreign_profile.php?foreign_id=7&backpage=inbox>Bram Neij</a> to participate in their campaign: Campaign 1 <a href=../includes/accept_invite.inc.php?manager_id=7&user_id=6&campaign_id=20>Accept?</a> <a href=../includes/decline_invite.inc.php?manager_id=7&campaign_id=20&user_id=6>Decline</a>', 'Campaign Invite: Campaign 1', 'Read', '2026-10-07 19:48:52'),
(35, 7, 'You successfully updated campaign: Campaign 1.', 'Updated Campaign', 'Read', '2026-10-07 19:49:57'),
(36, 6, 'The campaign:  Campaign 1 was updated.', 'Updated Campaign', 'Read', '2026-10-07 19:49:57');

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
  `password` varchar(255) NOT NULL,
  `creation_datetime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `role`, `specialty_id`, `bio`, `profile_picture`, `password`, `creation_datetime`) VALUES
(2, 'Bram Neij', 'bramn.s@hotmail.com', '06 10370920', 'admin', 189, '', '', '$2y$10$q71pXglO685NlXTOpkGz/OsVVJPRbXbkFaKiCEyC06YTa5w4THPR2', '2026-10-07'),
(3, 'Bram Neij', 'bramn@hotmail.com', '06 10370921', 'creator', 190, '', '', '$2y$10$5OZU7rQEhDFArDVJ3CG71.ng6JGNmL5nRTjZ2EUmkmxRsnUAsLMVm', '2026-10-07'),
(4, 'Bram Neji', 'bramn.sas@hotmail.com', '+31 610370926', 'manager', 185, 'this my desc', '', '$2y$10$7xvwFy1eTYKyiqdO2SpSduU.krfMqpDQcKYfuTljFtHpuKDEgE2ua', '2026-10-07'),
(5, 'Bram Neij', 'bramn.aas@hotmail.com', '+31 61037032', 'creator', 167, '', '', '$2y$10$P9NrfVVPgSwPeqT4n1oZCO6bSJVLhr6LaxDunV2TYoIPEk.Z67LOe', '2026-10-07'),
(6, 'Bartje', 'creator@hotmail.com', '06148235843', 'creator', 147, 'my description', '', '$2y$10$SlNCGidIDilI/DsUPBHy2eu7pvDzjV28E0qsodJVvm7c9U76xGJXW', '2026-10-07'),
(7, 'Bram Neij', 'manager@hotmail.com', '06 12345678', 'manager', 150, '', '', '$2y$10$7ERVSuCXPEkFud2AfvlhOu6Fr3RHvLCHLOka2DmXgoXV0WGmGmxrK', '2026-10-07');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT voor een tabel `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
