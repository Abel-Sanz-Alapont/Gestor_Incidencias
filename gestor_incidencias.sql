-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 07-05-2026 a las 12:31:05
-- Versión del servidor: 9.6.0
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_incidencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('abierta','en_proceso','resuelta','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'abierta',
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `titulo`, `descripcion`, `estado`, `id_cliente`) VALUES
(9, 'Error en Impresora', 'No funciona la cola de impresión', 'abierta', 4),
(10, 'Problemas en la Red', 'Va lento el internet', 'en_proceso', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('cliente','administrador') NOT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `numero_empleado` varchar(50) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `departamento`, `telefono`, `numero_empleado`, `especialidad`) VALUES
(1, 'Abel', 'absaal@alumnatflorida.es', '$2y$10$a6MPCfoEoV209Rn4l2PjE.39VoHnEC78XbTXR.pNintAPevejH3.e', 'administrador', 'Informatico', '627847558', NULL, NULL),
(2, 'Jose', 'jose@hotmail', '$2y$10$y4iA7nf6m4oNHQm4qyZVnuDwApx888DkbUJTakJqPAu4pvPR3xmfO', 'cliente', 'Marketing', '95847582', NULL, NULL),
(3, 'Lorena', 'lorena@gmail.com', '$2y$10$3Mx.glPpbNzDiz14lCoQoOhj.BnedvAy5yxWHTKI92oA67Z2E1aC.', 'cliente', 'Limpieza', '678253523', NULL, NULL),
(4, 'marc', 'marc@gmail.com', '$2y$10$xPSsJI6BrVtfWFnu6Wc47.pV6A/IQZ.UJUyS3yZGLqqYYcRISVUVO', 'cliente', 'Finanzas', '9982819', NULL, NULL),
(5, 'Salva Alapont Parra', 'S@gmail.com', '$2y$10$qvnB1EuBPMdBiaVD7Lgk3.g3vJUEucLACy3EUSZo09E/21gXjj.cW', 'cliente', '', '', NULL, NULL),
(6, 'Vicente', 'V@gmail.com', '$2y$10$JOAZTKtMqrKdWnepU6RCnuQVEAhhkCZ0yTy8vUTHFhV58UbMYc5fO', 'administrador', NULL, NULL, '2', 'Programador Web'),
(7, 'Coca Cola', 'coca@gmail.com', '$2y$10$kKO75ko60CJ/0qJaXb7vSeQYYCY7GLx8vipXIQPEGBLabKOj/VFPe', 'cliente', 'Publicidad', '9999999', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numero_empleado` (`numero_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
