/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-08 09:28:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `d_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data
-- ----------------------------
