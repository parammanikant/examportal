-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2025 at 07:51 AM
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
-- Database: `ex_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(70) DEFAULT NULL,
  `admin_phone` varchar(10) DEFAULT NULL,
  `admin_pass` varchar(50) DEFAULT NULL,
  `admin_pic` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_pass`, `admin_pic`, `created_date`, `admin_status`) VALUES
(1, 'khargone', 'kgn@gmail.com', '9876543210', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2025-03-04 09:53:42', 1),
(2, 'Indore', 'indore@gmail.com', '0123456789', '01cfcd4f6b8770febfb40cb906715822', NULL, '2025-03-04 09:54:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_Id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_teacher` int(11) NOT NULL,
  `class_time` time NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `class_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_Id`, `class_name`, `class_teacher`, `class_time`, `create_date`, `class_status`) VALUES
(1, 'Govt Pollytechnic Collage', 10, '17:00:00', '2025-03-07 10:45:22', 1),
(2, 'Maths', 7, '16:00:00', '2025-03-07 10:46:42', 1),
(3, 'Phusics', 4, '15:00:00', '2025-03-10 09:34:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_title` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `op4` text NOT NULL,
  `answer` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `test_id`, `q_title`, `op1`, `op2`, `op3`, `op4`, `answer`, `created_date`, `status`) VALUES
(1, 3, 'What is HTML?', 'Its a food', 'Its clothes', 'Its a dog', 'Other', 'Other', '2025-03-22 10:49:31', 1),
(2, 3, 'What is php?', 'Food', 'Clothes', 'Server Side Language', 'Dio', 'Server Side Language', '2025-03-22 10:56:27', 1),
(3, 6, 'What is data type?', 'int, float, char, string', 'banana, papaya,orange,graps', 'rice,chapati,curry,puri', 'None Of Above', 'int, float, char, string', '2025-03-28 10:20:27', 1),
(4, 6, 'What is PHP?', 'Its a spoken language', 'It a programming Language', 'Its a food', 'Its a vegitable', 'It a programming Language', '2025-03-28 10:21:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_class` int(11) NOT NULL,
  `student_email` varchar(70) NOT NULL,
  `student_pass` varchar(50) NOT NULL,
  `student_phone` varchar(10) NOT NULL,
  `student_gender` varchar(6) NOT NULL DEFAULT 'Male',
  `student_address` text NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `student_father` varchar(100) NOT NULL,
  `father_phone` varchar(10) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_class`, `student_email`, `student_pass`, `student_phone`, `student_gender`, `student_address`, `student_image`, `student_father`, `father_phone`, `status`, `created_date`) VALUES
(1, 'John Doe', 2, 'john@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9876543210', 'Male', 'Badlapur', '1742273900SAR28.jpg', 'Mohan', '7894545450', 1, '2025-03-18 10:28:20'),
(2, 'Pollytechnic Team', 1, 'mohn@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '9876543210', 'Male', 'Khargone', '1742275154Saraswati Vandana.PNG', 'Mohan', '7894545450', 1, '2025-03-18 10:49:14'),
(3, 'ABC', 3, 'abc@gmail.com', 'c33367701511b4f6020ec61ded352059', '9876543210', 'Male', 'Khargone', '1743138203clock.jpeg', 'Mohan', '7894545450', 1, '2025-03-28 10:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) DEFAULT NULL,
  `teacher_qlf` varchar(255) DEFAULT NULL,
  `teacher_contact` varchar(10) NOT NULL,
  `teacher_image` varchar(255) DEFAULT NULL,
  `teacher_reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `teacher_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_qlf`, `teacher_contact`, `teacher_image`, `teacher_reg_date`, `teacher_status`) VALUES
(4, 'Anshul Kushwah', 'Pollyechnique-CS', '7879670071', 'logonobg.png', '2025-03-05 11:13:34', 1),
(7, 'Badole Kushwah', 'MSc, MTech', '7999999999', 'tagline 4.jpg', '2025-03-06 09:59:14', 1),
(8, 'Bhatore Patidar', 'MSc, MTech', '8674567480', 'logonobg.png', '2025-03-06 10:21:20', 0),
(9, 'Manikant Patidar', 'AllaBlaa', '8964566533', 'gh.jpg', '2025-03-06 10:21:38', 1),
(10, 'Nitin', 'BSC', '9876543210', NULL, '2025-03-11 09:47:58', 1),
(11, 'Nikita', 'BSC', '1234567890', NULL, '2025-03-11 09:52:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_title` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `nagetive_marks` float NOT NULL DEFAULT 0,
  `per_question_marks` float NOT NULL DEFAULT 1,
  `no_of_questions` int(11) NOT NULL DEFAULT 1,
  `test_date` date NOT NULL DEFAULT current_timestamp(),
  `test_start_time` time NOT NULL,
  `test_end_time` time NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_title`, `class_id`, `nagetive_marks`, `per_question_marks`, `no_of_questions`, `test_date`, `test_start_time`, `test_end_time`, `created_date`, `status`) VALUES
(3, 'Frontend Exame', 1, 0.25, 1.5, 50, '2025-03-28', '11:00:00', '12:30:00', '2025-03-22 10:22:04', 1),
(4, 'Backend Exam', 2, 0, 1, 100, '2025-03-28', '13:00:00', '14:30:00', '2025-03-22 10:22:34', 1),
(6, 'Main Exam', 3, 0.5, 2, 50, '2025-04-01', '13:30:00', '15:00:00', '2025-03-28 10:16:12', 1),
(7, 'General Test', 3, 0.5, 2, 50, '2025-03-29', '15:00:00', '17:00:00', '2025-03-29 10:20:15', 1),
(8, 'Past Exams', 3, 0.25, 1, 50, '2025-03-28', '16:00:00', '17:30:00', '2025-03-29 10:21:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_Id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
