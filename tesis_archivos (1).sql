-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2019 a las 21:12:20
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis_archivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asunto` text DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `identificador` timestamp NULL DEFAULT NULL,
  `iddocente` int(11) DEFAULT NULL,
  `de` varchar(50) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `archivo` text NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `asunto`, `mensaje`, `fecha`, `identificador`, `iddocente`, `de`, `ruta`, `eliminado`, `archivo`, `tipo`) VALUES
(51, 'Pupos', '', '2019-11-08', '2019-11-09 03:50:12', 29, 'ALEJANDRO', '1573249894IMG-20191106-WA0048.jpg', 0, 'IMG-20191106-WA0048.jpg', 'image/jpeg'),
(50, '', '', '0000-00-00', '2019-11-09 03:50:29', 30, 'ALDAZ', '1573249847IMG-20191108-WA0001.jpg', 0, 'IMG-20191108-WA0001.jpg', 'image/jpeg'),
(48, 'ejjeje', 'que tal', '2019-11-01', '2019-11-08 05:06:10', 20, 'ADMIN', '1573168023tesisultima.docx', 0, 'tesis ultima.docx', ''),
(49, '', '', '0000-00-00', '2019-11-09 03:50:05', 0, 'ALDAZ', '1573249827IMG-20191108-WA0001.jpg', 0, 'IMG-20191108-WA0001.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `clave` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `administrador` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombres`, `cedula`, `celular`, `carrera`, `usuario`, `clave`, `estado`, `administrador`) VALUES
(18, 'ADMIN', '', '', 'administracion', 'ADMIN', '73acd9a5972130b75066c82595a1fae3', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
