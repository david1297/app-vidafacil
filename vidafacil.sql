-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2019 a las 23:45:05
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

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
-- Estructura de tabla para la tabla `afiliados`
--

CREATE TABLE `afiliados` (
  `Identificacion` varchar(30) NOT NULL,
  `Primer_Nombre` varchar(50) NOT NULL,
  `Segundo_Nombre` varchar(50) NOT NULL,
  `Primer_Apellido` varchar(50) NOT NULL,
  `Segundo_Apellido` varchar(50) NOT NULL,
  `Tipo_Identificacion` varchar(50) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Nacionalidad` varchar(50) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  `Departamento` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Direccion_Adicional` varchar(200) NOT NULL,
  `Estrato` int(11) NOT NULL,
  `Nivel_Educacion` varchar(80) NOT NULL,
  `Ocupacion` varchar(100) NOT NULL,
  `Rango_Ingresos` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Forma_Pago` varchar(40) NOT NULL,
  `Direccion_Firma` varchar(200) NOT NULL,
  `Fecha_Firma` date NOT NULL,
  `Horario` time NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`Identificacion`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Tipo_Identificacion`, `Fecha_Nacimiento`, `Nacionalidad`, `Ciudad`, `Departamento`, `Direccion`, `Direccion_Adicional`, `Estrato`, `Nivel_Educacion`, `Ocupacion`, `Rango_Ingresos`, `Telefono`, `Forma_Pago`, `Direccion_Firma`, `Fecha_Firma`, `Horario`, `Estado`) VALUES
('1112492933', 'JUAN', 'DAVID', 'ANDRADE', 'VALENCIA', 'Cedula', '1997-12-17', 'COLOMBIA', 1, 1, 'CALLE 23 # 49A-16', 'SA', 2, 'TECNICO', 'TRABAJADOR', '1200000', '32231', '1', '1', '2019-01-31', '31:00:00', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`Numero`, `Nombre`) VALUES
(1, 'BANCOLOMBIA'),
(2, 'BANCO FALABELLA'),
(3, 'BANCO DE BOGOTA'),
(4, 'DAVIVIENDA'),
(5, 'NEQUI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanas`
--

CREATE TABLE `campanas` (
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Contacto` varchar(200) NOT NULL,
  `Area` varchar(200) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Porcentaje` float NOT NULL,
  `Observaciones` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanas`
--

INSERT INTO `campanas` (`Numero`, `Nombre`, `Contacto`, `Area`, `Estado`, `Porcentaje`, `Observaciones`) VALUES
(1, 'SVF', 'yo', 'Administrativa', 'Activa', 10, 'fdf'),
(2, 'EMERMEDICA', 'yo', 'Administriva', 'InActiva', 0, ''),
(3, 'TELEFONIA', 'obvio yo', 'todas', 'InActiva', 50, 'HOLI\r\nQUE TAL COMO ESTAS \r\nSALTO'),
(4, 'prueba', 'sebastian', 'ventas', 'Pendiente', 30, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `Codigo` int(11) NOT NULL,
  `Departamento` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`Codigo`, `Departamento`, `Nombre`) VALUES
(1, 1, 'Cali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`Codigo`, `Nombre`) VALUES
(11, 'Amazonas'),
(12, 'Antioquia'),
(13, 'Arauca'),
(14, 'Atlántico'),
(15, 'Bolívar'),
(16, 'Boyacá'),
(17, 'Caldas'),
(18, 'Caquetá'),
(19, 'Casanare'),
(20, 'Cauca'),
(21, 'Cesar'),
(22, 'Chocó'),
(23, 'Córdoba'),
(24, 'Cundinamarca'),
(25, 'Guainía'),
(26, 'Guaviare'),
(27, 'Huila'),
(28, 'La Guajira'),
(29, 'Magdalena'),
(30, 'Meta'),
(31, 'Nariño'),
(32, 'Norte de Santander'),
(33, 'Putumayo'),
(34, 'Quindio'),
(35, 'Risaralda'),
(36, 'San Andres y Providencia'),
(37, 'Santander'),
(40, 'Sucre'),
(41, 'Tolima'),
(1, 'Valle del Cauca'),
(42, 'Vaupés'),
(43, 'Vichada');

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
  `Estado` varchar(20) NOT NULL,
  `Banco_1` varchar(80) NOT NULL,
  `Tipo_Banco_1` varchar(80) NOT NULL,
  `Numero_Cuenta_1` varchar(30) NOT NULL,
  `Banco_2` varchar(80) NOT NULL,
  `Tipo_Banco_2` varchar(80) NOT NULL,
  `Numero_Cuenta_2` varchar(30) NOT NULL,
  `Titular_1` varchar(200) NOT NULL,
  `Titular_2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nit`, `Tipo_Persona`, `Tipo`, `Apellido`, `Nombre`, `Razon_Social`, `Tel_C`, `Direccion`, `Correo`, `Cel_C`, `Correo_C`, `Rep_Legal`, `CC`, `Nombre_R1`, `Tel_R1`, `Nombre_R2`, `Tel_R2`, `Rol`, `Clave`, `Porcentaje`, `Estado`, `Banco_1`, `Tipo_Banco_1`, `Numero_Cuenta_1`, `Banco_2`, `Tipo_Banco_2`, `Numero_Cuenta_2`, `Titular_1`, `Titular_2`) VALUES
('1112492933', 'Juridica', 'Distribuidor', '', '', 'KUMBA INFLABLES SAS', '33', '1', 'juandavid.andrade1997@gmail.com', '1', 'fandacion@gmail.com', 'ANTHONY MONTERO RUIZ', '321654', 'juan david andrade', '3008930251', 'juan david andrade', '300', 1, '$2y$10$a9TM97e.oAPp0YBSj8OCi.gKSgQ.rCSsJFD5rBOidu9OnUcIWq5LG', 10, 'Activo', 'BANCOLOMBIA', 'Ahorros', '123', 'BANCO FALABELLA', 'Ahorros', '123', 'yo', 'obvio'),
('123456789', 'Juridica', 'Operador', '', '', 'ejemplo', '32165', 'calle', 'ejemplo@gmail.com', '32165', 'ejemplo@gmail.com', 'r', 'a', 'a', 'a', 'a', 'a', 1, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 10, 'InActivo', 'NEQUI', 'Telefonica', '3106949631', 'BANCO DE BOGOTA', 'Corriente', '3214', 'ejemplo', 'el banco'),
('8000099734', 'Juridica', 'Distribuidor', '', '', 'LUVAGA CIA LTDA.', '665 25 09', 'Av 4B Norte # 37 A - 127', 'contabilidad@luvaga.com', '664 01 01', 'contabilidad@luvaga.com', 'LUIS ENRIQUE', '79589752', '1', '1', '1', '1', 2, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 10, 'InActivo', 'BANCOLOMBIA', 'Ahorros', '79589752', 'NEQUI', 'Telefonica', '79589752', 'LUIS ENRIQUE', 'LUIS ENRIQUE'),
('9005104631', 'Juridica', 'Distribuidor', '', '', 'KUMBA INFLABLES SAS', '3008930251', 'Carrera 95# 2b1-86, 1', 'juandavid.andrade1997@gmail.com', '123456', 'juandavid.andrade@gmail.com', 'benito', '66901489', 'juan david andrade', '3008930251', 'juan david andrade', '3008930251', 1, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 1, 'InActivo', '', '', '', '', '', '', '', ''),
('9008211529', 'Juridica', 'Distribuidor', '', '', 'JGH PROYECTOS Y SERVICIOS S.A.S', '3008930251', 'Carrera 95# 2b1-86, 1', 'juandavid.andrade1997@gmail.com', '123456', 'juandavid.andrade1997@gmail.com', 'JHON ALEXANDER', '321654', 'juan david andrade', '3008930251', 'juan david andrade', '3008930251', 1, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 1, 'Activo', 'BANCOLOMBIA', 'Ahorros', '123', 'BANCOLOMBIA', 'Ahorros', '123', '', '');

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
-- Volcado de datos para la tabla `usuario_camp`
--

INSERT INTO `usuario_camp` (`Numero`, `Campana`, `Usuario`) VALUES
(49, 3, '8000099734'),
(103, 4, '1112492933'),
(104, 3, '1112492933'),
(105, 1, '9005104631');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_camp_temp`
--

CREATE TABLE `u_camp_temp` (
  `Numero_Temp` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Porcentaje` float NOT NULL,
  `session_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `u_camp_temp`
--

INSERT INTO `u_camp_temp` (`Numero_Temp`, `Numero`, `Nombre`, `Porcentaje`, `session_id`, `Nit`) VALUES
(190, 1, 'SVF', 10, 'q5esedl0kshf7lagpeh6u2l4rd', '9005104631'),
(294, 4, 'prueba', 30, 'qgdpi9kf28qk00ls9bcnuk4alb', '1112492933'),
(295, 3, 'TELEFONIA', 50, 'qgdpi9kf28qk00ls9bcnuk4alb', '1112492933'),
(297, 3, 'TELEFONIA', 50, 'u1c21ur6crrdsd3924lmibfnla', '8000099734');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`Identificacion`),
  ADD KEY `Ciudad` (`Ciudad`),
  ADD KEY `Departamento` (`Departamento`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `campanas`
--
ALTER TABLE `campanas`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Departamento` (`Departamento`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`Codigo`);

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
-- Indices de la tabla `u_camp_temp`
--
ALTER TABLE `u_camp_temp`
  ADD PRIMARY KEY (`Numero_Temp`),
  ADD KEY `Numero` (`Numero`),
  ADD KEY `Nit` (`Nit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuario_camp`
--
ALTER TABLE `usuario_camp`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `u_camp_temp`
--
ALTER TABLE `u_camp_temp`
  MODIFY `Numero_Temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD CONSTRAINT `afiliados_ibfk_1` FOREIGN KEY (`Ciudad`) REFERENCES `ciudades` (`Codigo`),
  ADD CONSTRAINT `afiliados_ibfk_2` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`Codigo`);

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`Codigo`);

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

--
-- Filtros para la tabla `u_camp_temp`
--
ALTER TABLE `u_camp_temp`
  ADD CONSTRAINT `u_camp_temp_ibfk_1` FOREIGN KEY (`Nit`) REFERENCES `usuarios` (`Nit`),
  ADD CONSTRAINT `u_camp_temp_ibfk_2` FOREIGN KEY (`Numero`) REFERENCES `campanas` (`Numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
