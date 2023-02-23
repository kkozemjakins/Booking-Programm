-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных booking
CREATE DATABASE IF NOT EXISTS `booking` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `booking`;

-- Дамп структуры для таблица booking.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Access` int DEFAULT '0',
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.customer: ~6 rows (приблизительно)
INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Email`, `Access`) VALUES
	(1, 'Kirils', 'Kozemjakins', 'qwerty12345', 'qwerty@gmail.com', 1),
	(2, 'Aleksandrs', 'Loceks', '123456789', 'rvt@gmail.com', 1),
	(3, 'Ilja', 'Rimsa', '123456789', 'rimsa@gmail.com', 0),
	(4, 'Ivan', 'Aleksejevichs', '123654789', 'ivan@gmail.com', 0),
	(5, 'Ilona', 'Grebkova', 'pivoBIseychasj', 'ilona@gmail.com', 0),
	(6, 'Maksims', 'Visockis', 'sosiska123', 'sosiska@gmil.com', 0),
	(7, 'Olga', 'Pozdnakova', '123456789', 'oland@inbox.lv', 0);

-- Дамп структуры для таблица booking.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `OffersID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Price` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Details` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  PRIMARY KEY (`OffersID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.offers: ~0 rows (приблизительно)
INSERT INTO `offers` (`OffersID`, `Name`, `Address`, `Price`, `Details`) VALUES
	(1, 'Riekstukalns', 'Riekstukalns, Baldones pagasti, LV-2125', '25€', 'Cool'),
	(3, 'Volvo, Sporta centrs', 'Jūrmalas gatve 78D, Kurzemes rajons, Rīga, LV-1029', 'Publiskā slidošana 6.00 EUR/st.', 'Volvo Sporta centrs ir dibināts 2005.gadā.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
