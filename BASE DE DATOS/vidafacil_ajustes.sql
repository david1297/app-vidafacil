 SET NAMES utf8 ;
DROP TABLE IF EXISTS `AJUSTES`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `AJUSTES` (
  `Numero` int(11) NOT NULL,
  `UsuarioC` varchar(30) NOT NULL,
  `UsuarioA` varchar(30) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Valor` float DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  `Observacion` varchar(1024) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `UsuarioC` (`UsuarioC`),
  KEY `UsuarioA` (`UsuarioA`),
  CONSTRAINT `Ajustes_ibfk_1` FOREIGN KEY (`UsuarioC`) REFERENCES `USUARIOS` (`Nit`),
  CONSTRAINT `Ajustes_ibfk_2` FOREIGN KEY (`UsuarioA`) REFERENCES `USUARIOS` (`Nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
