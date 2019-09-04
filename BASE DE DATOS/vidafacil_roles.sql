 SET NAMES utf8 ;

DROP TABLE IF EXISTS `ROLES`;

 SET character_set_client = utf8mb4 ;
CREATE TABLE `ROLES` (
  `Numero` int(11) NOT NULL,
  `Tipo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ROLES` WRITE;
INSERT INTO `ROLES` VALUES (1,'Administrador'),(2,'Usuario');
UNLOCK TABLES;
