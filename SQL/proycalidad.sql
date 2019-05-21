-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2019 at 12:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proycalidad`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
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
-- Table structure for table `empleados`
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
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `usuario`, `contra`, `nombres`, `apellidos`, `hora_entrada`, `hora_salida`, `estatus`, `pago_por_dia`, `dias_trabajo`, `descuento_por_hora`, `fecha_creacion`, `fecha_inicio`) VALUES
(1, 'asd', 'js/V.pZCjkSkE', 'asd', 'asd', '16:50:00', '16:50:00', 1, 123.00, 'Lunes,Martes', 123.00, '2019-03-27 05:29:58', '0222-02-22 14:02:00'),
(4, 'asd3', 'js/V.pZCjkSkE', 'nombre', 'asd', '16:50:00', '16:50:00', 1, 123.00, '', 123.00, '2019-03-27 05:34:48', '0222-02-22 14:02:00'),
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
(15, 'Ba7201', 'jsHr7GEAom6zk', 'Moisés Oswaldo', 'Barbachano Chiu', '14:22:00', '21:09:00', 1, 32.00, 'Lunes,Martes,Miercoles,Jueves', 90.00, '2019-05-03 09:26:40', '2222-02-22 20:19:00'),
(16, 'Ba54682', 'js65DiwDjQUuo', 'Carlos Oswaldo', 'Barbachano Granados', '00:24:00', '23:50:00', 2, 2200.00, 'Lunes,Martes,Miercoles', 100.00, '2019-05-06 06:52:13', '1999-09-22 23:40:00'),
(17, 'Fe84189', 'jsnUouCdOv4jI', 'Patricia Armanda', 'Federica Julian', '01:30:00', '21:00:00', 1, 3200.00, 'lunes', 100.00, '2019-05-06 06:53:14', '2019-02-20 22:02:00'),
(18, 'mx97385', 'jsPLPA1IztmV.', 'asd', 'mxn', '02:03:00', '03:00:00', 3, 20.00, 'lunes', 20.00, '2019-05-06 06:53:46', '2001-02-20 21:01:00'),
(19, 'Mo72636', 'jsCk7KwGew2IA', 'Juan Carlos', 'Moguel Solís', '09:30:00', '18:30:00', 1, 150.00, 'lunes', 20.00, '2019-05-06 18:42:26', '2019-05-06 09:30:00'),
(20, 'mk88997', 'jsKxnxOgcJT1k', 'mk', 'mkm', '14:09:00', '14:08:00', 3, 123.00, '123', 123.00, '2019-05-06 19:10:46', '0038-02-08 20:02:00'),
(21, 'oi36987', 'jsLWuX3lZkZGQ', 'io', 'oioi', '02:00:00', '01:00:00', 4, 23.00, 'Viernes', 5.00, '2019-05-06 19:18:23', '2021-02-01 03:01:00'),
(22, 'jk68322', 'jsBF3jIUObP7w', 'kjk', 'jkjk', '01:00:00', '01:00:00', 3, 4.00, 'Sabado', 4.00, '2019-05-06 19:22:36', '2019-01-05 01:00:00'),
(23, 'k1146', 'js0UQSPm4Q/Ho', 'ak', 'k', '01:00:00', '01:00:00', 4, 2.00, 'Domingo', 1.00, '2019-05-06 19:23:48', '2019-01-02 01:00:00'),
(24, 'l13655', 'jsHruE/gZEqyw', 'k', 'l', '19:23:00', '08:00:00', 1, 78.00, 'Sabado', 8.00, '2019-05-06 19:25:56', '2019-02-01 01:00:00'),
(25, 'ka47412', 'jsVfTXOJieOJ6', 'kaskd', 'kasd', '02:00:00', '01:00:00', 1, 1.00, ',Jueves,Sabado,Domingo', 1.00, '2019-05-06 19:35:27', '2019-01-03 01:01:00'),
(26, 'o39325', 'jsceQzYn2fW9c', 'ooo', 'o', '01:00:00', '01:00:00', 1, 1.00, 'Miercoles,Viernes,Sabado,Domingo', 1.00, '2019-05-06 19:38:29', '2020-01-02 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `historialcumplidos`
--

CREATE TABLE `historialcumplidos` (
  `id_cumplido` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_dia` date NOT NULL,
  `id_entrada` int(11) DEFAULT NULL,
  `id_salida` int(11) DEFAULT NULL,
  `flag_registrado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historialcumplidos`
--

INSERT INTO `historialcumplidos` (`id_cumplido`, `id_empleado`, `fecha_dia`, `id_entrada`, `id_salida`, `flag_registrado`) VALUES
(1, 18, '2019-05-08', 1, 5, 1),
(2, 18, '2019-05-09', 1, 5, 1),
(3, 18, '2019-05-10', 1, 5, 1),
(4, 18, '2019-05-11', 1, 5, 1),
(5, 18, '2019-05-12', 1, 5, 1),
(6, 18, '2019-05-13', 1, 5, 1),
(7, 1, '2019-05-21', 3, 6, 1),
(8, 4, '2019-05-21', 4, 7, 1),
(9, 1, '2019-05-21', 3, 6, 1),
(10, 4, '2019-05-21', 4, 7, 1),
(11, 21, '2019-05-21', NULL, NULL, 1),
(12, 23, '2019-05-21', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `historialentradas`
--

CREATE TABLE `historialentradas` (
  `hora_entrada` datetime NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historialentradas`
--

INSERT INTO `historialentradas` (`hora_entrada`, `id_entrada`, `id_empleado`) VALUES
('2019-05-08 01:03:01', 1, 18),
('2019-05-08 01:15:48', 2, 17),
('2019-05-21 16:47:14', 3, 1),
('2019-05-21 16:47:24', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `historialestatus`
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
-- Table structure for table `historialexcepciones`
--

CREATE TABLE `historialexcepciones` (
  `id_excepcion` int(11) NOT NULL,
  `fecha_dia` date NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_entrada` int(11) DEFAULT NULL,
  `id_salida` int(11) DEFAULT NULL,
  `flag_registrado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historialexcepciones`
--

INSERT INTO `historialexcepciones` (`id_excepcion`, `fecha_dia`, `id_empleado`, `id_entrada`, `id_salida`, `flag_registrado`) VALUES
(1, '2019-05-08', 17, 2, NULL, 1),
(2, '2019-05-09', 17, 2, NULL, 1),
(3, '2019-05-10', 17, 2, NULL, 1),
(4, '2019-05-11', 17, 2, NULL, 1),
(5, '2019-05-12', 17, 2, NULL, 1),
(6, '2019-05-13', 17, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `historialpagos`
--

CREATE TABLE `historialpagos` (
  `id_pago` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cantidad` double(12,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historialpagos`
--

INSERT INTO `historialpagos` (`id_pago`, `id_empleado`, `cantidad`, `fecha`) VALUES
(1, 1, 100.00, '2019-05-06'),
(5, 17, 7200.00, '2019-05-14'),
(6, 18, 280.00, '2019-05-14'),
(7, 1, 0.00, '2019-05-21'),
(8, 4, 0.00, '2019-05-21'),
(9, 21, 23.00, '2019-05-21'),
(10, 23, 0.00, '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `historialsalidas`
--

CREATE TABLE `historialsalidas` (
  `id_salida` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `hora_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historialsalidas`
--

INSERT INTO `historialsalidas` (`id_salida`, `id_empleado`, `hora_salida`) VALUES
(1, 14, '2019-05-03 08:34:14'),
(2, 14, '2019-05-03 08:34:22'),
(3, 14, '2019-05-03 08:34:44'),
(4, 14, '2019-05-03 09:02:30'),
(5, 18, '2019-05-08 19:01:18'),
(6, 1, '2019-05-21 16:48:12'),
(7, 4, '2019-05-21 16:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `historialvacaciones`
--

CREATE TABLE `historialvacaciones` (
  `id_vacacion` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historialvacaciones`
--

INSERT INTO `historialvacaciones` (`id_vacacion`, `id_empleado`, `fecha_inicio`, `fecha_termino`, `fecha_registro`) VALUES
(1, 1, '2019-05-02', '2019-05-09', '2019-05-08'),
(2, 4, '2019-05-01', '2019-05-15', '2019-05-08'),
(6, 5, '2019-05-01', '2019-05-03', '2019-05-08'),
(7, 5, '2019-05-02', '2019-05-01', '2019-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `horastrabajadas`
--

CREATE TABLE `horastrabajadas` (
  `id_hora` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cantidad_horas` int(11) NOT NULL,
  `dia_registro` date NOT NULL,
  `flag_pagado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horastrabajadas`
--

INSERT INTO `horastrabajadas` (`id_hora`, `id_empleado`, `cantidad_horas`, `dia_registro`, `flag_pagado`) VALUES
(7, 18, 1, '2019-05-14', 1),
(8, 18, 1, '2019-05-14', 1),
(9, 18, 1, '2019-05-14', 1),
(10, 18, 1, '2019-05-14', 1),
(11, 18, 1, '2019-05-14', 1),
(12, 18, 1, '2019-05-14', 1),
(13, 18, 1, '2019-05-14', 1),
(14, 18, 1, '2019-05-14', 1),
(15, 18, 1, '2019-05-14', 1),
(16, 18, 1, '2019-05-14', 1),
(17, 18, 1, '2019-05-14', 1),
(18, 18, 1, '2019-05-14', 1),
(19, 18, 1, '2019-05-14', 1),
(20, 18, 1, '2019-05-14', 1),
(21, 18, 1, '2019-05-14', 1),
(22, 17, 3, '2019-05-14', 1),
(23, 17, 6, '2019-05-14', 1),
(24, 17, 6, '2019-05-14', 1),
(25, 17, 11, '2019-05-14', 1),
(26, 17, 19, '2019-05-14', 1),
(27, 17, 3, '2019-05-14', 1),
(28, 1, 0, '2019-05-21', 1),
(29, 4, 0, '2019-05-21', 1),
(30, 1, 0, '2019-05-21', 1),
(31, 4, 0, '2019-05-21', 1),
(32, 21, 1, '2019-05-21', 1),
(33, 23, 0, '2019-05-21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `historialcumplidos`
--
ALTER TABLE `historialcumplidos`
  ADD PRIMARY KEY (`id_cumplido`);

--
-- Indexes for table `historialentradas`
--
ALTER TABLE `historialentradas`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indexes for table `historialexcepciones`
--
ALTER TABLE `historialexcepciones`
  ADD PRIMARY KEY (`id_excepcion`);

--
-- Indexes for table `historialpagos`
--
ALTER TABLE `historialpagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `historialsalidas`
--
ALTER TABLE `historialsalidas`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indexes for table `historialvacaciones`
--
ALTER TABLE `historialvacaciones`
  ADD PRIMARY KEY (`id_vacacion`);

--
-- Indexes for table `horastrabajadas`
--
ALTER TABLE `horastrabajadas`
  ADD PRIMARY KEY (`id_hora`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `historialcumplidos`
--
ALTER TABLE `historialcumplidos`
  MODIFY `id_cumplido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `historialentradas`
--
ALTER TABLE `historialentradas`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `historialexcepciones`
--
ALTER TABLE `historialexcepciones`
  MODIFY `id_excepcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `historialpagos`
--
ALTER TABLE `historialpagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `historialsalidas`
--
ALTER TABLE `historialsalidas`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `historialvacaciones`
--
ALTER TABLE `historialvacaciones`
  MODIFY `id_vacacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `horastrabajadas`
--
ALTER TABLE `horastrabajadas`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
