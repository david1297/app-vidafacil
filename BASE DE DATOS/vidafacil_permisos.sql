 SET NAMES utf8 ;
DROP TABLE IF EXISTS `PERMISOS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `PERMISOS` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Modulo` varchar(50) DEFAULT NULL,
  `Permiso` varchar(100) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Permisos_ibfk_1` (`Usuario`),
  CONSTRAINT `Permisos_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`Nit`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
