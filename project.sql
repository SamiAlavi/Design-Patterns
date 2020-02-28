-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2019 at 05:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `userid` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`userid`, `comment`) VALUES
(123, 'cvfvfvv'),
(123, 'cvfvfvv'),
(123, 'cvfvfvv'),
(123, 'dddddd'),
(123, 'xcxcxcxcxc'),
(123, 'hellooooo');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `userid` int(11) NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `answer5` text NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`userid`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `result`) VALUES
(456, 'B', 'B', 'C', 'B', 'A', '5 / 5 correct'),
(789, 'D', 'B', 'C', 'C', 'D', '2 / 5 correct'),
(123, 'B', 'B', 'C', 'C', 'A', '4 / 5 correct'),
(667, 'A', 'B', 'C', 'B', 'A', '4 / 5 correct');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `username`, `password`, `comment`) VALUES
(1, 'user1', 'qwerty123', ''),
(2, 'user2', 'qwerty123', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `ID` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `upload_time` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`ID`, `file_name`, `upload_time`, `path`) VALUES
(4, 'Surah Maryam Full --By Sheikh Shurai-.mp4', '2019-12-12 16:15:00', 'uploads/Surah Maryam Full --By Sheikh Shurai-.mp4'),
(5, 'inkyz_mandalaY_1080p.mp4', '2019-12-12 16:24:09', 'uploads/inkyz_mandalaY_1080p.mp4'),
(6, 'inkyz_mandalaY_1080p.mp4', '2019-12-12 17:48:40', 'uploads/inkyz_mandalaY_1080p-1.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `watchduration`
--

CREATE TABLE `watchduration` (
  `user` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `watched` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchduration`
--

INSERT INTO `watchduration` (`user`, `path`, `watched`, `duration`) VALUES
('user1', 'uploads/inkyz_mandalaY_1080p.mp4', '0.523481', '233.756'),
('user1', 'uploads/Surah Maryam Full --By Sheikh Shurai-.mp4', '17.333048', '774.617687'),
('user2', 'uploads/inkyz_mandalaY_1080p-1.mp4', '31.153480509', '233.756'),
('user2', 'uploads/Surah Maryam Full --By Sheikh Shurai-.mp4', '14.179677777777778', '774.617687'),
('user2', 'uploads/inkyz_mandalaY_1080p.mp4', '10.246463', '233.756');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
