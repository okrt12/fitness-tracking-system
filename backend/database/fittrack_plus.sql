-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 03:25 PM
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
-- Database: `fittrack_plus`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achievement_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `protein` float DEFAULT NULL,
  `carbs` float DEFAULT NULL,
  `fats` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `user_id`, `name`, `category`, `calories`, `protein`, `carbs`, `fats`) VALUES
(2, 7, 'Kurushmurush', 'Lunch', 500, 25, 10, 10.5),
(3, 7, 'Tibs', 'Lunch', 500, 25, 30, 10),
(4, 7, 'My Smoothie', 'Breakfast', 1500, 225, 30, 10),
(5, 7, 'Shiro ', 'Lunch', 200, 25, 30, 15),
(6, 7, 'Pasta', 'Snack', 450, 25, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `meal_log`
--

CREATE TABLE `meal_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meal_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_log`
--

INSERT INTO `meal_log` (`log_id`, `user_id`, `meal_id`, `date`, `quantity`, `calories`) VALUES
(1, 7, 2, '2025-04-22', 2, 1000),
(2, 7, 4, '2025-04-22', 2, 3000),
(3, 7, 5, '2025-04-23', 2, 400),
(4, 7, 6, '2025-04-24', 2, 900);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `goal` varchar(50) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `age`, `gender`, `height`, `weight`, `goal`, `disease`, `created_at`) VALUES
(1, 'Kirubel Wondwossen', 'kirubelwondwossen30@gmail.com', '$2y$10$VWywQYRI3Y0wYEmrQZ3z2ebnWZkaGIAjl32/ZoAQTwuh2prV7Fiim', 30, 'male', 182, 80, 'gain_muscle', 'none', '2025-04-18 18:51:18'),
(2, 'Kirubel', 'kirubel@gmail.com', '$2y$10$enrKFinfRjG5rI6wkNOGK.pzCrs35ofpbLWelsnf5GMDrwbDuCyvC', 18, 'male', 132, 90, 'lose_weight', 'diabetes', '2025-04-18 18:57:58'),
(5, 'Abel Alebachewu', 'abel@gmail.com', '$2y$10$SLZTKXUaeaAJJnjJ0skINeJ3SNXs1V4goAyeeYHhgigdkd/Trzcsa', 23, 'male', 180, 75, 'gain_muscle', 'none', '2025-04-19 16:43:50'),
(6, 'Monkey D. Luffy', 'lluffy123@gmail.com', '$2y$10$qw/0cWWS9O8am1yVNgAbUOQChKXaRLxlrpRuW/y/MsHOMy95dBVmS', 19, 'male', 175, 65, 'maintain', 'none', '2025-04-21 17:56:39'),
(7, 'Monkey D. Luffy', 'luffy@gmail.com', '$2y$10$fWfHAPb3/V6sjmLX9yssyeTPmHhIjY0YxqdJ0QoInNLK7wrRjfvfy', 19, 'male', 175, 75, 'maintain', 'none', '2025-04-21 17:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_achievements`
--

CREATE TABLE `user_achievements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `achievement_id` int(11) DEFAULT NULL,
  `date_awarded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `progress_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `systolic` int(11) DEFAULT NULL,
  `diastolic` int(11) DEFAULT NULL,
  `sugar_level` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`progress_id`, `user_id`, `date`, `weight`, `bmi`, `systolic`, `diastolic`, `sugar_level`, `notes`) VALUES
(36, 1, '2025-04-21', 80, 24.15, 120, 80, '100', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `workout_day_name` varchar(50) NOT NULL DEFAULT 'Workout',
  `category` varchar(50) DEFAULT NULL,
  `calories_per_hour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `user_id`, `name`, `workout_day_name`, `category`, `calories_per_hour`) VALUES
(1, 7, 'Push Ups', 'Workout', 'Strength', 600),
(2, 7, 'Running', 'Workout', 'Cardio', 1000),
(3, 7, 'Bench Press', 'Workout', 'Strength', 1500),
(4, 7, 'Hammer Curl', 'Strength', 'Arm Day', 650);

-- --------------------------------------------------------

--
-- Table structure for table `workout_log`
--

CREATE TABLE `workout_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workout_id` int(11) DEFAULT NULL,
  `workout_day_name` varchar(50) NOT NULL DEFAULT 'Workout',
  `date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `calories_burned` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_log`
--

INSERT INTO `workout_log` (`log_id`, `user_id`, `workout_id`, `workout_day_name`, `date`, `duration`, `calories_burned`, `notes`) VALUES
(1, 7, 1, 'Workout', '2025-04-22', 30, 300, NULL),
(2, 7, 2, 'Workout', '2025-04-22', 60, 1000, NULL),
(3, 7, 3, 'Workout', '2025-04-23', 120, 3000, NULL),
(5, 7, 3, 'Chest Day', '2025-04-24', 30, 750, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workout_schedule`
--

CREATE TABLE `workout_schedule` (
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workout_id` int(11) DEFAULT NULL,
  `workout_day_name` varchar(50) NOT NULL DEFAULT 'Workout',
  `schedule_date` date NOT NULL DEFAULT curdate(),
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `weekly_repeat` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_schedule`
--

INSERT INTO `workout_schedule` (`schedule_id`, `user_id`, `workout_id`, `workout_day_name`, `schedule_date`, `date`, `time`, `duration`, `weekly_repeat`) VALUES
(26, 7, 2, 'Workout', '2025-04-25', '2025-10-15', '10:50:00', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workout_schedules`
--

CREATE TABLE `workout_schedules` (
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_of_week` varchar(10) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `workout_day_name` varchar(50) NOT NULL DEFAULT 'Workout',
  `schedule_date` date NOT NULL DEFAULT curdate(),
  `time` time NOT NULL,
  `duration` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_schedules`
--

INSERT INTO `workout_schedules` (`schedule_id`, `user_id`, `day_of_week`, `workout_id`, `workout_day_name`, `schedule_date`, `time`, `duration`) VALUES
(14, 7, 'Wednesday', 1, 'Chest Day', '2025-04-25', '12:50:00', 45),
(15, 7, 'Friday', 3, 'Core Day', '2025-04-25', '10:55:00', 150),
(17, 7, 'Saturday', 4, 'Arm Day', '2025-04-26', '10:45:00', 60),
(21, 7, 'Monday', 3, 'Back Day', '2025-04-26', '16:16:00', 90),
(22, 7, 'Monday', 3, 'Back Day', '2025-04-26', '16:16:00', 90),
(24, 7, 'Monday', 3, 'Back Day', '2025-04-26', '23:00:00', 90),
(25, 7, 'Sunday', 4, 'Leg Day', '2025-04-26', '10:00:00', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `fk_meal_user` (`user_id`);

--
-- Indexes for table `meal_log`
--
ALTER TABLE `meal_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_achievements`
--
ALTER TABLE `user_achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `achievement_id` (`achievement_id`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `fk_workout_user` (`user_id`);

--
-- Indexes for table `workout_log`
--
ALTER TABLE `workout_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workout_id` (`workout_id`);

--
-- Indexes for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workout_id` (`workout_id`);

--
-- Indexes for table `workout_schedules`
--
ALTER TABLE `workout_schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workout_id` (`workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meal_log`
--
ALTER TABLE `meal_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_achievements`
--
ALTER TABLE `user_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workout_log`
--
ALTER TABLE `workout_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `workout_schedules`
--
ALTER TABLE `workout_schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `fk_meal_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `meal_log`
--
ALTER TABLE `meal_log`
  ADD CONSTRAINT `meal_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `meal_log_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`);

--
-- Constraints for table `user_achievements`
--
ALTER TABLE `user_achievements`
  ADD CONSTRAINT `user_achievements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_achievements_ibfk_2` FOREIGN KEY (`achievement_id`) REFERENCES `achievements` (`achievement_id`);

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `fk_workout_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `workout_log`
--
ALTER TABLE `workout_log`
  ADD CONSTRAINT `workout_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `workout_log_ibfk_2` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`workout_id`);

--
-- Constraints for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  ADD CONSTRAINT `workout_schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `workout_schedule_ibfk_2` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`workout_id`);

--
-- Constraints for table `workout_schedules`
--
ALTER TABLE `workout_schedules`
  ADD CONSTRAINT `workout_schedules_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `workout_schedules_ibfk_2` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`workout_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
