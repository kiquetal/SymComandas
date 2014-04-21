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
  `producto_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(80) DEFAULT NULL,
  `ruc` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
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
  `state` char(1) DEFAULT 'F',
  `fec_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredientes`
--

LOCK TABLES `ingredientes` WRITE;
/*!40000 ALTER TABLE `ingredientes` DISABLE KEYS */;
INSERT INTO `ingredientes` VALUES (86,'Pepperoni','4','T','2013-08-14 21:38:14'),(87,'Aceitunas','4','F','2013-08-14 21:38:33'),(88,'papas','10','F','2013-08-15 23:10:55'),(89,'cebolla','9','F','2013-08-17 01:40:53'),(90,'huevo frito','9','F','2013-08-14 21:45:30'),(91,'jamon','9,10','F','2013-08-14 22:34:53'),(92,'yerbas','10,4,9','F','2013-08-14 22:35:15'),(93,'palmito','4','F','2013-08-14 21:47:09');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
INSERT INTO `notificacion` VALUES (9,'2013-08-15 23:20:32','Pedido nro:31 fue cancelado',31,0),(10,'2013-08-16 03:59:33','Pedido nro:12 fue cancelado',12,0),(11,'2013-08-16 04:19:42','Pedido nro:20 fue cancelado',20,0),(12,'2013-08-16 04:22:28','Pedido nro:19 fue cancelado',19,0),(13,'2013-08-16 04:32:11','Pedido nro:18 fue cancelado',18,0),(14,'2013-08-16 04:37:22','Pedido nro:10 fue cancelado',10,0),(15,'2013-08-16 04:37:44','Pedido nro:17 fue cancelado',17,0),(16,'2013-08-16 04:38:33','Pedido nro:16 fue cancelado',16,0),(17,'2013-08-16 04:38:50','Pedido nro:11 fue cancelado',11,0),(18,'2013-08-16 06:10:58','Pedido nro:13 fue cancelado',13,0),(19,'2013-08-16 06:50:04','Pedido nro:2 fue cancelado',2,0),(20,'2013-08-19 13:10:47','Pedido nro:32 fue cancelado',32,0),(21,'2013-08-19 13:19:00','Pedido nro:33 fue cancelado',33,0),(22,'2013-08-20 16:31:49','Pedido nro:36 fue cancelado',36,0),(23,'2013-08-20 16:34:23','Pedido nro:37 fue cancelado',37,0),(24,'2013-08-20 16:42:49','Pedido nro:38 fue cancelado',38,0),(25,'2013-08-20 16:47:12','Pedido nro:40 fue cancelado',40,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,40000,'2013-08-14 14:57:24','2013-08-14 18:57:24',1,0),(2,13666,'2013-08-16 06:50:04','2013-08-16 10:50:04',1,1),(3,2333,'2013-08-14 04:46:29','0000-00-00 00:00:00',1,0),(5,NULL,'2013-08-14 04:46:39','0000-00-00 00:00:00',1,0),(6,NULL,'2013-08-14 14:51:58','0000-00-00 00:00:00',1,0),(7,NULL,'2013-08-14 14:57:00','2013-08-14 18:57:00',1,0),(8,NULL,'2013-08-14 14:57:14','2013-08-14 18:57:14',1,0),(9,NULL,'2013-08-14 14:54:20','0000-00-00 00:00:00',1,0),(10,162000,'2013-08-16 04:37:22','2013-08-16 08:37:22',1,1),(11,162000,'2013-08-16 04:38:50','2013-08-16 08:38:50',1,1),(12,262000,'2013-08-16 03:59:33','2013-08-16 07:59:32',1,1),(13,337000,'2013-08-16 06:10:58','2013-08-16 10:10:58',1,1),(14,100000,'2013-08-15 04:44:53','2013-08-15 08:44:53',1,1),(15,135000,'2013-08-15 04:44:53','2013-08-15 08:44:53',1,1),(16,100000,'2013-08-16 04:38:33','2013-08-16 08:38:33',1,1),(17,200000,'2013-08-16 04:37:44','2013-08-16 08:37:44',1,1),(18,100000,'2013-08-16 04:32:11','2013-08-16 08:32:11',1,1),(19,135000,'2013-08-16 04:22:28','2013-08-16 08:22:28',1,1),(20,150000,'2013-08-16 04:19:42','2013-08-16 08:19:42',1,1),(21,120000,'2013-08-15 23:20:01','2013-08-16 03:20:01',1,1),(22,135000,'2013-08-15 23:19:50','2013-08-16 03:19:50',1,1),(23,100000,'2013-08-15 04:56:46','2013-08-15 08:56:46',1,1),(24,100000,'2013-08-15 04:56:54','2013-08-15 08:56:54',1,1),(25,100000,'2013-08-15 23:19:29','2013-08-16 03:19:29',1,1),(26,100000,'2013-08-15 23:19:02','2013-08-16 03:19:02',1,1),(27,100000,'2013-08-15 23:17:37','2013-08-16 03:17:37',1,1),(28,100000,'2013-08-15 23:18:16','2013-08-16 03:18:16',1,1),(29,100000,'2013-08-15 23:18:05','2013-08-16 03:18:05',1,1),(30,100000,'2013-08-15 23:20:27','2013-08-16 03:20:27',1,1),(31,120000,'2013-08-15 23:20:32','2013-08-16 03:20:32',1,1),(32,300000,'2013-08-19 13:10:47','2013-08-19 17:10:47',1,1),(33,35000,'2013-08-19 13:19:00','2013-08-19 17:19:00',1,1),(34,100000,'2013-08-20 13:37:35','0000-00-00 00:00:00',1,0),(35,135000,'2013-08-20 14:05:11','0000-00-00 00:00:00',1,0),(36,120000,'2013-08-20 16:31:48','2013-08-20 20:31:48',1,1),(37,120000,'2013-08-20 16:34:23','2013-08-20 20:34:23',1,1),(38,120000,'2013-08-20 16:42:49','2013-08-20 20:42:49',1,1),(39,100000,'2013-08-20 16:44:27','0000-00-00 00:00:00',1,0),(40,120000,'2013-08-20 16:47:12','2013-08-20 20:47:12',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_detalle`
--

LOCK TABLES `pedidos_detalle` WRITE;
/*!40000 ALTER TABLE `pedidos_detalle` DISABLE KEYS */;
INSERT INTO `pedidos_detalle` VALUES (1,NULL,'Mixta',21),(2,NULL,'adasd',30),(3,8,'Mixta',21),(4,8,'adasd',30),(5,9,'MixtaEnsaladas',21),(6,9,'adasdEnsaladas',30),(7,10,'MixtaEnsaladas',21),(8,10,'adasdEnsaladas',30),(9,11,'Ensaladas Mixta',21),(10,11,'Ensaladas adasd',30),(11,12,'Ensaladas Mixta',21),(12,12,'Ensaladas adasd',30),(13,12,'Bebibdas Cerveza',29),(14,13,'Bebibdas Whiskey',24),(15,13,'Pizza Calabresa',17),(16,13,'Pizza Pizza kiquetal',34),(17,14,'Bebibdas Cerveza',29),(18,15,'Bebibdas Cerveza',29),(19,15,'Bebibdas Whiskey',24),(20,16,'Bebibdas Cerveza',29),(21,17,'Bebibdas Cerveza',29),(22,17,'Bebibdas Cerveza',29),(23,18,'Bebibdas Cerveza',29),(24,19,'Bebibdas Cerveza',29),(25,19,'Bebibdas Whiskey',24),(26,20,'Bebibdas Cerveza',29),(27,20,'Bebibdas Whiskey',24),(28,20,'Pizza Napolitana',16),(29,21,'Bebibdas Cerveza',29),(30,21,'Picadas Mandioca Frita',20),(31,22,'Bebibdas Cerveza',29),(32,22,'Bebibdas Whiskey',24),(33,23,'Bebibdas Cerveza',29),(34,24,'Bebibdas Cerveza',29),(35,25,'Bebibdas Cerveza',29),(36,26,'Bebibdas Cerveza',29),(37,27,'Bebibdas Cerveza',29),(38,28,'Bebibdas Cerveza',29),(39,29,'Bebibdas Cerveza',29),(40,30,'Bebibdas Cerveza',29),(41,31,'Bebibdas Cerveza',29),(42,31,'Picadas Mandioca Frita',20),(43,32,'Bebidas Cerveza',29),(44,32,'Bebidas Cerveza',29),(45,32,'Bebidas Cerveza',29),(46,33,'Bebidas Whiskey',24),(47,34,'Bebidas Cerveza',29),(48,35,'Bebidas Cerveza',29),(49,35,'Bebidas Whiskey',24),(50,36,'Bebidas Cerveza',29),(51,36,'Picadas Mandioca Frita',20),(52,37,'Bebidas Cerveza',29),(53,37,'Picadas Mandioca Frita',20),(54,38,'Bebidas Cerveza',29),(55,38,'Picadas Mandioca Frita',20),(56,39,'Bebidas Cerveza',29),(57,40,'Bebidas Cerveza',29),(58,40,'Picadas Mandioca Frita',20);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (4,'Pizza',0),(9,'Picadas',0),(10,'Ensaladas',0),(11,'Postres',0),(12,'Bebidas',0),(13,'Comidas tipicas2',0),(14,'na',0),(15,'na',0);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_images`
--

LOCK TABLES `producto_images` WRITE;
/*!40000 ALTER TABLE `producto_images` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_producto`
--

LOCK TABLES `sub_producto` WRITE;
/*!40000 ALTER TABLE `sub_producto` DISABLE KEYS */;
INSERT INTO `sub_producto` VALUES (16,'Napolitana',4,15000.00,'2013-08-05 00:57:59',0),(17,'Calabresa',4,2000.00,'2013-08-05 00:57:59',0),(18,'Margarita',4,35000.00,'2013-08-05 00:57:59',0),(19,'Catupiry',4,30000.00,'2013-08-05 00:57:59',0),(20,'Mandioca Frita',9,20000.00,'2013-08-05 00:57:59',0),(21,'Mixta',10,12000.00,'2013-08-05 00:57:59',0),(22,'Las piedras',10,20000.00,'2013-08-05 00:57:59',0),(23,'Cerveza',12,2000.00,'2013-08-05 00:57:59',0),(24,'Whiskey',12,35000.00,'2013-08-05 00:57:59',0),(25,'Tiramisu',11,20000.00,'2013-08-05 00:57:59',0),(26,'Brownie',11,20000.00,'2013-08-05 00:57:59',0),(27,'Rusa',10,120000.00,'2013-08-08 01:04:12',0),(28,'alemana',10,159999.00,'2013-08-08 02:23:05',0),(29,'Cerveza',12,100000.00,'2013-08-08 02:32:06',0),(30,'adasd',10,150000.00,'2013-08-08 03:52:53',0),(31,'Cannibal',9,200000.00,'2013-08-08 04:11:55',0),(32,'alemana',10,2000.00,'2013-08-08 04:22:34',0),(33,'romana',4,2000.00,'2013-08-08 04:22:34',0),(34,'Pizza kiquetal',4,300000.00,'2013-08-08 04:26:54',0),(35,'MILANESA',10,250000.00,'2013-08-20 16:47:56',0);
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
INSERT INTO `sub_producto_ingredientes` VALUES (19,86),(19,87),(27,0),(28,89),(29,0),(30,88),(30,89),(31,0),(32,92),(33,87),(33,93),(34,86),(34,87),(34,93),(35,91);
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

-- Dump completed on 2013-08-21  1:35:16
