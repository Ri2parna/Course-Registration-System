-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2019 at 07:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TU_Student_Data`
--

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Enrollment_No` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL DEFAULT 'password',
  `First_Name` varchar(30) DEFAULT NULL,
  `Last_Name` varchar(30) DEFAULT NULL,
  `Department` varchar(15) DEFAULT NULL,
  `Semester` int(2) DEFAULT NULL,
  `Journal_Number` varchar(30) DEFAULT NULL,
  `SGPA` float DEFAULT NULL,
  `CGPA` float DEFAULT NULL,
  `Category` varchar(10) DEFAULT NULL,
  `Fee_Amount` float DEFAULT NULL,
  `Subject_1` varchar(50) DEFAULT NULL,
  `Subject_2` varchar(50) DEFAULT NULL,
  `Subject_3` varchar(50) DEFAULT NULL,
  `Subject_4` varchar(50) DEFAULT NULL,
  `Subject_5` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Enrollment_No`, `Password`, `First_Name`, `Last_Name`, `Department`, `Semester`, `Journal_Number`, `SGPA`, `CGPA`, `Category`, `Fee_Amount`, `Subject_1`, `Subject_2`, `Subject_3`, `Subject_4`, `Subject_5`) VALUES
('CBP123', '123456', 'Jatin', 'Jalal', 'Department', 4, 'Journal_Number', 5, 7, 'sc', 20000, 'CO-100', 'CO-100', 'ME-101', 'ME-101', 'ME-101'),
('CSB17018', 'test', '', '', 'Department', 2, 'Journal_Number', 6, 3.95, 'Chill', 20090, 'CO204', 'CO-100', 'CO-100', 'CO-100', 'CO-100'),
('CSB17020', '12345', 'Rituparna', 'Das', 'CSE', 5, 'abcde1234', 4, 4, 'OBC', 6, 'Val09', NULL, 'ME-101', 'CO204', 'CO-100'),
('CSB17037', 'xyz', 'Neeraj', 'Chetia', 'CSE', 5, 'abcde1234', 8, 8, 'Gen', 20544, NULL, NULL, NULL, NULL, NULL),
('CSM17074', 'xyz', 'Akash', 'Singh', 'CSE', 5, 'tuctfactiv', 9, 9, 'Gen', 10110, 'CO-100', 'CO204', 'CO204', 'ME303', 'ME-101');

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `Department` varchar(15) NOT NULL,
  `Course_Code` varchar(30) NOT NULL,
  `Course_Title` varchar(40) NOT NULL,
  `Course_Credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`Department`, `Course_Code`, `Course_Title`, `Course_Credit`) VALUES
('CSE', 'CO-100', 'Intoductory Mechanics', 3),
('CSE', 'CO204', 'Computing Fundamentals', 8),
('Mechanical', 'ME-101', 'Mechanical Science', 6),
('Mechanical', 'ME303', 'Manufacturing Technology -2', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Enrollment_No`);

--
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`Course_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
