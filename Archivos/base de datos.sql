CREATE DATABASE  IF NOT EXISTS `agripublic_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `agripublic_db`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: agripublic_db
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Dumping data for table `detalle_factura`
--

LOCK TABLES `detalle_factura` WRITE;
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
INSERT INTO `detalle_factura` VALUES (1,1,NULL,1,0,'A',NULL),(2,2,3,1,0,'A',NULL),(4,4,3,1,34,'A',NULL),(5,5,3,1,34,'A',NULL),(6,6,3,1,34,'A',NULL),(7,7,3,4,34,'A',NULL),(8,8,3,1,34,'A',NULL),(9,9,3,1,34,'A',NULL),(10,10,3,1,34,'A',NULL),(11,10,3,1,34,'A',NULL),(12,10,3,1,34,'A',NULL),(13,11,3,1,34,'A',NULL),(14,11,3,1,34,'A',NULL),(15,12,3,1,34,'A',NULL),(16,12,3,1,34,'A',NULL),(17,13,4,3,3.5,'A',NULL),(18,14,4,1,3.5,'A',NULL),(19,15,4,1,3.5,'A',NULL),(20,16,4,1,3.5,'A',NULL),(21,17,4,1,3.5,'A',NULL),(22,18,4,1,3.5,'A',NULL),(23,19,4,1,3.5,'A',NULL),(24,20,4,1,3.5,'A',NULL),(25,21,4,1,3.5,'A',NULL),(26,22,4,1,3.5,'A',NULL),(27,23,4,1,3.5,'A',NULL),(28,24,4,1,3.5,'A',NULL),(29,25,4,1,3.5,'A',NULL),(30,26,4,1,3.5,'A',NULL),(31,27,6,1,1800,'A',NULL),(32,28,7,1,20,'A',NULL),(33,29,4,1,40,'A',NULL),(34,30,7,1,20,'A',NULL),(35,31,3,1,65,'A',NULL),(36,32,3,1,65,'A',NULL),(37,32,5,1,40,'A',NULL),(38,32,4,1,40,'A',NULL),(39,33,7,1,20,'A',NULL),(40,33,4,1,40,'A',NULL),(41,33,3,1,65,'A',NULL),(42,33,5,1,40,'A',NULL),(43,33,6,1,25,'A',NULL),(44,34,3,1,65,'A',NULL),(45,34,7,1,20,'A',NULL),(46,34,5,1,40,'A',NULL),(47,35,6,4,25,'A',NULL),(48,35,5,2,40,'A',NULL),(49,36,8,1,0,'A',NULL),(50,36,7,1,20,'A',NULL),(51,36,9,1,1.5,'A',NULL),(52,37,7,1,20,'A',NULL),(53,37,9,1,1.5,'A',NULL),(54,37,8,1,0,'A',NULL),(55,38,9,1,1.5,'A',NULL),(56,38,7,1,20,'A',NULL),(57,38,5,1,40,'A',NULL),(58,39,6,3,25,'A',NULL),(59,39,8,2,12.6,'A',NULL),(60,39,3,10,65,'A',NULL),(61,40,8,1,12.6,'A',NULL),(62,40,1,1,23,'A',NULL),(63,40,9,1,1.5,'A',NULL),(64,41,3,1,65,'A',NULL),(65,41,9,100,1.5,'A',NULL),(66,42,4,5,40,'A',NULL),(67,42,1,2,23,'A',NULL),(68,42,5,5,40,'A',NULL),(69,42,10,2,50,'A',NULL),(70,43,4,25,40,'A',NULL),(71,43,9,20,1.5,'A',NULL),(72,43,8,25,12.6,'A',NULL);
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,1,'2019-10-17','A',34,4.08,38.08),(2,1,'2019-10-17','A',34,4.08,38.08),(4,1,'2019-10-17','A',34,4.08,38.08),(5,1,'2019-10-17','A',34,4.08,38.08),(6,1,'2019-10-17','A',34,4.08,38.08),(7,1,'2019-10-17','A',136,16.32,152.32),(8,1,'2019-10-17','A',34,4.08,38.08),(9,1,'2019-10-17','A',34,4.08,38.08),(10,1,'2019-10-17','A',102,12.24,114.24),(11,1,'2019-10-17','A',68,8.16,76.16),(12,1,'2019-10-17','A',68,8.16,76.16),(13,104,'2019-10-17','A',10.5,1.26,11.76),(14,104,'2019-10-17','A',3.5,0.42,3.92),(15,104,'2019-10-17','A',3.5,0.42,3.92),(16,104,'2019-10-17','A',3.5,0.42,3.92),(17,104,'2019-10-17','A',3.5,0.42,3.92),(18,104,'2019-10-17','A',3.5,0.42,3.92),(19,104,'2019-10-17','A',3.5,0.42,3.92),(20,104,'2019-10-17','A',3.5,0.42,3.92),(21,104,'2019-10-17','A',3.5,0.42,3.92),(22,104,'2019-10-17','A',3.5,0.42,3.92),(23,1,'2019-10-25','A',3.5,0.42,3.92),(24,1,'2019-10-25','A',3.5,0.42,3.92),(25,106,'2019-10-25','A',3.5,0.42,3.92),(26,104,'2019-10-25','A',3.5,0.42,3.92),(27,1,'2019-10-25','A',1800,216,2016),(28,1,'2019-10-27','A',20,2.4,22.4),(29,107,'2019-10-28','A',40,4.8,44.8),(30,107,'2019-10-28','A',20,2.4,22.4),(31,1,'2019-10-28','A',65,7.8,72.8),(32,1,'2019-10-28','A',145,17.4,162.4),(33,1,'2019-10-28','A',190,22.8,212.8),(34,107,'2019-10-28','A',125,15,140),(35,108,'2019-10-28','A',180,21.6,201.6),(36,107,'2019-10-30','A',21.5,2.58,24.08),(37,107,'2019-10-30','A',21.5,2.58,24.08),(38,105,'2019-10-30','A',61.5,7.38,68.88),(39,100,'2019-11-06','A',750.2,90.02,840.22),(40,109,'2019-11-06','A',37.1,4.45,41.55),(41,101,'2019-11-06','A',215,25.8,240.8),(42,102,'2019-11-06','A',546,65.52,611.52),(43,106,'2019-11-06','A',1345,161.4,1506.4);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_kardex`
--

LOCK TABLES `in_kardex` WRITE;
/*!40000 ALTER TABLE `in_kardex` DISABLE KEYS */;
INSERT INTO `in_kardex` VALUES (1,1,'2019-04-07',50,10,0,100,0,'A','2019-04-07','0000','2019-10-27','ssotomayor',1),(2,1,'2019-04-07',20,20,0,23,0,'A','2019-04-07','0000',NULL,NULL,2),(3,1,'2019-04-07',5,25,20,34,23,'A','2019-04-07','0000',NULL,NULL,2),(4,2,'2019-04-07',2,23,25,34,34,'A','2019-04-07','0000',NULL,NULL,3),(5,2,'2019-10-17',1,22,23,34,34,'A','2019-10-17','0000',NULL,NULL,3),(6,2,'2019-10-17',1,21,22,34,34,'A','2019-10-17','0000',NULL,NULL,3),(7,2,'2019-10-17',1,20,21,34,34,'A','2019-10-17','0000',NULL,NULL,3),(8,2,'2019-10-17',4,16,20,34,34,'A','2019-10-17','0000',NULL,NULL,3),(9,2,'2019-10-17',1,15,16,34,34,'A','2019-10-17','0000',NULL,NULL,3),(10,2,'2019-10-17',1,14,15,34,34,'A','2019-10-17','0000',NULL,NULL,3),(11,2,'2019-10-17',1,13,14,34,34,'A','2019-10-17','0000',NULL,NULL,3),(12,2,'2019-10-17',1,12,13,34,34,'A','2019-10-17','0000',NULL,NULL,3),(13,2,'2019-10-17',1,11,12,34,34,'A','2019-10-17','0000',NULL,NULL,3),(14,1,'2019-10-17',10,10,0,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(15,2,'2019-10-17',3,7,10,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(16,2,'2019-10-17',1,6,7,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(17,2,'2019-10-17',1,5,6,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(18,2,'2019-10-17',1,4,5,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(19,2,'2019-10-17',1,3,4,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(20,2,'2019-10-17',1,2,3,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(21,2,'2019-10-17',1,1,2,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(22,2,'2019-10-17',1,0,1,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(23,2,'2019-10-17',1,-1,0,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(24,2,'2019-10-17',1,-2,-1,2,0,'A','2019-10-17','ssotomayor',NULL,NULL,4),(25,2,'2019-10-25',1,-3,-2,2,0,'A','2019-10-25','ssotomayor',NULL,NULL,4),(26,2,'2019-10-25',1,-4,-3,2,0,'A','2019-10-25','ssotomayor',NULL,NULL,4),(27,1,'2019-10-25',15,-4,11,34,34,'A','2019-10-25','ssotomayor','2019-10-27','ssotomayor',3),(28,2,'2019-10-25',3,50,0,0,0,'A','2019-10-25','ssotomayor','2019-10-25','ssotomayor',5),(29,2,'2019-10-25',30,20,50,25,0,'A','2019-10-25','ssotomayor','2019-10-25','ssotomayor',5),(30,1,'2019-10-25',20,16,-4,0,2,'A','2019-10-25','ssotomayor',NULL,NULL,4),(31,2,'2019-10-25',1,15,16,0,2,'A','2019-10-25','ssotomayor',NULL,NULL,4),(32,2,'2019-10-25',1,14,15,0,2,'A','2019-10-25','ssotomayor',NULL,NULL,4),(33,2,'2019-10-25',5,35,0,0,0,'A','2019-10-25','ssotomayor','2019-10-25','ssotomayor',6),(34,2,'2019-10-25',1,34,35,0,0,'A','2019-10-25','ssotomayor',NULL,NULL,6),(35,1,'2019-10-25',20,34,14,10,0,'A','2019-10-25','ssotomayor',NULL,NULL,4),(36,1,'2019-10-27',50,50,0,10,0,'A','2019-10-27','ssotomayor',NULL,NULL,7),(37,1,'2019-10-27',100,134,34,34,10,'A','2019-10-27','ssotomayor',NULL,NULL,4),(38,1,'2019-10-27',100,120,20,25,25,'A','2019-10-27','ssotomayor',NULL,NULL,5),(39,1,'2019-10-27',100,96,-4,35,34,'A','2019-10-27','ssotomayor',NULL,NULL,3),(40,1,'2019-10-27',200,334,134,35,34,'A','2019-10-27','ssotomayor',NULL,NULL,4),(41,1,'2019-10-27',100,134,34,35,0,'A','2019-10-27','ssotomayor',NULL,NULL,6),(42,1,'2019-10-27',100,150,50,55,10,'A','2019-10-27','ssotomayor',NULL,NULL,7),(43,2,'2019-10-27',1,149,150,55,10,'A','2019-10-27','ssotomayor',NULL,NULL,7),(44,1,'2019-10-28',400,734,334,0,35,'A','2019-10-28','ssotomayor',NULL,NULL,4),(45,2,'2019-10-28',1,733,734,0,35,'A','2019-10-28','ssotomayor',NULL,NULL,4),(46,1,'2019-10-28',400,496,96,0,35,'A','2019-10-28','ssotomayor',NULL,NULL,3),(47,1,'2019-10-28',400,520,120,0,25,'A','2019-10-28','ssotomayor',NULL,NULL,5),(48,1,'2019-10-28',400,534,134,0,35,'A','2019-10-28','ssotomayor',NULL,NULL,6),(49,1,'2019-10-28',400,549,149,0,55,'A','2019-10-28','ssotomayor',NULL,NULL,7),(50,2,'2019-10-28',1,548,549,0,55,'A','2019-10-28','ssotomayor',NULL,NULL,7),(51,2,'2019-10-28',1,495,496,0,35,'A','2019-10-28','ssotomayor',NULL,NULL,3),(52,2,'2019-10-28',1,519,520,0,25,'A','2019-10-28','ssotomayor',NULL,NULL,5),(53,2,'2019-10-28',1,547,548,0,55,'A','2019-10-28','ssotomayor',NULL,NULL,7),(54,2,'2019-10-28',1,546,547,0,55,'A','2019-10-28','ssotomayor',NULL,NULL,7),(55,1,'2019-10-28',100,100,0,30,0,'A','2019-10-28','ssotomayor',NULL,NULL,8),(56,2,'2019-10-28',2,517,519,0,25,'A','2019-10-28','ssotomayor',NULL,NULL,5),(57,1,'2019-10-30',100,100,0,1,0,'A','2019-10-30','ssotomayor',NULL,NULL,9),(58,2,'2019-10-30',1,545,546,0,55,'A','2019-10-30','ssotomayor',NULL,NULL,7),(59,2,'2019-10-30',1,544,545,0,55,'A','2019-10-30','ssotomayor',NULL,NULL,7),(60,2,'2019-10-30',1,543,544,0,55,'A','2019-10-30','ssotomayor',NULL,NULL,7),(61,1,'2019-10-30',100,100,0,45,0,'A','2019-10-30','ssotomayor',NULL,NULL,10),(62,2,'2019-11-06',10,485,495,0,35,'A','2019-11-06','ssotomayor',NULL,NULL,3),(63,2,'2019-11-06',1,99,100,30,0,'A','2019-11-06','ssotomayor',NULL,NULL,8),(64,2,'2019-11-06',100,0,100,1,0,'A','2019-11-06','ssotomayor',NULL,NULL,9),(65,2,'2019-11-06',2,98,100,45,0,'A','2019-11-06','ssotomayor',NULL,NULL,10),(66,1,'2019-11-06',600,600,0,0,1,'A','2019-11-06','ssotomayor',NULL,NULL,9),(67,2,'2019-11-06',25,708,733,0,35,'A','2019-11-06','ssotomayor',NULL,NULL,4);
/*!40000 ALTER TABLE `in_kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_medidas`
--

LOCK TABLES `in_medidas` WRITE;
/*!40000 ALTER TABLE `in_medidas` DISABLE KEYS */;
INSERT INTO `in_medidas` VALUES (1,'120 x 400','A','2019-01-01','admin',NULL,NULL),(2,'30 x 40','A','2019-01-02','admin',NULL,NULL),(3,'12 x 5','A','2019-01-02','admin',NULL,NULL),(4,'8 x 8','A','2019-10-17','admin',NULL,NULL),(5,'16 x 100','A','2019-10-17','admin',NULL,NULL);
/*!40000 ALTER TABLE `in_medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_parametros_generales`
--

LOCK TABLES `in_parametros_generales` WRITE;
/*!40000 ALTER TABLE `in_parametros_generales` DISABLE KEYS */;
INSERT INTO `in_parametros_generales` VALUES ('IVA',NULL,12,NULL,'A','2019-01-01','ADMIN',NULL,NULL);
/*!40000 ALTER TABLE `in_parametros_generales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_producto`
--

LOCK TABLES `in_producto` WRITE;
/*!40000 ALTER TABLE `in_producto` DISABLE KEYS */;
INSERT INTO `in_producto` VALUES (1,'PORTA SOBRE ACRILICA',2,'A',2,'2019-04-07','0000','2019-10-30','ssotomayor'),(2,'LAMPARA SEREOLOGICA',2,'A',1,'2019-04-07','0000','2019-10-30','ssotomayor'),(3,'TABLA DE GRUPO SANGUINEO',2,'A',2,'2019-04-08','0000','2019-10-27','ssotomayor'),(4,'GRADILLA 16X100',2,'A',5,'2019-10-17','ssotomayor','2019-11-06','ssotomayor'),(5,'GRADILLA DE 120x400',2,'A',1,'2019-10-25','ssotomayor','2019-10-27','ssotomayor'),(6,'TABLE DE HEMATOCRITO',2,'A',5,'2019-10-25','ssotomayor','2019-10-27','ssotomayor'),(7,'TABLA DE WIDALL',2,'A',2,'2019-10-27','ssotomayor',NULL,NULL),(8,'GRADILLA 12X100',2,'A',2,'2019-10-28','ssotomayor',NULL,NULL),(9,'LLAVEROS ACRILICOS',2,'A',3,'2019-10-30','ssotomayor',NULL,NULL),(10,'BUZON ACRILICO',2,'A',2,'2019-10-30','ssotomayor',NULL,NULL);
/*!40000 ALTER TABLE `in_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_tarifario`
--

LOCK TABLES `in_tarifario` WRITE;
/*!40000 ALTER TABLE `in_tarifario` DISABLE KEYS */;
INSERT INTO `in_tarifario` VALUES (1,1,23,'A','S','2019-04-10','0000',NULL,NULL),(2,3,67,'I','S','2019-04-10','0000',NULL,NULL),(3,3,34,'A','S','2019-04-10','0000',NULL,NULL),(4,4,35,'A','S','2019-10-17','ssotomayor','2019-10-27','ssotomayor'),(5,5,25,'A','S','2019-10-25','ssotomayor','2019-10-27','ssotomayor'),(6,6,18,'A','S','2019-10-25','ssotomayor','2019-10-27','ssotomayor'),(7,7,15,'A','S','2019-10-27','ssotomayor',NULL,NULL),(8,3,65,'A','S','2019-10-27','ssotomayor',NULL,NULL),(9,4,40,'A','S','2019-10-27','ssotomayor',NULL,NULL),(10,5,40,'A','S','2019-10-27','ssotomayor',NULL,NULL),(11,6,25,'A','S','2019-10-27','ssotomayor',NULL,NULL),(12,7,20,'A','S','2019-10-27','ssotomayor',NULL,NULL),(13,8,35,'I','S','2019-10-28','ssotomayor','2019-11-06','ssotomayor'),(14,8,12.6,'A','S','2019-10-28','ssotomayor','2019-11-06','ssotomayor'),(15,9,1.5,'A','S','2019-10-30','ssotomayor','2019-11-06','ssotomayor'),(16,10,50,'A','S','2019-10-30','ssotomayor',NULL,NULL);
/*!40000 ALTER TABLE `in_tarifario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_tipo_movimiento`
--

LOCK TABLES `in_tipo_movimiento` WRITE;
/*!40000 ALTER TABLE `in_tipo_movimiento` DISABLE KEYS */;
INSERT INTO `in_tipo_movimiento` VALUES (1,'Ingreso por Compras','A','2019-01-01','admin',NULL,NULL,1),(2,'Egreso por Venta','A','2019-01-01','admin',NULL,NULL,2),(3,'Ingreso por Ajuntes','A','2019-01-01','admin',NULL,NULL,1),(4,'Egresso por Ajuste','A','2019-01-01',NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `in_tipo_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `in_tipo_producto`
--

LOCK TABLES `in_tipo_producto` WRITE;
/*!40000 ALTER TABLE `in_tipo_producto` DISABLE KEYS */;
INSERT INTO `in_tipo_producto` VALUES (1,'Materia Prima','A','2019-01-01','admin',NULL,NULL),(2,'Producto Terminado','A','2019-01-01','admin',NULL,NULL);
/*!40000 ALTER TABLE `in_tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pr_detalle_formula`
--

LOCK TABLES `pr_detalle_formula` WRITE;
/*!40000 ALTER TABLE `pr_detalle_formula` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_detalle_formula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pr_formulas`
--

LOCK TABLES `pr_formulas` WRITE;
/*!40000 ALTER TABLE `pr_formulas` DISABLE KEYS */;
INSERT INTO `pr_formulas` VALUES (1,'formula 1','A','2019-04-10','0000','2019-10-25','Coello25',4),(2,'formula 2','A','2019-04-10','0000',NULL,NULL,3),(3,'formula 3','A','2019-10-25','Coello25',NULL,NULL,5);
/*!40000 ALTER TABLE `pr_formulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_empresas`
--

LOCK TABLES `se_empresas` WRITE;
/*!40000 ALTER TABLE `se_empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_opciones`
--

LOCK TABLES `se_opciones` WRITE;
/*!40000 ALTER TABLE `se_opciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_opciones_roles`
--

LOCK TABLES `se_opciones_roles` WRITE;
/*!40000 ALTER TABLE `se_opciones_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_opciones_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_persona`
--

LOCK TABLES `se_persona` WRITE;
/*!40000 ALTER TABLE `se_persona` DISABLE KEYS */;
INSERT INTO `se_persona` VALUES (1,'Juan Andres','Alvarado Quezada','duran panorama','1984-02-02','I','admin','2018-06-01','ssotomayor','2019-10-25','0933445566'),(100,'SALOME','SOTOMAYOR AMADOR','NUEVOS HORIZONTES','2019-04-03','A',NULL,NULL,'ssotomayor','2019-10-30','0957033798'),(101,'ANDRES','RIOS','VENTANA','2019-04-09','A',NULL,NULL,'ssotomayor','2019-10-30','1206736165'),(102,'SILVIA','RIOS ','LOJA','2019-04-17','A','Admin','2019-04-06','ssotomayor','2019-10-30','1203570666'),(103,'SALMA','SOTOMAYOR','EL RECREO 5 ETAPA','2019-04-02','A','Admin','2019-04-06','ssotomayor','2019-10-30','0953673480'),(104,'Scarlett','Sotomayor','administrador del sistema','2019-10-17','A','0000','2019-10-17','ssotomayor','2019-10-30','0940524853'),(105,'Angres','Gomez','09877','2019-10-25','A','ssotomayor','2019-10-25',NULL,NULL,'0988776565'),(106,'Jefferson juan ','Coello','sauces 8','2019-10-01','A','ssotomayor','2019-10-25','Coello25','2019-10-25','098765456'),(107,'DELIA ALICIA','SOTOMAYOR AMADOR','ELOY ALFARO','2019-10-09','A','ssotomayor','2019-10-27',NULL,NULL,'0940524846'),(108,'CARLOS','VAZCONES','GUAYAQUIL','2019-10-09','A','ssotomayor','2019-10-28','ssotomayor','2019-10-28','0908910055'),(109,'CONSUMIDOR FINAL',NULL,'0','2019-11-05','A','ssotomayor','2019-11-06',NULL,NULL,'0000000000'),(110,'ROBERT','PINARGOTE','DURAN 5TA ETAPA','1979-11-30','A','ssotomayor','2019-11-14',NULL,NULL,'0940440126'),(111,'JAIME RUBEN','TADAY CURICAMA','DURAN EL RECREO 5TA ETAPA','1996-12-02','A','ssotomayor','2019-11-14',NULL,NULL,'0603764747'),(112,'FIDEL','SOTOMAYOR','RECREO 5TA ETAPA','1968-12-31','A','ssotomayor','2019-11-14',NULL,NULL,'0800858680'),(113,'EDGAR','ANDRADE','COLINAS AL SOL','1991-11-16','A','ssotomayor','2019-11-14',NULL,NULL,'0930044888');
/*!40000 ALTER TABLE `se_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_roles`
--

LOCK TABLES `se_roles` WRITE;
/*!40000 ALTER TABLE `se_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_sucursales`
--

LOCK TABLES `se_sucursales` WRITE;
/*!40000 ALTER TABLE `se_sucursales` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_usuario`
--

LOCK TABLES `se_usuario` WRITE;
/*!40000 ALTER TABLE `se_usuario` DISABLE KEYS */;
INSERT INTO `se_usuario` VALUES ('',106,'1234567','jeff@gmail.com','3087564','0987678765','I','2019-10-25','ssotomayor','2019-10-25','Coello25'),('0000',100,'1234556','0000@gmail.com','8989890','90890890','A','2019-04-06','Admin',NULL,NULL),('agomez',105,'123456','agomez@gmail.com','098766','00998776656','A','2019-10-25','ssotomayor',NULL,NULL),('Coello25',106,'1234567','jeff@gmail.com','3087564','0987678765','I','2019-10-25','ssotomayor','2019-10-25','Coello25'),('DCARLOS',108,'0000','CARLOS@HOTMAIL.COM',NULL,NULL,'A','2019-10-28','ssotomayor',NULL,NULL),('DELIA',107,'1234','deliaalicia@hotmail.com','676908',NULL,'A','2019-10-27','ssotomayor',NULL,NULL),('jandrade',100,'123455','jandrade@gmail.com','09089443','32424244','A','2019-04-06','Admin','2019-04-06','Admin'),('JJEFFER',106,'1234567','jeff@gmail.com','3087564','0987678765','I','2019-10-25','ssotomayor','2019-10-25','ssotomayor'),('Per009',101,'12345',NULL,NULL,NULL,'A','2019-11-14','ssotomayor',NULL,NULL),('ssotomayor',104,'123456','oscar_obandoc@hotmail.com','043443333','0923434557','A','2019-10-17','0000',NULL,NULL);
/*!40000 ALTER TABLE `se_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_usuario_sucursal`
--

LOCK TABLES `se_usuario_sucursal` WRITE;
/*!40000 ALTER TABLE `se_usuario_sucursal` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_usuario_sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `se_usuario_sucursal_rol`
--

LOCK TABLES `se_usuario_sucursal_rol` WRITE;
/*!40000 ALTER TABLE `se_usuario_sucursal_rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_usuario_sucursal_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'agripublic_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-19 13:20:30
