/*
Navicat MySQL Data Transfer

Source Server         : Abargon
Source Server Version : 50552
Source Host           : 104.130.205.132:3306
Source Database       : casinocaliente

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2016-11-15 15:57:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sucursal
-- ----------------------------
DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE `sucursal` (
  `id_sucursal` int(4) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `latitud` varchar(50) NOT NULL,
  `longitud` varchar(50) NOT NULL,
  `horario` text NOT NULL,
  `instrucciones` text NOT NULL,
  `telefono` text NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `eliminado` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_sucursal`),
  KEY `id_ciudad` (`id_ciudad`),
  CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sucursal
-- ----------------------------
INSERT INTO `sucursal` VALUES ('1', '1', 'Tecamachalco', 'tecamachalco', 'Calle Fuente del molino <br />\r\n#49-BCol. San Miguel<br /> \r\nTecamachalco Naucalpan, Edo.<br /> \r\nde México C.P. 53970', '19.424555', '-99.230653', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Teléfono: 01 + 55 123456789<br />\r\nTeléfono: 045 + 55 123456789<br />\r\nTeléfono: 779 + 55 123456789<br />', '1', '0', '0000-00-00 00:00:00', '2016-10-07 10:24:51');
INSERT INTO `sucursal` VALUES ('3', '2', 'Piedras Negras', 'piedras-negras', 'Calle Fuente del molino <br />\r\n#49-BCol. San Miguel<br /> \r\nPiedras Negras,<br /> \r\nCoahuila C.P. 53970', '19.424555', '-99.230653', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Teléfono: 01 + 55 123456789<br />\r\nTeléfono: 045 + 55 123456789<br />\r\nTeléfono: 779 + 55 123456789<br />', '1', '0', '0000-00-00 00:00:00', '2016-10-07 10:24:51');
