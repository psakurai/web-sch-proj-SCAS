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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Academic_Information`
--
ALTER TABLE `Academic_Information`
  MODIFY `InfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Academic_Information`
--
ALTER TABLE `Academic_Information`
  ADD CONSTRAINT `Academic_Information_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
