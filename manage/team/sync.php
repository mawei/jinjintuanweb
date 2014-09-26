<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
$condition['baidu_sync'] = 0;
$team = DB::LimitQuery('team',array('condition' => $condition),false);
$team = DB::GetQueryResult("
SELECT t1.id, t1.title,t1.image,t1.team_price,t1.market_price,t1.now_number,t2.longlat,t3.name 
		FROM `team` t1 
		left join `partner` t2 on t1.partner_id=t2.id 
		left join category t3 on t1.group_id=t3.id
		",false);
$ch = curl_init();//初始化curl
curl_setopt($ch, CURLOPT_URL,'http://api.map.baidu.com/geodata/v3/poi/create');//抓取指定网页
curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
foreach($team as $k=>$v)
{
	if($v['longlat'] != "")
	{
		 $insert['team_id'] = (int)$v['id'];
		 $insert["title"] = $v["title"];
		 $insert['image'] = $v['image'];
		 $insert['group_price'] = (double)$v['team_price'];
		 $insert['market_price'] = (double)$v['market_price'];
		 $insert['now_number'] = $v['now_number'];
	 	 $insert['tags'] = $v['name'];
	 	 $insert['latitude'] = explode(",",$v['longlat'])[0];
		 $insert['longitude'] = explode(",",$v['longlat'])[1];
		 $insert['coord_type']  = 3;
		 $insert['ak'] = "9uj8Cqx2LyGMVGr93cWLmQNi";
		 $insert['geotable_id'] = "73762";
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $insert);
		 $data = json_decode(curl_exec($ch),true);//运行curl
		 if($data['status'] == "0")
		 {
		 	$array['baidu_sync'] = '1';
		 	DB::Update("team",$v['id'],$array);
		 }
		 else
		 {
		 	$array['baidu_sync'] = $data['status'];
		 	DB::Update("team",$v['id'],$array);
		 }
	}
}

function syncTeam($id)
{
	$condition['id'] = (int)$id;
	$team = DB::LimitQuery('team',array('condition' => $condition),false);
// 	$team = DB::GetQueryResult("
// 	SELECT t1.id, t1.title,t1.image,t1.team_price,t1.market_price,t1.now_number,t2.longlat,t3.name
// 		FROM `team` t1
// 		left join `partner` t2 on t1.partner_id=t2.id
// 		left join category t3 on t1.group_id=t3.id
// 		",false);
	$ch = curl_init();//初始化curl
	curl_setopt($ch, CURLOPT_URL,'http://api.map.baidu.com/geodata/v3/poi/create');//抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
	
		if($team['longlat'] != "")
		{
			$insert['team_id'] = (int)$team['id'];
			$insert["title"] = $team["title"];
			$insert['image'] = $team['image'];
			$insert['group_price'] = (double)$team['team_price'];
			$insert['market_price'] = (double)$team['market_price'];
			$insert['now_number'] = $team['now_number'];
			$insert['tags'] = $team['name'];
			$insert['latitude'] = explode(",",$team['longlat'])[0];
			$insert['longitude'] = explode(",",$team['longlat'])[1];
			$insert['coord_type']  = 3;
			$insert['ak'] = "9uj8Cqx2LyGMVGr93cWLmQNi";
			$insert['geotable_id'] = "73762";
			curl_setopt($ch, CURLOPT_POSTFIELDS, $insert);
			$data = json_decode(curl_exec($ch),true);//运行curl
			//print_r($insert);
			//print_r($insert);
			if($data['status'] == "0")
			{
				$array['baidu_sync'] = '1';
				DB::Update("team",$team['id'],$array);
			}
			else
			{
				$array['baidu_sync'] = $data['status'];
				DB::Update("team",$v['id'],$array);
			}
		}
}
