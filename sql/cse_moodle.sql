-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 05:33 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_moodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `course_teacher_id` int(11) NOT NULL,
  `course_credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `course_code`, `course_title`, `semester`, `course_teacher_id`, `course_credit`) VALUES
(2, 'cse-415', 'web engineering', 7, 8, 2),
(3, 'cse-215', 'java technology', 3, 12, 3),
(4, 'cse-111', 'c', 1, 12, 3),
(6, 'cse-311', 'theory of computation', 5, 10, 2),
(8, 'cse-324', 'e-commerce', 6, 8, 2),
(10, 'cse-221', 'algorithm analysis and design', 4, 12, 2),
(12, 'cse-121', 'data structure', 2, 12, 3),
(14, 'cse-103', 'discrete mathematics', 1, 10, 2),
(17, 'cse-421', 'digital image processing', 8, 10, 3),
(20, 'cse-424', 'VLSI design', 8, 8, 2),
(22, 'cse-328', 'computer networks', 6, 8, 3),
(23, 'cse-419', 'human interaction', 7, 8, 2),
(24, 'cse-115', 'electrical circuit & device', 1, 10, 2),
(25, 'cse-114', 'differential and integral calculus', 1, 12, 3),
(27, 'cse-422', 'pattern recognition and neural networking', 8, 12, 3),
(28, 'cse-426', 'parallel and distributed system', 8, 15, 2),
(29, 'cse-411', 'artificial intelligence and expert system', 7, 10, 3),
(30, 'cse-413', 'compiler design', 7, 13, 3),
(31, 'cse-416', 'computer graphics', 7, 15, 2),
(33, 'cse-124', 'physics', 2, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `incourse`
--

CREATE TABLE `incourse` (
  `marks_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `marks_course_id` int(11) NOT NULL,
  `incourse_teacher_id` int(11) NOT NULL,
  `mid_1` float NOT NULL,
  `mid_2` float NOT NULL,
  `mid_avg` float NOT NULL,
  `attendance` float NOT NULL,
  `assignment` float NOT NULL,
  `presentation` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incourse`
--

INSERT INTO `incourse` (`marks_id`, `stu_id`, `marks_course_id`, `incourse_teacher_id`, `mid_1`, `mid_2`, `mid_avg`, `attendance`, `assignment`, `presentation`, `total`) VALUES
(21, 108005, 20, 8, 15, 18, 8.25, 3.75, 2, 2, 16),
(24, 108007, 20, 8, 17, 16, 8.25, 4, 2.5, 2, 16.75),
(25, 108010, 20, 8, 15, 13, 7, 4.5, 2.5, 2.25, 16.25);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_title` varchar(255) NOT NULL,
  `notification_content` varchar(255) NOT NULL,
  `notification_date` text NOT NULL,
  `notification_teacher_id` int(11) NOT NULL,
  `notification_course_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_title`, `notification_content`, `notification_date`, `notification_teacher_id`, `notification_course_id`, `semester`) VALUES
(11, 'mid term', 'next sunday your mid term  1 will be held. be prepare everyone.', '2017-11-29 23:56:03', 8, 20, 8),
(12, 'class cancel', 'Tomorrow no class will be held.', '2017-11-29 23:56:32', 8, 20, 8),
(15, 'mid-term', 'Next thursday your mid 01 will be held.', '2017-11-30 10:43:20', 8, 2, 7),
(16, 'presentation', 'Next week i will take a presentation. So be prepare everyone.', '2017-11-30 23:44:59', 8, 2, 7),
(17, 'assignment', 'Everyone should submit your assignment within next thursday.', '2017-12-01 00:00:53', 10, 17, 8),
(18, 'class time', 'tomorrow i will take the class at 12pm.', '2017-12-01 00:02:40', 10, 17, 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_course_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `post_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_course_id`, `post_title`, `post_author`, `post_date`, `post_content`, `post_file`) VALUES
(3, 2, 'bootstrap grid system', 'partha chakrabarty', '2017-11-23 22:35:54', 'bootstrap grid system is very important topics. everyone cover this. ', 'HTMLTAGS.docx'),
(4, 3, 'Java assignment', 'mahmudul hasan', '2017-11-23 23:04:07', 'Hei dear students, here is your assignment. You have to submit it before next sunday. ', 'Java  Assignment - 3.docx'),
(5, 22, 'ip adress', 'partha chakrabarty', '2017-11-25 01:38:29', 'this ppt file will cover all ip address topics and concepts. Happy study.', 'IP-address.ppt'),
(6, 20, 'VLSI document', 'partha chakrabarty', '2017-12-01 01:30:40', 'here is a word document file for your vlsi course. download it and read it.', 'vlsi doc.docx'),
(7, 17, 'chapter one', 'faisal bin abdul aziz', '2017-12-01 02:13:34', 'here is a document for chapter one.', 'digital image processing.txt');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `user_name`, `roll_no`, `reg_no`, `semester`, `user_email`, `user_password`, `user_image`) VALUES
(11, 'saroar', 'alam', 'saroar', 108007, 730110, 8, 'saroar@gmail.com', '12345', 'IMG_5882.JPG'),
(12, 'rubaiya', 'rusnat', 'runu', 108010, 730010, 8, 'runu@gmail.com', '12345', 'IMG_5891.JPG'),
(13, 'mahbub', 'alam', 'raju', 108005, 730110, 8, 'raju@gmail.com', '12345', 'IMG_6430.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_designation` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `teacher_image` text NOT NULL,
  `teacher_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_designation`, `teacher_email`, `teacher_password`, `teacher_image`, `teacher_mobile`) VALUES
(8, 'partha chakrabarty', 'lecturer', 'partha@gmail.com', '12345', '12365887_10153399587112144_909847814507621248_o.jpg', '01717629764'),
(10, 'faisal bin abdul aziz', 'assistant professor', 'faisal@gmail.com', '12345', 'DSC00042.JPG', '01717258963'),
(12, 'mahmudul hasan', 'assistant professor', 'mahmudul@gmail.com', '12345', 'DSC00005.JPG', '01712345678'),
(13, 'hafizur rahman', 'lecturer', 'hafizur@gmail.com', '12345', 'FB_IMG_1511940539666.jpg', '01721021909'),
(15, 'kamal hossain', 'assistant professor', 'kamal@gmail.com', '12345', 'FB_IMG_1511941960118.jpg', '01789654123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `incourse`
--
ALTER TABLE `incourse`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `incourse`
--
ALTER TABLE `incourse`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
