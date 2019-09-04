 SET NAMES utf8 ;
DROP TABLE IF EXISTS `CUENTA_VIRTUAL`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `CUENTA_VIRTUAL` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `Porcentaje` double NOT NULL,
  `Comision` double NOT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Debito` float DEFAULT '0',
  `Credito` float DEFAULT '0',
  `Tipo` char(1) DEFAULT NULL,
  `NDocumento` int(11) DEFAULT NULL,
  `Cruce` char(1) DEFAULT NULL,
  `NCruce` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
