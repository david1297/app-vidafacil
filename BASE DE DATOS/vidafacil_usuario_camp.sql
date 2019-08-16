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
-- Table structure for table `usuario_camp`
--

DROP TABLE IF EXISTS `usuario_camp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario_camp` (
  `Campana` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`Campana`,`Usuario`),
  KEY `Campana` (`Campana`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `usuario_camp_ibfk_1` FOREIGN KEY (`Campana`) REFERENCES `campanas` (`Numero`),
  CONSTRAINT `usuario_camp_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_camp`
--

LOCK TABLES `usuario_camp` WRITE;
/*!40000 ALTER TABLE `usuario_camp` DISABLE KEYS */;
INSERT INTO `usuario_camp` VALUES (1,'1112492933'),(1,'8000099734'),(1,'9005104631'),(1,'9008211529'),(1,'9009605842'),(2,'1112492933'),(2,'8000099734'),(2,'9008211529'),(3,'1112492933'),(3,'9008211529'),(3,'9009605842'),(4,'1112492933'),(4,'8000099734'),(4,'9008211529');
/*!40000 ALTER TABLE `usuario_camp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:41
