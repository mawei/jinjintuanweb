<div id="deal-share">
	<div class="deal-share-top">
		<div class="deal-share-links">
			<ul class="cf">
			<li><a class="im" href="javascript:void(0);" id="deal-share-im">MSN/QQ</a></li>
			<li><a class="kaixin" href="<?php echo share_kaixin($team); ?>" target="_blank">开心</a></li>
			<li><a class="renren" href="<?php echo share_renren($team); ?>" target="_blank">人人</a></li>
			<li><a class="douban" href="<?php echo share_douban($team); ?>" target="_blank">豆瓣</a></li>
			<li><a class="sina" href="<?php echo share_sina($team); ?>" target="_blank">新浪微博</a></li>
			<li><a class="email" href="<?php echo share_mail($team); ?>" id="deal-buy-mailto">邮件</a></li>
			<li>
				<!-- JiaThis Button BEGIN -->
				<a href="http://www.jiathis.com/share.html" class="jiathis"><img src="/static/css/i/jiathis2.gif" width="71" height="14" border="0" id="jiathis_a"/></a>
				<script type="text/javascript" src="http://www.jiathis.com/code/jia.js" charset=utf-8></script>
				<!-- JiaThis Button END -->
			</li>
			</ul>
		</div>
	</div>
	<div id="deal-share-im-c">
		<div class="deal-share-im-b" valign="top">
			<span style="font-size:12px;color:#5a5a5a">复制下面的内容后通过 MSN 或 QQ 发送给好友：</span>
			<p><input id="share-copy-text" type="text" value="<?php echo $INI['system']['wwwprefix']; ?>/team.php?id=<?php echo $team['id']; ?>&r=<?php echo $login_user_id; ?>" size="30" class="f-input" tip="复制成功，请粘贴到你的MSN或QQ上推荐给您的好友"/> <input id="share-copy-button" type="button" value="复制" class="formbutton" /></p>
		</div>
	</div>
</div>
