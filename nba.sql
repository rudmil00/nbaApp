/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.21-MariaDB : Database - nba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nba` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nba`;

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `cityID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cityName` varchar(40) NOT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `city` */

insert  into `city`(`cityID`,`cityName`) values 
(1,'Los Angeles'),
(2,'Miami'),
(3,'New York'),
(4,'Denver'),
(5,'Okalhoma'),
(6,'Atlanta'),
(7,'Boston'),
(8,'Utah'),
(9,'New Orleans'),
(10,'Orlando');

/*Table structure for table `player` */

DROP TABLE IF EXISTS `player`;

CREATE TABLE `player` (
  `playerID` int(11) NOT NULL AUTO_INCREMENT,
  `playerName` varchar(30) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `teamID` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `ppg` float NOT NULL COMMENT 'Points Per Game',
  `apg` float NOT NULL COMMENT 'Assists Per Game',
  PRIMARY KEY (`playerID`),
  KEY `teamID` (`teamID`),
  CONSTRAINT `player_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `player` */

insert  into `player`(`playerID`,`playerName`,`lastname`,`teamID`,`country`,`ppg`,`apg`) values 
(1,'Lebron','James',1,'USA',24,23),
(2,'Anthony','Davis',1,'USA',21.2,11.2),
(3,'Russel','Westbrook',1,'USA',15.3,4.5),
(4,'Kendrick','Nunn',1,'Srbija',18.2,6.2),
(5,'Derick','Rose',2,'Srbija',18.2,12.2),
(6,'Julius','Randle',2,'Dickeland',12.2,22.1),
(7,'Steve','Novak',3,'Serbia',11,12),
(8,'Jason','Tatum',3,'USA',29.5,8.7),
(9,'Jaylen','Brown',3,'USA',23.3,3.4),
(10,'Wayne','Gabriel',1,'USA',12,11.3),
(11,'Alex','Caruso',1,'Canada',11.2,1.1),
(12,'Marcus','Smart',3,'USA',18.4,5.4),
(13,'Alex','Hoford',3,'Cuba',11.1,12.2);

/*Table structure for table `team` */

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(50) NOT NULL,
  `titles` int(11) NOT NULL,
  `head_coach` varchar(30) NOT NULL,
  `founded` date NOT NULL,
  `cityID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`teamID`),
  KEY `cityID` (`cityID`),
  CONSTRAINT `team_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

/*Data for the table `team` */

insert  into `team`(`teamID`,`teamName`,`titles`,`head_coach`,`founded`,`cityID`) values 
(1,'Los Angeles Lakers',13,'Ham','1945-02-02',1),
(2,'New York Knicks',2,'Koach','1925-01-01',3),
(3,'Boston Celtics',2,'Steve Karager','2022-12-14',7);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`) values 
(1,'admin','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
