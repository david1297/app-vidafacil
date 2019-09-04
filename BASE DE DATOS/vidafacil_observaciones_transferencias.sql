 SET NAMES utf8 ;
DROP TABLE IF EXISTS `OBSERVACIONES_TRANSFERENCIAS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `OBSERVACIONES_TRANSFERENCIAS` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Transferencia` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(1000) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Transferencia` (`Transferencia`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `observaciones_Transferencias_ibfk_1` FOREIGN KEY (`Transferencia`) REFERENCES `TRANSACCIONESE` (`Numero`),
  CONSTRAINT `observaciones_Transferencias_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`Nit`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

