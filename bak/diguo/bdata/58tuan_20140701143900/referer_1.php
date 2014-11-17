<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `referer`;");
E_C("CREATE TABLE `referer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `order_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL COMMENT '??id',
  `referer` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT '??',
  `create_time` int(10) unsigned NOT NULL COMMENT '????',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_o` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='??'");
E_D("replace into `referer` values('76','76','1','http://127.0.0.1/moban/manage/team/index.php','1376323794');");
E_D("replace into `referer` values('77','77','1','http://127.0.0.1/moban/manage/team/index.php','1376323848');");
E_D("replace into `referer` values('78','78','1','http://127.0.0.1/moban/account/login.php','1376323960');");
E_D("replace into `referer` values('79','79','1','http://127.0.0.1/moban/account/login.php','1376324036');");
E_D("replace into `referer` values('80','80','1','http://www.0515.in/','1381226551');");

require("../../inc/footer.php");
?>