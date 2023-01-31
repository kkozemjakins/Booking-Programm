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
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table booking.customer: ~6 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Email`) VALUES
	(1, 'Kirils', 'Kozemjakins', 'qwerty12345', 'qwerty@gmail.com'),
	(2, 'Aleksandrs', 'Loceks', '12345789', 'rvt@gmail.com'),
	(3, 'Ilja', 'Rimsa', '12345789', 'rimsa@gmail.com'),
	(4, 'Ivan', 'Aleksejevichs', '123654789', 'ivan@gmail.com'),
	(5, 'Ilona', 'Grebkova', 'pivoBIseychasj', 'ilona@gmail.com'),
	(6, 'Deniss', 'Kozlovs', 'kok', 'denis@inbox.lv');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table booking.demo1
CREATE TABLE IF NOT EXISTS `demo1` (
  `DemoID` int(11) NOT NULL,
  `test` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DemoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table booking.demo1: ~13 rows (approximately)
/*!40000 ALTER TABLE `demo1` DISABLE KEYS */;
INSERT INTO `demo1` (`DemoID`, `test`) VALUES
	(1, 'Privet'),
	(2, 'Ky'),
	(3, 'Laragon moment'),
	(4, 'proverka'),
	(5, 'fkfk'),
	(6, 'vvod'),
	(7, 'privet kostja'),
	(8, 'chivo s pipsami'),
	(9, 'Console log'),
	(10, 'Privet Kirill'),
	(11, 'Sasha'),
	(12, 'Ilja'),
	(13, 'Kapusta');
/*!40000 ALTER TABLE `demo1` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
