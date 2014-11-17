<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `adinfo`;");
E_C("CREATE TABLE `adinfo` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` varchar(60) CHARACTER SET utf8 NOT NULL,
  `link` char(120) CHARACTER SET utf8 DEFAULT NULL,
  `displayorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1");
E_D("replace into `adinfo` values('1','1','????1','ad/2013/0815/13765413048947.jpg','www.moyou.cc','0');");
E_D("replace into `adinfo` values('2','1','??','ad/2013/0815/13765416913114.jpg','www.moyou.cc','1');");
E_D("replace into `adinfo` values('3','1','??2','ad/2013/1008/13812262892376.jpg','#','0');");
E_D("replace into `adinfo` values('4','0','??4','ad/2013/1008/13812299343707.jpg','#','0');");

require("../../inc/footer.php");
?>