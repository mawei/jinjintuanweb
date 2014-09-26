<?php include template("html_header");?>
<div id="hdw">

	<div id="hd">
		<div class="bgtop">
			<div style="width:960px;margin:0 auto 0 auto;">
				<div id="logo"><a href="/index.php" class="link"><img src="/static/css/i/logo1.gif" /><img src="/static/css/i/logo2.gif" /></a></div>
				<div class="guides">
					<div class="city">
						<h2><?php echo $city['name']; ?></h2>
					</div>
					<?php if(count($hotcities)>1){?>
					<div id="guides-city-change" class="change">【切换城市】</div>
					<div id="guides-city-list" class="city-list">
						<ul><?php echo current_city($city['ename'], $hotcities); ?></ul>
					</div>
					<?php }?>
				</div>

					<div class="refer">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">	
							<tr>
							<td style="padding-left:10px">【<a href="#" target="_blank" style="color:#959595">西安聚众电子商务</a>】旗下品牌团购平台</td>
							<td>»  <a href="#" onclick="var strHref=window.location.href;this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jutuanba.com');" title="聚团吧-一天一团购，方便你我他" style="color:#959595">设为首页</a>   »  <a href="#" onClick="window.external.addFavorite('http://www.jutuanba.com','聚团吧')" title="聚团吧-一天一团购，精彩每一天" style="color:#959595">收藏聚团吧</a>   »  <a href="/biz/" style="color:#959595">商家登录入口</a></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;<a href="/account/invite.php">点此邀请好友购买返<font color="#eaff00"><b>&nbsp;￥<?php echo $INI['system']['invitecredit']; ?>&nbsp;</b></font>元现金</a>&nbsp;&nbsp;&nbsp;&raquo;&nbsp;<a id="verify-coupon-id" href="javascript:;"><?php echo $INI['system']['couponname']; ?>验证及消费登记</a>&nbsp;&nbsp;&nbsp;&raquo;&nbsp;<a href="javascript:;" onclick="return X.misc.locale();">简繁转换</a></td>
							</tr>				
						</table>
					</div>
				
				<div id="header-subscribe-body" class="subscribe">
		<?php if(option_yes('smssubscribe')){?>
		<span><a class="sms" onclick="X.miscajax('sms','subscribe');">&raquo; 短信订阅，免费！</a>&nbsp; <a class="sms" onclick="X.miscajax('sms','unsubscribe');">&raquo; 取消手机订阅</a></span>
		<?php }?>
					<form action="/subscribe.php" method="post" id="header-subscribe-form">
						<input type="hidden" name="city_id" value="<?php echo $city['id']; ?>" />
						<input id="header-subscribe-email" type="text" xtip="输入Email，订阅<?php echo $city['name']; ?>每日团购信息..." value="" class="f-text" name="email" />
						<input type="hidden" value="1" name="cityid" />
						<input type="submit" class="commit" value="订阅" />
					</form>
				</div>
			</div>
		</div>
		<div style="background:#a00f0a;width:100%;margin:0 auto;height:39px;">
			<div style="position:absolute;z-index:10;margin-top:0px;float:left;padding-left:29%;*padding-left:18%"><img src="/static/css/i/icon_new.gif"/></div>
			<div style="width:984px;margin:0 auto 0 auto;">
				<ul class="nav cf"><?php echo current_frontend(); ?></ul>
				<?php if($login_user){?>
				<div class="logins">
					<ul id="account">
						<li class="username">欢迎您，<?php echo $login_user['username']; ?>！</li>
						<li class="account"><a href="/order/index.php" id="myaccount" class="account">我的<?php echo $INI['system']['abbreviation']; ?></a></li>
						<li class="logout"><a href="/account/logout.php">退出</a></li>
					</ul>
					<div class="line islogin"></div>
				</div>		
				<ul id="myaccount-menu">
					<li><a href="/order/index.php">我的订单</a></li>
					<li><a href="/coupon/index.php">我的<?php echo $INI['system']['couponname']; ?></a></li>
					<li><a href="/account/refer.php">我的邀请</a></li>
					<li><a href="/credit/index.php">账户余额</a></li>
					<li><a href="/account/settings.php">帐户设置</a></li>
					<?php if(is_manager(false, true)){?>
					<li><a href="/manage/index.php">管理<?php echo $INI['system']['abbreviation']; ?></a></li>
					<?php }?>
				</ul>
				<?php } else { ?>
				<div class="logins">
					<ul id="account">
						<li class="login"><a href="/account/login.php">登录</a></li>
						<li class="signup"><a href="/account/signup.php">注册</a></li>				</ul>
					<div class="line "></div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">关闭</span></div></div> 
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">关闭</span></div></div> 
<?php }?>
