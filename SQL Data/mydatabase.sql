-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2021 at 11:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Academic_Information`
--

CREATE TABLE `Academic_Information` (
  `InfoID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Study_Level` varchar(255) NOT NULL,
  `Year` int(11) NOT NULL,
  `Semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Academic_Information`
--

INSERT INTO `Academic_Information` (`InfoID`, `Username`, `Study_Level`, `Year`, `Semester`) VALUES
(1, 'John', 'Undergraduate', 1, 2),
(2, 'Kevin', 'Master', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Application`
--

CREATE TABLE `Application` (
  `Result_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `College_Name` varchar(255) NOT NULL,
  `Building_No` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Manager_Username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Application`
--

INSERT INTO `Application` (`Result_ID`, `Username`, `College_Name`, `Building_No`, `Status`, `Manager_Username`) VALUES
(1, 'John', 'KTDI', 'MA1', 0, 'Alex'),
(2, 'Kevin', 'KTC', 'S40', 0, 'Alex');

-- --------------------------------------------------------

--
-- Table structure for table `Approval`
--

CREATE TABLE `Approval` (
  `Manager_Username` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Approval`
--

INSERT INTO `Approval` (`Manager_Username`, `Username`) VALUES
('Alex', 'Alex');

-- --------------------------------------------------------

--
-- Table structure for table `College`
--

CREATE TABLE `College` (
  `College_Name` varchar(255) NOT NULL,
  `Building_No` varchar(255) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `College`
--

INSERT INTO `College` (`College_Name`, `Building_No`, `Capacity`) VALUES
('KTC', 'S40', 200),
('KTDI', 'MA1', 200);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `User_Level` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Phone_No` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Username`, `Password`, `User_Level`, `First_Name`, `Last_Name`, `Phone_No`, `Email`, `Address`) VALUES
('Alex', 'A123', 'Manager', 'Alex', 'Baker', '011-23457861', 'alex@unsourced.com', 'Bdr 2, jalan 2, Perak'),
('Gatot', 'G123', 'Admin', 'Gatot', 'Granbell', '013-42565722', 'gatot@unsourced.com', 'Bdr 3, jalan 3, Pahang'),
('John', 'J123', 'Student', 'John', 'Smith', '011-12345678', 'john@unsourced.com', 'Bdr 1, jalan 1, Johor'),
('Kevin', 'K123', 'Student', 'Kevin', 'Esgafa', '011-23457261', 'kevin@unsourced.com', 'Bdr 4, jalan 4, Kelantan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Academic_Information`
--
ALTER TABLE `Academic_Information`
  ADD PRIMARY KEY (`InfoID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `Application`
--
ALTER TABLE `Application`
  ADD PRIMARY KEY (`Result_ID`),
  ADD KEY `Manager_Username` (`Manager_Username`),
  ADD KEY `College_Name` (`College_Name`,`Building_No`);

--
-- Indexes for table `Approval`
--
ALTER TABLE `Approval`
  ADD PRIMARY KEY (`Manager_Username`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `College`
--
ALTER TABLE `College`
  ADD PRIMARY KEY (`College_Name`,`Building_No`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Academic_Information`
--
ALTER TABLE `Academic_Information`
  MODIFY `InfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Application`
--
ALTER TABLE `Application`
  MODIFY `Result_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Academic_Information`
--
ALTER TABLE `Academic_Information`
  ADD CONSTRAINT `Academic_Information_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`);

--
-- Constraints for table `Application`
--
ALTER TABLE `Application`
  ADD CONSTRAINT `Application_ibfk_1` FOREIGN KEY (`Manager_Username`) REFERENCES `Approval` (`Manager_Username`),
  ADD CONSTRAINT `Application_ibfk_2` FOREIGN KEY (`College_Name`,`Building_No`) REFERENCES `College` (`College_Name`, `Building_No`);

--
-- Constraints for table `Approval`
--
ALTER TABLE `Approval`
  ADD CONSTRAINT `Approval_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
