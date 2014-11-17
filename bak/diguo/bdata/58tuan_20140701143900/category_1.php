<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `category`;");
E_C("CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zone` varchar(16) DEFAULT NULL,
  `czone` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `ename` varchar(16) DEFAULT NULL,
  `letter` char(1) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `display` enum('Y','N') NOT NULL DEFAULT 'Y',
  `relate_data` text,
  `fid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_zne` (`zone`,`name`,`ename`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8");
E_D("replace into `category` values('45','city','江苏','金坛','jintan','J','0','Y',NULL,'0');");
E_D("replace into `category` values('2','group',NULL,'餐饮美食','canyinmeishi','C','9','Y',NULL,'0');");
E_D("replace into `category` values('3','group',NULL,'休闲娱乐','xiuxianyule','X','8','Y',NULL,'0');");
E_D("replace into `category` values('4','group',NULL,'酒店住宿','jiudianzhusu','J','7','Y',NULL,'0');");
E_D("replace into `category` values('5','group',NULL,'美容丽人','meirongliren','M','6','Y',NULL,'0');");
E_D("replace into `category` values('6','group',NULL,'生活服务','shenghuofuwu','S','5','Y',NULL,'0');");
E_D("replace into `category` values('7','group',NULL,'枣庄团购','zaozhuangtuangou','Z','4','Y',NULL,'0');");
E_D("replace into `category` values('8','group',NULL,'电器数码','dianqishuma','D','3','Y',NULL,'0');");
E_D("replace into `category` values('9','group',NULL,'网游虚拟','wangyouxuni','W','2','Y',NULL,'0');");
E_D("replace into `category` values('10','group',NULL,'腾讯相关','tengxunxiangguan','T','1','Y',NULL,'9');");
E_D("replace into `category` values('11','group',NULL,'火锅','huoguo','H','0','Y',NULL,'2');");
E_D("replace into `category` values('12','group',NULL,'自助餐','zizhu','Z','0','Y',NULL,'2');");
E_D("replace into `category` values('13','group',NULL,'烧烤','shaokao','S','0','Y',NULL,'2');");
E_D("replace into `category` values('14','group',NULL,'地方菜','difangcai','D','0','Y',NULL,'2');");
E_D("replace into `category` values('15','group',NULL,'糕点','gaodian','G','0','Y',NULL,'2');");
E_D("replace into `category` values('16','group',NULL,'其他','qita','Q','0','Y',NULL,'2');");
E_D("replace into `category` values('17','group',NULL,'电影','dianying','D','0','Y',NULL,'3');");
E_D("replace into `category` values('18','group',NULL,'洗浴','xiyu','X','0','Y',NULL,'3');");
E_D("replace into `category` values('19','group',NULL,'运动健身','yundong','Y','0','Y',NULL,'3');");
E_D("replace into `category` values('20','group',NULL,'游乐电玩','youle','Y','0','Y',NULL,'3');");
E_D("replace into `category` values('21','group',NULL,'足疗按摩','zuliao','Z','0','Y',NULL,'3');");
E_D("replace into `category` values('22','group',NULL,'其他','qitaa','Q','0','Y',NULL,'3');");
E_D("replace into `category` values('23','group',NULL,'写真','xiezhen','X','0','Y',NULL,'6');");
E_D("replace into `category` values('24','group',NULL,'儿童摄影','sheying','E','0','Y',NULL,'6');");
E_D("replace into `category` values('25','group',NULL,'汽车养护','qiche','Q','0','Y',NULL,'6');");
E_D("replace into `category` values('26','group',NULL,'教育培训','jiaoyu','J','0','Y',NULL,'6');");
E_D("replace into `category` values('27','group',NULL,'其他','qitaf','Q','0','Y',NULL,'6');");
E_D("replace into `category` values('28','group',NULL,'美发','meifa','M','0','Y',NULL,'5');");
E_D("replace into `category` values('29','group',NULL,'美甲','meijia','M','0','Y',NULL,'5');");
E_D("replace into `category` values('30','group',NULL,'美容美体','meirong','M','0','Y',NULL,'5');");
E_D("replace into `category` values('31','group',NULL,'话费充值','huaf','H','0','Y',NULL,'9');");
E_D("replace into `category` values('32','group',NULL,'旅游出行','lvyou','L','0','Y',NULL,'0');");
E_D("replace into `category` values('48','area',NULL,'天宁区','tianning','T','0','Y',NULL,'42');");
E_D("replace into `category` values('49','area',NULL,'钟楼区','zhonlou','Z','0','Y',NULL,'42');");
E_D("replace into `category` values('50','area',NULL,'戚墅堰','qishuyan','Q','0','Y',NULL,'42');");
E_D("replace into `category` values('51','city','江苏','无锡','wuxi','W','0','Y',NULL,'0');");
E_D("replace into `category` values('52','city','江苏','江阴','jiangyin','J','0','Y',NULL,'0');");
E_D("replace into `category` values('39','group',NULL,'KTV','ktv','K','0','Y',NULL,'3');");
E_D("replace into `category` values('40','express','','城客团配送','chegnke','C','0','Y','1','0');");
E_D("replace into `category` values('41','grade','会员','初级会员','chuji','C','0','Y',NULL,'0');");
E_D("replace into `category` values('42','city','江苏','常州','changzhou','C','0','Y',NULL,'0');");
E_D("replace into `category` values('47','area',NULL,'新北区','xinbei','X','0','Y',NULL,'42');");
E_D("replace into `category` values('46','city','江苏','溧阳','liyang','L','0','Y',NULL,'0');");
E_D("replace into `category` values('53','city','江苏','宜兴','yixing','Y','0','Y',NULL,'0');");
E_D("replace into `category` values('54','area',NULL,'北塘区','beitang','B','0','Y',NULL,'51');");
E_D("replace into `category` values('55','area',NULL,'南长区','nanchang','N','0','Y',NULL,'51');");
E_D("replace into `category` values('56','area',NULL,'惠山区','huishan','H','0','Y',NULL,'51');");
E_D("replace into `category` values('57','area',NULL,'滨湖区','binhuqu','B','0','Y',NULL,'51');");
E_D("replace into `category` values('58','area',NULL,'锡山区','xishan','X','0','Y',NULL,'51');");
E_D("replace into `category` values('59','area',NULL,'新区','xinqu','X','0','Y',NULL,'51');");
E_D("replace into `category` values('60','area',NULL,'澄江街道','chengjiang','C','0','Y',NULL,'52');");
E_D("replace into `category` values('61','area',NULL,'城东街道','chengdong','C','0','Y',NULL,'52');");
E_D("replace into `category` values('62','area',NULL,'临港街道','lingang','L','0','Y',NULL,'52');");
E_D("replace into `category` values('63','area',NULL,'南闸街道','nanzha','N','0','Y',NULL,'52');");
E_D("replace into `category` values('64','area',NULL,'云亭街道','yunting','Y','0','Y',NULL,'52');");
E_D("replace into `category` values('65','area',NULL,'璜土镇','huangtu','H','0','Y',NULL,'52');");
E_D("replace into `category` values('66','area',NULL,'月城镇','yuecheng','Y','0','Y',NULL,'52');");
E_D("replace into `category` values('67','area',NULL,'青阳镇','qingyang','Q','0','Y',NULL,'52');");
E_D("replace into `category` values('68','area',NULL,'徐霞客镇','xuxiake','X','0','Y',NULL,'52');");
E_D("replace into `category` values('69','area',NULL,'华士镇','huashi','H','0','Y',NULL,'52');");
E_D("replace into `category` values('70','area',NULL,'周庄镇','zhouzhuang','Z','0','Y',NULL,'52');");
E_D("replace into `category` values('71','area',NULL,'新桥镇','xinqiao','X','0','Y',NULL,'52');");
E_D("replace into `category` values('72','area',NULL,'长泾镇','changjing','C','0','Y',NULL,'52');");
E_D("replace into `category` values('73','area',NULL,'顾山镇','gushan','G','0','Y',NULL,'52');");
E_D("replace into `category` values('74','area',NULL,'祝塘镇','zhutang','Z','0','Y',NULL,'52');");
E_D("replace into `category` values('75','group',NULL,'小吃','xiaochi','X','0','Y',NULL,'2');");
E_D("replace into `category` values('76','group',NULL,'中餐','zhongcan','Z','0','Y',NULL,'2');");
E_D("replace into `category` values('77','group',NULL,'西餐','xican','X','0','Y',NULL,'2');");
E_D("replace into `category` values('78','group',NULL,'特色小吃','tesexiaochi','T','0','Y',NULL,'2');");
E_D("replace into `category` values('79','area',NULL,'新桥','xinqiao','X','0','Y',NULL,'53');");

require("../../inc/footer.php");
?>