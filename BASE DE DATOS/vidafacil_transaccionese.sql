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
-- Table structure for table `transaccionese`
--

DROP TABLE IF EXISTS `transaccionese`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaccionese` (
  `Numero` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Fecha_Revision` date NOT NULL,
  `Valor_Aprovado` float DEFAULT NULL,
  `Valor_Rechazado` float DEFAULT NULL,
  `Banco` varchar(80) DEFAULT NULL,
  `Tipo_Cuenta` varchar(80) DEFAULT NULL,
  `Numero_Cuenta` varchar(30) DEFAULT NULL,
  `Titular_Cuenta` varchar(200) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `Transacciones_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccionese`
--

LOCK TABLES `transaccionese` WRITE;
/*!40000 ALTER TABLE `transaccionese` DISABLE KEYS */;
INSERT INTO `transaccionese` VALUES (1,'1112492933','2019-03-13','2019-03-15',14000,0,'BANCO FALABELLA','Ahorros','123','obvio','Revisada'),(2,'1112492933','2019-03-13','2019-03-15',9000,0,'BANCO FALABELLA','Ahorros','123','obvio','Revisada'),(3,'1112492933','2019-03-13','2019-03-15',5000,0,'BANCO FALABELLA','Ahorros','123','obvio','Revisada'),(4,'1112492933','2019-04-30','2019-04-30',0,0,NULL,NULL,NULL,NULL,'Pendiente'),(5,'1112492933','2019-04-30','2019-04-30',0,0,NULL,NULL,NULL,NULL,'Pendiente'),(6,'1112492933','2019-04-30','2019-04-30',0,0,NULL,NULL,NULL,NULL,'Pendiente'),(7,'1112492933','2019-04-30','2019-04-30',0,0,NULL,NULL,NULL,NULL,'Pendiente'),(8,'9005104631','2019-04-30','2019-05-02',12000,-6000,'BANCOLOMBIA','Ahorro','123456','yo','Revisada'),(9,'9005104631','2019-05-02','2019-05-02',-1000,0,'BANCOLOMBIA','Ahorros','12464','yo ','Revisada'),(10,'1112492933','2019-05-02','2019-05-02',158500,0,'BANCOLOMBIA','Ahorros ','87129610','Juan david andrade ','Revisada'),(11,'1112492933','2019-05-02','2019-05-02',0,0,NULL,NULL,NULL,NULL,'Pendiente'),(12,'1112492933','2019-05-05','2019-05-05',850000,0,'BANCOLOMBIA','ahorros','12345487','yo ','Revisada'),(13,'1112492933','2019-07-23','2019-07-23',210000,0,'BANCOLOMBIA','ahorros','213','fvf','Revisada');
/*!40000 ALTER TABLE `transaccionese` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:48
