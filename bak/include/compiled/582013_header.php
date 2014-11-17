<?php include template("html_header");?>
<script src="/wap.js" type="text/javascript"></script><div id="topbar">
<div class="w">
<span id="switchCity" class="cityname"><?php echo $city['name']; ?></span><a href="/city.php" id="switchCityUrl">[切换城市]</a>
<ul class="topnav">
<li><a rel="sidebar" title="<?php echo $INI['system']['sitename']; ?>" href="#" rel="nofollow" onclick="jQuery.addFavorite('<?php echo $INI['system']['wwwprefix']; ?>','<?php echo $INI['system']['sitename']; ?>');return false;">加入收藏</a></li>
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
<a href="/index.php" id="logo"><img alt="<?php echo $INI['system']['sitename']; ?>" src="/static/theme/58/css/img/logo.gif"></a>
<!-- <div id="minbanner">
<?php echo 
$quyu_id = $_GET['aid_s'];
$quyu = Table::Fetch('category', $quyu_id,'id');
; ?>

<div class="minbanner">

<a class="baohu" target="_blank" rel="nofollow" href="/">团购网团购用户保障机制，15天未消费一键退款</a>
</div> 
</div> -->
<div id="searhbar" class="rss">
	<form id="indexSearchForm" method=get action="/team/index.php">
	  <input type="text" id="searchW" name="searchName" value="请输入商品、商家名称" class="kw"  autocomplete="off"/>
	  <input type="submit" name="button" value="搜索" class="searchbtn" >
	  <label for="searchW" class="searchico"></label>
	  	<script type="text/javascript">
					$().ready(function(){
						$('#searchW').focus(function(){
							var value = $.trim($('#searchW').val());
							if(value == "请输入商品、商家名称")
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
								$('#searchW').val("请输入商品、商家名称");
							}
							
						});
						$("#indexSearchForm").submit( function () {
							var value = $.trim($('#searchW').val());
							if(value == "" || value == "请输入商品、商家名称")
								return false;
//							else{
//									$("#indexSearchForm").attr("action","/team/index.php" + value + "/");
//							}
						} );
					});
					
				</script>
	</form>
</div>

<!-- <div id="hotkeys"><a href="/team/index.php?searchName=%E5%8D%81%E4%B8%80%E5%85%A8%E7%99%BE%E8%B4%A7%E4%BF%83%E9%94%80&button=%E6%90%9C%E7%B4%A2" title="十一全百货促销" target="_blank">十一全百货促销</a> <a href="/team/index.php?searchName=%E5%8A%9E%E5%85%AC%E5%AE%A4%E9%9B%B6%E9%A3%9F&button=%E6%90%9C%E7%B4%A2" title="办公室零食" target="_blank">办公室零食</a> <a href="/team/index.php?searchName=%E6%96%B0%E6%AC%BE%E7%A7%8B%E8%A3%85&button=%E6%90%9C%E7%B4%A2" title="新款秋装" target="_blank"><font color="red">新款秋装</font></a> <a href="/team/index.php?searchName=%E7%A7%8B%E5%86%AC%E5%9B%9B%E4%BB%B6%E5%A5%97&button=%E6%90%9C%E7%B4%A2" title="秋冬四件套" target="_blank">秋冬四件套</a> <a href="/team/index.php?searchName=%E5%8D%81%E4%B8%80%E5%A4%A7%E4%BF%83&button=%E6%90%9C%E7%B4%A2" title="十一大促" target="_blank">十一大促</a> </div>
 -->

</div>


<DIV class=nav_bj>


<div id="navbar">

<UL id=nav class=nav>
	<?php include template("block_navigator");?>
</ul>

		<?php if($login_user){?>
<ul class="loginbar logined" name="uc1" id="uc">
	<li class="ucname">欢迎您，<span id="appnick"><?php if($_SESSION['ali_token']){?><?php echo mb_strimwidth($login_user['realname'],0,10); ?>！<?php } else { ?><?php echo mb_strimwidth($login_user['username'],0,10); ?>！<?php }?></span></li>
	<li class="ulist1" style="PADDING-LEFT: 10px; MARGIN-LEFT: 10px"><a href="/order/index.php">用户中心</a>
	    <ul class="downlist" style="display:none;"> 
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

$(document).ready(function(){
    $("li.ulist1").hover(function(){ $(this).addClass('hover'); $('#uc ul').show();},
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
