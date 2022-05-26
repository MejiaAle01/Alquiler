-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2022 a las 04:21:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `alquiler`
--
CREATE DATABASE IF NOT EXISTS `alquiler` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `alquiler`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `ID` int(11) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Fullname` varchar(60) NOT NULL,
  `CantCar` int(11) NOT NULL,
  `Tel` int(11) NOT NULL,
  `TipoCar` varchar(15) NOT NULL,
  `Residencia` varchar(100) NOT NULL,
  `Fecha_ret` date NOT NULL,
  `Fecha_dev` date NOT NULL,
  `MOT_ID` int(11) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Disponibilidad` varchar(10) NOT NULL,
  `Total_pago` decimal(6,2) NOT NULL COMMENT 'En $'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motoristas`
--

CREATE TABLE `motoristas` (
  `ID_MOT` int(11) NOT NULL,
  `Nombre_mot` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ID` int(11) NOT NULL,
  `Proveedor` varchar(50) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `CantCar` int(11) NOT NULL,
  `Año` int(11) NOT NULL,
  `Placas` varchar(20) NOT NULL,
  `Poliza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `ID_Card` int(11) NOT NULL,
  `Num_card` int(11) NOT NULL,
  `Titular` varchar(40) NOT NULL,
  `Fecha_ven` varchar(7) NOT NULL,
  `Cod_seg` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Correo` varchar(30) NOT NULL,
  `T_user` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FK_Motoristas_Alquiler` (`MOT_ID`) USING BTREE;

--
-- Indices de la tabla `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`ID_MOT`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`ID_Card`),
  ADD UNIQUE KEY `Cod_seg` (`Cod_seg`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Contraseña` (`Contraseña`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `ID_MOT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `ID_Card` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `motoristas`
--
ALTER TABLE `motoristas`
  ADD CONSTRAINT `FK_Motoristas_Alquiler` FOREIGN KEY (`ID_MOT`) REFERENCES `alquiler` (`MOT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Apellido`, `Usuario`, `Contraseña`, `Correo`, `T_user`) VALUES
(1, 'Alejandro', 'Mejia', 'JAMejia', '$2y$10$tFZS8AWDj9lGjh0/h8DNoeHR.L2KmQgVP37KH6qBFF.crGUq7jXeS', 'jAmejia@hotmail.com', 'Administrador'),
(14, 'Jose Alejandro', 'Mejia Ceron', 'JAMC01', '$2y$10$nt6TOFjUoSA.lVV3N9Ez5OKPM4Jt64pISeJkubmiBiXjvLL9zY8Ry', 'jamc00@hotmail.com', 'Usuario'),
(16, 'Sarai', 'Hernandez', 'stefy.h09', '$2y$10$ZWvh.eQ0ZzkFNTxxVoZo0OBRjsg4YsQZ78cepsBAdiChnqkReRfHK', 'sarai@gmail.com', 'Empleado'),
(17, 'Stefany', 'Aguilar', 'sarai', '$2y$10$zusQBo/clLcgm4Etj3al7eB4ko1cAURX3LMCyfxVRsDQthnes9Ufu', 'sarai@hotmail.com', 'Usuario');
