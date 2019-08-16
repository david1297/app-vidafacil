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
-- Table structure for table `transaccionesd`
--

DROP TABLE IF EXISTS `transaccionesd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaccionesd` (
  `Numero` int(11) NOT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Venta` int(11) NOT NULL DEFAULT '0',
  `Valor` float DEFAULT NULL,
  `Tipo` varchar(1) NOT NULL,
  `NDocumento` int(11) NOT NULL,
  PRIMARY KEY (`Numero`,`NDocumento`,`Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccionesd`
--

LOCK TABLES `transaccionesd` WRITE;
/*!40000 ALTER TABLE `transaccionesd` DISABLE KEYS */;
INSERT INTO `transaccionesd` VALUES (1,'Pagada',10,9000,'V',10),(3,'Pagada',15,5000,'V',15),(7,'Pendiente',0,-1000,'A',1),(7,'Pendiente',0,9000,'V',18),(8,'Pagada',0,-2000,'A',2),(8,'Pagada',0,-1000,'A',3),(8,'Pagada',0,9000,'V',18),(9,'Pagada',0,-1000,'A',1),(10,'Pagada',0,-1000,'A',4),(10,'Pagada',0,2000,'A',5),(10,'Pagada',0,87500,'V',16),(10,'Pagada',0,70000,'V',17),(11,'Pendiente',0,70000,'V',19),(12,'Pagada',0,900000,'A',5),(12,'Pagada',0,-50000,'A',6),(13,'Pagada',0,70000,'V',20),(13,'Pagada',0,70000,'V',21),(13,'Pagada',0,70000,'V',22);
/*!40000 ALTER TABLE `transaccionesd` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:51
