-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 12:26 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `attendance_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `daily_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`attendance_id`, `class_id`, `student_id`, `daily_date`, `status`) VALUES
(1, 1, 1, '2024-03-21', 'Present'),
(2, 1, 2, '2024-03-21', 'Absent'),
(3, 2, 5, '2024-03-07', 'Present'),
(4, 2, 5, '2024-03-08', 'Present'),
(6, 2, 5, '2024-03-23', 'Present'),
(7, 1, 3, '2024-03-23', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `class_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `schedule` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`class_id`, `course_id`, `teacher_id`, `schedule`) VALUES
(1, 1, 1, 'MWF 9:00 AM'),
(2, 2, 2, 'TTH 10:00 AM'),
(3, 2, 2, 'MRG 11:00 AM'),
(4, 2, 20, 'AFT 12:00 PM'),
(5, 22, 2, 'MRG 11:00 AM'),
(6, 3, 21, 'AFT 02:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`course_id`, `course_name`, `teacher_id`, `subject_id`) VALUES
(1, 'English', 1, 1),
(2, 'Science', 2, 2),
(3, 'Maths', 21, 1),
(21, 'Kannada', 1, 1),
(22, 'hindi', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `teacher_id`, `action`, `date`) VALUES
(1, 20, 'inserted', '2024-03-21 13:56:52'),
(2, 6, 'Updated', '2024-03-21 14:01:28'),
(3, 21, 'inserted', '2024-03-23 09:35:57'),
(4, 1, 'updated', '2024-03-25 07:18:17'),
(5, 2, 'updated', '2024-03-25 07:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `Marks`
--

CREATE TABLE `Marks` (
  `marks_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `kannada` varchar(20) DEFAULT NULL,
  `hindi` varchar(20) DEFAULT NULL,
  `english` varchar(20) DEFAULT NULL,
  `maths` varchar(20) DEFAULT NULL,
  `science` varchar(20) DEFAULT NULL,
  `social` varchar(20) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Marks`
--

INSERT INTO `Marks` (`marks_id`, `student_id`, `class_id`, `kannada`, `hindi`, `english`, `maths`, `science`, `social`, `total_marks`, `percentage`) VALUES
(1, 1, 1, '54', '48', '79', '97', '89', '99', 466, 77.67),
(2, 2, 2, '90', '80', '90', '80', '90', '70', 500, 83.33),
(6, 3, 3, '95', '95', '95', '95', '95', '95', 570, 95.00),
(7, 2, 1, '36', '96', '89', '75', '78', '95', 469, 78.17),
(8, 3, 1, '87', '85', '95', '96', '44', '58', 465, 77.50),
(9, 5, 1, '98', '98', '75', '78', '59', '78', 486, 81.00);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `parent_contact_info` varchar(100) DEFAULT NULL,
  `parent_email` varchar(255) DEFAULT NULL,
  `class_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`student_id`, `first_name`, `last_name`, `date_of_birth`, `address`, `parent_contact_info`, `parent_email`, `class_id`) VALUES
(1, 'John', 'Doe', '2000-01-01', '123 Main St', '123-456-7890', 'john@gmail.com', '1'),
(2, 'Jane', 'Smith', '2001-02-02', '456 Elm St', '987-654-3210', 'jane@gmail.com', '1'),
(3, 'srinu', 'reddy', '2002-12-21', 'havambhavi', '8050621229', 'srinu.21229@gmail.com', '10'),
(4, 'deepa', 'reddy', '2003-12-21', 'havambhavi', '8050621229', 'b09k.sreedeepa@gmail.com', '2'),
(5, 'K V', 'Gowtham', '2003-06-16', 'toarnagallu', '8050697851', 'kvgowtham09@gmail.com', '2'),
(6, 'rama', 'seetha', '2000-01-01', 'ayodhya', '9521745285', 'rama@gmail.com', '3'),
(7, 'hari', 'kumar', '1980-01-01', 'harinagar', '96527452652', 'hari@gmail.com', '4'),
(8, 'virat', 'k', '2024-03-05', 'mumbai', '8096521745', 'sri@gmail.com', '5'),
(9, 'ram', 'ram', '2024-03-20', 'ram', '957452521', 'ram@gmail.com', '1');

--
-- Triggers `Student`
--
DELIMITER $$
CREATE TRIGGER `si` AFTER INSERT ON `Student` FOR EACH ROW BEGIN
    INSERT INTO stu_log VALUES (null, NEW.student_id, 'Inserted', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `st` AFTER DELETE ON `Student` FOR EACH ROW BEGIN
    INSERT INTO stu_log VALUES (null, OLD.student_id, 'Deleted', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stu` AFTER UPDATE ON `Student` FOR EACH ROW BEGIN
    INSERT INTO stu_log VALUES (null, NEW.student_id, 'Updated', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_log`
--

CREATE TABLE `stu_log` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_log`
--

INSERT INTO `stu_log` (`id`, `student_id`, `action`, `date`) VALUES
(1, 6, 'Updated', '2024-03-21 14:04:09'),
(2, 7, 'Inserted', '2024-03-23 09:32:38'),
(3, 8, 'Inserted', '2024-03-24 23:19:45'),
(4, 1, 'Updated', '2024-03-24 23:21:43'),
(5, 2, 'Updated', '2024-03-24 23:21:43'),
(6, 3, 'Updated', '2024-03-24 23:21:43'),
(7, 4, 'Updated', '2024-03-24 23:21:43'),
(8, 5, 'Updated', '2024-03-24 23:21:43'),
(9, 6, 'Updated', '2024-03-24 23:21:43'),
(10, 7, 'Updated', '2024-03-24 23:21:43'),
(11, 9, 'Inserted', '2024-03-25 00:55:12'),
(12, 1, 'Updated', '2024-03-25 00:56:08'),
(13, 2, 'Updated', '2024-03-25 00:56:08'),
(14, 3, 'Updated', '2024-03-25 00:56:08'),
(15, 4, 'Updated', '2024-03-25 00:56:08'),
(16, 5, 'Updated', '2024-03-25 00:56:08'),
(17, 6, 'Updated', '2024-03-25 00:56:08'),
(18, 7, 'Updated', '2024-03-25 00:56:08'),
(19, 8, 'Updated', '2024-03-25 00:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE `Subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` (`subject_id`, `subject_name`) VALUES
(1, 'Mathematics'),
(2, 'Science'),
(3, 'Social'),
(4, 'Kannada'),
(5, 'Hindi'),
(6, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`teacher_id`, `first_name`, `last_name`, `email`, `phone_number`, `department`) VALUES
(1, 'Mic', 'Johnson', 'michael@example.com', '555-1234', 'Mathematics'),
(2, 'Emil', 'Williams', 'emily@example.com', '555-5678', 'Science'),
(20, 'radha', 'krishna', 'radha@gmail.com', '7528541852', 'Science'),
(21, 'A', 'Shivamma', 'sri@gmail.com', '95214725', 'Maths');

--
-- Triggers `Teacher`
--
DELIMITER $$
CREATE TRIGGER `teach` AFTER INSERT ON `Teacher` FOR EACH ROW BEGIN
    INSERT INTO log VALUES (null, NEW.teacher_id, 'inserted', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `teacher` AFTER DELETE ON `Teacher` FOR EACH ROW BEGIN
    INSERT INTO log VALUES (null, OLD.teacher_id, 'deleted', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `teacheru` AFTER UPDATE ON `Teacher` FOR EACH ROW BEGIN
    INSERT INTO log VALUES (null, NEW.teacher_id, 'updated', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reg_date`) VALUES
(1, '1', '1@gmail.com', '$2y$10$RenthJB5dOgMUy7Vi1/KaeB.Gp/ASYuNkHp0vWOpZulGIQFSV6o5K', '2024-03-21 13:47:31'),
(2, 'Srinu', 'srinu@gmail.c0m', '$2y$10$RYchIRJgJJUvqls9aieiaO7A2kz/FnXUFFZa0cukOo8XCMd9EiiV.', '2024-03-25 11:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Marks`
--
ALTER TABLE `Marks`
  ADD PRIMARY KEY (`marks_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `stu_log`
--
ALTER TABLE `stu_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Subject`
--
ALTER TABLE `Subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Marks`
--
ALTER TABLE `Marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stu_log`
--
ALTER TABLE `stu_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Subject`
--
ALTER TABLE `Subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`),
  ADD CONSTRAINT `Attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`);

--
-- Constraints for table `Class`
--
ALTER TABLE `Class`
  ADD CONSTRAINT `Class_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `Course` (`course_id`),
  ADD CONSTRAINT `Class_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `Teacher` (`teacher_id`);

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `Course_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `Teacher` (`teacher_id`),
  ADD CONSTRAINT `Course_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `Subject` (`subject_id`);

--
-- Constraints for table `Marks`
--
ALTER TABLE `Marks`
  ADD CONSTRAINT `Marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`),
  ADD CONSTRAINT `Marks_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
