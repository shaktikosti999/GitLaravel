/*
Navicat MySQL Data Transfer

Source Server         : Abargon
Source Server Version : 50552
Source Host           : 104.130.205.132:3306
Source Database       : casinocaliente

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2016-11-15 15:35:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tipo_red
-- ----------------------------
DROP TABLE IF EXISTS `tipo_red`;
CREATE TABLE `tipo_red` (
  `id_tipo` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tipo_red
-- ----------------------------
INSERT INTO `tipo_red` VALUES ('1', 'FACEBOOK');
INSERT INTO `tipo_red` VALUES ('2', 'TWITTER');
INSERT INTO `tipo_red` VALUES ('3', 'YOUTUBE');
INSERT INTO `tipo_red` VALUES ('4', 'GOOGLE');
