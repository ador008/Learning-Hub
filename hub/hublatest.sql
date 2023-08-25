-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 08:58 AM
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
(8, 'Calculus (510205)', 'differenciation', 3),
(9, 'Network and Information Security', 'Introduction', 1),
(10, 'Network and Information Security', 'Traditional Symmetric-Key Ciphers ', 2),
(11, 'Network and Information Security', 'Introduction to Modern Symmetric-Key Ciphers', 3),
(12, 'Network and Information Security', 'Data Encryption Standard (DES)', 4),
(13, 'Network and Information Security', 'Advanced Encryption Standard (AES) TOW', 5),
(14, 'Network and Information Security', 'Asymmetric-Key Cryptography', 6),
(15, 'Network and Information Security', 'Message Integrity and Message Authentication', 7),
(16, 'Network and Information Security', ' Cryptographic Hash Functions', 8),
(17, 'Network and Information Security', 'Key Management TOPIC-10: Digital Signature', 9),
(18, 'Network and Information Security', 'Entity Authentication', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `download` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date`, `download`) VALUES
(1, 'cse 8th semester exa', '13-08-2023', 'asdf.pdf'),
(2, 'cse 5th semester lab notice', '12-08-23', 'asdf.pdf'),
(3, 'cse final project notice', '10-06-23', 'asdf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `podcast`
--

CREATE TABLE `podcast` (
  `id` int(5) NOT NULL,
  `episodename` varchar(100) NOT NULL,
  `audio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `podcast`
--

INSERT INTO `podcast` (`id`, `episodename`, `audio`) VALUES
(1, 'episode of song', 'passenger.mp3');

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
(17, 3, 'Fundamental of Business Studies (520209)'),
(18, 4, 'sub 3'),
(19, 4, 'sub4'),
(20, 4, 'sub5'),
(21, 5, 'sub1'),
(22, 5, 'sub2'),
(23, 5, 'sub3'),
(24, 5, 'sub4'),
(25, 5, 'sub5'),
(26, 6, 'sub1'),
(27, 6, 'sub2'),
(28, 6, 'sub3'),
(29, 6, 'sub4'),
(30, 7, 'sub1'),
(31, 7, 'sub2'),
(32, 7, 'sub3'),
(33, 7, 'sub4'),
(34, 8, 'Network and Information Security'),
(35, 8, 'Information Systems Management'),
(36, 8, 'Parallel and Distributed Systems');

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
  `video_link` varchar(100) NOT NULL,
  `is_suggestion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `question_name`, `pdf_download`, `chapter`, `video_link`, `is_suggestion`) VALUES
(1, 'Object Oriented Programming (520203)', 'what is java?', 'asdf.pdf', 2, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4', 0),
(2, 'Algorithms', 'what is array', 'link', 1, 'www.google.com', 0),
(3, 'Calculus (510205)', 'what is calculus?', 'asdf.pdf', 1, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4', 0),
(4, 'Calculus (510205)', 'define intrigation.show necessary diagrams', 'asdf.pdf', 2, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4', 0),
(5, 'Calculus (510205)', 'define differenciation and its format', '', 3, 'https://www.youtube.com/watch?v=4HbOzg4aWFk&list=PLeZMjV76KKKVxUvqqofY9VQZYBP5MPKW4', 0),
(6, 'Network and Information Security', 'Define cryptography. [2013,2017,2016,2020]\r\nHow can cryptography works as a security tool\"?[2017', '', 1, '', 1),
(7, 'Network and Information Security', 'What do you mean by network security?[2014,2015,2020 6.Draw and explain network security model [2018,2020]', '', 1, '', 0),
(8, 'Network and Information Security', 'Briefly explain different types of security services.[2013]', '', 1, '', 1),
(9, 'Network and Information Security', 'Explain different types of attacks on plain text with diagram. [2019,2020]', '', 1, '', 0),
(10, 'Network and Information Security', 'Define security attack. Briefly explain different types of security attacks. [2018]', '', 1, '', 0),
(11, 'Network and Information Security', 'State the differences between active attacks and passive attacks. [2010,2015 What are the traditional methods for network security?[2012,2015]', '', 1, '', 1),
(12, 'Network and Information Security', 'What is data security? Describe OSI security services. [2019]', '', 1, '', 0),
(13, 'Network and Information Security', 'Briefly explain the OSI security model [2016]', '', 1, '', 1),
(14, 'Network and Information Security', 'Define encryption [2011,2015]', '', 2, '', 1),
(15, 'Network and Information Security', 'Explain the symmetric cipher model with its ingredients. [2010,2015]', '', 2, '', 0),
(16, 'Network and Information Security', 'What is data encryption standard? What are the features of it?[2012,2015,2019]', '', 4, '', 1),
(17, 'Network and Information Security', 'Describe general DES encryption process with diagram. Also explain some of its merits and demerits. [2019]', '', 4, '', 0),
(18, 'Network and Information Security', 'Briefly explain general DES encryption algorithm [2014,2020]', '', 4, '', 0),
(19, 'Network and Information Security', 'Describe symmetric-key cryptographic algorithm with example.[2012,2017,2019]\r\n', '', 4, '', 1),
(20, 'Network and Information Security', 'A Draw single round DES architecture and briefly explain its operational procedure [2013,2020]\r\n', '', 4, '', 1),
(21, 'Network and Information Security', 'describe diffrent types of Modern Symmetric-Key Ciphers. [2017]', '', 3, '', 1),
(22, 'Network and Information Security', 'Explain the salient features of AES. [2019, 2010,2020]', '', 5, '', 1),
(23, 'Network and Information Security', 'Differentiate between AES and DES algorithm?[2017,2015,2020]', '', 5, '', 1),
(24, 'Network and Information Security', 'What do you mean by asymmetric key. [2019]\r\nWrite the differences between symmetric cipher model and the asymmetrie cipher model [2010]', '', 6, '', 1),
(25, 'Network and Information Security', 'Differentiate public key and conventional encryption.[2017] Differentiate between symmetric and asymmetric encryption [2011,2013,2020]\r\n', '', 6, '', 1),
(26, 'Network and Information Security', 'Perform encryption and decryption operation using RSA algorithm for a specific case [2012]\r\n', '', 6, '', 0),
(27, 'Network and Information Security', ' List four general characteristics of schema for the distribution of the public key (2014)', '', 7, '', 0),
(28, 'Network and Information Security', 'Define kerberos. Briefly explain kerberos V4 (2017,2020)', '', 7, '', 0),
(29, 'Network and Information Security', 'What is KDC? Describe in brief [2018,2020]', '', 7, '', 0),
(30, 'Network and Information Security', 'What is the purpose of X. 509 standard?[2017,2015,2020.]', '', 7, '', 0),
(31, 'Network and Information Security', 'What is digital signature [2010,2011,2014,2017,2015] State the requirements for a digital signature?[2010]', '', 8, '', 0),
(32, 'Network and Information Security', 'Write and explain the DSA algorithm. [2018,2020]', '', 8, '', 0),
(33, 'Network and Information Security', 'How can RSA be used for creating a digital signature?[2013]', '', 8, '', 0),
(34, 'Network and Information Security', 'Describe digital signature with block diagram [2015,2019,2019]', '', 8, '', 0),
(35, 'Network and Information Security', 'What is firewall? What are the advantages of firewall?', '', 9, '', 0),
(36, 'Network and Information Security', 'Define SET. ', '', 10, '', 0),
(37, 'Network and Information Security', 'Write down the features of SET. [2019, 2018,2020]\r\n', '', 10, '', 0),
(38, 'Network and Information Security', 'Why corporate houses implement more than one firewall for security? [2012,2017]\r\n', '', 9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `year` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `institution`, `semester`, `email`, `mobile`, `year`) VALUES
(1, 'Ador Chowdhury', 'adradr', '', '1', 'adr@gmail.com', '', ''),
(2, 'Tanvir Nahian', 'tntn', '', '2', 'tn@hotmail.com', '', ''),
(3, 'ma', 'mn', 'mango', '8', 'm@g.com', '12324', '1'),
(4, 'guava', 'Guava', 'Guava', '8', 'guava@guava.com', '54321', '4'),
(5, 'admin', 'admin', '', '7', 'admin@gmail.com', '', ''),
(6, 'Deba', '12345678', '', '3', 'deba@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chaptername`
--
ALTER TABLE `chaptername`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chaptername`
--
ALTER TABLE `chaptername`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
