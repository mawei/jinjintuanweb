<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `daysign`;");
E_C("CREATE TABLE `daysign` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `credit` double(10,2) DEFAULT '0.00',
  `money` double(10,2) DEFAULT '0.00',
  `create_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `daysign` values('1','1','0.00','0.10','1370707200');");
E_D("replace into `daysign` values('2','25','0.00','0.10','1370707200');");
E_D("replace into `daysign` values('3','1','0.00','0.10','1370793600');");
E_D("replace into `daysign` values('4','1','0.00','0.10','1381161600');");

require("../../inc/footer.php");
?>