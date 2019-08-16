-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 142.4.202.90    Database: vidafacil
-- ------------------------------------------------------
-- Server version	5.7.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ajustes`
--

DROP TABLE IF EXISTS `ajustes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ajustes` (
  `Numero` int(11) NOT NULL,
  `UsuarioC` varchar(30) NOT NULL,
  `UsuarioA` varchar(30) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Valor` float DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  `Observacion` varchar(1024) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `UsuarioC` (`UsuarioC`),
  KEY `UsuarioA` (`UsuarioA`),
  CONSTRAINT `Ajustes_ibfk_1` FOREIGN KEY (`UsuarioC`) REFERENCES `usuarios` (`Nit`),
  CONSTRAINT `Ajustes_ibfk_2` FOREIGN KEY (`UsuarioA`) REFERENCES `usuarios` (`Nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajustes`
--

LOCK TABLES `ajustes` WRITE;
/*!40000 ALTER TABLE `ajustes` DISABLE KEYS */;
INSERT INTO `ajustes` VALUES (1,'1112492933','9005104631','2019-04-25',1000,'Debito','','True'),(2,'1112492933','9005104631','2019-04-25',2000,'Debito','2','True'),(3,'1112492933','9005104631','2019-04-25',1000,'Debito','','True'),(4,'1112492933','1112492933','2019-04-29',1000,'Debito','','True'),(5,'1112492933','1112492933','2019-04-29',900000,'Credito','','True'),(6,'1112492933','1112492933','2019-05-05',50000,'Debito','','True');
/*!40000 ALTER TABLE `ajustes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:44
