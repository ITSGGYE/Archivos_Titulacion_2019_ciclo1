-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 21:52:40
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iglesiasanjeronimo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupospatorales`
--

CREATE TABLE `grupospatorales` (
  `idGrupo_pastoral` int(11) NOT NULL,
  `nombresGrupo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupospatorales`
--

INSERT INTO `grupospatorales` (`idGrupo_pastoral`, `nombresGrupo`) VALUES
(1, 'JUAN XXIII'),
(2, 'CATEQUISTA'),
(3, 'CORO'),
(4, 'LEGION DE MARIA'),
(5, 'MONAGUILLOS'),
(6, 'UNER'),
(7, 'RENOVACION CARISMATICA'),
(8, 'APOSTOLADO DE LA SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcuras`
--

CREATE TABLE `historialcuras` (
  `cura_id` int(11) NOT NULL,
  `cura_cedula` varchar(10) NOT NULL,
  `cura_nombres` varchar(50) NOT NULL,
  `cura_fecha_nac` date NOT NULL,
  `cura_usuario` varchar(20) NOT NULL,
  `cura_fecha_registro` date NOT NULL,
  `cura_fecha_inicio` date NOT NULL,
  `cura_fecha_fin` date NOT NULL,
  `cura_fecha_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historialcuras`
--

INSERT INTO `historialcuras` (`cura_id`, `cura_cedula`, `cura_nombres`, `cura_fecha_nac`, `cura_usuario`, `cura_fecha_registro`, `cura_fecha_inicio`, `cura_fecha_fin`, `cura_fecha_modificacion`) VALUES
(5, '0985526442', 'Elieser Perez', '1932-01-12', 'isragg', '2019-10-28', '0000-00-00', '0000-00-00', '0000-00-00'),
(6, '0931048309', 'Antonio Rioja', '1970-03-23', 'isragg', '2019-10-28', '0000-00-00', '0000-00-00', '0000-00-00'),
(7, '0923514896', 'Gustavo Coello Daza', '1935-02-02', 'gbone', '2019-11-06', '1990-05-01', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iglesia`
--

CREATE TABLE `iglesia` (
  `igle_codigo` int(11) NOT NULL,
  `igle_nombre` varchar(80) DEFAULT NULL,
  `igle_direccion` varchar(100) DEFAULT NULL,
  `igle_cura` int(11) NOT NULL,
  `igle_usuario` varchar(20) NOT NULL,
  `igle_fechaModificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iglesia`
--

INSERT INTO `iglesia` (`igle_codigo`, `igle_nombre`, `igle_direccion`, `igle_cura`, `igle_usuario`, `igle_fechaModificacion`) VALUES
(1, 'IGLESIA SAN JERÃ“NIMO DE CHONGÃ“N', 'CHONGON', 7, 'gbone16', '2019-11-06 17:38:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_grupo`
--

CREATE TABLE `listado_grupo` (
  `idseq_Contenedor` int(11) NOT NULL,
  `idGrupo_pastoral` int(11) DEFAULT NULL,
  `RolIntegrante` varchar(25) DEFAULT NULL,
  `nombresIntegrante` varchar(40) DEFAULT NULL,
  `EdadIntegrante` date DEFAULT NULL,
  `DireccionIntegrante` varchar(150) DEFAULT NULL,
  `TelefonoIntegrante` varchar(10) DEFAULT NULL,
  `CorreoIntegrante` varchar(40) DEFAULT NULL,
  `nombresPadreFamilia` varchar(40) DEFAULT NULL,
  `telefonoPadreFamilia` varchar(10) DEFAULT NULL,
  `nombresMadreFamilia` varchar(40) DEFAULT NULL,
  `telefonoMadreFamilia` varchar(10) DEFAULT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listado_grupo`
--

INSERT INTO `listado_grupo` (`idseq_Contenedor`, `idGrupo_pastoral`, `RolIntegrante`, `nombresIntegrante`, `EdadIntegrante`, `DireccionIntegrante`, `TelefonoIntegrante`, `CorreoIntegrante`, `nombresPadreFamilia`, `telefonoPadreFamilia`, `nombresMadreFamilia`, `telefonoMadreFamilia`, `usuario`, `fechaRegistro`) VALUES
(1, 1, 'Integrante', 'MARIANA ANDREA AVILA COELLO', '1995-03-23', 'FLORESTA  1 MZ 25 V1', '2415648', 'mariana@gmail.com', 'elisabeth', '', '', '', 'isragg', '2019-10-28 18:33:37'),
(2, 2, 'coordinador', 'ISRAEL GONZALEZ', '1994-03-22', 'Duran ', '2415648', 'israel@gmail.com', '', '', '', '', 'gbone16', '2019-11-10 16:09:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `par_sacramento` int(1) NOT NULL,
  `par_cedula` varchar(10) NOT NULL,
  `par_tipo_persona` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`par_sacramento`, `par_cedula`, `par_tipo_persona`) VALUES
(1, '0910000000', 'P'),
(1, '0920000000', 'P'),
(1, '0930000000', 'S'),
(2, '0940000000', 'P'),
(2, '0950000000', 'P'),
(2, '0960000000', 'S'),
(3, '0970000000', 'P'),
(3, '0980000000', 'P'),
(3, '0990000000', 'S'),
(4, '0991000000', 'P'),
(4, '0991100000', 'P'),
(4, '0991200000', 'S'),
(5, '0991300000', 'P'),
(5, '0991400000', 'P'),
(5, '0991500000', 'S'),
(6, '0991600000', 'P'),
(6, '0991700000', 'P'),
(6, '0991800000', 'S'),
(7, '0991900000', 'P'),
(7, '0992000000', 'P'),
(7, '0992100000', 'S'),
(8, '0992200000', 'P'),
(8, '0992300000', 'P'),
(8, '0992400000', 'S'),
(9, '0992500000', 'P'),
(9, '0992600000', 'P'),
(9, '0992700000', 'S'),
(10, '0992800000', 'P'),
(10, '0992900000', 'P'),
(10, '0993000000', 'S'),
(11, '0911849494', 'T'),
(11, '0904237021', 'T'),
(11, '0912707031', 'S'),
(11, '0916799018', 'S'),
(12, '0915042873', 'S'),
(12, '0916591233', 'S'),
(12, '0908406143', 'T'),
(12, '0906374749', 'T'),
(13, '0993200000', 'S'),
(13, '0993300000', 'S'),
(13, '0993100000', 'T'),
(13, '0905840781', 'T'),
(14, '0993400000', 'P'),
(14, '', 'P'),
(14, '0993500000', 'S'),
(15, '1202309017', 'T'),
(15, '0908051659', 'T'),
(15, '0993600000', 'S'),
(15, '0993700000', 'S'),
(16, '0916752579', 'P'),
(16, '0985477892', 'P'),
(16, '0958474145', 'S'),
(17, '0923337775', 'P'),
(17, '0923247128', 'P'),
(17, '0991212306', 'S'),
(18, '0905041218', 'P'),
(18, '0916452769', 'P'),
(18, '0986234715', 'S'),
(19, '0912030548', 'P'),
(19, '0935110387', 'P'),
(19, '0986302323', 'S'),
(20, '0931048300', 'P'),
(20, '0902506047', 'P'),
(20, '0906064120', 'S'),
(21, '0923301548', 'P'),
(21, '0983061515', 'P'),
(21, '0948471565', 'S'),
(22, '0952571456', 'P'),
(22, '0914171526', 'P'),
(22, '0969641565', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `per_cedula` varchar(10) NOT NULL,
  `per_nombre` varchar(100) NOT NULL,
  `per_direccion` varchar(100) NOT NULL,
  `per_fecha_nac` date NOT NULL,
  `per_lugarNacimiento` varchar(35) NOT NULL,
  `per_correo` varchar(80) NOT NULL,
  `per_telefono` varchar(10) NOT NULL,
  `per_nombresMadre` varchar(35) NOT NULL,
  `per_nombresPadre` varchar(35) NOT NULL,
  `per_observacion` varchar(800) NOT NULL,
  `per_usuario` varchar(20) NOT NULL,
  `per_fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`per_cedula`, `per_nombre`, `per_direccion`, `per_fecha_nac`, `per_lugarNacimiento`, `per_correo`, `per_telefono`, `per_nombresMadre`, `per_nombresPadre`, `per_observacion`, `per_usuario`, `per_fechaRegistro`) VALUES
('0902506047', 'Graciela Campuzano', '', '0000-00-00', '', 'graciela@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:56:03'),
('0904237021', 'Eloy Francisco Mite De la Torre', '', '0000-00-00', '', 'eloy@gmail.com', '', '', '', '', 'gbone', '2019-11-06 16:04:19'),
('0905041218', 'Maricela Hernandez', '', '0000-00-00', '', 'mari@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:42:34'),
('0905840781', 'Walter Jimenez', '', '0000-00-00', '', 'walter@gmail.com', '', '', '', '', 'gbone16', '2019-11-10 14:44:40'),
('0906064120', 'Joao Villacis Gonzalez', 'Los Esteros', '2003-12-30', 'Guayaquil', 'jorla@gmail.com', '', 'Viviana Gonzalez', 'David Villacis', '', 'gbone16', '2019-11-12 10:56:03'),
('0906374749', 'Maximiliano Mariano Reyes Belayo', '', '0000-00-00', '', 'maxireyes@gmail.com', '', '', '', '', 'gbone16', '2019-11-06 17:39:17'),
('0908051659', 'Jorge Anchundia', '', '0000-00-00', '', 'jorge19@gmail.com', '', '', '', '', 'gbone16', '2019-11-10 15:15:23'),
('0908406143', 'Jacinto Gillermo Ortega', '', '0000-00-00', '', 'jacinto_gille@gmail.com', '', '', '', '', 'gbone16', '2019-11-06 17:39:17'),
('0910000000', 'Armando Italo Coronel', '', '0000-00-00', '', 'armando@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 15:58:57'),
('0911849494', 'Hector Enrique Preciado', '', '0000-00-00', '', 'enrique@gmail.com', '', '', '', '', 'gbone', '2019-11-06 16:03:32'),
('0912030548', 'Carlos Veliz', '', '0000-00-00', '', 'carfull@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:47:42'),
('0912707031', 'Mario Antonio Zambrano Ronquillo', 'Chongon', '1972-06-27', 'Bahia de caraques', 'Mario@gmail.com', '', 'Delcita Armida Ronquillo', 'Jose Antonio Zambrano Zambrano', '', 'gbone', '2019-11-06 15:17:44'),
('0914171526', 'Silvia Sornoza', '', '0000-00-00', '', 'sornoza@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 11:54:43'),
('0915042873', 'Agustin Patricio Merejildo Reyes', 'ChongÃ³n', '1972-08-20', 'Guayaquil', 'agustinmere@gmail.com', '', '', '', '', 'gbone16', '2019-11-06 17:39:17'),
('0916452769', 'Daniel Gonzalez', '', '0000-00-00', '', 'gonza@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:42:34'),
('0916591233', 'Ana Teodora Banchon Bohorquez', 'El morro villamil', '1979-07-26', 'Guayaquil', 'anateodara@gmail.com', '', '', '', '', 'gbone16', '2019-11-06 17:39:17'),
('0916752579', 'Jaqueline Gonzalez', '', '0000-00-00', '', 'jaquel@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:30:33'),
('0916799018', 'Angela Yanet Salazar Mite', 'Chongon', '1977-08-01', 'Guayaquil', 'angela@gmail.com', '', 'Rosa Angeliza Mite de la Torre', 'Vicente Israel Salazar Martinez', '', 'gbone16', '2019-11-10 14:30:46'),
('0920000000', 'Emperatriz Coronel', '', '0000-00-00', '', 'emperatriz@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 00:43:36'),
('0923247128', 'Maura Lainez', '', '0000-00-00', '', 'lainez@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:36:16'),
('0923301548', 'Vicente Arroyo', '', '0000-00-00', '', 'vicente@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 11:48:59'),
('0923337775', 'Eduardo Cirino ', '', '0000-00-00', '', 'edu@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:36:16'),
('0930000000', 'Ana Laura Coronel Martinez', 'ChongÃ³n', '1994-09-30', 'Guayaquil', 'analau@hotmail.com', '', 'Ana Martinez Martillo', 'Eduardo Coronel Cirino', '', 'gbone16', '2019-11-10 14:26:00'),
('0931048300', 'Israel Gonzalez', '', '0000-00-00', '', 'isra@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:56:03'),
('0935110387', 'Nora Gonzalez', '', '0000-00-00', '', 'norita@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:47:42'),
('0940000000', 'Vicente Avelino ', '', '0000-00-00', '', 'ave@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 00:56:30'),
('0948471565', 'Jefferson Vicente Parrales', 'ChongÃ³n', '1989-10-18', 'Guayaquil', 'jeff@gmail.com', '', 'Silvia Sirina', 'Vicente Parrales', '', 'gbone16', '2019-11-12 11:48:59'),
('0950000000', 'Tionilda Orrala', '', '0000-00-00', '', 'tionil@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 00:56:30'),
('0952571456', 'EfrÃ©n Parrales', '', '0000-00-00', '', 'efrÃ©n@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 11:54:43'),
('0958474145', 'Brithany Cecibel Lozano Gonzalez', 'ChongÃ³n', '2008-05-08', 'Guayaquil', 'cecibel@gmail.com', '', 'Maria Gonzalez', 'Cesar Lozano', '', 'gbone16', '2019-11-12 10:30:33'),
('0960000000', 'Paola Kimberly Sabino Mite', 'ChongÃ³n', '1995-06-29', 'Bolivar', 'pao@hotmail.com', '', 'Francisca Mite Avelino', 'Ponce Sabino Orrala', '', 'gbone', '2019-11-06 00:56:30'),
('0969641565', 'Alberto Medina Cirino', 'ChongÃ³n', '1990-05-15', 'Guayaquil', 'albert@gmail.com', '', 'Elizabeth Baidal', '', '', 'gbone16', '2019-11-12 11:54:43'),
('0970000000', 'Willian Ladinez Mendoza', '', '0000-00-00', '', 'willian@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:02:56'),
('0980000000', 'Marlene Ramirez', '', '0000-00-00', '', 'marlene@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:02:56'),
('0983061515', 'Miriam Yagual', '', '0000-00-00', '', 'miriam@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 11:48:59'),
('0985477892', 'Julio Yagual ', '', '0000-00-00', '', 'julito@gmail.com', '', '', '', '', 'gbone16', '2019-11-12 10:30:33'),
('0986234715', 'Gissela Lisbeth Bone Hernandez', 'ChongÃ³n', '1999-09-19', 'Balzar', 'gbone@gmail.com', '', '', 'Felipe Bone', '', 'gbone16', '2019-11-12 10:42:34'),
('0986302323', 'Erick Aldair Villacis Gonzalez', 'Los Esteros ', '1998-03-15', 'Guayaquil', 'villacis@gmail.com', '', 'Viviana Gonzalez', 'David Villacis ', '', 'gbone16', '2019-11-12 10:47:42'),
('0990000000', 'Myrian Violeta Preciado Martinez', 'ChongÃ³n', '1995-01-05', 'Guayaquil', 'myrian@hotmail.com', '', 'Violeta Martinez Ramirez', 'Julio Preciado ', '', 'gbone', '2019-11-06 01:02:56'),
('0991000000', 'Amelia Vernita Arana', '', '0000-00-00', '', 'ame@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:07:06'),
('0991100000', 'Martha Navas', '', '0000-00-00', '', 'navas@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:07:06'),
('0991200000', 'Roberto Vernita', 'ChongÃ³n', '1992-07-17', 'Ximena', 'robert@hotmail.com', '', 'Vicenta Vermita Arana', '', '', 'gbone', '2019-11-06 01:07:06'),
('0991212306', 'Johanna Zulay Cirino Coronel', 'ChongÃ³n', '1990-06-15', 'ChongÃ³n', 'zulay@gmail.com', '', 'Sonia Coronel', 'Walter Cirino', '', 'gbone16', '2019-11-12 10:36:16'),
('0991300000', 'Guillermo Chavez', '', '0000-00-00', '', 'guillermo@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:12:41'),
('0991400000', 'Araceli Macias', '', '0000-00-00', '', 'araceli@homail.com', '', '', '', '', 'gbone', '2019-11-06 01:12:41'),
('0991500000', 'Janina Johana Molina Rodriguez', 'ChongÃ³n', '1995-09-26', 'Guayaquil', 'janina@hotmail.com', '', 'Betsy Rodriguez Maquillon', 'Richard Molina Romero', '', 'gbone', '2019-11-06 01:12:41'),
('0991600000', 'Jose Wilfrido MuÃ±oz', '', '0000-00-00', '', 'jose@hormail.com', '', '', '', '', 'gbone', '2019-11-06 01:38:01'),
('0991700000', 'Ana LÃ³pez QuimÃ­', '', '0000-00-00', '', 'analo@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:38:01'),
('0991800000', 'Genesis Andrea LÃ³pez Mero', 'ChongÃ³n', '1995-10-26', 'Guayaquil', 'gene@hotmail.com', '', 'Cielo Mero Meza', 'Hector LÃ³pez QuimÃ­', '', 'gbone', '2019-11-06 01:38:01'),
('0991900000', 'Dagorberto Macias', '', '0000-00-00', '', 'dago@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:45:41'),
('0992000000', 'Detrina Quinde', '', '0000-00-00', '', 'detrin@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:45:41'),
('0992100000', 'Michael Rafael Quinde Montalvan', 'ChongÃ³n ', '1990-08-08', 'Guayaquil', 'quinde@hotmail.com', '', 'Petita MontalvÃ¡n ', 'Rosalino Rafael Quinde', '', 'gbone', '2019-11-06 01:45:41'),
('0992200000', 'Victor Preciado', '', '0000-00-00', '', 'victor@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:52:58'),
('0992300000', 'Ana Preciado', '', '0000-00-00', '', 'anapreciado@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:52:58'),
('0992400000', 'Tania Felicita Preciado Torres', 'ChongÃ³n ', '1987-05-19', 'Guayaquil', 'tania@hotmail.com', '', 'Colombia Torres Ramirez', 'Felix Preciado', '', 'gbone', '2019-11-06 01:52:58'),
('0992500000', 'Carlos Ortega', '', '0000-00-00', '', 'carlo@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 01:59:43'),
('0992600000', 'Celia Cirino', '', '0000-00-00', '', 'celia@hotmial.com', '', '', '', '', 'gbone', '2019-11-06 01:59:43'),
('0992700000', 'Marcia Liliana Lucin Cirino', 'ChongÃ³n ', '1989-01-09', 'ChongÃ³n', 'mar@hotmail.com', '', 'Eusebia Priscila Cirino', 'Wellington Lucin Yagual', '', 'gbone', '2019-11-06 01:59:43'),
('0992800000', 'Elias Guerrero', '', '0000-00-00', '', 'elia@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 02:05:39'),
('0992900000', 'Janette Torres', '', '0000-00-00', '', 'janet@hotmail.com', '', '', '', '', 'gbone', '2019-11-06 02:05:39'),
('0993000000', 'Bayron JosÃ© Cruz Holguin', 'ChongÃ³n', '1995-01-26', 'Daule', 'bayron@hotmail.com', '', 'Rosa Maria Holguin', 'JosÃ© Digario Cruz ', '', 'gbone', '2019-11-06 02:05:39'),
('0993100000', 'Glenda ObregÃ³n', '', '0000-00-00', '', 'glenda@gmail.com', '', '', '', '', 'gbone16', '2019-11-10 14:44:40'),
('0993200000', 'Pedro Pascario Paredes Lara ', 'ChongÃ³n', '1951-02-22', 'Daule', 'pedro@gmail.com', '', 'Clemencia Lara', 'Felix Paredes ', '', 'gbone16', '2019-11-10 14:44:40'),
('0993300000', 'Angela Maritza Zambrano Vera', 'ChongÃ³n', '1948-04-18', 'Santa Ana', 'angelita@gmail.com', '', 'Maria Vera ', 'Adolfo Zambrano ', '', 'gbone16', '2019-11-10 14:44:40'),
('0993400000', 'Jose Gallardo', '', '0000-00-00', '', 'jose@gmail.com', '', '', '', '', 'gbone16', '2019-11-10 15:07:13'),
('0993500000', 'Carlos Roscano Rizzo Lizardo', 'ChongÃ³n', '1980-11-05', 'Guayaquil', 'carlitos@gmail.com', '', 'Isabel Lizardo Loor', 'Juan Rizzo Serrano', '', 'gbone16', '2019-11-10 15:07:13'),
('0993600000', 'Jose Reinaldo Alvarado Zapata ', 'ChongÃ³n ', '1969-01-06', 'Vinces ', 'jose14@gmail.com', '', 'Tomasa Zapata ', 'Fausto Alvarado ', '', 'gbone16', '2019-11-10 15:15:23'),
('0993700000', 'Jacinta Del Pilar Urbina Bum', 'ChongÃ³n', '1972-02-14', 'Naranjal ', 'urbina12@gmail.com', '', 'Victoria Bum', 'Marcelino Urbina ', '', 'gbone16', '2019-11-10 15:15:23'),
('1202309017', 'Gloria Espinoza Mosquera ', '', '0000-00-00', '', 'gloria@gmail.com', '', '', '', '', 'gbone16', '2019-11-10 15:15:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` varchar(30) DEFAULT NULL,
  `rol_estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_descripcion`, `rol_estado`) VALUES
(1, 'administrador', 'A'),
(2, 'secretario', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sacramentos`
--

CREATE TABLE `sacramentos` (
  `sac_codigo` int(11) NOT NULL,
  `sac_tipo` int(1) NOT NULL,
  `sac_fecha` date NOT NULL,
  `sac_cura` int(11) DEFAULT NULL,
  `sac_iglesia` int(11) NOT NULL,
  `sac_tomo` int(11) NOT NULL,
  `sac_pagina` int(11) NOT NULL,
  `sac_acta` int(11) NOT NULL,
  `sac_usuario` varchar(11) NOT NULL,
  `sac_fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sacramentos`
--

INSERT INTO `sacramentos` (`sac_codigo`, `sac_tipo`, `sac_fecha`, `sac_cura`, `sac_iglesia`, `sac_tomo`, `sac_pagina`, `sac_acta`, `sac_usuario`, `sac_fechaRegistro`) VALUES
(1, 1, '1995-09-29', 5, 1, 22, 178, 8676, 'gbone', '2019-11-06 00:43:36'),
(2, 1, '1995-09-29', 5, 1, 17, 6, 4990, 'gbone', '2019-11-06 00:56:30'),
(3, 1, '1995-09-29', 5, 1, 10, 73, 3843, 'gbone', '2019-11-06 01:02:56'),
(4, 1, '1995-09-29', 5, 1, 152, 77, 1527, 'gbone', '2019-11-06 01:07:06'),
(5, 1, '1995-09-29', 5, 1, 8, 209, 3158, 'gbone', '2019-11-06 01:12:41'),
(6, 1, '1995-09-29', 5, 1, 24, 347, 3067, 'gbone', '2019-11-06 01:38:01'),
(7, 1, '1995-09-29', 5, 1, 41, 38, 4138, 'gbone', '2019-11-06 01:45:41'),
(8, 1, '1995-09-29', 5, 1, 11, 229, 4226, 'gbone', '2019-11-06 01:52:58'),
(9, 1, '1995-09-29', 5, 1, 1, 81, 21, 'gbone', '2019-11-06 01:59:43'),
(10, 1, '1995-09-29', 5, 1, 2, 17, 111, 'gbone', '2019-11-06 02:05:39'),
(11, 4, '1993-07-31', 7, 1, 1, 4, 4, 'gbone', '2019-11-06 15:17:44'),
(12, 4, '1994-07-30', 7, 1, 1, 17, 17, 'gbone16', '2019-11-06 17:39:17'),
(13, 4, '1996-09-02', 5, 1, 0, 0, 0, 'gbone16', '2019-11-10 14:44:40'),
(14, 1, '1990-12-25', 5, 1, 0, 0, 0, 'gbone16', '2019-11-10 15:07:13'),
(15, 4, '1996-09-09', 5, 1, 0, 0, 0, 'gbone16', '2019-11-10 15:15:23'),
(16, 3, '2011-04-04', 6, 1, 2, 63, 148, 'gbone16', '2019-11-12 10:30:33'),
(17, 1, '1990-06-30', 5, 1, 1, 69, 69, 'gbone16', '2019-11-12 10:36:16'),
(18, 3, '2018-01-12', 6, 1, 3, 25, 56, 'gbone16', '2019-11-12 10:42:34'),
(19, 2, '2018-01-05', 6, 1, 3, 128, 23, 'gbone16', '2019-11-12 10:47:42'),
(20, 2, '2017-10-28', 6, 1, 2, 130, 25, 'gbone16', '2019-11-12 10:56:03'),
(21, 1, '1990-06-30', 5, 1, 3, 230, 1426, 'gbone16', '2019-11-12 11:48:59'),
(22, 1, '1990-06-30', 5, 1, 18, 257, 7465, 'gbone16', '2019-11-12 11:54:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sacramentos`
--

CREATE TABLE `tipo_sacramentos` (
  `tip_codigo` int(2) NOT NULL,
  `tip_descripcion` varchar(40) DEFAULT NULL,
  `tip_estado` varchar(1) DEFAULT NULL,
  `tip_sacramentos` int(1) DEFAULT NULL,
  `tip_testigos` int(1) DEFAULT NULL,
  `tip_padrinos` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_sacramentos`
--

INSERT INTO `tipo_sacramentos` (`tip_codigo`, `tip_descripcion`, `tip_estado`, `tip_sacramentos`, `tip_testigos`, `tip_padrinos`) VALUES
(1, 'BAUTISMO', 'A', 1, 0, 2),
(2, 'PRIMERA COMUNION', 'A', 2, 0, 2),
(3, 'CONFIRMACION', 'A', 3, 0, 2),
(4, 'MATRIMONIO', 'A', 4, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosig`
--

CREATE TABLE `usuariosig` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariosig`
--

INSERT INTO `usuariosig` (`idusuario`, `usuario`, `password`, `rol_id`) VALUES
(1, 'isragg', '0985526444gg', 2),
(2, 'gbone16', '123456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupospatorales`
--
ALTER TABLE `grupospatorales`
  ADD PRIMARY KEY (`idGrupo_pastoral`);

--
-- Indices de la tabla `historialcuras`
--
ALTER TABLE `historialcuras`
  ADD PRIMARY KEY (`cura_id`);

--
-- Indices de la tabla `iglesia`
--
ALTER TABLE `iglesia`
  ADD KEY `igle_cura` (`igle_cura`) USING BTREE;

--
-- Indices de la tabla `listado_grupo`
--
ALTER TABLE `listado_grupo`
  ADD PRIMARY KEY (`idseq_Contenedor`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`per_cedula`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `sacramentos`
--
ALTER TABLE `sacramentos`
  ADD PRIMARY KEY (`sac_codigo`);

--
-- Indices de la tabla `tipo_sacramentos`
--
ALTER TABLE `tipo_sacramentos`
  ADD PRIMARY KEY (`tip_codigo`);

--
-- Indices de la tabla `usuariosig`
--
ALTER TABLE `usuariosig`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historialcuras`
--
ALTER TABLE `historialcuras`
  MODIFY `cura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `listado_grupo`
--
ALTER TABLE `listado_grupo`
  MODIFY `idseq_Contenedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sacramentos`
--
ALTER TABLE `sacramentos`
  MODIFY `sac_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tipo_sacramentos`
--
ALTER TABLE `tipo_sacramentos`
  MODIFY `tip_codigo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuariosig`
--
ALTER TABLE `usuariosig`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
