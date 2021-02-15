-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-02-2021 a las 23:54:37
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CitasCETAC`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asunto`
--

CREATE TABLE `asunto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `asunto`
--

INSERT INTO `asunto` (`id`, `nombre`) VALUES
(1, 'Registro de alumno'),
(2, 'Baja definitiva'),
(3, 'Alta de estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int(11) NOT NULL,
  `asunto` int(11) NOT NULL,
  `persona` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `asunto`, `persona`, `hora`, `fecha`) VALUES
(1, 0, 0, '00:00:00', '2021-02-16'),
(2, 1, 1, '08:30:00', '0000-00-00'),
(3, 2, 0, '08:00:00', '2021-02-15'),
(4, 1, 0, '10:00:00', '2021-02-16'),
(5, 2, 4, '08:30:00', '2021-02-16'),
(6, 2, 4, '08:30:00', '2021-02-16'),
(7, 2, 6, '09:00:00', '2021-02-16'),
(8, 1, 7, '12:00:00', '2021-02-16'),
(9, 1, 8, '16:00:00', '2021-02-18'),
(10, 1, 8, '08:30:00', '2021-02-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` text COLLATE utf32_bin NOT NULL,
  `apellidoParterno` varchar(30) COLLATE utf32_bin NOT NULL,
  `apellidoMaterno` varchar(30) COLLATE utf32_bin NOT NULL,
  `pais` varchar(20) COLLATE utf32_bin NOT NULL,
  `nacionalidad` varchar(20) COLLATE utf32_bin NOT NULL,
  `nacimiento` date NOT NULL,
  `lugarNacimiento` varchar(40) COLLATE utf32_bin NOT NULL,
  `domicilio` text COLLATE utf32_bin NOT NULL,
  `correo` varchar(30) COLLATE utf32_bin NOT NULL,
  `otroCorreo` varchar(30) COLLATE utf32_bin NOT NULL,
  `telefono` varchar(10) COLLATE utf32_bin NOT NULL,
  `celular` varchar(10) COLLATE utf32_bin NOT NULL,
  `oficina` varchar(10) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellidoParterno`, `apellidoMaterno`, `pais`, `nacionalidad`, `nacimiento`, `lugarNacimiento`, `domicilio`, `correo`, `otroCorreo`, `telefono`, `celular`, `oficina`) VALUES
(1, 'HÃ©ctor Rahampery', 'HENANDEZ', 'Contreras', 'MEXICO', 'MEXICANA', '2021-02-11', 'GUADALAJARA', 'PASEO DE LOS NISPEROS 1753 TABACHINES ZAPOPAN C.P.45188 Jalisco', 'rahamperycompras@gmail.com', 'rahamperycompras@gmail.com', '3314496751', '3314496751', '3314496751'),
(2, 'RAMON MAIKY', 'HERNANDEZ', 'CONTRERAS', 'MEXICO', 'MEXICANA', '2021-02-01', 'GUADALAJARA', 'PASEO DE LOS NISPEROS 1753 TABACHINES ZAPOPAN C.P.45188 JALISCO', 'maiky@gmail.com', 'maiky@gmail.com', '3336602184', '33198765', '117281912'),
(3, 'RAMON MAIKY', 'HERNANDEZ', 'CONTRERAS', 'MEXICO', 'MEXICANA', '2021-02-09', 'GUADALAJARA', 'PASEO DE LOS NISPEROS 1753 TABACHINES ZAPOPAN C.P.45188 JALISCO', 'maiky@gmail.com', 'maiky@gmail.com', '3314496751', '3314496751', '3314496751'),
(4, 'LAURA CRISTINA', 'ULLOA', 'ESQUIVIAS', 'MEXICO', 'MAXICANA', '1999-07-26', 'GUADALAJARA', 'PASEO DE LOS NISPEROS 1753 TABACHINES ZAPOPAN C.P.45188 JALISCO', 'laura@gmail.com', 'laura@hotmail.com', '33144578', '33123643', '22334466'),
(6, 'LAURA CRISTINA', 'ULLOA', 'ESQUIVIAS', 'MEXICO', 'MEXICANA', '2021-02-04', 'GUADALAJARA', 'PASEO DE LOS NISPEROS 1753 TABACHINES ZAPOPAN C.P.45188 Jalisco', 'rahamperycompras@gmail.com', 'rahamperycompras@gmail.com', '3314496751', '3314496751', '3314496751'),
(7, 'Contreras', 'HÃ©ctor Rahampery', 'Hernandez', 'MÃ©xico', 'Mexicana', '1996-03-05', 'Guadalajara', 'paseo de los nisperos 1753 tabachines zapopan C.P.45188 jalisco', 'rahampery@gmail.com', '', '3336602184', '3314496751', ''),
(8, 'ramon', 'hernandez', 'quiÃ±ones', 'mÃ©xico', 'mexicana', '1963-10-10', 'guadalajara', 'paseo de los nisperos 1753 tabachines zapopan C.P.45188 jalisco', 'ramon@gmail.com', '', '3314496751', '3336602184', '3316202257');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf32_bin NOT NULL,
  `correo` varchar(35) COLLATE utf32_bin NOT NULL,
  `passw` varchar(15) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `passw`) VALUES
(1, 'Administrador', 'administrador@cetac.com', '4dm1n1str4d0r');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asunto`
--
ALTER TABLE `asunto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
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
-- AUTO_INCREMENT de la tabla `asunto`
--
ALTER TABLE `asunto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
