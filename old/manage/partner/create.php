<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/../team/SyncTeam.php');

need_manager();
need_auth('market');
if ( $_POST ) {
	if($_POST['longlat'] == "")
	{
		$sync = new SyncTeam();
		$result = $sync->getLocation($_POST['address']);
		if($result['status'] == 0)
		{
			$_POST['longitude'] = $result['result']['location']['lng'];
			$_POST['latitude'] = $result['result']['location']['lat'];
		}
	}else{
		$result = explode(",", $_POST['longlat']);
		{
			$_POST['longitude'] = $result[0];
			$_POST['latitude'] = $result[1];
		}		
	}
	$table = new Table('partner', $_POST);
	$table->SetStrip('location', 'other');
	$table->create_time = time();
	$table->user_id = $login_user_id;
	$table->password = ZPartner::GenPassword($table->password);
	$table->group_id = abs(intval($table->group_id));
	$table->city_id = abs(intval($table->city_id));
	$table->open = (strtoupper($table->open)=='Y') ? 'Y' : 'N';
	$table->display = (strtoupper($table->display)=='Y') ? 'Y' : 'N';
	$table->image = upload_image('upload_image', null, 'team', true);
	$table->image1 = upload_image('upload_image1', null, 'team');
	$table->image2 = upload_image('upload_image2', null, 'team');
	$table->insert(array(
		'username', 'user_id', 'city_id', 'title', 'group_id',
		'bank_name', 'bank_user', 'bank_no', 'create_time',
		'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
		'password', 'address', 'open', 'display',
		'image', 'image1', 'image2', 'longitude','latitude',
	));
	redirect( WEB_ROOT . '/manage/partner/index.php');
}

include template('manage_partner_create');
