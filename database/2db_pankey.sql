-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2024 a las 00:09:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pankey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id_auditoria` int(11) NOT NULL,
  `cedula_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tabla_afectada` varchar(20) DEFAULT NULL,
  `operacion_realizada` varchar(20) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id_auditoria`, `cedula_usuario`, `fecha`, `hora`, `tabla_afectada`, `operacion_realizada`, `nombre_usuario`) VALUES
(1, 1050298650, '2023-12-18', '11:39:22', 'producto', 'CREATE', 'Luis Londra'),
(2, 1050298650, '2023-12-18', '11:40:09', 'canasta', 'INSERT', 'Luis Londra'),
(3, 1050298650, '2023-12-18', '11:41:41', 'cliente', 'UPDATE', 'Luis Londra'),
(4, 1050298650, '2023-12-18', '11:41:55', 'pedido', 'DELETE', 'Luis Londra'),
(5, 1050298650, '2023-12-18', '11:42:09', 'roles', 'INSERT', 'Luis Londra'),
(6, 1050298650, '2023-12-18', '11:42:23', 'usuarios', 'UPDATE', 'Luis Londra'),
(7, 1050298650, '2023-12-18', '11:42:37', 'comprobante_venta', 'CREATE', 'Luis Londra'),
(8, 1050298650, '2023-12-18', '11:42:57', 'producto', 'DELETE', 'Luis Londra'),
(9, 1050298650, '2023-12-18', '11:43:06', 'canasta', 'UPDATE', 'Luis Londra'),
(10, 1050298650, '2023-12-18', '11:43:15', 'roles', 'DELETE', 'Luis Londra'),
(11, 1002120028, '2023-12-18', '11:49:42', 'producto', 'UPDATE', 'Susana Torio'),
(12, 1002120028, '2023-12-18', '11:50:04', 'producto', 'DELETE', 'Susana Torio'),
(13, 1002120028, '2023-12-18', '11:50:24', 'producto', 'UPDATE', 'Susana Torio'),
(14, 1002120028, '2023-12-18', '11:50:38', 'producto', 'DELETE', 'Susana Torio'),
(15, 1002120028, '2023-12-18', '11:50:59', 'producto', 'UPDATE', 'Susana Torio'),
(16, 1002120028, '2023-12-18', '11:51:10', 'producto', 'DELETE', 'Susana Torio'),
(17, 1002120028, '2023-12-18', '11:51:20', 'producto', 'UPDATE', 'Susana Torio'),
(18, 1002120028, '2023-12-18', '11:51:30', 'producto', 'DELETE', 'Susana Torio'),
(19, 1002120028, '2023-12-18', '11:51:40', 'producto', 'UPDATE', 'Susana Torio'),
(20, 1002120028, '2023-12-18', '11:51:48', 'producto', 'DELETE', 'Susana Torio'),
(21, 1002120028, '2023-12-18', '12:00:00', 'cliente', 'INSERT', 'Susana Torio'),
(22, 1002120028, '2023-12-18', '12:00:12', 'comprobante_venta', 'SELECT', 'Susana Torio'),
(23, 1002120028, '2023-12-18', '12:00:26', 'pedido', 'INSERT', 'Susana Torio'),
(24, 1002120028, '2023-12-18', '12:00:39', 'producto', 'SELECT', 'Susana Torio'),
(25, 1002120028, '2023-12-18', '12:00:51', 'roles', 'INSERT', 'Susana Torio'),
(26, 1002120028, '2023-12-18', '12:01:02', 'usuarios', 'SELECT', 'Susana Torio'),
(27, 1002120028, '2023-12-18', '12:01:11', 'canasta', 'INSERT', 'Susana Torio'),
(28, 1002120028, '2023-12-18', '12:01:21', 'cliente', 'SELECT', 'Susana Torio'),
(29, 1002120028, '2023-12-18', '12:01:30', 'pedido', 'INSERT', 'Susana Torio'),
(30, 1002120028, '2023-12-18', '12:01:40', 'roles', 'SELECT', 'Susana Torio'),
(31, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(32, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(33, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(34, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(35, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(36, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(37, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(38, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(39, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes'),
(40, 1004195200, '2023-12-18', '14:36:12', 'producto', 'DELETE', 'Dolores Fuertes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canasta`
--

CREATE TABLE `canasta` (
  `id_canasta` int(11) NOT NULL,
  `codigo_pastel` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `cantidad_cliente` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `dedicatoria` varchar(400) DEFAULT NULL,
  `especificacion_adicional` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cedula_cliente` varchar(10) DEFAULT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `direccion_domicilio` varchar(50) DEFAULT NULL,
  `telefono_movil` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `password`, `cedula_cliente`, `nombre_cliente`, `direccion_domicilio`, `telefono_movil`) VALUES
(1, 'anthonyluisluna225@gmail.com', '$2y$10$iPy1sQUt0BSUunfaxUCX3OUPzVC2w/OqBV/4WOuNIwZwvFwdEtihW', NULL, NULL, NULL, NULL),
(2, 'luchitolondra522@gmail.com', '$2y$10$TDckOQ6e4FKCqXsoIfZlIeBDoU3djB5LMbObpqqX5RdjtTOhfh08C', NULL, NULL, NULL, NULL),
(3, 'johanapuerchambud07@gmail.com', '$2y$10$gcDg/cdwiHUoW4H9GtCc5eKKaKZIllSw7ae9wVeIKdFpdr97QxNbK', NULL, NULL, NULL, NULL),
(4, 'mrpusda@gmail.com', '$2y$10$mMe4pKL94efewvtmdnSJIu2YixT5epo5FPfzJaKtnP2ZJ6y/eRbNi', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_venta`
--

CREATE TABLE `comprobante_venta` (
  `id_comprobante_venta` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `total_pago` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `operaciones`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `operaciones` (
`cantidad_operacion` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pastel`
--

CREATE TABLE `pastel` (
  `codigo_pastel` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `tamano` varchar(100) NOT NULL,
  `masa` varchar(100) NOT NULL,
  `sabor` varchar(100) NOT NULL,
  `cobertura` varchar(100) NOT NULL,
  `relleno` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `porciones` varchar(100) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pastel`
--

INSERT INTO `pastel` (`codigo_pastel`, `categoria`, `tamano`, `masa`, `sabor`, `cobertura`, `relleno`, `descripcion`, `precio`, `porciones`, `img`) VALUES
(1, 'Bodas', 'Mediana', 'Normal (Con receta propia)', 'Naranja', 'Crema', 'Mermelada de frutilla', '', 12, '16', 'https://th.bing.com/th/id/R.b042dade06440a9cf8c236b81ad2c4d8?rik=8ynKhjpIzp3%2bmA&pid=ImgRaw&r=0'),
(2, 'Bautizos', 'Mediana', 'Normal (Con receta propia)', 'Naranja', 'Crema', 'Mermelada de frutilla', '', 12, '16', 'https://th.bing.com/th/id/R.b40b59c817f0ec2c24a5097a457b2c58?rik=LSOvD1PsMJfxeA&pid=ImgRaw&r=0'),
(3, 'Bodas', 'Pequeña', 'Normal (Con receta propia)', 'Naranja', 'Crema', 'Mermelada de frutilla', '', 10, '20-25 ', 'https://sallysbakingaddiction.com/wp-content/uploads/2013/04/triple-chocolate-cake-4.jpg'),
(4, 'Cumpleaños', 'Mediana', 'Normal (Con receta propia)', 'Naranja', 'Crema', 'Mermelada de frutilla', '', 12, '16', 'https://th.bing.com/th/id/OIP.-vDV59NDSrLbo5SKb2jxggHaF3?pid=ImgDet&rs=1'),
(5, 'Baby Shower', 'Mediana', 'Normal (Con receta propia)', 'Chocolate', 'Crema', 'Mermelada de frutilla', '', 12, '16', 'https://th.bing.com/th/id/R.46fb8a09fc2f95a905b4342a428bd1fd?rik=C3KVdZ9n6YOTIw&pid=ImgRaw&r=0'),
(6, 'Bodas', 'Mini ', 'Normal (Con receta propia)', 'Naranja', 'Crema', 'Mermelada de frutilla', '', 15, '5-6', 'https://www.recipetineats.com/wp-content/uploads/2020/08/My-best-Vanilla-Cake_9-SQ.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `cedula_usuario` int(11) DEFAULT NULL,
  `nombre_rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `cedula_usuario`, `nombre_rol`) VALUES
(1, 1050298650, 'administrador'),
(2, 1002120028, 'operador'),
(3, 1002120028, 'usuario'),
(4, 1001936721, 'auditor'),
(5, 1004195200, 'operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula_usuario`, `nombre_usuario`, `correo`, `contrasena`) VALUES
(1001936721, 'Aquiles Castro', 'kacalderonp@utn.edu.ec', 'c@f3c0np@n'),
(1002120028, 'Susana Torio', 'allunav@utn.edu.ec', 'c@f3c0np@n'),
(1004195200, 'Dolores Fuertes', 'jepuerchambudp@utn.edu.ec', 'c@f3c0np@n'),
(1050298650, 'Luis Londra', 'luchitolondra522@gmail.com', 'c@f3c0np@n');

-- --------------------------------------------------------

--
-- Estructura para la vista `operaciones`
--
DROP TABLE IF EXISTS `operaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operaciones`  AS SELECT count(0) AS `cantidad_operacion` FROM `auditoria` WHERE `auditoria`.`operacion_realizada` = 'DELETE' AND `auditoria`.`tabla_afectada` = 'producto' GROUP BY `auditoria`.`nombre_usuario` ORDER BY count(0) ASC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `FK_Relationship_2` (`cedula_usuario`);

--
-- Indices de la tabla `canasta`
--
ALTER TABLE `canasta`
  ADD PRIMARY KEY (`id_canasta`),
  ADD KEY `FK_PEDIDO_CANASTA` (`id_pedido`),
  ADD KEY `FK_PRODUCTO_CANASTA` (`codigo_pastel`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `comprobante_venta`
--
ALTER TABLE `comprobante_venta`
  ADD PRIMARY KEY (`id_comprobante_venta`),
  ADD KEY `FK_PEDIDO_COMPROBANTE_VENTA2` (`id_pedido`);

--
-- Indices de la tabla `pastel`
--
ALTER TABLE `pastel`
  ADD PRIMARY KEY (`codigo_pastel`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `FK_CLIENTE_PEDIDO` (`id_cliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `FK_Relationship_6` (`cedula_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `canasta`
--
ALTER TABLE `canasta`
  MODIFY `id_canasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `FK_Relationship_2` FOREIGN KEY (`CEDULA_USUARIO`) REFERENCES `usuarios` (`CEDULA_USUARIO`);

--
-- Filtros para la tabla `canasta`
--
ALTER TABLE `canasta`
  ADD CONSTRAINT `FK_PEDIDO_CANASTA` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`),
  ADD CONSTRAINT `FK_PRODUCTO_CANASTA` FOREIGN KEY (`codigo_pastel`) REFERENCES `pastel` (`codigo_pastel`);

--
-- Filtros para la tabla `comprobante_venta`
--
ALTER TABLE `comprobante_venta`
  ADD CONSTRAINT `FK_PEDIDO_COMPROBANTE_VENTA2` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_CLIENTE_PEDIDO` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `FK_Relationship_6` FOREIGN KEY (`CEDULA_USUARIO`) REFERENCES `usuarios` (`CEDULA_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




                   