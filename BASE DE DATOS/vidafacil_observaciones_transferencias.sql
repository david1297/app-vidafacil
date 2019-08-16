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
-- Table structure for table `observaciones_transferencias`
--

DROP TABLE IF EXISTS `observaciones_transferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `observaciones_transferencias` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Transferencia` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(1000) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Transferencia` (`Transferencia`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `observaciones_Transferencias_ibfk_1` FOREIGN KEY (`Transferencia`) REFERENCES `transaccionese` (`Numero`),
  CONSTRAINT `observaciones_Transferencias_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones_transferencias`
--

LOCK TABLES `observaciones_transferencias` WRITE;
/*!40000 ALTER TABLE `observaciones_transferencias` DISABLE KEYS */;
INSERT INTO `observaciones_transferencias` VALUES (17,1,'2019-04-05','ejemplo','1112492933');
/*!40000 ALTER TABLE `observaciones_transferencias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:58:00
