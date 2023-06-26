-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 13:19:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `estado_distrito`
--

CREATE TABLE `estado_distrito` (
  `id` int(11) NOT NULL,
  `estado` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_distrito`
--

INSERT INTO `estado_distrito` (`id`, `estado`) VALUES
(1, 'Disponible'),
(2, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_movilidad`
--

CREATE TABLE `estado_movilidad` (
  `id` int(11) NOT NULL,
  `estado` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_movilidad`
--

INSERT INTO `estado_movilidad` (`id`, `estado`) VALUES
(1, 'Disponible'),
(2, 'Ocupado'),
(3, 'No disponible'),
(4, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_msj`
--

CREATE TABLE `estado_msj` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_msj`
--

INSERT INTO `estado_msj` (`id`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'En curso'),
(3, 'Concluido'),
(4, 'Cancelado'),
(5, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(300) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `fecha_emergencia` datetime DEFAULT NULL,
  `fecha_en_curso` datetime DEFAULT NULL,
  `fecha_modificada` datetime DEFAULT NULL,
  `fecha_concluida` datetime DEFAULT NULL,
  `fecha_cancelada` datetime DEFAULT NULL,
  `usuario_modificado` varchar(85) DEFAULT NULL,
  `usuario_cancelado` varchar(85) DEFAULT NULL,
  `motivo_cancelacion` varchar(300) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `motivo_baja` varchar(300) DEFAULT NULL,
  `usuario_baja` varchar(65) DEFAULT NULL,
  `id_movilidad2` int(11) DEFAULT NULL,
  `id_distrito2` int(11) DEFAULT NULL,
  `id_estado_msj2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `motivo`, `celular`, `ubicacion`, `observaciones`, `fecha_emergencia`, `fecha_en_curso`, `fecha_modificada`, `fecha_concluida`, `fecha_cancelada`, `usuario_modificado`, `usuario_cancelado`, `motivo_cancelacion`, `fecha_baja`, `motivo_baja`, `usuario_baja`, `id_movilidad2`, `id_distrito2`, `id_estado_msj2`) VALUES
(1, 'Atención RCP', '2612634082', '-32.935120, -68.761996', NULL, '2022-11-15 11:27:03', NULL, '2022-12-02 09:46:24', NULL, NULL, 'Agustin Videla', NULL, NULL, '2022-12-02 09:46:35', 'Prueba eliminacion', 'Agustin Videla', 5, NULL, 5),
(2, 'Atención RCP', '2612634011', '-32.935120, -68.761996', NULL, '2022-11-16 09:19:04', NULL, '2022-12-02 10:50:52', NULL, NULL, 'Agustin Videla', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(3, 'Atención RCP', '2612634012', '-32.935120, -68.761996', NULL, '2022-11-16 09:30:03', '2022-12-02 09:26:38', '2022-12-02 09:40:31', NULL, '2022-12-02 09:40:44', 'Agustin Videla', 'Agustin Videla', 'Prueba cancelacion', NULL, NULL, NULL, 1, NULL, 4),
(4, 'Atención RCP', '2612637698', '-32.935120, -68.761996', 'Prueba terminado', '2022-11-16 09:32:00', '2022-12-02 09:23:46', '2022-12-02 09:23:46', '2022-12-02 09:27:33', NULL, 'Agustin Videla', NULL, NULL, NULL, NULL, NULL, 1, 1, 3),
(5, 'Atención RCP', '2612637123', '-32.935120, -68.761996', NULL, '2022-12-02 10:57:27', NULL, '2022-12-03 20:23:15', NULL, NULL, 'Agustin Videla', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_usuario`
--

CREATE TABLE `mensaje_usuario` (
  `id` int(11) NOT NULL,
  `id_mensaje2` int(11) DEFAULT NULL,
  `dni_usuario2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje_usuario`
--

INSERT INTO `mensaje_usuario` (`id`, `id_mensaje2`, `dni_usuario2`) VALUES
(24, 4, 42000000),
(25, 4, 42000001),
(27, 3, 42000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movilidad`
--

CREATE TABLE `movilidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_creado` varchar(65) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(65) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `motivo_baja` varchar(300) DEFAULT NULL,
  `usuario_baja` varchar(65) DEFAULT NULL,
  `motivo_indisponible` varchar(300) DEFAULT NULL,
  `fecha_estado` datetime DEFAULT NULL,
  `id_estado_movilidad2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movilidad`
--

INSERT INTO `movilidad` (`id`, `nombre`, `descripcion`, `fecha_creado`, `usuario_creado`, `fecha_modificado`, `usuario_modificado`, `fecha_baja`, `motivo_baja`, `usuario_baja`, `motivo_indisponible`, `fecha_estado`, `id_estado_movilidad2`) VALUES
(1, 'P-101', 'ejemplo', '2022-11-15 11:32:54', 'agustinvidela', '2022-12-05 09:15:46', 'Agustin Videla', NULL, NULL, NULL, NULL, '2022-12-04 20:15:02', 1),
(2, 'P-102', NULL, '2022-11-17 08:57:50', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(3, 'P-103', NULL, '2022-11-17 08:59:04', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(4, 'P-104', NULL, '2022-11-17 08:59:26', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, 'Prueba', NULL, 1),
(5, 'P-105', NULL, '2022-11-17 08:59:58', 'agustinvidela', '2022-12-04 04:57:46', 'Agustin Videla', '2022-12-05 09:27:22', 'Prueba baja', 'Agustin Videla', NULL, '2022-12-04 04:57:46', 4),
(6, 'P-106', 'Camioneta', '2022-12-05 10:55:44', 'Agustin Videla', '2022-12-05 11:58:19', 'Agustin Videla', NULL, NULL, NULL, NULL, '2022-12-05 10:55:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `correo`, `username`, `pass`, `fecha_creado`, `usuario_creado`, `fecha_modificado`, `usuario_modificado`, `fecha_baja`, `motivo_baja`, `usuario_baja`, `rol_anterior`, `ultimo_acceso`, `id_rol2`) VALUES
(20444696, 'Fernando', 'Airoldi', 'alguien@gmail.com', 'fernando.airoldi', '1234', '2022-12-06 13:16:12', 'Agustin Videla', NULL, NULL, '2022-12-07 10:52:48', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis, inventore quo fugit fugiat impedit obcaecati quas optio voluptates dolorem eum pariatur facilis id exercitationem ratione iusto sit iste ducimus.', 'Agustin Videla', 'Supervisor', NULL, NULL),
(42000000, 'Agente', 'Ejemplo', NULL, 'agente', '1234', '2022-11-16 12:39:05', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(42000001, 'Supervisor', 'Ejemplo', NULL, 'supervisor', '1234', '2022-11-18 11:08:45', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(42913695, 'Agustin', 'Videla', 'agustinvidela835@gmail.com', 'agustinvidela', '4321', '2022-11-11 08:56:31', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-07 09:31:54', 3),
(44662123, 'Luca', 'Tejada', 'lucatejada@icloud.com', 'lucatejada', '789', '2023-04-18 11:54:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_estado_distrito2` (`id_estado_distrito2`);

--
-- Indices de la tabla `estado_distrito`
--
ALTER TABLE `estado_distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_movilidad`
--
ALTER TABLE `estado_movilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_msj`
--
ALTER TABLE `estado_msj`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_movilidad2` (`id_movilidad2`),
  ADD KEY `fk_id_distritos2` (`id_distrito2`),
  ADD KEY `fk_id_estado_msj2` (`id_estado_msj2`);

--
-- Indices de la tabla `mensaje_usuario`
--
ALTER TABLE `mensaje_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dni_usuario2` (`dni_usuario2`),
  ADD KEY `fk_id_mensaje2` (`id_mensaje2`);

--
-- Indices de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_nombre` (`nombre`),
  ADD KEY `fk_id_estado_movilidad` (`id_estado_movilidad2`);

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
-- AUTO_INCREMENT de la tabla `estado_distrito`
--
ALTER TABLE `estado_distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_movilidad`
--
ALTER TABLE `estado_movilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_msj`
--
ALTER TABLE `estado_msj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensaje_usuario`
--
ALTER TABLE `mensaje_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `fk_id_estado_distrito2` FOREIGN KEY (`id_estado_distrito2`) REFERENCES `estado_distrito` (`id`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_id_distritos2` FOREIGN KEY (`id_distrito2`) REFERENCES `distritos` (`id`),
  ADD CONSTRAINT `fk_id_estado_msj2` FOREIGN KEY (`id_estado_msj2`) REFERENCES `estado_msj` (`id`),
  ADD CONSTRAINT `fk_id_movilidad2` FOREIGN KEY (`id_movilidad2`) REFERENCES `movilidad` (`id`);

--
-- Filtros para la tabla `mensaje_usuario`
--
ALTER TABLE `mensaje_usuario`
  ADD CONSTRAINT `fk_dni_usuario2` FOREIGN KEY (`dni_usuario2`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `fk_id_mensaje2` FOREIGN KEY (`id_mensaje2`) REFERENCES `mensaje` (`id`);

--
-- Filtros para la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD CONSTRAINT `fk_id_estado_movilidad2` FOREIGN KEY (`id_estado_movilidad2`) REFERENCES `estado_movilidad` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_rol2` FOREIGN KEY (`id_rol2`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
