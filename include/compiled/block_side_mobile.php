<?php if($INI['system']['mobileurl']){?>
<div class="sbox">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="side-tip mobile">
			<div class="mobile-main">
				<img src="/static/css/i/mobile.png">
				<h4>可以用手机团购啦！</h4>
				<div class="dm">
				<p>手机输入：</p>
				<p class="url"><?php echo str_replace('http://','',$INI['system']['mobileurl']); ?></p>
				</div>
				<p>随时随地第一时间团购！</p>
			</div>
			<div class="mobile-tip">提示：手机版本目前仅支持余额支付，请确保在团购网站进行过充值操作。<a href="/credit/charge.php">点此充值</a>
			</div>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
<?php }?>
