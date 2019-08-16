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
-- Table structure for table `observaciones_ventas`
--

DROP TABLE IF EXISTS `observaciones_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `observaciones_ventas` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Venta` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(1000) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Venta` (`Venta`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `observaciones_ventas_ibfk_1` FOREIGN KEY (`Venta`) REFERENCES `ventas` (`Numero`),
  CONSTRAINT `observaciones_ventas_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones_ventas`
--

LOCK TABLES `observaciones_ventas` WRITE;
/*!40000 ALTER TABLE `observaciones_ventas` DISABLE KEYS */;
INSERT INTO `observaciones_ventas` VALUES (1,1,'0000-00-00','','1112492933'),(2,4,'2019-02-06','sasa','1112492933'),(3,4,'2019-02-06','ejemplo otro','1112492933'),(4,0,'2019-02-06','saa','1112492933'),(5,4,'2019-02-06','sasa','1112492933'),(6,4,'2019-02-06','otro ejemplo','1112492933'),(7,6,'2019-02-06','observacion 1','1112492933'),(8,0,'2019-02-06','Nueva Opservacion','1112492933'),(9,7,'2019-02-06','ejemplo comentario','1112492933'),(10,0,'2019-02-06','Observacion Usuario','1112492933'),(11,8,'2019-02-06','dxa','9008211529'),(12,8,'2019-02-06','holi que hace','1112492933'),(13,2,'2019-02-11','ejemplo observacion','1112492933'),(14,0,'2019-02-25','Base General Aprobada','1112492933'),(15,0,'2019-02-23','\r\n','9009605842'),(16,0,'2019-02-23','\r\n','9009605842');
/*!40000 ALTER TABLE `observaciones_ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:19
