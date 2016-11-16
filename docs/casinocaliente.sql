/*
Navicat MySQL Data Transfer

Source Server         : Abargon
Source Server Version : 50552
Source Host           : 104.130.205.132:3306
Source Database       : casinocaliente

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2016-11-16 17:14:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alimento
-- ----------------------------
DROP TABLE IF EXISTS `alimento`;
CREATE TABLE `alimento` (
`id_alimento`  int(5) NOT NULL AUTO_INCREMENT ,
`tipo_alimento`  tinyint(1) NOT NULL ,
`categoria_alimento`  tinyint(1) NOT NULL ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`archivo`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_alimento`),
FOREIGN KEY (`tipo_alimento`) REFERENCES `tipo_alimento` (`id_tipo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `tipo_alimento` (`tipo_alimento`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of alimento
-- ----------------------------
BEGIN;
INSERT INTO `alimento` VALUES ('1', '1', '1', 'Dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur dolor id sem egestas accumsan.', 'css/images/temp/menu1.jpg', '1', '0', '2016-08-22 15:54:56', '2016-08-30 09:27:21'), ('3', '1', '1', 'Hamburguesa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur dolor id sem egestas accumsan.', 'css/images/temp/menu2.jpg', '1', '0', '2016-08-22 15:54:56', '2016-08-30 09:27:21'), ('4', '1', '2', 'Tacos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur dolor id sem egestas accumsan.', 'css/images/temp/menu5.jpg', '1', '0', '2016-08-22 15:54:56', '2016-08-30 09:27:21'), ('5', '1', '3', 'Ensalada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur dolor id sem egestas accumsan.', 'css/images/temp/menu10.jpg', '1', '0', '2016-08-22 15:54:56', '2016-08-30 09:27:21'), ('6', '2', '4', 'Bebida', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur dolor id sem egestas accumsan.', 'css/images/temp/menu11.jpg', '1', '0', '2016-08-22 15:54:56', '2016-08-30 09:27:21');
COMMIT;

-- ----------------------------
-- Table structure for alimento_sucursal
-- ----------------------------
DROP TABLE IF EXISTS `alimento_sucursal`;
CREATE TABLE `alimento_sucursal` (
`id_alimento`  int(5) NOT NULL ,
`id_sucursal`  int(4) NOT NULL ,
`tipo_venta`  tinyint(1) NOT NULL ,
`descripcion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id_alimento`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`tipo_venta`) REFERENCES `tipo_venta` (`id_tipo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_alimento` (`id_alimento`) USING BTREE ,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE ,
INDEX `tipo_venta` (`tipo_venta`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of alimento_sucursal
-- ----------------------------
BEGIN;
INSERT INTO `alimento_sucursal` VALUES ('1', '1', '1', 'Description', 'file'), ('3', '1', '1', 'Description', 'file'), ('4', '3', '1', 'Description', 'file'), ('5', '3', '1', 'Description', 'file'), ('6', '3', '1', 'Description', 'file');
COMMIT;

-- ----------------------------
-- Table structure for carrerapdf
-- ----------------------------
DROP TABLE IF EXISTS `carrerapdf`;
CREATE TABLE `carrerapdf` (
`id_carrerapdf`  int(6) NOT NULL AUTO_INCREMENT ,
`id_sucursal`  int(4) NOT NULL ,
`id_juego`  int(3) NOT NULL ,
`titulo`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fecha`  date NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_carrerapdf`),
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE ,
INDEX `id_juego` (`id_juego`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of carrerapdf
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for categoria_alimento
-- ----------------------------
DROP TABLE IF EXISTS `categoria_alimento`;
CREATE TABLE `categoria_alimento` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`id_tipo_alimento`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_tipo_alimento`) REFERENCES `tipo_alimento` (`id_tipo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `id_tipo_alimento` (`id_tipo_alimento`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of categoria_alimento
-- ----------------------------
BEGIN;
INSERT INTO `categoria_alimento` VALUES ('1', 'Platillos promocionales', '1'), ('2', 'Ofertas del mes', '1'), ('3', 'Platillos regulares', '1'), ('4', 'Bebidas promocionales', '2');
COMMIT;

-- ----------------------------
-- Table structure for ciudad
-- ----------------------------
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
`id_ciudad`  int(6) NOT NULL AUTO_INCREMENT ,
`id_municipio`  int(6) NULL DEFAULT NULL ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
PRIMARY KEY (`id_ciudad`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of ciudad
-- ----------------------------
BEGIN;
INSERT INTO `ciudad` VALUES ('1', null, 'UNO'), ('2', null, 'DOS');
COMMIT;

-- ----------------------------
-- Table structure for contacto
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
`id_contacto`  int(10) NOT NULL AUTO_INCREMENT ,
`id_sucursal`  int(4) NULL DEFAULT NULL ,
`tipo_mensaje`  tinyint(2) NOT NULL ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`tarjeta`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`telefono`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`mensaje`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`promociones`  tinyint(1) NOT NULL DEFAULT 0 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_contacto`),
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=9

;

-- ----------------------------
-- Records of contacto
-- ----------------------------
BEGIN;
INSERT INTO `contacto` VALUES ('5', null, '2', 'Nombre', 'mail@mail.com', 'asdf3423d', '31231231231', 'El mensaje', '1', '0', '2016-10-27 11:23:06', '2016-10-27 11:23:06'), ('6', null, '1', 'zapatos', 'mail@mail.com', 'asdfasd123', '312312312', 'asdfasdfasdfasdf', '1', '0', '2016-10-27 11:24:29', '2016-10-27 11:24:29'), ('7', null, '2', 'Nombre', 'mail@mail.com', 'asdfasdf1324', '3123123', 'asfdasfd', '1', '0', '2016-10-27 11:33:35', '2016-10-27 11:33:35'), ('8', '1', '4', 'test', 'victorr.cano@gmail.com', 'weqwrewerwerwerw', '32134234', 'eqweqweqe', '0', '0', '2016-10-27 12:00:43', '2016-10-27 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for contenido_simple
-- ----------------------------
DROP TABLE IF EXISTS `contenido_simple`;
CREATE TABLE `contenido_simple` (
`id_contenido`  int(4) NOT NULL AUTO_INCREMENT ,
`id_padre`  int(4) NULL DEFAULT NULL ,
`titulo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slug`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`contenido`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL ,
`menu_principal`  tinyint(1) NOT NULL ,
`menu_inferior`  tinyint(1) NOT NULL ,
`link`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_contenido`),
FOREIGN KEY (`id_padre`) REFERENCES `contenido_simple` (`id_contenido`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_padre` (`id_padre`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of contenido_simple
-- ----------------------------
BEGIN;
INSERT INTO `contenido_simple` VALUES ('1', null, 'Caliente Club', 'caliente_club', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', ''), ('2', null, 'Ubicaciones', 'ubicaciones', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', ''), ('3', null, 'Quienes somos', 'quienes_somos', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', ''), ('4', null, 'Juego responsable', 'juego_responsable', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', ''), ('5', null, 'Aviso de privacidad', 'aviso_de_privacidad', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', ''), ('6', null, 'Bolsa de trabajo', 'bolsa_de_trabajo', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', ''), ('7', null, 'Aprende a jugar', 'aprende_a_jugar', 'css/images/temp/article2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a convallis quam, consectetur vulputate erat. Fusce faucibus nisi in quam finibus, eget sodales erat vestibulum. Donec quis massa vitae neque rutrum pulvinar. Aliquam sagittis lacus in nulla aliquet lobortis. Aliquam sed tellus a lacus malesuada lacinia. Curabitur imperdiet orci sed vulputate porttitor. Morbi eu tellus aliquam, commodo nunc non, commodo ex. Aenean sit amet tristique metus. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi ex, viverra non consectetur et, ullamcorper non justo. Sed pharetra mattis tristique.', '1', '1', '0', '');
COMMIT;

-- ----------------------------
-- Table structure for juego
-- ----------------------------
DROP TABLE IF EXISTS `juego`;
CREATE TABLE `juego` (
`id_juego`  int(3) NOT NULL AUTO_INCREMENT ,
`id_linea`  int(2) NOT NULL ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`titulo`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`imagen`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`resumen`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`aprender`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`reglas`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_juego`),
FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_linea` (`id_linea`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of juego
-- ----------------------------
BEGIN;
INSERT INTO `juego` VALUES ('1', '1', 'Premium Roulette', 'Premium Roulette', 'css/images/temp/game-machine1.jpg', '15 giros GRATIS con multiplicador de desmoronamiento de carretes.\r\n', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36'), ('2', '1', 'Perfect Black Jack', 'Perfect Black Jack', 'css/images/temp/game-machine2.jpg', '12 giros GRATIS el multiplicador se aplica al giro en curso . El multiplicador baja un nivel en los giros en los que no aparece símbolo.', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36'), ('3', '1', 'Casino Hold ‘Em', 'Casino Hold ‘Em', 'css/images/temp/game-machine3.jpg', 'Todas las ganancias en partidas gratis serán triplicadas.', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36'), ('4', '1', 'White King', 'White King', 'css/images/temp/game-machine4.jpg', '15 partidas GRATIS con el multiplicador x3.', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36'), ('5', '2', 'Ruleta', 'Ruleta', 'css/images/temp/game-machine1.jpg', '15 giros GRATIS con multiplicador de desmoronamiento de carretes.\r\n', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36'), ('6', '2', 'Blackjack', 'Blackjack', 'css/images/temp/game-machine1.jpg', '15 giros GRATIS con multiplicador de desmoronamiento de carretes.\r\n', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36'), ('7', '2', 'Baccarat', 'Baccarat', 'css/images/temp/game-machine1.jpg', '15 giros GRATIS con multiplicador de desmoronamiento de carretes.\r\n', 'Aprender Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', 'Reglas Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '1', '0', '2016-08-30 16:48:42', '2016-09-29 13:16:36');
COMMIT;

-- ----------------------------
-- Table structure for juego_sucursal
-- ----------------------------
DROP TABLE IF EXISTS `juego_sucursal`;
CREATE TABLE `juego_sucursal` (
`id_juego`  int(3) NOT NULL ,
`id_sucursal`  int(4) NOT NULL ,
`descripcion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' ,
`disponibles`  int(3) NULL DEFAULT NULL COMMENT 'la cantidad de mesas, máquinas, etc que existan en la sucursal' ,
`acumulado`  int(10) NOT NULL DEFAULT 0 ,
`apuesta_minima`  int(4) NULL DEFAULT NULL ,
`link`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_juego` (`id_juego`) USING BTREE ,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of juego_sucursal
-- ----------------------------
BEGIN;
INSERT INTO `juego_sucursal` VALUES ('1', '1', 'asdfa', '/assets/images/juegos/k5crdehb76i10avyu.jpg', '12', '0', '12', 'asdf.com', '1', '2016-10-11 14:13:31', '2016-10-11 14:13:31'), ('2', '1', 'Ruleta123', '/assets/images/juegos/b3f69y6iychd5ek82.jpg', '12', '0', '12', '12', '1', '2016-10-11 14:15:08', '2016-10-11 14:15:08'), ('3', '3', 'Ruleta123', '/assets/images/juegos/goblhetl0kr077dmw.jpg', '12', '0', '12', '12', '1', '2016-10-11 14:27:54', '2016-10-11 14:27:54'), ('4', '3', 'Ruleta123', '/assets/images/juegos/t0gz552nxrzmuj7hf.jpg', '12', '0', '12', '12', '1', '2016-10-11 14:43:08', '2016-10-11 14:43:08');
COMMIT;

-- ----------------------------
-- Table structure for linea
-- ----------------------------
DROP TABLE IF EXISTS `linea`;
CREATE TABLE `linea` (
`id_linea`  int(2) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slug`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slogan`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`icono`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`imagen`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_linea`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of linea
-- ----------------------------
BEGIN;
INSERT INTO `linea` VALUES ('1', 'Máquinas de juego', 'maquinas-de-juego', 'Diviertete', 'ico-robot', 'css/images/temp/feature1.jpg', '1', '0', '2016-08-30 09:57:57', '2016-08-30 16:10:51'), ('2', 'Mesas de juego', 'mesas-de-juego', 'Apuesta', 'ico-die', 'css/images/temp/feature2.jpg', '1', '0', '2016-08-30 16:12:43', '2016-10-27 14:13:59'), ('3', 'Apuesta deportiva', 'apuesta-deportiva', 'Apasionante', 'ico-ball', 'css/images/temp/feature3.jpg', '1', '0', '2016-08-30 16:12:43', '2016-10-27 14:13:59'), ('4', 'Apuesta de carreras', 'apuesta-de-carreras', 'Emocionante', 'ico-horse', 'css/images/temp/feature4.jpg', '1', '0', '2016-08-30 16:12:43', '2016-10-27 14:14:01');
COMMIT;

-- ----------------------------
-- Table structure for linea_galeria
-- ----------------------------
DROP TABLE IF EXISTS `linea_galeria`;
CREATE TABLE `linea_galeria` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`id_linea`  int(2) NOT NULL ,
`imagen`  varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `id_linea` (`id_linea`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of linea_galeria
-- ----------------------------
BEGIN;
INSERT INTO `linea_galeria` VALUES ('1', '1', 'css/images/temp/slider-secondary1.jpg'), ('2', '1', 'css/images/temp/slider-secondary1.jpg'), ('4', '2', 'css/images/temp/slider-secondary1.jpg'), ('5', '2', 'css/images/temp/slider-secondary1.jpg');
COMMIT;

-- ----------------------------
-- Table structure for log_actividad
-- ----------------------------
DROP TABLE IF EXISTS `log_actividad`;
CREATE TABLE `log_actividad` (
`id_actividad`  int(10) NOT NULL AUTO_INCREMENT ,
`id_sesion`  int(10) NOT NULL ,
`id_modulo`  int(5) NOT NULL ,
`id_permiso`  tinyint(2) NOT NULL ,
`id_elemento`  int(11) NOT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_actividad`),
FOREIGN KEY (`id_sesion`) REFERENCES `log_session` (`id_sesion`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_modulo`) REFERENCES `sys_modulo` (`id_modulo`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_permiso`) REFERENCES `sys_permiso` (`id_permiso`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_sesion` (`id_sesion`) USING BTREE ,
INDEX `id_modulo` (`id_modulo`) USING BTREE ,
INDEX `id_permiso` (`id_permiso`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=511

;

-- ----------------------------
-- Records of log_actividad
-- ----------------------------
BEGIN;
INSERT INTO `log_actividad` VALUES ('1', '6', '1', '1', '0', '2016-05-19 22:51:07', '2016-05-19 22:51:07'), ('2', '6', '1', '1', '0', '2016-05-19 22:55:15', '2016-05-19 22:55:15'), ('3', '6', '1', '1', '0', '2016-05-19 22:57:18', '2016-05-19 22:57:18'), ('4', '6', '1', '1', '0', '2016-05-19 23:00:28', '2016-05-19 23:00:28'), ('5', '6', '1', '1', '0', '2016-05-19 23:00:42', '2016-05-19 23:00:42'), ('6', '6', '1', '1', '0', '2016-05-19 23:01:00', '2016-05-19 23:01:00'), ('7', '6', '1', '2', '0', '2016-05-19 23:42:09', '2016-05-19 23:42:09'), ('9', '6', '1', '1', '8', '2016-05-20 00:41:23', '2016-05-20 00:41:23'), ('10', '6', '1', '1', '9', '2016-05-20 00:42:24', '2016-05-20 00:42:24'), ('11', '6', '1', '1', '15', '2016-05-20 00:45:04', '2016-05-20 00:45:04'), ('12', '7', '1', '1', '1', '2016-05-20 12:51:52', '2016-05-20 12:51:52'), ('13', '7', '1', '1', '2', '2016-05-20 12:54:28', '2016-05-20 12:54:28'), ('14', '7', '1', '1', '3', '2016-05-20 12:55:00', '2016-05-20 12:55:00'), ('15', '7', '1', '1', '4', '2016-05-20 12:56:02', '2016-05-20 12:56:02'), ('16', '7', '1', '1', '5', '2016-05-20 12:57:03', '2016-05-20 12:57:03'), ('17', '7', '1', '1', '6', '2016-05-20 12:57:38', '2016-05-20 12:57:38'), ('18', '7', '1', '1', '7', '2016-05-20 12:59:20', '2016-05-20 12:59:20'), ('19', '7', '1', '2', '1', '2016-05-20 12:59:51', '2016-05-20 12:59:51'), ('20', '7', '1', '2', '1', '2016-05-20 13:01:48', '2016-05-20 13:01:48'), ('21', '7', '1', '2', '1', '2016-05-20 13:02:14', '2016-05-20 13:02:14'), ('22', '7', '1', '2', '1', '2016-05-20 13:02:32', '2016-05-20 13:02:32'), ('23', '7', '1', '2', '1', '2016-05-20 13:02:57', '2016-05-20 13:02:57'), ('24', '7', '1', '2', '1', '2016-05-20 13:03:08', '2016-05-20 13:03:08'), ('25', '7', '1', '2', '1', '2016-05-20 08:08:01', '2016-05-20 08:08:01'), ('26', '7', '1', '2', '1', '2016-05-20 08:08:17', '2016-05-20 08:08:17'), ('27', '7', '1', '2', '1', '2016-05-20 08:09:46', '2016-05-20 08:09:46'), ('28', '7', '1', '2', '1', '2016-05-20 08:10:04', '2016-05-20 08:10:04'), ('29', '7', '1', '2', '1', '2016-05-20 08:10:24', '2016-05-20 08:10:24'), ('30', '7', '1', '2', '1', '2016-05-20 08:10:38', '2016-05-20 08:10:38'), ('33', '7', '1', '2', '1', '2016-05-20 08:11:37', '2016-05-20 08:11:37'), ('34', '7', '1', '2', '1', '2016-05-20 08:12:30', '2016-05-20 08:12:30'), ('35', '7', '1', '2', '1', '2016-05-20 08:13:09', '2016-05-20 08:13:09'), ('36', '7', '1', '2', '1', '2016-05-20 08:13:37', '2016-05-20 08:13:37'), ('37', '7', '1', '2', '1', '2016-05-20 08:16:00', '2016-05-20 08:16:00'), ('38', '7', '1', '2', '1', '2016-05-20 08:16:07', '2016-05-20 08:16:07'), ('39', '7', '2', '2', '1', '2016-05-20 08:16:07', '2016-05-20 08:16:07'), ('40', '7', '1', '2', '1', '2016-05-20 08:16:26', '2016-05-20 08:16:26'), ('41', '7', '2', '2', '1', '2016-05-20 08:16:26', '2016-05-20 08:16:26'), ('42', '7', '1', '2', '2', '2016-05-20 08:17:26', '2016-05-20 08:17:26'), ('43', '7', '2', '2', '2', '2016-05-20 08:17:26', '2016-05-20 08:17:26'), ('44', '7', '2', '2', '2', '2016-05-20 08:18:13', '2016-05-20 08:18:13'), ('45', '7', '2', '1', '2', '2016-05-20 08:29:52', '2016-05-20 08:29:52'), ('46', '7', '2', '2', '2', '2016-05-20 08:30:13', '2016-05-20 08:30:13'), ('47', '7', '2', '1', '8', '2016-05-20 09:01:09', '2016-05-20 09:01:09'), ('48', '7', '2', '1', '9', '2016-05-20 09:01:53', '2016-05-20 09:01:53'), ('49', '7', '2', '1', '10', '2016-05-20 09:05:06', '2016-05-20 09:05:06'), ('50', '7', '2', '1', '11', '2016-05-20 09:05:17', '2016-05-20 09:05:17'), ('51', '7', '2', '1', '12', '2016-05-20 09:20:51', '2016-05-20 09:20:51'), ('52', '7', '3', '2', '3', '2016-05-20 09:21:49', '2016-05-20 09:21:49'), ('53', '7', '3', '2', '3', '2016-05-20 09:21:49', '2016-05-20 09:21:49'), ('54', '7', '4', '1', '4', '2016-05-20 09:26:24', '2016-05-20 09:26:24'), ('55', '7', '4', '2', '4', '2016-05-20 09:27:18', '2016-05-20 09:27:18'), ('56', '7', '7', '4', '1', '2016-05-20 10:42:34', '2016-05-20 10:42:34'), ('57', '7', '7', '4', '2', '2016-05-20 10:43:05', '2016-05-20 10:43:05'), ('58', '7', '3', '3', '1', '2016-05-20 12:01:19', '2016-05-20 12:01:19'), ('59', '7', '3', '3', '1', '2016-05-20 12:14:37', '2016-05-20 12:14:37'), ('60', '7', '3', '3', '1', '2016-05-20 14:04:48', '2016-05-20 14:04:48'), ('61', '7', '3', '3', '1', '2016-05-20 14:05:15', '2016-05-20 14:05:15'), ('62', '7', '3', '3', '1', '2016-05-20 14:06:35', '2016-05-20 14:06:35'), ('63', '7', '3', '3', '1', '2016-05-20 14:10:05', '2016-05-20 14:10:05'), ('64', '7', '3', '3', '1', '2016-05-20 14:10:47', '2016-05-20 14:10:47'), ('68', '7', '3', '3', '1', '2016-05-20 14:14:46', '2016-05-20 14:14:46'), ('69', '7', '3', '3', '2', '2016-05-20 14:16:52', '2016-05-20 14:16:52'), ('70', '7', '5', '3', '1', '2016-05-20 14:17:14', '2016-05-20 14:17:14'), ('71', '11', '2', '2', '1', '2016-05-23 16:47:58', '2016-05-23 16:47:58'), ('72', '11', '2', '2', '1', '2016-05-23 16:50:28', '2016-05-23 16:50:28'), ('73', '11', '2', '2', '1', '2016-05-23 16:51:41', '2016-05-23 16:51:41'), ('74', '11', '2', '2', '2', '2016-05-23 16:55:13', '2016-05-23 16:55:13'), ('75', '11', '2', '2', '3', '2016-05-23 16:55:25', '2016-05-23 16:55:25'), ('76', '11', '2', '2', '4', '2016-05-23 16:55:40', '2016-05-23 16:55:40'), ('77', '11', '2', '2', '5', '2016-05-23 16:55:51', '2016-05-23 16:55:51'), ('78', '11', '2', '2', '6', '2016-05-23 16:56:02', '2016-05-23 16:56:02'), ('79', '11', '2', '2', '7', '2016-05-23 16:56:16', '2016-05-23 16:56:16'), ('80', '12', '3', '4', '1', '2016-05-23 18:23:40', '2016-05-23 18:23:40'), ('81', '12', '3', '4', '1', '2016-05-23 18:23:41', '2016-05-23 18:23:41'), ('82', '15', '7', '3', '2', '2016-05-24 15:06:13', '2016-05-24 15:06:13'), ('83', '16', '4', '1', '5', '2016-05-24 19:11:38', '2016-05-24 19:11:38'), ('84', '18', '7', '1', '3', '2016-05-25 17:29:44', '2016-05-25 17:29:44'), ('85', '18', '7', '3', '3', '2016-05-25 17:35:24', '2016-05-25 17:35:24'), ('86', '18', '4', '1', '6', '2016-05-25 17:47:52', '2016-05-25 17:47:52'), ('87', '19', '7', '5', '3', '2016-05-26 17:25:44', '2016-05-26 17:25:44'), ('88', '19', '7', '5', '2', '2016-05-26 19:05:58', '2016-05-26 19:05:58'), ('89', '19', '3', '4', '2', '2016-05-26 19:08:54', '2016-05-26 19:08:54'), ('90', '19', '3', '3', '3', '2016-05-26 19:11:17', '2016-05-26 19:11:17'), ('91', '19', '3', '3', '2', '2016-05-26 19:11:20', '2016-05-26 19:11:20'), ('92', '19', '3', '5', '2', '2016-05-26 19:11:54', '2016-05-26 19:11:54'), ('93', '19', '3', '5', '2', '2016-05-26 19:11:56', '2016-05-26 19:11:56'), ('94', '19', '3', '5', '3', '2016-05-26 19:11:59', '2016-05-26 19:11:59'), ('95', '19', '3', '5', '1', '2016-05-26 19:12:00', '2016-05-26 19:12:00'), ('96', '19', '5', '5', '1', '2016-05-26 19:16:59', '2016-05-26 19:16:59'), ('97', '19', '5', '3', '1', '2016-05-26 19:17:07', '2016-05-26 19:17:07'), ('98', '20', '5', '5', '1', '2016-05-27 16:16:19', '2016-05-27 16:16:19'), ('99', '20', '7', '3', '3', '2016-05-27 16:16:51', '2016-05-27 16:16:51'), ('100', '20', '7', '5', '3', '2016-05-27 16:17:03', '2016-05-27 16:17:03'), ('101', '20', '3', '3', '2', '2016-05-27 16:17:25', '2016-05-27 16:17:25'), ('102', '20', '7', '1', '4', '2016-05-27 16:19:50', '2016-05-27 16:19:50'), ('103', '20', '7', '3', '4', '2016-05-27 16:20:00', '2016-05-27 16:20:00'), ('104', '20', '7', '5', '4', '2016-05-27 16:20:12', '2016-05-27 16:20:12'), ('105', '20', '7', '1', '5', '2016-05-27 16:22:06', '2016-05-27 16:22:06'), ('106', '20', '7', '1', '6', '2016-05-27 16:39:27', '2016-05-27 16:39:27');
INSERT INTO `log_actividad` VALUES ('107', '20', '7', '1', '7', '2016-05-27 16:41:25', '2016-05-27 16:41:25'), ('108', '20', '7', '1', '8', '2016-05-27 16:41:50', '2016-05-27 16:41:50'), ('109', '20', '7', '3', '8', '2016-05-27 16:42:01', '2016-05-27 16:42:01'), ('110', '20', '7', '2', '8', '2016-05-27 17:41:55', '2016-05-27 17:41:55'), ('111', '20', '7', '2', '8', '2016-05-27 17:42:44', '2016-05-27 17:42:44'), ('112', '20', '7', '2', '2', '2016-05-27 17:44:41', '2016-05-27 17:44:41'), ('113', '20', '7', '3', '6', '2016-05-27 17:47:35', '2016-05-27 17:47:35'), ('114', '20', '7', '3', '7', '2016-05-27 17:48:12', '2016-05-27 17:48:12'), ('115', '20', '7', '5', '8', '2016-05-27 17:48:20', '2016-05-27 17:48:20'), ('116', '20', '7', '5', '6', '2016-05-27 17:48:24', '2016-05-27 17:48:24'), ('117', '20', '7', '5', '7', '2016-05-27 17:48:28', '2016-05-27 17:48:28'), ('118', '20', '3', '5', '2', '2016-05-27 17:48:33', '2016-05-27 17:48:33'), ('119', '20', '7', '4', '6', '2016-05-27 17:49:14', '2016-05-27 17:49:14'), ('120', '20', '7', '4', '5', '2016-05-27 17:49:14', '2016-05-27 17:49:14'), ('121', '20', '7', '4', '8', '2016-05-27 17:49:15', '2016-05-27 17:49:15'), ('122', '20', '7', '4', '5', '2016-05-27 17:49:33', '2016-05-27 17:49:33'), ('123', '20', '7', '3', '7', '2016-05-27 17:49:43', '2016-05-27 17:49:43'), ('124', '20', '7', '3', '6', '2016-05-27 17:49:47', '2016-05-27 17:49:47'), ('125', '20', '7', '2', '5', '2016-05-27 17:49:52', '2016-05-27 17:49:52'), ('126', '20', '7', '3', '5', '2016-05-27 17:59:11', '2016-05-27 17:59:11'), ('127', '20', '7', '3', '8', '2016-05-27 17:59:21', '2016-05-27 17:59:21'), ('128', '20', '7', '5', '7', '2016-05-27 17:59:34', '2016-05-27 17:59:34'), ('129', '20', '7', '5', '6', '2016-05-27 17:59:36', '2016-05-27 17:59:36'), ('130', '20', '7', '5', '5', '2016-05-27 17:59:38', '2016-05-27 17:59:38'), ('131', '20', '7', '5', '8', '2016-05-27 17:59:40', '2016-05-27 17:59:40'), ('132', '22', '7', '3', '5', '2016-05-30 10:02:23', '2016-05-30 10:02:23'), ('133', '22', '7', '3', '6', '2016-05-30 10:02:28', '2016-05-30 10:02:28'), ('134', '22', '7', '5', '5', '2016-05-30 10:02:35', '2016-05-30 10:02:35'), ('135', '22', '7', '5', '6', '2016-05-30 10:02:37', '2016-05-30 10:02:37'), ('136', '24', '4', '1', '7', '2016-05-30 17:23:50', '2016-05-30 17:23:50'), ('137', '24', '4', '1', '8', '2016-05-30 17:24:49', '2016-05-30 17:24:49'), ('138', '24', '4', '3', '8', '2016-05-30 17:25:27', '2016-05-30 17:25:27'), ('139', '24', '4', '5', '8', '2016-05-30 17:32:09', '2016-05-30 17:32:09'), ('140', '24', '4', '3', '8', '2016-05-30 17:32:27', '2016-05-30 17:32:27'), ('141', '27', '2', '2', '1', '2016-05-31 18:44:29', '2016-05-31 18:44:29'), ('142', '27', '2', '2', '2', '2016-05-31 18:45:45', '2016-05-31 18:45:45'), ('143', '27', '2', '2', '3', '2016-05-31 18:47:21', '2016-05-31 18:47:21'), ('144', '27', '2', '2', '7', '2016-05-31 18:47:54', '2016-05-31 18:47:54'), ('145', '27', '2', '2', '4', '2016-05-31 18:50:03', '2016-05-31 18:50:03'), ('146', '27', '2', '2', '5', '2016-05-31 18:50:19', '2016-05-31 18:50:19'), ('147', '27', '2', '2', '6', '2016-05-31 18:50:31', '2016-05-31 18:50:31'), ('148', '27', '2', '2', '7', '2016-05-31 19:04:31', '2016-05-31 19:04:31'), ('149', '27', '2', '2', '3', '2016-05-31 19:05:57', '2016-05-31 19:05:57'), ('150', '32', '2', '2', '12', '2016-06-02 23:50:52', '2016-06-02 23:50:52'), ('151', '32', '2', '3', '12', '2016-06-02 23:58:35', '2016-06-02 23:58:35'), ('152', '32', '2', '3', '12', '2016-06-03 00:00:23', '2016-06-03 00:00:23'), ('153', '32', '2', '3', '12', '2016-06-03 00:00:46', '2016-06-03 00:00:46'), ('154', '32', '2', '3', '12', '2016-06-03 00:02:17', '2016-06-03 00:02:17'), ('155', '32', '2', '3', '12', '2016-06-03 00:02:43', '2016-06-03 00:02:43'), ('156', '32', '2', '3', '8', '2016-06-03 00:05:39', '2016-06-03 00:05:39'), ('157', '32', '2', '3', '9', '2016-06-03 00:05:46', '2016-06-03 00:05:46'), ('158', '32', '2', '3', '11', '2016-06-03 00:05:49', '2016-06-03 00:05:49'), ('159', '32', '2', '3', '10', '2016-06-03 00:05:53', '2016-06-03 00:05:53'), ('160', '33', '4', '4', '1', '2016-06-07 22:39:20', '2016-06-07 22:39:20'), ('161', '33', '4', '4', '1', '2016-06-07 22:39:38', '2016-06-07 22:39:38'), ('162', '34', '2', '5', '12', '2016-06-13 10:41:48', '2016-06-13 10:41:48'), ('163', '35', '3', '3', '2', '2016-06-13 11:46:20', '2016-06-13 11:46:20'), ('164', '35', '3', '5', '2', '2016-06-13 11:46:31', '2016-06-13 11:46:31'), ('165', '35', '4', '5', '8', '2016-06-13 12:53:48', '2016-06-13 12:53:48'), ('166', '35', '3', '3', '2', '2016-06-13 12:57:09', '2016-06-13 12:57:09'), ('167', '36', '2', '4', '5', '2016-06-13 13:41:52', '2016-06-13 13:41:52'), ('168', '36', '2', '4', '5', '2016-06-13 13:41:56', '2016-06-13 13:41:56'), ('169', '36', '1', '1', '3', '2016-06-13 13:52:54', '2016-06-13 13:52:54'), ('170', '36', '1', '1', '4', '2016-06-13 14:02:51', '2016-06-13 14:02:51'), ('171', '36', '1', '1', '5', '2016-06-13 14:03:43', '2016-06-13 14:03:43'), ('172', '36', '1', '3', '5', '2016-06-13 14:04:01', '2016-06-13 14:04:01'), ('173', '37', '1', '3', '2', '2016-06-13 16:35:07', '2016-06-13 16:35:07'), ('174', '37', '1', '5', '5', '2016-06-13 16:35:15', '2016-06-13 16:35:15'), ('175', '37', '1', '4', '4', '2016-06-13 16:35:25', '2016-06-13 16:35:25'), ('176', '37', '2', '3', '12', '2016-06-13 16:43:14', '2016-06-13 16:43:14'), ('177', '37', '2', '1', '13', '2016-06-13 16:47:49', '2016-06-13 16:47:49'), ('178', '37', '2', '2', '13', '2016-06-13 16:48:29', '2016-06-13 16:48:29'), ('179', '37', '1', '2', '5', '2016-06-13 17:08:54', '2016-06-13 17:08:54'), ('180', '37', '2', '2', '13', '2016-06-13 17:09:54', '2016-06-13 17:09:54'), ('181', '37', '1', '2', '5', '2016-06-13 17:10:04', '2016-06-13 17:10:04'), ('182', '37', '1', '2', '5', '2016-06-13 17:17:37', '2016-06-13 17:17:37'), ('183', '37', '1', '2', '5', '2016-06-13 17:18:52', '2016-06-13 17:18:52'), ('184', '37', '1', '2', '5', '2016-06-13 17:20:46', '2016-06-13 17:20:46'), ('185', '37', '1', '2', '5', '2016-06-13 17:21:24', '2016-06-13 17:21:24'), ('186', '37', '1', '2', '5', '2016-06-13 17:21:35', '2016-06-13 17:21:35'), ('187', '37', '3', '5', '2', '2016-06-13 17:30:18', '2016-06-13 17:30:18'), ('188', '37', '2', '2', '1', '2016-06-13 17:33:23', '2016-06-13 17:33:23'), ('189', '37', '2', '2', '1', '2016-06-13 17:33:30', '2016-06-13 17:33:30'), ('190', '37', '1', '4', '4', '2016-06-13 17:33:43', '2016-06-13 17:33:43'), ('191', '37', '3', '2', '2', '2016-06-13 17:34:01', '2016-06-13 17:34:01'), ('192', '37', '3', '2', '2', '2016-06-13 17:40:12', '2016-06-13 17:40:12'), ('193', '37', '3', '2', '2', '2016-06-13 17:41:13', '2016-06-13 17:41:13'), ('194', '37', '3', '2', '2', '2016-06-13 17:49:47', '2016-06-13 17:49:47'), ('195', '37', '3', '2', '2', '2016-06-13 17:49:56', '2016-06-13 17:49:56'), ('196', '37', '3', '1', '4', '2016-06-13 17:54:40', '2016-06-13 17:54:40'), ('197', '37', '3', '2', '4', '2016-06-13 17:54:40', '2016-06-13 17:54:40'), ('198', '37', '3', '2', '4', '2016-06-13 17:55:01', '2016-06-13 17:55:01'), ('199', '37', '3', '2', '4', '2016-06-13 17:55:01', '2016-06-13 17:55:01'), ('200', '37', '4', '2', '8', '2016-06-13 17:55:27', '2016-06-13 17:55:27'), ('201', '37', '4', '2', '8', '2016-06-13 17:57:03', '2016-06-13 17:57:03'), ('202', '37', '4', '2', '8', '2016-06-13 17:57:32', '2016-06-13 17:57:32'), ('203', '37', '4', '2', '8', '2016-06-13 17:57:40', '2016-06-13 17:57:40'), ('204', '37', '4', '4', '7', '2016-06-13 17:57:44', '2016-06-13 17:57:44'), ('205', '38', '4', '4', '8', '2016-06-13 18:07:57', '2016-06-13 18:07:57'), ('206', '38', '4', '4', '8', '2016-06-13 18:08:00', '2016-06-13 18:08:00');
INSERT INTO `log_actividad` VALUES ('207', '38', '5', '1', '1', '2016-06-13 18:09:32', '2016-06-13 18:09:32'), ('208', '38', '5', '1', '1', '2016-06-13 18:11:08', '2016-06-13 18:11:08'), ('209', '38', '5', '1', '1', '2016-06-13 18:14:28', '2016-06-13 18:14:28'), ('210', '38', '5', '1', '1', '2016-06-13 18:14:35', '2016-06-13 18:14:35'), ('211', '38', '5', '3', '1', '2016-06-13 18:14:38', '2016-06-13 18:14:38'), ('212', '38', '5', '5', '1', '2016-06-13 18:15:17', '2016-06-13 18:15:17'), ('213', '38', '5', '1', '2', '2016-06-13 18:17:59', '2016-06-13 18:17:59'), ('214', '38', '5', '1', '3', '2016-06-13 18:22:14', '2016-06-13 18:22:14'), ('215', '38', '5', '3', '3', '2016-06-13 18:22:18', '2016-06-13 18:22:18'), ('216', '38', '7', '3', '8', '2016-06-13 18:24:26', '2016-06-13 18:24:26'), ('217', '38', '7', '5', '8', '2016-06-13 18:24:34', '2016-06-13 18:24:34'), ('218', '38', '7', '2', '8', '2016-06-13 18:24:58', '2016-06-13 18:24:58'), ('219', '38', '7', '2', '8', '2016-06-13 18:26:42', '2016-06-13 18:26:42'), ('220', '38', '7', '2', '8', '2016-06-13 18:26:48', '2016-06-13 18:26:48'), ('221', '38', '7', '2', '8', '2016-06-13 18:26:57', '2016-06-13 18:26:57'), ('222', '38', '7', '3', '8', '2016-06-13 18:27:08', '2016-06-13 18:27:08'), ('223', '38', '7', '1', '9', '2016-06-13 18:27:47', '2016-06-13 18:27:47'), ('224', '38', '7', '4', '9', '2016-06-13 18:28:02', '2016-06-13 18:28:02'), ('225', '38', '7', '4', '9', '2016-06-13 18:28:09', '2016-06-13 18:28:09'), ('226', '41', '4', '3', '8', '2016-06-14 16:59:12', '2016-06-14 16:59:12'), ('227', '41', '4', '2', '8', '2016-06-14 16:59:48', '2016-06-14 16:59:48'), ('228', '41', '4', '5', '8', '2016-06-14 17:07:50', '2016-06-14 17:07:50'), ('229', '43', '4', '2', '1', '2016-06-15 09:26:23', '2016-06-15 09:26:23'), ('230', '43', '4', '2', '1', '2016-06-15 09:26:33', '2016-06-15 09:26:33'), ('231', '43', '3', '3', '3', '2016-06-15 09:44:40', '2016-06-15 09:44:40'), ('232', '43', '2', '5', '12', '2016-06-15 10:50:14', '2016-06-15 10:50:14'), ('233', '43', '2', '5', '12', '2016-06-15 10:50:18', '2016-06-15 10:50:18'), ('234', '43', '2', '5', '12', '2016-06-15 10:50:21', '2016-06-15 10:50:21'), ('235', '43', '2', '5', '12', '2016-06-15 10:50:26', '2016-06-15 10:50:26'), ('236', '43', '2', '5', '8', '2016-06-15 10:50:28', '2016-06-15 10:50:28'), ('237', '43', '2', '5', '9', '2016-06-15 10:50:31', '2016-06-15 10:50:31'), ('238', '43', '2', '5', '11', '2016-06-15 10:50:34', '2016-06-15 10:50:34'), ('239', '43', '2', '5', '10', '2016-06-15 10:50:37', '2016-06-15 10:50:37'), ('240', '43', '2', '5', '12', '2016-06-15 10:50:40', '2016-06-15 10:50:40'), ('241', '43', '2', '3', '13', '2016-06-15 10:50:51', '2016-06-15 10:50:51'), ('242', '43', '2', '3', '12', '2016-06-15 10:50:58', '2016-06-15 10:50:58'), ('243', '43', '2', '3', '8', '2016-06-15 10:51:11', '2016-06-15 10:51:11'), ('244', '43', '2', '3', '11', '2016-06-15 10:51:16', '2016-06-15 10:51:16'), ('245', '43', '2', '3', '9', '2016-06-15 10:51:20', '2016-06-15 10:51:20'), ('246', '43', '2', '3', '10', '2016-06-15 10:51:25', '2016-06-15 10:51:25'), ('247', '44', '3', '4', '2', '2016-06-15 12:26:46', '2016-06-15 12:26:46'), ('248', '44', '3', '4', '2', '2016-06-15 12:26:51', '2016-06-15 12:26:51'), ('249', '45', '2', '1', '14', '2016-06-15 18:43:53', '2016-06-15 18:43:53'), ('250', '46', '14', '1', '1', '2016-06-16 10:01:18', '2016-06-16 10:01:18'), ('251', '47', '14', '4', '1', '2016-06-16 10:16:11', '2016-06-16 10:16:11'), ('252', '47', '14', '4', '1', '2016-06-16 10:16:32', '2016-06-16 10:16:32'), ('253', '46', '14', '3', '1', '2016-06-16 10:18:41', '2016-06-16 10:18:41'), ('254', '46', '14', '5', '1', '2016-06-16 10:32:56', '2016-06-16 10:32:56'), ('255', '46', '14', '4', '1', '2016-06-16 10:59:40', '2016-06-16 10:59:40'), ('256', '46', '14', '4', '1', '2016-06-16 10:59:43', '2016-06-16 10:59:43'), ('257', '46', '14', '3', '1', '2016-06-16 11:02:21', '2016-06-16 11:02:21'), ('258', '46', '14', '5', '1', '2016-06-16 11:09:21', '2016-06-16 11:09:21'), ('259', '46', '14', '1', '2', '2016-06-16 11:28:38', '2016-06-16 11:28:38'), ('260', '46', '14', '1', '3', '2016-06-16 11:30:42', '2016-06-16 11:30:42'), ('261', '46', '14', '1', '4', '2016-06-16 12:01:24', '2016-06-16 12:01:24'), ('262', '46', '14', '1', '5', '2016-06-16 12:01:47', '2016-06-16 12:01:47'), ('263', '46', '14', '3', '2', '2016-06-16 12:03:12', '2016-06-16 12:03:12'), ('264', '46', '14', '3', '3', '2016-06-16 12:03:16', '2016-06-16 12:03:16'), ('265', '46', '14', '3', '4', '2016-06-16 12:03:19', '2016-06-16 12:03:19'), ('266', '46', '14', '3', '5', '2016-06-16 12:03:22', '2016-06-16 12:03:22'), ('267', '46', '2', '1', '16', '2016-06-16 12:14:02', '2016-06-16 12:14:02'), ('268', '46', '2', '1', '17', '2016-06-16 13:18:19', '2016-06-16 13:18:19'), ('269', '46', '2', '2', '17', '2016-06-16 13:26:30', '2016-06-16 13:26:30'), ('270', '48', '14', '2', '6', '2016-06-16 18:29:29', '2016-06-16 18:29:29'), ('271', '48', '14', '2', '7', '2016-06-16 18:29:41', '2016-06-16 18:29:41'), ('272', '48', '14', '2', '6', '2016-06-16 18:33:12', '2016-06-16 18:33:12'), ('273', '48', '14', '2', '7', '2016-06-16 18:33:29', '2016-06-16 18:33:29'), ('274', '49', '2', '4', '3', '2016-06-17 09:51:20', '2016-06-17 09:51:20'), ('275', '50', '2', '4', '3', '2016-06-17 10:44:32', '2016-06-17 10:44:32'), ('276', '50', '2', '4', '3', '2016-06-17 10:44:34', '2016-06-17 10:44:34'), ('277', '50', '2', '4', '3', '2016-06-17 10:44:36', '2016-06-17 10:44:36'), ('278', '50', '2', '4', '3', '2016-06-17 10:44:43', '2016-06-17 10:44:43'), ('279', '50', '2', '4', '3', '2016-06-17 10:44:45', '2016-06-17 10:44:45'), ('280', '50', '5', '2', '2', '2016-06-17 10:57:57', '2016-06-17 10:57:57'), ('281', '49', '5', '4', '2', '2016-06-17 11:09:25', '2016-06-17 11:09:25'), ('282', '49', '5', '4', '2', '2016-06-17 11:09:46', '2016-06-17 11:09:46'), ('283', '49', '1', '4', '5', '2016-06-17 11:10:01', '2016-06-17 11:10:01'), ('284', '49', '1', '4', '5', '2016-06-17 11:10:07', '2016-06-17 11:10:07'), ('285', '49', '2', '4', '3', '2016-06-17 11:10:17', '2016-06-17 11:10:17'), ('286', '49', '2', '4', '3', '2016-06-17 11:10:23', '2016-06-17 11:10:23'), ('287', '49', '4', '4', '1', '2016-06-17 11:10:37', '2016-06-17 11:10:37'), ('288', '49', '4', '4', '1', '2016-06-17 11:10:43', '2016-06-17 11:10:43'), ('289', '49', '5', '4', '2', '2016-06-17 11:10:51', '2016-06-17 11:10:51'), ('290', '49', '5', '4', '2', '2016-06-17 11:10:56', '2016-06-17 11:10:56'), ('291', '49', '14', '4', '7', '2016-06-17 11:11:13', '2016-06-17 11:11:13'), ('292', '49', '14', '4', '7', '2016-06-17 11:11:17', '2016-06-17 11:11:17'), ('293', '51', '16', '1', '1', '2016-06-17 16:20:40', '2016-06-17 16:20:40'), ('294', '51', '16', '1', '2', '2016-06-17 16:21:12', '2016-06-17 16:21:12'), ('295', '51', '16', '1', '3', '2016-06-17 16:23:59', '2016-06-17 16:23:59'), ('296', '51', '16', '1', '4', '2016-06-17 16:24:18', '2016-06-17 16:24:18'), ('297', '51', '16', '1', '5', '2016-06-17 16:24:58', '2016-06-17 16:24:58'), ('298', '51', '16', '1', '6', '2016-06-17 16:26:25', '2016-06-17 16:26:25'), ('299', '51', '3', '2', '4', '2016-06-17 17:11:51', '2016-06-17 17:11:51'), ('300', '51', '16', '1', '7', '2016-06-17 17:12:17', '2016-06-17 17:12:17'), ('301', '51', '16', '1', '8', '2016-06-17 17:13:00', '2016-06-17 17:13:00'), ('302', '51', '16', '1', '9', '2016-06-17 17:13:09', '2016-06-17 17:13:09'), ('303', '51', '16', '1', '1', '2016-06-17 17:54:42', '2016-06-17 17:54:42'), ('304', '51', '16', '1', '2', '2016-06-17 17:55:04', '2016-06-17 17:55:04'), ('305', '51', '16', '1', '3', '2016-06-17 17:55:10', '2016-06-17 17:55:10'), ('306', '51', '16', '1', '4', '2016-06-17 17:55:45', '2016-06-17 17:55:45');
INSERT INTO `log_actividad` VALUES ('307', '51', '16', '1', '5', '2016-06-17 17:56:33', '2016-06-17 17:56:33'), ('308', '51', '16', '1', '6', '2016-06-17 17:57:29', '2016-06-17 17:57:29'), ('309', '52', '16', '1', '7', '2016-06-17 18:03:57', '2016-06-17 18:03:57'), ('310', '52', '16', '1', '8', '2016-06-17 18:04:04', '2016-06-17 18:04:04'), ('311', '51', '16', '1', '9', '2016-06-17 18:05:27', '2016-06-17 18:05:27'), ('312', '51', '16', '1', '10', '2016-06-17 18:05:41', '2016-06-17 18:05:41'), ('313', '51', '16', '1', '11', '2016-06-17 18:08:36', '2016-06-17 18:08:36'), ('314', '54', '16', '1', '12', '2016-06-20 13:14:38', '2016-06-20 13:14:38'), ('315', '57', '16', '1', '13', '2016-06-21 14:00:15', '2016-06-21 14:00:15'), ('316', '57', '17', '1', '1', '2016-06-21 16:00:05', '2016-06-21 16:00:05'), ('317', '57', '17', '1', '2', '2016-06-21 16:16:22', '2016-06-21 16:16:22'), ('318', '57', '17', '1', '3', '2016-06-21 16:16:40', '2016-06-21 16:16:40'), ('319', '57', '17', '1', '4', '2016-06-21 16:17:08', '2016-06-21 16:17:08'), ('320', '57', '17', '1', '5', '2016-06-21 16:20:32', '2016-06-21 16:20:32'), ('321', '57', '17', '1', '6', '2016-06-21 16:22:12', '2016-06-21 16:22:12'), ('322', '58', '14', '1', '8', '2016-06-22 11:02:44', '2016-06-22 11:02:44'), ('323', '60', '14', '1', '9', '2016-06-23 15:02:53', '2016-06-23 15:02:53'), ('324', '60', '14', '1', '10', '2016-06-23 15:05:23', '2016-06-23 15:05:23'), ('325', '60', '14', '1', '11', '2016-06-23 15:05:43', '2016-06-23 15:05:43'), ('326', '60', '14', '1', '12', '2016-06-23 15:07:04', '2016-06-23 15:07:04'), ('327', '60', '14', '1', '13', '2016-06-23 15:07:17', '2016-06-23 15:07:17'), ('328', '60', '14', '1', '14', '2016-06-23 15:07:32', '2016-06-23 15:07:32'), ('329', '60', '14', '1', '15', '2016-06-23 15:10:14', '2016-06-23 15:10:14'), ('330', '61', '17', '1', '7', '2016-06-24 10:45:36', '2016-06-24 10:45:36'), ('331', '61', '17', '1', '8', '2016-06-24 10:45:55', '2016-06-24 10:45:55'), ('332', '61', '17', '1', '9', '2016-06-24 10:48:05', '2016-06-24 10:48:05'), ('333', '63', '17', '1', '10', '2016-06-28 03:06:16', '2016-06-28 03:06:16'), ('334', '63', '17', '1', '11', '2016-06-28 03:06:37', '2016-06-28 03:06:37'), ('335', '63', '17', '1', '12', '2016-06-28 03:07:17', '2016-06-28 03:07:17'), ('336', '63', '17', '1', '13', '2016-06-28 03:07:59', '2016-06-28 03:07:59'), ('337', '63', '17', '1', '14', '2016-06-28 03:08:10', '2016-06-28 03:08:10'), ('338', '63', '17', '1', '15', '2016-06-28 03:08:45', '2016-06-28 03:08:45'), ('339', '63', '17', '1', '16', '2016-06-28 03:08:58', '2016-06-28 03:08:58'), ('340', '63', '17', '1', '17', '2016-06-28 03:09:46', '2016-06-28 03:09:46'), ('341', '63', '17', '1', '18', '2016-06-28 03:10:04', '2016-06-28 03:10:04'), ('342', '63', '17', '1', '19', '2016-06-28 03:11:39', '2016-06-28 03:11:39'), ('343', '63', '17', '1', '20', '2016-06-28 03:14:27', '2016-06-28 03:14:27'), ('344', '63', '14', '1', '16', '2016-06-28 03:18:09', '2016-06-28 03:18:09'), ('345', '63', '14', '1', '17', '2016-06-28 03:19:42', '2016-06-28 03:19:42'), ('346', '72', '1', '1', '6', '2016-07-06 12:11:03', '2016-07-06 12:11:03'), ('347', '72', '2', '1', '26', '2016-07-06 12:58:01', '2016-07-06 12:58:01'), ('348', '72', '1', '1', '7', '2016-07-06 13:23:16', '2016-07-06 13:23:16'), ('349', '72', '5', '1', '4', '2016-07-06 13:44:10', '2016-07-06 13:44:10'), ('350', '72', '5', '3', '4', '2016-07-06 13:44:19', '2016-07-06 13:44:19'), ('351', '72', '14', '1', '18', '2016-07-06 14:10:53', '2016-07-06 14:10:53'), ('352', '74', '16', '1', '14', '2016-07-07 08:35:45', '2016-07-07 08:35:45'), ('353', '74', '17', '1', '21', '2016-07-07 08:35:55', '2016-07-07 08:35:55'), ('354', '80', '4', '2', '1', '2016-07-14 11:11:13', '2016-07-14 11:11:13'), ('355', '80', '2', '1', '18', '2016-07-14 11:18:40', '2016-07-14 11:18:40'), ('356', '80', '2', '2', '18', '2016-07-14 11:19:06', '2016-07-14 11:19:06'), ('357', '83', '17', '1', '23', '2016-07-20 12:06:14', '2016-07-20 12:06:14'), ('358', '83', '14', '1', '20', '2016-07-20 14:55:26', '2016-07-20 14:55:26'), ('359', '83', '14', '1', '21', '2016-07-20 14:58:56', '2016-07-20 14:58:56'), ('360', '83', '14', '1', '22', '2016-07-20 15:04:23', '2016-07-20 15:04:23'), ('361', '84', '14', '1', '23', '2016-07-20 17:36:54', '2016-07-20 17:36:54'), ('362', '84', '17', '1', '24', '2016-07-20 18:49:11', '2016-07-20 18:49:11'), ('363', '84', '17', '1', '25', '2016-07-20 18:55:18', '2016-07-20 18:55:18'), ('364', '84', '17', '1', '26', '2016-07-20 18:59:55', '2016-07-20 18:59:55'), ('365', '87', '14', '1', '24', '2016-07-24 23:59:08', '2016-07-24 23:59:08'), ('366', '87', '17', '1', '27', '2016-07-25 00:06:40', '2016-07-25 00:06:40'), ('367', '88', '17', '1', '28', '2016-07-25 12:20:01', '2016-07-25 12:20:01'), ('368', '88', '16', '1', '17', '2016-07-25 12:26:40', '2016-07-25 12:26:40'), ('369', '88', '14', '1', '25', '2016-07-25 13:51:41', '2016-07-25 13:51:41'), ('370', '88', '14', '1', '26', '2016-07-25 13:53:21', '2016-07-25 13:53:21'), ('371', '88', '14', '1', '27', '2016-07-25 13:57:53', '2016-07-25 13:57:53'), ('372', '88', '14', '1', '28', '2016-07-25 14:18:06', '2016-07-25 14:18:06'), ('373', '88', '14', '1', '29', '2016-07-25 14:21:09', '2016-07-25 14:21:09'), ('374', '90', '14', '4', '17', '2016-07-26 17:26:55', '2016-07-26 17:26:55'), ('375', '90', '18', '4', '7', '2016-07-26 17:30:34', '2016-07-26 17:30:34'), ('376', '90', '18', '4', '8', '2016-07-26 17:34:31', '2016-07-26 17:34:31'), ('377', '90', '14', '4', '8', '2016-07-26 17:34:55', '2016-07-26 17:34:55'), ('378', '90', '14', '4', '17', '2016-07-26 17:35:08', '2016-07-26 17:35:08'), ('379', '90', '14', '4', '8', '2016-07-26 17:35:10', '2016-07-26 17:35:10'), ('380', '90', '14', '4', '17', '2016-07-26 17:35:15', '2016-07-26 17:35:15'), ('381', '90', '18', '4', '3', '2016-07-26 17:36:33', '2016-07-26 17:36:33'), ('382', '90', '18', '4', '3', '2016-07-26 17:36:48', '2016-07-26 17:36:48'), ('383', '90', '18', '4', '7', '2016-07-26 17:36:49', '2016-07-26 17:36:49'), ('384', '90', '18', '4', '8', '2016-07-26 17:36:50', '2016-07-26 17:36:50'), ('385', '90', '18', '4', '9', '2016-07-26 17:36:50', '2016-07-26 17:36:50'), ('386', '90', '18', '4', '10', '2016-07-26 17:36:52', '2016-07-26 17:36:52'), ('387', '90', '14', '3', '11', '2016-07-26 18:07:03', '2016-07-26 18:07:03'), ('388', '90', '14', '3', '15', '2016-07-26 18:07:29', '2016-07-26 18:07:29'), ('389', '90', '18', '3', '9', '2016-07-26 18:09:54', '2016-07-26 18:09:54'), ('390', '90', '18', '3', '7', '2016-07-26 18:10:07', '2016-07-26 18:10:07'), ('391', '90', '18', '3', '10', '2016-07-26 18:10:20', '2016-07-26 18:10:20'), ('392', '90', '18', '3', '8', '2016-07-26 18:10:28', '2016-07-26 18:10:28'), ('393', '90', '18', '4', '3', '2016-07-26 18:10:33', '2016-07-26 18:10:33'), ('394', '90', '18', '5', '9', '2016-07-26 18:12:05', '2016-07-26 18:12:05'), ('395', '90', '18', '3', '9', '2016-07-26 18:12:27', '2016-07-26 18:12:27'), ('396', '91', '18', '3', '3', '2016-07-27 00:07:23', '2016-07-27 00:07:23'), ('397', '91', '18', '5', '3', '2016-07-27 00:07:46', '2016-07-27 00:07:46'), ('398', '92', '17', '3', '11', '2016-07-27 12:25:35', '2016-07-27 12:25:35'), ('399', '92', '17', '3', '11', '2016-07-27 12:26:39', '2016-07-27 12:26:39'), ('400', '92', '17', '3', '12', '2016-07-27 12:31:29', '2016-07-27 12:31:29'), ('401', '92', '17', '3', '15', '2016-07-27 12:31:49', '2016-07-27 12:31:49'), ('402', '92', '17', '3', '17', '2016-07-27 12:31:53', '2016-07-27 12:31:53'), ('403', '92', '17', '3', '16', '2016-07-27 12:32:00', '2016-07-27 12:32:00'), ('404', '92', '17', '3', '19', '2016-07-27 12:32:04', '2016-07-27 12:32:04'), ('405', '92', '17', '3', '7', '2016-07-27 12:32:17', '2016-07-27 12:32:17'), ('406', '92', '17', '3', '8', '2016-07-27 12:32:23', '2016-07-27 12:32:23');
INSERT INTO `log_actividad` VALUES ('407', '93', '17', '4', '13', '2016-07-27 16:11:53', '2016-07-27 16:11:53'), ('408', '93', '17', '4', '10', '2016-07-27 16:12:09', '2016-07-27 16:12:09'), ('409', '93', '17', '1', '29', '2016-07-27 16:55:21', '2016-07-27 16:55:21'), ('410', '93', '17', '1', '30', '2016-07-27 17:10:58', '2016-07-27 17:10:58'), ('411', '93', '17', '1', '31', '2016-07-27 17:15:30', '2016-07-27 17:15:30'), ('412', '93', '17', '1', '32', '2016-07-27 17:18:16', '2016-07-27 17:18:16'), ('413', '96', '17', '1', '33', '2016-07-28 11:59:07', '2016-07-28 11:59:07'), ('414', '96', '17', '1', '34', '2016-07-28 13:48:01', '2016-07-28 13:48:01'), ('415', '101', '5', '1', '5', '2016-07-29 18:32:11', '2016-07-29 18:32:11'), ('416', '101', '5', '5', '3', '2016-07-29 18:33:50', '2016-07-29 18:33:50'), ('417', '104', '3', '2', '4', '2016-07-31 16:52:40', '2016-07-31 16:52:40'), ('418', '104', '3', '1', '5', '2016-07-31 17:50:54', '2016-07-31 17:50:54'), ('419', '104', '3', '1', '5', '2016-07-31 17:50:54', '2016-07-31 17:50:54'), ('420', '104', '5', '3', '5', '2016-07-31 18:01:22', '2016-07-31 18:01:22'), ('421', '111', '17', '1', '35', '2016-08-03 14:00:09', '2016-08-03 14:00:09'), ('422', '111', '17', '1', '36', '2016-08-03 14:37:10', '2016-08-03 14:37:10'), ('423', '111', '14', '1', '30', '2016-08-03 16:46:36', '2016-08-03 16:46:36'), ('424', '115', '2', '3', '16', '2016-08-21 02:56:15', '2016-08-21 02:56:15'), ('425', '115', '2', '3', '18', '2016-08-21 02:56:19', '2016-08-21 02:56:19'), ('426', '115', '2', '3', '14', '2016-08-21 02:56:22', '2016-08-21 02:56:22'), ('427', '115', '2', '3', '17', '2016-08-21 02:56:34', '2016-08-21 02:56:34'), ('428', '116', '2', '1', '19', '2016-08-21 11:43:15', '2016-08-21 11:43:15'), ('429', '118', '19', '1', '1', '2016-08-22 15:54:56', '2016-08-22 15:54:56'), ('430', '119', '19', '4', '1', '2016-08-23 08:54:25', '2016-08-23 08:54:25'), ('431', '119', '19', '1', '2', '2016-08-23 11:46:46', '2016-08-23 11:46:46'), ('432', '119', '19', '2', '2', '2016-08-23 13:05:52', '2016-08-23 13:05:52'), ('433', '119', '19', '2', '1', '2016-08-23 13:06:26', '2016-08-23 13:06:26'), ('434', '119', '19', '3', '1', '2016-08-23 13:08:42', '2016-08-23 13:08:42'), ('435', '119', '19', '5', '1', '2016-08-23 13:11:01', '2016-08-23 13:11:01'), ('436', '119', '19', '4', '1', '2016-08-23 13:11:09', '2016-08-23 13:11:09'), ('437', '119', '19', '3', '1', '2016-08-23 13:11:13', '2016-08-23 13:11:13'), ('438', '119', '19', '4', '2', '2016-08-23 13:11:36', '2016-08-23 13:11:36'), ('439', '119', '19', '4', '2', '2016-08-23 13:11:41', '2016-08-23 13:11:41'), ('440', '119', '19', '4', '2', '2016-08-23 13:11:47', '2016-08-23 13:11:47'), ('441', '119', '19', '4', '2', '2016-08-23 13:11:48', '2016-08-23 13:11:48'), ('442', '119', '19', '4', '2', '2016-08-23 13:11:53', '2016-08-23 13:11:53'), ('443', '119', '19', '3', '2', '2016-08-23 13:11:59', '2016-08-23 13:11:59'), ('444', '119', '19', '5', '1', '2016-08-23 13:13:39', '2016-08-23 13:13:39'), ('445', '119', '19', '5', '2', '2016-08-23 13:13:41', '2016-08-23 13:13:41'), ('446', '119', '19', '4', '1', '2016-08-23 13:13:52', '2016-08-23 13:13:52'), ('447', '119', '2', '1', '20', '2016-08-23 13:20:54', '2016-08-23 13:20:54'), ('448', '120', '20', '1', '1', '2016-08-23 17:40:04', '2016-08-23 17:40:04'), ('449', '121', '20', '2', '1', '2016-08-24 09:54:16', '2016-08-24 09:54:16'), ('450', '121', '20', '3', '1', '2016-08-24 09:56:06', '2016-08-24 09:56:06'), ('451', '121', '20', '5', '1', '2016-08-24 09:56:16', '2016-08-24 09:56:16'), ('452', '123', '2', '1', '21', '2016-08-25 11:21:30', '2016-08-25 11:21:30'), ('453', '123', '21', '3', '1', '2016-08-25 14:12:45', '2016-08-25 14:12:45'), ('454', '124', '2', '1', '22', '2016-08-25 17:27:37', '2016-08-25 17:27:37'), ('455', '125', '2', '1', '23', '2016-08-26 08:43:54', '2016-08-26 08:43:54'), ('456', '125', '23', '4', '1', '2016-08-26 10:18:29', '2016-08-26 10:18:29'), ('457', '125', '23', '3', '1', '2016-08-26 10:18:51', '2016-08-26 10:18:51'), ('458', '125', '23', '5', '1', '2016-08-26 10:19:25', '2016-08-26 10:19:25'), ('459', '125', '23', '1', '2', '2016-08-26 11:21:02', '2016-08-26 11:21:02'), ('460', '125', '23', '3', '2', '2016-08-26 11:22:20', '2016-08-26 11:22:20'), ('461', '125', '23', '5', '2', '2016-08-26 11:22:35', '2016-08-26 11:22:35'), ('462', '126', '23', '2', '1', '2016-08-29 10:55:10', '2016-08-29 10:55:10'), ('463', '126', '23', '2', '1', '2016-08-29 10:55:18', '2016-08-29 10:55:18'), ('464', '126', '23', '3', '1', '2016-08-29 10:55:30', '2016-08-29 10:55:30'), ('465', '126', '23', '5', '1', '2016-08-29 10:55:42', '2016-08-29 10:55:42'), ('466', '126', '2', '1', '24', '2016-08-29 11:13:01', '2016-08-29 11:13:01'), ('467', '127', '2', '1', '25', '2016-08-29 14:19:25', '2016-08-29 14:19:25'), ('468', '128', '19', '4', '1', '2016-08-30 09:27:21', '2016-08-30 09:27:21'), ('469', '128', '25', '1', '1', '2016-08-30 09:57:57', '2016-08-30 09:57:57'), ('470', '128', '25', '4', '1', '2016-08-30 10:02:39', '2016-08-30 10:02:39'), ('471', '128', '25', '4', '1', '2016-08-30 10:02:45', '2016-08-30 10:02:45'), ('472', '129', '25', '2', '1', '2016-08-30 16:03:57', '2016-08-30 16:03:57'), ('473', '129', '25', '2', '1', '2016-08-30 16:08:49', '2016-08-30 16:08:49'), ('474', '129', '25', '2', '1', '2016-08-30 16:09:08', '2016-08-30 16:09:08'), ('475', '129', '25', '2', '1', '2016-08-30 16:09:30', '2016-08-30 16:09:30'), ('476', '129', '25', '2', '1', '2016-08-30 16:09:51', '2016-08-30 16:09:51'), ('477', '129', '25', '2', '1', '2016-08-30 16:10:07', '2016-08-30 16:10:07'), ('478', '129', '25', '2', '1', '2016-08-30 16:10:25', '2016-08-30 16:10:25'), ('479', '129', '25', '2', '1', '2016-08-30 16:10:43', '2016-08-30 16:10:43'), ('480', '129', '25', '2', '1', '2016-08-30 16:10:51', '2016-08-30 16:10:51'), ('481', '129', '25', '1', '2', '2016-08-30 16:12:43', '2016-08-30 16:12:43'), ('482', '129', '24', '1', '1', '2016-08-30 16:48:42', '2016-08-30 16:48:42'), ('483', '129', '24', '2', '1', '2016-08-30 17:24:15', '2016-08-30 17:24:15'), ('484', '129', '24', '2', '1', '2016-08-30 17:24:44', '2016-08-30 17:24:44'), ('485', '130', '23', '2', '1', '2016-09-27 12:34:15', '2016-09-27 12:34:15'), ('486', '130', '20', '2', '1', '2016-09-27 12:34:55', '2016-09-27 12:34:55'), ('487', '130', '20', '2', '1', '2016-09-27 12:36:53', '2016-09-27 12:36:53'), ('488', '131', '24', '2', '1', '2016-09-29 13:16:36', '2016-09-29 13:16:36'), ('489', '132', '21', '5', '1', '2016-10-01 01:51:41', '2016-10-01 01:51:41'), ('490', '132', '21', '3', '1', '2016-10-01 01:51:54', '2016-10-01 01:51:54'), ('491', '138', '23', '4', '1', '2016-10-07 10:24:41', '2016-10-07 10:24:41'), ('492', '138', '23', '4', '1', '2016-10-07 10:24:51', '2016-10-07 10:24:51'), ('493', '145', '25', '4', '2', '2016-10-27 14:13:57', '2016-10-27 14:13:57'), ('494', '145', '25', '4', '3', '2016-10-27 14:13:58', '2016-10-27 14:13:58'), ('495', '145', '25', '4', '2', '2016-10-27 14:13:59', '2016-10-27 14:13:59'), ('496', '145', '25', '4', '3', '2016-10-27 14:13:59', '2016-10-27 14:13:59'), ('497', '145', '25', '4', '4', '2016-10-27 14:14:00', '2016-10-27 14:14:00'), ('498', '145', '25', '4', '4', '2016-10-27 14:14:01', '2016-10-27 14:14:01'), ('499', '147', '22', '3', '8', '2016-10-27 15:50:45', '2016-10-27 15:50:45'), ('500', '147', '22', '5', '8', '2016-10-27 15:50:57', '2016-10-27 15:50:57'), ('501', '149', '2', '1', '26', '2016-11-10 15:27:33', '2016-11-10 15:27:33'), ('502', '149', '26', '1', '1', '2016-11-10 16:18:02', '2016-11-10 16:18:02'), ('503', '149', '26', '1', '2', '2016-11-10 16:18:08', '2016-11-10 16:18:08'), ('504', '150', '26', '4', '2', '2016-11-10 16:51:48', '2016-11-10 16:51:48'), ('505', '150', '26', '4', '2', '2016-11-10 16:51:59', '2016-11-10 16:51:59'), ('506', '149', '26', '2', '1', '2016-11-10 17:03:38', '2016-11-10 17:03:38');
INSERT INTO `log_actividad` VALUES ('507', '149', '26', '4', '1', '2016-11-10 17:03:46', '2016-11-10 17:03:46'), ('508', '149', '26', '3', '1', '2016-11-10 17:03:53', '2016-11-10 17:03:53'), ('509', '149', '26', '5', '1', '2016-11-10 17:37:12', '2016-11-10 17:37:12'), ('510', '149', '26', '2', '2', '2016-11-10 17:40:27', '2016-11-10 17:40:27');
COMMIT;

-- ----------------------------
-- Table structure for log_session
-- ----------------------------
DROP TABLE IF EXISTS `log_session`;
CREATE TABLE `log_session` (
`id_sesion`  int(10) NOT NULL AUTO_INCREMENT ,
`id_usuario`  int(2) NOT NULL ,
`token`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`ip`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_sesion`),
FOREIGN KEY (`id_usuario`) REFERENCES `sys_usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_usuario` (`id_usuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=151

;

-- ----------------------------
-- Records of log_session
-- ----------------------------
BEGIN;
INSERT INTO `log_session` VALUES ('1', '1', 'tzruPfPOIsBmerD5YUft24ht1E6zZSwJ', '::1', '2016-05-18 03:39:59', '2016-05-18 03:39:59'), ('2', '1', 'zsUpQC5Ap4qKl2KPgepjfSfbTHBTiUkp', '::1', '2016-05-18 03:47:51', '2016-05-18 03:47:51'), ('3', '1', '3eKcfRJfuyC0QverWrW2QzzLaCt5ZOuX', '::1', '2016-05-18 03:58:02', '2016-05-18 03:58:02'), ('4', '1', '44z057bAQHkyPTfMZkEzO5KNfKhNMprp', '::1', '2016-05-19 19:12:16', '2016-05-19 19:12:16'), ('5', '1', 'XHXYi3BlJ6wavIG1jdz0ns8JrNRgH3Ic', '::1', '2016-05-19 21:37:43', '2016-05-19 21:37:43'), ('6', '1', 'inmTtuTA92TZEvtmPPdp1vdk5u3RmgQd', '::1', '2016-05-19 22:48:50', '2016-05-19 22:48:50'), ('7', '1', 'HLb8qv8NnpjWVYONUae4EsEZ1NFflFn6', '::1', '2016-05-20 12:43:36', '2016-05-20 12:43:36'), ('8', '1', '2jBFuEgyS7kmwbUiiOA6wtrY376EefDk', '::1', '2016-05-22 02:02:08', '2016-05-22 02:02:08'), ('9', '1', '5o6m5gEwGmYC6u3g42lwNOP11aXPVXHy', '::1', '2016-05-22 07:51:46', '2016-05-22 07:51:46'), ('10', '1', 'ds9eZvfKho5DW6gDj5UYejzl3gnZBTTB', '::1', '2016-05-23 09:49:41', '2016-05-23 09:49:41'), ('11', '1', 'QmX6yMGLuGY5JhH2Tjc44Yj9QZoMiAgU', '::1', '2016-05-23 16:17:50', '2016-05-23 16:17:50'), ('12', '1', '3thZbSi0hvDrsBafhRcSSvCkOfJ4ckp3', '::1', '2016-05-23 18:23:35', '2016-05-23 18:23:35'), ('13', '1', 'EE33aD4MU5G9YgIaXQxfV4XpvEl6MNwh', '::1', '2016-05-23 18:25:55', '2016-05-23 18:25:55'), ('14', '1', 'XmnVzVDyjKDSLyIl3yIWKu08WyoTftfF', '::1', '2016-05-24 10:13:41', '2016-05-24 10:13:41'), ('15', '1', 'Jupr1hcGb5umODCX17qpnhfc0kWjtZQc', '::1', '2016-05-24 13:53:31', '2016-05-24 13:53:31'), ('16', '1', 'TtNQQv9HqjJJeAUqmyvKoXS9rZRC5oOC', '::1', '2016-05-24 17:48:21', '2016-05-24 17:48:21'), ('17', '1', 'pmz72Csz2olY1pzM4SXXMvSYfwaN3EaU', '::1', '2016-05-25 11:22:11', '2016-05-25 11:22:11'), ('18', '1', 'j6IgCB9k2mk5b6B093N2xVgFqVQQpNS4', '::1', '2016-05-25 17:06:39', '2016-05-25 17:06:39'), ('19', '1', 'kTcXO7413bPFeVtt4GtxOjLra9Qik2FG', '::1', '2016-05-26 17:04:34', '2016-05-26 17:04:34'), ('20', '1', 'ANgEwhEc7No1CarFILghDpPp6rCbkIBb', '::1', '2016-05-27 15:29:15', '2016-05-27 15:29:15'), ('21', '1', 'IbYWX0UeE9oLokM2fMTYQd64fQei4pD7', '::1', '2016-05-29 04:45:18', '2016-05-29 04:45:18'), ('22', '1', '6JLy1ijVPKa9eoOjs5c0fcNlNxAUOs2M', '::1', '2016-05-30 10:02:10', '2016-05-30 10:02:10'), ('23', '1', 'xO6zGVgmtFtKCmeQlRtdmvGXS9PHD7ou', '::1', '2016-05-30 16:17:56', '2016-05-30 16:17:56'), ('24', '1', 'UX7tDsRM4g4q3ii7V4F4yvKZf6E8TPYb', '::1', '2016-05-30 17:22:54', '2016-05-30 17:22:54'), ('25', '1', 'N9NnO1IqhVQy4PKtucwpp0N4aICHAiBY', '::1', '2016-05-30 18:20:39', '2016-05-30 18:20:39'), ('26', '1', 'anyAhjD44g3PK4Nq26jX9bz2NE2KdmIG', '::1', '2016-05-31 11:15:57', '2016-05-31 11:15:57'), ('27', '1', 'BZE7nTy2OglYI3BDtLqfUlqxmhFIFvLv', '::1', '2016-05-31 18:31:51', '2016-05-31 18:31:51'), ('28', '1', 'cwN7MhngKgAbXq1ALfLGZGqdZd6nBOmT', '::1', '2016-05-31 23:13:34', '2016-05-31 23:13:34'), ('29', '1', 'aWkZxyzn39dhzFOpqBu0rTOLZ2UUTZl9', '::1', '2016-06-01 13:27:09', '2016-06-01 13:27:09'), ('30', '1', 'veeJGH9mKUcfyMY7sPzbhZAbmJ5jz2Hi', '::1', '2016-06-01 18:12:38', '2016-06-01 18:12:38'), ('31', '1', 'eovmcJ6dOxz5VMwHRV2ftWIt7iEACYqj', '::1', '2016-06-02 20:01:49', '2016-06-02 20:01:49'), ('32', '1', 'kq9R6CqXg2jOFDr9ETSb3MeEfKAK2Mxc', '::1', '2016-06-02 22:38:14', '2016-06-02 22:38:14'), ('33', '1', 'fvEflhFkYJgc5u9dbCyecIczDTh6qJx8', '::1', '2016-06-07 22:30:54', '2016-06-07 22:30:54'), ('34', '1', 'hlEzcMwiyQjrG06epevn7YA5CdX6grID', '::1', '2016-06-13 10:17:59', '2016-06-13 10:17:59'), ('35', '1', 'TAroR8fB03HZGPULIptDsguQKnx5WbIB', '::1', '2016-06-13 10:54:09', '2016-06-13 10:54:09'), ('36', '1', 'KUO95wbHj82H0uIAgN5mHMttnDJTU6b6', '::1', '2016-06-13 13:27:12', '2016-06-13 13:27:12'), ('37', '1', 'opH3pfCd3RLzVWvz6JFcdWBVjN9H10F0', '::1', '2016-06-13 16:34:59', '2016-06-13 16:34:59'), ('38', '1', 'qMYO6RqAarSjdgFqkxCU6Z6eCPXnvLvN', '::1', '2016-06-13 18:05:14', '2016-06-13 18:05:14'), ('39', '1', 'P1CtblCQFUnVStc9UeXumUZqjJ8VmpJs', '::1', '2016-06-14 09:50:09', '2016-06-14 09:50:09'), ('40', '1', 'B9DZDHbZxgepVy6KSNFXZHevmvGmAVk0', '::1', '2016-06-14 13:17:52', '2016-06-14 13:17:52'), ('41', '1', 'K92osV8ZMttMlvoddeKi0nRrNaBFbjip', '::1', '2016-06-14 16:13:23', '2016-06-14 16:13:23'), ('42', '1', 'h1NFE2rSpz518k3zVxcvoVRgBHUQazEH', '::1', '2016-06-14 17:27:00', '2016-06-14 17:27:00'), ('43', '1', 'bMWOd18Dox48i25N1J1A9lfXM6zTwImR', '::1', '2016-06-15 09:22:40', '2016-06-15 09:22:40'), ('44', '1', 'sosPaScgLnq8QBuTtNexhD0wlnDPfJsU', '::1', '2016-06-15 12:00:22', '2016-06-15 12:00:22'), ('45', '1', 'q1BmxZcGAoz5CqyygPvyBNf3e39veP2U', '::1', '2016-06-15 16:59:22', '2016-06-15 16:59:22'), ('46', '1', 'm5YjyxLS5pCUNE861IqGCC3nVM7oNces', '::1', '2016-06-16 09:33:18', '2016-06-16 09:33:18'), ('47', '1', 'jBFSm23ben0qMA7km8u8NZIxsCSM90zy', '::1', '2016-06-16 10:12:34', '2016-06-16 10:12:34'), ('48', '1', '7rjDM70HJXE8bMeyTWe22hAbm8N54lOk', '::1', '2016-06-16 16:22:49', '2016-06-16 16:22:49'), ('49', '1', 'yEIM4ajUV6ZvWojguxppouQE0JJebcER', '::1', '2016-06-17 09:47:40', '2016-06-17 09:47:40'), ('50', '1', 'SOLcDmUhMgRI2T6BC3Awe8Mz7WFmZPHW', '::1', '2016-06-17 10:38:29', '2016-06-17 10:38:29'), ('51', '1', 'g0ikw7YGQ7lapSqnYHEpJsZRpuVOeDqR', '::1', '2016-06-17 16:18:44', '2016-06-17 16:18:44'), ('52', '1', 'UeX6E8u8cGu2LJUq3BfniasucJ0R0bR5', '::1', '2016-06-17 16:48:59', '2016-06-17 16:48:59'), ('53', '1', '85PJgTKw1C45Rm3fLGnocIik81up2Icu', '::1', '2016-06-20 10:33:19', '2016-06-20 10:33:19'), ('54', '1', 'EKjvIZnhma7Va1SUdKvc86lhYhe6mZw8', '::1', '2016-06-20 12:00:28', '2016-06-20 12:00:28'), ('55', '1', 'ot2nDr9fc6HKFb0l9UV0eZOb0EvS4Bkw', '::1', '2016-06-20 12:08:10', '2016-06-20 12:08:10'), ('56', '1', '6L5ZpbSb3aVqJ3GMGF8SCnJMK0s6OULV', '::1', '2016-06-20 17:56:46', '2016-06-20 17:56:46'), ('57', '1', '0VEQ3pyXbcsS6COE2xCUHhkKjIUJBaQY', '::1', '2016-06-21 09:17:43', '2016-06-21 09:17:43'), ('58', '1', 'Mu44z057bAQHkyPTfMZkEzO5KNfKhNMp', '::1', '2016-06-22 10:37:00', '2016-06-22 10:37:00'), ('59', '1', 'rpnGXYvD3m7TrSIwloe7te9N4fs8PNBd', '::1', '2016-06-22 16:30:10', '2016-06-22 16:30:10'), ('60', '1', 'VWvz6JFcdWBVjN9H10F0qMYO6RqAarSj', '::1', '2016-06-23 12:05:03', '2016-06-23 12:05:03'), ('61', '1', 'xFrwxMHY58ZtwcpfIXzZYSxVaUUNDxNN', '::1', '2016-06-24 09:27:41', '2016-06-24 09:27:41'), ('62', '1', 'CoxFrwxMHY58ZtwcpfIXzZYSxVaUUNDx', '::1', '2016-06-27 12:15:59', '2016-06-27 12:15:59'), ('63', '1', 'NNdJNFgWYBB9WkAQM54X6zoYZZnS35o6', '::1', '2016-06-28 01:01:34', '2016-06-28 01:01:34'), ('64', '1', 'AIkfF2qFO74Dlplm7SPzu1EugLnPPC6N', '::1', '2016-06-28 15:14:05', '2016-06-28 15:14:05'), ('65', '1', '0wr88Xs24TLfaNsXeC8UDRRietgSkWpP', '::1', '2016-06-28 15:14:29', '2016-06-28 15:14:29'), ('66', '1', 'OcUTZKRhIxQJl3XqIfN6aAsZy4wNd86J', '::1', '2016-06-28 15:14:56', '2016-06-28 15:14:56'), ('67', '1', 'YKLxdpDpJ3i5UbPLAJQb5cpygw9Asc9w', '::1', '2016-06-28 15:15:17', '2016-06-28 15:15:17'), ('68', '1', 'wb03OWMp8s7jRb4ZO6f8mFKZlRag58Aa', '::1', '2016-06-28 18:21:45', '2016-06-28 18:21:45'), ('69', '1', 'suBrMmjhTJjqa4H4ql2X11tiN4yO6XoH', '::1', '2016-06-29 15:56:46', '2016-06-29 15:56:46'), ('70', '2', 'DUHG2wO11Mf3rEBwCCXCqEU4bdy6Khur', '::1', '2016-07-05 11:13:59', '2016-07-05 11:13:59'), ('71', '2', 'riOh9g6lbCsSomuz7WgEdkoQ10XmnVzV', '::1', '2016-07-05 16:55:56', '2016-07-05 16:55:56'), ('72', '2', 'NBU1rbyqT8jxDvodCVwMjuU5GLhueRQN', '::1', '2016-07-06 12:05:37', '2016-07-06 12:05:37'), ('73', '2', 'Tmlo8nY6XusgNN1JDSnQWRKsGiQTkjU0', '::1', '2016-07-06 17:45:31', '2016-07-06 17:45:31'), ('74', '2', 'SVDWpdUGbHoTxPdOkAW8TqF74kZrcL1l', '::1', '2016-07-07 08:33:44', '2016-07-07 08:33:44'), ('75', '2', '0Yyn4mNJA3Bl8OiFNOJFcOfPq0G737pZ', '::1', '2016-07-07 18:53:30', '2016-07-07 18:53:30'), ('76', '2', 'lUAkPskwdIbYkFMpxLb2FZ0A4NkhAaKP', '::1', '2016-07-08 00:02:59', '2016-07-08 00:02:59'), ('77', '2', 'GhllCWqqv8c5bOf21sHvQ37c02BlkoKF', '::1', '2016-07-08 13:15:00', '2016-07-08 13:15:00'), ('78', '2', 'cBEnpCTclUAkPskwdIbYkFMpxLb2FZ0A', '::1', '2016-07-08 17:23:24', '2016-07-08 17:23:24'), ('79', '2', 'fhyfCvoOU91tcrgc65srGjsbyPBUOQJy', '::1', '2016-07-13 14:02:05', '2016-07-13 14:02:05'), ('80', '2', 'nc7cH5kZeBj0XlMClpWFlowtrnKTBXkh', '::1', '2016-07-14 11:06:58', '2016-07-14 11:06:58'), ('81', '2', 'ymz1GO6R2ToXzcaCLPEJAmyBuU55s3Yx', '::1', '2016-07-14 22:17:11', '2016-07-14 22:17:11'), ('82', '2', 't6uKU6TKqg7WSyK4AqSjqR7qIkyCjNLB', '::1', '2016-07-15 11:17:10', '2016-07-15 11:17:10'), ('83', '2', 'GeUhSCG5KTByDvNVoqPTl8NGmzj2Mfs8', '::1', '2016-07-20 10:59:55', '2016-07-20 10:59:55'), ('84', '2', 'KFhm9vCWvb0gooNNVnPwFQrUJ0tUHAh0', '::1', '2016-07-20 17:10:00', '2016-07-20 17:10:00'), ('85', '2', '8QUQRCnk4Zw9ZLgSkk7Biv1WDDsXxzog', '::1', '2016-07-20 22:22:48', '2016-07-20 22:22:48'), ('86', '2', 'KFiXsJ7Dp8mmNJYLnPrUkjHpoufmMd2l', '::1', '2016-07-21 17:39:12', '2016-07-21 17:39:12'), ('87', '2', '0XsJJVDE3gL55aH1omMU55RKK1gZuqQB', '::1', '2016-07-24 23:52:37', '2016-07-24 23:52:37'), ('88', '2', 'tEFse4EQlLv6LiZzYLh5VM7Z5qJ9riOS', '::1', '2016-07-25 09:46:42', '2016-07-25 09:46:42'), ('89', '2', 'dli5vSK2MVUzPulp219KftWjMlOluAkx', '::1', '2016-07-26 13:04:19', '2016-07-26 13:04:19'), ('90', '2', 'IFB7jyeOCIjPt8pTehEdJ5Cwj4o1OaAs', '::1', '2016-07-26 16:24:42', '2016-07-26 16:24:42'), ('91', '2', 'ARi1u65sQn5XuFRfNpwyAAEBdFmAwCef', '::1', '2016-07-26 22:42:15', '2016-07-26 22:42:15'), ('92', '2', 'TK7jQAMLjpma0zlFaTIOuKVIbYWX0UeE', '::1', '2016-07-27 09:59:39', '2016-07-27 09:59:39'), ('93', '2', 'HcTbrSHU2aJqAgNGFVhamlZPifi9yQ15', '::1', '2016-07-27 16:10:03', '2016-07-27 16:10:03'), ('94', '2', 'ISv7SxCdEyHQ79zXR2A3ZrB454Xvg9ti', '::1', '2016-07-27 22:01:33', '2016-07-27 22:01:33'), ('95', '2', 'TDStBsZXLiiwe8nSlrmfXbNloPOpvlZ8', '::1', '2016-07-28 09:07:51', '2016-07-28 09:07:51'), ('96', '2', 'EdqKEnIYRkW182HBNW6XG3INbOEl5bvi', '::1', '2016-07-28 11:28:11', '2016-07-28 11:28:11'), ('97', '2', 'm4sLQahiJ2bQhw9ZaYEPDdEWoCBsG0vV', '::1', '2016-07-28 13:39:04', '2016-07-28 13:39:04'), ('98', '2', 'mvMIoh20f63PFkhiPNHYtQLYPjsTByeN', '::1', '2016-07-28 16:32:18', '2016-07-28 16:32:18'), ('99', '2', 'bjUIvxuyBoyhJK2tAWreoOHaRHjlerfo', '::1', '2016-07-28 22:10:39', '2016-07-28 22:10:39'), ('100', '1', 'ddeKi0nRrNaBFbjiph1NFE2rSpz518k3', '::1', '2016-07-29 12:16:22', '2016-07-29 12:16:22');
INSERT INTO `log_session` VALUES ('101', '1', 'zVxcvoVRgBHUQazEHbMWOd18Dox48i25', '::1', '2016-07-29 17:06:50', '2016-07-29 17:06:50'), ('102', '1', 'N1J1A9lfXM6zTwImRsosPaScgLnq8QBu', '::1', '2016-07-30 17:19:49', '2016-07-30 17:19:49'), ('103', '1', 'TtNexhD0wlnDPfJsU6TmJuCDLv6aZL3h', '::1', '2016-07-31 01:52:11', '2016-07-31 01:52:11'), ('104', '1', 'SkJOnNO8Yhx3DmCWO8hCvces9DGhJ3or', '::1', '2016-07-31 16:14:03', '2016-07-31 16:14:03'), ('105', '5', 'JxxM5GRDiAzQjPnMBxwg9gIEp89LlIAY', '::1', '2016-07-31 18:11:57', '2016-07-31 18:11:57'), ('106', '5', 's7e6FWMvugt1RG10gjEhFI4dx0vDQLFS', '::1', '2016-07-31 21:47:39', '2016-07-31 21:47:39'), ('107', '5', '35MO8zzLykfziVxBOsEG4xi9xfIRdbCa', '::1', '2016-07-31 22:01:42', '2016-07-31 22:01:42'), ('108', '5', 'wqdTtAfovLUvBwVzdZwrlJptqROtsYrP', '::1', '2016-07-31 22:02:16', '2016-07-31 22:02:16'), ('109', '5', 'S8xlGYNokzrNMvbVvTgAujo9bRMtz89R', '::1', '2016-07-31 22:02:37', '2016-07-31 22:02:37'), ('110', '2', 'tfzZYheHFd1Qhrot2LkdEyi8lEgRPoHs', '::1', '2016-08-01 17:09:20', '2016-08-01 17:09:20'), ('111', '2', 'ZGPULIptDsguQKnx5WbIBSHC6TmkNQ9s', '::1', '2016-08-03 12:11:24', '2016-08-03 12:11:24'), ('112', '2', 'PaYy475rDNDW6SWxABRcFGKnrkr3vhgI', '::1', '2016-08-04 09:17:33', '2016-08-04 09:17:33'), ('113', '2', 'DFS9rBaQA5IzLsYrdAU1EM0rhUefQj3A', '::1', '2016-08-04 17:00:06', '2016-08-04 17:00:06'), ('114', '1', 'npIEHt7UWO7FkhGxzbhASpRqZgV96Cpl', '::1', '2016-08-19 16:20:26', '2016-08-19 16:20:26'), ('115', '1', 'XOO7LG52fzHeBkCgzhjeniLKIIqTPmhg', '::1', '2016-08-21 02:55:24', '2016-08-21 02:55:24'), ('116', '1', 'pBNXHgVypH8aLKqmtLegKzxrkwO1pt1y', '::1', '2016-08-21 11:03:38', '2016-08-21 11:03:38'), ('117', '1', 'Or88laOzcShOG3D3FFs2tcQXYAoyukc3', '::1', '2016-08-21 16:04:57', '2016-08-21 16:04:57'), ('118', '1', 'Xs24TLfaNsXeC8UDRRietgSkWpPOcUTZ', '::1', '2016-08-22 12:41:36', '2016-08-22 12:41:36'), ('119', '1', '6XoHKFAH7Ed22STpRPG2qsdF3fyuD9je', '::1', '2016-08-23 08:11:24', '2016-08-23 08:11:24'), ('120', '1', 'dZw3DXUajPaARiDMkA9Jlr3TZ2cfR8Wg', '::1', '2016-08-23 17:20:52', '2016-08-23 17:20:52'), ('121', '1', 'Ypv22Sh6DjZ9s66gJ3B2bxVy0o4rXWuL', '::1', '2016-08-24 08:11:14', '2016-08-24 08:11:14'), ('122', '1', 'VTFbiH73w6LGGlt4o7zGIFUthGPU9qbY', '::1', '2016-08-24 16:15:37', '2016-08-24 16:15:37'), ('123', '1', 'XSrMX0dbVvuzOZ0h7xXbNK6BjICoD1fS', '::1', '2016-08-25 11:17:22', '2016-08-25 11:17:22'), ('124', '1', 'KuoQI3HZh78gpirZzFO1IPZHkRaRom5R', '::1', '2016-08-25 17:22:11', '2016-08-25 17:22:11'), ('125', '1', 'lrXxbGufmbVOQwXA6OOp7EdDl6o6KM29', '::1', '2016-08-26 08:40:34', '2016-08-26 08:40:34'), ('126', '1', '0VEQ3pyXbcsS6COE2xCUHhkKjIUJBaQY', '::1', '2016-08-29 10:37:38', '2016-08-29 10:37:38'), ('127', '1', 'oovsXeeq89yLgAAFcwTRhpAAmffwLuZV', '::1', '2016-08-29 13:35:53', '2016-08-29 13:35:53'), ('128', '1', 'SEoCC3Ye0C5GaAyWFEJuB2thAt6NHatZ', '::1', '2016-08-30 09:09:42', '2016-08-30 09:09:42'), ('129', '1', 'hX9oauO2PFVzwkuAWPWai0hUldWUghVK', '::1', '2016-08-30 15:59:59', '2016-08-30 15:59:59'), ('130', '1', '2lVTh5PqjDnqecqQBuibzJQoGEqW3rRN', '::1', '2016-09-27 12:31:33', '2016-09-27 12:31:33'), ('131', '1', '5iL91M9HCiTw7FWadgLM8UkUBW7GPd6G', '::1', '2016-09-29 13:16:10', '2016-09-29 13:16:10'), ('132', '1', 'juOJSpztIUPmGYb553KUO95wbHj82H0u', '::1', '2016-10-01 01:47:49', '2016-10-01 01:47:49'), ('133', '1', 'IAgN5mHMttnDJTU6b6opH3pfCd3RLzVW', '::1', '2016-10-04 12:47:38', '2016-10-04 12:47:38'), ('134', '1', 'vz6JFcdWBVjN9H10F0qMYO6RqAarSjdg', '::1', '2016-10-04 16:21:52', '2016-10-04 16:21:52'), ('135', '1', 'fddxHymtFSsoRxWnvmO1kJvqxr1bQSPn', '::1', '2016-10-05 11:58:05', '2016-10-05 11:58:05'), ('136', '1', 'vjZGvMN0n8y6GPKrLdFHhDt2ILFOHZ12', '187.204.147.228', '2016-10-05 14:14:53', '2016-10-05 14:14:53'), ('137', '2', '6kIRxytAcwKybAcGjsyRsNoEctoHfscb', '187.224.19.145', '2016-10-05 23:53:18', '2016-10-05 23:53:18'), ('138', '1', 'IoV6FG76KVFWHSIpNWiLP7MtReT2uFJ2', '177.234.12.154', '2016-10-07 10:16:06', '2016-10-07 10:16:06'), ('139', '2', 'cUb8ANkCQ2Mj1Ru83U4mNUoP6ipaSmnU', '187.224.8.140', '2016-10-08 00:02:32', '2016-10-08 00:02:32'), ('140', '1', 'zbyyZ4nvx66KNIe9gahDQ8uBN8CWOzve', '177.234.12.154', '2016-10-10 09:40:08', '2016-10-10 09:40:08'), ('141', '1', 'Sz9INyjf0netypQYF0wJY9irvdjoU4ZD', '177.234.12.154', '2016-10-11 10:57:45', '2016-10-11 10:57:45'), ('142', '2', 'W7tu7lOkLg22MHRpFlqKwhi1dRBnKG6w', '187.223.210.44', '2016-10-14 22:31:16', '2016-10-14 22:31:16'), ('143', '2', '5pAeeMY7AA2HC2E0vUWBbJM8UuUnGXCC', '187.224.58.166', '2016-10-27 00:07:58', '2016-10-27 00:07:58'), ('144', '2', '4Y8TY6f6DUuJtJ3T2YlCPEjp0H9S1mEW', '201.122.77.32', '2016-10-27 12:07:49', '2016-10-27 12:07:49'), ('145', '2', 'S0UHnTHzbIsfia1LoL1awfcDvCsvbeBT', '201.122.77.32', '2016-10-27 12:40:59', '2016-10-27 12:40:59'), ('146', '2', 'cYUEoDhVqUFapxhwD0xy26lWjPN9fWmi', '187.144.46.11', '2016-10-27 13:01:48', '2016-10-27 13:01:48'), ('147', '1', '5ZuoXUngWOZW3quj2eqx1UNgKSp1XPRS', '189.195.131.118', '2016-10-27 15:25:13', '2016-10-27 15:25:13'), ('148', '1', '8N9P5vtVvQMyOu00J6rGLkQ09qGASS8R', '189.195.131.118', '2016-10-27 15:51:57', '2016-10-27 15:51:57'), ('149', '1', 'Tw6WlCt67aoNfCeirmpxrKeT34PYVPBF', '177.234.12.154', '2016-11-10 15:15:30', '2016-11-10 15:15:30'), ('150', '1', 'qvaCTtNYLaEWtIR4vwmk2zWvTOIBxEUN', '177.234.12.154', '2016-11-10 16:50:34', '2016-11-10 16:50:34');
COMMIT;

-- ----------------------------
-- Table structure for newsletter
-- ----------------------------
DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
`id_newsletter`  int(10) NOT NULL AUTO_INCREMENT ,
`telefono`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`nombre`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`mail`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id_newsletter`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=13

;

-- ----------------------------
-- Records of newsletter
-- ----------------------------
BEGIN;
INSERT INTO `newsletter` VALUES ('5', '0', '-', 'victorr.cano@gmail.com', '1', '0', '2016-10-14 00:24:22', '2016-10-14 00:24:22'), ('6', '0', '-', 'victorr.cano@gmail.com', '1', '0', '2016-10-14 00:32:40', '2016-10-14 00:32:40'), ('7', '0', '-', 'contact@infotec.com', '1', '0', '2016-10-14 00:33:23', '2016-10-14 00:33:23'), ('8', '0', '-', 'vescamilla@abargon.com', '1', '0', '2016-10-14 00:33:48', '2016-10-14 00:33:48'), ('9', '0', '-', 'test@gmail.com', '1', '0', '2016-10-15 01:13:16', '2016-10-15 01:13:16'), ('10', '0', '-', 'cerberus@gmail.com', '1', '0', '2016-10-17 22:53:09', '2016-10-17 22:53:09'), ('11', '0', '-', 'cmartinez@abargon.com', '1', '0', '2016-10-18 13:15:00', '2016-10-18 13:15:00'), ('12', '0', '-', 'cmartinez@abargon.com', '1', '0', '2016-10-18 13:31:04', '2016-10-18 13:31:04');
COMMIT;

-- ----------------------------
-- Table structure for newsletter_linea
-- ----------------------------
DROP TABLE IF EXISTS `newsletter_linea`;
CREATE TABLE `newsletter_linea` (
`id_newsletter`  int(10) NOT NULL ,
`id_linea`  int(2) NOT NULL ,
FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_newsletter`) REFERENCES `newsletter` (`id_newsletter`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_newsletter` (`id_newsletter`) USING BTREE ,
INDEX `id_linea` (`id_linea`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of newsletter_linea
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for newsletter_sucursal
-- ----------------------------
DROP TABLE IF EXISTS `newsletter_sucursal`;
CREATE TABLE `newsletter_sucursal` (
`id_newsletter`  int(10) NOT NULL ,
`id_sucursal`  int(4) NOT NULL ,
FOREIGN KEY (`id_newsletter`) REFERENCES `newsletter` (`id_newsletter`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_newsletter` (`id_newsletter`) USING BTREE ,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of newsletter_sucursal
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for promocion
-- ----------------------------
DROP TABLE IF EXISTS `promocion`;
CREATE TABLE `promocion` (
`id_promocion`  int(10) NOT NULL AUTO_INCREMENT ,
`id_juego`  int(3) NOT NULL ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slug`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`resumen`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`imagen`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`fecha_inicio`  date NOT NULL ,
`fecha_fin`  date NOT NULL ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_promocion`),
FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id_juego`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_juego` (`id_juego`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of promocion
-- ----------------------------
BEGIN;
INSERT INTO `promocion` VALUES ('1', '1', 'Promoción 1', 'promocion-1', 'Repartiremos más de $80,000.00', 'css/images/temp/game1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '2016-10-07', '2016-10-07', '2016-10-07 05:14:27', '2016-10-07 05:14:27'), ('2', '1', 'Promoción 2', 'promocion-2', 'Repartiremos más de $800,000.00', 'css/images/temp/game2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '2016-10-07', '2016-10-07', '2016-10-07 05:15:03', '2016-10-07 05:15:03'), ('3', '1', 'Promoción 3', 'promocion-3', 'Repartiremos más de $6,000.00', 'css/images/temp/game3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '2016-10-07', '2016-10-07', '2016-10-07 05:15:38', '2016-10-07 05:15:38'), ('4', '1', 'Promoción 4', 'promocion-4', 'Repartiremos más de $56,000.00', 'css/images/temp/game4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '2016-10-07', '2016-10-07', '2016-10-07 05:15:54', '2016-10-07 05:15:54'), ('6', '5', 'Promo mesa 1', 'promo-mesa-1', 'Repartiremos más de $80,000.00', 'css/images/temp/game1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '2016-10-07', '2016-10-07', '2016-10-07 05:14:27', '2016-10-07 05:14:27'), ('7', '6', 'Promo mesa 2', 'promo-mesa-2', 'Repartiremos más de $80,000.00', 'css/images/temp/game1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum turpis nec diam dapibus porttitor sed sodales quam. Aliquam sit amet accumsan justo. Duis fermentum quis dui id vestibulum.', '2016-10-07', '2016-10-07', '2016-10-07 05:14:27', '2016-10-07 05:14:27');
COMMIT;

-- ----------------------------
-- Table structure for promocion_sucursal
-- ----------------------------
DROP TABLE IF EXISTS `promocion_sucursal`;
CREATE TABLE `promocion_sucursal` (
`id_promocion`  int(10) NOT NULL ,
`id_sucursal`  int(4) NOT NULL ,
`descripcion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`link`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_promocion`) REFERENCES `promocion` (`id_promocion`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE ,
INDEX `id_promocion` (`id_promocion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of promocion_sucursal
-- ----------------------------
BEGIN;
INSERT INTO `promocion_sucursal` VALUES ('1', '1', '', '', ''), ('2', '1', '', '', ''), ('3', '3', '', '', ''), ('4', '3', '', '', ''), ('6', '1', '', '', ''), ('7', '3', '', '', '');
COMMIT;

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
`id_proveedor`  int(5) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`link`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_proveedor`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
BEGIN;
INSERT INTO `proveedor` VALUES ('1', 'Zitro', 'css/images/temp/providers1.jpg', 'http://www.google.com', '1', '0', '2016-08-23 17:40:04', '2016-09-27 12:36:53'), ('2', 'Zitro 2', 'css/images/temp/providers1.jpg', '', '1', '0', '2016-08-23 17:40:04', '2016-09-27 12:36:53'), ('3', 'Zitro 3', 'css/images/temp/providers1.jpg', 'http://www.yahoo.com', '1', '0', '2016-08-23 17:40:04', '2016-09-27 12:36:53'), ('4', 'Zitro 4', 'css/images/temp/providers1.jpg', 'http://www.yahoo.com', '1', '0', '2016-08-23 17:40:04', '2016-09-27 12:36:53');
COMMIT;

-- ----------------------------
-- Table structure for red_social
-- ----------------------------
DROP TABLE IF EXISTS `red_social`;
CREATE TABLE `red_social` (
`id_red`  int(3) NOT NULL AUTO_INCREMENT ,
`tipo`  int(3) NOT NULL ,
`id_sucursal`  int(4) NOT NULL ,
`link`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(4) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_red`),
FOREIGN KEY (`tipo`) REFERENCES `tipo_red` (`id_tipo`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `tipo` (`tipo`) USING BTREE ,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of red_social
-- ----------------------------
BEGIN;
INSERT INTO `red_social` VALUES ('1', '4', '3', 'Modificada', '0', '0', '2016-11-10 16:18:02', '2016-11-10 00:00:00'), ('2', '1', '1', 'www.facebook.com/tecnm ', '1', '0', '2016-11-10 16:18:08', '2016-11-10 17:40:27');
COMMIT;

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`titulo`  varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`imagen`  varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`texto_boton`  varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`link`  varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`estatus`  tinyint(4) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(4) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of slider
-- ----------------------------
BEGIN;
INSERT INTO `slider` VALUES ('1', 'Promociones', 'css/images/temp/slide1.jpg', 'ver más', 'http://www.google.com.mx', '1', '0', '2016-08-30 09:57:57', '2016-08-30 09:57:57'), ('2', 'Eventos', 'css/images/temp/slide1.jpg', 'mostrar', 'http://www.google.com.mx', '1', '0', '2016-08-30 09:57:57', '2016-10-07 04:54:41');
COMMIT;

-- ----------------------------
-- Table structure for sucursal
-- ----------------------------
DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE `sucursal` (
`id_sucursal`  int(4) NOT NULL AUTO_INCREMENT ,
`id_ciudad`  int(6) NOT NULL ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slug`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`direccion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`latitud`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`longitud`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`horario`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`instrucciones`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`telefono`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL ,
`created_at`  datetime NOT NULL ,
`updated_at`  datetime NOT NULL ,
PRIMARY KEY (`id_sucursal`),
FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_ciudad` (`id_ciudad`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of sucursal
-- ----------------------------
BEGIN;
INSERT INTO `sucursal` VALUES ('1', '1', 'Tecamachalco', 'tecamachalco', 'Calle Fuente del molino <br />\r\n#49-BCol. San Miguel<br /> \r\nTecamachalco Naucalpan, Edo.<br /> \r\nde México C.P. 53970', '19.424555', '-99.230653', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Teléfono: 01 + 55 123456789<br />\r\nTeléfono: 045 + 55 123456789<br />\r\nTeléfono: 779 + 55 123456789<br />', '1', '0', '0000-00-00 00:00:00', '2016-10-07 10:24:51'), ('3', '2', 'Piedras Negras', 'piedras-negras', 'Calle Fuente del molino <br />\r\n#49-BCol. San Miguel<br /> \r\nPiedras Negras,<br /> \r\nCoahuila C.P. 53970', '19.424555', '-99.230653', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Horario : 13:00 pm - 00:00 am <br />\r\nLunes - Domingo', 'Teléfono: 01 + 55 123456789<br />\r\nTeléfono: 045 + 55 123456789<br />\r\nTeléfono: 779 + 55 123456789<br />', '1', '0', '0000-00-00 00:00:00', '2016-10-07 10:24:51');
COMMIT;

-- ----------------------------
-- Table structure for sucursal_galeria
-- ----------------------------
DROP TABLE IF EXISTS `sucursal_galeria`;
CREATE TABLE `sucursal_galeria` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`id_sucursal`  int(4) NOT NULL ,
`imagen`  varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`estatus`  tinyint(4) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(4) NOT NULL DEFAULT 0 ,
`created_at`  datetime NOT NULL ,
`update_at`  datetime NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of sucursal_galeria
-- ----------------------------
BEGIN;
INSERT INTO `sucursal_galeria` VALUES ('1', '1', 'css/images/temp/gallery1.jpg', '1', '0', '2016-10-07 05:06:08', '2016-10-07 05:06:08'), ('2', '1', 'css/images/temp/gallery2.jpg', '1', '0', '2016-10-07 05:06:20', '2016-10-07 05:06:20'), ('3', '1', 'css/images/temp/gallery3.jpg', '1', '0', '2016-10-07 05:06:33', '2016-10-07 05:06:33'), ('4', '1', 'css/images/temp/gallery1.jpg', '1', '0', '2016-10-07 05:06:47', '2016-10-07 05:06:47'), ('6', '3', 'css/images/temp/gallery1.jpg', '1', '0', '2016-10-07 05:06:08', '2016-10-07 05:06:08'), ('7', '3', 'css/images/temp/gallery2.jpg', '1', '0', '2016-10-07 05:06:20', '2016-10-07 05:06:20'), ('8', '3', 'css/images/temp/gallery3.jpg', '1', '0', '2016-10-07 05:06:33', '2016-10-07 05:06:33'), ('9', '3', 'css/images/temp/gallery1.jpg', '1', '0', '2016-10-07 05:06:47', '2016-10-07 05:06:47');
COMMIT;

-- ----------------------------
-- Table structure for sys_idioma
-- ----------------------------
DROP TABLE IF EXISTS `sys_idioma`;
CREATE TABLE `sys_idioma` (
`id_idioma`  int(3) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_idioma`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of sys_idioma
-- ----------------------------
BEGIN;
INSERT INTO `sys_idioma` VALUES ('1', 'Español', '1', '0', '2016-05-20 10:42:34', '2016-05-20 10:42:34'), ('2', 'Inglés', '1', '0', '2016-05-26 19:05:58', '2016-05-26 00:00:00'), ('3', 'Chino', '1', '0', '2016-05-27 16:17:03', '2016-05-27 00:00:00'), ('4', 'Francés', '1', '0', '2016-05-27 16:20:12', '2016-05-27 00:00:00'), ('5', 'Alemán', '1', '0', '2016-05-30 10:02:35', '2016-05-30 00:00:00'), ('6', 'asdf', '1', '0', '2016-05-30 10:02:37', '2016-05-30 00:00:00'), ('7', 'asdf', '1', '0', '2016-05-27 17:59:34', '2016-05-27 00:00:00'), ('8', 'Italiano', '1', '1', '2016-06-13 18:27:08', '2016-06-13 18:27:08'), ('9', 'Catalán', '1', '0', '2016-06-13 18:28:09', '2016-06-13 18:28:09');
COMMIT;

-- ----------------------------
-- Table structure for sys_modulo
-- ----------------------------
DROP TABLE IF EXISTS `sys_modulo`;
CREATE TABLE `sys_modulo` (
`id_modulo`  int(5) NOT NULL AUTO_INCREMENT ,
`id_seccion`  int(3) NOT NULL ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slug`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`tabla`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_modulo`),
FOREIGN KEY (`id_seccion`) REFERENCES `sys_seccion` (`id_seccion`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_seccion` (`id_seccion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=27

;

-- ----------------------------
-- Records of sys_modulo
-- ----------------------------
BEGIN;
INSERT INTO `sys_modulo` VALUES ('1', '1', 'Secciones', 'seccion', 'sys_seccion', 'Administrar las secciones del sistema', '1', '0', '2016-06-13 17:33:30', '2016-06-13 17:33:30'), ('2', '1', 'Módulos', 'modulo', 'sys_modulo', 'Administrar los módulos del sistema', '1', '0', '2016-05-31 18:45:45', '2016-05-31 18:45:45'), ('3', '1', 'Usuarios', 'usuario', 'sys_usuario', 'Administrar los usuarios del sistema', '1', '0', '2016-06-17 11:10:23', '2016-06-17 11:10:23'), ('4', '1', 'Permisos', 'permiso', 'sys_permiso', 'Administrar los permisos del sistema', '1', '0', '2016-05-31 18:50:03', '2016-05-31 18:50:03'), ('5', '1', 'Roles', 'rol', 'sys_rol', 'Administrar los roles que existen en el sistema', '1', '0', '2016-06-13 13:41:56', '2016-06-13 13:41:56'), ('6', '1', 'Privilegios', 'privilegio', 'sys_privilegios', 'Trabajar con los privilegios que tiene el sistema', '1', '0', '2016-05-31 18:50:31', '2016-05-31 18:50:31'), ('7', '1', 'Idioma', 'idioma', 'sys_idioma', 'Administrar los idiomas del front', '1', '0', '2016-05-31 19:04:31', '2016-05-31 19:04:31'), ('8', '1', 'Para probar', 'asdf', '', 'asdf', '1', '1', '2016-06-15 10:51:11', '2016-06-15 10:51:11'), ('9', '1', 'Para probar', 'asdf', '', 'asdf', '1', '1', '2016-06-15 10:51:20', '2016-06-15 10:51:20'), ('10', '1', 'Para probar', 'asdf', '', 'asdf', '1', '1', '2016-06-15 10:51:25', '2016-06-15 10:51:25'), ('11', '1', 'Para probar', 'asdf', '', 'asdf', '1', '1', '2016-06-15 10:51:16', '2016-06-15 10:51:16'), ('12', '1', 'La cucaracha', 'asdf', '', 'asdf', '1', '1', '2016-06-15 10:50:58', '2016-06-15 10:50:58'), ('13', '5', 'PRB', 'PRM2', 'sys_usuario', 'adfasdf2', '1', '1', '2016-06-15 10:50:51', '2016-06-15 10:50:51'), ('14', '1', 'Desarrollos', 'desarrollo', 'desarrollo', 'Se almacenan los desarrollos de bienes raíces realizados por casas GEO', '1', '1', '2016-06-15 18:43:53', '2016-08-21 02:56:22'), ('16', '1', 'Características', 'caracteristica', 'caracteristica', 'Características con las que cuentan los prototipos de casas GEO. Por ejemplo, el número de cuartos o el número de plantas.', '1', '1', '2016-06-16 12:14:02', '2016-08-21 02:56:15'), ('17', '1', 'Prototipos', 'prototipo', 'prototipo', 'Administra prototipos pertenecientes a los desarrollos', '1', '1', '2016-06-16 13:26:30', '2016-08-21 02:56:34'), ('18', '1', 'Centros de atención', 'centro', 'centro', 'Agrega los centros de atención', '1', '1', '2016-07-14 11:19:06', '2016-08-21 02:56:19'), ('19', '1', 'Alimentos', 'alimento', 'alimento', 'Los alimentos que existen en las diferentes sucursales', '1', '0', '2016-08-21 11:43:15', '2016-08-21 11:43:15'), ('20', '1', 'Proveedor', 'proveedor', 'proveedor', 'Administración de los proveedores del cacino', '1', '0', '2016-08-23 13:20:54', '2016-08-23 13:20:54'), ('21', '1', 'Newsletter', 'newsletter', 'newsletter', 'Administrar newsletter', '1', '0', '2016-08-25 11:21:30', '2016-08-25 11:21:30'), ('22', '1', 'Contacto', 'contacto', 'contacto', 'Módulo de administración de las personas que se quieren contactar con Casino Caliente', '1', '0', '2016-08-25 17:27:37', '2016-08-25 17:27:37'), ('23', '1', 'Sucursal', 'sucursal', 'sucursal', 'Administración de sucursales', '1', '0', '2016-08-26 08:43:54', '2016-08-26 08:43:54'), ('24', '1', 'Juegos', 'juego', 'juego', 'Administrar los juegos de todas las sucursales', '1', '0', '2016-08-29 11:13:01', '2016-08-29 11:13:01'), ('25', '1', 'Lineas', 'linea', 'linea', 'Lineas de juego', '1', '0', '2016-08-29 14:19:25', '2016-08-29 14:19:25'), ('26', '1', 'Redes Sociales', 'red', 'red_social', 'Gestionar las redes sociales de las sucursales', '1', '0', '2016-11-10 15:27:33', '2016-11-10 15:27:33');
COMMIT;

-- ----------------------------
-- Table structure for sys_papelera
-- ----------------------------
DROP TABLE IF EXISTS `sys_papelera`;
CREATE TABLE `sys_papelera` (
`id_papelera`  int(10) NOT NULL AUTO_INCREMENT ,
`id_sesion`  int(2) NOT NULL ,
`id_tipo`  int(3) NOT NULL COMMENT 'El tipo de elemento, se relaciona con la tabla modulo; de esta manera podemos saber si por ejemplo, un usuario fue eliminado.' ,
`id_elemento`  int(6) NOT NULL COMMENT 'Id original de la tabla de la que fue eliminado' ,
`status`  tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Eliminado = 1; Restaurado = 0;' ,
`fecha_restauracion`  timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_papelera`),
FOREIGN KEY (`id_sesion`) REFERENCES `log_session` (`id_sesion`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_tipo`) REFERENCES `sys_modulo` (`id_modulo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_elemento` (`id_elemento`) USING BTREE ,
INDEX `sys_papelera_ibfk_2` (`id_tipo`) USING BTREE ,
INDEX `sys_papelera_ibfk_1` (`id_sesion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=89

;

-- ----------------------------
-- Records of sys_papelera
-- ----------------------------
BEGIN;
INSERT INTO `sys_papelera` VALUES ('1', '7', '3', '1', '0', '2016-05-26 19:12:00', '2016-05-26 19:12:00', '2016-05-26 19:12:00'), ('2', '7', '3', '2', '0', '2016-05-26 19:11:56', '2016-05-26 19:11:56', '2016-05-26 19:11:56'), ('3', '7', '5', '1', '0', '2016-05-26 19:16:59', '2016-05-26 19:16:59', '2016-05-26 19:16:59'), ('4', '15', '7', '2', '0', '2016-05-26 19:05:58', '2016-05-26 19:05:58', '2016-05-26 19:05:58'), ('5', '18', '7', '3', '0', '2016-05-26 17:25:44', '2016-05-26 17:25:44', '2016-05-26 17:25:44'), ('6', '19', '3', '3', '0', '2016-05-26 19:11:59', '2016-05-26 19:11:59', '2016-05-26 19:11:59'), ('7', '19', '3', '2', '0', '2016-05-26 19:11:54', '2016-05-26 19:11:54', '2016-05-26 19:11:54'), ('8', '19', '5', '1', '0', '2016-05-27 16:16:19', '2016-05-27 16:16:19', '2016-05-27 16:16:19'), ('9', '20', '7', '3', '0', '2016-05-27 16:17:03', '2016-05-27 16:17:03', '2016-05-27 16:17:03'), ('10', '20', '3', '2', '0', '2016-05-27 17:48:33', '2016-05-27 17:48:33', '2016-05-27 17:48:33'), ('11', '20', '7', '4', '0', '2016-05-27 16:20:12', '2016-05-27 16:20:12', '2016-05-27 16:20:12'), ('12', '20', '7', '8', '0', '2016-05-27 17:48:20', '2016-05-27 17:48:20', '2016-05-27 17:48:20'), ('13', '20', '7', '6', '0', '2016-05-27 17:48:24', '2016-05-27 17:48:24', '2016-05-27 17:48:24'), ('14', '20', '7', '7', '0', '2016-05-27 17:48:28', '2016-05-27 17:48:28', '2016-05-27 17:48:28'), ('15', '20', '7', '7', '0', '2016-05-27 17:59:34', '2016-05-27 17:59:34', '2016-05-27 17:59:34'), ('16', '20', '7', '6', '0', '2016-05-27 17:59:36', '2016-05-27 17:59:36', '2016-05-27 17:59:36'), ('17', '20', '7', '5', '0', '2016-05-27 17:59:38', '2016-05-27 17:59:38', '2016-05-27 17:59:38'), ('18', '20', '7', '8', '0', '2016-05-27 17:59:40', '2016-05-27 17:59:40', '2016-05-27 17:59:40'), ('19', '22', '7', '5', '0', '2016-05-30 10:02:35', '2016-05-30 10:02:35', '2016-05-30 10:02:35'), ('20', '22', '7', '6', '0', '2016-05-30 10:02:37', '2016-05-30 10:02:37', '2016-05-30 10:02:37'), ('21', '24', '4', '8', '0', '2016-05-30 17:32:09', '2016-05-30 17:32:09', '2016-05-30 17:32:09'), ('22', '24', '4', '8', '0', '2016-06-13 12:53:48', '2016-06-13 12:53:48', '2016-06-13 12:53:48'), ('23', '32', '2', '12', '0', '2016-06-13 10:41:48', '2016-06-13 10:41:48', '2016-06-13 10:41:48'), ('24', '32', '2', '12', '0', '2016-06-15 10:50:14', '2016-06-15 10:50:14', '2016-06-15 10:50:14'), ('25', '32', '2', '12', '0', '2016-06-15 10:50:18', '2016-06-15 10:50:18', '2016-06-15 10:50:18'), ('26', '32', '2', '12', '0', '2016-06-15 10:50:21', '2016-06-15 10:50:21', '2016-06-15 10:50:21'), ('27', '32', '2', '12', '0', '2016-06-15 10:50:26', '2016-06-15 10:50:26', '2016-06-15 10:50:26'), ('28', '32', '2', '8', '0', '2016-06-15 10:50:28', '2016-06-15 10:50:28', '2016-06-15 10:50:28'), ('29', '32', '2', '9', '0', '2016-06-15 10:50:31', '2016-06-15 10:50:31', '2016-06-15 10:50:31'), ('30', '32', '2', '11', '0', '2016-06-15 10:50:34', '2016-06-15 10:50:34', '2016-06-15 10:50:34'), ('31', '32', '2', '10', '0', '2016-06-15 10:50:37', '2016-06-15 10:50:37', '2016-06-15 10:50:37'), ('32', '35', '3', '2', '0', '2016-06-13 11:46:31', '2016-06-13 11:46:31', '2016-06-13 11:46:31'), ('33', '35', '3', '2', '0', '2016-06-13 17:30:18', '2016-06-13 17:30:18', '2016-06-13 17:30:18'), ('34', '36', '1', '5', '0', '2016-06-13 16:35:15', '2016-06-13 16:35:15', '2016-06-13 16:35:15'), ('35', '37', '1', '2', '1', null, '2016-06-13 16:35:07', '2016-06-13 16:35:07'), ('36', '37', '2', '12', '0', '2016-06-15 10:50:40', '2016-06-15 10:50:40', '2016-06-15 10:50:40'), ('37', '38', '5', '1', '0', '2016-06-13 18:15:17', '2016-06-13 18:15:17', '2016-06-13 18:15:17'), ('38', '38', '5', '3', '0', '2016-07-29 18:33:50', '2016-06-13 18:22:18', '2016-07-29 18:33:50'), ('39', '38', '7', '8', '0', '2016-06-13 18:24:34', '2016-06-13 18:24:34', '2016-06-13 18:24:34'), ('40', '38', '7', '8', '1', null, '2016-06-13 18:27:08', '2016-06-13 18:27:08'), ('41', '41', '4', '8', '0', '2016-06-14 17:07:50', '2016-06-14 17:07:50', '2016-06-14 17:07:50'), ('42', '43', '3', '3', '1', null, '2016-06-15 09:44:40', '2016-06-15 09:44:40'), ('43', '43', '2', '13', '1', null, '2016-06-15 10:50:51', '2016-06-15 10:50:51'), ('44', '43', '2', '12', '1', null, '2016-06-15 10:50:58', '2016-06-15 10:50:58'), ('45', '43', '2', '8', '1', null, '2016-06-15 10:51:11', '2016-06-15 10:51:11'), ('46', '43', '2', '11', '1', null, '2016-06-15 10:51:16', '2016-06-15 10:51:16'), ('47', '43', '2', '9', '1', null, '2016-06-15 10:51:20', '2016-06-15 10:51:20'), ('48', '43', '2', '10', '1', null, '2016-06-15 10:51:25', '2016-06-15 10:51:25'), ('49', '46', '14', '1', '0', '2016-06-16 10:32:56', '2016-06-16 10:32:56', '2016-06-16 10:32:56'), ('50', '46', '14', '1', '0', '2016-06-16 11:09:21', '2016-06-16 11:09:21', '2016-06-16 11:09:21'), ('51', '46', '14', '2', '1', null, '2016-06-16 12:03:12', '2016-06-16 12:03:12'), ('52', '46', '14', '3', '1', null, '2016-06-16 12:03:16', '2016-06-16 12:03:16'), ('53', '46', '14', '4', '1', null, '2016-06-16 12:03:19', '2016-06-16 12:03:19'), ('54', '46', '14', '5', '1', null, '2016-06-16 12:03:22', '2016-06-16 12:03:22'), ('55', '72', '5', '4', '1', null, '2016-07-06 13:44:19', '2016-07-06 13:44:19'), ('56', '90', '14', '11', '1', null, '2016-07-26 18:07:03', '2016-07-26 18:07:03'), ('57', '90', '14', '15', '1', null, '2016-07-26 18:07:29', '2016-07-26 18:07:29'), ('58', '90', '18', '9', '0', '2016-07-26 18:12:05', '2016-07-26 18:09:54', '2016-07-26 18:12:05'), ('59', '90', '18', '7', '1', null, '2016-07-26 18:10:07', '2016-07-26 18:10:07'), ('60', '90', '18', '10', '1', null, '2016-07-26 18:10:20', '2016-07-26 18:10:20'), ('61', '90', '18', '8', '1', null, '2016-07-26 18:10:28', '2016-07-26 18:10:28'), ('62', '90', '18', '9', '1', null, '2016-07-26 18:12:27', '2016-07-26 18:12:27'), ('63', '91', '18', '3', '0', '2016-07-27 00:07:46', '2016-07-27 00:07:23', '2016-07-27 00:07:46'), ('64', '92', '17', '11', '1', null, '2016-07-27 12:25:35', '2016-07-27 12:25:35'), ('65', '92', '17', '11', '1', null, '2016-07-27 12:26:39', '2016-07-27 12:26:39'), ('66', '92', '17', '12', '1', null, '2016-07-27 12:31:29', '2016-07-27 12:31:29'), ('67', '92', '17', '15', '1', null, '2016-07-27 12:31:49', '2016-07-27 12:31:49'), ('68', '92', '17', '17', '1', null, '2016-07-27 12:31:53', '2016-07-27 12:31:53'), ('69', '92', '17', '16', '1', null, '2016-07-27 12:32:00', '2016-07-27 12:32:00'), ('70', '92', '17', '19', '1', null, '2016-07-27 12:32:04', '2016-07-27 12:32:04'), ('71', '92', '17', '7', '1', null, '2016-07-27 12:32:17', '2016-07-27 12:32:17'), ('72', '92', '17', '8', '1', null, '2016-07-27 12:32:23', '2016-07-27 12:32:23'), ('73', '104', '5', '5', '1', null, '2016-07-31 18:01:22', '2016-07-31 18:01:22'), ('74', '115', '2', '16', '1', null, '2016-08-21 02:56:15', '2016-08-21 02:56:15'), ('75', '115', '2', '18', '1', null, '2016-08-21 02:56:19', '2016-08-21 02:56:19'), ('76', '115', '2', '14', '1', null, '2016-08-21 02:56:22', '2016-08-21 02:56:22'), ('77', '115', '2', '17', '1', null, '2016-08-21 02:56:34', '2016-08-21 02:56:34'), ('78', '119', '19', '1', '0', '2016-08-23 13:11:01', '2016-08-23 13:08:42', '2016-08-23 13:11:01'), ('79', '119', '19', '1', '0', '2016-08-23 13:13:39', '2016-08-23 13:11:13', '2016-08-23 13:13:39'), ('80', '119', '19', '2', '0', '2016-08-23 13:13:41', '2016-08-23 13:11:59', '2016-08-23 13:13:41'), ('81', '121', '20', '1', '0', '2016-08-24 09:56:16', '2016-08-24 09:56:06', '2016-08-24 09:56:16'), ('82', '123', '21', '1', '0', '2016-10-01 01:51:41', '2016-08-25 14:12:45', '2016-10-01 01:51:41'), ('83', '125', '23', '1', '0', '2016-08-26 10:19:25', '2016-08-26 10:18:51', '2016-08-26 10:19:25'), ('84', '125', '23', '2', '0', '2016-08-26 11:22:35', '2016-08-26 11:22:20', '2016-08-26 11:22:35'), ('85', '126', '23', '1', '0', '2016-08-29 10:55:42', '2016-08-29 10:55:30', '2016-08-29 10:55:42'), ('86', '132', '21', '1', '1', null, '2016-10-01 01:51:54', '2016-10-01 01:51:54'), ('87', '147', '22', '8', '0', '2016-10-27 15:50:57', '2016-10-27 15:50:45', '2016-10-27 15:50:57'), ('88', '149', '26', '1', '0', '2016-11-10 17:37:12', '2016-11-10 17:03:53', '2016-11-10 17:37:12');
COMMIT;

-- ----------------------------
-- Table structure for sys_permiso
-- ----------------------------
DROP TABLE IF EXISTS `sys_permiso`;
CREATE TABLE `sys_permiso` (
`id_permiso`  tinyint(2) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`accion`  varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_permiso`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=9

;

-- ----------------------------
-- Records of sys_permiso
-- ----------------------------
BEGIN;
INSERT INTO `sys_permiso` VALUES ('1', 'Agregar', 'agregar', '1', '0', '2016-06-17 11:10:43', '2016-06-17 11:10:43'), ('2', 'Editar', 'modificar', '1', '0', '2016-06-01 18:23:31', '2016-06-01 18:23:31'), ('3', 'Eliminar', 'eliminar', '1', '0', '2016-05-31 13:43:38', '2016-05-31 13:43:38'), ('4', 'Activar-Desactivar', 'estatus', '1', '0', '2016-05-31 13:43:44', '2016-05-31 13:43:44'), ('5', 'Restaurar', 'restaurar', '1', '0', '2016-06-13 12:40:31', '2016-06-13 12:40:31'), ('6', 'Ordenar', 'ordenar', '1', '0', '2016-06-02 23:35:21', '2016-06-02 23:35:21'), ('7', 'Listar', '', '1', '0', '2016-06-13 18:07:36', '2016-06-13 18:07:36'), ('8', 'Ver', 'mostrar', '1', '0', '2016-06-14 17:07:50', '2016-06-14 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for sys_privilegios
-- ----------------------------
DROP TABLE IF EXISTS `sys_privilegios`;
CREATE TABLE `sys_privilegios` (
`id_permiso`  tinyint(2) NOT NULL ,
`id_modulo`  int(5) NOT NULL ,
`id_rol`  int(2) NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
FOREIGN KEY (`id_permiso`) REFERENCES `sys_permiso` (`id_permiso`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_modulo`) REFERENCES `sys_modulo` (`id_modulo`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_rol`) REFERENCES `sys_rol` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `id_permiso` (`id_permiso`) USING BTREE ,
INDEX `id_modulo` (`id_modulo`) USING BTREE ,
INDEX `id_rol` (`id_rol`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of sys_privilegios
-- ----------------------------
BEGIN;
INSERT INTO `sys_privilegios` VALUES ('1', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '1', '5', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '16', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '16', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '16', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '16', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '16', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '16', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '17', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '18', '3', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '1', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '2', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '3', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '4', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '5', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '6', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '19', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '20', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `sys_privilegios` VALUES ('8', '21', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '22', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '23', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '24', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '25', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('1', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '26', '1', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for sys_rol
-- ----------------------------
DROP TABLE IF EXISTS `sys_rol`;
CREATE TABLE `sys_rol` (
`id_rol`  int(2) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_rol`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of sys_rol
-- ----------------------------
BEGIN;
INSERT INTO `sys_rol` VALUES ('1', 'ADMINISTRADOR', 'Administrador General del sistema', '1', '0', '2016-06-13 18:15:17', '2016-06-13 00:00:00'), ('2', 'USUARIO', 'Usuario normal del sistema', '1', '0', '2016-06-17 11:10:56', '2016-06-17 11:10:56'), ('3', 'DESARROLLO', 'Privilegios para dar de alta prototipos, etiquetas y características para desarrollos específicos', '1', '0', '2016-06-13 18:22:18', '2016-07-29 00:00:00'), ('4', 'ROL NUEVO', null, '1', '1', '2016-07-06 13:44:19', '2016-07-06 13:44:19'), ('5', 'DESARROLLO', 'Privilegios para dar de alta prototipos, etiquetas y características para desarrollos específicos', '1', '1', '2016-07-29 18:32:11', '2016-07-31 18:01:22');
COMMIT;

-- ----------------------------
-- Table structure for sys_seccion
-- ----------------------------
DROP TABLE IF EXISTS `sys_seccion`;
CREATE TABLE `sys_seccion` (
`id_seccion`  int(3) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`slug`  varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`orden`  int(3) NOT NULL ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_seccion`),
INDEX `id_cadena` (`nombre`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of sys_seccion
-- ----------------------------
BEGIN;
INSERT INTO `sys_seccion` VALUES ('1', 'Administrador', 'Sección de administración', 'administrador/', '1', '1', '0', '2016-05-20 12:50:31', '2016-05-20 12:50:31'), ('2', 'Prueba', 'Sección de prueba', 'administrador/prueba', '2', '1', '1', '2016-06-13 16:35:07', '2016-06-13 16:35:07'), ('3', 'Nueva prueba', 'Descripción de la nueva prueba', 'nueva', '3', '1', '0', '2016-06-13 13:52:54', '2016-06-13 13:52:54'), ('4', 'Otra', 'sección', 'nueva', '4', '1', '0', '2016-06-13 17:33:43', '2016-06-13 17:33:43'), ('5', 'Sección', '... espero', 'final', '5', '1', '0', '2016-06-17 11:10:07', '2016-06-17 11:10:07');
COMMIT;

-- ----------------------------
-- Table structure for sys_usuario
-- ----------------------------
DROP TABLE IF EXISTS `sys_usuario`;
CREATE TABLE `sys_usuario` (
`id_usuario`  int(2) NOT NULL AUTO_INCREMENT ,
`id_rol`  int(2) NOT NULL ,
`id_desarrollo`  int(5) NULL DEFAULT 0 ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`apellido`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`password`  varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`remember_token`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`telefono`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`imagen_perfil`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'assets/img/profiles/default.png' ,
`estatus`  tinyint(1) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(1) NOT NULL DEFAULT 0 ,
`created_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
`updated_at`  timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
PRIMARY KEY (`id_usuario`),
FOREIGN KEY (`id_rol`) REFERENCES `sys_rol` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `sys_usuario_ibfk_1` (`id_rol`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of sys_usuario
-- ----------------------------
BEGIN;
INSERT INTO `sys_usuario` VALUES ('1', '1', '0', 'Víctor Manuel', 'Gutiérrez Carrillo', 'ab.vgutierrez@abargon.com', '$2y$10$uGRJUg3cWesrA.pG81M2qeuevLtvuruWaDm0ZiYf18xOloUXmmWUC', 'V4zPm0fWmByp8vU6rAAIyGeuwOMILZLEzRStr2nWpHZ4fxahLgX8u9gn9RZW', '3121010764', 'assets/img/profiles/1.jpg', '1', '0', '0000-00-00 00:00:00', '2016-06-28 15:14:23'), ('2', '1', '0', 'Abargon', 'Administrador', 'administrador@abargon.com', '$2y$10$4eMt.B8ga/O6JduZYTztW.ghTtqV1d940wGfrh579Dvc.eIaOSjH6', null, '3399023', 'assets/img/profiles/2.jpg', '1', '0', '2016-05-13 13:24:53', '2016-06-15 12:26:51'), ('3', '1', '0', 'Juán José', 'Pérez', 'correo@mail.com', '$2y$10$tRseD52/bQd7CGS6sMhpTuea/Mj0zAT9pim8lbnGNxon11fsFPxsi', null, '3121234567', 'assets/img/profiles/3.jpg', '1', '1', '2016-05-13 14:24:16', '2016-06-15 09:44:40'), ('4', '3', '12', 'nuevo', 'dos', 'nuevo@dos.com', '$2y$10$A10.Tjo.y0m8Sxgqe9tI0.ZSCv0wodvXSzHakamcMM6zlQMB54t2i', null, '123456789', 'assets/img/profiles/4.jpg', '1', '0', '2016-06-13 17:54:40', '2016-07-31 16:52:40'), ('5', '3', '23', 'Víctor', 'Gutiérrez', 'wiz65@abargon.com', '$2y$10$XpW46etPM7x8wL.0Y8M.du1nN1GYYr3Q1HesI4jlFspAEwyhcYz7G', 'euacCALINspBkhcOAOF9T861k1SzvkyYErTr0bxyjn9E23lEMhpjkSOzGtn7', '31213123', 'assets/img/profiles/5.jpg', '1', '0', '2016-07-31 17:50:54', '2016-07-31 22:01:36');
COMMIT;

-- ----------------------------
-- Table structure for tipo_alimento
-- ----------------------------
DROP TABLE IF EXISTS `tipo_alimento`;
CREATE TABLE `tipo_alimento` (
`id_tipo`  tinyint(1) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_tipo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of tipo_alimento
-- ----------------------------
BEGIN;
INSERT INTO `tipo_alimento` VALUES ('1', 'Comida'), ('2', 'Bebida');
COMMIT;

-- ----------------------------
-- Table structure for tipo_red
-- ----------------------------
DROP TABLE IF EXISTS `tipo_red`;
CREATE TABLE `tipo_red` (
`id_tipo`  int(3) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
PRIMARY KEY (`id_tipo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of tipo_red
-- ----------------------------
BEGIN;
INSERT INTO `tipo_red` VALUES ('1', 'FACEBOOK'), ('2', 'TWITTER'), ('3', 'YOUTUBE'), ('4', 'GOOGLE');
COMMIT;

-- ----------------------------
-- Table structure for tipo_torneo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_torneo`;
CREATE TABLE `tipo_torneo` (
`id_tipo`  int(2) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_tipo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of tipo_torneo
-- ----------------------------
BEGIN;
INSERT INTO `tipo_torneo` VALUES ('1', 'Final'), ('2', 'Torneo regional');
COMMIT;

-- ----------------------------
-- Table structure for tipo_venta
-- ----------------------------
DROP TABLE IF EXISTS `tipo_venta`;
CREATE TABLE `tipo_venta` (
`id_tipo`  tinyint(1) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id_tipo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of tipo_venta
-- ----------------------------
BEGIN;
INSERT INTO `tipo_venta` VALUES ('1', 'Tpo venta 1');
COMMIT;

-- ----------------------------
-- Table structure for torneo
-- ----------------------------
DROP TABLE IF EXISTS `torneo`;
CREATE TABLE `torneo` (
`id_torneo`  int(10) NOT NULL AUTO_INCREMENT ,
`id_sucursal`  int(4) NOT NULL ,
`tipo_torneo`  int(2) NOT NULL ,
`titulo`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`slug`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fecha`  datetime NOT NULL ,
`archivo`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`link`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`estatus`  tinyint(4) NOT NULL DEFAULT 1 ,
`eliminado`  tinyint(4) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id_torneo`),
FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`tipo_torneo`) REFERENCES `tipo_torneo` (`id_tipo`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`tipo_torneo`) REFERENCES `tipo_torneo` (`id_tipo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `id_sucursal` (`id_sucursal`) USING BTREE ,
INDEX `tipo_torneo` (`tipo_torneo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of torneo
-- ----------------------------
BEGIN;
INSERT INTO `torneo` VALUES ('1', '1', '1', 'Torneo Tecamachalco', 'torneo-tecamachalco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse rhoncus quam id magna tempus viverra eu a libero. Fusce eget fringilla elit. Cras vel hendrerit quam. Aliquam ac risus nunc. Ut sit amet congue quam. Mauris tincidunt ex lorem, et tempus orci viverra tempor. Proin eu dolor ac lacus euismod sodales ac vel nibh. Fusce imperdiet euismod neque interdum fringilla. Donec et massa ut turpis blandit volutpat nec sit amet dolor. Nunc sollicitudin libero et purus ullamcorper, a porttitor ipsum tincidunt. Aliquam erat volutpat. Ut at scelerisque nisl, ut mollis tortor. Donec sagittis eu justo vel finibus. Etiam aliquam urna ac enim scelerisque, at tempor arcu gravida. Suspendisse porttitor scelerisque faucibus.', '2016-10-14 04:50:07', 'css/images/temp/tournament1.jpg', 'http://www.google.com.mx', '1', '0'), ('2', '3', '2', 'Torneo Piedras Negras', 'torneo-piedras-negras', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse rhoncus quam id magna tempus viverra eu a libero. Fusce eget fringilla elit. Cras vel hendrerit quam. Aliquam ac risus nunc. Ut sit amet congue quam. Mauris tincidunt ex lorem, et tempus orci viverra tempor. Proin eu dolor ac lacus euismod sodales ac vel nibh. Fusce imperdiet euismod neque interdum fringilla. Donec et massa ut turpis blandit volutpat nec sit amet dolor. Nunc sollicitudin libero et purus ullamcorper, a porttitor ipsum tincidunt. Aliquam erat volutpat. Ut at scelerisque nisl, ut mollis tortor. Donec sagittis eu justo vel finibus. Etiam aliquam urna ac enim scelerisque, at tempor arcu gravida. Suspendisse porttitor scelerisque faucibus.', '2016-10-13 04:51:44', 'css/images/temp/tournament2.jpg', null, '1', '0');
COMMIT;

-- ----------------------------
-- Auto increment value for alimento
-- ----------------------------
ALTER TABLE `alimento` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for carrerapdf
-- ----------------------------
ALTER TABLE `carrerapdf` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for categoria_alimento
-- ----------------------------
ALTER TABLE `categoria_alimento` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for ciudad
-- ----------------------------
ALTER TABLE `ciudad` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for contacto
-- ----------------------------
ALTER TABLE `contacto` AUTO_INCREMENT=9;

-- ----------------------------
-- Auto increment value for contenido_simple
-- ----------------------------
ALTER TABLE `contenido_simple` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for juego
-- ----------------------------
ALTER TABLE `juego` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for linea
-- ----------------------------
ALTER TABLE `linea` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for linea_galeria
-- ----------------------------
ALTER TABLE `linea_galeria` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for log_actividad
-- ----------------------------
ALTER TABLE `log_actividad` AUTO_INCREMENT=511;

-- ----------------------------
-- Auto increment value for log_session
-- ----------------------------
ALTER TABLE `log_session` AUTO_INCREMENT=151;

-- ----------------------------
-- Auto increment value for newsletter
-- ----------------------------
ALTER TABLE `newsletter` AUTO_INCREMENT=13;

-- ----------------------------
-- Auto increment value for promocion
-- ----------------------------
ALTER TABLE `promocion` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for proveedor
-- ----------------------------
ALTER TABLE `proveedor` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for red_social
-- ----------------------------
ALTER TABLE `red_social` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for slider
-- ----------------------------
ALTER TABLE `slider` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for sucursal
-- ----------------------------
ALTER TABLE `sucursal` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for sucursal_galeria
-- ----------------------------
ALTER TABLE `sucursal_galeria` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for sys_idioma
-- ----------------------------
ALTER TABLE `sys_idioma` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for sys_modulo
-- ----------------------------
ALTER TABLE `sys_modulo` AUTO_INCREMENT=27;

-- ----------------------------
-- Auto increment value for sys_papelera
-- ----------------------------
ALTER TABLE `sys_papelera` AUTO_INCREMENT=89;

-- ----------------------------
-- Auto increment value for sys_permiso
-- ----------------------------
ALTER TABLE `sys_permiso` AUTO_INCREMENT=9;

-- ----------------------------
-- Auto increment value for sys_rol
-- ----------------------------
ALTER TABLE `sys_rol` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for sys_seccion
-- ----------------------------
ALTER TABLE `sys_seccion` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for sys_usuario
-- ----------------------------
ALTER TABLE `sys_usuario` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for tipo_alimento
-- ----------------------------
ALTER TABLE `tipo_alimento` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for tipo_red
-- ----------------------------
ALTER TABLE `tipo_red` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for tipo_torneo
-- ----------------------------
ALTER TABLE `tipo_torneo` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for tipo_venta
-- ----------------------------
ALTER TABLE `tipo_venta` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for torneo
-- ----------------------------
ALTER TABLE `torneo` AUTO_INCREMENT=3;
