-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for booking
CREATE DATABASE IF NOT EXISTS `booking` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `booking`;

-- Dumping structure for table booking.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int DEFAULT NULL,
  `OffersID` int DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `CommentText` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `Rating` int DEFAULT NULL,
  `CommentCode` char(13) DEFAULT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `FK_comments_customer` (`CustomerID`),
  KEY `FK_comments_offers` (`OffersID`),
  CONSTRAINT `FK_comments_customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  CONSTRAINT `FK_comments_offers` FOREIGN KEY (`OffersID`) REFERENCES `offers` (`OffersID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.comments: ~1 rows (approximately)
INSERT INTO `comments` (`CommentID`, `CustomerID`, `OffersID`, `Date`, `CommentText`, `Rating`, `CommentCode`) VALUES
	(1, 3, 1, '2028-04-23 07:04:18', 'Great place to spend weekend ', 5, '644b6ff2e97a4');

-- Dumping structure for table booking.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Access` int DEFAULT '0',
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.customer: ~5 rows (approximately)
INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Email`, `Access`) VALUES
	(1, 'Kirils', 'Kozemjakins', 'qwerty12345', 'qwerty@gmail.com', 1),
	(2, 'Aleksandrs', 'Loceks', '123456789', 'rvt@gmail.com', 1),
	(3, 'Ilja', 'Rimsa', '123456789', 'rimsa@gmail.com', 0),
	(4, 'Ivan', 'Aleksejevichs', '123654789', 'ivan@gmail.com', 0),
	(5, 'Ilona', 'Grebkova', 'pivoBIseychasj', 'ilona@gmail.com', 0),
	(6, 'Maksims', 'Visockis', 'sosiska123', 'sosiska@gmil.com', 0),
	(7, 'Olga', 'Pozdnakova', '123456789', 'oland@inbox.lv', 0),
	(9, 'Kirils', 'Kozemjakins', 'qwerty12345', 'kirjundelj2@gmail.com', 0),
	(10, 'Kirils', 'Kozemjakins', 'qwerty12345', 'kirjundelj3@gmail.com', 0);

-- Dumping structure for table booking.images
CREATE TABLE IF NOT EXISTS `images` (
  `ImageID` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `type` text,
  `size` int DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`ImageID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.images: ~8 rows (approximately)
INSERT INTO `images` (`ImageID`, `name`, `type`, `size`, `path`) VALUES
	(1, 'photo_2023-02-23_07-21-50.jpg', 'image/jpeg', 128400, 'images/photo_2023-02-23_07-21-50.jpg'),
	(2, '1f7c62a3-0d8f-47c8-8229-6dad431c04c2.jpg', 'image/jpeg', 419178, 'images/1f7c62a3-0d8f-47c8-8229-6dad431c04c2.jpg'),
	(3, 'Volvo sporta centrs.jpg', 'image/jpeg', 111491, 'images/Volvo sporta centrs.jpg'),
	(4, 'photo_2023-02-20_08-17-41.jpg', 'image/jpeg', 102985, 'images/photo_2023-02-20_08-17-41.jpg'),
	(6, 'Fantasy-Park.jpg', 'image/jpeg', 112463, 'images/Fantasy-Park.jpg'),
	(7, 'livuAkvaparks.jpg', 'image/jpeg', 802585, 'images/livuAkvaparks.jpg'),
	(20, 'hjs-fasade-2017-min.jpg', 'image/jpeg', 298966, 'images/hjs-fasade-2017-min.jpg'),
	(21, 'rvt.jpg', 'image/jpeg', 280818, 'images/rvt.jpg');

-- Dumping structure for table booking.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `OffersID` int NOT NULL AUTO_INCREMENT,
  `Name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `Address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `Price` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `Details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `Link` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `ImageID` int DEFAULT NULL,
  PRIMARY KEY (`OffersID`),
  KEY `FK_offers_images` (`ImageID`),
  CONSTRAINT `FK_offers_images` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.offers: ~0 rows (approximately)
INSERT INTO `offers` (`OffersID`, `Name`, `Address`, `Price`, `Details`, `Link`, `ImageID`) VALUES
	(1, 'Riekstukalns', 'Riekstukalns, Baldones pagasti, LV-2125', '25€', 'Cool', 'https://www.riekstukalns.lv/lv', 2),
	(2, 'Volvo, Sporta centrs', 'Jūrmalas gatve 78D, Kurzemes rajons, Rīga, LV-1029', 'Publiskā slidošana 6.00 EUR/st.', 'Volvo Sporta centrs ir dibināts 2005.gadā.', 'http://www.volvoledus.lv/lv', 3),
	(3, 'Riga Plaza boulings', 'Mūkusalas iela 71, Rīga, LV-1004, Latvia;', '14€ - 30€', 'DARBA LAIKS  Pirmdiena – Ceturtdiena 10:00 – 22:00 Piektdiena – Svētdiena 10:00 – 24:00', 'https://www.vissparboulingu.lv/jautajums/boulinga-un-izklaides-centrs-fantasy-park/', 6),
	(4, 'Līvu Akvaparks', 'Viestura iela 24, Jurmala, LV-2010', 'Bērns līdz 5 gadu vecumam - 14,00 € Bērna (6-14 gadi) biļete - 24,10 € Ģimenes biļete (2+1) - 79,80 € Papildus bērns no 6 līdz 14 gadiem ieskaitot - 15,00 € Pieaugušā biļet(18 gadu vecuma) - 31,60 € Skolēnu/studentu biļete - 29,00 €', 'Darba laiks: Piektdien 12:00-21:00 Sestdien 11:00-22:00 Svētdien 11:00-20:00 Pirmdiena Slēgts Otrdiena Slēgts Trešdiena Slēgts Ceturtdien 12:00-21:00', 'https://www.akvaparks.lv/lv/', 7),
	(12, 'Hotel Jūrmala Spa', 'Jomas iela 47/49, Jurmala, LV-2015', '<p>SINGLE VISIT </p>\r\n<p>Working days 2 h. 30 min.	25 EUR/p>\r\n<p>Every next 30 min	8 EUR/p>\r\n<p><p>Weekends, public holidays 1 h. 30 min.	30 EUR/p>\r\n<p>Every next 30 min	10 EUR/p>\r\n<p>For children 4-12 y. o. (saunas, pools) working days 2 h. 30 min.	12 EUR/p>\r\n<p>Every next 30 min	8 EUR/p>\r\n<p>For children 4-12 y. o. (saunas, pools) weekends and public holidays 1 h. 30 min.	15 EUR</p>\r\n<p>Every next 30 min	10 EUR</p>\r\n<p>For children till 3 years (saunas, pools)	free of charge</p>\r\n<p>For families (2+1) (child till 12 y.) on working days 2 h. 30 min.	55 EUR</p>\r\n<p>For families (2+1) (child till 12 y.) on weekends, public holidays 1 h. 30 min.	67 EUR</p>\r\n<p>For families (2+2) (children till 12 y.) on working days 2 h. 30 min.	67 EUR</p>\r\n<p>For families (2+2) (children till 12 y.) on weekends, public holidays 1 h. 30 min.	80 EUR</p>\r\n<p>Large towel (rent)</p>', '<p>-SPA &amp; Beauty treatments- </p> \r\nMore than 200 different SPA treatments will improve your health and well-being. \r\n\r\n<p>-Bars &amp; restaurant- </p>\r\nEnjoy refined meals, great service and beautiful views from our bars and restaurant. \r\n\r\n<p>-Conferences and events- </p>\r\nOur professional team will make your corporate event as well as any other celebration a great success. \r\n\r\n<p>-Entertainment- </p>\r\nThe resort town Jurmala offers a lot of activities and wonderful places to relax and enjoy your hobbies. \r\n\r\n<p>-Rooms- </p>\r\nAll of our comfortable 190 rooms are elegant and have a minibar, TV, air conditioning. The room rate includes also rich breakfast buffet in restaurant Jūrmala, as well as a great relaxation in the', 'https://www.hoteljurmala.com/en', 20),
	(13, 'Rīgas Valsts Tehnikums', 'Krišjāņa Valdemāra iela 1C, Centra rajons, Rīga, LV-1010', 'For free', 'Riga State Technical School is a secondary specialized educational institution in Riga. Founded December 29, 1919.', 'https://www.rvt.lv/', 21);

-- Dumping structure for table booking.offers.infodetailed
CREATE TABLE IF NOT EXISTS `offers.infodetailed` (
  `offersInfoDetailedID` int NOT NULL AUTO_INCREMENT,
  `OffersID` int DEFAULT NULL,
  `Details` int NOT NULL DEFAULT '0',
  `Prices` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`offersInfoDetailedID`),
  KEY `FK_offers.infodetailed_offers` (`OffersID`),
  CONSTRAINT `FK_offers.infodetailed_offers` FOREIGN KEY (`OffersID`) REFERENCES `offers` (`OffersID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table booking.offers.infodetailed: ~0 rows (approximately)

-- Dumping structure for table booking.reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationID` int NOT NULL AUTO_INCREMENT,
  `OfferID` int DEFAULT NULL,
  `CustomerID` int DEFAULT NULL,
  `DateOfCreation` datetime DEFAULT NULL,
  `ReservationCode` char(13) DEFAULT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `FK_reservation_offers` (`OfferID`),
  KEY `FK_reservation_customer` (`CustomerID`),
  CONSTRAINT `FK_reservation_customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  CONSTRAINT `FK_reservation_offers` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`OffersID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.reservation: ~0 rows (approximately)
INSERT INTO `reservation` (`ReservationID`, `OfferID`, `CustomerID`, `DateOfCreation`, `ReservationCode`) VALUES
	(1, 1, 3, '2028-04-23 06:18:30', '644b6536e401d');

-- Dumping structure for table booking.reservationdetails
CREATE TABLE IF NOT EXISTS `reservationdetails` (
  `ReservationDetailsID` int NOT NULL AUTO_INCREMENT,
  `ReservationID` int DEFAULT NULL,
  `PersonAmount` int DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `SumPrice` int DEFAULT NULL,
  PRIMARY KEY (`ReservationDetailsID`),
  KEY `FK_reservationdetails_reservation` (`ReservationID`),
  CONSTRAINT `FK_reservationdetails_reservation` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table booking.reservationdetails: ~0 rows (approximately)
INSERT INTO `reservationdetails` (`ReservationDetailsID`, `ReservationID`, `PersonAmount`, `StartDate`, `EndDate`, `SumPrice`) VALUES
	(1, 1, 2, '2023-04-28 10:50:00', '2023-04-28 13:50:00', 50);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
