-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 03:11 PM
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
-- Database: `betterhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `created_at`, `user_id`) VALUES
(25, 'The Power of a Good Night\'s Sleep', 'Arthur Matthew', 'In our fast-paced world, sleep often gets pushed to the bottom of the priority list. However, consistently getting enough quality sleep is foundational to good health. Far from just resting, your body is busy repairing cells, consolidating memories, and balancing hormones during sleep. Chronic sleep deprivation can lead to a host of problems, including impaired cognitive function, a weakened immune system, increased risk of chronic diseases like diabetes and heart disease, and even weight gain. Aim for 7-9 hours of sleep per night for most adults, and try to establish a consistent sleep schedule, even on weekends. Your mind and body will thank you.', '2025-05-30 12:50:36', 208),
(26, 'Hydration: Your Body\'s Essential Fuel', 'Glenn Marvelino', 'Often overlooked, proper hydration is absolutely crucial for almost every bodily function. Water helps transport nutrients, regulate body temperature, lubricate joints, and remove waste products. Even mild dehydration can lead to fatigue, headaches, decreased concentration, and impaired physical performance. While the \"eight glasses a day\" rule is a good general guideline, individual needs vary based on activity level, climate, and overall health. Listen to your body – thirst is a key indicator. Keep a water bottle handy throughout the day and consider adding hydrating foods like fruits and vegetables to your diet.', '2025-05-30 12:52:44', 208),
(27, 'Move More, Feel Better: The Simple Joy of Physical Activity', 'Xaverio Rafel', 'You don\'t need to be a marathon runner to reap the benefits of physical activity. Even small, consistent movements throughout your day can make a significant difference to your physical and mental well-being. Regular physical activity helps maintain a healthy weight, strengthens your bones and muscles, boosts your mood, improves sleep quality, and reduces your risk of chronic diseases. Find activities you enjoy, whether it\'s walking, dancing, gardening, or cycling. Aim for at least 30 minutes of moderate-intensity activity most days of the week, and remember: every bit of movement counts!', '2025-05-30 12:53:45', 208);

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE `article_likes` (
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `liked_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `tutor_name` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `pfp_url` varchar(255) NOT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `tutor_name`, `bio`, `pfp_url`, `status`, `created_at`, `user_id`) VALUES
(1, 'Chung', 'lalalala', 'uploads/person1.webp', 'rejected', '2025-05-21 15:32:10', 201),
(7, 'Tutor1', 'Bio', 'uploads/person2.webp', 'accepted', '2025-05-24 09:36:40', 208);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_subscribe`
--

CREATE TABLE `tutor_subscribe` (
  `user_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subscribed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_tutor` tinyint(1) NOT NULL DEFAULT 0,
  `pfp_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `is_tutor`, `pfp_url`) VALUES
(12, 'booleanW', 'devicantik@gmail.com', '$2y$10$IUBdwTqukR31.AM1WcEw3OekJ4U5KLCDzCYMVVQJTQ3zFqvEb9om.', 1, 0, ''),
(201, 'testadmin', 'admin@example.com', '$2y$10$w7llWFEzaawsdE5zvr4iM.FTVrLHjxjUggBhbu7ejpzz48RbmxZEW', 1, 0, ''),
(208, 'test', 'test@gmail.com', '$2y$10$SVAYavpr7pt2L.lGXoPqy.xgWff8/.7dRHs5he65r1SY3beAfjrXm', 0, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_user` (`user_id`);

--
-- Indexes for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD PRIMARY KEY (`user_id`,`article_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tutors_user` (`user_id`);

--
-- Indexes for table `tutor_subscribe`
--
ALTER TABLE `tutor_subscribe`
  ADD PRIMARY KEY (`user_id`,`tutor_id`),
  ADD KEY `tutor_subscribe_ibfk_2` (`tutor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD CONSTRAINT `article_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_likes_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `fk_tutors_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutor_subscribe`
--
ALTER TABLE `tutor_subscribe`
  ADD CONSTRAINT `tutor_subscribe_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_subscribe_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
