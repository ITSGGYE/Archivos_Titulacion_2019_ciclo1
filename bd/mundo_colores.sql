-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mundo_colores
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alumno` varchar(100) NOT NULL,
  `lugnacimiento_alumno` varchar(100) NOT NULL,
  `fechanac_alumno` date DEFAULT NULL,
  `nacionalidad_alumno` varchar(10) NOT NULL,
  `repite_alumno` varchar(2) NOT NULL,
  `cedula_alumno` varchar(10) DEFAULT NULL,
  `nescuela_alumno` varchar(100) NOT NULL,
  `lescuela_alumno` varchar(100) NOT NULL,
  `imagen_alumno` int(11) NOT NULL,
  `npadre_alumno` varchar(200) NOT NULL,
  `opadre_alumno` varchar(200) NOT NULL,
  `nmadre_alumno` varchar(200) NOT NULL,
  `omadre_alumno` varchar(200) NOT NULL,
  `nrepresentante_alumno` varchar(200) NOT NULL,
  `crepresentante_alumno` varchar(200) NOT NULL,
  `drepresentante_alumno` varchar(200) NOT NULL,
  `trepresentante_alumno` varchar(10) NOT NULL,
  `rfamiliar_alumno` varchar(200) NOT NULL,
  `fechareg_alumno` date DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aniolectivo`
--

DROP TABLE IF EXISTS `aniolectivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aniolectivo` (
  `id_aniolectivo` smallint(6) NOT NULL AUTO_INCREMENT,
  `anio_lectivo` char(12) NOT NULL,
  `estado_aniolectivo` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_aniolectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aniolectivo`
--

LOCK TABLES `aniolectivo` WRITE;
/*!40000 ALTER TABLE `aniolectivo` DISABLE KEYS */;
INSERT INTO `aniolectivo` VALUES (1,'2019-2020','1');
/*!40000 ALTER TABLE `aniolectivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Curso` varchar(30) NOT NULL,
  `estado_Curso` char(1) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Inicial2','1');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_alumno`
--

DROP TABLE IF EXISTS `img_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_alumno` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_alumno`
--

LOCK TABLES `img_alumno` WRITE;
/*!40000 ALTER TABLE `img_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `img_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_profesor`
--

DROP TABLE IF EXISTS `img_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_profesor` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_profesor`
--

LOCK TABLES `img_profesor` WRITE;
/*!40000 ALTER TABLE `img_profesor` DISABLE KEYS */;
INSERT INTO `img_profesor` VALUES (1,'avatar.jpg','../../Imagenes/Profesores/avatar.jpg','2019-10-02'),(2,'CEDULA F ICAZA 001.jpg','../../Imagenes/Profesores/CEDULA F ICAZA 001.jpg','2019-10-02');
/*!40000 ALTER TABLE `img_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_profesor` varchar(100) NOT NULL,
  `direccion_profesor` varchar(100) NOT NULL,
  `telefono_profesor` varchar(10) NOT NULL,
  `celular_profesor` varchar(100) NOT NULL,
  `cedula_profesor` varchar(10) NOT NULL,
  `email_profesor` varchar(100) NOT NULL,
  `fechanac_profesor` date DEFAULT NULL,
  `titulo_profesor` varchar(100) NOT NULL,
  `genero_profesor` char(1) NOT NULL,
  `imagen_profesor` int(11) NOT NULL,
  `fechareg_profesor` date DEFAULT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (1,'Icaza Paredes Jose Alfredo','Guayacanes Mz 232 Villa 15','042621550','0960615169','0927190181','jaicaza24@hotmail.com','1990-06-06','Docente','M',1,'2019-10-02');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fk_profesor` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` tinytext NOT NULL,
  `privilegio` char(5) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_profesor` (`fk_profesor`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (0001,1,'jaicaza19','a6fbd18875df986c957ba793852613fbe845f63d','1','2019-10-02');
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

-- Dump completed on 2019-10-02  9:26:29
