 SET NAMES utf8 ;
DROP TABLE IF EXISTS `RANGO_INGRESOS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `RANGO_INGRESOS` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(2000) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `RANGO_INGRESOS` WRITE;
/*!40000 ALTER TABLE `RANGO_INGRESOS` DISABLE KEYS */;
INSERT INTO `RANGO_INGRESOS` VALUES (1,'$0 - $828.116'),(2,'$828.116 - $1200.000'),(3,'$1200.000 - $2000.000'),(4,'$2000.000 - $3000.000');
UNLOCK TABLES;