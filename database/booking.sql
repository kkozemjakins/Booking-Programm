-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for booking
CREATE DATABASE IF NOT EXISTS `booking` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `booking`;

-- Dumping structure for table booking.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Access` int(11) DEFAULT '0',
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.customer: ~6 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Email`, `Access`) VALUES
	(1, 'Kirils', 'Kozemjakins', 'qwerty12345', 'qwerty@gmail.com', 1),
	(2, 'Aleksandrs', 'Loceks', '12345789', 'rvt@gmail.com', 1),
	(3, 'Ilja', 'Rimsa', '12345789', 'rimsa@gmail.com', 0),
	(4, 'Ivan', 'Aleksejevichs', '123654789', 'ivan@gmail.com', 0),
	(5, 'Ilona', 'Grebkova', 'pivoBIseychasj', 'ilona@gmail.com', 0),
	(6, 'Maksims', 'Visockis', 'sosiska123', 'sosiska@gmil.com', 0);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table booking.demo1
CREATE TABLE IF NOT EXISTS `demo1` (
  `DemoID` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DemoID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.demo1: ~16 rows (approximately)
/*!40000 ALTER TABLE `demo1` DISABLE KEYS */;
INSERT INTO `demo1` (`DemoID`, `test`) VALUES
	(3, 'test'),
	(4, 'ffgf'),
	(5, 'fgf'),
	(6, 'fgf'),
	(7, 'fgf'),
	(8, 'fgf'),
	(9, 'fgf'),
	(10, 'fgf'),
	(12, 'fgf'),
	(13, 'fgf'),
	(14, 'fgf'),
	(15, 'fgf'),
	(16, 'fgf'),
	(17, 'fgf');
/*!40000 ALTER TABLE `demo1` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
