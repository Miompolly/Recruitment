-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2018 at 04:02 PM
-- Server version: 5.1.30
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `num` int(5) NOT NULL AUTO_INCREMENT,
  `CandId` varchar(30) DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `position` varchar(30) NOT NULL,
  `regdt` date NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `CandId` (`CandId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`num`, `CandId`, `fname`, `lname`, `gender`, `position`, `regdt`) VALUES
(1, 'IT10210', 'JURU', 'Julius', 'M', 'IT OFFICER', '2018-08-18'),
(2, 'IT10219', 'MUGISHA', 'JOEL', 'M', 'IT OFFICER', '2018-08-18'),
(3, '102IT19', 'KAMAGAJU', 'ADELIHPINE', 'F', 'IT OFFICER', '2018-08-18'),
(4, '104IT19', 'MUTESI', 'OLIVE', 'F', 'IT OFFICER', '2018-08-18'),
(5, '45', 'Fortune', 'TUYISHIRE', 'F', 'Network Admin', '2018-08-27'),
(6, '46', 'NESTER', 'NIYIFASHA', 'F', 'Network Admin', '2018-08-27'),
(7, '47', 'KAGABO', 'JOEL', 'M', 'Network Admin', '2018-08-27'),
(8, '48', 'NTWALI', 'JOHNS', 'M', 'Network Admin', '2018-08-27'),
(9, '49', 'KAMAGAJU', 'ADELIHPINE', 'F', 'Network Admin', '2018-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `examinfo`
--

CREATE TABLE IF NOT EXISTS `examinfo` (
  `nm` int(7) NOT NULL AUTO_INCREMENT,
  `examcat` varchar(30) NOT NULL,
  `regdt` date NOT NULL,
  `maxim` float NOT NULL,
  `pozit` varchar(30) NOT NULL,
  PRIMARY KEY (`nm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `examinfo`
--

INSERT INTO `examinfo` (`nm`, `examcat`, `regdt`, `maxim`, `pozit`) VALUES
(1, 'Written', '2018-08-18', 50, 'IT OFFICER'),
(2, 'Written', '2018-08-18', 50, 'IT OFFICER'),
(3, 'Written', '2018-08-18', 50, 'IT OFFICER'),
(4, 'Interview', '2018-08-18', 50, 'IT OFFICER'),
(5, 'Interview', '2018-08-18', 50, 'IT OFFICER'),
(6, 'Interview', '2018-08-18', 50, 'IT OFFICER'),
(7, 'Written', '2018-08-27', 50, 'Network Admin'),
(8, 'Written', '2018-08-27', 50, 'Network Admin'),
(9, 'Written', '2018-08-27', 50, 'Network Admin'),
(10, 'Written', '2018-08-27', 50, 'Network Admin'),
(11, 'Written', '2018-08-27', 50, 'Network Admin'),
(12, 'Interview', '2018-08-27', 50, 'Network Admin'),
(13, 'Interview', '2018-08-27', 50, 'Network Admin'),
(14, 'Interview', '2018-08-27', 50, 'Network Admin'),
(15, 'Interview', '2018-08-27', 50, 'Network Admin');

-- --------------------------------------------------------

--
-- Table structure for table `intv`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recruitment`.`intv` AS select `recruitment`.`results`.`CandId` AS `CandId`,`recruitment`.`candidates`.`fname` AS `fname`,`recruitment`.`candidates`.`lname` AS `lname`,`recruitment`.`results`.`Marks` AS `Marks`,`recruitment`.`candidates`.`gender` AS `gender` from (`recruitment`.`candidates` join `recruitment`.`results` on((`recruitment`.`candidates`.`CandId` = `recruitment`.`results`.`CandId`))) where ((`recruitment`.`candidates`.`position` = 'Network Admin') and (`recruitment`.`results`.`examcat` = 'Interview')) order by `recruitment`.`results`.`Marks` desc;

--
-- Dumping data for table `intv`
--

INSERT INTO `intv` (`CandId`, `fname`, `lname`, `Marks`, `gender`) VALUES
('45', 'Fortune', 'TUYISHIRE', 45.0, 'F'),
('48', 'NTWALI', 'JOHNS', 43.0, 'M'),
('46', 'NESTER', 'NIYIFASHA', 37.0, 'F'),
('49', 'KAMAGAJU', 'ADELIHPINE', 34.0, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `CandId` varchar(10) DEFAULT NULL,
  `Marks` float(3,1) DEFAULT NULL,
  `examcat` varchar(30) DEFAULT NULL,
  `regdt` date NOT NULL,
  KEY `CandId` (`CandId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`CandId`, `Marks`, `examcat`, `regdt`) VALUES
('IT10210', 45.0, 'Written', '2018-08-18'),
('104IT19', 40.0, 'Written', '2018-08-18'),
('102IT19', 24.0, 'Written', '2018-08-18'),
('IT10219', 34.0, 'Written', '2018-08-18'),
('104IT19', 45.0, 'Interview', '2018-08-18'),
('IT10210', 34.0, 'Interview', '2018-08-18'),
('IT10219', 45.0, 'Interview', '2018-08-18'),
('45', 34.0, 'Written', '2018-08-27'),
('46', 37.0, 'Written', '2018-08-27'),
('47', 24.0, 'Written', '2018-08-27'),
('48', 45.0, 'Written', '2018-08-27'),
('49', 42.0, 'Written', '2018-08-27'),
('45', 45.0, 'Interview', '2018-08-27'),
('46', 37.0, 'Interview', '2018-08-27'),
('48', 43.0, 'Interview', '2018-08-27'),
('49', 34.0, 'Interview', '2018-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `passWord` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `userName`, `passWord`) VALUES
(1, 'BAYINGANA', 'Frank', 'frank', 'frank'),
(2, 'Fortunee', 'Fortunee', 'fortune', 'fortune');

-- --------------------------------------------------------

--
-- Table structure for table `writ`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recruitment`.`writ` AS select `recruitment`.`results`.`CandId` AS `CandId`,`recruitment`.`candidates`.`fname` AS `fname`,`recruitment`.`candidates`.`lname` AS `lname`,`recruitment`.`results`.`Marks` AS `Marks`,`recruitment`.`candidates`.`gender` AS `gender` from (`recruitment`.`candidates` join `recruitment`.`results` on((`recruitment`.`candidates`.`CandId` = `recruitment`.`results`.`CandId`))) where ((`recruitment`.`candidates`.`position` = 'Network Admin') and (`recruitment`.`results`.`examcat` = 'Written')) order by `recruitment`.`results`.`Marks` desc;

--
-- Dumping data for table `writ`
--

INSERT INTO `writ` (`CandId`, `fname`, `lname`, `Marks`, `gender`) VALUES
('48', 'NTWALI', 'JOHNS', 45.0, 'M'),
('49', 'KAMAGAJU', 'ADELIHPINE', 42.0, 'F'),
('46', 'NESTER', 'NIYIFASHA', 37.0, 'F'),
('45', 'Fortune', 'TUYISHIRE', 34.0, 'F'),
('47', 'KAGABO', 'JOEL', 24.0, 'M');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`CandId`) REFERENCES `candidates` (`CandId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
