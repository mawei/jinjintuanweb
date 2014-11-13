<?php include template("html_header");?>

<div id="topbar">
<div class="w">
<span id="switchCity" class="cityname"><?php echo $city['name']; ?></span><a href="/city.php" id="switchCityUrl">[切换城市]</a>
<ul class="topnav">
<li><a rel="sidebar" title="<?php echo $INI['system']['sitename']; ?>" href="#" rel="nofollow" onclick="jQuery.addFavorite('<?php echo $INI['system']['wwwprefix']; ?>','<?php echo $INI['system']['sitename']; ?>');return false;">收藏</a></li>
<li onmouseover="this.className='hover'" onmouseout="this.className=''">
<a target="_blank" href="/help/tour.php" class="help">帮助中心<b class="ico down"></b></a>
<div class="downlist">
<a href="/help/tour.php" target="_blank">如何团购</a>
<a href="/help/faqs.php" target="_blank">常见问题</a>
<a href="/help/zuitu.php" target="_blank">本站概念</a>
<a href="/feedback/suggest.php" target="_blank">意见反馈</a>
<a href="/feedback/seller.php" target="_blank">商务合作</a>
</div>
</li>

<li class="last"><a rel="nofollow" class="rss" id="headerMailButton" href="/subscribe.php?ename=<?php echo $city['ename']; ?>">邮件订阅<b class="ico mail"></b></a></li>
</ul>
</div>
</div>
<div id="navlist">
	<ul>
		<li id="navbln"><a href="/account/invite.php">邀请好友</a></li>
		<li class="sel"><a href="city.php?ename=<?php echo $city['ename']; ?>"><?php echo $city['name']; ?>团购</a></li>
		<?php if(option_yes('smssubscribe')){?>
		<li><span><a class="sms" onclick="X.miscajax('sms','subscribe');">&raquo; 短信订阅</a>&nbsp; <a class="sms" onclick="X.miscajax('sms','unsubscribe');">&raquo; 取消手机订阅</a></span></li>
		<?php }?>
	<?php if(option_yes('trsimple')){?>
		<li><a href="javascript:;" onclick="return X.misc.locale();">简繁转换</a></li>
	<?php }?>
		<li id="navbrn"><a id="verify-coupon-id" href="javascript:;"><?php echo $INI['system']['couponname']; ?>登记</a></li>
	</ul>
</div>
<div id="header">
<div class="w">
<a href="/index.php" id="logo"><img width="161" height="42" alt="<?php echo $INI['system']['sitename']; ?>" src="/static/theme/ev56_58/css/img/logo.gif"></a>
<div class="minbanner"><div id="minbanner"><a href="/help/tour.php" class="baohu" rel="nofollow" target="_blank"><?php echo $INI['system']['sitename']; ?>团购用户保障机制，15天未消费一键退款</a></div></div>
<div id="searhbar" class="rss">
	<form id="indexSearchForm" method=get action="/team/index.php">
	  <input type="text" id="searchW" name="searchName" value="请输入商品、关键字" class="kw"  autocomplete="off"/>
	  <input type="submit" name="button" value="搜索" class="searchbtn" >
	  <label for="searchW" class="searchico"></label>
	  	<script type="text/javascript">
					$().ready(function(){
						$('#searchW').focus(function(){
							var value = $.trim($('#searchW').val());
							if(value == "请输入商品、关键字")
							{
								$('#searchW').val("");
							}
							this.parentNode.className='hover';	
							
						});
						$('#searchW').blur(function(){
							var value = $.trim($('#searchW').val());
							if(value == "")
							{
								this.parentNode.className='';
								$('#searchW').val("请输入商品、关键字");
							}
							
						});
						$("#indexSearchForm").submit( function () {
							var value = $.trim($('#searchW').val());
							if(value == "" || value == "请输入商品、关键字")
								return false;
//							else{
//									$("#indexSearchForm").attr("action","/team/index.php" + value + "/");
//							}
						} );
					});
					
				</script>
	</form>
</div>
</div>
<div id="navbar">
<ul class="nav" id="nav">
<?php include template("block_navigator");?>
</ul>

		<?php if($login_user){?>
<ul class="loginbar logined" name="uc1" id="uc">
	<li class="ucname">欢迎您，<span id="appnick"><?php if($_SESSION['ali_token']){?>
				<?php echo mb_strimwidth($login_user['realname'],0,10); ?>！
                <?php } else { ?>
				<?php echo mb_strimwidth($login_user['username'],0,10); ?>！
				<?php }?></span></li>
	<li class="ulist"><a href="/order/index.php">用户中心</a>
	    <ul class="downlist"> 
	        <?php echo current_account(null); ?>
	        <li class="shadow"></li>
	    </ul>
	</li>
	<li><a id="logout1" href="/account/logout.php">退出</a></li>
</ul>
		<?php } else { ?>
 <ul class="loginbar nologin" name="uc2">
<li><a href="/account/login.php">登录</a></li>
<li><a href="/account/signup.php">注册</a></li>
</ul>
		<?php }?>
</div>
</div>

<script type="text/javascript">
//添加到收藏夹方法
jQuery.addFavorite=function(sURL, sTitle){
    try{
        window.external.addFavorite(sURL, sTitle);
    }catch (e){
        try{
            window.sidebar.addPanel(sTitle, sURL, "");
        }catch (e){
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }	
}

$(document).ready(function(){
    $("li.ulist").hover(function(){ $(this).addClass('hover'); $('#uc ul').show();},
       function(){$('#uc ul').hide();$(this).removeClass('hover');});
});

function hidetips(){
       jQuery.ajax({
               url: "/ajax/hidetips",
               type: 'post'
           });
       $("#errorTips").hide();
       $("#successTips").hide();
   }
</script>
<?php if($session_notice=Session::Get('notice',true)){?>
<div class="mtips" style="position:relative;" id="successTips"><p><?php echo $session_notice; ?></p><em class="close" onclick="hidetips();">close</em></div>
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="mtips" style="position:relative;" id="errorTips"><p><?php echo $session_notice; ?></p><em class="close" onclick="hidetips();">close</em></div>
<?php }?>
