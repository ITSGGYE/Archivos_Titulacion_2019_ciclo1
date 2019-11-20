-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2019 a las 00:36:30
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntofrio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `rol` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre`, `email`, `telefono`, `direccion`, `contrasena`, `rol`) VALUES
(1, 'Jose Peralta', 'joseperl@gmail.com', '0982758345', '10 de agosto y machala', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(7, 'Johanna Reyes Estrada', 'johannareyess@live.com', '0994860081', 'samanes 4', 'c37bf859faf392800d739a41fe5af151', 1),
(8, 'Jonathan Suarez', 'suarezjp390@gmail.com', '0989748426', 'cdla. condor', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_vehiculo`, `fecha`, `id_precio`) VALUES
(21, 1, '2019-11-12', 11),
(22, 1, '2019-11-12', 11),
(23, 2, '2019-11-14', 12),
(24, 6, '2019-11-02', 14),
(25, 7, '2019-11-06', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca1` int(11) NOT NULL,
  `idmarca` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca1`, `idmarca`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'BYD'),
(4, 'Chery'),
(5, 'Chevrolet'),
(6, 'Citroén'),
(7, 'Dodge'),
(8, 'Fiat'),
(9, 'Ford'),
(10, 'Honda'),
(11, 'Hyundai'),
(12, 'Jeep'),
(13, 'Kia'),
(14, 'KingLong'),
(15, 'Mazda'),
(16, 'MercedesBenz'),
(17, 'Mitsubishi'),
(18, 'Nissan'),
(19, 'Peugeot'),
(20, 'Renault'),
(21, 'Skoda'),
(22, 'SsangYong'),
(23, 'Toyota'),
(24, 'Volkswagen'),
(25, 'Zotye');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id_precio` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `anio` varchar(50) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `id_clientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_precio`, `descripcion`, `modelo`, `anio`, `precio`, `id_clientes`) VALUES
(1, 'CARGA DE GAS', 'TODOS LOS MODELOS', '2019-09-10', '30.56', 1),
(2, 'MEDIA CARGA DE GAS', 'TODOS LOS MODELOS', '2019-09-18', '15.90', 1),
(5, 'CAMBIO DE MANGERA', 'SEGÚN EL MODELO', '2019-11-30', '50.68', 1),
(6, 'CAMBIO RULIMAN DEL COMPRESOR', 'SEGÚN EL MODELO', '2019-11-05', '90.80', 1),
(7, 'SOLDAR COMPRESOR', 'SEGÚN EL MODELO', '2019-11-01', '70.94', 1),
(8, 'BOBINA DE COMPRESOR', 'SEGÚN EL MODELO', '2019-10-24', '70.95', 1),
(9, 'MANTENIMIENTO COMPLETO A/C', 'SEGÚN EL MODELO', '2019-10-30', '120.67', 1),
(10, 'CAMBIO DE EVAPORADOR SIN TABLERO', 'TODOS LOS MODELOS', '2019-10-31', '180.98', 1),
(11, 'CAMBIO DE EVAPORADOR CON TABLERO', 'TODOS LOS MODELOS', '2019-11-01', '260.75', 1),
(12, 'CAMBIO DE COMPRESOR SANDEM', 'TODOS LOS MODELOS', '2019-11-04', '360.69', 1),
(13, 'CAMBIO DE COMPRESOR T/M', 'TODOS LOS MODELOS', '2019-10-22', '440.82', 1),
(14, 'CAMBIO DE CONDENSADOR', 'SEGÚN EL MODELO', '2019-10-31', '100.87', 1),
(15, 'INSTALACIÓN COMPLETA DE A/C', 'TODOS LOS MODELOS', '2019-11-04', '650.75', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuestos` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `anio` varchar(150) NOT NULL,
  `cantidad` varchar(150) NOT NULL,
  `id_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_repuestos`, `nombre`, `modelo`, `anio`, `cantidad`, `id_vehiculo`) VALUES
(1, 'VALVULA', 'HYUNDAI TUCSON IX35', '2017-06-08', '4', 1),
(2, 'VALVULA ELECT', 'FORD F-150', '2018-06-15', '8', 1),
(3, 'COMPRESOR SANDEN RING', 'GENERICO', '2017-07-05', '8', 0),
(4, 'COMPRESOR STD', 'NEVADA/ASIA', '2018-09-10', '2', 0),
(5, 'LATA DE GAS ', 'UISZL', '2019-09-03', '11', 0),
(6, 'CILINDRO DE GAS', 'GENERICO', '2019-08-22', '6', 0),
(7, 'EVAPORADOR', 'DODGE CALIBER', '2019-08-08', '5', 0),
(8, 'EVAPORADOR', 'MAZDA 3', '2019-09-16', '2', 0),
(9, 'MANGERA STD #10 (1/2 )', 'PARKER USA', '2019-10-28', '10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(150) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `color` varchar(150) NOT NULL,
  `motor` varchar(150) NOT NULL,
  `anio` varchar(150) NOT NULL,
  `propietario` varchar(150) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `idmarca1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `placa`, `marca`, `modelo`, `color`, `motor`, `anio`, `propietario`, `id_clientes`, `idmarca1`) VALUES
(1, 'ABC-0113', 'Audi', 'A1', 'AZUL', 'MR-34', '2019-09-10', 'JOSE PERALTA', 1, 1),
(2, 'GSB-3435', 'TOYOTA', 'A5', 'ROJO', 'VZ-100', '2019-10-10', '', 7, 1),
(6, 'GBF-2343', 'FORD', 'A3', 'VERDE', 'V-515', '2019-11-30', '', 1, 1),
(7, 'gsu2300', '1', 'A6', 'azul mar', 'v51ks', '2019-11-16', '', 7, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auto` (`id_vehiculo`),
  ADD KEY `id_precio` (`id_precio`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca1`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_precio`),
  ADD KEY `id_clientes` (`id_clientes`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuestos`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_clientes` (`id_clientes`),
  ADD KEY `idmarca1` (`idmarca1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id_repuestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_precio`) REFERENCES `precio` (`id_precio`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `precio_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`idmarca1`) REFERENCES `marca` (`idmarca1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
