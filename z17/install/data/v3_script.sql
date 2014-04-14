DROP TABLE IF EXISTS `{dbpre}admin`;

CREATE TABLE `{dbpre}admin` (
  `adminid` mediumint(8) unsigned NOT NULL,
  `adminname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `groupid` mediumint(8) unsigned DEFAULT '0',
  `super` tinyint(1) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `logintimeline` int(10) unsigned DEFAULT '0',
  `logintimes` int(10) unsigned DEFAULT '0',
  `loginip` varchar(50) DEFAULT NULL,
  `memo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`adminid`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}area`;

CREATE TABLE `{dbpre}area` (
  `areaid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rootid` mediumint(8) unsigned DEFAULT '0',
  `depth` smallint(2) unsigned DEFAULT '0',
  `areaname` varchar(50) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '1',
  `tabstatus` tinyint(1) unsigned DEFAULT '0',  
  `orders` mediumint(8) unsigned DEFAULT '0',
  `spreadname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`areaid`),
  KEY `rootid` (`rootid`),
  KEY `flag` (`flag`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}authgroup`;

CREATE TABLE `{dbpre}authgroup` (
  `groupid` mediumint(8) unsigned NOT NULL,
  `groupname` varchar(50) DEFAULT NULL,
  `auths` text,
  `rootid` mediumint(8) unsigned DEFAULT '0',
  `depth` mediumint(2) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `orders` mediumint(8) unsigned DEFAULT '0',
  `intro` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`groupid`),
  KEY `rootid` (`rootid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}complaints`;

CREATE TABLE `{dbpre}complaints` (
  `id` int(11) NOT NULL,
  `cpuid` int(10) unsigned DEFAULT '0',
  `fromuid` int(10) unsigned DEFAULT '0',
  `cptype` tinyint(1) unsigned DEFAULT '0',
  `content` varchar(500) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `timeline` int(10) unsigned DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '0',
  `dealcontent` varchar(500) DEFAULT NULL,
  `dealtimeline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}diary`;

CREATE TABLE `{dbpre}diary` (
  `diaryid` int(10) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `fontcolor` varchar(50) DEFAULT NULL,
  `catid` mediumint(8) unsigned DEFAULT '0',
  `uploadfiles` varchar(255) DEFAULT NULL,
  `thumbfiles` varchar(255) DEFAULT NULL,
  `content` text,
  `weather` smallint(2) unsigned DEFAULT '0',
  `feel` smallint(2) unsigned DEFAULT '0',
  `diaryopen` tinyint(1) unsigned DEFAULT '1',
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `hits` int(10) unsigned DEFAULT '0',
  `elite` tinyint(1) unsigned DEFAULT '0',
  `istop` tinyint(1) unsigned DEFAULT '0',
  `metatitle` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadescription` varchar(255) DEFAULT NULL,
  `updatetime` int(10) unsigned DEFAULT '0',
  `updateuser` varchar(50) DEFAULT NULL,
  `points` decimal(18,2) unsigned DEFAULT '0.00',
  `isover` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`diaryid`),
  KEY `userid` (`userid`),
  KEY `diaryopen` (`diaryopen`),
  KEY `flag` (`flag`),
  KEY `elite` (`elite`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `{dbpre}diary_category`;

CREATE TABLE `{dbpre}diary_category` (
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(50) DEFAULT NULL,
  `parentid` mediumint(8) unsigned DEFAULT '0',
  `depth` smallint(2) unsigned DEFAULT '0',
  `fontcolor` varchar(50) DEFAULT NULL,
  `orders` mediumint(8) unsigned DEFAULT '0',
  `intro` varchar(500) DEFAULT NULL,
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `metatitle` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadescription` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `cssname` varchar(50) DEFAULT NULL,
  `target` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`catid`),
  KEY `parentid` (`parentid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}diary_comment`;

CREATE TABLE `{dbpre}diary_comment` (
  `commentid` int(10) unsigned NOT NULL DEFAULT '0',
  `diaryid` int(10) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `cmuserid` int(10) unsigned DEFAULT '0',
  `content` text,
  `timeline` int(10) unsigned DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '0',
  `deleted` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`commentid`),
  KEY `diaryid` (`diaryid`),
  KEY `commentuserid` (`cmuserid`),
  KEY `flag` (`flag`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}friend`;

CREATE TABLE `{dbpre}friend` (
  `friendid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `fuserid` int(10) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `black` tinyint(1) unsigned DEFAULT '0',
  `ftype` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`friendid`),
  KEY `userid` (`userid`),
  KEY `fuserid` (`fuserid`),
  KEY `ftype` (`ftype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}gift`;

CREATE TABLE `{dbpre}gift` (
  `giftid` mediumint(10) unsigned NOT NULL,
  `catid` mediumint(8) unsigned DEFAULT '0',
  `giftname` varchar(255) DEFAULT NULL,
  `points` decimal(18,2) unsigned DEFAULT '0.00',
  `imgurl` varchar(255) DEFAULT NULL,
  `intro` varchar(500) DEFAULT NULL,
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `elite` tinyint(1) unsigned DEFAULT '0',
  `istop` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`giftid`),
  KEY `cateid` (`catid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}gift_category`;

CREATE TABLE `{dbpre}gift_category` (
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(50) DEFAULT NULL,
  `orders` smallint(2) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`catid`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}gift_record`;

CREATE TABLE `{dbpre}gift_record` (
  `recordid` bigint(20) unsigned NOT NULL,
  `giftid` mediumint(10) unsigned DEFAULT '0',
  `fromuserid` int(10) unsigned DEFAULT '0',
  `touserid` int(10) unsigned DEFAULT '0',
  `points` decimal(18,2) unsigned DEFAULT '0.00',
  `message` varchar(255) DEFAULT NULL,
  `sendtimeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `viewstatus` tinyint(1) unsigned DEFAULT '0',
  `viewtimeline` int(10) unsigned DEFAULT '0',
  `reply` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`recordid`),
  KEY `fromuserid` (`fromuserid`),
  KEY `touserid` (`touserid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}greet`;

CREATE TABLE `{dbpre}greet` (
  `greetid` int(10) unsigned NOT NULL DEFAULT '0',
  `male` tinyint(1) unsigned DEFAULT '1',
  `female` tinyint(1) unsigned DEFAULT '1',
  `greeting` varchar(255) DEFAULT NULL,
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '1',
  `usecount` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`greetid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}hibox`;

CREATE TABLE `{dbpre}hibox` (
  `hiid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fromuserid` int(10) unsigned DEFAULT '0',
  `touserid` int(10) unsigned DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '0',
  `fromdeleted` tinyint(1) unsigned DEFAULT '0',
  `todeleted` tinyint(1) unsigned DEFAULT '0',
  `sendtime` int(10) unsigned DEFAULT '0',
  `greetid` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`hiid`),
  KEY `fromuserid` (`fromuserid`),
  KEY `touserid` (`touserid`),
  KEY `fromdeleted` (`fromdeleted`),
  KEY `todeleted` (`todeleted`),
  KEY `greetid` (`greetid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}home_payalbum`;

CREATE TABLE `{dbpre}home_payalbum` (
  `fid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `homeuserid` int(10) unsigned NOT NULL DEFAULT '0',
  `fee` decimal(18,2) unsigned NOT NULL DEFAULT '0.00',
  `timeline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}home_paycontact`;

CREATE TABLE `{dbpre}home_paycontact` (
  `fid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `homeuserid` int(10) unsigned NOT NULL DEFAULT '0',
  `fee` decimal(18,2) unsigned NOT NULL DEFAULT '0.00',
  `timeline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}home_viewer`;

CREATE TABLE `{dbpre}home_viewer` (
  `viewid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `homeuserid` int(10) unsigned DEFAULT '0',
  `viewuserid` int(10) unsigned DEFAULT '0',
  `viewtime` int(10) unsigned DEFAULT '0',
  `homedeleted` tinyint(1) unsigned DEFAULT '0',
  `viewdeleted` tinyint(1) unsigned DEFAULT '0',
  `pwstatus` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`viewid`),
  KEY `homeuserid` (`homeuserid`),
  KEY `viewuserid` (`viewuserid`),
  KEY `homedeleted` (`homedeleted`),
  KEY `viewdeleted` (`viewdeleted`),
  KEY `viewtime` (`viewtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}hometown`;

CREATE TABLE `{dbpre}hometown` (
  `areaid` mediumint(8) unsigned NOT NULL,
  `rootid` mediumint(8) unsigned DEFAULT '0',
  `depth` smallint(2) unsigned DEFAULT '0',
  `areaname` varchar(50) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '1',
  `orders` mediumint(8) unsigned DEFAULT '0',
  `spreadname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`areaid`),
  KEY `rootid` (`rootid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}htmllabel`;

CREATE TABLE `{dbpre}htmllabel` (
  `labelid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `labelname` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `flag` tinyint(1) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `issystem` tinyint(1) unsigned DEFAULT '0',
  `templet` varchar(50) DEFAULT 'default',
  PRIMARY KEY (`labelid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}info`;

CREATE TABLE `{dbpre}info` (
  `infoid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `thumbfiles` varchar(255) DEFAULT NULL,
  `uploadfiles` varchar(255) DEFAULT NULL,
  `summary` text,
  `content` text,
  `addtime` int(10) unsigned DEFAULT '0',
  `elite` tinyint(1) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `hits` int(10) unsigned DEFAULT '0',
  `orders` mediumint(8) unsigned DEFAULT '0',
  `metatitle` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadescription` varchar(255) DEFAULT NULL,
  `tplname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`infoid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}info_category`;

CREATE TABLE `{dbpre}info_category` (
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(50) DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadescription` varchar(255) DEFAULT NULL,
  `parentid` mediumint(8) unsigned DEFAULT '0',
  `depth` mediumint(8) unsigned DEFAULT '0',
  `orders` smallint(2) unsigned DEFAULT '0',
  `intro` varchar(255) DEFAULT NULL,
  `elite` tinyint(1) unsigned DEFAULT '0',
  `cssname` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `linktype` tinyint(1) unsigned DEFAULT '1',
  `linkurl` varchar(255) DEFAULT NULL,
  `target` tinyint(1) unsigned DEFAULT '1',
  `tplname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`catid`),
  KEY `parentid` (`parentid`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}lang`;

CREATE TABLE `{dbpre}lang` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `langnote` varchar(255) DEFAULT NULL,
  `langkey` varchar(255) DEFAULT NULL,
  `langval` varchar(2000) DEFAULT NULL,
  `issystem` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}log`;

CREATE TABLE `{dbpre}log` (
  `logid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `opuser` varchar(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `logtype` tinyint(1) unsigned DEFAULT '1',
  `timeline` int(10) unsigned DEFAULT '0',
  `success` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`logid`),
  KEY `opuser` (`opuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}love_paramter`;

CREATE TABLE `{dbpre}love_paramter` (
  `ptid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `ptname` varchar(100) DEFAULT NULL,
  `ptvalue` text,
  `ptdec` varchar(255) DEFAULT NULL,
  `orders` smallint(2) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `pttype` enum('select','radio','checkbox') DEFAULT NULL,
  `issystem` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`ptid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}love_sort`;

CREATE TABLE `{dbpre}love_sort` (
  `sortid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `sortname` varchar(50) DEFAULT NULL,
  `orders` smallint(2) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `issystem` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`sortid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}mail_content`;

CREATE TABLE `{dbpre}mail_content` (
  `contentid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `createline` int(10) unsigned DEFAULT '0',
  `sqltemp` varchar(1000) DEFAULT NULL,
  `pagesize` smallint(2) unsigned DEFAULT '0',
  `refresh` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}mail_log`;

CREATE TABLE `{dbpre}mail_log` (
  `logid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `contentid` int(10) unsigned DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `sendtime` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}mail_tpl`;

CREATE TABLE `{dbpre}mail_tpl` (
  `tplid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `tplsort` enum('reg','valid','forget','other') DEFAULT 'other',
  `flag` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`tplid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}message`;

CREATE TABLE `{dbpre}message` (
  `msgid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `hashid` bigint(20) unsigned DEFAULT '0',
  `content` text,
  `fromuserid` int(10) unsigned DEFAULT '0',
  `touserid` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `readflag` tinyint(1) unsigned DEFAULT '0',
  `readtime` int(10) unsigned DEFAULT '0',
  `sendtime` int(10) unsigned DEFAULT '0',
  `replystatus` tinyint(1) unsigned DEFAULT '0',
  `fromdeleted` tinyint(1) unsigned DEFAULT '0',
  `todeleted` tinyint(1) unsigned DEFAULT '0',
  `istop` tinyint(1) unsigned DEFAULT '0',
  `letter` smallint(2) unsigned DEFAULT '0',
  `hashflag` tinyint(1) unsigned DEFAULT '0',
  `issystem` tinyint(1) unsigned DEFAULT '0',
  `first_fdeleted` tinyint(1) unsigned DEFAULT '0',
  `first_tdeleted` tinyint(1) unsigned DEFAULT '0',
  `sec_fdeleted` tinyint(1) unsigned DEFAULT '0',
  `sec_tdeleted` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`msgid`),
  KEY `fromuserid` (`fromuserid`),
  KEY `touserid` (`touserid`),
  KEY `flag` (`flag`),
  KEY `fromdeleted` (`fromdeleted`),
  KEY `todeleted` (`todeleted`),
  KEY `hashid` (`hashid`),
  KEY `first_fdeleted` (`first_fdeleted`),
  KEY `first_tdeleted` (`first_tdeleted`),
  KEY `sec_fdeleted` (`sec_fdeleted`),
  KEY `sec_tdeleted` (`sec_tdeleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}message_allow`;

CREATE TABLE `{dbpre}message_allow` (
  `allowid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `hashid` bigint(20) unsigned DEFAULT '0',
  PRIMARY KEY (`allowid`),
  KEY `hashid` (`hashid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}message_daysends`;

CREATE TABLE `{dbpre}message_daysends` (
  `sendid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `senduserid` int(10) unsigned DEFAULT '0',
  `touserid` int(10) unsigned DEFAULT '0',
  `msgid` bigint(10) unsigned DEFAULT '0',
  `tyear` smallint(2) unsigned DEFAULT '0',
  `tmonth` smallint(2) unsigned DEFAULT '0',
  `tday` smallint(2) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  `tosex` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`sendid`),
  KEY `senduserid` (`senduserid`),
  KEY `touserid` (`touserid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}message_dayviews`;

CREATE TABLE `{dbpre}message_dayviews` (
  `viewid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `readuserid` int(10) unsigned DEFAULT '0',
  `fromuserid` int(10) unsigned DEFAULT '0',
  `msgid` bigint(20) unsigned DEFAULT '0',
  `tyear` smallint(2) unsigned DEFAULT '0',
  `tmonth` smallint(2) unsigned DEFAULT '0',
  `tday` smallint(2) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  `fromsex` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`viewid`),
  KEY `readuserid` (`readuserid`),
  KEY `fromuserid` (`fromuserid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}message_hash`;

CREATE TABLE `{dbpre}message_hash` (
  `hashid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `firstuid` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`hashid`),
  KEY `firstuid` (`firstuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}myads`;

CREATE TABLE `{dbpre}myads` (
  `aid` mediumint(8) unsigned NOT NULL,
  `zoneid` mediumint(8) unsigned DEFAULT '0',
  `tagname` varchar(100) DEFAULT NULL,
  `adname` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` tinyint(1) unsigned DEFAULT '1',
  `orders` mediumint(8) unsigned DEFAULT '0',
  `timeset` tinyint(2) unsigned DEFAULT '0',
  `starttime` int(10) unsigned DEFAULT '0',
  `endtime` int(10) unsigned DEFAULT '0',
  `normbody` varchar(1000) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '0',
  `issystem` tinyint(1) unsigned DEFAULT '0',
  `templet` varchar(50) DEFAULT 'default',
  PRIMARY KEY (`aid`),
  KEY `zoneid` (`zoneid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}oauth`;

CREATE TABLE `{dbpre}oauth` (
  `authid` mediumint(8) unsigned NOT NULL,
  `authname` varchar(255) DEFAULT NULL,
  `intro` text,
  `appid` varchar(255) DEFAULT NULL,
  `appkey` varchar(255) DEFAULT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '0',
  `orders` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`authid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}oauth_user`;

CREATE TABLE `{dbpre}oauth_user` (
  `id` bigint(20) unsigned NOT NULL,
  `authmod` varchar(20) DEFAULT NULL,
  `oauthuid` varchar(100) DEFAULT NULL,
  `userid` int(10) unsigned DEFAULT '0',
  `addtime` int(10) unsigned DEFAULT '0',
  `lasttime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}options`;

CREATE TABLE `{dbpre}options` (
  `id` mediumint(8) unsigned NOT NULL,
  `optionname` varchar(255) DEFAULT NULL,
  `optionvalue` text,
  `optiondesc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}payment`;

CREATE TABLE `{dbpre}payment` (
  `mentid` mediumint(8) unsigned NOT NULL,
  `mentname` varchar(255) DEFAULT NULL,
  `menttype` tinyint(1) unsigned DEFAULT '1',
  `intro` text,
  `note` text,
  `pluginid` mediumint(8) unsigned DEFAULT '0',
  `authid` varchar(255) DEFAULT NULL,
  `privatekey` varchar(255) DEFAULT NULL,
  `authaccount` varchar(255) DEFAULT NULL,
  `poundagetype` tinyint(1) unsigned DEFAULT '0',
  `poundage` decimal(18,2) unsigned DEFAULT '0.00',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `orders` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`mentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}payment_log`;

CREATE TABLE `{dbpre}payment_log` (
  `paynum` bigint(20) unsigned NOT NULL DEFAULT '0',
  `paymentid` smallint(2) unsigned DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `addtime` int(10) unsigned DEFAULT '0',
  `amount` decimal(18,2) DEFAULT '0.00',
  `currency` varchar(20) DEFAULT NULL,
  `dealnum` varchar(50) DEFAULT NULL,
  `realamount` decimal(18,2) unsigned DEFAULT '0.00',
  `merchantfee` decimal(18,4) unsigned DEFAULT '0.0000',
  `paystatus` tinyint(2) unsigned DEFAULT '0',
  `notictime` int(10) unsigned DEFAULT '0',
  `errorcode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`paynum`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}payment_plugin`;

CREATE TABLE `{dbpre}payment_plugin` (
  `pluginid` mediumint(8) unsigned NOT NULL,
  `payname` varchar(255) DEFAULT NULL,
  `intro` text,
  `logo` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`pluginid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}promotion`;

CREATE TABLE `{dbpre}promotion` (
  `id` bigint(20) unsigned NOT NULL,
  `tuserid` int(10) unsigned DEFAULT '0',
  `ruserid` int(10) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `validmoney` decimal(18,2) unsigned DEFAULT '0.00',
  `validpoints` decimal(18,2) unsigned DEFAULT '0.00',
  `settleflag` tinyint(1) unsigned DEFAULT '0',
  `settleline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tuserid` (`tuserid`),
  KEY `ruserid` (`ruserid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}promotion_settle`;

CREATE TABLE `{dbpre}promotion_settle` (
  `id` bigint(20) unsigned NOT NULL,
  `tuserid` int(10) unsigned DEFAULT '0',
  `totalmoney` decimal(18,2) unsigned DEFAULT '0.00',
  `totalpoints` decimal(18,2) unsigned DEFAULT '0.00',
  `timeline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tuserid` (`tuserid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}seo`;

CREATE TABLE `{dbpre}seo` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `idmark` varchar(255) DEFAULT NULL,
  `chname` varchar(255) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `issystem` tinyint(1) unsigned DEFAULT '0',
  `url` varchar(500) DEFAULT NULL,
  `intro` varchar(500) DEFAULT NULL,
  `orders` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}single`;

CREATE TABLE `{dbpre}single` (
  `abid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` mediumint(8) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `intro` text,
  `content` text,
  `thumbfiles` varchar(255) DEFAULT NULL,
  `uploadfiles` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadescription` varchar(255) DEFAULT NULL,
  `navshow` tinyint(1) unsigned DEFAULT '0',
  `orders` smallint(2) unsigned DEFAULT '0',
  `linktype` tinyint(1) unsigned DEFAULT '1',
  `linkurl` varchar(255) DEFAULT NULL,
  `target` tinyint(1) unsigned DEFAULT '1',
  `tplname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`abid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}single_category`;

CREATE TABLE `{dbpre}single_category` (
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(255) DEFAULT NULL,
  `parentid` mediumint(8) unsigned DEFAULT '0',
  `depth` smallint(2) unsigned DEFAULT '0',
  `fontcolor` varchar(20) DEFAULT NULL,
  `orders` mediumint(8) unsigned DEFAULT '0',
  `intro` varchar(500) DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadescription` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `cssname` varchar(50) DEFAULT NULL,
  `target` tinyint(1) unsigned DEFAULT '1',
  `tplname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}sms_content`;

CREATE TABLE `{dbpre}sms_content` (
  `contentid` int(10) unsigned NOT NULL DEFAULT '0',
  `content` varchar(150) DEFAULT NULL,
  `createline` int(10) unsigned DEFAULT '0',
  `sqltemp` varchar(1000) DEFAULT NULL,
  `pagesize` smallint(2) unsigned DEFAULT '0',
  `refresh` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}sms_log`;

CREATE TABLE `{dbpre}sms_log` (
  `logid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` varchar(150) DEFAULT NULL,
  `userid` int(10) unsigned DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `sendtime` int(10) unsigned DEFAULT '0',
  `senduid` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `response` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`logid`),
  KEY `senduid` (`senduid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}sms_tpl`;

CREATE TABLE `{dbpre}sms_tpl` (
  `tplid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tplsort` varchar(50) DEFAULT NULL,
  `content` varchar(150) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `issystem` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`tplid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}system_content`;

CREATE TABLE `{dbpre}system_content` (
  `contentid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `createline` int(10) unsigned DEFAULT '0',
  `senduser` varchar(50) DEFAULT NULL,
  `sqltemp` varchar(1000) DEFAULT NULL,
  `pagesize` smallint(2) unsigned DEFAULT '0',
  `refresh` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}system_msg`;

CREATE TABLE `{dbpre}system_msg` (
  `msgid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `contentid` bigint(20) unsigned DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `sendtime` int(10) unsigned DEFAULT '0',
  `readflag` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`msgid`),
  KEY `contentid` (`contentid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user`;

CREATE TABLE `oepre_user` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `groupid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `salt` varchar(10) DEFAULT NULL,
  `points` decimal(18,2) unsigned NOT NULL DEFAULT '0.00',
  `money` decimal(18,2) unsigned NOT NULL DEFAULT '0.00',
  `mbsms` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `avatar` varchar(200) DEFAULT NULL,
  `avatarflag` tinyint(1) DEFAULT '0',
  `avatartime` int(10) unsigned DEFAULT '0',
  `integrity` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`userid`),
  KEY `gender` (`gender`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `avatarflag` (`avatarflag`),
  KEY `avatartime` (`avatartime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_attr`;

CREATE TABLE `{dbpre}user_attr` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `privacy` tinyint(1) unsigned DEFAULT '0',
  `realname` varchar(30) DEFAULT NULL,
  `idnumber` varchar(30) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `msn` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `recall` tinyint(1) unsigned DEFAULT '1',
  `attrs` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_certify`;

CREATE TABLE `{dbpre}user_certify` (
  `certifyid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `certifytype` smallint(2) unsigned DEFAULT '0',
  `rztype` smallint(2) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `uploadfiles` varchar(255) DEFAULT NULL,
  `thumbfiles` varchar(255) DEFAULT NULL,
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`certifyid`),
  KEY `userid` (`userid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_cond`;

CREATE TABLE `{dbpre}user_cond` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) unsigned DEFAULT '0',
  `startage` smallint(2) unsigned DEFAULT '0',
  `endage` smallint(2) unsigned DEFAULT '0',
  `startheight` smallint(2) unsigned DEFAULT '0',
  `endheight` smallint(2) unsigned DEFAULT '0',
  `marry` varchar(50) DEFAULT NULL,
  `lovesort` varchar(50) DEFAULT NULL,
  `startedu` smallint(2) unsigned DEFAULT '0',
  `endedu` smallint(2) unsigned DEFAULT '0',
  `setarea` varchar(500) DEFAULT NULL,
  `areas` varchar(50) DEFAULT NULL,
  `avatar` tinyint(1) unsigned DEFAULT '0',
  `star` smallint(2) unsigned DEFAULT '0',
  `starup` tinyint(1) unsigned DEFAULT '0',
  `musttype` tinyint(1) unsigned DEFAULT '0',
  `mustcond` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_group`;

CREATE TABLE `{dbpre}user_group` (
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `groupname` varchar(50) DEFAULT NULL,
  `orders` smallint(2) unsigned DEFAULT '0',
  `showimg` tinyint(1) unsigned DEFAULT '0',
  `maleimg` varchar(255) DEFAULT NULL,
  `femaleimg` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `regpoints` decimal(18,2) unsigned DEFAULT '0.00',
  `regmoney` decimal(18,2) unsigned DEFAULT '0.00',
  `loginpoints` decimal(18,2) unsigned DEFAULT '0.00',
  `issystem` tinyint(1) unsigned DEFAULT '0',
  `commersetting` text,
  `msgsetting` varchar(500) DEFAULT NULL,
  `viewsetting` varchar(500) DEFAULT NULL,
  `photosetting` varchar(500) DEFAULT NULL,
  `friendsetting` varchar(500) DEFAULT NULL,
  `publishsetting` varchar(500) DEFAULT NULL,
  `feesetting` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_logins`;

CREATE TABLE `{dbpre}user_logins` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `logindate` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_match`;

CREATE TABLE `{dbpre}user_match` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `users` text,
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_mbsms`;

CREATE TABLE `{dbpre}user_mbsms` (
  `actionid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` mediumint(8) NOT NULL DEFAULT '0',
  `actiontype` tinyint(1) unsigned DEFAULT '0',
  `logcontent` varchar(500) DEFAULT NULL,
  `actiondate` date DEFAULT NULL,
  `tyear` smallint(2) DEFAULT '0',
  `tmonth` smallint(2) DEFAULT '0',
  `tweek` smallint(2) DEFAULT '0',
  `tday` smallint(2) DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  `opuser` varchar(50) DEFAULT NULL,
  `optime` int(10) unsigned DEFAULT '0',
  `relnum` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`actionid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_money`;

CREATE TABLE `{dbpre}user_money` (
  `actionid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `amount` decimal(18,2) unsigned DEFAULT '0.00',
  `actiontype` tinyint(1) unsigned DEFAULT '0',
  `logcontent` varchar(500) DEFAULT NULL,
  `actiondate` date DEFAULT NULL,
  `tyear` smallint(2) unsigned DEFAULT '0',
  `tmonth` smallint(2) unsigned DEFAULT '0',
  `tweek` smallint(2) unsigned DEFAULT '0',
  `tday` smallint(2) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT NULL,
  `opuser` varchar(50) DEFAULT NULL,
  `optime` int(10) unsigned DEFAULT '0',
  `ordernum` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`actionid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_online`;

CREATE TABLE `{dbpre}user_online` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` int(10) unsigned DEFAULT '0',
  `isonline` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_params`;

CREATE TABLE `{dbpre}user_params` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `lovestatus` tinyint(1) unsigned DEFAULT '1',
  `avatar` tinyint(1) DEFAULT '0',
  `monolog` tinyint(1) DEFAULT '0',
  `ageyear` smallint(2) unsigned DEFAULT '0',
  `provinceid` smallint(2) unsigned DEFAULT '0',
  `cityid` smallint(2) unsigned DEFAULT '0',
  `distid` smallint(2) unsigned DEFAULT '0',
  `groupid` tinyint(2) unsigned DEFAULT '0',
  `height` smallint(2) unsigned DEFAULT '0',
  `weight` tinyint(2) unsigned DEFAULT '0',
  `salary` tinyint(2) unsigned DEFAULT '0',
  `education` tinyint(2) unsigned DEFAULT '0',
  `marry` tinyint(2) unsigned DEFAULT '0',
  `lovesort` tinyint(2) unsigned DEFAULT '0',
  `child` tinyint(2) unsigned DEFAULT '0',
  `house` tinyint(2) unsigned DEFAULT '0',
  `car` tinyint(2) unsigned DEFAULT '0',
  `jobs` smallint(2) unsigned DEFAULT '0',
  `lunar` tinyint(2) unsigned DEFAULT '0',
  `astro` tinyint(2) unsigned DEFAULT '0',
  `star` tinyint(2) unsigned DEFAULT '0',
  `rzemail` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rzmobile` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rzidnumber` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rzvideo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned DEFAULT '0',
  `ontime` int(10) unsigned DEFAULT '0',
  `elite` tinyint(1) unsigned DEFAULT '0',
  `liehun` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `flag` (`flag`),
  KEY `lovestatus` (`lovestatus`),
  KEY `gender` (`gender`),
  KEY `groupid` (`groupid`),
  KEY `addtime` (`addtime`),
  KEY `ontime` (`ontime`),
  KEY `elite` (`elite`),
  KEY `liehun` (`liehun`),
  KEY `jobs` (`jobs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_photo`;

CREATE TABLE `{dbpre}user_photo` (
  `photoid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `uploadfiles` varchar(255) DEFAULT NULL,
  `thumbfiles` varchar(255) DEFAULT NULL,
  `timeline` int(10) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `elite` tinyint(1) unsigned DEFAULT '0',
  `istop` tinyint(1) unsigned DEFAULT '0',
  `hits` int(10) unsigned DEFAULT '0',
  `phototype` tinyint(1) unsigned DEFAULT '0',
  `intro` varchar(500) DEFAULT NULL,
  `auditremark` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`photoid`),
  KEY `userid` (`userid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_points`;

CREATE TABLE `{dbpre}user_points` (
  `actionid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `points` decimal(18,2) unsigned DEFAULT '0.00',
  `actiontype` tinyint(1) unsigned DEFAULT '0',
  `logcontent` varchar(500) DEFAULT NULL,
  `actiondate` date DEFAULT NULL,
  `tyear` smallint(2) unsigned DEFAULT '0',
  `tmonth` smallint(2) unsigned DEFAULT '0',
  `tweek` smallint(2) unsigned DEFAULT '0',
  `tday` smallint(2) unsigned DEFAULT '0',
  `timeline` int(10) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  `opuser` varchar(50) DEFAULT NULL,
  `optime` int(10) unsigned DEFAULT '0',
  `ordernum` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`actionid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_profile`;

CREATE TABLE `{dbpre}user_profile` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `provinceid` smallint(4) unsigned DEFAULT '0',
  `cityid` smallint(4) unsigned DEFAULT '0',
  `distid` smallint(4) unsigned DEFAULT '0',
  `communityid` smallint(4) unsigned DEFAULT '0',
  `lovesort` smallint(2) unsigned DEFAULT '0',
  `ageyear` smallint(2) unsigned DEFAULT '0',
  `agemonth` smallint(2) unsigned DEFAULT '0',
  `ageday` smallint(2) unsigned DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `birthdaylock` tinyint(1) unsigned DEFAULT '0',
  `astro` varchar(10) DEFAULT NULL,
  `lunar` varchar(10) DEFAULT NULL,
  `marrystatus` smallint(2) unsigned DEFAULT '0',
  `blood` smallint(2) unsigned DEFAULT '0',
  `childrenstatus` smallint(2) unsigned DEFAULT '0',
  `education` smallint(2) unsigned DEFAULT '0',
  `height` smallint(2) unsigned DEFAULT '0',
  `national` smallint(2) unsigned DEFAULT '0',
  `jobs` smallint(2) unsigned DEFAULT '0',
  `salary` smallint(2) unsigned DEFAULT '0',
  `housing` smallint(2) unsigned DEFAULT '0',
  `school` varchar(100) DEFAULT NULL,
  `schoolyear` varchar(20) DEFAULT NULL,
  `specialty` smallint(2) unsigned DEFAULT '0',
  `personality` smallint(2) unsigned DEFAULT '0',
  `weight` smallint(2) unsigned DEFAULT '0',
  `profile` smallint(2) unsigned DEFAULT '0',
  `charmparts` smallint(2) unsigned DEFAULT '0',
  `hairstyle` smallint(2) unsigned DEFAULT '0',
  `haircolor` smallint(2) unsigned DEFAULT '0',
  `facestyle` smallint(2) unsigned DEFAULT '0',
  `bodystyle` smallint(2) unsigned DEFAULT '0',
  `companytype` smallint(2) unsigned DEFAULT '0',
  `income` smallint(2) unsigned DEFAULT '0',
  `companyname` varchar(150) DEFAULT NULL,
  `workstatus` smallint(2) unsigned DEFAULT '0',
  `nationality` smallint(2) unsigned DEFAULT '0',
  `nationprovinceid` smallint(2) unsigned DEFAULT '0',
  `nationcityid` smallint(2) unsigned DEFAULT '0',
  `beforeregion` smallint(2) unsigned DEFAULT '0',
  `caring` smallint(2) unsigned DEFAULT '0',
  `consume` smallint(2) unsigned DEFAULT '0',
  `tophome` smallint(2) unsigned DEFAULT '0',
  `smoking` smallint(2) unsigned DEFAULT '0',
  `drinking` smallint(2) unsigned DEFAULT '0',
  `language` varchar(30) DEFAULT NULL,
  `faith` smallint(2) unsigned DEFAULT '0',
  `workout` smallint(2) unsigned DEFAULT '0',
  `rest` smallint(2) unsigned DEFAULT '0',
  `leisure` varchar(30) DEFAULT NULL,
  `lifeskill` varchar(30) DEFAULT NULL,
  `talive` smallint(2) unsigned DEFAULT '0',
  `havechildren` smallint(2) unsigned DEFAULT '0',
  `romantic` smallint(2) unsigned DEFAULT '0',
  `interest` varchar(30) DEFAULT NULL,
  `attention` varchar(30) DEFAULT NULL,
  `food` varchar(30) DEFAULT NULL,
  `sports` varchar(30) DEFAULT NULL,
  `film` varchar(30) DEFAULT NULL,
  `travel` varchar(30) DEFAULT NULL,
  `book` varchar(30) DEFAULT NULL,
  `monolog` varchar(4000) DEFAULT NULL,
  `molstatus` tinyint(1) DEFAULT '0',
  `moluptime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `molstatus` (`molstatus`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_status`;

CREATE TABLE `{dbpre}user_status` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `regtime` int(10) unsigned DEFAULT '0',
  `regip` varchar(20) DEFAULT NULL,
  `logintime` int(10) unsigned DEFAULT '0',
  `logintimes` int(10) unsigned DEFAULT '0',
  `loginip` varchar(20) DEFAULT NULL,
  `flag` tinyint(1) unsigned DEFAULT '0',
  `hits` bigint(20) unsigned DEFAULT '0',
  `lovestatus` tinyint(1) unsigned DEFAULT '1',
  `avatarrz` tinyint(1) unsigned DEFAULT '0',
  `agerz` tinyint(1) unsigned DEFAULT '0',
  `heightrz` tinyint(1) unsigned DEFAULT '0',
  `marryrz` tinyint(1) unsigned DEFAULT '0',
  `incomerz` tinyint(1) unsigned DEFAULT '0',
  `educationrz` tinyint(1) unsigned DEFAULT '0',
  `houserz` tinyint(1) unsigned DEFAULT '0',
  `carrz` tinyint(1) unsigned DEFAULT '0',
  `emailrz` tinyint(1) unsigned DEFAULT '0',
  `emailsalt` varchar(10) DEFAULT NULL,
  `mobilerz` tinyint(1) unsigned DEFAULT '0',
  `mobilesalt` varchar(10) DEFAULT NULL,
  `idnumberrz` tinyint(1) unsigned DEFAULT '0',
  `videorz` tinyint(1) unsigned DEFAULT '0',
  `star` smallint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `zhstatus` (`flag`,`lovestatus`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_validate`;

CREATE TABLE `{dbpre}user_validate` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `viplevel` smallint(2) unsigned DEFAULT '0',
  `vipforever` tinyint(1) unsigned DEFAULT '0',
  `vipstartdate` int(10) DEFAULT '0',
  `vipenddate` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `viplevel` (`viplevel`),
  KEY `vipenddate` (`vipenddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_videorz`;

CREATE TABLE `{dbpre}user_videorz` (
  `vdid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `vdtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vdurl` varchar(255) DEFAULT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vdid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}user_viprecord`;

CREATE TABLE `{dbpre}user_viprecord` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `viplevel` smallint(2) unsigned DEFAULT '0',
  `startdate` int(10) unsigned DEFAULT '0',
  `enddate` int(10) unsigned DEFAULT '0',
  `logcontent` varchar(500) DEFAULT NULL,
  `dateline` int(10) unsigned DEFAULT NULL,
  `actionuser` varchar(50) DEFAULT NULL,
  `moneytype` tinyint(1) unsigned DEFAULT '0',
  `money` decimal(18,2) unsigned DEFAULT '0.00',
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}weibo`;

CREATE TABLE `{dbpre}weibo` (
  `wbid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `content` varchar(1000) DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT '0',
  `wbtype` varchar(30) DEFAULT NULL,
  `relid` bigint(20) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`wbid`),
  KEY `flag` (`flag`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}weibo_comment`;

CREATE TABLE `{dbpre}weibo_comment` (
  `cmid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `wbid` bigint(20) unsigned DEFAULT '0',
  `rootid` bigint(20) unsigned DEFAULT '0',
  `cmuserid` int(10) unsigned DEFAULT '0',
  `cmcontent` varchar(1000) DEFAULT NULL,
  `cmtime` int(10) unsigned DEFAULT '0',
  `cmflag` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`cmid`),
  KEY `wbid` (`wbid`),
  KEY `cmuserid` (`cmuserid`),
  KEY `rootid` (`rootid`),
  KEY `cmflag` (`cmflag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `{dbpre}zone`;

CREATE TABLE `{dbpre}zone` (
  `zoneid` mediumint(8) unsigned NOT NULL,
  `zonename` varchar(100) DEFAULT NULL,
  `idmark` varchar(100) DEFAULT NULL,
  `sort` varchar(10) DEFAULT NULL,
  `zonewidth` smallint(2) unsigned DEFAULT '0',
  `zoneheight` smallint(2) unsigned DEFAULT '0',
  `flag` tinyint(1) unsigned DEFAULT '0',
  `issystem` tinyint(1) unsigned DEFAULT '0',
  `templet` varchar(50) DEFAULT 'default',
  PRIMARY KEY (`zoneid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{dbpre}mobile_checkcode`;

CREATE TABLE `{dbpre}mobile_checkcode` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `checkcode` varchar(20) DEFAULT NULL,
  `createtime` int(10) unsigned DEFAULT '0',
  `updatetime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;