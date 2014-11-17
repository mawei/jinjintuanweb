<?php include template("header");?>
	<?php include template("block_navigator_ev_s");?>
<div id="main">
<div class="listerouter">
<div class="lister">
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
  															<dl class="tuanitem">
				<dt>
					<a  id="teamfirsturl<?php echo $one['id']; ?>"  href="/team.php?id=<?php echo $one['id']; ?>" target="_blank"><img width="294" heigth="184" alt="<?php echo $one['title']; ?>" title="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image']); ?>" /></a>
											
								<i class="localmask"></i>
								<div class="local" title="团购时间">
									时间：<?php echo date('Y年n月j日', $one['begin_time']); ?> - <?php echo date('Y年n月j日', $one['end_time']); ?>
								</div>
								
								<i class="yg" title="团购预告"></i>
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
					
	

</div>
</div>

<?php include template("footer");?>