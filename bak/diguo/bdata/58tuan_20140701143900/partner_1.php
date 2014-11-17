<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `partner`;");
E_C("CREATE TABLE `partner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `homepage` varchar(128) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bank_name` varchar(128) DEFAULT NULL,
  `bank_no` varchar(128) DEFAULT NULL,
  `bank_user` varchar(128) DEFAULT NULL,
  `location` text NOT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `image1` varchar(128) DEFAULT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `other` text,
  `mobile` varchar(12) DEFAULT NULL,
  `open` enum('Y','N') NOT NULL DEFAULT 'N',
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `head` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `longlat` varchar(255) DEFAULT NULL,
  `display` enum('Y','N') NOT NULL DEFAULT 'Y',
  `comment_good` int(11) NOT NULL DEFAULT '0',
  `comment_none` int(11) NOT NULL DEFAULT '0',
  `comment_bad` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_ct` (`city_id`,`title`),
  UNIQUE KEY `UNQ_u` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8");
E_D("replace into `partner` values('16','江苏宽带网','e7fe8b88db51d86ef2f5e169144b9c1b','江苏宽带网','0','http://www.0510.in/','51','','','','乘坐12路公交直达','张建','team/2013/1008/13812225466041.jpg','team/2013/1008/13812225462115.jpg','team/2013/1008/13812225466014.jpg','400-800-5823','中国江苏无锡市哥伦布广场A座1202室','中国江苏无锡市哥伦布广场A座1202室123','13328100003','Y','Y','0','1','1381222546','39.916771,116.365481','Y','4','0','0');");
E_D("replace into `partner` values('17','商户测试','e7fe8b88db51d86ef2f5e169144b9c1b','商户测试','0','http://www.0510.in','51','','','','乘坐80路直达','张建','team/2013/1008/13812463643627.jpg',NULL,NULL,'400-800-5823','无锡市新区','','13328100003','Y','Y','0','1','1381246364','39.932928,116.28413','Y','0','0','0');");

require("../../inc/footer.php");
?>