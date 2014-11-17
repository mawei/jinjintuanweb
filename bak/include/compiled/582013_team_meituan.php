<?php include template("header");?>

<?php if($order){?>
		<div class="mtips" id="nopayDiv"><span class="red">您已经下过订单，但还没有付款。（<a id="payurl" href="/order/check.php?id=<?php echo $order['id']; ?>">点击付款</a>）</span></div>
<?php }?> 
<script src="/static/theme/58/js/jquery.lazyload.mini.js" type="text/javascript"></script>
	<?php include template("block_navigator_ev_s");?>
<div id="main">
<div class="listerouter">
<div class="lister">
	
	<?php if(is_array($teams_ev56_sql)){foreach($teams_ev56_sql AS $tindex=>$oneev56) { ?>
  															<dl class="tuanitem">
				<dt>
					<a  id="teamfirsturl<?php echo $oneev56['id']; ?>"  href="/team.php?id=<?php echo $oneev56['id']; ?>" target="_blank"><img width="294" heigth="184" alt="<?php echo $oneev56['title']; ?>" title="<?php echo $oneev56['title']; ?>" src="<?php echo team_image($oneev56['image']); ?>" /></a>
<!--start 商户调用-->
<?php 

$team_partner_id = $oneev56['partner_id'];
$team_partner = Table::Fetch('partner', $team_partner_id);
; ?>					
<?php if($oneev56['partner_id']){?>											
								<i class="localmask"></i>
								<div class="local" title="<?php echo $team_partner['title']; ?>">
									商户：<?php echo $team_partner['title']; ?>
								</div>
<?php }?> 				

						     	<?php if($oneev56['team_tags'] == 1){?>
								    <i class="hot" title="今日新单"></i>
								<?php } else if($oneev56['team_tags'] == 2) { ?>
                                    <i class="hot2" title="免预约"></i>
                                 <?php } else if($oneev56['team_tags'] == 12) { ?>
                                    <i class="hot" title="今日新单"></i>
                                    <i class="hot1" title="免预约"></i>
								<?php }?>
                            
				</dt>
				<dd class="des">
					<h2>
						<a  id="teamsecondurl<?php echo $oneev56['id']; ?>"  target="_blank" href="/team.php?id=<?php echo $oneev56['id']; ?>" title="<?php echo $oneev56['title']; ?>" class="c_b">
							<span class="c_r"> <?php echo team_discount($oneev56); ?>折：</span>
							<?php echo $oneev56['title']; ?>
						</a>
					</h2>
				<div class="gobuy">
											<a  id="teamthirdurl<?php echo $oneev56['id']; ?>"  href="/team.php?id=<?php echo $oneev56['id']; ?>" target="_blank" class="<?php if(($oneev56['state']=='soldout')){?>soldout_i<?php } else if($oneev56['close_time']) { ?>soldout_i<?php } else { ?>golook<?php }?>">去看看</a>
										<span class="nprice"><i>&yen;</i><?php echo moneyit($oneev56['team_price']); ?></span>
				</div>
				</dd>
				<dd class="btmbar">
					<span class="oprice">原价：&yen;<?php echo moneyit($oneev56['market_price']); ?></span>
										<span class="savemoney">节省：&yen;<?php echo moneyit($oneev56['market_price']-$oneev56['team_price']); ?></span>
											<span class="ordernums"><b><?php echo $oneev56['now_number']; ?></b>人已购买</span>
									</dd>
				<dd class="shadow"></dd>
				</dl>				
		  												
	<?php }}?>				
		  																
		  																
		  																
		    <div class="clear"></div>
</div>
<?php if((option_yes('indexmulti')&& option_yes('indexpage')) ){?>
					<div  class="class_quick_fm"><?php echo $pagestring; ?></div>	
<?php }?>

</div>
</div>







<!----<div align="center">
<div class="l_tj" style="" id="container_rmtj">
<div class="l_bar"><b>看过餐饮美食团购的用户还看过</b><a href="http://www.baifendian.com" target="_blank" class="bfd_img_logo" title="百分点推荐引擎"></a></div>
   
    <div class="lister_4" id="container_rmtj4s"><dl class="rdl_2">
	<dt>
		<a href="/team.php?id=<?php echo $oneev56['id']; ?>" target="_blank" title="<?php echo $oneev56['title']; ?>">
			<img width="210" height="131" src="<?php echo team_image($oneev56['image']); ?>"><?php echo $oneev56['title']; ?>
		</a>
	</dt>
	<dd class="info">
		<span class="ltext">
			<i>¥</i>
			<?php echo moneyit($oneev56['team_price']); ?>
		</span>
		<span class="rtext"><?php echo $oneev56['now_number']; ?>人已购买</span>
	</dd>
	<dd class="zk_t"><b><?php echo team_discount($team); ?></b>折</dd>
</dl>

<dl class="rdl_2">
	<dt>
		<a href="/team.php?id=<?php echo $oneev56['id']; ?>" target="_blank" title="<?php echo $oneev56['title']; ?>">
			<img width="210" height="131" src="<?php echo team_image($oneev56['image']); ?>"><?php echo $oneev56['title']; ?>
		</a>
	</dt>
	<dd class="info">
		<span class="ltext">
			<i>¥</i>
			<?php echo moneyit($oneev56['team_price']); ?>
		</span>
		<span class="rtext"><?php echo $oneev56['now_number']; ?>人已购买</span>
	</dd>
	<dd class="zk_t"><b><?php echo team_discount($team); ?></b>折</dd>
</dl>


<dl class="rdl_2">
	<dt>
		<a href="/team.php?id=<?php echo $oneev56['id']; ?>" target="_blank" title="<?php echo $oneev56['title']; ?>">
			<img width="210" height="131" src="<?php echo team_image($oneev56['image']); ?>"><?php echo $oneev56['title']; ?>
		</a>
	</dt>
	<dd class="info">
		<span class="ltext">
			<i>¥</i>
			<?php echo moneyit($oneev56['team_price']); ?>
		</span>
		<span class="rtext"><?php echo $oneev56['now_number']; ?>人已购买</span>
	</dd>
	<dd class="zk_t"><b><?php echo team_discount($team); ?></b>折</dd>
</dl>

<dl class="rdl_2">
	<dt>
		<a href="/team.php?id=<?php echo $oneev56['id']; ?>" target="_blank" title="<?php echo $oneev56['title']; ?>">
			<img width="210" height="131" src="<?php echo team_image($oneev56['image']); ?>"><?php echo $oneev56['title']; ?>
		</a>
	</dt>
	<dd class="info">
		<span class="ltext">
			<i>¥</i>
			<?php echo moneyit($oneev56['team_price']); ?>
		</span>
		<span class="rtext"><?php echo $oneev56['now_number']; ?>人已购买</span>
	</dd>
	<dd class="zk_t"><b><?php echo team_discount($team); ?></b>折</dd>
</dl>
</div>
	
</div>
</div>---->
<!-- <div align="center"><DIV  class=bottom_ad>
  <a href="/"><img src="/static/theme/58/css/img/bottom_ad01.jpg" alt="<?php echo $INI['system']['sitename']; ?>" border="0"></a> <a href="/"><img src="/static/theme/58/css/img/bottom_ad02.jpg" alt="<?php echo $INI['system']['sitename']; ?>" border="0"></a> <a href="/"><img src="/static/theme/58/css/img/bottom_ad03.jpg" alt="<?php echo $INI['system']['sitename']; ?>" border="0"></a></div>
</DIV>
 -->
<?php include template("footer");?>