/*
Navicat MySQL Data Transfer

Source Server         : asd
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : gmk

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-20 14:56:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for actieve_eenheden
-- ----------------------------
DROP TABLE IF EXISTS `actieve_eenheden`;
CREATE TABLE `actieve_eenheden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eenheid_id` text,
  `naam` text,
  `roepnummer` text,
  `volgnummer` varchar(255) DEFAULT NULL,
  `specialisatie` varchar(255) DEFAULT NULL,
  `melding_id` text,
  `grip` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actieve_eenheden
-- ----------------------------

-- ----------------------------
-- Table structure for eenheden
-- ----------------------------
DROP TABLE IF EXISTS `eenheden`;
CREATE TABLE `eenheden` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `naam` text,
  `roepnummer` int(255) DEFAULT NULL,
  `volgnummer` int(255) DEFAULT NULL,
  `specialisatie` text,
  `aangemeld` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eenheden
-- ----------------------------
INSERT INTO `eenheden` VALUES ('1', 'Piet', '40', '10', '1', '0');
INSERT INTO `eenheden` VALUES ('2', 'Jan', '22', '14', '0', '0');
INSERT INTO `eenheden` VALUES ('3', 'Henk', '80', '12', '1', '0');
INSERT INTO `eenheden` VALUES ('4', 'Putin', '80', '11', '0', '0');

-- ----------------------------
-- Table structure for meldingen
-- ----------------------------
DROP TABLE IF EXISTS `meldingen`;
CREATE TABLE `meldingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` text,
  `melding` text,
  `afgerond` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of meldingen
-- ----------------------------

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `requests` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of requests
-- ----------------------------

-- ----------------------------
-- Table structure for roepnummers
-- ----------------------------
DROP TABLE IF EXISTS `roepnummers`;
CREATE TABLE `roepnummers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roepnummer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roepnummers
-- ----------------------------

-- ----------------------------
-- Table structure for specialisaties
-- ----------------------------
DROP TABLE IF EXISTS `specialisaties`;
CREATE TABLE `specialisaties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschrijving` text,
  `afkorting` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of specialisaties
-- ----------------------------
INSERT INTO `specialisaties` VALUES ('1', 'Geen', '-');
INSERT INTO `specialisaties` VALUES ('2', 'Vrijwillige Brandweer', 'VB');
INSERT INTO `specialisaties` VALUES ('3', 'Vrijwillige Ambulance', 'VA');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `surname` text,
  `rank` enum('0','1','2','3','4','5','6','7','8','9') DEFAULT '0',
  `username` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Pepijn', 'R', '9', 'pepijn', 'qwerty1');
INSERT INTO `users` VALUES ('2', 'Guest', 'G', '0', 'guest', 'guest');
