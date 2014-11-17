<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `user`;");
E_C("CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
  `alipay_id` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `newbie` enum('Y','N') NOT NULL DEFAULT 'Y',
  `mobile` varchar(16) DEFAULT NULL,
  `qq` varchar(16) DEFAULT NULL,
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `score` int(11) NOT NULL DEFAULT '0',
  `zipcode` char(6) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `emailable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `manager` enum('Y','N') NOT NULL DEFAULT 'N',
  `secret` varchar(32) DEFAULT NULL,
  `recode` varchar(32) DEFAULT NULL,
  `sns` varchar(64) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `mobilecode` char(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_name` (`username`),
  UNIQUE KEY `UNQ_e` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8");
E_D("replace into `user` values('1','88888888@qq.com','admin','',NULL,'598e9961dadbc9c1df4fa728142b7f72',NULL,'M','N','13888888888','123456','8.60','35','','','0','Y','Y','Y','',NULL,NULL,'222.134.173.197','1368370981','1368370981',NULL);");

require("../../inc/footer.php");
?>