-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2016 a las 16:13:25
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
  `nom_cliente` varchar(50) NOT NULL,
  `tipo_cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_cliente`, `tipo_cliente`) VALUES
('14789633', 'Fedepapa', 'Distribuidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_calificacion`
--

CREATE TABLE IF NOT EXISTS `cliente_calificacion` (
  `id_clientecalificacion` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_clientecalificacion`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente_calificacion`
--

INSERT INTO `cliente_calificacion` (`id_clientecalificacion`, `tamano_peconomico`, `crecimi_peconomico`, `finanza_peconomico`, `compt_peconomico`, `total_peconomico`, `conoci_rpersonal`, `resp_rpersonal`, `pps_rpersonal`, `actitud_rpersonal`, `total_rpersonal`, `id_cliente`, `id_usuario`) VALUES
(2, 2, 1, 1, 1, 5, 1, 3, 1, 1, 6, '14789633', 'jluna');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente_cultivo`
--

INSERT INTO `cliente_cultivo` (`id_clientecultivo`, `id_cliente`, `id_cultivo`) VALUES
(1, '14789633', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_municipio`
--

CREATE TABLE IF NOT EXISTS `cliente_municipio` (
  `id_clientemunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(10) NOT NULL,
  `id_municipio` int(3) NOT NULL,
  `hect_cliente` int(4) NOT NULL,
  `hectsemb_cliente` int(4) NOT NULL,
  `tel_cliente` varchar(11) NOT NULL,
  `fcumpleanos_cliente` date NOT NULL,
  `email_cliente` varchar(60) NOT NULL,
  `direccion_cliente` varchar(80) NOT NULL,
  `vtotalcompras_cliente` varchar(30) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `contacto_cliente` varchar(60) NOT NULL,
  PRIMARY KEY (`id_clientemunicipio`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_municipio` (`id_municipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente_municipio`
--

INSERT INTO `cliente_municipio` (`id_clientemunicipio`, `id_cliente`, `id_municipio`, `hect_cliente`, `hectsemb_cliente`, `tel_cliente`, `fcumpleanos_cliente`, `email_cliente`, `direccion_cliente`, `vtotalcompras_cliente`, `id_usuario`, `contacto_cliente`) VALUES
(1, '14789633', 1, 10, 10, '785952', '2016-09-26', 'pepe@gmail.com', 'calle 26 65 85', '200000000', 'jluna', 'Pepe');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente_zona`
--

INSERT INTO `cliente_zona` (`id_clientezona`, `id_cliente`, `id_zona`) VALUES
(1, '14789633', 1);

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
(1, 'Aguacate'),
(2, 'Algodón'),
(3, 'Alstroemeria'),
(4, 'Arroz'),
(5, 'Arroz'),
(6, 'Arveja'),
(7, 'Banano'),
(8, 'Café'),
(9, 'Caña'),
(10, 'Cebolla'),
(11, 'Cítricos'),
(12, 'Clavel'),
(13, 'Crisantemo'),
(14, 'Diversificados'),
(15, 'Flores de exportacion'),
(16, 'Frutales'),
(17, 'Guanábana'),
(18, 'Guayaba'),
(19, 'Habichuela'),
(20, 'Hortalizas'),
(21, 'Hortensia'),
(22, 'Lulo'),
(23, 'Maíz'),
(24, 'Maracuyá'),
(25, 'Melón'),
(26, 'Mora'),
(27, 'Palma'),
(28, 'Papa'),
(29, 'Pastos'),
(30, 'Pepino'),
(31, 'Piña'),
(32, 'Platano '),
(33, 'Rosa'),
(34, 'Soya'),
(35, 'Tomate'),
(36, 'Tomate de árbol'),
(37, 'Zanahoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tit_documento` varchar(150) NOT NULL,
  `descrip_documento` varchar(250) NOT NULL,
  `tamano_documento` int(10) NOT NULL,
  `tipo_documento` varchar(150) NOT NULL,
  `nombre_documento` varchar(300) NOT NULL,
  `fcarga_documento` datetime NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `tit_documento`, `descrip_documento`, `tamano_documento`, `tipo_documento`, `nombre_documento`, `fcarga_documento`) VALUES
(15, 'ticket', 'dario', 78747, 'application/pdf', 'Seguimiento Ticket Dario Gutierrez.pdf', '2016-09-01 02:47:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id_municipio` int(3) NOT NULL,
  `nom_municipio` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_zona` int(3) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `id_zona` (`id_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nom_municipio`, `id_zona`) VALUES
(1, 'Abejorral', 1),
(2, 'Abriaqui', 1),
(3, 'Aguadas', 1),
(4, 'Alejandria', 1),
(5, 'Amaga', 1),
(6, 'Amalfi', 1),
(7, 'Andes', 1),
(8, 'Angelopolis', 1),
(9, 'Angostura', 1),
(10, 'Anori', 1),
(11, 'Anserma', 1),
(12, 'Antioquia', 1),
(13, 'Anza', 1),
(14, 'Apartado', 1),
(15, 'Aranzazu', 1),
(16, 'Arboletes', 1),
(17, 'Argelia', 1),
(18, 'Armenia', 1),
(19, 'Ayapel', 1),
(20, 'Barbosa', 1),
(21, 'Belalcazar', 1),
(22, 'Bello', 1),
(23, 'Belmira', 1),
(24, 'Betania', 1),
(25, 'Betulia', 1),
(26, 'Bolivar', 1),
(27, 'Briceño', 1),
(28, 'Buenavista', 1),
(29, 'Buritica', 1),
(30, 'Caceres', 1),
(31, 'Caicedo', 1),
(32, 'Caldas', 1),
(33, 'Campamento', 1),
(34, 'Canalete', 1),
(35, 'Cañasgordas', 1),
(36, 'Caracoli', 1),
(37, 'Caramanta', 1),
(38, 'Carepa', 1),
(39, 'Carmen De Viboral', 1),
(40, 'Carolina', 1),
(41, 'Caucasia', 1),
(42, 'Cerete', 1),
(43, 'Chigorodo', 1),
(44, 'Chima', 1),
(45, 'Chinchina', 1),
(46, 'Chinu', 1),
(47, 'Cienaga De Oro', 1),
(48, 'Cisneros', 1),
(49, 'Cocorna', 1),
(50, 'Concepcion', 1),
(51, 'Concordia', 1),
(52, 'Copacabana', 1),
(53, 'Cotorra', 1),
(54, 'Dabeiba', 1),
(55, 'Don Matias', 1),
(56, 'Ebejico', 1),
(57, 'El Bagre', 1),
(58, 'Entrerrios', 1),
(59, 'Envigado', 1),
(60, 'Filadelfia', 1),
(61, 'Fredonia', 1),
(62, 'Frontino', 1),
(63, 'Giraldo', 1),
(64, 'Girardota', 1),
(65, 'Gomez Plata', 1),
(66, 'Granada', 1),
(67, 'Guadalupe', 1),
(68, 'Guarne', 1),
(69, 'Guatape', 1),
(70, 'Heliconia', 1),
(71, 'Hispania', 1),
(72, 'Itagui', 1),
(73, 'Ituango', 1),
(74, 'Jardin', 1),
(75, 'Jerico', 1),
(76, 'La Apartada', 1),
(77, 'La Ceja', 1),
(78, 'La Dorada', 1),
(79, 'La Estrella', 1),
(80, 'La Merced', 1),
(81, 'La Pintada', 1),
(82, 'La Union', 1),
(83, 'Liborina', 1),
(84, 'Lorica', 1),
(85, 'Los Cordobas', 1),
(86, 'Maceo', 1),
(87, 'Manizales', 1),
(88, 'Manzanares', 1),
(89, 'Marinilla', 1),
(90, 'Marmato', 1),
(91, 'Marquetalia', 1),
(92, 'Marulanda', 1),
(93, 'Medellin', 1),
(94, 'Momil', 1),
(95, 'Montebello', 1),
(96, 'Montelibano', 1),
(97, 'Monteria', 1),
(98, 'Moñitos', 1),
(99, 'Murindo', 1),
(100, 'Mutata', 1),
(101, 'Nariño', 1),
(102, 'Nechi', 1),
(103, 'Necocli', 1),
(104, 'Neira', 1),
(105, 'Norcasia', 1),
(106, 'Olaya', 1),
(107, 'Pacora', 1),
(108, 'Palestina', 1),
(109, 'Pensilvania', 1),
(110, 'Peñol', 1),
(111, 'Peque', 1),
(112, 'Planeta Rica', 1),
(113, 'Pueblo Nuevo', 1),
(114, 'Pueblorrico', 1),
(115, 'Puerto Berrio', 1),
(116, 'Puerto Escondido', 1),
(117, 'Puerto Libertador', 1),
(118, 'Puerto Nare (La Magdalena)', 1),
(119, 'Puerto Triunfo', 1),
(120, 'Purisima', 1),
(121, 'Remedios', 1),
(122, 'Retiro', 1),
(123, 'Rionegro', 1),
(124, 'Riosucio', 1),
(125, 'Risaralda', 1),
(126, 'Sabanalarga', 1),
(127, 'Sabaneta', 1),
(128, 'Sahagun', 1),
(129, 'Salamina', 1),
(130, 'Salgar', 1),
(131, 'Samana', 1),
(132, 'San Andres', 1),
(133, 'San Andres Sotavento', 1),
(134, 'San Antero', 1),
(135, 'San Bernardo Del Viento', 1),
(136, 'San Carlos', 1),
(137, 'San Carlos', 1),
(138, 'San Francisco', 1),
(139, 'San Jeronimo', 1),
(140, 'San Jose', 1),
(141, 'San Jose De La Montaña', 1),
(142, 'San Juan De Uraba', 1),
(143, 'San Luis', 1),
(144, 'San Pedro', 1),
(145, 'San Pedro De Uraba', 1),
(146, 'San Pelayo', 1),
(147, 'San Rafael', 1),
(148, 'San Roque', 1),
(149, 'San Vicente', 1),
(150, 'Santa Barbara', 1),
(151, 'Santa Rosa De Osos', 1),
(152, 'Santo Domingo', 1),
(153, 'Santuario', 1),
(154, 'Segovia', 1),
(155, 'Sonson', 1),
(156, 'Sopetran', 1),
(157, 'Supia', 1),
(158, 'Tamesis', 1),
(159, 'Taraza', 1),
(160, 'Tarso', 1),
(161, 'Tierralta', 1),
(162, 'Titiribi', 1),
(163, 'Toledo', 1),
(164, 'Turbo', 1),
(165, 'Uramita', 1),
(166, 'Urrao', 1),
(167, 'Valdivia', 1),
(168, 'Valencia', 1),
(169, 'Valparaiso', 1),
(170, 'Vegachi', 1),
(171, 'Venecia', 1),
(172, 'Victoria', 1),
(173, 'Vigia Del Fuerte', 1),
(174, 'Villamaria', 1),
(175, 'Viterbo', 1),
(176, 'Yali', 1),
(177, 'Yarumal', 1),
(178, 'Yolombo', 1),
(179, 'Yondo', 1),
(180, 'Zaragoza', 1),
(181, 'Almeida', 2),
(182, 'Aquitania', 2),
(183, 'Arcabuco', 2),
(184, 'Belen', 2),
(185, 'Berbeo', 2),
(186, 'Beteitiva', 2),
(187, 'Boavita', 2),
(188, 'Boyaca', 2),
(189, 'Briceño', 2),
(190, 'Buenavista', 2),
(191, 'Busbanza', 2),
(192, 'Caldas', 2),
(193, 'Campo Hermoso', 2),
(194, 'Cerinza', 2),
(195, 'Chinavita', 2),
(196, 'Chiquinquira', 2),
(197, 'Chiquiza', 2),
(198, 'Chiscas', 2),
(199, 'Chita', 2),
(200, 'Chitaraque', 2),
(201, 'Chivata', 2),
(202, 'Chivor', 2),
(203, 'Cienega', 2),
(204, 'Combita', 2),
(205, 'Coper', 2),
(206, 'Corrales', 2),
(207, 'Covarachia', 2),
(208, 'Cubara', 2),
(209, 'Cucaita', 2),
(210, 'Cuitiva', 2),
(211, 'Duitama', 2),
(212, 'El Cocuy', 2),
(213, 'El Espino', 2),
(214, 'Firavitoba', 2),
(215, 'Floresta', 2),
(216, 'Gachantiva', 2),
(217, 'Gameza', 2),
(218, 'Garagoa', 2),
(219, 'Guacamayas', 2),
(220, 'Guateque', 2),
(221, 'Guayata', 2),
(222, 'Guican', 2),
(223, 'Iza', 2),
(224, 'Jenesano', 2),
(225, 'Jerico', 2),
(226, 'La Capilla', 2),
(227, 'La Uvita', 2),
(228, 'La Victoria', 2),
(229, 'Labranzagrande', 2),
(230, 'Macanal', 2),
(231, 'Maripi', 2),
(232, 'Miraflores', 2),
(233, 'Mongua', 2),
(234, 'Mongui', 2),
(235, 'Moniquira', 2),
(236, 'Motavita', 2),
(237, 'Muzo', 2),
(238, 'Nobsa', 2),
(239, 'Nuevo Colon', 2),
(240, 'Oicata', 2),
(241, 'Otanche', 2),
(242, 'Pachavita', 2),
(243, 'Paez', 2),
(244, 'Paipa', 2),
(245, 'Pajarito', 2),
(246, 'Panqueba', 2),
(247, 'Pauna', 2),
(248, 'Paya', 2),
(249, 'Paz Del Rio', 2),
(250, 'Pesca', 2),
(251, 'Pisba', 2),
(252, 'Puerto Boyaca', 2),
(253, 'Quipama', 2),
(254, 'Ramiriqui', 2),
(255, 'Raquira', 2),
(256, 'Rondon', 2),
(257, 'Saboya', 2),
(258, 'Sachica', 2),
(259, 'Samaca', 2),
(260, 'San Eduardo', 2),
(261, 'San Jose De Pare', 2),
(262, 'San Luis De Gaceno', 2),
(263, 'San Mateo', 2),
(264, 'San Miguel De Sema', 2),
(265, 'San Pablo De Borbur', 2),
(266, 'Santa Maria', 2),
(267, 'Santa Rosa De Viterbo', 2),
(268, 'Santa Sofia', 2),
(269, 'Santana', 2),
(270, 'Sativanorte', 2),
(271, 'Sativasur', 2),
(272, 'Siachoque', 2),
(273, 'Soata', 2),
(274, 'Socha', 2),
(275, 'Socota', 2),
(276, 'Sogamoso', 2),
(277, 'Somondoco', 2),
(278, 'Sora', 2),
(279, 'Soraca', 2),
(280, 'Sotaquira', 2),
(281, 'Susacon', 2),
(282, 'Sutamarchan', 2),
(283, 'Sutatenza', 2),
(284, 'Tasco', 2),
(285, 'Tenza', 2),
(286, 'Tibana', 2),
(287, 'Tibasosa', 2),
(288, 'Tinjaca', 2),
(289, 'Tipacoque', 2),
(290, 'Toca', 2),
(291, 'Togui', 2),
(292, 'Topaga', 2),
(293, 'Tota', 2),
(294, 'Tunja', 2),
(295, 'Tunungua', 2),
(296, 'Turmeque', 2),
(297, 'Tuta', 2),
(298, 'Tutasa', 2),
(299, 'Umbita', 2),
(300, 'Ventaquemada', 2),
(301, 'Villa De Leiva', 2),
(302, 'Viracacha', 2),
(303, 'Zetaquira', 2),
(304, 'Agua De Dios', 3),
(305, 'Alban', 3),
(306, 'Anapoima', 3),
(307, 'Anolaima', 3),
(308, 'Apulo (Rafael Reyes)', 3),
(309, 'Arbelaez', 3),
(310, 'Beltran', 3),
(311, 'Bituima', 3),
(312, 'Bogotá', 3),
(313, 'Bojaca', 3),
(314, 'Cabrera', 3),
(315, 'Cachipay', 3),
(316, 'Cajica', 3),
(317, 'Caparrapi', 3),
(318, 'Caqueza', 3),
(319, 'Carmen De Carupa', 3),
(320, 'Chaguani', 3),
(321, 'Chia', 3),
(322, 'Chipaque', 3),
(323, 'Choachi', 3),
(324, 'Choconta', 3),
(325, 'Cogua', 3),
(326, 'Cota', 3),
(327, 'Cucunuba', 3),
(328, 'Mesitas Del Colegio', 3),
(329, 'El Peñon', 3),
(330, 'El Rosal', 3),
(331, 'Facatativa', 3),
(332, 'Fomeque', 3),
(333, 'Fosca', 3),
(334, 'Funza', 3),
(335, 'Fuquene', 3),
(336, 'Fusagasuga', 3),
(337, 'Gachala', 3),
(338, 'Gachancipa', 3),
(339, 'Gacheta', 3),
(340, 'Gama', 3),
(341, 'Girardot', 3),
(342, 'Granada', 3),
(343, 'Guacheta', 3),
(344, 'Guaduas', 3),
(345, 'Guasca', 3),
(346, 'Guataqui', 3),
(347, 'Guatavita', 3),
(348, 'Guayabal De Siquima', 3),
(349, 'Guayabetal', 3),
(350, 'Gutierrez', 3),
(351, 'Jerusalen', 3),
(352, 'Junin', 3),
(353, 'La Calera', 3),
(354, 'La Mesa', 3),
(355, 'La Palma', 3),
(356, 'La Peña', 3),
(357, 'La Vega', 3),
(358, 'Lenguazaque', 3),
(359, 'Macheta', 3),
(360, 'Madrid', 3),
(361, 'Manta', 3),
(362, 'Medina', 3),
(363, 'Mosquera', 3),
(364, 'Nariño', 3),
(365, 'Nemocon', 3),
(366, 'Nilo', 3),
(367, 'Nimaima', 3),
(368, 'Nocaima', 3),
(369, 'Pacho', 3),
(370, 'Paime', 3),
(371, 'Pandi', 3),
(372, 'Paratebueno', 3),
(373, 'Pasca', 3),
(374, 'Puerto Salgar', 3),
(375, 'Puli', 3),
(376, 'Quebradanegra', 3),
(377, 'Quetame', 3),
(378, 'Quipile', 3),
(379, 'Ricaurte', 3),
(380, 'San  Antonio Del Tequendama', 3),
(381, 'San Bernardo', 3),
(382, 'San Cayetano', 3),
(383, 'San Francisco', 3),
(384, 'San Juan De Rioseco', 3),
(385, 'Sasaima', 3),
(386, 'Sesquile', 3),
(387, 'Sibate', 3),
(388, 'Silvania', 3),
(389, 'Simijaca', 3),
(390, 'Soacha', 3),
(391, 'Sopo', 3),
(392, 'Subachoque', 3),
(393, 'Suesca', 3),
(394, 'Supata', 3),
(395, 'Susa', 3),
(396, 'Sutatausa', 3),
(397, 'Tabio', 3),
(398, 'Tausa', 3),
(399, 'Tena', 3),
(400, 'Tenjo', 3),
(401, 'Tibacuy', 3),
(402, 'Tibirita', 3),
(403, 'Tocaima', 3),
(404, 'Tocancipa', 3),
(405, 'Topaipi', 3),
(406, 'Ubala', 3),
(407, 'Ubaque', 3),
(408, 'Ubate', 3),
(409, 'Une', 3),
(410, 'Utica', 3),
(411, 'Venecia (Ospina Perez)', 3),
(412, 'Vergara', 3),
(413, 'Viani', 3),
(414, 'Villagomez', 3),
(415, 'Villapinzon', 3),
(416, 'Villeta', 3),
(417, 'Viota', 3),
(418, 'Yacopi', 3),
(419, 'Zipacon', 3),
(420, 'Zipaquira', 3),
(421, 'Aguadas', 4),
(422, 'Alcala', 4),
(423, 'Andalucia', 4),
(424, 'Anserma', 4),
(425, 'Ansermanuevo', 4),
(426, 'Apia', 4),
(427, 'Aranzazu', 4),
(428, 'Argelia', 4),
(429, 'Armenia', 4),
(430, 'Balboa', 4),
(431, 'Belalcazar', 4),
(432, 'Belen De Umbria', 4),
(433, 'Bolivar', 4),
(434, 'Buenaventura', 4),
(435, 'Buenavista', 4),
(436, 'Buga', 4),
(437, 'Bugalagrande', 4),
(438, 'Caicedonia', 4),
(439, 'Calarca', 4),
(440, 'Cali', 4),
(441, 'Calima', 4),
(442, 'Candelaria', 4),
(443, 'Cartago', 4),
(444, 'Chinchina', 4),
(445, 'Circasia', 4),
(446, 'Cordoba', 4),
(447, 'Dagua', 4),
(448, 'Dos Quebradas', 4),
(449, 'El Aguila', 4),
(450, 'El Cairo', 4),
(451, 'El Cerrito', 4),
(452, 'El Dovio', 4),
(453, 'Filadelfia', 4),
(454, 'Filandia', 4),
(455, 'Florida', 4),
(456, 'Genova', 4),
(457, 'Ginebra', 4),
(458, 'Guacari', 4),
(459, 'Guatica', 4),
(460, 'Jamundi', 4),
(461, 'La Celia', 4),
(462, 'La Cumbre', 4),
(463, 'La Dorada', 4),
(464, 'La Merced', 4),
(465, 'La Tebaida', 4),
(466, 'La Union', 4),
(467, 'La Victoria', 4),
(468, 'La Virginia', 4),
(469, 'Manizales', 4),
(470, 'Manzanares', 4),
(471, 'Marmato', 4),
(472, 'Marquetalia', 4),
(473, 'Marsella', 4),
(474, 'Marulanda', 4),
(475, 'Mistrato', 4),
(476, 'Montenegro', 4),
(477, 'Neira', 4),
(478, 'Norcasia', 4),
(479, 'Obando', 4),
(480, 'Pacora', 4),
(481, 'Palestina', 4),
(482, 'Palmira', 4),
(483, 'Pensilvania', 4),
(484, 'Pereira', 4),
(485, 'Pijao', 4),
(486, 'Pradera', 4),
(487, 'Pueblo Rico', 4),
(488, 'Pueblo Tapao', 4),
(489, 'Quimbaya', 4),
(490, 'Quinchia', 4),
(491, 'Restrepo', 4),
(492, 'Riofrio', 4),
(493, 'Riosucio', 4),
(494, 'Risaralda', 4),
(495, 'Roldanillo', 4),
(496, 'Salamina', 4),
(497, 'Salento', 4),
(498, 'Samana', 4),
(499, 'San Jose', 4),
(500, 'San Pedro', 4),
(501, 'Santa Rosa De Cabal', 4),
(502, 'Santuario', 4),
(503, 'Sevilla', 4),
(504, 'Sevilla', 4),
(505, 'Supia', 4),
(506, 'Toro', 4),
(507, 'Trujillo', 4),
(508, 'Tulua', 4),
(509, 'Ulloa', 4),
(510, 'Versalles', 4),
(511, 'Victoria', 4),
(512, 'Vijes', 4),
(513, 'Villamaria', 4),
(514, 'Viterbo', 4),
(515, 'Yotoco', 4),
(516, 'Yumbo', 4),
(517, 'Zarzal', 4),
(518, 'Abejorral', 5),
(519, 'Abriaqui', 5),
(520, 'Aguadas', 5),
(521, 'Alejandria', 5),
(522, 'Amaga', 5),
(523, 'Amalfi', 5),
(524, 'Andes', 5),
(525, 'Angelopolis', 5),
(526, 'Angostura', 5),
(527, 'Anori', 5),
(528, 'Anserma', 5),
(529, 'Antioquia', 5),
(530, 'Anza', 5),
(531, 'Apartado', 5),
(532, 'Aranzazu', 5),
(533, 'Arboletes', 5),
(534, 'Argelia', 5),
(535, 'Armenia', 5),
(536, 'Ayapel', 5),
(537, 'Barbosa', 5),
(538, 'Belalcazar', 5),
(539, 'Bello', 5),
(540, 'Belmira', 5),
(541, 'Betania', 5),
(542, 'Betulia', 5),
(543, 'Bolivar', 5),
(544, 'Briceño', 5),
(545, 'Buenavista', 5),
(546, 'Buritica', 5),
(547, 'Caceres', 5),
(548, 'Caicedo', 5),
(549, 'Caldas', 5),
(550, 'Campamento', 5),
(551, 'Canalete', 5),
(552, 'Cañasgordas', 5),
(553, 'Caracoli', 5),
(554, 'Caramanta', 5),
(555, 'Carepa', 5),
(556, 'Carmen De Viboral', 5),
(557, 'Carolina', 5),
(558, 'Caucasia', 5),
(559, 'Cerete', 5),
(560, 'Chigorodo', 5),
(561, 'Chima', 5),
(562, 'Chinchina', 5),
(563, 'Chinu', 5),
(564, 'Cienaga De Oro', 5),
(565, 'Cisneros', 5),
(566, 'Cocorna', 5),
(567, 'Concepcion', 5),
(568, 'Concordia', 5),
(569, 'Copacabana', 5),
(570, 'Cotorra', 5),
(571, 'Dabeiba', 5),
(572, 'Don Matias', 5),
(573, 'Ebejico', 5),
(574, 'El Bagre', 5),
(575, 'Entrerrios', 5),
(576, 'Envigado', 5),
(577, 'Filadelfia', 5),
(578, 'Fredonia', 5),
(579, 'Frontino', 5),
(580, 'Giraldo', 5),
(581, 'Girardota', 5),
(582, 'Gomez Plata', 5),
(583, 'Granada', 5),
(584, 'Guadalupe', 5),
(585, 'Guarne', 5),
(586, 'Guatape', 5),
(587, 'Heliconia', 5),
(588, 'Hispania', 5),
(589, 'Itagui', 5),
(590, 'Ituango', 5),
(591, 'Jardin', 5),
(592, 'Jerico', 5),
(593, 'La Apartada', 5),
(594, 'La Ceja', 5),
(595, 'La Dorada', 5),
(596, 'La Estrella', 5),
(597, 'La Merced', 5),
(598, 'La Pintada', 5),
(599, 'La Union', 5),
(600, 'Liborina', 5),
(601, 'Lorica', 5),
(602, 'Los Cordobas', 5),
(603, 'Maceo', 5),
(604, 'Manizales', 5),
(605, 'Manzanares', 5),
(606, 'Marinilla', 5),
(607, 'Marmato', 5),
(608, 'Marquetalia', 5),
(609, 'Marulanda', 5),
(610, 'Medellin', 5),
(611, 'Momil', 5),
(612, 'Montebello', 5),
(613, 'Montelibano', 5),
(614, 'Monteria', 5),
(615, 'Moñitos', 5),
(616, 'Murindo', 5),
(617, 'Mutata', 5),
(618, 'Nariño', 5),
(619, 'Nechi', 5),
(620, 'Necocli', 5),
(621, 'Neira', 5),
(622, 'Norcasia', 5),
(623, 'Olaya', 5),
(624, 'Pacora', 5),
(625, 'Palestina', 5),
(626, 'Pensilvania', 5),
(627, 'Peñol', 5),
(628, 'Peque', 5),
(629, 'Planeta Rica', 5),
(630, 'Pueblo Nuevo', 5),
(631, 'Pueblorrico', 5),
(632, 'Puerto Berrio', 5),
(633, 'Puerto Escondido', 5),
(634, 'Puerto Libertador', 5),
(635, 'Puerto Nare (La Magdalena)', 5),
(636, 'Puerto Triunfo', 5),
(637, 'Purisima', 5),
(638, 'Remedios', 5),
(639, 'Retiro', 5),
(640, 'Rionegro', 5),
(641, 'Riosucio', 5),
(642, 'Risaralda', 5),
(643, 'Sabanalarga', 5),
(644, 'Sabaneta', 5),
(645, 'Sahagun', 5),
(646, 'Salamina', 5),
(647, 'Salgar', 5),
(648, 'Samana', 5),
(649, 'San Andres', 5),
(650, 'San Andres Sotavento', 5),
(651, 'San Antero', 5),
(652, 'San Bernardo Del Viento', 5),
(653, 'San Carlos', 5),
(654, 'San Carlos', 5),
(655, 'San Francisco', 5),
(656, 'San Jeronimo', 5),
(657, 'San Jose', 5),
(658, 'San Jose De La Montaña', 5),
(659, 'San Juan De Uraba', 5),
(660, 'San Luis', 5),
(661, 'San Pedro', 5),
(662, 'San Pedro De Uraba', 5),
(663, 'San Pelayo', 5),
(664, 'San Rafael', 5),
(665, 'San Roque', 5),
(666, 'San Vicente', 5),
(667, 'Santa Barbara', 5),
(668, 'Santa Rosa De Osos', 5),
(669, 'Santo Domingo', 5),
(670, 'Santuario', 5),
(671, 'Segovia', 5),
(672, 'Sonson', 5),
(673, 'Sopetran', 5),
(674, 'Supia', 5),
(675, 'Tamesis', 5),
(676, 'Taraza', 5),
(677, 'Tarso', 5),
(678, 'Tierralta', 5),
(679, 'Titiribi', 5),
(680, 'Toledo', 5),
(681, 'Turbo', 5),
(682, 'Uramita', 5),
(683, 'Urrao', 5),
(684, 'Valdivia', 5),
(685, 'Valencia', 5),
(686, 'Valparaiso', 5),
(687, 'Vegachi', 5),
(688, 'Venecia', 5),
(689, 'Victoria', 5),
(690, 'Vigia Del Fuerte', 5),
(691, 'Villamaria', 5),
(692, 'Viterbo', 5),
(693, 'Yali', 5),
(694, 'Yarumal', 5),
(695, 'Yolombo', 5),
(696, 'Yondo', 5),
(697, 'Zaragoza', 5),
(698, 'Bogotá', 6),
(699, 'Bojacá', 6),
(700, 'Chía', 6),
(701, 'Chocontá', 6),
(702, 'Cogua', 6),
(703, 'Cota', 6),
(704, 'Cucunubá', 6),
(705, 'El Rosal', 6),
(706, 'Facatativá', 6),
(707, 'Funza', 6),
(708, 'Gachancipá', 6),
(709, 'Guasca', 6),
(710, 'Guatavita', 6),
(711, 'Junín', 6),
(712, 'La Calera ', 6),
(713, 'Madrid', 6),
(714, 'Mosquera', 6),
(715, 'Nemocón', 6),
(716, 'Sesquilé', 6),
(717, 'Sibaté', 6),
(718, 'Soacha', 6),
(719, 'Sopó', 6),
(720, 'Subachoque', 6),
(721, 'Suesca', 6),
(722, 'Tabio', 6),
(723, 'Tausa', 6),
(724, 'Tenjo', 6),
(725, 'Tocancipá', 6),
(726, 'Ubaté', 6),
(727, 'Villapinzó', 6),
(728, 'Zipacón', 6),
(729, 'Zipaquirá', 6),
(730, 'Acevedo', 7),
(731, 'Agrado', 7),
(732, 'Aipe', 7),
(733, 'Algeciras', 7),
(734, 'Altamira', 7),
(735, 'Baraya', 7),
(736, 'Campoalegre', 7),
(737, 'Colombia', 7),
(738, 'Elias', 7),
(739, 'Garzon', 7),
(740, 'Gigante', 7),
(741, 'Guadalupe', 7),
(742, 'Hobo', 7),
(743, 'Iquira', 7),
(744, 'Isnos (San Jose De Isnos)', 7),
(745, 'La Argentina', 7),
(746, 'La Plata', 7),
(747, 'Nataga', 7),
(748, 'Neiva', 7),
(749, 'Oporapa', 7),
(750, 'Paicol', 7),
(751, 'Palermo', 7),
(752, 'Palestina', 7),
(753, 'Pital', 7),
(754, 'Pitalito', 7),
(755, 'Rivera', 7),
(756, 'Saladoblanco', 7),
(757, 'San Agustin', 7),
(758, 'Santa Maria', 7),
(759, 'Suaza', 7),
(760, 'Tarqui', 7),
(761, 'Tello', 7),
(762, 'Teruel', 7),
(763, 'Tesalia', 7),
(764, 'Timana', 7),
(765, 'Villavieja', 7),
(766, 'Yaguara', 7),
(767, 'Alban (San Jose)', 8),
(768, 'Aldana', 8),
(769, 'Almaguer', 8),
(770, 'Ancuya', 8),
(771, 'Arboleda (Berruecos)', 8),
(772, 'Argelia', 8),
(773, 'Balboa', 8),
(774, 'Barbacoas', 8),
(775, 'Belen', 8),
(776, 'Bolivar', 8),
(777, 'Buenos Aires', 8),
(778, 'Buesaco', 8),
(779, 'Cajibio', 8),
(780, 'Caldono', 8),
(781, 'Caloto', 8),
(782, 'Chachagui', 8),
(783, 'Colon (Genova)', 8),
(784, 'Consaca', 8),
(785, 'Contadero', 8),
(786, 'Cordoba', 8),
(787, 'Corinto', 8),
(788, 'Cuaspud (Carlosama)', 8),
(789, 'Cumbal', 8),
(790, 'Cumbitara', 8),
(791, 'El Charco', 8),
(792, 'El Peñol', 8),
(793, 'El Rosario', 8),
(794, 'El Tablon', 8),
(795, 'El Tambo', 8),
(796, 'El Tambo', 8),
(797, 'Florencia', 8),
(798, 'Francisco Pizarro (Salahonda)', 8),
(799, 'Funes', 8),
(800, 'Guachucal', 8),
(801, 'Guaitarilla', 8),
(802, 'Gualmatan', 8),
(803, 'Guapi', 8),
(804, 'Iles', 8),
(805, 'Imues', 8),
(806, 'Inza', 8),
(807, 'Ipiales', 8),
(808, 'Jambalo', 8),
(809, 'La Cruz', 8),
(810, 'La Florida', 8),
(811, 'La Llanada', 8),
(812, 'La Sierra', 8),
(813, 'La Tola', 8),
(814, 'La Union', 8),
(815, 'La Vega', 8),
(816, 'Leiva', 8),
(817, 'Linares', 8),
(818, 'Lopez (Micay)', 8),
(819, 'Los Andes (Sotomayor)', 8),
(820, 'Magui (Payan)', 8),
(821, 'Mallama (Piedrancha)', 8),
(822, 'Mercaderes', 8),
(823, 'Miranda', 8),
(824, 'Morales', 8),
(825, 'Mosquera', 8),
(826, 'Olaya Herrera (Bocas De Satinga)', 8),
(827, 'Ospina', 8),
(828, 'Padilla', 8),
(829, 'Paez (Belalcazar)', 8),
(830, 'Pasto (San Juan De Pasto)', 8),
(831, 'Patia (El Bordo)', 8),
(832, 'Piamonte', 8),
(833, 'Piendamo', 8),
(834, 'Policarpa', 8),
(835, 'Popayan', 8),
(836, 'Potosi', 8),
(837, 'Providencia', 8),
(838, 'Puerres', 8),
(839, 'Puerto Tejada', 8),
(840, 'Pupiales', 8),
(841, 'Purace (Coconuco)', 8),
(842, 'Ricaurte', 8),
(843, 'Roberto Payan (San Jose)', 8),
(844, 'Rosas', 8),
(845, 'Samaniego', 8),
(846, 'San Bernardo', 8),
(847, 'San Lorenzo', 8),
(848, 'San Pablo', 8),
(849, 'San Pedro De Cartago', 8),
(850, 'San Sebastian', 8),
(851, 'Sandona', 8),
(852, 'Santa Barbara (Iscuande)', 8),
(853, 'Santa Cruz (Guachaves)', 8),
(854, 'Santa Rosa', 8),
(855, 'Santander De Quilichao', 8),
(856, 'Sapuyes', 8),
(857, 'Silvia', 8),
(858, 'Sotara (Paispamba)', 8),
(859, 'Suarez', 8),
(860, 'Taminango', 8),
(861, 'Tangua', 8),
(862, 'Timbio', 8),
(863, 'Timbiqui', 8),
(864, 'Toribio', 8),
(865, 'Totoro', 8),
(866, 'Tumaco', 8),
(867, 'Tuquerres', 8),
(868, 'Villarica', 8),
(869, 'Yacuanquer', 8),
(870, 'Aguada', 9),
(871, 'Albania', 9),
(872, 'Aratoca', 9),
(873, 'Barbosa', 9),
(874, 'Barichara', 9),
(875, 'Barrancabermeja', 9),
(876, 'Betulia', 9),
(877, 'Bolivar', 9),
(878, 'Bucaramanga', 9),
(879, 'Cabrera', 9),
(880, 'California', 9),
(881, 'Capitanejo', 9),
(882, 'Carcasi', 9),
(883, 'Cepita', 9),
(884, 'Cerrito', 9),
(885, 'Charala', 9),
(886, 'Charta', 9),
(887, 'Chima', 9),
(888, 'Chipata', 9),
(889, 'Cimitarra', 9),
(890, 'Concepcion', 9),
(891, 'Confines', 9),
(892, 'Contratacion', 9),
(893, 'Coromoro', 9),
(894, 'Curiti', 9),
(895, 'El Carmen De Chucury', 9),
(896, 'El Guacamayo', 9),
(897, 'El Peñon', 9),
(898, 'El Playon', 9),
(899, 'Encino', 9),
(900, 'Enciso', 9),
(901, 'Florian', 9),
(902, 'Floridablanca', 9),
(903, 'Galan', 9),
(904, 'Gambita', 9),
(905, 'Giron', 9),
(906, 'Guaca', 9),
(907, 'Guadalupe', 9),
(908, 'Guapota', 9),
(909, 'Guavata', 9),
(910, 'Guepsa', 9),
(911, 'Hato', 9),
(912, 'Jesus Maria', 9),
(913, 'Jordan', 9),
(914, 'La Belleza', 9),
(915, 'La Paz', 9),
(916, 'Landazuri', 9),
(917, 'Lebrija', 9),
(918, 'Los Santos', 9),
(919, 'Macaravita', 9),
(920, 'Malaga', 9),
(921, 'Matanza', 9),
(922, 'Mogotes', 9),
(923, 'Molagavita', 9),
(924, 'Ocamonte', 9),
(925, 'Oiba', 9),
(926, 'Onzaga', 9),
(927, 'Palmar', 9),
(928, 'Palmas Del Socorro', 9),
(929, 'Paramo', 9),
(930, 'Piedecuesta', 9),
(931, 'Pinchote', 9),
(932, 'Puente Nacional', 9),
(933, 'Puerto Parra', 9),
(934, 'Puerto Wilches', 9),
(935, 'Rionegro', 9),
(936, 'Sabana De Torres', 9),
(937, 'San Andres', 9),
(938, 'San Benito', 9),
(939, 'San Gil', 9),
(940, 'San Joaquin', 9),
(941, 'San Jose De Miranda', 9),
(942, 'San Miguel', 9),
(943, 'San Vicente De Chucuri', 9),
(944, 'Santa Barbara', 9),
(945, 'Santa Helena Del Opon', 9),
(946, 'Simacota', 9),
(947, 'Socorro', 9),
(948, 'Suaita', 9),
(949, 'Sucre', 9),
(950, 'Surata', 9),
(951, 'Tona', 9),
(952, 'Valle San Jose', 9),
(953, 'Velez', 9),
(954, 'Vetas', 9),
(955, 'Villanueva', 9),
(956, 'Zapatoca', 9),
(957, 'Acacias', 10),
(958, 'Aguazul', 10),
(959, 'Arauca', 10),
(960, 'Arauquita', 10),
(961, 'Barranca De Upia', 10),
(962, 'Cabuyaro', 10),
(963, 'Castilla La Nueva', 10),
(964, 'Chameza', 10),
(965, 'Cravo Norte', 10),
(966, 'Cumaral', 10),
(967, 'Cumaribo', 10),
(968, 'El Calvario', 10),
(969, 'El Castillo', 10),
(970, 'El Dorado', 10),
(971, 'Fortul', 10),
(972, 'Fuente De Oro', 10),
(973, 'Granada', 10),
(974, 'Guamal', 10),
(975, 'Hato Corozal', 10),
(976, 'La Macarena', 10),
(977, 'La Primavera', 10),
(978, 'La Salina', 10),
(979, 'La Uribe', 10),
(980, 'Lejanias', 10),
(981, 'Mani', 10),
(982, 'Mapiripan', 10),
(983, 'Mesetas', 10),
(984, 'Monterrey', 10),
(985, 'Nunchia', 10),
(986, 'Orocue', 10),
(987, 'Paz De Ariporo', 10),
(988, 'Pore', 10),
(989, 'Puerto Carreño', 10),
(990, 'Puerto Concordia', 10),
(991, 'Puerto Gaitan', 10),
(992, 'Puerto Lleras', 10),
(993, 'Puerto Lopez', 10),
(994, 'Puerto Rico', 10),
(995, 'Puerto Rondon', 10),
(996, 'Recetor', 10),
(997, 'Restrepo', 10),
(998, 'Sabanalarga', 10),
(999, 'Sacama', 10),
(1000, 'San  Juan De Arama', 10),
(1001, 'San Carlos De Guaroa', 10),
(1002, 'San Jose De Ocune', 10),
(1003, 'San Juanito', 10),
(1004, 'San Luis De Cubarral', 10),
(1005, 'San Luis De Palenque', 10),
(1006, 'San Martin', 10),
(1007, 'Santa Rita', 10),
(1008, 'Santa Rosalia', 10),
(1009, 'Saravena', 10),
(1010, 'Tamara', 10),
(1011, 'Tame', 10),
(1012, 'Tauramena', 10),
(1013, 'Trinidad', 10),
(1014, 'Villanueva', 10),
(1015, 'Villavicencio', 10),
(1016, 'Vistahermosa', 10),
(1017, 'Yopal', 10),
(1018, 'Espinal', 10);

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
(3, 'Lidcundiboyaca'),
(4, 'Lidflores'),
(5, 'Lidnarcaucahuila'),
(6, 'Representante'),
(7, 'Promotor');

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
('aavendano', 'Alvaro Avendaño Mora', 'Duwest01*', 9, 7),
('acortes', 'Ana Maria Cortes Amaya', 'Duwest01*', 6, 6),
('agamboa', 'Antonio Gamboa', 'Duwest01*', 6, 6),
('ahernandez', 'Alberto Hernandez Anaya', 'Duwest01*', 9, 7),
('alargacha', 'Andres Largacha', 'Duwest01*', 6, 4),
('anunez', 'Argemiro Nuñez Romero', 'Duwest01*', 4, 6),
('apacheco', 'Armando Javier Pacheco', 'Duwest01*', 1, 6),
('arodriguez', 'Julieth Andrea Rodriguez Pardo', 'Duwest01*', 6, 6),
('bmora', 'Blas Mauricio Mora Ubaque', 'Duwest01*', 3, 7),
('caraque', 'Carlos Araque', 'Duwest01*', 9, 7),
('cpedraza', 'Carlos Enrique Pedraza Dueñas', 'Duwest01*', 2, 6),
('dcardona', 'Daniel Cardona', 'Duwest01*', 4, 6),
('dchavez', 'Dario Ricardo Chavez Burbano', 'Duwest01*', 8, 7),
('dmatiz', 'Diego Alfonso Matiz Barbosa', 'Duwest01*', 3, 7),
('dperdomo', 'Diego Perdomo Rojas', 'Duwest01*', 10, 6),
('dsilva', 'Doris Silva', 'Duwest01*', 10, 6),
('dzambrano', 'david zambrano', 'Cota$8193*', 1, 1),
('eyepez', 'Edison Antonio Yepez Mena', 'Duwest01*', 8, 7),
('gmarentes', 'Gloria Yaneth Marentes Prada', 'Duwest01*', 3, 6),
('gmontealegre', 'Gilmar Smith Montealegre Dussan', 'Duwest01*', 8, 7),
('jbarajas', 'Jairo Edimer Barajas Ortiz', 'Duwest01*', 10, 6),
('jluna', 'Jenny Zuliette Luna Jara', 'Duwest01*', 3, 7),
('jluque', 'Juan Luque', 'Duwest01*', 6, 6),
('jrubio', 'Jeferson Mauricio Rubio Romero', 'Duwest01*', 10, 6),
('jvalencia', 'Jorge Hernán Valencia', 'Duwest01*', 4, 6),
('jvillamil', 'Juan Pablo Villamil Camargo', 'Duwest01*', 2, 6),
('lbolanos', 'Luis Gerardo Bolaños Rodriguez', 'Duwest01*', 8, 7),
('lcarmona', 'Luz Andrea Carmona Valencia', 'Duwest01*', 4, 7),
('lrodriguez', 'Narda Lorena Rodriguez Cohecha', 'Duwest01*', 10, 6),
('mdiaz', 'Maria Fernanda Diaz', 'Duwest01*', 10, 6),
('mmena', 'Manuel Mena', 'Duwest01*', 1, 7),
('mserna', 'Mauricio Arnoby Serna Pelaez', 'Duwest01*', 1, 6),
('ncardona', 'Yensi Natalia Cardona Muñoz', 'Duwest01*', 4, 6),
('omendez', 'Oscar Mendez', 'Duwest01*', 7, 6),
('ovanegas', 'Oscar Ivan Vanegas Castellanos', 'Duwest01*', 2, 7),
('pcharry', 'Paola Charry', 'Duwest01*', 3, 3),
('plopez', 'Paula Andrea Lopez Ramirez', 'Duwest01*', 5, 6),
('ravila', 'Ricardo Alonso Avila Avila', 'Duwest01*', 1, 6),
('rticora', 'Rene Albert Ticora Lozano', 'Duwest01*', 3, 7),
('rvelasquez', 'Raul Mauricio Velasquez Londoño', 'Duwest01*', 3, 6),
('scastro', 'Sebastian Castro Garcia', 'Duwest01*', 5, 7),
('wbarreto', 'Wilson Alcides Barreto Farfan', 'Duwest01*', 3, 7),
('wcruz', 'Wilmer Herney Cruz Ausecha', 'Duwest01*', 4, 6),
('wnova', 'Wilmar Alfonso Nova Castellanos', 'Duwest01*', 2, 7),
('ylopez', 'Yeiler Canicio López Graciano', 'Duwest01*', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_visita` date NOT NULL,
  `sitzona_visita` varchar(100) NOT NULL,
  `sitcompetencia_visita` varchar(100) NOT NULL,
  `rvisita_visita` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `visita_ibfk_2` (`id_cliente`),
  KEY `visita_ibfk_1` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id_visita`, `fecha_visita`, `sitzona_visita`, `sitcompetencia_visita`, `rvisita_visita`, `id_usuario`, `id_cliente`) VALUES
(1, '2016-09-27', 'Pocas lluvias', 'NA', 'aplicaciÃ³n de cultivo papa.', 'jluna', '14789633'),
(3, '2016-09-27', 'NA', 'NA', 'NA', 'jluna', '14789633');

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
(1, 'Antioquia'),
(2, 'Boyaca'),
(3, 'Cundinamarca'),
(4, 'Eje Cafetero'),
(5, 'Flores Antioquia'),
(6, 'Flores Sabana'),
(7, 'Huila'),
(8, 'Nariño_Cauca'),
(9, 'Santander'),
(10, 'Tolima_Llanos');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_calificacion`
--
ALTER TABLE `cliente_calificacion`
  ADD CONSTRAINT `cliente_calificacion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `cliente_calificacion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `cliente_cultivo`
--
ALTER TABLE `cliente_cultivo`
  ADD CONSTRAINT `cliente_cultivo_ibfk_2` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  ADD CONSTRAINT `cliente_cultivo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `cliente_municipio`
--
ALTER TABLE `cliente_municipio`
  ADD CONSTRAINT `cliente_municipio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `cliente_municipio_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cliente_municipio_ibfk_3` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `cliente_zona`
--
ALTER TABLE `cliente_zona`
  ADD CONSTRAINT `cliente_zona_ibfk_2` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `cliente_zona_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `potencialbiologico`
--
ALTER TABLE `potencialbiologico`
  ADD CONSTRAINT `potencialbiologico_ibfk_3` FOREIGN KEY (`id_cultivo`) REFERENCES `cultivo` (`id_cultivo`),
  ADD CONSTRAINT `potencialbiologico_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `potencialbiologico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
