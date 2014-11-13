<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `credit`;");
E_C("CREATE TABLE `credit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `detail_id` varchar(32) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `score` double(10,2) NOT NULL DEFAULT '0.00',
  `action` varchar(16) NOT NULL DEFAULT 'buy',
  `rname` varchar(32) DEFAULT NULL,
  `rmobile` varchar(32) DEFAULT NULL,
  `rcode` char(6) DEFAULT NULL,
  `raddress` varchar(128) DEFAULT NULL,
  `send_time` int(10) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `state` enum('unpay','pay') NOT NULL DEFAULT 'unpay',
  `remark` text,
  `op_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8");
E_D("replace into `credit` values('1','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1369738946','unpay',NULL,'0');");
E_D("replace into `credit` values('2','14','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1370577015','unpay',NULL,'0');");
E_D("replace into `credit` values('3','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1370962689','unpay',NULL,'0');");
E_D("replace into `credit` values('4','6','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1370963477','unpay',NULL,'0');");
E_D("replace into `credit` values('5','30','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371014492','unpay',NULL,'0');");
E_D("replace into `credit` values('6','33','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371104172','unpay',NULL,'0');");
E_D("replace into `credit` values('7','13','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371121060','unpay',NULL,'0');");
E_D("replace into `credit` values('8','29','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371121256','unpay',NULL,'0');");
E_D("replace into `credit` values('9','11','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371121687','unpay',NULL,'0');");
E_D("replace into `credit` values('10','11','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371121714','unpay',NULL,'0');");
E_D("replace into `credit` values('11','43','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371434393','unpay',NULL,'0');");
E_D("replace into `credit` values('12','43','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1371434745','unpay',NULL,'0');");
E_D("replace into `credit` values('13','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1381220821','unpay',NULL,'0');");
E_D("replace into `credit` values('14','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1381226468','unpay',NULL,'0');");
E_D("replace into `credit` values('15','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1381226512','unpay',NULL,'0');");
E_D("replace into `credit` values('16','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1381226520','unpay',NULL,'0');");
E_D("replace into `credit` values('17','1','0','0',NULL,'5.00','comment',NULL,NULL,NULL,NULL,NULL,'1381226575','unpay',NULL,'0');");

require("../../inc/footer.php");
?>