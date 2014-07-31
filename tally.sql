/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : tally

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-07-31 19:33:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `days`
-- ----------------------------
DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of days
-- ----------------------------
INSERT INTO `days` VALUES ('0', 'Pt');
INSERT INTO `days` VALUES ('1', 'Sa');
INSERT INTO `days` VALUES ('2', 'Ça');
INSERT INTO `days` VALUES ('3', 'Pe');
INSERT INTO `days` VALUES ('4', 'Cu');
INSERT INTO `days` VALUES ('5', 'Ct');
INSERT INTO `days` VALUES ('6', 'Pz');

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `period` enum('daily','weekly') NOT NULL DEFAULT 'daily',
  `order` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', 'T', 'daily', '1');
INSERT INTO `items` VALUES ('2', 'S', 'daily', '2');
INSERT INTO `items` VALUES ('3', 'D', 'daily', '3');
INSERT INTO `items` VALUES ('4', 'Ö', 'daily', '4');
INSERT INTO `items` VALUES ('5', 'İ', 'daily', '5');
INSERT INTO `items` VALUES ('6', 'A', 'daily', '6');
INSERT INTO `items` VALUES ('7', 'E', 'daily', '7');
INSERT INTO `items` VALUES ('8', 'Y', 'daily', '8');
INSERT INTO `items` VALUES ('9', 'SK', 'weekly', '9');
INSERT INTO `items` VALUES ('10', 'ÖK', 'weekly', '10');
INSERT INTO `items` VALUES ('11', 'İK', 'weekly', '11');
INSERT INTO `items` VALUES ('12', 'AK', 'weekly', '12');
INSERT INTO `items` VALUES ('13', 'YK', 'weekly', '13');
INSERT INTO `items` VALUES ('14', 'VK', 'weekly', '14');
INSERT INTO `items` VALUES ('15', 'K', 'weekly', '15');
INSERT INTO `items` VALUES ('16', 'C', 'weekly', '16');

-- ----------------------------
-- Table structure for `tally`
-- ----------------------------
DROP TABLE IF EXISTS `tally`;
CREATE TABLE `tally` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `week` int(2) NOT NULL,
  `day` int(1) DEFAULT NULL,
  `done` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=511 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tally
-- ----------------------------
INSERT INTO `tally` VALUES ('1', '1', '1', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('2', '2', '1', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('3', '1', '1', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('4', '2', '1', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('5', '1', '1', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('6', '2', '1', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('7', '1', '1', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('8', '2', '1', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('9', '1', '1', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('10', '2', '1', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('11', '1', '1', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('12', '2', '1', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('13', '1', '1', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('14', '2', '1', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('15', '1', '2', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('16', '2', '2', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('17', '1', '2', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('18', '2', '2', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('19', '1', '2', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('20', '2', '2', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('21', '2', '2', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('22', '1', '2', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('23', '1', '2', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('24', '2', '2', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('25', '1', '2', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('26', '2', '2', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('27', '1', '2', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('28', '2', '2', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('29', '1', '3', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('30', '2', '3', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('31', '1', '3', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('32', '2', '3', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('33', '1', '3', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('34', '2', '3', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('35', '1', '3', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('36', '2', '3', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('37', '1', '3', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('38', '2', '3', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('39', '2', '3', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('40', '1', '3', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('41', '1', '3', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('42', '2', '3', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('43', '1', '4', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('44', '2', '4', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('45', '1', '4', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('46', '2', '4', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('47', '1', '4', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('48', '2', '4', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('49', '1', '4', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('50', '2', '4', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('51', '1', '4', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('52', '2', '4', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('53', '1', '4', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('54', '2', '4', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('55', '1', '4', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('56', '2', '4', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('57', '2', '5', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('58', '1', '5', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('59', '1', '5', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('60', '2', '5', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('61', '1', '5', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('62', '2', '5', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('63', '1', '5', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('64', '2', '5', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('65', '1', '5', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('66', '2', '5', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('67', '1', '5', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('68', '2', '5', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('69', '1', '5', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('70', '2', '5', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('71', '1', '6', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('72', '2', '6', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('73', '1', '6', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('74', '2', '6', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('75', '1', '6', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('76', '2', '6', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('77', '1', '6', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('78', '2', '6', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('79', '1', '6', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('80', '2', '6', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('81', '1', '6', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('82', '2', '6', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('83', '1', '6', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('84', '2', '6', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('85', '2', '7', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('86', '1', '7', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('87', '1', '7', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('88', '2', '7', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('89', '1', '7', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('90', '2', '7', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('91', '1', '7', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('92', '2', '7', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('93', '1', '7', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('94', '2', '7', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('95', '1', '7', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('96', '2', '7', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('97', '1', '7', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('98', '2', '7', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('99', '1', '8', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('100', '2', '8', '2014', '31', '0', '');
INSERT INTO `tally` VALUES ('101', '1', '8', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('102', '2', '8', '2014', '31', '1', '');
INSERT INTO `tally` VALUES ('103', '2', '8', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('104', '1', '8', '2014', '31', '2', '');
INSERT INTO `tally` VALUES ('105', '1', '8', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('106', '2', '8', '2014', '31', '3', '');
INSERT INTO `tally` VALUES ('107', '1', '8', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('108', '2', '8', '2014', '31', '4', '');
INSERT INTO `tally` VALUES ('109', '1', '8', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('110', '2', '8', '2014', '31', '5', '');
INSERT INTO `tally` VALUES ('111', '1', '8', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('112', '2', '8', '2014', '31', '6', '');
INSERT INTO `tally` VALUES ('113', '1', '9', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('114', '2', '9', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('115', '1', '10', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('116', '2', '10', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('117', '1', '11', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('118', '2', '11', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('119', '1', '12', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('120', '2', '12', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('121', '2', '13', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('122', '1', '13', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('123', '1', '14', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('124', '2', '14', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('125', '1', '15', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('126', '2', '15', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('127', '1', '16', '2014', '31', null, '');
INSERT INTO `tally` VALUES ('128', '2', '16', '2014', '31', null, '');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pin` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'U', '12345');
INSERT INTO `users` VALUES ('2', 'N', '98765');

-- ----------------------------
-- Function structure for `week_monday`
-- ----------------------------
DROP FUNCTION IF EXISTS `week_monday`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `week_monday`(`pdate` date) RETURNS date
    NO SQL
    DETERMINISTIC
BEGIN
	RETURN adddate(pdate, INTERVAL -WEEKDAY(pdate) DAY);
END
;;
DELIMITER ;
