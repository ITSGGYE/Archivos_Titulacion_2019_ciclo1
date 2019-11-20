-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-10-2019 a las 02:30:02
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(123) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(200) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_GUID` varchar(50) NOT NULL,
  `media_name` varchar(255) NOT NULL,
  `media_name_original` varchar(255) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`media_id`),
  UNIQUE KEY `Unique` (`media_GUID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`media_id`, `media_GUID`, `media_name`, `media_name_original`, `media_type`, `created_date`) VALUES
(1, '63051572189268', 'pTPNrxaBhhc', 'pTPNrxaBhhc', 'YouTube', '2019-10-27'),
(2, '32561572189646', 'Bdjs0XLnCU4', 'Bdjs0XLnCU4', 'YouTube', '2019-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

DROP TABLE IF EXISTS `tbl_documentos`;
CREATE TABLE IF NOT EXISTS `tbl_documentos` (
  `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` mediumtext,
  `tamanio` int(10) UNSIGNED DEFAULT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`id_documento`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_archivo`) VALUES
(4, 'prueba', 'esta es una prueba', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(5, 'ejemplo 2', 'segundo ejemplo', 100152, 'application/pdf', 'php.pdf'),
(6, 'prueba', 'pruebas', 183917, 'application/pdf', 'Cv-2019-convertido.pdf'),
(21, 'KKKK', 'RRRRRR', 916454, 'application/pdf', 'guayas.pdf'),
(22, 'eee', 'ssss', 916454, 'application/pdf', 'guayas.pdf'),
(23, 'ff', 'vik', 916454, 'application/pdf', 'guayas.pdf'),
(24, 'dd', 'sssss', 916454, 'application/pdf', 'guayas.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
