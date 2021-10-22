-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: custsql-ipw14.eigbox.net
-- Tiempo de generación: 22-10-2021 a las 13:32:46
-- Versión del servidor: 5.6.50-90.0-log
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fusepong`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `registro_usuario` int(10) NOT NULL,
  `correo_usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `identificacion_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `estado_usuario` int(2) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `seudonimo_usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `clave_usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `nacimiento_usuario` date NOT NULL,
  `creacion_usuario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`registro_usuario`, `correo_usuario`, `nombre_usuario`, `identificacion_usuario`, `estado_usuario`, `tipo_usuario`, `seudonimo_usuario`, `clave_usuario`, `nacimiento_usuario`) VALUES
(1, 'rodrigo@zarate.com.co', 'Rodrigo ZÃ¡rate Algecira', '79717954', 0, 5, 'rodrigo', '126a0db062b1029bb90ea82a73af9038', '1974-12-03');

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`registro_usuario`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
