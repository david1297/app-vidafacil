 SET NAMES utf8 ;
DROP TABLE IF EXISTS `FORMAS_PAGO`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `FORMAS_PAGO` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `Tarjeta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
LOCK TABLES `FORMAS_PAGO` WRITE;
INSERT INTO `FORMAS_PAGO` VALUES (2,'Cheque',NULL),(3,'Contra-Entrega',NULL),(4,'Datafono',NULL),(5,'Efectivo',NULL),(8,'Tarjeta Credito',NULL),(9,'Tarjeta Debito',NULL),(16,'otro',NULL);
UNLOCK TABLES;
