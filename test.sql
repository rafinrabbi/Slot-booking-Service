-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 11:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `slot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`name`, `first_name`, `sid`, `email`, `slot`) VALUES
('f', 'voga', '12', 'fafaq@g.com', '2'),
('Rakn', 'Rajibul', '1223', 'rakid@gl.com', '4'),
('Yasin ', 'Bhoga', '12343', 'arefin@yasin.me', '4'),
('Rafin', 'Rawhatur', '19101422', 'rawhaturrafin@gmail.com', '3'),
('Yas', 'Refing', '19103100', 'djoo@f.con', '2'),
('hello', 'HIIkk', '234566', 'hi@yashh.kp', '1'),
('TEST ', 'rAWHAT', '2423', 'RAHDK@gmal.com', '3'),
('TEST 1', 'rAWHAT', '24231', 'RA1HDK@gmal.com', '3'),
('Rabbi', 'Rawhatur', '3432', 'rawhatur.rabbi@g.bracu.ac.bd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `capacity` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `date`, `capacity`) VALUES
(1, '2022-10-31', 8),
(2, '2022-11-01', 8),
(3, '2022-11-02', 8),
(4, '2022-11-05', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('admin', 'admin', 'ADMIN'),
('std', 'std', 'STUDENT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
