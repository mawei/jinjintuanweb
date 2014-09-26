<?php if(trim(strip_tags($INI['bulletin'][0]))){?>
<div class="sbox side-business" style="color:#525252;font-size:12px">
	<div class="sbox-top"><img src="/static/css/i/jutuanbanotice.gif"/></div>
	<div class="sbox-content">
		<div class="tip">
			<div><?php echo $INI['bulletin'][0]; ?></div>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
<?php }?>

<?php if(trim(strip_tags($INI['bulletin'][$city['id']]))){?>
<div class="sbox side-business" style="color:#525252;font-size:12px">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="tip">
			<h2><?php echo $city['name']; ?>公告</h2>
			<div><?php echo $INI['bulletin'][$city['id']]; ?></div>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
<?php }?>
