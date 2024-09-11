-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2024 a las 04:09:57
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
-- Base de datos: `labogen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `tipoagenda_id` int(11) NOT NULL,
  `agenda_descripcion` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `tipoagenda_id`, `agenda_descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(2, 1, 'prueba', '2024-09-10', '2024-09-10'),
(4, 2, 'prueba', '2024-09-10', '2024-09-14'),
(5, 9, 'otra prueba', '2024-09-12', '2024-09-14'),
(6, 3, 'otra prueba de las pruebas', '2024-09-10', '2024-09-15'),
(7, 2, 'prueba', '2024-09-11', '2024-09-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoagenda`
--

CREATE TABLE `tipoagenda` (
  `tipoagenda_id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoagenda`
--

INSERT INTO `tipoagenda` (`tipoagenda_id`, `descripcion`) VALUES
(1, 'reunion'),
(2, 'tarea'),
(3, 'evento');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indices de la tabla `tipoagenda`
--
ALTER TABLE `tipoagenda`
  ADD PRIMARY KEY (`tipoagenda_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipoagenda`
--
ALTER TABLE `tipoagenda`
  MODIFY `tipoagenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
