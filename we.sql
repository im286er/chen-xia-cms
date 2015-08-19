-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 06 月 14 日 02:20
-- 服务器版本: 5.00.15
-- PHP 版本: 5.2.4

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
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(255) default NULL COMMENT '标题',
  `content` longtext COMMENT '博客内容',
  `view` bigint(20) default NULL COMMENT '浏览量',
  `time` int(11) default NULL COMMENT '发布博文时间',
  `labelid` int(5) default NULL COMMENT '栏目/标签id',
  `userid` int(5) default NULL COMMENT '用户id',
  `message` int(5) default '0' COMMENT '留言总数',
  `type` tinyint(1) default NULL COMMENT '文章类型 1表示热门 2表示普通',
  `image` mediumtext COMMENT '缩略图 以@拼接',
  `readaccess` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=100 ;

--
-- 转存表中的数据 `ws_blog`
--

INSERT INTO `ws_blog` (`id`, `title`, `content`, `view`, `time`, `labelid`, `userid`, `message`, `type`, `image`, `readaccess`) VALUES
(15, '测试用户', '<p><img src="http://wansun-iblog.qiniudn.com/140340646120346.jpg?imageMogr2/thumbnail/540x335!" title="256579.jpg"/></p>', 17, 1403406473, 22, 3, 0, 1, '140340647327343.jpg@140340647338611.jpg@140340647355277.jpg@140340647396309.jpg@140340647528769.jpg@140340647560259.jpg@140340647598435.jpg@140340647530926.jpg@', 0),
(16, NULL, NULL, 1, 1403523553, NULL, 1, 0, NULL, NULL, 0),
(93, '为了凑点儿版面  发几版图  嘿嘿喝嘿', '<p><img src="http://wansun-iblog.qiniudn.com/143421473370493.jpg" title="f2d4cf2117cadea140060dbbf8bbf700.jpg"/></p>', 2, 1434214746, 2, 1, 0, 1, '143421474669090.jpg@', 0),
(92, '博客全新改装  第一条博文  乐呵乐呵 ^-^   期待以后还会做更好的体验', '<p><img src="http://wansun-iblog.qiniudn.com/143421462663829.jpg" title="20150608010640_M2wKm.jpeg"/></p>', 3, 1434214632, 3, 1, 0, 1, '143421463223224.jpg@', 0),
(94, '毕业咯   正式毕业咯  坐等毕业证   有些怀恋的吧  天下无不散的宴席  且行且珍惜  小伙伴们 ', '<p><img src="http://wansun-iblog.qiniudn.com/143421535599895.jpg" title="MA201505190829060019-01-027352000.jpg" style="width: 899px; height: 619px;"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421827710557.jpg" style="float:none;" title="毕业01.jpg"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421827953242.jpg" style="float: none; width: 899px; height: 519px;" title="QQ图片20150614020037.jpg"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421828074568.jpg" style="float: none; width: 899px; height: 519px;" title="QQ图片20150614020041.jpg"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421828354482.jpg" style="float:none;" title="20150608010640_M2wKm.jpeg"/></p><p><br/></p>', 4, 1434218329, 2, 1, 0, 1, '143421536958955.jpg@', 0),
(95, '其实说分不开的也不见得 其实感情最怕的就是拖着 越演到重场戏越哭不出了 是否还值得  ----薛之谦的“演员”', '<p style="text-align: center;"><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 16px;"><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">演员</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">作词：薛之谦</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">作曲：薛之谦</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">演唱：薛之谦</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">简单点说话的方式简单点</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">递进的情绪请省略</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">你又不是个演员</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">别设计那些情节</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">没意见我只想看看你怎么圆</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">你难过的太表面 像没天赋的演员</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">观众一眼能看见</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">该配合你演出的我演视而不见</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">在逼一个最爱你的人即兴表演</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">什么时候我们开始收起了底线</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">顺应时代的改变看那些拙劣的表演</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">可你曾经那么爱我干嘛演出细节</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">我该变成什么样子才能延缓厌倦</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">原来当爱放下防备后的这些那些</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">才是考验</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">没意见你想怎样我都随便</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">你演技也有限</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">又不用说感言</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">分开就平淡些</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">该配合你演出的我演视而不见</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">别逼一个最爱你的人即兴表演</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">什么时候我们开始没有了底线</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">顺着别人的谎言被动就不显得可怜</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">可你曾经那么爱我干嘛演出细节</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">我该变成什么样子才能配合出演</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">原来当爱放下防备后的这些那些</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">都有个期限</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">其实台下的观众就我一个</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">其实我也看出你有点不舍</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">场景也习惯我们来回拉扯</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">还计较着什么</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">其实说分不开的也不见得</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">其实感情最怕的就是拖着</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">越演到重场戏越哭不出了</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">是否还值得</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">该配合你演出的我尽力在表演</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">像情感节目里的嘉宾任人挑选</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">如果还能看出我有爱你的那面</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">请剪掉那些情节让我看上去体面</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">可你曾经那么爱我干嘛演出细节</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">不在意的样子是我最后的表演</span><br style="color: rgb(51, 51, 51); font-family: arial; font-size: 13.333333969116211px; line-height: 22.22222328186035px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(51, 51, 51); line-height: 22.22222328186035px; text-align: center; background-color: rgb(255, 255, 255);">是因为爱你我才选择表演 这种成全</span></span></p>', 1, 1434215705, 1, 1, 0, 1, '143421570537032.jpg@', 0),
(96, '2015年部分毕业照  一般人不给看  要看请注册用户  并且给钱   嘿嘿HEI 嘿 ', '<p><img src="http://wansun-iblog.qiniudn.com/143421606986790.jpg" style="float:none;" title="00221917eae81154d85514.png"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421607227978.jpg" style="float:none;" title="00221917eae81154d85515.png"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421607633030.jpg" style="float:none;" title="00221917eae81154d85617.png"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421608032351.jpg" style="float:none;" title="00221917eae81154d85616.png"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421608639416.jpg" style="float:none;" title="00221917eae81154d8de19.png"/></p><p><img src="http://wansun-iblog.qiniudn.com/143421609089081.jpg" style="float:none;" title="00221917eae81154d8de18.png"/></p><p><br/></p>', 2, 1434216107, 34, 1, 0, 1, '143421610767678.jpg@', 1),
(23, 'Java 的入门Demo  helloWorld.java', '<p>//helloWorld</p><p>class HelloWorld{</p><p>&nbsp;&nbsp;&nbsp;&nbsp;public static void main(){<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System.out.println(&quot;Hello World!&quot;);<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;}</p><p>}</p>', 10, 1406878874, 25, 7, 0, 1, 'http://wansun-iblog.qiniudn.com/140687887451890.jpg@', 0),
(45, '嘻嘻哈哈哈哈嘻嘻呵呵嘻嘻', '<p>一位创作型的时尚<a target="_blank" href="http://baike.baidu.com/view/8294187.htm">音乐女孩</a>，生于四川成都，毕业于四川省音乐学院<a target="_blank" href="http://baike.baidu.com/view/5104.htm">声乐</a>系曾担任四川音乐学院声乐系老师.</p><p>感谢上帝赐给了她一张美丽的脸，赐予了她独特磁墟履嗓音——功底扎实，高音很完美；有几分性感沙哑，却又近呼透明般纯净。她，拥有如此让人羡慕的容貌和完美的声音，她，拥有与生俱来的音乐创作天赋，使得她用对音乐有着独特地见解、丰富的情感。这些出众的特点，<a target="_blank" href="http://baike.baidu.com/view/8713178.htm">发自内心</a>的演唱更赋予了自己独特的音乐栽灵魂。</p><p>是的，好的音乐，不仅要打动耳朵，更应触及灵魂；好的音乐，是情感的交谨，也是心零棠相通。K-BO就这样把音乐的灵魂唱进了我们心里。</p><p>平常不说话的时候，她看上去冷酷而孤傲；但一说起话的时候，却那么的亲切平易近人。她不笑的时候，看上去性感颓废；一笑起来，却像小孩子般纯洁温暖。不唱歌的时候，她内敛，以至有几分害羞；可唱起歌来，是那么的开放，让所有人的视线全部投射在她身上，好像全世界都属于她。</p><p>1998年她正式接触HipHop文化，并开始尝试R&amp;B曲风音乐创作，长期活跃再国内HipHop圈子内，再获得数个全国歌唱最高奖项后。</p><p>2006年担任中华环境保护基金会绿色环保大使，随即边在本地音乐学院担任声乐讲师，一边开始参与TOM全国巡演等各种大型演出，期间积累了宝贵的舞台经验，更使得她之后的演艺之路上更加的坦荡无阻。</p><p>K-bo的成名绝非偶然，十年的音乐积累铸造了其深厚的音乐功底和八面玲珑的人际关系， 长期与圈内好友如天王星、<a target="_blank" href="http://baike.baidu.com/view/1349269.htm">讲者</a>、\r\nEB、No \r\nFear、凤凰鸣等著名团体或个人保持合作，数年来始终坚持自己的信仰和对音乐的态度。2000年K-bo被邀请开始穿梭于国内各大城市的HipHop \r\nParty担任表演嘉宾，其创作的歌曲数次被国内知名唱片公司盗用，这场版权案在当时引起了广泛关注，同时也警惕了K-bo提高版权意识，随后台湾艺人<a target="_blank" href="http://baike.baidu.com/view/14925.htm">杨丞琳</a>私人购买了她的多首原创歌曲，期间接受了无数大小媒体的采访报道，但K-bo并没有沉醉于闪光灯之下，她清楚，她要的<a target="_blank" href="http://baike.baidu.com/view/982725.htm">是什么</a>。</p><p>K-bo踏实低调的努力，真诚热情的结交朋友，奠定了她今时今日在国内HipHop界不可动摇的大姐地位，爱憎分明，霸气豪爽，成熟老练的她，有时却也常表现出小女孩的一面，在国内取得再高的成绩，K-bo也不会变，“做人不能忘本。”是K-bo经常挂在嘴边的一句话。</p><p><br/></p>', 1, 1412334300, 29, 15, 0, 1, '141233430055375.jpg@', 0),
(81, '￥95.00  苏盈珈可蕾丝衫雪纺衫女2015春装新款修身开衫长袖领镂空花纹图案打底衫 ', '<h2 id="item_name" style="white-space: normal; margin: 0px; padding: 12px 17px; font-weight: normal; list-style: none; font-size: 15px; word-break: break-all; color: rgb(69, 69, 68); font-family: Arial, &#39;Microsoft YaHei&#39;; line-height: 22px;"><span style="color: rgb(217, 50, 41); font-size: 20px;">￥95.00</span>&nbsp;<a href="http://weidian.com/item.html?itemID=1139214702&p=11" target="_blank" textvalue="点我看看">点我看看</a></h2><h2 id="item_name" style="margin: 0px; padding: 12px 17px; font-weight: normal; list-style: none; font-size: 15px; word-break: break-all; color: rgb(69, 69, 68); font-family: Arial, &#39;Microsoft YaHei&#39;; line-height: 22px; white-space: normal;"><img src="http://wansun-iblog.qiniudn.com/142693895523649.jpg" style="width: 131px; height: 129px;" title="QQ图片20150321195642.jpg"/></h2><h2 id="item_name" style="margin: 0px; padding: 12px 17px; font-weight: normal; list-style: none; font-size: 15px; word-break: break-all; color: rgb(69, 69, 68); font-family: Arial, &#39;Microsoft YaHei&#39;; line-height: 22px; white-space: normal;">宝贝包邮发圆通快递，圆通不到地址可备注发邮政小包。注意：衣服的尺寸为人工测量，过程中难免会产生1-3厘米的误差！此为正常现象，不能接受误差的MM请慎重购买哦。本店的宝贝可以7天无理由退换货，已开通担保交易，亲们请放心选购哦。</h2><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none;">&nbsp;<img src="http://wansun-iblog.qiniudn.com/142693826134774.jpg" style="float: left;" title="vshop235917559-437223742631422761494-822950.jpg"/><img src="http://wansun-iblog.qiniudn.com/142693826833796.jpg" style="" title="vshop162916052-1423276181283-3614715.jpg"/></p><p style="text-align: center"><img src="http://wansun-iblog.qiniudn.com/142693827529919.jpg" style="float: left;" title="vshop162916052-1423276184878-6735672.jpg"/><img src="http://wansun-iblog.qiniudn.com/142693827984887.jpg" style="float: left;" title="vshop162916052-142327617815-1463464.jpg"/><img src="http://wansun-iblog.qiniudn.com/142693828343014.jpg" title="vshop162916052-1423276171648-1226219.jpg" style="float: left;"/></p><p style="text-align: center"><br/></p><p><br/></p>', 54, 1429957304, 32, 19, 0, 1, '142693848130363.jpg@142693848121899.jpg@142693848113580.jpg@142693848114115.jpg@', 0),
(82, '￥156.00   2015春季新品 机车水洗PU皮夹克女外套 女士短款修身正品小皮衣潮', '<h2 style="PADDING-BOTTOM: 12px; TEXT-TRANSFORM: none; LIST-STYLE-TYPE: none; TEXT-INDENT: 0px; MARGIN: 0px; PADDING-LEFT: 17px; LETTER-SPACING: normal; PADDING-RIGHT: 17px; FONT: 15px/22px Arial, &#39;Microsoft YaHei&#39;; WHITE-SPACE: normal; COLOR: rgb(69,69,68); WORD-BREAK: break-all; WORD-SPACING: 0px; PADDING-TOP: 12px; -webkit-text-stroke-width: 0px" id="item_name"><span style="PADDING-BOTTOM: 0px; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); LIST-STYLE-TYPE: none; TEXT-INDENT: 0px; MARGIN: 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; TEXT-OVERFLOW: ellipsis; PADDING-RIGHT: 0px; DISPLAY: inline-block; FONT: 20px/20px Arial, &#39;Microsoft YaHei&#39;; MAX-WIDTH: 100%; COLOR: rgb(217,50,41); OVERFLOW: visible; WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px" id="item_price" class="i_pri">￥156.00</span><span style="TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; LETTER-SPACING: normal; DISPLAY: inline !important; FONT: 14px/20px Arial, &#39;Microsoft YaHei&#39;; FLOAT: none; COLOR: rgb(50,50,50); WORD-SPACING: 0px; -webkit-text-stroke-width: 0px"><span class="Apple-converted-space">&nbsp;&nbsp; </span></span><a href="http://weidian.com/item.html?itemID=1139176636&p=13" target="_blank">点我看看<br/></a>镇店之宝，2015春季新款，时尚而简约，细节处彰显甜美韩范，范冰冰 杨幂也喜欢哦。皮衣超乎意料的好，软软的，低调的光泽，穿起来很有感觉，皮子摸起来挺滑的，拥有它你就是明星！</h2><p><img src="http://wansun-iblog.qiniudn.com/142693895523649.jpg" width="210" height="210"/></p><p><img src="http://wd.geilicdn.com/vshop257056940-1423195729742-4734584.jpg" width="750" height="750"/></p><p><img src="http://wd.geilicdn.com/vshop257056940-1423195743620-6888506.jpg" width="750" height="5870"/></p><p><img src="http://wd.geilicdn.com/vshop257056940-1423195748410-4625214.jpg" width="750" height="1830"/></p><p><img src="http://wd.geilicdn.com/vshop257056940-1423195751123-8006244.jpg" width="750" height="557"/></p><p><img src="http://wd.geilicdn.com/vshop257056940-1426390052625-4224217.jpg" width="700" height="3593"/></p><p><img src="http://wd.geilicdn.com/vshop257056940-1426418543719-8051050.jpg" width="750" height="5498"/></p><p><br/></p>', 55, 1429957230, 32, 19, 2, 1, 'http://wansun-iblog.qiniudn.com/142694437654275.jpg@http://wansun-iblog.qiniudn.com/142694437682576.jpg@http://wansun-iblog.qiniudn.com/142694437758069.jpg@http://wansun-iblog.qiniudn.com/142694437740790.jpg@', 0),
(99, '此时此刻  哈哈   搞的有点正式了哈  我宣布  “放逐阳光”网站下的新域名return1.cn正式开通  以前walksun.cn暂不注销  ', '<p><img src="http://wansun-iblog.qiniudn.com/143421789319079.jpg" title="286741.jpg"/></p>', 2, 1434217900, 11, 1, 0, 1, '143421790012434.jpg@', 0),
(83, NULL, NULL, NULL, 1426941973, NULL, 19, 0, NULL, NULL, 0),
(98, '大功告成  花了两三天时间  对博客展示面改写成瀑布流的方式  默默的为自己点个赞吧  毕竟这个点儿了还在调试  哈哈哈', '<p><br/></p><p style="text-align: center;"><span style="font-size: 36px; font-family: 楷体, 楷体_GB2312, SimKai;">其实<span style="font-family: 楷体, 楷体_GB2312, SimKai; font-size: 36px; text-align: center;">做事</span>也需要有 “Trouble Maker” 精神，也像老周说的“Think Different ”</span></p><p><img src="http://wansun-iblog.qiniudn.com/143421924881778.jpg" title="2290-130604145I5.jpg"/><br/></p>', 0, 1434219276, 2, 1, 0, 1, 'http://wansun-iblog.qiniudn.com/143421927690646.jpg@', 0),
(84, NULL, NULL, NULL, 1426988482, NULL, 19, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ws_comment`
--

CREATE TABLE IF NOT EXISTS `ws_comment` (
  `id` int(5) NOT NULL auto_increment,
  `content` text COMMENT '留言内容',
  `blogid` int(5) NOT NULL COMMENT '关联博客id',
  `time` int(11) default NULL COMMENT '留言时间',
  `ip` varchar(32) default NULL COMMENT '留言人ip',
  `cuid` int(5) default NULL COMMENT '评论用户id',
  `pid` int(5) default '0' COMMENT '父评论id',
  `reply` tinyint(1) default '0' COMMENT '回复状态 0未回复 1已回复',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=346 ;

--
-- 转存表中的数据 `ws_comment`
--

INSERT INTO `ws_comment` (`id`, `content`, `blogid`, `time`, `ip`, `cuid`, `pid`, `reply`) VALUES
(323, '我的博客，牛逼，牛逼，最牛逼，，，', 82, 1429440255, '119.100.140.27', -1, 0, 0),
(324, '时尚，时尚，最时尚，，，，，', 82, 1429440315, '119.100.140.27', -1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ws_icontact`
--

CREATE TABLE IF NOT EXISTS `ws_icontact` (
  `id` int(5) NOT NULL auto_increment,
  `tourist` varchar(32) default NULL COMMENT '游客姓名',
  `email` varchar(32) default NULL,
  `qq` varchar(32) default NULL,
  `message` text COMMENT '游客对博主的留言',
  `time` int(11) default NULL COMMENT '游客提交时间',
  `subject` text COMMENT '主题',
  `userid` int(5) default NULL COMMENT '收信人',
  `isread` tinyint(1) default '0' COMMENT '1已读 0未读',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=77 ;

--
-- 转存表中的数据 `ws_icontact`
--

INSERT INTO `ws_icontact` (`id`, `tourist`, `email`, `qq`, `message`, `time`, `subject`, `userid`, `isread`) VALUES
(1, 'xxx', 'xxx@163.com', NULL, 'test', 1404379988, 'test', 3, 0),
(76, 'zhuwanxiong', 'zhuwanxiong@sina.com', NULL, '技术交流', 1421420491, 'Q&A', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ws_image`
--

CREATE TABLE IF NOT EXISTS `ws_image` (
  `id` int(8) NOT NULL auto_increment,
  `blogid` int(8) default NULL COMMENT '博文id',
  `image` text COMMENT '图片连接',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=397 ;

--
-- 转存表中的数据 `ws_image`
--

INSERT INTO `ws_image` (`id`, `blogid`, `image`) VALUES
(367, 94, '143421521584066.jpg'),
(51, 12, '140318172177612.jpg'),
(50, 12, '140318171783428.jpg'),
(49, 12, '140318171245558.jpg'),
(48, 12, '140318170838242.jpg'),
(37, 11, '140318111276297.jpg'),
(36, 11, '140318096547182.jpg'),
(35, 11, '140318096122980.jpg'),
(34, 11, '140318095648045.jpg'),
(33, 11, '140318095267718.jpg'),
(32, 11, '140318094856093.jpg'),
(31, 11, '140318094385358.jpg'),
(30, 11, '140318093859143.jpg'),
(29, 11, '140318093174578.jpg'),
(366, 94, '143421521372521.jpg'),
(365, 94, '143421521017992.jpg'),
(363, 92, '143421462663829.jpg'),
(364, 93, '143421473370493.jpg'),
(361, 31, '143421428293408.jpg'),
(47, 12, '140318170490106.jpg'),
(46, 12, '140318167880180.jpg'),
(45, 12, '140318166868312.jpg'),
(52, 12, '140318172596718.jpg'),
(396, 98, '143421924881778.jpg'),
(395, 94, '143421828354482.jpg'),
(394, 94, '143421828074568.jpg'),
(115, 15, '140340646120346.jpg'),
(116, 16, '140352355387996.jpg'),
(393, 94, '143421827953242.jpg'),
(392, 94, '143421827710557.jpg'),
(391, 99, '143421789319079.jpg'),
(390, 98, '143421710495280.jpg'),
(383, 96, '143421609089081.jpg'),
(382, 96, '143421608639416.jpg'),
(381, 96, '143421608032351.jpg'),
(380, 96, '143421607633030.jpg'),
(379, 96, '143421607227978.jpg'),
(378, 96, '143421606986790.jpg'),
(377, 94, '143421535599895.jpg'),
(376, 94, '143421524531918.jpg'),
(375, 94, '143421524440961.jpg'),
(374, 94, '143421524257087.jpg'),
(373, 94, '143421523969367.jpg'),
(372, 94, '143421523733801.jpg'),
(371, 94, '143421522516436.jpg'),
(370, 94, '143421522277549.jpg'),
(369, 94, '143421522073929.jpg'),
(368, 94, '143421521797742.jpg'),
(279, 81, '142693861420182.jpg'),
(278, 81, '142693861338160.jpg'),
(277, 81, '142693861347064.jpg'),
(276, 81, '142693861230489.jpg'),
(275, 81, '142693861221029.jpg'),
(274, 81, '142693829539137.jpg'),
(273, 81, '142693828343014.jpg'),
(272, 81, '142693827984887.jpg'),
(271, 81, '142693827529919.jpg'),
(270, 81, '142693826833796.jpg'),
(269, 81, '142693826134774.jpg'),
(280, 81, '142693895523649.jpg'),
(281, 82, '142693962763049.jpg'),
(282, 82, '142693965226005.jpg'),
(283, 82, '142693971821738.jpg'),
(284, 82, '142693972092373.jpg'),
(285, 82, '142693990745207.jpg'),
(286, 82, '142693991082366.jpg'),
(287, 82, '142693991138688.jpg'),
(288, 82, '142693991151644.jpg'),
(289, 82, '142693991250760.jpg'),
(290, 82, '142693991288099.jpg'),
(291, 82, '142693991383324.jpg'),
(292, 82, '142693999621195.jpg'),
(293, 82, '142693999683274.jpg'),
(294, 82, '142693999781579.jpg'),
(295, 82, '142693999733735.jpg'),
(296, 82, '142693999890409.jpg'),
(297, 82, '142693999848272.jpg'),
(298, 82, '142693999871910.jpg'),
(299, 82, '142694006229737.jpg'),
(300, 82, '142694006660326.jpg'),
(301, 82, '142694006733489.jpg'),
(302, 82, '142694006840419.jpg'),
(303, 82, '142694007128999.jpg'),
(304, 82, '142694007260882.jpg'),
(305, 82, '142694007454924.jpg'),
(306, 82, '142694008530837.jpg'),
(307, 82, '142694008540214.jpg'),
(308, 82, '142694008666678.jpg'),
(309, 82, '142694008670320.jpg'),
(310, 82, '142694009066710.jpg'),
(311, 82, '142694009042079.jpg'),
(312, 82, '142694009137685.jpg'),
(313, 82, '142694023785437.jpg'),
(314, 82, '142694028338327.jpg'),
(315, 82, '142694028462667.jpg'),
(316, 82, '142694028549267.jpg'),
(317, 82, '142694028612616.jpg'),
(318, 82, '142694028725157.jpg'),
(319, 82, '142694028861390.jpg'),
(320, 82, '142694028829207.jpg'),
(321, 82, '142694029037494.jpg'),
(322, 82, '142694030884473.jpg'),
(323, 82, '142694031050341.jpg'),
(324, 82, '142694031018567.jpg'),
(325, 82, '142694031137015.jpg'),
(326, 82, '142694031132757.jpg'),
(327, 82, '142694031259931.jpg'),
(328, 82, '142694031317544.jpg'),
(329, 82, '142694031358124.jpg'),
(330, 82, '142694031484756.jpg'),
(331, 82, '142694190532372.jpg'),
(332, 82, '142694190511867.jpg'),
(333, 82, '142694191555865.jpg'),
(334, 82, '142694191661983.jpg'),
(335, 82, '142694191986840.jpg'),
(336, 82, '142694192144143.jpg'),
(337, 82, '142694192287632.jpg'),
(338, 83, '142694197391452.jpg'),
(339, 82, '142694200269910.jpg'),
(340, 84, '142698848223611.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `ws_label`
--

CREATE TABLE IF NOT EXISTS `ws_label` (
  `id` int(5) NOT NULL auto_increment,
  `label` varchar(255) NOT NULL COMMENT '标签/栏目',
  `sort` int(5) default NULL COMMENT '排顺序',
  `userid` int(5) default NULL COMMENT '用户id',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `ws_label`
--

INSERT INTO `ws_label` (`id`, `label`, `sort`, `userid`) VALUES
(1, '情感', 1, 1),
(2, '生活', 2, 1),
(3, 'PHP', 3, 1),
(4, 'C', 16, 1),
(5, 'C++', 5, 1),
(6, 'Jquery', 6, 1),
(7, 'Linux', 11, 1),
(8, 'Ajax', 8, 1),
(9, '数据结构', 9, 1),
(10, 'LAMP', 10, 1),
(11, 'WEB架构', 7, 1),
(12, '数据库', 12, 1),
(13, '项目实战', 13, 1),
(14, '娱乐', 14, 1),
(15, '潮流', 15, 1),
(16, '网页前端', 4, 1),
(17, 'ZendFramework', 17, 1),
(18, 'Javascript', 18, 1),
(19, '求职', 19, 1),
(20, '生活', 1, 3),
(21, '娱乐', 2, 3),
(22, '学习', 3, 3),
(23, 'Java', 20, 1),
(24, 'Hadoop', 21, 1),
(28, 'Android', 22, 1),
(29, '文艺', 1, 15),
(31, '明星', 1, 19),
(32, '商品', 2, 19),
(34, '毕业', 23, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ws_menu`
--

CREATE TABLE IF NOT EXISTS `ws_menu` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(255) default NULL COMMENT '栏目名称',
  `pid` int(5) default NULL COMMENT '父栏目id',
  `sort` int(5) default NULL COMMENT '排序',
  `link` text COMMENT '链接地址',
  `position` tinyint(1) default NULL COMMENT '栏目位置:1表示顶部 2表示尾部',
  `userid` int(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=437 ;

--
-- 转存表中的数据 `ws_menu`
--

INSERT INTO `ws_menu` (`id`, `name`, `pid`, `sort`, `link`, `position`, `userid`) VALUES
(1, '主页', 0, 1, '/we/index/m/who/1', 1, 1),
(2, '我的履历', 0, 2, 'http://www.walksun.cn/we/iresume/i.html', 1, 1),
(3, '原创作品', 0, 3, '#', 1, 1),
(4, '我的项目', 3, 1, 'http://www.walksun.cn/we/iresume/index.html', 1, 1),
(5, '项目详情', 3, 2, 'http://www.walksun.cn/index/c/who/1/id/14', 1, 1),
(7, '留言给我', 0, 4, '/we/index/contact/uid/1', 1, 1),
(8, '视频播客', 0, 5, '#', 1, 1),
(9, '我的音乐', 0, 6, '#', 1, 1),
(10, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 1),
(11, '观潮网', 0, 2, 'http://www.fashiontrenddigest.com/', 2, 1),
(12, '野糖网', 0, 3, 'http://www.yetang.com/', 2, 1),
(13, '潮人公社', 0, 4, 'http://www.chao-cn.com/', 2, 1),
(14, '微博客', 0, 5, 'http://www.walksun.cn', 2, 1),
(15, '管理助手', 0, 6, '/we/admin/admin/index', 2, 1),
(16, '主页', 0, 1, '/iblog/index/my/uid/2', 1, 2),
(17, '自定义2', 0, 2, '#', 1, 2),
(18, '自定义3', 0, 3, '#', 1, 2),
(19, '下拉菜单1', 18, 1, '#', 1, 2),
(20, '下拉菜单2', 18, 2, '#', 1, 2),
(21, '下拉菜单3', 18, 3, '#', 1, 2),
(22, '@我吧', 0, 4, '/iblog/index/contact/uid/2', 1, 2),
(23, '视频播客5', 0, 5, '#', 1, 2),
(24, '我的音乐6', 0, 6, '#', 1, 2),
(25, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 2),
(26, '自定义2', 0, 2, '#', 2, 2),
(27, '自定义3', 0, 3, '#', 2, 2),
(28, '自定义4', 0, 4, '#', 2, 2),
(29, '自定义5', 0, 5, '#', 2, 2),
(30, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 2),
(31, '主页', 0, 1, '/iretblosdfdfg/index/my/uid/3', 1, 3),
(32, '自定义2', 0, 2, '#', 1, 3),
(33, '自定义3', 0, 3, '#', 1, 3),
(34, '下拉菜单1', 33, 1, '#', 1, 3),
(35, '下拉菜单2', 33, 2, '#', 1, 3),
(36, '下拉菜单3', 33, 3, '#', 1, 3),
(37, '@我吧', 0, 4, '/iblog/index/contact/uid/3', 1, 3),
(38, '视频播客5', 0, 5, '#', 1, 3),
(39, '我的音乐6', 0, 6, '#', 1, 3),
(40, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 3),
(41, '自定义2', 0, 2, '#', 2, 3),
(42, '自定义3', 0, 3, '#', 2, 3),
(43, '自定义4', 0, 4, '#', 2, 3),
(44, '自定义5', 0, 5, '#', 1, 3),
(45, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 3),
(46, '主页', 0, 1, '/iblog/index/my/uid/4', 1, 4),
(47, '自定义2', 0, 2, '#', 1, 4),
(48, '自定义3', 0, 3, '#', 1, 4),
(49, '下拉菜单1', 48, 1, '#', 1, 4),
(50, '下拉菜单2', 48, 2, '#', 1, 4),
(51, '下拉菜单3', 48, 3, '#', 1, 4),
(52, '@我吧', 0, 4, '/iblog/index/contact/uid/4', 1, 4),
(53, '视频播客5', 0, 5, '#', 1, 4),
(54, '我的音乐6', 0, 6, '#', 1, 4),
(55, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 4),
(56, '自定义2', 0, 2, '#', 2, 4),
(57, '自定义3', 0, 3, '#', 2, 4),
(58, '自定义4', 0, 4, '#', 2, 4),
(59, '自定义5', 0, 5, '#', 2, 4),
(60, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 4),
(61, '主页', 0, 1, '/iblog/index/my/uid/5', 1, 5),
(62, '自定义2', 0, 2, '#', 1, 5),
(63, '自定义3', 0, 3, '#', 1, 5),
(64, '下拉菜单1', 63, 1, '#', 1, 5),
(65, '下拉菜单2', 63, 2, '#', 1, 5),
(66, '下拉菜单3', 63, 3, '#', 1, 5),
(67, '@我吧', 0, 4, '/iblog/index/contact/uid/5', 1, 5),
(68, '视频播客5', 0, 5, '#', 1, 5),
(69, '我的音乐6', 0, 6, '#', 1, 5),
(70, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 5),
(71, '自定义2', 0, 2, '#', 2, 5),
(72, '自定义3', 0, 3, '#', 2, 5),
(73, '自定义4', 0, 4, '#', 2, 5),
(74, '自定义5', 0, 5, '#', 2, 5),
(75, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 5),
(76, '主页', 0, 1, '/iblog/index/my/uid/6', 1, 6),
(77, '自定义2', 0, 2, '#', 1, 6),
(78, '自定义3', 0, 3, '#', 1, 6),
(79, '下拉菜单1', 78, 1, '#', 1, 6),
(80, '下拉菜单2', 78, 2, '#', 1, 6),
(81, '下拉菜单3', 78, 3, '#', 1, 6),
(82, '@我吧', 0, 4, '/iblog/index/contact/uid/6', 1, 6),
(83, '视频播客5', 0, 5, '#', 1, 6),
(84, '我的音乐6', 0, 6, '#', 1, 6),
(85, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 6),
(86, '自定义2', 0, 2, '#', 2, 6),
(87, '自定义3', 0, 3, '#', 2, 6),
(88, '自定义4', 0, 4, '#', 2, 6),
(89, '自定义5', 0, 5, '#', 2, 6),
(90, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 6),
(91, '主页', 0, 1, '/iblog/index/my/uid/7', 1, 7),
(92, '自定义2', 0, 2, '#', 1, 7),
(93, '自定义3', 0, 3, '#', 1, 7),
(94, '下拉菜单1', 93, 1, '#', 1, 7),
(95, '下拉菜单2', 93, 2, '#', 1, 7),
(96, '下拉菜单3', 93, 3, '#', 1, 7),
(97, '@我吧', 0, 4, '/iblog/index/contact/uid/7', 1, 7),
(98, '视频播客5', 0, 5, '#', 1, 7),
(99, '我的音乐6', 0, 6, '#', 1, 7),
(100, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 7),
(101, '自定义2', 0, 2, '#', 2, 7),
(102, '自定义3', 0, 3, '#', 2, 7),
(103, '自定义4', 0, 4, '#', 2, 7),
(104, '自定义5', 0, 5, '#', 2, 7),
(105, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 7),
(106, '主页', 0, 1, '/iblog/index/my/uid/8', 1, 8),
(107, '自定义2', 0, 2, '#', 1, 8),
(108, '自定义3', 0, 3, '#', 1, 8),
(109, '下拉菜单1', 108, 1, '#', 1, 8),
(110, '下拉菜单2', 108, 2, '#', 1, 8),
(111, '下拉菜单3', 108, 3, '#', 1, 8),
(112, '@我吧', 0, 4, '/iblog/index/contact/uid/8', 1, 8),
(113, '视频播客5', 0, 5, '#', 1, 8),
(114, '我的音乐6', 0, 6, '#', 1, 8),
(115, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 8),
(116, '自定义2', 0, 2, '#', 2, 8),
(117, '自定义3', 0, 3, '#', 2, 8),
(118, '自定义4', 0, 4, '#', 2, 8),
(119, '自定义5', 0, 5, '#', 2, 8),
(120, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 8),
(121, '主页', 0, 1, '/iblog/index/my/uid/9', 1, 9),
(122, '自定义2', 0, 2, '#', 1, 9),
(123, '自定义3', 0, 3, '#', 1, 9),
(124, '下拉菜单1', 123, 1, '#', 1, 9),
(125, '下拉菜单2', 123, 2, '#', 1, 9),
(126, '下拉菜单3', 123, 3, '#', 1, 9),
(127, '@我吧', 0, 4, '/iblog/index/contact/uid/9', 1, 9),
(128, '视频播客5', 0, 5, '#', 1, 9),
(129, '我的音乐6', 0, 6, '#', 1, 9),
(130, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 9),
(131, '自定义2', 0, 2, '#', 2, 9),
(132, '自定义3', 0, 3, '#', 2, 9),
(133, '自定义4', 0, 4, '#', 2, 9),
(134, '自定义5', 0, 5, '#', 2, 9),
(135, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 9),
(136, '主页', 0, 1, '/iblog/index/my/uid/10', 1, 10),
(137, '自定义2', 0, 2, '#', 1, 10),
(138, '自定义3', 0, 3, '#', 1, 10),
(139, '下拉菜单1', 138, 1, '#', 1, 10),
(140, '下拉菜单2', 138, 2, '#', 1, 10),
(141, '下拉菜单3', 138, 3, '#', 1, 10),
(142, '@我吧', 0, 4, '/iblog/index/contact/uid/10', 1, 10),
(143, '视频播客5', 0, 5, '#', 1, 10),
(144, '我的音乐6', 0, 6, '#', 1, 10),
(145, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 10),
(146, '自定义2', 0, 2, '#', 2, 10),
(147, '自定义3', 0, 3, '#', 2, 10),
(148, '自定义4', 0, 4, '#', 2, 10),
(149, '自定义5', 0, 5, '#', 2, 10),
(150, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 10),
(151, '主页', 0, 1, '/iblog/index/my/uid/11', 1, 11),
(152, '自定义2', 0, 2, '#', 1, 11),
(153, '自定义3', 0, 3, '#', 1, 11),
(154, '下拉菜单1', 153, 1, '#', 1, 11),
(155, '下拉菜单2', 153, 2, '#', 1, 11),
(156, '下拉菜单3', 153, 3, '#', 1, 11),
(157, '@我吧', 0, 4, '/iblog/index/contact/uid/11', 1, 11),
(158, '视频播客5', 0, 5, '#', 1, 11),
(159, '我的音乐6', 0, 6, '#', 1, 11),
(160, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 11),
(161, '自定义2', 0, 2, '#', 2, 11),
(162, '自定义3', 0, 3, '#', 2, 11),
(163, '自定义4', 0, 4, '#', 2, 11),
(164, '自定义5', 0, 5, '#', 2, 11),
(165, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 11),
(166, '主页', 0, 1, '/iblog/index/my/uid/12', 1, 12),
(167, '自定义2', 0, 2, '#', 1, 12),
(168, '自定义3', 0, 3, '#', 1, 12),
(169, '下拉菜单1', 168, 1, '#', 1, 12),
(170, '下拉菜单2', 168, 2, '#', 1, 12),
(171, '下拉菜单3', 168, 3, '#', 1, 12),
(172, '@我吧', 0, 4, '/iblog/index/contact/uid/12', 1, 12),
(173, '视频播客5', 0, 5, '#', 1, 12),
(174, '我的音乐6', 0, 6, '#', 1, 12),
(175, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 12),
(176, '自定义2', 0, 2, '#', 2, 12),
(177, '自定义3', 0, 3, '#', 2, 12),
(178, '自定义4', 0, 4, '#', 2, 12),
(179, '自定义5', 0, 5, '#', 2, 12),
(180, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 12),
(181, '主页', 0, 1, '/iblog/index/my/uid/13', 1, 13),
(182, '自定义2', 0, 2, '#', 1, 13),
(183, '自定义3', 0, 3, '#', 1, 13),
(184, '下拉菜单1', 183, 1, '#', 1, 13),
(185, '下拉菜单2', 183, 2, '#', 1, 13),
(186, '下拉菜单3', 183, 3, '#', 1, 13),
(187, '@我吧', 0, 4, '/iblog/index/contact/uid/13', 1, 13),
(188, '视频播客5', 0, 5, '#', 1, 13),
(189, '我的音乐6', 0, 6, '#', 1, 13),
(190, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 13),
(191, '自定义2', 0, 2, '#', 2, 13),
(192, '自定义3', 0, 3, '#', 2, 13),
(193, '自定义4', 0, 4, '#', 2, 13),
(194, '自定义5', 0, 5, '#', 2, 13),
(195, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 13),
(196, '主页', 0, 1, '/iblog/index/my/uid/14', 1, 14),
(197, '自定义2', 0, 2, '#', 1, 14),
(198, '自定义3', 0, 3, '#', 1, 14),
(199, '下拉菜单1', 198, 1, '#', 1, 14),
(200, '下拉菜单2', 198, 2, '#', 1, 14),
(201, '下拉菜单3', 198, 3, '#', 1, 14),
(202, '@我吧', 0, 4, '/iblog/index/contact/uid/14', 1, 14),
(203, '视频播客5', 0, 5, '#', 1, 14),
(204, '我的音乐6', 0, 6, '#', 1, 14),
(205, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 14),
(206, '自定义2', 0, 2, '#', 2, 14),
(207, '自定义3', 0, 3, '#', 2, 14),
(208, '自定义4', 0, 4, '#', 2, 14),
(209, '自定义5', 0, 5, '#', 2, 14),
(210, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 14),
(212, '主页', 0, 1, '/iblog/index/my/uid/15', 1, 15),
(213, '文艺', 0, 2, '#', 1, 15),
(214, '自定义3', 0, 3, '#', 1, 15),
(215, '下拉菜单1', 214, 1, '#', 1, 15),
(216, '下拉菜单2', 214, 2, '#', 1, 15),
(217, '下拉菜单3', 214, 3, '#', 1, 15),
(218, '联系我', 0, 4, '/iblog/index/contact/uid/15', 1, 15),
(219, '视频播客5', 0, 5, '#', 1, 15),
(220, '我的音乐6', 0, 6, '#', 1, 15),
(221, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 15),
(222, '自定义2', 0, 2, '#', 2, 15),
(223, '自定义3', 0, 3, '#', 2, 15),
(224, '自定义4', 0, 4, '#', 2, 15),
(225, '自定义5', 0, 5, '#', 2, 15),
(226, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 15),
(227, '主页', 0, 1, '/iblog/index/my/uid/16', 1, 16),
(228, '自定义2', 0, 2, '#', 1, 16),
(229, '自定义3', 0, 3, '#', 1, 16),
(230, '下拉菜单1', 229, 1, '#', 1, 16),
(231, '下拉菜单2', 229, 2, '#', 1, 16),
(232, '下拉菜单3', 229, 3, '#', 1, 16),
(233, '@我吧', 0, 4, '/iblog/index/contact/uid/16', 1, 16),
(234, '视频播客5', 0, 5, '#', 1, 16),
(235, '我的音乐6', 0, 6, '#', 1, 16),
(236, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 16),
(237, '自定义2', 0, 2, '#', 2, 16),
(238, '自定义3', 0, 3, '#', 2, 16),
(239, '自定义4', 0, 4, '#', 2, 16),
(240, '自定义5', 0, 5, '#', 2, 16),
(241, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 16),
(242, '主页', 0, 1, '/iblog/index/my/uid/17', 1, 17),
(243, '自定义2', 0, 2, '#', 1, 17),
(244, '自定义3', 0, 3, '#', 1, 17),
(245, '下拉菜单1', 244, 1, '#', 1, 17),
(246, '下拉菜单2', 244, 2, '#', 1, 17),
(247, '下拉菜单3', 244, 3, '#', 1, 17),
(248, '@我吧', 0, 4, '/iblog/index/contact/uid/17', 1, 17),
(249, '视频播客5', 0, 5, '#', 1, 17),
(250, '我的音乐6', 0, 6, '#', 1, 17),
(251, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 17),
(252, '自定义2', 0, 2, '#', 2, 17),
(253, '自定义3', 0, 3, '#', 2, 17),
(254, '自定义4', 0, 4, '#', 2, 17),
(255, '自定义5', 0, 5, '#', 2, 17),
(256, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 17),
(272, '主页', 0, 1, '/we/index/m/who/19', 1, 19),
(273, '时尚主流', 0, 2, '#', 1, 19),
(274, '韩国明星', 0, 3, '#', 1, 19),
(275, '下拉菜单1', 274, 1, '#', 1, 19),
(276, '下拉菜单2', 274, 2, '#', 1, 19),
(277, '下拉菜单3', 274, 3, '#', 1, 19),
(278, '联系方式', 0, 4, '/we/index/contact/uid/19', 1, 19),
(279, '品牌宣传', 0, 5, '#', 1, 19),
(280, '我的音乐6', 0, 6, '#', 1, 19),
(281, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 19),
(282, '堆糖网', 0, 2, 'www.duitang.com', 2, 19),
(283, '野糖网', 0, 3, 'http://www.yetang.com/', 2, 19),
(284, '观潮网', 0, 4, 'http://www.fashiontrenddigest.com/', 2, 19),
(285, '潮人公社', 0, 5, 'http://www.chao-cn.com/', 2, 19),
(286, '管理助手', 0, 6, '/we/admin/admin/index', 2, 19),
(287, '主页', 0, 1, '/iblog/index/my/uid/20', 1, 20),
(288, '自定义2', 0, 2, '#', 1, 20),
(289, '自定义3', 0, 3, '#', 1, 20),
(290, '下拉菜单1', 289, 1, '#', 1, 20),
(291, '下拉菜单2', 289, 2, '#', 1, 20),
(292, '下拉菜单3', 289, 3, '#', 1, 20),
(293, '@我吧', 0, 4, '/iblog/index/contact/uid/20', 1, 20),
(294, '视频播客5', 0, 5, '#', 1, 20),
(295, '我的音乐6', 0, 6, '#', 1, 20),
(296, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 20),
(297, '自定义2', 0, 2, '#', 2, 20),
(298, '自定义3', 0, 3, '#', 2, 20),
(299, '自定义4', 0, 4, '#', 2, 20),
(300, '自定义5', 0, 5, '#', 2, 20),
(301, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 20),
(302, '主页', 0, 1, '/iblog/index/my/uid/21', 1, 21),
(303, '自定义2', 0, 2, '#', 1, 21),
(304, '自定义3', 0, 3, '#', 1, 21),
(305, '下拉菜单1', 304, 1, '#', 1, 21),
(306, '下拉菜单2', 304, 2, '#', 1, 21),
(307, '下拉菜单3', 304, 3, '#', 1, 21),
(308, '@我吧', 0, 4, '/iblog/index/contact/uid/21', 1, 21),
(309, '视频播客5', 0, 5, '#', 1, 21),
(310, '我的音乐6', 0, 6, '#', 1, 21),
(311, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 21),
(312, '自定义2', 0, 2, '#', 2, 21),
(313, '自定义3', 0, 3, '#', 2, 21),
(314, '自定义4', 0, 4, '#', 2, 21),
(315, '自定义5', 0, 5, '#', 2, 21),
(316, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 21),
(317, '主页', 0, 1, '/iblog/index/my/uid/22', 1, 22),
(318, '自定义2', 0, 2, '#', 1, 22),
(319, '自定义3', 0, 3, '#', 1, 22),
(320, '下拉菜单1', 319, 1, '#', 1, 22),
(321, '下拉菜单2', 319, 2, '#', 1, 22),
(322, '下拉菜单3', 319, 3, '#', 1, 22),
(323, '@我吧', 0, 4, '/iblog/index/contact/uid/22', 1, 22),
(324, '视频播客5', 0, 5, '#', 1, 22),
(325, '我的音乐6', 0, 6, '#', 1, 22),
(326, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 22),
(327, '自定义2', 0, 2, '#', 2, 22),
(328, '自定义3', 0, 3, '#', 2, 22),
(329, '自定义4', 0, 4, '#', 2, 22),
(330, '自定义5', 0, 5, '#', 2, 22),
(331, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 22),
(332, '主页', 0, 1, '/iblog/index/my/uid/23', 1, 23),
(333, '自定义2', 0, 2, '#', 1, 23),
(334, '自定义3', 0, 3, '#', 1, 23),
(335, '下拉菜单1', 334, 1, '#', 1, 23),
(336, '下拉菜单2', 334, 2, '#', 1, 23),
(337, '下拉菜单3', 334, 3, '#', 1, 23),
(338, '@我吧', 0, 4, '/iblog/index/contact/uid/23', 1, 23),
(339, '视频播客5', 0, 5, '#', 1, 23),
(340, '我的音乐6', 0, 6, '#', 1, 23),
(341, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 23),
(342, '自定义2', 0, 2, '#', 2, 23),
(343, '自定义3', 0, 3, '#', 2, 23),
(344, '自定义4', 0, 4, '#', 2, 23),
(345, '自定义5', 0, 5, '#', 2, 23),
(346, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 23),
(347, '主页', 0, 1, '/iblog/index/my/uid/24', 1, 24),
(348, '自定义2', 0, 2, '#', 1, 24),
(349, '自定义3', 0, 3, '#', 1, 24),
(350, '下拉菜单1', 349, 1, '#', 1, 24),
(351, '下拉菜单2', 349, 2, '#', 1, 24),
(352, '下拉菜单3', 349, 3, '#', 1, 24),
(353, '@我吧', 0, 4, '/iblog/index/contact/uid/24', 1, 24),
(354, '视频播客5', 0, 5, '#', 1, 24),
(355, '我的音乐6', 0, 6, '#', 1, 24),
(356, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 24),
(357, '自定义2', 0, 2, '#', 2, 24),
(358, '自定义3', 0, 3, '#', 2, 24),
(359, '自定义4', 0, 4, '#', 2, 24),
(360, '自定义5', 0, 5, '#', 2, 24),
(361, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 24),
(362, '主页', 0, 1, '/iblog/index/my/uid/25', 1, 25),
(363, '自定义2', 0, 2, '#', 1, 25),
(364, '自定义3', 0, 3, '#', 1, 25),
(365, '下拉菜单1', 364, 1, '#', 1, 25),
(366, '下拉菜单2', 364, 2, '#', 1, 25),
(367, '下拉菜单3', 364, 3, '#', 1, 25),
(368, '@我吧', 0, 4, '/iblog/index/contact/uid/25', 1, 25),
(369, '视频播客5', 0, 5, '#', 1, 25),
(370, '我的音乐6', 0, 6, '#', 1, 25),
(371, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 25),
(372, '自定义2', 0, 2, '#', 2, 25),
(373, '自定义3', 0, 3, '#', 2, 25),
(374, '自定义4', 0, 4, '#', 2, 25),
(375, '自定义5', 0, 5, '#', 2, 25),
(376, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 25),
(377, '主页', 0, 1, '/iblog/index/my/uid/26', 1, 26),
(378, '自定义2', 0, 2, '#', 1, 26),
(379, '自定义3', 0, 3, '#', 1, 26),
(380, '下拉菜单1', 379, 1, '#', 1, 26),
(381, '下拉菜单2', 379, 2, '#', 1, 26),
(382, '下拉菜单3', 379, 3, '#', 1, 26),
(383, '@我吧', 0, 4, '/iblog/index/contact/uid/26', 1, 26),
(384, '视频播客5', 0, 5, '#', 1, 26),
(385, '我的音乐6', 0, 6, '#', 1, 26),
(386, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 26),
(387, '自定义2', 0, 2, '#', 2, 26),
(388, '自定义3', 0, 3, '#', 2, 26),
(389, '自定义4', 0, 4, '#', 2, 26),
(390, '自定义5', 0, 5, '#', 2, 26),
(391, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 26),
(392, '主页', 0, 1, '/iblog/index/my/uid/27', 1, 27),
(393, '自定义2', 0, 2, '#', 1, 27),
(394, '自定义3', 0, 3, '#', 1, 27),
(395, '下拉菜单1', 394, 1, '#', 1, 27),
(396, '下拉菜单2', 394, 2, '#', 1, 27),
(397, '下拉菜单3', 394, 3, '#', 1, 27),
(398, '@我吧', 0, 4, '/iblog/index/contact/uid/27', 1, 27),
(399, '视频播客5', 0, 5, '#', 1, 27),
(400, '我的音乐6', 0, 6, '#', 1, 27),
(401, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 27),
(402, '自定义2', 0, 2, '#', 2, 27),
(403, '自定义3', 0, 3, '#', 2, 27),
(404, '自定义4', 0, 4, '#', 2, 27),
(405, '自定义5', 0, 5, '#', 2, 27),
(406, '管理助手', 0, 6, '/iblog/admin/admin/index', 2, 27),
(407, '主页', 0, 1, '/index/m/who/28', 1, 28),
(408, '自定义2', 0, 2, '#', 1, 28),
(409, '自定义3', 0, 3, '#', 1, 28),
(410, '下拉菜单1', 409, 1, '#', 1, 28),
(411, '下拉菜单2', 409, 2, '#', 1, 28),
(412, '下拉菜单3', 409, 3, '#', 1, 28),
(413, '@我吧', 0, 4, '/index/contact/uid/28', 1, 28),
(414, '视频播客5', 0, 5, '#', 1, 28),
(415, '我的音乐6', 0, 6, '#', 1, 28),
(416, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 28),
(417, '自定义2', 0, 2, '#', 2, 28),
(418, '自定义3', 0, 3, '#', 2, 28),
(419, '自定义4', 0, 4, '#', 2, 28),
(420, '自定义5', 0, 5, '#', 2, 28),
(421, '管理助手', 0, 6, '/admin/admin/index', 2, 28),
(422, '主页', 0, 1, '/index/m/who/29', 1, 29),
(423, '自定义2', 0, 2, '#', 1, 29),
(424, '自定义3', 0, 3, '#', 1, 29),
(425, '下拉菜单1', 424, 1, '#', 1, 29),
(426, '下拉菜单2', 424, 2, '#', 1, 29),
(427, '下拉菜单3', 424, 3, '#', 1, 29),
(428, '@我吧', 0, 4, '/index/contact/uid/29', 1, 29),
(429, '视频播客5', 0, 5, '#', 1, 29),
(430, '我的音乐6', 0, 6, '#', 1, 29),
(431, '版权所有 walksun Copyright 2014 - 2015', 0, 1, '#', 2, 29),
(432, '自定义2', 0, 2, '#', 2, 29),
(433, '自定义3', 0, 3, '#', 2, 29),
(434, '自定义4', 0, 4, '#', 2, 29),
(435, '自定义5', 0, 5, '#', 2, 29),
(436, '管理助手', 0, 6, '/admin/admin/index', 2, 29);

-- --------------------------------------------------------

--
-- 表的结构 `ws_mv`
--

CREATE TABLE IF NOT EXISTS `ws_mv` (
  `id` int(5) NOT NULL auto_increment,
  `mv` varchar(255) default NULL COMMENT 'mv地址',
  `userid` int(5) default NULL,
  `name` varchar(255) default NULL COMMENT '视频名称',
  `sort` int(5) default '0' COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ws_mv`
--

INSERT INTO `ws_mv` (`id`, `mv`, `userid`, `name`, `sort`) VALUES
(4, 'bairimense7en.mp4', 1, 'se7en 白日梦 高清', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ws_photo`
--

CREATE TABLE IF NOT EXISTS `ws_photo` (
  `id` int(5) NOT NULL auto_increment,
  `picture` varchar(255) NOT NULL,
  `userid` int(5) default NULL COMMENT '用户相册',
  `time` int(11) default NULL COMMENT '上传时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=173 ;

--
-- 转存表中的数据 `ws_photo`
--

INSERT INTO `ws_photo` (`id`, `picture`, `userid`, `time`) VALUES
(37, '141233434017432.jpg', 15, 1412334340),
(38, '141233434166221.jpg', 15, 1412334341),
(39, '141233434173568.jpg', 15, 1412334341),
(40, '141233434339541.jpg', 15, 1412334343),
(41, '141233434481871.jpg', 15, 1412334344),
(42, '141233434584877.jpg', 15, 1412334345),
(43, '141233434666035.jpg', 15, 1412334346),
(142, '142692255552769.jpg', 19, 1426922555),
(143, '142694292693254.jpg', 19, 1426942926),
(144, '142694294557858.jpg', 19, 1426942945),
(168, '143176698741320.jpg', 1, 1431766987),
(172, '143421167292209.jpg', 1, 1434211672);

-- --------------------------------------------------------

--
-- 表的结构 `ws_song`
--

CREATE TABLE IF NOT EXISTS `ws_song` (
  `id` int(5) NOT NULL auto_increment,
  `song` varchar(255) default NULL COMMENT '歌曲地址',
  `userid` int(5) default NULL,
  `name` varchar(255) default NULL COMMENT '歌曲名称',
  `sort` int(5) default NULL COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `ws_song`
--

INSERT INTO `ws_song` (`id`, `song`, `userid`, `name`, `sort`) VALUES
(10, '140340620686722.mp3', 3, '青花瓷 周杰伦', 1),
(20, '141233457495557.mp3', 15, '许嵩 - 逗你玩', 1),
(36, '142694384262738.mp3', 19, '金艺林 - 懂得又如何', 1),
(37, '142694390651012.mp3', 19, '金艺林 - All Right(East4A Soulful Mix)', 2),
(45, '143126566073762.mp3', 1, '4minute - 今天做什么 - 现场.mp3', 1),
(46, '143126570046942.mp3', 1, '许嵩 - 断桥残雪 - Live.mp3', 2),
(48, '143133504932421.mp3', 1, 'Zara Larsson - Uncover.mp3', 3);

-- --------------------------------------------------------

--
-- 表的结构 `ws_user`
--

CREATE TABLE IF NOT EXISTS `ws_user` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(32) NOT NULL COMMENT '登陆名/规定用email注册',
  `truename` varchar(64) default NULL COMMENT '真实姓名',
  `nickname` varchar(255) default NULL COMMENT '昵称',
  `password` varchar(64) default NULL COMMENT '密码',
  `logintime` datetime default NULL COMMENT '登陆时间',
  `lastlogintime` datetime default NULL COMMENT '最后一次登陆时间',
  `loginip` varchar(32) default NULL COMMENT '登陆ip',
  `lastloginip` varchar(32) default NULL COMMENT '最后一次登陆ip',
  `phone` varchar(32) default NULL COMMENT '电话号码',
  `qq` varchar(32) default NULL COMMENT '腾讯qq',
  `headpicture` varchar(255) default NULL COMMENT '头像',
  `introduce` text COMMENT '个人简介',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `ws_user`
--

INSERT INTO `ws_user` (`id`, `username`, `truename`, `nickname`, `password`, `logintime`, `lastlogintime`, `loginip`, `lastloginip`, `phone`, `qq`, `headpicture`, `introduce`) VALUES
(1, 'zhuwanxiong', '朱万雄', 'walksun', 'd117f2771ec2ae5236b59212e7f015ee', NULL, NULL, NULL, NULL, '18727717260', '382286731', '142703327652945.jpg', '<p style="margin-top:20px;">\r\n	<span style="color:#FFFFFF;font-family:幼圆;font-size:13px;line-height:23px;">生命是一个不停飘移的过程，你我所走过的每一个地方，遇见的每一个人，也许都将成为驿站，成为过客，一向喜欢追忆，喜欢回顾，喜欢不忘记。如今却发现，深刻在心里的那些东西早已在他们的时间里化成遗忘，不要让心太累，不要追想太多已不属于自己的人和事。</span> \r\n</p>'),
(3, 'test', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'abcdxx', NULL, NULL, '4ec3f56f8ea727a10edb853f4aaf371f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'aaa', NULL, NULL, '96e79218965eb72c92a549dd5a330112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1301582878@qq.com', NULL, NULL, '9793b56970ebc552fb09d77890549aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ekexil@163.com', NULL, NULL, '283466e3d7f17bdec2787e13b2fc7688', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '1910966414@qq.com', NULL, NULL, '0cba9c2f0b710b6934f7a3b128daef70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '12312', NULL, NULL, 'b53d1e72e176b30a98c75253502e9e18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'zhuzhiming', NULL, NULL, 'bc9e0ee0ea1d2395de9ae02f432df0f5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'lalala', NULL, NULL, 'd117f2771ec2ae5236b59212e7f015ee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'polaris', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'sdfdsfsd', NULL, NULL, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'xiangfeng', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '419937452@qq.com', NULL, NULL, '57dca9288be81bb07a3e64fee5d3c790', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'lixiaoli', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'dearlin', 'Lin', 'LinR', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, '13578909868', '12345675678', '142521678663517.jpg', '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	A Simple CMS . Do Anything .\r\n</p>'),
(20, 'yanruolan', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'null', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'vivishiny', NULL, NULL, '515ac1fc7119eb1d98fcfeea25342686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '1185944179@qq.com', NULL, NULL, '7ab922519221cde94b7b2e0b304b49e6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'patience18@sina.cn', NULL, NULL, '61cf96908f888a436a0288e124f5809e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'zhumi', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '834192463@qq.com', NULL, NULL, 'de4372225334bfb0dcdfd3874fa26042', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'afeng', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '1240016177@qq.com', NULL, NULL, '5731af7b756dda20ca5c8e564b5ae761', NULL, NULL, NULL, NULL, NULL, NULL, '142703439637160.jpg', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ws_webconfig`
--

CREATE TABLE IF NOT EXISTS `ws_webconfig` (
  `id` int(5) NOT NULL auto_increment,
  `userid` int(5) NOT NULL,
  `copyright` mediumtext COMMENT '版权信息',
  `icon` varchar(255) default NULL COMMENT '网站标徽',
  `title` varchar(255) default NULL COMMENT '网站标题',
  `seo` mediumtext COMMENT '网站seo',
  `iaccess` tinyint(1) NOT NULL default '0',
  `background` int(10) NOT NULL,
  `titlecolor` varchar(25) NOT NULL,
  `contentcolor` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `ws_webconfig`
--

INSERT INTO `ws_webconfig` (`id`, `userid`, `copyright`, `icon`, `title`, `seo`, `iaccess`, `background`, `titlecolor`, `contentcolor`) VALUES
(1, 1, '版权所有 walksun Copyright 2014 - 2015 ', 'http://wansun-iblog.qiniudn.com/140194426586998.jpg', 'Black Man', '朱万雄的微博客。生命是一个不停飘移的过程，你我所走过的每一个地方，遇见的每一个人，也许都将成为驿站，成为过客，一向喜欢追忆，喜欢回顾，喜欢不忘记。如今却发现，深刻在心里的那些东西早已在他们的时间里化成遗忘，不要让心太累，不要追想太多已不属于自己的人和事。', 0, 172, '#ffffff', '#ffffff'),
(3, 3, 'My Iblog 版权所有 test', NULL, 'My Iblog', 'My Iblog', 0, 0, '', ''),
(4, 4, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(5, 5, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(6, 6, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(7, 7, 'copyright by walksun.cn', 'http://wansun-iblog.qiniudn.com/141016866415481.jpg', '静婉的微博客', '静婉的微博客，黑色博客，小博客', 0, 0, '', ''),
(8, 8, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(9, 9, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(10, 10, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(11, 11, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(12, 12, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(13, 13, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(14, 14, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(15, 15, 'copyright by xf', NULL, 'xf', 'xf', 0, 37, '', ''),
(16, 16, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(17, 17, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(19, 19, '版权所有 walksun Copyright 2014 - 2015', NULL, '韩风都市', '韩风都市,韩国流行，最in,当前流行时尚', 0, 143, '#666666', '#666666'),
(20, 20, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(21, 21, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(22, 22, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(23, 23, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(24, 24, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(25, 25, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(26, 26, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(28, 28, NULL, NULL, NULL, NULL, 0, 0, '', ''),
(29, 29, NULL, NULL, NULL, NULL, 0, 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
