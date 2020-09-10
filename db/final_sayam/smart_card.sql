-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 02:21 AM
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
  `t_id` varchar(100) NOT NULL,
  `s_id` int(100) NOT NULL,
  `date` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sec_name`, `t_id`, `s_id`, `date`, `time`) VALUES
('MATH 003 A', 'F01192137', 11163071, '2020-05-02', '2020-05-26 09:36:29'),
('MATH 003 A', 'F01192137', 11163071, '2020-05-05', '2020-05-26 09:36:29'),
('MATH 003 A', 'F01192137', 11163071, '2020-05-09', '2020-05-26 09:36:29'),
('MATH 003 A', 'F01192137', 11163071, '2020-05-12', '2020-05-26 09:36:29'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-03', '2020-05-26 09:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-06', '2020-05-26 09:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-10', '2020-05-26 09:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-13', '2020-05-26 09:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-17', '2020-05-26 09:38:37'),
('CSI 322 C', 'F01172096', 11163071, '2020-05-02', '2020-05-26 09:39:26'),
('CSI 322 C', 'F01172096', 11163071, '2020-05-09', '2020-05-26 09:39:26'),
('CSI 322 C', 'F01172096', 11163071, '2020-05-16', '2020-05-26 09:39:26'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-03', '2020-05-26 09:40:23'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-06', '2020-05-26 09:40:23'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-10', '2020-05-26 09:40:23'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-13', '2020-05-26 09:40:23'),
('CSI 415 D', 'F01192137', 11163071, '2020-05-03', '2020-05-26 09:43:31'),
('CSI 415 D', 'F01192137', 11163071, '2020-05-06', '2020-05-26 09:43:31'),
('CSI 415 D', 'F01192137', 11163071, '2020-05-10', '2020-05-26 09:43:31'),
('CSI 415 D', 'F01192137', 11163071, '2020-05-13', '2020-05-26 09:43:31'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-28', '2020-05-27 12:56:34'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-28', '2020-05-27 12:56:36');

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
('CSI 321 A', '2020-05-28', 'makeup'),
('CSI 341 B', '2020-07-05', 'regular'),
('CSI 341 B', '2020-07-08', 'regular'),
('CSI 341 B', '2020-07-12', 'regular'),
('CSI 341 B', '2020-07-15', 'regular'),
('CSI 341 B', '2020-07-19', 'regular'),
('CSI 341 B', '2020-07-22', 'regular'),
('CSI 341 B', '2020-07-26', 'regular'),
('CSI 341 B', '2020-07-29', ''),
('CSI 341 B', '2020-08-02', 'regular'),
('CSI 341 B', '2020-08-05', 'regular'),
('CSI 341 B', '2020-08-09', 'regular'),
('CSI 341 B', '2020-08-12', 'regular'),
('CSI 342 B', '2020-07-05', 'regular'),
('CSI 342 B', '2020-07-12', 'regular'),
('CSI 342 B', '2020-07-19', 'regular'),
('CSI 342 B', '2020-07-26', 'regular'),
('CSI 342 B', '2020-08-02', 'regular'),
('CSI 342 B', '2020-08-09', 'regular'),
('CSI 411 B', '2020-07-04', 'regular'),
('CSI 411 B', '2020-07-07', 'regular'),
('CSI 411 B', '2020-07-11', 'regular'),
('CSI 411 B', '2020-07-14', 'regular'),
('CSI 411 B', '2020-07-18', 'reguilar'),
('CSI 411 B', '2020-07-21', 'regular'),
('CSI 411 B', '2020-07-25', 'regular'),
('CSI 411 B', '2020-07-28', 'regular'),
('CSI 411 B', '2020-08-01', 'regular'),
('CSI 411 B', '2020-08-04', 'regular'),
('CSI 411 B', '2020-08-08', 'regular'),
('CSI 411 B', '2020-08-11', 'regular'),
('CSI 341 B', '2020-08-26', 'regular'),
('CSI 341 B', '2020-08-30', 'regular'),
('CSI 341 B', '2020-09-02', 'regular'),
('CSI 341 B', '2020-09-06', 'regular'),
('CSI 341 B', '2020-09-07', 'make up'),
('CSI 341 B', '2020-09-09', 'regular'),
('CSI 341 B', '2020-09-13', 'regular'),
('CSI 341 B', '2020-09-16', 'regular'),
('CSI 341 B', '2020-09-20', 'regular'),
('CSI 341 B', '2020-09-23', 'regular'),
('CSI 341 B', '2020-09-27', 'regular'),
('CSI 341 B', '2020-09-28', 'make up'),
('CSI 342 B', '2020-08-30', 'regular'),
('CSI 342 B', '2020-09-06', 'regular'),
('CSI 342 B', '2020-09-07', 'make up'),
('CSI 342 B', '2020-09-13', 'regular'),
('CSI 342 B', '2020-09-20', 'regular'),
('CSI 342 B', '2020-09-27', 'regular'),
('CSI 342 B', '2020-09-28', 'make up'),
('CSE 465 A', '2020-07-04', 'regular'),
('CSE 465 A', '2020-07-11', 'regular'),
('CSE 465 A', '2020-07-18', 'regular'),
('CSE 465 A', '2020-07-20', 'make up'),
('CSE 465 A', '2020-07-25', 'regular'),
('CSE 465 A', '2020-08-08', 'regular'),
('CSE 465 A', '2020-08-29', 'regular'),
('CSE 465 A', '2020-09-05', 'regular'),
('CSE 465 A', '2020-09-12', 'regular'),
('CSE 465 A', '2020-09-19', 'regular'),
('CSE 465 A', '2020-09-26', 'regular'),
('CSE 465 A', '2020-09-14', 'makeup'),
('CSI 424 B', '2020-07-07', 'regular'),
('CSI 424 B', '2020-07-14', 'regular'),
('CSI 424 B', '2020-07-21', 'regular'),
('CSI 424 B', '2020-07-28', 'regular'),
('CSI 424 B', '2020-08-04', 'regular'),
('CSI 424 B', '2020-08-10', 'make up'),
('CSI 424 B', '2020-08-18', 'regular'),
('CSI 424 B', '2020-08-25', 'regular'),
('CSI 424 B', '2020-09-01', 'regular'),
('CSI 424 B', '2020-09-08', 'regular'),
('CSI 424 B', '2020-09-15', 'regular'),
('CSI 424 B', '2020-08-22', 'regular'),
('CSI 424 B', '2020-09-29', 'regular'),
('CSI 423 B', '2020-07-04', 'regular'),
('CSI 423 B', '2020-07-07', 'regular'),
('CSI 423 B', '2020-07-11', 'regular'),
('CSI 423 B', '2020-07-14', 'regular'),
('CSI 423 B', '2020-07-18', 'regular'),
('CSI 423 B', '2020-07-20', 'make up'),
('CSI 423 B', '2020-07-21', 'regular'),
('CSI 423 B', '2020-07-25', 'regular'),
('CSI 423 B', '2020-07-28', 'regular'),
('CSI 423 B', '2020-08-04', 'regular'),
('CSI 423 B', '2020-08-08', 'regular'),
('CSI 423 B', '2020-08-10', 'make up'),
('CSI 423 B', '2020-08-18', 'regular'),
('CSI 423 B', '2020-08-25', 'regular'),
('CSI 423 B', '2020-08-29', 'regular'),
('CSI 423 B', '2020-09-01', 'regular'),
('CSI 423 B', '2020-09-05', 'regular'),
('CSI 423 B', '2020-09-08', 'regular'),
('CSI 423 B', '2020-09-12', 'regular'),
('CSI 423 B', '2020-09-14', 'make up'),
('CSI 423 B', '2020-09-15', 'reghular'),
('CSI 423 B', '2020-09-19', 'regular'),
('CSI 423 B', '2020-09-22', 'regular'),
('CSI 423 B', '2020-09-26', 'regular'),
('CSI 423 B', '2020-09-29', 'regular'),
('CSI 341 B', '2020-08-26', 'regular'),
('CSI 341 B', '2020-08-30', 'regular'),
('CSI 341 B', '2020-09-02', 'regular'),
('CSI 341 B', '2020-09-06', 'regular'),
('CSI 341 B', '2020-09-07', 'make up'),
('CSI 341 B', '2020-09-09', 'regular'),
('CSI 341 B', '2020-09-13', 'regular'),
('CSI 341 B', '2020-09-16', 'regular'),
('CSI 341 B', '2020-09-20', 'regular'),
('CSI 341 B', '2020-09-23', 'regular'),
('CSI 341 B', '2020-09-27', 'regular'),
('CSI 341 B', '2020-09-28', 'make up');

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
('CSE 465', 'Web Programming'),
('CSI 321', 'Software Engineering'),
('CSI 322', 'Software Engineering Laboratory'),
('CSI 341', 'Artificial Intelligence'),
('CSI 342', 'Artificial Intelligence Laboratory '),
('CSI 411', 'Compiler'),
('CSI 415', 'Pattern Recognition'),
('CSI 416', 'Pattern Recognition Laboratory'),
('CSI 423', 'Simulation & Modeling'),
('CSI 424', 'Simulation & Modeling Laboratory'),
('CSI-233', 'Theory Of Computing'),
('MATH 003', 'Elementary Calculus '),
('Math 201', 'Vector Analysis'),
('MATH 205', 'Probability and Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `unit_price` int(100) DEFAULT NULL,
  `vendor_id` int(100) NOT NULL,
  `item_qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`item_id`, `item_name`, `unit_price`, `vendor_id`, `item_qty`) VALUES
(4, 'pizza', 40, 2, 10),
(5, 'Pasta', 230, 1, 1230),
(6, 'Chowmein', 170, 1, 130),
(7, 'Apple Juice', 70, 1, 90),
(8, 'Mango Juice', 50, 1, 70),
(9, 'Jira Pani', 50, 1, 55),
(10, 'Green Tea', 10, 1, 1000),
(11, 'Biriyani', 180, 1, 50),
(12, 'Chicken Fry', 50, 1, 50),
(13, 'Crispy Chicken', 50, 1, 100),
(17, 'Dal', 15, 1, 49),
(20, 'Alu Bhaji', 50, 1, 90),
(21, 'Velpuri', 6, 1, 92);

-- --------------------------------------------------------

--
-- Table structure for table `payment_state`
--

CREATE TABLE `payment_state` (
  `payment_id` int(100) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `r_tag` varchar(100) NOT NULL,
  `payment_state` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_state`
--

INSERT INTO `payment_state` (`payment_id`, `vendor_id`, `total_price`, `token`, `r_tag`, `payment_state`) VALUES
(274, 1, 60, 'f54ed14c9575bb95951697fb574af2', '09eace7e', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `r_tag` varchar(100) NOT NULL,
  `r_role` varchar(100) NOT NULL,
  `r_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`r_tag`, `r_role`, `r_id`) VALUES
('09EACE7E', 'Teacher', 'F01192138'),
('0EEF3A1A', 'Student', '11172070'),
('0EEF4A12', 'Student', '11163078'),
('97C9567B', 'Teacher', 'F01192137'),
('9AF92F16', 'Teacher', 'F01172096'),
('B7ED4C19', 'Student', '11163071'),
('B7ED4C29', 'Student', '011163075'),
('B8ED5C10', 'Vendor', '1'),
('B8ED5C14', 'Vendor', '2'),
('B8ED5C19', 'Student', '11162009'),
('BB09101C', 'Student', '11171327'),
('D7FG7C38', 'Student', '1710203047');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `c_code` varchar(100) NOT NULL,
  `t_id` varchar(100) NOT NULL,
  `sec_name` varchar(100) NOT NULL,
  `sec_start_time` time DEFAULT NULL,
  `sec_end_time` time DEFAULT NULL,
  `sec_room_number` int(50) DEFAULT NULL,
  `sec_rfid_reader` varchar(100) NOT NULL,
  `sec_trimester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`) VALUES
('CSE 465', 'F01172096', 'CSE 465 A', '11:00:00', '01:30:00', 410, '235r', '201'),
('CSI 321', 'F01172096', 'CSI 321 A', '12:00:00', '13:40:00', 375, '375r', '201'),
('CSI 322', 'F01172096', 'CSI 322 C', '15:44:00', '18:44:00', 210, '210r', '201'),
('CSI 341', 'F01192137', 'CSI 341 B', '01:30:00', '03:00:00', 325, '255r', '201'),
('CSI 342', 'F01192137', 'CSI 342 B', '11:00:00', '01:30:00', 510, '225r', '201'),
('CSI 411', 'F01172096', 'CSI 411 B', '10:00:00', '11:30:00', 306, '155r', '201'),
('CSI 415', 'F01192137', 'CSI 415 D', '08:45:03', '09:45:03', 312, '312r', '201'),
('CSI 423', 'F01192137', 'CSI 423 B', '14:00:00', '15:30:00', 332, '332r', '201'),
('CSI 424', 'F01192137', 'CSI 424 B', '09:00:00', '11:30:00', 508, '508r', '201'),
('MATH 003', 'F01192137', 'MATH 003 A', '25:35:58', '36:35:58', 207, '207r', '201'),
('Math 201', 'F01172096', 'MATH 201 B', '18:47:31', '20:47:31', 310, '310r', '201'),
('MATH 205', 'F01192137', 'MATH 205 A', '14:52:11', '17:52:11', 212, '212r', '201');

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
  `s_photo` varchar(200) DEFAULT NULL,
  `Registered` varchar(100) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_tag`, `s_name`, `s_email`, `s_password`, `s_department`, `s_batch`, `s_phone`, `s_photo`, `Registered`) VALUES
(11162009, 'B8ED5C19', 'Arafat Hossain Kishor', 'ahkishor93.ahk@gmail.com', '1234', 'CSE', 162, 1635662133, NULL, 'NO'),
(11163071, 'B7ED4C19', 'ALI IKTIDER SAYAM', 'asayam163071@bscse.uiu.ac.bd', '1234', 'CSE', 163, 1721716139, NULL, 'NO'),
(11163075, 'B7ED4C29', 'Kazi Muhibul Alam', 'anik06081995@gmail.com', '1234', 'CSE', 163, 1756013171, NULL, 'NO'),
(11163078, '0EEF4A12', 'Fatema Binte Iqbal', 'fiqbal163078@bscse.uiu.ac.bd', '1234', 'CSE', 163, 1831461981, NULL, 'NO'),
(11171327, 'BB09101C', 'FARZANA SULTANA SOHA', 'fsulatana@gmail.com', '1234', 'CSE', 171, 1777660829, NULL, 'NO'),
(11172070, '0EEF3A1A', 'MD. AKIB AL JAWAD ARNOB', 'akibaljawadarnob@gmail.com', '1234', 'CSE', 172, 1521418857, NULL, 'NO'),
(11172085, 'D7FG7C38', 'taskia taher', 'toyshi172085@bscse.uiu.ac.bd', '1234', 'CSE', 172, 1710203047, NULL, 'NO');

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
(11163071, 'CSI 415'),
(11172070, 'CSI 411'),
(11172070, 'CSI 341'),
(11172070, 'CSI 342'),
(11171327, 'CSI 423'),
(11171327, 'CSI 424'),
(11171327, 'CSE 465');

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
(11172070, 'MATH 205', 'MATH 205 A'),
(11172070, 'CSI 341', 'CSI 341 B'),
(11172070, 'CSI 342', 'CSI 342 B'),
(11172070, 'CSI 411', 'CSI 411 B'),
(11171327, 'CSE 465', 'CSE 465 A'),
(11171327, 'CSI 423', 'CSI 423 B'),
(11171327, 'CSI 424', 'CSI 424 B');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(100) NOT NULL,
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
('F01172096', '9AF92F16', 'Imam hossain', 'imam@cse.uiu.ac.bd', '1234', 'CSE', 1922181860, NULL),
('F01192137', '97C9567B', 'Mirajul Islam', 'miraj@cse.uiu.ac.bd', '1234', 'CSE', 1756013171, NULL),
('F01192138', '09EACE7E', 'Dr. Suman Ahmmed', 'suman@cse.uiu.ac.bd', '1234', 'CSE', 1765049901, 'res/userProfile/suman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacherjcourse`
--

CREATE TABLE `teacherjcourse` (
  `t_id` varchar(100) NOT NULL,
  `c_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherjcourse`
--

INSERT INTO `teacherjcourse` (`t_id`, `c_code`) VALUES
('F01172096', 'CSI 321'),
('F01172096', 'CSI-233'),
('F01172096', 'CSI 322'),
('F01192137', 'CSI 415'),
('F01192137', 'CSI 416'),
('F01172096', 'Math 201'),
('F01192137', 'MATH 003'),
('F01192137', 'MATH 205');

-- --------------------------------------------------------

--
-- Table structure for table `temp_transaction`
--

CREATE TABLE `temp_transaction` (
  `id` int(100) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_unit_price` int(100) NOT NULL,
  `available_qty` int(50) NOT NULL,
  `sale_qty` int(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_transaction`
--

INSERT INTO `temp_transaction` (`id`, `vendor_id`, `item_id`, `item_name`, `item_unit_price`, `available_qty`, `sale_qty`, `token`) VALUES
(422, 1, 17, 'Dal', 15, 49, 4, 'f54ed14c9575bb95951697fb574af2');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tr_id` varchar(100) NOT NULL,
  `r_tag` varchar(100) NOT NULL,
  `tr_amount` int(100) NOT NULL,
  `tr_type` varchar(100) NOT NULL,
  `vendor_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tr_id`, `r_tag`, `tr_amount`, `tr_type`, `vendor_id`) VALUES
('0ae056d0e8d006453307a4d0f45852', 'b7ed4c19', 63, 'payment', 1),
('1b2aac7a9dda9df178029f41b40490', '09eace7e', 150, 'payment', 1),
('1c7c51f3354bb3ee2769f47dbbab6d', 'b7ed4c19', 350, 'payment', 1),
('248e52a3ef7feb6a4f5711b7eb80c3', 'b7ed4c19', 350, 'payment', 1),
('2ed94673a11b8ac2f3744eebb67ac1', 'b7ed4c19', 170, 'payment', 1),
('53866db03f28d18b8887b17bb8b417', '09eace7e', 100, 'payment', 1),
('6107a78846fd7a91c7bab6f9c50bcf', 'b7ed4c19', 850, 'payment', 1),
('ad7d8a8b08926a6bf3f12e85b5d849', '09eace7e', 600, 'payment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_reader` varchar(100) CHARACTER SET latin1 NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_uid` varchar(50) NOT NULL,
  `vendor_password` varchar(100) NOT NULL,
  `vendor_email` varchar(100) NOT NULL,
  `vendor_phone` varchar(100) NOT NULL,
  `vendor_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`v_reader`, `vendor_id`, `vendor_name`, `vendor_uid`, `vendor_password`, `vendor_email`, `vendor_phone`, `vendor_photo`) VALUES
('B8ED5C10', 1, 'Khans kitchen', 'khk01', 'khan123', 'khan@gmail.com', '02-222222', 'res/userProfile/khan.png'),
('B8ED5C14', 2, 'Vikrampur', 'vik02', 'vik123', 'vikram@gmail.com', '02-333333', 'res/userProfile/vikram.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `w_balance` float(100,4) NOT NULL,
  `r_tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`w_balance`, `r_tag`) VALUES
(103553.0000, 'B8ED5C10'),
(60000.0000, 'B8ED5C14'),
(200.0000, '0EEF3A1A'),
(177.0000, 'B7ED4C19'),
(40.0000, '09EACE7E');

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
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `payment_state`
--
ALTER TABLE `payment_state`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `vendor_id` (`vendor_id`);

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
-- Indexes for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `r_tag` (`v_reader`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD KEY `r_tag` (`r_tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_list`
--
ALTER TABLE `item_list`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_state`
--
ALTER TABLE `payment_state`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11172086;

--
-- AUTO_INCREMENT for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Attendance_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `Attendance_ibfk_3` FOREIGN KEY (`sec_name`) REFERENCES `section` (`sec_name`),
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `item_list_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `payment_state`
--
ALTER TABLE `payment_state`
  ADD CONSTRAINT `payment_state_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

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
  ADD CONSTRAINT `teacherJcourse_ibfk_2` FOREIGN KEY (`c_code`) REFERENCES `course` (`c_code`),
  ADD CONSTRAINT `teacherjcourse_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `temp_transaction`
--
ALTER TABLE `temp_transaction`
  ADD CONSTRAINT `temp_transaction_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `temp_transaction_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`item_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`v_reader`) REFERENCES `rfid` (`r_tag`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `Wallet_ibfk_1` FOREIGN KEY (`r_tag`) REFERENCES `rfid` (`r_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
