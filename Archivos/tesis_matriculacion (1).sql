-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2019 a las 21:29:30
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
-- Base de datos: `tesis_matriculacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `banco` text DEFAULT NULL,
  `cuenta` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`banco`, `cuenta`) VALUES
(NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

CREATE TABLE `cobros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idestudiante` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `valor` decimal(8,2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobros`
--

INSERT INTO `cobros` (`id`, `idestudiante`, `anio`, `mes`, `valor`, `estado`) VALUES
(18, 17, 2019, 3, '30.00', 1),
(17, 16, 2019, 5, '30.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `anio_actual` varchar(20) DEFAULT NULL,
  `identificador` varchar(13) NOT NULL,
  `curso` char(1) DEFAULT NULL,
  `lugar_nacimiento` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nombre_representante` varchar(100) NOT NULL,
  `direccion_representante` text NOT NULL,
  `telefono_representante` varchar(200) NOT NULL,
  `identificador_representante` varchar(20) NOT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `usuario_create` varchar(15) DEFAULT NULL,
  `fecha_create` timestamp NULL DEFAULT current_timestamp(),
  `usuario_update` varchar(15) DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT NULL,
  `usuario_delete` varchar(15) DEFAULT NULL,
  `fecha_delete` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombres`, `apellidos`, `anio_actual`, `identificador`, `curso`, `lugar_nacimiento`, `fecha_nacimiento`, `sexo`, `nombre_representante`, `direccion_representante`, `telefono_representante`, `identificador_representante`, `estado`, `usuario_create`, `fecha_create`, `usuario_update`, `fecha_update`, `usuario_delete`, `fecha_delete`) VALUES
(17, 'Elkin Samuel', 'Pacheco Pincay', '1 Basica', '1223344', 'A', 'Guayaquil', '2019-11-22', 'M', '1222333', 'la ch', '123456789999', '1234455666', 1, 'jose_pacheco', '2019-11-11 01:49:16', NULL, NULL, NULL, NULL),
(16, 'Jose Vicente', 'Pacheco Pincay', '1 Basica', '0951366598', 'A', 'Guayaquil', '1997-07-21', 'M', 'jhon', 'la ch', '1233445566778', '0981344502', 1, 'jose_pacheco', '2019-11-10 18:39:34', 'jose_pacheco', '2019-11-11 01:41:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_usuarios`
--

CREATE TABLE `ingreso_usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_usuarios`
--

INSERT INTO `ingreso_usuarios` (`id`, `idusuario`, `fecha`) VALUES
(56, 16, '2019-11-02 18:12:19'),
(57, 17, '2019-11-02 18:14:55'),
(58, 16, '2019-11-02 18:15:05'),
(59, 16, '2019-11-02 18:15:53'),
(60, 16, '2019-11-02 18:22:02'),
(61, 16, '2019-11-02 18:23:40'),
(62, 16, '2019-11-02 18:28:26'),
(63, 16, '2019-11-02 18:31:43'),
(64, 16, '2019-11-02 18:34:19'),
(65, 16, '2019-11-02 19:03:35'),
(66, 16, '2019-11-02 19:18:52'),
(67, 17, '2019-11-02 19:35:18'),
(68, 17, '2019-11-02 19:36:27'),
(69, 16, '2019-11-03 04:14:15'),
(70, 16, '2019-11-03 04:19:19'),
(71, 16, '2019-11-03 13:51:40'),
(72, 16, '2019-11-03 14:09:18'),
(73, 16, '2019-11-04 17:16:05'),
(74, 16, '2019-11-04 17:17:32'),
(75, 16, '2019-11-04 17:19:09'),
(76, 16, '2019-11-04 17:29:14'),
(77, 16, '2019-11-04 17:30:19'),
(78, 16, '2019-11-04 18:17:54'),
(79, 16, '2019-11-04 18:20:01'),
(80, 16, '2019-11-04 18:33:54'),
(81, 16, '2019-11-04 18:39:49'),
(82, 16, '2019-11-04 18:41:12'),
(83, 16, '2019-11-04 18:46:01'),
(84, 16, '2019-11-04 18:47:12'),
(85, 16, '2019-11-04 18:49:28'),
(86, 16, '2019-11-04 18:59:53'),
(87, 16, '2019-11-04 19:00:57'),
(88, 16, '2019-11-04 19:11:00'),
(89, 16, '2019-11-04 19:13:25'),
(90, 16, '2019-11-04 19:18:21'),
(91, 16, '2019-11-04 19:35:52'),
(92, 17, '2019-11-04 19:41:10'),
(93, 16, '2019-11-04 19:41:23'),
(94, 17, '2019-11-04 19:42:39'),
(95, 16, '2019-11-04 19:42:58'),
(96, 18, '2019-11-04 19:43:36'),
(97, 16, '2019-11-04 19:44:21'),
(98, 16, '2019-11-04 21:51:31'),
(99, 17, '2019-11-04 22:39:22'),
(100, 16, '2019-11-04 22:41:58'),
(101, 18, '2019-11-04 22:50:14'),
(102, 16, '2019-11-04 22:53:55'),
(103, 18, '2019-11-04 22:57:37'),
(104, 16, '2019-11-04 22:58:19'),
(105, 16, '2019-11-04 23:33:57'),
(106, 17, '2019-11-04 23:34:11'),
(107, 16, '2019-11-04 23:34:34'),
(108, 17, '2019-11-05 01:20:48'),
(109, 16, '2019-11-05 15:25:42'),
(110, 17, '2019-11-05 15:56:46'),
(111, 16, '2019-11-05 18:57:02'),
(112, 17, '2019-11-05 20:23:56'),
(113, 16, '2019-11-05 23:24:53'),
(114, 16, '2019-11-06 00:19:12'),
(115, 16, '2019-11-06 00:52:43'),
(116, 16, '2019-11-06 21:38:09'),
(117, 16, '2019-11-06 21:49:46'),
(118, 17, '2019-11-06 21:51:52'),
(119, 16, '2019-11-07 13:48:59'),
(120, 16, '2019-11-07 14:56:18'),
(121, 16, '2019-11-07 15:04:45'),
(122, 16, '2019-11-07 15:09:47'),
(123, 16, '2019-11-07 15:16:29'),
(124, 16, '2019-11-07 15:24:30'),
(125, 16, '2019-11-07 15:39:20'),
(126, 16, '2019-11-07 15:46:36'),
(127, 16, '2019-11-07 16:26:22'),
(128, 16, '2019-11-07 21:31:28'),
(129, 16, '2019-11-07 21:46:10'),
(130, 17, '2019-11-07 21:46:43'),
(131, 17, '2019-11-07 21:46:43'),
(132, 16, '2019-11-07 21:47:06'),
(133, 16, '2019-11-07 21:57:35'),
(134, 16, '2019-11-08 00:32:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectivo`
--

CREATE TABLE `lectivo` (
  `id` int(11) NOT NULL,
  `cod_lectivo` varchar(20) DEFAULT NULL,
  `mes_inicio` int(11) DEFAULT NULL,
  `mes_final` int(11) DEFAULT NULL,
  `anio_inicio` int(11) DEFAULT NULL,
  `anio_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lectivo`
--

INSERT INTO `lectivo` (`id`, `cod_lectivo`, `mes_inicio`, `mes_final`, `anio_inicio`, `anio_final`) VALUES
(11, '2019-2020', 4, 2, 2019, 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idestudiante` int(11) DEFAULT NULL,
  `anio_curso` varchar(100) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `doc_completo` tinyint(1) DEFAULT 1,
  `fotos` tinyint(1) DEFAULT 1,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) DEFAULT 1,
  `anio` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `idestudiante`, `anio_curso`, `curso`, `doc_completo`, `fotos`, `fecha`, `estado`, `anio`) VALUES
(55, 16, '1 Basica', 'A', 1, 0, '2019-11-11 01:41:29', 1, '2019'),
(56, 17, '1 Basica', 'A', 0, 0, '2019-11-11 01:49:49', 1, '2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension_cab`
--

CREATE TABLE `pension_cab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `usuario_create` varchar(25) DEFAULT NULL,
  `fecha_create` timestamp NULL DEFAULT current_timestamp(),
  `usuario_update` varchar(25) DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `token_genera` text DEFAULT NULL,
  `token_valida` text DEFAULT NULL,
  `cancelado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(118, 'Inicial 1', '30.00'),
(119, 'Inicial 2', '60.00'),
(120, '1 Basica', '30.00'),
(121, '2 Basica', '30.00'),
(122, '3 Basica', '30.00'),
(123, '4 Basica', '30.00'),
(124, '5 Basica', '30.00'),
(125, '6 Basica', '30.00'),
(126, '7 Basica', '40.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` text NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombres` text DEFAULT NULL,
  `apellidos` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_create` timestamp NULL DEFAULT current_timestamp(),
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
(16, 'jose_pacheco', '302e5313bf412a2ebb7dd564c3e08750', 1, 'Jose', 'Pacheco', 1, '2019-11-01 19:54:58', 'jose_daniel', NULL, NULL, NULL, NULL),
(18, 'Samuel', 'e10adc3949ba59abbe56e057f20f883e', 2, 'elkin', 'Pacheco Pincay', 1, '2019-11-04 19:43:22', 'jose_pacheco', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cobros`
--
ALTER TABLE `cobros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indices de la tabla `lectivo`
--
ALTER TABLE `lectivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
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
-- AUTO_INCREMENT de la tabla `cobros`
--
ALTER TABLE `cobros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ingreso_usuarios`
--
ALTER TABLE `ingreso_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `lectivo`
--
ALTER TABLE `lectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `pension_cab`
--
ALTER TABLE `pension_cab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pension_det`
--
ALTER TABLE `pension_det`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
