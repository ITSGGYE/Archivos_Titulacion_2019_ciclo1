/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.9-MariaDB : Database - colgye
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`colgye` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `colgye`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `apellido` VARCHAR(60) NOT NULL,
  `foto` VARCHAR(255) NOT NULL DEFAULT 'defect.jpg',
  `user` VARCHAR(60) NOT NULL,
  `pass` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

LOCK TABLES `admin` WRITE;

INSERT  INTO `admin`(`id_admin`,`nombre`,`apellido`,`foto`,`user`,`pass`) VALUES (1,'Colegio Guayaquil','Guayaquil','defect.jpg','admin','21232f297a57a5a743894a0e4a801fc3');

UNLOCK TABLES;

/*Table structure for table `albumes` */

DROP TABLE IF EXISTS `albumes`;

CREATE TABLE `albumes` (
  `id_alb` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_alb`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `albumes` */



/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

INSERT  INTO `categoria`(`id_categoria`,`nombre`,`descripcion`) VALUES (1,'Matematicas','Materias'),(2,'Lengua y literatura ','Materias'),(3,'fisica','Materias');

UNLOCK TABLES;

/*Table structure for table `comentario` */

DROP TABLE IF EXISTS `comentario`;

CREATE TABLE `comentario` (
  `id_comentario` INT(11) NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(256) NOT NULL,
  `id_post` INT(11) NOT NULL,
  `id_est` INT(11) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `comentario` */

LOCK TABLES `comentario` WRITE;

UNLOCK TABLES;

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `id_com` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` INT(11) NOT NULL,
  `comentario` TEXT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `publicacion` INT(11) NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `comentarios` */

LOCK TABLES `comentarios` WRITE;

UNLOCK TABLES;

/*Table structure for table `estudiantes` */

DROP TABLE IF EXISTS `estudiantes`;

CREATE TABLE `estudiantes` (
  `id_est` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `apellido` VARCHAR(60) NOT NULL,
  `correo` VARCHAR(60) NOT NULL,
  `cedula` VARCHAR(60) NOT NULL,
  `pass` VARCHAR(60) NOT NULL,
  `foto` VARCHAR(255) NOT NULL DEFAULT 'defect.jpg',
  PRIMARY KEY (`id_est`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `estudiantes` */

LOCK TABLES `estudiantes` WRITE;

UNLOCK TABLES;

/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `id_fot` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  `ruta` VARCHAR(200) NOT NULL DEFAULT 'defect.jpg',
  `album` INT(11) NOT NULL,
  `publicacion` INT(11) NOT NULL,
  PRIMARY KEY (`id_fot`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `fotos` */

LOCK TABLES `fotos` WRITE;


UNLOCK TABLES;

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id_lik` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` INT(11) NOT NULL,
  `post` INT(11) NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`id_lik`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `likes` */

LOCK TABLES `likes` WRITE;

UNLOCK TABLES;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id_post` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(256) NOT NULL,
  `content` TEXT NOT NULL,
  `image` VARCHAR(256) NOT NULL DEFAULT 'defect.jpg',
  `fecha` DATETIME NOT NULL,
  `estado` INT(11) NOT NULL,
  `id_categoria` INT(11) NOT NULL,
  `id_admin` INT(11) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

LOCK TABLES `post` WRITE;


UNLOCK TABLES;

/*Table structure for table `publicaciones` */

DROP TABLE IF EXISTS `publicaciones`;

CREATE TABLE `publicaciones` (
  `id_pub` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` INT(11) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `contenido` TEXT NOT NULL,
  `imagen` INT(11) NOT NULL,
  `album` INT(11) NOT NULL,
  `comentarios` INT(11) NOT NULL,
  `likes` INT(11) NOT NULL,
  PRIMARY KEY (`id_pub`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `publicaciones` */

LOCK TABLES `publicaciones` WRITE;


UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
