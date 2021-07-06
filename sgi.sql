-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 14:12:58
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `accion` varchar(50) DEFAULT NULL,
  `tabla` varchar(30) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `query` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`codigo`, `usuario`, `accion`, `tabla`, `fecha`, `query`) VALUES
(417, 'Admin', 'Insert', 'marca', '2020-11-05 18:20:05', 'INSERT INTO `marca` (`descripcion`) VALUES (\'Marca Fuente\')'),
(418, 'Admin', 'Insert', 'modelo', '2020-11-05 18:20:19', 'INSERT INTO `modelo` (`descripcion`) VALUES (\'Fuente Modelo\')'),
(419, 'Admin', 'Insert', 'Insumo', '2020-11-05 18:20:47', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`) VALUES (\'FUENTE\', \'La fuente tiene una potencia de 450\', \'10\')'),
(420, 'Admin', 'Insert', 'marca_modelo', '2020-11-05 18:20:47', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'9\', \'20\', \'COMPONENTE\')'),
(421, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-05 18:20:47', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (21, \'9\', \'20\')'),
(422, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-05 18:20:47', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (21, \'9\', \'20\')'),
(423, 'Admin', 'Insert', 'Stock', '2020-11-05 18:20:47', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(424, 'Admin', 'Insert', 'insumo_stock', '2020-11-05 18:20:47', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (1, 21)'),
(425, 'Admin', 'Insert', 'marca', '2020-11-05 19:20:35', 'INSERT INTO `marca` (`descripcion`) VALUES (\'Marca telefono\')'),
(426, 'Admin', 'Insert', 'modelo', '2020-11-05 19:20:50', 'INSERT INTO `modelo` (`descripcion`) VALUES (\'modelo telefono\')'),
(427, 'Admin', 'Insert', 'Insumo', '2020-11-05 19:20:37', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `tel_tipo`, `cantidad`, `cantidad_actual`) VALUES (\'TELEFONO\', \'descripcion\', \'1\', \'2\', \'2\')'),
(428, 'Admin', 'Insert', 'marca_modelo', '2020-11-05 19:20:37', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'10\', \'21\', \'TELEFONO\')'),
(429, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-05 19:20:37', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (22, \'10\', \'21\')'),
(430, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-05 19:20:37', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (22, \'10\', \'21\')'),
(431, 'Admin', 'Insert', 'Stock', '2020-11-05 19:20:37', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(432, 'Admin', 'Insert', 'insumo_stock', '2020-11-05 19:20:37', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (2, 22)'),
(433, 'Admin', 'Insert', 'marca', '2020-11-05 19:20:37', 'INSERT INTO `marca` (`descripcion`) VALUES (\'AOC\')'),
(434, 'Admin', 'Insert', 'modelo', '2020-11-05 19:20:52', 'INSERT INTO `modelo` (`descripcion`) VALUES (\'AOC22W\')'),
(435, 'Admin', 'Insert', 'Insumo', '2020-11-05 19:20:07', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `pulgadas`, `cantidad`, `cantidad_actual`) VALUES (\'MONITOR\', \'monitor\', \'22\', \'20\', \'20\')'),
(436, 'Admin', 'Insert', 'marca_modelo', '2020-11-05 19:20:07', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'22\', \'MONITOR\')'),
(437, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-05 19:20:07', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (23, \'11\', \'22\')'),
(438, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-05 19:20:07', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (23, \'11\', \'22\')'),
(439, 'Admin', 'Insert', 'Stock', '2020-11-05 19:20:07', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(440, 'Admin', 'Insert', 'insumo_stock', '2020-11-05 19:20:07', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (3, 23)'),
(441, 'Admin', 'Insert', 'marca', '2020-11-05 19:20:48', 'INSERT INTO `marca` (`descripcion`) VALUES (\'richo\')'),
(442, 'Admin', 'Insert', 'modelo', '2020-11-05 19:20:01', 'INSERT INTO `modelo` (`descripcion`) VALUES (\'MP4002\')'),
(443, 'Admin', 'Insert', 'equipo', '2020-11-05 19:20:57', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'123456789\', \'multi\', \'./assets/dist/img/qr/qr_123456789.png\', \'pepe.mvotma.interno\', \'123456789\')'),
(444, 'Admin', 'Insert', 'marca_modelo', '2020-11-05 19:20:57', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'12\', \'23\', \'IMPRESORA\')'),
(445, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-05 19:20:57', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (28, \'12\', \'23\')'),
(446, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-05 19:20:57', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (28, \'12\', \'23\')'),
(447, 'Admin', 'Insert', 'Stock', '2020-11-05 19:20:57', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(448, 'Admin', 'Insert', 'equipo_stock', '2020-11-05 19:20:57', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (6, 28)'),
(449, 'Admin', 'Insert', 'Equipo', '2020-11-05 19:20:48', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'12345678\', \'compu\', \'./assets/dist/img/qr/qr_12345678.png\', \'lala2.mvotma.interno\', \'\', \'PC\')'),
(450, 'Admin', 'Insert', 'marca_modelo', '2020-11-05 19:20:48', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'22\', \'PC\')'),
(451, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-05 19:20:48', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (29, \'11\', \'22\')'),
(452, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-05 19:20:48', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (29, \'11\', \'22\')'),
(453, 'Admin', 'Insert', 'Stock', '2020-11-05 19:20:48', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(454, 'Admin', 'Insert', 'equipo_stock', '2020-11-05 19:20:48', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (7, 29)'),
(455, 'Admin', 'Insert', 'insumo', '2020-11-06 13:20:30', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `copias`, `cantidad`, `cantidad_actual`) VALUES (\'tonner\', \'toner\', \'5000\', \'5\', \'5\')'),
(456, 'Admin', 'Insert', 'marca_modelo', '2020-11-06 13:20:30', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'12\', \'23\', \'INSUMO\')'),
(457, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-06 13:20:30', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (24, \'12\', \'23\')'),
(458, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-06 13:20:30', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (24, \'12\', \'23\')'),
(459, 'Admin', 'Insert', 'equipo_insumo', '2020-11-06 13:20:30', ''),
(460, 'Admin', 'Insert', 'equipo_insumo', '2020-11-06 13:20:30', 'INSERT INTO `equipo_insumo` (`codigo_equipo`, `codigo_insumo`) VALUES (\'28\', 24)'),
(461, 'Admin', 'Insert', 'Stock', '2020-11-06 13:20:30', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(462, 'Admin', 'Insert', 'insumo_stock', '2020-11-06 13:20:30', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (8, 24)'),
(463, 'Admin', 'Update', 'equipo', '2020-11-09 16:20:52', 'UPDATE `equipo` SET `numero_serie` = \'123456789\', `descripcion` = \'multi\', `qr` = \'./assets/dist/img/qr/IMP_123456789.png\', `host` = \'pepe.mvotma.interno\', `servicio` = \'123456789\'\nWHERE `codigo` = \'28\''),
(464, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-09 16:20:52', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'12\', `codigo_modelo` = \'23\'\nWHERE `codigo_equipo` = \'28\''),
(465, 'Admin', 'Update', 'equipo_proveedor', '2020-11-09 16:20:52', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'12\', `codigo_modelo` = \'23\'\nWHERE `codigo_equipo` = \'28\''),
(466, 'Admin', 'Delete', 'equipo_insumo', '2020-11-09 16:20:08', 'DELETE FROM `equipo_insumo`\nWHERE `codigo_insumo` = \'24\''),
(467, 'Admin', 'Update', 'insumo', '2020-11-09 16:20:08', 'UPDATE `insumo` SET `tipo` = \'tonner\', `descripcion` = \'toner\', `copias` = \'5000\', `cantidad` = \'5\', `qr` = \'./assets/dist/img/qr/INS_21509376.png\'\nWHERE `codigo` = \'24\''),
(468, 'Admin', 'Update', 'marca_modelo', '2020-11-09 16:20:08', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'22\', \'INSUMO\')'),
(469, 'Admin', 'Update', 'insumo_marca_modelo', '2020-11-09 16:20:08', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'24\''),
(470, 'Admin', 'Update', 'insumo_proveedor', '2020-11-09 16:20:08', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'24\''),
(471, 'Admin', 'Update', 'equipo_insumo', '2020-11-09 16:20:08', ''),
(472, 'Admin', 'Update', 'equipo_insumo', '2020-11-09 16:20:08', 'INSERT INTO `equipo_insumo` (`codigo_equipo`, `codigo_insumo`) VALUES (\'29\', \'24\')'),
(473, 'Admin', 'Delete', 'equipo_insumo', '2020-11-09 16:20:54', 'DELETE FROM `equipo_insumo`\nWHERE `codigo_insumo` = \'24\''),
(474, 'Admin', 'Delete', 'equipo_insumo', '2020-11-09 16:20:54', 'DELETE FROM `equipo_insumo`\nWHERE `codigo_insumo` = \'24\''),
(475, 'Admin', 'Update', 'insumo', '2020-11-09 16:20:54', 'UPDATE `insumo` SET `tipo` = \'tonner\', `descripcion` = \'toner\', `copias` = \'5000\', `cantidad` = \'5\', `qr` = \'./assets/dist/img/qr/INS_76341718.png\'\nWHERE `codigo` = \'24\''),
(476, 'Admin', 'Update', 'insumo_marca_modelo', '2020-11-09 16:20:54', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'24\''),
(477, 'Admin', 'Update', 'insumo_proveedor', '2020-11-09 16:20:54', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'24\''),
(478, 'Admin', 'Update', 'Equipo', '2020-11-09 17:20:48', 'UPDATE `equipo` SET `numero_serie` = \'12345678\', `descripcion` = \'compu\', `qr` = \'./assets/dist/img/qr/COM_12345678.png\', `host` = \'lala2.mvotma.interno\', `servicio` = \'\', `tipo` = \'PC\'\nWHERE `codigo` = \'29\''),
(479, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-09 17:20:48', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'29\''),
(480, 'Admin', 'Update', 'equipo_proveedor', '2020-11-09 17:20:48', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'29\''),
(481, 'Admin', 'Insert', 'Insumo', '2020-11-09 17:20:38', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'DISCO\', \'El disco duro es de tipo Solido y tiene una capasidad de 50GB\', \'10\', \'10\', \'./assets/dist/img/qr/HDD_45898547.png\')'),
(482, 'Admin', 'Insert', 'marca_modelo', '2020-11-09 17:20:38', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'22\', \'COMPONENTE\')'),
(483, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-09 17:20:38', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (25, \'11\', \'22\')'),
(484, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-09 17:20:38', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (25, \'11\', \'22\')'),
(485, 'Admin', 'Insert', 'Stock', '2020-11-09 17:20:38', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(486, 'Admin', 'Insert', 'insumo_stock', '2020-11-09 17:20:38', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (9, 25)'),
(487, 'Admin', 'Insert', 'Insumo', '2020-11-09 17:20:38', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `tel_tipo`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'TELEFONO\', \'xfghsdfg sdfg\', \'1\', \'1\', \'1\', \'./assets/dist/img/qr/TEL_95910510.png\')'),
(488, 'Admin', 'Insert', 'marca_modelo', '2020-11-09 17:20:38', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'22\', \'TELEFONO\')'),
(489, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-09 17:20:38', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (26, \'11\', \'22\')'),
(490, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-09 17:20:38', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (26, \'11\', \'22\')'),
(491, 'Admin', 'Insert', 'Stock', '2020-11-09 17:20:38', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(492, 'Admin', 'Insert', 'insumo_stock', '2020-11-09 17:20:38', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (10, 26)'),
(493, 'Admin', 'Insert', 'equipo', '2020-11-09 20:20:11', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'66994411\', \'awserd aqwsde\', \'./assets/dist/img/qr/IMP_66994411.png\', \'lala.mvotma.interno\', \'123456789\')'),
(494, 'Admin', 'Insert', 'marca_modelo', '2020-11-09 20:20:12', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'21\', \'IMPRESORA\')'),
(495, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-09 20:20:12', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (30, \'11\', \'21\')'),
(496, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-09 20:20:12', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (30, \'11\', \'21\')'),
(497, 'Admin', 'Insert', 'Stock', '2020-11-09 20:20:12', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(498, 'Admin', 'Insert', 'equipo_stock', '2020-11-09 20:20:12', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (11, 30)'),
(499, 'Admin', 'Update', 'equipo', '2020-11-09 20:20:33', 'UPDATE `equipo` SET `numero_serie` = \'66994411\', `descripcion` = \'awserd aqwsde\', `qr` = \'./assets/dist/img/qr/IMP_66994411.png\', `host` = \'lala.mvotma.interno\', `servicio` = \'123456789\'\nWHERE `codigo` = \'30\''),
(500, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-09 20:20:33', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'21\'\nWHERE `codigo_equipo` = \'30\''),
(501, 'Admin', 'Update', 'equipo_proveedor', '2020-11-09 20:20:33', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'21\'\nWHERE `codigo_equipo` = \'30\''),
(502, 'Admin', 'Insert', 'equipo', '2020-11-10 14:20:23', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'1234\', \'123\', \'./assets/dist/img/qr/IMP_1234.png\', \'123\', \'123\')'),
(503, 'Admin', 'Insert', 'marca_modelo', '2020-11-10 14:20:23', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'9\', \'21\', \'IMPRESORA\')'),
(504, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-10 14:20:23', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (37, \'9\', \'21\')'),
(505, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-10 14:20:23', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (37, \'9\', \'21\')'),
(506, 'Admin', 'Insert', 'Stock', '2020-11-10 14:20:23', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(507, 'Admin', 'Insert', 'equipo_stock', '2020-11-10 14:20:23', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (12, 37)'),
(508, 'Admin', 'Insert', 'equipo', '2020-11-10 15:20:26', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'121212\', \'121212\', \'./assets/dist/img/qr/IMP_121212.png\', \'121212\', \'121212\')'),
(509, 'Admin', 'Insert', 'marca_modelo', '2020-11-10 15:20:26', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'9\', \'20\', \'IMPRESORA\')'),
(510, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-10 15:20:26', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (38, \'9\', \'20\')'),
(511, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-10 15:20:26', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (38, \'9\', \'20\')'),
(512, 'Admin', 'Insert', 'Stock', '2020-11-10 15:20:26', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(513, 'Admin', 'Insert', 'equipo_stock', '2020-11-10 15:20:26', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (13, 38)'),
(514, 'Admin', 'Insert', 'equipo', '2020-11-10 15:20:37', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'1212\', \'1212\', \'./assets/dist/img/qr/IMP_1212.png\', \'2121\', \'2121\')'),
(515, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-10 15:20:37', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (39, \'11\', \'21\')'),
(516, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-10 15:20:37', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (39, \'11\', \'21\')'),
(517, 'Admin', 'Insert', 'Stock', '2020-11-10 15:20:37', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(518, 'Admin', 'Insert', 'equipo_stock', '2020-11-10 15:20:37', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (14, 39)'),
(519, 'Admin', 'Insert', 'equipo', '2020-11-10 15:20:03', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'55\', \'55\', \'./assets/dist/img/qr/IMP_55.png\', \'55\', \'55\')'),
(520, 'Admin', 'Insert', 'marca_modelo', '2020-11-10 15:20:03', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'10\', \'21\', \'IMPRESORA\')'),
(521, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-10 15:20:03', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (40, \'10\', \'21\')'),
(522, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-10 15:20:03', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (40, \'10\', \'21\')'),
(523, 'Admin', 'Insert', 'Stock', '2020-11-10 15:20:03', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(524, 'Admin', 'Insert', 'equipo_stock', '2020-11-10 15:20:03', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (15, 40)'),
(525, 'Admin', 'Insert', 'equipo', '2020-11-10 15:20:15', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'66\', \'66\', \'./assets/dist/img/qr/IMP_66.png\', \'66\', \'66\')'),
(526, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-10 15:20:15', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (41, \'9\', \'21\')'),
(527, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-10 15:20:15', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (41, \'9\', \'21\')'),
(528, 'Admin', 'Insert', 'Stock', '2020-11-10 15:20:15', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(529, 'Admin', 'Insert', 'equipo_stock', '2020-11-10 15:20:15', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (16, 41)'),
(530, 'Admin', 'Insert', 'equipo', '2020-11-10 16:20:15', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'2\', \'2\', \'./assets/dist/img/qr/IMP_2.png\', \'2\', \'2\')'),
(531, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-10 16:20:15', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (43, \'9\', \'23\')'),
(532, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-10 16:20:15', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (43, \'9\', \'23\')'),
(533, 'Admin', 'Insert', 'Stock', '2020-11-10 16:20:15', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(534, 'Admin', 'Insert', 'equipo_stock', '2020-11-10 16:20:15', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (18, 43)'),
(535, 'Admin', 'Insert', 'Equipo', '2020-11-12 13:20:35', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'123133\', \'132132\', \'./assets/dist/img/qr/IMP_123133.png\', \'321321\', \'321321\', \'PC\')'),
(536, 'Admin', 'Insert', 'marca_modelo', '2020-11-12 13:20:35', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'21\', \'PC\')'),
(537, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-12 13:20:35', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (46, \'11\', \'21\')'),
(538, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-12 13:20:35', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (46, \'11\', \'21\')'),
(539, 'Admin', 'Insert', 'Stock', '2020-11-12 13:20:35', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(540, 'Admin', 'Insert', 'equipo_stock', '2020-11-12 13:20:35', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (19, 46)'),
(541, 'Admin', 'Insert', 'Equipo', '2020-11-12 13:20:44', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'36\', \'36\', \'./assets/dist/img/qr/IMP_36.png\', \'36\', \'36\', \'PC\')'),
(542, 'Admin', 'Insert', 'marca_modelo', '2020-11-12 13:20:44', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'10\', \'23\', \'PC\')'),
(543, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-12 13:20:44', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (47, \'10\', \'23\')'),
(544, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-12 13:20:44', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (47, \'10\', \'23\')'),
(545, 'Admin', 'Insert', 'Stock', '2020-11-12 13:20:44', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(546, 'Admin', 'Insert', 'equipo_stock', '2020-11-12 13:20:45', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (20, 47)'),
(547, 'Admin', 'Delete Logico', 'equipo', '2020-11-12 13:20:58', 'UPDATE `equipo` SET `activo` = 0\nWHERE `codigo` = \'46\''),
(548, 'Admin', 'Delete Logico', 'equipo', '2020-11-12 13:20:05', 'UPDATE `equipo` SET `activo` = 0\nWHERE `codigo` = \'47\''),
(549, 'Admin', 'Insert', 'Equipo', '2020-11-12 13:20:36', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'66\', \'66\', \'./assets/dist/img/qr/COM_66.png\', \'66\', \'66\', \'PC\')'),
(550, 'Admin', 'Insert', 'marca_modelo', '2020-11-12 13:20:36', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'9\', \'21\', \'PC\')'),
(551, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-12 13:20:36', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (48, \'9\', \'21\')'),
(552, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-12 13:20:36', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (48, \'9\', \'21\')'),
(553, 'Admin', 'Insert', 'Stock', '2020-11-12 13:20:36', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(554, 'Admin', 'Insert', 'equipo_stock', '2020-11-12 13:20:36', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (21, 48)'),
(555, 'Admin', 'Insert', 'Equipo', '2020-11-12 13:20:29', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'777\', \'77\', \'./assets/dist/img/qr/COM_777.png\', \'77\', \'77\', \'PC\')'),
(556, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-12 13:20:29', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (50, \'9\', \'20\')'),
(557, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-12 13:20:29', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (50, \'9\', \'20\')'),
(558, 'Admin', 'Insert', 'Stock', '2020-11-12 13:20:29', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(559, 'Admin', 'Insert', 'equipo_stock', '2020-11-12 13:20:29', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (23, 50)'),
(560, 'Admin', 'Update', 'Equipo', '2020-11-12 13:20:37', 'UPDATE `equipo` SET `numero_serie` = \'77777\', `descripcion` = \'77\', `qr` = \'./assets/dist/img/qr/COM_77777.png\', `host` = \'77\', `servicio` = \'77\', `tipo` = \'PC\'\nWHERE `codigo` = \'50\''),
(561, 'Admin', 'Update', 'marca_modelo', '2020-11-12 13:20:37', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'9\', \'22\', \'PC\')'),
(562, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-12 13:20:37', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'9\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'50\''),
(563, 'Admin', 'Update', 'equipo_proveedor', '2020-11-12 13:20:37', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'9\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'50\''),
(564, 'Admin', 'Insert', 'Equipo', '2020-11-13 18:20:10', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'45\', \'45\', \'./assets/dist/img/qr/COM_45.png\', \'45\', \'45\', \'PC\')'),
(565, 'Admin', 'Insert', 'marca_modelo', '2020-11-13 18:20:10', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'11\', \'20\', \'PC\')'),
(566, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-13 18:20:10', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (51, \'11\', \'20\')'),
(567, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-13 18:20:10', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (51, \'11\', \'20\')'),
(568, 'Admin', 'Insert', 'Stock', '2020-11-13 18:20:10', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(569, 'Admin', 'Insert', 'equipo_stock', '2020-11-13 18:20:10', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (24, 51)'),
(570, 'Admin', 'Insert', 'Equipo', '2020-11-13 18:20:31', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`, `tipo`) VALUES (\'66\', \'66\', \'./assets/dist/img/qr/COM_66.png\', \'66\', \'66\', \'PC\')'),
(571, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-13 18:20:31', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (52, \'9\', \'21\')'),
(572, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-13 18:20:31', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (52, \'9\', \'21\')'),
(573, 'Admin', 'Insert', 'Stock', '2020-11-13 18:20:31', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(574, 'Admin', 'Insert', 'equipo_stock', '2020-11-13 18:20:31', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (25, 52)'),
(575, 'Admin', 'Insert', 'Proveedor', '2020-11-17 13:20:12', 'INSERT INTO `proveedor` (`rut`, `nombre_fantacia`, `razon_social`, `email`, `telefono`, `contacto`) VALUES (\'36699884\', \'Tpc Sa\', \'The Printing Company\', \'giturriaga@tpc.com\', \'26093635\', \'Gonzalo\')'),
(576, 'Admin', 'Insert', 'marca', '2020-11-17 14:20:01', 'INSERT INTO `marca` (`descripcion`) VALUES (\'LEXMARK\')'),
(577, 'Admin', 'Insert', 'modelo', '2020-11-17 14:20:23', 'INSERT INTO `modelo` (`descripcion`) VALUES (\'MP6050\')'),
(578, 'Admin', 'Insert', 'equipo', '2020-11-17 14:20:46', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `host`, `servicio`) VALUES (\'321321321\', \'Impresora\', \'./assets/dist/img/qr/IMP_321321321.png\', \'laimpresora2\', \'321321321\')'),
(579, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-17 14:20:46', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (54, \'13\', \'24\')'),
(580, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-17 14:20:46', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (54, \'13\', \'24\')'),
(581, 'Admin', 'Insert', 'Stock', '2020-11-17 14:20:46', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(582, 'Admin', 'Insert', 'equipo_stock', '2020-11-17 14:20:46', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (27, 54)'),
(583, 'Admin', 'Insert', 'equipo', '2020-11-20 13:20:05', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `pulgadas`, `tipo`) VALUES (\'2323\', \'2323\', \'./assets/dist/img/qr/MON_2323.png\', \'23\', \'MONITOR\')'),
(584, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-20 13:20:05', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (56, \'11\', \'22\')'),
(585, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-20 13:20:05', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (56, \'11\', \'22\')'),
(586, 'Admin', 'Insert', 'Stock', '2020-11-20 13:20:05', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(587, 'Admin', 'Insert', 'equipo_stock', '2020-11-20 13:20:05', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (28, 56)'),
(588, 'Admin', 'Delete Logico', 'insumo', '2020-11-20 13:20:54', 'UPDATE `insumo` SET `activo` = 0\nWHERE `codigo` = \'55\''),
(589, 'Admin', 'Update', 'Equipo', '2020-11-20 13:20:15', 'UPDATE `equipo` SET `numero_serie` = NULL, `descripcion` = \'2323\', `qr` = NULL, `pulgadas` = \'32\', `tipo` = \'MONITOR\'\nWHERE `codigo` = \'56\''),
(590, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-20 13:20:15', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'56\''),
(591, 'Admin', 'Update', 'equipo_proveedor', '2020-11-20 13:20:15', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'56\''),
(592, 'Admin', 'Update', 'Equipo', '2020-11-20 14:20:04', 'UPDATE `equipo` SET `numero_serie` = \'2323\', `descripcion` = \'2323\', `qr` = \'./assets/dist/img/qr/MON_2323.png\', `pulgadas` = \'32\', `tipo` = \'MONITOR\'\nWHERE `codigo` = \'56\''),
(593, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-20 14:20:04', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'56\''),
(594, 'Admin', 'Update', 'equipo_proveedor', '2020-11-20 14:20:04', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'56\''),
(595, 'Admin', 'Update', 'Equipo', '2020-11-20 14:20:14', 'UPDATE `equipo` SET `numero_serie` = \'2323\', `descripcion` = \'2323\', `qr` = \'./assets/dist/img/qr/MON_2323.png\', `pulgadas` = \'56\', `tipo` = \'MONITOR\'\nWHERE `codigo` = \'56\''),
(596, 'Admin', 'Update', 'equipo_marca_modelo', '2020-11-20 14:20:14', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'56\''),
(597, 'Admin', 'Update', 'equipo_proveedor', '2020-11-20 14:20:14', 'UPDATE `equipo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_equipo` = \'56\''),
(598, 'Admin', 'Insert', 'equipo', '2020-11-20 14:20:10', 'INSERT INTO `equipo` (`numero_serie`, `descripcion`, `qr`, `pulgadas`, `tipo`) VALUES (\'54\', \'54\', \'./assets/dist/img/qr/MON_54.png\', \'44\', \'MONITOR\')'),
(599, 'Admin', 'Insert', 'equipo_marca_modelo', '2020-11-20 14:20:10', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (58, \'11\', \'22\')'),
(600, 'Admin', 'Insert', 'equipo_proveedor', '2020-11-20 14:20:10', 'INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES (58, \'11\', \'22\')'),
(601, 'Admin', 'Insert', 'Stock', '2020-11-20 14:20:10', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(602, 'Admin', 'Insert', 'equipo_stock', '2020-11-20 14:20:10', 'INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`) VALUES (30, 58)'),
(603, 'Admin', 'Insert', 'Insumo', '2020-11-20 15:20:37', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'OTRO\', \'CABLE USB\', \'50\', \'50\', \'./assets/dist/img/qr/OTRO_34260281.png\')'),
(604, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-20 15:20:37', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (27, \'11\', \'22\')'),
(605, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-20 15:20:37', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (27, \'11\', \'22\')'),
(606, 'Admin', 'Insert', 'Stock', '2020-11-20 15:20:37', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(607, 'Admin', 'Insert', 'insumo_stock', '2020-11-20 15:20:37', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (31, 27)'),
(608, 'Admin', 'Insert', 'insumo', '2020-11-20 15:20:19', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `copias`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'fotoconductor\', \'aa\', \'22\', \'22\', \'22\', \'./assets/dist/img/qr/INS_83860676.png\')'),
(609, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-20 15:20:19', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (28, \'11\', \'22\')'),
(610, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-20 15:20:19', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (28, \'11\', \'22\')'),
(611, 'Admin', 'Insert', 'Stock', '2020-11-20 15:20:19', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(612, 'Admin', 'Insert', 'insumo_stock', '2020-11-20 15:20:19', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (32, 28)'),
(613, 'Admin', 'Insert', 'insumo', '2020-11-20 15:20:41', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `copias`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'kit_mantenimiento\', \'22222\', \'22\', \'22\', \'22\', \'./assets/dist/img/qr/INS_96638682.png\')'),
(614, 'Admin', 'Insert', 'marca_modelo', '2020-11-20 15:20:41', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'13\', \'20\', \'INSUMO\')'),
(615, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-20 15:20:41', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (29, \'13\', \'20\')'),
(616, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-20 15:20:41', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (29, \'13\', \'20\')'),
(617, 'Admin', 'Insert', 'equipo_insumo', '2020-11-20 15:20:41', ''),
(618, 'Admin', 'Insert', 'equipo_insumo', '2020-11-20 15:20:41', 'INSERT INTO `equipo_insumo` (`codigo_equipo`, `codigo_insumo`) VALUES (\'56\', 29)'),
(619, 'Admin', 'Insert', 'Stock', '2020-11-20 15:20:41', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(620, 'Admin', 'Insert', 'insumo_stock', '2020-11-20 15:20:41', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (33, 29)'),
(621, 'Admin', 'Insert', 'Insumo', '2020-11-20 15:20:00', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'TECLADO\', \'El teclado tiene conexion \', \'11\', \'11\', \'./assets/dist/img/qr/TEC_27024936.png\')'),
(622, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-20 15:20:00', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (30, \'11\', \'22\')'),
(623, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-20 15:20:00', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (30, \'11\', \'22\')'),
(624, 'Admin', 'Insert', 'Stock', '2020-11-20 15:20:00', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(625, 'Admin', 'Insert', 'insumo_stock', '2020-11-20 15:20:00', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (34, 30)'),
(626, 'Admin', 'Update', 'Insumo', '2020-11-20 16:20:59', 'UPDATE `insumo` SET `cantidad` = \'\'\nWHERE `codigo` = \'38\''),
(627, 'Admin', 'Update', 'Stock', '2020-11-20 16:20:59', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` IS NULL'),
(628, 'Admin', 'Update', 'Insumo', '2020-11-20 17:20:13', 'UPDATE `insumo` SET `tipo` = \'TELEFONO\', `descripcion` = \'descripcion\', `tel_tipo` = \'1\', `cantidad` = \'2\', `qr` = \'./assets/dist/img/qr/TEL_27471004.png\'\nWHERE `codigo` = \'22\''),
(629, 'Admin', 'Update', 'insumo_marca_modelo', '2020-11-20 17:20:13', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'10\', `codigo_modelo` = \'21\'\nWHERE `codigo_insumo` = \'22\''),
(630, 'Admin', 'Update', 'insumo_proveedor', '2020-11-20 17:20:13', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'10\', `codigo_modelo` = \'21\'\nWHERE `codigo_insumo` = \'22\''),
(631, 'Admin', 'Insert', 'Insumo', '2020-11-20 17:20:37', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `tel_tipo`, `cantidad`, `cantidad_actual`, `qr`) VALUES (\'TELEFONO\', \'1112221\', \'3\', \'10\', \'10\', \'./assets/dist/img/qr/TEL_72600590.png\')'),
(632, 'Admin', 'Insert', 'marca_modelo', '2020-11-20 17:20:37', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'13\', \'22\', \'TELEFONO\')'),
(633, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-20 17:20:37', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (31, \'13\', \'22\')'),
(634, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-20 17:20:37', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (31, \'13\', \'22\')'),
(635, 'Admin', 'Insert', 'Stock', '2020-11-20 17:20:37', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(636, 'Admin', 'Insert', 'insumo_stock', '2020-11-20 17:20:37', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (35, 31)'),
(637, 'Admin', 'Delete Logico', 'insumo', '2020-11-24 13:20:54', 'UPDATE `insumo` SET `activo` = 0\nWHERE `codigo` = \'21\''),
(638, 'Admin', 'Insert', 'Insumo', '2020-11-24 14:20:25', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'TECLADO\', \'El teclado tiene conexion INALAMBRICO por medio de conectorUSB\', \'12\', \'12\', \'./assets/dist/img/qr/TEC_70551960.png\', \'INALAMBR'),
(639, 'Admin', 'Insert', 'marca_modelo', '2020-11-24 14:20:25', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'10\', \'21\', \'COMPONENTE\')'),
(640, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-24 14:20:25', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (32, \'10\', \'21\')'),
(641, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-24 14:20:25', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (32, \'10\', \'21\')'),
(642, 'Admin', 'Insert', 'Stock', '2020-11-24 14:20:25', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(643, 'Admin', 'Insert', 'insumo_stock', '2020-11-24 14:20:25', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (36, 32)'),
(644, 'Admin', 'Insert', 'Insumo', '2020-11-27 13:20:43', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `potencia`) VALUES (\'FUENTE\', \'La fuente tiene una potencia de 450\', \'10\', \'10\', \'./assets/dist/img/qr/POW_23861448.png\', \'450\')'),
(645, 'Admin', 'Insert', 'marca_modelo', '2020-11-27 13:20:43', 'INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES (\'13\', \'23\', \'COMPONENTE\')'),
(646, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 13:20:43', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (33, \'13\', \'23\')'),
(647, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 13:20:43', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (33, \'13\', \'23\')'),
(648, 'Admin', 'Insert', 'Stock', '2020-11-27 13:20:43', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(649, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 13:20:43', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (37, 33)'),
(650, 'Admin', 'Insert', 'Insumo', '2020-11-27 13:20:11', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'TECLADO\', \'El teclado tiene conexion PS2\', \'77\', \'77\', \'./assets/dist/img/qr/TEC_50305315.png\', \'PS2\', NULL)'),
(651, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 13:20:11', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (34, \'11\', \'22\')'),
(652, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 13:20:11', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (34, \'11\', \'22\')'),
(653, 'Admin', 'Insert', 'Stock', '2020-11-27 13:20:11', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(654, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 13:20:11', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (38, 34)'),
(655, 'Admin', 'Insert', 'Insumo', '2020-11-27 13:20:46', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `capasidad`, `tipo_disco`) VALUES (\'DISCO\', \'El disco duro es de tipo MECANICO y tiene una capasidad de 100GB\', \'22\', \'22\', \'./assets/dist/img/qr/HDD_49050136.png\', \'100\', \''),
(656, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 13:20:46', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (35, \'13\', \'23\')'),
(657, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 13:20:46', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (35, \'13\', \'23\')'),
(658, 'Admin', 'Insert', 'Stock', '2020-11-27 13:20:46', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(659, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 13:20:46', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (39, 35)'),
(660, 'Admin', 'Insert', 'Insumo', '2020-11-27 14:20:18', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'TECLADO\', \'El teclado tiene conexion INALAMBRICO por medio de bluetooth\', \'11\', \'11\', \'./assets/dist/img/qr/TEC_24610009.png\', \'INALAMBRIC'),
(661, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 14:20:18', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (36, \'11\', \'22\')'),
(662, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 14:20:18', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (36, \'11\', \'22\')'),
(663, 'Admin', 'Insert', 'Stock', '2020-11-27 14:20:18', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(664, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 14:20:18', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (40, 36)'),
(665, 'Admin', 'Insert', 'Insumo', '2020-11-27 14:20:54', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'RATON\', \'El raton tiene conexion INALAMBRICO por medio de conectorUSB\', \'11\', \'11\', \'./assets/dist/img/qr/RAT_49548336.png\', \'INALAMBRICO\''),
(666, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 14:20:54', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (37, \'11\', \'22\')'),
(667, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 14:20:54', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (37, \'11\', \'22\')'),
(668, 'Admin', 'Insert', 'Stock', '2020-11-27 14:20:54', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(669, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 14:20:54', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (41, 37)'),
(670, 'Admin', 'Delete Logico', 'insumo', '2020-11-27 14:20:02', 'UPDATE `insumo` SET `activo` = 0\nWHERE `codigo` = \'36\''),
(671, 'Admin', 'Delete Logico', 'insumo', '2020-11-27 14:20:08', 'UPDATE `insumo` SET `activo` = 0\nWHERE `codigo` = \'30\''),
(672, 'Admin', 'Delete Logico', 'insumo', '2020-11-27 14:20:26', 'UPDATE `insumo` SET `activo` = 0\nWHERE `codigo` = \'32\''),
(673, 'Admin', 'Insert', 'Insumo', '2020-11-27 14:20:03', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'RATON\', \'El raton tiene conexion INALAMBRICO por medio de bluetooth\', \'11\', \'11\', \'./assets/dist/img/qr/RAT_68307741.png\', \'INALAMBRICO\', '),
(674, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 14:20:03', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (38, \'11\', \'22\')'),
(675, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 14:20:03', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (38, \'11\', \'22\')'),
(676, 'Admin', 'Insert', 'Stock', '2020-11-27 14:20:03', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(677, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 14:20:03', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (42, 38)'),
(678, 'Admin', 'Insert', 'Insumo', '2020-11-27 14:20:48', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'TECLADO\', \'El teclado tiene conexion INALAMBRICO por medio de bluetooth\', \'\', \'\', \'./assets/dist/img/qr/TEC_54868147.png\', \'INALAMBRICO\', '),
(679, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 14:20:48', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (39, \'11\', \'22\')'),
(680, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 14:20:48', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (39, \'11\', \'22\')'),
(681, 'Admin', 'Insert', 'Stock', '2020-11-27 14:20:48', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(682, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 14:20:48', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (43, 39)'),
(683, 'Admin', 'Insert', 'Insumo', '2020-11-27 14:20:11', 'INSERT INTO `insumo` (`tipo`, `descripcion`, `cantidad`, `cantidad_actual`, `qr`, `puerto`, `conex_puerto`) VALUES (\'TECLADO\', \'El teclado tiene conexion INALAMBRICO por medio de conectorUSB\', \'11\', \'11\', \'./assets/dist/img/qr/TEC_65331811.png\', \'INALAMBR'),
(684, 'Admin', 'Insert', 'insumo_marca_modelo', '2020-11-27 14:20:11', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (40, \'11\', \'22\')'),
(685, 'Admin', 'Insert', 'insumo_proveedor', '2020-11-27 14:20:11', 'INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES (40, \'11\', \'22\')'),
(686, 'Admin', 'Insert', 'Stock', '2020-11-27 14:20:11', 'INSERT INTO `stock` (`accion`) VALUES (\'INGRESO\')'),
(687, 'Admin', 'Insert', 'insumo_stock', '2020-11-27 14:20:11', 'INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`) VALUES (44, 40)'),
(688, 'Admin', 'Update', 'Insumo', '2020-11-27 15:20:34', 'UPDATE `insumo` SET `tipo` = \'DISCO\', `descripcion` = \'El disco duro es de tipo SOLIDO y tiene una capasidad de 100GB\', `cantidad` = \'10\', `cantidad_actual` = \'10\', `qr` = \'./assets/dist/img/qr/HDD_17870242.png\', `capasidad` = \'100\', `tipo_disco` = \'SOLID'),
(689, 'Admin', 'Update', 'insumo_marca_modelo', '2020-11-27 15:20:34', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'25\''),
(690, 'Admin', 'Update', 'insumo_proveedor', '2020-11-27 15:20:34', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'25\''),
(691, 'Admin', 'Update', 'Insumo', '2020-11-27 15:20:03', 'UPDATE `insumo` SET `tipo` = \'TECLADO\', `descripcion` = \'El teclado tiene conexion INALAMBRICO por medio de bluetooth\', `cantidad` = \'11\', `cantidad_actual` = \'11\', `qr` = \'./assets/dist/img/qr/TEC_56958918.png\', `puerto` = \'INALAMBRICO\', `conex_puerto` ='),
(692, 'Admin', 'Update', 'insumo_marca_modelo', '2020-11-27 15:20:03', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'40\''),
(693, 'Admin', 'Update', 'insumo_proveedor', '2020-11-27 15:20:03', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'40\''),
(694, 'Admin', 'Update', 'Insumo', '2020-11-27 15:20:49', 'UPDATE `insumo` SET `tipo` = \'TECLADO\', `descripcion` = \'El teclado tiene conexion PS2\', `cantidad` = \'3\', `cantidad_actual` = \'3\', `qr` = \'./assets/dist/img/qr/TEC_69885187.png\', `puerto` = \'PS2\', `conex_puerto` = NULL\nWHERE `codigo` = \'39\''),
(695, 'Admin', 'Update', 'insumo_marca_modelo', '2020-11-27 15:20:49', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'39\''),
(696, 'Admin', 'Update', 'insumo_proveedor', '2020-11-27 15:20:49', 'UPDATE `insumo_marca_modelo` SET `codigo_marca` = \'11\', `codigo_modelo` = \'22\'\nWHERE `codigo_insumo` = \'39\''),
(697, 'Admin', 'Insert', 'stock_persona', '2020-12-03 14:20:09', '&INSERT INTO `stock_persona` (`login_persona`, `codigo_stock`) VALUES (\'jgrodriguez\', \'7\')'),
(698, 'Admin', 'Update', 'Stock', '2020-12-03 14:20:09', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'7\''),
(699, 'Admin', 'Update', 'Equipo', '2020-12-03 14:20:09', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'29\''),
(700, 'Admin', 'Insert', 'stock_persona', '2020-12-03 15:20:29', '&INSERT INTO `stock_persona` (`login_persona`, `codigo_stock`) VALUES (\'jgrodriguez\', \'21\')'),
(701, 'Admin', 'Update', 'Stock', '2020-12-03 15:20:29', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'21\'');
INSERT INTO `auditoria` (`codigo`, `usuario`, `accion`, `tabla`, `fecha`, `query`) VALUES
(702, 'Admin', 'Update', 'Equipo', '2020-12-03 15:20:29', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'48\''),
(703, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-03 16:20:52', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'1\', \'1\', \'2\')'),
(704, 'Admin', 'Update', 'Stock', '2020-12-03 16:20:53', ''),
(705, 'Admin', 'Update', 'Equipo', '2020-12-03 16:20:53', ''),
(706, 'Admin', 'Update', 'Insumo', '2020-12-03 16:20:53', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'22\''),
(707, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-03 16:20:40', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'1\', \'1\', \'2\')'),
(708, 'Admin', 'Update', 'Insumo', '2020-12-03 16:20:40', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'22\''),
(709, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-04 19:20:29', '&INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`) VALUES (\'29\', \'52\')'),
(710, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-04 19:20:50', '&INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`) VALUES (\'29\', \'52\')'),
(711, 'Admin', 'Update', 'Stock', '2020-12-04 19:20:50', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'29\''),
(712, 'Admin', 'Update', 'Equipo', '2020-12-04 19:20:50', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'57\''),
(713, 'Admin', 'Update', 'Insumo', '2020-12-04 19:20:50', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'57\''),
(714, 'Admin', 'Update', 'Equipo', '2020-12-07 17:20:11', 'UPDATE `equipo` SET estado = \'DISPONIBLE\'\nWHERE `codigo` = \'52\''),
(715, 'Admin', 'Update', 'Equipo', '2020-12-07 18:20:32', 'UPDATE `equipo` SET estado = \'ASIGNADO\'\nWHERE `codigo` = \'52\''),
(716, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:22', '&INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'30\', \'52\', \'MONITOR\')'),
(717, 'Admin', 'Update', 'Stock', '2020-12-07 19:20:22', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'30\''),
(718, 'Admin', 'Update', 'Equipo', '2020-12-07 19:20:22', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'58\''),
(719, 'Admin', 'Update', 'Insumo', '2020-12-07 19:20:22', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'58\''),
(720, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:01', NULL),
(721, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:53', NULL),
(722, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:55', NULL),
(723, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:23', 'INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'9\', \'52\', \'DISCO\')'),
(724, 'Admin', 'Update', 'Insumo', '2020-12-07 19:20:23', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'25\''),
(725, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:17', 'INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'31\', \'52\', \'OTRO\')'),
(726, 'Admin', 'Update', 'Insumo', '2020-12-07 19:20:17', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'27\''),
(727, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 19:20:13', 'INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'32\', \'42\', \'fotoconductor\')'),
(728, 'Admin', 'Update', 'Insumo', '2020-12-07 19:20:13', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'28\''),
(729, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 20:20:21', 'INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'32\', \'43\', \'fotoconductor\')'),
(730, 'Admin', 'Update', 'Insumo', '2020-12-07 20:20:21', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'28\''),
(731, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-07 20:20:06', 'INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'38\', \'52\', \'TECLADO\')'),
(732, 'Admin', 'Update', 'Insumo', '2020-12-07 20:20:06', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'34\''),
(733, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-10 14:20:08', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'1\', \'1\', \'6\')'),
(734, 'Admin', 'Update', 'Stock', '2020-12-10 14:20:08', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'6\''),
(735, 'Admin', 'Update', 'Equipo', '2020-12-10 14:20:08', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` IS NULL'),
(736, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-10 14:20:13', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'3\', \'1\', \'11\')'),
(737, 'Admin', 'Update', 'Stock', '2020-12-10 14:20:13', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'11\''),
(738, 'Admin', 'Update', 'Equipo', '2020-12-10 14:20:13', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` IS NULL'),
(739, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-10 14:20:37', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'4\', \'3\', \'11\')'),
(740, 'Admin', 'Update', 'Stock', '2020-12-10 14:20:37', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'11\''),
(741, 'Admin', 'Update', 'Equipo', '2020-12-10 14:20:37', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'30\''),
(742, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-10 14:20:52', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'4\', \'3\', \'27\')'),
(743, 'Admin', 'Update', 'Stock', '2020-12-10 14:20:52', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'27\''),
(744, 'Admin', 'Update', 'Equipo', '2020-12-10 14:20:52', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'54\''),
(745, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-15 16:20:44', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'4\', \'3\', \'6\')'),
(746, 'Admin', 'Update', 'Stock', '2020-12-15 16:20:44', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'6\''),
(747, 'Admin', 'Update', 'Equipo', '2020-12-15 16:20:44', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'28\''),
(748, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-15 16:20:23', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'3\', \'1\', \'12\')'),
(749, 'Admin', 'Update', 'Stock', '2020-12-15 16:20:23', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'12\''),
(750, 'Admin', 'Update', 'Equipo', '2020-12-15 16:20:23', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'37\''),
(751, 'Admin', 'Insert', 'stock_ubicacion', '2020-12-15 16:20:45', '&INSERT INTO `stock_ubicacion` (`codigo_oficina`, `codigo_edificio`, `codigo_stock`) VALUES (\'4\', \'3\', \'26\')'),
(752, 'Admin', 'Update', 'Stock', '2020-12-15 16:20:45', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'26\''),
(753, 'Admin', 'Update', 'Equipo', '2020-12-15 16:20:45', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'53\''),
(754, 'Admin', 'Insert', 'stock_persona', '2020-12-15 16:20:18', '&INSERT INTO `stock_persona` (`login_persona`, `codigo_stock`) VALUES (\'oscar.giudice\', \'22\')'),
(755, 'Admin', 'Update', 'Stock', '2020-12-15 16:20:18', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'22\''),
(756, 'Admin', 'Update', 'Equipo', '2020-12-15 16:20:18', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'49\''),
(757, 'Admin', 'Insert', 'Edificio', '2020-12-15 18:20:09', 'INSERT INTO `edificio` (`nombre`, `departamento`, `ciudad`, `calle`, `numero`, `latitud`, `longitud`, `referencia`) VALUES (\'25 De Mayo\', \'1\', \'montevideo\', \'25 de mayo\', \'402\', \'-34.9057585228542\', \'-56.1744019291748\', \' \')'),
(758, 'Admin', 'Insert', 'Oficina', '2020-12-15 18:20:20', 'INSERT INTO `oficina` (`nombre`, `codigo_edificio`, `unidad`, `piso`, `telefono`, `correo`, `responsable`, `referencia`) VALUES (\'Oficina Montevideo\', \'7\', \'2\', \'PB\', \'099366988\', \'soporte@mvotma.gub.uy\', \'Shirley\', \'\')'),
(759, 'Admin', 'Insert', 'stock_persona', '2020-12-15 18:20:03', '&INSERT INTO `stock_persona` (`login_persona`, `codigo_stock`) VALUES (\'adriana.cabrera\', \'23\')'),
(760, 'Admin', 'Update', 'Stock', '2020-12-15 18:20:03', 'UPDATE `stock` SET `accion` = \'ASIGNACION\'\nWHERE `codigo` = \'23\''),
(761, 'Admin', 'Update', 'Equipo', '2020-12-15 18:20:03', 'UPDATE `equipo` SET `estado` = \'ASIGNADO\'\nWHERE `codigo` = \'50\''),
(762, 'Admin', 'Insert', 'stock_equipo_asignado', '2020-12-16 20:20:30', 'INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `tipo`) VALUES (\'8\', \'42\', \'tonner\')'),
(763, 'Admin', 'Update', 'Insumo', '2020-12-16 20:20:30', 'UPDATE `insumo` SET cantidad_actual = cantidad_actual-1\nWHERE `codigo` = \'24\'');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('09jrf85gdubt6flepcqk0k6nk8kpvv2r', '::1', 1608137686, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133373638363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('2djtdap5levkb0kio40oldnovir1pfbh', '::1', 1608144466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134343436363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('2dl45bj77roq9gotnfn3i63i3g10hs6v', '::1', 1607623449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632333135373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('2gv53f30q10br01nbj5vlublg66bv3ms', '::1', 1608049732, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034393733323b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('3ichpjpm35hlagu44dfobd0q9mmq4puu', '::1', 1608058277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035383237373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('3k5t8tl9gbglcrb3kg080hnqnmmcgsfv', '::1', 1608137294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133373239343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('3q5e40tmbq53kduvjhtflt3ku7imvcsi', '::1', 1608044261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034343236313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('41qon8jftkb48ivou42esfl2f7gm1q2c', '::1', 1607688173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373638383137333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('48rbc9egqt4mj60uc7o273lmah45ja2j', '::1', 1608058660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035383636303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('49c4v1ved4jjpcj57mhijjenvb9ifk7r', '::1', 1608037909, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383033373930393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('4r0903k792pi21eqvo9nh4s0hja1qh85', '::1', 1607690744, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373639303734343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('4soklapr7kgn31oh3c8glumchm89t7kl', '::1', 1607691170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373639313133353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('5hfh2c749579t7c50dcsdbuus84fol80', '::1', 1608050950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035303935303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('64p4hnsi628ebjjk0nds06dsd1v593vc', '::1', 1608136940, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133363934303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('653e0dl5qs200l5ob6gvfrej82slg4eh', '::1', 1608056061, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035363036313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('67uk7vj6p05t5bgmtm9muvdf27cjgfiv', '::1', 1608120691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383132303639313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('6a5e04ilupmtpt9kgglq63bauo30p0tt', '::1', 1608135247, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133353234373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('6d30qccj4ndip7304pvda546dkt1gakd', '::1', 1608048872, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034383837323b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('7ffjlbs0l4jper08lug8cr8lfs7rlqkl', '::1', 1608138520, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133383532303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('8366880l0d2r972h04sa4ic9utm0iqeb', '::1', 1608051608, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035313630383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('85c74ogeglbe2hptlr3judsj4rv1pvm5', '::1', 1607958346, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373935383334363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('8cvrkae7mud1a90le7ttjlsb984p571e', '::1', 1608210673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383231303637333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('8ent3sr9vb2dbfiev405nebbph08uvki', '::1', 1608144821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134343832313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('8jrdlki7j9ov7pgucjpmfs51bhg57ji2', '::1', 1608042976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034323937363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('8r5hgt5ni4l0u9q7smtci94ss55dhr5o', '::1', 1608039747, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383033393734373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('8sev89t4004qm2pm8r4uada14rt8suju', '::1', 1608119971, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383131393937313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('a10uvm5v0pphqusmrus92891unelnckm', '::1', 1607691135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373639313133353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('a2esk6od0ct7ign0bl30isrho66dmj30', '::1', 1607621194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632313139343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('bhnmmserj56t36epniejontrmt81p3pn', '::1', 1608040142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034303134323b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('bs5f48md6lf7mh8kq8dsu3ea1vefe342', '::1', 1608052255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035323235353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('bsogci7hj69flcn2390b5ijh9nuorh03', '::1', 1608210673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383231303637333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('buu42dlnkvb5fqljg2hlrnmi8hj11ac7', '::1', 1608053380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035333338303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('e3ircql67uqdrevc37nfpbiffddp3463', '::1', 1608146439, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134363433393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('ea1dqg5ttapdnouf9v56g0j464d07ock', '::1', 1608135670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133353637303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('ee1q51auk6q4f3ba8e2tm30q2jum1nre', '::1', 1608127663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383132373636333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('fnjkljbrglb3ji1tvahe2oj8q4fe7arc', '::1', 1607622780, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632323738303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('g56u8q6stakv1bmnof8d3t08rbh24c7n', '::1', 1608046868, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034363836383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b737563636573737c733a33313a22417369676e6163696f6e207265616c697a61646120636f6e20c3a97869746f223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('gu41bajjgs4uklcob9tfv466uo4jh048', '::1', 1608038923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383033383932333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('gvlqi051dtlehsjklho55m4p0gktq68p', '::1', 1608059859, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035393835393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('hct3qoc4eh3g5jk0fsg0c3ofahqvbfom', '::1', 1607623157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632333135373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('hn0lcbe4a72p8652rhntq4atq83eahmq', '::1', 1608052620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035323632303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('i72qjkhm4gjgkbcgom7skofst3q3dnro', '::1', 1607688321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373638383137333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('i8aatei852khs5r94a805a51f3o3g5i6', '::1', 1608130062, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133303036323b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('im3jur2epbls0colgp7ohad28pfpua4l', '::1', 1608060450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383036303332353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('ivnkbeak2t8bhp2hq25p2halh3o4gf07', '::1', 1608147163, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134363838363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('klu41fbl4v9aaabcjapfnlhs63226vln', '::1', 1608043723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034333732333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('kohl148v2778vht54tgah3jabc4kv394', '::1', 1608145997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134353939373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('l1ucr1719qc1vsemmos74a84s78aul6t', '::1', 1608054228, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035343232383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('laifdbuaa9iiootmtcrhketbqte48s35', '::1', 1608057579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035373537393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('looh0179k710bg3eafq0hfa7kfk4e8ur', '::1', 1608145474, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134353437343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('ltp104bsa152devc04de4n6s78nq986e', '::1', 1608044909, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034343930393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('m093l3v725c8gr6s9ikaghpjud2cs84k', '::1', 1608146886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134363838363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('m1q0dp69lcs79ndo1rm3uug2898mt9nb', '::1', 1608038249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383033383234393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('me0eo1as2qor4jf9ih7418k5uokjp1qo', '::1', 1607620790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632303739303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('mpb5dm92j8uh1i560mrno9f6a78i13r4', '::1', 1608145164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383134353136343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('mqds3l7h3o37rg02u26ftv13t7h4ecp8', '::1', 1608034521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383033343435383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('mtpkqrli4i7gmbbv0kg0v6v3dcu6jc3p', '::1', 1608138176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133383137363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('n5o6jge42qtu59rehohh3b00fbt595fi', '::1', 1607959233, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373935393233333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('nkhbfc85boogt89sanknf7v6u3efv924', '::1', 1607622424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632323432343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('oi57q5i44iel2dsqla59hk67919tr85j', '::1', 1607958669, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373935383636393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('ok8nj51jgt3htnhsku748ifmq3av6e25', '::1', 1607964426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373936343231373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('pfmg3fjb9fmujvn0heldqksk3kr8nc17', '::1', 1608060325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383036303332353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('phqsp8oi3sc1juitfi0nlkatl9jt5vop', '::1', 1608136598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133363539383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('plkr9potddcoo7rbq213hbrl4h1j05k9', '::1', 1608130418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133303431383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('q0pn4upcik7jecsrftjnd62r3em4gsi4', '::1', 1608128780, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383132383738303b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('q51g9eiq0k7csbbfh8qq0k984gkn1j4j', '::1', 1608052994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035323939343b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('qvigdh0v8l83v8875no3c5apo19r3t0u', '::1', 1608050351, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035303335313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('r4qq6sfpml2p8oaja4m6an4e74thkf29', '::1', 1607964217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373936343231373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('rjlf1oclob48m977pnpvk3v9vjp7ish1', '::1', 1607621856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632313835363b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('rkvtndi4gl9klj1rl7ffig17ls0ufcfu', '::1', 1608129105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383132393130353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('s5b9od6ndos98l385knpqpti789ingti', '::1', 1608136228, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383133363232383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('sl5ifuhm136bse8hcl7iqbs4q7663o9k', '::1', 1607620395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632303339353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('sqclco74uvprkbn7tllak7os9d7g3k6p', '::1', 1607621531, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373632313533313b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('tbkhe8gaqdg08i3toeq4hto6tctb79ho', '::1', 1608050038, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035303033383b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('tdo1ijjm269haj3q95no5tu7a2jqrg1a', '::1', 1608053923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383035333932333b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('thkj5rr238ithk8ca936aj6kjti56ife', '::1', 1608046299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383034363239393b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b737563636573737c733a33313a22417369676e6163696f6e207265616c697a61646120636f6e20c3a97869746f223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('u931k8o645gkhsr50jrajt9d63ihulvq', '::1', 1607690435, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373639303433353b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b),
('v02goo4bo2336311il4j6ago9raa5arv', '::1', 1608120347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630383132303334373b7573657249647c733a353a2241646d696e223b726f6c657c733a31393a2253757065722041646d696e6973747261646f72223b6e616d657c733a32373a2241646d696e6973747261646f722041646d696e6973747261646f72223b727574617c733a32313a2233303233313137323032302d30312d31332e6a7067223b69734c6f67676564496e7c623a313b656d61696c7c733a31383a22707067616279323040676d61696c2e636f6d223b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `codigo` int(11) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_proveedor`
--

CREATE TABLE `contrato_proveedor` (
  `codigo_contrato` int(11) NOT NULL,
  `codigo_proveedor` int(11) NOT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `referencia` varchar(150) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`codigo`, `nombre`, `departamento`, `ciudad`, `calle`, `numero`, `latitud`, `longitud`, `referencia`, `activo`) VALUES
(1, 'Edificio Zabala', '1', 'Montevideo', 'Zabala', 1432, 0, 0, NULL, 1),
(3, 'Edificio Galicia', '1', 'Montevideo', 'Galicia', 1133, 0, 0, NULL, 1),
(6, 'Edificio Rondeau', '11', 'montevideo', 'Rondeau', 3355, -34.9004, -56.1711, '       lalolaaassssssss\r\nssssssss', 1),
(7, '25 De Mayo', '1', 'montevideo', '25 de mayo', 402, -34.9058, -56.1744, ' ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `codigo` int(11) NOT NULL,
  `numero_serie` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `qr` varchar(100) DEFAULT NULL,
  `host` varchar(50) DEFAULT NULL,
  `tipo` varchar(15) NOT NULL DEFAULT 'IMPRESORA',
  `servicio` varchar(25) DEFAULT NULL,
  `pulgadas` int(11) DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'NUEVA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`codigo`, `numero_serie`, `descripcion`, `activo`, `qr`, `host`, `tipo`, `servicio`, `pulgadas`, `estado`) VALUES
(28, '123456789', 'multi', 1, './assets/dist/img/qr/IMP_123456789.png', 'pepe.mvotma.interno', 'IMPRESORA', '123456789', NULL, 'ASIGNADO'),
(29, '12345678', 'compu', 1, './assets/dist/img/qr/COM_12345678.png', 'lala2.mvotma.interno', 'PC', '', NULL, 'ASIGNADO'),
(30, '66994411', 'awserd aqwsde', 1, './assets/dist/img/qr/IMP_66994411.png', 'lala.mvotma.interno', 'IMPRESORA', '123456789', NULL, 'ASIGNADO'),
(37, '1234', '123', 1, './assets/dist/img/qr/IMP_1234.png', '123', 'IMPRESORA', '123', NULL, 'ASIGNADO'),
(38, '121212', '121212', 1, './assets/dist/img/qr/IMP_121212.png', '121212', 'IMPRESORA', '121212', NULL, 'NUEVA'),
(39, '1212', '1212', 1, './assets/dist/img/qr/IMP_1212.png', '2121', 'IMPRESORA', '2121', NULL, 'NUEVA'),
(40, '55', '55', 1, './assets/dist/img/qr/IMP_55.png', '55', 'IMPRESORA', '55', NULL, 'NUEVA'),
(41, '66', '66', 1, './assets/dist/img/qr/IMP_66.png', '66', 'IMPRESORA', '66', NULL, 'NUEVA'),
(42, '1', '1', 1, './assets/dist/img/qr/IMP_1.png', '1', 'IMPRESORA', '1', NULL, 'NUEVA'),
(43, '2', '2', 1, './assets/dist/img/qr/IMP_2.png', '2', 'IMPRESORA', '2', NULL, 'NUEVA'),
(46, '123133', '132132', 0, './assets/dist/img/qr/IMP_123133.png', '321321', 'PC', '321321', 0, 'NUEVA'),
(47, '36', '36', 0, './assets/dist/img/qr/IMP_36.png', '36', 'PC', '36', 0, 'NUEVA'),
(48, '66', '66', 1, './assets/dist/img/qr/COM_66.png', '66', 'PC', '66', NULL, 'ASIGNADO'),
(49, '78', '78', 1, './assets/dist/img/qr/COM_78.png', '78', 'PC', '78', NULL, 'ASIGNADO'),
(50, '77777', '77', 1, './assets/dist/img/qr/COM_77777.png', '77', 'PC', '77', NULL, 'ASIGNADO'),
(51, '45', '45', 1, './assets/dist/img/qr/COM_45.png', '45', 'PC', '45', NULL, 'NUEVA'),
(52, '66', '66', 1, './assets/dist/img/qr/COM_66.png', '66', 'PC', '66', NULL, 'ASIGNADO'),
(53, '123123132', 'Impresora', 1, './assets/dist/img/qr/IMP_123123132.png', 'laimpresora', 'IMPRESORA', '123132123', NULL, 'ASIGNADO'),
(54, '321321321', 'Impresora', 1, './assets/dist/img/qr/IMP_321321321.png', 'laimpresora2', 'IMPRESORA', '321321321', NULL, 'ASIGNADO'),
(56, '2323', '2323', 1, './assets/dist/img/qr/MON_2323.png', NULL, 'MONITOR', NULL, 56, 'NUEVA'),
(57, '45', '45', 1, './assets/dist/img/qr/MON_45.png', NULL, 'MONITOR', NULL, 44, 'ASIGNADO'),
(58, '54', '54', 1, './assets/dist/img/qr/MON_54.png', NULL, 'MONITOR', NULL, 44, 'ASIGNADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_insumo`
--

CREATE TABLE `equipo_insumo` (
  `codigo_equipo` int(11) NOT NULL,
  `codigo_insumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_insumo`
--

INSERT INTO `equipo_insumo` (`codigo_equipo`, `codigo_insumo`) VALUES
(29, 24),
(29, 28),
(56, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_marca_modelo`
--

CREATE TABLE `equipo_marca_modelo` (
  `codigo_equipo` int(11) NOT NULL,
  `codigo_marca` int(11) NOT NULL,
  `codigo_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_marca_modelo`
--

INSERT INTO `equipo_marca_modelo` (`codigo_equipo`, `codigo_marca`, `codigo_modelo`) VALUES
(28, 12, 23),
(29, 11, 22),
(30, 11, 21),
(37, 9, 21),
(38, 9, 20),
(39, 11, 21),
(40, 10, 21),
(41, 9, 21),
(42, 9, 23),
(43, 9, 23),
(46, 11, 21),
(47, 10, 23),
(48, 9, 21),
(49, 9, 20),
(50, 9, 22),
(51, 11, 20),
(52, 9, 21),
(53, 13, 24),
(54, 13, 24),
(56, 11, 22),
(57, 11, 22),
(58, 11, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_proveedor`
--

CREATE TABLE `equipo_proveedor` (
  `codigo_equipo` int(11) NOT NULL,
  `codigo_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `archivo_factura` varchar(255) NOT NULL,
  `garantia` int(11) NOT NULL,
  `expediente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_proveedor`
--

INSERT INTO `equipo_proveedor` (`codigo_equipo`, `codigo_proveedor`, `fecha`, `archivo_factura`, `garantia`, `expediente`) VALUES
(28, 7, '2020-12-06', '', 36, ''),
(29, 8, '2020-12-06', '', 12, ''),
(30, 7, '2020-11-21', '', 24, ''),
(37, 7, '2020-11-20', '', 12, '12'),
(38, 7, '2020-11-26', '', 12, '21'),
(39, 8, '2020-11-14', '', 22, '33'),
(40, 7, '2020-11-20', '', 55, '55'),
(41, 8, '2020-11-26', '', 66, '66'),
(42, 7, '2020-12-01', '', 1, '2'),
(43, 7, '2020-12-01', '', 1, '2'),
(46, 7, '2020-11-20', '', 321, '321'),
(47, 8, '2020-11-27', '', 36, '36'),
(48, 7, '2020-12-01', '', 66, '66'),
(49, 7, '2020-12-03', '', 77, '78'),
(50, 7, '2020-12-03', '', 77, '78'),
(51, 7, '2020-12-01', '', 45, '45'),
(52, 7, '2020-11-28', '', 66, '66'),
(53, 9, '2020-11-17', '', 24, '2020/3365'),
(54, 9, '2020-11-17', '', 24, '2020/3365'),
(56, 9, '2020-11-30', '', 23, '23'),
(57, 9, '2020-11-25', '', 44, '44'),
(58, 9, '2020-11-25', '', 44, '44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_stock`
--

CREATE TABLE `equipo_stock` (
  `codigo_stock` int(11) NOT NULL,
  `codigo_equipo` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_stock`
--

INSERT INTO `equipo_stock` (`codigo_stock`, `codigo_equipo`, `fecha`) VALUES
(6, 28, '2020-11-05'),
(7, 29, '2020-11-05'),
(11, 30, '2020-11-09'),
(12, 37, '2020-11-10'),
(13, 38, '2020-11-10'),
(14, 39, '2020-11-10'),
(15, 40, '2020-11-10'),
(16, 41, '2020-11-10'),
(17, 42, '2020-11-10'),
(18, 43, '2020-11-10'),
(19, 46, '2020-11-12'),
(20, 47, '2020-11-12'),
(21, 48, '2020-11-12'),
(22, 49, '2020-11-12'),
(23, 50, '2020-11-12'),
(24, 51, '2020-11-13'),
(25, 52, '2020-11-13'),
(26, 53, '2020-11-17'),
(27, 54, '2020-11-17'),
(28, 56, '2020-11-20'),
(29, 57, '2020-11-20'),
(30, 58, '2020-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `copias` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `cantidad_actual` int(11) NOT NULL,
  `tel_tipo` int(11) NOT NULL DEFAULT 1,
  `puerto` varchar(15) NOT NULL DEFAULT 'USB',
  `conex_puerto` varchar(15) DEFAULT NULL,
  `capasidad` int(11) DEFAULT NULL,
  `tipo_disco` varchar(20) NOT NULL DEFAULT 'SOLIDO',
  `potencia` int(11) DEFAULT NULL,
  `qr` varchar(100) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`codigo`, `tipo`, `descripcion`, `copias`, `cantidad`, `cantidad_actual`, `tel_tipo`, `puerto`, `conex_puerto`, `capasidad`, `tipo_disco`, `potencia`, `qr`, `activo`) VALUES
(21, 'FUENTE', 'La fuente tiene una potencia de 450', NULL, 10, 10, 1, 'USB', '', 0, 'SOLIDO', 0, '', 0),
(22, 'TELEFONO', 'descripcion', NULL, 2, 0, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/TEL_27471004.png', 1),
(23, 'TELEFONO', 'monitor', NULL, 20, 15, 1, 'USB', '', 0, 'SOLIDO', 0, '', 1),
(24, 'tonner', 'toner', 5000, 5, 4, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/INS_76341718.png', 1),
(25, 'DISCO', 'El disco duro es de tipo SOLIDO y tiene una capasidad de 100GB', NULL, 10, 9, 1, 'USB', '', 100, 'SOLIDO', 0, './assets/dist/img/qr/HDD_17870242.png', 1),
(26, 'TELEFONO', 'xfghsdfg sdfg', NULL, 1, 1, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/TEL_95910510.png', 1),
(27, 'OTRO', 'CABLE USB', NULL, 50, 49, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/OTRO_34260281.png', 1),
(28, 'fotoconductor', 'aa', 22, 22, 20, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/INS_83860676.png', 1),
(29, 'kit_mantenimiento', '22222', 22, 22, 22, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/INS_96638682.png', 1),
(30, 'TECLADO', 'El teclado tiene conexion ', NULL, 11, 11, 1, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/TEC_27024936.png', 0),
(31, 'TELEFONO', '1112221', NULL, 10, 10, 3, 'USB', '', 0, 'SOLIDO', 0, './assets/dist/img/qr/TEL_72600590.png', 1),
(32, 'TECLADO', 'El teclado tiene conexion INALAMBRICO por medio de conectorUSB', NULL, 12, 12, 1, 'INALAMBRIC', 'conectorUSB', 0, 'SOLIDO', 0, './assets/dist/img/qr/TEC_70551960.png', 0),
(33, 'FUENTE', 'La fuente tiene una potencia de 450', NULL, 10, 10, 1, 'USB', '', 0, 'SOLIDO', 450, './assets/dist/img/qr/POW_23861448.png', 1),
(34, 'TECLADO', 'El teclado tiene conexion PS2', NULL, 77, 76, 1, 'PS2', NULL, NULL, 'SOLIDO', NULL, './assets/dist/img/qr/TEC_50305315.png', 1),
(35, 'DISCO', 'El disco duro es de tipo MECANICO y tiene una capasidad de 100GB', NULL, 22, 22, 1, 'USB', NULL, 100, 'MECANICO', NULL, './assets/dist/img/qr/HDD_49050136.png', 1),
(36, 'TECLADO', 'El teclado tiene conexion INALAMBRICO por medio de bluetooth', NULL, 11, 11, 1, 'INALAMBRICO', 'bluetooth', NULL, 'SOLIDO', NULL, './assets/dist/img/qr/TEC_24610009.png', 0),
(37, 'RATON', 'El raton tiene conexion INALAMBRICO por medio de conectorUSB', NULL, 11, 11, 1, 'INALAMBRICO', 'conectorUSB', NULL, 'SOLIDO', NULL, './assets/dist/img/qr/RAT_49548336.png', 1),
(38, 'RATON', 'El raton tiene conexion INALAMBRICO por medio de bluetooth', NULL, 11, 11, 1, 'INALAMBRICO', 'bluetooth', NULL, 'SOLIDO', NULL, './assets/dist/img/qr/RAT_68307741.png', 1),
(39, 'TECLADO', 'El teclado tiene conexion PS2', NULL, 3, 3, 1, 'PS2', NULL, NULL, 'SOLIDO', NULL, './assets/dist/img/qr/TEC_69885187.png', 1),
(40, 'TECLADO', 'El teclado tiene conexion INALAMBRICO por medio de bluetooth', NULL, 11, 11, 1, 'INALAMBRICO', 'bluetooth', NULL, 'SOLIDO', NULL, './assets/dist/img/qr/TEC_56958918.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_marca_modelo`
--

CREATE TABLE `insumo_marca_modelo` (
  `codigo_insumo` int(11) NOT NULL,
  `codigo_marca` int(11) NOT NULL,
  `codigo_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumo_marca_modelo`
--

INSERT INTO `insumo_marca_modelo` (`codigo_insumo`, `codigo_marca`, `codigo_modelo`) VALUES
(21, 9, 20),
(22, 10, 21),
(23, 11, 22),
(24, 11, 22),
(25, 11, 22),
(26, 11, 22),
(27, 11, 22),
(28, 11, 22),
(29, 13, 20),
(30, 11, 22),
(31, 13, 22),
(32, 10, 21),
(33, 13, 23),
(34, 11, 22),
(35, 13, 23),
(36, 11, 22),
(37, 11, 22),
(38, 11, 22),
(39, 11, 22),
(40, 11, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_proveedor`
--

CREATE TABLE `insumo_proveedor` (
  `codigo_insumo` int(11) NOT NULL,
  `codigo_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `archivo_factura` varchar(255) NOT NULL,
  `garantia` int(11) DEFAULT NULL,
  `expediente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumo_proveedor`
--

INSERT INTO `insumo_proveedor` (`codigo_insumo`, `codigo_proveedor`, `fecha`, `archivo_factura`, `garantia`, `expediente`) VALUES
(21, 7, '2020-12-01', '', 6, ''),
(22, 8, '2020-11-26', '', 12, '12'),
(23, 7, '2020-11-25', '', 24, ''),
(24, 7, '2020-12-02', '', 12, ''),
(25, 8, '2020-11-27', '', 24, ''),
(26, 8, '2020-11-12', '', 10, ''),
(27, 8, '2020-12-01', '', 12, '12'),
(28, 9, '2020-11-18', '', 22, '22'),
(29, 8, '2020-11-25', '', 22, '22'),
(30, 9, '2020-11-25', '', 11, '11'),
(31, 9, '2020-11-13', '', 11, '11'),
(32, 9, '2020-11-26', '', 12, '12'),
(33, 9, '2020-12-06', '', 450, '450'),
(34, 9, '2020-11-20', '', 77, '77'),
(35, 9, '2020-11-28', '', 22, '22'),
(36, 9, '2020-11-24', '', 11, '1111'),
(37, 9, '2020-11-22', '', 11, '11'),
(38, 9, '2020-12-01', '', 11, '11'),
(39, 9, '2020-11-25', '', 11, '11'),
(40, 9, '2020-11-11', '', 11, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_stock`
--

CREATE TABLE `insumo_stock` (
  `codigo_stock` int(11) NOT NULL,
  `codigo_insumo` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumo_stock`
--

INSERT INTO `insumo_stock` (`codigo_stock`, `codigo_insumo`, `fecha`) VALUES
(1, 21, '2020-11-05'),
(2, 22, '2020-11-05'),
(3, 23, '2020-11-05'),
(8, 24, '2020-11-06'),
(9, 25, '2020-11-09'),
(10, 26, '2020-11-09'),
(31, 27, '2020-11-20'),
(32, 28, '2020-11-20'),
(33, 29, '2020-11-20'),
(34, 30, '2020-11-20'),
(35, 31, '2020-11-20'),
(36, 32, '2020-11-24'),
(37, 33, '2020-11-27'),
(38, 34, '2020-11-27'),
(39, 35, '2020-11-27'),
(40, 36, '2020-11-27'),
(41, 37, '2020-11-27'),
(42, 38, '2020-11-27'),
(43, 39, '2020-11-27'),
(44, 40, '2020-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`codigo`, `descripcion`) VALUES
(9, 'Marca Fuente'),
(10, 'Marca telefono'),
(11, 'AOC'),
(12, 'richo'),
(13, 'LEXMARK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_modelo`
--

CREATE TABLE `marca_modelo` (
  `codigo_marca` int(11) NOT NULL,
  `codigo_modelo` int(11) NOT NULL,
  `origen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca_modelo`
--

INSERT INTO `marca_modelo` (`codigo_marca`, `codigo_modelo`, `origen`) VALUES
(9, 20, 'COMPONENTE'),
(9, 20, 'IMPRESORA'),
(9, 20, 'PC'),
(9, 21, 'IMPRESORA'),
(9, 21, 'PC'),
(9, 22, 'PC'),
(9, 23, 'IMPRESORA'),
(10, 21, 'COMPONENTE'),
(10, 21, 'IMPRESORA'),
(10, 21, 'TELEFONO'),
(10, 23, 'PC'),
(11, 20, 'PC'),
(11, 21, 'IMPRESORA'),
(11, 21, 'PC'),
(11, 22, 'COMPONENTE'),
(11, 22, 'INSUMO'),
(11, 22, 'MONITOR'),
(11, 22, 'PC'),
(11, 22, 'TELEFONO'),
(12, 23, 'IMPRESORA'),
(12, 23, 'INSUMO'),
(13, 20, 'INSUMO'),
(13, 22, 'TELEFONO'),
(13, 23, 'COMPONENTE'),
(13, 24, 'IMPRESORA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`codigo`, `descripcion`) VALUES
(20, 'Fuente Modelo'),
(21, 'modelo telefono'),
(22, 'AOC22W'),
(23, 'MP4002'),
(24, 'MP6050');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `codigo` int(11) NOT NULL,
  `codigo_edificio` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `piso` varchar(20) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `responsable` varchar(50) DEFAULT NULL,
  `referencia` varchar(150) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`codigo`, `codigo_edificio`, `nombre`, `unidad`, `piso`, `telefono`, `correo`, `responsable`, `referencia`, `activo`) VALUES
(1, 1, 'Informatica', '1', '3', 1314, 'informatica@mvotma.gub.uy', 'Alberto Hughes', 'donde trabajan de verdad', 1),
(2, 1, 'Acuerdos', '1', '3', 1308, 'acuerdos@mvotma.gub.uy', 'Mavel', '', 0),
(3, 1, 'Secretaria', '1', '3', 1302, 'secdgs@mvotma.gub.uy', 'Shirley', '', 1),
(4, 3, 'Informatica', '5', 'SS', 4611, 'soporte@mvotma.gub.uy', 'Oscar', 'en la cueva', 1),
(5, 7, 'Oficina Montevideo', '2', 'PB', 99366988, 'soporte@mvotma.gub.uy', 'Shirley', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `login` varchar(50) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`login`, `nombre`) VALUES
('adriana.cabrera', 'Adriana Cabrera'),
('jgrodriguez', 'Jose Rodriguez'),
('oscar.giudice', 'Oscar Giudice');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_ubicacion`
--

CREATE TABLE `persona_ubicacion` (
  `login_persona` varchar(50) NOT NULL,
  `codigo_edificio` int(11) NOT NULL,
  `codigo_oficina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_ubicacion`
--

INSERT INTO `persona_ubicacion` (`login_persona`, `codigo_edificio`, `codigo_oficina`) VALUES
('adriana.cabrera', 7, 5),
('jgrodriguez', 1, 1),
('oscar.giudice', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codigo` int(11) NOT NULL,
  `rut` int(11) NOT NULL,
  `nombre_fantacia` varchar(50) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `contacto` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codigo`, `rut`, `nombre_fantacia`, `razon_social`, `telefono`, `contacto`, `email`, `activo`) VALUES
(7, 2147483647, 'Plus Ultra', 'Plus Ultra S.a.', '29026760', 'María Rosa', 'atencionalcliente@plusultra.com.uy', 1),
(8, 2147483647, 'Emme Sistemas', 'Emme Sistemas S.a.', '29080076', 'Diana', 'emme@emmesistemas.com', 1),
(9, 36699884, 'Tpc Sa', 'The Printing Company', '26093635', 'Gonzalo', 'giturriaga@tpc.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_list`
--

CREATE TABLE `reporte_list` (
  `id` int(11) NOT NULL,
  `detalle` varchar(60) NOT NULL,
  `sql` varchar(1000) NOT NULL,
  `role` varchar(45) NOT NULL,
  `filtro` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte_list`
--

INSERT INTO `reporte_list` (`id`, `detalle`, `sql`, `role`, `filtro`) VALUES
(1, 'Ubicacion Impresoras', 'select E.codigo, E.numero_serie, O.nombre as oficina, ED.nombre as edificio from equipo as E left join equipo_stock as ES on E.codigo = ES.codigo_equipo left join stock_ubicacion as SU on ES.codigo_stock = SU.codigo_stock left join oficina as O on SU.codigo_oficina = O.codigo left join edificio as ED on SU.codigo_edificio = ED.codigo where E.tipo=\'IMPRESORA\' and E.activo=1 and (O.nombre!=\'NULL\' && ED.nombre!=\'NULL\') order by ED.nombre, O.nombre', 'Super Administrador', 'vacio'),
(2, 'Total Usuarios', 'select * from usuario where fecha BETWEEN', 'Super Administrador', 'fecha'),
(3, 'Total Visitas', 'select * from visita where fecha BETWEEN', 'Super Administrador', 'fecha'),
(4, 'Total Usuarios', 'select * from usuario where fecha BETWEEN', 'Super Administrador', 'fecha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `codigo` int(11) NOT NULL,
  `accion` varchar(100) DEFAULT 'INGRESO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`codigo`, `accion`) VALUES
(1, 'INGRESO'),
(2, 'INGRESO'),
(3, 'INGRESO'),
(6, 'ASIGNACION'),
(7, 'ASIGNACION'),
(8, 'INGRESO'),
(9, 'INGRESO'),
(10, 'INGRESO'),
(11, 'ASIGNACION'),
(12, 'ASIGNACION'),
(13, 'INGRESO'),
(14, 'INGRESO'),
(15, 'INGRESO'),
(16, 'INGRESO'),
(17, 'INGRESO'),
(18, 'INGRESO'),
(19, 'INGRESO'),
(20, 'INGRESO'),
(21, 'ASIGNACION'),
(22, 'ASIGNACION'),
(23, 'ASIGNACION'),
(24, 'INGRESO'),
(25, 'INGRESO'),
(26, 'ASIGNACION'),
(27, 'ASIGNACION'),
(28, 'INGRESO'),
(29, 'ASIGNACION'),
(30, 'ASIGNACION'),
(31, 'INGRESO'),
(32, 'INGRESO'),
(33, 'INGRESO'),
(34, 'INGRESO'),
(35, 'INGRESO'),
(36, 'INGRESO'),
(37, 'INGRESO'),
(38, 'INGRESO'),
(39, 'INGRESO'),
(40, 'INGRESO'),
(41, 'INGRESO'),
(42, 'INGRESO'),
(43, 'INGRESO'),
(44, 'INGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_equipo_asignado`
--

CREATE TABLE `stock_equipo_asignado` (
  `codigo_stock` int(11) NOT NULL,
  `codigo_equipo` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock_equipo_asignado`
--

INSERT INTO `stock_equipo_asignado` (`codigo_stock`, `codigo_equipo`, `fecha`, `tipo`) VALUES
(8, 42, '2020-12-16', 'tonner'),
(9, 52, '2020-11-07', 'DISCO'),
(29, 52, '2020-12-04', 'MONITOR'),
(30, 52, '2020-12-07', 'MONITOR'),
(31, 52, '2020-12-07', 'OTRO'),
(32, 42, '2020-11-07', 'fotoconductor'),
(32, 43, '2020-12-07', 'fotoconductor'),
(38, 52, '2020-11-07', 'TECLADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_persona`
--

CREATE TABLE `stock_persona` (
  `login_persona` varchar(50) NOT NULL,
  `codigo_stock` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock_persona`
--

INSERT INTO `stock_persona` (`login_persona`, `codigo_stock`, `fecha`) VALUES
('adriana.cabrera', 23, '2020-12-15'),
('jgrodriguez', 7, '2020-12-03'),
('jgrodriguez', 21, '2020-12-03'),
('oscar.giudice', 22, '2020-12-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_ubicacion`
--

CREATE TABLE `stock_ubicacion` (
  `codigo_stock` int(11) NOT NULL,
  `codigo_edificio` int(11) NOT NULL,
  `codigo_oficina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock_ubicacion`
--

INSERT INTO `stock_ubicacion` (`codigo_stock`, `codigo_edificio`, `codigo_oficina`) VALUES
(2, 1, 1),
(6, 1, 1),
(6, 3, 4),
(11, 3, 4),
(12, 1, 3),
(26, 3, 4),
(27, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` varchar(30) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(63, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-05 12:07:06'),
(64, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-05 14:43:53'),
(65, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-06 09:39:13'),
(66, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-06 13:17:56'),
(67, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '172.19.1.200', 'Internet Explorer 11.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko', 'Windows 7', '2020-11-06 14:38:08'),
(68, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-09 09:53:42'),
(69, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-09 15:43:19'),
(70, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-10 09:41:25'),
(71, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 81.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Windows 10', '2020-11-12 09:10:14'),
(72, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Chrome 86.0.4240.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'Windows 10', '2020-11-12 09:33:10'),
(73, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Chrome 86.0.4240.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'Windows 10', '2020-11-12 15:56:23'),
(74, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-13 10:56:46'),
(75, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-13 13:55:25'),
(76, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Chrome 86.0.4240.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'Windows 10', '2020-11-13 14:07:46'),
(77, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-17 09:17:21'),
(78, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-17 13:49:43'),
(79, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-18 12:27:53'),
(80, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-20 09:31:18'),
(81, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 82.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', 'Windows 10', '2020-11-23 09:11:21'),
(82, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-11-24 09:36:11'),
(83, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-11-24 10:33:41'),
(84, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-11-27 09:11:41'),
(85, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-11-27 11:06:48'),
(86, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-11-30 09:09:11'),
(87, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-11-30 15:24:10'),
(88, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-01 12:01:46'),
(89, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-02 11:08:14'),
(90, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-02 14:42:40'),
(91, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-03 09:33:44'),
(92, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-04 09:33:10'),
(93, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-04 14:50:06'),
(94, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-07 09:29:02'),
(95, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-08 08:53:58'),
(96, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '127.0.0.1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-08 13:28:21'),
(97, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-09 16:34:30'),
(98, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-10 08:58:34'),
(99, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-10 14:07:31'),
(100, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-11 08:54:34'),
(101, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-11 09:14:59'),
(102, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-14 11:43:13'),
(103, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-15 09:14:21'),
(104, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-15 10:04:39'),
(105, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-16 08:53:45'),
(106, 'Admin', '{\"role\":\"Super Administrador\",\"name\":\"Administrador Administrador\",\"ruta\":\"30231172020-01-13.jpg\",\"email\":\"ppgaby20@gmail.com\"}', '::1', 'Firefox 83.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'Windows 10', '2020-12-17 08:49:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `codigo_edificio` int(11) NOT NULL,
  `codigo_oficina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `interno` varchar(15) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `notificacion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nombres`, `apellidos`, `foto`, `tipo`, `email`, `interno`, `activo`, `notificacion`) VALUES
('Admin', '$2y$10$M8.aJY/Ek6.YYhe3H5qKpug4H6DvTatSW/kirJTqphyVM9Cm3Q0pa', 'Administrador', 'Administrador', '30231172020-01-13.jpg', 'Super Administrador', 'ppgaby20@gmail.com', '1321', 1, 1),
('Administrador', '$2y$10$F4Now3.eLPlUzVZQQjs7ZOvfDIXVfdsNxzy0w.mVWO4fooXIjQjmi', 'Administrador', 'Administrador', NULL, 'Administrador', 'administrador@a.com', '1321', 1, 1),
('Auditor', '$2y$10$LyOv72A1HYtMO2VRMuYESeagzISzkgyyQaPZ2UgFMRvE3t.x7JKWy', 'Auditor', 'Auditor', NULL, 'Auditor', 'auditor@dd.com.uy', '1321', 1, 1),
('Consulta', '$2y$10$5jR9RP3ZVH3Jqb6FrmWVmu3YpMjCSU0YVGsMSjuewHMQMqPmUVfmu', 'Consulta', 'Consulta', NULL, 'Consulta', 'ppgaby20@hotmail.com', '1321', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `contrato_proveedor`
--
ALTER TABLE `contrato_proveedor`
  ADD PRIMARY KEY (`codigo_contrato`,`codigo_proveedor`),
  ADD KEY `codigo_proveedor` (`codigo_proveedor`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `equipo_insumo`
--
ALTER TABLE `equipo_insumo`
  ADD PRIMARY KEY (`codigo_equipo`,`codigo_insumo`),
  ADD KEY `codigo_insumo` (`codigo_insumo`);

--
-- Indices de la tabla `equipo_marca_modelo`
--
ALTER TABLE `equipo_marca_modelo`
  ADD PRIMARY KEY (`codigo_equipo`,`codigo_marca`,`codigo_modelo`),
  ADD KEY `codigo_marca` (`codigo_marca`),
  ADD KEY `codigo_modelo` (`codigo_modelo`);

--
-- Indices de la tabla `equipo_proveedor`
--
ALTER TABLE `equipo_proveedor`
  ADD PRIMARY KEY (`codigo_equipo`,`codigo_proveedor`),
  ADD KEY `codigo_proveedor` (`codigo_proveedor`);

--
-- Indices de la tabla `equipo_stock`
--
ALTER TABLE `equipo_stock`
  ADD PRIMARY KEY (`codigo_equipo`,`codigo_stock`),
  ADD KEY `codigo_stock` (`codigo_stock`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `insumo_marca_modelo`
--
ALTER TABLE `insumo_marca_modelo`
  ADD PRIMARY KEY (`codigo_insumo`,`codigo_marca`,`codigo_modelo`),
  ADD KEY `codigo_marca` (`codigo_marca`),
  ADD KEY `codigo_modelo` (`codigo_modelo`);

--
-- Indices de la tabla `insumo_proveedor`
--
ALTER TABLE `insumo_proveedor`
  ADD PRIMARY KEY (`codigo_insumo`,`codigo_proveedor`),
  ADD KEY `codigo_proveedor` (`codigo_proveedor`);

--
-- Indices de la tabla `insumo_stock`
--
ALTER TABLE `insumo_stock`
  ADD PRIMARY KEY (`codigo_insumo`,`codigo_stock`),
  ADD KEY `codigo_stock` (`codigo_stock`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `marca_modelo`
--
ALTER TABLE `marca_modelo`
  ADD PRIMARY KEY (`codigo_marca`,`codigo_modelo`,`origen`),
  ADD KEY `codigo_modelo` (`codigo_modelo`),
  ADD KEY `codigo_marca` (`codigo_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`codigo`,`codigo_edificio`),
  ADD KEY `codigo_edificio` (`codigo_edificio`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `persona_ubicacion`
--
ALTER TABLE `persona_ubicacion`
  ADD PRIMARY KEY (`login_persona`,`codigo_oficina`,`codigo_edificio`),
  ADD KEY `codigo_edificio` (`codigo_edificio`),
  ADD KEY `codigo_oficina` (`codigo_oficina`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `reporte_list`
--
ALTER TABLE `reporte_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `stock_equipo_asignado`
--
ALTER TABLE `stock_equipo_asignado`
  ADD PRIMARY KEY (`codigo_stock`,`codigo_equipo`,`fecha`),
  ADD KEY `codigo_quipo` (`codigo_equipo`);

--
-- Indices de la tabla `stock_persona`
--
ALTER TABLE `stock_persona`
  ADD PRIMARY KEY (`login_persona`,`codigo_stock`),
  ADD KEY `codigo_stock` (`codigo_stock`);

--
-- Indices de la tabla `stock_ubicacion`
--
ALTER TABLE `stock_ubicacion`
  ADD PRIMARY KEY (`codigo_stock`,`codigo_edificio`,`codigo_oficina`),
  ADD KEY `stock_ubicacion_ibfk_1` (`codigo_edificio`),
  ADD KEY `stock_ubicacion_ibfk_2` (`codigo_oficina`);

--
-- Indices de la tabla `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`codigo_oficina`,`codigo_edificio`),
  ADD KEY `codigo_edificio` (`codigo_edificio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=764;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `oficina`
--
ALTER TABLE `oficina`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reporte_list`
--
ALTER TABLE `reporte_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato_proveedor`
--
ALTER TABLE `contrato_proveedor`
  ADD CONSTRAINT `contrato_proveedor_ibfk_1` FOREIGN KEY (`codigo_contrato`) REFERENCES `contrato` (`codigo`),
  ADD CONSTRAINT `contrato_proveedor_ibfk_2` FOREIGN KEY (`codigo_proveedor`) REFERENCES `proveedor` (`codigo`);

--
-- Filtros para la tabla `equipo_insumo`
--
ALTER TABLE `equipo_insumo`
  ADD CONSTRAINT `equipo_insumo_ibfk_1` FOREIGN KEY (`codigo_equipo`) REFERENCES `equipo` (`codigo`),
  ADD CONSTRAINT `equipo_insumo_ibfk_2` FOREIGN KEY (`codigo_insumo`) REFERENCES `insumo` (`codigo`);

--
-- Filtros para la tabla `equipo_marca_modelo`
--
ALTER TABLE `equipo_marca_modelo`
  ADD CONSTRAINT `equipo_marca_modelo_ibfk_1` FOREIGN KEY (`codigo_equipo`) REFERENCES `equipo` (`codigo`),
  ADD CONSTRAINT `equipo_marca_modelo_ibfk_2` FOREIGN KEY (`codigo_marca`) REFERENCES `marca` (`codigo`),
  ADD CONSTRAINT `equipo_marca_modelo_ibfk_3` FOREIGN KEY (`codigo_modelo`) REFERENCES `modelo` (`codigo`);

--
-- Filtros para la tabla `equipo_proveedor`
--
ALTER TABLE `equipo_proveedor`
  ADD CONSTRAINT `equipo_proveedor_ibfk_1` FOREIGN KEY (`codigo_equipo`) REFERENCES `equipo` (`codigo`),
  ADD CONSTRAINT `equipo_proveedor_ibfk_2` FOREIGN KEY (`codigo_proveedor`) REFERENCES `proveedor` (`codigo`);

--
-- Filtros para la tabla `equipo_stock`
--
ALTER TABLE `equipo_stock`
  ADD CONSTRAINT `equipo_stock_ibfk_1` FOREIGN KEY (`codigo_stock`) REFERENCES `stock` (`codigo`),
  ADD CONSTRAINT `equipo_stock_ibfk_2` FOREIGN KEY (`codigo_equipo`) REFERENCES `equipo` (`codigo`);

--
-- Filtros para la tabla `insumo_marca_modelo`
--
ALTER TABLE `insumo_marca_modelo`
  ADD CONSTRAINT `insumo_marca_modelo_ibfk_1` FOREIGN KEY (`codigo_insumo`) REFERENCES `insumo` (`codigo`),
  ADD CONSTRAINT `insumo_marca_modelo_ibfk_2` FOREIGN KEY (`codigo_marca`) REFERENCES `marca` (`codigo`),
  ADD CONSTRAINT `insumo_marca_modelo_ibfk_3` FOREIGN KEY (`codigo_modelo`) REFERENCES `modelo` (`codigo`);

--
-- Filtros para la tabla `insumo_proveedor`
--
ALTER TABLE `insumo_proveedor`
  ADD CONSTRAINT `insumo_proveedor_ibfk_1` FOREIGN KEY (`codigo_insumo`) REFERENCES `insumo` (`codigo`),
  ADD CONSTRAINT `insumo_proveedor_ibfk_2` FOREIGN KEY (`codigo_proveedor`) REFERENCES `proveedor` (`codigo`);

--
-- Filtros para la tabla `insumo_stock`
--
ALTER TABLE `insumo_stock`
  ADD CONSTRAINT `insumo_stock_ibfk_1` FOREIGN KEY (`codigo_stock`) REFERENCES `stock` (`codigo`),
  ADD CONSTRAINT `insumo_stock_ibfk_2` FOREIGN KEY (`codigo_insumo`) REFERENCES `insumo` (`codigo`);

--
-- Filtros para la tabla `marca_modelo`
--
ALTER TABLE `marca_modelo`
  ADD CONSTRAINT `marca_modelo_ibfk_1` FOREIGN KEY (`codigo_marca`) REFERENCES `marca` (`codigo`),
  ADD CONSTRAINT `marca_modelo_ibfk_2` FOREIGN KEY (`codigo_modelo`) REFERENCES `modelo` (`codigo`);

--
-- Filtros para la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD CONSTRAINT `oficina_ibfk_1` FOREIGN KEY (`codigo_edificio`) REFERENCES `edificio` (`codigo`);

--
-- Filtros para la tabla `persona_ubicacion`
--
ALTER TABLE `persona_ubicacion`
  ADD CONSTRAINT `persona_ubicacion_ibfk_1` FOREIGN KEY (`login_persona`) REFERENCES `persona` (`login`),
  ADD CONSTRAINT `persona_ubicacion_ibfk_2` FOREIGN KEY (`codigo_edificio`) REFERENCES `edificio` (`codigo`),
  ADD CONSTRAINT `persona_ubicacion_ibfk_3` FOREIGN KEY (`codigo_oficina`) REFERENCES `oficina` (`codigo`);

--
-- Filtros para la tabla `stock_equipo_asignado`
--
ALTER TABLE `stock_equipo_asignado`
  ADD CONSTRAINT `stock_equipo_asignado_ibfk_1` FOREIGN KEY (`codigo_equipo`) REFERENCES `equipo` (`codigo`),
  ADD CONSTRAINT `stock_equipo_asignado_ibfk_2` FOREIGN KEY (`codigo_stock`) REFERENCES `stock` (`codigo`);

--
-- Filtros para la tabla `stock_persona`
--
ALTER TABLE `stock_persona`
  ADD CONSTRAINT `stock_persona_ibfk_1` FOREIGN KEY (`login_persona`) REFERENCES `persona` (`login`),
  ADD CONSTRAINT `stock_persona_ibfk_2` FOREIGN KEY (`codigo_stock`) REFERENCES `stock` (`codigo`);

--
-- Filtros para la tabla `stock_ubicacion`
--
ALTER TABLE `stock_ubicacion`
  ADD CONSTRAINT `stock_ubicacion_ibfk_1` FOREIGN KEY (`codigo_edificio`) REFERENCES `edificio` (`codigo`),
  ADD CONSTRAINT `stock_ubicacion_ibfk_2` FOREIGN KEY (`codigo_oficina`) REFERENCES `oficina` (`codigo`),
  ADD CONSTRAINT `stock_ubicacion_ibfk_3` FOREIGN KEY (`codigo_stock`) REFERENCES `stock` (`codigo`);

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`codigo_edificio`) REFERENCES `edificio` (`codigo`),
  ADD CONSTRAINT `ubicacion_ibfk_2` FOREIGN KEY (`codigo_oficina`) REFERENCES `oficina` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
