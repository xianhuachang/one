DROP TABLE IF EXISTS ims_account;
CREATE TABLE `ims_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `hash` varchar(8) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `isconnect` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`acid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO ims_account VALUES 
('1','1','uRr8qvQV','1','0'),
('2','2','e626p6KX','1','1'),
('3','3','','1','1'),
('4','4','','3','0');


DROP TABLE IF EXISTS ims_account_wechats;
CREATE TABLE `ims_account_wechats` (
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `encodingaeskey` varchar(255) NOT NULL,
  `access_token` varchar(1000) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `province` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL DEFAULT '1',
  `subscribeurl` varchar(120) NOT NULL,
  `jsapi_ticket` varchar(1000) NOT NULL,
  `card_ticket` varchar(1000) NOT NULL,
  `auth_refresh_token` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ims_account_wechats VALUES 
('1','1','omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP','','','3','we7team','','','','','','','','','0','','','1','','','',''),
('2','2','pD4dy3xf382Gx4IfDjxd44dE8x4Det88','EPAuA7fhUU0kgJZggF60RfJuKxFGzHI1kR1PijIG7ig','a:2:{s:5:\"token\";s:107:\"dqeviGUB9CBfkAeatlVdDkJZ64fw2wMfw3Y9nTnw7TsKBxpMmQ-0AakuIfvR8MIKgb9UIs0DxqymwRQQwyE-oveJuhaMMxnlUSE6oWr6FMg\";s:6:\"expire\";i:1434461333;}','4','印象大鹏','','','','','','','','','0','wxe619ef51acd58ba5','eb9318262ee8a798d53ffd7f01ac6971','1','','','',''),
('3','3','nZJM40X4AM4VlzvxFmCjvx3xAkuf8aJ4','rSE61EWsGu2SeSW6WOFsEGASg108a1rwUeEZ2uWZsR0','a:2:{s:5:\"token\";s:107:\"eBTf8zguEN-hiEIl3SzWkJVfojiaDUWpyFZmn573YCmeQnitWKbcfTfjqElDFJDgJIJcjXZh3QBmI9JAqViS-c_NVXefm7W6Xf6sPm2JfkM\";s:6:\"expire\";i:1441902565;}','4','28days细胞级护理','cellcare28days','gh_5013f37369ce','28days健康美容国际连锁服务平台','','','','wd@28days.cn','b9ea4b15407b49bfff52bd0d9521282a','1438582270','wx392883fecf843961','be05883e41ce9229ff4614dc8c998853','1','','a:2:{s:6:\"ticket\";s:86:\"sM4AOVdWfPE4DxkXGEs8VOiu0dUkhiQ-swga1TLbIIVGlwrykK0MMMqevCNYJRW2B7QEMlrKOlAuxfRHtYoWBw\";s:6:\"expire\";i:1441709981;}','',''),
('4','4','u35ambyoahgg4g13dntuhohw5nbpxb4l','','','4','全网发布测试数据','','','','','','','','','0','wx570bc396a51b8ff8','','1','','','','');


DROP TABLE IF EXISTS ims_account_yixin;
CREATE TABLE `ims_account_yixin` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `access_token` varchar(1000) NOT NULL DEFAULT '',
  `level` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_coupon;
CREATE TABLE `ims_activity_coupon` (
  `couponid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `couponsn` varchar(50) NOT NULL,
  `description` text,
  `discount` decimal(10,2) NOT NULL,
  `condition` decimal(10,2) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `limit` int(11) NOT NULL DEFAULT '0',
  `dosage` int(11) unsigned NOT NULL DEFAULT '0',
  `amount` int(11) unsigned NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(20) NOT NULL,
  `use_module` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`couponid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_coupon_allocation;
CREATE TABLE `ims_activity_coupon_allocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`couponid`,`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_coupon_modules;
CREATE TABLE `ims_activity_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_coupon_password;
CREATE TABLE `ims_activity_coupon_password` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_coupon_record;
CREATE TABLE `ims_activity_coupon_record` (
  `recid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grantmodule` varchar(50) NOT NULL DEFAULT '',
  `granttime` int(10) unsigned NOT NULL DEFAULT '0',
  `usemodule` varchar(50) NOT NULL DEFAULT '',
  `usetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remark` varchar(300) NOT NULL DEFAULT '',
  `couponid` int(10) unsigned NOT NULL,
  `operator` varchar(30) NOT NULL,
  PRIMARY KEY (`recid`),
  KEY `couponid` (`uid`,`grantmodule`,`usemodule`,`status`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_exchange;
CREATE TABLE `ims_activity_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `couponid` int(10) NOT NULL DEFAULT '0',
  `uniacid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `extra` varchar(3000) NOT NULL DEFAULT '',
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `pretotal` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_exchange_trades;
CREATE TABLE `ims_activity_exchange_trades` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`,`uid`,`exid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_exchange_trades_shipping;
CREATE TABLE `ims_activity_exchange_trades_shipping` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_modules;
CREATE TABLE `ims_activity_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `available` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mid`),
  KEY `uniacid` (`uniacid`),
  KEY `module` (`module`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_activity_modules_record;
CREATE TABLE `ims_activity_modules_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `num` tinyint(3) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_article_reply;
CREATE TABLE `ims_article_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `isfill` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_basic_reply;
CREATE TABLE `ims_basic_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO ims_basic_reply VALUES 
('1','9','啦啦啦啦啦'),
('4','12','您好，我是欧歌[U+1F6B6]，致力于细胞级护理品牌28days宣传推广，这里是欧歌开发专用号，如需关注[U+1F3AF]官方服务号，请搜索28days唯一官方微信号[U+1F33A]“i28days”[U+1F33A]关注。');


DROP TABLE IF EXISTS ims_bigwheel_award;
CREATE TABLE `ims_bigwheel_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `rid` int(11) DEFAULT '0',
  `fansID` int(11) DEFAULT '0',
  `from_user` varchar(50) DEFAULT '0' COMMENT '用户ID',
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `prizetype` varchar(10) DEFAULT '' COMMENT '类型',
  `award_sn` varchar(50) DEFAULT '' COMMENT 'SN',
  `createtime` int(10) DEFAULT '0',
  `consumetime` int(10) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rid` (`rid`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_bigwheel_award VALUES 
('1','2','10','1','od9iCuEkcpZ93q0Sk-MLwxJ8FVrc','安慰奖','继续努力','three','ln28OTFDF38HJjTj','1421464911','0','1');


DROP TABLE IF EXISTS ims_bigwheel_fans;
CREATE TABLE `ims_bigwheel_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT '0',
  `fansID` int(11) DEFAULT '0',
  `from_user` varchar(50) DEFAULT '' COMMENT '用户ID',
  `tel` varchar(20) DEFAULT '' COMMENT '登记信息(手机等)',
  `todaynum` int(11) DEFAULT '0',
  `totalnum` int(11) DEFAULT '0',
  `awardnum` int(11) DEFAULT '0',
  `last_time` int(10) DEFAULT '0',
  `createtime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_bigwheel_fans VALUES 
('1','10','1','od9iCuEkcpZ93q0Sk-MLwxJ8FVrc','','2','2','1','1421424000','1421464787');


DROP TABLE IF EXISTS ims_bigwheel_reply;
CREATE TABLE `ims_bigwheel_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned DEFAULT '0',
  `weid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `content` varchar(200) DEFAULT '',
  `start_picurl` varchar(200) DEFAULT '',
  `isshow` tinyint(1) DEFAULT '0',
  `ticket_information` varchar(200) DEFAULT '',
  `starttime` int(10) DEFAULT '0',
  `endtime` int(10) DEFAULT '0',
  `repeat_lottery_reply` varchar(50) DEFAULT '',
  `end_theme` varchar(50) DEFAULT '',
  `end_instruction` varchar(200) DEFAULT '',
  `end_picurl` varchar(200) DEFAULT '',
  `c_type_one` varchar(20) DEFAULT '',
  `c_name_one` varchar(50) DEFAULT '',
  `c_num_one` int(11) DEFAULT '0',
  `c_draw_one` int(11) DEFAULT '0',
  `c_rate_one` double DEFAULT '0',
  `c_type_two` varchar(20) DEFAULT '',
  `c_name_two` varchar(50) DEFAULT '',
  `c_num_two` int(11) DEFAULT '0',
  `c_draw_two` int(11) DEFAULT '0',
  `c_rate_two` double DEFAULT '0',
  `c_type_three` varchar(20) DEFAULT '',
  `c_name_three` varchar(50) DEFAULT '',
  `c_num_three` int(11) DEFAULT '0',
  `c_draw_three` int(11) DEFAULT '0',
  `c_rate_three` double DEFAULT '0',
  `c_type_four` varchar(20) DEFAULT '',
  `c_name_four` varchar(50) DEFAULT '',
  `c_num_four` int(11) DEFAULT '0',
  `c_draw_four` int(11) DEFAULT '0',
  `c_rate_four` double DEFAULT '0',
  `c_type_five` varchar(20) DEFAULT '',
  `c_name_five` varchar(50) DEFAULT '',
  `c_num_five` int(11) DEFAULT '0',
  `c_draw_five` int(11) DEFAULT '0',
  `c_rate_five` double DEFAULT '0',
  `c_type_six` varchar(20) DEFAULT '',
  `c_name_six` varchar(50) DEFAULT '',
  `c_num_six` int(11) DEFAULT '0',
  `c_draw_six` int(10) DEFAULT '0',
  `c_rate_six` double DEFAULT '0',
  `total_num` int(11) DEFAULT '0' COMMENT '总获奖人数(自动加)',
  `probability` double DEFAULT '0',
  `award_times` int(11) DEFAULT '0',
  `number_times` int(11) DEFAULT '0',
  `most_num_times` int(11) DEFAULT '0',
  `sn_code` tinyint(4) DEFAULT '0',
  `sn_rename` varchar(20) DEFAULT '',
  `tel_rename` varchar(20) DEFAULT '',
  `copyright` varchar(20) DEFAULT '',
  `show_num` tinyint(2) DEFAULT '0',
  `viewnum` int(11) DEFAULT '0',
  `fansnum` int(11) DEFAULT '0',
  `createtime` int(10) DEFAULT '0',
  `share_title` varchar(200) DEFAULT '',
  `share_desc` varchar(300) DEFAULT '',
  `share_url` varchar(100) DEFAULT '',
  `share_txt` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_rid` (`rid`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_bigwheel_reply VALUES 
('1','10','2','幸运大转盘活动开始了!','欢迎参加幸运大转盘活动','','../addons/ewei_bigwheel/template/style/activity-lottery-start.jpg','1','兑奖请联系我们,电话: 13888888888','1421424000','1422028800','亲，继续努力哦~~','幸运大转盘活动已经结束了','亲，活动已经结束，请继续关注我们的后续活动哦~','../addons/ewei_bigwheel/template/style/activity-lottery-end.jpg','一等奖','iphone6','2','0','1','二等奖','电饭煲','10','0','10','安慰奖','继续努力','10000','1','50','','','0','0','0','','','0','0','0','','','0','0','0','10012','0','100','100','10','0','SN码','手机号','','1','5','1','1421464889','欢迎参加大转盘活动','亲，欢迎参加大转盘抽奖活动，祝您好运哦！！ 亲，需要绑定账号才可以参加哦','','&lt;p&gt;1. 关注微信公众账号&quot;()&quot;&lt;/p&gt;\r\n&lt;p&gt;2. 发送消息&quot;大转盘&quot;, 点击返回的消息即可参加&lt;/p&gt;');


DROP TABLE IF EXISTS ims_business;
CREATE TABLE `ims_business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL DEFAULT '',
  `qq` varchar(15) NOT NULL DEFAULT '',
  `province` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `dist` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(500) NOT NULL DEFAULT '',
  `lng` varchar(10) NOT NULL DEFAULT '',
  `lat` varchar(10) NOT NULL DEFAULT '',
  `industry1` varchar(10) NOT NULL DEFAULT '',
  `industry2` varchar(10) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_lat_lng` (`lng`,`lat`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO ims_business VALUES 
('1','2','商户1','','','15012347894','','广东省','广州市','天河区','黄埔大道西','113.348111','23.131522','丽人','美容/SPA','1416880895'),
('2','2','小吃','','','','','安徽省','宿州市','埇桥区','','116.966945','33.610976','美食','其他','1416881027');


DROP TABLE IF EXISTS ims_core_attachment;
CREATE TABLE `ims_core_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_core_cache;
CREATE TABLE `ims_core_cache` (
  `key` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ims_core_cache VALUES 
('setting','a:6:{s:8:\"authmode\";i:1;s:5:\"close\";a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}s:8:\"register\";a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}s:4:\"site\";a:2:{s:3:\"key\";s:5:\"27201\";s:5:\"token\";s:32:\"af1cd72375b6bcb3444ecce59159f724\";}s:9:\"copyright\";a:20:{s:6:\"status\";s:1:\"1\";s:6:\"reason\";s:3:\"要\";s:8:\"sitename\";s:0:\"\";s:3:\"url\";s:7:\"http://\";s:8:\"statcode\";s:0:\"\";s:10:\"footerleft\";s:0:\"\";s:11:\"footerright\";s:0:\"\";s:4:\"icon\";s:0:\"\";s:5:\"flogo\";s:0:\"\";s:5:\"blogo\";s:0:\"\";s:8:\"baidumap\";a:2:{s:3:\"lng\";s:0:\"\";s:3:\"lat\";s:0:\"\";}s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:6:\"person\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:2:\"qq\";s:0:\"\";s:5:\"email\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"showhomepage\";i:0;}s:8:\"platform\";a:4:{s:5:\"token\";s:32:\"Xwr964EMSlw4A5BAK4mWURk14rw1e156\";s:14:\"encodingaeskey\";s:43:\"QdQb1VuUBdl1ozlsevUDvml2MC8dlrunnVLoN2mvrZB\";s:9:\"appsecret\";s:0:\"\";s:5:\"appid\";s:0:\"\";}}'),
('menus:platform','a:0:{}'),
('menus:site','a:0:{}'),
('modules','a:19:{s:5:\"basic\";a:17:{s:3:\"mid\";s:1:\"1\";s:4:\"name\";s:5:\"basic\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本文字回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"和您进行简单对话\";s:11:\"description\";s:201:\"一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:4:\"news\";a:17:{s:3:\"mid\";s:1:\"2\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"基本混合图文回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:33:\"为你提供生动的图文资讯\";s:11:\"description\";s:272:\"一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:5:\"music\";a:17:{s:3:\"mid\";s:1:\"3\";s:4:\"name\";s:5:\"music\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本音乐回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:39:\"提供语音、音乐等音频类回复\";s:11:\"description\";s:183:\"在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:7:\"userapi\";a:17:{s:3:\"mid\";s:1:\"4\";s:4:\"name\";s:7:\"userapi\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:21:\"自定义接口回复\";s:7:\"version\";s:3:\"1.1\";s:7:\"ability\";s:33:\"更方便的第三方接口设置\";s:11:\"description\";s:141:\"自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:8:\"recharge\";a:17:{s:3:\"mid\";s:1:\"5\";s:4:\"name\";s:8:\"recharge\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"会员中心充值模块\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"提供会员充值功能\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:6:\"custom\";a:17:{s:3:\"mid\";s:1:\"6\";s:4:\"name\";s:6:\"custom\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:15:\"多客服转接\";s:7:\"version\";s:5:\"1.0.0\";s:7:\"ability\";s:36:\"用来接入腾讯的多客服系统\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:6:\"images\";a:17:{s:3:\"mid\";s:1:\"7\";s:4:\"name\";s:6:\"images\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本图片回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:5:\"video\";a:17:{s:3:\"mid\";s:1:\"8\";s:4:\"name\";s:5:\"video\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本视频回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供视频回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:5:\"voice\";a:17:{s:3:\"mid\";s:1:\"9\";s:4:\"name\";s:5:\"voice\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本语音回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供语音回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:12:\"we7_business\";a:17:{s:3:\"mid\";s:2:\"10\";s:4:\"name\";s:12:\"we7_business\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:12:\"周边商户\";s:7:\"version\";s:3:\"1.6\";s:7:\"ability\";s:54:\"提供商家信息的添加、聚合及LBS的查询。\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:74:\"http://bbs.we7.cc/forum.php?mod=forumdisplay&fid=36&filter=typeid&typeid=1\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:8:\"location\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:13:\"ewei_shopping\";a:17:{s:3:\"mid\";s:2:\"11\";s:4:\"name\";s:13:\"ewei_shopping\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:9:\"微商城\";s:7:\"version\";s:5:\"6.4.2\";s:7:\"ability\";s:9:\"微商城\";s:11:\"description\";s:9:\"微商城\";s:6:\"author\";s:20:\"WeEngine Team & ewei\";s:3:\"url\";s:0:\"\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:6:\"hl_zzz\";a:17:{s:3:\"mid\";s:2:\"12\";s:4:\"name\";s:6:\"hl_zzz\";s:4:\"type\";s:8:\"activity\";s:5:\"title\";s:9:\"做粽子\";s:7:\"version\";s:3:\"2.0\";s:7:\"ability\";s:15:\"瑞午节活动\";s:11:\"description\";s:146:\"每天系统默认给予10次（可以后台自定义），想要赶快做出XX，那就邀请好友来助威，让你的好友送你体力赚X吧\";s:6:\"author\";s:6:\"皓蓝\";s:3:\"url\";s:0:\"\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:13:\"ewei_bigwheel\";a:17:{s:3:\"mid\";s:2:\"13\";s:4:\"name\";s:13:\"ewei_bigwheel\";s:4:\"type\";s:8:\"activity\";s:5:\"title\";s:9:\"大转盘\";s:7:\"version\";s:5:\"1.1.4\";s:7:\"ability\";s:21:\"大转盘营销抽奖\";s:11:\"description\";s:21:\"大转盘营销抽奖\";s:6:\"author\";s:4:\"ewei\";s:3:\"url\";s:0:\"\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:5:\"chats\";a:17:{s:3:\"mid\";s:2:\"14\";s:4:\"name\";s:5:\"chats\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"发送客服消息\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:77:\"公众号可以在粉丝最后发送消息的48小时内无限制发送消息\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.we7.cc/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:7:\"wl_heka\";a:17:{s:3:\"mid\";s:2:\"15\";s:4:\"name\";s:7:\"wl_heka\";s:4:\"type\";s:8:\"activity\";s:5:\"title\";s:9:\"送贺卡\";s:7:\"version\";s:3:\"1.7\";s:7:\"ability\";s:42:\"新年贺卡，生日贺卡，同窗贺卡\";s:11:\"description\";s:42:\"新年贺卡，生日贺卡，同窗贺卡\";s:6:\"author\";s:32:\"超级无聊 &amp; WeEngine Team\";s:3:\"url\";s:0:\"\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:12:\"we7_research\";a:17:{s:3:\"mid\";s:2:\"16\";s:4:\"name\";s:12:\"we7_research\";s:4:\"type\";s:8:\"customer\";s:5:\"title\";s:15:\"预约与调查\";s:7:\"version\";s:3:\"4.2\";s:7:\"ability\";s:48:\"可以快速生成调查表单或则预约记录\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:9:\"ewei_exam\";a:17:{s:3:\"mid\";s:2:\"17\";s:4:\"name\";s:9:\"ewei_exam\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:9:\"微考试\";s:7:\"version\";s:3:\"2.5\";s:7:\"ability\";s:15:\"微考试系统\";s:11:\"description\";s:61:\"考试系统,判断,单选,多选,用于培训机构及学校\";s:6:\"author\";s:4:\"ewei\";s:3:\"url\";s:0:\"\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:8:\"we7_demo\";a:17:{s:3:\"mid\";s:2:\"18\";s:4:\"name\";s:8:\"we7_demo\";s:4:\"type\";s:5:\"other\";s:5:\"title\";s:12:\"官方示例\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:36:\"此模块提供基本的功能展示\";s:11:\"description\";s:36:\"此模块提供基本的功能展示\";s:6:\"author\";s:12:\"微擎团队\";s:3:\"url\";s:18:\"http://bbs.we7.cc/\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:13:{i:0;s:4:\"text\";i:1;s:5:\"image\";i:2;s:5:\"voice\";i:3;s:5:\"video\";i:4;s:8:\"location\";i:5;s:4:\"link\";i:6;s:9:\"subscribe\";i:7;s:11:\"unsubscribe\";i:8;s:2:\"qr\";i:9;s:5:\"trace\";i:10;s:5:\"click\";i:11;s:4:\"view\";i:12;s:5:\"enter\";}s:7:\"handles\";a:2:{i:0;s:8:\"location\";i:1;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}s:10:\"we7_wxwall\";a:17:{s:3:\"mid\";s:2:\"19\";s:4:\"name\";s:10:\"we7_wxwall\";s:4:\"type\";s:8:\"activity\";s:5:\"title\";s:9:\"微信墙\";s:7:\"version\";s:5:\"1.9.2\";s:7:\"ability\";s:54:\"可以实时同步显示现场参与者发送的微信\";s:11:\"description\";s:249:\"微信墙又称微信大屏幕，是在展会、音乐会、婚礼现场等场所展示特定主题微信的大屏幕，大屏幕上可以同步显示现场参与者发送的微信，使场内外观众能够第一时间传递和获取现场信息。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:74:\"http://bbs.we7.cc/forum.php?mod=forumdisplay&fid=36&filter=typeid&typeid=1\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:10:\"issolution\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";}}'),
('usersfields','a:51:{i:0;s:3:\"uid\";i:1;s:7:\"uniacid\";i:2;s:6:\"mobile\";i:3;s:5:\"email\";i:4;s:8:\"password\";i:5;s:4:\"salt\";i:6;s:7:\"groupid\";i:7;s:7:\"credit1\";i:8;s:7:\"credit2\";i:9;s:7:\"credit3\";i:10;s:7:\"credit4\";i:11;s:7:\"credit5\";i:12;s:10:\"createtime\";i:13;s:8:\"realname\";i:14;s:8:\"nickname\";i:15;s:6:\"avatar\";i:16;s:2:\"qq\";i:17;s:3:\"vip\";i:18;s:6:\"gender\";i:19;s:9:\"birthyear\";i:20;s:10:\"birthmonth\";i:21;s:8:\"birthday\";i:22;s:13:\"constellation\";i:23;s:6:\"zodiac\";i:24;s:9:\"telephone\";i:25;s:6:\"idcard\";i:26;s:9:\"studentid\";i:27;s:5:\"grade\";i:28;s:7:\"address\";i:29;s:7:\"zipcode\";i:30;s:11:\"nationality\";i:31;s:14:\"resideprovince\";i:32;s:10:\"residecity\";i:33;s:10:\"residedist\";i:34;s:14:\"graduateschool\";i:35;s:7:\"company\";i:36;s:9:\"education\";i:37;s:10:\"occupation\";i:38;s:8:\"position\";i:39;s:7:\"revenue\";i:40;s:15:\"affectivestatus\";i:41;s:10:\"lookingfor\";i:42;s:9:\"bloodtype\";i:43;s:6:\"height\";i:44;s:6:\"weight\";i:45;s:6:\"alipay\";i:46;s:3:\"msn\";i:47;s:6:\"taobao\";i:48;s:4:\"site\";i:49;s:3:\"bio\";i:50;s:8:\"interest\";}'),
('upgrade','a:2:{s:7:\"upgrade\";b:0;s:10:\"lastupdate\";i:1442409748;}'),
('scan:config','s:749:\"a:5:{s:9:\"file_type\";s:6:\"php|js\";s:4:\"func\";s:72:\"com|system|exec|eval|escapeshell|cmd|passthru|base64_decode|gzuncompress\";s:4:\"code\";s:17:\"weidongli|sinaapp\";s:8:\"md5_file\";s:0:\"\";s:3:\"dir\";a:12:{i:0;s:28:\"/www/web/we7/public_html/api\";i:1;s:32:\"/www/web/we7/public_html/api.php\";i:2;s:52:\"/www/web/we7/public_html/w_28days_cn_20150612.tar.gz\";i:3;s:28:\"/www/web/we7/public_html/app\";i:4;s:35:\"/www/web/we7/public_html/attachment\";i:5;s:31:\"/www/web/we7/public_html/addons\";i:6;s:28:\"/www/web/we7/public_html/web\";i:7;s:34:\"/www/web/we7/public_html/index.php\";i:8;s:34:\"/www/web/we7/public_html/framework\";i:9;s:36:\"/www/web/we7/public_html/install.php\";i:10;s:29:\"/www/web/we7/public_html/data\";i:11;s:35:\"/www/web/we7/public_html/verify.txt\";}}\";'),
('wxauth:wd@28days.cn:token','s:10:\"1242270429\";'),
('wxauth:wd@28days.cn:cookie','s:441:\"data_bizuin=3238007423; Path=/; Secure; HttpOnly; data_ticket=AgUjxdW/6zFPbP7DcpJ2b42WAwH1YVisIsCB+uAcAgk=; Path=/; Secure; HttpOnly; slave_user=gh_5013f37369ce; Path=/; Secure; HttpOnly; slave_sid=TG5PbFhxTjJwMmdubkxUOHZGNHRhb3lGRUZsMTlXaGNYX2hTaFprNGJCOHg4dFRiWXdUdjE1RHREVWFObDNrNmJlTmZ0TFVxaTlKU3hwZ1BjTldvZG1OUnd0MDdLWU1XZ21BYlExX25aS0VBcUpmcnFvLzYxVVR4NDJEQ2MzdEo=; Path=/; Secure; HttpOnly; bizuin=3238007423; Path=/; Secure; HttpOnly\";'),
('checkupgrade:system','a:1:{s:10:\"lastupdate\";i:1442409748;}');


DROP TABLE IF EXISTS ims_core_paylog;
CREATE TABLE `ims_core_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL,
  `openid` varchar(40) NOT NULL DEFAULT '',
  `tid` varchar(64) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `module` varchar(50) NOT NULL DEFAULT '',
  `tag` varchar(2000) NOT NULL DEFAULT '',
  `acid` int(10) unsigned NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO ims_core_paylog VALUES 
('1','wechat','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','1','0.01','0','ewei_shopping','a:1:{s:4:\"acid\";i:3;}','3','0','0','0','0.01','','2015080314413500001100852188'),
('3','wechat','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','2','0.01','1','ewei_shopping','a:2:{s:4:\"acid\";i:3;s:14:\"transaction_id\";s:28:\"1005120956201508030539141914\";}','3','0','0','0','0.01','','2015080316245000001169067680'),
('4','wechat','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','3','0.01','1','ewei_shopping','a:2:{s:4:\"acid\";i:3;s:14:\"transaction_id\";s:28:\"1005120956201508030539249664\";}','3','0','0','0','0.01','','2015080316371900001172844442'),
('5','wechat','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','4','0.01','0','ewei_shopping','a:1:{s:4:\"acid\";i:3;}','3','0','0','0','0.01','','2015080316400800001144163484'),
('6','wechat','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','7','1.01','1','ewei_shopping','a:2:{s:4:\"acid\";i:3;s:14:\"transaction_id\";s:28:\"1005120956201509070810701939\";}','3','0','0','0','1.01','','2015090713312000001164462166'),
('9','wechat','3','oqCObuH6aFYMoynjvqV21PmoTgl8','8','1.01','0','ewei_shopping','a:1:{s:4:\"acid\";i:3;}','3','0','0','0','1.01','','2015090714284500001122729099');


DROP TABLE IF EXISTS ims_core_performance;
CREATE TABLE `ims_core_performance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `runurl` varchar(512) NOT NULL,
  `runsql` varchar(512) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_core_queue;
CREATE TABLE `ims_core_queue` (
  `qid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `message` varchar(2000) NOT NULL DEFAULT '',
  `params` varchar(1000) NOT NULL DEFAULT '',
  `keyword` varchar(1000) NOT NULL DEFAULT '',
  `response` varchar(2000) NOT NULL DEFAULT '',
  `module` varchar(50) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

INSERT INTO ims_core_queue VALUES 
('127','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuPns7fEEmQXr1DJpyozkoa8\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442385053\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuPns7fEEmQXr1DJpyozkoa8\";s:10:\"createtime\";s:10:\"1442385053\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuPns7fEEmQXr1DJpyozkoa8\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442385053','1'),
('126','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442356602\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";s:10:\"createtime\";s:10:\"1442356602\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442356602','1'),
('125','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442356579\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";s:10:\"createtime\";s:10:\"1442356579\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442356579','1'),
('124','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442301519\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";s:10:\"createtime\";s:10:\"1442301519\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442301519','1'),
('123','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442301467\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";s:10:\"createtime\";s:10:\"1442301467\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442301467','1'),
('122','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuHeWGVRJU0JXw3vvGsA-hkA\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442293710\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuHeWGVRJU0JXw3vvGsA-hkA\";s:10:\"createtime\";s:10:\"1442293710\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuHeWGVRJU0JXw3vvGsA-hkA\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442293710','1'),
('121','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBGwerLt0edPc-mEpjmDgk\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442252384\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBGwerLt0edPc-mEpjmDgk\";s:10:\"createtime\";s:10:\"1442252384\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBGwerLt0edPc-mEpjmDgk\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442252384','1'),
('120','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuKllTBRBJZpUj6_8YcR8fCU\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442217030\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuKllTBRBJZpUj6_8YcR8fCU\";s:10:\"createtime\";s:10:\"1442217030\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuKllTBRBJZpUj6_8YcR8fCU\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442217030','1'),
('119','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442138352\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";s:10:\"createtime\";s:10:\"1442138352\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442138352','1'),
('118','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442138339\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";s:10:\"createtime\";s:10:\"1442138339\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442138339','1'),
('117','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442105336\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";s:10:\"createtime\";s:10:\"1442105336\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442105336','1'),
('116','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442105312\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";s:10:\"createtime\";s:10:\"1442105312\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442105312','1'),
('115','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442044118\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442044118\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442044118','1'),
('114','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043912\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043912\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043912','1'),
('113','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043907\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043907\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043907','1'),
('112','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043814\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043814\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043814','1'),
('111','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043785\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043785\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043785','1'),
('110','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043771\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043771\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043771','1'),
('109','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043732\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043732\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043732','1'),
('108','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1442043704\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:10:\"createtime\";s:10:\"1442043704\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1442043704','1'),
('107','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuLdkV_iKpftyachBOkaRTxU\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441981919\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuLdkV_iKpftyachBOkaRTxU\";s:10:\"createtime\";s:10:\"1441981919\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuLdkV_iKpftyachBOkaRTxU\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441981919','1'),
('106','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441979595\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";s:10:\"createtime\";s:10:\"1441979595\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441979595','1'),
('104','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuPA9O-zskPEjzVzMU8JfezM\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441970847\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuPA9O-zskPEjzVzMU8JfezM\";s:10:\"createtime\";s:10:\"1441970847\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuPA9O-zskPEjzVzMU8JfezM\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441970847','1'),
('105','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441979581\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";s:10:\"createtime\";s:10:\"1441979581\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441979581','1'),
('103','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441954732\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:10:\"createtime\";s:10:\"1441954732\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441954732','1'),
('101','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441954704\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:10:\"createtime\";s:10:\"1441954704\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441954704','1'),
('102','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441954714\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:10:\"createtime\";s:10:\"1441954714\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441954714','1'),
('100','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441929645\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";s:10:\"createtime\";s:10:\"1441929645\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441929645','1'),
('98','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuLSDyD6u7ZVnHhVQ8X1WZOM\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441906782\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuLSDyD6u7ZVnHhVQ8X1WZOM\";s:10:\"createtime\";s:10:\"1441906782\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuLSDyD6u7ZVnHhVQ8X1WZOM\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441906782','1'),
('99','3','3','a:14:{s:4:\"from\";s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";s:2:\"to\";s:15:\"gh_5013f37369ce\";s:4:\"time\";s:10:\"1441929614\";s:4:\"type\";s:4:\"text\";s:5:\"event\";s:4:\"VIEW\";s:10:\"tousername\";s:15:\"gh_5013f37369ce\";s:12:\"fromusername\";s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";s:10:\"createtime\";s:10:\"1441929614\";s:7:\"msgtype\";s:5:\"event\";s:8:\"eventkey\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:7:\"content\";s:12:\"欢迎关注\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";}','a:3:{s:6:\"module\";s:5:\"basic\";s:4:\"rule\";s:2:\"12\";s:8:\"priority\";s:1:\"0\";}','a:8:{s:2:\"id\";s:2:\"19\";s:3:\"rid\";s:2:\"12\";s:7:\"uniacid\";s:1:\"3\";s:6:\"module\";s:5:\"basic\";s:7:\"content\";s:12:\"欢迎关注\";s:4:\"type\";s:1:\"1\";s:12:\"displayorder\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}','a:4:{s:12:\"FromUserName\";s:15:\"gh_5013f37369ce\";s:10:\"ToUserName\";s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";s:7:\"MsgType\";s:4:\"text\";s:7:\"Content\";s:212:\"您好，我是欧歌','basic','1441929614','1');


DROP TABLE IF EXISTS ims_core_resource;
CREATE TABLE `ims_core_resource` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `trunk` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `acid` (`uniacid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_core_sessions;
CREATE TABLE `ims_core_sessions` (
  `sid` char(32) NOT NULL DEFAULT '',
  `uniacid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `data` varchar(5000) NOT NULL,
  `expiretime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ims_core_sessions VALUES 
('a991669fb8cbf838cb47613e7df72bd7','3','oqCObuPns7fEEmQXr1DJpyozkoa8','openid|s:28:\"oqCObuPns7fEEmQXr1DJpyozkoa8\";','1442388689'),
('5dedf5b6e3885f9abaca940234f6736f','3','oqCObuCT7VYAROXc20DFhn8yf-e0','openid|s:28:\"oqCObuCT7VYAROXc20DFhn8yf-e0\";','1442360236'),
('a3c024d6e0d6b4c64f72077560214369','3','oqCObuAsSIR64leNzP9KyQwnFTiw','openid|s:28:\"oqCObuAsSIR64leNzP9KyQwnFTiw\";','1442312046'),
('33279bbfb6a9d01ce7f8c47b22f015f0','3','oqCObuCH72CaL8zrlCeknDPfeq2c','openid|s:28:\"oqCObuCH72CaL8zrlCeknDPfeq2c\";','1442326408'),
('bd783db1a03536d84b76dee4605513a7','3','oqCObuNSFAGznsTqKUem0nQtWdKs','openid|s:28:\"oqCObuNSFAGznsTqKUem0nQtWdKs\";','1442305155'),
('b8a2f379f6a969f2cc914dcb34fcb03a','3','oqCObuKLIrOrwM5Jz6kAyP9_hgZY','openid|s:28:\"oqCObuKLIrOrwM5Jz6kAyP9_hgZY\";','1442305150'),
('3c5a299bf341b78329670cdbde2a5740','3','oqCObuHeWGVRJU0JXw3vvGsA-hkA','openid|s:28:\"oqCObuHeWGVRJU0JXw3vvGsA-hkA\";','1442297341'),
('586140d6361b917b47543cc5f3db87b0','3','oqCObuIBGwerLt0edPc-mEpjmDgk','openid|s:28:\"oqCObuIBGwerLt0edPc-mEpjmDgk\";','1442256012'),
('7553835060c9669acf72a64ca2582737','3','oqCObuKllTBRBJZpUj6_8YcR8fCU','openid|s:28:\"oqCObuKllTBRBJZpUj6_8YcR8fCU\";','1442220658'),
('109bf3b10adf21c3a46c9365314a66c9','3','oqCObuKqlFZaWfyF0gSADNDlo0Xs','openid|s:28:\"oqCObuKqlFZaWfyF0gSADNDlo0Xs\";','1442141973'),
('487bc00c471d8f5003683ed0b16e6a93','3','oqCObuMmFxQZqSPNWcTo_IMyijYw','openid|s:28:\"oqCObuMmFxQZqSPNWcTo_IMyijYw\";','1442116469'),
('05c2737271a1fdfbd6581f308798cc44','3','oqCObuA61kN6DZZTqk_edzJCVuPc','openid|s:28:\"oqCObuA61kN6DZZTqk_edzJCVuPc\";','1442108958'),
('fb3ac09d4dbf721bb02262666c96781d','3','oqCObuIBTJn_ptCtKvmYf_E08B8s','openid|s:28:\"oqCObuIBTJn_ptCtKvmYf_E08B8s\";','1442047732'),
('225ba05bbf75d3d2725cacda3aad8600','3','oqCObuOGmtDloUjNwxpnz1CSnFjY','openid|s:28:\"oqCObuOGmtDloUjNwxpnz1CSnFjY\";','1442046075'),
('7f8fb68d65e53cebadb8d6336310b5ba','3','oqCObuOiQh0pBwF65HcqgKOG7BTg','openid|s:28:\"oqCObuOiQh0pBwF65HcqgKOG7BTg\";','1442037128'),
('ccb0d7cb14e69d9195800af1983906f3','3','oqCObuLdkV_iKpftyachBOkaRTxU','openid|s:28:\"oqCObuLdkV_iKpftyachBOkaRTxU\";','1441985529'),
('cde0129b3867d089230af54216023564','3','oqCObuG49eLbr3vaBZGRUpD3O5XA','openid|s:28:\"oqCObuG49eLbr3vaBZGRUpD3O5XA\";','1441983206'),
('9e593749c006c9a69abf845969159222','3','oqCObuPA9O-zskPEjzVzMU8JfezM','openid|s:28:\"oqCObuPA9O-zskPEjzVzMU8JfezM\";','1441974457'),
('03f212be5a09ce97ea2b637e759fc107','3','oqCObuJyX1cw_N3CkKgmg-KBLdQA','openid|s:28:\"oqCObuJyX1cw_N3CkKgmg-KBLdQA\";','1441933252'),
('e36d1c7c33f3909e0d6767e280f1db0e','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','openid|s:28:\"oqCObuLSDyD6u7ZVnHhVQ8X1WZOM\";','1441910390'),
('b31695e4ef1a6d052d68e2ca0b3e78a5','3','oqCObuGsJq1vMC1T2rR5rO4Xg3kI','openid|s:28:\"oqCObuGsJq1vMC1T2rR5rO4Xg3kI\";','1441874176'),
('0123e20454edecc99d8364bae52a09e3','3','oqCObuDil4dT3MXwtvK7uMNbzLg8','openid|s:28:\"oqCObuDil4dT3MXwtvK7uMNbzLg8\";','1441813984'),
('8c2a24615a812ef0745c8c436f84f004','3','oqCObuG7mksym3J-6qmQ2FgT5WiU','openid|s:28:\"oqCObuG7mksym3J-6qmQ2FgT5WiU\";','1441805247'),
('2e763482d886718cd7008fe66396b342','3','oqCObuIhoF9NnKmElDXzQpg5zv2s','openid|s:28:\"oqCObuIhoF9NnKmElDXzQpg5zv2s\";','1441780184'),
('57bb9b3b7b2801a51c03a6ddf0051808','3','oqCObuPY0Q-sVJO4UAaU9fcDlIZc','openid|s:28:\"oqCObuPY0Q-sVJO4UAaU9fcDlIZc\";','1441729596'),
('6130dc4d2beea36283c17245be182f76','3','14.23.120.91','acid|s:1:\"3\";uniacid|i:3;token|a:1:{s:8:\"Pk4Y46vy\";i:1441702984;}openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";uid|s:2:\"49\";','1441706584'),
('6c02f3eb5864179d3fd50029c0b71a9e','3','14.23.120.91','acid|i:3;uniacid|i:3;token|a:5:{s:8:\"x070H06L\";i:1441702981;s:8:\"AazN6fit\";i:1441702982;s:8:\"mufDp9Dc\";i:1441702985;s:8:\"KJ5f5CeS\";i:1441702985;s:8:\"wpp77fzL\";i:1441702995;}openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";uid|s:2:\"49\";','1441706595'),
('2f332ee1b0ebd0b8cc8abbbbf81af1b0','3','oqCObuDMopXr9RyOVylgJlH3kuT8','openid|s:28:\"oqCObuDMopXr9RyOVylgJlH3kuT8\";','1441685198'),
('e5ff4d769c2abd787523cbf1b69a7d7a','3','oqCObuA0XgWMi5Rp-Bpz0X2JJU0o','openid|s:28:\"oqCObuA0XgWMi5Rp-Bpz0X2JJU0o\";','1441958341'),
('21041cc4afec99bd870d38eadc67ca2a','3','oqCObuI028lhaemMbyEyDJ4kqawc','openid|s:28:\"oqCObuI028lhaemMbyEyDJ4kqawc\";','1441630873'),
('385d7151b7c107d9e6944e40abe5d63a','3','oqCObuLOU2ZxifbeP0UXcjXMqYn0','openid|s:28:\"oqCObuLOU2ZxifbeP0UXcjXMqYn0\";','1441621163'),
('cb1279861f96654d3597c7643f615fe0','3','101.226.89.123','acid|s:1:\"3\";uniacid|i:3;token|a:1:{s:8:\"p8QKXsxU\";i:1441608135;}','1441611735'),
('34c2841216291961604f366ec2d165c9','3','180.153.214.191','acid|s:1:\"3\";uniacid|i:3;token|a:1:{s:8:\"f59HHu2w\";i:1441608135;}','1441611735'),
('52db8f82f73b21d3fdab040b5fa33236','3','101.226.89.119','acid|i:3;uniacid|i:3;token|a:2:{s:8:\"TbK7Ch9U\";i:1441608122;s:8:\"W3s73Ny0\";i:1441608122;}','1441611722'),
('ae51dad8aef40107d71ecfd606fd412e','3','101.226.33.208','acid|s:1:\"3\";uniacid|i:3;token|a:1:{s:8:\"gDQnlOOk\";i:1441606710;}','1441610310'),
('c967584e9c249df423cd6d8855fce12b','3','14.23.120.91','acid|i:3;uniacid|i:3;token|a:2:{s:8:\"Cp94WrP9\";i:1441606534;s:8:\"TB38AyOp\";i:1441606535;}dest_url|s:48:\"aT0zJmM9ZW50cnkmZG89bGlzdCZtPWV3ZWlfc2hvcHBpbmc=\";oauth_openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";oauth_acid|s:1:\"3\";openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";','1441610135'),
('a6c720aef5f09a6c67ba0851570f9507','3','180.153.214.181','acid|i:3;uniacid|i:3;token|a:2:{s:8:\"zi7Y7qk4\";i:1441606417;s:8:\"b5gotV7v\";i:1441606417;}','1441610017'),
('3a08fa261e2cf06289c10bfa972322bb','3','180.153.206.19','acid|i:3;uniacid|i:3;token|a:2:{s:8:\"d1BeGnFl\";i:1441606336;s:8:\"OPIWF1sY\";i:1441606336;}','1441609936'),
('0ed1d928c2acc07502dca249a32b6273','3','101.226.33.217','acid|i:3;uniacid|i:3;token|a:2:{s:8:\"mdJ9xxZc\";i:1441606331;s:8:\"SWX5GNZS\";i:1441606331;}','1441609931'),
('6cdcc499cc140cdf15584d95ab2888fc','3','180.153.201.217','acid|s:1:\"3\";uniacid|i:3;token|a:1:{s:8:\"bdH0dqbh\";i:1441606320;}','1441609920'),
('7c96db97271b8e871f2fd2fa0ec63166','3','14.16.247.144','acid|i:3;uniacid|i:3;token|a:28:{s:8:\"uGGCYEAq\";i:1441603814;s:8:\"WiMB8MB8\";i:1441603815;s:8:\"qrMrZMR1\";i:1441603816;s:8:\"B4kDRepK\";i:1441603816;s:8:\"kif6olah\";i:1441603823;s:8:\"ovEi8EV6\";i:1441603835;s:8:\"XZl70W9w\";i:1441603871;s:8:\"A9nPRPzz\";i:1441603874;s:8:\"Ez433D3g\";i:1441603874;s:8:\"P26LNOw8\";i:1441603880;s:8:\"e3faanfn\";i:1441603880;s:8:\"MLk3UO3U\";i:1441603895;s:8:\"zQ41bmiG\";i:1441603895;s:8:\"rOKm5515\";i:1441603898;s:8:\"WHEL4LH2\";i:1441603898;s:8:\"PZkhh355\";i:1441603903;s:8:\"E7b4CA7p\";i:1441603903;s:8:\"yufNfdND\";i:1441603914;s:8:\"H2hsz3GS\";i:1441603914;s:8:\"HxKh5Fkt\";i:1441603923;s:8:\"jY2bJVsv\";i:1441603923;s:8:\"O8Zue5zw\";i:1441603926;s:8:\"SUjKKjGf\";i:1441603927;s:8:\"Ou956jPv\";i:1441603930;s:8:\"RtTJzBe7\";i:1441603930;s:8:\"zFP1Kp2o\";i:1441603939;s:8:\"P6U585pV\";i:1441603939;s:8:\"haBM9vya\";i:1441604112;}dest_url|s:56:\"aT0zJmM9ZW50cnkmaWQ9MSZkbz1kZXRhaWwmbT1ld2VpX3Nob3BwaW5n\";oauth_openid|s:28:\"oqCObuLSDyD6u7ZVnHhVQ8X1WZOM\";oauth_acid|s:1:\"3\";openid|s:28:\"oqCObuLSDyD6u7ZVnHhVQ8X1WZOM\";uid|s:1:\"3\";','1441607712'),
('6ed255ec25dda4505284e1cd5e65734f','3','oqCObuH6aFYMoynjvqV21PmoTgl8','openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";','1441609507'),
('18fa9255a82135e9224aed03fc620f9d','3','14.23.120.91','acid|i:3;uniacid|i:3;token|a:54:{s:8:\"Hr88Rr3z\";i:1441605496;s:8:\"FAz2fBwU\";i:1441605497;s:8:\"vCBoO434\";i:1441605497;s:8:\"rP54MEpp\";i:1441605500;s:8:\"JdvDE2yY\";i:1441605508;s:8:\"cFiJ227T\";i:1441605508;s:8:\"RxDz084R\";i:1441605510;s:8:\"ktEePeGH\";i:1441605510;s:8:\"TIhHrEv6\";i:1441605519;s:8:\"Yw2bvBiJ\";i:1441605519;s:8:\"XRFQ64oz\";i:1441605523;s:8:\"jh5nH1VU\";i:1441605523;s:8:\"Kn5OpC5N\";i:1441605556;s:8:\"mpj66qvg\";i:1441605557;s:8:\"Zz55Zy61\";i:1441605559;s:8:\"BgGjzslq\";i:1441605562;s:8:\"q1vV1r0o\";i:1441605562;s:8:\"Y7X57hzj\";i:1441605571;s:8:\"n4fsRRz5\";i:1441605571;s:8:\"srCO0H0o\";i:1441605593;s:8:\"SOB10wW5\";i:1441605594;s:8:\"wBrgN22F\";i:1441605597;s:8:\"S73bH0gc\";i:1441605597;s:8:\"H8C162Hr\";i:1441605600;s:8:\"tJ0eZr0T\";i:1441605601;s:8:\"saOa4A6A\";i:1441605895;s:8:\"gKuUKqNN\";i:1441605895;s:8:\"m3V3zjYE\";i:1441605899;s:8:\"k55z6068\";i:1441605899;s:8:\"L0GizKZY\";i:1441605899;s:8:\"MCrStSo6\";i:1441605899;s:8:\"iHUTA6t2\";i:1441605900;s:8:\"Z7XZ7t90\";i:1441605900;s:8:\"kN5aKaAD\";i:1441606618;s:8:\"TLcn8NHM\";i:1441606618;s:8:\"raLZ6nTn\";i:1441606620;s:8:\"VI4liLPI\";i:1441606620;s:8:\"s99Xh81B\";i:1441607233;s:8:\"OupNgvM2\";i:1441607234;s:8:\"u25Rf2Eh\";i:1441607250;s:8:\"vrFbUTmT\";i:1441607251;s:8:\"e3IkZWY3\";i:1441607289;s:8:\"bqOKy5QM\";i:1441607289;s:8:\"xbSuNhRG\";i:1441607305;s:8:\"nx80IIH8\";i:1441607305;s:8:\"zqq0DDfB\";i:1441607308;s:8:\"CBTq27aW\";i:1441607308;s:8:\"Z3BZbY22\";i:1441607310;s:8:\"S1Smw1F8\";i:1441607310;s:8:\"DWSv66mz\";i:1441607319;s:8:\"mT1h6SH7\";i:1441607319;s:8:\"b91LFl2l\";i:1441607319;s:8:\"O2SK9Xsa\";i:1441607325;s:8:\"fKd2jwdn\";i:1441607326;}openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";uid|s:2:\"49\";','1441610926'),
('687771c848b14af57077475421e8d7d5','3','14.23.120.91','acid|s:1:\"3\";uniacid|i:3;token|a:1:{s:8:\"oxFwW7sN\";i:1441605498;}openid|s:28:\"oqCObuH6aFYMoynjvqV21PmoTgl8\";uid|s:2:\"49\";','1441609098');


DROP TABLE IF EXISTS ims_core_settings;
CREATE TABLE `ims_core_settings` (
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ims_core_settings VALUES 
('authmode','i:1;'),
('close','a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}'),
('register','a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}'),
('site','a:2:{s:3:\"key\";s:5:\"27201\";s:5:\"token\";s:32:\"af1cd72375b6bcb3444ecce59159f724\";}'),
('copyright','a:20:{s:6:\"status\";s:1:\"1\";s:6:\"reason\";s:3:\"要\";s:8:\"sitename\";s:0:\"\";s:3:\"url\";s:7:\"http://\";s:8:\"statcode\";s:0:\"\";s:10:\"footerleft\";s:0:\"\";s:11:\"footerright\";s:0:\"\";s:4:\"icon\";s:0:\"\";s:5:\"flogo\";s:0:\"\";s:5:\"blogo\";s:0:\"\";s:8:\"baidumap\";a:2:{s:3:\"lng\";s:0:\"\";s:3:\"lat\";s:0:\"\";}s:7:\"company\";s:0:\"\";s:7:\"address\";s:0:\"\";s:6:\"person\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:2:\"qq\";s:0:\"\";s:5:\"email\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"showhomepage\";i:0;}'),
('platform','a:4:{s:5:\"token\";s:32:\"Xwr964EMSlw4A5BAK4mWURk14rw1e156\";s:14:\"encodingaeskey\";s:43:\"QdQb1VuUBdl1ozlsevUDvml2MC8dlrunnVLoN2mvrZB\";s:9:\"appsecret\";s:0:\"\";s:5:\"appid\";s:0:\"\";}');


DROP TABLE IF EXISTS ims_core_wechats_attachment;
CREATE TABLE `ims_core_wechats_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `media_id` varchar(255) NOT NULL,
  `type` varchar(15) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `model` varchar(25) NOT NULL,
  `tag` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `media_id` (`media_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_coupon;
CREATE TABLE `ims_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `logo_url` varchar(150) NOT NULL,
  `code_type` tinyint(3) unsigned NOT NULL,
  `brand_name` varchar(15) NOT NULL,
  `title` varchar(15) NOT NULL,
  `sub_title` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `notice` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_info` varchar(200) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `location_id_list` varchar(1000) NOT NULL,
  `use_custom_code` tinyint(3) NOT NULL,
  `bind_openid` tinyint(3) unsigned NOT NULL,
  `can_share` tinyint(3) unsigned NOT NULL,
  `can_give_friend` tinyint(3) unsigned NOT NULL,
  `get_limit` tinyint(3) unsigned NOT NULL,
  `service_phone` varchar(20) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `source` varchar(20) NOT NULL,
  `url_name_type` varchar(20) NOT NULL,
  `custom_url` varchar(100) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_coupon_location;
CREATE TABLE `ims_coupon_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_coupon_modules;
CREATE TABLE `ims_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `card_id` (`card_id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_coupon_record;
CREATE TABLE `ims_coupon_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `outer_id` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `friend_openid` varchar(50) NOT NULL,
  `givebyfriend` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) NOT NULL,
  `clerk_name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `outer_id` (`outer_id`),
  KEY `card_id` (`card_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_coupon_setting;
CREATE TABLE `ims_coupon_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) NOT NULL,
  `logourl` varchar(150) NOT NULL,
  `whitelist` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_cover_reply;
CREATE TABLE `ims_cover_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL DEFAULT '0',
  `rid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL DEFAULT '',
  `do` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ims_cover_reply VALUES 
('1','1','0','7','mc','','个人中心入口设置','','','./index.php?c=mc&a=home&i=1'),
('2','1','1','8','site','','微擎团队入口设置','','','./index.php?c=home&i=1&t=1'),
('3','3','0','11','ewei_shopping','list','商城入口设置','','','./index.php?i=3&c=entry&do=list&m=ewei_shopping');


DROP TABLE IF EXISTS ims_custom_reply;
CREATE TABLE `ims_custom_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `start1` int(10) NOT NULL DEFAULT '-1',
  `end1` int(10) NOT NULL DEFAULT '-1',
  `start2` int(10) NOT NULL DEFAULT '-1',
  `end2` int(10) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_course;
CREATE TABLE `ims_ewei_exam_course` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `pcate` int(11) DEFAULT '0',
  `ccate` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '' COMMENT '课程标题',
  `ctype` int(11) DEFAULT '0' COMMENT '0 时间限制 1 人数限制',
  `starttime` int(11) DEFAULT '0' COMMENT '报名开始时间',
  `endtime` int(11) DEFAULT '0' COMMENT '报名截止时间',
  `ctotal` int(11) DEFAULT '0' COMMENT '报名人数限制',
  `description` text,
  `content` text,
  `thumb` varchar(255) DEFAULT '',
  `viewnum` int(11) DEFAULT '0' COMMENT '访问人数',
  `fansnum` int(11) DEFAULT '0' COMMENT '报名人数',
  `teachers` text COMMENT '授课讲师',
  `coursetime` int(11) DEFAULT '0' COMMENT '开始时间',
  `times` int(11) DEFAULT '0' COMMENT '授课时长',
  `week` int(11) DEFAULT '0' COMMENT '第几期',
  `address` text,
  `location_p` varchar(255) DEFAULT NULL,
  `location_c` varchar(255) DEFAULT NULL,
  `location_a` varchar(255) DEFAULT NULL,
  `lng` decimal(18,10) NOT NULL DEFAULT '0.0000000000',
  `lat` decimal(18,10) NOT NULL DEFAULT '0.0000000000',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0' COMMENT '题目排序',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`),
  KEY `idx_pcate` (`ccate`),
  KEY `idx_ccate` (`ccate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_course_category;
CREATE TABLE `ims_ewei_exam_course_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `parentid` int(11) DEFAULT '0',
  `cname` varchar(255) DEFAULT '',
  `description` text COMMENT '描述',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`),
  KEY `idx_parentid` (`parentid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_course_reserve;
CREATE TABLE `ims_ewei_exam_course_reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `courseid` int(11) DEFAULT '0',
  `memberid` int(11) DEFAULT '0',
  `times` int(11) DEFAULT '0' COMMENT '用时',
  `createtime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `username` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `ordersn` varchar(255) DEFAULT '',
  `msg` text,
  `mngtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`memberid`),
  KEY `idx_weid` (`weid`),
  KEY `idx_paperid` (`courseid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;



DROP TABLE IF EXISTS ims_ewei_exam_member;
CREATE TABLE `ims_ewei_exam_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `from_user` varchar(50) DEFAULT '',
  `userid` varchar(255) DEFAULT '',
  `username` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_paper;
CREATE TABLE `ims_ewei_exam_paper` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `pcate` int(11) DEFAULT '0',
  `ccate` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '' COMMENT '试卷标题',
  `level` int(11) DEFAULT '0' COMMENT '难度',
  `score` int(11) DEFAULT '0' COMMENT '分值',
  `description` text,
  `thumb` varchar(255) DEFAULT '',
  `year` int(11) DEFAULT '0' COMMENT '年份',
  `viewnum` int(11) DEFAULT '0' COMMENT '访问人数',
  `fansnum` int(11) DEFAULT '0' COMMENT '考试人数',
  `times` int(11) DEFAULT '0' COMMENT '时间限制 0不限制',
  `types` varchar(5) DEFAULT NULL COMMENT '考题类型选择 例如 11111 包含5种题型',
  `avscore` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '平均分',
  `avtimes` int(11) NOT NULL DEFAULT '0' COMMENT '平均用时',
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '考题类型id',
  `status` tinyint(1) DEFAULT '0',
  `isfull` tinyint(1) NOT NULL DEFAULT '0' COMMENT '试题是否完整1完整0不完整',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`),
  KEY `idx_pcate` (`ccate`),
  KEY `idx_ccate` (`ccate`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_paper_category;
CREATE TABLE `ims_ewei_exam_paper_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `parentid` int(11) DEFAULT '0',
  `cname` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `description` text COMMENT '描述',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`),
  KEY `idx_parentid` (`parentid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_paper_member_data;
CREATE TABLE `ims_ewei_exam_paper_member_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `paperid` int(11) DEFAULT '0',
  `memberid` int(11) DEFAULT '0',
  `recordid` int(11) DEFAULT '0' COMMENT '学员考试记录id',
  `questionid` int(11) NOT NULL DEFAULT '0',
  `answer` text,
  `times` int(11) DEFAULT '0' COMMENT '单题用时',
  `createtime` int(11) DEFAULT '0',
  `isright` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否回答正确',
  `type` int(11) DEFAULT '0' COMMENT '1 判断 2单选 3多选 4 填空  5 解答',
  `pageid` int(11) NOT NULL DEFAULT '0' COMMENT '顺序id',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`),
  KEY `idx_memberid` (`memberid`),
  KEY `idx_paperid` (`paperid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_paper_member_record;
CREATE TABLE `ims_ewei_exam_paper_member_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `paperid` int(11) DEFAULT '0',
  `memberid` int(11) DEFAULT '0',
  `times` int(11) DEFAULT '0' COMMENT '用时',
  `countdown` int(11) DEFAULT '0' COMMENT '倒计时',
  `score` decimal(10,2) DEFAULT '0.00' COMMENT '得分',
  `did` int(11) DEFAULT '0' COMMENT '是否完成考试',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`memberid`),
  KEY `idx_weid` (`weid`),
  KEY `idx_paperid` (`paperid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_paper_question;
CREATE TABLE `ims_ewei_exam_paper_question` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `questionid` int(11) DEFAULT '0' COMMENT '题ID',
  `displayorder` int(11) DEFAULT '0' COMMENT '题目排序',
  `paperid` bigint(20) NOT NULL DEFAULT '0' COMMENT '试卷ID',
  PRIMARY KEY (`id`),
  KEY `idx_questionid` (`questionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_paper_type;
CREATE TABLE `ims_ewei_exam_paper_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `title` varchar(255) DEFAULT '' COMMENT '试卷标题',
  `score` decimal(10,2) DEFAULT '0.00' COMMENT '分值',
  `types` text COMMENT '试题类型设置 包含试题类型 试题分数',
  `times` int(11) NOT NULL DEFAULT '0' COMMENT '考试时间',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_pool;
CREATE TABLE `ims_ewei_exam_pool` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  `description` text COMMENT '描述',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_question;
CREATE TABLE `ims_ewei_exam_question` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `poolid` int(11) DEFAULT '0' COMMENT '题库ID',
  `paperid1` int(11) DEFAULT '0' COMMENT '题库ID',
  `type` int(11) DEFAULT '0' COMMENT '1 判断 2单选 3多选 4 填空  5 解答',
  `level` int(11) DEFAULT '0' COMMENT '难度',
  `question` text COMMENT '问题',
  `thumb` varchar(255) DEFAULT '' COMMENT '问题图片',
  `answer` text COMMENT '答案',
  `isimg` tinyint(1) DEFAULT '0' COMMENT '答案是否包含图片',
  `explain` text COMMENT '讲解',
  `fansnum` int(11) DEFAULT '0' COMMENT '多少人做过',
  `correctnum` int(11) DEFAULT '0' COMMENT '多少人正确',
  `items` text,
  `img_items` text,
  PRIMARY KEY (`id`),
  KEY `idx_poolid` (`poolid`),
  KEY `idx_type` (`type`),
  KEY `idx_weid` (`weid`),
  KEY `idx_paperid` (`paperid1`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_reply;
CREATE TABLE `ims_ewei_exam_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT '0',
  `weid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `paperid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_rid` (`rid`),
  KEY `idx_weid` (`weid`),
  KEY `idx_paperid` (`paperid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_ewei_exam_sysset;
CREATE TABLE `ims_ewei_exam_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `classopen` int(11) DEFAULT '1',
  `login_flag` tinyint(1) DEFAULT '0' COMMENT '是否开启登录',
  `about` text COMMENT '帮助',
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_heka_list;
CREATE TABLE `ims_heka_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT NULL,
  `rid` int(10) unsigned NOT NULL COMMENT '规则ID',
  `title` varchar(50) DEFAULT NULL,
  `card` varchar(20) NOT NULL COMMENT '活动图片',
  `author` varchar(20) DEFAULT NULL,
  `content` varchar(500) NOT NULL COMMENT '活动描述',
  `cardName` varchar(50) DEFAULT NULL,
  `from_user` varchar(50) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `share` int(11) DEFAULT NULL,
  `create_time` int(10) NOT NULL COMMENT '规则',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_heka_reply;
CREATE TABLE `ims_heka_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL COMMENT '规则ID',
  `title` varchar(50) DEFAULT NULL,
  `picture` varchar(100) NOT NULL COMMENT '活动图片',
  `description` varchar(200) NOT NULL COMMENT '活动描述',
  `create_time` int(10) NOT NULL COMMENT '规则',
  PRIMARY KEY (`id`),
  KEY `idx_rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_images_reply;
CREATE TABLE `ims_images_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `mediaid` varchar(255) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_card;
CREATE TABLE `ims_mc_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `color` varchar(255) NOT NULL DEFAULT '',
  `background` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `format` varchar(50) NOT NULL DEFAULT '',
  `fields` varchar(1000) NOT NULL DEFAULT '',
  `snpos` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `business` text NOT NULL,
  `description` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_card_members;
CREATE TABLE `ims_mc_card_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `cid` int(10) NOT NULL DEFAULT '0',
  `cardsn` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_chats_record;
CREATE TABLE `ims_mc_chats_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `flag` tinyint(3) unsigned NOT NULL,
  `openid` varchar(32) NOT NULL,
  `msgtype` varchar(15) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `openid` (`openid`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_credits_recharge;
CREATE TABLE `ims_mc_credits_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `tid` varchar(20) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid_uid` (`uniacid`,`uid`),
  KEY `idx_tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_credits_record;
CREATE TABLE `ims_mc_credits_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(11) NOT NULL,
  `credittype` varchar(10) NOT NULL DEFAULT '',
  `num` decimal(10,2) NOT NULL,
  `operator` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `remark` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_credits_record VALUES 
('1','3','3','credit2','0.01','1','1438590393','微商城取消订单退款说明'),
('2','3','3','credit2','0.01','1','1438591179','微商城取消订单退款说明');


DROP TABLE IF EXISTS ims_mc_fans_groups;
CREATE TABLE `ims_mc_fans_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `acid` int(10) unsigned NOT NULL DEFAULT '0',
  `groups` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_fans_groups VALUES 
('1','3','3','a:3:{i:0;a:3:{s:2:\"id\";i:0;s:4:\"name\";s:9:\"未分组\";s:5:\"count\";i:9;}i:1;a:3:{s:2:\"id\";i:1;s:4:\"name\";s:9:\"黑名单\";s:5:\"count\";i:0;}i:2;a:3:{s:2:\"id\";i:2;s:4:\"name\";s:9:\"星标组\";s:5:\"count\";i:0;}}');


DROP TABLE IF EXISTS ims_mc_groups;
CREATE TABLE `ims_mc_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(20) NOT NULL DEFAULT '',
  `orderlist` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `isdefault` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_groups VALUES 
('1','1','默认会员组','0','1'),
('2','2','默认会员组','0','1'),
('3','3','默认会员组','0','1');


DROP TABLE IF EXISTS ims_mc_handsel;
CREATE TABLE `ims_mc_handsel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `touid` int(10) unsigned NOT NULL,
  `fromuid` varchar(32) NOT NULL,
  `module` varchar(30) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `action` varchar(20) NOT NULL,
  `credit_value` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`touid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_mapping_fans;
CREATE TABLE `ims_mc_mapping_fans` (
  `fanid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL,
  `salt` char(8) NOT NULL DEFAULT '',
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `followtime` int(10) unsigned NOT NULL,
  `unfollowtime` int(10) unsigned NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `updatetime` int(10) unsigned DEFAULT '0',
  `groupid` int(10) unsigned NOT NULL,
  `nickname` varchar(50) NOT NULL,
  PRIMARY KEY (`fanid`),
  KEY `acid` (`acid`),
  KEY `uniacid` (`uniacid`),
  KEY `openid` (`openid`),
  KEY `updatetime` (`updatetime`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_mapping_fans VALUES 
('1','2','2','1','od9iCuEkcpZ93q0Sk-MLwxJ8FVrc','mS05S7nu','1','1416880940','0','','0','0',''),
('2','2','2','2','od9iCuI4r2zpwISB7DobC47YPheM','jAf3VbMl','1','1416880984','0','','0','0',''),
('3','3','3','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','l1XpoI1R','1','1438333557','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1TFNEeUQ2dTdaVm5IaFZROFgxV1pPTSI7czo4OiJuaWNrbmFtZSI7czo2OiLmrKflk6UiO3M6Mzoic2V4IjtpOjE7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuW5v+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI2OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5aTkxLUDNBMEV3M3FnbXlaMURpYWJWaGg4cVVqZjdaa2RzcEtFRkp0UEJDdzk4V0lCZFJXRHZ2Y0dKZFY1bnV0TUJQY1JRaWFCdU9rMHRiWnRiRktkNVloLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0MzgzMzM1NTc7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVLMC1Td3V0M2NUMDU0elN4dnNTeEFVIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896955','0','欧哥'),
('4','3','3','4','fromUser','gcIJqKpk','1','1438602713','0','','0','0',''),
('5','3','3','5','oqCObuAo197RNNWbmHk0yq5kSMtE','vp1j5bYA','0','0','1438678913','','0','0',''),
('6','3','3','6','oqCObuE2JtFb2nhyS6rtDMWqC9fs','ZxxOFHOS','0','0','1438760215','','0','0',''),
('7','3','3','7','oqCObuDFYaoC0V-EbvglZdflyK8E','ReWo6UpP','0','0','1438844443','YToxMjp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1REZZYW9DMFYtRWJ2Z2xaZGZseUs4RSI7czo4OiJuaWNrbmFtZSI7czo2OiLnjovoirMiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IumVv+ayuyI7czo4OiJwcm92aW5jZSI7czo2OiLlsbHopb8iO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTE5OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZLNjRqd2ljYkgzbWljWFJuYUpGYW5JSFV6ZHE5b2tDMXQ2dFRUaWEzY1pHOTkyMVo2VFJmTHhpYjRaT2JqUXdhWFNUakRVSGM2bm1uMWliQ1EvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQzODg0NDM2ODtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1438844435','0','王芳'),
('8','3','3','8','oqCObuPX5Qs0uytNDdYpwU79rTCE','Fi7zhl5O','1','1439025302','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1UFg1UXMwdXl0TkRkWXB3VTc5clRDRSI7czo4OiJuaWNrbmFtZSI7czo5OiLotLrmoYLlqJ8iO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6Iua5mOilvyI7czo4OiJwcm92aW5jZSI7czo2OiLmuZbljZciO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTMwOiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL2tQZWp4M1NncDl0akZDaWE2WXJaMUgxRUhLRkg5WkRhOXFyYVZZRWhpY0lxYXFwQWNVem5CakF3bFNPNTN1aWJMZ0pUajBJYWliMjFZdm1qYmRLZmljMU9BdmpyZE9PY2c1N2liRi8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDM5MDI1MzAyO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1R1ZPSGpGbGl4V1BsanBnSHRpZ3dYNCI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896893','0','贺桂娟'),
('9','3','3','9','oqCObuOr4WOWNHdnWMHjEhkp6lfE','jwXngZon','1','1439041321','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1T3I0V09XTkhkbldNSGpFaGtwNmxmRSI7czo4OiJuaWNrbmFtZSI7czo5OiLnjovplKbnh5UiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuW5v+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI5OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5ZSTc2TUZ5ZzlqWDEyVDZhRk1qRDFOUno3UVBDT2p6cWtpYUNwaWFON2RxVXRnSlkxSUpYOFpQQ1JpY2pXUGljWFNHWWU1UXU3dGlibVdtUXptNjU5bnF5cW1oLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0MzkwNDEzMjE7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVETU9SWlItNnpLWkJkMl9fYWpvZlpVIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896892','0','王锦燕'),
('10','3','3','10','oqCObuNxyaO1AmdFE4GvkNlZAOq0','dI6YIh4k','1','1439047459','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1Tnh5YU8xQW1kRkU0R3ZrTmxaQU9xMCI7czo4OiJuaWNrbmFtZSI7czoxMzoiQeWFseiQpeWFseS6qyI7czozOiJzZXgiO2k6MTtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6Njoi5bm/5beeIjtzOjg6InByb3ZpbmNlIjtzOjY6IuW5v+S4nCI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMjU6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vRmpDd25UeVozem4wdnc0Z0R4VVhxN1dHZEVudENvY0VTcjVrTWRvSzR1NFdOQ2FDZzlCeFhIb3FBbnR2Q3FBRkYyYjFUeW9tVlhBT1pvSnJCd2licmJlc3NRaHZqRDkzcy8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDM5MDQ3NDU5O3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1Tl94SnpWRHAxSWxhNmVXVTJBc21OdyI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896891','0','A共营共享'),
('11','3','3','11','oqCObuAg0uuy_PpOBOYDAe6NrNus','sOQAQCM7','1','1439171810','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1QWcwdXV5X1BwT0JPWURBZTZOck51cyI7czo4OiJuaWNrbmFtZSI7czoxMjoiQUleX15EZWFy6ZuvIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLojYbpl6giO3M6ODoicHJvdmluY2UiO3M6Njoi5rmW5YyXIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEyOToiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi8wM1hGeDhSM2Y5aWFPdVJEVHhtOXBVbHJDczBVcGFwejBsM1V2TFR5cFhWV1A0cFBoeU1aaWJmMjdzT29Jd2lhaEU0WjFIelZDRXNJUnNkVUNpYTZBNlhBTHZGY0NzaFROS01pYS8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDM5MTcxODEwO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1SlBpLWZObXhJMXZza3loNUdtTDl5MCI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896830','0','AI^_^Dear雯'),
('12','3','3','12','oqCObuKmFmysMw4iIaMSa2hxwH4U','z1P06Pf4','0','0','1439384331','YToxMjp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1S21GbXlzTXc0aUlhTVNhMmh4d0g0VSI7czo4OiJuaWNrbmFtZSI7czoyNToiQeS+neS6uu+8iOe6uee7o+WMu+e+ju+8iSI7czozOiJzZXgiO2k6MjtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6Njoi5ZK45a6BIjtzOjg6InByb3ZpbmNlIjtzOjY6Iua5luWMlyI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMjY6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vQkt0UTFuMURkNkpWQWY3YjVseWZsUnM2WUV1dG82bmxxWHByZThEVWFMOFdWRldoaWFzOXFnTWlhd2Jmb3FMdm96ZTd1ZkFZbDZMM1E5NkRaYXdEcUtub2N5UDA5ZnZLUWEvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQzOTIwMzQzMztzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1439377476','0','A依人（纹绣医美）'),
('13','3','3','13','oqCObuLKFMbEIaP7BwJg_HvTdfN0','k3F1SngC','1','1439219275','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1TEtGTWJFSWFQN0J3SmdfSHZUZGZOMCI7czo4OiJuaWNrbmFtZSI7czoxODoi5bmz5bmz5YW755Sf5Lya6aaGIjtzOjM6InNleCI7aToxO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLlpKflkIwiO3M6ODoicHJvdmluY2UiO3M6Njoi5bGx6KW/IjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEyODoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SlZBZjdiNWx5Zmxkak1XdXBEV0ZlYXRiWnQ3enFPb2ljbWhlblBCVHRZUnY2ZTA1WmljN3F2YWVENHJrbHRRWTZJdjRWUHQyWno3TzA5Y2xpYWs2NkRNaWJNLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0MzkyMTkyNzU7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVNTHZvX21sWGdDZVhWa3JyZFRqZGQ0IjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896828','0','平平养生会馆'),
('14','3','3','14','oqCObuCir1x2HmR_7e_oGhrSDuls','Ir1h12Zm','0','0','1439261165','','0','0',''),
('15','3','3','15','oqCObuHDol51gtS6WCtUxlk1bkmk','x87mjYIb','0','0','1440285143','YToxMjp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SERvbDUxZ3RTNldDdFV4bGsxYmttayI7czo4OiJuaWNrbmFtZSI7czoxMjoi4pie6JGs5rOq4picIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLmsqflt54iO3M6ODoicHJvdmluY2UiO3M6Njoi5rKz5YyXIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEzMjoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SWtiSUs3NmxCakN0aWFTNmliT0taY2lhVHhlRUFFdTNaWHVpYUNwbzhpYmlhTFlSTnU3WkduYk1jUWhtTFU3aWN2bDNLRVRPMkJYS2VseWJBV2JUdmJ0a2liejY3ai8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDM5NDc1MjgyO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1439536529','0','☞葬泪☜'),
('16','3','3','16','oqCObuBml0vEy4jqejc546XgM8CU','AIu3UsyK','1','1439492336','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1Qm1sMHZFeTRqcWVqYzU0NlhnTThDVSI7czo4OiJuaWNrbmFtZSI7czo5OiLpn6bkuIDooYwiO3M6Mzoic2V4IjtpOjA7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuWNl+WugSI7czo4OiJwcm92aW5jZSI7czo2OiLlub/opb8iO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI5OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5ZeFprNGNpYWQ5SHA2Qmg1SjNYYzhMYk1tWWNOR2tIN0J3TDN5SUs0QTlzcmRtaWNKaEw5TkRpY1ZpYUlWRVZQaExMUnlGVWNMQUpCdlNYSkVzdWliQW9CTWg1LzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0Mzk0OTIzMzY7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVQNkdReXpLSkxMLXZvc05ZaG9wYUhZIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896766','0','韦一行'),
('17','3','3','17','oqCObuOeyCughbInZAoxJFhQtuwU','bIemetNZ','1','1438446975','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1T2V5Q3VnaGJJblpBb3hKRmhRdHV3VSI7czo4OiJuaWNrbmFtZSI7czoxMDoiIOWknOm7juOAgiI7czozOiJzZXgiO2k6MjtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6Njoi5aSn5ZCMIjtzOjg6InByb3ZpbmNlIjtzOjY6IuWxseilvyI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMjk6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vRklUME1BOVFSV01pYkxCNGYzZFU1MERpY3h1eTdlcGt4ZnR3RlJpY2FEc3oyMll4UUVIanFsUVpEeUlvYXlqNWRkcFB2ZHZRYTRSaWNyVWljOXhLdENGSHROd0pKYll5bE1IWEwvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQzODQ0Njk3NTtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUJRREsxd3E1UXNXVVRyNHlWMW1KYTgiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896766','0',' 夜黎。'),
('18','3','3','18','oqCObuJrxfdU0O8Q4hoY7FM3PsbA','BRV8tytA','1','1439554960','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SnJ4ZmRVME84UTRob1k3Rk0zUHNiQSI7czo4OiJuaWNrbmFtZSI7czo2OiLojbfmmZMiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6Iuafs+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLlub/opb8iO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI2OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZLSFJzaWI1T2pXMmhiQ2VlUGliY3liSmFHRHQ3ajhCV0dycllkM093UzR3bzdYY0JwVEZnZ1hrQnJ1SnFmM083dVE0STRlZkJCQWpwQTZvUjh5Wll5TmxJLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0Mzk1NTQ5NjA7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVEU1pubVh0eWlLeFJ0cE9QZ2F4SWRJIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896766','0','荷晓'),
('19','3','3','19','oqCObuFTGUiHI9G1famJxlie9KeY','F2vjjJJm','1','1439651037','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RlRHVWlISTlHMWZhbUp4bGllOUtlWSI7czo4OiJuaWNrbmFtZSI7czoyNDoi5Yib5a+M54mp5rWB5LiA5YiY5bCP5aeQIjtzOjM6InNleCI7aToxO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLlub/lt54iO3M6ODoicHJvdmluY2UiO3M6Njoi5bm/5LicIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEyODoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SlFZeTZQdnVyRGV2U3NXS2ZzYzRFNU9xSk5vc3c2N3BTamdQYWlhWFp5UElQZ3NpY0tRUGZiTHBpYkIzaWNGZ0xSVEtHSFlGNncyV202OEdTSEZydDRlU29KLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0Mzk2NTEwMzc7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVQd0ZpM0dUUmhtaE1wb1VRQ1JLVjJvIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896765','0','创富物流一刘小姐'),
('20','3','3','20','oqCObuKTABP6X03YbDnewFZNjDW0','Dly5Ok1v','1','1439829749','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1S1RBQlA2WDAzWWJEbmV3RlpOakRXMCI7czo4OiJuaWNrbmFtZSI7czoxNDoi5bCY5Z+DIC3olofpm4UiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6Iua3seWcsyI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI5OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5hZEJFMTVtSE5pYk5raEhWTHJVT1JER1dLbTRCWWtpY3pnaWJCc3VUN1dMenJvTWljbkN3SlZsWXRLcTAwUTlPaWFEMERZVHpsTTJGYlI5dlBvVWwzVzBjdEVuLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0Mzk4Mjk3NDk7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVKU3k0VGNVT2pRTXotUmZ3eGhMMnJBIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896764','0','尘埃 -薇雅'),
('21','3','3','21','oqCObuKxK8Yz6LMbDf7LWZVt7M6I','CFvb5xKc','1','1439907091','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1S3hLOFl6NkxNYkRmN0xXWlZ0N002SSI7czo4OiJuaWNrbmFtZSI7czoxMjoi576O5aW95Lq655SfIjtzOjM6InNleCI7aTowO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czowOiIiO3M6ODoicHJvdmluY2UiO3M6MDoiIjtzOjc6ImNvdW50cnkiO3M6MDoiIjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEzMDoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9hU1BMaWNUYXdpYzBUd2ttcEV2SXZCODdoZFZ5NnN2YmdOOEpUcWY1TTYxWWhibnRKN2swdGNjMWNEY2N0Wk5yc0FzNmhvUFI1ZmljdW9pYWljalNhSkpaUGtBcElOakEwaWFjbEQvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQzOTkwNzA5MTtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUR0RTNDVmEtTVlyWEtidHpITFU4ODAiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896956','0','美好人生'),
('22','3','3','22','oqCObuGfraUW4_OqaqSr4jzzgFDk','WUv4MZ37','1','1440075543','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1R2ZyYVVXNF9PcWFxU3I0anp6Z0ZEayI7czo4OiJuaWNrbmFtZSI7czoxNDoiQS7oj7LlqIXlrrbnuroiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuiOhueUsCI7czo4OiJwcm92aW5jZSI7czo2OiLnpo/lu7oiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTMxOiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL2FTUExpY1Rhd2ljMFI1aWFpYzRFUW9uSWp0RDRCbjVVSk41VmlhM0NSdlJkWjVpYnNYdURHTGs1cFlhdjZhbXdwSjRweUxNY1NEUGE2eXhqbEc4TmljWlRGOUVqckVqY0ZTaERmWXEvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDA3NTU0MztzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUxiR1ZLN0lTbmVoaGpSZmVuWFBpVHMiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896955','0','A.菲娅家纺'),
('23','3','3','23','oqCObuMxUSvy6gFt02LhlebGYO5M','j3XBP43K','0','0','1440484199','','0','0',''),
('24','3','3','24','oqCObuH3U-k6dhZxzeHcloM4naeI','WsbJmJJ5','1','1440309677','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SDNVLWs2ZGhaeHplSGNsb000bmFlSSI7czo4OiJuaWNrbmFtZSI7czo2OiLllYrlhbQiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuW5v+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI4OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZKcTJiRWJRVVdteTF1bWZ2R0tpYXNKMk9leGpFaDhzb0dOMkdhUzRHdmFZekQ3R3V0YVExYW1DbWlhYzBldE1Hc2lhU3pLOFRJQ2ljbHowSGxuQ2o3bmJSN1UvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDMwOTY3NztzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUpjWnMzRVR3UUVJU0RQMWQ5ZUYxYm8iO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896954','0','啊兴'),
('25','3','3','25','oqCObuCPFRUOtBpblOHknVrvkF3g','aslCIz1l','0','0','1440341507','','0','0',''),
('26','3','3','26','oqCObuJ429pSQzl6JU6jqxH3lwcY','lR5iaRZf','0','0','1440411181','','0','0',''),
('27','3','3','27','oqCObuHcjOSoSUTZNTYj1fk6_NDI','G7HzHH88','1','1440384481','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SGNqT1NvU1VUWk5UWWoxZms2X05ESSI7czo4OiJuaWNrbmFtZSI7czoyNDoi6a2F5Yqb5aWz5Lq65YW755Sf5Lya6aaGIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLoj4/ms70iO3M6ODoicHJvdmluY2UiO3M6Njoi5bGx5LicIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEyNzoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9yNDhjU1NscjdqakJNRHl5Q240ZHZNYVppYXdLS3E4YVdxUkd1SVdIbkZldEYxS0JVNDFyYTNpYTJSR0R3a1J0UHFkcWdZVmhMcDk4UUtJbHpYVWUyUFdQMXZESUpTMVd1aWIvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDM4NDQ4MTtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUk1WHN0ejJUV203V25BVEpUTUlhTFEiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896954','0','魅力女人养生会馆'),
('28','3','3','28','oqCObuMgh6Us5ZqBKEcsRK8_ORuc','TXjExdqr','1','1440386478','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1TWdoNlVzNVpxQktFY3NSSzhfT1J1YyI7czo4OiJuaWNrbmFtZSI7czoxMDoiOTk4NzY1NDMyMSI7czozOiJzZXgiO2k6MjtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6MDoiIjtzOjg6InByb3ZpbmNlIjtzOjY6IuWxseilvyI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMjg6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vQkt0UTFuMURkNkwxaWN3S3FSY2NoQ2dTR1prdjhURVZFNHNoaWFDWWQzZjE5TmtpYVZkSEdyS3FXR3JZTmVvT0sxc0NQSUhXY2F6RU16SWFrR1ZlUHFGNmlhZWFiUXlWM3U2NC8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQwMzg2NDc4O3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1Rzd5dC1KZFRsbmxpb3c2M0NkYVBwRSI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896829','0','9987654321'),
('29','3','3','29','oqCObuFV89348niLU-tVog3kzd0c','sQ7FheX5','1','1440391342','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RlY4OTM0OG5pTFUtdFZvZzNremQwYyI7czo4OiJuaWNrbmFtZSI7czo5OiJeX17mhadeX14iO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuWNgeWgsCI7czo4OiJwcm92aW5jZSI7czo2OiLmuZbljJciO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI2OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZKcTJiRWJRVVdteXdqRHlWaDBQcjIxWnljelNDUUtEVW8yMmljeDFlRDM0SFdsWTUxUVJjWUxjRE43M0dkU2ZGTm84YXBFWUNaTUd2TGlhd0xVdlFPNTFxLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDAzOTEzNDI7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVKTXNIYnpwaDFhQlN5OWJZT3BvNmlBIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896953','0','^_^慧^_^'),
('30','3','3','30','oqCObuBLy3yvUlo3xERo552s6ewE','NU1nF3Zb','1','1440477291','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1Qkx5M3l2VWxvM3hFUm81NTJzNmV3RSI7czo4OiJuaWNrbmFtZSI7czoxNzoi8J+SiyDllK/niLHkvaDvvIEiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuiNhuW3niI7czo4OiJwcm92aW5jZSI7czo2OiLmuZbljJciO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTMwOiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL2FTUExpY1Rhd2ljMFNENTU5VVhrUmIzdHZFeFhxVENFMVYzRXA2Z0NxUmljdjJjR0FEZXFRTE1PNWlieEV5RVNscnVjb05MaWE0b3J1THNVRWdPWHlDRDViZ0pCWTNvQVA2Q2lhUi8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQwNDc3MjkxO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1SXdXSVVWWm5Ib1czNTRZdUhfQ0lrayI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896892','0',''),
('31','3','3','31','oqCObuDZX5vbEGnVlil2S9si67dg','nX95W15J','1','1440485714','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RFpYNXZiRUduVmxpbDJTOXNpNjdkZyI7czo4OiJuaWNrbmFtZSI7czoxMjoi5Yaw5rOg55qE5b+DIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLlpKflhbQiO3M6ODoicHJvdmluY2UiO3M6Njoi5YyX5LqsIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjE0MjoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9hak5WZHFIWkxMRGd4UjhRSENkd0NhTndQTXVpYUdPN0MxMzIzRmFpY1ZpYWliZzIyU2NsMlRYWXhsbGxQVXF0amRIMGZ4TDBYZkFPRVJpYzdwVklsaWFwZzNOamZ2OHdpYVJXYWdXcmZxc05sWHhScDQvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDQ4NTcxNDtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUlwWGo5MTJHQzBBQS1tMlJTbEQ3WG8iO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896891','0','冰泠的心'),
('32','3','3','32','oqCObuPq9mJUDd5M8oQntxR6rGHg','gob5FoF2','1','1440486048','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1UHE5bUpVRGQ1TThvUW50eFI2ckdIZyI7czo4OiJuaWNrbmFtZSI7czoxMjoi6Iqx5a2j576Oc3BhIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLlpKfov54iO3M6ODoicHJvdmluY2UiO3M6Njoi6L695a6BIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEzMzoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SUhvaWFQV0FUUG40aWI2aWM5aWJkVVV3aWFwVFFBa3J0QlZkeElLMktvdWZpYUw2UVFOM3EzZ29IaGQ2ajVpY3V5b0VQclhZNnYyVzBYMlA5aDM1TnM2aWIxN2lidEovMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDQ4NjA0ODtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUJLZ2d0S0dYZ3JObHdIdmdobTNPT2siO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896890','0','花季美spa'),
('33','3','3','33','oqCObuFmkNP_fCZKf-1zR4mdmPFw','t848N42j','1','1440498940','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1Rm1rTlBfZkNaS2YtMXpSNG1kbVBGdyI7czo4OiJuaWNrbmFtZSI7czoxNToi6I6J5aif576O5a656ZmiIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLlroHlvrciO3M6ODoicHJvdmluY2UiO3M6Njoi56aP5bu6IjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEzMToiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SlZBZjdiNWx5ZmxUalZMaWNiTWM2UkpZV1hldzJYbVkzQzhXN1NvdjJDVE8zNk9pYWlhTmliaWFGaWJwTGhjUk1xMHRKWmVuS0pWUlc2aWFQSEF5ZFEzY3pzbVhmLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA0OTg5NDA7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVHNkZFRDM1amJkYVB2ajBSRUNUZ1o0IjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896829','0','莉娟美容院'),
('34','3','3','34','oqCObuKllTBRBJZpUj6_8YcR8fCU','Nv4MrPpM','1','1440514527','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1S2xsVEJSQkpacFVqNl84WWNSOGZDVSI7czo4OiJuaWNrbmFtZSI7czo0OiJqdWx5IjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czowOiIiO3M6ODoicHJvdmluY2UiO3M6MDoiIjtzOjc6ImNvdW50cnkiO3M6MDoiIjtzOjEwOiJoZWFkaW1ndXJsIjtzOjE0MjoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9RM2F1SGd6d3pNNFlPMjVIdDVVYnE5NU4xaWJ0TVM1MkhpYkVRc01YWDFWdG5mZGw1UWlhb29UV3FrSWhpYVhUNGZTSHI2eUNoTDA2VkNNdUkwSm9waWJURXdmaWN5NFFZV1dkRk5zaWE4UjFzMm44Rk0vMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDUxNDUyNztzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdVBIRHFRZExDajEwb0FTckU3VkpyVnMiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896828','0','july'),
('35','3','3','35','oqCObuDqPk2iapQeZFEjVpe36bVU','Y3BIdni3','1','1440516498','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RHFQazJpYXBRZVpGRWpWcGUzNmJWVSI7czo4OiJuaWNrbmFtZSI7czo2OiLlkLTmspkiO3M6Mzoic2V4IjtpOjA7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjA6IiI7czo4OiJwcm92aW5jZSI7czowOiIiO3M6NzoiY291bnRyeSI7czowOiIiO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTMxOiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5iNWd0YjlkRmEwVnZnc2lhYm1acUhMV3BQajNrOWlhZWRLVTQzdGYyd2U1N2JFaWF2eUtsQjNsWUY5cmNVaWJRd2RJZEZpY3ZOWVFiTG5iSmliaWJZWmE4TjZqd1EvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MDUxNjQ5ODtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUdFV1V5Y2JUYzc2WlFmYnlzN2JoelkiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896827','0','吴沙'),
('36','3','3','36','oqCObuDocFvQgNHF0IGx-1OH-oTQ','c7B2qFWq','1','1440569866','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RG9jRnZRZ05IRjBJR3gtMU9ILW9UUSI7czo4OiJuaWNrbmFtZSI7czo5OiLlvKDnq4vlhpsiO3M6Mzoic2V4IjtpOjE7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuaYjOWQiSI7czo4OiJwcm92aW5jZSI7czo2OiLmlrDnloYiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI2OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZKWlR5VzFXMXB2YmtYWEI4WWQ3VEdLRjB4SEtFNm1IVFpmdDJZTWZ0cGlieGlhR3ptTk1OTFdhVWtxVzBUemFXZWtnVnByanE3dlFCU1NUSjE3SElYRVV2LzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA1Njk4NjY7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVINFByQlBPeHZzeFhzSmtNemFDWXU0IjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896766','0','张立军'),
('37','3','3','37','oqCObuMxotpzWDjlTVJOvry-aqjk','ciAmF3AM','1','1440594504','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1TXhvdHB6V0RqbFRWSk92cnktYXFqayI7czo4OiJuaWNrbmFtZSI7czoyOiJkYiI7czozOiJzZXgiO2k6MjtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6Njoi5bm/5beeIjtzOjg6InByb3ZpbmNlIjtzOjY6IuW5v+S4nCI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMzM6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vYVNQTGljVGF3aWMwUlluSjRuSWljR2ZpY01RQWlicHBZeWp5Vm1ZaWFaa29vZWZ4M0o2NDJMbjFURUx2aWNqWjlEVlNnY1d0R1dyajZ6d0ZzdUlpYjVFZGliMlJsOHc1R3YyUXJGYUdlLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA1OTQ1MDQ7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVOLVlUSktJd1ZBZEdiYmt4QktUSjRvIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896703','0','db'),
('38','3','3','38','oqCObuI1PCZokquFKC46OoaiuOGE','hexG9l91','0','0','1440646858','','0','0',''),
('39','3','3','39','oqCObuJyX1cw_N3CkKgmg-KBLdQA','S00eeY92','1','1440657102','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SnlYMWN3X04zQ2tLZ21nLUtCTGRRQSI7czo4OiJuaWNrbmFtZSI7czo0OiJT57aTIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czowOiIiO3M6ODoicHJvdmluY2UiO3M6Njoi5Yev6YeMIjtzOjc6ImNvdW50cnkiO3M6OToi54ix5bCU5YWwIjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEyOToiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SVdCVmljNzJQUUpNYmtGeE5aaWFpY0l6YktHaEpseENJdzJXT251emFTcUlhR3g3QjhraHBQaWJseENyREwxdnBQWEt6dko4SUw2dDJ2eWliRGZQTnVYM1lqWi8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQwNjU3MTAyO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1RllxTFpOajlwVm9RWmk2VG9YODMzSSI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896703','0','S經'),
('40','3','3','40','oqCObuHK8XbmZHL6B0k683RefgSo','Hgg0pYJz','0','0','1440720885','','0','0',''),
('41','3','3','41','oqCObuCeY7o58irKCqvoHMRNqFcQ','pJ1Tli73','1','1440729352','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1Q2VZN281OGlyS0Nxdm9ITVJOcUZjUSI7czo4OiJuaWNrbmFtZSI7czo5OiLwn5CyZ2RscmoiO3M6Mzoic2V4IjtpOjE7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuW5v+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI3OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5ia05mYmljTVV2bGZ3aWFSQVNRVGVhdnR1WTVNZUx5OUgzb1hSTEllUllIMTJWZmZSMkF6SzV5SHdnMEU0VGxjVmJiNXkxZk9pYmZUZzlKampPU1I1WGd3ci8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQwNzI5MzUyO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1RVpUNUZERklpVGo2QXltV3dNRUJXayI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896703','0',''),
('42','3','3','42','oqCObuA2HyLSe5Qb3uXiweTQng1c','XDkMVeZM','1','1440771779','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1QTJIeUxTZTVRYjN1WGl3ZVRRbmcxYyI7czo4OiJuaWNrbmFtZSI7czozOiLlhYkiO3M6Mzoic2V4IjtpOjE7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6Iuemj+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLnpo/lu7oiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTE3OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL2FqTlZkcUhaTExDekxWTDJCbXhTZzA3Q0VmM2ljb3FsdGs2aWFrdlhsQ0NRaExmVU1ISXJUcUZ4Zkk5aDhHQmQ2dzA1NUw1MmFMeEg1b3lmR3hpYm9MdURRLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA3NzE3Nzk7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVOekMteVdUOHYwQ0djLVBycm1PREhBIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896953','0','光'),
('43','3','3','43','oqCObuJDp1NQzQ0a3dszhBR_D7d4','rwH0YPzX','1','1440825061','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SkRwMU5RelEwYTNkc3poQlJfRDdkNCI7czo4OiJuaWNrbmFtZSI7czo2OiLpmL/mpaAiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6Iua9jeWdiiI7czo4OiJwcm92aW5jZSI7czo2OiLlsbHkuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI3OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuLzJRMDl4cEtqRE5ZeFprNGNpYWQ5SHA1b2VyTkZvb0NoNE1UZWdYa3lpYzhWRmdrTTdMOVJ0MEdRSncwY29vaWNaazVQSk5TYkVvNTNDMGFTekZyb2thV3NIYXIyVTdSUWoyUi8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQwODI1MDYxO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1T0g2OXRJMzZpYXZ5bXY1WUx1eVhYdyI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896892','0','阿楠'),
('44','3','3','44','oqCObuAb6-jQCTgr3hj4d67q7aQI','sVzIZjEw','1','1440831807','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1QWI2LWpRQ1RncjNoajRkNjdxN2FRSSI7czo4OiJuaWNrbmFtZSI7czo0MDoiQeW4jOmhv+e+juS4muS6keWNl+aKgOacr+aAu+ebkeKYnum+mumbqiI7czozOiJzZXgiO2k6MjtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6Njoi5Li95rGfIjtzOjg6InByb3ZpbmNlIjtzOjY6IuS6keWNlyI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMjc6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4veXlBeW1vMlgwbTNvNFJ4NEVBZ3BoNGx1czd4ZDN0czJsTWljQzRsdHZKaWNYUk8yZmNUa0FSYzRka2Y2cHJTdzVvMEh1cVkzQ01pY1MxdHlxWlk1NHpqR1Q0YXBJV1lsOGtyLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA4MzE4MDc7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVENW5KMENlR0hwekNkcVZ3VVR0SVk0IjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896890','0','A希顿美业云南技术总监☞龚雪'),
('45','3','3','45','oqCObuLOAOVtaIaYcHL0Xl5eWdDU','PTxpbKKz','1','1440982031','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1TE9BT1Z0YUlhWWNITDBYbDVlV2REVSI7czo4OiJuaWNrbmFtZSI7czozOiLoj7IiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IueDn+WPsCI7czo4OiJwcm92aW5jZSI7czo2OiLlsbHkuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTE3OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL3I0OGNTU2xyN2ppYUdrOHdZOUUxUm9xWnpQTjY4SW9nTjYxYjRseGRQMG5kc2dLWHowZHJuS1o2eHdLNENGekpXQkdQTFFpY2ZQeVV3a0tzaWI4SWhRRkxBLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA5ODIwMzE7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVCRm16S0d1TDBmMlBSRGhNOUtCMXcwIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896829','0','菲'),
('46','3','3','46','oqCObuLOAOVtaIaYcHL0Xl5eWdDU','o0CNaclC','1','1440982031','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1TE9BT1Z0YUlhWWNITDBYbDVlV2REVSI7czo4OiJuaWNrbmFtZSI7czozOiLoj7IiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IueDn+WPsCI7czo4OiJwcm92aW5jZSI7czo2OiLlsbHkuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTE3OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL3I0OGNTU2xyN2ppYUdrOHdZOUUxUm9xWnpQTjY4SW9nTjYxYjRseGRQMG5kc2dLWHowZHJuS1o2eHdLNENGekpXQkdQTFFpY2ZQeVV3a0tzaWI4SWhRRkxBLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDA5ODIwMzE7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVCRm16S0d1TDBmMlBSRGhNOUtCMXcwIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896828','0','菲'),
('47','3','3','47','oqCObuATA2IOB20aU4-dhA48B_tE','ltLtM6Q9','1','1441108338','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1QVRBMklPQjIwYVU0LWRoQTQ4Ql90RSI7czo4OiJuaWNrbmFtZSI7czo5OiLpg5Hnj43np4AiO3M6Mzoic2V4IjtpOjA7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjA6IiI7czo4OiJwcm92aW5jZSI7czowOiIiO3M6NzoiY291bnRyeSI7czowOiIiO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTMxOiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZMOWljdHM1M2ljWmVVZndQN2dRUTlvYURwMGlhcFZhcG80VzVpYnlCdjBocVo5TkdpYWMzbEtURzF5bHFGM0hBZ2liZkhpYTVzWnpUYUFtM2F4ZEZHMlB2NGFoYk8vMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MTEwODMzODtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdVBmSXBpb3FSRFY3SEQ1OW1MZWpvUWciO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896827','0','郑珍秀'),
('48','3','3','48','oqCObuGkZsm8rXrnJZfP9ZlWCAmc','N51VPL13','1','1441180220','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1R2tac204clhybkpaZlA5WmxXQ0FtYyI7czo4OiJuaWNrbmFtZSI7czo5OiLllrXllrXlp5AiO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjk6Iuefs+WYtOWxsSI7czo4OiJwcm92aW5jZSI7czo2OiLlroHlpI8iO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI5OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZMOElsQVE4Y0NXVkR0N05kN3hpYWZXY0xNeWFoUnJobzdQNFZKVEtRNFlkRlJpYjVXd1VLbnNTeWdnQXg1RUtkOFpvZ2JJNmFDaWFkaWE3TmppY1pOSE5Oa2FZLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDExODAyMjA7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVIbUxmY2hkYmg2SUVKQXhtWnhPMHJBIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896765','0','喵喵姐'),
('49','3','3','49','oqCObuH6aFYMoynjvqV21PmoTgl8','LzgzOV7I','1','1441605325','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SDZhRllNb3luanZxVjIxUG1vVGdsOCI7czo4OiJuaWNrbmFtZSI7czo2OiJqdWdnbGUiO3M6Mzoic2V4IjtpOjE7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6IuW5v+W3niI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTE3OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL1BpYWp4U3FCUmFFSlhsalZ1WktDb1I2YVdrd3ptY21HVW84Um5EdW9pY1NQaWJRZ0xQUVBCUHRFY3Q5SjVnMUpOZFdDNFExYVlqWG9BMFdMYW9ZRXZVRDhRLzAiO3M6MTQ6InN1YnNjcmliZV90aW1lIjtpOjE0NDE2MDUzMjU7czo3OiJ1bmlvbmlkIjtzOjI4OiJvOEVXUXVGRzZVSU1yc2FhbkhvWmNZLTBSZmhzIjtzOjY6InJlbWFyayI7czowOiIiO3M6NzoiZ3JvdXBpZCI7aTowO30=','1441896765','0','juggle'),
('50','3','3','50','oqCObuLOU2ZxifbeP0UXcjXMqYn0','D7wxSxoD','0','0','1441617550','','0','0',''),
('51','3','3','51','oqCObuI028lhaemMbyEyDJ4kqawc','zUj9MZZa','0','0','1441627264','','0','0',''),
('52','3','3','52','oqCObuA0XgWMi5Rp-Bpz0X2JJU0o','ERrhzDkl','1','1441631266','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1QTBYZ1dNaTVScC1CcHowWDJKSlUwbyI7czo4OiJuaWNrbmFtZSI7czoxNjoi55+t5Y+R5aWz5rGJ5a2QQCI7czozOiJzZXgiO2k6MjtzOjg6Imxhbmd1YWdlIjtzOjU6InpoX0NOIjtzOjQ6ImNpdHkiO3M6Njoi5pmL5LitIjtzOjg6InByb3ZpbmNlIjtzOjY6IuWxseilvyI7czo3OiJjb3VudHJ5IjtzOjY6IuS4reWbvSI7czoxMDoiaGVhZGltZ3VybCI7czoxMjk6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vWm5BcUF0NTBUaWJkY09QbDhrNmljRUZUZXNpYkpTRDBYR0JteGt4bkVaMTRvNUh0WUE1UlM5WFY0Z3RJNkhiekc5bWJLQ2ZxNDM5ZHExMUJLcjV0S1ZGTUR6UmhHN3BpYWliTTcvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MTYzMTI2NjtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUFYT0hJRnRHekhOQzZpRzBiNkNjUW8iO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896891','0','短发女汉子@'),
('53','3','3','53','oqCObuDMopXr9RyOVylgJlH3kuT8','TZMmD0MM','1','1441681543','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RE1vcFhyOVJ5T1Z5bGdKbEgza3VUOCI7czo4OiJuaWNrbmFtZSI7czoxODoi5LiA5pum5pe25YWJ44CG6ZyeIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLmma7mtLEiO3M6ODoicHJvdmluY2UiO3M6Njoi5LqR5Y2XIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEyOToiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SkVKcGpIU3g4SGV0MXRXaGtIczhxWHVWclR6bG1uelpjQTA1bkxTRmh2aWFaUmY5WFZyRkVpYzR0aGRYUmlhcm8yNmliVjNUZXlpYlNYclozSlRGY29HQzhLVC8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQxNjgxNTQzO3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1S3BROEdkZFJkNU91LXYzUWdLOXVyTSI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896764','0','一曦时光〆霞'),
('54','3','3','54','oqCObuPY0Q-sVJO4UAaU9fcDlIZc','i2Glf4Fs','1','1441725948','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1UFkwUS1zVkpPNFVBYVU5ZmNEbElaYyI7czo4OiJuaWNrbmFtZSI7czoxODoi54+N54+g5L6d54S26ICA55y8IjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czowOiIiO3M6ODoicHJvdmluY2UiO3M6MDoiIjtzOjc6ImNvdW50cnkiO3M6MTI6IuebtOW4g+e9l+mZgCI7czoxMDoiaGVhZGltZ3VybCI7czoxMjg6Imh0dHA6Ly93eC5xbG9nby5jbi9tbW9wZW4vQkt0UTFuMURkNkpWQWY3YjVseWZsWlRnWEhWdlZLRmUwY1NKaDlOd1U0aWEyMTJVQTBRdm1MR05OUlVTRTg1aWJ5Zk1mWWljQTBGQ3NVQUxyckxrNjUwQTdVeUpWMjJpYkdzWi8wIjtzOjE0OiJzdWJzY3JpYmVfdGltZSI7aToxNDQxNzI1OTQ4O3M6NzoidW5pb25pZCI7czoyODoibzhFV1F1REJqcjN5TXZ5eTdyVGxRSENTV3ZsQSI7czo2OiJyZW1hcmsiO3M6MDoiIjtzOjc6Imdyb3VwaWQiO2k6MDt9','1441896703','0','珍珠依然耀眼'),
('55','3','3','55','oqCObuIhoF9NnKmElDXzQpg5zv2s','ikRtLYZz','1','1441776538','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1SWhvRjlObkttRWxEWHpRcGc1enYycyI7czo4OiJuaWNrbmFtZSI7czo2OiLlrrblhbciO3M6Mzoic2V4IjtpOjI7czo4OiJsYW5ndWFnZSI7czo1OiJ6aF9DTiI7czo0OiJjaXR5IjtzOjY6Iua3seWcsyI7czo4OiJwcm92aW5jZSI7czo2OiLlub/kuJwiO3M6NzoiY291bnRyeSI7czo2OiLkuK3lm70iO3M6MTA6ImhlYWRpbWd1cmwiO3M6MTI4OiJodHRwOi8vd3gucWxvZ28uY24vbW1vcGVuL0JLdFExbjFEZDZKd0NBTTBFbWlhcGxFaWMyUnR0dk1JaFVidDFvbzU5ZVYySGo5dXBjZ0d0MDVEbmJCNUxqb2dhQkZCZzBhZ29kdkEzQWljU3NmNUJpYTVsdGxtYUQ0SXlSV28vMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MTc3NjUzODtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdUZRdTBWZ1Z0QnRqQTA0MVhuUzdmSmMiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896955','0','家具'),
('56','3','3','56','oqCObuG7mksym3J-6qmQ2FgT5WiU','piI1qo57','0','0','1441801796','','0','0',''),
('57','3','3','57','oqCObuDil4dT3MXwtvK7uMNbzLg8','iSc6rRCi','1','1441810274','0','YToxMzp7czo5OiJzdWJzY3JpYmUiO2k6MTtzOjY6Im9wZW5pZCI7czoyODoib3FDT2J1RGlsNGRUM01Yd3R2Szd1TU5iekxnOCI7czo4OiJuaWNrbmFtZSI7czoyNDoi44COZNC10LhHLnnQpuOAj2xpbmfwn5KLIjtzOjM6InNleCI7aToyO3M6ODoibGFuZ3VhZ2UiO3M6NToiemhfQ04iO3M6NDoiY2l0eSI7czo2OiLlub/lt54iO3M6ODoicHJvdmluY2UiO3M6Njoi5bm/5LicIjtzOjc6ImNvdW50cnkiO3M6Njoi5Lit5Zu9IjtzOjEwOiJoZWFkaW1ndXJsIjtzOjEzMDoiaHR0cDovL3d4LnFsb2dvLmNuL21tb3Blbi9CS3RRMW4xRGQ2SWtwaWNEWEdJaWN5RDhGbFRVaWNSOVpGNHBpYkc2QWpDNnZROG55SlBrazhxc0ZUWWx6U0QySGppYWFrejZVWUF1Q3FHN01mUkdMM0dpY1l1WWVMNjMxMnpXQ0UvMCI7czoxNDoic3Vic2NyaWJlX3RpbWUiO2k6MTQ0MTgxMDI3NDtzOjc6InVuaW9uaWQiO3M6Mjg6Im84RVdRdURtemlYNWZFc2dOT2xGaUdma3dfSTAiO3M6NjoicmVtYXJrIjtzOjA6IiI7czo3OiJncm91cGlkIjtpOjA7fQ==','1441896954','0','『dеиG.yЦ』ling'),
('58','3','3','58','oqCObuGsJq1vMC1T2rR5rO4Xg3kI','quPkyvn3','0','0','1441870594','','0','0',''),
('59','3','3','59','oqCObuPA9O-zskPEjzVzMU8JfezM','Y2rdD90y','0','0','1441970864','','0','0',''),
('60','3','3','60','oqCObuG49eLbr3vaBZGRUpD3O5XA','PU6gcUFS','1','1441979571','0','','0','0',''),
('61','3','3','61','oqCObuLdkV_iKpftyachBOkaRTxU','pZD00Y1l','1','1441981474','0','','0','0',''),
('62','3','3','62','oqCObuOiQh0pBwF65HcqgKOG7BTg','ux6bomsX','1','1442033512','0','','0','0',''),
('63','3','3','63','oqCObuOGmtDloUjNwxpnz1CSnFjY','ZSdXedmf','1','1442042458','0','','0','0',''),
('64','3','3','64','oqCObuIBTJn_ptCtKvmYf_E08B8s','zHKHlLvb','1','1442043692','0','','0','0',''),
('65','3','3','65','oqCObuA61kN6DZZTqk_edzJCVuPc','n0s1DxqV','1','1442105290','0','','0','0',''),
('66','3','3','66','oqCObuMmFxQZqSPNWcTo_IMyijYw','RV61IEIn','1','1442112848','0','','0','0',''),
('67','3','3','67','oqCObuKqlFZaWfyF0gSADNDlo0Xs','IYQ8cxl4','1','1442138333','0','','0','0',''),
('68','3','3','68','oqCObuIBGwerLt0edPc-mEpjmDgk','v19OnHcJ','1','1442251568','0','','0','0',''),
('69','3','3','69','oqCObuHeWGVRJU0JXw3vvGsA-hkA','j36C1Cme','1','1442293656','0','','0','0',''),
('70','3','3','70','oqCObuKLIrOrwM5Jz6kAyP9_hgZY','DS30i9x3','0','0','1442301571','','0','0',''),
('71','3','3','71','oqCObuNSFAGznsTqKUem0nQtWdKs','UuU0zLCt','1','1442301521','0','','0','0',''),
('72','3','3','72','oqCObuAsSIR64leNzP9KyQwnFTiw','efzmnOJP','1','1442308412','0','','0','0',''),
('73','3','3','73','oqCObuCH72CaL8zrlCeknDPfeq2c','AycCzBHt','1','1442322776','0','','0','0',''),
('74','3','3','74','oqCObuCT7VYAROXc20DFhn8yf-e0','b74fz7Q7','1','1442356099','0','','0','0',''),
('75','3','3','75','oqCObuPns7fEEmQXr1DJpyozkoa8','fyxPkSBp','1','1442385041','0','','0','0','');


DROP TABLE IF EXISTS ims_mc_mapping_ucenter;
CREATE TABLE `ims_mc_mapping_ucenter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `centeruid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_mass_record;
CREATE TABLE `ims_mc_mass_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `fansnum` int(10) unsigned NOT NULL,
  `msgtype` varchar(10) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mc_member_address;
CREATE TABLE `ims_mc_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `district` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uinacid` (`uniacid`),
  KEY `idx_uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_member_address VALUES 
('1','3','3','欧任','18999999999','','北京市','北京辖区','东城区','考虑考虑','1'),
('2','3','49','juggle','15012345678','','北京市','北京辖区','东城区','1111','1');


DROP TABLE IF EXISTS ims_mc_member_fields;
CREATE TABLE `ims_mc_member_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `fieldid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fieldid` (`fieldid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_member_fields VALUES 
('1','3','1','真实姓名','1','0'),
('2','3','2','昵称','1','1'),
('3','3','3','头像','1','1'),
('4','3','4','QQ号','1','0'),
('5','3','5','手机号码','1','0'),
('6','3','6','VIP级别','1','0'),
('7','3','7','性别','1','0'),
('8','3','8','出生生日','1','0'),
('9','3','9','星座','1','0'),
('10','3','10','生肖','1','0'),
('11','3','11','固定电话','1','0'),
('12','3','12','证件号码','1','0'),
('13','3','13','学号','1','0'),
('14','3','14','班级','1','0'),
('15','3','15','邮寄地址','1','0'),
('16','3','16','邮编','1','0'),
('17','3','17','国籍','1','0'),
('18','3','18','居住地址','1','0'),
('19','3','19','毕业学校','1','0'),
('20','3','20','公司','1','0'),
('21','3','21','学历','1','0'),
('22','3','22','职业','1','0'),
('23','3','23','职位','1','0'),
('24','3','24','年收入','1','0'),
('25','3','25','情感状态','1','0'),
('26','3','26',' 交友目的','1','0'),
('27','3','27','血型','1','0'),
('28','3','28','身高','1','0'),
('29','3','29','体重','1','0'),
('30','3','30','支付宝帐号','1','0'),
('31','3','31','MSN','1','0'),
('32','3','32','电子邮箱','1','0'),
('33','3','33','阿里旺旺','1','0'),
('34','3','34','主页','1','0'),
('35','3','35','自我介绍','1','0'),
('36','3','36','兴趣爱好','1','0');


DROP TABLE IF EXISTS ims_mc_members;
CREATE TABLE `ims_mc_members` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `salt` varchar(8) NOT NULL DEFAULT '',
  `groupid` int(11) NOT NULL DEFAULT '0',
  `credit1` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `credit2` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `credit3` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `credit4` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `credit5` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(15) NOT NULL DEFAULT '',
  `vip` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `birthyear` smallint(6) unsigned NOT NULL DEFAULT '0',
  `birthmonth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `birthday` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `constellation` varchar(10) NOT NULL DEFAULT '',
  `zodiac` varchar(5) NOT NULL DEFAULT '',
  `telephone` varchar(15) NOT NULL DEFAULT '',
  `idcard` varchar(30) NOT NULL DEFAULT '',
  `studentid` varchar(50) NOT NULL DEFAULT '',
  `grade` varchar(10) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(10) NOT NULL DEFAULT '',
  `nationality` varchar(30) NOT NULL DEFAULT '',
  `resideprovince` varchar(30) NOT NULL DEFAULT '',
  `residecity` varchar(30) NOT NULL DEFAULT '',
  `residedist` varchar(30) NOT NULL DEFAULT '',
  `graduateschool` varchar(50) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `education` varchar(10) NOT NULL DEFAULT '',
  `occupation` varchar(30) NOT NULL DEFAULT '',
  `position` varchar(30) NOT NULL DEFAULT '',
  `revenue` varchar(10) NOT NULL DEFAULT '',
  `affectivestatus` varchar(30) NOT NULL DEFAULT '',
  `lookingfor` varchar(255) NOT NULL DEFAULT '',
  `bloodtype` varchar(5) NOT NULL DEFAULT '',
  `height` varchar(5) NOT NULL DEFAULT '',
  `weight` varchar(5) NOT NULL DEFAULT '',
  `alipay` varchar(30) NOT NULL DEFAULT '',
  `msn` varchar(30) NOT NULL DEFAULT '',
  `taobao` varchar(30) NOT NULL DEFAULT '',
  `site` varchar(30) NOT NULL DEFAULT '',
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `groupid` (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

INSERT INTO ims_mc_members VALUES 
('1','2','','9c732453555efbb2cc382118643bf6ba@we7.cc','4e64e6eabdb07ae1950db455151bdcb0','grxvMrQF','2','0.00','0.00','0.00','0.00','0.00','1416880953','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('2','2','','90b59cc39acf0e8795a52b2046caaafe@we7.cc','26883bac424b977011995f17fbd42acc','fBGD3517','2','0.00','0.00','0.00','0.00','0.00','1416881047','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('3','3','','b9d08a6281aeb3d03f77d54efa53f064@we7.cc','a0f3b89993d1b89d8b896a15f69bd23c','aA0F88zv','3','0.00','0.02','0.00','0.00','0.00','1438583927','','欧哥','http://wx.qlogo.cn/mmopen/2Q09xpKjDNZNLKP3A0Ew3qgmyZ1DiabVhh8qUjf7ZkdspKEFJtPBCw98WIBdRWDvvcGJdV5nutMBPcRQiaBuOk0tbZtbFKd5Yh/132','','0','1','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('4','3','','512bd40d345a0fae6694bb97d7cb12c2@we7.cc','ec953755acc0b31df7779b1a93a1c6e2','MOHDJeMx','3','0.00','0.00','0.00','0.00','0.00','1438594282','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('5','3','','f584350c504851bb97dea4f112c35f2a@we7.cc','79d4521ad9b4c58bed7eddeff3266dae','Aqz6XlKL','3','0.00','0.00','0.00','0.00','0.00','1438678923','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('6','3','','1e200682d9d731b00373f897a905069c@we7.cc','be5f0136d1ad732985ea27d9e9ee9cc1','RMkc5c65','3','0.00','0.00','0.00','0.00','0.00','1438760232','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('7','3','','9053cffeb8749350462f786c1dfdc342@we7.cc','70df8796c2c3eda8b7e257f28a5e16d8','skATiPka','3','0.00','0.00','0.00','0.00','0.00','1438844374','','王芳','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6K64jwicbH3micXRnaJFanIHUzdq9okC1t6tTTia3cZG9921Z6TRfLxib4ZObjQwaXSTjDUHc6nmn1ibCQ/132','','0','2','0','0','0','','','','','','','','','中国','山西省','长治市','','','','','','','','','','','','','','','','','',''),
('8','3','','d39e51f3bffcefab16e050c4f4ee9b91@we7.cc','a52e99abd1ffafde3bdd2dd68e495be1','dCbAECCq','3','0.00','0.00','0.00','0.00','0.00','1439025320','','贺桂娟','http://wx.qlogo.cn/mmopen/2Q09xpKjDNbr4qBqkPrpriaSia5JFD5IOocZn500c0ObfeTcQE8aUq5zkYXxGB08jlG0iagkWf9rFW7oSr1loDUzRnQKRMiaYkBic/132','','0','2','0','0','0','','','','','','','','','中国','湖南省','湘西市','','','','','','','','','','','','','','','','','',''),
('9','3','','91640c4b98d3b52cddaf1937f9fb2012@we7.cc','24805c1d9b8679b9f1703b3c51d59bac','LV959H79','3','0.00','0.00','0.00','0.00','0.00','1439041339','','王锦燕','http://wx.qlogo.cn/mmopen/2Q09xpKjDNYI76MFyg9jX12T6aFMjD1NRz7QPCOjzqkiaCpiaN7dqUtgJY1IJX8ZPCRicjWPicXSGYe5Qu7tibmWmQzm659nqyqmh/132','','0','2','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('10','3','','52b2247c02a61bc24ca4589fa35a3865@we7.cc','e4fa9389becfa0301f442b0e4a636ee6','H2keLeeq','3','0.00','0.00','0.00','0.00','0.00','1439047478','','A金思维美业','http://wx.qlogo.cn/mmopen/FjCwnTyZ3zn0vw4gDxUXq7WGdEntCocESr5kMdoK4u4WNCaCg9BxXHoqAntvCqAFF2b1TyomVXAOZoJrBwibrbessQhvjD93s/132','','0','1','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('11','3','','22c6415550e5ae39b6db8d6848bb0c0a@we7.cc','d3cc376a7ccef31b6267d3bff6b5304e','iOco7fCO','3','0.00','0.00','0.00','0.00','0.00','1439171837','','AI^_^Dear雯','http://wx.qlogo.cn/mmopen/03XFx8R3f9iaOuRDTxm9pUlrCs0Upapz0l3UvLTypXVWP4pPhyMZibf27sOoIwiahE4Z1HzVCEsIRsdUCia6A6XALvFcCshTNKMia/132','','0','2','0','0','0','','','','','','','','','中国','湖北省','荆门市','','','','','','','','','','','','','','','','','',''),
('12','3','','2a613626fdb46d20d6437b9faea3e79f@we7.cc','e19e152a57a74160cf9427a9c51d769a','kowoX6OM','3','0.00','0.00','0.00','0.00','0.00','1439203462','','A依人（纹绣医美）','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JVAf7b5lyflRs6YEuto6nlqXpre8DUaL8WVFWhias9qgMiawbfoqLvoze7ufAYl6L3Q96DZawDqKnocyP09fvKQa/132','','0','2','0','0','0','','','','','','','','','中国','湖北省','咸宁市','','','','','','','','','','','','','','','','','',''),
('13','3','','85b5a467bd4cf7a79fed2cfdd91924f1@we7.cc','1de9d4eb3f80e94ff4e5bbee68e46ae8','DHi0E7It','3','0.00','0.00','0.00','0.00','0.00','1439219305','','平平养生会馆','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JVAf7b5lyfldjMWupDWFeatbZt7zqOoicmhenPBTtYRv6e05Zic7qvaeD4rkltQY6Iv4VPt2Zz7O09cliak66DMibM/132','','0','1','0','0','0','','','','','','','','','中国','山西省','大同市','','','','','','','','','','','','','','','','','',''),
('14','3','','d7d77bb0eb398a83a2b9654ba0dcd3a5@we7.cc','b6a3cda7369d91f065e3a73efd532c4b','K52zsmuX','3','0.00','0.00','0.00','0.00','0.00','1439261156','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('15','3','','2a4d20c9c316b32f304f7a069239a01a@we7.cc','f9cba2bcced3fe69eea2338a6d7c735f','JYF3z8Qq','3','0.00','0.00','0.00','0.00','0.00','1439475290','','☞葬泪☜','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6IkbIK76lBjCtiaS6ibOKZciaTxeEAEu3ZXuiaCpo8ibiaLYRNu7ZGnbMcQhmLU7icvl3KETO2BXKelybAWbTvbtkibz67j/132','','0','2','0','0','0','','','','','','','','','中国','河北省','沧州市','','','','','','','','','','','','','','','','','',''),
('16','3','','11d981ff303edfc5b929707e9ef95409@we7.cc','9f626231f07a165ac4362108413233f4','Leg5E4es','3','0.00','0.00','0.00','0.00','0.00','1439492343','','韦一行','http://wx.qlogo.cn/mmopen/aSPLicTawic0R5iaic4EQonIjhny1rJhc9PQ8GicOBjJV7RGQ6QQZn672fxWv22ebGKQZ91JBT9bVa92RXpB5pFuNk6Tr7wzQRKCC/132','','0','0','0','0','0','','','','','','','','','中国','广西省','南宁市','','','','','','','','','','','','','','','','','',''),
('17','3','','ed1cdef6fb7c2af0e31c1edc89bf45d7@we7.cc','346d8dbac3043b7a3031b878d35874f1','DaECphPE','3','0.00','0.00','0.00','0.00','0.00','1439543041','',' 夜黎。','http://wx.qlogo.cn/mmopen/FIT0MA9QRWMibLB4f3dU50Dicxuy7epkxftwFRicaDsz22YxQEHjqlQZMtXYd2Ric87aQJlqnwcqZjyXFibMHWibSaxTBEiajMPvibwib/132','','0','2','0','0','0','','','','','','','','','中国','山西省','大同市','','','','','','','','','','','','','','','','','',''),
('18','3','','0d085ce391b0c56f29adcf281db35349@we7.cc','e7ba5672eb4c1f42c3dfd2f22d23f28a','uvcsBUtv','3','0.00','0.00','0.00','0.00','0.00','1439554973','','荷晓','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6KHRsib5OjW2hbCeePibcybJaGDt7j8BWGrrYd3OwS4wo7XcBpTFggXkBruJqf3O7uQ4I4efBBAjpA6oR8yZYyNlI/132','','0','2','0','0','0','','','','','','','','','中国','广西省','柳州市','','','','','','','','','','','','','','','','','',''),
('19','3','','4cb573b27178f9cd3af53a829c1b76a1@we7.cc','c1c099b8fac3f474a1d05530e8e518a1','Lzj0IUIa','3','0.00','0.00','0.00','0.00','0.00','1439651056','','创富物流一刘小姐','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JQYy6PvurDevSsWKfsc4E5OqJNosw67pSjgPaiaXZyPIPgsicKQPfbLpibB3icFgLRTKGHYF6w2Wm68GSHFrt4eSoJ/132','','0','1','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('20','3','','494865033994f735ecab6d80e1518485@we7.cc','cda417b27af730627c66d14c4ebfb0d7','Ai15d941','3','0.00','0.00','0.00','0.00','0.00','1439829779','','尘埃 -薇雅','http://wx.qlogo.cn/mmopen/2Q09xpKjDNadBE15mHNibNkhHVLrUORDGWKm4BYkiczgibBsuT7WLzroMicnCwJVlYtKq00Q9OiaD0DYTzlM2FbR9vPoUl3W0ctEn/132','','0','2','0','0','0','','','','','','','','','中国','广东省','深圳市','','','','','','','','','','','','','','','','','',''),
('21','3','','ea1b52ceaa3f41964ed44c8edc3ff38a@we7.cc','c11df8ae5468a751d446f971e2d39429','vHhC1BKS','3','0.00','0.00','0.00','0.00','0.00','1439907127','','美好人生','http://wx.qlogo.cn/mmopen/aSPLicTawic0TwkmpEvIvB87hdVy6svbgN8JTqf5M61YhbntJ7k0tcc1cDcctZNrsAs6hoPR5ficuoiaicjSaJJZPkApINjA0iaclD/132','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('22','3','','150f7a251e5f9189f703d77d7dda8ae1@we7.cc','36d578c5ad2391e0b4e1e8d3587684fd','HNyXqYe1','3','0.00','0.00','0.00','0.00','0.00','1440075550','','A.菲娅家纺','http://wx.qlogo.cn/mmopen/r48cSSlr7jjBMDyyCn4dvCia94ccQXpcDxYf2hesaYQrE1jBCUYS6eaatFhyN6p0YSdmwYbmK6342wdmFeYw7CgZoWJCib5NoF/132','','0','2','0','0','0','','','','','','','','','中国','福建省','莆田市','','','','','','','','','','','','','','','','','',''),
('23','3','','7d4874366a775528e2636419ab14b415@we7.cc','2289b012bbdbaf2e79cef788e7981edf','zrWPN0o2','3','0.00','0.00','0.00','0.00','0.00','1440295248','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('24','3','','026a688085eeac6d9147a47f7f8fba0b@we7.cc','8e648a87b9539f3245224107252b49c3','Zo37FXZo','3','0.00','0.00','0.00','0.00','0.00','1440309697','','啊兴','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6Jq2bEbQUWmy1umfvGKiasJ2OexjEh8soGN2GaS4GvaYzBjPu1A6t4COWCCAxMHm1v2QXYlBp4JicnBAWFF0zCulO/132','','0','2','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('25','3','','c57781b46c56c65a1a2dc31677115c9c@we7.cc','9ad9ff3c5ce012ec7785625eb6a1d945','LbdnnjYN','3','0.00','0.00','0.00','0.00','0.00','1440341465','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('26','3','','fcd26fbd67e5246f94688cb372fcc060@we7.cc','bb9cb2d350298c41027a3dd7cb546de6','Jl65vycj','3','0.00','0.00','0.00','0.00','0.00','1440383097','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('27','3','','05072be23f290e0149e6a3e134d92c8d@we7.cc','b5c7a824ee8fd30c5b3aa429fab2a642','P1OWFDOd','3','0.00','0.00','0.00','0.00','0.00','1440384508','','魅力女人养生会馆','http://wx.qlogo.cn/mmopen/r48cSSlr7jjBMDyyCn4dvMaZiawKKq8aWqRGuIWHnFetF1KBU41ra3ia2RGDwkRtPqdqgYVhLp98QKIlzXUe2PWP1vDIJS1Wuib/132','','0','2','0','0','0','','','','','','','','','中国','山东省','菏泽市','','','','','','','','','','','','','','','','','',''),
('28','3','','f1bc470cf751b43f8133340fc184e04e@we7.cc','38e73029960f96d31123a0c7338bd053','AEpUpyb5','3','0.00','0.00','0.00','0.00','0.00','1440386502','','9987654321','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6L1icwKqRcchCgSGZkv8TEVE4shiaCYd3f19NkiaVdHGrKqWGrYNeoOK1sCPIHWcazEMzIakGVePqF6iaeabQyV3u64/132','','0','2','0','0','0','','','','','','','','','中国','山西省','','','','','','','','','','','','','','','','','','',''),
('29','3','','479153e66e45d6c1d7fdd06ee96f2478@we7.cc','a6e80ca33066a354aad265a7e6f45a73','N16IP2S4','3','0.00','0.00','0.00','0.00','0.00','1440391367','','^_^慧^_^','http://wx.qlogo.cn/mmopen/2Q09xpKjDNbkNfbicMUvlf23O7xsvtQCHx2MPQMCucCqH19Wib99zcAB4fxMeicFOMicVfQ3rA4WHto8mznEUODb1pNMmSNgnMHr/132','','0','2','0','0','0','','','','','','','','','中国','湖北省','十堰市','','','','','','','','','','','','','','','','','',''),
('30','3','','94a99c33ef3376da832db42d19304958@we7.cc','6bcb2dc609a3c936baf7d344bae77f07','qFaDBFJu','3','0.00','0.00','0.00','0.00','0.00','1440477324','','','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6LE3ytxIxyn1MicTB0KQLS59M5SPqGGDwykibUxSICung7q1tNgxGzPEOHiaRz99YcHeLf2TNyIFzk7TB0x4JDU9ch/132','','0','2','0','0','0','','','','','','','','','中国','湖南省','益阳市','','','','','','','','','','','','','','','','','',''),
('31','3','','8cab8e07601130d1efbce92e60075dd5@we7.cc','3fd2c91e430bbd4983e1f350c2c246cb','u933Mowo','3','0.00','0.00','0.00','0.00','0.00','1440485748','','冰泠的心','http://wx.qlogo.cn/mmopen/ajNVdqHZLLDgxR8QHCdwCaNwPMuiaGO7C1323FaicViaibg22Scl2TXYxlllPUqtjdH0fxL0XfAOERic7pVIliapg3Njfv8wiaRWagWrfqsNlXxRp4/132','','0','2','0','0','0','','','','','','','','','中国','北京省','大兴市','','','','','','','','','','','','','','','','','',''),
('32','3','','5654a98f1c5bbddeaccda9770dfe509c@we7.cc','ecda1fe408f3fb2442b0773eff23c519','WAstrXj6','3','0.00','0.00','0.00','0.00','0.00','1440486082','','花季美spa','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6IHoiaPWATPn4ib6ic9ibdUUwiapTQAkrtBVdxIK2KoufiaL6QQN3q3goHhd6j5icuyoEPrXY6v2W0X2P9h35Ns6ib17ibtJ/132','','0','2','0','0','0','','','','','','','','','中国','辽宁省','大连市','','','','','','','','','','','','','','','','','',''),
('33','3','','29e117db70126be953a3f7a631304576@we7.cc','cb76edd7b98ec6652766d1442b73eb71','m9fWn5tM','3','0.00','0.00','0.00','0.00','0.00','1440498972','','莉娟美容院','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JVAf7b5lyflTjVLicbMc6RJYWXew2XmY3C8W7Sov2CTO36OiaiaNibiaFibpLhcRMq0tJZenKJVRW6iaPHAydQ3czsmXf/132','','0','2','0','0','0','','','','','','','','','中国','福建省','宁德市','','','','','','','','','','','','','','','','','',''),
('34','3','','ac145af0da8748dfde1f46bf9016abe8@we7.cc','faf04280f93502ee80fffc69fd47600f','ZtGraH5a','3','0.00','0.00','0.00','0.00','0.00','1440514563','','july','http://wx.qlogo.cn/mmopen/yyzOZJn4GIhsRoAscStpfbNPr70KRzASPBW6GpSqichhOjUAgRW2TRoQVkS2DcnTuyk94fv7LUpEL5awXr2Ptq3telqoMnKFf/132','','0','2','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('35','3','','432729bb61f7242d8d549e89f6ace5fc@we7.cc','0385e63bada9338afce9e3cc0a86398a','NXXBoOtN','3','0.00','0.00','0.00','0.00','0.00','1440516534','','吴沙','http://wx.qlogo.cn/mmopen/2Q09xpKjDNb5gtb9dFa0VvgsiabmZqHLWpPj3k9iaedKU43tf2we57bEiavyKlB3lYF9rcUibQwdIdFicvNYQbLnbJibibYZa8N6jwQ/132','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('36','3','','eb7cb0453934aa2dd38857ab31bf02d6@we7.cc','8c8ff835b2cd431944456f7738fc090e','e8sf3gQ3','3','0.00','0.00','0.00','0.00','0.00','1440569906','','张立军','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JZTyW1W1pvbkXXB8Yd7TGKF0xHKE6mHTZft2YMftpibxnjc8JgB1XjUGMfARnz103dhbcAhu5C39GVpQmLjTVIb/132','','0','1','0','0','0','','','','','','','','','中国','新疆省','昌吉市','','','','','','','','','','','','','','','','','',''),
('37','3','','95f23d29e1fb609784107707eb1d45c7@we7.cc','f9c29eff11d781509f5de9a8df839102','DukdFO8z','3','0.00','0.00','0.00','0.00','0.00','1440594545','','db','http://wx.qlogo.cn/mmopen/aSPLicTawic0RYnJ4nIicGficMQAibppYyjyVmYiaZkooefx3J642Ln1TELvicjZ9DVSgcWtGWrj6zwFsuIib5Edib2Rl8w5Gv2QrFaGe/132','','0','2','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('38','3','','a71d06845e3d396697d844dcb23b84d0@we7.cc','83fbe45eab9378571a07757e791c9fc8','hkn7Nv9E','3','0.00','0.00','0.00','0.00','0.00','1440645966','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('39','3','','f74aeea98bca7f14f7972fd2caae73a4@we7.cc','b064051a245651839397694512c1ba4d','a7I248X3','3','0.00','0.00','0.00','0.00','0.00','1440657108','','S經','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6IWBVic72PQJMbkFxNZiaicIzbKGhJlxCIw2WOnuzaSqIaGx7B8khpPiblxCrDL1vpPXKzvJ8IL6t2vyibDfPNuX3YjZ/132','','0','2','0','0','0','','','','','','','','','爱尔兰','凯里省','','','','','','','','','','','','','','','','','','',''),
('40','3','','9c28df26e81e67d50dde0207818c4e93@we7.cc','6990aa0e677cc47b16e1c07827fff3ff','wmd8m24u','3','0.00','0.00','0.00','0.00','0.00','1440720781','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('41','3','','8f5a009af310544808bfa60dbc840c26@we7.cc','7114a2081c2922f16344f77fe94a48da','w8h7s6tz','3','0.00','0.00','0.00','0.00','0.00','1440729363','','','http://wx.qlogo.cn/mmopen/2Q09xpKjDNbkNfbicMUvlfwiaRASQTeavtuY5MeLy9H3oXRLIeRYH12VffR2AzK5yHwg0E4TlcVbb5y1fOibfTg9JjjOSR5Xgwr/132','','0','1','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('42','3','','611dfbf2119c89fb1fb4b7314bfe60b3@we7.cc','78740f50f2f57cf0d962c3cb6a69bb2b','jaA6e0NA','3','0.00','0.00','0.00','0.00','0.00','1440771793','','光','http://wx.qlogo.cn/mmopen/ajNVdqHZLLCzLVL2BmxSg07CEf3icoqltk6iakvXlCCQhLfUMHIrTqFxfI9h8GBd6w055L52aLxH5oyfGxiboLuDQ/132','','0','1','0','0','0','','','','','','','','','中国','福建省','福州市','','','','','','','','','','','','','','','','','',''),
('43','3','','0e7d27412c54ac1c820300264261c876@we7.cc','2c4ebd0a802c4fda97424fd932f9a3ae','k1UH347E','3','0.00','0.00','0.00','0.00','0.00','1440825078','','阿楠','http://wx.qlogo.cn/mmopen/2Q09xpKjDNYxZk4ciad9Hp5oerNFooCh4MTegXkyic8VFgkM7L9Rt0GQJw0cooicZk5PJNSbEo53C0aSzFrokaWsHar2U7RQj2R/132','','0','2','0','0','0','','','','','','','','','中国','山东省','潍坊市','','','','','','','','','','','','','','','','','',''),
('44','3','','ea3f2d0320cabbb8ab2d9983c7062409@we7.cc','442fc8bd3de60dd121cd354bf02a4789','nqDa4b64','3','0.00','0.00','0.00','0.00','0.00','1440831824','','A希顿美业云南技术总监☞龚雪','http://wx.qlogo.cn/mmopen/yyAymo2X0m3o4Rx4EAgph4lus7xd3ts2lMicC4ltvJicXRO2fcTkARc4dkf6prSw5o0HuqY3CMicS1tyqZY54zjGT4apIWYl8kr/132','','0','2','0','0','0','','','','','','','','','中国','云南省','丽江市','','','','','','','','','','','','','','','','','',''),
('45','3','','ff304573c04ff785ce3a87444b5cbf31@we7.cc','ac34b85f2e06a9cb8297c1527ddb7ba9','J8i5g5rv','3','0.00','0.00','0.00','0.00','0.00','1440982058','','菲','http://wx.qlogo.cn/mmopen/r48cSSlr7jiaGk8wY9E1RoqZzPN68IogN61b4lxdP0ndsgKXz0drnKZ6xwK4CFzJWBGPLQicfPyUwkKsib8IhQFLA/132','','0','2','0','0','0','','','','','','','','','中国','山东省','烟台市','','','','','','','','','','','','','','','','','',''),
('46','3','','ff304573c04ff785ce3a87444b5cbf31@we7.cc','98a14bdfaaf84865ae6e4979c6abe28a','Pv0Z0Swh','3','0.00','0.00','0.00','0.00','0.00','1440982058','','菲','http://wx.qlogo.cn/mmopen/r48cSSlr7jiaGk8wY9E1RoqZzPN68IogN61b4lxdP0ndsgKXz0drnKZ6xwK4CFzJWBGPLQicfPyUwkKsib8IhQFLA/132','','0','2','0','0','0','','','','','','','','','中国','山东省','烟台市','','','','','','','','','','','','','','','','','',''),
('47','3','','446d35762c743c012ca3e18461856227@we7.cc','fe6df711c6805023cb9683bc09997ebe','M9Hj06v8','3','0.00','0.00','0.00','0.00','0.00','1441108373','','郑珍秀','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6L9icts53icZeUfwP7gQQ9oaDp0iapVapo4W5ibyBv0hqZ9NGiac3lKTG1ylqF3HAgibfHia5sZzTaAm3axdFG2Pv4ahbO/132','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('48','3','','36c1cce376afc4c7a279738c4a36ebff@we7.cc','fc937770990a937c53b15e68495e3553','AOKylkKR','3','0.00','0.00','0.00','0.00','0.00','1441180260','','喵喵姐','http://wx.qlogo.cn/mmopen/aSPLicTawic0SicDticlfe4eMYkqwBFnrqE9oIcPMNZ8LEhvA3Upds42Gicjj5fp4BSdib79dzicsROdbdCnwts7xpK8QLAkdz8gMSA/132','','0','2','0','0','0','','','','','','','','','中国','宁夏省','石嘴山市','','','','','','','','','','','','','','','','','',''),
('49','3','','be6e9501f485e04f15054c85f72a4009@we7.cc','8ae0fc8716c7a564cd9e09db25fb8186','B39X9iXP','3','0.00','0.00','0.00','0.00','0.00','1441605353','','juggle','http://wx.qlogo.cn/mmopen/PiajxSqBRaEJXljVuZKCoR6aWkwzmcmGUo8RnDuoicSPibQgLPQPBPtEct9J5g1JNdWC4Q1aYjXoA0WLaoYEvUD8Q/132','','0','1','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('50','3','','6b90029a01d31a70f36f0fea2dd85213@we7.cc','251c7bba73f4b21465d54c829dcae908','KFfafNFr','3','0.00','0.00','0.00','0.00','0.00','1441617562','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('51','3','','0222705e4c16811446a1e307f7381e28@we7.cc','75aeec0f3b534e836b09f6c704450768','eT8DM74R','3','0.00','0.00','0.00','0.00','0.00','1441626811','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('52','3','','2c2efb74ab399063759dc6f6269cf71a@we7.cc','7b0a26f36550e5addf1009fc0d1ffbaa','V030fvZf','3','0.00','0.00','0.00','0.00','0.00','1441631293','','短发女汉子@','http://wx.qlogo.cn/mmopen/ZnAqAt50TibdcOPl8k6icEFTesibJSD0XGBmxkxnEZ14o5HtYA5RS9XV4gtI6HbzG9mbKCfq439dq11BKr5tKVFMDzRhG7piaibM7/132','','0','2','0','0','0','','','','','','','','','中国','山西省','晋中市','','','','','','','','','','','','','','','','','',''),
('53','3','','2a0762aaacbd09898b85efbf9be8967d@we7.cc','1706110bb686bd40cc9a8d4c3a0f7949','znNKyng2','3','0.00','0.00','0.00','0.00','0.00','1441681576','','一曦时光〆霞','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JEJpjHSx8Het1tWhkHs8qXuVrTzlmnzZcA05nLSFhviaZRf9XVrFEic4thdXRiaro26ibV3TeyibSXrZ3JTFcoGC8KT/132','','0','2','0','0','0','','','','','','','','','中国','云南省','普洱市','','','','','','','','','','','','','','','','','',''),
('54','3','','50326e6a526f254e9dce2ae7c8465d42@we7.cc','01aea3bdf1fec5d59c168921cb22f70e','yzjyDOyh','3','0.00','0.00','0.00','0.00','0.00','1441725984','','珍珠依然耀眼','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JVAf7b5lyflZTgXHVvVKFe0cSJh9NwU4ia212UA0QvmLGNNRUSE85ibyfMfYicA0FCsUALrrLk650A7UyJV22ibGsZ/132','','0','2','0','0','0','','','','','','','','','直布罗陀','','','','','','','','','','','','','','','','','','','',''),
('55','3','','e9c54e9a787875193945f987ad52620c@we7.cc','12c2ab73653eec532bb6267f35dae838','G7mQMie7','3','0.00','0.00','0.00','0.00','0.00','1441776578','','家具','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6JwCAM0EmiaplEic2RttvMIhUbt1oo59eV2Hj9upcgGt05DnbB5LjogaBFBg0agodvA3AicSsf5Bia5ltlmaD4IyRWo/132','','0','2','0','0','0','','','','','','','','','中国','广东省','深圳市','','','','','','','','','','','','','','','','','',''),
('56','3','','90bfbca12c36a4a8914916773e9ba3ce@we7.cc','4290f99c326edb7f8f7586d50dbc9870','OdWDeKks','3','0.00','0.00','0.00','0.00','0.00','1441801519','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('57','3','','897f18340a072883448dea47de5de4b9@we7.cc','d7adcae660d23f07919c5922b1a9aa38','TKlfMMeK','3','0.00','0.00','0.00','0.00','0.00','1441810316','','『dеиG.yЦ』ling','http://wx.qlogo.cn/mmopen/BKtQ1n1Dd6IkpicDXGIicyD8FlTUicR9ZF4pibG6AjC6vQ8nyJPkk8qsFTYlzSD2Hjiaakz6UYAuCqG7MfRGL3GicYuYeL6312zWCE/132','','0','2','0','0','0','','','','','','','','','中国','广东省','广州市','','','','','','','','','','','','','','','','','',''),
('58','3','','329cfb113c233ed9a3aedb515930464c@we7.cc','655af35502a160f30fdc9d5285b0e3af','U14H99uV','3','0.00','0.00','0.00','0.00','0.00','1441870562','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('59','3','','2aee387a5c072cbfa0f1f6f932b666c1@we7.cc','78588c730e2476e5c2be511a939bd749','IHEC4M6D','3','0.00','0.00','0.00','0.00','0.00','1441970848','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('60','3','','6a204d980eca3809197fa99a74696f17@we7.cc','87e3e462fed5416bb2038d5d0f1b2b49','nQCpknB5','3','0.00','0.00','0.00','0.00','0.00','1441979584','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('61','3','','4576bda9baa06608848c5ae518f7bedc@we7.cc','ff0c5fade59f9457b2ae7d4ff1cb9083','C73xztn6','3','0.00','0.00','0.00','0.00','0.00','1441981484','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('62','3','','4a6a3485bf778ba401d958825384877c@we7.cc','beade5487029cb8771809edbda8bc1f3','V3wWl0J2','3','0.00','0.00','0.00','0.00','0.00','1442033528','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('63','3','','275f451fa4c0cb2067bd2c3082b7ffc7@we7.cc','a766d92e228ae22aad82eba8727db562','lmrsg8Sn','3','0.00','0.00','0.00','0.00','0.00','1442042475','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('64','3','','5d8a046a602238d0ce6bb2c584f98a7c@we7.cc','d08bbe81b7ee1c1a99b63a33fa58f378','z8I142TT','3','0.00','0.00','0.00','0.00','0.00','1442043710','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('65','3','','ea6bd60e3477345e13335de939904596@we7.cc','d83c70e05223e555ba44ae6d2e4ca2fa','RlY8I24z','3','0.00','0.00','0.00','0.00','0.00','1442105311','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('66','3','','344fd6f959c19e4516267c145316388c@we7.cc','58d588b6a35ce00f6b4be710b84d4575','tFX83SWw','3','0.00','0.00','0.00','0.00','0.00','1442112869','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('67','3','','5e274d20be27fd22565745bc08fba227@we7.cc','eddedc9be106c7a9212f2d1e289972d1','Mp436PPN','3','0.00','0.00','0.00','0.00','0.00','1442138357','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('68','3','','9171e8ae8c56af25dae79e57e38b732b@we7.cc','ebcf457bc256daf0075066fc9e23e600','rsS55Ko5','3','0.00','0.00','0.00','0.00','0.00','1442251599','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('69','3','','fceec35085e8fe63bf0858c6aed77536@we7.cc','93a305ca1fd92f457eff5715fb2f93a7','wlAD884j','3','0.00','0.00','0.00','0.00','0.00','1442293689','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('70','3','','db81b54d3edb478d9e5a34806ac57f3e@we7.cc','15befe67756c043b290cc43db3c645b6','O2NMDfFn','3','0.00','0.00','0.00','0.00','0.00','1442301454','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('71','3','','e1e14a09d0f4c5acb5831c10c82763c0@we7.cc','a3e72b057885df304de757bf9e218535','Ti9sBcCZ','3','0.00','0.00','0.00','0.00','0.00','1442301555','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('72','3','','7bd49e1bab60360a5648e55d73940a8b@we7.cc','e6005740b28ad8482d34c69b424fc900','C0raZPuE','3','0.00','0.00','0.00','0.00','0.00','1442308446','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('73','3','','846081b3de855b6c0ee2444b7bbadb4a@we7.cc','7ecd89920436446a683e837887a11c00','E55w5vT5','3','0.00','0.00','0.00','0.00','0.00','1442322808','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('74','3','','779c0321bae668e5295902f8c51f0863@we7.cc','94bea581721ec9202928b00913065d54','pYFxlg4x','3','0.00','0.00','0.00','0.00','0.00','1442356137','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
('75','3','','29296a873c395bad0933e5410ca7551d@we7.cc','811c0e6bd23d71c333fe07fd409c5b15','yNuVTt0z','3','0.00','0.00','0.00','0.00','0.00','1442385080','','','','','0','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');


DROP TABLE IF EXISTS ims_mc_oauth_fans;
CREATE TABLE `ims_mc_oauth_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_openid` varchar(50) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_oauthopenid_acid` (`oauth_openid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_menu_event;
CREATE TABLE `ims_menu_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `picmd5` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `picmd5` (`picmd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_mobilenumber;
CREATE TABLE `ims_mobilenumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dateline` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_modules;
CREATE TABLE `ims_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '',
  `ability` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `settings` tinyint(1) NOT NULL DEFAULT '0',
  `subscribes` varchar(500) NOT NULL DEFAULT '',
  `handles` varchar(500) NOT NULL DEFAULT '',
  `isrulefields` tinyint(1) NOT NULL DEFAULT '0',
  `issystem` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issolution` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `target` int(10) unsigned NOT NULL DEFAULT '0',
  `iscard` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO ims_modules VALUES 
('1','basic','system','基本文字回复','1.0','和您进行简单对话','一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('2','news','system','基本混合图文回复','1.0','为你提供生动的图文资讯','一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('3','music','system','基本音乐回复','1.0','提供语音、音乐等音频类回复','在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('4','userapi','system','自定义接口回复','1.1','更方便的第三方接口设置','自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('5','recharge','system','会员中心充值模块','1.0','提供会员充值功能','','WeEngine Team','http://www.we7.cc/','0','','','0','1','0','0','0'),
('6','custom','system','多客服转接','1.0.0','用来接入腾讯的多客服系统','','WeEngine Team','http://bbs.we7.cc','0','a:0:{}','a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}','1','1','0','0','0'),
('7','images','system','基本图片回复','1.0','提供图片回复','在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('8','video','system','基本视频回复','1.0','提供视频回复','在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('9','voice','system','基本语音回复','1.0','提供语音回复','在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。','WeEngine Team','http://www.we7.cc/','0','','','1','1','0','0','0'),
('10','we7_business','business','周边商户','1.6','提供商家信息的添加、聚合及LBS的查询。','','WeEngine Team','http://bbs.we7.cc/forum.php?mod=forumdisplay&fid=36&filter=typeid&typeid=1','1','a:0:{}','a:1:{i:0;s:8:\"location\";}','0','0','0','0','0'),
('11','ewei_shopping','business','微商城','6.4.2','微商城','微商城','WeEngine Team & ewei','','1','a:0:{}','a:1:{i:0;s:4:\"text\";}','0','0','0','0','0'),
('12','hl_zzz','activity','做粽子','2.0','瑞午节活动','每天系统默认给予10次（可以后台自定义），想要赶快做出XX，那就邀请好友来助威，让你的好友送你体力赚X吧','皓蓝','','0','a:0:{}','a:1:{i:0;s:4:\"text\";}','1','0','0','0','0'),
('13','ewei_bigwheel','activity','大转盘','1.1.4','大转盘营销抽奖','大转盘营销抽奖','ewei','','0','a:0:{}','a:1:{i:0;s:4:\"text\";}','1','0','0','0','0'),
('14','chats','system','发送客服消息','1.0','公众号可以在粉丝最后发送消息的48小时内无限制发送消息','','WeEngine Team','http://www.we7.cc/','0','','','0','1','0','0','0'),
('15','wl_heka','activity','送贺卡','1.7','新年贺卡，生日贺卡，同窗贺卡','新年贺卡，生日贺卡，同窗贺卡','超级无聊 &amp; WeEngine Team','','0','a:0:{}','a:1:{i:0;s:4:\"text\";}','1','0','0','0','0'),
('16','we7_research','customer','预约与调查','4.2','可以快速生成调查表单或则预约记录','','WeEngine Team','http://bbs.we7.cc','0','a:0:{}','a:1:{i:0;s:4:\"text\";}','1','0','0','0','0'),
('17','ewei_exam','business','微考试','2.5','微考试系统','考试系统,判断,单选,多选,用于培训机构及学校','ewei','','0','a:0:{}','a:1:{i:0;s:4:\"text\";}','1','0','0','0','0'),
('18','we7_demo','other','官方示例','1.0','此模块提供基本的功能展示','此模块提供基本的功能展示','微擎团队','http://bbs.we7.cc/','1','a:13:{i:0;s:4:\"text\";i:1;s:5:\"image\";i:2;s:5:\"voice\";i:3;s:5:\"video\";i:4;s:8:\"location\";i:5;s:4:\"link\";i:6;s:9:\"subscribe\";i:7;s:11:\"unsubscribe\";i:8;s:2:\"qr\";i:9;s:5:\"trace\";i:10;s:5:\"click\";i:11;s:4:\"view\";i:12;s:5:\"enter\";}','a:2:{i:0;s:8:\"location\";i:1;s:4:\"text\";}','1','0','0','0','0'),
('19','we7_wxwall','activity','微信墙','1.9.2','可以实时同步显示现场参与者发送的微信','微信墙又称微信大屏幕，是在展会、音乐会、婚礼现场等场所展示特定主题微信的大屏幕，大屏幕上可以同步显示现场参与者发送的微信，使场内外观众能够第一时间传递和获取现场信息。','WeEngine Team','http://bbs.we7.cc/forum.php?mod=forumdisplay&fid=36&filter=typeid&typeid=1','0','a:0:{}','a:1:{i:0;s:4:\"text\";}','1','0','0','0','0');


DROP TABLE IF EXISTS ims_modules_bindings;
CREATE TABLE `ims_modules_bindings` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL DEFAULT '',
  `entry` varchar(10) NOT NULL DEFAULT '',
  `call` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL,
  `do` varchar(30) NOT NULL,
  `state` varchar(200) NOT NULL,
  `direct` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`),
  KEY `idx_module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

INSERT INTO ims_modules_bindings VALUES 
('1','we7_business','menu','','商户列表','display','','0'),
('2','we7_business','menu','','添加商户','post','','0'),
('3','ewei_shopping','cover','','商城入口设置','list','','0'),
('4','ewei_shopping','menu','','订单管理','order','','0'),
('5','ewei_shopping','menu','','商品管理','goods','','0'),
('6','ewei_shopping','menu','','商品分类','category','','0'),
('7','ewei_shopping','menu','','物流管理','express','','0'),
('8','ewei_shopping','menu','','配送方式','dispatch','','0'),
('9','ewei_shopping','menu','','幻灯片管理','adv','','0'),
('10','ewei_shopping','menu','','维权与告警','notice','','0'),
('11','ewei_shopping','home','','商城','list','','0'),
('12','ewei_shopping','profile','','我的订单','myorder','','0'),
('13','hl_zzz','rule','','排名','awardlist','','0'),
('14','ewei_bigwheel','menu','','大转盘管理','manage','','0'),
('15','ewei_bigwheel','home','getItemTiles','','','','0'),
('16','wl_heka','menu','','贺卡管理','list','','0'),
('17','wl_heka','home','gethometiles','','','','0'),
('18','we7_research','menu','','预约活动列表','display','','0'),
('19','we7_research','menu','','新建预约活动','post','','0'),
('20','we7_research','home','gethometiles','','','','0'),
('21','we7_research','profile','','我的预约','myresearch','','0'),
('22','ewei_exam','cover','','微考试入口设置','index','','0'),
('23','ewei_exam','cover','','试卷入口设置','paperlist','','0'),
('24','ewei_exam','cover','','课程入口设置','courselist','','0'),
('25','ewei_exam','cover','','我的预约入口设置','reservelist','','0'),
('26','ewei_exam','menu','','试卷类型','paper_type','','0'),
('27','ewei_exam','menu','','试卷管理','paper','','0'),
('28','ewei_exam','menu','','试卷分类','paper_category','','0'),
('29','ewei_exam','menu','','试题管理','question','','0'),
('30','ewei_exam','menu','','题库管理','pool','','0'),
('31','ewei_exam','menu','','试题导入','upload_question','','0'),
('32','ewei_exam','menu','','课程管理','course','','0'),
('33','ewei_exam','menu','','课程分类','course_category','','0'),
('34','ewei_exam','menu','','课程预定','reserve','','0'),
('35','ewei_exam','menu','','用户管理','member','','0'),
('36','ewei_exam','menu','','系统设置','sysset','','0'),
('37','ewei_exam','home','getItemTiles','','','','0'),
('38','we7_demo','cover','','入口1','index1','','0'),
('39','we7_demo','cover','','入口2（不需登录）','index2','','1'),
('40','we7_demo','menu','','管理1','manage1','','0'),
('41','we7_demo','menu','','管理2','manage2','','0'),
('42','we7_demo','home','','导航1','nav1','','0'),
('43','we7_demo','home','','导航2','nav2','','0'),
('44','we7_demo','profile','','中心1','uc1','','0'),
('45','we7_demo','profile','','中心2','uc2','','0'),
('46','we7_demo','shortcut','','快捷1','quick1','','0'),
('47','we7_demo','shortcut','','快捷2','quick2','','0'),
('48','we7_demo','function','','页面1','direct1','','0'),
('49','we7_business','home','getHomeTiles','','','','0'),
('50','we7_wxwall','rule','','查看内容','detail','','0'),
('51','we7_wxwall','rule','','审核内容','manage','','0'),
('52','we7_wxwall','rule','','中奖名单','awardlist','','0'),
('53','we7_wxwall','rule','','黑名单','blacklist','','0');


DROP TABLE IF EXISTS ims_music_reply;
CREATE TABLE `ims_music_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `hqurl` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_news_reply;
CREATE TABLE `ims_news_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `incontent` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(64) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_profile_fields;
CREATE TABLE `ims_profile_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `displayorder` smallint(6) NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `unchangeable` tinyint(1) NOT NULL DEFAULT '0',
  `showinregister` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

INSERT INTO ims_profile_fields VALUES 
('1','realname','1','真实姓名','','0','1','1','1'),
('2','nickname','1','昵称','','1','1','0','1'),
('3','avatar','1','头像','','1','0','0','0'),
('4','qq','1','QQ号','','0','0','0','1'),
('5','mobile','1','手机号码','','0','0','0','0'),
('6','vip','1','VIP级别','','0','0','0','0'),
('7','gender','1','性别','','0','0','0','0'),
('8','birthyear','1','出生生日','','0','0','0','0'),
('9','constellation','1','星座','','0','0','0','0'),
('10','zodiac','1','生肖','','0','0','0','0'),
('11','telephone','1','固定电话','','0','0','0','0'),
('12','idcard','1','证件号码','','0','0','0','0'),
('13','studentid','1','学号','','0','0','0','0'),
('14','grade','1','班级','','0','0','0','0'),
('15','address','1','邮寄地址','','0','0','0','0'),
('16','zipcode','1','邮编','','0','0','0','0'),
('17','nationality','1','国籍','','0','0','0','0'),
('18','resideprovince','1','居住地址','','0','0','0','0'),
('19','graduateschool','1','毕业学校','','0','0','0','0'),
('20','company','1','公司','','0','0','0','0'),
('21','education','1','学历','','0','0','0','0'),
('22','occupation','1','职业','','0','0','0','0'),
('23','position','1','职位','','0','0','0','0'),
('24','revenue','1','年收入','','0','0','0','0'),
('25','affectivestatus','1','情感状态','','0','0','0','0'),
('26','lookingfor','1',' 交友目的','','0','0','0','0'),
('27','bloodtype','1','血型','','0','0','0','0'),
('28','height','1','身高','','0','0','0','0'),
('29','weight','1','体重','','0','0','0','0'),
('30','alipay','1','支付宝帐号','','0','0','0','0'),
('31','msn','1','MSN','','0','0','0','0'),
('32','email','1','电子邮箱','','0','0','0','0'),
('33','taobao','1','阿里旺旺','','0','0','0','0'),
('34','site','1','主页','','0','0','0','0'),
('35','bio','1','自我介绍','','0','0','0','0'),
('36','interest','1','兴趣爱好','','0','0','0','0');


DROP TABLE IF EXISTS ims_qrcode;
CREATE TABLE `ims_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL DEFAULT '0',
  `qrcid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `keyword` varchar(100) NOT NULL,
  `model` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ticket` varchar(250) NOT NULL DEFAULT '',
  `expire` int(10) unsigned NOT NULL DEFAULT '0',
  `subnum` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `extra` int(10) unsigned NOT NULL,
  `url` varchar(80) NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_qrcid` (`qrcid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_qrcode_stat;
CREATE TABLE `ims_qrcode_stat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `acid` int(10) unsigned NOT NULL,
  `qid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `qrcid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `scene_str` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_research;
CREATE TABLE `ims_research` (
  `reid` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `information` varchar(500) NOT NULL DEFAULT '',
  `thumb` varchar(200) NOT NULL DEFAULT '',
  `inhome` tinyint(4) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `starttime` int(10) NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pretotal` int(10) unsigned NOT NULL DEFAULT '1',
  `alltotal` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '预约总人数',
  `noticeemail` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '通知手机号码',
  PRIMARY KEY (`reid`),
  KEY `weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_research_data;
CREATE TABLE `ims_research_data` (
  `redid` bigint(20) NOT NULL AUTO_INCREMENT,
  `reid` int(11) NOT NULL,
  `rerid` int(11) NOT NULL,
  `refid` int(11) NOT NULL,
  `data` varchar(800) NOT NULL,
  PRIMARY KEY (`redid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_research_fields;
CREATE TABLE `ims_research_fields` (
  `refid` int(11) NOT NULL AUTO_INCREMENT,
  `reid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `essential` tinyint(4) NOT NULL DEFAULT '0',
  `bind` varchar(30) NOT NULL DEFAULT '',
  `value` varchar(300) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  `displayorder` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`refid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_research_reply;
CREATE TABLE `ims_research_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `reid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_research_rows;
CREATE TABLE `ims_research_rows` (
  `rerid` int(11) NOT NULL AUTO_INCREMENT,
  `reid` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `createtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rerid`),
  KEY `reid` (`reid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_rule;
CREATE TABLE `ims_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `module` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO ims_rule VALUES 
('1','0','城市天气','userapi','255','1'),
('2','0','百度百科','userapi','255','1'),
('3','0','即时翻译','userapi','255','1'),
('4','0','今日老黄历','userapi','255','1'),
('5','0','看新闻','userapi','255','1'),
('6','0','快递查询','userapi','255','1'),
('7','1','个人中心入口设置','cover','0','1'),
('8','1','微擎团队入口设置','cover','0','1'),
('9','2','测试','basic','0','1'),
('10','2','大转盘','ewei_bigwheel','0','1'),
('11','3','商城入口设置','cover','0','1'),
('12','3','欢迎关注','basic','0','1');


DROP TABLE IF EXISTS ims_rule_keyword;
CREATE TABLE `ims_rule_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `module` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_content` (`content`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO ims_rule_keyword VALUES 
('1','1','0','userapi','^.+天气$','3','255','1'),
('2','2','0','userapi','^百科.+$','3','255','1'),
('3','2','0','userapi','^定义.+$','3','255','1'),
('4','3','0','userapi','^@.+$','3','255','1'),
('5','4','0','userapi','日历','1','255','1'),
('6','4','0','userapi','万年历','1','255','1'),
('7','4','0','userapi','黄历','1','255','1'),
('8','4','0','userapi','几号','1','255','1'),
('9','5','0','userapi','新闻','1','255','1'),
('10','6','0','userapi','^(申通|圆通|中通|汇通|韵达|顺丰|EMS) *[a-z0-9]{1,}$','3','255','1'),
('11','7','1','cover','个人中心','1','0','1'),
('12','8','1','cover','首页','1','0','1'),
('13','9','2','basic','测试','1','0','1'),
('15','10','2','ewei_bigwheel','大转盘','1','0','1'),
('16','11','3','cover','101','1','0','1'),
('19','12','3','basic','欢迎关注','1','0','1');


DROP TABLE IF EXISTS ims_shopping_adv;
CREATE TABLE `ims_shopping_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_enabled` (`enabled`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_cart;
CREATE TABLE `ims_shopping_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `goodsid` int(11) NOT NULL,
  `goodstype` tinyint(1) NOT NULL DEFAULT '1',
  `from_user` varchar(50) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `optionid` int(10) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_openid` (`from_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_category;
CREATE TABLE `ims_shopping_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `thumb` varchar(255) NOT NULL COMMENT '分类图片',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) NOT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_shopping_category VALUES 
('1','3','产品','','0','1','','0','1');


DROP TABLE IF EXISTS ims_shopping_dispatch;
CREATE TABLE `ims_shopping_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `dispatchname` varchar(50) DEFAULT '',
  `dispatchtype` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `firstprice` decimal(10,2) DEFAULT '0.00',
  `secondprice` decimal(10,2) DEFAULT '0.00',
  `firstweight` int(11) DEFAULT '0',
  `secondweight` int(11) DEFAULT '0',
  `express` int(11) DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_shopping_dispatch VALUES 
('1','3','快递','0','0','1.00','1.00','1000','1000','0','');


DROP TABLE IF EXISTS ims_shopping_express;
CREATE TABLE `ims_shopping_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `express_name` varchar(50) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `express_price` varchar(10) DEFAULT '',
  `express_area` varchar(100) DEFAULT '',
  `express_url` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_shopping_express VALUES 
('1','3','顺丰','0','','','');


DROP TABLE IF EXISTS ims_shopping_feedback;
CREATE TABLE `ims_shopping_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1为维权，2为告擎',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0未解决，1用户同意，2用户拒绝',
  `feedbackid` varchar(30) NOT NULL COMMENT '投诉单号',
  `transid` varchar(30) NOT NULL COMMENT '订单号',
  `reason` varchar(1000) NOT NULL COMMENT '理由',
  `solution` varchar(1000) NOT NULL COMMENT '期待解决方案',
  `remark` varchar(1000) NOT NULL COMMENT '备注',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_weid` (`weid`),
  KEY `idx_feedbackid` (`feedbackid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_transid` (`transid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_goods;
CREATE TABLE `ims_shopping_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1为实体，2为虚拟',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `unit` varchar(5) NOT NULL DEFAULT '',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `goodssn` varchar(50) NOT NULL DEFAULT '',
  `productsn` varchar(50) NOT NULL DEFAULT '',
  `marketprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `costprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `originalprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价',
  `total` int(10) unsigned NOT NULL DEFAULT '0',
  `totalcnf` int(11) DEFAULT '0' COMMENT '0 拍下减库存 1 付款减库存 2 永久不减',
  `sales` int(10) unsigned NOT NULL DEFAULT '0',
  `spec` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maxbuy` int(11) DEFAULT '0',
  `usermaxbuy` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户最多购买数量',
  `hasoption` int(11) DEFAULT '0',
  `dispatch` int(11) DEFAULT '0',
  `thumb_url` text,
  `isnew` int(11) DEFAULT '0',
  `ishot` int(11) DEFAULT '0',
  `isdiscount` int(11) DEFAULT '0',
  `isrecommand` int(11) DEFAULT '0',
  `istime` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_shopping_goods VALUES 
('1','3','1','0','1','1','0','精纯调理套组','','盒','','','121','121','0.01','0.11','0.01','0.01','0','0','17','','1438583838','0.00','0.00','0','0','0','0','a:0:{}','0','0','0','1','0','1438583700','1438583700','19','0');


DROP TABLE IF EXISTS ims_shopping_goods_option;
CREATE TABLE `ims_shopping_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_goods_param;
CREATE TABLE `ims_shopping_goods_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `value` text,
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_order;
CREATE TABLE `ims_shopping_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `ordersn` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '-1取消状态，0普通状态，1为已付款，2为已发货，3为成功',
  `sendtype` tinyint(1) unsigned NOT NULL COMMENT '1为快递，2为自提',
  `paytype` tinyint(1) unsigned NOT NULL COMMENT '1为余额，2为在线，3为到付',
  `transid` varchar(30) NOT NULL DEFAULT '0' COMMENT '微信支付单号',
  `goodstype` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `remark` varchar(1000) NOT NULL DEFAULT '',
  `address` varchar(1024) NOT NULL DEFAULT '' COMMENT '收货地址信息',
  `expresscom` varchar(30) NOT NULL DEFAULT '',
  `expresssn` varchar(50) NOT NULL DEFAULT '',
  `express` varchar(200) NOT NULL DEFAULT '',
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `dispatch` int(10) DEFAULT '0',
  `paydetail` varchar(255) NOT NULL COMMENT '支付详情',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO ims_shopping_order VALUES 
('1','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','08031677','0.01','-1','1','0','0','1','','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','','','','0.01','0.00','0','','1438584084'),
('2','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','08036862','0.01','-1','1','2','1005120956201508030539141914','1','','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','','','','0.01','0.00','0','','1438585932'),
('3','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','08034264','0.01','-1','1','2','1005120956201508030539249664','1','','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','','','','0.01','0.00','0','','1438591033'),
('4','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','08034886','0.01','0','1','0','0','1','','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','','','','0.01','0.00','0','','1438591203'),
('5','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','08036846','0.01','3','1','2','0','1','工工','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','','','','0.01','0.00','0','','1438591214'),
('6','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','08038380','1.01','2','0','2','0','1','','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','申通','aasss','shentong','0.01','1.00','1','','1438592918'),
('7','3','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','09074647','1.01','1','0','2','1005120956201509070810701939','1','','欧任|18999999999||北京市|北京辖区|东城区|考虑考虑','','','','0.01','1.00','1','','1441603835'),
('8','3','oqCObuH6aFYMoynjvqV21PmoTgl8','09078875','1.01','0','0','0','0','1','','juggle|15012345678||北京市|北京辖区|东城区|1111','','','','0.01','1.00','1','','1441605597');


DROP TABLE IF EXISTS ims_shopping_order_goods;
CREATE TABLE `ims_shopping_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `orderid` int(10) unsigned NOT NULL,
  `goodsid` int(10) unsigned NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(10) unsigned NOT NULL DEFAULT '1',
  `optionid` int(10) DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `optionname` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO ims_shopping_order_goods VALUES 
('1','3','1','1','0.01','1','0','1438584084',''),
('2','3','2','1','0.01','1','0','1438585932',''),
('3','3','3','1','0.01','1','0','1438591033',''),
('4','3','4','1','0.01','1','0','1438591203',''),
('5','3','5','1','0.01','1','0','1438591214',''),
('6','3','6','1','0.01','1','0','1438592918',''),
('7','3','7','1','0.01','1','0','1441603835',''),
('8','3','8','1','0.01','1','0','1441605597','');


DROP TABLE IF EXISTS ims_shopping_product;
CREATE TABLE `ims_shopping_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) NOT NULL,
  `productsn` varchar(50) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `marketprice` decimal(10,0) unsigned NOT NULL,
  `productprice` decimal(10,0) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `spec` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_goodsid` (`goodsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_spec;
CREATE TABLE `ims_shopping_spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `displaytype` tinyint(3) unsigned NOT NULL,
  `content` text NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_shopping_spec_item;
CREATE TABLE `ims_shopping_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_specid` (`specid`),
  KEY `indx_show` (`show`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_site_article;
CREATE TABLE `ims_site_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `iscommend` tinyint(1) NOT NULL DEFAULT '0',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `template` varchar(300) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(500) NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT '',
  `credit` varchar(255) NOT NULL DEFAULT '',
  `incontent` tinyint(1) NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_site_category;
CREATE TABLE `ims_site_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `icon` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `template` varchar(300) NOT NULL DEFAULT '',
  `styleid` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL DEFAULT '',
  `ishomepage` tinyint(1) NOT NULL DEFAULT '0',
  `icontype` tinyint(1) unsigned NOT NULL,
  `css` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_site_multi;
CREATE TABLE `ims_site_multi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `site_info` text NOT NULL,
  `quickmenu` varchar(2000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `bindhost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ims_site_multi VALUES 
('1','1','微擎团队','1','','a:2:{s:8:\"template\";s:7:\"default\";s:12:\"enablemodule\";a:0:{}}','1',''),
('2','2','印象大鹏','2','','a:2:{s:8:\"template\";s:7:\"default\";s:12:\"enablemodule\";a:0:{}}','1',''),
('3','3','28days细胞级护理','3','','a:2:{s:8:\"template\";s:7:\"default\";s:12:\"enablemodule\";a:0:{}}','1','');


DROP TABLE IF EXISTS ims_site_nav;
CREATE TABLE `ims_site_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `section` tinyint(4) NOT NULL DEFAULT '0',
  `module` varchar(50) NOT NULL DEFAULT '',
  `displayorder` smallint(5) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `position` tinyint(4) NOT NULL DEFAULT '1',
  `url` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(500) NOT NULL DEFAULT '',
  `css` varchar(1000) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `categoryid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_site_slide;
CREATE TABLE `ims_site_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `displayorder` tinyint(4) NOT NULL DEFAULT '0',
  `multiid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_site_styles;
CREATE TABLE `ims_site_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ims_site_styles VALUES 
('1','1','1','微站默认模板_gC5C'),
('2','2','1','微站默认模板_u7DD'),
('3','3','1','微站默认模板_BekR');


DROP TABLE IF EXISTS ims_site_styles_vars;
CREATE TABLE `ims_site_styles_vars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `templateid` int(10) unsigned NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_site_templates;
CREATE TABLE `ims_site_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(30) NOT NULL,
  `version` varchar(64) NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `sections` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_site_templates VALUES 
('1','default','微站默认模板','','由微擎提供默认微站模板套系','微擎团队','http://we7.cc','1','0');


DROP TABLE IF EXISTS ims_solution_acl;
CREATE TABLE `ims_solution_acl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `module` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `eid` int(10) unsigned NOT NULL DEFAULT '0',
  `do` varchar(255) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_module` (`module`),
  KEY `idx_eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_stat_keyword;
CREATE TABLE `ims_stat_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` varchar(10) NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO ims_stat_keyword VALUES 
('1','2','9','13','2','1416881145','1416844800'),
('2','2','10','14','1','1421464724','1421424000'),
('3','3','11','16','1','1438583899','1438531200'),
('4','3','12','17','2','1438594059','1438531200'),
('5','3','12','18','2','1438594306','1438531200'),
('6','3','12','19','5','1438602802','1438531200'),
('7','3','12','19','1','1438678888','1438617600'),
('8','3','12','19','1','1438760192','1438704000'),
('9','3','12','19','4','1438844442','1438790400'),
('10','3','12','19','3','1439047478','1438963200'),
('11','3','12','19','3','1439219305','1439136000'),
('12','3','12','19','1','1439261123','1439222400'),
('13','3','12','19','2','1439366397','1439308800'),
('14','3','12','19','1','1439475282','1439395200'),
('15','3','12','19','7','1439554973','1439481600'),
('16','3','12','19','1','1439651037','1439568000'),
('17','3','12','19','2','1439907127','1439827200'),
('18','3','12','19','1','1440075543','1440000000'),
('19','3','12','19','3','1440341465','1440259200'),
('20','3','12','19','4','1440391367','1440345600'),
('21','3','12','19','6','1440516534','1440432000'),
('22','3','12','19','2','1440594545','1440518400'),
('23','3','12','19','2','1440657108','1440604800'),
('24','3','12','19','43','1440771793','1440691200'),
('25','3','12','19','2','1440831824','1440777600'),
('26','3','12','19','1','1440982031','1440950400'),
('27','3','12','19','1','1441108338','1441036800'),
('28','3','12','19','1','1441180220','1441123200'),
('29','3','12','19','18','1441631293','1441555200'),
('30','3','11','16','1','1441605460','1441555200'),
('31','3','12','19','2','1441725984','1441641600'),
('32','3','12','19','3','1441810316','1441728000'),
('33','3','12','19','10','1441888544','1441814400'),
('34','3','12','19','3','1441981484','1441900800'),
('35','3','12','19','3','1442043710','1441987200'),
('36','3','12','19','3','1442138357','1442073600'),
('37','3','12','19','6','1442322808','1442246400'),
('38','3','12','19','2','1442385080','1442332800');


DROP TABLE IF EXISTS ims_stat_msg_history;
CREATE TABLE `ims_stat_msg_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

INSERT INTO ims_stat_msg_history VALUES 
('1','2','0','0','','','','','0'),
('2','2','0','0','','','','','0'),
('3','2','0','0','','','','','0'),
('4','2','0','0','','','','','0'),
('5','2','0','0','','','','','0'),
('6','2','0','0','','','','','0'),
('7','2','0','0','','','','','0'),
('8','2','9','13','od9iCuI4r2zpwISB7DobC47YPheM','basic','a:4:{s:7:\"content\";s:6:\"测试\";s:8:\"original\";N;s:11:\"redirection\";b:0;s:6:\"source\";N;}','text','1416881018'),
('9','2','0','0','','','','','0'),
('10','2','0','0','','','','','0'),
('11','2','9','13','od9iCuEkcpZ93q0Sk-MLwxJ8FVrc','basic','a:4:{s:7:\"content\";s:6:\"测试\";s:8:\"original\";N;s:11:\"redirection\";b:0;s:6:\"source\";N;}','text','1416881066'),
('12','2','0','0','','','','','0'),
('13','2','0','0','','','','','0'),
('14','2','0','0','od9iCuEkcpZ93q0Sk-MLwxJ8FVrc','we7_business','a:2:{s:1:\"x\";s:9:\"23.125986\";s:1:\"y\";s:10:\"113.341934\";}','location','1416881372'),
('15','2','0','0','od9iCuI4r2zpwISB7DobC47YPheM','we7_business','a:2:{s:1:\"x\";s:9:\"33.603600\";s:1:\"y\";s:10:\"116.964462\";}','location','1416881483'),
('16','2','10','14','od9iCuEkcpZ93q0Sk-MLwxJ8FVrc','ewei_bigwheel','a:4:{s:7:\"content\";s:9:\"大转盘\";s:8:\"original\";N;s:11:\"redirection\";b:0;s:6:\"source\";N;}','text','1421464724'),
('17','3','11','16','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','cover','a:4:{s:7:\"content\";s:3:\"101\";s:8:\"original\";N;s:11:\"redirection\";b:0;s:6:\"source\";N;}','text','1438583899'),
('18','3','12','17','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438594021'),
('19','3','12','17','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438594033'),
('20','3','12','18','fromUser','basic','','event','1438594193'),
('21','3','12','18','fromUser','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:12:\"测试内容\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438594215'),
('22','3','12','19','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438594337'),
('23','3','12','19','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438594345'),
('24','3','12','19','fromUser','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:12:\"测试内容\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438594459'),
('25','3','12','19','fromUser','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:12:\"测试内容\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438602704'),
('26','3','0','0','fromUser','','','event','1438602709'),
('27','3','12','19','fromUser','basic','','event','1438602713'),
('28','3','12','19','oqCObuAo197RNNWbmHk0yq5kSMtE','basic','','event','1438678888'),
('29','3','0','0','oqCObuAo197RNNWbmHk0yq5kSMtE','','','event','1438678913'),
('30','3','12','19','oqCObuE2JtFb2nhyS6rtDMWqC9fs','basic','','event','1438760192'),
('31','3','0','0','oqCObuE2JtFb2nhyS6rtDMWqC9fs','','','event','1438760215'),
('32','3','12','19','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:4:\"/::<\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438621143'),
('33','3','12','19','oqCObuDFYaoC0V-EbvglZdflyK8E','basic','','event','1438844368'),
('34','3','12','19','oqCObuDFYaoC0V-EbvglZdflyK8E','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438844417'),
('35','3','12','19','oqCObuDFYaoC0V-EbvglZdflyK8E','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1438844434'),
('36','3','0','0','oqCObuDFYaoC0V-EbvglZdflyK8E','','','event','1438844443'),
('37','3','12','19','oqCObuPX5Qs0uytNDdYpwU79rTCE','basic','','event','1439025302'),
('38','3','12','19','oqCObuOr4WOWNHdnWMHjEhkp6lfE','basic','','event','1439041321'),
('39','3','12','19','oqCObuNxyaO1AmdFE4GvkNlZAOq0','basic','','event','1439047459'),
('40','3','12','19','oqCObuAg0uuy_PpOBOYDAe6NrNus','basic','','event','1439171810'),
('41','3','12','19','oqCObuKmFmysMw4iIaMSa2hxwH4U','basic','','event','1439203433'),
('42','3','12','19','oqCObuLKFMbEIaP7BwJg_HvTdfN0','basic','','event','1439219275'),
('43','3','12','19','oqCObuCir1x2HmR_7e_oGhrSDuls','basic','','event','1439261123'),
('44','3','0','0','oqCObuCir1x2HmR_7e_oGhrSDuls','','','event','1439261165'),
('45','3','12','19','oqCObuPX5Qs0uytNDdYpwU79rTCE','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439025311'),
('46','3','12','19','oqCObuNxyaO1AmdFE4GvkNlZAOq0','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439047465'),
('47','3','0','0','oqCObuKmFmysMw4iIaMSa2hxwH4U','','','event','1439384331'),
('48','3','12','19','oqCObuHDol51gtS6WCtUxlk1bkmk','basic','','event','1439475282'),
('49','3','12','19','oqCObuBml0vEy4jqejc546XgM8CU','basic','','event','1439492336'),
('50','3','12','19','oqCObuHDol51gtS6WCtUxlk1bkmk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439475309'),
('51','3','12','19','oqCObuBml0vEy4jqejc546XgM8CU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439492338'),
('52','3','12','19','oqCObuBml0vEy4jqejc546XgM8CU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439492354'),
('53','3','12','19','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439536336'),
('54','3','12','19','oqCObuLSDyD6u7ZVnHhVQ8X1WZOM','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439536341'),
('55','3','12','19','oqCObuJrxfdU0O8Q4hoY7FM3PsbA','basic','','event','1439554960'),
('56','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','','event','1439651037'),
('57','3','12','19','oqCObuKTABP6X03YbDnewFZNjDW0','basic','','event','1439829749'),
('58','3','12','19','oqCObuKxK8Yz6LMbDf7LWZVt7M6I','basic','','event','1439907091'),
('59','3','12','19','oqCObuGfraUW4_OqaqSr4jzzgFDk','basic','','event','1440075543'),
('60','3','0','0','oqCObuHDol51gtS6WCtUxlk1bkmk','','','event','1440285143'),
('61','3','12','19','oqCObuMxUSvy6gFt02LhlebGYO5M','basic','','event','1440295226'),
('62','3','12','19','oqCObuH3U-k6dhZxzeHcloM4naeI','basic','','event','1440309677'),
('63','3','12','19','oqCObuCPFRUOtBpblOHknVrvkF3g','basic','','event','1440341440'),
('64','3','0','0','oqCObuCPFRUOtBpblOHknVrvkF3g','','','event','1440341507'),
('65','3','12','19','oqCObuJ429pSQzl6JU6jqxH3lwcY','basic','','event','1440383070'),
('66','3','12','19','oqCObuHcjOSoSUTZNTYj1fk6_NDI','basic','','event','1440384481'),
('67','3','12','19','oqCObuMgh6Us5ZqBKEcsRK8_ORuc','basic','','event','1440386478'),
('68','3','12','19','oqCObuFV89348niLU-tVog3kzd0c','basic','','event','1440391342'),
('69','3','0','0','oqCObuJ429pSQzl6JU6jqxH3lwcY','','','event','1440411181'),
('70','3','12','19','oqCObuBLy3yvUlo3xERo552s6ewE','basic','','event','1440477291'),
('71','3','0','0','oqCObuMxUSvy6gFt02LhlebGYO5M','','','event','1440484199'),
('72','3','12','19','oqCObuDZX5vbEGnVlil2S9si67dg','basic','','event','1440485714'),
('73','3','12','19','oqCObuPq9mJUDd5M8oQntxR6rGHg','basic','','event','1440486048'),
('74','3','12','19','oqCObuFmkNP_fCZKf-1zR4mdmPFw','basic','','event','1440498940'),
('75','3','12','19','oqCObuKllTBRBJZpUj6_8YcR8fCU','basic','','event','1440514527'),
('76','3','12','19','oqCObuDqPk2iapQeZFEjVpe36bVU','basic','','event','1440516498'),
('77','3','12','19','oqCObuDocFvQgNHF0IGx-1OH-oTQ','basic','','event','1440569866'),
('78','3','12','19','oqCObuMxotpzWDjlTVJOvry-aqjk','basic','','event','1440594504'),
('79','3','12','19','oqCObuI1PCZokquFKC46OoaiuOGE','basic','','event','1440645961'),
('80','3','0','0','oqCObuI1PCZokquFKC46OoaiuOGE','','','event','1440646858'),
('81','3','12','19','oqCObuJyX1cw_N3CkKgmg-KBLdQA','basic','','event','1440657102'),
('82','3','12','19','oqCObuHK8XbmZHL6B0k683RefgSo','basic','','event','1440720771'),
('83','3','0','0','oqCObuHK8XbmZHL6B0k683RefgSo','','','event','1440720885'),
('84','3','12','19','oqCObuOeyCughbInZAoxJFhQtuwU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439543030'),
('85','3','12','19','oqCObuOeyCughbInZAoxJFhQtuwU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:6:\"你好\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439543057'),
('86','3','12','19','oqCObuOeyCughbInZAoxJFhQtuwU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:27:\"你们卖酵素多少一盒\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439543094'),
('87','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439651041'),
('88','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439651048'),
('89','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439651059'),
('90','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439651063'),
('91','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439651074'),
('92','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439878129'),
('93','3','12','19','oqCObuFTGUiHI9G1famJxlie9KeY','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439899785'),
('94','3','12','19','oqCObuKxK8Yz6LMbDf7LWZVt7M6I','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439907100'),
('95','3','12','19','oqCObuKxK8Yz6LMbDf7LWZVt7M6I','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439907134'),
('96','3','12','19','oqCObuKxK8Yz6LMbDf7LWZVt7M6I','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439907163'),
('97','3','12','19','oqCObuKxK8Yz6LMbDf7LWZVt7M6I','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1439907222'),
('98','3','12','19','oqCObuGfraUW4_OqaqSr4jzzgFDk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440075550'),
('99','3','12','19','oqCObuGfraUW4_OqaqSr4jzzgFDk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440075574'),
('100','3','12','19','oqCObuGfraUW4_OqaqSr4jzzgFDk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440075620'),
('101','3','12','19','oqCObuGfraUW4_OqaqSr4jzzgFDk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440075645'),
('102','3','12','19','oqCObuGfraUW4_OqaqSr4jzzgFDk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440075677'),
('103','3','12','19','oqCObuMxUSvy6gFt02LhlebGYO5M','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440297538'),
('104','3','12','19','oqCObuMxUSvy6gFt02LhlebGYO5M','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440303861'),
('105','3','12','19','oqCObuMxUSvy6gFt02LhlebGYO5M','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440305849'),
('106','3','12','19','oqCObuMxUSvy6gFt02LhlebGYO5M','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440339374'),
('107','3','12','19','oqCObuMgh6Us5ZqBKEcsRK8_ORuc','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440387563'),
('108','3','12','19','oqCObuFV89348niLU-tVog3kzd0c','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440391351'),
('109','3','12','19','oqCObuFV89348niLU-tVog3kzd0c','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440391377'),
('110','3','12','19','oqCObuMgh6Us5ZqBKEcsRK8_ORuc','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440396471'),
('111','3','12','19','oqCObuDZX5vbEGnVlil2S9si67dg','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440485798'),
('112','3','12','19','oqCObuPq9mJUDd5M8oQntxR6rGHg','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440486053'),
('113','3','12','19','oqCObuFmkNP_fCZKf-1zR4mdmPFw','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440498976'),
('114','3','12','19','oqCObuKllTBRBJZpUj6_8YcR8fCU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440514532'),
('115','3','12','19','oqCObuKllTBRBJZpUj6_8YcR8fCU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440514539'),
('116','3','12','19','oqCObuKllTBRBJZpUj6_8YcR8fCU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440514556'),
('117','3','12','19','oqCObuDqPk2iapQeZFEjVpe36bVU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440516698'),
('118','3','12','19','oqCObuMxotpzWDjlTVJOvry-aqjk','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440594508'),
('119','3','12','19','oqCObuI1PCZokquFKC46OoaiuOGE','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440645975'),
('120','3','12','19','oqCObuJyX1cw_N3CkKgmg-KBLdQA','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440657652'),
('121','3','12','19','oqCObuHK8XbmZHL6B0k683RefgSo','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440720846'),
('122','3','12','19','oqCObuHK8XbmZHL6B0k683RefgSo','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440720850'),
('123','3','12','19','oqCObuCeY7o58irKCqvoHMRNqFcQ','basic','','event','1440729352'),
('124','3','12','19','oqCObuCeY7o58irKCqvoHMRNqFcQ','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440729612'),
('125','3','12','19','oqCObuA2HyLSe5Qb3uXiweTQng1c','basic','','event','1440771779'),
('126','3','12','19','oqCObuJDp1NQzQ0a3dszhBR_D7d4','basic','','event','1440825061'),
('127','3','12','19','oqCObuAb6-jQCTgr3hj4d67q7aQI','basic','','event','1440831807'),
('128','3','12','19','oqCObuLOAOVtaIaYcHL0Xl5eWdDU','basic','','event','1440982031'),
('129','3','12','19','oqCObuATA2IOB20aU4-dhA48B_tE','basic','','event','1441108338'),
('130','3','12','19','oqCObuGkZsm8rXrnJZfP9ZlWCAmc','basic','','event','1441180220'),
('131','3','12','19','oqCObuA2HyLSe5Qb3uXiweTQng1c','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440772179'),
('132','3','12','19','oqCObuA2HyLSe5Qb3uXiweTQng1c','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440772184'),
('133','3','12','19','oqCObuAb6-jQCTgr3hj4d67q7aQI','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440831846'),
('134','3','12','19','oqCObuLOAOVtaIaYcHL0Xl5eWdDU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1440982034'),
('135','3','12','19','oqCObuATA2IOB20aU4-dhA48B_tE','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441108345'),
('136','3','12','19','oqCObuATA2IOB20aU4-dhA48B_tE','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441108368'),
('137','3','12','19','oqCObuH6aFYMoynjvqV21PmoTgl8','basic','','event','1441605325'),
('138','3','12','19','oqCObuLOU2ZxifbeP0UXcjXMqYn0','basic','','event','1441617534'),
('139','3','0','0','oqCObuLOU2ZxifbeP0UXcjXMqYn0','','','event','1441617550'),
('140','3','12','19','oqCObuI028lhaemMbyEyDJ4kqawc','basic','','event','1441626781'),
('141','3','12','19','oqCObuI028lhaemMbyEyDJ4kqawc','basic','','event','1441626781'),
('142','3','0','0','oqCObuI028lhaemMbyEyDJ4kqawc','','','event','1441627264'),
('143','3','12','19','oqCObuH6aFYMoynjvqV21PmoTgl8','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441605394'),
('144','3','12','19','oqCObuH6aFYMoynjvqV21PmoTgl8','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:3:\"888\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441605403'),
('145','3','11','16','oqCObuH6aFYMoynjvqV21PmoTgl8','cover','a:4:{s:7:\"content\";s:3:\"101\";s:8:\"original\";N;s:11:\"redirection\";b:0;s:6:\"source\";N;}','text','1441605460'),
('146','3','12','19','oqCObuH6aFYMoynjvqV21PmoTgl8','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:68:\"http://wx.we78.com/app/index.php?i=3&c=entry&do=list&m=ewei_shopping\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441605882'),
('147','3','12','19','oqCObuLOU2ZxifbeP0UXcjXMqYn0','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441617536'),
('148','3','12','19','oqCObuI028lhaemMbyEyDJ4kqawc','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441626938'),
('149','3','12','19','oqCObuI028lhaemMbyEyDJ4kqawc','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441626946'),
('150','3','12','19','oqCObuI028lhaemMbyEyDJ4kqawc','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441627246'),
('151','3','12','19','oqCObuA0XgWMi5Rp-Bpz0X2JJU0o','basic','','event','1441631267'),
('152','3','12','19','oqCObuDMopXr9RyOVylgJlH3kuT8','basic','','event','1441681543'),
('153','3','12','19','oqCObuPY0Q-sVJO4UAaU9fcDlIZc','basic','','event','1441725948'),
('154','3','12','19','oqCObuIhoF9NnKmElDXzQpg5zv2s','basic','','event','1441776538'),
('155','3','12','19','oqCObuG7mksym3J-6qmQ2FgT5WiU','basic','','event','1441801478'),
('156','3','0','0','oqCObuG7mksym3J-6qmQ2FgT5WiU','','','event','1441801796'),
('157','3','12','19','oqCObuDil4dT3MXwtvK7uMNbzLg8','basic','','event','1441810274'),
('158','3','12','19','oqCObuGsJq1vMC1T2rR5rO4Xg3kI','basic','','event','1441870556'),
('159','3','0','0','oqCObuGsJq1vMC1T2rR5rO4Xg3kI','','','event','1441870594'),
('160','3','12','19','oqCObuDMopXr9RyOVylgJlH3kuT8','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441681568'),
('161','3','12','19','oqCObuPY0Q-sVJO4UAaU9fcDlIZc','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441725963'),
('162','3','12','19','oqCObuIhoF9NnKmElDXzQpg5zv2s','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441776545'),
('163','3','12','19','oqCObuG7mksym3J-6qmQ2FgT5WiU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:3:\"亲\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441801489'),
('164','3','12','19','oqCObuG7mksym3J-6qmQ2FgT5WiU','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:9:\"能买吗\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441801609'),
('165','3','12','19','oqCObuDil4dT3MXwtvK7uMNbzLg8','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441810287'),
('166','3','12','19','oqCObuDil4dT3MXwtvK7uMNbzLg8','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441810345'),
('167','3','12','19','oqCObuGsJq1vMC1T2rR5rO4Xg3kI','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441870561'),
('168','3','12','19','oqCObuGsJq1vMC1T2rR5rO4Xg3kI','basic','a:4:{s:7:\"content\";s:12:\"欢迎关注\";s:8:\"original\";s:115:\"http://mp.weixin.qq.com/s?__biz=MzA5MzE5NzExNw==&mid=10001097&idx=1&sn=8338ffe385dcd8dd1f376fc1a2fd50ff&scene=18#rd\";s:11:\"redirection\";b:1;s:6:\"source\";s:7:\"default\";}','text','1441870573'),
('169','3','12','19','oqCObuPA9O-zskPEjzVzMU8JfezM','basic','','event','1441970835'),
('170','3','0','0','oqCObuPA9O-zskPEjzVzMU8JfezM','','','event','1441970864'),
('171','3','12','19','oqCObuG49eLbr3vaBZGRUpD3O5XA','basic','','event','1441979571'),
('172','3','12','19','oqCObuLdkV_iKpftyachBOkaRTxU','basic','','event','1441981474'),
('173','3','12','19','oqCObuOiQh0pBwF65HcqgKOG7BTg','basic','','event','1442033512'),
('174','3','12','19','oqCObuOGmtDloUjNwxpnz1CSnFjY','basic','','event','1442042458'),
('175','3','12','19','oqCObuIBTJn_ptCtKvmYf_E08B8s','basic','','event','1442043692'),
('176','3','12','19','oqCObuA61kN6DZZTqk_edzJCVuPc','basic','','event','1442105290'),
('177','3','12','19','oqCObuMmFxQZqSPNWcTo_IMyijYw','basic','','event','1442112848'),
('178','3','12','19','oqCObuKqlFZaWfyF0gSADNDlo0Xs','basic','','event','1442138333'),
('179','3','12','19','oqCObuIBGwerLt0edPc-mEpjmDgk','basic','','event','1442251568'),
('180','3','12','19','oqCObuHeWGVRJU0JXw3vvGsA-hkA','basic','','event','1442293656'),
('181','3','12','19','oqCObuKLIrOrwM5Jz6kAyP9_hgZY','basic','','event','1442301420'),
('182','3','12','19','oqCObuNSFAGznsTqKUem0nQtWdKs','basic','','event','1442301521'),
('183','3','0','0','oqCObuKLIrOrwM5Jz6kAyP9_hgZY','','','event','1442301571'),
('184','3','12','19','oqCObuAsSIR64leNzP9KyQwnFTiw','basic','','event','1442308412'),
('185','3','12','19','oqCObuCH72CaL8zrlCeknDPfeq2c','basic','','event','1442322776'),
('186','3','12','19','oqCObuCT7VYAROXc20DFhn8yf-e0','basic','','event','1442356099'),
('187','3','12','19','oqCObuPns7fEEmQXr1DJpyozkoa8','basic','','event','1442385041');


DROP TABLE IF EXISTS ims_stat_rule;
CREATE TABLE `ims_stat_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

INSERT INTO ims_stat_rule VALUES 
('1','2','0','11','1416881333','1416844800'),
('2','2','9','2','1416881145','1416844800'),
('3','2','0','1','1416881372','1416844800'),
('4','2','0','1','1416881483','1416931200'),
('5','2','10','1','1421464724','1421424000'),
('6','3','11','1','1438583899','1438531200'),
('7','3','12','9','1438602802','1438531200'),
('8','3','12','1','1438678888','1438617600'),
('9','3','12','1','1438760192','1438704000'),
('10','3','12','4','1438844442','1438790400'),
('11','3','12','3','1439047478','1438963200'),
('12','3','12','3','1439219305','1439136000'),
('13','3','12','1','1439261123','1439222400'),
('14','3','12','2','1439366397','1439308800'),
('15','3','12','1','1439475282','1439395200'),
('16','3','12','7','1439554973','1439481600'),
('17','3','12','1','1439651037','1439568000'),
('18','3','12','2','1439907127','1439827200'),
('19','3','12','1','1440075543','1440000000'),
('20','3','12','3','1440341465','1440259200'),
('21','3','12','4','1440391367','1440345600'),
('22','3','12','6','1440516534','1440432000'),
('23','3','12','2','1440594545','1440518400'),
('24','3','12','2','1440657108','1440604800'),
('25','3','12','43','1440771793','1440691200'),
('26','3','12','2','1440831824','1440777600'),
('27','3','12','1','1440982031','1440950400'),
('28','3','12','1','1441108338','1441036800'),
('29','3','12','1','1441180220','1441123200'),
('30','3','12','18','1441631293','1441555200'),
('31','3','11','1','1441605460','1441555200'),
('32','3','12','2','1441725984','1441641600'),
('33','3','12','3','1441810316','1441728000'),
('34','3','12','10','1441888544','1441814400'),
('35','3','12','3','1441981484','1441900800'),
('36','3','12','3','1442043710','1441987200'),
('37','3','12','3','1442138357','1442073600'),
('38','3','12','6','1442322808','1442246400'),
('39','3','12','2','1442385080','1442332800');


DROP TABLE IF EXISTS ims_uni_account;
CREATE TABLE `ims_uni_account` (
  `uniacid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO ims_uni_account VALUES 
('1','-1','微擎团队','一个朝气蓬勃的团队'),
('2','-1','印象大鹏',''),
('3','-1','28days细胞级护理','28days细胞级护理'),
('4','0','全网发布测试数据，发布完成后可删除','微信开放平台全网发布测试数据，完成后可删除');


DROP TABLE IF EXISTS ims_uni_account_modules;
CREATE TABLE `ims_uni_account_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL DEFAULT '',
  `enabled` tinyint(1) unsigned NOT NULL,
  `settings` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

INSERT INTO ims_uni_account_modules VALUES 
('1','1','basic','1',''),
('2','1','news','1',''),
('3','1','music','1',''),
('4','1','userapi','1',''),
('5','1','recharge','1',''),
('6','1','custom','1',''),
('7','1','images','1',''),
('8','1','video','1',''),
('9','1','voice','1',''),
('10','1','we7_business','0',''),
('11','1','ewei_shopping','0',''),
('12','1','hl_zzz','0',''),
('13','2','basic','1',''),
('14','2','news','1',''),
('15','2','music','1',''),
('16','2','userapi','1',''),
('17','2','recharge','1',''),
('18','2','custom','1',''),
('19','2','images','1',''),
('20','2','video','1',''),
('21','2','voice','1',''),
('22','2','we7_business','1','a:1:{s:5:\"range\";i:50;}'),
('23','1','chats','1',''),
('24','1','ewei_bigwheel','1',''),
('25','1','wl_heka','1',''),
('26','2','chats','1',''),
('27','2','ewei_shopping','1',''),
('28','2','hl_zzz','1',''),
('29','2','ewei_bigwheel','1',''),
('30','2','wl_heka','1',''),
('31','1','we7_research','1',''),
('32','2','we7_research','1',''),
('33','1','ewei_exam','1',''),
('34','1','we7_demo','1',''),
('35','2','ewei_exam','1',''),
('36','2','we7_demo','1',''),
('37','3','basic','1',''),
('38','3','news','1',''),
('39','3','music','1',''),
('40','3','userapi','1',''),
('41','3','recharge','1',''),
('42','3','custom','1',''),
('43','3','images','1',''),
('44','3','video','1',''),
('45','3','voice','1',''),
('46','3','chats','1',''),
('47','3','ewei_shopping','1','a:8:{s:11:\"noticeemail\";s:0:\"\";s:6:\"mobile\";s:0:\"\";s:8:\"shopname\";s:18:\"28days在线支付\";s:7:\"address\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:11:\"officialweb\";s:0:\"\";s:6:\"status\";i:0;s:11:\"description\";s:40:\"<p>28days带给你细胞级护理！</p>\";}');


DROP TABLE IF EXISTS ims_uni_account_users;
CREATE TABLE `ims_uni_account_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ims_uni_account_users VALUES 
('1','1','1','manager'),
('2','2','1','manager'),
('3','3','1','manager');


DROP TABLE IF EXISTS ims_uni_group;
CREATE TABLE `ims_uni_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `modules` varchar(5000) NOT NULL DEFAULT '',
  `templates` varchar(5000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_uni_group VALUES 
('1','体验套餐服务','a:2:{i:0;s:7:\"wl_heka\";i:1;s:12:\"we7_research\";}','N;');


DROP TABLE IF EXISTS ims_uni_settings;
CREATE TABLE `ims_uni_settings` (
  `uniacid` int(10) unsigned NOT NULL,
  `passport` varchar(200) NOT NULL DEFAULT '',
  `oauth` varchar(100) NOT NULL DEFAULT '',
  `uc` varchar(500) NOT NULL,
  `notify` varchar(2000) NOT NULL DEFAULT '',
  `creditnames` varchar(500) NOT NULL DEFAULT '',
  `creditbehaviors` varchar(500) NOT NULL DEFAULT '',
  `welcome` varchar(60) NOT NULL DEFAULT '',
  `default` varchar(60) NOT NULL DEFAULT '',
  `default_message` varchar(1000) NOT NULL DEFAULT '',
  `shortcuts` varchar(5000) NOT NULL DEFAULT '',
  `payment` varchar(2000) NOT NULL DEFAULT '',
  `groupdata` varchar(100) NOT NULL,
  `stat` varchar(300) NOT NULL,
  `menuset` text NOT NULL,
  `default_site` int(10) unsigned DEFAULT '0',
  `sync` varchar(100) NOT NULL,
  `jsauth_acid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ims_uni_settings VALUES 
('1','a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}','a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}','a:1:{s:6:\"status\";i:0;}','a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}','a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}','a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}','','','','','a:4:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:5:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}}','a:3:{s:8:\"isexpire\";i:0;s:10:\"oldgroupid\";s:0:\"\";s:7:\"endtime\";i:1410364919;}','','','1','','0'),
('2','','a:2:{s:6:\"status\";i:1;s:7:\"account\";i:2;}','','a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}','a:2:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}}','a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}','','','a:6:{s:5:\"image\";s:0:\"\";s:5:\"voice\";s:0:\"\";s:5:\"video\";s:0:\"\";s:8:\"location\";s:12:\"we7_business\";s:4:\"link\";s:0:\"\";s:5:\"enter\";s:0:\"\";}','a:1:{s:13:\"ewei_shopping\";a:2:{s:4:\"name\";s:13:\"ewei_shopping\";s:4:\"link\";s:51:\"./index.php?c=home&a=welcome&do=ext&m=ewei_shopping\";}}','','a:3:{s:8:\"isexpire\";i:0;s:10:\"oldgroupid\";s:0:\"\";s:7:\"endtime\";i:1416880572;}','','','2','a:2:{s:6:\"switch\";i:0;s:4:\"acid\";s:0:\"\";}','0'),
('3','','a:2:{s:6:\"status\";i:1;s:7:\"account\";i:3;}','','a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}','a:2:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}}','a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}','欢迎关注','欢迎关注','','','a:7:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:8:{s:6:\"switch\";b:1;s:7:\"account\";s:1:\"3\";s:7:\"signkey\";s:32:\"ISPCpi8yx6L555e8AiPW5piJwR5wy5cZ\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";s:7:\"version\";s:1:\"2\";s:5:\"mchid\";s:10:\"1261603301\";s:6:\"apikey\";s:32:\"ISPCpi8yx6L555e8AiPW5piJwR5wy5cZ\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}s:8:\"unionpay\";a:3:{s:6:\"switch\";b:0;s:11:\"signcertpwd\";s:0:\"\";s:5:\"merid\";s:0:\"\";}s:8:\"baifubao\";a:3:{s:6:\"switch\";b:0;s:7:\"signkey\";s:0:\"\";s:5:\"mchid\";s:0:\"\";}s:4:\"card\";a:1:{s:6:\"switch\";i:1;}}','a:3:{s:8:\"isexpire\";i:0;s:10:\"oldgroupid\";s:0:\"\";s:7:\"endtime\";i:1438582352;}','','YTo0OntpOjA7YTo0OntzOjQ6InR5cGUiO3M6MzoidXJsIjtzOjU6InRpdGxlIjtzOjY6IuWTgeeJjCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjg6InN1Yk1lbnVzIjthOjQ6e2k6MDthOjQ6e3M6NToidGl0bGUiO3M6MTI6IuWTgeeJjOeugOS7iyI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjc6ImZvcndhcmQiO3M6MDoiIjt9aToxO2E6NDp7czo1OiJ0aXRsZSI7czoxMjoi6Z2i6YOo5a625bGFIjtzOjQ6InR5cGUiO3M6MzoidXJsIjtzOjM6InVybCI7czoxMTU6Imh0dHA6Ly9tcC53ZWl4aW4ucXEuY29tL3M/X19iaXo9TXpBNU16RTVOekV4Tnc9PSZtaWQ9MTAwMDEwOTcmaWR4PTEmc249ODMzOGZmZTM4NWRjZDhkZDFmMzc2ZmMxYTJmZDUwZmYmc2NlbmU9MTgjcmQiO3M6NzoiZm9yd2FyZCI7czowOiIiO31pOjI7YTo0OntzOjU6InRpdGxlIjtzOjEyOiLmnInmnLrpo5/lk4EiO3M6NDoidHlwZSI7czozOiJ1cmwiO3M6MzoidXJsIjtzOjExNToiaHR0cDovL21wLndlaXhpbi5xcS5jb20vcz9fX2Jpej1NekE1TXpFNU56RXhOdz09Jm1pZD0xMDAwMTA5NyZpZHg9MSZzbj04MzM4ZmZlMzg1ZGNkOGRkMWYzNzZmYzFhMmZkNTBmZiZzY2VuZT0xOCNyZCI7czo3OiJmb3J3YXJkIjtzOjA6IiI7fWk6MzthOjQ6e3M6NToidGl0bGUiO3M6MTI6Iuivvueoi+S7i+e7jSI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjc6ImZvcndhcmQiO3M6MDoiIjt9fX1pOjE7YTo0OntzOjQ6InR5cGUiO3M6MzoidXJsIjtzOjU6InRpdGxlIjtzOjY6IuS8muWRmCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjg6InN1Yk1lbnVzIjthOjQ6e2k6MDthOjQ6e3M6NToidGl0bGUiO3M6MTI6IuaIkeeahOi1hOaWmSI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjc6ImZvcndhcmQiO3M6MDoiIjt9aToxO2E6NDp7czo1OiJ0aXRsZSI7czoxMjoi5oiR55qE5raI6LS5IjtzOjQ6InR5cGUiO3M6MzoidXJsIjtzOjM6InVybCI7czoxMTU6Imh0dHA6Ly9tcC53ZWl4aW4ucXEuY29tL3M/X19iaXo9TXpBNU16RTVOekV4Tnc9PSZtaWQ9MTAwMDEwOTcmaWR4PTEmc249ODMzOGZmZTM4NWRjZDhkZDFmMzc2ZmMxYTJmZDUwZmYmc2NlbmU9MTgjcmQiO3M6NzoiZm9yd2FyZCI7czowOiIiO31pOjI7YTo0OntzOjU6InRpdGxlIjtzOjEyOiLmiJHnmoTmiqTnkIYiO3M6NDoidHlwZSI7czozOiJ1cmwiO3M6MzoidXJsIjtzOjExNToiaHR0cDovL21wLndlaXhpbi5xcS5jb20vcz9fX2Jpej1NekE1TXpFNU56RXhOdz09Jm1pZD0xMDAwMTA5NyZpZHg9MSZzbj04MzM4ZmZlMzg1ZGNkOGRkMWYzNzZmYzFhMmZkNTBmZiZzY2VuZT0xOCNyZCI7czo3OiJmb3J3YXJkIjtzOjA6IiI7fWk6MzthOjQ6e3M6NToidGl0bGUiO3M6MTI6IuaIkeeahOmXqOW6lyI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjc6ImZvcndhcmQiO3M6MDoiIjt9fX1pOjI7YTo1OntzOjU6InRpdGxlIjtzOjY6IuWFseiQpSI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MDoiIjtzOjc6ImZvcndhcmQiO3M6MDoiIjtzOjg6InN1Yk1lbnVzIjthOjQ6e2k6MDthOjQ6e3M6NToidGl0bGUiO3M6MTI6IumUgOWUruWvuei0piI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjc6ImZvcndhcmQiO3M6MDoiIjt9aToxO2E6NDp7czo1OiJ0aXRsZSI7czoxMjoi57up5pWI5aWW5YqxIjtzOjQ6InR5cGUiO3M6MzoidXJsIjtzOjM6InVybCI7czoxMTU6Imh0dHA6Ly9tcC53ZWl4aW4ucXEuY29tL3M/X19iaXo9TXpBNU16RTVOekV4Tnc9PSZtaWQ9MTAwMDEwOTcmaWR4PTEmc249ODMzOGZmZTM4NWRjZDhkZDFmMzc2ZmMxYTJmZDUwZmYmc2NlbmU9MTgjcmQiO3M6NzoiZm9yd2FyZCI7czowOiIiO31pOjI7YTo0OntzOjU6InRpdGxlIjtzOjEyOiLkvJrorq7nrqHnkIYiO3M6NDoidHlwZSI7czozOiJ1cmwiO3M6MzoidXJsIjtzOjExNToiaHR0cDovL21wLndlaXhpbi5xcS5jb20vcz9fX2Jpej1NekE1TXpFNU56RXhOdz09Jm1pZD0xMDAwMTA5NyZpZHg9MSZzbj04MzM4ZmZlMzg1ZGNkOGRkMWYzNzZmYzFhMmZkNTBmZiZzY2VuZT0xOCNyZCI7czo3OiJmb3J3YXJkIjtzOjA6IiI7fWk6MzthOjQ6e3M6NToidGl0bGUiO3M6MTI6IuWFseiQpeS4reW/gyI7czo0OiJ0eXBlIjtzOjM6InVybCI7czozOiJ1cmwiO3M6MTE1OiJodHRwOi8vbXAud2VpeGluLnFxLmNvbS9zP19fYml6PU16QTVNekU1TnpFeE53PT0mbWlkPTEwMDAxMDk3JmlkeD0xJnNuPTgzMzhmZmUzODVkY2Q4ZGQxZjM3NmZjMWEyZmQ1MGZmJnNjZW5lPTE4I3JkIjtzOjc6ImZvcndhcmQiO3M6MDoiIjt9fX1pOjM7YToxOntzOjEwOiJjcmVhdGV0aW1lIjtpOjE0NDE4ODg3NDI7fX0=','3','1','0');


DROP TABLE IF EXISTS ims_uni_verifycode;
CREATE TABLE `ims_uni_verifycode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `verifycode` varchar(6) NOT NULL,
  `total` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_userapi_cache;
CREATE TABLE `ims_userapi_cache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_userapi_reply;
CREATE TABLE `ims_userapi_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `description` varchar(300) NOT NULL DEFAULT '',
  `apiurl` varchar(300) NOT NULL DEFAULT '',
  `token` varchar(32) NOT NULL DEFAULT '',
  `default_text` varchar(100) NOT NULL DEFAULT '',
  `cachetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO ims_userapi_reply VALUES 
('1','1','\"城市名+天气\", 如: \"北京天气\"','weather.php','','','0'),
('2','2','\"百科+查询内容\" 或 \"定义+查询内容\", 如: \"百科姚明\", \"定义自行车\"','baike.php','','','0'),
('3','3','\"@查询内容(中文或英文)\"','translate.php','','','0'),
('4','4','\"日历\", \"万年历\", \"黄历\"或\"几号\"','calendar.php','','','0'),
('5','5','\"新闻\"','news.php','','','0'),
('6','6','\"快递+单号\", 如: \"申通1200041125\"','express.php','','','0');


DROP TABLE IF EXISTS ims_users;
CREATE TABLE `ims_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `joindate` int(10) unsigned NOT NULL DEFAULT '0',
  `joinip` varchar(15) NOT NULL DEFAULT '',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(15) NOT NULL DEFAULT '',
  `remark` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO ims_users VALUES 
('1','0','admin','11e45b3c7ed2d7d541d2d6d26cbe6e7f4d0fd922','464a505f','10','1416813500','','1442409725','14.23.120.93','');


DROP TABLE IF EXISTS ims_users_group;
CREATE TABLE `ims_users_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL DEFAULT '',
  `maxaccount` int(10) unsigned NOT NULL DEFAULT '0',
  `maxsubaccount` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ims_users_group VALUES 
('1','体验用户组','a:1:{i:0;i:1;}','1','1'),
('2','白金用户组','a:1:{i:0;i:1;}','2','2'),
('3','黄金用户组','a:1:{i:0;i:1;}','3','3');


DROP TABLE IF EXISTS ims_users_invitation;
CREATE TABLE `ims_users_invitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `fromuid` int(10) unsigned NOT NULL,
  `inviteuid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_users_permission;
CREATE TABLE `ims_users_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_users_profile;
CREATE TABLE `ims_users_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `qq` varchar(15) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `fakeid` varchar(30) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `birthyear` smallint(6) unsigned NOT NULL DEFAULT '0',
  `birthmonth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `birthday` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `constellation` varchar(10) NOT NULL DEFAULT '',
  `zodiac` varchar(5) NOT NULL DEFAULT '',
  `telephone` varchar(15) NOT NULL DEFAULT '',
  `idcard` varchar(30) NOT NULL DEFAULT '',
  `studentid` varchar(50) NOT NULL DEFAULT '',
  `grade` varchar(10) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(10) NOT NULL DEFAULT '',
  `nationality` varchar(30) NOT NULL DEFAULT '',
  `resideprovince` varchar(30) NOT NULL DEFAULT '',
  `residecity` varchar(30) NOT NULL DEFAULT '',
  `residedist` varchar(30) NOT NULL DEFAULT '',
  `graduateschool` varchar(50) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `education` varchar(10) NOT NULL DEFAULT '',
  `occupation` varchar(30) NOT NULL DEFAULT '',
  `position` varchar(30) NOT NULL DEFAULT '',
  `revenue` varchar(10) NOT NULL DEFAULT '',
  `affectivestatus` varchar(30) NOT NULL DEFAULT '',
  `lookingfor` varchar(255) NOT NULL DEFAULT '',
  `bloodtype` varchar(5) NOT NULL DEFAULT '',
  `height` varchar(5) NOT NULL DEFAULT '',
  `weight` varchar(5) NOT NULL DEFAULT '',
  `alipay` varchar(30) NOT NULL DEFAULT '',
  `msn` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `taobao` varchar(30) NOT NULL DEFAULT '',
  `site` varchar(30) NOT NULL DEFAULT '',
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_video_reply;
CREATE TABLE `ims_video_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `mediaid` varchar(255) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_voice_reply;
CREATE TABLE `ims_voice_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `mediaid` varchar(255) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_we7_demo_reply;
CREATE TABLE `ims_we7_demo_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_wxwall_award;
CREATE TABLE `ims_wxwall_award` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_wxwall_members;
CREATE TABLE `ims_wxwall_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` varchar(50) NOT NULL COMMENT '用户的唯一身份ID',
  `rid` int(10) unsigned NOT NULL COMMENT '用户当前所在的微信墙话题',
  `isjoin` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否正在加入话题',
  `isblacklist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户是否是黑名单',
  `lastupdate` int(10) unsigned NOT NULL COMMENT '用户最后发表时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_wxwall_message;
CREATE TABLE `ims_wxwall_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL COMMENT '规则ID',
  `from_user` varchar(50) NOT NULL COMMENT '用户的唯一ID',
  `content` varchar(1000) NOT NULL DEFAULT '' COMMENT '用户发表的内容',
  `type` varchar(10) NOT NULL COMMENT '发表内容类型',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_wxwall_reply;
CREATE TABLE `ims_wxwall_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL COMMENT '规则ID',
  `acid` int(10) NOT NULL,
  `enter_tips` varchar(300) NOT NULL DEFAULT '' COMMENT '进入提示',
  `quit_tips` varchar(300) NOT NULL DEFAULT '' COMMENT '退出提示',
  `send_tips` varchar(300) NOT NULL DEFAULT '' COMMENT '发表提示',
  `quit_command` varchar(10) NOT NULL DEFAULT '' COMMENT '退出指令',
  `timeout` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '超时时间',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否需要审核',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `background` varchar(255) NOT NULL DEFAULT '',
  `syncwall` varchar(2000) NOT NULL DEFAULT '' COMMENT '第三方墙',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_zzz_reply;
CREATE TABLE `ims_zzz_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL COMMENT '规则ID',
  `picture` varchar(100) NOT NULL COMMENT '活动图片',
  `description` text NOT NULL COMMENT '活动描述',
  `rule` text NOT NULL COMMENT '活动描述',
  `periodlottery` smallint(10) unsigned NOT NULL DEFAULT '1' COMMENT '0为无周期',
  `maxlottery` tinyint(3) unsigned NOT NULL COMMENT '最大抽奖数',
  `guzhuurl` varchar(255) NOT NULL DEFAULT '',
  `prace_times` int(10) NOT NULL DEFAULT '100',
  `title` varchar(100) NOT NULL DEFAULT '',
  `bgurl` varchar(255) NOT NULL DEFAULT '',
  `bigunit` varchar(50) NOT NULL DEFAULT '',
  `smallunit` varchar(50) NOT NULL DEFAULT '',
  `start_time` int(10) NOT NULL DEFAULT '0',
  `end_time` int(10) NOT NULL DEFAULT '1600000000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_zzz_user;
CREATE TABLE `ims_zzz_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL DEFAULT '0',
  `from_user` varchar(50) NOT NULL COMMENT '用户唯一身份ID',
  `count` int(10) NOT NULL DEFAULT '0',
  `points` int(10) NOT NULL DEFAULT '0',
  `friendcount` int(10) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS ims_zzz_winner;
CREATE TABLE `ims_zzz_winner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `point` int(10) unsigned NOT NULL DEFAULT '0',
  `from_user` varchar(50) NOT NULL COMMENT '用户唯一身份ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未领奖，1不需要领奖，2已领奖',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '获奖日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



----WeEngine MySQL Dump End