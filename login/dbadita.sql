-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 22:40:02
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbadita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `dir_ped` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cel_ped` int(11) NOT NULL,
  `nom_ped` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fec_ped` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ced_ped` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_per` int(11) NOT NULL,
  `adm_per` int(11) NOT NULL,
  `cli_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pro` int(11) NOT NULL,
  `nom_pro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pre_pro` int(11) NOT NULL,
  `can_pro` int(11) NOT NULL,
  `tot_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pro`, `nom_pro`, `pre_pro`, `can_pro`, `tot_pro`) VALUES
(8, 'corviche de camaron', 1, 200, 200),
(19, 'empanada de carne', 2, 300, 600),
(20, 'empanada de pollo', 2, 500, 1000),
(21, 'empanada de queso', 1, 300, 300),
(22, 'corviche de albacora', 3, 200, 600),
(23, 'empanada de pizza', 2, 100, 200),
(24, 'botella dasani ', 1, 300, 300),
(26, 'cocacola', 1, 100, 100),
(27, 'inca cola', 1, 200, 200),
(28, 'empanada de frejol', 2, 200, 400),
(29, 'cafe refill', 2, 200, 400),
(30, 'cafe negro', 1, 200, 200),
(31, 'empanada de chorizo', 2, 300, 600),
(32, 'colada morada', 1, 200, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'uno', 'uno@gmail.com', '1111', 'U'),
(2, 'caleb', 'caleb@gmail.com', 'd61a3a53bf15e6a585e8790e0b7b9bb4', 'A'),
(3, 'mauro', 'maurocardenas972@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'U'),
(4, 'anthony', 'anthony@gmail.com', '65fbef05e01fac390cb3fa073fb3e8cf', 'U'),
(5, 'caleb barrera', 'barrera@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'U'),
(6, 'eve', 'chavezmaximiliano96@hotmail.con', '81dc9bdb52d04dc20036dbd8313ed055', 'U'),
(7, 'laura', 'laurav@gmail.com', 'd957a2edaba437a5a14d2455610516a5', 'U'),
(8, 'amiel', 'a@gmail.com', 'd61a3a53bf15e6a585e8790e0b7b9bb4', 'U'),
(9, 'eli', 'eli@gmail.com', '2f0154d7db348840676529dd72f1c034', 'U'),
(10, 'fran', 'fran@gmail.com', '2c20cb5558626540a1704b1fe524ea9a', 'U'),
(11, 'calecito', 'calecito@gmail.com', '4a06d868d044c50af0cf9bc82d2fc19f', 'U'),
(12, 'q', 'q@gmail.com', '7694f4a66316e53c8cdd9d9954bd611d', 'U'),
(13, 'usuario', 'u@gmail.com', 'c70fd4260c9eb90bc0ba9d047c068eb8', 'U'),
(14, 'Elvira', 'elvira@gmail.com', '059273779b2ffa92e46e85c25c2dc34b', 'U'),
(15, 'david medina', 'davidmelo@gmail.com', '172522ec1028ab781d9dfd17eaca4427', 'U'),
(16, 'caleb barrera Villavicencio', 'c@gmail.com', 'cf79ae6addba60ad018347359bd144d2', 'U');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_per`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
