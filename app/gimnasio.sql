CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nif`, `nombre`, `apellido1`, `apellido2`, `imagen`, `login`, `password`, `email`, `telefono`, `direccion`, `rol`) VALUES
(3, '22312313A', 'Adrian', 'Gomez', 'Luna', 'usuario.jpg', 'adri', '83b621ca1ac1f7df26124821387af790d0f22e4f', 'adrigoluna@hotmail.com', 666777889, 'Duque de Ahumada', 1),
(16, '12312312R', 'maria', 'maria', 'mira', 'usuaria.jpg', 'mari', '5d95cb27f49aafe1eac579adf55ae18deeb49b8c', 'maia@miya.com', 666777822, 'huelva', 1),
(18, '44221362k', 'admin', 'admin', 'admin', 'admin.jpg', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', 666777822, 'Duque de Ahumada', 0),
(21, '12312312f', 'user', 'user', 'user', 'usua.jpg', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user@user', 678123592, 'huelva', 1),
(22, '54321234L', 'Susana', 'Alvarez', 'Casa', 'usu.jpg', 'susana', 'f925d420627f3db470e17fc2a289a4dd103722f2', 'ufasd@gmail.com', 653658930, 'Salamanca', 2),
(24, '65287768j', 'raton', 'rata', 'ratita', 'usuario.jpg', 'raton2', 'a11bb39da6737129ddcf2496c67220161e6eb9a0', 'sdadsf@fdsadf', 678900000, 'Kilates', 1),
(25, '24312345S', 'Lapiz', 'Rosa', 'Gorrion', 'usua.jpg', 'lapiz', 'd9c3e243f36d9c41cc516e5a7425fede8155b050', 'asfads@tret', 623465421, 'Sevilla', 2);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `rol` (`rol`) USING BTREE;


ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;