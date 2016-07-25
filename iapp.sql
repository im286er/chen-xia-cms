-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 13 日 00:50
-- 服务器版本: 5.1.58
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `iapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `ws_blog`
--

CREATE TABLE IF NOT EXISTS `ws_blog` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` mediumtext COMMENT '标题',
  `content` longtext COMMENT '博客内容',
  `view` bigint(20) DEFAULT NULL COMMENT '浏览量',
  `time` int(11) DEFAULT '0' COMMENT '发布博文时间',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `labelid` int(5) DEFAULT NULL COMMENT '栏目/标签id',
  `userid` int(5) DEFAULT NULL COMMENT '用户id',
  `message` int(5) DEFAULT '0' COMMENT '留言总数',
  `type` tinyint(1) DEFAULT NULL COMMENT '文章类型 1表示热门 2表示普通',
  `image` mediumtext COMMENT '缩略图 以@拼接',
  `videolink` varchar(255) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `readaccess` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=103 ;

--
-- 转存表中的数据 `ws_blog`
--

INSERT INTO `ws_blog` (`id`, `title`, `content`, `view`, `time`, `updatetime`, `labelid`, `userid`, `message`, `type`, `image`, `videolink`, `hide`, `readaccess`) VALUES
(75, '搞笑视频 - 搞笑的恶作剧 - 有趣的失败 - 最佳搞笑视频2015年', '<p>搞笑视频 - 搞笑的恶作剧 - 有趣的失败 - 最佳搞笑视频2015年</p><p></p>', 12, 1452352872, 0, 11, 1, 0, 3, '145965535075119.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/best-funny-2015.mp4', 0, 0),
(76, '魅力恩施英文宣传片   Enshi： a paradise for tourists', '<p>魅力恩施英文宣传片&nbsp;&nbsp; Enshi： a paradise for tourists</p><p></p>', 18, 1459452881, 0, 1, 1, 0, 3, '145966213242161.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/Enshiaparadisefortourists.mp4', 0, 0),
(83, '2016年Vine搞笑短片精選《合輯5》- 超正模特兒 (中文)', '<p>--<br/></p>', 5, 1450772920, 0, 11, 1, 0, 3, '145977292047970.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/2016Vinechaozhengmoteer.mp4', 0, 0),
(78, '辣妹經過的分心測驗！(中文字幕)', '<p>辣妹經過的分心測驗！(中文字幕)</p><p></p><p><br/></p>', 7, 1419752914, 0, 11, 1, 1, 3, '145966284259848.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/lameijingguodefenxinshiyan.mp4', 0, 0),
(79, '2016 年 搞笑逗比作死视频大集锦 城会玩！', '<p>2016 年 搞笑逗比作死视频大集锦 城会玩！</p><p></p><p><br/></p>', 7, 1429752866, 0, 11, 1, 0, 3, '145966291177746.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/2016gaoxiaodoubishipindajingjichenghuiwan.mp4', 0, 0),
(82, '這個女生為了測試男友忠誠度就請辣妹熱情搭訕他，結果...', '<p>--</p>', 7, 1359728676, 0, 11, 1, 0, 3, '145975867650139.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/zhegenvshengceshitananpengyou.mp4', 0, 0),
(80, '正妹信心滿滿地搭訕路邊男生，話才說完男生們的反应 ...', '<p>正妹信心滿滿地搭訕路邊男生，話才說完男生們的</p><p><br/></p>', 7, 1451752858, 0, 11, 1, 0, 3, '145966560662341.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/zhengmeixinxinmanmandedashanlubiandenansheng.mp4', 0, 0),
(101, NULL, NULL, NULL, NULL, 0, NULL, 1, 0, NULL, NULL, '', 0, 0),
(102, '韩国主播尹素婉【大深沟】暴露到自己都害羞', '<p>-</p>', 1, 1460477544, 1460477544, 12, 1, 0, 3, '146047754420278.jpg@', 'http://wansun-iblog.qiniudn.com/hanguozhubaoyinsuwandashenggou.mp4', 0, 0),
(81, '雖然聽不懂的語言 但那女主審 在扇動別人按 感覺真差 這事件告訴我們 事情不到最後都不知真相 做事也要有耐心?', '<p>雖然聽不懂的語言 但那女主審 在扇動別人按 感覺真差 這事件告訴我們 事情不到最後都不知真相 做事也要有耐心?</p><p></p>', 17, 1451750458, 0, 1, 1, 0, 3, '145966585422779.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/VietEnglishsubtitles.mp4', 0, 0),
(85, '3位太有才的大美女讓許多網友陷入瘋狂狀態了...Bohemian Carsody by SketchShe(波西米亞狂想曲) 中文字幕', '<p>--<br/></p>', 3, 1438713061, 0, 11, 1, 0, 3, '145977306152661.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/3ladysingsong.mp4', 0, 0),
(86, '经典歌曲 罗百吉 i miss you ', '<p>--<br/></p>', 20, 1457773413, 1460277859, 1, 1, 0, 3, '145977338758472.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/LUOBAIJIIMISSYOU.mp4', 1, 0),
(87, '鬥魚-美腿仙兒：「超管我錯了，我是被觀眾逼的...」', '<p>--</p>', 10, 1441779942, 0, 12, 1, 0, 3, '145977978580064.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/douyumeituixianer.mp4', 0, 0),
(88, 'Mina媚惑【搖臀】辣舞直播精華(熊貓本土一姐)', '<p>--</p>', 10, 1407770174, 0, 12, 1, 0, 3, '145977982381675.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/Mina-meihuoyaotun.mp4', 0, 0),
(89, '美腿女主播薇薇萌主-下衣失蹤【大方洩底】辣舞直播精華', '<p>--</p>', 16, 1459080548, 0, 12, 1, 0, 3, '145977986345751.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/weiweimengzhu.mp4', 0, 0),
(90, '小蘇菲-唱跳【江南皮革廠】瞬間發瘋！逗B', '<p>--</p>', 3, 1431024706, 0, 12, 1, 0, 3, '146012470686288.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/xiaosufeitiaochangjianglanpigetang.mp4', 0, 0),
(91, '斗鱼王瑞儿着衣爆乳【床上动作】这衣服会不会太紧？', '<p>--</p>', 5, 1457124872, 0, 12, 1, 0, 3, '146012487222564.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/douyuwangruierzhuoyibaoru.mp4', 0, 0),
(92, '熊猫女主播尹素婉 跳舞剪辑高清版', '<p>--</p>', 6, 1450101098, 1460277887, 12, 1, 0, 3, '146012509878296.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/xiongmaonvzhuboyinsuwanxiaowujianji.mp4', 1, 0),
(93, '熊貓-Mina【手指誘人】辣舞直播精華-160220', '<p>--</p>', 10, 1458125200, 0, 12, 1, 0, 3, '146012520077608.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/xiongmaominashouzhiyouren.mp4', 0, 0),
(94, '熊貓-Mina【光速抖臀】直播精華 曲線超誘人-160317', '<p>--</p>', 5, 1449133636, 0, 12, 1, 0, 3, '146013363617010.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/xiaomao-Minaguansudoutunquxianyouren.mp4', 0, 0),
(95, '韩国主播尹素婉(BJ??)【豪乳被纸条贴满】直播精华-160224', '<p>--</p>', 6, 1410133909, 0, 12, 1, 0, 3, '146013390974797.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/yinsuwanhaorubeizhitiaotieman.mp4', 0, 0),
(96, '熊貓好聲音-小蘇菲〈走在冷風中〉【顏值超高】原唱：劉思涵 【最後面有梗 】', '<p>--</p>', 3, 1433134003, 0, 12, 1, 0, 3, '146013400354856.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/xiongmao-xiaosufei-zouzailengfengzhong.mp4', 0, 0),
(97, '鬥魚-靜寶寶(靜靜)模仿【口X聲音】嬌喘手伸內衣', '<p>--</p>', 3, 1400134175, 0, 12, 1, 0, 3, '146013417588089.jpg@', 'http://7fvctr.com1.z0.glb.clouddn.com/douyu-jingbaobao-jiaochuanshenneiyi.mp4', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ws_comment`
--

CREATE TABLE IF NOT EXISTS `ws_comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '留言人姓名',
  `email` varchar(64) DEFAULT NULL COMMENT '留言人邮箱',
  `content` mediumtext COMMENT '留言内容',
  `blogid` int(5) NOT NULL COMMENT '关联博客id',
  `time` int(11) DEFAULT NULL COMMENT '留言时间',
  `ip` varchar(32) DEFAULT NULL COMMENT '留言人ip',
  `userid` int(5) DEFAULT NULL COMMENT '博主id',
  `isread` tinyint(1) DEFAULT '0' COMMENT '1已阅读 0未读',
  `pid` int(11) NOT NULL DEFAULT '0',
  `cuid` int(11) NOT NULL,
  `reply` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ws_comment`
--

INSERT INTO `ws_comment` (`id`, `name`, `email`, `content`, `blogid`, `time`, `ip`, `userid`, `isread`, `pid`, `cuid`, `reply`) VALUES
(5, NULL, NULL, 'aha ', 78, 1459752980, '119.80.200.2', NULL, 0, 0, -1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ws_icontact`
--

CREATE TABLE IF NOT EXISTS `ws_icontact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tourist` varchar(32) DEFAULT NULL COMMENT '游客姓名',
  `email` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `message` text COMMENT '游客对博主的留言',
  `time` int(11) DEFAULT NULL COMMENT '游客提交时间',
  `subject` text COMMENT '主题',
  `userid` int(5) DEFAULT NULL COMMENT '收信人',
  `isread` tinyint(1) DEFAULT '0' COMMENT '1已读 0未读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ws_image`
--

CREATE TABLE IF NOT EXISTS `ws_image` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `blogid` int(8) DEFAULT NULL COMMENT '博文id',
  `image` text COMMENT '图片连接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=108 ;

--
-- 转存表中的数据 `ws_image`
--

INSERT INTO `ws_image` (`id`, `blogid`, `image`) VALUES
(82, 59, '145096518274346.jpg'),
(81, 59, '145096516559513.jpg'),
(80, 59, '145096503765666.jpg'),
(36, 34, '144734576610521.jpg'),
(35, 34, '144734576519901.jpg'),
(102, 81, '145966585117128.jpg'),
(101, 80, '145966560242535.jpg'),
(100, 80, '145966396460404.jpg'),
(99, 80, '145966387051041.jpg'),
(98, 80, '145966384479904.jpg'),
(97, 80, '145966381781328.jpg'),
(96, 80, '145966379956787.jpg'),
(95, 79, '145966290788414.jpg'),
(94, 78, '145966282348838.jpg'),
(93, 77, '145966233576760.jpg'),
(92, 76, '145966212344345.jpg'),
(91, 75, '145966104232103.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `ws_label`
--

CREATE TABLE IF NOT EXISTS `ws_label` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL COMMENT '标签/栏目',
  `sort` int(5) DEFAULT NULL COMMENT '排顺序',
  `userid` int(5) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `ws_label`
--

INSERT INTO `ws_label` (`id`, `label`, `sort`, `userid`) VALUES
(1, '自定义', 1, 1),
(2, '潮流', 1, 2),
(3, 'ddd', NULL, 3),
(10, '浪荡', 2, 1),
(11, '搞笑精选', 8, 1),
(12, '宅男福利', 9, 1),
(17, '白富美', 10, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ws_menu`
--

CREATE TABLE IF NOT EXISTS `ws_menu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `pid` int(5) DEFAULT NULL COMMENT '父栏目id',
  `sort` int(5) DEFAULT NULL COMMENT '排序',
  `link` text COMMENT '链接地址',
  `position` tinyint(1) DEFAULT NULL COMMENT '栏目位置:1表示顶部 2表示尾部',
  `userid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `ws_menu`
--

INSERT INTO `ws_menu` (`id`, `name`, `pid`, `sort`, `link`, `position`, `userid`) VALUES
(1, '主页', 0, 1, '/index/m/who/1', 1, 1),
(2, '私信', 0, 2, '/index/contact/who/1', 1, 1),
(3, 'Hadoop', 0, 3, '#', 1, 1),
(4, 'MapReduce', 3, 1, '/index/t/uid/1/id/5', 1, 1),
(5, 'Hive', 3, 2, '/index/t/uid/1/id/6', 1, 1),
(6, 'Storm', 3, 3, '/index/t/uid/1/id/7', 1, 1),
(7, '音乐', 0, 4, '/index/music/who/1', 1, 1),
(8, '视频', 0, 5, '#', 1, 1),
(9, '我的音乐6', 0, 6, '#', 1, 1),
(10, '版权所有 zhuwanxiong copyright 2014 - 2015 技术支持：360站长.七牛云存储.阳光互联', 0, 1, '#', 2, 1),
(11, '野糖', 0, 2, 'http://www.yetang.com/', 2, 1),
(12, '观潮', 0, 3, 'http://www.fashiontrenddigest.com/', 2, 1),
(13, '堆糖', 0, 4, 'http://www.duitang.com/', 2, 1),
(14, 'KpopStarz', 0, 5, 'http://chinese.kpopstarz.com/', 2, 1),
(15, '助手', 0, 6, '/admin/admin/index', 2, 1),
(16, '主页', 0, 1, '/we/index/m/who/2', 1, 2),
(17, '私信给我', 0, 2, '/we/index/contact/uid/2', 1, 2),
(18, '自定义3', 0, 3, '#', 1, 2),
(19, '下拉菜单1', 18, 1, '#', 1, 2),
(20, '下拉菜单2', 18, 2, '#', 1, 2),
(21, '下拉菜单3', 18, 3, '#', 1, 2),
(22, '我的音乐4', 0, 4, '/we/index/music/who/2', 1, 2),
(23, '视频播客5', 0, 5, '#', 1, 2),
(24, '自定义6', 0, 6, '#', 1, 2),
(25, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 2),
(26, '自定义2', 0, 2, '#', 2, 2),
(27, '自定义3', 0, 3, '#', 2, 2),
(28, '自定义4', 0, 4, '#', 2, 2),
(29, '自定义5', 0, 5, '#', 2, 2),
(30, '管理助手', 0, 6, '/we/admin/admin/index', 2, 2),
(31, '主页', 0, 1, '/we/index/m/who/3', 1, 3),
(32, '私信给我', 0, 2, '/we/index/contact/who/3', 1, 3),
(33, '自定义3', 0, 3, '#', 1, 3),
(34, '下拉菜单1', 33, 1, '#', 1, 3),
(35, '下拉菜单2', 33, 2, '#', 1, 3),
(36, '下拉菜单3', 33, 3, '#', 1, 3),
(37, '我的音乐', 0, 4, '/we/index/music/who/3', 1, 3),
(38, '视频播客5', 0, 5, '#', 1, 3),
(39, '自定义6', 0, 6, '#', 1, 3),
(40, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 3),
(41, '自定义2', 0, 2, '#', 2, 3),
(42, '自定义3', 0, 3, '#', 2, 3),
(43, '自定义4', 0, 4, '#', 2, 3),
(44, '自定义5', 0, 5, '#', 2, 3),
(45, '管理助手', 0, 6, '/we/admin/admin/index', 2, 3),
(46, 'Spark', 3, 5, '/index/t/uid/1/id/8', 1, 1),
(47, 'HDFS', 3, 4, '/index/t/uid/1/id/9', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ws_mv`
--

CREATE TABLE IF NOT EXISTS `ws_mv` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `mv` varchar(255) DEFAULT NULL COMMENT 'mv地址',
  `userid` int(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '视频名称',
  `sort` int(5) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `ws_mv`
--

INSERT INTO `ws_mv` (`id`, `mv`, `userid`, `name`, `sort`) VALUES
(7, 'hanguozhubaoyinsuwandashenggou.mp4', 1, 'hanguozhubaoyinsuwandashenggou.mp4', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ws_photo`
--

CREATE TABLE IF NOT EXISTS `ws_photo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `userid` int(5) DEFAULT NULL COMMENT '用户相册',
  `time` int(11) DEFAULT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ws_photo`
--

INSERT INTO `ws_photo` (`id`, `picture`, `userid`, `time`) VALUES
(7, '144694573266260.jpg', 3, 1446945732),
(8, '144694574075023.jpg', 3, 1446945740),
(9, '144741470875249.jpg', 1, 1447414708);

-- --------------------------------------------------------

--
-- 表的结构 `ws_song`
--

CREATE TABLE IF NOT EXISTS `ws_song` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `song` varchar(255) DEFAULT NULL COMMENT '歌曲地址',
  `userid` int(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '歌曲名称',
  `sort` int(5) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ws_song`
--

INSERT INTO `ws_song` (`id`, `song`, `userid`, `name`, `sort`) VALUES
(1, '01 - Pussy Sweet.mp3', 1, '01 - Pussy Sweet.mp3', 2),
(2, '01 - i just wanna feel ya.mp3', 1, 'i just wanna feel ya.mp3', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ws_user`
--

CREATE TABLE IF NOT EXISTS `ws_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL COMMENT '登陆名/规定用email注册',
  `truename` varchar(64) DEFAULT NULL COMMENT '真实姓名',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `password` varchar(64) DEFAULT NULL COMMENT '密码',
  `logintime` datetime DEFAULT NULL COMMENT '登陆时间',
  `lastlogintime` datetime DEFAULT NULL COMMENT '最后一次登陆时间',
  `loginip` varchar(32) DEFAULT NULL COMMENT '登陆ip',
  `lastloginip` varchar(32) DEFAULT NULL COMMENT '最后一次登陆ip',
  `phone` varchar(32) DEFAULT NULL COMMENT '电话号码',
  `qq` varchar(32) DEFAULT NULL COMMENT '腾讯qq',
  `headpicture` varchar(255) DEFAULT NULL COMMENT '头像',
  `introduce` text COMMENT '个人简介',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ws_user`
--

INSERT INTO `ws_user` (`id`, `username`, `truename`, `nickname`, `password`, `logintime`, `lastlogintime`, `loginip`, `lastloginip`, `phone`, `qq`, `headpicture`, `introduce`) VALUES
(1, 'zhuwanxiong', '', '', '88972221a275b4e099009f75d6fb1ee9', NULL, NULL, NULL, NULL, '', '', '144621352340244.jpg', '');

-- --------------------------------------------------------

--
-- 表的结构 `ws_webconfig`
--

CREATE TABLE IF NOT EXISTS `ws_webconfig` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `userid` int(5) NOT NULL,
  `copyright` mediumtext COMMENT '版权信息',
  `icon` varchar(255) DEFAULT NULL COMMENT '网站标徽',
  `title` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `seo` mediumtext COMMENT '网站seo',
  `iaccess` tinyint(4) NOT NULL DEFAULT '0',
  `titlecolor` mediumtext NOT NULL,
  `contentcolor` text NOT NULL,
  `background` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ws_webconfig`
--

INSERT INTO `ws_webconfig` (`id`, `userid`, `copyright`, `icon`, `title`, `seo`, `iaccess`, `titlecolor`, `contentcolor`, `background`) VALUES
(1, 1, 'copyright 2016', 'http://wansun-iblog.qiniudn.com/145106274454123.jpg', '恩施逗趣娱乐出品', '恩施逗趣娱乐 精选搞笑视频、内涵段子 宅男宅女福利', 0, '#000000', '#000000', '11'),
(2, 2, NULL, NULL, NULL, NULL, 0, '', '', ''),
(3, 3, NULL, NULL, NULL, NULL, 0, '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
