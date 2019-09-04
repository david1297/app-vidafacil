 SET NAMES utf8 ;

DROP TABLE IF EXISTS `TRANSACCIONESD`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `TRANSACCIONESD` (
  `Numero` int(11) NOT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Venta` int(11) NOT NULL DEFAULT '0',
  `Valor` float DEFAULT NULL,
  `Tipo` varchar(1) NOT NULL,
  `NDocumento` int(11) NOT NULL,
  PRIMARY KEY (`Numero`,`NDocumento`,`Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
