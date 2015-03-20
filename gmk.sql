/*
 Navicat Premium Data Transfer

 Source Server         : asd
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost
 Source Database       : gmk

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : utf-8

 Date: 03/20/2015 21:38:19 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `actieve_eenheden`
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `eenheden`
-- ----------------------------
DROP TABLE IF EXISTS `eenheden`;
CREATE TABLE `eenheden` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `naam` text,
  `roepnummer` int(255) DEFAULT NULL,
  `volgnummer` int(255) DEFAULT NULL,
  `specialisatie` text,
  `aangemeld` text,
  `eenheid` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `meldingen`
-- ----------------------------
DROP TABLE IF EXISTS `meldingen`;
CREATE TABLE `meldingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` text,
  `melding` text,
  `afgerond` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `requests`
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `requests` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `roepnummers`
-- ----------------------------
DROP TABLE IF EXISTS `roepnummers`;
CREATE TABLE `roepnummers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roepnummer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `roepnummers`
-- ----------------------------
BEGIN;
INSERT INTO `roepnummers` VALUES ('1', '10'), ('2', '22');
COMMIT;

-- ----------------------------
--  Table structure for `specialisaties`
-- ----------------------------
DROP TABLE IF EXISTS `specialisaties`;
CREATE TABLE `specialisaties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschrijving` text,
  `afkorting` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `specialisaties`
-- ----------------------------
BEGIN;
INSERT INTO `specialisaties` VALUES ('1', 'Geen', '-'), ('2', 'Vrijwillige Brandweer', 'VB'), ('3', 'Vrijwillige Ambulance', 'VA');
COMMIT;

-- ----------------------------
--  Table structure for `units`
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eenheid` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `units`
-- ----------------------------
BEGIN;
INSERT INTO `units` VALUES ('1', 'Politie'), ('2', 'Ambulance'), ('3', 'Brandweer');
COMMIT;

-- ----------------------------
--  Table structure for `users`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Pepijn', 'R', '9', 'pepijn', 'qwerty1'), ('2', 'Guest', 'G', '9', 'guest', 'guest'), ('6', 'Jake', 'Miles', '3', 'JakeMiles', 'TEST'), ('7', 'Jake', 'M', '3', 'asd', 'asd');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
