-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 12:38 PM
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
(1, 'Q', 'QWERTYUIOP', 'A', '2021-05-30', NULL, '../images/uploads/IMG-60a6a31a3be1a4.37386426.png', 'host@host.com', 0),
(6, 'Cricket Championship', 'Cricket championship of BMSCE 2021', 'Main Ground', '2021-05-24', '06:30:00', '../images/uploads/IMG-60a95724042949.11772805.jpg', 'marnipraveen4581@gmail.com', 0),
(7, 'Treasure Hunt', 'A game in which players search for hidden objects by following a trail', 'auditorium-1', '2021-05-29', '10:30:00', '../images/uploads/IMG-60aa5ff27e5622.07003324.jpg', 'host1@gmail.com', 0),
(8, 'doge ball', 'abc', 'Main Ground', '2021-05-26', '12:00:00', '../images/uploads/IMG-60aa63d5723f12.40241274.jpg', 'host1@gmail.com', 0),
(9, 'Basket Ball', 'abc', 'Main Ground', '2021-04-15', '11:00:00', '../images/uploads/IMG-60aa68a769a1a8.22415976.jpg', 'host1@gmail.com', 0),
(10, 'Volley Ball', 'Volleyball, game played by two teams, usually of six players on a side', 'Main Ground', '2021-06-09', '17:25:00', '../images/uploads/IMG-60b763b4882886.54981667.jpg', 'amar@gmail.com', 0),
(11, 'Code Hunt', 'A 24 hr Online Coding Event', 'Online Event', '2021-06-12', '11:00:00', '../images/uploads/IMG-60b767d1c81193.91176227.png', 'amar@gmail.com', 0),
(12, 'Tennis', 'Singles,Doubles and Mixed Matches.', 'Main Ground', '2021-06-24', '16:00:00', '../images/uploads/IMG-60b76a08155ac6.08412868.jpg', 'amar@gmail.com', 1),
(13, 'Beat Boxing', 'Beatboxing is a form of vocal percussion', 'auditorium-1', '2021-06-30', '10:00:00', '../images/uploads/IMG-60b76ba9e47669.36042322.jpg', 'amar@gmail.com', 1),
(15, 'Quiz', 'Brain teasing maths questions to leave you thinking, winner takes home goodies', 'Indoor Stadium', '2021-06-25', '12:00:00', '../images/uploads/quiz.png', 'pentamaths@gmail.com', 1),
(16, 'Phase Shift', 'Phase Shift is an annual tech symposium of BMS College Of Engineering.', 'College ground', '2021-06-30', '08:00:00', '../images/uploads/pahseshift.jpg', 'bmsps@gmail.com', 1);

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
(13, 'altunvrs@gmail.com', 'ALTERNATE UNIVERSE', '1234Asdf'),
(4, 'amar@gmail.com', 'amar', 'Qwe12345'),
(8, 'bmsps@gmail.com', 'PHASE SHIFT', 'Poiu1234'),
(10, 'bullzR@gmail.com', 'BULLZ RACING', '1234Qwer'),
(3, 'host1@gmail.com', 'akash', 'asdfghJ1234'),
(1, 'host@host.com', 'host', 'Qwerty12'),
(7, 'ieee@gmail.com', 'IEEE', 'Xcvbn123'),
(2, 'marnipraveen4581@gmail.com', 'lahari', 'Asdfgh123'),
(6, 'nss@gmail.com', 'NSS', 'Zxcvb123'),
(12, 'pentamaths@gmail.com', 'PENTAGRAM', 'Maxcie123'),
(11, 'prakruthi@gmail.com', 'BMSCE PRAKRUTHI', 'Sad12344'),
(5, 'protocol@gmail.com', 'PROTOCOL', 'Azxcv123'),
(9, 'rota@gmail.com', 'ROTARACT', 'Poiu12345');

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE `mailing_list` (
  `mail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `slno` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`slno`, `event_id`, `student_id`) VALUES
(1, 16, 'stud@stud.com'),
(2, 9, 'chirag3@stud.com'),
(3, 9, 'tanmay@stud.com'),
(4, 9, 'umesh@gmail.com'),
(5, 9, 'viv9@gmail.com'),
(6, 6, 'viv9@gmail.com'),
(7, 6, 'sainath@gmail.com'),
(8, 6, 'marnipraveen4581@gmail.com'),
(9, 6, 'stud123@gmal.com'),
(10, 6, 'stud@stud.com'),
(11, 8, 'stud@stud.com'),
(12, 8, 'rahul4@stud.com'),
(13, 15, 'tanmay@stud.com'),
(14, 15, 'hans@gmail.com'),
(15, 7, 'rahul4@stud.com'),
(16, 7, 'stud123@gmal.com'),
(17, 10, 'tanmay@stud.com'),
(18, 11, 'chirag3@stud.com'),
(19, 12, 'rahul4@stud.com'),
(20, 11, 'marnipraveen4581@gmail.com'),
(21, 11, 'viv9@gmail.com'),
(22, 16, 'chirag3@stud.com'),
(23, 16, 'rahul4@stud.com'),
(24, 16, 'viv9@gmail.com'),
(25, 16, 'sainath@gmail.com'),
(26, 16, 'stud@stud.com'),
(27, 16, 'tanmay@stud.com'),
(28, 16, 'umesh@gmail.com'),
(29, 13, 'marnipraveen4581@gmail.com'),
(30, 13, 'umesh@gmail.com');

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
(5, 'chirag3@stud.com', 'Chirag', 'Sum12345', NULL),
(9, 'hans@gmail.com', 'Hanshika', 'Vas12345', NULL),
(2, 'marnipraveen4581@gmail.com', 'rahman', 'Asdfg123', NULL),
(7, 'rahul4@stud.com', 'Rahul', 'Qaz12345', NULL),
(10, 'sainath@gmail.com', 'Sainath', 'Fghjkl123', NULL),
(8, 'stud123@gmal.com', 'Mallikarjuna', 'Cvbnm123', NULL),
(1, 'stud@stud.com', 'student', 'Qwerty12', NULL),
(4, 'tanmay@stud.com', 'Tanmay', 'Sum67890', NULL),
(11, 'umesh@gmail.com', 'Umesh', 'Rtyu1234', NULL),
(3, 'viv9@gmail.com', 'vivek', 'Asdfgh123', NULL);

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
-- Indexes for table `mailing_list`
--
ALTER TABLE `mailing_list`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
