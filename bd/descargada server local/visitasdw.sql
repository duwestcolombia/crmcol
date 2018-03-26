-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2016 a las 16:56:08
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `visitasdw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` varchar(10) NOT NULL,
  `nom_cliente` varchar(80) NOT NULL,
  `tipo_cliente` varchar(20) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `cliente_ibfk_1` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_cliente`, `tipo_cliente`, `id_usuario`) VALUES
('101020854', 'fedepapa', 'Distibuidor', 'prueba'),
('123456', 'comexcafe', 'Distribuidor', 'yluna'),
('65289825', 'Agropaisa', 'Distribuidor', 'prueba'),
('789456', 'riopaila', 'Agricultor', 'ymarentes'),
('789456123', 'expoflores', 'Agricultor', 'acortes'),
('789652542', 'Pepito Perez', 'Agricultor', 'prueba');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `id_cliente`, `id_usuario`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(5, 'prueba con usuario', '123456', 'dzambrano', 'evento como administrador dzambrano', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=5', 'event-info', '1470342660000', '1470353460000', '04/08/2016 15:31', '04/08/2016 18:31'),
(6, 'Otra visita administrador', '123456', 'dzambrano', 'Nueva visita administrador', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=6', 'event-success', '1470429300000', '1470429300000', '05/08/2016 15:35', '05/08/2016 15:35'),
(7, 'prueba segundo usuario', '123456', 'pcharry', 'prueba con un segundo usuario', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=7', 'event-important', '1470343080000', '1470343080000', '04/08/2016 15:38', '04/08/2016 15:38'),
(8, 'Importante', '101020854', 'prueba', 'visita fedepapa', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=8', 'event-important', '1470345600000', '1470352860000', '04/08/2016 16:20', '04/08/2016 18:21'),
(9, 'prueba adver', '65289825', 'prueba', 'agropaisa', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=9', 'event-warning', '1470345720000', '1470363720000', '04/08/2016 16:22', '04/08/2016 21:22'),
(10, 'prueba especial', '789652542', 'prueba', 'pepe', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=10', 'event-special', '1470345780000', '1470950580000', '04/08/2016 16:23', '11/08/2016 16:23'),
(11, 'No muy importante', '789456', 'ymarentes', 'PRueba', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=11', 'event-success', '1470345840000', '1471641900000', '04/08/2016 16:24', '19/08/2016 16:25'),
(12, 'Prueba', '65289825', 'prueba', 'aaaa', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=12', 'event-success', '1470519180000', '1470526440000', '06/08/2016 16:33', '06/08/2016 18:34'),
(13, 'pruena concatec', '789456', 'ymarentes', 'Prueba', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=13', 'event-info', '1470398220000', '1470409020000', '05/08/2016 6:57', '05/08/2016 9:57'),
(14, 'aa', '789456', 'ymarentes', 'adasd', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=14', 'event-info', '1470398340000', '1470398400000', '05/08/2016 6:59', '05/08/2016 7:00'),
(15, 'pruebaArray', '789456', 'ymarentes', 'asdad', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=15', 'event-success', '1470402480000', '1470402480000', '05/08/2016 8:08', '05/08/2016 8:08'),
(16, 'pruebariopaila', '789456', 'ymarentes', 'asdadasd', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=16', 'event-info', '1470489000000', '1470489060000', '06/08/2016 8:10', '06/08/2016 8:11'),
(17, 'Visita campo riopaila', '789456', 'ymarentes', 'PRueba', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=17', 'event-important', '1470921840000', '1471526700000', '11/08/2016 8:24', '18/08/2016 8:25'),
(18, 'a riopaila', '789456', 'ymarentes', 'asadas', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=18', 'event-info', '1470922680000', '1470922680000', '11/08/2016 8:38', '11/08/2016 8:38'),
(19, 'a Agropaisa', '65289825', 'prueba', 'asdasd', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=19', 'event-info', '1471022220000', '1471022220000', '12/08/2016 12:17', '12/08/2016 12:17'),
(20, 'Visita comercial expoflores', '789456123', 'acortes', 'Visita de campo', 'http://localhost:81/webventasdw/calendar/descripcion_evento.php?id=20', 'event-info', '1470428460000', '1470428460000', '05/08/2016 15:21', '05/08/2016 15:21');

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
