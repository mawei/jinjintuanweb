<?php
class SyncTeam 
{
	private $ak = "9uj8Cqx2LyGMVGr93cWLmQNi";
	private $geotable_id = "73762";
	private $condition;
	
	function SyncTeam()
	{
		$this->condition['ak'] = $this->ak;
		$this->condition['geotable_id'] = $this->geotable_id;
	}
	
	private function initCurl($url,$type)
	{
		$ch = curl_init();//初始化curl
		if($type == "GET")
		{
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
		}else{
			curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
			curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
			curl_setopt($ch, CURLOPT_POST, 1);
		}
		return $ch;
	}
	
    private function getById($id)
	{
		$ch = $this->initCurl("http://api.map.baidu.com/geodata/v3/poi/list?ak={$this->ak}&geotable_id={$this->geotable_id}&team_id={$id},{$id}","GET");
		$data = json_decode(curl_exec($ch),true);//运行curl
		if($data['status'] == 0)
		{
			return $data['pois'];
		}
	}
	
	public function updateById($team)
	{
		$location = $this->getLocation($team['address']);
		if($location['status'] == 0)
		{
			$team['longitude'] = $location['result']['lng'];
			$team['latitude'] = $location['result']['lat'];
		}
		$result = $this->getById($team['id']);
		if(result!=null)
		{
			//update
			$this->condition['id'] = $result[0]['id']; 
			$this->condition['team_id'] = (int)$team['id'];
			$this->condition["title"] = $team["title"];
			$this->condition['image'] = $team['image'];
			$this->condition['group_price'] = (double)$team['team_price'];
			$this->condition['market_price'] = (double)$team['market_price'];
			$this->condition['now_number'] = $team['now_number'];
			$this->condition['tags'] = $team['name'];
			$this->condition['latitude'] = $team['latitude'];
			$this->condition['longitude'] = $team['longitude'];
			$this->condition['coord_type']  = 3;
			$this->condition['group_type'] = $team['team_type'];
			$this->condition['is_effective'] = $team['begin_time']>time()?0:1;
			
			$ch = $this->initCurl("http://api.map.baidu.com/geodata/v3/poi/update","POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $this->condition);
			$data = json_decode(curl_exec($ch),true);//运行curl
		}else{
			//create
			$this->condition['team_id'] = (int)$team['id'];
			$this->condition["title"] = $team["title"];
			$this->condition['image'] = $team['image'];
			$this->condition['group_price'] = (double)$team['team_price'];
			$this->condition['market_price'] = (double)$team['market_price'];
			$this->condition['now_number'] = $team['now_number'];
			$this->condition['tags'] = $team['name'];
			$this->condition['latitude'] = $team['latitude'];
			$this->condition['longitude'] = $team['longitude'];
			$this->condition['coord_type']  = 3;
			$this->condition['group_type'] = $team['team_type'];
			$this->condition['is_effective'] = $team['begin_time']>time()?0:1;
				
			$ch = $this->initCurl("http://api.map.baidu.com/geodata/v3/poi/create","POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $this->condition);
			$data = json_decode(curl_exec($ch),true);//运行curl
		}
		$array['baidu_sync'] = $data['status'];
		DB::Update("team",$team['id'],$array);
		curl_close($ch);
	}
	
	function getColumns()
	{
		$ch = $this->initCurl("http://api.map.baidu.com/geodata/v3/column/list?ak={$this->ak}&geotable_id={$this->geotable_id}","GET");
		$data = json_decode(curl_exec($ch),true);//运行curl
		print_r($data);
	}
	
	function updateColumn($id,$is_sortfilter_field,$is_search_field,$is_index_field,$is_unique_field)
	{
		$this->condition['id'] = $id;
		$this->condition['is_sortfilter_field'] = $is_sortfilter_field;
		$this->condition['is_search_field'] = $is_search_field;
		$this->condition['is_index_field'] = $is_index_field;
		$this->condition['is_unique_field'] = $is_unique_field;
		$ch = $this->initCurl("http://api.map.baidu.com/geodata/v3/column/update","POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->condition);
		$data = json_decode(curl_exec($ch),true);//运行curl
		print_r($data);
	}
	
	function  getLocation($address)
	{
		$url = "http://api.map.baidu.com/geocoder/v2/?ak={$this->ak}&output=json&address={$address}&city=上海市";
		$ch = $this->initCurl($url,"GET");
		$data = json_decode(curl_exec($ch),true);//运行curl
		return $data;
	}
}