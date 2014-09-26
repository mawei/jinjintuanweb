<div class="sbox">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="cardcode">
			<h2>您有代金券吗？</h2>
			<p>可代现金最多为：<span class="current"><?php echo $currency; ?></span><?php echo $team['card']; ?></p>
			<p>使用代金券不找零，不退余额</p>
			<a href="javascript:void(0);" id="cardcode-link">点击输入代金券号码</a>
			<p id="cardcode-link-t" class="act">
				<input id="cardcode-card-id" class="f-input" type="text" name="cardcode" maxLength="16" style="text-transform:uppercase;" />
				<input id="cardcode-order-id" type="hidden" name="order_id" value="<?php echo $order['id']; ?>"/>
				<input id="cardcode-verify-id" type="button" class="formbutton" value="确定" />
			</p>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
