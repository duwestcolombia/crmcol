-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-08-2016 a las 10:00:38
-- Versión del servidor: 5.6.31
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `duwestco_visitasdw`
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
  `hect_clientes` int(4) NOT NULL,
  `hectsemb_cliente` int(4) NOT NULL,
  `tel_cliente` varchar(11) NOT NULL,
  `fcumpleanos_cliente` date NOT NULL,
  `email_cliente` varchar(60) NOT NULL,
  `direccion_cliente` varchar(80) NOT NULL,
  `vtotalcompras_cliente` varchar(30) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `cliente_ibfk_1` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_cliente`, `tipo_cliente`, `hect_clientes`, `hectsemb_cliente`, `tel_cliente`, `fcumpleanos_cliente`, `email_cliente`, `direccion_cliente`, `vtotalcompras_cliente`, `id_usuario`) VALUES
('101020854', 'fedepapa', 'Distibuidor', 0, 0, '', '0000-00-00', '', '', '', 'prueba'),
('123456', 'comexcafe', 'Distribuidor', 0, 0, '', '0000-00-00', '', '', '', 'yluna'),
('65289825', 'Agropaisa', 'Distribuidor', 0, 0, '', '0000-00-00', '', '', '', 'prueba'),
('789456', 'riopaila', 'Agricultor', 0, 0, '', '0000-00-00', '', '', '', 'ymarentes'),
('789456123', 'expoflores', 'Agricultor', 0, 0, '', '0000-00-00', '', '', '', 'acortes'),
('789652542', 'Pepito Perez', 'Agricultor', 0, 0, '', '0000-00-00', '', '', '', 'prueba'),
('951753654', 'Agroandino SAS', 'Distribuidor', 0, 0, '', '0000-00-00', '', '', '', 'pruebauser');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_cultivo`
--

CREATE TABLE IF NOT EXISTS `cliente_cultivo` (
  `id_clientecultivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_cultivo` int(3) NOT NULL,
  PRIMARY KEY (`id_clientecultivo`),
  KEY `id_cultivo` (`id_cultivo`),
  KEY `cliente_cultivo_ibfk_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente_cultivo`
--

INSERT INTO `cliente_cultivo` (`id_clientecultivo`, `id_cliente`, `id_cultivo`) VALUES
(2, '65289825', 2),
(3, '789652542', 1),
(5, '789456123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_municipio`
--

CREATE TABLE IF NOT EXISTS `cliente_municipio` (
  `id_clientemunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_municipio` int(3) NOT NULL,
  PRIMARY KEY (`id_clientemunicipio`),
  KEY `id_municipio` (`id_municipio`),
  KEY `cliente_municipio_ibfk_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente_municipio`
--

INSERT INTO `cliente_municipio` (`id_clientemunicipio`, `id_cliente`, `id_municipio`) VALUES
(2, '65289825', 2),
(3, '789652542', 3),
(5, '789456123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_zona`
--

CREATE TABLE IF NOT EXISTS `cliente_zona` (
  `id_clientezona` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_zona` int(3) NOT NULL,
  PRIMARY KEY (`id_clientezona`),
  KEY `id_zona` (`id_zona`),
  KEY `cliente_zona_ibfk_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente_zona`
--

INSERT INTO `cliente_zona` (`id_clientezona`, `id_cliente`, `id_zona`) VALUES
(2, '65289825', 1),
(3, '789652542', 2),
(5, '789456123', 2);

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
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(50) NOT NULL,
  `finicio_evento` date NOT NULL,
  `ffin_evento` date NOT NULL,
  `hinicio_evento` time NOT NULL,
  `hfin_evento` time NOT NULL,
  `descripcion_evento` varchar(80) NOT NULL,
  `recurrencia_evento` varchar(20) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `nombre_evento`, `finicio_evento`, `ffin_evento`, `hinicio_evento`, `hfin_evento`, `descripcion_evento`, `recurrencia_evento`, `periodo`) VALUES
(2, 'a', '2016-08-04', '2016-08-05', '08:00:00', '10:00:00', 'a', '', '');

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
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `id_cliente`, `id_usuario`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(21, 'Prueba desde movil fedepapa', '101020854', 'prueba', 'Está prueba es exitosa', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=21', 'event-info', '1472147160000', '1472148000000', '25/08/2016 12:46', '25/08/2016 13:00'),
(22, 'prueba desde pc Pepito Perez', '789652542', 'prueba', 'esta es una pruba exitosa', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=22', 'event-success', '1472319900000', '1472319900000', '27/08/2016 12:45', '27/08/2016 12:45'),
(24, 'Nueva prueba Pepito Perez', '789652542', 'prueba', 'prueba 2', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=24', 'event-important', '1472406420000', '1472406660000', '28/08/2016 12:47', '28/08/2016 12:51'),
(25, 'Prueba  fedepapa', '101020854', 'prueba', 'saaaaa', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=25', 'event-info', '1472323860000', '1472324100000', '27/08/2016 13:51', '27/08/2016 13:55'),
(26, 'Prueba Agropaisa', '65289825', 'prueba', 'A', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=26', 'event-info', '1472325180000', '1472339280000', '27/08/2016 14:13', '27/08/2016 18:08'),
(27, 'Prueba2 riopaila', '789456', 'ymarentes', 'Sffff', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=27', 'event-success', '1472152440000', '1472238840000', '25/08/2016 14:14', '26/08/2016 14:14'),
(28, 'Visita comercial comexcafe', '123456', 'yluna', 'Ventas de aproach prima ', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=28', 'event-warning', '1472152440000', '1472159640000', '25/08/2016 14:14', '25/08/2016 16:14'),
(29, 'Visita de campo fedepapa', '101020854', 'prueba', 'Aplicacion en papa', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=29', 'event-important', '1472242860000', '1472243220000', '26/08/2016 15:21', '26/08/2016 15:27'),
(30, 'Visita  fedepapa', '101020854', 'prueba', 'Reunión de programacion para aplicacion de Aproach ', 'http://duwestcolombia.com/calendar/descripcion_evento.php?id=30', 'event-special', '1472588340000', '1472725200000', '30/08/2016 15:19', '01/09/2016 5:20');

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
(1, 'Mosquera', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `potencialbiologico`
--

INSERT INTO `potencialbiologico` (`id_pbiologico`, `id_usuario`, `id_cultivo`, `id_zona`, `pbiologico`, `id_producto`, `num_aplicaciones`, `dosis_aplicacion`, `precio_kilogramo`, `totalpesos`) VALUES
(1, 'acortes', 1, 1, 'plaga', 1, 10, 200, '3000', '6000000'),
(2, 'acortes', 1, 2, 'pepe', 2, 2, 10, '100', '2000');

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
('acortes', 'ana maria cortes', '123', 2, 3),
('dzambrano', 'david zambrano', '123', 1, 1),
('glondono', 'gustavo londono', '123', 3, 2),
('pcharry', 'paola charry', '123', 2, 2),
('prueba', 'esta es una prueba', '123', 3, 3),
('pruebaadmin', 'Prueba perfil Lider  ', '123', 1, 2),
('pruebasuperuser', 'Prueba super usuario', '123', 1, 1),
('pruebauser', 'Prueba perfil usuario', '123', 1, 3),
('yluna', 'yeni luna', '123', 2, 3),
('ymarentes', 'yaneth marentes', '123', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_visita` date NOT NULL,
  `actividad_visita` varchar(100) NOT NULL,
  `planaccion_visita` varchar(100) NOT NULL,
  `sitcompetencia_visita` varchar(100) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `visita_ibfk_2` (`id_cliente`),
  KEY `visita_ibfk_1` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id_visita`, `fecha_visita`, `actividad_visita`, `planaccion_visita`, `sitcompetencia_visita`, `id_usuario`, `id_cliente`) VALUES
(6, '2016-07-06', 'ksasakdjlaj', 'jkideklslkasndo', 'klsjdlasdoiqjmklsajdi', 'prueba', '65289825'),
(7, '2016-07-07', 'kjsajdlka', 'jsalkjdlkasjd', 'klsjdkljaskld', 'prueba', '789652542'),
(8, '2016-07-30', 'papapap', 'pepepep', 'pepepepe', 'prueba', '789652542'),
(9, '2016-07-06', 'Toma de muestras para fitollanos', 'se toman 10 frascos de muestras de hongo en planta, se tiene en cuenta los bactericidas aplicados', 'no registra', 'prueba', '65289825'),
(10, '2016-07-06', 'adasd', 'sadasd', 'sadasd', 'prueba', '65289825'),
(11, '2016-07-14', 'asdasda', 'asdasd', 'asdasd', 'prueba', '65289825'),
(12, '2016-07-07', 'asdasd', 'sadasd', 'asdasd', 'prueba', '65289825'),
(13, '2016-07-30', 'sdad', 'sadasd', 'asda', 'prueba', '65289825'),
(14, '2016-07-06', 'asdasdas', 'sadsad', 'asdsa', 'prueba', '65289825'),
(15, '2016-07-06', 'dasd', 'asdas', 'asdas', 'prueba', '65289825'),
(16, '2016-07-29', 'asd', 'asdasd', 'asdad', 'prueba', '789652542'),
(17, '2016-07-06', 'adsad', 'asdasd', 'asdasd', 'prueba', '65289825'),
(18, '2016-07-06', 'sadasd', 'sada', 'sdad', 'prueba', '65289825'),
(20, '2016-07-07', 'assadasd', 'sadasd', 'asdad', 'prueba', '65289825'),
(23, '2016-07-12', 'asd', 'aaa', 'aa', 'prueba', '65289825'),
(25, '2016-07-21', 'Prueba 2 ', 'si aparece', 'otro cliente', 'prueba', '65289825'),
(26, '2016-08-23', 'Prueba agosto', 'revisar funcionamiento', 'NA', 'prueba', '65289825'),
(27, '2016-08-23', 'Prueba agosto', 'revisar funcionamiento', 'NA', 'prueba', '65289825');

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
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
