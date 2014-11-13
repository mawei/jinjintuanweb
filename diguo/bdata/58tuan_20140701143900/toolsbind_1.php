<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `toolsbind`;");
E_C("CREATE TABLE `toolsbind` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `tools` varchar(16) NOT NULL,
  `secret` varchar(16) DEFAULT NULL,
  `enable` enum('Y','N') NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `toolsbind` values('1','30','18763284433','468536','Y','1371014899');");

require("../../inc/footer.php");
?>