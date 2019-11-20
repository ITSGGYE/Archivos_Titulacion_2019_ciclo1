-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2017 a las 22:50:23
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `histovet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE IF NOT EXISTS `especie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_especie` varchar(250) NOT NULL,
  `eliminado` tinyint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id`, `nombre_especie`, `eliminado`) VALUES
(1, 'PERRO', 0),
(2, 'GATO', 0),
(3, 'OTROS', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` varchar(250) NOT NULL,
  `representante` varchar(250) NOT NULL,
  `especie` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_atencion` varchar(250) NOT NULL,
  `registro` varchar(500) NOT NULL,
  `medicamento` varchar(500) NOT NULL,
  `atendido` varchar(250) NOT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `paciente`, `representante`, `especie`, `fecha`, `hora`, `tipo_atencion`, `registro`, `medicamento`, `atendido`) VALUES
(1, 'rocky', 'Alex Dario Quempez', 'perro', '2017-09-25', '22:43:01', 'consulta', 'se fracturo pata derecha', 'inflazon2', 'dr matias'),
(2, 'lolito', 'rederte', 'gato', '2017-09-26', '09:30:35', 'emergencia', 'tumor en el estomago', 'cirugia', 'dr. loco'),
(3, 'roco2', 'John', 'gato', '2017-09-26', '09:31:12', 'cita', 'herida cabeza', 'crema dolor', 'dr. loco'),
(4, 'rene', 'alex', 'perro', '2017-09-26', '09:31:12', 'cita', 'cola cortada', 'crema dolor', 'dr. loco'),
(5, 'beto', 'julio dueÃ±as', 'perro', '2017-09-27', '14:55:04', 'consulta', 'baÃ±o mensual', 'baÃ±o', 'dr. vato'),
(6, 'deser', 'edede', 'gato', '2017-09-27', '14:55:55', 'emergencia', 'atropellado por auto', 'vendado de cuerpo completo', 'dr. wifi'),
(7, 'lazy', 'laura ormeÃ±o', 'perro', '2017-09-27', '17:02:07', 'consulta', 'pedicure', 'ninguno', 'dra. Ã±ee'),
(8, 'valentina', 'star balden', 'perro', '2017-09-27', '18:01:59', 'consulta', 'tiene lombrices en el poteiro', 'crema poteira', 'dra. loca'),
(9, 'lolito', 'rederte', 'gato', '2017-09-27', '20:04:23', 'consulta', 'ojo lagaÃ±oso', 'crema', 'dr. luis'),
(10, 'locky', 'alex arteaga', 'perro', '2017-09-29', '19:54:03', 'consulta', 'consulta de herida de parasitos', 'crema anti parasitos', 'Dr. Luis'),
(11, 'perico', 'pool vasquez', 'perro', '2017-09-29', '20:01:44', 'consulta', 'consulta por herida de pata', 'GEL anti inflamatorio', 'Dr. Luis'),
(12, 'brandom', 'esteban valdiviezo', 'perro', '2017-09-29', '22:07:37', 'consulta', 'consulta de prevencion inflamatoria', 'crema anti inflamatoria', 'Dr. Hugo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pasadmin` varchar(250) NOT NULL,
  `rol` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`, `rol`) VALUES
(1, 'Administrador', '', 'admin', 'admin', 1),
(2, 'ADMINISTRADOR', '', 'juan', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombrepac` varchar(250) NOT NULL,
  `fechanac` date NOT NULL,
  `especie` varchar(250) NOT NULL,
  `sexo` varchar(250) NOT NULL,
  `raza` varchar(250) NOT NULL,
  `peso` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nombrerep` varchar(250) NOT NULL,
  `dni` int(15) NOT NULL,
  `telefonos` int(15) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `fechareg` date NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombrepac`, `fechanac`, `especie`, `sexo`, `raza`, `peso`, `foto`, `nombrerep`, `dni`, `telefonos`, `direccion`, `correo`, `fechareg`) VALUES
(3, 'toby', '2017-09-25', '1', 'M', 'CHUSKA', 2, 'AS', 'John', 89898989, 959738206, 'Sector 1 Grupo 7 Mz N Lot 16 Villa el Salvador, Jr. Libertad 184 Prd. 1 1/2 Jose Galvez - V.M.T', 'j.olano184@gmail.com', '2017-09-25'),
(4, 'lolo', '2017-09-25', '2', 'M', 'aaas', 23, 'sda', 'dede', 121212, 121212, 'dcdsds', 'j.olano184@gmail.com', '2017-09-25'),
(5, 'deser', '2017-09-25', 'gato', 'F', 'qqqq', 1, 'ASd', 'edede', 12212, 231321, 'csdcds', 'j.olano184@gmail.com', '2017-09-25'),
(6, 'John Olano Mendoza', '2017-09-25', 'gato', 'M', 'asdasd', 3, 'das', 'John', 3333, 959738206, 'Sector 1 Grupo 7 Mz N Lot 16 Villa el Salvador, Jr. Libertad 184 Prd. 1 1/2 Jose Galvez - V.M.T', 'j.olano184@gmail.com', '2017-09-25'),
(7, 'John Olano Mendoza', '2017-09-25', 'gato', 'M', 'asdasd', 3, 'das', 'John', 3333, 959738206, 'Sector 1 Grupo 7 Mz N Lot 16 Villa el Salvador, Jr. Libertad 184 Prd. 1 1/2 Jose Galvez - V.M.T', 'j.olano184@gmail.com', '2017-09-25'),
(8, 'lolito', '2017-09-25', 'gato', 'F', 'CHUSKA', 2, 'sda', 'rederte', 89898989, 959738206, 'adede', 'j.olano184@gmail.com', '2017-09-25'),
(9, 'rocky', '2017-09-25', 'perro', 'M', 'buldog', 5, 'qq', 'Alex Dario Quempez', 988729837, 8798798, 'koaskdije', 'kempes@hotmail.com', '2017-09-25'),
(10, 'beto', '2017-09-27', 'perro', 'M', 'pitbull', 5, 'aa', 'julio dueÃ±as', 7817812, 787827872, 'av lima 442', 'juliodueÃ±as@gmail.com', '2017-09-27'),
(11, 'lazy', '2017-09-27', 'perro', 'F', 'chitzu', 3, 'a', 'laura ormeÃ±o', 8238127, 312731, 'jr los portales 21', 'la.or@hotmail.com', '2017-09-27'),
(12, 'valentina', '2017-09-27', 'perro', 'F', 'chiwawa', 1, 'a', 'star balden', 76765151, 98989898, 'perdida', 'starb@hotmail.com', '2017-09-27'),
(13, 'kiko', '2017-09-29', 'perro', 'M', 'CHUSKA', 2, 'cecyte.jpg', 'luis dario', 97798789, 987987987, 'av cercarado', 'JUANKOKI@HOTMAIL.COM', '2017-09-29'),
(14, 'locky', '2017-09-29', 'perro', 'M', 'pitbull', 5, 'letras3.jpg', 'alex arteaga', 78687687, 999999999, 'los laureles 7272', 'alexar@hotmail.com', '2017-09-29'),
(15, 'perico', '2017-09-29', 'perro', 'M', 'pitbull', 5, 'images.jpg', 'pool vasquez', 77787878, 999999999, 'los laureles 7272', 'poolqw@hotmail.com', '2017-09-29'),
(16, 'brandom', '2017-09-29', 'perro', 'M', 'buldog', 5, 'images.jpg', 'esteban valdiviezo', 7817812, 999999999, 'av las gaviotas', 'estebv@hotmail.com', '2017-09-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE IF NOT EXISTS `profesional` (
  `id_profesional` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_prof` varchar(250) NOT NULL,
  `dni` int(15) NOT NULL,
  `tipo_prof` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profesional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`id_profesional`, `nombre_prof`, `dni`, `tipo_prof`) VALUES
(1, 'PEDRO ORTIZ', 23231221, 'MEDICO'),
(2, 'IDIAN MARTINEZ', 12345678, 'administrador'),
(3, 'julio acosta', 72187212, 'medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `login`, `tipo`, `nombre`, `password`) VALUES
(1, 'admin', 'ADMINISTRADOR', 'admin', 'admin'),
(2, 'admin', 'administrador', 'ADMIN', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
