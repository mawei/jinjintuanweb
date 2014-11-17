<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `feedback`;");
E_C("CREATE TABLE `feedback` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `category` enum('suggest','seller') NOT NULL DEFAULT 'suggest',
  `title` varchar(128) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `content` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
E_D("replace into `feedback` values('1','1','1','seller','1','1','1','1369869557');");
E_D("replace into `feedback` values('20','1','1','suggest','liuyanleft321','liuyanleft@163.com','我想问问台儿庄门票怎么给我？你们怎么没个什么客服好问啊，写的也太简单了吧，qq：1952154348','1371087230');");

require("../../inc/footer.php");
?>