
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2017 a las 21:15:42
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u499828989_agend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

CREATE TABLE IF NOT EXISTS `Administrador` (
  `Id_Administrador` int(10) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Administrador`
--

INSERT INTO `Administrador` (`Id_Administrador`, `Nombre`, `Password`) VALUES
(1, 'Juan', 'breaking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Contacto`
--

CREATE TABLE IF NOT EXISTS `Contacto` (
  `Id_relacion` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(10) NOT NULL,
  `Contacto` int(10) NOT NULL,
  PRIMARY KEY (`Id_relacion`),
  KEY `Id_Usuario` (`Id_Usuario`,`Contacto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Contacto`
--

INSERT INTO `Contacto` (`Id_relacion`, `Id_Usuario`, `Contacto`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Id_Usuario`, `Nombre`, `Password`, `Telefono`, `Correo`, `Direccion`) VALUES
(2, 'Mercedes ', '4d186321c1a7f0f354b297e8914ab240', 222748364, 'merce_94@gmail.com', 'C. 36 Norte 208A Col. Santa Barbara Norte Puebla, Pue.'),
(1, 'Juan Manuel ', 'break', 214748364, 'jmm5dp@gmail.com', 'C. 36 Norte 208A Col. Santa Barbara Norte Puebla');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
