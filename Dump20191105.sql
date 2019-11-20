-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 35.178.43.117    Database: ebenedent
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `act_pacientes`
--

DROP TABLE IF EXISTS `act_pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `act_pacientes` (
  `fecha` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act_pacientes`
--

LOCK TABLES `act_pacientes` WRITE;
/*!40000 ALTER TABLE `act_pacientes` DISABLE KEYS */;
INSERT INTO `act_pacientes` VALUES ('2019-04-25',1),('2019-11-01',5);
/*!40000 ALTER TABLE `act_pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` varchar(200) NOT NULL,
  `cedula_paciente` varchar(13) NOT NULL,
  `nota` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cita` (`id_cita`),
  KEY `cedula_paciente` (`cedula_paciente`),
  CONSTRAINT `paciente_cita` FOREIGN KEY (`cedula_paciente`) REFERENCES `personas` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (30,'CT-','0951274901','limpieza dental','2019-11-04','08:00:00',0),(31,'CT-31','0951274901','limpieza dental','2019-11-03','08:30:00',1),(32,'CT-32','0951274901','limpieza dental','2019-11-04','10:00:00',0),(33,'CT-33','0951274901','limpieza dental','2019-11-20','07:01:00',1);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historias_clinicas`
--

DROP TABLE IF EXISTS `historias_clinicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historias_clinicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` varchar(200) NOT NULL,
  `cedula_paciente` varchar(13) NOT NULL,
  `motivo` text NOT NULL,
  `descripcion` text NOT NULL,
  `prescripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `precio` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cita_UNIQUE` (`id_cita`),
  KEY `historia_paciente` (`cedula_paciente`),
  CONSTRAINT `historia_cita` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`),
  CONSTRAINT `historia_paciente` FOREIGN KEY (`cedula_paciente`) REFERENCES `personas` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historias_clinicas`
--

LOCK TABLES `historias_clinicas` WRITE;
/*!40000 ALTER TABLE `historias_clinicas` DISABLE KEYS */;
INSERT INTO `historias_clinicas` VALUES (24,'CT-','0951274901','limpieza dental','          Se realizo una limpieza de diente ','        Lavarse los dientes 3 veces al día correctamente \r\n ','2019-11-04',0.00),(26,'CT-32','0951274901','limpieza dental','          ','          ','2019-11-04',10.00);
/*!40000 ALTER TABLE `historias_clinicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(13) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `type_persona` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `persona_type` (`type_persona`),
  CONSTRAINT `persona_type` FOREIGN KEY (`type_persona`) REFERENCES `type_personas` (`type_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'ADMINISTRADOR','ADMINISTRADOR','0994492096','Mapasingue Este','1994-09-24',1,1),(24,'ASISTENTE','ASISTENTE','0000000000','NULL','1999-01-01',2,1),(25,'0955901293','Evelin Merchan Rodriguez','0985606846','Mapasingue Este','2019-11-19',1,1),(26,'0951274901','Adela Vargas','0990303375','Mapasingue Este','1997-05-30',3,1),(27,'0987654321','johanna Montaño','0995245123','Mapasingue Este','1997-05-30',2,1),(28,'0955901290','Evelyn','0955901295','Mapasingue Este','1997-05-30',2,1),(29,'080074621','Narcisa Montaño','0999393933','mapasingue','1972-07-20',3,1),(30,'099887766','Andy Panta','09828272727','urdesa','1999-09-21',3,1);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_rol` (`type_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,1,'ADMINISTRADOR'),(2,2,'ASISTENTE'),(3,3,'PACIENTE');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_personas`
--

DROP TABLE IF EXISTS `type_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_persona` int(11) NOT NULL,
  `type_nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_persona` (`type_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_personas`
--

LOCK TABLES `type_personas` WRITE;
/*!40000 ALTER TABLE `type_personas` DISABLE KEYS */;
INSERT INTO `type_personas` VALUES (1,1,'ADMINISTRADOR'),(2,2,'ASISTENTE'),(3,3,'PACIENTE');
/*!40000 ALTER TABLE `type_personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_usuario` varchar(13) NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_usuario` (`cedula_usuario`),
  UNIQUE KEY `user` (`user`),
  KEY `usuario_rol` (`rol`),
  CONSTRAINT `usuario_paciente` FOREIGN KEY (`cedula_usuario`) REFERENCES `personas` (`cedula`),
  CONSTRAINT `usuario_rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`type_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'ADMINISTRADOR','ADMINISTRADOR','81dc9bdb52d04dc20036dbd8313ed055',1,1),(12,'0955901293','evelin','81dc9bdb52d04dc20036dbd8313ed055',1,1),(13,'0987654321','adelaV','81dc9bdb52d04dc20036dbd8313ed055',2,1),(14,'0955901290','Adel','81dc9bdb52d04dc20036dbd8313ed055',2,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-05 14:16:52
