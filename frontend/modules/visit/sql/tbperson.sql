/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-12 09:44:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbperson
-- ----------------------------
DROP TABLE IF EXISTS `tbperson`;
CREATE TABLE `tbperson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prename` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `age_y` int(11) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `prov_code` varchar(255) DEFAULT NULL,
  `amp_code` varchar(255) DEFAULT NULL,
  `tmb_code` varchar(255) DEFAULT NULL,
  `dischage_code` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbperson
-- ----------------------------
INSERT INTO `tbperson` VALUES ('1', 'นาย', 'อุเทน', 'จาดยางโทน', null, '', null, '', '56', '5602', '560207', '', null, '');
