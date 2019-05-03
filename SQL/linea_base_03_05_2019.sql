-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2019 a las 10:18:27
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proycalidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `estatus` int(11) NOT NULL,
  `pago_por_dia` double(12,2) NOT NULL,
  `dias_trabajo` varchar(100) NOT NULL,
  `descuento_por_hora` double(12,2) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `usuario`, `contra`, `nombres`, `apellidos`, `hora_entrada`, `hora_salida`, `estatus`, `pago_por_dia`, `dias_trabajo`, `descuento_por_hora`, `fecha_creacion`, `fecha_inicio`) VALUES
(1, 'asd', '123', 'asd', 'asd', '19:01:00', '12:03:00', 1, 123.00, '123', 123.00, '2019-03-27 05:29:58', '0222-02-22 14:02:00'),
(4, 'asd3', '1234', 'asd', 'asd', '19:01:00', '12:03:00', 1, 123.00, '123', 123.00, '2019-03-27 05:34:48', '0222-02-22 14:02:00'),
(5, 'asd34', '123', 'asd', 'asd', '19:01:00', '12:03:00', 1, 123.00, '123', 123.00, '2019-03-27 05:35:31', '0222-02-22 14:02:00'),
(6, 'Moyses55', '0', 'Moises', 'Barabachano', '14:22:00', '14:22:00', 2, 2000.00, 'Lunes,Martes', 20.00, '2019-05-03 07:47:33', '2018-02-22 02:19:00'),
(7, 'nnn', '0', 'nnn', 'nnn', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 07:48:14', '2222-02-22 14:22:00'),
(8, 'oo', '0', 'o', 'o', '21:09:00', '21:09:00', 2, 2.00, 'lunes', 2.00, '2019-05-03 07:50:03', '2222-02-22 14:22:00'),
(9, 'ccc', '0', 'ccc', 'cc', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 07:51:01', '2222-02-22 14:02:00'),
(10, 'opop', '$1$uE5pnYKu$fmeo3Sl61ub6CsD4PR8nt.', 'op', 'op', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 08:02:16', '2222-02-22 14:22:00'),
(11, 'opopopo', '$1$IzqIBNWy$njbrA1Ws9sl63yqaXdXXO.', 'mmmm', 'mmm', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 08:02:36', '2222-02-22 14:22:00'),
(12, 'ULUS10045', '$1$A.S4F7Of$mY1.dG9eVy084xSBf41141', 'ULUS', 'ULUS', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 08:10:35', '2222-02-22 14:22:00'),
(13, 'moy', '$2a$07$usesomesillystringfore8Ebr5I.f83iDVmjhS3p1NPzn.gQhw5y', 'moy', 'moy', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 08:13:03', '2222-02-22 14:22:00'),
(14, 'zxc', 'jsNUozXMt/yNU', 'zxc', 'zxc', '14:22:00', '14:22:00', 2, 2.00, '2', 2.00, '2019-05-03 08:22:46', '2222-02-22 14:22:00'),
(15, 'Ba7201', 'jsHr7GEAom6zk', 'Moisés Oswaldo', 'Barbachano Chiu', '14:22:00', '21:09:00', 2, 22.00, 'Lunes,Martes', 90.00, '2019-05-03 09:26:40', '2222-02-22 20:19:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialentradas`
--

CREATE TABLE `historialentradas` (
  `hora_entrada` datetime NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historialentradas`
--

INSERT INTO `historialentradas` (`hora_entrada`, `id_entrada`, `id_empleado`) VALUES
('2019-05-03 06:48:42', 1, 4),
('2019-05-03 06:48:45', 2, 4),
('2019-05-03 06:53:24', 3, 4),
('2019-05-03 06:53:53', 4, 4),
('2019-05-03 06:54:06', 5, 4),
('2019-05-03 06:54:15', 6, 4),
('2019-05-03 07:00:17', 7, 4),
('2019-05-03 07:00:21', 8, 4),
('2019-05-03 07:03:25', 9, 4),
('2019-05-03 07:04:07', 10, 4),
('2019-05-03 07:04:10', 11, 4),
('2019-05-03 07:04:18', 12, 4),
('2019-05-03 07:04:29', 13, 4),
('2019-05-03 07:04:41', 14, 4),
('2019-05-03 07:04:52', 15, 4),
('2019-05-03 07:04:55', 16, 4),
('2019-05-03 07:05:05', 17, 4),
('2019-05-03 07:06:21', 18, 4),
('2019-05-03 07:06:25', 19, 4),
('2019-05-03 07:07:19', 20, 4),
('2019-05-03 07:07:23', 21, 1),
('2019-05-03 07:10:35', 22, 4),
('2019-05-03 07:11:41', 23, 4),
('2019-05-03 07:11:54', 24, 1),
('2019-05-03 07:12:19', 25, 1),
('2019-05-03 07:17:37', 26, 4),
('2019-05-03 07:20:02', 27, 4),
('2019-05-03 07:21:25', 28, 4),
('2019-05-03 07:22:03', 29, 4),
('2019-05-03 07:22:07', 30, 4),
('2019-05-03 07:22:20', 31, 4),
('2019-05-03 07:22:30', 32, 4),
('2019-05-03 08:30:14', 33, 14),
('2019-05-03 08:30:20', 34, 14),
('2019-05-03 08:30:47', 35, 14),
('2019-05-03 08:31:30', 36, 14),
('2019-05-03 09:39:22', 38, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialestatus`
--

CREATE TABLE `historialestatus` (
  `id_cambio` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estatus_anterior` int(11) NOT NULL,
  `estatus_actual` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_efectivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialpagos`
--

CREATE TABLE `historialpagos` (
  `id_pago` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cantidad` double(12,2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialsalidas`
--

CREATE TABLE `historialsalidas` (
  `id_salida` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `hora_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historialsalidas`
--

INSERT INTO `historialsalidas` (`id_salida`, `id_empleado`, `hora_salida`) VALUES
(1, 14, '2019-05-03 08:34:14'),
(2, 14, '2019-05-03 08:34:22'),
(3, 14, '2019-05-03 08:34:44'),
(4, 14, '2019-05-03 09:02:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horastrabajadas`
--

CREATE TABLE `horastrabajadas` (
  `id_hora` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cantidad_horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `historialentradas`
--
ALTER TABLE `historialentradas`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `historialpagos`
--
ALTER TABLE `historialpagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `historialsalidas`
--
ALTER TABLE `historialsalidas`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indices de la tabla `horastrabajadas`
--
ALTER TABLE `horastrabajadas`
  ADD PRIMARY KEY (`id_hora`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `historialentradas`
--
ALTER TABLE `historialentradas`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `historialpagos`
--
ALTER TABLE `historialpagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialsalidas`
--
ALTER TABLE `historialsalidas`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horastrabajadas`
--
ALTER TABLE `horastrabajadas`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
