/*
MySQL Database Backup Tools
Server:127.0.0.1:
Database:tp_base_com
Data:2017-10-29 10:48:27
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tf_addonalbum
-- ----------------------------
DROP TABLE IF EXISTS `tf_addonalbum`;
CREATE TABLE `tf_addonalbum` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `aid` int(11) NOT NULL COMMENT '关联文章ID',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_addonalbum
-- ----------------------------
INSERT INTO `tf_addonalbum` (`id`,`aid`,`content`) VALUES ('1','3','相册模型1');

-- ----------------------------
-- Table structure for tf_addonarticle
-- ----------------------------
DROP TABLE IF EXISTS `tf_addonarticle`;
CREATE TABLE `tf_addonarticle` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `aid` int(11) NOT NULL COMMENT '关联文章ID',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_addonarticle
-- ----------------------------
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('1','1','tf_bill --- 【XX】账单信息
&lt;p&gt;
	tf_collection --- 【XX】收藏
&lt;/p&gt;
&lt;p&gt;
	tf_order --- 【XX】订单
&lt;/p&gt;
&lt;p&gt;
	tf_withdraw --- 【XX】提现
&lt;/p&gt;
&lt;p&gt;
	图片惰性加载jquery.lazyload.min.js
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	jquery.scrollLoading
&lt;/p&gt;');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('2','2','');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('3','3','只有简介，没有图');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('4','4','&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('5','5','所谓缘分，就是遇见了该遇见的人');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('6','6','每一次遗憾都是对生命的一种肯定');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('7','7','&lt;p&gt;
	以为我永远只能一个人生活
&lt;/p&gt;
&lt;p&gt;
	孤单地快乐哀愁
&lt;/p&gt;
&lt;p&gt;
	偶尔可以伪装潇洒自由
&lt;/p&gt;
&lt;p&gt;
	心里慌了起来自己喝酒
&lt;/p&gt;
&lt;p&gt;
	以为你只是一个美丽的偶然
&lt;/p&gt;
&lt;p&gt;
	垂怜我不经意降落
&lt;/p&gt;
&lt;p&gt;
	谁知道你不同 谁知道你不走
&lt;/p&gt;
&lt;p&gt;
	拥抱着我说终于找到了我
&lt;/p&gt;
&lt;p&gt;
	你 看穿我的冷漠 亲吻我的烦忧
&lt;/p&gt;
&lt;p&gt;
	不在乎我曾经的错
&lt;/p&gt;
&lt;p&gt;
	如果不是你的款款温柔
&lt;/p&gt;
&lt;p&gt;
	还以为真爱 只是一个传说
&lt;/p&gt;
&lt;p&gt;
	请 相信我的承诺 虽然有点笨拙
&lt;/p&gt;
&lt;p&gt;
	但我看见幸福的风
&lt;/p&gt;
&lt;p&gt;
	如果我把我的手放在背后
&lt;/p&gt;
&lt;p&gt;
	愿不愿意牵着一起走
&lt;/p&gt;
&lt;p&gt;
	以为你只是一个美丽的偶然
&lt;/p&gt;
&lt;p&gt;
	垂怜我不经意降落
&lt;/p&gt;
&lt;p&gt;
	谁知道你不同 谁知道你不走
&lt;/p&gt;
&lt;p&gt;
	拥抱着我说终于找到了我
&lt;/p&gt;
&lt;p&gt;
	你 看穿我的冷漠 亲吻我的烦忧
&lt;/p&gt;
&lt;p&gt;
	不在乎我曾经的错
&lt;/p&gt;
&lt;p&gt;
	如果不是你的款款温柔
&lt;/p&gt;
&lt;p&gt;
	还以为真爱 只是一个传说
&lt;/p&gt;
&lt;p&gt;
	请 相信我的承诺 虽然有点笨拙
&lt;/p&gt;
&lt;p&gt;
	但我看见幸福的风
&lt;/p&gt;
&lt;p&gt;
	如果我把我的手放在背后
&lt;/p&gt;
&lt;p&gt;
	愿不愿意牵着一起走
&lt;/p&gt;
&lt;p&gt;
	你 看穿我的冷漠 亲吻我的烦忧
&lt;/p&gt;
&lt;p&gt;
	不在乎我曾经的错
&lt;/p&gt;
&lt;p&gt;
	如果不是你的款款温柔
&lt;/p&gt;
&lt;p&gt;
	还以为真爱 只是一个传说
&lt;/p&gt;
&lt;p&gt;
	请 相信我的承诺 虽然有点笨拙
&lt;/p&gt;
&lt;p&gt;
	但我看见幸福的风
&lt;/p&gt;
&lt;p&gt;
	如果我把我的手放在背后
&lt;/p&gt;
&lt;p&gt;
	愿不愿意牵着一起走
&lt;/p&gt;
&lt;p&gt;
	愿不愿意牵着到最后
&lt;/p&gt;');
INSERT INTO `tf_addonarticle` (`id`,`aid`,`content`) VALUES ('8','8','我们做的任何的决定，都没有错；但是，有可能会错过；错过你一辈子也找不回的曾今！');

-- ----------------------------
-- Table structure for tf_addonvideo
-- ----------------------------
DROP TABLE IF EXISTS `tf_addonvideo`;
CREATE TABLE `tf_addonvideo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `aid` int(11) NOT NULL COMMENT '关联文章ID',
  `content` text COMMENT '内容',
  `video_url` text COMMENT '视频地址',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_addonvideo
-- ----------------------------
INSERT INTO `tf_addonvideo` (`id`,`aid`,`content`,`video_url`) VALUES ('1','2','视频模型1','');

-- ----------------------------
-- Table structure for tf_archive
-- ----------------------------
DROP TABLE IF EXISTS `tf_archive`;
CREATE TABLE `tf_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `typeid` int(11) NOT NULL COMMENT '所属分类',
  `mod` varchar(100) DEFAULT 'addonarticle' COMMENT '文章拓展表',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `title_color` varchar(50) DEFAULT NULL COMMENT '标题颜色',
  `title_weight` smallint(1) DEFAULT '0' COMMENT '标题加粗',
  `flag` set('a','h','c','s','j','p') DEFAULT NULL COMMENT '属性(头条[h]推荐[c]滚动[s]跳转[j])',
  `jumplink` varchar(200) DEFAULT NULL COMMENT '跳转地址',
  `litpic` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `writer` int(11) DEFAULT NULL COMMENT '用户ID',
  `source` varchar(100) DEFAULT NULL COMMENT '来源',
  `keywords` varchar(200) DEFAULT NULL COMMENT '关键字',
  `description` text COMMENT '描述',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_archive
-- ----------------------------
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('1','6','addonarticle','标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！','','0','p','https://www.baidu.com/','/uploads/image/20170826/d7adf07b02ad855e948b032bb7720907.jpg','42','','Guestbook','标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！标题很长，还有简介，还有图！！','17','1','1500698768','1504596689');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('2','5','addonarticle','只有标题','','0','','','','42','','','','6','1','1500997429','1504596694');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('3','7','addonarticle','只有简介，没有图','','0','','','','42','','','只有简介，没有图','61','1','1500997910','1504596694');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('4','9','addonarticle','你在等全世界的樱花，而我在樱花树下等你','','0','p','','/uploads/image/20170826/a2f7e2021ed0494197a2dc7da220d93e.jpg','42','','','','1','1','1504578094','1504596695');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('5','9','addonarticle','所谓缘分，就是遇见了该遇见的人','','0','','','','42','','','所谓缘分，就是遇见了该遇见的人','3','1','1504578161','1504596695');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('6','9','addonarticle','每一次遗憾都是对生命的一种肯定','','0','','','','42','','','每一次遗憾都是对生命的一种肯定','14','1','1504578196','1504596696');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('7','8','addonarticle','幸福的风','','0','','','','42','','','以为我永远只能一个人生活，孤单地快乐哀愁，偶尔可以伪装潇洒自由，心里慌了起来自己喝酒，以为你只是一个美丽的偶然，垂怜我不经意降落，谁知道你不同，谁知道你不走，拥抱着我说终于找到了我，你 看穿我的冷漠，亲吻我的烦忧，不在乎我曾经的错，如果不是你的款款温柔，还以为真爱只是一个传说。','29','1','1504578436','1504691265');
INSERT INTO `tf_archive` (`id`,`typeid`,`mod`,`title`,`title_color`,`title_weight`,`flag`,`jumplink`,`litpic`,`writer`,`source`,`keywords`,`description`,`click`,`status`,`create_time`,`update_time`) VALUES ('8','8','addonarticle','我们做的任何的决定，都没有错；但是，有可能会错过；错过你一辈子也找不回的曾今','','0','p','','/uploads/image/20170905/2c5f6ec66e1c707dec1e0c2887066b8a.jpg','42','','','我们做的任何的决定，都没有错；但是，有可能会错过；错过你一辈子也找不回的曾今。
希望我们的梦想，永远不会被忘记，希望有一天，我可以再见面！','147','1','1504595575','1504604570');

-- ----------------------------
-- Table structure for tf_arctype
-- ----------------------------
DROP TABLE IF EXISTS `tf_arctype`;
CREATE TABLE `tf_arctype` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(11) NOT NULL COMMENT '上级ID',
  `typename` varchar(100) NOT NULL COMMENT '栏目名称',
  `mid` int(11) NOT NULL DEFAULT '20' COMMENT '栏目模型ID',
  `target` varchar(50) NOT NULL COMMENT '弹出方式',
  `jumplink` varchar(200) NOT NULL COMMENT '外部跳转地址',
  `dirs` varchar(50) NOT NULL COMMENT '栏目目录',
  `litpic` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `content` text COMMENT '内容',
  `sorts` int(11) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `keywords` text COMMENT '关键字',
  `description` text COMMENT '描述',
  `templist` varchar(100) DEFAULT NULL COMMENT '列表页模板',
  `temparticle` varchar(100) DEFAULT NULL COMMENT '内容页模板',
  `pagesize` int(11) DEFAULT NULL COMMENT '分页条数',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_arctype
-- ----------------------------
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('1','0','文档','21','_self','','blog','','','1','1','博客k','博客d','list_article','article_article','1','1500694046','1504685181');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('2','0','留言','20','_self','','msg','','留言','2','1','留言k','留言d','list_page','article_page','20','1500695122','1504599199');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('3','0','网站统计','20','_self','','pie','','单页统计数据','3','1','统计k','统计d','list_page','article_page','20','1500695130','1504687134');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('4','0','更新日志','20','_self','','log','','&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;
&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;
&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;
&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;
&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;
&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;
&lt;p&gt;
	这里的更新日志慢慢完善！！！
&lt;/p&gt;','4','1','关于k','关于d','list_page','article_page','20','1500695142','1504687097');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('5','1','tp5','21','_self','','tp5','','','1','1','tp5k','tp5d','list_article','article_article','1','1500696489','1504576344');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('6','1','css','21','_self','','css','','','2','1','cssk','cssd','list_article','article_article','1','1500696800','1504576365');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('7','1','php','21','_self','','php','','','3','1','phpk','phpd','list_article','article_article','1','1500696912','1504576360');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('8','1','爱音乐','21','_self','','music','','','8','1','','','list_article','article_article','1','1504576437','1504576495');
INSERT INTO `tf_arctype` (`id`,`pid`,`typename`,`mid`,`target`,`jumplink`,`dirs`,`litpic`,`content`,`sorts`,`status`,`keywords`,`description`,`templist`,`temparticle`,`pagesize`,`create_time`,`update_time`) VALUES ('9','1','爱生活','21','_self','','life','','','9','1','','','list_article','article_article','1','1504576487','1504576487');

-- ----------------------------
-- Table structure for tf_arctype_mod
-- ----------------------------
DROP TABLE IF EXISTS `tf_arctype_mod`;
CREATE TABLE `tf_arctype_mod` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `mod` varchar(100) DEFAULT NULL COMMENT '模型操作',
  `sorts` int(11) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '50' COMMENT '是否显示',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_arctype_mod
-- ----------------------------
INSERT INTO `tf_arctype_mod` (`id`,`name`,`mod`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('20','单页','addonpage','2','1','1494571907','1494572178');
INSERT INTO `tf_arctype_mod` (`id`,`name`,`mod`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('21','文章模型','addonarticle','1','1','1494571907','1494571930');
INSERT INTO `tf_arctype_mod` (`id`,`name`,`mod`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('22','外部链接','addonjump','999','1','1494571907','1494571932');
INSERT INTO `tf_arctype_mod` (`id`,`name`,`mod`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('27','相册模型','addonalbum','4','1','1494571907','1502787613');
INSERT INTO `tf_arctype_mod` (`id`,`name`,`mod`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('28','视频模型','addonvideo','3','1','1495004529','1502779823');

-- ----------------------------
-- Table structure for tf_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `tf_auth_group`;
CREATE TABLE `tf_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `module` varchar(10) NOT NULL DEFAULT 'admin' COMMENT '所属模块',
  `level` int(11) NOT NULL COMMENT '角色等级',
  `title` varchar(200) NOT NULL COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL COMMENT '状态：为1正常，为0禁用',
  `rules` text COMMENT '用户组拥有的规则id， 多个规则","隔开',
  `notation` varchar(100) DEFAULT NULL COMMENT '组别描述',
  `pic` varchar(200) DEFAULT NULL COMMENT '角色图标',
  `recom` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐首页显示',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_auth_group
-- ----------------------------
INSERT INTO `tf_auth_group` (`id`,`module`,`level`,`title`,`status`,`rules`,`notation`,`pic`,`recom`,`create_time`,`update_time`) VALUES ('1','admin','1090','超级管理员','1','1,50,57,58,59,60,61,62,63,64,51,52,53,54,2,3,29,30,31,56,4,32,33,34,55,5,11,12,13,6,14,27,28,70,94,95,96,97,71,72,73,39,40,41,42,43,46,44,45,47,65,105,106,107,108,109,110,111,112,113,48,49,92,93,80,81,82,83,84,85,86,87,88,89,90,91,98,99,100,101,102,103,104','我能干任何事','#dd4b39','0','1502780231','1509205887');
INSERT INTO `tf_auth_group` (`id`,`module`,`level`,`title`,`status`,`rules`,`notation`,`pic`,`recom`,`create_time`,`update_time`) VALUES ('2','admin','1','后台浏览','1','1,50,57,61,51,2,3,4,5,6,70,94,71,39,44,47,65,48,49,92,80,84,88,98,99,101','只能查看列表','#f39c12','0','1502784113','1502852075');

-- ----------------------------
-- Table structure for tf_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `tf_auth_group_access`;
CREATE TABLE `tf_auth_group_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `group_id` int(11) unsigned NOT NULL COMMENT '用户组id',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_auth_group_access
-- ----------------------------
INSERT INTO `tf_auth_group_access` (`id`,`uid`,`group_id`,`create_time`,`update_time`) VALUES ('1','1','1','1502782413','1502782413');
INSERT INTO `tf_auth_group_access` (`id`,`uid`,`group_id`,`create_time`,`update_time`) VALUES ('2','2','2','1502784196','1502784196');

-- ----------------------------
-- Table structure for tf_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `tf_auth_rule`;
CREATE TABLE `tf_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(11) unsigned NOT NULL COMMENT '父id',
  `module` varchar(10) NOT NULL DEFAULT 'admin' COMMENT '权限节点所属模块',
  `level` tinyint(1) NOT NULL COMMENT '1-项目;2-模块;3-操作',
  `name` varchar(80) NOT NULL COMMENT '规则唯一标识',
  `title` varchar(20) NOT NULL COMMENT '规则中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `ismenu` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否导航',
  `condition` varchar(200) DEFAULT NULL COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `icon` varchar(50) DEFAULT NULL COMMENT '节点图标',
  `sorts` mediumint(8) DEFAULT '50' COMMENT '排序',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE,
  KEY `module` (`module`) USING BTREE,
  KEY `level` (`level`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_auth_rule
-- ----------------------------
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('1','0','admin','1','Index/index','后台首页','1','1','1','','fa fa-home','1010','0','1502786208');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('2','0','admin','1','leftUser','用户管理','1','1','1','','fa fa-users','1050','0','1497169240');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('3','2','admin','2','User/index','用户列表','1','1','1','','fa fa-user-o','1','0','1493808384');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('4','2','admin','2','AuthGroup/index','角色管理','1','1','1','','fa fa-vcard','2','0','1493808400');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('5','2','admin','2','AuthRule/index','管理员节点列表','1','1','1','','fa fa-user-circle','3','0','1493808416');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('6','2','admin','2','AuthRuleM/index','会员节点列表','1','1','1','','fa fa-user-circle-o','4','0','1494058614');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('11','5','admin','3','AuthRule/create','新增管理员节点','1','1','0','','','1','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('12','5','admin','3','AuthRule/edit','编辑管理员节点','1','1','0','','','2','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('13','5','admin','3','AuthRule/delete','删除管理员节点','1','1','0','','','3','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('14','6','admin','3','AuthRuleM/create','新增会员节点','1','1','0','','','1','0','1494059133');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('27','6','admin','3','AuthRuleM/edit','编辑会员节点','1','1','0','','','2','0','1494058640');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('28','6','admin','3','AuthRuleM/delete','删除会员节点','1','1','0','','','3','0','1494058655');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('29','3','admin','3','User/create','新增用户','1','1','0','','','1','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('30','3','admin','3','User/edit','编辑用户','1','1','0','','','2','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('31','3','admin','3','User/delete','删除用户','1','1','0','','','3','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('32','4','admin','3','AuthGroup/create','新增角色','1','1','0','','','1','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('33','4','admin','3','AuthGroup/edit','编辑角色','1','1','0','','','2','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('34','4','admin','3','AuthGroup/delete','删除角色','1','1','0','','','3','0','0');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('35','0','member','1','Member','会员中心','1','1','1','','','2000','0','1499163921');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('36','35','member','2','Member/index','个人资料','1','0','1','','','1','0','1499163690');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('39','0','admin','1','leftSystem','系统管理','1','1','1','','fa fa-gear','1070','1493809020','1497169226');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('40','39','admin','2','Config/index','系统配置字段','1','1','1','','fa fa-gears','1','1493809348','1493809384');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('41','40','admin','3','Config/create','新增字段','1','1','0','','','1','1493809465','1493809465');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('42','40','admin','3','Config/edit','编辑字段','1','1','0','','','2','1493809511','1493809511');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('43','40','admin','3','Config/delete','删除字段','1','1','0','','','3','1493809555','1493809555');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('44','39','admin','2','Config/web','站点配置','1','1','1','','fa fa-desktop','2','1493809933','1494439144');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('45','39','admin','2','Config/system','系统配置','1','1','1','','fa fa-dot-circle-o','3','1493810207','1494439156');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('46','40','admin','3','Config/save','保存字段','1','1','0','','','4','1494066111','1494066119');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('47','39','admin','2','Config/up','上传配置','1','1','1','','fa fa-upload','4','1494067075','1494439160');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('48','0','admin','1','leftTool','站长工具','1','1','1','','fa fa-wrench','1080','1494432073','1501768515');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('49','48','admin','2','Index/cleanCache','清除缓存','1','1','1','','fa fa-trash-o','1','1494433222','1494433701');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('50','0','admin','1','leftInfo','文章管理','1','1','1','','fa fa-file-text','1030','1494556641','1497169249');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('51','50','admin','2','ArctypeMod/index','文章模型管理','1','1','1','','fa fa-list-alt','99','1494559590','1494559959');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('52','51','admin','3','ArctypeMod/create','新增文章模型','1','1','0','','','1','1494559700','1494559700');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('53','51','admin','3','ArctypeMod/edit','编辑文章模型','1','1','0','','','2','1494559855','1494559855');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('54','51','admin','3','ArctypeMod/delete','删除文章模型','1','1','0','','','3','1494560030','1494560030');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('55','4','admin','3','AuthGroup/authUser','授权用户','1','1','0','','','4','1494585527','1494585527');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('56','3','admin','3','User/authGroup','授权角色','1','1','0','','','4','1494660839','1494660887');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('57','50','admin','2','Arctype/index','文章分类','1','1','1','','fa fa-columns','1','1494920741','1494986230');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('58','57','admin','3','Arctype/create','新增文章分类','1','1','0','','','1','1494921065','1501768850');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('59','57','admin','3','Arctype/edit','编辑文章分类','1','1','0','','','2','1494921102','1494986239');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('60','57','admin','3','Arctype/delete','删除文章分类','1','1','0','','','3','1494921185','1494986243');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('61','50','admin','2','Archive/index','文章列表','1','1','1','','fa fa-file-text-o','2','1495000296','1495000391');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('62','61','admin','3','Archive/create','新增文章','1','1','0','','','1','1495000482','1499080778');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('63','61','admin','3','Archive/edit','编辑文章','1','1','0','','','2','1495000513','1499080779');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('64','61','admin','3','Archive/delete','删除文章','1','1','0','','','3','1495000551','1499080779');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('65','39','admin','2','Config/sms','短信配置','1','1','1','','fa fa-envelope-square','5','1496207264','1496208848');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('70','0','admin','1','leftMessage','消息管理','1','1','1','','fa fa-comments','1062','1497169625','1501655677');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('71','70','admin','2','Comment/index','评论列表','1','1','1','','fa fa-comments-o','2','1497169866','1501662981');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('72','71','admin','3','Comment/edit','编辑评论','1','1','0','','','1','1497170140','1497170140');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('73','71','admin','3','Comment/delete','删除评论','1','1','0','','','2','1497170195','1497170195');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('80','48','admin','2','ModuleClass/index','模块分类','1','1','1','','fa fa-modx','4','1499307912','1501574486');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('81','80','admin','3','ModuleClass/create','新增模块','1','1','0','','','1','1499308130','1499308130');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('82','80','admin','3','ModuleClass/edit','编辑模块','1','1','0','','','2','1499308201','1499308201');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('83','80','admin','3','ModuleClass/delete','删除模块','1','1','0','','','3','1499308233','1499308233');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('84','48','admin','2','Flink/index','友情链接','1','1','1','','fa fa-link','5','1499308667','1501574477');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('85','84','admin','3','Flink/create','新增友情链接','1','1','0','','','1','1499308712','1499308712');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('86','84','admin','3','Flink/edit','编辑友情链接','1','1','0','','','2','1499308748','1499308748');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('87','84','admin','3','Flink/delete','删除友情链接','1','1','0','','','3','1499308846','1499308846');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('88','48','admin','2','Banner/index','BANNER管理','1','1','1','','fa fa-object-group','6','1499308946','1502853250');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('89','88','admin','3','Banner/create','新增banner','1','1','0','','','1','1499308966','1502853277');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('90','88','admin','3','Banner/edit','编辑banner','1','1','0','','','2','1499309075','1502853278');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('91','88','admin','3','Banner/delete','删除banner','1','1','0','','','3','1499309099','1502853279');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('92','48','admin','2','LoginLog/index','登录日志','1','1','1','','fa fa-location-arrow','2','1501574804','1501574804');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('93','92','admin','3','LoginLog/delete','删除登录日志','1','1','0','','','1','1501575100','1501575100');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('94','70','admin','2','Guestbook/index','留言列表','1','1','1','','fa fa-comment-o','1','1501660017','1501662972');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('95','94','admin','3','Guestbook/create','新增留言','1','1','0','','','1','1501660085','1501660085');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('96','94','admin','3','Guestbook/edit','编辑留言','1','1','0','','','2','1501660119','1501660119');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('97','94','admin','3','Guestbook/delete','删除留言','1','1','0','','','3','1501660170','1501660170');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('98','0','admin','1','leftDatabase','数据库管理','1','1','1','','fa fa-database','1090','1501771385','1501771460');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('99','98','admin','2','Database/index','数据库列表','1','1','1','','fa fa-list','1','1501771697','1501771697');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('100','99','admin','3','Database/backup','备份数据库','1','1','0','','','1','1502417821','1502418076');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('101','98','admin','2','Database/reduction','还原数据库','1','1','1','','fa fa-rotate-left','2','1502418268','1502418268');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('102','101','admin','3','Database/restore','还原','1','1','0','','','1','1502419840','1502419840');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('103','101','admin','3','Database/dowonload','下载','1','1','0','','','2','1502419878','1502419878');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('104','101','admin','3','Database/delete','删除','1','1','0','','','3','1502419916','1502419916');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('105','0','admin','1','leftApi','API接口管理','1','1','1','','fa fa-magic','1071','1509205539','1509205539');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('106','105','admin','2','TokenApi/index','API接口列表','1','1','1','','fa fa-list-ul','1','1509205595','1509205595');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('107','106','admin','3','TokenApi/create','新增API接口','1','1','0','','','1','1509205654','1509205654');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('108','106','admin','3','TokenApi/edit','编辑API接口','1','1','0','','','2','1509205697','1509205697');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('109','106','admin','3','TokenApi/delete','删除API接口','1','1','0','','','3','1509205722','1509205722');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('110','106','admin','3','TokenApi/token','生成Token','1','1','0','','','4','1509205748','1509205748');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('111','106','admin','3','TokenApi/generateDocument','生成文档','1','1','0','','','5','1509205781','1509205781');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('112','106','admin','3','TokenApi/viewDocument','查看文档','1','1','0','','','6','1509205816','1509205816');
INSERT INTO `tf_auth_rule` (`id`,`pid`,`module`,`level`,`name`,`title`,`type`,`status`,`ismenu`,`condition`,`icon`,`sorts`,`create_time`,`update_time`) VALUES ('113','105','admin','2','Config/api','接口配置','1','1','1','','fa fa-gears','2','1509205856','1509205856');

-- ----------------------------
-- Table structure for tf_banner
-- ----------------------------
DROP TABLE IF EXISTS `tf_banner`;
CREATE TABLE `tf_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `mid` int(11) NOT NULL COMMENT '模块分类ID',
  `title` varchar(250) NOT NULL COMMENT '标题',
  `url` varchar(250) DEFAULT NULL COMMENT '跳转链接',
  `litpic` varchar(250) DEFAULT NULL COMMENT '图片',
  `info` text COMMENT '简介说明',
  `sorts` int(11) NOT NULL COMMENT '排序',
  `status` int(11) NOT NULL COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_banner
-- ----------------------------

-- ----------------------------
-- Table structure for tf_comment
-- ----------------------------
DROP TABLE IF EXISTS `tf_comment`;
CREATE TABLE `tf_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `mid` int(11) NOT NULL COMMENT '被评论用户id',
  `uid` int(11) NOT NULL COMMENT '评论用户id',
  `content` text COMMENT '评论内容',
  `recontent` text COMMENT '回复内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_comment
-- ----------------------------

-- ----------------------------
-- Table structure for tf_config
-- ----------------------------
DROP TABLE IF EXISTS `tf_config`;
CREATE TABLE `tf_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `k` char(50) DEFAULT NULL COMMENT '键',
  `v` text COMMENT '值',
  `type` varchar(50) DEFAULT NULL COMMENT '类型',
  `desc` text COMMENT '描述',
  `prompt` varchar(250) DEFAULT NULL COMMENT '提示',
  `sorts` int(11) DEFAULT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL COMMENT '是否显示',
  `texttype` varchar(100) DEFAULT NULL COMMENT '文本类型',
  `textvalue` varchar(100) DEFAULT NULL COMMENT '文本选项值',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `k` (`k`) USING BTREE,
  KEY `type` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_config
-- ----------------------------
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('1','title','苏晓信','web','网站标题','网站标题【title】','1','1','text','','1493863845','1501663526');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('2','logo','/uploads/image/20170826/a2f7e2021ed0494197a2dc7da220d93e.jpg','web','网站LOGO','网站LOGO，一般用于导航或底部的LOGO图片','2','1','image','','1493864083','1501663570');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('3','person','苏晓信','web','联系人','联系人','3','1','text','','1493864150','1493864480');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('4','address','184278846','web','联系地址','联系地址','4','1','text','','1493864266','1493864485');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('5','keywords','苏晓信-keywords','web','网站关键字','网站关键字，网站首页的【keywords】','5','1','text','','1493864340','1501663645');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('6','description','苏晓信-description','web','网站描述','网站描述，网站首页的【description】','6','1','textarea','','1493864454','1501663673');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('7','copyright','Copyright © 2017-2018 苏晓信','web','网站备案号','网站备案号','7','1','text','','1493864547','1493864568');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('8','isbrowse','0','system','系统浏览模式','系统浏览模式','1','0','select','','1494066335','1505468914');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('9','islog','0','system','是否开启系统日志','是否开启系统日志','2','0','select','','1494066832','1505468915');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('10','image_format','jpg,gif,jpeg,png,bmp','up','上传图片格式','上传图片格式','1','1','text','','1494067463','1499080988');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('11','image_size','5242880','up','上传文件大小','1024：1KB，1048576：1MB，5242880：5MB。建议不要超过5MB，避免文件上传失败','5','1','text','','1494067564','1501572699');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('12','image_print','/static/global/face/logo.png','up','水印图片','水印图片，可为上传的图片添加水印，开启了图片水印功能，请必须上传水印图片','8','1','image','','1494067681','1501664409');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('13','file_format','doc,docx,xls,xlsx,ppt,htm,html,txt,zip,rar','up','上传文件格式','上传文件格式','2','1','text','','1495940879','1495941568');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('14','flash_format','swf,flv','up','上传Flash格式','上传Flash格式','3','1','text','','1495940963','1495941577');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('15','media_format','swf,flv,mp3,wav,wma,wmv,mid,avi,mpg,asf,rm,rmvb','up','上传视音频格式','上传视音频格式','4','1','text','','1495941005','1495941582');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('16','upload_path','uploads','up','文件上传目录','文件上传目录','6','1','text','','1495942885','1495943186');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('17','isprint','1','up','是否开启图片水印','是否开启图片水印','7','1','select','','1495943270','1495943372');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('18','print_position','9','up','水印图片位置','水印图片位置','9','1','select','','1495996448','1495996448');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('19','print_blur','70','up','水印图片透明度','水印图片透明度，取值范围【0-100】','10','1','text','','1495996522','1501664253');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('20','appkey','【阿里大于】短信appkey','sms','短信appkey','短信appkey','1','1','text','','1496207509','1499163943');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('21','secretKey','【阿里大于】短信secretKey','sms','短信secretKey','短信secretKey','2','1','text','','1496207647','1499080992');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('22','sms_free_sign_name','【阿里大于】短信签名','sms','短信签名','短信签名','3','1','text','','1496208387','1499080992');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('23','sms_code_tpl_code','【阿里大于】SMS_00000001','sms','短信注册模板','短信注册模板','5','1','text','','1496208437','1499080991');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('24','sms_pwd_tpl_code','【阿里大于】SMS_00000002','sms','短信密码找回模板','短信密码找回模板','6','1','text','','1496208571','1500478651');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('25','image_url','','up','图片上传域名地址','图片上传域名地址，图片路径保存数据库是否带域名，不建议填写，除非很清楚怎么使用','11','1','text','','1496295604','1501664181');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('26','sms_end_time','【阿里大于】30','sms','短信验证时限','短信验证时单位：分，只填整数','4','1','text','','1498101884','1500478650');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('27','login_time','6000','system','登陆超时时限','登陆系统多久时间不操作，重新登陆系统，数字整数【10:10秒】','3','1','text','','1505468873','1505468873');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('28','api_token_encryption','sxx','api','token加密','API接口token接口令牌加密配置字段','1','1','text','','1509206015','1509206015');
INSERT INTO `tf_config` (`id`,`k`,`v`,`type`,`desc`,`prompt`,`sorts`,`status`,`texttype`,`textvalue`,`create_time`,`update_time`) VALUES ('29','api_url','http://dq.base.com','api','接口地址','API接口外部访问地址，可为IP地址','2','1','text','','1509206051','1509206064');

-- ----------------------------
-- Table structure for tf_flink
-- ----------------------------
DROP TABLE IF EXISTS `tf_flink`;
CREATE TABLE `tf_flink` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `mid` int(11) NOT NULL COMMENT '模块分类ID',
  `webname` varchar(250) NOT NULL COMMENT '网站名称',
  `url` varchar(250) DEFAULT NULL COMMENT '网站链接',
  `info` text COMMENT '网站简介',
  `email` varchar(250) DEFAULT NULL COMMENT '站长邮箱',
  `logo` varchar(250) DEFAULT NULL COMMENT '网站logo地址',
  `sorts` int(11) NOT NULL COMMENT '排序',
  `status` int(11) NOT NULL COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_flink
-- ----------------------------
INSERT INTO `tf_flink` (`id`,`mid`,`webname`,`url`,`info`,`email`,`logo`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('1','1','百度','https://www.baidu.com/','百度网址','1234@qq.com','https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png','1','1','1509244824','1509245150');
INSERT INTO `tf_flink` (`id`,`mid`,`webname`,`url`,`info`,`email`,`logo`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('2','1','新浪微博','http://weibo.com/','','123@qq.com','','1','1','1509244966','1509244966');

-- ----------------------------
-- Table structure for tf_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `tf_guestbook`;
CREATE TABLE `tf_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `title` varchar(250) DEFAULT NULL COMMENT '标题',
  `email` varchar(250) DEFAULT NULL COMMENT '邮箱',
  `content` text COMMENT '评论内容',
  `recontent` text COMMENT '回复内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_guestbook
-- ----------------------------
INSERT INTO `tf_guestbook` (`id`,`uid`,`title`,`email`,`content`,`recontent`,`status`,`create_time`,`update_time`) VALUES ('1','1','hello','','欢迎您的反馈','','1','1502786251','1502786251');

-- ----------------------------
-- Table structure for tf_login_log
-- ----------------------------
DROP TABLE IF EXISTS `tf_login_log`;
CREATE TABLE `tf_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL COMMENT '登陆用户ID',
  `ip` varchar(100) NOT NULL COMMENT 'IP地址',
  `country` varchar(100) DEFAULT NULL COMMENT '国家',
  `province` varchar(100) DEFAULT NULL COMMENT '省',
  `city` varchar(100) DEFAULT NULL COMMENT '城市',
  `district` varchar(100) DEFAULT NULL COMMENT '区',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_login_log
-- ----------------------------
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('1','1','220.166.96.3','中国','四川','泸州','','1','1502782475','1502782475');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('2','1','106.92.245.226','中国','重庆','重庆','','1','1502782523','1502782523');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('3','2','106.92.245.226','中国','重庆','重庆','','1','1502784480','1502784480');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('4','1','106.92.245.226','中国','重庆','重庆','','1','1502784517','1502784517');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('5','1','106.92.245.226','中国','重庆','重庆','','1','1502785104','1502785104');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('6','2','106.92.245.226','中国','重庆','重庆','','1','1502785133','1502785133');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('7','1','106.92.245.226','中国','重庆','重庆','','1','1502785156','1502785156');
INSERT INTO `tf_login_log` (`id`,`uid`,`ip`,`country`,`province`,`city`,`district`,`status`,`create_time`,`update_time`) VALUES ('8','1','106.92.245.226','中国','重庆','重庆','','1','1502785177','1502785177');

-- ----------------------------
-- Table structure for tf_module_class
-- ----------------------------
DROP TABLE IF EXISTS `tf_module_class`;
CREATE TABLE `tf_module_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(250) NOT NULL COMMENT '标题',
  `action` varchar(250) NOT NULL COMMENT '模块操作',
  `sorts` int(11) NOT NULL COMMENT '排序',
  `status` int(11) NOT NULL COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_module_class
-- ----------------------------
INSERT INTO `tf_module_class` (`id`,`title`,`action`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('1','友情链接','flink','1001','1','1499310094','1500693625');
INSERT INTO `tf_module_class` (`id`,`title`,`action`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('2','合作伙伴','flink','1002','1','1499310095','1502778579');
INSERT INTO `tf_module_class` (`id`,`title`,`action`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('3','首页顶部banner','banner','2001','1','1499310182','1499310326');
INSERT INTO `tf_module_class` (`id`,`title`,`action`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('4','内页banner','banner','2002','1','1499310261','1499310326');

-- ----------------------------
-- Table structure for tf_token_api
-- ----------------------------
DROP TABLE IF EXISTS `tf_token_api`;
CREATE TABLE `tf_token_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(250) NOT NULL COMMENT '接口名称',
  `module` varchar(250) NOT NULL COMMENT '模块',
  `controller` varchar(250) NOT NULL COMMENT '控制器',
  `method` varchar(250) NOT NULL COMMENT '方法',
  `param` varchar(250) DEFAULT NULL COMMENT '参数',
  `is_user_token` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否验证用户token',
  `is_api_token` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否验证接口token',
  `type` varchar(50) NOT NULL DEFAULT 'GET' COMMENT '请求方式',
  `token` char(32) DEFAULT NULL COMMENT '接口令牌',
  `document` text COMMENT '接口文档',
  `remark` text NOT NULL COMMENT '接口备注',
  `sorts` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_token_api
-- ----------------------------
INSERT INTO `tf_token_api` (`id`,`name`,`module`,`controller`,`method`,`param`,`is_user_token`,`is_api_token`,`type`,`token`,`document`,`remark`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('1','友情链接列表','api','Flink','index','','0','0','GET','0ab50bda0a40bf078a415deab654eb19','{"url":"\/api\/flink"}','?orderBy[]=id,desc&amp;page=1&amp;pageSize=2
&amp;addon=moduleClass 【关联模块分类表】

当前接口未开启任何token验证，可直接使用','1','1','1505660032','1509245191');
INSERT INTO `tf_token_api` (`id`,`name`,`module`,`controller`,`method`,`param`,`is_user_token`,`is_api_token`,`type`,`token`,`document`,`remark`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('2','友情链接单条查询','api','Flink','index','id','1','0','GET','3708626bc9c864bc88465f4ffe79919c','{"url":"\/api\/flink\/1"}','&amp;addon=moduleClass 【关联模块分类表】

当前接口开启用户token，仅开启ID为1的admin用户token【61e5146e54db6be2d7174530417ea40b】
?token_uid=1&amp;token_user=61e5146e54db6be2d7174530417ea40b','2','1','1505660082','1509244598');
INSERT INTO `tf_token_api` (`id`,`name`,`module`,`controller`,`method`,`param`,`is_user_token`,`is_api_token`,`type`,`token`,`document`,`remark`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('3','友情链接新增','api','Flink','index','','0','1','POST','4aefb101ea274fda9a62e234b56714df','{"url":"\/api\/flink","data":[{"key":"mid","value":"1","type":"text","enabled":true},{"key":"webname","value":"","type":"text","enabled":true},{"key":"url","value":"","type":"text","enabled":false},{"key":"info","value":"","type":"text","enabled":false},{"key":"email","value":"","type":"text","enabled":false},{"key":"logo","value":"","type":"text","enabled":false},{"key":"sorts","value":"50","type":"text","enabled":true},{"key":"status","value":"1","type":"text","enabled":true}]}','当前接口开启接口token验证
?token_api=4aefb101ea274fda9a62e234b56714df【接口令牌token】','3','1','1507274504','1509171720');
INSERT INTO `tf_token_api` (`id`,`name`,`module`,`controller`,`method`,`param`,`is_user_token`,`is_api_token`,`type`,`token`,`document`,`remark`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('4','友情链接编辑','api','Flink','index','id','1','1','PUT','656e9258bbcdebf31271317681e9a3a0','{"url":"\/api\/flink\/1","data":[{"key":"mid","value":"1","type":"text","enabled":true},{"key":"webname","value":"","type":"text","enabled":true},{"key":"url","value":"","type":"text","enabled":false},{"key":"info","value":"","type":"text","enabled":false},{"key":"email","value":"","type":"text","enabled":false},{"key":"logo","value":"","type":"text","enabled":false},{"key":"sorts","value":"50","type":"text","enabled":true},{"key":"status","value":"1","type":"text","enabled":true}]}','当前接口开启用户token和接口token验证，仅开启ID为1的admin用户token【61e5146e54db6be2d7174530417ea40b】
&amp;token_uid=1&amp;token_user=61e5146e54db6be2d7174530417ea40b
&amp;token_api=656e9258bbcdebf31271317681e9a3a0【接口令牌token】','4','1','1507274570','1509244689');
INSERT INTO `tf_token_api` (`id`,`name`,`module`,`controller`,`method`,`param`,`is_user_token`,`is_api_token`,`type`,`token`,`document`,`remark`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('5','友情链接删除','api','Flink','index','id','0','0','DELETE','6fdb7f3a2ea04eb4ca746e64ecd96161','{"url":"\/api\/flink\/6"}','删除需要数据库成功删除才会返回200

当前接口未开启任何token验证，可直接使用','5','0','1507278825','1509169242');
INSERT INTO `tf_token_api` (`id`,`name`,`module`,`controller`,`method`,`param`,`is_user_token`,`is_api_token`,`type`,`token`,`document`,`remark`,`sorts`,`status`,`create_time`,`update_time`) VALUES ('6','友情链接自定义','api','Flink','demo','','0','0','GET','75726358b96d9ca2b6c760bb01a4df09','{"url":"\/api\/flink\/demo"}','1','6','1','1509163375','1509163924');

-- ----------------------------
-- Table structure for tf_token_user
-- ----------------------------
DROP TABLE IF EXISTS `tf_token_user`;
CREATE TABLE `tf_token_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型【1、PC，2、移动端】',
  `token` char(32) NOT NULL COMMENT 'token令牌',
  `token_time` int(10) DEFAULT NULL COMMENT 'token令牌时限【PC登陆超时】',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_token_user
-- ----------------------------
INSERT INTO `tf_token_user` (`id`,`uid`,`type`,`token`,`token_time`,`create_time`,`update_time`) VALUES ('9','1','2','61e5146e54db6be2d7174530417ea40b','','1505556248','1505556248');
INSERT INTO `tf_token_user` (`id`,`uid`,`type`,`token`,`token_time`,`create_time`,`update_time`) VALUES ('10','1','1','d6f873281bcf39d3adc72beac243305a','1509251307','1505569684','1505569684');

-- ----------------------------
-- Table structure for tf_user
-- ----------------------------
DROP TABLE IF EXISTS `tf_user`;
CREATE TABLE `tf_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `name` varchar(100) DEFAULT NULL COMMENT '姓名',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `moblie` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `logins` int(11) NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `reg_ip` varchar(200) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` varchar(200) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_user
-- ----------------------------
INSERT INTO `tf_user` (`id`,`username`,`password`,`name`,`email`,`moblie`,`sex`,`logins`,`create_time`,`update_time`,`reg_ip`,`last_time`,`last_ip`,`status`) VALUES ('1','admin','e10adc3949ba59abbe56e057f20f883e','苏晓信','654108442@qq.com','15823075587','1','26','1502781914','1502785463','127.0.0.1','1509244414','127.0.0.1','1');
INSERT INTO `tf_user` (`id`,`username`,`password`,`name`,`email`,`moblie`,`sex`,`logins`,`create_time`,`update_time`,`reg_ip`,`last_time`,`last_ip`,`status`) VALUES ('2','test1','e10adc3949ba59abbe56e057f20f883e','测试账号','','','1','5','1502782875','1502783821','127.0.0.1','1502785133','106.92.245.226','1');
INSERT INTO `tf_user` (`id`,`username`,`password`,`name`,`email`,`moblie`,`sex`,`logins`,`create_time`,`update_time`,`reg_ip`,`last_time`,`last_ip`,`status`) VALUES ('3','不高兴','e10adc3949ba59abbe56e057f20f883e','不高兴','','','1','0','1502785283','1502785283','127.0.0.1','1502785283','127.0.0.1','1');
INSERT INTO `tf_user` (`id`,`username`,`password`,`name`,`email`,`moblie`,`sex`,`logins`,`create_time`,`update_time`,`reg_ip`,`last_time`,`last_ip`,`status`) VALUES ('4','没头脑','e10adc3949ba59abbe56e057f20f883e','没头脑','','','1','0','1502785316','1502785316','127.0.0.1','1502785316','127.0.0.1','1');
INSERT INTO `tf_user` (`id`,`username`,`password`,`name`,`email`,`moblie`,`sex`,`logins`,`create_time`,`update_time`,`reg_ip`,`last_time`,`last_ip`,`status`) VALUES ('5','么么么么','e10adc3949ba59abbe56e057f20f883e','小媳妇','','','1','0','1502785706','1502786064','127.0.0.1','1502785706','127.0.0.1','1');

-- ----------------------------
-- Table structure for tf_user_info
-- ----------------------------
DROP TABLE IF EXISTS `tf_user_info`;
CREATE TABLE `tf_user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `qq` varchar(100) DEFAULT NULL COMMENT 'QQ',
  `birthday` varchar(100) DEFAULT NULL COMMENT '生日',
  `info` text COMMENT '用户信息',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of tf_user_info
-- ----------------------------
INSERT INTO `tf_user_info` (`id`,`uid`,`avatar`,`qq`,`birthday`,`info`,`create_time`,`update_time`) VALUES ('1','1','/uploads/avatar/20170815/20170815162719_522753.jpg','654108442','544204800','&lt;p&gt;
	hi
&lt;/p&gt;','1502781914','1502781914');
INSERT INTO `tf_user_info` (`id`,`uid`,`avatar`,`qq`,`birthday`,`info`,`create_time`,`update_time`) VALUES ('2','2','/uploads/avatar/20170815/20170815163031_249551.jpg','','','','1502782875','1502782875');
INSERT INTO `tf_user_info` (`id`,`uid`,`avatar`,`qq`,`birthday`,`info`,`create_time`,`update_time`) VALUES ('3','3','/uploads/avatar/20170815/20170815163042_582354.jpg','','','','1502785283','1502785283');
INSERT INTO `tf_user_info` (`id`,`uid`,`avatar`,`qq`,`birthday`,`info`,`create_time`,`update_time`) VALUES ('4','4','/uploads/avatar/20170815/20170815163103_675106.jpg','','','','1502785316','1502785316');
INSERT INTO `tf_user_info` (`id`,`uid`,`avatar`,`qq`,`birthday`,`info`,`create_time`,`update_time`) VALUES ('5','5','/uploads/avatar/20170815/20170815162951_787194.jpg','','','','1502785706','1502785706');

