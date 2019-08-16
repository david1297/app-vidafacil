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
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `permisos` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Modulo` varchar(50) DEFAULT NULL,
  `Permiso` varchar(100) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Permisos_ibfk_1` (`Usuario`),
  CONSTRAINT `Permisos_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Afiliados','Ingreso','true','9009605842','Ingreso al Modulo'),(2,'Afiliados','Crear','false','9009605842','Crear Afiliado'),(3,'Afiliados','Editar','false','9009605842','Editar Afiliado'),(4,'Contabilidad','Ingreso','true','9009605842','Ingreso al Modulo'),(5,'Transacciones','Ingreso','true','9009605842','Ingreso al Modulo'),(6,'Campanas','Ingreso','true','9009605842','Ingreso al Modulo'),(7,'CuentaVirtual','Ingreso','true','9009605842','Ingreso al Modulo'),(8,'Transferencias','Ingreso','true','9009605842','Ingreso al Modulo'),(9,'Transacciones','CambiarEstado','false','9009605842','Cambiar Estados'),(11,'Usuarios','Ingreso','true','9009605842','Ingreso al Modulo'),(12,'Afiliados','Ingreso','false','9008211529','Ingreso al Modulo'),(13,'Afiliados','Crear','false','9008211529','Crear Afiliado'),(14,'Afiliados','Editar','false','9008211529','Editar Afiliado'),(15,'Campanas','Ingreso','false','9008211529','Ingreso al Modulo'),(16,'Contabilidad','Ingreso','false','9008211529','Ingreso al Modulo'),(17,'CuentaVirtual','Ingreso','false','9008211529','Ingreso al Modulo'),(18,'CuentaVirtual','ConsultarTodo','false','9008211529','Consultar cuenta Virtual General'),(19,'Transferencias','Ingreso','false','9008211529','Ingreso al Modulo'),(20,'Usuarios','Ingreso','false','9008211529','Ingreso al Modulo'),(21,'Ventas','Ingreso','false','9008211529','Ingreso al Modulo'),(22,'Ventas','CambiarEstado','false','9008211529','Cambiar Estados'),(23,'Afiliados','Ingreso','false','1074576628','Ingreso al Modulo'),(24,'Afiliados','Crear','false','1074576628','Crear Afiliado'),(25,'Afiliados','Editar','false','1074576628','Editar Afiliado'),(26,'Campanas','Ingreso','false','1074576628','Ingreso al Modulo'),(27,'Contabilidad','Ingreso','false','1074576628','Ingreso al Modulo'),(28,'CuentaVirtual','Ingreso','false','1074576628','Ingreso al Modulo'),(29,'CuentaVirtual','ConsultarTodo','false','1074576628','Consultar cuenta Virtual General'),(30,'Transferencias','Ingreso','false','1074576628','Ingreso al Modulo'),(31,'Usuarios','Ingreso','false','1074576628','Ingreso al Modulo'),(32,'Ventas','Ingreso','false','1074576628','Ingreso al Modulo'),(33,'Ventas','CambiarEstado','false','1074576628','Cambiar Estados'),(34,'Usuarios','Crear','false','9009605842','Crear Usuario'),(35,'Usuarios','Editar','false','9009605842','Editar Usuario'),(36,'Usuarios','CuentaVirtual','false','9009605842','Ingreso Cuenta Virtual '),(37,'Transacciones','Crear','false','9009605842','Crear Transaccion'),(38,'Transacciones','Consultar','false','9009605842','Consultar Transacciones'),(39,'Ajustes','Ingreso','true','9009605842','Ingreso al Modulo'),(40,'Ajustes','Crear','false','9009605842','Crear Ajuste '),(41,'Ajustes','Consultar','false','9009605842','Consultar'),(42,'Campanas','Crear','false','9009605842','Crear Campaña'),(43,'Campanas','Consultar','false','9009605842','Consultar Campañas');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:25
