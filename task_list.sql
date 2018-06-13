/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : datas

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-13 11:34:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for task_list
-- ----------------------------
DROP TABLE IF EXISTS `task_list`;
CREATE TABLE `task_list` (
  `task_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(40) NOT NULL,
  `status` int(2) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of task_list
-- ----------------------------
INSERT INTO `task_list` VALUES ('1', 'c18338811833@aliyun.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('2', 'c18338811833@aliyun.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('4', 'c18338811833@aliyun.com', '1', '0000-00-00 00:00:00', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('5', 'c18338811833@aliyun.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('35', 'yiziqin@vip.qq.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('36', '1159652245@qq.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('37', '710425820@qq.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
INSERT INTO `task_list` VALUES ('38', '879865317@qq.com', '1', '2018-05-06 17:04:07', '2018-05-06 17:04:07');
