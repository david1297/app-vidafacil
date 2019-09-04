
 SET NAMES utf8 ;

DROP TABLE IF EXISTS `ADMINISTRACION`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ADMINISTRACION` (
  `Numero` int(11) NOT NULL,
  `Operador_Venta` varchar(1000) NOT NULL,
  `Operador_Donante` varchar(1000) NOT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
LOCK TABLES `ADMINISTRACION` WRITE;
INSERT INTO `ADMINISTRACION` VALUES (1,'Claro\r\nMovistar\r\nTigo\r\nAvantel','Avantel\r\nEtb\r\nExito\r\nUff\r\nVirgin Mobile\r\nClaro\r\nFlash Mobile\r\nMovistar');
UNLOCK TABLES;
