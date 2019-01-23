-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2019 a las 06:18:15
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vidafacil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanas`
--

CREATE TABLE `campanas` (
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Contacto` varchar(200) NOT NULL,
  `Area` varchar(200) NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Numero` int(11) NOT NULL,
  `Tipo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Numero`, `Tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

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
  `Porcentaje` float NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nit`, `Tipo_Persona`, `Tipo`, `Apellido`, `Nombre`, `Razon_Social`, `Tel_C`, `Direccion`, `Correo`, `Cel_C`, `Correo_C`, `Rep_Legal`, `CC`, `Nombre_R1`, `Tel_R1`, `Nombre_R2`, `Tel_R2`, `Rol`, `Clave`, `Porcentaje`, `Estado`) VALUES
('1112492933', 'Juridica', 'Distribuidor', '', '', 'KUMBA INFLABLES SAS', '33', '1', 'juandavid.andrade1997@gmail.com', '1', 'fandacion@gmail.com', 'ANTHONY MONTERO RUIZ', '321654', 'juan david andrade', '3008930251', 'juan david andrade', '3008930251', 1, '$2y$10$a9TM97e.oAPp0YBSj8OCi.gKSgQ.rCSsJFD5rBOidu9OnUcIWq5LG', 10, 'Activo'),
('9005104631', 'Juridica', 'Distribuidor', '', '', 'KUMBA INFLABLES SAS', '3008930251', 'Carrera 95# 2b1-86, 1', 'juandavid.andrade1997@gmail.com', '123456', 'juandavid.andrade@gmail.com', 'benito', '66901489', 'juan david andrade', '3008930251', 'juan david andrade', '3008930251', 1, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 1, 'InActivo'),
('9008211529', 'Juridica', 'Distribuidor', '', '', 'JGH PROYECTOS Y SERVICIOS S.A.S', '3008930251', 'Carrera 95# 2b1-86, 1', 'juandavid.andrade1997@gmail.com', '123456', 'juandavid.andrade1997@gmail.com', 'JHON ALEXANDER', '321654', 'juan david andrade', '3008930251', 'juan david andrade', '3008930251', 2, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 1, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_camp`
--

CREATE TABLE `usuario_camp` (
  `Numero` int(11) NOT NULL,
  `Campana` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campanas`
--
ALTER TABLE `campanas`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Nit`),
  ADD KEY `Rol` (`Rol`);

--
-- Indices de la tabla `usuario_camp`
--
ALTER TABLE `usuario_camp`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Campana` (`Campana`),
  ADD KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario_camp`
--
ALTER TABLE `usuario_camp`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`Numero`);

--
-- Filtros para la tabla `usuario_camp`
--
ALTER TABLE `usuario_camp`
  ADD CONSTRAINT `usuario_camp_ibfk_1` FOREIGN KEY (`Campana`) REFERENCES `campanas` (`Numero`),
  ADD CONSTRAINT `usuario_camp_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
