-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-12-2018 a las 15:41:00
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id7097095_kali`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_sancionado`
--

CREATE TABLE `alumno_sancionado` (
  `id_alumno_sancion` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `id_sancion` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_usuario_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `carrera` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `carrera`) VALUES
(20121, 'ARQUITECTURA'),
(20226, 'DISEÑO GRAFICO'),
(20321, 'ACTUARIA'),
(20411, 'RELAC. INTERNACIONALES (SUA)'),
(20421, 'RELACIONES INTERNACIONALES'),
(20422, 'CIENCIAS POLITICAS Y ADMON. PUBLICAS'),
(20423, 'SOCIOLOGIA'),
(20424, 'PERIODISMO Y COMUNICACION COLECTIVA'),
(20425, 'COMUNICACION'),
(20711, 'DERECHO (SUA)'),
(20721, 'DERECHO'),
(20821, 'ECONOMIA'),
(21011, 'FILOSOFIA'),
(21013, 'LENGUA Y LITERATURA HISPANICAS '),
(21021, 'HISTORIA'),
(21025, 'PEDAGOGIA'),
(21121, 'INGENIERIA CIVIL (PLAN ANTERIOR)'),
(21122, 'INGENIERIA CIVIL (PLAN NUEVO)'),
(24021, 'MAT. APLICADAS Y COMP. (PLAN ANTERIOR)'),
(24022, 'MAT. APLICADAS Y COMP. (PLAN NUEVO)'),
(24121, 'ENSEÑANZA DE INGLES'),
(24321, 'LICENCIATURA EN ENSEÑANZA DE LENGUAS'),
(24322, 'LICENCIATURA EN ENSEÑANZA DE LENGUAS(SUA)'),
(24323, 'ENSEÑANZA DE FRANCES(LENG EXTRANJERA)SUA'),
(24324, 'ENSEÑANZA DE INGLES (LENG EXTRANJERA)SUA'),
(24325, 'ENSEÑANZA DE ITALIANO(LENG EXTRANJ.) SUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `curso` varchar(250) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`, `fecha_registro`) VALUES
(1, 'Python', '2015-11-26 20:00:14'),
(2, 'Excel Avanzado', '2018-04-17 19:07:37'),
(3, 'JAVA para Web', '2018-04-17 19:08:07'),
(4, 'Induccion Cedetec', '2018-04-23 19:36:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_curso`
--

CREATE TABLE `periodo_curso` (
  `id_periodo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `estatus` enum('true','false') NOT NULL DEFAULT 'true',
  `cupo` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `periodo` varchar(11) NOT NULL,
  `id_profesores` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `horario` varchar(64) DEFAULT NULL,
  `ubicacion` varchar(64) DEFAULT NULL,
  `hora` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo_curso`
--

INSERT INTO `periodo_curso` (`id_periodo`, `id_curso`, `estatus`, `cupo`, `fecha_registro`, `periodo`, `id_profesores`, `fecha_inicio`, `fecha_fin`, `horario`, `ubicacion`, `hora`) VALUES
(6, 2, 'true', 22, '2018-11-09 20:46:23', '2019-2', 1, '2018-08-29', '2018-10-03', 'lunes', 'pcnet4', '9am'),
(7, 1, 'true', 20, '2018-09-30 15:26:12', '2019-1', 1, '2018-09-03', '2018-09-27', 'sabado', 'pcnet1', '9am'),
(8, 4, 'true', 24, '2018-11-05 21:13:24', '2019-2', 1, '2018-08-27', '2018-09-28', 'sabados', ' ubicacion ', '9am'),
(13, 1, 'true', 30, '2018-11-05 21:13:29', '2019-2', 1, '2018-08-27', '2018-09-28', 'sabados', ' pcnet25', '9am'),
(14, 3, 'true', 55, '2018-11-05 21:46:24', '2019-2', 1, '2018-08-27', '2018-09-28', 'sabados y lunes', 'pcnet1', '9am'),
(19, 2, 'false', 22, '2018-11-05 21:13:58', '2019-2', 1, '2018-10-01', '2018-10-31', 'sabados', ' pcnet3 ', '9am a 2 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesores` int(11) NOT NULL,
  `nombre_prof` varchar(255) NOT NULL,
  `ap_p_prof` varchar(255) NOT NULL,
  `ap_m_prof` varchar(255) DEFAULT NULL,
  `telefono` bigint(25) NOT NULL,
  `correo_prof` varchar(30) DEFAULT NULL,
  `procedencia` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesores`, `nombre_prof`, `ap_p_prof`, `ap_m_prof`, `telefono`, `correo_prof`, `procedencia`, `fecha_registro`) VALUES
(1, 'Juan ', 'Perez', 'Perez', 5512345678, 'profesor@gmail.com', 'UNAM', '2018-08-29 19:58:59'),
(2, 'pedro', 'Perez', 'Perez', 5512345678, 'profesor@gmail.com', 'fes acatlan', '2018-08-29 19:58:59'),
(3, 'dsfdsf', 'asd', 'asd', 0, 'sad', 'asd', '2018-11-05 22:28:35'),
(4, 'and', 'reyes', 'asd', 432432432, 'sad', 'aragon', '2018-11-05 22:29:10'),
(5, 'and', 'reyes', 'asd', 432432432, 'sad', 'aragon', '2018-11-05 22:31:59'),
(6, 'and', 'reyes', 'asd', 432432432, 'sad', 'aragon', '2018-11-05 22:33:35'),
(7, 'dfg', 'fdfdg', 'fdgdfg', 0, 'sad', 'dfg', '2018-11-05 22:36:52'),
(8, 'daniel', 'fdfdg', 'dfg', 0, 'sad@gmaiil.com', 'fdg', '2018-11-05 22:46:12'),
(9, 'daniel', 'fdfdg', 'dfg', 0, 'sad@gmaiil.com', 'iztacala', '2018-11-05 22:48:08'),
(10, 'daniel', 'fdfdg', 'dfg', 0, 'sad@gmaiil.com', 'iztacala2', '2018-11-05 22:49:31'),
(11, 'daniel', 'fdfdg', 'dfg', 0, 'sad@gmaiil.com', 'iztacala22', '2018-11-05 22:52:01'),
(12, 'afdaf', 'fdfdg', 'dfg', 0, 'sad@gmaiil.com', 'iztacala22', '2018-11-05 22:55:40'),
(14, 'asd', 'asd', 'asd', 1233133113313, 'asdas@dfdfg.fdg', 'asd', '2018-11-05 22:56:51'),
(15, 'dsf', 'asd', 'asd', 0, 'asdas@dfdfg.fdg', 'asd', '2018-11-05 22:59:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE `sanciones` (
  `id_sancion` int(11) NOT NULL,
  `sancion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_username` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `apellido_p` varchar(30) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `apellido_m` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_password` varchar(70) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_username`, `nombre`, `apellido_p`, `apellido_m`, `user_mail`, `user_password`) VALUES
(1, 'admin', 'damin', 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cuenta` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(70) NOT NULL,
  `apellido_materno` varchar(70) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo` char(1) NOT NULL COMMENT 'C=Cedetec,A=Acatlan,E=Externo',
  `area` varchar(10) DEFAULT NULL COMMENT 'DSC,DSI,Redes,Cursos',
  `categoria` varchar(15) DEFAULT NULL COMMENT 'Trabajador,SS,Hono,Apoyo',
  `detalle_externo` varchar(100) DEFAULT NULL,
  `adscripcion` varchar(100) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_carrera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cuenta`, `curp`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo`, `tipo`, `area`, `categoria`, `detalle_externo`, `adscripcion`, `fecha_registro`, `id_carrera`) VALUES
(17, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-09-30 15:27:13', 20121),
(18, 414090912, 'SAMD950123HMNNLN12', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-09-30 17:08:41', 21013),
(19, 414090912, 'SAMD950123HMNNLN07', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-05 21:55:32', 20121),
(20, 414090912, 'SAMD950123HMNNLN09', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-05 21:55:46', 20121),
(21, 414090912, 'SAMD950123HMNNLN11', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-05 21:56:11', 20121),
(22, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-19 19:44:18', 20121),
(23, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 18:14:43', 20121),
(24, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 18:17:55', 20121),
(25, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 18:18:02', 20121),
(26, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 18:18:36', 20121),
(27, 414040414, 'SAMD950123HMNNLN20', 'dani', 'dani', 'leon', 'leon@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 18:19:54', 20421),
(28, 435435435, 'SAMD950123HMNNLN21', 'dfgd', 'dfg', 'dfg', 'abc@gg.com', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 18:24:02', 21025),
(29, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 18:26:00', 0),
(30, 324324233, 'SAMD950123HMNNLN90', '2sdf', 'sdf', '', 'sdf@hhh.mx', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 18:27:22', 20121),
(31, 324234324, 'SAMD950123HMNNLN25', 'dsf', 'sdf', 'sdf', 'asd@asd.as', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 18:33:21', 20821),
(32, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 18:58:49', 21021),
(33, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 19:16:01', 21021),
(34, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 19:50:33', 20121),
(35, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 19:50:49', 20121),
(36, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 19:51:12', 20121),
(37, 414090912, 'SAMD950123HMNNLN06', 'dan', 'san', 'mau', 'mau@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 19:51:22', 20121),
(38, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:06:52', 21021),
(39, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:07:03', 21021),
(40, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:07:55', 21021),
(41, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:09:04', 21021),
(42, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:09:14', 21021),
(43, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:10:13', 21021),
(44, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:11:49', 21021),
(45, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:12:06', 21021),
(46, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:12:22', 21021),
(47, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:16:03', 21021),
(48, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:17:33', 21021),
(49, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:18:26', 21021),
(50, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:18:42', 21021),
(51, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:19:24', 21021),
(52, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:25:17', 21021),
(53, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:25:47', 21021),
(54, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:26:56', 21021),
(55, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:27:34', 21021),
(56, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 20:36:27', 24022),
(57, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:36:54', 21021),
(58, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 20:37:05', 24022),
(59, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:44:49', 21021),
(60, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:45:06', 21021),
(61, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:45:17', 21021),
(62, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:45:57', 21021),
(63, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:46:15', 21021),
(64, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:46:52', 21021),
(65, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 20:47:05', 24022),
(66, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 20:47:23', 24022),
(67, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:48:21', 21021),
(68, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:48:47', 21021),
(69, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:49:17', 21021),
(70, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 20:51:59', 21021),
(71, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 20:52:11', 24022),
(72, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:17:55', 21021),
(73, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:18:13', 21021),
(74, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 21:18:28', 24022),
(75, 414090912, 'SAMD950123HMNNLN10', 'daniel', 'sanchez', 'mauleon', 'mauleon23s@gmail.com', '1', 'DSI', 'Servicio', '', '', '2018-10-22 21:18:39', 24022),
(76, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:21:50', 21021),
(77, 213123121, 'SAMD950123HMNNLN45', 'as', 'sff', 'afsdsdf', 'asd@asd.as', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:22:27', 21011),
(78, 213123121, 'SAMD950123HMNNLN45', 'as', 'sff', 'afsdsdf', 'asd@asd.as', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:23:25', 21011),
(79, 213123121, 'SAMD950123HMNNLN45', 'as', 'sff', 'afsdsdf', 'asd@asd.as', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:25:00', 21011),
(80, 213123121, 'SAMD950123HMNNLN45', 'as', 'sff', 'afsdsdf', 'asd@asd.as', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:25:26', 21011),
(81, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:25:35', 21021),
(82, 213123121, 'SAMD950123HMNNLN45', 'as', 'sff', 'afsdsdf', 'asd@asd.as', '1', 'Redes', 'Trabajador', '', '', '2018-10-22 21:25:49', 21011),
(83, 324234324, 'SAMD950123HMNNLN88', '3sdf', 'sdf', 'ds', 'ppp@ppp.ppp', '1', 'Redes', 'Trabajador', '', '', '2018-10-26 04:33:17', 21021);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_curso`
--

CREATE TABLE `usuario_curso` (
  `id_usuario_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_curso`
--

INSERT INTO `usuario_curso` (`id_usuario_curso`, `id_usuario`, `calificacion`, `id_periodo`, `fecha_registro`) VALUES
(60, 19, 5, 7, '2018-10-30 00:26:21'),
(61, 20, 5, 7, '2018-11-27 18:09:06'),
(62, 21, 10, 7, '2018-10-05 21:56:11'),
(63, 21, 10, 7, '2018-10-19 19:41:05'),
(65, 31, 10, 7, '2018-10-22 18:33:21'),
(66, 32, 10, 6, '2018-10-22 18:58:49'),
(70, 36, 8.5, 7, '2018-11-05 21:54:38'),
(72, 38, 10, 7, '2018-10-22 20:06:52'),
(75, 41, 8, 7, '2018-11-04 23:29:26'),
(77, 43, 8.5, 7, '2018-10-30 00:26:40'),
(78, 44, 10, 6, '2018-10-22 20:11:49'),
(79, 45, 10, 7, '2018-10-22 20:12:06'),
(80, 46, 8, 6, '2018-11-05 21:53:34'),
(81, 47, 10, 7, '2018-10-22 20:16:03'),
(82, 48, 10, 7, '2018-10-22 20:17:33'),
(83, 49, 10, 7, '2018-10-22 20:18:26'),
(84, 50, 10, 7, '2018-10-22 20:18:42'),
(85, 51, 10, 7, '2018-10-22 20:19:24'),
(86, 52, 7.7, 7, '2018-10-26 03:07:12'),
(87, 53, 10, 7, '2018-10-22 20:25:47'),
(88, 54, 10, 7, '2018-10-22 20:26:56'),
(89, 55, 10, 7, '2018-10-26 16:47:58'),
(90, 56, 10, 6, '2018-10-22 20:36:27'),
(91, 57, 5, 6, '2018-11-27 18:08:35'),
(92, 58, 5.6, 7, '2018-10-30 00:26:51'),
(93, 59, 6.5, 6, '2018-11-03 19:53:36'),
(94, 60, 10, 7, '2018-10-22 20:45:06'),
(96, 62, 10, 7, '2018-10-22 20:45:57'),
(98, 64, 10, 7, '2018-10-22 20:46:52'),
(100, 66, 10, 7, '2018-10-22 20:47:23'),
(104, 70, 10, 7, '2018-10-22 20:51:59'),
(105, 71, 10, 6, '2018-10-22 20:52:11'),
(106, 72, 10, 7, '2018-10-22 21:17:55'),
(107, 73, 5, 6, '2018-11-27 18:08:53'),
(108, 74, 10, 7, '2018-10-22 21:18:28'),
(110, 76, 10, 7, '2018-10-22 21:21:50'),
(111, 77, 10, 7, '2018-10-22 21:22:27'),
(112, 78, 10, 7, '2018-10-22 21:23:25'),
(114, 80, 5, 7, '2018-11-27 18:08:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_sancionado`
--
ALTER TABLE `alumno_sancionado`
  ADD PRIMARY KEY (`id_alumno_sancion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_sancion` (`id_sancion`),
  ADD KEY `id_periodo` (`id_periodo`),
  ADD KEY `id_usuario_curso` (`id_usuario_curso`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `periodo_curso`
--
ALTER TABLE `periodo_curso`
  ADD PRIMARY KEY (`id_periodo`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_profesores` (`id_profesores`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesores`);

--
-- Indices de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD PRIMARY KEY (`id_sancion`),
  ADD UNIQUE KEY `sancion` (`sancion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_curso`
--
ALTER TABLE `usuario_curso`
  ADD PRIMARY KEY (`id_usuario_curso`),
  ADD KEY `id_periodo` (`id_periodo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_sancionado`
--
ALTER TABLE `alumno_sancionado`
  MODIFY `id_alumno_sancion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24326;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `periodo_curso`
--
ALTER TABLE `periodo_curso`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  MODIFY `id_sancion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `usuario_curso`
--
ALTER TABLE `usuario_curso`
  MODIFY `id_usuario_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_sancionado`
--
ALTER TABLE `alumno_sancionado`
  ADD CONSTRAINT `alumno_sancionado_ibfk_2` FOREIGN KEY (`id_sancion`) REFERENCES `sanciones` (`id_sancion`),
  ADD CONSTRAINT `alumno_sancionado_ibfk_3` FOREIGN KEY (`id_usuario_curso`) REFERENCES `usuario_curso` (`id_usuario_curso`);

--
-- Filtros para la tabla `periodo_curso`
--
ALTER TABLE `periodo_curso`
  ADD CONSTRAINT `periodo_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periodo_curso_ibfk_2` FOREIGN KEY (`id_profesores`) REFERENCES `profesores` (`id_profesores`);

--
-- Filtros para la tabla `usuario_curso`
--
ALTER TABLE `usuario_curso`
  ADD CONSTRAINT `usuario_curso_ibfk_2` FOREIGN KEY (`id_periodo`) REFERENCES `periodo_curso` (`id_periodo`),
  ADD CONSTRAINT `usuario_curso_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
