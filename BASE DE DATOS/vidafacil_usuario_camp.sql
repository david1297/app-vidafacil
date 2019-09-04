 SET NAMES utf8 ;
DROP TABLE IF EXISTS `USUARIO_CAMP`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `USUARIO_CAMP` (
  `Campana` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`Campana`,`Usuario`),
  KEY `Campana` (`Campana`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `usuario_camp_ibfk_1` FOREIGN KEY (`Campana`) REFERENCES `CAMPANAS` (`Numero`),
  CONSTRAINT `usuario_camp_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`Nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;