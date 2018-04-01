/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : kexie

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2018-04-01 23:33:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL COMMENT '标题',
  `images` text COMMENT '图片 json',
  `content` longtext COMMENT '内容',
  `add_time` int(11) DEFAULT NULL,
  `sortid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='活动剪影';

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '第一届“苏州市百名专家教授进铜仁”活动剪影', '[{\"path\":\"\\/upload\\/activity\\/92443da96c446fe4798ad05be7853b6f.jpeg\",\"title\":\"\\u82cf\\u5dde\\u5e02\\u767e\\u540d\\u6559\\u6388\\u4e13\\u5bb6\\u94dc\\u4ec1\\u884c\\u6d3b\\u52a8\\u5ea7\\u8c08\\u4f1a\"},{\"path\":\"\\/upload\\/activity\\/ff6bc84f4a4c14febdf1368a7ab04423.jpeg\",\"title\":\"\\u8003\\u5bdf\\u82cf\\u5dde\\u63f4\\u5efa\\u9879\\u76ee\\u4e91\\u793e\\u6751\"},{\"path\":\"\\/upload\\/activity\\/764cb5f3bb3be759284c26f0322c85af.jpeg\",\"title\":\"\\u7a0b\\u6ce2\\u4e3b\\u5e2d\\u4e0e\\u767e\\u540d\\u4e13\\u5bb6\\u6559\\u6388\\u5728\\u793e\\u533a\\u8c03\\u7814\"},{\"path\":\"\\/upload\\/activity\\/a998c6eedadb23f4ff23f105808f40cc.jpeg\",\"title\":\"\\u7b51\\u725b\\u7f51\\u521b\\u59cb\\u4eba\\u517cCEO\\u738b\\u7ee7\\u6d32\\u535a\\u58eb\\u505a\\u4e92\\u8054\\u7f51+\\u6f14\\u8bb2\"},{\"path\":\"\\/upload\\/activity\\/bc63e0630d45a216815ac7ef601fcab4.png\",\"title\":\"\\u8003\\u5bdf\\u4e07\\u5c71\\u4e5d\\u4e30\\u9ad8\\u6821\\u519c\\u4e1a\\u7efc\\u5408\\u4f53\"},{\"path\":\"\\/upload\\/activity\\/b9ba9f2df2b31a466337725c42c907dc.png\",\"title\":\"\\u82cf\\u5dde\\u5e02\\u767e\\u540d\\u6559\\u6388\\u4e13\\u5bb6\\u94dc\\u4ec1\\u884c\\u6d3b\\u52a8\\u79d1\\u534f\\u8003\\u5bdf\"}]', '&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;12月12日至15日，苏州市科协党组书记、主席程波率领苏州教授专家一行12人赴贵州省铜仁市考察交流，拉开了苏州百名教授专家铜仁行活动帷幕。铜仁市委组织部副部长石月元、市科协主席周厚吉、市科协党组书记陈璇等分别陪同考察座谈。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　在启动仪式上，铜仁市科协主席周厚吉对苏州教授专家考察团一行表示欢迎和感谢，并简要介绍了铜仁市经济社会发展的基本情况。铜仁市委组织部副部长石月元做了热情洋溢的讲话，她指出，苏州百名教授专家铜仁行活动意义重大，是站在两市大局高度和人才建设高度，深化苏州、铜仁两地交流的重要举措，提升人才开发水平的重要载体，促进地方经济发展的有效途径。扶贫先扶智，通过这项活动加强对铜仁产业、教育、旅游、公共文化设施建设等方面的智力支持，带来更先进的理念、更严谨的作风、更前沿的技术。她希望加强内联外引，注重活动实效，通过实地考察、专题讲座、学术交流、咨询指导、短期培训、发展顾问、合作研究等措施，发挥苏州教授专家创新能力、科研专长、智囊作用，为铜仁加快提升人才规模和水平、促进科技成果转化、推进产业转型升级、促进地方经济社会发展献计献策。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　程波主席对铜仁市委组织部、市科协等单位为苏州百名教授专家铜仁行第一期活动的顺利举办所做的精心准备和安排表示感谢。她表示，苏州百名教授专家铜仁行活动是苏州帮扶铜仁“新三百工程”之一，由苏州市科协负责具体组织实施，“十三五”期间，每年将组织100名苏州教授专家分批次分区域赴铜仁开展多种形式的对口交流活动。她希望各位教授专家以此为起点，很好地了解铜仁、对接铜仁、服务铜仁，共同开启苏、铜两地友好交往的新窗口，搭建苏、铜两地共同发展的新平台，实现苏、铜两地合作共赢的新局面。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　苏州市科协充分发挥联系广泛、网络健全、人才济济等自身优势，前期通过与铜仁市委组织部人才办的充分沟通，下发了《关于建立苏州帮扶铜仁教授专家库的通知》，围绕铜仁发展比较需要的金融、财政税务、工业化工、农业技术、大数据产业、企业管理、医疗卫生等专业，采取志愿报名、组织推荐的方式，广泛推选、招募副高以上专业技术职称，有较高的学术造诣和扎实的业务能力，具有对口服务良好意愿的教授（专家）以及部分没有职称但有丰富管理经验的企业家入库。首批入库成员已经达到了108名，主要来自苏州大学、苏州科技大学等在苏高校，苏州专家咨询团、博士联谊会、国家“千人计划”、省“双创计划”、市“姑苏领军人才”及历届魅力科技人物等，专业基本能够覆盖上述需求，还有一些教授专家正在陆续报名入库。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　苏州科技大学商学院院长王世文教授，苏州大学附属第二医院骨外科主任医师、科教处处长徐又佳博士，苏州干部学院财务审计处处长蔡俊伦副教授，江苏筑牛网络科技有限公司总裁王继洲博士，东吴证券股份有限公司投行部事业部副总经理李永伟，苏州市建筑科学研究院董事长、总经理吴小翔、总建筑师王宏伟、营销中心经理郭玮等八位教授专家参加了第一期活动，他们以专题报告、现场考察、座谈交流等形式分别与有关部门和单位进行了深入对接，达成了初步合作意向。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　考察团一行实地考察了苏州援建土家第一村江口县云舍村和碧江区灯塔工业园建设推进情况以及万山九丰高效农业综合体、万山矿山地质博物馆、双月科普示范社区、冲广坪科普示范社区、江口县人民医院等地。&#60;/p&#62;&#60;p&#62;&#60;br/&#62;&#60;/p&#62;', '1493805912', '21', '1');
INSERT INTO `activity` VALUES ('3', 'ffff', '[{\"path\":\"\\/upload\\/activity\\/92443da96c446fe4798ad05be7853b6f.jpeg\",\"title\":\"\\u82cf\\u5dde\\u5e02\\u767e\\u540d\\u6559\\u6388\\u4e13\\u5bb6\\u94dc\\u4ec1\\u884c\\u6d3b\\u52a8\\u5ea7\\u8c08\\u4f1a\"},{\"path\":\"\\/upload\\/activity\\/ff6bc84f4a4c14febdf1368a7ab04423.jpeg\",\"title\":\"\\u8003\\u5bdf\\u82cf\\u5dde\\u63f4\\u5efa\\u9879\\u76ee\\u4e91\\u793e\\u6751\"},{\"path\":\"\\/upload\\/activity\\/764cb5f3bb3be759284c26f0322c85af.jpeg\",\"title\":\"\\u7a0b\\u6ce2\\u4e3b\\u5e2d\\u4e0e\\u767e\\u540d\\u4e13\\u5bb6\\u6559\\u6388\\u5728\\u793e\\u533a\\u8c03\\u7814\"},{\"path\":\"\\/upload\\/activity\\/a998c6eedadb23f4ff23f105808f40cc.jpeg\",\"title\":\"\\u7b51\\u725b\\u7f51\\u521b\\u59cb\\u4eba\\u517cCEO\\u738b\\u7ee7\\u6d32\\u535a\\u58eb\\u505a\\u4e92\\u8054\\u7f51+\\u6f14\\u8bb2\"},{\"path\":\"\\/upload\\/activity\\/bc63e0630d45a216815ac7ef601fcab4.png\",\"title\":\"\\u8003\\u5bdf\\u4e07\\u5c71\\u4e5d\\u4e30\\u9ad8\\u6821\\u519c\\u4e1a\\u7efc\\u5408\\u4f53\"},{\"path\":\"\\/upload\\/activity\\/b9ba9f2df2b31a466337725c42c907dc.png\",\"title\":\"\\u82cf\\u5dde\\u5e02\\u767e\\u540d\\u6559\\u6388\\u4e13\\u5bb6\\u94dc\\u4ec1\\u884c\\u6d3b\\u52a8\\u79d1\\u534f\\u8003\\u5bdf\"}]', '&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;12月12日至15日，苏州市科协党组书记、主席程波率领苏州教授专家一行12人赴贵州省铜仁市考察交流，拉开了苏州百名教授专家铜仁行活动帷幕。铜仁市委组织部副部长石月元、市科协主席周厚吉、市科协党组书记陈璇等分别陪同考察座谈。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　在启动仪式上，铜仁市科协主席周厚吉对苏州教授专家考察团一行表示欢迎和感谢，并简要介绍了铜仁市经济社会发展的基本情况。铜仁市委组织部副部长石月元做了热情洋溢的讲话，她指出，苏州百名教授专家铜仁行活动意义重大，是站在两市大局高度和人才建设高度，深化苏州、铜仁两地交流的重要举措，提升人才开发水平的重要载体，促进地方经济发展的有效途径。扶贫先扶智，通过这项活动加强对铜仁产业、教育、旅游、公共文化设施建设等方面的智力支持，带来更先进的理念、更严谨的作风、更前沿的技术。她希望加强内联外引，注重活动实效，通过实地考察、专题讲座、学术交流、咨询指导、短期培训、发展顾问、合作研究等措施，发挥苏州教授专家创新能力、科研专长、智囊作用，为铜仁加快提升人才规模和水平、促进科技成果转化、推进产业转型升级、促进地方经济社会发展献计献策。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　程波主席对铜仁市委组织部、市科协等单位为苏州百名教授专家铜仁行第一期活动的顺利举办所做的精心准备和安排表示感谢。她表示，苏州百名教授专家铜仁行活动是苏州帮扶铜仁“新三百工程”之一，由苏州市科协负责具体组织实施，“十三五”期间，每年将组织100名苏州教授专家分批次分区域赴铜仁开展多种形式的对口交流活动。她希望各位教授专家以此为起点，很好地了解铜仁、对接铜仁、服务铜仁，共同开启苏、铜两地友好交往的新窗口，搭建苏、铜两地共同发展的新平台，实现苏、铜两地合作共赢的新局面。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　苏州市科协充分发挥联系广泛、网络健全、人才济济等自身优势，前期通过与铜仁市委组织部人才办的充分沟通，下发了《关于建立苏州帮扶铜仁教授专家库的通知》，围绕铜仁发展比较需要的金融、财政税务、工业化工、农业技术、大数据产业、企业管理、医疗卫生等专业，采取志愿报名、组织推荐的方式，广泛推选、招募副高以上专业技术职称，有较高的学术造诣和扎实的业务能力，具有对口服务良好意愿的教授（专家）以及部分没有职称但有丰富管理经验的企业家入库。首批入库成员已经达到了108名，主要来自苏州大学、苏州科技大学等在苏高校，苏州专家咨询团、博士联谊会、国家“千人计划”、省“双创计划”、市“姑苏领军人才”及历届魅力科技人物等，专业基本能够覆盖上述需求，还有一些教授专家正在陆续报名入库。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　苏州科技大学商学院院长王世文教授，苏州大学附属第二医院骨外科主任医师、科教处处长徐又佳博士，苏州干部学院财务审计处处长蔡俊伦副教授，江苏筑牛网络科技有限公司总裁王继洲博士，东吴证券股份有限公司投行部事业部副总经理李永伟，苏州市建筑科学研究院董事长、总经理吴小翔、总建筑师王宏伟、营销中心经理郭玮等八位教授专家参加了第一期活动，他们以专题报告、现场考察、座谈交流等形式分别与有关部门和单位进行了深入对接，达成了初步合作意向。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: &#34;&#62;　　考察团一行实地考察了苏州援建土家第一村江口县云舍村和碧江区灯塔工业园建设推进情况以及万山九丰高效农业综合体、万山矿山地质博物馆、双月科普示范社区、冲广坪科普示范社区、江口县人民医院等地。&#60;/p&#62;&#60;p&#62;&#60;br/&#62;&#60;/p&#62;', '1493805907', '21', '1');

-- ----------------------------
-- Table structure for apply_cooperate
-- ----------------------------
DROP TABLE IF EXISTS `apply_cooperate`;
CREATE TABLE `apply_cooperate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL COMMENT '项目ID',
  `desc` text NOT NULL COMMENT '合作思路简述',
  `name` varchar(45) NOT NULL COMMENT '姓名',
  `phone` varchar(45) NOT NULL COMMENT '联系方式',
  `ip` varchar(45) NOT NULL,
  `user_agent` varchar(45) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='项目合作申请';

-- ----------------------------
-- Records of apply_cooperate
-- ----------------------------
INSERT INTO `apply_cooperate` VALUES ('1', '2', '11', '22', '333', '127.0.0.1', '', '1492224004');
INSERT INTO `apply_cooperate` VALUES ('3', '2', '合作思路喔', '吴亚丁', '18912640643', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebK', '1492767987');

-- ----------------------------
-- Table structure for apply_expert
-- ----------------------------
DROP TABLE IF EXISTS `apply_expert`;
CREATE TABLE `apply_expert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT '姓名',
  `logo` varchar(345) DEFAULT NULL COMMENT '头像',
  `sex` tinyint(4) NOT NULL COMMENT '性别 1 男 2 女',
  `birthday` varchar(15) NOT NULL COMMENT '出生年月',
  `education` varchar(45) DEFAULT NULL COMMENT '学历',
  `nation` varchar(45) DEFAULT NULL COMMENT '民族',
  `political_status` varchar(45) DEFAULT NULL COMMENT '政治面貌',
  `profession` varchar(345) DEFAULT NULL COMMENT '专业',
  `technical_title` varchar(45) DEFAULT NULL COMMENT '职称',
  `work_unit` varchar(345) DEFAULT NULL COMMENT '工作单位',
  `job` varchar(245) DEFAULT NULL COMMENT '职务',
  `address` varchar(345) DEFAULT NULL COMMENT '通信地址',
  `zip` varchar(45) DEFAULT NULL COMMENT '邮政编码',
  `email` varchar(45) DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(45) DEFAULT NULL COMMENT '办公电话',
  `qq` varchar(45) DEFAULT NULL COMMENT 'qq 微信',
  `mobile` varchar(15) NOT NULL COMMENT '手机号',
  `west_experience` text COMMENT '您有无对口帮扶西部地区的经历？如有，从事过哪方面的服务？',
  `use_time` varchar(145) DEFAULT NULL COMMENT '您能参与帮扶铜仁活动的时间',
  `use_way` varchar(45) DEFAULT NULL COMMENT '您希望参与帮扶铜仁活动的形式',
  `is_commitment` tinyint(4) DEFAULT '1' COMMENT '个人承诺',
  `description` text COMMENT ' 个人简介',
  `user_agent` varchar(345) NOT NULL COMMENT '浏览器信息',
  `add_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  `ip` varchar(20) NOT NULL COMMENT 'ip地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='申请加入专家库';

-- ----------------------------
-- Records of apply_expert
-- ----------------------------
INSERT INTO `apply_expert` VALUES ('1', '吴亚丁', '/upload/project/7a/8a//7a8a699aaf6048160f760514778f50b6.jpeg', '1', '19930829', '111', '汉', '团员', '计算机', 'PHP', '筑牛网', 'PHP', '苏州', '200000', '863758424@qq.com', '18912640643', '863758424', '4294967295', '111', '2017', '3,4', '1', '呜呜呜呜', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.110 Safari/537.36', '1498548802', '127.0.0.1');

-- ----------------------------
-- Table structure for apply_project
-- ----------------------------
DROP TABLE IF EXISTS `apply_project`;
CREATE TABLE `apply_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) NOT NULL COMMENT '项目名称',
  `linkman` varchar(45) NOT NULL COMMENT '项目联系人',
  `mobile` varchar(15) NOT NULL COMMENT '项目联系方式',
  `desc` text NOT NULL COMMENT '项目描述',
  `ip` varchar(45) NOT NULL,
  `user_agent` varchar(345) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='项目信息申请';

-- ----------------------------
-- Records of apply_project
-- ----------------------------
INSERT INTO `apply_project` VALUES ('1', '666', '666', '666', '666', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0', '1492241652');

-- ----------------------------
-- Table structure for apply_tutor
-- ----------------------------
DROP TABLE IF EXISTS `apply_tutor`;
CREATE TABLE `apply_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL COMMENT '导师ID',
  `name` varchar(45) DEFAULT NULL COMMENT '项目名称',
  `linkman` varchar(45) DEFAULT NULL COMMENT '项目联系人',
  `phone` varchar(45) DEFAULT NULL COMMENT '项目联系方式',
  `desc` text COMMENT '项目描述',
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(345) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='项目导师 邀请';

-- ----------------------------
-- Records of apply_tutor
-- ----------------------------
INSERT INTO `apply_tutor` VALUES ('5', '3', '项目名称', '吴亚丁', '18912640643', '项目描述', '127.0.0.1', null, '1492764629');

-- ----------------------------
-- Table structure for expert
-- ----------------------------
DROP TABLE IF EXISTS `expert`;
CREATE TABLE `expert` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '添加者ID',
  `name` varchar(255) NOT NULL COMMENT '专家姓名',
  `role` tinytext NOT NULL COMMENT '现任职位',
  `simple_intro` text NOT NULL COMMENT '专家简介',
  `detail_intro` longtext NOT NULL COMMENT '详细介绍',
  `category_id` int(11) NOT NULL COMMENT '分类ID',
  `sortid` int(11) NOT NULL COMMENT '排序',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `logo` varchar(245) DEFAULT NULL COMMENT '用户头像',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of expert
-- ----------------------------
INSERT INTO `expert` VALUES ('1', '1', '徐又佳', '医学博士，现任苏州大学附属第二医院骨外科主任医师，科教处处长', '江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏', '<h3>社会兼职</h3>\n        <p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p>\n    \n        <h3>学术职位</h3>\n        <p>1985年7月 苏州医学院 医学学士</p>\n        <p>1989年7月 南京大学 法学第二学士</p>\n        <p>1994年7月 苏州医学院 医学硕士</p>\n        <p>1999年7月 苏州医学院 医学博士</p>\n        <p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p>\n        <p>1999年获苏州市百名优秀青年称号</p>\n        <p>2000年获苏州市劳动模范称号</p>\n        <p>2002年入选苏州市首批跨世纪高级人才培养对象</p>\n        <p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p>\n        <p>1989年12月－今 苏州大学附属第二医院</p>\n    \n        <h3>个人荣誉&科研获奖</h3>\n        <p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p>\n        <p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p>\n        <p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p>\n        <p>2003年获苏州大学科技进步二等奖（第一负责人）</p>\n        <p>2005年获苏州市科技进步三等奖（第一负责人）</p>\n        <p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p>\n        <p>2004年获卫生部医学科研基金（第二负责人）</p>\n        <p>2005年获省教育厅厅自然基金（第一负责人）</p>\n        <br>\n        <p>发表论文40余篇、副主编论著1部、参编论著2部。</p>\n        <p>1999年5月 获苏州市青年科技标兵称号</p>\n        <p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p>\n        <p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p>\n        <p>2002年 当选苏州市卫生系统“青年专家组”成员</p>\n        <p>2002年 当选苏州市医疗事故专家库成员</p>\n        <p>2003年 当选江苏省卫生法学会理事</p>\n        <p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '19', '1', '2017-04-19 06:04:23', '/upload/expert/9b63518ab54f5222b3838bc3bdceebb6.png');
INSERT INTO `expert` VALUES ('2', '1', '王继洲', '财政部中国财政科学研究院博士、中国社会科学院财经战略研究院博士后、江苏筑牛网络科技有限公司创始人兼CEO', '财政部中国财政科学研究院博士、中国社会科学院财经战略研究院博士后、江苏筑牛网络科技有限公司创始人兼CEO', '<h3>社会兼职</h3>\n        <p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p>\n    \n        <h3>学术职位</h3>\n        <p>1985年7月 苏州医学院 医学学士</p>\n        <p>1989年7月 南京大学 法学第二学士</p>\n        <p>1994年7月 苏州医学院 医学硕士</p>\n        <p>1999年7月 苏州医学院 医学博士</p>\n        <p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p>\n        <p>1999年获苏州市百名优秀青年称号</p>\n        <p>2000年获苏州市劳动模范称号</p>\n        <p>2002年入选苏州市首批跨世纪高级人才培养对象</p>\n        <p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p>\n        <p>1989年12月－今 苏州大学附属第二医院</p>\n    \n        <h3>个人荣誉&科研获奖</h3>\n        <p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p>\n        <p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p>\n        <p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p>\n        <p>2003年获苏州大学科技进步二等奖（第一负责人）</p>\n        <p>2005年获苏州市科技进步三等奖（第一负责人）</p>\n        <p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p>\n        <p>2004年获卫生部医学科研基金（第二负责人）</p>\n        <p>2005年获省教育厅厅自然基金（第一负责人）</p>\n        <br>\n        <p>发表论文40余篇、副主编论著1部、参编论著2部。</p>\n        <p>1999年5月 获苏州市青年科技标兵称号</p>\n        <p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p>\n        <p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p>\n        <p>2002年 当选苏州市卫生系统“青年专家组”成员</p>\n        <p>2002年 当选苏州市医疗事故专家库成员</p>\n        <p>2003年 当选江苏省卫生法学会理事</p>\n        <p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '18', '1', '2017-04-19 06:02:16', '/upload/expert/f2e45245b73a8937e0ca29961199b468.png');
INSERT INTO `expert` VALUES ('3', '1', '王世文', '硕士研究生，副教授，现任苏州科技大学商学院院长，金融财税类专家，首届百名专家教授铜仁行活动专家团成员', '先后就读于山西财经学院投资经济管理专业、复旦大学国际金融专业和苏州大学金融学专业。2002年起于苏州科技学院工作，曾任工商管理系副主任、经管学院副院长和分工会主席等职务。兼任', '<h3>社会兼职</h3>\n        <p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p>\n    \n        <h3>学术职位</h3>\n        <p>1985年7月 苏州医学院 医学学士</p>\n        <p>1989年7月 南京大学 法学第二学士</p>\n        <p>1994年7月 苏州医学院 医学硕士</p>\n        <p>1999年7月 苏州医学院 医学博士</p>\n        <p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p>\n        <p>1999年获苏州市百名优秀青年称号</p>\n        <p>2000年获苏州市劳动模范称号</p>\n        <p>2002年入选苏州市首批跨世纪高级人才培养对象</p>\n        <p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p>\n        <p>1989年12月－今 苏州大学附属第二医院</p>\n    \n        <h3>个人荣誉&科研获奖</h3>\n        <p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p>\n        <p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p>\n        <p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p>\n        <p>2003年获苏州大学科技进步二等奖（第一负责人）</p>\n        <p>2005年获苏州市科技进步三等奖（第一负责人）</p>\n        <p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p>\n        <p>2004年获卫生部医学科研基金（第二负责人）</p>\n        <p>2005年获省教育厅厅自然基金（第一负责人）</p>\n        <br>\n        <p>发表论文40余篇、副主编论著1部、参编论著2部。</p>\n        <p>1999年5月 获苏州市青年科技标兵称号</p>\n        <p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p>\n        <p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p>\n        <p>2002年 当选苏州市卫生系统“青年专家组”成员</p>\n        <p>2002年 当选苏州市医疗事故专家库成员</p>\n        <p>2003年 当选江苏省卫生法学会理事</p>\n        <p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '17', '1', '2017-04-19 06:05:21', '/upload/expert/767295d89b0d62f5a0ba8d35458979ea.png');
INSERT INTO `expert` VALUES ('4', '1', '吴小翔', '苏州市建筑科学研究院董事长、总经理', '吴小翔，男，苏州市建筑科学研究院董事长、总经理。长期坚守科研生产一线，从事建筑节能的实践方面的研究工作，带领企业开展科研攻关，致力于建筑行业新技术、新产品的研发与产业化。', '<h3>社会兼职</h3>\n        <p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p>\n    \n        <h3>学术职位</h3>\n        <p>1985年7月 苏州医学院 医学学士</p>\n        <p>1989年7月 南京大学 法学第二学士</p>\n        <p>1994年7月 苏州医学院 医学硕士</p>\n        <p>1999年7月 苏州医学院 医学博士</p>\n        <p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p>\n        <p>1999年获苏州市百名优秀青年称号</p>\n        <p>2000年获苏州市劳动模范称号</p>\n        <p>2002年入选苏州市首批跨世纪高级人才培养对象</p>\n        <p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p>\n        <p>1989年12月－今 苏州大学附属第二医院</p>\n    \n        <h3>个人荣誉&科研获奖</h3>\n        <p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p>\n        <p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p>\n        <p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p>\n        <p>2003年获苏州大学科技进步二等奖（第一负责人）</p>\n        <p>2005年获苏州市科技进步三等奖（第一负责人）</p>\n        <p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p>\n        <p>2004年获卫生部医学科研基金（第二负责人）</p>\n        <p>2005年获省教育厅厅自然基金（第一负责人）</p>\n        <br>\n        <p>发表论文40余篇、副主编论著1部、参编论著2部。</p>\n        <p>1999年5月 获苏州市青年科技标兵称号</p>\n        <p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p>\n        <p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p>\n        <p>2002年 当选苏州市卫生系统“青年专家组”成员</p>\n        <p>2002年 当选苏州市医疗事故专家库成员</p>\n        <p>2003年 当选江苏省卫生法学会理事</p>\n        <p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '20', '1', '2017-04-19 07:22:50', '/upload/expert/2e76482f900605fe7d395636e0435acc.png');
INSERT INTO `expert` VALUES ('5', '1', '邢夫敏', '苏州科技大学人文社科处副处长，副教授，硕士研究生导师，苏州国家旅游标准研究与推广示范中心主任', '邢夫敏，女，苏州科技大学人文社科处副处长，副教授，硕士研究生导师，苏州国家旅游标准研究与推广示范中心主任。曾在新西兰奥塔哥大学高级访问，澳大利亚悉尼大学短期培训。江苏省“', '<h3>社会兼职</h3>\n        <p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p>\n    \n        <h3>学术职位</h3>\n        <p>1985年7月 苏州医学院 医学学士</p>\n        <p>1989年7月 南京大学 法学第二学士</p>\n        <p>1994年7月 苏州医学院 医学硕士</p>\n        <p>1999年7月 苏州医学院 医学博士</p>\n        <p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p>\n        <p>1999年获苏州市百名优秀青年称号</p>\n        <p>2000年获苏州市劳动模范称号</p>\n        <p>2002年入选苏州市首批跨世纪高级人才培养对象</p>\n        <p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p>\n        <p>1989年12月－今 苏州大学附属第二医院</p>\n    \n        <h3>个人荣誉&科研获奖</h3>\n        <p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p>\n        <p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p>\n        <p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p>\n        <p>2003年获苏州大学科技进步二等奖（第一负责人）</p>\n        <p>2005年获苏州市科技进步三等奖（第一负责人）</p>\n        <p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p>\n        <p>2004年获卫生部医学科研基金（第二负责人）</p>\n        <p>2005年获省教育厅厅自然基金（第一负责人）</p>\n        <br>\n        <p>发表论文40余篇、副主编论著1部、参编论著2部。</p>\n        <p>1999年5月 获苏州市青年科技标兵称号</p>\n        <p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p>\n        <p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p>\n        <p>2002年 当选苏州市卫生系统“青年专家组”成员</p>\n        <p>2002年 当选苏州市医疗事故专家库成员</p>\n        <p>2003年 当选江苏省卫生法学会理事</p>\n        <p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '21', '1', '2017-04-19 06:07:23', null);
INSERT INTO `expert` VALUES ('6', '1', '徐征', '复旦大学旅游管理专业硕士研究生毕业，苏州市旅游局规划发展处处长', '徐征，女，复旦大学旅游管理专业硕士研究生毕业，苏州市旅游局规划发展处处长，从事旅游管理，热爱旅游行业，醉心旅游生活，读书未破万卷，旅行已过万里。主要研究方向：旅游规划、产', '<h3>社会兼职</h3><p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p><h3>学术职位</h3><p>1985年7月 苏州医学院 医学学士</p><p>1989年7月 南京大学 法学第二学士</p><p>1994年7月 苏州医学院 医学硕士</p><p>1999年7月 苏州医学院 医学博士</p><p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p><p>1999年获苏州市百名优秀青年称号</p><p>2000年获苏州市劳动模范称号</p><p>2002年入选苏州市首批跨世纪高级人才培养对象</p><p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p><p>1989年12月－今 苏州大学附属第二医院</p><h3>个人荣誉&amp;科研获奖</h3><p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p><p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p><p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p><p>2003年获苏州大学科技进步二等奖（第一负责人）</p><p>2005年获苏州市科技进步三等奖（第一负责人）</p><p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p><p>2004年获卫生部医学科研基金（第二负责人）</p><p>2005年获省教育厅厅自然基金（第一负责人）</p><p><br/></p><p>发表论文40余篇、副主编论著1部、参编论著2部。</p><p>1999年5月 获苏州市青年科技标兵称号</p><p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p><p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p><p>2002年 当选苏州市卫生系统“青年专家组”成员</p><p>2002年 当选苏州市医疗事故专家库成员</p><p>2003年 当选江苏省卫生法学会理事</p><p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '21', '10', '2017-05-27 16:08:35', null);
INSERT INTO `expert` VALUES ('7', '1', '庞家杰', '同程旅游政府事务合作部高级总监', '庞家杰，同程旅游政府事务合作部高级总监，主要从事景区宣传和目的地营销工作，曾就智慧旅游在新疆首届智慧旅游高峰论坛、贵阳数博会发表主题演讲；就全域旅游营销给广州仁化县旅游局', '<h3>社会兼职</h3><p>江苏省骨质疏松与骨矿盐疾病学会副主任委员、江苏省省骨科学会创伤专业组委员、江苏省修复与重建外科学会常务委员、江苏省卫生法学会常务理事、江苏省医院管理学会委员、苏州市骨质疏松与骨矿盐疾病专业委员会主任委员、苏州市骨外科专业委员会常务委员、国际关节镜-膝关节外科-骨科运动医学学会（ISAKOS）会员、江苏医药编委、苏州大学学报（医学版）常务编委、中华创伤杂志 编委、中华实验外科杂志编委。</p><h3>学术职位</h3><p>1985年7月 苏州医学院 医学学士</p><p>1989年7月 南京大学 法学第二学士</p><p>1994年7月 苏州医学院 医学硕士</p><p>1999年7月 苏州医学院 医学博士</p><p>2004年6月－2005年6月 香港理工大学 “PAST DOCTOR FELLOW ”</p><p>1999年获苏州市百名优秀青年称号</p><p>2000年获苏州市劳动模范称号</p><p>2002年入选苏州市首批跨世纪高级人才培养对象</p><p>2002年入选江苏省“333新世纪科学技术带头人培养工程”培养对象</p><p>1989年12月－今 苏州大学附属第二医院</p><h3>个人荣誉&amp;科研获奖</h3><p>曾获苏州市劳动模范，省医学新技术引进奖等省部级、市级奖项10项。</p><p>1994年获科技进步奖（部二等、省卫生厅一等、苏州市二等）（第二负责人）</p><p>1997年、1999年获部科技进步三等奖2项（第一负责人）</p><p>2003年获苏州大学科技进步二等奖（第一负责人）</p><p>2005年获苏州市科技进步三等奖（第一负责人）</p><p>1998年获省科技厅自然基金（第一负责人）2003年获省卫生厅医学科技发展基金 （第一负责人）</p><p>2004年获卫生部医学科研基金（第二负责人）</p><p>2005年获省教育厅厅自然基金（第一负责人）</p><p><br/></p><p>发表论文40余篇、副主编论著1部、参编论著2部。</p><p>1999年5月 获苏州市青年科技标兵称号</p><p>1998年、1999年、2000年分别获市自然科学优秀论文一等、二等奖3次</p><p>2001年 当选江苏省医院管理学会“自律与维权”委员会委员</p><p>2002年 当选苏州市卫生系统“青年专家组”成员</p><p>2002年 当选苏州市医疗事故专家库成员</p><p>2003年 当选江苏省卫生法学会理事</p><p>2004年 当选江苏省药学会药事管理学专业委员会委员</p>', '21', '1', '2017-05-27 16:08:17', null);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(225) NOT NULL COMMENT '标题',
  `logo` varchar(145) DEFAULT NULL COMMENT 'logo\n',
  `content` longtext COMMENT '内容',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是热点  0 普通 1 热点',
  `sortid` int(10) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '1', '14', '江苏冬夏中标园区某上市公司数据中心运维项目', '/upload/project/049e151a63d7a48c369b480bfe03de3f.png', '&#60;p&#62;&#60;span style=&#34;color: rgb(80, 80, 80); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&#34;&#62;近日，江苏冬夏成功中标园区某上市公司数据中心运维项目，项目内容涵盖核心网络，服务器，存储及虚拟化系统等&#60;/span&#62;&#60;/p&#62;', '1522292273', '1', '2');
INSERT INTO `news` VALUES ('2', '1', '14', '冬夏科技中标某韩企IP电话系统建设项目', '/upload/project/ead01a4c45ed23cead547c2318496964.jpeg', '&#60;p&#62;&#60;span style=&#34;color: rgb(80, 80, 80); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&#34;&#62;冬夏科技中标某韩企IP电话系统建设项目，近日，冬夏科技凭借丰富的Cisco IP电话系统实施经验，中标某韩企IP电话系统建设项目,该项目通过两套Cisco BE6K服务器实现Cisco CallManager Server冗余备份，保证IP电话系统的可用性&#60;/span&#62;&#60;/p&#62;', '1522292398', '0', '1');
INSERT INTO `news` VALUES ('3', '1', '16', '姑苏区将办两场大型招聘会 提供岗位2295个', '/upload/project/0f4287a9d2cd6116604a6d206035e3e0.jpeg', '&#60;p&#62;&#60;span style=&#34;color: rgb(51, 51, 51); font-family: 宋体, &#38;quot;Arial Narrow&#38;quot;, arial, serif; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255);&#34;&#62;据悉，这两场招聘会总计提供岗位2295个，分别是2018年第一季“乐业姑苏·就业天堂”高校毕业生综合招聘会和苏州大学大型校园综合招聘会。其中，第一场高校毕业生综合招聘会将于3月25日上午9时在苏州市人才市场举行。届时，有77家企业面向社会端出1813个岗位。第二场苏州大学大型校园综合招聘会将于3月31日下午1时在苏大独墅湖校区二期公共体育楼举行。届时，有30家优质企业主要面向苏大学子提供涉及文化传媒类、网络软件类、教育科技类、销售管理类等岗位482个。具体岗位及招聘信息可登录中国姑苏网站人社局子端专栏“资料下载”栏进行查询。&#60;/span&#62;&#60;/p&#62;', '1522293633', '1', '1');
INSERT INTO `news` VALUES ('9', '1', '15', '冬夏科技中标某外企外网安全网关防火墙项目', '/upload/project/9cfd0aff1f1eaeac4e01a785216c0b2c.jpeg', '&#60;p&#62;&#60;span style=&#34;color: rgb(80, 80, 80); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&#34;&#62;冬夏科技中标某外企外网安全网关防火墙项目，近日，冬夏科技成功中标某外企外网安全网关项目，该用户现有一套Juniper SSG防火墙，为了进一步提升&#60;/span&#62;&#60;span class=&#34;fontstyle0&#34; style=&#34;box-sizing: border-box; color: rgb(80, 80, 80); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&#34;&#62;应用可视性、入侵防御和威胁控制等安全服务功能，用户将现有防火墙升级为Juniper SRX 1500系列防火墙，并配备&#60;span class=&#34;fontstyle0&#34; style=&#34;box-sizing: border-box;&#34;&#62;Sky&#60;/span&#62;&#60;span class=&#34;fontstyle1&#34; style=&#34;box-sizing: border-box;&#34;&#62;高级威胁防护解决方案，&#38;nbsp;&#60;/span&#62;&#60;span class=&#34;fontstyle0&#34; style=&#34;box-sizing: border-box;&#34;&#62;为用户提供&#60;/span&#62;&#60;span class=&#34;fontstyle1&#34; style=&#34;box-sizing: border-box;&#34;&#62;非常精准地检测未知的恶意软件和零日威胁，同时提供自动保护。&#60;/span&#62;&#60;/span&#62;&#60;/p&#62;', '1522293262', '1', '1');
INSERT INTO `news` VALUES ('10', '1', '15', '江苏冬夏中标园区某企业Oracle数据库升级项目', '/upload/project/fc8aa9873adb54a0200f1616503ef5d9.jpeg', '&#60;p&#62;&#60;span style=&#34;color: rgb(80, 80, 80); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&#34;&#62;近日，江苏冬夏信息科技发展有限公司成功中标某企业ERP系统Oracle数据库升级项目，该项目实施周期短，技术难度高，涉及的业务系统范围广，最终江苏冬夏凭借卓越的技术能力及商务能力赢得客户信任，以绝对优势成功中标。&#60;/span&#62;&#60;br/&#62;&#60;/p&#62;', '1522293344', '0', '1');
INSERT INTO `news` VALUES ('11', '1', '15', '冬夏科技中标新区某上市公司无线仓储系统项目', '/upload/project/ef9c2c6734318aa74bbe5b7820270d89.jpeg', '&#60;p&#62;&#60;span style=&#34;color: rgb(80, 80, 80); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&#34;&#62;近日，冬夏科技成功中标新区某企业无线仓储项目，该项目利用汉明科技无线产品及解决方案为用户实现自动化仓储，为无线手持PDA实现全覆盖&#60;/span&#62;&#60;/p&#62;', '1522293520', '0', '1');
INSERT INTO `news` VALUES ('14', '1', '16', '苏州体育职业技能培训单位增至9家', '/upload/project/b7d49ff0331b3051334f70ac4948bb02.jpeg', '&#60;p style=&#34;margin-top: 0px; margin-bottom: 14px; padding: 0px; line-height: 1.7; text-indent: 2em; color: rgb(51, 51, 51); font-size: 14px; font-family: 宋体, &#38;quot;Arial Narrow&#38;quot;, arial, serif; white-space: normal; background-color: rgb(255, 255, 255);&#34;&#62;去年，全市开展了游泳救生员、游泳教员、攀岩、健身教练、跆拳道、潜水等6个项目的2060人职业资格培训鉴定。今年，进一步面向羽毛球、健美操、武术等项目开展职业技能培训，培训单位增至9家。苏州市体育市场管理处处长严伟杰介绍，随着健身市场对人才的需求越来越旺盛，将尽快实现各个项目职业技能培训开展的常年化、日常化，确保高危体育项目经营从业人员持证上岗。而且，如果在参加培训过程中发现有违规行为，市民也可拨打苏州市体育市场管理处电话0512-65212811投诉。&#60;/p&#62;&#60;p style=&#34;margin-top: 0px; margin-bottom: 14px; padding: 0px; line-height: 1.7; text-indent: 2em; color: rgb(51, 51, 51); font-size: 14px; font-family: 宋体, &#38;quot;Arial Narrow&#38;quot;, arial, serif; white-space: normal; background-color: rgb(255, 255, 255);&#34;&#62;“游泳市场越来越火，去年仅开展2批次游泳教员培训已不能满足要求。”苏州市游泳协会秘书长陈均麒介绍，今年计划扩大规模，举办三批次以上的培训。此外全年均接受报名，报名人数达到40名就立即开班。&#60;/p&#62;&#60;p&#62;&#60;br/&#62;&#60;/p&#62;', '1522294065', '0', '1');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(345) NOT NULL COMMENT '标题',
  `leader` varchar(45) NOT NULL COMMENT '项目带头人',
  `start_time` int(11) NOT NULL COMMENT '项目发起时间',
  `summary` text COMMENT '项目概况',
  `content` longtext COMMENT '内容',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `user_id` int(10) unsigned NOT NULL,
  `logo` varchar(345) DEFAULT NULL COMMENT 'logo',
  `sortid` int(10) unsigned NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', '&#34;互联网+&#34;科教创意文化园', '王继洲', '1483660800', '铜仁博士回乡创业典范项目，为铜仁的教育产业添柴加火，主要帮助铜仁学子圆北大清华梦', '<h3 style=\"margin-top: 0px; margin-bottom: 0px;\">互联网+科教项目背景</h3><p><img id=\"u12_img\" class=\"img \" src=\"http://www.kexie.me/ueditor/themes/default/images/spacer.gif\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">随着移动互联网+、大数据、云计算等技术的发展，人们接收与反馈信息的方式会发生巨大变化，人类的学习模式也有可能而因此改变。于是，互联网+教育有掘金机会。互联网+女皇玛丽·米克、李彦宏、徐小平都这么说。&nbsp; 这是为什么从创业者到大公司都在探索这个领域的原因。现行教育体制与学习模式下，一个人的学习历程可以划分的4个阶段：</p><p><img id=\"u14_img\" class=\"img \" src=\"http://www.kexie.me/ueditor/themes/default/images/spacer.gif\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">1.学前教育（幼教）：这个阶段的学习主体本身不具备独立能力，互联网+教育产品多作为学习工具，如悟空识字。&nbsp; &nbsp;&nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">2.K12阶段（基础教育）：这个阶段受限于现行教育体制，多数互联网+教育产品基本以网校远程教育形式存在，功能多为课外辅导和提供教育资讯，如学而思网校。&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">3.高等教育（大学阶段）：这个阶段也是受限于现行教育体制，产品形态多以大学网络公开课为主，如网易公开课、超星学术视频。部分人在这个阶段会有成人培训</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">（职业资格认证、素质拓展）的需求。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">4.成人培训（毕业后）：这个领域主要有两块，一个是职业认证，会计师考试辅导、司法考试辅导等，如尚德嗨学网；另一个是素质拓展，钢琴、瑜伽、健身等课程的学习，如天下网校。&nbsp; 无论是创业者还是大的互联网+公司，探索教育商机时基本都是按上述4个切口选择切入的。</p><p><br/></p><h3 style=\"margin-top: 0px; margin-bottom: 0px;\">互联网+科教项目可挖性</h3><p><img id=\"u20_img\" class=\"img \" src=\"http://www.kexie.me/ueditor/themes/default/images/spacer.gif\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">在线教育在不温不火很长时间后，这两年热起来了。陆陆续续拜读了各位圈内高人的精彩文章，也浏览了部分贴着“在线教育”标签的网站，大部分都集中在了在线课程，聚焦在B2C或C2C知识传授这种方式，极少有人涉及到课程模式之外的教育领域，在线教育只有课程学习这一个值得做的领域么？&nbsp; 在线教育尚无一个权威的定义，单从字面来看，教育和网络的结合都可以算是在线教育。教育的范围很大，体制内、体制外各有一摊，按不同的人群和内容更是可以分为多个领域，各有特点。为了方便，我先把教育限定在最普遍、涉及最多的基础教育领域。</p><p><br/></p><h3 style=\"margin-top: 0px; margin-bottom: 0px;\">市场预测</h3><p><img id=\"u26_img\" class=\"img \" src=\"http://www.kexie.me/ueditor/themes/default/images/spacer.gif\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">1.“授课”模式会被消灭：</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">在线教育的未来应该是更多基于标准算法、系统模型、数据挖掘、知识库等为学生提供个性化、定制化学习服务。在这个过程中，老师授课的依赖会越来越小，并被技术部分取代性化增值服务。&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">2.“在线教育”概念不再被提起：</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">因为，所有的教学过程都已经离不开互联网+，所有的教学都将借助云计算、大数据、移动互联网+等技术实现的。线上与线下只是不同的教学环境和教学手段而已，传统教育培训机构不接触互联网+，则无前途可言。&nbsp; &nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">3.优质教育资源平等共享：</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">由于在线教育成本很低，优质教育资源将不再局限于高等学府，将有机会传遍全国和全球的每个角落，使每个人都有机会接触。往大了说，可以推动我国从人力资源大国向人才强国的跨越。&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">4.教育娱乐化：</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">如果玩网游就是一种学习，学习过程中不断挑战不断得到即时激励，那么学习过程还会那么枯燥么？谁说学习产品就一定要那么严肃，不见得。在线教育提供了学习趣味化的机会。在线教育在不温不火很长时间后，这两年热起来了。陆陆续续拜读了各位圈内高人的精彩文章，也浏览了部分贴着“在线教育”标签的网站，大部分都集中在了在线课程，聚焦在B2C或C2C知识传授这种方式，极少有人涉及到课程模式之外的教育领域，在线教育只有课程学习这一个值得做的领域么？&nbsp; 在线教育尚无一个权威的定义，单从字面来看，教育和网络的结合都可以算是在线教育。教育的范围很大，体制内、体制外各有一摊，按不同的人群和内容更是可以分为多个领域，各有特点。为了方便，我先把教育限定在最普遍、涉及最多的基础教育领域。</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">5.在线教育借鉴在线酒店模式：</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">在线酒店业与在线教育业的相通之处：从原始的线下业态，到作为平台的网站（比如艺龙旅行网）出现，再到作为媒体的网站（比如去哪儿网）出现，有发展规律可循。在线教育，最开始出现的是线下的各种教育机构（如新东方），然后会出现平台型网站（如YY教育），再到媒体型网站（或者说聚合型平台，如百度文库新上线的课程产品）。教育本质是服务，酒店本质也是服务，所以自然会有类似之处，也自然会O2O，那么酒店行业如何被互联网+颠覆的，是需要在线教育从业者认真思考的。&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">6.互联网+解构与重构学习模式与教育体系：</p><p style=\"margin-top: 0px; margin-bottom: 0px;\">当前的在线教育产品，基本只做到了“互联网++教育”，或者“互联网+×教育”，未来更具颠覆性的产品应该是“互联网+÷教育”，即用互联网+解构传统学习模式与教育体制，并且重新制定一套新的教与学互动模式，这将改变人类几千年以教师为中心的授课模式。虽然目前尚未有创业者探索，但这在不远的将来必然成为事实。</p>', '2017', '1', '/upload/project/f544fb741dec1a3508c087100fcccc51.png', '1', '24');
INSERT INTO `project` VALUES ('2', '铜仁市产业互联网研究院', '王继洲', '1491523200', '该项目由王继洲博士利用互联网工具为铜仁市丰富的建材、农产品等产业进行互联网运作的项目', '', '2017', '1', '/upload/project/4dd6858c5b3fe2a0773c0e3c2cccb1b3.png', '1', '24');
INSERT INTO `project` VALUES ('3', '铜仁市掌上医疗系统', '徐又佳', '1491696000', '该项目由徐又佳博士基于苏州大学附属第二医院资源在铜仁市建立的互联网医疗体系的第一项目', '                                                                                            ', '1493088151', '1', '/upload/project/c086ea98e36a328c9394f3451f58b7ee.png', '1', '25');
INSERT INTO `project` VALUES ('4', '铜仁旅游资源全景管理', '徐又佳', '1492041600', '该项目由徐又佳博士基于苏州大学附属第二医院资源在铜仁市建立的互联网医疗体系的第一项目', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', '1494393841', '1', '/upload/project/447be92b06bd1b933859eb0f4bb8c4c0.png', '2', '25');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL COMMENT '标题',
  `img` varchar(245) DEFAULT NULL COMMENT '图片',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `sortid` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `type` tinyint(3) unsigned DEFAULT '0' COMMENT '类型 1pc 2 mobile',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='首页幻灯片';

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('1', '轮播图', '/upload/slide/e63aa832d5b7c63efcb781b2d6740fc6.png', '1522588363', '1', '1');
INSERT INTO `slide` VALUES ('2', '轮播图', '/upload/slide/38e707208c12eed5ee68dfca5a34ef55.jpeg', '1522588374', '1', '1');
INSERT INTO `slide` VALUES ('3', '轮播图', '/upload/slide/adfe8cf5fe718a9d593b3455bc95003d.jpeg', '1522588200', '1', '1');
