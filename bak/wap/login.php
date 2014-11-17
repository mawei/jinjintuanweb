<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if ( $_POST ) {
	if(isset($_GET['app']) && $_GET['app']=='yes')
	{
		$mobile = addslashes($_POST['mobile']);
		$password = addslashes($_POST['password']);
		$condition['username'] = $mobile;
		$condition['password'] = $password;
		$select = 'id';
		$result = DB::LimitQuery('user',array('condition'=>$condition,'select'=>$select) );
		if(count($result)>0)
		{
			echo $result[0]['id'];exit();
		}else {
			echo 0;exit();
		}
	}else{
		$login_user = ZUser::GetLogin($_POST['mobile'], $_POST['password']);
		if ( !$login_user ) {
			Session::Set('error', '登录失败');
			redirect(WEB_ROOT . '/account/login.php');
		} else {
			Session::Set('user_id', $login_user['id']);
			if (abs(intval($_POST['auto_login']))) {
				ZLogin::Remember($login_user);
			}
			ZUser::SynLogin($login_user['username'], $_POST['password']);
			ZCredit::Login($login_user['id']);
			redirect(get_loginpage(WEB_ROOT . '/index.php'));
		}
	}
}
$currefer = strval($_GET['r']);
if ($currefer) { Session::Set('loginpage', udecode($currefer)); }
$pagetitle = '登录';
include template('account_login');
