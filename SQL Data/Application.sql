-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2021 at 10:45 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Application`
--
ALTER TABLE `Application`
  ADD PRIMARY KEY (`Result_ID`),
  ADD KEY `Manager_Username` (`Manager_Username`),
  ADD KEY `College_Name` (`College_Name`,`Building_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Application`
--
ALTER TABLE `Application`
  MODIFY `Result_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Application`
--
ALTER TABLE `Application`
  ADD CONSTRAINT `Application_ibfk_1` FOREIGN KEY (`Manager_Username`) REFERENCES `Approval` (`Manager_Username`),
  ADD CONSTRAINT `Application_ibfk_2` FOREIGN KEY (`College_Name`,`Building_No`) REFERENCES `College` (`College_Name`, `Building_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
