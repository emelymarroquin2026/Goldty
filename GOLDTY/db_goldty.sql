-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2026 a las 00:03:15
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
-- Base de datos: `db_goldty`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_imp`
--

CREATE TABLE `actividad_imp` (
  `id_actividad_imp` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `completada` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad_imp`
--

INSERT INTO `actividad_imp` (`id_actividad_imp`, `titulo`, `descripcion`, `id_categoria`, `fecha`, `hora`, `completada`, `id_usuario`) VALUES
(0, 'Practicar TOEIC', '', 2, '2026-01-20', '15:03:00', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_noimp`
--

CREATE TABLE `actividad_noimp` (
  `id_actividad_noimp` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `completada` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad_noimp`
--

INSERT INTO `actividad_noimp` (`id_actividad_noimp`, `titulo`, `descripcion`, `id_categoria`, `fecha`, `hora`, `completada`, `id_usuario`) VALUES
(0, 'Ver Demon Slayer', '', 3, '2026-01-21', '15:50:00', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_urge`
--

CREATE TABLE `actividad_urge` (
  `id_actividad_u` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `completada` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad_urge`
--

INSERT INTO `actividad_urge` (`id_actividad_u`, `titulo`, `descripcion`, `id_categoria`, `fecha`, `hora`, `completada`, `id_usuario`) VALUES
(13, 'Website', 'Arreglar el website', 2, '2026-01-19', '17:30:00', 1, 5),
(14, 'jad', 'akjbda', 5, '2026-01-20', '16:12:00', 1, 5),
(15, 'ola', 'ola', 3, '2026-01-20', '16:51:00', 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Trabajo'),
(2, 'Estudio'),
(3, 'Ocio'),
(4, 'Recreacion'),
(5, 'Deportiva'),
(6, 'Relajación'),
(7, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Ocupacion` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `Nombre`, `Edad`, `Ocupacion`, `Correo`, `contraseña`) VALUES
(5, 'mily', 16, 'Estudiante', 'mily@gmail.com', 'Mily');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_imp`
--
ALTER TABLE `actividad_imp`
  ADD PRIMARY KEY (`id_actividad_imp`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `actividad_noimp`
--
ALTER TABLE `actividad_noimp`
  ADD PRIMARY KEY (`id_actividad_noimp`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `actividad_urge`
--
ALTER TABLE `actividad_urge`
  ADD PRIMARY KEY (`id_actividad_u`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_urge`
--
ALTER TABLE `actividad_urge`
  MODIFY `id_actividad_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_urge`
--
ALTER TABLE `actividad_urge`
  ADD CONSTRAINT `actividad_urge_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `actividad_urge_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
