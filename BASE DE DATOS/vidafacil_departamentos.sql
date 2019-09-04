 SET NAMES utf8 ;
DROP TABLE IF EXISTS `DEPARTAMENTOS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `DEPARTAMENTOS` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

LOCK TABLES `DEPARTAMENTOS` WRITE;
INSERT INTO `DEPARTAMENTOS` VALUES (1,'Amazonas'),(2,'Antioquia'),(3,'Arauca'),(4,'Atlantico'),(5,'Bolivar'),(6,'Boyaca'),(7,'Caldas'),(8,'Caqueta'),(9,'Casanare'),(10,'Cauca'),(11,'Cesar'),(12,'Choco'),(13,'Cordoba'),(14,'Cundinamarca'),(15,'Guainia'),(16,'Guaviare'),(17,'Huila'),(18,'La Guajira'),(19,'Magdalena'),(20,'Meta'),(21,'Nariño'),(22,'Norte de Santander'),(23,'Putumayo'),(24,'Quindio'),(25,'Risaralda'),(26,'San Andres y Providencia'),(27,'Santander'),(28,'Sucre'),(29,'Tolima'),(30,'Valle del Cauca'),(31,'Vaupes'),(32,'Vichada');
UNLOCK TABLES;
