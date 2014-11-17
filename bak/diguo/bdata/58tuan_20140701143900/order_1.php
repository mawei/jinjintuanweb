<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `order`;");
E_C("CREATE TABLE `order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pay_id` varchar(32) DEFAULT NULL,
  `buy_id` int(11) NOT NULL DEFAULT '0',
  `service` varchar(16) NOT NULL DEFAULT 'alipay',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` varchar(16) DEFAULT NULL,
  `state` enum('unpay','pay') NOT NULL DEFAULT 'unpay',
  `trade_no` varchar(32) DEFAULT NULL,
  `allowrefund` enum('Y','N') NOT NULL DEFAULT 'N',
  `rstate` enum('normal','askrefund','berefund','norefund') NOT NULL DEFAULT 'normal',
  `rereason` text,
  `retime` int(11) DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `realname` varchar(32) DEFAULT NULL,
  `mobile` varchar(128) DEFAULT NULL,
  `zipcode` char(6) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `express` enum('Y','N') NOT NULL DEFAULT 'Y',
  `express_xx` varchar(128) DEFAULT NULL,
  `express_id` int(10) unsigned NOT NULL DEFAULT '0',
  `express_no` varchar(32) DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `origin` double(10,2) NOT NULL DEFAULT '0.00',
  `credit` double(10,2) NOT NULL DEFAULT '0.00',
  `card` double(10,2) NOT NULL DEFAULT '0.00',
  `fare` double(10,2) NOT NULL DEFAULT '0.00',
  `condbuy` varchar(128) DEFAULT NULL,
  `remark` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0',
  `comment_content` text,
  `comment_display` enum('Y','N') NOT NULL DEFAULT 'Y',
  `comment_grade` enum('good','none','bad') NOT NULL DEFAULT 'good',
  `comment_wantmore` enum('Y','N') DEFAULT NULL,
  `comment_time` int(11) DEFAULT NULL,
  `partner_id` int(11) NOT NULL DEFAULT '0',
  `sms_express` enum('Y','N') NOT NULL DEFAULT 'N',
  `luky_id` int(11) NOT NULL DEFAULT '0',
  `adminremark` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_p` (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8");
E_D("replace into `order` values('76','go-76-1-axft','1','cash','1','0','42','1',NULL,'unpay',NULL,'Y','berefund',NULL,NULL,'1','admin','18763251122','272200','sadasdasdas','Y','只工作日送货(双休日、假日不用送，写字楼/商用地址客户请选择)','40','','24.00','0.00','25.00','25.00','0.00','1.00',NULL,'','1376323794','1376323800','不错的','Y','good','Y','1381220821','0','N','142445',NULL);");
E_D("replace into `order` values('77','go-77-1-jrth','2','cash','1','0','42','1',NULL,'unpay',NULL,'Y','berefund',NULL,NULL,'1','admin','18763251122','272200','asdadas','Y','只工作日送货(双休日、假日不用送，写字楼/商用地址客户请选择)','40','','24.00','0.00','25.00','25.00','0.00','1.00',NULL,'','1376323848','1376323856','不错的','Y','good','Y','1381226468','16','N','167690',NULL);");
E_D("replace into `order` values('78','go-78-1-tlpg','4','hdfk','1','1','42','1',NULL,'pay',NULL,'Y','normal',NULL,NULL,'1','admin','asdasda','asdasd','asdasdasd','Y','只工作日送货(双休日、假日不用送，写字楼/商用地址客户请选择)','40',NULL,'24.00','25.00','25.00','0.00','0.00','1.00',NULL,'','1376323993','1381226500','不错的额','Y','good','Y','1381226512','16','N','196752',NULL);");
E_D("replace into `order` values('79','go-79-1-wfoq','3','hdfk','1','1','42','1',NULL,'pay',NULL,'Y','normal',NULL,NULL,'1','admin','adadad','asdasd','asdasd','Y','只工作日送货(双休日、假日不用送，写字楼/商用地址客户请选择)','40',NULL,'24.00','25.00','25.00','0.00','0.00','1.00',NULL,'','1376541804','1381226498','不错的','Y','good','Y','1381226520','16','N','141565',NULL);");
E_D("replace into `order` values('80','go-80-1-qmws','1','cash','1','0','46','0',NULL,'unpay',NULL,'Y','berefund',NULL,NULL,'1',NULL,'13328100003',NULL,NULL,'N',NULL,'0','','8.90','0.00','8.90','8.90','0.00','0.00',NULL,'','1381226551','1381226555','不错的','Y','good','Y','1381226575','16','N','138848',NULL);");

require("../../inc/footer.php");
?>