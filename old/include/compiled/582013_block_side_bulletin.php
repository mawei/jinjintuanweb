<?php if(trim(strip_tags($INI['bulletin'][0]))){?>
<div class="rbox b15">
	  <h3>全局公告</h3>
	  <div style="padding:4px 12px;"><?php echo $INI['bulletin'][0]; ?></div>
	</div>
<?php }?>
<?php if($city['id']&&trim(strip_tags($INI['bulletin'][$city['id']]))){?>
<div class="rbox b15">
	  <h3><?php echo $city['name']; ?>公告</h3>
	  <div style="padding:4px 12px;"><?php echo $INI['bulletin'][$city['id']]; ?></div>
	</div>
<?php }?>