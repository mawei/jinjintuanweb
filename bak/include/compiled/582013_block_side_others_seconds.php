<?php 
$seconds_now_today = strtotime(date('Y-m-d'));
$seconds_now_tomorrow = strtotime('+1 day');
$seconds_side_nn = abs(intval($INI['system']['sideteam']));
$seconds_team_id = abs(intval($team['id']));
$seconds_city_id = abs(intval($city['id']));

if ( $seconds_side_nn ) {
	$oc = array( 
			'city_id' => array($seconds_city_id, 0),
			'team_type' => 'seconds',
			"id <> '$id'",
			"begin_time >= '$seconds_now_today'",
			"end_time <= '$seconds_now_tomorrow'",
			);
	$others_seconds = DB::LimitQuery('team', array(
				'condition' => $oc,
				'order' => 'ORDER BY `sort_order` DESC, `id` DESC',
				'size' => $seconds_side_nn,
				));
}
; ?>
<?php if($others_seconds){?>

<div class="rbox b15" id="others_seconds">
	  <h3>今日秒杀...</h3>
	  <ul>
		<?php $index=0; ?>
		<?php if(is_array($others_seconds)){foreach($others_seconds AS $one) { ?>
	  	  	<li>
	          <h2><a id="others_secondsfirsturl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>">
	          <?php if($one['image']){?><img src="<?php echo team_image($one['image'], true); ?>" width="210" height="131" alt="<?php echo $one['title']; ?>"/><?php echo $one['title']; ?><?php }?></a></h2>
	          <p><a id="others_secondssecondurl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" >去看看</a>状态：<span><?php if($one['begin_time'] > time()){?>(未开始)<?php } else if($one['end_time'] < time()) { ?>(已结束)<?php } else { ?>(进行中)<?php }?></span></p>
			</li>
		<?php }}?>
			 	 </ul>
	</div>
<?php }?>