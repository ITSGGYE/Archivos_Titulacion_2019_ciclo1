--
-- Base de datos: `quiz_new`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_admin`
--

CREATE TABLE `mst_admin` (
  `id` int(11) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `materias` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mst_admin`
--

INSERT INTO `mst_admin` (`id`, `loginid`, `pass`, `nombres`, `materias`) VALUES
(1, '0951362110', 'admin', 'CARLOS ARCE', 'MATEMATICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_question`
--

CREATE TABLE `mst_question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mst_question`
--

INSERT INTO `mst_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(23, 8, '¿Cómo se puede imprimir el nombre del objeto asociado con el último error de VB en la ventana Inmediato?\r\n', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2),
(24, 8, '¿Qué función realiza la propiedad TabStop en un botón de comando?\r\n', 'Determina si el botón puede obtener el foco\r\n', 'Si se establece en False, deshabilita la propiedad Tabindex.\r\n', 'Determina el orden en que el botón recibirá el foco\r\n', 'Determina si la secuencia de teclas de acceso puede ser utilizada\r\n', 1),
(25, 8, 'Tu aplicación crea una instancia de un formulario. ¿Cuál es el primer evento que se desencadenará en el de?\r\n', 'Load', 'GotFocus', 'Instance', 'Initialize', 4),
(26, 8, '¿Cuál de las siguientes es la notación húngara para un menú?\r\n', 'Menu', 'Men', 'mnu', 'MN', 3),
(54, 8, 'Â¿ cuantos lados tiene un hexagono?', '2 lados', '6 lados', '7 lados', '8 lados', 2),
(55, 8, 'Â¿ cuantas veces tenemos que multiplicar 6 para que nos de 36 ?', '1', '4', '3', '2', 4),
(56, 8, 'Â¿ cuantas flores hay en dos docenaas ?', '23', '25', '24', '12', 3),
(57, 8, 'Â¿ cuanto es la suma de 2+2+3', '7', '4', '6', '77', 1),
(58, 8, 'Â¿cuanto es la resta de  6-6 ?', '1', '0', '2', '8', 2),
(59, 8, 'Â¿  cuanto queda de la resta de uno y dos ?', '1', '2', '3', '13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_result`
--

CREATE TABLE `mst_result` (
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mst_result`
--

INSERT INTO `mst_result` (`login`, `test_id`, `test_date`, `score`) VALUES
('raj', 8, '0000-00-00', 3),
('raj', 9, '0000-00-00', 3),
('raj', 8, '0000-00-00', 1),
('ashish', 10, '0000-00-00', 3),
('ashish', 9, '0000-00-00', 2),
('ashish', 10, '0000-00-00', 0),
('raj', 8, '0000-00-00', 0),
('ankur', 11, '0000-00-00', 0),
('admin', 12, '0000-00-00', 0),
('admin', 13, '0000-00-00', 2),
('admin', 14, '0000-00-00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_subject`
--

CREATE TABLE `mst_subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mst_subject`
--

INSERT INTO `mst_subject` (`sub_id`, `sub_name`) VALUES
(1, 'MATEMATICA BASICA'),
(2, 'MATEMATICA Y GEOMETRIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_test`
--

CREATE TABLE `mst_test` (
  `test_id` int(5) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mst_test`
--

INSERT INTO `mst_test` (`test_id`, `sub_id`, `test_name`, `total_que`) VALUES
(8, 2, 'MATEMATICAS BASICAS', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_user`
--

CREATE TABLE `mst_user` (
  `user_id` int(5) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `curso` varchar(50) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `estado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mst_user`
--

INSERT INTO `mst_user` (`user_id`, `login`, `nombre`, `curso`, `perfil`, `estado`) VALUES
(1, '0985628985', 'carlos andres cedeño', '3 ero de basica', 'estudiante', 0),
(17, '0951362111', 'walter ', '3ero de basica', 'estudiante', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mst_useranswer`
--

CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mst_question`
--
ALTER TABLE `mst_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indices de la tabla `mst_subject`
--
ALTER TABLE `mst_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indices de la tabla `mst_test`
--
ALTER TABLE `mst_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indices de la tabla `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mst_admin`
--
ALTER TABLE `mst_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mst_question`
--
ALTER TABLE `mst_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `mst_subject`
--
ALTER TABLE `mst_subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `mst_test`
--
ALTER TABLE `mst_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
