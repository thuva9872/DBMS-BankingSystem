-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2021 at 03:40 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `brachCode` varchar(50) NOT NULL,
  `brachName` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `type` enum('H_O','br') NOT NULL DEFAULT 'br',
  `contactNo` int(10) NOT NULL,
  `openedDate` date NOT NULL,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`brachCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`brachCode`, `brachName`, `Address`, `type`, `contactNo`, `openedDate`, `updatedDate`, `status`) VALUES
('b001', 'Jaffna', 'Jaffna town', 'H_O', 1234567890, '2021-01-14', '2021-01-15 09:16:26', '1'),
('b002', 'Colombo', 'Colombo', 'br', 987654321, '2021-01-01', '2021-01-15 09:06:25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `NIC` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `tempAddress` text NOT NULL,
  `permanantAddress` text NOT NULL,
  `job` text,
  `officialAddress` text,
  `DOB` date NOT NULL,
  `dp` varchar(500) DEFAULT NULL,
  `openedBy` int(11) NOT NULL,
  `openedBranch` varchar(50) NOT NULL,
  `joinedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `leftDate` datetime DEFAULT NULL,
  PRIMARY KEY (`NIC`),
  UNIQUE KEY `eMail` (`eMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`NIC`, `name`, `eMail`, `password`, `mobileNo`, `tempAddress`, `permanantAddress`, `job`, `officialAddress`, `DOB`, `dp`, `openedBy`, `openedBranch`, `joinedDate`, `updatedDate`, `leftDate`) VALUES
('990022984v', 'Sharma', 'sarves021999@gmail.com', 'b8b507db0b52442269c5c0bd23cf4189', 778079610, 'No, sample address location', 'No, sample address location', 'Student', 'UoM', '1999-01-02', NULL, 4, 'b001', '2021-01-15 09:27:17', '2021-01-15 09:27:17', NULL),
('980021422v', 'Thuva', 'Thuva@gmail.com', 'b75ec0d4f5234f39b4a40f3c83484faf', 432167898, 'No Sample address for \r\nthuvaragan', 'No Sample address for \r\nthuvaragan', 'Senior software engineer', 'UoM', '1998-04-02', NULL, 5, 'b002', '2021-01-15 09:27:17', '2021-01-15 09:28:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `NIC` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branchCode` varchar(7) NOT NULL,
  `designation` enum('staff','manager','head_manager') NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `Address` text NOT NULL,
  `DOB` date NOT NULL,
  `dp` varchar(500) DEFAULT NULL,
  `JoinedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `leftDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `uniqueAttribur` (`NIC`,`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


-- ----------------
-- Online transaction procedure
DROP PROCEDURE IF EXISTS transfer_online;
DELIMITER $$
CREATE PROCEDUREtransfer_online(
	sender_acc,
  recipient_acc,
  amount 
)
BEGIN
	START TRANSACTION;
		UPDATE account SET balance=balance-amount WHERE acc_no=sender_acc;
    UPDATE account SET balance=balance+amount WHERE acc_no=recipient_acc;
    --INSERT INTO transaction VALUES ();
    COMMIT;

END $$
DELIMITER ;
--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `name`, `NIC`, `email`, `password`, `branchCode`, `designation`, `mobileNo`, `Address`, `DOB`, `dp`, `JoinedDate`, `UpdatedDate`, `leftDate`) VALUES
(1, 'HM_xxx', '123456789v', 'headofficemanager@gmail.com', '950a2c1b68ef6dd154800e089f20282a', 'b001', 'head_manager', 1234567890, 'Sample address', '2019-08-08', NULL, '2021-01-15 08:58:48', '2021-01-15 08:58:48', NULL),
(2, 'Man_yyy', '987654321v', 'manager@gmail.com', '1d0258c2440a8d19e716292b231e3190', 'b002', 'manager', 1234567890, 'Sample 2 address', '2020-08-03', NULL, '2021-01-15 09:05:36', '2021-01-15 09:05:36', NULL),
(4, 'S_jaffna', '543216789v', 'staffjaffna@gmail.com', '754acdffa5a29adb68d88ef04d380d73', 'b001', 'staff', 1234567890, 'jaffna', '2020-06-15', NULL, '2021-01-15 09:13:24', '2021-01-15 09:13:24', NULL),
(5, 'S_colombo', '990022132v', 'staffcolombo@gmail.com', '8be46aff6e2601f09204dd35268c4114', 'b002', 'staff', 987654321, 'sample', '2020-08-17', NULL, '2021-01-15 09:13:24', '2021-01-15 09:13:24', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
