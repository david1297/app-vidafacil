-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2019 a las 04:40:27
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
  `Rango_Ingresos` int(11) NOT NULL,
  `Forma_Pago` int(11) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Direccion_Firma` varchar(200) NOT NULL,
  `Fecha_Firma` date NOT NULL,
  `Horario` time NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`Identificacion`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Tipo_Identificacion`, `Fecha_Nacimiento`, `Nacionalidad`, `Ciudad`, `Departamento`, `Direccion`, `Direccion_Adicional`, `Estrato`, `Nivel_Educacion`, `Ocupacion`, `Rango_Ingresos`, `Forma_Pago`, `Telefono`, `Correo`, `Direccion_Firma`, `Fecha_Firma`, `Horario`, `Estado`) VALUES
('1112492933', 'JUAN', 'DAVID', 'ANDRADE', 'VALENCIA', 'Cedula', '1997-12-17', 'NariÃ±o', 3, 10, 'CALLE 23 # 49A-16', 'SA', 2, 'Universitario', 'Empleado', 2, 5, '32231', 'l@gmail.com', '1', '2019-01-31', '12:00:00', 'Activo');

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
  `Observaciones` varchar(5000) NOT NULL,
  `Estados` varchar(1000) NOT NULL,
  `Seguimiento` varchar(1000) NOT NULL,
  `Transportadoras` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanas`
--

INSERT INTO `campanas` (`Numero`, `Nombre`, `Contacto`, `Area`, `Estado`, `Porcentaje`, `Observaciones`, `Estados`, `Seguimiento`, `Transportadoras`) VALUES
(1, 'SVF', 'yo', 'Administrativa', 'Activa', 10, 'fdf', '', '', ''),
(2, 'EMERMEDICA', 'yo', 'Administriva', 'Activa', 0, '', 'Estado1\r\nEstado3\r\nEjemplo', '', ''),
(3, 'TELEFONIA', 'obvio yo', 'todas', 'Activa', 50, 'HOLI\r\nQUE TAL COMO ESTAS \r\nSALTO', 'Pendientes\r\nOk\r\nAprobado\r\nRechazado\r\nEn Proceso\r\nPagado\r\nPor Pagar\r\nPara Descontar', 'Devuelto Al Remitente.\r\nDirecciÃ³n Errada.\r\nDirecciÃ³n Incompleta.\r\nEn EnviÃ³.\r\nEntrega Exitosa.\r\nNo Desea Recibir.\r\nNo Desea Recibir.\r\nZona De EnviÃ³.', 'Aeropostal.\r\nBici Mail.\r\nCoordinadora.\r\nTCC.\r\nInterrapÃ­disimo.\r\nDHL.\r\nEnvÃ­a.\r\n4/72.\r\nDeprisa.\r\nFedex.\r\nServientrega.'),
(4, 'prueba', 'sebastian', 'ventas', 'Activa', 30, '', '', '', '');

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
(1, 30, 'Cali'),
(2, 10, 'Popayan'),
(3, 10, 'Caloto'),
(4, 1, 'El Encanto'),
(5, 1, 'La Chorrera'),
(6, 1, 'La Pedrera'),
(7, 1, 'La Victoria'),
(8, 1, 'Leticia'),
(9, 1, 'Mirití-Paraná'),
(10, 1, 'Puerto Alegría'),
(11, 1, 'Puerto Arica'),
(12, 1, 'Puerto Nariño'),
(13, 1, 'Puerto Santander'),
(14, 1, 'Tarapacá'),
(15, 2, 'Cáceres'),
(16, 2, 'Caucasia'),
(17, 2, 'El Bagre'),
(18, 2, 'Nechí'),
(19, 2, 'Tarazá'),
(20, 2, 'Zaragoza'),
(21, 2, 'Caracolí'),
(22, 2, 'Maceo'),
(23, 2, 'Puerto Berrío'),
(24, 2, 'Puerto Nare'),
(25, 2, 'Puerto Triunfo'),
(26, 2, 'Yondó'),
(27, 2, 'Amalfi'),
(28, 2, 'Anorí'),
(29, 2, 'Cisneros'),
(30, 2, 'Remedios'),
(31, 2, 'San Roque'),
(32, 2, 'Santo Domingo'),
(33, 2, 'Segovia'),
(34, 2, 'Vegachí'),
(35, 2, 'Yalí'),
(36, 2, 'Yolombó'),
(37, 2, 'Angostura'),
(38, 2, 'Belmira'),
(39, 2, 'Briceño'),
(40, 2, 'Campamento'),
(41, 2, 'Carolina del Príncipe'),
(42, 2, 'Donmatías'),
(43, 2, 'Entrerríos'),
(44, 2, 'Gómez Plata'),
(45, 2, 'Guadalupe'),
(46, 2, 'Ituango'),
(47, 2, 'San Andrés de Cuerquia'),
(48, 2, 'San José de la Montaña'),
(49, 2, 'San Pedro de los Milagros'),
(50, 2, 'Santa Rosa de Osos'),
(51, 2, 'Toledo'),
(52, 2, 'Valdivia'),
(53, 2, 'Yarumal'),
(54, 2, 'Abriaquí'),
(55, 2, 'Antioquia'),
(56, 2, 'Anzá'),
(57, 2, 'Armenia'),
(58, 2, 'Buriticá'),
(59, 2, 'Caicedo'),
(60, 2, 'Cañasgordas'),
(61, 2, 'Dabeiba'),
(62, 2, 'Ebéjico'),
(63, 2, 'Frontino'),
(64, 2, 'Giraldo'),
(65, 2, 'Heliconia'),
(66, 2, 'Liborina'),
(67, 2, 'Olaya'),
(68, 2, 'Peque'),
(69, 2, 'Sabanalarga'),
(70, 2, 'San Jerónimo'),
(71, 2, 'Sopetrán'),
(72, 2, 'Uramita'),
(73, 2, 'Abejorral'),
(74, 2, 'Alejandría'),
(75, 2, 'Argelia'),
(76, 2, 'El Carmen de Viboral'),
(77, 2, 'Cocorná'),
(78, 2, 'Concepción'),
(79, 2, 'El Peñol'),
(80, 2, 'El Retiro'),
(81, 2, 'El Santuario'),
(82, 2, 'Granada'),
(83, 2, 'Guarne'),
(84, 2, 'Guatapé'),
(85, 2, 'La Ceja'),
(86, 2, 'La Unión'),
(87, 2, 'Marinilla'),
(88, 2, 'Nariño'),
(89, 2, 'Rionegro'),
(90, 2, 'San Carlos'),
(91, 2, 'San Francisco'),
(92, 2, 'San Luis'),
(93, 2, 'San Rafael'),
(94, 2, 'San Vicente'),
(95, 2, 'Sonsón'),
(96, 2, 'Amagá'),
(97, 2, 'Andes'),
(98, 2, 'Angelópolis'),
(99, 2, 'Betania'),
(100, 2, 'Betulia'),
(101, 2, 'Caramanta'),
(102, 2, 'Ciudad Bolívar'),
(103, 2, 'Concordia'),
(104, 2, 'Fredonia'),
(105, 2, 'Hispania'),
(106, 2, 'Jardín'),
(107, 2, 'Jericó'),
(108, 2, 'La Pintada'),
(109, 2, 'Montebello'),
(110, 2, 'Pueblorrico'),
(111, 2, 'Salgar'),
(112, 2, 'Santa Bárbara'),
(113, 2, 'Támesis'),
(114, 2, 'Tarso'),
(115, 2, 'Titiribí'),
(116, 2, 'Urrao'),
(117, 2, 'Valparaíso'),
(118, 2, 'Venecia'),
(119, 2, 'Apartadó'),
(120, 2, 'Arboletes'),
(121, 2, 'Carepa'),
(122, 2, 'Chigorodó'),
(123, 2, 'Murindó'),
(124, 2, 'Mutatá'),
(125, 2, 'Necoclí'),
(126, 2, 'San Juan de Urabá'),
(127, 2, 'San Pedro de Urabá'),
(128, 2, 'Turbo'),
(129, 2, 'Vigía del Fuerte'),
(130, 2, 'Barbosa'),
(131, 2, 'Bello'),
(132, 2, 'Caldas'),
(133, 2, 'Copacabana'),
(134, 2, 'Envigado'),
(135, 2, 'Girardota'),
(136, 2, 'Itagüí'),
(137, 2, 'La Estrella'),
(138, 2, 'Medellín'),
(139, 2, 'Sabaneta'),
(140, 3, 'Arauca'),
(141, 3, 'Arauquita'),
(142, 3, 'Cravo Norte'),
(143, 3, 'Fortul'),
(144, 3, 'Puerto Rondón'),
(145, 3, 'Saravena'),
(146, 3, 'Tame'),
(147, 4, 'Barranquilla'),
(148, 4, 'Barranquilla'),
(149, 4, 'Baranoa'),
(150, 4, 'Campo de la Cruz'),
(151, 4, 'Candelaria'),
(152, 4, 'Galapa'),
(153, 4, 'Juan de Acosta'),
(154, 4, 'Luruaco'),
(155, 4, 'Malambo'),
(156, 4, 'Manatí'),
(157, 4, 'Palmar de Varela'),
(158, 4, 'Piojó'),
(159, 4, 'Polonuevo'),
(160, 4, 'Ponedera'),
(161, 4, 'Puerto Colombia'),
(162, 4, 'Repelón'),
(163, 4, 'Sabanagrande'),
(164, 4, 'Sabanalarga'),
(165, 4, 'Santa Lucía'),
(166, 4, 'Santo Tomás'),
(167, 4, 'Soledad'),
(168, 4, 'Suán'),
(169, 4, 'Tubará'),
(170, 4, 'Usiacurí');

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
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlantico'),
(5, 'Bolivar'),
(6, 'Boyaca'),
(7, 'Caldas'),
(8, 'Caqueta'),
(9, 'Casanare'),
(10, 'Cauca'),
(11, 'Cesar'),
(12, 'Choco'),
(13, 'Cordoba'),
(14, 'Cundinamarca'),
(15, 'Guainia'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Nariño'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindio'),
(25, 'Risaralda'),
(26, 'San Andres y Providencia'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupes'),
(32, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas_pago`
--

CREATE TABLE `formas_pago` (
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formas_pago`
--

INSERT INTO `formas_pago` (`Codigo`, `Descripcion`) VALUES
(1, 'Codensa'),
(2, 'Cheque'),
(3, 'Contra-Entrega'),
(4, 'Datafono'),
(5, 'Efectivo'),
(6, 'Tarjeta Credito'),
(7, 'Tarjeta Debito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones_ventas`
--

CREATE TABLE `observaciones_ventas` (
  `Numero` int(11) NOT NULL,
  `Venta` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(1000) NOT NULL,
  `Usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `observaciones_ventas`
--

INSERT INTO `observaciones_ventas` (`Numero`, `Venta`, `Fecha`, `Observacion`, `Usuario`) VALUES
(1, 1, '0000-00-00', '', '1112492933'),
(2, 4, '2019-02-06', 'sasa', '1112492933'),
(3, 4, '2019-02-06', 'ejemplo otro', '1112492933'),
(4, 0, '2019-02-06', 'saa', '1112492933'),
(5, 4, '2019-02-06', 'sasa', '1112492933'),
(6, 4, '2019-02-06', 'otro ejemplo', '1112492933'),
(7, 6, '2019-02-06', 'observacion 1', '1112492933'),
(8, 0, '2019-02-06', 'Nueva Opservacion', '1112492933'),
(9, 7, '2019-02-06', 'ejemplo comentario', '1112492933'),
(10, 0, '2019-02-06', 'Observacion Usuario', '1112492933'),
(11, 8, '2019-02-06', 'dxa', '9008211529'),
(12, 8, '2019-02-06', 'holi que hace', '1112492933');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango_ingresos`
--

CREATE TABLE `rango_ingresos` (
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rango_ingresos`
--

INSERT INTO `rango_ingresos` (`Codigo`, `Descripcion`) VALUES
(1, '$0 - $828.116'),
(2, '$828.116 - $1\'200.000'),
(3, '$1\'200.000 - $2\'000.000'),
(4, '$2\'000.000 - $3\'000.000');

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
('9008211529', 'Juridica', 'Distribuidor', '', '', 'JGH PROYECTOS Y SERVICIOS S.A.S', '3008930251', 'Carrera 95# 2b1-86, 1', 'juandavid.andrade1997@gmail.com', '123456', 'juandavid.andrade1997@gmail.com', 'JHON ALEXANDER', '321654', 'juan david andrade', '3008930251', 'juan david andrade', '3008930251', 2, '$2y$10$QTAFO8CodSKEVi94BbHsyed1r/rC4RxTd8PVhhdHZwb9kLAETB.rS', 1, 'Activo', 'BANCOLOMBIA', 'Ahorros', '123', 'BANCOLOMBIA', 'Ahorros', '123', '', '');

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
(105, 1, '9005104631'),
(107, 1, '8000099734'),
(118, 1, '1112492933'),
(119, 4, '1112492933'),
(120, 2, '1112492933'),
(121, 3, '1112492933'),
(122, 3, '9008211529'),
(123, 1, '9008211529'),
(124, 4, '9008211529'),
(125, 2, '9008211529');

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
(360, 3, 'TELEFONIA', 50, '9c7uavi731cupom6oss5pie6bu', '9008211529'),
(361, 1, 'SVF', 10, '9c7uavi731cupom6oss5pie6bu', '9008211529'),
(362, 4, 'prueba', 30, '9c7uavi731cupom6oss5pie6bu', '9008211529'),
(363, 2, 'EMERMEDICA', 0, '9c7uavi731cupom6oss5pie6bu', '9008211529'),
(384, 1, 'SVF', 10, 'j5bgpjdjpolju4rch7f8dofmul', '1112492933'),
(385, 4, 'prueba', 30, 'j5bgpjdjpolju4rch7f8dofmul', '1112492933'),
(386, 2, 'EMERMEDICA', 0, 'j5bgpjdjpolju4rch7f8dofmul', '1112492933'),
(387, 3, 'TELEFONIA', 50, 'j5bgpjdjpolju4rch7f8dofmul', '1112492933');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Numero` int(11) NOT NULL,
  `Afiliado` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Campana` int(11) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Estado_Campana` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Seguimiento` varchar(100) NOT NULL,
  `Transportadora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Numero`, `Afiliado`, `Usuario`, `Campana`, `Estado`, `Estado_Campana`, `Fecha`, `Seguimiento`, `Transportadora`) VALUES
(0, '1112492933', '1112492933', 3, 'Aprobada', 'Pendientes', '2019-02-06', 'Devuelto Al Remitente.', 'Aeropostal.'),
(1, '1112492933', '1112492933', 3, 'Pendiente', 'Pendientes', '0000-00-00', '', ''),
(2, '1112492933', '1112492933', 2, 'Rechazada', 'Estado3', '2019-02-06', '', ''),
(3, '1112492933', '1112492933', 2, 'Pendiente', 'Estado1', '2019-02-06', '', ''),
(4, '1112492933', '1112492933', 2, 'Rechazada', 'Estado1', '2019-02-06', '', ''),
(5, '1112492933', '1112492933', 2, 'Aprobada', 'Estado1', '2019-02-06', '', ''),
(6, '1112492933', '1112492933', 2, 'Pendiente', 'Estado3', '2019-02-06', '', ''),
(7, '1112492933', '1112492933', 3, 'Aprobada', 'Pagado', '2019-02-06', 'En EnviÃ³.', 'DHL.'),
(8, '1112492933', '1112492933', 3, 'Aprobada', 'Pendientes', '2019-02-06', 'Devuelto Al Remitente.', 'Bici Mail.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`Identificacion`),
  ADD KEY `Ciudad` (`Ciudad`),
  ADD KEY `Departamento` (`Departamento`),
  ADD KEY `Rango_Ingresos` (`Rango_Ingresos`),
  ADD KEY `Forma_Pago` (`Forma_Pago`);

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
-- Indices de la tabla `formas_pago`
--
ALTER TABLE `formas_pago`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `observaciones_ventas`
--
ALTER TABLE `observaciones_ventas`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Venta` (`Venta`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `rango_ingresos`
--
ALTER TABLE `rango_ingresos`
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
  ADD KEY `Rol` (`Rol`),
  ADD KEY `Banco_1` (`Banco_1`);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Afiliado` (`Afiliado`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Campana` (`Campana`);

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
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `formas_pago`
--
ALTER TABLE `formas_pago`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `observaciones_ventas`
--
ALTER TABLE `observaciones_ventas`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rango_ingresos`
--
ALTER TABLE `rango_ingresos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_camp`
--
ALTER TABLE `usuario_camp`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `u_camp_temp`
--
ALTER TABLE `u_camp_temp`
  MODIFY `Numero_Temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD CONSTRAINT `afiliados_ibfk_1` FOREIGN KEY (`Ciudad`) REFERENCES `ciudades` (`Codigo`),
  ADD CONSTRAINT `afiliados_ibfk_2` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`Codigo`),
  ADD CONSTRAINT `afiliados_ibfk_3` FOREIGN KEY (`Rango_Ingresos`) REFERENCES `rango_ingresos` (`Codigo`),
  ADD CONSTRAINT `afiliados_ibfk_4` FOREIGN KEY (`Forma_Pago`) REFERENCES `formas_pago` (`Codigo`);

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`Codigo`);

--
-- Filtros para la tabla `observaciones_ventas`
--
ALTER TABLE `observaciones_ventas`
  ADD CONSTRAINT `observaciones_ventas_ibfk_1` FOREIGN KEY (`Venta`) REFERENCES `ventas` (`Numero`),
  ADD CONSTRAINT `observaciones_ventas_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`);

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

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Campana`) REFERENCES `campanas` (`Numero`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Nit`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`Afiliado`) REFERENCES `afiliados` (`Identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
