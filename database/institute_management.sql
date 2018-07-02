-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 05:01 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `created_at`) VALUES
(13, 'java', '2021-06-17 18:30:00'),
(16, 'android', '2021-06-17 18:30:00'),
(18, 'HTML', '2023-06-17 18:30:00'),
(19, '.NET', '2025-06-17 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `matearial`
--

CREATE TABLE `matearial` (
  `id` int(22) NOT NULL,
  `matearial_name` varchar(244) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matearial`
--

INSERT INTO `matearial` (`id`, `matearial_name`, `created_at`) VALUES
(1, 'w3school.com', '2024-06-17 18:30:00'),
(2, 'javatpoint.com', '2025-06-17 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Student_Name` varchar(100) NOT NULL,
  `Student_Email` varchar(100) NOT NULL,
  `Student_Course` varchar(100) NOT NULL,
  `Student_Mobile` varchar(100) NOT NULL,
  `Student_Gender` varchar(100) NOT NULL,
  `Student_Birthday` varchar(100) NOT NULL,
  `Student_Address` text NOT NULL,
  `Student_Image` varchar(255) NOT NULL,
  `Fees_Status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Student_Name`, `Student_Email`, `Student_Course`, `Student_Mobile`, `Student_Gender`, `Student_Birthday`, `Student_Address`, `Student_Image`, `Fees_Status`) VALUES
(1, 'Vivek chourasiya', 'vivek.et1993@gmail.com', '1', '9148725074', 'male', '06/27/2018', 'dddd', '', ''),
(2, 'Vivek chourasiya', 'vivek.et1993@gmail.com', '1', '9148725074', 'Female', '06/12/2018', '123456', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Teacher_id` int(22) NOT NULL,
  `Teacher_Name` varchar(155) NOT NULL,
  `Teacher_Email` varchar(155) NOT NULL,
  `Teacher_Password` varchar(155) NOT NULL,
  `Teacher_Mobile` varchar(155) NOT NULL,
  `Teacher_Experience` int(19) NOT NULL,
  `Teacher_Qualification` varchar(255) NOT NULL,
  `Teacher_Course` varchar(25) NOT NULL,
  `Teacher_Certification` varchar(255) NOT NULL,
  `Teacher_Gender` varchar(255) NOT NULL,
  `Teacher_Birthday` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Teacher_id`, `Teacher_Name`, `Teacher_Email`, `Teacher_Password`, `Teacher_Mobile`, `Teacher_Experience`, `Teacher_Qualification`, `Teacher_Course`, `Teacher_Certification`, `Teacher_Gender`, `Teacher_Birthday`) VALUES
(1, 'Vivek chourasiya', 'vivek.et1993@gmail.com', '123456', '+919148725074', 3, 'b.e.', 'java', 'java', 'Male', '06/20/2018'),
(3, 'mayank', 'vivek.et1933@gmail.com', '1234563', '9148725074', 3, 'b.e.', '13', 'java', 'Female', '06/18/2018');

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
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `matearial`
--
ALTER TABLE `matearial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher_id`);

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `matearial`
--
ALTER TABLE `matearial`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `Teacher_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
