-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2022 a las 04:10:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dir`
--
CREATE DATABASE IF NOT EXISTS `dir` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `dir`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `idContacto` int(11) NOT NULL,
  `nombreContacto` varchar(100) NOT NULL,
  `direccionContacto` varchar(100) NOT NULL,
  `telefonoContacto` varchar(20) NOT NULL,
  `ciudadContacto` varchar(100) NOT NULL,
  `paisContacto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`idContacto`, `nombreContacto`, `direccionContacto`, `telefonoContacto`, `ciudadContacto`, `paisContacto`) VALUES
(20222333, 'Pablo Marmol', 'Av. Montañas 115', '3792586947', 'Bogota', 'Colombia'),
(25648910, 'Linda Palma', 'Autop. Palmas 522', '3802586000', 'Cali', 'Colombia'),
(45645645, 'Cristiano Ronald', 'Av. Lima 777', '2542899155', 'Ginebra', 'Suiza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'administrador', '12345'),
(2, 'auxiliar', '123');
