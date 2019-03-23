-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2019 at 01:24 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ProyCalidad`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administradores`
--

CREATE TABLE `Administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Empleados`
--

CREATE TABLE `Empleados` (
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

-- --------------------------------------------------------

--
-- Table structure for table `HistorialEntradas`
--

CREATE TABLE `HistorialEntradas` (
  `id_entrada` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `hora_entrada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HistorialEstatus`
--

CREATE TABLE `HistorialEstatus` (
  `id_cambio` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estatus_anterior` int(11) NOT NULL,
  `estatus_actual` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_efectivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HistorialPagos`
--

CREATE TABLE `HistorialPagos` (
  `id_pago` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cantidad` double(12,2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HistorialSalidas`
--

CREATE TABLE `HistorialSalidas` (
  `id_salida` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `hora_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HorasTrabajadas`
--

CREATE TABLE `HorasTrabajadas` (
  `id_hora` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cantidad_horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `HistorialPagos`
--
ALTER TABLE `HistorialPagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `HorasTrabajadas`
--
ALTER TABLE `HorasTrabajadas`
  ADD PRIMARY KEY (`id_hora`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Empleados`
--
ALTER TABLE `Empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `HistorialPagos`
--
ALTER TABLE `HistorialPagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `HorasTrabajadas`
--
ALTER TABLE `HorasTrabajadas`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT;
