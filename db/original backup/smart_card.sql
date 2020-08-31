-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 08:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sec_name` varchar(100) NOT NULL,
  `t_id` int(100) NOT NULL,
  `s_id` int(100) NOT NULL,
  `date` date DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sec_name`, `t_id`, `s_id`, `date`, `time`) VALUES
('MATH 003 A', 11233, 11163071, '2020-05-02', '2020-05-26 15:36:29'),
('MATH 003 A', 11233, 11163071, '2020-05-05', '2020-05-26 15:36:29'),
('MATH 003 A', 11233, 11163071, '2020-05-09', '2020-05-26 15:36:29'),
('MATH 003 A', 11233, 11163071, '2020-05-12', '2020-05-26 15:36:29'),
('CSI 321 A', 12233, 11163071, '2020-05-03', '2020-05-26 15:38:37'),
('CSI 321 A', 12233, 11163071, '2020-05-06', '2020-05-26 15:38:37'),
('CSI 321 A', 12233, 11163071, '2020-05-10', '2020-05-26 15:38:37'),
('CSI 321 A', 12233, 11163071, '2020-05-13', '2020-05-26 15:38:37'),
('CSI 321 A', 12233, 11163071, '2020-05-17', '2020-05-26 15:38:37'),
('CSI 322 C', 12233, 11163071, '2020-05-02', '2020-05-26 15:39:26'),
('CSI 322 C', 12233, 11163071, '2020-05-09', '2020-05-26 15:39:26'),
('CSI 322 C', 12233, 11163071, '2020-05-16', '2020-05-26 15:39:26'),
('MATH 201 B', 12233, 11163071, '2020-05-03', '2020-05-26 15:40:23'),
('MATH 201 B', 12233, 11163071, '2020-05-06', '2020-05-26 15:40:23'),
('MATH 201 B', 12233, 11163071, '2020-05-10', '2020-05-26 15:40:23'),
('MATH 201 B', 12233, 11163071, '2020-05-13', '2020-05-26 15:40:23'),
('CSI 415 D', 11233, 11163071, '2020-05-03', '2020-05-26 15:43:31'),
('CSI 415 D', 11233, 11163071, '2020-05-06', '2020-05-26 15:43:31'),
('CSI 415 D', 11233, 11163071, '2020-05-10', '2020-05-26 15:43:31'),
('CSI 415 D', 11233, 11163071, '2020-05-13', '2020-05-26 15:43:31'),
('CSI 321 A', 12233, 11163071, '2020-05-28', '2020-05-27 18:56:34'),
('CSI 321 A', 12233, 11163071, '2020-05-28', '2020-05-27 18:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `classdate`
--

CREATE TABLE `classdate` (
  `sec_name` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `class_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classdate`
--

INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES
('MATH 003 A', '2020-05-02', 'regular'),
('MATH 003 A', '2020-05-05', 'regular'),
('MATH 003 A', '2020-05-09', 'regular'),
('MATH 003 A', '2020-05-12', 'regular'),
('CSI 321 A', '2020-05-03', 'regular'),
('CSI 321 A', '2020-05-06', 'regular'),
('CSI 321 A', '2020-05-10', 'regular'),
('CSI 321 A', '2020-05-13', 'regular'),
('CSI 321 A', '2020-05-17', 'regular'),
('CSI 322 C', '2020-05-02', 'regular'),
('CSI 322 C', '2020-05-09', 'regular'),
('CSI 322 C', '2020-05-16', 'regular'),
('MATH 201 B', '2020-05-03', 'regular'),
('MATH 201 B', '2020-05-06', 'regular'),
('MATH 201 B', '2020-05-10', 'regular'),
('MATH 201 B', '2020-05-10', 'regular'),
('CSI 415 D', '2020-05-03', 'regular'),
('CSI 415 D', '2020-05-06', 'regular'),
('CSI 415 D', '2020-05-10', 'regular'),
('CSI 415 D', '2020-05-13', 'regular'),
('MATH 003 A', '2020-05-16', 'regular'),
('CSI 312 A', '2020-05-17', 'regular'),
('MATH 201 B', '2020-05-17', 'regular'),
('CSI 321 A', '2020-05-20', 'regular'),
('CSI 321 A', '2020-05-24', 'regular'),
('CSI 321 A', '2020-05-27', 'regular'),
('CSI 321 A', '2020-05-31', 'regular'),
('CSI 321 A', '2020-05-28', 'makeup');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_code` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_code`, `c_name`) VALUES
('CSI 321', 'Software Engineering'),
('CSI 322', 'Software Engineering Laboratory'),
('CSI 415', 'Pattern Recognition'),
('CSI 416', 'Pattern Recognition Laboratory'),
('CSI-233', 'Theory Of Computing'),
('MATH 003', 'Elementary Calculus '),
('Math 201', 'Vector Analysis'),
('MATH 205', 'Probability and Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `r_tag` varchar(100) NOT NULL,
  `r_role` varchar(100) NOT NULL,
  `r_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`r_tag`, `r_role`, `r_id`) VALUES
('0EEF3A1A', 'Student', 11172070),
('0EEF4A12', 'Student', 11163078),
('97C9567B', 'Teacher', 11233),
('9AF92F16', 'Teacher', 12233),
('B7ED4C19', 'Student', 11163071),
('B8ED5C19', 'Student', 11162009),
('BB09101C', 'Student', 11171327);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `c_code` varchar(100) NOT NULL,
  `t_id` int(100) NOT NULL,
  `sec_name` varchar(100) NOT NULL,
  `sec_start_time` time(6) DEFAULT NULL,
  `sec_end_time` time(6) DEFAULT NULL,
  `sec_room_number` int(50) DEFAULT NULL,
  `sec_rfid_reader` varchar(100) NOT NULL,
  `sec_trimester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`) VALUES
('CSI 321', 12233, 'CSI 321 A', '12:00:00.000000', '13:40:00.000000', 375, '375r', '201'),
('CSI 322', 12233, 'CSI 322 C', '15:44:00.000000', '18:44:00.000000', 210, '210r', '201'),
('CSI 415', 11233, 'CSI 415 D', '08:45:03.000000', '09:45:03.000000', 312, '312r', '201'),
('MATH 003', 11233, 'MATH 003 A', '25:35:58.000000', '36:35:58.000000', 207, '207r', '201'),
('Math 201', 12233, 'MATH 201 B', '18:47:31.000000', '20:47:31.000000', 310, '310r', '201'),
('MATH 205', 11233, 'MATH 205 A', '14:52:11.000000', '17:52:11.000000', 212, '212r', '201');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serv_id` varchar(100) NOT NULL,
  `serv_name` varchar(100) NOT NULL,
  `serv_balance` varchar(100) NOT NULL,
  `serv_reader_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(100) NOT NULL,
  `s_tag` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_password` varchar(100) NOT NULL,
  `s_department` varchar(100) NOT NULL,
  `s_batch` int(50) NOT NULL,
  `s_phone` int(50) NOT NULL,
  `s_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_tag`, `s_name`, `s_email`, `s_password`, `s_department`, `s_batch`, `s_phone`, `s_photo`) VALUES
(11162009, 'B8ED5C19', 'Arafat Hossain Kishor', 'ahkishor93.ahk@gmail.com', 'kishor123', 'CSE', 162, 1635662133, NULL),
(11163071, 'B7ED4C19', 'ALI IKTIDER SAYAM', 'asayam163071@bscse.uiu.ac.bd', 'sayam1234', 'CSE', 163, 1721716139, NULL),
(11163078, '0EEF4A12', 'Fatema Binte Iqbal', 'fiqbal163078@bscse.uiu.ac.bd', 'fattyboo123', 'CSE', 163, 1831461981, NULL),
(11171327, 'BB09101C', 'FARZANA SULTANA SOHA', 'fsulatana@gmail.com', 'far123', 'CSE', 171, 1777660829, NULL),
(11172070, '0EEF3A1A', 'MD. AKIB AL JAWAD ARNOB', 'akibaljawadarnob@gmail.com', 'arnob1234', 'CSE', 172, 1521418857, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentjcourse`
--

CREATE TABLE `studentjcourse` (
  `s_id` int(100) NOT NULL,
  `c_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentjcourse`
--

INSERT INTO `studentjcourse` (`s_id`, `c_code`) VALUES
(11163071, 'MATH 003'),
(11172070, 'MATH 205'),
(11163071, 'CSI 321'),
(11163071, 'CSI 322'),
(11163071, 'Math 201'),
(11163071, 'CSI 415');

-- --------------------------------------------------------

--
-- Table structure for table `studentjsection`
--

CREATE TABLE `studentjsection` (
  `s_id` int(100) NOT NULL,
  `c_code` varchar(100) NOT NULL,
  `sec_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentjsection`
--

INSERT INTO `studentjsection` (`s_id`, `c_code`, `sec_name`) VALUES
(11163071, 'MATH 003', 'MATH 003 A'),
(11163071, 'CSI 321', 'CSI 321 A'),
(11163071, 'CSI 322', 'CSI 322 C'),
(11163071, 'CSI 415', 'CSI 415 D'),
(11163071, 'Math 201', 'MATH 201 B'),
(11172070, 'MATH 205', 'MATH 205 A');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(100) NOT NULL,
  `t_tag` varchar(100) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_email` varchar(100) NOT NULL,
  `t_password` varchar(100) NOT NULL,
  `t_department` varchar(100) NOT NULL,
  `t_phone` int(50) NOT NULL,
  `t_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_tag`, `t_name`, `t_email`, `t_password`, `t_department`, `t_phone`, `t_photo`) VALUES
(11233, '97C9567B', 'SAKIBUR ROHIT SAJAL', 'sajal@gmail.com', 'sajal1234', 'CSE', 1756013171, NULL),
(12233, '9AF92F16', 'NOVA MAM', 'nova@bscse.uiu.ac.bd', 'no1234', 'CSE', 1756013171, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacherjcourse`
--

CREATE TABLE `teacherjcourse` (
  `t_id` int(100) NOT NULL,
  `c_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherjcourse`
--

INSERT INTO `teacherjcourse` (`t_id`, `c_code`) VALUES
(12233, 'CSI 321'),
(12233, 'CSI-233'),
(12233, 'CSI 322'),
(11233, 'CSI 415'),
(11233, 'CSI 416'),
(12233, 'Math 201'),
(11233, 'MATH 003'),
(11233, 'MATH 205');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tr_id` varchar(100) NOT NULL,
  `r_tag` varchar(100) NOT NULL,
  `serv_id` varchar(100) NOT NULL,
  `tr_amount` varchar(100) NOT NULL,
  `tr_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `w_balance` varchar(100) NOT NULL,
  `r_tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `t_id` (`t_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `sec_name` (`sec_name`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_code`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`r_tag`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD UNIQUE KEY `sec_name` (`sec_name`),
  ADD KEY `c_code` (`c_code`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_tag` (`s_tag`);

--
-- Indexes for table `studentjcourse`
--
ALTER TABLE `studentjcourse`
  ADD KEY `s_id` (`s_id`),
  ADD KEY `c_code` (`c_code`);

--
-- Indexes for table `studentjsection`
--
ALTER TABLE `studentjsection`
  ADD KEY `s_id` (`s_id`),
  ADD KEY `c_code` (`c_code`),
  ADD KEY `sec_name` (`sec_name`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_tag` (`t_tag`);

--
-- Indexes for table `teacherjcourse`
--
ALTER TABLE `teacherjcourse`
  ADD KEY `t_id` (`t_id`),
  ADD KEY `c_code` (`c_code`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `serv_id` (`serv_id`),
  ADD KEY `r_tag` (`r_tag`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD KEY `r_tag` (`r_tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11172071;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12234;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`),
  ADD CONSTRAINT `Attendance_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `Attendance_ibfk_3` FOREIGN KEY (`sec_name`) REFERENCES `section` (`sec_name`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `Section_ibfk_1` FOREIGN KEY (`c_code`) REFERENCES `course` (`c_code`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`s_tag`) REFERENCES `rfid` (`r_tag`);

--
-- Constraints for table `studentjcourse`
--
ALTER TABLE `studentjcourse`
  ADD CONSTRAINT `studentJcourse_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `studentJcourse_ibfk_2` FOREIGN KEY (`c_code`) REFERENCES `course` (`c_code`),
  ADD CONSTRAINT `studentJcourse_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `studentJcourse_ibfk_4` FOREIGN KEY (`c_code`) REFERENCES `course` (`c_code`);

--
-- Constraints for table `studentjsection`
--
ALTER TABLE `studentjsection`
  ADD CONSTRAINT `studentjsection_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `studentjsection_ibfk_2` FOREIGN KEY (`c_code`) REFERENCES `course` (`c_code`),
  ADD CONSTRAINT `studentjsection_ibfk_3` FOREIGN KEY (`sec_name`) REFERENCES `section` (`sec_name`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `Teacher_ibfk_1` FOREIGN KEY (`t_tag`) REFERENCES `rfid` (`r_tag`);

--
-- Constraints for table `teacherjcourse`
--
ALTER TABLE `teacherjcourse`
  ADD CONSTRAINT `teacherJcourse_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`),
  ADD CONSTRAINT `teacherJcourse_ibfk_2` FOREIGN KEY (`c_code`) REFERENCES `course` (`c_code`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`serv_id`) REFERENCES `service` (`serv_id`),
  ADD CONSTRAINT `Transaction_ibfk_2` FOREIGN KEY (`r_tag`) REFERENCES `wallet` (`r_tag`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `Wallet_ibfk_1` FOREIGN KEY (`r_tag`) REFERENCES `rfid` (`r_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
