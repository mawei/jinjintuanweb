<?php 
	$ask_con = array('team_id>0', 'length(comment)>0');
	$ask_count = Table::Count('ask', $ask_con);
	$asks = DB::LimitQuery('ask', array('condition'=>$ask_con, 'size'=>3, 'order'=>'ORDER BY id DESC'));
; ?>
<div class="deal-consult sbox">
	<div class="sbox-top"><img src="/static/css/i/hottalk.gif"/></div>
	<div class="sbox-content">
		<div class="deal-consult-tip">
			<p class="nav"><a href="/team/ask.php?id=<?php echo $team['id']; ?>">查看全部(<?php echo $ask_count; ?>)</a> | <a href="/team/ask.php?id=<?php echo $team['id']; ?>#post">我要提问</a></p>
			<ul class="list">
			<?php if(is_array($asks)){foreach($asks AS $one) { ?>
				<li><a href="/team/ask.php?id=<?php echo $team['id']; ?>#ask-entry-<?php echo $one['id']; ?>" target="_blank"><?php echo htmlspecialchars(mb_substr($one['content'],0,30,'UTF-8')); ?>...</a></li>
			<?php }}?>
			</ul>
			<div class="custom-service">
			<p class="im">
			<!--a id="service-msn-help" href="msnim:chat?contact=<?php echo $INI['system']['kefumsn']; ?>">
			<img src="/static/css/i/button-custom-msn.gif" alt="点击连接MSN客服专线，我们将真诚的为您解答问题" /></a-->
			
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1269408330&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1269408330:41" alt="点击连接QQ330号客服专线，我们将真诚的为您解答问题" title="点击连接QQ330号客服专线，我们将真诚的为您解答问题"></a>			
			&nbsp;			
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1367378670&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1367378670:41" alt="点击连接QQ670号客服专线，我们将真诚的为您解答问题" title="点击连接QQ670号客服专线，我们将真诚的为您解答问题"></a>			
			
			
			</p>
			<p class="time">QQ群:56815125（9号群）</p>
			<p class="time">QQ群:57017566（女妆群）</p>
			<p class="time" style="font-weight:bold;color:red">验证信息请务必填写您的聚团吧注册用户名</p>
			<p class="time">周一至周六 8:30-19:00</p>

			</div>
			<img src="/static/css/i/tel.jpg"/>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
