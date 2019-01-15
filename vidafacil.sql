-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2019 a las 23:33:27
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Nit` varchar(30) NOT NULL,
  `Razon_Social` varchar(200) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Tel_C` varchar(20) DEFAULT NULL,
  `Direccion` varchar(120) DEFAULT NULL,
  `Correo_N` varchar(80) DEFAULT NULL,
  `Cel_C` varchar(20) DEFAULT NULL,
  `Correo_C` varchar(80) DEFAULT NULL,
  `Rep_Legal` varchar(200) DEFAULT NULL,
  `CC` varchar(30) DEFAULT NULL,
  `Nombre_R1` varchar(200) DEFAULT NULL,
  `Tel_R1` varchar(200) DEFAULT NULL,
  `Nombre_R2` varchar(200) DEFAULT NULL,
  `Tel_R2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Nit`, `Razon_Social`, `Tipo`, `Tel_C`, `Direccion`, `Correo_N`, `Cel_C`, `Correo_C`, `Rep_Legal`, `CC`, `Nombre_R1`, `Tel_R1`, `Nombre_R2`, `Tel_R2`) VALUES
('123456789', 'soluciones vida facil', 'Natural', '4852040', 'calle 23 # 49a -16', '2@gmail.com', '123', '1@gmail.com', 'jose', '11252', '123', '456', '789', '741456'),
('9002298187', 'MONTAJES LP LTDA', 'Juridica', '374 6244', 'CALLE 40 # 3N - 83', 'contabilidadmontajeslp@hotmail.com', '317 667 4585', 'contabilidadmontajeslp@hotmail.com', 'LUIS CARLOS', '16448551', 'juan', 'juan', 'david', '123456'),
('900316686', 'Grupo Sai S.A.S', 'Juridica', '4852040', 'AV 5AN # 24', 'juan.andrade@sai-open.com', '0000', 'juan.andrade@sai-open.com', 'Juan David Andrade', '1112492933', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Numero` int(11) NOT NULL,
  `Usuario` varchar(80) DEFAULT NULL,
  `Modulo` varchar(80) DEFAULT NULL,
  `Permiso` varchar(80) DEFAULT NULL
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
  `Usuario` varchar(80) NOT NULL,
  `Correo` varchar(80) DEFAULT NULL,
  `Rol` int(11) DEFAULT NULL,
  `Clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS',
  `Nombre` varchar(80) DEFAULT NULL,
  `Apellido` varchar(80) DEFAULT NULL,
  `Genero` varchar(80) DEFAULT NULL,
  `Porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Correo`, `Rol`, `Clave`, `Nombre`, `Apellido`, `Genero`, `Porcentaje`) VALUES
('Admin', 'juandavid.andrade1997@gmail.com', 1, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 'Juan David', 'Andrade Valencia', 'Masculino', 8),
('User2', 'User2@gmail.com', 1, '$2y$10$uKICFTr7YzNhWPKuXr4f..QioP2C5MBE8nBzDR7MhDrmKOhVBcXVC', 'User', '2', 'Masculino', 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Nit`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario`),
  ADD KEY `Rol` (`Rol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`Numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
