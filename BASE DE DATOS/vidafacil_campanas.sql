 SET NAMES utf8 ;
DROP TABLE IF EXISTS `CAMPANAS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `CAMPANAS` (
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Contacto` varchar(200) NOT NULL,
  `Area` varchar(200) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Porcentaje` float NOT NULL,
  `Observaciones` varchar(5000) NOT NULL,
  `Estados` varchar(1000) NOT NULL,
  `Seguimiento` varchar(1000) NOT NULL,
  `Transportadoras` varchar(1000) NOT NULL,
  `Telefonica` varchar(10) NOT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
