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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.customer: ~6 rows (приблизительно)
INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Email`, `Access`) VALUES
	(1, 'Kirils', 'Kozemjakins', 'qwerty12345', 'qwerty@gmail.com', 1),
	(2, 'Aleksandrs', 'Loceks', '123456789', 'rvt@gmail.com', 1),
	(3, 'Ilja', 'Rimsa', '123456789', 'rimsa@gmail.com', 0),
	(4, 'Ivan', 'Aleksejevichs', '123654789', 'ivan@gmail.com', 0),
	(5, 'Ilona', 'Grebkova', 'pivoBIseychasj', 'ilona@gmail.com', 0),
	(6, 'Maksims', 'Visockis', 'sosiska123', 'sosiska@gmil.com', 0),
	(7, 'Olga', 'Pozdnakova', '123456789', 'oland@inbox.lv', 0);

-- Дамп структуры для таблица booking.images
CREATE TABLE IF NOT EXISTS `images` (
  `ImageID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `size` int DEFAULT NULL,
  `path` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`ImageID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.images: ~0 rows (приблизительно)
INSERT INTO `images` (`ImageID`, `name`, `type`, `size`, `path`) VALUES
	(1, 'photo_2023-02-23_07-21-50.jpg', 'image/jpeg', 128400, 'images/photo_2023-02-23_07-21-50.jpg'),
	(2, '1f7c62a3-0d8f-47c8-8229-6dad431c04c2.jpg', 'image/jpeg', 419178, 'images/1f7c62a3-0d8f-47c8-8229-6dad431c04c2.jpg'),
	(3, 'Volvo sporta centrs.jpg', 'image/jpeg', 111491, 'images/Volvo sporta centrs.jpg'),
	(4, 'photo_2023-02-20_08-17-41.jpg', 'image/jpeg', 102985, 'images/photo_2023-02-20_08-17-41.jpg'),
	(6, 'Fantasy-Park.jpg', 'image/jpeg', 112463, 'images/Fantasy-Park.jpg');

-- Дамп структуры для таблица booking.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `OffersID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Price` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Details` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `Link` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci DEFAULT NULL,
  `ImageID` int DEFAULT NULL,
  PRIMARY KEY (`OffersID`),
  KEY `FK_offers_images` (`ImageID`),
  CONSTRAINT `FK_offers_images` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.offers: ~3 rows (приблизительно)
INSERT INTO `offers` (`OffersID`, `Name`, `Address`, `Price`, `Details`, `Link`, `ImageID`) VALUES
	(1, 'Riekstukalns', 'Riekstukalns, Baldones pagasti, LV-2125', '25€', 'Cool', 'https://www.riekstukalns.lv/lv', 2),
	(2, 'Volvo, Sporta centrs', 'Jūrmalas gatve 78D, Kurzemes rajons, Rīga, LV-1029', 'Publiskā slidošana 6.00 EUR/st.', 'Volvo Sporta centrs ir dibināts 2005.gadā.', 'http://www.volvoledus.lv/lv', 3),
	(3, 'Riga Plaza boulings', 'Mūkusalas iela 71, Rīga, LV-1004, Latvia;', '14€ - 30€', 'DARBA LAIKS  Pirmdiena – Ceturtdiena 10:00 – 22:00 Piektdiena – Svētdiena 10:00 – 24:00', 'https://www.vissparboulingu.lv/jautajums/boulinga-un-izklaides-centrs-fantasy-park/', 6);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
