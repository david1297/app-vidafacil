-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 142.4.202.90    Database: vidafacil
-- ------------------------------------------------------
-- Server version	5.7.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
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
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('1074576628','Natural','Operador','ibañez','carolina','carolina ibañez','3653668','cl 64 i # 70 a - 25','comercial@solucionesvidafacil.com','3003653668','comercial@solucionesvidafacil.com','carolina   ibañez ','1074576628','CAROLINA GOMEZ','9272729','soluciones vida facil','3054232363',2,'$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',15,NULL,'Activo','DAVIVIENDA','Ahorros','444500000000','BANCOLOMBIA','Ahorros','','carolina   ibañez ',''),('1112492933','Natural','Distribuidor','Andrade Valencia ','Juan David','Juan David Andrade Valencia ','33','1','agahdj@gmail.com','1','fandacion@gmail.com','ANTHONY MONTERO RUIZ','321654','juan david andrade','0000000','juan david andrade','300',1,'$2y$10$a9TM97e.oAPp0YBSj8OCi.gKSgQ.rCSsJFD5rBOidu9OnUcIWq5LG',0,70000,'Activo','BANCOLOMBIA','Ahorros','123','BANCO FALABELLA','Ahorros','123','yo','obvio'),('123456789','Juridica','Operador','','','ejemplo','32165','calle','ejemplo@gmail.com','32165','ejemplo@gmail.com','r','a','a','a','a','a',1,'$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',10,NULL,'InActivo','NEQUI','Telefonica','3106949631','BANCO DE BOGOTA','Corriente','3214','ejemplo','el banco'),('8000099734','Juridica','Distribuidor','','','LUVAGA CIA LTDA.','665 25 09','Av 4B Norte # 37 A - 127','contabilidad@luvaga.com','000','contabilidad@luvaga.com','LUIS ENRIQUE','79589752','1','1','1','1',2,'$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',10,NULL,'InActivo','BANCOLOMBIA','Ahorros','79589752','NEQUI','Telefonica','79589752','LUIS ENRIQUE','LUIS ENRIQUE'),('9005104631','Juridica','Distribuidor','','','KUMBA INFLABLES SAS','0000','Carrera 95# 2b1-86, 1','ajdjfjf@gmail.com','123456','juandavid.andrade@gmail.com','benito','66901489','juan david andrade','00000','juan david andrade','0000',1,'$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',10,0,'Activo','BANCOLOMBIA','Ahorros','','BANCOLOMBIA','Ahorros','','',''),('9008211529','Juridica','Distribuidor','','','JGH PROYECTOS Y SERVICIOS S.A.S','0000','Carrera 95# 2b1-86, 1','ahdifif@gmail.com','123456','ajdufbebf@gmail.com','JHON ALEXANDER','321654','juan david andrade','00000','juan david andrade','0000',2,'$2y$10$rSLCqr2BPyAFty8ylMSx6.dgzwqlg0rX6ylMJtR9mVlGjWXGHEuTe',1,NULL,'Activo','BANCOLOMBIA','Ahorros','123','BANCOLOMBIA','Ahorros','123','',''),('9009605842','Juridica','Operador','','','online group ','9272729','cra 57b # 68- 18','onlinegroupbogota@hotmail.com','3003653668','onlinegroupbogota@hotmail.com','david pinto ','80035663','guivany pinto','3054232363','CAROLINA GOMEZ','3123392279',2,'$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',0,NULL,'Activo','DAVIVIENDA','Ahorros','411570003245','BANCOLOMBIA','Ahorros','','david pinto ',''),('9010817708','Juridica','Distribuidor','','','soluciones  Vida Fácil  ','3054232363','CRA 57 B # 68-  18   PISO 3','comercial@solucionesvidafacil.com','3054232363','comercial@solucionesvidafacil.com','yury carolina  gomez pineda ','1020797607','david  pinto hernandez','3114145446','guiovany pinto hernandez','3203900600',2,'$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',0,70000,'Activo','BANCOLOMBIA','Ahorros','68900010986','BANCOLOMBIA','Ahorros','','yury  gomez  pineda ','');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-16 15:57:22
