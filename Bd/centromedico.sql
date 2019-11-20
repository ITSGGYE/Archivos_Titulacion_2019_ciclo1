-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2019 a las 00:13:52
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centromedico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL,
  `citfecha` date NOT NULL,
  `cithora` time NOT NULL,
  `citPaciente` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `citMedico` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `citestado` enum('Asignado','atendido','Pendiente') COLLATE utf8_spanish_ci NOT NULL,
  `citobservaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idcita`, `citfecha`, `cithora`, `citPaciente`, `citMedico`, `citestado`, `citobservaciones`) VALUES
(4, '2019-11-15', '13:45:00', 'Camila Laura Caceres lopez', 'Andrea Alavarado', 'Asignado', 'Que tal esta mal'),
(5, '2019-11-13', '11:45:00', 'Camila Laura Caceres lopez', 'Mayra Cervantes', 'Asignado', 'esta bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL,
  `medidentificacion` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `mednombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medapellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medtelefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `medcorreo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`idMedico`, `medidentificacion`, `mednombres`, `medapellidos`, `medtelefono`, `medcorreo`) VALUES
(27, '0985342589', 'Andrea', 'Alavarado', '0923454678', 'Andralva@gmail.com'),
(29, '0945263213', 'Mayra', 'Cervantes', '1234567890', 'cralabas@gmail.com'),
(30, '0956350649', 'Janina', 'Del Valle', '1234567890', 'cralabas@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL,
  `pacIdentificacion` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `pacNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pacApellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pacFechaNacimiento` date NOT NULL,
  `pacSexo` enum('Femenino','Masculino') COLLATE utf8_spanish_ci NOT NULL,
  `npadre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nfechaNacimiento` date NOT NULL,
  `nsexo` enum('Soltero','Casado','Divorsiado','Union Libre') COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `trabajo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `anpadre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `anfechaNacimiento` date NOT NULL,
  `ansexo` enum('Soltera','Casada','Divorsiada','Union Libre') COLLATE utf8_spanish_ci NOT NULL,
  `adireccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `atelefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `atrabajo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `acargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `escuela` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `habitos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `profesor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `academico` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `pacIdentificacion`, `pacNombre`, `pacApellidos`, `pacFechaNacimiento`, `pacSexo`, `npadre`, `nfechaNacimiento`, `nsexo`, `direccion`, `telefono`, `trabajo`, `cargo`, `anpadre`, `anfechaNacimiento`, `ansexo`, `adireccion`, `atelefono`, `atrabajo`, `acargo`, `escuela`, `descripcion`, `habitos`, `nivel`, `profesor`, `academico`) VALUES
(3, '0907893459', 'Camila Laura', 'Caceres lopez', '2019-11-08', 'Femenino', 'Juano Lucas', '2019-11-08', 'Soltero', 'Sauces', '0987654321', 'Martha', 'profesor', 'Samantha Polo', '2019-11-09', 'Casada', 'Urdesa', '0945678432', 'pascuales', 'Administradora', 'instituto cuello', 'se mantiene grande en el sentido que puede hacer muchas cosas de que tiene mucho que decir y mantener en custodia', 'normal', 'primaria', 'carlso vorques', 'normal'),
(4, '0952627322', 'Maria', 'Carrillo', '2019-11-06', 'Femenino', 'German Romero', '2010-06-16', 'Casado', 'Gomez rendon y machala', '1234567890', 'prosperina', 'gerente', 'lucia', '2019-11-21', 'Casada', 'urdesa central', '1234567890', 'Gomez rendon', 'empresaria', 'Colegio guayaquil', 'se mantiene grande en el sentido de que tiene mucho que decir y mantener en custodia', 'no hace nada', 'primaria', 'Cinthia MuÃ±oz', 'normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Roll` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `nombres`, `apellidos`, `Roll`) VALUES
(14, 'alex', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Alex', 'Alvarado', 'admin'),
(22, 'maya', 'c560d38ae448056290da9062dd353accc4c4b321d1bac276a15751ae0ca78ffa6213246a75df24fd983e47d7dcda4ff37b79572837db385d94cb934c9d8e1e7f', 'Maya', 'Bravo', 'Medico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `cithora` (`cithora`),
  ADD KEY `idPaciente` (`citPaciente`),
  ADD KEY `idMedico` (`citMedico`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idMedico`),
  ADD UNIQUE KEY `medidentificacion` (`medidentificacion`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`),
  ADD UNIQUE KEY `pacIdentificacion` (`pacIdentificacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `pass` (`pass`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
