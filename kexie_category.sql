/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : kexie_category

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-30 17:35:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `parent_id` int(10) unsigned NOT NULL COMMENT '父类id',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除 1 不删除  2 删除',
  `level` int(10) unsigned NOT NULL COMMENT '等级',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '顶级分类', '0', '1', '1', '1490861881');
INSERT INTO `category` VALUES ('2', '动态资讯分类', '1', '1', '2', '1490861881');
INSERT INTO `category` VALUES ('13', '专家分类', '1', '1', '2', '0');
INSERT INTO `category` VALUES ('14', '公司新闻', '2', '1', '3', '0');
INSERT INTO `category` VALUES ('15', '行业新闻', '2', '1', '3', '0');
INSERT INTO `category` VALUES ('16', '苏州新闻', '2', '1', '3', '0');
INSERT INTO `category` VALUES ('17', '金融财税', '13', '1', '3', '0');
INSERT INTO `category` VALUES ('18', '大数据产业', '13', '1', '3', '0');
INSERT INTO `category` VALUES ('19', '医疗卫生', '13', '1', '3', '0');
INSERT INTO `category` VALUES ('20', '建筑工程', '13', '1', '3', '0');
INSERT INTO `category` VALUES ('21', '旅游开发', '13', '1', '3', '0');
INSERT INTO `category` VALUES ('22', '对接项目分类', '1', '1', '2', '0');
INSERT INTO `category` VALUES ('23', '金融财税', '22', '1', '3', '0');
INSERT INTO `category` VALUES ('24', '大数据产业', '22', '1', '3', '0');
INSERT INTO `category` VALUES ('25', '医疗卫生', '22', '1', '3', '0');
INSERT INTO `category` VALUES ('26', '建筑工程', '22', '1', '3', '0');
INSERT INTO `category` VALUES ('27', '旅游开发', '22', '1', '3', '0');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `category_id` int(11) unsigned NOT NULL COMMENT '分类的id',
  `path` varchar(145) DEFAULT NULL COMMENT '菜单的路径',
  `meta_title` varchar(245) DEFAULT NULL COMMENT 'meta标题',
  `meta_keywords` varchar(345) DEFAULT NULL COMMENT 'meta关键字',
  `meta_description` varchar(345) DEFAULT NULL COMMENT 'meta描述信息',
  PRIMARY KEY (`category_id`),
  CONSTRAINT `fk_menu_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
