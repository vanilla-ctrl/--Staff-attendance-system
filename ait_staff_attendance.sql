-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 02:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ait_staff_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_timesheet`
--

CREATE TABLE `attendance_timesheet` (
  `attendance_id` int(11) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `regularize` tinyint(1) NOT NULL,
  `date_regularized` datetime DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `attendance_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_timesheet`
--

INSERT INTO `attendance_timesheet` (`attendance_id`, `emp_id`, `fname`, `email`, `role`, `shift`, `date`, `time_in`, `time_out`, `regularize`, `date_regularized`, `comment`, `attendance_status`) VALUES
(1, 21, 'Hitesh', 'hitesh@gmail.com', 'staff', 'shift 1', '2021-01-06', '2021-01-06 08:57:40', '2021-01-06 09:30:37', 0, NULL, '', ''),
(2, 19, 'John', 'Johny@gmail.com', 'pantry', 'shift 2', '2021-01-06', '2021-01-06 09:02:31', '2021-01-06 11:05:53', 1, '2021-01-07 09:27:31', 'Hiiiiiiiii', ''),
(4, 22, 'Nagma', 'nagma@gmail.com', 'staff', 'shift 1', '2021-01-06', '2021-01-06 09:09:30', '2021-01-06 09:12:19', 1, NULL, 'Hi...Regularize me', ''),
(6, 18, 'TestUser', 'test@gmail.com', 'pantry', 'shift 1', '2021-01-06', '2021-01-06 09:24:53', '2021-01-06 09:34:09', 0, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `emp_id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `bdate` varchar(10) NOT NULL,
  `hiredate` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emp_id`, `fname`, `lname`, `email`, `mobile`, `bdate`, `hiredate`, `role`, `password`) VALUES
(17, 'Gabriel', 'Test', 'Gabriel@gmail.com', '7896541236', '1999-12-05', '2020-01-01', 'Admin', 'f925916e2754e5e03f75dd58a5733251'),
(18, 'TestUser', 'Demo', 'test@gmail.com', '7896541236', '1996-01-01', '2020-01-01', 'Intern', '448ddd517d3abb70045aea6929f02367'),
(19, 'John', 'Smith', 'Johny@gmail.com', '9673330991', '1998-01-01', '2020-02-04', 'Intern', '202cb962ac59075b964b07152d234b70'),
(20, 'Hrithik', 'Roshan', 'admin@yahoo.com', '9988776655', '1980-01-02', '2019-02-10', 'Admin', '21232f297a57a5a743894a0e4a801fc3'),
(21, 'Hitesh', 'Karamchandani', 'hitesh@gmail.com', '7788996655', '1999-01-05', '2020-02-01', 'Intern', '80e2235fd9a018996178a07a6a3f4fff'),
(22, 'Nagma', 'Hanif', 'nagma@gmail.com', '8897859687', '1996-01-02', '2020-02-01', 'Intern', '25b9fd83b17432351c840abb1d3f6f6d'),
(23, 'Ravina', 'Pathan', 'ravina@aitglobal.com', '8523697410', '1999-02-10', '2020-01-11', 'Admin', '050b71bb519eab60805642dad94e8780'),
(24, 'gimmy', 'pandey', 'gimmy@gmail.com', '9654789321', '1966-01-01', '2019-01-02', 'Pantry', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_timesheet`
--
ALTER TABLE `attendance_timesheet`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `Test` (`emp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_timesheet`
--
ALTER TABLE `attendance_timesheet`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_timesheet`
--
ALTER TABLE `attendance_timesheet`
  ADD CONSTRAINT `Test` FOREIGN KEY (`emp_id`) REFERENCES `users` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
