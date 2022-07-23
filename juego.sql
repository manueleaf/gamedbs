/*
SQLyog Ultimate v9.02 
MySQL - 5.6.20 : Database - mundo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mundo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mundo`;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `AreaID` int(255) NOT NULL AUTO_INCREMENT,
  `AreaName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AreaID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`AreaID`,`AreaName`) values (1,'Pasto'),(2,'Piso'),(3,'Flores'),(4,'Muelle');

/*Table structure for table `monster` */

DROP TABLE IF EXISTS `monster`;

CREATE TABLE `monster` (
  `MonsterID` int(30) NOT NULL AUTO_INCREMENT,
  `MonsterName` varchar(255) DEFAULT NULL,
  `Attack` int(25) DEFAULT NULL,
  `Defense` int(25) DEFAULT NULL,
  `Sp_Attack` int(25) DEFAULT NULL,
  `Sp_Defense` int(25) DEFAULT NULL,
  `Speed` int(25) DEFAULT NULL,
  PRIMARY KEY (`MonsterID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `monster` */

insert  into `monster`(`MonsterID`,`MonsterName`,`Attack`,`Defense`,`Sp_Attack`,`Sp_Defense`,`Speed`) values (1,'Slime',10,10,5,5,15),(2,'Oruga',5,5,3,3,5);

/*Table structure for table `monsterarea` */

DROP TABLE IF EXISTS `monsterarea`;

CREATE TABLE `monsterarea` (
  `MonsterAreaID` int(30) NOT NULL AUTO_INCREMENT,
  `AreaID` int(30) NOT NULL,
  `MonsterID` int(30) NOT NULL,
  PRIMARY KEY (`MonsterAreaID`),
  KEY `FK_monsterarea` (`AreaID`),
  KEY `FK_monsterid` (`MonsterID`),
  CONSTRAINT `FK_monsterarea` FOREIGN KEY (`AreaID`) REFERENCES `area` (`AreaID`),
  CONSTRAINT `FK_monsterid` FOREIGN KEY (`MonsterID`) REFERENCES `monster` (`MonsterID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `monsterarea` */

insert  into `monsterarea`(`MonsterAreaID`,`AreaID`,`MonsterID`) values (1,3,2),(2,1,1),(3,2,1);

/*Table structure for table `monstermove` */

DROP TABLE IF EXISTS `monstermove`;

CREATE TABLE `monstermove` (
  `MonsterMoveID` int(255) NOT NULL AUTO_INCREMENT,
  `MoveID` int(25) DEFAULT NULL,
  `MonsterID` int(25) DEFAULT NULL,
  PRIMARY KEY (`MonsterMoveID`),
  KEY `FK_monster` (`MonsterID`),
  KEY `FK_move` (`MoveID`),
  CONSTRAINT `FK_monster` FOREIGN KEY (`MonsterID`) REFERENCES `monster` (`MonsterID`),
  CONSTRAINT `FK_move` FOREIGN KEY (`MoveID`) REFERENCES `moves` (`MoveID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `monstermove` */

insert  into `monstermove`(`MonsterMoveID`,`MoveID`,`MonsterID`) values (2,1,1);

/*Table structure for table `moves` */

DROP TABLE IF EXISTS `moves`;

CREATE TABLE `moves` (
  `MoveID` int(11) NOT NULL AUTO_INCREMENT,
  `MovePower` int(11) DEFAULT NULL,
  `MovePoints` int(11) DEFAULT NULL,
  `MoveAccuarcy` int(11) DEFAULT NULL,
  `MoveName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MoveID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `moves` */

insert  into `moves`(`MoveID`,`MovePower`,`MovePoints`,`MoveAccuarcy`,`MoveName`) values (1,40,25,90,'Golpe');

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `rol` */

insert  into `rol`(`id`,`nombre_rol`) values (1,'usuario'),(2,'admin');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT '1',
  `pwd` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuario` (`rol_id`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`username`,`email`,`rol_id`,`pwd`,`nombre`) values (1,'manueleaf','manueleaf@gmail.com',1,'$2y$10$/wXxM2zECq2nPyKEn0j4SevOtaNWBEpKxLZ8c7JBZkBk6qiofDTmC','Manuel'),(2,'asd','prueba@falso.com',2,'$2y$10$HmAWIq35muTT4SVeVSfbTelN4.vMLLt/OjN5A3nvlMA6MtrP/pmLi','asd');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
