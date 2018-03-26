-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2016 a las 14:55:42
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `visitasdwauditoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_cliente`
--

CREATE TABLE IF NOT EXISTS `calificacion_cliente` (
  `idcalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `tamano_peconomico` int(2) NOT NULL,
  `crecimi_peconomico` int(2) NOT NULL,
  `finanza_peconomico` int(2) NOT NULL,
  `compt_peconomico` int(2) NOT NULL,
  `total_peconomico` int(2) NOT NULL,
  `conoci_rpersonal` int(2) NOT NULL,
  `resp_rpersonal` int(2) NOT NULL,
  `pps_rpersonal` int(2) NOT NULL,
  `actitud_rpersonal` int(2) NOT NULL,
  `total_rpersonal` int(2) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`idcalificacion`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` varchar(10) NOT NULL,
  `nom_cliente` varchar(80) NOT NULL,
  `tipo_cliente` varchar(20) NOT NULL,
  `hect_cliente` int(4) NOT NULL,
  `hectsemb_cliente` int(4) NOT NULL,
  `tel_cliente` varchar(11) NOT NULL,
  `fcumpleanos_cliente` date NOT NULL,
  `email_cliente` varchar(60) NOT NULL,
  `direccion_cliente` varchar(80) NOT NULL,
  `vtotalcompras_cliente` varchar(30) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `tiporeg_cliente` varchar(2) NOT NULL,
  `freg_cliente` datetime NOT NULL,
  `usureg_cliente` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `cliente_ibfk_1` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_cliente`, `tipo_cliente`, `hect_cliente`, `hectsemb_cliente`, `tel_cliente`, `fcumpleanos_cliente`, `email_cliente`, `direccion_cliente`, `vtotalcompras_cliente`, `id_usuario`, `tiporeg_cliente`, `freg_cliente`, `usureg_cliente`) VALUES
('258963147', 'Valagro', 'Distribuidor', 0, 0, '', '0000-00-00', '', '', '', 'ymarentes', 'R', '2016-08-31 02:51:17', 'dzambrano'),
('369852147', 'FlorHuila', 'Distribuidor', 0, 0, '', '0000-00-00', '', '', '', 'ymarentes', 'R', '2016-08-31 02:42:44', 'dzambrano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_cultivo`
--

CREATE TABLE IF NOT EXISTS `cliente_cultivo` (
  `id_clientecultivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_cultivo` int(3) NOT NULL,
  `tiporeg_clientecultivo` varchar(2) NOT NULL,
  `freg_clientecultivo` datetime NOT NULL,
  `usureg_clientecultivo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_clientecultivo`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `cliente_cultivo_ibfk_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cliente_cultivo`
--

INSERT INTO `cliente_cultivo` (`id_clientecultivo`, `id_cliente`, `id_cultivo`, `tiporeg_clientecultivo`, `freg_clientecultivo`, `usureg_clientecultivo`) VALUES
(7, '258963147', 1, 'R', '2016-08-31 02:51:17', 'dzambrano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_municipio`
--

CREATE TABLE IF NOT EXISTS `cliente_municipio` (
  `id_clientemunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_municipio` int(3) NOT NULL,
  `tiporeg_clientemunicipio` varchar(2) NOT NULL,
  `freg_clientemunicipio` datetime NOT NULL,
  `usureg_clientemunicipio` varchar(30) NOT NULL,
  PRIMARY KEY (`id_clientemunicipio`),
  KEY `id_municipio` (`id_municipio`),
  KEY `cliente_municipio_ibfk_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cliente_municipio`
--

INSERT INTO `cliente_municipio` (`id_clientemunicipio`, `id_cliente`, `id_municipio`, `tiporeg_clientemunicipio`, `freg_clientemunicipio`, `usureg_clientemunicipio`) VALUES
(6, '258963147', 1, 'R', '2016-08-31 02:51:17', 'dzambrano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_zona`
--

CREATE TABLE IF NOT EXISTS `cliente_zona` (
  `id_clientezona` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_zona` int(3) NOT NULL,
  `tiporeg_clientezona` varchar(2) NOT NULL,
  `freg_clientezona` datetime NOT NULL,
  `usureg_clientezona` varchar(30) NOT NULL,
  PRIMARY KEY (`id_clientezona`),
  KEY `id_zona` (`id_zona`),
  KEY `cliente_zona_ibfk_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cliente_zona`
--

INSERT INTO `cliente_zona` (`id_clientezona`, `id_cliente`, `id_zona`, `tiporeg_clientezona`, `freg_clientezona`, `usureg_clientezona`) VALUES
(6, '258963147', 1, 'R', '2016-08-31 02:51:17', 'dzambrano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivo`
--

CREATE TABLE IF NOT EXISTS `cultivo` (
  `id_cultivo` int(3) NOT NULL,
  `nom_cultivo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cultivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cultivo`
--

INSERT INTO `cultivo` (`id_cultivo`, `nom_cultivo`) VALUES
(1, 'papa'),
(2, 'yuca'),
(3, 'flores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cliente` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_usuario` varchar(30) CHARACTER SET latin1 NOT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tiporeg_eventos` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `freg_eventos` datetime NOT NULL,
  `usureg_eventos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `id_cliente`, `id_usuario`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`, `tiporeg_eventos`, `freg_eventos`, `usureg_eventos`) VALUES
(31, 'Visita de campo Valagro', '258963147', 'ymarentes', 'Visita en finca para promocionar MATABI', '', 'event-success', '1472825220000', '1472828820000', '02/09/2016 9:07', '02/09/2016 10:07', 'R', '2016-09-01 09:08:10', 'usu'),
(32, 'Registro uno Valagro', '258963147', 'ymarentes', '', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=21', 'event-special', '1472824920000', '1472825160000', '02/09/2016 9:02', '02/09/2016 9:06', 'E', '2016-09-01 09:33:57', 'usu'),
(33, 'Visita de campo Valagro', '258963147', 'ymarentes', 'Visita en finca para promocionar MATABI', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=22', 'event-success', '1472825220000', '1472828820000', '02/09/2016 9:07', '02/09/2016 10:07', 'E', '2016-09-01 09:34:45', 'usu'),
(34, 'Prueba uno Valagro', '258963147', 'ymarentes', 'aaaaaaaa', '', 'event-success', '1472827380000', '1472827380000', '02/09/2016 9:43', '02/09/2016 9:43', 'R', '2016-09-01 09:43:39', 'usu'),
(35, 'a Valagro', '258963147', 'ymarentes', 'aaaa', '', 'event-important', '1472913840000', '1472913840000', '03/09/2016 9:44', '03/09/2016 9:44', 'R', '2016-09-01 09:44:34', 'usu'),
(36, 'a Valagro', '258963147', 'ymarentes', 'aaaa', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=24', 'event-important', '1472913840000', '1472913840000', '03/09/2016 9:44', '03/09/2016 9:44', 'E', '2016-09-01 09:45:10', 'ymarentes'),
(37, 'a Valagro', '258963147', 'ymarentes', 'aasdsadas', '', 'event-important', '1472827620000', '1472827620000', '02/09/2016 9:47', '02/09/2016 9:47', 'R', '2016-09-01 09:47:33', 'ymarentes'),
(38, 'Prueba uno Valagro', '258963147', 'ymarentes', 'aaaaaaaa', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=23', 'event-success', '1472827380000', '1472827380000', '02/09/2016 9:43', '02/09/2016 9:43', 'E', '2016-09-02 04:24:31', 'ymarentes'),
(39, 'Prueba Valagro', '258963147', 'ymarentes', 'adasdasdasdad', '', 'event-warning', '1472937960000', '1472938320000', '03/09/2016 16:26', '03/09/2016 16:32', 'R', '2016-09-02 04:27:09', 'ymarentes'),
(40, 'a Valagro', '258963147', 'ymarentes', 'aasdsadas', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=25', 'event-important', '1472827620000', '1472827620000', '02/09/2016 9:47', '02/09/2016 9:47', 'E', '2016-09-02 04:27:20', 'ymarentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `nom_log` varchar(30) NOT NULL,
  `fecha_log` datetime NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id_log`, `nom_log`, `fecha_log`, `id_usuario`) VALUES
(1, 'Ingreso', '2016-08-31 00:00:00', 'dzambrano'),
(2, 'Ingreso', '2016-08-31 17:52:42', 'dzambrano'),
(3, 'Ingreso', '2016-08-31 11:01:18', 'dzambrano'),
(4, 'Salida del sistema', '2016-08-31 11:10:27', 'dzambrano'),
(5, 'Ingreso al sistema', '2016-08-31 11:11:16', 'dzambrano'),
(6, 'Salida del sistema', '2016-08-31 11:11:42', 'dzambrano'),
(7, 'Ingreso al sistema', '2016-08-31 11:16:02', 'prueba'),
(8, 'Ingreso al sistema', '2016-08-31 11:16:25', 'pcharry'),
(9, 'Salida del sistema', '2016-08-31 11:43:16', 'prueba'),
(10, 'Salida del sistema', '2016-08-31 11:44:23', 'pcharry'),
(11, 'Ingreso al sistema', '2016-08-31 11:52:16', 'dzambrano'),
(12, 'Salida del sistema', '2016-08-31 03:11:40', 'dzambrano'),
(13, 'Ingreso al sistema', '2016-08-31 03:40:45', 'prueba'),
(14, 'Salida del sistema', '2016-08-31 04:48:01', 'prueba'),
(15, 'Ingreso al sistema', '2016-08-31 04:48:07', 'ymarentes'),
(16, 'Salida del sistema', '2016-09-01 09:50:36', 'ymarentes'),
(17, 'Ingreso al sistema', '2016-09-01 09:55:11', 'ymarentes'),
(18, 'Salida del sistema', '2016-09-01 09:55:59', 'ymarentes'),
(19, 'Ingreso al sistema', '2016-09-01 09:56:07', 'pcharry'),
(20, 'Ingreso al sistema', '2016-09-01 09:56:14', 'dzambrano'),
(21, 'Ingreso al sistema', '2016-09-01 10:00:59', 'dzambrano'),
(22, 'Ingreso al sistema', '2016-09-01 10:01:06', 'pcharry'),
(23, 'Salida del sistema', '2016-09-01 10:01:26', 'pcharry'),
(24, 'Ingreso al sistema', '2016-09-01 10:02:07', 'dzambrano'),
(25, 'Salida del sistema', '2016-09-01 10:06:44', 'dzambrano'),
(26, 'Ingreso al sistema', '2016-09-01 10:06:50', 'pcharry'),
(27, 'Salida del sistema', '2016-09-01 10:07:53', 'pcharry'),
(28, 'Ingreso al sistema', '2016-09-01 10:29:02', 'ymarentes'),
(29, 'Salida del sistema', '2016-09-01 10:51:01', 'ymarentes'),
(30, 'Ingreso al sistema', '2016-09-02 04:24:18', 'ymarentes'),
(31, 'Salida del sistema', '2016-09-02 04:24:45', 'ymarentes'),
(32, 'Ingreso al sistema', '2016-09-02 04:26:24', 'ymarentes'),
(33, 'Salida del sistema', '2016-09-02 04:27:34', 'ymarentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id_municipio` int(3) NOT NULL,
  `nom_municipio` varchar(80) NOT NULL,
  `id_zona` int(3) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `id_zona` (`id_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nom_municipio`, `id_zona`) VALUES
(1, 'Mozquera', 1),
(2, 'funza', 1),
(3, 'zipacon', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potencialbiologico`
--

CREATE TABLE IF NOT EXISTS `potencialbiologico` (
  `id_pbiologico` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(30) NOT NULL,
  `id_cultivo` int(3) NOT NULL,
  `id_zona` int(3) NOT NULL,
  `pbiologico` varchar(100) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `num_aplicaciones` int(3) NOT NULL,
  `dosis_aplicacion` int(6) NOT NULL,
  `precio_kilogramo` varchar(20) NOT NULL,
  `totalpesos` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pbiologico`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `id_zona` (`id_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(3) NOT NULL,
  `nom_rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nom_rol`) VALUES
(1, 'Admin'),
(2, 'Lider'),
(3, 'Representante'),
(4, 'Promotor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` varchar(30) NOT NULL,
  `nom_usuario` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_zona` int(3) NOT NULL,
  `id_rol` int(3) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_zona` (`id_zona`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nom_usuario`, `password`, `id_zona`, `id_rol`) VALUES
('ymarentes', 'yanet marentes', '123', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_visita` date NOT NULL,
  `sitzona_visita` varchar(100) NOT NULL,
  `sitcompetencia_visita` varchar(100) NOT NULL,
  `rvisita_visita` varchar(100) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `tiporeg_visita` varchar(2) NOT NULL,
  `freg_visita` datetime NOT NULL,
  `usureg_visita` varchar(30) NOT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `visita_ibfk_2` (`id_cliente`),
  KEY `visita_ibfk_1` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id_visita`, `fecha_visita`, `sitzona_visita`, `sitcompetencia_visita`, `rvisita_visita`, `id_usuario`, `id_cliente`, `tiporeg_visita`, `freg_visita`, `usureg_visita`) VALUES
(33, '2016-08-31', 'NA', 'NA', 'Prueba insertar', 'ymarentes', '369852147', 'R', '2016-08-31 04:48:53', 'ymarentes'),
(34, '2016-09-01', '', 'NA', 'AplicaciÃ³n en Papa', 'ymarentes', '258963147', 'R', '2016-09-01 07:07:28', 'ymarentes'),
(36, '2016-09-01', '', 'NA', 'Prueba Producto', 'ymarentes', '258963147', 'R', '2016-09-01 07:11:11', 'ymarentes'),
(37, '2016-09-01', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaaa', 'ymarentes', '258963147', 'R', '2016-09-01 07:24:06', 'ymarentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `id_zona` int(3) NOT NULL,
  `nom_zona` varchar(80) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nom_zona`) VALUES
(1, 'Cundinamarca'),
(2, 'Boyaca'),
(3, 'Antioquia');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cliente_cultivo`
--
ALTER TABLE `cliente_cultivo`
  ADD CONSTRAINT `cliente_cultivo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_cultivo_ibfk_2` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`);

--
-- Filtros para la tabla `cliente_municipio`
--
ALTER TABLE `cliente_municipio`
  ADD CONSTRAINT `cliente_municipio_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_municipio_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `cliente_zona`
--
ALTER TABLE `cliente_zona`
  ADD CONSTRAINT `cliente_zona_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_zona_ibfk_2` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `potencialbiologico`
--
ALTER TABLE `potencialbiologico`
  ADD CONSTRAINT `potencialbiologico_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `potencialbiologico_ibfk_2` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  ADD CONSTRAINT `potencialbiologico_ibfk_3` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
