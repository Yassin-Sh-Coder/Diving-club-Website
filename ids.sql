-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 01:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ids`
--

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE `boats` (
  `boat_ID` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`boat_ID`, `name`, `description`, `photo`) VALUES
(1, 'Boaty McBoatface', 'A whimsical vessel with a quirky personality.', ''),
(2, 'Serenity', 'A vessel known for its adventures in the Firefly universe.', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_ID` bigint(20) NOT NULL,
  `category_ID` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` binary(1) DEFAULT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_ID`, `category_ID`, `description`, `name`, `destination`, `date_from`, `date_to`, `cost`, `status`, `photo`) VALUES
(28, 1, 'ffdd', 'dfdsf', NULL, '2024-08-07', '2024-08-15', NULL, 0x01, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_categories`
--

CREATE TABLE `events_categories` (
  `category_ID` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_categories`
--

INSERT INTO `events_categories` (`category_ID`, `name`) VALUES
(1, 'Drift Diving'),
(2, 'Deep Diving');

-- --------------------------------------------------------

--
-- Table structure for table `event_guides`
--

CREATE TABLE `event_guides` (
  `event_ID` bigint(20) DEFAULT NULL,
  `guide_ID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `event_ID` bigint(20) DEFAULT NULL,
  `member_ID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `photo_ID` bigint(20) NOT NULL,
  `photo` blob DEFAULT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `guide_ID` bigint(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`guide_ID`, `first_name`, `last_name`, `photo`) VALUES
(5, 'Yassin', 'sh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_ID` bigint(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `emergency_number` varchar(255) DEFAULT NULL,
  `joining_date` date NOT NULL,
  `photo` blob DEFAULT NULL,
  `proffession` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_ID`, `first_name`, `last_name`, `email`, `password`, `date_of_birth`, `gender`, `mobile_number`, `emergency_number`, `joining_date`, `photo`, `proffession`, `nationality`) VALUES
(3, 'Yassin', 'Shakhashiro', 'yshakhashiro@gmail.com', '$2y$10$ujt00sTT.wWbpvkLt/ZIl.Z03kt0vw/TVEQV5qtaUdAV9aNx6fcTe', '2024-08-01', 'F', '76071404', '76071404', '2024-08-06', NULL, NULL, NULL),
(4, 'Yassin', 'Shakhashiro', 'yshakhashiro@gmail.com', '$2y$10$oLa4z.kAd7t6rk6.F7UTfOo2PbRcMfwz8pMn59P.C49sMYAfBH4ba', '2024-08-01', 'F', '76071404', '76071404', '2024-08-06', NULL, NULL, NULL),
(6, 'Yassin', 'Shakhashiro', 'y@gmail.com', '$2y$10$cibffczV1d1SHHM/r7JOBusYPu4bvNiVYigUqSAN0Qp.5bBOSH4Fq', '2024-07-31', 'P', '76071404', '76071404', '2024-08-06', NULL, NULL, NULL),
(7, 'Yassin', 'Shakhashiro', 'y@gmail.com', '$2y$10$EyymcZMJg7MyvOjwgx1GbehNEICRXHkjjlr6EdLQAxE2z.bUAHUae', '2024-08-01', 'M', '76071404', '76071404', '2024-08-06', NULL, NULL, NULL),
(8, 'sad', 'Shakhashiro', 'y@gmail.com', '$2y$10$hFrydXTnXfQaCgqGWNq4wOkRaiXVODkQK5DQD7Cnagy3AIMKLvbl.', '2024-08-01', 'M', '76071404', '76071404', '2024-08-06', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`boat_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `events_categories`
--
ALTER TABLE `events_categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `event_guides`
--
ALTER TABLE `event_guides`
  ADD KEY `event_ID` (`event_ID`),
  ADD KEY `guide_ID` (`guide_ID`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD KEY `event_ID` (`event_ID`),
  ADD KEY `member_ID` (`member_ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`photo_ID`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`guide_ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boats`
--
ALTER TABLE `boats`
  MODIFY `boat_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `guide_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `events_categories` (`category_ID`);

--
-- Constraints for table `event_guides`
--
ALTER TABLE `event_guides`
  ADD CONSTRAINT `event_guides_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `events` (`event_ID`),
  ADD CONSTRAINT `event_guides_ibfk_2` FOREIGN KEY (`guide_ID`) REFERENCES `guides` (`guide_ID`);

--
-- Constraints for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `events` (`event_ID`),
  ADD CONSTRAINT `event_participants_ibfk_2` FOREIGN KEY (`member_ID`) REFERENCES `members` (`member_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
