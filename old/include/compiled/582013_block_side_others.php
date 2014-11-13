<?php 
$others_side_ns = abs(intval($INI['system']['sideteam']));
$others_team_id = abs(intval($team['id']));
$others_city_id = abs(intval($city['id']));
$others_now = time();
if ( abs(intval($INI['system']['sideteam'])) && !$disable_multi){
	$oc = array( 
			'team_type' => 'normal',
			"id <> '$others_team_id'",
			"begin_time < '$others_now'",
			"end_time > '$others_now'",
			"((city_ids like '%@$others_city_id@%' or city_ids like '%@0@%') or (city_ids = '' and city_id in(0,$others_city_id)))",
			);
	$others = DB::LimitQuery('team', array(
				'condition' => $oc,
				'order' => 'ORDER BY `sort_order` DESC, `id` DESC',
				'size' => $others_side_ns,
				));
}
; ?>
<?php if($others){?>

<div class="rbox b15" id="plist">
	 <div class="r_bt">热门团购</div>
	  <div class="lister_r" id="siderecommend">
		<?php $index=0; ?>
		<?php if(is_array($others)){foreach($others AS $one) { ?>
	  	  <dl class="rdl_1"><dt><a id="othersfirsturl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>">
	          <?php if($one['image']){?><img src="<?php echo team_image($one['image'], true); ?>" width="210" height="131" alt="<?php echo $one['title']; ?>"/><?php }?><?php echo $one['title']; ?></a></dt>
	  	  <dd class="info"><span class="ltext"><i>&yen;</i><?php echo moneyit($one['team_price']); ?></span><span class="rtext"><b><?php echo $team['now_number']; ?></b>人已购买</span></dd>
	          <dd class="zk_t"><b><?php echo team_discount($team); ?></b>折</dd></dl>


	          <!---<p><a id="otherssecondurl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" >去看看</a>团购价：<span>&yen;<?php echo moneyit($one['team_price']); ?></span></p>
			</li>--->
		<?php }}?>
			 	 </ul>
	</div></div>
<?php }?>