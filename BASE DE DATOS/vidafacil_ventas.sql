
 SET NAMES utf8 ;
DROP TABLE IF EXISTS `VENTAS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `VENTAS` (
  `Numero` int(11) NOT NULL,
  `Afiliado` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Campana` int(11) NOT NULL,
  `Estado_Campana` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Seguimiento` varchar(100) NOT NULL,
  `Transportadora` varchar(100) NOT NULL,
  `NumeroNip` varchar(50) NOT NULL,
  `DataCreditoTipo` varchar(50) NOT NULL,
  `Servicio` varchar(800) NOT NULL,
  `Canal` varchar(20) NOT NULL,
  `NumeroCelular` varchar(20) NOT NULL,
  `OperadorVenta` varchar(80) NOT NULL,
  `OperadorDonante` varchar(80) NOT NULL,
  `NumeroSim` varchar(20) NOT NULL,
  `Valor` double NOT NULL,
  `Porcentaje_Comision` double NOT NULL DEFAULT '0',
  `Liquidada` varchar(20) NOT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Portafolio` float DEFAULT '0',
  `Forma_Pago` int(11) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Afiliado` (`Afiliado`),
  KEY `Usuario` (`Usuario`),
  KEY `Campana` (`Campana`),
  KEY `Forma_Pago` (`Forma_Pago`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Campana`) REFERENCES `CAMPANAS` (`Numero`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`Nit`),
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`Afiliado`) REFERENCES `AFILIADOS` (`Identificacion`),
  CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`Forma_Pago`) REFERENCES `FORMAS_PAGO` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
