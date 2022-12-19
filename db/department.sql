-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 05:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `department`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(5) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `categoryDesc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryDesc`) VALUES
(10, 'Moniter', 'This category for all types moniters '),
(11, 'Printer', 'jkvas'),
(14, 'ROUTER', 'THAT ROUTER ARE USE FOR ALL PEOPLE'),
(15, 'PROJECTOR', 'hbfyy');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `d_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hod_name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `totalsection` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`d_id`, `name`, `hod_name`, `description`, `totalsection`) VALUES
(1, 'IT', 'ABC', 'This is uvpce department', 1),
(2, 'CE', 'abc', 'rgtrtset', 1),
(4, 'ME', 'abc', 'This is Mechanical Engineering Branch.', 1),
(5, 'ICT', 'ads', 'nhbnu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceID` int(5) NOT NULL,
  `resourceName` varchar(50) NOT NULL,
  `resourceDesc` varchar(300) NOT NULL,
  `resourceMAC` varchar(50) NOT NULL,
  `resourceCompany` varchar(50) NOT NULL,
  `resourceCategory` int(5) NOT NULL,
  `resourceSection` int(5) NOT NULL,
  `r_condition` varchar(100) NOT NULL,
  `lastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceID`, `resourceName`, `resourceDesc`, `resourceMAC`, `resourceCompany`, `resourceCategory`, `resourceSection`, `r_condition`, `lastUpdated`) VALUES
(2, 'PC-1', 'ffdghbdfg', '10:1B:V1:J6:N7:N4', 'hp', 10, 44, 'Under Reparing', '2022-11-26 19:39:09'),
(4, ' PC 1', 'jgher', '11:11:12:22:21:22', 'hp', 10, 44, 'Repairable(With Worranty)', '2022-11-29 09:55:48'),
(13, 'Printer -2', 'this ', '00:00:0H:DH:FH:SA', 'DELL', 11, 44, 'Working', '2022-11-29 09:55:09'),
(14, 'MONITER-1', 'THIS IS STORE IN ROOM.', 'JH:DS:FN:NN:JF:FN', 'HP', 10, 50, 'Repairable(With Worranty)', '2022-11-29 09:58:55'),
(15, 'GNU WIFI', 'THIS IS OPEN AND FREE  WIFI.', '10:10:01:01:01:00', 'TP-LINKS', 14, 44, 'Working', '2022-11-29 10:11:11'),
(16, 'TP-01', 'THIS IS FOR PRINCIPAL', '00:00:00:00:00:11', 'TP-LINKS', 14, 43, 'Working', '2022-11-29 10:07:11'),
(17, 'PJ-1', 'YFBG', '09:09:09:09:09:09', 'hp', 15, 51, 'Working', '2022-11-29 13:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(5) NOT NULL,
  `d_id` int(100) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `sectionDesc` varchar(300) NOT NULL,
  `sectionCapacity` int(5) NOT NULL,
  `sectionAllocated` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `d_id`, `sectionName`, `sectionDesc`, `sectionCapacity`, `sectionAllocated`) VALUES
(43, 1, 'LAB 101', 'abc', 50, 1),
(44, 2, 'LAB 202', 'feaf', 50, 4),
(50, 4, 'Store Room', 'THIS IS ME SECTION.', 50, 1),
(51, 5, 'ROOM 101', 'jntysbuhse', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@gmail.com', 'admin'),
(2, 'abc', 'abc@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceID`),
  ADD UNIQUE KEY `resourceMAC` (`resourceMAC`),
  ADD KEY `resource_category` (`resourceCategory`),
  ADD KEY `resource_section` (`resourceSection`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resource_category` FOREIGN KEY (`resourceCategory`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `resource_section` FOREIGN KEY (`resourceSection`) REFERENCES `section` (`sectionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
