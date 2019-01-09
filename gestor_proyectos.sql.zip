-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2018 a las 00:08:11
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
-- Base de datos: `gestor_proyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustede`
--

CREATE TABLE `ajustede` (
  `Numero` int(11) DEFAULT NULL,
  `Producto` varchar(80) DEFAULT NULL,
  `Cantidad` float DEFAULT NULL,
  `ValorUnitario` float DEFAULT NULL,
  `ValorIva` float DEFAULT NULL,
  `PorcentajeIva` float DEFAULT NULL,
  `ValorTotal` float DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajusteen`
--

CREATE TABLE `ajusteen` (
  `Numero` int(11) NOT NULL,
  `Proyecto` int(11) DEFAULT NULL,
  `FechaDeRealizacion` date DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `Autorizado` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Usuario` varchar(80) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avancede`
--

CREATE TABLE `avancede` (
  `Numero` int(11) DEFAULT NULL,
  `Producto` varchar(80) DEFAULT NULL,
  `Cantidad` float DEFAULT NULL,
  `ValorUnitario` float DEFAULT NULL,
  `ValorIva` float DEFAULT NULL,
  `PorcentajeIva` float DEFAULT NULL,
  `ValorTotal` float DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avanceen`
--

CREATE TABLE `avanceen` (
  `Numero` int(11) NOT NULL,
  `Proyecto` int(11) DEFAULT NULL,
  `FechaDeRealizacion` date DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `Autorizado` tinyint(1) DEFAULT NULL,
  `Finalizado` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Usuario` varchar(80) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantiade`
--

CREATE TABLE `garantiade` (
  `Numero` int(11) DEFAULT NULL,
  `Producto` varchar(80) DEFAULT NULL,
  `Cantidad` float DEFAULT NULL,
  `ValorUnitario` float DEFAULT NULL,
  `ValorIva` float DEFAULT NULL,
  `PorcentajeIva` float DEFAULT NULL,
  `ValorTotal` float DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantiaen`
--

CREATE TABLE `garantiaen` (
  `Numero` int(11) NOT NULL,
  `Proyecto` int(11) DEFAULT NULL,
  `FechaDeRealizacion` date DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `Autorizado` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Usuario` varchar(80) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Numero` int(11) NOT NULL,
  `Tipo` int(11) DEFAULT NULL,
  `Modulo` varchar(80) DEFAULT NULL,
  `Permiso` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`Numero`, `Tipo`, `Modulo`, `Permiso`) VALUES
(1, 1, 'Nuevo Proyecto', 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Codigo` varchar(80) NOT NULL,
  `Nombre` varchar(120) DEFAULT NULL,
  `Unidad` varchar(80) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Precio_Iva` float DEFAULT NULL,
  `Iva` int(11) DEFAULT NULL,
  `Porc_Iva` float DEFAULT NULL,
  `Tipo` varchar(80) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Codigo`, `Nombre`, `Unidad`, `Precio`, `Precio_Iva`, `Iva`, `Porc_Iva`, `Tipo`, `Costo`) VALUES
('1', 'Via', 'Unidad', 50000, 53000, 1, 19, 'I', 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectode`
--

CREATE TABLE `proyectode` (
  `Numero` int(11) DEFAULT NULL,
  `Producto` varchar(80) DEFAULT NULL,
  `Cantidad` float DEFAULT NULL,
  `Faltantes` float DEFAULT NULL,
  `ValorUnitario` float DEFAULT NULL,
  `ValorIva` float DEFAULT NULL,
  `PorcentajeIva` float DEFAULT NULL,
  `ValorTotal` float DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectoen`
--

CREATE TABLE `proyectoen` (
  `Numero` int(11) NOT NULL,
  `Tercero` varchar(255) DEFAULT NULL,
  `FechaDeRealizacion` date DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `Autorizado` tinyint(1) DEFAULT NULL,
  `Finalizado` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(1024) DEFAULT NULL,
  `Usuario` varchar(80) DEFAULT NULL,
  `Costo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectoen`
--

INSERT INTO `proyectoen` (`Numero`, `Tercero`, `FechaDeRealizacion`, `Subtotal`, `Total`, `Iva`, `FechaInicio`, `FechaFin`, `Autorizado`, `Finalizado`, `Descripcion`, `Usuario`, `Costo`) VALUES
(1, '1112492933', '2018-10-10', 50000, 50000, 500, '0000-00-00', '0000-00-00', 1, 0, 'calle', 'Admin', 3000);

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
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `Nit` varchar(80) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Direccion` varchar(80) DEFAULT NULL,
  `Ciudad` varchar(80) DEFAULT NULL,
  `Departamento` varchar(80) DEFAULT NULL,
  `Pais` varchar(80) DEFAULT NULL,
  `Telefono` varchar(80) DEFAULT NULL,
  `Ext` varchar(80) DEFAULT NULL,
  `Vendedor` int(11) DEFAULT NULL,
  `Cv` int(11) DEFAULT NULL,
  `Correo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`Nit`, `Nombre`, `Direccion`, `Ciudad`, `Departamento`, `Pais`, `Telefono`, `Ext`, `Vendedor`, `Cv`, `Correo`) VALUES
('1112492933', 'juan david andrade', 'Calle 23 # 49a-16', 'Cali', 'Valle del Cauca', 'Colombia', '3106949631', NULL, 99, 1, 'juandavid.andrade1997@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(80) NOT NULL,
  `Correo` varchar(80) DEFAULT NULL,
  `Rol` int(11) DEFAULT NULL,
  `Clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(80) DEFAULT NULL,
  `Apellido` varchar(80) DEFAULT NULL,
  `Genero` varchar(80) DEFAULT NULL,
  `Direccion` varchar(80) DEFAULT NULL,
  `Telefono` varchar(80) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Correo`, `Rol`, `Clave`, `Nombre`, `Apellido`, `Genero`, `Direccion`, `Telefono`, `Imagen`) VALUES
('Admin', 'juandavid.andrade1997@gmail.com', 1, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 'Juan David', 'Andrade Valencia ', 'Masculino', 'Calle 23 # 49a-16', '3106949631', 'user.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustede`
--
ALTER TABLE `ajustede`
  ADD KEY `Producto` (`Producto`),
  ADD KEY `Numero` (`Numero`);

--
-- Indices de la tabla `ajusteen`
--
ALTER TABLE `ajusteen`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Proyecto` (`Proyecto`);

--
-- Indices de la tabla `avancede`
--
ALTER TABLE `avancede`
  ADD KEY `Producto` (`Producto`),
  ADD KEY `Numero` (`Numero`);

--
-- Indices de la tabla `avanceen`
--
ALTER TABLE `avanceen`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Proyecto` (`Proyecto`);

--
-- Indices de la tabla `garantiade`
--
ALTER TABLE `garantiade`
  ADD KEY `Producto` (`Producto`),
  ADD KEY `Numero` (`Numero`);

--
-- Indices de la tabla `garantiaen`
--
ALTER TABLE `garantiaen`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Proyecto` (`Proyecto`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `proyectode`
--
ALTER TABLE `proyectode`
  ADD KEY `Producto` (`Producto`),
  ADD KEY `Numero` (`Numero`);

--
-- Indices de la tabla `proyectoen`
--
ALTER TABLE `proyectoen`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Tercero` (`Tercero`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`Nit`);

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
-- Filtros para la tabla `ajustede`
--
ALTER TABLE `ajustede`
  ADD CONSTRAINT `ajustede_ibfk_1` FOREIGN KEY (`Producto`) REFERENCES `productos` (`Codigo`),
  ADD CONSTRAINT `ajustede_ibfk_2` FOREIGN KEY (`Numero`) REFERENCES `ajusteen` (`Numero`);

--
-- Filtros para la tabla `ajusteen`
--
ALTER TABLE `ajusteen`
  ADD CONSTRAINT `ajusteen_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`),
  ADD CONSTRAINT `ajusteen_ibfk_2` FOREIGN KEY (`Proyecto`) REFERENCES `proyectoen` (`Numero`);

--
-- Filtros para la tabla `avancede`
--
ALTER TABLE `avancede`
  ADD CONSTRAINT `avancede_ibfk_1` FOREIGN KEY (`Producto`) REFERENCES `productos` (`Codigo`),
  ADD CONSTRAINT `avancede_ibfk_2` FOREIGN KEY (`Numero`) REFERENCES `avanceen` (`Numero`);

--
-- Filtros para la tabla `avanceen`
--
ALTER TABLE `avanceen`
  ADD CONSTRAINT `avanceen_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`),
  ADD CONSTRAINT `avanceen_ibfk_2` FOREIGN KEY (`Proyecto`) REFERENCES `proyectoen` (`Numero`);

--
-- Filtros para la tabla `garantiade`
--
ALTER TABLE `garantiade`
  ADD CONSTRAINT `garantiade_ibfk_1` FOREIGN KEY (`Producto`) REFERENCES `productos` (`Codigo`),
  ADD CONSTRAINT `garantiade_ibfk_2` FOREIGN KEY (`Numero`) REFERENCES `garantiaen` (`Numero`);

--
-- Filtros para la tabla `garantiaen`
--
ALTER TABLE `garantiaen`
  ADD CONSTRAINT `garantiaen_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`),
  ADD CONSTRAINT `garantiaen_ibfk_2` FOREIGN KEY (`Proyecto`) REFERENCES `proyectoen` (`Numero`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`Tipo`) REFERENCES `roles` (`Numero`);

--
-- Filtros para la tabla `proyectode`
--
ALTER TABLE `proyectode`
  ADD CONSTRAINT `proyectode_ibfk_1` FOREIGN KEY (`Producto`) REFERENCES `productos` (`Codigo`),
  ADD CONSTRAINT `proyectode_ibfk_2` FOREIGN KEY (`Numero`) REFERENCES `proyectoen` (`Numero`);

--
-- Filtros para la tabla `proyectoen`
--
ALTER TABLE `proyectoen`
  ADD CONSTRAINT `proyectoen_ibfk_1` FOREIGN KEY (`Tercero`) REFERENCES `terceros` (`Nit`),
  ADD CONSTRAINT `proyectoen_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`Numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
