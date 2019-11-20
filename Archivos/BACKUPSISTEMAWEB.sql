-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2019 a las 02:38:31
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendaeventos`
--

CREATE TABLE `agendaeventos` (
  `idAgenda` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `descripcion` varchar(600) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `textColor` varchar(255) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agendaeventos`
--

INSERT INTO `agendaeventos` (`idAgenda`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`, `usuario`) VALUES
(1, 'EVENTO 1', 'EVENTO CASA ABIERTA', '#9dffce', '#FFFFFF', '2019-11-07 16:32:50', '2019-11-07 16:32:50', 'igma23'),
(3, 'TAREA 2', 'TAREA 2', '#00ff80', '#FFFFFF', '2019-11-09 16:49:57', '2019-11-09 16:49:57', 'igma23'),
(4, 'EVENTO 10', 'EVENTO 10', '#91c8ff', '#FFFFFF', '2019-11-05 17:42:02', '2019-11-05 17:42:02', 'igma23'),
(5, 'EVENTO 15', 'EVENTO 15', '#800040', '#FFFFFF', '2019-11-04 20:27:29', '2019-11-04 20:27:29', 'igma23'),
(6, 'TAREA LENGUAJE', 'TAREA LENGUAJE', '#ff80ff', '#FFFFFF', '2019-11-07 20:30:34', '2019-11-07 20:30:34', 'KerllyProfesor'),
(7, 'TAREA', 'INVESTIGACION A ESTUDIANTES', '#8080ff', '#FFFFFF', '2019-11-10 20:31:43', '2019-11-10 20:31:43', 'KerllyProfesor'),
(8, 'EVENTO 20', 'EVENTO 20', '#008080', '#FFFFFF', '2019-11-05 20:34:10', '2019-11-05 20:34:10', 'KerllyProfesor'),
(9, 'TAREA 10', 'TAREA 10', '#00ffff', '#FFFFFF', '2019-11-06 20:39:08', '2019-11-06 20:39:08', 'KerllyProfesor'),
(10, 'EVENTO 10', 'EVENTO110', '#000000', '#FFFFFF', '2019-11-01 20:45:23', '2019-11-01 20:45:23', 'KerllyProfesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_estudiante`
--

CREATE TABLE `asistencia_estudiante` (
  `id_Asistencia` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `idmateria` int(11) DEFAULT NULL,
  `idcurso` int(11) DEFAULT NULL,
  `Asistencia` varchar(8) DEFAULT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia_estudiante`
--

INSERT INTO `asistencia_estudiante` (`id_Asistencia`, `idEstudiante`, `idProfesor`, `idmateria`, `idcurso`, `Asistencia`, `fechaRegistro`) VALUES
(1, 17, 1, 1, 8, 'SI', '2019-11-10'),
(2, 32, 1, 1, 8, 'SI', '2019-11-10'),
(3, 12, 1, 1, 8, 'SI', '2019-11-10'),
(4, 19, 1, 1, 8, 'SI', '2019-11-10'),
(5, 8, 1, 1, 8, 'SI', '2019-11-10'),
(6, 10, 1, 1, 8, 'SI', '2019-11-10'),
(7, 16, 1, 1, 8, 'SI', '2019-11-10'),
(8, 7, 1, 1, 8, 'SI', '2019-11-10'),
(9, 18, 1, 1, 8, 'SI', '2019-11-10'),
(10, 31, 1, 1, 8, 'SI', '2019-11-10'),
(11, 17, 1, 1, 8, 'SI', '2019-11-13'),
(12, 32, 1, 1, 8, 'NO', '2019-11-13'),
(13, 12, 1, 1, 8, 'ATRASADO', '2019-11-13'),
(14, 19, 1, 1, 8, 'SI', '2019-11-13'),
(15, 8, 1, 1, 8, 'NO', '2019-11-13'),
(16, 10, 1, 1, 8, 'ATRASADO', '2019-11-13'),
(17, 16, 1, 1, 8, 'SI', '2019-11-13'),
(18, 7, 1, 1, 8, 'NO', '2019-11-13'),
(19, 18, 1, 1, 8, 'ATRASADO', '2019-11-13'),
(20, 31, 1, 1, 8, 'SI', '2019-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nombrecurso` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nombrecurso`) VALUES
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, '1 Bachillerato'),
(12, '2 Bachillerato'),
(13, '3 Bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombresEstudiante` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `edad` int(11) NOT NULL,
  `nombresRpte` varchar(35) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `fecharegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombresEstudiante`, `direccion`, `edad`, `nombresRpte`, `usuario`, `fecharegistro`) VALUES
(7, 'Mariana Ivanna Aviles Campos', 'Las Acacias', 12, 'Daniela Kimberly Velez Aviles', 'igma23', '2019-09-15 08:11:24'),
(8, 'Maria Ofelia Aguilar Lemos', 'Los Vergeles', 12, 'Freddy Franciso Aguilar Perez', 'igma23', '2019-09-15 08:12:55'),
(10, 'MARIANA ADELEN CALDERON ARREAGA', 'FLORESTA 3', 12, 'VALERIA ANDREA LEON ARREAGA', 'igma23', '2019-09-25 23:35:37'),
(12, 'IVAN GABRIEL MATA AVILES', 'PRADERA 1', 12, 'IVAN STALYN MATA VALENZUELA', 'igma23', '2019-10-20 15:08:22'),
(16, 'MARIANA DANIELA TORRES PEREZ', 'FLORESTA', 12, 'DANIELA PEREZ', 'igma23', '2019-10-23 23:53:30'),
(17, 'CAROLINA KERLLY VAICILLA CAMPOS', 'VERGELES', 12, 'ANDREA CAMPOS', 'igma23', '2019-10-24 16:49:20'),
(18, 'MARIELA ANDREA LEON RIVAS', 'KENNEDY', 12, 'CARLOS LEON', 'igma23', '2019-10-23 23:53:30'),
(19, 'MARIA JOSE CRUZ RODRIGUEZ', 'DURAN', 12, 'DAYANA LISBETH CRUZ RODRIGUEZ', 'kerlly', '2019-10-24 11:52:51'),
(31, 'PETER ARON SANCAN CANTOS', 'LA JOYA', 12, 'JULISSA MARIA SANCAN CANTOS', 'kerlly', '2019-10-24 12:44:52'),
(32, 'EMILY SCARLETTE', 'CDLA.GUANGALA', 12, 'SOFHIA', 'sofia', '2019-10-24 14:25:09'),
(33, 'GABRIEL FERNANDO SALCEDO LAGOS', 'SANTA MONICA', 14, 'ALFREDO EUGENIO SALCEDO CRUZ', 'kerlly', '2019-11-04 11:10:08'),
(34, 'JOSUE DIONISIO FIGUEROA GUILLEN', 'SAUCES 2', 14, 'PEDRO MATEO FIGUEROA MATA', 'kerlly', '2019-11-04 11:10:08'),
(35, 'ANDREA MELISSA PEREZ AVILA', 'DAULE', 14, 'JOSE GREGORIO MENDEZ MENDEZ', 'kerlly', '2019-11-04 22:03:30'),
(36, 'JAVIER ENRIQUE PEREZ JIMENEZ', 'FLORESTA 3', 14, 'CARLOS DIEGO PEREZ ALARCON', 'kerlly', '2019-11-04 11:22:16'),
(37, 'JUAN JOSE RODRIGUEZ CHIQUITO', 'PRADERA 1', 14, 'PEDRO CARLOS SANCAN PRIETO', 'kerlly', '2019-11-04 11:22:16'),
(38, 'JENNIFER VANESSA FLORES SANCHEZ', 'DURAN', 15, 'VANESSA DAYANA SANCHEZ MIRANDA', 'kerlly', '2019-11-04 11:22:16'),
(39, 'KEVIN ANTONIO FLORES SOSA', 'DURAN', 15, 'KERLLY FLOR SOSA RODRIGUEZ', 'kerlly', '2019-11-04 11:22:16'),
(40, 'JORGE ELIAS VELASQUEZ CRUZ', 'FLORESTA 1', 15, 'NELSON DANIEL VELASQUEZ GONZALES ', 'kerlly', '2019-11-04 11:22:16'),
(41, 'ROBERTO ISAAC BARRIENTOS DIAZ', 'SAUCES 4', 15, 'ELVIN ALBERTO BARRIENTOS ALVARADO', 'kerlly', '2019-11-04 11:22:16'),
(42, 'ALLAN ROBERTO ORDOÃ‘EZ AGUILAR', 'DAULE', 15, 'PATRICIA DANIELA HIDALGO MIRANDA', 'kerlly', '2019-11-09 23:13:03'),
(43, 'YERSON ALEXANDER ARGOTE VASQUEZ', 'DAULE', 16, 'YONY CAMILO ARGOTE BARRERA', 'kerlly', '2019-11-04 19:56:26'),
(44, 'ANNY YULIETH AUSECHA AUSECHA', 'DAULE', 16, 'VICTOR DANIEL AUSECHA GOMEZ', 'kerlly', '2019-11-04 19:56:26'),
(45, 'YONY JESUS BARRERA CALDERON', 'DAULE ', 16, 'EDWIN ANDRES  BARRERA MARTINEZ ', 'kerlly', '2019-11-04 19:56:26'),
(46, 'MAYRA ALEJANDRA CASTILLO MOTTA', 'DAULE', 16, 'ANDRES FELIPE CASTILLO VIDAL', 'kerlly', '2019-11-04 19:56:26'),
(47, 'BRYAN ERICK FRANCO JIMENEZ', 'DAULE', 16, 'DAVID ALBERTO FRANCO RAMIREZ', 'kerlly', '2019-11-04 19:56:26'),
(48, 'ANGIE FABIANA PAEZ DIAZ', 'LA GERMANIA', 17, 'JUAN CAMILO PAEZ JIMENEZ', 'kerlly', '2019-11-04 19:56:26'),
(49, 'DENIS ANDRES ALVARADO ALVARADO', 'LA GERMANIA', 17, 'INES ELENA ALVARADO ALVARADO', 'kerlly', '2019-11-04 19:56:26'),
(50, 'DAVID LUCIO CORDERO ARROBA', 'LA GERMANIA ', 17, 'EDUARDO JUAN CORDERO ORTIZ', 'kerlly', '2019-11-04 19:56:26'),
(51, 'ROSA YOLANDA FARIAS MERA', 'LA GERMANIA', 17, 'JUAN ERICK FARIAS GAIBOR', 'kerlly', '2019-11-04 19:56:26'),
(52, 'MOISES DAVID LEMA PRIETO', 'LA GERMANIA', 17, 'JOSET WILMER LEMA MIRANDA', 'kerlly', '2019-11-04 19:56:26'),
(53, 'SARA JUDITH DE LA CRUZ SORRACAS', 'LA GERMANIA', 18, 'JUNIOR MOISES DE LA CRUZ PEREZ', 'kerlly', '2019-11-04 22:04:20'),
(54, 'ANGEL LUIS RAMOS ESTRADA', 'LA GERMANIA', 18, 'PAOLA ANDREA DUVAN ESTRADA', 'kerlly', '2019-11-04 19:56:26'),
(55, 'MARGARITA CAROLINA FLORES OÃ‘ATE', 'LA GERMANIA', 18, 'PEDRO LUIS FLORES LOPEZ', 'kerlly', '2019-11-04 19:56:26'),
(56, 'JOSE ARMANDO MARTINEZ RODRIGUEZ', 'LA GERMANIA', 18, 'CHARLY DAVID MARTINEZ LEMA', 'kerlly', '2019-11-04 19:56:26'),
(57, 'ARTURO CAMILO HURTADO LOPEZ', 'LA GERMANIA', 18, 'MELECIO ANGEL HURTADO SANCAN', 'kerlly', '2019-11-04 19:56:26'),
(58, 'KERLLY DAYANA MANRIQUE JIMENEZ', 'guayaquil, tejas', 22, 'Adriana Allison Campos Mata', 'kerlly', '2019-11-09 22:10:28'),
(59, 'MARIA PATRICIA CRUZ MIRANDA', 'DAULE', 13, 'Adriana Allison miranda Mata', 'kerlly', '2019-11-13 02:39:23'),
(60, 'PEDRO LUIS CALI MONCADA', 'DAULE', 16, 'CARLOS LUIS CALI JIMENEZ', 'kerlly', '2019-11-13 02:48:32'),
(66, 'nbb b ', 'hhvv', 18, 'mmnbjb', 'kerlly', '2019-11-13 11:55:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_materia_curso`
--

CREATE TABLE `estudiante_materia_curso` (
  `idseqEstudiante_Materia` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idcurso` int(11) DEFAULT NULL,
  `idmateria` int(11) DEFAULT NULL,
  `idseq_profesor` int(11) DEFAULT NULL,
  `Nombre_usuario` varchar(20) NOT NULL,
  `fechaRegistro_Asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_materia_curso`
--

INSERT INTO `estudiante_materia_curso` (`idseqEstudiante_Materia`, `idEstudiante`, `idcurso`, `idmateria`, `idseq_profesor`, `Nombre_usuario`, `fechaRegistro_Asignacion`) VALUES
(1, 17, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(2, 32, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(3, 12, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(4, 19, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(5, 8, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(6, 10, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(7, 16, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(8, 7, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(9, 18, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(10, 31, 8, 1, 1, 'igma23', '2019-11-02 21:20:57'),
(11, 17, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(12, 32, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(13, 12, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(14, 19, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(15, 8, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(16, 10, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(17, 16, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(18, 7, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(19, 18, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(20, 31, 8, 2, 2, 'igma23', '2019-11-02 21:20:57'),
(21, 37, 9, 6, 8, 'kerlly', '2019-11-04 11:46:21'),
(22, 34, 9, 6, 8, 'kerlly', '2019-11-04 11:46:21'),
(23, 36, 9, 6, 8, 'kerlly', '2019-11-04 11:46:21'),
(24, 33, 9, 6, 8, 'kerlly', '2019-11-04 11:46:21'),
(25, 35, 9, 6, 8, 'kerlly', '2019-11-04 11:46:21'),
(26, 42, 10, 2, 2, 'kerlly', '2019-11-04 11:46:21'),
(27, 38, 10, 2, 2, 'kerlly', '2019-11-04 11:46:21'),
(28, 40, 10, 2, 2, 'kerlly', '2019-11-04 11:46:21'),
(29, 39, 10, 2, 2, 'kerlly', '2019-11-04 11:46:21'),
(30, 41, 10, 2, 2, 'kerlly', '2019-11-04 11:46:21'),
(31, 44, 11, 3, 3, 'kerlly', '2019-11-04 19:56:26'),
(32, 47, 11, 3, 3, 'kerlly', '2019-11-04 19:56:26'),
(33, 46, 11, 3, 3, 'kerlly', '2019-11-04 19:56:26'),
(34, 43, 11, 3, 3, 'kerlly', '2019-11-04 19:56:26'),
(35, 45, 11, 3, 3, 'kerlly', '2019-11-04 19:56:26'),
(36, 48, 12, 4, 4, 'kerlly', '2019-11-04 19:56:26'),
(37, 50, 12, 4, 4, 'kerlly', '2019-11-04 19:56:26'),
(38, 49, 12, 4, 4, 'kerlly', '2019-11-04 19:56:26'),
(39, 52, 12, 4, 4, 'kerlly', '2019-11-04 19:56:26'),
(40, 51, 12, 4, 4, 'kerlly', '2019-11-04 19:56:26'),
(41, 54, 13, 5, 5, 'kerlly', '2019-11-04 19:56:26'),
(42, 57, 13, 5, 5, 'kerlly', '2019-11-04 19:56:26'),
(43, 56, 13, 5, 5, 'kerlly', '2019-11-04 19:56:26'),
(44, 55, 13, 5, 5, 'kerlly', '2019-11-04 19:56:26'),
(45, 53, 13, 5, 5, 'kerlly', '2019-11-04 19:56:26'),
(46, 44, 11, 7, 6, 'kerlly', '2019-11-04 19:56:26'),
(47, 47, 11, 7, 6, 'kerlly', '2019-11-04 19:56:26'),
(48, 46, 11, 7, 6, 'kerlly', '2019-11-04 19:56:26'),
(49, 43, 11, 7, 6, 'kerlly', '2019-11-04 19:56:26'),
(50, 45, 11, 7, 6, 'kerlly', '2019-11-04 19:56:26'),
(51, 48, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(52, 50, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(53, 49, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(54, 49, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(55, 52, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(56, 51, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(57, 51, 12, 2, 7, 'kerlly', '2019-11-04 19:56:26'),
(58, 54, 13, 3, 9, 'kerlly', '2019-11-04 19:56:26'),
(59, 57, 13, 3, 9, 'kerlly', '2019-11-04 19:56:26'),
(60, 56, 13, 3, 9, 'kerlly', '2019-11-04 19:56:26'),
(61, 55, 13, 3, 9, 'kerlly', '2019-11-04 19:56:26'),
(62, 53, 13, 3, 9, 'kerlly', '2019-11-04 19:56:26'),
(63, 17, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(64, 32, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(65, 12, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(66, 19, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(67, 8, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(68, 10, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(69, 16, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(70, 7, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(71, 18, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(72, 31, 8, 7, 10, 'kerlly', '2019-11-04 19:56:26'),
(73, 58, 13, 3, 9, 'kerlly', '2019-11-09 22:10:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `nombremateria` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idmateria`, `nombremateria`) VALUES
(1, 'Lenguaje'),
(2, 'Matematica'),
(3, 'Ingles'),
(4, 'Dibujo'),
(5, 'Educacion Fisica'),
(6, 'Sociales'),
(7, 'Computacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelocalificacion`
--

CREATE TABLE `modelocalificacion` (
  `idseq_calif` int(11) NOT NULL,
  `idcurso` int(11) DEFAULT NULL,
  `idmateria` int(11) DEFAULT NULL,
  `idseq_profesor` int(11) DEFAULT NULL,
  `idPeriodo` int(11) NOT NULL,
  `idRango` int(11) NOT NULL,
  `nombrecalif` varchar(45) DEFAULT NULL,
  `descripcioncalif` varchar(95) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelocalificacion`
--

INSERT INTO `modelocalificacion` (`idseq_calif`, `idcurso`, `idmateria`, `idseq_profesor`, `idPeriodo`, `idRango`, `nombrecalif`, `descripcioncalif`) VALUES
(1, 8, 1, 1, 1, 1, 'INVESTIGACION INDIVIDUAL', 'INVESTIGACION INDIVIDUAL'),
(2, 8, 1, 1, 1, 1, 'INVESTIGACION GRUPAL', 'INVESTIGACION GRUPAL'),
(3, 8, 1, 1, 1, 1, 'LECCIONES EN CLASE', 'LECCIONES EN CLASE'),
(4, 8, 1, 1, 1, 1, 'EXAMEN', 'EXAMEN'),
(5, 8, 1, 1, 1, 2, 'INVESTIGACION INDIVIDUAL', 'INVESTIGACION INDIVIDUAL'),
(6, 8, 1, 1, 1, 2, 'INVESTIGACION GRUPAL', 'INVESTIGACION GRUPAL'),
(7, 8, 1, 1, 1, 2, 'LECCIONES EN CLASE', 'LECCIONES EN CLASE'),
(8, 8, 1, 1, 1, 2, 'EXAMEN', 'EXAMEN'),
(9, 13, 3, 9, 1, 1, 'INVESTIGACIONES GRUPALES', 'INVESTIGACIONES GRUPALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_estudiante`
--

CREATE TABLE `notas_estudiante` (
  `idseqNotas` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idcurso` int(11) DEFAULT NULL,
  `idmateria` int(11) DEFAULT NULL,
  `idProfesor` int(11) NOT NULL,
  `idRango` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `idseq_calif` int(11) DEFAULT NULL,
  `idseqParcial` int(11) DEFAULT NULL,
  `Nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas_estudiante`
--

INSERT INTO `notas_estudiante` (`idseqNotas`, `idEstudiante`, `idcurso`, `idmateria`, `idProfesor`, `idRango`, `idPeriodo`, `idseq_calif`, `idseqParcial`, `Nota`) VALUES
(1, 17, 8, 1, 1, 1, 1, 1, 1, 10),
(2, 32, 8, 1, 1, 1, 1, 1, 1, 5),
(3, 12, 8, 1, 1, 1, 1, 1, 1, 8),
(4, 19, 8, 1, 1, 1, 1, 1, 1, 7),
(5, 8, 8, 1, 1, 1, 1, 1, 1, 3),
(6, 10, 8, 1, 1, 1, 1, 1, 1, 3),
(7, 16, 8, 1, 1, 1, 1, 1, 1, 10),
(8, 7, 8, 1, 1, 1, 1, 1, 1, 10),
(9, 18, 8, 1, 1, 1, 1, 1, 1, 8),
(10, 31, 8, 1, 1, 1, 1, 1, 1, 7),
(11, 17, 8, 1, 1, 1, 1, 1, 2, 8),
(12, 32, 8, 1, 1, 1, 1, 1, 2, 5),
(13, 12, 8, 1, 1, 1, 1, 1, 2, 9),
(14, 19, 8, 1, 1, 1, 1, 1, 2, 5),
(15, 8, 8, 1, 1, 1, 1, 1, 2, 5),
(16, 10, 8, 1, 1, 1, 1, 1, 2, 6),
(17, 16, 8, 1, 1, 1, 1, 1, 2, 7),
(18, 7, 8, 1, 1, 1, 1, 1, 2, 9),
(19, 18, 8, 1, 1, 1, 1, 1, 2, 10),
(20, 31, 8, 1, 1, 1, 1, 1, 2, 8),
(21, 17, 8, 1, 1, 1, 1, 1, 3, 10),
(22, 32, 8, 1, 1, 1, 1, 1, 3, 7),
(23, 12, 8, 1, 1, 1, 1, 1, 3, 10),
(24, 19, 8, 1, 1, 1, 1, 1, 3, 6),
(25, 8, 8, 1, 1, 1, 1, 1, 3, 8),
(26, 10, 8, 1, 1, 1, 1, 1, 3, 7),
(27, 16, 8, 1, 1, 1, 1, 1, 3, 9),
(28, 7, 8, 1, 1, 1, 1, 1, 3, 8),
(29, 18, 8, 1, 1, 1, 1, 1, 3, 8),
(30, 31, 8, 1, 1, 1, 1, 1, 3, 9),
(31, 17, 8, 1, 1, 1, 1, 2, 4, 7),
(32, 32, 8, 1, 1, 1, 1, 2, 4, 4),
(33, 12, 8, 1, 1, 1, 1, 2, 4, 10),
(34, 19, 8, 1, 1, 1, 1, 2, 4, 7),
(35, 8, 8, 1, 1, 1, 1, 2, 4, 7),
(36, 10, 8, 1, 1, 1, 1, 2, 4, 7),
(37, 16, 8, 1, 1, 1, 1, 2, 4, 6),
(38, 7, 8, 1, 1, 1, 1, 2, 4, 7),
(39, 18, 8, 1, 1, 1, 1, 2, 4, 9),
(40, 31, 8, 1, 1, 1, 1, 2, 4, 7),
(41, 17, 8, 1, 1, 1, 1, 2, 5, 8),
(42, 32, 8, 1, 1, 1, 1, 2, 5, 4),
(43, 12, 8, 1, 1, 1, 1, 2, 5, 9),
(44, 19, 8, 1, 1, 1, 1, 2, 5, 8),
(45, 8, 8, 1, 1, 1, 1, 2, 5, 9),
(46, 10, 8, 1, 1, 1, 1, 2, 5, 4),
(47, 16, 8, 1, 1, 1, 1, 2, 5, 5),
(48, 7, 8, 1, 1, 1, 1, 2, 5, 9),
(49, 18, 8, 1, 1, 1, 1, 2, 5, 9),
(50, 31, 8, 1, 1, 1, 1, 2, 5, 9),
(51, 17, 8, 1, 1, 1, 1, 2, 6, 7),
(52, 32, 8, 1, 1, 1, 1, 2, 6, 4),
(53, 12, 8, 1, 1, 1, 1, 2, 6, 8),
(54, 19, 8, 1, 1, 1, 1, 2, 6, 4),
(55, 8, 8, 1, 1, 1, 1, 2, 6, 6),
(56, 10, 8, 1, 1, 1, 1, 2, 6, 5),
(57, 16, 8, 1, 1, 1, 1, 2, 6, 4),
(58, 7, 8, 1, 1, 1, 1, 2, 6, 7),
(59, 18, 8, 1, 1, 1, 1, 2, 6, 8),
(60, 31, 8, 1, 1, 1, 1, 2, 6, 9),
(61, 17, 8, 1, 1, 1, 1, 3, 7, 8),
(62, 32, 8, 1, 1, 1, 1, 3, 7, 7),
(63, 12, 8, 1, 1, 1, 1, 3, 7, 8),
(64, 19, 8, 1, 1, 1, 1, 3, 7, 5),
(65, 8, 8, 1, 1, 1, 1, 3, 7, 6),
(66, 10, 8, 1, 1, 1, 1, 3, 7, 7),
(67, 16, 8, 1, 1, 1, 1, 3, 7, 6),
(68, 7, 8, 1, 1, 1, 1, 3, 7, 8),
(69, 18, 8, 1, 1, 1, 1, 3, 7, 9),
(70, 31, 8, 1, 1, 1, 1, 3, 7, 7),
(71, 17, 8, 1, 1, 1, 1, 3, 8, 8),
(72, 32, 8, 1, 1, 1, 1, 3, 8, 7),
(73, 12, 8, 1, 1, 1, 1, 3, 8, 8),
(74, 19, 8, 1, 1, 1, 1, 3, 8, 5),
(75, 8, 8, 1, 1, 1, 1, 3, 8, 4),
(76, 10, 8, 1, 1, 1, 1, 3, 8, 9),
(77, 16, 8, 1, 1, 1, 1, 3, 8, 4),
(78, 7, 8, 1, 1, 1, 1, 3, 8, 5),
(79, 18, 8, 1, 1, 1, 1, 3, 8, 5),
(80, 31, 8, 1, 1, 1, 1, 3, 8, 5),
(81, 17, 8, 1, 1, 1, 1, 3, 9, 7),
(82, 32, 8, 1, 1, 1, 1, 3, 9, 6),
(83, 12, 8, 1, 1, 1, 1, 3, 9, 8),
(84, 19, 8, 1, 1, 1, 1, 3, 9, 9),
(85, 8, 8, 1, 1, 1, 1, 3, 9, 7),
(86, 10, 8, 1, 1, 1, 1, 3, 9, 7),
(87, 16, 8, 1, 1, 1, 1, 3, 9, 8),
(88, 7, 8, 1, 1, 1, 1, 3, 9, 8),
(89, 18, 8, 1, 1, 1, 1, 3, 9, 8),
(90, 31, 8, 1, 1, 1, 1, 3, 9, 8),
(91, 17, 8, 1, 1, 1, 1, 4, 10, 7),
(92, 32, 8, 1, 1, 1, 1, 4, 10, 7),
(93, 12, 8, 1, 1, 1, 1, 4, 10, 10),
(94, 19, 8, 1, 1, 1, 1, 4, 10, 7),
(95, 8, 8, 1, 1, 1, 1, 4, 10, 8),
(96, 10, 8, 1, 1, 1, 1, 4, 10, 6),
(97, 16, 8, 1, 1, 1, 1, 4, 10, 8),
(98, 7, 8, 1, 1, 1, 1, 4, 10, 7),
(99, 18, 8, 1, 1, 1, 1, 4, 10, 9),
(100, 31, 8, 1, 1, 1, 1, 4, 10, 9),
(101, 17, 8, 1, 1, 2, 1, 5, 11, 8),
(102, 32, 8, 1, 1, 2, 1, 5, 11, 8),
(103, 12, 8, 1, 1, 2, 1, 5, 11, 9),
(104, 19, 8, 1, 1, 2, 1, 5, 11, 8),
(105, 8, 8, 1, 1, 2, 1, 5, 11, 9),
(106, 10, 8, 1, 1, 2, 1, 5, 11, 9),
(107, 16, 8, 1, 1, 2, 1, 5, 11, 9),
(108, 7, 8, 1, 1, 2, 1, 5, 11, 8),
(109, 18, 8, 1, 1, 2, 1, 5, 11, 9),
(110, 31, 8, 1, 1, 2, 1, 5, 11, 9),
(111, 17, 8, 1, 1, 2, 1, 5, 12, 9),
(112, 32, 8, 1, 1, 2, 1, 5, 12, 7),
(113, 12, 8, 1, 1, 2, 1, 5, 12, 9),
(114, 19, 8, 1, 1, 2, 1, 5, 12, 4),
(115, 8, 8, 1, 1, 2, 1, 5, 12, 8),
(116, 10, 8, 1, 1, 2, 1, 5, 12, 3),
(117, 16, 8, 1, 1, 2, 1, 5, 12, 9),
(118, 7, 8, 1, 1, 2, 1, 5, 12, 5),
(119, 18, 8, 1, 1, 2, 1, 5, 12, 6),
(120, 31, 8, 1, 1, 2, 1, 5, 12, 7),
(121, 17, 8, 1, 1, 2, 1, 5, 13, 6),
(122, 32, 8, 1, 1, 2, 1, 5, 13, 8),
(123, 12, 8, 1, 1, 2, 1, 5, 13, 8),
(124, 19, 8, 1, 1, 2, 1, 5, 13, 5),
(125, 8, 8, 1, 1, 2, 1, 5, 13, 8),
(126, 10, 8, 1, 1, 2, 1, 5, 13, 10),
(127, 16, 8, 1, 1, 2, 1, 5, 13, 5),
(128, 7, 8, 1, 1, 2, 1, 5, 13, 3),
(129, 18, 8, 1, 1, 2, 1, 5, 13, 10),
(130, 31, 8, 1, 1, 2, 1, 5, 13, 9),
(131, 17, 8, 1, 1, 2, 1, 6, 14, 8),
(132, 32, 8, 1, 1, 2, 1, 6, 14, 7),
(133, 12, 8, 1, 1, 2, 1, 6, 14, 9),
(134, 19, 8, 1, 1, 2, 1, 6, 14, 7),
(135, 8, 8, 1, 1, 2, 1, 6, 14, 10),
(136, 10, 8, 1, 1, 2, 1, 6, 14, 9),
(137, 16, 8, 1, 1, 2, 1, 6, 14, 10),
(138, 7, 8, 1, 1, 2, 1, 6, 14, 7),
(139, 18, 8, 1, 1, 2, 1, 6, 14, 9),
(140, 31, 8, 1, 1, 2, 1, 6, 14, 8),
(141, 17, 8, 1, 1, 2, 1, 6, 15, 5),
(142, 32, 8, 1, 1, 2, 1, 6, 15, 3),
(143, 12, 8, 1, 1, 2, 1, 6, 15, 8),
(144, 19, 8, 1, 1, 2, 1, 6, 15, 10),
(145, 8, 8, 1, 1, 2, 1, 6, 15, 9),
(146, 10, 8, 1, 1, 2, 1, 6, 15, 7),
(147, 16, 8, 1, 1, 2, 1, 6, 15, 7),
(148, 7, 8, 1, 1, 2, 1, 6, 15, 9),
(149, 18, 8, 1, 1, 2, 1, 6, 15, 10),
(150, 31, 8, 1, 1, 2, 1, 6, 15, 8),
(151, 17, 8, 1, 1, 2, 1, 6, 16, 7),
(152, 32, 8, 1, 1, 2, 1, 6, 16, 9),
(153, 12, 8, 1, 1, 2, 1, 6, 16, 8),
(154, 19, 8, 1, 1, 2, 1, 6, 16, 8),
(155, 8, 8, 1, 1, 2, 1, 6, 16, 9),
(156, 10, 8, 1, 1, 2, 1, 6, 16, 9),
(157, 16, 8, 1, 1, 2, 1, 6, 16, 10),
(158, 7, 8, 1, 1, 2, 1, 6, 16, 8),
(159, 18, 8, 1, 1, 2, 1, 6, 16, 9),
(160, 31, 8, 1, 1, 2, 1, 6, 16, 8),
(161, 17, 8, 1, 1, 2, 1, 7, 17, 8),
(162, 32, 8, 1, 1, 2, 1, 7, 17, 6),
(163, 12, 8, 1, 1, 2, 1, 7, 17, 10),
(164, 19, 8, 1, 1, 2, 1, 7, 17, 9),
(165, 8, 8, 1, 1, 2, 1, 7, 17, 10),
(166, 10, 8, 1, 1, 2, 1, 7, 17, 7),
(167, 16, 8, 1, 1, 2, 1, 7, 17, 7),
(168, 7, 8, 1, 1, 2, 1, 7, 17, 1),
(169, 18, 8, 1, 1, 2, 1, 7, 17, 10),
(170, 31, 8, 1, 1, 2, 1, 7, 17, 8),
(171, 17, 8, 1, 1, 2, 1, 7, 18, 8),
(172, 32, 8, 1, 1, 2, 1, 7, 18, 10),
(173, 12, 8, 1, 1, 2, 1, 7, 18, 10),
(174, 19, 8, 1, 1, 2, 1, 7, 18, 7),
(175, 8, 8, 1, 1, 2, 1, 7, 18, 8),
(176, 10, 8, 1, 1, 2, 1, 7, 18, 10),
(177, 16, 8, 1, 1, 2, 1, 7, 18, 10),
(178, 7, 8, 1, 1, 2, 1, 7, 18, 10),
(179, 18, 8, 1, 1, 2, 1, 7, 18, 10),
(180, 31, 8, 1, 1, 2, 1, 7, 18, 10),
(181, 17, 8, 1, 1, 2, 1, 7, 19, 9),
(182, 32, 8, 1, 1, 2, 1, 7, 19, 8),
(183, 12, 8, 1, 1, 2, 1, 7, 19, 9),
(184, 19, 8, 1, 1, 2, 1, 7, 19, 8),
(185, 8, 8, 1, 1, 2, 1, 7, 19, 9),
(186, 10, 8, 1, 1, 2, 1, 7, 19, 10),
(187, 16, 8, 1, 1, 2, 1, 7, 19, 10),
(188, 7, 8, 1, 1, 2, 1, 7, 19, 10),
(189, 18, 8, 1, 1, 2, 1, 7, 19, 10),
(190, 31, 8, 1, 1, 2, 1, 7, 19, 10),
(191, 17, 8, 1, 1, 2, 1, 8, 20, 8),
(192, 32, 8, 1, 1, 2, 1, 8, 20, 8),
(193, 12, 8, 1, 1, 2, 1, 8, 20, 10),
(194, 19, 8, 1, 1, 2, 1, 8, 20, 8),
(195, 8, 8, 1, 1, 2, 1, 8, 20, 2),
(196, 10, 8, 1, 1, 2, 1, 8, 20, 2),
(197, 16, 8, 1, 1, 2, 1, 8, 20, 8),
(198, 7, 8, 1, 1, 2, 1, 8, 20, 3),
(199, 18, 8, 1, 1, 2, 1, 8, 20, 6),
(200, 31, 8, 1, 1, 2, 1, 8, 20, 9),
(201, 54, 13, 3, 9, 1, 1, 9, 21, 2),
(202, 57, 13, 3, 9, 1, 1, 9, 21, 10),
(203, 56, 13, 3, 9, 1, 1, 9, 21, 5),
(204, 55, 13, 3, 9, 1, 1, 9, 21, 7),
(205, 53, 13, 3, 9, 1, 1, 9, 21, 9),
(206, 58, 13, 3, 9, 1, 1, 9, 21, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial`
--

CREATE TABLE `parcial` (
  `idseqParcial` int(11) NOT NULL,
  `nombreParcial` varchar(35) DEFAULT NULL,
  `idseq_calif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parcial`
--

INSERT INTO `parcial` (`idseqParcial`, `nombreParcial`, `idseq_calif`) VALUES
(1, 'INV IND 1', 1),
(2, 'INV IND 2', 1),
(3, 'INV IND 3', 1),
(4, 'INV GRUP 1', 2),
(5, 'INV GRUP 2', 2),
(6, 'INV GRUP 3', 2),
(7, 'LECC 1', 3),
(8, 'LECC 2', 3),
(9, 'LECC 3', 3),
(10, 'EXA 1', 4),
(11, 'INV IND 1', 5),
(12, 'INV IND 2', 5),
(13, 'INV IND 3', 5),
(14, 'INV GRUP 1', 6),
(15, 'INV GRUP 2', 6),
(16, 'INV GRUP 3', 6),
(17, 'LECC 1', 7),
(18, 'LECC 2', 7),
(19, 'LECC 3', 7),
(20, 'EXA 1', 8),
(21, 'INVESTIGACION 1', 9),
(22, 'INVESTIGACION 2', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `idPeriodo` int(11) NOT NULL,
  `nombrePeriodo` varchar(35) DEFAULT NULL,
  `duracionPeriodo` int(11) DEFAULT NULL,
  `YearPeriodo` int(11) DEFAULT NULL,
  `descripcionPeriodo` varchar(100) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`idPeriodo`, `nombrePeriodo`, `duracionPeriodo`, `YearPeriodo`, `descripcionPeriodo`, `usuario`, `fecharegistro`) VALUES
(1, 'PERIODO 2019', 36, 2019, 'PERIODO 2019', 'kerlly', '2019-11-09 22:06:25'),
(5, 'PERIODO 2020', 36, 2020, 'PERIODO 2020', 'igma23', '2019-11-03 20:42:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idseq_profesor` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `correo` varchar(35) DEFAULT NULL,
  `telefono` varchar(35) DEFAULT NULL,
  `direccion` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idseq_profesor`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`) VALUES
(1, 'MARIANA ELIZABETH', 'COELLO ALVAREZ', 'mariana@gmail.com', '2415678', 'PASCUALES'),
(2, 'LISBETH CAROLINA', 'TORRES CAMPOS', 'lisbeth@gmail.com', '0988754689', 'avenida las aguas '),
(3, 'JOHANNA ANDREA', 'ZUMBA BELTRAN', 'johanna@gmail.com', '2417898', 'mucho lote'),
(4, 'JOSE ADRIAN', 'ARREAGA ALCIVAR', 'jose@gmail.com', '2789845', 'Las acacias'),
(5, 'LEONARDO JOSE', 'BELTRAN LOZANO', 'leo@gmail.com', '2974165', 'Vergeles'),
(6, 'ANDREA JOSELYN', 'LEON TORRES', 'andrea@gmail.com', '2471349', 'Floresta 1'),
(7, 'LISBETH ALLISON', 'RUIZ CARPIO', 'alli@gmail.com', '2789941', 'Los tulipanes'),
(8, 'THALIA ROSARIO', 'PAUTE FLORES', 'thalia@gmail.com', '2178899', 'Kennedy Norte'),
(9, 'EDUARDO ESTEVEN', 'SOCOLA AVILES', 'eduardo@gmail.com', '2997745', 'Perimentral'),
(10, 'JAMILETH THALIA', 'BAQUE VELEZ', 'jamileth@gmail.com', '2166558', 'Mucho lote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `idRango` int(11) NOT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  `nombreRango` varchar(25) DEFAULT NULL,
  `duracionRango` int(4) DEFAULT NULL,
  `fechaInicioRango` date DEFAULT NULL,
  `fechaFinRango` date DEFAULT NULL,
  `usuarioRango` varchar(20) DEFAULT NULL,
  `fechaRegistroRango` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`idRango`, `idPeriodo`, `nombreRango`, `duracionRango`, `fechaInicioRango`, `fechaFinRango`, `usuarioRango`, `fechaRegistroRango`) VALUES
(1, 1, 'QUIMESTRE PERIODO 1', 12, '2019-04-01', '2019-06-20', 'igma23', '2019-10-20 15:13:35'),
(2, 1, 'QUIMESTRE PERIODO 2', 12, '2019-06-24', '2019-09-13', 'igma23', '2019-10-20 15:13:35'),
(4, 1, 'QUIMESTRE PERIODO 3', 12, '2019-09-14', '2019-11-14', 'igma23', '2019-10-23 23:51:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES
(1, 'igma23', '123456', 'administrador'),
(2, 'stefy22', '123456', 'usuario'),
(3, 'administrador', '123', 'administrador'),
(4, 'kerlly', '123456', 'administrador'),
(5, 'sofia', '22443365', 'administrador'),
(6, 'sofiaProfesor', '123456', 'profesor'),
(7, 'kerllyProfesor', '123456', 'profesor'),
(8, 'kerllyFamiliar', '123456', 'representante'),
(9, 'sofiaFamiliar', '123456', 'representante'),
(10, 'Orly Palacios', '123456', 'administrador'),
(11, 'ivanmata1995', '123456', 'representante'),
(12, 'maria23', '123456', 'representante'),
(13, '0951908474', '123456', 'representante'),
(14, '123456', '123456', 'representante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendaeventos`
--
ALTER TABLE `agendaeventos`
  ADD PRIMARY KEY (`idAgenda`);

--
-- Indices de la tabla `asistencia_estudiante`
--
ALTER TABLE `asistencia_estudiante`
  ADD PRIMARY KEY (`id_Asistencia`),
  ADD KEY `fkEstudiante` (`idEstudiante`),
  ADD KEY `fkprofesor` (`idProfesor`),
  ADD KEY `fkmateria` (`idmateria`),
  ADD KEY `fkcurso` (`idcurso`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indices de la tabla `estudiante_materia_curso`
--
ALTER TABLE `estudiante_materia_curso`
  ADD PRIMARY KEY (`idseqEstudiante_Materia`),
  ADD KEY `fkEstudiantesM` (`idEstudiante`),
  ADD KEY `fkcursoM` (`idcurso`),
  ADD KEY `fkmateriaM` (`idmateria`),
  ADD KEY `fkProfesorM` (`idseq_profesor`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indices de la tabla `modelocalificacion`
--
ALTER TABLE `modelocalificacion`
  ADD PRIMARY KEY (`idseq_calif`),
  ADD KEY `fkmateriaMC` (`idmateria`),
  ADD KEY `fkprofosorMC` (`idseq_profesor`),
  ADD KEY `fkPeriodoMC` (`idPeriodo`),
  ADD KEY `fkRangoMC` (`idRango`),
  ADD KEY `fkcursoMC` (`idcurso`);

--
-- Indices de la tabla `notas_estudiante`
--
ALTER TABLE `notas_estudiante`
  ADD PRIMARY KEY (`idseqNotas`),
  ADD KEY `fkEstudianteNE` (`idEstudiante`),
  ADD KEY `fkmateriaNE` (`idmateria`),
  ADD KEY `fkprofosorNE` (`idProfesor`),
  ADD KEY `fkPeriodoNE` (`idPeriodo`),
  ADD KEY `fkRangoNE` (`idRango`),
  ADD KEY `fkcursoNE` (`idcurso`),
  ADD KEY `fkmodelocalificacionNE` (`idseq_calif`),
  ADD KEY `fkparcialNE` (`idseqParcial`);

--
-- Indices de la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD PRIMARY KEY (`idseqParcial`),
  ADD KEY `fkmodelocaliPRC` (`idseq_calif`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`idPeriodo`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idseq_profesor`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`idRango`),
  ADD KEY `fkperiodo` (`idPeriodo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendaeventos`
--
ALTER TABLE `agendaeventos`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `asistencia_estudiante`
--
ALTER TABLE `asistencia_estudiante`
  MODIFY `id_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `estudiante_materia_curso`
--
ALTER TABLE `estudiante_materia_curso`
  MODIFY `idseqEstudiante_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `modelocalificacion`
--
ALTER TABLE `modelocalificacion`
  MODIFY `idseq_calif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notas_estudiante`
--
ALTER TABLE `notas_estudiante`
  MODIFY `idseqNotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `idseqParcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `idPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idseq_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `idRango` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia_estudiante`
--
ALTER TABLE `asistencia_estudiante`
  ADD CONSTRAINT `fkEstudiante` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `fkcurso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `fkmateria` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`),
  ADD CONSTRAINT `fkprofesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idseq_profesor`);

--
-- Filtros para la tabla `estudiante_materia_curso`
--
ALTER TABLE `estudiante_materia_curso`
  ADD CONSTRAINT `fkEstudiantesM` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `fkProfesorM` FOREIGN KEY (`idseq_profesor`) REFERENCES `profesor` (`idseq_profesor`),
  ADD CONSTRAINT `fkcursoM` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `fkmateriaM` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`);

--
-- Filtros para la tabla `modelocalificacion`
--
ALTER TABLE `modelocalificacion`
  ADD CONSTRAINT `fkPeriodoMC` FOREIGN KEY (`idPeriodo`) REFERENCES `periodos` (`idPeriodo`),
  ADD CONSTRAINT `fkRangoMC` FOREIGN KEY (`idRango`) REFERENCES `rangos` (`idRango`),
  ADD CONSTRAINT `fkcursoMC` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `fkmateriaMC` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`),
  ADD CONSTRAINT `fkprofosorMC` FOREIGN KEY (`idseq_profesor`) REFERENCES `profesor` (`idseq_profesor`);

--
-- Filtros para la tabla `notas_estudiante`
--
ALTER TABLE `notas_estudiante`
  ADD CONSTRAINT `fkEstudianteNE` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `fkPeriodoNE` FOREIGN KEY (`idPeriodo`) REFERENCES `periodos` (`idPeriodo`),
  ADD CONSTRAINT `fkRangoNE` FOREIGN KEY (`idRango`) REFERENCES `rangos` (`idRango`),
  ADD CONSTRAINT `fkcursoNE` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `fkmateriaNE` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`),
  ADD CONSTRAINT `fkmodelocalificacionNE` FOREIGN KEY (`idseq_calif`) REFERENCES `modelocalificacion` (`idseq_calif`),
  ADD CONSTRAINT `fkparcialNE` FOREIGN KEY (`idseqParcial`) REFERENCES `parcial` (`idseqParcial`),
  ADD CONSTRAINT `fkprofosorNE` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idseq_profesor`);

--
-- Filtros para la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD CONSTRAINT `fkmodelocaliPRC` FOREIGN KEY (`idseq_calif`) REFERENCES `modelocalificacion` (`idseq_calif`);

--
-- Filtros para la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD CONSTRAINT `fkperiodo` FOREIGN KEY (`idPeriodo`) REFERENCES `periodos` (`idPeriodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
