-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sistmatriculacion
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
  `nacionalidad_alumno` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (4,'Icaza Paredes','Guayaquil','1990-10-10','Ecuatoriano','0','0927190181','Colegio Domingo Savio','Tungurahua y Carchi',4,'Fausto Icaza','Ingeniero Civil','Venecia Paredes','Economista','Fausto Icaza','0907589113',' Guayacanes Mz232 Villa 15','2621550','Padre','2019-09-25'),(6,'x','x','1990-10-10','e','e','e','s','s',6,'s','s','s','s','s','s','s','ss','s','2019-09-25');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aniolectivo`
--

LOCK TABLES `aniolectivo` WRITE;
/*!40000 ALTER TABLE `aniolectivo` DISABLE KEYS */;
INSERT INTO `aniolectivo` VALUES (1,'2019-2020','1'),(2,'2020-2021','2'),(3,'2021-2022','0');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Inicial2','1'),(2,'Primero de Básica','1'),(3,'Segundo de Básica','1'),(4,'Tercero Básico','1'),(5,'Cuarto Básica','1'),(6,'Quinto de Básico','1'),(7,'Sexto de Básica','1');
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
  `fk_alumno` varchar(10) NOT NULL,
  `fk_cursoparalelo` int(11) NOT NULL,
  `fk_anio` smallint(6) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_curso_alumno`),
  KEY `fk_alumno` (`fk_alumno`),
  KEY `fk_cursoparalelo` (`fk_cursoparalelo`),
  KEY `fk_anio` (`fk_anio`),
  CONSTRAINT `curso_alumno_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `datos_alumno` (`cedula_alumno`),
  CONSTRAINT `curso_alumno_ibfk_2` FOREIGN KEY (`fk_cursoparalelo`) REFERENCES `curso_paralelo` (`id_cursoparalelo`),
  CONSTRAINT `curso_alumno_ibfk_3` FOREIGN KEY (`fk_anio`) REFERENCES `aniolectivo` (`id_aniolectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_alumno`
--

LOCK TABLES `curso_alumno` WRITE;
/*!40000 ALTER TABLE `curso_alumno` DISABLE KEYS */;
INSERT INTO `curso_alumno` VALUES (23,'0952262221',9,1,'1'),(25,'0951107168',10,1,'1'),(27,'0943069262',9,1,'1'),(28,'0931297170',9,1,'1'),(29,'0943061994',9,1,'1'),(30,'0950719393',9,1,'1'),(31,'0952906061',9,1,'1'),(32,'0959226895',9,1,'1'),(33,'0955733282',1,1,'1'),(34,'1724191497',1,1,'1'),(36,'0951042613',1,1,'1'),(37,'0955228010',1,1,'1'),(38,'0951707728',1,1,'1'),(39,'0954552926',2,1,'1'),(40,'0951917855',2,1,'1'),(41,'0953913787',2,1,'1'),(42,'0967593786',2,1,'1'),(43,'0930865258',2,1,'1');
/*!40000 ALTER TABLE `curso_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_paralelo`
--

DROP TABLE IF EXISTS `curso_paralelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_paralelo` (
  `id_cursoparalelo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_curso` int(11) NOT NULL,
  `fk_paralelo` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_cursoparalelo`),
  KEY `fk_curso` (`fk_curso`),
  KEY `fk_paralelo` (`fk_paralelo`),
  CONSTRAINT `curso_paralelo_ibfk_1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `curso_paralelo_ibfk_2` FOREIGN KEY (`fk_paralelo`) REFERENCES `paralelo` (`id_paralelo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_paralelo`
--

LOCK TABLES `curso_paralelo` WRITE;
/*!40000 ALTER TABLE `curso_paralelo` DISABLE KEYS */;
INSERT INTO `curso_paralelo` VALUES (1,1,1,'1'),(2,1,2,'1'),(3,2,1,'1'),(4,2,2,'1'),(5,3,1,'1'),(6,3,2,'1'),(7,4,1,'1'),(8,4,2,'1'),(9,5,1,'1'),(10,5,2,'1');
/*!40000 ALTER TABLE `curso_paralelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_alumno`
--

DROP TABLE IF EXISTS `datos_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_alumno` (
  `cedula_alumno` varchar(10) NOT NULL,
  `apellido_alumno` varchar(100) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `sexo_alumno` char(1) NOT NULL,
  `etnia_alumno` char(1) NOT NULL,
  `lugarnac_alumno` varchar(50) NOT NULL,
  `fechanac_alumno` date DEFAULT NULL,
  `nacionalidad_alumno` varchar(10) NOT NULL,
  `direccion_alumno` varchar(200) NOT NULL,
  `expreso_alumno` char(1) NOT NULL,
  `emerg_alumno` char(1) NOT NULL,
  `telefono_alumno` varchar(10) NOT NULL,
  `parroquia_alumno` varchar(10) NOT NULL,
  `telefono2_alumno` varchar(10) NOT NULL,
  `tipo_alumno` varchar(1) NOT NULL,
  `imagen_alumno` int(11) NOT NULL,
  `estado_alumno` varchar(2) NOT NULL,
  `observa_alumno` varchar(200) NOT NULL,
  `fechareg_alumno` date DEFAULT NULL,
  PRIMARY KEY (`cedula_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_alumno`
--

LOCK TABLES `datos_alumno` WRITE;
/*!40000 ALTER TABLE `datos_alumno` DISABLE KEYS */;
INSERT INTO `datos_alumno` VALUES ('0930865258','Paz Guzman ','Andy Macias','M','3','Guayaquil','2015-10-06','Ecuatorian','Km 24 San Geronimo 1 Mz L S. 4','1','1','0989358149','Tarqui','2345226','1',45,'1','Nuevo Alumno','2019-11-04'),('0931297170','Muñoz Murgueitio','Eliana Rossana','F','2','Guayaquil','2010-08-31','Ecuatorian','Chongon','2','1','0999424248','Tarqui','2738629','2',30,'1','Ninguna','2019-11-03'),('0943061994','Sacan Pincay ','Joel  Arderson','M','2','Guayaquil','2010-08-10','Ecuatorian','Chongon Colibri 1 Mz A Sl 1','1','1','0992488294','Tarqui','2738350','2',31,'1','Ninguna','2019-11-03'),('0943069262','Jimenez Mendoza','Camila Maite','F','4','Guayaquil','2010-09-04','Ecuatorian','Colibri 2 Mz O Sl 15','1','1','0989007037','Tarqui','2621560','2',29,'1','Nuevo estudiante','2019-11-03'),('0950719393','Segarra Varas','Danna Belen','F','2','Guayaquil','2010-09-08','Ecuatorian','Valle Alto etapa Paris Mz 1126 V 8','2','1','0996152666','Ximena','2457889','2',32,'1','Ninguna','2019-11-03'),('0951042613','Martinez Guerrero','Simon Pedro','M','2','Guayaquil','2015-12-06','Ecuatorian','La Renta Chongon Mz 11 Sl 8','1','1','0989594759','Ximena','2744546','1',38,'1','Nuevo Alumno','2019-11-04'),('0951107168','Almeida Suarez','Mercedes Scarleth','F','4','Guayaquil','2008-09-24','Ecuador','La Floresta','1','1','0960615169','Ximena','2621550','2',27,'1','Ninguna','2019-11-02'),('0951707728','Tapia Vargas','Jordan Andres','M','4','Guayaquil','2015-05-05','Ecuatorian','Km 24 Via a la Costa','2','2','0990591819','Ximena','2738796','1',40,'1','Nuevo Alumno','2019-11-04'),('0951917855','Carabajo Vera','Elkin Ariel','M','2','Guayaquil','2015-12-06','Ecuatorian','Km 24 Via Costa, San Geronimo Mz N sl 14','1','1','0969998296','Ximena','2141516','1',42,'1','Ninguna','2019-11-04'),('0952262221','Muñoz Gonzales','Alejandra Claudia','F','2','Guayaquil','1990-10-10','Ecuatorian','Chongon','1','1','0978441236','Tarqui','2222552','1',25,'1','Ninguna','2019-11-02'),('0952906061','Diaz Nieto ','Sara Lizabeth','F','4','Guayaquil','2010-08-06','Ecuatorian','Chongon Sector Colibri 2 mz 113 Sl 18 ','1','1','0993066281','Ximena','2738652','2',33,'1','Ninguna','2019-11-03'),('0953913787','Mero Mera','Jonathan Steven','M','2','Guayaquil','2015-01-07','Ecuatorian','El Chorrillo Sector 1 Mz 73 Sl 4-A','2','1','0982032111','Ximena','2411578','1',43,'1','Nuevo Alumno','2019-11-04'),('0954552926','Inga Zuñiga','Gabriela Lizbeth','F','3','Guayaquil','2015-08-12','Ecuatorian','Cuidad Olimpo Mz. 8 Sl 42','1','2','0979401459','Ximena','5125823','1',41,'1','Nuevo Alumno','2019-11-04'),('0955228010','Jacome Salazar ','Jennifer Estefania','F','3','Guayaquil','2015-10-06','Ecuatorian','San Geronimo 2 B6 Sl 17','2','2','0989153739','Ximena','2457896','1',39,'1','Nuevo Alumno','2019-11-04'),('0955733282','Torres Borbor ','Roberth Alexander','M','2','Guayaquil','2015-06-06','Ecuatorian','Km 24 via a la costa San Geronimo 1 Mz 141','1','1','0969673453','Tarqui','2738632','1',35,'1','Nuevo Alumno','2019-11-04'),('0959226895','Torres Quijije','Daniel Antonio','M','3','Guayaquil','2010-11-15','Ecuatorian','Km 19 1/2 Via a la Costa Diagonal a Ecuamar','1','1','0996896130','Ximena','2452125','2',34,'1','Ninguna','2019-11-03'),('0967593786','Urgiles Yanez','Daniel Gustavo','M','2','Guayaquil','2015-08-06','Ecuatorian','Chongon La Renta','1','1','0967593786','Ximena','2738975','1',44,'1','Nuevo Alumno','2019-11-04'),('1724191497','Betancur Daza ','Maria Gracia','F','1','Quito','2015-06-06','Ecuatorian','Colibri 2 Mz 119 Sl 4','1','2','0988398720','Ximena','2151617','1',36,'1','Nuevo estudiante','2019-11-04');
/*!40000 ALTER TABLE `datos_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_representante`
--

DROP TABLE IF EXISTS `datos_representante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_representante` (
  `id_datosrepre` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_padre` varchar(100) NOT NULL,
  `cedula_padre` varchar(10) DEFAULT NULL,
  `nivel_padre` varchar(2) NOT NULL,
  `estado_padre` char(1) NOT NULL,
  `ocupacion_padre` varchar(2) DEFAULT NULL,
  `empresa_padre` varchar(100) NOT NULL,
  `nombre_madre` varchar(100) NOT NULL,
  `cedula_madre` varchar(10) DEFAULT NULL,
  `nivel_madre` varchar(2) NOT NULL,
  `estado_madre` char(1) NOT NULL,
  `ocupacion_madre` varchar(2) DEFAULT NULL,
  `empresa_madre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `separados` varchar(1) NOT NULL,
  `nombre_conyugue` varchar(100) DEFAULT NULL,
  `nombre_representante` varchar(100) NOT NULL,
  `cedula_representante` varchar(10) NOT NULL,
  `relacionf` varchar(2) NOT NULL,
  `autorizo` varchar(100) NOT NULL,
  `fk_cedulaalumno` varchar(10) NOT NULL,
  PRIMARY KEY (`id_datosrepre`),
  KEY `fk_cedulaalumno` (`fk_cedulaalumno`),
  CONSTRAINT `datos_representante_ibfk_1` FOREIGN KEY (`fk_cedulaalumno`) REFERENCES `datos_alumno` (`cedula_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_representante`
--

LOCK TABLES `datos_representante` WRITE;
/*!40000 ALTER TABLE `datos_representante` DISABLE KEYS */;
INSERT INTO `datos_representante` VALUES (19,'Freddy Muñoz','0955222662','2','1','1','Ninguna','Claudia Maria Lopez','0945226210','4','1','1','Ninguna','fredy_muñoz45@hotmail.es','2','X','Claudia Maria Lopez','0945226210','2','Madre','0952262221'),(21,'Santos Almedida Bajaña','0920841483','3','1','1','Comisariato','Nelly Suarez Solorzano','0950576058','1','1','1','Comisariato','santosalmeida@gmamail.com','1','Santos Almeida','Nelly Suarez Solorzano','0950576058','2','Madre','0951107168'),(23,'Oscar  Jimenez Cabello','0978451212','4','1','1','Ninguna','Cesibel Mendoza Mendoza','1310154354','3','1','1','Ninguna','lesliekatherine1990@gmail.com','2','X','Cesibel Mendoza Mendoza','1310154354','2','Madre','0943069262'),(24,'Freddy Muñoz','0907237283','5','1','1','Ninguna','Solange Murgueitio','0914945159','3','1','1','Ninguna','solange@gmail.com','1','Alejandro Mariano Suarez','Solange murgueitio','0914945159','2','Madre','0931297170'),(25,'Juan Sacan Pico','0910193879','5','1','1','Ninguna','Graciela Pincay Chonillo','0916887524','4','1','1','Ninguna','juansacan78@gmail.com','2','X','Juan Sancan Pico','0910193879','1','Padre','0943061994'),(26,'Paul Segarra Pacheco','0945127412','2','1','1','Ninguna','Kelly Varas Vera','0920727096','4','1','1','Ninguna','kellyjvaras@gmail.com','2','X','Kelly Varas Vera','0920727096','2','Padre','0950719393'),(27,'Ramon Diaz Alcivar','1307539187','4','1','1','Ninguna','Georgina Nieto Macias','0916107535','3','1','1','Ninguna','georginanieto@gmail.com','2','X','Georgina Nieto Macias','0916107535','2','Padre ','0952906061'),(28,'Omar Torres Huacon','0923324883','2','1','1','Ninguna','Jessica Quijije Zuña','0920463296','3','1','1','Ninguna','yeya-221@hotmail.com','2','X','Jessica Quijije Zuna','0920463296','2','Padre','0959226895'),(29,'Roberth Torres Santana','0924444235','1','1','4','Comisariato','Cinthia Borbor Jaime','0919866665','1','1','1','Comisariato','cintiabobor1965@gmail.com','2','X','Cinthia Borbor Jaime ','0919866665','2','Padre','0955733282'),(30,'Diego Bentancur Escobar','0912452145','3','1','2','Tonocer S.A','Myrian Daza Zambrano','0920073806','3','1','4','Ninguna','','2','X','Myrian Daza Zambrano','0920073806','2','Madre','1724191497'),(32,'Ruben Martinez Moncayo','0952739423','4','1','2','Global S.A','Maria Guerreo Nuñez','0922149950','4','1','4','Ninguna','maxiguenu10@gmail.com','2','X','Maria Guerrero Nuñez','0922149950','2','Madre','0951042613'),(33,'Felix Jacome Flores','0917960676','1','1','4','ninguna','Maria Salazar Huacano','0921051967','1','1','4','Ninguna','elizabeyhuacon78@gmail.com','2','X','Maria Salazar Huacon','0921051967','2','Madre','0955228010'),(34,'Andres Tapia Luna','0916913114','1','1','4','Ninguna','Grace Vargas Olives','0923554117','1','1','4','Ninguna','gracevargas45@gmail.com','2','X','Grace Vargas Olives','0923554117','2','Padre ','0951707728'),(35,'Herry Inga Lindao','0914046305','1','1','4','Ninguna','Kathiuska Zuñiga Fuentes','0914370853','1','1','4','Ninguno','siempre-sonrisa@hotmail.com','2','X','Kathiuska Zuñiga Fuentes','0914370853','2','Padre','0954552926'),(36,'Fernado Carbajo Ituralde','0917953010','2','1','4','Ninguna','Silvia Vera Medina ','0920900271','2','1','3','Ninguna','svera3227@gmail.com','2','X','Silvia Vera Medina','0920900271','2','Madre','0951917855'),(37,'Lino Mero Zambrano','1306501709','3','1','3','Ninguna','Daysi Mera Farias','1330900395','1','1','4','Ninguna','linozambrab@gmail.com','2','x','Lino Mero Zambrano','1306501709','1','Padre','0953913787'),(38,'Gustavo Urgiles Pineda','0915952931','1','1','1','Ninguno','Magdalena Yanez Guzman','0915952931','3','1','2','Computer S.A','arieljesus_4@outlook.com','1','X','Magdalena Yanez Guzman','0915952931','2','Madre','0967593786'),(39,'Christian Paz Villao','0918042524','4','1','4','Niguna','Ivonne Guzman Zambrano','0924707417','1','1','4','Ningun','franciscalooor@gmail.com','2','X','Francisca Zambrano Figueroa','0906513072','4','Abuela','0930865258');
/*!40000 ALTER TABLE `datos_representante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_alumno`
--

DROP TABLE IF EXISTS `documentos_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos_alumno` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `promocion1` varchar(2) DEFAULT NULL,
  `promocion2` varchar(2) DEFAULT NULL,
  `promocion3` varchar(2) DEFAULT NULL,
  `planilla` varchar(2) DEFAULT NULL,
  `informe1` varchar(2) DEFAULT NULL,
  `informe2` varchar(2) DEFAULT NULL,
  `partida` varchar(2) DEFAULT NULL,
  `fotos` varchar(2) DEFAULT NULL,
  `carnet` varchar(2) DEFAULT NULL,
  `croquis` varchar(2) DEFAULT NULL,
  `cedula1` varchar(2) DEFAULT NULL,
  `cedula2` varchar(2) DEFAULT NULL,
  `cedula3` varchar(2) DEFAULT NULL,
  `certificado1` varchar(2) DEFAULT NULL,
  `certificado2` varchar(2) DEFAULT NULL,
  `documentos` int(4) NOT NULL,
  `fk_alumno` varchar(10) NOT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `fk_alumno` (`fk_alumno`),
  CONSTRAINT `documentos_alumno_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `datos_alumno` (`cedula_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_alumno`
--

LOCK TABLES `documentos_alumno` WRITE;
/*!40000 ALTER TABLE `documentos_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_alumno2`
--

DROP TABLE IF EXISTS `documentos_alumno2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos_alumno2` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `documentos` int(4) NOT NULL,
  `documentos2` int(4) NOT NULL,
  `documentos3` int(4) NOT NULL,
  `documentos4` int(4) NOT NULL,
  `documentos5` int(4) NOT NULL,
  `fk_alumno` varchar(10) NOT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `fk_alumno` (`fk_alumno`),
  CONSTRAINT `documentos_alumno2_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `datos_alumno` (`cedula_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_alumno2`
--

LOCK TABLES `documentos_alumno2` WRITE;
/*!40000 ALTER TABLE `documentos_alumno2` DISABLE KEYS */;
INSERT INTO `documentos_alumno2` VALUES (3,3,3,3,3,3,'0931297170'),(4,4,4,4,4,4,'0943069262'),(5,5,5,5,5,5,'0930865258');
/*!40000 ALTER TABLE `documentos_alumno2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_datosalumno`
--

DROP TABLE IF EXISTS `img_datosalumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_datosalumno` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_datosalumno`
--

LOCK TABLES `img_datosalumno` WRITE;
/*!40000 ALTER TABLE `img_datosalumno` DISABLE KEYS */;
INSERT INTO `img_datosalumno` VALUES (1,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-14'),(2,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-14'),(3,'Celdas libre.png','../../Imagenes/Alumno/Celdas libre.png','2019-10-14'),(4,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-14'),(5,'Sin título.jpg','../../Imagenes/Alumno/Sin título.jpg','2019-10-14'),(6,'Sin título.jpg','../../Imagenes/Alumno/Sin título.jpg','2019-10-14'),(7,'Scan0158.jpg','../../Imagenes/Alumno/Scan0158.jpg','2019-10-14'),(8,'Sauces 4.png','../../Imagenes/Alumno/Sauces 4.png','2019-10-14'),(9,'Sauces 4.png','../../Imagenes/Alumno/Sauces 4.png','2019-10-14'),(10,'IMG-20191003-WA0043.jpg','../../Imagenes/Alumno/IMG-20191003-WA0043.jpg','2019-10-14'),(11,'72816277_2467331536656090_6722138750459052032_n.jpg','../../Imagenes/Alumno/72816277_2467331536656090_6722138750459052032_n.jpg','2019-10-17'),(12,'kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','../../Imagenes/Alumno/kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','2019-10-19'),(13,'72816277_2467331536656090_6722138750459052032_n.jpg','../../Imagenes/Alumno/72816277_2467331536656090_6722138750459052032_n.jpg','2019-10-19'),(14,'Sauces 4.png','../../Imagenes/Alumno/Sauces 4.png','2019-10-25'),(15,'Sauces 4.png','../../Imagenes/Alumno/Sauces 4.png','2019-10-25'),(16,'kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','../../Imagenes/Alumno/kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','2019-10-31'),(17,'kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','../../Imagenes/Alumno/kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','2019-10-31'),(18,'Scan0159.jpg','../../Imagenes/Alumno/Scan0159.jpg','2019-10-31'),(19,'img1 001.jpg','../../Imagenes/Alumno/img1 001.jpg','2019-11-01'),(20,'img1 001.jpg','../../Imagenes/Alumno/img1 001.jpg','2019-11-01'),(21,'depositphotos_19547537-stock-illustration-cartoon-student.jpg','../../Imagenes/Alumno/depositphotos_19547537-stock-illustration-cartoon-student.jpg','2019-11-02'),(22,'kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','../../Imagenes/Alumno/kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','2019-11-02'),(23,'depositphotos_19547537-stock-illustration-cartoon-student.jpg','../../Imagenes/Alumno/depositphotos_19547537-stock-illustration-cartoon-student.jpg','2019-11-02'),(24,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-02'),(25,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-02'),(26,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-02'),(27,'3301.jpg','../../Imagenes/Alumno/3301.jpg','2019-11-02'),(28,'1402.jpg','../../Imagenes/Alumno/1402.jpg','2019-11-02'),(29,'kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','../../Imagenes/Alumno/kisspng-teacher-education-student-course-school-avatar-5ab752767ae3f6.7668647915219636385034.jpg','2019-11-03'),(30,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-03'),(31,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-03'),(32,'img45.jpg','../../Imagenes/Alumno/img45.jpg','2019-11-03'),(33,'img45.jpg','../../Imagenes/Alumno/img45.jpg','2019-11-03'),(34,'img46.png','../../Imagenes/Alumno/img46.png','2019-11-03'),(35,'img46.png','../../Imagenes/Alumno/img46.png','2019-11-04'),(36,'img45.jpg','../../Imagenes/Alumno/img45.jpg','2019-11-04'),(37,'img45.jpg','../../Imagenes/Alumno/img45.jpg','2019-11-04'),(38,'img46.png','../../Imagenes/Alumno/img46.png','2019-11-04'),(39,'img45.jpg','../../Imagenes/Alumno/img45.jpg','2019-11-04'),(40,'1402.jpg','../../Imagenes/Alumno/1402.jpg','2019-11-04'),(41,'img45.jpg','../../Imagenes/Alumno/img45.jpg','2019-11-04'),(42,'depositphotos_19547537-stock-illustration-cartoon-student.jpg','../../Imagenes/Alumno/depositphotos_19547537-stock-illustration-cartoon-student.jpg','2019-11-04'),(43,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-04'),(44,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-04'),(45,'585e4bcdcb11b227491c3396.png','../../Imagenes/Alumno/585e4bcdcb11b227491c3396.png','2019-11-04');
/*!40000 ALTER TABLE `img_datosalumno` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_profesor`
--

LOCK TABLES `img_profesor` WRITE;
/*!40000 ALTER TABLE `img_profesor` DISABLE KEYS */;
INSERT INTO `img_profesor` VALUES (1,'CEDULA F ICAZA 001.jpg','../../Imagenes/Profesores/CEDULA F ICAZA 001.jpg','2019-09-15'),(2,'CEDULA F ICAZA 001.jpg','../../Imagenes/Profesores/CEDULA F ICAZA 001.jpg','2019-09-15'),(3,'supervisor.jpg','../../Imagenes/Profesores/supervisor.jpg','2019-09-15'),(4,'img46.png','../../Imagenes/Profesores/img46.png','2019-10-08'),(5,'3301.jpg','../../Imagenes/Profesores/3301.jpg','2019-11-02');
/*!40000 ALTER TABLE `img_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otros_datos`
--

DROP TABLE IF EXISTS `otros_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otros_datos` (
  `id_otrosdatos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_plantel` varchar(100) DEFAULT NULL,
  `tipo_plantel` varchar(2) DEFAULT NULL,
  `comportamiento` varchar(2) DEFAULT NULL,
  `promedio` decimal(4,2) DEFAULT NULL,
  `escala` varchar(2) DEFAULT NULL,
  `examen` varchar(2) DEFAULT NULL,
  `fk_cedulaalumno` varchar(10) NOT NULL,
  PRIMARY KEY (`id_otrosdatos`),
  KEY `fk_cedulaalumno` (`fk_cedulaalumno`),
  CONSTRAINT `otros_datos_ibfk_1` FOREIGN KEY (`fk_cedulaalumno`) REFERENCES `datos_alumno` (`cedula_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otros_datos`
--

LOCK TABLES `otros_datos` WRITE;
/*!40000 ALTER TABLE `otros_datos` DISABLE KEYS */;
INSERT INTO `otros_datos` VALUES (18,'Domingo Savio','1','A',8.72,'2','1','0952262221'),(20,'','A','',0.00,'A','A','0951107168'),(22,'','A','',0.00,'A','A','0943069262'),(23,'','A','',0.00,'A','A','0931297170'),(24,'','A','',0.00,'A','A','0943061994'),(25,'','A','',0.00,'A','A','0950719393'),(26,'','A','',0.00,'A','A','0952906061'),(27,'','A','',0.00,'A','A','0959226895'),(28,'Domingo Savio','1','A',9.75,'1','1','0955733282'),(29,'Domingo Comin','1','A',8.79,'2','1','1724191497'),(30,'Domingo Comin','1','A',8.79,'2','1','1724191497'),(31,'Domingo Savio','1','A',10.00,'1','1','0951042613'),(32,'Domingo Savio','1','A',10.00,'1','1','0955228010'),(33,'Domingo Comin','1','A',10.00,'1','1','0951707728'),(34,'Domingo Savio','1','A',10.00,'1','1','0954552926'),(35,'Domingo Savio','1','A',10.00,'1','1','0951917855'),(36,'Unidad Eduactiva Nuevo Pacto','3','A',9.75,'1','1','0953913787'),(37,'Unidad Nuevo Pacto ','1','A',9.78,'1','1','0967593786'),(38,'Domingo Savio','2','A',8.90,'1','1','0930865258');
/*!40000 ALTER TABLE `otros_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paralelo`
--

DROP TABLE IF EXISTS `paralelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paralelo` (
  `id_paralelo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_paralelo` varchar(30) NOT NULL,
  `estado_paralelo` char(1) NOT NULL,
  PRIMARY KEY (`id_paralelo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paralelo`
--

LOCK TABLES `paralelo` WRITE;
/*!40000 ALTER TABLE `paralelo` DISABLE KEYS */;
INSERT INTO `paralelo` VALUES (1,'A','1'),(2,'B','1'),(3,'C','0');
/*!40000 ALTER TABLE `paralelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensum_academico`
--

DROP TABLE IF EXISTS `pensum_academico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pensum_academico` (
  `id_pensum` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fk_anio` smallint(6) DEFAULT NULL,
  `fk_profesor` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_pensum`),
  KEY `fk_curso` (`fk_curso`),
  KEY `fk_profesor` (`fk_profesor`),
  KEY `fk_anio` (`fk_anio`),
  CONSTRAINT `pensum_academico_ibfk_1` FOREIGN KEY (`fk_curso`) REFERENCES `curso_paralelo` (`id_cursoparalelo`),
  CONSTRAINT `pensum_academico_ibfk_2` FOREIGN KEY (`fk_profesor`) REFERENCES `profesor` (`id_profesor`),
  CONSTRAINT `pensum_academico_ibfk_3` FOREIGN KEY (`fk_anio`) REFERENCES `aniolectivo` (`id_aniolectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensum_academico`
--

LOCK TABLES `pensum_academico` WRITE;
/*!40000 ALTER TABLE `pensum_academico` DISABLE KEYS */;
INSERT INTO `pensum_academico` VALUES (0004,1,4,1,'2019-10-05','1'),(0005,2,3,2,'2019-10-05','1'),(0006,2,3,3,'2019-10-05','1'),(0007,2,3,4,'2019-10-05','1'),(0008,2,4,5,'2019-10-08','1'),(0009,2,4,6,'2019-10-08','1');
/*!40000 ALTER TABLE `pensum_academico` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (3,'Paz Guzman Andy Macias','Guayacanes Mz. 232 Villa 15','042621550','0960615169','0927190181','guzman@hotmail.com','1990-06-06','2','M',3,'2019-09-15'),(4,'Magdalena Yanez Guzman','La floresta Mz 24 sol 78','2621550','0978451223','122544','magyanez@gmail.com','1990-10-10','2','F',4,'2019-10-08'),(5,'Bustamante Carlos Julio','La Floresta','2621550','0960615169','0978552212','jaicaza24@hotmail.com','1960-10-10','1','M',5,'2019-11-02');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_documentos`
--

DROP TABLE IF EXISTS `sub_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_documentos` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_documentos`
--

LOCK TABLES `sub_documentos` WRITE;
/*!40000 ALTER TABLE `sub_documentos` DISABLE KEYS */;
INSERT INTO `sub_documentos` VALUES (1,'Convocatoria_sistemas_2016.pdf','../../Imagenes/PDF/Convocatoria_sistemas_2016.pdf','2019-11-02'),(2,'0952262221.pdf','../../Imagenes/PDF/0952262221.pdf','2019-11-02'),(3,'Convocatoria_sistemas_2016.pdf','../../Imagenes/PDF/Convocatoria_sistemas_2016.pdf','2019-11-03'),(4,'0952262221.pdf','../../Imagenes/PDF/0952262221.pdf','2019-11-04'),(5,'0955733282.pdf','../../Imagenes/PDF/0955733282.pdf','2019-11-04');
/*!40000 ALTER TABLE `sub_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_documentos2`
--

DROP TABLE IF EXISTS `sub_documentos2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_documentos2` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_documentos2`
--

LOCK TABLES `sub_documentos2` WRITE;
/*!40000 ALTER TABLE `sub_documentos2` DISABLE KEYS */;
INSERT INTO `sub_documentos2` VALUES (1,'Convocatoria_sistemas_2016.pdf','../../Imagenes/PDF/Convocatoria_sistemas_2016.pdf','2019-11-02'),(2,'0952262221.pdf','../../Imagenes/PDF/0952262221.pdf','2019-11-02'),(3,'18.pdf','../../Imagenes/PDF/18.pdf','2019-11-03'),(4,'18.pdf','../../Imagenes/PDF/18.pdf','2019-11-04'),(5,'0955733282.pdf','../../Imagenes/PDF/0955733282.pdf','2019-11-04');
/*!40000 ALTER TABLE `sub_documentos2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_documentos3`
--

DROP TABLE IF EXISTS `sub_documentos3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_documentos3` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_documentos3`
--

LOCK TABLES `sub_documentos3` WRITE;
/*!40000 ALTER TABLE `sub_documentos3` DISABLE KEYS */;
INSERT INTO `sub_documentos3` VALUES (1,'Convocatoria_sistemas_2016.pdf','../../Imagenes/PDF/Convocatoria_sistemas_2016.pdf','2019-11-02'),(2,'1010.pdf','../../Imagenes/PDF/1010.pdf','2019-11-02'),(3,'18.pdf','../../Imagenes/PDF/18.pdf','2019-11-03'),(4,'1010.pdf','../../Imagenes/PDF/1010.pdf','2019-11-04'),(5,'0955733282Certificado_Matricula.pdf','../../Imagenes/PDF/0955733282Certificado_Matricula.pdf','2019-11-04');
/*!40000 ALTER TABLE `sub_documentos3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_documentos4`
--

DROP TABLE IF EXISTS `sub_documentos4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_documentos4` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_documentos4`
--

LOCK TABLES `sub_documentos4` WRITE;
/*!40000 ALTER TABLE `sub_documentos4` DISABLE KEYS */;
INSERT INTO `sub_documentos4` VALUES (1,'Convocatoria_sistemas_2016.pdf','../../Imagenes/PDF/Convocatoria_sistemas_2016.pdf','2019-11-02'),(2,'1010.pdf','../../Imagenes/PDF/1010.pdf','2019-11-02'),(3,'1010.pdf','../../Imagenes/PDF/1010.pdf','2019-11-03'),(4,'1010.pdf','../../Imagenes/PDF/1010.pdf','2019-11-04'),(5,'0955733282Certificado_Matricula.pdf','../../Imagenes/PDF/0955733282Certificado_Matricula.pdf','2019-11-04');
/*!40000 ALTER TABLE `sub_documentos4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_documentos5`
--

DROP TABLE IF EXISTS `sub_documentos5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_documentos5` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_documentos5`
--

LOCK TABLES `sub_documentos5` WRITE;
/*!40000 ALTER TABLE `sub_documentos5` DISABLE KEYS */;
INSERT INTO `sub_documentos5` VALUES (1,'Convocatoria_sistemas_2016.pdf','../../Imagenes/PDF/Convocatoria_sistemas_2016.pdf','2019-11-02'),(2,'18.pdf','../../Imagenes/PDF/18.pdf','2019-11-02'),(3,'1010.pdf','../../Imagenes/PDF/1010.pdf','2019-11-03'),(4,'0952262221.pdf','../../Imagenes/PDF/0952262221.pdf','2019-11-04'),(5,'0955733282Certificado_Matricula.pdf','../../Imagenes/PDF/0955733282Certificado_Matricula.pdf','2019-11-04');
/*!40000 ALTER TABLE `sub_documentos5` ENABLE KEYS */;
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
  `usuario` varchar(12) NOT NULL,
  `contrasena` tinytext NOT NULL,
  `privilegio` char(5) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_profesor` (`fk_profesor`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_profesor`) REFERENCES `profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (0002,3,'jaicaza','08bf55400114a6e938a62eab90f24b9485c4cb8b','1','2019-09-15'),(0004,5,'carlosju','7c222fb2927d828af22f592134e8932480637c0d','2','2019-11-02'),(0005,4,'yanezguz','508461a78600932fa10821df4bd28b3fb997b8ff','2','2019-11-04');
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

-- Dump completed on 2019-11-04  7:33:54
