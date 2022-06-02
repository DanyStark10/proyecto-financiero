-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-06-2022 a las 03:05:08
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_proyecto_financiero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id_egreso` int(11) NOT NULL,
  `id_tipo_egreso` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `monto` double NOT NULL,
  `fecha` date NOT NULL,
  `id_escuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id_egreso`, `id_tipo_egreso`, `descripcion`, `comentario`, `monto`, `fecha`, `id_escuela`) VALUES
(1, 2, 'aaaaaaa', NULL, 29000, '2022-04-27', 1),
(2, 3, 'aaa', 'nuevo egreso', 21000, '2022-04-27', 2),
(3, 4, 'aaa', '', 15000, '2022-04-27', 1),
(4, 5, 'aaa', '', 40000, '2022-04-27', 2),
(5, 6, 'aaa', '', 3000, '2022-04-27', 1),
(6, 7, 'aaa', '', 2000, '2022-04-27', 2),
(7, 1, 'bbbb', 'sin comentario', 60000, '2022-06-01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo_turno` varchar(15) NOT NULL,
  `zona` varchar(5) NOT NULL,
  `sector` varchar(5) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `cant_padres` int(11) NOT NULL,
  `cuota_padres` int(11) NOT NULL,
  `cant_alumnos` int(11) NOT NULL,
  `cant_grupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `nombre`, `clave`, `tipo_turno`, `zona`, `sector`, `domicilio`, `localidad`, `telefono`, `cant_padres`, `cuota_padres`, `cant_alumnos`, `cant_grupos`) VALUES
(1, 'Profr. Manuel Romero Camacho\r\n', '25DPR1821R', '1', '018', 'I', 'Infornavit Bachomo\r\n', 'Los Mochis, Sinaloa ', '6681449865', 150, 1000, 190, 6),
(2, 'Profr. Miguel Hidalgo ', '26DPR1822R', '2', '018', 'I', 'Infornavit Bachomo', 'Los Mochis Sin.', '6688296478', 180, 900, 200, 8),
(3, 'Jose María Morelos ', '27DPR1823R', '1', '018', 'I', 'Infornavit Bachomo', 'Los Mochis Sin.', '6688879564', 196, 900, 200, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` int(11) NOT NULL,
  `id_tipo_ingreso` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `monto` double NOT NULL,
  `fecha` date NOT NULL,
  `id_escuela` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingreso`, `id_tipo_ingreso`, `descripcion`, `comentario`, `monto`, `fecha`, `id_escuela`) VALUES
(1, 1, 'Se aportaron $1000 de A.P.F', 'Nuevo ingreso', 10000, '2022-04-27', 1),
(2, 1, 'Se aportaron $2000 de A.P.F', 'Nuevo ingreso', 60000, '2022-03-29', 1),
(3, 1, 'Se aportaron $2000 de A.P.F', 'Nuevo ingreso', 30000, '2022-03-31', 2),
(4, 2, 'Se aportaron $15000 por actividades realizadas', 'Nuevo ingreso', 15000, '2022-04-03', 1),
(5, 3, 'Se obtubieron beneficios de la tiendita escolar', 'Tiendita escolar', 35000, '2022-04-03', 1),
(6, 1, 'Se aportaron $2000 de A.P.F', 'Tiendita escolar', 4000, '2022-05-30', 2),
(7, 3, 'Sin comentario', 'Nuevo ingreso', 2, '2022-07-01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_egresos`
--

CREATE TABLE `tipo_egresos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_egresos`
--

INSERT INTO `tipo_egresos` (`id`, `descripcion`) VALUES
(1, 'Construcción de aulas y anexos escolares'),
(2, 'Reparación y mnetenimiento de edificios y anexos'),
(3, 'Adquisición de mobiliario y equipo'),
(4, 'Reparación y mantenimiento de mobiliario y equipo'),
(5, 'Papelería, artículos escolares y material deportivo'),
(6, 'Viajes por comisión'),
(7, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ingresos`
--

CREATE TABLE `tipo_ingresos` (
  `id_tipo_ingreso` int(11) NOT NULL,
  `descripcion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_ingresos`
--

INSERT INTO `tipo_ingresos` (`id_tipo_ingreso`, `descripcion`) VALUES
(1, 'Por aportaciones de A.P.F.'),
(2, 'Por actividades realizadas.'),
(3, 'Otros ingresos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_turno`
--

CREATE TABLE `tipo_turno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_turno`
--

INSERT INTO `tipo_turno` (`id`, `nombre`) VALUES
(1, 'MATUTINO'),
(2, 'VESPERTINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nombre`) VALUES
(1, 'ADMIN'),
(2, 'SECRETARIO'),
(3, 'CONTADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo_usuario` varchar(11) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `id_escuela` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `tipo_usuario`, `password`, `id_escuela`, `estado`) VALUES
(3, 'Daniel Silverio.', 'danielmessi485@gmail.com', '1', '22222', 1, 1),
(4, 'Mauricio R.', 'roblesbalderrama@gmail.com', '1', '12345', 2, 1),
(5, 'Zayas', 'zayas@gmail.com', '3', '99999', 1, 1),
(6, 'Daniel ', 'danielsilver10@outlook.com', '1', '12345', 1, 2),
(7, 'PRUEBA aaaa', 'prueba@gmail.com', '2', '12345', 2, 2),
(8, 'prueba1', 'prueba1@gmail.com', '1', '54321', 2, 2),
(9, 'prueba 3', 'prueba@gmail.com', '1', '09876', 2, 2),
(10, 'MOISES', 'danielmessi485@gmail.com', '1', '4444', 1, 2),
(11, 'MOISES', 'danielmessi485@gmail.com', '2', '99999', 2, 2),
(12, 'PRUEBA-FINAL', 'pruebafinal@gmail.com', '3', '33333', 1, 2),
(13, 'jose dolores', 'jese@hotmail.com', '3', '88888', 1, 2),
(14, 'aaaaaaa', 'aaaaaaa', '2', '33333', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id_egreso`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`);

--
-- Indices de la tabla `tipo_egresos`
--
ALTER TABLE `tipo_egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_ingresos`
--
ALTER TABLE `tipo_ingresos`
  ADD PRIMARY KEY (`id_tipo_ingreso`);

--
-- Indices de la tabla `tipo_turno`
--
ALTER TABLE `tipo_turno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id_egreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_egresos`
--
ALTER TABLE `tipo_egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_ingresos`
--
ALTER TABLE `tipo_ingresos`
  MODIFY `id_tipo_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_turno`
--
ALTER TABLE `tipo_turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
