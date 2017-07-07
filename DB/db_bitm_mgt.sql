-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2017 at 03:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bitm_mgt`
--
CREATE DATABASE IF NOT EXISTS `db_bitm_mgt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_bitm_mgt`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_verified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `email_verified`) VALUES
(2, 'Rahul', 'Biswas', 'rbiswas596@gmail.com', 'rrahool', 'd0970714757783e6cf17b26fb8e2298f', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `seid` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `entry_verification` varchar(100) NOT NULL,
  `entry_time` varchar(20) NOT NULL,
  `exit_verification` varchar(100) NOT NULL,
  `exit_time` varchar(20) NOT NULL,
  `attendance_status` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batches`
--

CREATE TABLE `tbl_batches` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_batches`
--

INSERT INTO `tbl_batches` (`id`, `course_id`, `batch`) VALUES
(1, 1, 'PHP- B57'),
(2, 1, 'PHP - B58'),
(3, 1, 'PHP- B59'),
(4, 1, 'PHP- B56'),
(6, 2, 'WD - B62'),
(7, 2, 'WD - B63'),
(8, 2, 'WD - B64'),
(9, 2, 'WD - B65'),
(10, 3, 'DN - B35'),
(11, 3, 'DN - B36'),
(12, 1, 'PHP - B45'),
(13, 1, 'PHP - B47'),
(14, 3, 'DN - B32'),
(15, 1, 'PHP - B60'),
(16, 3, 'DN - B37'),
(17, 4, 'AM - B6'),
(18, 4, 'AM - B7'),
(19, 4, 'AM - B8'),
(20, 4, 'AM - B9'),
(21, 5, 'AD - 05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`id`, `name`) VALUES
(1, 'PHP - Web Application Development'),
(2, 'Web Design'),
(3, 'Dot Net'),
(4, 'Affiliate Marketing'),
(5, 'Mobile App Develop - Android'),
(6, 'Python - Beginners to Intermediate'),
(7, 'SEO'),
(8, 'fgjfcxhfx'),
(10, 'jkdjkdrjg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `session_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_mode` varchar(100) NOT NULL DEFAULT 'IN',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `batch_id` int(11) NOT NULL,
  `seid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`batch_id`, `seid`, `name`, `email`, `phone`) VALUES
(1, 168501, 'Rahul Biswas', 'rrahoolessence209@gmail.com', '1677549094'),
(1, 168502, 'Avinanda Chakraborty', 'aavinandachy209@gmail.com', '1626019694'),
(1, 168503, 'John Doe', 'johndoe@gmail.com', '1764416712'),
(1, 168507, 'Cemila Cabalo', 'cemilacab02@gmail.com', '1945323200'),
(1, 168508, 'Cemila Cabalo', 'cemilacab02@gmail.com', '1945323200'),
(1, 168509, 'Cemila Cabalo', 'cemilacab02@gmail.com', '1945323200'),
(12, 112233, 'Cemila Cabalo', 'cemilacab02@gmail.com', '1945323200'),
(21, 178501, 'jjzjdjkzfjkd', 'sdfufsdfhjf@gmail.com', '45456555'),
(21, 178502, 'sdfszfszdsx', 'fggszfv@gmail.com', '54141748'),
(21, 178503, 'oigfsfdhz', 'ivvzxdzs@gmail.com', '465615211'),
(21, 178507, 'xfdgdrzs', 'frvssdf@gmail.com', '1945323200'),
(21, 178508, 'Cemila Cabalo', 'cemilacab02@gmail.com', '1945323200');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_temp`
--

CREATE TABLE `tbl_student_temp` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `seid` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `email_verified` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_temp`
--

INSERT INTO `tbl_student_temp` (`id`, `name`, `email`, `seid`, `password`, `email_verified`) VALUES
(1, 'Rahim', 'rrahoolessence209@gmail.com', 168501, 112233, 'Yes'),
(2, 'Karim', 'rbiswas596@gmail.com', 168501, 112233, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainers`
--

CREATE TABLE `tbl_trainers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `course_taken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_trainers`
--

INSERT INTO `tbl_trainers` (`id`, `fullname`, `email`, `username`, `password`, `course_taken`) VALUES
(1, 'Tushar Chowdhury', 'tusharchy@gmail.com', '', '112233', 'PHP'),
(2, 'Abu Zayed Hasnain', 'abzayed@gmail.com', '', '123456', 'PHP OOP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session` (`session`),
  ADD KEY `seid` (`seid`);

--
-- Indexes for table `tbl_batches`
--
ALTER TABLE `tbl_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `course_id_2` (`course_id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`id`,`session_name`,`date`,`start_time`,`end_time`,`room_no`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`seid`,`name`,`email`,`phone`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `tbl_student_temp`
--
ALTER TABLE `tbl_student_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_batches`
--
ALTER TABLE `tbl_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_temp`
--
ALTER TABLE `tbl_student_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `tbl_attendance_ibfk_1` FOREIGN KEY (`seid`) REFERENCES `tbl_students` (`seid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_batches`
--
ALTER TABLE `tbl_batches`
  ADD CONSTRAINT `tbl_batches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD CONSTRAINT `tbl_session_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `tbl_batches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD CONSTRAINT `tbl_students_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `tbl_batches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
