<?php
require_once(dirname(__FILE__) . '/app.php');

class BaiduMapApi
{
	static $ak = "9uj8Cqx2LyGMVGr93cWLmQNi";
	static  $geoTable = "73762";

	/*
	 * sortby : group_price,team_id,distance
	*/
	static function getTeams($longitude, $latitude,$type, $radius, $tags, $sortby, $pageIndex, $pageSize)
	{
		$teams = array();
		$ids = array();
		$location = $longitude.",".$latitude;
		$radius = radius==null || radius == ""? "5000":$radius;
		
		$url = "http://api.map.baidu.com/geosearch/v3/nearby?ak=".self::$ak."&geotable_id=".self::$geoTable;
		
		$url .= "&location=".$location."&tag=".$tags."&radius=".$radius."&sortby=". $sortby .":1"."&page_index=".$pageIndex."&page_size=".$pageSize."is_effective=1";
		//echo $url;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = json_decode(curl_exec($ch),true);//运行
		foreach ($data['contents'] as $d)
		{
			$t['id'] = $d['team_id'];
			$t['distance'] = $d['distance'];
			array_push($teams, $t);
			array_push($ids, (int)$d['team_id']);
		}
		$idsstring = implode(",", $ids);
// 		$select = 'id,title,product,team_price,market_price,image,now_number';
// 		$condition = array('id'=>$ids);
// 		$dbteams = DB::LimitQuery('team', array(
// 				'condition' => $condition,
// 				'select' => $select
// 		));
		$sql = "select t1.*,t2.title as partnername,t2.address as partneraddress,t2.phone as partnerphone from `team` t1 left join `partner` t2 on t1.partner_id=t2.id where t1.id in ({$idsstring})";
		$dbteams = DB::GetQueryResult($sql);
		
		foreach($teams as $k=>$v)
		{
			$dbteams[$k]['distance'] = $teams[$k]['distance'];
		}
		
		return $dbteams;
	}
	
	static function convertWGStoBDLoaction($longitude,$latitude)
	{
		$location = $longitude.",".$latitude;
		$url = "http://api.map.baidu.com/geoconv/v1/?ak=".self::$ak;
		$url .= "&coords=".$location;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = json_decode(curl_exec($ch),true);//运行
		
		if($data['status'] == 0)
		{
			return $data['result'][0];
		}else{
			return "";
		}
	}
	
	static function getAddressByLocation($longitude,$latitude)
	{
		$location = $latitude.",".$longitude;
		$url = "http://api.map.baidu.com/geocoder/v2/?ak=".self::$ak."&output=json";
		$url .= "&location=".$location;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = json_decode(curl_exec($ch),true);//运行
		if($data['status'] == 0)
		{
			return $data['result'];
		}else{
			return "";
		}
	}
	
}
		
?>