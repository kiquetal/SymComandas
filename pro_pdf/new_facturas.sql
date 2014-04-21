-- MySQL dump 10.13  Distrib 5.5.25a, for Linux (i686)
--
-- Host: localhost    Database: comandos
-- ------------------------------------------------------
-- Server version	5.5.25a-log

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
  `sub_total` decimal(8,2) DEFAULT NULL,
  `iva` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,'2013-08-25 23:45:10','Jose','3423',32,300000.00,30000.00,330000.00),(3,'2013-08-26 01:32:32','Juan','Pedro',37,120000.00,12000.00,132000.00),(4,'2013-08-26 04:32:48','dfds','3427',30,100000.00,10000.00,110000.00),(5,'2013-08-26 04:36:34','Jose','34234',33,35000.00,3500.00,38500.00),(6,'2013-08-26 04:41:09','Jual','34234',31,120000.00,12000.00,132000.00),(7,'2013-08-26 05:04:02','K','3324',34,100000.00,10000.00,110000.00),(8,'2013-08-26 05:05:28','Mn','2434',39,100000.00,10000.00,110000.00),(9,'2013-08-26 05:07:13','Julian','3423',35,135000.00,13500.00,148500.00),(10,'2013-08-27 08:12:55','Juan d el 20','133213',28,100000.00,10000.00,110000.00),(11,'2013-08-27 08:14:45','Me','na',20,150000.00,15000.00,165000.00),(13,'2013-09-02 01:27:53','JUal','Man',26,100000.00,10000.00,110000.00),(14,'2013-09-02 03:47:42','jose','32',42,100000.00,10000.00,110000.00),(16,'2013-09-02 03:56:01','jose','3423',44,136500.00,13650.00,150150.00),(17,'2013-09-02 03:59:09','j','43445',45,136500.00,13650.00,150150.00),(18,'2013-09-02 04:24:57','Kiquetal','14234',46,236500.00,23650.00,260150.00),(19,'2013-09-02 04:44:07','Kiquetal','231231',48,220000.00,22000.00,242000.00),(20,'2013-09-02 04:45:13','323','df',48,220000.00,22000.00,242000.00),(21,'2013-09-02 04:45:42','df','3213',48,220000.00,22000.00,242000.00),(22,'2013-09-02 05:38:51','julain','man',41,136500.00,13650.00,150150.00),(23,'2013-09-02 05:47:12','Jose','3423',49,352500.00,35250.00,387750.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredientes`
--

LOCK TABLES `ingredientes` WRITE;
/*!40000 ALTER TABLE `ingredientes` DISABLE KEYS */;
INSERT INTO `ingredientes` VALUES (86,'Pepperoni','4','2013-08-14 21:38:14',0),(87,'Aceitunas','4','2013-08-14 21:38:33',0),(88,'papas','10,11','2013-09-02 01:24:12',0),(89,'cebolla','9,11,12,16','2013-09-02 01:23:26',0),(90,'huevo frito','9','2013-08-14 21:45:30',0),(91,'jamon','9,10','2013-08-14 22:34:53',0),(92,'yerbas','10,4,9','2013-08-14 22:35:15',0),(93,'palmito','4','2013-08-14 21:47:09',0),(113,'lechugita','9','2013-08-27 07:39:56',0),(114,'tomate','9','2013-08-27 07:39:57',0),(115,'chorizo','9,10,11,13','2013-09-02 01:11:43',0),(116,'queso roquefocrkt','10','2013-08-28 01:38:18',0),(117,'Nuevo quesos','10','2013-08-28 02:54:59',0),(118,'Tomates','4','2013-08-28 04:53:42',0),(119,'cacao','11','2013-08-28 06:16:12',0),(120,'Cañamo','11','2013-09-01 21:38:21',0),(121,'tomate','11','2013-09-01 21:38:21',0),(122,'cevada','10','2013-09-02 00:57:03',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
INSERT INTO `notificacion` VALUES (9,'2013-08-15 23:20:32','Pedido nro:31 fue cancelado',31,0,0),(10,'2013-08-16 03:59:33','Pedido nro:12 fue cancelado',12,0,0),(11,'2013-08-16 04:19:42','Pedido nro:20 fue cancelado',20,0,0),(12,'2013-08-16 04:22:28','Pedido nro:19 fue cancelado',19,0,0),(13,'2013-08-16 04:32:11','Pedido nro:18 fue cancelado',18,0,0),(14,'2013-08-16 04:37:22','Pedido nro:10 fue cancelado',10,0,0),(15,'2013-08-16 04:37:44','Pedido nro:17 fue cancelado',17,0,0),(16,'2013-08-16 04:38:33','Pedido nro:16 fue cancelado',16,0,0),(17,'2013-08-16 04:38:50','Pedido nro:11 fue cancelado',11,0,0),(18,'2013-08-16 06:10:58','Pedido nro:13 fue cancelado',13,0,0),(19,'2013-08-16 06:50:04','Pedido nro:2 fue cancelado',2,0,0),(20,'2013-08-19 13:10:47','Pedido nro:32 fue cancelado',32,0,0),(21,'2013-08-19 13:19:00','Pedido nro:33 fue cancelado',33,0,0),(22,'2013-08-20 16:31:49','Pedido nro:36 fue cancelado',36,0,0),(23,'2013-08-20 16:34:23','Pedido nro:37 fue cancelado',37,0,0),(24,'2013-08-20 16:42:49','Pedido nro:38 fue cancelado',38,0,0),(25,'2013-08-20 16:47:12','Pedido nro:40 fue cancelado',40,0,0),(26,'2013-08-24 23:32:14','Pedido nro:7 fue cancelado',7,0,0),(27,'2013-08-24 23:42:14','Pedido nro:35 fue cancelado',35,0,0),(28,'2013-08-24 23:42:49','Pedido nro:39 fue cancelado',39,0,0),(29,'2013-08-24 23:43:11','Pedido nro:39 fue cancelado',39,0,0),(30,'2013-08-24 23:44:38','Pedido nro:35 fue cancelado',35,0,0),(31,'2013-08-24 23:44:52','Pedido nro:35 fue cancelado',35,0,0),(32,'2013-08-24 23:45:11','Pedido nro:39 fue cancelado',39,0,0),(33,'2013-08-24 23:45:52','Pedido nro:34 listo para ser entregado',34,0,0),(34,'2013-08-24 23:52:11','Pedido nro:15 fue cancelado',15,0,0),(35,'2013-08-24 23:55:12','Pedido nro:22 fue cancelado',22,0,0),(36,'2013-08-24 23:55:41','Pedido nro:16 fue cancelado',16,0,0),(37,'2013-08-25 00:58:41','Pedido nro:36 fue cancelado',36,0,0),(38,'2013-08-25 04:10:14','Pedido nro:40 fue cancelado',40,0,2),(39,'2013-08-26 05:05:28','Pedido nro:39 fue cancelado',39,0,2),(40,'2013-08-26 05:07:13','Pedido nro:35 fue cancelado',35,0,2),(41,'2013-08-27 08:12:55','Pedido nro:28 fue cancelado',28,0,2),(42,'2013-08-27 08:14:45','Pedido nro:20 fue cancelado',20,0,2),(43,'2013-09-02 01:27:39','Pedido nro:26 fue cancelado',26,0,2),(44,'2013-09-02 01:27:53','Pedido nro:26 fue cancelado',26,0,2),(45,'2013-09-02 03:09:33','Pedido nro:41 listo para ser entregado',41,0,1),(46,'2013-09-02 03:12:03','Pedido nro:42 listo para ser entregado',42,0,1),(47,'2013-09-02 03:43:07','Pedido nro:43 listo para ser entregado',43,0,1),(48,'2013-09-02 03:43:47','Pedido nro:43 fue cancelado',43,0,2),(49,'2013-09-02 03:47:42','Pedido nro:42 fue cancelado',42,0,2),(50,'2013-09-02 03:48:02','Pedido nro:42 fue cancelado',42,0,2),(51,'2013-09-02 03:55:35','Pedido nro:44 listo para ser entregado',44,0,1),(52,'2013-09-02 03:56:01','Pedido nro:44 fue cancelado',44,0,2),(53,'2013-09-02 03:58:24','Pedido nro:45 listo para ser entregado',45,0,1),(54,'2013-09-02 03:59:09','Pedido nro:45 fue cancelado',45,0,2),(55,'2013-09-02 04:24:12','Pedido nro:46 listo para ser entregado',46,0,1),(56,'2013-09-02 04:24:58','Pedido nro:46 fue cancelado',46,0,2),(57,'2013-09-02 04:43:42','Pedido nro:48 listo para ser entregado',48,0,1),(58,'2013-09-02 04:44:07','Pedido nro:48 fue cancelado',48,0,2),(59,'2013-09-02 04:45:13','Pedido nro:48 fue cancelado',48,0,2),(60,'2013-09-02 04:45:42','Pedido nro:48 fue cancelado',48,0,2),(61,'2013-09-02 05:38:51','Pedido nro:41 fue cancelado',41,0,2),(62,'2013-09-02 05:44:48','Pedido nro:49 listo para ser entregado',49,0,1),(63,'2013-09-02 05:47:12','Pedido nro:49 fue cancelado',49,0,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,40000,'2013-08-14 14:57:24','2013-08-14 18:57:24',1,0),(2,13666,'2013-08-16 06:50:04','2013-08-16 10:50:04',1,1),(3,2333,'2013-08-14 04:46:29','0000-00-00 00:00:00',1,0),(5,NULL,'2013-08-14 04:46:39','0000-00-00 00:00:00',1,0),(6,NULL,'2013-08-14 14:51:58','0000-00-00 00:00:00',1,0),(7,NULL,'2013-08-24 23:32:13','2013-08-25 03:32:13',1,1),(8,NULL,'2013-08-14 14:57:14','2013-08-14 18:57:14',1,0),(9,NULL,'2013-08-14 14:54:20','0000-00-00 00:00:00',1,0),(10,162000,'2013-08-16 04:37:22','2013-08-16 08:37:22',1,1),(11,162000,'2013-08-16 04:38:50','2013-08-16 08:38:50',1,1),(12,262000,'2013-08-16 03:59:33','2013-08-16 07:59:32',1,1),(13,337000,'2013-08-16 06:10:58','2013-08-16 10:10:58',1,1),(14,100000,'2013-08-15 04:44:53','2013-08-15 08:44:53',1,1),(15,135000,'2013-08-24 23:52:11','2013-08-25 03:52:11',1,2),(16,100000,'2013-08-24 23:55:41','2013-08-25 03:55:41',1,2),(17,200000,'2013-08-16 04:37:44','2013-08-16 08:37:44',1,1),(18,100000,'2013-08-16 04:32:11','2013-08-16 08:32:11',1,1),(19,135000,'2013-08-16 04:22:28','2013-08-16 08:22:28',1,1),(20,150000,'2013-08-27 08:14:45','2013-08-27 12:14:45',1,2),(21,120000,'2013-08-15 23:20:01','2013-08-16 03:20:01',1,1),(22,135000,'2013-08-24 23:55:11','2013-08-25 03:55:11',1,2),(23,100000,'2013-08-15 04:56:46','2013-08-15 08:56:46',1,1),(24,100000,'2013-08-15 04:56:54','2013-08-15 08:56:54',1,1),(25,100000,'2013-08-15 23:19:29','2013-08-16 03:19:29',1,1),(26,100000,'2013-09-02 01:27:53','2013-09-02 05:27:53',1,2),(27,100000,'2013-08-15 23:17:37','2013-08-16 03:17:37',1,1),(28,100000,'2013-08-27 08:12:55','2013-08-27 12:12:55',1,2),(29,100000,'2013-08-15 23:18:05','2013-08-16 03:18:05',1,1),(30,100000,'2013-08-26 04:32:48','2013-08-26 08:32:48',1,2),(31,120000,'2013-08-26 04:41:10','2013-08-26 08:41:10',1,2),(32,300000,'2013-08-26 04:06:33','2013-08-19 17:10:47',1,2),(33,35000,'2013-08-26 04:36:34','2013-08-26 08:36:34',1,2),(34,100000,'2013-08-24 23:45:52','2013-08-25 03:45:52',1,1),(35,135000,'2013-08-26 05:07:13','2013-08-26 09:07:13',1,2),(36,120000,'2013-08-25 00:58:41','2013-08-25 04:58:41',1,2),(37,120000,'2013-08-20 16:34:23','2013-08-20 20:34:23',1,1),(38,120000,'2013-08-25 04:07:27','2013-08-25 08:07:27',1,2),(39,100000,'2013-08-26 05:05:28','2013-08-26 09:05:28',1,2),(40,120000,'2013-08-25 04:10:14','2013-08-25 08:10:14',1,2),(41,136500,'2013-09-02 05:38:51','2013-09-02 09:38:51',1,2),(42,100000,'2013-09-02 03:48:02','2013-09-02 07:48:02',1,2),(43,100000,'2013-09-02 03:43:47','2013-09-02 07:43:47',1,2),(44,136500,'2013-09-02 03:56:01','2013-09-02 07:56:01',1,2),(45,136500,'2013-09-02 03:59:09','2013-09-02 07:59:09',1,2),(46,236500,'2013-09-02 04:24:58','2013-09-02 08:24:58',1,2),(47,212000,'2013-09-02 04:42:45','0000-00-00 00:00:00',1,0),(48,220000,'2013-09-02 04:45:42','2013-09-02 08:45:42',1,2),(49,352500,'2013-09-02 05:47:12','2013-09-02 09:47:12',1,2),(50,136500,'2013-09-02 05:44:33','0000-00-00 00:00:00',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_detalle`
--

LOCK TABLES `pedidos_detalle` WRITE;
/*!40000 ALTER TABLE `pedidos_detalle` DISABLE KEYS */;
INSERT INTO `pedidos_detalle` VALUES (1,NULL,'Mixta',21),(2,NULL,'adasd',30),(3,8,'Mixta',21),(4,8,'adasd',30),(5,9,'MixtaEnsaladas',21),(6,9,'adasdEnsaladas',30),(7,10,'MixtaEnsaladas',21),(8,10,'adasdEnsaladas',30),(9,11,'Ensaladas Mixta',21),(10,11,'Ensaladas adasd',30),(11,12,'Ensaladas Mixta',21),(12,12,'Ensaladas adasd',30),(13,12,'Bebibdas Cerveza',29),(14,13,'Bebibdas Whiskey',24),(15,13,'Pizza Calabresa',17),(16,13,'Pizza Pizza kiquetal',34),(17,14,'Bebibdas Cerveza',29),(18,15,'Bebibdas Cerveza',29),(19,15,'Bebibdas Whiskey',24),(20,16,'Bebibdas Cerveza',29),(21,17,'Bebibdas Cerveza',29),(22,17,'Bebibdas Cerveza',29),(23,18,'Bebibdas Cerveza',29),(24,19,'Bebibdas Cerveza',29),(25,19,'Bebibdas Whiskey',24),(26,20,'Bebibdas Cerveza',29),(27,20,'Bebibdas Whiskey',24),(28,20,'Pizza Napolitana',16),(29,21,'Bebibdas Cerveza',29),(30,21,'Picadas Mandioca Frita',20),(31,22,'Bebibdas Cerveza',29),(32,22,'Bebibdas Whiskey',24),(33,23,'Bebibdas Cerveza',29),(34,24,'Bebibdas Cerveza',29),(35,25,'Bebibdas Cerveza',29),(36,26,'Bebibdas Cerveza',29),(37,27,'Bebibdas Cerveza',29),(38,28,'Bebibdas Cerveza',29),(39,29,'Bebibdas Cerveza',29),(40,30,'Bebibdas Cerveza',29),(41,31,'Bebibdas Cerveza',29),(42,31,'Picadas Mandioca Frita',20),(43,32,'Bebidas Cerveza',29),(44,32,'Bebidas Cerveza',29),(45,32,'Bebidas Cerveza',29),(46,33,'Bebidas Whiskey',24),(47,34,'Bebidas Cerveza',29),(48,35,'Bebidas Cerveza',29),(49,35,'Bebidas Whiskey',24),(50,36,'Bebidas Cerveza',29),(51,36,'Picadas Mandioca Frita',20),(52,37,'Bebidas Cerveza',29),(53,37,'Picadas Mandioca Frita',20),(54,38,'Bebidas Cerveza',29),(55,38,'Picadas Mandioca Frita',20),(56,39,'Bebidas Cerveza',29),(57,40,'Bebidas Cerveza',29),(58,40,'Picadas Mandioca Frita',20),(59,41,'Bebidas   Cerveza',29),(60,41,'Bebidas   Whiskey  Legal',24),(61,42,'Bebidas   Cerveza',29),(62,43,'Bebidas   Cerveza',29),(63,44,'Bebidas   Cerveza',29),(64,44,'Bebidas   Whiskey  Legal',24),(65,45,'Bebidas   Cerveza',29),(66,45,'Bebidas   Whiskey  Legal',24),(67,46,'Bebidas   Cerveza',29),(68,46,'Bebidas   Whiskey  Legal',24),(69,46,'Bebidas   Cerveza',29),(70,47,'Bebidas   Cerveza',29),(71,47,'Bebidas   Cerveza',29),(72,47,'Ensaladas    Mixta s',21),(73,48,'Bebidas   Cerveza',29),(74,48,'Bebidas   Cerveza',29),(75,48,'Picadas Mandioca Frita',20),(76,49,'Bebidas   Whiskey  Legal',24),(77,49,'Pizza  Napolitana ',16),(78,49,'Pizza  Pizza kiquetal',34),(79,50,'Bebidas   Cerveza',29),(80,50,'Bebidas   Whiskey  Legal',24);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (4,'Pizza ',0),(9,'Picadas',0),(10,'Ensaladas   ',0),(11,'Postres       ',0),(12,'Bebidas  ',0),(13,'Comidas tipicas2',0),(16,'Milanesas ',0),(17,'Pastas',0),(19,'Meriendas    LOCAS   ',1),(20,'Novedades MALAS',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_images`
--

LOCK TABLES `producto_images` WRITE;
/*!40000 ALTER TABLE `producto_images` DISABLE KEYS */;
INSERT INTO `producto_images` VALUES (16,'/uploads/producto/producto_16.jpeg',1),(17,'/uploads/producto/producto_17.jpeg',2),(19,'/uploads/producto/producto_19.jpeg',4),(11,'/uploads/producto/producto_11.jpeg',5),(12,'/uploads/producto/producto_12.jpeg',6),(4,'/uploads/producto/producto_4.jpeg',7),(10,'/uploads/producto/producto_10.jpeg',8),(20,'/uploads/producto/producto_20.jpeg',9);
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_producto`
--

LOCK TABLES `sub_producto` WRITE;
/*!40000 ALTER TABLE `sub_producto` DISABLE KEYS */;
INSERT INTO `sub_producto` VALUES (16,'Napolitana ',4,16000.00,'2013-08-28 04:54:31',1),(17,'Calabresa ',4,2500.00,'2013-08-28 04:51:22',1),(18,'Margarita',4,35000.00,'2013-08-28 04:46:24',1),(19,'Catupiry ',4,30000.00,'2013-08-28 05:17:17',1),(20,'Mandioca Frita',9,20000.00,'2013-08-28 05:16:50',1),(21,'Mixta s',10,12000.00,'2013-08-29 01:42:19',0),(22,'Las piedras [ultra]   ',10,425000.00,'2013-09-02 00:58:00',0),(23,'Cerveza',12,2000.00,'2013-08-05 00:57:59',0),(24,'Whiskey  Legal',12,36500.00,'2013-08-28 06:19:19',0),(25,'Tiramisu M   ',11,25000.00,'2013-09-01 21:39:05',0),(26,'Brownie',11,20000.00,'2013-08-05 00:57:59',0),(27,'Rusa',10,120000.00,'2013-08-08 01:04:12',0),(28,'ALEMANA    ',10,265000.00,'2013-08-28 02:54:59',0),(29,'Cerveza',12,100000.00,'2013-08-08 02:32:06',0),(30,'adasd',10,150000.00,'2013-08-08 03:52:53',0),(31,'Cannibal',9,200000.00,'2013-08-28 04:40:21',1),(32,'alemana',10,2000.00,'2013-08-08 04:22:34',0),(33,'romana',4,2000.00,'2013-08-08 04:22:34',0),(34,'Pizza kiquetal',4,300000.00,'2013-08-08 04:26:54',0),(35,'MILANESA',10,250000.00,'2013-08-20 16:47:56',0),(36,'Napolitana',4,23000.00,'2013-08-28 05:18:32',0),(37,'pie',11,12000.00,'2013-08-28 06:11:39',0),(38,'Brownie',11,14000.00,'2013-08-28 06:13:36',0),(39,'torta',11,12000.00,'2013-08-28 06:16:12',0);
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
INSERT INTO `sub_producto_ingredientes` VALUES (19,86),(19,87),(19,118),(22,122),(25,120),(28,89),(28,116),(28,117),(30,88),(30,89),(31,113),(32,92),(33,87),(33,93),(35,91),(36,87),(36,92),(36,93);
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

-- Dump completed on 2013-09-02  2:04:08
