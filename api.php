<?php 
if(isset($_GET['sessionid']))
{
	session_id($_GET['sessionid']);
	session_start();
}

require_once(dirname(__FILE__) . '/app.php');
require_once(dirname(__FILE__) . '/baiduMapApi.php');


if($_REQUEST['act'] == 'getSessionId')
{
	$return = array('code'=>0,'message'=>'获取成功',data=>session_id());
}

//城市
elseif($_REQUEST['act']=='citys')
{
	$citys = DB::LimitQuery('category', array(
			'condition' => array("zone"=>"city"),
			'order' => 'ORDER BY display ASC, sort_order DESC, id DESC'
	));
	$result = array('code'=>0,'message'=>'获取成功',data=>$citys);
}

//发送短信
elseif($_REQUEST['act']=='sendSms')
{
	$mobile = $_REQUEST['mobile'];
	$captcha_code = mt_rand(111111, 999999);
	$_SESSION['captcha_code'] = $captcha_code;
	sms_code($mobile, $captcha_code);	
	$result = array('code'=>0,'message'=>'发送成功',data=>session_id());	
}

elseif($_REQUEST['act']=='getSmsCode')
{
	$result = array('code'=>0,'message'=>'获取成功',data=>$_SESSION['captcha_code']);
}

// 分类
elseif($_REQUEST['act']=='categorys')
{
	$categories = DB::LimitQuery('category', array(
			'condition' => array("zone"=>"group"),
			'order' => 'ORDER BY display ASC, sort_order DESC, id DESC'
	));
	$result = array('code'=>0,'message'=>'获取成功',data=>$categories);
}

// 团购项目
elseif($_REQUEST['act']=='teams')
{
	$cityID = intval($_REQUEST['cityid']);
	$teamID = intval($_REQUEST['teamid']);
	$groupID = intval($_REQUEST["groupid"]);
	$condition = array();
	$condition['team_type'] = "normal";
	$select = 'id,title,product,team_price,market_price,image,now_number';
	if($cityID > 0)
	{
		$condition["city_id"] = $cityID;
	}
	if($groupID > 0)
	{
		$condition["group_id"] = $groupID;
	}
	$teams = DB::LimitQuery('team', array(
			'condition' => $condition,
			'select' => $select,
			'order' => 'ORDER BY id DESC'
	));
	if($teamID > 0)
	{
		$sql = "select t1.*,t2.title as partnername,t2.address as partneraddress,t2.phone as partnerphone from `team` t1 left join `partner` t2 on t1.partner_id=t2.id where t1.id=$teamID";
		$teams = DB::GetQueryResult($sql);
	}
	$result = array('code'=>0,'message'=>'获取成功',data=>$teams);
	
	//echo json_encode($teams);exit();
}

// 抽奖项目
elseif($_REQUEST['act']=='lottery')
{
	$cityID = intval($_REQUEST['cityid']);
	$teamID = intval($_REQUEST['teamid']);
	$condition = array();
	$select = 'id,title,product,team_price,market_price,image,now_number';
	if($cityID > 0)
	{
		$condition["city_id"] = $cityID;
	}
	$condition['team_type'] = "seconds";
	$teams = DB::LimitQuery('team', array(
			'condition' => $condition,
			'select' => $select,
			'order' => 'ORDER BY id DESC'
	));
	if($teamID > 0)
	{
		$sql = "select t1.*,t2.title as partnername,t2.address as partneraddress,t2.phone as partnerphone from `team` t1 left join `partner` t2 on t1.partner_id=t2.id where t1.id=$teamID";
		$teams = DB::GetQueryResult($sql);
	}
	echo json_encode($teams);
}

elseif($_REQUEST['act']=='lbsteams')
{
	$long = addslashes($_REQUEST['longitude']);
	$lat = addslashes($_REQUEST['latitude']);
	$type = addslashes($_REQUEST['type']);
	$tags = addslashes($_REQUEST['tags']);
	$sortby = addslashes($_REQUEST['sortby']);
	$pageIndex = addslashes($_REQUEST['pageIndex']);
	$pageSize = addslashes($_REQUEST['pageSize']);
	
	$teams = BaiduMapApi::getTeams($long, $lat,$type, 5000, $tags, $sortby, $pageIndex, $pageSize);
	$result = array('code'=>0,'message'=>'获取成功',data=>$team);
}

elseif($_REQUEST['act']=='getlocation')
{
	$longitude = addslashes($_REQUEST['longitude']);
	$latitude = addslashes($_REQUEST['latitude']);
	$location = BaiduMapApi::convertWGStoBDLoaction($longitude, $latitude);
	$result = array('code'=>1,'message'=>'获取失败');
	if($location != "")
	{
		$locationInfo = BaiduMapApi::getAddressByLocation($location['x'], $location['y']);
		if($locationInfo['status'] == 0)
		{
			$result = array('code'=>0,'message'=>'获取成功',data=>$locationInfo);
		}
	}
}



elseif($_REQUEST['act'] == 'signup')
{
		$mobile = addslashes($_REQUEST['mobile']);
		$password = addslashes($_REQUEST['password']);
		$password2 = addslashes($_REQUEST['password2']);
		$code = addslashes($_REQUEST['code']);
	
		$sql = "select id from `user` where username='".$mobile."'";
		$result = DB::GetQueryResult($sql);
		if(count($result)>0)
		{
			$result = array('code'=>1,'message'=>'手机号码已被注册');
		}elseif($password != $password2)
		{
			$result = array('code'=>2,'message'=>'请确认密码是否一致');
		}else if($code != $_SESSION['captcha_code'])
		{
			$result = array('code'=>3,'message'=>'验证码错误');
		}
		else{
			$condition['username'] = $mobile;
			$condition['password'] = $password;
			$condition['mobile'] = $mobile;
			$userid = DB::Insert('user', $condition);
			$result = array('code'=>0,'message'=>'注册成功','data'=>$userid);
		}
		echo json_encode($result);exit();
}

else {	
	//用户验证
	//$userid = intval($_REQUEST['userid']);
	$username = addslashes($_REQUEST['username']);
	$password = addslashes($_REQUEST['password']);
	
	$condition['username'] = $username;
	$condition['password'] = $password;
	$userinfo = DB::GetTableRow("user", $condition,false);
	
	//print_r($condition);die();
	if($userinfo == null)
	{
		$result = array('code'=>99,'message'=>'用户验证失败，请重新登录');
		echo json_encode($result); exit();
	}
	$userid = $userinfo['id'];
	//print_r($userinfo);
	if( $_REQUEST['act']=='login')
	{
		$result = array('code'=>0,'message'=>'登录成功','data'=>$userinfo['id']);
	}
		
	//用户信息
	elseif($_REQUEST['act']=='getuserinfo')
	{
		$result = array('code'=>0,'message'=>'获取成功','data'=>$userinfo);
	}
	
	// 团购券
	elseif($_REQUEST['act']=='coupons')
	{
		$couponid = intval($_REQUEST['couponid']);
		$where = "where t1.user_id=$userid";
		if($couponid > 0)
		{
			$where .=" and t1.id=$couponid";
		}
		$sql = "select t1.* ,t2.product as product from `coupon` t1 left join `team` t2 on t1.team_id=t2.id $where order by t1.create_time DESC";
		$coupons = DB::GetQueryResult($sql,false);
		$result = array('code'=>0,'message'=>'获取成功','data'=>$coupons);
	}
	
	//订单
	elseif ($_REQUEST['act']=='orders') {
		$selector = strval($_GET['s']);
		$orderid = intval($_GET['orderid']);
		$where = "";
		
		if ( $selector == 'index' ) {
		}
		else if ( $selector == 'unpay' ) {
			$where .=  " and t1.state='unpay'";
		}
		else if ( $selector == 'pay' ) {
			$where .=  " and t1.state='pay'";
		}
		else if ( $selector == 'refund' ) {
			$where .=  " and t1.state='pay' and t1.allowrefund='Y'";
		}
		else if ( $orderid > 0 ) {
			$where .= " and t1.id={$orderid}";
		}
		list($pagesize, $offset, $pagestring) = pagestring($count, 10);
		$sql = "SELECT t1.id,t1.team_id,t1.state,t1.quantity,t1.price,t1.create_time,t2.title FROM `order` t1 left join `team` t2 on t1.team_id=t2.id WHERE t1.user_id=$userid".$where;
		$orders = DB::GetQueryResult($sql,false);
		$result = array('code'=>0,'message'=>'获取成功','data'=>$orders);
	}
	
	//生成订单
	elseif($_REQUEST['act']=="createorder")
	{
			$insert['user_id'] = $userid;
			$insert['team_id'] = $_REQUEST['team_id'];
			$insert['quantity'] = $_REQUEST['quantity'];
			$team = DB::GetDbRowById('team',$insert['team_id'],true);
			$insert['state'] = 'unpay';
			$insert['express'] = $team['express']==""?"N":"Y";
			$insert['price'] = $team['team_price'];
			$insert['allowrefund'] = $team['allowrefund'];
			$insert['credit'] = 0;
	// 		insert into `order` (user_id,team_id,quantity,price,state,express,allowrefund,credit)
	// 		values (4,1,1,30,'unpay','N','N',0)
			$order_id == DB::Insert('order', $insert);
			
			if($order_id > 0)
			{
				$result = array('code'=>0,'message'=>'生成订单成功','data'=>$order_id);
			}else
			{
				$result = array('code'=>1,'message'=>'生成订单失败');
			}
	}
	
	//重置密码
	elseif($_REQUEST['act'] == "reset_password")
	{
		$newpassword = $_REQUEST['newpassword'];
		$newpassword2 = $_REQUEST['newpassword2'];
		$condition["password"] = $newpassword;
		if($newpassword == $newpassword2)
		{
			$condition["password"] = $newpassword;
			if(DB::Update("user",$userid,$condition))
			{
				$result = array('code'=>0,'message'=>'更新成功');
			}else{
				$result = array('code'=>1,'message'=>'更新失败');
			}
		}else{
				$result = array('code'=>2,'message'=>'请确认新密码是否一致');
		}
		
	}
	
	//更新用户信息
	elseif ($_REQUEST['act']=='updateuser') {		
		if(DB::Update("user",$userid,$_REQUEST))
		{
			$result = array('code'=>0,'message'=>'更新成功');
		}else{
			$result = array('code'=>1,'message'=>'更新失败');
		}
	}
	
	//意见反馈
	elseif($_REQUEST['act'] == 'feedback')
	{
		$insert['user_id'] = $userid;
		$insert['content'] = htmlspecialchars($_REQUEST['content']);
		$insert['create_time'] = time();
		$id = DB::Insert('feedback', $insert);
		if($id>0)
		{
			$result = array('code'=>0,'message'=>'反馈成功');
		}else{
			$result = array('code'=>1,'message'=>'反馈失败');
		}
	}
}

echo json_encode($result);
exit();



?>