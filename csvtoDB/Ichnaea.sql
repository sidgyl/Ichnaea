-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2015 at 07:26 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Ichnaea`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `CLASSID` varchar(11) NOT NULL,
  `INSTRUCTOR_ID` varchar(50) NOT NULL,
  `STARTTIME` time DEFAULT '00:00:00',
  `ENDTIME` time NOT NULL DEFAULT '00:00:00',
  `STARTDATE` date NOT NULL,
  `ENDDATE` date NOT NULL,
  `CUTOFFTIME` time NOT NULL,
  `DAYS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CLASSID`, `INSTRUCTOR_ID`, `STARTTIME`, `ENDTIME`, `STARTDATE`, `ENDDATE`, `CUTOFFTIME`, `DAYS`) VALUES
('CSE4316', 'sid_gyl@yahoo.co.in', '10:00:00', '11:20:00', '2015-01-08', '2015-05-15', '10:30:00', 'Tuesday,Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `CSE4316`
--

CREATE TABLE IF NOT EXISTS `CSE4316` (
  `STUDENTID` varchar(30) NOT NULL,
  `STATUS` varchar(1) DEFAULT 'A',
  `CLASS_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `FNAME` varchar(20) NOT NULL,
  `LNAME` varchar(20) NOT NULL,
  `PSWRD` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`FNAME`, `LNAME`, `PSWRD`, `EMAIL`) VALUES
('Dat', 'Le', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', 'dat.le@gmail.com'),
('Jack', 'Fat', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'hello@gmial.com'),
('Joel ', 'Friberg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'joel.friberg@yahoo.com'),
('last', 'First', '5150d2104c8cd974b27fad3f25ec4e8098bb7bbe', 'last.first@gmail.com'),
('Manfred ', 'Huber', 'e2c719c759cb492ffbfc7c4c7762372a49c4787c', 'manfred.huber@gmail.com'),
('Maximus', 'Seng', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'max.seng@gmail.com'),
('New', 'Instructor', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'new.professor@gmail.com'),
('Picard', 'Folefack', '5150d2104c8cd974b27fad3f25ec4e8098bb7bbe', 'picard.folefack@gmail.com'),
('Picard', 'Folefack', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pickard.folefack@yahoo.com'),
('sidharth', 'goyal', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sid_gyl@yahoo.co.in'),
('Vishal', 'Singh', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'vishal.singh@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `STUDENTID` varchar(11) NOT NULL,
  `CLASSID` varchar(11) NOT NULL,
  `FNAME` varchar(20) NOT NULL,
  `LNAME` varchar(20) NOT NULL,
  `RFID` varchar(50) NOT NULL,
  `ATTENDANCE` varchar(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUDENTID`, `CLASSID`, `FNAME`, `LNAME`, `RFID`, `ATTENDANCE`) VALUES
('fum7836', 'CSE4316', 'Fisher', 'Man', 'E20030984110009420703F2B', 'A'),
('gsd9826', 'CSE4316', 'Grabdpa', 'Deen', 'E2004074840F02150930BA57', 'A'),
('jbd1111', 'CSE4316', 'John', 'Doe', 'E20030984110002320803C87', 'A'),
('jbt1029', 'CSE4316', 'Johny', 'Tran', 'E20030984110009520703F24', 'A'),
('jqf1829', 'CSE4316', 'Joel ', 'Friberg', 'E20030984110004520703EC3', 'A'),
('pgs1654', 'CSE4316', 'Pinocchio ', 'Shmais', 'E20030984110006020703EEA', 'A'),
('pof1098', 'CSE4316', 'Picard', 'Folefack', 'E2004074840F00870880BF7E', 'A'),
('smp1983', 'CSE4316', 'Stinky', 'Patel', 'E20030984110010920703F43', 'A'),
('sxg8616', 'CSE4316', 'Sidharth', 'Goyal', 'E2001071360F00631080A7EC', 'A'),
('tgl1987', 'CSE4316', 'That', 'Le', 'E2004074840F02050870C269', 'A'),
('vas7612', 'CSE4316', 'Vishal ', 'Singh', 'E2004074840F01990920BC47', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`CLASSID`), ADD KEY `INSTRUCTOR_ID` (`INSTRUCTOR_ID`);

--
-- Indexes for table `CSE4316`
--
ALTER TABLE `CSE4316`
 ADD PRIMARY KEY (`STUDENTID`,`CLASS_DATE`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
 ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`STUDENTID`,`CLASSID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`INSTRUCTOR_ID`) REFERENCES `instructor` (`EMAIL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
