create database inventario_lucho;
use inventario_lucho;

-- Estructura de la tabla Usuarios
create table `usuario`(
	`usu_codigo` int(11) UNSIGNED NOT NULL,
	`usu_nombre` varchar(40) NOT NULL,
	`usu_unombre` varchar(45) NOT NULL,
	`usu_contra` varchar(255) NOT NULL,
	`usu_ult_sesion` datetime DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertando el valor por defecto en la Tabla Usuarios
/*$2y$10$ez3eNDKduclQMMckHjdmN.qrVVsqK2GGrfzCj.mo3TzEUwgim4uTm valor de admin en md5*/
INSERT INTO `usuario` VALUES
(1,'Administrador', 'admin', '$2y$10$ez3eNDKduclQMMckHjdmN.qrVVsqK2GGrfzCj.mo3TzEUwgim4uTm', '19-10-05 15:01');


-- Estructura de la tabla Categoria
create table `categorias` (
	`cat_codigo` int(11) UNSIGNED NOT NULL,
	`cat_nombre` varchar(50) NOT NULL,
  `cat_fcaptura` datetime DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estructura de la tabla Proveedores
create table `proveedores`(
	`prv_codigo` int(11) UNSIGNED NOT NULL,
  `prv_nombre` varchar(50) NOT NULL,
  `prv_empresa` varchar(50) NOT NULL,
  `prv_telefono` varchar(14) NOT NULL,
  `prv_estado` char(1) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
-- Estructura de la tabla Productos
create table `productos`(
	`prd_codigo` int(11) UNSIGNED NOT NULL,
  `prd_descripcion` varchar(80) NOT NULL,
  `prd_presentacion` varchar(60) NOT NULL,
  `prd_marca` varchar(50) NOT NULL,
  `prd_cat_cod` int(11) UNSIGNED NOT NULL,
  `prd_prv_cod` int(11) UNSIGNED NOT NULL,
  `prd_existencia` int (10) DEFAULT NULL,
  `prd_costcompra` decimal (25,2) DEFAULT NULL,
  `prd_costventa` decimal (25,2) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estructura de la tabla ingreso_stock
create table `ingreso_stock`(
	`ing_codigo` int(11) UNSIGNED NOT NULL,
	`ing_prd_cod` int(11) UNSIGNED NOT NULL,
	`ing_stock` int (10) DEFAULT NULL,
	`ing_total` decimal (25,2) DEFAULT NULL,
	`ing_fcaptura` datetime NOT NULL,
	`ing_fcaducidad` date NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
-- Estructura de la tabla Ventas
create table `ventas`(
	`vta_codigo` int(11) UNSIGNED NOT NULL,
	`vta_prd_cod` int(11) UNSIGNED NOT NULL,
	`vta_cantidad` int (10) DEFAULT NULL,
	`vta_total` decimal(25,2) NOT NULL,
	`vta_fcapt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------
-- Índices para tablas 
-- --------------------------------------------

-- Indices de la tabla `categorias`
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_codigo`),
  ADD UNIQUE KEY `cat_nombre` (`cat_nombre`);

-- Indices de la tabla `producto`
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prd_codigo`),
  ADD UNIQUE KEY `prd_descripcion` (`prd_descripcion`),
  ADD KEY `prd_prv_cod` (`prd_prv_cod`),
  ADD KEY `prd_cat_cod` (`prd_cat_cod`);

-- Indices de la tabla `proveedor`
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prv_codigo`),
  ADD UNIQUE KEY `prv_nombre` (`prv_nombre`);
  
-- Indices de la tabla `usuario`
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD UNIQUE KEY `usu_nombre` (`usu_nombre`);

-- Indices de la tabla `ventas`
ALTER TABLE `ingreso_stock`
  ADD PRIMARY KEY (`ing_codigo`),
  ADD KEY `ing_prod_cod` (`ing_prd_cod`);

-- Indices de la tabla `ventas`
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`vta_codigo`),
  ADD KEY `vta_prd_cod` (`vta_prd_cod`);

-- --------------------------------------------
-- AUTO_INCREMENT de las tablas creadas
-- -------------------------------------------- 
 
-- AUTO_INCREMENT de la tablas categorias
ALTER TABLE `categorias`
MODIFY `cat_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla `producto`
ALTER TABLE `productos`
  MODIFY `prd_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla `proveedor`
ALTER TABLE `proveedores`
  MODIFY `prv_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
  
 -- AUTO_INCREMENT de la tabla `ventas`
ALTER TABLE `ingreso_stock`
  MODIFY `ing_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
  
-- AUTO_INCREMENT de la tabla `ventas`
ALTER TABLE `ventas`
  MODIFY `vta_codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --------------------------------------------
-- Restricciones de las tablas 
-- -------------------------------------------- 

-- Filtros para la tabla `producto`
ALTER TABLE `productos`
  ADD CONSTRAINT `producto-categoria` FOREIGN KEY (`prd_cat_cod`) REFERENCES `categorias` 
  (`cat_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prducto-proveedor` FOREIGN KEY (`prd_prv_cod`) REFERENCES `proveedores`
  (`prv_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Filtros para la tabla `ingreso_stock`
ALTER TABLE `ingreso_stock`
  ADD CONSTRAINT `ingreso-producto` FOREIGN KEY (`ing_prd_cod`) REFERENCES `productos` 
  (`prd_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Filtros para la tabla `ventas`
ALTER TABLE `ventas`
  ADD CONSTRAINT `venta-producto` FOREIGN KEY (`vta_prd_cod`) REFERENCES `productos` 
  (`prd_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;