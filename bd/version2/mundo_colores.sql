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
  `fechanac_alumno` date DEFAULT NULL,
  `nacionalidad_alumno` varchar(10) NOT NULL,
  `cedula_alumno` varchar(10) DEFAULT NULL,
  `nescuela_alumno` varchar(100) NOT NULL,
  `imagen_alumno` int(11) NOT NULL,
  `emg_alumno` varchar(2) NOT NULL,
  `telf_alumno` varchar(12) NOT NULL,
  `direc_alumno` varchar(100) NOT NULL,
  `docum_alumno` varchar(2) NOT NULL,
  `cond_alumno` varchar(2) NOT NULL,
  `obser_alumno` varchar(200) NOT NULL,
  `fechareg_alumno` date DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,'Vaca astudillo mico','1990-10-10','Peruano','209784521','La vaca mentirsa',0,'2','04122522','La floresta  mx45225','2','2','Esta persona miente mucho','2019-10-03'),(2,'xcacacac','1990-10-10','x','1','l',0,'1','1','x','1','1','l','2019-10-03'),(3,'x','1990-10-10','x','1','x',0,'1','1','x','1','1','la vaca miente nueva mente','2019-10-03'),(4,'o','1990-10-14','k','k','s',0,'1','k','10','1','1','skksks','2019-10-03'),(5,'Icaza Paredes Jose Alfredo','1990-06-06','Ecuatorian','0999999','Ninguno',0,'3','999999','Guayacanes mz232','2','2','El mejor de todos segundo tercerpo','2019-10-03'),(6,'k','1990-10-10','l','l','l',0,'1','l','la casa de la vaca','1','1','kksks','2019-10-08'),(7,'vaca mientte','1990-10-10','l','l','l',0,'1','l','l','1','1','ll','2019-10-08'),(8,'kksk','1990-10-10','k','k','koooo',0,'1','k','k','1','1','ksksks','2019-10-08'),(9,'vaca mu mu','1990-10-10','l','l','l',0,'1','l','l','1','1','llsl','2019-10-08'),(10,'lkkkk','1990-10-10','jjsjsj','1','klls',0,'2','sjjsj','1','2','2','skksklslsl','2019-10-08'),(11,'kkoooooo','1990-10-10','vaca','a','jsjs',0,'1','a','a','1','1','vacac mamamam','2019-10-08'),(12,'K','1990-10-10','l','l','l',0,'1','l','1','1','2','slsllsls','2019-10-08'),(13,'KSKSK','1990-10-10','SKLSL','LSL','Ñ',0,'2','LSLS','SK','2','1','SSÑñññññ','2019-10-08'),(14,'vaca vaca vaca','1990-10-10','sjsjjs','11','jsjsj',0,'1','112','ksksk','1','1','skskksk','2019-10-09'),(15,'vaca','1990-10-10','skks','k','lsll',0,'1','ks','2lll','1','1','sslsljjjj','2019-10-09'),(16,'hsjjsjs','1990-10-10','ksksk','k','lsl',16,'1','k','jsjs','1','1','sjsjjs','2019-10-09'),(17,'Peña Suarez Alejandra Mónica','1990-10-10','sjsjs','llsl','lsls',17,'1','sjsj','jsj','1','1','lslslsl','2019-10-09'),(18,'jsjjsj','1990-10-10','msks','555','ksksk',18,'1','44','sskks','1','1','skskks','2019-10-18'),(19,'lllsl','1990-10-10','lslsl','lslsl','sllsl',19,'1','122','11','1','1','skskks','2019-10-18');
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
INSERT INTO `curso` VALUES (1,'2 Años','1');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_alumno`
--

DROP TABLE IF EXISTS `curso_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_alumno` (
  `id_curso_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  `fk_anio` smallint(6) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_curso_alumno`),
  KEY `fk_alumno` (`fk_alumno`),
  KEY `fk_curso` (`fk_curso`),
  KEY `fk_anio` (`fk_anio`),
  CONSTRAINT `curso_alumno_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumno` (`id_alumno`),
  CONSTRAINT `curso_alumno_ibfk_2` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `curso_alumno_ibfk_3` FOREIGN KEY (`fk_anio`) REFERENCES `aniolectivo` (`id_aniolectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_alumno`
--

LOCK TABLES `curso_alumno` WRITE;
/*!40000 ALTER TABLE `curso_alumno` DISABLE KEYS */;
INSERT INTO `curso_alumno` VALUES (1,3,1,1,'I'),(2,17,1,1,'A');
/*!40000 ALTER TABLE `curso_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_familiares`
--

DROP TABLE IF EXISTS `datos_familiares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_familiares` (
  `id_datosfamiliares` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno` int(11) NOT NULL,
  `nombre_padre` varchar(100) NOT NULL,
  `cedula_padre` varchar(10) NOT NULL,
  `fecha_padre` date DEFAULT NULL,
  `nacionalidad_padre` varchar(50) NOT NULL,
  `estadocivil_padre` varchar(2) NOT NULL,
  `email_padre` varchar(100) NOT NULL,
  `niveleducacion_padre` varchar(100) NOT NULL,
  `ocupacion_padre` varchar(100) NOT NULL,
  `restudiante_padre` varchar(2) NOT NULL,
  `auto_padre` varchar(2) NOT NULL,
  `celular_padre` varchar(10) NOT NULL,
  `nombre_madre` varchar(100) NOT NULL,
  `cedula_madre` varchar(10) NOT NULL,
  `fecha_madre` date DEFAULT NULL,
  `nacionalidad_madre` varchar(50) NOT NULL,
  `estadocivil_madre` varchar(2) NOT NULL,
  `email_madre` varchar(100) NOT NULL,
  `niveleducacion_madre` varchar(100) NOT NULL,
  `ocupacion_madre` varchar(100) NOT NULL,
  `restudiante_madre` varchar(2) NOT NULL,
  `auto_madre` varchar(2) NOT NULL,
  `celular_madre` varchar(10) NOT NULL,
  `fechareg` date DEFAULT NULL,
  PRIMARY KEY (`id_datosfamiliares`),
  KEY `fk_alumno` (`fk_alumno`),
  CONSTRAINT `datos_familiares_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_familiares`
--

LOCK TABLES `datos_familiares` WRITE;
/*!40000 ALTER TABLE `datos_familiares` DISABLE KEYS */;
INSERT INTO `datos_familiares` VALUES (1,5,'Vaca','12','1990-10-10','1122','1','jsjj','1','122','1','kk','0960615169','skjs','0927190181','1990-10-10','Ecuatoriana','1','skks','1','s','2','ss','sksk','2019-10-04'),(3,12,'SLSLLS','12','1990-10-10','L','1','LXLX','1','SS','2','LL','LSLS','L','LS','1990-10-10','L','3','SLS','2','L','1','L','SL','2019-10-08'),(4,14,'Loca loca','122','0190-10-01','1','1','kks','1','1','1','1','1','1','1','1990-10-01','1','1','44','2','1','1','1','11','2019-10-09'),(5,18,'ssksksk','452','1990-10-10','llsl','1','skskks','1','445','1','ls','lslsl','jsjsj','ss5','1990-10-10','111','1','sksk','2','11','1','sl','555','2019-10-18');
/*!40000 ALTER TABLE `datos_familiares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_representante`
--

DROP TABLE IF EXISTS `datos_representante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_representante` (
  `id_datosrepresentante` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno` int(11) NOT NULL,
  `nombre_repre` varchar(100) NOT NULL,
  `cedula_repre` varchar(10) NOT NULL,
  `fecha_repre` date DEFAULT NULL,
  `nacionalidad_repre` varchar(50) NOT NULL,
  `estadocivil_repre` varchar(2) NOT NULL,
  `email_repre` varchar(100) NOT NULL,
  `niveleducacion_repre` varchar(100) NOT NULL,
  `ocupacion_repre` varchar(100) NOT NULL,
  `restudiante_repre` varchar(2) NOT NULL,
  `auto_repre` varchar(2) NOT NULL,
  `celular_repre` varchar(10) NOT NULL,
  `relacionf_repre` varchar(2) NOT NULL,
  `fechareg` date DEFAULT NULL,
  PRIMARY KEY (`id_datosrepresentante`),
  KEY `fk_alumno` (`fk_alumno`),
  CONSTRAINT `datos_representante_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_representante`
--

LOCK TABLES `datos_representante` WRITE;
/*!40000 ALTER TABLE `datos_representante` DISABLE KEYS */;
INSERT INTO `datos_representante` VALUES (2,1,'x','x','0000-00-00','s','1','s','1','s','2','ss','s','1','2019-10-05'),(3,2,'x','x','1990-10-10','k','1','k','1','k','1','k','k','1','2019-10-05'),(4,1,'k','k','1990-06-06','s','1','s','3','s','1','s','s','2','2019-10-05'),(5,14,'skksk','10101','1990-10-10','skks','1','sksk','1','ksk','1','ss','1223','1','2019-10-09'),(6,18,'lslsl','llslsl','1990-10-10','lslls','1','skskks','1','12','1','sl','llsl','1','2019-10-18'),(7,19,'lslsll','4555','1990-10-10','111','1','skskk','1','44','1','sl','111','1','2019-10-18');
/*!40000 ALTER TABLE `datos_representante` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_alumno`
--

LOCK TABLES `img_alumno` WRITE;
/*!40000 ALTER TABLE `img_alumno` DISABLE KEYS */;
INSERT INTO `img_alumno` VALUES (1,'Jellyfish.jpg','../../Imagenes/Alumno/Jellyfish.jpg','2019-10-03'),(2,'CED2 001.jpg','../../Imagenes/Alumno/CED2 001.jpg','2019-10-03'),(3,'CED2 001.jpg','../../Imagenes/Alumno/CED2 001.jpg','2019-10-03'),(4,'img3 001.jpg','../../Imagenes/Alumno/img3 001.jpg','2019-10-03'),(5,'CEDULA F ICAZA 001.jpg','../../Imagenes/Alumno/CEDULA F ICAZA 001.jpg','2019-10-03'),(6,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-08'),(7,'PREVENCIÓN de RIESGOS LABORALES.docx','../../Imagenes/Alumno/PREVENCIÓN de RIESGOS LABORALES.docx','2019-10-08'),(8,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-08'),(9,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-08'),(10,'celda.png','../../Imagenes/Alumno/celda.png','2019-10-08'),(11,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-08'),(12,'982.jpg','../../Imagenes/Alumno/982.jpg','2019-10-08'),(13,'IMG-20191003-WA0043.jpg','../../Imagenes/Alumno/IMG-20191003-WA0043.jpg','2019-10-08'),(14,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-09'),(15,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-09'),(16,'Scan0157.jpg','../../Imagenes/Alumno/Scan0157.jpg','2019-10-09'),(17,'Scan0136.jpg','../../Imagenes/Alumno/Scan0136.jpg','2019-10-09'),(18,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-18'),(19,'Sauces 4.png','../../Imagenes/Alumno/Sauces 4.png','2019-10-18');
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
-- Table structure for table `pagos_matricula`
--

DROP TABLE IF EXISTS `pagos_matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos_matricula` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `ruc` varchar(13) NOT NULL,
  `fk_alumno` int(11) NOT NULL,
  `pago` decimal(4,2) NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `fechareg` date DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `fk_alumno` (`fk_alumno`),
  CONSTRAINT `pagos_matricula_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos_matricula`
--

LOCK TABLES `pagos_matricula` WRITE;
/*!40000 ALTER TABLE `pagos_matricula` DISABLE KEYS */;
INSERT INTO `pagos_matricula` VALUES (3,'1','1','1','',1,1.00,'sjjsjs','0000-00-00'),(4,'ll','1','1','1',2,1.00,'444','0000-00-00'),(5,'l','l','l','l',1,45.00,'kksk','2019-10-09'),(7,'Julio Perez Mosaico','La floresta Mz 47 Villa 15','2015162','097845123',17,78.00,'Pago de matricula ','2019-10-10');
/*!40000 ALTER TABLE `pagos_matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos_pensiones`
--

DROP TABLE IF EXISTS `pagos_pensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos_pensiones` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `ruc` varchar(13) NOT NULL,
  `fk_alumno` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `pago` decimal(4,2) NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `fechareg` date DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `fk_alumno` (`fk_alumno`),
  CONSTRAINT `pagos_pensiones_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos_pensiones`
--

LOCK TABLES `pagos_pensiones` WRITE;
/*!40000 ALTER TABLE `pagos_pensiones` DISABLE KEYS */;
INSERT INTO `pagos_pensiones` VALUES (1,'vaca','1','k','1',17,2,10,1.00,'11','2019-10-09'),(2,'sjjsj','ks','sj','sskk',17,2,9,99.99,'lslsl','2019-10-09'),(3,'jsjsj','kk','sjsj','kk',1,2,1,45.00,'sksks','2019-10-10');
/*!40000 ALTER TABLE `pagos_pensiones` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (1,'Paredes Suarez Julio Andres','Guayacanes Mz 232 Villa 15','042621550','0960615169','0927190181','jaicaza24@hotmail.com','1990-06-06','Docente','M',1,'2019-10-02');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
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

-- Dump completed on 2019-10-18  8:24:20
