-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2019 a las 20:35:51
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_lucho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_codigo` int(10) UNSIGNED NOT NULL,
  `cat_nombre` varchar(50) NOT NULL,
  `cat_fcaptura` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_codigo`, `cat_nombre`, `cat_fcaptura`) VALUES
(1, 'lacteos y derivados', '2019-10-13 18:43:02'),
(2, 'vegetales', '2019-10-13 18:43:12'),
(3, '  snack', '2019-10-13 18:44:31'),
(7, 'carnes rojas', '2019-10-13 18:46:54'),
(8, 'carnes blancas', '2019-10-13 18:52:48'),
(9, 'frutas', '2019-10-13 18:53:01'),
(10, 'Frutos Secos', '2019-10-13 18:53:10'),
(11, 'cereal', '2019-10-13 18:53:46'),
(12, 'Higiene', '2019-10-17 14:09:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_stock`
--

CREATE TABLE `ingreso_stock` (
  `ing_codigo` int(11) UNSIGNED NOT NULL,
  `ing_prd_cod` int(11) UNSIGNED NOT NULL,
  `ing_stock` int(10) DEFAULT NULL,
  `ing_costo` decimal(25,2) DEFAULT NULL,
  `ing_fcaptura` datetime NOT NULL,
  `ing_fcaducidad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_stock`
--

INSERT INTO `ingreso_stock` (`ing_codigo`, `ing_prd_cod`, `ing_stock`, `ing_costo`, `ing_fcaptura`, `ing_fcaducidad`) VALUES
(23, 3, 30, '0.45', '2019-10-19 12:41:33', '2019-11-30'),
(24, 4, 23, '0.55', '2019-10-19 12:42:53', '2019-11-07'),
(25, 4, 3, '0.55', '2019-10-19 12:56:00', '2019-11-30'),
(26, 3, 60, '2.30', '2019-10-19 12:56:59', '2020-01-07'),
(27, 5, 100, '1.10', '2019-10-19 13:00:25', '2020-01-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prd_codigo` int(11) UNSIGNED NOT NULL,
  `prd_descripcion` varchar(80) NOT NULL,
  `prd_presentacion` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `prd_marca` varchar(50) NOT NULL,
  `prd_cat_cod` int(11) UNSIGNED NOT NULL,
  `prd_prv_cod` int(11) UNSIGNED NOT NULL,
  `prd_existencia` int(10) DEFAULT NULL,
  `prd_costcomp` decimal(25,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prd_codigo`, `prd_descripcion`, `prd_presentacion`, `prd_marca`, `prd_cat_cod`, `prd_prv_cod`, `prd_existencia`, `prd_costcomp`) VALUES
(3, 'Leche entera 250ml', 'Carton', 'ReyLeche', 1, 2, 90, '0.35'),
(4, 'Doritos Desafios 100g', 'Bolsa', 'Doritos', 3, 1, 26, '0.51'),
(5, 'Leche entera 900ml', 'Libras', 'SuLeche', 1, 1, 50, '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `prv_codigo` int(11) UNSIGNED NOT NULL,
  `prv_nombre` varchar(50) NOT NULL,
  `prv_empresa` varchar(50) NOT NULL,
  `prv_telefono` varchar(14) NOT NULL,
  `prv_estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`prv_codigo`, `prv_nombre`, `prv_empresa`, `prv_telefono`, `prv_estado`) VALUES
(1, 'Miguel Solis', 'MiguelS SA', '0944332211', 'A'),
(2, 'Hector Gonzales', 'HG Importadora S.A,', '0909090909', 'A'),
(3, 'Alejandro Campos', 'AJ. Company SA', '0969893199', 'A'),
(4, 'Susana Roxis', 'Roxis Galletas', '0939342200', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_codigo` int(11) UNSIGNED NOT NULL,
  `usu_nombre` varchar(40) NOT NULL,
  `usu_unombre` varchar(45) NOT NULL,
  `usu_contra` varchar(255) NOT NULL,
  `usu_ult_sesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre`, `usu_unombre`, `usu_contra`, `usu_ult_sesion`) VALUES
(1, 'Alejandro Cevallos', 'admin', '$2y$10$2iDaSmmSdxcu4Y83tcqELe5hIHG97fqOlpF6lEipAiGC6rnAJpE46', '2019-10-19 11:33:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `vta_codigo` int(11) UNSIGNED NOT NULL,
  `vta_prd_cod` int(11) UNSIGNED NOT NULL,
  `vta_cantidad` int(10) DEFAULT NULL,
  `vta_costo` decimal(25,2) NOT NULL,
  `vta_fcapt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`vta_codigo`, `vta_prd_cod`, `vta_cantidad`, `vta_costo`, `vta_fcapt`) VALUES
(3, 5, 50, '50.00', '2019-10-19 13:02:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_codigo`),
  ADD UNIQUE KEY `cat_nombre` (`cat_nombre`);

--
-- Indices de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD PRIMARY KEY (`ing_codigo`),
  ADD KEY `ing_prod_cod` (`ing_prd_cod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prd_codigo`),
  ADD UNIQUE KEY `prd_descripcion` (`prd_descripcion`),
  ADD KEY `prd_prv_cod` (`prd_prv_cod`),
  ADD KEY `prd_cat_cod` (`prd_cat_cod`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prv_codigo`),
  ADD UNIQUE KEY `prv_nombre` (`prv_nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD UNIQUE KEY `usu_nombre` (`usu_nombre`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`vta_codigo`),
  ADD KEY `vta_prd_cod` (`vta_prd_cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  MODIFY `ing_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prd_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `prv_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `vta_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD CONSTRAINT `ingreso-producto` FOREIGN KEY (`ing_prd_cod`) REFERENCES `productos` (`prd_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `prducto-proveedor` FOREIGN KEY (`prd_prv_cod`) REFERENCES `proveedores` (`prv_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto-categoria` FOREIGN KEY (`prd_cat_cod`) REFERENCES `categorias` (`cat_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `venta-producto` FOREIGN KEY (`vta_prd_cod`) REFERENCES `productos` (`prd_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
