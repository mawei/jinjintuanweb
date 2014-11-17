<?php
session_start();
require_once(dirname(dirname(__FILE__)) . '/app.php');

//send sms
if (isset($_GET['mobile']))
{
	$mobile = $_GET['mobile'];
	$captcha_code = mt_rand(111111, 999999);
	$_SESSION['captcha_code'] = $captcha_code;
	sms_code($mobile, $captcha_code);
	exit();
}
if ( $_POST ) {
		verify_captcha('verifyregister', WEB_ROOT . '/account/signup.php');
		$u = array();
		$u['username'] = strval($_POST['mobile']);
		$u['password'] = strval($_POST['password']);
		$u['mobile'] = strval($_POST['mobile']);
		$captcha_code = addslashes($_POST['captcha_code']);
		
		if($captcha_code != $_SESSION['captcha_code'])
		{
			Session::Set('error', '验证码错误');
		}
		else if ($_POST['password2']==$_POST['password'] && $_POST['password']) {
			if ( $user_id = ZUser::Create($u) ) {
				ZCredit::Register($user_id);
				if ( option_yes('emailverify') ) {
					mail_sign_id($user_id);
					Session::Set('unemail', $_POST['email']);
					redirect( WEB_ROOT . '/account/signuped.php');
				}
	            else {
					ZLogin::Login($user_id);
					redirect(get_loginpage(WEB_ROOT . '/index.php'));
				}
			} else {
				$au = Table::Fetch('user', $_POST['mobile'], 'mobile');
				if ( $au ) {
					Session::Set('error', '注册失败，手机号码已被使用');
				}
			}
		} else {
			Session::Set('error', '注册失败，密码设置有问题');
		}
}

$pagetitle = '注册';
include template('account_signup');
