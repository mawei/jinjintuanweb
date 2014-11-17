<?php include template("header");?>
<style type="text/css">
.w_filter{margin:10px auto 15px auto;width:978px; border-bottom:solid 1px #E8E8E8;background:#fff;position:relative; height:auto; padding-bottom:40px;}
.dashboard{position:relative;bottom:-2px;z-index:2;_display:inline;margin-left:10px;zoom:1;}
.dashboard ul{float:left;_display:inline;width:100%;}
.dashboard li{float:left;_display:inline;margin-right:4px;font-size:14px;}
.dashboard li a{float:left;height:27px;padding:7px 7px 0 17px;outline:0;}
.dashboard li span{float:left;width:10px;height:34px;}
.dashboard li.current a{font-weight:bold;color:#000;}
.dashboard li.current span{color:#fff;}
</style>
<div id="main">

<?php if(option_yes('categoods')){?>
<div class="w_filter">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_teamcategory($group_id); ?></ul>
	</div>
</div>
					<div class="clear"></div>	
<?php }?>
<div class="listerouter">
<div class="lister">
					<?php if(is_array($goods)){foreach($goods AS $index=>$one) { ?>
  															<dl class="tuanitem">
				<dt>
					<a  id="teamfirsturl<?php echo $one['id']; ?>"  href="/team.php?id=<?php echo $one['id']; ?>" target="_blank"><img width="294" heigth="184" alt="<?php echo $one['title']; ?>" title="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image']); ?>" /></a>
<!--start 商户调用-->
<?php 

$team_partner_id = $one['partner_id'];
$team_partner = Table::Fetch('partner', $team_partner_id);
; ?>					
<?php if($one['partner_id']){?>											
								<i class="localmask"></i>
								<div class="local" title="<?php echo $team_partner['title']; ?>">
									商户：<?php echo $team_partner['title']; ?>
								</div>
<?php }?> 	
								
								<i class="hot" title="热销商品"></i>
				</dt>
				<dd class="des">
					<h2>
						<a  id="teamsecondurl<?php echo $one['id']; ?>"  target="_blank" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" class="c_b">
							<span class="c_r"> <?php echo moneyit((10*$one['team_price']/$one['market_price'])); ?>折：</span>
							<?php echo mb_strimwidth($one['title'],0,86,'...'); ?>
						</a>
					</h2>
				<div class="gobuy">
											<a  id="teamthirdurl<?php echo $one['id']; ?>"  href="/team.php?id=<?php echo $one['id']; ?>" target="_blank" class="<?php if(($one['state']=='soldout')){?>soldout_i<?php } else if($one['close_time']) { ?>soldout_i<?php } else { ?>golook<?php }?>">去看看</a>
										<span class="nprice"><i>&yen;</i><?php echo moneyit($one['team_price']); ?></span>
				</div>
				</dd>
				<dd class="btmbar">
					<span class="oprice">原价：&yen;<?php echo moneyit($one['market_price']); ?></span>
										<span class="savemoney">节省：&yen;<?php echo moneyit($one['market_price']-$one['team_price']); ?></span>
											<span class="ordernums"><b><?php echo $one['now_number']; ?></b>人已购买</span>
									</dd>
				<dd class="shadow"></dd>
				</dl>				
		  												
	<?php }}?>				
		  																
		  																
		  																
		    <div class="clear"></div>
</div>
					<div  class="class_quick_fm"><?php echo $pagestring; ?></div>
	

</div>
</div>

<?php include template("footer");?>