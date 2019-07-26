-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-07-2019 a las 23:43:59
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `generica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcat_roles`
--
-- Creación: 18-07-2019 a las 23:54:03
--

DROP TABLE IF EXISTS `tcat_roles`;
CREATE TABLE IF NOT EXISTS `tcat_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tcat_roles`
--

INSERT INTO `tcat_roles` (`id`, `nombre_rol`, `descripcion`) VALUES
(1, 'SUPERADMIN', 'Todos los permisos'),
(2, 'ADMIN', 'Permisos medios'),
(3, 'OPERATIVO', 'Permisos limitados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--
-- Creación: 18-07-2019 a las 23:54:03
--

DROP TABLE IF EXISTS `t_usuarios`;
CREATE TABLE IF NOT EXISTS `t_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `ape_paterno` varchar(100) NOT NULL,
  `ape_materno` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tcat_roles_id` int(11) NOT NULL,
  `activo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rol_id` (`tcat_roles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id`, `nombres`, `ape_paterno`, `ape_materno`, `telefono`, `email`, `username`, `password`, `tcat_roles_id`, `activo`) VALUES
(1, 'LUIS ALBERTO', 'GARCIA', 'RODRIGUEZ', '33399911', 'correo@correo.com', 'LGARCIA', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'S'),
(2, 'Diego Eduardo', 'Huerta', 'Gonzalez', '222999333', 'diego@correo.com', 'dhuerta', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 3, 'S'),
(3, 'Pedro', 'Guerra', 'Amante', '44488822', 'pedro@correo.com', 'pguerra', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 'S'),
(4, 'Omar', 'borunda', 'ramirez', '4448882211', 'omar@correo.com', 'BORUNDA', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, 'S');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
