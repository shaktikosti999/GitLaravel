/*
Navicat MySQL Data Transfer

Source Server         : Abargon
Source Server Version : 50552
Source Host           : 104.130.205.132:3306
Source Database       : casinocaliente

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2016-11-15 15:35:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for red_social
-- ----------------------------
DROP TABLE IF EXISTS `red_social`;
CREATE TABLE `red_social` (
  `id_red` int(3) NOT NULL AUTO_INCREMENT,
  `tipo` int(3) NOT NULL,
  `id_sucursal` int(4) NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_red`),
  KEY `tipo` (`tipo`),
  KEY `id_sucursal` (`id_sucursal`),
  CONSTRAINT `red_social_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_red` (`id_tipo`) ON UPDATE CASCADE,
  CONSTRAINT `red_social_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
