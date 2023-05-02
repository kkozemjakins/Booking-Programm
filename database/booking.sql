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

-- Дамп структуры для таблица booking.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `CommentText` text CHARACTER SET utf8mb3 COLLATE utf8mb3_latvian_ci,
  `Rating` int DEFAULT NULL,
  `OffersID` int DEFAULT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `FK_comments_customer` (`CustomerID`),
  KEY `FK_comments_offers` (`OffersID`),
  CONSTRAINT `FK_comments_customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comments_offers` FOREIGN KEY (`OffersID`) REFERENCES `offers` (`OffersID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.comments: ~13 rows (приблизительно)
INSERT INTO `comments` (`CommentID`, `CustomerID`, `Date`, `CommentText`, `Rating`, `OffersID`) VALUES
	(1, 1, '2023-04-30 10:00:00', 'This is a great offer!', 5, 2),
	(2, 1, '2023-04-30 11:00:00', 'This is a worst offer!', 1, 3),
	(3, 4, '2023-04-30 11:00:00', 'This is a good offer!', 4, 1),
	(4, 4, '2023-04-30 11:00:00', 'This is a good offer!', 4, 1),
	(5, 4, '2023-04-30 11:00:00', 'This is a nice offer!', 5, 3),
	(6, 4, '2002-05-23 02:03:47', 'This islkl offer!', 2, 1),
	(7, 4, '2023-04-30 11:00:00', 'This is offer!', 1, 3),
	(8, 3, '2023-04-30 11:00:00', 'This islkl offer!', 3, 4),
	(9, 2, '2023-04-30 11:00:00', 'This is offer!', 4, 2),
	(10, 3, '2023-04-30 11:00:00', 'This islkl offer!', 3, 4),
	(11, 2, '2023-04-30 11:00:00', 'This is offer!', 4, 2),
	(12, 1, '2023-04-30 11:00:00', 'This islkl offer!', 3, 4),
	(13, 4, '2023-04-30 11:00:00', 'This is offer!', 3, 3);

-- Дамп структуры для таблица booking.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Access` binary(1) DEFAULT '0',
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.customer: ~11 rows (приблизительно)
INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Email`, `Access`) VALUES
	(1, 'Kirils', 'Kozemjakins', '123456789', 'qwerty@gmail.com', _binary 0x31),
	(2, 'Aleksandrs', 'Loceks', '123456789', 'rvt@gmail.com', _binary 0x31),
	(3, 'Ilja', 'Rimsa', '123456789', 'rimsa@gmail.com', _binary 0x30),
	(4, 'Ivan', 'Aleksejevichs', '123654789', 'ivan@gmail.com', _binary 0x30),
	(5, 'Ilona', 'Grebkova', 'pivoBIseychasj', 'ilona@gmail.com', _binary 0x30),
	(6, 'Maksims', 'Visockis', 'sosiska123', 'sosiska@gmil.com', _binary 0x30),
	(7, 'Olga', 'Pozdnakova', '123456789', 'oland@inbox.lv', _binary 0x30),
	(9, 'Kirils', 'Kozemjakins', 'qwerty12345', 'kirjundelj2@gmail.com', _binary 0x30),
	(10, 'Kirils', 'Kozemjakins', 'qwerty12345', 'kirjundelj3@gmail.com', _binary 0x30),
	(11, 'sdsd', 'sdfsd', '123456789', 'sdfsd@gmail.com', _binary 0x30),
	(12, 'dfgdfgd', 'dfgdfg', '123456', 'sdsdfgs@gmail.com', _binary 0x30),
	(15, 'John', 'Doe', 'password123', 'johndoe@example.com', _binary 0x31),
	(16, 'Jane', 'Doe', 'password456', 'janedoe@example.com', _binary 0x30);

-- Дамп структуры для таблица booking.images
CREATE TABLE IF NOT EXISTS `images` (
  `ImageID` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `type` text,
  `size` int DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`ImageID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.images: ~8 rows (приблизительно)
INSERT INTO `images` (`ImageID`, `name`, `type`, `size`, `path`) VALUES
	(1, 'photo_2023-02-23_07-21-50.jpg', 'image/jpeg', 128400, 'images/photo_2023-02-23_07-21-50.jpg'),
	(2, '1f7c62a3-0d8f-47c8-8229-6dad431c04c2.jpg', 'image/jpeg', 419178, 'images/1f7c62a3-0d8f-47c8-8229-6dad431c04c2.jpg'),
	(3, 'Volvo sporta centrs.jpg', 'image/jpeg', 111491, 'images/Volvo sporta centrs.jpg'),
	(4, 'photo_2023-02-20_08-17-41.jpg', 'image/jpeg', 102985, 'images/photo_2023-02-20_08-17-41.jpg'),
	(6, 'Fantasy-Park.jpg', 'image/jpeg', 112463, 'images/Fantasy-Park.jpg'),
	(7, 'livuAkvaparks.jpg', 'image/jpeg', 802585, 'images/livuAkvaparks.jpg'),
	(20, 'hjs-fasade-2017-min.jpg', 'image/jpeg', 298966, 'images/hjs-fasade-2017-min.jpg');

-- Дамп структуры для таблица booking.offers
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
  CONSTRAINT `FK_offers_images` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.offers: ~17 rows (приблизительно)
INSERT INTO `offers` (`OffersID`, `Name`, `Address`, `Price`, `Details`, `Link`, `ImageID`) VALUES
	(1, 'Riekstukalns', 'Riekstukalns, Baldones pagasti, LV-2125', '25€', 'Cool', 'https://www.riekstukalns.lv/lv', 2),
	(2, 'Volvo, Sporta centrs', 'Jūrmalas gatve 78D, Kurzemes rajons, Rīga, LV-1029', 'Publiskā slidošana 6.00 EUR/st.', 'Volvo Sporta centrs ir dibināts 2005.gadā.', 'http://www.volvoledus.lv/lv', 3),
	(3, 'Riga Plaza boulings', 'Mūkusalas iela 71, Rīga, LV-1004, Latvia;', '14€ - 30€', 'DARBA LAIKS  Pirmdiena – Ceturtdiena 10:00 – 22:00 Piektdiena – Svētdiena 10:00 – 24:00', 'https://www.vissparboulingu.lv/jautajums/boulinga-un-izklaides-centrs-fantasy-park/', 6),
	(4, 'Līvu Akvaparks', 'Viestura iela 24, Jurmala, LV-2010', 'Bērns līdz 5 gadu vecumam - 14,00 € Bērna (6-14 gadi) biļete - 24,10 € Ģimenes biļete (2+1) - 79,80 € Papildus bērns no 6 līdz 14 gadiem ieskaitot - 15,00 € Pieaugušā biļet(18 gadu vecuma) - 31,60 € Skolēnu/studentu biļete - 29,00 €', 'Darba laiks: Piektdien 12:00-21:00 Sestdien 11:00-22:00 Svētdien 11:00-20:00 Pirmdiena Slēgts Otrdiena Slēgts Trešdiena Slēgts Ceturtdien 12:00-21:00', 'https://www.akvaparks.lv/lv/', 7),
	(12, 'Hotel Jūrmala Spa', 'Jomas iela 47/49, Jurmala, LV-2015', '<p>SINGLE VISIT </p>\r\n<p>Working days 2 h. 30 min.	25 EUR/p>\r\n<p>Every next 30 min	8 EUR/p>\r\n<p><p>Weekends, public holidays 1 h. 30 min.	30 EUR/p>\r\n<p>Every next 30 min	10 EUR/p>\r\n<p>For children 4-12 y. o. (saunas, pools) working days 2 h. 30 min.	12 EUR/p>\r\n<p>Every next 30 min	8 EUR/p>\r\n<p>For children 4-12 y. o. (saunas, pools) weekends and public holidays 1 h. 30 min.	15 EUR</p>\r\n<p>Every next 30 min	10 EUR</p>\r\n<p>For children till 3 years (saunas, pools)	free of charge</p>\r\n<p>For families (2+1) (child till 12 y.) on working days 2 h. 30 min.	55 EUR</p>\r\n<p>For families (2+1) (child till 12 y.) on weekends, public holidays 1 h. 30 min.	67 EUR</p>\r\n<p>For families (2+2) (children till 12 y.) on working days 2 h. 30 min.	67 EUR</p>\r\n<p>For families (2+2) (children till 12 y.) on weekends, public holidays 1 h. 30 min.	80 EUR</p>\r\n<p>Large towel (rent)</p>', '<p>-SPA &amp; Beauty treatments- </p> \r\nMore than 200 different SPA treatments will improve your health and well-being. \r\n\r\n<p>-Bars &amp; restaurant- </p>\r\nEnjoy refined meals, great service and beautiful views from our bars and restaurant. \r\n\r\n<p>-Conferences and events- </p>\r\nOur professional team will make your corporate event as well as any other celebration a great success. \r\n\r\n<p>-Entertainment- </p>\r\nThe resort town Jurmala offers a lot of activities and wonderful places to relax and enjoy your hobbies. \r\n\r\n<p>-Rooms- </p>\r\nAll of our comfortable 190 rooms are elegant and have a minibar, TV, air conditioning. The room rate includes also rich breakfast buffet in restaurant Jūrmala, as well as a great relaxation in the', 'https://www.hoteljurmala.com/en', 20),
	(14, 'Apollo Kino', 'Maskavas iela 257, Latgales priekšpilsēta, Rīga, LV-1063', '15 euro', 'Kino teatris', 'https://www.apollokino.lv/', NULL),
	(55, 'Adventure Park', 'Zaļenieki, Zaļenieku pagasts, Babītes novads, LV-2107', '10€ - 20€', 'The adventure park offers various activities such as zip lines, rope bridges, and tree-top obstacles.', 'https://www.adventurepark.lv/en', 2),
	(56, 'Sky High', 'Dzelzavas iela 120A, Rīga, LV-1021', '25€ - 35€', 'Sky High is a trampoline park with a dodgeball court, foam pits, and other activities.', 'https://skyhigh.lv/', 3),
	(57, 'Escape Room', 'Elizabetes iela 10, Rīga, LV-1010', '15€ - 25€', 'Escape Room offers themed rooms where players have to solve puzzles and clues to escape before time runs out.', 'https://escaperoom.lv/', 1),
	(58, 'Baltic Beach Volleyball', 'Baltijas prospekts 23, Jūrmala, LV-2015', '10€ - 20€', 'Baltic Beach Volleyball offers beach volleyball courts for rent.', 'https://www.balticbeach.lv/', 4),
	(59, 'Skate Park', 'Stirnu iela 15, Rīga, LV-1082', 'Free', 'The Skate Park offers a variety of ramps and obstacles for skateboarding.', 'https://www.facebook.com/skateparkliepziedi/', 1),
	(60, 'Laser Tag', 'Maskavas iela 240, Rīga, LV-1063', '10€ - 20€', 'Laser Tag offers laser tag games in an indoor arena.', 'https://www.lasertag.lv/', 2),
	(61, 'Indoor Climbing', 'Maskavas iela 240, Rīga, LV-1063', '10€ - 20€', 'Indoor Climbing offers various climbing walls and challenges.', 'https://www.skatuve.lv/', 4),
	(62, 'Roller Skating', 'A. Deglava iela 161B, Rīga, LV-1026', '5€ - 10€', 'The Roller Skating rink offers roller skating and inline skating.', 'https://www.ritini.lv/', 20);

-- Дамп структуры для таблица booking.offers.infodetailed
CREATE TABLE IF NOT EXISTS `offers.infodetailed` (
  `offersInfoDetailedID` int NOT NULL AUTO_INCREMENT,
  `OffersID` int DEFAULT NULL,
  `Details` int NOT NULL DEFAULT '0',
  `Prices` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`offersInfoDetailedID`),
  KEY `FK_offers.infodetailed_offers` (`OffersID`),
  CONSTRAINT `FK_offers.infodetailed_offers` FOREIGN KEY (`OffersID`) REFERENCES `offers` (`OffersID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.offers.infodetailed: ~0 rows (приблизительно)

-- Дамп структуры для таблица booking.reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationID` int NOT NULL AUTO_INCREMENT,
  `OfferID` int DEFAULT NULL,
  `CustomerID` int DEFAULT NULL,
  `DateOfCreation` datetime DEFAULT NULL,
  `ReservationCode` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `FK_reservation_offers` (`OfferID`),
  KEY `FK_reservation_customer` (`CustomerID`),
  CONSTRAINT `FK_reservation_customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_reservation_offers` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`OffersID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='6443d59b7f5f5\r\n5ece4797eaf5e';

-- Дамп данных таблицы booking.reservation: ~11 rows (приблизительно)
INSERT INTO `reservation` (`ReservationID`, `OfferID`, `CustomerID`, `DateOfCreation`, `ReservationCode`) VALUES
	(2, 1, 3, '2022-04-23 03:13:10', '6443f9860cfe4'),
	(3, 1, 3, '2025-04-23 09:04:30', '6447979ec1860'),
	(4, 14, 3, '2025-04-23 09:39:43', '64479fdf74294'),
	(5, 1, 3, '2025-04-23 11:07:32', '6447b474d9672'),
	(6, 1, 3, '2023-04-30 16:49:53', 'abc123fgfdfgd'),
	(13, 4, 6, '2023-04-30 16:53:12', 'abc123abc122d'),
	(14, 61, 4, '2023-04-30 16:53:30', 'abc133abc122d');

-- Дамп структуры для таблица booking.reservationdetails
CREATE TABLE IF NOT EXISTS `reservationdetails` (
  `ReservationDetailsID` int NOT NULL AUTO_INCREMENT,
  `ReservationID` int DEFAULT NULL,
  `PersonAmount` int DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `SumPrice` int DEFAULT NULL,
  PRIMARY KEY (`ReservationDetailsID`),
  KEY `FK_reservationdetails_reservation` (`ReservationID`),
  CONSTRAINT `FK_reservationdetails_reservation` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Дамп данных таблицы booking.reservationdetails: ~8 rows (приблизительно)
INSERT INTO `reservationdetails` (`ReservationDetailsID`, `ReservationID`, `PersonAmount`, `StartDate`, `EndDate`, `SumPrice`) VALUES
	(2, 2, 5, '2023-04-24 12:30:00', '2023-04-26 15:30:00', 20),
	(3, 3, 2, '2023-04-26 12:10:00', '2023-04-26 16:10:00', 50),
	(4, 4, 2, '2023-04-25 16:40:00', '2023-04-25 18:40:00', 20),
	(5, 5, 2, '2023-04-26 14:10:00', '2023-04-27 14:10:00', 50),
	(6, 6, 2, '2023-05-01 10:00:00', '2023-05-04 12:00:00', 500),
	(11, 13, 2, '2023-05-01 10:00:00', '2023-05-04 12:00:00', 500),
	(12, 14, 2, '2023-05-01 10:00:00', '2023-05-04 12:00:00', 500);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
