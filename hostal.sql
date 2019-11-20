-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2019 a las 14:37:14
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hostal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numero` int(12) NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `aprobación` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitación`
--

CREATE TABLE `habitación` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `juegos_cama` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lugar` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_habitaciones`
--

CREATE TABLE `libro_habitaciones` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `fnombre` int(11) NOT NULL,
  `lnombre` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `nacionalidad` int(11) NOT NULL,
  `pais` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `thabitacion` int(11) NOT NULL,
  `tipo_cama` int(11) NOT NULL,
  `comida` int(11) NOT NULL,
  `fecha_inicio` int(11) NOT NULL,
  `fecha_fin` int(11) NOT NULL,
  `no_dias` int(11) NOT NULL,
  `habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo_registro_boletín`
--

CREATE TABLE `nuevo_registro_boletín` (
  `id` int(10) NOT NULL,
  `nombre` varchar(52) COLLATE utf8mb4_spanish_ci NOT NULL,
  `objeto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nuevo` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fmonbre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lnombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tcuarto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tcama` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ncuarto` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` double(8,2) NOT NULL,
  `estado_precio` double(8,2) NOT NULL,
  `precio_fin` double(8,2) NOT NULL,
  `tipo_habitacion` int(11) NOT NULL,
  `fact` double(8,2) NOT NULL,
  `no_días` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(10) NOT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitación`
--
ALTER TABLE `habitación`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro_habitaciones`
--
ALTER TABLE `libro_habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitacion` (`habitacion`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nuevo_registro_boletín`
--
ALTER TABLE `nuevo_registro_boletín`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_habitacion` (`tipo_habitacion`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `habitación`
--
ALTER TABLE `habitación`
  ADD CONSTRAINT `habitación_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pago` (`tipo_habitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro_habitaciones`
--
ALTER TABLE `libro_habitaciones`
  ADD CONSTRAINT `libro_habitaciones_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_habitaciones_ibfk_2` FOREIGN KEY (`habitacion`) REFERENCES `nuevo_registro_boletín` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`tipo_habitacion`) REFERENCES `habitación` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
