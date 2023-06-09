-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2023 a las 23:01:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tcpip_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` longtext DEFAULT NULL,
  `dni` bigint(100) NOT NULL,
  `telefono` bigint(100) DEFAULT NULL,
  `email` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Clientes del sistema\r\n';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `nombre`, `direccion`, `dni`, `telefono`, `email`) VALUES
(1, 'Luca Tejada', 'Pedro Goyena 977', 44662123, 2617076187, 'lukatejadagmail.com'),
(2, 'Agustin Videla', 'En el medio del campo', 4321, 2617123456, 'agustinvidela@gmail.com'),
(3, 'Lucas Saleme ', 'Libertad 720', 44000000, 2617894561, 'lucasaleme@gmail.com\r\n'),
(4, 'Franco Moreno', 'Guaymallen 123', 44000001, 2617891236, 'francom@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_creado` varchar(65) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(65) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `motivo_baja` varchar(300) DEFAULT NULL,
  `usuario_baja` varchar(65) DEFAULT NULL,
  `id_estado_distrito2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`, `codigo_postal`, `fecha_creado`, `usuario_creado`, `fecha_modificado`, `usuario_modificado`, `fecha_baja`, `motivo_baja`, `usuario_baja`, `id_estado_distrito2`) VALUES
(1, 'Belgrano', '5533', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Buena Nueva', '5523', NULL, NULL, '2022-11-29 19:09:24', 'Agustin Videla', NULL, NULL, NULL, 1),
(3, 'Capilla del Rosario', '5523', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Colonia Molina', '5646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'Colonia Segovia', '5646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Dorrego', '5626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 'El Bermejo', '5533', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 'El Sauce', '5533', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'Jesús Nazareno', '5638', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 'Kilómetro 8', '5525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 'Kilómetro 11', '5525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 'Las Cañas', '5519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 'Los Corralitos', '5527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 'La Primavera', '5641', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(15, 'Nueva Ciudad', '5519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(16, 'Pedro Molina', '5519', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(17, 'Puente de Hierro', '5527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(18, 'Rodeo de la Cruz', '5525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(19, 'San Francisco del Monte', '5503', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, 'San José', '5519', NULL, NULL, NULL, NULL, '2022-12-05 09:46:34', 'baja', 'Agustin Videla', 2),
(21, 'Villa Nueva', '5521', NULL, NULL, NULL, NULL, '2022-11-29 20:08:27', 'awddawawwda', 'Agustin Videla', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_msj`
--

CREATE TABLE `estado_msj` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `color_estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_msj`
--

INSERT INTO `estado_msj` (`id`, `estado`, `color_estado`) VALUES
(1, 'Pendiente', '#adb5bd'),
(2, 'En curso', '#0d6efd'),
(3, 'Concluido', '#198754'),
(4, 'Cancelado', '#dc3545'),
(5, 'Eliminado', '#ffc107'),
(6, 'Pasar presupuesto', 'ff0099'),
(7, 'Retirado', '#000080'),
(8, 'Presupuesto aceptado', '#009999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `num_orden` int(11) NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `descripcion` longtext DEFAULT NULL,
  `num_siniestro` bigint(11) DEFAULT NULL,
  `presupuesto` float DEFAULT NULL,
  `id_estado_msj2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Ordenes de telefono \r\n';

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`num_orden`, `equipo`, `descripcion`, `num_siniestro`, `presupuesto`, `id_estado_msj2`) VALUES
(1, 'Samsung Galaxy S3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et massa dictum odio dapibus faucibus. Curabitur sodales magna nibh, a consequat sem blandit vitae. ', 1231245897, 1353.99, 2),
(2, 'Motorola G7', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles', 458962, 8000, 3),
(3, 'Iphone 8', 'Use border utilities to quickly style the border and border-radius of an element. Great for images, buttons, or any other element.', 123456, 13895, 1),
(4, 'Computadora Exo', 'Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.', 7536951, 9962.75, 4),
(5, 'Control remoto', 'Install Bootstrap’s source Sass and JavaScript files via npm, RubyGems, Composer, or Meteor. Package managed installs don’t include documentation or our full build scripts. You can also use any demo from our Examples repo to quickly jumpstart Bootstrap projects.', 7536, 9962.75, 5),
(6, 'asd', 'asd', 123, 456, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `tipo_usuario`) VALUES
(1, 'Agente'),
(2, 'Supervisor'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `apellido` varchar(65) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `username` varchar(65) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_creado` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(100) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `motivo_baja` varchar(300) DEFAULT NULL,
  `usuario_baja` varchar(65) DEFAULT NULL,
  `rol_anterior` varchar(65) DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL,
  `id_rol2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `correo`, `username`, `pass`, `fecha_creado`, `usuario_creado`, `fecha_modificado`, `usuario_modificado`, `fecha_baja`, `motivo_baja`, `usuario_baja`, `rol_anterior`, `ultimo_acceso`, `id_rol2`) VALUES
(20444696, 'Fernando', 'Airoldi', 'alguien@gmail.com', 'fernando.airoldi', '1234', '2022-12-06 13:16:12', 'Agustin Videla', NULL, NULL, '2022-12-07 10:52:48', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis, inventore quo fugit fugiat impedit obcaecati quas optio voluptates dolorem eum pariatur facilis id exercitationem ratione iusto sit iste ducimus.', 'Agustin Videla', 'Supervisor', NULL, 2),
(42000000, 'Agente', 'Ejemplo', NULL, 'agente', '1234', '2022-11-16 12:39:05', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(42000001, 'Supervisor', 'Ejemplo', NULL, 'supervisor', '1234', '2022-11-18 11:08:45', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(42913695, 'Agustin', 'Videla', 'agustinvidela835@gmail.com', 'agustinvidela', '4321', '2022-11-11 08:56:31', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-07 09:31:54', 3),
(44662123, 'Luca', 'Tejada', 'lucatejada@icloud.com', 'lucatejada', '789', '2023-04-18 11:54:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_estado_distrito2` (`id_estado_distrito2`);

--
-- Indices de la tabla `estado_msj`
--
ALTER TABLE `estado_msj`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`num_orden`),
  ADD KEY `id_estado_msj2` (`id_estado_msj2`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `UNIQUE_EMAIL` (`correo`),
  ADD UNIQUE KEY `UNIQUE_USER` (`username`),
  ADD KEY `fk_id_rol2` (`id_rol2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `estado_msj`
--
ALTER TABLE `estado_msj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `num_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
