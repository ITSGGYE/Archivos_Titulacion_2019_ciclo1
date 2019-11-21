-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-10-2019 a las 22:49:53
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
-- Base de datos: `multimedia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL,
  `orden` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`media_id`, `media_GUID`, `media_name`, `media_name_original`, `media_type`, `created_date`) VALUES
(5, '85751572282261', 'l9SsdI3OKMc', 'l9SsdI3OKMc', 'YouTube', '2019-10-28'),
(7, '31431572289445', 'qBNb8FwOlzQ', 'qBNb8FwOlzQ', 'YouTube', '2019-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id-registro` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `usu` varchar(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  PRIMARY KEY (`id-registro`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id-registro`, `nombre`, `usu`, `pass`, `correo`) VALUES
(1, 'prueba', 'prueba', '1', 'prueba@gmail.com'),
(2, 'prueba', 'prueba', '', ''),
(7, 'prueba', 'prueba', '1', 'prueba@gmail.com'),
(8, 'prueba', 'prueba', '1', 'prueba@gmail.com'),
(9, 'prueba', 'prueba', '1', 'prueba@gmail.com'),
(10, 'prueba', 'ee', '1', 'mera@hotmail.com'),
(11, 'prueba', 'w', '1', 'mera@hotmail.com'),
(12, 'prueba', 'q', '1', 'puto@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
