CREATE TABLE IF NOT EXISTS `datos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,/*La longitud puedes cambiarsela por la que quieras*/
  `telefono` int(11) NOT NULL,  /*Este campo solo recibe valores numericos*/
  `direccion` varchar(300) NOT NULL,/*La longitud puedes cambiarsela por la que quieras*/
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;