/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-06 19:34:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', '1494071652');
INSERT INTO `auth_assignment` VALUES ('user', '3', '1494071733');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', '1', 'admin role', null, null, '1493905108', '1494072867');
INSERT INTO `auth_item` VALUES ('createData', '2', null, null, null, '1493906944', '1494071288');
INSERT INTO `auth_item` VALUES ('deleteData', '2', null, null, null, '1493906964', '1494071296');
INSERT INTO `auth_item` VALUES ('updateData', '2', null, 'UpdateOwnData', null, '1493906955', '1494073911');
INSERT INTO `auth_item` VALUES ('user', '1', 'user role', null, null, '1494035552', '1494072638');
INSERT INTO `auth_item` VALUES ('viewData', '2', null, null, null, '1494071318', '1494071318');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', 'createData');
INSERT INTO `auth_item_child` VALUES ('admin', 'deleteData');
INSERT INTO `auth_item_child` VALUES ('admin', 'updateData');
INSERT INTO `auth_item_child` VALUES ('admin', 'viewData');
INSERT INTO `auth_item_child` VALUES ('user', 'updateData');
INSERT INTO `auth_item_child` VALUES ('user', 'viewData');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('UpdateOwnData', 'O:25:\"common\\rbac\\UpdateOwnData\":3:{s:4:\"name\";s:13:\"UpdateOwnData\";s:9:\"createdAt\";i:1494070630;s:9:\"updatedAt\";i:1494070630;}', '1494070630', '1494070630');

-- ----------------------------
-- Table structure for c_device_type
-- ----------------------------
DROP TABLE IF EXISTS `c_device_type`;
CREATE TABLE `c_device_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_device_type
-- ----------------------------
INSERT INTO `c_device_type` VALUES ('1', 'จอ');
INSERT INTO `c_device_type` VALUES ('2', 'เครื่องพิมพ์');

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data
-- ----------------------------
INSERT INTO `data` VALUES ('1', 'sa-createeffsdsd', '3');
INSERT INTO `data` VALUES ('3', 'admin-createrffddd', '1');
INSERT INTO `data` VALUES ('5', 'fffffffddd', '1');

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_add` date DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `device_sn` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `date_recept` date DEFAULT NULL,
  `job_rapid` varchar(255) DEFAULT NULL,
  `job_status` varchar(255) DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `job_note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job
-- ----------------------------
INSERT INTO `job` VALUES ('1', '2017-04-29', '1', 'sdsdsdsds', 'fffffff', '2017-04-29', '4', 'dfdf', '2017-04-29', 'fdaffffdf');
INSERT INTO `job` VALUES ('2', '2017-04-30', '1', '33333', 'yyyyy', '2017-04-26', '', '', null, '');
INSERT INTO `job` VALUES ('4', '2017-04-30', '2', '', '', null, '', '', null, '');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1493904699');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1493904713');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'zKZ328G9xzCIpsiNqZkn_V155qpvgljM', '$2y$13$EIobTwoS4Ai89iygOXP6DuIkqo9EQpSpQeALY6OicfscZdsyL99U.', null, 'admin@localhost.com', '10', '1', '1493524710', '1493524710');
INSERT INTO `user` VALUES ('3', 'sa', '8ZDD2LcAgZ1LFGj-kQOiU3ucUBhi1zPD', '$2y$13$Mu0BtZ6x5ms4a7I68olmMu86K5tuyPyw/Mzg9LZGUEfoomgf4ABlW', null, 'sa@localhost.com', '10', '99', '1494035444', '1494035444');
