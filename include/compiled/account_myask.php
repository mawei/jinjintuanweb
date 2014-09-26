<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="consult">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account('/account/settings.php'); ?></ul>
	</div>
	<div id="content">
		<div class="box clear">
			<div class="box-top"></div>
			<div class="box-content">
				<div class="head">
					<h2>我的问答</h2>
					<ul class="filter">
						<li><a href="/account/settings.php">帐户设置</a></li>
						<li><a href="/credit/index.php">帐户余额</a></li>
						<li class="current"><a href="/account/myask.php">我的问答</a></li>
                        <li><a href="/account/setbinds.php">手机绑定</a></li>
						<li><a href="/account/setaddress.php">收货地址</a></li>
					</ul>
				</div>
				<div class="sect consult-list">
					<ul class="list">
					<?php if(is_array($asks)){foreach($asks AS $one) { ?>
					<li id="ask-entry-<?php echo $one['id']; ?>" >
						<div class="item">
							<p class="user"><strong><?php echo $login_user['username']; ?></strong><span><?php echo Utility::HumanTime($one['create_time']); ?></span></p>
							<div class="clear"></div>
							<p class="text"><?php echo $one['content']; ?></p>
							<p class="reply"><strong>回复：</strong><?php echo $one['comment']; ?></p>
						</div>
					</li>
					<?php }}?>
					</ul>
					<?php echo $pagestring; ?>
				</div>
			</div>
			<div class="box-bottom"></div>
		</div>
	</div>
	<div id="sidebar">
	<?php include template("block_side_invite");?>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
