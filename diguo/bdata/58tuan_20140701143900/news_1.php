<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `news`;");
E_C("CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `detail` text,
  `begin_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>