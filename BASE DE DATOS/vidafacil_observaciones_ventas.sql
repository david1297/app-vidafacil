 SET NAMES utf8 ;
DROP TABLE IF EXISTS `OBSERVACIONES_VENTAS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `OBSERVACIONES_VENTAS` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Venta` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(1000) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Venta` (`Venta`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `observaciones_ventas_ibfk_1` FOREIGN KEY (`Venta`) REFERENCES `VENTAS` (`Numero`),
  CONSTRAINT `observaciones_ventas_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`Nit`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

