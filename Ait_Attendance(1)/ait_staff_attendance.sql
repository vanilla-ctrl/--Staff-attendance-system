-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 12:36 PM
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
  `emp_id` int(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time_in` datetime(6) NOT NULL,
  `time_out` datetime(6) NOT NULL,
  `activity_id` int(10) NOT NULL,
  `comments` text NOT NULL,
  `date_submitted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emp_id`, `fname`, `lname`, `email`, `mobile`, `bdate`, `hiredate`, `role`, `password`) VALUES
(1, 'Ravina', 'Pathan', 'ravinapathan123@gmail.com', '7276402305', '1995-12-05', '2020-01-11', '', 'ff2a5d1d2612dff7ab77'),
(5, 'John', 'Smith', 'john@yahoo.com', '8796918086', '1997-10-05', '2017-01-01', 'admin', '3cd81a28ba5bf2b47d50'),
(6, 'Rocky', 'Gabriel', 'Gabriel@gmail.com', '9632145787', '1994-12-01', '2019-02-05', 'staff', '1aae5688d1d47035df8d'),
(7, 'Rachna', 'Gupta', 'rachna2399@yahoo.com', '7789456321', '1990-12-06', '2017-01-02', 'staff', 'b76a2197ef4d9000ec01'),
(8, 'Jasmin', 'Dsoza', 'jasmin@yahoo.com', '8963214578', '1997-05-12', '2020-11-04', 'staff', 'bc42b7096dbea907954b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_timesheet`
--
ALTER TABLE `attendance_timesheet`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
