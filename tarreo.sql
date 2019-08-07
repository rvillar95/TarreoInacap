-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2019 a las 05:17:41
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tarreo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `rutAdministrador` varchar(50) DEFAULT NULL,
  `nombreAdministrador` varchar(50) DEFAULT NULL,
  `apellidoAdministrador` varchar(50) DEFAULT NULL,
  `fotoAdministrador` varchar(50) DEFAULT NULL,
  `claveAdministrador` varchar(50) DEFAULT NULL,
  `estado_idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  KEY `estado_idEstado` (`estado_idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `rutAdministrador`, `nombreAdministrador`, `apellidoAdministrador`, `fotoAdministrador`, `claveAdministrador`, `estado_idEstado`) VALUES
(4, '18.983.058-0', 'Rafael Mauricio', 'Villar Bahamondes', 'perfilrafa.jpeg', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anno_tarreo`
--

CREATE TABLE IF NOT EXISTS `anno_tarreo` (
  `idAnnoT` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAnno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAnnoT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `anno_tarreo`
--

INSERT INTO `anno_tarreo` (`idAnnoT`, `nombreAnno`) VALUES
(2, '2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_equipo`
--

CREATE TABLE IF NOT EXISTS `comentario_equipo` (
  `idtituloComentario_Equipo` int(11) NOT NULL AUTO_INCREMENT,
  `tituloComentario_Equipo` varchar(50) NOT NULL,
  `detalleComentario_Equipo` varchar(1000) NOT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `equipoComentario_Equipo` int(11) NOT NULL,
  `administradorComentario_Equipo` int(11) NOT NULL,
  PRIMARY KEY (`idtituloComentario_Equipo`),
  KEY `administradortituloComentario_Equipo` (`administradorComentario_Equipo`),
  KEY `equipotituloComentario_Equipo` (`equipoComentario_Equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comentario_equipo`
--

INSERT INTO `comentario_equipo` (`idtituloComentario_Equipo`, `tituloComentario_Equipo`, `detalleComentario_Equipo`, `fecha`, `equipoComentario_Equipo`, `administradorComentario_Equipo`) VALUES
(1, 'prueba', 'Vamooos', '', 3, 4),
(2, 'aaa', 'bb', '', 3, 4),
(3, 'jiji', 'ayuwoki', '2019-08-07 04:52:02', 3, 4),
(4, 'jojo', 'ayuwoko', '2019-08-07 00:52:36', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_participante`
--

CREATE TABLE IF NOT EXISTS `detalle_participante` (
  `idDetalleP` int(11) NOT NULL AUTO_INCREMENT,
  `nombreJuegoDetalleP` varchar(45) DEFAULT NULL,
  `nickDetalleP` varchar(50) DEFAULT NULL,
  `rolDetalleP` varchar(50) DEFAULT NULL,
  `linkDetalleP` varchar(200) DEFAULT NULL,
  `participanteDetalleP` int(11) NOT NULL,
  PRIMARY KEY (`idDetalleP`),
  KEY `participante_idParticipante` (`participanteDetalleP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(50) DEFAULT NULL,
  `descripcionEquipo` varchar(50) DEFAULT NULL,
  `fotoEquipo` varchar(50) DEFAULT NULL,
  `integrantesEquipo` int(11) NOT NULL,
  `estadoEquipo` int(11) NOT NULL,
  `capitanEquipo` int(11) NOT NULL,
  `juegoEquipo` int(11) NOT NULL,
  PRIMARY KEY (`idEquipo`),
  KEY `estado_equipo_idEstado_Equipo` (`estadoEquipo`,`capitanEquipo`),
  KEY `participante_idParticipante` (`capitanEquipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idEquipo`, `nombreEquipo`, `descripcionEquipo`, `fotoEquipo`, `integrantesEquipo`, `estadoEquipo`, `capitanEquipo`, `juegoEquipo`) VALUES
(3, 'Equipo 2', 'Somos los mejores', '2019_08_06_23_37_06ekko.jpg', 2, 1, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_participante`
--

CREATE TABLE IF NOT EXISTS `equipo_participante` (
  `idEquipo_Participante` int(11) NOT NULL AUTO_INCREMENT,
  `participanteEquipo` int(11) NOT NULL,
  `teamEquipo` int(11) NOT NULL,
  `estadoEquipo_Participante` varchar(50) NOT NULL,
  PRIMARY KEY (`idEquipo_Participante`),
  KEY `participante_idParticipante` (`participanteEquipo`),
  KEY `equipo_idEquipo` (`teamEquipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `equipo_participante`
--

INSERT INTO `equipo_participante` (`idEquipo_Participante`, `participanteEquipo`, `teamEquipo`, `estadoEquipo_Participante`) VALUES
(5, 6, 3, '3'),
(6, 7, 3, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `nombreEstado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE IF NOT EXISTS `estado_equipo` (
  `idEstadoE` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstadoE` varchar(50) NOT NULL,
  PRIMARY KEY (`idEstadoE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estado_equipo`
--

INSERT INTO `estado_equipo` (`idEstadoE`, `nombreEstadoE`) VALUES
(1, 'En Proceso'),
(2, 'Aprobado'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_participante`
--

CREATE TABLE IF NOT EXISTS `estado_participante` (
  `idEstadoP` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstadoP` varchar(50) NOT NULL,
  PRIMARY KEY (`idEstadoP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estado_participante`
--

INSERT INTO `estado_participante` (`idEstadoP`, `nombreEstadoP`) VALUES
(1, 'Pendiente'),
(2, 'Rechazado'),
(3, 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE IF NOT EXISTS `juegos` (
  `idJuego` int(11) NOT NULL AUTO_INCREMENT,
  `nombreJuego` varchar(50) DEFAULT NULL,
  `descripcionJuego` varchar(1000) DEFAULT NULL,
  `fotoJuego` varchar(100) NOT NULL,
  `postulantesJuego` int(11) DEFAULT NULL,
  `fechaRealizacionJuego` varchar(50) DEFAULT NULL,
  `annoJuego` int(11) DEFAULT NULL,
  `estadoJuego` int(11) NOT NULL,
  `tipoJuego` int(11) NOT NULL,
  PRIMARY KEY (`idJuego`),
  KEY `annoJuego` (`annoJuego`),
  KEY `estadoJuego` (`estadoJuego`),
  KEY `annoJuego_2` (`annoJuego`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`idJuego`, `nombreJuego`, `descripcionJuego`, `fotoJuego`, `postulantesJuego`, `fechaRealizacionJuego`, `annoJuego`, `estadoJuego`, `tipoJuego`) VALUES
(1, 'prueba', 'aaa', '2019_08_06_20_12_49escarlata.png', 0, '2019-08-06 11:30', 2019, 1, 0),
(2, '1', '2', '2019_08_06_20_32_02descarga.jpg', 0, '2019-08-06 04:30', 2019, 1, 0),
(3, 'g', 'h', '2019_08_06_20_33_06camarografo.jpg', 0, '1991-01-24 12', 2019, 1, 0),
(4, 'aaaaa', 'bbbbbbb', '2019_08_06_20_36_20fondo.jpg', 3, '2019-08-06 12:15', 2019, 1, 1),
(5, 'bbbbbbb', 'ccccccccc', '2019_08_06_20_36_52ekko.jpg', 4, '2019-08-06 20:30', 2019, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
  `idParticipante` int(11) NOT NULL AUTO_INCREMENT,
  `rutParticipante` varchar(50) DEFAULT NULL,
  `nombreParticipante` varchar(50) DEFAULT NULL,
  `apellidoParticipante` varchar(50) DEFAULT NULL,
  `correoParticipante` varchar(50) DEFAULT NULL,
  `numeroParticipante` varchar(50) DEFAULT NULL,
  `fotoParticipante` varchar(50) DEFAULT NULL,
  `claveParticipante` varchar(50) DEFAULT NULL,
  `numeroJuegosParticipante` int(11) DEFAULT NULL,
  `estadoParticipante` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParticipante`),
  UNIQUE KEY `rutParticipante` (`rutParticipante`),
  KEY `rutParticipante_2` (`rutParticipante`),
  KEY `estadoParticipante` (`estadoParticipante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`idParticipante`, `rutParticipante`, `nombreParticipante`, `apellidoParticipante`, `correoParticipante`, `numeroParticipante`, `fotoParticipante`, `claveParticipante`, `numeroJuegosParticipante`, `estadoParticipante`) VALUES
(6, '18.983.058-0', 'Rafael', 'Villar', 'rvillar1995@gmail.com', '91621564', '2019_08_06_20_15_27primer-desafio.jpg', '123', 0, 1),
(7, '11.747.170-5', 'Carolina', 'Bahamondes', 'carolina@gmail.com', '91621542', '2019_08_06_20_41_54descarga.jpg', '123', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE IF NOT EXISTS `postulantes` (
  `idPostulantes` int(11) NOT NULL AUTO_INCREMENT,
  `participantePostulante` int(11) NOT NULL,
  `juegoPostulante` int(11) NOT NULL,
  PRIMARY KEY (`idPostulantes`),
  KEY `juegoPostulante` (`juegoPostulante`),
  KEY `participantePostulante` (`participantePostulante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `postulantes`
--

INSERT INTO `postulantes` (`idPostulantes`, `participantePostulante`, `juegoPostulante`) VALUES
(5, 6, 4),
(6, 6, 5),
(7, 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_juego`
--

CREATE TABLE IF NOT EXISTS `tipo_juego` (
  `idTipo_Juego` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipo_Juego` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo_Juego`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_juego`
--

INSERT INTO `tipo_juego` (`idTipo_Juego`, `nombreTipo_Juego`) VALUES
(1, 'Individual'),
(2, 'Equipo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`estado_idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `comentario_equipo`
--
ALTER TABLE `comentario_equipo`
  ADD CONSTRAINT `comentario_equipo_ibfk_1` FOREIGN KEY (`equipoComentario_Equipo`) REFERENCES `equipo` (`idEquipo`),
  ADD CONSTRAINT `comentario_equipo_ibfk_2` FOREIGN KEY (`administradorComentario_Equipo`) REFERENCES `administrador` (`idAdministrador`);

--
-- Filtros para la tabla `detalle_participante`
--
ALTER TABLE `detalle_participante`
  ADD CONSTRAINT `detalle_participante_ibfk_1` FOREIGN KEY (`participanteDetalleP`) REFERENCES `participante` (`idParticipante`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_3` FOREIGN KEY (`estadoEquipo`) REFERENCES `estado_equipo` (`idEstadoE`),
  ADD CONSTRAINT `equipo_ibfk_4` FOREIGN KEY (`capitanEquipo`) REFERENCES `participante` (`idParticipante`);

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_2` FOREIGN KEY (`estadoJuego`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`estadoParticipante`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD CONSTRAINT `postulantes_ibfk_1` FOREIGN KEY (`participantePostulante`) REFERENCES `participante` (`idParticipante`),
  ADD CONSTRAINT `postulantes_ibfk_2` FOREIGN KEY (`juegoPostulante`) REFERENCES `juegos` (`idJuego`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
