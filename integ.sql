-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 05:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integ`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignstudent`
--

CREATE TABLE `assignstudent` (
  `id` int(11) NOT NULL,
  `fassigns` varchar(80) NOT NULL,
  `assignstudents` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignstudent`
--

INSERT INTO `assignstudent` (`id`, `fassigns`, `assignstudents`) VALUES
(1, 'Ellisa Rivero N. === IPT Advance Database', '2021-0001 John Paul Colita'),
(2, 'Ellisa Rivero N. === IPT Advance Database', '2021-0002 Vinnize Pilapil'),
(3, 'Ellisa Rivero N. === IPT Advance Database', '2021-0003 Zen Rae Candia'),
(4, 'Ellisa Rivero N. === IPT Advance Database', '2021-004 Jethro Malabar'),
(5, 'Ellisa Rivero N. === ITP-22 HCI', '2021-004 Jethro Malabar'),
(6, 'Jason Jacobe A. === ITP-111 Basic Proramming', '2021-0002 Vinnize Pilapil'),
(7, 'Jason Jacobe A. === ITP122 Integrative', '2021-0003 Zen Rae Candia');

-- --------------------------------------------------------

--
-- Table structure for table `assignsubject`
--

CREATE TABLE `assignsubject` (
  `id` int(11) NOT NULL,
  `faculty` varchar(80) NOT NULL,
  `subject` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignsubject`
--

INSERT INTO `assignsubject` (`id`, `faculty`, `subject`) VALUES
(18, 'Ellisa Rivero N.', 'ITP-22 HCI'),
(19, 'Jason Jacobe A.', 'ITP-111 Basic Proramming'),
(20, 'Ellisa Rivero N.', 'IPT Advance Database'),
(21, 'Jason Jacobe A.', 'ITP122 Integrative');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay_id` varchar(40) NOT NULL,
  `barangay` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay_id`, `barangay`) VALUES
(2, '1', 'matiao'),
(3, '2', 'dahican');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course`) VALUES
(10, 'BSCE'),
(16, 'BSIT'),
(17, 'BSM'),
(18, 'BITM');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `middlename` varchar(40) NOT NULL,
  `dbirth` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `institute` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `number` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `lastname`, `firstname`, `middlename`, `dbirth`, `gender`, `institute`, `course`, `number`) VALUES
('1', 'Ellisa', 'Rivero', 'N.', '2023-11-22', 'Female', 'FCDSET', 'BSCE', '09756657044'),
('2', 'Jason', 'Jacobe', 'A.', '2023-11-22', 'Male', 'FCDSET', 'BSIT', '0977397555');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `code_id` int(11) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `yearlevel` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`code_id`, `id`, `name`, `course`, `section`, `yearlevel`, `code`, `description`, `time`, `grade`) VALUES
(1, '2021-0001', 'John Paul Colita', 'BSIT', 'SECTION A', '3rd Year', 'ITP123', 'Integrative', '21:32', '1'),
(2, '2021-0002', 'Vinnize Pilapil', 'BSIT', 'SECTION A', '3rd Year', 'ITP123', 'Integrative', '21:35', '1'),
(3, '2021-0003', 'Zen Rae Candia', 'BSIT', 'SECTION A', '3rd Year', 'ITP123', 'Integrative', '21:38', '1'),
(4, '2021-0004', 'Jethro Malabar', 'BSIT', 'SECTION A', '3rd Year', 'ITP123', 'Integrative', '21:39', '1'),
(5, '2021-0001', 'John Paul Colita', 'BSIT', 'SECTION A', '3rd Year', 'ITP', 'ADVANCE DATABASE', '06:43', '1'),
(6, '2021-0002', 'Vinnize Pilapil', 'BSIT', 'SECTION A', '3rd Year', 'ITP', 'ADVANCE DATABASE', '21:42', '1'),
(7, '2021-0003', 'Zen Rae Candia', 'BSIT', 'SECTION A', '3rd Year', 'ITP', 'ADVANCE DATABASE', '11:59', '1'),
(8, '2021-0004', 'Jethro Malabar', 'BSIT', 'SECTION A', '3rd Year', 'ITP', 'ADVANCE DATABASE', '13:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `id` int(11) NOT NULL,
  `institute` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`id`, `institute`) VALUES
(10, 'FCDSET');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `usertype` varchar(70) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(5, 'john paul', 'colita0988', 'admin'),
(7, 'vinnize', 'pilapil0988', 'admin'),
(8, 'zen rae', 'candia0988', 'admin'),
(9, 'jethro', 'malabar0988', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `loginfaculty`
--

CREATE TABLE `loginfaculty` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL DEFAULT 'faculty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginfaculty`
--

INSERT INTO `loginfaculty` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'johnpaul', 'faculty0123', 'faculty'),
(2, 'vinnize', 'faculty02', 'faculty'),
(3, 'zen rae', 'faculty03', 'faculty'),
(4, 'jethro', 'faculty04', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `id` int(11) NOT NULL,
  `municipality_id` varchar(40) NOT NULL,
  `municipality` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`id`, `municipality_id`, `municipality`) VALUES
(1, '1', 'Baganga'),
(2, '2', 'Banaybanay'),
(3, '3', 'Boston'),
(4, '4', 'Caraga'),
(5, '5', 'Cateel'),
(6, '6', 'Governor Generoso'),
(7, '7', 'Lupon'),
(8, '8', 'Manay'),
(9, '9', 'City Of Mati'),
(10, '10', 'San Isidro'),
(11, '11', 'Tarragona');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_id` varchar(40) NOT NULL,
  `province` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_id`, `province`) VALUES
(1, '1', 'Davao Oriental');

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` int(11) NOT NULL,
  `year` varchar(9) NOT NULL,
  `semester` enum('1st','2nd','Summer') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `year`, `semester`, `status`) VALUES
(4, '2021-2022', '1st', 'active'),
(5, '2021-2022', '2nd', 'active'),
(6, '2022-2023', '1st', 'inactive'),
(7, '2022-2023', '2nd', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `middlename` varchar(40) NOT NULL,
  `dbirth` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `province` varchar(40) NOT NULL,
  `municipality` varchar(40) NOT NULL,
  `barangay` varchar(40) NOT NULL,
  `zipcode` varchar(40) NOT NULL,
  `number` varchar(40) NOT NULL,
  `institute` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `gname` varchar(40) NOT NULL,
  `gnumber` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `middlename`, `dbirth`, `gender`, `province`, `municipality`, `barangay`, `zipcode`, `number`, `institute`, `course`, `gname`, `gnumber`, `address`) VALUES
('2021-0001', 'John Paul ', 'Colita', 'cuadrasal', '2002-10-19', 'Male', 'Davao Oriental', 'City Of Mati', 'matiao', '8200', '09756657044', 'FCDSET', 'BSIT', 'mama', '09756657044', 'matiao'),
('2021-0002', 'Vinnize', 'Pilapil', 'N/A', '2023-11-22', 'Male', 'Davao Oriental', 'Lupon', 'matiao', '8200', '09756657044', 'FCDSET', 'BSIT', 'mama', '09756657044', 'matiao'),
('2021-0003', 'Zen Rae', 'Candia', 'N/A', '2023-11-22', 'Male', 'Davao Oriental', 'Baganga', 'matiao', '8200', '09756657044', 'FCDSET', 'BSIT', 'mama', '09756657044', 'matiao'),
('2021-004', 'Jethro', 'Malabar', 'N/A', '2023-11-22', 'Male', 'Davao Oriental', 'City Of Mati', 'dahican', '8200', '09756657044', 'FCDSET', 'BSCE', 'mama', '09756657044', 'matiao');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `code` varchar(40) NOT NULL,
  `description` varchar(40) NOT NULL,
  `unit` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `institute` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `description`, `unit`, `type`, `course`, `institute`) VALUES
('IPT', 'Advance Database', '3 unit', 'Laboratory', 'BSIT', 'FCDSET'),
('ITP-111', 'Basic Proramming', '3 unit', 'Lecture', 'BSIT', 'FCDSET'),
('ITP-22', 'HCI', '3 unit', 'Lecture', 'BSCE', 'FCDSET'),
('ITP122', 'Integrative', '3 unit', 'Lecture', 'BSIT', 'FCDSET');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(6, 'johnpaul', 'Colita0123', 'colitajohnpaul2@gmail.com'),
(7, 'vinnize', 'vin012', 'vinnize@gmail.com'),
(8, 'zen rae', 'zen01', 'zenrae@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignstudent`
--
ALTER TABLE `assignstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignsubject`
--
ALTER TABLE `assignsubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginfaculty`
--
ALTER TABLE `loginfaculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignstudent`
--
ALTER TABLE `assignstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assignsubject`
--
ALTER TABLE `assignsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loginfaculty`
--
ALTER TABLE `loginfaculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
