-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 07:24 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `account_balance_information`
--

CREATE TABLE `account_balance_information` (
  `id` int(111) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `balance` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_balance_information`
--

INSERT INTO `account_balance_information` (`id`, `school_id`, `customer_id`, `balance`) VALUES
(1, 1, 63, '-370'),
(2, 1, 70, '0'),
(3, 1, 71, '0'),
(4, 1, 72, '0'),
(5, 1, 73, '0');

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE `account_transaction` (
  `id` int(11) NOT NULL,
  `debit` varchar(100) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '0',
  `reference_type` varchar(20) NOT NULL,
  `reference_id` int(11) NOT NULL,
  `school_id` int(20) NOT NULL,
  `student_id` int(20) DEFAULT NULL,
  `invoice_id` int(20) DEFAULT NULL,
  `reciept_id` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`id`, `debit`, `credit`, `reference_type`, `reference_id`, `school_id`, `student_id`, `invoice_id`, `reciept_id`, `date`) VALUES
(80, '1500', 0, 'invoice', 87, 1, NULL, NULL, NULL, '2018-07-28 12:03:35'),
(81, '1062', 0, 'invoice', 88, 1, NULL, NULL, NULL, '2018-07-28 13:47:06'),
(82, '1180', 0, 'invoice', 89, 1, NULL, NULL, NULL, '2018-07-28 14:18:03'),
(83, '472', 0, 'invoice', 90, 1, NULL, NULL, NULL, '2018-07-28 15:37:26'),
(84, '0', 500, 'reciept', 16, 1, NULL, NULL, NULL, '2018-07-28 17:13:14'),
(85, '1298', 0, 'invoice', 91, 1, NULL, NULL, NULL, '2018-07-29 12:13:15'),
(86, '2596', 0, 'invoice', 92, 1, NULL, NULL, NULL, '2018-07-29 12:15:35'),
(87, '0', 500, 'reciept', 17, 1, NULL, NULL, NULL, '2018-07-29 12:20:06'),
(88, '262', 0, '1', 93, 1, NULL, NULL, NULL, '2018-07-30 15:29:42'),
(89, '0', 500, '2', 18, 1, NULL, NULL, NULL, '2018-08-01 16:34:36'),
(90, '0', 1000, '2', 19, 1, NULL, NULL, NULL, '2018-10-06 16:52:58'),
(91, '0', 1000, '2', 20, 1, NULL, NULL, NULL, '2018-08-06 17:03:37'),
(92, '708', 0, '1', 94, 1, NULL, NULL, NULL, '2018-08-06 17:53:04'),
(93, '45498', 0, '1', 95, 1, NULL, NULL, NULL, '2018-04-06 17:53:34'),
(94, '590', 0, '1', 96, 1, NULL, NULL, NULL, '2018-03-06 17:56:32'),
(95, '63075', 0, '1', 97, 1, NULL, NULL, NULL, '2018-02-06 17:58:08'),
(96, '354', 0, '1', 98, 1, NULL, NULL, NULL, '2018-08-06 18:42:56'),
(97, '0', 1000, '2', 21, 1, NULL, NULL, NULL, '2018-08-07 17:54:55'),
(98, '55278', 0, '1', 99, 1, NULL, NULL, NULL, '2018-08-10 18:54:08'),
(99, '0', 30000, '2', 22, 1, NULL, NULL, NULL, '2018-08-10 18:55:01'),
(100, '7799', 0, '1', 100, 1, NULL, NULL, NULL, '2018-08-16 17:44:22'),
(101, '590', 0, '1', 101, 1, NULL, NULL, NULL, '2018-08-16 17:50:33'),
(102, '4130', 0, '1', 102, 1, 17, 1371, NULL, '2018-08-27 14:30:34'),
(103, '0', 500, '2', 23, 1, 17, NULL, '81364', '2018-08-27 14:51:10'),
(104, '0', 500, '2', 24, 1, 17, NULL, '81365', '2018-08-27 14:51:10'),
(105, '0', 493, '2', 25, 1, 17, NULL, '81366', '2018-08-27 15:20:50'),
(112, '0', 300, '2', 32, 1, 18, NULL, '81373', '2018-08-28 11:51:35'),
(113, '3540', 0, '1', 103, 1, 68, 1372, NULL, '2018-08-28 11:52:23'),
(114, '0', 200, '2', 33, 1, 18, NULL, '81374', '2018-08-28 12:28:47'),
(115, '400', 0, '1', 104, 1, 18, 1373, NULL, '2018-09-04 13:41:17'),
(116, '300', 0, '1', 105, 1, NULL, 1374, NULL, '2018-09-04 13:52:43'),
(117, '3000', 0, '1', 106, 1, NULL, 1375, NULL, '2018-09-04 17:52:16'),
(118, '300', 0, '1', 107, 1, NULL, 1376, NULL, '2018-09-04 18:04:53'),
(119, '300', 0, '1', 108, 1, NULL, 1377, NULL, '2018-09-04 18:36:01'),
(120, '300', 0, '1', 109, 1, NULL, 1378, NULL, '2018-09-04 18:36:18'),
(121, '130', 0, '1', 110, 1, 63, 1379, NULL, '2018-09-04 18:43:23'),
(122, '100', 0, '1', 111, 1, 63, 1380, NULL, '2018-09-04 18:54:11'),
(123, '0', 200, '2', 34, 1, 63, NULL, '81375', '2018-09-05 11:28:12'),
(124, '0', 200, '2', 35, 1, 63, NULL, '81376', '2018-09-05 11:33:07'),
(125, '0', 200, '2', 36, 1, 63, NULL, '81377', '2018-09-05 11:38:10'),
(126, '0', 200, '2', 37, 1, 63, NULL, '81378', '2018-09-05 11:40:10'),
(127, '0', 200, '2', 38, 1, 63, NULL, '81379', '2018-09-05 11:41:45'),
(128, '0', 200, '2', 39, 1, 63, NULL, '81380', '2018-09-05 11:42:40'),
(129, '2000', 0, '1', 112, 1, 63, 1381, NULL, '2018-09-05 11:44:26'),
(130, '0', 400, '2', 40, 1, 63, NULL, '81381', '2018-09-05 11:45:12'),
(131, '200', 0, '1', 113, 1, 55, 1382, NULL, '2018-09-06 17:07:26'),
(132, '206', 0, '1', 114, 1, 55, 1383, NULL, '2018-09-06 17:10:23'),
(133, '0', 200, '2', 41, 1, 63, NULL, '81382', '2018-09-11 16:14:19'),
(134, '0', 200, '2', 42, 1, 63, NULL, '81383', '2018-09-11 16:15:39'),
(135, '0', 200, '2', 43, 1, 63, NULL, '81384', '2018-09-11 16:26:12'),
(136, '0', 300, '2', 44, 1, 63, NULL, '81385', '2018-09-11 16:26:59'),
(137, '0', 500, '2', 45, 1, 63, NULL, '81386', '2018-09-11 16:28:21'),
(138, '0', 500, '2', 46, 1, 63, NULL, '81387', '2018-09-11 16:28:41'),
(139, '0', 100, '2', 47, 1, 63, NULL, '81388', '2018-09-11 16:28:51'),
(140, '2', 0, '1', 115, 1, 29, 1384, NULL, '2018-09-15 12:16:45'),
(141, '1000', 0, '1', 116, 1, 63, 1385, NULL, '2018-09-19 14:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(20) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `type`) VALUES
(1, 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `class_id` int(20) NOT NULL,
  `school_id` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_record`
--

INSERT INTO `attendance_record` (`id`, `student_id`, `attendance_status`, `class_id`, `school_id`, `date`) VALUES
(46, 20, 'present', 0, 1, '2018-07-31'),
(47, 28, 'present', 3, 1, '2018-07-31'),
(49, 16, 'present', 0, 1, '2018-07-31'),
(50, 17, 'present', 0, 1, '2018-07-31'),
(51, 19, 'present', 0, 1, '2018-07-31'),
(53, 22, 'present', 0, 1, '2018-07-31'),
(54, 23, 'present', 0, 1, '2018-07-31'),
(55, 28, 'present', 0, 1, '2018-07-31'),
(57, 17, 'present', 2, 1, '2018-07-31'),
(58, 19, 'present', 2, 1, '2018-07-31'),
(60, 16, 'present', 2, 1, '2018-07-31'),
(61, 17, 'present', 2, 1, '2018-07-31'),
(63, 16, 'present', 2, 1, '2018-07-31'),
(64, 17, 'present', 2, 1, '2018-07-31'),
(65, 19, 'present', 2, 1, '2018-07-31'),
(66, 22, 'present', 2, 1, '2018-07-31'),
(74, 22, 'present', 2, 1, '2018-07-31'),
(75, 23, 'present', 2, 1, '2018-07-31'),
(76, 0, '3', 0, 1, '2018-07-31'),
(77, 20, 'present', 0, 1, '2018-07-31'),
(78, 28, 'present', 0, 1, '2018-07-31'),
(79, 0, '2', 2, 1, '2018-07-31'),
(80, 16, 'present', 2, 1, '2018-07-31'),
(81, 17, 'present', 2, 1, '2018-07-31'),
(82, 19, 'present', 2, 1, '2018-07-31'),
(83, 20, 'present', 3, 1, '2018-07-31'),
(84, 28, 'present', 3, 1, '2018-07-31'),
(85, 0, '3', 3, 1, '2018-07-31'),
(86, 16, 'present', 2, 1, '2018-08-02'),
(87, 17, 'present', 2, 1, '2018-08-02'),
(88, 19, 'present', 2, 1, '2018-08-02'),
(89, 22, 'present', 2, 1, '2018-08-02'),
(90, 18, 'present', 1, 1, '2018-08-02'),
(91, 16, 'present', 2, 1, '2018-08-02'),
(92, 17, 'present', 2, 1, '2018-08-02'),
(93, 19, 'present', 2, 1, '2018-08-02'),
(94, 16, 'present', 2, 1, '2018-08-02'),
(95, 17, 'present', 2, 1, '2018-08-02'),
(96, 19, 'present', 2, 1, '2018-08-02'),
(97, 22, 'present', 2, 1, '2018-08-02'),
(98, 20, 'present', 3, 1, '2018-08-16'),
(99, 28, 'present', 3, 1, '2018-08-16'),
(100, 32, 'present', 3, 1, '2018-08-16'),
(101, 31, 'present', 1, 1, '2018-08-16'),
(102, 32, 'present', 1, 1, '2018-08-16'),
(103, 34, 'present', 1, 1, '2018-08-16'),
(104, 35, 'present', 1, 1, '2018-08-16'),
(105, 53, 'present', 1, 1, '2018-08-16'),
(106, 16, 'present', 2, 1, '2018-08-16'),
(107, 17, 'present', 2, 1, '2018-08-16'),
(108, 28, 'present', 2, 1, '2018-08-16'),
(109, 29, 'present', 2, 1, '2018-08-16'),
(110, 16, 'present', 2, 1, '2018-08-16'),
(111, 16, 'present', 2, 1, '2018-08-16'),
(112, 17, 'present', 2, 1, '2018-08-16'),
(113, 19, 'present', 2, 1, '2018-08-16'),
(114, 20, 'present', 3, 1, '2018-09-04'),
(115, 29, 'present', 3, 1, '2018-09-04'),
(116, 32, 'present', 3, 1, '2018-09-04'),
(117, 31, 'present', 2, 1, '2019-03-22'),
(118, 32, 'present', 2, 1, '2019-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `auth_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `autorization_id` int(11) NOT NULL,
  `clear_text` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`auth_id`, `username`, `password`, `email`, `autorization_id`, `clear_text`, `user_id`, `school_id`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 1, '12345', 1, 1),
(2, 'emp1_2', '6fab6e3aa34248ec1e34a4aeedecddc8', 'r@gmail.com', 2, '3302', 2, NULL),
(25, 'stu1_23', '9d27da395bcbf666280ea4eeddfeaeed', 'vivek.et17993@gmail.com', 4, '98875', 23, NULL),
(24, 'stu1_22', 'f31c62b1be87ee00a16b9e51482263a7', 'umesh132200@gmail.com', 4, '23355', 22, NULL),
(5, 'emp1_3', '504b7f668328dab60570f03ecfe47918', 'vive3@gmail.com', 2, '7088', 3, NULL),
(23, 'stu1_21', '9cae15bbdd73dc7a84ee786318022fc8', 'vivek.et1993@gmail.com', 4, '26454', 21, NULL),
(7, 'par1_1', '5123c90e9e1f7b6d64fd6fdc1334efa1', 'nani.param@gmail.com', 3, '76709', 1, NULL),
(8, 'emp1_4', 'd156d4836ea87dd732cfda175b7911cb', 'umesh132200@gmail.com', 2, '5771', 4, NULL),
(9, 'stu1_9', '7a1ccfe60223a5bda015a388f354cf62', 'k@gmail.com', 4, '14728', 9, NULL),
(22, 'stu1_20', '01e9565cecc4e989123f9620c1d09c09', 'e@gmail.com', 4, '1329', 20, NULL),
(21, 'stu1_19', '30cbb4402fb4c81e404decec3f00d0eb', 'm@gmail.com', 4, '71219', 19, NULL),
(20, 'emp1_5', '00430c0c1fae276c9713ab5f21167882', 'vivek.et1993@gmail.com', 1, '8206', 5, 1),
(19, 'stu1_18', '202cb962ac59075b964b07152d234b70', 'aman@gmail.com', 4, '123', 18, NULL),
(15, 'stu1_15', 'd33fc35db631eeed13cf6dcaf3096b74', 'tarun@gmail.com', 4, '34147', 15, NULL),
(16, 'stu1_16', 'b6b48639e4627ac7813f3501da8e4465', 'shu@gmail.com', 4, '13995', 16, NULL),
(17, 'stu1_17', 'a0f83f9e724cc8d4cfdb28a71807fd84', 'vivek.et1993@gmail.com', 4, '90776', 17, NULL),
(18, 'par1_2', '77c13bef784f87619c396282057de79a', 'vivek.eht1993@gmail.com', 3, '28935', 2, NULL),
(27, 'stu1_25', 'fd1f577e0cc2dd02e6ad6107fcd19cef', 'umesh132200@gmail.com', 4, '34487', 25, NULL),
(28, 'stu1_26', '1b4ea86404d0b479c4a73e55dfd8b0b7', 'umesh132200@gmail.com', 4, '44816', 26, NULL),
(29, 'stu1_27', 'ed5eecb2dcefeff8d100bfc1a5ea644b', 'umesh132200@gmail.com', 4, '86040', 27, NULL),
(30, 'stu1_28', '4dd9cec1c21bc54eecb53786a2c5fa09', 'umesh132200@gmail.com', 4, '2402', 28, NULL),
(31, 'second', '827ccb0eea8a706c4c34a16891f84e7b', 'v@gmail.com', 1, '12345', 4, NULL),
(32, 'vicky', '827ccb0eea8a706c4c34a16891f84e7b', 'vivek.et1993@gamil.com', 1, '12345', 6, NULL),
(33, 'stu1_29', 'e73fecc08ee9b0e1a876614ec3178bac', 'slkjaihaileds@gmail.com', 4, '3790', 29, NULL),
(34, 'stu1_30', 'dce42ddbb835f6defc4622399137ef5d', 'a@gmail.com', 4, '60209', 30, NULL),
(35, 'stu1_31', '849b7cc98e1bc3031623a73645b5dcd8', 'slkjaihaileds@gmail.com', 4, '36643', 31, NULL),
(36, 'stu1_32', '8aee38c5cfd6cbd0cdafeacdf058dcf4', 'slkjaihailveds@gmail.com', 4, '68133', 32, NULL),
(37, 'stu1_33', 'c05aaffc668eaa784dbbc2b10db0483c', 'c@gmail.com', 4, '18634', 33, NULL),
(38, 'stu1_34', '1fc8c3d03b0021478a8c9ebdcd457c67', 'slkjaihaileds@gmail.com', 4, '11670', 34, NULL),
(49, 'stu1_45', 'ab333010c097f1df104c8be412774dc1', 'vivek.et1993@gmail.com', 4, '51258', 45, NULL),
(48, 'stu1_44', 'd3e06fa23d0ca5269d235956dadac707', 'vivek.et1993@gmail.com', 4, '92669', 44, NULL),
(47, 'stu1_43', '35285aa740b37f0b1933da97bf4ca4b9', 'vivek.et1993@gmail.com', 4, '8197', 43, NULL),
(46, 'stu1_42', 'a74d5b21876a8f1e33c564988d564936', 'vivek.et1993@gmail.com', 4, '81719', 42, NULL),
(45, 'stu1_41', '2fead7741ca97f623c68f07fb4bc3809', 'vivek.et1993@gmail.com', 4, '34629', 41, NULL),
(50, 'stu1_46', 'dc87952476310d1476e5d488f423ada2', 'vivek.et1993@gmail.com', 4, '46826', 46, NULL),
(51, 'stu1_47', 'c765599d6ce1e70cd26026412f68ed7c', 'vivek.et1993@gmail.com', 4, '55294', 47, NULL),
(52, 'stu1_48', '570a3edebe799af957e3b4c3925c21a1', 'vivek.et1993@gmail.com', 4, '70602', 48, NULL),
(53, 'stu1_49', '76383b34503afb0508f8364787c55800', 'vivek.et1993@gmail.com', 4, '6898', 49, NULL),
(54, 'stu1_50', '74306eef5860833e2e47ff169a73b45b', 'vivek.et1993@gmail.com', 4, '3998', 50, NULL),
(55, 'stu1_51', '7b84679a6ae864115de56d33caf5728c', 'vivek.et1993@gmail.com', 4, '53052', 51, NULL),
(56, 'emp1_7', '82f5e54d8e425cf93af25e86b4be04f8', 'vivek.et1993@gmail.com', 2, '8585', 7, NULL),
(57, 'stu1_52', 'ce481d4ad6443675ca3407d15013c767', 'vivek.et1993@gmail.com', 4, '99207', 52, NULL),
(58, 'stu1_53', 'c40df15b5da1af4f7e5e658b00d4c627', 'vivek.et1993@gmail.com', 4, '37169', 53, NULL),
(59, 'stu1_54', '263138a8b987787df892aaafe081a2d6', 'vivek.et1993@gmail.com', 4, '11309', 54, NULL),
(60, 'stu1_55', 'c45b876541ee45037b6ba8c7af1608ac', 'vivek.et1993@gmail.com', 4, '28632', 55, NULL),
(61, 'stu1_56', '9c4a06e4dddceb70722de4f3fda4f2c7', '', 4, '90005', 56, NULL),
(62, 'stu1_57', '53a339b9dfc19bbbc0bcc6635e7d79ff', 'vivek.et1993@gmail.com', 4, '91477', 57, NULL),
(63, 'stu1_58', '80d65ffd8012adb804f546f171fd635f', 'vivek.et1993@gmail.com', 4, '72659', 58, NULL),
(64, 'stu1_59', 'f9347d86498a6073bb60abcf63aaa82d', 'vivek.et1993@gmail.com', 4, '49351', 59, NULL),
(65, 'stu1_60', '42e7aaa88b48137a16a1acd04ed91125', 'vivek.et1993@gmail.com', 4, '415', 60, NULL),
(66, '12345', 'cf9819df265db90772d487d5b2cd3cf4', 'vivek.et1993@gmail.com', 4, '5386', 61, NULL),
(67, 'a@123', 'd41d8cd98f00b204e9800998ecf8427e', 'vivek.et1993@gmail.com', 4, '', 62, NULL),
(68, 'emp1_8', '6abcc8f24321d1eb8c95855eab78ee95', 'vivek.et1993@gmail.com', 2, '4101', 8, NULL),
(69, 'emp1_9', 'ff2cc3b8c7caeaa068f2abbc234583f5', 'vivek.et1993@gmail.com', 2, '2715', 9, NULL),
(70, 'emp1_10', '49265d2447bc3bbfe9e76306ce40a31f', 'vivek.et1993@gmail.com', 2, '5389', 10, NULL),
(71, 'emp1_11', '657b96f0592803e25a4f07166fff289a', 'vivek.et1993@gmail.com', 2, '8979', 11, NULL),
(72, 'emp1_12', '9529fbba677729d3206b3b9073d1e9ca', 'vivek.et1993@gmail.com', 2, '4056', 12, NULL),
(73, 'emp1_13', '3988c7f88ebcb58c6ce932b957b6f332', 'vivek.et1993@gmail.com', 2, '137', 13, NULL),
(75, 'stu1_64', '7057cb47f57689b4a7b86f570d2cec6f', 'vivek.et1993@gmail.com', 4, '52652', 64, NULL),
(76, 'emp1_14', '353de26971b93af88da102641069b440', 'vivek.et1993@gmail.com', 2, '2837', 14, NULL),
(77, 'stu1_65', '4e4e70d504b4c0006c8287dedc99d0fc', 'vivek.et1993@gmail.com', 4, '41269', 65, NULL),
(78, 'stu1_66', 'c9d150fc2f559ece872d42d7a4b71454', 'vivek.et1993@gmail.com', 4, '79744', 66, NULL),
(83, 'adm4_19', '64dcf3c521a00dbb4d2a10a27a95a9d8', 'vivek.et1993@gmail.com', 1, '6503', 19, NULL),
(87, 'adm2_20', 'a3bf6e4db673b6449c2f7d13ee6ec9c0', 'vivek.et1993@gmail.com', 1, '5889', 20, NULL),
(81, 'adm2_17', 'a0ba2648acd23dc7a5829968ce531a7d', 'vivek.et1993@gmail.com', 1, '3029', 17, NULL),
(84, 'stu4_67', '6c8cbece8eaf044a4c89ab7888b31ce7', 'vivek.et1993@gmail.com', 4, '82681', 67, NULL),
(85, 'stu1_68', '8b42d3eeb4da1f29ee08dedd7855a0ed', 'vivek.et1993@gmail.com', 4, '29822', 68, NULL),
(86, 'stu1_69', '2c8ed8587468aec2462a3914f154e570', 'vivek.et1993@gmail.com', 4, '5726', 69, NULL),
(88, 'adm3_21', '32b8923dc22023d09a67564a1d45d210', 'vivek.et1993@gmail.com', 1, '8931', 21, NULL),
(89, 'emp4_22', '05a5cf06982ba7892ed2a6d38fe832d6', 'vivek.et1993@gmail.com', 1, '2021', 22, NULL),
(90, 'emp4_23', '8303a79b1e19a194f1875981be5bdb6f', 'vivek.et1993@gmail.com', 2, '1691', 23, NULL),
(91, 'emp1_24', 'c42f76f3b235e177ed57983b6721d0f3', 'vivek.et1993@gmail.com', 2, '9769', 24, NULL),
(92, 'emp1_25', '729c68884bd359ade15d5f163166738a', 'vivek.et1993@gmail.com', 2, '1484', 25, NULL),
(93, 'emp1_26', '7d411dca7348327b71e894c52e76eeeb', 'vivek.et1993@gmail.com', 2, '4507', 26, NULL),
(94, 'emp1_27', 'a3147b88259a8e5745ebd59394aee83e', 'vivek.et1993@gmail.com', 2, '4076', 27, NULL),
(95, 'super', '827ccb0eea8a706c4c34a16891f84e7b', '9yug@gmail.com', 5, '12345', 55, NULL),
(96, 'par1_3', '9a4b7ea4b1315a01af0d2f928d5a7caa', 'vivek.et1993@gmail.com', 3, '70860', 3, NULL),
(97, 'par1_4', 'b62973ddb1a4d7a0ea30a1052012af19', 'vivek.et1993@gmail.com', 3, '12200', 4, NULL),
(98, 'par1_5', '6167f21d5e4b6d921d66cabc17f33529', 'vivek.et1993@gmail.com', 3, '74141', 5, NULL),
(99, 'stu1_70', '23035635a1f09e69866ec156ecfa2847', 'vivek.et1993@gmail.com', 4, '38808', 70, NULL),
(100, 'stu1_71', 'e736598ba2c84d7313c8614de041cae3', 'vivek.et1993@gmail.com', 4, '40879', 71, NULL),
(101, 'stu1_72', '4b56f7c0493648c3c0870c4e3edabd3a', 'vivek.et1993@gmail.com', 4, '46903', 72, NULL),
(102, 'emp1_28', '86df7dcfd896fcaf2674f757a2463eba', 'vivek.et1993@gmail.com', 2, '1486', 28, NULL),
(103, 'emp1_29', '66fae5b05c0f64c4d2bdcdf1ad85f7b2', 'vivek.et1993@gmail.com', 2, '5346', 29, NULL),
(104, 'stu1_73', 'e769e03a9d329b2e864b4bf4ff54ff39', 'rahul@gmail.com', 4, '5953', 73, 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(7) NOT NULL,
  `course_id` int(4) NOT NULL,
  `batch_name` varchar(40) NOT NULL,
  `school_id` int(5) NOT NULL,
  `start_date` varchar(60) DEFAULT NULL,
  `end_date` varchar(60) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `book_no` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(40) NOT NULL,
  `isbn_no` int(30) NOT NULL,
  `edition` varchar(20) NOT NULL,
  `book_category` varchar(10) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `copy` varchar(8) NOT NULL,
  `shelf_no` varchar(10) NOT NULL,
  `book_position` varchar(9) NOT NULL,
  `book_cost` varchar(10) NOT NULL,
  `langauge` varchar(10) NOT NULL,
  `book_condition` varchar(10) NOT NULL,
  `status` varchar(15) DEFAULT '1' COMMENT '1=avilable,2=issue,3=not avilable',
  `school_id` varchar(3) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_no`, `title`, `author`, `isbn_no`, `edition`, `book_category`, `publisher`, `copy`, `shelf_no`, `book_position`, `book_cost`, `langauge`, `book_condition`, `status`, `school_id`, `created_at`) VALUES
(1, '432', 'ewrwerw', 'erwer', 0, 'rewe', '1', 'werwe', '', '234', '3', '32', '23', '2', '1', '1', '2019-03-25 07:38:41'),
(2, '4', 'thermodynamics', 'kk raj', 0, '3', '1', '2', '3', '3', '2', '300', 'english', '2', '1', '1', '2019-03-26 06:35:59'),
(3, '3234234', 'maths', 'charobraty', 0, '3rd', '1', 'ert', '5', '3', '2', '400', 'hindi', '4', '1', '1', '2019-03-27 06:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `books_category`
--

CREATE TABLE `books_category` (
  `id` int(10) NOT NULL,
  `school_id` varchar(5) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_category`
--

INSERT INTO `books_category` (`id`, `school_id`, `category_name`, `created_at`) VALUES
(1, '1', 'civil', '2019-03-25 07:09:30'),
(2, '1', 'electronic', '2019-03-25 07:10:19'),
(3, '1', 'novel', '2019-03-27 06:41:30'),
(4, '1', 'maths', '2019-03-27 06:41:46'),
(5, '1', '', '2019-03-27 07:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(10) NOT NULL,
  `book_id` int(10) DEFAULT NULL,
  `user_type` int(10) DEFAULT NULL,
  `taker_id` int(10) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `issue_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `returning_date` datetime DEFAULT NULL,
  `school_id` int(5) DEFAULT NULL,
  `staff_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `book_id`, `user_type`, `taker_id`, `status`, `issue_date`, `due_date`, `returning_date`, `school_id`, `staff_id`) VALUES
(1, 1, 2, 16, 'issued', '2019-03-05 00:00:00', '2019-03-27 00:00:00', NULL, 1, 2),
(2, 2, 2, 16, 'return', '2019-03-26 07:19:42', '2019-03-26 07:19:42', NULL, 1, NULL),
(3, 2, 1, 1, 'issued', '2019-03-26 12:03:32', '2019-03-26 12:03:32', NULL, 1, NULL),
(4, 3, 1, 1, 'return', '2019-03-27 06:43:10', '2019-03-27 06:43:10', '2019-03-27 06:59:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boucher`
--

CREATE TABLE `boucher` (
  `id` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `boucher_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='classes details';

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `description`, `start_time`, `end_time`) VALUES
(1, '9', 'dfsfsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '10th', 'fsds', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '12th', 'das', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '12', 'sdfsdfsd', NULL, NULL),
(8, 'bank', 'tyt', NULL, NULL),
(9, '8', 'dsfsd', NULL, NULL),
(10, '11th', 'based on mathematics', NULL, NULL),
(11, '10', 'dnweod dieq', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configuration_email`
--

CREATE TABLE `configuration_email` (
  `id` int(25) NOT NULL,
  `protocol` varchar(50) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_port` varchar(100) NOT NULL,
  `smtp_user` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `school_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration_email`
--

INSERT INTO `configuration_email` (`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_password`, `school_id`) VALUES
(1, 'smtp', 'mail.9yug.net', '25', 'test@9yug.net', 'test5432@1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration_sms`
--

CREATE TABLE `configuration_sms` (
  `id` int(255) NOT NULL,
  `auth_key` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `school_id` int(40) NOT NULL,
  `route` varchar(50) NOT NULL,
  `sender_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration_sms`
--

INSERT INTO `configuration_sms` (`id`, `auth_key`, `url`, `school_id`, `route`, `sender_id`) VALUES
(1, '3832AsCceYITm5346e8ad', 'http://sms.9yug.net/sendhttp.php', 1, 'default', 'navyug');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `description` text,
  `school_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `description`, `school_id`, `created_at`) VALUES
(1, 'btech', 'engineeering', 1, '2019-03-27 17:14:06'),
(2, '10th class', 'cbse', 1, '2019-03-27 18:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `credit_node`
--

CREATE TABLE `credit_node` (
  `id` int(20) NOT NULL,
  `date` datetime NOT NULL,
  `node_no` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `permanent_address` text NOT NULL,
  `temporary_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `qualification`, `email`, `mobile`, `profile_image`, `permanent_address`, `temporary_address`, `created_at`, `modified_at`) VALUES
(1, 'rohit sharma', 'be', 'admin@gmail.com', '2131232131', 'model2.png', 'sdfsd', 'fsdfs', '2018-07-20 18:30:00', '2018-07-20 18:30:00'),
(2, 'rakesh', 'be', 'r@gmail.com', '7979797980', 'controller13.png', 'fsdfds', 'fsdfds', '2021-07-18 04:37:00', '2021-07-18 04:37:00'),
(3, 'ramu', 'be', 'vive3@gmail.com', '7979797980', 'view1.png', 'fdgdfg', 'fdgdfg', '2021-07-17 22:37:00', '2021-07-17 22:37:00'),
(4, 'vivek', 'be', 'umesh132200@gmail.com', '7979797980', 'view2.png', 'iyty', 'iyty', '2021-07-18 00:37:00', '2021-07-18 00:37:00'),
(5, 'fsdf', 'fsdf', 'vivek.et1993@gmail.com', 'd546456', 'http://xschool.9yug.net/uploads/Capture.PNG', 'yty', 'yty', '2030-07-18 01:37:00', '2030-07-18 01:37:00'),
(7, 'rahul verma', 'be', 'vivek.et1993@gmail.com', '9148725074', '', 'rrtret', 'rrtret', '2009-08-18 05:38:00', '2009-08-18 05:38:00'),
(8, 'mr verma', 'be', 'vivek.et1993@gmail.com', '9148725074', 'Jellyfish3.jpg', 'fsdfsdf', 'fsdfsdf', '2018-08-10 12:06:15', '2018-08-10 12:06:15'),
(9, 'akash gupta', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Hydrangeas1.jpg', 'fdsdfs', 'fdsdfs', '2018-08-10 12:13:24', '2018-08-10 12:13:24'),
(10, 'virat', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Desert3.jpg', 'fwefwef', 'fwefwef', '2018-08-10 12:16:27', '2018-08-10 12:16:27'),
(11, 'virat', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Desert4.jpg', 'fwefwef', 'fwefwef', '2018-08-10 12:18:32', '2018-08-10 12:18:32'),
(12, 'virat', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Desert5.jpg', 'fwefwef', 'fwefwef', '2018-08-10 12:19:18', '2018-08-10 12:19:18'),
(13, 'virat', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Desert6.jpg', 'fwefwef', 'fwefwef', '2018-08-10 12:19:28', '2018-08-10 12:19:28'),
(14, 'kapil', 'b.e.', 'vivek.et1993@gmail.com', '9148725074', 'krishna.jpg', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '2018-08-10 16:51:27', '2018-08-10 16:51:27'),
(18, 'vivek chourasiya', '', 'vivek.et1993@gmail.com', '7828161459', 'Chrysanthemum1.jpg', 'durg', 'durg', '2018-08-16 06:40:22', '2018-08-16 06:40:22'),
(19, 'vivek chourasiya', '', 'vivek.et1993@gmail.com', '7828161459', 'Chrysanthemum2.jpg', 'durg', 'durg', '2018-08-16 06:41:22', '2018-08-16 06:41:22'),
(20, 'manish sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'Jellyfish1.jpg', 'rwewe', 'rwewe', '2018-08-20 09:05:03', '2018-08-20 09:05:03'),
(21, 'kailash ', '', 'vivek.et1993@gmail.com', '9148725074', 'Chrysanthemum1.jpg', 'fdgfdg', 'fdgfdg', '2018-08-20 09:10:34', '2018-08-20 09:10:34'),
(22, 'praveen', 'be', 'vivek.et1993@gmail.com', '9148725074', 'Tulips1.jpg', 'fdgdf', 'fdgdf', '2018-08-20 11:28:54', '2018-08-20 11:28:54'),
(23, 'vikas', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Hydrangeas1.jpg', 'fsdf', 'fsdf', '2018-08-20 11:32:52', '2018-08-20 11:32:52'),
(24, 'karan', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Desert1.jpg', 'fsdfs', 'fsdfs', '2018-08-20 11:36:03', '2018-08-20 11:36:03'),
(25, 'vishnu', 'bca', 'vivek.et1993@gmail.com', '7828161459', 'Jellyfish2.jpg', 'sfdfds', 'sfdfds', '2018-08-20 11:38:48', '2018-08-20 11:38:48'),
(26, 'naman', 'be', 'vivek.et1993@gmail.com', '7828161459', 'Jellyfish3.jpg', 'fdsfsd', 'fdsfsd', '2018-08-20 11:53:18', '2018-08-20 11:53:18'),
(27, 'ritu', 'be', 'vivek.et1993@gmail.com', '9148725074', 'Tulips2.jpg', 'sdfsd', 'sdfsd', '2018-08-20 11:54:28', '2018-08-20 11:54:28'),
(28, 'rajesh', 'be', 'vivek.et1993@gmail.com', '7828161459', '', 'das', 'das', '2018-09-06 10:39:11', '2018-09-06 10:39:11'),
(29, 'rajesh', 'be', 'vivek.et1993@gmail.com', '7828161459', '', 'das', 'das', '2018-09-06 10:42:00', '2018-09-06 10:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(20) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'trainer');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `address` text,
  `comments` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `school_id` int(15) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `assign_to` int(11) NOT NULL DEFAULT '0',
  `status` enum('enable','disable') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `username`, `email`, `mobile`, `address`, `comments`, `location`, `type`, `school_id`, `remarks`, `assign_to`, `status`, `created_at`) VALUES
(1, 'Kirti Laxman Rao', '', 'slkjaihaileds@gmail.com', '8319337577', 'samta colony BMY Charoda', '', '21.205269760602324 / 81.24224935437019', '', 0, 'd', 0, 'enable', '2021-07-17 20:37:00'),
(2, 'dsfsedfeafesfs', '', 'umesh132200@gmail.com', '1212133333', 'fdgfdg', '', '', '', 0, 'fgdfg', 0, 'enable', '2021-07-17 22:37:00'),
(3, 'ffhg', '', 'umesh132200@gmail.com', '7979797980', 'uuyfu', '', '', '', 0, 'yuuiyf', 0, 'enable', '2021-07-17 22:37:00'),
(4, 'gfdg', '', 'umesh132200@gmail.com', '435345', 'gdfg', '', NULL, 'gfdgd', 1, 'fdg', 0, 'enable', '0000-00-00 00:00:00'),
(5, 'vivek', '', 'vivek.et1993@gmail.com', '9148725074', 'fdsfsdf', '', NULL, 'suggestion', 1, '44', 0, 'enable', '0000-00-00 00:00:00'),
(6, 'vivek', '', 'vivek.et1993@gmail.com', '9148725074', 'fdsfsdf', '', NULL, 'suggestion', 1, '44', 0, 'enable', '0000-00-00 00:00:00'),
(7, 'vivek', '', 'vivek.et1993@gmail.com', '9148725074', 'fdsfsdf', '', NULL, 'suggestion', 1, '44', 0, 'enable', '0000-00-00 00:00:00'),
(8, 'vivek chourasiya', '', 'vivek.et1993@gmail.com', '9148725074', 'gtregtreg', '', NULL, 'suggestion', 1, '55', 0, 'enable', '0000-00-00 00:00:00'),
(9, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(10, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(11, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(12, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(13, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(14, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(15, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(16, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(17, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(18, 'vivek sharma', '', 'vivek.et1993@gmail.com', '9148725074', 'dfss', '', NULL, 'suggestion', 1, 'fsdf', 0, 'enable', '0000-00-00 00:00:00'),
(19, 'vikas', '', 'vivek.et1993@gmail.com', '7828161459', 'fgdfg', '', NULL, 'gdfgd', 1, 'fgdfg', 0, 'enable', '0000-00-00 00:00:00'),
(20, 'raju', '', 'vivek.et1993@gmail.com', '7828161459', 'dfsdfsd', '', NULL, 'suggestion', 1, '423', 0, 'enable', '0000-00-00 00:00:00'),
(21, 'kajal', '', 'vivek.et1993@gmail.com', '9148725074', 'gdfgfdg', '', NULL, 'suggestion', 1, 'fgdg', 0, 'enable', '0000-00-00 00:00:00'),
(22, 'alfia', '', 'vivek.et1993@gmail.com', '8085556184', 'sadasd', '', NULL, 'suggestion', 1, 'asdsa', 0, 'enable', '0000-00-00 00:00:00'),
(23, 'gupta', '', 'vivek.et1993@gmail.com', '9148725074', 'fsdfsd', '', NULL, '2', NULL, 'null', 0, 'enable', '0000-00-00 00:00:00'),
(24, 'Vivek chourasiya', '', 'vivek.et1993@gmail.com', '9148725074', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '', NULL, '2', NULL, '12', 0, 'enable', '0000-00-00 00:00:00'),
(25, 'Vivek chourasiya', '', 'vivek.et1993@gmail.com', '9148725074', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '', NULL, '1', NULL, 'not open admin panel', 0, 'enable', '2018-08-22 06:01:10'),
(30, 'Vivek chourasiya', 'stu1_18', 'vivek.et1993@gmail.com', '9148725074', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '', NULL, '1', NULL, '86', 1, 'enable', '2018-08-22 08:38:50'),
(31, 'Vivek chourasiya', 'stu_17', 'vivek.et1993@gmail.com', '9148725074', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '', NULL, '1', NULL, '12', 1, 'enable', '2018-08-22 11:44:57'),
(32, 'vivek', 'stu1_47', 'vivek.et1993@gmail.com', '9148725074', NULL, 'not open panel', NULL, 'call', NULL, NULL, 1, 'enable', '2018-08-23 06:24:37'),
(33, 'umesh', 'stu1_63', 'umesh132200@gmail.com', '9148725074', NULL, 'slow', NULL, '1', NULL, NULL, 1, 'enable', '2018-08-23 06:28:45'),
(34, 'vivek sharma', 'stu1_47', 'vivek.et1993@gmail.com', '7979797980', NULL, 'dsfsdf', NULL, '3', NULL, NULL, 1, 'enable', '2018-08-23 07:36:48'),
(35, 'vivek sharma', 'ayush', 'vikas@gmail.com', '9148725074', NULL, 'need school software', NULL, '2', NULL, NULL, 1, 'enable', '2018-08-23 08:54:48'),
(36, 'umesh', 'stu1_63', 'vivek.et1993@gmail.com', '9148725074', NULL, 'internet not working', NULL, '1', NULL, NULL, 1, 'enable', '2018-08-28 11:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(20) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `student_id` int(20) NOT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `customer_address` text,
  `organization_address` text,
  `organization_email` varchar(100) DEFAULT NULL,
  `organization_mobile` varchar(100) DEFAULT NULL,
  `total_amount` decimal(25,0) NOT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  `status` enum('pending','partially','paid') NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `school_id`, `invoice_id`, `student_id`, `organization_name`, `customer_name`, `email`, `mobile`, `customer_address`, `organization_address`, `organization_email`, `organization_mobile`, `total_amount`, `amount_paid`, `status`, `date`) VALUES
(87, 1, '1359', 16, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2018-07-28 12:03:35'),
(88, 1, '1360', 17, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2018-05-28 13:47:06'),
(89, 1, '1361', 18, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2018-07-28 14:18:02'),
(90, 1, '1362', 18, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '100', NULL, 'pending', '2018-04-28 15:37:26'),
(91, 1, '1363', 16, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2018-07-29 12:13:15'),
(92, 1, '1364', 16, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2018-07-29 12:15:35'),
(93, 1, '1365', 16, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '262', NULL, 'pending', '2018-07-30 15:29:42'),
(94, 1, '1366', 18, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '708', NULL, 'pending', '2018-08-06 17:53:04'),
(95, 1, '1367', 16, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '45498', NULL, 'pending', '2018-04-06 17:53:34'),
(96, 1, '1368', 16, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '590', NULL, 'pending', '2018-03-06 17:56:32'),
(97, 1, '1369', 18, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '63075', NULL, 'pending', '2018-02-06 17:58:08'),
(101, 1, '1370', 65, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '590', NULL, 'pending', '2018-08-16 17:50:33'),
(102, 1, '1371', 17, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '4130', NULL, 'pending', '2018-08-27 14:30:34'),
(103, 1, '1372', 68, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '3540', NULL, 'pending', '2018-08-28 11:52:23'),
(104, 1, '1373', 18, 'saraswati shishu mandir', 'aman sahu', 'aman@gmail.com', '123456789', NULL, 'bairanbazar', 'school@gmail.com', '1234567898', '400', NULL, 'pending', '2018-09-04 13:41:17'),
(105, 1, '1374', 18, 'saraswati shishu mandir', 'aman sahu', 'aman@gmail.com', '123456789', 'jabalpur', 'bairanbazar', 'school@gmail.com', '1234567898', '300', NULL, 'pending', '2018-09-04 13:52:43'),
(106, 1, '1375', 18, 'saraswati shishu mandir', 'aman sahu', 'aman@gmail.com', '123456789', 'jabalpur', 'bairanbazar', 'school@gmail.com', '1234567898', '3000', NULL, 'pending', '2018-09-04 17:52:15'),
(107, 1, '1376', 58, 'saraswati shishu mandir', 'virendra', 'vivek.et1993@gmail.com', '7828161459', 'sdgdsgsfdg', 'bairanbazar', 'school@gmail.com', '1234567898', '300', NULL, 'pending', '2018-09-04 18:04:53'),
(108, 1, '1377', 63, 'saraswati shishu mandir', 'krishna', 'vivek.et1993@gmail.com', '7828161459', 'fsdfsdfsdfsd f', 'bairanbazar', 'school@gmail.com', '1234567898', '300', '200', 'paid', '2018-09-04 18:36:01'),
(109, 1, '1378', 63, 'saraswati shishu mandir', 'krishna', 'vivek.et1993@gmail.com', '7828161459', 'fsdfsdfsdfsd f', 'bairanbazar', 'school@gmail.com', '1234567898', '300', '200', 'paid', '2018-09-04 18:36:18'),
(110, 1, '1379', 63, 'saraswati shishu mandir', 'krishna', 'vivek.et1993@gmail.com', '7828161459', 'fsdfsdfsdfsd f', 'bairanbazar', 'school@gmail.com', '1234567898', '130', '200', 'pending', '2018-09-04 18:43:23'),
(111, 1, '1380', 63, 'saraswati shishu mandir', 'krishna', 'vivek.et1993@gmail.com', '7828161459', 'fsdfsdfsdfsd f', 'bairanbazar', 'school@gmail.com', '1234567898', '100', NULL, 'pending', '2018-09-04 18:54:11'),
(112, 1, '1381', 63, 'saraswati shishu mandir', 'krishna', 'vivek.et1993@gmail.com', '7828161459', 'fsdfsdfsdfsd f', 'bairanbazar', 'school@gmail.com', '1234567898', '2000', NULL, 'pending', '2018-09-05 11:44:26'),
(113, 1, '1382', 55, 'saraswati shishu mandir', 'pratap', 'vivek.et1993@gmail.com', '9148725074', 'fgdf', 'bairanbazar', 'school@gmail.com', '1234567898', '200', NULL, 'pending', '2018-09-06 17:07:26'),
(114, 1, '1383', 55, 'saraswati shishu mandir', 'pratap', 'vivek.et1993@gmail.com', '9148725074', 'fgdf', 'bairanbazar', 'school@gmail.com', '1234567898', '206', NULL, 'pending', '2018-09-06 17:10:23'),
(115, 1, '1384', 29, 'saraswati shishu mandir', 'vikas', 'slkjaihaileds@gmail.com', '8319337577', 'Samata Colony, B.M.Y. Charoda', 'bairanbazar', 'school@gmail.com', '1234567898', '2', '0', 'pending', '2018-09-15 12:16:45'),
(116, 1, '1385', 63, 'saraswati shishu mandir', 'krishna', 'vivek.et1993@gmail.com', '7828161459', 'fsdfsdfsdfsd f', 'bairanbazar', 'school@gmail.com', '1234567898', '1000', '1000', 'partially', '2018-09-19 14:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `logout_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id`, `username`, `ip_address`, `login_time`, `status`, `logout_time`) VALUES
(0, 'admin', '192.168.0.130', '2018-08-08 15:30:19', 1, NULL),
(1, 'admin', '192168', '2018-08-02 16:52:21', 0, NULL),
(2, 'vicky', '192.168.0.133', '2018-08-02 16:53:41', 0, NULL),
(3, 'admin', '192.168.0.133', '2018-08-02 17:07:28', 1, NULL),
(4, 'erew', '192.168.0.133', '2018-08-02 17:08:57', 0, NULL),
(5, 'ggg', '192.168.0.133', '2018-08-02 17:09:12', 0, NULL),
(6, '444', '192.168.0.133', '2018-08-02 17:09:22', 0, NULL),
(7, 'admin', '192.168.0.133', '2018-08-02 17:21:31', 1, NULL),
(8, 'admin', '192.168.0.133', '2018-08-02 17:25:20', 1, NULL),
(9, 'admin', '103.69.44.45', '2018-08-02 21:36:53', 1, NULL),
(10, 'admin', '103.69.44.45', '2018-08-02 22:13:00', 1, NULL),
(11, 'admin', '103.69.44.45', '2018-08-02 22:40:46', 1, NULL),
(12, 'admin', '103.69.44.45', '2018-08-03 09:52:41', 1, NULL),
(13, 'admin', '103.69.44.45', '2018-08-03 10:22:43', 1, NULL),
(14, 'admin', '103.69.44.45', '2018-08-03 10:35:29', 1, NULL),
(15, 'admin', '103.69.44.45', '2018-08-03 11:27:40', 1, NULL),
(16, 'admin', '103.69.44.45', '2018-08-03 21:41:46', 1, NULL),
(17, 'admin', '103.69.44.45', '2018-08-03 22:09:45', 1, NULL),
(18, 'admin', '103.69.44.45', '2018-08-03 22:34:59', 1, NULL),
(19, 'admin', '103.69.44.45', '2018-08-04 11:07:56', 1, NULL),
(20, 'admin', '103.69.44.45', '2018-08-04 18:06:46', 1, NULL),
(21, 'admin', '103.69.44.45', '2018-08-04 18:07:42', 1, NULL),
(22, 'admin', '103.69.44.45', '2018-08-04 19:02:15', 1, NULL),
(23, 'admin', '192.168.0.251', '2018-08-06 10:52:10', 1, NULL),
(24, 'admin', '192.168.0.251', '2018-08-06 16:35:28', 1, NULL),
(25, 'admin', '192.168.0.251', '2018-08-07 10:44:19', 1, NULL),
(26, 'admin', '192.168.0.251', '2018-08-07 18:25:20', 1, NULL),
(27, 'admin', '192.168.0.251', '2018-08-08 11:01:34', 1, NULL),
(28, 'admin', '192.168.0.130', '2018-08-09 11:23:33', 1, NULL),
(29, 'admin', '192.168.0.130', '2018-08-09 12:56:53', 1, NULL),
(30, 'stu1_47', '192.168.0.130', '2018-08-09 13:01:53', 1, NULL),
(31, 'stu1_47', '192.168.0.130', '2018-08-09 13:03:00', 1, NULL),
(32, 'admin', '192.168.0.130', '2018-08-09 14:02:31', 1, NULL),
(33, 'admin', '192.168.0.130', '2018-08-10 10:48:55', 1, NULL),
(34, 'admin', '103.69.44.45', '2018-08-10 22:14:21', 1, NULL),
(35, 'admin', '103.69.44.45', '2018-08-11 18:25:18', 1, NULL),
(36, 'admin', '103.69.44.45', '2018-08-13 11:01:14', 1, NULL),
(37, 'admin', '103.69.44.45', '2018-08-13 17:58:54', 1, NULL),
(38, 'admin', '103.69.45.11', '2018-08-13 18:23:30', 1, NULL),
(39, 'sfs', '103.69.45.11', '2018-08-13 18:24:17', 0, NULL),
(40, 'admin', '103.69.45.11', '2018-08-13 18:27:18', 1, NULL),
(41, 'admin', '103.69.45.11', '2018-08-13 18:38:14', 1, NULL),
(42, 'admin', '47.247.121.0', '2018-08-13 21:32:43', 1, NULL),
(43, 'admin', '103.69.45.11', '2018-08-14 10:19:21', 1, NULL),
(44, 'admin', '127.0.0.1', '2018-08-14 10:23:35', 1, NULL),
(45, 'super', '127.0.0.1', '2018-08-14 11:30:52', 0, NULL),
(46, 'super', '127.0.0.1', '2018-08-14 11:31:40', 0, NULL),
(47, 'super', '127.0.0.1', '2018-08-14 11:33:02', 0, NULL),
(48, 'super', '127.0.0.1', '2018-08-14 11:33:05', 0, NULL),
(49, 'super', '127.0.0.1', '2018-08-14 11:33:11', 0, NULL),
(50, 'super', '127.0.0.1', '2018-08-14 11:33:28', 0, NULL),
(51, 'super', '127.0.0.1', '2018-08-14 11:33:35', 0, NULL),
(52, 'super', '127.0.0.1', '2018-08-14 11:34:59', 0, NULL),
(53, 'adm217', '127.0.0.1', '2018-08-14 13:58:04', 0, NULL),
(54, 'admin', '127.0.0.1', '2018-08-14 13:59:03', 1, NULL),
(55, 'adm2_17', '127.0.0.1', '2018-08-14 13:59:56', 1, NULL),
(56, 'admin', '127.0.0.1', '2018-08-14 14:12:44', 1, NULL),
(57, 'admin', '127.0.0.1', '2018-08-14 15:20:25', 1, NULL),
(58, 'admin', '127.0.0.1', '2018-08-14 16:14:36', 1, NULL),
(59, 'admin', '127.0.0.1', '2018-08-14 16:15:00', 1, NULL),
(60, 'admin', '127.0.0.1', '2018-08-14 16:15:53', 1, NULL),
(61, 'admin', '127.0.0.1', '2018-08-14 16:16:19', 1, NULL),
(62, 'adm2_17', '127.0.0.1', '2018-08-14 17:55:42', 1, NULL),
(63, 'adm2_17', '127.0.0.1', '2018-08-14 18:00:36', 1, NULL),
(64, '', '127.0.0.1', '2018-08-14 18:06:35', 0, NULL),
(65, '', '127.0.0.1', '2018-08-14 18:06:38', 0, NULL),
(66, '', '127.0.0.1', '2018-08-14 18:06:40', 0, NULL),
(67, '', '127.0.0.1', '2018-08-14 18:06:48', 0, NULL),
(68, 'admin', '127.0.0.1', '2018-08-14 18:13:33', 1, NULL),
(69, '', '127.0.0.1', '2018-08-16 11:22:18', 0, NULL),
(70, 'admin', '127.0.0.1', '2018-08-16 12:12:16', 1, NULL),
(71, 'admin', '127.0.0.1', '2018-08-16 13:42:08', 1, NULL),
(72, 'admin', '127.0.0.1', '2018-08-16 17:33:14', 1, NULL),
(73, 'adm2_17', '127.0.0.1', '2018-08-16 17:55:05', 1, NULL),
(74, 'adm2_17', '127.0.0.1', '2018-08-16 17:56:56', 1, NULL),
(75, 'adm4_19', '127.0.0.1', '2018-08-16 17:58:42', 1, NULL),
(76, 'admin', '47.247.76.165', '2018-08-16 22:34:49', 1, NULL),
(77, 'admin', '47.247.87.241', '2018-08-17 09:37:34', 1, NULL),
(78, 'admin', '127.0.0.1', '2018-08-18 10:57:58', 1, NULL),
(79, 'admin', '127.0.0.1', '2018-08-18 13:20:18', 1, NULL),
(80, 'admin', '127.0.0.1', '2018-08-18 17:06:41', 1, NULL),
(81, 'admin', '127.0.0.1', '2018-08-20 10:41:50', 1, NULL),
(82, 'admin', '127.0.0.1', '2018-08-20 15:23:00', 1, NULL),
(83, 'admin', '127.0.0.1', '2018-08-20 16:29:46', 1, NULL),
(84, 'emp4_22', '127.0.0.1', '2018-08-20 16:59:52', 1, NULL),
(85, 'admin', '127.0.0.1', '2018-08-20 17:05:43', 1, NULL),
(86, 'admin', '127.0.0.1', '2018-08-20 18:09:12', 0, NULL),
(87, 'admin', '127.0.0.1', '2018-08-20 18:09:18', 1, NULL),
(88, 'admin', '127.0.0.1', '2018-08-21 10:41:25', 1, NULL),
(89, 'admin', '127.0.0.1', '2018-08-21 14:21:13', 1, NULL),
(90, 'admin', '127.0.0.1', '2018-08-21 16:47:17', 1, NULL),
(91, 'admin', '127.0.0.1', '2018-08-22 19:47:34', 1, NULL),
(92, 'admin', '127.0.0.1', '2018-08-23 10:38:30', 1, NULL),
(93, 'admin', '127.0.0.1', '2018-08-28 11:11:27', 1, NULL),
(94, 'admin', '127.0.0.1', '2018-08-29 10:33:40', 1, NULL),
(95, 'stu1_18', '127.0.0.1', '2018-08-29 13:05:23', 1, NULL),
(96, 'stu1_18', '127.0.0.1', '2018-08-29 13:05:50', 1, NULL),
(97, 'stu1_18', '127.0.0.1', '2018-08-29 13:05:56', 1, NULL),
(98, 'stu1_18', '127.0.0.1', '2018-08-29 13:06:12', 1, NULL),
(99, 'stu1_18', '127.0.0.1', '2018-08-29 13:11:06', 1, NULL),
(100, 'stu1_18', '127.0.0.1', '2018-08-29 13:30:54', 1, NULL),
(101, 'stu1_18', '127.0.0.1', '2018-08-29 13:32:32', 1, NULL),
(102, 'stu1_18', '127.0.0.1', '2018-08-29 13:32:38', 1, NULL),
(103, 'stu1_18', '127.0.0.1', '2018-08-29 13:33:12', 1, NULL),
(104, 'stu1_18', '127.0.0.1', '2018-08-29 13:33:21', 1, NULL),
(105, 'stu1_18', '127.0.0.1', '2018-08-29 13:42:54', 1, NULL),
(106, 'stu1_18', '127.0.0.1', '2018-08-29 13:42:55', 1, NULL),
(107, 'stu1_18', '127.0.0.1', '2018-08-29 13:42:55', 1, NULL),
(108, 'stu1_18', '127.0.0.1', '2018-08-29 13:42:55', 1, NULL),
(109, 'emp1_3', '127.0.0.1', '2018-08-29 13:43:56', 1, NULL),
(110, 'stu1_62', '127.0.0.1', '2018-08-29 14:28:44', 1, NULL),
(111, 'stu1_61', '127.0.0.1', '2018-08-29 18:22:11', 1, NULL),
(112, '1234', '127.0.0.1', '2018-08-29 18:43:13', 1, NULL),
(113, '12345', '127.0.0.1', '2018-08-29 18:45:03', 1, NULL),
(114, 'admin', '::1', '2018-08-30 11:10:53', 1, NULL),
(115, 'stu1_24', '::1', '2018-08-30 11:12:04', 1, NULL),
(116, 'stu1_24', '::1', '2018-08-30 11:14:02', 1, NULL),
(117, 'stu1_18', '::1', '2018-08-30 11:16:39', 0, NULL),
(118, 'stu1_18', '::1', '2018-08-30 11:16:48', 0, NULL),
(119, 'stu1_18', '::1', '2018-08-30 11:17:12', 1, NULL),
(120, 'stu1_18', '::1', '2018-08-30 12:17:15', 1, NULL),
(121, 'stu1_20', '::1', '2018-08-30 12:39:47', 1, NULL),
(122, 'emp1_4', '::1', '2018-08-30 12:40:36', 1, NULL),
(123, 'emp1_4', '::1', '2018-08-30 12:43:53', 1, NULL),
(124, 'stu1_24', '::1', '2018-08-30 12:51:23', 1, NULL),
(125, 'admin', '::1', '2018-08-30 12:57:45', 1, NULL),
(126, 'stu1_18', '::1', '2018-08-30 13:19:15', 1, NULL),
(127, 'stu1_18', '::1', '2018-08-30 13:31:17', 1, NULL),
(128, 'admin', '::1', '2018-08-30 15:09:59', 1, NULL),
(129, 'stu1_18', '::1', '2018-08-30 15:23:35', 0, NULL),
(130, 'stu1_18', '::1', '2018-08-30 15:23:43', 0, NULL),
(131, 'stu1_18', '::1', '2018-08-30 15:24:32', 0, NULL),
(132, 'stu1_30', '::1', '2018-08-30 15:25:17', 1, NULL),
(133, 'stu1_18', '::1', '2018-08-30 15:26:10', 0, NULL),
(134, 'stu1_18', '::1', '2018-08-30 15:26:34', 0, NULL),
(135, 'stu1_17', '::1', '2018-08-30 15:27:01', 1, NULL),
(136, 'stu1_19', '::1', '2018-08-30 15:27:38', 1, NULL),
(137, 'stu1_18', '::1', '2018-08-30 15:29:08', 1, NULL),
(138, '', '::1', '2018-08-30 15:59:25', 1, NULL),
(139, 'stu1_18', '::1', '2018-08-30 16:03:02', 1, NULL),
(140, 'par1_2', '::1', '2018-08-30 16:08:16', 0, NULL),
(141, 'par1_2', '::1', '2018-08-30 16:08:40', 1, NULL),
(142, 'admin', '::1', '2018-08-30 16:13:49', 1, NULL),
(143, 'stu1_18', '::1', '2018-08-30 16:33:51', 1, NULL),
(144, 'emp1_2', '::1', '2018-08-30 16:34:16', 1, NULL),
(145, 'admin', '::1', '2018-08-30 16:46:12', 1, NULL),
(146, 'admin', '::1', '2018-08-30 16:48:00', 1, NULL),
(147, 'admin', '::1', '2018-08-30 16:57:56', 1, NULL),
(148, 'admin', '::1', '2018-08-30 17:08:17', 1, NULL),
(149, 'admin', '103.69.45.11', '2018-08-31 10:34:28', 1, NULL),
(150, 'admin', '157.49.142.186', '2018-08-31 11:20:57', 1, NULL),
(151, 'admin', '157.49.142.186', '2018-08-31 11:21:59', 1, NULL),
(152, 'admin', '157.49.142.186', '2018-08-31 11:23:46', 1, NULL),
(153, 'admin', '157.49.142.186', '2018-08-31 11:25:38', 1, NULL),
(154, 'admin', '157.49.142.186', '2018-08-31 11:31:55', 1, NULL),
(155, 'adm_30', '103.69.45.11', '2018-08-31 13:12:34', 0, NULL),
(156, 'adm5_30', '103.69.45.11', '2018-08-31 13:12:59', 0, NULL),
(157, 'adm5_30', '103.69.45.11', '2018-08-31 13:13:14', 0, NULL),
(158, 'super', '127.0.0.1', '2018-09-01 17:16:53', 1, NULL),
(159, 'admin', '127.0.0.1', '2018-09-01 17:18:42', 1, NULL),
(160, 'admin', '127.0.0.1', '2018-09-01 17:36:41', 1, NULL),
(161, 'admin', '127.0.0.1', '2018-09-03 15:34:26', 1, NULL),
(162, 'admin', '127.0.0.1', '2018-09-04 11:11:10', 1, NULL),
(163, 'admin', '127.0.0.1', '2018-09-05 11:19:31', 1, NULL),
(164, 'admin', '127.0.0.1', '2018-09-06 18:12:59', 1, NULL),
(165, 'admin', '127.0.0.1', '2018-09-06 18:14:09', 1, NULL),
(166, 'admin', '127.0.0.1', '2018-09-06 18:15:03', 1, NULL),
(167, 'admin', '103.69.45.11', '2018-09-13 13:28:26', 1, NULL),
(168, 'ZAP', '183.82.16.177', '2018-09-14 12:54:11', 0, NULL),
(169, '', '183.82.16.177', '2018-09-14 12:54:11', 0, NULL),
(170, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(171, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(172, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(173, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(174, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(175, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(176, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(177, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(178, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(179, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(180, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(181, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(182, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(183, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(184, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(185, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(186, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(187, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(188, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(189, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(190, '', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(191, 'ZAP', '183.82.16.177', '2018-09-14 12:54:27', 0, NULL),
(192, '', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(193, 'ZAP', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(194, 'ZAP', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(195, '', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(196, 'ZAP', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(197, 'ZAP', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(198, 'ZAP', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(199, 'ZAP', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(200, 'c:/Windows/system.ini', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(201, '../../../../../../../../../../../../../../../../Windows/system.ini', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(202, 'c:\\Windows\\system.ini', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(203, '..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\Windows\\system.ini', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(204, '/etc/passwd', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(205, '../../../../../../../../../../../../../../../../etc/passwd', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(206, 'c:/', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(207, '/', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(208, 'c:\\', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(209, '../../../../../../../../../../../../../../../../', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(210, 'WEB-INF/web.xml', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(211, 'WEB-INF\\web.xml', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(212, '/WEB-INF/web.xml', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(213, '\\WEB-INF\\web.xml', '183.82.16.177', '2018-09-14 12:54:28', 0, NULL),
(214, 'thishouldnotexistandhopefullyitwillnot', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(215, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(216, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(217, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(218, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(219, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(220, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(221, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(222, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(223, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(224, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(225, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(226, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(227, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(228, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(229, 'ZAP', '183.82.16.177', '2018-09-14 12:54:29', 0, NULL),
(230, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(231, '', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(232, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(233, '', '183.82.16.177', '2018-09-14 12:54:38', 0, '2019-03-06 14:47:28'),
(234, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(235, '', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(236, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(237, '', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(238, '', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(239, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(240, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(241, '', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(242, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(243, 'ZAP', '183.82.16.177', '2018-09-14 12:54:38', 0, NULL),
(244, '', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(245, '', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(246, '', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(247, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(248, '', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(249, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(250, 'http://www.google.com/', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(251, 'http://www.google.com:80/', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(252, 'http://www.google.com', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(253, 'http://www.google.com/search?q=OWASP ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(254, 'http://www.google.com:80/search?q=OWASP ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(255, 'www.google.com/', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(256, 'www.google.com:80/', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(257, 'www.google.com', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(258, 'www.google.com/search?q=OWASP ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(259, 'www.google.com:80/search?q=OWASP ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(260, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(261, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(262, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(263, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(264, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(265, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(266, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(267, 'ZAP', '183.82.16.177', '2018-09-14 12:54:39', 0, NULL),
(268, 'ZAP', '183.82.16.177', '2018-09-14 12:54:40', 0, NULL),
(269, 'ZAP', '183.82.16.177', '2018-09-14 12:54:40', 0, NULL),
(270, '', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(271, 'ZAP', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(272, 'ZAP', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(273, '', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(274, 'ZAP', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(275, '', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(276, 'ZAP', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(277, '', '183.82.16.177', '2018-09-14 12:54:44', 0, NULL),
(278, '&lt;!--#EXEC cmd=\"ls /\"--&gt;', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(279, '\">&lt;!--#EXEC cmd=\"ls /\"--&gt;<', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(280, '&lt;!--#EXEC cmd=\"dir \\\\\"--&gt;', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(281, '\">&lt;!--#EXEC cmd=\"dir \\\\\"--&gt;<', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(282, 'ZAP', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(283, 'ZAP', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(284, 'ZAP', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(285, 'ZAP', '183.82.16.177', '2018-09-14 12:54:45', 0, NULL),
(286, 'ZAP', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(287, '', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(288, 'ZAP', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(289, '', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(290, 'ZAP', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(291, '', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(292, '0W45pz4p', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(293, 'ZAP0W45pz4p', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(294, '\'\"[removed]alert&#40;1&#41;;[removed]', '183.82.16.177', '2018-09-14 12:54:48', 0, NULL),
(295, 'ZAP', '183.82.16.177', '2018-09-14 12:54:49', 0, NULL),
(296, 'ZAP', '183.82.16.177', '2018-09-14 12:54:49', 0, NULL),
(297, 'ZAP', '183.82.16.177', '2018-09-14 12:54:49', 0, NULL),
(298, 'ZAP', '183.82.16.177', '2018-09-14 12:54:50', 0, NULL),
(299, '', '183.82.16.177', '2018-09-14 12:54:50', 0, NULL),
(300, 'zApPX20sS', '183.82.16.177', '2018-09-14 12:54:51', 0, NULL),
(301, 'ZAP', '183.82.16.177', '2018-09-14 12:54:51', 0, NULL),
(302, '', '183.82.16.177', '2018-09-14 12:54:52', 0, NULL),
(303, 'ZAP', '183.82.16.177', '2018-09-14 12:54:52', 0, NULL),
(304, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(305, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(306, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(307, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(308, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(309, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(310, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(311, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(312, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(313, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(314, '', '183.82.16.177', '2018-09-14 12:55:08', 0, NULL),
(315, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(316, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(317, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(318, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(319, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(320, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(321, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(322, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(323, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(324, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(325, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(326, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(327, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(328, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(329, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(330, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(331, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(332, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(333, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(334, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(335, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(336, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(337, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(338, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(339, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(340, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(341, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(342, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(343, '', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(344, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(345, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(346, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(347, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(348, 'ZAP', '183.82.16.177', '2018-09-14 12:55:09', 0, NULL),
(349, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(350, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(351, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(352, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(353, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(354, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(355, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(356, '\'', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(357, 'ZAP\'', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(358, '\"', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(359, 'ZAP\"', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(360, ';', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(361, 'ZAP;', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(362, ')', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(363, 'ZAP)', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(364, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(365, 'ZAP', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(366, 'ZAP AND 1=1 -- ', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(367, 'ZAP AND 1=2 -- ', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(368, 'ZAP OR 1=1 -- ', '183.82.16.177', '2018-09-14 12:55:10', 0, NULL),
(369, 'ZAP AND 1=2 -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(370, 'ZAP OR 1=1 -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(371, 'ZAP\' AND \'1\'=\'1\' -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(372, 'ZAP\' AND \'1\'=\'2\' -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(373, 'ZAP\' OR \'1\'=\'1\' -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(374, 'ZAP\' AND \'1\'=\'2\' -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(375, 'ZAP\' OR \'1\'=\'1\' -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(376, 'ZAP UNION ALL select NULL -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(377, 'ZAP\' UNION ALL select NULL -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(378, 'ZAP\" UNION ALL select NULL -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(379, 'ZAP) UNION ALL select NULL -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(380, 'ZAP\') UNION ALL select NULL -- ', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(381, 'ZAP', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(382, 'ZAP', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(383, 'ZAP', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(384, 'ZAP', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(385, 'ZAP', '183.82.16.177', '2018-09-14 12:55:11', 0, NULL),
(386, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(387, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(388, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(389, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(390, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(391, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(392, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(393, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(394, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(395, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(396, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(397, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(398, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(399, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(400, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(401, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(402, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(403, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(404, 'ZAP', '183.82.16.177', '2018-09-14 12:55:12', 0, NULL),
(405, 'ZAP', '183.82.16.177', '2018-09-14 12:55:13', 0, NULL),
(406, 'ZAP', '183.82.16.177', '2018-09-14 12:55:13', 0, NULL),
(407, 'ZAP', '183.82.16.177', '2018-09-14 12:55:13', 0, NULL),
(408, '', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(409, '', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(410, '', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(411, '', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(412, 'ZAP', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(413, '', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(414, 'ZAP', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(415, '', '183.82.16.177', '2018-09-14 12:55:17', 0, NULL),
(416, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(417, '', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(418, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(419, '', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(420, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(421, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(422, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(423, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(424, '\";print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));$var=\"', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(425, '\';print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));$var=\'', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(426, '${@print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110))}', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(427, '${@print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110))}\\', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(428, ';print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(429, '\"+response.write([100,000*100,000)+\"', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(430, '+response.write({0}*{1})+', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(431, 'response.write(100,000*100,000)', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(432, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(433, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(434, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(435, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(436, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(437, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(438, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(439, 'ZAP', '183.82.16.177', '2018-09-14 12:55:18', 0, NULL),
(440, '', '183.82.16.177', '2018-09-14 12:55:34', 0, NULL),
(441, '', '183.82.16.177', '2018-09-14 12:55:34', 0, NULL),
(442, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(443, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(444, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(445, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(446, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(447, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(448, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(449, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(450, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(451, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(452, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(453, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(454, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(455, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(456, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(457, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(458, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(459, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(460, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(461, '', '183.82.16.177', '2018-09-14 12:55:35', 0, NULL),
(462, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(463, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(464, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(465, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(466, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(467, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(468, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(469, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(470, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(471, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(472, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(473, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(474, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(475, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(476, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(477, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(478, '', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(479, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(480, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(481, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(482, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(483, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(484, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(485, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(486, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(487, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(488, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(489, 'ZAP', '183.82.16.177', '2018-09-14 12:55:36', 0, NULL),
(490, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(491, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(492, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(493, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(494, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(495, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(496, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(497, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(498, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(499, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(500, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(501, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(502, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(503, 'ZAP', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(504, 'ZAP&cat /etc/passwd&', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(505, 'ZAP;cat /etc/passwd;', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(506, 'ZAP\"&cat /etc/passwd&\"', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(507, 'ZAP\";cat /etc/passwd;\"', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(508, 'ZAP\'&cat /etc/passwd&\'', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(509, 'ZAP\';cat /etc/passwd;\'', '183.82.16.177', '2018-09-14 12:55:37', 0, NULL),
(510, 'ZAP&sleep 15&', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(511, 'ZAP;sleep 15;', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(512, 'ZAP\"&sleep 15&\"', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(513, 'ZAP\";sleep 15;\"', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(514, 'ZAP&sleep {0}&', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(515, 'ZAP;sleep {0};', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(516, 'ZAP&type %SYSTEMROOT%\\win.ini', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(517, 'ZAP|type %SYSTEMROOT%\\win.ini', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(518, 'ZAP\"&type %SYSTEMROOT%\\win.ini&\"', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(519, 'ZAP\"|type %SYSTEMROOT%\\win.ini', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(520, 'ZAP\'&type %SYSTEMROOT%\\win.ini&\'', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(521, 'ZAP\'|type %SYSTEMROOT%\\win.ini', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(522, 'ZAP&timeout /T 15', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(523, 'ZAP|timeout /T 15', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(524, 'ZAP\"&timeout /T 15&\"', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(525, 'ZAP\"|timeout /T 15', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(526, 'ZAP&timeout /T {0}&', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(527, 'ZAP|timeout /T {0}', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(528, 'ZAP;get-help', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(529, 'ZAP\";get-help', '183.82.16.177', '2018-09-14 12:55:38', 0, NULL),
(530, 'ZAP\';get-help', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(531, 'ZAP;get-help #', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(532, 'ZAP;start-sleep -s 15', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(533, 'ZAP\";start-sleep -s 15', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(534, 'ZAP;start-sleep -s {0}', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(535, 'ZAP;start-sleep -s 15 #', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(536, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(537, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(538, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(539, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(540, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(541, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(542, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(543, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(544, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(545, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(546, 'ZAP', '183.82.16.177', '2018-09-14 12:55:39', 0, NULL),
(547, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(548, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(549, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(550, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(551, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(552, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(553, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(554, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(555, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(556, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(557, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(558, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(559, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(560, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(561, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(562, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(563, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(564, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(565, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(566, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(567, 'ZAP', '183.82.16.177', '2018-09-14 12:55:40', 0, NULL),
(568, 'ZAP', '183.82.16.177', '2018-09-14 12:55:42', 0, NULL),
(569, '', '183.82.16.177', '2018-09-14 12:55:42', 0, NULL),
(570, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(571, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(572, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(573, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(574, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(575, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(576, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(577, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(578, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(579, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(580, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(581, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(582, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(583, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(584, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(585, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(586, '', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(587, 'ZAP', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(588, '5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(589, 'http://5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(590, 'https://5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(591, 'http:\\\\5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(592, 'https:\\\\5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(593, '//5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(594, '\\\\5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:49', 0, NULL),
(595, 'HtTp://5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(596, 'HtTpS://5747298839871994672.owasp.org', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(597, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(598, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(599, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(600, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(601, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(602, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(603, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(604, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(605, 'ZAP', '183.82.16.177', '2018-09-14 12:55:50', 0, NULL),
(606, '', '183.82.16.177', '2018-09-14 12:55:53', 0, NULL),
(607, 'ZAP', '183.82.16.177', '2018-09-14 12:55:53', 0, NULL),
(608, 'uYXAkQXSTgKbCGxFOFeaCRjFyNfVNaZwOBeRLeMknJKSUwQVKqLRcVDVRKloYKDRGUHRSEpleFfvDdCwHIefgWXASCmwjMnYPQVp', '183.82.16.177', '2018-09-14 12:55:53', 0, NULL),
(609, 'ZAP', '183.82.16.177', '2018-09-14 12:55:53', 0, NULL),
(610, '', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(611, 'ZAP', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(612, '', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(613, 'ZAP', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(614, '', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(615, 'ZAP', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(616, 'ZAP', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(617, 'ZAP%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s\n', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(618, 'ZAP %1!s%2!s%3!s%4!s%5!s%6!s%7!s%8!s%9!s!s!s!s!s!s!s!s!s!s!s !s!!n\"!n#!n$!n%!n&!n\'!n(!n)!n0!n1!n2!n3', '183.82.16.177', '2018-09-14 12:55:56', 0, NULL),
(619, 'ZAP', '183.82.16.177', '2018-09-14 12:55:57', 0, NULL),
(620, 'ZAP', '183.82.16.177', '2018-09-14 12:55:57', 0, NULL),
(621, 'ZAP', '183.82.16.177', '2018-09-14 12:55:57', 0, NULL),
(622, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(623, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(624, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(625, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(626, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(627, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(628, '', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(629, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(630, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(631, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(632, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(633, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(634, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(635, 'ZAP', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(636, 'Set-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(637, 'any\r\nSet-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3', '183.82.16.177', '2018-09-14 12:56:02', 0, NULL),
(638, 'any?\r\nSet-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(639, 'any\nSet-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(640, 'any?\nSet-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(641, 'any\r\nSet-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3\r\n', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(642, 'any?\r\nSet-cookie: Tamper=e70b703f-4543-4f4f-961b-57cfbb2ad9e3\r\n', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(643, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(644, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(645, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(646, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(647, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(648, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(649, 'ZAP', '183.82.16.177', '2018-09-14 12:56:03', 0, NULL),
(650, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(651, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(652, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(653, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(654, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(655, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(656, '', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(657, 'ZAP', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(658, 'ZAP', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(659, 'ZAP', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(660, 'ZAP', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(661, 'ZAP', '183.82.16.177', '2018-09-14 12:56:09', 0, NULL),
(662, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(663, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(664, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(665, '', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(666, '', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(667, '@', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(668, '+', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(669, '', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(670, '|', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(671, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(672, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(673, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(674, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(675, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(676, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(677, 'ZAP', '183.82.16.177', '2018-09-14 12:56:10', 0, NULL),
(678, '', '183.82.16.177', '2018-09-14 12:56:54', 0, NULL),
(679, '', '183.82.16.177', '2018-09-14 12:56:54', 0, NULL),
(680, 'admin', '183.82.16.177', '2018-09-14 13:00:46', 1, NULL),
(681, 'ZAP', '183.82.16.177', '2018-09-14 13:01:34', 0, NULL),
(682, '', '183.82.16.177', '2018-09-14 13:02:03', 0, NULL),
(683, '', '183.82.16.177', '2018-09-14 13:02:03', 0, NULL),
(684, 'adm2_20', '103.69.45.11', '2018-09-14 17:09:48', 1, NULL),
(685, 'admin', '103.69.45.11', '2018-09-14 17:25:10', 1, NULL),
(686, 'admin', '103.69.45.11', '2018-09-15 12:15:34', 1, NULL),
(687, 'admin', '103.69.45.11', '2018-09-18 16:20:46', 1, NULL),
(688, 'admin', '103.69.45.11', '2018-09-19 11:25:17', 1, NULL),
(689, 'admin', '167.114.101.64', '2018-09-19 14:39:02', 1, NULL),
(690, 'admin', '167.114.101.64', '2018-09-19 14:39:21', 1, NULL),
(691, 'admin', '47.247.207.187', '2018-10-08 23:38:00', 0, NULL),
(692, 'admin\' or 5=5#', '47.247.207.187', '2018-10-08 23:39:28', 0, NULL),
(693, 'admin', '27.57.213.3', '2018-11-03 21:10:00', 1, NULL),
(694, 'admin', '27.57.213.3', '2018-11-03 21:16:42', 1, NULL),
(695, '\' or 1=1-- ', '47.247.79.52', '2018-11-08 22:22:10', 0, NULL),
(696, 'admin', '103.69.45.11', '2018-11-14 13:50:57', 1, NULL),
(697, 'admin', '103.69.45.11', '2018-11-16 15:15:42', 1, NULL),
(698, 'admin', '103.69.45.11', '2018-11-19 16:24:30', 1, NULL),
(699, 'super', '103.69.45.11', '2018-11-20 16:39:52', 1, NULL),
(700, 'admin', '103.69.45.11', '2018-11-21 11:30:47', 1, NULL),
(701, 'stu1_72', '103.69.45.11', '2018-11-21 11:32:15', 0, NULL),
(702, 'stu1_72', '103.69.45.11', '2018-11-21 11:32:29', 1, NULL),
(703, 'stu1_72', '103.69.45.11', '2018-11-21 11:32:58', 1, NULL),
(704, 'admin', '103.69.45.11', '2018-11-21 16:38:57', 1, NULL),
(705, 'admin', '103.69.45.11', '2018-11-30 15:25:09', 1, NULL),
(706, 'admin', '103.69.45.11', '2019-01-02 11:28:13', 1, NULL),
(707, 'admin', '::1', '2019-01-23 16:55:35', 1, NULL),
(708, 'admin', '::1', '2019-03-06 14:48:16', 1, '2019-03-06 15:45:09'),
(709, 'admin', '::1', '2019-03-06 16:46:41', 1, '2019-03-06 16:50:09'),
(710, 'admin', '::1', '2019-03-06 16:50:14', 1, '2019-03-06 16:52:01'),
(711, 'admin', '::1', '2019-03-06 16:52:10', 1, NULL),
(712, 'admin', '::1', '2019-03-22 11:30:09', 1, NULL),
(713, 'admin', '::1', '2019-03-22 12:44:13', 1, NULL),
(714, 'admin', '::1', '2019-03-25 10:38:38', 1, NULL),
(715, 'admin', '::1', '2019-03-26 10:28:36', 1, NULL),
(716, 'admin', '::1', '2019-03-27 10:45:40', 1, NULL),
(717, 'admin', '::1', '2019-03-28 10:29:51', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_outgoing_email`
--

CREATE TABLE `log_outgoing_email` (
  `id` int(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `school_id` int(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sender_id` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_outgoing_email`
--

INSERT INTO `log_outgoing_email` (`id`, `subject`, `body`, `school_id`, `email`, `sender_id`, `date`) VALUES
(52, 'student credential', 'welcome to  \r\nyour username=stu1_72  and password= 46903', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-06 10:13:55'),
(53, 'User credential', 'Welcome to  \r\nYour username=emp1_29 and password=5346', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-06 10:42:02'),
(54, 'invoice generate', '', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-06 11:37:27'),
(55, 'invoice generate', '', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-06 11:40:25'),
(56, 'invoice generate', '', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-11 10:56:13'),
(57, 'invoice generate', '', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-11 10:57:00'),
(58, 'invoice generate', '', 1, 'slkjaihaileds@gmail.com', 'mail.9yug.net', '2018-09-15 06:46:46'),
(59, 'invoice generate', '', 1, 'vivek.et1993@gmail.com', 'mail.9yug.net', '2018-09-19 09:18:01'),
(60, 'student credential', 'welcome to  \r\nyour username=stu1_73  and password= 5953', 1, 'rahul@gmail.com', 'mail.9yug.net', '2019-03-22 09:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `log_outgoing_sms`
--

CREATE TABLE `log_outgoing_sms` (
  `id` int(20) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `school_id` int(20) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_outgoing_sms`
--

INSERT INTO `log_outgoing_sms` (`id`, `mobile`, `message`, `school_id`, `sender`, `date`) VALUES
(63, NULL, '', 1, 'navyug', '2018-09-06 10:05:10'),
(64, '7828161459', 'Welcome to ssm.dear student kanha  \r\nYour username=stu1_71 and password=40879.', 1, 'navyug', '2018-09-06 10:10:02'),
(65, '7828161459', 'Welcome to ssm.dear student viraj dobriyal  \r\nYour username=stu1_72 and password=46903.', 1, 'navyug', '2018-09-06 10:13:54'),
(66, NULL, '', 1, 'navyug', '2018-09-06 10:42:01'),
(67, '7828161459', 'hii', 1, 'navyug', '2018-09-06 11:13:35'),
(68, '9148725074', 'hii', 1, 'navyug', '2018-09-06 11:13:36'),
(69, '7828161459', 'hii', 1, 'navyug', '2018-09-06 11:14:16'),
(70, '9148725074', 'hii', 1, 'navyug', '2018-09-06 11:14:16'),
(71, '7828161459', 'hii', 1, 'navyug', '2018-09-06 11:14:42'),
(72, '9148725074', 'hii', 1, 'navyug', '2018-09-06 11:14:43'),
(73, '9148725074', 'dear {{customer_name your invoice is generated with {{ invoice_id.', 1, 'navyug', '2018-09-06 11:37:26'),
(74, '9148725074', 'dear pratap your invoice is generated with {id and total amount is 206.', 1, 'navyug', '2018-09-06 11:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `map_class_employee`
--

CREATE TABLE `map_class_employee` (
  `class_id` int(20) DEFAULT NULL,
  `employee_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_class_employee`
--

INSERT INTO `map_class_employee` (`class_id`, `employee_id`) VALUES
(10, 19),
(11, 27),
(11, 26);

-- --------------------------------------------------------

--
-- Table structure for table `map_class_subject`
--

CREATE TABLE `map_class_subject` (
  `class_id` int(20) DEFAULT NULL,
  `subject_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_class_subject`
--

INSERT INTO `map_class_subject` (`class_id`, `subject_id`) VALUES
(7, 11),
(7, 12),
(8, 13),
(9, 13),
(9, 14),
(10, 18),
(11, 15),
(11, 14);

-- --------------------------------------------------------

--
-- Table structure for table `map_parent_student`
--

CREATE TABLE `map_parent_student` (
  `parent_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='parent to student relation';

--
-- Dumping data for table `map_parent_student`
--

INSERT INTO `map_parent_student` (`parent_id`, `student_id`) VALUES
(3, 65),
(4, 65),
(5, 64);

-- --------------------------------------------------------

--
-- Table structure for table `map_school_admin`
--

CREATE TABLE `map_school_admin` (
  `school_id` int(20) DEFAULT NULL,
  `employee_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_school_admin`
--

INSERT INTO `map_school_admin` (`school_id`, `employee_id`) VALUES
(1, 1),
(4, 19),
(2, 20),
(3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `map_school_class`
--

CREATE TABLE `map_school_class` (
  `school_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_school_class`
--

INSERT INTO `map_school_class` (`school_id`, `class_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 9),
(4, 10),
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `map_school_employee`
--

CREATE TABLE `map_school_employee` (
  `school_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='school to trainer relation';

--
-- Dumping data for table `map_school_employee`
--

INSERT INTO `map_school_employee` (`school_id`, `employee_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 31),
(2, 31),
(2, 32),
(1, 7),
(1, 8),
(1, 9),
(1, 13),
(1, 14),
(4, 19),
(2, 20),
(NULL, 20),
(3, 21),
(NULL, 21),
(4, 22),
(4, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `map_school_parent`
--

CREATE TABLE `map_school_parent` (
  `parent_id` int(20) DEFAULT NULL,
  `school_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_school_parent`
--

INSERT INTO `map_school_parent` (`parent_id`, `school_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `map_school_sms_template`
--

CREATE TABLE `map_school_sms_template` (
  `school_id` int(20) DEFAULT NULL,
  `template_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `map_school_student`
--

CREATE TABLE `map_school_student` (
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='school to student relation';

--
-- Dumping data for table `map_school_student`
--

INSERT INTO `map_school_student` (`school_id`, `student_id`) VALUES
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 23),
(1, 25),
(1, 28),
(1, 29),
(1, 31),
(1, 32),
(1, 34),
(1, 35),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 59),
(1, 61),
(1, 62),
(1, 64),
(1, 65),
(1, 66),
(4, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73);

-- --------------------------------------------------------

--
-- Table structure for table `map_school_subject`
--

CREATE TABLE `map_school_subject` (
  `school_id` int(20) DEFAULT NULL,
  `subject_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_school_subject`
--

INSERT INTO `map_school_subject` (`school_id`, `subject_id`) VALUES
(1, 13),
(1, 14),
(1, 15),
(2, 17),
(4, 18),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `map_student_class`
--

CREATE TABLE `map_student_class` (
  `class_id` int(20) DEFAULT NULL,
  `student_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_student_class`
--

INSERT INTO `map_student_class` (`class_id`, `student_id`) VALUES
(2, 16),
(2, 17),
(1, 18),
(2, 19),
(3, 20),
(2, 22),
(2, 28),
(3, 28),
(2, 29),
(3, 29),
(1, 31),
(2, 31),
(1, 32),
(2, 32),
(3, 32),
(1, 34),
(2, 34),
(1, 35),
(2, 35),
(1, 53),
(1, 54),
(3, 55),
(1, 56),
(3, 56),
(1, 59),
(2, 59),
(1, 61),
(1, 62),
(2, 62),
(1, 64),
(1, 65),
(2, 65),
(1, 66),
(3, 66),
(10, 67),
(1, 68),
(1, 69),
(2, 69),
(2, 70),
(2, 71),
(3, 72),
(2, 73);

-- --------------------------------------------------------

--
-- Table structure for table `map_trainer_subject`
--

CREATE TABLE `map_trainer_subject` (
  `trainer_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='trainer to subject relation';

-- --------------------------------------------------------

--
-- Table structure for table `master_account_references`
--

CREATE TABLE `master_account_references` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_account_references`
--

INSERT INTO `master_account_references` (`id`, `name`) VALUES
(1, 'invoice'),
(2, 'receipt');

-- --------------------------------------------------------

--
-- Table structure for table `master_authorization`
--

CREATE TABLE `master_authorization` (
  `id` int(11) NOT NULL,
  `type` varchar(21) NOT NULL,
  `home` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_authorization`
--

INSERT INTO `master_authorization` (`id`, `type`, `home`) VALUES
(1, 'admin', 'school'),
(2, 'employee', 'school'),
(3, 'parent', 'school'),
(4, 'student', 'school'),
(5, 'superadmin', 'school');

-- --------------------------------------------------------

--
-- Table structure for table `master_cities`
--

CREATE TABLE `master_cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_cities`
--

INSERT INTO `master_cities` (`id`, `state_id`, `city_name`) VALUES
(1, 7, 'durg'),
(2, 7, 'raipur'),
(3, 8, 'bangalore'),
(4, 9, 'hyd');

-- --------------------------------------------------------

--
-- Table structure for table `master_country`
--

CREATE TABLE `master_country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_country`
--

INSERT INTO `master_country` (`id`, `country_name`) VALUES
(101, 'india'),
(102, 'aus'),
(103, 'pak'),
(104, 'nz');

-- --------------------------------------------------------

--
-- Table structure for table `master_enquiry`
--

CREATE TABLE `master_enquiry` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_enquiry`
--

INSERT INTO `master_enquiry` (`id`, `name`) VALUES
(1, 'complain'),
(2, 'order'),
(3, 'suggestion'),
(4, 'enquiry');

-- --------------------------------------------------------

--
-- Table structure for table `master_invoice`
--

CREATE TABLE `master_invoice` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice_id_mul` int(100) DEFAULT NULL,
  `price` varchar(100) NOT NULL DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_invoice`
--

INSERT INTO `master_invoice` (`id`, `name`, `invoice_id_mul`, `price`) VALUES
(21, 'chess', 1148, '188'),
(22, '', 1149, ''),
(23, 'chess', 1150, '100'),
(24, 'books', 1150, '150'),
(25, 'clothes', 1150, '250'),
(26, 're', 1151, '44'),
(27, 'er', 1151, '66'),
(28, '', 1151, ''),
(29, 'books', 1, '323'),
(30, 'ee', 1, '555'),
(31, 'ee', 1, '555'),
(32, 'ee', 1346, '555'),
(33, 'books', 1346, '500'),
(34, 'booksss', 1347, '400'),
(35, 'clo', 1347, '500'),
(37, 'dress', 1349, '4334'),
(38, 'ff', 1350, '55'),
(39, 'hindi books', 1351, '100'),
(40, 'maths', 1351, '200'),
(41, 'ewe', 1352, '500'),
(42, 'books', 1353, '500'),
(43, 'clothes', 1353, '400'),
(45, 'books', 1354, '500'),
(46, 'clothes', 1354, '1000'),
(47, 'xxx', 1354, '1200'),
(48, 'a', 1355, '1000'),
(49, 'fgfdg', 1356, '5555'),
(50, 'tretret', 1356, '6666'),
(51, 'asdfg', 1356, '4444'),
(52, 'rwerew', 1357, '100'),
(53, 'qwww', 1357, '200'),
(54, 'fsadfsd', 1357, '300'),
(55, 'www', 1358, '44'),
(56, 'wterser', 1358, '55'),
(57, 'fsdfsd', 1358, '100'),
(60, 'rwer', 1359, '555'),
(61, 'rr', 1359, '100'),
(62, 'tt', 1359, '200'),
(63, 'rr', 1359, '100'),
(64, 'tt', 1359, '200'),
(65, 'rr', 1359, '100'),
(66, 'tt', 1359, '200'),
(67, 'rr', 1359, '100'),
(68, 'tt', 1359, '200'),
(69, 'rr', 1359, '100'),
(70, 'tt', 1359, '200'),
(71, 'asdf', 1359, '100'),
(72, 'dasd', 1359, '200'),
(73, 'asp', 1359, '500'),
(74, 'jsp', 1359, '1000'),
(75, 'hindi', 1360, '300'),
(76, 'english', 1360, '600'),
(77, 'books', 1361, '1000'),
(78, 'var', 1362, '100'),
(79, 'fd', 1362, '300'),
(80, 'BOOK', 1363, '500'),
(81, 'TUTION', 1363, '600'),
(82, 'EEE', 1364, '200'),
(83, 'EEE', 1364, '200'),
(84, 'EEE', 1364, '200'),
(85, 'ddd', 1364, '2200'),
(86, 'rr', 1365, '222'),
(87, 'dfs', NULL, '5444'),
(88, 'ggg', NULL, '4534'),
(89, 'dfs', NULL, '5444'),
(90, 'ggg', NULL, '4534'),
(91, 'dfs', NULL, '5444'),
(92, 'ggg', NULL, '4534'),
(93, 'ert', NULL, '34534'),
(94, 'dfs', NULL, '5444'),
(95, 'ggg', NULL, '4534'),
(96, 'ert', NULL, '34534'),
(97, 'dfs', NULL, '5444'),
(98, 'ggg', NULL, '4534'),
(99, 'ert', NULL, '34534'),
(100, 'dfs', NULL, '5444'),
(101, 'ggg', NULL, '4534'),
(102, 'ert', NULL, '34534'),
(103, 'dfs', NULL, '5444'),
(104, 'ggg', NULL, '4534'),
(105, 'ert', NULL, '34534'),
(106, 'dfs', NULL, '5444'),
(107, 'ggg', NULL, '4534'),
(108, 'ert', NULL, '34534'),
(109, 'dfs', NULL, '5444'),
(110, 'ggg', NULL, '4534'),
(111, 'ert', NULL, '34534'),
(112, 'dfs', NULL, '5444'),
(113, 'ggg', NULL, '4534'),
(114, 'ert', NULL, '34534'),
(115, 'dfs', NULL, '5444'),
(116, 'ggg', NULL, '4534'),
(117, 'ert', NULL, '34534'),
(118, 'rrr', 1366, '200'),
(119, 'fdsfs', 1, '400'),
(120, 'rrr', 1, '200'),
(121, 'fdsfs', 1, '400'),
(122, 'rrr', 1, '200'),
(123, 'fdsfs', 1367, '400'),
(124, 'sdf', 1367, '34234'),
(125, 'dfsd', 1, '4324'),
(126, 'ewer', 1, '500'),
(127, 'trer', 1, '53453'),
(128, 'hindi book', 1, '300'),
(129, 'ggs', 1, '43423'),
(130, 'fsdf', 1, '3423'),
(131, 'gg', 1, '67687'),
(132, 'books', 1, '600'),
(133, 'copy', 1, '6009'),
(134, 'tv', 1370, '500'),
(135, 'hindi books', 1, '500'),
(136, 'hindi books', 1, '500'),
(137, 'hindi books', 1, '500'),
(138, 'hindi books', 1, '500'),
(139, 'hindi books', 1, '500'),
(140, 'hindi books', 1, '500'),
(141, 'hindi books', 1, '500'),
(142, 'hindi books', 1, '500'),
(143, 'hindi books', 1, '500'),
(144, 'hindi books', 1, '500'),
(145, 'hindi books', 1, '500'),
(146, 'fgf', 1, '78'),
(147, 'fgf', 1, '78'),
(148, 'fgf', 1, '78'),
(149, 'fgf', 1, '78'),
(150, 'fgf', 1, '78'),
(151, 'fgf', 1, '78'),
(152, 'fgf', 1, '78'),
(153, 'fgf', 1, '78'),
(154, 'book', 1371, '500'),
(155, 'er', 1371, '3000'),
(156, '', 1372, ''),
(157, 'CC', 1372, '3000'),
(158, 'cccc', 1373, '400'),
(159, 'bag', 1374, '490'),
(160, 'tre', 1374, '300'),
(161, 'tre', 1374, '300'),
(162, 'eager', 1375, '3000'),
(163, 'fruit', 1376, '300'),
(164, 'demo', 1377, '300'),
(165, 'demo', 1378, '300'),
(166, 'combo', 1379, '130'),
(167, 'ddd', 1380, '100'),
(168, 'bags', 1381, '2000'),
(169, 'door', 1382, '200'),
(170, 'books hindi', 1383, '206'),
(171, 'sdgvrth', 1384, '2'),
(172, 'dac', 1385, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `master_state`
--

CREATE TABLE `master_state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_state`
--

INSERT INTO `master_state` (`id`, `state_name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Islands', 101),
(2, 'Andhra Pradesh', 101),
(3, 'Arunachal Pradesh', 101),
(4, 'Assam', 101),
(5, 'Bihar', 101),
(6, 'Chandigarh', 101),
(7, 'Chhattisgarh', 101),
(8, 'Dadra and Nagar Haveli', 101),
(9, 'Daman and Diu', 101),
(10, 'Delhi', 101),
(11, 'Goa', 101),
(12, 'Gujarat', 101),
(13, 'Haryana', 101),
(14, 'Himachal Pradesh', 101),
(15, 'Jammu and Kashmir', 101),
(16, 'Jharkhand', 101),
(17, 'Karnataka', 101),
(18, 'Kenmore', 101),
(19, 'Kerala', 101),
(20, 'Lakshadweep', 101),
(21, 'Madhya Pradesh', 101),
(22, 'Maharashtra', 101),
(23, 'Manipur', 101),
(24, 'Meghalaya', 101),
(25, 'Mizoram', 101),
(26, 'Nagaland', 101),
(27, 'Narora', 101),
(28, 'Natwar', 101),
(29, 'Odisha', 101),
(30, 'Paschim Medinipur', 101),
(31, 'Pondicherry', 101),
(32, 'Punjab', 101),
(33, 'Rajasthan', 101),
(34, 'Sikkim', 101),
(35, 'Tamil Nadu', 101),
(36, 'Telangana', 101),
(37, 'Tripura', 101),
(38, 'Uttar Pradesh', 101),
(39, 'Uttarakhand', 101),
(40, 'Vaishali', 101),
(41, 'West Bengal', 101),
(42, 'xxx', 103),
(43, 'yyy', 102);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(12) NOT NULL,
  `type` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `authentication_id` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `permanent_address` text NOT NULL,
  `temporary_address` text NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `type`, `name`, `authentication_id`, `email`, `mobile`, `profile_image`, `permanent_address`, `temporary_address`, `created_at`, `modified_at`) VALUES
(1, 1, 'mui9m', 0, 'nani.param@gmail.com', '9827553996', NULL, 'bhiali charoda', 'bhiali charoda', '2018-07-21 05:48:40', '2018-07-21 05:48:40'),
(2, 1, 'surya', 0, 'vivek.eht1993@gmail.com', '9148725074', NULL, 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '2018-07-24 10:35:18', '2018-07-24 10:35:18'),
(4, 1, 'ravikishan', 0, 'vivek.et1993@gmail.com', '7828161459', 'avatar2.png', 'fsdfsdf', 'fsdfsdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'reshma', 0, 'vivek.et1993@gmail.com', '7828161459', NULL, 'dasda', 'sada', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parent_type`
--

CREATE TABLE `parent_type` (
  `id` int(13) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_type`
--

INSERT INTO `parent_type` (`id`, `type`) VALUES
(1, 'father'),
(2, 'mother'),
(3, 'gaurdian');

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` int(11) NOT NULL,
  `reciept_id` varchar(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `school_id` int(20) NOT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `organization_name` varchar(200) DEFAULT NULL,
  `organization_address` varchar(200) DEFAULT NULL,
  `organization_mobile` varchar(200) DEFAULT NULL,
  `organization_email` varchar(200) DEFAULT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payer_name` varchar(200) DEFAULT NULL,
  `payer_mobile` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciepts`
--

INSERT INTO `reciepts` (`id`, `reciept_id`, `student_id`, `total_amount`, `school_id`, `customer_name`, `mobile`, `email`, `organization_name`, `organization_address`, `organization_mobile`, `organization_email`, `customer_address`, `payment_method`, `payer_name`, `payer_mobile`, `date`) VALUES
(10, '73022', 17, '708', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'online', NULL, NULL, '2018-07-28 10:52:04'),
(11, '29124', 16, '19665', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'online', NULL, NULL, '2018-07-28 11:16:15'),
(16, '75920', 18, '500', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-07-28 17:15:41'),
(17, '27211', 18, '500', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-07-29 12:20:06'),
(18, '81361', 18, '500', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-01 16:34:36'),
(19, '73864', 18, '1000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-06 16:52:58'),
(20, '4589', 17, '1000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'swipe', NULL, NULL, '2018-08-06 17:03:37'),
(21, '81362', 16, '1000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-07 17:54:55'),
(22, '81363', 61, '30000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2018-08-10 18:55:01'),
(23, '81364', 17, '500', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-27 14:51:10'),
(24, '81365', 17, '500', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-27 14:51:10'),
(25, '81366', 17, '493', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-27 15:20:50'),
(32, '81373', 18, '300', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'online', NULL, NULL, '2018-08-28 11:51:35'),
(33, '81374', 18, '200', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '2018-08-28 12:28:47'),
(34, '81375', 63, '200', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', NULL, NULL, '2018-09-05 11:28:12'),
(35, '81376', 63, '200', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', NULL, NULL, '2018-09-05 11:33:07'),
(36, '81377', 63, '200', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', NULL, NULL, '2018-09-05 11:38:10'),
(37, '81378', 63, '200', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', NULL, NULL, '2018-09-05 11:40:10'),
(38, '81379', 63, '200', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', NULL, NULL, '2018-09-05 11:41:45'),
(39, '81380', 63, '200', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', NULL, NULL, '2018-09-05 11:42:40'),
(40, '81381', 63, '400', 1, NULL, '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', 'fef', '', '2018-09-05 11:45:12'),
(41, '81382', 63, '200', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', 'sdaas', '3242342', '2018-09-11 16:14:19'),
(42, '81383', 63, '200', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', 'ganesh', '4534534', '2018-09-11 16:15:39'),
(43, '81384', 63, '200', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', 'ganesh', '4534534', '2018-09-11 16:26:12'),
(44, '81385', 63, '300', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', '', '', '', '2018-09-11 16:26:59'),
(45, '81386', 63, '500', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', '', '', '2018-09-11 16:28:21'),
(46, '81387', 63, '500', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', 'cash', '', '', '2018-09-11 16:28:41'),
(47, '81388', 63, '100', 1, 'krishna', '7828161459', 'vivek.et1993@gmail.com', 'saraswati shishu mandir', 'bairanbazar', '1234567898', 'school@gmail.com', 'fsdfsdfsdfsd f', '', '', '', '2018-09-11 16:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `latlong` varchar(80) DEFAULT NULL,
  `contact_pri` varchar(13) DEFAULT NULL,
  `contact_sec` varchar(13) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='school details';

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `organization_name`, `address`, `latlong`, `contact_pri`, `contact_sec`, `email`, `logo`, `banner`, `city_id`, `state_id`, `country_id`, `created_at`, `modified_at`) VALUES
(1, 'saraswati shishu mandir', 'bairanbazar', '21.205909912324017 / 81.25572477246101', '1234567898', '1214312321', 'school@gmail.com', 'Koala4.jpg', 'Tulips3.jpg', 1, 7, 101, '2018-07-21 00:00:00', '2018-07-21 00:00:00'),
(2, 'ssm', 'rtrtrete', '21.199588292480975 / 81.23657447064693', '5435354354353', '3453453453454', 'umesh132200@gmail.com', '', '', 1, 7, 101, '2018-09-21 04:34:50', '2018-07-21 04:34:50'),
(3, 'SHASHIKALA SHRIVASTAVA', 'IN FRONNT OF SARASWATI SCHOOL WARD NO 9 STATION ROAD BARHI', '21.205269760602324 / 81.24224935437019', '1124345542', '', 'manish.mits.008@gmail.com', '', '', 1, 7, 101, '2018-08-06 01:47:28', '2018-08-06 01:47:28'),
(4, 'vivekanand high school', 'gfdgfd', '21.198227908532015 / 81.241810142644', '9148725074', '', 'vivek.et1993@gmail.com', '', '', 1, 7, 101, '2018-06-14 11:12:17', '2018-08-14 11:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `school_setting`
--

CREATE TABLE `school_setting` (
  `id` int(6) NOT NULL,
  `school_id` varchar(3) DEFAULT NULL,
  `menu` text,
  `invoice_template` varchar(5) DEFAULT NULL,
  `reciept_template` varchar(5) DEFAULT NULL,
  `library_due_day` varchar(7) DEFAULT '10',
  `fine` varchar(7) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_setting`
--

INSERT INTO `school_setting` (`id`, `school_id`, `menu`, `invoice_template`, `reciept_template`, `library_due_day`, `fine`) VALUES
(1, '1', '{\"student\":\"student\",\"dashboard\":\"dashboard\",\"account\":\"account\",\"staff\":\"employee\",\"classes\":\"classes\",\"subjects\":\"subjects\",\"parents\":\"parents\",\"ticket\":\"tickets\"}', NULL, NULL, '3', '2'),
(2, '2', '{\"dashboard\":\"dashboard\",\"staff\":\"employee\",\"ticket\":\"ticket\",\"account\":\"account\",\"customer\":\"customer\"}', NULL, NULL, '10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `classes` varchar(100) NOT NULL,
  `parent_id` int(16) DEFAULT NULL,
  `permanent_address` text NOT NULL,
  `temporary_address` text NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `p_city` varchar(20) DEFAULT NULL,
  `p_pincode` varchar(10) DEFAULT NULL,
  `t_city` varchar(30) DEFAULT NULL,
  `t_pincode` varchar(30) DEFAULT NULL,
  `aadhar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(2) DEFAULT '1',
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `mobile`, `classes`, `parent_id`, `permanent_address`, `temporary_address`, `profile_image`, `dob`, `blood_group`, `gender`, `p_city`, `p_pincode`, `t_city`, `t_pincode`, `aadhar`, `created_at`, `status`, `modified_at`) VALUES
(16, 'shubham', 'shu@gmail.com', '7979797980', '2', NULL, 'fsdfs', 'fsdfs', 'http://xschool.9yug.net/uploads/model15.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dd', '2018-09-11 10:19:46', '1', '2018-07-23 03:30:42'),
(17, 'vivek chourasiya', 'vivek.et1993@gmail.com', '7979797980', '2', NULL, 'ewfwe', 'ewfwe', 'http://xschool.9yug.net/uploads/controller14.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-10-22 19:52:07', '1', '2018-07-22 19:52:07'),
(18, 'aman sahu', 'aman@gmail.com', '123456789', '1', NULL, 'jabalpur', 'jabalpur', 'Lighthouse3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-30 08:13:01', '1', '2018-07-28 05:15:18'),
(19, 'manish', 'm@gmail.com', '7979797980', '2', NULL, 'dasdsadsa', 'dasdsadsa', 'Penguins1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-30 09:58:07', '1', '2018-07-30 06:42:19'),
(20, 'rajesh', 'e@gmail.com', '7979797980', '3', NULL, 'gdfgfd', 'gdfgfd', 'http://xschool.9yug.net/uploads/Capture2.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-01-30 06:44:13', '1', '2018-07-30 06:44:13'),
(28, 'sdfgsd', 'umesh132200@gmail.com', '1212133333', '2,3', NULL, 'dfsdf', 'fsdf', 'view6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-07-30 09:52:52', '1', '2018-07-30 09:52:52'),
(29, 'vikas', 'slkjaihaileds@gmail.com', '8319337577', '2,3', NULL, 'Samata Colony, B.M.Y. Charoda', 'Samata Colony, B.M.Y. Charoda', 'bal-gopal-hd-wallpaper.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-06 05:28:49', '1', '2018-08-06 05:28:49'),
(31, 'vikas', 'slkjaihaileds@gmail.com', '8319337577', '1,2', NULL, 'Samata Colony, B.M.Y. Charoda', 'Samata Colony, B.M.Y. Charoda', 'bal-gopal-hd-wallpaper1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-06 11:18:45', '1', '2018-08-06 11:18:45'),
(32, 'pintu', 'slkjaihailveds@gmail.com', '8319337577', '1,2,3', NULL, 'Samata Colony, B.M.Y. Charoda', 'Samata Colony, B.M.Y. Charoda', 'bal-gopal-hd-wallpaper2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-06 11:21:01', '1', '2018-08-06 11:21:01'),
(34, 'K. LAXMAN RAO', 'slkjaihaileds@gmail.com', '8319337577', '1,2', NULL, 'Samata Colony, B.M.Y. Charoda', 'Samata Colony, B.M.Y. Charoda', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-07 07:18:33', '1', '2018-08-07 07:18:33'),
(35, 'brijesh', 'vivek.et1993@gmail.com', '9148725074', '1,2', NULL, 'fdgdf', 'fdgdf', 'view.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-08 10:27:50', '1', '2018-08-08 10:26:14'),
(52, 'yagesh', 'vivek.et1993@gmail.com', '9148725074', '1', NULL, 'gfdg', 'gfdg', 'Chrysanthemum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-09 10:46:32', '1', '2018-08-09 10:46:32'),
(53, 'yagesh kumar', 'vivek.et1993@gmail.com', '9148725074', '1', NULL, 'gfdg', 'gfdg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 06:15:22', '1', '2018-08-09 10:47:01'),
(54, 'salman', 'vivek.et1993@gmail.com', '9148725074', '1', NULL, 'fsdsdf', 'fsdsdf', 'Desert.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-09 10:58:24', '1', '2018-08-09 10:58:24'),
(55, 'pratap', 'vivek.et1993@gmail.com', '9148725074', '3', NULL, 'fgdf', 'gdf', 'view1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 05:19:35', '1', '2018-08-10 05:19:35'),
(57, 'virendra', 'vivek.et1993@gmail.com', '7828161459', '1,2', NULL, 'sdgdsgsfdg', 'sdgdsgsfdg', 'Jellyfish.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 10:00:41', '1', '2018-08-10 10:00:41'),
(58, 'virendra', 'vivek.et1993@gmail.com', '7828161459', '1,2', NULL, 'sdgdsgsfdg', 'sdgdsgsfdg', 'Jellyfish1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 10:01:25', '1', '2018-08-10 10:01:25'),
(59, 'virendra', 'vivek.et1993@gmail.com', '7828161459', '1,2', NULL, 'sdgdsgsfdg', 'sdgdsgsfdg', 'Jellyfish2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 10:02:05', '1', '2018-08-10 10:02:05'),
(60, 'kashyap', 'vivek.et1993@gmail.com', '9148725074', '1', NULL, 'gdfgd', 'gdfgd', 'Desert1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 10:19:53', '1', '2018-08-10 10:19:53'),
(61, 'kashyap', 'vivek.et1993@gmail.com', '9148725074', '1', NULL, 'gdfgd', 'gdfgd', 'Desert2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 10:20:02', '1', '2018-08-10 10:20:02'),
(62, 'thakur', 'vivek.et1993@gmail.com', '7828161459', '1,2', NULL, 'vxcvxv', 'vxcvxv', 'Koala.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-10 10:29:25', '1', '2018-08-10 10:29:25'),
(63, 'punkaj', 'vivek.et1993@gmail.com', '9148725074', '1,3', NULL, 'gsdds', 'gsdds', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2019-03-28 05:09:39', '1', '2018-08-10 06:23:19'),
(64, 'manish kumar', 'vivek.et1993@gmail.com', '9148725074', '1', 5, 'fgdfgdf', 'fgdfgdf', 'Chrysanthemum1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-03 10:14:21', '1', '2018-08-10 13:31:26'),
(65, 'virendra', 'vivek.et1993@gmail.com', '9148725074', '1,2', 4, 'gdfgfd', 'gdfgfd', 'Penguins1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-03 10:07:12', '1', '2018-08-13 05:32:04'),
(66, 'ajit', 'vivek.et1993@gmail.com', '7828161459', '1,3', NULL, 'ytrty', 'ytrty', 'Jellyfish1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-13 12:58:26', '1', '2018-08-13 12:58:26'),
(67, 'rana', 'vivek.et1993@gmail.com', '9148725074', '10', NULL, 'fdfds', 'fdfds', 'Chrysanthemum3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-08-16 12:32:52', '1', '2018-08-16 12:32:52'),
(68, 'shubham kumar nayak ', 'vivek.et1993@gmail.com', '9148725074', '1', NULL, 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', '5dd9dc72c71a007c0b201f8fcdc8ea1f--marry-me-man-candy.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-05 11:19:25', '1', '2018-08-16 17:10:55'),
(69, 'umesh thakur', 'vivek.et1993@gmail.com', '7828161459', '1,2', NULL, 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', 'Shri Sai Krishna PG, 7th Cross Rd, Kundanhalli Gate, Marathalli, Bangalore, Karnataka (560066).', 'Koala2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-05 11:18:39', '1', '2018-08-17 04:57:05'),
(70, 'pratap singh', 'vivek.et1993@gmail.com', '7828161459', '2', NULL, 'fd', 'fds', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-06 10:05:09', '1', '2018-09-06 10:05:09'),
(71, 'kanha', 'vivek.et1993@gmail.com', '7828161459', '2', NULL, 'jagdalpur', 'jagdalpur', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-06 10:10:01', '1', '2018-09-06 10:10:01'),
(72, 'viraj dobriyal', 'vivek.et1993@gmail.com', '7828161459', '3', NULL, 'mandla', 'mandla', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-09-06 10:13:53', '1', '2018-09-06 10:13:53'),
(73, 'rahul', 'rahul@gmail.com', '2342342342', '2', NULL, 'supela ghadi chowk', 'supela ghadi chowk', '', '14/12/1993', 'A+', 'male', '', '324234', '', '', '23213213213', '2019-03-22 09:46:13', '1', '2019-03-22 09:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='subject list';

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `date`) VALUES
(13, 'maths', '2018-09-01 15:20:45'),
(14, 'Commerse', '2018-09-01 15:20:45'),
(15, 'bio', '2018-09-01 15:20:45'),
(17, 'com', '2018-09-01 15:20:45'),
(18, 'maths', '2018-09-01 15:20:45'),
(19, 'FME', '2018-09-15 12:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin_account_transaction`
--

CREATE TABLE `super_admin_account_transaction` (
  `id` int(20) NOT NULL,
  `debit` varchar(255) NOT NULL DEFAULT '0',
  `credit` varchar(255) NOT NULL DEFAULT '0',
  `refrence_type` int(10) NOT NULL,
  `school_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin_account_transaction`
--

INSERT INTO `super_admin_account_transaction` (`id`, `debit`, `credit`, `refrence_type`, `school_id`, `date`) VALUES
(1, '760', '0', 1, 1, '2018-08-18 09:04:27'),
(2, '0', '500', 2, 1, '2018-09-18 09:30:55'),
(3, '0', '1000', 2, 1, '2018-11-18 09:32:16'),
(4, '0', '500', 2, 2, '2018-12-18 09:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin_invoice`
--

CREATE TABLE `super_admin_invoice` (
  `id` int(20) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `school_id` int(20) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin_invoice`
--

INSERT INTO `super_admin_invoice` (`id`, `invoice_id`, `school_id`, `amount`, `date`) VALUES
(1, '1', 1, '500', '2018-08-18 08:52:21'),
(2, '2', 2, '1000', '2018-08-18 08:52:45'),
(3, '3', 1, '760', '2018-08-18 09:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin_order`
--

CREATE TABLE `super_admin_order` (
  `id` int(20) NOT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `port` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin_order`
--

INSERT INTO `super_admin_order` (`id`, `mobile_no`, `name`, `port`, `status`, `date`) VALUES
(1, '7828161459', 'vivek', '12', '1', '2018-08-21 11:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin_reciept`
--

CREATE TABLE `super_admin_reciept` (
  `id` int(20) NOT NULL,
  `school_id` int(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reciept_id` varchar(100) NOT NULL,
  `payer_name` varchar(100) DEFAULT NULL,
  `payer_mobile` varchar(255) DEFAULT NULL,
  `method` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin_reciept`
--

INSERT INTO `super_admin_reciept` (`id`, `school_id`, `amount`, `reciept_id`, `payer_name`, `payer_mobile`, `method`, `date`) VALUES
(2, 1, '1000', '9yug1', NULL, NULL, '', '2018-08-18 09:32:16'),
(3, 2, '500', '9yug2', NULL, NULL, '', '2018-08-18 09:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `table_count`
--

CREATE TABLE `table_count` (
  `id` int(20) NOT NULL,
  `student` int(20) NOT NULL,
  `subject` int(20) NOT NULL,
  `classes` int(20) NOT NULL,
  `employee` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template_email`
--

CREATE TABLE `template_email` (
  `id` int(20) NOT NULL,
  `school_id` int(20) NOT NULL,
  `module` varchar(100) NOT NULL,
  `context` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_email`
--

INSERT INTO `template_email` (`id`, `school_id`, `module`, `context`, `date`) VALUES
(1, 1, 'student add', 'welcome to {school_name }\r\nyour username={username } and password= {password}', '2018-08-10 12:05:17'),
(2, 1, 'employee add', 'Welcome to {school_name} \r\nYour username={username} and password={password}', '2018-08-10 12:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `template_sms`
--

CREATE TABLE `template_sms` (
  `id` int(20) NOT NULL,
  `school_id` int(20) NOT NULL,
  `context` text NOT NULL,
  `module` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_sms`
--

INSERT INTO `template_sms` (`id`, `school_id`, `context`, `module`, `date`) VALUES
(1, 1, 'Welcome to {school_name}.dear student {student_name}  \r\nYour username={username} and password={password}.', 'student add', '2018-08-10 09:48:23'),
(2, 1, 'dear {student_name} Thanks to visit {school_name} ', 'enquiry', '2018-08-10 10:49:23'),
(3, 1, 'Welcome to {school_name} \r\nYour username={username} and password={password}', 'employee add', '2018-08-10 12:18:24'),
(4, 4, 'Welcome to {school_name} \r\nYour username={username} and password={password}', 'employee add', '2018-08-10 12:18:24'),
(5, 1, 'dear {name} your invoice is generated with {id} and total amount is {total_amount}.', 'invoice add', '2018-09-06 11:39:01'),
(6, 1, 'dear {name} your invoice is generated with {id} any you paid {total_amount}.', 'reciept add', '2018-09-06 11:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `mobile`, `msg`) VALUES
(47, '7828161459', 'ddsd'),
(48, '7828161459', 'ddsd'),
(49, '9148725074', 'ddsd'),
(50, '7828161459', 'ddsd'),
(51, '9148725074', 'ddsd'),
(52, '9148725074', 'i am vivek'),
(53, '7828161459', 'i am vivek'),
(54, '7828161459', 'both'),
(55, '9148725074', 'both'),
(56, '9148725074', 'hii '),
(57, '7828161459', 'hii '),
(58, '9148725074', 'airtel'),
(59, '7828161459', 'emplyee and student'),
(60, '7828161459', 'emplyee and student'),
(61, '7828161459', 'emplyee and student'),
(62, '7828161459', 'emplyee and student');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_generate`
--

CREATE TABLE `ticket_generate` (
  `id` int(10) NOT NULL,
  `ticket_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` varchar(255) NOT NULL,
  `assign` varchar(20) NOT NULL,
  `status` enum('enable','disable','request to disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_generate`
--

INSERT INTO `ticket_generate` (`id`, `ticket_id`, `date`, `comment`, `assign`, `status`) VALUES
(1, 30, '2018-08-23 07:56:14', 'bjbjbjk', '1', 'disable'),
(2, 0, '2018-08-22 11:39:01', 'panel not open', '1', 'enable'),
(3, 30, '2018-08-23 07:56:14', 'sms not work', '1', 'disable'),
(4, 31, '2018-08-22 11:44:57', 'slow', '1', 'enable'),
(5, 32, '2018-08-23 07:52:42', 'not open panel', '1', 'disable'),
(6, 33, '2018-08-23 08:06:31', 'slow', '1', 'disable'),
(7, 34, '2018-08-22 18:30:00', 'dsfsdf', '1', 'enable'),
(8, 32, '2018-08-23 07:52:42', 'nooo', '1', 'disable'),
(9, 31, '2018-08-23 07:49:33', 'gfgdf', '4', 'enable'),
(10, 35, '2018-08-22 18:30:00', 'need school software', '1', 'enable'),
(11, 36, '2018-08-27 18:30:00', 'internet not working', '1', 'enable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balance_information`
--
ALTER TABLE `account_balance_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_category`
--
ALTER TABLE `books_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boucher`
--
ALTER TABLE `boucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration_email`
--
ALTER TABLE `configuration_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration_sms`
--
ALTER TABLE `configuration_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_node`
--
ALTER TABLE `credit_node`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_outgoing_email`
--
ALTER TABLE `log_outgoing_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_outgoing_sms`
--
ALTER TABLE `log_outgoing_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_account_references`
--
ALTER TABLE `master_account_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_authorization`
--
ALTER TABLE `master_authorization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `master_cities`
--
ALTER TABLE `master_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_country`
--
ALTER TABLE `master_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_enquiry`
--
ALTER TABLE `master_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_invoice`
--
ALTER TABLE `master_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_state`
--
ALTER TABLE `master_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_type`
--
ALTER TABLE `parent_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_setting`
--
ALTER TABLE `school_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin_account_transaction`
--
ALTER TABLE `super_admin_account_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin_invoice`
--
ALTER TABLE `super_admin_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin_order`
--
ALTER TABLE `super_admin_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin_reciept`
--
ALTER TABLE `super_admin_reciept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_count`
--
ALTER TABLE `table_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_email`
--
ALTER TABLE `template_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_sms`
--
ALTER TABLE `template_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_generate`
--
ALTER TABLE `ticket_generate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_balance_information`
--
ALTER TABLE `account_balance_information`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `account_transaction`
--
ALTER TABLE `account_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books_category`
--
ALTER TABLE `books_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boucher`
--
ALTER TABLE `boucher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `configuration_email`
--
ALTER TABLE `configuration_email`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configuration_sms`
--
ALTER TABLE `configuration_sms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `credit_node`
--
ALTER TABLE `credit_node`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- AUTO_INCREMENT for table `log_outgoing_email`
--
ALTER TABLE `log_outgoing_email`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `log_outgoing_sms`
--
ALTER TABLE `log_outgoing_sms`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `master_account_references`
--
ALTER TABLE `master_account_references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_cities`
--
ALTER TABLE `master_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_country`
--
ALTER TABLE `master_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `master_enquiry`
--
ALTER TABLE `master_enquiry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_invoice`
--
ALTER TABLE `master_invoice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `master_state`
--
ALTER TABLE `master_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parent_type`
--
ALTER TABLE `parent_type`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_setting`
--
ALTER TABLE `school_setting`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `super_admin_account_transaction`
--
ALTER TABLE `super_admin_account_transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `super_admin_invoice`
--
ALTER TABLE `super_admin_invoice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `super_admin_order`
--
ALTER TABLE `super_admin_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_admin_reciept`
--
ALTER TABLE `super_admin_reciept`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_count`
--
ALTER TABLE `table_count`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template_email`
--
ALTER TABLE `template_email`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `template_sms`
--
ALTER TABLE `template_sms`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `ticket_generate`
--
ALTER TABLE `ticket_generate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
