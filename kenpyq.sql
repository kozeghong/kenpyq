-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 年 07 月 03 日 09:03
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kenpyq`
--
CREATE DATABASE IF NOT EXISTS `kenpyq` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kenpyq`;

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `uid2` int(11) NOT NULL DEFAULT '0',
  `sendtime` int(20) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`),
  KEY `uid2` (`uid2`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`cid`, `pid`, `uid`, `content`, `uid2`, `sendtime`, `deleted`) VALUES
(1, 2, 1, '测试评论功能。', 0, 1435849170, 0),
(2, 2, 1, '评论功能测试成功！', 0, 1435849268, 0),
(3, 2, 1, '再试一次！', 0, 1435849356, 0),
(4, 1, 1, '再试一次再试一次！', 0, 1435849372, 0),
(5, 1, 3, 'Good!', 0, 1435854033, 0),
(6, 1, 3, 'Hi!', 0, 1435854207, 0),
(7, 2, 3, '测试回复！', 1, 1435854333, 0),
(8, 3, 1, '切回Ken的账号..', 0, 1435854697, 0),
(9, 2, 1, '继续测试回复功能！', 3, 1435854727, 0),
(10, 4, 1, 'Hi!', 0, 1435903973, 0),
(11, 3, 5, 'Reply!', 1, 1435904001, 0),
(12, 7, 1, 'We are all worms, But I do believe that I am a glow worm.', 0, 1435905227, 0),
(13, 7, 7, 'I am ready to meet my Maker. Whether my Maker is prepared for the great ordeal of meeting me is another matter.', 1, 1435905237, 0),
(14, 9, 7, '评论也是实时显示！有别人的新评论也是马上显示出来！', 0, 1435906025, 0),
(15, 9, 1, '点击别人的评论，可以回复他们的评论！', 7, 1435906058, 0),
(16, 9, 3, '好！', 0, 1435906205, 0),
(17, 9, 1, '点赞是可以取消的', 0, 1435906460, 0);

-- --------------------------------------------------------

--
-- 表的结构 `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `uid` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  `permit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`uid2`),
  KEY `permit` (`permit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `contacts`
--

INSERT INTO `contacts` (`uid`, `uid2`, `permit`) VALUES
(6, 3, 0),
(1, 2, 1),
(1, 3, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(2, 1, 1),
(2, 3, 1),
(3, 1, 1),
(3, 2, 1),
(3, 5, 1),
(5, 1, 1),
(5, 3, 1),
(6, 1, 1),
(7, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sendtime` int(20) NOT NULL,
  PRIMARY KEY (`pid`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `like`
--

INSERT INTO `like` (`pid`, `uid`, `sendtime`) VALUES
(1, 1, 1435903368),
(1, 5, 1435904012),
(1, 7, 1435905246),
(7, 1, 1435905194),
(7, 7, 1435905290),
(8, 7, 1435905531),
(9, 1, 1435906112),
(9, 3, 1435906171);

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  `content` text NOT NULL,
  `notified` int(11) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photoid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`photoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `sendtime` int(20) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `uid` (`uid`),
  KEY `deleted` (`deleted`),
  KEY `sendtime` (`sendtime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`pid`, `uid`, `content`, `sendtime`, `deleted`) VALUES
(1, 1, '为了能够每次载入的时候只载入新的朋友圈，而不全部载入，我又把数据库的发表时间字段改成INT用来存时间戳。好麻烦啊。但没办法。', 1435845265, 0),
(2, 1, '然而时间戳也区分秒和毫秒啊。JQuery都是精确到毫秒的时间戳，然而MySQL好像是精确到秒。', 1435845496, 0),
(3, 3, '评论功能终于搞定了！', 1435854664, 0),
(4, 1, '点赞功能显示正常！', 1435894977, 0),
(5, 7, 'I am fond of pigs. Dogs look up to us. Cats look down on us. Pigs treat us as equals.', 1435905012, 0),
(6, 7, 'Continuous effort - not strength or intelligence - is the key to unlocking our potential.', 1435905054, 0),
(7, 7, 'He has all the virtues I dislike and none of the vices I admire.', 1435905076, 0),
(8, 1, '点赞部分全部完成！而且只能看到自己好友的评论和赞！', 1435905521, 0),
(9, 1, '只有有新的朋友圈或评论或点赞，在朋友圈页面都会自动显示，不需要手动刷新。', 1435905699, 0);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `whatsup` varchar(200) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `nickname`, `gender`, `whatsup`, `region`, `regdate`) VALUES
(1, 'ken', 'ken', 'Ken', 1, '什么都不要紧.', 'Shenzhen', '2015-07-01'),
(2, 'andy', 'andy', 'Andy', 1, '', '', '2015-07-01'),
(3, 'betty', 'abc', 'Betty', 2, 'hi', '', '2015-07-01'),
(5, 'pony', 'good', '森山大道', 1, '', '', '2015-07-02'),
(6, 'dong', 'dong', 'dong', 1, NULL, NULL, '2015-07-02'),
(7, 'you', 'you', '丘吉尔', 1, 'Never, never, never give in!', 'Britain', '2015-07-03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
