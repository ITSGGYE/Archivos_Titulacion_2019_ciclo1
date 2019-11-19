-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 04:23:05
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis_recaudacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `banco` text,
  `cuenta` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`banco`, `cuenta`) VALUES
('banco del pacifico', '45646546465');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `anio_actual` varchar(20) DEFAULT NULL,
  `identificador` int(11) DEFAULT NULL,
  `curso` char(1) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `usuario_create` varchar(15) DEFAULT NULL,
  `fecha_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_update` varchar(15) DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT NULL,
  `usuario_delete` varchar(15) DEFAULT NULL,
  `fecha_delete` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombres`, `apellidos`, `anio_actual`, `identificador`, `curso`, `estado`, `usuario_create`, `fecha_create`, `usuario_update`, `fecha_update`, `usuario_delete`, `fecha_delete`) VALUES
(1, 'eduardo carlos', 'POzo zamora', '7 basica', 123456789, 'C', 1, 'jose_daniel', '2019-09-08 02:50:40', 'blanca_cruz', '2019-10-14 19:41:28', 'jose_daniel', '2019-09-08 02:57:26'),
(2, 'eduardo carlos miguel', 'soto macas macas', '5 basica', 12345, 'B', 1, 'jose_daniel', '2019-09-08 02:58:12', 'Josie', '2019-11-02 18:52:09', NULL, NULL),
(3, 'anggie nohely', 'pozo zamora', 'Inicial 2', 123546465, 'A', 0, 'jose_daniel', '2019-09-08 03:11:06', NULL, NULL, 'Josie', '2019-10-23 02:40:57'),
(4, 'jessica stefanya', 'pozo zamora', '6 basica', 123456, 'A', 1, 'jose_daniel', '2019-09-08 17:01:19', NULL, NULL, NULL, NULL),
(5, 'maria', 'ceballos', 'Inicial 2', 12345, 'B', 0, 'jose_daniel', '2019-10-14 20:21:59', NULL, NULL, 'Jossie', '2019-11-02 23:22:00'),
(6, 'ingrid', 'vite', '7 basica', 999999999, 'B', 1, 'Jhony_Cedeño', '2019-10-14 23:35:16', NULL, NULL, NULL, NULL),
(7, 'robert', 'lopez', 'Inicial 2', 8888888, 'A', 1, 'ingrid', '2019-10-19 23:43:37', NULL, NULL, NULL, NULL),
(8, 'Jhony ', 'GARCIA ', '4 basica', 5555555, 'A', 1, 'ingrid', '2019-10-19 23:50:08', 'Josie', '2019-11-02 18:54:48', NULL, NULL),
(9, ' Martha   ', 'Castro Arboleda  ', '4 basica', 1708133528, 'A', 1, 'Josie', '2019-11-02 18:33:13', 'Josie', '2019-11-02 18:34:37', NULL, NULL),
(10, 'Jacob Ismael  ', 'Vinces Cercado', '4 basica', 95186468, 'A', 1, 'Josie', '2019-11-02 18:39:11', NULL, NULL, NULL, NULL),
(11, 'Kenneth ', 'Exkart Espinoza ', 'Inicial 2', 952653517, 'B', 0, 'Josie', '2019-11-02 18:57:08', 'Josie', '2019-11-04 22:05:45', 'Josie', '2019-11-04 22:06:01'),
(12, 'Kenneth Leonel ', 'Exkart Espinoza', '4 basica', 952653517, 'A', 1, 'Josie', '2019-11-02 18:59:22', NULL, NULL, NULL, NULL),
(13, 'Moises Jeremias', ' Leon Loor ', '4 basica', 953160827, 'A', 1, 'Josie', '2019-11-02 19:01:19', NULL, NULL, NULL, NULL),
(14, 'Jeyna Saleisha ', 'Quiñonez Quintero ', '4 basica', 950089434, 'A', 1, 'Josie', '2019-11-02 19:02:47', NULL, NULL, NULL, NULL),
(15, 'Pievo Emiliano', ' Moyorga Tumbaco ', '4 basica', 956409544, 'A', 1, 'Josie', '2019-11-02 19:04:45', NULL, NULL, NULL, NULL),
(16, 'Leslie Andrea', ' Holguin Rojas ', '4 basica', 956409544, 'A', 1, 'Josie', '2019-11-02 19:06:06', NULL, NULL, NULL, NULL),
(17, 'Noelia Ivanna ', ' Pluas Vera', '4 basica', 951421304, 'A', 1, 'Josie', '2019-11-02 19:07:56', NULL, NULL, NULL, NULL),
(18, 'Scarlet Esther ', 'Moreno Alfonso', '4 basica', 931830954, 'A', 1, 'Josie', '2019-11-02 19:09:29', NULL, NULL, NULL, NULL),
(19, 'Ana Cristina', ' Limenea Preciado ', '4 basica', 952044444, 'A', 1, 'Josie', '2019-11-02 19:10:20', NULL, NULL, NULL, NULL),
(20, 'Genesis Sarai ', 'Pasto Bacasela ', '5 basica', 606114478, 'A', 1, 'Josie', '2019-11-02 19:11:28', NULL, NULL, NULL, NULL),
(21, 'Byron Snyder ', 'Casierra cabezas ', '5 basica', 2147483647, 'A', 1, 'Josie', '2019-11-02 19:12:40', NULL, NULL, NULL, NULL),
(22, 'Byron Snyder ', 'Casierra cabezas ', '5 basica', 2147483647, 'A', 1, 'Josie', '2019-11-02 19:24:15', NULL, NULL, NULL, NULL),
(23, 'Sara Abigail ', 'Duarte Zambrano', '5 basica', 951243948, 'A', 1, 'Josie', '2019-11-02 19:25:41', NULL, NULL, NULL, NULL),
(24, 'Gaston Angelo ', 'Darraza Caañola ', '5 basica', 950308817, 'A', 1, 'Josie', '2019-11-02 19:27:14', NULL, NULL, NULL, NULL),
(25, 'Ruth Francesca ', 'Almeida Ortiz', '5 basica', 931562995, 'A', 1, 'Josie', '2019-11-02 19:52:58', NULL, NULL, NULL, NULL),
(26, 'Derek Mathias ', 'Barragon Bazurto ', '5 basica', 950319020, 'A', 1, 'Josie', '2019-11-02 19:54:11', NULL, NULL, NULL, NULL),
(27, 'David Daniel  ', 'Yanez Mendoza', '5 basica', 939233639, 'A', 1, 'Josie', '2019-11-02 19:56:11', NULL, NULL, NULL, NULL),
(28, 'Lesli Scarleth', ' Ramirez Navarrete ', '5 basica', 931663520, 'A', 1, 'Josie', '2019-11-02 20:00:07', NULL, NULL, NULL, NULL),
(29, 'Jeremy Anthony ', 'Castro Correa ', '5 basica', 957352115, 'A', 1, 'Josie', '2019-11-02 20:01:19', NULL, NULL, NULL, NULL),
(30, 'Johon Alduis ', 'Leytin Rodrigues ', '5 basica', 960513034, 'A', 1, 'Josie', '2019-11-02 20:02:29', NULL, NULL, NULL, NULL),
(31, 'Michael Joily', ' Proaño Cirino', '5 basica', 951101754, 'A', 0, 'Josie', '2019-11-02 20:03:53', NULL, NULL, 'Jhony', '2019-11-04 22:19:31'),
(32, 'Victoria Nicole ', 'Cruz Cedeño ', '6 basica', 951843291, 'A', 1, 'Josie', '2019-11-02 20:06:06', NULL, NULL, NULL, NULL),
(33, 'Paola Denisse ', 'Cichan Mendoza', '6 basica', 958923294, 'A', 1, 'Josie', '2019-11-02 20:06:57', NULL, NULL, NULL, NULL),
(34, 'Brithani Damaris', ' Briones  Banguera ', '6 basica', 931253827, 'A', 1, 'Josie', '2019-11-02 20:07:56', NULL, NULL, NULL, NULL),
(35, 'Eddie Alexander ', 'Quiroz Pluas ', '6 basica', 931033476, 'A', 1, 'Josie', '2019-11-02 20:10:58', NULL, NULL, NULL, NULL),
(36, 'Jenffer Noris ', 'Santana Palanco ', '6 basica', 950827485, 'A', 1, 'Josie', '2019-11-02 20:11:50', NULL, NULL, NULL, NULL),
(37, 'Nicole Ashley ', 'Anchundia Medranda ', '7 basica', 953097660, 'A', 1, 'Josie', '2019-11-02 20:13:09', NULL, NULL, NULL, NULL),
(38, 'Karelys Marelis ', 'Conforme Loor ', '7 basica', 953097660, 'A', 1, 'Josie', '2019-11-02 20:13:39', NULL, NULL, NULL, NULL),
(39, 'Henrry Gabriel', ' Ibañez Valle ', '7 basica', 953097660, 'A', 1, 'Josie', '2019-11-02 20:14:09', NULL, NULL, NULL, NULL),
(40, 'Mateo Alexandra ', 'Chendre Tomala', '7 basica', 953097660, 'A', 1, 'Josie', '2019-11-02 20:14:43', NULL, NULL, NULL, NULL),
(41, 'Skarlet Yuleixi ', 'Villon Ochoa ', '7 basica', 957522558, 'A', 1, 'Josie', '2019-11-02 20:15:36', NULL, NULL, NULL, NULL),
(42, 'Andres Javier ', 'Bastidas Gavilanes ', '7 basica', 954585065, 'A', 1, 'Josie', '2019-11-02 20:16:59', NULL, NULL, NULL, NULL),
(43, 'Andres Javier ', 'Bastidas Gavilanes ', '7 basica', 954585065, 'A', 1, 'Josie', '2019-11-02 20:18:27', NULL, NULL, NULL, NULL),
(44, 'theyler Samuel', 'Medina ', '7 basica', 932857725, 'A', 1, 'Josie', '2019-11-02 20:21:32', NULL, NULL, NULL, NULL),
(45, 'Mauricio Onur ', 'Figueroa Alava ', 'Inicial 1', 960601276, 'A', 1, 'Josie', '2019-11-02 20:22:44', NULL, NULL, NULL, NULL),
(46, 'Eyni Alexandra ', 'Punguil Loja ', 'Inicial 1', 350393294, 'A', 1, 'Josie', '2019-11-02 20:23:45', NULL, NULL, NULL, NULL),
(47, 'Emily Lisbeth ', 'Cirino Pacheco ', 'Inicial 1', 960141018, 'A', 1, 'Josie', '2019-11-02 20:24:42', NULL, NULL, NULL, NULL),
(48, 'Sara Maribel', 'Espin Alvarado', 'Inicial 1', 959812686, 'A', 1, 'Josie', '2019-11-02 20:25:45', NULL, NULL, NULL, NULL),
(49, 'Jadiel Alejandra ', 'Chorrillo Muñiz', 'Inicial 1', 960579605, 'A', 1, 'Josie', '2019-11-02 20:28:40', NULL, NULL, NULL, NULL),
(50, 'Mia Lelady ', 'Guitierrez Murillo', 'Inicial 1', 960640803, 'A', 1, 'Josie', '2019-11-02 20:29:42', NULL, NULL, NULL, NULL),
(51, 'Pedro Enrique ', 'Analuiza ', 'Inicial 1', 960274077, 'A', 1, 'Josie', '2019-11-02 20:37:05', NULL, NULL, NULL, NULL),
(52, 'Scarlet Guadalupe ', 'Barrera Ponce ', 'Inicial 1', 960599512, 'A', 1, 'Josie', '2019-11-02 20:38:05', NULL, NULL, NULL, NULL),
(53, 'Stacy Judiet ', 'Mendoza Loja ', 'Inicial 1', 1251691125, 'A', 1, 'Josie', '2019-11-02 20:39:21', NULL, NULL, NULL, NULL),
(54, 'Thiago Sebastian ', 'Chipantiza Briones ', 'Inicial 2', 959915448, 'A', 1, 'Josie', '2019-11-02 20:43:31', NULL, NULL, NULL, NULL),
(55, 'Yesly Natasha ', 'Perez Yagual', 'Inicial 2', 960006211, 'A', 1, 'Josie', '2019-11-02 20:44:30', NULL, NULL, NULL, NULL),
(56, 'Emma Emely ', 'Garcia Vargas ', 'Inicial 2', 960157360, 'A', 1, 'Josie', '2019-11-02 20:45:51', NULL, NULL, NULL, NULL),
(57, 'Jan Josue ', 'Alava Delgado ', 'Inicial 2', 961120953, 'A', 1, 'Josie', '2019-11-02 20:46:57', NULL, NULL, NULL, NULL),
(58, 'Iker Jose', 'Pilamunga Torres', 'Inicial 2', 2147483647, 'A', 1, 'Josie', '2019-11-02 20:48:08', NULL, NULL, NULL, NULL),
(59, 'Emely Scarlet ', 'Pivaque Sojos ', 'Inicial 2', 960143183, 'A', 1, 'Josie', '2019-11-02 20:49:18', NULL, NULL, NULL, NULL),
(60, 'Chantal Andreina ', 'Carreño Gamani ', 'Inicial 2', 960214112, 'A', 1, 'Josie', '2019-11-02 20:50:44', NULL, NULL, NULL, NULL),
(61, 'Mathias Israel ', 'Olvera Fernandez', 'Inicial 2', 959837857, 'A', 1, 'Josie', '2019-11-02 20:52:57', NULL, NULL, NULL, NULL),
(62, 'Dylan Mateo ', 'Delgado Cacao ', 'Inicial 2', 932749047, 'A', 1, 'Josie', '2019-11-02 20:53:50', NULL, NULL, NULL, NULL),
(63, 'Bryan Elias ', 'Carrillo Paucar ', 'Inicial 2', 96069762, 'A', 1, 'Josie', '2019-11-02 20:54:42', NULL, NULL, NULL, NULL),
(64, 'Matheo Josue ', 'Tarira Quimis ', 'Inicial 2', 961848538, 'A', 1, 'Josie', '2019-11-02 20:55:31', NULL, NULL, NULL, NULL),
(65, 'Iker Andres ', 'Pluas Vera ', '1 basica', 918928516, 'A', 1, 'Josie', '2019-11-02 20:58:20', NULL, NULL, NULL, NULL),
(66, 'Domenica Analis ', 'Franci Pico ', '1 basica', 856914998, 'A', 1, 'Josie', '2019-11-02 20:59:13', NULL, NULL, NULL, NULL),
(67, 'Irene Jesus ', 'Tarina Quimis', '1 basica', 961848496, 'A', 1, 'Josie', '2019-11-02 21:00:19', NULL, NULL, NULL, NULL),
(68, 'Luciana Rafaela ', 'Suarez Perez ', '1 basica', 932681075, 'A', 1, 'Josie', '2019-11-02 21:02:19', NULL, NULL, NULL, NULL),
(69, 'Jhon Erick', 'Guitierrez Murillo', '1 basica', 932464373, 'A', 1, 'Josie', '2019-11-02 21:03:57', NULL, NULL, NULL, NULL),
(70, 'Carlos Jerik', 'Marquez Castillo', '1 basica', 95983316, 'A', 1, 'Josie', '2019-11-02 21:05:08', NULL, NULL, NULL, NULL),
(71, 'Angel David ', 'Chenche Tomala ', '1 basica', 959565243, 'A', 1, 'Josie', '2019-11-02 21:06:29', NULL, NULL, NULL, NULL),
(72, 'Nallely Elizabeth ', 'Chipre Sornoza', '1 basica', 958978264, 'A', 1, 'Josie', '2019-11-02 21:07:20', NULL, NULL, NULL, NULL),
(73, 'Briana Paulina ', 'Leon Loor ', '1 basica', 957991458, 'A', 1, 'Josie', '2019-11-02 21:09:00', NULL, NULL, NULL, NULL),
(74, 'Katrina Vannesa ', 'Briones Banguera ', '1 basica', 95799140, 'A', 1, 'Josie', '2019-11-02 21:09:57', NULL, NULL, NULL, NULL),
(75, 'Sara Elizabeth ', 'Andreina Ortiz ', '1 basica', 956588339, 'A', 1, 'Josie', '2019-11-02 21:11:06', NULL, NULL, NULL, NULL),
(76, 'Maykel Leonel ', 'Navarrete Pluas ', '1 basica', 932693898, 'A', 1, 'Josie', '2019-11-02 21:12:29', NULL, NULL, NULL, NULL),
(77, 'Leidy Selena ', 'Cepeda LLapa', '1 basica', 932432834, 'A', 1, 'Josie', '2019-11-02 21:14:36', NULL, NULL, NULL, NULL),
(78, 'Leidy Selena ', 'Cepeda LLapa', '1 basica', 932432834, 'A', 1, 'Josie', '2019-11-02 21:16:24', NULL, NULL, NULL, NULL),
(79, 'Thais Valentina', 'Galarza Laje ', '2 basica', 955525258, 'A', 1, 'Josie', '2019-11-02 21:17:06', NULL, NULL, NULL, NULL),
(80, 'Myleen Lisbeth ', 'Duarte Zambrano', '2 basica', 1759720090, 'A', 1, 'Josie', '2019-11-02 21:17:59', NULL, NULL, NULL, NULL),
(81, 'Nelson Damian ', 'Campoverde Marquez ', '2 basica', 932189609, 'A', 1, 'Josie', '2019-11-02 21:19:27', NULL, NULL, NULL, NULL),
(82, 'Lusiana Alexandra ', 'Arboleda Carpio', '2 basica', 956441034, 'A', 1, 'Josie', '2019-11-02 21:20:51', NULL, NULL, NULL, NULL),
(83, 'Isabela ', 'Arboleda Carpio ', '2 basica', 956441240, 'A', 1, 'Josie', '2019-11-02 21:21:41', NULL, NULL, NULL, NULL),
(84, 'Juan David ', 'Tarira Quimis ', '2 basica', 954450786, 'A', 1, 'Josie', '2019-11-02 22:21:27', NULL, NULL, NULL, NULL),
(85, 'Natsha Yavideth', 'Navarrete Pluas ', '2 basica', 932158785, 'A', 1, 'Josie', '2019-11-02 22:22:44', NULL, NULL, NULL, NULL),
(86, 'Noemi Alexandra ', 'Quiros Pluas ', '3 basica', 954157678, 'A', 1, 'Josie', '2019-11-02 22:24:14', NULL, NULL, NULL, NULL),
(87, 'Ivanna  Alexandra ', 'Camiel Pera ', '3 basica', 932167083, 'A', 1, 'Josie', '2019-11-02 22:25:46', NULL, NULL, NULL, NULL),
(88, 'Bruno Damian', 'Rea LLinin ', '3 basica', 935047279, 'A', 1, 'Josie', '2019-11-02 22:26:43', NULL, NULL, NULL, NULL),
(89, 'Juan Mateo ', 'Suarez Coello ', '3 basica', 932170228, 'A', 1, 'Josie', '2019-11-02 22:28:19', NULL, NULL, NULL, NULL),
(90, 'Juan Andres ', 'Golden Vera ', '3 basica', 951587299, 'A', 1, 'Josie', '2019-11-02 22:32:02', NULL, NULL, NULL, NULL),
(91, 'Eddi Santiago ', 'Martinez Arteaga', '3 basica', 954318183, 'A', 1, 'Josie', '2019-11-02 22:39:58', NULL, NULL, NULL, NULL),
(92, 'Kevin Albertho ', 'Romero Fajardo ', '3 basica', 954695441, 'A', 1, 'Josie', '2019-11-02 22:41:38', NULL, NULL, NULL, NULL),
(93, 'Josep Fernando ', 'Rivas Suarez', '3 basica', 932655780, 'A', 1, 'Josie', '2019-11-02 22:42:44', NULL, NULL, NULL, NULL),
(94, 'Ahilee Kristen ', 'Niama Reyes ', '3 basica', 957542418, 'A', 1, 'Josie', '2019-11-02 22:43:58', NULL, NULL, NULL, NULL),
(95, 'Matheus Gerardo ', 'Valencia  Bonet ', '3 basica', 932655780, 'A', 1, 'Josie', '2019-11-02 22:45:30', NULL, NULL, NULL, NULL),
(96, 'Malen Jamileth', 'Zambrano Arriaga ', '3 basica', 954732145, 'A', 1, 'Josie', '2019-11-02 22:47:13', NULL, NULL, NULL, NULL),
(97, 'blanca cruz', 'Cedeño ', 'Inicial 1', 12345, 'A', 1, 'Josie', '2019-11-04 22:07:21', NULL, NULL, NULL, NULL),
(98, 'Marcos ', 'Vilema', '2 basica', 172452186, 'B', 1, 'Jhony', '2019-11-04 22:20:49', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_usuarios`
--

CREATE TABLE `ingreso_usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_usuarios`
--

INSERT INTO `ingreso_usuarios` (`id`, `idusuario`, `fecha`) VALUES
(1, 1, '2019-09-08 03:25:29'),
(2, 1, '2019-09-08 16:05:54'),
(3, 1, '2019-09-08 16:39:01'),
(4, 1, '2019-09-11 02:00:09'),
(5, 1, '2019-09-11 02:07:31'),
(6, 1, '2019-09-11 02:07:33'),
(7, 1, '2019-09-11 02:07:35'),
(8, 1, '2019-09-11 02:07:43'),
(9, 1, '2019-09-11 03:34:00'),
(10, 1, '2019-09-12 01:03:48'),
(11, 1, '2019-09-12 02:18:15'),
(12, 1, '2019-09-12 03:47:41'),
(13, 1, '2019-09-12 04:03:15'),
(14, 1, '2019-09-12 04:04:39'),
(15, 1, '2019-09-12 04:10:04'),
(16, 1, '2019-09-12 18:49:32'),
(17, 1, '2019-09-14 16:58:50'),
(18, 1, '2019-09-14 17:12:03'),
(19, 1, '2019-09-14 17:25:31'),
(20, 1, '2019-09-14 17:28:24'),
(21, 1, '2019-09-14 17:36:23'),
(22, 1, '2019-09-14 17:46:39'),
(23, 1, '2019-09-14 17:52:24'),
(24, 1, '2019-09-14 18:00:27'),
(25, 1, '2019-09-14 18:02:39'),
(26, 1, '2019-09-17 02:43:22'),
(27, 1, '2019-09-17 02:43:22'),
(28, 1, '2019-09-29 15:46:47'),
(29, 1, '2019-09-29 16:10:00'),
(30, 1, '2019-09-29 17:27:39'),
(31, 1, '2019-10-06 21:35:16'),
(32, 1, '2019-10-06 21:44:10'),
(33, 1, '2019-10-13 12:59:21'),
(34, 1, '2019-10-13 13:39:47'),
(35, 1, '2019-10-14 13:24:24'),
(36, 16, '2019-10-14 13:26:55'),
(37, 16, '2019-10-14 19:51:12'),
(38, 16, '2019-10-14 20:05:40'),
(39, 16, '2019-10-14 20:16:51'),
(40, 18, '2019-10-14 20:18:55'),
(41, 16, '2019-10-14 20:24:00'),
(42, 19, '2019-10-14 23:09:49'),
(43, 20, '2019-10-14 23:17:11'),
(44, 19, '2019-10-14 23:45:32'),
(45, 21, '2019-10-15 00:02:49'),
(46, 19, '2019-10-15 00:17:55'),
(47, 21, '2019-10-15 00:27:29'),
(48, 19, '2019-10-15 00:30:09'),
(49, 20, '2019-10-15 00:41:03'),
(50, 19, '2019-10-15 00:47:18'),
(51, 1, '2019-10-15 15:39:12'),
(52, 1, '2019-10-15 15:58:10'),
(53, 21, '2019-10-15 16:07:15'),
(54, 1, '2019-10-15 16:09:09'),
(55, 19, '2019-10-15 16:11:02'),
(56, 1, '2019-10-15 16:14:13'),
(57, 21, '2019-10-15 16:15:13'),
(58, 19, '2019-10-15 16:24:18'),
(59, 21, '2019-10-15 16:26:38'),
(60, 19, '2019-10-19 15:11:01'),
(61, 19, '2019-10-19 15:32:00'),
(62, 19, '2019-10-19 16:06:59'),
(63, 1, '2019-10-19 23:18:52'),
(64, 23, '2019-10-19 23:28:51'),
(65, 23, '2019-10-19 23:48:04'),
(66, 23, '2019-10-19 23:53:31'),
(67, 23, '2019-10-20 00:00:32'),
(68, 23, '2019-10-20 00:07:55'),
(69, 23, '2019-10-20 00:12:27'),
(70, 1, '2019-10-20 00:21:12'),
(71, 24, '2019-10-20 00:26:36'),
(72, 24, '2019-10-20 01:21:49'),
(73, 24, '2019-10-20 01:26:16'),
(74, 25, '2019-10-20 01:27:00'),
(75, 23, '2019-10-21 02:37:52'),
(76, 1, '2019-10-21 02:39:09'),
(77, 23, '2019-10-21 02:40:24'),
(78, 1, '2019-10-21 02:41:44'),
(79, 1, '2019-10-22 08:17:17'),
(80, 1, '2019-10-22 13:23:56'),
(81, 1, '2019-10-22 15:23:25'),
(82, 1, '2019-10-22 15:28:00'),
(83, 25, '2019-10-22 15:30:03'),
(84, 1, '2019-10-22 15:38:13'),
(85, 24, '2019-10-22 15:40:14'),
(86, 23, '2019-10-22 15:45:22'),
(87, 24, '2019-10-22 15:46:16'),
(88, 24, '2019-10-23 02:31:48'),
(89, 23, '2019-10-23 02:44:51'),
(90, 24, '2019-10-24 00:36:25'),
(91, 24, '2019-10-24 00:36:25'),
(92, 23, '2019-10-24 00:37:42'),
(93, 25, '2019-10-24 21:22:40'),
(94, 25, '2019-10-24 21:33:57'),
(95, 23, '2019-10-24 21:49:49'),
(96, 23, '2019-10-24 21:56:47'),
(97, 24, '2019-10-25 07:38:03'),
(98, 24, '2019-10-31 12:24:31'),
(99, 24, '2019-10-31 13:21:06'),
(100, 24, '2019-10-31 13:58:35'),
(101, 1, '2019-11-01 18:54:39'),
(102, 1, '2019-11-01 18:54:39'),
(103, 1, '2019-11-01 18:54:39'),
(104, 1, '2019-11-01 18:58:30'),
(105, 26, '2019-11-01 18:59:32'),
(106, 1, '2019-11-01 19:00:29'),
(107, 1, '2019-11-01 19:06:55'),
(108, 1, '2019-11-01 19:21:49'),
(109, 24, '2019-11-02 16:06:31'),
(110, 26, '2019-11-02 16:08:51'),
(111, 24, '2019-11-02 16:09:32'),
(112, 26, '2019-11-02 16:10:42'),
(113, 24, '2019-11-02 18:21:54'),
(114, 27, '2019-11-02 18:22:49'),
(115, 24, '2019-11-02 18:23:11'),
(116, 27, '2019-11-02 18:23:59'),
(117, 24, '2019-11-02 18:24:57'),
(118, 24, '2019-11-02 18:37:50'),
(119, 24, '2019-11-02 18:43:59'),
(120, 24, '2019-11-02 18:47:16'),
(121, 24, '2019-11-02 18:49:39'),
(122, 24, '2019-11-02 18:51:18'),
(123, 24, '2019-11-02 18:52:59'),
(124, 24, '2019-11-02 19:15:34'),
(125, 24, '2019-11-02 19:17:27'),
(126, 24, '2019-11-02 19:20:12'),
(127, 24, '2019-11-02 21:35:35'),
(128, 24, '2019-11-02 22:18:19'),
(129, 24, '2019-11-02 22:51:44'),
(130, 28, '2019-11-02 23:00:29'),
(131, 28, '2019-11-02 23:14:48'),
(132, 28, '2019-11-02 23:19:10'),
(133, 28, '2019-11-02 23:21:12'),
(134, 28, '2019-11-02 23:24:01'),
(135, 24, '2019-11-04 21:37:47'),
(136, 25, '2019-11-04 22:15:22'),
(137, 24, '2019-11-04 22:22:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension_cab`
--

CREATE TABLE `pension_cab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `usuario_create` varchar(25) DEFAULT NULL,
  `fecha_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_update` varchar(25) DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pension_cab`
--

INSERT INTO `pension_cab` (`id`, `anio`, `mes`, `total`, `estado`, `usuario_create`, `fecha_create`, `usuario_update`, `fecha_update`) VALUES
(20, 2019, 9, '1720.00', 1, 'jose_daniel', '2019-09-14 17:12:08', NULL, NULL),
(21, 2019, 1, '660.00', 1, 'blanca_cruz', '2019-10-14 19:35:20', NULL, NULL),
(22, 2019, 2, '720.00', 1, 'blanca_cruz', '2019-10-14 22:43:03', NULL, NULL),
(23, 2019, 10, '1130.00', 1, 'ingrid', '2019-10-19 23:53:54', NULL, NULL),
(24, 2019, 3, '2350.00', 1, 'Jossie', '2019-11-02 23:24:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension_det`
--

CREATE TABLE `pension_det` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpension` int(11) NOT NULL,
  `idestudiante` int(11) DEFAULT NULL,
  `anio_curso` varchar(20) DEFAULT NULL,
  `curso` char(1) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL,
  `token_genera` text,
  `token_valida` text,
  `cancelado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pension_det`
--

INSERT INTO `pension_det` (`id`, `idpension`, `idestudiante`, `anio_curso`, `curso`, `total`, `token_genera`, `token_valida`, `cancelado`) VALUES
(36, 20, 4, '6 basica', 'A', '510.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.u74Ebli8sh_C2YJNAu_s86Cqpk7Un8USBU744hjKS4w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.idBYfXq-zeOxOm_t1c4hlCG_ZHXo-hBWSNmiH4xJ_6Q', 1),
(35, 20, 3, 'Inicial 2', 'A', '20.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.bDYA6XF548-OxBpXAPcb0m95laDWEv8aBhAaV3zfjmw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.MAkbnblsAs0xqPXZDi1-1qnOo0K9eg98BlB9lV2xl4E', 1),
(34, 20, 2, '5 basica', 'E', '490.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.VCFmPv-LsHv_MsY2RROuc8Vj-uAMVYn2TQfOsOSE93w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.p2H0FZRR7KlkA_i2rm8htOvUf2Ed2ezhtS-dt1QSEbw', 1),
(33, 20, 1, '7 basica', 'C', '700.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.T0R7EI7Tbr5ho-T-o3fyNFLXnWFXNArRn39PT7WmVFI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.clSV8-eRXDWwMo8T_PggrjWkhvbdBnZlQEADJXXZSjc', 1),
(37, 21, 1, '7 basica', 'C', '300.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.T0R7EI7Tbr5ho-T-o3fyNFLXnWFXNArRn39PT7WmVFI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.clSV8-eRXDWwMo8T_PggrjWkhvbdBnZlQEADJXXZSjc', 1),
(38, 21, 2, '5 basica', 'E', '100.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.VCFmPv-LsHv_MsY2RROuc8Vj-uAMVYn2TQfOsOSE93w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.p2H0FZRR7KlkA_i2rm8htOvUf2Ed2ezhtS-dt1QSEbw', 1),
(39, 21, 3, 'Inicial 2', 'A', '60.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.bDYA6XF548-OxBpXAPcb0m95laDWEv8aBhAaV3zfjmw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.MAkbnblsAs0xqPXZDi1-1qnOo0K9eg98BlB9lV2xl4E', 0),
(40, 21, 4, '6 basica', 'A', '200.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.u74Ebli8sh_C2YJNAu_s86Cqpk7Un8USBU744hjKS4w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.idBYfXq-zeOxOm_t1c4hlCG_ZHXo-hBWSNmiH4xJ_6Q', 0),
(41, 22, 1, '7 basica', 'C', '300.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.T0R7EI7Tbr5ho-T-o3fyNFLXnWFXNArRn39PT7WmVFI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.clSV8-eRXDWwMo8T_PggrjWkhvbdBnZlQEADJXXZSjc', 0),
(42, 22, 2, '5 basica', 'E', '100.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.VCFmPv-LsHv_MsY2RROuc8Vj-uAMVYn2TQfOsOSE93w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.p2H0FZRR7KlkA_i2rm8htOvUf2Ed2ezhtS-dt1QSEbw', 0),
(43, 22, 3, 'Inicial 2', 'A', '60.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.bDYA6XF548-OxBpXAPcb0m95laDWEv8aBhAaV3zfjmw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.MAkbnblsAs0xqPXZDi1-1qnOo0K9eg98BlB9lV2xl4E', 0),
(44, 22, 4, '6 basica', 'A', '200.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.u74Ebli8sh_C2YJNAu_s86Cqpk7Un8USBU744hjKS4w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.idBYfXq-zeOxOm_t1c4hlCG_ZHXo-hBWSNmiH4xJ_6Q', 0),
(45, 22, 5, 'Inicial 2', 'B', '60.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI1IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.Y0NSZVwQA174Ffx4tyBKIi1XIUayxTiAjJk3D_bpEbI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI1IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.zy4NrxTQW9QvNg2Cx1RSUsSZsqT0MNf2lKS26T1H8yk', 0),
(46, 23, 1, '7 basica', 'C', '300.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.T0R7EI7Tbr5ho-T-o3fyNFLXnWFXNArRn39PT7WmVFI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.clSV8-eRXDWwMo8T_PggrjWkhvbdBnZlQEADJXXZSjc', 1),
(47, 23, 2, '5 basica', 'E', '100.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.VCFmPv-LsHv_MsY2RROuc8Vj-uAMVYn2TQfOsOSE93w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJFIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.p2H0FZRR7KlkA_i2rm8htOvUf2Ed2ezhtS-dt1QSEbw', 0),
(48, 23, 3, 'Inicial 2', 'A', '60.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.bDYA6XF548-OxBpXAPcb0m95laDWEv8aBhAaV3zfjmw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzIiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.MAkbnblsAs0xqPXZDi1-1qnOo0K9eg98BlB9lV2xl4E', 0),
(49, 23, 4, '6 basica', 'A', '200.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.u74Ebli8sh_C2YJNAu_s86Cqpk7Un8USBU744hjKS4w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.idBYfXq-zeOxOm_t1c4hlCG_ZHXo-hBWSNmiH4xJ_6Q', 0),
(50, 23, 5, 'Inicial 2', 'B', '60.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI1IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.Y0NSZVwQA174Ffx4tyBKIi1XIUayxTiAjJk3D_bpEbI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI1IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.zy4NrxTQW9QvNg2Cx1RSUsSZsqT0MNf2lKS26T1H8yk', 0),
(51, 23, 6, '7 basica', 'B', '300.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI2IiwiYW5pbyI6IjcgYmFzaWNhIn19.u3nW_Y9ES3sZo8gjOMylWhUujao7iVK9VW8dWrfcMeE', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI2IiwiYW5pbyI6IjcgYmFzaWNhIn19.V-SWBPik7d7iixJMQtJ__ZdeFNltOxEirjkz2IKlarc', 0),
(52, 23, 7, 'Inicial 2', 'A', '60.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.eaIvoboseCYoINnnXMPn02IdrR_dIECzczBxtn2AoAQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.YEGj3mDNJbv_c2j0tGPlP7Qvbpr9LJ4sxAZyw2lm4Mc', 1),
(53, 23, 8, '', '', '50.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiIiLCJpZCI6IjgiLCJhbmlvIjoiIn19.7xreXIpunG8W4WsECAvZhZPoIcOU5P-TNhJrydg8X34', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiIiLCJpZCI6IjgiLCJhbmlvIjoiIn19.Sc5Q2N6YzqyN10K7QmUtFW9FuKax4N21KuK9DdxD5sA', 0),
(54, 24, 1, '7 basica', 'C', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.T0R7EI7Tbr5ho-T-o3fyNFLXnWFXNArRn39PT7WmVFI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJDIiwiaWQiOiIxIiwiYW5pbyI6IjcgYmFzaWNhIn19.clSV8-eRXDWwMo8T_PggrjWkhvbdBnZlQEADJXXZSjc', 0),
(55, 24, 2, '5 basica', 'B', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.ltili69ZgNXYZRkf8ZnPLKe6aGzJCdxNPtOVH8Ysidw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiIyIiwiYW5pbyI6IjUgYmFzaWNhIn19.AexVT3sGhIH5YIVAZJ0j45O59kg0cTn5rMj4ySd0Dkk', 0),
(56, 24, 4, '6 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.u74Ebli8sh_C2YJNAu_s86Cqpk7Un8USBU744hjKS4w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0IiwiYW5pbyI6IjYgYmFzaWNhIn19.idBYfXq-zeOxOm_t1c4hlCG_ZHXo-hBWSNmiH4xJ_6Q', 0),
(57, 24, 6, '7 basica', 'B', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI2IiwiYW5pbyI6IjcgYmFzaWNhIn19.u3nW_Y9ES3sZo8gjOMylWhUujao7iVK9VW8dWrfcMeE', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJCIiwiaWQiOiI2IiwiYW5pbyI6IjcgYmFzaWNhIn19.V-SWBPik7d7iixJMQtJ__ZdeFNltOxEirjkz2IKlarc', 0),
(58, 24, 7, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.eaIvoboseCYoINnnXMPn02IdrR_dIECzczBxtn2AoAQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3IiwiYW5pbyI6IkluaWNpYWwgMiJ9fQ.YEGj3mDNJbv_c2j0tGPlP7Qvbpr9LJ4sxAZyw2lm4Mc', 0),
(59, 24, 8, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4IiwiYW5pbyI6IjQgYmFzaWNhIn19.Aj1dAJ6gfnmgiq_mC2IJjSzRtQbCvwX1sAkG9MWc5Ok', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4IiwiYW5pbyI6IjQgYmFzaWNhIn19.3Vk8G8TTqq-K8zJkPoJJQMf9radpdTd-G62V5A1P17w', 0),
(60, 24, 9, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5IiwiYW5pbyI6IjQgYmFzaWNhIn19.0VMZpxyK_D0105xn4QxxZZsMsstTLE94luiad42EBqc', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5IiwiYW5pbyI6IjQgYmFzaWNhIn19.efaKjkuqR_BMZD3k8rASB6IktDogJy4xMzYWVBZRgJ0', 0),
(61, 24, 10, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMCIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.8FFCuvw3Tsiw86TCgtWvG9wmupsKkiIqg435UU7WU9o', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMCIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.WBb6jB0qumL3w9wZENDMN7qzRkD0v1wHkW7F41b0IhU', 0),
(62, 24, 11, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMSIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.APfscr5B7HRnpbJq1Vgt1_918W_1kkyXSERPhWRCk5g', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMSIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.YahLIrMZ57Ma9wEevGtxpdVGGkLRDbM8GET21Az4_pg', 0),
(63, 24, 12, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMiIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.lFVilIY28i5eL5wU94ub3vSz7f-dv5d0DaUctdI1B08', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMiIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.YWt6zccBR5t8uKk3m_rfMqeNte7KZdiRuPPxd2v46nE', 0),
(64, 24, 13, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMyIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.aZbYt9FLlax2wcxphW2g5DIQx2Q2AvFD6pifCC5lYOM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxMyIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.NAAMPaHUl6-En4X5NK1_fTbVc18l_ET3ptaJjUJsGPc', 0),
(65, 24, 14, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNCIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.GDYV1s5p3IP0nnu67E-dnHlh3pn70C91te-a9CjgfSA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNCIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.Qyy9H3tbL_Z73HFPly-az-cSu220bO_My_tf7QAgj2s', 0),
(66, 24, 15, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNSIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.U_5jU-Dy6skFxzrevxtKWpc5pNJQfykkRCkx9XMAtiM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNSIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.dEn_5DsEKwFNMQ6Fv-QQD3ua21FlckrJ5fj_ddyFzKM', 0),
(67, 24, 16, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNiIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.eJUQJjhkTxwl-ug__XR8jejXycn6gZtxaOPha-urEuE', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNiIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.BrUfB4_4yLP_8kmVwyQoG0AuxWS2pXip9jxm__Fbo3U', 0),
(68, 24, 17, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNyIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.4cdUTyym_KF9KiwgkDDgmNSxrBU5NCPrwQRhuMh00dg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxNyIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.fY_dGVeQ4yJAsJ0ivAgx62TkUNGbxywtTS0eEmxQkac', 0),
(69, 24, 18, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxOCIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.G_W_Qztu0qB5S6RLAMxjTHa-khb29JOyZUP-CA5Kw4o', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxOCIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.hOJYvQ2Jl-jWxk4VlMsvQOrpWGO814qSMQz_Q0eZTxs', 0),
(70, 24, 19, '4 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxOSIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.XP7COquJTBZ9KTWMyBqIYeLkXrtYrXAaXmVfeRa_Tb0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIxOSIsImFuaW8iOiI0IGJhc2ljYSJ9fQ.bULwyvvWUzsJrYXi9v0bH_vbdZyfGtZZWeC3hMk2VGc', 0),
(71, 24, 20, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.MHn15BfumAe4Pv5ijuuud7qhRlJwlRZzw5rZTuZ7hho', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.LyNSdQ8wcWjugEQvzCq7c5ek2XrTnOE2lzVXZtXtdVA', 0),
(72, 24, 21, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.9qC2zcqJup5pCD58H2cpmlqceJU62M1I0EhQucHZZ20', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.iYCwJJtn4VXfrM8aUZyMQ0fNWalxRuqcLQ6oIClajt0', 0),
(73, 24, 22, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMiIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.GluIAvthHqewbLKd5X59gLyfsKrPbmZWf5hAtC48h_A', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMiIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.pTUOXO8xKo75ZBRxivGLTOqfg5QubbYRkFAZNcaUOzs', 0),
(74, 24, 23, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMyIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.-IMI2kmPLw79naWrCGGd4_ka1Y0_SF0kwC6XmO1Y33Y', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyMyIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.PCpIx5o6oSOwO-z-KLAHlBVQ7j1NFgtk6fdBOusSdAU', 0),
(75, 24, 24, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.koj24AYymxmvhSGoSwNOaKNqjkdtLvkzINPWuWN_UY0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.YeDHur3K7IBGNvyHtmWSB2dHsUx50kPCUyoUcmxbfIs', 0),
(76, 24, 25, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.KogQN0H6VZpHrRtGJteP2y-Lg-ApsYAkf4XwGwpGXcM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.6zt5mDgUK-E0UFyqk9QI2hdcE8z7CYjoiUdoMY2RJhw', 0),
(77, 24, 26, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNiIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.U7otSzN5oTRvEWh8DM-CWeZfAlmfq51M4J9g8vphPGM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNiIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.oKbKOM0scTNVciHDHoJggIrlZc3kKikDg_HPahZ7QL8', 0),
(78, 24, 27, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNyIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.X5kqASdXxsNMNDDIAKQWIKZNlVNjRIl0OwDp6UpSmds', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyNyIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.H4czE2mAbNn6Kbz1gg5q4GLZNYFKC7nbjIDZcY_hmRk', 0),
(79, 24, 28, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyOCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.1Oj0FW5VUHf1YXxTgKGI35YjWkTkiElEgJAy_S7Q7GI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyOCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.qqJe48uZbESqqGwFXKMvELYXemn9BI71f6NCXHwWT3M', 0),
(80, 24, 29, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyOSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.exCaWwYJaZXRXE6EvEhlRQUKrVv6zzhvVf787XZy8Sw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIyOSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.wL_wgOylrZhFfG35GF4_ls1YJ12XRaGRknibEsuVbbI', 0),
(81, 24, 30, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.rUaJQdCCJJ07d-y0ZTqTwnKD4zlfYTqLGPXnOqq3Wgo', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMCIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.B7D_pPI0EvfeguJ6DP36O9ZdG5-sYpKvcZExYYu75SU', 0),
(82, 24, 31, '5 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.IqmgUlDMSVBB0G6Ziv8F_VAffIyZ97J8zeMvmCcFUqw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMSIsImFuaW8iOiI1IGJhc2ljYSJ9fQ.S8bmfbQdBr0WyS3_JOPPHCEmBjzwXa78_483IjYBev0', 0),
(83, 24, 32, '6 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMiIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.a7yg7YRNpKQC9J8Fu2-BcnA01tjE6XiTldAi856J3EM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMiIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.mV4YhnVGGAlivDIvNeNn56I37w0PJaoe_BtgQPVYRPo', 0),
(84, 24, 33, '6 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMyIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.vBVJ8TnOiNg33KeHWvJp0b26ygoyFtCI7FGge4ecPWc', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzMyIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.tENYVO88UCdPYHlHdmJ5RJDFR2-g3x225BfzpzyS_zY', 0),
(85, 24, 34, '6 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNCIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.vTpTY_wPfikJa8RpXkNplFa78p4lC5alOas40Fzpyak', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNCIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.8_3h48r9GUPeUK59kd1kY5Kv2Q7qenoNJonjI7DKMZw', 0),
(86, 24, 35, '6 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNSIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.0ePWdb44tsRnjwzawWCbAhz_PiEP2xlGq-07TOTOwlw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNSIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.n4jWmVABhJ0alQ5qaW3eWOyLZSxGlkbwrIOHgDgw6v0', 0),
(87, 24, 36, '6 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNiIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.6pfTlp_sujm8NXfL9VBs-D5lpOMlid_8SKChnvRHVl0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNiIsImFuaW8iOiI2IGJhc2ljYSJ9fQ.CZRqzc6bu1iHp06dPuUgOU4c8RuELWqrwlXWvzQg6Lg', 0),
(88, 24, 37, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNyIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.YkJ4jmmsM4Zjj7h9bR5-hFsCj7NnZaAoSMl4eP6liUU', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzNyIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.DNmYRfPGNIzn_xAtMgRaj-U-plbaeebhrMU1b6u7OQ8', 0),
(89, 24, 38, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzOCIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.fjqm-q0jBxWDm8qRF261xxA-C6NzbShzOEhXBryHMFQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzOCIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.WEELSNETQyySDD6Ys6QGwMj8eAoa6NK2YRkhsE3GarE', 0),
(90, 24, 39, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzOSIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.P0bfrzuFINOUwuNYgMPi8N5CrtONNo0zGqrlZRIJeZA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiIzOSIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.iGI-IOpasFUsIXKXoHfUEJp5TJY7aUvU9NTBcI3sbLU', 0),
(91, 24, 40, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MCIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.EtftlW70MsVNkq4N6fsZ5zVK3AITax00Y9umXoOuP5w', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MCIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.8tPQU588vjR0-yUK2meAyuIYxuAgJQCAM9Hp-KZcgsM', 0),
(92, 24, 41, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MSIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.sfngmJt-tEdM0ZWIAi-3BAyHJ4obFMxGve_w4krWjU4', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MSIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.t5H7FuHaHl7RgCiFppeV3JsVkyX21Ne6Ah9IXzrCfO4', 0),
(93, 24, 42, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MiIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.GX7kRjmaGPArfUo09mkEV1dh-ebU4pSKUhJf9mwzSO4', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MiIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.ZE037jtFgWTeU9_qeNTw0MsVZ1vkdhBbWF3zf7145Go', 0),
(94, 24, 43, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MyIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.11aG-ehKE13O9YpB89K8ccZjOrDpxszM6B7OJB_19A0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0MyIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.XlTuTf8oefc1gxlwatLREHq5gulP2xJwIUSFfmmWqLw', 0),
(95, 24, 44, '7 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NCIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.yVCn2Q5VSZkQypkkwycKfBB7uX-IGKqm18X3F9ruLt0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NCIsImFuaW8iOiI3IGJhc2ljYSJ9fQ.xC6c54ACmx1peMB7wZlTW8ZpfjPe-mkfxAFRHSnEnWI', 0),
(96, 24, 45, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NSIsImFuaW8iOiJJbmljaWFsIDEifX0.xVOfGNuBM9sgXJsa7ruTfSqNioGOi1NmJUOYdzuACY4', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NSIsImFuaW8iOiJJbmljaWFsIDEifX0.EuY2Z3-qxzuMzMVWaCZb1_w_DHjS_YV5KlorYNA2TJE', 0),
(97, 24, 46, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NiIsImFuaW8iOiJJbmljaWFsIDEifX0.gHshSIfv-0mDZC-KNJDMx5WIP8VYZ06MVh7sfEX0MnY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NiIsImFuaW8iOiJJbmljaWFsIDEifX0.Rm1BKfkplFHFHEWXMRuW75PbGzx8QUg3jimp0HcpsyU', 0),
(98, 24, 47, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NyIsImFuaW8iOiJJbmljaWFsIDEifX0.NhGPwGiwL0draWn_ID5Y7g-plwh4c356enPh0zS5mSA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0NyIsImFuaW8iOiJJbmljaWFsIDEifX0._QEAzIfpf1PpvguqsHPW_GmbV_BtLd6cZ8Jw9m_a0sU', 0),
(99, 24, 48, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0OCIsImFuaW8iOiJJbmljaWFsIDEifX0.BBpeitMZWnYrqqmLRDuBj5gvkZ9dEhrog72vskRxFf8', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0OCIsImFuaW8iOiJJbmljaWFsIDEifX0.6LFMETpHf3S5cLAGb6dV6UxuXVQWbEVlNYi_v5mnmxE', 0),
(100, 24, 49, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0OSIsImFuaW8iOiJJbmljaWFsIDEifX0.mOn0NM9aw3l4LNltFi0bYQ6ja0zeGHJXsOHMaQHVycI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI0OSIsImFuaW8iOiJJbmljaWFsIDEifX0.rFQ4NLPEY0J3ps_6T2f5qcura9kfp9t-YjBYCdHbk6w', 0),
(101, 24, 50, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MCIsImFuaW8iOiJJbmljaWFsIDEifX0.cqz6vS8uvKBiLdhaVeGkJxI9q7YPIJUBMPHPxuxODCM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MCIsImFuaW8iOiJJbmljaWFsIDEifX0.50xhEiZT9GfmHRAT32V7O9sM6YdNKFz5GWfvkvoF1iw', 0),
(102, 24, 51, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MSIsImFuaW8iOiJJbmljaWFsIDEifX0.4mcKphi6QEJSz7qDvpAyZgt3iAJh-mY7xjRoN4Yzz8k', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MSIsImFuaW8iOiJJbmljaWFsIDEifX0.eSSDPtx94EsgqfBcc3nhPymonuXGoW8gK_9_fQ9jk5A', 0),
(103, 24, 52, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MiIsImFuaW8iOiJJbmljaWFsIDEifX0.klUF_vptuuTAIN84ByDoNcwqy_At7I4_OklLx0JK4vk', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MiIsImFuaW8iOiJJbmljaWFsIDEifX0.obvPf1c-YX5WLqxgD6Ess8xYYvxCveojyPeb_utswsM', 0),
(104, 24, 53, 'Inicial 1', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MyIsImFuaW8iOiJJbmljaWFsIDEifX0.h8yIFxoQrL18NLMd1_AqHguMFJDlu-mgiM6K2bIAn44', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1MyIsImFuaW8iOiJJbmljaWFsIDEifX0.-7qgvO4UEgqIVRIpn64jyGauM5s1n-RUahcyS2-WTQs', 0),
(105, 24, 54, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NCIsImFuaW8iOiJJbmljaWFsIDIifX0.Latz9GrQ5VqDUcO6m4WWFo90LJTqTCDZ6LU69s-oR_Y', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NCIsImFuaW8iOiJJbmljaWFsIDIifX0.Crq8ijGZl8vZDoozcd5i6WnTOKOS1z08eBvl2KfPw8s', 0),
(106, 24, 55, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NSIsImFuaW8iOiJJbmljaWFsIDIifX0._y1m-Hnnk355qhL6zgqDi7PgcWVkh_4TSllSlLsACoY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NSIsImFuaW8iOiJJbmljaWFsIDIifX0.XMhFCof4IwLsr_LTS7Neb9zR1-3dhawMO_ItLLWAar8', 0),
(107, 24, 56, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NiIsImFuaW8iOiJJbmljaWFsIDIifX0.zNXtTlxL8uiXHz4ZEvHZY2F_6gmirVFTJxwJBeZ1Xbs', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NiIsImFuaW8iOiJJbmljaWFsIDIifX0.PGT7YOXAgPf7HgdYh72Gov2dClHkIuFA1ayC1r4uKqk', 0),
(108, 24, 57, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NyIsImFuaW8iOiJJbmljaWFsIDIifX0.5Y22IYnU5aBv7BCB8pAsrwc9VPg1fPdLf25WE-B-9s8', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1NyIsImFuaW8iOiJJbmljaWFsIDIifX0.rc9ktU9dMSse6JlbKKNsAsLcHedlwpDQ0AnZa2HKNGA', 0),
(109, 24, 58, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1OCIsImFuaW8iOiJJbmljaWFsIDIifX0.CD_prz156bch5y8Ebwxov-TtRd5vlAOAfIR877BsjSI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1OCIsImFuaW8iOiJJbmljaWFsIDIifX0.5SdFMMTHFxSv1qkpwMcu2RzQ0PO9b52eCKqhOpCqfa0', 0),
(110, 24, 59, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1OSIsImFuaW8iOiJJbmljaWFsIDIifX0.xblRRVtQevUveLutqNNYS2LM-xGBnnoavadJGxmDsEQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI1OSIsImFuaW8iOiJJbmljaWFsIDIifX0.1PGg4g3fcI_lCufhgz9ILxuXmaz5phk8OTYQeiscqQc', 0),
(111, 24, 60, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MCIsImFuaW8iOiJJbmljaWFsIDIifX0.OetrnJieSnlbctuT0KzGr_q2QrL7pO3TAOP7MofUZGQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MCIsImFuaW8iOiJJbmljaWFsIDIifX0.D3MIEee8AzI30ppsWxjpQvCQG08l5BLE03wnClhlZ_0', 0),
(112, 24, 61, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MSIsImFuaW8iOiJJbmljaWFsIDIifX0.BLyFvktGF8AI7UIUEMSpeuBdFcwowk8EJCcgp54-BZQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MSIsImFuaW8iOiJJbmljaWFsIDIifX0.chGi9JviDfiZ849cLDVxZnPahtPPkWOXFHs2Bg_CF-M', 0),
(113, 24, 62, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MiIsImFuaW8iOiJJbmljaWFsIDIifX0.xQCZDRpqRKzTDaP5nVI0jcGLE9FH1ixR4s9AS1UOEQc', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MiIsImFuaW8iOiJJbmljaWFsIDIifX0.quGkbeWXg_OGH6WDC-Ks1xJzbmUNHFnWxIo4jc58tUw', 0),
(114, 24, 63, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MyIsImFuaW8iOiJJbmljaWFsIDIifX0.yv3TlPMG_AcSsG-f0cuPpS472W8neGnupSZauC74BTg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2MyIsImFuaW8iOiJJbmljaWFsIDIifX0.mnU68QgpvRjSs4q61LqUdAOudDdTN7As60IsRVPffrI', 0),
(115, 24, 64, 'Inicial 2', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NCIsImFuaW8iOiJJbmljaWFsIDIifX0.NVRLsf9uj3UIWS44sMKlfBzU3sO_XLCOVnu6th_lNPc', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NCIsImFuaW8iOiJJbmljaWFsIDIifX0.3-xpiKn0S_BZIxv6eEIiM3NHKu6AXmkh_LIk08h-lMQ', 0),
(116, 24, 65, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.TAOKcRB1KAYu-3MNB99nqfxplGzeStGumVu7NCH5Ws8', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.5e4fR-Txov2YTO_CrEvrKo-BNbaWCK5VEQdYgJtxPdE', 0),
(117, 24, 66, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NiIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.6g8ge_ZjoLOlxr9SA6JyPei1ZP_x3PtTPFSm8ZRkKV0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NiIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.K_IfDPEAV9-birZf0pUfFIHcNIBvOWYBQCcMne21LpE', 0),
(118, 24, 67, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NyIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.VPjTB9PIVZzS5ahFR081PzB-gBAVVemXTRdjqs9LtCQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2NyIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.FUGRSomJha84Bweyo8AYuXhmUtu18sTMXtAoEtfSP2Y', 0),
(119, 24, 68, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2OCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.XID2Rx5-q3pNAlxNX6HvnPw-W4rv7HK6-1HOHEEymnM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2OCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.G2IghOpoJQrhdgPd6YqnW5eCtDIN93H0CdoYwhdrN7k', 0),
(120, 24, 69, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2OSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.lVaN9h9A4S42wo760KfcqFYG8T6ubDEYIPhihRKbJ3s', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI2OSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.3V63nKj7jgDtDbxDtTe3jUfyeXZRVj5NvQaYe7WbKDk', 0),
(121, 24, 70, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.4QOaUcC7B0Tgvz8ZeDBI-4Od7RzF9_NlbpwGLs7aKVY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.V53an6RI8WTNDP0sFq0tKhDdwnJTfjeIL3ZQDw-tTVM', 0),
(122, 24, 71, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.eL13nzuZr0QlLggIrrCibd6uUW-FTe1Wy59vvUQy3YM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.Jfe1HrOif9rVcY4kV2McST0lt6TSx3U6Bwp4OgnaWvs', 0),
(123, 24, 72, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MiIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.pjdzPgNfS6WQDSfGqSk6LxMepLTdps0DNqR0f0FDlSg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MiIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.arRT1kZodrOgRYA3jIihCOWD3u0G9GxopmkDZgLt9CI', 0),
(124, 24, 73, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MyIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.w4pYaKY1jSgmJXguTz3h_Gggcc9FbG_zJqp4Ig4vK6o', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3MyIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.qeAWxYPEQ6MTDXyEavAMhVdHYuQ3WfGGb3pYB8S5L6o', 0),
(125, 24, 74, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.9z29UkmLo0Lt8K1zvn5dknWjbEIclRj6P-l88j5MJ6U', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.Vh5Rs6xd2GV39I0s3oSQcJWOiovIa-GwR9JvvCCmIkE', 0),
(126, 24, 75, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.hNLw6tKmhNijtfZIUulPADGAb5NXCL9cPztT9aYwsKw', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NSIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.WuzD15wz7r5Ux1qN9-U9dG-bpcJJgVzl4ZlB3OAe3iA', 0),
(127, 24, 76, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NiIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.OEcWfqQEZnocJ9puoi-5R0tNfIMYomVKkrPsm3zgjXA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NiIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.T7lR82tKu71zBlK0KTjdkcL0PiJC5GgLLLNC2TpnGWQ', 0),
(128, 24, 77, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NyIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.KpAVh4_bx73vvx4LD_VeAZZLiauzJlLlqgXQwE4UOOM', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3NyIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.FVjOm6ML3irgAN42HpYicwVf_7FWIFbPu14dc-oxMUA', 0),
(129, 24, 78, '1 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3OCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.QqZRfAt60u1GHrL11RrTV-QoV4MmRHfLVEVew1PfNf0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3OCIsImFuaW8iOiIxIGJhc2ljYSJ9fQ.EYPhJGYkh9_6lq-IzA65iuGnYNFgMQa5wFFycG47OBw', 0),
(130, 24, 79, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3OSIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.SXQF01LQnoRYP5y7IwfMLq0wXuH0O_IUI-HrQLZuHP0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI3OSIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.lnUNKwDtOIcVRwCPmbHoZsIEdQk4vfmdFkRKbaWIKB0', 0),
(131, 24, 80, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MCIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.CoDccxMs8fEv2QGn7gnASBiFdGTyute0-Z39ymnbm88', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MCIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.CVOoBKHlH-jQcHH_4_fSgiI3mk58nDTsnySnC2ItY6w', 0),
(132, 24, 81, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MSIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.iMz5So9JKcsDoxRQz4qU9y2HoZ7ZQdJquwyp8CpTf3g', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MSIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.tjW8Fhye4u8ffNvDAfd74cPUHRw5aT-JkQEG86OK_5Q', 0),
(133, 24, 82, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MiIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.sTGn3vAfJ92E-PJl5h3Jsr8dnhkGyV2tcVTlb4u0K1U', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MiIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.5w3JDa373thnvRkDFnM4Kbef9f0mdD0gqkCBUXB8yls', 0),
(134, 24, 83, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MyIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.7I9oVgZw3E7b0p3ZZDnramt8a09-tXY99Zvj5SsDNZg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4MyIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.nAbnPewtDu9pqEUISQX-Mr-pq1F57pvy-SgPri1O0c8', 0),
(135, 24, 84, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NCIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.TSFAJG04LZvARglS0I52GLQabrlncFTYCyKUW86c4qo', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NCIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.0UQ_G5Dlyxu-iWm-89cNTnXf4kvOHomF3qUp9Y9pjiI', 0),
(136, 24, 85, '2 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NSIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.EaVeRx_Y15R6zdmUzBqitUHD6EM8Q5SfnhrEqqzrubQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NSIsImFuaW8iOiIyIGJhc2ljYSJ9fQ.GXZro9puZP3AE-qrPU_oXLUG5_w-6dGcvPL_jiX7bwc', 0),
(137, 24, 86, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NiIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.BeEnMAN0dsCzWRl5F9dW5LYQMV3sj6dvFCSptu4AiZU', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NiIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.UaN6Kthy0_2ue5m8bGNAxo4FyTANryER-02-GfGgubE', 0),
(138, 24, 87, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NyIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.EudE8kCSH5hy_E1dA0Nze1KeYu11mBrtkYVfyrNOnoY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4NyIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.RL5MxEN5zoPRbKJSlVo0mdrK6PffDsGwQJYCfW29SUI', 0),
(139, 24, 88, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4OCIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.GBuJ_lAn5vTXMaZMwmF7AAb2dIkUwxnzX0SuBzVTD6s', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4OCIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.E3x_5h11qGbQGqjw3zys5LHHsdZdZ_5pBNCW06YPaJU', 0),
(140, 24, 89, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4OSIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.Z1sn2ceOV1fujZiFAowlV8F8Panj0HVvvtyVlAWbYSc', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI4OSIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.NyLpX3YzFmioMwVCAz4dV_v6Rh0XOANZ-b3MfmLJUW8', 0),
(141, 24, 90, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MCIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.g_vqZirb348q4p5e1nEQZJ7YaMXeJIgP-4Lb55tDwlE', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MCIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.v2n7rbglrSNjBSiLA1p4aOBOz4cjsjD5K9YSTwS_VHQ', 0),
(142, 24, 91, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MSIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.95jmOwsjaqq1svYYzvOW8_JMk7YWmfNAjvrTCCY4viA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MSIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.EuBd8pAbSGHexyMCU8dRtEL02mDtIOK_ZriVOsxv5O8', 0),
(143, 24, 92, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MiIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.tOU7UZPGS7qfHdPV76XeXyREYoKJpNugzyEKj0PcqeA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MiIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.CbH9oW3u99GT8pN2I3ic-xd9oc9CFGRxtrMHOurWtWE', 0),
(144, 24, 93, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MyIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.YEqs6xFRzHIuRjWXU05yNWSBbZtldw9koJ2EIWA5g9g', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5MyIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.lSzrhIJrq_2mwl1OwM1y_zpdTbKqdBV2ImZ1pHNwQ6s', 0),
(145, 24, 94, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5NCIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.o57wt8Jr4PH0vr3jB4bA3CEzHXvdqRZ5onX20aE1Fo4', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5NCIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.HPWaJKAT1TXRGRrv67RCFr0G2RN397Wqf9Vzt3w-FGg', 0),
(146, 24, 95, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5NSIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.edO9blPWUkSu5W5YnClipMSIc2JNsbZv1c86CU150cE', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5NSIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.WIKtObhiklHRGkthk3kuClAd5rZbYETzyE-vJfEvhkg', 0),
(147, 24, 96, '3 basica', 'A', '25.00', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5NiIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.a-oUqp-wKZ8vnIRNRjibOj1sDtKUco9qv1zDF1qyEeE', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImRhdGEiOnsiY3Vyc28iOiJBIiwiaWQiOiI5NiIsImFuaW8iOiIzIGJhc2ljYSJ9fQ.kyWzmlJ-xbER33dANhu_yYOxDeqwG5J0IFxFBKJJIu0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` varchar(15) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `anio`, `precio`) VALUES
(154, 'Inicial 1', '25.00'),
(155, 'Inicial 2', '25.00'),
(156, '1 basica', '25.00'),
(157, '2 basica', '25.00'),
(158, '3 basica', '25.00'),
(159, '4 basica', '25.00'),
(160, '5 basica', '25.00'),
(161, '6 basica', '25.00'),
(162, '7 basica', '25.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` text NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombres` text,
  `apellidos` text,
  `estado` tinyint(1) DEFAULT '1',
  `fecha_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_create` varchar(15) DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT NULL,
  `usuario_update` varchar(15) DEFAULT NULL,
  `fecha_delete` timestamp NULL DEFAULT NULL,
  `usuario_delete` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `idrol`, `nombres`, `apellidos`, `estado`, `fecha_create`, `usuario_create`, `fecha_update`, `usuario_update`, `fecha_delete`, `usuario_delete`) VALUES
(1, 'jose_daniel', '6e7edca7dbbc844496e831867d6e5795', 1, 'José Daniel', 'Pozo', 1, '2019-09-01 14:36:57', 'admin', NULL, NULL, '2019-10-14 19:43:27', 'blanca_cruz'),
(28, 'Jossie', '3518557c3eb4eef6ea3651d798d9bd4b', 1, 'Jossie Andreina', 'Muñoz Cando', 1, '2019-11-02 22:55:19', 'Josie', NULL, NULL, NULL, NULL),
(29, 'Jossie', '3518557c3eb4eef6ea3651d798d9bd4b', 1, 'Jossie Andreina', 'Muñoz Cando', 0, '2019-11-02 22:56:54', 'Josie', NULL, NULL, '2019-11-02 22:57:08', 'Josie'),
(13, 'jose_daniel@outlook.com', 'da00c473044a131e4c58e53b81187e9c', 1, 'dasd', 'dsad', 0, '2019-09-05 03:16:44', 'admin', NULL, NULL, NULL, NULL),
(27, 'tito', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'sara', '', 0, '2019-11-02 18:22:33', 'Josie', '2019-11-02 18:23:43', 'Josie', '2019-11-02 22:52:10', 'Josie'),
(18, 'jose_daniel', '662eaa47199461d01a623884080934ab', 2, 'jose', 'daniel', 0, '2019-10-14 20:18:30', 'blanca_cruz', NULL, NULL, '2019-10-14 23:52:47', 'Josie_Cando'),
(26, 'Israel', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Ingrid', 'Gualpa', 0, '2019-11-01 18:57:46', 'jose_daniel', '2019-11-02 16:10:23', 'Josie', '2019-11-02 22:59:03', 'Josie'),
(25, 'Jhony', '4c44307a7f76d57fdd2a93241ae95ddc', 2, 'Jhony ', 'Cedeño', 1, '2019-10-20 01:25:16', 'Josie', '2019-10-22 15:28:56', 'jose_daniel', NULL, NULL),
(24, 'Josie', '88493555e48116d7dc94a30a2f18ab19', 1, 'Josie', 'Cando', 1, '2019-10-20 00:25:54', 'jose_daniel', '2019-10-22 15:39:09', 'jose_daniel', NULL, NULL),
(23, 'ingrid', '0869cf46fd51daaf1ee9ad0a2d2dba6a', 2, 'ingrid', 'gualpa', 1, '2019-10-19 23:28:21', 'jose_daniel', NULL, NULL, NULL, NULL),
(30, 'Jhony', '4c44307a7f76d57fdd2a93241ae95ddc', 1, 'Jhony', 'Cedeño', 1, '2019-11-02 22:58:45', 'Josie', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `ingreso_usuarios`
--
ALTER TABLE `ingreso_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `pension_cab`
--
ALTER TABLE `pension_cab`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `pension_det`
--
ALTER TABLE `pension_det`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `ingreso_usuarios`
--
ALTER TABLE `ingreso_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `pension_cab`
--
ALTER TABLE `pension_cab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pension_det`
--
ALTER TABLE `pension_det`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
