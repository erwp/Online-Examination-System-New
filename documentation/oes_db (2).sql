-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 04:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `e_id` int(11) NOT NULL COMMENT 'ID',
  `e_name` varchar(100) NOT NULL COMMENT 'Stores Examination name',
  `e_reg_start` datetime NOT NULL,
  `e_reg_end` datetime NOT NULL,
  `e_exam_start` datetime NOT NULL,
  `e_exam_end` datetime NOT NULL,
  `e_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `e_dou` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `e_created_by` int(11) NOT NULL,
  `e_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`e_id`, `e_name`, `e_reg_start`, `e_reg_end`, `e_exam_start`, `e_exam_end`, `e_doc`, `e_dou`, `e_created_by`, `e_status`) VALUES
(1, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(2, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(3, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(4, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(5, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(6, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(7, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(8, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(9, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(10, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(11, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(12, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(13, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(14, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1),
(15, '6th-sem', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 12:14:50', '2021-09-04 10:16:17', '2021-09-04 03:16:17', 0, 1),
(16, '5th-sem', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 12:16:34', '2021-09-04 10:16:51', '2021-09-04 03:16:51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `option_tbl`
--

CREATE TABLE `option_tbl` (
  `o_id` int(11) NOT NULL,
  `o_q_id` int(11) NOT NULL,
  `o_value` varchar(200) NOT NULL,
  `o_correct` varchar(200) NOT NULL,
  `o_doc` datetime NOT NULL,
  `o_dou` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `o_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `option_tbl`
--

INSERT INTO `option_tbl` (`o_id`, `o_q_id`, `o_value`, `o_correct`, `o_doc`, `o_dou`, `o_status`) VALUES
(1, 2, 'PHP Is a doormate?', '0', '2021-09-06 16:00:26', '2021-09-06 14:02:12', 1),
(2, 2, 'PHP is a programming language.', '1', '2021-09-06 16:00:26', '2021-09-06 14:02:12', 1),
(3, 2, 'PHP is arts book.', '0', '2021-09-06 16:00:26', '2021-09-06 14:02:12', 1),
(4, 2, 'PHP is a keyboard type.', '0', '2021-09-06 16:00:26', '2021-09-06 14:02:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_tbl`
--

CREATE TABLE `question_tbl` (
  `q_id` int(11) NOT NULL,
  `q_e_id` int(11) NOT NULL COMMENT 'Exam Id',
  `q_question` varchar(1000) NOT NULL,
  `q_doc` datetime NOT NULL,
  `q_dou` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `q_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_tbl`
--

INSERT INTO `question_tbl` (`q_id`, `q_e_id`, `q_question`, `q_doc`, `q_dou`, `q_status`) VALUES
(1, 1, 'What is your College name?', '2021-09-06 15:59:43', '2021-09-06 14:05:53', 1),
(2, 1, 'What is PHP?', '2021-09-06 15:59:43', '2021-09-06 14:05:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `r_id` int(11) NOT NULL,
  `r_u_id` int(11) NOT NULL COMMENT 'Student Id',
  `r_q_id` int(11) NOT NULL COMMENT 'Question Id',
  `r_o_id` int(11) NOT NULL COMMENT 'Selected Option ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`r_id`, `r_u_id`, `r_q_id`, `r_o_id`) VALUES
(1, 2, 2, 4),
(2, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_tbl`
--

CREATE TABLE `user_role_tbl` (
  `ur_id` int(11) NOT NULL,
  `ur_name` varchar(50) NOT NULL,
  `ur_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_tbl`
--

INSERT INTO `user_role_tbl` (`ur_id`, `ur_name`, `ur_status`) VALUES
(1, 'Admin', 1),
(2, 'Student', 1),
(3, 'Teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(11) NOT NULL,
  `u_user_role` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_username` varchar(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(500) NOT NULL,
  `u_mobile` int(11) NOT NULL,
  `u_adress` varchar(11) NOT NULL,
  `u_picture` varchar(11) NOT NULL,
  `u_user_approval` tinyint(4) NOT NULL,
  `u_doc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_dou` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`u_id`, `u_user_role`, `u_name`, `u_username`, `u_email`, `u_password`, `u_mobile`, `u_adress`, `u_picture`, `u_user_approval`, `u_doc`, `u_dou`, `u_status`) VALUES
(1, 1, 'Admin', 'admin', 'admin@oes.com', '21232f297a57a5a743894a0e4a801fc3', 0, '', '', 1, '2021-09-14 03:44:45', '2021-09-14 03:44:45', 1),
(2, 2, 'Student', 'student', 'student@oes.com', 'cd73502828457d15655bbd7a63fb0bc8', 0, '', '', 1, '2021-09-14 03:45:44', '2021-09-14 03:45:44', 1),
(3, 3, 'Teacher', 'teacher', 'teacher@oes.com', '8d788385431273d11e8b43bb78f3aa41', 0, '', '', 1, '2021-09-14 03:58:15', '2021-09-14 03:58:15', 1),
(4, 2, 'Student 1', 'student1', 'student1@oes.com', 'student1', 0, '', '', 1, '2021-09-14 03:46:21', '2021-09-14 03:46:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `option_tbl`
--
ALTER TABLE `option_tbl`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `question_tbl`
--
ALTER TABLE `question_tbl`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  ADD PRIMARY KEY (`ur_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `option_tbl`
--
ALTER TABLE `option_tbl`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question_tbl`
--
ALTER TABLE `question_tbl`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
