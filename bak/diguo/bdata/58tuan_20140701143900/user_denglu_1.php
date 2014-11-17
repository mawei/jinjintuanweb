<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `user_denglu`;");
E_C("CREATE TABLE `user_denglu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `mediaUserID` int(11) NOT NULL,
  `mediaID` tinyint(1) NOT NULL,
  `screenName` char(250) NOT NULL,
  `createtime` bigint(20) DEFAULT NULL,
  `tag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mediaUserID` (`mediaUserID`),
  KEY `uid` (`uid`),
  KEY `mediaID` (`mediaID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `user_denglu` values('1','45','29425892','13','进修','1379657944','1');");

require("../../inc/footer.php");
?>