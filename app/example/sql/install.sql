/*
 sql安装文件
*/

# Dump of table db_example_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `db_example_category`;

CREATE TABLE `db_example_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `status` tinyint(1) DEFAULT '1' COMMENT '0隐藏，1显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `db_example_category` (`id`, `pid`, `name`, `status`)
VALUES
    (1,0,'国内',1),
    (2,0,'国际',1),
    (3,1,'地方资讯',1),
    (4,1,'科技资讯',1),
    (5,1,'汽车资讯',1),
    (6,1,'教育资讯',1),
    (7,1,'财经新闻',1),
    (8,1,'数码资讯',1),
    (9,2,'科技资讯',1),
    (10,2,'数码资讯',1),
    (11,2,'股市资讯',1),
    (12,3,'北京',1),
    (13,3,'上海',1),
    (14,3,'重庆',1),
    (15,3,'广东',1),
    (17,1,'体育资讯',1);

# Dump of table db_example_news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `db_example_news`;

CREATE TABLE `db_example_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(100) DEFAULT '' COMMENT '标题',
  `author` varchar(50) DEFAULT '' COMMENT '作者',
  `source` varchar(255) DEFAULT '' COMMENT '来源',
  `img` varchar(255) DEFAULT '' COMMENT '图片',
  `content` text COMMENT '内容',
  `ctime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL COMMENT '修改时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态(0隐藏，1显示)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `db_example_news` (`id`, `cid`, `title`, `author`, `source`, `img`, `content`, `ctime`, `mtime`, `status`)
VALUES
    (1,3,'测试新闻','hisiphp','hisiphp.com','','&lt;p&gt;这是新闻内容&lt;/p&gt;',1507476022,1507483987,1),
    (2,13,'第二条测试新闻','hisiphp','hisiphp.com','','&lt;p&gt;第二条测试新闻&lt;/p&gt;',1507479216,1507483978,1);
