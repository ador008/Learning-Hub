-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 08:01 AM
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
-- Database: `hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `chaptername`
--

CREATE TABLE `chaptername` (
  `id` int(5) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `chapter` varchar(50) NOT NULL,
  `chapter_number` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chaptername`
--

INSERT INTO `chaptername` (`id`, `subject`, `chapter`, `chapter_number`) VALUES
(1, 'Object Oriented Programming (520203)', 'Introduction', 1),
(2, 'Object Oriented Programming (520203)', 'What is Object', 2),
(3, 'Object Oriented Programming (520203)', 'Conclusion', 3),
(4, 'Algorithms', 'Intro to Algos', 1),
(5, 'Algorithms', 'Difficulties', 2),
(6, 'Calculus (510205)', 'introduction to calculus', 1),
(7, 'Calculus (510205)', 'intrigation', 2),
(8, 'Calculus (510205)', 'differenciation', 3);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(5) NOT NULL,
  `semester_no` int(2) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester_no`, `subject`) VALUES
(1, 1, 'Structured programming Language (520201)'),
(2, 1, 'Electrical And Electronic Circuit (510203)'),
(3, 1, 'Calculus (510205)'),
(4, 2, 'Digital System Design (510221)'),
(5, 2, 'Discrete Mathematics (510223)'),
(6, 2, 'Linear Algebra (510225)'),
(7, 3, 'Data Structure (520201)'),
(8, 3, 'Object Oriented Programming (520203)'),
(9, 3, 'Computer Architecture (520205)'),
(10, 1, 'Physics (510207)'),
(11, 1, 'English (510209)'),
(12, 4, 'Database Management System'),
(13, 4, 'Microprocessor And Assembly Language'),
(14, 2, 'Statistics And Probability (510227)'),
(15, 2, 'History Of Independent Bangladesh (510229)'),
(16, 3, 'Ordinary Differential Equation (520207)'),
(17, 3, 'Fundamental of Business Studies (520209)');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `question_name` text NOT NULL,
  `pdf_download` varchar(100) NOT NULL,
  `chapter` int(11) NOT NULL,
  `video_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `question_name`, `pdf_download`, `chapter`, `video_link`) VALUES
(1, 'Object Oriented Programming (520203)', 'what is java?', 'asdf.pdf', 2, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4'),
(2, 'Algorithms', 'what is array', 'link', 1, 'www.google.com'),
(3, 'Calculus (510205)', 'what is calculus?', 'asdf.pdf', 1, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4'),
(4, 'Calculus (510205)', 'define intrigation.show necessary diagrams', 'asdf.pdf', 2, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4'),
(5, 'Calculus (510205)', 'define differenciation and its format', '', 3, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chaptername`
--
ALTER TABLE `chaptername`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chaptername`
--
ALTER TABLE `chaptername`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
