-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2017 at 02:11 PM
-- Server version: 10.0.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapidservices_histovet`
--

-- --------------------------------------------------------

--
-- Table structure for table `especie`
--

CREATE TABLE `especie` (
  `id` int(11) NOT NULL,
  `nombre_especie` varchar(250) NOT NULL,
  `eliminado` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `especie`
--

INSERT INTO `especie` (`id`, `nombre_especie`, `eliminado`) VALUES
(1, 'PERRO', 0),
(2, 'GATO', 0),
(3, 'OTRO', 0),
(4, 'CONEJO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `paciente` varchar(250) NOT NULL,
  `representante` varchar(250) NOT NULL,
  `especie` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_atencion` varchar(250) NOT NULL,
  `registro` varchar(500) NOT NULL,
  `medicamento` varchar(500) NOT NULL,
  `atendido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historial`
--

INSERT INTO `historial` (`id_historial`, `paciente`, `representante`, `especie`, `fecha`, `hora`, `tipo_atencion`, `registro`, `medicamento`, `atendido`) VALUES
(13, 'LEON', 'Patricio Gonzalez', 'perro', '2017-12-18', '09:55:52', 'consulta', 'dolor de pata', 'paracetamol', 'Doctora Andrea Rojas'),
(14, 'lolo', 'dede', '2', '2017-12-18', '09:59:17', '', 'dede', 'dede', 'asa'),
(15, 'lolo', 'dede', '2', '2017-12-18', '16:18:55', 'consulta', 'atropello', 'aceite sedoso', 'dr juan'),
(16, 'dugy', 'luis castillo', 'gato', '2017-12-18', '16:45:22', 'consulta', 'caracha', 'crema', 'dr juan'),
(17, 'Paris Bubierca', 'Carla Roble', 'perro', '2017-12-18', '19:55:25', 'consulta', 'Diarrea y falta de apetito', 'Anti Diarreico y dieta blanda', 'Doctor Carlos Rojas'),
(18, 'FIFI', 'CAMILO ALFARO', 'gato', '2017-12-18', '20:26:10', 'emergencia', 'SE COMIO UN CALCETIN', 'LAXANTE 3 VECES POR DIA', 'DOCTOR RICARDO LOPEZ'),
(19, 'FLU', 'rederte', 'gato', '2017-12-18', '20:40:40', 'consulta', 'ssdf', 'sdfsdf', 'sfsdfs'),
(20, 'FIFI', 'CAMILO ALFARO', 'gato', '2017-12-18', '20:43:16', 'cita', 'sdasd', 'adasd', 'asdasd'),
(21, 'Miel', 'Paulina Flores Galleguillo', 'perro', '2017-12-21', '17:18:54', 'cita', 'Dolor estomacal y falta de apetito.', '', 'Dr. Pedro Castro'),
(22, 'LEON', 'Patricio Gonzalez', 'perro', '2017-12-21', '22:08:45', 'consulta', 'EL PACIENTE SE ECUENTRA BIEN DE PESO, PERO ESTA PELECHANDO DEMASIADO.', 'SE DEJA VITAMINAS Y OMEGA 3 PARA MEJORAR PELAJE.', 'Osvaldo Escalona');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `passvet` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pasadmin` varchar(15) NOT NULL,
  `rol` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `passvet`, `email`, `pasadmin`, `rol`) VALUES
(1, 'Administrador', '', '', 'admin', '22446688', 1),
(2, 'asistente', '123456', '', 'Calfaro', '', 2),
(3, 'asistente', 'asist', '', 'asist', '', 2),
(4, 'veterinario', '', '123456', 'veterinario', '', 3),
(5, 'asistente', '654321', '', 'cliente', '', 2),
(6, 'veterinario', '', 'vet', 'vet', '', 3),
(7, 'asiste', 'asiste', '', 'asiste', '', 2),
(8, 'veter', '', 'veter', 'veter', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombrepac` varchar(15) NOT NULL,
  `fechanac` date NOT NULL,
  `especie` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `peso` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nombrerep` varchar(30) NOT NULL,
  `dni` int(15) NOT NULL,
  `telefonos` int(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `fechareg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombrepac`, `fechanac`, `especie`, `sexo`, `raza`, `peso`, `foto`, `nombrerep`, `dni`, `telefonos`, `direccion`, `correo`, `fechareg`) VALUES
(8, 'lolito', '2017-09-25', 'gato', 'HEMBRA', 'CHUSKA', 2, 'sda', 'rederte', 89898989, 959738206, 'adede', 'j.ola11@gmail.com', '2017-09-25'),
(9, 'rocky', '2017-09-25', 'perro', 'MACHO', 'buldog', 5, 'qq', 'Alex Dario Quempez', 988729837, 8798798, 'koaskdije', 'kempes@hotmail.com', '2017-09-25'),
(10, 'beto', '2017-09-27', 'perro', 'MACHO', 'pitbull', 5, 'aa', 'julio dueÃ±as', 7817812, 787827872, 'av lima 442', 'juliodueÃ±as@gmail.com', '2017-09-27'),
(11, 'lazy', '2017-09-27', 'perro', 'HEMBRA', 'chitzu', 3, 'a', 'laura ormeÃ±o', 8238127, 312731, 'jr los portales 21', 'la.or@hotmail.com', '2017-09-27'),
(12, 'valentina', '2017-09-27', 'perro', 'HEMBRA', 'chiwawa', 1, 'a', 'star balden', 76765151, 98989898, 'perdida', 'starb@hotmail.com', '2017-09-27'),
(13, 'kiko', '2017-09-29', 'perro', 'MACHO', 'CHUSKA', 2, 'cecyte.jpg', 'luis dario', 97798789, 987987987, 'av cercarado', 'JUANKOKI@HOTMAIL.COM', '2017-09-29'),
(14, 'locky', '2017-09-29', 'perro', 'MACHO', 'pitbull', 5, 'letras3.jpg', 'alex arteaga', 78687687, 999999999, 'los laureles 7272', 'alexar@hotmail.com', '2017-09-29'),
(15, 'perico', '2017-09-29', 'perro', 'MACHO', 'pitbull', 5, 'images.jpg', 'pool vasquez', 77787878, 999999999, 'los laureles 7272', 'poolqw@hotmail.com', '2017-09-29'),
(16, 'brandom', '2017-09-29', 'perro', 'MACHO', 'buldog', 5, 'images.jpg', 'esteban valdiviezo', 7817812, 999999999, 'av las gaviotas', 'estebv@hotmail.com', '2017-09-29'),
(17, 'LEON', '2016-01-15', 'perro', 'MACHO', 'GOLDEN RETIREVER', 19, 'mascotas.jpg', 'Patricio Gonzalez', 136488694, 963935345, 'El Litre 2116, La Florida', 'pagonzalez79@gmail.com', '2017-12-18'),
(18, 'dugy', '2017-12-18', 'gato', 'HEMBRA', 'felina', 2, 'Penguins.jpg', 'luis castillo', 78978978, 123456, 'asdasdasd', 'juju@web.com', '2017-12-18'),
(19, 'Paris Bubierca', '2017-10-02', 'perro', 'HEMBRA', 'Bulldog Frances', 10, 'paris.png', 'Carla Roble', 183425605, 51271300, 'Avenidad Libertad 1200', 'crobles@hotmail.com', '2017-12-19'),
(20, 'FIFI', '2017-12-20', 'gato', 'HEMBRA', 'ANGORA', 15, 'mascotas.jpg', 'CAMILO ALFARO', 185507890, 33557788, 'BALMACEDA 089 LA SERENA', 'CALFARO@GMAIL.COM', '2017-12-19'),
(21, 'Paco Luis', '2014-09-12', 'caballo', 'HEMBRA', 'Pura Sangre', 22, 'DSCN3745.JPG', 'sasdasd', 1, 11111, 'asdasd', 'sÃ±lmasds@asldkasdk.cl', '2017-12-19'),
(22, 'Silvestre', '2014-09-17', 'gato', 'MACHO', 'ANGORA', 22, 'DSCN3752.JPG', 'sasdasd', 1, 11111, 'asdasd', 'a', '2017-12-19'),
(23, 'LeonIII', '2016-11-11', 'perro', 'HEMBRA', 'Rodwailer', 16, '2_176.jpg', 'Valentina antonia', 21430640, 512665544, 'pasaje maÃ±io NÂº 711 Tierras Blancas', 'vgonzalez#hotmail.com', '2017-12-21'),
(24, 'LeonIII', '2016-11-11', 'perro', 'MACHO', 'Rodwailer', 16, '2_176.jpg', 'Valentina antonia', 21430640, 512665544, 'pasaje maÃ±io NÂº 711 Tierras Blancas', 'vgonzalez#hotmail.com', '2017-12-21'),
(25, 'Miel', '2016-09-26', 'perro', 'HEMBRA', 'GOLDEN RETIREVER', 25, 'Foto1.JPG', 'Paulina Flores Galleguillo', 17433678, 966778889, 'pasaje maÃ±io N 711 Tierras Blancas', 'pagonzalez79@gmail.com', '2017-12-21'),
(26, 'Spaik', '1111-11-11', 'perro', 'MACHO', 'Kiltro', 23, '240_F_176416587_WacF960iZbr7T41pZgnhdZLa1GzZYMWv.jpg', 'qqqqqqqqqqqqqqqqqqqqqqqqq', 136488694, 221312312, 'dsdfdsdsfdsfdsfdsfsdfdsfdsfdsfdsfdsfd', 'pgonzalezhotmailcom', '2017-12-21'),
(27, 'Sultan', '2015-02-01', 'gato', 'MACHO', 'Persa', 9, 'images.png', 'Valentina Gonzalez Cid', 214306409, 963935345, 'Pasaje Corazon de Jesus 4058', 'pagonzalez79@gmail.com', '2017-12-21'),
(28, 'Sultan', '2015-02-01', 'gato', 'MACHO', 'Persa', 9, 'images.png', 'Valentina Gonzalez Cid', 214306409, 963935345, 'Pasaje Corazon de Jesus 4058', 'pagonzalez79@gmail.com', '2017-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `profesional`
--

CREATE TABLE `profesional` (
  `id_profesional` int(11) NOT NULL,
  `nombre_prof` varchar(30) NOT NULL,
  `dni` int(15) NOT NULL,
  `tipo_prof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesional`
--

INSERT INTO `profesional` (`id_profesional`, `nombre_prof`, `dni`, `tipo_prof`) VALUES
(1, 'PEDRO ORTIZ', 23231221, 'MEDICO'),
(3, 'julio acosta', 72187212, 'medico'),
(4, 'PAUL VEGA', 12345678, 'medico'),
(5, 'Luis Lopez', 1122234455, 'medico'),
(8, 'VALENTINA GONZALEZ', 214306405, 'medico'),
(12, 'Critian Andrade', 170003339, 'medico'),
(13, 'Osvaldo Escalona', 112346548, 'medico');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `login`, `tipo`, `nombre`, `password`) VALUES
(1, 'admin', 'ADMINISTRADOR', 'admin', 'admin'),
(2, 'admin', 'administrador', 'ADMIN', 'admin'),
(3, 'Calfaro', 'ASISTENTE', 'Camilo alfaro', '123'),
(4, 'pgonzalez', 'VETERINARIO', 'Patricio Gonzalez', '654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indexes for table `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id_profesional`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
