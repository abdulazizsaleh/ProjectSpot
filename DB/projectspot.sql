-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 مارس 2018 الساعة 20:44
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectspot`
--

-- --------------------------------------------------------

--
-- بنية الجدول `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frist_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` int(11) NOT NULL DEFAULT '0',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `university` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dept` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `projectID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `account`
--

INSERT INTO `account` (`ID`, `username`, `frist_name`, `last_name`, `password`, `phone_num`, `email`, `university`, `faculty`, `dept`, `type`, `image`, `DOB`, `gender`, `projectID`) VALUES
(1, 'a', 'frist', 'last', '1234', 0, 'a@gmail.com', 'kau', 'fcit', 'it', 's', '', '0000-00-00', '', 0),
(111, 'aa', 'a', 'a', '11', 0, 'aalharbi1043@stu.kau.edu.sa', 'KAU', 'FCIT', 'IT', '11', '', '0000-00-00', '', 0),
(1407659, 'abdulaziz.alharbi', 'abdulaziz', 'alharbi', '1234', 569713710, 'a.s.alharbi.16@gmail.com', 'KAU', 'FCIT', 'IT', 'student', '', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `modifierID` int(11) NOT NULL,
  `last_modify` date NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `project`
--

CREATE TABLE `project` (
  `projectID` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `viewID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `view`
--

CREATE TABLE `view` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pic` blob NOT NULL,
  `rate` float NOT NULL,
  `veiws` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique` (`username`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
