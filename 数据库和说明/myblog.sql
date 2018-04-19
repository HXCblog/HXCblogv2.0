-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 04 月 09 日 09:07
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `myblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(170) NOT NULL DEFAULT '',
  `content` text,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `goodjob` smallint(6) NOT NULL DEFAULT '0',
  `badjob` smallint(6) NOT NULL DEFAULT '0',
  `viewnum` int(11) NOT NULL DEFAULT '0',
  `author` varchar(50) NOT NULL DEFAULT 'DarkBlue',
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL DEFAULT '',
  `createtime` varchar(20) NOT NULL DEFAULT '',
  `articlenum` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cid`, `catename`, `createtime`, `articlenum`) VALUES
(17, '前端乱炖', '20170814', 18),
(18, 'H5&CSS3', '20170814', 3),
(19, 'UI框架', '20170814', 2),
(20, '后台/运维', '20170814', 17),
(22, '笔记', '20170814', 9),
(29, '移动/响应式', '20170824', 7),
(35, '日记/生活', '20171109', 7),
(34, '游戏/动漫', '20171109', 5),
(36, '程序员式幽默', '20180301', 2);

-- --------------------------------------------------------

--
-- 表的结构 `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `webname` varchar(30) NOT NULL,
  `website` varchar(50) NOT NULL,
  `addtime` varchar(18) NOT NULL,
  `email` varchar(200) NOT NULL,
  `touxiang` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- 转存表中的数据 `links`
--

INSERT INTO `links` (`id`, `webname`, `website`, `addtime`, `email`, `touxiang`, `img`) VALUES
(29, '胡新春', 'http://www.huxinchun.com', '2018-03-21', 'hi@huxinchun.com', '', 'https://www.gravatar.com/avatar/05a8b89687691e109cb30c0733b9f979?d=http%3A%2F%2Fwww.huxinchun.com%2Fpublic%2Ftanmu%2Ftanimg%2F1.jpg&s=80'),
(49, '梦阳的后宫', 'https://srun.in/', '2018-03-26', 'hi@huxinchun.com', 'https://qiniu.xhxhbh.cn/wp-content/uploads/2018/01/QQ图片20180127063826.jpg', 'https://qiniu.xhxhbh.cn/wp-content/uploads/2018/01/QQ图片20180127063826.jpg'),
(50, '树洞', 'https://aoaoao.me/', '2018-03-26', '', '', 'https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fwww.huxinchun.com%2Fpublic%2Ftanmu%2Ftanimg%2F1.jpg&s=80');

-- --------------------------------------------------------

--
-- 表的结构 `newliuyan`
--

CREATE TABLE IF NOT EXISTS `newliuyan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `website` varchar(500) NOT NULL,
  `time` int(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `info` text NOT NULL,
  `img` varchar(500) NOT NULL DEFAULT 'http://www.huxinchun.com//public/img/1.gif',
  `bottom` int(5) NOT NULL DEFAULT '70',
  `href` varchar(500) NOT NULL DEFAULT 'http://www.huxinchun.com/Liuyan',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=626 ;

--
-- 转存表中的数据 `newliuyan`
--

INSERT INTO `newliuyan` (`id`, `email`, `website`, `time`, `name`, `info`, `img`, `bottom`, `href`) VALUES
(622, 'hi@huxinchun.com', 'http://www.huxinchun.com', 1522377365, 'HXC', '恢复：FGHRSH  暂时还没有RSS 订阅的，以后看看需不需要弄。', 'https://www.gravatar.com/avatar/05a8b89687691e109cb30c0733b9f979?d=http%3A%2F%2Fwww.huxinchun.com%2Fpublic%2Ftanmu%2Ftanimg%2F1.jpg&s=80', 70, 'http://www.huxinchun.com/Liuyan'),
(623, '', '', 1522506211, '阿平', '博主，你的搜索功能使用后，左边友情链接报错，还有，我用了你的前端模版，很不错，^_^', 'https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fwww.huxinchun.com%2Fpublic%2Ftanmu%2Ftanimg%2F1.jpg&s=80', 70, 'http://www.huxinchun.com/Liuyan'),
(624, 'hi@huxinchun.com', 'http://huxinchun.com', 1522575847, 'HXC', '回复，阿平：确实是有问题，感谢提醒哦', 'https://www.gravatar.com/avatar/05a8b89687691e109cb30c0733b9f979?d=http%3A%2F%2Fwww.huxinchun.com%2Fpublic%2Ftanmu%2Ftanimg%2F1.jpg&s=80', 70, 'http://www.huxinchun.com/Liuyan'),
(625, '', 'as', 1522738127, 'mzz', '不错不错', 'https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fwww.huxinchun.com%2Fpublic%2Ftanmu%2Ftanimg%2F1.jpg&s=80', 70, 'http://www.huxinchun.com/Liuyan');

-- --------------------------------------------------------

--
-- 表的结构 `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `captcha_time` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `word` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6756 ;

--
-- 转存表中的数据 `picture`
--

INSERT INTO `picture` (`id`, `captcha_time`, `ip_address`, `word`) VALUES
(6754, 1523236041, '::1', '3590'),
(6753, 1523235943, '::1', '9419'),
(6755, 1523236057, '::1', '2422');

-- --------------------------------------------------------

--
-- 表的结构 `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planname` varchar(800) NOT NULL DEFAULT '',
  `usedtime` varchar(30) NOT NULL DEFAULT '',
  `finished` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `plan`
--

INSERT INTO `plan` (`id`, `planname`, `usedtime`, `finished`) VALUES
(19, '2013年12月在新浪注册第一个个人博客。', '新浪博客', '2013-11-04'),
(20, '2014年4月由于新浪博客功能有限，且不适合做技术博客，限制性太大，博客运行4个月后放弃更新。', '放弃新浪博客', '2014-04-04'),
(21, '2014年5月在CSDN搭建个人技术博客，在连续发表了4篇原创技术博文后，感觉局限性还是太大，且有很多设计和特效无法实现，后来也放弃了。', '进驻CSDN', '2014-05-01'),
(22, '2015年在大牛的建议和自身需求的趋使下尝试搭建自己的独立博客，4月开始规划胡新春博客。', '个人独立博客', '2015-04-23'),
(23, '2015年5月博客建设大体成型，在万网注册了域名，在阿里云租用了一台虚拟主机，开始部署博客程序。', '服务器购置', '2015-05-14'),
(24, '2015年7月，网站备案通过，在收集整理了一些博文后正式在互联网上发布。', '首次备案完成', '2015-07-16'),
(25, '2015年8月，网站轻微调整及漏洞修复，删除大量转载和价值低的博文，尝试发表原创博文，及网站SEO优化工作开始。', '尝试seo优化', '2015-08-14'),
(26, '2016年5月，在原独立博客运行整一年后，在百度及各大收索引擎收录原创博文进百篇后，为了适应新的互联网环境，也为了博客未来的前途，博主忍痛放弃原博客，决定重新规划胡新春博客，更换性能良好的后台程序，及简约清新的界面风格。', 'wordpress博客', '2016-05-07'),
(27, '2017年5月，磕磕绊绊博客走过3年多的历程，从新浪博客到独立博客，博主一直以来的坚持并不是为了什么，仅仅希望在这个大数据的世界里有一块属于自己的小小天地，在2016年5月的大改版后博客移至阿里云ECS，后台采用worpress二次开发，沿用清新简约的界面风格。', 'wp博客二次开发', '2017-05-04'),
(28, '2017年6月末，博客平凡遭受攻击，7月初被植入大量木马文件，网站无法正常访问，百度收录出现大量跳转级广告页，博主正打算重新设计自己的博客，于是果断放弃wordpress程序。', '终止wp博客', '2017-06-14'),
(29, '胡新春博客v1.0精简版发布，博客程序主要基于ci框架开发，后台及前台界面基于layui框架开发，历经约2个月努力，新版博客上线，虽然功能简单，但是亲自动手用起来更加亲切。', 'HXC博客v1.0 ', '2017-08-26'),
(30, '2017年9月，花了差不多一个月时间学习mui混合app技术并开发了HXC博客APP，丰富了手机端浏览，其实就是个练手的试验品。', 'HXC博客app', '2017-09-13'),
(31, '2017年10月，重新设计了一套新博客主题，命名HXC博客前端Funs主题，主要特点就是大版个性化强,简单做了响应适配，后台功能完善与优化。', 'HXC博客前端funs主题', '2017-10-26'),
(32, '增加友情链接，申请管理功能；增加闲言碎语，版本计划，程序员幽默模块及管理功能，完善站内留言系统，使用Gravatar邮箱头像，前后台文章搜索，前台界面美化，功能代码整理优化，修复部分bug等。', 'HXC博客v2.0', '2018-03-20');

-- --------------------------------------------------------

--
-- 表的结构 `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `problem`
--

INSERT INTO `problem` (`id`, `email`, `content`) VALUES
(1, '1212@qq.com', '测试数据'),
(2, '22qawoio', 'asfasda'),
(3, '1111111', 'afsd');

-- --------------------------------------------------------

--
-- 表的结构 `shuoshuo`
--

CREATE TABLE IF NOT EXISTS `shuoshuo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(12) NOT NULL,
  `words` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31278 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `location` varchar(80) NOT NULL DEFAULT '',
  `photo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `location`, `photo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'hi@huxinchun.com', '如痴如醉，微笑向阳，无畏悲伤', '/public/pictures/hxc.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `waitlinks`
--

CREATE TABLE IF NOT EXISTS `waitlinks` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `webname` varchar(50) NOT NULL,
  `website` varchar(200) NOT NULL,
  `touxiang` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
