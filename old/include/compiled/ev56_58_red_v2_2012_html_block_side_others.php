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
	  <h3>今日其它团购</h3>
	  <ul>
		<?php $index=0; ?>
		<?php if(is_array($others)){foreach($others AS $one) { ?>
	  	  	<li>
	          <h2><a id="othersfirsturl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>">
	          <?php if($one['image']){?><img src="<?php echo team_image($one['image'], true); ?>" width="210" height="131" alt="<?php echo $one['title']; ?>"/><?php }?><?php echo $one['title']; ?></a></h2>
	          <p><a id="otherssecondurl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" >去看看</a>团购价：<span>&yen;<?php echo moneyit($one['team_price']); ?></span></p>
			</li>
		<?php }}?>
			 	 </ul>
	</div>
<?php }?>