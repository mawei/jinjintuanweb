<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `pay`;");
E_C("CREATE TABLE `pay` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `vid` varchar(32) DEFAULT NULL,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bank` varchar(32) DEFAULT NULL,
  `money` double(10,2) DEFAULT NULL,
  `currency` enum('CNY','USD') NOT NULL DEFAULT 'CNY',
  `service` varchar(16) NOT NULL DEFAULT 'alipay',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_o` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `pay` values('go-70-2-meni','2013061640461391','70','支付宝','17.80','CNY','alipay','1371344195');");
E_D("replace into `pay` values('go-69-2-pdxt','2013061638764930','69','支付宝','17.80','CNY','alipay','1371371988');");

require("../../inc/footer.php");
?>