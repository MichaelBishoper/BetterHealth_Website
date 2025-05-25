-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 06:41 PM
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
(10, 'Primus', 'Arthur', 'jjjjjjjjjjjjjjj', '2025-05-07 02:04:40', 211),
(11, 'The Time and Place', 'Russell Dean', '\"It is better to keep your mouth closed and let people think you are a fool than to open it and remove all doubt.\"', '2025-05-07 04:19:54', 211),
(12, 'Swiss German University', 'Test Article 5', 'Are Onions Good For Bodybuilding?\r\nIf you’re planning to add bodybuilding to your life, onions might not be the first thing you think about when you think about your bodybuilding diet but they are packed full of nutrients and can be highly beneficial. Vitamins that onions have in them include Vitamin B6 and Vitamin C (like in orange juice), as well as minerals like potassium.\r\n\r\nBut, as you might expect, it is their flavonoids and antioxidants (especially quercetin) that make them really powerful.\r\n\r\nIt is well known that quercetin is anti-inflammatory and an immune enhancer. In other words, for bodybuilders, it means less inflammation in the muscles and a quicker recovery. The anti-oxidative effects also help combat the free radicals created during intense workouts that otherwise would slow down recovery and growth of muscles.', '2025-05-22 13:49:27', 211),
(13, 'Swiss German University', 'Arthur', 'Are Onions Good For Bodybuilding?\r\nIf you’re planning to add bodybuilding to your life, onions might not be the first thing you think about when you think about your bodybuilding diet but they are packed full of nutrients and can be highly beneficial. Vitamins that onions have in them include Vitamin B6 and Vitamin C (like in orange juice), as well as minerals like potassium.\r\n\r\nBut, as you might expect, it is their flavonoids and antioxidants (especially quercetin) that make them really powerful.\r\n\r\nIt is well known that quercetin is anti-inflammatory and an immune enhancer. In other words, for bodybuilders, it means less inflammation in the muscles and a quicker recovery. The anti oxidative effects also help combat the free radicals created during intense workouts that otherwise would slow down recovery and growth of muscles.', '2025-05-22 13:50:43', 211),
(14, 'Clair De Lune', 'The Bussy', 'I love the bussy.', '2025-05-24 13:06:18', 213),
(15, 'Test Article Tutor', 'Account4', 'This is first guide! Please be sure to leave a like and subscribe...', '2025-05-25 15:47:34', 211),
(16, 'This is my guide', 'I am Graha Raya.', 'Graha Raya', '2025-05-25 16:16:51', 211),
(17, 'This is my story', 'I don\'t have time for this shit!', 'Account6', '2025-05-25 16:23:41', 213);

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE `article_likes` (
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `liked_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_likes`
--

INSERT INTO `article_likes` (`user_id`, `article_id`, `liked_at`) VALUES
(210, 14, '2025-05-24 23:09:35'),
(211, 14, '2025-05-25 21:55:52');

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
(1, 'Chung', 'lalalala', 'uploads/682df1fa977ea_BetterHealth_Banner.png', 'pending', '2025-05-21 15:32:10', 201),
(2, '[TestTutor]', '[This is my bio]', '[\"C:xampphtdocsTempBetterBetterHealthhtmlimagesanner-bg.png\"]', '', '2025-05-22 02:31:15', 202),
(3, 'tutor123', 'aoiefoweihfwef', 'uploads/682e8cd7d0e29_fruit.jpg', 'pending', '2025-05-22 02:32:55', 203),
(4, 'Orlean Wesley', 'I am Orlean Wesley', 'uploads/682ff5a89eb11_banner-bg.png', 'pending', '2025-05-23 04:12:24', 204),
(5, 'Orlean Wesleys', 'I am Orlean Wesley', 'uploads/682ff70b42cd5_BetterHealth_Banner.png', 'accepted', '2025-05-23 04:18:19', 205),
(6, 'Arthur', 'ilshw', 'uploads/68318c69af0ae_img3.jpg', 'accepted', '2025-05-24 09:07:53', 206),
(7, 'Arthur2', 'ilshw2', 'uploads/6831932856054_img3.jpg', 'accepted', '2025-05-24 09:36:40', 208),
(8, 'Deddy', 'I want to be a deddy', 'uploads/6831b81eaa695_BetterHealth_Banner.png', 'accepted', '2025-05-24 12:14:22', 210),
(9, 'Graha Raya', 'I am Graha Raya....', 'uploads/6831bd5ef2a2c_fruit.jpg', 'accepted', '2025-05-24 12:36:46', 211),
(10, 'i am account5', 'i am shrek', 'uploads/6831c03834ebf_Tutor_1.jpg', 'accepted', '2025-05-24 12:48:56', 212),
(11, 'hilarius russel', 'I am a fitness expert', 'uploads/6831c3b668693_Tutor_3.jpg', 'accepted', '2025-05-24 13:03:50', 209),
(12, 'Xaverius', 'The Best Tutor', 'uploads/6832ac3771ba8_default_pfp.png', 'accepted', '2025-05-25 05:35:51', 213);

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
(13, 'Pantek88', 'p@gmail.com', '$2y$10$/cXDXNURb/Kl4IiijVlSV.sEFYbant1OUXuk/Dt7Ab47Fli3gG6vK', 0, 0, ''),
(100, 'Admin', 'Admin@email.com', 'Admin123', 1, 0, ''),
(201, 'testadmin', 'admin@example.com', '$2y$10$w7llWFEzaawsdE5zvr4iM.FTVrLHjxjUggBhbu7ejpzz48RbmxZEW', 1, 0, ''),
(202, 'memek221', 'kk@email.c', '$2y$10$4O7cL4k2Yxd5SiI/9WwTNubFvP.J1hpy4gScprh9JsiXKF1n2UEli', 0, 0, ''),
(203, 'hahahaha123', 'aa@gmail.com', '$2y$10$RBOdasOofvCTHD4xeFmmLekWoXsv23goan1j/18oUXzFit2eKy8l6', 0, 0, ''),
(204, 'jethroshutup', 'jethro@gmail.com', '$2y$10$o9gZww0pceVCWIK31FGfheGwst0SvL7JFp0hXNCR5z5PBzSfLHwtG', 0, 0, ''),
(205, 'hikmahcorp', 'himah@corpo.com', '$2y$10$yj6uaBnoY/rxYe5cS4LXHOkxqnszgPvm3ZwxlffQUUiyGEHIV3Uvu', 0, 1, ''),
(206, 'james_g', 'james@gmail.com', '$2y$10$fUd.kT1I0olXWYVbviELU.Nq.2ebKfz8n/cv2jLaRDuWOW0xXUtCS', 0, 1, ''),
(207, 'kontol111', 'kontol111@gmail.com', '$2y$10$10nlfKoeDRleDLGP6WR.FeZkOx4zqOaADCVWujtZ7uhKP1nxbdgem', 0, 0, ''),
(208, 'test', 'test@gmail.com', '$2y$10$SVAYavpr7pt2L.lGXoPqy.xgWff8/.7dRHs5he65r1SY3beAfjrXm', 0, 1, ''),
(209, 'account2', 'account2@email.com', '$2y$10$Jp/TNrKSjbSJxiLNpy7l8eY8iDHoVM8qUQ.DzBboj90H2MsyCvdEy', 0, 1, ''),
(210, 'account3', 'account3@gmail.com', '$2y$10$vxcwPpA6HVQmb7Ih7lp6VemAwEJivMnPSmr6hLmc6.DM/5cj31IVy', 1, 0, ''),
(211, 'account4', 'account4@gmail.com', '$2y$10$i9D4kqWsM92MYjP846mGc.326KRpL9O1BpRHgjJc4yRV/WayLXXTm', 0, 1, ''),
(212, 'account5', 'account5@gmail.com', '$2y$10$zLRrJdHJSg6wtev5VjIdH.WDymkH7ilxE/iuv3jxuhSaybiSTCJ3S', 0, 1, ''),
(213, 'account6', 'account6@gmail.com', '$2y$10$e.IXfZH/lBYjmqfioSH5d.OMgpZ8eC396w/8H2LChipUDtOcFcESK', 0, 1, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD CONSTRAINT `article_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `article_likes_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `fk_tutors_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
