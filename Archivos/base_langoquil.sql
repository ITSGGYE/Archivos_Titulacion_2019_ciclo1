CREATE DATABASE  IF NOT EXISTS `id10196793_langoquil` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `id10196793_langoquil`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: id10196793_langoquil
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,1,'2019-10-20 20:34:41',30.50,'0913777207','0','admin','2019-10-20 23:59:28'),(2,2,'2019-10-20 20:53:45',12.00,'0913777207','0','admin','2019-11-13 20:52:41'),(5,3,'2019-11-13 21:09:11',60.00,'0914772876','1',NULL,NULL);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_compras`
--

LOCK TABLES `detalle_compras` WRITE;
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
INSERT INTO `detalle_compras` VALUES (1,1,3,1,15.50,'2019-10-20 20:34:41',NULL,NULL),(2,1,7,3,15.00,'2019-10-20 20:34:42',NULL,NULL),(3,2,8,1,12.00,'2019-10-20 20:53:45',NULL,NULL),(8,3,6,6,60.00,'2019-11-13 21:09:12',NULL,NULL);
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_stock` BEFORE INSERT ON `detalle_compras` FOR EACH ROW UPDATE producto SET pro_stock=pro_stock-NEW.detalle_cant_prod_compra
WHERE prod_id=NEW.detalle_id_prod_compra */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `eliminar_compra` BEFORE DELETE ON `detalle_compras` FOR EACH ROW UPDATE producto SET pro_stock=pro_stock+OLD.detalle_cant_prod_compra
WHERE prod_id=OLD.detalle_id_prod_compra */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `ingreso_adm`
--

LOCK TABLES `ingreso_adm` WRITE;
/*!40000 ALTER TABLE `ingreso_adm` DISABLE KEYS */;
INSERT INTO `ingreso_adm` VALUES (1,'Òˇ%ø°>\√\ÈÛ\ŒM1\rK','admin','admin','programa','0000000000','langoquil@gmail.com','1'),(2,'à¥µÑ\’˚äÕíBﬂ°C2¸','dasdas','lilili','olividofd','0914772876','kadd@hotmail.com','1');
/*!40000 ALTER TABLE `ingreso_adm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` VALUES (155,3,'0913777207',9,'2019-10-20 20:54:01','2019-10-21 17:05:46','1');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (3,'CAMARON SIN CABEZA',15.50,1,'nature-3322703_640.jpg','<div><b>Producto Nuevo, <u>en presentacion de 3 y 4&nbsp; pe</u>lado sin cascara</b><b><br></b></div>','1','Caja',1,5,NULL,'2019-11-13 22:16:56',89,'admin'),(4,'CAMARON CON CABEZA ',4.00,1,'caja.png','<ul><li>Proviene de muy buena calidad</li><li>Tiene muchas vitaminas<br></li></ul>','1','Caja',1,10,NULL,'2019-10-11 21:48:12',15,NULL),(5,'CAMARON APANADO',15.00,1,'IMG_0057.png','<b>Producto listo para freir</b><br>','1','Caja',1,4,'0000-00-00 00:00:00','2019-10-11 21:48:21',12,NULL),(6,'BROCHETA DE CAMARON',10.00,2,'IMG_0061.png','<div>Deliciosas brochetas preparadas y listas para freir o poner al horno:</div><div><ul><li>Cebollas</li><li>Pimientos</li><li>Camarones alinados<br></li></ul></div>','1','Caja',1,5,'0000-00-00 00:00:00','2019-10-21 17:17:39',34,'admin'),(7,'CAMARON CON COLA',5.00,1,'IMG_0055.png','camaron tamano 5cm.<br>','1','Funda',2,10,'0000-00-00 00:00:00','2019-10-11 21:49:56',11,NULL),(8,'CAMARON',12.00,1,'IMG_0055.png','CAMARON CRUDO','1','Caja',2,4,NULL,'2019-10-21 17:17:54',14,'admin');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_producto`
--

LOCK TABLES `tipo_producto` WRITE;
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto` VALUES (1,'FRESCO','1','crabs-2695329_640.jpg','admin'),(2,'PREPARADO','1','asian-1238673_640.jpg','admin');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('0913777207','Isabel','Cando','giov@hotmail.es','Sauces 9','091111111',2453441,'2019-10-06 18:42:03','0000-00-00 00:00:00','1','ÅC\Êk\Î¿ògNˇqm\Ô','maria'),('0914772876','GIOVANNA','FAUSTOS','giovy_27@hotmail.com','SAUCES 9 MZ 10 V10','0988887216',999888881,'2019-10-27 16:33:06',NULL,'1','ÅC\Êk\Î¿ògNˇqm\Ô','GIOVANNA');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `variedad`
--

LOCK TABLES `variedad` WRITE;
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
INSERT INTO `variedad` VALUES (1,'IQF',NULL,'2019-10-03 19:23:42','1',NULL),(2,'HGP.','2019-10-05 12:53:28','2019-10-20 09:59:27','1','admin');
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/BFcqLMWtttY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>','CANCION OREJA','2019-10-05 23:21:28','2019-10-05 23:51:59','1',NULL),(2,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GWhfZyJkHVE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>','MI VIDA SIN TI OREJA','2019-10-05 23:23:54','2019-10-20 12:12:31','1','admin'),(4,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4_sRMJCB2bs\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>','COMIDA RAPIDA','2019-10-05 23:26:27','2019-10-20 12:14:01','1','admin'),(5,'https://www.youtube.com/watch?v=GIF8rtso3ig','ULTIMO VALS','2019-10-05 23:27:44','0000-00-00 00:00:00','1',NULL),(10,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7dpVyIyDwEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>','RECETA 3','2019-10-20 12:29:10','0000-00-00 00:00:00','1','admin');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'id10196793_langoquil'
--

--
-- Dumping routines for database 'id10196793_langoquil'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-19 22:19:46
