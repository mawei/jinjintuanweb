<?php 
// $timetable = array(
// 		0=>array("id"=>"1","train_code"=>"C3602","direct"=>"shanghainan","type"=>"stop","day"=>"workday","jinshanwei"=>"600","jinshanyuanqu"=>"610","tinlin"=>"616","yexie"=>"623","chedun"=>"631","xinqiao"=>"640","chunshen"=>"649","shanghainan"=>"700"),
// 		1=>array("id"=>"2","train_code"=>"C3604","direct"=>"shanghainan","type"=>"stop","day"=>"workday","jinshanwei"=>"625","jinshanyuanqu"=>"635","tinlin"=>"641","yexie"=>"648","chedun"=>"656","xinqiao"=>"705","chunshen"=>"714","shanghainan"=>"725"),
// 		2=>array("id"=>"3","train_code"=>"C3002","direct"=>"shanghainan","type"=>"nonstop","day"=>"workday","jinshanwei"=>"658","jinshanyuanqu"=>"","tinlin"=>"","yexie"=>"","chedun"=>"","xinqiao"=>"","chunshen"=>"","shanghainan"=>"730"),
// 		3=>array("id"=>"4","train_code"=>"C3004","direct"=>"shanghainan","type"=>"nonstop","day"=>"workday","jinshanwei"=>"720","jinshanyuanqu"=>"","tinlin"=>"","yexie"=>"","chedun"=>"","xinqiao"=>"","chunshen"=>"","shanghainan"=>"752"),
// 		4=>array("id"=>"5","train_code"=>"C3606","direct"=>"shanghainan","type"=>"stop","day"=>"workday","jinshanwei"=>"725","jinshanyuanqu"=>"735","tinlin"=>"741","yexie"=>"748","chedun"=>"756","xinqiao"=>"805","chunshen"=>"814","shanghainan"=>"825"),
// 		5=>array("id"=>"6","train_code"=>"C3602","direct"=>"shanghainan","type"=>"stop","day"=>"workday","jinshanwei"=>"800","jinshanyuanqu"=>"810","tinlin"=>"816","yexie"=>"823","chedun"=>"831","xinqiao"=>"840","chunshen"=>"849","shanghainan"=>"900"),
// 		6=>array("id"=>"7","train_code"=>"C3602","direct"=>"shanghainan","day"=>"workday","type"=>"nonstop","jinshanwei"=>"","jinshanyuanqu"=>"","tinlin"=>"","yexie"=>"","chedun"=>"","xinqiao"=>"","chunshen"=>"","shanghainan"=>""),
		
// 		7=>array("id"=>"8","train_code"=>"C3602","direct"=>"shanghainan","day"=>"workday","type"=>"nonstop","jinshanwei"=>"","jinshanyuanqu"=>"","tinlin"=>"","yexie"=>"","chedun"=>"","xinqiao"=>"","chunshen"=>"","shanghainan"=>""),
		
// 		8=>array("id"=>"9","train_code"=>"C3602","direct"=>"shanghainan","day"=>"workday","type"=>"nonstop","jinshanwei"=>"","jinshanyuanqu"=>"","tinlin"=>"","yexie"=>"","chedun"=>"","xinqiao"=>"","chunshen"=>"","shanghainan"=>""),
		
// 		9=>array("id"=>"10","train_code"=>"C3602","direct"=>"shanghainan","day"=>"workday","type"=>"nonstop","jinshanwei"=>"","jinshanyuanqu"=>"","tinlin"=>"","yexie"=>"","chedun"=>"","xinqiao"=>"","chunshen"=>"","shanghainan"=>""),
		
// );

$timetable = array(
	array("code"=>"C3602","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"600"),
	array("code"=>"C3604","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"620"),
	array("code"=>"C3002","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"658"),
	array("code"=>"C3004","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"706"),
	array("code"=>"C3606","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"720"),
	array("code"=>"C3606","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"725"),
	array("code"=>"C3608","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"800"),
	array("code"=>"C3606","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"850"),
	array("code"=>"C3610","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"908"),
	array("code"=>"C3008","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"941"),
	array("code"=>"C3612","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"950"),
	array("code"=>"C3010","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1025"),
	array("code"=>"C3614","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1053"),
	array("code"=>"C3616","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1122"),
	array("code"=>"C3012","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1156"),
	array("code"=>"C3014","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1220"),
	array("code"=>"C3618","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1233"),
	array("code"=>"C3016","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1321"),
	array("code"=>"C3018","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1334"),
	array("code"=>"C3020","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1355"),
	array("code"=>"C3620","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1429"),
	array("code"=>"C3022","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1519"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1533"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1542"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1608"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1654"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1724"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1733"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1810"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1827"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1850"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"1916"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"n","day"=>"workday","starttime"=>"1952"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"2009"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"2031"),
	array("code"=>"C3024","direct"=>"sh","stop"=>"y","day"=>"workday","starttime"=>"2127"),
	
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"530"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"608"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"640"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"713"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"745"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"756"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"831"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"901"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"915"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"923"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1000"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1025"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1034"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1107"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1119"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1207"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1240"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1256"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1307"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1359"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1440"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1451"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1522"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1612"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1624"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1643"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1709"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1728"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1808"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1813"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1846"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"1857"),
	array("direct"=>"js","stop"=>"n","day"=>"workday","starttime"=>"1957"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"2008"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"2036"),
	array("direct"=>"js","stop"=>"y","day"=>"workday","starttime"=>"2124"),
	
	
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"627"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"713"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"745"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"822"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"831"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"901"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"915"),
	array("direct"=>"js","stop"=>"b","day"=>"weekend","starttime"=>"940"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1000"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1034"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1107"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1119"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1207"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1240"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1256"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1307"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1359"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1407"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1440"),
	array("direct"=>"js","stop"=>"b","day"=>"weekend","starttime"=>"1450"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1522"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1531"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1612"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1624"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1643"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1709"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1728"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1808"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1813"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1846"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"1857"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"1957"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"2008"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"2036"),
	array("direct"=>"js","stop"=>"y","day"=>"weekend","starttime"=>"2124"),
	array("direct"=>"js","stop"=>"n","day"=>"weekend","starttime"=>"2157"),
	
	
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"600"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"658"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"738"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"811"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"828"),
	array("direct"=>"sh","stop"=>"b","day"=>"weekend","starttime"=>"906"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"941"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"950"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1025"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1053"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1122"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1156"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1220"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1233"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1321"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1334"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1355"),
	array("direct"=>"sh","stop"=>"b","day"=>"weekend","starttime"=>"1414"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1419"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1457"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1519"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1533"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1542"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1636"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1644"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1710"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1728"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1810"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1827"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1850"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"1916"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"1952"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"2009"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"2031"),
	array("direct"=>"sh","stop"=>"y","day"=>"weekend","starttime"=>"2107"),
	array("direct"=>"sh","stop"=>"n","day"=>"weekend","starttime"=>"2155"),

	
);
date_default_timezone_set('PRC');


foreach ($timetable as $k=>$t)
{
	$time = strlen($t['starttime']) == 3 ? "0".$t['starttime'] : $t['starttime'];
	
	if($t['direct'] == "js")
	{
		if($t['stop'] == "y")
		{
			$timetable[$k]['shanghai'] = date("H:i",strtotime($time));
			$timetable[$k]['chunshen'] = date("H:i",strtotime($time)+60*10);
			$timetable[$k]['xinqiao'] = date("H:i",strtotime($time)+60*17);
			$timetable[$k]['chedun'] = date("H:i",strtotime($time)+60*25);
			$timetable[$k]['yexie'] = date("H:i",strtotime($time)+60*33);
			$timetable[$k]['tinlin'] = date("H:i",strtotime($time)+60*41);
			$timetable[$k]['jinshanyuanqu'] = date("H:i",strtotime($time)+60*49);
			$timetable[$k]['jinshanwei'] = date("H:i",strtotime($time)+60*60);
		}else if($t['stop'] == "n"){
			$timetable[$k]['shanghai'] = date("H:i",strtotime($time));
			$timetable[$k]['chunshen'] = "";
			$timetable[$k]['xinqiao'] = "";
			$timetable[$k]['chedun'] = "";
			$timetable[$k]['yexie'] = "";
			$timetable[$k]['tinlin'] = "";
			$timetable[$k]['jinshanyuanqu'] = "";
			$timetable[$k]['jinshanwei'] = date("H:i",strtotime($time)+60*32);
		}else if($t['stop'] == "b"){
			$timetable[$k]['shanghai'] = date("H:i",strtotime($time));
			$timetable[$k]['chunshen'] = "";
			$timetable[$k]['xinqiao'] = date("H:i",strtotime($time) + 60*13);
			$timetable[$k]['chedun'] = "";
			$timetable[$k]['yexie'] = "";
			$timetable[$k]['tinlin'] = date("H:i",strtotime($time) + 60*29);
			$timetable[$k]['jinshanyuanqu'] = "";
			$timetable[$k]['jinshanwei'] = date("H:i",strtotime($time)+60*43);
		}
	}
	
	if($t['direct'] == "sh")
	{
		if($t['stop'] == "y")
		{
			$timetable[$k]['shanghai'] = date("H:i",strtotime($time)+60*60);
			$timetable[$k]['chunshen'] = date("H:i",strtotime($time)+60*49);
			$timetable[$k]['xinqiao'] = date("H:i",strtotime($time)+60*40);
			$timetable[$k]['chedun'] = date("H:i",strtotime($time)+60*31);
			$timetable[$k]['yexie'] = date("H:i",strtotime($time)+60*23);
			$timetable[$k]['tinlin'] = date("H:i",strtotime($time)+60*16);
			$timetable[$k]['jinshanyuanqu'] = date("H:i",strtotime($time)+60*10);
			$timetable[$k]['jinshanwei'] = date("H:i",strtotime($time));
		}else if($t['stop'] == "n"){
			$timetable[$k]['shanghai'] = date("H:i",strtotime($time)+60*32);
			$timetable[$k]['chunshen'] = "";
			$timetable[$k]['xinqiao'] = "";
			$timetable[$k]['chedun'] = "";
			$timetable[$k]['yexie'] = "";
			$timetable[$k]['tinlin'] = "";
			$timetable[$k]['jinshanyuanqu'] = "";
			$timetable[$k]['jinshanwei'] = date("H:i",strtotime($time));
		}else if($t['stop'] == "b"){
			$timetable[$k]['shanghai'] = date("H:i",strtotime($time)+60*43);
			$timetable[$k]['chunshen'] = "";
			$timetable[$k]['xinqiao'] = date("H:i",strtotime($time) + 60*29);
			$timetable[$k]['chedun'] = "";
			$timetable[$k]['yexie'] = "";
			$timetable[$k]['tinlin'] = date("H:i",strtotime($time) + 60*13);
			$timetable[$k]['jinshanyuanqu'] = "";
			$timetable[$k]['jinshanwei'] = date("H:i",strtotime($time));
		}		
	}
}

echo json_encode($timetable);
?>