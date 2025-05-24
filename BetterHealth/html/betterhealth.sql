-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 02:10 PM
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
(10, 'Primus', 'Arthur', 'jjjjjjjjjjjjjjj', '2025-05-07 02:04:40', NULL),
(11, 'The Time and Place', 'Russell Dean', '\"It is better to keep your mouth closed and let people think you are a fool than to open it and remove all doubt.\"', '2025-05-07 04:19:54', NULL),
(12, 'Swiss German University', 'Test Article 5', 'Are Onions Good For Bodybuilding?\r\nIf you’re planning to add bodybuilding to your life, onions might not be the first thing you think about when you think about your bodybuilding diet but they are packed full of nutrients and can be highly beneficial. Vitamins that onions have in them include Vitamin B6 and Vitamin C (like in orange juice), as well as minerals like potassium.\r\n\r\nBut, as you might expect, it is their flavonoids and antioxidants (especially quercetin) that make them really powerful.\r\n\r\nIt is well known that quercetin is anti-inflammatory and an immune enhancer. In other words, for bodybuilders, it means less inflammation in the muscles and a quicker recovery. The anti-oxidative effects also help combat the free radicals created during intense workouts that otherwise would slow down recovery and growth of muscles.', '2025-05-22 13:49:27', NULL),
(13, 'Swiss German University', 'Arthur', 'Are Onions Good For Bodybuilding?\r\nIf you’re planning to add bodybuilding to your life, onions might not be the first thing you think about when you think about your bodybuilding diet but they are packed full of nutrients and can be highly beneficial. Vitamins that onions have in them include Vitamin B6 and Vitamin C (like in orange juice), as well as minerals like potassium.\r\n\r\nBut, as you might expect, it is their flavonoids and antioxidants (especially quercetin) that make them really powerful.\r\n\r\nIt is well known that quercetin is anti-inflammatory and an immune enhancer. In other words, for bodybuilders, it means less inflammation in the muscles and a quicker recovery. The anti oxidative effects also help combat the free radicals created during intense workouts that otherwise would slow down recovery and growth of muscles.', '2025-05-22 13:50:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
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
(1, 'Chung', 'lalalala', 'uploads/682df1fa977ea_BetterHealth_Banner.png', 'pending', '2025-05-21 15:32:10', 201),
(2, '[TestTutor]', '[This is my bio]', '[\"C:xampphtdocsTempBetterBetterHealthhtmlimagesanner-bg.png\"]', '', '2025-05-22 02:31:15', 202),
(3, 'tutor123', 'aoiefoweihfwef', 'uploads/682e8cd7d0e29_fruit.jpg', 'pending', '2025-05-22 02:32:55', 203),
(4, 'Orlean Wesley', 'I am Orlean Wesley', 'uploads/682ff5a89eb11_banner-bg.png', 'pending', '2025-05-23 04:12:24', 204),
(5, 'Orlean Wesleys', 'I am Orlean Wesley', 'uploads/682ff70b42cd5_BetterHealth_Banner.png', 'pending', '2025-05-23 04:18:19', 205),
(10, 'test4', 'test4', 'uploads/6831aa9475624_img1.webp', 'pending', '2025-05-24 11:16:36', 208);

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
(205, 'hikmahcorp', 'himah@corpo.com', '$2y$10$yj6uaBnoY/rxYe5cS4LXHOkxqnszgPvm3ZwxlffQUUiyGEHIV3Uvu', 0, 0, ''),
(206, 'james_g', 'james@gmail.com', '$2y$10$fUd.kT1I0olXWYVbviELU.Nq.2ebKfz8n/cv2jLaRDuWOW0xXUtCS', 0, 0, ''),
(207, 'kontol111', 'kontol111@gmail.com', '$2y$10$10nlfKoeDRleDLGP6WR.FeZkOx4zqOaADCVWujtZ7uhKP1nxbdgem', 0, 0, ''),
(208, 'test', 'test@gmail.com', '$2y$10$SVAYavpr7pt2L.lGXoPqy.xgWff8/.7dRHs5he65r1SY3beAfjrXm', 0, 0, ''),
(209, 'testing', 'testing@gmail.com', '$2y$10$YhFuAHuHkZa/UCpIpxnK9OFMRdFMFPqe19JhHfzTVC26qCgQrJZge', 0, 0, '');

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
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `fk_tutors_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
