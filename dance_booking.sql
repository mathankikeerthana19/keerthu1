-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dance_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password12');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `dance_class` varchar(50) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `experience` text DEFAULT NULL,
  `fees` decimal(10,2) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `age`, `dance_class`, `schedule`, `experience`, `fees`, `booking_date`) VALUES
(1, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'afternoon', '', 0.00, '2025-01-26 10:56:28'),
(2, 'prasana', 'sss@gmail.com', '987654321', 15, 'contemporary', 'evening', '', 0.00, '2025-01-26 11:27:40'),
(3, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'morning', '', 0.00, '2025-01-26 13:12:52'),
(4, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'ballet', 'morning', '', 0.00, '2025-02-07 10:29:53'),
(5, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'evening', 'beginner', 0.00, '2025-02-12 05:54:11'),
(6, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'afternoon', '', 0.00, '2025-02-17 04:36:35'),
(7, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'afternoon', 'begineer', 0.00, '2025-02-25 05:04:22'),
(8, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'afternoon', 'begineer', 0.00, '2025-02-25 05:15:10'),
(9, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'jazz', 'afternoon', 'begineer', 0.00, '2025-02-25 05:15:15'),
(10, 'roshan', 'r24589919@gmail.com', '987654321', 15, 'hiphop', 'afternoon', '', 0.00, '2025-02-26 04:48:10'),
(11, 'priya', 'priya@gmail.com', '987654321', 15, 'jazz', 'evening', '', 0.00, '2025-03-01 05:20:27'),
(12, 'maha', 'maha@gmail.com', '7598960709', 21, 'contemporary', 'afternoon', '', 0.00, '2025-03-02 14:17:02'),
(13, 'latha', 'latha@gmail.com', '987654321', 22, 'aerobics', 'evening', '', 0.00, '2025-03-02 16:33:31'),
(14, 'sri', 'sri@gmail.com', '8765432190', 23, 'fusion', 'evening', '', 0.00, '2025-03-02 16:36:14'),
(15, 'latha', 'latha@gmail.com', '987654321', 22, 'Jazz', 'morning', 'yygy', 0.00, '2025-03-04 05:43:32'),
(16, 'latha', 'latha@gmail.com', '987654321', 22, 'Jazz', 'morning', 'yygy', 0.00, '2025-03-04 05:44:21'),
(17, 'latha', 'latha@gmail.com', '987654321', 22, 'Jazz', 'morning', 'yygy', 0.00, '2025-03-04 05:48:32'),
(18, 'keerthana', 'keerthana@gmail.com', '8765432190', 21, 'HipHop', 'Afternoon', '', 0.00, '2025-03-04 05:49:04'),
(19, 'prasana', 'pra$27ana@gmail.com', '7598960709', 15, 'Hip Hop', 'evening', '', 1000.00, '2025-03-05 04:35:55'),
(20, 'prasana', 'pra$27ana@gmail.com', '7598960709', 15, 'fusion', 'evening', '', 0.00, '2025-03-05 04:36:27'),
(21, 'prasana', 'pra$27ana@gmail.com', '7598960709', 15, 'Fusion Dance', 'evening', '', 1000.00, '2025-03-05 04:39:40'),
(22, 'keerthana', 'mathankikeerthana2005@gmail.com', '987654321', 15, 'Bharatanatyam', 'afternoon', '', 2000.00, '2025-03-05 04:47:00'),
(23, 'keerthana', 'mathankikeerthana2005@gmail.com', '987654321', 15, 'Bharatanatyam', 'afternoon', '', 2000.00, '2025-03-05 04:47:20'),
(24, 'keerthana', 'mathankikeerthana2005@gmail.com', '987654321', 15, 'Fusion Dance', 'afternoon', '', 1000.00, '2025-03-05 04:47:39'),
(25, 'keerthana', 'mathankikeerthana2005@gmail.com', '987654321', 15, 'Fusion Dance', 'afternoon', '', 1000.00, '2025-03-05 04:48:23'),
(26, 'latha', 'latha@gmail.com', '8765432190', 22, 'Bharatanatyam', 'evening', '', 2000.00, '2025-03-05 08:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dance_booking`
--

CREATE TABLE `dance_booking` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fees` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dance_booking`
--

INSERT INTO `dance_booking` (`id`, `class_name`, `description`, `duration`, `image`, `fees`) VALUES
(18, 'Fusion Dance', 'A dynamic mix of different dance styles blending tradition and modernity.', 60, 'fusion.jpeg', 1000.00),
(19, 'Bharatanatyam', 'A classical Indian dance known for its grace, expressions, and intricate footwork.', 90, 'bharatanatyam.jpeg', 2000.00),
(20, 'Hip Hop', 'An energetic dance style with freestyle movements and street dance elements.', 45, 'hiphop.jpeg', 1000.00),
(21, 'Folk Dance', 'Traditional dance reflecting the culture and heritage of various regions.', 60, 'folk.jpeg', 900.00),
(22, 'Aerobics Dance', 'A high-energy workout combining dance and cardio for fitness.', 50, 'aerobics.jpeg', 800.00),
(23, 'Kathak', 'A North Indian classical dance form known for its storytelling, footwork, and spins.', 75, 'kathak.jpeg', 1700.00),
(25, 'Tap Dance', 'Tap dance is a rhythmic dance style where dancers create percussive sounds using special tap shoes.', 60, 'uploads/1740932880_tap.jpeg', 1400.00);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_name`, `email`, `rating`, `feedback`, `created_at`) VALUES
(2, 'keerthana', 'mathankikeerthana2005@gmail.com', 4, 'nice experience for me', '2025-03-02 07:27:18'),
(3, 'prasana', 'pra$27ana@gmail.com', 3, 'nice', '2025-03-02 07:42:28'),
(4, 'priya', 'priya@gmail.com', 3, 'very nice', '2025-03-02 14:15:29'),
(5, 'latha', 'latha@gmail.com', 5, 'i am satisfied with work', '2025-03-02 16:34:19'),
(6, 'sri', 'sri@gmail.com', 3, 'good', '2025-03-02 16:37:13'),
(7, 'prasana', 'pra$27ana@gmail.com', 4, 'good', '2025-03-05 04:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'mathanki', '*A0CA93ADEA7CECD27774D8DDD803717816893B10', '2025-02-26 04:31:06'),
(2, 'priya', '*0976C6407BC62F937325233AB2947A8CF2E790B0', '2025-02-26 04:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'mathanki', 'mathankikeerthana2005@gmail.com', '$2y$10$AEx5MfCR9TiIaPcNJ2b39OuKxGDRim10/YQQ/jHXWz8nl7NNjKxV2'),
(2, 'mathanki', 'mathankikeerthana2005@gmail.com', '$2y$10$0I9TgwRkj5GaEjOsyFsvbem2bSN3LkJiSRtSMg34cydPv7u7fNlzO'),
(3, 'priya', 'priya@gmail.com', '$2y$10$xuG8KytXks5GMHt04AdfRuTbfkQSo0r3hF1gpVzwubS8rvV.dLN66'),
(4, 'priya', 'priya@gmail.com', '$2y$10$ku4i.jxqHVqWS5VxDBriB.7ypcI5TmWeUcMDZEz19z41M43xWFonK'),
(5, 'maha', 'maha@gmail.com', '$2y$10$vh5ppTuk1bB08Igu9WxUxub18xuytDTEqHWPtZbSOhP3pPvEqWO4K'),
(6, 'latha', 'latha@gmail.com', '$2y$10$B43iIxi5gj4hCDC4Q7608.IC8sAoYQcF1JSWTvfyoSlS7sfCOuZ.S'),
(7, 'sri', 'sri@gmail.com', '$2y$10$64K1fPcJgA6yD7HMMidgve3ECYJUX/IFRRIx2Zlk7z9x..Fg/Xpqq'),
(8, 'prasana', 'pra$27ana@gmail.com', '$2y$10$avqihK0TtP.9rshYmf8HCuXgzlLXCtnhqfhrIGlAXDMX35xDXw0hO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dance_booking`
--
ALTER TABLE `dance_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dance_booking`
--
ALTER TABLE `dance_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
