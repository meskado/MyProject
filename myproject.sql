-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 08:51 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `a2`
--

CREATE TABLE `a2` (
  `sn` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `8-10` varchar(10) DEFAULT NULL,
  `10-12` varchar(10) DEFAULT NULL,
  `12-2` varchar(10) DEFAULT NULL,
  `2-4` varchar(10) DEFAULT NULL,
  `4-6` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a2`
--

INSERT INTO `a2` (`sn`, `days`, `8-10`, `10-12`, `12-2`, `2-4`, `4-6`) VALUES
(1, 'Monday', 'PHY1103', 'MTH1101', 'PHY1101', NULL, NULL),
(2, 'Tuesday', NULL, NULL, NULL, NULL, NULL),
(3, 'Wednesday', NULL, NULL, NULL, NULL, NULL),
(4, 'Thursday', NULL, NULL, NULL, NULL, NULL),
(5, 'Friday', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `a4`
--

CREATE TABLE `a4` (
  `sn` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `8-10` varchar(10) DEFAULT NULL,
  `10-12` varchar(10) DEFAULT NULL,
  `12-2` varchar(10) DEFAULT NULL,
  `2-4` varchar(10) DEFAULT NULL,
  `4-6` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a4`
--

INSERT INTO `a4` (`sn`, `days`, `8-10`, `10-12`, `12-2`, `2-4`, `4-6`) VALUES
(1, 'Monday', 'BIO1101', NULL, 'GSS1103', NULL, NULL),
(2, 'Tuesday', NULL, NULL, NULL, NULL, NULL),
(3, 'Wednesday', NULL, NULL, NULL, NULL, NULL),
(4, 'Thursday', NULL, NULL, NULL, NULL, NULL),
(5, 'Friday', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admn`
--

CREATE TABLE `admn` (
  `Name` varchar(40) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `Mail` varchar(40) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admn`
--

INSERT INTO `admn` (`Name`, `PhoneNumber`, `Mail`, `UserName`, `Password`) VALUES
('Obidike Chukwuemeka Augustine', '08104827940', 'augustinemekus@gmail.com', 'meskado', 'chukwueme');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `SN` int(11) NOT NULL,
  `CourseCode` varchar(8) NOT NULL,
  `CourseTitle` varchar(40) NOT NULL,
  `CourseDes` varchar(80) DEFAULT NULL,
  `NoOfStudents` int(11) NOT NULL,
  `CourseType` varchar(20) NOT NULL,
  `Level` varchar(7) NOT NULL,
  `Dept` varchar(30) NOT NULL,
  `CourseHr` int(11) NOT NULL,
  `timeslot` varchar(6) NOT NULL,
  `room` varchar(20) NOT NULL,
  `Days` varchar(20) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`SN`, `CourseCode`, `CourseTitle`, `CourseDes`, `NoOfStudents`, `CourseType`, `Level`, `Dept`, `CourseHr`, `timeslot`, `room`, `Days`, `status`) VALUES
(8, 'GSS1101', 'USE OF ENGLISH AND COMMUNICATION SKILLS', '', 1000, 'GSS', 'Year1', 'computer science', 2, '10-12', 'ETF1', 'Wednesday', 'yes'),
(9, 'GSS1102', 'PHYLOSOPHY AND LOGIC', '', 500, 'GSS', 'Year1', 'computer science', 2, '10-12', 'ETF2', 'Monday', 'yes'),
(10, 'GSS1103', 'INTRODUCTION TO COMPUTER SCIENCE', '', 610, 'GSS', 'Year1', 'computer science', 2, '12-2', 'A4', 'Monday', 'yes'),
(11, 'MTH1101', 'GENERAL MATHEMATICS 1', '', 410, 'COMBINED', 'Year1', 'computer science', 2, '10-12', 'A2', 'Monday', 'yes'),
(14, 'PHY1101', 'GENERAL PHYSICS 1', '', 410, 'COMBINED', 'Year1', 'computer science', 2, '12-2', 'A2', 'Monday', 'yes'),
(15, 'PHY1103', 'PHYSICS PRACTICAL', '', 410, 'COMBINED', 'Year1', 'computer science', 2, '8-10', 'A2', 'Monday', 'yes'),
(16, 'CSC1101', 'PROBLEM SOLVING', '', 510, 'DEPT', 'Year1', 'computer science', 2, '8-10', 'ETF2', 'Tuesday', 'yes'),
(17, 'CHM1101', 'GENERAL CHEMISTRY', '', 510, 'COMBINED', 'Year1', 'computer science', 2, '2-4', 'ETF2', 'Thursday', 'yes'),
(18, 'BIO1101', 'GENERAL BIOLOGY', '', 610, 'COMBINED', 'Year1', 'computer science', 2, '8-10', 'A4', 'Monday', 'yes'),
(19, 'GSS2101', 'Peace and Conflict', '', 1000, 'GSS', 'Year2', 'micro biology', 2, '12-2', 'ETF1', 'Monday,Thursday', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `etf1`
--

CREATE TABLE `etf1` (
  `sn` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `8-10` varchar(10) DEFAULT NULL,
  `10-12` varchar(10) DEFAULT NULL,
  `12-2` varchar(10) DEFAULT NULL,
  `2-4` varchar(10) DEFAULT NULL,
  `4-6` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etf1`
--

INSERT INTO `etf1` (`sn`, `days`, `8-10`, `10-12`, `12-2`, `2-4`, `4-6`) VALUES
(1, 'Monday', NULL, NULL, 'GSS2101', NULL, NULL),
(2, 'Tuesday', NULL, NULL, NULL, NULL, NULL),
(3, 'Wednesday', NULL, 'GSS1101', NULL, NULL, NULL),
(4, 'Thursday', NULL, NULL, 'GSS2101', NULL, NULL),
(5, 'Friday', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etf2`
--

CREATE TABLE `etf2` (
  `sn` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `8-10` varchar(10) DEFAULT NULL,
  `10-12` varchar(10) DEFAULT NULL,
  `12-2` varchar(10) DEFAULT NULL,
  `2-4` varchar(10) DEFAULT NULL,
  `4-6` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etf2`
--

INSERT INTO `etf2` (`sn`, `days`, `8-10`, `10-12`, `12-2`, `2-4`, `4-6`) VALUES
(1, 'Monday', NULL, 'GSS1102', NULL, NULL, NULL),
(2, 'Tuesday', 'CSC1101', NULL, NULL, NULL, NULL),
(3, 'Wednesday', NULL, NULL, NULL, NULL, NULL),
(4, 'Thursday', NULL, NULL, NULL, 'CHM1101', NULL),
(5, 'Friday', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lectureroom`
--

CREATE TABLE `lectureroom` (
  `SN` int(11) NOT NULL,
  `building` varchar(40) NOT NULL,
  `room` varchar(40) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectureroom`
--

INSERT INTO `lectureroom` (`SN`, `building`, `room`, `capacity`) VALUES
(1, 'Education Block 1', 'A4', 610),
(11, 'ETF', 'ETF1', 1000),
(12, 'ETF', 'ETF2', 510),
(13, 'Education Block 1', 'A2', 420);

-- --------------------------------------------------------

--
-- Table structure for table `timetableofficer`
--

CREATE TABLE `timetableofficer` (
  `Name` varchar(40) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `Mail` varchar(40) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Dept` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetableofficer`
--

INSERT INTO `timetableofficer` (`Name`, `PhoneNumber`, `Mail`, `Username`, `Password`, `Dept`) VALUES
('Obidike Chukwuemeka Augustine', '08104827940', 'augustinemekus@gmail.com', 'meskado', 'emeka', ''),
('Obdike Obinna Jude', '08132139716', 'obainocarlos@gmail.com', 'obaino', 'obinna', 'Biological Science'),
('Obidike Chinaemerem Athanasius', '09055667788', 'athanasiusmerem@yahoo.com', 'naemere', 'china', 'Physics'),
('Obidike Obinna Jude', '08132139716', 'obainocarlos@gmail.com', 'obilo', 'obilo', 'Chemistry'),
('Obidike chinaemerem', '0989118888', 'm,skjchjhb', 'naemere', 'naeme', 'biochemistry'),
('Ofut Ogar T', '08187191791', 'euuhhfhgh', 'ofut', 'ofut', 'computer science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a2`
--
ALTER TABLE `a2`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `days` (`days`);

--
-- Indexes for table `a4`
--
ALTER TABLE `a4`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `days` (`days`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `etf1`
--
ALTER TABLE `etf1`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `days` (`days`);

--
-- Indexes for table `etf2`
--
ALTER TABLE `etf2`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `days` (`days`);

--
-- Indexes for table `lectureroom`
--
ALTER TABLE `lectureroom`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `room` (`room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lectureroom`
--
ALTER TABLE `lectureroom`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
