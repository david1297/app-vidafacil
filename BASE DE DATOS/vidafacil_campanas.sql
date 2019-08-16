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
-- Table structure for table `campanas`
--

DROP TABLE IF EXISTS `campanas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `campanas` (
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Contacto` varchar(200) NOT NULL,
  `Area` varchar(200) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Porcentaje` float NOT NULL,
  `Observaciones` varchar(5000) NOT NULL,
  `Estados` varchar(1000) NOT NULL,
  `Seguimiento` varchar(1000) NOT NULL,
  `Transportadoras` varchar(1000) NOT NULL,
  `Telefonica` varchar(10) NOT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campanas`
--

LOCK TABLES `campanas` WRITE;
/*!40000 ALTER TABLE `campanas` DISABLE KEYS */;
INSERT INTO `campanas` VALUES (1,'SVF','yo','Administrativa','Activa',20,'OBSERVACIONES DE LA CAMPAÑA','Pendientes\r\nOk\r\nAprobado\r\nRechazado','Devuelto Al Remitente.\r\nDirección Errada.\r\nDirección Incompleta.\r\nEn Envió.','Aeropostal.\r\nBici Mail.\r\nCoordinadora.',''),(2,'EMERMEDICA','yo','Administriva','Activa',15,'','Pendientes\r\nOk\r\nAprobado\r\n','Devuelto Al Remitente.\r\nDirección Errada.\r\nDirección Incompleta.\r\nEn Envió.','Aeropostal.\r\nBici Mail.\r\nCoordinadora.',''),(3,'TELEFONIA','obvio yo','todas','Activa',50,'OBSERVACIONES DE LA CAMPAÑA','Pendientes\r\nOk\r\nAprobado\r\nRechazado\r\nEn Proceso\r\nPagado\r\nPor Pagar\r\nPara Descontar','Devuelto Al Remitente.\r\nDirección Errada.\r\nDirección Incompleta.\r\nEn Envió.\r\nEntrega Exitosa.\r\nNo Desea Recibir.\r\nNo Desea Recibir.\r\nZona De Envió.','Aeropostal.\r\nBici Mail.\r\nCoordinadora.\r\nTCC.\r\nInterrapí­disimo.\r\nDHL.\r\nEnví­a.\r\n4/72.\r\nDeprisa.\r\nFedex.\r\nServientrega.','True'),(4,'prueba','sebastian','ventas','Activa',30,'s','as','s','s','True'),(5,'MOVISTAR','Vida Facil','Administrativa','InActiva',10,'Ninguna','Ok','Bien','DHL','True'),(6,'Prueba','o','s','Pendiente',10,'s','s','s','s','');
/*!40000 ALTER TABLE `campanas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:35
