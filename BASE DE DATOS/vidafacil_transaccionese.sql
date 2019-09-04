-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 142.4.202.90    Database: vidafacil
-- ------------------------------------------------------
-- Server version	5.7.18-log


 SET NAMES utf8 ;

DROP TABLE IF EXISTS `TRANSACCIONESE`;

 SET character_set_client = utf8mb4 ;
CREATE TABLE `TRANSACCIONESE` (
  `Numero` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Fecha_Revision` date NOT NULL,
  `Valor_Aprovado` float DEFAULT NULL,
  `Valor_Rechazado` float DEFAULT NULL,
  `Banco` varchar(80) DEFAULT NULL,
  `Tipo_Cuenta` varchar(80) DEFAULT NULL,
  `Numero_Cuenta` varchar(30) DEFAULT NULL,
  `Titular_Cuenta` varchar(200) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `Transacciones_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `USUARIOS` (`Nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
