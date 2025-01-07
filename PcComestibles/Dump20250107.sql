-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: PcComestibles_BBDD
-- ------------------------------------------------------
-- Server version	9.0.1

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
-- Table structure for table `Ingredientes`
--

DROP TABLE IF EXISTS `Ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Ingredientes` (
  `ingrediente_ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `coste` decimal(2,2) DEFAULT NULL,
  PRIMARY KEY (`ingrediente_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ingredientes`
--

LOCK TABLES `Ingredientes` WRITE;
/*!40000 ALTER TABLE `Ingredientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedido`
--

DROP TABLE IF EXISTS `Pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Pedido` (
  `pedido_ID` int NOT NULL AUTO_INCREMENT,
  `user_ID` int DEFAULT NULL,
  `total` decimal(5,2) DEFAULT NULL,
  `direccion` int DEFAULT NULL,
  PRIMARY KEY (`pedido_ID`),
  KEY `user_ID_idx` (`user_ID`),
  CONSTRAINT `user_ID` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido`
--

LOCK TABLES `Pedido` WRITE;
/*!40000 ALTER TABLE `Pedido` DISABLE KEYS */;
INSERT INTO `Pedido` VALUES (1,29,37.00,20),(2,29,83.00,20),(3,29,60.00,21),(4,29,18.00,20),(5,29,13.00,20),(6,29,19.00,20),(7,29,19.00,21),(8,29,19.00,21),(9,29,19.00,21),(10,29,19.00,21),(11,29,19.00,21),(12,29,19.00,21),(13,29,19.00,21),(14,29,19.00,21),(15,29,16.00,20),(16,29,21.00,20),(17,29,21.00,20),(18,29,21.00,20),(19,29,21.00,20),(20,29,21.00,20),(21,29,21.00,20),(22,29,21.00,20),(23,29,21.00,20),(24,29,21.00,20),(25,29,21.00,20),(26,29,21.00,21),(27,29,21.00,21),(28,29,21.00,21),(29,29,21.00,21),(30,29,21.00,21),(31,29,8.00,20),(32,29,8.00,20),(33,29,8.00,20),(34,29,8.00,20),(35,29,8.00,20),(36,29,8.00,20),(37,29,8.00,20),(38,29,8.00,20),(39,29,8.00,21),(40,29,8.00,21),(41,29,8.00,21),(42,29,8.00,21),(43,29,8.00,21),(44,29,8.00,21),(45,29,8.00,21),(46,29,8.00,21),(47,29,8.00,21),(48,29,8.00,21),(49,29,8.00,21),(50,29,8.00,21),(51,29,8.00,21),(52,29,8.00,21),(53,29,8.00,21),(54,29,8.00,21),(55,29,8.00,21),(56,29,8.00,21),(57,29,8.00,21),(58,29,8.00,21),(59,29,8.00,21),(60,29,8.00,21),(61,29,8.00,21),(62,29,8.00,21),(63,29,8.00,21),(64,29,26.00,21),(65,29,26.00,21),(66,29,26.00,21),(67,29,50.00,20),(68,29,10.00,21),(69,29,8.00,21),(70,29,8.00,21),(71,29,8.00,21),(72,29,8.00,21),(73,29,8.00,21),(74,29,20.00,21),(75,29,20.00,21),(76,29,20.00,21),(77,29,40.00,21),(78,29,40.00,21),(79,29,40.00,21),(80,29,40.00,21),(81,29,40.00,21),(82,29,40.00,21),(83,29,34.00,20);
/*!40000 ALTER TABLE `Pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Productos`
--

DROP TABLE IF EXISTS `Productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Productos` (
  `producto_ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(66) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `old_price` varchar(66) DEFAULT NULL,
  `image` varchar(66) DEFAULT NULL,
  `type` varchar(66) DEFAULT NULL,
  `promo` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`producto_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Productos`
--

LOCK TABLES `Productos` WRITE;
/*!40000 ALTER TABLE `Productos` DISABLE KEYS */;
INSERT INTO `Productos` VALUES (1,'RamenFrito con pollo y verduras',6,'8','f2b1ca714081b6fffb9e9da5b779afba.jpg','normal',1),(2,'Fideos fritos con salteado de verduras tropicales',5,'6','019225b2-b321-7989-b1d1-92a836ed6566.png','vegano',0),(3,'Ensalada de pasta con maiz y atun',7,'9','ensaladaPasta.png','normal',0),(4,'Arroz frito tres delicias de la casa',8,'8,50','arrozTresDelicias.png','normal',0),(5,'Udon con ternera, gambas y salsa japon',10,'13','arrozConTernera.png','normal',0),(6,'Lorem Ipsum es simplemente el texto',5,'6','arrozConCurry.png','normal',0),(7,'Lorem Ipsum es simplemente el texto de relleno de las imprentas',5,'6','PcComestibles-Simple.png','normal',0),(8,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',5,'6','PcComestibles-Simple.png','normal',0),(9,'Prueba de jamon con tomate y pastel de almejas indias',500,'500,01','PcComestibles-Simple.png','normal',0),(10,'Lorem imPruab dos de menu',50000,NULL,'PcComestibles-Simple.png','normal',0),(11,'Porfa que no salga',20,'21','PcComestibles-Simple.png','normal',0),(12,'a',1,'2','a','a',1),(13,'a',1,NULL,'a','a',2),(14,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,NULL,NULL,NULL,NULL,NULL),(16,'a',1,NULL,'a','a',1),(17,'a',1,NULL,'a','a',1),(18,'a',1,'2','b','b',1),(19,'a',1,'2','b','b',1),(21,'Fuet',3,'3.5','fuet.png','normal',1);
/*!40000 ALTER TABLE `Productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Productos_Ingredientes`
--

DROP TABLE IF EXISTS `Productos_Ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Productos_Ingredientes` (
  `cantidad` int DEFAULT NULL,
  `fk_producto_ID` int DEFAULT NULL,
  `fk_ingrediente` int DEFAULT NULL,
  KEY `producto_ID_idx` (`fk_producto_ID`),
  KEY `ingrediente_ID_idx` (`fk_ingrediente`),
  CONSTRAINT `fk_ingrediente_ID` FOREIGN KEY (`fk_ingrediente`) REFERENCES `Ingredientes` (`ingrediente_ID`),
  CONSTRAINT `product_ID` FOREIGN KEY (`fk_producto_ID`) REFERENCES `Productos` (`producto_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Productos_Ingredientes`
--

LOCK TABLES `Productos_Ingredientes` WRITE;
/*!40000 ALTER TABLE `Productos_Ingredientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Productos_Ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recibos`
--

DROP TABLE IF EXISTS `Recibos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Recibos` (
  `fk_pedido_ID` int DEFAULT NULL,
  `fk_producto_ID` int DEFAULT NULL,
  `fk_ingrediente_ID` int DEFAULT NULL,
  KEY `producto_ID_idx` (`fk_producto_ID`),
  KEY `ingrediente_ID_idx` (`fk_ingrediente_ID`),
  KEY `pedido_ID_idx` (`fk_pedido_ID`),
  CONSTRAINT `ingrediente_ID` FOREIGN KEY (`fk_ingrediente_ID`) REFERENCES `Ingredientes` (`ingrediente_ID`),
  CONSTRAINT `pedido_ID` FOREIGN KEY (`fk_pedido_ID`) REFERENCES `Pedido` (`pedido_ID`),
  CONSTRAINT `producto_ID` FOREIGN KEY (`fk_producto_ID`) REFERENCES `Productos` (`producto_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recibos`
--

LOCK TABLES `Recibos` WRITE;
/*!40000 ALTER TABLE `Recibos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Recibos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `user_ID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rango` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (29,'Admin','$2y$10$aSlCDND2Z3vTMFgfOoQB4Oi5x.QvjePsytGd4SJkTswe6ol3pbZiy','1'),(30,'Raul','$2y$10$YCG.ZlO2ezTpeYTttrbXQeONbA9tRiq8O1CPYFCxys0XXPgmWektW','0'),(31,'Paco','$2y$10$UU380m97VR0hvQ8fCOy6TOqN9mi9b66G32K/wPZ0w0qv590hzo5He','0'),(32,'asd','$2y$10$QGVtk7lhgeieOvjmyQhuUufsNSoEHXatrkMXzGTpdE8aqHElUKtSS','0'),(34,'carrito','$2y$10$L/jJgSJkB9grbsDTo4Z7yOEZDHlKrje3RocNswXzUw0LCcaFL0CnS','0');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `user_ID` int NOT NULL,
  `productos` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (32,2,4),(32,4,4);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `user_ID` int DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estado_provincia` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `direccion_ID` int NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `direccion_ID` (`direccion_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (29,'Prolongación Galguera 7 2 2','Barcelona','Barcelona','08980','España','Marcos','fuentes',20),(29,'Prolongación Galguera 7 2 2','Barcelona','Barcelona','08980','España','Jose','fuentes',21),(32,'Prolongación asd 7 2 2','Barcelona','Barcelona','08980','España','asd','asd',22);
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discounts` (
  `discount_ID` int NOT NULL AUTO_INCREMENT,
  `discount_code` varchar(50) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `discount_type` int DEFAULT NULL,
  PRIMARY KEY (`discount_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (1,'BYTE_DELICIOSO',25,0),(2,'MEGA_BOCADO',35,1),(3,'GIGA_HAMBURGUESA',20,1),(4,'KILO_KEBAB',100,0),(5,'RAMEN_TECH',65,1),(6,'PIXEL_PIZZA',15,0),(7,'WIFI_WOK',25,1),(8,'CHIP_CHOCOLATE',10,0),(9,'CPU_CAFE',5,1),(10,'SSD_SANDWICH',35,0);
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_pedido`
--

DROP TABLE IF EXISTS `productos_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos_pedido` (
  `user_id` int DEFAULT NULL,
  `producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_pedido`
--

LOCK TABLES `productos_pedido` WRITE;
/*!40000 ALTER TABLE `productos_pedido` DISABLE KEYS */;
INSERT INTO `productos_pedido` VALUES (29,3,2),(29,6,2),(29,5,1);
/*!40000 ALTER TABLE `productos_pedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-07 23:47:24
