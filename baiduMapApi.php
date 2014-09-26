<?php
require_once(dirname(__FILE__) . '/app.php');

class BaiduMapApi
{
	private $AK = "9uj8Cqx2LyGMVGr93cWLmQNi";
	private $geoTable = "73762";

	/*
	 * sortby : group_price,team_id,distance
	*/
	static function getTams($long, $lat, $radius, $tags, $sortby, $pageIndex, $pageSize)
	{
		$teams = array();
		$ids = array();
		$location = $locations.get(1)+","+$locations.get(0);
		$radius = radius==null ? "5000":$radius;
		$url = "http://api.map.baidu.com/geosearch/v3/nearby?ak="+$AK+"&geotable_id="+$geoTable;
		$url += "&location="+$location+"&tag="+$tags+"&radius="+$radius+"&sortby="+ $sortby +":1"+"&page_index="+$pageIndex+"&page_size="+$pageSize+"is_effective=1";
		
		
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = json_decode(curl_exec($ch),true);//运行
		
		foreach ($d as $data['contents'])
		{
			$t['id'] = $d['team_id'];
			$t['distance'] = $d['distance'];
			array_push($teams, $t);
			array_push($ids, (int)$d['team_id']);
		}
		
		$select = 'id,title,product,team_price,market_price,image,now_number';
		$condition = array('id'=>$ids);
		$dbteams = DB::LimitQuery('team', array(
				'condition' => $condition,
				'select' => $select
		));
		
		foreach($teams as $k=>$v)
		{
			$dbteams[$k]['distance'] = $teams[$k]['distance'];
		}
		echo json_encode($dbteams);exit();

	}
}
		
?>