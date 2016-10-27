/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : caliente

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-10-27 10:31:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contacto
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `id_contacto` int(10) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(4) DEFAULT NULL,
  `tipo_mensaje` tinyint(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tarjeta` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `promociones` tinyint(1) NOT NULL DEFAULT '0',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_contacto`),
  KEY `id_sucursal` (`id_sucursal`) USING BTREE,
  CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
