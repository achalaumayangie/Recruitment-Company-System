-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2020 at 09:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `aid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`aid`, `eid`, `vid`, `time`) VALUES
(3, 1, 1, '2020-10-07 01:38:25'),
(4, 7, 1, '2020-10-22 02:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cid` int(150) NOT NULL,
  `cname` varchar(140) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `psw` varchar(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `cname`, `owner`, `mail`, `contact`, `address`, `psw`, `status`) VALUES
(1, 'VaCa', 'Saman Putha', 'info@vaca.com', '099897979', '', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'asd', 'asdsad', 'oahb@gmail.com', '0712323233', 'asdsadsad', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'tesd', '', 'test@gmail.com', '', '', '9c433266de2ee0752c3055d0ff9fe5bc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_request`
--

CREATE TABLE `contact_request` (
  `co_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `msg` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_request`
--

INSERT INTO `contact_request` (`co_id`, `name`, `mail`, `msg`) VALUES
(1, 'sadd', 'sad', 'sadsadsadsad');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(150) NOT NULL,
  `name` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `birth` datetime NOT NULL,
  `contact` varchar(12) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `psw` varchar(150) NOT NULL,
  `gender` int(1) NOT NULL,
  `edu_quli` varchar(150) NOT NULL,
  `pro_quli` varchar(150) NOT NULL,
  `adi_quli` varchar(150) NOT NULL,
  `cv` varchar(70) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `address`, `birth`, `contact`, `mail`, `psw`, `gender`, `edu_quli`, `pro_quli`, `adi_quli`, `cv`, `status`) VALUES
(1, 'sadsada', 'sfasfdaf', '2020-10-06 00:00:00', '0712323233', 'oahb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'adfasfau', 'uu', 'faafdafsafdfu', 'null', 1),
(7, 'saman', 'asdasd', '2020-10-22 02:04:13', '435345345345', 'fdsdf', 'dfsdfsdf', 0, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `description` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `mail`, `description`) VALUES
(1, 'asd', 'asdsad@fgfg.com', 'asd'),
(2, 'sad', 'asdsad@fgfg.com', 'sad'),
(3, 'gsfgfdsg', 'asdsad@fgfg.com', 'dfsd');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `vid` int(120) NOT NULL,
  `cid` int(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `position` varchar(90) NOT NULL,
  `category` varchar(50) NOT NULL,
  `dar` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `career_lvl` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vid`, `cid`, `title`, `position`, `category`, `dar`, `qualification`, `career_lvl`, `location`, `salary`, `time`, `status`) VALUES
(1, 1, 'Software Engineering', 'Senior Software Engineer', 'Coumputing', 'Look up back end of the system and prepare the group for the project when we call for the ptojects.', 'Need to be a lion fucker sman fucker putha fuck beba saman piuthe oba enawa mama yanaw asaman saman', 'Senior', 'Colombo', '200 000 - 400 000', '2020-10-01 20:43:09', 1),
(2, 1, 'sad', 'sda', 'Coumputing', 'sad', 'sad', 'Senior', 'sda', '43543', '2020-10-22 11:18:14', 1),
(3, 1, 'sadsad', 'asdsad', 'Engineering', 'sadsad', 'sadsad', 'Intern', 'sadsad', '4354353', '2020-10-22 11:18:30', 1),
(4, 1, 'sadsad', 'asdsad', 'Engineering', 'sadsad', 'sadsad', 'Intern', 'sadsad', '4354353', '2020-10-22 11:18:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `contact_request`
--
ALTER TABLE `contact_request`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_request`
--
ALTER TABLE `contact_request`
  MODIFY `co_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `vid` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `vacancy` (`vid`);

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `company` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
