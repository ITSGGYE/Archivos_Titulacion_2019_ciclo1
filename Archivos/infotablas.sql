CREATE DATABASE  IF NOT EXISTS `webrestaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `webrestaurant`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: webrestaurant
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `inventarioproductos`
--

DROP TABLE IF EXISTS `inventarioproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventarioproductos` (
  `idseq` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) DEFAULT NULL,
  `nombreProducto` varchar(45) DEFAULT NULL,
  `cantidadProducto` int(11) DEFAULT NULL,
  `precioProducto` double DEFAULT NULL,
  `valorTotal` double DEFAULT NULL,
  `fechaPedido` datetime DEFAULT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`idseq`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventarioproductos`
--

LOCK TABLES `inventarioproductos` WRITE;
/*!40000 ALTER TABLE `inventarioproductos` DISABLE KEYS */;
INSERT INTO `inventarioproductos` VALUES (1,5,'Sopa de Sancocho',1,2.5,2.5,'2019-11-04 16:38:19','igma23'),(2,1,'Arroz con bistec de higado',1,2.5,2.5,'2019-11-05 07:26:01','igma24');
/*!40000 ALTER TABLE `inventarioproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listapeticiones`
--

DROP TABLE IF EXISTS `listapeticiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listapeticiones` (
  `id_Peticiones` int(11) NOT NULL AUTO_INCREMENT,
  `Mensaje_Peticiones` varchar(45) DEFAULT NULL,
  `usuarioPeticion` varchar(25) DEFAULT NULL,
  `fechaPeticion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_Peticiones`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listapeticiones`
--

LOCK TABLES `listapeticiones` WRITE;
/*!40000 ALTER TABLE `listapeticiones` DISABLE KEYS */;
INSERT INTO `listapeticiones` VALUES (1,'Peticion de solicitud de mesero','igma23','2019-11-03 22:38:49'),(2,'Peticion de solicitud de mesero','igma23','2019-11-03 22:41:05'),(3,'Peticion de solicitud de mesero','igma23','2019-11-03 22:41:05'),(4,'Peticion de solicitud de mesero','igma24','2019-11-05 07:24:40');
/*!40000 ALTER TABLE `listapeticiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `contrasena` varchar(15) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'igma23','123456',1),(2,'igma24','123456',2),(3,'MESA 1','123456',2),(4,'MESA 2','123456',2);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `img_producto` varchar(255) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Arroz con bistec de higado','imagenes/img1.jpg',1,2.5,0,'I'),(2,'Arroz con pollo a la bbq','imagenes/img2.jpg',1,2.5,0,'I'),(3,'Arroz Mixto','imagenes/img3.jpg',1,2.5,0,'I'),(4,'Arroz con pollo y verdura','imagenes/img4.jpg',1,2.5,0,'I'),(5,'Bandeja Paisa','imagenes/img5.jpg',1,3,0,'A'),(6,'Camarones Reventados','imagenes/img6.png',1,2.5,0,'A'),(7,'Cazuela de Mariscos','imagenes/img7.jpg',1,3,0,'A'),(8,'Ensalada y carne a la plancha','imagenes/img8.png',1,2.5,0,'A'),(9,'Ensalada y pescado rebosado','imagenes/img9.png',1,2.5,0,'A'),(10,'Frijoles con Chicharron','imagenes/img10.jpg',1,2.5,0,'A'),(11,'Arroz con menestra y carne frita','imagenes/img11.png',1,2.5,0,'A'),(12,'Arroz con menestra y chuleta a la plancha','imagenes/img12.png',1,2.5,0,'A');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-08  6:46:55
