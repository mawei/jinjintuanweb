<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `flow`;");
E_C("CREATE TABLE `flow` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `detail_id` varchar(32) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `direction` enum('income','expense') NOT NULL DEFAULT 'income',
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `action` varchar(16) NOT NULL DEFAULT 'buy',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8");
E_D("replace into `flow` values('1','3','0','go-2-1-tdyb',NULL,'income','2.80','paycharge','1368621200');");
E_D("replace into `flow` values('2','3','0','1',NULL,'expense','2.80','buy','1368621200');");
E_D("replace into `flow` values('3','3','0','go-3-1-omya',NULL,'income','2.80','paycharge','1368622095');");
E_D("replace into `flow` values('4','3','0','1',NULL,'expense','2.80','buy','1368622095');");
E_D("replace into `flow` values('5','2','0','go-4-1-rgdp',NULL,'income','0.01','paycharge','1368803121');");
E_D("replace into `flow` values('6','2','0','1',NULL,'expense','0.01','buy','1368803121');");
E_D("replace into `flow` values('7','2','0','go-5-1-qdin',NULL,'income','0.01','paycharge','1368803529');");
E_D("replace into `flow` values('8','2','0','1',NULL,'expense','0.01','buy','1368803530');");
E_D("replace into `flow` values('9','2','1','1',NULL,'income','0.01','refund','1368804987');");
E_D("replace into `flow` values('10','2','1','0',NULL,'expense','0.01','withdraw','1368805086');");
E_D("replace into `flow` values('11','2','0','7870043340270651',NULL,'income','10.00','cardstore','1368805174');");
E_D("replace into `flow` values('12','2','0','1',NULL,'expense','0.01','buy','1368805298');");
E_D("replace into `flow` values('13','5','0','go-9-1-hkrw',NULL,'income','4.70','paycharge','1369028428');");
E_D("replace into `flow` values('14','5','0','9',NULL,'expense','4.70','buy','1369028428');");
E_D("replace into `flow` values('15','8','0','go-11-1-unro',NULL,'income','3.70','paycharge','1369052454');");
E_D("replace into `flow` values('16','8','0','7',NULL,'expense','3.70','buy','1369052454');");
E_D("replace into `flow` values('17','8','0','go-12-1-eaeu',NULL,'income','4.70','paycharge','1369105930');");
E_D("replace into `flow` values('18','8','0','9',NULL,'expense','4.70','buy','1369105931');");
E_D("replace into `flow` values('19','2','0','8002289100697823',NULL,'income','10.00','cardstore','1369210390');");
E_D("replace into `flow` values('20','2','0','5',NULL,'expense','18.00','buy','1369210453');");
E_D("replace into `flow` values('21','1','0','go-14-1-mhuz',NULL,'income','4.70','paycharge','1369296855');");
E_D("replace into `flow` values('22','1','0','9',NULL,'expense','4.70','buy','1369296855');");
E_D("replace into `flow` values('23','12','0','go-16-1-yshn',NULL,'income','2.80','paycharge','1369304585');");
E_D("replace into `flow` values('24','12','0','1',NULL,'expense','2.80','buy','1369304586');");
E_D("replace into `flow` values('25','12','0','go-19-2-wjbr',NULL,'income','9.40','paycharge','1369306016');");
E_D("replace into `flow` values('26','12','0','9',NULL,'expense','9.40','buy','1369306016');");
E_D("replace into `flow` values('27','12','0','go-17-2-lbsi',NULL,'income','9.20','paycharge','1369306834');");
E_D("replace into `flow` values('28','12','0','18',NULL,'expense','9.20','buy','1369306834');");
E_D("replace into `flow` values('29','12','0','go-18-2-ojzl',NULL,'income','7.40','paycharge','1369307017');");
E_D("replace into `flow` values('30','12','0','7',NULL,'expense','7.40','buy','1369307017');");
E_D("replace into `flow` values('31','15','0','go-23-1-yalr',NULL,'income','3.30','paycharge','1369559456');");
E_D("replace into `flow` values('32','15','0','13',NULL,'expense','3.30','buy','1369559456');");
E_D("replace into `flow` values('33','15','0','go-24-1-pumt',NULL,'income','4.60','paycharge','1369559726');");
E_D("replace into `flow` values('34','15','0','18',NULL,'expense','4.60','buy','1369559726');");
E_D("replace into `flow` values('35','15','0','go-25-1-yfiv',NULL,'income','4.70','paycharge','1369559789');");
E_D("replace into `flow` values('36','15','0','9',NULL,'expense','4.70','buy','1369559790');");
E_D("replace into `flow` values('37','1','0','7205869322072447',NULL,'income','10.00','cardstore','1369562855');");
E_D("replace into `flow` values('38','1','0','1',NULL,'expense','2.80','buy','1369562930');");
E_D("replace into `flow` values('39','8','0','go-21-1-ovzx',NULL,'income','4.60','paycharge','1369575188');");
E_D("replace into `flow` values('40','8','0','18',NULL,'expense','4.60','buy','1369575188');");
E_D("replace into `flow` values('41','11','0','go-26-1-oblj',NULL,'income','0.50','paycharge','1369652417');");
E_D("replace into `flow` values('42','11','0','13',NULL,'expense','0.50','buy','1369652417');");
E_D("replace into `flow` values('43','6','0','go-27-1-pcqt',NULL,'income','9.00','paycharge','1369820369');");
E_D("replace into `flow` values('44','6','0','5',NULL,'expense','9.00','buy','1369820369');");
E_D("replace into `flow` values('45','6','0','go-32-1-zjpv',NULL,'income','9.00','paycharge','1369909160');");
E_D("replace into `flow` values('46','6','0','5',NULL,'expense','9.00','buy','1369909160');");
E_D("replace into `flow` values('47','13','0','go-33-1-ixfg',NULL,'income','4.50','paycharge','1370139647');");
E_D("replace into `flow` values('48','13','0','6',NULL,'expense','4.50','buy','1370139647');");
E_D("replace into `flow` values('49','18','0','go-35-1-iztu',NULL,'income','2.80','paycharge','1370178440');");
E_D("replace into `flow` values('50','18','0','1',NULL,'expense','2.80','buy','1370178440');");
E_D("replace into `flow` values('51','11','0','9828158693867915',NULL,'income','10.00','cardstore','1370340567');");
E_D("replace into `flow` values('52','11','0','5',NULL,'expense','9.00','buy','1370340599');");
E_D("replace into `flow` values('53','20','0','go-38-1-ibzo',NULL,'income','2.80','paycharge','1370440700');");
E_D("replace into `flow` values('54','20','0','1',NULL,'expense','2.80','buy','1370440700');");
E_D("replace into `flow` values('55','14','0','7049262168067860',NULL,'income','10.00','cardstore','1370519382');");
E_D("replace into `flow` values('56','14','0','1530782125099074',NULL,'income','10.00','cardstore','1370519390');");
E_D("replace into `flow` values('57','14','0','1192492993649721',NULL,'income','20.00','cardstore','1370519517');");
E_D("replace into `flow` values('58','14','0','37',NULL,'expense','38.00','buy','1370519562');");
E_D("replace into `flow` values('59','1','1','0',NULL,'income','57.00','store','1370522505');");
E_D("replace into `flow` values('60','1','0','38',NULL,'expense','57.00','buy','1370522505');");
E_D("replace into `flow` values('61','24','0','go-43-1-emut',NULL,'income','3.30','paycharge','1370616196');");
E_D("replace into `flow` values('62','24','0','13',NULL,'expense','3.30','buy','1370616196');");
E_D("replace into `flow` values('63','13','0','5356331004981528',NULL,'income','100.00','cardstore','1370696979');");
E_D("replace into `flow` values('64','13','0','40',NULL,'expense','98.00','buy','1370697022');");
E_D("replace into `flow` values('65','1','0','28',NULL,'expense','0.00','buy','1370704012');");
E_D("replace into `flow` values('66','1','1','0',NULL,'income','0.10','daysign','1370742089');");
E_D("replace into `flow` values('67','25','25','0',NULL,'income','0.10','daysign','1370745980');");
E_D("replace into `flow` values('68','25','0','go-47-1-bpvc',NULL,'income','15.90','paycharge','1370746400');");
E_D("replace into `flow` values('69','25','0','22',NULL,'expense','16.00','buy','1370746400');");
E_D("replace into `flow` values('70','1','1','0',NULL,'income','0.10','daysign','1370841781');");
E_D("replace into `flow` values('71','27','0','go-50-1-gkfa',NULL,'income','57.00','paycharge','1370853224');");
E_D("replace into `flow` values('72','27','0','15',NULL,'expense','57.00','buy','1370853224');");
E_D("replace into `flow` values('73','28','0','8754799869301423',NULL,'income','20.00','cardstore','1370858113');");
E_D("replace into `flow` values('74','28','0','9505156685956238',NULL,'income','20.00','cardstore','1370858126');");
E_D("replace into `flow` values('75','28','0','7990543359963223',NULL,'income','20.00','cardstore','1370858135');");
E_D("replace into `flow` values('76','28','0','37',NULL,'expense','57.00','buy','1370858180');");
E_D("replace into `flow` values('77','29','0','2110047089210408',NULL,'income','20.00','cardstore','1370858189');");
E_D("replace into `flow` values('78','29','0','1075770677918862',NULL,'income','20.00','cardstore','1370858196');");
E_D("replace into `flow` values('79','29','0','6774422323957516',NULL,'income','20.00','cardstore','1370858233');");
E_D("replace into `flow` values('80','29','0','37',NULL,'expense','57.00','buy','1370858284');");
E_D("replace into `flow` values('81','6','0','5219794580871555',NULL,'income','200.00','cardstore','1370867801');");
E_D("replace into `flow` values('82','6','0','17',NULL,'expense','167.00','buy','1370867891');");
E_D("replace into `flow` values('83','30','0','go-55-1-aeto',NULL,'income','24.00','paycharge','1371012698');");
E_D("replace into `flow` values('84','30','0','42',NULL,'expense','24.00','buy','1371012698');");
E_D("replace into `flow` values('85','1','0','43',NULL,'expense','0.01','buy','1371018639');");
E_D("replace into `flow` values('86','1','1','43',NULL,'income','0.01','refund','1371028769');");
E_D("replace into `flow` values('87','33','0','go-58-1-upgs',NULL,'income','9.00','paycharge','1371103960');");
E_D("replace into `flow` values('88','33','0','5',NULL,'expense','9.00','buy','1371103960');");
E_D("replace into `flow` values('89','34','0','go-59-1-podz',NULL,'income','139.00','paycharge','1371106197');");
E_D("replace into `flow` values('90','34','0','34',NULL,'expense','139.00','buy','1371106197');");
E_D("replace into `flow` values('91','36','0','go-60-1-zvdj',NULL,'income','64.00','paycharge','1371119309');");
E_D("replace into `flow` values('92','36','0','39',NULL,'expense','64.00','buy','1371119309');");
E_D("replace into `flow` values('93','37','0','28',NULL,'expense','0.00','buy','1371184394');");
E_D("replace into `flow` values('94','38','0','go-65-1-dqpl',NULL,'income','3.70','paycharge','1371296705');");
E_D("replace into `flow` values('95','38','0','7',NULL,'expense','3.70','buy','1371296705');");
E_D("replace into `flow` values('96','22','0','28',NULL,'expense','0.00','buy','1371309202');");
E_D("replace into `flow` values('97','41','0','go-70-2-meni',NULL,'income','17.80','paycharge','1371344195');");
E_D("replace into `flow` values('98','41','0','46',NULL,'expense','17.80','buy','1371344195');");
E_D("replace into `flow` values('99','40','0','go-69-2-pdxt',NULL,'income','17.80','paycharge','1371371988');");
E_D("replace into `flow` values('100','40','0','46',NULL,'expense','17.80','buy','1371371988');");
E_D("replace into `flow` values('101','43','0','28',NULL,'expense','0.00','buy','1371434282');");
E_D("replace into `flow` values('102','43','0','28',NULL,'expense','0.00','buy','1371434656');");
E_D("replace into `flow` values('103','1','0','2053748708221359',NULL,'income','10.00','cardstore','1371451469');");
E_D("replace into `flow` values('104','1','0','4921274821377911',NULL,'income','50.00','cardstore','1371451600');");
E_D("replace into `flow` values('105','1','0','42',NULL,'expense','25.00','buy','1376323800');");
E_D("replace into `flow` values('106','1','0','42',NULL,'expense','25.00','buy','1376323856');");
E_D("replace into `flow` values('107','1','1','0',NULL,'income','25.00','store','1381226498');");
E_D("replace into `flow` values('108','1','0','42',NULL,'expense','25.00','buy','1381226498');");
E_D("replace into `flow` values('109','1','1','0',NULL,'income','25.00','store','1381226500');");
E_D("replace into `flow` values('110','1','0','42',NULL,'expense','25.00','buy','1381226500');");
E_D("replace into `flow` values('111','1','0','46',NULL,'expense','8.90','buy','1381226555');");
E_D("replace into `flow` values('112','1','1','0',NULL,'income','0.10','daysign','1381233279');");

require("../../inc/footer.php");
?>