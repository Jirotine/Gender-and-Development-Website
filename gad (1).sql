-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 10:16 AM
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
-- Database: `gad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `user_type_id`) VALUES
(1, 'admin', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `studentrecords`
--

CREATE TABLE `studentrecords` (
  `student_id` varchar(30) NOT NULL,
  `Surname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentrecords`
--

INSERT INTO `studentrecords` (`student_id`, `Surname`) VALUES
('22-05500', 'CABALAN'),
('22-05861', 'LACDAN'),
('22-07390', 'SALAZAR'),
('22-08040', 'LODOR'),
('22-08344', 'DEL ROSARIO'),
('22-15879', 'MANALO');

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE `survey_answers` (
  `survey_id` int(200) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `survey_type_id` int(100) NOT NULL,
  `question_id` int(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `answers` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`survey_id`, `studentID`, `survey_type_id`, `question_id`, `Date`, `email`, `answers`) VALUES
(1, '22-11333', 1, 1, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(2, '22-11333', 1, 2, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(3, '22-11333', 1, 3, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(4, '22-11333', 1, 4, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(5, '22-11333', 1, 5, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(6, '22-11333', 2, 1, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(7, '22-11333', 2, 2, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(8, '22-11333', 2, 3, '2024-06-09', 'jiroluismanalo24@gmail.com', 'Yes'),
(9, '22-11333', 2, 4, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(10, '22-11333', 2, 5, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(11, '22-11333', 3, 1, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(12, '22-11333', 3, 2, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(13, '22-11333', 3, 3, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(14, '22-11333', 3, 4, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(15, '22-11333', 3, 5, '2024-06-09', 'jiroluismanalo24@gmail.com', 'No'),
(16, '22-08040', 1, 1, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(17, '22-08040', 1, 2, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(18, '22-08040', 1, 3, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(19, '22-08040', 1, 4, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(20, '22-08040', 1, 5, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(21, '22-08040', 2, 1, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(22, '22-08040', 2, 2, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(23, '22-08040', 2, 3, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(24, '22-08040', 2, 4, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(25, '22-08040', 2, 5, '2024-06-09', 'jiroluismanalo12@gmail.com', 'No'),
(26, '22-08040', 3, 1, '2024-06-09', 'jiroluismanalo12@gmail.com', 'Yes'),
(27, '22-08040', 3, 2, '2024-06-09', 'jiroluismanalo12@gmail.com', 'Yes'),
(28, '22-08040', 3, 3, '2024-06-09', 'jiroluismanalo12@gmail.com', 'Yes'),
(29, '22-08040', 3, 4, '2024-06-09', 'jiroluismanalo12@gmail.com', 'Yes'),
(30, '22-08040', 3, 5, '2024-06-09', 'jiroluismanalo12@gmail.com', 'Yes'),
(31, '22-07390', 3, 1, '2024-06-10', 'jamesandreisalazar29@gmail.com', 'Yes'),
(32, '22-07390', 3, 2, '2024-06-10', 'jamesandreisalazar29@gmail.com', 'Yes'),
(33, '22-07390', 3, 3, '2024-06-10', 'jamesandreisalazar29@gmail.com', 'Yes'),
(34, '22-07390', 3, 4, '2024-06-10', 'jamesandreisalazar29@gmail.com', 'No'),
(35, '22-07390', 3, 5, '2024-06-10', 'jamesandreisalazar29@gmail.com', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `question_id` int(11) NOT NULL,
  `survey_type_id` int(11) NOT NULL,
  `questions` varchar(10) NOT NULL,
  `ordinal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`question_id`, `survey_type_id`, `questions`, `ordinal`) VALUES
(1, 1, 'q1', 1),
(2, 1, 'q2', 2),
(3, 1, 'q3', 3),
(4, 1, 'q4', 4),
(5, 1, 'q5', 5),
(6, 2, 'q1', 1),
(7, 2, 'q2', 2),
(8, 2, 'q3', 3),
(9, 2, 'q4', 4),
(10, 2, 'q5', 5),
(11, 3, 'q1', 1),
(12, 3, 'q2', 2),
(13, 3, 'q3', 3),
(14, 3, 'q4', 4),
(15, 3, 'q5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `survey_types`
--

CREATE TABLE `survey_types` (
  `survey_type_id` int(11) NOT NULL,
  `survey_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_types`
--

INSERT INTO `survey_types` (`survey_type_id`, `survey_name`) VALUES
(1, 'SEXUAL HARASSMENT ACT'),
(2, 'SAFE SPACE ACT'),
(3, 'ANTI-VIOLENCE AGAINST WOMEN AND CHILDREN ACT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `studentID` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `scholarship` varchar(100) NOT NULL,
  `membership` varchar(100) NOT NULL,
  `residency` varchar(100) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `code` int(10) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`studentID`, `email`, `sex`, `gender`, `scholarship`, `membership`, `residency`, `verification_code`, `code`, `user_type_id`) VALUES
('22-05500', 'allyssacabalan5@gmail.com', 'Female', 'Woman', 'None', 'Membership 1', '', '$2y$10$6h9z1CAiEndr8o8vQ/NY2.wjCRmtcH3tHml0Xdi7yDfIllSfPcTra', 0, 1),
('22-11333', 'jiroluismanalo24@gmail.com', 'Male', 'Man', 'Scholarship 2', 'Membership 1', '', '$2y$10$JPn9/23A0Y4TjuY75pH3PuAE7gTRcvBUX.gWm.JNn3M69LawNE/HS', 4022, 1),
('22-15879', 'jirotine19@gmail.com', 'Male', 'Other', 'Scholarship 1', 'Membership 1', '', '$2y$10$V1DridWN3El9AhktC4pjLujinht2pzWk5HRXW7LQL/cJ9BiEa7Sty', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type` int(11) NOT NULL,
  `user_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type`, `user_type_name`) VALUES
(1, 'STUDENT'),
(2, 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `studentrecords`
--
ALTER TABLE `studentrecords`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `survey_types`
--
ALTER TABLE `survey_types`
  ADD PRIMARY KEY (`survey_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `survey_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
