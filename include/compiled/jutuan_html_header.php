<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="<?php echo $INI['sn']['sn']; ?>">
<head>
	<meta http-equiv=content-type content="text/html; charset=UTF-8">
<?php if(!$pagetitle||$request_uri=='index'){?>
	<title><?php echo $INI['system']['sitename']; ?> - <?php echo $INI['system']['sitetitle']; ?>|<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折|<?php echo $city['name']; ?>优惠券|<?php echo $city['name']; ?>精品团购|<?php echo $city['name']; ?>团购网|<?php echo $city['name']; ?>团购在线|<?php echo $city['name']; ?>团购网站</title>
<?php } else { ?>
	<title><?php echo $pagetitle; ?> | <?php echo $INI['system']['sitename']; ?> - <?php echo $INI['system']['sitetitle']; ?> |<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折<?php echo $INI['system']['subtitle']; ?></title>
<?php }?>
	<meta name="description" content="<?php echo $INI['system']['sitetitle']; ?>|<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折|<?php echo $city['name']; ?>组团消费|<?php echo $city['name']; ?>优惠|<?php echo $city['name']; ?>精品团购|<?php echo $city['name']; ?>聚团吧" />
	<meta name="keywords" content="<?php echo $INI['system']['sitename']; ?>, <?php echo $city['name']; ?>, <?php echo $city['name']; ?><?php echo $INI['system']['sitename']; ?>，<?php echo $city['name']; ?>购物，<?php echo $city['name']; ?>团购，<?php echo $city['name']; ?>打折，聚团吧，团购，打折，精品团购，团购网，优惠券，团购在线，精品消费，购物指南，消费指南" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<link href="<?php echo $INI['system']['wwwprefix']; ?>/feed.php?ename=<?php echo $city['ename']; ?>" rel="alternate" title="订阅更新" type="application/rss+xml" />
	<link rel="shortcut icon" href="/static/icon/favicon.ico" />
	<link rel="stylesheet" href="/static/css/index.css" type="text/css" media="screen" charset="utf-8" />
	<script type="text/javascript">var WEB_ROOT = '<?php echo WEB_ROOT; ?>';</script>
	<script type="text/javascript">var LOGINUID= <?php echo abs(intval($login_user_id)); ?>;</script>
	<script src="/static/js/index.js" type="text/javascript"></script>
	<?php echo Session::Get('script',true);; ?>
</head>
<body class="<?php echo $request_uri=='index'?'bg-alt':'newbie'; ?>">
<div id="pagemasker"></div><div id="dialog"></div>
<div id="doc">
