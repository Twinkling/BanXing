/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50542
Source Host           : localhost:3306
Source Database       : banxing

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2016-01-18 20:10:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `qid` int(4) NOT NULL COMMENT '问题编号',
  `username` varchar(20) NOT NULL COMMENT '回答问题的用户名',
  `answer` varchar(255) NOT NULL COMMENT '答案',
  `dateline` int(11) NOT NULL COMMENT '回答的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('1', '1', '12', '第一个问题的第一个回答', '1452397281');
INSERT INTO `answer` VALUES ('2', '1', '12', '第一个问题的第二个回答', '1452402177');
INSERT INTO `answer` VALUES ('3', '2', '12', '第二个问题的第一个回答', '1452402357');
INSERT INTO `answer` VALUES ('4', '2', '1234', '第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答第二个问题的第二个回答', '1452404347');
INSERT INTO `answer` VALUES ('5', '4', '12', '第四个问题的第一个回答', '1452496957');

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `sid` int(4) NOT NULL COMMENT '景点编号',
  `username` varchar(255) NOT NULL COMMENT '同行游客',
  `dateline` int(11) NOT NULL COMMENT '出发日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES ('1', '1', 'a:1:{i:0;s:3:\"123\";}', '1453186121');
INSERT INTO `partner` VALUES ('2', '1', 'a:2:{i:0;s:3:\"123\";i:1;s:2:\"12\";}', '1453359039');
INSERT INTO `partner` VALUES ('3', '1', 'a:2:{i:0;s:3:\"123\";i:1;s:2:\"12\";}', '1453359255');
INSERT INTO `partner` VALUES ('4', '1', 'a:1:{i:0;s:2:\"12\";}', '1453532629');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` varchar(20) NOT NULL COMMENT '提出问题的用户名',
  `question` varchar(255) NOT NULL COMMENT '所提的问题',
  `dateline` int(11) NOT NULL COMMENT '提出问题的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '123', '第一个问题', '1452358072');
INSERT INTO `question` VALUES ('2', '123', '第二个问题', '1452358186');
INSERT INTO `question` VALUES ('3', '12', '第三个问题', '1452394739');
INSERT INTO `question` VALUES ('4', '12', '第四个问题', '1452395115');

-- ----------------------------
-- Table structure for residence
-- ----------------------------
DROP TABLE IF EXISTS `residence`;
CREATE TABLE `residence` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `sid` int(4) NOT NULL COMMENT '景点编号',
  `name` varchar(20) NOT NULL COMMENT '民宿名称',
  `star` varchar(255) NOT NULL COMMENT '民宿星级评价，最高五星，最低一星，差级以一星计算',
  `contact` varchar(127) NOT NULL COMMENT '联系方式，手机号或者email',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of residence
-- ----------------------------
INSERT INTO `residence` VALUES ('1', '2', '三亚', '1', '18030045464');
INSERT INTO `residence` VALUES ('2', '1', '丽江', '2', '854651997@qq.com');
INSERT INTO `residence` VALUES ('3', '1', '丽江民宿', '5', 'asdfc@ba.com');

-- ----------------------------
-- Table structure for scene
-- ----------------------------
DROP TABLE IF EXISTS `scene`;
CREATE TABLE `scene` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '景点编号',
  `sname` varchar(20) NOT NULL COMMENT '景点名称',
  `saddress` varchar(50) NOT NULL COMMENT '景点地址',
  `stop` smallint(6) NOT NULL COMMENT '景点排行',
  `spic` varchar(50) NOT NULL COMMENT '景点图片',
  `description` varchar(255) NOT NULL COMMENT '景点描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of scene
-- ----------------------------
INSERT INTO `scene` VALUES ('1', '丽江', '云南省丽江市', '1', 'data/img/lijiang/lijianglogo.jpg', '丽江古城，又名“大研古镇”，坐落在云南省丽江市大研镇，地理坐标为东经100°14′，北纬26°52′。海拔2400余米。是一座风景秀丽，历史悠久和文化灿烂的名城，也是中国罕见的保存相当完好的少数民族古镇。丽江古城是第二批被批准的中国历史文化名城之一，也是中国仅有的以整座古城申报世界文化遗产获得成功的两座古城之一（另一座为山西平遥古城）。');
INSERT INTO `scene` VALUES ('2', '三亚', '海南省三亚市', '2', 'data/img/sanya/sanyalogo.jpg', '三亚（Sanya ）位于海南岛的最南端，是中国最南部的热带滨海旅游城市，是中国空气质量最好的城市、全国最长寿地区（平均寿命80岁）。[1]  三亚市别称鹿城，又被称为“东方夏威夷”，位居中国四大一线旅游城市“三威杭厦”之首，拥有全岛最美丽的海滨风光。');
INSERT INTO `scene` VALUES ('3', '黄山', '安徽省黄山市', '3', 'data/img/huangshan/huangshanlogo.jpeg', '黄山，位于安徽省黄山市，地跨市内黟县、休宁县和黄山区、徽州区，面积1078平方公里。黄山为三山五岳中三山的之一。日出，奇松、怪石、云海、温泉素称黄山“五绝”，令海内外游人叹为观止。黄山不仅以奇伟俏丽、灵秀多姿著称于世，还是一座资源丰富、生态完整、具有重要科学和生态环境价值的国家级风景名胜区。');
INSERT INTO `scene` VALUES ('4', '九寨沟', '四川省阿坝藏族羌族自治州', '4', 'data/img/jiuzhaigou/jiuzhaigou_logo.jpg', '九寨沟以神妙、奇幻、美艳绝伦而成为世界鲜见、中国唯一的拥有\\\"世界自然遗产\\\"和\\\"世界生物圈保护区\\\"两项国际桂冠的胜地。九寨沟是个佳景荟萃、神妙奇幻的风光明珠，当空鸟瞰，翠海、飞瀑、彩林、雪峰浑然如画，相映成趣。游览观光，步步是景，步移景换，各处景色，一日数变。原始的天然美景，闪烁着迷人的魅力。加之与其交相辉映的藏族文化的衬托、融合，使海内人士“竞折腰”。');
INSERT INTO `scene` VALUES ('5', '桂林山水', '广西壮族自治区东北部', '5', 'data/img/glss/glss_logo.jpg', '桂林是举世闻名的旅游城市，甲天下的山水勾勒出一幅唯美的中国画卷，乘一叶竹筏漂荡于漓江之上，犹如置身百里画廊，充满着诗情画意。同时也是世界著名的风景游览城市和历史文化名城以及广西壮族自治区最重要的旅游城市。作为广西第三大城市，享有山水甲天下之美誉。位于广西壮族自治区东北部，湘桂走廊南端。东、北与湖南省相邻。');

-- ----------------------------
-- Table structure for strategy
-- ----------------------------
DROP TABLE IF EXISTS `strategy`;
CREATE TABLE `strategy` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `sid` int(4) NOT NULL COMMENT '景点编号',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `strategy` varchar(255) NOT NULL COMMENT '攻略',
  `dateline` int(11) NOT NULL COMMENT '提出时间',
  `impression` varchar(255) NOT NULL DEFAULT '景色秀丽，美不胜收' COMMENT '个人旅游感受',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategy
-- ----------------------------
INSERT INTO `strategy` VALUES ('1', '1', '12', '丽江古城 > 丽江童话精品客栈-古往今来店', '1453081731', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('2', '1', '12', '香格里拉子丰轩精品客栈 > 噶丹•松赞林寺 > 拉姆央措湖 > 格拉夏餐吧', '1453081731', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('3', '1', '12', '丽江古城 > 丽江童话精品客栈-古往今来店', '1453081731', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('4', '1', '123', '丽江古城 > 丽江童话精品客栈-古往今来店', '1453081731', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('5', '1', '123', '香格里拉子丰轩精品客栈 > 噶丹•松赞林寺 > 拉姆央措湖 > 格拉夏餐吧', '1453081873', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('6', '1', '123', '丽江古城 > 丽江童话精品客栈-古往今来店', '1453082120', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('7', '1', '123', '丽江古城 > 丽江童话精品客栈-古往今来店', '1453082147', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('8', '1', '123', '丽江古城 > 丽江童话精品客栈-古往今来店', '1453082177', '景色秀丽，美不胜收');
INSERT INTO `strategy` VALUES ('9', '4', '123', '九寨沟', '1453083904', '美不胜收的风景');
INSERT INTO `strategy` VALUES ('10', '4', '123', '九寨沟', '1453083933', '景色秀丽，美不胜收');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` varchar(20) NOT NULL COMMENT '用户名,唯一',
  `pwd` varchar(50) NOT NULL COMMENT '用户密码',
  `registerTime` int(11) NOT NULL COMMENT '注册时间',
  `admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是管理员，是为1，否为0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '123', '123', '1452308953', '0');
INSERT INTO `user` VALUES ('2', '1234', '1234', '1452327308', '0');
INSERT INTO `user` VALUES ('3', '12', '12', '1452327502', '0');
INSERT INTO `user` VALUES ('4', 'admin', 'admin', '1452308953', '1');
INSERT INTO `user` VALUES ('5', '12345', '12345', '1453118128', '0');
