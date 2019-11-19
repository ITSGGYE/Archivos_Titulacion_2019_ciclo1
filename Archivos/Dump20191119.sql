CREATE DATABASE  IF NOT EXISTS `La_Bodeguita` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `La_Bodeguita`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 35.177.223.225    Database: La_Bodeguita
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (62,'angel_bcr12@hotmail.com','kkkk'),(63,'angel_bcr12@hotmail.com','jjlkknk'),(64,'angel_bcr12@hotmail.com','knlnln\r\n'),(65,'angel_bcr12@hotmail.com','dkjdk'),(66,'angel_bcr12@live.com','Jdjdj');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `codigo_postal` varchar(20) NOT NULL,
  `movil` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Ange','Bolivar','Cruz','Sauces','Guayas','090523','0980232449','5465151','angel_bcr12@hotmail.com','d33e07efcd8ed51fb1edb5f0f502ef5c',1),(2,'Ange','Bolivar','Cruz','sgsg','gfgsg','gsgg','gg','sgsg','angel_bcr@hotmail.com','9fdbdb397c9eb706f11907251e85a90c',1),(3,'Bolivar','opfffd','dfdggfg','dfgdg','fdgdfgd','ffgdgd','dfgdgh','dfgd','abcruz@est.itsgg.edu.ec','9fdbdb397c9eb706f11907251e85a90c',1),(4,'Daniel','i','Ullauri','Sauces 1','Guayas','593','099913456','0955393','hola@gmail.com','4d186321c1a7f0f354b297e8914ab240',0),(5,'luis','garcia','roberto','tirunfoq','fwsdsd','23456','34567654','3456654','d@d.com','1aabac6d068eef6a7bad3fdf50a05cc8',1),(6,'sofhia7885','magdalena','llamuca','cdlahuancavilca','guayas','eerg4','0961005728','51555k','sofy_mllp@hotmail.com','0eab71099a896520c213c59c1a3c2959',1),(7,'Gabriel','Angel','Ramos','Mapasingue este','Guayas','090101','2002002','0998333','garm310897@gmail.com','ecfa92122cc4a3cb3d63309a78753531',1),(8,'Marilyn','Briggette','Franco','Bastion popular bloq 10 Mz 1252 Sl 23','Guayas','98401','0985100188','2144173','francofernandezmarilyn@gmail.com','a0d78b9e26635d22934af64529655dbd',1),(9,'Edgar','Olmedo','Andrade','colinas al sol','Guayas','090112','0986703360','','edgar@hotmail.com','8cff9bf6694dccfc3b6a613d05d51d16',1);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (4,'Vodka Siberian Citrus 750 ml','5.45','85284035548815761Vodka siberian citrus.jpg','Siberian','Bebidas'),(13,'Menta Helada','0.10','49543651394976324Menta helada.jpg','Colombina','Cigarrillos y Caramelos'),(290,'Charro Silver 750 ml','12.32','81285849821400758charro-silver-750ml.jpg','El charro tequila silver','Bebidas'),(5970,'Pizzerolas','0.50','88213575915021712tostitos-pizzerolas.png','Inalecsa','Snacks'),(7803,'Ciclon lata 500 ml','2.00','28382308289039297Ciclon lata.png','Ciclon Energy Drink','Bebidas'),(21678,'Doritos','0.50','65295627707234301Doritos.jpg','Frito-Lay','Snacks'),(22980,'Vodka Siberian Cranberry 750 ml','5.45','75639752055034109Siberian Cranberry.jpg','Siberian','Bebidas'),(30969,'Marlboro rojo','0.40','26108521097227539Marlboro rojo.jpg','Marlboro','Cigarrillos y Caramelos'),(33414,'Pilsener 355 cm','7.50','44746527225256041Pilsener 355 cm sixpack.jpg','Pilsener','Bebidas'),(45207,'Tortolines naturales','0.50','25527859497502435Tortolines.png','Inalecsa','Snacks'),(53737,'Doña Dominga Merlot 750 ml','6.24','14490558527797925Doña dominga.png','Doña Dominga','Bebidas'),(96747,'Menta Glacial','0.10','81665463402537217Menta.jpg','La Universal','Cigarrillos y Caramelos'),(110261,'Agua Cielo','0.60','42249336515225464botella de agua cielo.png','AJE','Bebidas'),(642267,'Caramelo Halls','0.10','28104141142811658caramelo-halls-mentol-minorista.jpg','Halls','Cigarrillos y Caramelos'),(3726819,'Riskos','0.50','46304040352180177Riskos.png','Inalecsa','Snacks'),(6990376,'Saritas sabor a crema y cebolla','0.50','56541637722671977Saritas crema y cebolla.png','Inalecsa','Snacks'),(9251113,'Tostachos','0.50','9980787006907923tostachos.png','Inalecsa','Snacks');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `product` (`product_id`),
  CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,110261,117),(2,33414,50),(3,53737,40),(4,290,27),(5,4,30),(6,22980,32),(7,7803,24),(8,45207,44),(9,21678,60),(10,3726819,65),(11,6990376,55),(12,5970,25),(13,9251113,30),(14,13,70),(15,96747,100),(16,642267,65),(17,30969,20);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `amount` float(5,2) NOT NULL,
  `order_stat` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `IDCUSTOMER_idx` (`customerid`),
  CONSTRAINT `IDCUSTOMER` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (86,1,12.32,'En Espera','2019-10-16','19:28:20','Sauces'),(87,1,7.50,'En Espera','2019-10-16','19:29:01','Sauces'),(88,4,53.85,'Confirmado','2019-10-16','20:24:28','Sauces 1'),(89,1,19.19,'Confirmado','2019-10-18','19:06:35','Sauces'),(90,1,12.95,'Confirmado','2019-10-18','19:07:31','Sauces'),(91,1,0.60,'Confirmado','2019-10-19','14:27:42','Sauces'),(92,1,2.00,'Confirmado','2019-10-19','16:13:26','Sauces'),(93,1,0.60,'Cancelado','2019-11-14','00:42:10','Sauces'),(94,7,12.82,'Confirmado','2019-11-14','10:16:30','Mapasingue este'),(95,1,0.60,'Confirmado','2019-11-14','12:46:11','Sauces'),(96,1,6.24,'En Espera','2019-11-14','13:04:08','Sauces'),(97,1,28.48,'En Espera','2019-11-14','14:01:52','Sauces'),(98,8,35.54,'Confirmado','2019-11-14','14:07:06','Bastion popular bloq 10 Mz 1252 Sl 23'),(99,1,0.60,'Confirmado','2019-11-14','14:17:58','Sauces'),(100,8,6.74,'En Espera','2019-11-14','14:19:57','Bastion popular bloq 10 Mz 1252 Sl 23'),(101,9,5.45,'Confirmado','2019-11-14','21:19:37','colinas al sol');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_detail`
--

DROP TABLE IF EXISTS `transaction_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaction_detail` (
  `transacton_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  PRIMARY KEY (`transacton_detail_id`),
  KEY `TRANSACTION_idx` (`transaction_id`),
  CONSTRAINT `TRANSACTION_ID` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail`
--

LOCK TABLES `transaction_detail` WRITE;
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;
INSERT INTO `transaction_detail` VALUES (138,6630,1,86),(139,8876091,1,87),(140,8876091,5,88),(141,347,3,88),(142,8876091,1,89),(143,84469,1,89),(144,347,1,89),(145,8876091,1,90),(146,347,1,90),(147,110261,1,91),(148,7803,1,92),(149,110261,1,93),(150,290,1,94),(151,45207,1,94),(152,110261,1,95),(153,53737,1,96),(154,53737,2,97),(155,33414,2,97),(156,3726819,2,97),(157,22980,2,98),(158,290,2,98),(159,110261,1,99),(160,53737,1,100),(161,6990376,1,100),(162,22980,1,101);
/*!40000 ALTER TABLE `transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'La_Bodeguita'
--

--
-- Dumping routines for database 'La_Bodeguita'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-19  8:16:16
