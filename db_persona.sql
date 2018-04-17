CREATE DATABASE  IF NOT EXISTS `demo_capacitaciones` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `demo_capacitaciones`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: demo_capacitaciones
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(600) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (3,'José Arturo Sánchez Soto','asanchez.sys@gmail.com','969007452','I'),(4,'Jdffdfdfd','asanchez.sys@gmail.com','969007452','I'),(5,'Manuel Salomon Sanchez Soto','manuelxxx10@hotmail.com','01 3262601','I'),(6,'Luis Alberto Flores Chavez','luis.flores@gmail.com','12345679','I'),(7,'Raul Lozada Paredes','raul@gmail.com','9899999999','I'),(8,'jsjjkdkj','djjd','939884398','I'),(9,'dddw','wwww','23434334','I'),(10,'dfdffdf','ddf','ddddfddff','I'),(11,'Pedro','pedro@gmail.com','9999999999','I'),(12,'Xiomara Beatriz Morales Asalde','xiomy@gmail.com','955853049','I'),(13,'Delina Isabel Sanchez Morales','delinita@gmail.com','22012010','I'),(14,'Juan pablo perez perez','juanperez@gmail.com','123456789','I'),(15,'Jorge Salazar','jorge@aaa.com','1323343','I');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-17 15:14:03
