/*
SQLyog  v12.2.6 (64 bit)
MySQL - 5.5.53 : Database - hisi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hisi` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `hisi`;

/*Table structure for table `hisi_admin_annex` */

DROP TABLE IF EXISTS `hisi_admin_annex`;

CREATE TABLE `hisi_admin_annex` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联的数据ID',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '类型',
  `group` varchar(100) NOT NULL DEFAULT 'sys' COMMENT '文件分组',
  `file` varchar(255) NOT NULL COMMENT '上传文件',
  `hash` varchar(64) NOT NULL COMMENT '文件hash值',
  `size` decimal(12,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '附件大小KB',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '使用状态(0未使用，1已使用)',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='[系统] 上传附件';

/*Data for the table `hisi_admin_annex` */

/*Table structure for table `hisi_admin_annex_group` */

DROP TABLE IF EXISTS `hisi_admin_annex_group`;

CREATE TABLE `hisi_admin_annex_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '附件分组',
  `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `size` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '附件大小kb',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 附件分组';

/*Data for the table `hisi_admin_annex_group` */

insert  into `hisi_admin_annex_group`(`id`,`name`,`count`,`size`) values 
(1,'sys',0,0.00);

/*Table structure for table `hisi_admin_config` */

DROP TABLE IF EXISTS `hisi_admin_config`;

CREATE TABLE `hisi_admin_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统配置(1是，0否)',
  `group` varchar(20) NOT NULL DEFAULT 'base' COMMENT '分组',
  `title` varchar(20) NOT NULL COMMENT '配置标题',
  `name` varchar(50) NOT NULL COMMENT '配置名称，由英文字母和下划线组成',
  `value` text NOT NULL COMMENT '配置值',
  `type` varchar(20) NOT NULL DEFAULT 'input' COMMENT '配置类型()',
  `options` text NOT NULL COMMENT '配置项(选项名:选项值)',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '文件上传接口',
  `tips` varchar(255) NOT NULL COMMENT '配置提示',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='[系统] 系统配置';

/*Data for the table `hisi_admin_config` */

insert  into `hisi_admin_config`(`id`,`system`,`group`,`title`,`name`,`value`,`type`,`options`,`url`,`tips`,`sort`,`status`,`ctime`,`mtime`) values 
(1,1,'sys','扩展配置分组','config_group','sendmail:邮箱设置\r\nalipay:支付宝\r\nwechat:微信','array',' ','','请按如下格式填写：&lt;br&gt;键值:键名&lt;br&gt;键值:键名&lt;br&gt;&lt;span style=&quot;color:#f00&quot;&gt;键值只能为英文、数字、下划线&lt;/span&gt;',1,1,1492140215,1492140215),
(13,1,'base','网站域名','site_domain','www.yupaker.com','input','','','',2,1,1492140215,1492140215),
(14,1,'upload','图片上传大小限制','upload_image_size','0','input','','','单位：KB，0表示不限制大小',3,1,1490841797,1491040778),
(15,1,'upload','允许上传图片格式','upload_image_ext','jpg,png,gif,jpeg,ico','input','','','多个格式请用英文逗号（,）隔开',4,1,1490842130,1491040778),
(16,1,'upload','缩略图裁剪方式','thumb_type','2','select','1:等比例缩放\r\n2:缩放后填充\r\n3:居中裁剪\r\n4:左上角裁剪\r\n5:右下角裁剪\r\n6:固定尺寸缩放\r\n','','',5,1,1490842450,1491040778),
(17,1,'upload','图片水印开关','image_watermark','1','switch','0:关闭\r\n1:开启','','',6,1,1490842583,1491040778),
(18,1,'upload','图片水印图','image_watermark_pic','/upload/sys/image/49/4d0430eaf30318ef847086d0b63db0.png','image','','','',7,1,1490842679,1491040778),
(19,1,'upload','图片水印透明度','image_watermark_opacity','50','input','','','可设置值为0~100，数字越小，透明度越高',8,1,1490857704,1491040778),
(20,1,'upload','图片水印图位置','image_watermark_location','9','select','7:左下角\r\n1:左上角\r\n4:左居中\r\n9:右下角\r\n3:右上角\r\n6:右居中\r\n2:上居中\r\n8:下居中\r\n5:居中','','',9,1,1490858228,1491040778),
(21,1,'upload','文件上传大小限制','upload_file_size','0','input','','','单位：KB，0表示不限制大小',1,1,1490859167,1491040778),
(22,1,'upload','允许上传文件格式','upload_file_ext','doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip','input','','','多个格式请用英文逗号（,）隔开',2,1,1490859246,1491040778),
(23,1,'upload','文字水印开关','text_watermark','0','switch','0:关闭\r\n1:开启','','',10,1,1490860872,1491040778),
(24,1,'upload','文字水印内容','text_watermark_content','','input','','','',11,1,1490861005,1491040778),
(25,1,'upload','文字水印字体','text_watermark_font','','file','','','不上传将使用系统默认字体',12,1,1490861117,1491040778),
(26,1,'upload','文字水印字体大小','text_watermark_size','20','input','','','单位：px(像素)',13,1,1490861204,1491040778),
(27,1,'upload','文字水印颜色','text_watermark_color','#000000','input','','','文字水印颜色，格式:#000000',14,1,1490861482,1491040778),
(28,1,'upload','文字水印位置','text_watermark_location','7','select','7:左下角\r\n1:左上角\r\n4:左居中\r\n9:右下角\r\n3:右上角\r\n6:右居中\r\n2:上居中\r\n8:下居中\r\n5:居中','','',11,1,1490861718,1491040778),
(29,1,'upload','缩略图尺寸','thumb_size','300x300;500x500','input','','','为空则不生成，生成 500x500 的缩略图，则填写 500x500，多个规格填写参考 300x300;500x500;800x800',4,1,1490947834,1491040778),
(30,1,'develop','开发模式','app_debug','1','switch','0:关闭\r\n1:开启','','',0,1,1491005004,1492093874),
(31,1,'develop','页面Trace','app_trace','0','switch','0:关闭\r\n1:开启','','',0,1,1491005081,1492093874),
(33,1,'sys','富文本编辑器','editor','umeditor','select','ueditor:UEditor\r\numeditor:UMEditor\r\nkindeditor:KindEditor\r\nckeditor:CKEditor','','',2,1,1491142648,1492140215),
(35,1,'databases','备份目录','backup_path','./backup/database/','input','','','数据库备份路径,路径必须以 / 结尾',0,1,1491881854,1491965974),
(36,1,'databases','备份分卷大小','part_size','20971520','input','','','用于限制压缩后的分卷最大长度。单位：B；建议设置20M',0,1,1491881975,1491965974),
(37,1,'databases','备份压缩开关','compress','1','switch','0:关闭\r\n1:开启','','压缩备份文件需要PHP环境支持gzopen,gzwrite函数',0,1,1491882038,1491965974),
(38,1,'databases','备份压缩级别','compress_level','4','radio','1:最低\r\n4:一般\r\n9:最高','','数据库备份文件的压缩级别，该配置在开启压缩时生效',0,1,1491882154,1491965974),
(39,1,'base','网站状态','site_status','1','switch','0:关闭\r\n1:开启','','站点关闭后将不能访问，后台可正常登录',1,1,1492049460,1494690024),
(40,1,'sys','后台管理路径','admin_path','admin.php','input','','','必须以.php为后缀',0,1,1492139196,1492140215),
(41,1,'base','网站标题','site_title','HisiPHP应用市场','input','','','网站标题是体现一个网站的主旨，要做到主题突出、标题简洁、连贯等特点，建议不超过28个字',6,1,1492502354,1494695131),
(42,1,'base','网站关键词','site_keywords','hisiphp,hisiphp框架,php开源框架','input','','','网页内容所包含的核心搜索关键词，多个关键字请用英文逗号&quot;,&quot;分隔',7,1,1494690508,1494690780),
(43,1,'base','网站描述','site_description','','textarea','','','网页的描述信息，搜索引擎采纳后，作为搜索结果中的页面摘要显示，建议不超过80个字',8,1,1494690669,1494691075),
(44,1,'base','ICP备案信息','site_icp','','input','','','请填写ICP备案号，用于展示在网站底部，ICP备案官网：&lt;a href=&quot;http://www.miibeian.gov.cn&quot; target=&quot;_blank&quot;&gt;http://www.miibeian.gov.cn&lt;/a&gt;',9,1,1494691721,1494692046),
(45,1,'base','站点统计代码','site_statis','','textarea','','','第三方流量统计代码，前台调用时请先用 htmlspecialchars_decode函数转义输出',10,1,1494691959,1494694797),
(46,1,'base','网站名称','site_name','www.yupaker.com','input','','','将显示在浏览器窗口标题等位置',3,1,1494692103,1494694680),
(47,1,'base','网站LOGO','site_logo','','image','','','网站LOGO图片',4,1,1494692345,1494693235),
(48,1,'base','网站图标','site_favicon','','image','','/admin/annex/favicon','又叫网站收藏夹图标，它显示位于浏览器的地址栏或者标题前面，&lt;strong class=&quot;red&quot;&gt;.ico格式&lt;/strong&gt;，&lt;a href=&quot;https://www.baidu.com/s?ie=UTF-8&amp;wd=favicon&quot; target=&quot;_blank&quot;&gt;点此了解网站图标&lt;/a&gt;',5,1,1494692781,1494693966),
(49,1,'base','手机网站','wap_site_status','0','switch','0:关闭\r\n1:开启','','如果有手机网站，请设置为开启状态，否则只显示PC网站',2,1,1498405436,1498405436),
(50,1,'sys','云端推送','cloud_push','0','switch','0:关闭\r\n1:开启','','关闭之后，无法通过云端推送安装扩展',3,1,1504250320,1504250320),
(51,0,'base','手机网站域名','wap_domain','','input','','','手机访问将自动跳转至此域名',2,1,1504304776,1504304837),
(52,0,'sys','多语言支持','multi_language','0','switch','0:关闭\r\n1:开启','','开启后你可以自由上传多种语言包',4,1,1506532211,1506532211),
(53,0,'paytype','名称','pay_name','hehehdeh','input','','','配置名称',0,1,1531105810,1531105810),
(54,0,'sendmail','SMTP服务器','smtp','smtp.qq.com','input','','','',0,1,1531463383,1531463383),
(55,0,'sendmail','用户名','username','302700308@qq.com','input','','','',0,1,1531463422,1531463422),
(56,0,'sendmail','密码','password','tfhhdojukilhbhde','input','','','',0,1,1531463444,1531463444),
(57,0,'sendmail','发件人姓名','nickname','发件人姓名','input','','','',0,1,1531463478,1531463478),
(58,0,'wechat','appid','appid','wxa3cf17ca2b64573f','input','','','',0,1,1532502819,1532502819),
(59,0,'wechat','secret','secret','937d1498ed51a84af1155699d52c4d67','input','','','',0,1,1532502826,1532502826),
(60,0,'alipay','app_id','app_id','2018061960417597','input','','','',0,1,1532502927,1532502927);

/*Table structure for table `hisi_admin_hook` */

DROP TABLE IF EXISTS `hisi_admin_hook`;

CREATE TABLE `hisi_admin_hook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '系统插件',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `source` varchar(50) NOT NULL DEFAULT '' COMMENT '钩子来源[plugins.插件名，module.模块名]',
  `intro` varchar(200) NOT NULL DEFAULT '' COMMENT '钩子简介',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 钩子表';

/*Data for the table `hisi_admin_hook` */

insert  into `hisi_admin_hook`(`id`,`system`,`name`,`source`,`intro`,`status`,`ctime`,`mtime`) values 
(1,1,'system_admin_index','','后台首页',1,1490885108,1490885108),
(2,1,'system_admin_tips','','后台所有页面提示',1,1490885108,1490885108),
(3,1,'system_annex_upload','','附件上传钩子，可扩展上传到第三方存储',1,1490885108,1490885108),
(4,1,'system_member_login','','会员登陆成功之后的动作',1,1490885108,1490885108),
(5,1,'system_member_register','','会员注册成功后的动作',1,1490885108,1490885108);

/*Table structure for table `hisi_admin_hook_plugins` */

DROP TABLE IF EXISTS `hisi_admin_hook_plugins`;

CREATE TABLE `hisi_admin_hook_plugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hook` varchar(32) NOT NULL COMMENT '钩子id',
  `plugins` varchar(32) NOT NULL COMMENT '插件标识',
  `ctime` int(11) unsigned NOT NULL DEFAULT '0',
  `mtime` int(11) unsigned NOT NULL DEFAULT '0',
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 钩子-插件对应表';

/*Data for the table `hisi_admin_hook_plugins` */

insert  into `hisi_admin_hook_plugins`(`id`,`hook`,`plugins`,`ctime`,`mtime`,`sort`,`status`) values 
(1,'system_admin_index','hisiphp',1510063011,1510063011,0,1);

/*Table structure for table `hisi_admin_language` */

DROP TABLE IF EXISTS `hisi_admin_language`;

CREATE TABLE `hisi_admin_language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '语言包名称',
  `code` varchar(20) NOT NULL DEFAULT '' COMMENT '编码',
  `locale` varchar(255) NOT NULL DEFAULT '' COMMENT '本地浏览器语言编码',
  `icon` varchar(30) NOT NULL DEFAULT '' COMMENT '图标',
  `pack` varchar(100) NOT NULL DEFAULT '' COMMENT '上传的语言包',
  `sort` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[系统] 语言包';

/*Data for the table `hisi_admin_language` */

insert  into `hisi_admin_language`(`id`,`name`,`code`,`locale`,`icon`,`pack`,`sort`,`status`) values 
(1,'简体中文','zh-cn','zh-CN,zh-CN.UTF-8,zh-cn','','1',1,1);

/*Table structure for table `hisi_admin_log` */

DROP TABLE IF EXISTS `hisi_admin_log`;

CREATE TABLE `hisi_admin_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT '',
  `url` varchar(200) DEFAULT '',
  `param` text,
  `remark` varchar(255) DEFAULT '',
  `count` int(10) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(128) DEFAULT '',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=895 DEFAULT CHARSET=utf8 COMMENT='[系统] 操作日志';

/*Data for the table `hisi_admin_log` */

insert  into `hisi_admin_log`(`id`,`uid`,`title`,`url`,`param`,`remark`,`count`,`ip`,`ctime`,`mtime`) values 
(758,1,'系统日志','admin/log/index','[]','浏览数据',3,'0.0.0.0',1530771556,1531469443),
(759,1,'会员等级','admin/member/level','[]','浏览数据',4,'0.0.0.0',1530771557,1531470821),
(760,1,'会员列表','admin/member/index','[]','浏览数据',3,'0.0.0.0',1530771561,1531470817),
(761,1,'模块管理','admin/module/index','[]','浏览数据',4,'0.0.0.0',1530771567,1532492202),
(762,1,'插件管理','admin/plugins/index','[]','浏览数据',2,'0.0.0.0',1530771569,1532492178),
(763,1,'钩子管理','admin/hook/index','[]','浏览数据',1,'0.0.0.0',1530771571,1530771571),
(764,1,'在线升级','admin/upgrade/index','[]','浏览数据',1,'0.0.0.0',1530771572,1530771572),
(765,1,'[示例]列表模板','admin/develop/lists','[]','浏览数据',1,'0.0.0.0',1530771587,1530771587),
(766,1,'[示例]编辑模板','admin/develop/edit','[]','浏览数据',1,'0.0.0.0',1530771589,1530771589),
(767,1,'附件上传','admin/annex/upload','{\"action\":\"config\",\"noCache\":\"1530771589490\",\"thumb\":\"no\",\"from\":\"ueditor\"}','浏览数据',2,'0.0.0.0',1530771589,1530771590),
(768,1,'全部订单','yupaker/orders/index','[]','浏览数据',11,'0.0.0.0',1530771594,1530772368),
(769,1,'系统菜单','admin/menu/index','[]','浏览数据',14,'0.0.0.0',1530772256,1532492816),
(770,1,'配置管理','admin/config/index','[]','浏览数据',43,'0.0.0.0',1530772259,1532531431),
(771,1,'修改菜单','admin/menu/edit','{\"id\":\"260\"}','浏览数据',1,'0.0.0.0',1530772270,1530772270),
(772,1,'修改菜单','admin/menu/edit','{\"id\":\"262\"}','浏览数据',1,'0.0.0.0',1530772279,1530772279),
(773,1,'添加菜单','admin/menu/add','{\"pid\":\"262\",\"mod\":\"yupaker\"}','浏览数据',1,'0.0.0.0',1530772285,1530772285),
(774,1,'添加菜单','admin/menu/add','{\"module\":\"yupaker\",\"pid\":\"262\",\"title\":\"\\u72b6\\u6001\\u8bbe\\u7f6e\",\"icon\":\"\",\"url\":\"yupaker\\/orders\\/status\",\"param\":\"\",\"status\":\"1\",\"system\":\"0\",\"nav\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1530772315,1530772315),
(775,1,'状态设置','yupaker/orders/status','{\"ids\":[\"1\"],\"table\":\"yupaker_orders\",\"val\":\"0\"}','保存数据',2,'0.0.0.0',1530772324,1530772356),
(776,1,'状态设置','yupaker/orders/status','{\"ids\":[\"1\"],\"table\":\"yupaker_orders\",\"val\":\"1\"}','保存数据',1,'0.0.0.0',1530772365,1530772365),
(777,1,'后台首页','admin/index/index','[]','浏览数据',9,'0.0.0.0',1531102081,1532492153),
(778,1,'系统设置','admin/system/index','[]','浏览数据',28,'0.0.0.0',1531102562,1532531432),
(779,1,'配置管理','admin/config/index','{\"group\":\"sys\"}','浏览数据',14,'0.0.0.0',1531102569,1531463236),
(780,1,'配置管理','admin/config/index','{\"group\":\"upload\"}','浏览数据',10,'0.0.0.0',1531102570,1531463228),
(781,1,'配置管理','admin/config/index','{\"group\":\"develop\"}','浏览数据',8,'0.0.0.0',1531102571,1532502801),
(782,1,'配置管理','admin/config/index','{\"group\":\"databases\"}','浏览数据',10,'0.0.0.0',1531102572,1532502805),
(783,1,'配置管理','admin/config/index','{\"group\":\"base\"}','浏览数据',5,'0.0.0.0',1531102576,1531105523),
(784,1,'添加快捷菜单','admin/menu/quick','{\"id\":\"11\"}','浏览数据',1,'0.0.0.0',1531105135,1531105135),
(785,1,'添加配置','admin/config/add','[]','浏览数据',2,'0.0.0.0',1531105162,1531105825),
(786,1,'修改配置','admin/config/edit','{\"id\":\"39\"}','浏览数据',2,'0.0.0.0',1531105177,1531105828),
(787,1,'修改配置','admin/config/edit','{\"id\":\"40\"}','浏览数据',1,'0.0.0.0',1531105184,1531105184),
(788,1,'修改配置','admin/config/edit','{\"id\":\"21\"}','浏览数据',1,'0.0.0.0',1531105189,1531105189),
(789,1,'修改配置','admin/config/edit','{\"id\":\"30\"}','浏览数据',1,'0.0.0.0',1531105192,1531105192),
(790,1,'修改配置','admin/config/edit','{\"id\":\"35\"}','浏览数据',1,'0.0.0.0',1531105197,1531105197),
(791,1,'清空缓存','admin/index/clear','[]','浏览数据',9,'0.0.0.0',1531105494,1532502462),
(792,1,'配置管理','admin/config/index','{\"group\":\"paytype\"}','浏览数据',10,'0.0.0.0',1531105519,1531463298),
(793,1,'添加配置','admin/config/add','{\"group\":\"paytype\"}','浏览数据',1,'0.0.0.0',1531105525,1531105525),
(794,1,'添加配置','admin/config/add','{\"group\":\"paytype\",\"title\":\"\\u540d\\u79f0\",\"name\":\"pay_name\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\\u914d\\u7f6e\\u540d\\u79f0\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531105810,1531105810),
(795,1,'修改配置','admin/config/edit','{\"id\":\"53\"}','浏览数据',3,'0.0.0.0',1531105821,1531299971),
(796,1,'数据库管理','admin/database/index','[]','浏览数据',8,'0.0.0.0',1531299955,1531469445),
(797,1,'系统管理员','admin/user/index','[]','浏览数据',31,'0.0.0.0',1531300054,1532529868),
(798,1,'系统设置','admin/system/index','{\"group\":\"paytype\"}','浏览数据',9,'0.0.0.0',1531300081,1531464212),
(799,1,'数据库配置','admin/system/index','{\"group\":\"databases\"}','浏览数据',2,'0.0.0.0',1531300102,1531464213),
(800,1,'开发配置','admin/system/index','{\"group\":\"develop\"}','浏览数据',2,'0.0.0.0',1531300104,1532502763),
(801,1,'上传配置','admin/system/index','{\"group\":\"upload\"}','浏览数据',7,'0.0.0.0',1531300105,1532502885),
(802,1,'系统配置','admin/system/index','{\"group\":\"sys\"}','浏览数据',8,'0.0.0.0',1531300106,1532502885),
(803,1,'基础配置','admin/system/index','{\"group\":\"base\"}','浏览数据',2,'0.0.0.0',1531300107,1531462966),
(804,1,'系统设置','admin/system/index','{\"id\":{\"pay_name\":\"hehehdeh\"},\"type\":{\"pay_name\":\"input\"},\"group\":\"paytype\"}','保存数据',1,'0.0.0.0',1531462938,1531462938),
(805,1,'系统配置','admin/system/index','{\"id\":{\"admin_path\":\"admin.php\",\"config_group\":\"123\",\"editor\":\"umeditor\"},\"type\":{\"admin_path\":\"input\",\"config_group\":\"array\",\"editor\":\"select\",\"cloud_push\":\"switch\",\"multi_language\":\"switch\"},\"group\":\"sys\"}','保存数据',1,'0.0.0.0',1531463209,1531463209),
(806,1,'配置管理','admin/config/index','{\"group\":\"0\"}','浏览数据',1,'0.0.0.0',1531463218,1531463218),
(807,1,'修改配置','admin/config/edit','{\"id\":\"1\"}','浏览数据',1,'0.0.0.0',1531463234,1531463234),
(808,1,'系统配置','admin/system/index','{\"id\":{\"admin_path\":\"admin.php\",\"config_group\":\"sendmail:\\u90ae\\u7bb1\\u8bbe\\u7f6e\",\"editor\":\"umeditor\"},\"type\":{\"admin_path\":\"input\",\"config_group\":\"array\",\"editor\":\"select\",\"cloud_push\":\"switch\",\"multi_language\":\"switch\"},\"group\":\"sys\"}','保存数据',1,'0.0.0.0',1531463285,1531463285),
(809,1,'配置管理','admin/config/index','{\"group\":\"sendmail\"}','浏览数据',7,'0.0.0.0',1531463291,1532502806),
(810,1,'系统设置','admin/system/index','{\"group\":\"sendmail\"}','浏览数据',7,'0.0.0.0',1531463294,1531464771),
(811,1,'添加配置','admin/config/add','{\"group\":\"sendmail\"}','浏览数据',4,'0.0.0.0',1531463304,1531463448),
(812,1,'添加配置','admin/config/add','{\"group\":\"sendmail\",\"title\":\"SMTP\\u670d\\u52a1\\u5668\",\"name\":\"smtp\",\"type\":\"input\",\"value\":\"smtp.qq.com\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531463383,1531463383),
(813,1,'添加配置','admin/config/add','{\"group\":\"sendmail\",\"title\":\"\\u7528\\u6237\\u540d\",\"name\":\"username\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531463422,1531463422),
(814,1,'添加配置','admin/config/add','{\"group\":\"sendmail\",\"title\":\"\\u5bc6\\u7801\",\"name\":\"password\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531463444,1531463444),
(815,1,'添加配置','admin/config/add','{\"group\":\"sendmail\",\"title\":\"\\u53d1\\u4ef6\\u4eba\\u59d3\\u540d\",\"name\":\"nickname\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531463478,1531463478),
(816,1,'系统设置','admin/system/index','{\"id\":{\"smtp\":\"smtp.qq.com\",\"username\":\"302700308@qq.com\",\"password\":\"tfhhdojukilhbhde\",\"nickname\":\"\\u53d1\\u4ef6\\u4eba\\u59d3\\u540d\"},\"type\":{\"smtp\":\"input\",\"username\":\"input\",\"password\":\"input\",\"nickname\":\"input\"},\"group\":\"sendmail\"}','保存数据',1,'0.0.0.0',1531463515,1531463515),
(817,1,'留言管理','yupaker/messages/index','[]','浏览数据',13,'0.0.0.0',1531464903,1532490700),
(818,1,'查看留言','yupaker/messages/edit','{\"id\":\"14\"}','浏览数据',4,'0.0.0.0',1531464916,1531469332),
(819,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"\\u7ba1\\u7406\\u5458\\u56de\\u590d\",\"id\":\"14\"}','保存数据',1,'0.0.0.0',1531464928,1531464928),
(820,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"\\u8fd9\\u91cc\\u662f\\u7ba1\\u7406\\u5458\\u56de\\u590d\\u5185\\u5bb9\",\"id\":\"14\"}','保存数据',1,'0.0.0.0',1531465365,1531465365),
(821,1,'查看留言','yupaker/messages/edit','{\"id\":\"16\"}','浏览数据',1,'0.0.0.0',1531465643,1531465643),
(822,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"\\u7559\\u8a00\\u53d1\\u9001\\u90ae\\u4ef6\\u6d4b\\u8bd5\",\"id\":\"16\"}','保存数据',1,'0.0.0.0',1531465656,1531465656),
(823,1,'查看留言','yupaker/messages/edit','{\"id\":\"17\"}','浏览数据',1,'0.0.0.0',1531466539,1531466539),
(824,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"1\",\"id\":\"17\"}','保存数据',1,'0.0.0.0',1531466540,1531466540),
(825,1,'查看留言','yupaker/messages/edit','{\"id\":\"18\"}','浏览数据',2,'0.0.0.0',1531466557,1531466562),
(826,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"2\",\"id\":\"18\"}','保存数据',1,'0.0.0.0',1531466559,1531466559),
(827,1,'查看留言','yupaker/messages/edit','{\"id\":\"19\"}','浏览数据',2,'0.0.0.0',1531466659,1531466667),
(828,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"3\",\"id\":\"19\"}','保存数据',1,'0.0.0.0',1531466661,1531466661),
(829,1,'优化数据库','admin/database/optimize','{\"ids\":[\"hisi_admin_annex\",\"hisi_admin_annex_group\",\"hisi_admin_config\",\"hisi_admin_hook\",\"hisi_admin_hook_plugins\",\"hisi_admin_language\",\"hisi_admin_log\",\"hisi_admin_member\",\"hisi_admin_member_level\",\"hisi_admin_menu\",\"hisi_admin_menu_lang\",\"hisi_admin_module\",\"hisi_admin_plugins\",\"hisi_admin_role\",\"hisi_admin_user\",\"hisi_example_category\",\"hisi_example_news\",\"hisi_yupaker_comments\",\"hisi_yupaker_messages\",\"hisi_yupaker_news\",\"hisi_yupaker_newscategory\",\"hisi_yupaker_ordergoods\",\"hisi_yupaker_orders\",\"hisi_yupaker_tags\"]}','保存数据',2,'0.0.0.0',1531467129,1531467155),
(830,1,'修复数据库','admin/database/repair','{\"ids\":[\"hisi_admin_annex\",\"hisi_admin_annex_group\",\"hisi_admin_config\",\"hisi_admin_hook\",\"hisi_admin_hook_plugins\",\"hisi_admin_language\",\"hisi_admin_log\",\"hisi_admin_member\",\"hisi_admin_member_level\",\"hisi_admin_menu\",\"hisi_admin_menu_lang\",\"hisi_admin_module\",\"hisi_admin_plugins\",\"hisi_admin_role\",\"hisi_admin_user\",\"hisi_example_category\",\"hisi_example_news\",\"hisi_yupaker_comments\",\"hisi_yupaker_messages\",\"hisi_yupaker_news\",\"hisi_yupaker_newscategory\",\"hisi_yupaker_ordergoods\",\"hisi_yupaker_orders\",\"hisi_yupaker_tags\"]}','保存数据',2,'0.0.0.0',1531467142,1531467149),
(831,1,'评论管理','yupaker/comments/index','[]','浏览数据',5,'0.0.0.0',1531467794,1532490686),
(832,1,'查看评论','yupaker/comments/edit','{\"id\":\"28\"}','浏览数据',4,'0.0.0.0',1531467878,1531468033),
(833,1,'查看评论','yupaker/comments/edit','{\"id\":\"6\"}','浏览数据',2,'0.0.0.0',1531467881,1531467884),
(834,1,'留言管理','yupaker/messages/index','{\"page\":\"2\"}','浏览数据',1,'0.0.0.0',1531469071,1531469071),
(835,1,'查看留言','yupaker/messages/edit','{\"id\":\"5\"}','浏览数据',2,'0.0.0.0',1531469075,1531469105),
(836,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"\\u81ea\\u52a8\\u53d1\\u9001\\u90ae\\u4ef6\\u6d4b\\u8bd5\",\"id\":\"5\"}','保存数据',1,'0.0.0.0',1531469099,1531469099),
(837,1,'查看留言','yupaker/messages/edit','{\"id\":\"21\"}','浏览数据',2,'0.0.0.0',1531469275,1531469292),
(838,1,'查看留言','yupaker/messages/edit','{\"status\":\"1\",\"recontent\":\"\\u65e0\\u6536\\u4ef6\\u7bb1\\u6d4b\\u8bd5\",\"id\":\"21\"}','保存数据',1,'0.0.0.0',1531469287,1531469287),
(839,1,'系统日志','admin/log/index','{\"uid\":\"2\"}','浏览数据',1,'0.0.0.0',1531469453,1531469453),
(840,1,'系统日志','admin/log/index','{\"uid\":\"1\"}','浏览数据',1,'0.0.0.0',1531469456,1531469456),
(841,1,'修改管理员','admin/user/edituser','{\"id\":\"2\"}','浏览数据',15,'0.0.0.0',1531469462,1531470990),
(842,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"ceshi\",\"nick\":\"\\u6d4b\\u8bd5\",\"password\":\"123456\",\"password_confirm\":\"123456\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"2\"}','保存数据',5,'0.0.0.0',1531469470,1531470179),
(843,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"ceshi\",\"nick\":\"\\u6d4b\\u8bd5\",\"password\":\"123123123\",\"password_confirm\":\"123123123\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"2\"}','保存数据',1,'0.0.0.0',1531469496,1531469496),
(844,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"ceshi\",\"nick\":\"\\u6d4b\\u8bd5\",\"password\":\"123123\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"2\"}','保存数据',2,'0.0.0.0',1531470046,1531470077),
(845,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"ceshi\",\"nick\":\"\\u6d4b\\u8bd5\",\"password\":\"123456\",\"password_confirm\":\"321654\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"2\"}','保存数据',1,'0.0.0.0',1531470202,1531470202),
(846,1,'添加管理员','admin/user/adduser','[]','浏览数据',2,'0.0.0.0',1531470340,1531470368),
(847,1,'添加管理员','admin/user/adduser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531470352,1531470352),
(848,1,'添加管理员','admin/user/adduser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"asd\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531470355,1531470355),
(849,1,'添加管理员','admin/user/adduser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"asdasd\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531470359,1531470359),
(850,1,'添加管理员','admin/user/adduser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"asdasd\",\"password_confirm\":\"asd\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531470362,1531470362),
(851,1,'添加管理员','admin/user/adduser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"asdasd\",\"password_confirm\":\"asdasd\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1531470364,1531470364),
(852,1,'修改管理员','admin/user/edituser','{\"id\":\"3\"}','浏览数据',5,'0.0.0.0',1531470677,1531470996),
(853,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"123\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"3\"}','保存数据',1,'0.0.0.0',1531470681,1531470681),
(854,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"123456\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"3\"}','保存数据',1,'0.0.0.0',1531470685,1531470685),
(855,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"123123\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"3\"}','保存数据',1,'0.0.0.0',1531470710,1531470710),
(856,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"123123\",\"password_confirm\":\"456\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"3\"}','保存数据',1,'0.0.0.0',1531470714,1531470714),
(857,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"asd\",\"nick\":\"\\u963f\\u65af\\u8fbe\",\"password\":\"123123\",\"password_confirm\":\"123123\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"],\"id\":\"3\"}','保存数据',1,'0.0.0.0',1531470720,1531470720),
(858,2,'后台首页','admin/index/index','[]','浏览数据',7,'0.0.0.0',1531470782,1531471014),
(859,1,'管理员角色','admin/user/role','[]','浏览数据',5,'0.0.0.0',1531470843,1531470937),
(860,1,'修改角色','admin/user/editrole','{\"id\":\"3\"}','浏览数据',3,'0.0.0.0',1531470859,1531470939),
(861,1,'修改角色','admin/user/editrole','{\"id\":\"2\"}','浏览数据',1,'0.0.0.0',1531470870,1531470870),
(862,1,'修改角色','admin/user/editrole','{\"name\":\"\\u6d4b\\u8bd5\\u6a21\\u5757\\u7ba1\\u7406\\u5458\",\"intro\":\"\",\"status\":\"1\",\"auth\":{\"0\":\"1\",\"1\":\"4\",\"2\":\"25\",\"3\":\"24\",\"4\":\"105\",\"5\":\"106\",\"123\":\"234\",\"124\":\"235\",\"125\":\"236\",\"126\":\"238\",\"127\":\"239\",\"128\":\"240\",\"129\":\"241\",\"130\":\"237\",\"131\":\"242\",\"132\":\"243\",\"133\":\"244\",\"134\":\"245\",\"135\":\"246\",\"136\":\"247\",\"137\":\"248\",\"138\":\"249\",\"139\":\"250\",\"140\":\"251\",\"141\":\"252\",\"142\":\"253\",\"143\":\"254\",\"144\":\"255\",\"145\":\"256\",\"146\":\"257\",\"147\":\"258\",\"148\":\"259\",\"149\":\"260\",\"150\":\"261\",\"151\":\"262\",\"152\":\"263\",\"153\":\"264\"},\"id\":\"3\"}','保存数据',1,'0.0.0.0',1531470892,1531470892),
(863,1,'修改管理员','admin/user/edituser','{\"role_id\":\"3\",\"username\":\"ceshi\",\"nick\":\"\\u6d4b\\u8bd5\",\"password\":\"\",\"password_confirm\":\"\",\"email\":\"\",\"mobile\":\"\",\"status\":\"1\",\"auth\":{\"0\":\"1\",\"1\":\"4\",\"2\":\"25\",\"3\":\"24\",\"4\":\"105\",\"5\":\"106\",\"123\":\"234\",\"124\":\"235\",\"125\":\"236\",\"126\":\"238\",\"127\":\"239\",\"128\":\"240\",\"129\":\"241\",\"130\":\"237\",\"131\":\"242\",\"132\":\"243\",\"133\":\"244\",\"134\":\"245\",\"135\":\"246\",\"136\":\"247\",\"137\":\"248\",\"138\":\"249\",\"139\":\"250\",\"140\":\"251\",\"141\":\"252\",\"142\":\"253\",\"143\":\"254\",\"144\":\"255\",\"145\":\"256\",\"146\":\"257\",\"147\":\"258\",\"148\":\"259\",\"149\":\"260\",\"150\":\"261\",\"151\":\"262\",\"152\":\"263\",\"153\":\"264\"},\"id\":\"2\"}','保存数据',1,'0.0.0.0',1531470983,1531470983),
(864,2,'新闻分类','yupaker/newscategory/index','[]','浏览数据',1,'0.0.0.0',1531471017,1531471017),
(865,2,'新闻列表','yupaker/news/index','[]','浏览数据',1,'0.0.0.0',1531471018,1531471018),
(866,2,'标签云','yupaker/tags/index','[]','浏览数据',1,'0.0.0.0',1531471019,1531471019),
(867,2,'全部订单','yupaker/orders/index','[]','浏览数据',1,'0.0.0.0',1531471021,1531471021),
(868,1,'新闻列表','yupaker/news/index','[]','浏览数据',4,'0.0.0.0',1531471047,1531471284),
(869,1,'新闻分类','yupaker/newscategory/index','[]','浏览数据',1,'0.0.0.0',1531471051,1531471051),
(870,1,'标签云','yupaker/tags/index','[]','浏览数据',1,'0.0.0.0',1531471052,1531471052),
(871,1,'添加新闻','yupaker/news/add','[]','浏览数据',1,'0.0.0.0',1531471056,1531471056),
(872,1,'评论管理','yupaker/comments/index','{\"page\":\"2\"}','浏览数据',2,'0.0.0.0',1532490691,1532490697),
(873,1,'评论管理','yupaker/comments/index','{\"page\":\"3\"}','浏览数据',1,'0.0.0.0',1532490695,1532490695),
(874,1,'模块管理','admin/module/index','{\"status\":\"1\"}','浏览数据',1,'0.0.0.0',1532492182,1532492182),
(875,1,'模块管理','admin/module/index','{\"status\":\"0\"}','浏览数据',2,'0.0.0.0',1532492183,1532492204),
(876,1,'安装模块','admin/module/install','{\"id\":\"8\"}','浏览数据',2,'0.0.0.0',1532492187,1532492210),
(877,1,'安装模块','admin/module/install','{\"clear\":\"0\",\"id\":\"8\"}','保存数据',1,'0.0.0.0',1532492213,1532492213),
(878,1,'模块管理','admin/module/index','{\"status\":\"2\"}','浏览数据',1,'0.0.0.0',1532492216,1532492216),
(879,1,'系统设置','admin/system/index','{\"group\":\"yupaker\"}','浏览数据',4,'0.0.0.0',1532492765,1532502830),
(880,1,'系统配置','admin/system/index','{\"id\":{\"admin_path\":\"admin.php\",\"config_group\":\"sendmail:\\u90ae\\u7bb1\\u8bbe\\u7f6e\\r\\nwechat:\\u5fae\\u4fe1\",\"editor\":\"umeditor\"},\"type\":{\"admin_path\":\"input\",\"config_group\":\"array\",\"editor\":\"select\",\"cloud_push\":\"switch\",\"multi_language\":\"switch\"},\"group\":\"sys\"}','保存数据',1,'0.0.0.0',1532502791,1532502791),
(881,1,'配置管理','admin/config/index','{\"group\":\"wechat\"}','浏览数据',2,'0.0.0.0',1532502798,1532502807),
(882,1,'添加配置','admin/config/add','{\"group\":\"wechat\"}','浏览数据',2,'0.0.0.0',1532502809,1532502822),
(883,1,'添加配置','admin/config/add','{\"group\":\"wechat\",\"title\":\"appid\",\"name\":\"appid\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1532502819,1532502819),
(884,1,'添加配置','admin/config/add','{\"group\":\"wechat\",\"title\":\"secret\",\"name\":\"secret\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1532502826,1532502826),
(885,1,'系统设置','admin/system/index','{\"group\":\"wechat\"}','浏览数据',8,'0.0.0.0',1532502829,1532531481),
(886,1,'系统设置','admin/system/index','{\"id\":{\"appid\":\"wxa3cf17ca2b64573f\",\"secret\":\"937d1498ed51a84af1155699d52c4d67\"},\"type\":{\"appid\":\"input\",\"secret\":\"input\"},\"group\":\"wechat\"}','保存数据',2,'0.0.0.0',1532502849,1532531476),
(887,1,'系统配置','admin/system/index','{\"id\":{\"admin_path\":\"admin.php\",\"config_group\":\"sendmail:\\u90ae\\u7bb1\\u8bbe\\u7f6e\\r\\nalipay:\\u652f\\u4ed8\\u5b9d\\r\\nwechat:\\u5fae\\u4fe1\",\"editor\":\"umeditor\"},\"type\":{\"admin_path\":\"input\",\"config_group\":\"array\",\"editor\":\"select\",\"cloud_push\":\"switch\",\"multi_language\":\"switch\"},\"group\":\"sys\"}','保存数据',1,'0.0.0.0',1532502913,1532502913),
(888,1,'配置管理','admin/config/index','{\"group\":\"alipay\"}','浏览数据',1,'0.0.0.0',1532502918,1532502918),
(889,1,'添加配置','admin/config/add','{\"group\":\"alipay\"}','浏览数据',1,'0.0.0.0',1532502919,1532502919),
(890,1,'添加配置','admin/config/add','{\"group\":\"alipay\",\"title\":\"app_id\",\"name\":\"app_id\",\"type\":\"input\",\"value\":\"\",\"options\":\"\",\"tips\":\"\",\"status\":\"1\",\"id\":\"\"}','保存数据',1,'0.0.0.0',1532502927,1532502927),
(891,1,'系统设置','admin/system/index','{\"group\":\"alipay\"}','浏览数据',4,'0.0.0.0',1532502930,1532503149),
(892,1,'系统设置','admin/system/index','{\"id\":{\"app_id\":\"2018061960417597\"},\"type\":{\"app_id\":\"input\"},\"group\":\"alipay\"}','保存数据',2,'0.0.0.0',1532503074,1532503145),
(893,1,'系统设置','admin/system/index','{\"id\":{\"app_id\":\"201806196041759\"},\"type\":{\"app_id\":\"input\"},\"group\":\"alipay\"}','保存数据',1,'0.0.0.0',1532503129,1532503129),
(894,1,'系统设置','admin/system/index','{\"id\":{\"appid\":\"\",\"secret\":\"937d1498ed51a84af1155699d52c4d67\"},\"type\":{\"appid\":\"input\",\"secret\":\"input\"},\"group\":\"wechat\"}','保存数据',1,'0.0.0.0',1532529522,1532529522);

/*Table structure for table `hisi_admin_member` */

DROP TABLE IF EXISTS `hisi_admin_member`;

CREATE TABLE `hisi_admin_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员等级ID',
  `nick` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `mobile` bigint(11) unsigned NOT NULL DEFAULT '0' COMMENT '手机号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可用金额',
  `frozen_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '冻结金额',
  `income` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '收入统计',
  `expend` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '开支统计',
  `exper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '经验值',
  `integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `frozen_integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '冻结积分',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '性别(1男，0女)',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `last_login_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '最后登陆IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `login_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `expire_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '到期时间(0永久)',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态(0禁用，1正常)',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `site` varchar(50) DEFAULT NULL COMMENT '站点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000006 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 会员表';

/*Data for the table `hisi_admin_member` */

insert  into `hisi_admin_member`(`id`,`level_id`,`nick`,`username`,`mobile`,`email`,`password`,`money`,`frozen_money`,`income`,`expend`,`exper`,`integral`,`frozen_integral`,`sex`,`avatar`,`last_login_ip`,`last_login_time`,`login_count`,`expire_time`,`status`,`ctime`,`site`) values 
(1000000,3,'管理员','admin',0,'','$2y$10$WC0mMyErW1u1JCLXDCbTIuagCceC/kKpjzvCf.cxrVKaxsrZLXrGe',0.00,0.00,0.00,0.00,0,0,0,1,'','',0,0,0,1,1493274686,NULL),
(1000001,1,'狐妖小红娘','',0,'132456@qq.com','$2y$10$PIQYRX8RQubcl7w8Y5B04eMcJDltD56CJuAPvoDEznsKzNT.twt/C',0.00,0.00,0.00,0.00,0,0,0,1,'https://q1.qlogo.cn/g?b=qq&nk=132456&s=100','',0,0,0,1,1529034303,'1'),
(1000002,2,'狐妖小红娘','',0,'132456@qq.com','$2y$10$f8IzDy95YiZIPBJB2UH.Nur85WmrVHDZ4HVyRVGr2Zulv6f2ijZMa',0.00,0.00,0.00,0.00,0,0,0,1,'https://q1.qlogo.cn/g?b=qq&nk=132456&s=100','',0,0,0,1,1529034497,'1'),
(1000003,2,'大名','',0,'12323123123@qq.com','$2y$10$o1Dd2tL6VSUDy6DuoxRznu3p5/8FD7aNtc973WFDItbP7J83HuVsC',0.00,0.00,0.00,0.00,0,0,0,1,'https://q1.qlogo.cn/g?b=qq&nk=12323123123&s=100','',0,0,0,1,1529377584,'wu'),
(1000004,2,'你的名字','',0,'mj838764236@163.com','$2y$10$l3wKjU1dkNBZh967zNOpiuMHRYaywXs6ygka4M0bWtY4GNHYZH0Aa',0.00,0.00,0.00,0.00,0,0,0,1,'https://q1.qlogo.cn/g?b=qq&nk=838764236&s=100','',0,0,0,1,1529378905,'wu'),
(1000005,2,'君之名','',0,'838764236@qq.com','$2y$10$0WKMdDd3Mdc7Zi20rCKvU.BdYs43XkIfLQYgbNnwRZHQpAoXarWGG',0.00,0.00,0.00,0.00,0,0,0,1,'https://q1.qlogo.cn/g?b=qq&nk=12567986684&s=100','',0,0,0,1,1529473672,'45');

/*Table structure for table `hisi_admin_member_level` */

DROP TABLE IF EXISTS `hisi_admin_member_level`;

CREATE TABLE `hisi_admin_member_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '等级名称',
  `min_exper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最小经验值',
  `max_exper` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最大经验值',
  `discount` int(2) unsigned NOT NULL DEFAULT '100' COMMENT '折扣率(%)',
  `intro` varchar(255) NOT NULL COMMENT '等级简介',
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '默认等级',
  `expire` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员有效期(天)',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[系统] 会员等级';

/*Data for the table `hisi_admin_member_level` */

insert  into `hisi_admin_member_level`(`id`,`name`,`min_exper`,`max_exper`,`discount`,`intro`,`default`,`expire`,`status`,`ctime`,`mtime`) values 
(1,'注册会员',0,0,100,'',1,0,1,0,1491966814),
(2,'游客',0,0,100,'',0,0,1,1529026345,1529032969),
(3,'管理员',0,0,100,'',0,0,1,1529897546,1529897546);

/*Table structure for table `hisi_admin_menu` */

DROP TABLE IF EXISTS `hisi_admin_menu`;

CREATE TABLE `hisi_admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID(快捷菜单专用)',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL COMMENT '模块名或插件名，插件名格式:plugins.插件名',
  `title` varchar(20) NOT NULL COMMENT '菜单标题',
  `icon` varchar(80) NOT NULL DEFAULT 'aicon ai-shezhi' COMMENT '菜单图标',
  `url` varchar(200) NOT NULL COMMENT '链接地址(模块/控制器/方法)',
  `param` varchar(200) NOT NULL DEFAULT '' COMMENT '扩展参数',
  `target` varchar(20) NOT NULL DEFAULT '_self' COMMENT '打开方式(_blank,_self)',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `debug` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '开发模式可见',
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统菜单，系统菜单不可删除',
  `nav` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否为菜单显示，1显示0不显示',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态1显示，0隐藏',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 管理菜单';

/*Data for the table `hisi_admin_menu` */

insert  into `hisi_admin_menu`(`id`,`uid`,`pid`,`module`,`title`,`icon`,`url`,`param`,`target`,`sort`,`debug`,`system`,`nav`,`status`,`ctime`) values 
(1,0,0,'admin','首页','','admin/index','','_self',0,0,1,1,1,1490315067),
(2,0,0,'admin','系统','','admin/system','','_self',0,0,1,1,1,1490315067),
(3,0,0,'admin','插件','aicon ai-shezhi','admin/plugins','','_self',0,0,1,1,1,1490315067),
(4,0,1,'admin','快捷菜单','aicon ai-caidan','admin/quick','','_self',0,0,1,1,1,1490315067),
(5,0,3,'admin','插件列表','aicon ai-mokuaiguanli','admin/plugins','','_self',0,0,1,1,1,1490315067),
(6,0,2,'admin','系统功能','aicon ai-gongneng','admin/system','','_self',1,0,1,1,1,1490315067),
(7,0,2,'admin','会员管理','aicon ai-huiyuanliebiao','admin/member','','_self',2,0,1,1,1,1490315067),
(8,0,2,'admin','系统扩展','aicon ai-shezhi','admin/extend','','_self',3,0,1,1,1,1490315067),
(9,0,2,'admin','开发专用','aicon ai-doubleleft','admin/develop','','_self',4,1,1,1,1,1490315067),
(10,0,6,'admin','系统设置','aicon ai-icon01','admin/system/index','','_self',1,0,1,1,1,1490315067),
(11,0,6,'admin','配置管理','aicon ai-peizhiguanli','admin/config/index','','_self',2,0,1,1,1,1490315067),
(12,0,6,'admin','系统菜单','aicon ai-systemmenu','admin/menu/index','','_self',3,0,1,1,1,1490315067),
(13,0,6,'admin','管理员角色','','admin/user/role','','_self',4,0,1,0,1,1490315067),
(14,0,6,'admin','系统管理员','aicon ai-tubiao05','admin/user/index','','_self',5,0,1,1,1,1490315067),
(15,0,6,'admin','系统日志','aicon ai-xitongrizhi-tiaoshi','admin/log/index','','_self',6,0,1,1,1,1490315067),
(16,0,6,'admin','附件管理','','admin/annex/index','','_self',7,0,1,0,1,1490315067),
(17,0,8,'admin','模块管理','aicon ai-mokuaiguanli1','admin/module/index','','_self',1,0,1,1,1,1490315067),
(18,0,8,'admin','插件管理','aicon ai-chajianguanli','admin/plugins/index','','_self',2,0,1,1,1,1490315067),
(19,0,8,'admin','钩子管理','aicon ai-icon-test','admin/hook/index','','_self',3,0,1,1,1,1490315067),
(20,0,7,'admin','会员等级','aicon ai-huiyuandengji','admin/member/level','','_self',1,0,1,1,1,1490315067),
(21,0,7,'admin','会员列表','aicon ai-huiyuanliebiao','admin/member/index','','_self',2,0,1,1,1,1490315067),
(22,0,9,'admin','[示例]列表模板','','admin/develop/lists','','_self',1,1,1,1,1,1490315067),
(23,0,9,'admin','[示例]编辑模板','','admin/develop/edit','','_self',2,1,1,1,1,1490315067),
(24,0,4,'admin','后台首页','','admin/index/index','','_self',100,0,1,0,1,1490315067),
(25,0,4,'admin','清空缓存','','admin/index/clear','','_self',2,0,1,0,1,1490315067),
(26,0,12,'admin','添加菜单','','admin/menu/add','','_self',1,0,1,1,1,1490315067),
(27,0,12,'admin','修改菜单','','admin/menu/edit','','_self',2,0,1,1,1,1490315067),
(28,0,12,'admin','删除菜单','','admin/menu/del','','_self',3,0,1,1,1,1490315067),
(29,0,12,'admin','状态设置','','admin/menu/status','','_self',4,0,1,1,1,1490315067),
(30,0,12,'admin','排序设置','','admin/menu/sort','','_self',5,0,1,1,1,1490315067),
(31,0,12,'admin','添加快捷菜单','','admin/menu/quick','','_self',6,0,1,1,1,1490315067),
(32,0,12,'admin','导出菜单','','admin/menu/export','','_self',7,0,1,1,1,1490315067),
(33,0,13,'admin','添加角色','','admin/user/addrole','','_self',1,0,1,1,1,1490315067),
(34,0,13,'admin','修改角色','','admin/user/editrole','','_self',2,0,1,1,1,1490315067),
(35,0,13,'admin','删除角色','','admin/user/delrole','','_self',3,0,1,1,1,1490315067),
(36,0,13,'admin','状态设置','','admin/user/status','','_self',4,0,1,1,1,1490315067),
(37,0,14,'admin','添加管理员','','admin/user/adduser','','_self',1,0,1,1,1,1490315067),
(38,0,14,'admin','修改管理员','','admin/user/edituser','','_self',2,0,1,1,1,1490315067),
(39,0,14,'admin','删除管理员','','admin/user/deluser','','_self',3,0,1,1,1,1490315067),
(40,0,14,'admin','状态设置','','admin/user/status','','_self',4,0,1,1,1,1490315067),
(41,0,14,'admin','个人信息设置','','admin/user/info','','_self',5,0,1,1,1,1490315067),
(42,0,18,'admin','安装插件','','admin/plugins/install','','_self',1,0,1,1,1,1490315067),
(43,0,18,'admin','卸载插件','','admin/plugins/uninstall','','_self',2,0,1,1,1,1490315067),
(44,0,18,'admin','删除插件','','admin/plugins/del','','_self',3,0,1,1,1,1490315067),
(45,0,18,'admin','状态设置','','admin/plugins/status','','_self',4,0,1,1,1,1490315067),
(46,0,18,'admin','设计插件','','admin/plugins/design','','_self',5,0,1,1,1,1490315067),
(47,0,18,'admin','运行插件','','admin/plugins/run','','_self',6,0,1,1,1,1490315067),
(48,0,18,'admin','更新插件','','admin/plugins/update','','_self',7,0,1,1,1,1490315067),
(49,0,18,'admin','插件配置','','admin/plugins/setting','','_self',8,0,1,1,1,1490315067),
(50,0,19,'admin','添加钩子','','admin/hook/add','','_self',1,0,1,1,1,1490315067),
(51,0,19,'admin','修改钩子','','admin/hook/edit','','_self',2,0,1,1,1,1490315067),
(52,0,19,'admin','删除钩子','','admin/hook/del','','_self',3,0,1,1,1,1490315067),
(53,0,19,'admin','状态设置','','admin/hook/status','','_self',4,0,1,1,1,1490315067),
(54,0,19,'admin','插件排序','','admin/hook/sort','','_self',5,0,1,1,1,1490315067),
(55,0,11,'admin','添加配置','','admin/config/add','','_self',1,0,1,1,1,1490315067),
(56,0,11,'admin','修改配置','','admin/config/edit','','_self',2,0,1,1,1,1490315067),
(57,0,11,'admin','删除配置','','admin/config/del','','_self',3,0,1,1,1,1490315067),
(58,0,11,'admin','状态设置','','admin/config/status','','_self',4,0,1,1,1,1490315067),
(59,0,11,'admin','排序设置','','admin/config/sort','','_self',5,0,1,1,1,1490315067),
(60,0,10,'admin','基础配置','','admin/system/index','group=base','_self',1,0,1,1,1,1490315067),
(61,0,10,'admin','系统配置','','admin/system/index','group=sys','_self',2,0,1,1,1,1490315067),
(62,0,10,'admin','上传配置','','admin/system/index','group=upload','_self',3,0,1,1,1,1490315067),
(63,0,10,'admin','开发配置','','admin/system/index','group=develop','_self',4,0,1,1,1,1490315067),
(64,0,17,'admin','设计模块','','admin/module/design','','_self',6,1,1,1,1,1490315067),
(65,0,17,'admin','安装模块','','admin/module/install','','_self',1,0,1,1,1,1490315067),
(66,0,17,'admin','卸载模块','','admin/module/uninstall','','_self',2,0,1,1,1,1490315067),
(67,0,17,'admin','状态设置','','admin/module/status','','_self',3,0,1,1,1,1490315067),
(68,0,17,'admin','设置默认模块','','admin/module/setdefault','','_self',4,0,1,1,1,1490315067),
(69,0,17,'admin','删除模块','','admin/module/del','','_self',5,0,1,1,1,1490315067),
(70,0,21,'admin','添加会员','','admin/member/add','','_self',1,0,1,1,1,1490315067),
(71,0,21,'admin','修改会员','','admin/member/edit','','_self',2,0,1,1,1,1490315067),
(72,0,21,'admin','删除会员','','admin/member/del','','_self',3,0,1,1,1,1490315067),
(73,0,21,'admin','状态设置','','admin/member/status','','_self',4,0,1,1,1,1490315067),
(74,0,21,'admin','[弹窗]会员选择','','admin/member/pop','','_self',5,0,1,1,1,1490315067),
(75,0,20,'admin','添加会员等级','','admin/member/addlevel','','_self',0,0,1,1,1,1490315067),
(76,0,20,'admin','修改会员等级','','admin/member/editlevel','','_self',0,0,1,1,1,1490315067),
(77,0,20,'admin','删除会员等级','','admin/member/dellevel','','_self',0,0,1,1,1,1490315067),
(78,0,16,'admin','附件上传','','admin/annex/upload','','_self',1,0,1,1,1,1490315067),
(79,0,16,'admin','删除附件','','admin/annex/del','','_self',2,0,1,1,1,1490315067),
(80,0,8,'admin','在线升级','aicon ai-iconfontshengji','admin/upgrade/index','','_self',4,0,1,1,1,1491352728),
(81,0,80,'admin','获取升级列表','','admin/upgrade/lists','','_self',0,0,1,1,1,1491353504),
(82,0,80,'admin','安装升级包','','admin/upgrade/install','','_self',0,0,1,1,1,1491353568),
(83,0,80,'admin','下载升级包','','admin/upgrade/download','','_self',0,0,1,1,1,1491395830),
(84,0,6,'admin','数据库管理','aicon ai-shujukuguanli','admin/database/index','','_self',8,0,1,1,1,1491461136),
(85,0,84,'admin','备份数据库','','admin/database/export','','_self',0,0,1,1,1,1491461250),
(86,0,84,'admin','恢复数据库','','admin/database/import','','_self',0,0,1,1,1,1491461315),
(87,0,84,'admin','优化数据库','','admin/database/optimize','','_self',0,0,1,1,1,1491467000),
(88,0,84,'admin','删除备份','','admin/database/del','','_self',0,0,1,1,1,1491467058),
(89,0,84,'admin','修复数据库','','admin/database/repair','','_self',0,0,1,1,1,1491880879),
(90,0,21,'admin','设置默认等级','','admin/member/setdefault','','_self',0,0,1,1,1,1491966585),
(91,0,10,'admin','数据库配置','','admin/system/index','group=databases','_self',5,0,1,0,1,1492072213),
(92,0,17,'admin','模块打包','','admin/module/package','','_self',7,0,1,1,1,1492134693),
(93,0,18,'admin','插件打包','','admin/plugins/package','','_self',0,0,1,1,1,1492134743),
(94,0,17,'admin','主题管理','','admin/module/theme','','_self',8,0,1,1,1,1492433470),
(95,0,17,'admin','设置默认主题','','admin/module/setdefaulttheme','','_self',9,0,1,1,1,1492433618),
(96,0,17,'admin','删除主题','','admin/module/deltheme','','_self',10,0,1,1,1,1490315067),
(97,0,6,'admin','语言包管理','','admin/language/index','','_self',11,0,1,0,1,1490315067),
(98,0,97,'admin','添加语言包','','admin/language/add','','_self',100,0,1,0,1,1490315067),
(99,0,97,'admin','修改语言包','','admin/language/edit','','_self',100,0,1,0,1,1490315067),
(100,0,97,'admin','删除语言包','','admin/language/del','','_self',100,0,1,0,1,1490315067),
(101,0,97,'admin','排序设置','','admin/language/sort','','_self',100,0,1,0,1,1490315067),
(102,0,97,'admin','状态设置','','admin/language/status','','_self',100,0,1,0,1,1490315067),
(103,0,16,'admin','收藏夹图标上传','','admin/annex/favicon','','_self',3,0,1,0,1,1490315067),
(104,0,17,'admin','导入模块','','admin/module/import','','_self',11,0,1,0,1,1490315067),
(105,0,4,'admin','后台首页','','admin/index/welcome','','_self',100,0,1,0,1,1490315067),
(106,0,4,'admin','布局切换','','admin/user/iframe','','_self',100,0,1,0,1,1490315067),
(107,0,15,'admin','删除日志','','admin/log/del','table=admin_log','_self',100,0,1,0,1,1490315067),
(108,0,15,'admin','清空日志','','admin/log/clear','','_self',100,0,1,0,1,1490315067),
(109,0,17,'admin','编辑模块','','admin/module/edit','','_self',100,0,1,0,1,1490315067),
(110,0,17,'admin','模块图标上传','','admin/module/icon','','_self',100,0,1,0,1,1490315067),
(111,0,18,'admin','导入插件','','admin/plugins/import','','_self',100,0,1,0,1,1490315067),
(112,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(113,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(114,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(115,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(116,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(117,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(118,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(119,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(120,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(121,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(122,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(123,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(124,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(125,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(126,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(127,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(128,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(129,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(130,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(131,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(132,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(133,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(134,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(135,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(136,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(137,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(138,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(139,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(140,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(141,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(142,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(143,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(144,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(145,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(146,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(147,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(148,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(149,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(150,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(151,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(152,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(153,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(154,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(155,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(156,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(157,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(158,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(159,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(160,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(161,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(162,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(163,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(164,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(165,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(166,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(167,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(168,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(169,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(170,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(171,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(172,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(173,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(174,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(175,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(176,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(177,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(178,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(179,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(180,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(181,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(182,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(183,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(184,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(185,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(186,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(187,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(188,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(189,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(190,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(191,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(192,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(193,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(194,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(195,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(196,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(197,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(198,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(199,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(200,0,4,'admin','预留占位','','','','_self',100,0,1,1,0,1490315067),
(222,0,0,'example','示例模块','aicon ai-shezhi','example','','_self',100,0,0,1,1,1523435000),
(223,0,222,'example','新闻管理','aicon ai-shezhi','example/index','','_self',0,0,0,1,1,1523435000),
(224,0,223,'example','新闻分类','aicon ai-shezhi','example/category/index','','_self',0,0,0,1,1,1523435000),
(225,0,224,'example','添加分类','','example/category/add','','_self',0,0,0,1,1,1523435000),
(226,0,224,'example','修改分类','','example/category/edit','','_self',0,0,0,1,1,1523435000),
(227,0,224,'example','删除分类','','example/category/del','','_self',0,0,0,1,1,1523435000),
(228,0,224,'example','状态设置','','example/category/status','table=example_category','_self',0,0,0,1,1,1523435000),
(229,0,223,'example','新闻列表','aicon ai-shezhi','example/index/index','','_self',1,0,0,1,1,1523435000),
(230,0,229,'example','添加新闻','','example/index/add','','_self',0,0,0,1,1,1523435000),
(231,0,229,'example','修改新闻','','example/index/edit','','_self',0,0,0,1,1,1523435000),
(232,0,229,'example','删除新闻','','example/index/del','','_self',0,0,0,1,1,1523435000),
(233,0,229,'example','状态设置','','example/index/status','','_self',0,0,0,1,1,1523435000),
(234,0,0,'yupaker','博客','aicon ai-shezhi','yupaker','','_self',100,0,0,1,1,1523842206),
(235,0,234,'yupaker','新闻管理','aicon ai-caidan','yupaker/news','','_self',0,0,0,1,1,1523842634),
(236,0,235,'yupaker','新闻分类','aicon ai-caidan','yupaker/newscategory/index','','_self',0,0,0,1,1,1523842707),
(237,0,235,'yupaker','新闻列表','aicon ai-caidan','yupaker/news/index','','_self',0,0,0,1,1,1523842748),
(238,0,236,'yupaker','添加分类','','yupaker/newscategory/add','','_self',0,0,0,1,1,1523842785),
(239,0,236,'yupaker','修改分类','','yupaker/newscategory/edit','','_self',0,0,0,1,1,1523842819),
(240,0,236,'yupaker','删除分类','','yupaker/newscategory/del','','_self',0,0,0,1,1,1523842861),
(241,0,236,'yupaker','状态设置','','yupaker/newscategory/status','','_self',0,0,0,1,1,1523842894),
(242,0,237,'yupaker','添加新闻','','yupaker/news/add','','_self',0,0,0,1,1,1523842935),
(243,0,237,'yupaker','修改新闻','','yupaker/news/edit','','_self',0,0,0,1,1,1523842969),
(244,0,237,'yupaker','删除新闻','','yupaker/news/del','','_self',0,0,0,1,1,1523842995),
(245,0,237,'yupaker','状态设置','','yupaker/news/status','','_self',0,0,0,1,1,1523843032),
(246,0,235,'yupaker','标签云','fa fa-tags','yupaker/tags/index','','_self',0,0,0,1,1,1523950091),
(247,0,246,'yupaker','添加标签','','yupaker/tags/add','','_self',0,0,0,1,1,1523950133),
(248,0,246,'yupaker','修改标签','','yupaker/tags/edit','','_self',0,0,0,1,1,1523950157),
(249,0,246,'yupaker','删除标签','','yupaker/tags/del','','_self',0,0,0,1,1,1523950182),
(250,0,246,'yupaker','状态设置','','yupaker/tags/status','','_self',0,0,0,1,1,1523950207),
(251,0,234,'yupaker','评论管理','fa fa-comments-o','yupaker/comments','','_self',1,0,0,1,1,1524105882),
(252,0,251,'yupaker','评论管理','fa fa-comments-o','yupaker/comments/index','','_self',0,0,0,1,1,1524105993),
(253,0,252,'yupaker','查看评论','','yupaker/comments/edit','','_self',0,0,0,1,1,1524106284),
(254,0,252,'yupaker','删除评论','','yupaker/comments/del','','_self',0,0,0,1,1,1524106310),
(255,0,252,'yupaker','状态设置','','yupaker/comments/status','','_self',0,0,0,1,1,1524106338),
(256,0,234,'yupaker','留言管理','fa fa-commenting','yupaker/messages','','_self',2,0,0,1,1,1524106457),
(257,0,256,'yupaker','留言管理','fa fa-commenting','yupaker/messages/index','','_self',0,0,0,1,1,1524106509),
(258,0,257,'yupaker','查看留言','','yupaker/messages/edit','','_self',0,0,0,1,1,1524106543),
(259,0,257,'yupaker','删除留言','','yupaker/messages/del','','_self',0,0,0,1,1,1524106563),
(260,0,257,'yupaker','状态设置','','yupaker/messages/status','','_self',0,0,0,1,1,1524106586),
(261,0,234,'yupaker','订单管理','fa fa-shopping-cart','yupaker/orders','','_self',3,0,0,1,1,1530759006),
(262,0,261,'yupaker','全部订单','fa fa-shopping-cart','yupaker/orders/index','','_self',0,0,0,1,1,1530759168),
(263,0,262,'yupaker','查看','','yupaker/orders/view','','_self',0,0,0,1,1,1530759219),
(264,0,262,'yupaker','状态设置','','yupaker/orders/status','','_self',0,0,0,1,1,1530772315),
(265,1,4,'admin','配置管理','aicon ai-peizhiguanli','admin/config/index','','_self',2,0,0,1,1,1531105135),
(266,0,0,'wx','微信模板','aicon ai-shezhi','wx','','_self',100,0,0,1,1,1532492213);

/*Table structure for table `hisi_admin_menu_lang` */

DROP TABLE IF EXISTS `hisi_admin_menu_lang`;

CREATE TABLE `hisi_admin_menu_lang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `lang` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '语言包',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8;

/*Data for the table `hisi_admin_menu_lang` */

insert  into `hisi_admin_menu_lang`(`id`,`menu_id`,`title`,`lang`) values 
(131,1,'首页',1),
(132,2,'系统',1),
(133,3,'插件',1),
(134,4,'快捷菜单',1),
(135,5,'插件列表',1),
(136,6,'系统功能',1),
(137,7,'会员管理',1),
(138,8,'系统扩展',1),
(139,9,'开发专用',1),
(140,10,'系统设置',1),
(141,11,'配置管理',1),
(142,12,'系统菜单',1),
(143,13,'管理员角色',1),
(144,14,'系统管理员',1),
(145,15,'系统日志',1),
(146,16,'附件管理',1),
(147,17,'模块管理',1),
(148,18,'插件管理',1),
(149,19,'钩子管理',1),
(150,20,'会员等级',1),
(151,21,'会员列表',1),
(152,22,'[示例]列表模板',1),
(153,23,'[示例]编辑模板',1),
(154,24,'后台首页',1),
(155,25,'清空缓存',1),
(156,26,'添加菜单',1),
(157,27,'修改菜单',1),
(158,28,'删除菜单',1),
(159,29,'状态设置',1),
(160,30,'排序设置',1),
(161,31,'添加快捷菜单',1),
(162,32,'导出菜单',1),
(163,33,'添加角色',1),
(164,34,'修改角色',1),
(165,35,'删除角色',1),
(166,36,'状态设置',1),
(167,37,'添加管理员',1),
(168,38,'修改管理员',1),
(169,39,'删除管理员',1),
(170,40,'状态设置',1),
(171,41,'个人信息设置',1),
(172,42,'安装插件',1),
(173,43,'卸载插件',1),
(174,44,'删除插件',1),
(175,45,'状态设置',1),
(176,46,'设计插件',1),
(177,47,'运行插件',1),
(178,48,'更新插件',1),
(179,49,'插件配置',1),
(180,50,'添加钩子',1),
(181,51,'修改钩子',1),
(182,52,'删除钩子',1),
(183,53,'状态设置',1),
(184,54,'插件排序',1),
(185,55,'添加配置',1),
(186,56,'修改配置',1),
(187,57,'删除配置',1),
(188,58,'状态设置',1),
(189,59,'排序设置',1),
(190,60,'基础配置',1),
(191,61,'系统配置',1),
(192,62,'上传配置',1),
(193,63,'开发配置',1),
(194,64,'设计模块',1),
(195,65,'安装模块',1),
(196,66,'卸载模块',1),
(197,67,'状态设置',1),
(198,68,'设置默认模块',1),
(199,69,'删除模块',1),
(200,70,'添加会员',1),
(201,71,'修改会员',1),
(202,72,'删除会员',1),
(203,73,'状态设置',1),
(204,74,'[弹窗]会员选择',1),
(205,75,'添加会员等级',1),
(206,76,'修改会员等级',1),
(207,77,'删除会员等级',1),
(208,78,'附件上传',1),
(209,79,'删除附件',1),
(210,80,'在线升级',1),
(211,81,'获取升级列表',1),
(212,82,'安装升级包',1),
(213,83,'下载升级包',1),
(214,84,'数据库管理',1),
(215,85,'备份数据库',1),
(216,86,'恢复数据库',1),
(217,87,'优化数据库',1),
(218,88,'删除备份',1),
(219,89,'修复数据库',1),
(220,90,'设置默认等级',1),
(221,91,'数据库配置',1),
(222,92,'模块打包',1),
(223,93,'插件打包',1),
(224,94,'主题管理',1),
(225,95,'设置默认主题',1),
(226,96,'删除主题',1),
(227,97,'语言包管理',1),
(228,98,'添加语言包',1),
(229,99,'修改语言包',1),
(230,100,'删除语言包',1),
(231,101,'排序设置',1),
(232,102,'状态设置',1),
(233,103,'收藏夹图标上传',1),
(234,104,'导入模块',1),
(235,105,'欢迎页面',1),
(236,106,'布局切换',1),
(237,107,'删除日志',1),
(238,108,'清空日志',1),
(239,109,'编辑模块',1),
(240,110,'模块图标上传',1),
(241,111,'导入插件',1),
(242,112,'预留占位',1),
(243,113,'预留占位',1),
(244,114,'预留占位',1),
(245,115,'预留占位',1),
(246,116,'预留占位',1),
(247,117,'预留占位',1),
(248,118,'预留占位',1),
(249,119,'预留占位',1),
(250,120,'预留占位',1),
(251,121,'预留占位',1),
(252,122,'预留占位',1),
(253,123,'预留占位',1),
(254,124,'预留占位',1),
(255,125,'预留占位',1),
(256,126,'预留占位',1),
(257,127,'预留占位',1),
(258,128,'预留占位',1),
(259,129,'预留占位',1),
(260,130,'预留占位',1),
(261,131,'预留占位',1),
(262,132,'预留占位',1),
(263,133,'预留占位',1),
(264,134,'预留占位',1),
(265,135,'预留占位',1),
(266,136,'预留占位',1),
(267,137,'预留占位',1),
(268,138,'预留占位',1),
(269,139,'预留占位',1),
(270,140,'预留占位',1),
(271,141,'预留占位',1),
(272,142,'预留占位',1),
(273,143,'预留占位',1),
(274,144,'预留占位',1),
(275,145,'预留占位',1),
(276,146,'预留占位',1),
(277,147,'预留占位',1),
(278,148,'预留占位',1),
(279,149,'预留占位',1),
(280,150,'预留占位',1),
(281,151,'预留占位',1),
(282,152,'预留占位',1),
(283,153,'预留占位',1),
(284,154,'预留占位',1),
(285,155,'预留占位',1),
(286,156,'预留占位',1),
(287,157,'预留占位',1),
(288,158,'预留占位',1),
(289,159,'预留占位',1),
(290,160,'预留占位',1),
(291,161,'预留占位',1),
(292,162,'预留占位',1),
(293,163,'预留占位',1),
(294,164,'预留占位',1),
(295,165,'预留占位',1),
(296,166,'预留占位',1),
(297,167,'预留占位',1),
(298,168,'预留占位',1),
(299,169,'预留占位',1),
(300,170,'预留占位',1),
(301,171,'预留占位',1),
(302,172,'预留占位',1),
(303,173,'预留占位',1),
(304,174,'预留占位',1),
(305,175,'预留占位',1),
(306,176,'预留占位',1),
(307,177,'预留占位',1),
(308,178,'预留占位',1),
(309,179,'预留占位',1),
(310,180,'预留占位',1),
(311,181,'预留占位',1),
(312,182,'预留占位',1),
(313,183,'预留占位',1),
(314,184,'预留占位',1),
(315,185,'预留占位',1),
(316,186,'预留占位',1),
(317,187,'预留占位',1),
(318,188,'预留占位',1),
(319,189,'预留占位',1),
(320,190,'预留占位',1),
(321,191,'预留占位',1),
(322,192,'预留占位',1),
(323,193,'预留占位',1),
(324,194,'预留占位',1),
(325,195,'预留占位',1),
(326,196,'预留占位',1),
(327,197,'预留占位',1),
(328,198,'预留占位',1),
(329,199,'预留占位',1),
(330,200,'预留占位',1);

/*Table structure for table `hisi_admin_module` */

DROP TABLE IF EXISTS `hisi_admin_module`;

CREATE TABLE `hisi_admin_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '系统模块',
  `name` varchar(50) NOT NULL COMMENT '模块名(英文)',
  `identifier` varchar(100) NOT NULL COMMENT '模块标识(模块名(字母).开发者标识.module)',
  `title` varchar(50) NOT NULL COMMENT '模块标题',
  `intro` varchar(255) NOT NULL COMMENT '模块简介',
  `author` varchar(100) NOT NULL COMMENT '作者',
  `icon` varchar(80) NOT NULL DEFAULT 'aicon ai-mokuaiguanli' COMMENT '图标',
  `version` varchar(20) NOT NULL COMMENT '版本号',
  `url` varchar(255) NOT NULL COMMENT '链接',
  `sort` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未安装，1未启用，2已启用',
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '默认模块(只能有一个)',
  `config` text NOT NULL COMMENT '配置',
  `app_id` varchar(30) NOT NULL DEFAULT '0' COMMENT '应用市场ID(0本地)',
  `app_keys` varchar(200) DEFAULT '' COMMENT '应用秘钥',
  `theme` varchar(50) NOT NULL DEFAULT 'default' COMMENT '主题模板',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `identifier` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='[系统] 模块';

/*Data for the table `hisi_admin_module` */

insert  into `hisi_admin_module`(`id`,`system`,`name`,`identifier`,`title`,`intro`,`author`,`icon`,`version`,`url`,`sort`,`status`,`default`,`config`,`app_id`,`app_keys`,`theme`,`ctime`,`mtime`) values 
(1,1,'admin','admin.hisiphp.module','系统管理模块','系统核心模块，用于后台各项管理功能模块及功能拓展','HisiPHP官方出品','','1.0.0','http://www.hisiphp.com',0,2,0,'','0','','default',1489998096,1489998096),
(2,1,'index','index.hisiphp.module','系统默认模块','仅供前端插件访问和应用市场推送安装，禁止在此模块下面开发任何东西。','HisiPHP官方出品','','1.0.0','http://www.hisiphp.com',0,2,0,'','0','','default',1489998096,1489998096),
(3,1,'install','install.hisiphp.module','系统安装模块','系统安装模块，勿动。','HisiPHP官方出品','','1.0.0','http://www.hisiphp.com',0,2,0,'','0','','default',1489998096,1489998096),
(6,0,'example','example.hisiphp.module','示例模块','这是一个开发示例模块，里面集成了后台开发和前台开发示例，仅供参考学习，您可以随时删除此模块。','1.0.0','/static/app_icon/example.png','1.0.0','http://www.hisiphp.com',0,2,0,'','0','','default',1523434990,1523434990),
(7,0,'yupaker','yupaker.hisiphp.module','博客','个人博客','yupaker','/static/app_icon/yupaker.png','1.0.0','',0,2,1,'{\"100\":{\"sort\":\"100\",\"title\":\"\\u7f51\\u7ad9\\u540d\\u79f0\",\"name\":\"SETA_TITLE\",\"type\":\"input\",\"options\":[\"\"],\"value\":\"\\u4e2a\\u4eba\\u535a\\u5ba2\",\"tips\":\"\"},\"101\":{\"sort\":\"101\",\"title\":\"\\u7f51\\u7ad9\\u5173\\u952e\\u8bcd\",\"name\":\"SETA_KEYWORDS\",\"type\":\"input\",\"options\":[\"\"],\"value\":\"\\u4e2a\\u4eba\\u535a\\u5ba21\",\"tips\":\"\"},\"102\":{\"sort\":\"102\",\"title\":\"\\u7f51\\u7ad9\\u63cf\\u8ff0\",\"name\":\"SETA_DESCRIPTION\",\"type\":\"input\",\"options\":[\"\"],\"value\":\"\\u4e2a\\u4eba\\u535a\\u5ba22\",\"tips\":\"\"}}','0','','default',1523842193,1523842193),
(8,0,'wx','wx.hisiphp.module','微信模板','微信开发模板','yupaker','/static/app_icon/wx.png','1.0.0','www.mengjiang.xyz',0,2,0,'','0','','default',1532492183,1532492183);

/*Table structure for table `hisi_admin_plugins` */

DROP TABLE IF EXISTS `hisi_admin_plugins`;

CREATE TABLE `hisi_admin_plugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL COMMENT '插件名称(英文)',
  `title` varchar(32) NOT NULL COMMENT '插件标题',
  `icon` varchar(64) NOT NULL COMMENT '图标',
  `intro` text NOT NULL COMMENT '插件简介',
  `author` varchar(32) NOT NULL COMMENT '作者',
  `url` varchar(255) NOT NULL COMMENT '作者主页',
  `version` varchar(16) NOT NULL DEFAULT '' COMMENT '版本号',
  `identifier` varchar(64) NOT NULL DEFAULT '' COMMENT '插件唯一标识符',
  `config` text NOT NULL COMMENT '插件配置',
  `app_id` varchar(30) NOT NULL DEFAULT '0' COMMENT '应用市场ID(0本地)',
  `app_keys` varchar(200) DEFAULT '' COMMENT '应用秘钥',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='[系统] 插件表';

/*Data for the table `hisi_admin_plugins` */

insert  into `hisi_admin_plugins`(`id`,`system`,`name`,`title`,`icon`,`intro`,`author`,`url`,`version`,`identifier`,`config`,`app_id`,`app_keys`,`ctime`,`mtime`,`sort`,`status`) values 
(1,0,'hisiphp','系统基础信息','/plugins/hisiphp/hisiphp.png','后台首页展示系统基础信息和开发团队信息','HisiPHP','http://www.hisiphp.com','1.0.0','hisiphp.hisiphp.plugins','','0','',1509379331,1509379331,0,2);

/*Table structure for table `hisi_admin_role` */

DROP TABLE IF EXISTS `hisi_admin_role`;

CREATE TABLE `hisi_admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `intro` varchar(200) NOT NULL COMMENT '角色简介',
  `auth` text NOT NULL COMMENT '角色权限',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[系统] 管理角色';

/*Data for the table `hisi_admin_role` */

insert  into `hisi_admin_role`(`id`,`name`,`intro`,`auth`,`ctime`,`mtime`,`status`) values 
(1,'超级管理员','拥有系统最高权限','0',1489411760,0,1),
(2,'系统管理员','拥有系统管理员权限','[\"1\",\"4\",\"25\",\"24\",\"2\",\"6\",\"10\",\"60\",\"61\",\"62\",\"63\",\"91\",\"11\",\"55\",\"56\",\"57\",\"58\",\"59\",\"12\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"13\",\"33\",\"34\",\"35\",\"36\",\"14\",\"37\",\"38\",\"39\",\"40\",\"41\",\"16\",\"78\",\"79\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"7\",\"20\",\"75\",\"76\",\"77\",\"21\",\"90\",\"70\",\"71\",\"72\",\"73\",\"74\",\"8\",\"17\",\"65\",\"66\",\"67\",\"68\",\"94\",\"95\",\"18\",\"42\",\"43\",\"45\",\"47\",\"48\",\"49\",\"19\",\"80\",\"81\",\"82\",\"83\",\"9\",\"22\",\"23\",\"3\",\"5\"]',1489411760,0,1),
(3,'测试模块管理员','','{\"0\":\"1\",\"1\":\"4\",\"2\":\"25\",\"3\":\"24\",\"4\":\"105\",\"5\":\"106\",\"123\":\"234\",\"124\":\"235\",\"125\":\"236\",\"126\":\"238\",\"127\":\"239\",\"128\":\"240\",\"129\":\"241\",\"130\":\"237\",\"131\":\"242\",\"132\":\"243\",\"133\":\"244\",\"134\":\"245\",\"135\":\"246\",\"136\":\"247\",\"137\":\"248\",\"138\":\"249\",\"139\":\"250\",\"140\":\"251\",\"141\":\"252\",\"142\":\"253\",\"143\":\"254\",\"144\":\"255\",\"145\":\"256\",\"146\":\"257\",\"147\":\"258\",\"148\":\"259\",\"149\":\"260\",\"150\":\"261\",\"151\":\"262\",\"152\":\"263\",\"153\":\"264\"}',1523429075,1531470892,1);

/*Table structure for table `hisi_admin_user` */

DROP TABLE IF EXISTS `hisi_admin_user`;

CREATE TABLE `hisi_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL,
  `nick` varchar(50) NOT NULL COMMENT '昵称',
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `auth` text NOT NULL COMMENT '权限',
  `iframe` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0默认，1框架',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `last_login_ip` varchar(128) NOT NULL COMMENT '最后登陆IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `ctime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `mtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[系统] 管理用户';

/*Data for the table `hisi_admin_user` */

insert  into `hisi_admin_user`(`id`,`role_id`,`username`,`password`,`nick`,`mobile`,`email`,`auth`,`iframe`,`status`,`last_login_ip`,`last_login_time`,`ctime`,`mtime`) values 
(1,1,'admin','$2y$10$rPCBmZ3HYR6QqvsuWR/lwuc.f8j/DKWRLHq.fiDlFOIZE3XWldada','超级管理员','','','',0,1,'0.0.0.0',1532492143,1523413362,1532492143),
(2,3,'ceshi','$2y$10$QBmafnyorGXz.zVLHs7hO.MohgO3JkazV8/hTr0QyO5PLK7l.grrG','测试','','','',0,1,'0.0.0.0',1531471010,1523428977,1531471010),
(3,3,'asd','$2y$10$G/y47y.IfEFMWP4XmOkjDepQkJeGmx9rzU9uRvZY2baViAak6sg9C','阿斯达','','','[\"1\",\"4\",\"25\",\"24\",\"105\",\"106\"]',0,1,'0.0.0.0',0,1531470364,1531470720);

/*Table structure for table `hisi_example_category` */

DROP TABLE IF EXISTS `hisi_example_category`;

CREATE TABLE `hisi_example_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `status` tinyint(1) DEFAULT '1' COMMENT '0隐藏，1显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `hisi_example_category` */

insert  into `hisi_example_category`(`id`,`pid`,`name`,`status`) values 
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

/*Table structure for table `hisi_example_news` */

DROP TABLE IF EXISTS `hisi_example_news`;

CREATE TABLE `hisi_example_news` (
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

/*Data for the table `hisi_example_news` */

insert  into `hisi_example_news`(`id`,`cid`,`title`,`author`,`source`,`img`,`content`,`ctime`,`mtime`,`status`) values 
(1,3,'测试新闻','hisiphp','hisiphp.com','','&lt;p&gt;这是新闻内容&lt;/p&gt;',1507476022,1507483987,1),
(2,13,'第二条测试新闻','hisiphp','hisiphp.com','','&lt;p&gt;第二条测试新闻&lt;/p&gt;',1507479216,1507483978,0);

/*Table structure for table `hisi_yupaker_comments` */

DROP TABLE IF EXISTS `hisi_yupaker_comments`;

CREATE TABLE `hisi_yupaker_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsid` int(10) DEFAULT '0' COMMENT '文章ID',
  `content` varchar(300) DEFAULT NULL COMMENT '内容',
  `reid` int(10) DEFAULT '0' COMMENT '回复主ID',
  `catreid` int(10) DEFAULT '0' COMMENT '回复次级ID',
  `memid` int(10) DEFAULT '0' COMMENT '会员ID',
  `ip` varchar(50) DEFAULT NULL,
  `addtime` int(10) DEFAULT '0' COMMENT '添加时间',
  `status` tinyint(3) DEFAULT '0' COMMENT '0-未审核，1-通过，2-驳回',
  `nickname` varchar(20) DEFAULT NULL COMMENT '姓名',
  `qq` varchar(20) DEFAULT '0',
  `newstitle` varchar(50) DEFAULT NULL COMMENT '新闻标题',
  `image` varchar(100) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `rename` varchar(20) DEFAULT NULL COMMENT '回复的姓名',
  `email` varchar(30) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL COMMENT '站点',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `hisi_yupaker_comments` */

insert  into `hisi_yupaker_comments`(`id`,`newsid`,`content`,`reid`,`catreid`,`memid`,`ip`,`addtime`,`status`,`nickname`,`qq`,`newstitle`,`image`,`title`,`rename`,`email`,`site`) values 
(1,5,'display：inline-block用font-size:0; letter-spacing:-3;一开始我把这两句加到了li元素上，发现在chrome下不好使，然后又改加到ul上，发现管用了呢，佩服',0,0,1000004,'168.0.0.1',1524039648,1,'张心灵','586574869','拜拜了,浮动布局-基于display:inline-block的列表布局',NULL,NULL,NULL,NULL,NULL),
(2,5,'li上边，当然不管用了，你取出的是li之间的空文本所占的空格，空文本又没在li里边',1,0,1000004,NULL,1524039668,1,'仓颉','359687458','拜拜了,浮动布局-基于display:inline-block的列表布局',NULL,NULL,'张心灵',NULL,NULL),
(3,2,'马老板社会',0,0,1000004,NULL,1524039648,1,'会舔的人','86597584','news',NULL,NULL,NULL,NULL,NULL),
(4,5,'回你',1,0,1000004,NULL,1528426007,1,'张新浪','3423423','拜拜',NULL,NULL,'仓颉',NULL,NULL),
(5,5,'333333',0,0,1000004,NULL,1528426007,1,'123','0',NULL,NULL,NULL,NULL,'321','123123'),
(6,5,'&lt;script&gt;alert();&lt;script&gt;',0,0,1000004,'0.0.0.0',1528426748,1,'张起灵','0',NULL,NULL,NULL,NULL,'132456@qq.com','wu'),
(9,5,'',0,0,1000004,'0.0.0.0',1528698870,1,'1','0',NULL,NULL,NULL,NULL,'302700308@q.com',''),
(10,5,'huifu',5,0,1000004,'127.0.0.1',1528785454,1,'匿名用户','0',NULL,NULL,NULL,'123',NULL,NULL),
(11,5,'re',5,0,1000004,'127.0.0.1',1528785654,1,'匿名用户','0',NULL,NULL,NULL,'123',NULL,NULL),
(12,5,'333333',0,0,1000004,'127.0.0.1',1528787356,1,'cookname','0',NULL,NULL,NULL,NULL,'123@qq.com','123'),
(13,5,'cook作用',6,0,1000004,'127.0.0.1',1528787371,1,'匿名用户','0',NULL,NULL,NULL,'张起灵',NULL,NULL),
(14,5,'cook2',6,0,1000004,'127.0.0.1',1528787421,1,'cookname','0',NULL,NULL,NULL,'张起灵',NULL,NULL),
(15,5,'11111',0,0,1000004,'127.0.0.1',1528788014,1,'鱼','0',NULL,NULL,NULL,NULL,'12323123123@qq.com','wu'),
(16,5,'SHUI',15,0,1000004,'127.0.0.1',1528788024,1,'鱼','0',NULL,NULL,NULL,'鱼','12323123123@qq.com','wu'),
(17,5,'hehe',6,0,1000004,'127.0.0.1',1528789123,1,'鱼','0',NULL,NULL,NULL,'张起灵','12323123123@qq.com','wu'),
(18,5,'asd',6,0,1000004,'127.0.0.1',1528789386,1,'鱼','0',NULL,NULL,NULL,'cookname','12323123123@qq.com','wu'),
(19,5,'das',6,0,1000004,'127.0.0.1',1528789400,1,'鱼','0',NULL,NULL,NULL,'匿名用户','12323123123@qq.com','wu'),
(20,5,'pinglunyixia',0,0,1000005,'0.0.0.0',1529480406,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(21,5,'说人话',20,20,1000005,'0.0.0.0',1529480885,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(22,5,'额呵呵',20,21,1000005,'0.0.0.0',1529480894,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(23,5,'jjjjjjj',0,0,1000005,'0.0.0.0',1529891458,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(24,5,'iiiii',23,23,1000005,'0.0.0.0',1529891471,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(28,5,'666',6,19,1000000,'0.0.0.0',1529912540,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(26,5,'jijijij',23,24,1000000,'0.0.0.0',1529900002,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(27,5,'nnnnn',23,23,1000000,'0.0.0.0',1529900045,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),
(29,3,'1',0,0,1000005,'127.0.0.1',1530172511,1,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `hisi_yupaker_messages` */

DROP TABLE IF EXISTS `hisi_yupaker_messages`;

CREATE TABLE `hisi_yupaker_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(300) DEFAULT NULL COMMENT '内容',
  `addtime` int(10) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0' COMMENT '0-未审核，1-成功，2-驳回',
  `ip` varchar(50) DEFAULT NULL,
  `memid` int(10) DEFAULT '0' COMMENT '会员ID',
  `reid` int(10) DEFAULT '0' COMMENT '回复主ID',
  `catreid` int(10) DEFAULT '0' COMMENT '回复次级id',
  `nickname` varchar(20) DEFAULT NULL COMMENT '姓名',
  `image` varchar(100) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `recontent` text COMMENT '回复内容',
  `retime` int(10) DEFAULT '0' COMMENT '回复时间',
  `reip` varchar(50) DEFAULT NULL COMMENT '回复IP',
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `hisi_yupaker_messages` */

insert  into `hisi_yupaker_messages`(`id`,`content`,`addtime`,`status`,`ip`,`memid`,`reid`,`catreid`,`nickname`,`image`,`qq`,`title`,`recontent`,`retime`,`reip`,`email`) values 
(1,'博主大大你好',1524039648,1,NULL,1000000,0,0,'红衣小姑娘',NULL,'728736271',NULL,'去巡山！',1524117938,NULL,NULL),
(2,'1',1529378983,1,'127.0.0.1',1000004,1,0,NULL,NULL,NULL,NULL,NULL,1529378983,NULL,NULL),
(3,'hwhhwh',1529386969,1,'0.0.0.0',1000004,0,0,NULL,NULL,NULL,NULL,NULL,1529386969,NULL,NULL),
(4,'这个好',1529457363,1,'0.0.0.0',1000004,0,0,NULL,NULL,NULL,NULL,NULL,1529457363,NULL,NULL),
(5,'真的皮',1529463765,1,'0.0.0.0',1000004,0,0,NULL,NULL,NULL,NULL,NULL,1529463765,NULL,NULL),
(6,'李时珍的皮',1529463870,1,'0.0.0.0',1000004,3,3,NULL,NULL,NULL,NULL,NULL,1529463870,NULL,NULL),
(7,'陈独秀',1529465223,1,'0.0.0.0',1000004,0,0,NULL,NULL,NULL,NULL,NULL,1529465223,NULL,NULL),
(8,'造化钟神秀',1529465250,1,'0.0.0.0',1000004,7,7,NULL,NULL,NULL,NULL,NULL,1529465250,NULL,NULL),
(9,'xiu',1529465375,1,'0.0.0.0',1000004,7,8,NULL,NULL,NULL,NULL,NULL,1529465375,NULL,NULL),
(10,'sdlkfj',1529473672,1,'0.0.0.0',1000005,0,0,NULL,NULL,NULL,NULL,NULL,1529473672,NULL,NULL),
(11,'hehe',1529473702,1,'0.0.0.0',1000005,7,8,NULL,NULL,NULL,NULL,NULL,1529473702,NULL,NULL),
(12,'那个&amp;nbsp; G了吧&lt;br /&gt;',1529898369,1,'0.0.0.0',1000000,7,11,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(13,'内个 要不g了吧 打不过了已经',1529898562,1,'127.0.0.1',1000000,7,11,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(14,'ggg',1530254989,1,'127.0.0.1',1000005,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(15,'管理员回复',1531464928,1,'0.0.0.0',1000000,0,14,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(16,'这里是管理员回复内容',1531465366,1,'0.0.0.0',1000000,14,14,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(17,'留言发送邮件测试',1531465656,1,'0.0.0.0',1000000,14,16,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(18,'1',1531466540,1,'0.0.0.0',1000000,14,17,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(19,'2',1531466559,1,'0.0.0.0',1000000,14,18,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(20,'3',1531466661,1,'0.0.0.0',1000000,14,19,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(21,'自动发送邮件测试',1531469099,1,'0.0.0.0',1000000,5,5,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
(22,'无收件箱测试',1531469288,1,'0.0.0.0',1000000,5,21,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL);

/*Table structure for table `hisi_yupaker_news` */

DROP TABLE IF EXISTS `hisi_yupaker_news`;

CREATE TABLE `hisi_yupaker_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(10) DEFAULT '0' COMMENT '分类ID',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `code` varchar(50) DEFAULT NULL COMMENT '标识',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `addtime` int(10) DEFAULT '0' COMMENT '创建时间',
  `memo` varchar(300) DEFAULT NULL COMMENT '简介',
  `content` text COMMENT '详细内容',
  `ishot` tinyint(3) DEFAULT '0' COMMENT '推荐',
  `isnew` tinyint(3) DEFAULT '0' COMMENT '最新',
  `sort` tinyint(3) DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) DEFAULT '0' COMMENT '状态(0隐藏，1显示)',
  `images` text COMMENT '多图',
  `image` varchar(100) DEFAULT NULL COMMENT '图片',
  `source` varchar(100) DEFAULT NULL COMMENT '来源',
  `file` varchar(100) DEFAULT NULL COMMENT '文件',
  `viewnum` int(10) DEFAULT '0' COMMENT '点击数',
  `tagids` varchar(200) DEFAULT NULL COMMENT '多个标签ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='[ceshi]新闻表';

/*Data for the table `hisi_yupaker_news` */

insert  into `hisi_yupaker_news`(`id`,`catid`,`title`,`code`,`author`,`addtime`,`memo`,`content`,`ishot`,`isnew`,`sort`,`status`,`images`,`image`,`source`,`file`,`viewnum`,`tagids`) values 
(2,4,'news',NULL,'马云',1524039648,'让天下没有难写的代码','&lt;p&gt;123&lt;br/&gt;&lt;/p&gt;',1,0,0,1,NULL,'/upload/sys/image/91/8e72db27cbf14011c87f21ac938e96.png','123','',197,'js+jquery,html+css,canvas'),
(3,4,'hehe',NULL,'管理员',1523956553,'','&lt;p&gt;1&lt;br/&gt;&lt;/p&gt;',0,0,0,1,NULL,'','','',53789,'php,java'),
(5,1,'拜拜了,浮动布局-基于display:inline-block的列表布局',NULL,'张鑫旭',1524032482,'对于浮动局部的局限性，想必同行们都知道，就是每个列表元素的高度必须要一致，否则就会像是俄罗斯方块一样，“锯齿相错”，例如一个左浮动列表布局，如果第一行有个列表高度高于其他列表，那就在第二行，第一个元素会沿着最高元素的右侧对齐。\r\n浮动本身就是个魔鬼，所以，使用浮动布局还需要修复其带来的副作用——高度塌陷的问题，也就是常提到的“清除浮动”了。\r\n另外，IE6下，重复的列表元素会出现莫名的bug，例如出现不知哪来的文字。\r\n而基于display:inline-block的列表布局可以避免这些问题，本文就将一步一步地展示基于displ','&lt;p style=&quot;text-align:left;&quot;&gt;\r\n	&lt;span&gt;如果你以为基于display:inline-block的列表布局的优点仅仅在于可以让列表元素不等高，那你就大错特错了。&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&gt;在IE6/7下，inline水平标签inline-block化后与纯正的inline-block元素的作用就像是一个模子里出来的，这种“兼容性”可以很好地发挥inline-block列表布局的潜力。例如，使用white-space:nowrap属性可以让列表不换行，你是否想到了列表元素的水平滚动切换？&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://image.zhangxinxu.com/image/blog/201011/2010-11-03_221329.png&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&gt;使用text-align:justify可以实现自动等宽水平排列的列表布局，而且是两端对齐的，不需要计算宽度，一切都是浏览器自动的，很方便很强大。尤其在自适应布局中，大显身手，大放光彩。就以此举个简单的例子吧，如下CSS代码：&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;pre class=&quot;prettyprint lang-css&quot;&gt;.box{width:50%; padding:20px; margin:20px auto; background-color:#f0f3f9; text-align:justify;}\r\n.list{width:120px; display:inline-block; padding-bottom:20px; text-align:center; vertical-align:top;}&lt;/pre&gt;\r\n&lt;p&gt;\r\n	如下HTML代码：\r\n&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;pre class=&quot;prettyprint lang-html&quot;&gt;&amp;lt;div class=&quot;box&quot;&amp;gt;\r\n    &amp;lt;span class=&quot;list&quot;&amp;gt;&amp;lt;img src=&quot;mm9.jpg&quot; /&amp;gt;\r\n哇哦，美女，口水，鼻血~~~&amp;lt;/span&amp;gt;\r\n    &amp;lt;span class=&quot;list&quot;&amp;gt;&amp;lt;img src=&quot;mm9.jpg&quot; /&amp;gt;\r\n哇哦，美女，口水，鼻血，不行了，我的小兔乱撞~~&amp;lt;/span&amp;gt;\r\n    .\r\n    .\r\n    .\r\n&amp;lt;/div&amp;gt;&lt;/pre&gt;\r\n&lt;br /&gt;\r\n&lt;/div&gt;\r\n转载自: &lt;a href=&quot;http://www.zhangxinxu.com/wordpress/2010/11/拜拜了,浮动布局-基于display:inline-block的列表布局/&quot; target=&quot;_blank&quot;&gt;张鑫旭个人博客&lt;span id=&quot;__kindeditor_bookmark_start_38__&quot;&gt;&lt;/span&gt;www.zhangxinxu.com&lt;/a&gt;&lt;span id=&quot;__kindeditor_bookmark_end_39__&quot;&gt;&lt;/span&gt;&lt;br /&gt;',1,0,0,1,NULL,'','http://www.zhangxinxu.com/wordpress/2010/11/拜拜了,浮动布局-基于display:inline-block的列表布局/','',292,'html+css'),
(6,1,'cookie和session',NULL,'管理员',1525748951,'session 是一个抽象概念，开发者为了实现中断和继续等操作，将 user agent 和 server 之间一对一的交互，抽象为“会话”，进而衍生出“会话状态”，也就是 session 的概念。\r\ncookie 是一个实际存在的东西，http 协议中定义在 header 中的字段。可以认为是 session 的一种后端无状态实现。\r\n而我们今天常说的 “session”，是为了绕开 cookie 的各种限制，通常借助 cookie 本身和后端存储实现的，一种更高级的会话状态实现。','&lt;p&gt;\r\n	1，session 在服务器端，cookie 在客户端（浏览器）&lt;br /&gt;\r\n2，session 默认被存在在服务器的一个文件里（不是内存）&lt;br /&gt;\r\n3，session 的运行依赖 session id，而 session id 是存在 cookie 中的，也就是说，如果浏览器禁用了 cookie ，同时 session 也会失效（但是可以通过其它方式实现，比如在 url 中传递 session_id）&lt;br /&gt;\r\n4，session 可以放在 文件、数据库、或内存中都可以。&lt;br /&gt;\r\n5，用户验证这种场合一般会用 session\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	当我们需要保存用户信息时，就用cookie；不需要时，就用session。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	JSP：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	创建cookie\r\n&lt;/p&gt;\r\n&lt;pre class=&quot;prettyprint lang-js&quot;&gt;//创建一个Cookie对象\r\nCookie name = new Cookie(&quot;name&quot;,&quot;heheda&quot;); \r\n//设置有效期  \r\nname.setMaxAge(5); \r\n//将cookie发送至HTTP响应头中\r\nresponse.addCookie( name );&lt;/pre&gt;\r\n&lt;p&gt;\r\n	读取cookie\r\n&lt;/p&gt;\r\n&lt;pre class=&quot;prettyprint lang-js&quot;&gt;//获取cookie数组 \r\nCookie[] cookies = request.getCookies();\r\nif( cookies != null){\r\n    for( int i=0;i&amp;lt;cookies.length;i++){\r\n        Cookie cookie = cookies[i];\r\n        if(cookie.getName().equals(&quot;name&quot;)){\r\n            out.print(cookie.getName()+&quot;:&quot;+ cookie.getValue());\r\n        }\r\n    }\r\n}&lt;/pre&gt;\r\n&lt;p&gt;\r\n	未完\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;',1,0,0,1,NULL,'','',NULL,24,'java'),
(7,1,'socket bind failed的原因以及解决办法',NULL,'管理员',1525748938,'socket bind failed\r\n出现原因：一般是tomcat启动所需的端口号被占用造成的；\r\n解决办法：找出这个占用进程，并关闭它，重启tomcat即可。','socket bind failed&lt;br /&gt;\r\n出现原因：一般是tomcat启动所需的端口号被占用造成的；&lt;br /&gt;\r\n解决办法：找出这个占用进程，并关闭它，重启tomcat即可。&lt;br /&gt;\r\n具体步骤：&lt;br /&gt;\r\n第一步：在dos窗口中输入指令：netstat -ano | findstr 8080，其中8080是指你启动该tomcat所需的，被占用的端口号；&lt;br /&gt;\r\n第二步：输入 tasklist|findstr 3292 ,3292是指占用端口号的进程的pid， 查看占用的进程（可省略）；&lt;br /&gt;\r\n第三步：输入 taskkill /f /pid 3292 , 关闭进程即可；&lt;br /&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;/upload/sys/image/24/19f52e966ea8ec2380c5c1f4ec57cd.png&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;',0,0,0,1,NULL,'','',NULL,25,'java'),
(8,1,'分享一种phpstudy支持多版本php的方法',NULL,'管理员',1525757929,'因为设计多个项目的开发，每个项目的php版本会有所不同，用多个服务器肯定不太现实，于是总结了这个方法做个记录。\r\n本方法只针对phpstudy，其他可以做参考。','&lt;p&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; 首先打开apache配置文件 httpd.conf 查找&amp;nbsp;LoadModule&amp;nbsp;fcgid_module&amp;nbsp;modules/mod_fcgid.so，如果有就可以忽略这步操作，一般新版本phpstudy都已经自动开启；没有的话查找&amp;nbsp;Include conf/extra/httpd-mpm.conf，在该行代码下面添加两行代码：\r\n&lt;/p&gt;\r\n&lt;pre class=&quot;prettyprint lang-php&quot;&gt;Include conf/extra/httpd-mpm.conf\r\nLoadModule fcgid_module modules/mod_fcgid.so\r\nAddHandler fcgid-script .fcgi .php \r\nInclude conf/extra/httpd-php-fcgid70.conf&lt;/pre&gt;\r\n&lt;p&gt;\r\n	然后打开你的站点域名配置文件 vhosts.conf，在需要添加不同php版本的地方添加两行代码，注意修改路径：\r\n&lt;/p&gt;\r\n&lt;pre class=&quot;prettyprint lang-php&quot;&gt;&amp;lt;VirtualHost *:81&amp;gt;\r\n    DocumentRoot &quot;E:\\gitlearn\\hisiphp&quot;\r\n    ServerName localhost\r\n    ServerAlias \r\n    FcgidInitialEnv PHPRC &quot;E:/phpstudy/php55n&quot;\r\n    FcgidWrapper &quot;E:/phpstudy/php55n/php-cgi.exe&quot; .php\r\n  &amp;lt;Directory &quot;E:\\gitlearn\\hisiphp&quot;&amp;gt;\r\n      Options FollowSymLinks ExecCGI\r\n      AllowOverride All\r\n      Order allow,deny\r\n      Allow from all\r\n      Require all granted\r\n  &amp;lt;/Directory&amp;gt;\r\n&amp;lt;/VirtualHost&amp;gt;&lt;/pre&gt;\r\n&lt;p&gt;\r\n	然后重启apache。。就没了\r\n&lt;br&gt;\r\n	是不是很简单，想要哪个版本就加哪个版本\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;strong&gt;加一个测试结果&lt;/strong&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	我测试了4个版本： &amp;nbsp;php7.0（全局默认版本）；5.5；5.3；5.2；\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	我的vhosts.conf配置如下：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;file://C:\\Users\\Administrator\\AppData\\Roaming\\Tencent\\Users\\302700308\\QQ\\WinTemp\\RichOle\\8%{DXS{W3RD0$CT``1M56E3.png&quot; /&gt;&lt;img src=&quot;/upload/sys/image/dc/71723ea93635dde058879131085383.png&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	重启Apache查看结果：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;/upload/sys/image/28/2a380bc96ebe0ee4e704bcac843f79.png&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color:#E53333;&quot;&gt;该方法有个缺点，每次添加站点并保存配置文件时，即配置文件vhost.conf被修改后都需要重新设置；所以请看情况使用该方法。&lt;/span&gt; \r\n&lt;/p&gt;',1,0,0,1,NULL,'','',NULL,96,'php');

/*Table structure for table `hisi_yupaker_newscategory` */

DROP TABLE IF EXISTS `hisi_yupaker_newscategory`;

CREATE TABLE `hisi_yupaker_newscategory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `upid` int(10) DEFAULT '0' COMMENT '上级栏目ID',
  `title` varchar(50) DEFAULT NULL COMMENT '栏目标题',
  `code` varchar(50) DEFAULT NULL COMMENT '标识',
  `memo` varchar(200) DEFAULT NULL COMMENT '简介',
  `addtime` int(10) DEFAULT '0' COMMENT '添加时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '0隐藏，1显示',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='[ceshi]新闻栏目表';

/*Data for the table `hisi_yupaker_newscategory` */

insert  into `hisi_yupaker_newscategory`(`id`,`upid`,`title`,`code`,`memo`,`addtime`,`status`,`link`) values 
(1,0,'技术','',NULL,0,1,NULL),
(6,0,'分享','',NULL,0,1,NULL),
(4,0,'生活','',NULL,0,1,NULL),
(5,0,'资料','',NULL,0,1,'');

/*Table structure for table `hisi_yupaker_ordergoods` */

DROP TABLE IF EXISTS `hisi_yupaker_ordergoods`;

CREATE TABLE `hisi_yupaker_ordergoods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orderid` int(10) DEFAULT '0' COMMENT '订单ID',
  `goodsid` int(10) DEFAULT '0' COMMENT '商品ID',
  `goodsname` varchar(100) DEFAULT NULL COMMENT '商品名称',
  `goodsprice` decimal(10,2) DEFAULT '0.00' COMMENT '商品价格',
  `goodsnumber` int(10) DEFAULT '0' COMMENT '商品数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `hisi_yupaker_ordergoods` */

/*Table structure for table `hisi_yupaker_orders` */

DROP TABLE IF EXISTS `hisi_yupaker_orders`;

CREATE TABLE `hisi_yupaker_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orderno` varchar(30) NOT NULL COMMENT '订单号',
  `memid` int(10) NOT NULL DEFAULT '0' COMMENT '付款会员ID',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价格',
  `addtime` int(10) DEFAULT '0' COMMENT '下单时间',
  `memo` varchar(200) DEFAULT NULL COMMENT '备注',
  `ip` varchar(50) DEFAULT '0' COMMENT '下单IP',
  `paytype` tinyint(3) DEFAULT '0' COMMENT '付款状态',
  `status` tinyint(3) DEFAULT '0' COMMENT '订单状态',
  `payid` int(10) DEFAULT '0' COMMENT '付款方式ID',
  `payname` varchar(50) DEFAULT NULL COMMENT '付款方式名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `hisi_yupaker_orders` */

insert  into `hisi_yupaker_orders`(`id`,`orderno`,`memid`,`price`,`addtime`,`memo`,`ip`,`paytype`,`status`,`payid`,`payname`) values 
(1,'20180101002562',1000005,1.00,175869584,NULL,'0.0.0.1',1,1,1,'支付宝');

/*Table structure for table `hisi_yupaker_tags` */

DROP TABLE IF EXISTS `hisi_yupaker_tags`;

CREATE TABLE `hisi_yupaker_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `hisi_yupaker_tags` */

insert  into `hisi_yupaker_tags`(`id`,`title`,`status`) values 
(1,'php',1),
(2,'java',1),
(3,'js+jquery',1),
(4,'html+css',1),
(5,'canvas',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
