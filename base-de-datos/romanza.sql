-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 18:21:14
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `romanza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `fecha_registro`) VALUES
(1, 'Bebidas', 'Bebidas con o sin alcohol', '2022-11-20'),
(2, 'Carnes', 'Todos los tipos de carne y preparaciones con carne', '2022-11-19'),
(4, 'Postres', 'Toda clase de postres desde tortas hasta helados', '2022-11-14'),
(5, 'Sopas', 'Todo tipo de sopas caldos y cremas', '2022-11-14'),
(6, 'Pastas', 'Preparaciones con salsas y pastas', '2022-11-20'),
(7, 'Ensaladas', 'Ensaladas de distintas preparaciones', '2022-11-16'),
(8, 'Pizzas', 'Pizzas de variedad', '2022-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversion`
--

CREATE TABLE `conversion` (
  `id_conversion` int(11) NOT NULL,
  `dolar` int(11) NOT NULL,
  `bs_equivalencia` text NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conversion`
--

INSERT INTO `conversion` (`id_conversion`, `dolar`, `bs_equivalencia`, `fecha_registro`) VALUES
(1, 1, '10.23', '2022-11-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `referencia` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `direccion`, `referencia`, `id_usuario`, `fecha_registro`) VALUES
(1, 'Sector 04 las casitas. Zona norte - el cují.', 'Detrás de la cancha de futbol', 3, '2022-11-23'),
(3, 'Sector 01 las casitas, av 4 con calle 5. Zona norte - el cují.', 'Frente al negocio de impresiones julio', 3, '2022-11-23'),
(4, 'Zone norte, vía el cují. Urb don aurelio casa 15-34', 'ninguna', 4, '2022-11-23'),
(5, 'Zone norte, vía el cují. Urb Yucatan casa 15-10', 'ninguna', 6, '2022-11-23'),
(7, 'Pueblo Nuevo calle 6 entre carrera 1 y Avenida los Horcones', 'Al frente del gran bonche', 9, '2022-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` text DEFAULT NULL,
  `cedula` text NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `estatus` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `id_opinion` int(11) NOT NULL,
  `opinion` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`id_opinion`, `opinion`, `id_usuario`, `fecha_registro`) VALUES
(1, 'Muy buen restaurante de comida italiana Hemos comido CANELONES súper ricos, y un plato que se llama BOLOGNA.', 3, '2022-11-23'),
(3, 'Por 16 euros comimos canelones de vegetales y de carne y dos postres caseros enormes, el tiramisú estaba increíble. Si volvemos por aquí repetiremos sitio.', 5, '2022-11-23'),
(4, 'Fue un servicio rápido y eficiente, la camarera que nos atendió exelente, es súper simpática.', 4, '2022-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` varchar(45) NOT NULL,
  `total` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estatus` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `total`, `id_usuario`, `estatus`, `fecha_registro`) VALUES
('5b', '3.50', 3, 'pendiente', '2022-11-28'),
('yhkd', '4.00', 5, 'pendiente', '2022-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_orden` varchar(45) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `total` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `codigo`, `id_producto`, `total`, `cantidad`, `fecha_registro`) VALUES
(1, 'yhkd', 19, '4.00', 2, '2022-11-28'),
(2, '5b', 8, '3.50', 1, '2022-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `precio` text NOT NULL,
  `estatus` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `imagen`, `precio`, `estatus`, `id_categoria`, `fecha_registro`) VALUES
(2, 'Batido de Fresa', 'Batido natural de fresa con leche', '2.webp', '1.85', 'activo', 4, '2022-11-17'),
(3, 'Sorbete', 'Batido dulce y cremoso semi helado', '3.webp', '2.50', 'inactivo', 1, '2022-11-14'),
(5, 'Té de Burbujas', 'Té de frutas con leche y bolitas de tapioca', '5.webp', '3.00', 'activo', 1, '2022-11-14'),
(8, 'Banana Split', 'Postre de helado y banana', '8.webp', '3.50', 'activo', 4, '2022-11-18'),
(9, 'Pollo a la Parrilla', 'Pollo a la parrilla con salsa agridulce', '9.webp', '5.25', 'activo', 2, '2022-11-14'),
(10, 'Sopa de Mariscos', 'Sopa de mariscos expecial italiana', '10.webp', '4.00', 'activo', 5, '2022-11-14'),
(11, 'Tarta de Queso', 'Tarta de queso dulce con ceresas', '11.webp', '4.00', 'activo', 4, '2022-11-15'),
(12, 'Pasta Italiana Básica', 'Pasta con vegetales variados', '12.webp', '4.50', 'activo', 6, '2022-11-16'),
(13, 'Caldo de Pollo', 'Cado de pollo con pasta', '13.webp', '4.50', 'inactivo', 5, '2022-11-16'),
(15, 'CocaCola', 'Refresco cocacola', '15.webp', '0.65', 'inactivo', 1, '2022-11-17'),
(16, 'Ensalada de Frutas', 'Ensalada de frutas variadas', '16.webp', '2.50', 'activo', 7, '2022-11-19'),
(17, 'Caldo de Res', 'Caldo de res con tallarines', '17.webp', '04.00', 'activo', 5, '2022-11-20'),
(18, 'Patatas con Queso', 'Patatas con queso y carne', '18.webp', '3.30', 'activo', 2, '2022-11-20'),
(19, 'Brownie', 'Torta brownie con nueces', '19.webp', '2.00', 'activo', 4, '2022-11-20'),
(21, 'Tarta de fresa', 'Tarta de fresa con queso', '21.webp', '03.80', 'activo', 4, '2022-11-25'),
(22, 'Ensalada de Mariscos', 'Ensalada de camarones y otros mariscos', '22.webp', '2.00', 'activo', 7, '2022-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Encargado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `telefono` text NOT NULL,
  `clave` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `nombre_usuario`, `telefono`, `clave`, `id_rol`, `fecha_registro`) VALUES
(1, 'Administrador', 'Admin123', '02518836170', '2195240f6112a2340feb9d6dbbb773b4', 1, '2022-11-22'),
(2, 'Encargado', 'DeliveryE', '02518836170', 'c12d143364a464b525b794b7876f4111', 2, '2022-11-22'),
(3, 'Vanessa Barboza', 'Vanemaru29', '04121384558', '4fbdbea696045fb0af973a8c8198325f', 3, '2022-11-23'),
(4, 'Joseph Velis', 'JosephMVB', '04245244469', '05a517f8e60be259648abed77c0c65e5', 3, '2022-11-23'),
(5, 'Camila Medina', 'CamiValen', '04166528927', '5fa1d5d52a34bb5d184cacfbaad68ff9', 3, '2022-11-23'),
(6, 'Pablo Riera', 'FloralShop', '04245663456', '0ab9d77f602177b87619626847a92f9b', 3, '2022-11-23'),
(7, 'Rosali Barboza', 'RosyAnarel', '04125356484', '61917152b00a886a8c79089a2714cc26', 3, '2022-11-23'),
(8, 'Jonathan Barboza', 'Jothanak', '04145445583', '32467c2e0d2d69d1b9ba3d4c41a3b548', 3, '2022-11-25'),
(9, 'Fabiana Martinez', 'fabimar27', '04143515753', '9038a2676229e68ec24104df0695ae8b', 3, '2022-11-27'),
(10, 'David Medina', 'CDMedin19', '04145497158', '71d3d8cf54948fb923b173367d3b7f48', 3, '2022-11-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `conversion`
--
ALTER TABLE `conversion`
  ADD PRIMARY KEY (`id_conversion`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD UNIQUE KEY `id_orden` (`id_orden`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`),
  ADD KEY `id_direccion_2` (`id_direccion`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `conversion`
--
ALTER TABLE `conversion`
  MODIFY `id_conversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direccion` (`id_direccion`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_pago` (`id_metodo_pago`),
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
