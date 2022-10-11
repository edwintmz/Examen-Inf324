-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2022 a las 23:32:05
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `academico_edwintmz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `ci` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `ci` (`ci`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `nombre`, `ci`, `rol`, `usuario`, `password`) VALUES
(1, 'Edwin', '101010', 'estudiante', 'edwintmz', '123456'),
(2, 'Veronica', '101024', 'docente', 'veronicasc', '12345'),
(3, 'Selena', '102025', 'director', 'selenagc', '123456'),
(4, 'Roberto', '124578', 'estudiante', 'robertord', '12345'),
(5, 'Miriam', '235689', 'estudiante', 'miriamla', '123456'),
(6, 'Pedro', '142536', 'estudiante', 'pedro10', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(50) NOT NULL,
  `ci` varchar(50) NOT NULL,
  `nota1` int(11) NOT NULL,
  `nota2` int(11) NOT NULL,
  `nota3` int(11) NOT NULL,
  `notaf` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci` (`ci`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `sigla`, `ci`, `nota1`, `nota2`, `nota3`, `notaf`) VALUES
(1, 'mat-100', '101010', 30, 25, 20, 75),
(2, 'mat-101', '101010', 25, 26, 18, 69),
(3, 'mat-100', '142531', 16, 16, 20, 52),
(4, 'fis-200', '124578', 20, 20, 20, 60),
(5, 'fis-300', '124578', 30, 30, 10, 70),
(6, 'inf-111', '235689', 30, 30, 30, 90),
(7, 'inf-121', '142536', 15, 20, 25, 60),
(8, 'qmc-100', '142530', 26, 25, 30, 81),
(9, 'qmc-103', '142530', 19, 18, 17, 52),
(10, 'qmc-200', '142530', 10, 20, 25, 55),
(11, 'qmc-102', '142530', 30, 15, 25, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `ci` varchar(50) NOT NULL,
  `nom_com` varchar(80) NOT NULL,
  `fec_nac` date NOT NULL,
  `departamento` varchar(5) NOT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nom_com`, `fec_nac`, `departamento`) VALUES
('101010', 'Edwin Tito Mz', '2003-04-13', '01'),
('124578', 'Roberto Rosas Dias', '2002-02-25', '03'),
('235689', 'Miriam Lopez Alcon', '1999-10-25', '02'),
('142536', 'Pedro Calle Ortiz', '2002-02-25', '02'),
('142530', 'Ruben Peres Lopez', '2006-10-15', '04'),
('142531', 'Roberto Dias Calle', '2009-10-05', '01'),
('101024', 'Veronica Suxo Calle', '1991-05-13', '01'),
('102025', 'Selena Gomez Condori', '1995-04-04', '01');
