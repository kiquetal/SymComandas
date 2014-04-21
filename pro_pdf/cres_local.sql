-- MySQL dump 10.13  Distrib 5.1.69, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: comandos
-- ------------------------------------------------------
-- Server version	5.1.69-0ubuntu0.11.10.1

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
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(80) DEFAULT NULL,
  `ruc` varchar(110) DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,'2013-08-25 23:45:10','Jose','3423',32,'300000.00','30000.00','330000.00'),(3,'2013-08-26 01:32:32','Juan','Pedro',37,'120000.00','12000.00','132000.00'),(4,'2013-08-26 04:32:48','dfds','3427',30,'100000.00','10000.00','110000.00'),(5,'2013-08-26 04:36:34','Jose','34234',33,'35000.00','3500.00','38500.00'),(6,'2013-08-26 04:41:09','Jual','34234',31,'120000.00','12000.00','132000.00'),(7,'2013-08-26 05:04:02','K','3324',34,'100000.00','10000.00','110000.00'),(8,'2013-08-26 05:05:28','Mn','2434',39,'100000.00','10000.00','110000.00'),(9,'2013-08-26 05:07:13','Julian','3423',35,'135000.00','13500.00','148500.00'),(10,'2013-08-27 08:12:55','Juan d el 20','133213',28,'100000.00','10000.00','110000.00'),(11,'2013-08-27 08:14:45','Me','na',20,'150000.00','15000.00','165000.00'),(13,'2013-09-02 01:27:53','JUal','Man',26,'100000.00','10000.00','110000.00'),(14,'2013-09-02 03:47:42','jose','32',42,'100000.00','10000.00','110000.00'),(16,'2013-09-02 03:56:01','jose','3423',44,'136500.00','13650.00','150150.00'),(17,'2013-09-02 03:59:09','j','43445',45,'136500.00','13650.00','150150.00'),(18,'2013-09-02 04:24:57','Kiquetal','14234',46,'236500.00','23650.00','260150.00'),(19,'2013-09-02 04:44:07','Kiquetal','231231',48,'220000.00','22000.00','242000.00'),(20,'2013-09-02 04:45:13','323','df',48,'220000.00','22000.00','242000.00'),(21,'2013-09-02 04:45:42','df','3213',48,'220000.00','22000.00','242000.00'),(22,'2013-09-02 05:38:51','julain','man',41,'136500.00','13650.00','150150.00'),(23,'2013-09-02 05:47:12','Jose','3423',49,'352500.00','35250.00','387750.00'),(24,'2013-09-04 00:08:58','lui','4338',51,'338500.00','33850.00','372350.00'),(25,'2013-09-10 05:42:22','Jose','34234',56,'220000.00','22000.00','242000.00'),(26,'2013-09-10 18:09:46','sadfghjkl','21014296',62,'200000.00','20000.00','220000.00'),(27,'2013-09-10 22:04:34','Jose','43423',63,'527000.00','52700.00','579700.00'),(28,'2013-09-10 22:05:33','Juan','3423',58,'999999.99','999999.99','999999.99'),(29,'2013-09-10 22:10:39','Pedro','4324',57,'20000.00','2000.00','22000.00'),(30,'2013-09-10 22:12:06','Juan','34234',64,'286000.00','28600.00','314600.00'),(31,'2013-09-13 03:21:27','josermn','34234',65,'236500.00','23650.00','260150.00'),(32,'2013-09-13 21:58:26','Mna','34324',73,'623500.00','62350.00','685850.00'),(33,'2013-09-13 22:17:46','Lkaj','432',74,'839000.00','83900.00','922900.00'),(34,'2013-09-13 22:23:49','bebible ','34324',77,'540000.00','54000.00','594000.00'),(35,'2013-09-17 13:34:38','Julian','34322',81,'999999.99','999999.99','999999.99'),(36,'2013-09-19 06:58:58','juan ped','34243',85,'136500.00','13650.00','150150.00'),(37,'2013-09-19 13:32:25','Las coas','3423',84,'30020001.00','3002000.10','33022001.10'),(38,'2013-09-19 15:33:31','Jose','34324',87,'550000.00','55000.00','605000.00'),(39,'2013-09-19 15:37:57','jukn','55544',88,'100000.00','10000.00','110000.00'),(40,'2013-09-19 15:37:57','jukn','55544',88,'100000.00','10000.00','110000.00'),(41,'2013-09-19 15:39:29','niium','5665',89,'36500.00','3650.00','40150.00'),(42,'2013-09-19 18:49:23','jmn','3434',92,'624000.00','62400.00','686400.00'),(43,'2013-09-20 04:44:18','clien','3423',95,'30152501.00','3015250.10','33167751.10'),(44,'2013-09-20 05:43:34','jose','54534',91,'669500.00','66950.00','736450.00'),(45,'2013-09-20 05:47:47','lkl','3424',96,'252000.00','25200.00','277200.00'),(46,'2013-09-20 17:17:08','Nab','3423',97,'260500.00','26050.00','286550.00'),(47,'2013-09-20 17:55:40','Jlm','2324',90,'318500.00','31850.00','350350.00'),(48,'2013-09-20 18:04:03','Mn','23134',98,'325000.00','32500.00','357500.00'),(49,'2013-09-20 18:09:14','Mn','232',93,'356500.00','35650.00','392150.00'),(50,'2013-09-20 18:29:34','hhasnd','2312',100,'325000.00','32500.00','357500.00'),(51,'2013-09-20 18:31:40','Pedro','34234',101,'41000.00','4100.00','45100.00'),(52,'2013-09-20 19:25:01','Mn','452',82,'236500.00','23650.00','260150.00'),(53,'2013-09-20 20:46:21','josep','44343',103,'136500.00','13650.00','150150.00'),(54,'2013-09-20 22:47:44','jhjhk','232342',80,'200000.00','20000.00','220000.00');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `owner_prod_id` varchar(30) DEFAULT NULL,
  `fec_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredientes`
--

LOCK TABLES `ingredientes` WRITE;
/*!40000 ALTER TABLE `ingredientes` DISABLE KEYS */;
INSERT INTO `ingredientes` VALUES (86,'Pepperoni','4,16','2013-09-19 18:51:02',0),(87,'Aceitunas LO mejor','4,11','2013-09-10 22:12:52',0),(88,'papas','10,11','2013-09-02 01:24:12',0),(89,'cebolla','9,11,12,16','2013-09-02 01:23:26',0),(90,'huevo frito','9','2013-08-14 21:45:30',0),(91,'jamon','9,10','2013-08-14 22:34:53',0),(92,'yerbas','10,4,9','2013-08-14 22:35:15',0),(93,'palmito','4','2013-08-14 21:47:09',0),(113,'lechugita','9','2013-08-27 07:39:56',0),(114,'tomate','9','2013-08-27 07:39:57',0),(115,'chorizo','9,10,11,13','2013-09-02 01:11:43',0),(116,'queso roquefocrkt','10','2013-08-28 01:38:18',0),(117,'Nuevo quesos','10','2013-08-28 02:54:59',0),(118,'Tomates','4','2013-08-28 04:53:42',0),(119,'cacao','11','2013-08-28 06:16:12',0),(120,'Cañamo','11','2013-09-01 21:38:21',0),(121,'tomate','11','2013-09-01 21:38:21',0),(122,'cevada','10','2013-09-02 00:57:03',0),(123,'Mi nuevo ingrediente','9,4','2013-09-02 07:23:58',0),(124,'titulo','21','2013-09-04 00:27:17',0),(125,'sueldo','21','2013-09-04 00:27:17',0),(126,'monedas','10','2013-09-13 22:04:34',0),(127,'dma','10','2013-09-13 22:04:57',0),(128,'queso','10','2013-09-19 13:34:24',0),(129,'legumbres','10','2013-09-20 14:46:15',0),(130,'macro','10','2013-09-20 17:21:03',0),(131,'nuevo','10','2013-09-20 22:49:50',0);
/*!40000 ALTER TABLE `ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa`
--

DROP TABLE IF EXISTS `mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` VALUES (1,'1 M');
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` varchar(250) DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
INSERT INTO `notificacion` VALUES (9,'2013-08-15 23:20:32','Pedido nro:31 fue cancelado',31,0,0),(10,'2013-08-16 03:59:33','Pedido nro:12 fue cancelado',12,0,0),(11,'2013-08-16 04:19:42','Pedido nro:20 fue cancelado',20,0,0),(12,'2013-08-16 04:22:28','Pedido nro:19 fue cancelado',19,0,0),(13,'2013-08-16 04:32:11','Pedido nro:18 fue cancelado',18,0,0),(14,'2013-08-16 04:37:22','Pedido nro:10 fue cancelado',10,0,0),(15,'2013-08-16 04:37:44','Pedido nro:17 fue cancelado',17,0,0),(16,'2013-08-16 04:38:33','Pedido nro:16 fue cancelado',16,0,0),(17,'2013-08-16 04:38:50','Pedido nro:11 fue cancelado',11,0,0),(18,'2013-08-16 06:10:58','Pedido nro:13 fue cancelado',13,0,0),(19,'2013-08-16 06:50:04','Pedido nro:2 fue cancelado',2,0,0),(20,'2013-08-19 13:10:47','Pedido nro:32 fue cancelado',32,0,0),(21,'2013-08-19 13:19:00','Pedido nro:33 fue cancelado',33,0,0),(22,'2013-08-20 16:31:49','Pedido nro:36 fue cancelado',36,0,0),(23,'2013-08-20 16:34:23','Pedido nro:37 fue cancelado',37,0,0),(24,'2013-08-20 16:42:49','Pedido nro:38 fue cancelado',38,0,0),(25,'2013-08-20 16:47:12','Pedido nro:40 fue cancelado',40,0,0),(26,'2013-08-24 23:32:14','Pedido nro:7 fue cancelado',7,0,0),(27,'2013-08-24 23:42:14','Pedido nro:35 fue cancelado',35,0,0),(28,'2013-08-24 23:42:49','Pedido nro:39 fue cancelado',39,0,0),(29,'2013-08-24 23:43:11','Pedido nro:39 fue cancelado',39,0,0),(30,'2013-08-24 23:44:38','Pedido nro:35 fue cancelado',35,0,0),(31,'2013-08-24 23:44:52','Pedido nro:35 fue cancelado',35,0,0),(32,'2013-08-24 23:45:11','Pedido nro:39 fue cancelado',39,0,0),(33,'2013-08-24 23:45:52','Pedido nro:34 listo para ser entregado',34,0,0),(34,'2013-08-24 23:52:11','Pedido nro:15 fue cancelado',15,0,0),(35,'2013-08-24 23:55:12','Pedido nro:22 fue cancelado',22,0,0),(36,'2013-08-24 23:55:41','Pedido nro:16 fue cancelado',16,0,0),(37,'2013-08-25 00:58:41','Pedido nro:36 fue cancelado',36,0,0),(38,'2013-08-25 04:10:14','Pedido nro:40 fue cancelado',40,0,2),(39,'2013-08-26 05:05:28','Pedido nro:39 fue cancelado',39,0,2),(40,'2013-08-26 05:07:13','Pedido nro:35 fue cancelado',35,0,2),(41,'2013-08-27 08:12:55','Pedido nro:28 fue cancelado',28,0,2),(42,'2013-08-27 08:14:45','Pedido nro:20 fue cancelado',20,0,2),(43,'2013-09-02 01:27:39','Pedido nro:26 fue cancelado',26,0,2),(44,'2013-09-02 01:27:53','Pedido nro:26 fue cancelado',26,0,2),(45,'2013-09-02 03:09:33','Pedido nro:41 listo para ser entregado',41,0,1),(46,'2013-09-02 03:12:03','Pedido nro:42 listo para ser entregado',42,0,1),(47,'2013-09-02 03:43:07','Pedido nro:43 listo para ser entregado',43,0,1),(48,'2013-09-02 03:43:47','Pedido nro:43 fue cancelado',43,0,2),(49,'2013-09-02 03:47:42','Pedido nro:42 fue cancelado',42,0,2),(50,'2013-09-02 03:48:02','Pedido nro:42 fue cancelado',42,0,2),(51,'2013-09-02 03:55:35','Pedido nro:44 listo para ser entregado',44,0,1),(52,'2013-09-02 03:56:01','Pedido nro:44 fue cancelado',44,0,2),(53,'2013-09-02 03:58:24','Pedido nro:45 listo para ser entregado',45,0,1),(54,'2013-09-02 03:59:09','Pedido nro:45 fue cancelado',45,0,2),(55,'2013-09-02 04:24:12','Pedido nro:46 listo para ser entregado',46,0,1),(56,'2013-09-02 04:24:58','Pedido nro:46 fue cancelado',46,0,2),(57,'2013-09-02 04:43:42','Pedido nro:48 listo para ser entregado',48,0,1),(58,'2013-09-02 04:44:07','Pedido nro:48 fue cancelado',48,0,2),(59,'2013-09-02 04:45:13','Pedido nro:48 fue cancelado',48,0,2),(60,'2013-09-02 04:45:42','Pedido nro:48 fue cancelado',48,0,2),(61,'2013-09-02 05:38:51','Pedido nro:41 fue cancelado',41,0,2),(62,'2013-09-02 05:44:48','Pedido nro:49 listo para ser entregado',49,0,1),(63,'2013-09-02 05:47:12','Pedido nro:49 fue cancelado',49,0,2),(64,'2013-09-04 00:06:50','Pedido nro:51 listo para ser entregado',51,0,1),(65,'2013-09-04 00:08:58','Pedido nro:51 fue cancelado',51,0,2),(66,'2013-09-10 05:26:32','Pedido nro:54 listo para ser entregado',54,0,1),(67,'2013-09-10 05:35:37','Pedido nro:56 listo para ser entregado',56,0,1),(68,'2013-09-10 05:39:31','Pedido nro:57 listo para ser entregado',57,0,1),(69,'2013-09-10 05:42:22','Pedido nro:56 fue cancelado',56,0,2),(70,'2013-09-10 05:43:30','Pedido nro:58 listo para ser entregado',58,0,1),(71,'2013-09-10 18:08:46','Pedido nro:62 listo para ser entregado',62,0,1),(72,'2013-09-10 18:09:46','Pedido nro:62 fue cancelado',62,0,2),(73,'2013-09-10 20:45:10','Pedido nro:63 listo para ser entregado',63,0,1),(74,'2013-09-10 22:04:34','Pedido nro:63 fue cancelado',63,0,2),(75,'2013-09-10 22:05:33','Pedido nro:58 fue cancelado',58,0,2),(76,'2013-09-10 22:10:39','Pedido nro:57 fue cancelado',57,0,2),(77,'2013-09-10 22:11:08','Pedido nro:64 listo para ser entregado',64,0,1),(78,'2013-09-10 22:12:06','Pedido nro:64 fue cancelado',64,0,2),(79,'2013-09-12 02:12:05','Pedido nro:65 listo para ser entregado',65,0,1),(80,'2013-09-13 03:20:47','Pedido nro:61 listo para ser entregado',61,0,1),(81,'2013-09-13 03:21:27','Pedido nro:65 fue cancelado',65,0,2),(82,'2013-09-13 21:56:12','Pedido nro:60 listo para ser entregado',60,0,1),(83,'2013-09-13 21:56:15','Pedido nro:55 listo para ser entregado',55,0,1),(84,'2013-09-13 21:56:33','Pedido nro:52 listo para ser entregado',52,0,1),(85,'2013-09-13 21:56:34','Pedido nro:50 listo para ser entregado',50,0,1),(86,'2013-09-13 21:56:35','Pedido nro:59 listo para ser entregado',59,0,1),(87,'2013-09-13 21:56:37','Pedido nro:66 listo para ser entregado',66,0,1),(88,'2013-09-13 21:56:38','Pedido nro:67 listo para ser entregado',67,0,1),(89,'2013-09-13 21:57:10','Pedido nro:73 listo para ser entregado',73,0,1),(90,'2013-09-13 21:58:26','Pedido nro:73 fue cancelado',73,0,2),(91,'2013-09-13 22:15:27','Pedido nro:74 listo para ser entregado',74,0,1),(92,'2013-09-13 22:17:46','Pedido nro:74 fue cancelado',74,0,2),(93,'2013-09-13 22:20:44','Pedido nro:76 listo para ser entregado',76,0,1),(94,'2013-09-13 22:22:06','Pedido nro:77 listo para ser entregado',77,0,1),(95,'2013-09-13 22:23:49','Pedido nro:77 fue cancelado',77,0,2),(96,'2013-09-17 13:33:57','Pedido nro:81 listo para ser entregado',81,0,1),(97,'2013-09-17 13:34:38','Pedido nro:81 fue cancelado',81,0,2),(98,'2013-09-19 06:57:43','Pedido nro:85 listo para ser entregado',85,0,1),(99,'2013-09-19 06:58:58','Pedido nro:85 fue cancelado',85,0,2),(100,'2013-09-19 13:31:15','Pedido nro:84 listo para ser entregado',84,0,1),(101,'2013-09-19 13:32:25','Pedido nro:84 fue cancelado',84,0,2),(102,'2013-09-19 15:32:45','Pedido nro:87 listo para ser entregado',87,0,1),(103,'2013-09-19 15:33:31','Pedido nro:87 fue cancelado',87,0,2),(104,'2013-09-19 15:37:25','Pedido nro:88 listo para ser entregado',88,0,1),(105,'2013-09-19 15:37:57','Pedido nro:88 fue cancelado',88,0,2),(106,'2013-09-19 15:37:57','Pedido nro:88 fue cancelado',88,0,2),(107,'2013-09-19 15:39:01','Pedido nro:89 listo para ser entregado',89,0,1),(108,'2013-09-19 15:39:29','Pedido nro:89 fue cancelado',89,0,2),(109,'2013-09-19 18:48:48','Pedido nro:92 listo para ser entregado',92,0,1),(110,'2013-09-19 18:49:23','Pedido nro:92 fue cancelado',92,0,2),(111,'2013-09-20 04:43:24','Pedido nro:95 listo para ser entregado',95,0,1),(112,'2013-09-20 04:44:18','Pedido nro:95 fue cancelado',95,0,2),(113,'2013-09-20 05:29:43','Pedido nro:94 listo para ser entregado',94,0,1),(114,'2013-09-20 05:32:18','Pedido nro:93 listo para ser entregado',93,0,1),(115,'2013-09-20 05:43:01','Pedido nro:91 listo para ser entregado',91,0,1),(116,'2013-09-20 05:43:34','Pedido nro:91 fue cancelado',91,0,2),(117,'2013-09-20 05:47:21','Pedido nro:96 listo para ser entregado',96,0,1),(118,'2013-09-20 05:47:47','Pedido nro:96 fue cancelado',96,0,2),(119,'2013-09-20 14:46:52','Pedido nro:86 listo para ser entregado',86,0,1),(120,'2013-09-20 17:16:45','Pedido nro:97 listo para ser entregado',97,0,1),(121,'2013-09-20 17:17:08','Pedido nro:97 fue cancelado',97,0,2),(122,'2013-09-20 17:54:07','Pedido nro:90 listo para ser entregado',90,0,1),(123,'2013-09-20 17:55:40','Pedido nro:90 fue cancelado',90,0,2),(124,'2013-09-20 18:03:37','Pedido nro:98 listo para ser entregado',98,0,1),(125,'2013-09-20 18:04:03','Pedido nro:98 fue cancelado',98,0,2),(126,'2013-09-20 18:09:14','Pedido nro:93 fue cancelado',93,0,2),(127,'2013-09-20 18:09:40','Pedido nro:69 listo para ser entregado',69,0,1),(128,'2013-09-20 18:28:56','Pedido nro:100 listo para ser entregado',100,0,1),(129,'2013-09-20 18:29:34','Pedido nro:100 fue cancelado',100,0,2),(130,'2013-09-20 18:31:03','Pedido nro:101 listo para ser entregado',101,0,1),(131,'2013-09-20 18:31:41','Pedido nro:101 fue cancelado',101,0,2),(132,'2013-09-20 19:19:11','Pedido nro:82 listo para ser entregado',82,0,1),(133,'2013-09-20 19:25:01','Pedido nro:82 fue cancelado',82,0,2),(134,'2013-09-20 19:38:56','Pedido nro:102 listo para ser entregado',102,0,1),(135,'2013-09-20 19:45:50','Pedido nro:103 listo para ser entregado',103,0,1),(136,'2013-09-20 20:45:55','Pedido nro:99 listo para ser entregado',99,0,1),(137,'2013-09-20 20:46:21','Pedido nro:103 fue cancelado',103,0,2),(138,'2013-09-20 20:47:19','Pedido nro:79 listo para ser entregado',79,0,1),(139,'2013-09-20 20:48:39','Pedido nro:83 listo para ser entregado',83,0,1),(140,'2013-09-20 22:46:52','Pedido nro:80 listo para ser entregado',80,0,1),(141,'2013-09-20 22:47:44','Pedido nro:80 fue cancelado',80,0,2);
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` int(11) DEFAULT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fec_can` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mesa_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mesa_id` (`mesa_id`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`mesa_id`) REFERENCES `mesa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,40000,'2013-08-14 14:57:24','2013-08-14 18:57:24',1,0),(2,13666,'2013-08-16 06:50:04','2013-08-16 10:50:04',1,1),(3,2333,'2013-08-14 04:46:29','0000-00-00 00:00:00',1,0),(5,NULL,'2013-08-14 04:46:39','0000-00-00 00:00:00',1,0),(6,NULL,'2013-08-14 14:51:58','0000-00-00 00:00:00',1,0),(7,NULL,'2013-08-24 23:32:13','2013-08-25 03:32:13',1,1),(8,NULL,'2013-08-14 14:57:14','2013-08-14 18:57:14',1,0),(9,NULL,'2013-08-14 14:54:20','0000-00-00 00:00:00',1,0),(10,162000,'2013-08-16 04:37:22','2013-08-16 08:37:22',1,1),(11,162000,'2013-08-16 04:38:50','2013-08-16 08:38:50',1,1),(12,262000,'2013-08-16 03:59:33','2013-08-16 07:59:32',1,1),(13,337000,'2013-08-16 06:10:58','2013-08-16 10:10:58',1,1),(14,100000,'2013-08-15 04:44:53','2013-08-15 08:44:53',1,1),(15,135000,'2013-08-24 23:52:11','2013-08-25 03:52:11',1,2),(16,100000,'2013-08-24 23:55:41','2013-08-25 03:55:41',1,2),(17,200000,'2013-08-16 04:37:44','2013-08-16 08:37:44',1,1),(18,100000,'2013-08-16 04:32:11','2013-08-16 08:32:11',1,1),(19,135000,'2013-08-16 04:22:28','2013-08-16 08:22:28',1,1),(20,150000,'2013-08-27 08:14:45','2013-08-27 12:14:45',1,2),(21,120000,'2013-08-15 23:20:01','2013-08-16 03:20:01',1,1),(22,135000,'2013-08-24 23:55:11','2013-08-25 03:55:11',1,2),(23,100000,'2013-08-15 04:56:46','2013-08-15 08:56:46',1,1),(24,100000,'2013-08-15 04:56:54','2013-08-15 08:56:54',1,1),(25,100000,'2013-08-15 23:19:29','2013-08-16 03:19:29',1,1),(26,100000,'2013-09-02 01:27:53','2013-09-02 05:27:53',1,2),(27,100000,'2013-08-15 23:17:37','2013-08-16 03:17:37',1,1),(28,100000,'2013-08-27 08:12:55','2013-08-27 12:12:55',1,2),(29,100000,'2013-08-15 23:18:05','2013-08-16 03:18:05',1,1),(30,100000,'2013-08-26 04:32:48','2013-08-26 08:32:48',1,2),(31,120000,'2013-08-26 04:41:10','2013-08-26 08:41:10',1,2),(32,300000,'2013-08-26 04:06:33','2013-08-19 17:10:47',1,2),(33,35000,'2013-08-26 04:36:34','2013-08-26 08:36:34',1,2),(34,100000,'2013-08-24 23:45:52','2013-08-25 03:45:52',1,1),(35,135000,'2013-08-26 05:07:13','2013-08-26 09:07:13',1,2),(36,120000,'2013-08-25 00:58:41','2013-08-25 04:58:41',1,2),(37,120000,'2013-08-20 16:34:23','2013-08-20 20:34:23',1,1),(38,120000,'2013-08-25 04:07:27','2013-08-25 08:07:27',1,2),(39,100000,'2013-08-26 05:05:28','2013-08-26 09:05:28',1,2),(40,120000,'2013-08-25 04:10:14','2013-08-25 08:10:14',1,2),(41,136500,'2013-09-02 05:38:51','2013-09-02 09:38:51',1,2),(42,100000,'2013-09-02 03:48:02','2013-09-02 07:48:02',1,2),(43,100000,'2013-09-02 03:43:47','2013-09-02 07:43:47',1,2),(44,136500,'2013-09-02 03:56:01','2013-09-02 07:56:01',1,2),(45,136500,'2013-09-02 03:59:09','2013-09-02 07:59:09',1,2),(46,236500,'2013-09-02 04:24:58','2013-09-02 08:24:58',1,2),(47,212000,'2013-09-02 04:42:45','0000-00-00 00:00:00',1,0),(48,220000,'2013-09-02 04:45:42','2013-09-02 08:45:42',1,2),(49,352500,'2013-09-02 05:47:12','2013-09-02 09:47:12',1,2),(50,136500,'2013-09-13 21:56:34','2013-09-13 21:56:34',1,1),(51,338500,'2013-09-04 00:08:58','2013-09-04 00:08:58',1,2),(52,30012001,'2013-09-13 21:56:33','2013-09-13 21:56:33',1,1),(53,100000,'2013-09-09 18:35:13','0000-00-00 00:00:00',1,0),(54,136500,'2013-09-10 05:26:32','2013-09-10 05:26:32',1,1),(55,277000,'2013-09-13 21:56:15','2013-09-13 21:56:15',1,1),(56,220000,'2013-09-10 05:42:22','2013-09-10 05:42:22',1,2),(57,20000,'2013-09-10 22:10:39','2013-09-10 22:10:39',1,2),(58,30020001,'2013-09-10 22:05:33','2013-09-10 22:05:33',1,2),(59,20000,'2013-09-13 21:56:35','2013-09-13 21:56:35',1,1),(60,61000,'2013-09-13 21:56:12','2013-09-13 21:56:12',1,1),(61,220000,'2013-09-13 03:20:47','2013-09-13 03:20:47',1,1),(62,200000,'2013-09-10 18:09:46','2013-09-10 18:09:46',1,2),(63,527000,'2013-09-10 22:04:34','2013-09-10 22:04:34',1,2),(64,286000,'2013-09-10 22:12:06','2013-09-10 22:12:06',1,2),(65,236500,'2013-09-13 03:21:27','2013-09-13 03:21:27',1,2),(66,100000,'2013-09-13 21:56:37','2013-09-13 21:56:37',1,1),(67,220000,'2013-09-13 21:56:38','2013-09-13 21:56:38',1,1),(68,500000,'2013-09-12 00:48:29','0000-00-00 00:00:00',1,0),(69,236500,'2013-09-20 18:09:40','2013-09-20 18:09:40',1,1),(70,557000,'2013-09-12 18:02:07','0000-00-00 00:00:00',1,0),(71,36500,'2013-09-12 21:13:35','0000-00-00 00:00:00',1,0),(72,398500,'2013-09-13 18:50:36','0000-00-00 00:00:00',1,0),(73,623500,'2013-09-13 21:58:26','2013-09-13 21:58:26',1,2),(74,839000,'2013-09-13 22:17:46','2013-09-13 22:17:46',1,2),(75,1295000,'2013-09-13 22:15:57','0000-00-00 00:00:00',1,0),(76,609500,'2013-09-13 22:20:44','2013-09-13 22:20:44',1,1),(77,540000,'2013-09-13 22:23:49','2013-09-13 22:23:49',1,2),(78,572500,'2013-09-14 03:01:56','0000-00-00 00:00:00',1,0),(79,318500,'2013-09-20 20:47:19','2013-09-20 20:47:19',1,1),(80,200000,'2013-09-20 22:47:44','2013-09-20 22:47:44',1,2),(81,30100001,'2013-09-17 13:34:38','2013-09-17 13:34:38',1,2),(82,236500,'2013-09-20 19:25:01','2013-09-20 19:25:01',1,2),(83,261000,'2013-09-20 20:48:39','2013-09-20 20:48:39',1,1),(84,30020001,'2013-09-19 13:32:25','2013-09-19 13:32:25',1,2),(85,136500,'2013-09-19 06:58:58','2013-09-19 06:58:58',1,2),(86,271000,'2013-09-20 14:46:52','2013-09-20 14:46:52',1,1),(87,550000,'2013-09-19 15:33:31','2013-09-19 15:33:31',1,2),(88,100000,'2013-09-19 15:37:57','2013-09-19 15:37:57',1,2),(89,36500,'2013-09-19 15:39:29','2013-09-19 15:39:29',1,2),(90,318500,'2013-09-20 17:55:40','2013-09-20 17:55:40',1,2),(91,669500,'2013-09-20 05:43:34','2013-09-20 05:43:34',1,2),(92,624000,'2013-09-19 18:49:23','2013-09-19 18:49:23',1,2),(93,356500,'2013-09-20 18:09:14','2013-09-20 18:09:14',1,2),(94,152500,'2013-09-20 05:29:43','2013-09-20 05:29:43',1,1),(95,30152501,'2013-09-20 04:44:18','2013-09-20 04:44:18',1,2),(96,252000,'2013-09-20 05:47:47','2013-09-20 05:47:47',1,2),(97,260500,'2013-09-20 17:17:08','2013-09-20 17:17:08',1,2),(98,325000,'2013-09-20 18:04:03','2013-09-20 18:04:03',1,2),(99,2000,'2013-09-20 20:45:55','2013-09-20 20:45:55',1,1),(100,325000,'2013-09-20 18:29:34','2013-09-20 18:29:34',1,2),(101,41000,'2013-09-20 18:31:40','2013-09-20 18:31:40',1,2),(102,124000,'2013-09-20 19:38:56','2013-09-20 19:38:56',1,1),(103,136500,'2013-09-20 20:46:21','2013-09-20 20:46:21',1,2),(104,100000,'2013-09-20 22:14:46','0000-00-00 00:00:00',1,0),(105,58500,'2013-09-21 00:25:56','0000-00-00 00:00:00',1,0);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_detalle`
--

DROP TABLE IF EXISTS `pedidos_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) DEFAULT NULL,
  `item` varchar(40) DEFAULT NULL,
  `sub_producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `pedidos_detalle_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_detalle`
--

LOCK TABLES `pedidos_detalle` WRITE;
/*!40000 ALTER TABLE `pedidos_detalle` DISABLE KEYS */;
INSERT INTO `pedidos_detalle` VALUES (1,NULL,'Mixta',21),(2,NULL,'adasd',30),(3,8,'Mixta',21),(4,8,'adasd',30),(5,9,'MixtaEnsaladas',21),(6,9,'adasdEnsaladas',30),(7,10,'MixtaEnsaladas',21),(8,10,'adasdEnsaladas',30),(9,11,'Ensaladas Mixta',21),(10,11,'Ensaladas adasd',30),(11,12,'Ensaladas Mixta',21),(12,12,'Ensaladas adasd',30),(13,12,'Bebibdas Cerveza',29),(14,13,'Bebibdas Whiskey',24),(15,13,'Pizza Calabresa',17),(16,13,'Pizza Pizza kiquetal',34),(17,14,'Bebibdas Cerveza',29),(18,15,'Bebibdas Cerveza',29),(19,15,'Bebibdas Whiskey',24),(20,16,'Bebibdas Cerveza',29),(21,17,'Bebibdas Cerveza',29),(22,17,'Bebibdas Cerveza',29),(23,18,'Bebibdas Cerveza',29),(24,19,'Bebibdas Cerveza',29),(25,19,'Bebibdas Whiskey',24),(26,20,'Bebibdas Cerveza',29),(27,20,'Bebibdas Whiskey',24),(28,20,'Pizza Napolitana',16),(29,21,'Bebibdas Cerveza',29),(30,21,'Picadas Mandioca Frita',20),(31,22,'Bebibdas Cerveza',29),(32,22,'Bebibdas Whiskey',24),(33,23,'Bebibdas Cerveza',29),(34,24,'Bebibdas Cerveza',29),(35,25,'Bebibdas Cerveza',29),(36,26,'Bebibdas Cerveza',29),(37,27,'Bebibdas Cerveza',29),(38,28,'Bebibdas Cerveza',29),(39,29,'Bebibdas Cerveza',29),(40,30,'Bebibdas Cerveza',29),(41,31,'Bebibdas Cerveza',29),(42,31,'Picadas Mandioca Frita',20),(43,32,'Bebidas Cerveza',29),(44,32,'Bebidas Cerveza',29),(45,32,'Bebidas Cerveza',29),(46,33,'Bebidas Whiskey',24),(47,34,'Bebidas Cerveza',29),(48,35,'Bebidas Cerveza',29),(49,35,'Bebidas Whiskey',24),(50,36,'Bebidas Cerveza',29),(51,36,'Picadas Mandioca Frita',20),(52,37,'Bebidas Cerveza',29),(53,37,'Picadas Mandioca Frita',20),(54,38,'Bebidas Cerveza',29),(55,38,'Picadas Mandioca Frita',20),(56,39,'Bebidas Cerveza',29),(57,40,'Bebidas Cerveza',29),(58,40,'Picadas Mandioca Frita',20),(59,41,'Bebidas   Cerveza',29),(60,41,'Bebidas   Whiskey  Legal',24),(61,42,'Bebidas   Cerveza',29),(62,43,'Bebidas   Cerveza',29),(63,44,'Bebidas   Cerveza',29),(64,44,'Bebidas   Whiskey  Legal',24),(65,45,'Bebidas   Cerveza',29),(66,45,'Bebidas   Whiskey  Legal',24),(67,46,'Bebidas   Cerveza',29),(68,46,'Bebidas   Whiskey  Legal',24),(69,46,'Bebidas   Cerveza',29),(70,47,'Bebidas   Cerveza',29),(71,47,'Bebidas   Cerveza',29),(72,47,'Ensaladas    Mixta s',21),(73,48,'Bebidas   Cerveza',29),(74,48,'Bebidas   Cerveza',29),(75,48,'Picadas Mandioca Frita',20),(76,49,'Bebidas   Whiskey  Legal',24),(77,49,'Pizza  Napolitana ',16),(78,49,'Pizza  Pizza kiquetal',34),(79,50,'Bebidas   Cerveza',29),(80,50,'Bebidas   Whiskey  Legal',24),(81,51,'Pizza  Pizza kiquetal',34),(82,51,'Pizza  romana',33),(83,51,'Bebidas   Whiskey  Legal',24),(84,52,'lui myriam',40),(85,52,'Postres        torta',39),(86,53,'Bebidas   Cerveza',29),(87,54,'Bebidas   Cerveza',29),(88,54,'Bebidas   Whiskey  Legal',24),(89,55,'Ensaladas    Mixta s',21),(90,55,'Ensaladas    ALEMANA    ',28),(91,56,'Picadas Mandioca Frita',20),(92,56,'Picadas Cannibal',31),(93,57,'Picadas Mandioca Frita',20),(94,58,'Picadas Mandioca Frita',20),(95,58,'lui myriam',40),(96,59,'Picadas Mandioca Frita',20),(97,60,'Picadas Mandioca Frita',20),(98,60,'Pizza  Napolitana ',16),(99,60,'Postres        Tiramisu M   ',25),(100,61,'Picadas  Mandioca Frita',20),(101,61,'Picadas  Cannibal',31),(102,62,'Bebidas   Cerveza',29),(103,62,'Bebidas   Cerveza',29),(104,63,'Ensaladas    Mixta s',21),(105,63,'Ensaladas    ALEMANA    ',28),(106,63,'Ensaladas    MILANESA',35),(107,64,'Picadas  Mandioca Frita',20),(108,64,'Picadas  Cannibal',31),(109,64,'Picadas  Mandioca Frita',20),(110,64,'Pizza  Napolitana ',16),(111,64,'Pizza  Catupiry ',19),(112,65,'Bebidas   Cerveza',29),(113,65,'Bebidas   Cerveza',29),(114,65,'Bebidas   Whiskey  Legal',24),(115,66,'Bebidas   Cerveza',29),(116,67,'Bebidas   Cerveza',29),(117,67,'Bebidas   Cerveza',29),(118,67,'Picadas  Mandioca Frita',20),(119,68,'Bebidas   Cerveza',29),(120,68,'Bebidas   Cerveza',29),(121,68,'Bebidas   Cerveza',29),(122,68,'Bebidas   Cerveza',29),(123,68,'Bebidas   Cerveza',29),(124,69,'Bebidas   Cerveza',29),(125,69,'Bebidas   Whiskey  Legal',24),(126,69,'Bebidas   Cerveza',29),(127,70,'Ensaladas    Mixta s',21),(128,70,'Ensaladas    Rusa',27),(129,70,'Ensaladas    Las piedras [ultra]   ',22),(130,71,'Bebidas   Whiskey  Legal',24),(131,72,'Bebidas   Cerveza',29),(132,72,'Bebidas   Whiskey  Legal',24),(133,72,'Ensaladas    Mixta s',21),(134,72,'Ensaladas    MILANESA',35),(135,73,'Bebidas   Cerveza',29),(136,73,'Bebidas   Whiskey  Legal',24),(137,73,'Ensaladas    Mixta s',21),(138,73,'Ensaladas    Rusa',27),(139,73,'Ensaladas    ALEMANA    ',28),(140,73,'Pizza  Napolitana ',16),(141,73,'Pizza  Margarita',18),(142,73,'Postres        Tiramisu M   ',25),(143,73,'Postres        Brownie',38),(144,74,'Bebidas   Cerveza',29),(145,74,'Postres        Tiramisu M   ',25),(146,74,'Postres        pie',37),(147,74,'Ensaladas    Mixta Man   lk  ',21),(148,74,'Ensaladas    Rusa ',27),(149,74,'Ensaladas    alemana',32),(150,74,'Ensaladas    adasd',30),(151,74,'Ensaladas    adasd',30),(152,74,'Ensaladas    adasd',30),(153,75,'Bebidas   Cerveza',29),(154,75,'Ensaladas    Mixta Man   lk  ',21),(155,75,'Ensaladas    adasd',30),(156,75,'Ensaladas    MILANESA',35),(157,75,'Ensaladas    Las piedras [ultra]    ',22),(158,75,'Ensaladas    Rusa ',27),(159,75,'Picadas  Mandioca Frita',20),(160,76,'Bebidas   Whiskey  Legal',24),(161,76,'Picadas  Mandioca Frita',20),(162,76,'Picadas  Cannibal',31),(163,76,'Pizza  Napolitana ',16),(164,76,'Pizza  Margarita',18),(165,76,'Pizza  romana',33),(166,76,'Pizza  Pizza kiquetal',34),(167,77,'Bebidas   Cerveza',29),(168,77,'Bebidas   Cerveza',29),(169,77,'Bebidas   Cerveza',29),(170,77,'Picadas  Mandioca Frita',20),(171,77,'Picadas  Mandioca Frita',20),(172,77,'Picadas  Cannibal',31),(173,78,'Bebidas   Whiskey  Legal',24),(174,78,'Picadas   Mandioca Frita',20),(175,78,'Picadas   Cannibal',31),(176,78,'Pizza Extra Napolitana ',16),(177,78,'Pizza Extra Pizza kiquetal',34),(178,79,'Picadas   Mandioca Frita',20),(179,79,'Picadas   Cannibal',31),(180,79,'Pizza Extra Napolitana ',16),(181,79,'Pizza Extra Catupiry ',19),(182,79,'Pizza Extra Calabresa ',17),(183,79,'Postres                    Tiramisu M   ',25),(184,79,'Postres                    Tiramisu M   ',25),(185,80,'Bebidas   Cerveza',29),(186,80,'Bebidas   Cerveza',29),(187,81,'Bebidas   Cerveza',29),(188,81,'lui myriam',40),(189,82,'Bebidas   Cerveza',29),(190,82,'Bebidas   Cerveza',29),(191,82,'Bebidas   Whiskey  Legal',24),(192,83,'Picadas   Mandioca Frita',20),(193,83,'Picadas   Cannibal',31),(194,83,'Pizza Extra Napolitana ',16),(195,83,'Postres                    Tiramisu M   ',25),(196,84,'lui myriam',40),(197,84,'Picadas   Mandioca Frita',20),(198,85,'Bebidas   Cerveza',29),(199,85,'Bebidas   Whiskey  Legal',24),(200,86,'Picadas   Mandioca Frita',20),(201,86,'Picadas   Cannibal',31),(202,86,'Pizza Extra Napolitana ',16),(203,86,'Pizza Extra Margarita',18),(204,87,'Picadas   Mandioca Frita',20),(205,87,'Picadas   Cannibal',31),(206,87,'Pizza Extra Napolitana ',16),(207,87,'Pizza Extra Pizza kiquetal',34),(208,87,'Pizza Extra romana',33),(209,87,'Pizza Extra romana',33),(210,87,'Pizza Extra romana',33),(211,87,'Pizza Extra romana',33),(212,87,'Pizza Extra romana',33),(213,87,'Pizza Extra romana',33),(214,87,'Pizza Extra romana',33),(215,88,'Bebidas   Cerveza',29),(216,89,'Bebidas   Whiskey  Legal',24),(217,90,'Pizza Extra Napolitana ',16),(218,90,'Pizza Extra Pizza kiquetal',34),(219,90,'Pizza Extra Calabresa ',17),(220,91,'Ensaladas      Mixta Man   lk  ',21),(221,91,'Ensaladas      ALEMANA    ',28),(222,91,'Ensaladas      MILANESA ',35),(223,91,'Pizza Extra Catupiry ',19),(224,91,'Pizza Extra Calabresa ',17),(225,92,'Bebidas   Cerveza',29),(226,92,'Ensaladas      Mixta Man   lk  ',21),(227,92,'Ensaladas      adasd',30),(228,92,'Ensaladas      alemana',32),(229,92,'Ensaladas      MILANESA ',35),(230,93,'Bebidas   Whiskey  Legal',24),(231,93,'Bebidas   Cerveza',29),(232,93,'Picadas   Mandioca Frita',20),(233,93,'Picadas   Cannibal',31),(234,94,'Bebidas   Cerveza',29),(235,94,'Bebidas   Whiskey  Legal',24),(236,94,'Pizza Extra Napolitana ',16),(237,95,'Bebidas   Cerveza',29),(238,95,'Bebidas   Whiskey  Legal',24),(239,95,'lui myriam',40),(240,95,'Pizza Extra        Napolitana ',16),(241,96,'Ensaladas      alemana',32),(242,96,'Ensaladas      MILANESA ',35),(243,97,'Bebidas   al  Cerveza',29),(244,97,'Bebidas   al  Whiskey  Legal',24),(245,97,'Ensaladas      Mixta Man   lk   ',21),(246,97,'Ensaladas      alemana',32),(247,98,'Pizza Extra              Napolitana',36),(248,98,'Pizza Extra              romana',33),(249,98,'Pizza Extra              Pizza kiquetal',34),(250,99,'Pizza Extra              romana',33),(251,100,'Pizza Extra              romana',33),(252,100,'Pizza Extra              Pizza kiquetal',34),(253,100,'Pizza Extra              Napolitana',36),(254,101,'Pizza Extra              romana',33),(255,101,'Postres                    Tiramisu M   ',25),(256,101,'Postres                    Brownie',38),(257,102,'Ensaladas      Mixta Man   lk     ',21),(258,102,'Ensaladas      alemana',32),(259,103,'Bebidas   al      Cerveza',29),(260,103,'Bebidas   al      Whiskey  Legal',24),(261,104,'Bebidas   al      Cerveza',29),(262,105,'Bebidas   al       Cerveza ',23),(263,105,'Bebidas   al       Whiskey  Legal',24);
/*!40000 ALTER TABLE `pedidos_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (4,'Pizza Extra             ',0),(9,'Picadas  ',0),(10,'Ensaladas     ',0),(11,'Postres                   ',0),(12,'Bebidas   al      ',0),(13,'Comidas tipicas2 ',0),(16,'Milanesas  ',0),(17,'Pastas     ',0),(19,'Meriendas    LOCAS   ',1),(20,'Novedades MALAS',0),(21,'lui',0);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_images`
--

DROP TABLE IF EXISTS `producto_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_images` (
  `product_id` int(11) DEFAULT NULL,
  `path_img` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_producto` (`product_id`),
  CONSTRAINT `fk_producto` FOREIGN KEY (`product_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_images`
--

LOCK TABLES `producto_images` WRITE;
/*!40000 ALTER TABLE `producto_images` DISABLE KEYS */;
INSERT INTO `producto_images` VALUES (16,'/uploads/producto/producto_16.jpeg',1),(17,'/uploads/producto/producto_17.png',2),(19,'/uploads/producto/producto_19.jpeg',4),(11,'/uploads/producto/producto_11.png',5),(12,'/uploads/producto/producto_12.jpeg',6),(4,'/uploads/producto/producto_4.jpeg',7),(10,'/uploads/producto/producto_10.jpeg',8),(20,'/uploads/producto/producto_20.jpeg',9),(21,'/uploads/producto/producto_21.jpeg',10),(9,'/uploads/producto/producto_9.png',11),(13,'/uploads/producto/producto_13.jpeg',12);
/*!40000 ALTER TABLE `producto_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_producto`
--

DROP TABLE IF EXISTS `sub_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `fec_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `sub_producto_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_producto`
--

LOCK TABLES `sub_producto` WRITE;
/*!40000 ALTER TABLE `sub_producto` DISABLE KEYS */;
INSERT INTO `sub_producto` VALUES (16,'Napolitana ',4,'16000.00','2013-08-28 04:54:31',1),(17,'Calabresa ',4,'2500.00','2013-08-28 04:51:22',1),(18,'Margarita',4,'35000.00','2013-08-28 04:46:24',1),(19,'Catupiry ',4,'30000.00','2013-08-28 05:17:17',1),(20,'Mandioca Frita',9,'20000.00','2013-08-28 05:16:50',1),(21,'Mixta Man   lk      ',10,'122000.00','2013-09-20 22:49:50',0),(22,'Las piedras [ultra]     ',10,'535000.00','2013-09-20 15:24:48',0),(23,'Cerveza ',12,'22000.00','2013-09-20 22:51:54',0),(24,'Whiskey  Legal',12,'36500.00','2013-08-28 06:19:19',0),(25,'Tiramisu M   ',11,'25000.00','2013-09-01 21:39:05',0),(26,'Brownie',11,'20000.00','2013-08-05 00:57:59',0),(27,'Rusa ',10,'128000.00','2013-09-13 22:03:11',0),(28,'ALEMANA    ',10,'265000.00','2013-08-28 02:54:59',0),(29,'Cerveza',12,'100000.00','2013-08-08 02:32:06',0),(30,'adasd',10,'150000.00','2013-09-20 19:23:50',1),(31,'Cannibal',9,'200000.00','2013-08-28 04:40:21',1),(32,'alemana',10,'2000.00','2013-08-08 04:22:34',0),(33,'romana',4,'2000.00','2013-08-08 04:22:34',0),(34,'Pizza kiquetal',4,'300000.00','2013-08-08 04:26:54',0),(35,'MILANESA ',10,'250000.00','2013-09-19 13:34:24',0),(36,'Napolitana',4,'23000.00','2013-08-28 05:18:32',0),(37,'pie',11,'12000.00','2013-08-28 06:11:39',0),(38,'Brownie',11,'14000.00','2013-08-28 06:13:36',0),(39,'torta',11,'12000.00','2013-08-28 06:16:12',0),(40,'myriam',21,'30000001.00','2013-09-20 04:47:39',1);
/*!40000 ALTER TABLE `sub_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_producto_ingredientes`
--

DROP TABLE IF EXISTS `sub_producto_ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_producto_ingredientes` (
  `sub_producto_id` int(11) NOT NULL DEFAULT '0',
  `ingredientes_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sub_producto_id`,`ingredientes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_producto_ingredientes`
--

LOCK TABLES `sub_producto_ingredientes` WRITE;
/*!40000 ALTER TABLE `sub_producto_ingredientes` DISABLE KEYS */;
INSERT INTO `sub_producto_ingredientes` VALUES (19,86),(19,87),(19,118),(21,126),(21,130),(21,131),(22,122),(25,120),(28,89),(28,116),(28,117),(30,88),(30,89),(31,113),(32,92),(33,87),(33,93),(35,91),(35,128),(36,87),(36,92),(36,93);
/*!40000 ALTER TABLE `sub_producto_ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-24  4:35:27
