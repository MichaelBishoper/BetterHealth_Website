-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 06:15 PM
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
(27, 'Move More, Feel Better: The Simple Joy of Physical Activity', 'Xaverio Rafel', 'You don\'t need to be a marathon runner to reap the benefits of physical activity. Even small, consistent movements throughout your day can make a significant difference to your physical and mental well-being. Regular physical activity helps maintain a healthy weight, strengthens your bones and muscles, boosts your mood, improves sleep quality, and reduces your risk of chronic diseases. Find activities you enjoy, whether it\'s walking, dancing, gardening, or cycling. Aim for at least 30 minutes of moderate-intensity activity most days of the week, and remember: every bit of movement counts!', '2025-05-30 12:53:45', 208),
(28, 'Article`', 'Chung_10', 'This is a cool guide for me', '2025-06-09 15:16:07', 218);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
