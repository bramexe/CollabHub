-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2026 at 12:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `campaigns`
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
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `role`, `specialty_id`, `bio`, `profile_picture`, `password`) VALUES
(2, 'Bram Neij', 'bramn.s@hotmail.com', '06 10370920', 'admin', 189, '', '', '$2y$10$q71pXglO685NlXTOpkGz/OsVVJPRbXbkFaKiCEyC06YTa5w4THPR2'),
(3, 'Bram Neij', 'bramn@hotmail.com', '06 10370921', 'creator', 190, '', '', '$2y$10$5OZU7rQEhDFArDVJ3CG71.ng6JGNmL5nRTjZ2EUmkmxRsnUAsLMVm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
