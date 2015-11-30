-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2015 a las 14:05:37
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skills`
--
CREATE DATABASE IF NOT EXISTS `skills` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `skills`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `califcompetencias`
--

DROP TABLE IF EXISTS `califcompetencias`;
CREATE TABLE `califcompetencias` (
  `id` int(11) NOT NULL,
  `mes_id` int(11) DEFAULT NULL,
  `dni_id` int(11) DEFAULT NULL,
  `competencia_id` int(11) DEFAULT NULL,
  `nota` enum('NE','1','2','3') COLLATE utf8_unicode_ci DEFAULT NULL,
  `actividades` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `califcompetencias`
--

INSERT INTO `califcompetencias` (`id`, `mes_id`, `dni_id`, `competencia_id`, `nota`, `actividades`) VALUES
(1, 4, 2, 1, '2', '4'),
(2, 4, 2, 2, '2', '4'),
(3, 4, 2, 5, '1', '4'),
(4, 4, 2, 6, 'NE', '8'),
(5, 4, 2, 7, '3', '8'),
(6, 4, 2, 8, 'NE', '8'),
(7, 4, 2, 9, '1', '4'),
(8, 4, 2, 10, 'NE', '8'),
(9, 4, 2, 11, '1', '4'),
(10, 4, 2, 12, '2', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `califtecnologias`
--

DROP TABLE IF EXISTS `califtecnologias`;
CREATE TABLE `califtecnologias` (
  `id` int(11) NOT NULL,
  `mes_id` int(11) DEFAULT NULL,
  `dni_id` int(11) DEFAULT NULL,
  `tecnologia_id` int(11) DEFAULT NULL,
  `nota` enum('1','2','3','4','5') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `califtecnologias`
--

INSERT INTO `califtecnologias` (`id`, `mes_id`, `dni_id`, `tecnologia_id`, `nota`) VALUES
(1, 4, 2, 1, '3'),
(2, 4, 2, 2, '1'),
(3, 4, 2, 3, '2'),
(4, 4, 2, 4, '5'),
(5, 4, 2, 5, '3'),
(6, 4, 2, 6, '1'),
(7, 4, 2, 7, '2'),
(8, 4, 2, 8, '3'),
(9, 4, 2, 9, '4'),
(10, 4, 2, 10, '3'),
(11, 4, 2, 11, '2'),
(12, 4, 2, 12, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

DROP TABLE IF EXISTS `competencias`;
CREATE TABLE `competencias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`id`, `nombre`) VALUES
(1, 'Auto Organización'),
(2, 'Capacidad de aprendizaje'),
(5, 'Capacidad de Análisis'),
(6, 'Energía (fuerza)'),
(7, 'Liderazgo'),
(8, 'Orientación de logro'),
(9, 'Planificación y organización'),
(10, 'Pro Actividad'),
(11, 'Tolerancia al Trabajo bajo presión'),
(12, 'Trabajo en equipo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

DROP TABLE IF EXISTS `meses`;
CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `mes` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE `profesionales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `nombre`, `apellido`, `dni`, `email`, `telefono`, `linkedin`) VALUES
(2, 'Oscar', 'Franco', 32777000, 'oscarfranco@mail.com', '3232323', 'oscarfranco'),
(3, 'Roxana', 'Dellamea', 31444466, 'roxd@mail.com', '121212', 'roxdellamea'),
(4, 'Valeria', 'Fralasco', 32457987, 'valefra@gmail.com', '362489095', 'no tiene'),
(5, 'Soledad', 'Barrios', 32235987, 'solebarrios@gmail.com', '362475941', 'soledadbarrios.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Proyecto1', 'Descripción del Proyecto1'),
(2, 'Proyecto2', 'Descripción del Proyecto2'),
(3, 'proy3', 'algo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

DROP TABLE IF EXISTS `puestos`;
CREATE TABLE `puestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requeridos`
--

DROP TABLE IF EXISTS `requeridos`;
CREATE TABLE `requeridos` (
  `id` int(11) NOT NULL,
  `puesto_id` int(11) DEFAULT NULL,
  `tecnologia_id` int(11) DEFAULT NULL,
  `proyecto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `requeridos`
--

INSERT INTO `requeridos` (`id`, `puesto_id`, `tecnologia_id`, `proyecto_id`) VALUES
(1, NULL, 1, NULL),
(2, NULL, 1, NULL),
(3, NULL, 1, 1),
(4, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologias`
--

DROP TABLE IF EXISTS `tecnologias`;
CREATE TABLE `tecnologias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tecnologias`
--

INSERT INTO `tecnologias` (`id`, `nombre`) VALUES
(1, 'Especificación de requerimientos'),
(2, 'Programación en .NET C#'),
(3, 'Programación en Java'),
(4, 'Programación en PHP'),
(5, 'Diagrama E/R'),
(6, 'Casos de Uso'),
(7, 'Casos de prueba'),
(8, 'Programación en Java para Android'),
(9, 'Lenguaje SQL avanzado'),
(10, 'Administración de Bases de Datos.'),
(11, 'Tuning de Bases de datos.'),
(12, 'Manejo de Redes y conectividad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `califcompetencias`
--
ALTER TABLE `califcompetencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_98DD37DFB4F0564A` (`mes_id`),
  ADD KEY `IDX_98DD37DFDB8B8168` (`dni_id`),
  ADD KEY `IDX_98DD37DF9980C34D` (`competencia_id`);

--
-- Indices de la tabla `califtecnologias`
--
ALTER TABLE `califtecnologias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7BDB5C18B4F0564A` (`mes_id`),
  ADD KEY `IDX_7BDB5C18DB8B8168` (`dni_id`),
  ADD KEY `IDX_7BDB5C1821F9EE65` (`tecnologia_id`);

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_845001EF7F8F253B` (`dni`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requeridos`
--
ALTER TABLE `requeridos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_20DA36675035E9DA` (`puesto_id`),
  ADD KEY `IDX_20DA366721F9EE65` (`tecnologia_id`),
  ADD KEY `IDX_20DA3667F625D1BA` (`proyecto_id`);

--
-- Indices de la tabla `tecnologias`
--
ALTER TABLE `tecnologias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `califcompetencias`
--
ALTER TABLE `califcompetencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `califtecnologias`
--
ALTER TABLE `califtecnologias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `requeridos`
--
ALTER TABLE `requeridos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tecnologias`
--
ALTER TABLE `tecnologias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `califcompetencias`
--
ALTER TABLE `califcompetencias`
  ADD CONSTRAINT `FK_98DD37DF9980C34D` FOREIGN KEY (`competencia_id`) REFERENCES `competencias` (`id`),
  ADD CONSTRAINT `FK_98DD37DFB4F0564A` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`),
  ADD CONSTRAINT `FK_98DD37DFDB8B8168` FOREIGN KEY (`dni_id`) REFERENCES `profesionales` (`id`);

--
-- Filtros para la tabla `califtecnologias`
--
ALTER TABLE `califtecnologias`
  ADD CONSTRAINT `FK_7BDB5C1821F9EE65` FOREIGN KEY (`tecnologia_id`) REFERENCES `tecnologias` (`id`),
  ADD CONSTRAINT `FK_7BDB5C18B4F0564A` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`),
  ADD CONSTRAINT `FK_7BDB5C18DB8B8168` FOREIGN KEY (`dni_id`) REFERENCES `profesionales` (`id`);

--
-- Filtros para la tabla `requeridos`
--
ALTER TABLE `requeridos`
  ADD CONSTRAINT `FK_20DA366721F9EE65` FOREIGN KEY (`tecnologia_id`) REFERENCES `tecnologias` (`id`),
  ADD CONSTRAINT `FK_20DA36675035E9DA` FOREIGN KEY (`puesto_id`) REFERENCES `puestos` (`id`),
  ADD CONSTRAINT `FK_20DA3667F625D1BA` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
