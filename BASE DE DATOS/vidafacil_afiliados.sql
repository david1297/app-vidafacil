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
-- Table structure for table `afiliados`
--

DROP TABLE IF EXISTS `afiliados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `afiliados` (
  `Identificacion` varchar(30) NOT NULL,
  `Primer_Nombre` varchar(50) NOT NULL,
  `Segundo_Nombre` varchar(50) NOT NULL,
  `Primer_Apellido` varchar(50) NOT NULL,
  `Segundo_Apellido` varchar(50) NOT NULL,
  `Tipo_Identificacion` varchar(50) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Nacionalidad` varchar(50) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  `Departamento` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Direccion_Adicional` varchar(200) NOT NULL,
  `Estrato` int(11) NOT NULL,
  `Nivel_Educacion` varchar(80) NOT NULL,
  `Ocupacion` varchar(100) NOT NULL,
  `Rango_Ingresos` int(11) NOT NULL,
  `Forma_Pago` int(11) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Direccion_Firma` varchar(200) NOT NULL,
  `Fecha_Firma` date NOT NULL,
  `Horario` time NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Fecha_Expedicion` date NOT NULL,
  PRIMARY KEY (`Identificacion`),
  KEY `Ciudad` (`Ciudad`),
  KEY `Departamento` (`Departamento`),
  KEY `Rango_Ingresos` (`Rango_Ingresos`),
  KEY `Forma_Pago` (`Forma_Pago`),
  CONSTRAINT `afiliados_ibfk_1` FOREIGN KEY (`Ciudad`) REFERENCES `ciudades` (`Codigo`),
  CONSTRAINT `afiliados_ibfk_2` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`Codigo`),
  CONSTRAINT `afiliados_ibfk_3` FOREIGN KEY (`Rango_Ingresos`) REFERENCES `rango_ingresos` (`Codigo`),
  CONSTRAINT `afiliados_ibfk_4` FOREIGN KEY (`Forma_Pago`) REFERENCES `formas_pago` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliados`
--

LOCK TABLES `afiliados` WRITE;
/*!40000 ALTER TABLE `afiliados` DISABLE KEYS */;
INSERT INTO `afiliados` VALUES ('1074576628','jiliam ','carolina ','ibañez','miranda','Cedula','1990-12-01','colombia ',594,14,'cra 57b #  68 - 18 ','calle 68 # 57- 82',2,'Otro','Otro',2,3,'3054232363','comercial@solucionesvidafacil.com','calle 68 # 57- 82','2019-02-20','18:07:00','Activo','0000-00-00'),('1112492933','JUAN','DAVID','ANDRADE','VALENCIA','Cedula','1997-12-17','Nariño',138,2,'CALLE 23 # 49A-16','SA',2,'Universitario','Empleado',2,5,'32231','l@gmail.com','1','2019-01-31','12:00:00','Activo','2015-12-28'),('99293994994','pepito ','perez','perez ','peres ','Cedula','1970-03-04','colombiano',4,1,'cra 20 26 75 ','cra 20 26 75 ',1,'Primaria','Empleado',2,8,'3054232363','comercial@solucionesvidafacil.com','cra 20 26 75 ','2019-03-05','23:28:00','Activo','1996-07-04');
/*!40000 ALTER TABLE `afiliados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:32
