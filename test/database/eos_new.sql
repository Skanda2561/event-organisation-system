-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 01:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eos`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(75) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `event_venue` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `event_img` varchar(255) DEFAULT NULL,
  `hosted_by` varchar(100) NOT NULL,
  `event_upcoming` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_desc`, `event_venue`, `date`, `time`, `event_img`, `hosted_by`, `event_upcoming`) VALUES
(1, 'Q', 'QWERTYUIOP', 'A', '2021-05-30', NULL, '../images/uploads/IMG-60a6a31a3be1a4.37386426.png', 'host@host.com', 1),
(2, 'Q', 'QWERTYUIOP', 'A', '2021-05-30', '19:07:00', '../images/uploads/IMG-60a6a31a3be1a4.37386426.png', 'host@host.com', 1),
(3, 'Q', 'QWERTYUIOPzdgsrg', 'eqrwte', '2021-05-19', '07:27:00', NULL, 'host@host.com', 0),
(4, 'tukgt', 'yfuggkf', '7tii', '2021-05-02', '23:25:00', '../images/uploads/IMG-60a6a29a4a7a86.13088193.jpg', 'host@host.com', 0),
(5, 't77oiu7ofyvy', 'toguyofoyfy', 'yurid', '2021-05-23', '23:27:00', '../images/uploads/IMG-60a6a31a3be1a4.37386426.png', 'host@host.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `slno` int(11) NOT NULL,
  `host_id` varchar(75) NOT NULL,
  `host_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`slno`, `host_id`, `host_name`, `password`) VALUES
(1, 'host@host.com', 'host', 'Qwerty12');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `event_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`event_id`, `student_id`) VALUES
(1, 'stud@stud.com'),
(1, 'stud@stud.com'),
(1, 'stud@stud.com'),
(1, 'stud@stud.com'),
(1, 'stud@stud.com'),
(1, 'stud@stud.com'),
(4, 'stud@stud.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `slno` int(11) NOT NULL,
  `student_id` varchar(75) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `student_usn` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`slno`, `student_id`, `student_name`, `password`, `student_usn`) VALUES
(1, 'stud@stud.com', 'student', 'Qwerty12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `hosted_by` (`hosted_by`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`host_id`),
  ADD UNIQUE KEY `slno` (`slno`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `slno` (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`hosted_by`) REFERENCES `host` (`host_id`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
