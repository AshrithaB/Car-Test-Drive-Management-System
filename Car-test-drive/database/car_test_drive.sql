-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2018 at 06:23 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `SearchCompany`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchCompany`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Company = page AND c.Car_id = cd.Car_id$$

DROP PROCEDURE IF EXISTS `SearchModel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchModel`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Model = page AND c.Car_id = cd.Car_id$$

DROP PROCEDURE IF EXISTS `SearchType`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchType`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Type = page AND c.Car_id = cd.Car_id$$

DROP PROCEDURE IF EXISTS `SearchPrice`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchPrice`(IN `page` INT(10)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Price <= page AND c.Car_id = cd.Car_id$$

DROP PROCEDURE IF EXISTS `SearchMileage`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchMileage`(IN `page` INT(10)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE cd.Mileage >= page AND c.Car_id = cd.Car_id$$

DELIMITER ;


DROP TABLE IF EXISTS `ADMIN_LOGIN`;
CREATE TABLE IF NOT EXISTS `ADMIN_LOGIN` ( 
	`A_login_id` VARCHAR(30) NOT NULL , 
	`A_password` VARCHAR(30) NOT NULL , 
	`A_name` VARCHAR(30) NOT NULL , 
	`A_mobile` BIGINT(10) NOT NULL ,  
	PRIMARY KEY (`A_login_id`)) ENGINE = MyISAM;

INSERT INTO ADMIN_LOGIN VALUES ( 'root@gmail.in','root123','Aabhu', 9876543211); 


DROP TABLE IF EXISTS `USER_LOGIN`;
CREATE TABLE IF NOT EXISTS `USER_LOGIN` ( 
	`U_login_id` VARCHAR(30) NOT NULL , 
	`U_password` VARCHAR(30) NOT NULL , 
	`U_name` VARCHAR(30) NOT NULL , 
	`U_mobile` BIGINT(10) NOT NULL ,  
	PRIMARY KEY (`U_login_id`)) ENGINE = MyISAM;

INSERT INTO USER_LOGIN VALUES ('Nidhi17@gmail.in', '12345' , 'NIDHI', 9743764612); 
INSERT INTO USER_LOGIN VALUES ('Arjun16@hotmail.in', '67890' , 'ARJUN', 9734564085); 
INSERT INTO USER_LOGIN VALUES ('Rahul18@yahoo.in', 'rahul18' ,' RAHUL', 9749866538); 


DROP TABLE IF EXISTS `CAR`;
CREATE TABLE IF NOT EXISTS `CAR` ( 
	`Car_id` INT(10) NOT NULL , 
	`Company` VARCHAR(30) NOT NULL , 
	`Model` VARCHAR(30) NOT NULL , 
	`Type` VARCHAR(30) NOT NULL , 
	`Price` INT(10) NOT NULL , 
	PRIMARY KEY (`Car_id`)) ENGINE = MyISAM;

INSERT INTO CAR VALUES (001,'KIA','SELTOS','AUTOMATIC', 12); 
INSERT INTO CAR VALUES (002, 'KIA', 'SPORTAGE','AUTOMATIC', 15); 
INSERT INTO CAR VALUES (003,'HONDA', 'HONDACITY', 'MANUAL', 9); 
INSERT INTO CAR VALUES (004, 'HONDA', 'AMAZE', 'MANUAL', 11); 
INSERT INTO CAR VALUES (005, 'HYUNDAI', 'CRETA', 'AUTOMATIC', 18); 


DROP TABLE IF EXISTS `CAR_DESIGN`;
CREATE TABLE IF NOT EXISTS `CAR_DESIGN` ( 
	`Car_id` INT(10) NOT NULL , 
	`Length` INT(10) NOT NULL , 
	`Width` INT(10) NOT NULL ,
	`Seating_capacity` INT(10) NOT NULL , 
	`Colour` VARCHAR(30) NOT NULL , 
	`Fuel` VARCHAR(30) NOT NULL , 
	`Mileage` INT(10) NOT NULL , 
	PRIMARY KEY (`Car_id`) ,
	INDEX (`Car_id`),
	FOREIGN KEY (`Car_id`) REFERENCES `CAR` (`Car_id`) ON DELETE CASCADE) ENGINE = MyISAM;

INSERT INTO CAR_DESIGN VALUES (001, 4315, 1800, 5, 'RED','DIESEL', 20); 
INSERT INTO CAR_DESIGN VALUES (002, 4440, 1855, 5, 'BLACK','DIESEL', 11); 
INSERT INTO CAR_DESIGN VALUES (003, 4440, 1495, 7, 'BLUE','DIESEL', 21); 
INSERT INTO CAR_DESIGN VALUES (004, 4315, 1695, 5, 'WHITE','DIESEL', 25); 
INSERT INTO CAR_DESIGN VALUES (005, 4270, 1780, 7, 'GREY','DIESEL', 17);


DROP TABLE IF EXISTS `TEST_SLOT`;
CREATE TABLE IF NOT EXISTS `TEST_SLOT` ( 
	`Slot_id` INT(10) NOT NULL AUTO_INCREMENT ,
	`Car_id` INT(10) NOT NULL, 
	`Book_date` DATE NOT NULL , 
	`Start_time` TIME NOT NULL ,
	`End_time` TIME NOT NULL , 
	`U_login_id` VARCHAR(30) NOT NULL , 
	PRIMARY KEY (`Slot_id`), 
	INDEX (`U_login_id`,`Car_id`),
	FOREIGN KEY (`Car_id`) REFERENCES `CAR` (`Car_id`) ON DELETE CASCADE,
	FOREIGN KEY (`U_login_id`) REFERENCES `USER_LOGIN` (`U_login_id`) ON DELETE CASCADE) ENGINE = MyISAM;

INSERT INTO TEST_SLOT(Car_id,Book_date,Start_time,End_time,U_login_id) VALUES (001,'23-11-19', '10:00', '11:00', 'Nidhi17@gmail.in'); 
INSERT INTO TEST_SLOT(Car_id,Book_date,Start_time,End_time,U_login_id) VALUES (003, '23-11-19', '12:00',' 1:00', 'Rahul18@yahoo.in'); 
INSERT INTO TEST_SLOT(Car_id,Book_date,Start_time,End_time,U_login_id) VALUES (005, '10-12-19', '3:00', '4:00', 'Arjun16@hotmail.in'); 


DROP TABLE IF EXISTS `FEEDBACK`;
CREATE TABLE IF NOT EXISTS `FEEDBACK` ( 
	`Model` VARCHAR(30) NOT NULL , 
	`Rating` INT(10) NOT NULL , 
	`Comment` VARCHAR(30) NOT NULL , 
	`A_login_id` VARCHAR(30) NULL DEFAULT 'root@gmail.in' , 
	`U_login_id` VARCHAR(30) NOT NULL , 
	PRIMARY KEY (`Model`, `U_login_id`), 
	INDEX (`U_login_id`,`A_login_id`),
	FOREIGN KEY (`U_login_id`) REFERENCES `USER_LOGIN` (`U_login_id`) ON DELETE CASCADE,
	FOREIGN KEY (`A_login_id`) REFERENCES `ADMIN_LOGIN` (`A_login_id`) ON DELETE CASCADE) ENGINE = MyISAM;

INSERT INTO FEEDBACK ( Model, Rating, Comment, U_login_id) VALUES  ('CRETA', 3 , 'NICE PICKUP','Esha01@gmail.in'); 
INSERT INTO FEEDBACK ( Model, Rating, Comment, U_login_id) VALUES ('SPORTAGE', 4 , 'DEFINITELY RECOMMANDABLE', 'Nidhi17@gmail.in'); 
INSERT INTO FEEDBACK ( Model, Rating, Comment, U_login_id) VALUES  ('SPORTAGE', 4, ' IT WAS VERY COMFORTABLE', 'Arjun16@hotmail.in'); 
INSERT INTO FEEDBACK ( Model, Rating, Comment, U_login_id) VALUES  ('SELTOS', 4 , 'RECOMMANDABLE',' Rahul18@yahoo.in'); 
INSERT INTO FEEDBACK ( Model, Rating, Comment, U_login_id) VALUES  ('HONDACITY', 2 , 'NOT RECOMMANDABLE ','Nisha001@gmail.com');


DROP TABLE IF EXISTS `SLOT_LOCATION`;
CREATE TABLE IF NOT EXISTS `SLOT_LOCATION` ( 
	`Slot_id` INT(10) NOT NULL , 
	`Location` VARCHAR(30) NOT NULL , 
	PRIMARY KEY (`Slot_id`),
	INDEX(`Slot_id`),
	FOREIGN KEY (`Slot_id`) REFERENCES `TEST_SLOT` (`Slot_id`) ON DELETE CASCADE) ENGINE = MyISAM;

INSERT INTO SLOT_LOCATION VALUES ( 02,'RR NAGAR');   
INSERT INTO SLOT_LOCATION VALUES ( 01,'JAYANAGAR'); 
INSERT INTO SLOT_LOCATION VALUES ( 03,'WHITE FEILD');

