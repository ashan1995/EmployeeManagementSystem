-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2018 at 08:18 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `empId` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `currentProject` int(50) NOT NULL,
  PRIMARY KEY (`empId`),
  UNIQUE KEY `username` (`username`),
  KEY `currentProject` (`currentProject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emptech_bridge`
--

DROP TABLE IF EXISTS `emptech_bridge`;
CREATE TABLE IF NOT EXISTS `emptech_bridge` (
  `emp_username` varchar(50) NOT NULL,
  `technologyId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `projectId` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`projectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_manager`
--

DROP TABLE IF EXISTS `project_manager`;
CREATE TABLE IF NOT EXISTS `project_manager` (
  `pmId` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `currentProject` int(50) NOT NULL,
  PRIMARY KEY (`pmId`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `currentProject` (`currentProject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

DROP TABLE IF EXISTS `technology`;
CREATE TABLE IF NOT EXISTS `technology` (
  `technologyId` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`technologyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tech_bridge`
--

DROP TABLE IF EXISTS `tech_bridge`;
CREATE TABLE IF NOT EXISTS `tech_bridge` (
  `technologyId` int(50) NOT NULL,
  `projectId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`currentProject`) REFERENCES `project` (`projectId`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`currentProject`) REFERENCES `project` (`projectId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
