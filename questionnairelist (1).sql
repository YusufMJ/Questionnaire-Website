-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 06:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionnairelist`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcqoptions`
--

CREATE TABLE `mcqoptions` (
  `id` int(11) NOT NULL,
  `questionID` int(11) DEFAULT NULL,
  `optionText` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `title`, `description`) VALUES
(31, 'as', 'lol[p]'),
(32, 'as', 'lol[p]'),
(33, 'as', 'lol[p]');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `question_text` text DEFAULT NULL,
  `question_type` enum('likert','yesno','mcq','short') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questionnaire_id`, `question_text`, `question_type`) VALUES
(173, 31, 'q1', 'likert'),
(174, 31, 'q2', 'yesno'),
(175, 31, 'q3', 'mcq'),
(176, 32, 'q1', 'likert'),
(177, 32, 'q2', 'yesno'),
(178, 32, 'q3', 'mcq'),
(179, 33, 'q1', 'likert'),
(180, 33, 'q2', 'yesno'),
(181, 33, 'q3', 'mcq');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `username`, `email`, `password`, `userType`) VALUES
(7, 'admin', 'admin@gmail.com', '$2y$10$sy9qDv.rQCGOU4Md7/mlSOlWGejGkCbjCqLqWN4dnKjZw8fvY3DUu', 'admin'),
(8, 'user', 'user@a.com', '$2y$10$tJYGbrQ3ar0CMUvLN3WK5.m3MfPM/sJFu8Spk/mqnqPoq1xY/wsQW', 'user'),
(9, 'aaaaaa', 'a@a.com', '$2y$10$JsFQYtVadcyfvjYA4C38rOdESNTnzDkoG9E1Dygboon.GrfyUzSpe', 'user'),
(10, 'Yoriwewe', 'qwwe@gmail.com', '$2y$10$qNDn4ApwEPxy5FHL/D/oD.QHeLZVSGOw1pwnn79IOBof13cYOibwS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcqoptions`
--
ALTER TABLE `mcqoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MCQtoQSFK` (`questionID`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `QLtoQsFK` (`questionnaire_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcqoptions`
--
ALTER TABLE `mcqoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mcqoptions`
--
ALTER TABLE `mcqoptions`
  ADD CONSTRAINT `MCQtoQSFK` FOREIGN KEY (`questionID`) REFERENCES `questions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `QLtoQsFK` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
