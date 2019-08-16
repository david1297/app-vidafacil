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
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ventas` (
  `Numero` int(11) NOT NULL,
  `Afiliado` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Campana` int(11) NOT NULL,
  `Estado_Campana` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Seguimiento` varchar(100) NOT NULL,
  `Transportadora` varchar(100) NOT NULL,
  `NumeroNip` varchar(50) NOT NULL,
  `DataCreditoTipo` varchar(50) NOT NULL,
  `Servicio` varchar(800) NOT NULL,
  `Canal` varchar(20) NOT NULL,
  `NumeroCelular` varchar(20) NOT NULL,
  `OperadorVenta` varchar(80) NOT NULL,
  `OperadorDonante` varchar(80) NOT NULL,
  `NumeroSim` varchar(20) NOT NULL,
  `Valor` double NOT NULL,
  `Porcentaje_Comision` double NOT NULL DEFAULT '0',
  `Liquidada` varchar(20) NOT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Portafolio` float DEFAULT '0',
  `Forma_Pago` int(11) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Afiliado` (`Afiliado`),
  KEY `Usuario` (`Usuario`),
  KEY `Campana` (`Campana`),
  KEY `Forma_Pago` (`Forma_Pago`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Campana`) REFERENCES `campanas` (`Numero`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`),
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`Afiliado`) REFERENCES `afiliados` (`Identificacion`),
  CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`Forma_Pago`) REFERENCES `formas_pago` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (0,'1112492933','9009605842',1,'Ok','2019-02-23','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',9000000,2.5,'Pendiente','Aprobada',0,8),(1,'1112492933','1112492933',3,'Rechazado','2019-02-19','Devuelto Al Remitente.','Aeropostal.','12','12','212','Movil','3000000|','Claro','Avantel','0Q221',1000000,0,'Pendiente','Sin Revisar',0,8),(2,'1112492933','1112492933',3,'En Proceso','2019-02-11','Devuelto Al Remitente.','Aeropostal.','1','2','1','Movil','1','Claro','Avantel','1',2500000,3,'Pendiente','Aprobada',0,8),(3,'1112492933','1112492933',2,'Pendientes','2019-02-06','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',4500000,0,'Pendiente','Negada',0,8),(4,'1112492933','1112492933',2,'Ok','2019-02-06','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',1200000,0,'Pendiente','Sin Revisar',0,8),(5,'1112492933','1112492933',1,'Pendientes','2019-02-11','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',800000,0,'Pendiente','Sin Revisar',0,8),(6,'1112492933','1112492933',2,'Pendientes','2019-02-06','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',3200000,0,'Pendiente','Sin Revisar',0,8),(7,'1112492933','1112492933',1,'Pendientes','2019-02-06','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',200000,0,'False','Sin Revisar',0,8),(8,'1112492933','1112492933',1,'Pendientes','2019-02-06','Devuelto Al Remitente.','Bici Mail.','','','','','','','','',900000,0,'False','Sin Revisar',0,8),(9,'1074576628','1112492933',1,'Pendientes','2019-02-20','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',5000000,0,'False','Sin Revisar',0,8),(10,'1074576628','1112492933',1,'Pendientes','2019-02-20','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',360000,2.5,'True','Aprobada',0,8),(11,'1112492933','1112492933',1,'Pendientes','2019-02-21','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',10000000,2.5,'False','Sin Revisar',0,8),(12,'1112492933','1112492933',2,'Pendientes','2019-02-21','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',12500000,0,'False','Sin Revisar',0,8),(13,'1074576628','1112492933',2,'Aprobado','2019-02-22','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',500000,2.5,'False','Sin Revisar',0,8),(14,'1112492933','1112492933',2,'Pendientes','2019-02-23','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',2300000,2.5,'False','Sin Revisar',0,8),(15,'1112492933','1112492933',2,'Aprobado','2019-03-04','Dirección Errada.','Aeropostal.','','','','','','','','',200000,2.5,'True','Aprobada',0,8),(16,'99293994994','1112492933',2,'Ok','2019-04-25','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',3500000,2.5,'Pendiente','Aprobada',0,8),(17,'99293994994','1112492933',2,'Pendientes','2019-04-25','En Envió.','Aeropostal.','','','','','','','','',200000,0,'Pendiente','Aprobada',70000,8),(18,'1074576628','9005104631',1,'Pendientes','2019-04-29','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',90000,10,'Pendiente','Aprobada',0,8),(19,'1074576628','1112492933',2,'Ok','2019-05-02','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',600000,0,'Pendiente','Aprobada',70000,8),(20,'1112492933','1112492933',2,'Ok','2019-07-22','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',150000,0,'Pendiente','Aprobada',70000,5),(21,'1112492933','1112492933',2,'Pendientes','2019-07-23','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',9000000,0,'Pendiente','Aprobada',70000,5),(22,'1112492933','1112492933',2,'Ok','2019-07-23','Devuelto Al Remitente.','Aeropostal.','','','','','','','','',450000,0,'Pendiente','Aprobada',70000,5);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:58:08
