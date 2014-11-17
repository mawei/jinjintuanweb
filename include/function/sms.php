<?php
function sms_send($phone, $content) {
	global $INI;
	if (mb_strlen($content, 'UTF-8') < 20) {
		return '短信长度低于20汉字？长点吧～';
	}
	$result = send_sms("355e91e02a95574559ebba5a3c1af6c2",$content,$phone);
	return trim(strval($result['code']))=='OK' ? true : strval($res);
}

function sms_secret($mobile, $secret, $enable=true) {
	global $INI;
	$funccode = $enable ? '订阅' : '退订';
	$content = "{$INI['system']['sitename']}，您的手机号：{$mobile} 短信{$funccode}功能认证码：{$secret}。";
	sms_send($mobile, $content);
}

function sms_bind($mobile, $secret) {
	global $INI;
	$content = "{$INI['system']['sitename']}，您的手机号：{$mobile} 绑定码：{$secret}。";
	sms_send($mobile, $content);
}

function sms_code($mobile, $code) {
	global $INI;
	//$content = "{$INI['system']['sitename']}，验证码：{$code}。祝您购物愉快！";
	$content = "您的验证码是{$code}。如非本人操作，请忽略本短信【金金团】";
	sms_send($mobile, $content);
}

function sms_usecoupon($coupon, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $coupon['user_id']);
	$order = Table::Fetch('order', $coupon['order_id']);
	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	$team = Table::Fetch('team', $coupon['team_id']);
	$coupon['use'] = date('m月d日 H时i分');
	$coupon['name'] = $team['product'];
	$content = render('manage_tpl_usecoupon', array(
				'coupon' => $coupon,
				'user' => $user,
				));
	sms_send($mobile, $content);
}

function sms_coupon($coupon, $mobile=null) {
	global $INI;
	if ( $coupon['consume'] == 'Y' 
			|| $coupon['expire_time'] < strtotime(date('Y-m-d'))) {
		return $INI['system']['couponname'] . '已失效';
	}

	$user = Table::Fetch('user', $coupon['user_id']);
	$order = Table::Fetch('order', $coupon['order_id']);

	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	if (!Utility::IsMobile($mobile)) {
		return '请设置合法的手机号码，以便接受短信';
	}
	$team = Table::Fetch('team', $coupon['team_id']);
	$partner = Table::Fetch('partner', $coupon['partner_id']);

	$coupon['end'] = date('Y-n-j', $coupon['expire_time']);
	$coupon['name'] = $team['product'];
	$content = render('manage_tpl_smscoupon', array(
				'partner' => $partner,
				'coupon' => $coupon,
				'user' => $user,
				));

	if (true===($code=sms_send($mobile, $content))) {
		Table::UpdateCache('coupon', $coupon['id'], array(
					'sms' => array('`sms` + 1'),
					'sms_time' => time(),
					));
		return true;
	}
	return $code;
}

function sms_voucher($voucher, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $voucher['user_id']);
	$order = Table::Fetch('order', $voucher['order_id']);

	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	if (!Utility::IsMobile($mobile)) {
		return '请设置合法的手机号码，以便接受短信';
	}

	$team = Table::Fetch('team', $voucher['team_id']);
	$partner = Table::Fetch('partner', $team['partner_id']);

	$voucher['end'] = date('Y-n-j', $team['expire_time']);
	$voucher['name'] = $team['product'];
	$content = render('manage_tpl_smsvoucher', array(
				'partner' => $partner,
				'voucher' => $voucher,
				'user' => $user,
				));

	if (true===($code=sms_send($mobile, $content))) {
		Table::UpdateCache('voucher', $voucher['id'], array(
					'sms' => array('`sms` + 1'),
					'sms_time' => time(),
					));
		return true;
	}
	return $code;
}

function sms_express($id, &$flag=null) {
	$order = Table::Fetch('order', $id);
	$team = Table::Fetch('team', $order['team_id']);
	if (!$order['express_id']) {
		$flag = 'No express';
		return false;
	}
	$express = Table::Fetch('category', $order['express_id']);
	$html = render('manage_tpl_smsexpress', array(
				'team' => $team,
				'express_name' => $express['name'],
				'express_no' => $order['express_no'],
				));
	$phone = $order['mobile'];
	if ( true === ($flag = sms_send($phone, $html)) ) {
		Table::UpdateCache('order', $id, array(
			'sms_express' => 'Y',
		));
		return true;
	}
	return false;
}

function sms_express_buy($order, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $order['user_id']);
	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	$team = Table::Fetch('team', $order['team_id']);
	$content = render('manage_tpl_expressbuy', array(
				'expressproduct' => $team['product'],
				));
	sms_send($mobile, $content);
}

function sms_buy($order, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $order['user_id']);
	if (!Utility::IsMobile($mobile)) {
	$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
			}
		}
	$team = Table::Fetch('team', $order['team_id']);
	$content = render('manage_tpl_buycoupon', array(
			'product' => $team['product'],
			));
	sms_send($mobile, $content);
}

function sms_expire($order, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $order['user_id']);
	if (!Utility::IsMobile($mobile)) {
			$mobile = $order['mobile'];
			if (!Utility::IsMobile($mobile)) {
				$mobile= $user['mobile'];
			}
	}
	if (!Utility::IsMobile($mobile)) {
			return '请设置合法的手机号码，以便接受短信';
	}
	$team = Table::Fetch('team', $order['team_id']);
	$partner = Table::Fetch('partner', $team['partner_id']);
	$expire = date('Y-m-d', $team['expire_time']);
	$coupon['name'] = $team['product'];
	$content = render('manage_tpl_smsexpire', array(
					'expire' => $expire,
					'team' => $team,
				));
	if (true===($code=sms_send($mobile, $content))) {
			Table::UpdateCache('team', $order['team_id'], array(
					'send_time' => time(),
					));
	return true;
	}
	return $code;
}

/**
 * url 为服务的url地址
 * query 为请求串
 */
function sock_post($url,$query){
	$data = "";
	$info=parse_url($url);
	$fp=fsockopen($info["host"],80,$errno,$errstr,30);
	if(!$fp){
		return $data;
	}
	$head="POST ".$info['path']." HTTP/1.0\r\n";
	$head.="Host: ".$info['host']."\r\n";
	$head.="Referer: http://".$info['host'].$info['path']."\r\n";
	$head.="Content-type: application/x-www-form-urlencoded\r\n";
	$head.="Content-Length: ".strlen(trim($query))."\r\n";
	$head.="\r\n";
	$head.=trim($query);
	$write=fputs($fp,$head);
	$header = "";
	while ($str = trim(fgets($fp,4096))) {
		$header.=$str;
	}
	while (!feof($fp)) {
		$data .= fgets($fp,4096);
	}
	return $data;
}

/**
 * 模板接口发短信
 * apikey 为云片分配的apikey
 * tpl_id 为模板id
 * tpl_value 为模板值
 * mobile 为接受短信的手机号
 */
function tpl_send_sms($apikey, $tpl_id, $tpl_value, $mobile){
	$url="http://yunpian.com/v1/sms/tpl_send.json";
	$encoded_tpl_value = urlencode("$tpl_value");
	$post_string="apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
	return sock_post($url, $post_string);
}

/**
 * 普通接口发短信
 * apikey 为云片分配的apikey
 * text 为短信内容
 * mobile 为接受短信的手机号
 */
function send_sms($apikey, $text, $mobile){
	$url="http://yunpian.com/v1/sms/send.json";
	$encoded_text = urlencode("$text");
	$post_string="apikey=$apikey&text=$encoded_text&mobile=$mobile";
	return sock_post($url, $post_string);
}
