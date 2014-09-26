<?php include template("header");?>

<div id="hdwteam" class="hdwteam">
<div id="bd" class="cf">
<!--a style="padding-left:2px" href="http://bbs.jutuanba.com" target="_blank"><img style="padding-bottom:5px;padding-left:2px" src="/static/img/bbsnotice.jpg" /></a-->
<a style="padding-left:2px" href="/team/allindex.php"><img style="padding-bottom:5px" src="/static/img/topbanner.jpg" /></a>

<?php if($team['close_time']){?>
	<div id="sysmsg-tip" class="sysmsg-tip-deal-close">
		<div class="sysmsg-tip-top"></div>
		<div class="sysmsg-tip-content">
			<div class="deal-close">
				<div class="focus">抱歉，您来晚了，<br />团购已经结束啦。</div>
				<div id="tip-deal-subscribe-body" class="body">
					<form id="tip-deal-subscribe-form" method="post" action="/subscribe.php" class="validator">
						<table>
							<tr>
								<td>不想错过明天的团购？立刻订阅每日最新团购信息：&nbsp;</td>
								<td><input type="text" name="email" class="f-text" value="" require="true" datatype="email" /></td>
								<td>&nbsp;<input class="commit" type="submit" value="订阅" /></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		<span id="sysmsg-tip-close" class="sysmsg-tip-close" onclick="document.getElementById('sysmsg-tip').style.display='none'">关闭</span>
		</div>
		<div class="sysmsg-tip-bottom"></div>
	</div>
<?php }?>

<?php if($order){?>
	<div id="sysmsg-tip" >
		<div class="sysmsg-tip-top"></div>
		<div class="sysmsg-tip-content">您已经下过订单，但还没有付款。<a href="/order/check.php?id=<?php echo $order['id']; ?>">查看订单并付款</a>
		<span id="sysmsg-tip-close" class="sysmsg-tip-close" onclick="document.getElementById('sysmsg-tip').style.display='none'" >关闭</span>
		</div>
		<div class="sysmsg-tip-bottom"></div>
	</div>
<?php }?>
<div id="deal-default"> 
	<div id="deal-default">
	<div id="content">
			<div id="deal-intro1">

			</div>
			<div id="deal-intro" class="cf">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td width="7%">
						<?php if($team['close_time']==0){?>
						<a class="deal-today-link" href="/team.php?id=<?php echo $team['id']; ?>"><img src="/static/css/i/todaybuy.gif"/></a>
					</td>
					<td>
						<?php }?><h1><?php echo $team['title']; ?></h1>
					</td>
				</tr>
			</table>
					<h3 style="width:960px;height:1px;border-bottom:1px #e0e0e0 solid;margin-bottom:5px"></h3>
                <div class="main">
                    <div class="deal-buy">
                        <div class="deal-price-tag"></div>
					<?php if(($team['state']=='soldout')){?>
                        <p class="deal-price"><span class="deal-price-soldout"></span><strong style="font-size:40px;font-family:'Arial','黑体';font-weight:bold"><?php echo moneyit($team['team_price']); ?><font style="font-size:28px;font-family:'黑体';font-weight:bold">元</font></strong></p>
					<?php } else if($team['close_time']) { ?>
                        <p class="deal-price"><span class="deal-price-expire"></span><strong style="font-size:40px;font-family:'Arial','黑体';font-weight:bold"><?php echo moneyit($team['team_price']); ?><font style="font-size:28px;font-family:'黑体';font-weight:bold">元</font></strong></p>
					<?php } else { ?>
                        <p class="deal-price">
						<span><a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>><img src="/static/css/i/button-deal-buy.gif" /></a></span>
						<strong style="font-size:40px;font-family:'Arial','黑体';font-weight:bold"><?php echo moneyit($team['team_price']); ?><font style="font-size:28px;font-family:'黑体';font-weight:none">元</font></strong>
						</p>
					<?php }?>
                    </div>
                    <table class="deal-discount">
						<tr height="45"></tr>
                        <tr>
                            <td><?php echo $currency; ?><?php echo moneyit($team['market_price']); ?></td>
						<?php if(($team['market_price']>0&&$team['team_price']>0)){?>
                            <td><?php echo moneyit($discount_rate); ?>折</td>
						<?php } else { ?>
							<td>免费哦</td>
						<?php }?>
                            <td><?php echo $currency; ?><?php echo $discount_price; ?></td>
                        </tr>
                    </table>
					<?php if($team['close_time']==0){?>
					<?php if($team['state']=='none'){?>
<table width="100%" class="deal-box1 deal-status1" id="deal-status">
  <tr>
    <td rowspan="2" class="deal-buy-tip-top"><div style="padding-top:20px; padding-right:18px" align="center"><strong style="font-size:40px;font-family:'Arial';font-weight:bold;color:#ff0000;"><?php echo $team['now_number']; ?></strong></div></td>
    <td class="deal-buy-tip-btm">还差 <strong style="color:red"><?php echo $team['min_number']-$team['now_number']; ?></strong> 人到达起团数</td>
  </tr>
  <tr>
	<td>
		<div class="progress-pointer" style="padding-left:<?php echo $bar_size-$bar_offset; ?>px;"><span></span></div>
		<div class="progress-bar">
		<div class="progress-left" style="width:<?php echo $bar_size-$bar_offset; ?>px;"></div>
		<div class="progress-right "></div>
		</div>
		<div class="cf">
		<div class="min">0</div>
		<div class="max"><?php echo $team['min_number']; ?></div>
		</div>
	</td>
  </tr>
</table>
	<?php } else { ?>
	<div class="deal-box1 deal-status2 deal-status-open" id="deal-status">
		<div class="deal-buy-tip-top"><div style="padding-top:20px; padding-right:18px" align="center"><strong style="font-size:40px;font-family:'Arial';font-weight:bold;color:#f8308a;"><?php if($team['id']==109){?><?php echo $team['now_number']*7; ?><?php } else { ?><?php echo $team['now_number']; ?><?php }?></strong></div></div>
		<div class="deal-buy-on" style="line-height:250%;"><img src="/static/css/i/deal-buy-succ.gif"/> 团购成功！ <?php if($team['max_number']>$team['now_number']||$team['max_number']==0){?><br/>您还可以继续购买<?php }?></div>
	</div>
	<?php }?>
<?php } else { ?>
	<div class="deal-box1 deal-status-<?php echo $team['state']; ?>" id="deal-status">
	<div class="deal-buy-<?php echo $team['state']; ?>"></div>
	<div class="deal-buy-tip-total">共有<strong><font color="red"><?php if($team['id']==109){?><?php echo $team['now_number']*7; ?><?php } else { ?><?php echo $team['now_number']; ?><?php }?></font></strong>人购买</div>
	</div> 
<?php }?>

					<?php if($team['close_time']){?>
                    <div class="deal-box deal-timeleft deal-off" id="deal-timeleft" curtime="<?php echo $now; ?>000" diff="<?php echo $diff_time; ?>000">

						<div class="limitdate">
						<img src="/static/css/i/timeoff.gif" style="position:absolute;z-index:1;zoom:1;margin-top:0px" />
						<table width="80%" cellpadding="0" cellspacing="0" border="0" id="counter" style="margin-top:30px;float:right">
						<tr>
						<td><?php echo date('Y-m-d', $team['close_time']); ?></td>
						<td><?php echo date('H:i:s', $team['close_time']); ?></td>
						</tr>
						</table>
					</div>
					</div>
					<?php } else { ?>
                    <div class="deal-box deal-timeleft deal-on" id="deal-timeleft" curtime="<?php echo $now; ?>000" diff="<?php echo $diff_time; ?>000">
						<img src="/static/css/i/timegoon.gif" style="position:absolute;z-index:1;zoom:1;margin-top:0px" />
						<div class="limitdate" align="right">	
							<ul id="counter">
							<?php if($left_day>0){?>
								<li><span><?php echo $left_day; ?></span>天</li><li><span><?php echo $left_hour; ?></span>小时</li><li><span><?php echo $left_minute; ?></span>分钟</li>
							<?php } else { ?>
								<li><span><?php echo $left_hour; ?></span>小时</li><li><span><?php echo $left_minute; ?></span>分钟</li><li><span><?php echo $left_time; ?></span>秒</li>
							<?php }?>
							</ul>
						</div>
					</div>
					<?php }?>
				</div>
				
                <div class="side">
                    <div class="deal-buy-cover-img" id="team_images">
					<?php if($team['image1']||$team['image2']){?>
						<div class="mid">
							<ul>
								<li class="first"><img src="<?php echo team_image($team['image']); ?>"/></li>
							<?php if($team['image1']){?>
								<li><img src="<?php echo team_image($team['image1']); ?>"/></li>
							<?php }?>
							<?php if($team['image2']){?>
								<li><img src="<?php echo team_image($team['image2']); ?>"/></li>
							<?php }?>
							</ul>
							<div id="img_list">
								<a ref="1" class="active">1</a>
							<?php $imageindex=1;; ?>
							<?php if($team['image1']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							<?php if($team['image2']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							</div> 
						</div>
						<?php } else { ?>
							<img src="<?php echo team_image($team['image']); ?>"/>
						<?php }?>
					</div>
                </div>

	</div>
		 <div id="notice001"></div>
		 <div id="notice002">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:10px">
  <tr valign="top">
    <td width="300" style="border-right:1px #e8e8e8 dashed;padding-left:10px;padding-right:5px;color:#888888"><?php echo $team['summary']; ?></td>
    <td width="370" style="border-right:1px #e8e8e8 dashed;padding-left:10px;padding-right:5px;color:#888888"><?php echo $team['notice']; ?></td>
    <td width="280" style="padding-left:10px;padding-right:5px">
<p style="color:#535353;font-size:12px;">- 点此获得您的<a href="/account/invite.php"><b>专用邀请链接</b></a></p>
<p style="color:#535353;font-size:12px;">- 使用"<a href="/team/wiki.htm"><b>团购挂件</b></a>"邀请好友赚现金</p>
<p style="color:#535353;font-size:12px;">- 分享按钮，邀约好友获得<font color="#fb004d" size="+1"><strong>&nbsp;￥<?php echo $INI['system']['invitecredit']; ?>&nbsp;</strong></font>聚团返利！</p>
<?php include template("block_team_share");?>
		<div id="header-subscribe-body" class="subscribe">
		<form action="/subscribe.php" method="post" id="header-subscribe-form">
			<input type="hidden" name="city_id" value="<?php echo $city['id']; ?>" />
			<input id="header-subscribe-email" type="text" xtip="输入Email，订阅<?php echo $city['name']; ?>每日团购信息..." value="" class="f-text" name="email" />
			<input type="hidden" value="1" name="cityid" />
			<input type="submit" class="commit" value="订阅" />
		</form>
		</div>	
	</td>
  </tr>
</table>
		</div>
		<div id="deal-intro2"></div>
            <div id="deal-stuff" class="cf">
                <div class="clear box box-split">
                    <div class="box-top"></div>
                    <div class="box-content cf">
                        <div class="main">
							<script language="javascript">
								var nowID = 1;
								var nowSRC = "mark01-b";
								function chooseContent(id,src,src2){
									if(nowID != id){
										document.getElementById("but"+id).src = "static/css/i/"+src+".gif";
										document.getElementById("but"+nowID).src = "static/css/i/"+nowSRC+".gif";
									}
									nowSRC = src2;
									nowID = id;
								}
							</script>
							<a href="#" name="top"></a>
                            <h2 id="detail">
							<img src="/static/css/i/mark01-a.gif" id="but1" onmouseover="chooseContent(1,'mark01-a','mark01-b')" style="cursor:hand"/>
<!--							<img src="/static/css/i/mark04-b.gif" id="but4" onmouseover="chooseContent(4,'mark04-a','mark04-b')" style="cursor:hand"/>  -->
							<a href="#jtbs"><img src="/static/css/i/mark02-b.gif" id="but2" onmouseover="chooseContent(2,'mark02-a','mark02-b')" style="cursor:hand" border="0"/></a>
							<a href="#tmys"><img src="/static/css/i/mark03-b.gif" id="but3" onmouseover="chooseContent(3,'mark03-a','mark03-b')" style="cursor:hand" border="0"/></a>

							</h2>
						<?php if(trim(strip_tags($team['detail']))){?>
							<div class="blk detail" id="content1"><?php echo $team['detail']; ?>
							<?php include template("block_side_flv");?>
							</div>
						<?php }?>
						<?php if(trim(strip_tags($team['systemreview']))){?>
						<a href="#" name="jtbs"></a>
						<h2 id="detailit">聚团吧说 &nbsp;<a href="#top">Top</a></h2>
							<div class="blk review" id="content2"><?php echo $team['systemreview']; ?></div>
						<?php }?>
						<?php if(trim(strip_tags($team['userreview']))){?>
						<a href="#" name="tmys"></a>
						<h2 id="userreview">他们也说 &nbsp;<a href="#top">Top</a></h2>
							<div class="blk review" id="content3"><?php echo userreview($team['userreview']); ?></div>
						<?php }?>
<!--							<div class="blk detail" style="display:none" id="content4">
								<h2><?php echo $partner['title']; ?></h2>
								<div style="margin-top:10px;"><a href="<?php echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></div>
								<div style="margin-top:10px;"><?php echo $partner['location']; ?></div>
							</div>
-->
						</div>
                    <div class="side">	
<!--						<a href="http://www.jutuanba.com/team.php?id=56" target="_blanck"><img src="/static/img/bannerad00.jpg"/></a>     -->
						<a href="http://m.jutuanba.com" target="_blanck"><img src="/static/img/wapnotice.jpg"/></a>
						<?php include template("block_side_address");?>
						<?php include template("block_side_bulletin");?>
						<?php include template("block_side_ask");?>
						<?php include template("block_side_business");?>
						<?php include template("block_side_vote");?>
						<div align="center">
						<a href="http://www.joopop.com" target="_blanck"><img src="/static/img/joopopad.gif"/></a>
						<a href="http://www.mro86.com" target="_blanck"><img src="/static/img/mro86ad.jpg"/></a>
						</div>
<iframe scrolling="no" frameborder="0" class="streamIframe" src="http://www.connect.renren.com/widget/livewidget.do?api_key=8e3aeb078442474c91fb4cc1f61ad3ba&xid=test_xid&url=http%3A%2F%2Fwidget.renren.com%2FconnectWidget%2FwidgetConsole%3Fwizard%3Dlivestream&desp=%E5%A4%A7%E5%AE%B6%E5%BF%AB%E6%9D%A5%E8%AE%A8%E8%AE%BA%E5%90%A7" name="streamIFrame_0" style="width:270px;height: 550px;"></iframe>
<iframe id="sina_widget_1739303980" style="width:270px; height:500px;" frameborder="0" scrolling="no" src="http://v.t.sina.com.cn/widget/widget_blog.php?uid=1739303980&width=660&height=500&skin=wd_01&showpic=1"></iframe>
						
<!--                        <div id="side-business" style="border-top:1px #ccc dotted;margin-top:5px;padding-top:5px">
<h2 style="font-size:14px; color:orange">天天推出新鲜出炉的精品消费，畅享您所向往的享受！</h2>
<font size="2" color="#828283">我们为您从所在城市数万家餐厅、酒吧、KTV、影院等场所挑出精品服务，在全国数以亿计的品牌产品中挑出最受年轻人热捧的时尚潮品，折扣低到家，送货上您家！</font>

<h2 style="font-size:14px; color:orange">凑齐人数，无敌折扣拿到手</h2>
<font size="2" color="#828283">聚团吧就是集中散户抱团购买，只要达到最低团购人数，便可以超低价拥有！前所未有的促销价，靠的就是庞大的购买人数，团结创造价格奇迹！</font>

<h2 style="font-size:14px; color:orange">每天有惊喜，天天享团购</h2>
<font size="2" color="#828283">今天的消费不合意没关系，每天更新一款当季最流行的产品或服务，天天都可以享受新鲜、好玩，刺激的团购！</font>
						</div>  -->
					</div>
                        <div class="clear"></div>
                    </div>
                    <div class="box-bottom"></div>
                </div>
            </div>
    </div>
</div>
</div> <!-- bd1 end -->
</div> <!-- hdwteam end -->

<?php include template("footer");?>
