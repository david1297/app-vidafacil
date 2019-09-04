
 SET NAMES utf8 ;

DROP TABLE IF EXISTS `USUARIOS`;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `USUARIOS` (
  `Nit` varchar(30) NOT NULL,
  `Tipo_Persona` varchar(20) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Apellido` varchar(80) DEFAULT NULL,
  `Nombre` varchar(80) DEFAULT NULL,
  `Razon_Social` varchar(200) DEFAULT NULL,
  `Tel_C` varchar(20) DEFAULT NULL,
  `Direccion` varchar(120) DEFAULT NULL,
  `Correo` varchar(80) DEFAULT NULL,
  `Cel_C` varchar(20) DEFAULT NULL,
  `Correo_C` varchar(80) DEFAULT NULL,
  `Rep_Legal` varchar(200) DEFAULT NULL,
  `CC` varchar(30) DEFAULT NULL,
  `Nombre_R1` varchar(200) DEFAULT NULL,
  `Tel_R1` varchar(200) DEFAULT NULL,
  `Nombre_R2` varchar(200) DEFAULT NULL,
  `Tel_R2` varchar(200) DEFAULT NULL,
  `Rol` int(11) DEFAULT NULL,
  `Clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',
  `Porcentaje` float NOT NULL DEFAULT '0',
  `Portafolio` float DEFAULT '0',
  `Estado` varchar(20) NOT NULL,
  `Banco_1` varchar(80) NOT NULL,
  `Tipo_Banco_1` varchar(80) NOT NULL,
  `Numero_Cuenta_1` varchar(30) NOT NULL,
  `Banco_2` varchar(80) NOT NULL,
  `Tipo_Banco_2` varchar(80) NOT NULL,
  `Numero_Cuenta_2` varchar(30) NOT NULL,
  `Titular_1` varchar(200) NOT NULL,
  `Titular_2` varchar(200) NOT NULL,
  PRIMARY KEY (`Nit`),
  KEY `Rol` (`Rol`),
  KEY `Banco_1` (`Banco_1`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `ROLES` (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `USUARIOS` WRITE;

INSERT INTO `USUARIOS` VALUES ('1112492933','Natural','Distribuidor','Andrade Valencia ','Juan David','Juan David Andrade Valencia ','33','1','agahdj@gmail.com','1','fandacion@gmail.com','ANTHONY MONTERO RUIZ','321654','juan david andrade','0000000','juan david andrade','300',1,'$2y$10$a9TM97e.oAPp0YBSj8OCi.gKSgQ.rCSsJFD5rBOidu9OnUcIWq5LG',0,70000,'Activo','BANCOLOMBIA','Ahorros','123','BANCO FALABELLA','Ahorros','123','yo','obvio');

UNLOCK TABLES;
