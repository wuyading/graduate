/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : kexie_user

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-30 17:35:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sysadmin
-- ----------------------------
DROP TABLE IF EXISTS `sysadmin`;
CREATE TABLE `sysadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL COMMENT '用户名',
  `password` varchar(60) DEFAULT NULL COMMENT '密码',
  `random` int(6) DEFAULT NULL COMMENT '随机生成数',
  `email` varchar(45) DEFAULT NULL COMMENT '邮箱',
  `mobile` int(11) DEFAULT NULL COMMENT '手机号',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sysadmin
-- ----------------------------
INSERT INTO `sysadmin` VALUES ('1', 'admin', '$2y$10$ptFmbHu6oXBEZtNErGmI1exCumUtzMH2lKiobh5iyny8DdAKBux.K', '12345556', null, null, null);
