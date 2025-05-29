-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 02:20 PM
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
(13, 'Swiss German University', 'Arthur', 'Are Onions Good For Bodybuilding?\r\nIf you’re planning to add bodybuilding to your life, onions might not be the first thing you think about when you think about your bodybuilding diet but they are packed full of nutrients and can be highly beneficial. Vitamins that onions have in them include Vitamin B6 and Vitamin C (like in orange juice), as well as minerals like potassium.\r\n\r\nBut, as you might expect, it is their flavonoids and antioxidants (especially quercetin) that make them really powerful.\r\n\r\nIt is well known that quercetin is anti-inflammatory and an immune enhancer. In other words, for bodybuilders, it means less inflammation in the muscles and a quicker recovery. The anti oxidative effects also help combat the free radicals created during intense workouts that otherwise would slow down recovery and growth of muscles.', '2025-05-22 13:50:43', 211),
(14, 'Clair De Lune', 'The Bussy', 'I love the bussy.', '2025-05-24 13:06:18', 213),
(19, 'This is my guide', 'Kate Bush', 'Alot has changed since I last saw that pretty boy Akram...', '2025-05-29 11:33:23', 212);

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
(211, 14, '2025-05-25 21:55:52'),
(212, 19, '2025-05-29 18:39:17'),
(218, 14, '2025-05-29 19:19:22'),
(218, 19, '2025-05-29 19:19:19');

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
(1, 'Chung', 'lalalala', 'uploads/682df1fa977ea_BetterHealth_Banner.png', 'rejected', '2025-05-21 15:32:10', 201),
(2, '[TestTutor]', '[This is my bio]', '[\"C:xampphtdocsTempBetterBetterHealthhtmlimagesanner-bg.png\"]', '', '2025-05-22 02:31:15', 202),
(3, 'tutor123', 'aoiefoweihfwef', 'uploads/682e8cd7d0e29_fruit.jpg', 'rejected', '2025-05-22 02:32:55', 203),
(4, 'Orlean Wesley', 'I am Orlean Wesley', 'uploads/682ff5a89eb11_banner-bg.png', 'rejected', '2025-05-23 04:12:24', 204),
(5, 'Orlean Wesleys', 'I am Orlean Wesley', 'uploads/682ff70b42cd5_BetterHealth_Banner.png', 'accepted', '2025-05-23 04:18:19', 205),
(6, 'Arthur', 'ilshw', 'uploads/68318c69af0ae_img3.jpg', 'accepted', '2025-05-24 09:07:53', 206),
(7, 'Arthur2', 'ilshw2', 'uploads/6831932856054_img3.jpg', 'accepted', '2025-05-24 09:36:40', 208),
(8, 'Deddy', 'I want to be a deddy', 'uploads/6831b81eaa695_BetterHealth_Banner.png', 'accepted', '2025-05-24 12:14:22', 210),
(9, 'Graha Raya', 'I am Graha Raya....', 'uploads/6831bd5ef2a2c_fruit.jpg', 'accepted', '2025-05-24 12:36:46', 211),
(10, 'i am account5', 'i am shrek', 'uploads/6831c03834ebf_Tutor_1.jpg', 'accepted', '2025-05-24 12:48:56', 212),
(11, 'hilarius russel', 'I am a fitness expert', 'uploads/6831c3b668693_Tutor_3.jpg', 'accepted', '2025-05-24 13:03:50', 209),
(12, 'Xaverius', 'The Best Tutor', 'uploads/6832ac3771ba8_default_pfp.png', 'accepted', '2025-05-25 05:35:51', 213),
(13, 'Graha Raya Real', 'We hate the Graha Raya that is not real...', 'uploads/683487ec08b1a_6832ac3771ba8_default_pfp.png', 'accepted', '2025-05-26 15:25:32', 215),
(14, 'Bintaro Exchange Mall', 'We are young!', 'uploads/683488cb5f000_gallery_img2.jpg', 'accepted', '2025-05-26 15:29:15', 216),
(15, 'Skbiidi', 'cock and balls', 'uploads/68368770a7069_vyke_1080p.png', 'accepted', '2025-05-28 03:48:00', 217),
(16, 'Rey Misterio', 'I am darkness. Hee hee ha ha.', 'uploads/683849ce15159_68368770a7069_vyke_1080p.png', 'accepted', '2025-05-29 11:49:34', 218);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_subscribe`
--

CREATE TABLE `tutor_subscribe` (
  `user_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subscribed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_subscribe`
--

INSERT INTO `tutor_subscribe` (`user_id`, `tutor_id`, `subscribed_at`) VALUES
(208, 205, '2025-05-28 12:02:06'),
(208, 208, '2025-05-28 12:01:34');

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
(213, 'account6', 'account6@gmail.com', '$2y$10$e.IXfZH/lBYjmqfioSH5d.OMgpZ8eC396w/8H2LChipUDtOcFcESK', 0, 1, ''),
(214, 'the_man', 'theman@gmail.com', '$2y$10$MfDsjW9Lzu.rlbTQUPItUuqztUSBirpXFwDIvH7HoPExd25D3spHu', 0, 0, ''),
(215, 'account7', 'abcde@gmail.com', '$2y$10$WjeB5r680mCthCgW0CTAC.QCBPDOUnqjqpBTV96bboWU3Gs3Ostg2', 0, 1, ''),
(216, 'account8', 'afe@gmail.com', '$2y$10$tClfUh6RD.ngTM6WuOKJbuDkAQIpHAPuK7gAQ40sQeUX2lkmeK0DG', 0, 1, ''),
(217, 'tutortest1', 'ass@gmail.com', '$2y$10$1jx85Da11b2zP.8Yu9TMO.piRnOTMp4Q4kcxAlJIhqq7fIhj2nKIW', 0, 1, ''),
(218, 'Corbin Bleu', 'corbinz@hotmail.com', '$2y$10$QCOFp5.Ff4I00f.641dyn.rFPeTW8ZRgLQCCmAHUzB/0vrfGF64ji', 0, 1, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

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
