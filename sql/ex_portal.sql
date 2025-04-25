-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 06:22 AM
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
(4, 6, 'What is PHP?', 'Its a spoken language', 'It a programming Language', 'Its a food', 'Its a vegitable', 'It a programming Language', '2025-03-28 10:21:28', 1),
(5, 9, 'Which one is capital of MP?', 'Indore', 'Jabalpur', 'Pithampur', 'None Of One', 'None Of One', '2025-04-07 09:47:31', 1),
(6, 9, 'Which citi is known as industrial town?', 'Indore', 'Chennail', 'Kolkata', 'Pithumpur', 'Pithumpur', '2025-04-07 09:48:14', 1),
(7, 9, 'Which animal is national animal?', 'Lion', 'Cow', 'Dog', 'Donkey', 'Lion', '2025-04-07 09:49:02', 1),
(8, 9, 'Who is father of nation?', 'Jawahar Lal Nehru', 'Bhagat Singh', 'Mahatma Gandhi', 'Narendra Modi', 'Mahatma Gandhi', '2025-04-07 09:50:19', 1),
(9, 7, 'Kya Palak Ab Regular Class Aayegi?', 'No', 'May be', 'Yes', 'Pata ni', 'No', '2025-04-10 10:11:02', 1),
(10, 7, 'Kya Palak Ab Regular Class Aayegi?', 'No', 'May be', 'Yes', 'Pata ni', 'No', '2025-04-12 10:24:59', 1),
(11, 8, 'Who is prime minister of India?', 'Rahul Gnndhi', 'Shivraj Singh', 'Narendra Damodar Modi', 'No Of One', 'Narendra Damodar Modi', '2025-04-12 10:59:04', 1),
(12, 8, 'What is name of Our Country?', 'China', 'Pakistan', 'India', 'Bharat', 'Bharat', '2025-04-12 10:59:43', 1),
(13, 8, 'Who is Bhagat Singh?', 'Lord', 'Freedom Fighter', 'Terrorist', 'No Of One', 'Freedom Fighter', '2025-04-12 11:02:50', 1),
(14, 8, 'Which Fruits Known As King Of Fruits?', 'Watermalon', 'Graps', 'Banana', 'Mango', 'Mango', '2025-04-12 11:03:45', 1),
(15, 10, 'Who is the father of nation?', 'Jawahar Lal Nehru', 'Rahul Gandhi', 'Mahatma Gandhi', 'Rajiv Gandhi', 'Mahatma Gandhi', '2025-04-15 09:52:27', 1),
(16, 10, 'Who is Bhagat Singh?', 'Student', 'Legend Of India', 'Terrorist', 'Political leader', 'Legend Of India', '2025-04-15 09:53:12', 1),
(17, 11, 'Which Version Is Current For MS Office?', '22', '23', '13', 'None Of One', 'None Of One', '2025-04-15 10:09:39', 1),
(18, 11, 'What is means Of HTTP?', 'Hyper Text Transfer Protocol', 'Hyper Text Transfer Srotocol', 'Hyper Text Transmit Protocol', 'None Of One', 'Hyper Text Transfer Protocol', '2025-04-15 10:10:41', 1),
(19, 12, 'Who is king of Ayodhya?', 'Bhagat Singh Ji', 'Mahatma Gandhi', 'Shri Ramji', 'Rahul Gandhi', 'Shri Ramji', '2025-04-17 10:04:36', 1),
(20, 12, 'What is HTML?', 'Web Development Language', 'Spoken Language', 'Books', 'None Of Above', 'Web Development Language', '2025-04-17 10:05:18', 1),
(21, 12, 'How to define variables in JS?', 'int', 'char', 'var', '$', 'var', '2025-04-17 10:05:51', 1),
(22, 13, 'What is HTML?', 'Its a food', 'Its clothes', 'Its a dog', 'Other', 'Other', '2025-04-17 10:47:13', 1),
(23, 13, 'What is php?', 'Food', 'Clothes', 'Server Side Language', 'Dio', 'Server Side Language', '2025-04-17 10:47:13', 1),
(24, 13, 'What is data type?', 'int, float, char, string', 'banana, papaya,orange,graps', 'rice,chapati,curry,puri', 'None Of Above', 'int, float, char, string', '2025-04-17 10:47:13', 1),
(25, 13, 'What is PHP?', 'Its a spoken language', 'It a programming Language', 'Its a food', 'Its a vegitable', 'It a programming Language', '2025-04-17 10:47:13', 1),
(26, 13, 'Which one is capital of MP?', 'Indore', 'Jabalpur', 'Pithampur', 'None Of One', 'None Of One', '2025-04-17 10:47:13', 1),
(27, 13, 'Which citi is known as industrial town?', 'Indore', 'Chennail', 'Kolkata', 'Pithumpur', 'Pithumpur', '2025-04-17 10:47:13', 1),
(28, 13, 'Which animal is national animal?', 'Lion', 'Cow', 'Dog', 'Donkey', 'Lion', '2025-04-17 10:47:13', 1),
(29, 13, 'Who is father of nation?', 'Jawahar Lal Nehru', 'Bhagat Singh', 'Mahatma Gandhi', 'Narendra Modi', 'Mahatma Gandhi', '2025-04-17 10:47:13', 1),
(30, 13, 'Kya Palak Ab Regular Class Aayegi?', 'No', 'May be', 'Yes', 'Pata ni', 'No', '2025-04-17 10:47:13', 1),
(31, 13, 'Kya Palak Ab Regular Class Aayegi?', 'No', 'May be', 'Yes', 'Pata ni', 'No', '2025-04-17 10:47:13', 1),
(32, 13, 'Who is prime minister of India?', 'Rahul Gnndhi', 'Shivraj Singh', 'Narendra Damodar Modi', 'No Of One', 'Narendra Damodar Modi', '2025-04-17 10:47:13', 1),
(33, 13, 'What is name of Our Country?', 'China', 'Pakistan', 'India', 'Bharat', 'Bharat', '2025-04-17 10:47:13', 1),
(34, 13, 'Who is Bhagat Singh?', 'Lord', 'Freedom Fighter', 'Terrorist', 'No Of One', 'Freedom Fighter', '2025-04-17 10:47:13', 1),
(35, 13, 'Which Fruits Known As King Of Fruits?', 'Watermalon', 'Graps', 'Banana', 'Mango', 'Mango', '2025-04-17 10:47:13', 1),
(36, 13, 'Who is the father of nation?', 'Jawahar Lal Nehru', 'Rahul Gandhi', 'Mahatma Gandhi', 'Rajiv Gandhi', 'Mahatma Gandhi', '2025-04-17 10:47:13', 1),
(37, 13, 'Who is Bhagat Singh?', 'Student', 'Legend Of India', 'Terrorist', 'Political leader', 'Legend Of India', '2025-04-17 10:47:13', 1),
(38, 13, 'Which Version Is Current For MS Office?', '22', '23', '13', 'None Of One', 'None Of One', '2025-04-17 10:47:13', 1),
(39, 13, 'What is means Of HTTP?', 'Hyper Text Transfer Protocol', 'Hyper Text Transfer Srotocol', 'Hyper Text Transmit Protocol', 'None Of One', 'Hyper Text Transfer Protocol', '2025-04-17 10:47:13', 1),
(40, 13, 'Who is king of Ayodhya?', 'Bhagat Singh Ji', 'Mahatma Gandhi', 'Shri Ramji', 'Rahul Gandhi', 'Shri Ramji', '2025-04-17 10:47:13', 1),
(41, 13, 'What is HTML?', 'Web Development Language', 'Spoken Language', 'Books', 'None Of Above', 'Web Development Language', '2025-04-17 10:47:13', 1),
(42, 13, 'How to define variables in JS?', 'int', 'char', 'var', '$', 'var', '2025-04-17 10:47:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `obtained_marks` float NOT NULL,
  `total_test_marks` float NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `test_id`, `student_id`, `obtained_marks`, `total_test_marks`, `status`, `created_date`) VALUES
(2, 10, 3, 9, 100, 1, '2025-04-15 10:06:04'),
(3, 11, 3, 9, 50, 1, '2025-04-15 10:11:04'),
(4, 12, 3, 9, 75, 1, '2025-04-17 10:41:08'),
(5, 13, 3, 9, 100, 1, '2025-04-17 10:55:05');

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
(3, 'ABC', 3, 'abc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9876543210', 'Male', 'Khargone', '1743138203clock.jpeg', 'Mohan', '7894545450', 1, '2025-03-28 10:33:23'),
(4, '2nd Student', 3, '2nd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '7879670071', 'Male', 'Unknown', '1744258813logonobg.png', 'Unknown', '7879670071', 1, '2025-04-10 09:50:13'),
(5, '3rd', 3, '3rd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9876543210', 'Male', 'Unkown', '1744258860clock.jpeg', '9876543210', '9876543210', 1, '2025-04-10 09:51:00');

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
(6, 'Main Exam', 3, 0.5, 2, 50, '2025-04-11', '13:30:00', '15:00:00', '2025-03-28 10:16:12', 1),
(7, 'General Test', 3, 0.5, 2, 50, '2025-04-12', '09:40:00', '11:55:00', '2025-03-29 10:20:15', 1),
(8, 'Past Exams', 3, 0.25, 1, 50, '2025-04-12', '10:30:00', '17:30:00', '2025-03-29 10:21:00', 1),
(9, 'GK Test', 3, 0.25, 1, 50, '2025-04-12', '10:00:00', '11:00:00', '2025-04-07 09:46:38', 1),
(10, 'Tuesday Test', 3, 1, 2, 50, '2025-04-15', '09:50:00', '11:50:00', '2025-04-15 09:47:15', 1),
(11, 'ACCP Test', 3, 0, 1, 50, '2025-04-15', '10:10:00', '10:30:00', '2025-04-15 10:07:32', 1),
(12, 'Thursday Test', 3, 0.5, 1.5, 50, '2025-04-17', '10:05:00', '10:40:00', '2025-04-17 10:03:30', 1),
(13, 'Thursday New Test', 3, 0, 1, 100, '2025-04-17', '10:45:00', '10:55:00', '2025-04-17 10:43:37', 1),
(14, '23 Apr', 1, 0.5, 1, 50, '2025-04-23', '10:00:00', '00:00:00', '2025-04-23 09:40:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_resports`
--

CREATE TABLE `test_resports` (
  `report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `op1` varchar(255) NOT NULL,
  `op2` varchar(255) NOT NULL,
  `op3` varchar(255) NOT NULL,
  `op4` varchar(255) NOT NULL,
  `right_answer` varchar(255) NOT NULL,
  `student_answered` varchar(255) NOT NULL,
  `is_correct_answer` tinyint(2) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `question_title` text NOT NULL,
  `obtaine_marks` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_resports`
--

INSERT INTO `test_resports` (`report_id`, `student_id`, `test_id`, `q_id`, `op1`, `op2`, `op3`, `op4`, `right_answer`, `student_answered`, `is_correct_answer`, `created_date`, `status`, `question_title`, `obtaine_marks`) VALUES
(1, 3, 9, 5, 'Indore', 'Jabalpur', 'Pithampur', 'None Of One', 'None Of One', 'None Of One', 1, '2025-04-12 10:23:43', 1, 'Which one is capital of MP?', 1),
(2, 3, 9, 6, 'Indore', 'Chennail', 'Kolkata', 'Pithumpur', 'Pithumpur', 'Pithumpur', 1, '2025-04-12 10:23:49', 1, 'Which citi is known as industrial town?', 1),
(3, 3, 9, 7, 'Lion', 'Cow', 'Dog', 'Donkey', 'Lion', 'Lion', 1, '2025-04-12 10:24:02', 1, 'Which animal is national animal?', 1),
(4, 3, 9, 8, 'Jawahar Lal Nehru', 'Bhagat Singh', 'Mahatma Gandhi', 'Narendra Modi', 'Mahatma Gandhi', 'Narendra Modi', 0, '2025-04-12 10:24:05', 1, 'Who is father of nation?', 0.25),
(8, 3, 7, 9, 'No', 'May be', 'Yes', 'Pata ni', 'No', 'Yes', 0, '2025-04-12 10:39:29', 1, 'Kya Palak Ab Regular Class Aayegi?', 0.5),
(9, 3, 7, 10, 'No', 'May be', 'Yes', 'Pata ni', 'No', 'Pata ni', 0, '2025-04-12 10:43:40', 1, 'Kya Palak Ab Regular Class Aayegi?', 0.5),
(12, 3, 8, 11, 'Rahul Gnndhi', 'Shivraj Singh', 'Narendra Damodar Modi', 'No Of One', 'Narendra Damodar Modi', 'Narendra Damodar Modi', 1, '2025-04-12 11:04:06', 1, 'Who is prime minister of India?', 1),
(13, 3, 8, 12, 'China', 'Pakistan', 'India', 'Bharat', 'Bharat', 'Bharat', 1, '2025-04-12 11:04:10', 1, 'What is name of Our Country?', 1),
(14, 3, 8, 13, 'Lord', 'Freedom Fighter', 'Terrorist', 'No Of One', 'Freedom Fighter', 'No Of One', 0, '2025-04-12 11:04:15', 1, 'Who is Bhagat Singh?', 0.25),
(15, 3, 8, 14, 'Watermalon', 'Graps', 'Banana', 'Mango', 'Mango', 'Banana', 0, '2025-04-12 11:04:24', 1, 'Which Fruits Known As King Of Fruits?', 0.25),
(16, 3, 10, 15, 'Jawahar Lal Nehru', 'Rahul Gandhi', 'Mahatma Gandhi', 'Rajiv Gandhi', 'Mahatma Gandhi', 'Mahatma Gandhi', 1, '2025-04-15 09:53:26', 1, 'Who is the father of nation?', 2),
(17, 3, 10, 16, 'Student', 'Legend Of India', 'Terrorist', 'Political leader', 'Legend Of India', 'Legend Of India', 1, '2025-04-15 09:53:32', 1, 'Who is Bhagat Singh?', 2),
(18, 3, 11, 17, '22', '23', '13', 'None Of One', 'None Of One', 'None Of One', 1, '2025-04-15 10:11:01', 1, 'Which Version Is Current For MS Office?', 1),
(19, 3, 11, 18, 'Hyper Text Transfer Protocol', 'Hyper Text Transfer Srotocol', 'Hyper Text Transmit Protocol', 'None Of One', 'Hyper Text Transfer Protocol', 'Hyper Text Transfer Srotocol', 0, '2025-04-15 10:11:04', 1, 'What is means Of HTTP?', 0),
(20, 3, 12, 19, 'Bhagat Singh Ji', 'Mahatma Gandhi', 'Shri Ramji', 'Rahul Gandhi', 'Shri Ramji', 'Shri Ramji', 1, '2025-04-17 10:36:43', 1, 'Who is king of Ayodhya?', 1.5),
(21, 3, 12, 20, 'Web Development Language', 'Spoken Language', 'Books', 'None Of Above', 'Web Development Language', 'None Of Above', 0, '2025-04-17 10:36:49', 1, 'What is HTML?', 0.5),
(22, 3, 13, 22, 'Its a food', 'Its clothes', 'Its a dog', 'Other', 'Other', 'Other', 1, '2025-04-17 10:50:17', 1, 'What is HTML?', 1),
(23, 3, 13, 23, 'Food', 'Clothes', 'Server Side Language', 'Dio', 'Server Side Language', 'Server Side Language', 1, '2025-04-17 10:50:35', 1, 'What is php?', 1),
(24, 3, 13, 24, 'int, float, char, string', 'banana, papaya,orange,graps', 'rice,chapati,curry,puri', 'None Of Above', 'int, float, char, string', 'None Of Above', 0, '2025-04-17 10:50:52', 1, 'What is data type?', 0),
(25, 3, 13, 25, 'Its a spoken language', 'It a programming Language', 'Its a food', 'Its a vegitable', 'It a programming Language', 'It a programming Language', 1, '2025-04-17 10:51:26', 1, 'What is PHP?', 1),
(26, 3, 13, 26, 'Indore', 'Jabalpur', 'Pithampur', 'None Of One', 'None Of One', 'Jabalpur', 0, '2025-04-17 10:51:51', 1, 'Which one is capital of MP?', 0),
(27, 3, 13, 27, 'Indore', 'Chennail', 'Kolkata', 'Pithumpur', 'Pithumpur', 'Pithumpur', 1, '2025-04-17 10:52:24', 1, 'Which citi is known as industrial town?', 1),
(28, 3, 13, 28, 'Lion', 'Cow', 'Dog', 'Donkey', 'Lion', 'Lion', 1, '2025-04-17 10:52:47', 1, 'Which animal is national animal?', 1),
(29, 3, 13, 29, 'Jawahar Lal Nehru', 'Bhagat Singh', 'Mahatma Gandhi', 'Narendra Modi', 'Mahatma Gandhi', 'Mahatma Gandhi', 1, '2025-04-17 10:53:12', 1, 'Who is father of nation?', 1),
(30, 3, 13, 30, 'No', 'May be', 'Yes', 'Pata ni', 'No', 'May be', 0, '2025-04-17 10:53:36', 1, 'Kya Palak Ab Regular Class Aayegi?', 0),
(31, 3, 13, 31, 'No', 'May be', 'Yes', 'Pata ni', 'No', 'Pata ni', 0, '2025-04-17 10:53:41', 1, 'Kya Palak Ab Regular Class Aayegi?', 0),
(32, 3, 13, 32, 'Rahul Gnndhi', 'Shivraj Singh', 'Narendra Damodar Modi', 'No Of One', 'Narendra Damodar Modi', 'Narendra Damodar Modi', 1, '2025-04-17 10:54:06', 1, 'Who is prime minister of India?', 1),
(33, 3, 13, 33, 'China', 'Pakistan', 'India', 'Bharat', 'Bharat', 'Bharat', 1, '2025-04-17 10:54:25', 1, 'What is name of Our Country?', 1),
(34, 3, 13, 34, 'Lord', 'Freedom Fighter', 'Terrorist', 'No Of One', 'Freedom Fighter', 'Freedom Fighter', 1, '2025-04-17 10:54:31', 1, 'Who is Bhagat Singh?', 1),
(35, 3, 13, 35, 'Watermalon', 'Graps', 'Banana', 'Mango', 'Mango', 'Graps', 0, '2025-04-17 10:54:35', 1, 'Which Fruits Known As King Of Fruits?', 0),
(36, 3, 13, 36, 'Jawahar Lal Nehru', 'Rahul Gandhi', 'Mahatma Gandhi', 'Rajiv Gandhi', 'Mahatma Gandhi', 'Rahul Gandhi', 0, '2025-04-17 10:54:47', 1, 'Who is the father of nation?', 0);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

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
-- Indexes for table `test_resports`
--
ALTER TABLE `test_resports`
  ADD PRIMARY KEY (`report_id`);

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
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test_resports`
--
ALTER TABLE `test_resports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
